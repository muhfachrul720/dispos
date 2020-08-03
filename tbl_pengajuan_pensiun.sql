-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 03:04 PM
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
-- Table structure for table `tbl_pengajuan_pensiun`
--

CREATE TABLE `tbl_pengajuan_pensiun` (
  `id_pengajuan_pensiun` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL,
  `waktu_pengajuan_pensiun` datetime NOT NULL,
  `keterangan_pengajuan_pensiun` tinytext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_pensiun`
--

INSERT INTO `tbl_pengajuan_pensiun` (`id_pengajuan_pensiun`, `id_pegawai`, `id_users`, `status_pengajuan`, `waktu_pengajuan_pensiun`, `keterangan_pengajuan_pensiun`) VALUES
(11, 1, NULL, NULL, '2020-08-03 01:08:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pengajuan_pensiun`
--
ALTER TABLE `tbl_pengajuan_pensiun`
  ADD PRIMARY KEY (`id_pengajuan_pensiun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pengajuan_pensiun`
--
ALTER TABLE `tbl_pengajuan_pensiun`
  MODIFY `id_pengajuan_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
