
CREATE SCHEMA IF NOT EXISTS `inventorydb` DEFAULT CHARACTER SET utf8 ;
USE `inventorydb` ;

CREATE TABLE IF NOT EXISTS `inventorydb`.`patrimonio` (
  `id` INT NOT NULL,
  `numero` INT NOT NULL,
  `produto` VARCHAR(255) NULL,
  `serie` VARCHAR(45) NULL,
  `marca` VARCHAR(45) NULL,
  `categoria` VARCHAR(45) NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `situacao` VARCHAR(45) NULL,
  `data` TIMESTAMP NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `numero_UNIQUE` (`numero` ASC) )
ENGINE = InnoDB;

 