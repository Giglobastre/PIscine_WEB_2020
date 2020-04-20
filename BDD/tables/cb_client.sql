-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 20:09
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
-- Structure de la table `cb_client`
--

DROP TABLE IF EXISTS `cb_client`;
CREATE TABLE IF NOT EXISTS `cb_client` (
  `ID_carte` int(11) NOT NULL AUTO_INCREMENT,
  `ID_client` int(11) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Date_expi` varchar(255) NOT NULL,
  `CVV` int(11) NOT NULL,
  `Numero` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  PRIMARY KEY (`ID_carte`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
