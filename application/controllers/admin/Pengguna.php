<?php


class Pengguna extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Pengguna_model','pengguna');
    }

    public function index(){
       if($this->adminIsLoggedIn()){
           $pengguna = $this->pengguna->getData()->result_array();
           $data = [
               "pengguna" => $pengguna
           ];
           $this->load->view('admin/pages/pengguna/list_pengguna',$data);
       }else{
           redirect('admin/home/login');
       }
    }

}