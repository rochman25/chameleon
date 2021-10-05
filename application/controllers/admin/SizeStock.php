<?php


class SizeStock extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('SizeStock_model', 'size_stock');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['size_stock'] = $this->size_stock->getData()->result_array();
            $this->load->view('admin/pages/size_stock/list', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $id_produk = $this->input->post('id_produk');
                $size = $this->input->post('size');
                $stock = $this->input->post('stock');

                //validate data
                $this->form_validation->set_rules('id_produk', 'ID Produk', 'required');
                $this->form_validation->set_rules('size', 'Ukuran', 'required|alpha_numeric');
                $this->form_validation->set_rules('stock', 'Stok', 'required|numeric');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/pages/size_stock/form_size_stock');
                } else {
                    $data = array(
                        "id_produk" => $id_produk,
                        "size" => $size,
                        "stock" => $stock,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->size_stock->insert($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/SizeStock');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/SizeStock');
                    }
                }
            } else {
                $this->load->view('admin/pages/size_stock/form_size_stock');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function edit($id)
    {
        if ($this->adminIsLoggedIn()) {
            $data['size_stock'] = $this->size_stock->getById($id);
            if ($this->input->post('kirim')) {
                $id_produk = $this->input->post('id_produk');
                $size = $this->input->post('size');
                $stock = $this->input->post('stock');

                //validate data
                $this->form_validation->set_rules('id_produk', 'ID Produk', 'required');
                $this->form_validation->set_rules('size', 'Ukuran', 'required|alpha_numeric');
                $this->form_validation->set_rules('stock', 'Stok', 'required|numeric');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('admin/pages/size_stock/form_size_stock');
                } else {
                    $dataInput = array(
                        "id_produk" => $id_produk,
                        "size" => $size,
                        "stock" => $stock,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->size_stock->update($dataInput, $id)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil disimpan</div>'
                        );
                        redirect('admin/SizeStock');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/SizeStock');
                    }
                }
            } else {
                $this->load->view('admin/pages/size_stock/form_size_stock');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function hapus($id)
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            if ($this->size_stock->delete("id", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/SizeStock');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/SizeStock');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
