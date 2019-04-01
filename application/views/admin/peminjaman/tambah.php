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
if($this->session->flashdata('success')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('success');
	echo '</div>';
}

// cetak error kalau ada salah input
echo validation_errors('<div class="alert alert-warning"><i class="fa fa-warning"></i>','</div>');

echo form_open(base_url('admin/peminjaman/add/'.$anggota->id_anggota));
?>

<div class="row alert alert-success">
<div class="col-md-7">

	<div class="form-group">
		<label>Nama Peminjam</label>
		<input type="text" name="nama_peminjaman" class="form-control" placeholder="Nama Peminjam" value="<?php echo $anggota->nama_anggota ?>" readonly disabled>
	</div>
	<div class="form-group">
		<label>Judul Buku yang akan dipinjam</label><br>
		<select name="id_buku" class="form-control js-example-basic-single">
			<option value="">Pilih Buku</option>
			<?php foreach ($buku as $buku) {?>
				<option value="<?php echo $buku->id_buku ?>">
					 <?php echo $buku->judul_buku ?> - <?php echo $buku->kode_buku ?>
				</option>
			<?php } ?>
		</select>
	</div>

</div>

<div class="col-md-5">

	<div class="form-group ">
		<label>Tanggl Peminjaman</label>
		<input type="text" name="tanggal_pinjam" class="form-control" placeholder="YYYY-MM-DD" id="tanggal_pinjam" value="<?php echo set_value('tanggal_pinjam') ?>" required>
	</div>
	<div class="form-group">
		<label>Tanggl Harus Kembali</label>
		<input type="text" name="tanggal_kembali" class="form-control" placeholder="YYYY-MM-DD" id="tanggal_kembali" value="<?php echo set_value('tanggal_kembali') ?>" required>
	</div>

</div>

</div>

	<!-- <div class="form-group form-group-lg">
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
  		<select name="status_peminjaman" class="form-control">
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
 -->


<?php
	echo form_close();

	include('list.php');
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
