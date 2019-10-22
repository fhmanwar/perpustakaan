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
				<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
            <?php echo form_open(base_url('admin/level')); ?>
			<div class="modal-body">
				
				<div class="form-group form-floating-label">
                    <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="kode_level" value="<?php echo set_value('kode_level') ?>" >
					<label for="inputFloatingLabel" class="placeholder">Kode Status</label>
					<?php echo form_error('kode_level','<small class="text-danger" >','</small>') ?>
                </div>

				
				<div class="form-group form-floating-label">
                    <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="level" value="<?php echo set_value('level') ?>">
                    <label for="inputFloatingLabel" class="placeholder">Nama Status</label>
                    <?php echo form_error('level','<small class="text-danger" >','</small>') ?>
                </div>

            </div>
            
            <div class="modal-footer ">
                <input type="submit" name="submit" class="btn btn-success btn-border btn-round" value="Save">
                <input type="reset" class="btn btn-warning btn-border btn-round" value="Reset">
                <button type="button" class="btn btn-secondary btn-border btn-round" data-dismiss="modal">Close</button>
            </div>
				<?php echo form_close() ?>
			
		</div>
	</div>
</div>
