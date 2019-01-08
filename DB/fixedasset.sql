-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 15, 2018 at 07:47 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fixedasset`
--

-- --------------------------------------------------------

--
-- Table structure for table `aktiva`
--

CREATE TABLE `aktiva` (
  `kdaktiva` varchar(11) NOT NULL,
  `namaaktiva` varchar(200) NOT NULL,
  `thn_beli` int(4) NOT NULL,
  `idkategori` varchar(11) NOT NULL,
  `usia` int(4) NOT NULL,
  `harga` int(20) NOT NULL,
  `supplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aktiva`
--

INSERT INTO `aktiva` (`kdaktiva`, `namaaktiva`, `thn_beli`, `idkategori`, `usia`, `harga`, `supplier`) VALUES
('BGN0001', 'Kantor SJP', 2014, 'BGN', 20, 2000000000, 'Bandung City View'),
('ELKT0001', 'Pesawat telepon', 2016, 'ELKT', 8, 360000, 'Adi Djaya Elektronik'),
('FRNT0001', 'Lemari besi', 2014, 'FRNT', 8, 2400000, 'IKEA'),
('FRNT0002', 'Sofa tamu', 2014, 'FRNT', 4, 5400000, 'Ikea'),
('IT0001', 'Notebook Acer', 2014, 'IT', 8, 5000000, 'Computa'),
('IT0002', 'Personal Computer', 2014, 'IT', 8, 7200000, 'Computa'),
('KNDR0001', 'Honda Freed Silver', 2015, 'KNDR', 8, 256000000, 'Honda Kumala'),
('KNDR0002', 'Sepeda motor Scoopy', 2015, 'KNDR', 8, 16000000, 'Astra Motor'),
('KTCN001', 'Kompor gas', 2016, 'KTCN', 8, 800000, 'VICENZA'),
('MSN0001', 'Mesin Absensi', 2015, 'MSN', 4, 960000, 'ASC Computer'),
('MSSR0001', 'Alat ukur teristal', 2016, 'MSSR', 4, 4000000, 'CV Maju Jaya');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` varchar(11) NOT NULL,
  `namakategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `namakategori`) VALUES
('', ''),
('BGN', ''),
('ELKT', 'Elektronik'),
('EMGC', 'Emergency Equipment'),
('FRNT', 'Mebel'),
('IT', 'Komputer'),
('KNDR', 'Kendaraan'),
('KTCN', 'Kitchen Set'),
('MSN', 'Mesin-mesin');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`) VALUES
(1, 'Admin', 'admin@sjp.com', '3af36822e70517efee60e28af87be999'),
(4, 'Randi Triyudanto', 'randi@gmail.com', '18c14fb7ab38bfdbbb24444bbdf0634c'),
(5, 'Syapril Janizar', 'syapriljanizar@gmail.com', '05aee63f29dcf4e5d86d45ab1f634825');

-- --------------------------------------------------------

--
-- Table structure for table `penyusutan`
--

CREATE TABLE `penyusutan` (
  `kdpenyusutan` int(11) NOT NULL,
  `kdaktiva` varchar(11) NOT NULL,
  `usia` int(4) NOT NULL,
  `harga` int(20) NOT NULL,
  `tarif` int(20) NOT NULL,
  `thn_berjalan` int(4) NOT NULL,
  `akumulasi` int(20) NOT NULL,
  `nilai_buku` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyusutan`
--

INSERT INTO `penyusutan` (`kdpenyusutan`, `kdaktiva`, `usia`, `harga`, `tarif`, `thn_berjalan`, `akumulasi`, `nilai_buku`) VALUES
(1, 'IT0001', 8, 5000000, 625000, 2, 1250000, 3750000),
(2, 'ELKT0001', 8, 360000, 45000, 2, 90000, 270000),
(3, 'BGN0001', 20, 2000000000, 100000000, 4, 400000000, 1600000000),
(4, 'FRNT0001', 8, 2400000, 300000, 4, 1200000, 1200000),
(5, 'FRNT0002', 4, 5400000, 1350000, 4, 5400000, 0),
(6, 'IT0002', 8, 7200000, 900000, 4, 3600000, 3600000),
(7, 'KNDR0001', 8, 256000000, 32000000, 3, 96000000, 160000000),
(8, 'KNDR0002', 8, 16000000, 2000000, 3, 6000000, 10000000),
(9, 'MSN0001', 4, 960000, 240000, 3, 720000, 240000),
(10, 'MSSR0001', 4, 4000000, 1000000, 2, 2000000, 2000000),
(11, 'KTCN001', 8, 800000, 100000, 2, 200000, 600000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktiva`
--
ALTER TABLE `aktiva`
  ADD PRIMARY KEY (`kdaktiva`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`kdpenyusutan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `kdpenyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
