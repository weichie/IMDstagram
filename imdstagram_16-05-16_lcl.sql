# ************************************************************
# Sequel Pro SQL dump
# Version 4529
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42-log)
# Database: imdstagram
# Generation Time: 2016-05-16 17:48:23 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `date`)
VALUES
	(1,2,3,'Daauuyyymmm wa een nice picture #yame! ðŸ˜‚','2016-05-16 16:42:08'),
	(2,2,3,'Ma how zeg :D','2016-05-16 16:52:16'),
	(3,2,3,'Dikke fun zowa commentjes zetten met #hashtags enz ;)','2016-05-16 16:52:34'),
	(6,NULL,NULL,NULL,NULL),
	(7,0,3,'Daauuyyymmm wa een nice picture #yame! ðŸ˜‚','2016-05-16 17:51:44'),
	(8,0,3,'testje :D','2016-05-16 17:52:51'),
	(9,1,3,'sdfsdfsdfsdfsdf','2016-05-16 17:53:15'),
	(10,2,3,'test','2016-05-16 18:11:17'),
	(11,2,3,'megaschijnlld :DD ðŸ˜‚','2016-05-16 18:11:54'),
	(12,2,3,'lelz :D','2016-05-16 18:12:11'),
	(13,2,3,'wajow :)','2016-05-16 18:14:17'),
	(14,2,3,'negers :)','2016-05-16 18:15:14'),
	(15,2,3,'test :)','2016-05-16 18:16:55');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table followers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `followers`;

CREATE TABLE `followers` (
  `user_id` int(11) unsigned NOT NULL,
  `follower_id` int(11) DEFAULT NULL,
  `accepted` set('0','1') DEFAULT '1',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `followers` WRITE;
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;

INSERT INTO `followers` (`user_id`, `follower_id`, `accepted`)
VALUES
	(2,1,'1'),
	(3,2,'1');

/*!40000 ALTER TABLE `followers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_url` text,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `location` text,
  `filter` varchar(255) DEFAULT NULL,
  `report` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `image_url`, `description`, `user_id`, `date`, `location`, `filter`, `report`)
VALUES
	(1,'uploads/12715407_10205714066912752_6978778886111640256_n.jpg','Test met #hashtag #sexy #love',2,'2016-05-12 13:49:50',NULL,'mayfair',0),
	(2,'uploads/photo-1446771326090-d910bfaf00f6.jpeg','Dikke foto van #unsplash :D',3,'2016-05-16 15:08:20',NULL,'_1977',0);

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` text,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `bio` text,
  `location` int(11) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `private` set('0','1') DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `avatar`, `username`, `password`, `bio`, `location`, `url`, `email`, `name`, `private`)
VALUES
	(1,NULL,'Weichiie','$2y$12$WUS4BTufDTfa09U9KGksN.13//nBiOn5wbsvYqdX4X73mlR9gE91.','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit explicabo eos facere eligendi asperiores minima, nulla, ducimus eaque illo deleniti. Ratione adipisci excepturi, quidem veritatis optio fuga officiis nostrum assumenda.',NULL,'http://www.weichieprojects.com','bobmasaki@hotmail.com','Bob Weichler','0'),
	(2,'uploads/avatar/trello-icon.png','Yame','$2y$12$iiAS/C5Vkg59FqS2sj4Mw.dPUViZMzHjqloftRd87cgI1e8hjBmym','Welkom op mijn IMDstagram bio ðŸ‘Œ',NULL,'http://yame.be','yannick@yame.be','Yannick Van Meerbeeck','1'),
	(3,'uploads/avatar/me-office.jpg','misteryamez','$2y$12$o/Ek8k/MpygKrupuVPFlReCR3m1fk86QEK8ggNv2/.kzll6HSXe06','Testje :D <script></script>',NULL,'test','yannick@mutify.be','Yame Van Meerbeeck','0');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
