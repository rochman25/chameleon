<?php

class Alamat_model extends MY_Model
{
    protected $table = "alamat_pengguna";

    function __construct()
    {
        parent::__construct();
    }

    function updateData($data, $id)
    {
        $this->getWhere('id_alamat', $id);
        return $this->update($data);
    }

    function insertData($data)
    {
        $this->db->set('id_alamat', 'UUID()', false);
        return $this->insert($data);
    }
}
