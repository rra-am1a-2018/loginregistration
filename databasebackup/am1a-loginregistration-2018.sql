-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2019 at 08:16 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am1a-loginregistration-2018`
--
CREATE DATABASE IF NOT EXISTS `am1a-loginregistration-2018` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `am1a-loginregistration-2018`;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatarName` varchar(300) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `score` int(10) NOT NULL,
  `datetime` datetime NOT NULL,
  `userID` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`id`, `avatarName`, `age`, `score`, `datetime`, `userID`) VALUES
(3, 'bruin broodje', 50, 320, '2019-04-04 09:08:34', 1),
(4, 'test', 50, 320, '2019-04-04 09:10:20', 6),
(5, 'tessiedetest', 60, 320, '2019-04-04 09:20:49', 8),
(6, 'broccoli', 50, 320, '2019-04-04 09:24:01', 9),
(7, 'broccoli', 50, 520, '2019-04-04 09:24:55', 9),
(8, 'thegreatest', 50, 320, '2019-04-04 10:11:16', 9),
(9, 'thebiggest', 60, 520, '2019-04-04 10:12:07', 9),
(10, 'bruinbroodje', 40, 320, '2019-04-04 10:13:22', 5);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(350) NOT NULL,
  `password` varchar(72) NOT NULL,
  `userrole` enum('administrator','customer','root','moderator') NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `email`, `password`, `userrole`) VALUES
(1, 'customer@gmail.com', '$2y$10$5CI/XDT3WJe71Up7kmsnBuMWSph9n84kAHVmhyFuHk3y1q37t8Xtu', 'customer'),
(2, 'root@gmail.com', '$2y$10$7IB7SHVsgd/Gkdnq9mM8guquwvsERVOFreKPqZyqFqYNWUWTWUl0i', 'root'),
(3, 'admin@gmail.com', '$2y$10$b4/rvqcnXBpUPLTtM/MheeU5apU0EJogTxX9R4ItLTy2fJO92ZAtO', 'administrator'),
(4, 'moderator@gmail.com', '$2y$10$IgecKYe/XNT7XXieJzQ9jePV4iYdd9jk4xVHDnaYNW7TFMGtxZexi', 'moderator'),
(5, 'a@a.nl', '$2y$10$P2IcRkUmerGiaYmEqZ5F8O4NVOKi3407eEx6u0JajucWbld87ZTBa', 'customer'),
(6, 'b@b.nl', '$2y$10$g.wGz4NpWM777Wvwcu6nP.o3PQ9tFzAJCNm3iickTdZ.6Ug7iZ2t.', 'customer'),
(8, 'w@w.nl', '$2y$10$RfrIlTle04YrRsieCXkMVOoVmoZwRtLi5yDTVLcO58drxCs6EoKI2', 'customer'),
(9, 'h@h.nl', '$2y$10$CxkQzc/zfnCy6cRh2qlLqOeCLTM.faHPxBiyeTCx1xfUWqr4iYo2S', 'customer');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
