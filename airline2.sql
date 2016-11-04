CREATE DATABASE  IF NOT EXISTS `airline2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `airline2`;
-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: airline2
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `airplane`
--

DROP TABLE IF EXISTS `airplane`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airplane` (
  `ID` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `company` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airplane`
--

LOCK TABLES `airplane` WRITE;
/*!40000 ALTER TABLE `airplane` DISABLE KEYS */;
INSERT INTO `airplane` VALUES ('1170','B738','Boeing'),('1201','A320','Airbus');
/*!40000 ALTER TABLE `airplane` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `airport`
--

DROP TABLE IF EXISTS `airport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airport` (
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airport`
--

LOCK TABLES `airport` WRITE;
/*!40000 ALTER TABLE `airport` DISABLE KEYS */;
INSERT INTO `airport` VALUES ('DAL','Dallas Love Field','Dallas','Texas','USA'),('DFW','Dallas Fort Worth Airport','Dallas','Texas','USA'),('LAX','Los Angeles International Airport','Los Angeles','California','USA'),('SEA','Seattle-Tacoma International Airport','Seattle','Washington','USA'),('SFO','San Francisco International','San Fransciso','California','USA');
/*!40000 ALTER TABLE `airport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `date` date NOT NULL,
  `flightno` varchar(10) NOT NULL,
  `username` varchar(45) NOT NULL,
  `classtype` varchar(20) NOT NULL,
  `paid` int(1) DEFAULT '0',
  PRIMARY KEY (`ID`,`flightno`),
  KEY `username_idx` (`username`),
  KEY `classname_idx` (`classtype`),
  KEY `flightno_idx` (`flightno`,`classtype`),
  CONSTRAINT `flightno` FOREIGN KEY (`flightno`, `classtype`) REFERENCES `class` (`number`, `name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `passanger` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'2015-12-01 17:22:00','2015-12-01','AA986','song','Economy',0),(2,'2015-12-01 17:23:00','2015-12-01','AA986','song','Economy',1),(3,'2015-12-01 17:24:00','2015-12-02','AA986','abc','Economy',0),(4,'2015-12-01 17:25:00','2015-12-01','AA986','song','Business',1),(5,'2015-12-01 17:26:00','2015-12-01','AA986','abc','Business',1),(6,'2015-12-01 17:27:00','2015-12-01','AA986','abc','Business',1),(7,'2015-12-01 17:27:00','2015-12-01','AA1512','song','Economy',1),(8,'2015-12-02 04:22:32','2015-12-02','AA986','song','Economy',0),(9,'2015-12-02 04:26:29','2015-12-02','AA120','song','Economy',0),(10,'2015-12-02 04:26:29','2015-12-02','AA100','song','Economy',0),(11,'2015-12-02 04:27:36','2015-12-02','AA1512','abc','Economy',0),(12,'2015-12-02 04:27:36','2015-12-03','AA1512','abc','Economy',0),(13,'2015-12-02 05:55:15','2015-12-02','AA1512','abc','Economy',1),(14,'2015-12-02 05:55:15','2015-12-03','AA1512','abc','Economy',1),(15,'2015-12-02 05:57:27','2015-12-02','AA1512','abc','Economy',1),(16,'2015-12-02 05:57:27','2015-12-03','AA1512','abc','Economy',1),(17,'2015-12-02 05:58:11','2015-12-02','AA1512','abc','Economy',1),(18,'2015-12-02 05:58:11','2015-12-03','AA1512','abc','Economy',1),(19,'2015-12-02 06:05:52','2015-12-02','AA6861','song','Economy',0),(20,'2015-12-02 11:46:57','2015-12-02','AA100','song','Business',0),(21,'2015-12-02 11:56:31','2015-12-02','AA986','song','Economy',0),(22,'2015-12-02 01:24:08','2015-12-02','AA120','xianchu','Economy',1),(23,'2015-12-02 01:24:08','2015-12-02','AA100','xianchu','Economy',1),(24,'2015-12-02 01:24:42','2015-12-02','AA6861','xianchu','Economy',1),(25,'2015-12-02 01:26:46','2015-12-02','AA986','xianchu','Economy',1),(26,'2015-12-02 01:26:46','2013-12-03','AA986','xianchu','Economy',1),(27,'2015-12-02 02:34:02','2015-12-02','AA986','song','Economy',0),(28,'2015-12-02 02:34:02','2015-12-02','AA6927','song','Economy',0),(29,'2015-12-06 06:48:46','2015-12-06','AA986','abc','Economy',1),(30,'2015-12-06 07:26:56','2015-12-06','AA1512','qun','Economy',0),(32,'2015-12-06 07:27:20','2015-12-06','AA6861','qun','Economy',0),(34,'2015-12-06 10:04:30','2015-12-06','AA120','abc','Economy',1),(45,'2015-12-07 01:46:49','2015-12-06','AA986','tao','Economy',1),(54,'2015-12-07 02:12:07','2015-12-06','AA100','tao','Economy',1),(55,'2015-12-07 02:13:40','2015-12-06','AA100','tao','Economy',0),(56,'2015-12-07 12:50:44','2015-12-06','AA180','abc','Economy',1),(60,'2015-12-07 12:57:53','2015-12-06','AA100','abc','Economy',0),(61,'2015-12-07 01:50:05','2015-12-07','AA600','eve','Economy',1),(63,'2015-12-07 01:53:03','2015-12-07','AA100','eve','Economy',1),(66,'2015-12-07 01:55:51','2015-12-07','AA986','eve','Business',1),(67,'2015-12-07 01:55:51','2015-12-08','AA1512','eve','Business',1);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `number` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price` float NOT NULL,
  PRIMARY KEY (`number`,`name`),
  KEY `number_idx` (`number`),
  CONSTRAINT `number` FOREIGN KEY (`number`) REFERENCES `flight` (`number`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES ('AA100','Business',5,500),('AA100','Economy',200,180),('AA120','Business',15,4000),('AA120','Economy',100,1000),('AA1512','Business',1,200),('AA1512','Economy',100,100),('AA180','Business',15,800),('AA180','Economy',100,240),('AA181','Business',10,200),('AA181','Economy',100,100),('AA600','Business',5,200),('AA600','Economy',80,50),('AA601','Business',3,300),('AA601','Economy',50,60),('AA6861','Business',3,100),('AA6861','Economy',100,40),('AA6927','Business',10,100),('AA6927','Economy',200,40),('AA80','Business',3,200),('AA80','Economy',80,50),('AA986','Business',8,400),('AA986','Economy',120,120);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flight` (
  `number` varchar(20) NOT NULL,
  `airplane_id` varchar(10) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `d_time` time NOT NULL,
  `arrival` varchar(10) NOT NULL,
  `a_time` time NOT NULL,
  PRIMARY KEY (`number`),
  KEY `code_idx` (`departure`,`arrival`),
  KEY `airplaneid_idx` (`airplane_id`),
  KEY `arrival_idx` (`arrival`),
  CONSTRAINT `airplaneid` FOREIGN KEY (`airplane_id`) REFERENCES `airplane` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `arrival` FOREIGN KEY (`arrival`) REFERENCES `airport` (`code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `departure` FOREIGN KEY (`departure`) REFERENCES `airport` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight`
--

LOCK TABLES `flight` WRITE;
/*!40000 ALTER TABLE `flight` DISABLE KEYS */;
INSERT INTO `flight` VALUES ('AA100','1201','LAX','18:35:00','SEA','21:00:00'),('AA120','1201','DFW','14:35:00','LAX','17:30:00'),('AA1512','1170','SEA','13:40:00','DFW','19:30:00'),('AA180','1201','DFW','07:35:00','SFO','10:30:00'),('AA181','1170','SFO','19:30:00','DFW','22:00:00'),('AA600','1201','DAL','17:00:00','SEA','21:00:00'),('AA601','1201','SEA','20:00:00','DAL','23:00:00'),('AA6861','1201','SFO','11:00:00','SEA','13:00:00'),('AA6927','1201','SEA','17:00:00','SFO','19:00:00'),('AA80','1170','LAX','20:00:00','DFW','23:00:00'),('AA986','1170','DFW','10:00:00','SEA','14:00:00');
/*!40000 ALTER TABLE `flight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passanger`
--

DROP TABLE IF EXISTS `passanger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passanger` (
  `username` varchar(30) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `cellphone` varchar(15) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passanger`
--

LOCK TABLES `passanger` WRITE;
/*!40000 ALTER TABLE `passanger` DISABLE KEYS */;
INSERT INTO `passanger` VALUES ('abc','abc',NULL,'','abc@utd.edu',NULL,NULL,NULL,'abcdef123456'),('eve','eve','','adi','eve@utd.edu','2143456543','','0000-00-00','Eve123'),('qun','Qun',NULL,'Niu','qun@utd.edu','','Female',NULL,'Niuqun1'),('song','Song',NULL,'Tao','ts@utd.edu',NULL,'Male',NULL,'Songtao1'),('tao','s','','t','t@utd.edu','987654321','','2015-12-06','Ts123456'),('web','web','','pro','web@utd.edu','9998887777','','2015-12-06','Web123'),('xianchu','xianchu',NULL,'chen','xian@utd.edu','','Male',NULL,'Xianchu1');
/*!40000 ALTER TABLE `passanger` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-07 16:57:20
