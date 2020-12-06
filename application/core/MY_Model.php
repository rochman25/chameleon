<?php

class MY_Model extends CI_Model{
    
    protected $table = "";

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function custom($q)
    {
        $query = $this->db->query($q);
        return $query;
    }

    function select($col)
    {
        $query = $this->db->select($col);
        return $query;
    }

    function getWhere($col, $kon)
    {
        $query = $this->db->where($col, $kon);
        return $query;
    }

    function order_by($col,$mode){
        $query = $this->db->order_by($col,$mode);
        return $query;
    }

    function getWhereArr($array)
    {
        $query = $this->db->where($array);
        return $query;
    }

    function getData()
    {
        $query = $this->db->get($this->table);
        return $query;
    }

    function getJoin($table, $condition, $type)
    {
        $query = $this->db->join($table, $condition, $type);
        return $query;
    }

    function distinct($col)
    {
        $query = $this->db->distinct();
        $query = $this->db->select($col);
        return $query;
    }

    function distinctWithNoCol(){
        $query = $this->db->distinct();
        return $query;
    }

    function insert($data)
    {
        $query = $this->db->insert($this->table, $data);
        return $query;
    }

    public function insert_multiple($data)
    {
        $query = $this->db->insert_batch($this->table, $data);
        return $query;
    }

    public function update_multiple($data,$id){
        $query = $this->db->update_batch($this->table,$data,$id);
        return $query;
    }

    function update($data)
    {
        $query = $this->db->update($this->table, $data);
        return $query;
    }

    function delete($col, $condition)
    {
        $query = $this->db->where($col, $condition);
        $query = $this->db->delete($this->table);
        return $query;
    }

    function delete_arr($where){
        $query = $this->db->where($where);
        $query = $this->db->delete($this->table);
        return $query;
    }

    function getInsertId(){
        return $this->db->insert_id();
    }

    function limit($number){
        return $this->db->limit($number);
    }

    function Login($where)
    {
        return $this->db->get_where($this->table, $where);
    }

    function getLike($title,$match,$wildcard = 'none'){
        return $this->db->like($title,$match,$wildcard);
    }


}