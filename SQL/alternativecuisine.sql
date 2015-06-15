-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 15 Juin 2015 à 21:20
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

DELIMITER $$
--
-- Procédures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_getIdImageShuffleRecette`()
    NO SQL
SELECT idImage, NomFichier FROM image,recette WHERE image.idImage=recette.Image_idImage$$

DELIMITER ;

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
-- Structure de la table `enumere`
--

CREATE TABLE IF NOT EXISTS `enumere` (
  `Recette_idRecette` int(10) unsigned NOT NULL,
  `Ustensile_idUstensile` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Recette_idRecette`,`Ustensile_idUstensile`),
  KEY `fk_Recette_has_Ustensile_Ustensile1_idx` (`Ustensile_idUstensile`),
  KEY `fk_Recette_has_Ustensile_Recette1_idx` (`Recette_idRecette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enumere`
--

INSERT INTO `enumere` (`Recette_idRecette`, `Ustensile_idUstensile`) VALUES
(2, 1),
(3, 1),
(9, 1),
(4, 2),
(5, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(9, 4),
(10, 4),
(11, 4),
(1, 5),
(4, 5),
(5, 6),
(6, 6),
(1, 7),
(5, 7),
(6, 7),
(1, 10),
(10, 12),
(2, 13),
(3, 13),
(11, 13),
(10, 14);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `idImage` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NomFichier` varchar(45) NOT NULL,
  `Legende` varchar(100) NOT NULL,
  PRIMARY KEY (`idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=89 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`idImage`, `NomFichier`, `Legende`) VALUES
(6, 'OeufCocotte.jpg', 'Oeuf cocotte'),
(8, 'Pommee.jpg', 'Pommée'),
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
(32, 'LogoNesti.jpg', 'lesuperbelogonesti'),
(33, 'Beurre.jpg', 'Beurre doux'),
(34, 'Poele.jpg', 'Poele'),
(35, 'OeufsSurPlat.jpg', 'OeufsSurPlat'),
(36, 'Pain.jpg', 'Pain'),
(37, 'PommeDeTerre.jpg', 'Pomme de terre'),
(38, 'Sel.jpg', 'Sel'),
(39, 'Poivre.jpg', 'Poivre'),
(40, 'SucrePoudre.jpg', 'Sucre en poudre'),
(41, 'Yaourt.jpg', 'Yaourt'),
(42, 'Casserole.jpg', 'Casserole'),
(48, 'OeufCoque.jpg', 'Oeuf à la coque'),
(63, 'PateBrisee.jpg', 'Pâte brisée'),
(65, 'LaitAmande.jpg', 'Lait d''amande'),
(67, 'ramequin.jpg', 'ramequin'),
(69, 'Amandes.jpg', 'Amandes décortiquées 100g'),
(71, 'CompotePomme.jpg', 'Compote de pommes'),
(74, 'Crepes.jpg', 'Crêpes'),
(77, 'Puree.jpg', 'Purée'),
(80, 'Omelette.jpg', 'Omelette');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `NomIngredient`, `PrixUnitaireHT`, `Marque`, `Image_idImage`) VALUES
(1, 'Poire', '1.00', 'Terroir', 11),
(2, 'Pomme', '0.20', 'Terroir', 12),
(3, 'Oeuf', '0.00', 'Francinette', 13),
(4, 'Poireau', '0.00', 'Terroir', 14),
(5, 'Farine', '2.00', 'Francinette', 15),
(6, 'Chocolat', '1.00', 'Côte d''os', 16),
(7, 'Lait  1L', '1.00', 'Francinette', 17),
(8, 'Semoule 1kg', '1.00', 'Francinette', 18),
(9, 'Boeuf 100g', '2.00', 'Fermière', 19),
(10, 'Poulet 100g', '1.00', 'Fermière', 20),
(12, 'Beurre', '2.00', 'LaMotte', 33),
(13, 'Pain', '1.00', 'Francinette', 36),
(14, 'Pomme de terre', '0.20', 'LaPataterie', 37),
(15, 'Sel 100g', '1.00', 'LaMarée', 38),
(16, 'Poivre 10g', '2.00', 'LeCheminDesEpices', 39),
(17, 'Sucre en poudre 1kg', '3.00', 'LaSucrière', 40),
(18, 'Yaourt ', '1.00', 'LaYaourterie', 41),
(19, 'Amandes décortiquées 100g', '3.00', 'LeCheminDesEpices', 69);

