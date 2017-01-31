-- init database
CREATE SCHEMA `tjk_nehd_ass1` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE `tjk_nehd_ass1`.`data` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `phone` INT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));

INSERT INTO tjk_nehd_ass1.data (name,phone)
VALUES ('Joe Schmoe\'s Name','123456789');