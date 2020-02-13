<?php 

class Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('Pengguna', 'user');
    }

    public function index(){
        $this->load->view('public/home');
    }
    public function produk(){
        $data['product'] = $this->produk->getData()->result();
        //die(json_encode($data));
        $this->load->view('public/product',$data);
    }
    public function produk_detail(){
        $this->load->view('public/product-detail');
    }
    public function login(){
        $this->load->view('public/login');
    }
    public function register(){
        $this->load->view('public/register');
    }
    public function profil(){
        $this->load->view('public/profil');
    }

    public function logout(){

    }

    public function login_proses()
    {
        if ($this->userIsLoggedIn()) {
            redirect('user/home');
        } else {
            if ($this->input->post('kirim')) {
                // die();
                $email = $this->input->post('email');
                $pass = $this->input->post('pass');

                $cek = $this->user->login($email);
                // die(json_encode($cek));
                if ($cek != null) {
                    //if ($this->bcrypt->check_password($pass, $cek->password)) {
                     if ($cek->password == $pass) {
                        $datas = array(
                            "updated_at" => date("Y-m-d H:i:s")
                        );
                        $this->user->updateData($datas, $cek->id_admin);
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
                $this->load->view('admin/pages/login');
            }
        }
    }

    public function logout(){
        if($this->userIsLoggedIn()){
            $this->session->unset_userdata('admin_data');
            redirect('admin/home/login');
        }else{
            redirect('admin/home/login');   
        }
    }

}


?>