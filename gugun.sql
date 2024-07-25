-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2024 at 06:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gugun`
--

-- --------------------------------------------------------

--
-- Table structure for table `gugun_mahasiswa`
--

CREATE TABLE `gugun_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tgl_lahir` varchar(100) NOT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gugun_mahasiswa`
--

INSERT INTO `gugun_mahasiswa` (`id`, `nim`, `nama`, `tgl_lahir`, `tempat_lahir`, `alamat`, `email`, `no_hp`, `agama`, `jenis_kelamin`, `jurusan`, `foto`) VALUES
(5, 312210254, 'Dede', '2024-05-16', 'Bandung', 'Bandung', 'dede@gmai.com', '089510901029', 'Islam', 'Laki-laki', 'Sastra Jepang', 'gambar/avatar6.jpg'),
(6, 3223, 'Dini', '2024-05-16', 'Bekasi', 'Cikarang Bekasi', 'dini@gmail.com', '0121212323', 'Islam', 'Perempuan', 'Teknik Informatika', 'gambar/avatar3.jpg'),
(9, 312210280, 'Gugun Gunawan', '2004-06-25', 'Bekasi', 'Cikarang Bekasi', 'gugun@gmail.com', '0899000000', 'Islam', 'Laki-laki', 'Teknik Informatika', 'gambar/gugun.jpg'),
(11, 322333, 'Jono', '2003-10-25', 'Bekasi', 'Bandung', 'jono@gmail.com', '08991828716', 'Islam', 'Laki-laki', 'Hukum', 'gambar/avatar2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gugun_mahasiswa`
--
ALTER TABLE `gugun_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gugun_mahasiswa`
--
ALTER TABLE `gugun_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
