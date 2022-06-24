<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function getAll()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function getOne($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function save($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function put($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function remove($data, $table)
    {
        $this->db->delete($table, $data);
    }
}