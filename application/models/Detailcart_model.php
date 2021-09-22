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

    function deleteDetailCart($id){
        return $this->delete("id_cart",$id);
    }
    
    function cekSizeCart($id_produk = '', $id_cart = '', $size = ''){
        $this->db->select('*');
	   // $this->db->like('id_cart',$id_cart);
	    $this->db->like('id_cart', $id_cart);
	    $this->db->where('size', $size);
	    $this->db->where('id_produk', $id_produk);
		$this->db->from('detail_cart_item');
		$query = $this->db->get();
		$ret = $query->result();
		
		if($ret != null){
		    return true;
		} else {
		    return false;
		}
        // return $ret;
    }
    
    function cekIdProduk($id_produk = '', $id_cart = ''){
        $this->db->select('*');
	    $this->db->like('id_cart',$id_cart);
	    $this->db->where('id_produk', $id_produk);
		$this->db->from('detail_cart_item');
		$query = $this->db->get();
		$ret = $query->row();
        return $ret->id_produk;
    }
    
    function cekQtyProduk($id_cart = ''){
        $this->db->select_sum('quantity');
	    $this->db->like('id_cart',$id_cart);
		$this->db->from('detail_cart_item');
		$query = $this->db->get();
		$ret = $query->row();
        return $ret;
    }
    
    function cekIdProduks($id_produk = '', $id_cart = ''){
        $this->db->select('id_produk');
	    $this->db->like('id_cart',$id_cart);
	    $this->db->where('id_produk', $id_produk);
		$this->db->from('detail_cart_item');
		$query = $this->db->get();
		$ret = $query->row();
		
		if($ret->id_produk != null){
		    return 'true';
		} else {
		    return 'false';
		}
    }
    
    function deleteSizeCart($id_produk = '', $id_cart = '', $size = ''){
        $this->db->select('*');
	   // $this->db->like('id_cart',$id_cart);
	    $this->db->like('id_cart', $id_cart);
	    $this->db->where('size', $size);
	    $this->db->where('id_produk', $id_produk);
		$this->db->from('detail_cart_item');
		
        return $this->delete("size",$size);
    }
    
    function updateQuantity($id_produk = '', $id_cart = '', $size = '', $data_item_baru){
        $this->db->like('id_cart', $id_cart);
	    $this->db->where('size', $size);
	    $this->db->where('id_produk', $id_produk);
        return $this->db->update('detail_cart_item', $data_item_baru);
        
    }
    
    function getUpdateCart($id_produk, $id_cart){
        $this->db->like('id_cart', $id_cart);
	    $this->db->where('id_produk', $id_produk);
	    $this->db->from('detail_cart_item');
        return $this->db->get()->result_array();
        
    }
}
