-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_sisfak
CREATE DATABASE IF NOT EXISTS `db_sisfak` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_sisfak`;

-- Dumping structure for table db_sisfak.tbl_hak_akses
CREATE TABLE IF NOT EXISTS `tbl_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisfak.tbl_hak_akses: ~15 rows (approximately)
DELETE FROM `tbl_hak_akses`;
/*!40000 ALTER TABLE `tbl_hak_akses` DISABLE KEYS */;
INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
	(28, 2, 4),
	(29, 2, 2),
	(30, 2, 3),
	(31, 2, 10),
	(32, 2, 20),
	(35, 2, 15),
	(36, 2, 16),
	(37, 2, 17),
	(38, 2, 18),
	(40, 1, 12),
	(41, 1, 13),
	(42, 1, 14),
	(43, 2, 19),
	(44, 3, 18),
	(46, 3, 3);
/*!40000 ALTER TABLE `tbl_hak_akses` ENABLE KEYS */;

-- Dumping structure for table db_sisfak.tbl_lembaga
CREATE TABLE IF NOT EXISTS `tbl_lembaga` (
  `id_lembaga` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lembaga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_lembaga`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisfak.tbl_lembaga: ~19 rows (approximately)
DELETE FROM `tbl_lembaga`;
/*!40000 ALTER TABLE `tbl_lembaga` DISABLE KEYS */;
INSERT INTO `tbl_lembaga` (`id_lembaga`, `nama_lembaga`, `keterangan`) VALUES
	(1, 'FT', 'Fakultas Teknik'),
	(2, 'FISIP', 'Fakultas Ilmu Sosial dan Ilmu Politik'),
	(3, 'FEB', 'Fakultas Ekonomi dan Bisnis'),
	(4, 'Universitas', 'Bendahara Universitas'),
	(5, 'FTIK', 'Fakultas Teknologi dan Ilmu Kebumian'),
	(6, 'FKIP', 'Fakutas Keguruan dan Ilmu Pendidikan'),
	(7, 'FP', 'Fakutas Pertanian'),
	(8, 'FMIPA', 'Fakutas Matematika dan Ilmu Pengetahuan Alam'),
	(9, 'FH', 'Fakutas Hukum'),
	(10, 'FPIK', 'Fakutas Perikanan dan Ilmu Kelautan'),
	(11, 'FIB', 'Fakutas Ilmu Budaya'),
	(12, 'FPt', 'Fakutas Peternakan'),
	(13, 'FKM', 'Fakutas Kesehatan Masyarakat'),
	(14, 'FHIL', 'Fakutas Kehutanan dan Ilmu Lingkungan'),
	(15, 'FK', 'Fakutas Kedokteran'),
	(16, 'FF', 'Fakutas Farmasi'),
	(17, 'PVokasi', 'Pendidikan Vokasi'),
	(18, 'PPS', 'Pendidkan Program Pascasarjana'),
	(19, 'BUK', 'Biro Umum dan Kepegawaian');
/*!40000 ALTER TABLE `tbl_lembaga` ENABLE KEYS */;

-- Dumping structure for table db_sisfak.tbl_menu
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no',
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisfak.tbl_menu: ~13 rows (approximately)
DELETE FROM `tbl_menu`;
/*!40000 ALTER TABLE `tbl_menu` DISABLE KEYS */;
INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
	(1, 'Kelola Menu', 'Kelolamenu', 'fas fa-fw fa-tachometer-alt', 0, 'y'),
	(2, 'Kelola Pengguna', 'User', 'fas fa-fw fa-users', 0, 'y'),
	(3, 'Lembaga / Fakultas', 'Lembaga', 'fas fa-fw fa-university', 0, 'y'),
	(4, 'Level Pengguna', 'Userlevel', 'fas fa-fw fa-layer-group', 0, 'y'),
	(12, 'Perencanaan Kegiatan', 'Perencanaan', 'fas fa-fw fa-pencil-ruler', 0, 'y'),
	(13, 'Realisasi Kegiatan', 'Realisasi', 'far fa-fw fa-calendar-check', 0, 'y'),
	(14, 'Monitoring Kegiatan', 'Monitoring/mon_bendahara', 'fas fa-fw fa-desktop', 0, 'y'),
	(15, 'Verifikasi Perencanaan', 'Verifikasi_perencanaan', 'fas fa-fw fa-tasks', 0, 'y'),
	(16, 'Verifikasi Realisasi', 'Verifikasi_realisasi', 'fas fa-fw fa-calendar-check', 0, 'y'),
	(17, 'Monitoring Realisasi', 'Monitoring/mon_admin', 'fas fa-fw fa-desktop', 0, 'y'),
	(18, 'Monitoring Alarm', 'Alarm', 'fas fa-fw fa-bell', 0, 'y'),
	(19, 'Report', 'Report', 'far fa-fw fa-clipboard', 0, 'y'),
	(20, 'Verifikasi Triwulan', 'Verifikasi_triwulan', 'far fa-fw fa-calendar-check', 0, 'y');
/*!40000 ALTER TABLE `tbl_menu` ENABLE KEYS */;

-- Dumping structure for table db_sisfak.tbl_setting
CREATE TABLE IF NOT EXISTS `tbl_setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisfak.tbl_setting: ~0 rows (approximately)
DELETE FROM `tbl_setting`;
/*!40000 ALTER TABLE `tbl_setting` DISABLE KEYS */;
INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
	(1, 'Tampil Menu', 'ya');
/*!40000 ALTER TABLE `tbl_setting` ENABLE KEYS */;

-- Dumping structure for table db_sisfak.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_lembaga` int(11) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisfak.tbl_user: ~20 rows (approximately)
DELETE FROM `tbl_user`;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `id_lembaga`, `images`, `id_user_level`, `is_aktif`) VALUES
	(3, 'Admin', 'admin_keu@uho.ac.id', '$2y$04$FCqeaxUCf9XJdBhH1M49l.Uty.Q/SVcoASbLUjZrvb8c5jYOZxx/i', 4, '', 2, 'y'),
	(6, 'Bendahara FKIP', 'fkip@uho.ac.id', '$2y$04$FCqeaxUCf9XJdBhH1M49l.Uty.Q/SVcoASbLUjZrvb8c5jYOZxx/i', 6, '', 1, 'y'),
	(7, 'Bendahara FEB', 'feb@uho.ac.id', '$2y$04$FCqeaxUCf9XJdBhH1M49l.Uty.Q/SVcoASbLUjZrvb8c5jYOZxx/i', 3, '', 1, 'y'),
	(8, 'Bendahara FISIP', 'fisip@uho.ac.id', '$2y$04$8sc9hdBPeYAktYknapM5P.NimNJXzmxtSp57TnTx4k9PnUXL3rNUe', 2, '', 1, 'y'),
	(9, 'Bendahara FPertanian', 'fp@uho.ac.id', '$2y$04$bml7VKtvYkysKSbQaE7EVuaMoe4WtM0fmgHb1DY1b6zhKU2jW8kda', 7, '', 1, 'y'),
	(10, 'Bendahara FMIPA', 'fmipa@uho.ac.id', '$2y$04$GO.kHpgBtd/xLh8HgDEGeeK.y5tarf7oM5Ud4KciF72OSQdgndSvK', 8, '', 1, 'y'),
	(11, 'Bendahara FTeknik', 'ft@uho.ac.id', '$2y$04$UV5Q3fTcMMW1VkzmTmyHduNzgU9U.AlavbmorrfP4r09f9AVQbOGq', 1, '', 1, 'y'),
	(12, 'Bendahara FHukum', 'fh@uho.ac.id', '$2y$04$QFxJnedV7MAJQYJz1DkhIen/Mwaf7UsqbYkd1YD8knL.B72Qd0I6u', 9, '', 1, 'y'),
	(13, 'Bendahara FPIK', 'fpik@uho.ac.id', '$2y$04$vtsD97nRD5yJP0NOd.ul4exOJu2SsjSlrgiL6NSAeOtltl57TjwNi', 10, '', 1, 'y'),
	(14, 'Bendahara FIB', 'fib@uho.ac.id', '$2y$04$7kSNLque.3wRcbAU/6/5ku.Li3OGpWa50SMokWhgxYLi59qMoTsBC', 11, '', 1, 'y'),
	(15, 'Bendahara FPeternakan', 'fpt@uho.ac.id', '$2y$04$DWYMOXF8kujsuFMhJ8C/p.VQOfWO1MA8YRdENrw82if6PGsE.PXt2', 12, '', 1, 'y'),
	(16, 'Bendahara FKM', 'fkm@uho.ac.id', '$2y$04$ZpE48UwsNXldL.oynS8RLu3CA1DJqpRLiAB/IPbR88jC3XSDW.gCu', 13, '', 1, 'y'),
	(17, 'Bendahara FHIL', 'fhil@uho.ac.id', '$2y$04$d1MMEma2rtElk.SJiSk76uCkQrltILrI8U.9s.lz24qBy0xQ69Mx.', 14, '', 1, 'y'),
	(18, 'Bendahara FKedokteran', 'fk@uho.ac.id', '$2y$04$6xPvqib4H1mYcnUUCBaoT.busfi83NLl9Vxjdk.t5iKQu2WJFrpQ6', 15, '', 1, 'y'),
	(19, 'Bendahara FFarmasi', 'ff@uho.ac.id', '$2y$04$/AfCClaY3aiHmzKXkXY4deeZSH4v9EOfG/y/oebdIkwAtiam.AP5.', 16, '', 1, 'y'),
	(20, 'Bendahara FTIK', 'ftik@uho.ac.id', '$2y$04$BvNReFyeKtCyZ/TFYkJ5bOwTdjqejAnEeI2EKfPTAxtVlMIcQEZiO', 5, '', 1, 'y'),
	(21, 'Bendahara Pend. Vokasi', 'pvokasi@uho.ac.id', '$2y$04$2P/ggkiFzHUJ1PJGQnCEcuko7uGjTPSdaQpSwFYCtdFPcyNjh60j2', 17, '', 1, 'y'),
	(22, 'Bendahara Program Pascasarjana', 'pps@uho.ac.id', '$2y$04$WhO05mN5gofeULChnzxhdufOiuxN7le8qfEtsBWs2aXZosvsv88u.', 18, '', 1, 'y'),
	(23, 'Bendahara BUK', 'buk@uho.ac.id', '$2y$04$asOx8EGQTYJuzMIZdsSqY.6gbSc7whD.qvuhWGxuiA/GmAlKREyhW', 19, '', 1, 'y'),
	(24, 'rektor', 'rektor@uho.ac.id', '$2y$04$Le9JNZfRAPjDbMw3yxDF/OtwgiWcH7wGKnq5cZepnbqPpW6gRg5E.', 4, '', 3, 'y');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;

-- Dumping structure for table db_sisfak.tbl_user_level
CREATE TABLE IF NOT EXISTS `tbl_user_level` (
  `id_user_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(30) NOT NULL,
  PRIMARY KEY (`id_user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table db_sisfak.tbl_user_level: ~3 rows (approximately)
DELETE FROM `tbl_user_level`;
/*!40000 ALTER TABLE `tbl_user_level` DISABLE KEYS */;
INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
	(1, 'User'),
	(2, 'Admin'),
	(3, 'rektor');
/*!40000 ALTER TABLE `tbl_user_level` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
