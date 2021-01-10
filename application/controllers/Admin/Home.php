<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 00) {
            redirect(base_url());
        }
        $this->load->model(array('modelusr'));
    }

    function index()
    {
        $config = array(
            'title' => 'Dashboard',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"    => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title"      => 'Dashboard',
            // "dataPengajuan" => $this->modelusr->showPklById('pkl')
        );
        $this->load->view('admin/view/dashboard/index', $data);
    }
}
