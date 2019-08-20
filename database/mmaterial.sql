-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2019 pada 10.57
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coldstorage`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mmaterial`
--

CREATE TABLE `mmaterial` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `statusmaterial` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `mmaterial`
--

INSERT INTO `mmaterial` (`id`, `kode`, `nama`, `lokasi`, `umur`, `statusmaterial`, `status`) VALUES
(1, 'Z-19.776-001', 'Carbon', 'B06', 210, '0', '1'),
(2, 'Z-19.905-001', 'Kevlar', 'A02', 56, '0', '1'),
(3, 'Z-19.904-001', 'Epoxy', 'A03', 123, '0', '1'),
(4, 'Z-19.101-001', 'Glass', 'B06', 64, '0', '1'),
(5, 'Z-15.425-001', 'Adhesive Foam', 'B05', 97, '0', '1'),
(6, 'Z-15.441-001', 'Adhesive Core', 'C04', 47, '0', '1'),
(7, 'Z-15.429-001', 'Adhesive', 'C06', 34, '0', '1'),
(8, 'NMS-3A-001', 'Phenolic 3A', 'A03', 129, '0', '1'),
(9, 'NMS-3B-001', 'Phenolic 3B', 'B07', 87, '0', '1'),
(10, 'Z19-904-002', 'Epoxy', 'A09', 68, '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mmaterial`
--
ALTER TABLE `mmaterial`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mmaterial`
--
ALTER TABLE `mmaterial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
