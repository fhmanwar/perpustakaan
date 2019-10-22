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
		<a href="#">File</a>
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
//deteksi URI segment
if($this->uri->segment(3) != ""){
  include('tambah.php');
}else {
?>

<p>
  <a href="<?php echo base_url('admin/buku') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah File Buku</a>
</p>
<?php
}
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
                <th>Judul Buku</th>
                <th>Nama File Buku</th>
                <th>Keterangan</th>
                <th>Urutan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $i=1; foreach($file as $file) {
            ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $file->judul_file ?>
                  <br><small>Judul : <?php echo $file->judul_buku ?></small>
                </td>
                <td><?php echo $file->nama_file ?>
                <td><?php echo $file->keterangan?></td>
                <td ><?php echo $file->urutan ?> </td>

                <td>
                  <a href="<?php echo base_url('admin/file/download/'.$file->id_file) ?>" class="btn btn-success btn-sm" target="_blank"><i class="fa fa-download"></i></a>
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