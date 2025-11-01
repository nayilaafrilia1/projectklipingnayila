-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2025 at 02:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectklipingnayila`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int NOT NULL,
  `namaadmin` varchar(255) NOT NULL,
  `idjabatan` int DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `fotoadmin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `namaadmin`, `idjabatan`, `username`, `password`, `nohp`, `email`, `fotoadmin`) VALUES
(27, 'Nayila Afrilia', 105, 'Nayila', '$2y$10$ARNeNZXx2WbpItCLku/h5Obt7OKZC5sa8i3x7a7WoYsqGPw8KhO1W', '081234567890', 'nayila@gmail.com', '1761802796_gmbr4.jpg'),
(53, 'riska', 1, 'riska1', '12345', '081234567890', 'riska@gmail.com', '1761803267_gmbr1.jpg'),
(54, 'memei', 111, 'memei1', '12345', '087912345432', 'memei@gmail.com', '1761802712_gmbr5.jpg'),
(55, 'nylaqq', 2, 'nylaa', '123', '087657802345', 'nyla@gmail.com', '1761802775_sport.jpg'),
(56, 'ririn', 1, 'ririn12', '345', '08999', 'ririn@gmail.com', '1761806803_gambar6.jpg'),
(58, 'rizka', 112, 'rizkaaulia', '2345', '08975367282', 'rizka@gmail.com', '1761803281_gmbr5.jpg'),
(62, 'rayan', 111, 'rayan12', '$2y$10$mQvCtU7eZ5dkDszDhPj90.SbdbF./8SRXOksHA1Yt5gGra.XFVr9u', '087654321234', 'rayan@gmail.com', '1761806769_gmbr7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int NOT NULL,
  `namajabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `namajabatan`) VALUES
(1, 'Manajer'),
(2, 'guru'),
(103, 'Staf Administrasi'),
(105, 'Akuntan Keuangan'),
(111, 'pejabat'),
(112, 'model');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
(3, 'Teknologi1'),
(4, 'esport'),
(5, 'olahraga'),
(6, 'kriminal'),
(7, 'kecelakaan'),
(12, 'biografi');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `idkomentar` int NOT NULL,
  `isikomentar` text,
  `tanggalkomentar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`idkomentar`, `isikomentar`, `tanggalkomentar`) VALUES
(2, 'Informasi yang bagus sekali.', '2025-10-08 09:32:03'),
(3, 'Perlu diperjelas lagi bagian ini.', '2025-10-08 14:00:00'),
(4, 'menakjubkan sekali!', '2025-10-19 10:02:12'),
(5, 'baguss bangetttt', '2025-10-23 11:30:51'),
(6, 'aku suka bangett1', '2025-10-23 05:06:31'),
(7, 'sangat menarik untuk di coba', '2025-10-28 01:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `idkonten` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isikonten` text,
  `fotokonten` varchar(255) DEFAULT NULL,
  `tanggalpublikasi` date DEFAULT NULL,
  `idadmin` int DEFAULT NULL,
  `idkategori` int DEFAULT NULL,
  `idkomentar` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`idkonten`, `judul`, `isikonten`, `fotokonten`, `tanggalpublikasi`, `idadmin`, `idkategori`, `idkomentar`) VALUES
(3, 'Review Ponsel Flagship Terbaru', 'Ulasan mendalam tentang keunggulan dan kekurangan ponsel X.', '1761719845_gmbr3.jpg', '2025-10-08', 27, 5, 3),
(29, '5 Cara Mengatasi Rasa Malas untuk Produktif', 'membuat jadwal, memecah tugas besar, dan menciptakan lingkungan kerja yang kondusif', '1761964224_gambar6.jpg', '2025-09-30', 27, 5, 5),
(33, 'memasak', 'belajar', '1761517316_gmbr3.jpg', '2025-10-27', 27, 3, 5),
(35, 'Perbedaan Emas Murni dan Emas Perhiasan', 'perbandingan yang jelas antara emas murni dan emas perhiasan', '1761964306_gmbr7.jpg', '2025-10-28', 54, 3, 7),
(36, 'Jangan Buang Sampah Sembarangan!', 'Mari jaga lingkungan', '1761964626_gmbr9.jpg', '2025-11-01', 62, 12, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_admin_jabatan` (`idjabatan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`idkomentar`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`idkonten`),
  ADD KEY `idadmin` (`idadmin`),
  ADD KEY `idkategori` (`idkategori`),
  ADD KEY `idkomentar` (`idkomentar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabatan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `idkomentar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `idkonten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_jabatan` FOREIGN KEY (`idjabatan`) REFERENCES `jabatan` (`idjabatan`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_ibfk_1` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON DELETE SET NULL,
  ADD CONSTRAINT `konten_ibfk_2` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`idkategori`) ON DELETE SET NULL,
  ADD CONSTRAINT `konten_ibfk_3` FOREIGN KEY (`idkomentar`) REFERENCES `komentar` (`idkomentar`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
