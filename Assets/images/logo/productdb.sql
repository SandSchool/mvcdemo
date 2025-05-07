-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 10:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `status` varchar(100) DEFAULT 'Đặt hàng',
  `total_amount` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `status`, `total_amount`) VALUES
(1, 3, '2025-04-22 10:55:17', 'Đặt hàng', 3049.96),
(2, 3, '2025-04-22 11:08:08', 'Đặt hàng', 1149.98),
(3, 3, '2025-04-22 11:09:57', 'Đặt hàng', 999.99),
(4, 1, '2025-04-15 10:00:00', 'Đặt hàng', 1200000.00),
(5, 1, '2025-04-19 14:20:00', 'Đã giao hàng', 800000.00),
(6, 1, '2025-04-20 09:15:00', 'Đặt hàng', 450000.00),
(7, 3, '2025-04-22 11:48:25', 'Đặt hàng', 2200.98),
(8, 3, '2025-04-22 13:13:07', 'Đặt hàng', 1899.98),
(9, 8, '2025-04-22 15:59:10', 'Đặt hàng', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 2, 1, 999.99),
(2, 1, 4, 1, 349.99),
(3, 1, 5, 1, 799.99),
(4, 1, 3, 1, 899.99),
(5, 2, 5, 1, 799.99),
(6, 2, 4, 1, 349.99),
(7, 3, 2, 1, 999.99),
(8, 7, 2, 1, 999.99),
(9, 7, 1, 1, 1200.99),
(10, 8, 2, 1, 999.99),
(11, 8, 3, 1, 899.99),
(12, 9, 4, 3, 349.99),
(13, 9, 1, 1, 1200.99),
(14, 9, 3, 1, 899.99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Id`, `Name`, `Price`, `Image`) VALUES
(1, 'Laptop Dell XPS 13', 1200.99, 'images/dell_xps13.jpg'),
(2, 'Apple iPhone 14', 999.99, 'images/iphone14.jpg'),
(3, 'Samsung Galaxy S23', 899.99, 'images/galaxy_s23.jpg'),
(4, 'Sony WH-1000XM5', 349.99, 'images/sony_headphones.jpg'),
(5, 'Microsoft Surface Pro 8', 799.99, 'images/surface_pro8.jpg'),
(12, '', 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `created_at`) VALUES
(1, 'user1', '$2y$10$.WmyW2D./6INWZ8K1IRNIOHwskqBck2XZjgl8iRwwmSirDT4CkKdC', 'TRAN HUU QUOC VAN', '2025-04-22 10:29:48'),
(2, 'user2', '$2y$10$5wqzzL7i9Df9q31yL8baAu7D.ipJMC/XFndVdmgrFrrTSWz7p9jg.', 'TRAN HUU QUOC VAN', '2025-04-22 10:37:53'),
(3, 'user3', '$2y$10$o6VBqPVu/MV6uPypcrw0PeGRUQCakyGey/4.O82uHFRFO0D.LCr6S', 'TRAN HUU QUOC VAN', '2025-04-22 10:38:57'),
(4, 'fdsfdsfds', '$2y$10$DEU4SHce7JsINqi9z2vMfenUiLDHvt7Mv5Ev91dVwNNhjHljurQxe', 'dádfs', '2025-04-22 14:03:17'),
(5, 'ádasda', '$2y$10$GY.Iy2uGEDi1pFV/sIyH2uvDvVk0/WZGECUUti0E5EDcLesuS1cj2', 'sadasdas', '2025-04-22 14:03:32'),
(6, 'van', '$2y$10$U2x20PTp4RrKT751Ep3Of.d4rOeUeHJyOpZuEdicNLXeAlaK3l/ra', 'van', '2025-04-22 14:19:14'),
(8, 'van1', '$2y$10$7w1pPrxW8Y91yihltbmN2OxSqyoNpG9vKWTaqWXudzXJa/mpXxlKC', 'van1', '2025-04-22 14:21:06'),
(9, 's02', '$2y$10$VNioKNbQyCfO2FRYLPbnW.tBNSx63RNug.OAA0zAEiEGDjG2dkdHu', 's02', '2025-04-26 09:50:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
