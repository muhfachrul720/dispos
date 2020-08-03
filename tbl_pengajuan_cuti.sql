-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 03:03 PM
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
-- Database: `db_sisfak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_cuti`
--

CREATE TABLE `tbl_pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL DEFAULT 0,
  `id_users` int(11) NOT NULL DEFAULT 0,
  `jenis_pengajuan_cuti` int(11) NOT NULL,
  `tahun_pengajuan_cuti` varchar(5) DEFAULT NULL,
  `alasan_pengajuan_cuti` tinytext DEFAULT NULL,
  `alamat_pengajuan_cuti` tinytext NOT NULL,
  `telepon_pengajuan_cuti` varchar(255) NOT NULL,
  `jml_bln_cuti` int(11) NOT NULL,
  `jml_thn_cuti` int(11) NOT NULL,
  `tgl_cuti` date DEFAULT NULL,
  `jml_hari_cuti` int(11) DEFAULT NULL,
  `status_cuti` int(11) DEFAULT NULL,
  `kuota_cuti` int(11) DEFAULT NULL,
  `waktu_pengajuan_cuti` datetime NOT NULL,
  `keterangan_pengajuan_cuti` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_cuti`
--

INSERT INTO `tbl_pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `id_users`, `jenis_pengajuan_cuti`, `tahun_pengajuan_cuti`, `alasan_pengajuan_cuti`, `alamat_pengajuan_cuti`, `telepon_pengajuan_cuti`, `jml_bln_cuti`, `jml_thn_cuti`, `tgl_cuti`, `jml_hari_cuti`, `status_cuti`, `kuota_cuti`, `waktu_pengajuan_cuti`, `keterangan_pengajuan_cuti`) VALUES
(2, 1, 29, 1, NULL, 'sdasdas', 'sdsad', 'sadasdsa', 0, 0, '2020-07-14', 8, 2, NULL, '2020-07-30 07:07:06', 'Ditolak'),
(3, 1, 29, 1, '2019', 'sadasdsadsa', 'sadasdsa', 'asdasdas', 0, 0, '2020-07-16', 13, 1, 12, '2020-07-30 11:07:18', 'Telah diperiksa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pengajuan_cuti`
--
ALTER TABLE `tbl_pengajuan_cuti`
  ADD PRIMARY KEY (`id_pengajuan_cuti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengajuan_cuti`
--
ALTER TABLE `tbl_pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
