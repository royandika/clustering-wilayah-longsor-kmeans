<?php
Class M_dataset extends CI_Model {

	public function __construct(){
	}
	
	function listing()
	{
		$this->db->from('kejadian');
		$this->db->select('*');
		$this->db->order_by('id');
		$query = $this->db->get();
		if ($query->num_rows() >0)
		{
			foreach ($query->result() as $data)
			{
				$listing[] = $data;
			}
			return $listing;
		}
	}
	
	function get_all_data() 
	{
        $query = $this->db->get('kejadian');
        return $query->result_array();
    }
	
	function jml_dataset()
	{
		$this->db->select('*');
		$this->db->from('kejadian');
		$query = $this->db->get();
		return count($query->result_array());
	}
	
	function get_dataset()
	{
		$query = $this->db->get('kejadian');
        return $query->result();
	}
	
	function get_kodekab_dataset()
	{
		$this->db->select('kode_kabupaten');
		$this->db->from('kejadian');
		$query = $this->db->get();
        return $query->result();
	}

	function import_csv($csv_data) {
		$this->db->trans_begin();
		$this->db->insert_batch('kejadian', $csv_data);
		if($this->db->trans_status() === true)
		{
			$this->db->trans_commit();
		} else {
			$this->db->trans_rollback();
		}
	}
	
	function parse_csv($file)
	{
	   $file_data = fopen($file, 'r');
	   $csv_data = array();

	   while ($row = fgetcsv($file_data)) {
		  $csv_data[] = array(
			 'tanggal' 			=> $row[1],
			 'kode_kabupaten'	=> $row[0],
			 'lokasi' 			=> $row[2],
			 'kabupaten' 		=> $row[3],
			 'provinsi' 		=> $row[4],
			 'meninggal' 		=> $row[5],
			 'hilang' 			=> $row[6],
			 'terluka' 			=> $row[7],
			 'rumah_rusak' 		=> $row[8],
			 'rumah_terendam' 	=> $row[9],
			 'fasum_rusak' 		=> $row[10]
		  );
	   }
	   fclose($file_data);
	   return $csv_data;
	}
	
	function getTotals() {
        $this->db->select('meninggal, hilang, terluka, rumah_rusak, rumah_terendam, fasum_rusak');
        $query = $this->db->get('kejadian');
        $totals = array();
        foreach ($query->result() as $row)
		{
            $total = $row->meninggal + $row->hilang + $row->terluka + $row->rumah_rusak + $row->rumah_terendam + $row->fasum_rusak;
            $totals[] = $total;
        }
        return $totals;
    }
	
}