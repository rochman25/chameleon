<?php 

class Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Kategori_model', 'kategori');
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
     //   die(json_encode($kategori));
        if($kategori == ""){
            
        }else{
            $kategori =  $this->kategori->getWhere('nama_kategori',$kategori);
            $kategori = $this->kategori->getData()->row();
            if($kategori->id_kategori == ""){
                
            }
            die(json_encode($kategori));
        }
        //     $thumbnail = array();
        //     $data['produk'] = $this->produk->order_by("kode_produk", "ASC");
        //     $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
        //     $data['produk'] = $this->produk->getData()->result_array();
        //     foreach ($data['produk'] as $row) {
        //         $foto = explode(',', $row['thumbnail_produk']);
        //         $thumbnail[$row['id_produk']] = $foto[0];
        //     }
        //     $data['thumbnail'] = $thumbnail;
        //     //die(json_encode($data));
        // $this->load->view('public/product',$data);
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
                        $this->load->view('user/home/login');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto">Akun tidak ditemukan</div>'
                    );
                    $this->load->view('user/home/login');
                }
            }else{
                $this->load->view('public/login');
            }
        }
       
    }
    public function register(){
        $this->load->view('public/register');
    }
    public function profil(){
        $this->load->view('public/profil');
    }

    public function logout(){

    }


    public function userlogout(){
        if($this->userIsLoggedIn()){
            $this->session->unset_userdata('admin_data');
            redirect('admin/home/login');
        }else{
            redirect('admin/home/login');   
        }
    }

}


?>