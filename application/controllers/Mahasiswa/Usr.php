<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usr extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 33) {
            redirect(base_url());
        }
        $this->load->model(array('modelusr'));
    }

    function index()
    {
        $config = array(
            'title' => 'Data User Kelompok',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"     => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title" => 'Data User Kelompok',
            'dataUser' => $this->modelusr->getUserByParent($this->session->userdata('iduser'))
        );
        $this->load->view('mahasiswa/view/usr/index', $data);
    }

    public function add()
    {
        $config = array(
            'title' => 'Add User Kelompok',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"     => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title" => 'Add User Kelompok',
            'wrapper' => [
                (object)array(
                    'title' => 'Usr',
                    'link' => 'mahasiswa/usr',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Add',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataUser' => $this->modelusr->getUserByParent($this->session->userdata('iduser'))
        );
        $this->load->view('mahasiswa/view/usr/add', $data);
    }

    public function create()
    {
        $getUser = $this->modelusr->getUserById('users', ['id' => $this->session->userdata('iduser')]);
        if ($this->session->userdata('parent') == null) {
            $parent_id = $getUser->id;
        } else {
            $parent_id = $getUser->parent;
        }
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'level' => '33',
            'parent' => $parent_id,
            'password' => md5($this->input->post('password')),
        ];
        $getUsername = $this->modelusr->getUserByUsername('users', ['username' => $this->input->post('username')]);
        if ($getUsername) {
            $this->session->set_flashdata('err', 'Username already axist!');
            redirect(base_url('mahasiswa/usr/add'));
        } else {
            $this->modelusr->insert('users', $data);
            $this->session->set_flashdata('sukses', 'User Berhasil Di Create!');
            redirect(base_url('mahasiswa/usr'));
        }
    }

    public function edit($id)
    {
        $config = array(
            'title' => 'Edit User Kelompok',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"     => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title" => 'Edit User Kelompok',
            'wrapper' => [
                (object)array(
                    'title' => 'Usr',
                    'link' => 'mahasiswa/usr',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Edit',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataUser' => $this->modelusr->getUserById('users', ['id' => $id])
        );
        $this->load->view('mahasiswa/view/usr/edit', $data);
    }

    public function change($id)
    {
        $config = array(
            'title' => 'Change Password',
        );
        $data = array(
            "header"     => $this->load->view('mahasiswa/include/header', $config, true),
            "navbar"     => $this->load->view('mahasiswa/include/navbar', array(), true),
            "sidenav"     => $this->load->view('mahasiswa/include/sidenav', array(), true),
            "footer"     => $this->load->view('mahasiswa/include/footer', array(), true),
            "title" => 'Change Password',
            'wrapper' => [
                (object)array(
                    'title' => 'Usr',
                    'link' => 'mahasiswa/usr',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'change',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataUser' => $this->modelusr->getUserById('users', ['id' => $id])
        );
        $this->load->view('mahasiswa/view/usr/change', $data);
    }

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email')
        ];
        $this->modelusr->update('users', $data, ['id' => $this->input->post('id')]);
        $this->session->set_flashdata('sukses', 'User Berhasil Di Update!');
        redirect(base_url('mahasiswa/usr'));
    }

    public function changePassword()
    {
        $data = [
            'password' => md5($this->input->post('password'))
        ];
        $this->modelusr->update('users', $data, ['id' => $this->input->post('id')]);
        $this->session->set_flashdata('sukses', 'User Berhasil Di Update!');
        redirect(base_url('mahasiswa/usr'));
    }

    public function delete($id)
    {
        $this->modelusr->delete('users', ['id' => $id]);
        redirect(base_url('mahasiswa/usr'));
    }
}
