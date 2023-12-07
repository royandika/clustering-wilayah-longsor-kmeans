<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col">
            <div class="card card-borderless">
              <div class="card-header">
                    <h3 class="card-title">List</h3>
                    <div class="card-actions">
                      <a href="<?=base_url('level/baru');?>" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Tambah Level
                      </a>
                    </div>
              </div>
			  <div class="card-body">
                <div id="table-default" class="table-responsive">
                  <table class="table table-striped display table-sm" width="100%" cellspacing="0" id="tabel">
					<thead class="thead-primary">
					  <tr style="text-align: center;">
						<th style="text-align: center;">#</th>
						<th style="text-align: center;">Nama</th>
						<th style="text-align: center;">Opsi</th>
					  </tr>
					</thead>
					<tbody>
					  <?php
						if(is_array($list_level)){
						$no=1; foreach ($list_level as $list) {
					  ?>
					  <tr style="text-align: center;">
						<td><?=$no++;?></td>
						<td><?=$list->nama_level;?></td>
						<td><button type="button" class="btn btn-primary btn-circle btn-sm" onclick="window.location.href='<?=base_url('index.php/level/update/'.$list->id_level);?>';"> Ubah</button> <button type="button" class="btn btn-danger btn-circle btn-sm level-hapus" href="<?=base_url('index.php/level/hapus/'.$list->id_level);?>"> Hapus</button></th>
					  </tr>
						<?php }}
							else{
								echo'<tr><td style="text-align: center;" colspan="5">Belum ada data level akses</td></tr>';
							}
						?>
					</tbody>
					<tfoot class="table-light">
					  <tr style="text-align: center;">
						<th style="text-align: center;">#</th>
						<th style="text-align: center;">Nama</th>
						<th style="text-align: center;">Opsi</th>
					  </tr>
					</tfoot>
				  </table>
				</div>
              </div>
            </div>
           </div>
          </div>
        </div>