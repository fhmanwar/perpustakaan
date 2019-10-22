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
		<a href="#">Berita</a>
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
include('tambah.php');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
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
                <th>Gambar</th>
                <th>Judul Berita</th>
                <th>Status</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($berita as $berita) { ?>
              <tr>
                  <td><?php echo $i ?></td>
                  <td>
                    <?php if($berita->gambar != ""){ ?>
                      <img src="<?php echo base_url('assets/upload/berita/thumbs/'.$berita->gambar) ?>" class="img img-thumbnail" width="60">
                    <?php }else{ echo 'Tidak ada';} ?>
                  </td>
                  <td><?php echo $berita->judul_berita ?></td>
                  <td><?php echo $berita->status_berita ?>
                  <td><?php echo $berita->jenis_berita?></td>
                  <td><?php echo date('d-m-Y H:i:s',strtotime($berita->tanggal))?></td>
                  <td>
                    <!-- <a href="<?php //echo base_url('admin/berita/edit/'.$berita->id_berita) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->
                    <?php 
                      include('edit.php');
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