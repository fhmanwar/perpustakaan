
<!-- Button trigger modal -->
<p>
	<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#add">
		<span class="btn-label">
			<i class="fas fa-plus"></i>
			Tambah
		</span>
	</button>
</p>


<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Link</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
			<div class="modal-body">
				
				<?php echo form_open(base_url('admin/link')); ?>
				<div class="form-group form-floating-label group-lg">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="nama_link" value="<?php echo set_value('nama_link') ?>" >
					<label for="inputFloatingLabel" class="placeholder">Nama Link</label>
					<?php echo form_error('nama_link','<small class="text-danger" >','</small>') ?>
				</div>
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="url" value="<?php echo set_value('url') ?>">
					<label for="inputFloatingLabel" class="placeholder">URL/Website</label>
				</div>

				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="target" required="">
						<option value="">&nbsp;</option>
						<option value="_blank">_blank</option>
						<option value="_self">_self</option>
						<option value="_parent">_parent</option>
						<option value="_top">_top</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Target</label>
				</div>

				<div class="modal-footer ">
					<input type="submit" name="submit" class="btn btn-success btn-border btn-round" value="Save">
					<input type="reset" class="btn btn-warning btn-border btn-round" value="Reset">
				</div>
				<?php echo form_close() ?>
			
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		</div>
	</div>
</div>
