-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 31 Janvier 2016 à 15:57
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ancien_etudiants`
--

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `idCompte` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  `statut` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Structure de la table `etudiant`
--

CREATE TABLE IF NOT EXISTS `etudiant` (
  `idEtud` int(11) NOT NULL,
  `nom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `prenom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `adresse` varchar(75) COLLATE utf8_bin NOT NULL,
  `cp` varchar(25) COLLATE utf8_bin NOT NULL,
  `ville` varchar(50) COLLATE utf8_bin NOT NULL,
  `fixe` varchar(25) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(25) COLLATE utf8_bin NOT NULL,
  `mail` varchar(75) COLLATE utf8_bin NOT NULL,
  `emploi` varchar(50) COLLATE utf8_bin NOT NULL,
  `typeContrat` varchar(25) COLLATE utf8_bin NOT NULL,
  `entreprise` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresseEntreprise` varchar(75) COLLATE utf8_bin DEFAULT NULL,
  `secteurActivite` varchar(50) COLLATE utf8_bin NOT NULL,
  `anneeEntre` varchar(25) COLLATE utf8_bin NOT NULL,
  `anneeSortie` varchar(25) COLLATE utf8_bin NOT NULL,
  `cursus` varchar(50) COLLATE utf8_bin NOT NULL,
  `idCompte` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEtud`),
  KEY `FK_etudiant_idCompte` (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `idNews` int(11) NOT NULL,
  `categorie` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `auteur` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `titre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `contenu` varchar(10000) COLLATE utf8_bin DEFAULT NULL,
  `dateNews` date DEFAULT NULL,
  PRIMARY KEY (`idNews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `poursuiteetudes`
--

CREATE TABLE IF NOT EXISTS `poursuiteetudes` (
  `id` int(11) NOT NULL,
  `formation` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `anneeFormation` year(4) DEFAULT NULL,
  `discipline` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `etablissement` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idEtud`),
  KEY `FK_poursuiteetudes_idEtud` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id` int(11) NOT NULL,
  `EntNom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `EntVille` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idEtud`),
  KEY `FK_stage_idEtud` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiant_idCompte` FOREIGN KEY (`idCompte`) REFERENCES `compte` (`idCompte`);

--
-- Contraintes pour la table `poursuiteetudes`
--
ALTER TABLE `poursuiteetudes`
  ADD CONSTRAINT `FK_poursuiteetudes_idEtud` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtud`);

--
-- Contraintes pour la table `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `FK_stage_idEtud` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`idEtud`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
