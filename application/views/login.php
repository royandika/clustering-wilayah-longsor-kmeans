<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Roy Andika">
    <title>Login :: Aplikasi Tagihan Listrik Pasca Bayar</title>
    <!-- Bootstrap core CSS -->
	<link href="<?=base_url('asset/css/bootstrap.min.css');?>" rel="stylesheet">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	
    <!-- Custom styles for this template -->
    <link href="<?=base_url('asset/css/signin.css');?>" rel="stylesheet">
  </head>
  <body class="text-center">
	<main class="form-signin">
	  <?=form_open('login/proses');?>
		<img class="mb-4" src="<?=base_url('asset/image/amikom.png');?>" alt="" width="150">
		<h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

		<?php
		  if ($this->session->flashdata('message') != ''){
			echo "<div class='form-floating'><div class='alert alert-".$this->session->flashdata('alert')." alert-dismissible fade show' role='alert'>
			".$this->session->flashdata('message')."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div></div>";
		  }
		?>
		
		<div class="form-floating">
		  <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" autofocus required />
		  <label for="floatingInput">Username</label>
		</div>
		<div class="form-floating">
		  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required />
		  <label for="floatingPassword">Password</label>
		</div>
		  <select class="form-control" name="id_level" required>
			<option selected disabled>-- Pilih Tipe User --</option>
			<option value="3">Pelanggan</option>
			<option value="2">Petugas</option>
			<option value="1">Admin</option>
		  </select>
		<button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Masuk</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2023 by <a href="https://royandika.my.id">Roy Andika</a></p>
	  <?=form_close();?>
	</main>
	<!-- Bootstrap core JS-->
        <script src="<?=base_url('asset/js/bootstrap.bundle.min.js');?>"></script>
        <!-- Core theme JS-->
        <script src="<?=base_url('asset/js/scripts.js');?>"></script>
  </body>
</html>