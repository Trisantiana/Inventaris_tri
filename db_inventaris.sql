-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 11:44 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `invenKembali` (IN `id_inven` INT(1), IN `jum` INT(1))  UPDATE inventaris SET jumlah = jumlah + jum WHERE id_inven = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateInventaris` (IN `id_inven` INT(1), IN `jum` INT(1))  UPDATE inventaris SET jumlah = jumlah - jum WHERE id_inven = id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_peminjaman` int(10) UNSIGNED NOT NULL,
  `id_inventaris` int(10) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id`, `id_peminjaman`, `id_inventaris`, `jumlah`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 2, '2019-04-02 01:07:54', '2019-04-02 01:07:54'),
(4, 4, 2, 2, '2019-04-02 02:03:22', '2019-04-02 02:03:22'),
(5, 5, 3, 2, '2019-04-04 18:33:59', '2019-04-04 18:33:59'),
(6, 6, 3, 1, '2019-04-04 18:36:53', '2019-04-04 18:36:53'),
(7, 9, 2, 1, '2019-04-04 19:26:28', '2019-04-04 19:26:28'),
(8, 10, 3, 3, '2019-04-04 19:29:05', '2019-04-04 19:29:05'),
(9, 11, 4, 2, '2019-04-05 06:43:06', '2019-04-05 06:43:06'),
(10, 12, 3, 2, '2019-04-05 08:44:10', '2019-04-05 08:44:10'),
(11, 13, 2, 2, '2019-04-05 09:19:57', '2019-04-05 09:19:57'),
(12, 14, 3, 3, '2019-04-05 09:23:56', '2019-04-05 09:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris`
--

CREATE TABLE `inventaris` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_jenis` int(10) UNSIGNED NOT NULL,
  `tanggal_register` date NOT NULL,
  `id_ruang` int(10) UNSIGNED NOT NULL,
  `kode_inventaris` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventaris`
--

