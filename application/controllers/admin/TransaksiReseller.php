<?php

require('./application/third_party/phpoffice/vendor/autoload.php');
require('./application/libraries/go2hi/src/go2hi/go2hi.php');

class TransaksiReseller extends MY_Controller
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
            $transaksi = $this->transaksi->get_transaksi_reseller();
            $data = [
                "transaksi" => $transaksi,
            ];
            $this->load->view('admin/pages/transaksi/list_transaksi', $data);
        } else {
            redirect('admin/home/login');
        }
    }
}
