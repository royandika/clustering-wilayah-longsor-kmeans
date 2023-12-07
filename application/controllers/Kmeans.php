<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kmeans extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->isAdmin();
		$this->load->model('m_kmeans');
		$this->load->model('m_dataset');
	}
	
	function index()
	{
		$data['title'] = 'Iterasi';
		$data['iterasi'] = $this->m_kmeans->iterasi();
		$iterasi_ke = $this->m_kmeans->iterasi_terbaru()->num_rows();

		if ($iterasi_ke > 0) {
			// Menggunakan metode result() jika mengharapkan lebih dari satu baris hasil
			$query = $this->m_kmeans->iterasi_terbaru()->row();
			$it_ke = $query->iterasi_ke;
		} else {
			// Menetapkan $it_ke ke nilai default (misalnya 0) jika tidak ada baris hasil
			$it_ke = 0;
		}
		$data['it_ke'] = $it_ke;
		$this->load->view('tabler/header_open', $data);
		$this->load->view('libraries/header_datatable');
		$this->load->view('tabler/header_close');
		$this->load->view('kmeans/index', $data);
		$this->load->view('tabler/footer_open');
		$this->load->view('libraries/footer_datatable');
		$this->load->view('tabler/footer_close');
	}
	
	function centroid($n)
	{
		//cek apakah iterasi $n sudah ada data?
		$periksa = $this->get_where('iterasi', array('iterasi_ke' => $n))->num_rows();
		if($periksa > 0){
			$this->session->set_flashdata('title', 'Centroid Ada!');
			$this->session->set_flashdata('message', 'Centroid untuk iterasi #'.$n.' sudah ditentukan!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('kmeans');
		}else{
			// Min-max data kejadian
			$dataset = $this->m_dataset->listing();
			$jml_kejadian = array();
			foreach($dataset as $dt)
			{
				$jml_kejadian[] = $dt->meninggal + $dt->hilang + $dt->terluka + $dt->rumah_rusak + $dt->rumah_terendam + $dt->fasum_rusak;
				$kode_kabupaten[] = $dt->kode_kabupaten;
			}
			$min = min($jml_kejadian);
			$max = max($jml_kejadian);
			$min_kab = min($kode_kabupaten);
			$max_kab = max($kode_kabupaten);			
			$data = array(
				'min' => $min,
				'max' => $max,
				'min_kab' => $min_kab,
				'max_kab' => $max_kab
			);
			$data['jml_dataset'] = $this->m_dataset->jml_dataset();
			$data['title'] = 'Centroid Awal';
			$data['iterasi_ke'] = $n;
			$this->load->view('tabler/header_open', $data);
			$this->load->view('tabler/header_close');
			$this->load->view('centroid/'.$n, $data);
			$this->load->view('tabler/footer_open');
			$this->load->view('tabler/footer_close');
		}
	}
	
	function centroid_simpan()
	{
		$this->form_validation->set_rules('toleransi_error', 'Toleransi Error', 'required|numeric|greater_than_equal_to[0]|less_than_equal_to[1]');
		$this->form_validation->set_rules('jml_dataset', 'Jumlah Data', 'required|numeric');
		$this->form_validation->set_rules('min', 'Nilai Minimum', 'required|numeric');
        $this->form_validation->set_rules('max', 'Nilai Maksimum', 'required|numeric');
        $this->form_validation->set_rules('c1_x', 'Centroid 1 (x)', 'required|numeric');
        $this->form_validation->set_rules('c1_y', 'Centroid 1 (y)', 'required|numeric');
        $this->form_validation->set_rules('c2_x', 'Centroid 2 (x)', 'required|numeric');
        $this->form_validation->set_rules('c2_y', 'Centroid 2 (y)', 'required|numeric');
        $this->form_validation->set_rules('c3_x', 'Centroid 3 (x)', 'required|numeric');
        $this->form_validation->set_rules('c3_y', 'Centroid 3 (y)', 'required|numeric');
        $this->form_validation->set_error_delimiters('', '<br/>');
		if ($this->form_validation->run() == TRUE)
		{
			//cek apakah iterasi 1 sudah ada datanya
			$periksa = $this->get_where('iterasi', array('iterasi_ke' => $this->input->post('iterasi_ke')))->num_rows();
			if($periksa > 0){
				$this->session->set_flashdata('title', 'Gagal');
				$this->session->set_flashdata('message', 'Data K-Means sudah tersimpan di database!');
				$this->session->set_flashdata('alert', 'warning');
			}else{
				$this->m_kmeans->centroid_simpan();
				$this->session->set_flashdata('title', 'Sukses');
				$this->session->set_flashdata('message', 'Data telah berhasil ditambahkan!');
				$this->session->set_flashdata('alert', 'success');
			}
		}else{
			$this->session->set_flashdata('title', 'Error');
			$this->session->set_flashdata('message', validation_errors());
			$this->session->set_flashdata('alert', 'error');
		}
		redirect('kmeans');
	}
	
	function iterasi($n)
	{
		$data['title'] = 'Iterasi Ke-#'.$n;
		$this->load->view('tabler/header_open', $data);
		$this->load->view('libraries/header_datatable');
		$this->load->view('libraries/header_chartjs');
		$this->load->view('tabler/header_close');
		$periksa = $this->get_where('iterasi', array('iterasi_ke' => $n))->num_rows();
		if($periksa > 0){
			$data['iterasi_ke'] = $this->get_where('iterasi', array('iterasi_ke' => $n))->row();
			$data['dataset'] = $this->m_dataset->listing();
			$this->load->view('kmeans/iterasi_n', $data);
		}else{
			$this->session->set_flashdata('message', 'Data hitungan iterasi ke-'.$n.' tidak ditemukan!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('kmeans');
		}
		$this->load->view('tabler/footer_open');
		$this->load->view('libraries/footer_datatable');
		$this->load->view('libraries/footer_chartjs_iterasi', $data);
		$this->load->view('tabler/footer_close');
	}
	
	function centroid_hapus($id)
	{
		$periksa = $this->get_where('iterasi', array('id' => $id))->num_rows();
		if($periksa > 0){
			$this->m_kmeans->iterasi_hapus($id);
			$this->session->set_flashdata('title', 'Sukses');
			$this->session->set_flashdata('message', 'Data iterasi berhasil dihapus!');
			$this->session->set_flashdata('alert', 'success');
		}else{
			$this->session->set_flashdata('title', 'Data tidak ditemukan!');
			$this->session->set_flashdata('message', 'Data hitungan iterasi tidak ditemukan!');
			$this->session->set_flashdata('alert', 'warning');
		}
		redirect('kmeans');
	}
}