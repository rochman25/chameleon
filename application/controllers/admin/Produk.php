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
            $thumbnail = array();
            $data['produk'] = $this->produk->order_by("kode_produk", "ASC");
            $data['produk'] = $this->produk->getData()->result_array();
            foreach ($data['produk'] as $row) {
                $foto = explode(',', $row['thumbnail_produk']);
                $thumbnail[$row['id_produk']] = $foto[0];
            }
            $data['thumbnail'] = $thumbnail;
            // die(json_encode($thumbnail));
            $this->load->view('admin/pages/produk/list', $data);
        } else {
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
                if ($this->session->userdata('produk_data') != null) {
                    $kode_p = $this->session->userdata['produk_data']['kode'];
                } else {
                    $kode_p = $this->produk->generateKode($nama_p);
                }

                $namaFile = implode(",", $this->session->userdata['produk_data']['thumbnail']);
                // die(json_encode())
                $i = 0;
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
                if ($this->produk->tambah_produk($data)) {
                    $this->session->unset_userdata('produk_data');
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil ditambahkan</div>'
                    );
                    redirect('admin/produk');
                } else {
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

                if($this->session->userdata('produk_data') != null){
                    $thumbnail = implode(",", $this->session->userdata['produk_data']['thumbnail']);
                    $datas = array(
                        "nama_produk" => $nama_p,
                        "deskripsi_produk" => $desc_p,
                        "stok_produk" => $stok_p,
                        "harga_produk" => $harga_p,
                        "id_kategori" => $kat_p,
                        "thumbnail_produk" => $thumbnail,
                        "size_produk" => $size_p,
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    $this->session->unset_userdata('produk_data');
                }else{
                    $datas = array(
                        "nama_produk" => $nama_p,
                        "deskripsi_produk" => $desc_p,
                        "stok_produk" => $stok_p,
                        "harga_produk" => $harga_p,
                        "id_kategori" => $kat_p,
                        "size_produk" => $size_p,
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                }
                // die(json_encode($datas));
                if ($this->produk->updateData($datas, $id)) {
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
            if ($this->input->post('status') != "remove") {
                $data = [];
                $foto = null;
                $i = 0;
                $index = 0;
                $kode_p = $this->input->post('kode_p');
                if($kode_p == ""){
                    $kode_p = $this->produk->generateKode($this->input->post('file_name'));   
                }else{
                    $data_f = $this->produk->getById($kode_p);
                    $foto = explode(',', $data_f->thumbnail_produk);
                }
                if ($this->session->userdata('produk_data') != null) {
                    // $index = 0;
                    foreach ($this->session->userdata['produk_data']['thumbnail'] as $row) {
                        $index++;
                    }
                }else if($foto != null){
                    foreach ($foto as $row){
                        $index++;
                    }
                }


                foreach ($_FILES['thumbnail']['name'] as $row) {
                    if (!empty($_FILES['thumbnail']['name'][$i])) {
                        $eks = substr(strrchr($_FILES['thumbnail']['name'][$i], '.'), 1);
                        $name = $kode_p . "_" . $index . "." . $eks;
                        $_FILES['file']['name'] = $_FILES['thumbnail']['name'][$i];
                        $_FILES['file']['type'] = $_FILES['thumbnail']['type'][$i];
                        $_FILES['file']['tmp_name'] = $_FILES['thumbnail']['tmp_name'][$i];
                        $_FILES['file']['error'] = $_FILES['thumbnail']['error'][$i];
                        $_FILES['file']['size'] = $_FILES['thumbnail']['size'][$i];
                        $this->uploadFoto($name);
                        if ($this->upload->do_upload("file")) {
                            $data[$i] = $name;
                        } else {
                            $this->session->set_flashdata(
                                'pesan',
                                '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah error: ' . $this->upload->print_debugger() . '</div>'
                            );
                            redirect('admin/produk');
                        }
                    }
                    $i++;
                    $index++;
                }
                if ($this->session->userdata('produk_data') != null) {
                    $data_t = $this->session->userdata['produk_data']['thumbnail'];
                    foreach ($data_t as $row) {
                        array_push($data, $row);
                    }
                    $this->session->set_userdata('produk_data', array(
                        "thumbnail" => $data,
                        "kode" => $kode_p
                    ));
                } else if($foto != null){
                    foreach($foto as $row){
                        array_push($data,$row);
                    }
                    $this->session->set_userdata('produk_data', array(
                        "thumbnail" => $data,
                        "kode" => $kode_p
                    ));
                } else {
                    $this->session->set_userdata('produk_data', array(
                        "thumbnail" => $data,
                        "kode" => $kode_p
                    ));
                }
            }else{
                
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function getThumbnail($id = null)
    {
        if ($this->adminIsLoggedIn()) {
            // if(isset($id))
            $data = $this->produk->getById($id);
            $thumbnail = explode(',', $data->thumbnail_produk);
            echo json_encode($thumbnail);
        } else {
            redirect('admin/home/login');
        }
    }

    public function test()
    {
        // $this->session->unset_userdata('produk_data');
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
