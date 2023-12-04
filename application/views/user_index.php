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
				<div class="mb-3">
				  <button type="button" class="btn btn-primary btn-circle" onclick="window.location.href='<?=base_url('index.php/user/baru');?>';"> Tambah User</button>
				</div>
				<div class="table-responsive">
				  <table class="table table-striped display table-sm" width="100%" cellspacing="0">
					<thead class="thead-primary">
					  <tr style="text-align: center;">
						<th>#</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Level</th>
						<th>Opsi</th>
					  </tr>
					</thead>
					<tbody>
					  <?php
						if(is_array($list_user)){
						$no=1; foreach ($list_user as $list) {
					  ?>
					  <tr style="text-align: center;">
						<td><?=$no++;?></td>
						<td><?=$list->nama_user;?></td>
						<td><?=$list->username;?></td>
						<td><?=$list->nama_level;?></td>
						<td><button type="button" class="btn btn-primary btn-circle btn-sm" onclick="window.location.href='<?=base_url('index.php/user/update/'.$list->id_user);?>';"> Ubah</button> <button type="button" class="btn btn-danger btn-circle btn-sm" onclick="window.location.href='<?=base_url('index.php/user/hapus/'.$list->id_user);?>';"> Hapus</button></th>
					  </tr>
						<?php }}
							else{
								echo'<tr><td style="text-align: center;" colspan="5">Belum ada data user</td></tr>';
							}
						?>
					</tbody>
					<tfoot class="table-light">
					  <tr style="text-align: center;">
						<th>#</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Level</th>
						<th>Opsi</th>
					  </tr>
					</tfoot>
				  </table>
				</div>	
			  </div>
			</div>
		  </div>
		</div>
	  </div>
