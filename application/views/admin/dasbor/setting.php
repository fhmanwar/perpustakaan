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
		<a href="#">Profile</a>
		</li>
		<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Setting</a>
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

<div class="row">
	<div class="col-md-8">
		<div class="card card-with-nav">
			<div class="card-header">
				<div class="row row-nav-line">
					<ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
						<li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Profile</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
						<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab" aria-selected="true">Timeline</a> </li>
					</ul>
				</div>
            </div>
            <?php
                echo form_open(base_url('admin/dasbor/setting'));
            ?>
			<div class="card-body">
				<div class="row mt-3">
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Name</label>
							<input type="text" class="form-control" name="name" placeholder="Nama lengkap" value="<?php echo $user['nama'] ?>">
                        </div>
                        <?php echo form_error('nama','<small class="text-danger" >','</small>') ?>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Email</label>
							<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $user['email'] ?>">
                        </div>
                        <?php echo form_error('email','<small class="text-danger" >','</small>') ?>
					</div>
                </div>
                <div class="row mt-3">
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Username</label>
							<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $user['username'] ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-default">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo set_value('password') ?>">
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-4">
						<div class="form-group form-group-default">
							<label>Birth Date</label>
							<input type="text" class="form-control" id="datepicker" name="datepicker" value="03/21/1998" placeholder="Birth Date">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-default">
							<label>Gender</label>
							<select class="form-control" id="gender">
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group form-group-default">
							<label>Phone</label>
							<input type="text" class="form-control" value="+62008765678" name="phone" placeholder="Phone">
						</div>
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-md-12">
						<div class="form-group form-group-default">
							<label>Address</label>
							<input type="text" class="form-control" value="st Merdeka Putih, Jakarta Indonesia" name="address" placeholder="Address">
						</div>
					</div>
				</div>
				<div class="row mt-3 mb-1">
					<div class="col-md-12">
						<div class="form-group form-group-default">
							<label>About Me</label>
							<textarea class="form-control" name="about" placeholder="About Me" rows="3">A man who hates loneliness</textarea>
						</div>
					</div>
				</div>
				<div class="text-right mt-3 mb-3">
                    <input type="submit" name="submit" class="btn btn-success " value="Save Data">
                    <input type="reset" name="reset" class="btn btn-danger" value="Reset">
				</div>
            </div>
            <?php echo form_close() ?> 
		</div>
	</div>
	<!-- <div class="col-md-4">
		
	</div> -->
</div>