<?php


class Produk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Detailcart_model', 'cart_item');
        $this->load->model('SizeStock_model','sizeStock');
    }
    
    public function check_cart_product_size(){
        try {
            $cart = $this->user->getCart();
            $value = 0;
            foreach($cart as $index => $item){
                $id_produk = $item['id_produk'];
                $size = $item['size'];
                $calculateStock = $this->sizeStock->checkStockProduk($id_produk, $size);
                if($calculateStock->stock > $item['quantity']){
                    $value += $calculateStock->stock;
                }else{
                    $value = 0;
                }
            }

            if($value > 0){
                $data = [
                    "status" => true,
                    "message" => "Gas checkout gan.",
                    "value" => $value,
                ];
            }else{
                $data = [
                    "status" => true,
                    "message" => "Mohon maaf stok produk kami tidak memenuhi permintaan anda. Silahkan Hubungi Kontak Kami untuk lebih lanjut.",
                    "value" => 0,
                ];
            }  

            echo json_encode($data);
        } catch (\Throwable $th) {
            $data = [
                "status" => false,
                "message" => "Server Error",
                "detail_message" => $th->getMessage()
            ];
            echo json_encode($data);
        }
    }


}