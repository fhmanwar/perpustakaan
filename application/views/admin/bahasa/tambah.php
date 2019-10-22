<p>
	<button class="btn btn-success" data-toggle="modal" data-target="#Add" >
  <i class="fas fa-plus"></i> Tambah
</button>
</p>

<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
							<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Tambah Data Buku</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">

<?php echo form_open(base_url('admin/bahasa')); ?>

<div class="form-group form-floating-label">
			<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="nama_bahasa" value="<?php echo set_value('nama_bahasa') ?>">
			<label for="inputFloatingLabel" class="placeholder">Nama Bahasa Buku</label>
		</div>

		<div class="form-group form-floating-label">
			<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="kode_bahasa" value="<?php echo set_value('kode_bahasa') ?>">
			<label for="inputFloatingLabel" class="placeholder">Kode Bahasa Buku</label>
		</div>

		<div class="form-group form-floating-label">
			<input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="urutan" value="<?php echo set_value('urutan') ?>">
			<label for="inputFloatingLabel" class="placeholder">Urutan Tampil</label>
		</div>

		<div class="form-group form-floating-label">
			<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="keterangan"><?php echo set_value('keterangan') ?></textarea>
			<label for="inputFloatingLabel" class="placeholder">Kerterangan Lain </label>
		</div>

	</div>
	
	<div class="modal-footer">
		<input type="submit" name="Submit" class="btn btn-success btn-border btn-round" value="Save Data">
		<input type="reset" class="btn btn-warning btn-border btn-round" value="Reset">
		<button type="button" class="btn btn-danger btn-border btn-round" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
	</div>

	</div>
	</div>
</div>

<?php echo form_close() ?>