<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 22) {
            redirect(base_url());
        }
        $this->load->model(array('modeldosen', 'modeladmin','modeldosen', 'modelmhs'));
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
            'title' => 'Data Dosen',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"     => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title" => 'Data Dosen',
            'wrapper' => [
                (object)array(
                    'title' => 'Dosen',
                    'link' => 'kps/dosen',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataDosen' => $this->modeldosen->getWhere2('dosen', ['prodi_id' =>$dosen->prodi_id])
        );
        $this->load->view('kps/view/dosen/index', $data);
    }

    function add()
    {
        $config = array(
            'title' => 'Add Data Dosen',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"     => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title" => 'Add Data Dosen',
            'wrapper' => [
                (object)array(
                    'title' => 'KPS',
                    'link' => 'kps/dosen',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Add',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'jurusan' => $this->modeladmin->get('jurusan')
        );
        $this->load->view('kps/view/dosen/add', $data);
    }

    public function loadData()
    {
        $modul = $this->input->post('module');
        $id = $this->input->post('id');
        if ($modul == 'prodi') {
            $data = $this->modeladmin->getWhere2('prodi', ['jurusan_id' => $id]);
            echo "<option>Pilih Prodi...</option>";
            foreach ($data as $val) {
                echo "<option value=" . '"' . $val->id . '"' . ">" . $val->nama . "</option>";
            }
        }
    }

    public function create()
    {
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }

        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('name'),
            'prodi_id' => $this->input->post('prodi'),
            'user_id' => $id
        ];
        $this->modeldosen->insert('dosen', $data);
        redirect(base_url('kps/dosen'));
    }

    function edit($id)
    {
        $config = array(
            'title' => 'Edit Data Dosen',
        );
        $data = array(
            "header"     => $this->load->view('kps/include/header', $config, true),
            "navbar"     => $this->load->view('kps/include/navbar', array(), true),
            "sidenav"     => $this->load->view('kps/include/sidenav', array(), true),
            "footer"     => $this->load->view('kps/include/footer', array(), true),
            "title" => 'Edit Data Dosen',
            'wrapper' => [
                (object)array(
                    'title' => 'KPS',
                    'link' => 'kps/dosen',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Edit',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'jurusan' => $this->modeladmin->get('jurusan'),
            'dataDosen' => $this->modelmhs->getWhere('dosen', array('id' => $id))
        );
        $this->load->view('kps/view/dosen/edit', $data);
    }

    public function update()
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'nama' => $this->input->post('name'),
            'prodi_id' => $this->input->post('prodi'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->modeldosen->update('dosen', $data, ['id' => $this->input->post('id')]);
        redirect(base_url('kps/dosen'));
    }

    public function delete($id)
    {
        $this->modeldosen->delete('dosen', ['id' => $id]);
        redirect(base_url('kps/dosen'));
    }
}
