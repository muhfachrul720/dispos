-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 09:35 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dispos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alur_berkas`
--

CREATE TABLE `tbl_alur_berkas` (
  `id` int(11) NOT NULL,
  `level_sender` int(11) NOT NULL,
  `level_now` int(11) NOT NULL,
  `level_receive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alur_berkas`
--

INSERT INTO `tbl_alur_berkas` (`id`, `level_sender`, `level_now`, `level_receive`) VALUES
(1, 10, 4, 5),
(2, 4, 5, 6),
(3, 5, 6, 4),
(4, 6, 4, 8),
(5, 4, 8, 9),
(6, 8, 9, 6),
(7, 9, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id` int(11) NOT NULL,
  `id_camat` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id`, `id_camat`, `nama`) VALUES
(1, 1, 'Desa Wohooo\''),
(2, 2, 'Desa Binongko'),
(6, 2, 'Hello'),
(7, 2, 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `user_level`, `menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(6, 4, 4),
(7, 6, 10),
(8, 4, 1009),
(9, 5, 1009),
(10, 6, 1009),
(11, 7, 1009),
(12, 8, 1009),
(13, 9, 1009),
(14, 5, 23),
(15, 7, 9),
(16, 8, 4),
(17, 9, 4),
(18, 10, 12),
(19, 10, 1009),
(20, 1, 14),
(23, 1, 17),
(24, 4, 20),
(25, 9, 23),
(26, 1, 21),
(27, 4, 24),
(28, 5, 9),
(29, 6, 9),
(30, 7, 23),
(31, 8, 23),
(32, 9, 24),
(33, 10, 13),
(34, 8, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hak_permohonan`
--

CREATE TABLE `tbl_hak_permohonan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_permohonan`
--

INSERT INTO `tbl_hak_permohonan` (`id`, `nama`) VALUES
(1, 'Hak Pertama'),
(2, 'Hak ke enam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_permohonan`
--

CREATE TABLE `tbl_jenis_permohonan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_permohonan`
--

INSERT INTO `tbl_jenis_permohonan` (`id`, `nama`) VALUES
(1, 'Memohon Belas Kasih'),
(2, 'Elementario'),
(4, 'jenis ke 2'),
(8, 'Hak Ke dua'),
(9, 'Hak Ke dua');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id` int(11) NOT NULL,
  `kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id`, `kecamatan`) VALUES
(1, 'Monarki Den Wara'),
(2, 'Kecamatan'),
(3, 'Camat Sial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'fas fa-archive',
  `submenu` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `nama`, `url`, `icon`, `submenu`) VALUES
(1, 'Dashboard', 'superadmin/dashboard', 'fas fa-home', 0),
(2, 'Kelola Pengguna', 'superadmin/user\r\n', 'fas fa-user', 0),
(3, 'Kelola Level Pengguna', 'superadmin/userlevel', 'fas fa-layer-group', 0),
(4, 'Dashboard', 'operator/admin/dashboard', 'fas fa-home', 0),
(5, 'Loket Pendaftaran', 'operator/verifikasi/verif_loketpendaftaran', 'fas fa-archive', 20),
(6, 'Pelaksana Subseksi', 'operator/verifikasi/verif_pelaksanasubseksi', 'fas fa-archive', 20),
(9, 'Dashboard', 'operator/dashboard', 'fas fa-home', 0),
(10, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(12, 'Dashboard', 'regular/dashboard', 'fas fa-home', 0),
(13, 'Pengajuan Peralihan Hak', 'regular/pengajuan', 'fas fa-upload', 0),
(14, 'Managemen Desa/Kecamatan', '#', 'fas fa-archive', 0),
(15, 'Jenis Permohonan', 'superadmin/permohonan/list_jenis_permohonan', 'fas fa-archive', 17),
(16, 'Hak Permohonan', 'superadmin/permohonan/list_hak_permohonan', 'fas fa-archive', 17),
(17, 'Managemen Permohonan', '#', 'fas fa-archive', 0),
(18, 'Desa', 'superadmin/desa/list_desa', 'fas fa-archive', 14),
(19, 'Kecamatan', 'superadmin/desa/list_kecamatan', 'fas fa-archive', 14),
(20, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(23, 'Verifikasi Berkas', 'operator/verifikasi/verif_all', 'fas fa-archive', 0),
(24, 'Managemen Berkas', 'operator/admin/pengajuan', 'fas fa-archive', 0),
(100, 'Petugas Pengolah', 'operator/verifikasi/verif_petugaspengolah', 'fas fa-archive', 10),
(101, 'Kepala Kantor Pertanahan', 'operator/verifikasi/verif_kepalakantortanah', 'fas fa-archive', 10),
(1009, 'Riwayat Perjalanan', 'riwayat', 'fas fa-archive', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_berkas`
--

CREATE TABLE `tbl_pengajuan_berkas` (
  `id` int(11) NOT NULL,
  `no_berkas` varchar(255) NOT NULL,
  `no_hak` varchar(255) NOT NULL,
  `jenis_hak` int(11) NOT NULL,
  `desa_kecamatan` int(11) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `jatuh_tempo` datetime DEFAULT NULL,
  `jenis_permohonan` int(11) NOT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `permit` int(11) NOT NULL COMMENT '1 = true, 0 = false',
  `softdelete` varchar(255) NOT NULL DEFAULT '0' COMMENT '-1 = delete , 0 = true',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_berkas`
--

INSERT INTO `tbl_pengajuan_berkas` (`id`, `no_berkas`, `no_hak`, `jenis_hak`, `desa_kecamatan`, `nama_pemilik`, `waktu`, `jatuh_tempo`, `jenis_permohonan`, `qr_code`, `permit`, `softdelete`, `id_user`) VALUES
(27, '2312312321', '1232123', 1, 6, 'Nur', '2020-09-30 02:09:46', '2020-10-07 02:09:46', 1, NULL, 0, '0', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat_perjalanan`
--

CREATE TABLE `tbl_riwayat_perjalanan` (
  `id` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `next_user` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '1 = Disetujui, 2 = Ditolak, 0 = Baru di ajukan',
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat_perjalanan`
--

INSERT INTO `tbl_riwayat_perjalanan` (`id`, `waktu`, `id_user`, `next_user`, `id_pengajuan`, `status`, `keterangan`) VALUES
(60, '2020-09-30 02:09:46', 13, 15, 27, 1, 'Permohonan Dibuat'),
(62, '2020-09-30 03:09:47', 15, 20, 27, 1, ''),
(63, '2020-09-30 03:09:25', 20, 19, 27, 1, ''),
(64, '2020-09-30 03:09:50', 19, 15, 27, 1, ''),
(65, '2020-09-30 03:09:33', 15, 17, 27, 1, ''),
(66, '2020-09-30 03:09:54', 17, 16, 27, 1, ''),
(67, '2020-09-30 03:09:21', 16, 19, 27, 1, ''),
(68, '2020-09-30 03:09:53', 19, 18, 27, 1, ''),
(69, '2020-09-30 03:09:22', 18, 1, 27, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(255) DEFAULT 'default.png',
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `nama_lengkap`, `email`, `password`, `images`, `user_level`) VALUES
(1, 'Superadmin', 'Munawarman', 'itsapotato@uho.ac.id', '$2y$04$9VVmFs68Yiw/fKlyJu7ELuYBK5.PxcVbkp0wBgJh611OWKY1HDPbe', 'default.png 	', 1),
(7, 'FUBUKI !!', 'Sudarsono', 'felix@uho.ac.id', '$2y$04$D5wJKzYQri6PDpCCOWDmReVOwb0RKXQEKGl.zxJYW6Cv93bN6gIia', 'Ehz9KHSX0AA-QCV.jpg', 2),
(13, 'pendaftar', 'Munawarman', 'pendaftar@uho.ac.id', '$2y$04$DeqRnGnbzKSYtYPxlfC9jO3ouH8DYZ5QbVIAU802KkdUdltcOsVw.', '8d81da21c2c45ba79d62afc05d86cac0.png', 10),
(14, 'pendaftar2', 'Stalin Fierherdman', 'pendaftar@uho.ac.id', '$2y$04$Spzbd50USqWZ4S37/iaUeOZ1jhnRw/6XyhXg1m6OCyYQhZj210YH2', 'default.png 	', 10),
(15, 'KasubsiPPAT', 'Kasubsi PPAT', 'PPAT@uho.ac.id', '$2y$04$yb3ACnAakfBwTLrZvBo5te/YGCRpDHtbYL4NUo5tG4h/DmtOP.aSy', 'default.png 	', 4),
(16, 'KepalaPertanahan', NULL, 'PPAT@uho.ac.id', '$2y$04$PU7I0jMa1jbGhAw/hpvU.uipz9VQf7Xx1SnbD8HxZg8UihXq7LHiC', 'default.png 	', 9),
(17, 'KepalaHukum', NULL, 'PPAT@uho.ac.id', '$2y$04$f3e3yiOeO2CGj2YGS849O.b5OXJGFlsg6o8849RHTL941vBE/tEoa', 'default.png 	', 8),
(18, 'LoketSerah', NULL, 'PPAT@uho.ac.id', '$2y$04$ISf5y4zHCRci.g4b9geUtulYKINVz.wdcnXJM0PwNj7.ChvO4bmle', 'default.png 	', 7),
(19, 'PelaksanaSubseksi', NULL, 'PPAT@uho.ac.id', '$2y$04$ldRTDNDS6CcYfkYywiUisuZY1c3g.MXEuVG5whu5adHbmqmd7ACE2', 'default.png 	', 6),
(20, 'PetugasPengolah1', NULL, 'PPAT@uho.ac.id', '$2y$04$wDHc.334QeIk4UeFT.p9jeaUG3UhaQt1WL5c1.yxTWa4Em1duehcq', 'default.png 	', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id`, `name`) VALUES
(1, 'Super Admin'),
(4, 'Kasubsi Pemeliharaan Data Hak Tanah dan Pembinaan PPAT'),
(5, 'Petugas Pengolah'),
(6, 'Pelaksana Subseksi'),
(7, 'Loket Penyerahan'),
(8, 'Kepala Seksi Hubungan Hukum Pertanahan'),
(9, 'Kepala Kantor Pertanahan'),
(10, 'Loket Pendaftaran');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_alur_berkas`
--
ALTER TABLE `tbl_alur_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_hak_permohonan`
--
ALTER TABLE `tbl_hak_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_permohonan`
--
ALTER TABLE `tbl_jenis_permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan_berkas`
--
ALTER TABLE `tbl_pengajuan_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_riwayat_perjalanan`
--
ALTER TABLE `tbl_riwayat_perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_alur_berkas`
--
ALTER TABLE `tbl_alur_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_hak_permohonan`
--
ALTER TABLE `tbl_hak_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jenis_permohonan`
--
ALTER TABLE `tbl_jenis_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_berkas`
--
ALTER TABLE `tbl_pengajuan_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_riwayat_perjalanan`
--
ALTER TABLE `tbl_riwayat_perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
