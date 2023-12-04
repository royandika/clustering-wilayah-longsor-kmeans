<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card card-borderless">
              <div class="card-header">
                <h3 class="card-title">Input</h3>
              </div>
			  <?=form_open('proses/simpan');?>
			  
			  <div class="card-body">
			  
			  <div class="row">
			  
			  <div class="col-lg-6">
                <div class="mb-3">
				  <label class="form-label required">Jumlah Data</label>
                    <div>
                      <input type="number" min="1" step="1" name="jml_dataset" class="form-control" readonly value="<?=$jml_dataset;?>" />
                      <small class="form-hint">Jumlah data yang tersimpan pada database</small>
                    </div>
                </div>
				<div class="mb-3">
				  <label class="form-label required">Nilai Minimum</label>
                    <div>
                      <input type="number" name="min" class="form-control" readonly value="<?=$min_value;?>" required />
                      <small class="form-hint">Nilai minimum pada dataset.</small>
                    </div>
                </div>
				<div class="mb-3">
				  <label class="form-label required">Nilai Maksimum</label>
                    <div>
                      <input type="number" name="max" class="form-control" readonly value="<?=$max_value;?>" required />
                      <small class="form-hint">Nilai maksimum pada dataset.</small>
                    </div>
                </div>
				<div class="mb-3">
				  <label class="form-label required">Toleransi Error</label>
                    <div>
                      <input type="number" min="0" max="1" step="0.01" name="toleransi_error" class="form-control" required />
                      <small class="form-hint">Nilai toleransi error (delta) yang diizinkan.</small>
                    </div>
                </div>
				
			  </div>
			  
			  <div class="col-lg-6">
                <div class="mb-3">
				  <label class="form-label required">Centroid 1</label>
                    <div>
                      <input type="number" min="0" max="<?=$max_value;?>" name="c1" class="form-control" required />
                      <small class="form-hint">Tentukan nilai centroid 1 secara acak.</small>
                    </div>
                </div>
				<div class="mb-3">
				  <label class="form-label required">Centroid 2</label>
                    <div>
                      <input type="number" min="0" max="<?=$max_value;?>" name="c2" class="form-control" required />
                      <small class="form-hint">Tentukan nilai centroid 2 secara acak.</small>
                    </div>
                </div>
				<div class="mb-3">
				  <label class="form-label required">Centroid 3</label>
                    <div>
                      <input type="number" min="0" max="<?=$max_value;?>" name="c3" class="form-control" required />
                      <small class="form-hint">Tentukan nilai centroid 3 secara acak.</small>
                    </div>
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