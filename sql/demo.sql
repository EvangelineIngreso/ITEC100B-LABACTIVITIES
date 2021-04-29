-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 01:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `id_code` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `created_at` datetime NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`id_code`, `user_id`, `code`, `created_at`, `expiration`) VALUES
(1, 1, '591037', '2021-04-24 22:14:47', '2021-04-24 22:19:47'),
(2, 1, '039482', '2021-04-24 22:15:19', '2021-04-24 22:20:19'),
(3, 1, '350896', '2021-04-25 15:27:18', '2021-04-25 15:32:18'),
(4, 2, '180723', '2021-04-25 22:52:05', '2021-04-25 22:57:05'),
(5, 1, '467590', '2021-04-26 14:57:15', '2021-04-26 15:02:15'),
(6, 1, '460529', '2021-04-26 15:34:01', '2021-04-26 15:39:01'),
(7, 3, '078629', '2021-04-26 16:15:34', '2021-04-26 16:20:34'),
(8, 4, '462710', '2021-04-26 16:48:45', '2021-04-26 16:53:45'),
(9, 4, '513029', '2021-04-26 16:50:15', '2021-04-26 16:55:15'),
(10, 5, '648709', '2021-04-26 17:05:23', '2021-04-26 17:10:23'),
(11, 5, '208543', '2021-04-26 17:34:55', '2021-04-26 17:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `eventlog`
--

CREATE TABLE `eventlog` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `transaction_type` varchar(255) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventlog`
--

INSERT INTO `eventlog` (`id`, `username`, `transaction_type`, `date`) VALUES
(1, 'admin', 'Registration', '2021-04-24 14:12:43'),
(2, 'admin', 'Login', '2021-04-24 14:14:50'),
(3, 'admin', 'Change Password', '2021-04-24 14:15:06'),
(4, 'admin', 'Login', '2021-04-24 14:15:22'),
(5, 'admin', 'Logout', '2021-04-24 14:15:25'),
(6, 'nichol.guasa@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-24 14:15:56'),
(7, 'nichol.guasa@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-24 14:18:36'),
(8, 'admin', 'Login', '2021-04-24 14:19:10'),
(9, 'admin', 'Logout', '2021-04-24 14:19:12'),
(10, 'nichol.guasa@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-25 07:26:38'),
(11, 'nichol.guasa@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-25 07:27:11'),
(12, 'admin', 'Login', '2021-04-25 07:27:20'),
(13, 'admin', 'Logout', '2021-04-25 07:27:22'),
(14, 'Eva', 'Registration', '2021-04-25 14:51:40'),
(15, 'Eva', 'Login', '2021-04-25 14:52:17'),
(16, 'Eva', 'Logout', '2021-04-25 14:52:27'),
(17, 'admin', 'Login', '2021-04-26 06:57:30'),
(18, 'admin', 'Change Password', '2021-04-26 07:01:46'),
(19, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 07:11:43'),
(20, 'nichol.guasa@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 07:39:36'),
(22, 'evaingreso', 'Registration', '2021-04-26 08:14:45'),
(23, 'evaingreso', 'Login', '2021-04-26 08:15:43'),
(24, 'evaingreso', 'Change Password', '2021-04-26 08:16:30'),
(25, 'evaingreso', 'Login', '2021-04-26 08:17:26'),
(26, 'evaingreso', 'Logout', '2021-04-26 08:17:34'),
(27, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 08:18:30'),
(28, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 08:20:31'),
(29, 'evangeline.ingreso@csu.edu.ph', 'Forget Password(Request)', '2021-04-26 08:25:58'),
(30, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 08:26:25'),
(31, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 08:26:57'),
(32, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 08:38:57'),
(33, 'ingresoeva', 'Registration', '2021-04-26 08:48:22'),
(34, 'ingresoeva', 'Login', '2021-04-26 08:48:53'),
(35, 'ingresoeva', 'Change Password', '2021-04-26 08:49:19'),
(36, 'ingresoeva', 'Login', '2021-04-26 08:50:24'),
(37, 'ingresoeva', 'Logout', '2021-04-26 08:50:34'),
(38, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 08:51:37'),
(39, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 08:52:26'),
(40, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 08:53:30'),
(41, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 08:54:04'),
(42, 'evangelineingreso', 'Registration', '2021-04-26 09:04:47'),
(43, 'evangelineingreso', 'Login', '2021-04-26 09:05:30'),
(44, 'evangelineingreso', 'Change Password', '2021-04-26 09:06:23'),
(45, 'evangelineingreso', 'Login', '2021-04-26 09:07:03'),
(46, 'evangelineingreso', 'Logout', '2021-04-26 09:07:11'),
(47, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 09:07:47'),
(48, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 09:08:39'),
(49, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 09:17:06'),
(50, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 09:17:47'),
(51, 'evangelineingreso', 'Login', '2021-04-26 09:35:03'),
(52, 'evangelineingreso', 'Logout', '2021-04-26 09:40:48'),
(53, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 09:41:05'),
(54, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Success)', '2021-04-26 09:41:57'),
(55, 'evangeline.ingreso@cvsu.edu.ph', 'Forget Password(Request)', '2021-04-26 09:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `forgetpass`
--

CREATE TABLE `forgetpass` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgetpass`
--

INSERT INTO `forgetpass` (`id`, `code`, `email`) VALUES
(3, '1608667ae658f2', 'evangeline.ingreso@cvsu.edu.ph'),
(6, '1608679160d00a', 'evangeline.ingreso@csu.edu.ph'),
(8, '160867c21299de', 'evangeline.ingreso@cvsu.edu.ph'),
(14, '160868b116c226', 'evangeline.ingreso@cvsu.edu.ph');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$ia84e4cItTrWOoXeZUuRNe4U1jkmaFnntTe7n/aZLSySB5EQAjjbS', 'nichol.guasa@cvsu.edu.ph', '2021-04-24 22:12:43'),
(2, 'Eva', '$2y$10$v9t47Dum.0YBT01pWtZggO7mg8BdTUlBvRPxduINj.97hJgHjwSSu', 'evangeline.ingreso@cvsu.edu.ph', '2021-04-25 22:51:40'),
(3, 'evaingreso', '$2y$10$v9t47Dum.0YBT01pWtZggO7mg8BdTUlBvRPxduINj.97hJgHjwSSu', 'evangeline.ingreso@cvsu.edu.ph', '2021-04-26 16:14:45'),
(4, 'ingresoeva', '$2y$10$8yGe8vijTYICWVdEN2zIae.9EVyaXQ1sJjYI5Ity5J8t8fn7ulzX.', 'evangeline.ingreso06@gmail.com', '2021-04-26 16:48:22'),
(5, 'evangelineingreso', '$2y$10$v9t47Dum.0YBT01pWtZggO7mg8BdTUlBvRPxduINj.97hJgHjwSSu', 'evangeline.ingreso@cvsu.edu.ph', '2021-04-26 17:04:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id_code`);

--
-- Indexes for table `eventlog`
--
ALTER TABLE `eventlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgetpass`
--
ALTER TABLE `forgetpass`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `eventlog`
--
ALTER TABLE `eventlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `forgetpass`
--
ALTER TABLE `forgetpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
