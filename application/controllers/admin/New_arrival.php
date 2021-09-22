<?php

class New_arrival extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model', 'banner');
        $this->load->model('New_arrival_model', 'new_arrival');
        $this->load->model('produk_model','produk');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            // $data['best_seller'] = $this->best_seller->getJoin("produk","produk.id_produk = banner.produk_id","left");
            $data['new_arrival'] = $this->new_arrival->getData()->result_array();
            // $data['produk'] = $this->produk->getData()->result_array();
            $this->load->view('admin/pages/new_arrival', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $produk = $this->input->post('produk_id');
            $title = $this->input->post('title');
            $link_redirect = $this->input->post('link_redirect');
            $order = $this->input->post('order');
            $active = $this->input->post('active');
            
            if (!empty($_FILES['thumbnail']['name'])) {
                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '_', $_FILES['thumbnail']['name']);
                
                $this->uploadFotoNewArrival($thumbnail);
                
                // $config['upload_path'] = 'assets/images/bg_all';
                // $config['allowed_types'] = 'jpeg|jpg|png';
                // $config['file_name'] = $thumbnail;
                // $config['overwrite'] = true;
                // $this->upload->initialize($config);
        
                if ($this->upload->do_upload("thumbnail")) {
                    // $image = $this->upload->data();
                    
                    // $config = array(
                    //             'image_library'   => 'gd2',
                    //             'source_image'  => $image['full_path'],
                    //             'width'           =>  1366,
                    //             'height'          =>  480,
                    //         );
                    // $this->load->library('image_lib', $config);
                            // var_dump($config);die;
                    $data = array(
                        "produk_id" => "",
                        "title" => $title,
                        // "title" => 'Best Seller',
                        "order" => $order,
                        "active" => $active,
                        "filename" => $thumbnail,
                        "link_redirect" => $link_redirect,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->new_arrival->insert($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/new_arrival');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/new_arrival');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">'.$this->upload->display_errors().'</div>'
                    );
                    redirect('admin/new_arrival');
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
            $title = $this->input->post('title');
            $produk = $this->input->post('produk_id');
            $link_redirect = $this->input->post('link_redirect');
            $order = $this->input->post('order');
            $active = $this->input->post('active');
            
            // var_dump($title);die;
            
            $new_arrival = $this->new_arrival->getById($id);
            
            if (!empty($_FILES['thumbnail']['name'])) {
                // die();
                if ($new_arrival != null) {
                    unlink("assets/uploads/thumbnail_new_arrival/" . $new_arrival->filename);
                }

                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '-', $_FILES['thumbnail']['name']);
                
                $this->uploadFotoNewArrival($thumbnail);
                
                // $config['upload_path'] = 'assets/uploads/thumbnail_best_seller/';
                // $config['allowed_types'] = 'jpeg|jpg|png';
                // $config['file_name'] = $thumbnail;
                // $config['overwrite'] = true;
                // $this->upload->initialize($config);
                
                if ($this->upload->do_upload("thumbnail")) {
                    // $image = $this->upload->data();
                            
                    //         $config = array(
                    //             'image_library'   => 'gd2',
                    //             'source_image'  => $image['full_path'],
                    //             'overwrite'     => true,
                    //             'width'           =>  200,
                    //             'height'          =>  200,
                    //         );
                    //         $this->load->library('image_lib', $config);
                    //         $this->image_lib->clear();
                            // var_dump($config);die;
                            
                    $data = array(
                        "title" => $title,
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
                    redirect('admin/new_arrival');
                    exit;
                }
            }else{
                $data = array(
                    "title" => $title,
                    "produk_id" => "",
                    "order" => $order,
                    "active" => $active,
                    "link_redirect" => $link_redirect,
                    "updated_at" => date("Y-m-d H:i:s")
                );
            }

            // var_dump($data);die;
            
            if ($this->new_arrival->updateData($data, $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/new_arrival');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/new_arrival');
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
                unlink("assets/uploads/thumbnail_new_arrival/" . $thumbnail);
            }
            if ($this->new_arrival->delete("id", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/new_arrival');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/new_arrival');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}