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
		<a href="#">Konfigurasi</a>
		</li>
		<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Icon</a>
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
//cetak notifikasi
if($this->session->flashdata('success')){
  echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
  echo $this->session->flashdata('success');
  echo '</div>';
}
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open_multipart(base_url('admin/konfigurasi/icon'));
?>

<input type="hidden" name="id" value="<?php echo $konfigurasi->id ?>">

<div class="row">
  <div class="col-lg-6 ml-auto mr-auto">
    <div class="card">
      <div class="card-header">

        <?php if($konfigurasi->icon == "") {?>
          <div class="alert alert-success text-center">
            <i class="fa fa-warning"></i>Belum ada icon yang di upload
            <div class="card-title">Icon </div>
          </div>
        <?php }else {?>
          <img class="img img-thumbnail img-responsive" src="<?php echo base_url('assets/upload/image/'.$konfigurasi->icon) ?>" alt="<?php echo $konfigurasi->namaweb ?>">
          <div class="card-title">Icon </div>
        <?php } ?>

      </div>
      <div class="card-body">

        <input type="hidden" name="id" value="<?php echo $konfigurasi->id ?>">

        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="file" class="form-control input-border-bottom" name="icon" value="<?php echo $konfigurasi->tagline ?>">
          <label for="inputFloatingLabel" class="placeholder">Upload Icon Baru</label>
        </div>
        
      </div>
      <div class="card-action text-right">
        <button class="btn btn-secondary btn-border btn-round btn-lg"><i class="fa fa-upload"> </i> Simpan Konfigurasi</button>
      </div>
    </div>
  
  </div>

</div>
<?php echo form_close() ?>