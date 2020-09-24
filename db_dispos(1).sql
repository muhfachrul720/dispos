-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 04:27 AM
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
  `level_receive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_alur_berkas`
--

INSERT INTO `tbl_alur_berkas` (`id`, `level_sender`, `level_receive`) VALUES
(1, 4, 5),
(2, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_desa`
--

CREATE TABLE `tbl_desa` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_desa`
--

INSERT INTO `tbl_desa` (`id`, `nama`) VALUES
(1, 'Desa Kalang kabut');

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
(8, 4, 13),
(9, 5, 13),
(10, 6, 13),
(11, 7, 13),
(12, 8, 13),
(13, 9, 13),
(14, 5, 9),
(15, 7, 9),
(16, 8, 9),
(17, 9, 9),
(18, 10, 12),
(19, 10, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_hak`
--

CREATE TABLE `tbl_jenis_hak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_hak`
--

INSERT INTO `tbl_jenis_hak` (`id`, `nama`) VALUES
(1, 'Hak Pertama');

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
(1, 'Memohon Belas Kasih');

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
(1, 'Kelola Pengguna', 'superadmin/user', 'fas fa-address-card', 0),
(2, 'Kelola Level Pengguna', 'superadmin/userlevel', 'fas fa-layer-group', 0),
(3, 'Kelola Menu', 'superadmin/menu', 'fas fa-archive', 0),
(4, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(5, 'Loket Pendaftaran', 'operator/Verifikasi/verif_loketpendaftaran', 'fas fa-archive', 4),
(6, 'Pelaksana Subseksi', '#', 'fas fa-archive', 10),
(7, 'Petugas Pengolah', '#', 'fas fa-archive', 10),
(8, 'Kepala Kantor Pertanahan', 'operator/Verifikasi/verif_kepalakantortanah', 'fas fa-archive', 4),
(9, 'Verifikasi Berkas', 'operator/Verifikasi/verif_all', 'fas fa-archive', 0),
(10, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(12, 'Pengajuan Peralihan Hak', 'Regular/pengajuan', 'fas fa-upload', 0),
(13, 'Riwayat Perjalanan', 'Riwayat', 'fas fa-archive', 0);

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
  `nama_pemilik` int(11) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `jatuh_tempo` datetime DEFAULT NULL,
  `jenis_permohonan` int(11) NOT NULL,
  `id_berkas` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_berkas`
--

INSERT INTO `tbl_pengajuan_berkas` (`id`, `no_berkas`, `no_hak`, `jenis_hak`, `desa_kecamatan`, `nama_pemilik`, `waktu`, `jatuh_tempo`, `jenis_permohonan`, `id_berkas`, `id_user`) VALUES
(8, '21321321', '12232121', 1, 1, 0, '2020-09-23 11:09:53', '2020-09-30 11:09:53', 1, NULL, 14),
(9, '23212211', '123213213', 1, 1, 0, '2020-09-23 11:09:30', '2020-09-30 11:09:30', 1, NULL, 14),
(10, '21321312', '21321321', 1, 1, 0, '2020-09-23 12:09:15', '2020-09-30 12:09:15', 1, NULL, 13),
(11, '1231321', '123123', 1, 1, 0, '2020-09-23 02:09:40', '2020-09-30 02:09:40', 1, NULL, 13),
(12, '23123122321', '123122231', 1, 1, 0, '2020-09-24 10:09:52', '2020-10-01 10:09:52', 1, NULL, 13);

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
(7, '2020-09-23 11:09:53', 14, 0, 8, 0, 'Permohonan Dibuat'),
(8, '2020-09-25 07:17:38', 10, 0, 8, 0, 'Diverifikasi Kasubsi'),
(9, '2020-09-23 11:09:30', 14, 0, 9, 0, 'Permohonan Dibuat'),
(10, '2020-09-29 13:11:51', 12, 0, 8, 0, 'Diverifikaiasi'),
(11, '2020-09-23 12:09:15', 13, 0, 10, 0, 'Permohonan Dibuat'),
(12, '2020-09-23 02:09:40', 13, 15, 11, 1, 'Permohonan Dibuat'),
(13, '2020-09-26 06:21:27', 15, 16, 11, 0, 'Telah diverif Kasubsi\r\n'),
(14, '2020-09-24 10:09:52', 13, 15, 12, 0, 'Permohonan Dibuat');

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
(14, 'pendaftar2', 'Kiri', 'pendaftar@uho.ac.id', '$2y$04$Spzbd50USqWZ4S37/iaUeOZ1jhnRw/6XyhXg1m6OCyYQhZj210YH2', 'default.png 	', 10),
(15, 'KasubsiPPAT', NULL, 'PPAT@uho.ac.id', '$2y$04$yb3ACnAakfBwTLrZvBo5te/YGCRpDHtbYL4NUo5tG4h/DmtOP.aSy', 'default.png 	', 4),
(16, 'KepalaPertanahan', NULL, 'PPAT@uho.ac.id', '$2y$04$PU7I0jMa1jbGhAw/hpvU.uipz9VQf7Xx1SnbD8HxZg8UihXq7LHiC', 'default.png 	', 9),
(17, 'KepalaHukum', NULL, 'PPAT@uho.ac.id', '$2y$04$f3e3yiOeO2CGj2YGS849O.b5OXJGFlsg6o8849RHTL941vBE/tEoa', 'default.png 	', 8),
(18, 'LoketSerah', NULL, 'PPAT@uho.ac.id', '$2y$04$ISf5y4zHCRci.g4b9geUtulYKINVz.wdcnXJM0PwNj7.ChvO4bmle', 'default.png 	', 7),
(19, 'PelaksanaSubseksi', NULL, 'PPAT@uho.ac.id', '$2y$04$ldRTDNDS6CcYfkYywiUisuZY1c3g.MXEuVG5whu5adHbmqmd7ACE2', 'default.png 	', 6),
(20, 'PetugasPengolah1', NULL, 'PPAT@uho.ac.id', '$2y$04$Ow7WwfbhvixySzfyDCZJDu82QjpJHbYa/KyfsRUSL6ZBZP9U8Clsy', 'default.png 	', 5);

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
-- Indexes for table `tbl_jenis_hak`
--
ALTER TABLE `tbl_jenis_hak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jenis_permohonan`
--
ALTER TABLE `tbl_jenis_permohonan`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_desa`
--
ALTER TABLE `tbl_desa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_jenis_hak`
--
ALTER TABLE `tbl_jenis_hak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jenis_permohonan`
--
ALTER TABLE `tbl_jenis_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_berkas`
--
ALTER TABLE `tbl_pengajuan_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_riwayat_perjalanan`
--
ALTER TABLE `tbl_riwayat_perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
