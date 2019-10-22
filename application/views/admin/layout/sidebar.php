<!-- Sidebar -->
<div class="sidebar">

  <div class="sidebar-background"></div>
  <div class="sidebar-wrapper scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="<?php echo base_url('assets/upload/profile/').$data['user']['avatar'] ?>" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
            <?php echo $data['user']['nama']; ?>
              <span class="user-level"><?php echo $data['user']['email']; ?></span>
              <span class="caret"></span>
            </span>
          </a>
          <div class="clearfix"></div>

          <div class="collapse in" id="collapseExample">
            <ul class="nav">
              <li><a href="<?php echo base_url('admin/dasbor/profile') ?>"><span class="link-collapse">My Profile</span></a></li>
              <li><a href="<?php echo base_url('admin/dasbor/setting') ?>"><span class="link-collapse">setting</span></a></li>
              <li><a href="<?php echo base_url('admin/dasbor/setting') ?>"><span class="link-collapse">Balance</span></a></li>
              <li><a href="<?php echo base_url('admin/dasbor/setting') ?>"><span class="link-collapse">Inbox</span></a></li>
            </ul>
          </div>
        </div>
      </div>

      <ul class="nav">
        <li class="nav-item active">
          <a href="<?php echo base_url('admin/dasbor') ?>">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
            <!-- <span class="badge badge-count">5</span> -->
          </a>
        </li>

        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section">Components</h4>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#config">
            <i class="fas fa-layer-group"></i>
            <p>Menu Konfigurasi</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="config">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo base_url('admin/konfigurasi') ?>">
                  <span class="sub-item">Konfigurasi Umum</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/konfigurasi/logo') ?>">
                  <span class="sub-item">Konfigurasi Logo</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/konfigurasi/icon') ?>">
                  <span class="sub-item">Konfigurasi Icon</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/link') ?>">
                  <span class="sub-item">Konfigurasi Link</span>
                </a>
              </li>

            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#user">
            <i class="fas fa-users-cog"></i>
            <p>Users</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="user">
            <ul class="nav nav-collapse">
              <li>
                <a href="<?php echo base_url('admin/user') ?>">
                  <span class="sub-item">Data User</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/level') ?>">
                  <span class="sub-item">Data Level</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/status') ?>">
                  <span class="sub-item">Data Status</span>
                </a>
              </li>
              <li>
                <a href="<?php echo base_url('admin/anggota') ?>">
                  <span class="sub-item">Data Anggota</span>
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#tag">
            <i class="fas fa-tags"></i>
            <p>Reservasi</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="tag">
            <ul class="nav nav-collapse">
              <li>
                <a data-toggle="collapse" href="#subnav1"><span class="sub-item">Peminjaman Buku</span><span class="caret"></span></a>
                <div class="collapse" id="subnav1">
                  <ul class="nav nav-collapse subnav">
                    <li><a href="<?php echo base_url('admin/peminjaman') ?>"><span class="sub-item">Data Peminjaman</span></a></li>
                    <li><a href="<?php echo base_url('admin/peminjaman/dataPeminjam') ?>"><span class="sub-item">Anggota Peminjam</span></a></li>
                  </ul>
                </div>
              </li>

              <li><a href="<?php echo base_url('admin/usulan') ?>"><span class="sub-item">Usulan Buku</span></a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#buku">
            <i class="fas fa-book"></i>
            <p>Katalog Buku</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="buku">
            <ul class="nav nav-collapse">
              <li><a href="<?php echo base_url('admin/buku') ?>"><span class="sub-item">Katalog Buku</span></a></li>
              <li><a href="<?php echo base_url('admin/file') ?>"><span class="sub-item">File Buku (E-book)</span></a></li>
              <li><a href="<?php echo base_url('admin/jenis') ?>"><span class="sub-item">Jenis Buku</span></a></li>
              <li><a href="<?php echo base_url('admin/bahasa') ?>"><span class="sub-item">Bahasa Buku</span></a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a data-toggle="collapse" href="#news">
            <i class="fas fa-newspaper"></i>
            <p>Berita</p>
            <span class="caret"></span>
          </a>
          <div class="collapse" id="news">
            <ul class="nav nav-collapse">
              <li><a href="<?php echo base_url('admin/berita') ?>"><span class="sub-item">Data Berita</span></a></li>
              <li><a href="<?php echo base_url('admin/berita/tambah') ?>"><span class="sub-item">Tambah Berita</span></a></li>
            </ul>
          </div>
        </li>
        
      </ul>
    </div>
  </div>
</div>
<!-- End Sidebar -->


<div class="main-panel">
  <div class="content">
    <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title"><?php echo $title?></h4>