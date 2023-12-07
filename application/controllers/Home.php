<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->isLogin();
		$this->load->model('m_user');
	}
	
	function index()
	{
		$data['title'] = 'Beranda';
		$this->load->view('tabler/header_open', $data);
		$this->load->view('tabler/header_close', $data);
		$this->load->view('home');
		$this->load->view('tabler/footer_open');
		$this->load->view('tabler/footer_close');
	}
	
	function template()
	{
		$data['title'] = 'Template';
		$this->load->view('tabler/header', $data);
		$this->load->view('tabler/content');
		$this->load->view('tabler/footer');
	}

}