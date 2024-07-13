-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 11:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_products`
--

CREATE TABLE `customer_products` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_products`
--

INSERT INTO `customer_products` (`id`, `customer_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 5, '2024-07-13 09:48:01', '2024-07-13 09:48:01'),
(2, 1, 13, 7, '2024-07-13 09:48:27', '2024-07-13 09:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `prod_description` text NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `prod_description`, `prod_qty`, `prod_price`) VALUES
(7, 'Smartphone', 'High-end smartphone with advanced features', 100, 999.99),
(8, 'Laptop', 'Powerful laptop for professional use', 50, 1499.99),
(9, 'Smartwatch', 'Fitness and health tracking smartwatch', 200, 299.99),
(10, 'Tablet', 'Compact tablet for entertainment and productivity', 80, 499.99),
(11, 'Headphones', 'Noise-canceling headphones with premium sound', 150, 199.99),
(12, 'Smart Speaker', 'Voice-controlled smart speaker for home use', 120, 129.99),
(13, 'Camera', 'Professional-grade digital camera with 4K recording', 18, 899.99),
(14, 'Gaming Console', 'Next-generation gaming console with VR capabilities', 70, 399.99),
(15, 'Router', 'High-speed wireless router for home and office', 90, 149.99),
(16, 'External Hard Drive', 'Portable external hard drive for secure storage', 180, 79.99);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_table`
--

CREATE TABLE `user_login_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login_table`
--

INSERT INTO `user_login_table` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', '1234', 'admin'),
(2, 'customer', '1234', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_products`
--
ALTER TABLE `customer_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_login_table`
--
ALTER TABLE `user_login_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_products`
--
ALTER TABLE `customer_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_login_table`
--
ALTER TABLE `user_login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
