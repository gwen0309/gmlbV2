-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Mars 2015 à 12:28
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `filrouge`
--

-- --------------------------------------------------------

--
-- Structure de la table `proposer`
--

CREATE TABLE IF NOT EXISTS `proposer` (
  `ID_HEBERGEMENT` smallint(6) NOT NULL,
  `ID_SERVICE` smallint(6) NOT NULL,
  PRIMARY KEY (`ID_HEBERGEMENT`,`ID_SERVICE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `proposer`
--

INSERT INTO `proposer` (`ID_HEBERGEMENT`, `ID_SERVICE`) VALUES
(1, 1),
(1, 2),
(1, 5),
(1, 6),
(2, 3),
(2, 7),
(3, 1),
(3, 12),
(4, 2),
(4, 5),
(4, 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
