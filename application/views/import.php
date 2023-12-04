<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Page content-->
	<div class="container">
	  <div class="text-center mt-5">
		<?php
		  if ($this->session->flashdata('message') != ''){
			echo "<div class='alert alert-".$this->session->flashdata('alert')." alert-dismissible fade show' role='alert'>
			".$this->session->flashdata('message')."<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
		  }
		?>
		<form method="post" action="<?php echo base_url(); ?>index.php/dataset/import" enctype="multipart/form-data">
		  <input type="file" name="csv_file" required />
		  <br />
		  <input type="submit" name="import" value="Import" class="btn btn-info" />
	    </form>
	  </div>
	</div>

