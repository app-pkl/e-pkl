<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 33) {
            redirect(base_url());
        }
        // $this->load->model(array('m_petugas2'));
    }

    function index()
    {
        $config = array(
            'title' => 'Dashboard',
        );

        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"     => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "menu"         => 'menu',
            "title"     => 'title',
            "toltip"    => 'joe',
        );
        $this->load->view('mahasiswa/view/setting/index', $data);
    }
}
