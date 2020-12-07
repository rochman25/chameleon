<?php
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }


    function userIsLoggedIn()
    {
        if (
            isset($this->session->userdata['user_data']) &&
            $this->session->userdata['user_data'] == true
        ) {
            return true;
        } else {
            return false;
        }
    }

    function adminIsLoggedIn()
    {
        if (isset($this->session->userdata['admin_data']['status']) && $this->session->userdata['admin_data']['status'] == true) {
            return true;
        } else {
            return false;
        }
    }

    function uploadFoto($image)
    {
        $config['upload_path'] = 'assets/uploads/thumbnail_produk';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $image;
        $config['overwrite'] = false;
        $this->upload->initialize($config);
    }

    function uploadFotoKategori($image){
        $config['upload_path'] = 'assets/uploads/thumbnail_kategori';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $image;
        $config['overwrite'] = true;
        $this->upload->initialize($config);
    }

    function uploadFotoBanner($image){
        $config['upload_path'] = 'assets/images/bg_all';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['file_name'] = $image;
        $config['overwrite'] = true;
        $this->upload->initialize($config);
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
            CURLOPT_POSTFIELDS => "origin=41&destination=" . $kota . "&weight=400&courier=" . $cour,
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

    protected $key = "a4703df3e7f4419f9d966b391ed13314";


    public function get_provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://pro.rajaongkir.com/api/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}