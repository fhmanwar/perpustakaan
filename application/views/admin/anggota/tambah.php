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
		<a href="#">User</a>
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

<?php
echo form_open(base_url('admin/anggota/create'));
?>

<div class="row">
  <div class="col-lg-8 ml-auto mr-auto">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Basic Create</div>
      </div>
      <div class="card-body">
  
        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="nama" value="<?php echo set_value('nama') ?>" >
          <label for="inputFloatingLabel" class="placeholder">Nama Lengkap</label>
          <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
        </div>
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="email" class="form-control input-border-bottom" required="" name="email" value="<?php echo set_value('email') ?>">
					<label for="inputFloatingLabel" class="placeholder">Email</label>
					<?php echo form_error('email','<small class="text-danger" >','</small>') ?>
				</div>
	
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="username" value="<?php echo set_value('username') ?>">
					<label for="inputFloatingLabel" class="placeholder">Username</label>
					<?php echo form_error('username','<small class="text-danger" >','</small>') ?>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="password" class="form-control input-border-bottom" required="" name="password" value="<?php echo set_value('password') ?>">
					<label for="inputFloatingLabel" class="placeholder">Password</label>
					<?php echo form_error('password','<small class="text-danger" >','</small>') ?>
        </div>

        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="alamat" value="<?php echo set_value('alamat') ?>" >
          <label for="inputFloatingLabel" class="placeholder">Alamat</label>
          <?php echo form_error('alamt','<small class="text-danger" >','</small>') ?>
        </div>
        
      </div>
			<div class="card-action text-right">
				<input type="submit" class="btn btn-success btn-border btn-round btn-lg" value="Submit" />
				<button type="reset" class="btn btn-danger btn-border btn-round btn-lg">Reset</button>
			</div>
    </div>
  
  </div>


</div>

<?php echo form_close() ?>
