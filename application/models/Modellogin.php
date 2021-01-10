<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Modellogin extends CI_Model
{
	public function getlogin($usr, $pwd)
	{
		$u = $usr;
		$p = md5($pwd);
		$cekLogin = $this->db->get_where('users', array('username' => $u, 'password' => $p))->row();
		if ($cekLogin) {
			if ($cekLogin->level == 00) {
				$data = array(
					'logged_in' 	=> 'yes',
					'iduser'		=> $cekLogin->id,
					'username'		=> $cekLogin->username,
					'name'			=> $cekLogin->name,
					'status'		=> $cekLogin->email,
					'parent'		=> $cekLogin->parent,
					'level'			=> $cekLogin->level,
				);
				$this->session->set_userdata($data);
				header('Location:' . base_url() . 'admin/home');
			}
			if ($cekLogin->level == 11) {
				$data = array(
					'logged_in' 	=> 'yes',
					'iduser'		=> $cekLogin->id,
					'username'		=> $cekLogin->username,
					'name'			=> $cekLogin->name,
					'status'		=> $cekLogin->email,
					'parent'		=> $cekLogin->parent,
					'level'			=> $cekLogin->level,
				);
				$this->session->set_userdata($data);
				header('Location:' . base_url() . 'up2ai/home');
			}
			if ($cekLogin->level == 22) {
				$data = array(
					'logged_in' 	=> 'yes',
					'iduser'		=> $cekLogin->id,
					'username'		=> $cekLogin->username,
					'name'		=> $cekLogin->name,
					'status'		=> $cekLogin->email,
					'parent'		=> $cekLogin->parent,
					'level'			=> $cekLogin->level,
				);
				$this->session->set_userdata($data);
				header('Location:' . base_url() . 'kps/home');
			}
			if ($cekLogin->level == 33) {
				$data = array(
					'logged_in' 	=> 'yes',
					'iduser'		=> $cekLogin->id,
					'username'		=> $cekLogin->username,
					'name'		=> $cekLogin->name,
					'status'		=> $cekLogin->email,
					'parent'		=> $cekLogin->parent,
					'level'			=> $cekLogin->level,
				);
				$this->session->set_userdata($data);
				header('Location:' . base_url() . 'mahasiswa/home');
			}
		} else {
			$this->session->set_flashdata('err', 'Username or Password wrong!');
			redirect(base_url('login'));
		}
	}
}
