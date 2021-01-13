<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 22) {
            redirect(base_url());
        }
        $this->load->model(array('modelmhs', 'modeladmin','modeldosen'));
    }

    function index()
    {
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }
        $dosen = $this->modeldosen->getWhere('dosen', ['user_id' => $id]);

        $config = array(
            'title' => 'Data Mahasiswa',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"     => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title" => 'Data Mahasiswa',
            'wrapper' => [
                (object)array(
                    'title' => 'Mhs',
                    'link' => 'kps/mahasiswa',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataMahasiswa' => $this->modelmhs->showMahasiswa('showmhsprodi', array('prodi_id' => $dosen->prodi_id))
        );
        $this->load->view('kps/view/mahasiswa/index', $data);
    }
}