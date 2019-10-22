<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#del<?php echo $status->id_status ?>">
  <i class="fas fa-trash-alt"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="del<?php echo $status->id_status ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Delete Data Link <?php echo $status->status ?> </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning" role="alert">
						Are you sure want to delete this data?
				</div>
			</div>
			<div class="modal-footer">
				<a href="<?php echo base_url('admin/status/delete/'.$status->id_status) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Yes. Delete this Data</a>
				<button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
			</div>
		</div>
	</div>
</div>