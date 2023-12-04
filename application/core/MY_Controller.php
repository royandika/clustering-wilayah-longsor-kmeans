<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	function isLogin()
	{
		if ($this->session->logged_in != TRUE)
		{
			$this->session->set_flashdata('title', 'Belum Login');
			$this->session->set_flashdata('message', 'Silahkan login terlebih dahulu!');
			$this->session->set_flashdata('alert', 'error');
			redirect('login');
		}
	}

	function isAdmin()
	{
		if ($this->session->id_level != 1)
		{
			$this->session->set_flashdata('title', 'Khusus Admin');
			$this->session->set_flashdata('message', 'Maaf, menu hanya dapat diakses oleh Admin!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('home');
		}
	}
	
	function isHR()
	{
		$hr = array('1','2','3','4');
		if(!in_array($this->session->id_level, $hr))
		{
			$this->load->library('user_agent');
			$this->session->set_flashdata('title', 'Khusus HR');
			$this->session->set_flashdata('message', 'Maaf, menu hanya dapat diakses oleh user dari departemen HR!');
			$this->session->set_flashdata('alert', 'warning');
			redirect($this->agent->referrer());
		}
	}
	
	function isHRM()
	{
		$hrm = array('1','2');
		if(!in_array($this->session->id_level, $hrm))
		{
			$this->load->library('user_agent');
			$this->session->set_flashdata('title', 'Khusus Manager HR');
			$this->session->set_flashdata('message', 'Maaf, menu hanya dapat diakses oleh HR Manager!');
			$this->session->set_flashdata('alert', 'warning');
			redirect($this->agent->referrer());
		}
	}
	
	function isHRF()
	{
		$hrf = array('1','3','4');
		if(!in_array($this->session->id_level, $hrf))
		{
			$this->load->library('user_agent');
			$this->session->set_flashdata('title', 'Khusus HR');
			$this->session->set_flashdata('message', 'Maaf, menu hanya dapat diakses oleh PIC HR di Factory masing-masing!');
			$this->session->set_flashdata('alert', 'warning');
			redirect($this->agent->referrer());
		}
	}
	
	function tampil_list($table, $order_by) {
		$this->db->from($table);
		$this->db->select('*');
		$this->db->order_by($order_by, 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0)
		{
			foreach ($query->result() as $data)
			{
				$tampil_list[] = $data;
			}
			return $tampil_list;
		}
	}
	
	function cek_data_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	
	function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

}