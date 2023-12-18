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
    <title>Login :: Clustering Wilayah Rawan Longsor Dengan K-Means</title>
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
			<option value="1">Admin</option>
			<option value="1">User</option>
		  </select>
		<button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Masuk</button>
		<p class="mt-5 mb-3 text-muted">&copy; 2023 by <a href="https://royandika.my.id">Roy Andika</a></p>
	  <?=form_close();?>
	</main>
	<div class="flashdata-class" data-flashdata="<?=$this->session->flashdata('message');?>" data-flashtitle="<?=$this->session->flashdata('title');?>" data-flashalert="<?=$this->session->flashdata('alert');?>"></div>
	<!-- Bootstrap core JS-->
        <script src="<?=base_url('asset/js/bootstrap.bundle.min.js');?>"></script>
        <!-- Core theme JS-->
        <script src="<?=base_url('asset/js/scripts.js');?>"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
	<!-- Sweet Alert 2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.1/sweetalert2.all.min.js" integrity="sha512-1SVc8wK7Y/XRAKRKfP09ILQmzJGwqq6m66x6mWa7r36j+/fa+3kz46s8kvELsGc52yo1as48nneFic7BZKMu8Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		//Flashdata
		const flashData = $('.flashdata-class').data('flashdata');
		const flashAlert = $('.flashdata-class').data('flashalert');
		const flashTitle = $('.flashdata-class').data('flashtitle');
		if(flashData){
			Swal.fire(
				flashTitle,
				flashData,
				flashAlert
			)
		};
	</script>
  </body>
</html>