-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Janvier 2016 à 16:41
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
(1, 'maxime', 'ff37274ce33e4fca0e200c74f6d89b63', 'Admin'),
(2, 'util', '05c7e24700502a079cdd88012b5a76d3', 'Util');

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
  PRIMARY KEY (`id`),
  KEY `FK_Etudiant_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `nom`, `prenom`, `dateNaissance`, `listeDiffusion`, `demandeEmail`) VALUES
(2, 'util', 'util', '1995-12-08', NULL, NULL);

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
  PRIMARY KEY (`id`),
  KEY `FK_InfoEtudiant_id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `infoetudiant`
--

INSERT INTO `infoetudiant` (`id`, `adresse`, `cp`, `ville`, `fixe`, `mobile`, `mail`) VALUES
(2, '4-rue-du-clos-du-gouffre', '45400', 'fleury-les-aubrais', '0238818272', '0642589803', 'dallois.maxime@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `idNews` int(11) NOT NULL,
  `categorie` varchar(25) COLLATE utf8_bin NOT NULL,
  `auteur` varchar(25) COLLATE utf8_bin NOT NULL,
  `titre` varchar(100) COLLATE utf8_bin NOT NULL,
  `contenu` varchar(10000) COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`idNews`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`idNews`, `categorie`, `auteur`, `titre`, `contenu`, `date`) VALUES
(1, 'lycee', 'maxime', 'test L', '&lt;p&gt;zfezefzef&lt;/p&gt;\r\n', '2016-01-13'),
(2, 'lycee', 'maxime', 'test L2', '&lt;p&gt;jjtyjtyjtyjyj&lt;/p&gt;\r\n', '2016-01-13'),
(3, 'lycee', 'maxime', 'test L3', '&lt;p&gt;ryjryjryj&lt;/p&gt;\r\n', '2016-01-13'),
(4, 'lycee', 'maxime', 'sdfsf', '&lt;p&gt;sdfsdgsdgsdgh&lt;/p&gt;\r\n', '2016-01-22'),
(5, 'lycee', 'maxime', 'srgsfg', '&lt;p&gt;dfgdfgdfgdfg&lt;/p&gt;\r\n', '2016-01-22');

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
  PRIMARY KEY (`id`),
  KEY `FK_ParcoursPro_id` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `parcourspro`
--

INSERT INTO `parcourspro` (`id`, `occupEmploi`, `emploi`, `typeContrat`, `entreprise`, `adresse`, `secteurActivite`, `idEtud`) VALUES
(1, NULL, 'grergerg', 'CDI', 'ergergerg', 'ergergerg', 'ergergerg', 2);

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
  PRIMARY KEY (`id`),
  KEY `FK_Passage_id` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `passage`
--

INSERT INTO `passage` (`id`, `anneeEntre`, `anneeSortie`, `cursus`, `idEtud`) VALUES
(1, 1984, 1989, 'BTS-SIO', 2);

-- --------------------------------------------------------

--
-- Structure de la table `poursuiteetudes`
--

CREATE TABLE IF NOT EXISTS `poursuiteetudes` (
  `id` int(11) NOT NULL,
  `formation` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `anneeFormation` year(4) DEFAULT NULL,
  `discipline` varchar(35) COLLATE utf8_bin DEFAULT NULL,
  `etablissement` varchar(50) COLLATE utf8_bin NOT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PoursuiteEtudes_id` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `poursuiteetudes`
--

INSERT INTO `poursuiteetudes` (`id`, `formation`, `anneeFormation`, `discipline`, `etablissement`, `idEtud`) VALUES
(1, 'ergrgzrg', 1985, 'ergergerg', 'cc', 2),
(2, 'zrgzgzrg', 1994, 'grerherh', 'test', 2),
(3, 'ergerg', 1982, 'ergerg', 'zgzsg', 2);

-- --------------------------------------------------------

--
-- Structure de la table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id` int(11) NOT NULL,
  `EntNom` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `EntVille` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `idEtud` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PoursuiteEtudes_id` (`idEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `stage`
--

INSERT INTO `stage` (`id`, `EntNom`, `EntVille`, `idEtud`) VALUES
(1, 'ergerger', 'gergergerg', 2),
(2, 'ergergerg', 'ergergerg', 2),
(3, 'zerzryetyut', 'turyurturtu', 2),
(4, 'zererare', 'aerretyety', 2),
(5, 'zerzetrryery', 'gtjjryjth', 2),
(6, 'zerzetehytr', 'thtrhjutrhu', 2);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_Etudiant_id` FOREIGN KEY (`id`) REFERENCES `compte` (`idEtud`);

--
-- Contraintes pour la table `infoetudiant`
--
ALTER TABLE `infoetudiant`
  ADD CONSTRAINT `FK_InfoEtudiant_id` FOREIGN KEY (`id`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `parcourspro`
--
ALTER TABLE `parcourspro`
  ADD CONSTRAINT `FK_ParcoursPro_id` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `FK_Passage_id` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

--
-- Contraintes pour la table `poursuiteetudes`
--
ALTER TABLE `poursuiteetudes`
  ADD CONSTRAINT `FK_PoursuiteEtudes_id` FOREIGN KEY (`idEtud`) REFERENCES `etudiant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
