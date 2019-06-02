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
		<a href="#">Buku</a>
	</li>
	<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Update</a>
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
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

if(isset($error)) {
	echo '<div class="alert alert-success">';
	echo $error;
	echo '</div>';
}


echo form_open_multipart(base_url('admin/buku/edit/'.$buku->id_buku));
?>

<div class="row">
  <div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Basic Create</div>
      </div>
      <div class="card-body">
  
        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="judul_buku" value="<?php echo $buku->judul_buku ?>" >
          <label for="inputFloatingLabel" class="placeholder">Judul Buku</label>
          <?php echo form_error('judul_buku','<small class="text-danger" >','</small>') ?>
        </div>
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="penulis_buku" value="<?php echo $buku->penulis_buku ?>">
					<label for="inputFloatingLabel" class="placeholder">Penulis Buku</label>
					<?php echo form_error('penulis_buku','<small class="text-danger" >','</small>') ?>
				</div>
	
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="kode_buku" value="<?php echo $buku->kode_buku ?>">
					<label for="inputFloatingLabel" class="placeholder">Kode Buku</label>
        </div>
  
        <div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="no_seri" value="<?php echo $buku->no_seri ?>">
					<label for="inputFloatingLabel" class="placeholder">No. Seri</label>
				</div>
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="penerbit" value="<?php echo $buku->penerbit ?>">
					<label for="inputFloatingLabel" class="placeholder">Penerbit Buku</label>
				</div>
        
      </div>
    </div>
		
	</div>
	
	<div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Basic Create</div>
      </div>
      <div class="card-body">
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="tahun_terbit" value="<?php echo $buku->tahun_terbit ?>">
					<label for="inputFloatingLabel" class="placeholder">Tahun Terbit</label>
				</div>

        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="kolasi" value="<?php echo $buku->kolasi ?>" >
          <label for="inputFloatingLabel" class="placeholder">Kolasi Buku</label>
        </div>
				
				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="id_jenis" required="">
						<option value="">&nbsp;</option>
						<?php foreach ($jenis as $jenis) { ?>
							<option value="<?php echo $jenis->id_jenis ?>" <?php if($buku->id_jenis == $jenis->id_jenis) {echo "selected";} ?>>
								<?php echo $jenis->kode_jenis ?> - <?php echo $jenis->nama_jenis ?>
							</option>
						<?php } ?>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Jenis Buku</label>
				</div>
					
				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="id_bahasa" required="">
						<option value="">&nbsp;</option>
						<?php foreach ($bahasa as $bahasa) { ?>
							<option value="<?php echo $bahasa->id_bahasa ?>" <?php if($buku->id_bahasa == $bahasa->id_bahasa) {echo "selected";} ?>>
								<?php echo $bahasa->kode_bahasa ?> - <?php echo $bahasa->nama_bahasa ?>
							</option>
						<?php } ?>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Bahasa Buku</label>
				</div>
			
				<div class="form-group form-floating-label">
					<select class="form-control " id="selectFloatingLabel2" name="status_buku" required="">
						<option value="">&nbsp;</option>
						<option value="Publish" <?php if($buku->status_buku == "Publish") {echo "selected";} ?>>Publish</option>
						<option value="Not_Publish" <?php if($buku->status_buku == "Not_Publish") {echo "selected";} ?>>Not Publish</option>
						<option value="Missing" <?php if($buku->status_buku == "Missing") {echo "selected";} ?>>Missing</option>
					</select>
					<label for="selectFloatingLabel2" class="placeholder">Status Buku</label>
				</div>
								
				</div>
    </div>
		
	</div>
	
	<div class="col-lg-4">
    <div class="card">
      <div class="card-header">
        <div class="card-title">Basic Create</div>
      </div>
      <div class="card-body">
				
				<div class="form-group form-floating-label">
					<input id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" name="penerbit" value="<?php echo $buku->penerbit ?>">
					<label for="inputFloatingLabel" class="placeholder">Subjek Buku</label>
				</div>

        <div class="form-group form-floating-label group-lg">
          <input id="inputFloatingLabel" type="number" class="form-control input-border-bottom" required="" name="kolasi" value="<?php echo $buku->kolasi ?>" >
          <label for="inputFloatingLabel" class="placeholder">Jumlah Buku</label>
        </div>
				
				<div class="form-group form-floating-label">
          <input id="inputFloatingLabel" type="file" class="form-control input-border-bottom" name="cover_buku" value="<?php echo $buku->cover_buku ?>">
					<label for="inputFloatingLabel" class="placeholder">Upload Cover(<span class="text-warning">atau biarkan kosong</span>)</label>
					<br>
					<?php if($buku->cover_buku == ""){ ?>
						<span class="text-danger"><small>Belum ada cover yang diupload</small></span>
					<?php }else { ?>
						<img src="<?php echo base_url('assets/upload/buku/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
					<?php } ?>
				</div>
				
				<div class="form-group form-floating-label">
					<textarea id="inputFloatingLabel" class="form-control input-border-bottom" rows="3" name="ringkasan"><?php echo $buku->ringkasan ?></textarea>
					<label for="inputFloatingLabel" class="placeholder">Ringkasan </label>
				</div>
        
      </div>
    </div>
		
	</div>
	
	<div class="col-lg-12 ml-auto mr-auto">
    <div class="card">
				
			<div class="card-action text-right">
				<button class="btn btn-success btn-border btn-round btn-lg">Submit</button>
				<button type="reset" class="btn btn-danger btn-border btn-round btn-lg">Reset</button>
			</div>

    </div>
		
  </div>
	
</div>

<?php echo form_close() ?>
