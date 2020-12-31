<?php

class Banner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model', 'banner');
        $this->load->model('produk_model','produk');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['banner'] = $this->banner->getJoin("produk","produk.id_produk = banner.produk_id","left");
            $data['banner'] = $this->banner->getData()->result_array();
            $data['produk'] = $this->produk->getData()->result_array();
            $this->load->view('admin/pages/banner', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $produk = $this->input->post('produk_id');
            $link_redirect = $this->input->post('link_redirect');
            $order = $this->input->post('order');
            $active = $this->input->post('active');
            if (!empty($_FILES['thumbnail']['name'])) {
                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '_', $_FILES['thumbnail']['name']);
                $this->uploadFotoBanner($thumbnail);
                if ($this->upload->do_upload("thumbnail")) {
                    $data = array(
                        "produk_id" => "",
                        "order" => $order,
                        "active" => $active,
                        "filename" => $thumbnail,
                        "link_redirect" => $link_redirect,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->banner->insert($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/banner');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/banner');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">'.$this->upload->display_errors().'</div>'
                    );
                    redirect('admin/banner');
                }
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            $produk = $this->input->post('produk_id');
            $link_redirect = $this->input->post('link_redirect');
            $order = $this->input->post('order');
            $active = $this->input->post('active');
            $banner = $this->banner->getById($id);
            if (!empty($_FILES['thumbnail']['name'])) {
                // die();
                if ($banner != null) {
                    unlink("assets/images/bg_all/" . $banner->filename);
                }

                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '-', $_FILES['thumbnail']['name']);
                $this->uploadFotoBanner($thumbnail);
                if ($this->upload->do_upload("thumbnail")) {
                    $data = array(
                        "produk_id" => "",
                        "order" => $order,
                        "active" => $active,
                        "filename" => $thumbnail,
                        "link_redirect" => $link_redirect,
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                }else{
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Error upload</div>'
                    );
                    redirect('admin/banner');
                    exit;
                }
            }else{
                $data = array(
                    "produk_id" => "",
                    "order" => $order,
                    "active" => $active,
                    "link_redirect" => $link_redirect,
                    "updated_at" => date("Y-m-d H:i:s")
                );
            }

            if ($this->banner->updateData($data, $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/banner');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/banner');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function hapus()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            $thumbnail = $this->input->post('thumbnail');
            if ($thumbnail != null) {
                unlink("assets/images/bg_all/" . $thumbnail);
            }
            if ($this->banner->delete("id", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/banner');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/banner');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}