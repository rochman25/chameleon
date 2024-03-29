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
        $this->table = "produk";
        $this->select('produk.*,produk_reseller.harga_produk as harga_produk_reseller, produk_reseller.id_produk_reseller, produk_reseller.diskon_produk as diskon_produk_reseller');
        $this->getJoin("produk_reseller", "produk.id_produk=produk_reseller.id_produk", "left");
        return $this->getData()->result_array();
    }

    function getByIdProduk($id){
        $this->getWhere('id_produk',$id);
        return $this->getData()->row();
    }
	

}
