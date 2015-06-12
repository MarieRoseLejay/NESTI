-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Avril 2015 à 23:15
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
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titre` varchar(100) NOT NULL,
  `Format` enum('Ecrit','Vidéo') NOT NULL,
  `PrixHT` decimal(10,2) unsigned NOT NULL,
  `Resume` varchar(50) NOT NULL,
  `Contenu` varchar(300) NOT NULL,
  `Image_idImage` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idRecette`,`Image_idImage`),
  KEY `fk_Recette_Image1_idx` (`Image_idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `Titre`, `Format`, `PrixHT`, `Resume`, `Contenu`, `Image_idImage`) VALUES
(1, 'Gâche Vendéenne', 'Ecrit', '1.00', 'Comment faire une bonne gâche vendéenne !', 'Faire bouillir le lait avec la demi gousse de vanille fendue en deux.\r\n\r\nDans une grande terrine, versez la farine, faire un puits, ajoutez le sel, cassez les 2 oeufs, ajoutez le sucre et le beurre ramolli détaillé en petits morceaux.\r\n\r\nDélayez la levure dans un verre de lait tiède, travaillez la p', 1),
(2, 'Clafoutis aux tomates cerises', 'Ecrit', '1.00', 'Comment faire un bon clafoutis aux tomates cerises', 'Etaler la pâte brisée dans un moule à tarte. Disposer les tomates sur le fond. Ciseler le persil et en parsemer les tomates.\r\n\r\nBattre les œufs et la crème fraîche. Saler, poivrer. Verser la préparation sur la tarte et cuire au four (180°C) pendant une demi-heure.', 2),
(3, 'Chou rouge aux pommes', 'Ecrit', '1.00', 'Comment préparer un bon chou rouge aux pommes !  ', '1 Lavez et taillez le chou en lanières. Pelez et coupez les oignons en fines rondelles. Pelez les pommes, coupez-les en quartiers, épépinez-les et émincez-les en fines lamelles. Préchauffez le four th. 6 (180 °C).\r\n2 Déposez au fond de 4 moules à soufflé individuels un petit morceau de lard fumé. Ta', 3),
(4, 'Filets de cabillaud sauce citron', 'Ecrit', '1.00', 'Comment  cuisiner de bons filets de cabillaud à la', '1 Brossez les citrons sous l’eau chaude. Prélevez le zeste et pressez le jus de l’un, coupez l’autre en rondelles.\r\n2 Dans une sauteuse, faites fondre le beurre et faites-y dorer les filets de cabillaud 5 minutes sur chaque face. Saupoudrez de gingembre, salez et poivrez.\r\n3 Ajoutez la sauce soja, l', 4),
(5, 'Tartelettes au citron vert ', 'Ecrit', '1.00', 'Comment cuisiner de bonnes Tartelettes au citron v', '1 Préchauffez le four th. 6 (180 °C). Mixez les spéculoos. Mélangez-les avec le beurre. Garnissez-en 4 moules à tartelettes. Aplatissez la pâte avec le fond d’un verre en la faisant remonter sur le bord des moules.\r\n2 Fouettez les jaunes d’œufs avec le lait concentré, le zeste râpé d’1 citron et le ', 5),
(6, 'Oeuf cocotte', 'Ecrit', '1.00', 'Comment  cuisiner un bon oeuf cocotte !', '1 Préchauffez le four à 200 °C.\r\n2 Beurrez 4 ramequins allant au four et ajoutez-y la crème.\r\n3 Cassez l’œuf par-dessus, salez puis poivrez.\r\n4 Mettez les ramequins dans un plat allant au four rempli d''eau bouillante.\r\n5 Enfournez 10 à 15 min environ, selon la cuisson souhaitée.\r\n6 Ciselez la ciboul', 6);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_Recette_Image1` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
