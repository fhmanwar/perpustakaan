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
//cetak notifikasi
echo $this->session->flashdata('success');

echo form_open(base_url('admin/konfigurasi'));
?>



<input type="hidden" name="id" value="<?php echo $konfigurasi->id ?>">

<div class="row">
  <div class="col-lg-6">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Basic information:</div>
      </div>
      <div class="card-body">
  
        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="namaweb" value="<?php echo $konfigurasi->namaweb ?>" >
          <label for="inputFloatingLabel" class="placeholder">Company name</label>
          <?php echo form_error('namaweb','<small class="text-danger" >','</small>') ?>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="tagline" value="<?php echo $konfigurasi->tagline ?>">
          <label for="inputFloatingLabel" class="placeholder">Company tagline</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="email" value="<?php echo $konfigurasi->email ?>">
          <label for="inputFloatingLabel" class="placeholder">Official email</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="website" value="<?php echo $konfigurasi->website ?>">
          <label for="inputFloatingLabel" class="placeholder">Website address</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="alamat" value="<?php echo $konfigurasi->alamat ?>">
          <label for="inputFloatingLabel" class="placeholder">Address</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" name="phone" value="<?php echo $konfigurasi->phone ?>">
          <label for="inputFloatingLabel" class="placeholder">Phone number</label>
        </div>
  
        <div class="form-group form-floating-label">
          <textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="deskripsi"><?php echo $konfigurasi->deskripsi ?></textarea>
          <label for="inputFloatingLabel" class="placeholder">Summary of the company</label>
        </div>
        
      </div>
    </div>
  
    <div class="card">
      <div class="card-header">
        <div class="card-title">Social network</div>
      </div>
      <div class="card-body">
  
        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="url" class="form-control input-border-bottom" name="max_pinjam" value="<?php echo $konfigurasi->facebook ?>" placeholder="http://facebook.com/akun">
          <label for="inputFloatingLabel" class="placeholder"><i class="fab fa-facebook-square"></i> Facebook</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="url" class="form-control input-border-bottom" name="twitter" value="<?php echo $konfigurasi->twitter ?>" placeholder="http://twitter.com/akun">
          <label for="inputFloatingLabel" class="placeholder"><i class="fab fa-twitter"></i> Twitter</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="url" class="form-control input-border-bottom" name="instagram" value="<?php echo $konfigurasi->instagram ?>" placeholder="http://instagram.com/akun">
          <label for="inputFloatingLabel" class="placeholder"><i class="fab fa-instagram"></i> Instagram</label>
        </div>

      </div>
    </div>
  
  </div>


<div class="col-md-6">
  
  <div class="card">
    <div class="card-header">
      <div class="card-title">Setting Peminjaman Buku</div>
    </div>
    <div class="card-body">

      <div class="form-group form-floating-label group-lg">
        <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" name="max_pinjam" value="<?php echo $konfigurasi->max_pinjam ?>">
        <label for="inputFloatingLabel" class="placeholder">Durasi Maksimal Peminjaman</label>
      </div>

      <div class="form-group form-floating-label">
        <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" name="max_jumlah" value="<?php echo $konfigurasi->max_jumlah ?>">
        <label for="inputFloatingLabel" class="placeholder">Jumlah Maksimal Peminjaman</label>
      </div>

      <div class="form-group form-floating-label">
        <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" name="denda_perhari" value="<?php echo $konfigurasi->denda_perhari ?>">
        <label for="inputFloatingLabel" class="placeholder">Denda Keterlambatan Perhari</label>
      </div>

    </div>
  </div>

  <div class="card">
    <div class="card-header">
      <div class="card-title">Modul SEO (Search Engine Optimization)</div>
    </div>
    <div class="card-body">

    <div class="form-group form-floating-label">
      <textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="5" name="keywords"><?php echo $konfigurasi->keywords ?></textarea>
      <label for="inputFloatingLabel" class="placeholder">Keywords (Keyword search for Google, Bing, etc)</label>
    </div>

    <div class="form-group form-floating-label">
      <textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="5" name="metatext"><?php echo $konfigurasi->metatext ?></textarea>
      <label for="inputFloatingLabel" class="placeholder">Metatext </label>
    </div>

    <div class="form-group form-floating-label">
      <textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="5" name="map"><?php echo $konfigurasi->map ?></textarea>
      <label for="inputFloatingLabel" class="placeholder">Metatext </label>
    </div>

    </div>
  </div>

</div>

<div class="col-lg-8 ml-auto mr-auto">
  <div class="card text-center">
    <div class="card-header">
      <div class="card-title">Maps</div>
    </div>
    <div class="card-body text-center">
      <div id="map-markers" style="height: 300px !important"></div>
      <!-- <div class="map-demo">
        <?php //echo $konfigurasi->map ?>
      </div> -->
    </div>
  </div>
</div>

<div class="col-lg-8 ml-auto mr-auto text-right">
  <!-- <div class="card"> -->
    <!-- <div class="card-action text-right"> -->
      <button class="btn btn-success btn-border btn-round btn-lg">Submit</button>
      <button class="btn btn-danger btn-border btn-round btn-lg">Cancel</button>
    <!-- </div> -->
  <!-- </div> -->
</div>

</div>

<?php echo form_close() ?>