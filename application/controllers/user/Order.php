<?php


class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Transaksi_model', 'transaksi');
    }


    protected $key = "5c73c3fe1e0c995aa56f25b882d792bb";

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
            // $data['province'] = $this->get_rajaongkir('city');
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
                    "id_pengguna" => $data['profil']->id_pengguna,
                    "id_alamat" => $data['profil']->id_alamat,
                    "total_harga" => $total_bayar,
                    "total_ongkir" => $total_ongkir
                );

                // die(json_encode($transaksi));
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
                $this->load->view('public/transaksi', $data);
            }
        }else{
            redirect('login');
        }
    }

    private function get_rajaongkir($type)
    {
        $curl = curl_init();
        $prov = "";
        $url = "https://api.rajaongkir.com/starter/" . $type;
        if (!empty($prov)) {
            $url = $url . "?province=" . $prov;
        }
        // die(json_encode($url));
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: " . $this->key,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function getrajaongkir($type, $mode = "GET")
    {
        // die(json_encode($mode));
        $curl = curl_init();
        $prov = $this->input->get('province');
        $kota = $this->input->post('destination');
        $cour = $this->input->post('courier');
        $url = "https://api.rajaongkir.com/starter/" . $type;

        if (!empty($prov)) {
            $url = $url . "?province=" . $prov;
        }
        // die(json_encode($url));
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $mode,
            CURLOPT_POSTFIELDS => "origin=105&destination=" . $kota . "&weight=100&courier=" . $cour,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: " . $this->key,
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

}
