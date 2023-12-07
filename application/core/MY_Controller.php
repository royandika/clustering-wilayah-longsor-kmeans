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
		//$hr = array('1','2','3','4');
		//if(!in_array($this->session->id_level, $hr))
		if ($this->session->id_level != 1)
		{
			$this->session->set_flashdata('title', 'Khusus Admin');
			$this->session->set_flashdata('message', 'Maaf, menu hanya dapat diakses oleh Admin!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('home');
		}
	}
	
	function isUser()
	{
		if ($this->session->id_level != 2)
		{
			$this->session->set_flashdata('title', 'Khusus User');
			$this->session->set_flashdata('message', 'Maaf, menu hanya dapat diakses oleh User!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('home');
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
	
	function cek_data($table)
	{
		return $this->db->get($table);
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