<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?php echo $status->id_status ?>">
    <i class="fas fa-edit"></i>
</button>


<!-- Modal -->
<div class="modal fade" id="edit<?php echo $status->id_status ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Status</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
            <?php echo form_open(base_url('admin/status/edit/'.$status->id_status)); ?>
			<div class="modal-body">
				
                <div class="form-group">
                    <label for="disableinput">Kode Status</label>
                    <input type="text" class="form-control" id="disableinput" name="kode_status" value="<?php echo $status->kode_status ?>" disabled>
                    <?php echo form_error('kode_status','<small class="text-danger" >','</small>') ?>
                </div>

				
				<div class="form-group form-floating-label">
                    <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="status" value="<?php echo $status->status ?>">
                    <label for="inputFloatingLabel" class="placeholder">Nama Status</label>
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
