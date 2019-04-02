-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 02 Apr 2019 pada 16.24
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_anggota` enum('Active','Non-Active','','') CHARACTER SET utf8 NOT NULL,
  `nama_anggota` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tlp` varchar(50) CHARACTER SET utf8 NOT NULL,
  `instansi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `email`, `tlp`, `instansi`, `username`, `password`, `tanggal`) VALUES
(2, 4, 'Active', 'picollococo', 'pico@gmas.com', '87897894654213', '   wakwaw ', 'pco', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-17 17:03:31'),
(3, 4, 'Active', 'miasda', 'nmasd@gmail.com', '654564', 'uweeesss', 'mimi', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-17 17:07:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `kode_bahasa` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nama_bahasa` varchar(50) CHARACTER SET utf8 NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'K01', 'Bahasa Kalbu', '  ', 1, '2019-03-22 18:44:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_berita` varchar(255) CHARACTER SET utf8 NOT NULL,
  `judul_berita` varchar(255) CHARACTER SET utf8 NOT NULL,
  `isi` text CHARACTER SET utf8 NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status_berita` enum('Publish','Draft','','') CHARACTER SET utf8 NOT NULL,
  `jenis_berita` enum('Berita','Slide','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
(1, 4, 'iwak-e-nyebur-sumur-tandas', 'iwak e nyebur sumur tandas', '<p>asdasdasd asd</p>', 'kandang-ternak-kenari-siste5.jpg', 'Publish', 'Berita', '2019-03-25 13:24:14'),
(4, 4, 'hard-work', 'Hard Work', '<p>Hard work is but one of the ways you can achieve your goals. For those of us who aren&rsquo;t inordinately&nbsp;<a href=\"https://www.primermagazine.com/2011/learn/the-only-4-reasons-why-your-peers-are-more-successful-than-you\">wealthy, smart, or lucky</a>, it&rsquo;s the only way. While each person&rsquo;s path to success will be unique, the anatomy of the hard work that they do often looks very similar.</p>', 'b1.jpg', 'Publish', 'Slide', '2019-03-25 13:31:57'),
(5, 4, 'study', 'Study', '<p><span class=\"ind\">The devotion of time and attention to gaining knowledge of an academic subject, especially by means of books.</span></p>', 'b2.jpg', 'Publish', 'Slide', '2019-03-25 13:30:29'),
(6, 4, 'class', 'Class', '<p>Learning is the process of acquiring new, or modifying existing, <span style=\"text-decoration: underline;\"><a title=\"Knowledge\" href=\"https://en.wikipedia.org/wiki/Knowledge\">knowledge</a></span>, <span style=\"text-decoration: underline;\"><a title=\"Behavior\" href=\"https://en.wikipedia.org/wiki/Behavior\">behaviors</a>, </span><a title=\"Skill\" href=\"https://en.wikipedia.org/wiki/Skill\">skills</a>, <a class=\"mw-redirect\" title=\"Value (personal and cultural)\" href=\"https://en.wikipedia.org/wiki/Value_(personal_and_cultural)\">values</a>, or <a title=\"Preference\" href=\"https://en.wikipedia.org/wiki/Preference\">preferences</a>.<sup id=\"cite_ref-1\" class=\"reference\"></sup></p>', 'b3.jpg', 'Publish', 'Slide', '2019-03-25 13:34:21'),
(7, 4, 'sayur-kol', 'Sayur Kol', '<p>Makan daging teman dengan sayur kol</p>', 'Sabyan_Gambus_Nissa_Sabyan_1548167665.jpeg', 'Publish', 'Berita', '2019-03-25 16:41:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `subjek_buku` varchar(255) DEFAULT NULL,
  `letak_buku` varchar(50) DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kolasi` int(11) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `no_seri` varchar(50) DEFAULT NULL,
  `status_buku` enum('Publish','Not_Publish','Missing','') DEFAULT NULL,
  `ringkasan` mediumtext,
  `cover_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `no_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
