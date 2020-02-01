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

    function updateData($data,$id){
        $this->getWhere('id_admin',$id);
        return $this->update($data);
    }

    function getAdmin(){
        $this->getWhere('id_admin',$this->session->userdata['admin_data']['id']);
        return $this->getData()->row();
    }

    function getAdmins(){
        $this->getWhere('id_admin !=',$this->session->userdata['admin_data']['id']);
        return $this->getData()->result_array();
    }

    function tambah_admin($data){
        $this->db->set('id_admin','UUID()',false);
        return $this->insert($data);
    }

}
