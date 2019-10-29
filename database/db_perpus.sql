-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
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

-- Dumping data for table db_perpus.bahasa: ~2 rows (approximately)
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

-- Dumping data for table db_perpus.berita: ~6 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.buku: ~9 rows (approximately)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `no_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `harga`, `tanggal_entri`, `tanggal`) VALUES
	(5, 1, 3, 1, 'Ilmu Pengetahuan Sosial', 'Nur Wahyu Rochmadi', 'PT Yudistira', 'IPSJD1', 11, 'Buku Sekolah Elektronik (BSE)', '2004', '123xr3', 'Publish', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\nA small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'ips.jpg', 20, 85000, '2019-03-22 20:14:19', '2019-07-06 11:08:12'),
	(6, 0, 3, 1, 'Dasar Kewirausahaan', 'Ir. Hendro', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212035154.jpg', 23, 50000, '2019-03-23 14:33:09', '2019-07-06 18:18:19'),
	(7, 0, 2, 1, 'PHP Modul', 'Teguh Wahyono', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212145310.jpg', 43, 198000, '2019-03-25 18:10:31', '2019-07-06 18:18:21'),
	(8, 0, 1, 1, 'Pengantar Teknologi Informasi', 'Eddy Sutanta', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209044244.jpg', 132, 100000, '2019-03-25 18:11:29', '2019-07-06 18:18:24'),
	(9, 0, 1, 1, 'Kamus Istilah Internet', 'wang cun', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212080423.jpg', 34, 145000, '2019-03-25 18:12:13', '2019-07-06 18:18:26'),
	(10, 0, 3, 1, 'Kamus Matematika', 'ario', '', '', 0, '', '0000', '', 'Publish', '  ', '20170207102926.jpg', 34, 110000, '2019-03-25 18:12:56', '2019-07-06 18:18:27'),
	(11, 0, 4, 1, 'E-Learning', 'mario', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209050821.jpg', 45, 125000, '2019-03-25 18:13:39', '2019-07-06 18:18:29'),
	(12, 0, 2, 1, 'Algoritma C++', 'niawarti', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209045014.jpg', 56, 150000, '2019-03-25 18:14:22', '2019-07-06 18:18:31'),
	(13, 1, 3, 1, 'Hayuukk', 'Satria', NULL, '09asoy', 5, 'PT Andi Offset', '2002', '123321123', 'Publish', 'Yahuuuddd', 'macOS.jpg', 34, 30000000, '2019-07-06 02:56:17', '2019-07-06 11:14:25');
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

-- Dumping data for table db_perpus.level: ~3 rows (approximately)
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
  `subtotal` int(20) DEFAULT NULL,
  `tot_hrg` int(20) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.order: ~2 rows (approximately)
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id_order`, `id_buku`, `id_user`, `qty`, `subtotal`, `tot_hrg`, `keterangan`, `tanggal`) VALUES
	(8, 12, 40, 1, 150000, NULL, NULL, '2019-07-06 15:22:31'),
	(9, 13, 57, 2, 60000000, NULL, NULL, '2019-07-06 19:14:56');
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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.peminjaman: ~16 rows (approximately)
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
	(29, 5, 42, '2019-07-02', '2019-07-12', NULL, 'Belum', '2019-07-02 02:01:23'),
	(30, 5, 52, '2019-07-02', '2019-07-19', NULL, 'Belum', '2019-07-02 02:15:14'),
	(31, 6, 54, '2019-07-05', '2019-07-09', NULL, 'Belum', '2019-07-05 20:52:08'),
	(32, 9, 40, '2019-07-06', '2019-07-08', NULL, 'Belum', '2019-07-06 02:26:05'),
	(33, 13, 54, '2019-07-06', '2019-07-13', NULL, 'Belum', '2019-07-06 12:57:37'),
	(34, 6, 64, '2019-10-17', '2019-10-23', '', 'Belum', '2019-10-17 01:57:09'),
	(35, 12, 64, '2019-10-17', '2019-10-26', '', 'Belum', '2019-10-17 01:57:19');
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

