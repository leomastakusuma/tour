-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2014 at 11:03 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `wisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `tgl_berita` datetime NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `tgl_berita`, `judul_berita`, `isi_berita`, `gambar`) VALUES
(20, 1, '2014-09-14 01:19:01', 'PT Myindo Cyber Media', 'Jakaratasdd20<span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Jakaratasdd20</span>', '5572leo.jpg'),
(21, 1, '2014-09-14 12:52:43', 'leo masta  kuisuma', 'Leo Masatasdassssssssssssssssssssss21<span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span><span style="font-size: 13.63636302948px; line-height: 18.1818180084229px;">Leo Masatasdassssssssssssssssssssss21</span>', 'null'),
(22, 1, '2014-09-14 12:52:57', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(23, 1, '2014-09-14 12:53:00', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(24, 1, '2014-09-14 12:53:03', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(25, 1, '2014-09-14 12:53:06', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(26, 1, '2014-09-14 12:53:10', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(27, 1, '2014-09-14 12:53:23', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(28, 1, '2014-09-14 12:53:26', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(29, 1, '2014-09-14 12:53:29', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(30, 1, '2014-09-14 12:53:32', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(31, 1, '2014-09-14 12:53:34', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null'),
(32, 1, '2014-09-14 12:53:37', 'leo masta kusuma Jakarta', 'asdaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
  `id_bukutamu` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_bukutamu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(1, '0', '', 'Jelek sekali', '2014-09-14 10:46:45'),
(2, 'Leo Masta', '', 'Cukup Bagus', '2014-09-14 10:47:52'),
(3, 'asd', '', 'dadsa', '2014-09-14 11:08:36'),
(4, 'Aldonie', '', 'Sangat Bagus!!!!!! :)', '2014-09-14 11:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE IF NOT EXISTS `registrasi` (
  `id_registrasi` int(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `tgl_registrasi` date NOT NULL,
  PRIMARY KEY (`id_registrasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `registrasi`
--

