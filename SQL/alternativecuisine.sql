-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 23 Mai 2015 à 17:57
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
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Civilité` enum('Madame','Monsieur') NOT NULL,
  `NomClient` varchar(80) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `MotDePasse` varchar(45) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Telephone` varchar(10) NOT NULL,
  `RepQSecrete` varchar(45) NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DatePaiement` datetime NOT NULL,
  `Montant` decimal(10,2) unsigned NOT NULL,
  `Etat` enum('En cours','Réglée') NOT NULL,
  `Client_idClient` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idCommande`,`Client_idClient`),
  KEY `fk_Commande_Client1_idx` (`Client_idClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `comporte`
--

CREATE TABLE IF NOT EXISTS `comporte` (
  `Commande_idCommande` int(10) unsigned NOT NULL,
  `Ustensile_idUstensile` int(10) unsigned NOT NULL,
  `Quantite` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Commande_idCommande`,`Ustensile_idUstensile`),
  KEY `fk_Commande_has_Ustensile_Ustensile1_idx` (`Ustensile_idUstensile`),
  KEY `fk_Commande_has_Ustensile_Commande1_idx` (`Commande_idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `comprend`
--

CREATE TABLE IF NOT EXISTS `comprend` (
  `Commande_idCommande` int(10) unsigned NOT NULL,
  `Quantite` int(10) unsigned NOT NULL,
  `Ingredient_idIngredient` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Commande_idCommande`,`Ingredient_idIngredient`),
  KEY `fk_Commande_has_Emballe_Commande1_idx` (`Commande_idCommande`),
  KEY `fk_Comprend_Article1_idx` (`Ingredient_idIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contient`
--

CREATE TABLE IF NOT EXISTS `contient` (
  `Commande_idCommande` int(10) unsigned NOT NULL,
  `Recette_idRecette` int(10) unsigned NOT NULL,
  `Quantite` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Commande_idCommande`,`Recette_idRecette`),
  KEY `fk_Commande_has_Recette_Recette1_idx` (`Recette_idRecette`),
  KEY `fk_Commande_has_Recette_Commande1_idx` (`Commande_idCommande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NomFichier` varchar(45) NOT NULL,
  `Legende` varchar(100) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

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
(30, 'VerreMesureur.jpg', 'Verre mesureur'),
(31, 'LogoNesti.jpg', 'lesuperbelogonesti'),
(32, 'LogoNesti.jpg', 'lesuperbelogonesti');

-- --------------------------------------------------------

--
-- Structure de la table `indexe`
--

CREATE TABLE IF NOT EXISTS `indexe` (
  `Tag_idTag` int(10) unsigned NOT NULL,
  `Ustensile_idUstensile` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Tag_idTag`,`Ustensile_idUstensile`),
  KEY `fk_Tag_has_Ustensile_Ustensile1_idx` (`Ustensile_idUstensile`),
  KEY `fk_Tag_has_Ustensile_Tag1_idx` (`Tag_idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `indexe`
--

INSERT INTO `indexe` (`Tag_idTag`, `Ustensile_idUstensile`) VALUES
(1, 1),
(2, 2),
(3, 3);

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
  KEY `fk_Article_Image1_idx` (`Image_idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(10, 'poulet 100g', '1.00', 'Fermière', 20);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titre` varchar(100) NOT NULL,
  `Format` enum('Ecrit','Vidéo') NOT NULL,
  `PrixHT` decimal(10,2) unsigned NOT NULL,
  `Resume` varchar(100) NOT NULL,
  `Contenu` varchar(300) NOT NULL,
  `Image_idImage` int(10) unsigned NOT NULL,
  `Temps_Preparation` varchar(6) NOT NULL DEFAULT '30 min',
  `Temps_Cuisson` varchar(6) NOT NULL DEFAULT '30 min',
  `Note` int(10) unsigned NOT NULL DEFAULT '0',
  `Difficulté` int(10) unsigned NOT NULL DEFAULT '0',
  `Budget` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idRecette`,`Image_idImage`),
  KEY `fk_Recette_Image1_idx` (`Image_idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `Titre`, `Format`, `PrixHT`, `Resume`, `Contenu`, `Image_idImage`, `Temps_Preparation`, `Temps_Cuisson`, `Note`, `Difficulté`, `Budget`) VALUES
(1, 'Gâche Vendéenne', 'Ecrit', '1.00', 'Comment faire une bonne gâche vendéenne !', 'Faire bouillir le lait avec la demi gousse de vanille fendue en deux.\r\n\r\nDans une grande terrine, versez la farine, faire un puits, ajoutez le sel, cassez les 2 oeufs, ajoutez le sucre et le beurre ramolli détaillé en petits morceaux.\r\n\r\nDélayez la levure dans un verre de lait tiède, travaillez la p', 1, '', '', 0, 0, 0),
(2, 'Clafoutis aux tomates cerises', 'Ecrit', '1.00', 'Comment faire un bon clafoutis aux tomates cerises !', 'Etaler la pâte brisée dans un moule à tarte. Disposer les tomates sur le fond. Ciseler le persil et en parsemer les tomates.\r\n\r\nBattre les œufs et la crème fraîche. Saler, poivrer. Verser la préparation sur la tarte et cuire au four (180°C) pendant une demi-heure.', 2, '', '', 0, 0, 0),
(3, 'Chou rouge aux pommes', 'Ecrit', '1.00', 'Comment préparer un bon chou rouge aux pommes !  ', '1 Lavez et taillez le chou en lanières. Pelez et coupez les oignons en fines rondelles. Pelez les pommes, coupez-les en quartiers, épépinez-les et émincez-les en fines lamelles. Préchauffez le four th. 6 (180 °C).\r\n2 Déposez au fond de 4 moules à soufflé individuels un petit morceau de lard fumé. Ta', 3, '', '', 0, 0, 0),
(4, 'Filets de cabillaud sauce citron', 'Ecrit', '1.00', 'Comment  cuisiner de bons filets de cabillaud à la sauce citron !', '1 Brossez les citrons sous l’eau chaude. Prélevez le zeste et pressez le jus de l’un, coupez l’autre en rondelles.\r\n2 Dans une sauteuse, faites fondre le beurre et faites-y dorer les filets de cabillaud 5 minutes sur chaque face. Saupoudrez de gingembre, salez et poivrez.\r\n3 Ajoutez la sauce soja, l', 4, '', '', 0, 0, 0),
(5, 'Tartelettes au citron vert ', 'Ecrit', '1.00', 'Comment cuisiner de bonnes Tartelettes au citron vert !', '1 Préchauffez le four th. 6 (180 °C). Mixez les spéculoos. Mélangez-les avec le beurre. Garnissez-en 4 moules à tartelettes. Aplatissez la pâte avec le fond d’un verre en la faisant remonter sur le bord des moules.\r\n2 Fouettez les jaunes d’œufs avec le lait concentré, le zeste râpé d’1 citron et le ', 5, '', '', 0, 0, 0),
(6, 'Oeuf cocotte', 'Ecrit', '1.00', 'Comment  cuisiner un bon oeuf cocotte !', '1 Préchauffez le four à 200 °C.\r\n2 Beurrez 4 ramequins allant au four et ajoutez-y la crème.\r\n3 Cassez l’œuf par-dessus, salez puis poivrez.\r\n4 Mettez les ramequins dans un plat allant au four rempli d''eau bouillante.\r\n5 Enfournez 10 à 15 min environ, selon la cuisson souhaitée.\r\n6 Ciselez la ciboul', 6, '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reference`
--

CREATE TABLE IF NOT EXISTS `reference` (
  `Tag_idTag` int(10) unsigned NOT NULL,
  `Recette_idRecette` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Tag_idTag`,`Recette_idRecette`),
  KEY `fk_Tag_has_Recette_Recette1_idx` (`Recette_idRecette`),
  KEY `fk_Tag_has_Recette_Tag1_idx` (`Tag_idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reference`
--

INSERT INTO `reference` (`Tag_idTag`, `Recette_idRecette`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `repertorie`
--

CREATE TABLE IF NOT EXISTS `repertorie` (
  `Tag_idTag` int(10) unsigned NOT NULL,
  `Ingredient_idIngredient` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Tag_idTag`,`Ingredient_idIngredient`),
  KEY `fk_Tag_has_Article_Article1_idx` (`Ingredient_idIngredient`),
  KEY `fk_Tag_has_Article_Tag_idx` (`Tag_idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `idTag` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Valeur` varchar(50) NOT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`idTag`, `Valeur`) VALUES
(1, 'froid'),
(2, 'chaud'),
(3, 'très chaud'),
(4, 'test2'),
(5, 'test3');

--
-- Déclencheurs `tag`
--
DROP TRIGGER IF EXISTS `TagRecetteNonSupprime`;
DELIMITER //
CREATE TRIGGER `TagRecetteNonSupprime` BEFORE DELETE ON `tag`
 FOR EACH ROW begin
	if old.idTag in (select Tag_idTag from reference) then
    	signal sqlstate '30000' set message_text = 'Attention vous ne pouvez pas supprimer ce tag car il est lié à une recette';
    end if ;
end
//
DELIMITER ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_Commande_Client1` FOREIGN KEY (`Client_idClient`) REFERENCES `client` (`idClient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comporte`
--
ALTER TABLE `comporte`
  ADD CONSTRAINT `fk_Commande_has_Ustensile_Commande1` FOREIGN KEY (`Commande_idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_has_Ustensile_Ustensile1` FOREIGN KEY (`Ustensile_idUstensile`) REFERENCES `ustensile` (`idUstensile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `comprend`
--
ALTER TABLE `comprend`
  ADD CONSTRAINT `fk_Commande_has_Emballe_Commande1` FOREIGN KEY (`Commande_idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Comprend_Article1` FOREIGN KEY (`Ingredient_idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `contient`
--
ALTER TABLE `contient`
  ADD CONSTRAINT `fk_Commande_has_Recette_Commande1` FOREIGN KEY (`Commande_idCommande`) REFERENCES `commande` (`idCommande`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Commande_has_Recette_Recette1` FOREIGN KEY (`Recette_idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `indexe`
--
ALTER TABLE `indexe`
  ADD CONSTRAINT `fk_Tag_has_Ustensile_Tag1` FOREIGN KEY (`Tag_idTag`) REFERENCES `tag` (`idTag`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tag_has_Ustensile_Ustensile1` FOREIGN KEY (`Ustensile_idUstensile`) REFERENCES `ustensile` (`idUstensile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_Article_Image1` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Ingredient_Image1` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk_Recette_Image1` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `fk_Tag_has_Recette_Recette1` FOREIGN KEY (`Recette_idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tag_has_Recette_Tag1` FOREIGN KEY (`Tag_idTag`) REFERENCES `tag` (`idTag`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `repertorie`
--
ALTER TABLE `repertorie`
  ADD CONSTRAINT `fk_Tag_has_Article_Article1` FOREIGN KEY (`Ingredient_idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tag_has_Article_Tag` FOREIGN KEY (`Tag_idTag`) REFERENCES `tag` (`idTag`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ustensile`
--
ALTER TABLE `ustensile`
  ADD CONSTRAINT `fk_Article_Image10` FOREIGN KEY (`Image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
