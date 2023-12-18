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
	<!-- SweetAlert2 -->
	<div class="flashdata-class" data-flashdata="<?=$this->session->flashdata('message');?>" data-flashtitle="<?=$this->session->flashdata('title');?>" data-flashalert="<?=$this->session->flashdata('alert');?>"></div>
	
	<!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?=base_url('asset/tabler/js/tabler.min.js?1684106062');?>" defer></script>
    <script src="<?=base_url('asset/tabler/js/demo.min.js?1684106062');?>" defer></script>
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
		
		//Logout
		$('.logout').on('click', function (e) {
			Swal.fire({
			  title: "Logout?",
			  text: "Sesi login akan dihapus!",
			  icon: "warning",
			  showCancelButton: true,
			  confirmButtonColor: '#DD6B55',
			  confirmButtonText: 'Yes',
			  closeOnConfirm: false
			}).then((result) => {
			  if (result.isConfirmed) {
				window.location = '<?=base_url('logout');?>';
			  }else if (result.dismiss === 'cancel') {
					    Swal.fire(
					      'Batal',
					      'Logout dibatalkan! :)',
					      'error'
					    )
					}
			})
		});
		
		//Hapus
		$('.<?=$this->uri->segment(1);?>-hapus').on('click', function (e) {
			e.preventDefault();
			const redirect_link = $(this).attr('href');
			
			Swal.fire({
			  title: 'Apakah anda yakin?',
			  text: "Data <?=$this->uri->segment(1);?> akan dihapus!",
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
	<!-- Libs JS -->