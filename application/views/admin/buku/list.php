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

<p><a href="<?php echo base_url('admin/buku/tambah') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah</a></p>

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
                <th>Cover</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>
                  <br> Jenis - Bahasa
                  <br> Status
                </th>
                <th>File</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $i=1; foreach($buku as $buku) {
              $id_buku    = $buku->id_buku;
              $file       = $this->file_model->buku($id_buku);
            ?>
              <tr >
                  <td><?php echo $i ?></td>
                  <td><?php if($buku->cover_buku != ""){ ?>
                          <img src="<?php echo base_url('assets/upload/buku/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
                      <?php }else{ echo 'Tidak ada';} ?>

                </td>
                  <td><?php echo $buku->judul_buku ?></td>
                  <td><?php echo $buku->penulis_buku ?></td>
                  <td>
                    <small>
                      <br><?php echo $buku->nama_jenis ?> - <?php echo $buku->nama_bahasa ?>
                      <br><?php echo $buku->status_buku ?>
                    </small>
                  </td>
                  
                  <td><?php echo count($file) ?> files</td>

                  <td>
                    <a href="<?php echo base_url('admin/file/kelola/'.$buku->id_buku) ?>" class="btn btn-info btn-sm"><i class="fa fa-book"> Kelola</i></a>
                    <?php include('detail.php');?>
                    <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                    <?php include('delete.php');?>
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