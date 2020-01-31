<?php


class Kategori extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Kategori_model','kategori');

    }

    public function index(){
        if($this->adminIsLoggedIn()){
            $data['kategori'] = $this->kategori->getData()->result_array();
            $this->load->view('admin/pages/kategori',$data);
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