<?php


class Produk extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model','produk');

    }

    public function index(){
        if($this->adminIsLoggedIn()){
            $data['produk'] = $this->produk->getData()->result_array();
            $this->load->view('admin/pages/produk',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function tambah(){

    }

    public function ubah(){

    }

    public function hapus(){
        
    }

    

}

?>