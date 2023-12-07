<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_kmeans extends CI_Model {

    function iterasi()
	{
        $this->db->from('iterasi');
		$this->db->select('*');
		$this->db->order_by('id', 'ASC');
		$query = $this->db->get();
		if ($query->num_rows() >0)
		{
			foreach ($query->result() as $data)
			{
				$iterasi[] = $data;
			}
			return $iterasi;
		}
    }
	
	function centroid_simpan() {
		$this->db->trans_begin();
		$data_kmeans = array(
			'id'				=> uniqid('', false),
			'iterasi_ke'		=> $this->input->post('iterasi_ke'),
			'toleransi_error'	=> $this->input->post('toleransi_error'),
			'jml_dataset'		=> $this->input->post('jml_dataset'),
			'min'				=> $this->input->post('min'),
			'max'				=> $this->input->post('max'),
			'c1_x'				=> $this->input->post('c1_x'),
			'c1_y'				=> $this->input->post('c1_y'),
			'c2_x'				=> $this->input->post('c2_x'),
			'c2_y'				=> $this->input->post('c2_y'),
			'c3_x'				=> $this->input->post('c3_x'),
			'c3_y'				=> $this->input->post('c3_y')
		);
		$this->db->insert('iterasi', $data_kmeans);
		
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
	function iterasi_hapus($id)
	{
		$this->db->trans_begin();
		$this->db->delete('iterasi', array('id' => $id));
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
			//return TRUE;
		} else {
			$this->db->trans_rollback();
			//return FALSE;
		}
	}
	
	function iterasi_terbaru() {
        $this->db->order_by('iterasi_ke', 'desc');
        return $this->db->get('iterasi', 1);
		//return $query->row();
    }
	
}