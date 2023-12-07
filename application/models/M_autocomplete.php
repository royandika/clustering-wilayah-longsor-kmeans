<?php
Class M_autocomplete extends CI_Model {

	function __construct(){
	}
	
	function select2_centroid_x($searchTerm="")
	{
		$this->db->select('id, kode_kabupaten');
		$this->db->where("kode_kabupaten like '%".$searchTerm."%' ");
		$this->db->order_by('kode_kabupaten', 'ASC');
		$this->db->limit(10);
		$fetched_records = $this->db->get('kejadian');
		$centroid_x = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($centroid_x as $cx){
			$data[] = array("id"=>$cx['id'], "text"=>$cx['kode_kabupaten']);
		}
		return $data;
	}
	
	function select2_centroid_y($searchTerm="")
	{
		$this->db->select('sum(meninggal + hilang + terluka + rumah_rusak + rumah_terendam + fasum_rusak) as jml_total');
		$this->db->limit(10);
		$fetched_records = $this->db->get('kejadian');
		$centroid_y = $fetched_records->result_array();

		// Initialize Array with fetched data
		$data = array();
		foreach($centroid_y as $cy){
			$data[] = array("id"=>$cy['id'], "text"=>$cy['jml_total']);
		}
		return $data;
	}
}