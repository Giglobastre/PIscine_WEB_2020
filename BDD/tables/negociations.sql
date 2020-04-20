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
-- Structure de la table `negociations`
--

DROP TABLE IF EXISTS `negociations`;
CREATE TABLE IF NOT EXISTS `negociations` (
  `ID_nego` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Objet` int(11) NOT NULL,
  `ID_Client` int(11) NOT NULL,
  `CPT` int(11) NOT NULL DEFAULT 0,
  `Offre` varchar(255) DEFAULT NULL,
  `Coffre` varchar(255) DEFAULT NULL,
  `ID_Vendeur` int(11) DEFAULT NULL,
  `Acquereur` int(11) NOT NULL DEFAULT 0,
  `Prix_final` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_nego`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `negociations`
--

INSERT INTO `negociations` (`ID_nego`, `ID_Objet`, `ID_Client`, `CPT`, `Offre`, `Coffre`, `ID_Vendeur`, `Acquereur`, `Prix_final`) VALUES
(45, 13, 11, 10, '10', '15', 9, 1, 15);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
