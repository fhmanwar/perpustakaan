<ul class="breadcrumbs">
	<li class="nav-home">
		<a href="#">
			<i class="flaticon-home"></i>
		</a>
  </li>
  <li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Reservasi</a>
  </li>
  <li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Peminjaman</a>
  </li>
</ul>

  <div class="btn-group btn-group-page-header ml-auto">
    <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu">
      <div class="arrow"></div>
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </div>

</div>



<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>

<?php
//cetak notifikasi
echo $this->session->flashdata('success');
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Peminjaman Buku : <?php echo $buku->judul_buku ?></h4> 
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email - Phone</th>
                <th>Username</th>
                <th>Status Kembali</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($peminjaman as $peminjaman) { ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $peminjaman->nama ?></td>
                <td>
                    <?php echo $peminjaman->email ?>
                    <br><i class="fa fa-phone"></i>
                    <?php echo $peminjaman->tlp ?>
                    <br><i class="fas fa-address-card"></i>
                    <?php echo $peminjaman->alamat ?>
                </td>
                <td><?php echo $peminjaman->username ?></td>
                <td><?php echo $peminjaman->status_kembali ?></td>
                <td>
                <?php include('kembali.php') ?>
                <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <?php include('delete.php') ?>
                </td>
              </tr>
            <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
