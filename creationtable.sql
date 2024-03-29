-- MySQL Script generated by MySQL Workbench
-- Wed Oct 30 11:04:35 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema siteanimaux
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema siteanimaux
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `siteanimaux` DEFAULT CHARACTER SET utf8 ;
USE `siteanimaux` ;

-- -----------------------------------------------------
-- Table `siteanimaux`.`animal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `siteanimaux`.`animal` (
  `id` INT(10) UNSIGNED NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `origine` VARCHAR(255) NOT NULL,
  `taille` FLOAT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `siteanimaux`.`dangerosite`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `siteanimaux`.`dangerosite` (
  `idDanger` INT(11) NOT NULL,
  `letal` TINYINT(1) NOT NULL,
  `blesser` TINYINT(1) NOT NULL,
  `offensif` TINYINT(1) NOT NULL,
  `resistance` TINYINT(1) NOT NULL,
  `furtivite` TINYINT(1) NOT NULL,
  `peur` TINYINT(1) NOT NULL,
  `repartition` TINYINT(1) NOT NULL,
  `intelligence` TINYINT(1) NOT NULL,
  `unique` TINYINT(1) NOT NULL,
  `animal_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idDanger`, `animal_id`),
  INDEX `fk_dangerosite_animal1_idx` (`animal_id` ASC) ,
  CONSTRAINT fk_dangerosite_animal1
    FOREIGN KEY (animal_id)
    REFERENCES siteanimaux.animal (id)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `siteanimaux`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `siteanimaux`.`utilisateur` (
  `idUser` INT(11) NOT NULL,
  `nom` VARCHAR(255) NOT NULL,
  `idBestiaire` INT(11) NULL DEFAULT NULL,
  `email` VARCHAR(255) NOT NULL,
  `confirmKey` VARCHAR(255) NOT NULL,
  `actif` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `siteanimaux`.`motdepasse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `siteanimaux`.`motdepasse` (
  `idMotdepasse` INT(11) NOT NULL,
  `mdp` VARCHAR(255) NOT NULL,
  `dateDebut` DATE NOT NULL,
  `utilisateur_idUser` INT(11) NOT NULL,
  PRIMARY KEY (`idMotdepasse`, `utilisateur_idUser`),
  INDEX `fk_motdepasse_utilisateur_idx` (`utilisateur_idUser` ASC) ,
  CONSTRAINT `fk_motdepasse_utilisateur`
    FOREIGN KEY (`utilisateur_idUser`)
    REFERENCES `siteanimaux`.`utilisateur` (`idUser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `siteanimaux`.`bestiaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `siteanimaux`.`bestiaire` (
  `utilisateur_idUser` INT(11) NOT NULL,
  `animal_id` INT(10) UNSIGNED NOT NULL,
  `nombreAnimaux` INT NULL,
  PRIMARY KEY (`utilisateur_idUser`, `animal_id`),
  INDEX `fk_utilisateur_has_animal_animal1_idx` (`animal_id` ASC) ,
  INDEX `fk_utilisateur_has_animal_utilisateur1_idx` (`utilisateur_idUser` ASC) ,
  CONSTRAINT `fk_utilisateur_has_animal_utilisateur1`
    FOREIGN KEY (`utilisateur_idUser`)
    REFERENCES `siteanimaux`.`utilisateur` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_has_animal_animal1`
    FOREIGN KEY (`animal_id`)
    REFERENCES `siteanimaux`.`animal` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
