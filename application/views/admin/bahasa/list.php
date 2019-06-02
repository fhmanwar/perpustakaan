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
		<a href="#">Buku</a>
	</li>
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Bahasa</a>
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

<?php include('tambah.php'); ?>

<br>

  <?php
    //cetak notifikasi
    echo $this->session->flashdata('success');
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
                  <th>Kode</th>
                  <th>Nama</th>
                  <th>Urutan</th>
                  <th>Keterangan</th>
                  <th>Action</th>
              </tr>
          </thead>
          <tbody>
          <?php $i=1; foreach($bahasa as $bahasa) { ?>
              <tr>
                  <td><?php echo $i ?></td>
                  <td><?php echo $bahasa->kode_bahasa ?><br>
                  <td><?php echo $bahasa->nama_bahasa ?></td>
                  <td><?php echo $bahasa->urutan ?></td>
                  <td><?php echo $bahasa->keterangan ?></td>
                  <td>
                  <!-- <a href="<?php echo base_url('admin/bahasa/edit/'.$bahasa->id_bahasa) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->
                  <?php
                    //Update
                    include('edit.php');
                    //Delete
                    include('delete.php');
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