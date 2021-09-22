<?php

class Best_seller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model', 'banner');
        $this->load->model('Best_seller_model', 'best_seller');
        $this->load->model('produk_model','produk');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            // $data['best_seller'] = $this->best_seller->getJoin("produk","produk.id_produk = banner.produk_id","left");
            $data['best_seller'] = $this->best_seller->getData()->result_array();
            // $data['produk'] = $this->produk->getData()->result_array();
            $this->load->view('admin/pages/best_seller', $data);
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
                
                $this->uploadFotoBestSeller($thumbnail);
                
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
                    if ($this->best_seller->insert($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/best_seller');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/best_seller');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">'.$this->upload->display_errors().'</div>'
                    );
                    redirect('admin/best_seller');
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
            
            $best_seller = $this->best_seller->getById($id);
            
            if (!empty($_FILES['thumbnail']['name'])) {
                // die();
                if ($best_seller != null) {
                    unlink("assets/uploads/thumbnail_best_seller/" . $best_seller->filename);
                }

                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '-', $_FILES['thumbnail']['name']);
                
                $this->uploadFotoBestSeller($thumbnail);
                
                $config['upload_path'] = 'assets/uploads/thumbnail_best_seller/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['file_name'] = $thumbnail;
                $config['overwrite'] = true;
                $this->upload->initialize($config);
                
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
                    redirect('admin/best_seller');
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
            
            if ($this->best_seller->updateData($data, $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/best_seller');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/best_seller');
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
                unlink("assets/uploads/thumbnail_best_seller/" . $thumbnail);
            }
            if ($this->best_seller->delete("id", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/best_seller');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/best_seller');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}