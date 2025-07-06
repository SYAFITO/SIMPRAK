-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 04:47 PM
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
-- Database: `simpra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `modul_id` int(11) NOT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `feedback` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `user_id`, `modul_id`, `file_laporan`, `nilai`, `feedback`) VALUES
(1, 1, 2, 'UJIAN AKHIR SEMESTER PDW.pdf', NULL, NULL),
(2, 1, 3, 'TESTING APLIKASI DESKTOP BERBASIS DATABASE.docx', 89, 'agf');

-- --------------------------------------------------------

--
-- Table structure for table `mata_praktikum`
--

CREATE TABLE `mata_praktikum` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_praktikum`
--

INSERT INTO `mata_praktikum` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Praktikum Desain Web', 'Mas Asroni'),
(2, 'Praktikum Routing dan Keamanan Jaringan', 'Aan'),
(3, 'Praktikum AIK', 'Uin');

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `praktikum_id` int(11) NOT NULL,
  `nama_modul` varchar(100) NOT NULL,
  `file_materi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `praktikum_id`, `nama_modul`, `file_materi`) VALUES
(2, 1, 'hehe', 'TESTING APLIKASI DESKTOP BERBASIS DATABASE.docx'),
(3, 2, 'hoho', 'UJIAN AKHIR SEMESTER PDW.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_praktikum`
--

CREATE TABLE `pendaftaran_praktikum` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `praktikum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran_praktikum`
--

INSERT INTO `pendaftaran_praktikum` (`id`, `user_id`, `praktikum_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('mahasiswa','asisten') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'fito', '$2y$10$Vj6ufiAR4zNllEzGXgsoIOV2Unqgoo3UoXAuuZmML/L5ETRXJ/kUC', 'mahasiswa'),
(2, 'asisten', '$2y$10$JZT1mt/d2WjLoBGPrL7gSOsXDoygktY6tJM5sdXJ1shFtqJ3kohoS', 'asisten');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `modul_id` (`modul_id`);

--
-- Indexes for table `mata_praktikum`
--
ALTER TABLE `mata_praktikum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `praktikum_id` (`praktikum_id`);

--
-- Indexes for table `pendaftaran_praktikum`
--
ALTER TABLE `pendaftaran_praktikum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `praktikum_id` (`praktikum_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mata_praktikum`
--
ALTER TABLE `mata_praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pendaftaran_praktikum`
--
ALTER TABLE `pendaftaran_praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_ibfk_2` FOREIGN KEY (`modul_id`) REFERENCES `modul` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `modul_ibfk_1` FOREIGN KEY (`praktikum_id`) REFERENCES `mata_praktikum` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pendaftaran_praktikum`
--
ALTER TABLE `pendaftaran_praktikum`
  ADD CONSTRAINT `pendaftaran_praktikum_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pendaftaran_praktikum_ibfk_2` FOREIGN KEY (`praktikum_id`) REFERENCES `mata_praktikum` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
