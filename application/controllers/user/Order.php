<?php


class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Detailcart_model', 'detailcart');
    }

    public function index()
    {
        if ($this->userIsLoggedIn()) {
            $data['profil'] = $this->user->getProfile();
            $data['cart'] = $this->user->getCart();
            $thumbnail = array();
            $total_harga = 0;
            foreach ($data['cart'] as $row) {
                $foto = explode(',', $row['thumbnail_produk']);
                $thumbnail[$row['id_produk']] = $foto[0];
                $total_harga += $row['harga_produk'] * $row['quantity'];
            }
            $data['total'] = $total_harga;
            $data['thumbnail'] = $thumbnail;
            if ($this->input->post('kirim')) {
                $total_ongkir = $this->input->post('total_ongkir');
                $total_bayar = $this->input->post('total_bayar');
                $kurir = $this->input->post('kurir');
                $catatan = $this->input->post('catatan');
                $kode = $this->transaksi->generateKode($data['profil']->email);
                $this->session->set_userdata('kode_transaksi', $kode);
                $data_t = array(
                    "kode_transaksi" => $kode,
                    "kurir" => $kurir,
                    "catatan" => $catatan,
                    "status_transaksi" => "pending",
                    "waktu_transaksi" => date("Y-m-d H:i:s"),
                    // "waktu_expired" => date("Y-m-d H:i:s"),
                    "id_pengguna" => $this->session->userdata['user_data']['id'],
                    "id_alamat" => $data['profil']->id_alamat,
                    "total_harga" => $total_bayar,
                    "total_ongkir" => $total_ongkir
                );
                if ($this->transaksi->tambahData($data_t)) {
                    $data_detail = [];
                    $id_transaksi = $this->transaksi->getIdTransaksi($this->session->userdata('kode_transaksi'));
                    foreach ($data['cart'] as $row) {

                        $data_detail[] = [
                            "id_transaksi" => $id_transaksi->id_transaksi,
                            "kode_transaksi" => $id_transaksi->kode_transaksi,
                            "id_produk" => $row['id_produk'],
                            "jumlah_produk" => $row['quantity'],
                            "total" => $row['harga_produk'] * $row['quantity'],
                            "ukuran" => $row['size']
                        ];
                    }

                    if ($this->transaksi->tambahDetail($data_detail)) {
                        $this->cart->delete();
                        $this->session->unset_userdata('kode_transaksi');
                        $this->session->set_flashdata('pesan', "Transaksi anda berhasil, mohon ditunggu 1*24 Jam untuk diproses oleh admin");
                        redirect('user/home/profil');
                    } else {
                        die(json_encode(array("error" => "ada masalah lagi")));
                    }
                } else {
                    die(json_encode(array("error" => "ada masalah")));
                }

                // die(json_encode($data));

            } else {
                // die(json_encode($data));
                $data['id_cart'] = "";
                $this->load->view('public/transaksi', $data);
            }
        }else{
            redirect('login');
        }
    }
}
