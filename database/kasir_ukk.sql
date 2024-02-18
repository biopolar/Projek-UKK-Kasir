-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Feb 2024 pada 08.57
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir_ukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailpenjualan`
--

CREATE TABLE `detailpenjualan` (
  `DetailID` int(11) NOT NULL,
  `PenjualanID` int(11) NOT NULL,
  `ProdukID` int(11) NOT NULL,
  `JumlahProduk` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detailpenjualan`
--

INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES
(23, 1, 100, 8, '50000.00'),
(24, 2, 99, 10, '150000.00'),
(25, 3, 99, 10, '150000.00'),
(26, 4, 99, 10, '150000.00'),
(27, 5, 100, 10, '50000.00'),
(28, 6, 100, 10, '50000.00'),
(29, 7, 98, 5, '1250000.00'),
(31, 8, 103, 10, '80000000.00'),
(32, 9, 98, 10, '1250000.00'),
(33, 10, 103, 0, '80000000.00'),
(35, 11, 103, 10, '80000000.00'),
(35, 12, 102, 5, '1800000.00'),
(36, 13, 98, 20, '1250000.00'),
(36, 14, 99, 20, '150000.00'),
(36, 15, 100, 20, '50000.00'),
(36, 16, 0, 0, '0.00'),
(37, 17, 98, 20, '1250000.00'),
(38, 18, 98, 960, '1250000.00'),
(39, 19, 102, 46, '1800000.00'),
(40, 20, 102, 46, '1800000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `PelangganID` int(11) NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `nomor_meja` int(11) NOT NULL,
  `NomorTelepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`PelangganID`, `NamaPelanggan`, `nomor_meja`, `NomorTelepon`) VALUES
(23, 'Cancut', 1, ''),
(24, 'Anjur', 23, ''),
(25, 'Anjur', 23, ''),
(26, 'Anjur', 23, ''),
(27, 'Junet', 4, ''),
(28, 'Junet', 4, ''),
(29, 'Ucok', 6, ''),
(30, 'Beduy', 666, ''),
(31, 'Beduy', 666, ''),
(32, 'Beduy', 666, ''),
(33, 'Beduy', 666, ''),
(35, 'Beduy', 666, ''),
(36, 'Anjay', 999, ''),
(37, 'Anjay', 999, ''),
(38, 'Aji', 12, ''),
(39, 'Babon', 91, ''),
(40, 'Babon', 91, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `PenjualanID` int(11) NOT NULL,
  `TanggalPenjualan` date NOT NULL,
  `TotalHarga` decimal(10,2) NOT NULL,
  `PelangganID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`PenjualanID`, `TanggalPenjualan`, `TotalHarga`, `PelangganID`) VALUES
(23, '2024-02-13', '0.00', 0),
(24, '2024-02-13', '0.00', 0),
(25, '2024-02-13', '0.00', 0),
(26, '2024-02-13', '0.00', 0),
(27, '2024-02-13', '0.00', 0),
(28, '2024-02-15', '0.00', 0),
(29, '2024-02-15', '0.00', 0),
(30, '2024-02-15', '0.00', 0),
(31, '2024-02-15', '0.00', 0),
(32, '2024-02-15', '0.00', 0),
(33, '2024-02-15', '0.00', 0),
(34, '2024-02-15', '0.00', 0),
(35, '2024-02-15', '0.00', 0),
(36, '2024-02-15', '0.00', 0),
(37, '2024-02-15', '0.00', 0),
(38, '2024-02-15', '0.00', 0),
(39, '2024-02-15', '0.00', 0),
(40, '2024-02-15', '0.00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProdukID` int(11) NOT NULL,
  `NamaProduk` varchar(255) NOT NULL,
  `Harga` decimal(10,2) NOT NULL,
  `Stok` int(11) NOT NULL,
  `Terjual` int(11) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProdukID`, `NamaProduk`, `Harga`, `Stok`, `Terjual`, `Foto`) VALUES
(98, 'Tongseng buntut lucifer', '1250000.00', -1, 1085, '12022024053837.jpeg'),
(99, 'Es teh anget', '150000.00', 979, 450, '12022024053959.jpeg'),
(100, 'Croissant', '50000.00', 979, 133, '12022024055126.jpeg'),
(104, 'Eskrim Gelato Cup cone', '56000.00', 120, 0, '15022024081139.jpeg'),
(105, 'Mie ayam ( tapi gak pake ayam )', '15000.00', 999, 0, '15022024081225.jpeg'),
(106, 'Bakso daging paus', '460000.00', 131, 0, '15022024082025.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `NamaUser` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Level` enum('Administrator','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserID`, `NamaUser`, `Password`, `Level`) VALUES
(1, 'Cihuy', '60a5671642df4b3ea92a529e2c1e9979', 'Administrator'),
(2, 'Ucok', '202cb962ac59075b964b07152d234b70', 'Petugas'),
(3, 'Cicak', 'd205d85eaa525599e6e1c9cf5ebfb5b4', 'Petugas'),
(4, 'Abc', '645c5ac9f8f64f7d2a301bd1aaf4d57b', 'Administrator'),
(5, 'dinda', '202cb962ac59075b964b07152d234b70', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `DetailID` (`DetailID`,`PenjualanID`,`ProdukID`),
  ADD KEY `ProdukID` (`ProdukID`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`PelangganID`),
  ADD KEY `PelangganID` (`PelangganID`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`PenjualanID`),
  ADD KEY `PenjualanID` (`PenjualanID`,`PelangganID`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProdukID`),
  ADD KEY `ProdukID` (`ProdukID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detailpenjualan`
--
ALTER TABLE `detailpenjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `PelangganID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `PenjualanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `ProdukID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
