<?php

class Toko extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Profiletoko_model', 'toko');
    }

    function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['toko'] = $this->toko->getData()->row();
            $this->load->view('admin/pages/profile_toko', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    function simpan()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            $nama_toko = $this->input->post('nama_t');
            $deskripsi_toko = $this->input->post('desc_t');
            $email = $this->input->post('email');
            $notelp = $this->input->post('no_telp');

            $data = array(
                "nama_toko" => $nama_toko,
                "deskripsi_toko" => $deskripsi_toko,
                "email" => $email,
                "no_telp" => $notelp
            );

            if ($id == "") {
                if ($this->toko->tambahData($data)) {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil disimpan</div>'
                    );
                    redirect('admin/toko');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Data Gagal disimpan</div>'
                    );
                    redirect('admin/toko');
                }
                // die(json_encode($data));
            } else {
                if ($this->toko->updateData($data, $id)) {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil disimpan</div>'
                    );
                    redirect('admin/toko');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Data Gagal disimpan</div>'
                    );
                    redirect('admin/toko');
                }
                // die(json_encode($id));
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