INSERT INTO `registrasi` (`id_registrasi`, `nama`, `alamat`, `notelp`, `email`, `username`, `password`, `tgl_registrasi`) VALUES
(9, 'Leo', 'Jl Radio 1 No 21 Jakarta Selatan', '08123145', 'leomasta@facebook.com', 'leo', 'ommasta', '2014-08-19'),
(10, 'Leo Masta Kusuma', 'Jl Radio 1 No 21 Jakarta Selatan', '0823452', 'leo.masta@facebook.com', '02123123', 'asdasd', '2014-08-15'),
(11, 'Aldoni', 'Jl Antena V ,Radio Dalam Kebayoran Baru..', '089769079129', 'leo.masta@facebook.com', 'aldoni', '1234qweasf', '2014-08-18'),
(12, 'Aldoni', 'Jl Antena V ,Radio Dalam Kebayoran Baru..', '089769079129', 'leo.masta@facebook.com', 'aldoni', 'asdasfsafd', '2014-08-18'),
(13, 'Aldoni', 'Jl Antena V ,Radio Dalam Kebayoran Baru..', '089769079129', 'leo.masta@facebook.com', 'aldoni', 'asdasdagas', '2014-08-18'),
(14, 'Aldoni', 'Jl Antena V ,Radio Dalam Kebayoran Baru..', '089769079129', 'leo.masta@facebook.com', 'aldoni', 'asdweqewqw', '2014-08-18'),
(15, 'Aldoni', 'Jl Antena V ,Radio Dalam Kebayoran Baru..', '089769079129', 'leo.masta@facebook.com', 'aldoni', 'asdasdasd', '2014-08-18'),
(16, '', '', '', '', 'ommasta', 'asdasd', '2014-08-18'),
(17, '', '', '', '', 'ommasta', 'asdasd', '2014-08-18'),
(18, 'Leo Masta Kusuma', 'asdasd', '089769079129', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-18'),
(19, 'asdas', 'asdasd', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'asdasd', '2014-08-18'),
(20, 'asdas', 'asdasd', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'asdasd', '2014-08-18'),
(21, 'aDSASD', 'ASDAS', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'asdasd', '2014-08-18'),
(22, 'Leo', 'asda', '089769079129', 'sony@myindo.com', 'ommasta', 'asdasd', '2014-08-18'),
(23, 'Leo', 'asda', '089769079129', 'sony@myindo.com', 'ommasta', 'asdasd', '2014-08-18'),
(24, 'Leo', 'asdasd', '089769079129', 'ommasta@email.com', 'ommasta', 'asdasd', '2014-08-18'),
(25, 'asda', 'asda', '089769079129', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-18'),
(26, 'asda', 'sad', '0123', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-18'),
(27, 'asda', 'sad', '0123', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-18'),
(28, 'asdasd', 'asda', '089769079129', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-18'),
(29, 'asdasd', 'asda', '089769079129', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-18'),
(30, 'Sonny', 'Bandung', '089769079129', 'leo@test.com', 'ommasta', 'asdasd', '2014-08-19'),
(31, 'leo', 'asdads', '089769079129', 'leomastakusuma@gmail.com', 'ommasta', 'asdasd', '2014-08-19'),
(32, 'adasd', 'asdad', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'asdasd', '2014-08-19'),
(33, 'Riza Masta Kusuma', 'Bandar Lampung', '089769079129', 'leomastakusuma@gmail.com', 'testing', 'testing', '2014-08-19'),
(34, 'Riza Masta Kusuma', 'Bandar Lampung', '089769079129', 'leomastakusuma@gmail.com', 'testing', 'testing', '2014-08-19'),
(35, 'asdasd', 'asdads', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'a123123', '2014-08-19'),
(36, 'asdasd', 'asdads', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'a123123', '2014-08-19'),
(37, 'Rendi', 'Jakarta', '089769079129', 'leo.masta@facebook.com', 'rendi', 'rendi123', '2014-08-27'),
(38, 'asddddddddddddddd', 'asdddddddddddddd', '089769079129', 'leomastakusuma@gmail.com', 'adminqqqqqqqqqq', 'asdasd', '2014-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE IF NOT EXISTS `reservasi` (
  `id_reservasi` int(4) NOT NULL AUTO_INCREMENT,
  `tgl_reservasi` datetime NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `durasi` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `include_paket` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id_reservasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tgl_reservasi`, `tujuan`, `durasi`, `harga`, `include_paket`, `image`) VALUES
(19, '2014-09-15 00:00:00', 'Jakarta  Bali', '4 hari', 1111111111, 'asddddddddddddddddddddd', '2623klara.jpg'),
(20, '2014-09-15 00:00:00', 'Palembang', '3 Hari', 9000000, 'Sunan', '8542pahawang.jpg'),
(21, '2014-09-15 00:00:00', 'Jakarta', '2 Hari ', 1111111, 'asdasdads', '723pahawang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(4) NOT NULL AUTO_INCREMENT,
  `id_reservasi` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `jml_reservasi` int(4) NOT NULL,
  `total_harga` float NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_reservasi`, `id_user`, `jml_reservasi`, `total_harga`, `tgl_pemesanan`, `status`) VALUES
(1, 19, 2, 12, 1, '2014-09-15', 'ord'),
(2, 19, 2, 12, 1, '2014-09-15', 'ord'),
(3, 19, 2, 12, 1200000000, '2014-09-15', 'ord'),
(4, 19, 2, 12, 1200000000, '2014-09-15', 'ord');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `user` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `level`) VALUES
(1, 'Leo Masta', 'admin', 'admin'),
(2, 'ommasta', 'masta', 'user'),
(3, 'rendi', 'rendi123', 'user'),
(4, 'adminqqqqq', 'asdasd', 'user');
