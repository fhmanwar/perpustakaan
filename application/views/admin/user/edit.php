<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/user/edit/'.$user->id_user));
?>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Nama Lengkap</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama lengkap" value="<?php echo $user->nama ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $user->email ?>" required>
	</div>
  <div class="form-group form-group-lg">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $user->username ?>" required readonly disabled>
  </div>
  <div class="form-group form-group-lg">
    <label>Password<span class="text-danger"><small> Password minimal 6 karakter atau biarkan kosong</small></span></label>
    <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>"  >
  </div>
  </div>
  <div class="col-lg-6">
  	<div class="form-group form-group-lg">
  		<label>Level Hak Akses </label>
  		<select name="akses_level" class="form-control">
  			<option value="Admin">Administrator</option>
  			<option value="User"<?php if($user->akses_level=="User"){ echo "selected"; } ?>>User</option>
  		</select>
  	</div>
    <div class="form-group form-group-lg">
      <label>Keterangan Lain</label>
      <textarea name="keterangan" class="form-control" placeholder="keterangan"> <?php echo $user->keterangan ?> </textarea>
    </div>
    <div class="form-group form-group-lg">
  		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
  		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  	</div>
  </div>



<?php echo form_close() ?>
