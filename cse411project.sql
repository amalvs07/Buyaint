-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 04:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse411project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userid`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `productid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`, `productid`, `name`, `quantity`, `price`) VALUES
(10, 0, 12, 'T-shirt', 1, 350),
(13, 0, 14, 'New Shirt', 1, 600),
(16, 0, 15, 'mi note 8', 1, 20000),
(24, 4, 12, 'T-shirt', 1, 350),
(45, 5, 13, 'Shirt', 1, 400),
(90, 9, 12, 'ASIAN PAINT', 2, 350);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `shop_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `phone` int(20) NOT NULL,
  `totalproduct` varchar(100) NOT NULL,
  `totalprice` int(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `shop_id`, `name`, `address`, `phone`, `totalproduct`, `totalprice`, `status`) VALUES
(1, 7, 3, 'fredy', 'NEAR ALUVA STAND', 2147483647, '29', 1090, 'pending'),
(2, 9, 8, 'arjun', 'wdwefw4twef', 2147483647, '31 (30)', 8, 'pending'),
(3, 9, 2, 'arjun', 'Kattuparambil', 84848484, '12 (3)', 1, 'pending'),
(4, 9, 2, 'arjun', '', 0, '12 (1)', 350, 'pending'),
(5, 9, 4, 'arjun', 'Kattuparambil', 546334634, '18 (1)', 103, 'pending'),
(6, 9, 8, 'arjun', 'Kattuparambil', 234, '31 (3)', 810, 'pending'),
(7, 9, 4, 'arjun', 'Kattuparambil', 99, '18 (1)', 103, 'pending'),
(8, 8, 2, 'peter', 'Kattuparambil', 23234, '12 (5)', 0, 'pending'),
(9, 8, 3, 'peter', 'Kattuparambil', 2343, '25 (2), 26 (1)', 720, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `p_id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(100) NOT NULL,
  `mobnumber` int(100) NOT NULL,
  `txid` varchar(100) NOT NULL,
  `totalproduct` varchar(100) NOT NULL,
  `totalprice` int(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `p_id`, `name`, `address`, `phone`, `mobnumber`, `txid`, `totalproduct`, `totalprice`, `status`, `created_at`) VALUES
(4, 3, 0, 'ashiqur', 'dhaka', 5655, 5996, 'asd415adf4', '13 (1) ', 400, 'Confirmed', '2022-09-04 18:18:17.725537'),
(5, 7, 0, 'fredy', '', 0, 0, '', '18 (1) , 25 (1) ', 343, 'Confirmed', '2023-08-18 03:51:44.906640');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `Price` int(100) NOT NULL,
  `imgname` varchar(100) NOT NULL,
  `shop_id` int(5) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `catagory`, `description`, `quantity`, `Price`, `imgname`, `shop_id`, `status`) VALUES
(12, 'ASIAN PAINT', 'royale', 'good', 6, 350, 'qq.png', 2, 1),
(13, 'ROYALE GLITE', 'glite', 'good', 41, 400, 'image.png', 3, 1),
(14, 'ROYALE MATTE', 'matte', 'good', 64, 600, 'aaa.png', 4, 1),
(18, 'ASIAN ROYALE', 'mattte', 'for safety', 78, 103, 'ff.png', 4, 1),
(19, 'ASIAN PAINT ROYALE ', 'INTERIOR', 'WHITE PAINT ROYALE HEALTH SHIELD', 20, 250, 'image (1).png', 4, 1),
(25, 'ASIAN PAINT ROYALE ', 'ASIAN', 'WHITE PAINT ROYALE HEALTH SHIELD', 74, 240, 'image (1).png', 3, 1),
(26, 'ASIAN PAINT ROYALE ', 'ASIAN', 'WHITE PAINT ROYALE HEALTH SHIELD', 19, 240, 'image (1).png', 3, 1),
(29, 'Berger', 'silk', 'berger silk', 198, 450, 'berger.png', 3, 1),
(31, 'Dulux', 'aqua tech', 'aqua blue tech', 22, 270, 'dulux aqua tech.png', 8, 1),
(32, 'blue paint', 'nippon paints', 'for safety', 20, 399, 'ghg.png', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(20) NOT NULL,
  `user_id` int(30) NOT NULL,
  `report_text` varchar(100) NOT NULL,
  `reply` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `user_id`, `report_text`, `reply`) VALUES
(1, 7, 'erergreg', ''),
(2, 9, 'pooooooooooooooooooo', '');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(5) NOT NULL,
  `shopownername` varchar(15) NOT NULL,
  `shopname` varchar(50) NOT NULL,
  `shopimage` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `shopownername`, `shopname`, `shopimage`, `address`, `phone`, `email`, `password`, `status`) VALUES
(1, 'Amal', 'PARATH PAINTS', 'shop_img/parath.jfif', 'Kattuparambil', '2525466262', 'amal@gmail.com', '202cb962ac59075', 'accepted'),
(2, 'Raju', 'RAINBOW COLOURS', 'shop_img/rc.jfif', 'BLAH', '2545', 'raju@gmail.com', '202cb962ac59075', 'accepted'),
(3, 'ATHUL KRISHNA', 'PARECKATTIL PAINTS', 'shop_img/pp.jpg', 'BLAH', '48458148', 'pop@gmail.com', '123', 'accepted'),
(4, 'Anil Kumar', 'FASHION PAINTS', 'shop_img/shpp.jfif', 'Kattuparambil', '949494498', 'anil@gmail.com', '12', 'accepted'),
(5, 'ARYAN', 'HINDUSTAN TRADERS', 'shop_img/shop.jpg', 'NEAR ALUVA STAND', '9874525124', 'ht@gmail.com', 'ht', 'accepted'),
(8, 'Peter', 'VARNAM PAINTS', 'shop_img/varnam.jpg', 'NEAR NEDUMBASSERY AIRPORT', '8745214796', 'varnam@gmail.com', '1111', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `pass`) VALUES
(1, 'Ami', 'vai', 'anik@gmail.com', 81),
(2, 'Ami', 'vai', 'anik98bc@gmail.com', 9),
(3, 'ashiqur', 'anik', 'ashiqur.anik25@gmail.com', 9),
(4, 'arif', 'vai', 'arif@gmail.com', 81),
(5, 'Amuy', 'jk', 'ima@gmail.com', 0),
(6, 'george', 'kt', 'geo@gmail.com', 12),
(7, 'fredy', 'wilson', 'fredy@gmail.com', 0),
(8, 'peter', 'p', 'peter@gmail.com', 11),
(9, 'arjun', 'a', 'a@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `order_ibfk_1` (`shop_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`shop_id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
