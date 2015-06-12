-- MySQL Script generated by MySQL Workbench
-- 06/07/15 17:03:57
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema dbsiteweb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `Client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Client` (
  `idClient` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Civilité` ENUM('Madame','Monsieur') NOT NULL,
  `NomClient` VARCHAR(80) NOT NULL,
  `Prenom` VARCHAR(100) NOT NULL,
  `Login` VARCHAR(45) NOT NULL,
  `MotDePasse` VARCHAR(45) NOT NULL,
  `Adresse` VARCHAR(100) NOT NULL,
  `Telephone` VARCHAR(10) NOT NULL,
  `RepQSecrete` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idClient`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Commande`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Commande` (
  `idCommande` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `DatePaiement` DATETIME NOT NULL,
  `Montant` DECIMAL(10,2) UNSIGNED NOT NULL,
  `Etat` ENUM('En cours', 'Réglée') NOT NULL,
  `Client_idClient` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idCommande`, `Client_idClient`),
  INDEX `fk_Commande_Client1_idx` (`Client_idClient` ASC),
  CONSTRAINT `fk_Commande_Client1`
    FOREIGN KEY (`Client_idClient`)
    REFERENCES `Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Image`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Image` (
  `idImage` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomFichier` VARCHAR(45) NOT NULL,
  `Legende` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idImage`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Recette`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Recette` (
  `idRecette` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titre` VARCHAR(100) NOT NULL,
  `Format` ENUM('Ecrit','Vidéo') NOT NULL DEFAULT 'Ecrit',
  `PrixHT` DECIMAL(10,2) UNSIGNED NOT NULL,
  `Resume` VARCHAR(50) NOT NULL,
  `Contenu` VARCHAR(300) NOT NULL,
  `Image_idImage` INT UNSIGNED NOT NULL,
  `Temps_Preparation` VARCHAR(6) NOT NULL DEFAULT '30 min',
  `Temps_Cuisson` VARCHAR(6) NOT NULL DEFAULT '30 min',
  `Note` INT UNSIGNED NOT NULL DEFAULT 0,
  `Difficulte` INT UNSIGNED NOT NULL DEFAULT 0,
  `Budget` INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`idRecette`, `Image_idImage`),
  INDEX `fk_Recette_Image1_idx` (`Image_idImage` ASC),
  CONSTRAINT `fk_Recette_Image1`
    FOREIGN KEY (`Image_idImage`)
    REFERENCES `Image` (`idImage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Tag` (
  `idTag` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Valeur` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idTag`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ingredient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ingredient` (
  `idIngredient` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomIngredient` VARCHAR(45) NOT NULL,
  `PrixUnitaireHT` DECIMAL(10,2) UNSIGNED NOT NULL,
  `Marque` VARCHAR(45) NULL,
  `Image_idImage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idIngredient`, `Image_idImage`),
  INDEX `fk_Article_Image1_idx` (`Image_idImage` ASC),
  CONSTRAINT `fk_Article_Image1`
    FOREIGN KEY (`Image_idImage`)
    REFERENCES `Image` (`idImage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Repertorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Repertorie` (
  `Tag_idTag` INT UNSIGNED NOT NULL,
  `Ingredient_idIngredient` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Tag_idTag`, `Ingredient_idIngredient`),
  INDEX `fk_Tag_has_Article_Article1_idx` (`Ingredient_idIngredient` ASC),
  INDEX `fk_Tag_has_Article_Tag_idx` (`Tag_idTag` ASC),
  CONSTRAINT `fk_Tag_has_Article_Tag`
    FOREIGN KEY (`Tag_idTag`)
    REFERENCES `Tag` (`idTag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tag_has_Article_Article1`
    FOREIGN KEY (`Ingredient_idIngredient`)
    REFERENCES `Ingredient` (`idIngredient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Reference`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Reference` (
  `Tag_idTag` INT UNSIGNED NOT NULL,
  `Recette_idRecette` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Tag_idTag`, `Recette_idRecette`),
  INDEX `fk_Tag_has_Recette_Recette1_idx` (`Recette_idRecette` ASC),
  INDEX `fk_Tag_has_Recette_Tag1_idx` (`Tag_idTag` ASC),
  CONSTRAINT `fk_Tag_has_Recette_Tag1`
    FOREIGN KEY (`Tag_idTag`)
    REFERENCES `Tag` (`idTag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tag_has_Recette_Recette1`
    FOREIGN KEY (`Recette_idRecette`)
    REFERENCES `Recette` (`idRecette`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Contient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Contient` (
  `Commande_idCommande` INT UNSIGNED NOT NULL,
  `Recette_idRecette` INT UNSIGNED NOT NULL,
  `Quantite` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Commande_idCommande`, `Recette_idRecette`),
  INDEX `fk_Commande_has_Recette_Recette1_idx` (`Recette_idRecette` ASC),
  INDEX `fk_Commande_has_Recette_Commande1_idx` (`Commande_idCommande` ASC),
  CONSTRAINT `fk_Commande_has_Recette_Commande1`
    FOREIGN KEY (`Commande_idCommande`)
    REFERENCES `Commande` (`idCommande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_has_Recette_Recette1`
    FOREIGN KEY (`Recette_idRecette`)
    REFERENCES `Recette` (`idRecette`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Comprend`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Comprend` (
  `Commande_idCommande` INT UNSIGNED NOT NULL,
  `Quantite` INT UNSIGNED NOT NULL,
  `Ingredient_idIngredient` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Commande_idCommande`, `Ingredient_idIngredient`),
  INDEX `fk_Commande_has_Emballe_Commande1_idx` (`Commande_idCommande` ASC),
  INDEX `fk_Comprend_Article1_idx` (`Ingredient_idIngredient` ASC),
  CONSTRAINT `fk_Commande_has_Emballe_Commande1`
    FOREIGN KEY (`Commande_idCommande`)
    REFERENCES `Commande` (`idCommande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comprend_Article1`
    FOREIGN KEY (`Ingredient_idIngredient`)
    REFERENCES `Ingredient` (`idIngredient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Ustensile`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Ustensile` (
  `idUstensile` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomUstensile` VARCHAR(45) NOT NULL,
  `PrixUnitaireHT` DECIMAL(10,2) UNSIGNED NOT NULL,
  `Marque` VARCHAR(45) NULL,
  `Image_idImage` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`idUstensile`, `Image_idImage`),
  INDEX `fk_Article_Image1_idx` (`Image_idImage` ASC),
  CONSTRAINT `fk_Article_Image10`
    FOREIGN KEY (`Image_idImage`)
    REFERENCES `Image` (`idImage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Comporte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Comporte` (
  `Commande_idCommande` INT UNSIGNED NOT NULL,
  `Ustensile_idUstensile` INT UNSIGNED NOT NULL,
  `Quantite` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Commande_idCommande`, `Ustensile_idUstensile`),
  INDEX `fk_Commande_has_Ustensile_Ustensile1_idx` (`Ustensile_idUstensile` ASC),
  INDEX `fk_Commande_has_Ustensile_Commande1_idx` (`Commande_idCommande` ASC),
  CONSTRAINT `fk_Commande_has_Ustensile_Commande1`
    FOREIGN KEY (`Commande_idCommande`)
    REFERENCES `Commande` (`idCommande`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Commande_has_Ustensile_Ustensile1`
    FOREIGN KEY (`Ustensile_idUstensile`)
    REFERENCES `Ustensile` (`idUstensile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Indexe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Indexe` (
  `Tag_idTag` INT UNSIGNED NOT NULL,
  `Ustensile_idUstensile` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Tag_idTag`, `Ustensile_idUstensile`),
  INDEX `fk_Tag_has_Ustensile_Ustensile1_idx` (`Ustensile_idUstensile` ASC),
  INDEX `fk_Tag_has_Ustensile_Tag1_idx` (`Tag_idTag` ASC),
  CONSTRAINT `fk_Tag_has_Ustensile_Tag1`
    FOREIGN KEY (`Tag_idTag`)
    REFERENCES `Tag` (`idTag`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tag_has_Ustensile_Ustensile1`
    FOREIGN KEY (`Ustensile_idUstensile`)
    REFERENCES `Ustensile` (`idUstensile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Liste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Liste` (
  `Recette_idRecette` INT UNSIGNED NOT NULL,
  `Ingredient_idIngredient` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Recette_idRecette`, `Ingredient_idIngredient`),
  INDEX `fk_Recette_has_Ingredient_Ingredient1_idx` (`Ingredient_idIngredient` ASC),
  INDEX `fk_Recette_has_Ingredient_Recette1_idx` (`Recette_idRecette` ASC),
  CONSTRAINT `fk_Recette_has_Ingredient_Recette1`
    FOREIGN KEY (`Recette_idRecette`)
    REFERENCES `Recette` (`idRecette`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recette_has_Ingredient_Ingredient1`
    FOREIGN KEY (`Ingredient_idIngredient`)
    REFERENCES `Ingredient` (`idIngredient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Enumere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Enumere` (
  `Recette_idRecette` INT UNSIGNED NOT NULL,
  `Ustensile_idUstensile` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`Recette_idRecette`, `Ustensile_idUstensile`),
  INDEX `fk_Recette_has_Ustensile_Ustensile1_idx` (`Ustensile_idUstensile` ASC),
  INDEX `fk_Recette_has_Ustensile_Recette1_idx` (`Recette_idRecette` ASC),
  CONSTRAINT `fk_Recette_has_Ustensile_Recette1`
    FOREIGN KEY (`Recette_idRecette`)
    REFERENCES `Recette` (`idRecette`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Recette_has_Ustensile_Ustensile1`
    FOREIGN KEY (`Ustensile_idUstensile`)
    REFERENCES `Ustensile` (`idUstensile`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
