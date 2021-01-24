<?php

class SubProduk_model extends MY_Model
{
    protected $table = "sub_produk";
    
    function __construct()
    {
        parent::__construct();
    }

    function getById($id){
        $this->getWhere('id',$id);
        return $this->getData()->row();
    }

    function getByIdProduk($id){
        $this->getWhere('produk_id',$id);
        $this->getWhere('active',true);
        return $this->getData()->result_array();
    }

    function updateData($data,$id){
        $this->getWhere('id',$id);
        return $this->update($data);
    }

}
