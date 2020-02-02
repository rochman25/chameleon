<?php

class Produk_model extends MY_Model
{
    protected $table = "produk";
    
    function __construct()
    {
        parent::__construct();
    }

    function generateKode($kat_p){
        $kode = "CC";
        $kode .= "_".$kat_p.date("YmdH:i:s")."001";
        return $kode;
    }

    function tambah_produk($data){
        $this->db->set('id_produk','UUID()',false);
        return $this->insert($data);
    }

    function getById($id){
        $this->getWhere('id_produk',$id);
        return $this->getData()->row();
    }

}
