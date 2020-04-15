-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 14 avr. 2020 à 13:40
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
-- Structure de la table `objets`
--

DROP TABLE IF EXISTS `objets`;
CREATE TABLE IF NOT EXISTS `objets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Photo1_nom` varchar(255) DEFAULT NULL,
  `Photo1_extension` varchar(255) DEFAULT NULL,
  `Photo2_nom` varchar(255) DEFAULT NULL,
  `Photo2_extension` varchar(255) DEFAULT NULL,
  `Photo3_nom` varchar(255) DEFAULT NULL,
  `Photo3_extension` varchar(255) DEFAULT NULL,
  `Video_nom` varchar(255) DEFAULT NULL,
  `Video_extension` varchar(255) DEFAULT NULL,
  `Description` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Catégorie` int(11) NOT NULL,
  `Methode_vente` tinyint(1) NOT NULL DEFAULT 0,
  `Date_obj` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_V` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objets`
--

INSERT INTO `objets` (`ID`, `Nom`, `Photo1_nom`, `Photo1_extension`, `Photo2_nom`, `Photo2_extension`, `Photo3_nom`, `Photo3_extension`, `Video_nom`, `Video_extension`, `Description`, `Prix`, `Catégorie`, `Methode_vente`, `Date_obj`, `ID_V`) VALUES
(1, 'test1', 'obj1img1', 'jpg', 'obj1img2', 'jpg', 'obj1img3', 'jpg', 'g', 'g', 'quijdhzbiuzjf ikzsejrkcniozenfcz zenzcezc cn,cenj ieienfe dijeiuchneunc ieijcei', 14, 41, 0, '2020-04-12 16:53:53', 1),
(2, 'test2', 'obj2img1', 'jpg', 'obj2img1', 'jpg', 'obj2img1', 'jpg', NULL, NULL, 'vf', 1, 1, 0, '2020-04-12 16:55:34', 2),
(3, 'ef', 'obj3img1.jpg', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'ef', 5, 1, 0, '2020-04-14 09:50:38', 1),
(4, '2', 'obj4img1', 'jpg', 'obj4img2', 'jpg', 'obj4img3', 'jpg', 'obj4vid', 'gif', '2', 2, 2, 2, '2020-04-14 14:28:54', 1),
(5, '2', 'obj5img1', 'jpg', 'obj5img2', 'jpg', 'obj5img3', 'jpg', 'obj5vid', 'gif', '2', 2, 2, 2, '2020-04-14 14:31:01', 1),
(6, 'ef', 'obj6img1', 'jpg', NULL, NULL, NULL, NULL, NULL, NULL, '5', 10, 1, 1, '2020-04-14 14:48:03', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