(5, 4, 3, 1, 'Ilmu Pengetahuan Sosial', 'Nur Wahyu Rochmadi', 'Sekolah Menengah Kejuruan', '', 'IPSJD1', 11, 'Buku Sekolah Elektronik (BSE)', 2004, '123xr3', 'Publish', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\nA small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'ips.jpg', 20, '2019-03-22 20:14:19', '2019-03-28 08:58:55'),
(6, 4, 3, 1, 'Dasar Kewirausahaan', 'Ir. Hendro', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170212035154.jpg', 0, '2019-03-23 14:33:09', '2019-03-23 13:33:09'),
(7, 4, 3, 1, 'PHP Modul', 'Teguh Wahyono', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170212145310.jpg', 0, '2019-03-25 18:10:31', '2019-03-25 17:10:31'),
(8, 4, 3, 1, 'Pengantar Teknologi Informasi', 'Eddy Sutanta', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170209044244.jpg', 0, '2019-03-25 18:11:29', '2019-03-25 17:11:29'),
(9, 4, 3, 1, 'Kamus Istilah Internet', 'wang cun', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170212080423.jpg', 0, '2019-03-25 18:12:13', '2019-03-25 17:12:13'),
(10, 4, 3, 1, 'Kamus Matematika', 'ario', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170207102926.jpg', 0, '2019-03-25 18:12:56', '2019-03-25 17:12:56'),
(11, 4, 3, 1, 'E-Learning', 'mario', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170209050821.jpg', 0, '2019-03-25 18:13:39', '2019-03-25 17:13:39'),
(12, 4, 3, 1, 'Algoritma C++', 'niawarti', '', '', '', 0, '', 0000, '', 'Publish', '  ', '20170209045014.jpg', 0, '2019-03-25 18:14:22', '2019-03-25 17:14:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`id_file`, `id_buku`, `id_user`, `judul_file`, `nama_file`, `keterangan`, `urutan`, `tanggal`) VALUES
(34, 5, 4, 'bab 3', 'agilinilucu.docx', 'qweasd', 2, '2019-03-24 17:44:30'),
(35, 5, 4, 'bab 1', 'Tata_Tertib_Kos_Ibu_Said.pdf', 'asdasd', 1, '2019-03-29 16:58:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` mediumtext,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
(3, 'I01', 'Ilmu sosial', '', 1, '2019-03-22 18:44:32'),
(4, 'bio', 'buku biologi', '  buku ini tentang biologi dalam tumbuhan dan hewan\r\njika ada tambahan, kemungkinan tentang kamasutra', 2, '2019-03-19 17:46:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `map` text,
  `metatext` text,
  `phone` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `max_pinjam` int(11) DEFAULT NULL,
  `max_jumlah` int(11) DEFAULT NULL,
  `denda_perhari` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `phone`, `alamat`, `max_pinjam`, `max_jumlah`, `denda_perhari`, `tanggal`) VALUES
(1, 4, 'Perpustakaan ', 'Dimana Anda dapat belajar dengan mudah', 'JSquad adalah perusahaan yang bergerak dibidang web dan aplikasi', 'education, top education, education in indonesia, world education, education and training, education system, education system in indonesia, top education countries, academic, academy asia, top academic journals, best academic colleges, best academic colleges in the world, top academic countries, top academic universities in the world, top academic universities, research, international research, research in indonesia, international research university, collaboration, international collaboration, ', 'jon@mail.net', 'https://github.com', 'banner.jpg', 'b2.jpg', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.226032535767!2d110.40701211477327!3d-6.982631694955702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4ec52229d7%3A0xc791d6abc9236c7!2sUniversitas+Dian+Nuswantoro!5e0!3m2!1sid!2sid!4v1553968334242!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '', '+628123456789', '207 Imam Bonjol Street', 14, 5, 1000, '2019-04-01 00:32:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url`, `target`, `tanggal`) VALUES
(1, 'java Web Media', 'http://localhost/perpustakaan', '_blank', '2019-04-01 11:20:46'),
(2, 'github', 'https://github.com', '_self', '2019-04-01 11:20:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text CHARACTER SET utf8 NOT NULL,
  `status_kembali` enum('Belum','Sudah','Hilang','') CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
(2, 7, 2, 4, '2019-04-27', '2019-05-11', 'asdweqwe', 'Belum', '2019-04-01 11:23:58'),
(5, 7, 4, 4, '2019-04-01', '2019-05-02', 'asdweqwe', 'Belum', '2019-04-01 12:45:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` mediumtext,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(4, 'fahmi', 'fafa@gmail.com', 'fhmanwar', 'd164b39e9ec43f65376629da9ccf41780775f656', 'Admin', NULL, '          asdasdasd        ', '2019-03-17 15:05:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `keterangan` text,
  `nama_pengusul` varchar(255) NOT NULL,
  `email_pengusul` varchar(255) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `status_usulan` varchar(20) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_add`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
(1, 'asdasdasdqweqwe', 'asdasdasd', 'asdasdadw', '    ', 'asdasdd', 'asdasd@afasd.etr', '::1', 'Diterima', '2019-03-30 15:37:28', '2019-03-30 16:03:08'),
(2, 'Cerita tentang Midun', 'Marah Rusli', 'PT Andi Offset', NULL, 'Andoyo', 'wikwik@gmail.net', '::1', 'Baru', '2019-03-30 15:42:04', '2019-03-30 14:42:04'),
(3, 'Dragon Ball Mencari mangsa', 'Andomir', 'Gramedia', 'Dragon Ball Jalan Jalan  ', 'rayyanwe', 'rayanwe@asd.net', '::1', 'Baru', '2019-03-30 17:04:15', '2019-03-30 16:04:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD UNIQUE KEY `kode_bhs` (`kode_bahasa`),
  ADD UNIQUE KEY `nama_bhs` (`nama_bahasa`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `judul_berita` (`judul_berita`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`),
  ADD UNIQUE KEY `nama_jenis` (`nama_jenis`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
