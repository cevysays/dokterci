-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2017 at 10:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dokterci`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `pasien_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `diagnosa` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `no_reg`, `pasien_id`, `diagnosa`) VALUES
(1, 'REG000001', 000001, 'Asam Urat'),
(2, 'REG000002', 000008, 'Influenza'),
(3, 'REG000002', 000008, 'Asma'),
(8, '1', 000001, 'Influenza'),
(9, '7', 000023, 'coba'),
(10, '7', 000023, 'kepo'),
(11, '7', 000023, 'ads'),
(12, '7', 000023, 'naga'),
(13, '7', 000023, 'makan malam'),
(14, '7', 000023, 'fdsf'),
(15, '7', 000023, 'gd'),
(16, '8', 000014, 'baru'),
(18, '8', 000014, 'baru lagi'),
(19, '9', 000024, 'typus');

-- --------------------------------------------------------

--
-- Table structure for table `master_diagnosa`
--

CREATE TABLE `master_diagnosa` (
  `diagnosa_id` int(10) NOT NULL,
  `kode_icd` varchar(10) NOT NULL,
  `nama_penyakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_tindakan`
--

CREATE TABLE `master_tindakan` (
  `tindakan_id` int(10) NOT NULL,
  `kode_tindakan` varchar(255) NOT NULL,
  `nama_tindakan` text NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `namalengkap` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `umur` tinyint(2) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `riwayat` text NOT NULL,
  `rm_upload` varchar(250) NOT NULL,
  `lastinput` datetime NOT NULL,
  `tampil` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id`, `namalengkap`, `alamat`, `umur`, `telp`, `riwayat`, `rm_upload`, `lastinput`, `tampil`) VALUES
(000001, 'Pranoto', 'Karang Pandes, Wedi', 49, '-', '', '', '2017-07-12 06:08:52', 1),
(000002, 'Tyas Wahyu', 'Blok O, Janti', 38, '-', '', '', '2017-07-12 06:10:32', 1),
(000003, 'Anjar Sukmono', 'Desa Tlutup,', 28, '(0295) 471530', '', '', '2017-07-12 06:12:17', 1),
(000004, 'Nahrul A', 'Bendogantungan, Klaten', 56, '-', '', '', '2017-07-12 06:14:32', 1),
(000005, 'Ahmad Karim', 'Jalan Sambisari, Dusun Sambisari, Condongcatur Jogja', 34, '-', '', '', '2017-07-12 06:18:23', 1),
(000006, 'Umi Hidayati', 'Desa Bakaran Wetan, Juwana, Pati', 34, '087153636567', '', '', '2017-07-12 06:19:55', 1),
(000007, 'Suyono', 'Desa Bakaran Wetan, RT 1 / RW 1 Juwana Pati', 40, '085283475098', '', '', '2017-07-12 06:22:36', 1),
(000008, 'Darsono Aji', 'Karangpandes, Wedi, Klaten', 62, '08783454698', '', '', '2017-07-12 06:25:47', 1),
(000009, 'Sukardi', 'Jalan Nusa Indah No 1, Condong Catur, DIY', 69, '081235978648', '', '', '2017-07-12 06:26:43', 1),
(000010, 'Haryanti', 'Gang megatruh, Kocoran, Karangwuni', 47, '081286735459', '', '', '2017-07-12 06:28:58', 1),
(000011, 'Ayu Hartati', 'Desa Bajomulyo, Juwana, Pati', 32, '0899747485739', '', '', '2017-07-12 06:29:34', 1),
(000012, 'Warsito Angga', 'Desa Bendar, Kecamatan Juwana Pati', 29, '0838765283947', '', '', '2017-07-12 06:30:57', 1),
(000013, 'Angga Prasteyo', 'Karangwuni Blok F, Sleman, Jogja', 39, '089973726334', '', '', '2017-07-12 06:32:20', 1),
(000014, 'Romli Yahya', 'Bendogantungan, Klaten', 33, '0854874387', '', '', '2017-07-12 06:36:04', 1),
(000015, 'Taufik Firmansyah', 'Desa Tlutup, Juwana, Pati', 30, '087827653889', '', '', '2017-07-12 06:37:06', 1),
(000016, 'Harsanto Mulyo', 'Palur, Solo', 45, '085328874987', '', '', '2017-07-12 06:41:53', 1),
(000017, 'Widhi Aryo', 'Blok O Janti', 30, '081226748565', '', '', '2017-07-12 06:46:17', 1),
(000018, 'Sulistyo Adi', 'Desa Dukutalit, Juwana, Pati', 46, '085764898487', '', '', '2017-07-12 06:47:37', 1),
(000019, 'Singgih', 'Bendogantungan, Klaten', 82, '-', '', '', '2017-07-12 06:49:14', 1),
(000020, 'Suwarno', 'Wedi, Klaten', 75, '-', '', '', '2017-07-12 06:50:07', 1),
(000021, 'Harsanti Sulis', 'Desa Bakaran Kulon, Juwana, Pati', 47, '0812987490868', '', '', '2017-07-12 06:51:13', 1),
(000022, 'Bayu', 'Bendogantungan, Klaten', 35, '089923486584', '', '', '2017-07-12 10:42:21', 1),
(000023, 'Adi Saputro W', 'Jalan HOS Cokroaminoto', 32, '0878543624223', '', '', '2017-07-12 04:44:30', 1),
(000043, 'baru', 'baru', 12, '0', 'baru', 'file_baru_1503821358.', '2017-08-27 10:09:18', 1),
(000044, 'cicim', 'godean', 23, '081226748565', 'boyok', 'file_cicim_1507095892.png', '2017-10-04 07:44:52', 1),
(000045, 'baru', 'adsada', 11, '31412', 'dsada', 'file_baru_1514364232.', '2017-12-27 09:43:52', 1),
(000042, 's', 's', 12, '12', 'ss', 'file_s_1500839957.jpg', '2017-07-23 21:59:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `id` int(11) NOT NULL,
  `no_reg` int(11) NOT NULL,
  `pasien_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `tgl_reg` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id`, `no_reg`, `pasien_id`, `tgl_reg`, `status`, `keluhan`) VALUES
(2, 1, 000001, '2017-07-12', 1, 'Pusing, mual, dan flue'),
(12, 6, 000019, '2017-07-14', 0, 'dsfsdf'),
(11, 5, 000019, '2017-07-14', 0, 'fasdfsdf'),
(10, 4, 000023, '2017-07-14', 0, 'empat to'),
(8, 2, 000023, '2017-07-14', 0, 'rewr'),
(9, 3, 000023, '2017-07-14', 0, 'vdgdf'),
(13, 7, 000023, '2017-07-16', 1, 'test'),
(14, 8, 000014, '2017-07-16', 1, 'baru'),
(15, 9, 000024, '2017-07-19', 1, 'pusing'),
(16, 10, 000043, '2017-08-27', 0, 'keluhann baru'),
(17, 11, 000044, '2017-10-04', 0, 'boyok'),
(18, 12, 000044, '2017-10-04', 0, 'boyok'),
(19, 13, 000044, '2017-11-02', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `terapi`
--

CREATE TABLE `terapi` (
  `id` int(11) NOT NULL,
  `etiket` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `no_rm` varchar(20) NOT NULL,
  `terapi` varchar(250) NOT NULL,
  `jml` int(3) NOT NULL,
  `resep` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terapi`
--

INSERT INTO `terapi` (`id`, `etiket`, `tgl`, `no_reg`, `no_rm`, `terapi`, `jml`, `resep`) VALUES
(1, '3x1 Setelah makan', '2017-07-16', '8', '000014', 'baru lagi', 2, ''),
(2, '3x1 sehari', '2017-07-19', '9', '000024', 'obat typus', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `pasien_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `tindakan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id`, `no_reg`, `pasien_id`, `tindakan`) VALUES
(1, '7', 000023, 'coba'),
(2, '8', 000014, 'baru lagi'),
(3, '9', 000024, 'perikasa, konsultasi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `namalengkap` varchar(250) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `role` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `tgl_login` datetime NOT NULL,
  `ip_login` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `namalengkap`, `email`, `role`, `created`, `modified`, `tgl_login`, `ip_login`, `status`) VALUES
(15, 'cevyyufindra', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Cevy Yufindra', NULL, 'petugas', NULL, NULL, '2017-12-27 10:18:43', '::1', 1),
(14, 'agunghartoko', '5ec2e91731b167db36a1daa68ac26332', 'dr. Agung Hartoko, S.Ked', NULL, 'dokter', NULL, NULL, '2017-12-27 10:18:21', '::1', 1),
(11, 'cevyyufindra', '21232f297a57a5a743894a0e4a801fc3', 'Cevy Yufindra', NULL, 'admin', NULL, NULL, '2017-12-27 10:18:43', '::1', 1),
(17, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', NULL, 'admin', NULL, NULL, '2017-12-27 10:11:26', '::1', 1),
(18, 'sitisundari', '9e11c1469248e4f68a1088802bb476ed', 'dr. Hj. Siti Sundari, SpM., Mkes', NULL, 'dokter', NULL, NULL, '2017-07-12 09:56:52', '::1', 1),
(21, 'penggunabaru', 'f6d6b705b589db67d48c7956573061ea', 'penggunabaru', NULL, 'petugas', NULL, NULL, '0000-00-00 00:00:00', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_diagnosa`
--
ALTER TABLE `master_diagnosa`
  ADD PRIMARY KEY (`diagnosa_id`);

--
-- Indexes for table `master_tindakan`
--
ALTER TABLE `master_tindakan`
  ADD PRIMARY KEY (`tindakan_id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_lengkap` (`namalengkap`(10));

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terapi`
--
ALTER TABLE `terapi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `master_diagnosa`
--
ALTER TABLE `master_diagnosa`
  MODIFY `diagnosa_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_tindakan`
--
ALTER TABLE `master_tindakan`
  MODIFY `tindakan_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `terapi`
--
ALTER TABLE `terapi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
