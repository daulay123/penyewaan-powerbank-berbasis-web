-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Feb 2024 pada 11.36
-- Versi Server: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penyewaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `tlp`, `nama_anggota`, `tempat_lahir`, `tgl_lahir`, `jk`) VALUES
(1, '089637395578', 'Alief Juan', 'Bogor', '2001-04-20', 'L'),
(2, '0895333935778', 'Tonang', 'Bogor', '2001-12-09', 'L');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_powerbank`
--

CREATE TABLE `tb_powerbank` (
  `id_barang` int(11) NOT NULL,
  `foto` varchar(500) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah_stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_powerbank`
--

INSERT INTO `tb_powerbank` (`id_barang`, `foto`, `nama`, `harga`, `jumlah_stok`) VALUES
(1, '25662_robot.jpg', 'Robot', '12000', 5),
(2, '23714_download.jpg', 'Samsung', '20000', 1),
(3, '28082_acmic.jpg', 'ACMIC', '20000', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tlp_transaksi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_barang`, `tlp_transaksi`, `id_anggota`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 1, 0, 0, '22-01-2024', '29-01-2024', 'pinjam'),
(2, 1, 1, 1, '22-01-2024', '29-01-2024', 'kembali'),
(3, 2, 2, 2, '22-01-2024', '29-01-2024', 'kembali'),
(4, 1, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(5, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(6, 2, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(7, 2, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(8, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(9, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(10, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(11, 1, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(12, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(13, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(14, 2, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(15, 2, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(16, 1, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(17, 1, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(18, 3, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(19, 3, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(20, 3, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(21, 3, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(22, 2, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(23, 2, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(24, 1, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(25, 1, 2, 2, '09-02-2024', '16-02-2024', 'kembali'),
(26, 1, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(27, 1, 1, 1, '09-02-2024', '16-02-2024', 'kembali'),
(28, 3, 1, 1, '09-02-2024', '16-02-2024', 'kembali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'admin', '$2y$10$SrxqMcEreBfoLB3g9sj5MudDgT9Ifefck5bWql5uMPo6O.kGGM5a6', 'Administrator', '65aea3cc84c21.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tb_powerbank`
--
ALTER TABLE `tb_powerbank`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_powerbank`
--
ALTER TABLE `tb_powerbank`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
