-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 11:01 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`) VALUES
(1, 'fruits'),
(3, 'vegetables'),
(4, 'spices');

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
(2, 'Grocery1,Grocery 2', '2,1', '4990 ksh,399 ksh', '9,980.00ksh,399.00ksh', 3, '10,379.00 ksh', 'Cyprian', '0796526231', 'cyprian@gmail.com', 'other', 'Ruiru Ndani', 796526231, 'on', '2023-03-05', '17:29:14.0'),
(3, 'Tomatoes,Onions,Grocery 3', '1,2,1', '10 ksh,10 ksh,498 ksh', '10.00ksh,20.00ksh,498.00ksh', 4, '528.00 ksh', 'user', '0791386752', 'user@gmail.com', 'Nairobi CBD', 'Final Test', 791386752, 'on', '2023-03-08', '12:57:17.0');

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
(2, 'Tomatoes', 10, 'fresh', 'tomato.jpeg', 'fruits', 'products', 'pd1', '2022-06-04', '14:01:06.0'),
(4, 'Grocery 3', 498, 'fresh', 'mangoes.jpeg', 'Phonesandtablets', 'products', 'pd3', '2022-06-04', '14:03:01.0'),
(19, 'Grocery 4', 20, 'Fresh', 'capsicum.jpeg', 'vegetables', 'products', 'pd4', '2023-03-08', '10:30:37.0'),
(23, 'coriander', 5, 'Fresh', 'corriander.jpeg', 'spices', 'products', 'pd10', '2023-03-08', '13:00:34.0');

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
(3, 'user', 'user@gmail.com', '$2y$10$AIgZp7WMLcfswNI13aJ7HOqiSamCWxZi7zB286.Wesrquk6QDKmaK', '$2y$10$F6v3G0syk0r7cWfaj7wouO.7R0fZfatSjM.uHGTgodxjN.Tmjbl.e', '2023-03-07', '14:07:56.0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
