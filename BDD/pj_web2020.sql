-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 09:27
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
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objets`
--

INSERT INTO `objets` (`ID`, `Nom`, `Photo1_nom`, `Photo1_extension`, `Photo2_nom`, `Photo2_extension`, `Photo3_nom`, `Photo3_extension`, `Video_nom`, `Video_extension`, `Description`, `Prix`, `Catégorie`, `Methode_vente`, `Date_obj`, `ID_V`) VALUES
(12, 'Pontiac Gto 1965', 'obj12img1', 'jpg', 'obj12img2', 'jpg', 'obj12img3', 'jpg', NULL, NULL, 'Pontiac Gto 1965 boite mecanique, remise en main propre', 50000, 2, 1, '2020-04-20 10:07:28', 9),
(11, 'Tableau en bon état', 'obj1img1', 'jpg', 'obj1img2', 'jpg', 'obj1img3', 'jpg', NULL, NULL, 'Tableau en bon état retrouvé dans le grenier de mes grand parents', 100, 2, 0, '2020-04-20 10:03:15', 9),
(13, 'Statue chien', 'obj13img1', 'jpg', 'obj13img2', 'jpg', NULL, NULL, NULL, NULL, 'Statue chien en résine bouledogue Français multicolore (Dominique) - 50 cm', 57, 2, 1, '2020-04-20 10:14:38', 9),
(14, 'Statue Sculpture Guepard', 'obj14img1', 'jpg', 'obj14img2', 'jpg', NULL, NULL, NULL, NULL, 'Statue Sculpture Guepard Animalier Style Art Deco Style Art Nouveau Bronze massi', 207, 2, 0, '2020-04-20 10:16:28', 9),
(15, 'Lecteur/enregistreur de cassettes ', 'obj15img1', 'jpg', 'obj15img2', 'jpg', 'obj15img3', 'jpg', NULL, NULL, 'Lecteur/enregistreur de cassettes PIONEER CT F850', 250, 1, 0, '2020-04-20 10:27:08', 9),
(16, 'SMART TV LED SAMSUNG', 'obj16img1', 'jpg', 'obj16img2', 'jpg', 'obj16img3', 'jpg', NULL, NULL, 'SMART TV LED SAMSUNG UE55RU7172UXXH 55\" POLLICI ULTRA UHD 4K HDR INTERNET TV', 419, 3, 0, '2020-04-20 10:31:04', 9),
(17, '1935 BULOVA \"Sénateur\" ', 'obj17img1', 'jpg', 'obj17img2', 'jpg', 'obj17img3', 'jpg', NULL, NULL, '1935 BULOVA \"Sénateur\" ART DECO RGP. or vintage watch/85 ANS/SERVICED', 400, 1, 0, '2020-04-20 10:45:23', 9),
(18, 'appareils photo argentiques', 'obj18img1', 'jpg', 'obj18img2', 'jpg', 'obj18img3', 'jpg', NULL, NULL, 'appareils photo argentiques EXAKTA - KARL ZEISS Tessar 1:2.8 F=7,5cm', 63, 1, 1, '2020-04-20 10:48:24', 9);

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
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

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
  `Type_derniervu` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`ID`, `Nom`, `Prenom`, `Pseudo`, `Mail`, `Adresse1`, `Adresse2`, `Ville`, `Code_postal`, `Pays`, `Tel`, `MDP`, `Type`, `Admin`, `Photo_nom`, `Photo_extension`, `Background_nom`, `Background_extension`, `Type_derniervu`) VALUES
(9, 'Admin', 'Admin', 'Admin', 'admin.admin@admin.com', ' 1 rue de la rue', NULL, 'paris', 75000, 'france', '+33600000000', 'admin', 1, 1, NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;