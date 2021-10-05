<?php

class SizeStock_model extends MY_Model
{
    protected $table = "size_stock_produk";
    
    function __construct()
    {
        parent::__construct();
    }

    function getById($no){
        $this->getWhere('id',$no);
        return $this->getData()->row();
    }

    function getByIdProduk($no){
        $this->getWhere('id',$no);
        return $this->getData()->result_array();
    }

    function updateData($data,$no){
        $this->getWhere('id',$no);
        return $this->update($data);
    }
    
    function getDataSizeStock(){
        $query =  $this->db->order_by('id','ASC')->get($this->table);
        return $query->result();
    }

}
