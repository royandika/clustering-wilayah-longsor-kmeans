<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->isAdmin();
		$this->load->model('m_user');
	}
	
	function index()
	{
		$data['title'] = 'Data User';
		$data['list_user'] = $this->m_user->list_user();
		$this->load->view('tabler/header_open', $data);
		$this->load->view('libraries/header_datatable', $data);
		$this->load->view('tabler/header_close', $data);
		$this->load->view('user/user_index', $data);
		$this->load->view('tabler/footer_open');
		$this->load->view('libraries/footer_datatable');
		$this->load->view('tabler/footer_close');
	}
	
	function baru()
	{
		$data['title'] = 'Tambah Data User';
		$this->load->view('tabler/header_open', $data);
		$this->load->view('tabler/header_close', $data);
		$this->load->view('user/user_baru', $data);
		$this->load->view('tabler/footer_open');
		$this->load->view('tabler/footer_close');
	}

	function simpan()
	{
		$this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required|trim|alpha_numeric_spaces|max_length[35]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_dash|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[32]');
		$this->form_validation->set_rules('password_conf', 'Password Konfirmasi', 'required|matches[password]');
		$this->form_validation->set_rules('id_level',	'Tipe User', 'required|numeric');
		$this->form_validation->set_error_delimiters('', '<br/>');
		
		if ($this->form_validation->run() == TRUE) 
		{
			$this->m_user->simpan_user();
			$this->session->set_flashdata('message', 'User baru telah berhasil ditambahkan!');
			$this->session->set_flashdata('alert', 'success');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'warning');
		}
		redirect('user');
	}
	
	function update($id_user)
	{
		$data['title'] = 'Perbarui Data User';
		$data['data_user'] = $this->m_user->data_user($id_user);
		$this->load->view('tabler/header_open', $data);
		$this->load->view('tabler/header_close', $data);
		$this->load->view('user/user_update', $data);
		$this->load->view('tabler/footer_open');
		$this->load->view('tabler/footer_close');
	}
	
	function perbarui($id_user)
	{
		$this->form_validation->set_rules('nama_user', 'Nama Lengkap', 'required|trim|alpha_numeric_spaces|max_length[35]');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|alpha_dash|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|alpha_numeric|max_length[32]');
		$this->form_validation->set_rules('password_conf', 'Password Konfirmasi', 'required|matches[password]');
		$this->form_validation->set_rules('id_level', 'Tipe User', 'required|numeric');
		$this->form_validation->set_error_delimiters('', '<br/>');
		
		if ($this->form_validation->run() == TRUE) 
		{
			$this->m_user->update_user($id_user);
			$this->session->set_flashdata('message', 'Data user telah berhasil diupdate!');
			$this->session->set_flashdata('alert', 'success');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'warning');
		}
		redirect('user');
	}
	
	function hapus($id_user){
		$this->m_user->hapus($id_user);
		$this->session->set_flashdata('message', 'Data user telah berhasil dihapus!');
		$this->session->set_flashdata('alert', 'success');
		redirect('user');
	}
}