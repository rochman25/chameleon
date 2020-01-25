<?php 

class Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view('public/home');
    }

    public function login(){

    }

    public function logout(){

    }

}


?>