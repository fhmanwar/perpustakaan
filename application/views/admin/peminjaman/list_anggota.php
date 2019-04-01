<p class="alert alert-success">
  <i class="fa fa-warning"></i>
  Cari nama anggota di kolom <strong>Search</strong>, kemudian klik tombol <strong><i class="fa fa-plus"></i> Peminjaman Buku</strong>
</p>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama</th>
        <th>Email - Phone</th>
        <th>Username - Status</th>
        <th>instansi</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
<?php $i=1; foreach($anggota as $anggota) { ?>
    <tr class="odd gradeX">
        <td><?php echo $i ?></td>
        <td><?php echo $anggota->nama_anggota ?></td>
        <td><?php echo $anggota->email ?><br><i class="fa fa-phone"></i><?php echo $anggota->tlp ?></td>
        <td><?php echo $anggota->username ?> - <?php echo $anggota->status_anggota ?></td>
        <td><?php echo $anggota->instansi ?></td>
        <td>
        <a href="<?php echo base_url('admin/peminjaman/add/'.$anggota->id_anggota) ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Peminjaman Buku</a>
        <?php
          //Delete
          // include('delete.php')
        ?>
        </td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>
