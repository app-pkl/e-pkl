<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 33) {
            redirect(base_url());
        }
        $this->load->model(array('modelpkl', 'modelmhs'));
    }

    function index()
    {
        $config = array(
            'title' => 'Dashboard',
        );
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"    => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title"      => 'Dashboard',
            'wrapper' => [
                (object)array(
                    'title' => 'Home',
                    'link' => 'mahasiswa/home',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Dashboard',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "id" => $id,
            "dataPengajuan" => $this->modelpkl->pengajuanPkl($id),
            "dataMhs" => $this->modelmhs->getWhere2('showMhs', ['user_id' => $id])
        );
        $this->load->view('mahasiswa/view/dashboard/index', $data);
    }
}
