<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*
		ini komentar
		bisa panjang
		ke bawah
	*/
	//ini komentar sebaris
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
}
