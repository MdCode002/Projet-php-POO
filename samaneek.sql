-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 05 juin 2023 à 18:38
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `samaneek`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `IdAdmin` int(11) NOT NULL,
  `nomAdmin` varchar(30) NOT NULL,
  `telAdmin` int(11) NOT NULL,
  `emailAdmin` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `nomAdmin`, `telAdmin`, `emailAdmin`, `mdp`) VALUES
(1, 'Admin', 781605509, 'admin@admin.com', '$2y$10$EsR/hWIQUDS31WxxJ933QugY5X/xE1qk9a1LTp3wxVkahcUV2T/5K'),
(2, 'Mouhamed Diouf', 781605509, 'dioufmouhamed00222@gmail.com', '$2y$10$nl8PTmX1linpgfWpPXLte.YwnZyy74BYSbSqW3fFOIdGghET/pi.e'),
(3, 'Mouhamed Diouf', 781605509, 'dioufmouhamed002@gmail.com', '$2y$10$Eu7T/AocrzkkSFr.aJcJUe0nSSllV/v7M6Oue3JWOL2ZyKR4gO1zy'),
(4, 'Mouhamed Diouf', 781605509, 'dioufmouhadjdmed002@gmail.com', '$2y$10$y.LrJQD1cZMVmHsfHKyI4OREmFgYmgKOjZPNw2xhHcmSWVO2m6cCS');

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE `batiment` (
  `idBatiment` int(11) NOT NULL,
  `localisationBatiment` varchar(30) NOT NULL,
  `nomBatiment` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE `chambre` (
  `idChambre` int(11) NOT NULL,
  `nomChambre` varchar(30) NOT NULL,
  `Superficie` int(11) NOT NULL,
  `etageChambre` int(11) NOT NULL,
  `effectifMax` int(11) NOT NULL,
  `effectif` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`idChambre`, `nomChambre`, `Superficie`, `etageChambre`, `effectifMax`, `effectif`) VALUES
(1, 'none', 0, 0, 0, -4),
(2, 'Chambre 959', 5, 0, 4, 0),
(4, 'Chambre Iamois', 12, 2, 4, 3),
(5, 'Chambre 404', 12, 2, 6, 0),
(7, 'Chambre plaza', 10, 4, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `IdEtudiant` int(11) NOT NULL,
  `NomEtudiant` varchar(40) NOT NULL,
  `AgeEtudiant` int(11) NOT NULL,
  `TelEtudiant` int(11) NOT NULL,
  `Classe` varchar(30) NOT NULL,
  `emailEtudiant` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `Chambre` int(11) NOT NULL DEFAULT 1,
  `DemandeChambre` varchar(20) NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`IdEtudiant`, `NomEtudiant`, `AgeEtudiant`, `TelEtudiant`, `Classe`, `emailEtudiant`, `mdp`, `Chambre`, `DemandeChambre`) VALUES
(120333, 'Mouhamed Diouf', 0, 781605519, '2122E', 'dioufmouhamejhhd002@gmail.com', '$2y$10$sLGjJQF8mMckFV9XorEag.YADhwcvc0E4IyQMwc3EXWJwhoYtYQWm', 4, 'valider'),
(120393, 'Mouhamed Diouf', 0, 781605507, 'BIG2A', 'dioufmouhamenbd002@gmail.com', '$2y$10$V8.3QCmFLL8/LylnaVo9b.5TZXij9rDbnYKXMo2llnGqiKTFddXN.', 1, 'none'),
(210343, 'oumar sow', 0, 786543764, 'BIG1B', 'mouhamed002diouf@live.fr', '$2y$10$ldMno4QEV8.ImkrvVvrlqOrOEdU7zA9u8OyVW0hr1VVwadPcjIjJq', 4, 'valider'),
(211111, 'Mouhamed Diouf', 0, 781605509, '232323', 'dioufmouhamed0s02@gmail.com', '$2y$10$VUMUKueJhR7ZDVyT9bo5UuKHCcK3hO3QwnEbrSj/IgqruC.20V5gm', 1, 'rejeter'),
(219693, 'Mouhamed Diouf', 0, 781605509, 'BIG2A', 'dioufmouhamed002@gmail.com', '$2y$10$D0vxf4vCi.A2EfMeZL2aPOnH2jP1HtL26CtY4q6HtmxQ3BYaKXQ/W', 4, 'valider');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Index pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD PRIMARY KEY (`idBatiment`);

--
-- Index pour la table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`idChambre`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`IdEtudiant`),
  ADD KEY `Chambre` (`Chambre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `batiment`
--
ALTER TABLE `batiment`
  MODIFY `idBatiment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `chambre`
--
ALTER TABLE `chambre`
  MODIFY `idChambre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`Chambre`) REFERENCES `chambre` (`idChambre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
