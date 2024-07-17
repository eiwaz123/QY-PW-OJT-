-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2024 at 11:16 AM
-- Server version: 8.2.0
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qyprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `categories` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `product_id`, `categories`) VALUES
(1, 66, 'html'),
(2, 66, 'css'),
(3, 67, ''),
(4, 68, '12343213'),
(5, 69, ''),
(6, 72, ''),
(7, 73, ''),
(8, 74, ''),
(9, 75, ''),
(10, 77, ''),
(11, 78, ''),
(12, 79, ''),
(13, 80, 'add-on'),
(14, 80, 'sound'),
(15, 61, 'laruan'),
(16, 61, 'bisektleta'),
(21, 82, 'big'),
(22, 82, 'coffee'),
(23, 82, 'bigcoffee'),
(24, 83, 'Mountainbike'),
(25, 83, 'BIKE');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE IF NOT EXISTS `credentials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`id`, `name`, `username`, `password`, `type`) VALUES
(9, '', 'admin', '$2y$10$Pu49O0vXaeU3ypXOvZ1z7OUFEtCf7ABayEi5Ptb75AydRHBGqN.sS', 'admin'),
(10, '', 'user', '$2y$10$MzytPTMq5b1q4itr5.TzGu4OdJ3Mtt4kI5Rhrbu4CUdoDW2FdPxbS', 'customer'),
(11, '', 'roi', '$2y$10$vhiYEBY7QPIEG4LIrg10m.zj05XvHdDt/OGLXe0J1YrUscN8fPDlu', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `product_id`) VALUES
(43, 10, 59);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `path` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `product_id`, `path`) VALUES
(3, 59, 'img/1.png'),
(4, 59, 'img/2.png'),
(5, 59, 'img/3.png'),
(6, 59, 'img/4.png'),
(7, 59, 'img/5.png'),
(8, 59, 'img/6.png'),
(9, 59, 'img/7.png'),
(10, 59, 'img/8.png'),
(11, 59, 'img/9.png'),
(12, 60, 'img/1green.png'),
(13, 60, 'img/2green.png'),
(14, 60, 'img/3green.png'),
(15, 60, 'img/4green.png'),
(16, 60, 'img/5green.png'),
(17, 61, 'img/puerple 1.jpg'),
(18, 61, 'img/puerple 2.jpg'),
(19, 61, 'img/puerple 3.jpg'),
(20, 61, 'img/puerple 4.jpg'),
(23, 78, 'img/bike front-side.jpg'),
(24, 78, 'img/bike front-side.jpg'),
(26, 80, 'img/3cb168cbb20ee90e25a241fe4709789b.jpg'),
(27, 82, 'img/coffemate.jpg'),
(28, 82, 'img/coffemate.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `likes`) VALUES
(1, 'First post', 0),
(2, 'second post', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company` varchar(258) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `productname` varchar(258) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `fulldescription` varchar(258) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `favorite` int NOT NULL,
  `link` varchar(258) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `likes` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company`, `productname`, `price`, `fulldescription`, `favorite`, `link`, `likes`) VALUES
(59, 'FOXTER Inc', 'NEW TEKNO RHYTHM 5.0 1X10 HYDRAULIC BRAKES ', 9000, '●1x10\r\n●Alloy frame\r\n●Inner cabling\r\n●Tekno handlebar\r\n●Tekno handlepost\r\n●Tekno seatpost 27.5\r\n●Tekno saddle\r\n●Tekno alloy rim 32holes\r\n●Tekno crank squaretype 1x 32T\r\n●Micronew shifter 1x10\r\n●Tekno fork lock/out\r\n●Racework  hydraulic brakes\r\n●Compass tire ', 0, 'https://www.carousell.ph/p/tekno-rhythm-5-0-27-5-29er-1x10s-hydraulic-1148432285/', 1),
(60, 'FOXTER inc', 'TEKNO RHYTHM 6.0 29er 1x11 Speed L-TWOO A9 Drivetrain Mountain bike', 12450, 'SPECIFICATIONS:\r\n●Tekno Alloy Frame AL6061 Internal Cable Routing\r\n●Tekno Coil Suspension Fork Manual Lockout\r\n●L-TWOO A9 Right Shifter 11 Speed\r\n●L-TWOO RD 11 Speed\r\n●YBN 11 Speed Chain\r\n●Racework Hydraulic Brake \r\n●Tekno Alloy Crank 1x32T\r\n●Sealed Bearing ', 0, 'https://shopee.ph/JAB.-High-end-.TEKNO-RHYTHM-6.0-29er-1x11-Speed-L-TWOO-A9-Drivetrain-Mountain-bike-i.41310559.23021867622', 0),
(61, 'TEKNO', 'TEKNO Rhythm 8.0 Hydraulic ', 28, 'Original Tekno parts \r\n<Frame alloy inner cabling 27.5 \r\n<1x13 speed \r\n<L-TWO Shifter ,RD ,chain ,Cogs \r\n<Tekno Crawk 1x 34T 104 BCD Sqaure parts \r\n<Racework Hydraulic \r\n<Tekno stem alloy \r\n> Tekno Seat post alloy \r\n<Tekno saddle \r\n<Tekno Fork Preload Suspen', 0, 'https://www.alibaba.com/product-detail/26-27-5-650b-29-alloy_1600444616690.html', 0),
(78, 'CompanyABC', 'Tekno ', 54123, 'EWQEQWE●', 0, 'Google.com', 0),
(80, 'earsline', 'Earbuds', 5000, '●malakas tumugtog', 0, 'shoope.com', 0),
(82, 'cocacola', 'Kopiko', 2500, 'KAHIT ANO', 0, 'shoope.com', 0),
(83, 'QYPRINT', 'NEW TEKNO RHYTHM 5.0 1X10 HYDRAULIC BRAKES ', 10000, '●1x10\r\n●Alloy frame\r\n●Inner cabling\r\n●Tekno handlebar\r\n●Tekno handlepost\r\n●Tekno seatpost 27.5\r\n●Tekno saddle\r\nTekno alloy rim 32holes\r\nTekno crank squaretype 1x 32T\r\nMicronew shifter 1x10\r\nTekno fork lock/out\r\nRacework  hydraulic brakes\r\nCompass tire 27.5×1', 0, 'Google.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
