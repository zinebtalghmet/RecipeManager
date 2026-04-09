-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 11:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Entrées'),
(2, 'Plats'),
(3, 'Desserts'),
(4, 'Boissons');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `ingredients` varchar(50) DEFAULT NULL,
  `instructions` varchar(200) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `portions` varchar(200) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `ingredients`, `instructions`, `time`, `portions`, `user_id`, `cat_id`, `created_at`) VALUES
(1, 'Salade Marocaine', 'Tomates, Concombre, Oignon, Huile d’olive', 'Couper les légumes et mélanger', '10 min', '2', 1, 1, '2026-04-07 12:11:00'),
(2, 'Tajine Poulet', 'Poulet, Citron, Olives', 'Cuire le poulet avec les épices', '1h30min', '4', 1, 2, '2026-04-07 12:11:00'),
(3, 'Crêpes', 'Farine, Lait, Œufs', 'Mélanger et cuire dans une poêle', '30min', '3', 2, 3, '2026-04-07 12:11:00'),
(4, 'sdfghjklm', 'mlkjhg', '', 'qsdfghjklmù', 'tyuiop', NULL, 0, '2026-04-08 09:53:11'),
(5, 'gggggggggg', 'nnnnnnnnnnnnnnnnnnnnnn', '', 'jjjjjjjjjjjjjjjjj', 'rrrrrrrrrrrrrrr', NULL, 0, '2026-04-08 09:54:24'),
(6, 'llllllllll', '', '', 'nnnnnnnn', '', NULL, 0, '2026-04-08 10:03:57'),
(7, 'hhhhhhhhh', 'ffffffffff', '', 'ggggggggggg', 'fffffffff', NULL, 0, '2026-04-09 09:05:15'),
(8, 'hhhhhhhhh', 'ffffffffff', '', 'ggggggggggg', 'fffffffff', NULL, 0, '2026-04-09 09:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'maroua', 'maroua@gmail.com', '123456'),
(2, 'sara', 'sara@gmail.com', '123456'),
(3, 'reda', 'reda@gmail.com', '567890'),
(4, 'hamza', 'hamza@gmail.com', '$2y$10$87Zjw2puQh1gOLIxvPIRAuolTs84B6UspVtQ8wQjXNh0tGJwH/Fvq'),
(5, 'rania', 'rania@gmail.com', '$2y$10$9c3qLbNBrUheTMdtt6FOROKahxsmIKGdZF4cQK2moRXjgPP9XhgRe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
