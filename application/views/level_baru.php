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
		  <div class="col-lg-4">
			<div class="card">
			  <div class="list-group">
				  <a href="<?=base_url('index.php/level');?>" class="list-group-item list-group-item-action">Level Akses</a>
				  <a href="<?=base_url('index.php/level/baru');?>" class="list-group-item list-group-item-action active" aria-current="true">Tambah Level Akses</a>
				</div>
			</div>
		  </div>
		  <div class="col-lg-8">
			<div class="card">
			  <h5 class="card-header"><?=$title;?></h5>
			  <div class="card-body">
				<?=form_open('level/simpan');?>
				<div class="mb-3">
				  <label class="form-label">Nama Level Akses</label>
				  <input type="text" class="form-control" name="nama_level" placeholder="Nama level akses" required autofocus />
				</div>
				  <div class="row mt-3">
				    <div class="col-sm-6"><button class="w-100 btn btn-lg btn-secondary" type="reset">Reset</button></div>
				    <div class="col-sm-6"><button class="w-100 btn btn-lg btn-primary" type="submit">Simpan</button></div>
				  </div>
				</div>
				<?=form_close();?>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
