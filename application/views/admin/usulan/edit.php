<?php
// Session
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/usulan/edit/'.$usulan->id_usulan));
?>

<div class="col-lg-6">

  <div class="form-group form-group-lg">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control" placeholder="Judul Buku" value="<?php echo $usulan->judul ?>" required>
  </div>
  <div class="form-group form-group-lg">
    <label>Nama Penulis</label>
    <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis" value="<?php echo $usulan->penulis ?>" required>
  </div>
	<div class="form-group form-group-lg">
    <label>penerbit</label>
    <input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit" value="<?php echo $usulan->penerbit ?>" required>
  </div>

  </div>
  <div class="col-lg-6">
		<div class="form-group form-group-lg">
			<label>Nama Pengusul</label>
			<input type="text" name="nama_pengusul" class="form-control" placeholder="Nama Pengusul" value="<?php echo $usulan->nama_pengusul ?>" required>
		</div>

		<div class="form-group form-group-lg">
			<label>Email Pengusul</label>
			<input type="email" name="email_pengusul" class="form-control" placeholder="Email Pengusul " value="<?php echo $usulan->email_pengusul ?>" required>
		</div>

		<div class="form-group form-group-lg">
      <label>Status Usulan</label>
			<select name="status_usulan" class="form-control">
				<option value="Diterima" >Diterima</option>
				<option value="Baru" <?php if($usulan->status_usulan =="Baru"){ echo "selected";} ?>>Baru</option>
				<option value="Pending"<?php if($usulan->status_usulan =="Pending"){ echo "selected";} ?>>Pending</option>
				<option value="Ditolak"<?php if($usulan->status_usulan =="Ditolak"){ echo "selected";} ?>>Ditolak</option>
			</select>
    </div>

  </div>

	<div class="col-lg-12">
		<div class="form-group form-group-lg">
      <label>Keterangan Lain</label>
      <textarea name="keterangan" class="form-control" placeholder="Keterangan"> <?php echo $usulan->keterangan ?> </textarea>
    </div>

		<div class="form-group form-group-lg text-center">
  		<input type="submit" name="Submit" class="btn btn-primary btn-lg" value="Save Data">
  		<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
  	</div>
	</div>



<?php echo form_close() ?>
