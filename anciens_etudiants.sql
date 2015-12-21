-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 19 Décembre 2015 à 22:03
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `anciens_etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idEtud` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `statut` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`idEtud`, `login`, `password`, `statut`) VALUES
(1, 'maxime', 'ff37274ce33e4fca0e200c74f6d89b63', 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `listeDiffusion` tinyint(1) DEFAULT NULL,
  `demandeEmail` tinyint(1) DEFAULT NULL,
  `idEtud` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Etudiant_id` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `infoetudiant`
--

CREATE TABLE IF NOT EXISTS `infoetudiant` (
  `id` int(11) NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `ville` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `fixe` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `parcourspro`
--

CREATE TABLE IF NOT EXISTS `parcourspro` (
  `id` int(11) NOT NULL,
  `occupEmploi` tinyint(1) DEFAULT NULL,
  `emploi` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `typeContrat` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `entreprise` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `adresse` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `secteurActivite` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `passage`
--

CREATE TABLE IF NOT EXISTS `passage` (
  `id` int(11) NOT NULL,
  `anneeEntre` year(4) DEFAULT NULL,
  `anneeSortie` year(4) DEFAULT NULL,
  `cursus` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `poursuiteetudes`
--

CREATE TABLE IF NOT EXISTS `poursuiteetudes` (
  `id` int(11) NOT NULL,
  `formation` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `anneeFormation` year(4) DEFAULT NULL,
  `discipline` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_id` FOREIGN KEY (`idEtud`) REFERENCES `compte` (`idEtud`);

--
-- Contraintes pour la table `infoetudiant`
--
ALTER TABLE `infoetudiant`
  ADD CONSTRAINT `FK_InfoEtudiant_id` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `parcourspro`
--
ALTER TABLE `parcourspro`
  ADD CONSTRAINT `FK_ParcoursPro_id` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `FK_Passage_idEtud_Passage` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `poursuiteetudes`
--
ALTER TABLE `poursuiteetudes`
  ADD CONSTRAINT `FK_PoursuiteEtudes_id` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
