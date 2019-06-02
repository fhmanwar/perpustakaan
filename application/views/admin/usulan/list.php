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
		<a href="#">Usulan</a>
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

<p><a href="<?php echo base_url('admin/usulan/tambah') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah</a></p>

  <?php
    //cetak notifikasi
    if($this->session->flashdata('success')){
      echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
      echo $this->session->flashdata('success');
      echo '</div>';
    }
  ?>
  
  <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Basic</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="basic-datatables" class="display table table-striped table-hover" >
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Pengusul</th>
                <th>Email Pengusul</th>
                <th>Data Usulan</th>
                <th>Info</th>
                <th>Keterangan</th>
                <th>Action</th>
              </tr>
            </thead>
            <!-- <tfoot>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
              </tr>
            </tfoot> -->
            <tbody>
            <?php $i=1; foreach($usulan as $usulan) { ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $usulan->nama_pengusul ?><br></td>
                <td><?php echo $usulan->email_pengusul ?></td>
                <td style="font-size:1.5em;"><b><?php echo $usulan->judul ?></b>
                  <small>
                    <br>Penulis  : <?php echo $usulan->penulis ?>
                    <br>Penerbit :  <?php echo $usulan->penerbit ?>
                    <br>Status   :  <?php echo $usulan->status_usulan ?>
                  </small>
                </td>
                <td>
                  <small>Tanggal Usulan  : <?php echo date('d-m-Y H:i:s',strtotime($usulan->tanggal_usulan)) ?>
                    <br>IP Address :  <?php echo $usulan->ip_add ?>
                  </small>
                </td>
                <td><?php echo $usulan->keterangan ?></td>
                <td>
                <a href="<?php echo base_url('admin/usulan/edit/'.$usulan->id_usulan) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                <?php
                  //Delete
                  include('delete.php')
                ?>
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
