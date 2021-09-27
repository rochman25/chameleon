<?php

class Voucher extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Voucher_ongkir_model', 'voucher');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['voucher'] = $this->voucher->getData()->result_array();
            $this->load->view('admin/pages/voucher/list', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            if ($this->input->post('kirim')) {
                $code = $this->input->post('code_voucher');
                $discount = $this->input->post('discount_voucher');
                
                //validate data
                $this->form_validation->set_rules('code_voucher', 'Kode Voucher', 'required|is_unique[voucher_ongkir.code_voucher]');
                $this->form_validation->set_rules('discount_voucher', 'Diskon Voucher', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/pages/voucher/form_voucher');
                }else{
                    $data = array(
                        "code_voucher" => $code,
                        "discount_voucher" => $discount,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->voucher->insert($data)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dimasukkan</div>'
                        );
                        redirect('admin/voucher');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/voucher');
                    }
                }
            } else {
                $this->load->view('admin/pages/voucher/form_voucher');
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah($id)
    {
        if ($this->adminIsLoggedIn()) {
            $data['voucher'] = $this->voucher->getById($id);
            // var_dump($data['voucher']->code_voucher);
            // die();
            if ($this->input->post('kirim')) {
                $code = $this->input->post('code_voucher');
                $discount = $this->input->post('discount_voucher');
                
                if($this->input->post('code_voucher') != $data['voucher']->code_voucher) {
                    $is_unique =  '|is_unique[voucher_ongkir.code_voucher]';
                 } else {
                    $is_unique =  '';
                 }
                 
                //validate data
                $this->form_validation->set_rules('code_voucher', 'Kode Voucher', 'required'.$is_unique);
                $this->form_validation->set_rules('discount_voucher', 'Diskon Voucher', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('admin/pages/voucher/form_voucher', $data);
                }else{
                    $dataInput = array(
                        "code_voucher" => $code,
                        "discount_voucher" => $discount,
                        "created_at" => date("Y-m-d H:i:s"),
                        "updated_at" => date("Y-m-d H:i:s")
                    );
                    if ($this->voucher->updateData($dataInput, $id)) {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil disimpan</div>'
                        );
                        redirect('admin/voucher');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                        );
                        redirect('admin/voucher');
                    }
                }
            } else {
                $this->load->view('admin/pages/voucher/form_voucher',$data);
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function hapus()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->post('id');
            // var_dump($id);die;
            if ($this->voucher->delete("id_voucher", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/voucher');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/voucher');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
