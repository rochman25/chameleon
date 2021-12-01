<?php

class SizeStock_model extends MY_Model
{
    protected $table = "size_stock_produk";
    
    function __construct()
    {
        parent::__construct();
    }

    function getById($no){
        $this->getWhere('id',$no);
        return $this->getData()->row();
    }

    function getByIdProduk($id){
        $this->select('produk.kode_produk,'.$this->table.".*");
        $this->getJoin("produk","size_stock_produk.id_produk=produk.id_produk","left");
        $this->getWhere($this->table.".id_produk",$id);
        return $this->getData()->result_array();
    }

    function updateData($data,$no){
        $this->getWhere('id',$no);
        return $this->update($data);
    }
    
    function getDataSizeStock(){
        $query =  $this->db->order_by('id','ASC')->get($this->table);
        return $query->result();
    }

    function getByKodeProduk($kode){
        // die(json_encode($kode));
        $this->db->select($this->table.".*")
                ->where("id_produk",$kode);
        return $this->db->get($this->table)->result();
    }

    function checkStockProduk($id_produk, $size){
        return $this->db->where('id_produk',$id_produk)->where('size',$size)->get($this->table)->row();
    }

    function calculateSizeStock($id_produk){
        $stock_size = $this->getByKodeProduk($id_produk);
        $stock = 0;
        foreach($stock_size as $index => $item){
            $stock += $item->stock;
        }
        return $stock;
    }

    public function decreaseStock($id_produk, $size, $stock){
        $size_stock = $this->checkStockProduk($id_produk, $size);
        $data = [
            "stock" => $size_stock->stock - $stock
        ];
        $this->getWhere('id',$size_stock->id);
        return $this->update($data);
    }

    public function increaseStock($id_produk, $size, $stock){
        $size_stock = $this->checkStockProduk($id_produk, $size);
        $data = [
            "stock" => $size_stock->stock + $stock
        ];
        $this->getWhere('id',$size_stock->id);
        return $this->update($data);
    }

}
