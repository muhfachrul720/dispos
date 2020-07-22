-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 05:25 AM
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
-- Table structure for table `tbl_hak_akses`
--

CREATE TABLE `tbl_hak_akses` (
  `id` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hak_akses`
--

INSERT INTO `tbl_hak_akses` (`id`, `id_user_level`, `id_menu`) VALUES
(47, 2, 2),
(48, 2, 3),
(49, 2, 4),
(50, 2, 42),
(51, 4, 21),
(52, 4, 22),
(53, 4, 23),
(54, 4, 24),
(55, 4, 25),
(56, 4, 43),
(57, 5, 26),
(58, 5, 27),
(59, 5, 28),
(60, 5, 29),
(61, 5, 30),
(62, 5, 31),
(63, 5, 32),
(68, 7, 22),
(69, 7, 33),
(70, 7, 34),
(72, 7, 36),
(77, 9, 37),
(78, 9, 38),
(79, 9, 39),
(80, 9, 40),
(81, 9, 41),
(82, 7, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_pegawai`
--

CREATE TABLE `tbl_info_pegawai` (
  `id` int(11) NOT NULL,
  `info_pegawai_nama` varchar(255) NOT NULL,
  `info_pegawai_jabatan` int(11) NOT NULL COMMENT 'ambil dari tbl_jabatan',
  `info_pegawai_telepon` varchar(255) NOT NULL,
  `info_pegawai_alamat` varchar(255) NOT NULL,
  `info_pegawai_jeniskelamin` int(11) NOT NULL COMMENT '1 = Laki, 2 = Perempuan',
  `info_pegawai_tanggallahir` date NOT NULL,
  `info_pegawai_tempatlahir` varchar(255) NOT NULL,
  `info_pegawai_statusperkawinan` int(11) NOT NULL COMMENT '1 = Kawin, 2 = Belum',
  `info_pegawai_agama` int(11) NOT NULL COMMENT '1 = Agama, 2 = Katolik, 3 = Hindu, 4 = Buddha',
  `info_pegawai_kewarganegaraan` varchar(255) NOT NULL,
  `info_pegawai_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info_pegawai`
--

INSERT INTO `tbl_info_pegawai` (`id`, `info_pegawai_nama`, `info_pegawai_jabatan`, `info_pegawai_telepon`, `info_pegawai_alamat`, `info_pegawai_jeniskelamin`, `info_pegawai_tanggallahir`, `info_pegawai_tempatlahir`, `info_pegawai_statusperkawinan`, `info_pegawai_agama`, `info_pegawai_kewarganegaraan`, `info_pegawai_iduser`) VALUES
(1, 'Muhajirin', 1, '0832142245221', 'Jln Kurniah no 21', 2, '1998-11-29', 'Mawasangka', 2, 1, 'USA', 28),
(2, '', 0, '082173352503', 'Jln Selalu Bersamamu', 2, '1995-07-11', 'Osaka', 2, 2, 'JPN', 31);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lembaga`
--

CREATE TABLE `tbl_lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `nama_lembaga` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lembaga`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(30) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Kelola Menu', 'Kelolamenu', 'fas fa-fw fa-tachometer-alt', 0, 'y'),
(2, 'Kelola Pengguna', 'User', 'fas fa-fw fa-users', 0, 'y'),
(4, 'Level Pengguna', 'Userlevel', 'fas fa-fw fa-layer-group', 0, 'y'),
(21, 'Verifikasi Berkas Alumni', '', 'fas fa-fw fa-users', 0, 'y'),
(22, 'Data Jadwal Mengajar', '', 'fas fa-fw fa-users', 0, 'y'),
(23, 'Verifikasi Aktif Kuliah', '', 'fas fa-fw fa-users', 0, 'y'),
(24, 'Verifikasi Penelitian ', '', 'fas fa-fw fa-users', 0, 'y'),
(25, 'Verifikasi Proposal ', '', 'fas fa-fw fa-users', 0, 'y'),
(26, 'DUK (Data Induk Kepegawaian)', '', 'fas fa-fw fa-users', 0, 'y'),
(27, 'Data Pangkat/Golongan', '', 'fas fa-fw fa-users', 0, 'y'),
(28, 'Data Pensiun', '', 'fas fa-fw fa-users', 0, 'y'),
(29, 'Verifikasi Kenaikan Pangkat', '', 'fas fa-fw fa-users', 0, 'y'),
(30, 'Verifikasi Pensiun', '', 'fas fa-fw fa-users', 0, 'y'),
(31, 'Monitoring Pegawai', '', 'fas fa-fw fa-users', 0, 'y'),
(32, 'Verifikasi Cuti', '', 'fas fa-fw fa-users', 0, 'y'),
(33, 'Ajuan Kenaikan Pangkat', '', 'fas fa-fw fa-users', 0, 'y'),
(34, 'Ajuan Pensiun', '', 'fas fa-fw fa-users', 0, 'y'),
(36, 'Pengajuan Cuti', '', 'fas fa-fw fa-users', 0, 'y'),
(37, 'Data Mahasiswa', '', 'fas fa-fw fa-users', 0, 'y'),
(38, 'Pengajuan Aktif Kuliah', '', 'fas fa-fw fa-users', 0, 'y'),
(39, 'Pengajuan Penelitian', '', 'fas fa-fw fa-users', 0, 'y'),
(40, 'Pengajuan Proposal', '', 'fas fa-fw fa-users', 0, 'y'),
(41, 'Pengajuan Skripsi', '', 'fas fa-fw fa-users', 0, 'y'),
(42, 'User Jabatan', '', 'fas fa-fw fa users', 0, 'y'),
(43, 'Verifikasi Skripsi', 'Akademik/verfifikasi_skripsi', 'fas fa-fw fa-users', 0, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_setting` varchar(50) NOT NULL,
  `value` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id_setting`, `nama_setting`, `value`) VALUES
(1, 'Tampil Menu', 'ya');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_lembaga` int(11) NOT NULL,
  `images` text NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_users`, `full_name`, `email`, `password`, `id_lembaga`, `images`, `id_user_level`, `is_aktif`) VALUES
(3, 'superadmin', 'superadmin@uho.ac.id', '$2y$04$BtFTWkPynQ1SD8081wKLxudTjOyM9PQY0rGdrgs9Ic4nnSccwhsXW', 4, '', 2, 'y'),
(25, 'adminakademik', 'adminakademik@uho.ac.id', '$2y$04$lp.WSmn39lVmB3yV2t/dGO1eHM1.aLrEdfwjRv7hx6sMjg/A1wub6', 0, '', 4, 'y'),
(26, 'adminpegawai', 'adminpegawai@uho.ac.id', '$2y$04$w7IBQDHIFptsNLjhQXJmg.WhUqEABxNAZ1yxmXjXRk/6.2gj3P062', 0, '', 5, 'y'),
(28, 'Kira kira', 'dosen@uho.ac.id', '$2y$04$BtFTWkPynQ1SD8081wKLxudTjOyM9PQY0rGdrgs9Ic4nnSccwhsXW', 0, 'profil28.jpg', 7, 'y'),
(30, 'mahasiswa', 'mahasiswa@uho.ac.id', '$2y$04$kwdXmvsaH8cOAcA1emM2duJDFRKEZ.APWBjmomLIOseCgrwHvTAbO', 0, '', 9, 'y'),
(31, 'Shigure Ui', 'staff@uho.ac.id', '$2y$04$aQ9ZDuOsgsJquRe.5H4Ch.aa80DpEgFtFdTDKp2xvSn7ijZKrN.ia', 0, 'profil31.jpg', 7, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` int(11) NOT NULL,
  `nama_level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
(1, 'User'),
(2, 'Super Admin'),
(4, 'admin_akademik'),
(5, 'admin_pegawai'),
(7, 'pegawai'),
(9, 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_info_pegawai`
--
ALTER TABLE `tbl_info_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `tbl_info_pegawai`
--
ALTER TABLE `tbl_info_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
