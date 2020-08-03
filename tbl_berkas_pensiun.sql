-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 02:50 PM
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
-- Table structure for table `tbl_berkas_pensiun`
--

CREATE TABLE `tbl_berkas_pensiun` (
  `id_berkas` int(11) NOT NULL,
  `nama_berkas` varchar(255) NOT NULL,
  `id_pengajuan_pensiun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas_pensiun`
--

INSERT INTO `tbl_berkas_pensiun` (`id_berkas`, `nama_berkas`, `id_pengajuan_pensiun`) VALUES
(6, 'pegawai_1berkas_0.jpg', 11),
(7, 'pegawai_1berkas_01.jpg', 11),
(8, 'pegawai_1berkas_02.jpg', 11),
(9, 'pegawai_1berkas_03.jpg', 11),
(10, 'pegawai_1berkas_04.jpg', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_berkas_pensiun`
--
ALTER TABLE `tbl_berkas_pensiun`
  ADD PRIMARY KEY (`id_berkas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_berkas_pensiun`
--
ALTER TABLE `tbl_berkas_pensiun`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
