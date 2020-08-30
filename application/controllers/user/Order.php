<?php


class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Transaksi_model', 'transaksi');
        $this->load->model('Alamat_model', 'alamat');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Detailcart_model', 'cart_item');
    }

    public function index()
    {
        if ($this->userIsLoggedIn()) {
            $provinsi = json_decode($this->get_provinsi());
            $idp = $this->session->userdata['user_data']['id'];
            $data['list_provinsi'] = $provinsi->rajaongkir->results;
            // $data['profil'] = $this->user->getProfile();
            $data['profil'] = $this->user->getJoin("alamat_pengguna", "alamat_pengguna.id_pengguna=pengguna.id_pengguna", "left");
            $data['profil'] = $this->user->getWhere("pengguna.id_pengguna", $idp);
            $data['profil'] = $this->user->getData()->row();
            $data['cart'] = $this->user->getCart();
            $thumbnail = array();
            $total_harga = 0;
            $total_berat = 0;
            foreach ($data['cart'] as $row) {
                $foto = explode(',', $row['thumbnail_produk']);
                $thumbnail[$row['id_produk']] = $foto[0];
                $total_harga += $row['harga_produk'] * $row['quantity'];
                $total_berat += $row['berat_produk'];
            }
            $data['total'] = $total_harga;
            $data['total_berat'] = $total_berat;
            $data['thumbnail'] = $thumbnail;
            if ($this->input->post('kirim')) {
                $nama_lengkap = $this->input->post('nama_lengkap');
                $no_telp = $this->input->post('no_telp');
                $alamat_1 = $this->input->post('alamat_1');
                $alamat_2 = $this->input->post('alamat_2');
                $provinsi_id = explode(",", $this->input->post('provinsi_id'));
                $kecamatan_id = explode(",", $this->input->post('kecamatan_id'));
                $kabupaten_id = explode(",", $this->input->post('kabupaten_id'));
                $idA = $this->input->post('id_alamat');
                $kode_pos = $this->input->post('kode_pos');
                // die(json_encode($idA));
                $data_alamat = array(
                    "nama_lengkap" => $nama_lengkap,
                    "no_telp" => $no_telp,
                    "alamat_1" => $alamat_1,
                    "alamat_2" => $alamat_2,
                    "provinsi_id" => $provinsi_id[0],
                    "provinsi" => $provinsi_id[1],
                    "kecamatan_id" => $kecamatan_id[0],
                    "kecamatan" => $kecamatan_id[1],
                    "kabupaten_id" => $kabupaten_id[0],
                    "kabupaten" => $kabupaten_id[1],
                    "kode_pos" => $kode_pos,
                    "id_pengguna" => $idp
                );

                if($idA == ""){
                    $query = $this->alamat->insertData($data_alamat);
                    // die(json_encode($data_alamat));
                    $alamat = $this->user->getJoin("alamat_pengguna", "alamat_pengguna.id_pengguna=pengguna.id_pengguna", "left");
                    $alamat = $this->user->getWhere("pengguna.id_pengguna", $idp);
                    $alamat = $this->user->getData()->row();

                    $idA = $alamat->id_alamat;
                }else{
                    $query = $this->alamat->updateData($data_alamat, $idA);
                }
                
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
                    "id_alamat" => $idA,
                    "total_harga" => $total_bayar,
                    "total_ongkir" => $total_ongkir
                );

                if ($this->transaksi->tambahData($data_t)) {
                    $cart = $this->cart->cekCart();
                    $this->cart_item->deleteDetailCart($cart->id_cart);
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

                        $this->session->unset_userdata('kode_transaksi');
                        $this->session->set_flashdata('pesan', "Transaksi anda berhasil, silahkan transfer ke rekening kami, untuk detail dapat dilihat dengan klik button konfirmasi berikut.");
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
        } else {
            redirect('login');
        }
    }
}
