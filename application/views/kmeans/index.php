<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card card-borderless">
              <div class="card-header">
                <h3 class="card-title">Iterasi Kalkulasi K-Means</h3>
				<div class="card-actions">
                      <a href="<?=base_url('kmeans/centroid/'.$it_ke+1);?>" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Tambah Iterasi
                      </a>
                    </div>
              </div>
			  <div class="card-body">			  
			  <div class="row">			  
			  <div class="col">
				<div id="table-default" class="table-responsive">
				  <table class="table table-vcenter">
					<thead>
                        <tr style="text-align: center;">
                          <th>Ke-</th>
                          <th>Toleransi Error</th>
                          <th>Dataset</th>
                          <th>Nilai Minimum</th>
                          <th>Nilai Maksimum</th>
                          <th>C1</th>
                          <th>C2</th>
                          <th>C3</th>
                          <th></th>
                        </tr>
                      </thead>
					  <?php							
						if(is_array($iterasi)){
						$no=1; foreach ($iterasi as $data) {
					  ?>
					  <tr style="text-align: center;">
						<td class="text-muted"><?=$data->iterasi_ke;?></td>
                        <td class="text-muted"><?=$data->toleransi_error;?></td>
                        <td class="text-muted"><?=$data->jml_dataset;?></td>
                        <td class="text-muted"><?=$data->min;?></td>
                        <td class="text-muted"><?=$data->max;?></td>
                        <td class="text-muted"><?="(".$data->c1_x.",".$data->c1_y.")";?></td>
                        <td class="text-muted"><?="(".$data->c2_x.",".$data->c2_y.")";?></td>
                        <td class="text-muted"><?="(".$data->c3_x.",".$data->c3_y.")";?></td>
                        <td><button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('kmeans/iterasi/'.$data->iterasi_ke);?>'" >Iterasi <?=$data->iterasi_ke;?></button> <button type="submit" class="btn btn-danger kmeans-hapus" href="<?=base_url('kmeans/centroid_hapus/'.$data->id);?>">Hapus</button></td>
                      </tr>
					  <?php
						}}else{
					  ?>
					  <tr style="text-align: center;">
						<td class="text-muted" colspan="9">Belum ada data iterasi. Silahkan input data centroid.</td>
					  </tr>
						<?php } ?>
					</table>
				  </div>
			  </div>			  
				
				</div>
				
              </div>
            </div>
           </div>
          </div>
        </div>