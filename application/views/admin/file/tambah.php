<p>
  <button class="btn btn-success" data-toggle="modal" data-target="#Add">
		<i class="fas fa-upload"></i> Tambah
	</button>
</p>
<?php

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}


echo form_open_multipart(base_url('admin/file/kelola/'.$buku->id_buku));
?>

<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Tambah File Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="judul_file" value="<?php echo set_value('judul_file') ?>">
					<label for="inputFloatingLabel" class="placeholder">Judul File</label>
				</div>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="file" class="form-control input-border-bottom" name="nama_file" value="<?php echo set_value('nama_file') ?>">
					<label for="inputFloatingLabel" class="placeholder">Upload File</label>
				</div>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="urutan" value="<?php echo set_value('urutan') ?>">
					<label for="inputFloatingLabel" class="placeholder">Urutan File</label>
				</div>

				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="keterangan"><?php echo set_value('keterangan') ?></textarea>
					<label for="inputFloatingLabel" class="placeholder">Kerterangan Lain </label>
				</div>

            </div>
            <div class="modal-footer">
				<input type="submit" name="Submit" class="btn btn-success btn-border btn-round" value="Upload File Baru">
				<input type="reset" class="btn btn-warning btn-border btn-round" value="Reset">
              	<button type="button" class="btn btn-danger btn-border btn-round" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>


<?php echo form_close() ?>
