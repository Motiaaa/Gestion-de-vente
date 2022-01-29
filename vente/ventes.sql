-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 jan. 2022 à 17:15
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ventes`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_catg` int(11) NOT NULL,
  `libelle` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_catg`, `libelle`) VALUES
(10, 'bureautique'),
(20, 'informatique'),
(30, 'accessoire'),
(40, 'autillage'),
(50, 'divers');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `prenom` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `adresse` varchar(120) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `tel` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `salaire` decimal(8,2) DEFAULT NULL,
  `sexe` char(1) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `adresse`, `email`, `tel`, `salaire`, `sexe`) VALUES
(3001, 'BADR', 'JAAD', 'PARIS', 'olivier@gmail.com', '723333333', '9500.00', 'm'),
(3002, 'ZOHIR', 'MED', 'NICE', 'jeff@gmail.com', '682222222', '1700.00', 'M'),
(3003, 'HAMID', 'MAN', 'PARIS', 'elina@gmail.com', '141111111', '9000.00', 'F'),
(3006, 'ASMAE', 'MOTIAA', 'CASA', 'asmae@a.com', '932277722', '4000.00', 'F'),
(3007, 'KHALID', 'MOTIAA', 'CASAA', 'a@a.com', '677665544', '1000.00', 'M'),
(3029, 'NAAIM', 'NAWFAL', 'FES', 'aa@aa.uu', '655662211', '1000.00', 'm');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `Qte` int(11) DEFAULT NULL,
  `datev` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_client`, `id_produit`, `Qte`, `datev`) VALUES
(3002, 507, 3, '2022-01-09 16:26:00'),
(3006, 507, 7, '2022-01-09 16:33:00'),
(3007, 507, 1, '2022-01-09 16:33:00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL,
  `libelle` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `prix_unit` decimal(8,2) DEFAULT NULL,
  `id_catg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_produit`, `libelle`, `prix_unit`, `id_catg`) VALUES
(501, 'LAPTOP', '6000.00', 10),
(503, 'CAMERA', '1700.00', 20),
(504, 'BUREAU', '500.00', 10),
(505, 'CHAISE', '400.00', 10),
(506, 'TABLETTE', '1200.00', 20),
(507, 'PHONE', '9500.00', 50);

-- --------------------------------------------------------

--
-- Structure de la table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(40) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Déchargement des données de la table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`) VALUES
(1, 'othman', 'admin@admin.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(3, 'user', 'admin@admin.com', '12dea96fec20593566ab75692c9949596833adc9');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_catg`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id_client`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_catg` (`id_catg`);

--
-- Index pour la table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_catg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3030;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT pour la table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_catg`) REFERENCES `categories` (`id_catg`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
