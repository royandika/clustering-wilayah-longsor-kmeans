<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<!-- Select 2 -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="text/javascript">
	  if(jQuery().select2) {
		$(".select2").select2({
			theme: "bootstrap",
			 placeholder: "-- Pilih --",
			allowClear: true,
		});
	  }
	</script>