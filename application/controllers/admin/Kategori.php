<?php


class Kategori extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Kategori_model','kategori');

    }

    public function index(){
        if($this->adminIsLoggedIn()){
            $data['kategori'] = $this->kategori->getData()->result_array();
            $this->load->view('admin/pages/kategori',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function tambah(){
        if($this->adminIsLoggedIn()){
            $nama = $this->input->post('nama');
            $desc = $this->input->post('desc');

            $data = array(
                "nama_kategori" => $nama,
                "deskripsi_kategori" => $desc,
                "created_at" => date("Y-m-d H:i:s")
            );

            if($this->kategori->tambah_kategori($data)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                );
                redirect('admin/kategori');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/kategori');
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function ubah(){
        if($this->adminIsLoggedIn()){
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $desc = $this->input->post('desc');

            $data = array(
                "nama_kategori" => $nama,
                "deskripsi_kategori" => $desc,
                "created_at" => date("Y-m-d H:i:s")
            );

            if($this->kategori->updateData($data,$id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/kategori');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/kategori');
            }

        }else{
            redirect('admin/home/login');
        }
    }

    public function hapus(){
        if($this->adminIsLoggedIn()){
            $id = $this->input->post('id');
            if($this->kategori->delete("id_kategori",$id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/kategori');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/kategori');
            }
        }else{
            redirect('admin/home/login');
        }
    }


}

?>