-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Avril 2015 à 23:14
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `alternativecuisine`
--

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NomFichier` varchar(45) NOT NULL,
  `Legende` varchar(100) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`idImage`, `NomFichier`, `Legende`) VALUES
(1, 'GacheVendeenne.jpg', 'Gâche vendéenne'),
(2, 'ClafoutisTomatesCerises.jpg', 'Clafoutis aux tomates cerises'),
(3, 'ChouRougePommes.jpg', 'Chou rouge aux pommes'),
(4, 'FiletsCabillaudSauceCitron.jpg', 'Filets de cabillaud sauce citron'),
(5, 'TartelettesCitronVert.jpg', 'Tartelettes au citron vert.jpg'),
(6, 'OeufCocotte.jpg', 'Oeuf cocotte'),
(7, 'CarpaccioRadisNoir.jpg', 'Carpaccio de radis noir.jpg'),
(8, 'Pommee.jpg', 'Pommée'),
(9, 'TartePoiresChocolat.jpg', 'Tarte aux poires et au chocolat'),
(10, 'BiscuitsAvoine.jpg', 'Biscuits à l''avoine'),
(11, 'Poire.jpg', 'Poire'),
(12, 'Pomme.jpg', 'Pomme'),
(13, 'Oeuf.png', 'Oeuf'),
(14, 'Poireau.jpg', 'Poireau'),
(15, 'Farine.jpg', 'Farine'),
(16, 'Chocolat.png', 'Chocolat'),
(17, 'Lait.jpg', 'Lait'),
(18, 'Semoule.jpg', 'Semoule'),
(19, 'Boeuf.jpg', 'Boeuf'),
(20, 'Poulet.jpg', 'Poulet'),
(21, 'Mixeur.jpg', 'mixeur '),
(22, 'Fouet.png', 'fouet'),
(23, 'RouleauPatisserie.jpg', 'Rouleau à pâtisserie'),
(24, 'Tablier.jpg', 'Tablier'),
(25, 'Saladier.jpg', 'Saladier'),
(26, 'PlatFour.jpg', 'PlatFour'),
(27, 'Spatule.jpg', 'Spatule'),
(28, 'CuillereBois.jpg', 'Cuillère en bois'),
(29, 'Minuteur.jpg', 'Minuteur'),
(30, 'VerreMesureur.jpg', 'Verre mesureur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
