<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->logged_in != "yes" || $this->session->level != 00) {
            redirect(base_url());
        }
        $this->load->model(array('modelusr'));
    }

    function index()
    {
        $config = array(
            'title' => 'Data Users',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"     => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title" => 'Data Users',
            'dataUser' => $this->modelusr->getListUser('users')
        );
        $this->load->view('admin/view/user/index', $data);
    }

    public function add()
    {
        $config = array(
            'title' => 'Add User',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"    => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title"      => 'Create New User',
            'wrapper' => [
                (object)array(
                    'title' => 'User',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Add',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'dataUser'   => $this->modelusr->getListUser('users')
        );
        $this->load->view('admin/view/user/add', $data);
    }

    public function create()
    {
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'level' => $this->input->post('level'),
            'password' => md5($this->input->post('password')),
        ];
        $getUsername = $this->modelusr->getUserByUsername('users', ['username' => $this->input->post('username')]);
        if ($getUsername) {
            $this->session->set_flashdata('err', 'Username already axist!');
            redirect(base_url('admin/user/add'));
        } else {
            $this->modelusr->insert('users', $data);
            $this->session->set_flashdata('sukses', 'User Berhasil Di Create!');
            redirect(base_url('admin/user'));
        }
    }

    public function edit($id)
    {
        $config = array(
            'title' => 'Add User',
        );

        $data = array(
            "header"     => $this->load->view('admin/include/header', $config, true),
            "navbar"     => $this->load->view('admin/include/navbar', array(), true),
            "sidenav"    => $this->load->view('admin/include/sidenav', array(), true),
            "footer"     => $this->load->view('admin/include/footer', array(), true),
            "title"      => 'Create New User',
            'wrapper' => [
                (object)array(
                    'title' => 'User',
                    'link' => 'admin/user',
                    'type' => 'active'
                ),
                (object)array(
                    'title' => 'Edit',
                    'link' => null,
                    'type' => 'active'
                )
            ],
            'user'   => $this->modelusr->getUserById('users', ['id' => $id])
        );
        $this->load->view('admin/view/user/edit', $data);
    }

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'level' => $this->input->post('level')
        ];
        $this->modelusr->update('users', $data, ['id' => $this->input->post('id')]);
        $this->session->set_flashdata('sukses', 'User Berhasil Di Create!');
        redirect(base_url('admin/user'));
    }

    public function delete($id)
    {
        $this->modelusr->delete('users', ['id' => $id]);
        redirect(base_url('admin/user'));
    }
}
