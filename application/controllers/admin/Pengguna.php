<?php


class Pengguna extends MY_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Pengguna_model','pengguna');
    }

    public function index(){
       if($this->adminIsLoggedIn()){
           $pengguna = $this->pengguna->getData()->result_array();
           $data = [
               "pengguna" => $pengguna
           ];
           $this->load->view('admin/pages/pengguna/list_pengguna',$data);
       }else{
           redirect('admin/home/login');
       }
    }

    public function detail(){
        if($this->adminIsLoggedIn()){
            $id = $this->input->get('id');
            if($id){
                $cek = $this->pengguna->getWhere('pengguna.id_pengguna',$id);
                $cek = $this->pengguna->getJoin("alamat_pengguna","alamat_pengguna.id_pengguna = pengguna.id_pengguna", "left");
                $cek = $this->pengguna->getData()->row();
                if($cek){
                    $data['pengguna'] = $cek;
                    $this->load->view('admin/pages/pengguna/detail_pengguna',$data);
                }
            }
        }else{
            redirect('admin/home/login');
        }
    }

    public function ubah(){
        if($this->adminIsLoggedIn()){
            $id = $this->input->post('id');
            $status = $this->input->post('status_u');

            $data = array(
                "status" => $status,
                "updated_at" => date("Y-m-d H:i:s")
            );

            // die(json_encode($data));

            if($this->pengguna->updateData($data, $id)){
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                );
                redirect('admin/pengguna');
            }else{
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/pengguna');
            }

        }else{
            redirect('admin/home/login');
        }
    }

}