-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 01:25 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `uraian` varchar(200) NOT NULL,
  `periode` varchar(25) NOT NULL,
  `waktu` int(11) NOT NULL,
  `frekuensi` int(11) NOT NULL,
  `id_jobdes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktivitas`
--

INSERT INTO `aktivitas` (`id_aktivitas`, `uraian`, `periode`, `waktu`, `frekuensi`, `id_jobdes`) VALUES
(1, 'zjjzh', 'daily/230', 1, 1, 1),
(2, 'sgahsg', 'weekly/52', 12, 1, 2),
(3, 'membuat NO2', 'daily/230', 15, 4, 3),
(4, 'Membuat larutan kimia', 'daily/230', 20, 2, 3),
(5, 'ajhgah', 'daily/230', 1, 1, 4),
(6, 'membenahi mesin', 'weekly/52', 15, 2, 5),
(8, 'ngentot masal', 'daily/230', 121, 1, 7),
(9, 'jjah', 'daily/230', 21, 1, 7),
(10, 'asdfgh', 'daily/230', 12, 2, 8),
(11, 'mengetik ', 'daily/230', 13, 2, 9),
(12, 'asjag', 'daily/230', 12, 1, 10),
(13, 'ada', 'monthly/12', 13, 13, 10),
(14, 'ada', 'daily/230', 1, 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_profile`, `id_user`, `tanggal`, `status`) VALUES
(4, 1, 5, '2020-10-21', '1'),
(8, 2, 4, '2020-10-20', '1'),
(11, 1, 4, '2020-10-21', '1'),
(12, 2, 5, '2020-10-21', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jobdes`
--

CREATE TABLE `jobdes` (
  `id_jobdes` int(11) NOT NULL,
  `jobdes` varchar(100) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobdes`
--

INSERT INTO `jobdes` (`id_jobdes`, `jobdes`, `id_jadwal`) VALUES
(1, 'test1', 2),
(3, 'melakukan check labs', 12),
(5, 'mengecek mesin 2', 12),
(8, 'asdfg', 12),
(9, 'ketik', 8),
(10, 'asgha', 4);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen_karyawan` varchar(100) NOT NULL,
  `posisi_karyawan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `nama_karyawan`, `departemen_karyawan`, `posisi_karyawan`) VALUES
(1, 'achmadi', 'Produksi', 'Kepala Bagian'),
(2, 'Hudadin', 'Warehouse', 'Kabag'),
(3, 'Albar', 'QC', 'kabag');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(4, 'albar', '7aa7fa9860118dbd9e8a00d80573ee94', '2'),
(5, 'albarqi', 'fd2e776d21215eefcd8e6e1814d5897b', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jobdes`
--
ALTER TABLE `jobdes`
  ADD PRIMARY KEY (`id_jobdes`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobdes`
--
ALTER TABLE `jobdes`
  MODIFY `id_jobdes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
