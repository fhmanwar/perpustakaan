<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $jenis->id_jenis ?>">
  <i class="fa fa-trash-alt"></i>
</button>
<div class="modal fade" id="del<?php echo $jenis->id_jenis ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Delete Data Jenis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
        			<p class="alert alert-warning">Are you sure want to delete this data?</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('admin/jenis/delete/'.$jenis->id_jenis) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Yes. Delete this Data</a>
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>
