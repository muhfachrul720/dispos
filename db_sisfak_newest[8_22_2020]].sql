-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2020 at 02:05 AM
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
-- Table structure for table `tbl_aju_naikpangkat_fungsional`
--

CREATE TABLE `tbl_aju_naikpangkat_fungsional` (
  `id_ajuan_fungsional` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_berkas_ajuan` int(11) NOT NULL,
  `waktu_pengajuan_fungsional` datetime NOT NULL,
  `status_pengajuan_fungsional` int(11) DEFAULT NULL,
  `status_kenaikan_pangkat` int(11) NOT NULL COMMENT 'null = Belum naik, 1 = Telah Naik',
  `keterangan_pengajuan_fungsional` tinytext DEFAULT NULL,
  `report_pengajuan_fungsional` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aju_naikpangkat_fungsional`
--

INSERT INTO `tbl_aju_naikpangkat_fungsional` (`id_ajuan_fungsional`, `id_pegawai`, `id_users`, `id_berkas_ajuan`, `waktu_pengajuan_fungsional`, `status_pengajuan_fungsional`, `status_kenaikan_pangkat`, `keterangan_pengajuan_fungsional`, `report_pengajuan_fungsional`) VALUES
(6, 14, 29, 7, '2020-08-19 03:08:51', 1, 1, 'Baik', 'laporan_pegawai_6'),
(7, 14, 29, 7, '2020-08-19 03:08:51', 1, 1, 'Baik', 'laporan_pegawai_6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aju_naikpangkat_ijazah`
--

CREATE TABLE `tbl_aju_naikpangkat_ijazah` (
  `id_ajuan_ijazah` int(11) NOT NULL,
  `id_berkas_ajuan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `keterangan_pengajuan_ijazah` tinytext DEFAULT NULL,
  `report_pengajuan_ijazah` varchar(255) DEFAULT NULL,
  `status_pengajuan_ijazah` int(11) DEFAULT NULL,
  `waktu_pengajuan_ijazah` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aju_naikpangkat_ijazah`
--

INSERT INTO `tbl_aju_naikpangkat_ijazah` (`id_ajuan_ijazah`, `id_berkas_ajuan`, `id_pegawai`, `id_users`, `keterangan_pengajuan_ijazah`, `report_pengajuan_ijazah`, `status_pengajuan_ijazah`, `waktu_pengajuan_ijazah`) VALUES
(1, 1, 14, NULL, 'Telah Diperiksa', NULL, NULL, '2020-08-19 04:08:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_aju_naikpangkat_struktural`
--

CREATE TABLE `tbl_aju_naikpangkat_struktural` (
  `id_ajuan_struktural` int(11) NOT NULL,
  `id_berkas_ajuan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `usulan_jabatan_struktural` int(11) NOT NULL,
  `keterangan_pengajuan_struktural` tinytext DEFAULT NULL,
  `report_pengajuan_struktural` varchar(255) DEFAULT NULL,
  `status_pengajuan_struktural` int(11) DEFAULT NULL,
  `status_kenaikan_pangkat` int(11) NOT NULL COMMENT '0 = belum naik, 1 = telah naik',
  `waktu_pengajuan_struktural` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_aju_naikpangkat_struktural`
--

INSERT INTO `tbl_aju_naikpangkat_struktural` (`id_ajuan_struktural`, `id_berkas_ajuan`, `id_pegawai`, `id_users`, `usulan_jabatan_struktural`, `keterangan_pengajuan_struktural`, `report_pengajuan_struktural`, `status_pengajuan_struktural`, `status_kenaikan_pangkat`, `waktu_pengajuan_struktural`) VALUES
(3, 3, 14, 29, 10, 'Telah Disetuji', 'laporan_pegawai_3', 1, 1, '2020-08-20 07:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anak`
--

CREATE TABLE `tbl_anak` (
  `id_anak` int(11) NOT NULL,
  `nama_anak` varchar(300) DEFAULT NULL,
  `tgl_lahir_anak` date DEFAULT NULL,
  `thn_usia_anak` varchar(50) DEFAULT NULL,
  `bln_usia_anak` varchar(50) DEFAULT NULL,
  `jk_anak` varchar(50) DEFAULT NULL,
  `ket_anak` varchar(50) DEFAULT NULL,
  `id_kel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anak`
--

INSERT INTO `tbl_anak` (`id_anak`, `nama_anak`, `tgl_lahir_anak`, `thn_usia_anak`, `bln_usia_anak`, `jk_anak`, `ket_anak`, `id_kel`) VALUES
(6, 'Shirakami Fubuki', '2020-07-09', '0', '0', 'Perempuan', 'Manis                                             ', 1),
(7, 'Natsuiro Matsuri', '2016-07-05', '4', '48', 'Perempuan', 'Aneh                                   ', 1),
(9, 'Dua', '2020-08-06', '-1', '-12', 'Laki-Laki', '                    Autis                ', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas_pengajuan_fungsional`
--

CREATE TABLE `tbl_berkas_pengajuan_fungsional` (
  `id_berkas` int(11) NOT NULL,
  `skpangkat` varchar(255) NOT NULL,
  `skjabfung` varchar(255) NOT NULL,
  `skjft` varchar(255) NOT NULL,
  `skp` varchar(255) NOT NULL,
  `pak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas_pengajuan_fungsional`
--

INSERT INTO `tbl_berkas_pengajuan_fungsional` (`id_berkas`, `skpangkat`, `skjabfung`, `skjft`, `skp`, `pak`) VALUES
(7, 'skpangkat.pdf', 'skjabfung.pdf', 'skjft.pdf', '', 'pak.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas_pengajuan_ijazah`
--

CREATE TABLE `tbl_berkas_pengajuan_ijazah` (
  `id_berkas` int(11) NOT NULL,
  `skpangkat` varchar(255) NOT NULL,
  `ijazah` varchar(255) NOT NULL,
  `srtlulus` varchar(255) NOT NULL,
  `srtbelajar` varchar(255) NOT NULL,
  `srttgs` varchar(255) NOT NULL,
  `skp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas_pengajuan_ijazah`
--

INSERT INTO `tbl_berkas_pengajuan_ijazah` (`id_berkas`, `skpangkat`, `ijazah`, `srtlulus`, `srtbelajar`, `srttgs`, `skp`) VALUES
(1, 'skpangkat.pdf', 'ijazah.pdf', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas_pengajuan_pensiun`
--

CREATE TABLE `tbl_berkas_pengajuan_pensiun` (
  `id_berkas_pengajuan_pensiun` int(11) NOT NULL,
  `surat_pimpinan_uker` varchar(255) DEFAULT NULL,
  `surat_permohonan_pns` varchar(255) DEFAULT NULL,
  `dpcp` varchar(255) DEFAULT NULL,
  `skcpns_skpangkat_akhir` varchar(255) DEFAULT NULL,
  `sk_jabatan` varchar(255) DEFAULT NULL,
  `karpeg` varchar(255) DEFAULT NULL,
  `surat_nikah_cerai` varchar(255) DEFAULT NULL,
  `surat_kenal_anak` varchar(255) DEFAULT NULL,
  `kartu_keluarga` varchar(255) DEFAULT NULL,
  `pas_foto` varchar(255) DEFAULT NULL,
  `formulir_permintaan_pembayaran_pensiun` varchar(255) DEFAULT NULL,
  `foto_kopi_buku_rekening` varchar(255) DEFAULT NULL,
  `penilaian_prestasi` varchar(255) DEFAULT NULL,
  `surat_pernyataan_tidak_dijatuhi_hukum` varchar(255) DEFAULT NULL,
  `surat_pernyataan_tidak_berproses_pidana` varchar(255) DEFAULT NULL,
  `surat_kematian` varchar(255) DEFAULT NULL,
  `surat_keterangan_janda_duda_anak_orangtua` varchar(255) DEFAULT NULL,
  `surat_ahli_waris` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas_pengajuan_pensiun`
--

INSERT INTO `tbl_berkas_pengajuan_pensiun` (`id_berkas_pengajuan_pensiun`, `surat_pimpinan_uker`, `surat_permohonan_pns`, `dpcp`, `skcpns_skpangkat_akhir`, `sk_jabatan`, `karpeg`, `surat_nikah_cerai`, `surat_kenal_anak`, `kartu_keluarga`, `pas_foto`, `formulir_permintaan_pembayaran_pensiun`, `foto_kopi_buku_rekening`, `penilaian_prestasi`, `surat_pernyataan_tidak_dijatuhi_hukum`, `surat_pernyataan_tidak_berproses_pidana`, `surat_kematian`, `surat_keterangan_janda_duda_anak_orangtua`, `surat_ahli_waris`) VALUES
(16, 'supuk.pdf', 'sppyb.pdf', 'dpcpp.pdf', 'skcpskpt.pdf', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 'supuk.pdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 'supuk.pdf', 'sppyb.pdf', 'dpcpp.pdf', 'skcpskpt.pdf', 'skjbt.pdf', 'kpe.pdf', 'askc.pdf', 'askla25.pdf', 'kkdskys.pdf', 'pfb3x4.pdf', 'fppp.pdf', 'fkbr.pdf', 'pp1tr.pdf', 'sptpdhdts.pdf', 'sptsmppapdpbpp.pdf', 'awys.pdf', 'ask.pdf', 'skjdaot.pdf'),
(19, 'supuk.pdf', 'sppyb.pdf', 'dpcpp.pdf', 'skcpskpt.pdf', 'skjbt.pdf', 'kpe.pdf', 'askc.pdf', 'askla25.pdf', 'kkdskys.pdf', 'pfb3x4.pdf', 'fppp.pdf', 'fkbr.pdf', 'pp1tr.pdf', 'sptpdhdts.pdf', 'sptsmppapdpbpp.pdf', 'awys.pdf', 'ask.pdf', 'skjdaot.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas_pengajuan_struktural`
--

CREATE TABLE `tbl_berkas_pengajuan_struktural` (
  `id_berkas` int(11) NOT NULL,
  `skpangkat` varchar(255) NOT NULL,
  `srtjab` varchar(255) NOT NULL,
  `srtdukjab` varchar(255) NOT NULL,
  `srtlatih` varchar(255) NOT NULL,
  `srttgs` varchar(255) NOT NULL,
  `skp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas_pengajuan_struktural`
--

INSERT INTO `tbl_berkas_pengajuan_struktural` (`id_berkas`, `skpangkat`, `srtjab`, `srtdukjab`, `srtlatih`, `srttgs`, `skp`) VALUES
(3, 'skpangkat.pdf', 'skjab.pdf', 'srtdukjab.pdf', 'srtlatih.pdf', 'srttgs.pdf', 'skp.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cpns`
--

CREATE TABLE `tbl_cpns` (
  `id_cpns` int(11) NOT NULL,
  `nomor_sk_cpns` varchar(50) DEFAULT NULL,
  `tgl_sk_cpns` date DEFAULT NULL,
  `oleh_pejabat_cpns` varchar(50) DEFAULT NULL,
  `tmt_cpns` date DEFAULT NULL,
  `thn_pmk_cpns` varchar(50) DEFAULT NULL,
  `bln_pmk_cpns` varchar(50) DEFAULT NULL,
  `pengurangan_thn_cpns` int(11) DEFAULT NULL,
  `pangkat_cpns` varchar(100) DEFAULT NULL COMMENT 'Pangkat / Gol / Ruang : cnth : Penata muda / III/ a',
  `tmt_real_cpns` varchar(50) DEFAULT NULL,
  `mks_thn_cpns` varchar(50) DEFAULT NULL,
  `mks_bln_cpns` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cpns`
--

INSERT INTO `tbl_cpns` (`id_cpns`, `nomor_sk_cpns`, `tgl_sk_cpns`, `oleh_pejabat_cpns`, `tmt_cpns`, `thn_pmk_cpns`, `bln_pmk_cpns`, `pengurangan_thn_cpns`, `pangkat_cpns`, `tmt_real_cpns`, `mks_thn_cpns`, `mks_bln_cpns`, `id_pegawai`) VALUES
(1, '08212144244', '2020-07-07', '-', '1987-03-01', '0', '0', 0, 'Penata Muda Tk. 1/3/b', '1987-03-01', '33', '5', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(12, '08212144244', '0000-00-00', '', '0000-00-00', '0', '0', 0, 'Penata/3/c', '', '0', '0', 14),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(14, '2231312', '2020-08-18', 'Jeffrian Komaru', '2015-03-18', '0', '0', 0, 'Pengatur Tk. 1/2/d', '2015-03-18', '5', '4', 16),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(20, '2131312', '2020-08-11', '12321312', '2020-08-11', '0', '0', 0, 'Pembina Utama Muda/4/c', '2020-08-11', '0', '0', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_alumni`
--

CREATE TABLE `tbl_data_alumni` (
  `id_data_alumni` int(11) DEFAULT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_mahasiswa`
--

CREATE TABLE `tbl_data_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nama_mahasiswa` int(11) DEFAULT NULL,
  `jurusan_mahasiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diklat_pelatihan`
--

CREATE TABLE `tbl_diklat_pelatihan` (
  `id_diklat` int(11) NOT NULL,
  `latihan_jabatan_diklat` varchar(300) DEFAULT NULL,
  `time_diklat` datetime DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_diklat_pelatihan`
--

INSERT INTO `tbl_diklat_pelatihan` (`id_diklat`, `latihan_jabatan_diklat`, `time_diklat`, `id_pegawai`) VALUES
(1, 'Pra Jabatan Tingkat III', '1998-07-21 08:00:00', 1),
(2, NULL, NULL, 5),
(3, NULL, NULL, 6),
(4, NULL, NULL, 7),
(5, NULL, NULL, 8),
(6, NULL, NULL, 9),
(7, NULL, NULL, 10),
(8, NULL, NULL, 11),
(9, NULL, NULL, 13),
(10, 'Penata Ruangan', '2020-08-12 02:12:00', 14),
(11, NULL, NULL, 15),
(12, NULL, NULL, 16),
(13, NULL, NULL, 17),
(14, NULL, NULL, 19),
(15, NULL, NULL, 20),
(16, NULL, NULL, 21),
(17, '2sdasdsa', '2020-08-11 02:01:00', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gelar`
--

CREATE TABLE `tbl_gelar` (
  `id_gelar` int(11) NOT NULL,
  `prof_gelar` varchar(30) DEFAULT NULL,
  `h_hj_gelar` varchar(30) DEFAULT NULL,
  `doktor_gelar` varchar(255) DEFAULT NULL,
  `magister_gelar` varchar(255) DEFAULT NULL,
  `strata_1_gelar` varchar(255) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gelar`
--

INSERT INTO `tbl_gelar` (`id_gelar`, `prof_gelar`, `h_hj_gelar`, `doktor_gelar`, `magister_gelar`, `strata_1_gelar`, `id_pegawai`) VALUES
(1, 'Prof.', 'H.', '', '', '', 12),
(2, 'Prof.', 'H.', '', '', '', 0),
(3, NULL, NULL, '', '', '', 3),
(4, NULL, NULL, '', '', '', 4),
(5, NULL, NULL, '', '', '', 5),
(6, NULL, NULL, '', '', '', 6),
(7, NULL, NULL, '', '', '', 7),
(8, NULL, NULL, '', '', '', 8),
(9, '', '', '', '', '', 9),
(10, NULL, NULL, '', '', '', 10),
(11, NULL, NULL, '', '', '', 11),
(12, NULL, NULL, '', '', '', 13),
(13, 'Prof.', 'Hj.', 'Dr', 'MT', 'ST', 14),
(14, '', '', '', '', '', 15),
(15, 'Prof.', 'H.', '', '', '', 16),
(16, NULL, NULL, '', '', '', 17),
(17, NULL, NULL, NULL, NULL, NULL, 18),
(18, NULL, NULL, NULL, NULL, NULL, 19),
(19, NULL, NULL, NULL, NULL, NULL, 20),
(20, NULL, NULL, NULL, NULL, NULL, 21),
(21, 'Prof.', 'H.', 'Dr', 'MT', 'ST', 22);

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
(51, 4, 21),
(52, 11, 22),
(55, 4, 46),
(56, 4, 43),
(57, 5, 26),
(58, 5, 27),
(59, 5, 28),
(60, 5, 29),
(61, 5, 30),
(62, 5, 31),
(63, 5, 32),
(64, 6, 33),
(65, 6, 34),
(66, 6, 35),
(67, 6, 36),
(69, 10, 33),
(70, 10, 34),
(71, 10, 35),
(72, 10, 36),
(73, 8, 33),
(74, 8, 34),
(75, 8, 35),
(76, 8, 36),
(77, 9, 37),
(78, 9, 38),
(79, 9, 39),
(80, 9, 40),
(81, 9, 41),
(82, 2, 1),
(84, 10, 48),
(85, 12, 22),
(86, 13, 22),
(87, 5, 64);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_impassing`
--

CREATE TABLE `tbl_impassing` (
  `id_impassing` int(11) NOT NULL,
  `no_sk_impassing` varchar(100) DEFAULT NULL,
  `tgl_sk_impassing` date DEFAULT NULL,
  `oleh_pejabat_impassing` varchar(300) DEFAULT NULL,
  `tmt_impassing` date DEFAULT NULL,
  `mkg_thn_impassing` varchar(50) DEFAULT NULL,
  `mkg_bln_impassing` varchar(50) DEFAULT NULL,
  `thn_mkg_berikutnya_impassing` varchar(50) DEFAULT NULL,
  `bln_mkg_berikutnya_impasssing` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_impassing`
--

INSERT INTO `tbl_impassing` (`id_impassing`, `no_sk_impassing`, `tgl_sk_impassing`, `oleh_pejabat_impassing`, `tmt_impassing`, `mkg_thn_impassing`, `mkg_bln_impassing`, `thn_mkg_berikutnya_impassing`, `bln_mkg_berikutnya_impasssing`, `id_pegawai`) VALUES
(1, 'T/1838/UN29.2/KP.08.02/2019', '2019-04-12', 'Wakil Rektor Bidang Umum dan Keuangan', '2019-01-01', '0', '0', '0', '0', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(12, 'sadsadasdas', '0000-00-00', 'sadasdsa', '0000-00-00', '0', '0', '0', '0', 14),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(20, '312312312', '2020-08-26', '1233112312', '2020-08-13', '0', '0', '0', '0', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info_jadwal_kuliah`
--

CREATE TABLE `tbl_info_jadwal_kuliah` (
  `id_jadwal_kuliah` int(11) NOT NULL,
  `id_mata_kuliah` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `hari_jadwal_kuliah` varchar(255) NOT NULL,
  `jam_masuk_kuliah` time NOT NULL,
  `jam_keluar_kuliah` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_info_jadwal_kuliah`
--

INSERT INTO `tbl_info_jadwal_kuliah` (`id_jadwal_kuliah`, `id_mata_kuliah`, `id_pegawai`, `hari_jadwal_kuliah`, `jam_masuk_kuliah`, `jam_keluar_kuliah`) VALUES
(5, 6, 15, 'selasa', '06:00:00', '07:30:00'),
(6, 6, 22, 'jumat', '03:02:00', '10:10:00'),
(7, 9, 22, 'kamis', '00:10:00', '00:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jab` int(11) NOT NULL,
  `tmt_jab_fungsional` date DEFAULT NULL,
  `id_kategori_jab_fungsional` int(11) DEFAULT NULL,
  `tmt_jab_struktural` date DEFAULT NULL,
  `id_kat_jab_struktural` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jab`, `tmt_jab_fungsional`, `id_kategori_jab_fungsional`, `tmt_jab_struktural`, `id_kat_jab_struktural`, `id_pegawai`) VALUES
(1, '2007-05-01', 2, '0000-00-00', 0, 1),
(2, '2020-07-08', 1, '0000-00-00', 0, 1),
(3, NULL, NULL, '0000-00-00', 0, 5),
(4, NULL, NULL, '0000-00-00', 0, 6),
(5, NULL, NULL, '0000-00-00', 0, 7),
(6, NULL, NULL, '0000-00-00', 0, 8),
(7, NULL, NULL, '0000-00-00', 0, 9),
(8, NULL, NULL, '0000-00-00', 0, 10),
(9, NULL, NULL, '0000-00-00', 0, 11),
(10, NULL, NULL, '0000-00-00', 0, 13),
(11, NULL, NULL, '0000-00-00', 0, 14),
(12, NULL, NULL, '0000-00-00', 0, 15),
(13, NULL, NULL, '0000-00-00', 0, 16),
(14, NULL, NULL, '0000-00-00', 0, 17),
(15, '2020-08-19', 5, '2020-08-23', 4, 14),
(16, '2020-08-26', 2, '2020-08-24', 18, 14),
(17, '2020-08-26', 1, '0000-00-00', 4, 15),
(18, '2020-08-26', 5, '2020-08-25', 4, 15),
(19, '0000-00-00', 1, '0000-00-00', 4, 17),
(20, '2020-08-28', 1, '0000-00-00', 4, 17),
(21, '2020-08-21', 2, '2020-08-12', 24, 14),
(22, '2020-08-21', 1, '2020-08-12', 24, 0),
(23, '2020-08-21', 3, '2020-08-12', 24, 14),
(24, '2020-08-21', 1, '2020-08-12', 24, 14),
(25, '2020-08-12', 24, '2020-08-21', 24, 14),
(26, '2020-08-21', 1, '2020-08-21', 21, 14),
(27, '2020-08-21', 1, '2020-08-21', 3, 14),
(28, '2020-08-21', 2, '2020-08-21', 3, 14),
(29, '2020-08-21', 2, '2020-08-21', 15, 14),
(30, '2020-08-21', 1, '2020-08-21', 15, 14),
(31, '2020-08-21', 2, '2020-08-21', 15, 14),
(32, '2020-08-21', 2, '2020-08-21', 15, 14),
(33, '2020-08-21', 1, '2020-08-21', 15, 14),
(34, '2020-08-21', 3, '2020-08-21', 15, 14),
(35, '2020-08-21', 1, '2020-08-21', 15, 14),
(36, '2020-08-21', 2, '2020-08-21', 15, 14),
(37, '2020-08-21', 3, '2020-08-21', 15, 14),
(38, '2020-08-21', 3, '2020-08-21', 12, 14),
(39, NULL, NULL, NULL, 0, 21),
(40, '2020-08-17', 4, '2020-08-25', 12, 21),
(41, NULL, NULL, NULL, 0, 22),
(42, '2020-08-19', 3, '2020-08-19', 12, 22),
(43, '2020-08-19', 3, '2020-08-19', 12, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL,
  `nama_fakultas` varchar(255) NOT NULL,
  `nama_ketua_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `id_user`, `nama_jurusan`, `nama_fakultas`, `nama_ketua_jurusan`) VALUES
(11, 52, 'Jurnalistik S1', 'Fakultas Ilmu Sosial dan Ilmu Politik', 'Gagas Aliansi Cakrawala'),
(12, 53, 'Ilmu Sosiologi S1', 'Fakultas Ilmu Sosila dan Ilmu Politik', 'I Komang Gugus Nusantara'),
(13, 54, 'Ilmu Politik Dalam Negeri S1', 'Fakultas Ilmu Sosial dan Politik', 'Muh Fatahillah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_jabatan_fung`
--

CREATE TABLE `tbl_kategori_jabatan_fung` (
  `id_kategori_jabatan_fung` int(11) NOT NULL,
  `nama_kategori_fung` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_jabatan_fung`
--

INSERT INTO `tbl_kategori_jabatan_fung` (`id_kategori_jabatan_fung`, `nama_kategori_fung`) VALUES
(1, 'Guru Besar'),
(2, 'Lektor Kepala'),
(3, 'Lektor'),
(4, 'Asisten Ahli'),
(5, 'Tenaga Pengajar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_jabatan_struktur`
--

CREATE TABLE `tbl_kategori_jabatan_struktur` (
  `id_kat_jbt_struktur` int(11) NOT NULL,
  `nama_jabatan_struktur` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_jabatan_struktur`
--

INSERT INTO `tbl_kategori_jabatan_struktur` (`id_kat_jbt_struktur`, `nama_jabatan_struktur`) VALUES
(1, 'Dekan'),
(2, 'Wakil Dekan I'),
(3, 'Wakil Dekan II'),
(4, 'Wakil Dekan III'),
(5, 'Kepala Bagian Tata Usaha'),
(6, 'Kepala Subbagian Akademik'),
(7, 'Kepala Subbagian Kemahasiswaan dan Alumni'),
(8, 'Kepala Subbagian Keuangan dan Kepegawaian'),
(9, 'Kepala Subbagian Umum dan Sarana Akademik'),
(10, 'Ketua Jurusan'),
(11, 'Sekertaris Jurusan'),
(12, 'Dosen'),
(13, 'Koordinator / Ketua Program Studi'),
(14, 'Kepala Laboratorium'),
(15, 'Teknisi Laboratorium'),
(16, 'Pengelola Informasi Akademik'),
(17, 'Pengadministrasi Akademik'),
(18, 'Pengadministrasi Sarana dan Prasarana'),
(19, 'Pengadministrasi Kemahasiswaan dan Alumni'),
(20, 'Pengadministrasi Layanan Kegiatan Kemahasiswaan'),
(21, 'Pengolah Data'),
(22, 'Pengolah Keuangan'),
(23, 'Pengadministrasi Keuangan'),
(24, 'Pengadministrasi Kepegawaian'),
(25, 'Pengelola Barang Milik Negara'),
(26, 'Pengadministrasi Umum'),
(27, 'Pengadministrasi Persuratan'),
(28, 'Teknisi Peralatan Kantor'),
(29, 'Pranata Kearsipan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_klasifikasi_jabatan`
--

CREATE TABLE `tbl_kategori_klasifikasi_jabatan` (
  `id_klasifikasi` int(11) NOT NULL,
  `nama_klasifikasi_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_klasifikasi_jabatan`
--

INSERT INTO `tbl_kategori_klasifikasi_jabatan` (`id_klasifikasi`, `nama_klasifikasi_jabatan`) VALUES
(1, 'Dekan'),
(2, 'Wakil Dekan Bidang Akademik'),
(3, 'Wakil Dekan Bidang Umum, Keuangan, Dan Perencanaan'),
(4, 'Wakil Dekan Bidang Kemahasiswaan dan Alumni'),
(5, 'Ketua Jurusan'),
(6, 'Kordinator Program Studi'),
(7, 'Ketua'),
(8, 'Ketua Konsentrasi'),
(9, 'Ketua Unit Jaminan Mutu dan Sistem informasi'),
(10, 'Kepala'),
(11, 'Wakil Ketua'),
(12, 'Sekretaris Unit Jaminan Mutu dan Sistem Informasi'),
(13, 'Sekretaris Jurusan'),
(14, 'Kepala Lab'),
(15, 'Sekretaris Senat'),
(16, 'Kordinator'),
(17, 'Sekretaris Program Studi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_pendidikan`
--

CREATE TABLE `tbl_kategori_pendidikan` (
  `id_kategori_pendidikan` int(11) NOT NULL,
  `nama_kategori_pendidikan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_pendidikan`
--

INSERT INTO `tbl_kategori_pendidikan` (`id_kategori_pendidikan`, `nama_kategori_pendidikan`) VALUES
(1, 'S-3'),
(2, 'S-2'),
(3, 'S-1'),
(4, 'D-4'),
(5, 'Spesialis-1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_tugastambahan`
--

CREATE TABLE `tbl_kategori_tugastambahan` (
  `id_kategori_tugastambahan` int(11) NOT NULL,
  `nama_kategori_tugastambahan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_tugastambahan`
--

INSERT INTO `tbl_kategori_tugastambahan` (`id_kategori_tugastambahan`, `nama_kategori_tugastambahan`) VALUES
(1, 'Universitas Halu Oleo'),
(2, 'Fakultas Ekonomi Dan Bisnis'),
(3, 'Fakultas Farmasi'),
(4, 'Fakultas Hukum'),
(5, 'Fakultas Kehutanan dan Ilmu Lingkungan'),
(6, 'Fakultas Ilmu Budaya'),
(7, 'Fakultas Ilmu Sosial dan Politik'),
(8, 'Fakultas Ilmu dan Teknologi Kebumian'),
(9, 'Fakultas Ilmu Budaya'),
(10, 'Fakultas Ilmu Sosial dan Ilmu Politik');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `nama_istri_suami_kel` varchar(500) DEFAULT NULL,
  `tgl_nikah_kel` date DEFAULT NULL,
  `id_anak` int(11) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`id_keluarga`, `nama_istri_suami_kel`, `tgl_nikah_kel`, `id_anak`, `id_pegawai`) VALUES
(1, 'Mimin', '2020-07-21', 1, 1),
(2, NULL, NULL, NULL, 5),
(3, NULL, NULL, NULL, 6),
(4, NULL, NULL, NULL, 7),
(5, NULL, NULL, NULL, 8),
(6, NULL, NULL, NULL, 9),
(7, NULL, NULL, NULL, 10),
(8, NULL, NULL, NULL, 11),
(9, NULL, NULL, NULL, 13),
(10, 'Julaeni', '2020-08-12', NULL, 14),
(11, NULL, NULL, NULL, 15),
(12, NULL, NULL, NULL, 16),
(13, NULL, NULL, NULL, 17),
(14, NULL, NULL, NULL, 19),
(15, NULL, NULL, NULL, 20),
(16, NULL, NULL, NULL, 21),
(17, 'Sumira', '2020-08-18', NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kgb`
--

CREATE TABLE `tbl_kgb` (
  `id_kgb` int(11) NOT NULL,
  `no_sk_kgb` varchar(100) DEFAULT NULL,
  `tgl_sk_kgb` date DEFAULT NULL,
  `oleh_pejabat_kgb` varchar(300) DEFAULT NULL,
  `terakhir_kgb` varchar(100) DEFAULT NULL,
  `thn_kgb` varchar(50) DEFAULT NULL,
  `bln_kgb` varchar(50) DEFAULT NULL,
  `berikutnya_kgb` varchar(100) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kgb`
--

INSERT INTO `tbl_kgb` (`id_kgb`, `no_sk_kgb`, `tgl_sk_kgb`, `oleh_pejabat_kgb`, `terakhir_kgb`, `thn_kgb`, `bln_kgb`, `berikutnya_kgb`, `id_pegawai`) VALUES
(1, '-', '2020-07-14', '-', '2019-03-01', '32', '0', '-', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(12, 'sadasdas', '0000-00-00', '', '', NULL, NULL, '', 14),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(20, '12312', '2020-08-11', '12312312', '2020-08-18', '0', '0', '', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kum_fungsi_tertentu`
--

CREATE TABLE `tbl_kum_fungsi_tertentu` (
  `id_kum_jab_fungsional` int(11) NOT NULL,
  `ak_penuh_kum` double DEFAULT NULL,
  `ak_kum` int(11) DEFAULT NULL,
  `lebihan_kum` int(11) DEFAULT NULL,
  `tmt_kum` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kum_fungsi_tertentu`
--

INSERT INTO `tbl_kum_fungsi_tertentu` (`id_kum_jab_fungsional`, `ak_penuh_kum`, `ak_kum`, `lebihan_kum`, `tmt_kum`) VALUES
(1, 11170.71, 1050, 120, '2007-05-01');

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
-- Table structure for table `tbl_mata_kuliah`
--

CREATE TABLE `tbl_mata_kuliah` (
  `id_mata_kuliah` int(11) NOT NULL,
  `nama_mata_kuliah` varchar(255) NOT NULL,
  `semester_mata_kuliah` varchar(255) NOT NULL,
  `sks_mata_kuliah` int(11) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mata_kuliah`
--

INSERT INTO `tbl_mata_kuliah` (`id_mata_kuliah`, `nama_mata_kuliah`, `semester_mata_kuliah`, `sks_mata_kuliah`, `id_jurusan`) VALUES
(6, 'Penulisan Media Berita ', '6', 4, 11),
(7, 'Merangkai kata Yang Baik', '6', 2, 11),
(8, 'Cuci kaki Yang Benar dan Tepat', '1', 4, 11),
(9, 'Ilmu Politik S1', '12', 9, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `is_main_menu` int(11) NOT NULL,
  `is_aktif` enum('y','n') NOT NULL COMMENT 'y=yes,n=no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `title`, `url`, `icon`, `is_main_menu`, `is_aktif`) VALUES
(1, 'Kelola Menu', 'Kelolamenu', 'mdi mdi mdi-folder-multiple-ou', 0, 'y'),
(2, 'Kelola Pengguna', 'User', 'mdi mdi-account-multiple menu-', 0, 'y'),
(4, 'Level Pengguna', 'Userlevel', 'mdi mdi-account-multiple-plus ', 0, 'y'),
(21, 'Verifikasi Berkas Alumni', 'Akademik/verifikasi_berkas_alumni', 'mdi mdi-school menu-icon', 0, 'y'),
(22, 'Data Jadwal Mengajar', 'Jurusan/data_jadwal_mengajar', 'mdi mdi-script menu-icon', 0, 'y'),
(23, 'Verifikasi Aktif Kuliah', 'Akademik/verifikasi_aktif_kuliah', 'mdi mdi-human-greeting menu-ic', 46, 'y'),
(24, 'Verifikasi Penelitian', 'Akademik/verifikasi_penelitian', 'mdi mdi-receipt menu-icon', 46, 'y'),
(25, 'Verifikasi Proposal', 'Akademik/verifikasi_proposal', 'mdi mdi-scale-bathroom menu-ic', 46, 'y'),
(26, 'Data Induk Pegawai', '', 'mdi mdi-file menu-icon', 0, 'y'),
(27, 'Verifikasi Pengajuan', '', 'mdi mdi-account-star menu-icon', 0, 'y'),
(28, 'Data Pensiun', 'Pegawai/data_pensiun', 'mdi mdi-account-settings menu-', 0, 'y'),
(29, 'Verifikasi Kenaikan Pangkat Jabatan Fungsional', 'Pegawai/verifikasi_naikpangkat_fungsional', 'mdi mdi-account-edit', 27, 'y'),
(30, 'Verifikasi Pensiun', 'Pegawai/verifikasi_pensiun', 'mdi mdi-account-edit', 27, 'y'),
(31, 'Data Cuti', 'Pegawai/mon_pegawai', 'mdi mdi-account-search menu-ic', 0, 'y'),
(32, 'Verifikasi Cuti', 'Pegawai/verifikasi_cuti', 'mdi mdi-account-edit', 27, 'y'),
(33, 'Ajukan Kenaikan Pangkat', '', 'mdi mdi-account-network menu-i', 0, 'y'),
(34, 'Ajukan Pensiun', 'Dashboard_p/ajukan_pensiun', 'mdi mdi-account-settings menu-', 0, 'y'),
(35, 'Pengisian DUK Pegawai', 'Dashboard_p', 'mdi mdi-account-card-details m', 0, 'y'),
(36, 'Pengajuan Cuti', 'Dashboard_p/pengajuan_cuti', 'mdi mdi-account-convert menu-i', 0, 'y'),
(37, 'Data Mahasiswa', 'Mahasiswa', 'mdi mdi-account-box menu-icon', 0, 'y'),
(38, 'Pengajuan Aktif Kuliah', 'Mahasiswa/pengajuan_aktif_kuliah', 'mdi mdi-human-greeting menu-ic', 0, 'y'),
(39, 'Pengajuan Penelitian', 'Mahasiswa/pengajuan_penelitian', 'mdi mdi-receipt menu-icon', 0, 'y'),
(40, 'Pengajuan Proposal', 'Mahasiswa/pengajuan_proposal', 'mdi mdi-scale-bathroom menu-ic', 0, 'y'),
(41, 'Pengajuan Skripsi', 'Mahasiswa/pengajuan_skripsi', 'mdi mdi-school menu-icon', 0, 'y'),
(43, 'Verifikasi Skripsi', 'Akademik/verifikasi_skripsi', 'mdi mdi-school menu-icon', 46, 'y'),
(46, 'Verifikasi Pengajuan Mahasiswa', 'Akademik/verifikasi_mahasiswa', 'mdi mdi-television menu-icon', 0, 'y'),
(48, 'Jadwal Mengajar', 'Dashboard_p/jadwal_mengajar', 'mdi mdi-book', 0, 'y'),
(49, 'Jadwal Mengajar Dosen', 'Jurusan/data_jadwal_mengajar', 'mdi mdi-book', 22, 'y'),
(50, 'Mata Kuliah', 'Jurusan/mata_kuliah', 'mdi mdi-book', 22, 'y'),
(51, 'List Pengajuan Pensiun', 'pegawai/monitoring_ajuan_pensiun', 'mdi mdi-account-card-details', 28, 'y'),
(52, 'List Pengajuan Cuti', 'pegawai/mon_ajuan_cuti', 'mdi mdi-account-card-details', 31, 'y'),
(53, 'List Pegawai Menjelang Pensiun', 'pegawai/monitoring_pensiun', 'mdi mdi-account-card-details', 28, 'y'),
(54, 'List Pegawai Berstatus Pensiun', 'Pegawai/reporting_pensiun', 'mdi mdi-account-card-details', 28, 'y'),
(55, 'Jabatan Pegawai', 'Pegawai/data_jabatan', 'mdi mdi-book', 26, 'y'),
(56, 'Status Pegawai', 'Pegawai/data_duk', 'mdi mdi-book', 26, 'y'),
(57, 'Ajuan Kepangkatan Fungsional', 'Dashboard_p/ajuan_naikpangkat_fungsional', 'mdi mdi-arrow-up-bold-box', 33, 'y'),
(58, 'Ajuan Kepangkatan Struktural', 'Dashboard_p/ajuan_naikpangkat_struktural', 'mdi mdi-arrow-up-bold-box', 33, 'y'),
(59, 'Ajuan Kepangkatan KPO/Reguler', 'Dashboard_p/ajuan_naikpangkat_reguler', 'mdi mdi-arrow-up-bold-box', 33, 'y'),
(60, 'Ajuan Kepangkatan Penyesuaian Ijazah', 'Dashboard_p/ajuan_naikpangkat_ijazah', 'mdi mdi-arrow-up-bold-box', 33, 'y'),
(61, 'Verifikasi Kenaikan Pangkat Jabatan Struktural', 'Pegawai/verifikasi_naikpangkat_struktural', 'mdi mdi-account-edit', 27, 'y'),
(62, 'Verifikasi Kenaikan Pangkat Penyesuaian Ijazah', 'Pegawai/verifikasi_naikpangkat_ijazah', 'mdi mdi-account-edit', 27, 'y'),
(63, 'Verifikasi Kenaikan Pangkat KPO / Reguler', 'Pegawai/verifikasi_naikpangkat_reguler', 'mdi mdi-account-edit', 27, 'y'),
(64, 'Data Kenaikan Pangkat', '', 'mdi mdi-account-star', 0, 'y'),
(65, 'List Pengajuan Cuti (Terverifikasi)', 'Pegawai/mon_cuti', 'mdi mdi-account-card-details', 31, 'y'),
(66, 'List Kenaikan Pangkat Jabatan Fungsional', 'pegawai/mon_naikpangkat_fungsional', 'mdi mdi-account-card-details', 64, 'y'),
(67, 'List Kenaikan Pangkat Jabatan Struktural', 'pegawai/mon_naikpangkat_struktural', 'mdi mdi-account-card-details', 64, 'y'),
(68, 'List Kenaikan Pangkat Penyesuaian Ijazah', 'pegawai/mon_naikpangkat_ijazah', 'mdi mdi-account-card-details', 64, 'y'),
(69, 'List Kenaikan Pangkat Reguler', 'pegawai/', 'mdi mdi-account-card-details', 64, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pangkat_terakhir`
--

CREATE TABLE `tbl_pangkat_terakhir` (
  `id_pangkat_terakhir` int(11) NOT NULL,
  `no_sk_pangkat_terakhir` varchar(100) DEFAULT NULL,
  `tgl_sk_pangkat_terakhir` date DEFAULT NULL,
  `oleh_pejabat_pangkat_terakhir` varchar(300) DEFAULT NULL,
  `pangkat_terakhir` varchar(300) DEFAULT NULL COMMENT 'Pangkat/Gol/Ruang : exmpl > Pembina Utama / IV /E',
  `tmt_pangkat_terakhir` date DEFAULT NULL,
  `thn_pangkat_terakhir` varchar(50) DEFAULT NULL,
  `bln_pangkat_terakhir` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pangkat_terakhir`
--

INSERT INTO `tbl_pangkat_terakhir` (`id_pangkat_terakhir`, `no_sk_pangkat_terakhir`, `tgl_sk_pangkat_terakhir`, `oleh_pejabat_pangkat_terakhir`, `pangkat_terakhir`, `tmt_pangkat_terakhir`, `thn_pangkat_terakhir`, `bln_pangkat_terakhir`, `id_pegawai`) VALUES
(1, '-', '2020-07-14', '-', 'Pembina Utama/4/e', '2009-10-01', '0', '0', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(20, '21312312', '2020-08-10', '321123312', 'Pengatur/2/c', '2020-08-11', '0', '0', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nip_peg` varchar(50) DEFAULT NULL,
  `status_kepegawaian_peg` char(20) DEFAULT NULL,
  `nama_tanpa_gelar_peg` varchar(300) DEFAULT NULL,
  `nama_lengkap_peg` varchar(300) DEFAULT NULL,
  `id_gelar` int(11) DEFAULT NULL,
  `jk_peg` char(20) DEFAULT NULL,
  `agama_peg` char(20) DEFAULT NULL,
  `tempat_lahir_peg` varchar(300) DEFAULT NULL,
  `kabupaten_lahir_peg` varchar(200) DEFAULT NULL,
  `tgl_lahir_peg` date DEFAULT NULL,
  `usia_thn_lahir_peg` int(11) DEFAULT NULL,
  `usia_bln_lahir_peg` int(11) DEFAULT NULL,
  `kelompok_umur_peg` varchar(50) DEFAULT NULL,
  `tmt_pensiun_peg` date DEFAULT NULL,
  `notif_pensiun_peg` bigint(20) NOT NULL,
  `tmt_masuk_peg` date NOT NULL,
  `thn_masa_kerja_pensiun_peg` varchar(50) DEFAULT NULL,
  `bln_masa_kerja_pensiun_peg` varchar(50) DEFAULT NULL,
  `karpeg_peg` varchar(100) DEFAULT NULL,
  `sertifikat_dosen_peg` varchar(100) DEFAULT NULL,
  `nidn_peg` varchar(100) DEFAULT NULL,
  `id_cpns` int(11) DEFAULT NULL,
  `id_pmk` int(11) DEFAULT NULL,
  `id_kgb` int(11) DEFAULT NULL,
  `id_impassing` int(11) DEFAULT NULL,
  `id_pangkat_terakhir` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `gaji_pokok_peg` varchar(50) DEFAULT NULL,
  `id_tgs_tambahan_dosen` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_uker` int(11) NOT NULL,
  `id_peter` int(11) DEFAULT NULL,
  `id_diklat` int(11) DEFAULT NULL,
  `id_keluarga` int(11) DEFAULT NULL,
  `alamat_rumah_peg` text DEFAULT NULL,
  `kode_pos_peg` varchar(50) DEFAULT NULL,
  `tlp_kantor_peg` varchar(50) DEFAULT NULL,
  `fax_kntr_peg` varchar(50) DEFAULT NULL,
  `tlp_rumah_peg` varchar(50) DEFAULT NULL,
  `hp_peg` varchar(50) DEFAULT NULL,
  `email_peg` varchar(200) DEFAULT NULL,
  `thn_selisih_pmk_peg` varchar(100) DEFAULT NULL,
  `bln_selisih_pmk_peg` varchar(100) DEFAULT NULL,
  `ket_peg` text DEFAULT NULL,
  `tgl_meninggal_dunia_peg` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nip_peg`, `status_kepegawaian_peg`, `nama_tanpa_gelar_peg`, `nama_lengkap_peg`, `id_gelar`, `jk_peg`, `agama_peg`, `tempat_lahir_peg`, `kabupaten_lahir_peg`, `tgl_lahir_peg`, `usia_thn_lahir_peg`, `usia_bln_lahir_peg`, `kelompok_umur_peg`, `tmt_pensiun_peg`, `notif_pensiun_peg`, `tmt_masuk_peg`, `thn_masa_kerja_pensiun_peg`, `bln_masa_kerja_pensiun_peg`, `karpeg_peg`, `sertifikat_dosen_peg`, `nidn_peg`, `id_cpns`, `id_pmk`, `id_kgb`, `id_impassing`, `id_pangkat_terakhir`, `id_jabatan`, `gaji_pokok_peg`, `id_tgs_tambahan_dosen`, `id_user`, `id_uker`, `id_peter`, `id_diklat`, `id_keluarga`, `alamat_rumah_peg`, `kode_pos_peg`, `tlp_kantor_peg`, `fax_kntr_peg`, `tlp_rumah_peg`, `hp_peg`, `email_peg`, `thn_selisih_pmk_peg`, `bln_selisih_pmk_peg`, `ket_peg`, `tgl_meninggal_dunia_peg`) VALUES
(14, '192442552018', 'Aktif', 'Isra Mira', 'Prof. Hj. Dr Isra Mira  ST', 13, 'Perempuan', 'Katolik', 'Makassar', 'Poleang', '1999-08-17', 0, 0, '21-30', '2057-08-17', 2733692400, '2020-08-20', '0', '0', '2112', '321321', '', 12, 12, 12, 12, 12, 38, NULL, 10, 49, 3, 10, 10, 10, '', '', '', '', '', '', '', '0', '0', NULL, '0000-00-00'),
(15, '02132312311232', 'Aktif', 'Muhammad Furhan', 'Muhammad Furhan.', 14, 'Laki Laki', 'Islam', '', '', '0000-00-00', 0, 0, '21-30', '2057-08-18', 2733778800, '2020-08-18', NULL, NULL, '', '', NULL, 13, 13, 13, 13, 13, NULL, NULL, 11, 50, 4, 11, 11, 11, '', '', '', '', '', '', '', '0', '0', NULL, '2020-08-21'),
(16, '2322122322', 'Aktif', 'Ardian Pelaksana', 'Prof.Dr.H. Ardian Pelaksana.ST. MT', 15, 'Laki Laki', 'Islam', 'Jakarta Selatan', 'Pumalera', '1991-08-26', 28, 336, '21-30', '2021-08-10', 1596988800, '0000-00-00', '2015', '3', '2123213', 'sadasdasdqw', '21321312', 14, 14, 14, 14, 14, NULL, NULL, 12, 51, 5, 12, 12, 12, 'Jln Penjual Teh Harum', '93321', '08122322322', '3232132', '081233223223', '081140448961', 'tehpucuk@uho.ac.id', '0', '0', NULL, '0000-00-00'),
(17, NULL, 'Aktif', 'pecellele', NULL, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, 15, 15, 15, 15, 15, NULL, NULL, 13, 52, 6, 13, 13, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(18, NULL, NULL, 'pegawai3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, 'pegawai3', NULL, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, 17, 17, 17, 17, 17, NULL, NULL, 14, 56, 7, 14, 14, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, 'pegawai4', NULL, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0000-00-00', NULL, NULL, NULL, NULL, NULL, 18, 18, 18, 18, 18, NULL, NULL, 15, 57, 8, 15, 15, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, 'Aktif', 'pegawai5', 'Muhammad Andi', 20, NULL, NULL, NULL, NULL, '1998-11-29', NULL, NULL, NULL, '2068-11-29', 3089746800, '2020-08-12', NULL, NULL, NULL, NULL, NULL, 19, 19, 19, 19, 19, 40, NULL, 16, 58, 9, 16, 16, 16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00'),
(22, '1232312332', 'Pensiun', 'Muh Fachrul', 'Prof. H. Dr Muh Fachrul MT ST', 21, 'Laki Laki', 'Islam', 'Makassar', 'Minasa Upa', NULL, 0, 0, '21-30', '2063-11-29', 2931980400, '2020-08-26', '43', '3', '12322322', '123123123', '1222322211', 20, 20, 20, 20, 20, 43, NULL, 17, 59, 10, 17, 17, 17, 'Jln Penjual Teh Harum', '93321', '040122232', '013222', '04123221', '0811404422', 'muhfachrul720@gmail.com', '0', '0', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran_ukt`
--

CREATE TABLE `tbl_pembayaran_ukt` (
  `id_pembayaran_ukt` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `lamp_bukti_pembayaran` text DEFAULT NULL,
  `semester` varchar(50) DEFAULT NULL,
  `tahun_pembayaran` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pendidikan_terakhir`
--

CREATE TABLE `tbl_pendidikan_terakhir` (
  `id_peter` int(11) NOT NULL,
  `bidang_ilmu_peter` varchar(300) DEFAULT NULL,
  `strata_peter` varchar(50) DEFAULT NULL,
  `thn_lulus_peter` varchar(50) DEFAULT NULL,
  `univ_peter` varchar(300) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pendidikan_terakhir`
--

INSERT INTO `tbl_pendidikan_terakhir` (`id_peter`, `bidang_ilmu_peter`, `strata_peter`, `thn_lulus_peter`, `univ_peter`, `id_pegawai`) VALUES
(1, 'Ilmu Ekonomi Pertanian', 'S1', '2002', 'Universitas Gadjah Mada', 1),
(2, NULL, NULL, NULL, NULL, 5),
(3, NULL, NULL, NULL, NULL, 6),
(4, NULL, NULL, NULL, NULL, 7),
(5, NULL, NULL, NULL, NULL, 8),
(6, NULL, NULL, NULL, NULL, 9),
(7, NULL, NULL, NULL, NULL, 10),
(8, NULL, NULL, NULL, NULL, 11),
(9, NULL, NULL, NULL, NULL, 13),
(10, 'Teknik Elektro', 'Spesialis', '1996', 'Universitas Diatas Langit', 14),
(11, NULL, NULL, NULL, NULL, 15),
(12, NULL, NULL, NULL, NULL, 16),
(13, NULL, NULL, NULL, NULL, 17),
(14, NULL, NULL, NULL, NULL, 19),
(15, NULL, NULL, NULL, NULL, 20),
(16, NULL, NULL, NULL, NULL, 21),
(17, 'Cuci Kaki', 'S-2', '2015', 'Universitas Berada Dibawah Tanah', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_aktif_kuliah`
--

CREATE TABLE `tbl_pengajuan_aktif_kuliah` (
  `id_pengajuan_aktif_kuliah` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_cuti`
--

CREATE TABLE `tbl_pengajuan_cuti` (
  `id_pengajuan_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL DEFAULT 0,
  `id_users` int(11) NOT NULL DEFAULT 0,
  `jenis_pengajuan_cuti` int(11) NOT NULL,
  `alasan_pengajuan_cuti` tinytext DEFAULT NULL,
  `alamat_pengajuan_cuti` tinytext NOT NULL,
  `telepon_pengajuan_cuti` varchar(255) NOT NULL,
  `jml_bln_cuti` int(11) NOT NULL,
  `jml_thn_cuti` int(11) NOT NULL,
  `tgl_cuti` date DEFAULT NULL,
  `jml_hari_cuti` int(11) DEFAULT NULL,
  `status_cuti` int(11) DEFAULT NULL,
  `waktu_pengajuan_cuti` datetime NOT NULL,
  `keterangan_pengajuan_cuti` tinytext DEFAULT NULL,
  `Kuota_cuti_thn_n` int(11) NOT NULL,
  `Kuota_cuti_thn_1` int(11) NOT NULL,
  `Kuota_cuti_thn_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_cuti`
--

INSERT INTO `tbl_pengajuan_cuti` (`id_pengajuan_cuti`, `id_pegawai`, `id_users`, `jenis_pengajuan_cuti`, `alasan_pengajuan_cuti`, `alamat_pengajuan_cuti`, `telepon_pengajuan_cuti`, `jml_bln_cuti`, `jml_thn_cuti`, `tgl_cuti`, `jml_hari_cuti`, `status_cuti`, `waktu_pengajuan_cuti`, `keterangan_pengajuan_cuti`, `Kuota_cuti_thn_n`, `Kuota_cuti_thn_1`, `Kuota_cuti_thn_2`) VALUES
(11, 14, 29, 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', ', but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset', '081122322322', 0, 0, '2020-08-11', 7, 1, '2020-08-20 09:08:13', '0_/1_/2_/3_/4_/', 0, 4, 0),
(12, 14, 29, 2, ', but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset', ', but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset', '0812322322', 0, 0, '2020-08-25', 15, 2, '2020-08-20 09:08:41', '0_/1_/2_/3_/4_/', 0, 0, 0),
(13, 22, 29, 2, 'Sa malas', 'Jln Belimbing No 31', '0812321321', 0, 0, '2020-08-18', 7, 1, '2020-08-21 09:08:26', '0_/1_/2_/3_/4_/', 10, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_cuti_kuliah`
--

CREATE TABLE `tbl_pengajuan_cuti_kuliah` (
  `id_pengajuan_cuti_kuliah` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_izipen`
--

CREATE TABLE `tbl_pengajuan_izipen` (
  `id_pengajuan_izipen` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `lamp_ttd_revisi_proposal` text DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL COMMENT '1 = belum di verifikasi, 2 = sudah di verifikasi, 3 = di tolak, 4 = di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_pangkat`
--

CREATE TABLE `tbl_pengajuan_pangkat` (
  `id_pengajuan_pangkat` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_pensiun`
--

CREATE TABLE `tbl_pengajuan_pensiun` (
  `id_pengajuan_pensiun` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_berkas_pengajuan_pensiun` int(11) NOT NULL,
  `status_pengajuan` int(11) DEFAULT NULL,
  `waktu_pengajuan_pensiun` datetime NOT NULL,
  `keterangan_pengajuan_pensiun` tinytext DEFAULT NULL,
  `laporan_pengajuan_pensiun` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan_pensiun`
--

INSERT INTO `tbl_pengajuan_pensiun` (`id_pengajuan_pensiun`, `id_pegawai`, `id_users`, `id_berkas_pengajuan_pensiun`, `status_pengajuan`, `waktu_pengajuan_pensiun`, `keterangan_pengajuan_pensiun`, `laporan_pengajuan_pensiun`) VALUES
(93, 14, NULL, 16, 4, '2020-08-21 05:08:44', NULL, NULL),
(94, 14, NULL, 17, NULL, '2020-08-21 05:08:52', NULL, NULL),
(95, 22, NULL, 18, NULL, '2020-08-21 02:08:43', NULL, NULL),
(96, 22, 29, 19, 1, '2020-08-21 08:08:06', 'Disetujui', 'laporan_pegawai_96.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_ujihasil`
--

CREATE TABLE `tbl_pengajuan_ujihasil` (
  `id_pengajuan_ujihasil` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `lamp_lulus_mapel` text DEFAULT NULL,
  `lamp_toefl` text DEFAULT NULL,
  `lamp_transkrip` text DEFAULT NULL,
  `lamp_khs` text DEFAULT NULL,
  `lamp_sertifikat_wirausaha` text DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL COMMENT '1 = belum di verifikasi, 2 = sudah di verifikasi, 3 = di tolak, 4 = di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_ujipro`
--

CREATE TABLE `tbl_pengajuan_ujipro` (
  `id_pengajuan_ujipro` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `lamp_bukti_pembayaran` text DEFAULT NULL,
  `lamp_toefl` text DEFAULT NULL,
  `lamp_spp` text DEFAULT NULL,
  `lamp_transkrip` text DEFAULT NULL,
  `lamp_khs` text DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL COMMENT '1 = belum di verifikasi, 2 = sudah di verifikasi, 3 = di tolak, 4 = di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan_ujiskripsi`
--

CREATE TABLE `tbl_pengajuan_ujiskripsi` (
  `id_pengajuan_ujiskripsi` int(11) NOT NULL,
  `id_mahasiswa` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `lamp_lulus_mapel` text DEFAULT NULL,
  `lamp_toefl` text DEFAULT NULL,
  `lamp_transkrip` text DEFAULT NULL,
  `lamp_khs` text DEFAULT NULL,
  `lamp_sertifikat_wirausaha` text DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT NULL COMMENT '1 = belum di verifikasi, 2 = sudah di verifikasi, 3 = di tolak, 4 = di setujui'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pmk`
--

CREATE TABLE `tbl_pmk` (
  `id_pmk` int(11) NOT NULL,
  `no_pmk` varchar(100) DEFAULT NULL,
  `tgl_pmk` date DEFAULT NULL,
  `oleh_pejabat_pmk` varchar(300) DEFAULT NULL,
  `tmt_pmk` date DEFAULT NULL,
  `thn_masa_kerja_pmk` varchar(50) DEFAULT NULL,
  `bln_masa_kerja_pmk` varchar(50) DEFAULT NULL,
  `thn_selisih_pmk` varchar(50) DEFAULT NULL,
  `bln_selisih_pmk` varchar(50) DEFAULT NULL,
  `tgl_tambah_masa_kerja_pmk` varchar(50) DEFAULT NULL,
  `thn_tambah_masa_kerja_pmk` varchar(50) DEFAULT NULL,
  `bln_tambah_masa_kerja_pmk` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pmk`
--

INSERT INTO `tbl_pmk` (`id_pmk`, `no_pmk`, `tgl_pmk`, `oleh_pejabat_pmk`, `tmt_pmk`, `thn_masa_kerja_pmk`, `bln_masa_kerja_pmk`, `thn_selisih_pmk`, `bln_selisih_pmk`, `tgl_tambah_masa_kerja_pmk`, `thn_tambah_masa_kerja_pmk`, `bln_tambah_masa_kerja_pmk`, `id_pegawai`) VALUES
(1, '-', '2007-07-21', '-', '1987-03-01', '0', '0', '0', '0', '0', '0', '0', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(12, 'sadsadas', '0000-00-00', '', '0000-00-00', '0', '0', '0', '0', '0', '0', '0', 14),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(20, '12312', '2020-08-26', '12312312', '2020-08-19', '0', '0', '0', '0', '0', '0', '0', 22);

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
-- Table structure for table `tbl_tgs_tambahan_dosen`
--

CREATE TABLE `tbl_tgs_tambahan_dosen` (
  `id_tgs_tambahan_dosen` int(11) NOT NULL,
  `klasifikasi_jbt` varchar(100) DEFAULT NULL,
  `tugas_tambahan` varchar(300) DEFAULT NULL,
  `nomor_sk` varchar(100) DEFAULT NULL,
  `tmt_jab` date DEFAULT NULL,
  `thn_mk_jabatan` varchar(50) DEFAULT NULL,
  `bln_mk_jabatan` varchar(50) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_tgs_tambahan_dosen`
--

INSERT INTO `tbl_tgs_tambahan_dosen` (`id_tgs_tambahan_dosen`, `klasifikasi_jbt`, `tugas_tambahan`, `nomor_sk`, `tmt_jab`, `thn_mk_jabatan`, `bln_mk_jabatan`, `id_pegawai`) VALUES
(1, NULL, NULL, NULL, NULL, '-', '-', 1),
(2, NULL, NULL, NULL, NULL, NULL, NULL, 5),
(3, NULL, NULL, NULL, NULL, NULL, NULL, 6),
(4, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(5, NULL, NULL, NULL, NULL, NULL, NULL, 8),
(6, NULL, NULL, NULL, NULL, NULL, NULL, 9),
(7, NULL, NULL, NULL, NULL, NULL, NULL, 10),
(8, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(9, NULL, NULL, NULL, NULL, NULL, NULL, 13),
(10, 'Hello', '5', 'sadasdsa', '2020-08-12', NULL, NULL, 14),
(11, NULL, NULL, NULL, NULL, NULL, NULL, 15),
(12, NULL, NULL, NULL, NULL, NULL, NULL, 16),
(13, NULL, NULL, NULL, NULL, NULL, NULL, 17),
(14, NULL, NULL, NULL, NULL, NULL, NULL, 19),
(15, NULL, NULL, NULL, NULL, NULL, NULL, 20),
(16, NULL, NULL, NULL, NULL, NULL, NULL, 21),
(17, 'jdasdasdas', '1', '123123223', '2020-08-04', NULL, NULL, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit_kerja`
--

CREATE TABLE `tbl_unit_kerja` (
  `id_uker` int(11) NOT NULL,
  `program_studi_uker` varchar(300) DEFAULT NULL,
  `homebase_uker` varchar(300) DEFAULT NULL,
  `full_fakultas_uker` varchar(300) DEFAULT NULL,
  `singkat_fakultas_uker` varchar(100) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_unit_kerja`
--

INSERT INTO `tbl_unit_kerja` (`id_uker`, `program_studi_uker`, `homebase_uker`, `full_fakultas_uker`, `singkat_fakultas_uker`, `id_pegawai`) VALUES
(1, 'Penyuluhan Pertanian S1', 'FP', 'Fakultas Pertanian', 'FP', 12),
(2, NULL, NULL, NULL, NULL, 13),
(3, 'Penyuluhan Pertanian S1', 'FK', 'Fakultas Kehutanan', 'FK', 14),
(4, NULL, NULL, NULL, NULL, 15),
(5, NULL, NULL, NULL, NULL, 16),
(6, NULL, NULL, NULL, NULL, 17),
(7, NULL, NULL, NULL, NULL, 19),
(8, NULL, NULL, NULL, NULL, 20),
(9, NULL, NULL, NULL, NULL, 21),
(10, 'Jurusan Cuci Kaki', 'FK', 'Fakultas Kebersihan', 'FK', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
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

INSERT INTO `tbl_user` (`id_users`, `username`, `id_pegawai`, `email`, `password`, `id_lembaga`, `images`, `id_user_level`, `is_aktif`) VALUES
(3, 'superadmin', 0, 'superadmin@uho.ac.id', '$2y$04$ohKllafFnWiUp68sdl2HLui47jc5KZKEmx8UmMocnQK/8tZwseyHy', 0, '', 2, 'y'),
(25, 'mahasiswa', 0, 'mahasiswa@uho.ac.id', '$2y$04$RY4faziEqwnpxS1opFDp..BNM8Xu09SRG3sNfq9VMgMJ0Q/Nel7jC', 0, '', 9, 'y'),
(29, 'adminpegawai', 0, 'adminpegawai@uho.ac.id', '$2y$04$/SnNVLg6ovV7nEHNBtm8dOVU5DfSrGLKIxGv3Y4xlBe51QYCx5z5K', 0, '', 5, 'y'),
(30, 'adminakademik', 0, 'adminakademik@uho.ac.id', '$2y$04$YE3UCuNGPrd9ewbK8Kf7PuyuBebE8l.nIWHM9pUkCH2/los4HLN/K', 0, '', 4, 'y'),
(49, 'minasatou', 14, 'pegawai@uho.ac.id', '$2y$04$0UfxiIe3B.G.QYKc651CLOVYZxFzOj..0gBhXKICuSk/q2OUycega', 0, '', 10, 'y'),
(50, 'antimo', 15, 'antimo@uho.ac.id', '$2y$04$Uq0/IXjptugVq55WDL5HeeU1gRJj9dXj83TEou2xWzPlUlFpP2waO', 0, '', 10, 'y'),
(51, 'tehpucuk', 16, 'tehpucuk@uho.ac.id', '$2y$04$0UfxiIe3B.G.QYKc651CLOVYZxFzOj..0gBhXKICuSk/q2OUycega', 0, '', 10, 'y'),
(52, 'adminkomunikasi', 0, 'adminjurnalistik@uho.ac.id', '$2y$04$QEp2cUZ4e8VMuutexLYC6.Ra3M2P4KUSqwuDYjqUXlB6e3oDy8tju', 0, '', 11, 'y'),
(53, 'adminsosial', 0, 'adminsosial@uho.ac.id', '$2y$04$QEp2cUZ4e8VMuutexLYC6.Ra3M2P4KUSqwuDYjqUXlB6e3oDy8tju', 0, '', 12, 'y'),
(54, 'adminpolitik', 0, 'adminpolitik@uho.ac.id', '$2y$04$QEp2cUZ4e8VMuutexLYC6.Ra3M2P4KUSqwuDYjqUXlB6e3oDy8tju', 0, '', 13, 'y'),
(58, 'pegawai5', 21, 'pegawai@uho.ac.id', '$2y$04$Rpx0X7ZpvXQjrGoiHGoCsuwjHbgxhycH6ZdOst/AbYp1Bx.V/6G1O', 0, '', 10, 'y'),
(59, 'pegawai6', 22, 'pegawai@uho.ac.id', '$2y$04$Zpv774/nbvm68xP/DYC3JOeQGhq/h4Pr2KcNV/BA0/y1FGJypOj.C', 0, '', 10, 'y');

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
(2, 'Super Admin'),
(4, 'admin_akademik'),
(5, 'admin_pegawai'),
(9, 'mahasiswa'),
(10, 'pegawai'),
(11, 'admin_jurusan_jurnalistik'),
(12, 'admin_jurusan_sosial'),
(13, 'admin_jurusan_politik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_aju_naikpangkat_fungsional`
--
ALTER TABLE `tbl_aju_naikpangkat_fungsional`
  ADD PRIMARY KEY (`id_ajuan_fungsional`);

--
-- Indexes for table `tbl_aju_naikpangkat_ijazah`
--
ALTER TABLE `tbl_aju_naikpangkat_ijazah`
  ADD PRIMARY KEY (`id_ajuan_ijazah`);

--
-- Indexes for table `tbl_aju_naikpangkat_struktural`
--
ALTER TABLE `tbl_aju_naikpangkat_struktural`
  ADD PRIMARY KEY (`id_ajuan_struktural`);

--
-- Indexes for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  ADD PRIMARY KEY (`id_anak`);

--
-- Indexes for table `tbl_berkas_pengajuan_fungsional`
--
ALTER TABLE `tbl_berkas_pengajuan_fungsional`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tbl_berkas_pengajuan_ijazah`
--
ALTER TABLE `tbl_berkas_pengajuan_ijazah`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tbl_berkas_pengajuan_pensiun`
--
ALTER TABLE `tbl_berkas_pengajuan_pensiun`
  ADD PRIMARY KEY (`id_berkas_pengajuan_pensiun`);

--
-- Indexes for table `tbl_berkas_pengajuan_struktural`
--
ALTER TABLE `tbl_berkas_pengajuan_struktural`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `tbl_cpns`
--
ALTER TABLE `tbl_cpns`
  ADD PRIMARY KEY (`id_cpns`);

--
-- Indexes for table `tbl_data_mahasiswa`
--
ALTER TABLE `tbl_data_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tbl_diklat_pelatihan`
--
ALTER TABLE `tbl_diklat_pelatihan`
  ADD PRIMARY KEY (`id_diklat`);

--
-- Indexes for table `tbl_gelar`
--
ALTER TABLE `tbl_gelar`
  ADD PRIMARY KEY (`id_gelar`);

--
-- Indexes for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_impassing`
--
ALTER TABLE `tbl_impassing`
  ADD PRIMARY KEY (`id_impassing`);

--
-- Indexes for table `tbl_info_jadwal_kuliah`
--
ALTER TABLE `tbl_info_jadwal_kuliah`
  ADD PRIMARY KEY (`id_jadwal_kuliah`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jab`),
  ADD KEY `id_kum_jab_fungsional` (`id_kategori_jab_fungsional`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kategori_jabatan_fung`
--
ALTER TABLE `tbl_kategori_jabatan_fung`
  ADD PRIMARY KEY (`id_kategori_jabatan_fung`);

--
-- Indexes for table `tbl_kategori_jabatan_struktur`
--
ALTER TABLE `tbl_kategori_jabatan_struktur`
  ADD PRIMARY KEY (`id_kat_jbt_struktur`);

--
-- Indexes for table `tbl_kategori_klasifikasi_jabatan`
--
ALTER TABLE `tbl_kategori_klasifikasi_jabatan`
  ADD PRIMARY KEY (`id_klasifikasi`);

--
-- Indexes for table `tbl_kategori_pendidikan`
--
ALTER TABLE `tbl_kategori_pendidikan`
  ADD PRIMARY KEY (`id_kategori_pendidikan`);

--
-- Indexes for table `tbl_kategori_tugastambahan`
--
ALTER TABLE `tbl_kategori_tugastambahan`
  ADD PRIMARY KEY (`id_kategori_tugastambahan`);

--
-- Indexes for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `id_anak` (`id_anak`);

--
-- Indexes for table `tbl_kgb`
--
ALTER TABLE `tbl_kgb`
  ADD PRIMARY KEY (`id_kgb`);

--
-- Indexes for table `tbl_kum_fungsi_tertentu`
--
ALTER TABLE `tbl_kum_fungsi_tertentu`
  ADD PRIMARY KEY (`id_kum_jab_fungsional`);

--
-- Indexes for table `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `tbl_mata_kuliah`
--
ALTER TABLE `tbl_mata_kuliah`
  ADD PRIMARY KEY (`id_mata_kuliah`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tbl_pangkat_terakhir`
--
ALTER TABLE `tbl_pangkat_terakhir`
  ADD PRIMARY KEY (`id_pangkat_terakhir`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_cpns` (`id_cpns`),
  ADD KEY `id_pmk` (`id_pmk`),
  ADD KEY `id_kgb` (`id_kgb`),
  ADD KEY `id_gelar` (`id_gelar`),
  ADD KEY `id_impassing` (`id_impassing`),
  ADD KEY `id_pangkat_terakhir` (`id_pangkat_terakhir`),
  ADD KEY `id_tgs_tambahan_dosen` (`id_tgs_tambahan_dosen`),
  ADD KEY `id_uker` (`id_user`),
  ADD KEY `id_peter` (`id_peter`),
  ADD KEY `id_diklat` (`id_diklat`),
  ADD KEY `id_keluarga` (`id_keluarga`);

--
-- Indexes for table `tbl_pembayaran_ukt`
--
ALTER TABLE `tbl_pembayaran_ukt`
  ADD PRIMARY KEY (`id_pembayaran_ukt`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tbl_pendidikan_terakhir`
--
ALTER TABLE `tbl_pendidikan_terakhir`
  ADD PRIMARY KEY (`id_peter`);

--
-- Indexes for table `tbl_pengajuan_aktif_kuliah`
--
ALTER TABLE `tbl_pengajuan_aktif_kuliah`
  ADD PRIMARY KEY (`id_pengajuan_aktif_kuliah`);

--
-- Indexes for table `tbl_pengajuan_cuti`
--
ALTER TABLE `tbl_pengajuan_cuti`
  ADD PRIMARY KEY (`id_pengajuan_cuti`);

--
-- Indexes for table `tbl_pengajuan_cuti_kuliah`
--
ALTER TABLE `tbl_pengajuan_cuti_kuliah`
  ADD PRIMARY KEY (`id_pengajuan_cuti_kuliah`);

--
-- Indexes for table `tbl_pengajuan_izipen`
--
ALTER TABLE `tbl_pengajuan_izipen`
  ADD PRIMARY KEY (`id_pengajuan_izipen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tbl_pengajuan_pangkat`
--
ALTER TABLE `tbl_pengajuan_pangkat`
  ADD PRIMARY KEY (`id_pengajuan_pangkat`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `tbl_pengajuan_pensiun`
--
ALTER TABLE `tbl_pengajuan_pensiun`
  ADD PRIMARY KEY (`id_pengajuan_pensiun`);

--
-- Indexes for table `tbl_pengajuan_ujihasil`
--
ALTER TABLE `tbl_pengajuan_ujihasil`
  ADD PRIMARY KEY (`id_pengajuan_ujihasil`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tbl_pengajuan_ujipro`
--
ALTER TABLE `tbl_pengajuan_ujipro`
  ADD PRIMARY KEY (`id_pengajuan_ujipro`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tbl_pengajuan_ujiskripsi`
--
ALTER TABLE `tbl_pengajuan_ujiskripsi`
  ADD PRIMARY KEY (`id_pengajuan_ujiskripsi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `tbl_pmk`
--
ALTER TABLE `tbl_pmk`
  ADD PRIMARY KEY (`id_pmk`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tbl_tgs_tambahan_dosen`
--
ALTER TABLE `tbl_tgs_tambahan_dosen`
  ADD PRIMARY KEY (`id_tgs_tambahan_dosen`);

--
-- Indexes for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  ADD PRIMARY KEY (`id_uker`);

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
-- AUTO_INCREMENT for table `tbl_aju_naikpangkat_fungsional`
--
ALTER TABLE `tbl_aju_naikpangkat_fungsional`
  MODIFY `id_ajuan_fungsional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_aju_naikpangkat_ijazah`
--
ALTER TABLE `tbl_aju_naikpangkat_ijazah`
  MODIFY `id_ajuan_ijazah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_aju_naikpangkat_struktural`
--
ALTER TABLE `tbl_aju_naikpangkat_struktural`
  MODIFY `id_ajuan_struktural` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_anak`
--
ALTER TABLE `tbl_anak`
  MODIFY `id_anak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_berkas_pengajuan_fungsional`
--
ALTER TABLE `tbl_berkas_pengajuan_fungsional`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_berkas_pengajuan_ijazah`
--
ALTER TABLE `tbl_berkas_pengajuan_ijazah`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_berkas_pengajuan_pensiun`
--
ALTER TABLE `tbl_berkas_pengajuan_pensiun`
  MODIFY `id_berkas_pengajuan_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_berkas_pengajuan_struktural`
--
ALTER TABLE `tbl_berkas_pengajuan_struktural`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cpns`
--
ALTER TABLE `tbl_cpns`
  MODIFY `id_cpns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_data_mahasiswa`
--
ALTER TABLE `tbl_data_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_diklat_pelatihan`
--
ALTER TABLE `tbl_diklat_pelatihan`
  MODIFY `id_diklat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_gelar`
--
ALTER TABLE `tbl_gelar`
  MODIFY `id_gelar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_hak_akses`
--
ALTER TABLE `tbl_hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_impassing`
--
ALTER TABLE `tbl_impassing`
  MODIFY `id_impassing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_info_jadwal_kuliah`
--
ALTER TABLE `tbl_info_jadwal_kuliah`
  MODIFY `id_jadwal_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_kategori_jabatan_fung`
--
ALTER TABLE `tbl_kategori_jabatan_fung`
  MODIFY `id_kategori_jabatan_fung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori_jabatan_struktur`
--
ALTER TABLE `tbl_kategori_jabatan_struktur`
  MODIFY `id_kat_jbt_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_kategori_klasifikasi_jabatan`
--
ALTER TABLE `tbl_kategori_klasifikasi_jabatan`
  MODIFY `id_klasifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_kategori_pendidikan`
--
ALTER TABLE `tbl_kategori_pendidikan`
  MODIFY `id_kategori_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kategori_tugastambahan`
--
ALTER TABLE `tbl_kategori_tugastambahan`
  MODIFY `id_kategori_tugastambahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  MODIFY `id_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_kgb`
--
ALTER TABLE `tbl_kgb`
  MODIFY `id_kgb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_kum_fungsi_tertentu`
--
ALTER TABLE `tbl_kum_fungsi_tertentu`
  MODIFY `id_kum_jab_fungsional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lembaga`
--
ALTER TABLE `tbl_lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_mata_kuliah`
--
ALTER TABLE `tbl_mata_kuliah`
  MODIFY `id_mata_kuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tbl_pangkat_terakhir`
--
ALTER TABLE `tbl_pangkat_terakhir`
  MODIFY `id_pangkat_terakhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_pembayaran_ukt`
--
ALTER TABLE `tbl_pembayaran_ukt`
  MODIFY `id_pembayaran_ukt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pendidikan_terakhir`
--
ALTER TABLE `tbl_pendidikan_terakhir`
  MODIFY `id_peter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_aktif_kuliah`
--
ALTER TABLE `tbl_pengajuan_aktif_kuliah`
  MODIFY `id_pengajuan_aktif_kuliah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_cuti`
--
ALTER TABLE `tbl_pengajuan_cuti`
  MODIFY `id_pengajuan_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_cuti_kuliah`
--
ALTER TABLE `tbl_pengajuan_cuti_kuliah`
  MODIFY `id_pengajuan_cuti_kuliah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_izipen`
--
ALTER TABLE `tbl_pengajuan_izipen`
  MODIFY `id_pengajuan_izipen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_pangkat`
--
ALTER TABLE `tbl_pengajuan_pangkat`
  MODIFY `id_pengajuan_pangkat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_pensiun`
--
ALTER TABLE `tbl_pengajuan_pensiun`
  MODIFY `id_pengajuan_pensiun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_ujihasil`
--
ALTER TABLE `tbl_pengajuan_ujihasil`
  MODIFY `id_pengajuan_ujihasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_ujipro`
--
ALTER TABLE `tbl_pengajuan_ujipro`
  MODIFY `id_pengajuan_ujipro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pengajuan_ujiskripsi`
--
ALTER TABLE `tbl_pengajuan_ujiskripsi`
  MODIFY `id_pengajuan_ujiskripsi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pmk`
--
ALTER TABLE `tbl_pmk`
  MODIFY `id_pmk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tgs_tambahan_dosen`
--
ALTER TABLE `tbl_tgs_tambahan_dosen`
  MODIFY `id_tgs_tambahan_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_unit_kerja`
--
ALTER TABLE `tbl_unit_kerja`
  MODIFY `id_uker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
