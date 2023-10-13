-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 07:16 AM
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
(1, 1, 'A_1697173657.jpg', 'Belajar berasap'),
(2, 2, 'A_1697173773.jpg', 'Membantu orang susah'),
(3, 2, 'B_1697173773.jpg', 'Memberi petuah'),
(4, 3, 'A_1697173828.jpg', 'Lokasi jalan menuju sekolah'),
(5, 4, 'A_1697173883.jpg', 'Bersalaman setelah selesai pelajaran'),
(6, 5, 'A_1697174121.jpg', 'infomasi 1'),
(7, 5, 'B_1697174121.jpg', 'informasi 2');

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
(1, 'Siswa peserta kompetisi belajar dengan tekun', 'Siswa peserta kompetisi belajar dengan tekun. Siswa peserta kompetisi belajar dengan tekun. Siswa peserta kompetisi belajar dengan tekun. Siswa peserta kompetisi belajar dengan tekun. Siswa peserta kompetisi belajar dengan tekun', '2023-10-13 07:07:37', 1),
(2, 'Siswa dibantu dengan terapis profesional', 'Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional\r\nSiswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional.&nbsp;\r\nSiswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional. Siswa dibantu dengan terapis profesional', '2023-10-13 07:09:33', 1),
(3, 'Lokasi jalan menuju sekolah', 'Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah.\r\nLokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah. Lokasi jalan menuju sekolah.', '2023-10-13 07:10:28', 1),
(4, 'Bersalaman setelah selesai pelajaran', 'Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran\r\nBersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran.\r\nBersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran. Bersalaman setelah selesai pelajaran.\r\n&nbsp;', '2023-10-13 07:11:23', 1),
(5, 'Informasi sekolah', 'Beberapa informasi penting dari sekolah untuk para murid. Beberapa informasi penting dari sekolah untuk para murid.&nbsp;\r\nBeberapa informasi penting dari sekolah untuk para murid. Beberapa informasi penting dari sekolah untuk para murid. Beberapa informasi penting dari sekolah untuk para murid. Beberapa informasi penting dari sekolah untuk para murid.&nbsp;', '2023-10-13 07:15:21', 1);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `ID_kegiatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
