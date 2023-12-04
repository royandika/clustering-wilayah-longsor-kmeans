<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataset extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		/*$level = array('1','2');
		if (!$this->session->id_level == $level)
		{
			$this->session->set_flashdata('message', 'Maaf, akun anda tidak memiliki izin akses terhadap menu Pelanggan!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('pelanggan');
		}*/
		$this->load->model('m_dataset');
	}
	
	function index()
	{
		$data['title'] = 'Dataset Kejadian Bencana Longsor';
		$data['data_bencana'] = $this->m_dataset->listing();
		$this->load->view('tabler/header', $data);
		$this->load->view('dataset/index', $data);
		$this->load->view('tabler/footer');
	}
	
	function import()
	{
		$csv_data = $this->m_dataset->parse_csv($_FILES["csv_file"]["tmp_name"]);
		$this->m_dataset->import_csv($csv_data);
		$this->session->set_flashdata('message', 'Dataset berhasil disimpan ke database!');
		$this->session->set_flashdata('alert', 'success');
		redirect('dataset');
	}
	
	function hapus_semua()
	{
		$this->db->truncate('kejadian');
		$this->session->set_flashdata('message', 'Semua data dataset berhasil dihapus dari database!');
		$this->session->set_flashdata('alert', 'success');
		redirect('dataset');
	}
	
}