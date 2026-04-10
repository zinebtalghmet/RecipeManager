-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2026 at 05:34 PM
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
-- Database: `recipe-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Entrées'),
(2, 'Plats'),
(3, 'Desserts'),
(4, 'Boissons'),
(6, 'Gateaux'),
(7, 'cakes'),
(10, 'Plat Principal'),
(11, 'Soupe'),
(12, 'Salade'),
(13, 'Pâtisserie'),
(14, 'Boisson');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `recipe_id`, `created_at`) VALUES
(1, 6, 22, '2026-04-10 15:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`, `created_at`) VALUES
(1, 6, 27, 2, '2026-04-10 15:14:20'),
(2, 6, 26, 5, '2026-04-10 15:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `ingredients` varchar(50) DEFAULT NULL,
  `instructions` varchar(200) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `portions` varchar(200) DEFAULT NULL,
  `prep_time` int(11) DEFAULT 0,
  `cook_time` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `ingredients`, `instructions`, `time`, `portions`, `prep_time`, `cook_time`, `user_id`, `cat_id`, `created_at`, `image`) VALUES
(22, 'Pastilla au Poulet', 'Poulet, oignon, amandes, oeufs, cannelle, sucre gl', 'Cuire le poulet effiloché avec oignons et épices. Monter en couches avec les feuilles de brick et amandes. Cuire au four 30 min.', '1h30', '8', 0, 0, 6, 1, '2026-04-10 14:52:10', 'recipe_69d914a076e0b.png'),
(21, 'Harira', 'Lentilles, pois chiches, tomates, oignon, celeri, ', 'Faire revenir oignon et celeri. Ajouter tomates et épices. Ajouter lentilles et pois chiches. Cuire 1h. Lier avec farine diluée.', '1h15', '6', 0, 0, 6, 11, '2026-04-10 14:52:10', 'recipe_69d914b2449c3.png'),
(20, 'Couscous Royal', 'Semoule, agneau, merguez, poulet, pois chiches, co', 'Cuire la viande avec les légumes dans un bouillon épicé. Préparer la semoule à la vapeur. Servir ensemble.', '2h', '6', 0, 0, 6, 10, '2026-04-10 14:52:10', 'recipe_69d914ba59ce9.png'),
(19, 'Tagine Poulet aux Olives', 'Poulet, olives vertes, citron confit, oignon, ail,', 'Faire revenir le poulet avec les épices. Ajouter les olives et le citron confit. Laisser mijoter 45 min.', '1h', '4', 0, 0, 6, 10, '2026-04-10 14:52:10', 'recipe_69d914c5149e4.png'),
(23, 'Zaalouk', 'Aubergines, tomates, ail, cumin, paprika, huile d\'', 'Griller les aubergines. Les écraser avec les tomates cuites et les épices. Servir froid avec du pain.', '35min', '4', 0, 0, 6, 12, '2026-04-10 14:52:10', 'recipe_69d914cdc1db3.png'),
(24, 'Briouates au Fromage', 'Feuilles de brick, fromage de chèvre, miel, sésame', 'Farcir les feuilles de brick avec le mélange fromage-miel. Plier en triangle. Frire jusqu\'à dorée.', '30min', '12', 0, 0, 6, 1, '2026-04-10 14:52:10', 'recipe_69d914d7cec00.png'),
(25, 'Rfissa', 'Msemen, lentilles, poulet, fenugrec, ras el hanout', 'Cuire le poulet avec les épices et lentilles. Émietter le msemen dans le plat. Verser la sauce dessus.', '1h30', '4', 0, 0, 6, 10, '2026-04-10 14:52:10', 'recipe_69d914e29c5bb.png'),
(26, 'Chebakia', 'Farine, sésame, anis, cannelle, beurre, eau de fle', 'Pétrir la pâte avec les épices. Former les fleurs. Frire et tremper dans le miel chaud. Saupoudrer de sésame.', '2h', '20', 0, 0, 6, 13, '2026-04-10 14:52:10', 'recipe_69d914ebdcefb.png'),
(27, 'Thé à la Menthe', 'Thé vert gunpowder, menthe fraîche, sucre, eau bou', 'Rincer le thé. Ajouter eau bouillante, sucre et menthe. Laisser infuser 3 min. Servir en versant de haut.', '10min', '4', 0, 0, 6, 14, '2026-04-10 14:52:10', 'recipe_69d914f5f2e88.png'),
(28, 'Sellou', 'Farine grillée, amandes, sésame, beurre, miel, can', 'Griller farine, sésame et amandes séparément. Mélanger avec beurre fondu, miel et épices. Former en dôme.', '45min', '10', 0, 0, 6, 3, '2026-04-10 14:52:10', 'recipe_69d914fe573fc.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
(5, 'rania', 'rania@gmail.com', '$2y$10$9c3qLbNBrUheTMdtt6FOROKahxsmIKGdZF4cQK2moRXjgPP9XhgRe'),
(6, 'ZINEB TALGHMET', 'zineb@gmail.com', '$2y$10$ZcqtUYMx4CnsfC5fFv2V0evopSHGz4qW3zCzxdwn7i.Mz0jPZ9ci.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_fav` (`user_id`,`recipe_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_rating` (`user_id`,`recipe_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
