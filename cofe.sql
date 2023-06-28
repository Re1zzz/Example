-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 11:47 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cofe`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha`) VALUES
('12');

-- --------------------------------------------------------

--
-- Table structure for table `chara`
--

CREATE TABLE `chara` (
  `id` int(11) NOT NULL,
  `nama` varchar(33) NOT NULL,
  `region` varchar(20) NOT NULL,
  `bd` varchar(112) NOT NULL,
  `element` varchar(30) NOT NULL,
  `weapon` varchar(22) NOT NULL,
  `harga` varchar(55) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chara`
--

INSERT INTO `chara` (`id`, `nama`, `region`, `bd`, `element`, `weapon`, `harga`, `gambar`) VALUES
(30, 'Kopi Luwak', 'Dalam Negeri', '22 November 2023', 'Kopi', 'Minuman', '2000', 'kopi.png'),
(31, 'Mie Goreng', 'Dalam Negeri', '2 Hari', 'Mie', 'Makanan', '6000', 'mie gorng.jpg'),
(32, 'Kopi Hitam', 'Dalam Negeri', '2 Hari', 'Kopi', 'Minuman', '5000', 'Kopi Hitam.jpg'),
(33, 'Yupi', 'Dalam Negeri', '22 November 2024', 'Gula', 'Snack', '15000', 'permkaret.jpg'),
(34, 'Taro', 'Dalam Negeri', '22 November 2023', 'Tepung Terigu', 'Snack', '3500', 'taro.jpg'),
(35, 'Pork Meatball', 'Dalam Negeri', '2 Hari', 'Pork + Tepung', 'Makanan', '36000', 'bks.jpg'),
(36, 'Es Teh', 'Dalam Negeri', '2 Hari', 'Teh', 'Minuman', '3000', 'minuman es teh.jpg'),
(37, 'Kentang Goreng', 'Dalam Negeri', '2 Hari', 'Kentang', 'Makanan', '10000', 'kentang.jpg'),
(38, 'Mie Goreng [Kemasan]', 'Dalam Negeri', '22 November 2024', 'Mie', 'Makanan', '3500', 'indonmie.jpg'),
(39, 'Aqua 600ml', 'Dalam Negeri', '22 November 2023', 'Air', 'Minuman', '4000', 'aqua_botol_600ml.jpg'),
(40, 'Takoyaki', 'Luar Negeri', '2 Hari', 'Tepung Terigu', 'Makanan', '15000', 'taako.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `rlname` varchar(55) NOT NULL,
  `username` varchar(22) DEFAULT NULL,
  `pw` varchar(22) DEFAULT NULL,
  `ttl` date DEFAULT NULL,
  `kelamin` varchar(22) NOT NULL,
  `email` varchar(55) NOT NULL,
  `number` varchar(12) NOT NULL,
  `role` varchar(22) NOT NULL,
  `verif` varchar(22) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `rlname`, `username`, `pw`, `ttl`, `kelamin`, `email`, `number`, `role`, `verif`, `gambar`) VALUES
(7, 'Ini Orang', 'AmpunNgab', 'iyah', '1995-01-17', 'Male', 'alfarizkymaulana29@gmail.com', '092783771', 'user', '', 'download.png'),
(8, 'Iya deh', 'Apaan', 'hooh', '2022-11-02', 'Male', 'aret@gmail.com', '089821981', 'user', '', ''),
(12, 'Alfarizky Maulanaz', 'Sh1nezX1', 'iyah', '2005-05-22', 'Netral', 'lolichanuwuku@gmail.com', '082138113375', 'user', '', 'image-504965.png'),
(13, 'Reyka', 'Teizer1', 'iyah', '2003-06-24', 'Female', 'terikay123@gmail.com', '087635131741', 'user', '', 'Bukan-Makima.jpeg'),
(16, 'Budiman', 'Azin', 'iyah', '2022-11-17', 'Male', 'lolichanuwuku@gmail.com', '082121234141', 'user', '', '297446877_5306774562746895_7100732910550269635_n.jpg'),
(17, 'Rizky', 'admin', 'admin', '2005-05-22', 'Male', 'alfarizkymaulana29@gmail.com', '082138113364', 'admin', '3002', ''),
(19, 'Menhera', 'menhera123', 'menhera123', '2004-06-08', 'Male', 'menherachan21@gmail.com', '0093131', 'user', '', 'illust_97006520_20221005_223050.jpg'),
(20, 'Joko Susilo', 'jokosus', 'jokosus', '1989-02-08', 'Netral', 'jokosusss@gmail.com', '0872613141', 'user', '', 'logo-pdp (1).png'),
(21, 'Bambang ', 'bambangpung', 'iyain', '2006-02-08', 'Netral', 'bambang43@gmail.com', '087678685436', 'user', '', 'Signature NekoPoi.png');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `nick` varchar(55) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `total_belanja` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `nick`, `tanggal_pemesanan`, `total_belanja`) VALUES
(126, 'Alfarizky Maulanaz', '2022-11-21', 36000),
(127, 'Alfarizky Maulanaz', '2022-11-21', 9000),
(128, 'Alfarizky Maulanaz', '2022-11-22', 10000),
(129, 'Alfarizky Maulana', '2022-11-22', 2000),
(130, 'Alfarizky Maulana', '2022-11-22', 7000),
(131, 'Alfarizky Maulanaz', '2022-11-22', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_chara`
--

CREATE TABLE `pemesanan_chara` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `nameuser` varchar(30) NOT NULL,
  `number` varchar(40) NOT NULL,
  `realname` varchar(40) NOT NULL,
  `paid` float NOT NULL,
  `kembalian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_chara`
--

INSERT INTO `pemesanan_chara` (`id_pemesanan_produk`, `id_pemesanan`, `id`, `jumlah`, `nameuser`, `number`, `realname`, `paid`, `kembalian`) VALUES
(166, 126, '35', 1, 'Sh1nezX1', 'GI-7JT391', 'Alfarizky Maulanaz', 40000, '4000'),
(167, 127, '31', 1, 'Sh1nezX1', 'GI-G4XK50', 'Alfarizky Maulanaz', 10000, '1000'),
(168, 127, '36', 1, 'Sh1nezX1', 'GI-G4XK50', 'Alfarizky Maulanaz', 10000, '1000'),
(169, 128, '32', 2, 'Sh1nezX1', 'GI-O21J50', 'Alfarizky Maulanaz', 15000, '5000'),
(170, 129, '30', 1, 'Sh1nezX1', 'GI-D8HMI1', 'Alfarizky Maulana', 3000, '1000'),
(171, 130, '30', 2, 'Sh1nezX1', 'GI-4J22E3', 'Alfarizky Maulana', 10000, '3000'),
(172, 130, '36', 1, 'Sh1nezX1', 'GI-4J22E3', 'Alfarizky Maulana', 10000, '3000'),
(173, 131, '30', 1, 'Sh1nezX1', 'GI-QY4M81', 'Alfarizky Maulanaz', 5000, '3000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chara`
--
ALTER TABLE `chara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `pemesanan_chara`
--
ALTER TABLE `pemesanan_chara`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chara`
--
ALTER TABLE `chara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `pemesanan_chara`
--
ALTER TABLE `pemesanan_chara`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
