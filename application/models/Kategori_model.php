<?php

class Kategori_model extends MY_Model
{
    protected $table = "kategori";
    
    function __construct()
    {
        parent::__construct();
    }

    function tambah_kategori($data){
        $this->db->set('id_kategori','UUID()',false);
        return $this->insert($data);
    }

    function getById($id){
        $this->getWhere('id_kategori',$id);
        return $this->getData()->row();
    }

    function updateData($data,$id){
        $this->getWhere('id_kategori',$id);
        return $this->update($data);
    }

}
