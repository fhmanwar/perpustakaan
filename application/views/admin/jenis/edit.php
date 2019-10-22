<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#update<?php echo $jenis->id_jenis ?>">
	<i class="fas fa-edit"></i>
</button>


<div class="modal fade" id="update<?php echo $jenis->id_jenis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Edit File</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
				</div>
				<div class="modal-body">
					<?php echo form_open(base_url('admin/jenis/edit/'.$jenis->id_jenis)); ?>
					
						<div class="form-group form-floating-label">
							<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="nama_jenis" value="<?php echo $jenis->nama_jenis ?>">
							<label for="inputFloatingLabel" class="placeholder">Nama Jenis Buku</label>
						</div>

						<div class="form-group form-floating-label">
							<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="kode_jenis" value="<?php echo $jenis->kode_jenis ?>">
							<label for="inputFloatingLabel" class="placeholder">Kode Jenis Buku</label>
						</div>

						<div class="form-group form-floating-label">
							<input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="urutan" value="<?php echo $jenis->urutan ?>">
							<label for="inputFloatingLabel" class="placeholder">Urutan Tampil</label>
						</div>

						<div class="form-group form-floating-label">
							<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="keterangan"><?php echo $jenis->keterangan ?></textarea>
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
