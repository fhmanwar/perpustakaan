<!--

  <div class="form-group form-group-lg">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="username" value="<?php //echo $user->username ?>" required readonly disabled>
  </div>
  <div class="form-group form-group-lg">
    <label>Password<span class="text-danger"><small> Password minimal 6 karakter atau biarkan kosong</small></span></label>
    <input type="password" name="password" class="form-control" placeholder="password" value="<?php //echo set_value('password') ?>"  >
  </div>
  </div>
  <div class="col-lg-6">
  	<div class="form-group form-group-lg">
  		<label>Level Hak Akses </label>
  		<select name="akses_level" class="form-control">
  			<option value="<?php //echo $user->akses_level ?>"><?php //echo $user->akses_level ?></option>

  		</select>
  	</div>
-->
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
	echo $this->session->flashdata('pesan');
?>
<div class="row">
	<div class="col-md-6">
		<div class="card card-profile card-secondary">
			<div class="card-header" style="background-image: url('<?php echo base_url() ?>assets/admin/assets/img/blogpost.jpg')">
				<div class="profile-picture">
					<div class="avatar avatar-xl">
						<img src="<?php echo base_url('assets/upload/profile/').$user['avatar']; ?>" alt="..." class="avatar-img rounded-circle">
					</div>
				</div>
			</div>
			<div class="card-body">
				<div class="user-profile text-center">
					<div class="name"><?php echo $user['nama'] ?></div>
					<div class="job">Frontend Developer</div>
					<div class="desc">A man who hates loneliness</div>
					<div class="social-media">
						<a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
							<span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
						</a>
						<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
							<span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
						</a>
						<a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
							<span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
						</a>
						<a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
							<span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
						</a>
					</div>
					<div class="view-profile">
						<a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<div class="row user-stats text-center">
					<div class="col">
						<div class="number">125</div>
						<div class="title">Post</div>
					</div>
					<div class="col">
						<div class="number">25K</div>
						<div class="title">Followers</div>
					</div>
					<div class="col">
						<div class="number">134</div>
						<div class="title">Following</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <div class="col-md-4">
		
	</div> -->
</div>