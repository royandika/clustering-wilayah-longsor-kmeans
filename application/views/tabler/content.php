<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!-- Page body -->
        <div class="page-body">
          <div class="container-xl">
		  <div class="col-md-6 col-lg-6">
            <div class="card card-borderless">
              <div class="card-header">
                    <h3 class="card-title">Card with action</h3>
                    <div class="card-actions">
                      <a href="#" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 5l0 14" /><path d="M5 12l14 0" /></svg>
                        Add new
                      </a>
					  <a href="#" class="btn">
                        <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" /><path d="M3 7l9 6l9 -6" /></svg>
                        Email
                      </a>
                    </div>
              </div>
			  <div class="card-body">
                <div id="table-default" class="table-responsive">
                AAA
				</div>
              </div>
			  
			  <div class="card-footer text-end">
				<button class="btn btn-danger" type="button" onclick="window.location.href='<?=base_url();?>';">Batal</button>
				<button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan dan Proses</button>
              </div>
			  
            </div>
           </div>
          </div>
        </div>