<?php if($this->uri->segment(3) == "") {?>
<p><a href="<?php echo base_url('admin/peminjaman/tambah') ?>" class="btn btn-success">
  <i class="fa fa-plus"></i> Tambah</a></p>

  <?php
}
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
          <th>Nama Anggota </th>
          <th>Kode - Judul Buku</th>
          <th>Tgl Pinjam</th>
          <th>Tgl Harus Kembali</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($peminjaman as $peminjaman) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td><?php echo $peminjaman->nama_nama_anggota ?></td>
          <td><?php echo $peminjaman->kode_buku ?> - <?php echo $peminjaman->judul_buku ?></td>
          <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_pinjam)) ?></td>
          <td><?php echo date('d-m-Y', strtotime($peminjaman->tanggal_kembali)) ?></td>
          <td><?php echo $peminjaman->instansi ?></td>
          <td>
          <a href="<?php echo base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
          <?php
            //Delete
            include('delete.php')
          ?>
          </td>
      </tr>
  <?php $i++; } ?>
  </tbody>
  </table>
