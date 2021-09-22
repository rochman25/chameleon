<?php

class Best_seller_model extends MY_Model
{
    protected $table = "best_seller";
    
    function __construct()
    {
        parent::__construct();
    }

    function tambah_kategori($data){
        $this->db->set('id','UUID()',false);
        return $this->insert($data);
    }

    function getById($id){
        $this->getWhere('id',$id);
        return $this->getData()->row();
    }

    function updateData($data,$id){
        $this->getWhere('id',$id);
        return $this->update($data);
    }

}
