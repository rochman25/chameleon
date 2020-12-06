<?php

class Banner extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Banner_model', 'banner');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $data['banner'] = $this->banner->getData()->result_array();
            $this->load->view('admin/pages/kategori', $data);
        } else {
            redirect('admin/home/login');
        }
    }
}