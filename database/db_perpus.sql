-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_perpus
CREATE DATABASE IF NOT EXISTS `db_perpus` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_perpus`;

-- Dumping structure for table db_perpus.anggota
CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `status_anggota` enum('Active','Non-Active','','') CHARACTER SET utf8 NOT NULL,
  `nama_anggota` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tlp` varchar(50) CHARACTER SET utf8 NOT NULL,
  `instansi` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_anggota`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.anggota: ~2 rows (approximately)
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `email`, `tlp`, `instansi`, `username`, `password`, `tanggal`) VALUES
	(2, 4, 'Active', 'picollococo', 'pico@gmas.com', '87897894654213', '   wakwaw ', 'pco', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-18 00:03:31'),
	(3, 4, 'Active', 'miasda', 'nmasd@gmail.com', '654564', 'uweeesss', 'mimi', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-18 00:07:30');
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;

-- Dumping structure for table db_perpus.bahasa
CREATE TABLE IF NOT EXISTS `bahasa` (
  `id_bahasa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_bahasa` varchar(3) CHARACTER SET utf8 NOT NULL,
  `nama_bahasa` varchar(50) CHARACTER SET utf8 NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_bahasa`),
  UNIQUE KEY `kode_bhs` (`kode_bahasa`),
  UNIQUE KEY `nama_bhs` (`nama_bahasa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.bahasa: ~1 rows (approximately)
/*!40000 ALTER TABLE `bahasa` DISABLE KEYS */;
INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
	(1, 'K01', 'Bahasa Kalbu', '  ', 1, '2019-03-23 01:44:01'),
	(3, 'asd', 'asdasd', 'safdfadf', 23, '2019-06-02 22:20:15');
/*!40000 ALTER TABLE `bahasa` ENABLE KEYS */;

-- Dumping structure for table db_perpus.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `slug_berita` varchar(255) CHARACTER SET utf8 NOT NULL,
  `judul_berita` varchar(255) CHARACTER SET utf8 NOT NULL,
  `isi` text CHARACTER SET utf8 NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status_berita` enum('Publish','Draft','','') CHARACTER SET utf8 NOT NULL,
  `jenis_berita` enum('Berita','Slide','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `judul_berita` (`judul_berita`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.berita: ~7 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
	(1, 4, 'iwak-e-nyebur-sumur-tandas', 'iwak e nyebur sumur tandas', '<p>asdasdasd asd</p>', 'kandang-ternak-kenari-siste5.jpg', 'Publish', 'Berita', '2019-03-25 20:24:14'),
	(4, 4, 'hard-work', 'Hard Work', '<p>Hard work is but one of the ways you can achieve your goals. For those of us who aren&rsquo;t inordinately&nbsp;<a href="https://www.primermagazine.com/2011/learn/the-only-4-reasons-why-your-peers-are-more-successful-than-you">wealthy, smart, or lucky</a>, it&rsquo;s the only way. While each person&rsquo;s path to success will be unique, the anatomy of the hard work that they do often looks very similar.</p>', 'b1.jpg', 'Publish', 'Slide', '2019-03-25 20:31:57'),
	(5, 4, 'study', 'Study', '<p><span class="ind">The devotion of time and attention to gaining knowledge of an academic subject, especially by means of books.</span></p>', 'b2.jpg', 'Publish', 'Slide', '2019-03-25 20:30:29'),
	(6, 4, 'class', 'Class', '<p>Learning is the process of acquiring new, or modifying existing, <span style="text-decoration: underline;"><a title="Knowledge" href="https://en.wikipedia.org/wiki/Knowledge">knowledge</a></span>, <span style="text-decoration: underline;"><a title="Behavior" href="https://en.wikipedia.org/wiki/Behavior">behaviors</a>, </span><a title="Skill" href="https://en.wikipedia.org/wiki/Skill">skills</a>, <a class="mw-redirect" title="Value (personal and cultural)" href="https://en.wikipedia.org/wiki/Value_(personal_and_cultural)">values</a>, or <a title="Preference" href="https://en.wikipedia.org/wiki/Preference">preferences</a>.<sup id="cite_ref-1" class="reference"></sup></p>', 'b3.jpg', 'Publish', 'Slide', '2019-03-25 20:34:21'),
	(7, 4, 'sayur-kol', 'Sayur Kol', '<p>Makan daging teman dengan sayur kol</p>', 'Sabyan_Gambus_Nissa_Sabyan_1548167665.jpeg', 'Publish', 'Berita', '2019-03-25 23:41:34'),
	(8, 1, 'wikawikwa', 'wikawikwa', 'safgaehg adfgadfg', 'macOS.jpg', 'Draft', 'Berita', '2019-06-02 22:41:00');
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table db_perpus.buku
CREATE TABLE IF NOT EXISTS `buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `subjek_buku` varchar(255) DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kolasi` int(11) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `no_seri` varchar(50) DEFAULT NULL,
  `status_buku` enum('Publish','Not_Publish','Missing','') DEFAULT NULL,
  `ringkasan` mediumtext,
  `cover_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.buku: ~8 rows (approximately)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `no_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `harga`, `tanggal_entri`, `tanggal`) VALUES
	(5, 0, 3, 1, 'Ilmu Pengetahuan Sosial', 'Nur Wahyu Rochmadi', 'Sekolah Menengah Kejuruan', 'IPSJD1', 11, 'Buku Sekolah Elektronik (BSE)', '2004', '123xr3', 'Publish', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\nA small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'ips.jpg', 20, 90000, '2019-03-22 20:14:19', '2019-07-04 20:36:36'),
	(6, 0, 3, 1, 'Dasar Kewirausahaan', 'Ir. Hendro', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212035154.jpg', 0, 50000, '2019-03-23 14:33:09', '2019-07-04 20:36:44'),
	(7, 0, 2, 1, 'PHP Modul', 'Teguh Wahyono', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212145310.jpg', 0, 198000, '2019-03-25 18:10:31', '2019-07-04 20:37:57'),
	(8, 0, 1, 1, 'Pengantar Teknologi Informasi', 'Eddy Sutanta', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209044244.jpg', 0, 100000, '2019-03-25 18:11:29', '2019-07-04 20:36:58'),
	(9, 0, 1, 1, 'Kamus Istilah Internet', 'wang cun', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212080423.jpg', 0, 145000, '2019-03-25 18:12:13', '2019-07-04 20:37:05'),
	(10, 0, 3, 1, 'Kamus Matematika', 'ario', '', '', 0, '', '0000', '', 'Publish', '  ', '20170207102926.jpg', 0, 110000, '2019-03-25 18:12:56', '2019-07-04 20:37:24'),
	(11, 0, 4, 1, 'E-Learning', 'mario', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209050821.jpg', 0, 125000, '2019-03-25 18:13:39', '2019-07-04 20:37:32'),
	(12, 0, 2, 1, 'Algoritma C++', 'niawarti', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209045014.jpg', 0, 150000, '2019-03-25 18:14:22', '2019-07-04 20:37:44');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;

-- Dumping structure for table db_perpus.file
CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_file`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.file: ~2 rows (approximately)
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` (`id_file`, `id_buku`, `id_user`, `judul_file`, `nama_file`, `keterangan`, `urutan`, `tanggal`) VALUES
	(34, 5, 4, 'bab 3', 'agilinilucu.docx', 'qweasd', 2, '2019-03-25 00:44:30'),
	(35, 5, 4, 'bab 1', 'Tata_Tertib_Kos_Ibu_Said.pdf', 'asdasd', 1, '2019-03-29 23:58:24');
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

-- Dumping structure for table db_perpus.jenis
CREATE TABLE IF NOT EXISTS `jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` mediumtext,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis`),
  UNIQUE KEY `kode_jenis` (`kode_jenis`),
  UNIQUE KEY `nama_jenis` (`nama_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.jenis: ~4 rows (approximately)
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
	(1, 'IT', 'Informatika ', NULL, NULL, '2019-07-04 19:59:35'),
	(2, 'Alg', 'Algoritma', NULL, NULL, '2019-07-04 20:00:11'),
	(3, 'I01', 'Ilmu sosial', '', 1, '2019-03-23 01:44:32'),
	(4, 'bio', 'buku biologi', '  buku ini tentang biologi dalam tumbuhan dan hewan\r\njika ada tambahan, kemungkinan tentang kamasutra', 2, '2019-03-20 00:46:05');
/*!40000 ALTER TABLE `jenis` ENABLE KEYS */;

-- Dumping structure for table db_perpus.konfigurasi
CREATE TABLE IF NOT EXISTS `konfigurasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.konfigurasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `konfigurasi` DISABLE KEYS */;
INSERT INTO `konfigurasi` (`id`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `phone`, `alamat`, `max_pinjam`, `max_jumlah`, `denda_perhari`, `tanggal`) VALUES
	(1, 0, 'Perpustakaan ', 'Dimana Anda dapat belajar dengan mudah', 'JSquad adalah perusahaan yang bergerak dibidang web dan aplikasi', 'education, top education, education in indonesia, world education, education and training, education system, education system in indonesia, top education countries, academic, academy asia, top academic journals, best academic colleges, best academic colleges in the world, top academic countries, top academic universities in the world, top academic universities, research, international research, research in indonesia, international research university, collaboration, international collaboration, ', 'jon@mail.net', 'https://github.com', 'banner.jpg', 'b2.jpg', NULL, '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.226032535767!2d110.40701211477327!3d-6.982631694955702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4ec52229d7%3A0xc791d6abc9236c7!2sUniversitas+Dian+Nuswantoro!5e0!3m2!1sid!2sid!4v1553968334242!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '', '+628123456789', '207 Imam Bonjol Street', 14, 5, 1000, '2019-06-02 00:24:05');
/*!40000 ALTER TABLE `konfigurasi` ENABLE KEYS */;

-- Dumping structure for table db_perpus.level
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(10) NOT NULL AUTO_INCREMENT,
  `kode_level` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_level`),
  UNIQUE KEY `kode_level` (`kode_level`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.level: ~4 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id_level`, `kode_level`, `level`, `timestamp`) VALUES
	(1, '1', 'Admin', '2019-05-30 02:57:53'),
	(2, '2', 'Anggota', '2019-05-30 15:35:48'),
	(3, '3', 'User', '2019-05-30 15:35:34');
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table db_perpus.link
CREATE TABLE IF NOT EXISTS `link` (
  `id_link` int(11) NOT NULL AUTO_INCREMENT,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.link: ~2 rows (approximately)
/*!40000 ALTER TABLE `link` DISABLE KEYS */;
INSERT INTO `link` (`id_link`, `nama_link`, `url`, `target`, `tanggal`) VALUES
	(1, 'java Web Media', 'http://localhost/perpustakaan', '_blank', '2019-04-01 18:20:46'),
	(2, 'github', 'https://github.com', '_self', '2019-06-02 13:20:51');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;

-- Dumping structure for table db_perpus.order
CREATE TABLE IF NOT EXISTS `order` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.order: ~0 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Dumping structure for table db_perpus.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text CHARACTER SET utf8,
  `status_kembali` enum('Belum','Sudah','Hilang','') CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.peminjaman: ~17 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
	(2, 7, 1, '2019-04-27', '2019-05-11', 'asdweqwe', 'Sudah', '2019-06-03 19:24:51'),
	(5, 7, 1, '2019-04-01', '2019-05-02', 'asdweqwe', 'Sudah', '2019-06-03 19:25:33'),
	(12, 9, 1, '2019-06-03', '2019-06-10', 'asdasd', 'Sudah', '2019-06-03 12:39:58'),
	(13, 11, 1, '2019-06-03', '2019-06-10', 'asdasd', 'Sudah', '2019-06-19 22:23:47'),
	(14, 9, 1, '2019-06-03', '2019-06-10', 'asdweqwe656546', 'Sudah', '2019-06-19 22:23:49'),
	(15, 10, 1, '2019-06-03', '2019-06-10', 'qweert3242134', 'Sudah', '2019-06-26 02:26:59'),
	(17, 9, 36, '2019-06-03', '2019-06-10', 'qweert3242134', 'Sudah', '2019-06-03 19:26:53'),
	(20, 10, 4, '2019-06-03', '2019-06-10', 'asdweqwe656546', 'Belum', '2019-06-03 16:28:22'),
	(21, 8, 4, '2019-06-03', '2019-06-10', 'qweert3242134', 'Sudah', '2019-06-26 02:27:14'),
	(22, 8, 1, '2019-06-29', '2019-06-28', 'asdasdasdasd', 'Belum', '2019-06-19 22:40:17'),
	(23, 10, 1, '2019-06-06', '2019-06-24', 'asdasd', 'Belum', '2019-06-19 22:40:41'),
	(25, 5, 40, '2019-06-26', '2019-06-14', NULL, 'Belum', '2019-06-26 08:30:46'),
	(26, 5, 40, '2019-06-21', '2019-06-16', NULL, 'Belum', '2019-06-26 08:49:02'),
	(27, 7, 40, '2019-06-12', '2019-06-29', NULL, 'Belum', '2019-06-28 09:35:15'),
	(28, 6, 40, '2019-07-02', '2019-07-16', NULL, 'Belum', '2019-07-02 01:51:00'),
	(29, 5, 42, '2019-07-02', '2019-07-12', NULL, 'Belum', '2019-07-02 02:01:23'),
	(30, 5, 52, '2019-07-02', '2019-07-19', NULL, 'Belum', '2019-07-02 02:15:14');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;

-- Dumping structure for table db_perpus.status
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `kode_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `kode_status` (`kode_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id_status`, `kode_status`, `status`, `timestamp`) VALUES
	(1, 1, 'Actived', '2019-06-02 18:52:00'),
	(2, 2, 'Non_Actived', '2019-06-03 03:56:43'),
	(3, 3, 'Banned', '2019-06-19 22:44:39');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table db_perpus.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `token` varchar(256) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `j_kel` enum('Pria','Wanita') DEFAULT NULL,
  `tlp` varchar(14) DEFAULT NULL,
  `alamat` longtext,
  `avatar` varchar(255) DEFAULT NULL,
  `verify` int(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.user: ~6 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_level`, `id_status`, `username`, `password`, `token`, `nama`, `email`, `j_kel`, `tlp`, `alamat`, `avatar`, `verify`, `tanggal`) VALUES
	(1, 1, 1, 'admin', '$argon2id$v=19$m=1024,t=2,p=2$RUgzUXJzcUFwRk5hWmVZdg$sG0ZtGcvH3pLX7BQWtxj8lFlGdAvatJ15rYdfijBoxs', '5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA', 'Admin', 'admin@admin.com', NULL, NULL, NULL, 'default.png', 123123, '2019-06-01 12:46:39'),
	(36, 2, 2, 'jango', '$argon2id$v=19$m=1024,t=2,p=2$MkZQZjl3dHNiTWdHdU8wSA$dk7BBC/BhfY8shfJN3Z7m03+3N59KXK7xJIC+WOGNM4', 'WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3', 'De Jango', 'jonbray@mail.net', NULL, NULL, NULL, 'default.jpg', 123123, '2019-06-02 19:59:22'),
	(38, 1, 1, '2', '$argon2id$v=19$m=1024,t=2,p=2$dWJXRGxZUjNUOGZQck1TNg$ccQsqTQ+VGvz+3u4OyR7eyrftZroLZJ2R+8rRcpx/lY', 'favRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjNfavRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjNfavRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjNfavRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjN', 'wik weka', 'mike@example.net', NULL, NULL, NULL, 'default.jpg', 123123, '2019-06-02 19:36:57'),
	(40, 2, 1, '123', '$argon2id$v=19$m=1024,t=2,p=2$RUgzUXJzcUFwRk5hWmVZdg$sG0ZtGcvH3pLX7BQWtxj8lFlGdAvatJ15rYdfijBoxs', '4ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C94ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C94ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C94ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C9', 'Super Admin', 'wacacuseva@hotelnextmail.net', NULL, NULL, NULL, 'default.jpg', 123123, '2019-06-19 15:45:40'),
	(41, 2, 1, 'asdasd', '$argon2id$v=19$m=1024,t=2,p=2$QUc5dThWdEJmMFExdE1yYg$Qg5Eyr9eINXkRN1i2onRvRhL8vlvt0zK1Wv0iOuoJH4', '9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A', 'asdasd', 'asd@asd.ner', NULL, NULL, NULL, 'default.jpg', 123123, '2019-06-19 15:45:08'),
	(42, 2, 1, 'zxcasd', '$argon2id$v=19$m=1024,t=2,p=2$ZnRFbTQ0QnRHNGFrY3A4Wg$BYlaaD9oMPCbmHGyWdmr4ugiw3aiZ8mVVrDSo4vtNvI', 'CbDAnvTeno1sliwg6WIKrB0Q+2MoK4RgG3AA9e2wwG24Mp3MohyG6u7KTbUCWV/qzrOf/nmzuAZ/3STCMCMyo3UHpmK6fT8apSTUfw3tsqy7IkX1jpGg+jhksaM7D4lCoy3ebtdt2Kg1LACikiy4Ldjbn5GRgJ05TF7D3XYuujNcARBODqHPg6wCSP3u7GpU4dwUJL5YEktcCSDgTtoqsv1ho7N2NxTMYkudVul2C0CgW5TEYvedUKKZ6qVyCg==', 'wik wik', 'greenmr@hi2.in', NULL, NULL, NULL, 'default.jpg', 1562002111, '2019-07-02 00:39:23'),
	(52, 2, 1, 'qwe', '$argon2id$v=19$m=1024,t=2,p=2$Ry9KRjFHVU1rVnRsQ3RGYg$vvdGjJOMVX6cPyYc/1kEnVsSdLYbCNx7uTa2/1NptyY', 'Yy+2b2vs444yjeSGRyK7x+mzwm8Crw+HSZVqeF+l9sJxyMQuIeXNeJiDX8/bY1d7NcXFEdGQtSVremRIf9fmVxJ6o9xDl3TjikJuEl823lgUooZgwdy92Nw9HXkyTM9LHavNIJnhkKYHERGw7oB2d7AnZAVVCyGPLEbq51TbGVyBFnYMgkklcxAydi0TGUsOUYxG4qRT/XuoE7dnVICEjBP+7omZfq4ZTlVknDJxBXZAqXdwA5qTbwOLUxhARQ==', 'wik weka', 'testingemailmahasiswa@gmail.com', NULL, NULL, NULL, 'default.jpg', 1562008477, '2019-07-02 02:14:48');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table db_perpus.usulan
CREATE TABLE IF NOT EXISTS `usulan` (
  `id_usulan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `keterangan` text,
  `nama_pengusul` varchar(255) NOT NULL,
  `email_pengusul` varchar(255) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `status_usulan` varchar(20) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usulan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.usulan: ~3 rows (approximately)
/*!40000 ALTER TABLE `usulan` DISABLE KEYS */;
INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_add`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
	(1, 'asdasdasdqweqwe', 'asdasdasd', 'asdasdadw', '    ', 'asdasdd', 'asdasd@afasd.etr', '::1', 'Diterima', '2019-03-30 15:37:28', '2019-03-30 23:03:08'),
	(2, 'Cerita tentang Midun', 'Marah Rusli', 'PT Andi Offset', NULL, 'Andoyo', 'wikwik@gmail.net', '::1', 'Baru', '2019-03-30 15:42:04', '2019-03-30 21:42:04'),
	(3, 'Dragon Ball Mencari mangsa', 'Andomir', 'Gramedia', 'Dragon Ball Jalan Jalan  ', 'rayyanwe', 'rayanwe@asd.net', '::1', 'Baru', '2019-03-30 17:04:15', '2019-03-30 23:04:15');
/*!40000 ALTER TABLE `usulan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
