<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
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