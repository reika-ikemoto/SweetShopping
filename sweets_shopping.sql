-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 01:32 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sweets_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `customer_id`, `product_id`, `quantity`, `unit_price`) VALUES
(109, 10, 4, 5, 3),
(110, 10, 1, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_fee` int(11) NOT NULL,
  `gift_fee` int(11) NOT NULL,
  `discount` float NOT NULL,
  `total` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `delivery_fee`, `gift_fee`, `discount`, `total`, `date`) VALUES
(1, 1, 2, 0, 8.2, 32.8, '2021-03-11 00:00:00'),
(2, 1, 0, 0, 10.6, 42.4, '2021-03-11 00:00:00'),
(11, 2, 2, 0, 6.4, 25.6, '2021-03-14 08:29:30'),
(12, 2, 0, 0, 4.2, 16.8, '2021-03-14 16:39:26'),
(13, 1, 2, 0, 4.4, 17.6, '2021-03-15 11:34:55'),
(14, 1, 2, 3, 0, 7, '2021-03-16 00:01:51'),
(22, 1, 2, 3, 9.6, 38.4, '2021-03-17 11:49:15'),
(23, 1, 2, 0, 5.2, 20.8, '2021-03-17 12:15:59'),
(24, 1, 2, 3, 51, 204, '2021-03-17 13:30:14'),
(25, 1, 2, 3, 41, 164, '2021-03-18 12:19:46'),
(26, 1, 0, 3, 24.6, 98.4, '2021-03-18 12:40:25'),
(27, 1, 0, 0, 24, 96, '2021-03-18 13:07:12'),
(28, 1, 0, 3, 9, 36, '2021-03-19 00:26:26'),
(29, 4, 0, 3, 8.8, 35.2, '2021-03-21 22:21:10'),
(30, 4, 0, 3, 8.8, 35.2, '2021-03-21 22:23:35'),
(31, 4, 0, 3, 8.8, 35.2, '2021-03-21 22:24:36'),
(33, 4, 2, 0, 4.4, 17.6, '2021-03-21 22:34:46'),
(34, 4, 0, 3, 4.6, 18.4, '2021-03-21 22:35:49'),
(35, 4, 0, 3, 8.4, 33.6, '2021-03-21 22:37:49'),
(36, 4, 2, 0, 7.8, 31.2, '2021-03-21 23:57:15'),
(37, 1, 0, 3, 25.6, 102.4, '2021-03-22 11:51:16'),
(38, 1, 0, 3, 0, 18, '2021-03-22 12:04:39'),
(39, 1, 0, 3, 4.6, 18.4, '2021-03-22 13:31:57'),
(40, 1, 0, 0, 0, 15, '2021-03-23 11:28:03'),
(41, 1, 0, 3, 8.2, 32.8, '2021-03-23 11:28:42'),
(42, 1, 2, 0, 0, 17, '2021-03-23 11:29:09'),
(43, 1, 0, 3, 10, 40, '2021-03-24 00:29:04'),
(44, 1, 2, 0, 0, 17, '2021-03-24 00:33:01'),
(47, 1, 2, 0, 4, 16, '2021-03-24 00:39:01'),
(48, 1, 2, 3, 5.2, 20.8, '2021-03-24 10:18:50'),
(49, 1, 0, 3, 7, 28, '2021-03-24 11:10:11'),
(50, 1, 2, 3, 4, 16, '2021-03-24 11:10:30'),
(51, 1, 0, 0, 12, 48, '2021-03-24 11:10:47'),
(52, 1, 2, 0, 4, 16, '2021-03-24 11:11:02'),
(53, 1, 2, 0, 4.6, 18.4, '2021-03-24 11:11:22'),
(54, 1, 2, 0, 4, 16, '2021-03-24 12:32:32'),
(55, 4, 0, 3, 9.6, 38.4, '2021-03-24 12:33:29'),
(56, 1, 0, 0, 78, 312, '2021-03-25 11:44:20'),
(58, 1, 0, 3, 0, 9, '2021-03-25 12:18:26'),
(59, 1, 0, 3, 10.6, 42.4, '2021-03-25 12:20:35'),
(74, 1, 0, 3, 11.6, 46.4, '2021-03-25 13:12:20'),
(75, 1, 0, 3, 14, 56, '2021-03-26 00:05:25'),
(77, 9, 0, 3, 0, 19, '2021-03-26 01:39:22'),
(78, 10, 2, 0, 13.6, 54.4, '2021-03-26 10:34:47'),
(79, 11, 0, 3, 9, 36, '2021-03-26 11:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `unit_price`) VALUES
(1, 1, 2, 5, 5),
(2, 1, 3, 6, 3),
(4, 2, 1, 7, 5),
(5, 2, 2, 6, 3),
(25, 11, 1, 6, 5),
(26, 12, 2, 7, 3),
(27, 13, 4, 10, 2),
(28, 14, 1, 1, 5),
(41, 21, 1, 5, 5),
(42, 21, 7, 6, 3),
(44, 22, 1, 5, 5),
(45, 22, 7, 6, 3),
(47, 23, 7, 8, 3),
(48, 24, 1, 50, 5),
(49, 25, 1, 40, 5),
(50, 26, 7, 40, 3),
(51, 27, 7, 40, 3),
(52, 28, 5, 7, 6),
(53, 29, 5, 7, 6),
(54, 29, 0, 0, 0),
(55, 29, 2, 5, 3),
(56, 29, 4, 2, 3),
(58, 29, 3, 5, 4),
(59, 29, 2, 7, 3),
(60, 30, 5, 7, 6),
(61, 30, 0, 0, 0),
(62, 30, 2, 5, 3),
(63, 30, 4, 2, 3),
(64, 30, 0, 0, 0),
(65, 30, 3, 5, 4),
(66, 30, 2, 7, 3),
(67, 31, 5, 7, 6),
(68, 31, 0, 0, 0),
(69, 31, 2, 5, 3),
(70, 31, 4, 2, 3),
(71, 31, 0, 0, 0),
(72, 31, 3, 5, 4),
(73, 31, 2, 7, 3),
(74, 32, 5, 7, 6),
(75, 32, 0, 0, 0),
(76, 32, 2, 5, 3),
(77, 32, 4, 2, 3),
(78, 32, 0, 0, 0),
(79, 32, 3, 5, 4),
(81, 33, 5, 7, 6),
(82, 33, 0, 0, 0),
(83, 33, 2, 5, 3),
(84, 33, 4, 2, 3),
(85, 33, 0, 0, 0),
(86, 33, 3, 5, 4),
(88, 34, 5, 7, 6),
(89, 34, 0, 0, 0),
(90, 34, 2, 5, 3),
(91, 34, 4, 2, 3),
(92, 34, 0, 0, 0),
(93, 34, 3, 5, 4),
(95, 35, 5, 7, 6),
(96, 35, 0, 0, 0),
(97, 35, 2, 5, 3),
(98, 35, 4, 2, 3),
(99, 35, 0, 0, 0),
(100, 35, 12, 5, 3),
(101, 35, 3, 6, 4),
(102, 36, 5, 7, 6),
(103, 36, 0, 0, 0),
(104, 36, 2, 5, 3),
(105, 36, 4, 2, 3),
(106, 36, 0, 0, 0),
(107, 36, 1, 5, 5),
(108, 36, 5, 6, 2),
(109, 37, 5, 10, 6),
(110, 37, 2, 15, 3),
(111, 37, 4, 20, 3),
(112, 37, 1, 5, 5),
(113, 37, 4, 7, 3),
(116, 38, 1, 5, 5),
(117, 38, 4, 7, 3),
(118, 38, 1, 3, 5),
(119, 39, 1, 5, 5),
(120, 39, 4, 7, 3),
(121, 39, 7, 2, 3),
(122, 40, 1, 5, 5),
(123, 40, 4, 7, 3),
(124, 40, 4, 5, 3),
(125, 41, 1, 5, 5),
(126, 41, 4, 7, 3),
(127, 41, 7, 3, 10),
(128, 41, 9, 2, 4),
(132, 42, 1, 5, 5),
(133, 42, 4, 7, 3),
(134, 42, 2, 5, 3),
(135, 43, 1, 5, 5),
(136, 43, 4, 7, 3),
(137, 43, 1, 4, 8),
(138, 43, 12, 5, 3),
(142, 44, 1, 5, 5),
(143, 44, 4, 7, 3),
(144, 44, 4, 5, 3),
(145, 47, 2, 6, 3),
(146, 48, 3, 3, 4),
(147, 48, 2, 3, 3),
(149, 49, 2, 4, 3),
(150, 49, 9, 5, 4),
(152, 50, 13, 3, 5),
(153, 51, 7, 6, 10),
(154, 52, 2, 6, 3),
(155, 53, 12, 7, 3),
(156, 54, 3, 3, 6),
(157, 55, 1, 3, 5),
(158, 55, 4, 7, 3),
(160, 56, 16, 40, 9),
(161, 56, 3, 5, 6),
(166, 58, 4, 2, 3),
(167, 59, 7, 5, 10),
(192, 74, 1, 5, 8),
(193, 74, 2, 5, 3),
(195, 75, 16, 3, 9),
(196, 75, 1, 5, 8),
(199, 77, 1, 2, 8),
(200, 78, 3, 4, 6),
(201, 78, 14, 7, 6),
(203, 79, 1, 3, 8),
(204, 79, 12, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `unit_price` int(10) NOT NULL,
  `product_stock` int(10) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `unit_price`, `product_stock`, `img_url`, `description`) VALUES
(1, 'chocolate box', 8, 30, 'chocolate_box.jpg', 'This contains 5 pieces in a box'),
(3, 'cream puff', 6, 6, 'cream_puff.jpg', 'This contains 5 pieces in 1 set'),
(4, 'chocolate cookie', 3, 43, 'chocochip cookie.jpg', 'This contains 10 pieces in 1 set'),
(5, 'green tea cake', 2, 0, 'green tea cake.jpg', 'It has already cut into 8 pieaces'),
(12, 'spinich cake', 3, 37, 'spinich cake.jpg', 'This contains 2 pieces in 1 set'),
(13, 'waffle', 5, 117, 'waffle.jpg', 'This contains 5 pieces in 1 set'),
(14, 'macaroons', 6, 93, 'macaroons.jpg', 'This contains 5 pieces in 1 set'),
(15, 'tiramisu', 4, 80, 'tiramisu.jpg', 'This contains 3 pieces in 1 set'),
(16, 'cheese cake', 9, 2, 'cheese cake.jpg', 'This is for 2~3 people'),
(18, 'chocolate cake', 8, 50, 'cake-486874_640.jpg', 'This is for 1~2 people'),
(20, 'plain cookie', 5, 0, 'cookie.jpg', 'This contains 10 pieces in 1 set'),
(21, 'rose cake', 6, 50, 'StockSnap_ZURJJVB3DI.jpg', 'This is for 2~3 people'),
(22, 'donuts set', 6, 40, 'donuts.jpg', 'There are small(10) and large(4)');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `user_name`, `address`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Admin', 'admin', 'admin123', 'Japan', 'abc@mail.com', '11112222', '$2y$10$jMOKIyECGYgOAxsMWtDwmee0fbQck7a2C3aTZbAsjfb14CPdJ31tq', 'A'),
(2, 'John', 'Davis', 'JohnD', 'USA', 'john@mail.com', '2147483647', '$2y$10$tk0p2b9sKDtbhbWWk6NRzu7f0NpP4T9nUBse6NMedKndB0dVNGyl6', 'C'),
(3, 'John1', 'Davis1', 'John1D', 'China', 'john1@mail.com', '2147483647', '$2y$10$PmXCWBplDUVMpMutPXheNOT7kL1JV9bkFuEWdzffOka.zRyaRWt.a', 'C'),
(4, 'Ashly', 'Campbell', 'Ashly.C', 'Indonesia', 'ashly@mail.com', '5558888', '$2y$10$yarmI9JPS3OQBh.cjjBUxukPAnO8DFdc6KDsUovxQdnQgO1WPQdaW', 'C'),
(5, 'Jay', 'Ramirez', 'Jay.R', 'Thailand', 'jay@mail.com', '666888', '$2y$10$/a6ZRMuzkKXV31aU6Lg1eeAhCBqHmeZiyyMLR8x0r4bwr28zP4xi.', 'C'),
(7, 'Jimmie', 'Roberts', 'Jimmie.R', 'China', 'jimmie@mail.com', '08011112222', '$2y$10$YqRD0juV2t7dPZhYrNM7h.hvddeafQXWDIm6BdAomxvYwMsYhqRh2', 'A'),
(9, 'Seline', 'Scott', 'Seline.S', 'Indonesia', 'seline@mail.com', '', '$2y$10$w2XG0JBPUstj.aXU2M7HVe9xI3oeoZolHbuWOIyZo5GjgQs2cpBou', 'C'),
(10, 'Sophie', 'Turner', 'Sophie.T', 'Korea', 'sophine@mail.com', '', '$2y$10$8nAlce74rYzMdBiOxGCpkuA7p4ctC2A/vWpIUOK2zKJYfDVfCP.ty', 'C'),
(11, 'Emily', 'Lewis', 'Emily.L', 'Japan', 'emily@mai.com', '08011112222', '$2y$10$BjcE8.SkYzq29hC3l6zqCOj3jAk1da0gJXRq1iqGti04sUUukgY8m', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
