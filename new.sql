-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 16, 2018 at 10:08 AM
-- Server version: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.2.5-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enditha`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_barang`, `nama_barang`, `id_supplier`, `harga_jual`, `harga_beli`, `kadaluarsa`) VALUES
(47, 'Sosis Ayam', 2, 24000, 21000, '2019-08-28'),
(48, 'Sosis Sapi', 2, 24000, 21000, '2019-11-13'),
(49, 'Sosis Mie', 8, 15000, 12000, '2019-09-24'),
(50, 'Nugget Stik', 7, 22000, 20000, '2019-08-22'),
(51, 'Nugget Bunder', 7, 21000, 19000, '0000-00-00'),
(52, 'Nugget pop', 7, 20000, 17000, '2019-08-21'),
(53, 'Tempura ikan', 7, 21000, 18000, '2019-06-05'),
(54, 'Tempura cumi', 7, 21000, 1900, '2019-07-24'),
(55, 'Baso ikan', 5, 15000, 12000, '2019-08-14'),
(56, 'Baso cumi', 5, 15000, 12000, '2019-08-06'),
(57, 'Baso ayam', 5, 15000, 12000, '2019-08-01'),
(58, 'Scallop Stik', 9, 19000, 18000, '2019-06-12'),
(59, 'Scallop Bunder', 9, 20000, 17000, '2019-10-16'),
(60, 'Bintang', 9, 20000, 18000, '2019-07-23'),
(61, 'Burger ayam', 5, 17000, 15000, '2019-07-10'),
(62, 'Burger sapi', 5, 17000, 15000, '2019-06-19'),
(63, 'Bakpau keju', 8, 15000, 12000, '2019-06-06'),
(64, 'Bakpau coklat', 8, 15000, 12000, '2019-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `det_pembelian`
--

CREATE TABLE `det_pembelian` (
  `id_det_pembelian` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_pembelian`
--

INSERT INTO `det_pembelian` (`id_det_pembelian`, `id_pembelian`, `kd_barang`, `jumlah`) VALUES
(33, 26, 47, 30),
(34, 26, 48, 30),
(35, 26, 49, 30),
(36, 27, 47, 10),
(37, 27, 48, 10),
(38, 28, 47, 10),
(39, 27, 49, 10),
(40, 28, 48, 10),
(41, 28, 49, 10),
(42, 29, 48, 10),
(43, 30, 48, 50),
(44, 30, 47, 30),
(45, 31, 50, 100),
(46, 32, 51, 80),
(47, 32, 52, 60),
(48, 32, 54, 50),
(49, 32, 53, 40),
(50, 33, 57, 30),
(51, 33, 56, 20),
(52, 33, 55, 10),
(53, 33, 60, 30),
(54, 33, 58, 15),
(55, 33, 59, 15),
(56, 34, 61, 10),
(57, 34, 62, 10),
(58, 35, 47, 10),
(59, 35, 48, 10),
(60, 36, 63, 10),
(61, 36, 64, 10),
(62, 36, 48, 10),
(63, 37, 64, 10),
(64, 38, 64, 10);

-- --------------------------------------------------------

--
-- Table structure for table `det_penjualan`
--

CREATE TABLE `det_penjualan` (
  `id_det_penjualan` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `kd_barang` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_dibayarkan` int(20) NOT NULL,
  `total_kembalian` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_penjualan`
--

INSERT INTO `det_penjualan` (`id_det_penjualan`, `id_penjualan`, `kd_barang`, `id_pelanggan`, `jumlah`, `harga`, `total_dibayarkan`, `total_kembalian`) VALUES
(16, 11, 47, 2, 20, 24000, 0, 0),
(17, 12, 47, 4, 5, 24000, 0, 0),
(18, 13, 48, 4, 20, 24000, 0, 0),
(19, 14, 47, 7, 12, 24000, 0, 0),
(20, 14, 49, 7, 10, 15000, 0, 0),
(21, 15, 49, 6, 3, 15000, 0, 0),
(22, 16, 48, 2, 2, 24000, 0, 0),
(23, 16, 47, 2, 2, 24000, 0, 0),
(24, 17, 52, 5, 5, 20000, 0, 0),
(25, 17, 57, 5, 2, 15000, 0, 0),
(26, 18, 0, 6, 0, 0, 0, 0),
(27, 18, 0, 6, 0, 0, 0, 0),
(28, 19, 64, 4, 2, 15000, 0, 0),
(29, 20, 64, 6, 10, 15000, 0, 0),
(30, 21, 47, 27, 2, 24000, 0, 0),
(31, 22, 57, 1, 2, 15000, 40000, 10000),
(32, 0, 47, 1, 6, 24000, 150000, 6000),
(33, 23, 48, 2, 2, 24000, 50000, 2000),
(34, 24, 55, 6, 3, 15000, 50000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jns_kel` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jns_kel`, `alamat`, `no_tlp`) VALUES
(1, '  Kumaeroh Wati ', 'Perempuan', '  Jl. Kramat sari no.59  ', '  08560087344'),
(2, 'Nasikin', 'Laki-laki', 'Jl. otista no.32 Pekalongan', '0856889755567'),
(3, 'Arina Salsa', 'Perempuan', 'Jl. kauman no 45 Batang', '081237897990'),
(4, 'Santosa ', 'Laki-laki', 'Jl. kandang panjang No.56 Pekalongan', '08657754443'),
(5, 'Rasmani', 'Laki-laki', 'Jl. cendrawasih no.78 Batang', '086754443679'),
(6, 'Adam ', 'Laki-laki', 'Denasri Batang', '0865788435667'),
(7, 'Rumayah', 'Perempuan', 'Jl. veteran - Batang', '096789544428'),
(8, 'Sarah', 'Perempuan', 'Kauman - Batang', '0867545676543'),
(9, 'Darmanto', 'Laki-laki', 'Jl. salak - Pekalongan', '0865788456678'),
(10, '  Limin  ', 'Laki-laki', '  Denasri - Batang  ', '   0856778633'),
(11, 'Mandon', 'Laki-laki', 'Landung sari - Pekalongan', '08578895557'),
(12, 'Munah', 'Perempuan', 'Landung sari - Pekalongan', '0867546678'),
(13, 'Lina ', 'Perempuan', 'Medono - Pekalongan', '081235678976'),
(14, 'Jannah ', 'Perempuan', 'Kauman - Batang', '08767556445'),
(15, 'Rohman', 'Laki-laki', 'JL Toba - Pekalongan', '08777767755'),
(16, 'Trisno', 'Laki-laki', 'Jl. Sultan Agung - Pekalongan', '089767578589'),
(17, 'Lekha', 'Perempuan', 'Kasepuhan - Batang', '0856770988'),
(18, 'Kriss', 'Laki-laki', 'Kasepuhan - Batang', '086788566679'),
(19, 'Nikmatul', 'Perempuan', 'Kradenan - Batang', '086765545578'),
(20, 'Lindri', 'Perempuan', 'Kasepuhan - Batang', '085600786665'),
(21, 'Sujaan', 'Laki-laki', 'Denasri - Batang', '086578896577'),
(22, 'Komar', 'Laki-laki', 'Kasepuhan - Batang', '086788956664'),
(24, 'Anam', 'Laki-laki', 'jl. Mawar Kasepuhan', '0857666543332'),
(25, 'Karyono', 'Laki-laki', 'Kasepuhan - Batang', '08675546664'),
(26, 'Aminah', 'Perempuan', 'Kasepuhan - Batang', '085688977775'),
(27, 'Umum', 'Laki-laki', 'jakarta', '0822222222222');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `kd_pembelian` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `kd_pembelian`, `tanggal`) VALUES
(26, '201808121CC7', '2018-08-12'),
(27, '20180812DCB1', '2018-08-12'),
(28, '20180812DCB1', '2018-08-12'),
(29, '2018081284B6', '2018-08-12'),
(30, '20180812D41A', '2018-08-12'),
(31, '20180812C17B', '2018-08-12'),
(32, '201808135C8B', '2018-08-13'),
(33, '201808130D2E', '2018-08-13'),
(34, '201808131F3E', '2018-08-13'),
(35, '20180813145C', '2018-08-13'),
(36, '20180813EDB7', '2018-08-13'),
(37, '20180813D889', '2018-08-13'),
(38, '20180813C966', '2018-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `kd_penjualan` char(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kasir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kd_penjualan`, `tanggal`, `kasir`) VALUES
(11, '20180812F70B', '2018-08-12', ''),
(12, '20180812D5CC', '2018-08-12', ''),
(13, '201808125EDA', '2018-08-12', ''),
(14, '2018081200A1', '2018-08-12', ''),
(15, '201808128FAE', '2018-08-12', ''),
(16, '201808137A55', '2018-08-13', ''),
(17, '20180813CB74', '2018-08-13', ''),
(19, '201808130ADD', '2018-08-13', ''),
(20, '20180813BA06', '2018-08-13', ''),
(21, '2018081385D6', '2018-08-13', ''),
(22, '2018081669C5', '2018-08-16', ''),
(23, '20180816D476', '2018-08-16', 'Administrator'),
(24, '20180816A353', '2018-08-16', 'Najwa');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` int(11) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `nama_sales`, `id_supplier`, `alamat`, `no_tlp`) VALUES
(1, 'Somad', 2, 'pekalongan', '0868787878'),
(2, 'alwiiiiiiii', 5, 'sidomulyooooooooooo', '0909090909'),
(4, 'Wahyu', 2, 'ujung negoro', '085745564');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_tlp`) VALUES
(2, ' So Nice ', ' Jakarta ', ' 0857542232 '),
(5, 'Amanah Food', 'pekalongan  ', '085754333233 '),
(7, ' QyuQyu ', ' Pekalongan ', ' 0856664444 '),
(8, 'Aira Food', 'Batang', '087655467773'),
(9, 'Armada Food', 'Batang', '086555467549');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', 'admin'),
(3, 'Esti', 'esti', 'esti', 'kasir'),
(4, 'Najwa', 'najwa', 'najwa', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `det_pembelian`
--
ALTER TABLE `det_pembelian`
  ADD PRIMARY KEY (`id_det_pembelian`);

--
-- Indexes for table `det_penjualan`
--
ALTER TABLE `det_penjualan`
  ADD PRIMARY KEY (`id_det_penjualan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `kd_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `det_pembelian`
--
ALTER TABLE `det_pembelian`
  MODIFY `id_det_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `det_penjualan`
--
ALTER TABLE `det_penjualan`
  MODIFY `id_det_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id_sales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;