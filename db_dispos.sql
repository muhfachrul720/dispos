-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2020 at 05:29 AM
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
(8, 4, 11),
(9, 5, 11),
(10, 6, 11),
(11, 7, 11),
(12, 8, 11),
(13, 9, 11),
(14, 5, 9),
(15, 7, 9),
(16, 8, 9),
(17, 9, 9);

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
(5, 'Loket Pendaftaran', '#', 'fas fa-archive', 4),
(6, 'Pelaksana Subseksi', '#', 'fas fa-archive', 10),
(7, 'Petugas Pengolah', '#', 'fas fa-archive', 10),
(8, 'Kepala Kantor Pertanahan', '#', 'fas fa-archive', 4),
(9, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(10, 'Verifikasi Berkas', '#', 'fas fa-archive', 0),
(11, 'Riwayat Perjalanan', '#', 'fas fa-archive', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `images`, `user_level`) VALUES
(1, 'Superadmin', 'itsapotato@uho.ac.id', '$2y$04$9VVmFs68Yiw/fKlyJu7ELuYBK5.PxcVbkp0wBgJh611OWKY1HDPbe', NULL, 1),
(7, 'FUBUKI !!', 'felix@uho.ac.id', '$2y$04$D5wJKzYQri6PDpCCOWDmReVOwb0RKXQEKGl.zxJYW6Cv93bN6gIia', 'Ehz9KHSX0AA-QCV.jpg', 2),
(10, 'KepalaPPAT', 'PPAT@uho.ac.id', '$2y$04$IZ2zwQhPCqFOcQ0F8A0IP.J.qeE07STUmiJCKogr1HiE2KY92r2F.', 'Eh6yb5mWkAYwavY.jpg', 4),
(11, 'kplsubseksi', 'subseksi@uho.ac.id', '$2y$04$ijVpbDcUf4AoUhQZT4Ol2OyAXc2vgxf16hBg3TEWopxVn071P7Q9.', '', 6),
(12, 'pengolahdata', 'pengolahdata@uho.ac.id', '$2y$04$KM0Ndosb.urd1UHAE3luPOD8djskH5L3/nA9begr52krChKIckczq', '', 5);

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
(9, 'Kepala Kantor Pertanahan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
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
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
