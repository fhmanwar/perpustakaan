<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $berita->id_berita ?>" >
	<i class="fas fa-edit"></i>
</button>

<div class="modal fade" id="update<?php echo $berita->id_berita ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Edit Berita</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
			</div>
			<div class="modal-body">
<?php
if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}

echo form_open_multipart(base_url('admin/berita/edit/'.$berita->id_berita));
?>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="judul_berita" value="<?php echo $berita->judul_berita ?>">
					<label for="inputFloatingLabel" class="placeholder">Judul Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="status_berita" required="">
						<option value="">&nbsp;</option>
						<option value="Publish" <?php if($berita->status_berita =="Publish"){ echo "selected";} ?>>Publish</option>
						<option value="Draft" <?php if($berita->status_berita =="Draft"){ echo "selected";} ?>>Simpan Sebagai Draft</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Status Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="jenis_berita" required="">
						<option value="">&nbsp;</option>
						<option value="Berita" <?php if($berita->jenis_berita =="Berita"){ echo "selected";} ?>>Berita</option>
						<option value="Slide" <?php if($berita->jenis_berita =="Slide"){ echo "selected";} ?>>Homepage</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Jenis Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="file" class="form-control input-border-bottom" name="gambar" value="<?php echo $berita->gambar ?>">
					<label for="inputFloatingLabel" class="placeholder">Upload Gambar Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="isi"><?php echo $berita->isi ?></textarea>
					<label for="inputFloatingLabel" class="placeholder">Kerterangan Lain </label>
				</div>

			</div>
			<div class="modal-footer">
					<input type="submit" name="Submit" class="btn btn-success btn-border btn-round" value="Save Data">
					<button type="button" class="btn btn-danger btn-border btn-round" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
			</div>
			<?php echo form_close() ?>
		</div>
    </div>
</div>