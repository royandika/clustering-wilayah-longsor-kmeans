<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function index()
	{
		$session_data = array('username', 'id_level', 'logged_in');
		$this->session->unset_userdata($session_data);
		$this->session->set_flashdata('message', 'Anda sudah berhasil logout!');
		$this->session->set_flashdata('alert', 'success');
		//$this->session->sess_destroy();
		//session_destroy();
		redirect('login');
	}
}
