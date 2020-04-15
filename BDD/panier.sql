-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 15 avr. 2020 à 10:21
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
  `Prix_max` int(11) DEFAULT NULL,
  `Acquereur` tinyint(1) DEFAULT NULL,
  `ID_transac` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID_transac`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID_Objet`, `ID_Client`, `Prix_max`, `Acquereur`, `ID_transac`) VALUES
(1, 1, 700, 0, 1),
(1, 1, 7000, 0, 2),
(1, 1, 7000, 0, 3),
(1, 1, 7000, 0, 4),
(1, 1, 7000, 0, 5),
(1, 1, 7000, 0, 6),
(1, 1, 7002, 0, 7),
(1, 1, 7002, 0, 8),
(1, 1, 7002, 0, 9),
(1, 1, 7002, 0, 10),
(1, 1, 7002, 1, 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
