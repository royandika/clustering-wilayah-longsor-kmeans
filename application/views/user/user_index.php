<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col-md-12 col-lg-12">
            <div class="card card-borderless">
              <div class="card-header">
                    <h3 class="card-title">User List</h3>
                    <div class="card-actions">
                      <button type="button" class="btn btn-primary btn-circle" onclick="window.location.href='<?=base_url('index.php/user/baru');?>';"> Tambah User</button>
                    </div>
              </div>
			  <div class="card-body">
                <div id="table-default" class="table-responsive">
                <table class="table table-striped display table-sm" width="100%" cellspacing="0" id='tabel'>
					<thead class="table-light">
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
						<td><button type="button" class="btn btn-primary btn-circle btn-sm" onclick="window.location.href='<?=base_url('index.php/user/update/'.$list->id_user);?>';"> Ubah</button> <button type="button" class="btn btn-danger btn-circle btn-sm user-hapus" href="<?=base_url('index.php/user/hapus/'.$list->id_user);?>"> Hapus</button></th>
					  </tr>
						<?php }}
							else{
								echo'<tr><td style="text-align: center;" colspan="5">Belum ada data user</td></tr>';
							}
						?>
					</tbody>
					<tfoot class="thead-primary">
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
