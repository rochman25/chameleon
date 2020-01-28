<?php

class Akun extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index(){
        if($this->adminIsLoggedIn()){
            $data['admin'] = $this->admin->getAdmins();
            $this->load->view('admin/pages/akun',$data);
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
