DROP DATABASE IF EXISTS `music`;
CREATE DATABASE `music`;
USE `music`;

CREATE TABLE `artists` (                                                 
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY(`id`),
    UNIQUE KEY(`name`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `albums` (
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `artist` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`artist`)
	REFERENCES  `artists`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `songs` (
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `album` int NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`album`) REFERENCES `album`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `playlist` (
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `song` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`song`)
	REFERENCES `songs` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
