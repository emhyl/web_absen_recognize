-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2024 pada 15.48
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recognize`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_absen`
--

CREATE TABLE `t_absen` (
  `id` int(11) NOT NULL,
  `id_guru` char(8) NOT NULL,
  `tgl_absen` date NOT NULL,
  `jam_absen` time NOT NULL,
  `sts_absen` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_area`
--

CREATE TABLE `t_area` (
  `id` int(11) NOT NULL,
  `nm_area` varchar(100) NOT NULL,
  `lat_min` char(20) NOT NULL,
  `lat_max` char(20) NOT NULL,
  `long_min` char(20) NOT NULL,
  `long_max` char(20) NOT NULL,
  `status_area` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_area`
--

INSERT INTO `t_area` (`id`, `nm_area`, `lat_min`, `lat_max`, `long_min`, `long_max`, `status_area`) VALUES
(13, 'rumah', '-5.48803', '-5.48846', '120.23064', '120.23101', 0),
(16, 'ugjl', '-5.48502', '-5.48540', '120.23050', '120.23508', 0),
(18, 'kampus', '-5.57276', '-5.57320', '120.13884', '120.13919', 0),
(21, 'lkn blk', '-5.54555', '-5.54570', '120.19126', '120.19150', 1),
(22, 'Utti', '-5.55419', '-5.55434', '120.19212', '120.19234', 0),
(23, 'Warkop 29', '-5.54599', '-5.54609', '120.19400', '120.19415', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_guru`
--

CREATE TABLE `t_guru` (
  `id_guru` char(8) NOT NULL,
  `nip` char(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `face_recognize` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_guru`
--

INSERT INTO `t_guru` (`id_guru`, `nip`, `nama`, `face_recognize`) VALUES
('GR503814', '1111111111', 'Wiwi Elmaningsih', '96183452.jpg'),
('GR680479', '12345', 'star', '72950861.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jam`
--

CREATE TABLE `t_jam` (
  `id` int(11) NOT NULL,
  `min` time NOT NULL,
  `max` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_jam`
--

INSERT INTO `t_jam` (`id`, `min`, `max`) VALUES
(1, '08:00:00', '09:30:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_login`
--

CREATE TABLE `t_login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_guru` char(8) DEFAULT NULL,
  `lvl` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `t_login`
--

INSERT INTO `t_login` (`id`, `username`, `password`, `id_guru`, `lvl`) VALUES
(6, '1111111111', '123', 'GR503814', 'pegawai'),
(7, '12345', '123', 'GR680479', 'pegawai'),
(8, 'admin', 'admin', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_absen`
--
ALTER TABLE `t_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_area`
--
ALTER TABLE `t_area`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_guru`
--
ALTER TABLE `t_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `t_jam`
--
ALTER TABLE `t_jam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_login`
--
ALTER TABLE `t_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_absen`
--
ALTER TABLE `t_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_area`
--
ALTER TABLE `t_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `t_jam`
--
ALTER TABLE `t_jam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_login`
--
ALTER TABLE `t_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
