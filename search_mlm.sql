-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2021 at 03:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `search_mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_alamat` varchar(255) NOT NULL,
  `u_nomortelepon` varchar(10) NOT NULL,
  `u_namaupline` varchar(30) NOT NULL,
  `u_bod` date NOT NULL,
  `sudah_upline` tinyint(1) NOT NULL DEFAULT '0',
  `sudah_downline` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_alamat`, `u_nomortelepon`, `u_namaupline`, `u_bod`, `sudah_upline`, `sudah_downline`) VALUES
(4, 'A1', 'Jalan Darat no 334', '0812', 'jaydeep', '2019-01-18', 0, 0),
(5, 'james', 'Jalan Meranti No.4', '081290', 'A1', '2019-01-01', 0, 0),
(6, 'test', 'Jalan Gajah No.4', '08129', 'test', '2018-01-01', 1, 0),
(7, 'hacker', 'Jalan Barokah No.4', '08129', 'jaydeep', '2018-06-01', 1, 0),
(8, 'jaydeep', 'Jalan Minang III no4', '08129', 'admin2', '2019-02-01', 1, 0),
(9, 'admin2', 'Jalan Vetpur Raya III B1', '08129', 'admin2', '2021-12-15', 1, 0),
(10, 'admin23', 'Jalan Vetpur Raya III B14', '08129', 'admin23', '2021-12-16', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
