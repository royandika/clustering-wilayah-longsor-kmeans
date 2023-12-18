<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->logged_in == TRUE)
		{
			$this->session->set_flashdata('message', 'Anda sudah login sebagai '.$this->session->username.'!');
			$this->session->set_flashdata('alert', 'primary');
			redirect('home');
		}
		$this->load->model('m_user');
		//$this->output->enable_profiler(TRUE); aktif
		//$this->output->enable_profiler(FALSE); tidak aktif
		//$this->output->enable_profiler(ENVIRONMENT == 'development'); hanya aktif saat localhost
	}
	
	function index()
	{
		$this->load->view('login');
	}
	
	function proses()
	{
		//Validasi form input
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_dash|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|max_length[100]');
		$this->form_validation->set_rules('id_level',	'Tipe User', 'required|numeric');
		$this->form_validation->set_error_delimiters('', '<br/>');
		
		if ($this->form_validation->run() == TRUE) 
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$id_level = $this->input->post('id_level');
			//1.	Cek username dan password di database
			$cek_login = $this->m_user->cek_data_where('user', array('username' => $username, 'password' => $password, 'id_level' => $id_level))->num_rows();
			//1.a. Jika ditemukan kecocokan username dan password
			if($cek_login > 0){
				// Siapkan data sesi
				$data_sesi = $this->m_user->data_sesi($username);
				$session_data = array(
				   'id_user' => $data_sesi->id_user,
				   'username' => $data_sesi->username,
				   'nama_user' => $data_sesi->nama_user,
				   'id_level' => $data_sesi->id_level,
				   'logged_in' => TRUE
				);
				$this->session->set_userdata($session_data);
				$this->session->set_flashdata('title', 'Login Sukses');
				$this->session->set_flashdata('message', 'Selamat datang '.$this->session->username.'!');
				$this->session->set_flashdata('alert', 'success');
				redirect('home');
			}else{
			//1.b. Jika tidak ditemukan kecocokan username dan password
				$this->session->set_flashdata('title', 'Gagal Login');
				$this->session->set_flashdata('message', 'Maaf, username dan password tidak cocok atau ditemukan!');
				$this->session->set_flashdata('alert', 'error');
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('title', 'Gagal Validasi');
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'warning');
			redirect('login');
		}
	}
}
