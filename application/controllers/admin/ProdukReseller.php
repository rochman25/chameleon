<?php


class ProdukReseller extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_model', 'produk');
        $this->load->model('ProdukReseller_model', 'produk_reseller');
        $this->load->model('Kategori_model', 'kategori');
        $this->load->model('SubProduk_model', 'subproduk');
        $this->load->model('SizeProdukCelana_model', 'sizecelana');
        $this->load->model('SizeStock_model', 'sizestock');
        $this->load->library('upload');
    }

    public function index()
    {
        if ($this->adminIsLoggedIn()) {
            $thumbnail = array();
            $data['produk'] = $this->produk_reseller->getDataReseller();
            // die(json_encode($data));
            foreach ($data['produk'] as $index => $row) {
                $foto = explode(',', $row['thumbnail_produk']);
                $thumbnail[$row['id_produk']] = $foto[0];
                $data['produk'][$index]['stok_produk'] = $this->sizestock->calculateSizeStock($row['id_produk']);
            }
            // die(json_encode($data));
            $data['thumbnail'] = $thumbnail;
            $this->load->view('admin/pages/reseller/produk/list', $data);
        } else {
            redirect('admin/home/login');
        }
    }

    public function tambah()
    {
        if ($this->adminIsLoggedIn()) {
            $diskon_percent = 0;
            if ($this->input->post('kirim')) {
                $this->db->trans_begin();
                $id_produk = $this->input->post('id_p');
                $harga_p = $this->input->post('harga_p');
                $diskon_p = $this->input->post('diskon_p');
                $diskon_percent = 0;
                if ($diskon_p) {
                    $diskon_percent = 100 * ($harga_p - $diskon_p) / $harga_p;
                }
                $data = array(
                    "id_produk" => $id_produk,
                    "harga_produk" => $harga_p,
                    "diskon_produk" => $diskon_percent,
                    "created_at" => date("Y-m-d H:i:s")
                );

                if ($this->produk_reseller->tambah_produk($data)) {

                    $this->db->trans_commit();
                    $this->session->unset_userdata('produk_data');
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil ditambahkan</div>'
                    );
                    redirect('admin/produk/reseller');
                } else {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    redirect('admin/produk/reseller');
                }
            } else {
                $data['master_produk'] = $this->produk->getData()->result();
                $this->load->view('admin/pages/reseller/produk/form_produk', $data);
            }
        } else {
            redirect('admin/home/login');
        }
    }

    public function ubah()
    {
        if ($this->adminIsLoggedIn()) {
            $id = $this->input->get('id');
            $diskon_percent = 0;
            $data['produk'] = $this->produk->getById($id);
            $reseller_produk = $this->produk_reseller->getByIdProduk($data['produk']->id_produk);
            if($reseller_produk){
                $data['produk']->harga_produk = $reseller_produk->harga_produk;
                $data['produk']->diskon_produk = $reseller_produk->diskon_produk;
            }
            if ($this->input->post('kirim')) {
                $this->db->trans_begin();
                $id_produk = $this->input->post('id_p');
                $harga_p = $this->input->post('harga_p');
                $diskon_p = $this->input->post('diskon_p');
                if ($diskon_p) {
                    $diskon_percent = 100 * ($harga_p - $diskon_p) / $harga_p;
                }
                $data = array(
                    "id_produk" => $id_produk,
                    "harga_produk" => $harga_p,
                    "diskon_produk" => $diskon_percent
                );
                if($reseller_produk){
                    $data['updated_at'] = date("Y-m-d H:i:s");
                    $query = $this->produk_reseller->updateData($data, $reseller_produk->id_produk_reseller);
                }else{
                    $data['created_at'] = date("Y-m-d H:i:s");
                    $query = $this->produk_reseller->insert($data);
                }
                if ($query) {
                    //sub produk

                    $this->db->trans_commit();
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil diubah</div>'
                    );
                    redirect('admin/produk/reseller');
                } else {
                    $this->db->trans_rollback();
                    $this->session->set_flashdata(
                        'pesan',
                        '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                    );
                    redirect('admin/produk/reseller/ubah?id='.$id);
                }
            } else {
                $data['master_produk'] = $this->produk->getData()->result();
                $this->load->view('admin/pages/reseller/produk/form_produk', $data);
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
            if ($this->produk_reseller->delete("id_produk_reseller", $id)) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success mr-auto alert-dismissible">Data Berhasil dihapus</div>'
                );
                redirect('admin/produk/reseller');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger mr-auto alert-dismissible">Ada masalah</div>'
                );
                redirect('admin/produk/reseller');
            }
        } else {
            redirect('admin/home/login');
        }
    }
}
