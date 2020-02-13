<?php
class MY_Controller extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }


    function userIsLoggedIn(){
        if (isset($this->session->userdata['user_data']) && 
        $this->session->userdata['user_data'] == true) {
            return true;
        } else {
            return false;
        }
    }

    function adminIsLoggedIn(){
        if (isset($this->session->userdata['admin_data']['status']) && $this->session->userdata['admin_data']['status'] == true ) {
            return true;
        } else {
            return false;
        }
    }

    function uploadFoto($image){
        $config['upload_path'] = 'assets/uploads/thumbnail_produk';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $image;
        $config['overwrite'] = false;
        $this->upload->initialize($config);
    }


}