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
	(2, 4, 'Active', 'picollococo', 'pico@gmas.com', '87897894654213', '   wakwaw ', 'pco', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-17 17:03:31'),
	(3, 4, 'Active', 'miasda', 'nmasd@gmail.com', '654564', 'uweeesss', 'mimi', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2019-03-17 17:07:30');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.bahasa: ~1 rows (approximately)
/*!40000 ALTER TABLE `bahasa` DISABLE KEYS */;
INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
	(1, 'K01', 'Bahasa Kalbu', '  ', 1, '2019-03-22 18:44:01');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.berita: ~5 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
	(1, 4, 'iwak-e-nyebur-sumur-tandas', 'iwak e nyebur sumur tandas', '<p>asdasdasd asd</p>', 'kandang-ternak-kenari-siste5.jpg', 'Publish', 'Berita', '2019-03-25 13:24:14'),
	(4, 4, 'hard-work', 'Hard Work', '<p>Hard work is but one of the ways you can achieve your goals. For those of us who aren&rsquo;t inordinately&nbsp;<a href="https://www.primermagazine.com/2011/learn/the-only-4-reasons-why-your-peers-are-more-successful-than-you">wealthy, smart, or lucky</a>, it&rsquo;s the only way. While each person&rsquo;s path to success will be unique, the anatomy of the hard work that they do often looks very similar.</p>', 'b1.jpg', 'Publish', 'Slide', '2019-03-25 13:31:57'),
	(5, 4, 'study', 'Study', '<p><span class="ind">The devotion of time and attention to gaining knowledge of an academic subject, especially by means of books.</span></p>', 'b2.jpg', 'Publish', 'Slide', '2019-03-25 13:30:29'),
	(6, 4, 'class', 'Class', '<p>Learning is the process of acquiring new, or modifying existing, <span style="text-decoration: underline;"><a title="Knowledge" href="https://en.wikipedia.org/wiki/Knowledge">knowledge</a></span>, <span style="text-decoration: underline;"><a title="Behavior" href="https://en.wikipedia.org/wiki/Behavior">behaviors</a>, </span><a title="Skill" href="https://en.wikipedia.org/wiki/Skill">skills</a>, <a class="mw-redirect" title="Value (personal and cultural)" href="https://en.wikipedia.org/wiki/Value_(personal_and_cultural)">values</a>, or <a title="Preference" href="https://en.wikipedia.org/wiki/Preference">preferences</a>.<sup id="cite_ref-1" class="reference"></sup></p>', 'b3.jpg', 'Publish', 'Slide', '2019-03-25 13:34:21'),
	(7, 4, 'sayur-kol', 'Sayur Kol', '<p>Makan daging teman dengan sayur kol</p>', 'Sabyan_Gambus_Nissa_Sabyan_1548167665.jpeg', 'Publish', 'Berita', '2019-03-25 16:41:34');
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
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.buku: ~8 rows (approximately)
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `no_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
	(5, 4, 3, 1, 'Ilmu Pengetahuan Sosial', 'Nur Wahyu Rochmadi', 'Sekolah Menengah Kejuruan', '', 'IPSJD1', 11, 'Buku Sekolah Elektronik (BSE)', '2004', '123xr3', 'Publish', 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.\r\n\r\nA small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.', 'ips.jpg', 20, '2019-03-22 20:14:19', '2019-03-28 08:58:55'),
	(6, 4, 3, 1, 'Dasar Kewirausahaan', 'Ir. Hendro', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212035154.jpg', 0, '2019-03-23 14:33:09', '2019-03-23 13:33:09'),
	(7, 4, 3, 1, 'PHP Modul', 'Teguh Wahyono', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212145310.jpg', 0, '2019-03-25 18:10:31', '2019-03-25 17:10:31'),
	(8, 4, 3, 1, 'Pengantar Teknologi Informasi', 'Eddy Sutanta', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209044244.jpg', 0, '2019-03-25 18:11:29', '2019-03-25 17:11:29'),
	(9, 4, 3, 1, 'Kamus Istilah Internet', 'wang cun', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170212080423.jpg', 0, '2019-03-25 18:12:13', '2019-03-25 17:12:13'),
	(10, 4, 3, 1, 'Kamus Matematika', 'ario', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170207102926.jpg', 0, '2019-03-25 18:12:56', '2019-03-25 17:12:56'),
	(11, 4, 3, 1, 'E-Learning', 'mario', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209050821.jpg', 0, '2019-03-25 18:13:39', '2019-03-25 17:13:39'),
	(12, 4, 3, 1, 'Algoritma C++', 'niawarti', '', '', '', 0, '', '0000', '', 'Publish', '  ', '20170209045014.jpg', 0, '2019-03-25 18:14:22', '2019-03-25 17:14:22');
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
	(34, 5, 4, 'bab 3', 'agilinilucu.docx', 'qweasd', 2, '2019-03-24 17:44:30'),
	(35, 5, 4, 'bab 1', 'Tata_Tertib_Kos_Ibu_Said.pdf', 'asdasd', 1, '2019-03-29 16:58:24');
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

-- Dumping data for table db_perpus.jenis: ~2 rows (approximately)
/*!40000 ALTER TABLE `jenis` DISABLE KEYS */;
INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
	(3, 'I01', 'Ilmu sosial', '', 1, '2019-03-22 18:44:32'),
	(4, 'bio', 'buku biologi', '  buku ini tentang biologi dalam tumbuhan dan hewan\r\njika ada tambahan, kemungkinan tentang kamasutra', 2, '2019-03-19 17:46:05');
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

-- Dumping data for table db_perpus.konfigurasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `konfigurasi` DISABLE KEYS */;
INSERT INTO `konfigurasi` (`id`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `phone`, `alamat`, `max_pinjam`, `max_jumlah`, `denda_perhari`, `tanggal`) VALUES
	(1, 4, 'Perpustakaan ', 'Dimana Anda dapat belajar dengan mudah', 'JSquad adalah perusahaan yang bergerak dibidang web dan aplikasi', 'education, top education, education in indonesia, world education, education and training, education system, education system in indonesia, top education countries, academic, academy asia, top academic journals, best academic colleges, best academic colleges in the world, top academic countries, top academic universities in the world, top academic universities, research, international research, research in indonesia, international research university, collaboration, international collaboration, ', 'jon@mail.net', 'https://github.com', 'banner.jpg', 'b2.jpg', '', '', '', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.226032535767!2d110.40701211477327!3d-6.982631694955702!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b4ec52229d7%3A0xc791d6abc9236c7!2sUniversitas+Dian+Nuswantoro!5e0!3m2!1sid!2sid!4v1553968334242!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', '', '+628123456789', '207 Imam Bonjol Street', 14, 5, 1000, '2019-04-01 00:32:30');
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
	(1, '1', 'Admin', '2019-05-29 19:57:53'),
	(2, '2', 'Anggota', '2019-05-30 08:35:48'),
	(3, '3', 'User', '2019-05-30 08:35:34');
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
	(1, 'java Web Media', 'http://localhost/perpustakaan', '_blank', '2019-04-01 11:20:46'),
	(2, 'github', 'https://github.com', '_self', '2019-04-01 11:20:46');
/*!40000 ALTER TABLE `link` ENABLE KEYS */;

-- Dumping structure for table db_perpus.peminjaman
CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text CHARACTER SET utf8 NOT NULL,
  `status_kembali` enum('Belum','Sudah','Hilang','') CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_perpus.peminjaman: ~2 rows (approximately)
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
	(2, 7, 2, 4, '2019-04-27', '2019-05-11', 'asdweqwe', 'Belum', '2019-04-01 11:23:58'),
	(5, 7, 4, 4, '2019-04-01', '2019-05-02', 'asdweqwe', 'Belum', '2019-04-01 12:45:27');
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
	(1, 1, 'Actived', '2019-05-30 12:32:41'),
	(2, 2, 'Not Actived', '2019-05-30 12:32:56'),
	(3, 3, 'Banned', '2019-05-30 12:33:06');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table db_perpus.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_level` int(11) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `token` varchar(256) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `keterangan` mediumtext,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Dumping data for table db_perpus.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_level`, `id_status`, `username`, `password`, `token`, `nama`, `email`, `avatar`, `keterangan`, `tanggal`) VALUES
	(4, 1, 1, 'fhmanwar', 'd164b39e9ec43f65376629da9ccf41780775f656', '', 'fahmi', 'fafa@gmail.com', NULL, '          asdasdasd        ', '2019-05-30 08:34:46'),
	(5, 3, 1, 'jon', 'd164b39e9ec43f65376629da9ccf41780775f656', '', 'Jhon', 'jhonmub@gmail.com', NULL, 'asdqwe', '2019-05-30 08:35:56'),
	(6, 1, 1, 'admin', '$2y$10$XsHpVRXjY1aN.OzhmivxoOC84Xa6hewAFd3rwaytYqON.oUxC4zga', 'zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8', 'Admin', 'admin@gmail.com', NULL, '', '2019-05-30 12:51:51'),
	(15, 2, 1, 'admin1', '$2y$10$XsHpVRXjY1aN.OzhmivxoOC84Xa6hewAFd3rwaytYqON.oUxC4zga', 'zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8zs7o5nZDjCaN2qAhiMGQemgYFvS_WHpTkRuxrdb3cytKfO194LV-E6UlIwX0PJB8', 'Super Admin', '0qalvp@theskymail.com', NULL, '', '2019-05-30 15:42:59');
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
	(1, 'asdasdasdqweqwe', 'asdasdasd', 'asdasdadw', '    ', 'asdasdd', 'asdasd@afasd.etr', '::1', 'Diterima', '2019-03-30 15:37:28', '2019-03-30 16:03:08'),
	(2, 'Cerita tentang Midun', 'Marah Rusli', 'PT Andi Offset', NULL, 'Andoyo', 'wikwik@gmail.net', '::1', 'Baru', '2019-03-30 15:42:04', '2019-03-30 14:42:04'),
	(3, 'Dragon Ball Mencari mangsa', 'Andomir', 'Gramedia', 'Dragon Ball Jalan Jalan  ', 'rayyanwe', 'rayanwe@asd.net', '::1', 'Baru', '2019-03-30 17:04:15', '2019-03-30 16:04:15');
/*!40000 ALTER TABLE `usulan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
