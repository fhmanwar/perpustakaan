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
		<li class="separator">
		<i class="flaticon-right-arrow"></i>
	</li>
	<li class="nav-item">
		<a href="#">Link</a>
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
include('tambah.php');

//cetak notifikasi
echo $this->session->flashdata('pesan');
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
                  <th>Name</th>
                  <th>URL</th>
                  <th>Target</th>
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
              <?php $i=1; foreach($link as $link) { ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $link->nama_link ?></td>
                    <td><?php echo $link->url ?></td>
                    <td><?php echo $link->target ?></td>
                    <td>
                    <a href="<?php echo base_url('admin/link/edit/'.$link->id_link) ?>" class="btn btn-warning btn-xs"><i class="fas fa-edit"></i></a>
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
            