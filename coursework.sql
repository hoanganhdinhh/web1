-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2025 at 07:52 AM
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
-- Database: `coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Weather Forecast'),
(2, 'Science'),
(3, 'Education'),
(4, 'Health'),
(5, 'Sports'),
(6, 'Entertainment'),
(7, 'Technology'),
(8, 'Politics'),
(9, 'Economy'),
(10, 'Lifestyle');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `category_id`, `title`, `content`, `image`, `date`) VALUES
(1, 3, 2, ' Fascinating Discoveries in Science', 'Explore new scientific breakthroughs that are shaping our understanding of the world — stay curious and informed!', 'science.png', '2025-04-09 05:01:22'),
(4, 1, 1, 'Ho Chi Minh, Vietnam 14 day weather forecast', 'Ho Chi Minh Extended Forecast with high and low temperatures ... Passing showers. Overcast. Feels Like: 98 °F. Humidity: 55%. Precipitation: Rain: 0.07 ...', 'weather.png', '2025-01-03 13:13:25'),
(37, 3, 10, 'Energy-Saving Tips for Your Home', 'Discover simple and effective ways to reduce energy usage at home — saving money and helping the environment!', 'lifestyle.png', '2025-04-27 07:03:40'),
(38, 7, 3, 'Tips for Smarter Learning', 'Discover strategies to enhance your study habits and boost your knowledge — education made easier and more fun!', 'education.png', '2025-04-28 12:17:29'),
(39, 1, 4, ' Simple Ways to Boost Your Health', 'Learn effective tips for a healthier lifestyle — small changes today can make a big difference tomorrow!', 'health.png', '2025-04-28 12:18:39'),
(40, 8, 8, 'Key Updates in Politics', 'Stay informed with the latest political news, insights, and events shaping the future of our society!', 'politics.png', '2025-04-28 12:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `user_image`, `role`) VALUES
(1, 'Administrator', 'admin', 'admin@hoanganhdinh.cloud', '$2y$10$hJCXWqOGvfAsgB3xUwOs2uwahY6Ch/DdcG2mrw1N2ftmPEJyANldq', 'admin.jpg', 'admin'),
(3, 'Hoàng Anh Đinh', 'hoanganhdinh', 'dinhnguyenhoanganh2005@gmail.com', '$2y$10$4BbnrLnImegGRiX/4f5D7uxQBZEjrsJNWNhp/hqxoNdant5B3z.vy', 'hoanganh.jpg', 'user'),
(7, 'Nguyễn Văn A', 'vana', 'vana@hoanganhdinh.cloud', '$2y$10$xujy/W4gPWpAzjPMfOyGourAfZhEcY2VyhQsA.bX2Vbf2KoABIaj.', 'nguyenvana.png', 'admin'),
(8, 'Nguyễn Văn B', 'vanb', 'vanb@hoanganhdinh.cloud', '$2y$10$f9912ugviucQ90q5Ib0HHugQeYGQMRuua2KjNVU41kUvubelhExFy', 'nguyenvanb.png', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
