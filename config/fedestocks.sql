-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 09 juil. 2023 à 23:48
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fedestocks`
--

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `identifiant` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `quantite` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fait_le` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fait_a` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `par_utilisateur` int NOT NULL,
  PRIMARY KEY (`identifiant`),
  KEY `produit_utilisateur_fk` (`par_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`identifiant`, `nom`, `quantite`, `fait_le`, `fait_a`, `par_utilisateur`) VALUES
(1, 'raviolis', '25 conserves', '2023-07-10 01:38:02', 'Toulon', 1),
(2, 'thon', '150 conserves', '2023-07-10 01:39:23', 'La Garde', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `identifiant` int NOT NULL AUTO_INCREMENT,
  `prenom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `mot_de_passe` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'visiteur',
  PRIMARY KEY (`identifiant`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`identifiant`, `prenom`, `nom`, `email`, `mot_de_passe`, `role`) VALUES
(1, 'Clément', 'FAVAREL', 'clmt.fvrl@gmail.com', '$2y$10$eF9WbN48zlAB/cCcbddHBOkQ6cOqoP2wa8R1TFEPHG8ZGe.nirhQu', 'visiteur'),
(2, 'Elise', 'Mongas', 'elise.mongas@gmail.com', '$2y$10$RZ5D95A9TPml68JkgwMGUuY1bTxScT/ntVYdTXUJzEKTrf0Zw5Jqi', 'visiteur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_utilisateur_fk` FOREIGN KEY (`par_utilisateur`) REFERENCES `utilisateur` (`identifiant`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
