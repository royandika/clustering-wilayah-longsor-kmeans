<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	  <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card card-borderless">
              <div class="card-header">
                    <h3 class="card-title">Dataset</h3>
                    <div class="card-actions">
                      <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-dataset">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Upload CSV
                      </a>
					  <a href="<?=base_url('dataset/hapus_semua');?>" class="btn hapus">
                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none" /><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                        Hapus Semua
                      </a>
                    </div>
              </div>
			  <div class="card-body">
                <div id="table-default" class="table-responsive">
					<?php
						if(is_array($data_bencana)){
					?>
				  <table class="table table-striped display compact table-sm" id="tabel" width="100%" cellspacing="0">
					<thead class="thead-primary">
					  <tr style="text-align: center;">
						<th>#</th>
						<th>Tanggal</th>
						<th>Lokasi</th>
						<th>Kabupaten</th>
						<th>Provinsi</th>
						<th>Meninggal</th>
						<th>Hilang</th>
						<th>Terluka</th>
						<th>Rumah Rusak</th>
						<th>Rumah Terendam</th>
						<th>Fasum Rusak</th>
					  </tr>
					</thead>
					<tbody>
					  <?php
						$no=1; foreach ($data_bencana as $data) {
					  ?>
					  <tr style="text-align: center;">
						<td><?=$no++;?></td>
						<td><?=$data->tanggal;?></td>
						<td><?=$data->lokasi;?></td>
						<td><?=$data->kabupaten;?></td>
						<td><?=$data->provinsi;?></td>
						<td><?=$data->meninggal;?></td>
						<td><?=$data->hilang;?></td>
						<td><?=$data->terluka;?></td>
						<td><?=$data->rumah_rusak;?></td>
						<td><?=$data->rumah_terendam;?></td>
						<td><?=$data->fasum_rusak;?></td>
					  </tr>
						<?php }
						?>
					</tbody>
				  </table>
					<?php
						}else{
							echo "Belum ada data kejadian bencana longsor!";
						}
					?>
				</div>
              </div>
            </div>
           </div>
		  </div>
        </div>