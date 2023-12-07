<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col-md-6 col-lg-6">
            <div class="card card-borderless">
              <div class="card-header">
                <h3 class="card-title">Input Form</h3>
              </div>
			  <div class="card-body">
			  <?=form_open('user/simpan');?>
                <div class="mb-3">
				  <label class="form-label">Nama</label>
				  <input type="text" class="form-control" name="nama_user" placeholder="Nama lengkap" required autofocus />
				</div>
				<div class="mb-3">
				  <label class="form-label">Username</label>
				  <input type="text" class="form-control" name="username" placeholder="username" required />
				</div>
				<div class="mb-3">
				  <label class="form-label">Password</label>
				  <input type="password" class="form-control" name="password" required />
				</div>
				<div class="mb-3">
				  <label class="form-label">Password Konfirmasi</label>
				  <input type="password" class="form-control" name="password_conf" required />
				</div>
				<div class="mt-3 mb-3">
				  <label class="form-label">Hak Akses</label>
				  <div class="form-check">
				    <input class="form-check-input" type="radio" name="id_level" value="1">
				    <label class="form-check-label">Administrator</label>
				  </div>
				  <div class="form-check">
				    <input class="form-check-input" type="radio" name="id_level" value="2" checked>
				    <label class="form-check-label">User</label>
				  </div>
              </div>
			  
			  <div class="card-footer text-end">
				<button class="btn btn-danger" type="button" onclick="window.location.href='<?=base_url('user');?>';">Batal</button>
				<button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan dan Proses</button>
              </div>
			  
            <?=form_close();?>
			</div>
           </div>
          </div>
        </div>