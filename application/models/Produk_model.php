<?php

class Produk_model extends MY_Model
{
    protected $table = "produk";
    
    function __construct()
    {
        parent::__construct();
    }

    function generateKode($kat_p){
        date_default_timezone_set('Asia/Jakarta');
        $kode = "CC-";
        $number = $this->select('kode_produk');
        $number = $this->order_by("kode_produk","DESC");
        $number = $this->limit(1);
        $number = $this->getData()->row();
        if($number == null){
            $number = "001";
        }else{
            $number = (int) substr($number->kode_produk,-3);
            $number = $number+1;
        }
        $kode .= strlen($kat_p)."-".date("YmdHi")."-".sprintf("%03s",$number);
        return $kode;
    }

    function tambah_produk($data){
        $this->db->set('id_produk','UUID()',false);
        return $this->insert($data);
    }

    function getById($id){
        $this->getWhere('kode_produk',$id);
        return $this->getData()->row();
    }

    function updateData($data,$id){
        $this->getWhere('kode_produk',$id);
        return $this->update($data);
    }
    public function search($cari,$table)
	{

		$data = $this->db->query("SELECT * from $table  inner join kategori ON kategori.id_kategori=$table.id_kategori where nama_produk like '%$cari%'");
		return $data;
	}

}
