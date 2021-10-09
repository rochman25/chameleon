<?php


class PreRelease extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('PreRelease_model', 'pre_release');
        $this->load->model('Produk_model','produk');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['pre_release'] = $this->pre_release->getPreRelease();
            $this->load->view('admin/pages/pre_release/list', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $id_produk = $this->input->post('id_produk');
                $release_date = $this->input->post('release_date');

                //validate data
                $this->form_validation->set_rules('id_produk', 'ID Produk', 'required');
                $this->form_validation->set_rules('release_date', 'Tanggal Rilis', 'required|date');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/pages/pre_release/form_pre_release');
                } else {
                    $data = array(
                        "id_produk" => $id_produk,
                        "release_date" => $release_date,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->pre_release->insert($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/prerelease');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/prerelease');
                    }
                }
            } else {
                $data['produk'] = $this->produk->getData()->result_array();
                $this->load->view('admin/pages/pre_release/form_pre_release',$data);
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah($id)
    {
        if ($this->adminIsLoggedIn()) {
            $data['pre_release'] = $this->pre_release->getById($id);
            if ($this->input->post('kirim')) {
                $id_produk = $this->input->post('id_produk');
                $release_date = $this->input->post('release_date');


                //validate data
                $this->form_validation->set_rules('id_produk', 'ID Produk', 'required');
                $this->form_validation->set_rules('release_date', 'Tanggal Rilis', 'required|date');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/pages/pre_release/form_pre_release');
                } else {
                    $dataInput = array(
                        "id_produk" => $id_produk,
                        "release_date" => $release_date,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->pre_release->updateData($dataInput, $id)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil disimpan</div>'
                        );
                        redirect('admin/prerelease');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/prerelease');
                    }
                }
            } else {
                $data['produk'] = $this->produk->getData()->result_array();
                $this->load->view('admin/pages/pre_release/form_pre_release', $data);
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function hapus()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            if ($this->pre_release->delete("id", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/prerelease');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/prerelease');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
