<?php

class Pengguna_model extends MY_Model
{
    protected $table = "pengguna";
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cart_model','cart');
        
    }

    function set_data($field,$tipe){
        return $this->db->set($field,$tipe,FALSE);
    }

    function updateData($data,$id){
        $this->getWhere('id_pengguna',$id);
        return $this->update($data);
    }

    function getProfile(){
        $id = $this->session->userdata['user_data']['id'];
        // return $id;
        $this->getWhere('pengguna.id_pengguna',$id);
        $this->getJoin('alamat_pengguna','alamat_pengguna.id_pengguna = pengguna.id_pengguna','left');
        return $this->getData('pengguna')->row();
    }

    function getCart(){
        $id = $this->session->userdata['user_data']['id'];
        $this->cart->select("produk.nama_produk,produk.id_produk,cart_item.id_cart,detail_cart_item.quantity,detail_cart_item.size,produk.thumbnail_produk,produk.harga_produk,produk.berat_produk,produk.diskon_produk,detail_cart_item.id_sub_produk,sub_produk.*");
        $this->cart->getWhere("cart_item.id_pengguna",$id);
        $this->cart->getJoin("detail_cart_item","detail_cart_item.id_cart = cart_item.id_cart","inner");
        $this->cart->getJoin("produk","detail_cart_item.id_produk = produk.id_produk","inner");
        $this->cart->getJoin("sub_produk","detail_cart_item.id_sub_produk = sub_produk.id_sub_produk","left");
        return $this->cart->getData()->result_array();
    }

    function getDataByEmail($email){
        $this->getWhere('email',$email);
        return $this->getData()->row();
    }

}
