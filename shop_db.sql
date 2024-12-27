-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 déc. 2024 à 12:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `motpass` varchar(20) DEFAULT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `email`, `motpass`, `name`) VALUES
(1, 'ayariayari954@gmail.com', 'root', 'Ayari Ahmed');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `image`, `quantity`, `product_id`) VALUES
(3793, 12, 'Barre de son 2.1 canaux +caisson de basses sans fil /Noir', '355.00', 'son1.jpg', 1, 1),
(3796, 16, 'iPhone 13 / 5G / 4 Go / 128 Go', '3199.00', 'appl1.jpg', 1, 1),
(3797, 16, 'iPhone 14 Plus / 5G / 128 Go', '3579.00', 'appl2.jpg', 1, 2),
(3799, 17, 'iPhone 13 / 5G / 4 Go / 128 Go', '3199.00', 'appl1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cartes_bancaires`
--

CREATE TABLE `cartes_bancaires` (
  `id` int(11) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cartes_bancaires`
--

INSERT INTO `cartes_bancaires` (`id`, `card_name`, `card_number`, `expiry_date`, `cvv`, `created_at`) VALUES
(1, 'ayari', '1234 **** **** 1234', '2024-08-01', '999', '2024-11-21 15:30:21'),
(2, 'yasmine', '1111 **** **** 4444', '2024-07-01', '654', '2024-11-21 17:17:47'),
(3, 'Aa', '5555 **** **** 5555', '2024-11-01', '666', '2024-12-03 20:11:55'),
(4, 'Aa', '5555 **** **** 5555', '2024-11-01', '666', '2024-12-03 20:13:48'),
(5, 'Aa', '5555 **** **** 5555', '2024-11-01', '666', '2024-12-03 20:14:16'),
(6, 'Ayari ', '5555 **** **** 5555', '2024-07-01', '555', '2024-12-06 12:04:16');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Smartphone'),
(2, 'Tablette tactile'),
(3, 'Ordinateur'),
(4, 'Vidéo projecteurs'),
(5, 'Téléviseurs'),
(6, 'Appareils Photos'),
(7, 'SON'),
(9, 'SmartWatch'),
(10, 'Imprimantes');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `email`, `message`, `date`) VALUES
(1, 'ahmed', 'ayariayar954@gmail.com', 'aaaaaaaaaa', '2024-11-20 16:55:07'),
(2, 'Ayaroo', 'ayariayari954@gmail.com', 'asslema', '2024-12-03 20:00:26'),
(3, 'SLIMEN', 'ayariayari954@gmail.com', 'TRKUY', '2024-12-06 12:05:09');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `category_id`) VALUES
(1, 'iPhone 13 / 5G / 4 Go / 128 Go', 3199.00, 'appl1.jpg', 1),
(2, 'iPhone 14 Plus / 5G / 128 Go', 3579.00, 'appl2.jpg', 1),
(3, 'iPhone 14/ 5G / 128 Go /', 3574.00, 'appl3.jpg', 1),
(4, ' Apple iPhone 14 / 5G / 128 Go /', 4558.00, 'appl4.jpg', 1),
(5, 'infinix smart 8 HD / 2 GO / 64 GO', 255.00, 'infi1.jpg', 1),
(6, 'Infinix SMART 9 4G / 3 Go / 64 Go /', 366.00, 'infi2.jpg', 1),
(7, 'Infinix SMART 9 4G / 4 Go / 128 Go', 478.00, 'infi3.jpg', 1),
(8, ' Infinix HOT 50i 4G / 6 Go / 128 Go ', 499.00, 'infi4.jpg', 1),
(9, 'Oppo A3x / 4 Go / 128 GO ', 499.00, 'oppo1.jpg', 1),
(10, 'Oppo A38 / 4G / 4 Go / 128 Go /', 458.00, 'opp2.jpg', 1),
(11, 'OPPO A60 / 4G / 8 GO / 128 GO', 785.00, 'opp3.jpg', 1),
(12, 'Oppo A78 / 4G / 8 Go / 256 Go', 800.00, 'oppo4.jpg', 1),
(16, 'iPad Apple 10.2 Wifi / 32 Go / Gold', 1355.00, 'tapp1.jpg', 2),
(17, 'Apple iPad Air 11/8 Go /128 Go / WiFi /  ', 1554.00, 'tapp2.jpg', 2),
(18, 'Tablette Lenovo Onglet M10 3e génération', 99.00, 'tlenovo.jpg', 2),
(19, 'Tablette Samsung Galaxy Tab A7', 400.00, 'tsum1.jpg', 2),
(20, 'TABLETTE SAMSUNG A9 4G / 4 Go / 64 Go', 500.00, 'tsum2.jpg', 2),
(21, 'Tablette Graphique XP-PEN', 123.00, 'tgr1.jpg', 2),
(22, 'Tablette Graphique Intuos Wacom Petite', 200.00, 'tgr2.jpg', 2),
(23, 'Tablette IPRODA T1085P4LE 10.1\" 4G / 4 Go / 128', 198.00, 'tbm.jpg', 2),
(31, 'Pc de Bureau Gamer LITE / Ryzen 5 5600GT', 988.00, 'pcg1.jpg', 3),
(32, 'Setup Gamer Special Pc de Bureau Gaming', 999.00, 'pcg2.jpg', 3),
(33, 'Pc de Bureau LITE / Ryzen 5 5600GT ', 1547.00, 'pcg3.jpg', 3),
(34, 'Pc de Bureau Gamer LITE / Ryzen 5 3500X', 899.00, 'pcg4.jpg', 3),
(35, 'Setup Gamer Special Pc de Bureau Gaming', 687.00, 'pcg5.jpg', 3),
(36, 'PC de Bureau HP OMEN 45L Desktop GT22', 5487.00, 'pcgp1.jpg', 3),
(37, 'Pc de bureau Gamer Elite / Ryzen 7 7700X', 5999.00, 'pcgp2.jpg', 3),
(38, 'Pc de bureau Gamer WHITE TIGER / Ryzen 7', 6987.00, 'pcgp3.jpg', 3),
(46, 'Barre de son 2.1 canaux +caisson de basses sans fil /Noir', 355.00, 'son1.jpg', 7),
(47, 'Barre de son Sony USB et Bluetooth HT-S100F', 366.00, 'son2.jpg', 7),
(48, 'Barre de son JBL Bar 9.1 Sans Fil True ', 4557.00, 'son3.jpg', 7),
(49, 'Barre de son Harman Kardon Citation Multi', 3654.00, 'son4.jpg', 7),
(50, 'Barre de son Harman Kardon Citation Multi Beam 700 Compact', 2355.00, 'son5.jpg', 7),
(51, 'Barre de son THOMSON Bluetooth COSY', 499.00, 'son6.jpg', 7),
(52, 'JBL Bar 2.1 Deep Bass NOIR', 500.00, 'son7.jpg', 7),
(53, 'Imprimante CANON JET D\'ENCRE Multifonction', 429.00, 'imp1.jpg', 10),
(54, 'Imprimante HP 3en1 SMART TANK 520 COULEUR', 425.00, 'imp2.jpg', 10),
(55, 'Imprimante Monofonction à réservoir intégré', 450.00, 'imp3.jpg', 10),
(56, 'Imprimante HP 3en1 SMART TANK 581 COULEUR ', 489.00, 'imp4.jpg', 10),
(57, 'Imprimante Multifonction Jet d\'encre Tout-en-un HP Smart Tank 615', 480.00, 'imp5.jpg', 10),
(58, 'Imprimante à réservoir intégré 3 en 1 CANON', 1255.00, 'imp6.jpg', 10),
(59, 'Imprimante à réservoir intégré A3+ Epson ITS', 1600.00, 'imp7.jpg', 10),
(60, 'Imprimante Multifonction à réservoirs d\'encre', 1755.00, 'imp8.jpg', 10),
(69, 'tel1', 100.00, 'appl1.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`) VALUES
(16, 'Ayari', 'ayariayari954@gmail.com', '63a9f0ea7bb98050796b649e85481845'),
(17, 'slimen', 'slimen@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartes_bancaires`
--
ALTER TABLE `cartes_bancaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3800;

--
-- AUTO_INCREMENT pour la table `cartes_bancaires`
--
ALTER TABLE `cartes_bancaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT pour la table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
