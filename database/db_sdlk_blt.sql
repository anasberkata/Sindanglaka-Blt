-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2022 at 07:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sdlk_blt`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_blt_penerima`
--

CREATE TABLE `data_blt_penerima` (
  `id_blt` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_kk` varchar(1000) NOT NULL,
  `no_nik` varchar(1000) NOT NULL,
  `jalan` varchar(200) NOT NULL,
  `rtrw` varchar(200) NOT NULL,
  `desa` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `kabupaten` varchar(200) NOT NULL,
  `provinsi` varchar(200) NOT NULL,
  `kode_pos` varchar(200) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `nama_ibu` varchar(255) NOT NULL,
  `status_dtks` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_blt_penerima`
--

INSERT INTO `data_blt_penerima` (`id_blt`, `nama_lengkap`, `no_kk`, `no_nik`, `jalan`, `rtrw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `pekerjaan`, `nama_ibu`, `status_dtks`, `periode`, `date_created`, `is_active`) VALUES
(1, 'Rendi Dermawan', '3203060198982983', '320306018267736', 'Sindanglaka', '01 / 01', '', '', '', '', '', 'Buruh', 'Iis', 1, '2022-01', '2022-06-14', 1),
(2, 'Eka Nika', '321010101010', '321010101010', 'Pasantren', '01 / 01', 'Sindanglaka', 'Karangtengah', 'Cianjur', 'Jawa Barat', '43281', 'Pegawai Negeri Sipil', 'Aisyah', 0, '2022-01', '2022-06-14', 1),
(3, 'Asep', '32019029389', '320199201019', 'Pasantren', '01 / 01', 'Sindanglaka', 'Karangtengah', 'Cianjur', 'Jawa Barat', '43281', 'Pegawai Negeri Sipil', 'Iis', 1, '2022-01', '2022-06-14', 1),
(5, 'Yoyot', '32030671872872873', '32030665277188167', 'Rambutan', '02 / 01', 'Sindanglaka', 'Karangtengah', 'Cianjur', 'Jawa Barat', '43281', 'Belum/ Tidak Bekerja', 'Mimin', 0, '2022-02', '2022-06-25', 1),
(6, 'Riana', '3202920320938', '3200937490837', 'Joglo', '01 / 01', 'Sindanglaka', 'Karangtengah', 'Cianjur', 'Jawa Barat', '43281', 'Pelajar / Mahasiswa', 'Ririn', 0, '2022-03', '2022-06-25', 1),
(7, 'Nanang', '32039289328', '32309303098', 'jebrod', '01 / 01', 'Sindanglaka', 'Karangtengah', 'Cianjur', 'Jawa Barat', '43281', 'Mengurus Rumah Tangga', 'heni', 0, '2022-03', '2022-06-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_jabatan`
--

CREATE TABLE `data_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_jabatan`
--

INSERT INTO `data_jabatan` (`id_jabatan`, `nama_jabatan`, `date_created`, `is_active`) VALUES
(1, 'Admin', '2022-06-07', 1),
(2, 'Kasi Kesejahteraan', '2022-06-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_rtrw`
--

CREATE TABLE `data_rtrw` (
  `id_rtrw` int(11) NOT NULL,
  `rukun_warga` varchar(128) NOT NULL,
  `rukun_tetangga` varchar(128) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rtrw`
--

INSERT INTO `data_rtrw` (`id_rtrw`, `rukun_warga`, `rukun_tetangga`, `date_created`, `is_active`) VALUES
(1, '01', '01', '2022-06-13', 1),
(2, '01', '02', '2022-06-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_status_pekerjaan`
--

CREATE TABLE `data_status_pekerjaan` (
  `id_status_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_status_pekerjaan`
--

INSERT INTO `data_status_pekerjaan` (`id_status_pekerjaan`, `nama_pekerjaan`, `date_created`, `is_active`) VALUES
(1, 'Belum/ Tidak Bekerja', '2022-06-14', 1),
(2, 'Mengurus Rumah Tangga', '2022-06-14', 1),
(3, 'Pelajar / Mahasiswa', '2022-06-14', 1),
(4, 'Pensiunan', '2022-06-14', 1),
(5, 'Pegawai Negeri Sipil', '2022-06-14', 1),
(6, 'Tentara Nasional Indonesia', '2022-06-14', 1),
(8, 'Kepolisian RI', '2022-06-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` int(11) NOT NULL,
  `date_created` date NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `jabatan`, `date_created`, `is_active`) VALUES
(1, 'Azka Siti Muzakiyah', 'azkasitimuzakiyah@gmail.com', 'admin', 'admin', 1, '2022-05-11', 1),
(2, 'Kasi Kesejahteraan', 'kasi01@gmail.com', 'kasi01', '12345', 2, '2022-05-11', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_blt_penerima`
--
ALTER TABLE `data_blt_penerima`
  ADD PRIMARY KEY (`id_blt`);

--
-- Indexes for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `data_rtrw`
--
ALTER TABLE `data_rtrw`
  ADD PRIMARY KEY (`id_rtrw`);

--
-- Indexes for table `data_status_pekerjaan`
--
ALTER TABLE `data_status_pekerjaan`
  ADD PRIMARY KEY (`id_status_pekerjaan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_blt_penerima`
--
ALTER TABLE `data_blt_penerima`
  MODIFY `id_blt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_jabatan`
--
ALTER TABLE `data_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_rtrw`
--
ALTER TABLE `data_rtrw`
  MODIFY `id_rtrw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `data_status_pekerjaan`
--
ALTER TABLE `data_status_pekerjaan`
  MODIFY `id_status_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
