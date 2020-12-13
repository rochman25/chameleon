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
        return $this->getData()->result();
    }

    function updateData($data,$id){
        $this->getWhere('id',$id);
        return $this->update($data);
    }

}
