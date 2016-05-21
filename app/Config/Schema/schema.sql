

DROP TABLE IF EXISTS `cakephp`.`posts`;
DROP TABLE IF EXISTS `cakephp`.`users`;


CREATE TABLE `cakephp`.`posts` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`body` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `cakephp`.`users` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`role` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
	`created` datetime DEFAULT NULL,
	`modified` datetime DEFAULT NULL,	PRIMARY KEY  (`id`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

