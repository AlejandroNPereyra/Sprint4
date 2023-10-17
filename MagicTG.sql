-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema MagicTG
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema MagicTG
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MagicTG` DEFAULT CHARACTER SET utf8 ;
USE `MagicTG` ;

-- -----------------------------------------------------
-- Table `MagicTG`.`Commanders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MagicTG`.`Commanders` (
  `commander_ID` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `matches_won` INT NOT NULL,
  `matches_lost` INT NOT NULL,
  PRIMARY KEY (`commander_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `MagicTG`.`Duels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MagicTG`.`Duels` (
  `duel_ID` INT NOT NULL AUTO_INCREMENT,
  `local_commander_ID` INT NOT NULL,
  `guest_commander_ID` INT NOT NULL,
  `date` DATETIME NOT NULL,
  `celebrated_at` VARCHAR(45) NOT NULL,
  `local_duel_points` INT NOT NULL,
  `guest_duel_points` INT NOT NULL,
  PRIMARY KEY (`duel_ID`),
  INDEX `fk_Duels_Commanders_idx` (`local_commander_ID` ASC),
  INDEX `fk_Duels_Commanders1_idx` (`guest_commander_ID` ASC),
  CONSTRAINT `fk_Duels_Commanders`
    FOREIGN KEY (`local_commander_ID`)
    REFERENCES `MagicTG`.`Commanders` (`commander_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Duels_Commanders1`
    FOREIGN KEY (`guest_commander_ID`)
    REFERENCES `MagicTG`.`Commanders` (`commander_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
