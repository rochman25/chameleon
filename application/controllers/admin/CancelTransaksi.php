<?php


class CancelTransaksi extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model', 'transaksi');
    }

    private function checkExpired($expired_time){
        $today = date("Y-m-d");
        if($today>=$expired_time){
            return true;
        }
        return false;
    }

    public function cancel(){
        try {
            $result = [];
            $transaksi = $this->transaksi->getPendingTransaksi();
            foreach($transaksi as $index => $item){
                if($this->checkExpired($item['waktu_expired'])){
                    $this->transaksi->cancelTransaksi($item['id_transaksi']);
                    $result[] = [
                        "id_transaksi" => $item['id_transaksi'],
                        "status_transaksi" => "batal"
                    ];
                }
            }
            echo json_encode($result);
        } catch (\Throwable $th) {
            echo json_encode($th->getMessage());
        }
    }

}