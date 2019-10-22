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
  <li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Anggota</a>
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

<p class="alert alert-success">
  <i class="fa fa-warning"></i>
  Cari nama anggota di kolom <strong>Search</strong>, kemudian klik tombol <strong><i class="fa fa-plus"></i> Peminjaman Buku</strong>
</p>

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
                <th>Nama</th>
                <th>Email - Phone</th>
                <th>Username - Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($anggota as $anggota) { ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $anggota->nama ?></td>
                <td><?php echo $anggota->email ?><br><i class="fa fa-phone"></i><?php echo $anggota->tlp ?></td>
                <td><?php echo $anggota->username ?> - <?php echo $anggota->status ?></td>
                <td>
                <a href="<?php echo base_url('admin/peminjaman/add/'.$anggota->id_user) ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Peminjaman Buku</a>
                <?php
                  //Delete
                  // include('delete.php')
                ?>
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