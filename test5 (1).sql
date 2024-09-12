-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 mai 2024 à 21:35
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `test5`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `idcart` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `Idclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`idcart`, `Name`, `price`, `img`, `quantity`, `Idclient`) VALUES
(32, 'Fondation', '64.00', 'nars.jpg', 1, 14);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`CategoryID`, `Name`) VALUES
(1, 'Makeup'),
(2, 'Hair'),
(3, 'Nails'),
(4, 'Perfum');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` char(30) NOT NULL DEFAULT 'U',
  `idclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`username`, `password`, `nom`, `prenom`, `email`, `type`, `idclient`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin', 'A', 4),
('fatiha', '5555', 'aitmohamed', 'salma', 'salmaiatmohamed@gmail.com', 'U', 13),
('salma', '1234', 'asmaeee', 'ennaim', 'salmaen@gmail.com', 'U', 14),
('salma', '1234', 'salma ', 'ennaim', 'salmaen@gmail.com', 'U', 15),
('salma', '1234', 'salma ', 'ennaim', 'salmaen@gmail.com', 'U', 16),
('salma', '1234', 'salma ', 'ennaim', 'salmaen@gmail.com', 'U', 18),
('fati', 'fatifati', 'ennaim', 'fatimazahra', 'ennfati97@gmail.com', 'U', 20),
('khadija', '1234', 'ennaim', 'khadija', 'khadija@gmail.com', 'U', 21),
('khadija', '$2y$10$EKjF6vmiDzgJlzzgGpP8UOd', 'ennaim', 'khadija', 'khadija@gmail.com', 'U', 22),
('salma', '$2y$10$22rOb.URvpBUEz4kdWbn6eO', 'ennaim', 'salma', 'salma12@gmail.com', 'U', 23),
('salma', '$2y$10$taSeDo/9KU1xJZCoVk.eaev', 'ennaim', 'salma', 'salma1s@gmail.com', 'U', 24),
('salma', '$2y$10$KqKvoRby8KWo8SH/rg8bw.8', 'ennaim', 'salma', 'salma44@gmail.com', 'U', 25),
('salma', '$2y$10$simrXNegS8S/soH6ooMMG.r', 'ennaim', 'salma', 'salma55@gmail.com', 'U', 26),
('salma', '$2y$10$r.ralUT0eVZgV5BJ51Fueeu', 'ennaim', 'salma', 'salma66@gmail.com', 'U', 27),
('salma', '$2y$10$MdMR5dinMs5Cyk0tEkw.Wue', 'ennaim', 'salma', 'salma77@gmail.com', 'U', 28),
('salma', '$2y$10$4kn3QVPRratsxzymHIZcd.l', 'ennaim', 'salma', 'salma88@gmail.com', 'U', 29),
('salma', '$2y$10$a.axwcfirKqxzTySrAwvROw', 'ennaim', 'salma', 'salma99@gmail.com', 'U', 30),
('bouchra', '$2y$10$DdTnari1jsUzm1qxNBb.7.k', 'chgar', 'bouchra', 'bochrra@gmail.com', 'U', 31),
('', '$2y$10$LTcTs54AHi8ISmnETa/AMe3', '', '', '', 'U', 32),
('fati', '$2y$10$HLfKPH2ORUUl.rvRKsTf4Ol', 'ennaim', 'sfati', 'ennfati@gmail.com', 'U', 33),
('bouchra', '$2y$10$St/7FE4cFS3osd5qAi439uL', 'chgar', 'bouchra', 'bouch12@gmail.com', 'U', 34);

-- --------------------------------------------------------

--
-- Structure de la table `contactform`
--

CREATE TABLE `contactform` (
  `ID` int(11) NOT NULL,
  `idclient` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `SubmissionDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(1, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(2, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(3, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(4, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(5, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(6, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(7, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(8, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(9, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(10, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(11, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(12, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(13, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(14, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(15, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(16, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(17, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(18, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(19, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(20, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(21, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '940'),
(22, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),gloss(1),Lifter Gloss(1),La Vie Est B', '876'),
(23, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),gloss(1),Lifter Gloss(1)', '860'),
(24, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1)', '94'),
(25, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1),elvive(1)', '99'),
(26, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1),Lite Pink(1),elvive(1),YSL-Pop-Water-', '113'),
(27, 'salma ennaim', 'salmaen@gmai', 'Credit Cart', 'casa', 'Maroc', 'ejb.gfhj', 12356, 'Fondation(1)', '64');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Mark` varchar(100) NOT NULL,
  `Description` text DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `img` varchar(150) NOT NULL,
  `stock` int(11) NOT NULL,
  `statut` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Price`, `Mark`, `Description`, `CategoryID`, `img`, `stock`, `statut`, `date`) VALUES
(13, 'Lite Pink', 30.00, 'MAC', 'pink,rose deep,orange,brown', 1, 'lip.jpg', 0, '', '2024-04-27 14:03:52'),
(14, 'Fondation', 64.00, 'NARS', 'Natural Radiant LongWear Foundation - Medium 2 Santa Fe', 1, 'nars.jpg', 0, '', '2024-04-27 14:23:58'),
(15, 'Lifter Gloss', 100.00, 'Maybelline', 'Maybelline Lifter Gloss: Our Candy Drop edition lip glosses are formulated with hyaluronic acid to visibly smooth lip surface and enhance lip contour. Drench lips with this high shine lip gloss for hydrated, fuller-looking lips Next Level Shine: Transform your lips in one easy swipe of lip color with the XL wand applicator that evenly dispenses Lifter Gloss into a smooth, super-shiny finish', 1, 'Maybelline.jpg', 0, 'Available', '2024-04-27 14:30:58'),
(16, 'La Vie Est Belle Silky', 16.00, 'Lancôme', ' pour femme', 2, 'lancome.jpg', 0, 'Available', '2024-04-27 14:52:15'),
(25, 'elvive', 4.97, 'L\'Oreal Paris ', 'L\'Oreal Paris Elvive Hyaluron Plump 72H Hydrating Shampoo', 2, 'packsins.jpg', 0, 'Available', '2024-05-05 01:16:15'),
(26, 'Kérastase ', 80.00, 'Kérastase ', 'pack Kérastase Chronologiste huile parfumée 100ml,Chronologiste masque 200ml,Chronologiste shampoing 250ml,Discipline Fluidealiste après-shampoing 200ml', 2, 'ker.jpg', 0, 'Available', '2024-05-05 01:23:08'),
(27, 'Kérastase Discipline Fluidealiste', 35.00, 'Kérastase', 'Kérastase Discipline Fluidealiste après-shampoing 200ml', 2, 'kerp.jpg', 0, 'Available', '2024-05-05 01:24:26'),
(28, 'J\'ADORE EAU DE PARFUM', 92.00, 'DIOR', 'A bouquet crafted to perfection, like a custom-made flower. The essence of ylang-ylang with its fruity-floral notes and the essence of Damascena rose from Turkey blend with a rare pair of Grasse grandiflorum jasmine and sambac from India, with fruity and voluptuous sensuality', 4, 'jador.jpg', 0, 'Available', '2024-05-05 01:33:12'),
(29, 'Poison', 185.60, 'Dior', 'You don\'t wear Hypnotic Poison, it wears you.\r\n\r\nWith the Hypnotic Poison Eau de Toilette, the house of Dior creates a modern perfume myth through a magnetic and sensual fragrance', 4, '01c714e79c3408b78e75398d09eb0059.jpg', 0, 'Available', '2024-05-05 01:36:13'),
(30, 'dior nail polish pink', 12.99, 'Dior', ' above are as about as close to perfect as we\'ve seen', 3, 'ndior.jpg', 0, 'Available', '2024-05-05 01:40:18'),
(31, 'chanel nail polish blue', 12.99, 'chanel', 'CHANEL LE VERNIS 179 LAGUNE LONGWEAR NAIL COLOUR POLISH LIMITED EDITION NEW 2024', 3, 'nchan.jpg', 0, 'Available', '2024-05-05 01:42:09'),
(32, 'Vernis à ongles', 11.99, 'Dior', 'Nail polish, manicure, and nail care: Dior nail products ensure the effects of a professional manicure with a flawless finish.', 3, 'vernis.jpg', 0, 'Available', '2024-05-05 01:46:16'),
(33, 'FlonFlons Nail Polish, NARS Holiday,red', 15.00, 'NARS', 'This year NARS has teamed up with photographer Sarah Moon to develop the NARS Holiday 2016 color collection.', 3, '5e2949ef6e2fcace15082fbe6bc69d6d.jpg', 0, 'Available', '2024-05-05 01:49:02'),
(34, 'YSL-Pop-Water-Laque-Couture-1', 13.50, 'YSL', 'pack ysl nail polish orange and fughsia rain', 3, '8583c525d9df68fa52f3e227a2fd3220.jpg', 0, 'Available', '2024-05-05 01:51:55'),
(35, 'bold high-gloss,GUCCI Nail', 12.00, 'GUCCI', 'bold high-gloss,Perfect for achieving stunning nail looks with a beautiful touch, it provides unparalleled coverage and long-lasting appearance, with a brush that fits all nail sizes to give you a gorgeous nail look', 3, 'ac7f9c40a513b8f57ccbf1b1ff5682b9.jpg', 0, 'Available', '2024-05-05 01:55:10'),
(36, 'MISS DIOR', 85.00, 'DIOR', 'MISS DIOR\r\nMiss Dior fragrances invite you to sublime olfactory walks, among oceans of multicolored petals and fragrant floral bouquets. They contain a precious gift from nature: a constantly reinvented promise of happiness.', 4, '1754e9872801174688b648500c03b6a2.jpg', 0, 'Available', '2024-05-05 02:00:19'),
(37, 'Prada', 54.00, 'Prada', 'Prada’s new refillable feminine fragrance is an invitation to explore and express the multiple dimensions of your identity. A celebration of being never the same, always yourself. \r\nDiscover a new floral ambery fragrance that embraces the paradoxes of iconic ingredients to re-invent a feminine classic', 4, '69ec59f509ef58e88b4cb7d7532b5683.jpg', 0, 'Available', '2024-05-05 02:04:17'),
(38, 'the only one,Dolice & Gabbana', 97.00, 'DOLICE & GABBANA', 'DOLCE & GABBANA THE ONLY ONE EAU DE PARFUM FOR WOMAN 200ml', 4, 'f7b2bbe0248186ec5683aa37e5e7c8c2.jpg', 0, 'Available', '2024-05-05 02:07:30'),
(39, 'Baccarat Rouge 540', 120.00, 'Maison Francis kurkdjan', 'Maison Francis kurkdjan,Baccarat Rouge 540 was born from the meeting of Maison Francis Kurkdjian and the Baccarat crystal factory, whose 250th anniversary this eau de parfum celebrates. THEwoody scentexudes a poetic alchemy, a graphic and extremely condensed olfactory signature', 4, '72c92be5e758c860ca65000b4162fe1e.jpg', 0, 'Available', '2024-05-05 02:10:57'),
(40, 'Youth Code', 28.00, 'L\'Oreal Paris ', ' stronger skin in 1 use. Formulated with 10% probiotic ferments + hyaluronic acid. Dermatologist validated, suits sensitive skin. Crack the code to stronger, healtier-looking skin with Revitalift Youth Code face serum', 2, 'c88e2095089bac9b70ed4facc483116d.jpg', 0, 'Available', '2024-05-05 02:17:27'),
(41, 'Pack TRESemmé', 350.00, 'TRESemmé', 'pack TRESemmé', 2, 'affaac28674a6b129c2fd09100110c03.jpg', 0, 'Available', '2024-05-05 02:19:00'),
(42, 'Lip liner', 12.00, 'Mac', ' formulas that glide on fluidly with a long-lasting finish', 1, 'd9111c525df0ba7871c9627d0f7d1893.jpg', 0, 'Available', '2024-05-05 02:23:56'),
(43, 'concealer nars', 14.00, 'NARS', 'ARS · Radiant Creamy Concealer - Custard 6ml · NARS · Radiant Custard Correcteur crémeux moyen 1,4 ml · NARS', 1, '749c0b67225ce845c09483b16ced2bd2.jpg', 0, 'Available', '2024-05-05 02:26:24'),
(44, 'LESSENCE Lash Princess', 9.99, 'LESSENCE', 'Mascara Lash Princess False Lash Effect Waterproof essence. 12 ml', 1, 'af4f8b3c4f9158ddb19a98580c78edef.jpg', 0, 'Available', '2024-05-05 02:28:51');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idcart`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idclient` (`idclient`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `idcart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `contactform`
--
ALTER TABLE `contactform`
  ADD CONSTRAINT `contactform_ibfk_1` FOREIGN KEY (`idclient`) REFERENCES `client` (`idclient`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
