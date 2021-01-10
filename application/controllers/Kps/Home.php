<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 22) {
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
            "header"     => $this->load->view('up2ai/include/header', $config, true),
            "navbar"     => $this->load->view('up2ai/include/navbar', array(), true),
            "sidenav"    => $this->load->view('up2ai/include/sidenav', array(), true),
            "footer"     => $this->load->view('up2ai/include/footer', array(), true),
            "title"      => 'Dashboard',
            // "dataPengajuan" => $this->modelusr->showPklById('pkl')
        );
        $this->load->view('kps/view/dashboard/index', $data);
    }
}
