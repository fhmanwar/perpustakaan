<p><a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah</a></p>

  <?php
    //cetak notifikasi
    if($this->session->flashdata('success')){
      echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
      echo $this->session->flashdata('success');
      echo '</div>';
    }
  ?>
  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
  <thead>
      <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Email</th>
          <th>Username - Level</th>
          <th>Keterangan</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($user as $user) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $user->nama ?><br><small><!--Site : <?php echo $user->namaweb ?>--></small></td>
          <td><?php echo $user->email ?></td>
          <td><?php echo $user->username ?> - <?php echo $user->level ?></td>
          <td><?php echo $user->keterangan ?></td>
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
