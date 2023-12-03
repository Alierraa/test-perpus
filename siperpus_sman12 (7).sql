-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 01:03 PM
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
-- Database: `siperpus_sman12`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_picture` longblob NOT NULL,
  `role` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `email`, `profile_picture`, `role`) VALUES
(1, 'Raja', 'raja', 'josua', 'raja@josua.com', 0x696d616765, 0),
(6, 'Josua', 'josua', 'raja', 'josua@raja.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nomor_buku` int(255) DEFAULT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `sampul` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nomor_buku`, `judul_buku`, `penerbit`, `pengarang`, `kategori`, `jumlah`, `tahun`, `sampul`) VALUES
(80, 0, 'Avatar', 'Avatar', 'Tegar', 'pendidikan', 40, 0, 'buku3.png'),
(81, 0, 'Avatar2', 'Avatar', 'Tegar', 'nonfiksi', 100, 0, 'buku1.png'),
(82, 56567, 'Naruto', 'Erlanggaa', 'Rajaa', 'pendidikan', 20, 2020, 'buku2.png'),
(84, 8989, 'APA', 'AKU', 'KITA', 'pendidikan', 5, 0, 'buku5.png');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `tenggat` date NOT NULL,
  `total` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id`, `nama`, `judul`, `start`, `tenggat`, `total`, `status`) VALUES
(1, 'Raja Josua', 'Matematika', '2023-11-24', '2023-11-30', 10000, 'Lunas'),
(2, 'KingJo', 'Matematika', '2023-11-24', '2023-11-30', 999999, 'Belum Lunas'),
(3, 'Josua', 'Bahasa Jepang', '2023-11-24', '2023-11-30', 25000, 'Belum Lunas'),
(4, 'Raja Josua', 'Matematika', '2023-11-24', '2023-11-30', 20000, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tenggat` date NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `nama`, `nomor`, `judul`, `tanggal`, `tenggat`, `jumlah`) VALUES
(1, 'Raja Josua', '2729', 'Bahasa Indonesia', '2023-11-23', '2023-11-30', 1),
(2, 'KingJo', '2729', 'Bahasa Indonesia', '2023-11-23', '2023-11-30', 1),
(3, 'Josua', '6969', 'Matematika', '2023-11-23', '2023-11-30', 1),
(4, 'Raja Josua', '2729', 'Bahasa Indonesia', '2023-11-23', '2023-11-30', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tenggat` date NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `nama`, `judul`, `tanggal`, `tenggat`, `jumlah`) VALUES
(1, 'Raja Josua', 'Bahasa Indonesia', '2023-11-23', '2023-11-30', 1),
(2, 'Josua', 'Matematika', '2023-11-23', '2023-11-30', 1),
(3, 'KingJo', 'IPA', '2023-11-23', '2023-11-30', 1),
(4, 'Raja Josua', 'Bahasa Indonesia', '2023-11-23', '2023-11-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_denda`
--

CREATE TABLE `riwayat_denda` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `total_denda` int(255) NOT NULL,
  `total_terlambat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_denda`
--

INSERT INTO `riwayat_denda` (`id`, `nama`, `total_denda`, `total_terlambat`) VALUES
(1, 'Raja Josua', 50000, 4),
(2, 'Josua Raja', 100000, 5),
(3, 'King', 10000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_kembali`
--

CREATE TABLE `riwayat_kembali` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tenggat` date NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_kembali`
--

INSERT INTO `riwayat_kembali` (`id`, `nama`, `judul`, `tanggal`, `tenggat`, `jumlah`) VALUES
(1, 'Raja Josua', 'Bahasa Indonesia', '2023-11-24', '2023-11-30', 50),
(2, 'KingJo', 'Bahasa Indonesia', '2023-11-24', '2023-11-30', 500),
(3, 'Josua', 'Bahasa Thailand', '2023-11-24', '2023-11-30', 10);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pinjam`
--

CREATE TABLE `riwayat_pinjam` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `tenggat` date NOT NULL,
  `jumlah` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pinjam`
--

INSERT INTO `riwayat_pinjam` (`id`, `nama`, `nomor`, `judul`, `tanggal`, `tenggat`, `jumlah`) VALUES
(1, 'Raja Josua', 255, 'Bahasa Indonesia', '2023-11-24', '2023-11-30', 250),
(2, 'KingJo', 255, 'Bahasa Indonesia', '2023-11-24', '2023-11-30', 50),
(3, 'Josua', 255, 'Matematika', '2023-11-24', '2023-11-30', 50);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `namasiswa` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `namasiswa`, `nis`, `kelas`, `no_hp`, `alamat`, `username`, `password`, `role`) VALUES
(1, 'Maura', '120140148', 'XII', '081812981892', 'Medan', 'maura', 'maura', 1),
(51, 'datur', '918829198', 'X', '08871827127', 'Medan', 'datur', 'datur', 0),
(52, 'tegar', '198982189', 'X', '081828188787', 'Papua', 'tegar', 'tegar', 0),
(53, 'hbubhbuy', 'bu', 'uby', 'buybubyu', 'byubuy', 'byubyu', 'bbyubyu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`,`email`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `judul_buku` (`judul_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_denda`
--
ALTER TABLE `riwayat_denda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_kembali`
--
ALTER TABLE `riwayat_kembali`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`,`no_hp`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_denda`
--
ALTER TABLE `riwayat_denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_kembali`
--
ALTER TABLE `riwayat_kembali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_pinjam`
--
ALTER TABLE `riwayat_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
