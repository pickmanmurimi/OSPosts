-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `article_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject` varchar(70) NOT NULL,
  `tags` varchar(70) NOT NULL,
  `article` varchar(550) NOT NULL,
  `date_entered` datetime NOT NULL,
  `date_edited` datetime DEFAULT NULL,
  PRIMARY KEY (`article_id`),
  KEY `user_name` (`user_id`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `posts` (`article_id`, `user_id`, `subject`, `tags`, `article`, `date_entered`, `date_edited`) VALUES
(1,	1,	'SAFARI BOOKS',	'software\\technology\\example\\new post\\safari books',	'Technology professionals, software developers, web designers, and business and creative professionals use Safari Books Online as their primary resource for research, problem solving, learning, and certification training.\n Safari Books Online offers a range of product mixes and pricing programs for  government agencies, and individuals. Subscribers have access to thousands of books, training videos, and publication magazines in one fully searchable database from publishers like O’Reilly.',	'2017-08-14 23:33:38',	NULL),
(2,	1,	'SCOPE',	'scope\\programming\\example\\javascript',	'One of the most fundamental paradigms of nearly all programming languages is the ability to store values in variables, and later retrieve or modify those values.\n In fact, the ability to store values and pull values out of variables is what gives a program state. \nWithout such a concept, a program could perform some tasks, but they would be extremely limited and not terribly interesting. \nBut the inclusion of variables into our program begets the most interesting questions we will now address.',	'2017-08-14 23:36:15',	NULL);

DROP TABLE IF EXISTS `post_rates`;
CREATE TABLE `post_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) unsigned NOT NULL,
  `likes` int(10) unsigned DEFAULT NULL,
  `dislikes` int(10) unsigned DEFAULT NULL,
  `last_rate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`),
  CONSTRAINT `post_rates_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`article_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `post_rates` (`id`, `post_id`, `likes`, `dislikes`, `last_rate`) VALUES
(1,	1,	24,	9,	'2017-08-14 23:36:51'),
(2,	2,	18,	3,	'2017-08-14 23:37:03');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) NOT NULL,
  `fullnames` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`user_id`, `user_name`, `fullnames`, `email`, `password`, `date_created`, `last_activity`) VALUES
(1,	'pickman',	'pickman murimi',	'pickmanmurimi@gmail.com',	'$2y$10$LS4Di7jKhweJUWGpE5yfmOvXAy62J.AeA0OO55SmDkj4TDW9dS1Xq',	'2017-08-14 23:29:47',	NULL);

-- 2017-08-14 20:39:29