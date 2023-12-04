<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses extends MY_Controller {

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
		$this->load->model('m_proses');
		$this->load->model('m_dataset');
	}
	
	function index() 
	{
		$data['title'] = 'Centroid & Toleransi Error';
		$this->load->view('tabler/header', $data);
		$data['jml_dataset'] = $this->m_dataset->jml_dataset();
		
		// Mencari nilai Min dan Max dari tabel
		// 1. Ambil data dr database
		$data['min_max'] = $this->m_dataset->get_dataset();
		
		// 2. Membuat array dari hasil query kolom-kolom tersebut
        $numeric_array = [];
        foreach ($data['min_max'] as $row) {
            $numeric_array[] = [
                'meninggal' => $row->meninggal, 
                'hilang' => $row->hilang, 
                'terluka' => $row->terluka, 
                'rumah_rusak' => $row->rumah_rusak, 
                'rumah_terendam' => $row->rumah_terendam, 
                'fasum_rusak' => $row->fasum_rusak
            ];
        }
		
		// 3: Mencari nilai terbesar dan terkecil dari array tersebut
        $min_value = $this->findMinValue($numeric_array);
        $max_value = $this->findMaxValue($numeric_array);
		
		// 4. Kirim data ke view
        $data['min_value'] = $min_value;
        $data['max_value'] = $max_value;
		
		$periksa = $this->get_where('iterasi', array('iterasi_ke' => 1))->num_rows();
		if($periksa > 0){
			$data['iterasi'] = $this->m_proses->iterasi();
			$this->load->view('proses/parameter', $data);
		}else{
			$this->load->view('proses/index', $data);
		}
		$this->load->view('tabler/footer');
    }
	
	private function findMinValue($array) {
        $min_value = null;
        foreach ($array as $row) {
            foreach ($row as $value) {
                if ($min_value === null || $value < $min_value) {
                    $min_value = $value;
                }
            }
        }
        return $min_value;
    }

    private function findMaxValue($array) {
        $max_value = null;
        foreach ($array as $row) {
            foreach ($row as $value) {
                if ($max_value === null || $value > $max_value) {
                    $max_value = $value;
                }
            }
        }
        return $max_value;
    }
	
	function simpan()
	{
		$this->form_validation->set_rules('toleransi_error', 'Toleransi Error', 'required|trim|numeric|greater_than_equal_to[0]|less_than_equal_to[1]');
		$this->form_validation->set_rules('jml_dataset', 'Jumlah Data', 'required|trim|numeric');
		$this->form_validation->set_rules('min', 'Nilai Minimum', 'required|trim|numeric');
        $this->form_validation->set_rules('max', 'Nilai Maksimum', 'required|trim|numeric');
        $this->form_validation->set_rules('c1', 'Centroid 1', 'required|trim|numeric');
        $this->form_validation->set_rules('c2', 'Centroid 2', 'required|trim|numeric');
        $this->form_validation->set_rules('c3', 'Centroid 3', 'required|trim|numeric');
        $this->form_validation->set_error_delimiters('', '<br/>');
		if ($this->form_validation->run() == TRUE)
		{
			//cek apakah iterasi 1 sudah ada datanya
			$periksa = $this->get_where('iterasi', array('iterasi_ke' => 1))->num_rows();
			if($periksa > 0){
				$this->session->set_flashdata('message', 'Data K-Means sudah tersimpan di database!');
				$this->session->set_flashdata('alert', 'warning');
			}else{
				$this->m_proses->simpan_proses();
				$this->session->set_flashdata('message', 'Data telah berhasil ditambahkan!');
				$this->session->set_flashdata('alert', 'success');
			}
		}else{
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'error');
		}
		redirect('proses');
	}
	
	function iterasi($n)
	{
		$data['title'] = 'Kalkulasi';
		$this->load->view('tabler/header', $data);
		$periksa = $this->get_where('iterasi', array('iterasi_ke' => $n))->num_rows();
		if($periksa > 0){
			$data['iterasi_ke'] = $this->get_where('iterasi', array('iterasi_ke' => $n))->row();
			$data['dataset'] = $this->m_dataset->listing();
			$this->load->view('proses/iterasi_n', $data);
		}else{
			$this->session->set_flashdata('message', 'Data hitungan iterasi ke-'.$n.' tidak ditemukan!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('proses');
		}
		$this->load->view('tabler/footer');
	}
}