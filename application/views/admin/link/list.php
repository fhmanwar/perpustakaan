<?php include('tambah.php'); ?>

<br>

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
          <th>URL</th>
          <th>Target</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($link as $link) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $link->nama_link ?></td>
          <td><?php echo $link->url ?></td>
          <td><?php echo $link->target ?></td>
          <td>
          <a href="<?php echo base_url('admin/link/edit/'.$link->id_link) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <?php
            //Delete
            include('delete.php')
          ?>
          </td>
      </tr>
  <?php $i++; } ?>
  </tbody>
  </table>
