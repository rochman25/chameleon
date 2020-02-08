<?php


class Transaksi extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Transaksi_model','transaksi');
        $this->load->model('Cart_model','cart');
    }

    public function index(){
        if($this->adminIsLoggedIn()){
            $transaksi = $this->transaksi->get_transaksi();
            $data = [
                "transaksi" => $transaksi
            ];
            $this->load->view('admin/pages/transaksi/list_transaksi',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function pembayaran(){
        if($this->adminIsLoggedIn()){
            $transaksi = $this->transaksi->get_pembayaran();
            $data = [
                "transaksi" => $transaksi
            ];
            $this->load->view('admin/pages/transaksi/list_pembayaran',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function pengiriman(){
        if($this->adminIsLoggedIn()){
            $transaksi = $this->transaksi->get_pengiriman();
            $data = [
                "transaksi" => $transaksi
            ];
            $this->load->view('admin/pages/transaksi/list_pengiriman',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function cart(){
        if($this->adminIsLoggedIn()){
            $cart = $this->cart->getData()->result_array();
            $data = [
                "cart" => $cart
            ];
            $this->load->view('admin/pages/transaksi/list_cart',$data);
        }else{
            redirect('admin/home/login');
        }
    }

}

?>