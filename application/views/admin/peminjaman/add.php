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

<?php if(count($limit) >= $konfigurasi->max_jumlah) { ?>
  <div class="alert alert-warning text-center">
    <i class="fa fa-warning fa-3x"></i>
    <p>Mohon maaf, limit peminjaman buku baru tidak dapat dilakukan. Buku yang dipinjam harus dikembalikan terlebih dahulu jika ingin menambah peminjaman baru.</p>
  </div>

<?php }else{ ?>
<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#Tambah">
  <i class="fa fa-plus"></i> <b>Tambah Peminjaman Buku</b>
</button>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
							<h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Tambah Peminjaman Buku</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body">

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
							
              <?php echo form_open(base_url('admin/peminjaman/add/'.$anggota->id_anggota)); ?>

              <div class="row">

              <div class="col-md-12">
              	<div class="form-group">
              		<label>Judul Buku yang akan dipinjam</label><br>
              		<select name="id_buku" class="form-control js-example-basic-single" style="width: 100%; padding: 10px 20px !important;">
              			<option value="">Pilih Buku</option>
              			<?php foreach ($buku as $buku) {?>
              				<option value="<?php echo $buku->id_buku ?>">
              					 <?php echo $buku->judul_buku ?> - <?php echo $buku->kode_buku ?>
              				</option>
              			<?php } ?>
              		</select>
              	</div>
              </div>
              <div class="col-md-4">

              	<div class="form-group">
              		<label>Nama Peminjam</label>
              		<input type="text" name="nama_peminjaman" class="form-control" placeholder="Nama Peminjam" value="<?php echo $anggota->nama_anggota ?>" readonly disabled>
              	</div>
              	<div class="form-group">
              		<label>Status Peminjam</label>
              		<select class="form-control" name="status_kembali">
              			<option value="Belum">Belum (Baru Pinjam)</option>
              		</select>
              	</div>

              </div>

              <div class="col-md-8">
              <div class="row">
              	<div class="col-md-6">
              		<div class="form-group ">
              			<label>Tanggl Peminjaman</label>
              			<input type="text" name="tanggal_pinjam" class="form-control" placeholder="YYYY-MM-DD" id="tanggal_pinjam" value="<?php if(isset($_POST['tanggal_pinjam'])){ echo set_value('tanggal_pinjam'); }else{ echo date('Y-m-d');} ?>" required>
              		</div>
              	</div>
              	<div class="col-md-6">
              		<div class="form-group">
              			<label>Tanggl Harus Kembali</label>
              			<input type="text" name="tanggal_kembali" class="form-control" placeholder="YYYY-MM-DD" id="tanggal_kembali" value="<?php echo set_value('tanggal_kembali') ?>" required>
              		</div>
              	</div>
              </div>

              <div class="form-group">
              	<label>Keterangan</label>
              	<input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="<?php echo set_value('keterangan') ?>" >
              </div>
              </div>

              <div class="col-md-12 text-center">
              	<button type="submit" name="Submit" class="btn btn-primary btn-lg">
              		<i class="fa fa-save"></i>
              		Simpan Data Peminjaman
              	</button>
              	<button type="reset" name="reset" class="btn btn-default btn-lg">
              		<i class="fa fa-times"></i>
              		Reset
              	</button>
              	<a href="<?php echo base_url('admin/peminjaman') ?>" class="btn btn-danger btn-lg">
              		<i class="fa fa-backward"></i>
              		Kembali
              	</a>
              </div>

              </div>
              <?php echo form_close(); ?>
              <!-- end model body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>

<?php } ?>

<?php
//cetak notifikasi
echo $this->session->flashdata('success');
?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Buku yang di Pinjam</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
              <tr>
                <th>#</th>
                <th>Judul Buku - Kode</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Harus Kembali</th>
                <th>Status Kembali</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($peminjaman as $peminjaman) { ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $peminjaman->judul_buku ?> - <?php echo $peminjaman->kode_buku ?></td>
                <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
                <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
                <td><?php echo $peminjaman->status_kembali ?></td>
                <td>
                <?php include('kembali.php') ?>
                <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <?php include('delete.php') ?>
                </td>
              </tr>
            <?php $i++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
