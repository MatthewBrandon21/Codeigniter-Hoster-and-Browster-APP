-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jun 2021 pada 20.38
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
-- Database: `hoster`
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
(1, 'admin@hoster.id', 'administrator', 'Admin Hoster', 'aded00f5b22fbb0a8d7b81f1f4bfdcdc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `booking_user` int(11) NOT NULL,
  `booking_hotel` int(11) NOT NULL,
  `booking_tgltransaksi` date NOT NULL,
  `booking_tglcheckin` date NOT NULL,
  `booking_tglcheckout` date NOT NULL,
  `booking_nama` varchar(255) NOT NULL,
  `booking_hp` varchar(255) NOT NULL,
  `booking_email` varchar(255) NOT NULL,
  `booking_jmlkamar` int(11) NOT NULL,
  `booking_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_user`, `booking_hotel`, `booking_tgltransaksi`, `booking_tglcheckin`, `booking_tglcheckout`, `booking_nama`, `booking_hp`, `booking_email`, `booking_jmlkamar`, `booking_harga`) VALUES
(1, 1, 1, '2021-06-02', '2021-06-03', '2021-06-04', 'Bambang Skubidu', '081316684953', 'bambangskubidu@gmail.com', 1, 300000),
(2, 1, 1, '2021-06-09', '2021-06-10', '2021-06-11', 'seseorang', '0816544912', 'seseorang@gmail.com', 2, 300000),
(4, 1, 1, '2021-06-09', '2021-06-10', '2021-06-12', 'frengky', '08165462548', 'frengky_william21@unlidrive.com', 5, 3000000),
(5, 2, 1, '2021-06-10', '2021-06-11', '2021-06-12', 'Kunto Aji', '081316558495', 'kunto@gmail.com', 1, 300000),
(6, 2, 1, '2021-06-10', '2021-06-16', '2021-06-17', 'Ron Nutela', '081245223', 'ron@gmail.com', 2, 600000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_nama` varchar(255) NOT NULL,
  `hotel_bintang` int(11) NOT NULL,
  `hotel_harga` int(11) NOT NULL,
  `hotel_kota` varchar(255) NOT NULL,
  `hotel_lokasi` varchar(255) NOT NULL,
  `hotel_kamar` int(11) NOT NULL,
  `hotel_deskripsi` varchar(255) NOT NULL,
  `hotel_foto` varchar(255) NOT NULL DEFAULT 'default_hotel.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_nama`, `hotel_bintang`, `hotel_harga`, `hotel_kota`, `hotel_lokasi`, `hotel_kamar`, `hotel_deskripsi`, `hotel_foto`) VALUES
(1, 'Novotel Simpang Lima Semarang', 4, 300000, 'Semarang', 'Jl. Simpang Lima no 69', 91, 'Hotel bintang 4 dengan fasilitas lengkap dan harga yang fantastis', '1-novotel-smg-building.jpeg'),
(2, 'Ibis Sudirman jakarta', 5, 750000, 'Jakarta', 'Sudirman no 45', 45, 'Hotel tengah kota yang mewah dan fasilitas super lengkap', '1867_ho_00_p_1024x768.jpg');

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
  `user_tgllahir` date NOT NULL,
  `user_hp` varchar(255) NOT NULL,
  `user_foto` varchar(255) NOT NULL DEFAULT 'default_user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_username`, `user_nama`, `user_password`, `user_tgllahir`, `user_hp`, `user_foto`) VALUES
(1, 'brandondani33@gmail.com', 'brandondani33', 'Matthew Brandon Dani', 'd41d8cd98f00b204e9800998ecf8427e', '2001-04-21', '081316684935', 'Gelora_Muda_Colorgraded_21.jpg'),
(2, 'wiska@gmail.com', 'kucinggila', 'Wiska', 'ee54742a64ac6be74c68382ddca6d929', '2017-05-23', '081316694824', 'download_(3).jpg'),
(3, 'budiman@gmail.com', 'frengky91', 'Frengky Budiman', '503c5db6c93f713810afd447b0d1be91', '2001-05-23', '081354564', 'default_user.png'),
(4, 'herkules@gmail.com', 'lilpump', 'Budi Herkules', '202cb962ac59075b964b07152d234b70', '2004-01-21', '08421452142', 'default_user.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_user` (`booking_user`),
  ADD KEY `booking_hotel` (`booking_hotel`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

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
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`booking_user`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`booking_hotel`) REFERENCES `hotel` (`hotel_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
