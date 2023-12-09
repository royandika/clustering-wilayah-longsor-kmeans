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
						if(is_array($hasil_proses)){
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
						$no = 1; foreach ($hasil_proses as $data) {
					  ?>
					  <tr style="text-align: center;">
						<td><?=$no++;?></td>
						<td><?=$data['kode_kabupaten'];?></td>
						<td><?=$data['jml_kejadian'];?></td>
						<td><?=$data['d1'];?></td>
						<td><?=$data['d2'];?></td>
						<td><?=$data['d3'];?></td>
						<td><?=$data['kelas'];?></td>
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
                              <?=$count_a;?>
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
                              <?=$count_b;?>
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
                              <?=$count_c;?>
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
                <div class="row" id="chart">
                </div>
              </div>
            </div>
           </div>
          </div>
		  
          </div>
        </div>