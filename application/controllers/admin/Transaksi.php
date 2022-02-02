<?php

require('./application/third_party/phpoffice/vendor/autoload.php');
require('./application/libraries/go2hi/src/go2hi/go2hi.php');

use go2hi\go2hi;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Transaksi extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Produk_model', 'produk');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Detailcart_model', 'detail');
        $this->load->model('SizeStock_model', 'sizeStock');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $transaksi = $this->transaksi->get_transaksi();
            $data = [
                "transaksi" => $transaksi,
            ];
            $this->load->view('admin/pages/transaksi/list_transaksi', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function detail()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->get('id');
            $data['transaksi'] = $this->transaksi->get_transaksiById($id);
            // die(json_encode($data));
            $this->load->view('admin/pages/transaksi/detail', $data);
            // die(json_encode($data));
        } else {
            redirect('admin/home/login');
        }
    }

    public function update()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $noresi = $this->input->post('noresi');
            $reseller = $this->input->post('reseller');

            $data = [
                "status_transaksi" => $status,
                "no_resi" => $noresi
            ];
            $data_p = [];
            if ($status == "validasi") {

                $data_t = $this->transaksi->get_transaksiById($id);
                // die(json_encode($data_t));
                foreach ($data_t as $row) {
                    $data_p[] = [
                        "id_produk" => $row->id_produk,
                        "stok_produk" => ($row->stok_produk - $row->jumlah_produk)
                    ];
                    // $this->sizeStock->decreaseStock($row->id_produk, $row->ukuran, $row->jumlah_produk);
                }
                $this->produk->update_multiple($data_p, "id_produk");
            }

            if ($status == "batal") {
                $data_t = $this->transaksi->get_transaksiById($id);
                // die(json_encode($data_t));
                foreach ($data_t as $row) {
                    $this->sizeStock->increaseStock($row->id_produk, $row->ukuran, $row->jumlah_produk);
                }
            }

            if ($this->transaksi->updateData($data, $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diupdate</div>'
                );
                if($reseller){
                    redirect('admin/transaksi/reseller');
                }
                redirect('admin/transaksi');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                if($reseller){
                    redirect('admin/transaksi/reseller');
                }
                redirect('admin/transaksi');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function pembayaran()
    {
        if ($this->adminIsLoggedIn()) {
            $transaksi = $this->transaksi->get_pembayaran();
            $data = [
                "transaksi" => $transaksi
            ];
            $this->load->view('admin/pages/transaksi/list_pembayaran', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function pengiriman()
    {
        if ($this->adminIsLoggedIn()) {
            $transaksi = $this->transaksi->get_pengiriman();
            $data = [
                "transaksi" => $transaksi
            ];
            $this->load->view('admin/pages/transaksi/list_pengiriman', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function cart()
    {
        if ($this->adminIsLoggedIn()) {
            $cart = $this->cart->getJoin("pengguna", "pengguna.id_pengguna = cart_item.id_pengguna", "inner");
            $cart = $this->cart->getData()->result_array();
            $data = [
                "cart" => $cart
            ];
            $this->load->view('admin/pages/transaksi/list_cart', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function detailCart()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->get('id');
            $cart = $this->detail->getWhere('detail_cart_item.id_cart', $id);
            $cart = $this->detail->getJoin("produk", "produk.id_produk = detail_cart_item.id_produk", "inner");
            $cart = $this->detail->getData()->result_array();
            $total = 0;
            foreach ($cart as $row) {
                $total += $row['harga_produk'] * $row['quantity'];
            }
            $data['total'] = $total;
            $data['cart'] = $cart;
            $this->load->view('admin/pages/transaksi/detail_cart', $data);
            // die(json_encode($cart));
        } else {
            redirect('admin/home/login');
        }
    }

    public function laporan()
    {
        if ($this->adminIsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $tgl = explode("-", $this->input->post('tgl'));
                $transaksi = $this->transaksi->getLaporan($tgl);
                $data['transaksi'] = $transaksi;
                $data['tgl'] = $this->input->post('tgl');
                $this->load->view('admin/pages/laporan', $data);
            } else if ($this->input->post('export')) {
                $tgl = explode("-", $this->input->post('tgl'));
                $name = "Laporan_transaksi_" . $this->input->post('tgl');
                $transaksi = $this->transaksi->getLaporan($tgl);
                $spreadsheet = new Spreadsheet;

                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Kode Transaksi')
                    ->setCellValue('C1', 'Nama Lengkap')
                    ->setCellValue('D1', 'No Telp')
                    ->setCellValue('E1', 'Alamat Lengkap')
                    ->setCellValue('F1', 'Status');

                $kolom = 2;
                $nomor = 1;

                foreach ($transaksi as $row) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $row['kode_transaksi'])
                        ->setCellValue('C' . $kolom, $row['nama_lengkap'])
                        ->setCellValue('D' . $kolom, $row['no_telp'])
                        ->setCellValue('E' . $kolom, $row['alamat_1'] . " " . $row['alamat_2'] . " " . $row['kota'] . " " . $row['kabupaten'] . " " . $row['kode_pos'])
                        ->setCellValue('F' . $kolom, $row['status_transaksi']);
                    $kolom++;
                    $nomor++;
                }
                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                // $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                // die(json_encode($spreadsheet));
                $writer = new Xlsx($spreadsheet);

                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename=' . $name . ".xlsx");
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
            } else {
                $this->load->view('admin/pages/laporan');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function export_address()
    {
        try {
            $id = $this->input->get('id');

            $this->load->library('pdfgenerator');

            // // title dari pdf
            $data['title_pdf'] = 'Laporan Penjualan Toko Kita';

            // // filename dari pdf ketika didownload
            $file_pdf = 'laporan_penjualan_toko_kita';
            // setting paper
            // $paper = 'A4';
            $id = $this->input->get('id');
            $data['transaksi'] = $this->transaksi->get_transaksiById($id);
            $paper = array(0,0,300,500);
            //orientasi paper potrait / landscape
            $orientation = "landscape";

            $html = $this->load->view('admin/pdf/address_transaction', $data, true);


            // run dompdf
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        } catch (\Throwable $th) {
            die(json_encode($th->getMessage()));
            // error('500');
        }
    }

    public function export_invoice()
    {
        try {
            $id = $this->input->get('id');

            $this->load->library('pdfgenerator');
            $this->load->helper('date');

            // // title dari pdf
            $data['title_pdf'] = 'Laporan Penjualan Toko Kita';

            // // filename dari pdf ketika didownload
            $file_pdf = 'laporan_penjualan_toko_kita';
            // setting paper
            $paper = 'A4';
            $data['transaksi'] = $this->transaksi->get_transaksiById($id);
            $data['tanggal'] = hari_ini() . ", " . go2hi::date('d F Y', go2hi::GO2HI_HIJRI) . "H / " . date("d F Y");

            // $paper = array(0,0,560,160);
            //orientasi paper potrait / landscape
            $orientation = "potrait";

            $html = $this->load->view('admin/pdf/invoice', $data, true);
            // $this->load->view('admin/pdf/invoice',$data);

            // run dompdf
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        } catch (\Throwable $th) {
            die(json_encode($th->getMessage()));
        }
    }

    public function send_invoice()
    {
        try {
            $this->load->helper('mail');
            $this->load->helper('date');
            $id = $this->input->get('id');
            $data['transaksi'] = $this->transaksi->get_transaksiById($id);
            $data['tanggal'] = hari_ini() . ", " . go2hi::date('d F Y', go2hi::GO2HI_HIJRI) . "H / " . date("d F Y");
            $message = $this->load->view('admin/pdf/invoice', $data, true);

            $config = setEmail();

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($data['transaksi'][0]->email);
            $this->email->subject('Invoice Transaksi #' . $data['transaksi'][0]->kode_transaksi);
            $this->email->message($message);

            $sendInvoiceMail = $this->email->send();
            if($sendInvoiceMail){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Invoice berhasil dikirim</div>'
                );
                redirect('admin/transaksi/detail?id='.$id);
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Invoice gagal dikirim</div>'
                );
                redirect('admin/transaksi/detail?id='.$id);
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger mr-auto alert-dismissible">Server error.</div>'
            );
            redirect('admin/transaksi/detail?id='.$id);
        }
    }
}
