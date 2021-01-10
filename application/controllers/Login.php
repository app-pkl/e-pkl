<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$cek = $this->session->userdata('logged_in');
		if (empty($cek)) {
			$options = array(
				'img_path' => './captcha/', #folder captcha yg sudah dibuat tadi
				'img_url' => base_url('captcha'), #ini arahnya juga ke folder captcha
				'img_width' => '145', #lebar image captcha
				'img_height' => '45', #tinggi image captcha
				'expiration' => 7200, #waktu expired
				'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
				'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)
				# atur warna captcha-nya di sini ya.. gunakan kode RGB
				'colors' => array(
					'background' => array(242, 242, 242),
					'border' => array(255, 255, 255),
					'text' => array(0, 0, 0),
					'grid' => array(255, 40, 40)
				)
			);
			$cap = create_captcha($options);
			$data['image'] = $cap['image'];
			$this->session->set_userdata('mycaptcha', $cap['word']);
			$data['word'] = $this->session->userdata('mycaptcha');
			$this->load->view('login/index', $data);
		} else {
			$st = $this->session->userdata('level');
			if ($st == 00) {
				header('location:' . base_url() . 'admin/home');
			} elseif ($st == 11) {
				header('location:' . base_url() . 'up2ai/home');
			} elseif ($st == 22) {
				header('Location:' . base_url() . "kps/home");
			} elseif ($st == 33) {
				header('Location:' . base_url() . "mahasiswa/home");
			}
		}
	}

	public function getlogin()
	{
		$captcha = $this->input->post('cap'); #mengambil value inputan pengguna
		$word = $this->session->userdata('mycaptcha'); #mengambil value captcha
		if (isset($captcha)) { #cek variabel $captcha kosong/tidak
			if (strtoupper($captcha) == strtoupper($word)) { #proses pencocokan captcha
				$u = $this->input->post('username');
				$p = $this->input->post('password');
				$this->load->model('Modellogin');
				$this->Modellogin->getlogin($u, $p);
			} else {
				// echo "gak sukses";
				$this->session->set_flashdata('cek', 'Captcha Yang Dimasukkan Salah');
				redirect('login/index');
			}
		}
	}

	function register()
	{
		$options = array(
			'img_path' => './captcha/', #folder captcha yg sudah dibuat tadi
			'img_url' => base_url('captcha'), #ini arahnya juga ke folder captcha
			'img_width' => '145', #lebar image captcha
			'img_height' => '45', #tinggi image captcha
			'expiration' => 7200, #waktu expired
			'font_path' => FCPATH . 'assets/font/coolvetica.ttf', #load font jika mau ganti fontnya
			'pool' => '0123456789', #tipe captcha (angka/huruf, atau kombinasi dari keduanya)

			# atur warna captcha-nya di sini ya.. gunakan kode RGB
			'colors' => array(
				'background' => array(242, 242, 242),
				'border' => array(255, 255, 255),
				'text' => array(0, 0, 0),
				'grid' => array(255, 40, 40)
			)
		);
		$cap = create_captcha($options);
		$data['image'] = $cap['image'];
		$this->session->set_userdata('mycaptcha', $cap['word']);
		$data['word'] = $this->session->userdata('mycaptcha');
		// $this->load->view('loginView',$data);
		$this->load->view('login/register', $data);
	}

	function create()
	{
		$captcha = $this->input->post('cap'); #mengambil value inputan pengguna
		$word = $this->session->userdata('mycaptcha'); #mengambil value captcha
		if (isset($captcha)) { #cek variabel $captcha kosong/tidak
			if (strtoupper($captcha) == strtoupper($word)) { #proses pencocokan captcha
				$post = $this->input->post();
				$this->form_validation->set_rules('username', 'username', 'trim|required');
				if ($this->form_validation->run() == true) {
					$username = $post['username'];
					if (!$this->db->get_where('users', array('username' => $username))->row()) {
						$data = array(
							'name'	=> $post['name'],
							'username'	=> $post['username'],
							'email'	=> $post['email'],
							'password'	=> md5($post['password']),
							'level'		=> '33',
						);
						$this->db->insert('users', $data);
						$this->session->set_flashdata('sukses', 'Akun Anda Berhasil di Buat');
						redirect('login/register');
					} else {
						$this->session->set_flashdata('err', 'username Telah digunakan');
						redirect('login/register');
					}
				}
			} else {
				$this->session->set_flashdata('cek', 'Capcha Yang Dimasukkan Salah');
				redirect('login/register');
			}
		}
	}
}
