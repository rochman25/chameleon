<?php

class SizeProdukCelana_model extends MY_Model
{
    protected $table = "size_produk_celana";
    
    function __construct()
    {
        parent::__construct();
    }

    function getById($no){
        $this->getWhere('no',$no);
        return $this->getData()->row();
    }

    function getByIdProduk($no){
        $this->getWhere('no',$no);
        return $this->getData()->result_array();
    }

    function updateData($data,$no){
        $this->getWhere('no',$no);
        return $this->update($data);
    }
    
    function getDataSizeCelana(){
        $query =  $this->db->order_by('no','ASC')->get('size_produk_celana');
        return $query->result();
    }

}
