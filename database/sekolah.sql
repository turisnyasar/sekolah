-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2023 at 03:25 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `display_name` varchar(100) NOT NULL,
  `admin_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_admin`, `username`, `password`, `display_name`, `admin_level`) VALUES
(1, 'admin1', '202cb962ac59075b964b07152d234b70', 'Boss Admin', 1),
(2, 'operator', '250cf8b51c773f3f8dc8b4be867a9a02', 'Staff Admin', 2),
(3, 'andi', '202cb962ac59075b964b07152d234b70', 'Andi Staff', 2);

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `ID` int(10) NOT NULL,
  `ID_kegiatan` int(10) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_kegiatan`
--

INSERT INTO `foto_kegiatan` (`ID`, `ID_kegiatan`, `foto`, `caption`) VALUES
(1, 9, 'a.png', ''),
(2, 9, 'Untitled.jpg', ''),
(3, 11, 'a.png', ''),
(4, 12, 'a.png', 'asdasdas'),
(5, 13, 'IMG_20230114_201836.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `ID_kegiatan` int(10) NOT NULL,
  `judul_kegiatan` varchar(200) NOT NULL,
  `artikel_kegiatan` text NOT NULL,
  `tgl_upload` datetime NOT NULL,
  `ID_admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`ID_kegiatan`, `judul_kegiatan`, `artikel_kegiatan`, `tgl_upload`, `ID_admin`) VALUES
(1, 'Lomba Cerdas Cermat', 'pada hari Minggu di halaman sekolah diadakan lomba cerdas cermat yang diikuti oleh 15 tim dari siswa kelas X.&nbsp;', '2023-09-24 18:13:47', 1),
(2, 'sdfsfd', 'sdfsdfsdf', '2023-09-26 05:26:39', 1),
(3, 'sdfsfd', 'sdfsdfsdf', '2023-09-26 05:26:54', 1),
(4, 'sdfsfd', 'sdfsdfsdf', '2023-09-26 05:33:55', 1),
(5, 'asdasd', 'Judul Kegiatan', '2023-09-26 05:51:48', 1),
(6, 'dfgdfgf', 'dfgdfgdfg', '2023-09-26 06:37:26', 1),
(7, 'dgdgdf', 'gdfdfgdfg', '2023-09-26 06:40:00', 1),
(8, 'sdf', 'sdfsdfs', '2023-09-26 06:47:13', 1),
(9, 'sdf', 'sdfsdfs', '2023-09-26 06:47:48', 1),
(10, '4456456', '456456', '2023-09-26 07:01:10', 1),
(11, 'sdfsdfsd', 'sdfsdf', '2023-09-27 06:10:55', 1),
(12, 'asdasdasd', 'asdasdas', '2023-09-27 07:16:48', 1),
(13, 'sdfsdfsd', 'sdfsdfsdf', '2023-09-29 05:59:27', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_kegiatan` (`ID_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`ID_kegiatan`),
  ADD KEY `ID_admin` (`ID_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `ID_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD CONSTRAINT `foto_kegiatan_ibfk_1` FOREIGN KEY (`ID_kegiatan`) REFERENCES `kegiatan` (`ID_kegiatan`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`ID_admin`) REFERENCES `admin` (`ID_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
