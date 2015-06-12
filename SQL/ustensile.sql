-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 22 Mai 2015 à 19:11
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
-- Structure de la table `ustensile`
--

CREATE TABLE IF NOT EXISTS `ustensile` (
  `idUstensile` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NomUstensile` varchar(45) NOT NULL,
  `PrixUnitaireHT` decimal(10,2) unsigned NOT NULL,
  `Marque` varchar(45) DEFAULT NULL,
  `Image_idImage` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idUstensile`,`Image_idImage`),
  KEY `fk_Article_Image1_idx` (`Image_idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `ustensile`
--

INSERT INTO `ustensile` (`idUstensile`, `NomUstensile`, `PrixUnitaireHT`, `Marque`, `Image_idImage`) VALUES
(1, 'Mixeur', '30.00', 'Alice Mélisse', 21),
(2, 'Fouet', '12.00', 'Alice Mélisse', 22),
(3, 'Rouleau à pâtisserie', '10.00', 'Alice Mélisse', 23),
(4, 'Tablier', '4.00', 'Alice Mélisse', 24),
(5, 'Saladier', '15.00', 'Alice Mélisse', 25),
(6, 'Plat pour four', '20.00', 'Alice Mélisse', 26),
(7, 'Spatule', '3.00', 'Alice Mélisse', 27),
(8, 'Cuillère en bois', '4.00', 'Alice Mélisse', 28),
(9, 'Minuteur', '10.00', 'Alice Mélisse', 29),
(10, 'Verre mesureur', '5.00', 'Alice Mélisse', 30);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ustensile`
--
ALTER TABLE `ustensile`
  ADD CONSTRAINT `fk_Article_Image10` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
