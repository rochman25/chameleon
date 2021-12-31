<?php


class Produk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Detailcart_model', 'cart_item');
        $this->load->model('SizeStock_model', 'sizeStock');
    }

    public function check_cart_product_size()
    {
        try {
            $cart = $this->user->getCart();
            $value = 0;
            $product = "";
            foreach ($cart as $index => $item) {
                $harga = 0;
                if ($item['diskon_produk'] != 0) {
                    $realHarga = $item['harga_produk'] - (($item['diskon_produk'] / 100) * $item['harga_produk']);
                } else {
                    $realHarga = $item['harga_produk'];
                }
                $harga = $harga + $realHarga;

                $id_produk = $item['id_produk'];
                $size = $item['size'];
                $calculateStock = $this->sizeStock->checkStockProduk($id_produk, $size);
                if ($calculateStock->stock >= $item['quantity']) {
                    $value += $calculateStock->stock;
                } else {
                    $product = '<div class="image-container">
                                    <img style="width:100px;" src="' . base_url() . 'assets/uploads/thumbnail_produk/' . $item['thumbnail_produk'] . '">
                                    <div class="after">STOK HABIS</div>
                                </div>
                                <div class="content">
                                    <div class="name">' . $item['nama_produk'] . '</div>
                                    <div class="real">Rp ' . number_format($realHarga, 0) . '</div>
                                    <div class="content-detail">
                                        Jumlah : <strong class="cart-quantity">' . $item['quantity'] . '/ Ukuran :' . $item['size'] . '</strong> 
                                    </div>
                                </div>
                                    ';
                    $value = 0;
                }
            }

            if ($value > 0) {
                $data = [
                    "status" => true,
                    "message" => "Gas checkout gan.",
                    "value" => $value,
                ];
            } else {
                $data = [
                    "status" => true,
                    "message" => "Mohon maaf stok produk kami tidak memenuhi permintaan anda. Silahkan Hubungi Kontak Kami untuk lebih lanjut.",
                    "value" => 0,
                    "product_out" => $product
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
