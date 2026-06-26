-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 02:35 PM
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
-- Database: `imk`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_kelola_kelas`
--

CREATE TABLE `admin_kelola_kelas` (
  `id_admin` int(10) DEFAULT NULL,
  `id_kelas` int(100) DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `waktu_aksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_kelola_mentor`
--

CREATE TABLE `admin_kelola_mentor` (
  `id_admin` int(10) DEFAULT NULL,
  `id_mentor` int(100) DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `waktu_aksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_kelola_siswa`
--

CREATE TABLE `admin_kelola_siswa` (
  `id_admin` int(10) DEFAULT NULL,
  `id_siswa` int(10) DEFAULT NULL,
  `aksi` varchar(100) DEFAULT NULL,
  `waktu_aksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_verifikasi_token`
--

CREATE TABLE `admin_verifikasi_token` (
  `id_admin` int(10) DEFAULT NULL,
  `id_token` int(11) DEFAULT NULL,
  `waktu_verifikasi` datetime DEFAULT NULL,
  `status_verifikasi` enum('Valid','Tidak Valid') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum_diskusi`
--

CREATE TABLE `forum_diskusi` (
  `id_forum` int(100) NOT NULL,
  `id_siswa` int(100) DEFAULT NULL,
  `isi_komen` text DEFAULT NULL,
  `tgl_komen` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(100) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `jadwal_kelas` varchar(100) DEFAULT NULL,
  `jadwal_TO` varchar(100) DEFAULT NULL,
  `materi_belajar` text DEFAULT NULL,
  `status_kelas` enum('Aktif','Nonaktif') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id_mentor` int(100) NOT NULL,
  `nama_mentor` varchar(100) DEFAULT NULL,
  `no_telpon_mentor` varchar(15) DEFAULT NULL,
  `password_mentor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_kelas`
--

CREATE TABLE `pendaftaran_kelas` (
  `id_siswa` int(100) DEFAULT NULL,
  `id_kelas` int(100) DEFAULT NULL,
  `deskripsi_kelas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengisian_data_diri`
--

CREATE TABLE `pengisian_data_diri` (
  `id_siswa` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL,
  `email_siswa` varchar(100) DEFAULT NULL,
  `no_telpon_siswa` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `jumlah_bayar` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(10) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `email_siswa` varchar(100) DEFAULT NULL,
  `password_siswa` varchar(100) DEFAULT NULL,
  `no_telpon_siswa` varchar(15) DEFAULT NULL,
  `alamat_siswa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `kode_token` varchar(100) DEFAULT NULL,
  `id_siswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `admin_kelola_kelas`
--
ALTER TABLE `admin_kelola_kelas`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `admin_kelola_mentor`
--
ALTER TABLE `admin_kelola_mentor`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_mentor` (`id_mentor`);

--
-- Indexes for table `admin_kelola_siswa`
--
ALTER TABLE `admin_kelola_siswa`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `admin_verifikasi_token`
--
ALTER TABLE `admin_verifikasi_token`
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_token` (`id_token`);

--
-- Indexes for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `pendaftaran_kelas`
--
ALTER TABLE `pendaftaran_kelas`
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `pengisian_data_diri`
--
ALTER TABLE `pengisian_data_diri`
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  MODIFY `id_forum` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id_mentor` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_kelola_kelas`
--
ALTER TABLE `admin_kelola_kelas`
  ADD CONSTRAINT `admin_kelola_kelas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `admin_kelola_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `admin_kelola_mentor`
--
ALTER TABLE `admin_kelola_mentor`
  ADD CONSTRAINT `admin_kelola_mentor_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `admin_kelola_mentor_ibfk_2` FOREIGN KEY (`id_mentor`) REFERENCES `mentor` (`id_mentor`);

--
-- Constraints for table `admin_kelola_siswa`
--
ALTER TABLE `admin_kelola_siswa`
  ADD CONSTRAINT `admin_kelola_siswa_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `admin_kelola_siswa_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `admin_verifikasi_token`
--
ALTER TABLE `admin_verifikasi_token`
  ADD CONSTRAINT `admin_verifikasi_token_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `admin_verifikasi_token_ibfk_2` FOREIGN KEY (`id_token`) REFERENCES `token` (`id_token`);

--
-- Constraints for table `forum_diskusi`
--
ALTER TABLE `forum_diskusi`
  ADD CONSTRAINT `forum_diskusi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);

--
-- Constraints for table `pendaftaran_kelas`
--
ALTER TABLE `pendaftaran_kelas`
  ADD CONSTRAINT `pendaftaran_kelas_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `pendaftaran_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `pengisian_data_diri`
--
ALTER TABLE `pengisian_data_diri`
  ADD CONSTRAINT `pengisian_data_diri_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`),
  ADD CONSTRAINT `pengisian_data_diri_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`);

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
