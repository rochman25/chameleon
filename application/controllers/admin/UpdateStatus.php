<?php


class UpdateStatus extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('SizeStock_model','sizeStock');
    }

    public function change_sold_out(){
        try {
            $result = [];
            $produk = $this->produk->getData()->result_array();
            foreach($produk as $index => $row){
                $stock = $this->sizeStock->calculateSizeStock($row['id_produk']);
                if($stock == 0){
                    if(!strpos($row['label_produk'],"sold out")){
                        $addSoldOut = $this->produk->addSoldOutLabel($row['id_produk'],$row['label_produk']);;
                        $result[] = [
                            "id_produk" => $row['id_produk'],
                            "kode_produk" => $row['kode_produk'],
                            "status" => $addSoldOut,  
                        ];
                    }
                }
            }
            echo json_encode($result);
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
        }
    }

}