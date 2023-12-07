<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col-6">
            <div class="card card-borderless">
              <div class="card-header">
                    <h3 class="card-title">Input Form</h3>
              </div>
			  <div class="card-body">
			  <?=form_open('level/simpan');?>
                <div class="mb-3">
				  <label class="form-label">Nama Level Akses</label>
				  <input type="text" class="form-control" name="nama_level" placeholder="Nama level akses" required autofocus />
				</div>
              </div>
			  <div class="card-footer text-end">
				<button class="btn btn-danger" type="button" onclick="window.location.href='<?=base_url('level');?>';">Batal</button>
				<button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan dan Proses</button>
              </div>
			  
            <?=form_close();?>
			</div>
            </div>
           </div>
          </div>
        </div>