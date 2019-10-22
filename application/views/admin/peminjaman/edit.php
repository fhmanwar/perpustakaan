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
		<a href="#">Reservasi</a>
  </li>
  <li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Peminjaman</a>
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

<script type="text/javascript">
// Set default datepicker options
$.datepicker.setDefaults({
	changeMonth: true,
	changeYear: true,
	dateFormat: 'yy-mm-dd',
	defaultDate: +2,
	minDate: 0,
	maxDate: '+2y',
	numberOfMonths: 2,
	showAnim: 'fadeIn',
	showButtonPanel: true
});

function splitDepartureDate(dateText) {
	var depSplit = dateText.split("-", 3);
	$('#alt-tanggal_kembali-d').val(depSplit[0]);
	$('#alt-tanggal_kembali-m').val(depSplit[1]);
	$('#alt-tanggal_kembali-y').val(depSplit[2]);
}


// Set arrival datepicker options
$(function() {
	$('#tanggal_pinjam').datepicker({
			onSelect: function(dateText, instance) {

					// Split arrival date in 3 input fields
					var arrSplit = dateText.split("-");
					$('#alt-tanggal_pinjam-d').val(arrSplit[0]);
					$('#alt-tanggal_pinjam-m').val(arrSplit[1]);
					$('#alt-tanggal_pinjam-y').val(arrSplit[2]);

					// Populate departure date field
					var nextDayDate = $('#tanggal_pinjam').datepicker('getDate', '+3d');
					nextDayDate.setDate(nextDayDate.getDate() + <?php echo $konfigurasi->max_pinjam ?>);
					$('#tanggal_kembali').datepicker('setDate', nextDayDate);
					splitDepartureDate($("#tanggal_kembali").val());
			},
			onClose: function() {
					$("#tanggal_kembali").datepicker("show");
			}
	});
});


// Set departure datepicker options
$(function() {
	$('#tanggal_kembali').datepicker({

			// Prevent selecting departure date before arrival:
			beforeShow: customRange,
			onSelect: splitDepartureDate
	});
});


// Prevent selecting departure date before arrival


function customRange(a) {
	var b = new Date();
	var c = new Date(b.getFullYear(), b.getMonth(), b.getDate());
	if (a.id == 'tanggal_kembali') {
			if ($('#tanggal_pinjam').datepicker('getDate') != null) {
					c = $('#tanggal_pinjam').datepicker('getDate');
			}
	}
	return {
			minDate: c
	}
}



// CREATE REQUEST URL
$('#fbooking').submit(function() {
	var baseURL = $('#fbooking').attr("action");
	var checkAvl = $(this).serialize();
	alert(baseURL + checkAvl)
	return false;
});
</script>
<?php
// Session
echo $this->session->flashdata('pesan');

echo form_open(base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman));
?>

<div class="row">
	<div class="col-lg-10 ml-auto mr-auto">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Basic Create</div>
			</div>
			<div class="card-body row">
				<div class="col-md-12">
					<div class="form-group form-floating-label">
						<select class="form-control " id="selectFloatingLabel2" name="id_buku" required="">
							<option value="">&nbsp;</option>
							<option value="">Pilih Buku</option>
							<?php foreach ($buku as $buku) {?>
								<option value="<?php echo $buku->id_buku ?>" <?php if($buku->id_buku == $peminjaman->id_buku) {echo "selected";} ?>>
									<?php echo $buku->judul_buku ?> - <?php echo $buku->kode_buku ?>
								</option>
							<?php } ?>
						</select>
						<label for="selectFloatingLabel2" class="placeholder">Judul Buku yang akan dipinjam</label>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group">
						<label>Nama Peminjam</label>
						<input type="text" class="form-control" required="" name="nama_peminjaman" value="<?php echo $anggota->nama ?>"  readonly disabled>
					</div>

					<div class="form-group">
						<label for="defaultSelect" >Status Peminjam</label>
						<select class="form-control " id="selectFloatingLabel2" name="status_kembali" required="">
							<option value="Belum">Belum (Baru Pinjam)</option>
							<option value="Sudah">Sudah dikembalikan</option>
							<option value="Hilang">Buku Hilang</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-6"> 
							<div class="form-group">
								<label>Tanggl Peminjaman</label>
								<input type="date" class="form-control" required="" name="tanggal_pinjam" id="tanggal_pinjam" value="<?php if(isset($_POST['tanggal_pinjam'])){ echo $peminjaman->tanggal_pinjam; }else{ echo date('Y-m-d');} ?>" >
							</div>
						</div>
						<div class="col-sm-6"> 
							<div class="form-group">
								<label>Tanggl Harus Kembali</label>
								<input type="date" class="form-control" required="" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo $peminjaman->tanggal_kembali ?>" >
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" class="form-control" required="" name="keterangan" value="<?php echo $peminjaman->keterangan ?>" >
					</div>

				</div>
				
				
			</div>
			<div class="card-action text-right">
				<button class="btn btn-success btn-border btn-round btn-md"><span class="btn-label"><i class="fas fa-save"></i></span> Submit</button>
				<button type="reset" class="btn btn-danger btn-border btn-round btn-md"><span class="btn-label"><i class="fas fa-times"></i></span> Reset</button>
				<a href="<?php echo base_url('admin/peminjaman') ?>" class="btn btn-info btn-border btn-round btn-md"><i class="fa fa-backward"></i> Kembali</a>
			</div>
		</div>
		
	</div>

</div>
<?php echo form_close(); ?>
<!-- end model body -->

<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
