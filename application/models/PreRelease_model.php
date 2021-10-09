<?php

class PreRelease_model extends MY_Model
{
    protected $table = "pre_release";
    
    function __construct()
    {
        parent::__construct();
    }

    function getById($no){
        $this->getWhere('id',$no);
        return $this->getData()->row();
    }

    function getPreRelease(){
        $this->select('produk.kode_produk,'.$this->table.".*");
        $this->getJoin("produk","pre_release.id_produk=produk.id_produk","left");
        return $this->getData()->result_array();
    }

    function updateData($data,$no){
        $this->getWhere('id',$no);
        return $this->update($data);
    }

}
