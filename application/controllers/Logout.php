<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Logout extends CI_Controller
{

	public function _construct()
	{
		session_start();
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			redirect(base_url('login'));
		} else {
			$this->session->sess_destroy();
			redirect(base_url(''));
		}
	}
}
