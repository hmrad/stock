-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 12:35 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `created_at`, `user_id`) VALUES
(19, 'kaghaz', '2023-02-18 18:11:30', 72),
(20, 'sang', '2023-02-18 18:15:34', 73),
(31, 'matini', '2023-02-19 01:45:39', 74);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `name`, `address`, `capacity`, `created_at`, `company_id`) VALUES
(12, 'kaghaz', 'teh', 0, '2023-02-18 18:11:38', 19),
(13, 'sang-1', 'tehran', 29, '2023-02-19 07:43:55', 20),
(14, 'sang-2', 'karaj', 98, '2023-02-19 00:07:02', 20),
(15, 'sangha', 'mashhad', 10, '2023-02-19 01:15:47', 20),
(16, 'sangdoosh', 'esfehan/iran', 93, '2023-02-19 00:07:19', 20),
(17, 'ahan', 'mashhad', 90, '2023-02-19 01:47:46', 31),
(18, 'ajor', 'bojnord', 60, '2023-02-19 01:48:27', 31);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `date_enter` timestamp NULL DEFAULT NULL,
  `date_exit` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `inventory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `price`, `capacity`, `date_enter`, `date_exit`, `created_at`, `inventory_id`) VALUES
(10, 'sangAli', 1000, 50, '2023-02-20 20:30:00', '2023-02-27 20:30:00', '2023-02-18 18:17:38', 13),
(11, 'sangmamad', 1000, 50, '2023-02-20 20:30:00', '2023-02-27 20:30:00', '2023-02-18 18:19:39', 13),
(12, 'dassa', 1234, 323, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-18 18:24:43', 13),
(13, 'sangpoi', 1000, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-18 18:25:19', 13),
(14, 'sangqwe', 1000, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-18 18:28:49', 13),
(15, 'stonenm', 100, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-18 18:32:58', 13),
(16, 'sangamooz', 100, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-18 19:27:10', 13),
(17, 'sangttt', 100, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-19 00:07:02', 14),
(18, 'sang,m', 100, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-19 00:07:19', 16),
(19, 'sangabi', 100, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2023-02-19 01:15:47', 15),
(20, 'ahanghoraze', 1000, 10, '2023-02-18 20:30:00', '2023-02-21 20:30:00', '2023-02-19 01:47:46', 17),
(21, 'ajorpare', 1000, 40, '2023-02-18 20:30:00', '2023-02-20 20:30:00', '2023-02-19 01:48:27', 18),
(22, 'sangvbn', 1000, 20, '2023-02-08 20:30:00', '2023-02-23 20:30:00', '2023-02-19 07:43:55', 13);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `created_at`) VALUES
(71, 'ali', 'ali@gmail.com', '$2y$10$C94BWB0vt9rRPXOfk.XaKOSQSlmdeuawnQJNlZeibLoyzVqRA2MHi', '2023-02-18 17:18:51'),
(72, 'mamad', 'mamad@gmail.com', '$2y$10$Q7u/v60RBEF86h/0Ksu3IeOxfF4F3kokOtBquMoesGt.1ESwIDGYK', '2023-02-18 17:22:11'),
(73, 'hosein', 'hosein@gmail.com', '$2y$10$u8fe.Z2xNRXvUJ0XhlmEpuhMGUGDPoD8UXPaib5P.5l.FbLmbJXz.', '2023-02-18 18:13:21'),
(74, 'matin', 'matin@gmail.com', '$2y$10$vrlCsZ95RxmZsn0AaN7nlud76Aim2spsuvpw3V1qd.zq/vdo9gS8S', '2023-02-19 01:19:34'),
(75, 'qwertyuio', 'wdefrgthyju', '$2y$10$J3TXb.saQiKMa3I66pgFse7ENynUNOHYebIaBWyplsrsTik/EKAc.', '2023-02-19 07:40:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `inventory_id` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
