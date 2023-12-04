<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class M_proses extends CI_Model {

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
	
	function simpan_proses() {
		$this->db->trans_begin();
		$data_kmeans = array(
			'id'				=> uniqid('', false),
			'iterasi_ke'		=> 1,
			'toleransi_error'	=> $this->input->post('toleransi_error'),
			'jml_dataset'		=> $this->input->post('jml_dataset'),
			'min'				=> $this->input->post('min'),
			'max'				=> $this->input->post('max'),
			'c1'				=> $this->input->post('c1'),
			'c2'				=> $this->input->post('c2'),
			'c3'				=> $this->input->post('c3')
		);
		$this->db->insert('iterasi', $data_kmeans);
		
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
}