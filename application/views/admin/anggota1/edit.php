<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/anggota/edit/'.$anggota->id_anggota));
?>

<div class="col-lg-6">
	<div class="form-group form-group-lg">
		<label>Nama Anggota</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama lengkap" value="<?php echo $anggota->nama_anggota ?>" required>
	</div>
	<div class="form-group form-group-lg">
		<label>Email</label>
		<input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $anggota->email ?>" required>
	</div>
  <div class="form-group form-group-lg">
    <label>Username</label>
    <input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $anggota->username ?>" required readonly disabled>
  </div>
  <div class="form-group form-group-lg">
    <label>Password<span class="text-danger"><small> Password minimal 6 karakter atau biarkan kosong</small></span></label>
    <input type="password" name="password" class="form-control" placeholder="password" value="<?php echo set_value('password') ?>"  >
  </div>
  </div>
  <div class="col-lg-6">
		<div class="form-group form-group-lg">
			<label>Phone</label>
			<input type="text" name="tlp" class="form-control" placeholder="Phone" value="<?php echo $anggota->tlp ?>" required>
		</div>
  	<div class="form-group form-group-lg">
  		<label>Status Anggota </label>
  		<select name="status_anggota" class="form-control">
  			<option value="Active">Active</option>
  			<option value="Non-Active"<?php if($anggota->status_anggota=="Non-Active"){ echo "selected"; } ?>>Non Active</option>
  		</select>
  	</div>
    <div class="form-group form-group-lg">
      <label>Instansi Lain</label>
      <textarea name="instansi" class="form-control" placeholder="instansi"><?php echo $anggota->instansi ?></textarea>
    </div>
    <div class="form-group form-group-lg">
  		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
  		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  	</div>
  </div>



<?php echo form_close() ?>
