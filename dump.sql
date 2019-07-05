-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `bdd_facebook` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `bdd_facebook`;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` longtext,
  `user_id` int(11) NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comments` (`id`, `text`, `user_id`, `image`) VALUES
(21,	'bonsoir nique le code propre\r\n',	30,	'https://media.giphy.com/media/lz7212bWGdZbkm30KJ/giphy.gif'),
(35,	'tant mieux',	30,	NULL),
(37,	'j\'aime le hacking',	32,	'https://parismatch.be/app/uploads/2018/04/Macaca_nigra_self-portrait_large-e1524567086123-1100x715.jpg'),
(38,	'hftdtguyg',	30,	NULL),
(39,	'gugltyig\r\n',	30,	NULL),
(55,	'',	30,	'https://images.ricardocuisine.com/services/recipes/500x675_11597998785236e7e855902.jpg?_ga=2.49145327.810937848.1562162581-1239664816.1562162581');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `roles` (`id`, `name`) VALUES
(1,	'admin'),
(2,	'moderator'),
(3,	'user');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` text NOT NULL,
  `nom` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(60) NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinytext NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '3',
  `mobile` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `prenom`, `nom`, `email`, `password`, `birthday`, `gender`, `role_id`, `mobile`) VALUES
(30,	'clem',	'guinch',	'clem@clem.fr',	'$2y$10$ZKAdvIWL.5Zc/QoMxV27PuczWdMV0H4v4oJhlKvh4lwomTnnAxy9m',	'2019-07-01',	'homme',	1,	NULL),
(32,	'alex',	'alex',	'alex@alex.fr',	'$2y$10$vlxVZpRwnvPpCVX2GvVj1OmPjUkGiaPUPXfIWBMjkD9qQ3dk4GCLa',	'2019-07-26',	'femme',	3,	661809558),
(33,	'philou',	'fil',	'philou@fil.fr',	'$2y$10$FPdGFw8qMy/D1KAzVH1NbuTrkomsELBdXqZD1f0WbqLWC/WVVLx2u',	'2019-04-18',	'homme',	3,	0),
(35,	'sara',	'sara',	'sara ',	'$2y$10$TwyWqeaf.S6I.l4/qDn/XuMvY0RgpnegPf7kXj54aI200czxrswNm',	'2019-07-05',	'homme',	3,	661809558);

-- 2019-07-05 07:43:13