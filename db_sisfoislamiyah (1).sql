-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 03:51 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sisfoislamiyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_guru`
--

CREATE TABLE `t_guru` (
  `nip` varchar(10) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kode_guru` varchar(3) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_guru`
--

INSERT INTO `t_guru` (`nip`, `nama_guru`, `kode_guru`, `alamat`, `email`, `password`) VALUES
('031025', 'Asep Saefullah', 'ASF', 'Perumahan Mendiang Ilhami', 'asepsae@gmail.com', 'e172dd95f4feb21412a692e73929961e');

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal_semua`
--

CREATE TABLE `t_jadwal_semua` (
  `id_jadwal` varchar(10) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` varchar(15) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_jadwal_siswa`
--

CREATE TABLE `t_jadwal_siswa` (
  `id_jadwal_siswa` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_jadwal` varchar(10) NOT NULL,
  `id_thnajaran` varchar(10) NOT NULL,
  `nip` varchar(10) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kehadiran`
--

CREATE TABLE `t_kehadiran` (
  `id_presensi` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `id_thnajaran` varchar(10) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_mapel`
--

CREATE TABLE `t_mapel` (
  `kode_mapel` int(11) NOT NULL,
  `nama_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_siswa`
--

CREATE TABLE `t_siswa` (
  `nis` varchar(10) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` mediumtext NOT NULL,
  `nama_orangtua` varchar(100) NOT NULL,
  `jenjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_siswa`
--

INSERT INTO `t_siswa` (`nis`, `nama_siswa`, `tgl_lahir`, `alamat`, `nama_orangtua`, `jenjang`) VALUES
('121', '123', '0000-00-00', '123', '123', '2'),
('1231', '1231', '2009-12-21', 'malang', 'asd', '2');

-- --------------------------------------------------------

--
-- Table structure for table `t_tahunajaran`
--

CREATE TABLE `t_tahunajaran` (
  `id_thnajaran` varchar(10) NOT NULL,
  `semester` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `kode_guru` (`kode_guru`);

--
-- Indexes for table `t_jadwal_semua`
--
ALTER TABLE `t_jadwal_semua`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `t_jadwal_siswa`
--
ALTER TABLE `t_jadwal_siswa`
  ADD PRIMARY KEY (`id_jadwal_siswa`);

--
-- Indexes for table `t_kehadiran`
--
ALTER TABLE `t_kehadiran`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `t_siswa`
--
ALTER TABLE `t_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `t_tahunajaran`
--
ALTER TABLE `t_tahunajaran`
  ADD PRIMARY KEY (`id_thnajaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_kehadiran`
--
ALTER TABLE `t_kehadiran`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
