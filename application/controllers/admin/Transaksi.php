<?php

require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Transaksi extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Detailcart_model','detail');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $transaksi = $this->transaksi->get_transaksi();
            $data = [
                "transaksi" => $transaksi,
            ];
            $this->load->view('admin/pages/transaksi/list_transaksi',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function detail()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->get('id');
            $data['transaksi'] = $this->transaksi->get_transaksiById($id);
            $this->load->view('admin/pages/transaksi/detail',$data);
            // die(json_encode($data));
        }else{
            redirect('admin/home/login');
        }
    }

    public function update()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            $status = $this->input->post('status');
            $noresi = $this->input->post('noresi');

            $data = [
                "status_transaksi" => $status,
                "no_resi" => $noresi
            ];

            if($this->transaksi->updateData($data,$id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diupdate</div>'
                );
                redirect('admin/transaksi');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/transaksi');
            }
        }else{
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
            $this->load->view('admin/pages/transaksi/list_pembayaran',$data);
        }else{
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
            $this->load->view('admin/pages/transaksi/list_pengiriman',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function cart()
    {
        if ($this->adminIsLoggedIn()) {
            $cart = $this->cart->getJoin("pengguna","pengguna.id_pengguna = cart_item.id_pengguna","inner");
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
            $cart = $this->detail->getWhere('detail_cart_item.id_cart',$id);
            $cart = $this->detail->getJoin("produk","produk.id_produk = detail_cart_item.id_produk","inner");
            $cart = $this->detail->getData()->result_array();
            $total = 0;
            foreach($cart as $row){
                $total += $row['harga_produk'] * $row['quantity'];
            }
            $data['total'] = $total;
            $data['cart'] = $cart;
            $this->load->view('admin/pages/transaksi/detail_cart',$data);
            // die(json_encode($cart));
        }else{
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

                $transaksi = $this->transaksi->getLaporan($tgl);
                $spreadsheet = new Spreadsheet;

                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'No')
                    ->setCellValue('B1', 'Kode Transaksi')
                    ->setCellValue('C1', 'Nama Lengkap')
                    ->setCellValue('D1', 'Status')
                    ->setCellValue('E1', 'Total');

                $kolom = 2;
                $nomor = 1;

                foreach ($transaksi as $row) {
                    $spreadsheet->setActiveSheetIndex(0)
                        ->setCellValue('A' . $kolom, $nomor)
                        ->setCellValue('B' . $kolom, $row['kode_transaksi'])
                        ->setCellValue('C' . $kolom, $row['nama_lengkap'])
                        ->setCellValue('D' . $kolom, $row['status_transaksi'])
                        ->setCellValue('E' . $kolom, ($row['total_harga'] + $row['total_ongkir']));
                    $kolom++;
                    $nomor++;
                }
                // die(json_encode($spreadsheet));
                $writer = new Xlsx($spreadsheet);

                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="Latihan.xlsx"');
                header('Cache-Control: max-age=0');

                $writer->save('php://output');
            } else {
                $this->load->view('admin/pages/laporan');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
