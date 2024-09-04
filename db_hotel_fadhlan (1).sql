-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel_fadhlan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama`, `username`, `pass`) VALUES
(1, 'ALDRICH RYU DANENDRA', 'ALDRICH', '123456'),
(2, 'ALHIKAM DIRGA RAMADHAN', 'ALHIKAM', '123456'),
(3, 'CITRA ANNISA TOURSINA TRIWIJAYA', 'CITRA', '123456'),
(6, '1jj', '1wqqw', '1wqq'),
(7, '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_kamar`
--

CREATE TABLE `tbl_jenis_kamar` (
  `id_kamar` int(100) NOT NULL,
  `jenis_kamar` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jenis_kamar`
--

INSERT INTO `tbl_jenis_kamar` (`id_kamar`, `jenis_kamar`, `harga`, `keterangan`) VALUES
(1, 'Standard', 800000, 'memiliki fasilitas, seperti tempat tidur, AC, TV, perlengkapan mandi, dan air minum. ukuran kasur ya'),
(2, 'Superior Room', 1500000, 'idk'),
(3, 'Deluxe Room', 1800000, 'idk'),
(4, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyewa`
--

CREATE TABLE `tbl_penyewa` (
  `id_sewa` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kamar` varchar(100) NOT NULL,
  `check_in` date NOT NULL DEFAULT current_timestamp(),
  `check_out` date NOT NULL DEFAULT current_timestamp(),
  `durasi` int(100) NOT NULL,
  `no_identitas` varchar(100) NOT NULL,
  `no_hp` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_penyewa`
--

INSERT INTO `tbl_penyewa` (`id_sewa`, `nama`, `jenis_kamar`, `check_in`, `check_out`, `durasi`, `no_identitas`, `no_hp`, `jumlah`, `total`) VALUES
(1, '345', '0', '2024-05-01', '2024-05-02', 0, '213', '2345', '344', '3542523'),
(2, '0', '0', '2024-05-03', '2024-05-18', 0, '12312331', '123', '123', '0'),
(6, '1', '0', '2024-05-31', '2024-06-01', 1, 'q', 'qw', '3', '2400000'),
(7, '3', '0', '2024-05-31', '2024-06-14', 0, '123', '123', '33', ''),
(8, '1', '0', '2024-06-01', '2024-05-31', 1, 'qweqwe', '123', '123', '98400000'),
(10, '132', '0', '2024-06-01', '2024-06-07', 6, 'wqd', '23', '2', '18000000'),
(11, '', '0', '2024-05-27', '2024-06-01', 5, '', '', '2', '0'),
(12, '', '', '2024-06-01', '2024-06-08', 7, '', '', '4', '0'),
(13, '', '', '2024-06-01', '2024-06-08', 7, '', '', '2', '0'),
(14, '', 'Standard', '2024-06-01', '2024-06-08', 7, '', '', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_jenis_kamar`
--
ALTER TABLE `tbl_jenis_kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_jenis_kamar`
--
ALTER TABLE `tbl_jenis_kamar`
  MODIFY `id_kamar` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_penyewa`
--
ALTER TABLE `tbl_penyewa`
  MODIFY `id_sewa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
