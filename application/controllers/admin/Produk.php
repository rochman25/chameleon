<?php


class Produk extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Produk_model','produk');
        $this->load->model('Kategori_model','kategori');
    }

    public function index(){
        if($this->adminIsLoggedIn()){
            $data['produk'] = $this->produk->getData()->result_array();
            $this->load->view('admin/pages/produk/list',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function tambah(){
        if($this->adminIsLoggedIn()){
            $data['kat_p'] = $this->kategori->getData()->result_array();
            if($this->input->post('kirim')){
                $nama_p = $this->input->post('nama_p');
                $desc_p = $this->input->post('desc_p');
                $stok_p = $this->input->post('stok_p');
                $harga_p = $this->input->post('harga_p');
                $kat_p = $this->input->post('kat_p');
                $size_p = $this->input->post('size_p');

                $kode_p = $this->produk->generateKode($nama_p);

                $data = array(
                    "kode_produk" => $kode_p,
                    "nama_produk" => $nama_p,
                    "deskripsi_produk" => $desc_p,
                    "stok_produk" => $stok_p,
                    "harga_produk" => $harga_p,
                    "id_kategori" => $kat_p,
                    "size_produk" => $size_p,
                    "created_at" => date("Y-m-d H:i:s")
                );
                // die(json_encode($data));
                if($this->produk->tambah_produk($data)){
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil ditambahkan</div>'
                    );
                    redirect('admin/produk');
                }else{
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    redirect('admin/produk');
                }
            }else{
                $this->load->view('admin/pages/produk/form_produk',$data);
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function ubah(){
        if($this->adminIsLoggedIn()){
            $id = $this->input->get('id');
            $data['produk'] = $this->produk->getById($id);
            if($this->input->post('kirim')){

            }else{
                $this->load->view('admin/pages/produk/form_produk',$data);
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function hapus(){
        if($this->adminIsLoggedIn()){
            $id = $this->input->post('id');
            if($this->produk->delete("id_produk",$id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/produk');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/produk');
            }
        }else{
            redirect('admin/home/login');
        }
    }

}

?>