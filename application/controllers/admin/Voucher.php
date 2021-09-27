<?php

class Voucher extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Voucher_ongkir_model', 'voucher');
        $this->load->library('form_validation');
    }

    public function index(){
        if ($this->adminIsLoggedIn()) {
            $data['voucher'] = $this->voucher->getData()->result_array();
            $this->load->view('admin/pages/voucher/list', $data);
        }else{
            redirect('admin/home/login');
        }
    }

    public function tambah(){
        try {
            if ($this->adminIsLoggedIn()) {
                $code = $this->input->post('code_voucher');
                $discount = $this->input->post('discount_voucher');
    
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
            }else{
                redirect('admin/home/login');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
            );
            redirect('admin/voucher');
        }
        
    }

    public function ubah(){
        if ($this->adminIsLoggedIn()) {

        }else{
            redirect('admin/home/login');
        }
    }

    public function hapus(){
        if ($this->adminIsLoggedIn()) {

        }else{
            redirect('admin/home/login');
        }
    }

}