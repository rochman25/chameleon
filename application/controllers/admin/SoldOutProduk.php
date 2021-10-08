<?php


class SoldOutProduk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('SizeStock_model','sizeStock');
    }

    private function checkStock($stock_product, array $size_stock){
        $stocks = 0;
        if($stock_product == 0){
            if(!empty($size_stock)){
                foreach($size_stock as $index => $item){
                    $stocks += $item['stock'];
                }
                if($stocks == 0){
                    return true;
                }
                return false;    //its become bias
            }
            return true;
        }
        return false;
    }

    public function execute(){
        try {
            $result = [];
            $produk = $this->produk->getData()->result_array();
            foreach($produk as $index => $item){
                $size_stock = $this->sizeStock->getByIdProduk($item['id_produk']);
                if($this->checkStock($item['stok_produk'], $size_stock)){
                    $labels = explode(",",$item['label_produk']);
                    $label = $item['label_produk'];
                    if(!in_array("sold out",$labels)){
                        $data = [
                            "label" => $item['label_produk'].",sold out"
                        ];
                        $label = $item['label_produk'].",sold out";
                        $this->produk->updateData($data, $item['kode_produk']);
                    }
                    $result[] = [
                        "kode_produk" => $item['kode_produk'],
                        "label" => $label
                    ];
                }
            }
            echo json_encode($result);
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
        }
    }

}