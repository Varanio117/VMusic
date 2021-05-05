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
    FOREIGN KEY(`album`) REFERENCES `albums`(`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `playlist` (
    `id` int(20) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `song` INT NOT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`song`)
	REFERENCES `songs` (`id`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `songs` MODIFY `name` varchar(255) NOT NULL;
INSERT INTO `artists`(`name`)
VALUES
('Arlow_Shiah Maisel'),
('Fabian Mazur_Arcando'),
('JJD'),
('Outwild'),
('Simon Says!'),
('Deaf Kev'),
('If Found'),
('Mendum_Abandoned'),
('Robin Hustin_Jessica Chertock'),
('Vosai');

INSERT INTO `albums`(`name`,`artist`)
VALUES
('21',1),
('ELEVATE',2),
('Adventure',3),
('Golden',4),
('Views',5),
('SAFE SOUND',6),
('Dead of Night',7),
('Voyage',8),
('Burn it Down',9),
('Young&Wild&Free',10);

INSERT INTO `songs`(`name`,`album`)
VALUES
('Arlow_Shiah Maisel-21[NCS Release].mp3',1),
('Fabian Mazur_Arcando-Elevate[NCS Release].mp3',2),
('JJD-Adventure[NCS Release].mp3',3),
('Track_Outwild x She Is Jules-Golden[NCS Release].mp3',4),
('Simon Says!-one more time(feat. Devonte)[NCS Release].mp3',5),
('DEAF KEV-Safe_Sound with Sendi Hoxha[NCS Release].mp3',6),
('if found-Dead of Night[NCS Release].mp3',7),
('Mendum_Abandoned-Voyage(Feat. DNAKM)[NCS Release].mp3',8),
('Robin Hustin_Jessica Chertock-Burn it Down[NCS Release].mp3',9),
('Vosai-Young_Wild_Free[NCS Release].mp3',10);


  