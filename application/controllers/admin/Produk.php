<?php


class Produk extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('Kategori_model', 'kategori');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['produk'] = $this->produk->getData()->result_array();
            $this->load->view('admin/pages/produk/list',$data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $data['kat_p'] = $this->kategori->getData()->result_array();
            if ($this->input->post('kirim')) {
                $nama_p = $this->input->post('nama_p');
                $desc_p = $this->input->post('desc_p');
                $stok_p = $this->input->post('stok_p');
                $harga_p = $this->input->post('harga_p');
                $kat_p = $this->input->post('kat_p');
                $size_p = $this->input->post('size_p');
                $namaFile = "";
                // $thumbnail = $_FILES['file']['name'];
                $kode_p = $this->produk->generateKode($nama_p);
                $i = 0;
                foreach ($_FILES['thumbnail']['name'] as $row) {
                    if (!empty($_FILES['thumbnail']['name'][$i])) {
                        $eks = substr(strrchr($_FILES['thumbnail']['name'][$i], '.'), 1);
                        $name = $kode_p."_".$i.".".$eks;
                        $_FILES['file']['name'] = $_FILES['thumbnail']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['thumbnail']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['thumbnail']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['thumbnail']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['thumbnail']['size'][$i];
                        $this->uploadFoto($name);
                        if ($this->upload->do_upload("file")) {
                            $namaFile .= $name;
                            $namaFile .= ",";
                        }else{
                            $this->session->set_flashdata(
                                'pesan',
                                '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah error: '.$this->upload->print_debugger().'</div>'
                            );
                            redirect('admin/produk/tambah');
                        }
                    }
                    $i++;
                }
                
                $data = array(
                    "kode_produk" => $kode_p,
                    "nama_produk" => $nama_p,
                    "deskripsi_produk" => $desc_p,
                    "stok_produk" => $stok_p,
                    "harga_produk" => $harga_p,
                    "id_kategori" => $kat_p,
                    "size_produk" => $size_p,
                    "thumbnail_produk" => $namaFile,
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

    public function ubah()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->get('id');
            $data['kat_p'] = $this->kategori->getData()->result_array();
            $data['produk'] = $this->produk->getById($id);
            if ($this->input->post('kirim')) {
                $nama_p = $this->input->post('nama_p');
                $desc_p = $this->input->post('desc_p');
                $stok_p = $this->input->post('stok_p');
                $harga_p = $this->input->post('harga_p');
                $kat_p = $this->input->post('kat_p');
                $size_p = $this->input->post('size_p');

                $datas = array(
                    "nama_produk" => $nama_p,
                    "deskripsi_produk" => $desc_p,
                    "stok_produk" => $stok_p,
                    "harga_produk" => $harga_p,
                    "id_kategori" => $kat_p,
                    "size_produk" => $size_p,
                    "updated_at" => date("Y-m-d H:i:s")
                );

                if($this->produk->updateData($datas,$id)){
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
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

    public function uploadFile()
    {
        if ($this->adminIsLoggedIn()) {
            $this->session->set_userdata('test',$this->input->post('file_name'));
            // $this->uploadFoto($this->input->post('file_name'));
            // if ($this->upload->do_upload('userfile')) {
            //     // $this->session->set_userdata('test',$_FILES['userfile']);
            //     // $this->session->set_userdata('test', "done");
            // } else {
            //     $this->session->set_userdata('test', "failure");
            // }

            // echo $this->input->post('file_name');
            // die(json)
            // $this->uploadFoto("")
            // return json_encode("test");
        } else {
            redirect('admin/home/login');
        }
    }

    public function test()
    {
        die(json_encode($this->session->userdata()));
    }

    public function hapus()
    {
        if ($this->adminIsLoggedIn()) {
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
