-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 20:10
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pj_web2020`
--

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID_Objet` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `ID_transac` int(11) NOT NULL AUTO_INCREMENT,
  `Prix_max` int(11) DEFAULT NULL,
  `Acquereur` tinyint(1) DEFAULT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_transac`)
) ENGINE=MyISAM AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID_Objet`, `ID_Client`, `ID_transac`, `Prix_max`, `Acquereur`, `Nom`) VALUES
(13, 11, 192, NULL, 0, NULL),
(17, 11, 196, 500, 1, NULL),
(17, 11, 195, 1218, 4, '1935 BULOVA \"Sénateur\" ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
