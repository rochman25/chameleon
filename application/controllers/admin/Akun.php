<?php

class Akun extends MY_Controller
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
            $data['admin'] = $this->admin->getAdmins();
            $this->load->view('admin/pages/akun', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $this->load->library('bcrypt');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $status = $this->input->post('status');
            $pass = $this->input->post('password');

            $data = array(
                "username" => $username,
                "email" => $email,
                "status" => $status,
                "role" => "0",
                "password" => $this->bcrypt->hash_password($pass),
                "created_at" => date("Y-m-d H:i:s")
            );

            if ($this->admin->tambah_admin($data)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                );
                redirect('admin/akun');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/akun');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah()
    {
        if($this->adminIsLoggedIn()){
            $this->load->library('bcrypt');
            $id = $this->input->post('id');
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $status = $this->input->post('status_u');
            $pass = $this->input->post('password');

            $data = array(
                "username" => $username,
                "email" => $email,
                "status" => $status,
                "password" => $this->bcrypt->hash_password($pass),
                "updated_at" => date("Y-m-d H:i:s")
            );     
            
            if($this->admin->updateData($data, $id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/akun');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/akun');
            }

        }else{
            redirect('admin/home/login');
        }
    }

    public function hapus()
    {
        if($this->adminIsLoggedIn()){
            $id = $this->input->post('id');
            if($this->admin->delete("id_admin",$id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/akun');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/akun');
            }
        }else{
            redirect('admin/home/login');
        }
    }
}
