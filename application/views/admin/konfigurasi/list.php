<?php
//cetak notifikasi
if($this->session->flashdata('success')){
  echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
  echo $this->session->flashdata('success');
  echo '</div>';
}
echo validation_errors('<div class="alert alert-warning">','</div>');

echo form_open(base_url('admin/konfigurasi'));
?>

<!-- <form action="<?php echo base_url('admin/konfigurasi') ?>" method="post"> -->

<input type="hidden" name="id" value="<?php echo $konfigurasi->id ?>">

<div class="col-md-6">
	<h3>Basic information:</h3><hr>
  <div class="form-group">
  <label>Company name</label>
  <input type="text" name="namaweb" placeholder="Nama organisasi/perusahaan" value="<?php echo $konfigurasi->namaweb ?>" required class="form-control">
  </div>

  <div class="form-group">
  <label>Company tagline/motto</label>
  <input type="text" name="tagline" placeholder="Company tagline/motto" value="<?php echo $konfigurasi->tagline ?>" class="form-control">
  </div>

  <div class="form-group">
  <label>Official email</label>
  <input type="email" name="email" placeholder="youremail@address.com" value="<?php echo $konfigurasi->email ?>" class="form-control">
  </div>

  <div class="form-group">
  <label>Website address</label>
  <input type="url" name="website" placeholder="<?php echo base_url() ?>" value="<?php echo $konfigurasi->website ?>" class="form-control">
  </div>

  <div class="form-group">
   <label>Address</label>
   <textarea name="alamat" rows="3" class="form-control" placeholder="Alamat perusahaan/organisasi"><?php echo $konfigurasi->alamat ?></textarea>
 </div>

  <div class="form-group">
   <label>Phone number</label>
   <input type="text" name="phone" placeholder="+62" value="<?php echo $konfigurasi->phone ?>" class="form-control">
 </div>

  <div class="form-group">
   <label>Summary of the company</label>
   <textarea name="deskripsi" rows="3" class="form-control" placeholder="Summary of the company"><?php echo $konfigurasi->deskripsi ?></textarea>
 </div>

</div>

<div class="col-md-6">

  <br><h3>Social network</h3><hr>

  <div class="form-group">
  <label>Facebook <i class="fa fa-facebook"></i></label>
  <input type="url" name="facebook" placeholder="http://facebook.com/akun" value="<?php echo $konfigurasi->facebook ?>" class="form-control">
  </div>

  <div class="form-group">
    <label>Twitter <i class="fa fa-twitter"></i></label>
    <input type="url" name="twitter" placeholder="http://twitter.com/akun" value="<?php echo $konfigurasi->twitter ?>" class="form-control">
  </div>

   <div class="form-group">
     <label>Instagram <i class="fa fa-instagram"></i></label>
     <input type="url" name="instagram" placeholder="http://instagram.com/akun" value="<?php echo $konfigurasi->instagram ?>" class="form-control">
   </div>

 <div class="alert alert-success">
   <br><h3>Setting Peminjaman Buku</h3><hr>
   <div class="form-group">
     <label>Durasi Maksimal Peminjaman</label>
     <input type="number" name="max_pinjam" placeholder="Maksimal hari peminjaman" value="<?php echo $konfigurasi->max_pinjam ?>" class="form-control">
   </div>

   <div class="form-group">
     <label>Jumlah Maksimal Peminjaman</label>
     <input type="number" name="max_jumlah" placeholder="Maksimal Jumlah peminjaman" value="<?php echo $konfigurasi->max_jumlah ?>" class="form-control">
   </div>

   <div class="form-group">
     <label>Denda Keterlambatan Perhari</label>
     <input type="number" name="denda_perhari" placeholder="Maksimal Jumlah peminjaman" value="<?php echo $konfigurasi->denda_perhari ?>" class="form-control">
   </div>
  </div>
</div>

<div class="col-md-6">
	<br><h3>Modul SEO (Search Engine Optimization)</h3><hr>
	<div class="form-group">
    <label>Keywords (Keyword search for Google, Bing, etc)</label>
    <textarea name="keywords" rows="3" class="form-control" placeholder="Kata kunci / keywords"><?php echo $konfigurasi->keywords ?></textarea>
  </div>

  <div class="form-group">
    <label>Metatext</label>
    <textarea name="metatext" rows="5" class="form-control" placeholder="Kode metatext"><?php echo $konfigurasi->metatext ?></textarea>
  </div>

</div>

<div class="col-md-6">
  <br><h3>Google Map</h3><hr>
  <div class="form-group">
    <label>Google Map (iframe)</label>
    <textarea name="map" rows="5" class="form-control" placeholder="Kode dari Google Map"><?php echo $konfigurasi->map ?></textarea>
  </div>
</div>

<div class="col-md-6 text-center">
  <div class="form-group map">
  <?php echo $konfigurasi->map ?>
  </div>
</div>
<br>
<br>
<div class="col-md-12 text-center">
	<button type="submit" name="submit" value="Save Configuration" class="btn btn-primary"><i class="fa fa-save"> Simpan Konfigurasi</i></button>
  <button type="reset" name="reset" value="Reset" class="btn btn-default"><i class="fa fa-times"> Reset Konfigurasi</i></button>
</div>

</form>


<?php echo form_close() ?>
