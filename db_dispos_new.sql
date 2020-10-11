-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 10:53 AM
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
-- Database: `db_dispos_new`
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
(1, 2, 'Desa Abeli'),
(2, 1, 'Desa Kambu'),
(3, 3, 'RANOMEETO'),
(4, 3, 'KOTA BANGUN'),
(5, 3, 'LANGGEA');

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
(34, 8, 24),
(35, 4, 102),
(36, 5, 102),
(37, 6, 102),
(38, 7, 102),
(39, 8, 102),
(40, 9, 102),
(41, 10, 102);

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
(1, 'Hak Milik'),
(2, 'Hak Guna Bangunan'),
(3, 'Hak Guna Usaha');

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
(1, 'Permohonan Test');

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
(1, 'Kecamatan Kambu'),
(2, 'Kecamatan Abeli'),
(3, 'RANOMEETO');

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
(14, 'Kelola Desa/Kecamatan', '#', 'fas fa-archive', 0),
(15, 'Jenis Permohonan', 'superadmin/permohonan/list_jenis_permohonan', 'fas fa-archive', 17),
(16, 'Jenis Hak', 'superadmin/permohonan/list_hak_permohonan', 'fas fa-archive', 17),
(17, 'Kelola Permohonan', '#', 'fas fa-archive', 0),
(18, 'Kecamatan', 'superadmin/desa/list_kecamatan', 'fas fa-archive', 14),
(19, 'Desa', 'superadmin/desa/list_desa', 'fas fa-archive', 14),
(20, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(23, 'Verifikasi Berkas', 'operator/verifikasi/verif_all', 'fas fa-archive', 0),
(24, 'Kelola Berkas', 'operator/admin/pengajuan', 'fas fa-archive', 0),
(100, 'Petugas Pengolah', 'operator/verifikasi/verif_petugaspengolah', 'fas fa-archive', 10),
(101, 'Kepala Kantor Pertanahan', 'operator/verifikasi/verif_kepalakantortanah', 'fas fa-archive', 10),
(102, 'Rekap Pengajuan', 'riwayat/recap_pengajuan', 'fas fa-archive', 0),
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
(1, '1234567890', '00001', 1, 2, 'Tajidun', '2020-10-02 09:10:13', '2020-10-09 09:10:13', 1, NULL, 0, '0', 13),
(2, '1234567891', '00002', 1, 3, 'Ahmad', '2020-09-25 08:10:18', '2020-10-02 08:10:18', 1, NULL, 0, '0', 13),
(3, '11', '11', 1, 3, '123', '2020-10-04 15:27:57', '2020-10-11 16:41:41', 1, NULL, 0, '0', 13),
(4, '1234567895', '00003', 1, 2, 'Doni', '2020-10-04 16:12:46', '2020-10-11 16:12:46', 1, NULL, 0, '0', 13),
(5, '213213213213', '00004', 1, 2, 'Samanto', '2020-10-04 19:55:55', '2020-10-11 19:55:55', 1, NULL, 0, '0', 13),
(6, '7654321', '00006', 1, 4, 'Roby', '2020-10-06 21:22:41', '2020-10-13 21:22:41', 1, NULL, 0, '1', 13),
(7, '0002323', '00012', 1, 2, 'Danil', '2020-10-02 13:54:36', '2020-10-15 13:54:36', 1, NULL, 0, '1', 13),
(8, '12323123', '00002', 1, 1, 'Danil', '2020-10-10 14:26:53', '2020-10-15 14:26:53', 1, NULL, 0, '1', 13);

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
(1, '2020-10-02 09:10:13', 13, 15, 1, 1, 'Permohonan Dibuat'),
(2, '2020-10-03 03:10:13', 15, 20, 1, 1, ''),
(3, '2020-10-03 03:10:15', 20, 19, 1, 1, ''),
(4, '2020-10-03 03:10:13', 19, 15, 1, 1, ''),
(5, '2020-10-04 08:10:38', 15, 17, 1, 1, ''),
(6, '2020-10-04 08:10:02', 17, 16, 1, 1, ''),
(7, '2020-10-04 08:10:24', 16, 19, 1, 1, ''),
(8, '2020-10-04 08:10:14', 19, 18, 1, 1, ''),
(9, '2020-10-04 08:10:48', 18, 1, 1, 0, ''),
(10, '2020-09-25 08:10:18', 13, 15, 2, 1, 'Permohonan Dibuat'),
(11, '2020-10-04 02:19:15', 15, 20, 2, 1, ''),
(12, '2020-10-04 14:23:02', 20, 19, 2, 0, ''),
(13, '2020-10-04 14:32:29', 13, 15, 3, 1, 'Permohonan Dibuat'),
(14, '2020-10-04 16:12:46', 13, 15, 4, 1, 'Permohonan Dibuat'),
(15, '2020-10-04 19:55:55', 13, 15, 5, 0, 'Permohonan Dibuat'),
(16, '2020-10-04 20:02:30', 15, 20, 4, 1, ''),
(17, '2020-10-04 20:04:42', 20, 19, 4, 0, ''),
(18, '2020-10-06 18:06:32', 15, 20, 3, 1, ''),
(19, '2020-10-06 18:07:18', 20, 19, 3, 0, ''),
(20, '2020-10-06 21:22:41', 13, 15, 6, 1, 'Permohonan Dibuat'),
(21, '2020-10-06 21:34:45', 15, 20, 6, 1, ''),
(22, '2020-10-06 21:39:04', 20, 19, 6, 0, ''),
(23, '2020-10-02 13:54:36', 13, 15, 7, 0, 'Permohonan Dibuat'),
(24, '2020-10-10 14:26:53', 13, 15, 8, 0, 'Permohonan Dibuat');

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
(1, 'Superadmin', 'Munawarman test', 'itsapotato@uho.ac.id', '$2y$04$9VVmFs68Yiw/fKlyJu7ELuYBK5.PxcVbkp0wBgJh611OWKY1HDPbe', 'default.png 	', 1),
(7, 'FUBUKI !!', 'Sudarsono', 'felix@uho.ac.id', '$2y$04$D5wJKzYQri6PDpCCOWDmReVOwb0RKXQEKGl.zxJYW6Cv93bN6gIia', 'Ehz9KHSX0AA-QCV.jpg', 2),
(13, 'pendaftar', 'Loket Pendaftaran', 'pendaftar@uho.ac.id', '$2y$04$Qz0ZanwStpKzfeIivEB9iO7ETHoJuBkv2FvPvhYjp.ug3OAmQyrZe', '676ab51d4abc7e23d2e40105d58edb4f.jpg', 10),
(14, 'pendaftar2', 'Stalin Fierherdman', 'pendaftar@uho.ac.id', '$2y$04$K1UhKc4i41CL4mVwz6/sS.QiPtUf.PTXiLfsnaeW3ZQHV3ZsUoJ.2', 'default.png 	', 10),
(15, 'KasubsiPPAT', 'Kasubsi PPAT', 'PPAT@uho.ac.id', '$2y$04$1tRrq5R9G/x5urRhwQyiyuVzNDue8uNqKnPpB/Exn/La1zCM.6QH.', 'default.png 	', 4),
(16, 'KepalaPertanahan', NULL, 'PPAT@uho.ac.id', '$2y$04$YwjgPWn6UuBMINIYR30o4uJq.7tSynOiDXYATO4IXnkBR0L98gGkG', 'default.png 	', 9),
(17, 'KepalaHukum', NULL, 'PPAT@uho.ac.id', '$2y$04$YM2q460xkjHBsDApAVHj2.rN.FMDBImVKBbxqa4b2/KZ5R08UFA/6', 'default.png 	', 8),
(18, 'LoketSerah', NULL, 'PPAT@uho.ac.id', '$2y$04$IrB/JkWgC.z12fY91VmF5./lmFvUlx51ld0/b3Aurblxn6LDWOAfq', 'default.png 	', 7),
(19, 'PelaksanaSubseksi', NULL, 'PPAT@uho.ac.id', '$2y$04$25xZcLIirZcI0t9H3gUiHeqsZN/b5xf0mk8fPL8m5nd0wFSuyE5pC', 'default.png 	', 6),
(20, 'PetugasPengolah1', NULL, 'PPAT@uho.ac.id', '$2y$04$cG39vAq9Rapl9asJz/Zsj.QBoJ0erWQVZ7Z1ywZ6ZwzMgTQFzviT.', 'default.png 	', 5),
(21, 'PetugasPengolah2', NULL, 'PetugasPengolah2@gmail.com', '$2y$04$9OURP3nb9hTvXHZ3cX40dul/fn1ErW2elXOK2os/SyagtSwaKARBS', '', 5),
(22, 'pengolah_eko1', NULL, 'qwerty@gmail.com', '$2y$04$H77vmM9gMpxVsbD3xffhD.AZLYQWmpcQ6z4bfmxzrEODoessZwqti', '', 5);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_hak_permohonan`
--
ALTER TABLE `tbl_hak_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_jenis_permohonan`
--
ALTER TABLE `tbl_jenis_permohonan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_berkas`
--
ALTER TABLE `tbl_pengajuan_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_riwayat_perjalanan`
--
ALTER TABLE `tbl_riwayat_perjalanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
