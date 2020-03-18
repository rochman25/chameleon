<?php

class Cart_model extends MY_Model
{
    protected $table = "cart_item";
    
    function __construct()
    {
        parent::__construct();
    }

    function cekCart(){
        $this->getWhere('id_pengguna',$this->session->userdata['user_data']['id']);
        return $this->getData()->row();
    }

    function tambah_cart($data){
        $this->db->set('id_cart','UUID()',false);
        return $this->insert($data);
    }

    function generateKode(){
        date_default_timezone_set('Asia/Jakarta');
        $kode = "Invoice";
        $number = $this->select('id_cart');
        $number = $this->order_by("id_cart","DESC");
        $number = $this->limit(1);
        $number = $this->getData()->row();
        if($number == null){
            $number = "001";
        }else{
            $number = (int) substr($number->id_cart,-3);
            $number = $number+1;
        }
        $kode .= "-".date("YmdHi")."-".sprintf("%03s",$number);
        return $kode;
    }


}
