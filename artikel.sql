-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 04:47 AM
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
-- Database: `artikel`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `usrnm` varchar(20) NOT NULL,
  `pass` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`usrnm`, `pass`) VALUES
('123', '123'),
('mhnbl', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(500) NOT NULL,
  `topik` varchar(500) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `penulis` varchar(500) NOT NULL,
  `tanggal` date NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `topik`, `deskripsi`, `penulis`, `tanggal`, `link`) VALUES
(25, 'Waspadai Dampak dari Gaya Hidup Sedentary', 'Gaya Hidup', 'Gaya hidup sedentary, atau hidup dengan aktivitas fisik yang minim, telah menjadi masalah kesehatan yang semakin meresahkan di era modern. Banyak dari kita terjebak dalam pola hidup yang melibatkan banyak duduk, minim gerak, dan kecenderungan untuk lebih banyak beraktivitas di depan layar. Namun, apa sebenarnya dampak dari gaya hidup sedentary ini? Bagaimana cara mencegahnya, dan mengapa penting untuk memikirkan kesehatan di masa depan, bahkan dengan memiliki asuransi?\r\n', 'Agy Yudhistira\r\n', '2024-02-22', 'https://www.kompasiana.com/agyyudhistira/65d705f8c57afb39114bde52/waspadai-dampak-dari-gaya-hidup-sedentary'),
(26, 'Rahasia Kualitas Tidur Optimal: Menjadi Lebih Segar dan Produktif Setiap Hari', 'Gaya Hidup', 'Tidak dapat dipungkiri bahwa kehidupan modern seringkali memaksa kita untuk terus terjebak dalam hiruk-pikuk seputar uang, prestasi, dan tuntutan harian lainnya. Namun, inilah saatnya untuk berhenti sejenak, mengalihkan perhatian, dan merenungi bagaimana tidur yang baik bisa menjadi fondasi untuk membangun kehidupan yang lebih memuaskan.', 'Hafsah Zalfa Rafifah', '2024-03-02', 'https://www.kompasiana.com/zalfarafifah9666/65e22f8bde948f23ad543752/rahasia-kualitas-tidur-optimal-menjadi-lebih-segar-dan-produktif-setiap-hari'),
(27, 'Ini Rekomendasi Obat Mabuk Perjalanan untuk Mudik Lebaran\r\n', 'Obat', 'Mabuk saat perjalanan mudik dapat menyebabkan seseorang merasa mual, muntah, hingga pusing. Kamu bisa konsumsi obat mabuk perjalanan sebelum seperti Antimo, Dramamine, Primperan, dan Herbavomitz yang dapat dibeli di Halodoc.', 'Dr. Rizal Fadli\r\n \r\n', '2024-04-04', 'https://www.halodoc.com/artikel/ini-rekomendasi-obat-mabuk-perjalanan-untuk-mudik-lebaran'),
(28, '7 Makanan Rendah Purin untuk Pengidap Asam Urat', 'Makan', 'Asam urat terbentuk dari pemecahan zat kimia yang bernama purin. Diet rendah purin bisa menjadi pilihan bagi pengidap asam urat. Contoh makanannya seperti buah ceri, lemon, susu rendah lemak, hingga biji-bijian.', 'Dr. Rizal Fadli\r\n', '2024-04-03', 'https://www.halodoc.com/artikel/7-makanan-rendah-purin-untuk-pengidap-asam-urat'),
(29, 'Perbedaan Omega 3, 6, dan 9: Manfaat dan Contoh Makanan', 'Makan', 'Omega 3, 6, dan 9 adalah jenis asam lemak yang bermanfaat bagi kesehatan manusia. Kandungan ini bisa didapatkan dari sumber nabati maupun hewani. Meski namanya terkesan mirip, ada sejumlah perbedaan omega 3, 6, dan 9.', 'Bayu Ardi Isnanto', '2024-04-04', 'https://health.detik.com/berita-detikhealth/d-7277334/perbedaan-omega-3-6-dan-9-manfaat-dan-contoh-makanan');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subjek` varchar(50) NOT NULL,
  `pesan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(31, 'wiaaew', 'cykblyat4@gmail.com', 'Request for Access to r/DnD', 'asd'),
(32, 'mhnl', 'cykblyat4@gmail.com', 'Request for Access to r/DnD', 'teat'),
(33, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(34, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(35, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(36, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(37, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(38, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(39, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(40, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(41, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(42, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(43, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(44, 'cx', 'cykblyat4@gmail.com', 'm', 'm'),
(45, 'cx', 'cykblyat4@gmail.com', 'm', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
