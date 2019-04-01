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
          <th>Judul Buku - Kode</th>
          <th>Tgl Pinjam</th>
          <th>Tgl Harus Kembali</th>
          <th>Status Kembali</th>
          <th>Action</th>
      </tr>
  </thead>
  <tbody>
  <?php $i=1; foreach($peminjaman as $peminjaman) { ?>
      <tr class="odd gradeX">
          <td><?php echo $i ?></td>
          <td>
            <a href="<?php echo base_url('admin/peminjaman/add/'.$peminjaman->id_anggota) ?>">
              <?php echo $peminjaman->nama_anggota ?> <sup><i class="fa fa-link"></i> </sup>
            </a>
          </td>
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
