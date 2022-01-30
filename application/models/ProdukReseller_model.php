<?php

class ProdukReseller_model extends MY_Model
{
    protected $table = "produk_reseller";
    
    function __construct()
    {
        parent::__construct();
    }

    function tambah_produk($data){
        return $this->insert($data);
    }

    function getById($id){
        $this->getWhere('id_produk_reseller',$id);
        return $this->getData()->row();
    }

    function updateData($data,$id){
        $this->getWhere('id_produk_reseller',$id);
        return $this->update($data);
    }

    function getDataReseller(){
        $this->select('produk.*,produk_reseller.harga_produk as harga_produk_reseller, produk_reseller.id_produk_reseller');
        $this->getJoin("produk", "produk.id_produk=produk_reseller.id_produk", "inner");
        return $this->getData()->result_array();
    }
	

}
