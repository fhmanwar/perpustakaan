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
  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
  <tbody>
  <?php $i=1; foreach($usulan as $usulan) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $usulan->nama_pengusul ?><br><small><!--Site : <?php echo $usulan->namaweb ?>--></small></td>
          <td><?php echo $usulan->email_pengusul ?></td>
          <td><?php echo $usulan->judul ?>
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
