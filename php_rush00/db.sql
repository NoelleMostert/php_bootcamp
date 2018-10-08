-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 08, 2018 at 03:28 AM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rush00`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cname` char(64) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cname`, `cid`) VALUES
('Dresses', 1),
('Shoes', 2),
('Tops', 4),
('Jackets', 5),
('Trousers', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `oid` mediumint(9) NOT NULL,
  `uid` mediumint(9) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `uid`, `status`) VALUES
(42, 1, 1),
(43, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `odid` mediumint(9) NOT NULL,
  `oid` mediumint(9) NOT NULL,
  `pid` mediumint(9) NOT NULL,
  `qty` mediumint(9) NOT NULL,
  `total` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`odid`, `oid`, `pid`, `qty`, `total`) VALUES
(33, 42, 5, 1, 450),
(34, 42, 6, 2, 980),
(35, 43, 5, 1, 450),
(36, 43, 6, 2, 980);

-- --------------------------------------------------------

--
-- Table structure for table `prodcat`
--

CREATE TABLE IF NOT EXISTS `prodcat` (
  `cpid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodcat`
--

INSERT INTO `prodcat` (`cpid`, `cid`, `pid`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4),
(5, 4, 5),
(6, 4, 6),
(7, 5, 7),
(8, 5, 8),
(9, 6, 9),
(10, 6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `pname` char(64) NOT NULL,
  `pid` int(11) NOT NULL,
  `img` char(255) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pname`, `pid`, `img`, `price`) VALUES
('White shirt dress', 1, 'img/white-dress.jpg', 400),
('Silver dress', 2, 'img/silver-dress.jpg', 550),
('Knee high boots', 3, 'img/boot.jpg', 990),
('Black medium heel sandal', 4, 'img/heel.jpg', 550),
('White lace inset top', 5, 'img/whitetop.jpg', 450),
('Green chiffon top', 6, 'img/greentop.jpg', 490),
('Soft line navy blazer', 7, 'img/blueblazer.jpg', 890),
('Light denim jacket', 8, 'img/denimjacket.jpg', 990),
('Grey linen pants', 9, 'img/greypants.jpg', 590),
('Pink linen pants', 10, 'img/pinkpants.jpg', 550);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` mediumint(9) NOT NULL,
  `fname` char(30) NOT NULL,
  `lname` char(30) NOT NULL,
  `email` char(30) NOT NULL,
  `password` char(30) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `password`, `admin`, `enabled`) VALUES
(1, 'Bob', 'Smith', 'f@g.com', 'abc', 1, 1),
(5, 'john', 'doe', 'john@doe.com', 'abc', 0, 1),
(6, 'noelle', 'mostert', 'noellemostert@gmail.com', 'abc', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`odid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `odid` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

