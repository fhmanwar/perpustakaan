<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $usulan->id_usulan ?>" >
  <i class="fa fa-trash-alt"></i>
</button>
<div class="modal fade" id="del<?php echo $usulan->id_usulan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle">Delete Data Usulan : <?php echo $usulan->nama_pengusul ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="alert alert-warning" role="alert">
                Are you sure want to delete this data?
              </div>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('admin/usulan/delete/'.$usulan->id_usulan) ?>" class="btn btn-danger"><i class="fa fa-trash-o"></i> Yes. Delete this Data</a>
              <a href="<?php echo base_url('admin/usulan/edit/'.$usulan->id_usulan) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit this Data</a>
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>
