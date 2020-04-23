CREATE DATABASE  IF NOT EXISTS `kanji2000` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `kanji2000`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: kanji2000
-- ------------------------------------------------------
-- Server version	5.6.28-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `kanji`
--

DROP TABLE IF EXISTS `kanji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kanji` (
  `kanji_id` int(11) NOT NULL AUTO_INCREMENT,
  `kanji_jap` varchar(45) NOT NULL,
  `kanji_eng` varchar(255) NOT NULL,
  `kanji_hiragana` varchar(255) DEFAULT NULL,
  `kanji_romanji` varchar(255) DEFAULT NULL,
  `kanji_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`kanji_id`),
  UNIQUE KEY `kanji_id_UNIQUE` (`kanji_id`),
  UNIQUE KEY `kanji_char_UNIQUE` (`kanji_jap`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kanji`
--

LOCK TABLES `kanji` WRITE;
/*!40000 ALTER TABLE `kanji` DISABLE KEYS */;
INSERT INTO `kanji` VALUES (1,'一','one','いち','ichi',0),(2,'二','two','に','ni',0),(3,'三','three','さん',NULL,0),(4,'四','four','よん',NULL,0),(5,'五','five',NULL,NULL,0),(6,'六','six',NULL,NULL,0),(7,'七','seven',NULL,NULL,0),(8,'八','eight',NULL,NULL,0),(9,'九','nine',NULL,NULL,0),(10,'十','ten',NULL,NULL,0),(11,'人','person',NULL,NULL,0),(12,'日','day, sun',NULL,NULL,0),(13,'月','moon',NULL,NULL,0),(14,'曜','day of the week',NULL,NULL,0),(15,'火','fire',NULL,NULL,0),(16,'水','water',NULL,NULL,0),(17,'木','tree',NULL,NULL,0),(18,'金','money',NULL,NULL,0),(19,'土','earth, ground',NULL,NULL,0),(20,'本','book',NULL,NULL,0),(21,'山','mountain',NULL,NULL,0);
/*!40000 ALTER TABLE `kanji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(90) NOT NULL,
  `user_hash` char(64) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--


/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-14  3:01:51
