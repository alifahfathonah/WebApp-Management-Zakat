-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2019 at 02:03 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumentasi`
--

CREATE TABLE `tb_dokumentasi` (
  `id_dokumentasi` varchar(20) NOT NULL,
  `id_proyek` varchar(30) NOT NULL,
  `gambar` varchar(60) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id_gambar` int(11) NOT NULL,
  `judul_gambar` varchar(30) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_sumbangan`
--

CREATE TABLE `tb_jenis_sumbangan` (
  `kode_sumbangan` varchar(20) NOT NULL,
  `nama_sumbangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_sumbangan`
--

INSERT INTO `tb_jenis_sumbangan` (`kode_sumbangan`, `nama_sumbangan`) VALUES
('S-1562504881', 'Wakaf'),
('S-1562659320', 'Zakat'),
('S-1562659329', 'Infaq'),
('S-1562659383', 'Donasi Dakwah'),
('S-1562659393', 'Beasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama_pengajar` varchar(30) NOT NULL,
  `alumni` varchar(30) NOT NULL,
  `bidang_studi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `nama_pengajar`, `alumni`, `bidang_studi`) VALUES
(1, 'Ust M.D Karyadi, Lc Al-Hafidz', 'LIPIA Jakarta', 'Tafsir, Tahfidz Al-Quran');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` varchar(30) NOT NULL,
  `tujuan` text NOT NULL,
  `nominal` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tujuan`, `nominal`, `keterangan`, `tanggal_keluar`) VALUES
('PNG-1564321459', 'Proyek Pembangunan Masjid', 350000, 'Membeli Semen dan Batu Bata', '2019-01-08'),
('PNG-1564321913', 'Makan Anak Panti', 3000000, 'Makanan', '2019-02-12'),
('PNG-1564325238', 'Proyek Pembangunan Sekolah', 1000000, 'Makanan Kuproy', '2019-02-05'),
('PNG-1564325341', 'Amal Zariah', 2500000, 'Uang dan Sembako', '2019-03-13'),
('PNG-1564325439', 'Makan Anak Panti', 4350000, 'Makanan', '2019-08-22'),
('PNG-1564385686', 'pembangunan pondasi mushola', 3000000, 'beli cat', '2019-02-17'),
('PNG-1568192303', 'Proyek Pembangunan Masjid', 3000000, 'Membeli Semen dan Batu Bata', '2019-11-04'),
('PNG-1568192371', 'Makan Anak Panti', 1000000, 'Makanan', '2018-10-31'),
('PNG-1568192585', 'Proyek Pembangunan Masjid', 1000000, 'Membeli Semen dan Batu Bata', '2019-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `jenis_pengguna` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama`, `email`, `alamat`, `tgl_lahir`, `jenis_kelamin`, `jenis_pengguna`, `password`) VALUES
('admin', 'admin', 'admin@gmail.com', 'jakarta', '2019-07-17', 'Pria', 'Admin', '21232f297a57a5a743894a0e4a801fc3'),
('agus1', 'Bpk Agus', '', 'jakarta timur ', '1995-04-22', 'Pria', 'donatur', '16396c160e8e5918d7d96a24cd6cc032'),
('aris1', 'Bpk Aris', '', 'Bekasi Timur ', '1965-02-02', 'Pria', 'donatur', '4fffa11346e230b4caca5b31b6092913'),
('erna', 'Bpk. Hj. Erna', '', 'jakarta', '1974-09-23', 'Pria', 'donatur', '035b3c6377652bd7d49b5d2e9a53ef40'),
('genta28', 'genta prima', 'gentaprima600@gmail.com', '', '0000-00-00', '', 'donatur', 'e10adc3949ba59abbe56e057f20f883e'),
('google123', 'Raditya', '', 'jakarta timur', '1996-06-12', 'Pria', 'Penanggung Jawab', 'b8f8312b939f00abb38eeafd4fd107f3'),
('heri102', 'Bpk Heri Antoni', '', 'Bekasi Timur', '1959-04-07', 'Pria', 'donatur', '031c6f398c36e3ccd7c84336f96be73e'),
('husni10', 'Bpk. Husni', '', 'jakarta timur', '1984-09-25', 'Pria', 'donatur', 'fe66cc91c21435ee4bf0b982019abcfe'),
('husni11', 'Husni Makar', '', 'jakarta', '1985-07-12', 'Pria', 'Penanggung Jawab', '8d9c5a4af6502ce1dd71826d4c1b1749'),
('ketua', 'Ust. Hidayatullah, S.H.I, M,Ag', '', 'Jakarta', '2018-02-08', 'Pria', 'Ketua Pesantren', '00719910bb805741e4b7f28527ecb3ad'),
('lia', 'Ibu Lia', '', 'jakarta timur', '1944-02-12', 'Wanita', 'donatur', '8d84dd7c18bdcb39fbb17ceeea1218cd'),
('pangat', 'Ibu Pangat', '', 'Jakarta', '1970-09-28', 'Wanita', 'donatur', 'cbaee482ff9213b92505732ddf04ad2f'),
('rina', 'Ibu rina', '', 'cipinang', '1985-09-23', 'Wanita', 'donatur', '3aea9516d222934e35dd30f142fda18c'),
('syahrul1', 'Syahrul Gunawan ', '', 'jakartaaa', '2019-07-15', 'Pria', 'Penanggung Jawab', 'd403af74fcbebb23c7c7d0d62f9f90d7'),
('uti', 'Umbah Uti', '', 'Jl.Kakatua 10', '1961-02-27', 'Wanita', 'donatur', '4d2606237ea94965b5405c99863da39a'),
('yadi', 'Bpk Yadi', '', 'Depok', '1978-03-08', 'Pria', 'donatur', 'e60838b9f0c0ed98a486f231a4df9c4a');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pengguna` varchar(30) NOT NULL,
  `isi_pesan` varchar(100) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`id_pesan`, `id_pengguna`, `isi_pesan`, `tgl`, `status`) VALUES
(4, 'aris1', ' sistem sangat bagus                                                               ', '31 Jul 2019', 'dibaca'),
(5, 'aris1', 'cacad                                                                ', '01 Aug 2019', 'dibaca'),
(6, 'aris1', 'Sangat Bagus                                                  ', '24 Aug 2019', 'dibaca'),
(7, 'aris1', 'test                                              ', '26 Aug 2019', 'dibaca'),
(8, 'aris1', 'bagus', '14 Sep 2019', 'dibaca'),
(9, 'aris1', 'asdasd', '14 Sep 2019', 'dibaca');

-- --------------------------------------------------------

--
-- Table structure for table `tb_proyek`
--

CREATE TABLE `tb_proyek` (
  `id_proyek` varchar(30) NOT NULL,
  `id_pengguna` varchar(30) NOT NULL,
  `nama_proyek` varchar(30) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `kemajuan` int(11) NOT NULL,
  `thumbnail` varchar(60) NOT NULL,
  `tanggal_proyek` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tingkatan` varchar(30) NOT NULL,
  `hafalan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`, `asal`, `tingkatan`, `hafalan`, `status`) VALUES
