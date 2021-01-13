<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 22) {
            redirect(base_url());
        }
        $this->load->model(array('modelusr', 'modelmhs', 'modelpkl','modeldosen'));
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
            'title' => 'Data Perusahaan',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"     => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title" => 'Data Perusahaan',
            'wrapper' => [
                (object)array(
                    'title' => 'Perusahaan',
                    'link' => 'kps/perusahaan',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPerusahaan' => $this->modelpkl->getWhere2('showperusahaan', ['prodi_id' => $dosen->prodi_id])
        );
        $this->load->view('kps/view/perusahaan/index', $data);
    }
}
