<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card card-borderless">
              <div class="card-header">
                    <h3 class="card-title">Input Form</h3>
              </div>
			  <div class="card-body">
			  <?=form_open('level/perbarui/'.$data_level->id_level);?>
                <div class="mb-3">
				  <label class="form-label">Nama Level Akses</label>
				  <input type="text" class="form-control" name="nama_level" value="<?=$data_level->nama_level;?>" required />
				</div>
              </div>
			  <div class="card-footer text-end">
				<button class="btn btn-danger" type="button" onclick="window.location.href='<?=base_url('level');?>';">Batal</button>
				<button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Perbarui</button>
              </div>
			  
            <?=form_close();?>
			</div>
            </div>
           </div>
          </div>
        </div>