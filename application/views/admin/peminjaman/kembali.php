<?php if($peminjaman->status_kembali == "Sudah") {?>
  <button class="btn btn-success btn-sm disabled" data-toggle="modal" data-target="#Kembali<?php echo $peminjaman->id_peminjaman ?>">
    <i class="fa fa-check"></i> Kembali
  </button>

<?php }else{ ?>
<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#Kembali<?php echo $peminjaman->id_peminjaman ?>">
  <i class="fa fa-check"></i> Kembali
</button>

<div class="modal fade" id="Kembali<?php echo $peminjaman->id_peminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Pengembalian Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">
        			<p class="alert alert-success"><i class="fas fa-check"></i> Yakin buku ini dikembalikan</p>
            </div>
            <div class="modal-footer">
              <a href="<?php echo base_url('admin/peminjaman/delete/'.$peminjaman->id_peminjaman) ?>" class="btn btn-success"><i class="fa fa-check"></i> Yes. Buku Sudah Dikembalikan</a>
              <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit this Data</a>
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>

<?php } ?>
