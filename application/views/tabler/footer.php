<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<!-- Footer -->
		<footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                  <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2023
                    <a href="." class="link-secondary">Tabler</a>.
                    All rights reserved.
                  </li>
                  <li class="list-inline-item">
                    <a href="./changelog.html" class="link-secondary" rel="noopener">
                      v1.0.0-beta19
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
	  </div>
    </div>
    
	<!-- Modals -->
	<div class="modal modal-blur fade" id="modal-dataset" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data</h5>
          </div>
          <div class="modal-body">
		  <?=form_open_multipart('dataset/import');?>
            <div>
              <label class="form-label">Upload CSV File</label>
              <input type="file" name="csv_file" required />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Upload CSV</button>
          </div>
		  <?=form_close();?>
        </div>
      </div>
    </div>
	
	<!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?=base_url('asset/tabler/js/tabler.min.js?1684106062');?>" defer></script>
    <script src="<?=base_url('asset/tabler/js/demo.min.js?1684106062');?>" defer></script>
	<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
	
	<!-- Sweet Alert 2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.1/sweetalert2.all.min.js" integrity="sha512-1SVc8wK7Y/XRAKRKfP09ILQmzJGwqq6m66x6mWa7r36j+/fa+3kz46s8kvELsGc52yo1as48nneFic7BZKMu8Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>		
	$('.hapus').on('click', function (e) {
			e.preventDefault();
			const redirect_link = $(this).attr('href');
			
			Swal.fire({
			  title: 'Apakah anda yakin?',
			  text: "Data akan akan dihapus!",
			  icon: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Hapus'
			}).then((result) => {
			  if (result.isConfirmed) {
				document.location.href = redirect_link;
			  }
			})
		});
	</script>
	<!-- Sweet Alert 2 -->
	
    <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
	  $(document).ready( function () {
		$('#tabel').DataTable();
	  } );
	</script>
  </body>
</html>