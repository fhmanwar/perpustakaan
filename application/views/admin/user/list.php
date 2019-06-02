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
		<a href="#">User</a>
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

<p>
  <a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success">
    <i class="fa fa-plus"></i> 
    Tambah
  </a>
</p>

<?php
  //cetak notifikasi
  echo $this->session->flashdata('success');
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
                <th>Nama</th>
                <th>Email</th>
                <th>Username - Level</th>
                <th>status</th>
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
            <?php $i=1; foreach($user as $user) { ?>
              <tr>
                <td><?php echo $i ?></td>
                <td><?php echo $user->nama ?><br></td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->username ?> - <?php echo $user->level ?></td>
                <td><?php echo $user->status ?></td>
                <td>
                <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
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