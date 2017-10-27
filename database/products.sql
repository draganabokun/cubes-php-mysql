-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 27, 2017 at 10:23 AM
-- Server version: 10.1.25-MariaDB-1
-- PHP Version: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cubesphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand` char(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `specification` longtext,
  `price` decimal(10,2) NOT NULL,
  `quantity` float NOT NULL,
  `category` char(20) NOT NULL,
  `on_sale` tinyint(1) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `tags` char(50) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand`, `title`, `description`, `specification`, `price`, `quantity`, `category`, `on_sale`, `discount`, `tags`, `created_at`) VALUES
(7, 'Apple', 'Apple iPhone7 32GB', 'Mobilni Telefon Apple iPhone7 32GB', '', '98546.21', 23, 'Mobilni Telefon', 0, '0.00', '', '2016-06-12 12:53:00'),
(8, 'Apple', 'Apple iPhone7 64GB', 'Mobilni Telefon Apple iPhone7 64GB', '', '112345.12', 2, 'Mobilni Telefon', 0, '0.00', '', '2016-12-13 13:53:00'),
(9, 'Apple', 'Apple iPhone7 32GB Gold', 'Mobilni Telefon Apple iPhone7 32GB Gold', '', '101234.23', 1, 'Mobilni Telefon', 0, '0.00', '', '2016-03-14 14:53:00'),
(10, 'Apple', 'Apple iPhone8 32GB', 'Mobilni Telefon Apple iPhone8 32GB', '', '141889.32', 12, 'Mobilni Telefon', 1, '15.00', '', '2017-04-15 15:53:00'),
(11, 'Apple', 'Apple iPhone8 64GB', 'Mobilni Telefon Apple iPhone8 64GB', '', '151339.32', 2, 'Mobilni Telefon', 0, '0.00', '', '2017-06-16 16:53:00'),
(12, 'Apple', 'Apple iPhone8 32GB Gold', 'Mobilni Telefon Apple iPhone8 32GB Gold', '', '161323.37', 0, 'Mobilni Telefon', 0, '0.00', '', '2017-08-17 17:53:00'),
(13, 'Samsung', 'Samsung Galaxy S8', 'Mobilni Telefon Samsung Galaxy S8', '', '99876.34', 12, 'Mobilni Telefon', 0, '0.00', '', '2017-06-18 18:53:00'),
(14, 'Samsung', 'Samsung Galaxy S7', 'Mobilni Telefon Samsung Galaxy S7', '', '69887.34', 3, 'Mobilni Telefon', 0, '0.00', '', '2016-07-19 14:53:00'),
(15, 'Samsung', 'Samsung Galaxy S6', 'Mobilni Telefon Samsung Galaxy S6', '', '55763.34', 3, 'Mobilni Telefon', 0, '0.00', '', '2015-02-20 11:53:00'),
(16, 'Huawei', 'Huawei P10', 'Mobilni Telefon Huawei P10', '', '67898.77', 6, 'Mobilni Telefon', 0, '0.00', '', '2016-11-21 12:53:00'),
(17, 'Huawei', 'Huawei P9', 'Mobilni Telefon Huawei P9', '', '65632.33', 12, 'Mobilni Telefon', 0, '0.00', '', '2015-03-22 12:53:00'),
(18, 'HTC', 'HTC Desire 820', 'Mobilni Telefon HTC Desire 820', '', '32456.76', 3, 'Mobilni Telefon', 0, '0.00', '', '2014-08-23 12:53:00'),
(19, 'HTC', 'HTC One A9', 'Mobilni Telefon HTC One A9', '', '42323.47', 11, 'Mobilni Telefon', 1, '20.00', '', '2016-05-24 12:53:00'),
(20, 'HTC', 'HTC U11', 'Mobilni Telefon HTC U11', '', '55736.43', 7, 'Mobilni Telefon', 0, '0.00', '', '2017-06-25 12:53:00'),
(21, 'Samsung', 'Samsung UE-32J4000AWXXH', 'Televizor Samsung UE-32J4000AWXXH', '', '32985.76', 0, 'Televizor', 0, '0.00', '', '2015-12-26 12:53:00'),
(22, 'Samsung', 'Samsung UE-32K4102AKXXH', 'Televizor Samsung UE-32K4102AKXXH', '', '34323.32', 5, 'Televizor', 0, '0.00', '', '2016-11-27 12:53:00'),
(23, 'Samsung', 'Samsung', 'Televizor Samsung', '', '11212.12', 0, 'Televizor', 0, '0.00', '', '2017-09-28 12:53:00'),
(24, 'LG', 'LG 32LH510B', 'Televizor LG 32LH510B', '', '14544.32', 6, 'Televizor', 0, '0.00', '', '2017-01-29 12:53:00'),
(25, 'LG', 'LG 32LH510U', 'Televizor LG 32LH510U', '', '12345.54', 8, 'Televizor', 0, '0.00', '', '2016-08-30 12:53:00'),
(26, 'Sony', 'Sony KD 65XE9005BAEP', 'Televizor Sony KD 65XE9005BAEP', '', '88989.33', 12, 'Televizor', 1, '10.00', '', '2015-07-01 12:53:00'),
(27, 'Sony', 'Sony LED LCD KDL 50W755CBAEP', 'Televizor Sony LED LCD KDL 50W755CBAEP', '', '72098.23', 2, 'Televizor', 0, '0.00', '', '2014-10-02 12:53:00'),
(28, 'Sony', 'Sony 40WD650BAEP', 'Televizor Sony 40WD650BAEP', '', '56765.32', 12, 'Televizor', 0, '0.00', '', '2013-10-03 12:53:00'),
(29, 'Sony', 'Sony TV KDL32WE615BAEP', 'Televizor Sony TV KDL32WE615BAEP', '', '32345.56', 4, 'Televizor', 0, '0.00', '', '2015-04-04 12:53:00'),
(30, 'Beko', 'Beko RCS A300K 20W', 'Frizider Beko RCS A300K 20W', '', '28999.99', 2, 'Frizider', 1, '5.00', '', '2013-07-05 12:53:00'),
(31, 'Beko', 'Beko DSA 28020', 'Frizider Beko DSA 28020', '', '27654.23', 1, 'Frizider', 0, '0.00', '', '2017-08-06 12:53:00'),
(32, 'Gorenje', 'Gorenje RC 4180 AW', 'Frizider Gorenje RC 4180 AW', '', '32456.65', 0, 'Frizider', 0, '0.00', '', '2014-01-07 12:53:00'),
(33, 'Gorenje', 'Gorenje RF 4120 AW', 'Frizider Gorenje RF 4120 AW', '', '21987.72', 3, 'Frizider', 0, '0.00', '', '2012-03-08 12:53:00'),
(34, 'Bosh', 'Bosh KGN 36NL30', 'Frizider Bosh KGN 36NL30', '', '54320.43', 1, 'Frizider', 0, '0.00', '', '2013-07-09 12:53:00'),
(35, 'Beko', 'Beko WRE 5400 B', 'Ves Masina Beko WRE 5400 B', '', '19887.23', 1, 'Ves Masina', 0, '0.00', '', '2015-06-10 12:53:00'),
(36, 'Gorenje', 'Gorenje W 6723 S', 'Ves Masina Gorenje W 6723 S', '', '19932.23', 0, 'Ves Masina', 1, '30.00', '', '2014-01-11 12:53:00'),
(37, 'Bosh', 'Bosh WAB 24262BY', 'Ves Masina Bosh WAB 24262BY', '', '32456.23', 3, 'Ves Masina', 0, '0.00', '', '2016-09-12 12:53:00'),
(38, 'Whirpool', 'Whirpool AWOC 70100', 'Ves Masina Whirpool AWOC 70100', '', '26786.56', 1, 'Ves Masina', 0, '0.00', '', '2017-07-13 12:53:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
