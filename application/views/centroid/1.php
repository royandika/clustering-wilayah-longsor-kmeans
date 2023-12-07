<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Centroid & Toleransi Error</h3>
              </div>
			  <?=form_open('kmeans/centroid_simpan');?>
			  
			  <div class="card-body">
			  
			  <div class="row">
			  <div class="col-lg-3">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Toleransi Error</label>
                    <div>
                      <input name="toleransi_error" type="number" min="0" max="1" step="0.01" class="form-control" value="0.1" required />
                      <small class="form-hint">Nilai toleransi error (<i>delta</i>), antara 0 - 1</small>
                    </div>
                </div>
				</div>
			  </div>
			  <div class="col-lg-3">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Jumlah Data</label>
                    <div>
                      <input name="jml_dataset" type="number" min="0" step="1" class="form-control" readonly value="<?=$jml_dataset;?>" />
                      <small class="form-hint">Besaran dataset yang tersimpan</small>
                    </div>
                </div>
				</div>
			  </div>
			  <div class="col-lg-3">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Nilai Minimum</label>
                    <div>
                      <input name="min" type="number" class="form-control" value="<?=$min;?>" readonly />
                      <small class="form-hint">Nilai minimum dari dataset</small>
                    </div>
                </div>
				</div>
			  </div>
			  <div class="col-lg-3">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Nilai Maksimum</label>
                    <div>
                      <input name="max" type="number" class="form-control" value="<?=$max;?>" readonly />
                      <small class="form-hint">Nilai maksimum dari dataset</small>
                    </div>
                </div>
				</div>
			  </div>
			  
			  </div>
			  
			  <div class="row mt-3">
			  
			  <div class="col-lg-4">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Centroid 1 (x)</label>
                    <div>
                      <input name="c1_x" class="form-control" required value="<?=mt_rand($min_kab,$max_kab);?>" />
                      <small class="form-hint">Nilai acak untuk x</small>
                    </div>
                </div>
				</div>
				<div class="row">
				<div class="mb-3">
				  <label class="form-label">Centroid 1 (y)</label>
                    <div>
                      <input name="c1_y" class="form-control" required value="<?=mt_rand($min,$max);?>" />
                      <small class="form-hint">Nilai acak untuk y</small>
                    </div>
                </div>
				</div>
			  </div>			  
				<div class="col-lg-4">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Centroid 2 (x)</label>
                    <div>
                      <input name="c2_x" class="form-control" required value="<?=mt_rand($min_kab,$max_kab);?>" />
                      <small class="form-hint">Nilai acak untuk x</small>
                    </div>
                </div>
				</div>
				<div class="row">
				<div class="mb-3">
				  <label class="form-label">Centroid 2 (y)</label>
                    <div>
                      <input name="c2_y" class="form-control" required value="<?=mt_rand($min,$max);?>" />
                      <small class="form-hint">Nilai acak untuk y</small>
                    </div>
                </div>
				</div>
			  </div>			  
				<div class="col-lg-4">
                <div class="row">
				<div class="mb-3">
				  <label class="form-label">Centroid 3 (x)</label>
                    <div>
                      <input name="c3_x" class="form-control" required value="<?=mt_rand($min_kab,$max_kab);?>" />
                      <small class="form-hint">Nilai acak untuk x</small>
                    </div>
                </div>
				</div>
				<div class="row">
				<div class="mb-3">
				  <label class="form-label">Centroid 3 (y)</label>
                    <div>
                      <input name="c3_y" class="form-control" required value="<?=mt_rand($min,$max);?>" />
                      <small class="form-hint">Nilai acak untuk y</small>
                    </div>
                </div>
				</div>
			  </div>			  
				<input name="iterasi_ke" type="hidden" value="<?=$iterasi_ke;?>" />
				</div>
				
              </div>

			  <div class="card-footer text-end">
                <button type="button" class="btn btn-default" onclick="location.href='<?=base_url('kmeans');?>';">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan dan Proses</button>
              </div>
              <?=form_close();?>
            </div>			
           </div>
          </div>
        </div>
		