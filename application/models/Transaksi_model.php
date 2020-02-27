<?php

class Transaksi_model extends MY_Model
{

    protected $table = "transaksi";

    function __construct()
    {
        parent::__construct();
    }

    function generateKode($kat_p){
        date_default_timezone_set('Asia/Jakarta');
        $kode = "TK-";
        $number = $this->select('kode_transaksi');
        $number = $this->order_by("kode_transaksi","DESC");
        $number = $this->limit(1);
        $number = $this->getData()->row();
        if($number == null){
            $number = "001";
        }else{
            $number = (int) substr($number->kode_transaksi,-3);
            $number = $number+1;
        }
        $kode .= strlen($kat_p).date("YmdHi")."-".sprintf("%03s",$number);
        return $kode;
    }

    function getStatistik(){
        $date = date("y-m-d");
        $sql = "SELECT * FROM transaksi WHERE `waktu_transaksi` BETWEEN DATE_SUB( CURDATE( ), INTERVAL 1 YEAR)";
        $query = $this->custom($sql)->result();
        return $query;
    }

    function get_transaksi(){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->order_by("transaksi.kode_transaksi","ASC");
        return $this->getData()->result_array();
    }

    function getDetailTransaksi(){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->getJoin("detail_transaksi","detail_transaksi.id_transaksi = transaksi.id_transaksi","inner");
        $this->order_by("transaksi.kode_transaksi","ASC");
        return $this->getData()->result_array();
    }

    function get_transaksiById($id){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->getJoin("alamat_pengguna","pengguna.id_pengguna = alamat_pengguna.id_pengguna","inner");
        $this->getJoin("detail_transaksi","detail_transaksi.id_transaksi = transaksi.id_transaksi","inner");
        $this->getJoin("produk","detail_transaksi.id_produk = produk.id_produk","inner");
        $this->getWhere("transaksi.id_transaksi",$id);
        return $this->getData()->result();
    }

    function getLaporan($tgl){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->getJoin("alamat_pengguna","pengguna.id_pengguna = alamat_pengguna.id_pengguna","right");
        $this->getWhereArr("transaksi.waktu_transaksi BETWEEN '".date("Y-m-d", strtotime($tgl[0]))."' and '".date("Y-m-d", strtotime($tgl[1]))."'");
        // $this->getWhere("status_transaksi","selesai");
        return $this->getData()->result_array();
    }

    function get_pembayaran(){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->order_by("kode_transaksi","ASC");
        $this->getWhere("bukti_transfer","");
        return $this->getData()->result_array();
    }

    function get_pengiriman(){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->order_by("kode_transaksi","ASC");
        // $this->getWhere("status_transaksi","proses");
        return $this->getData()->result_array();
    }

    function tambahData($data){
        $this->db->set('id_transaksi','UUID()',false);
        return $this->insert($data);
    }

    function getIdTransaksi($kode){
        $this->select('id_transaksi,kode_transaksi');
        $this->getWhere('kode_transaksi',$kode);
        return $this->getData()->row();
    }

    function tambahDetail($data){
        $this->table = "detail_transaksi";
        return $this->insert_multiple($data);
    }

    function updateData($data,$id){
        $this->getWhere('id_transaksi',$id);
        return $this->update($data);
    }

}
