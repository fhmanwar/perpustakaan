<p>
	<button class="btn btn-success" data-toggle="modal" data-target="#Add" >
		<i class="fas fa-plus"></i> Tambah
	</button>
</p>

<div class="modal fade" id="Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Tambah Data Jenis</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
<?php echo form_open_multipart(base_url('admin/berita/tambah')); ?>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="judul_berita" value="<?php echo set_value('judul_berita') ?>">
					<label for="inputFloatingLabel" class="placeholder">Judul Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="status_berita" required="">
						<option value="">&nbsp;</option>
						<option value="Publish">Publish</option>
						<option value="Draft">Simpan Sebagai Draft</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Status Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="jenis_berita" required="">
						<option value="">&nbsp;</option>
						<option value="Berita">Berita</option>
						<option value="Slide">Homepage</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Jenis Berita</label>
				</div>

				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="file" class="form-control input-border-bottom" name="gambar" value="<?php echo set_value('gambar') ?>">
					<label for="inputFloatingLabel" class="placeholder">Upload Logo Baru</label>
				</div>

				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="isi"><?php echo set_value('isi') ?></textarea>
					<label for="inputFloatingLabel" class="placeholder">Kerterangan Lain </label>
				</div>

			</div>
		
			<div class="modal-footer">
				<input type="submit" name="Submit" class="btn btn-success btn-border btn-round" value="Save Data">
				<input type="reset" class="btn btn-warning btn-border btn-round" value="Reset">
				<button type="button" class="btn btn-danger btn-border btn-round" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
			</div>
			<?php echo form_close() ?>


		</div>
	</div>
</div>


