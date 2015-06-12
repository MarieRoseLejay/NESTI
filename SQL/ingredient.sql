-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Avril 2015 à 23:13
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
-- Structure de la table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `idIngredient` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NomIngredient` varchar(45) NOT NULL,
  `PrixUnitaireHT` decimal(10,2) unsigned NOT NULL,
  `Marque` varchar(45) DEFAULT NULL,
  `Image_idImage` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idIngredient`,`Image_idImage`),
  KEY `fk_Ingredient_Image1_idx` (`Image_idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `NomIngredient`, `PrixUnitaireHT`, `Marque`, `Image_idImage`) VALUES
(1, 'Poire', '0.00', 'BonFruit', 11),
(2, 'Pomme', '0.20', 'BonFruit', 12),
(3, 'oeuf', '0.00', 'Grosoeuf', 13),
(4, 'poireau', '0.00', 'Légume', 14),
(5, 'farine', '2.00', 'Francinette', 15),
(6, 'chocolat', '1.00', 'Côte d''os', 16),
(7, 'lait  1L', '1.00', 'Laitière', 17),
(8, 'semoule 1kg', '1.00', 'Francinette', 18),
(9, 'boeuf 100g', '2.00', 'Fermière', 19),
(10, 'poulet 100g', '1.00', 'Fermière', 20),
(21, 'Mixeur', '30.00', 'Alice Mélisse', 21),
(22, 'Fouet', '12.00', 'Alice Mélisse', 22),
(23, 'Rouleau à pâtisserie', '10.00', 'Alice Mélisse', 23),
(24, 'Tablier', '4.00', 'Alice Mélisse', 24),
(25, 'Saladier', '15.00', 'Alice Mélisse', 25),
(26, 'Plat pour four', '20.00', 'Alice Mélisse', 26),
(27, 'Spatule', '3.00', 'Alice Mélisse', 27),
(28, 'Cuillère en bois', '4.00', 'Alice Mélisse', 28),
(29, 'Minuteur', '10.00', 'Alice Mélisse', 29),
(30, 'Verre mesureur', '5.00', 'Alice Mélisse', 30);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_Ingredient_Image1` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
