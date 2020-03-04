<?php

class Detailcart_model extends MY_Model
{
    protected $table = "detail_cart_item";
    
    function __construct()
    {
        parent::__construct();
    }


    function tambahDetailCart($data){
        $this->db->set('id_detail_item_cart','UUID()',false);
        return $this->insert($data);
    }

}
