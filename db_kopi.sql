-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 04:03 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `kode_bahan` varchar(5) NOT NULL,
  `nama_bahan` varchar(35) NOT NULL,
  `minimum` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `kode_supplier` varchar(15) NOT NULL,
  `berat` int(11) NOT NULL,
  `satuan_berat` varchar(15) NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `nama_bahan`, `minimum`, `stok`, `satuan`, `kode_supplier`, `berat`, `satuan_berat`, `updated_at`, `created_at`) VALUES
('2', 'Kopi Aceh', 10, 4, 'Bungkus', 'SP-01', 500, 'Gram', '2023-01-13 04:45:07', '2023-01-13 04:45:07'),
('3', 'Paper filter', 10, 4, 'Pcs', 'SP-02', 1, 'Pcs', '2023-01-13 04:45:07', '2023-01-13 04:45:07'),
('4', 'Beans', 5, 4, 'Bungkus', 'SP-02', 100, 'Gram', '2023-01-13 04:45:07', '2023-01-13 04:45:07'),
('5', 'Bean Gayo wine', 3, 10, 'Gram', 'SP-03', 100, 'Kg', '2023-01-13 04:45:07', '2023-01-13 04:45:07'),
('BB099', 'Kopi Kalang', 3, 10, 'Gram', 'SP-03', 100, 'Kg', '2023-01-13 20:09:38', '2023-01-13 19:48:56'),
('BB100', 'Godong Kates', 3, 10, 'Gram', 'SP-03', 100, 'Kg', '2023-01-13 20:09:07', '2023-01-13 20:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(15) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `tanggal`, `jam`, `nama_user`, `debit`, `kredit`, `keterangan`, `updated_at`, `created_at`) VALUES
(4, '2018-06-10', '11:00', 'Defra', 0, 150000, 'Belanja Bahan Cafe', '2023-01-13 04:46:22', '2023-01-13 04:46:22'),
(3, '2018-06-10', '13:50', 'Nata', 215000, 0, 'Pendapatan Cafe', '2023-01-13 04:46:22', '2023-01-13 04:46:22'),
(5, '2018-06-10', ' 11:00', ' Ardan', 0, 150000, ' Belanja Bahan Cafe', '2023-01-13 04:46:22', '2023-01-13 04:46:22'),
(99, '2018-06-10', '11:00', 'Defra', 0, 150000, 'Belanja Bahan Cafe', '2023-01-13 04:46:39', '2023-01-13 04:46:39');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `kode_menu` varchar(5) NOT NULL,
  `kategori` varchar(15) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`kode_menu`, `kategori`, `nama_menu`, `harga`, `stok`, `updated_at`, `created_at`) VALUES
