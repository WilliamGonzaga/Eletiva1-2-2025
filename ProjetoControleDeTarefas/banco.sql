-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`projeto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`projeto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`membro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`membro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`membro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `telefone` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tarefa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tarefa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `status` ENUM('Pendente', 'Em Andamento', 'Concluido', 'Cancelado') NOT NULL,
  `projeto_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tarefa_projeto_idx` (`projeto_id` ASC),
  CONSTRAINT `fk_tarefa_projeto`
    FOREIGN KEY (`projeto_id`)
    REFERENCES `mydb`.`projeto` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tarefa_has_membro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tarefa_has_membro` (
  `tarefa_id` INT NOT NULL,
  `membro_id` INT NOT NULL,
  PRIMARY KEY (`tarefa_id`, `membro_id`),
  INDEX `fk_tarefa_has_membro_membro1_idx` (`membro_id` ASC),
  INDEX `fk_tarefa_has_membro_tarefa1_idx` (`tarefa_id` ASC),
  CONSTRAINT `fk_tarefa_has_membro_tarefa1`
    FOREIGN KEY (`tarefa_id`)
    REFERENCES `mydb`.`tarefa` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tarefa_has_membro_membro1`
    FOREIGN KEY (`membro_id`)
    REFERENCES `mydb`.`membro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
