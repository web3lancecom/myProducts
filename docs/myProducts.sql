-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 23 Juillet 2019 à 13:35
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `myProducts`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `title`, `createdAt`, `updatedAt`) VALUES
(1, 'Catégorie 1', '2019-07-23 10:27:34', '2019-07-23 10:27:34'),
(2, 'Catégorie 2', '2019-07-23 10:27:34', '2019-07-23 10:27:34');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `title` varchar(250) NOT NULL,
  `ean` varchar(100) NOT NULL,
  `isAvailable` tinyint(1) NOT NULL DEFAULT '1',
  `price` float NOT NULL DEFAULT '0',
  `picturePath` varchar(500) DEFAULT NULL,
  `categoryId` int(10) NOT NULL,
  `subCategoryId` int(10) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `products`
--

INSERT INTO `products` (`id`, `title`, `ean`, `isAvailable`, `price`, `picturePath`, `categoryId`, `subCategoryId`, `createdAt`, `updatedAt`, `quantity`) VALUES
(1, 'Combiotic - Lait bébé liquide 3 BIO, de 10 mois à 3 ans', '04062300092327', 1, 15.61, 'https://driveimg1.intermarche.com/fr/Ressources/images/produit/zoom/6C9A83ED46221A513458DC33630A7E94-hipp-biologique-combiotic---lait-bebe-liquide-3-bio-de-10-mois-a-3-ans.jpg', 1, 1, '2019-07-23 14:06:08', '2019-07-23 14:06:08', 100),
(2, 'Lait de suite en poudre Optima 2 BIO, dès 6 mois', '04062300092325', 1, 17.6, 'https://driveimg3.intermarche.com/fr/Ressources/images/produit/zoom/3771548124EED2FC5908E748155C368B-babybio-lait-de-suite-en-poudre-optima-2-bio-des-6-mois.jpg', 1, 2, '2019-07-23 14:06:08', '2019-07-23 14:06:08', 0);

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `categoryId` int(10) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `title`, `categoryId`, `createdAt`, `updatedAt`) VALUES
(1, 'sous catégorie 1 de 1', 1, '2019-07-23 10:33:01', '2019-07-23 10:33:01'),
(2, 'sous catégorie 2 de 1', 1, '2019-07-23 10:33:01', '2019-07-23 10:33:01'),
(3, 'sous catégorie 1 de 2', 2, '2019-07-23 10:33:01', '2019-07-23 10:33:01'),
(4, 'sous catégorie 2 de 2', 2, '2019-07-23 10:33:01', '2019-07-23 10:33:01');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subCategoryId` (`subCategoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`subCategoryId`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
