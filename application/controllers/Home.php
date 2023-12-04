<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if (!$this->session->logged_in == TRUE)
		{
			$this->session->set_flashdata('message', 'Anda belum login!');
			$this->session->set_flashdata('alert', 'danger');
			redirect('login');
		}
		$this->load->model('m_user');
	}
	
	function index()
	{
		$data['title'] = 'Beranda';
		$this->load->view('tabler/header', $data);
		
		//tampilan jika user adalah pelanggan
		if($this->session->id_level == '3')
		{
			$this->load->model('m_pelanggan');
			$data['data_customer'] = $this->m_pelanggan->data_customer();
			$this->load->view('customer_index', $data);
		}else{
		//tampilan jika user adalah admin/petugas
			$this->load->view('home');
		}
		
		$this->load->view('tabler/footer');
	}
	
	function template()
	{
		$data['title'] = 'Template';
		$this->load->view('tabler/header', $data);
		$this->load->view('tabler/content');
		$this->load->view('tabler/footer');
	}

}