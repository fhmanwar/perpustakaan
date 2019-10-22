<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/anggota/tambah'));
?>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Nama Anggota</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota" value="<?php echo set_value('nama_anggota') ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo set_value('email') ?>" required>
	</div>

  <div class="form-group form-group-lg">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo set_value('username') ?>" required>
  </div>
  <div class="form-group form-group-lg">
    <label>Password</label>
    <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>" required>
  </div>
  </div>
  <div class="col-lg-6">
		<div class="form-group form-group-lg">
			<label>Phone</label>
			<input type="text" name="tlp" class="form-control" placeholder="Phone" value="<?php echo set_value('tlp') ?>" required>
		</div>
  	<div class="form-group form-group-lg">
  		<label>Status Anggota </label>
  		<select name="status_anggota" class="form-control">
  			<option value="Active">Active</option>
  			<option value="Non-Active">Non-Active</option>
  		</select>
  	</div>
    <div class="form-group form-group-lg">
      <label>Instansi</label>
      <textarea name="instansi" class="form-control" placeholder="Instansi"><?php echo set_value('instansi') ?></textarea>
    </div>
    <div class="form-group form-group-lg">
  		<input type="submit" name="Submit" class="btn btn-success btn-lg" value="Save Data">
  		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  	</div>
  </div>



<?php echo form_close() ?>
