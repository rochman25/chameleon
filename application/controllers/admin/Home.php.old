<?php

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $this->load->model('Transaksi_model','transaksi');
        $this->load->library('bcrypt');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $month = [];
            $i = 1;
            $index=0;
            $transaksi = $this->transaksi->getDetailTransaksi();
            $stat = $this->transaksi->getStatistik();
            $statistik = ["proses" => 0,"validasi" => 0,"pending" => 0,"kirim" => 0,"selesai" => 0];
            $penjualan = 0;
            $produk = 0;
            foreach($transaksi as $row){
                if($row['status_transaksi'] == "pending"){
                    $statistik['pending'] = $statistik['pending'] + count(array($row['status_transaksi']));
                }else if($row['status_transaksi'] == "kirim"){
                    $statistik['kirim'] =  $statistik['kirim'] + count(array($row['status_transaksi']));
                }else if($row['status_transaksi'] == "selesai"){
                    $statistik['selesai'] = $statistik['selesai'] + count(array($row['status_transaksi']));
                }else if($row['status_transaksi'] == "validasi"){
                    $statistik['validasi'] = $statistik['validasi'] + count(array($row['status_transaksi']));
                }else if($row['status_transaksi'] == "proses"){
                    $statistik['proses'] = $statistik['proses'] + count(array($row['status_transaksi']));
                }
                $penjualan = $penjualan + ($row['total_harga'] + $row['total_ongkir']);
                $produk = $produk + $row['jumlah_produk'];
            }
            $jml = 0;
            for($a=0; $a<12; $a++){
                foreach($stat as $row){
                    if((int) sprintf("%02s",substr(date("m", strtotime($row['waktu_transaksi'])),-1)) == $i){
                        $jml += ($row['total_harga'] + $row['total_ongkir']);
                        $month[$index] = $jml;
                    }else{
                        $month[$index] = 0;
                    }
                }
                $index++;
                $i++;
            }
            // die();
            $stat_penjualan = $month;
            // $stat_penjualan = [3200, 1800, 4305, 3022, 6310, 5120, 1200, 2000, 1000, 6154, 2000, 6154];
            $statistik['total'] = count($transaksi);
            $data = [
                "transaksi" => $transaksi,
                "statistik" => $statistik,
                "penjualan" => $penjualan,
                "produk"    => $produk,
                "statistik_penjualan" => $stat_penjualan
            ];
            // die(json_encode($data));
            $this->load->view('admin/pages/dashboard',$data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function profile(){
        if($this->adminIsLoggedIn()){
            $data['admin'] = $this->admin->getAdmin();
            if($this->input->post('kirim')){
                $id = $this->session->userdata['admin_data']['id'];
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $nohp = $this->input->post('nohp');
                $alamat = $this->input->post('alamat');

                $datas = array(
                    "username" => $username,
                    "email" => $email,
                    "no_hp" => $nohp,
                    "alamat" => $alamat
                );

                if($this->admin->updateData($datas,$id)){
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diperbaharui</div>'
                    );
                    $this->load->view('admin/pages/profile',$data);
                }else{
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    $this->load->view('admin/pages/profile',$data);
                }

            }else{
                $this->load->view('admin/pages/profile',$data);
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function ubah_pass(){
        if($this->adminIsLoggedIn()){
            if($this->input->post('kirim')){
                $id = $this->session->userdata['admin_data']['id'];
                $oldP = $this->input->post('pass_lama');
                $newP = $this->input->post('pass_baru');

                $cek = $this->admin->getAdmin();

                // if($cek->password == $oldP){
                if($this->bcrypt->check_password($oldP,$cek->password)){
                    $data = [
                        "password" => $this->bcrypt->hash_password($newP),
                        "updated_at" => date("Y-m-d H:i:s")
                    ];
                    if($this->admin->updateData($data,$id)){
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diperbaharui</div>'
                        );
                        redirect('admin/home');
                    }else{
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        $this->load->view('admin/pages/ubah_password');
                    }
                }else{
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Password tidak dikenali</div>'
                    );
                    $this->load->view('admin/pages/ubah_password');
                }

            }else{
                $this->load->view('admin/pages/ubah_password');
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function login()
    {
        if ($this->adminIsLoggedIn()) {
            redirect('admin/home');
        } else {
            if ($this->input->post('kirim')) {
                // die();
                $email = $this->input->post('email');
                $pass = $this->input->post('pass');

                $cek = $this->admin->login($email);
                // die(json_encode($cek));
                if ($cek != null) {
                    if ($this->bcrypt->check_password($pass, $cek->password)) {
                    // if ($cek->password == $pass) {
                        $datas = array(
                            "updated_at" => date("Y-m-d H:i:s")
                        );
                        $this->admin->updateData($datas, $cek->id_admin);
                        $user = array(
                            "id" => $cek->id_admin,
                            "username" => $cek->username,
                            "email" => $cek->email,
                            "status" => $cek->status,
                            "role" => $cek->role
                        );
                        $this->session->set_userdata('admin_data', $user);
                        redirect('admin/home');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto">Password salah</div>'
                        );
                        $this->load->view('admin/pages/login');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto">Akun tidak ditemukan</div>'
                    );
                    $this->load->view('admin/pages/login');
                }
            }else{
                // $this->session->set_flashdata(
                //     'pesan',
                //     '<div class="alert alert-danger mr-auto">Method Salah</div>'
                // );
                $this->load->view('admin/pages/login');
            }
        }
    }

    public function logout(){
        if($this->adminIsLoggedIn()){
            $this->session->unset_userdata('admin_data');
            redirect('admin/home/login');
        }else{
            redirect('admin/home/login');   
        }
    }
}
