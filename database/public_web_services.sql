-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2024 at 12:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `public_web_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `kategori_pengaduan` varchar(256) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `gambar` mediumblob DEFAULT NULL,
  `vidio` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `kategori_pengaduan`, `nama`, `email`, `pesan`, `tanggal`, `gambar`, `vidio`) VALUES
(16, 'tin', 'jhsa', NULL, NULL, '2024-03-17 15:05:10', NULL, NULL),
(17, 'tin', 'jhsa', NULL, NULL, '2024-03-17 15:05:22', NULL, NULL),
(18, 'tema1', 'tin', 'tinxsen31@gmail.com', 'yaay', '2024-03-17 15:16:34', 0x75706c6f6164732f, ''),
(19, 'tema1', 'yo', 'koso', 'ua', '2024-03-17 15:17:25', 0x75706c6f6164732f, ''),
(20, 'tema1', 'valentino66', 'j', 'h', '2024-03-17 15:23:50', 0x75706c6f6164732f, ''),
(21, 'tema1', 'i', 'valentino.22054@mhs.unesa.ac.id', 'ha', '2024-03-17 15:32:20', 0x75706c6f6164732f, ''),
(22, 'tema1', 'ki', 'me', 'su', '2024-03-17 15:32:30', 0x75706c6f6164732f, ''),
(23, 'tema1', 'ki', 'me', 'su', '2024-03-17 15:36:26', 0x75706c6f6164732f, ''),
(24, 'tema1', 'firda sy', 'ay', 'ulala', '2024-03-17 15:41:59', 0x75706c6f6164732f, ''),
(25, 'tema1', 'firda sy', 'ay', 'ulala', '2024-03-17 15:42:58', 0x75706c6f6164732f, 0x75706c6f6164732f),
(26, 'tema1', 'yangbe', 'be', 'ua', '2024-03-17 15:43:11', 0x75706c6f6164732f, 0x75706c6f6164732f),
(27, 'tema1', 'apa', 'aku', 'firda', '2024-03-17 15:44:42', 0x75706c6f6164732f53637265656e73686f7420323032332d30362d3039203134313333322e706e67, 0x75706c6f6164732f),
(28, 'tema1', 'apa', 'aku', 'firda', '2024-03-17 15:49:49', 0x75706c6f6164732f53637265656e73686f7420323032332d30362d3039203134313333322e706e67, 0x75706c6f6164732f),
(29, 'banjir', 'firda lala', 'for', 'me', '2024-03-17 15:50:15', 0x75706c6f6164732f53637265656e73686f7420323032332d30362d3039203134313333322e706e67, 0x75706c6f6164732f),
(30, 'banjir', 'yo', 'apalah ari', 'kjhaejfhkeh ha', '2024-03-17 16:03:57', 0x75706c6f6164732f, 0x75706c6f6164732f);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
