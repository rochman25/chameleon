<?php


class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model','user');
        $this->load->model('Transaksi_model','transaksi');
    }


    protected $key = "8f761be7dbd0f7275f7f2d1e2b69477c";

    public function index(){
        if($this->userIsLoggedIn()){
            if($this->input->post('kirim')){

            }else{
                $this->load->view('public/transaksi');
            }
        }else{
            redirect('login');
        }
    }

    private function get_rajaongkir($type)
    {
        $curl = curl_init();
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

}
