<?php 

class Home extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('Pengguna_model', 'user');
        $this->load->model('Kategori_model', 'kategori');
        $this->load->model('Cart_model', 'cart');
        $this->load->model('Alamat_model', 'alamat');
        $this->load->model('Detailcart_model', 'cart_item');
        $this->load->model('Transaksi_model', 'transaksi');
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

        $this->load->view('public/product',$data);
    }
    public function produk_detail(){
        //die(json_encode($this->session->userdata("c72e6711-4ea1-11ea-9a04-e03f4931b17e")));
        $id_produk = $this->input->get('produk');
      
        $thumbnail = array();
            $data['produk'] = $this->produk->getWhere("id_produk", $id_produk);
            $data['produk'] = $this->produk->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
            $data['produk'] = $this->produk->getData()->row();
    
                $foto = explode(',', $data['produk']->thumbnail_produk);
                foreach($foto as $f){
                    $thumbnail[] = $f;
                }
   
            $data['thumbnail'] = $thumbnail;

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
                if ($cek != null) {
                    if($cek->status == true){
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
                                "status" => $cek->status,
                                "login" => true,
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
                    }else{
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto">Akun belum diverifikasi silahkan cek email untuk verfikasi akun.</div>'
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
    public function get_cart(){
        if (!$this->userIsLoggedIn()) {
            echo json_encode(array(
                "status"=> "unsuccess",
                "success"=>false,
                "id_cart" => "",
                "message" => "Kam belum masuk",
                "element" => '',
            ));
        } else {
            $datafull = array();
            $thumbnail = array();
            $harga = 0;
            $datacart = $this->cart_item->order_by("id_detail_item_cart", "ASC");
            $datacart = $this->cart_item->getJoin("cart_item","cart_item.id_cart=detail_cart_item.id_cart","inner");
            $datacart = $this->cart_item->getJoin("produk","produk.id_produk=detail_cart_item.id_produk","inner");
            $datacart = $this->cart_item->getJoin("kategori","kategori.id_kategori=produk.id_kategori","inner");
            $datacart = $this->cart_item->getWhere("cart_item.id_cart","Invoice-202002140634-002");
            $datacart = $this->cart_item->getData()->result();
            foreach($datacart as $d){
                $foto = explode(',', $d->thumbnail_produk);
                foreach($foto as $f){
                    $thumbnail[] = $f;
                }
               
                $harga = $harga + $d->harga_produk;
                $d = array(
                    "id_cart"=>$d->id_cart,
                    "nama_produk"=>$d->nama_produk,
                    "qty"=>$d->quantity,
                    "harga"=>$d->harga_produk,
                    "kategori"=>$d->nama_kategori,
                    "thumb" => $thumbnail,
                    "element" => '<div class="cart-list" id="cart_list_39223">
                    <a href="#">
                        <img src="'.base_url().'assets/uploads/thumbnail_produk/'.$thumbnail[0].'">
                        <div class="content">
                            <div class="name">'.$d->nama_produk.'</div>
                            <div class="discount">
                                <span class="price-old">Rp 429,000</span> &nbsp;
                                <span style="color:red">-30%</span>
                            </div>
                            <div class="real">Rp 300,000</div>
                                <div class="content-detail">
                                    Jumlah : <strong class="cart-quantity">'.$d->quantity.' </strong> /
                                    Ukuran : <strong>39 </strong>
                                </div>
                        </div>
                    </a>
                    <a class="delete-cart" data-id="39223" href="#">
                        <i class="svg_icon__header_garbage svg-icon"></i>
                    </a>
                </div>'
                );
                 array_push($datafull,$d);
            }
            
            echo json_encode(array("data"=>$datafull,"total"=>$harga));
        }
    }
    public function update_cart(){
        if (!$this->userIsLoggedIn()) {
            echo json_encode(array(
                "status"=> "unsuccess",
                "success"=>false,
                "id_cart" => "",
                "message" => "Kamu belum masuk",
                "element" => '',
            ));
        } else {
            $idc = $this->input->post('id_cart');
            $idp = $this->input->post('id_pengguna');
            $id_produk = $this->input->post('id_produk');
            $qty = $this->input->post('qty');
            $nama_barang = $this->input->post('nama_barang');
            $data_item = array(
                "id_cart" => $idc,
                "id_produk" => $id_produk,
                "quantity" => $qty
            );

            $simpan_item = $this->cart_item->insert($data_item);
            if($simpan_item){
                $session_cart = array(
                    "current_cart" => $idc,
                    "created_at" => date("Y-m-d H:i:s")
                );
                $this->session->set_userdata($idp, $session_cart);
                echo json_encode(array(
                "status"=> "success",
                "success"=>true,
                "id_cart" => $idc,
                "element" => '<div class="cart-list" id="cart_list_39223">
    			<a href="#">
        			<img src="#">
        			<div class="content">
            			<div class="name">'.$nama_barang.'</div>
                        <div class="discount">
                    		<span class="price-old">Rp 429,000</span> &nbsp;
                    		<span style="color:red">-30%</span>
                		</div>
            			<div class="real">Rp 300,000</div>
                            <div class="content-detail">
                    			Jumlah : <strong class="cart-quantity">'.$qty.' </strong> /
                    			Ukuran : <strong>39 </strong>
                			</div>
        			</div>
    			</a>
    			<a class="delete-cart" data-id="39223" href="#">
        			<i class="svg_icon__header_garbage svg-icon"></i>
    			</a>
			</div>',
            ));
            }else{

            }
        }
    }
    public function add_cart(){
        if (!$this->userIsLoggedIn()) {
            echo json_encode(array(
                "status"=> "unsuccess",
                "success"=>false,
                "id_cart" => "",
                "message" => "Kam belum masuk",
                "element" => '',
            ));
        } else {
         $idc = $this->cart->generateKode();//$this->input->post('id_cart');
         $idp = $this->input->post('id_pengguna');
         $id_produk = $this->input->post('id_produk');
         $qty = $this->input->post('qty');
         $nama_barang = $this->input->post('nama_barang');


        $data = array(
            "id_cart" => $idc,
            "id_pengguna" => $idp,
            "created_at" => date("Y-m-d H:i:s"),
        );
        $data_item = array(
            "id_cart" => $idc,
            "id_produk" => $id_produk,
            "quantity" => $qty
        );


        $simpan = $this->cart->insert($data);
        if($simpan){
            $simpan_item = $this->cart_item->insert($data_item);
            if($simpan_item){
                $session_cart = array(
                    "current_cart" => $idc,
                    "created_at" => date("Y-m-d H:i:s")
                );
                $this->session->set_userdata($idp, $session_cart);
            echo json_encode(array(
                "status"=> "success",
                "success"=>true,
                "id_cart" => $idc,
                "element" => '<div class="cart-list" id="cart_list_39223">
    			<a href="#">
        			<img src="#">
        			<div class="content">
            			<div class="name">'.$nama_barang.'</div>
                        <div class="discount">
                    		<span class="price-old">Rp 429,000</span> &nbsp;
                    		<span style="color:red">-30%</span>
                		</div>
            			<div class="real">Rp 300,000</div>
                            <div class="content-detail">
                    			Jumlah : <strong class="cart-quantity">'.$qty.' </strong> /
                    			Ukuran : <strong>39 </strong>
                			</div>
        			</div>
    			</a>
    			<a class="delete-cart" data-id="39223" href="#">
        			<i class="svg_icon__header_garbage svg-icon"></i>
    			</a>
			</div>',
            ));
            }else{
                echo json_encode(array(
                    "status"=> "unsuccess",
                    "success"=>false,
                    "id_cart" => $idc,
                    "message" => "berhasil diinput tapi gagall input item",
                    "element" => '',
                ));
            }
        }else{
            echo json_encode(array(
                "status"=> "unsuccess",
            "success"=>false,
            "id_cart" => "",
            "message" => "berhasil diinput tapi gagall input item",
            "element" => '',));
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
                    $this->session->set_flashdata("pesan","Email yang anda masukkan sudah terdaftar ");
                    //sudah ada
                    $this->load->view('public/register');
                    // die(json_encode("ada"));
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
                        if($this->send_verification($email,base64_encode($email))){
                            $this->session->set_flashdata("pesan","Anda berhasil registrasi, silahkan cek email anda untuk memverifikasi akun");   
                        }else{
                            $this->session->set_flashdata("pesan","ada masalah ");
                        }
                        $this->load->view('public/login');
                    }else{
                        $this->load->view('public/login');
                    }
                    
                }
            }else if($this->input->post('email')){
                $email = $this->input->post('email');
                $cek = $this->user->getWhere('email',$email);
                $cek = $this->user->getData()->row();

                $data['email'] = $email;
                if ($cek != null) {
                    $this->session->set_flashdata("pesan","Email yang anda masukkan sudah terdaftar ");
                    //sudah ada
                    $this->load->view('public/login');
                    // die(json_encode("ada"));
                }else{
                    $this->load->view('public/register',$data);
                }
                // die(json_encode($data));
            }else{
                $this->load->view('public/login');
            }
        }
    }

    public function verifikasi(){
        $code = $this->input->get('code');
        // die(json_encode(base64_decode($code)));
        $cek = $this->user->getWhere('email', base64_decode($code));
		$cek = $this->user->getData('user')->row();
		if ($cek != null) {
			$data = array(
				"status" => true
            );
            if($this->user->updateData($data,$cek->id_pengguna)){
                echo "Selamat akun anda sudah aktif!. Silahkan klik <a href='".base_url('login')."'>login</a>";
            }else{
                echo "ada masalah";
            }
		} else {
            echo "verifikasi kode ilegal.";
		}
    }

    public function profil(){
        $idp =$this->session->userdata['user_data']['id'];
        $data['profil'] = $this->user->getWhere("id_pengguna", $idp);
        $data['profil'] = $this->user->getData()->row();

        $data['transaksi'] = $this->transaksi->order_by("transaksi.id_transaksi", "ASC");
        $data['transaksi'] = $this->transaksi->getJoin("detail_transaksi","detail_transaksi.id_transaksi=transaksi.id_transaksi","inner");
        $data['transaksi'] = $this->transaksi->getJoin("produk","produk.id_produk=detail_transaksi.id_produk","inner");
        $data['transaksi'] = $this->transaksi->getJoin("pengguna","pengguna.id_pengguna=transaksi.id_pengguna","inner");
        $data['transaksi'] = $this->transaksi->getJoin("alamat_pengguna","alamat_pengguna.id_alamat=transaksi.id_alamat","inner");
        $data['transaksi'] = $this->transaksi->getWhere("pengguna.id_pengguna",$idp);
        $data['transaksi'] = $this->transaksi->getData()->result();
        
        $data['alamat'] = $this->alamat->getWhere("id_pengguna", $idp);
        $data['alamat'] = $this->alamat->getData()->result();
        die(json_encode($data));
        $this->load->view('public/profil',$data);
    }

    public function logout(){
        if($this->userIsLoggedIn()){
            $this->session->unset_userdata('user_data');
           redirect(base_url('login'),'refresh');
            //redirect('/user_view/user_login', 'refresh');
            exit();
        }else{
           redirect(base_url('login'));   
        }
       // die(json_encode($this->session->userdata('user_data')));
    }

    private function send_verification($email, $code)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => '465',
			'smtp_user' => 'zaenur.rochman98@gmail.com', // informasi rahasia ini jangan di gunakan sembarangan
			'smtp_pass' => 'rochman25', // informasi rahasia ini jangan di gunakan sembarangan
			'smtp_crypto' => 'ssl',
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$message =     "
                  <html>
                  <head>
                      <title>Verifikasi Akun anda</title>
                  </head>
                  <body>
                      <h2>Terima kasih sudah Mendaftar.</h2>
                      <p>Akun anda:</p>
                      <p>Email: " . $email . "</p>
                      <p>Silahkan klik link berikut untuk memverifikasi akun anda.</p>
                      <h4><a href='" . base_url() . "verifikasi?code=" . $code . "'>Verifikasi Akun Saya</a></h4>
                  </body>
                  </html>
                  ";

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($config['smtp_user']);
		$this->email->to($email);
		$this->email->subject('Verifikasi akun');
		$this->email->message($message);

		return $this->email->send();
	}

}


?>