<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 33) {
            redirect(base_url());
        }
        $this->load->model(array('modelpkl'));
    }

    function index()
    {
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }
        $config = array(
            'title' => 'Data Perusahaan',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"    => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title"      => 'Data Perusahaan',
            'wrapper' => [
                (object)array(
                    'title' => 'Pkl',
                    'link' => 'mahasiswa/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPerusahaan'  => $this->modelpkl->getWhere2('perusahaan', array('user_id' => $id))
        );
        $this->load->view('mahasiswa/view/pkl/index', $data);
    }

    public function add()
    {
        $config = array(
            'title' => 'Add Perusahaan',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"    => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title"      => 'Add Perusahaan',
            'wrapper' => [
                (object)array(
                    'title' => 'Pkl',
                    'link' => 'mahasiswa/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'perusahaan',
                    'link' => null,
                    'type' => 'active'
                )
            ],
        );
        $this->load->view('mahasiswa/view/pkl/add', $data);
    }

    public function create()
    {
        if ($this->session->userdata('parent') == null) {
            $id = $this->session->userdata('iduser');
        } else {
            $id = $this->session->userdata('parent');
        }
        $data = [
            "nama" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "telphon" => $this->input->post('telphon'),
            "provinsi" => $this->input->post('provinsi'),
            "kabupaten" => $this->input->post('kabupaten'),
            "kecamatan" => $this->input->post('kecamatan'),
            "alamat" => $this->input->post('alamat'),
            "kode_pos" => $this->input->post('kode_pos'),
            "user_id" => $id,
        ];
        $this->modelpkl->insert('perusahaan', $data);
        redirect(base_url('mahasiswa/pkl'));
    }

    function edit($id)
    {
        $config = array(
            'title' => 'Edit Data Perusahaan',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"    => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title"      => 'Edit Data Perusahaan',
            'wrapper' => [
                (object)array(
                    'title' => 'Pkl',
                    'link' => 'mahasiswa/pkl',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'index',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataPerusahaan'  => $this->modelpkl->getWhere('perusahaan', array('id' => $id))
        );
        $this->load->view('mahasiswa/view/pkl/edit', $data);
    }

    public function update()
    {
        $data = [
            "nama" => $this->input->post('name'),
            "email" => $this->input->post('email'),
            "telphon" => $this->input->post('telphon'),
            "provinsi" => $this->input->post('provinsi'),
            "kabupaten" => $this->input->post('kabupaten'),
            "kecamatan" => $this->input->post('kecamatan'),
            "alamat" => $this->input->post('alamat'),
            "kode_pos" => $this->input->post('kode_pos'),
            "user_id" => $this->input->post('user_id'),
        ];
        $this->modelpkl->update('perusahaan', $data, ['id' => $this->input->post('id')]);
        redirect(base_url('mahasiswa/pkl'));
    }

    public function delete($id)
    {
        $this->modelpkl->delete('perusahaan', ['id' => $id]);
        redirect(base_url('mahasiswa/pkl'));
    }
}
