<?php

class Transaksi_model extends MY_Model
{

    protected $table = "transaksi";

    function __construct()
    {
        parent::__construct();
    }

    function get_transaksi(){
        $this->getJoin("pengguna","pengguna.id_pengguna = transaksi.id_pengguna","inner");
        $this->order_by("kode_transaksi","ASC");
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

    function updateData($data,$id){
        $this->getWhere('id_transaksi',$id);
        return $this->update($data);
    }

}
