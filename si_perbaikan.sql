-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2020 pada 04.51
-- Versi server: 10.1.40-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_perbaikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_trafo`
--

CREATE TABLE `data_trafo` (
  `kd_gardu` varchar(30) NOT NULL,
  `nomor_seri` int(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `status` text NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_trafo`
--

INSERT INTO `data_trafo` (`kd_gardu`, `nomor_seri`, `jenis`, `alamat`, `merk`, `status`, `kondisi`) VALUES
('P0330', 0, 'Gardu Distribusi 1 Tiang', 'Jl Perempatan Kastrian', 'OSAKA', 'Terpasang', 'Healty'),
('P0384', 0, 'Gardu Distribusi 1 Tiang', 'Jl Mahakam', 'Mitsubishi', 'Terpasang', 'Healty\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dat_laporan`
--

CREATE TABLE `dat_laporan` (
  `id_laporan` varchar(11) NOT NULL,
  `kd_gardu` varchar(50) NOT NULL,
  `img_bef` varchar(500) NOT NULL,
  `kondisi_awal` text NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `img_baru` varchar(60) NOT NULL,
  `kondisi_baru` text NOT NULL,
  `nama_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dat_laporan`
--

INSERT INTO `dat_laporan` (`id_laporan`, `kd_gardu`, `img_bef`, `kondisi_awal`, `lokasi`, `waktu`, `img_baru`, `kondisi_baru`, `nama_petugas`) VALUES
('R001', 'P0417', 'trafo2.jpg', 'Sedang', 'Jln Senggani', '2020-06-23', 'trafo1.jpg', 'Baik', 'Nur Ahmad A'),
('R002', 'P0330', 'trafo2.jpg', 'Sedang', 'Jln Senggani', '2020-06-21', 'trafo1.jpg', 'Baik', 'Nursyam ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dat_lokasi`
--

CREATE TABLE `dat_lokasi` (
  `no` int(11) NOT NULL,
  `kd_gardu` varchar(30) NOT NULL,
  `kd_pylg` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longtitude` double NOT NULL,
  `upj` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dat_lokasi`
--

INSERT INTO `dat_lokasi` (`no`, `kd_gardu`, `kd_pylg`, `alamat`, `latitude`, `longtitude`, `upj`) VALUES
(1, 'P0330', 'BUNUL', 'Jl Perempatan Kastrian', -7.9775467689, 112.6434508643, 'MALANG'),
(2, 'P0417', 'AHDLN', 'Jl Mangunsarkoro Boldy', -7.9855172616, 112.6368854776, 'MALANG'),
(3, 'P0384', 'TNGBR', 'JL. MAHAKAM', -7.9635142702, 112.6369502474, 'MALANG'),
(4, 'P0313', 'BUNUL', 'Jl MUSI', -7.9618567648, 112.6391460883, 'MALANG'),
(5, 'P0328', 'BUNUL', 'Jl Hamid Rusdi', -7.9710291905, 112.6437044871, 'MALANG'),
(6, 'P0090', 'BUNUL', 'Jl Hamid Rusdi', -7.9723844823, 112.6452767132, 'MALANG'),
(7, 'P1538', 'ZNZKS', 'Jl Muharto', -7.9942501041, 112.6396689583, 'MALANG'),
(8, 'P0358', 'LWKWR', 'Jl Mawar Selatan', -7.9582917948, 112.6314342679, 'MALANG'),
(9, 'P0363', 'AHDLN', 'Jl Merdeka Barat', -7.9827702058, 112.6300681966, 'MALANG'),
(10, 'P0045', 'PTMRA', 'Jl Kahuripan', -7.9765110953, 112.6301961939, 'MALANG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(30) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `alamat`, `ttl`, `telp`) VALUES
('UL0010', 'Nur Ahmad A', 'Jln Diponegoro', '1993-10-12', '6285811567302'),
('UL0098', 'Nursyam ', 'Jln Pisang Kembar 98', '1998-11-25', '6281336174315');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_m_user`
--

CREATE TABLE `tbl_m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_jenis_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_m_user`
--

INSERT INTO `tbl_m_user` (`id_user`, `username`, `password`, `id_jenis_user`) VALUES
(1, 'admin', 'admin', 1),
(2, 'petugas', 'petugas', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_trafo`
--
ALTER TABLE `data_trafo`
  ADD PRIMARY KEY (`kd_gardu`);

--
-- Indeks untuk tabel `dat_laporan`
--
ALTER TABLE `dat_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `dat_lokasi`
--
ALTER TABLE `dat_lokasi`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_m_user`
--
ALTER TABLE `tbl_m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
