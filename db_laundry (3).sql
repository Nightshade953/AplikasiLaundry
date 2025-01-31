-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jan 2025 pada 03.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `kd_jenis` int(11) NOT NULL,
  `jenis_laundry` varchar(100) NOT NULL,
  `lama_proses` int(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_laundry`, `lama_proses`, `tarif`) VALUES
(1, 'Laundry + Seterika', 3, 7000),
(2, 'Fast Laundry', 1, 10000),
(12, 'Regular', 2, 6000),
(13, 'Cuci Karpet', 3, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `ket_laporan` int(1) NOT NULL,
  `catatan` text NOT NULL,
  `id_laundry` char(10) DEFAULT NULL,
  `pemasukan` int(11) NOT NULL,
  `id_pengeluaran` char(10) DEFAULT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `tgl_laporan`, `ket_laporan`, `catatan`, `id_laundry`, `pemasukan`, `id_pengeluaran`, `pengeluaran`) VALUES
(18, '2022-01-09', 2, 'Beli deterjen', NULL, 0, 'PG-0001', 100000),
(27, '2022-01-11', 2, 'service mesin cuci', NULL, 0, 'PG-0003', 200000),
(28, '2022-01-09', 1, '5 baju, 5 celana levis', 'LD-0001', 70000, NULL, 0),
(29, '2022-01-09', 1, '10 kemeja, 2 celana training', 'LD-0002', 100000, NULL, 0),
(30, '2022-01-09', 1, 'Karpet 20kg', 'LD-0003', 200000, NULL, 0),
(31, '2022-01-09', 1, '2 celana, 3 baju, 2 kaus', 'LD-0005', 35000, NULL, 0),
(32, '2022-01-10', 2, 'Membeli pemutih pakaian', NULL, 0, 'PG-0004', 50000),
(33, '2022-01-09', 1, '14 kaus', 'LD-0004', 54000, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laundry`
--

CREATE TABLE `tb_laundry` (
  `id_laundry` char(10) NOT NULL,
  `pelangganid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `kd_jenis` char(6) NOT NULL,
  `tgl_terima` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jml_kilo` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `status_pengambilan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `pelangganid`, `userid`, `kd_jenis`, `tgl_terima`, `tgl_selesai`, `jml_kilo`, `catatan`, `totalbayar`, `status_pembayaran`, `status_pengambilan`) VALUES
('LD-0001', 5, 27, '1', '2022-01-09', '2022-01-12', 10, '5 baju, 5 celana levis', 70000, 1, 1),
('LD-0002', 3, 27, '2', '2022-01-09', '2022-01-10', 10, '10 kemeja, 2 celana training', 100000, 1, 0),
('LD-0003', 5, 27, '13', '2022-01-09', '2022-01-12', 20, 'Karpet 20kg', 200000, 1, 0),
('LD-0004', 9, 27, '12', '2022-01-09', '2022-01-11', 9, '14 kaus', 54000, 1, 0),
('LD-0005', 9, 27, '1', '2022-01-09', '2022-01-12', 5, '2 celana, 3 baju, 2 kaus', 35000, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `pelangganid` int(11) NOT NULL,
  `pelanggannama` varchar(150) NOT NULL,
  `pelangganjk` varchar(15) NOT NULL,
  `pelangganalamat` text NOT NULL,
  `pelanggantelp` varchar(20) NOT NULL,
  `pelangganfoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`pelangganid`, `pelanggannama`, `pelangganjk`, `pelangganalamat`, `pelanggantelp`, `pelangganfoto`) VALUES
(3, 'Mang mamang', 'Laki - laki', 'Olimpuck', '085233444541', '61da618d4343f.png'),
(5, 'Fandi Aziz Pratama', 'Laki - laki', 'bandar', '0895392518654', '61d9335273e98.png'),
(9, 'Rendi', 'Laki - laki', 'Solo', '086532187609', '61da61ef62df1.jpg'),
(10, 'Toni', 'Laki - laki', 'Jogja', '0987654332', '61dac09d9118d.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengeluaran`
--

CREATE TABLE `tb_pengeluaran` (
  `id_pengeluaran` char(10) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `catatan` text NOT NULL,
  `pengeluaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pengeluaran`
--

INSERT INTO `tb_pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `catatan`, `pengeluaran`) VALUES
('PG-0001', '2022-01-09', 'Beli deterjen', 100000),
('PG-0003', '2022-01-11', 'service mesin cuci', 200000),
('PG-0004', '2022-01-10', 'Membeli pemutih pakaian', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_riwayat`
--

CREATE TABLE `tb_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Menunggu Konfirmasi',
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `phone`, `verification_code`, `email_verified`, `created_at`) VALUES
(1, 'adamBrokol', 'akewberjayaselama22@gmail.com', '$2y$10$xraf4hm6.syvMvqQNGtCkerQxJx.OVvn0ROVh.mEVGXxg/2SDiiUK', '895345345', '', 1, '2025-01-20 06:34:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `userpass` varchar(100) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `usertelp` varchar(20) NOT NULL,
  `userfoto` varchar(50) DEFAULT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`userid`, `username`, `userpass`, `nama`, `jk`, `alamat`, `usertelp`, `userfoto`, `level`) VALUES
(27, 'ahmad', '$2y$10$v3LbgR4oH3/4Q7g49mM1YudaMckKsSdf1gjZlNx..7Q3VLshHhECm', 'ahmad', 'Laki - laki', 'New Giniea', '08953925199', '61da60dc3ce8b.jpg', 'admin'),
(28, 'fandiaz', '$2y$10$4sr89AaocI6DvBEF0jBfdeF3Q8/EY1/gwmLrodrSz1XUth.uJs3La', 'Fandi Aziz', 'Laki - laki', 'Bandardawung', '0895392518509', '61d844f1efc33.jpg', 'kasir'),
(31, 'Yuli', '$2y$10$R.KSk67SfxEwOm4B.nH9uegiyVyZmROF7/MSHYiuQ.9AmuZ3NU.aq', 'Yulianto', 'Laki - laki', 'Solo', '089654321', '61dad24785895.jpg', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`pelangganid`);

--
-- Indeks untuk tabel `tb_pengeluaran`
--
ALTER TABLE `tb_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `kd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `pelangganid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_riwayat`
--
ALTER TABLE `tb_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
