<?php 

class Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Kategori_model', 'kategori');
        $this->load->library('bcrypt');
        $this->load->library('form_validation');
    }

    public function index(){
        $thumbnail = array();
            $data['produk'] = $this->produk->order_by("kode_produk", "ASC");
            $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
            $data['produk'] = $this->produk->getData()->result_array();
            foreach ($data['produk'] as $row) {
                $foto = explode(',', $row['thumbnail_produk']);
                $thumbnail[$row['id_produk']] = $foto[0];
            }
            $data['thumbnail'] = $thumbnail;
            //die(json_encode($data));
        $this->load->view('public/home',$data);
    }
    public function produk($kategori = ""){
     
        if($kategori == ""){
            $thumbnail = array();
                $data['produk'] = $this->produk->order_by("kode_produk", "ASC");
                $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
                $data['produk'] = $this->produk->getData()->result_array();
                foreach ($data['produk'] as $row) {
                    $foto = explode(',', $row['thumbnail_produk']);
                    $thumbnail[$row['id_produk']] = $foto[0];
                }
                $data['thumbnail'] = $thumbnail;
        }else{
            $datakategori =  $this->kategori->getWhere('nama_kategori',$kategori);
            $datakategori = $this->kategori->getData()->row();
         //   die(json_encode($kategori));
            if($datakategori == "" || empty($datakategori) || $datakategori == null){
                $thumbnail = array();
                // $data['produk'] = $this->produk->order_by("kode_produk", "ASC");
                // $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
                // $data['produk'] = $this->produk->getData()->result_array();
                // foreach ($data['produk'] as $row) {
                //     $foto = explode(',', $row['thumbnail_produk']);
                //     $thumbnail[$row['id_produk']] = $foto[0];
                // }
                // $data['thumbnail'] = $thumbnail;
                $data['produk'] = null;
                $data['thumbnail'] = null;

            }else{
                $thumbnail = array();
                $data['produk'] = $this->produk->order_by("kode_produk", "ASC");
                $data['produk'] = $this->produk->getWhere('produk.id_kategori',$datakategori->id_kategori);
                $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
                $data['produk'] = $this->produk->getData()->result_array();
                foreach ($data['produk'] as $row) {
                    $foto = explode(',', $row['thumbnail_produk']);
                    $thumbnail[$row['id_produk']] = $foto[0];
                }
                $data['thumbnail'] = $thumbnail;
            }

            
        }

            //die(json_encode($data));
        $this->load->view('public/product',$data);
    }
    public function produk_detail(){
        $id_produk = $this->input->get('produk');
      
        $thumbnail = array();
            $data['produk'] = $this->produk->getWhere("id_produk", $id_produk);
            $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
            $data['produk'] = $this->produk->getData()->row();
          //  die(json_encode($data));
          //  foreach ($data['produk'] as $row) {
                $foto = explode(',', $data['produk']->thumbnail_produk);
                foreach($foto as $f){
                    $thumbnail[] = $f;
                }
            //}
            $data['thumbnail'] = $thumbnail;
         // die(json_encode($data));
        $this->load->view('public/product-detail',$data);
    }
    public function login(){
        if ($this->userIsLoggedIn()) {
            redirect(base_url());
        } else {
            if ($this->input->post('kirim')) {
                $email = $this->input->post('email');
                $pass = $this->input->post('pass');
                $where = array(
                    'email'=>$email
                );
                $cek = $this->user->login($where)->row();
           //     die(json_encode($cek));
                if ($cek != null) {
                    if ($this->bcrypt->check_password($pass, $cek->password)) {
                    //  if ($cek->password == $pass) {
                        $datas = array(
                            "updated_at" => date("Y-m-d H:i:s")
                        );
                        $this->user->updateData($datas, $cek->id_pengguna);
                        $user = array(
                            "id" => $cek->id_pengguna,
                            "username" => $cek->username,
                            "email" => $cek->email,
                            "status" => $cek->status
                        );
                        $this->session->set_userdata('user_data', $user);
                        redirect(base_url());
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto">Password salah</div>'
                        );
                        $this->load->view('public/login');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto">Akun tidak ditemukan</div>'
                    );
                    $this->load->view('public/login');
                }
            }else{
                $this->load->view('public/login');
            }
        }
       
    }
    public function register(){
        if ($this->userIsLoggedIn()) {
            redirect(base_url());
        } else {
            if ($this->input->post('kirim')) {
                $email = $this->input->post('email');
                $pass = $this->input->post('pass');
                $uname = $this->input->post('username');

                $cek = $this->user->getWhere('email',$email);
                $cek = $this->user->getData()->row();
              //  die(json_encode($cek));
                if ($cek != null) {
                    //sudah ada
                    $this->load->view('public/register');
                    die(json_encode("ada"));
                } else {
                    $data = array(
                        "email"=>$email,
                        "username" => $uname,
                        "password" => $this->bcrypt->hash_password($pass),
                        "status" => 0,
                        "token" => base64_encode($email),
                        "created_at"=> date("Y-m-d H:i:s"),
                    );
                    $register = $this->user->set_data('id_pengguna', 'UUID()');
                    $register = $this->user->insert( $data);
                    // die(json_encode($register));
                    if ($register) {
                        $this->load->view('public/login');
                    }else{
                        $this->load->view('public/login');
                    }
                    
                }
            }else if($this->input->post('email')){
                $data['email'] = $this->input->post('email');
                $this->load->view('public/register',$data);
            }else{
                $this->load->view('public/login');
            }
        }
    }
    public function profil(){
        $this->load->view('public/profil');
    }

    public function logout(){
        if($this->userIsLoggedIn()){
            $this->session->unset_userdata('user_data');
            redirect(base_url('login'));
        }else{
            redirect(base_url('login'));   
        }
    }

}


?>