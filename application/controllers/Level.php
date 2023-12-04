<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if ($this->session->id_level != 1)
		{
			$this->session->set_flashdata('message', 'Maaf, akun anda tidak memiliki izin akses terhadap menu Level!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('home');
		}
		$this->load->model('m_level');
	}
	
	function index()
	{
		$data['title'] = 'Level Akses User';
		$data['list_level'] = $this->m_level->list_level();
		$this->load->view('template/header');
		$this->load->view('level_index', $data);
		$this->load->view('template/footer');
	}
	
	function baru()
	{
		$data['title'] = 'Tambah Level Akses';
		$this->load->view('template/header');
		$this->load->view('level_baru', $data);
		$this->load->view('template/footer');
	}

	function simpan()
	{
		$this->form_validation->set_rules('nama_level', 'Nama Level Akses', 'required|trim|alpha_dash|max_length[20]');
		$this->form_validation->set_error_delimiters('', '<br/>');
		
		if ($this->form_validation->run() == TRUE) 
		{
			$this->m_level->simpan_level();
			$this->session->set_flashdata('message', 'Level akses baru telah berhasil ditambahkan!');
			$this->session->set_flashdata('alert', 'success');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'warning');
		}
		redirect('level');
	}
	
	function update($id_level)
	{
		$data['title'] = 'Perbarui Level Akses';
		$data['data_level'] = $this->m_level->data_level($id_level);
		$this->load->view('template/header');
		$this->load->view('level_update', $data);
		$this->load->view('template/footer');
	}
	
	function perbarui($id_level)
	{
		$this->form_validation->set_rules('nama_level', 'Nama Level Akses', 'required|trim|alpha_dash|max_length[20]');
		$this->form_validation->set_error_delimiters('', '<br/>');
		
		if ($this->form_validation->run() == TRUE) 
		{
			$this->m_level->update_level($id_level);
			$this->session->set_flashdata('message', 'Data level akses telah berhasil diupdate!');
			$this->session->set_flashdata('alert', 'success');
		}else{
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'warning');
		}
		redirect('level');
	}
	
	function hapus($id_level){
		$this->m_level->hapus($id_level);
		$this->session->set_flashdata('message', 'Level akses telah berhasil dihapus!');
		$this->session->set_flashdata('alert', 'success');
		redirect('level');
	}
}