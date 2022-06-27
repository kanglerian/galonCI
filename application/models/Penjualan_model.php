<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

    public function count()
    {
        $query = $this->db->get('sales');
        return $query->num_rows();
    }
    public function findAll()
    {
        $query = $this->db->query('SELECT * FROM sales JOIN custumer ON custumer.id_customer = sales.id_customer');
        return $query->result();
    }

    public function getOne($where, $table)
    {
        $id = implode("|",$where);
        $query = $this->db->query("SELECT * FROM sales JOIN custumer ON custumer.id_customer = sales.id_customer JOIN users ON users.id_users = sales.id_users WHERE id_sales = '$id'");
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