<?php


class PenggunaReseller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengguna_model', 'pengguna');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $pengguna = $this->pengguna->getDataReseller();
            $data = [
                "pengguna" => $pengguna
            ];
            $this->load->view('admin/pages/reseller/list_reseller', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function detail()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->get('id');
            if ($id) {
                $cek = $this->pengguna->getWhere('pengguna.id_pengguna', $id);
                $cek = $this->pengguna->getJoin("alamat_pengguna", "alamat_pengguna.id_pengguna = pengguna.id_pengguna", "left");
                $cek = $this->pengguna->getData()->row();
                if ($cek) {
                    $data['pengguna'] = $cek;
                    $this->load->view('admin/pages/pengguna/detail_pengguna', $data);
                }
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        try {
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
                    "is_reseller" => "1",
                    "token" => base64_encode($email),
                    "password" => $this->bcrypt->hash_password($pass),
                    "created_at" => date("Y-m-d H:i:s")
                );

                $cek = $this->pengguna->getWhere('email', $email);
                $cek = $this->pengguna->getData()->row();

                if($cek){
                    if($cek->email == $email){
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Email sudah terdaftar</div>'
                        );
                    }

                    if($cek->username == $username){
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Username sudah terdaftar</div>'
                        );
                    }
                    redirect('admin/reseller');
                }

                $register = $this->pengguna->set_data('id_pengguna', 'UUID()');
                $register = $this->pengguna->insert($data);
                if ($register) {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil ditambahkan</div>'
                    );
                    redirect('admin/reseller');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    redirect('admin/reseller');
                }
            } else {
                redirect('admin/home/login');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger mr-auto alert-dismissible">' . $th->getMessage() . '</div>'
            );
            redirect('admin/reseller');
        }
    }

    public function ubah()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            $status = $this->input->post('status_u');

            $data = array(
                "status" => $status,
                "updated_at" => date("Y-m-d H:i:s")
            );

            // die(json_encode($data));

            if ($this->pengguna->updateData($data, $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/reseller');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/reseller');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
