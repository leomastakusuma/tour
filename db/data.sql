-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 16, 2014 at 10:03 PM
-- Server version: 5.5.37-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wisata`
--
CREATE DATABASE IF NOT EXISTS `wisata` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wisata`;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `tgl_berita`, `judul_berita`, `isi_berita`, `gambar`) VALUES
(20, 1, '2014-09-16 20:46:31', 'PT Myindo Cyber Media', '<div style="text-align: justify;"><b style="line-height: 1.42857143;">Sebuah Perusahan Bergerak Dibidang IT BASE SOLUTION,</b><span style="line-height: 1.42857143;">Sebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTIONSebuah Perusahan Bergerak Dibidang IT BASE SOLUTION</span></div>', '5572leo.jpg'),
(33, 1, '2014-09-16 20:44:06', 'aldoni galau versi 2', '<div style="text-align: justify;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;<span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><span style="line-height: 1.42857143;">sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;sedang mencari pacar&nbsp;</span><br></div>', '715pahawang.jpg');

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama`, `email`, `komentar`, `tanggal`) VALUES
(1, '0', '', 'Jelek sekali', '2014-09-14 10:46:45'),
(2, 'Leo Masta', '', 'Cukup Bagus', '2014-09-14 10:47:52'),
(3, 'asd', '', 'dadsa', '2014-09-14 11:08:36'),
(4, 'Aldonie', '', 'Sangat Bagus!!!!!! :)', '2014-09-14 11:21:43'),
(5, 'Aldonie', 'leo@mastaasdasd', 'asdaaaaaaaaaaaaaa', '2014-09-16 21:20:41'),
(6, 'asdads', 'asdads@gmail.com', 'asdads', '2014-09-16 21:21:13'),
(7, 'Semangat', 'leomastakusuma@gmail.com', 'asdadsads', '2014-09-16 21:21:33');

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
(38, 'asddddddddddddddd', 'asdddddddddddddd', '089769079129', 'leomastakusuma@gmail.com', 'adminqqqqqqqqqq', 'asdasd', '2014-09-14'),
(39, 'Oasda', 'asd', '089769079129', 'asdasd@gmail.com', '12345', '123456', '2014-09-16'),
(40, 'RIza Masta', 'Lampung', '0823452', 'riza@gmail.com', 'rizamasta', 'user123', '2014-09-16');

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tgl_reservasi`, `tujuan`, `durasi`, `harga`, `include_paket`, `image`) VALUES
(19, '2014-09-15 00:00:00', 'Jakarta  Bali', '4 hari', 1111111111, 'asddddddddddddddddddddd', '2623klara.jpg'),
(20, '2014-09-15 00:00:00', 'Palembang', '3 Hari', 9000000, 'Sunan', '8542pahawang.jpg'),
(21, '2014-09-15 00:00:00', 'Jakarta', '2 Hari ', 1111111, 'asdasdads', '723pahawang.jpg');

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_reservasi`, `id_user`, `jml_reservasi`, `total_harga`, `tgl_pemesanan`, `status`, `invoice`) VALUES
(20, 20, 6, 2, 18000000, '2014-09-16', 'SUCCES', 'PNR61'),
(21, 21, 6, 1, 1111110, '2014-09-16', 'SUCCES', 'PNR41');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `level`) VALUES
(1, 'Leo Masta', 'admin', 'admin'),
(2, 'ommasta', 'masta', 'user'),
(3, 'rendi', 'rendi123', 'user'),
(4, 'adminqqqqq', 'asdasd', 'user'),
(5, '12345', '123456', 'user'),
(6, 'rizamasta', 'user123', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;