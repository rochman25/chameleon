<?php 

class Home extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $this->load->view('admin/pages/dashboard');
        } else {
            redirect('admin/home/login');
        }
    }

    public function profile(){
        if($this->adminIsLoggedIn()){
            $data['admin'] = $this->admin->getAdmin();
            if($this->input->post('kirim')){

            }else{
                $this->load->view('admin/pages/profile',$data);
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
                    // if ($this->bcrypt->check_password($password, $cek->password)) {
                    if ($cek->password == $pass) {
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
                    $this->load->view('admin/pages/login');
                }
            }else{
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
