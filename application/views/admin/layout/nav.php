<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
<ul class="nav" id="main-menu">


<li>
<a  href="<?php echo base_url('admin/dashboard') ?>"><i class="fa fa-dashboard "></i> Dashboard</a>
</li>

<!-- Menu Anggota  -->
<li>
<a href="#"><i class="fa fa-group "></i> Anggota Perpustakaan<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/anggota') ?>">Data Anggota</a></li>
  <li><a href="<?php echo base_url('admin/anggota/tambah') ?>">Tambah Anggota</a></li>
</ul>
</li>

<!-- Menu Berita  -->
<li>
<a href="#"><i class="fa fa-newspaper-o "></i> Berita<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/berita') ?>">Data Berita</a></li>
  <li><a href="<?php echo base_url('admin/berita/tambah') ?>">Tambah Berita</a></li>
</ul>
</li>

<!-- Menu Buku  -->
<li>
<a href="#"><i class="fa fa-book "></i>Katalog Buku <span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/buku') ?>">Data Buku</a></li>
  <li><a href="<?php echo base_url('admin/buku/tambah') ?>">Tambah buku</a></li>
  <li><a href="<?php echo base_url('admin/file') ?>">Kelola File Buku (E-book)</a></li>
</ul>
</li>

<!-- Tabel usulan  -->
<li>
<a href="#"><i class="fa fa-upload "></i>  Usulan Buku<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/usulan') ?>">Data Usulan Buku</a></li>
  <li><a href="<?php echo base_url('admin/usulan/tambah') ?>">Tambah Usulan Buku</a></li>
</ul>
</li>

<!-- Tabel Referensi  -->
<li>
<a href="#"><i class="fa fa-tags "></i> Tabel Referensi<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/jenis') ?>">Data Jenis Buku</a></li>
  <li><a href="<?php echo base_url('admin/bahasa') ?>">Data Bahasa Buku</a></li>
</ul>
</li>

<!-- Menu User  -->
<li>
<a href="#"><i class="fa fa-user "></i> User/Admin<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/user') ?>">Data User</a></li>
  <li><a href="<?php echo base_url('admin/user/tambah') ?>">Tambah User</a></li>
</ul>
</li>

<!-- Menu Konfigurasi  -->
<li>
<a href="#"><i class="fa fa-wrench "></i> Konfigurasi Website<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
  <li><a href="<?php echo base_url('admin/konfigurasi') ?>">Konfigurasi Umum</a></li>
  <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>">Konfigurasi Logo</a></li>
  <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>">Konfigurasi Icon</a></li>
</ul>
</li>
</ul>

</div>

</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
<div class="row">
<div class="col-md-12">
<h2><?php echo $title ?></h2>

</div>
</div>
<!-- /. ROW  -->
<hr />

<div class="row">
<div class="col-md-12">
<!-- Advanced Tables -->
<div class="panel panel-default">
<div class="panel-heading">
   <?php echo $title ?>
</div>
<div class="panel-body">
  <div class="table-responsive">