--
-- Déclencheurs `ingredient`
--
DROP TRIGGER IF EXISTS `IngredientListe`;
DELIMITER //
CREATE TRIGGER `IngredientListe` BEFORE DELETE ON `ingredient`
 FOR EACH ROW BEGIN
	DELETE FROM liste WHERE Ingredient_idIngredient = OLD.idIngredient;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `liste`
--

CREATE TABLE IF NOT EXISTS `liste` (
  `Recette_idRecette` int(10) unsigned NOT NULL,
  `Ingredient_idIngredient` int(10) unsigned NOT NULL,
  PRIMARY KEY (`Recette_idRecette`,`Ingredient_idIngredient`),
  KEY `fk_Recette_has_Ingredient_Ingredient1_idx` (`Ingredient_idIngredient`),
  KEY `fk_Recette_has_Ingredient_Recette1_idx` (`Recette_idRecette`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `liste`
--

INSERT INTO `liste` (`Recette_idRecette`, `Ingredient_idIngredient`) VALUES
(2, 2),
(4, 3),
(5, 3),
(6, 3),
(10, 3),
(11, 3),
(1, 5),
(4, 5),
(1, 12),
(6, 12),
(11, 13),
(3, 14),
(1, 15),
(3, 15),
(5, 15),
(10, 15),
(11, 15),
(3, 16),
(5, 16),
(10, 16),
(1, 17),
(4, 17),
(9, 19);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `idRecette` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titre` varchar(100) NOT NULL,
  `Format` enum('Ecrit','Vidéo') NOT NULL DEFAULT 'Ecrit',
  `PrixHT` decimal(10,2) unsigned NOT NULL,
  `Resume` varchar(34) NOT NULL,
  `Contenu` varchar(300) NOT NULL,
  `Image_idImage` int(10) unsigned NOT NULL,
  `Temps_Preparation` varchar(6) NOT NULL DEFAULT '30 min',
  `Temps_Cuisson` varchar(6) NOT NULL DEFAULT '30 min',
  `Note` int(10) unsigned NOT NULL DEFAULT '0',
  `Difficulte` int(10) unsigned NOT NULL DEFAULT '0',
  `Budget` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idRecette`,`Image_idImage`),
  UNIQUE KEY `Titre` (`Titre`),
  UNIQUE KEY `Titre_2` (`Titre`),
  UNIQUE KEY `Titre_3` (`Titre`,`Resume`),
  KEY `fk_Recette_Image1_idx` (`Image_idImage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `Titre`, `Format`, `PrixHT`, `Resume`, `Contenu`, `Image_idImage`, `Temps_Preparation`, `Temps_Cuisson`, `Note`, `Difficulte`, `Budget`) VALUES
(1, 'Pâte brisée', 'Ecrit', '1.00', 'Une pâte brisée réussie !', 'Mélangez 250g de farine, 10cL d''eau,10cL de beurre fondu. Ajoutez du sel ou du sucre selon ce que vous désirez.', 63, '15', '0', 3, 1, 1),
(2, 'Compote de pommes', 'Ecrit', '1.00', 'Un bonne compote de pommes !', 'Eplucher et découper les pomes en morceaux. Dans une casserole faire cuire avec moitié d''eau pendant 15 minutes. Mixer.', 71, '30', '15', 5, 1, 1),
(3, 'Purée de pommes de terre', 'Ecrit', '1.00', 'Une bonne purée maison !', 'Eplucher les pommes de terre. Les cuire avec moitié d''eau salée pendant 30 minutes.Poivrer.Mixer', 77, '30', '30', 2, 2, 1),
(4, 'Crêpes', 'Ecrit', '1.00', 'De bonnes crêpes !', 'Mélanger 250g de farine avec1L de lait et 3 oeufs. Sucrer.', 74, '10', '0', 3, 1, 1),
(5, 'Omelette ', 'Ecrit', '1.00', 'De bonnes Tartelettes au citron ve', 'Battre les œufs dans un saladier. Puis dans une poêle chaude et beurrée verser le mélange. Saler, poivrer. Laisser cuire jusqu''à ce que le mélange soit solide.', 80, '5', '5', 1, 1, 1),
(6, 'Oeufs sur le plat', 'Ecrit', '1.00', 'De bons oeufs sur le plat  !', 'Placer une noisette de beurre dans une casserole chaude. Cassez les oeufs au-dessus. Laisser cuir jusqu''à ce que le blanc d''oeuf soit blanc. Servir', 35, '5', '5', 1, 1, 1),
(9, 'Lait d''amande', 'Ecrit', '1.00', 'Un déliciceux lait d''amande !', 'Placer 100g d''amande décortiquées dans un mixeur. Recouvrir d''eau, mixer puis filtrer. C''est prêt !', 65, '10', '0', 5, 1, 1),
(10, 'Oeuf cocotte', 'Ecrit', '1.00', 'Un bon œuf cocotte !', 'Préchauffez le four à 200 °C.Beurrez 4 ramequins allant au four.Cassez l’œuf par-dessus, salez puis poivrez.Mettez les ramequins dans un plat allant au four rempli d''eau bouillante.Enfournez 10 à 15 min environ, selon la cuisson souhaitée.', 6, '5', '5', 1, 1, 1),
(11, 'Oeuf à la coque', 'Ecrit', '1.00', 'De bons oeufs à la coque !', 'Immergez les oeufs dans l''eau bouillante pendant 1''30 minute. Sortez les de l''eau ôter le chapeau, saler, déguster avec des lamelles de pain.', 48, '2', '1''30', 5, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `tag`
--

INSERT INTO `tag` (`idTag`, `Valeur`) VALUES
(1, 'oeuf'),
(2, 'farine'),
(3, 'sel'),
(4, 'poivre'),
(8, 'légumes'),
(24, 'beurre');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `ustensile`
--

INSERT INTO `ustensile` (`idUstensile`, `NomUstensile`, `PrixUnitaireHT`, `Marque`, `Image_idImage`) VALUES
(1, 'Mixeur', '30.00', 'Alice Mélisse', 21),
(2, 'Fouet', '12.00', 'Alice Mélisse', 22),
(3, 'Rouleau à pâtisserie', '10.00', 'Alice Mélisse', 23),
(4, 'Tablier', '4.00', 'Alice Mélisse', 24),
(5, 'Saladier', '15.00', 'Alice Mélisse', 25),
(6, 'Poele', '30.00', 'AliceMélisse', 34),
(7, 'Spatule', '3.00', 'Alice Mélisse', 27),
(8, 'Cuillère en bois', '4.00', 'Alice Mélisse', 28),
(9, 'Minuteur', '10.00', 'Alice Mélisse', 29),
(10, 'Verre mesureur', '5.00', 'Alice Mélisse', 30),
(12, 'Plat pour four', '40.00', 'Alice Mélisse', 26),
(13, 'Casserole', '10.00', 'Tefol', 42),
(14, 'Ramequin', '1.00', 'LaFabrique', 67);

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
-- Contraintes pour la table `enumere`
--
ALTER TABLE `enumere`
  ADD CONSTRAINT `fk_Recette_has_Ustensile_Recette1` FOREIGN KEY (`Recette_idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recette_has_Ustensile_Ustensile1` FOREIGN KEY (`Ustensile_idUstensile`) REFERENCES `ustensile` (`idUstensile`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Contraintes pour la table `liste`
--
ALTER TABLE `liste`
  ADD CONSTRAINT `fk_Recette_has_Ingredient_Ingredient1` FOREIGN KEY (`Ingredient_idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Recette_has_Ingredient_Recette1` FOREIGN KEY (`Recette_idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
