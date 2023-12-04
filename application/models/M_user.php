<?php
Class M_user extends CI_Model {

	public function __construct(){
		$this->load->helper('string');
	}

	function cek_data_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	
	function list_user() {
		//$level = array('1','2');
		$this->db->from('user');
		$this->db->join('level', 'level.id_level = user.id_level', 'LEFT');
		$this->db->select('id_user, username, nama_user, level.nama_level');
		$this->db->order_by('id_user', 'ASC');
		$this->db->where('user.id_level !=', '3');
		$query = $this->db->get();
		if ($query->num_rows() >0)
		{
			foreach ($query->result() as $data)
			{
				$list_user[] = $data;
			}
			return $list_user;
		}
	}
	
	function simpan_user() {
		$this->db->trans_begin();
		$data_user = array(
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'nama_user'=> $this->input->post('nama_user'),
			'id_level' 	=> $this->input->post('id_level')
		);
		$this->db->insert('user', $data_user);
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
	function data_user($id_user) {
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->select('id_user, username, nama_user, id_level');
		$query = $this->db->get();
		$ret = $query->row();
		return $ret;
	}
	
	function data_sesi($username) {
		$this->db->from('user');
		$this->db->where('username', $username);
		$this->db->select('*');
		$query = $this->db->get();
		$ret = $query->row();
		return $ret;
	}
	
	function update_user($id_user) {
		$this->db->trans_begin();
		$data_user = array(
			'username'	=> $this->input->post('username'),
			'password'	=> md5($this->input->post('password')),
			'nama_user'=> $this->input->post('nama_user'),
			'id_level' 	=> $this->input->post('id_level')
		);
		$this->db->where('id_user',$id_user);
		$this->db->update('user',$data_user);
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
	function hapus($id_user)
	{
		$this->db->where('id_user',$id_user);
		$this->db->delete('user');
	}
	
}