('KM001', 'Kudapan', 'French fries', 25000, -1, '2023-01-13 04:49:42', '2023-01-13 04:49:42'),
('KM002', 'Kudapan', 'Chicken nugget', 20000, 0, '2023-01-13 04:49:42', '2023-01-13 04:49:42'),
('KM003', 'Kopi', 'Kopi Single origin', 40000, -3, '2023-01-13 04:49:42', '2023-01-13 04:49:42'),
('KM004', 'Kopi', 'Kopi Gayo Wine', 20000, 0, '2023-01-13 04:49:42', '2023-01-13 04:49:42'),
('KM005', 'Kudapan', 'Onion Rings', 20000, -3, '2023-01-13 04:49:42', '2023-01-13 04:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `menu_bahan`
--

CREATE TABLE `menu_bahan` (
  `kode_menu` varchar(5) NOT NULL,
  `kode_bahan` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_bahan`
--

INSERT INTO `menu_bahan` (`kode_menu`, `kode_bahan`, `jumlah`, `updated_at`, `created_at`) VALUES
('KM003', 'BB004', 15, '2023-01-13 04:50:30', '2023-01-13 04:50:30'),
('KM003', 'BB003', 1, '2023-01-13 04:50:30', '2023-01-13 04:50:30'),
('KM004', 'BB005', 15, '2023-01-13 04:50:30', '2023-01-13 04:50:30'),
('KM001', 'BB003', 10, '2023-01-13 04:50:30', '2023-01-13 04:50:30'),
('KM099', 'BB004', 15, '2023-01-13 07:50:36', '2023-01-13 07:50:36');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `kode_pembelian` varchar(25) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `kode_supplier` varchar(15) NOT NULL,
  `total` int(11) NOT NULL,
  `status_beli` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`kode_pembelian`, `tanggal_pembelian`, `kode_supplier`, `total`, `status_beli`, `updated_at`, `created_at`) VALUES
('PO.10062018001', '2018-06-10', 'SP-02', 5000, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.11062018002', '2018-06-11', 'SP-02', 0, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.11062018003', '2018-06-11', 'SP-01', 0, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.11062018004', '2018-06-11', 'SP-03', 0, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.11062018005', '2018-06-11', 'SP-01', 625000, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.12062018006', '2018-06-12', 'SP-02', 0, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.12062018007', '2018-06-12', 'SP-01', 100000, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.12062018008', '2018-06-12', 'SP-01', 0, 'Validasi', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.12062018009', '2018-06-12', 'SP-01', 0, 'Validasi', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.10062018010', '2019-06-10', 'SP-01', 10000, 'Pembelian Selesai', '2023-01-13 04:51:53', '2023-01-13 04:51:53'),
('PO.10062018099', '2018-06-10', 'SP-02', 5000, 'Pembelian Selesai', '2023-01-13 07:54:47', '2023-01-13 07:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `kode_pembelian` varchar(35) NOT NULL,
  `kode_bahan` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`kode_pembelian`, `kode_bahan`, `jumlah`, `subtotal`, `updated_at`, `created_at`) VALUES
('PO.10062018001', 'BB003', 5, 5000, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.11062018002', 'BB004', 60, 0, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.11062018003', 'BB002', 7, 0, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.11062018004', 'BB005', 10, 0, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.11062018005', 'BB001', 5, 625000, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.12062018006', 'BB003', 10, 0, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.12062018007', 'BB001', 10, 100000, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.12062018008', 'BB001', 5, 0, '2023-01-13 04:52:13', '2023-01-13 04:52:13'),
('PO.12062018010', 'BB001', 5, 0, '2023-01-13 04:52:13', '2023-01-13 04:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `no_pengeluaran` varchar(12) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `jam_pengeluaran` varchar(10) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `jenis_pengeluaran` varchar(25) NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`no_pengeluaran`, `tgl_pengeluaran`, `jam_pengeluaran`, `nama_user`, `jenis_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `updated_at`, `created_at`) VALUES
('PC100618001', '2018-06-10', '11:00', 'Defra', 'Belanja Bahan Cafe', 150000, '--', '2023-01-13 04:52:35', '2023-01-13 04:52:35'),
('PC110618002', '2018-06-11', '00:45', 'Defranata', 'Belanja Bahan Cafe', 210000, 'kopi dan susu', '2023-01-13 04:52:35', '2023-01-13 04:52:35'),
('PC100618015', '2018-06-10', '11:00', 'Ardan', 'Belanja Bahan Cafe', 200000, '', '2023-01-13 04:52:35', '2023-01-13 04:52:35'),
('PC100618099', '2018-06-10', '11:00', 'Defra', 'Belanja Bahan Cafe', 150000, '--', '2023-01-13 08:22:44', '2023-01-13 08:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(20) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `nama_kasir` varchar(15) NOT NULL,
  `nama_konsumen` varchar(50) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `tanggal_penjualan`, `nama_kasir`, `nama_konsumen`, `no_meja`, `total`, `bayar`, `updated_at`, `created_at`) VALUES
('INV10062018001', '2018-06-10', 'Ayu Marica', 'Defra', 1, 85000, 100000, '2023-01-13 04:52:54', '2023-01-13 04:52:54'),
('INV10062018002', '2018-06-10', 'Ayu Marica', 'adis', 1, 130000, 150000, '2023-01-13 04:52:54', '2023-01-13 04:52:54'),
('INV11062018003', '2018-06-11', 'Defranata', 'defra', 6, 120000, 150000, '2023-01-13 04:52:54', '2023-01-13 04:52:54'),
('INV12062018004', '2018-06-12', 'Admin', 'ayu', 4, 40000, 50000, '2023-01-13 04:52:54', '2023-01-13 04:52:54'),
('INV12062018005', '2018-06-12', 'Admin', 'defe', 1, 40000, 60000, '2023-01-13 04:52:54', '2023-01-13 04:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `kode_penjualan` varchar(20) NOT NULL,
  `kode_menu` varchar(5) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`kode_penjualan`, `kode_menu`, `jumlah`, `subtotal`, `updated_at`, `created_at`) VALUES
('INV10062018002', 'KM001', 2, 50000, '2023-01-13 04:53:19', '2023-01-13 04:53:19'),
('INV10062018002', 'KM003', 2, 80000, '2023-01-13 04:53:19', '2023-01-13 04:53:19'),
('INV11062018003', 'KM003', 3, 120000, '2023-01-13 04:53:19', '2023-01-13 04:53:19'),
('INV12062018004', 'KM003', 1, 40000, '2023-01-13 04:53:19', '2023-01-13 04:53:19'),
('INV12062018005', 'KM003', 1, 40000, '2023-01-13 04:53:19', '2023-01-13 04:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `retur_beli`
--

CREATE TABLE `retur_beli` (
  `kode_pembelian` varchar(25) NOT NULL,
  `tanggal_retur` date NOT NULL,
  `kode_bahan` varchar(15) NOT NULL,
  `jumlah_retur` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_retur` varchar(15) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(20) NOT NULL,
  `nama_supplier` varchar(35) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `telepon`, `alamat`, `updated_at`, `created_at`) VALUES
('SP-99', 'Toko A', '14045', 'Bandung', '2023-01-13 18:09:43', '2023-01-13 04:54:00'),
('SP-02', 'Toko B', '14044', 'Bandung', '2023-01-13 04:54:00', '2023-01-13 04:54:00'),
('SP-03', 'Toko C', '022788125', 'Jl Seskoau No.21 Lembang', '2023-01-13 04:54:00', '2023-01-13 04:54:00'),
('SP-04', 'Toko D', '0222856712', 'Bandung', '2023-01-13 04:54:00', '2023-01-13 04:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama_user`, `hak_akses`, `updated_at`, `created_at`) VALUES
('admin', 'admin', 'Admin', 'Admin', '2023-01-13 04:54:19', '2023-01-13 04:54:19'),
('dapur', 'dapur', 'Dapur', 'Dapur', '2023-01-13 04:54:19', '2023-01-13 04:54:19'),
('kasir', 'kasir', 'Kasir', 'Kasir', '2023-01-13 04:54:19', '2023-01-13 04:54:19'),
('pemilik', 'pemilik', 'Pemilik', 'Pemilik', '2023-01-13 04:54:19', '2023-01-13 04:54:19'),
('Keamanan', 'Keamanan', 'Keamanan', 'Keamanan', '2023-01-13 08:41:22', '2023-01-13 08:41:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
