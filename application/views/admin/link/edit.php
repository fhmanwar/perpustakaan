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
		<a href="#">Link</a>
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
echo form_open(base_url('admin/link/edit/'.$link->id_link));
?>

<div class="row">
	<div class="col-lg-8 ml-auto mr-auto">

	<div class="card">
      <div class="card-header">
        <div class="card-title">Basic information:</div>
      </div>
      <div class="card-body">
  
        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="nama_link" value="<?php echo $link->nama_link ?>" >
          <label for="inputFloatingLabel" class="placeholder">Nama Link</label>
          <?php echo form_error('nama_link','<small class="text-danger" >','</small>') ?>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="url" value="<?php echo $link->url ?>">
          <label for="inputFloatingLabel" class="placeholder">URL/Website</label>
        </div>

		<div class="form-group form-floating-label">
			<select class="form-control " id="selectFloatingLabel2" name="target" required="">
				<option value="">&nbsp;</option>
				<option value="_blank" <?php if($link->target=="_blank"){ echo "selected";} ?>>_blank</option>
				<option value="_self" <?php if($link->target=="_self"){ echo "selected";} ?>>_self</option>
				<option value="_parent" <?php if($link->target=="_parent"){ echo "selected";} ?>>_parent</option>
				<option value="_top" <?php if($link->target=="_top"){ echo "selected";} ?>>_top</option>
			</select>
			<label for="selectFloatingLabel2" class="placeholder">Target</label>
		</div>

		</div>
		<div class="card-action text-right">
			<button class="btn btn-success btn-border btn-round"><i class="fas fa-save"> </i> simpan</button>
		</div>
    </div>

	</div>
</div>


<?php echo form_close() ?>
