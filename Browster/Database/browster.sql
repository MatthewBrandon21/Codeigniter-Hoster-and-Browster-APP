-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2021 pada 01.22
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `browster`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_nama` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_username`, `admin_nama`, `admin_password`) VALUES
(1, 'admin@browster.id', 'Administrator', 'Admin Browster', 'aded00f5b22fbb0a8d7b81f1f4bfdcdc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_jumlah` int(11) NOT NULL,
  `barang_harga` int(11) NOT NULL,
  `barang_kategori` varchar(255) NOT NULL,
  `barang_deskripsi` varchar(255) NOT NULL,
  `barang_foto` varchar(255) NOT NULL DEFAULT 'default_hotel.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_jumlah`, `barang_harga`, `barang_kategori`, `barang_deskripsi`, `barang_foto`) VALUES
(1, 'XBOX 360', 3, 100000, 'Console', 'Console Xbox 360 kinect full game, siap pakai.', '1200px-Xbox_360_S.png'),
(2, 'Sony Playstation 4', 8, 150000, 'Console', 'PS4 siap pakai dengan 2 stick dan 3 kaset game (bisa pilih game)', 'sony_sony-ps4-slim_full02.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `pinjam_id` int(11) NOT NULL,
  `pinjam_user` int(11) NOT NULL,
  `pinjam_barang` int(11) NOT NULL,
  `pinjam_status` varchar(255) NOT NULL DEFAULT 'Sedang Dikirim',
  `pinjam_tempat` int(11) NOT NULL,
  `pinjam_harga` int(11) NOT NULL,
  `pinjam_tgltransaksi` date NOT NULL,
  `pinjam_hari` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`pinjam_id`, `pinjam_user`, `pinjam_barang`, `pinjam_status`, `pinjam_tempat`, `pinjam_harga`, `pinjam_tgltransaksi`, `pinjam_hari`) VALUES
(1, 1, 1, 'Sudah Dikirim', 1, 100000, '2021-06-11', 1),
(5, 2, 2, 'Siap Di Pickup', 0, 300000, '2021-06-10', 2),
(7, 2, 1, 'Sedang Dikirim', 0, 200000, '2021-06-11', 2),
(8, 2, 1, 'Sedang Dikirim', 0, 800000, '2021-06-11', 8),
(9, 2, 2, 'Sedang Dikirim', 0, 300000, '2021-06-11', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_nama` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_alamat` varchar(255) NOT NULL,
  `user_hp` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL DEFAULT 'default_user.png	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_username`, `user_nama`, `user_password`, `user_alamat`, `user_hp`, `user_foto`) VALUES
(1, 'frengky@gmail.com', 'frengkynutela', 'Frengky Nutela', 'ee54742a64ac6be74c68382ddca6d929', 'Barleria B1 G33, tangerang', '0814646464', 'download_(3)1.jpg'),
(2, 'ron@gmail.com', 'ronganteng', 'Ron Yoi Yoa', '4955b51d5e65c8e7b4997e2f70007cdf', 'medang no 41, tangerang', '081232421', 'default_user.png	'),
(3, 'taurus@gmail.com', 'taurus21', 'taurus guy', '18384d55bba949dac29c22a1f9acab60', 'karanganyar 67', '081224214', 'default_user.png	');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`pinjam_id`),
  ADD KEY `pinjam_barang` (`pinjam_barang`),
  ADD KEY `pinjam_user` (`pinjam_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD CONSTRAINT `pinjam_ibfk_1` FOREIGN KEY (`pinjam_barang`) REFERENCES `barang` (`barang_id`),
  ADD CONSTRAINT `pinjam_ibfk_2` FOREIGN KEY (`pinjam_user`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
