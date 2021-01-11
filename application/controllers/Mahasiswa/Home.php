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

    function pengajuan()
    {
        $config = array(
            'title' => 'Pengajuan PKL',
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
            "title"      => 'Pengajuan PKL',
            'wrapper' => [
                (object)array(
                    'title' => 'Home',
                    'link' => 'mahasiswa/home',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Pengajuan',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "id" => $id,
            "perusahaan" => $this->modelmhs->getWhere2('perusahaan', ['user_id' => $id])
        );
        $this->load->view('mahasiswa/view/dashboard/add', $data);
    }

    public function createPengajuan()
    {
        $data = [
            "perusahaan_id" => $this->input->post('perusahaan'),
            "tanggal_pkl" => $this->input->post('tanggal'),
            "thn_ajaran" => $this->input->post('tahun'),
            "createAt" => date('Y-m-d')
        ];
        $insertData = $this->modelpkl->insert2('pkl', $data);
        $data2 = [
            "pkl_id" => $insertData,
            "user_id" => $this->input->post('user_id')
        ];
        $this->modelpkl->insert('mhs_pkl', $data2);
        redirect(base_url('mahasiswa/home'));
    }

    function editPengajuan()
    {
        $config = array(
            'title' => 'Edit Pengajuan PKL',
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
            "title"      => 'Pengajuan PKL',
            'wrapper' => [
                (object)array(
                    'title' => 'Home',
                    'link' => 'mahasiswa/home',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Pengajuan',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            "id" => $id,
            "dataPengajuan" => $this->modelpkl->getWhere('pkl', ['id' => $id]),
            "perusahaan" => $this->modelmhs->getWhere2('perusahaan', ['user_id' => $id])
        );
        $this->load->view('mahasiswa/view/dashboard/edit', $data);
    }

    public function delete($id)
    {
        $this->modelpkl->delete('pkl', ['id' => $id]);
        redirect(base_url('mahasiswa/home'));
    }

    public function updatePengajuan()
    {
        $data = [
            "perusahaan_id" => $this->input->post('perusahaan'),
            "tanggal_pkl" => $this->input->post('tanggal'),
            "thn_ajaran" => $this->input->post('tahun'),
            "createAt" => date('Y-m-d')
        ];
        $this->modelpkl->update('pkl', $data, ['id' => $this->input->post('id')]);
        redirect(base_url('mahasiswa/home'));
    }
}
