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
                              <?=$iterasi_ke->c1;?>
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
                              <?=$iterasi_ke->c2;?>
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
                              <?=$iterasi_ke->c3;?>
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
            <div class="card card-borderless">
              <div class="card-header">
                <h3 class="card-title">Iterasi Ke-#<?=$iterasi_ke->iterasi_ke;?></h3>
              </div>
			  <div class="card-body">
                <div id="table-default" class="table-responsive">
					<?php
						if(is_array($dataset)){
					?>
				  <table class="table table-striped display compact table-sm" id="tabel" width="100%" cellspacing="0">
					<thead class="thead-primary">
					  <tr style="text-align: center;">
						<th>Id</th>
						<th>Meninggal</th>
						<th>Hilang</th>
						<th>Terluka</th>
						<th>Rumah Rusak</th>
						<th>Rumah Terendam</th>
						<th>Fasum Rusak</th>
						<th>Jarak ke C1</th>
						<th>Jarak ke C2</th>
						<th>Jarak ke C3</th>
						<th>Kelas</th>
					  </tr>
					</thead>
					<tbody>
					  <?php
						$jml_a = 0; $jml_b = 0; $jml_c = 0;
						foreach ($dataset as $data) {
							$c1 = $iterasi_ke->c1;
							$c2 = $iterasi_ke->c2;
							$c3 = $iterasi_ke->c3;
							$d1 = number_format(sqrt((pow(($data->meninggal - $c1),2))+(pow(($data->hilang - $c1),2))+(pow(($data->terluka - $c1),2))+(pow(($data->rumah_rusak - $c1),2))+(pow(($data->rumah_terendam - $c1),2))+(pow(($data->fasum_rusak - $c1),2))),4);
							$d2 = number_format(sqrt((pow(($data->meninggal - $c2),2))+(pow(($data->hilang - $c2),2))+(pow(($data->terluka - $c2),2))+(pow(($data->rumah_rusak - $c2),2))+(pow(($data->rumah_terendam - $c2),2))+(pow(($data->fasum_rusak - $c2),2))),4);
							$d3 = number_format(sqrt((pow(($data->meninggal - $c3),2))+(pow(($data->hilang - $c3),2))+(pow(($data->terluka - $c3),2))+(pow(($data->rumah_rusak - $c3),2))+(pow(($data->rumah_terendam - $c3),2))+(pow(($data->fasum_rusak - $c3),2))),4);
							$nilaiTerkecil = min($d1, $d2, $d3);
							if($nilaiTerkecil == $d1){$kelas = 'A'; $jml_a++;}
							elseif($nilaiTerkecil == $d2){$kelas = 'B'; $jml_b++;}
							elseif($nilaiTerkecil == $d3){$kelas = 'C'; $jml_c++;}
							else{$kelas = 'Error!';}
					  ?>
					  <tr style="text-align: center;">
						<td><?=$data->id;?></td>
						<td><?=$data->meninggal;?></td>
						<td><?=$data->hilang;?></td>
						<td><?=$data->terluka;?></td>
						<td><?=$data->rumah_rusak;?></td>
						<td><?=$data->rumah_terendam;?></td>
						<td><?=$data->fasum_rusak;?></td>
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
		  
          </div>
        </div>