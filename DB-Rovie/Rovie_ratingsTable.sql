-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Rovie
-- ------------------------------------------------------
-- Server version	5.6.30-1

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
-- Table structure for table `ratingsTable`
--

DROP TABLE IF EXISTS `ratingsTable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratingsTable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgpath` varchar(500) DEFAULT NULL,
  `moviename` varchar(255) DEFAULT NULL,
  `rating` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratingsTable`
--

LOCK TABLES `ratingsTable` WRITE;
/*!40000 ALTER TABLE `ratingsTable` DISABLE KEYS */;
INSERT INTO `ratingsTable` VALUES (1,'../img/moviesposter/sincity.jpg','Sin City',3),(2,'../img/moviesposter/12YaS.jpg','12 Years a Slave',4),(3,'../img/moviesposter/42.jpg','42',5),(4,'../img/moviesposter/alexcross.jpg','Alex Cross',3),(5,'../img/moviesposter/avengers.jpg','The Avengers',4),(6,'../img/moviesposter/batmanbegins.jpg','Batman Begins',4),(7,'../img/moviesposter/birdman.jpg','Birdman',4),(8,'../img/moviesposter/bountyhunter.jpg','The Bounty Hunter',3),(9,'../img/moviesposter/CA-winterSoldier.jpg','Captain America: The Winter Soldier',4),(10,'../img/moviesposter/casinoroyale.jpg','Casino Royale',5),(11,'../img/moviesposter/everest.jpg','Everest',5),(12,'../img/moviesposter/frozen.jpg','Frozen',3),(13,'../img/moviesposter/gijoeretalation.jpg','G.I. Joe: Retaliation',0),(14,'../img/moviesposter/greenhornet.jpg','The Green Hornet',2),(15,'../img/moviesposter/grownups2.jpg','Grown Ups 2',0),(16,'../img/moviesposter/hitman-agent47.jpg','Hitman: Agent 47',2),(17,'../img/moviesposter/hobbitBOTFA.jpg','The Hobbit: The Battle of the Five Armies',5),(18,'../img/moviesposter/hp7.jpg','Harry Potter and the Deathly Hallows: Part 1',0),(19,'../img/moviesposter/Iroman3.jpg','Iron Man 3',0),(20,'../img/moviesposter/Ironman2.jpg','Iron Man 2',0),(21,'../img/moviesposter/jaws.jpg','Jaws',0),(22,'../img/moviesposter/JonahHex.jpg','Jonah Hex',0),(23,'../img/moviesposter/journey2.jpg','Journey 2: The Mysterious Island',0),(24,'../img/moviesposter/jumper.jpg','Jumper',0),(25,'../img/moviesposter/karatekidnew.jpg','The Karate Kid',0),(26,'../img/moviesposter/limitless.jpg','Limitless',0),(27,'../img/moviesposter/oblivion.jpg','Oblivion',0),(28,'../img/moviesposter/RiseOTG.jpg','Rise of the Guardians',0),(29,'../img/moviesposter/SHGS.jpg','Sherlock Holmes: A Game of Shadows',0),(30,'../img/moviesposter/shutterisland.jpg','Shutter Island',0),(31,'../img/moviesposter/stepupallin.jpg','Step Up All In',0),(32,'../img/moviesposter/taken2.jpg','Taken 2',0),(33,'../img/moviesposter/TDKrises.jpg','The Dark Knight Rises',0),(34,'../img/moviesposter/theamazingspiderman.jpg','The Amazing Spider-Man',4),(35,'../img/moviesposter/TTC.jpg','The Texas Chainsaw Massacre',0),(36,'../img/moviesposter/TTDW.jpg','Thor:The Dark World',0),(37,'../img/moviesposter/Underworld.jpg','Underworld',0),(38,'../img/moviesposter/wolverine.jpg','The Wolverine',0),(39,'../img/moviesposter/worldwarZ.jpg','World War Z',0),(40,'../img/moviesposter/XMEN-DOTFP.jpg','X-Men: Days of Future Past',0);
/*!40000 ALTER TABLE `ratingsTable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-25 19:26:10
