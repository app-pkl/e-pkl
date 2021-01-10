<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMhs extends CI_Model
{
    public function showMahasiswa($table, $where)
    {
        return $this->db->get_where($table, $where)->result();
    }

    public function showMhsById($table, $where)
    {
        return $this->db->get_where($table, $where)->result();
    }

    public function getMhs($table)
    {
        return $this->db->get($table)->result();
    }

    public function get($table)
    {
        return $this->db->get($table)->result();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function getWhere($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function getWhere2($table, $where)
    {
        return $this->db->get_where($table, $where)->result();
    }

    public function update($table, $data, $id)
    {
        return $this->db->update($table, $data, $id);
    }

    public function delete($table, $id)
    {
        $this->db->delete($table, $id);
    }
}
