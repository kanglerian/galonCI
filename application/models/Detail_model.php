<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_model extends CI_Model
{

    public function count()
    {
        $query = $this->db->get('detail_sales');
        return $query->num_rows();
    }

    public function getWhere($where)
    {
        // $id = 'PJ0627375';
        $id = implode("|",$where);
        $query = $this->db->query("SELECT * FROM detail_sales JOIN barang ON barang.id_barang = detail_sales.id_barang WHERE id_sales = '$id'");
        return $query->result();
    }

    public function findAll()
    {
        $query = $this->db->get('detail_sales');
        return $query->result();
    }

    public function getOne($where, $table)
    {
        $query = $this->db->get_where($table, $where);
        return $query->result();
    }

    public function post($data, $table)
    {
        $this->db->insert_batch($table, $data);
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
