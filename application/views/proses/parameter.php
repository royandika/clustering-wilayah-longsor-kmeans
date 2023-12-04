<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card card-borderless">
              <div class="card-header">
                <h3 class="card-title">Parameter K-Means</h3>
              </div>
			  <?=form_open('proses/simpan');?>
			  
			  <div class="card-body">			  
			  <div class="row">			  
			  <div class="col">
				<div id="table-default" class="table-responsive">
				  <table class="table table-vcenter">
					<thead>
                        <tr>
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
					  <tr>
                        <?php							
							if(is_array($iterasi)){
							$no=1; foreach ($iterasi as $data) {
						?>
						<td class="text-muted"><?=$data->iterasi_ke;?></td>
                        <td class="text-muted"><?=$data->toleransi_error;?></td>
                        <td class="text-muted"><?=$data->jml_dataset;?></td>
                        <td class="text-muted"><?=$data->min;?></td>
                        <td class="text-muted"><?=$data->max;?></td>
                        <td class="text-muted"><?=$data->c1;?></td>
                        <td class="text-muted"><?=$data->c2;?></td>
                        <td class="text-muted"><?=$data->c3;?></td>
                        <td><button type="button" class="btn btn-primary">Iterasi <?=$data->iterasi_ke;?></button> <button type="submit" class="btn btn-danger">Hapus</button></td>
						<?php
							}}
						?>
                      </tr>
					</table>
				  </div>
			  </div>			  
				
				</div>
				
              </div>
			  
			  
			  
			  <div class="card-footer text-end">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan dan Proses</button>
              </div>
              <?=form_close();?>
            </div>
           </div>
          </div>
        </div>