<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUsr extends CI_Model
{
    public function getUserByParent($id)
    {
        $sql = 'SELECT * from users where id=? or parent=?';
        return $this->db->query($sql, [$id, $id])->result();
    }

    public function getListUser($table)
    {
        return $this->db->get($table)->result();
    }

    public function getUserByUsername($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function getUserById($table, $where)
    {
        return $this->db->get_where($table, $where)->row();
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
