<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

    public function count()
    {
        $query = $this->db->get('users');
        return $query->num_rows();
    }
    public function findAll()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function getOne($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function post($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function patch($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function delete($data, $table)
    {
        $this->db->delete($table, $data);
    }
}