-- Dumping data for table db_perpus.status: ~3 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.user: ~106 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_level`, `id_status`, `username`, `password`, `token`, `nama`, `email`, `j_kel`, `tlp`, `alamat`, `avatar`, `verify`, `tanggal`) VALUES
	(1, 1, 1, 'admin', '$argon2id$v=19$m=1024,t=2,p=2$RUgzUXJzcUFwRk5hWmVZdg$sG0ZtGcvH3pLX7BQWtxj8lFlGdAvatJ15rYdfijBoxs', '5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA5E6PIgBkcSJQqOZ8yGLpTfhUlb-uvFormN0nDtYX1_wC2i7s4xVR3KWeM9jHzadA', 'Admin', 'admin@admin.com', NULL, NULL, 'Semarang Barat', 'default.png', 123123, '2019-10-16 20:51:20'),
	(36, 2, 1, 'jango', '$argon2id$v=19$m=1024,t=2,p=2$MkZQZjl3dHNiTWdHdU8wSA$dk7BBC/BhfY8shfJN3Z7m03+3N59KXK7xJIC+WOGNM4', 'WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3WUKoeVxCZFJH0mL8yQtRApaTEMX6guj9qc2ld5k_-I4shBOv7fYD1nSNrzbGiPw3', 'De Jango', 'jonbray@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 123123, '2019-10-17 01:49:46'),
	(38, 1, 1, '2', '$argon2id$v=19$m=1024,t=2,p=2$dWJXRGxZUjNUOGZQck1TNg$ccQsqTQ+VGvz+3u4OyR7eyrftZroLZJ2R+8rRcpx/lY', 'favRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjNfavRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjNfavRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjNfavRbIixW0o2qYpuGnK8h5OeFlrt7AdBS6_19JLVTEU3-msMwkzyZQcPCXD4gHjN', 'wik weka', 'mike@example.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 123123, '2019-10-16 20:51:24'),
	(40, 2, 1, '123', '$argon2id$v=19$m=1024,t=2,p=2$RUgzUXJzcUFwRk5hWmVZdg$sG0ZtGcvH3pLX7BQWtxj8lFlGdAvatJ15rYdfijBoxs', '4ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C94ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C94ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C94ELhfQMi-BFdDcN1TSGvolxymA0UXeIOJ_P6WjZnp8us3kYHg75VqRbtaKrwz2C9', '123', 'wacacuseva@hotelnextmail.net', NULL, NULL, 'Tembalang', 'default.jpg', 123123, '2019-10-16 22:07:13'),
	(41, 2, 1, 'asdasd', '$argon2id$v=19$m=1024,t=2,p=2$QUc5dThWdEJmMFExdE1yYg$Qg5Eyr9eINXkRN1i2onRvRhL8vlvt0zK1Wv0iOuoJH4', '9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A', 'asdasd', 'asd@asd.ner', NULL, NULL, 'Semarang Barat', 'default.jpg', 123123, '2019-10-16 20:51:26'),
	(42, 2, 1, 'zxcasd', '$argon2id$v=19$m=1024,t=2,p=2$ZnRFbTQ0QnRHNGFrY3A4Wg$BYlaaD9oMPCbmHGyWdmr4ugiw3aiZ8mVVrDSo4vtNvI', 'CbDAnvTeno1sliwg6WIKrB0Q+2MoK4RgG3AA9e2wwG24Mp3MohyG6u7KTbUCWV/qzrOf/nmzuAZ/3STCMCMyo3UHpmK6fT8apSTUfw3tsqy7IkX1jpGg+jhksaM7D4lCoy3ebtdt2Kg1LACikiy4Ldjbn5GRgJ05TF7D3XYuujNcARBODqHPg6wCSP3u7GpU4dwUJL5YEktcCSDgTtoqsv1ho7N2NxTMYkudVul2C0CgW5TEYvedUKKZ6qVyCg==', 'wik wik', 'greenmr@hi2.in', NULL, NULL, 'Pedurungan', 'default.jpg', 1562002111, '2019-10-17 01:50:08'),
	(52, 2, 1, 'qwe', '$argon2id$v=19$m=1024,t=2,p=2$Ry9KRjFHVU1rVnRsQ3RGYg$vvdGjJOMVX6cPyYc/1kEnVsSdLYbCNx7uTa2/1NptyY', 'Yy+2b2vs444yjeSGRyK7x+mzwm8Crw+HSZVqeF+l9sJxyMQuIeXNeJiDX8/bY1d7NcXFEdGQtSVremRIf9fmVxJ6o9xDl3TjikJuEl823lgUooZgwdy92Nw9HXkyTM9LHavNIJnhkKYHERGw7oB2d7AnZAVVCyGPLEbq51TbGVyBFnYMgkklcxAydi0TGUsOUYxG4qRT/XuoE7dnVICEjBP+7omZfq4ZTlVknDJxBXZAqXdwA5qTbwOLUxhARQ==', 'wik weka', 'testingemailmahasiswa@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 1562008477, '2019-10-16 20:51:27'),
	(54, 2, 1, 'satrrr_', '$argon2id$v=19$m=1024,t=2,p=2$TkRtRm1yU3pFLm9hLzhOZw$uErNZx6iO/yjvMTWF4Em+naj4wnkDbxltoa6a0Wk6sI', 'srCjP/atIQuCUYerrXMKI/lFj3/X2yQ0c/+fcukRm5u2EHU7F0Plf5MMLorUa846UxiU6yG+Plu1SN9bRWCxlK8yDm54SQms7xJoCrIkrOexh7b/KPdbo2wxYo1suyFThJA9s5UnYGOoL+GqaCkFBx7Y6Cq7piym7yD8uYL8VsloHcESkjP3/lV2lk8JqQYvyz96iSZ7TDS7YnTllZKRcZqBbRrOse4N0U9dF+hY0orhZ06c8bnNCVgnVbbDXw==', 'Satria Azam', 'azammadani1@gmail.com', NULL, NULL, 'Semarang Timur', 'default.jpg', 1562334545, '2019-10-17 01:35:13'),
	(56, 2, 1, 'green', '$argon2id$v=19$m=1024,t=2,p=2$dEhMQk55emhoZHNCaVpoag$ZcTLnARpn8MfVRsOVOmGu1R5Zsy6/7+sJ0SmbD62D3M', 'pr8ktKg9vPaNLl8VbI4bCDXvSkLABt8Sqqq3bdhDBE3P/ZgM/BIdILQHzbQPFDAxRMlamUGR14IFOy6yoNT/po6Si+8jBLz/Xsqp3Yw15x4pzIxwZrXY3TPYT0kyoIWCj282WNJzgmULiYjF/JfrTlQi9xSsIuo8MMKp5dSAT3sXexLpa3Q+J9P1VsbhSUUegZOVA4yNm+sPAAl1EgA5wXk1z+PopqQEUMv1VkU2DY295vljZaomy5pBzH1Ttw==', 'Aya aya wae', 'Grernmr791@gmail.com', NULL, NULL, 'Tembalang', 'default.jpg', 1562415019, '2019-10-17 01:07:14'),
	(57, 2, 1, 'greenmr', '$argon2id$v=19$m=1024,t=2,p=2$WTFvandFNVlWZjNXQXlXQw$8sgJaxtf6bTv5Te1ZpXYMDVzla5FWLMovD6/qZiboTA', 'P6I2Hum9DmMBX67aoIOMz1dZ2oFv+zqzpEhHhM/B1KpGIwuddAmyKmtEVk8RzRIY3RWEY3kgNb+ye55fIjLOQo/Jq1WFsuBb1pt99I/4RrtiTnM4Bxgw1u8KcrBdWbuE7XzTZtKtaI9m1HNax90HYeG7ap1/fsP/kJNakCnl/E8UbQW6umT/McMq3OHmk3p9WA4963ZbOjclMTkOYl9pU9W8pMtJkh2C0c5G1CqVd5bkIdVyM4xHuH7TMBW5BQ==', 'Krew', 'Greenmr791@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 1562415238, '2019-10-16 20:51:31'),
	(58, 2, 1, 'a', 'asdasdasd', 'asdasdasd', 'A', 'asds@gmail.com', NULL, NULL, 'Semarang Timur', NULL, 213312, '2019-10-17 01:35:22'),
	(59, 2, 1, 'as', '$argon2id$v=19$m=1024,t=2,p=2$ckZjQUUxZXRvTmZkSjc0OQ$FQ6s0urT1382WHgGwn2lTe336EW/7qXphPhYK1/x5AI', 'y-p07zCRewj1YMgOuPKtvJBN4XQT2ElUHb6DGVWqInaxAmcrodZ8Lh5S3sfFi_k9y-p07zCRewj1YMgOuPKtvJBN4XQT2ElUHb6DGVWqInaxAmcrodZ8Lh5S3sfFi_k9y-p07zCRewj1YMgOuPKtvJBN4XQT2ElUHb6DGVWqInaxAmcrodZ8Lh5S3sfFi_k9y-p07zCRewj1YMgOuPKtvJBN4XQT2ElUHb6DGVWqInaxAmcrodZ8Lh5S3sfFi_k9', 's', 'sdfsdf@gmail.com', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:17'),
	(60, 2, 1, 'asd', '$argon2id$v=19$m=1024,t=2,p=2$enpabXlpdGdIZldnM3VQTg$JLNfzTAQ06xpct3l2w/td3QhlG9kHqs6mpyAZHTJX8w', 'mG2hex_E3AdNUsPWDTBy9IbnZg4XfoMLcruk-j6aCRp0HOJ71tKqvVF8QliYzwS5mG2hex_E3AdNUsPWDTBy9IbnZg4XfoMLcruk-j6aCRp0HOJ71tKqvVF8QliYzwS5mG2hex_E3AdNUsPWDTBy9IbnZg4XfoMLcruk-j6aCRp0HOJ71tKqvVF8QliYzwS5mG2hex_E3AdNUsPWDTBy9IbnZg4XfoMLcruk-j6aCRp0HOJ71tKqvVF8QliYzwS5', '123', 'asdas@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:07:16'),
	(61, 2, 1, 'asdasxcdv', '$argon2id$v=19$m=1024,t=2,p=2$MWd1L0ZHUmp1cTlKRTgvTw$/j8SUQx8tl8OTLIZaXmGllPNi9rMU9bY6kwQN2/Q6v4', 'OLK05HdA_jXPGizNsvlIBgU7cCkRbenFSWyhD98Jx42-qpYmoZVwfMTQE6ra3ut1OLK05HdA_jXPGizNsvlIBgU7cCkRbenFSWyhD98Jx42-qpYmoZVwfMTQE6ra3ut1OLK05HdA_jXPGizNsvlIBgU7cCkRbenFSWyhD98Jx42-qpYmoZVwfMTQE6ra3ut1OLK05HdA_jXPGizNsvlIBgU7cCkRbenFSWyhD98Jx42-qpYmoZVwfMTQE6ra3ut1', 'xcvx', 'xcxxcv@gmail.com', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:12'),
	(62, 2, 1, 'fxgdfgsdf', '$argon2id$v=19$m=1024,t=2,p=2$Y2d4bXc3U2h6cXlMRnpFag$PHZMIS02fBzasw011Hp361oPkM9vIII8NfRQoKwBfN4', 'L7gUl68sFI3iANaoxCGuXD-Km4n9rWYZqOfTvH1yQwp_5tbBP2SMVEjzcJd0RhekL7gUl68sFI3iANaoxCGuXD-Km4n9rWYZqOfTvH1yQwp_5tbBP2SMVEjzcJd0RhekL7gUl68sFI3iANaoxCGuXD-Km4n9rWYZqOfTvH1yQwp_5tbBP2SMVEjzcJd0RhekL7gUl68sFI3iANaoxCGuXD-Km4n9rWYZqOfTvH1yQwp_5tbBP2SMVEjzcJd0Rhek', 'sdfgdfg', 'sdfgdfg@gmail.com', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:12'),
	(63, 2, 1, 'cvcvbn', '$argon2id$v=19$m=1024,t=2,p=2$Rkd2V2pZc0VCWWVaTFNPeA$Vy3DnRyCKrwcF9T18A+ltLvdX6DScuWZ1GGiPY/PPcM', 'lrV_Oyn5jmPIZY-NGSC0ipgeD3W2Ktq1z8A6dRfckbT9sLBwoE7hx4JHQXMUFvaulrV_Oyn5jmPIZY-NGSC0ipgeD3W2Ktq1z8A6dRfckbT9sLBwoE7hx4JHQXMUFvaulrV_Oyn5jmPIZY-NGSC0ipgeD3W2Ktq1z8A6dRfckbT9sLBwoE7hx4JHQXMUFvaulrV_Oyn5jmPIZY-NGSC0ipgeD3W2Ktq1z8A6dRfckbT9sLBwoE7hx4JHQXMUFvau', 'hjgkghjk', 'hjfgj@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:07:21'),
	(64, 2, 1, '1', '$argon2id$v=19$m=1024,t=2,p=2$bTlQMTdkNDREc1ltRXZmRw$ihFTlRVJh7rN2ZfcnE8TOj/ojKqcWrT06eOEBOfPrOs', 'srLdieCYHwSBU9DkpzOG6AKNvaxZmu-tJloQX84MWchRgEPj_I3V0by7fT5q1nF2srLdieCYHwSBU9DkpzOG6AKNvaxZmu-tJloQX84MWchRgEPj_I3V0by7fT5q1nF2srLdieCYHwSBU9DkpzOG6AKNvaxZmu-tJloQX84MWchRgEPj_I3V0by7fT5q1nF2srLdieCYHwSBU9DkpzOG6AKNvaxZmu-tJloQX84MWchRgEPj_I3V0by7fT5q1nF2', '1', '1@gmail.com', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:17'),
	(65, 2, 1, '3', '$argon2id$v=19$m=1024,t=2,p=2$VmtENlpRTUlITy5vWmJLVA$LQNxV3WIh4Jq55EXumnWKVuRV9xFEuVzTT6enNHp6aQ', 'fsv_b2ZY6I7WpRm4j0rkBPFXqwuldSe3N5CJtD1Qyhxz9agH-ATKGUMLciEnOoV8fsv_b2ZY6I7WpRm4j0rkBPFXqwuldSe3N5CJtD1Qyhxz9agH-ATKGUMLciEnOoV8fsv_b2ZY6I7WpRm4j0rkBPFXqwuldSe3N5CJtD1Qyhxz9agH-ATKGUMLciEnOoV8fsv_b2ZY6I7WpRm4j0rkBPFXqwuldSe3N5CJtD1Qyhxz9agH-ATKGUMLciEnOoV8', '2', '2@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(66, 2, 1, '4', '$argon2id$v=19$m=1024,t=2,p=2$YjFrYWt2Yi4xMFEuRmZUSg$7KAHOJehE3u5L6Ys+PCfXljY4hI8zVsUBBU4fPmSzUk', 'M8aUn6HLSdNC5gmeA1ZR-otkw9lfODjuXWJ2byhrv73iQK0EpIFqYx_zVcsTBPG4M8aUn6HLSdNC5gmeA1ZR-otkw9lfODjuXWJ2byhrv73iQK0EpIFqYx_zVcsTBPG4M8aUn6HLSdNC5gmeA1ZR-otkw9lfODjuXWJ2byhrv73iQK0EpIFqYx_zVcsTBPG4M8aUn6HLSdNC5gmeA1ZR-otkw9lfODjuXWJ2byhrv73iQK0EpIFqYx_zVcsTBPG4', '4', '4@gmail.com', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:17'),
	(67, 2, 1, '5', '$argon2id$v=19$m=1024,t=2,p=2$SlpRRE5GSTV4UVFhRVdmYQ$9fuwePF3WbyZZWzmBhn+HZw7GqvZzg8pFIs3WQubTBs', '_fJ2ESj84Nthb6reXo-BP1qnIRUuaLk0WAiQzCdHvwZ3lg5G9KpcDyVxT7MmFOYs_fJ2ESj84Nthb6reXo-BP1qnIRUuaLk0WAiQzCdHvwZ3lg5G9KpcDyVxT7MmFOYs_fJ2ESj84Nthb6reXo-BP1qnIRUuaLk0WAiQzCdHvwZ3lg5G9KpcDyVxT7MmFOYs_fJ2ESj84Nthb6reXo-BP1qnIRUuaLk0WAiQzCdHvwZ3lg5G9KpcDyVxT7MmFOYs', '5', '5@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:07:24'),
	(68, 2, 1, '6', '$argon2id$v=19$m=1024,t=2,p=2$V0g1d1pVOW15L2kyLnVYLw$FgZXQpz2OMcA8VfgCqD2cZ9UGFrxISUPVODGwt8TYus', 'l9rRyIguM4dN2A-JtsUGinP6BYcO3j1HowDEK0bLmf5kVqWzXZe8S7Thxav_CQFpl9rRyIguM4dN2A-JtsUGinP6BYcO3j1HowDEK0bLmf5kVqWzXZe8S7Thxav_CQFpl9rRyIguM4dN2A-JtsUGinP6BYcO3j1HowDEK0bLmf5kVqWzXZe8S7Thxav_CQFpl9rRyIguM4dN2A-JtsUGinP6BYcO3j1HowDEK0bLmf5kVqWzXZe8S7Thxav_CQFp', '6', '6@gmail.com', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:17'),
	(69, 2, 1, '7', '$argon2id$v=19$m=1024,t=2,p=2$dHpPT3luRTk3TnpmYnBFZg$CqgHyPGGb8CbkE1sumPl8o6cgze6JiCuCbkq7gUPJA4', 'LIh8oCYaWu0S_2tvUFgm51EjHRJqNcXlpznwGKZ6BOixykAQds9M-Dbf47VrPeT3LIh8oCYaWu0S_2tvUFgm51EjHRJqNcXlpznwGKZ6BOixykAQds9M-Dbf47VrPeT3LIh8oCYaWu0S_2tvUFgm51EjHRJqNcXlpznwGKZ6BOixykAQds9M-Dbf47VrPeT3LIh8oCYaWu0S_2tvUFgm51EjHRJqNcXlpznwGKZ6BOixykAQds9M-Dbf47VrPeT3', '7', '7@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(70, 2, 1, '8', '$argon2id$v=19$m=1024,t=2,p=2$RUpGdXBhS2NDTU5jTkhzbg$gU+S4876LDTO9rXtmA/yFjs39gxgiYPimGiRc6jVUMk', '9nNH6pkzDuGAYaqTUytdw7CrK_50l2vJiseEBjWxZOM3Ro1LQhmg-8b4IFVPXfcS9nNH6pkzDuGAYaqTUytdw7CrK_50l2vJiseEBjWxZOM3Ro1LQhmg-8b4IFVPXfcS9nNH6pkzDuGAYaqTUytdw7CrK_50l2vJiseEBjWxZOM3Ro1LQhmg-8b4IFVPXfcS9nNH6pkzDuGAYaqTUytdw7CrK_50l2vJiseEBjWxZOM3Ro1LQhmg-8b4IFVPXfcS', '8', '8@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:07:26'),
	(71, 2, 1, '10', '$argon2id$v=19$m=1024,t=2,p=2$S0RQMmtYSkRNM1BaaDFZcg$RLqdkle3NRigeWenY3m8jSXplnx38vq5dwGDSNxFUO8', '31ozWJgC-yUZpTtrdKHaDOeh6NqMnfA9PcLS8j5bFRBEs2_VXvGixYku7Ilm4Qw031ozWJgC-yUZpTtrdKHaDOeh6NqMnfA9PcLS8j5bFRBEs2_VXvGixYku7Ilm4Qw031ozWJgC-yUZpTtrdKHaDOeh6NqMnfA9PcLS8j5bFRBEs2_VXvGixYku7Ilm4Qw031ozWJgC-yUZpTtrdKHaDOeh6NqMnfA9PcLS8j5bFRBEs2_VXvGixYku7Ilm4Qw0', '10', '10@gmail.com', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:12'),
	(72, 2, 1, '11', '$argon2id$v=19$m=1024,t=2,p=2$MjVLSi4zUVA4MXZBY2s1QQ$JL/TqYdFI8S+KL9UqdT74ImnbcCPv3Mz/TVbBJ0HH/M', '60Zv2IQqR-PCtS4ec3EH7joAMOfzairX51ngmk9JlTubKN8UwBGLydW_pDVFYhsx60Zv2IQqR-PCtS4ec3EH7joAMOfzairX51ngmk9JlTubKN8UwBGLydW_pDVFYhsx60Zv2IQqR-PCtS4ec3EH7joAMOfzairX51ngmk9JlTubKN8UwBGLydW_pDVFYhsx60Zv2IQqR-PCtS4ec3EH7joAMOfzairX51ngmk9JlTubKN8UwBGLydW_pDVFYhsx', '11', '11@gmail.com', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:23'),
	(73, 2, 1, '12', '$argon2id$v=19$m=1024,t=2,p=2$T0dyQklxUnZKYUJBeHlVSA$V6nuFoUiwUBWFIPMz0ZOHPK6WEPRdR+N094VnJm7wh0', '6MQe0UyL8lN7H2sqTEAPRBK5xhprCDnSmVdfg1cGYaoIvtZw4u_3kWj-ibzJ9OFX6MQe0UyL8lN7H2sqTEAPRBK5xhprCDnSmVdfg1cGYaoIvtZw4u_3kWj-ibzJ9OFX6MQe0UyL8lN7H2sqTEAPRBK5xhprCDnSmVdfg1cGYaoIvtZw4u_3kWj-ibzJ9OFX6MQe0UyL8lN7H2sqTEAPRBK5xhprCDnSmVdfg1cGYaoIvtZw4u_3kWj-ibzJ9OFX', '12', '12@gmail.com', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:18'),
	(74, 2, 1, '13', '$argon2id$v=19$m=1024,t=2,p=2$UGM1S2pUSC8zekNjbUFMUg$zA+t1s+0L4WXp5AM4UYMj1e4Nver5wxl+6hj40v1WX4', 'WVMfrGJpKj4Xt70mvzTnkYC9qx1sawLPeEB8oZy_O3HUlbuc2dg-QD6FhAIRNS5iWVMfrGJpKj4Xt70mvzTnkYC9qx1sawLPeEB8oZy_O3HUlbuc2dg-QD6FhAIRNS5iWVMfrGJpKj4Xt70mvzTnkYC9qx1sawLPeEB8oZy_O3HUlbuc2dg-QD6FhAIRNS5iWVMfrGJpKj4Xt70mvzTnkYC9qx1sawLPeEB8oZy_O3HUlbuc2dg-QD6FhAIRNS5i', '13', '13@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(75, 2, 1, '14', '$argon2id$v=19$m=1024,t=2,p=2$N0hpbFMvR0RZcENCM01GYg$OoP2EqlKJuwYw6H8KLLES6ElftPjhzRkNkQTdGgFD4Y', '0BdC52DAwGKoOnuHbyzmLE1U9i-lZ7Qa8V4egSqIPsjRcWfN6k_MrTh3pvXYJtFx0BdC52DAwGKoOnuHbyzmLE1U9i-lZ7Qa8V4egSqIPsjRcWfN6k_MrTh3pvXYJtFx0BdC52DAwGKoOnuHbyzmLE1U9i-lZ7Qa8V4egSqIPsjRcWfN6k_MrTh3pvXYJtFx0BdC52DAwGKoOnuHbyzmLE1U9i-lZ7Qa8V4egSqIPsjRcWfN6k_MrTh3pvXYJtFx', '14', '14@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:07:32'),
	(76, 2, 1, '15', '$argon2id$v=19$m=1024,t=2,p=2$YlEyMWVETUVEazRmNms1Sg$ld3NoLtKWaDDLG0OOU6RrqmrVx3sg3jzY9s+3v6ljAw', 'wXp5EaMl7ITcd0Pmxys6nezKWuFC8SbJRV31rOkgqGivBLh92_UNZD-YjA4QftHowXp5EaMl7ITcd0Pmxys6nezKWuFC8SbJRV31rOkgqGivBLh92_UNZD-YjA4QftHowXp5EaMl7ITcd0Pmxys6nezKWuFC8SbJRV31rOkgqGivBLh92_UNZD-YjA4QftHowXp5EaMl7ITcd0Pmxys6nezKWuFC8SbJRV31rOkgqGivBLh92_UNZD-YjA4QftHo', '15', '15@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:33:59'),
	(77, 2, 1, '16', '$argon2id$v=19$m=1024,t=2,p=2$TkhydVA2YWRKaldEOGI5Yw$oKY8WlcOY70BIs8pXLVXiwDJYtFxwxPy3/m5ggozfBk', 'ZMpwOrYN8yuRX-g9iqbhHcW4Tzd5FAfa10CLQ3EesPIl_J7joUkvSxGmK2BDt6nVZMpwOrYN8yuRX-g9iqbhHcW4Tzd5FAfa10CLQ3EesPIl_J7joUkvSxGmK2BDt6nVZMpwOrYN8yuRX-g9iqbhHcW4Tzd5FAfa10CLQ3EesPIl_J7joUkvSxGmK2BDt6nVZMpwOrYN8yuRX-g9iqbhHcW4Tzd5FAfa10CLQ3EesPIl_J7joUkvSxGmK2BDt6nV', '16', '16@gmail.com', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:27'),
	(78, 2, 1, '17', '$argon2id$v=19$m=1024,t=2,p=2$OEJ3b0VUWk5UUmZ1VVJwSQ$0covVTGrISkO745Hb4wq7gFnd6WzASe5wcb7Y80sP9g', 'KOkMNawP7hEgY4CSUfe5jAHoudtXLI9mF_JiRycB2-qrVsTpzvW13Db6xG0ZnlQ8KOkMNawP7hEgY4CSUfe5jAHoudtXLI9mF_JiRycB2-qrVsTpzvW13Db6xG0ZnlQ8KOkMNawP7hEgY4CSUfe5jAHoudtXLI9mF_JiRycB2-qrVsTpzvW13Db6xG0ZnlQ8KOkMNawP7hEgY4CSUfe5jAHoudtXLI9mF_JiRycB2-qrVsTpzvW13Db6xG0ZnlQ8', '17', '17@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(79, 2, 1, '18', '$argon2id$v=19$m=1024,t=2,p=2$cnBvYkozaS85NzZHYWhDYg$cL6IwGi1qoB0UJFSCI4kxhrrKiqib5JXRSalLPTodLI', '9hrPujiaW3LD81MBIyzvKAgoC-p5lq2cHEXNZtUeSVxO7ksFmRnQwJbG_Tf6Y04d9hrPujiaW3LD81MBIyzvKAgoC-p5lq2cHEXNZtUeSVxO7ksFmRnQwJbG_Tf6Y04d9hrPujiaW3LD81MBIyzvKAgoC-p5lq2cHEXNZtUeSVxO7ksFmRnQwJbG_Tf6Y04d9hrPujiaW3LD81MBIyzvKAgoC-p5lq2cHEXNZtUeSVxO7ksFmRnQwJbG_Tf6Y04d', '18', '18@gmail.com', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:07:37'),
	(80, 2, 1, '19', '$argon2id$v=19$m=1024,t=2,p=2$Tk02aUJUUXR3akZETjhFRQ$rFMqD4wtbWAg4/pNao3Q1QgFcg8FaxjFMeawhW75slM', 'Vhx7mFElnBcPZ1UQAIjGa4689MJszqyepuotgkK3fLTwrORd5DC2NXbYiS0vWH_-Vhx7mFElnBcPZ1UQAIjGa4689MJszqyepuotgkK3fLTwrORd5DC2NXbYiS0vWH_-Vhx7mFElnBcPZ1UQAIjGa4689MJszqyepuotgkK3fLTwrORd5DC2NXbYiS0vWH_-Vhx7mFElnBcPZ1UQAIjGa4689MJszqyepuotgkK3fLTwrORd5DC2NXbYiS0vWH_-', '19', '19@gmail.com', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:18'),
	(81, 2, 1, '20', '$argon2id$v=19$m=1024,t=2,p=2$WFIuL2FFNmpLSExFQ05UaQ$bR7qr/SDfDC1DXryPH7hiHgdVwk7CN26swQN9X8aF2U', 'VBuQbMqS0liNd3EAX_-8pUHhCPvWLtGOJnza94K5yTgx2frF7DsYmwcZR1o6jkeIVBuQbMqS0liNd3EAX_-8pUHhCPvWLtGOJnza94K5yTgx2frF7DsYmwcZR1o6jkeIVBuQbMqS0liNd3EAX_-8pUHhCPvWLtGOJnza94K5yTgx2frF7DsYmwcZR1o6jkeIVBuQbMqS0liNd3EAX_-8pUHhCPvWLtGOJnza94K5yTgx2frF7DsYmwcZR1o6jkeI', '20', '20@gmail.com', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:12'),
	(82, 2, 1, '21', '$argon2id$v=19$m=1024,t=2,p=2$M2JKbUxMSmxXNzE5S1hpcw$Z/bSKbu6X2tmSG6bjabhWWogQRQCreiUhsr5gTk8Z+M', 'nHT_E3xZYFimuQhJvbpRy5NXjDVKMok29tz-d1CLlwrs67qUfAace0BWOS84gIPGnHT_E3xZYFimuQhJvbpRy5NXjDVKMok29tz-d1CLlwrs67qUfAace0BWOS84gIPGnHT_E3xZYFimuQhJvbpRy5NXjDVKMok29tz-d1CLlwrs67qUfAace0BWOS84gIPGnHT_E3xZYFimuQhJvbpRy5NXjDVKMok29tz-d1CLlwrs67qUfAace0BWOS84gIPG', '21', '21@gmail.com', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(83, 2, 1, '22', '$argon2id$v=19$m=1024,t=2,p=2$bnVSS2pWMEFtT092dWNOdA$2xig32ODz0T9rEHQLjvRs3JrfgI20LmhVJ3/iGteALY', '9agk7utmC0eDq4Uf2MN-STp_JhQWjEHl5Li1Brzwx3dnXsoFO6GIPYZAVvR8Kybc9agk7utmC0eDq4Uf2MN-STp_JhQWjEHl5Li1Brzwx3dnXsoFO6GIPYZAVvR8Kybc9agk7utmC0eDq4Uf2MN-STp_JhQWjEHl5Li1Brzwx3dnXsoFO6GIPYZAVvR8Kybc9agk7utmC0eDq4Uf2MN-STp_JhQWjEHl5Li1Brzwx3dnXsoFO6GIPYZAVvR8Kybc', '22', '22@gmail.com', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(84, 2, 1, '23', '$argon2id$v=19$m=1024,t=2,p=2$anV3Z252Q0ozdnU4d2h1Rg$w6pllq0nY6+pMXl1UfL+BpjVScgRLGWXUJA46zuVQr8', 'tRFk_eloL3SEHW4imcQ8Z2O9PIdYyAsj7bDnNzC1a6MfvBUuhVpXqg-T0rGxwJK5tRFk_eloL3SEHW4imcQ8Z2O9PIdYyAsj7bDnNzC1a6MfvBUuhVpXqg-T0rGxwJK5tRFk_eloL3SEHW4imcQ8Z2O9PIdYyAsj7bDnNzC1a6MfvBUuhVpXqg-T0rGxwJK5tRFk_eloL3SEHW4imcQ8Z2O9PIdYyAsj7bDnNzC1a6MfvBUuhVpXqg-T0rGxwJK5', '23', '23@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(85, 2, 1, '24', '$argon2id$v=19$m=1024,t=2,p=2$cWxvT3FYLjZYQ0QvdXo0dQ$HmugMM3w6y8Gwt55b5hlp6LUlpJ3KAC3ykid1EgkRQU', 'd4v8skMKm0q_Z9XFjwJGhf7lozy1EYx36gWH5cO2PpNLTIDnAiuaB-CQbeRtrSUVd4v8skMKm0q_Z9XFjwJGhf7lozy1EYx36gWH5cO2PpNLTIDnAiuaB-CQbeRtrSUVd4v8skMKm0q_Z9XFjwJGhf7lozy1EYx36gWH5cO2PpNLTIDnAiuaB-CQbeRtrSUVd4v8skMKm0q_Z9XFjwJGhf7lozy1EYx36gWH5cO2PpNLTIDnAiuaB-CQbeRtrSUV', '24', '24@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(86, 2, 1, '25', '$argon2id$v=19$m=1024,t=2,p=2$ZUp4TENkWTY4NmNDT0JvbQ$6S5q9yVVm5vL9dGEwpmicXQabtmTRjEMFe/S8baFLZ0', 'TP4jYcrkSUbdnB5h-JpwmX6F7yeElDzaH9VLiqGKN2Q_MsuCv8tgOWAIZf0x1o3RTP4jYcrkSUbdnB5h-JpwmX6F7yeElDzaH9VLiqGKN2Q_MsuCv8tgOWAIZf0x1o3RTP4jYcrkSUbdnB5h-JpwmX6F7yeElDzaH9VLiqGKN2Q_MsuCv8tgOWAIZf0x1o3RTP4jYcrkSUbdnB5h-JpwmX6F7yeElDzaH9VLiqGKN2Q_MsuCv8tgOWAIZf0x1o3R', '25', '25@gmail.com', NULL, NULL, 'Semarang Tengah', 'default.jpg', 0, '2019-10-17 01:53:32'),
	(87, 2, 1, '26', '$argon2id$v=19$m=1024,t=2,p=2$M1RVRFh2Z2Q2a29qYzhUbg$UTDOyoT1Y8zUh6QO9nKd+kbHkDy0WEtBUJZT9wwKcL0', 'PR3Y4V2lU-xZFOLiqmcMQnf875DabgAjy69KepuCvzkXswd1WoE_0GtJIBHNSrThPR3Y4V2lU-xZFOLiqmcMQnf875DabgAjy69KepuCvzkXswd1WoE_0GtJIBHNSrThPR3Y4V2lU-xZFOLiqmcMQnf875DabgAjy69KepuCvzkXswd1WoE_0GtJIBHNSrThPR3Y4V2lU-xZFOLiqmcMQnf875DabgAjy69KepuCvzkXswd1WoE_0GtJIBHNSrTh', '26', '26@gmail.com', NULL, NULL, 'Semarang Tengah', 'default.jpg', 0, '2019-10-17 01:53:32'),
	(88, 2, 1, '27', '$argon2id$v=19$m=1024,t=2,p=2$SjhaMGh5YnlCUkRkUnpIQg$WPCxWcd9gw37GfoAhtKjNWiY8RICgw8Lr9Wn4VlUAY0', 'x3cgCTlXV_zQLoJIv7aBnbDsZNSWOUfdm8yq1E2RpHrFAYMjhw409uKk5-iGe6tPx3cgCTlXV_zQLoJIv7aBnbDsZNSWOUfdm8yq1E2RpHrFAYMjhw409uKk5-iGe6tPx3cgCTlXV_zQLoJIv7aBnbDsZNSWOUfdm8yq1E2RpHrFAYMjhw409uKk5-iGe6tPx3cgCTlXV_zQLoJIv7aBnbDsZNSWOUfdm8yq1E2RpHrFAYMjhw409uKk5-iGe6tP', '27', '27@gmail.com', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:28'),
	(89, 2, 1, '28', '$argon2id$v=19$m=1024,t=2,p=2$VG5XLmJZUGd3d1FQaHN3SA$Ly2bZJFo8dMO24NT6019JtOkgLid7MfdvBWb+60YfFk', '9Vk48xzthTiNXGUD6FybvSOpEewK1Ro2jIWAdm5JlaMrLnQq73Huf_gcsCPY-B0Z9Vk48xzthTiNXGUD6FybvSOpEewK1Ro2jIWAdm5JlaMrLnQq73Huf_gcsCPY-B0Z9Vk48xzthTiNXGUD6FybvSOpEewK1Ro2jIWAdm5JlaMrLnQq73Huf_gcsCPY-B0Z9Vk48xzthTiNXGUD6FybvSOpEewK1Ro2jIWAdm5JlaMrLnQq73Huf_gcsCPY-B0Z', '28', '28@mail.com', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:07:46'),
	(90, 2, 1, '29', '$argon2id$v=19$m=1024,t=2,p=2$anhnR01tNkpIS3JoazNmdw$c0R0XrqU7Q0yToQGAYMBwVjfbq6itEZIjyvtXwm3Rhs', '0kvmYHzIQlhT-gtZdiUupsf9D5OM4XC7B12oFx_eqRErJnPNGAyV36wSWbaLK8jc0kvmYHzIQlhT-gtZdiUupsf9D5OM4XC7B12oFx_eqRErJnPNGAyV36wSWbaLK8jc0kvmYHzIQlhT-gtZdiUupsf9D5OM4XC7B12oFx_eqRErJnPNGAyV36wSWbaLK8jc0kvmYHzIQlhT-gtZdiUupsf9D5OM4XC7B12oFx_eqRErJnPNGAyV36wSWbaLK8jc', '29', '29@gmail.com', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:31'),
	(91, 2, 1, '30', '$argon2id$v=19$m=1024,t=2,p=2$Q3k0MFB5a29ZOW9KYlFsbA$bd1WQbcfb+1n/taHpNZP1eD6qhCULNWGZNTmHHwfTDk', 'ne5RZBjGN_OcutMIW1bQF8k2yKsHU0dJYPmafxCX3ivwpg7LV4ATE6l-zro9hDSqne5RZBjGN_OcutMIW1bQF8k2yKsHU0dJYPmafxCX3ivwpg7LV4ATE6l-zro9hDSqne5RZBjGN_OcutMIW1bQF8k2yKsHU0dJYPmafxCX3ivwpg7LV4ATE6l-zro9hDSqne5RZBjGN_OcutMIW1bQF8k2yKsHU0dJYPmafxCX3ivwpg7LV4ATE6l-zro9hDSq', '30', '30@gmail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:06'),
	(92, 2, 1, '31', '$argon2id$v=19$m=1024,t=2,p=2$LlNSazEwZnZXV3h3aC5wWQ$EHB9K2yzQawijFyzmkoayI8oob8sFthTYIV7YO/cVhE', 'LFXkAGwIn63TQoh9Bg15tZixDM8qbuNczUrEVWPO2SKRmCp7lfYj_easyd-0vHJ4LFXkAGwIn63TQoh9Bg15tZixDM8qbuNczUrEVWPO2SKRmCp7lfYj_easyd-0vHJ4LFXkAGwIn63TQoh9Bg15tZixDM8qbuNczUrEVWPO2SKRmCp7lfYj_easyd-0vHJ4LFXkAGwIn63TQoh9Bg15tZixDM8qbuNczUrEVWPO2SKRmCp7lfYj_easyd-0vHJ4', '31', '31@gmail.com', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(93, 2, 1, '32', '$argon2id$v=19$m=1024,t=2,p=2$ZVJyYzc4eW02L1hpL0E0VA$KTs8DeZPLeCkmLGI9jj9cuyYqrL/ViAvYy0xbN9UxsY', 'gcnX13jHGqVJkwEQefLtZIxNSoYhFA7l5Ru-mdP8_p2isb9Or4BTv0KyD6zUCWMagcnX13jHGqVJkwEQefLtZIxNSoYhFA7l5Ru-mdP8_p2isb9Or4BTv0KyD6zUCWMagcnX13jHGqVJkwEQefLtZIxNSoYhFA7l5Ru-mdP8_p2isb9Or4BTv0KyD6zUCWMagcnX13jHGqVJkwEQefLtZIxNSoYhFA7l5Ru-mdP8_p2isb9Or4BTv0KyD6zUCWMa', '32', '32@gmail.com', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(94, 2, 1, '33', '$argon2id$v=19$m=1024,t=2,p=2$T3I3SkVONFE3aWxHOGcxbg$Q9pMRaw9urI8Re/tHf/HRFj0B2JAQsya/ntKRc1jpcY', 'AysJ605I_CmrFc1k3nGvSTNgPMKzRQlqpiw-teoZfD8juVhdE9LxYWXb7UOa4HB2AysJ605I_CmrFc1k3nGvSTNgPMKzRQlqpiw-teoZfD8juVhdE9LxYWXb7UOa4HB2AysJ605I_CmrFc1k3nGvSTNgPMKzRQlqpiw-teoZfD8juVhdE9LxYWXb7UOa4HB2AysJ605I_CmrFc1k3nGvSTNgPMKzRQlqpiw-teoZfD8juVhdE9LxYWXb7UOa4HB2', '33', '33@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:07:49'),
	(95, 2, 1, '34', '$argon2id$v=19$m=1024,t=2,p=2$bDdPMHBic1RlY3pHc3g1Ng$lzCrWuUoo/AR8FIx3bO0kJjCz/UYKmF0ARPgQIImlRg', 'flatIJ4QP9hvdMwRksYB_icFyLum5oepCZqUArHEVDjGnT3xW2X8SbzN10Og7-K6flatIJ4QP9hvdMwRksYB_icFyLum5oepCZqUArHEVDjGnT3xW2X8SbzN10Og7-K6flatIJ4QP9hvdMwRksYB_icFyLum5oepCZqUArHEVDjGnT3xW2X8SbzN10Og7-K6flatIJ4QP9hvdMwRksYB_icFyLum5oepCZqUArHEVDjGnT3xW2X8SbzN10Og7-K6', '34', '34@gmail.com', NULL, NULL, 'Banyumanik', 'default.jpg', 0, '2019-10-17 01:52:53'),
	(96, 2, 1, '35', '$argon2id$v=19$m=1024,t=2,p=2$MVExNTVJeTYwbTZXWndyVg$0xcX2bdoavqFGmDhFf8qb1ySxYuLLyf/JCEAzSu6ZDQ', 'uz_3NeRMbY-f4voypTUIBg6ak7HKdS9AniGEVls0COr1WhZF52DxcmPtQJwXqjL8uz_3NeRMbY-f4voypTUIBg6ak7HKdS9AniGEVls0COr1WhZF52DxcmPtQJwXqjL8uz_3NeRMbY-f4voypTUIBg6ak7HKdS9AniGEVls0COr1WhZF52DxcmPtQJwXqjL8uz_3NeRMbY-f4voypTUIBg6ak7HKdS9AniGEVls0COr1WhZF52DxcmPtQJwXqjL8', '35', '35@mail.net', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:18'),
	(97, 2, 1, '36', '$argon2id$v=19$m=1024,t=2,p=2$ZFhscU5SdnZNOEticVZlMA$hraxJXokcA+PWoX+WxTLXfJe76MgNV4olT7P5wqABGo', 'KQsDSMGFRNqof0zkTbnePa_rXIxw6LgUvO3tuB7d4imZJ5h1YEWVA8cCH-2lj9pyKQsDSMGFRNqof0zkTbnePa_rXIxw6LgUvO3tuB7d4imZJ5h1YEWVA8cCH-2lj9pyKQsDSMGFRNqof0zkTbnePa_rXIxw6LgUvO3tuB7d4imZJ5h1YEWVA8cCH-2lj9pyKQsDSMGFRNqof0zkTbnePa_rXIxw6LgUvO3tuB7d4imZJ5h1YEWVA8cCH-2lj9py', '36', '36@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:07:56'),
	(98, 2, 1, '37', '$argon2id$v=19$m=1024,t=2,p=2$alptdVllY1pqYW1xZm1OaQ$vVJZc4R389Mcpqz4HXHKTRWftQZ8UuDiw3SPn6vIZMM', 'x05oNzv1wAVCg9lX47SWbfiZaumRhtcqDnBG2EHPyFY-IJrkLO8dUMps6TKQ_j3ex05oNzv1wAVCg9lX47SWbfiZaumRhtcqDnBG2EHPyFY-IJrkLO8dUMps6TKQ_j3ex05oNzv1wAVCg9lX47SWbfiZaumRhtcqDnBG2EHPyFY-IJrkLO8dUMps6TKQ_j3ex05oNzv1wAVCg9lX47SWbfiZaumRhtcqDnBG2EHPyFY-IJrkLO8dUMps6TKQ_j3e', '37', '37@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:07:57'),
	(99, 2, 1, '38', '$argon2id$v=19$m=1024,t=2,p=2$dXpGeXMxQVpyY3FmdWFTOQ$FMtgsJPpcMhvYbZq64jBsA8mu9p2J4AihhZ2XeMl0Jg', '8eM3HJZfOYUpIs_QSw0zkxogiA4LybnEthTm-r1VG2qRWDN5FCcuBXd79ajPKlv68eM3HJZfOYUpIs_QSw0zkxogiA4LybnEthTm-r1VG2qRWDN5FCcuBXd79ajPKlv68eM3HJZfOYUpIs_QSw0zkxogiA4LybnEthTm-r1VG2qRWDN5FCcuBXd79ajPKlv68eM3HJZfOYUpIs_QSw0zkxogiA4LybnEthTm-r1VG2qRWDN5FCcuBXd79ajPKlv6', '38', '38@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(100, 2, 1, '39', '$argon2id$v=19$m=1024,t=2,p=2$S2R4RDFUaldTVHZ2ZnhSLw$TliCVHL11zdkhNrMGcv+tmI/lKo4jLbpLgH9sYOIVic', 'uUaEQKcONYfw-gHFA3bRx94mhJeIv8T1p5W0ty_lZzSi7oqDMXnCL6PsjVdkG2rBuUaEQKcONYfw-gHFA3bRx94mhJeIv8T1p5W0ty_lZzSi7oqDMXnCL6PsjVdkG2rBuUaEQKcONYfw-gHFA3bRx94mhJeIv8T1p5W0ty_lZzSi7oqDMXnCL6PsjVdkG2rBuUaEQKcONYfw-gHFA3bRx94mhJeIv8T1p5W0ty_lZzSi7oqDMXnCL6PsjVdkG2rB', '39', '39@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:07:58'),
	(101, 2, 1, '40', '$argon2id$v=19$m=1024,t=2,p=2$T3NYaFRpazFnV0VWTndZcA$SwXj/GWwVmGHdCD2cciqfR323HH+FMO1pKEnFIqTqv4', '_R8-MUfIb7OwDpSjrKP3gZLikqvVAJFmlcWtX9YnTEho5s12C0u6NzHQeGdB4xya_R8-MUfIb7OwDpSjrKP3gZLikqvVAJFmlcWtX9YnTEho5s12C0u6NzHQeGdB4xya_R8-MUfIb7OwDpSjrKP3gZLikqvVAJFmlcWtX9YnTEho5s12C0u6NzHQeGdB4xya_R8-MUfIb7OwDpSjrKP3gZLikqvVAJFmlcWtX9YnTEho5s12C0u6NzHQeGdB4xya', '40', '40@mail.net', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:18'),
	(102, 2, 1, '41', '$argon2id$v=19$m=1024,t=2,p=2$TEdFek5ZWmdPS2Nka1ZTZg$ADszDduhTI2q7RolD+VvoBMN0eIp24rIjtIg9p7gfV8', 'SjfcLuA_Yd7ln-p4Tx2bGO1H0hWkQeEKZg9FUstRCyqamiBJwV863IXzMo5rvNDPSjfcLuA_Yd7ln-p4Tx2bGO1H0hWkQeEKZg9FUstRCyqamiBJwV863IXzMo5rvNDPSjfcLuA_Yd7ln-p4Tx2bGO1H0hWkQeEKZg9FUstRCyqamiBJwV863IXzMo5rvNDPSjfcLuA_Yd7ln-p4Tx2bGO1H0hWkQeEKZg9FUstRCyqamiBJwV863IXzMo5rvNDP', '41', '41@mail.com', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:11'),
	(103, 2, 1, '42', '$argon2id$v=19$m=1024,t=2,p=2$MGlKOUp1YXNtZU5GMnp3bA$+RSb4YAZWuPAJPlLkL0jicB1IueAukrpZOjHPbUHY+s', 'YBqHyD5PFv68gJKnS4OI7WRrUZNcVus_9oMh2QeT03ba-iXAwfpldtkx1mLCzGEjYBqHyD5PFv68gJKnS4OI7WRrUZNcVus_9oMh2QeT03ba-iXAwfpldtkx1mLCzGEjYBqHyD5PFv68gJKnS4OI7WRrUZNcVus_9oMh2QeT03ba-iXAwfpldtkx1mLCzGEjYBqHyD5PFv68gJKnS4OI7WRrUZNcVus_9oMh2QeT03ba-iXAwfpldtkx1mLCzGEj', '42', '42@mail.com', NULL, NULL, 'Semarang Tengah', 'default.jpg', 0, '2019-10-17 01:53:32'),
	(104, 2, 1, '43', '$argon2id$v=19$m=1024,t=2,p=2$L0Zrb2tBc2VBdjhuQXFHaQ$NNU2KsUuveMVBjMhxkifMVh9T29PN7uffxz8d/Mj8CU', 'DymO9Er6IsLzVMkKTqa0bQe_SnHjwoGgR3WdvlXtZpu7854UNJ-PiY21fFAhcBCxDymO9Er6IsLzVMkKTqa0bQe_SnHjwoGgR3WdvlXtZpu7854UNJ-PiY21fFAhcBCxDymO9Er6IsLzVMkKTqa0bQe_SnHjwoGgR3WdvlXtZpu7854UNJ-PiY21fFAhcBCxDymO9Er6IsLzVMkKTqa0bQe_SnHjwoGgR3WdvlXtZpu7854UNJ-PiY21fFAhcBCx', '43', '43@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:08:03'),
	(105, 2, 1, '44', '$argon2id$v=19$m=1024,t=2,p=2$OXdmOEtFMFNRZnBya09JVA$zUDuVA/Db4FRA52fvF3EZCgtu4GsUFJZENm7svwYX9o', 'uhTD-JMyKPAeNEdxZRr2pV30n1G6sfXOa4SWm9cv8ozULY_bqiIljHt7kFQgw5BCuhTD-JMyKPAeNEdxZRr2pV30n1G6sfXOa4SWm9cv8ozULY_bqiIljHt7kFQgw5BCuhTD-JMyKPAeNEdxZRr2pV30n1G6sfXOa4SWm9cv8ozULY_bqiIljHt7kFQgw5BCuhTD-JMyKPAeNEdxZRr2pV30n1G6sfXOa4SWm9cv8ozULY_bqiIljHt7kFQgw5BC', '44', '44@mail.net', NULL, NULL, 'Banyumanik', 'default.jpg', 0, '2019-10-17 01:52:53'),
	(106, 2, 1, '45', '$argon2id$v=19$m=1024,t=2,p=2$UGRseTZIeXVrMHJBVnBLYQ$WpTRpn7gV4vpoK2tcjgtTGQMwcg4KYY9nIHjjtvxdOQ', 'vNGqJR3wjzYKkb2OV5EmnuP9lCDLcM1_A4tQs6rpHhUFXB-0xSy7iIdafeZoTW8gvNGqJR3wjzYKkb2OV5EmnuP9lCDLcM1_A4tQs6rpHhUFXB-0xSy7iIdafeZoTW8gvNGqJR3wjzYKkb2OV5EmnuP9lCDLcM1_A4tQs6rpHhUFXB-0xSy7iIdafeZoTW8gvNGqJR3wjzYKkb2OV5EmnuP9lCDLcM1_A4tQs6rpHhUFXB-0xSy7iIdafeZoTW8g', '45', '45@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:35'),
	(107, 2, 1, '46', '$argon2id$v=19$m=1024,t=2,p=2$RTJ6R0xoeExWblhaYm9zUA$u1VcFKZfB3DOcEv41UEXjx8vkpskOMN4l0/+G2JgkYQ', 'qoOuVy2IgTktbp6fxiH9PCYerwM_RvDB5mK3zXJscQh1-dWLa7jNSF80Gn4AZlEUqoOuVy2IgTktbp6fxiH9PCYerwM_RvDB5mK3zXJscQh1-dWLa7jNSF80Gn4AZlEUqoOuVy2IgTktbp6fxiH9PCYerwM_RvDB5mK3zXJscQh1-dWLa7jNSF80Gn4AZlEUqoOuVy2IgTktbp6fxiH9PCYerwM_RvDB5mK3zXJscQh1-dWLa7jNSF80Gn4AZlEU', '46', '46@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(108, 2, 1, '47', '$argon2id$v=19$m=1024,t=2,p=2$TlF3SFRuOGRQRnN3Ni9ZNQ$u9vaITTB67jNpwdFKMzSV4uE8jistbFI8kQXSYzdj4o', 'Jk6HfVqnObDUgeaxI1XBuy0pjZrlCdE4Ys58FcvhWmwR7N9PGo-3ziQKMSAT2_tLJk6HfVqnObDUgeaxI1XBuy0pjZrlCdE4Ys58FcvhWmwR7N9PGo-3ziQKMSAT2_tLJk6HfVqnObDUgeaxI1XBuy0pjZrlCdE4Ys58FcvhWmwR7N9PGo-3ziQKMSAT2_tLJk6HfVqnObDUgeaxI1XBuy0pjZrlCdE4Ys58FcvhWmwR7N9PGo-3ziQKMSAT2_tL', '47', '47@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(109, 2, 1, '48', '$argon2id$v=19$m=1024,t=2,p=2$bmpHU2lySXllZzFsdGc5bA$UxxIaovWN+pC6+llLTNNUjJiwfW0eJtT0kuxYg1KaBM', 'Ss8UTJ35Fbltx7VC1ojwWudckHa0gNp2vLMO4XRIQ69z_DiYAhPKeZynGmqrf-BESs8UTJ35Fbltx7VC1ojwWudckHa0gNp2vLMO4XRIQ69z_DiYAhPKeZynGmqrf-BESs8UTJ35Fbltx7VC1ojwWudckHa0gNp2vLMO4XRIQ69z_DiYAhPKeZynGmqrf-BESs8UTJ35Fbltx7VC1ojwWudckHa0gNp2vLMO4XRIQ69z_DiYAhPKeZynGmqrf-BE', '48', '48@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:08:24'),
	(110, 2, 1, '49', '$argon2id$v=19$m=1024,t=2,p=2$dUE0ekJtbGpQNnc0U2pkMw$4Rh3/ZRfT5hsGzsEnW3SDMrfQi90QMmEPSWFaOPS2Ok', 'RqWxzZLKUEFgcGnIuv1e37Qd_4TJw0kol8hDsb9aS-Apf26j5XCrHiPMmtyBNYVORqWxzZLKUEFgcGnIuv1e37Qd_4TJw0kol8hDsb9aS-Apf26j5XCrHiPMmtyBNYVORqWxzZLKUEFgcGnIuv1e37Qd_4TJw0kol8hDsb9aS-Apf26j5XCrHiPMmtyBNYVORqWxzZLKUEFgcGnIuv1e37Qd_4TJw0kol8hDsb9aS-Apf26j5XCrHiPMmtyBNYVO', '49', '49@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(111, 2, 1, '50', '$argon2id$v=19$m=1024,t=2,p=2$cVhzdW4wQi9Kd1R6ZlpCWg$LkbVdn/lapK6KmbYw+qvu3j02j1ZEUeouEWhL1D6/uE', '0BOvxguMG3bS-5ElP8koAeiwD_R9qCWsLznTh1K7r6fVctUmFyadZQNXH2jIJYp40BOvxguMG3bS-5ElP8koAeiwD_R9qCWsLznTh1K7r6fVctUmFyadZQNXH2jIJYp40BOvxguMG3bS-5ElP8koAeiwD_R9qCWsLznTh1K7r6fVctUmFyadZQNXH2jIJYp40BOvxguMG3bS-5ElP8koAeiwD_R9qCWsLznTh1K7r6fVctUmFyadZQNXH2jIJYp4', '50', '50@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(112, 2, 1, '51', '$argon2id$v=19$m=1024,t=2,p=2$TmJEZ3F4L1JUTzQ2c25kbA$OiIaTbw4XBV9OOLBVsJNG+uhzGgo49kxG0p0EI4jwBE', 'otpRTSUc8FwdZn54aV6syvY3k9Alg-NmfBWirjD7b0MH_OJGhxeqIuKQEP21XLzCotpRTSUc8FwdZn54aV6syvY3k9Alg-NmfBWirjD7b0MH_OJGhxeqIuKQEP21XLzCotpRTSUc8FwdZn54aV6syvY3k9Alg-NmfBWirjD7b0MH_OJGhxeqIuKQEP21XLzCotpRTSUc8FwdZn54aV6syvY3k9Alg-NmfBWirjD7b0MH_OJGhxeqIuKQEP21XLzC', '51', '51@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(113, 2, 1, '52', '$argon2id$v=19$m=1024,t=2,p=2$WWY4MWU1VDMxNHk4R004Mg$oKHuprOcPWaIMAUZKgFfb2WdH8ql+rYDfJmdA30dqhs', 'GUEOMZvu_73SwfqTIyto-KapLH9gizmQlBnY8XcFk5AseP2b0jRd1WrJNC46DxhVGUEOMZvu_73SwfqTIyto-KapLH9gizmQlBnY8XcFk5AseP2b0jRd1WrJNC46DxhVGUEOMZvu_73SwfqTIyto-KapLH9gizmQlBnY8XcFk5AseP2b0jRd1WrJNC46DxhVGUEOMZvu_73SwfqTIyto-KapLH9gizmQlBnY8XcFk5AseP2b0jRd1WrJNC46DxhV', '52', '52@mail.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:33'),
	(114, 2, 1, '53', '$argon2id$v=19$m=1024,t=2,p=2$SC9CN1JhSkxScHU4L0prbw$24CZC0IYcr2UzANOPK1QuXEepOLru67gSiK7m4eXBDY', 'NYuobHPav2Itf3G6hyjwDRqLAnEBVrQp-g0JU9dFcmeCXOiKzlSs8_4kWTZ5x1M7NYuobHPav2Itf3G6hyjwDRqLAnEBVrQp-g0JU9dFcmeCXOiKzlSs8_4kWTZ5x1M7NYuobHPav2Itf3G6hyjwDRqLAnEBVrQp-g0JU9dFcmeCXOiKzlSs8_4kWTZ5x1M7NYuobHPav2Itf3G6hyjwDRqLAnEBVrQp-g0JU9dFcmeCXOiKzlSs8_4kWTZ5x1M7', '53', '53@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:08:32'),
	(115, 2, 1, '54', '$argon2id$v=19$m=1024,t=2,p=2$RDRaUnhSdFM2aktmRVpJSg$VlG3QrzohYqeqCYAzNwj75fLhKMQqnrufgrMNp4Pujc', '7AXaS9NqPxjykEgFltJvpVK8r-HhCRcfYQ5dTGsBZ3e1WOUM0zibnw4m_6LoDIu27AXaS9NqPxjykEgFltJvpVK8r-HhCRcfYQ5dTGsBZ3e1WOUM0zibnw4m_6LoDIu27AXaS9NqPxjykEgFltJvpVK8r-HhCRcfYQ5dTGsBZ3e1WOUM0zibnw4m_6LoDIu27AXaS9NqPxjykEgFltJvpVK8r-HhCRcfYQ5dTGsBZ3e1WOUM0zibnw4m_6LoDIu2', '54', '54@mail.net', NULL, NULL, 'Gajah Mungkur', 'default.jpg', 0, '2019-10-17 01:51:20'),
	(116, 2, 1, '55', '$argon2id$v=19$m=1024,t=2,p=2$M25PRVVYTkFYU2RXZDZNTA$+VgEZw7LKwdWDBGf0qtAd8Cqibr7jVlWcwQ2HknFAMI', 'jMwS95a0psTIr-JzFXvmq1g3lYLf_OA4K6VDbZQyBEUhtR8PHGWuin2oCNk7cxedjMwS95a0psTIr-JzFXvmq1g3lYLf_OA4K6VDbZQyBEUhtR8PHGWuin2oCNk7cxedjMwS95a0psTIr-JzFXvmq1g3lYLf_OA4K6VDbZQyBEUhtR8PHGWuin2oCNk7cxedjMwS95a0psTIr-JzFXvmq1g3lYLf_OA4K6VDbZQyBEUhtR8PHGWuin2oCNk7cxed', '55', '55@mail.net', NULL, NULL, 'Banyumanik', 'default.jpg', 0, '2019-10-17 01:52:53'),
	(117, 2, 1, '56', '$argon2id$v=19$m=1024,t=2,p=2$YWtCN3NDcEZFbkRZZHpCcg$Mi7XXg+RFnTnMLJwP/4Fwtxfk10450nl/54oiXnfo5k', 'AJpZiLYhG5vIOsrxCTenfM0Bu96F1Vb-82clgR7HoSKWNty_mkXUPQaq3djzD4EwAJpZiLYhG5vIOsrxCTenfM0Bu96F1Vb-82clgR7HoSKWNty_mkXUPQaq3djzD4EwAJpZiLYhG5vIOsrxCTenfM0Bu96F1Vb-82clgR7HoSKWNty_mkXUPQaq3djzD4EwAJpZiLYhG5vIOsrxCTenfM0Bu96F1Vb-82clgR7HoSKWNty_mkXUPQaq3djzD4Ew', '56', '56@mail.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:12'),
	(118, 2, 1, '57', '$argon2id$v=19$m=1024,t=2,p=2$NHpSZUJsNWZ1RklaY1k1Sw$e4Y27VrCsVlqaS3NC1mIj0xA5xnWLxyrFIM7+6lg5ag', 'i4_rXD0bEgnluN63pWeRa7OokGcSYJxMVHKjUfmLz9A5TPqd-BZCwF12vsQIyth8i4_rXD0bEgnluN63pWeRa7OokGcSYJxMVHKjUfmLz9A5TPqd-BZCwF12vsQIyth8i4_rXD0bEgnluN63pWeRa7OokGcSYJxMVHKjUfmLz9A5TPqd-BZCwF12vsQIyth8i4_rXD0bEgnluN63pWeRa7OokGcSYJxMVHKjUfmLz9A5TPqd-BZCwF12vsQIyth8', '57', '57@mail.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:15'),
	(119, 2, 1, '58', '$argon2id$v=19$m=1024,t=2,p=2$Rmw1Y09GUmRSTzlYbGN4OA$zozXn+4QKDV59YdJi4b5h2IEzs88acvbkT88LoQyyEg', '8TI-0nGQyJWf_miSMPhDBds6ez5R4Uvp2K3YxrjLXwZaEHoVqbl7cFuANtk9g1CO8TI-0nGQyJWf_miSMPhDBds6ez5R4Uvp2K3YxrjLXwZaEHoVqbl7cFuANtk9g1CO8TI-0nGQyJWf_miSMPhDBds6ez5R4Uvp2K3YxrjLXwZaEHoVqbl7cFuANtk9g1CO8TI-0nGQyJWf_miSMPhDBds6ez5R4Uvp2K3YxrjLXwZaEHoVqbl7cFuANtk9g1CO', '58', '58@mail.net', NULL, NULL, 'Semarang Tengah', 'default.jpg', 0, '2019-10-17 01:53:33'),
	(120, 2, 1, '59', '$argon2id$v=19$m=1024,t=2,p=2$SU9uRkxWUzJuSFJzSkdVWQ$2AC+WF89wyKGxR407hKbhM59InEINsTdLi6vD5VT65M', 'BZJXu9j4PwCbOIhgzF1SA3a7tWf-cMLe2G8dNqDoYVik6RT5lEmyvQ_KpHnrU0xsBZJXu9j4PwCbOIhgzF1SA3a7tWf-cMLe2G8dNqDoYVik6RT5lEmyvQ_KpHnrU0xsBZJXu9j4PwCbOIhgzF1SA3a7tWf-cMLe2G8dNqDoYVik6RT5lEmyvQ_KpHnrU0xsBZJXu9j4PwCbOIhgzF1SA3a7tWf-cMLe2G8dNqDoYVik6RT5lEmyvQ_KpHnrU0xs', '59', '59@mail.net', NULL, NULL, 'Gunungpati', 'default.jpg', 0, '2019-10-17 01:54:13'),
	(121, 2, 1, '60', '$argon2id$v=19$m=1024,t=2,p=2$UTVoUE1zNXBBNTZDSm42aQ$t5+dJNnsK2xe/twV8dOUnso0DnwbsRNmPQDOCRpdl4w', 'Yo834znuqsHU1vymrExLJAeNljpRIPhik2_V0Gc9DSwFaZ-ObWKQ7gtdfT5B6MXCYo834znuqsHU1vymrExLJAeNljpRIPhik2_V0Gc9DSwFaZ-ObWKQ7gtdfT5B6MXCYo834znuqsHU1vymrExLJAeNljpRIPhik2_V0Gc9DSwFaZ-ObWKQ7gtdfT5B6MXCYo834znuqsHU1vymrExLJAeNljpRIPhik2_V0Gc9DSwFaZ-ObWKQ7gtdfT5B6MXC', '60', '60@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(122, 2, 1, '61', '$argon2id$v=19$m=1024,t=2,p=2$RmNxSFJsaEdnbUxsYXBsTQ$TfvrUUiNSB1x3CroNPt5upRyi9H6hphhMFhm3ez67/8', 'CyXkjDKbc2AxwlshHWP8vBRgzurOodG4-f3peT05J1EqVYtLNMF9U6iQan_Z7ImSCyXkjDKbc2AxwlshHWP8vBRgzurOodG4-f3peT05J1EqVYtLNMF9U6iQan_Z7ImSCyXkjDKbc2AxwlshHWP8vBRgzurOodG4-f3peT05J1EqVYtLNMF9U6iQan_Z7ImSCyXkjDKbc2AxwlshHWP8vBRgzurOodG4-f3peT05J1EqVYtLNMF9U6iQan_Z7ImS', '61', '61@mail.net', NULL, NULL, 'Gunungpati', 'default.jpg', 0, '2019-10-17 01:54:13'),
	(123, 2, 1, '62', '$argon2id$v=19$m=1024,t=2,p=2$Tlp2RmRleE4uZDl4VlNOdA$ROXEFUfBp0lSC0cfGPa+q4FewQq+BEnuj1qgyI3seZA', 'v4MsOz8hcaAF53qHPIdQeugw9EStNWjkZCXLBb1ypVlm2fi-GnxKRDU6JT_7Yro0v4MsOz8hcaAF53qHPIdQeugw9EStNWjkZCXLBb1ypVlm2fi-GnxKRDU6JT_7Yro0v4MsOz8hcaAF53qHPIdQeugw9EStNWjkZCXLBb1ypVlm2fi-GnxKRDU6JT_7Yro0v4MsOz8hcaAF53qHPIdQeugw9EStNWjkZCXLBb1ypVlm2fi-GnxKRDU6JT_7Yro0', '62', '62@mail.net', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:12'),
	(124, 2, 1, '63', '$argon2id$v=19$m=1024,t=2,p=2$N2xnQTE4RElwMU5TYjZ1cQ$4MRuSGVOo6MBjkmNdKWupzaX8pFWxwBmjD7FIoNYkmY', 'ZEcykUKHDfh7FCLxqPV3Iod59eivs8tROuTzplNmGwMaSnWr_1J6B4b2-AgX0jQYZEcykUKHDfh7FCLxqPV3Iod59eivs8tROuTzplNmGwMaSnWr_1J6B4b2-AgX0jQYZEcykUKHDfh7FCLxqPV3Iod59eivs8tROuTzplNmGwMaSnWr_1J6B4b2-AgX0jQYZEcykUKHDfh7FCLxqPV3Iod59eivs8tROuTzplNmGwMaSnWr_1J6B4b2-AgX0jQY', '63', '63@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:37'),
	(125, 2, 1, '64', '$argon2id$v=19$m=1024,t=2,p=2$ZXJpNnV1Y25HY3lrWG9Xbg$n263DpHmNgj/5LqYNRRj8jfNakEZAUMinpt0dnOoq/0', 'hf4mwJIU1l8qni3PbGQOSkWyExuM79t0aAF6g-NVcHvoDXZjz_KedYpLsrT2C5BRhf4mwJIU1l8qni3PbGQOSkWyExuM79t0aAF6g-NVcHvoDXZjz_KedYpLsrT2C5BRhf4mwJIU1l8qni3PbGQOSkWyExuM79t0aAF6g-NVcHvoDXZjz_KedYpLsrT2C5BRhf4mwJIU1l8qni3PbGQOSkWyExuM79t0aAF6g-NVcHvoDXZjz_KedYpLsrT2C5BR', '64', '64@mail.net', NULL, NULL, 'Banyumanik', 'default.jpg', 0, '2019-10-17 01:52:54'),
	(126, 2, 1, '65', '$argon2id$v=19$m=1024,t=2,p=2$N0Z5d2E4SDFHSkVEaS9PTg$hEcJ8ZIpZzPkl+pnQd0wzYKQH1c+ni5Sx0Ibs6jjY4A', 'S_j5DFXwkzQ2NtgyIi09mAv3ZPc7fOCrLn-oYUBRuHseqd1EGKM4aVT6xpblWJh8S_j5DFXwkzQ2NtgyIi09mAv3ZPc7fOCrLn-oYUBRuHseqd1EGKM4aVT6xpblWJh8S_j5DFXwkzQ2NtgyIi09mAv3ZPc7fOCrLn-oYUBRuHseqd1EGKM4aVT6xpblWJh8S_j5DFXwkzQ2NtgyIi09mAv3ZPc7fOCrLn-oYUBRuHseqd1EGKM4aVT6xpblWJh8', '65', '65@mail.net', NULL, NULL, 'Candisari', 'default.jpg', 0, '2019-10-17 01:54:59'),
	(127, 2, 1, '66', '$argon2id$v=19$m=1024,t=2,p=2$QVhxcmw0MkhRUnFJWUtSUQ$3WcVaPNabX4sIbUC+UymnMCfKLBEQsqYwI/CbVCn/nk', 'YmbBJwDa7KrxdnIHCtQPZy20ckGOoXS-FNL3_igUpRAvfW1jEslzV5eh49M8q6TuYmbBJwDa7KrxdnIHCtQPZy20ckGOoXS-FNL3_igUpRAvfW1jEslzV5eh49M8q6TuYmbBJwDa7KrxdnIHCtQPZy20ckGOoXS-FNL3_igUpRAvfW1jEslzV5eh49M8q6TuYmbBJwDa7KrxdnIHCtQPZy20ckGOoXS-FNL3_igUpRAvfW1jEslzV5eh49M8q6Tu', '66', '66@mail.net', NULL, NULL, 'Candisari', 'default.jpg', 0, '2019-10-17 01:54:59'),
	(128, 2, 1, '67', '$argon2id$v=19$m=1024,t=2,p=2$MW9URzhwRGN0V2JtdFBFUg$wS8lmZH4WamHVpVst2GE7GdNrsedh3T0xgwgTeU0KF4', '9OMc8oKguQEe2swtlAIbGvLFfBmR-XJHYN14n3rCkDyZUSTah5xdqVjz07WpiP6_9OMc8oKguQEe2swtlAIbGvLFfBmR-XJHYN14n3rCkDyZUSTah5xdqVjz07WpiP6_9OMc8oKguQEe2swtlAIbGvLFfBmR-XJHYN14n3rCkDyZUSTah5xdqVjz07WpiP6_9OMc8oKguQEe2swtlAIbGvLFfBmR-XJHYN14n3rCkDyZUSTah5xdqVjz07WpiP6_', '67', '67@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:08:45'),
	(129, 2, 1, '68', '$argon2id$v=19$m=1024,t=2,p=2$WVYvNFVrbks2Y09EUW9TSw$YnxRaSKx2YzblcTfSzA1XeE4jkQteeee+3JyYMDcfbc', 'y0mOjCia7HZ4BUnLcKsDueRvQ_WgFtVN9hTE183PXxSlG6AIY-oqpwkrJM2dbzf5y0mOjCia7HZ4BUnLcKsDueRvQ_WgFtVN9hTE183PXxSlG6AIY-oqpwkrJM2dbzf5y0mOjCia7HZ4BUnLcKsDueRvQ_WgFtVN9hTE183PXxSlG6AIY-oqpwkrJM2dbzf5y0mOjCia7HZ4BUnLcKsDueRvQ_WgFtVN9hTE183PXxSlG6AIY-oqpwkrJM2dbzf5', '68', '68@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(130, 2, 1, '69', '$argon2id$v=19$m=1024,t=2,p=2$dVlrSmFPTWdUOE1XSmQyTA$dsR5uADD6aJcKY1ymQieyjTRc+hSEVyF1hSgB+EImfA', '4fHCo96-U8APirlMpa0EXxIGz_gSjOK2bkhdqeYRNWvV7s3mBZJTtQ1DnywLFc5u4fHCo96-U8APirlMpa0EXxIGz_gSjOK2bkhdqeYRNWvV7s3mBZJTtQ1DnywLFc5u4fHCo96-U8APirlMpa0EXxIGz_gSjOK2bkhdqeYRNWvV7s3mBZJTtQ1DnywLFc5u4fHCo96-U8APirlMpa0EXxIGz_gSjOK2bkhdqeYRNWvV7s3mBZJTtQ1DnywLFc5u', '69', '69@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:38'),
	(131, 2, 1, '70', '$argon2id$v=19$m=1024,t=2,p=2$MDB5RldTMUNtMnBJckdNQw$/OE+HRtZlfk9aSCoGmjK7jvM7Oaw96hOx5i9s09Czw8', 'xVt-MdleYGknmK_3UQqigruDf6RXIhPNZC29FpAv0SszoyW1O4aL5BjJ8Ewb7HTcxVt-MdleYGknmK_3UQqigruDf6RXIhPNZC29FpAv0SszoyW1O4aL5BjJ8Ewb7HTcxVt-MdleYGknmK_3UQqigruDf6RXIhPNZC29FpAv0SszoyW1O4aL5BjJ8Ewb7HTcxVt-MdleYGknmK_3UQqigruDf6RXIhPNZC29FpAv0SszoyW1O4aL5BjJ8Ewb7HTc', '70', '70@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(132, 2, 1, '71', '$argon2id$v=19$m=1024,t=2,p=2$Qml5VU5uMk9IU1MuQXFyYg$kcd2fK51n8OdbCDfl3aw6wv/1oU/qh6QdZNcAuL+2Ho', 'CUQ3gB9_othkYJase07OcLZ6-wlRIS4AqzXFvWdbmPpr25NjTnxVGMEK18fDyHiuCUQ3gB9_othkYJase07OcLZ6-wlRIS4AqzXFvWdbmPpr25NjTnxVGMEK18fDyHiuCUQ3gB9_othkYJase07OcLZ6-wlRIS4AqzXFvWdbmPpr25NjTnxVGMEK18fDyHiuCUQ3gB9_othkYJase07OcLZ6-wlRIS4AqzXFvWdbmPpr25NjTnxVGMEK18fDyHiu', '71', '71@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:08:47'),
	(133, 2, 1, '72', '$argon2id$v=19$m=1024,t=2,p=2$WmVISG4xdTA4a3VDNjBzWQ$/3sGOIkARcbNaG44n5kc47oUZ0DGl/T4bJDW4IrOJp0', 'xDSoFnhYdLwUXfRrtju1blBciIV-E_N5WAG09aMQKz8Jy64mTpeCvk73g2sOqZPHxDSoFnhYdLwUXfRrtju1blBciIV-E_N5WAG09aMQKz8Jy64mTpeCvk73g2sOqZPHxDSoFnhYdLwUXfRrtju1blBciIV-E_N5WAG09aMQKz8Jy64mTpeCvk73g2sOqZPHxDSoFnhYdLwUXfRrtju1blBciIV-E_N5WAG09aMQKz8Jy64mTpeCvk73g2sOqZPH', '72', '72@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:08:48'),
	(134, 2, 1, '73', '$argon2id$v=19$m=1024,t=2,p=2$L3lLamhOOGdzcWFvaU0yRA$8sa/TLAab1gGNTYwD1B1t+HQNbubbir8smdkmzaOLIc', '0PLyNrlRQYS5eg1nkDKxfBbAJM_oITd-Oq47wcEzajWFsXGtpHm689UVuhCi32vZ0PLyNrlRQYS5eg1nkDKxfBbAJM_oITd-Oq47wcEzajWFsXGtpHm689UVuhCi32vZ0PLyNrlRQYS5eg1nkDKxfBbAJM_oITd-Oq47wcEzajWFsXGtpHm689UVuhCi32vZ0PLyNrlRQYS5eg1nkDKxfBbAJM_oITd-Oq47wcEzajWFsXGtpHm689UVuhCi32vZ', '73', '73@mail.net', NULL, NULL, 'Gunungpati', 'default.jpg', 0, '2019-10-17 01:54:13'),
	(135, 2, 1, '74', '$argon2id$v=19$m=1024,t=2,p=2$OWZJOTd5Ty9Obm5nMkt4UA$PDbxjOYo1jd1ObLbnUaapnFGQkujXv4zXlMlCYJvjqg', 'ZqmbLwO-IXv1r8fgBoyHzDR7kJPp9utNishETl35C_e0xVFcYUnQjGMW46AKd2aSZqmbLwO-IXv1r8fgBoyHzDR7kJPp9utNishETl35C_e0xVFcYUnQjGMW46AKd2aSZqmbLwO-IXv1r8fgBoyHzDR7kJPp9utNishETl35C_e0xVFcYUnQjGMW46AKd2aSZqmbLwO-IXv1r8fgBoyHzDR7kJPp9utNishETl35C_e0xVFcYUnQjGMW46AKd2aS', '74', '74@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(136, 2, 1, '75', '$argon2id$v=19$m=1024,t=2,p=2$aTlZOUJBQWo5VlBvUnlJQQ$BWIxdJIh7mmAAYtxX3k1VSuiaiD/ZlQTfOEYq76dvuY', 'Ecj-LSTroZWReyJw_OF6AYfXMhgb40tGvBPzQdinUa1mu98kVD5x2l3HIpKq7NCsEcj-LSTroZWReyJw_OF6AYfXMhgb40tGvBPzQdinUa1mu98kVD5x2l3HIpKq7NCsEcj-LSTroZWReyJw_OF6AYfXMhgb40tGvBPzQdinUa1mu98kVD5x2l3HIpKq7NCsEcj-LSTroZWReyJw_OF6AYfXMhgb40tGvBPzQdinUa1mu98kVD5x2l3HIpKq7NCs', '75', '75@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(137, 2, 1, '76', '$argon2id$v=19$m=1024,t=2,p=2$bTFSVlhEUXJha2FCS2NpdA$ICQm8t7QP394PE7rnxkMTGJtyKJ8nc/DKQ9i9SkBjlk', 'TwP3ZIVjCafiSWnEzNleMb6yAqcYK25r0tvgFhx794G1_8d-DBRpUJHLmQOksuoXTwP3ZIVjCafiSWnEzNleMb6yAqcYK25r0tvgFhx794G1_8d-DBRpUJHLmQOksuoXTwP3ZIVjCafiSWnEzNleMb6yAqcYK25r0tvgFhx794G1_8d-DBRpUJHLmQOksuoXTwP3ZIVjCafiSWnEzNleMb6yAqcYK25r0tvgFhx794G1_8d-DBRpUJHLmQOksuoX', '76', '76@mail.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:36'),
	(138, 2, 1, '77', '$argon2id$v=19$m=1024,t=2,p=2$dXhNZ0lVanVMall2L2R5dA$V9Zo5aXvudte3IPEqXWD/a1NJkiB4//1mL3o77fjvvs', '0NonsP2KUH6cVJbtAMkr43Gfg5vSL7Eq-TY_1weuZm9IjXD8RFzWOaldQxiyhpBC0NonsP2KUH6cVJbtAMkr43Gfg5vSL7Eq-TY_1weuZm9IjXD8RFzWOaldQxiyhpBC0NonsP2KUH6cVJbtAMkr43Gfg5vSL7Eq-TY_1weuZm9IjXD8RFzWOaldQxiyhpBC0NonsP2KUH6cVJbtAMkr43Gfg5vSL7Eq-TY_1weuZm9IjXD8RFzWOaldQxiyhpBC', '77', '77@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(139, 2, 1, '78', '$argon2id$v=19$m=1024,t=2,p=2$c0F6MWxCZjViTmVoMEIzdA$wgZnWqoPC8zogRdDYIshTsSxW+weSmLi3ZyVtIHylr8', '9wjA203GBCoamv5fWudyT-Hxc4MgZkerbYPNF_UOESsDti1hLX76qKnlpzJ8RQVI9wjA203GBCoamv5fWudyT-Hxc4MgZkerbYPNF_UOESsDti1hLX76qKnlpzJ8RQVI9wjA203GBCoamv5fWudyT-Hxc4MgZkerbYPNF_UOESsDti1hLX76qKnlpzJ8RQVI9wjA203GBCoamv5fWudyT-Hxc4MgZkerbYPNF_UOESsDti1hLX76qKnlpzJ8RQVI', '78', '78@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:40'),
	(140, 2, 1, '79', '$argon2id$v=19$m=1024,t=2,p=2$TVlJLmUuZ0IwVzJVbUpvdw$nkQFf7uRvR1C5fCIZfbCaCk4o/ArPCh6vxdODDbGHg8', '92Iv8pkBcmPuUhLNzati-HOSMxY6swV5QAWd_El41ReJbZno7gjqryKf0DCF3GTX92Iv8pkBcmPuUhLNzati-HOSMxY6swV5QAWd_El41ReJbZno7gjqryKf0DCF3GTX92Iv8pkBcmPuUhLNzati-HOSMxY6swV5QAWd_El41ReJbZno7gjqryKf0DCF3GTX92Iv8pkBcmPuUhLNzati-HOSMxY6swV5QAWd_El41ReJbZno7gjqryKf0DCF3GTX', '79', '79@mail.net', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:12'),
	(141, 2, 1, '80', '$argon2id$v=19$m=1024,t=2,p=2$Ti5hZ0dJeEVtb0xQd0k0OQ$eoH1eeKQ0EKnZ/JXO1boLH8tvUYSAiL72B3behDFIcY', 'FSAvmtzlHeqWiC61x_Eg8O0-dXVP4MkG5ypQJhRIKcTfa7LjnYZ9UNDswu2Bobr3FSAvmtzlHeqWiC61x_Eg8O0-dXVP4MkG5ypQJhRIKcTfa7LjnYZ9UNDswu2Bobr3FSAvmtzlHeqWiC61x_Eg8O0-dXVP4MkG5ypQJhRIKcTfa7LjnYZ9UNDswu2Bobr3FSAvmtzlHeqWiC61x_Eg8O0-dXVP4MkG5ypQJhRIKcTfa7LjnYZ9UNDswu2Bobr3', '80', '80@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:45'),
	(142, 2, 1, '81', '$argon2id$v=19$m=1024,t=2,p=2$NDRkeEF6NFp1L3NUbHguNQ$CALP18gb2H7X3nzUYX8IejAfD1ZvOsIKzdcq7o0Q9Oc', 'mlF8nSxMPVyp29RtAurjdIgoBY-5aiZGhEOvXLUszW6efbwJCc370DkKQq1_4NTHmlF8nSxMPVyp29RtAurjdIgoBY-5aiZGhEOvXLUszW6efbwJCc370DkKQq1_4NTHmlF8nSxMPVyp29RtAurjdIgoBY-5aiZGhEOvXLUszW6efbwJCc370DkKQq1_4NTHmlF8nSxMPVyp29RtAurjdIgoBY-5aiZGhEOvXLUszW6efbwJCc370DkKQq1_4NTH', '81', '81@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:41'),
	(143, 2, 1, '82', '$argon2id$v=19$m=1024,t=2,p=2$Ykw2MXIzcldra1V5WU0xSQ$cyP0+5ncKYzca7Q23Zlij6QckUH5+gZ2z5TRYrta+Ro', 'PqZ91iQEawIktR7gCDKJnSx46WFz85fLly_uVGjcsT3NHOUYA0BdeX-rM2vpohmbPqZ91iQEawIktR7gCDKJnSx46WFz85fLly_uVGjcsT3NHOUYA0BdeX-rM2vpohmbPqZ91iQEawIktR7gCDKJnSx46WFz85fLly_uVGjcsT3NHOUYA0BdeX-rM2vpohmbPqZ91iQEawIktR7gCDKJnSx46WFz85fLly_uVGjcsT3NHOUYA0BdeX-rM2vpohmb', '82', '82@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:08:56'),
	(144, 2, 1, '83', '$argon2id$v=19$m=1024,t=2,p=2$MVd5aDJLN3ExaTh3dkRoNQ$bkwwioC8vdgOahMFODDoTC8sZIVyJ+trdE1+LGgLhhc', '0_a9tlTyPxsr6vCuwGmIb4VNqXhkU5WFZRDEe-AgJcdfY8zSo1OLQ3nipHBjK27M0_a9tlTyPxsr6vCuwGmIb4VNqXhkU5WFZRDEe-AgJcdfY8zSo1OLQ3nipHBjK27M0_a9tlTyPxsr6vCuwGmIb4VNqXhkU5WFZRDEe-AgJcdfY8zSo1OLQ3nipHBjK27M0_a9tlTyPxsr6vCuwGmIb4VNqXhkU5WFZRDEe-AgJcdfY8zSo1OLQ3nipHBjK27M', '83', '83@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:43'),
	(145, 2, 1, '84', '$argon2id$v=19$m=1024,t=2,p=2$c1AwZ0FYTDQ5LmoyQUUzcg$apNMjpJ5cTJ7qR3JTyUf/1Wt7RRn+sk/5uPlQoOokgs', 'w9zDcQmJG5jI8e6bTXOqhdC4HiUlYEksPuLSZ3MWt-r7pg0x2VKfonaAyB_NF1vRw9zDcQmJG5jI8e6bTXOqhdC4HiUlYEksPuLSZ3MWt-r7pg0x2VKfonaAyB_NF1vRw9zDcQmJG5jI8e6bTXOqhdC4HiUlYEksPuLSZ3MWt-r7pg0x2VKfonaAyB_NF1vRw9zDcQmJG5jI8e6bTXOqhdC4HiUlYEksPuLSZ3MWt-r7pg0x2VKfonaAyB_NF1vR', '84', '84@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:09:01'),
	(146, 2, 1, '85', '$argon2id$v=19$m=1024,t=2,p=2$NlNmT0VYaGpRRy5ocW5UYw$4Fa20EzuVRu1HEdNajJBwlbAB9irlo0EpwhRCLCf3Rc', 'wYpgNrhitGsxdK7R_3yHJ96qIeacXu8OW4lfC1FPQnBSoLvTM0-AbzDEkmZ5UjV2wYpgNrhitGsxdK7R_3yHJ96qIeacXu8OW4lfC1FPQnBSoLvTM0-AbzDEkmZ5UjV2wYpgNrhitGsxdK7R_3yHJ96qIeacXu8OW4lfC1FPQnBSoLvTM0-AbzDEkmZ5UjV2wYpgNrhitGsxdK7R_3yHJ96qIeacXu8OW4lfC1FPQnBSoLvTM0-AbzDEkmZ5UjV2', '85', '85@mail.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:40'),
	(147, 2, 1, '86', '$argon2id$v=19$m=1024,t=2,p=2$RkY1cFp3dkJuRlNGTFBKLw$PDd0yZGSwApB/mW9/1VrSvP5Dbgg11UL92DEiIiT7EY', 'm4yG5EZ2ebsBNC0wci6ogHUFX1MPpD3LrYAWjIauhkv7lSVK9zRtd8OnT-xqJfQ_m4yG5EZ2ebsBNC0wci6ogHUFX1MPpD3LrYAWjIauhkv7lSVK9zRtd8OnT-xqJfQ_m4yG5EZ2ebsBNC0wci6ogHUFX1MPpD3LrYAWjIauhkv7lSVK9zRtd8OnT-xqJfQ_m4yG5EZ2ebsBNC0wci6ogHUFX1MPpD3LrYAWjIauhkv7lSVK9zRtd8OnT-xqJfQ_', '86', '86@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:08'),
	(148, 2, 1, '87', '$argon2id$v=19$m=1024,t=2,p=2$a3NieUpmLy5oSHZCdklwSg$Cv2uuew2naIDATSklCJHwqFrOuQebFIDpubyNVzxDcI', 'SAK8mUsvERgpcB7WCVzTqMirXN0OeLo5JyDHaIdFbxh96jt24ln-wuGQk_f1ZYP3SAK8mUsvERgpcB7WCVzTqMirXN0OeLo5JyDHaIdFbxh96jt24ln-wuGQk_f1ZYP3SAK8mUsvERgpcB7WCVzTqMirXN0OeLo5JyDHaIdFbxh96jt24ln-wuGQk_f1ZYP3SAK8mUsvERgpcB7WCVzTqMirXN0OeLo5JyDHaIdFbxh96jt24ln-wuGQk_f1ZYP3', '87', '87@mail.net', NULL, NULL, 'Ngaliyan', 'default.jpg', 0, '2019-10-17 01:52:15'),
	(149, 2, 1, '88', '$argon2id$v=19$m=1024,t=2,p=2$UlhYeHNncFJ4aS9NRFNPcA$YKqXzhz+OW9K8iZdaq6dAvcCd+9XSK7SWqxF6nh95Vc', 'Q624_Xmu-IScsPvKDxCqrZgOtVEiA7jH9LoWR0wMaGzfyJdeUYn835hNkbTFpl1BQ624_Xmu-IScsPvKDxCqrZgOtVEiA7jH9LoWR0wMaGzfyJdeUYn835hNkbTFpl1BQ624_Xmu-IScsPvKDxCqrZgOtVEiA7jH9LoWR0wMaGzfyJdeUYn835hNkbTFpl1BQ624_Xmu-IScsPvKDxCqrZgOtVEiA7jH9LoWR0wMaGzfyJdeUYn835hNkbTFpl1B', '88', '88@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:09:06'),
	(150, 2, 1, '89', '$argon2id$v=19$m=1024,t=2,p=2$dFlqWnV3OUZyT2FiSHZHNQ$EBtm10+fRXdyfBEEHBnFnIXrgSCH78ON4k7B87AbSss', 'hzGp8tx-sETaKZf1oJ9UIRyeWlFrNwM4kcjCbiB6v2ALdS_qY5OuXVgm7HP3Dn0QhzGp8tx-sETaKZf1oJ9UIRyeWlFrNwM4kcjCbiB6v2ALdS_qY5OuXVgm7HP3Dn0QhzGp8tx-sETaKZf1oJ9UIRyeWlFrNwM4kcjCbiB6v2ALdS_qY5OuXVgm7HP3Dn0QhzGp8tx-sETaKZf1oJ9UIRyeWlFrNwM4kcjCbiB6v2ALdS_qY5OuXVgm7HP3Dn0Q', '89', '89@mail.net', NULL, NULL, 'Semarang Timur', 'default.jpg', 0, '2019-10-17 01:35:46'),
	(151, 2, 1, '90', '$argon2id$v=19$m=1024,t=2,p=2$SU1Pck9HOWovSExZTUV2Mw$4bvi611y90oRkqhVzpCHnP6KrSfLsxY4GP36b8nZh2g', 'pOtW2TmKUZ6f4nQykDidxeAHqvXojBFCI83ulsc0wMaJrPzbh57_gLR1N9-VEGSYpOtW2TmKUZ6f4nQykDidxeAHqvXojBFCI83ulsc0wMaJrPzbh57_gLR1N9-VEGSYpOtW2TmKUZ6f4nQykDidxeAHqvXojBFCI83ulsc0wMaJrPzbh57_gLR1N9-VEGSYpOtW2TmKUZ6f4nQykDidxeAHqvXojBFCI83ulsc0wMaJrPzbh57_gLR1N9-VEGSY', '90', '90@mail.net', NULL, NULL, 'Banyumanik', 'default.jpg', 0, '2019-10-17 01:52:55'),
	(152, 2, 1, '91', '$argon2id$v=19$m=1024,t=2,p=2$RlR3cFdDcUhzS0JhNTMzbw$soqnaK/MnGSA1vposxBCxk7jQALM6ZXFY8c3Ef4gb/o', 'X5Bx2Hqn_jIv68YTRDpG-7rZFWC4OfcU3KQLw1dSNzyMJlae0itmguh9osEbVkPAX5Bx2Hqn_jIv68YTRDpG-7rZFWC4OfcU3KQLw1dSNzyMJlae0itmguh9osEbVkPAX5Bx2Hqn_jIv68YTRDpG-7rZFWC4OfcU3KQLw1dSNzyMJlae0itmguh9osEbVkPAX5Bx2Hqn_jIv68YTRDpG-7rZFWC4OfcU3KQLw1dSNzyMJlae0itmguh9osEbVkPA', '91', '91@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:09:08'),
	(153, 2, 1, '92', '$argon2id$v=19$m=1024,t=2,p=2$dFFic1BsWjJ4MmJoM0xtNA$xFADMLrwbp2acJKw6XAAGBL0bt+yAUSX/3Ydwgipui0', 'lckaudSFUrDAL35WRwCh0BG_et7M-6f1NHXQxKYo8ibnZ4p9jsOIzEJgPTqVvy2mlckaudSFUrDAL35WRwCh0BG_et7M-6f1NHXQxKYo8ibnZ4p9jsOIzEJgPTqVvy2mlckaudSFUrDAL35WRwCh0BG_et7M-6f1NHXQxKYo8ibnZ4p9jsOIzEJgPTqVvy2mlckaudSFUrDAL35WRwCh0BG_et7M-6f1NHXQxKYo8ibnZ4p9jsOIzEJgPTqVvy2m', '92', '92@mail.net', NULL, NULL, 'Gunungpati', 'default.jpg', 0, '2019-10-17 01:54:16'),
	(154, 2, 1, '93', '$argon2id$v=19$m=1024,t=2,p=2$ZGZzbDBCOTI5V2dtSnZFMQ$Pu3/kgalexsFxVHIb1FMA4nxqE6iXbDcrbXrtD7PMus', 'Wbe_mSJvRP2Fhq0-O5GLYcIXMikQClBn8adH93gfoAZrjUuwpDtzx1EsV7TKN6y4Wbe_mSJvRP2Fhq0-O5GLYcIXMikQClBn8adH93gfoAZrjUuwpDtzx1EsV7TKN6y4Wbe_mSJvRP2Fhq0-O5GLYcIXMikQClBn8adH93gfoAZrjUuwpDtzx1EsV7TKN6y4Wbe_mSJvRP2Fhq0-O5GLYcIXMikQClBn8adH93gfoAZrjUuwpDtzx1EsV7TKN6y4', '93', '93@mail.net', NULL, NULL, 'Mijen', 'default.jpg', 0, '2019-10-17 01:51:48'),
	(155, 2, 1, '94', '$argon2id$v=19$m=1024,t=2,p=2$eXlmcFZXN001RjgwVWpCQg$+rJ1BVveEl5/1SYigvjowNBeDoUqB9J4CTDTtrzMNs4', 'J0liA_tQZvz3Pe2u1jrgmUbOLSV9s8khKMd57HRInB6X4oFwT-ypYqfaNCxWEcDGJ0liA_tQZvz3Pe2u1jrgmUbOLSV9s8khKMd57HRInB6X4oFwT-ypYqfaNCxWEcDGJ0liA_tQZvz3Pe2u1jrgmUbOLSV9s8khKMd57HRInB6X4oFwT-ypYqfaNCxWEcDGJ0liA_tQZvz3Pe2u1jrgmUbOLSV9s8khKMd57HRInB6X4oFwT-ypYqfaNCxWEcDG', '94', '94@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:09:18'),
	(156, 2, 1, '95', '$argon2id$v=19$m=1024,t=2,p=2$OHIxcW1jbEVLLjFrM2FBNg$wINBNql0qJWGwdDa8M0y8pqQqySlEtYbzD5Vdeu8zMs', 'KJCR0tNElTWXyze7YshfGS-xOZ6m5pdcwbvMPU9n2Aa183I4rLDoiBHVgqQF_jkuKJCR0tNElTWXyze7YshfGS-xOZ6m5pdcwbvMPU9n2Aa183I4rLDoiBHVgqQF_jkuKJCR0tNElTWXyze7YshfGS-xOZ6m5pdcwbvMPU9n2Aa183I4rLDoiBHVgqQF_jkuKJCR0tNElTWXyze7YshfGS-xOZ6m5pdcwbvMPU9n2Aa183I4rLDoiBHVgqQF_jku', '95', '95@mail.net', NULL, NULL, 'Pedurungan', 'default.jpg', 0, '2019-10-17 01:50:18'),
	(157, 2, 1, '96', '$argon2id$v=19$m=1024,t=2,p=2$OGxGb3hmaTcwbFlaWElNYw$Mpg2fTCez+6hEaVFY0BEF/WsguDnVMTef28CObtIoeA', 'AHCgdEfTj7xhD4Iwnpiy2u0Zzl-rqtOM1SmVQKokvJL8cYUG6aP3WX_RbBF95seNAHCgdEfTj7xhD4Iwnpiy2u0Zzl-rqtOM1SmVQKokvJL8cYUG6aP3WX_RbBF95seNAHCgdEfTj7xhD4Iwnpiy2u0Zzl-rqtOM1SmVQKokvJL8cYUG6aP3WX_RbBF95seNAHCgdEfTj7xhD4Iwnpiy2u0Zzl-rqtOM1SmVQKokvJL8cYUG6aP3WX_RbBF95seN', '96', '96@mail.net', NULL, NULL, 'Tembalang', 'default.jpg', 0, '2019-10-17 01:09:19'),
	(158, 2, 1, '97', '$argon2id$v=19$m=1024,t=2,p=2$YkM5bm1EV3hnV1FzOUM3MA$z3z5Nxt2XEsKFn1QXrmQJCyS2glkIKSXdzXR4lBiSs0', 'n_lP-sgMdyv5Jr9VebaO0HCiAxTwjt6ISZp28zFfGKN7LU3DQYWEohk1quXcB4Rmn_lP-sgMdyv5Jr9VebaO0HCiAxTwjt6ISZp28zFfGKN7LU3DQYWEohk1quXcB4Rmn_lP-sgMdyv5Jr9VebaO0HCiAxTwjt6ISZp28zFfGKN7LU3DQYWEohk1quXcB4Rmn_lP-sgMdyv5Jr9VebaO0HCiAxTwjt6ISZp28zFfGKN7LU3DQYWEohk1quXcB4Rm', '97', '97@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:09:20'),
	(159, 2, 1, '98', '$argon2id$v=19$m=1024,t=2,p=2$ZloxL0Rpc2txb0NKNUFIYg$TjYbv7oDsLXkZVSOeAZXkI78aaGZ3Ux1mr5R08ogbFY', 'act0Ev6l3RhsOYjei49L_bXIV7CyuUBr8gp1PT-H5WFKJSwdzfDx2qkmAoMQZnNGact0Ev6l3RhsOYjei49L_bXIV7CyuUBr8gp1PT-H5WFKJSwdzfDx2qkmAoMQZnNGact0Ev6l3RhsOYjei49L_bXIV7CyuUBr8gp1PT-H5WFKJSwdzfDx2qkmAoMQZnNGact0Ev6l3RhsOYjei49L_bXIV7CyuUBr8gp1PT-H5WFKJSwdzfDx2qkmAoMQZnNG', '98', '98@mail.net', NULL, NULL, 'Semarang Utara', 'default.jpg', 0, '2019-10-17 01:09:20'),
	(160, 2, 1, '99', '$argon2id$v=19$m=1024,t=2,p=2$N1VpMkJtQk5jNmpkRkl0YQ$xODySU90XWO5xMROt20ASP4CLUytpfQnW+h06DP+B/s', 'K4zQXtwAp9_rRNvxl8h1OfVPjJbS2eqUFksuYZdDoHgn53T6IBi07ME-GCWyLmcaK4zQXtwAp9_rRNvxl8h1OfVPjJbS2eqUFksuYZdDoHgn53T6IBi07ME-GCWyLmcaK4zQXtwAp9_rRNvxl8h1OfVPjJbS2eqUFksuYZdDoHgn53T6IBi07ME-GCWyLmcaK4zQXtwAp9_rRNvxl8h1OfVPjJbS2eqUFksuYZdDoHgn53T6IBi07ME-GCWyLmca', '99', '99@mail.net', NULL, NULL, 'Semarang Barat', 'default.jpg', 0, '2019-10-17 01:34:44'),
	(161, 2, 1, '100', '$argon2id$v=19$m=1024,t=2,p=2$cEhDWVl4U3dBVFUuNDdzZw$5wDgD5X8eg2LgR4sFbMWHjBDnT4eEDppWaly2owqeWc', '56vrbSauKTBZcfJMz-Rs109AViEUtWFCHO7pweN8oLnD2khIGP4yxXjg_lYQq3dm56vrbSauKTBZcfJMz-Rs109AViEUtWFCHO7pweN8oLnD2khIGP4yxXjg_lYQq3dm56vrbSauKTBZcfJMz-Rs109AViEUtWFCHO7pweN8oLnD2khIGP4yxXjg_lYQq3dm56vrbSauKTBZcfJMz-Rs109AViEUtWFCHO7pweN8oLnD2khIGP4yxXjg_lYQq3dm', '100', '100@mail.net', NULL, NULL, 'Candisari', 'default.jpg', 0, '2019-10-17 01:55:01');
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
