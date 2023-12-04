<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Page content-->
	<div class="container">
	    <div class="row mt-5">
		<?php
		  if ($this->session->flashdata('message') != ''){
			echo "<div class='alert alert-".$this->session->flashdata('alert')." alert-dismissible fade show' role='alert'>
			".$this->session->flashdata('message')."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
		  }
		?>
		  <div class="col">
			<div class="card">
			  <h5 class="card-header"><?=$title;?></h5>
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
				    <label class="form-check-label">Petugas</label>
				  </div>
				  <div class="row mt-3">
				    <div class="col-sm-4"><button class="w-100 btn btn-lg btn-danger" type="button" onclick="window.location.href='<?=base_url('index.php/user');?>';">Batal</button></div>
				    <div class="col-sm-4"><button class="w-100 btn btn-lg btn-secondary" type="reset">Reset</button></div>
				    <div class="col-sm-4"><button class="w-100 btn btn-lg btn-primary" type="submit">Simpan</button></div>
				  </div>
				</div>
				<?=form_close();?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
