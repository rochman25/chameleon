<?php

class Admin_model extends MY_Model
{
    protected $table = "admin";

    function __construct()
    {
        parent::__construct();
    }

    function login($email){
        $this->getWhere('email',$email);
        return $this->getData()->row();
    }

    function getAdmin(){
        $this->getWhere('id_admin',$this->session->userdata['admin_data']['id']);
        return $this->getData()->row();
    }

    function getAdmins(){
        $this->getWhere('id_admin !=',$this->session->userdata['admin_data']['id']);
        return $this->getData()->result_array();
    }

}
