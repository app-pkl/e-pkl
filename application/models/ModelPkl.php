<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPkl extends CI_Model
{
    public function showPerusahaanById($table, $where)
    {
        return $this->db->get($table, $where)->result();
    }

    public function pengajuanPkl($id)
    {
        $this->db->select('mp.user_id, pkl.id as pkl_id, pkl.tanggal_pkl, pkl.thn_ajaran, pkl.createAt, pkl.status_daftar, pkl.status_val, pkl.status_pkl, p.nama as perusahaan');
        $this->db->from('mhs_pkl as mp');
        $this->db->join('pkl', 'pkl.id = mp.pkl_id');
        $this->db->join('perusahaan as p', 'p.id = pkl.perusahaan_id');
        $this->db->where('mp.user_id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function showPklById($table, $where = null)
    {
        return $this->db->get($table)->result();
    }

    public function getData($table)
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
