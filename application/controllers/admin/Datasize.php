<?php

class Datasize extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SizeProdukCelana_model', 'size');
        $this->load->model('Banner_model', 'banner');
        $this->load->model('produk_model','produk');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            // $data['size'] = $this->size->getJoin("produk","produk.id_produk = size.produk_id","left");
            $data['size'] = $this->size->getData()->result_array();
            $this->load->view('admin/pages/data_size', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $size_id = $this->input->post('no');
            $size_produk = $this->input->post('size');
            
            if(!empty($size_produk)){
                $data = array(
                        "no" => "",
                        "size_produk" => $size_produk,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    
                if ($this->size->insert($data)) {
                    $this->session->set_flashdata(
                        'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                    );
                    redirect('admin/datasize');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    redirect('admin/datasize');
                }
            } else {
                redirect('admin/home/login');
            }
        }
    }

    public function ubah()
    {
        if ($this->adminIsLoggedIn()) {
            $no = $this->input->post('no');
            $size = $this->input->post('ubah_size');
            // die(json_encode($size));
            if(!empty($size)){
                $data = array(
                    "no" => "",
                    "size_produk" => $size,
                    "updated_at" => date("Y-m-d H:i:s")
                );
                    
                if ($this->size->updateData($data, $no)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                    redirect('admin/datasize');
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    redirect('admin/datasize');
                }
                
            } else {
                redirect('admin/home/login');
            }
            
        } else {
            redirect('admin/home/login');
        }
    }

    public function hapus()
    {
        if ($this->adminIsLoggedIn()) {
            $no = $this->input->post('no_hapus');
            // die(json_encode($no));
            // var_dump($no);die;
            if ($this->size->delete("no", $no)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/datasize');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/datasize');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}