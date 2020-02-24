<?php


class Kategori extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model', 'kategori');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['kategori'] = $this->kategori->getData()->result_array();
            $this->load->view('admin/pages/kategori', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $nama = $this->input->post('nama');
            $desc = $this->input->post('desc');
            if (!empty($_FILES['thumbnail']['name'])) {
                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '-', $nama) . "." . $eks;
                $this->uploadFotoKategori($thumbnail);
                if ($this->upload->do_upload("thumbnail")) {
                    $data = array(
                        "nama_kategori" => $nama,
                        "deskripsi_kategori" => $desc,
                        "thumbnail_kategori" => $thumbnail,
                        "created_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->kategori->tambah_kategori($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/kategori');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/kategori');
                    }
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Error upload file</div>'
                    );
                    redirect('admin/kategori');
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
            $nama = $this->input->post('nama');
            $desc = $this->input->post('desc');
            $kategori = $this->kategori->getById($id);
            if (!empty($_FILES['thumbnail']['name'])) {
                // die();
                if ($kategori != null) {
                    unlink("assets/uploads/thumbnail_kategori/" . $kategori->thumbnail_kategori);
                }

                $eks = substr(strrchr($_FILES['thumbnail']['name'], '.'), 1);
                $thumbnail = str_replace(' ', '-', $nama) . "." . $eks;
                $this->uploadFotoKategori($thumbnail);
                if ($this->upload->do_upload("thumbnail")) {
                    $data = array(
                        "nama_kategori" => $nama,
                        "deskripsi_kategori" => $desc,
                        "thumbnail_kategori" => $thumbnail,
                        "created_at" => date("Y-m-d H:i:s")
                    );
                }else{
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Error upload</div>'
                    );
                    redirect('admin/kategori');
                    exit;
                }
            }else{
                $data = array(
                    "nama_kategori" => $nama,
                    "deskripsi_kategori" => $desc,
                    "created_at" => date("Y-m-d H:i:s")
                );
            }

            if ($this->kategori->updateData($data, $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/kategori');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/kategori');
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
                unlink("assets/uploads/thumbnail_kategori/" . $thumbnail);
            }
            if ($this->kategori->delete("id_kategori", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/kategori');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/kategori');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
