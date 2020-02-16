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
            $cart = $this->cart->getData()->result_array();
            $data = [
                "cart" => $cart
            ];
            $this->load->view('admin/pages/transaksi/list_cart', $data);
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
                // die(json_encode($transaksi));
            } else if ($this->input->post('export')) {
                $tgl = explode("-", $this->input->post('tgl'));
                $transaksi = $this->transaksi->getLaporan($tgl);
                $spreadsheet = new Spreadsheet;
                
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

    // public function export(){
    //     if($this->adminIsLoggedIn()){

    //     }else{
    //         redirect('admin/home/login');
    //     }
    // }

}
