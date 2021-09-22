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
        $this->load->model('Kategori_model', 'kategori');
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
            $data['kategori'] = $this->kategori->getData()->result_array();
            $data['cart'] = $this->user->getCart();
            // die(json_encode($data['cart']));
            $thumbnail = array();
            $total_harga = 0;
            $total_berat = 0;
            $total_jumlah = 0;
            
            foreach ($data['cart'] as $row) {
                if ($row['id_sub_produk'] == null) {
                    $harga = $row['diskon_produk'] != 0 ? $row['harga_produk'] - (($row['diskon_produk'] / 100) * $row['harga_produk']) : $row['harga_produk'];
                } else {
                    $harga = $row['harga_sub'];
                }
                // if($row['id_sub_produk'] != null){
                //     $thumbnail[$row['id_sub_produk']] = base_url(). "assets/images/add_on.png";
                // }else{
                $foto = explode(',', $row['thumbnail_produk']);
                $thumbnail[$row['id_produk']] = base_url() . "assets/uploads/thumbnail_produk/" . $foto[0];
                // }
                $total_harga += $harga * $row['quantity'];
                if($row['quantity'] > 1){
                    $total_berat = $total_berat + ($row['quantity'] * $row['berat_produk']);
                }else{
                    $total_berat += $row['berat_produk'];   
                }
                $total_jumlah += $row['quantity'];
            }
            $data['total'] = $total_harga;
            $data['total_berat'] = $total_berat;
            $data['total_jumlah'] = $total_jumlah;
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

                if ($idA == "") {
                    $query = $this->alamat->insertData($data_alamat);
                    // die(json_encode($data_alamat));
                    $alamat = $this->user->getJoin("alamat_pengguna", "alamat_pengguna.id_pengguna=pengguna.id_pengguna", "left");
                    $alamat = $this->user->getWhere("pengguna.id_pengguna", $idp);
                    $alamat = $this->user->getData()->row();

                    $idA = $alamat->id_alamat;
                } else {
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
                
                // var_dump($data_t);die;
                
                if ($this->transaksi->tambahData($data_t)) {
                    $cart = $this->cart->cekCart();
                    $this->cart_item->deleteDetailCart($cart->id_cart);
                    $data_detail = [];
                    $id_transaksi = $this->transaksi->getIdTransaksi($this->session->userdata('kode_transaksi'));
                    
                    foreach ($data['cart'] as $row) {
                        $id_produk = $row['id_produk'];
                        $harga_produk = $row['harga_produk'];
                        if($row['diskon_produk'] != 0){
                            $harga_produk = $row['harga_produk'] - (($row['diskon_produk'] / 100) * $row['harga_produk']);
                        }
                        if($row['id_sub_produk'] != null){
                            $id_produk = $row['id_sub_produk'];
                            $harga_produk = $row['harga_sub'];
                        }

                        $data_detail[] = [
                            "id_transaksi" => $id_transaksi->id_transaksi,
                            "kode_transaksi" => $id_transaksi->kode_transaksi,
                            "id_produk" => $id_produk,
                            "jumlah_produk" => $row['quantity'],
                            "total" => $harga_produk * $row['quantity'],
                            "ukuran" => $row['size']
                        ];
                    }

                    // die(json_encode($data_detail));

                    if ($this->transaksi->tambahDetail($data_detail)) {

                        $this->session->unset_userdata('kode_transaksi');
                        $this->session->set_flashdata('pesan', "Transaksi anda berhasil, silahkan melakukan pembayaran ke rekening kami, untuk detail dapat dilihat dengan klik button konfirmasi berikut.");
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

    public function order_detail($id){
        $idp = $this->session->userdata['user_data']['id'];
        $data['transaksi'] = $this->transaksi->getWhere("kode_transaksi", $id);
        $data['transaksi'] = $this->transaksi->getData()->row();
        $data['kategori'] = $this->kategori->getData()->result_array();
        $data['detail_transaksi'] = $this->transaksi->getTransaksiWithDetail($id);
        $data['profil'] = $this->user->getJoin("alamat_pengguna", "alamat_pengguna.id_pengguna=pengguna.id_pengguna", "left");
        $data['profil'] = $this->user->getWhere("pengguna.id_pengguna", $idp);
        $data['profil'] = $this->user->getData()->row();
        // die(json_encode($data));
        $this->load->view('public/orderdetail',$data);
    }

}
