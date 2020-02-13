<?php

class Pengguna_model extends MY_Model
{
    protected $table = "pengguna";
    
    function __construct()
    {
        parent::__construct();
        
    }
    function set_data($field,$tipe){
        return $this->db->set($field,$tipe,FALSE);
    }
    function updateData($data,$id){
        $this->getWhere('id_pengguna',$id);
        return $this->update($data);
    }

}