(7, 'Azis Ramadhan', 'Putra', 'Bangka', 'SMP', '1 Juz', 'Dhuafa'),
(8, 'Ade Rizki', 'Putra', 'Bangka', 'SD', '1 Juz', 'Dhuafa'),
(9, 'Ikramullah', 'Putra', 'Bangka', 'SD', '1/2 Juz', 'Yatim'),
(10, 'Izaz Julianda', 'Putra', 'Bangka', 'SD', '1 Juz', 'Dhuafa'),
(11, 'Rohit Lutfi', 'Putra', 'Bangka', 'SD', '1 Juz', 'Dhuafa'),
(12, 'Dwi Satria', 'Putra', 'Lampung', 'SD', '4 Juz', 'Yatim'),
(13, 'Nasrullah Abdan', 'Putra', 'Jakarta', 'SD', '3 Juz', 'Dhuafa'),
(14, 'Fadhil Hilmi', 'Putra', 'Cirebon', 'SD', '7 Juz', 'Dhuafa'),
(15, 'Rafif', 'Putra', 'Cirebon', 'SD', '1 Juz', 'Dhuafa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sumbangan`
--

CREATE TABLE `tb_sumbangan` (
  `id_sumbangan` varchar(20) NOT NULL,
  `id_pengguna` varchar(30) NOT NULL,
  `kode_sumbangan` varchar(20) NOT NULL,
  `nominal_sumbangan` int(11) NOT NULL,
  `tgl_terima` date NOT NULL,
  `bukti_transfer` varchar(50) DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sumbangan`
--

INSERT INTO `tb_sumbangan` (`id_sumbangan`, `id_pengguna`, `kode_sumbangan`, `nominal_sumbangan`, `tgl_terima`, `bukti_transfer`, `status`) VALUES
('SM-1564329713', 'aris1', 'S-1562504881', 500000, '2019-01-08', '045850c5281b75b98b0da2112e051395.jpg', 'konfirmasi'),
('SM-1564385464', 'agus1', 'S-1562504881', 1000000, '2019-02-04', NULL, 'konfirmasi'),
('SM-1564386284', 'rina', 'S-1562659383', 550000, '2019-08-13', NULL, 'konfirmasi'),
('SM-1564573769', 'erna', 'S-1562659320', 500000, '2019-07-31', 'fb3ebf6eeba23d433ce33ce3226bfae7.jpg', 'konfirmasi'),
('SM-1564665932', 'lia', 'S-1562659393', 1500000, '2018-03-07', NULL, 'konfirmasi'),
('SM-1566823165', 'aris1', 'S-1562504881', 3000000, '2018-08-26', '46c2ebb49449363e49c579f3fd1fcb96.jpg', 'konfirmasi'),
('SM-1566823655', 'agus1', 'S-1562659320', 1000000, '2018-01-01', NULL, 'konfirmasi'),
('SM-1568359957', 'aris1', 'S-1562504881', 3000000, '2019-09-13', '6e27d29031a974a2c74e82f99a2f2b49.jpg', 'belum konfirmasi'),
('SM-1568359981', 'aris1', 'S-1562659320', 1000000, '2019-09-19', '6f12fe7178949b7ad7c8dce3dc71c88b.jpg', 'belum konfirmasi'),
('SM-1568456271', 'genta28', 'S-1562504881', 1000000, '2019-09-13', '3f41c716c922c40878ab8e4fb89ff005.jpg', 'belum konfirmasi');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'gentaprima600@gmail.com', 'm8ZLyPQXOoODvMDSA9f/laZukApZfl6s5brDXYmQC9o=', 0),
(2, 'gentaprima600@gmail.com', 'tV0h+3YcZEq2SotN5fcZc2IY9RBU9VENcirD2MbL0Qk=', 0),
(3, 'gentaprima600@gmail.com', '27u+MPBDVxJQFyrSLN7EOp0Xux85CKBtHPZ76LLPaqM=', 1568010193),
(4, 'gentaprima600@gmail.com', 'hmYGoItPjNeClbyRXR9xjRgDSosKVy3dUHjCODydaac=', 1568010251),
(5, 'gentaprima600@gmail.com', 'DBj6TozOazJqnU86EfX8OZMdPM0FEC0jyveS5A1IKew=', 1568010324),
(6, 'gentaprima600@gmail.com', 'sXeLDLyoicg4Tx4MyWPQD/f1Lv6pNdt6unCkJik4ddA=', 1568023644),
(7, 'gentaprima600@gmail.com', 'uU6Vy+kPA/MFdvilemKUizLlqkfht9ZI7QKlPFxXYa0=', 1568025417),
(8, 'gentaprima600@gmail.com', 'w6L8HwGi6UCEajl/GSiBXBKpAA6ABjozHBLUOvcztx8=', 1568025654),
(9, 'gentaprima600@gmail.com', '+QPDquSR8iyv959V4HUf94toLCQBE8bm1XVO6tQUlHg=', 1568025718),
(10, 'gentaprima600@gmail.com', 'R5vjXZk4lhVmli9+VoCV3nw8g+mm8A/W2i3sPABZqoM=', 1568025774),
(11, 'gentaprima600@gmail.com', 'lUxmCm+lr0HoAb9fQG5dLwlWeOy1n4t7lRiHlq5drKA=', 1568192813),
(12, 'gentaprima600@gmail.com', 'Y6DVzH7FYgIy1tnYyTmu/sYPlPBRIe5UqlYxiCTXxAI=', 1568456175);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tb_jenis_sumbangan`
--
ALTER TABLE `tb_jenis_sumbangan`
  ADD PRIMARY KEY (`kode_sumbangan`);

--
-- Indexes for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indexes for table `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD PRIMARY KEY (`id_proyek`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_sumbangan`
--
ALTER TABLE `tb_sumbangan`
  ADD PRIMARY KEY (`id_sumbangan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `kode_sumbangan` (`kode_sumbangan`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_dokumentasi`
--
ALTER TABLE `tb_dokumentasi`
  ADD CONSTRAINT `tb_dokumentasi_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `tb_proyek` (`id_proyek`);

--
-- Constraints for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD CONSTRAINT `tb_pesan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_proyek`
--
ALTER TABLE `tb_proyek`
  ADD CONSTRAINT `tb_proyek_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`);

--
-- Constraints for table `tb_sumbangan`
--
ALTER TABLE `tb_sumbangan`
  ADD CONSTRAINT `tb_sumbangan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tb_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tb_sumbangan_ibfk_2` FOREIGN KEY (`kode_sumbangan`) REFERENCES `tb_jenis_sumbangan` (`kode_sumbangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
