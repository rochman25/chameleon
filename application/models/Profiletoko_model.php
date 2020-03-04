<?php

class Profiletoko_model extends MY_Model
{
    protected $table = "profile_toko";

    function __construct()
    {
        parent::__construct();
    }

    function tambahData($data){
        $this->db->set('id_toko','UUID()',false);
        return $this->insert($data);
    }

    function updateData($data,$id){
        $this->getWhere('id_toko',$id);
        return $this->update($data);
    }

}
