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
		/* // Step 1: Query semua data dari tabel "kejadian"
        $data_from_db = $this->m_dataset->get_all_data();
        // Step 2: Menambahkan variabel $jml_kejadian
        foreach ($data_from_db as &$row)
		{
            // Menghitung jumlah dari a+b+c
            $row['jml_kejadian'] = $row['meninggal'] + $row['hilang'] + $row['terluka'];
        }
        // Step 3: Kirim hasil query ke view
        //$data['result'] = $data_from_db;

        // Kirim data ke view
        //$this->load->view('your_view', $data);
		
		//foreach ($data_from_db as $row):
			//echo 'meninggal : '.$row['meninggal']; echo ' - hilang : '.$row['hilang']; echo ' - terluka : '.$row['terluka']; echo ' | Total : '.$row['jml_kejadian'].'<br />';
		//endforeach;
		*/
		
		$periksa = $this->get_where('iterasi', array('iterasi_ke' => $n))->num_rows();
		if($periksa > 0){
			$data['title'] = 'Iterasi Ke-#'.$n;
			$this->load->view('tabler/header_open', $data);
			$this->load->view('libraries/header_datatable');
			$this->load->view('libraries/header_apexcharts');
			$this->load->view('tabler/header_close');
			//Proses data
			$iterasi_ke = $this->get_where('iterasi', array('iterasi_ke' => $n))->row();
			$data['iterasi_ke'] = $iterasi_ke;
			$c1_x = $iterasi_ke->c1_x;
			$c1_y = $iterasi_ke->c1_y;
			$c2_x = $iterasi_ke->c2_x;
			$c2_y = $iterasi_ke->c2_y;
			$c3_x = $iterasi_ke->c3_x;
			$c3_y = $iterasi_ke->c3_y;
			$result_array = [];
			$data_proses = $this->m_dataset->get_all_data();
			$count_a = 0; $count_b = 0; $count_c = 0;
			foreach($data_proses as &$row)
			{
				$row['jml_kejadian'] = $row['meninggal'] + $row['hilang'] + $row['terluka'] + $row['rumah_rusak'] + $row['rumah_terendam'] + $row['fasum_rusak'];
				$row['d1'] = number_format(sqrt(pow(($row['kode_kabupaten'] - $c1_x),2)+pow(($row['jml_kejadian'] - $c1_y),2)));
				$row['d2'] = number_format(sqrt(pow(($row['kode_kabupaten'] - $c2_x),2)+pow(($row['jml_kejadian'] - $c2_y),2)));
				$row['d3'] = number_format(sqrt(pow(($row['kode_kabupaten'] - $c3_x),2)+pow(($row['jml_kejadian'] - $c3_y),2)));
				$row['nilaiTerkecil'] = min($row['d1'], $row['d2'], $row['d3']);
				// Step 5: Controller mengelompokkan tiap row data dengan IF
				if ($row['nilaiTerkecil'] == $row['d1']) {
					$row['kelas'] = 'A'; $count_a++;
				} elseif ($row['nilaiTerkecil'] == $row['d2']) {
					$row['kelas'] = 'B'; $count_b++;
				} else {
					$row['kelas'] = 'C'; $count_c++;
				}
			}
			$data['hasil_proses'] = $data_proses;
			$data['count_a'] = $count_a;
			$data['count_b'] = $count_b;
			$data['count_c'] = $count_c;
			$this->load->view('kmeans/iterasi_n', $data);
			$this->load->view('tabler/footer_open');
			$this->load->view('libraries/footer_datatable');
			$this->load->view('libraries/footer_apexcharts_iterasi', $data);
			$this->load->view('tabler/footer_close');
		}else{
			$this->session->set_flashdata('message', 'Data hitungan iterasi ke-'.$n.' tidak ditemukan!');
			$this->session->set_flashdata('alert', 'warning');
			redirect('kmeans');
		}
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