INSERT INTO `inventaris` (`id`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`, `created_at`, `updated_at`) VALUES
(2, 'barang2', 'baik', 'bagus', 50, 3, '2019-04-02', 3, 'k1', 1, '2019-04-02 00:07:40', '2019-04-02 00:11:04'),
(3, 'barang3', 'baik', 'bagus', 43, 2, '2019-04-05', 2, 'k02', 1, '2019-04-04 17:44:47', '2019-04-04 17:44:58'),
(4, 'barang4', 'baik', 'bagus', 40, 3, '2019-04-05', 2, 'k4', 1, '2019-04-05 06:33:29', '2019-04-05 06:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_jenis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`, `kode_jenis`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'jenisedit', 'j1', 'kk', '2019-04-01 21:27:55', '2019-04-04 17:37:45'),
(3, 'jenis2', 'j2', 'pp', '2019-04-01 23:13:07', '2019-04-01 23:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama_level`) VALUES
(1, 'Administrator'),
(2, 'Operator'),
(3, 'Peminjam');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_petugas_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_02_013721_create_jenis_table', 1),
(4, '2019_04_02_013904_create_ruangs_table', 1),
(5, '2019_04_02_014209_create_inventaris_table', 1),
(6, '2019_04_02_014603_create_pegawais_table', 1),
(7, '2019_04_02_014735_create_peminjaman_table', 1),
(8, '2019_04_02_014956_create_detail_pinjams_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `nip`, `alamat`, `created_at`, `updated_at`) VALUES
(2, 'santi', '12345', 'po', '2019-04-01 23:35:28', '2019-04-01 23:35:28'),
(3, 'nama', '12345', 'po', '2019-04-01 23:35:55', '2019-04-01 23:35:55'),
(5, 'dewi12', '1234', 'po', '2019-04-05 08:43:30', '2019-04-05 08:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(10) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`, `created_at`, `updated_at`) VALUES
(1, '2019-04-02', '2019-04-09', 'sedang dipinjam', 2, '2019-04-02 00:58:36', '2019-04-02 00:58:36'),
(3, '2019-04-02', '2019-04-09', 'sudah kembali', 2, '2019-04-02 01:07:54', '2019-04-02 01:07:54'),
(4, '2019-04-02', '2019-04-09', 'sudah kembali', 3, '2019-04-02 02:03:21', '2019-04-02 02:03:21'),
(5, '2019-04-05', '2019-04-12', 'sudah kembali', 2, '2019-04-04 18:33:58', '2019-04-04 18:33:58'),
(6, '2019-04-05', '2019-04-12', 'sedang dipinjam', 2, '2019-04-04 18:36:53', '2019-04-04 18:36:53'),
(7, '2019-04-05', '2019-04-12', 'dibooking', 2, '2019-04-04 19:26:01', '2019-04-04 19:26:01'),
(8, '2019-04-05', '2019-04-12', 'dibooking', 2, '2019-04-04 19:26:18', '2019-04-04 19:26:18'),
(9, '2019-04-05', '2019-04-12', 'sudah kembali', 2, '2019-04-04 19:26:28', '2019-04-04 19:26:28'),
(10, '2019-04-05', '2019-04-12', 'sudah kembali', 2, '2019-04-04 19:29:05', '2019-04-04 19:29:05'),
(11, '2019-04-05', '2019-04-12', 'dibooking', 3, '2019-04-05 06:43:06', '2019-04-05 06:43:06'),
(12, '2019-04-05', '2019-04-12', 'dibooking', 5, '2019-04-05 08:44:10', '2019-04-05 08:44:10'),
(13, '2019-04-05', '2019-04-12', 'dibooking', 2, '2019-04-05 09:19:57', '2019-04-05 09:19:57'),
(14, '2019-04-05', '2019-04-12', 'sedang dipinjam', 3, '2019-04-05 09:23:56', '2019-04-05 09:23:56');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `name`, `username`, `password`, `id_level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$TyFveUFarRExNxkZLZpBmebgSxv5JCU8N1FIw/CGxkuSR736byEpS', 1, '4ddgJhkrYk2wxZOYGm29KfDNJ4miTwBcOKKCNC45blRsI5HwjYo3qyeGnFC0', NULL, NULL),
(2, 'Operator', 'operator', '$2y$10$Nwz2BdMBPVHdT0Fdwd15gufEayIwVhRPzZsUpidRB9AuL50BEPMY.', 2, 'IoLloyUd3AetZ5qEeoHiCNvzwKdh3rfjVdNOurqrRX0ITb5JL9qp8izCmwUK', NULL, NULL),
(3, 'dewi', 'dewi', '$2y$10$1ycF3YgaI1pHJ0A96rXzQOHh8ZhrUzfpvJzBpEXJivpqAjSeM55Ui', 3, '14GW4TH0gEpJj7HXl6P9oU1TemFHwwZtvee3dMO6vx5dEeienz7A1NSOnRMs', '2019-04-01 23:34:07', '2019-04-01 23:34:07'),
(4, 'santi', 'santi', '$2y$10$WyTh.XDN0OYyZatdxXRRkuN/yxI76U0SqyWvcMiGTEjEzoJQCKR.2', 3, 'S795KhRJfOoHG2BHAy0PNnbBeHu9JAqnxVWtAUiTV6h3CC7k2kn3TCf3xt1Z', '2019-04-01 23:35:28', '2019-04-01 23:35:28'),
(5, 'nama', 'nama', '$2y$10$zTq9Fl/XAyB3LgWcsmbi6uwnCSTS8wk8Ij1X6YTgoMNlDA8GR4REm', 3, 'mEep2PbCXLuPGLv7HFN0r5TMNqCAFRoza1OOITDupdmmsHf2M6z4PK1WLyl0', '2019-04-01 23:35:55', '2019-04-01 23:35:55'),
(6, 'tri santiana', 'tri', 'tri1234', 2, NULL, '2019-04-04 20:17:58', '2019-04-04 20:17:58'),
(7, 'tri san', 'tri12', '$2y$10$gJBoCZGTPf6t.qcoSXA84e4e1Q5iu./EC8MtW3spgEZKwiGqKlx2e', 3, '8kmwftNyfApbyaeq3C2H2ZUOSoad67EV7CoZoPajuxWorzsGt97ytBvZDjI0', '2019-04-04 20:22:28', '2019-04-04 20:22:28'),
(9, 'dewi12', 'dewi12', '$2y$10$VDeRpN1XTGzISO.HA2t5yuOdc5dq0L1nngZ4H.aiXBAmhFW5.S7ga', 3, 'QfSPBptZLsttPDJHAHw92vTGhP6t50GEumEpUhplAsMaHZfaD5sXSbyvgFK9', '2019-04-05 08:43:30', '2019-04-05 08:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_ruang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `kode_ruang`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'ruang2', 'r2', 'ooo', '2019-04-01 21:51:51', '2019-04-01 21:51:51'),
(3, 'ruang', 't', 'hh', '2019-04-01 21:52:46', '2019-04-01 21:52:46');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_peminjam`
-- (See below for the actual view)
--
CREATE TABLE `v_peminjam` (
`id` int(10) unsigned
,`id_peminjaman` int(10) unsigned
,`id_inventaris` int(10) unsigned
,`jumlah` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`tanggal_pinjam` date
,`tanggal_kembali` date
,`status_peminjaman` varchar(191)
,`id_pegawai` int(10) unsigned
,`nama` varchar(191)
,`kode_inventaris` varchar(191)
,`nama_pegawai` varchar(191)
,`nip` varchar(191)
);

-- --------------------------------------------------------

--
-- Structure for view `v_peminjam`
--
DROP TABLE IF EXISTS `v_peminjam`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_peminjam`  AS  select `a`.`id` AS `id`,`a`.`id_peminjaman` AS `id_peminjaman`,`a`.`id_inventaris` AS `id_inventaris`,`a`.`jumlah` AS `jumlah`,`a`.`created_at` AS `created_at`,`a`.`updated_at` AS `updated_at`,`b`.`tanggal_pinjam` AS `tanggal_pinjam`,`b`.`tanggal_kembali` AS `tanggal_kembali`,`b`.`status_peminjaman` AS `status_peminjaman`,`b`.`id_pegawai` AS `id_pegawai`,`c`.`nama` AS `nama`,`c`.`kode_inventaris` AS `kode_inventaris`,`d`.`nama_pegawai` AS `nama_pegawai`,`d`.`nip` AS `nip` from (((`detail_pinjam` `a` join `peminjaman` `b`) join `inventaris` `c`) join `pegawai` `d`) where ((`a`.`id_peminjaman` = `b`.`id`) and (`a`.`id_inventaris` = `c`.`id`) and (`b`.`id_pegawai` = `d`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pinjam_id_peminjaman_foreign` (`id_peminjaman`),
  ADD KEY `detail_pinjam_id_inventaris_foreign` (`id_inventaris`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventaris_id_jenis_foreign` (`id_jenis`),
  ADD KEY `inventaris_id_ruang_foreign` (`id_ruang`),
  ADD KEY `inventaris_id_petugas_foreign` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `petugas_username_unique` (`username`),
  ADD KEY `petugas_id_level_foreign` (`id_level`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_id_inventaris_foreign` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pinjam_id_peminjaman_foreign` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_id_jenis_foreign` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventaris_id_petugas_foreign` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `inventaris_id_ruang_foreign` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_id_level_foreign` FOREIGN KEY (`id_level`) REFERENCES `petugas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
