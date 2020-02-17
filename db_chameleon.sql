-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Feb 2020 pada 13.33
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chameleon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(36) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `role` enum('1','0') NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`, `no_hp`, `alamat`, `role`, `status`, `created_at`, `updated_at`) VALUES
('02a4e573-4251-11ea-be05-646e69921e02', 'Zaenur', 'zaenur.rochman98@gmail.com', '$2a$08$bEPdM62lbsaHTay.WvvZFOLvUVcwM/G8TFfH6fP3qMacurWx2gHCi', '081578988248', '<p>loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet loren ipsum dolor sit amet <br></p>', '1', 1, '2020-01-29 05:37:00', '2020-02-14 04:43:43'),
('93f1d773-44cc-11ea-865b-646e69921e02', 'Rochman', 'zaenur.rochaman98@outlook.com', '$2a$08$AXEZ09qa9t9w5m6SAYoVSeSrC9MGeQyIyZcV4.pSRPKdMkEoJDv6O', '', '', '0', 0, '2020-02-01 09:26:43', '2020-02-01 09:28:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_pengguna`
--

CREATE TABLE `alamat_pengguna` (
  `id_alamat` varchar(36) NOT NULL,
  `id_pengguna` varchar(36) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat_1` text NOT NULL,
  `alamat_2` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kabupaten_id` int(11) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat_pengguna`
--

INSERT INTO `alamat_pengguna` (`id_alamat`, `id_pengguna`, `nama_lengkap`, `alamat_1`, `alamat_2`, `no_telp`, `provinsi_id`, `provinsi`, `kabupaten_id`, `kabupaten`, `kota`, `kode_pos`) VALUES
('15941fdb-5134-11ea-8760-646e69921e02', 'd43f81f5-4f47-11ea-97e7-646e69921e02', 'Zaenurrochman', 'Jl. Pramuka RT 07/ RW 02', 'Desa Kalisari, Kecamatan Cilongok', '0895606494448', 10, 'Jawa Tengah', 41, 'Banyumas', 'Purwokerto', '53162'),
('41741929-4b46-11ea-b70a-646e69921e02', 'f4d9ee60-4b45-11ea-b70a-646e69921e02', 'Zaenur Rochman', 'Jln Pramuka', 'Kalisari RT 07 / RW 02', '081578988248', 10, 'Jawa Tengah', 41, 'Banyumas', 'Purwokerto', '53162');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_item`
--

CREATE TABLE `cart_item` (
  `id_cart` varchar(36) NOT NULL,
  `id_pengguna` varchar(36) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart_item`
--

INSERT INTO `cart_item` (`id_cart`, `id_pengguna`, `created_at`, `updated_at`) VALUES
('Invoice-202002171726-001', 'd43f81f5-4f47-11ea-97e7-646e69921e02', '2020-02-17 17:26:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_cart_item`
--

CREATE TABLE `detail_cart_item` (
  `id_detail_item_cart` varchar(36) NOT NULL,
  `id_cart` varchar(36) NOT NULL,
  `id_produk` varchar(36) NOT NULL,
  `quantity` int(3) NOT NULL,
  `size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_cart_item`
--

INSERT INTO `detail_cart_item` (`id_detail_item_cart`, `id_cart`, `id_produk`, `quantity`, `size`) VALUES
('30f9892c-5179-11ea-b905-646e69921e02', 'Invoice-202002171726-001', 'aacc3967-4d1a-11ea-b59a-646e69921e02', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` varchar(36) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `id_produk` varchar(36) NOT NULL,
  `jumlah_produk` int(3) NOT NULL,
  `total` float NOT NULL,
  `discount` float NOT NULL,
  `ukuran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `kode_transaksi`, `id_produk`, `jumlah_produk`, `total`, `discount`, `ukuran`) VALUES
('12457352-4b46-11ea-b70a-646e69921e02', 'TK-2609022020000-001', '9a6d55e7-4d10-11ea-b59a-646e69921e02', 2, 9999, 0, ''),
('12457352-4b46-11ea-b70a-646e69921e02', 'TK-2609022020000-001', '6779dcbf-4d1f-11ea-b59a-646e69921e02', 3, 99999, 0, ''),
('d61f7e7e-5159-11ea-8760-646e69921e02', 'TK-26202002171448-004', '6779dcbf-4d1f-11ea-b59a-646e69921e02', 2, 2426240, 0, 'M'),
('d61f7e7e-5159-11ea-8760-646e69921e02', 'TK-26202002171448-004', 'aacc3967-4d1a-11ea-b59a-646e69921e02', 1, 19983, 0, 'L'),
('9a510d53-5181-11ea-b905-646e69921e02', 'TK-26202002171932-005', 'aacc3967-4d1a-11ea-b59a-646e69921e02', 1, 19983, 0, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(36) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `deskripsi_kategori` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `created_at`, `updated_at`) VALUES
('5ec5076b-44d4-11ea-865b-646e69921e02', 'testing', 'asdadasdadasdasdasdas', '2020-02-01 10:28:32', '0000-00-00 00:00:00'),
('8b3ccf1b-4e51-11ea-ae24-646e69921e02', 'tahu', '', '2020-02-13 12:11:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(36) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `email`, `password`, `token`, `status`, `created_at`, `updated_at`) VALUES
('8a98927e-4f46-11ea-97e7-646e69921e02', 'zaenurrochman', 'zaenur.rochman98@outlook.com', '$2a$08$kMgj2ltMxo037wmgyDxWUO/Xoy.ly0TL7qz2tMphvLgMgRcgRMK3S', 'emFlbnVyLnJvY2htYW45OEBvdXRsb29rLmNvbQ==', 0, '2020-02-14 17:24:57', '0000-00-00 00:00:00'),
('d43f81f5-4f47-11ea-97e7-646e69921e02', 'zaenurrochman', 'zaenur.rochman98@gmail.com', '$2a$08$dyL4/LEdHllRXSgUYu2HMuzukeIOYxqqHEB1MX09dNSYIvoGQMXwy', 'emFlbnVyLnJvY2htYW45OEBnbWFpbC5jb20=', 1, '2020-02-14 17:34:11', '2020-02-17 11:20:04'),
('f4d9ee60-4b45-11ea-b70a-646e69921e02', 'zaenur', 'zaenur.rochman@outlook.com', 'user1234', '', 1, '2020-02-09 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(36) NOT NULL,
  `kode_produk` varchar(30) NOT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(3) NOT NULL,
  `harga_produk` float NOT NULL,
  `id_kategori` varchar(36) NOT NULL,
  `warna_produk` varchar(30) NOT NULL,
  `size_produk` varchar(10) NOT NULL,
  `thumbnail_produk` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `deskripsi_produk`, `stok_produk`, `harga_produk`, `id_kategori`, `warna_produk`, `size_produk`, `thumbnail_produk`, `created_at`, `updated_at`) VALUES
('6779dcbf-4d1f-11ea-b59a-646e69921e02', 'CC-6-202002120538-005', 'Celana', '<p>lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet <br></p>', 12, 1213120, '5ec5076b-44d4-11ea-865b-646e69921e02', '', 'L,XL,M', 'CC-6-202002120538-005_3.PNG,CC-6-202002120538-005_1.png,CC-6-202002120538-005_2.png,CC-6-202002120537-005_0.png', '2020-02-11 23:39:46', '2020-02-12 15:14:55'),
('9a6d55e7-4d10-11ea-b59a-646e69921e02', 'CC-4-202002120349-003', 'Baju', '<p>lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet <br></p>', 20, 1000000, '5ec5076b-44d4-11ea-865b-646e69921e02', '', 'L,XL,M', 'CC-4-202002120349-003_2.jpg,CC-4-202002120349-003_0.png,CC-4-202002120349-003_1.png', '2020-02-11 21:53:49', '2020-02-12 15:12:52'),
('aacc3967-4d1a-11ea-b59a-646e69921e02', 'CC-6-202002120505-004', 'Celana bukan celana', '<p>lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet </p>', 10, 19983, '5ec5076b-44d4-11ea-865b-646e69921e02', '', 'L,XL,M', 'CC-6-202002120505-004_3.png,CC-4-202002120349-003_2.jpg,CC-4-202002120349-003_0.png,CC-4-202002120349-003_1.png', '2020-02-11 23:05:51', '2020-02-12 15:13:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_toko`
--

CREATE TABLE `profile_toko` (
  `id_toko` varchar(36) NOT NULL,
  `nama_toko` varchar(30) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(36) NOT NULL,
  `kode_transaksi` varchar(30) NOT NULL,
  `id_pengguna` varchar(36) NOT NULL,
  `id_alamat` varchar(36) NOT NULL,
  `waktu_transaksi` datetime NOT NULL,
  `waktu_expired` datetime NOT NULL,
  `total_harga` float NOT NULL,
  `total_ongkir` float NOT NULL,
  `status_transaksi` varchar(20) NOT NULL,
  `bukti_transfer` varchar(40) NOT NULL,
  `no_resi` varchar(20) NOT NULL,
  `kurir` varchar(15) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_pengguna`, `id_alamat`, `waktu_transaksi`, `waktu_expired`, `total_harga`, `total_ongkir`, `status_transaksi`, `bukti_transfer`, `no_resi`, `kurir`, `catatan`) VALUES
('12457352-4b46-11ea-b70a-646e69921e02', 'TK-2609022020000-001', 'f4d9ee60-4b45-11ea-b70a-646e69921e02', '41741929-4b46-11ea-b70a-646e69921e02', '2020-02-09 00:00:00', '2020-02-10 00:00:00', 300000, 10000, 'kirim', '', '120040042107018', '', ''),
('9a510d53-5181-11ea-b905-646e69921e02', 'TK-26202002171932-005', 'd43f81f5-4f47-11ea-97e7-646e69921e02', '15941fdb-5134-11ea-8760-646e69921e02', '2020-02-17 19:32:46', '0000-00-00 00:00:00', 29983, 10000, 'pending', '', '', 'tiki', 'lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet '),
('a560b4ba-4ef3-11ea-9ddc-646e69921e02', 'TK-2609022020000-002', 'f4d9ee60-4b45-11ea-b70a-646e69921e02', '41741929-4b46-11ea-b70a-646e69921e02', '2020-02-14 00:00:00', '2020-02-15 00:00:00', 300000, 10000, 'pending', '', '', '', ''),
('ca33db29-4ef3-11ea-9ddc-646e69921e02', 'TK-2609022020000-003', 'f4d9ee60-4b45-11ea-b70a-646e69921e02', '41741929-4b46-11ea-b70a-646e69921e02', '2020-02-14 00:00:00', '2020-02-15 00:00:00', 300000, 10000, 'kirim', 'TK-2609022020000-003.jpg', '123456789', '', ''),
('d61f7e7e-5159-11ea-8760-646e69921e02', 'TK-26202002171448-004', 'd43f81f5-4f47-11ea-97e7-646e69921e02', '15941fdb-5134-11ea-8760-646e69921e02', '2020-02-17 14:48:07', '0000-00-00 00:00:00', 0, 0, 'pending', '', '', 'jne', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD PRIMARY KEY (`id_alamat`),
  ADD KEY `fk_alamat_pengguna` (`id_pengguna`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_cart_pengguna` (`id_pengguna`);

--
-- Indexes for table `detail_cart_item`
--
ALTER TABLE `detail_cart_item`
  ADD PRIMARY KEY (`id_detail_item_cart`),
  ADD KEY `fk_detail_cart` (`id_cart`),
  ADD KEY `fk_produk_detail_cart` (`id_produk`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `fk_detail_transaksi` (`id_transaksi`),
  ADD KEY `fk_kode_transaksi` (`kode_transaksi`),
  ADD KEY `fk_detail_produk_transaksi` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `fk_produk_kategori` (`id_kategori`);

--
-- Indexes for table `profile_toko`
--
ALTER TABLE `profile_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `fk_transaksi_pengguna` (`id_pengguna`),
  ADD KEY `fk_alamat` (`id_alamat`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_pengguna`
--
ALTER TABLE `alamat_pengguna`
  ADD CONSTRAINT `fk_alamat_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `fk_cart_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Ketidakleluasaan untuk tabel `detail_cart_item`
--
ALTER TABLE `detail_cart_item`
  ADD CONSTRAINT `fk_detail_cart` FOREIGN KEY (`id_cart`) REFERENCES `cart_item` (`id_cart`),
  ADD CONSTRAINT `fk_produk_detail_cart` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_detail_produk_transaksi` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `fk_detail_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `fk_kode_transaksi` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi` (`kode_transaksi`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_alamat` FOREIGN KEY (`id_alamat`) REFERENCES `alamat_pengguna` (`id_alamat`),
  ADD CONSTRAINT `fk_transaksi_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
