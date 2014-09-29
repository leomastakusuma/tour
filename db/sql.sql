-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 20 Agu 2014 pada 18.49
-- Versi Server: 5.5.35-0ubuntu0.13.10.2
-- Versi PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `wisata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(3) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `tgl_berita` date NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE IF NOT EXISTS `bukutamu` (
  `id_bukutamu` int(4) NOT NULL AUTO_INCREMENT,
  `id_user` int(4) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_bukutamu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrasi`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data untuk tabel `registrasi`
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
(36, 'asdasd', 'asdads', '089769079129', 'leo.masta@facebook.com', 'ommasta', 'a123123', '2014-08-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE IF NOT EXISTS `reservasi` (
  `id_reservasi` int(4) NOT NULL AUTO_INCREMENT,
  `tgl_reservasi` date NOT NULL,
  `tujuan` varchar(200) NOT NULL,
  `harga` int(11) NOT NULL,
  `include_paket` text NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id_reservasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(4) NOT NULL AUTO_INCREMENT,
  `id_reservasi` int(4) NOT NULL,
  `id_user` int(4) NOT NULL,
  `jml_reservasi` int(4) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `id_registrasi` varchar(4) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_registrasi`, `user`, `pass`, `level`) VALUES
(1, '', 'testing', 'testing', ''),
(2, '', 'ommasta', 'a123123', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;