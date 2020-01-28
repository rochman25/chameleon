<?php
class MY_Controller extends CI_Controller{

    function __construct()
    {
        parent::__construct();
    }


    function userIsLoggedIn(){
        if (isset($this->session->userdata['user_data']['status']) && $this->session->userdata['user_data']['status'] == true) {
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



}