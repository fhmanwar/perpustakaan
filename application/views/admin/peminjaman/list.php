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

<?php
if($this->uri->segment(3) == "") {?>
<p>
  <a href="<?php echo base_url('admin/peminjaman/add/'.$this->session->userdata('id_user')) ?>" class="btn btn-success">
  <!-- <a href="<?php echo base_url('admin/peminjaman/dataPeminjam') ?>" class="btn btn-success"> -->
    <i class="fa fa-plus"></i> Tambah
  </a>
</p>
<?php
}
//cetak notifikasi
echo $this->session->flashdata('pesan');
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Anggota </th>
                <th>Judul Buku - Kode</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Harus Kembali</th>
                <th>Status Kembali</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($peminjaman as $peminjaman) { ?>
              <tr>
                <td><?php echo $i ?></td>
                  <td>
                    <a href="<?php echo base_url('admin/peminjaman/add/'.$peminjaman->id_user) ?>">
                      <?php echo $peminjaman->nama ?> <sup><i class="fa fa-link"></i> </sup>
                    </a>
                  </td>
                <td>
                    <a href="<?php echo base_url('admin/peminjaman/bukuList/'.$peminjaman->id_buku) ?>">
                      <?php echo $peminjaman->judul_buku ?> - <?php echo $peminjaman->kode_buku ?> <sup><i class="fa fa-link"></i> </sup>
                    </a>
                </td>
                <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
                <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
                <td><?php echo $peminjaman->status_kembali ?></td>
                <td>
                <?php include('kembali.php') ?>
                <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <?php include('delete.php') ?>
                <!-- <button class="btn btn-danger btn-sm" id="del">Show me</button>	 -->
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