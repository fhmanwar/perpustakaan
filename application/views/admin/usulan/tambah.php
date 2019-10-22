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
		<a href="#">Usulan</a>
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
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/usulan/tambah'));
?>

<div class="row">
  <div class="col-lg-8 ml-auto mr-auto">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Basic Create</div>
      </div>
      <div class="card-body">
  
        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="judul" value="<?php echo set_value('judul') ?>" >
          <label for="inputFloatingLabel" class="placeholder">Judul</label>
          <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
        </div>
				
				
        <div class="form-group form-floating-label group-lg">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="penulis" value="<?php echo set_value('penulis') ?>" >
          <label for="inputFloatingLabel" class="placeholder">Nama Penulis</label>
          <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
				</div>
				
				<div class="form-group form-floating-label group-lg">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="penerbit" value="<?php echo set_value('penerbit') ?>" >
          <label for="inputFloatingLabel" class="placeholder">penerbit</label>
          <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
				</div>
				
				<div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="nama_pengusul" value="<?php echo set_value('nama_pengusul') ?>" >
          <label for="inputFloatingLabel" class="placeholder">Nama Pengusul</label>
          <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
				</div>
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="email" class="form-control input-border-bottom" required="" name="email_pengusul" value="<?php echo set_value('email_pengusul') ?>">
					<label for="inputFloatingLabel" class="placeholder">Email Pengusul</label>
					<?php echo form_error('email','<small class="text-danger" >','</small>') ?>
				</div>

        <div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="status_usulan" required="">
						<option value="">&nbsp;</option>
						<option value="Diterima">Diterima</option>
						<option value="Baru">Baru</option>
						<option value="Pending">Pending</option>
						<option value="Ditolak">Ditolak</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Status Usulan</label>
				</div>

				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="5" name="keterangan"><?php echo set_value('keterangan') ?></textarea>
					<label for="inputFloatingLabel" class="placeholder">Keterangan Lain</label>
				</div>
        
      </div>
			<div class="card-action text-right">
				<input type="submit" name="Submit" class="btn btn-success btn-border btn-round btn-lg" value="Save Data" />
				<input type="reset" class="btn btn-danger btn-border btn-round btn-lg" value="Reset"/>
			</div>
    </div>
  
  </div>


</div>

<?php echo form_close() ?>
