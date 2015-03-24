-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Mars 2015 à 11:17
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
-- Structure de la table `hebergement`
--

CREATE TABLE IF NOT EXISTS `hebergement` (
  `ID_HEBERGEMENT` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_HEBERGEMENT` varchar(50) DEFAULT NULL,
  `TEL_HEBERGEMENT` decimal(50,0) DEFAULT NULL,
  `CAPACITE_HEBERGEMENT` smallint(6) DEFAULT NULL,
  `NOMBRE_ETOILES` tinyint(4) DEFAULT NULL,
  `RIB` varchar(30) DEFAULT NULL,
  `NUMERO_RUE_HEBERGEMENT` smallint(6) DEFAULT NULL,
  `RUE_HEBERGEMENT` varchar(200) DEFAULT NULL,
  `CODE_POSTAL_HEBERGEMENT` int(11) DEFAULT NULL,
  `VILLE_HEBERGEMENT` varchar(50) DEFAULT NULL,
  `NOM_CONTACT` varchar(50) DEFAULT NULL,
  `PRENOM_CONTACT` varchar(50) DEFAULT NULL,
  `MAIL_CONTACT` varchar(50) DEFAULT NULL,
  `TEL_CONTACT` decimal(50,0) DEFAULT NULL,
  `TYPE_HEBERGEMENT` char(20) DEFAULT NULL,
  PRIMARY KEY (`ID_HEBERGEMENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `hebergement`
--

INSERT INTO `hebergement` (`ID_HEBERGEMENT`, `NOM_HEBERGEMENT`, `TEL_HEBERGEMENT`, `CAPACITE_HEBERGEMENT`, `NOMBRE_ETOILES`, `RIB`, `NUMERO_RUE_HEBERGEMENT`, `RUE_HEBERGEMENT`, `CODE_POSTAL_HEBERGEMENT`, `VILLE_HEBERGEMENT`, `NOM_CONTACT`, `PRENOM_CONTACT`, `MAIL_CONTACT`, `TEL_CONTACT`, `TYPE_HEBERGEMENT`) VALUES
(1, 'Hotel de Provence', '970731381', 30, 3, '0123456789', 9, 'rue Molière', 6400, 'Cannes', 'Dorj', 'Maxime', 'Maxime.dorj@cannes.com', '970731381', 'hotel'),
(2, 'InterContinental Carlton', '467934944', 135, 5, '0123456789', 58, 'La Croisette', 6414, 'Cannes', 'Bastien', 'Leclercq', 'bastien.leclercq@cannes.com', '634125676', 'hotel'),
(3, 'Majestic Barriere', '975182099', 349, 5, '0123456789', 10, 'La Croisette', 6407, 'Cannes', 'Gonzalez', 'Gwen', 'Gwen.Gonzalez@cannes.com', '673050207', 'hotel'),
(4, 'Radisson Blu', '492997320', 134, 4, '0123456789', 2, 'Boulevard Jean Hibert', 6400, 'Cannes', 'Bour', 'Lucie', 'Lucie.Bour@cannes.com', '492997320', 'hotel');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
