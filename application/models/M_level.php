<?php
Class M_level extends CI_Model {

	public function __construct(){
		$this->load->helper('string');
	}

	function cek_data_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	
	function list_level() {
		$this->db->from('level');
		$this->db->select('*');
		$this->db->order_by('id_level', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0)
		{
			foreach ($query->result() as $data)
			{
				$list_level[] = $data;
			}
			return $list_level;
		}
	}
	
	function simpan_level() {
		$this->db->trans_begin();
		$data = array(
			'nama_level'=> $this->input->post('nama_level')
		);
		$this->db->insert('level', $data);
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
	function data_level($id_level) {
		$this->db->from('level');
		$this->db->where('id_level', $id_level);
		$this->db->select('*');
		$query = $this->db->get();
		$ret = $query->row();
		return $ret;
	}
	
	function update_level($id_level) {
		$this->db->trans_begin();
		$data = array(
			'nama_level'=> $this->input->post('nama_level')
		);
		$this->db->where('id_level',$id_level);
		$this->db->update('level',$data);
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
	function hapus($id_level)
	{
		$this->db->where('id_level',$id_level);
		$this->db->delete('level');
	}
	
}