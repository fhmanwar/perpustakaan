<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del<?php echo $file->id_file ?>">
  <i class="fa fa-trash-alt"></i>
</button>
<div class="modal fade" id="del<?php echo $file->id_file ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle">Delete Data File Buku : <?php echo $file->judul_buku ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
        			<p class="alert alert-warning">Are you sure want to delete this data?</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('admin/file/delete/'.$file->id_file.'/'.$file->id_buku) ?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Yes. Delete this Data</a>
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>
