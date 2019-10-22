<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $file->id_file ?>">
	<i class="fas fa-edit"></i>
</button>

<?php
// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}
?>

<div class="modal fade" id="update<?php echo $file->id_file ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Edit File Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
				<?php echo form_open_multipart(base_url('admin/file/edit/'.$file->id_file));?>
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="judul_file" value="<?php echo $file->judul_file ?>">
					<label for="inputFloatingLabel" class="placeholder">Judul File</label>
				</div>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="file" class="form-control input-border-bottom" name="nama_file" value="<?php echo set_value('nama_file') ?>">
					<label for="inputFloatingLabel" class="placeholder">Upload File <small>(File lama: <a href="<?php echo base_url('admin/file/download/'.$file->id_file) ?>" target="_blank"> <i class="fas fa-download"></i> <?php echo $file->nama_file ?></a>)</small></label>
				</div>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="urutan" value="<?php echo $file->urutan ?>">
					<label for="inputFloatingLabel" class="placeholder">Urutan File</label>
				</div>

				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="keterangan"><?php echo $file->keterangan ?></textarea>
					<label for="inputFloatingLabel" class="placeholder">Kerterangan Lain </label>
				</div>

            </div>
            <div class="modal-footer">
				<input type="submit" name="Submit" class="btn btn-success btn-border btn-round" value="Update">
              	<button type="button" class="btn btn-danger btn-border btn-round" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>

