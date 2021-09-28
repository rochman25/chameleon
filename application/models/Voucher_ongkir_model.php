<?php

class Voucher_ongkir_model extends MY_Model
{

    protected $table = "voucher_ongkir";

    function __construct()
    {
        parent::__construct();
    }

    function getById($id){
        $this->getWhere('id_voucher',$id);
        return $this->getData()->row();
    }

    function updateData($data,$id){
        $this->getWhere('id_voucher',$id);
        return $this->update($data);
    }

    function getVoucher($code){
        $this->getWhere('code_voucher',$code);
        $this->getWhere('is_active',TRUE);
        return $this->getData()->row();
    }

}   