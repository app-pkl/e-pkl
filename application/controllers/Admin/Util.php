<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Util extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 00) {
            redirect(base_url());
        }
        $this->load->model(array('modeldosen', 'modeladmin'));
    }

    function index()
    {
        $config = array(
            'title' => 'Data Utils',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"     => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title" => 'Data Utils',
            'wrapper' => [
                (object)array(
                    'title' => 'Util',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "jurusan" => $this->modeladmin->get('jurusan'),
            "prodi" => $this->modeladmin->get('showProdi'),
        );
        $this->load->view('admin/view/util/index', $data);
    }

    public function deleteJurusan($id)
    {
        $this->modeladmin->delete('jurusan', ['id' => $id]);
        redirect(base_url('admin/util'));
    }

    public function deleteProdi($id)
    {
        $this->modeladmin->delete('prodi', ['id' => $id]);
        redirect(base_url('admin/util'));
    }

    public function addJurusan()
    {
        $config = array(
            'title' => 'Add Jurusan',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"     => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title" => 'Add Jurusan',
            'wrapper' => [
                (object)array(
                    'title' => 'Util',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Add Jurusan',
                    'link' => null,
                    'type' => 'active'
                )
            ],
        );
        $this->load->view('admin/view/util/addJurusan', $data);
    }

    public function addProdi()
    {
        $config = array(
            'title' => 'Add Prodi',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"     => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title" => 'Add Prodi',
            'wrapper' => [
                (object)array(
                    'title' => 'Util',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Add Prodi',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "jurusan" => $this->modeladmin->get('jurusan'),
        );
        $this->load->view('admin/view/util/addProdi', $data);
    }

    public function editJurusan($id)
    {
        $config = array(
            'title' => 'Edit Jurusan',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"     => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title" => 'Edit Jurusan',
            'wrapper' => [
                (object)array(
                    'title' => 'Util',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Edit Jurusan',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "dataJurusan" => $this->modeladmin->getWhere('jurusan', ['id' => $id])
        );
        $this->load->view('admin/view/util/editJurusan', $data);
    }

    public function editProdi($id)
    {
        $config = array(
            'title' => 'Edit Prodi',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"     => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title" => 'Edit Prodi',
            'wrapper' => [
                (object)array(
                    'title' => 'Util',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Edit Prodi',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "jurusan" => $this->modeladmin->get('jurusan'),
            "dataProdi" => $this->modeladmin->getWhere('prodi', ['id' => $id])
        );
        $this->load->view('admin/view/util/editProdi', $data);
    }

    public function createJurusan()
    {
        $data = [
            "nama" => $this->input->post('name'),
            "kd_jurusan" => $this->input->post('kode'),
        ];
        $this->modeladmin->insert('jurusan', $data);
        redirect(base_url('admin/util'));
    }

    public function createProdi()
    {
        $data = [
            "nama" => $this->input->post('name'),
            "kd_prodi" => $this->input->post('kode'),
            "jurusan_id" => $this->input->post('jurusan')
        ];
        $this->modeladmin->insert('prodi', $data);
        redirect(base_url('admin/util'));
    }

    public function updateJurusan()
    {
        $data = [
            "nama" => $this->input->post('name'),
            "kd_jurusan" => $this->input->post('kode'),
        ];
        $this->modeladmin->update('jurusan', $data, ['id' => $this->input->post('id')]);
        redirect(base_url('admin/util'));
    }

    public function updateProdi()
    {
        $data = [
            "nama" => $this->input->post('name'),
            "kd_prodi" => $this->input->post('kode'),
            "jurusan_id" => $this->input->post('jurusan')
        ];
        $this->modeladmin->update('prodi', $data, ['id' => $this->input->post('id')]);
        redirect(base_url('admin/util'));
    }
}
