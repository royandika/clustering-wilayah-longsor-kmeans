<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
			<div class="row">
			  <div class="col-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-blue text-white avatar">C1</span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?="(".$iterasi_ke->c1_x." , ".$iterasi_ke->c1_y.")";?>
                            </div>
                            <div class="text-muted">
                              Centroid 1
                            </div>
                          </div>
                          <div class="col-auto">
                          </div>
                        </div>
                      </div>
                    </div>
			  </div>
			  <div class="col-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-red text-white avatar">C2</span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?="(".$iterasi_ke->c2_x." , ".$iterasi_ke->c2_y.")";?>
                            </div>
                            <div class="text-muted">
                              Centroid 2
                            </div>
                          </div>
                          <div class="col-auto">
                          </div>
                        </div>
                      </div>
                    </div>
			  </div>
			  <div class="col-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-green text-white avatar">C3</span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?="(".$iterasi_ke->c3_x." , ".$iterasi_ke->c3_y.")";?>
                            </div>
                            <div class="text-muted">
                              Centroid 3
                            </div>
                          </div>
                          <div class="col-auto">
                          </div>
                        </div>
                      </div>
                    </div>
			  </div>
			  
		  </div>
		  
		  <div class="row mt-3">
		  <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kalkulasi Dataset</h3>
              </div>
			  <div class="card-body">
                <div id="table-default" class="table-responsive">
					<?php
						if(is_array($dataset)){
					?>
				  <table class="table table-striped display compact table-sm" id="tabel" width="100%" cellspacing="0">
					<thead class="thead-primary">
					  <tr style="text-align: center;">
						<th>#</th>
						<th>Kode Kabupaten</th>
						<th>Jumlah Kejadian</th>
						<th>Jarak ke C1</th>
						<th>Jarak ke C2</th>
						<th>Jarak ke C3</th>
						<th>Kelas</th>
					  </tr>
					</thead>
					<tbody>
					  <?php
						$jml_a = 0; $jml_b = 0; $jml_c = 0; $no = 0;
						foreach ($dataset as $data) {
							$c1_x = $iterasi_ke->c1_x;
							$c1_y = $iterasi_ke->c1_y;
							$c2_x = $iterasi_ke->c2_x;
							$c2_y = $iterasi_ke->c2_y;
							$c3_x = $iterasi_ke->c3_x;
							$c3_y = $iterasi_ke->c3_y;
							$jml_total = $data->meninggal + $data->hilang + $data->terluka + $data->rumah_rusak + $data->rumah_terendam + $data->fasum_rusak;
							$d1 = number_format(sqrt(pow(($data->kode_kabupaten - $c1_x),2)+pow(($jml_total - $c1_y),2)));
							$d2 = number_format(sqrt(pow(($data->kode_kabupaten - $c2_x),2)+pow(($jml_total - $c2_y),2)));
							$d3 = number_format(sqrt(pow(($data->kode_kabupaten - $c3_x),2)+pow(($jml_total - $c3_y),2)));
							$nilaiTerkecil = min($d1, $d2, $d3);
							if($nilaiTerkecil == $d1){$kelas = 'A'; $jml_a++;}
							elseif($nilaiTerkecil == $d2){$kelas = 'B'; $jml_b++;}
							elseif($nilaiTerkecil == $d3){$kelas = 'C'; $jml_c++;}
							else{$kelas = 'Error!';}
					  ?>
					  <tr style="text-align: center;">
						<td><?=$no++;?></td>
						<td><?=$data->kode_kabupaten;?></td>
						<td><?=$jml_total;?></td>
						<td><?=$d1;?></td>
						<td><?=$d2;?></td>
						<td><?=$d3;?></td>
						<td><?=$kelas;?></td>
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
		  
		  <div class="row mt-3">		  
			<div class="col-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-yellow text-white avatar">A</span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?=$jml_a;?>
                            </div>
                            <div class="text-muted">
                              Kelas A
                            </div>
                          </div>
                          <div class="col-auto">
                          </div>
                        </div>
                      </div>
                    </div>
			  </div>
			  <div class="col-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-pink text-white avatar">B</span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?=$jml_b;?>
                            </div>
                            <div class="text-muted">
                              Kelas B
                            </div>
                          </div>
                          <div class="col-auto">
                          </div>
                        </div>
                      </div>
                    </div>
			  </div>
			  <div class="col-4">
                    <div class="card card-sm">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-cyan text-white avatar">C</span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium">
                              <?=$jml_c;?>
                            </div>
                            <div class="text-muted">
                              Kelas C
                            </div>
                          </div>
                          <div class="col-auto">
                          </div>
                        </div>
                      </div>
                    </div>
			  </div>
		  </div>
		  
		  <div class="row mt-3">
		  <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Visualisasi</h3>
              </div>
			  <div class="card-body">
                <div class="row">
                    <canvas id="iterasi_chart"></canvas>
                </div>
              </div>
            </div>
           </div>
          </div>
		  
          </div>
        </div>