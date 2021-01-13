<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 22) {
            redirect(base_url());
        }
        $this->load->model(array('modelpkl','modeldosen','modelmhs'));
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
            'title' => 'Data PKL',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"    => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title"      => 'Data PKL',
            'wrapper' => [
                (object)array(
                    'title' => 'Pkl',
                    'link' => 'kps/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPkl' => $this->modelpkl->getwhere2('showpkl', ['prodi_id' => $dosen->prodi_id]),
            "dataMhs" => $this->modelmhs->get('showMhs'),
            "dataDosen" => $this->modelmhs->get('showPklDosen'),
        );
        $this->load->view('kps/view/pkl/index', $data);
    }

    function addDospem($idd)
    {
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }
        $dosen = $this->modeldosen->getWhere('dosen', ['user_id' => $id]);
        $config = array(
            'title' => 'Add Dospem',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"     => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title" => 'Add Data Kelompok PKL',
            'wrapper' => [
                (object)array(
                    'title' => 'PKL',
                    'link' => 'kps/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Dospem',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPkl' => $this->modelpkl->getwhere('showpkl', ['pkl_id' => $idd]),
            "dataMhs" => $this->modelmhs->get('showMhs'),
            "dataDospem" => $this->modelmhs->getwhere2('showPklDosen', ['pkl_id' => $idd]),
            'dataDosen' => $this->modeldosen->getWhere2('dosen', ['prodi_id' =>$dosen->prodi_id])
        );
        $this->load->view('kps/view/pkl/add', $data);
    }

    public function create(){
        $data = [];
        for ($i = 0; $i < count($this->input->post('dosen')); $i++){
            $dataResponse = [
                "dosen_id" => $this->input->post('dosen')[$i],
                "pkl_id" => $this->input->post('pkl_id')
            ];
            array_push($data, $dataResponse);
        }
        $this->modelpkl->insertMultiple('dospem', $data);
        redirect(base_url('kps/pkl'));
    }

    public function deleteDospem($id1, $id2){
        $this->modelpkl->delete('dospem', ['dosen_id' => $id2, 'pkl_id' => $id1]);
        redirect(base_url('kps/pkl'));
    }
}
