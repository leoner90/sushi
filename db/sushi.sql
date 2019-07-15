-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2019 at 02:46 AM
-- Server version: 5.6.38
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sushi`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `img1` varchar(100) NOT NULL,
  `img2` varchar(100) NOT NULL,
  `img3` varchar(100) NOT NULL,
  `img4` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `price` decimal(2,2) NOT NULL,
  `name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `img1`, `img2`, `img3`, `img4`, `description`, `price`, `name`) VALUES
(1, 'tigerMain.png', 'tigerSmallFirst.png', 'tigerSmallSecond.png', 'tigerSmallThird.png', 'Batch sushi rice, made with  raw rice.\nlarge raw peeled tiger prawns.\ntbsp tobiko, flying fish roe.\ntbsp Japanese mayonnaise, or ordinary mayonnaise.\nsheets nori seaweed.\nleaves of baby gem lettuce.\n', '0.19', 'Tiger Sushi Roll.'),
(3, 'philadelphiaMain.png', 'philadelphiaSmallFirst.png', 'philadelphiaSmallSecond.png', 'philadelphiaSmallThird.png', 'Sushi rice.  water. seasoned rice vinegar.  nori (seaweed paper)  smoked salmon. small cucumber.  cream cheese.', '0.99', 'Philadelphia '),
(4, 'californiaMain.png', 'californiaSmallFirst.png', 'californiaSmallSecond.png', 'californiaSmallThird.png', ' Crab meat, avocado, nori, cucumber, and sesame seeds.  ', '0.99', 'California Roll'),
(8, 'mangoMain.png', 'mangoSmallFirst.png', 'mangoSmallSecond.png', 'mangoSmallThird.png', 'Avocado, crab meat, tempura shrimp, mango slices, and creamy mango paste.', '0.99', 'Mango Roll'),
(9, 'salmonMain.png', 'salmonSmallFirst.png', 'salmonSmallSecond.png', 'salmonSmallThird.png', 'Cream cheese, yamagobo, and avocado inside. Baked salmon on top.', '0.96', 'Baked Salmon Roll');

-- --------------------------------------------------------

--
-- Table structure for table `order_id`
--

CREATE TABLE `order_id` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_id`
--

INSERT INTO `order_id` (`id`, `orderid`) VALUES
(0, 348);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
