<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $user->id_user ?>">
  <i class="fa fa-trash-alt"></i>
</button>
<div class="modal fade" id="del<?php echo $user->id_user ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle">Delete Data User <?php echo $user->username ?></h4>
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
              <a href="<?php echo base_url('admin/user/delete/'.$user->id_user) ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Yes. Delete this Data</a>
              <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit this Data</a>
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>
