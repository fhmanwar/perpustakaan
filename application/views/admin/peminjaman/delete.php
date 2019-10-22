<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete<?php echo $peminjaman->id_peminjaman ?>">
  <i class="fa fa-trash-alt"></i>
</button>
<div class="modal fade" id="Delete<?php echo $peminjaman->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Delete Data User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
        			<p class="alert alert-warning">Are you sure want to delete this data?</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('admin/peminjaman/delete/'.$peminjaman->id_peminjaman) ?>" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Yes. Delete this Data</a>
              <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit this Data</a>
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>
