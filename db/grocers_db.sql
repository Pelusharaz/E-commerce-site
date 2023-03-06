-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 09:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `repeatpassword` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `repeatpassword`, `Date`, `Time`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$CCjQSko2jSMXL21wu..mDuZRuImYE.bJsOrCVIBq2OM0PYFrF3bh2', '$2y$10$uMMQrOEMe0K8irQOua9.y.d0nbfeoq5UoAtAW/dfA07pgi.TbKShe', '2023-03-06', '2023-03-06 23:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `productname` varchar(10000) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `unitprice` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `totalquantity` int(11) NOT NULL,
  `totalprice` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `delivery` varchar(100) NOT NULL,
  `information` varchar(200) NOT NULL,
  `mpesa` int(11) NOT NULL,
  `checkbox` varchar(30) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `productname`, `quantity`, `unitprice`, `price`, `totalquantity`, `totalprice`, `name`, `phone`, `email`, `delivery`, `information`, `mpesa`, `checkbox`, `Date`, `Time`) VALUES
(1, 'Ceramic Matte Screen Protector', '5', '498 ksh', '2,490.00ksh', 5, '2,490.00 ksh', 'user', '0791386752', 'user@gmail.com', 'Juja', 'test', 791386752, 'on', '2023-03-05', '17:04:42.0'),
(2, 'Grocery1,Grocery 2', '2,1', '4990 ksh,399 ksh', '9,980.00ksh,399.00ksh', 3, '10,379.00 ksh', 'Cyprian', '0796526231', 'cyprian@gmail.com', 'other', 'Ruiru Ndani', 796526231, 'on', '2023-03-05', '17:29:14.0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productname` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `productinfo` varchar(100) NOT NULL,
  `productimage` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `products` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productname`, `price`, `productinfo`, `productimage`, `category`, `products`, `code`, `Date`, `Time`) VALUES
(2, 'Grocery 1', 4990, 'fresh', 'coloredcapsicums.jpeg', 'Phonesandtablets', 'products', 'pd1', '2022-06-04', '14:01:06.0'),
(3, 'Grocery 2', 399, 'fresh', 'corriander.jpeg', 'Phonesandtablets', 'products', 'pd2', '2022-06-04', '14:02:10.0'),
(4, 'Grocery 3', 498, 'fresh', 'mangoes.jpeg', 'Phonesandtablets', 'products', 'pd3', '2022-06-04', '14:03:01.0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `repeatpassword` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Time` time(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `repeatpassword`, `Date`, `Time`) VALUES
(1, 'user', 'user@gmail.com', '$2y$10$guc7p7KVmlMIUaAdl0Fu3O5yM8yRajQRZMWyWiYARWT3euU.tY4LG', '$2y$10$T3RTeCEGdDf9FftXnAG33.PkXDQsCJicGt3LrzG1W5AhVqPtoDd2e', '2023-03-04', '15:16:56.0'),
(2, 'Cyprian', 'cyprian@gmail.com', '$2y$10$unpOM88GUXRsnCClk22lpuba.igqUrtbh7.4iwPppJ3K7i91/zlpK', '$2y$10$J/DSDY8kjCHdBp1tJ4UQNO1q7OciRJHgHESP2q0m5s99qpXfBs936', '2023-03-05', '17:24:10.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
