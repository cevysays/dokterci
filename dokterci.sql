-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Jun 2015 pada 17.13
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dokterci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE IF NOT EXISTS `diagnosa` (
`id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `pasien_id` int(6) unsigned zerofill NOT NULL,
  `diagnosa` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosa`
--

INSERT INTO `diagnosa` (`id`, `no_reg`, `pasien_id`, `diagnosa`) VALUES
(2, 'REG000001', 000012, 'sakit perut'),
(3, 'REG000001', 000012, 'Diare'),
(4, 'REG000004', 000011, 'punggung nyeri'),
(5, 'REG000004', 000011, 'punggung sakit dan susah jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
`id` int(6) unsigned zerofill NOT NULL,
  `namalengkap` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `umur` tinyint(2) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `lastinput` datetime NOT NULL,
  `tampil` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id`, `namalengkap`, `alamat`, `umur`, `telp`, `lastinput`, `tampil`) VALUES
(000002, 'Safira Safilia', 'Desa Kemantran Kabupaten Tegal', 17, '0283123456', '2014-11-21 03:25:23', 0),
(000003, 'Anastasia Cyberella', 'Jl. Kalimantan 56 Gang Gado gado', 23, '08122334566', '2014-08-20 01:02:29', 1),
(000004, 'Mario Mandzukic', 'Kroasia', 30, '-', '2014-08-20 06:56:27', 1),
(000005, 'Raditya Dika', 'Jl. Mawar Melati Indah No. 98 Kota Slawi', 27, '0283123456', '2014-08-25 12:24:03', 1),
(000006, 'Slamet riyadi bin kartasasmidja', 'Ds Pagongan Kabupaten Tegal', 30, '1234567890', '2014-08-25 12:24:33', 1),
(000007, 'Ana Ivanovic', 'Ds. Pepedan RT 09 RW 12 Kabupaten Tegal', 23, '-', '2014-08-25 12:25:06', 1),
(000008, 'Udin Komarudin Bin Edi Samudja', 'Jl. Ketilang No 15 RT 06 RW 11 Randugunting Kota Tegal', 45, '-', '2014-08-25 12:25:48', 1),
(000009, 'Jaka', 'Bandung', 1, '1234555555', '2014-11-07 10:40:36', 0),
(000010, 'Dul Gepuk, SH', 'Pagedangan Kab Tegal', 34, '0283-3456789', '2015-01-26 21:57:51', 1),
(000011, 'Dul Joni', 'Ds. Kedokan Sayang RT 06 RW 12 Kab Tegal', 23, '08134444578', '2015-01-26 21:58:57', 1),
(000012, 'Dul Gepak', 'Tegalwangi Kab Tegal', 32, '-', '2015-01-26 22:08:56', 1),
(000013, 'ahmad bastiar', 'jogja', 23, '087738121245', '2015-06-17 11:53:22', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
`id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `pasien_id` int(6) unsigned zerofill NOT NULL,
  `tgl_reg` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `registrasi`
--

INSERT INTO `registrasi` (`id`, `no_reg`, `pasien_id`, `tgl_reg`, `status`, `keluhan`) VALUES
(1, 'REG000001', 000012, '2015-03-14', 1, 'Cacingan'),
(2, 'REG000002', 000010, '2015-03-14', 1, 'Sakit kepala parah\r\n'),
(3, 'REG000003', 000012, '2015-06-11', 0, 'sakit kepala migran '),
(4, 'REG000004', 000011, '2015-06-11', 1, 'hkhk'),
(5, 'REG000005', 000012, '2015-06-17', 0, 'sakit  kepala'),
(6, 'REG000006', 000010, '2015-06-17', 0, 'knkn'),
(7, 'REG000007', 000013, '2015-06-17', 0, 'sakit punggung'),
(8, 'REG000008', 000013, '2015-06-17', 0, 'sakit kepala'),
(9, 'REG000009', 000013, '2015-06-19', 0, 'flue,pilek,dan hidung gatel'),
(10, 'REG000010', 000013, '2015-06-19', 0, 'sd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `terapi`
--

CREATE TABLE IF NOT EXISTS `terapi` (
`id` int(11) NOT NULL,
  `etiket` varchar(255) NOT NULL,
  `tgl` date NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `no_rm` varchar(20) NOT NULL,
  `terapi` varchar(250) NOT NULL,
  `jml` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `terapi`
--

INSERT INTO `terapi` (`id`, `etiket`, `tgl`, `no_reg`, `no_rm`, `terapi`, `jml`) VALUES
(1, '3 x 1 sehari sebelum makan', '2015-03-17', 'REG000001', '000012', 'Valisanbe', 10),
(2, '2 x 1 hari sesudah makan', '2015-03-17', 'REG000001', '000012', 'Mefinal', 20),
(3, '1', '2015-06-17', 'REG000004', '000011', 'dextoi', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
`id` int(11) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `pasien_id` int(6) unsigned zerofill NOT NULL,
  `tindakan` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id`, `no_reg`, `pasien_id`, `tindakan`) VALUES
(1, 'REG000001', 000012, 'Injeksi Rutin'),
(2, 'REG000001', 000012, 'Operasi'),
(3, 'REG000004', 000011, 'olahraga setiap hari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `namalengkap`, `email`, `role`, `created`, `modified`, `tgl_login`, `ip_login`, `status`) VALUES
(6, 'dokter', 'e807f1fcf82d132f9bb018ca6738a19f', 'Dr. Sebastian GiovincO', 'dokter@gmail.com', 'dokter', '2014-11-07 10:34:35', '2014-11-07 10:34:35', '2015-03-09 03:00:33', '::1', 0),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Slenteng Jos', 'admin@admin.com', 'admin', '2014-08-23 19:12:15', '2014-08-23 19:12:15', '2015-06-19 11:40:18', '::1', 1),
(5, 'dimasedu', '827ccb0eea8a706c4c34a16891f84e7b', 'Dimas Edu', 'edudimas1@gmail.com', 'kasir', '2014-11-07 10:33:46', '2014-11-07 10:33:46', '0000-00-00 00:00:00', '', 1),
(7, 'jayeng', '827ccb0eea8a706c4c34a16891f84e7b', 'Papi Jay', NULL, 'admin', NULL, NULL, '0000-00-00 00:00:00', '', 1),
(8, 'rhesaadinegara', 'e36bd0e55de96dc003b01e75a3d26f99', 'Rhesa Adinegara', NULL, 'admin', NULL, NULL, '2015-05-02 02:32:06', '127.0.0.1', 1),
(9, 'rhesaadinegara', 'e36bd0e55de96dc003b01e75a3d26f99', 'Rhesa Adinegara', NULL, 'dokter', NULL, NULL, '2015-05-02 02:32:06', '127.0.0.1', 1),
(10, 'rhesaadinegara', 'd78ac49bbdc8d078d4ca1bf25169893e', 'Rhesa Adinegara', NULL, 'kasir', NULL, NULL, '2015-05-02 02:32:06', '127.0.0.1', 1),
(20, 'bastiar', 'bastiar', 'ahmad bastiar', 'bas@gmail.com', 'admin', '2015-06-06 00:00:00', NULL, '0000-00-00 00:00:00', '1234', 1),
(23, 'bastiar123', '1234567890', 'bas', 'bas@gmail.com', 'admin', '2015-06-06 06:24:42', '2015-06-06 06:24:42', '2015-06-06 06:24:42', '192.168.201.1', 1),
(24, 'nsjmcs', 'c8c9dfa8dbe4faad99d9e6a9ea3144da', 'ahmad bastiar', NULL, 'kasir', NULL, NULL, '0000-00-00 00:00:00', '', 1),
(25, 'nsjmdokter', 'dd7bc7eb131502068fd1a25eca4d4272', 'ahmad bastiar', NULL, 'dokter', NULL, NULL, '0000-00-00 00:00:00', '', 1),
(26, 'kasir', 'de28f8f7998f23ab4194b51a6029416f', 'kasir bas', NULL, 'admin', NULL, NULL, '2015-06-17 01:07:57', '::1', 1),
(27, 'kasirq', 'd130cbc5bca12e35d1284fa307dc7ca0', 'rehsa rahardian', NULL, 'kasir', NULL, NULL, '0000-00-00 00:00:00', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
 ADD PRIMARY KEY (`id`), ADD KEY `nama_lengkap` (`namalengkap`(10));

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `noreg` (`no_reg`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
MODIFY `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `terapi`
--
ALTER TABLE `terapi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
