-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 avr. 2020 à 12:57
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
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Pseudo` varchar(255) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Adresse1` varchar(255) DEFAULT NULL,
  `Adresse2` varchar(255) DEFAULT NULL,
  `Ville` varchar(255) DEFAULT NULL,
  `Code_postal` int(11) DEFAULT NULL,
  `Pays` varchar(255) DEFAULT NULL,
  `Tel` varchar(255) DEFAULT NULL,
  `MDP` varchar(255) NOT NULL,
  `Type` tinyint(1) NOT NULL DEFAULT 0,
  `Admin` tinyint(1) NOT NULL DEFAULT 0,
  `Photo_nom` varchar(255) DEFAULT NULL,
  `Photo_extension` varchar(255) DEFAULT NULL,
  `Background_nom` varchar(255) DEFAULT NULL,
  `Background_extension` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Pseudo`, `Mail`, `Adresse1`, `Adresse2`, `Ville`, `Code_postal`, `Pays`, `Tel`, `MDP`, `Type`, `Admin`, `Photo_nom`, `Photo_extension`, `Background_nom`, `Background_extension`) VALUES
(1, 'Teinturier', 'Hugo', 'Hugo_T', 'hugo.teinturier@edu.ece.fr', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 1, 1, NULL, NULL, NULL, NULL),
(2, 'Vieville', 'Clement', 'Wmb', 'clement.vieville@edu.ece.fr', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', 1, 1, NULL, NULL, NULL, NULL),
(3, 'Huber', 'Kenny', 'Giglobastre', 'kenny.huber@edu.ece.fr', '118 rue de la croix nivert', NULL, 'paris', 75015, 'france', '+33637705226', 'admin', 1, 1, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
