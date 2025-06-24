-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: sch_v_2.3
-- ------------------------------------------------------
-- Server version 	10.4.32-MariaDB
-- Date: Sat, 13 Jul 2024 04:13:26 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accountuser`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accountuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountuser`
--

LOCK TABLES `accountuser` WRITE;
/*!40000 ALTER TABLE `accountuser` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `accountuser` VALUES (1,'shuvo003','shuvo003','$2y$10$9Ap.cm/fhHEqp2C.ior05u8mvIXT8UpsoWmHnoKqurdbsDufaVlSm','2024-04-18 07:31:56','Account');
/*!40000 ALTER TABLE `accountuser` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `accountuser` with 1 row(s)
--

--
-- Table structure for table `adminloginlogs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminloginlogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminloginlogs`
--

LOCK TABLES `adminloginlogs` WRITE;
/*!40000 ALTER TABLE `adminloginlogs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `adminloginlogs` VALUES (1,'shuvo003','2024-02-17 23:02:05','::1'),(2,'shuvo003','2024-02-17 23:20:10','::1'),(3,'shuvo003','2024-02-19 09:34:47','::1'),(4,'shuvo003','2024-02-19 13:02:34','113.11.96.158'),(5,'shuvo003','2024-02-21 00:06:06','::1'),(6,'shuvo003','2024-02-21 10:38:24','::1'),(7,'shuvo003','2024-02-21 10:39:50','::1'),(8,'shuvo003','2024-03-07 00:27:48','::1'),(9,'shuvo003','2024-03-07 00:35:19','::1'),(10,'shuvo003','2024-03-10 11:11:33','::1'),(11,'shuvo003','2024-04-18 07:31:44','::1'),(12,'shuvo003','2024-04-18 09:04:29','::1'),(13,'shuvo003','2024-04-28 09:33:36','::1'),(14,'shuvo003','2024-04-28 13:49:24','::1'),(15,'shuvo003','2024-05-10 07:47:57','::1'),(16,'shuvo003','2024-05-10 08:20:34','::1'),(17,'shuvo003','2024-05-11 06:47:59','::1'),(18,'shuvo003','2024-05-11 08:39:34','::1'),(19,'shuvo003','2024-05-12 10:29:11','103.191.162.68'),(20,'shuvo003','2024-05-12 13:24:45','::1'),(21,'shuvo003','2024-05-13 07:42:40','::1'),(22,'shuvo003','2024-05-13 10:15:00','::1'),(23,'shuvo003','2024-06-01 06:56:03','::1'),(24,'shuvo003','2024-06-04 18:37:25','::1'),(25,'shuvo003','2024-06-04 19:58:32','::1'),(26,'shuvo003','2024-06-15 11:01:16','::1'),(27,'shuvo003','2024-06-15 14:08:44','::1'),(28,'shuvo003','2024-06-16 06:26:19','::1'),(29,'shuvo003','2024-06-17 21:44:44','::1'),(30,'shuvo003','2024-06-17 21:52:20','::1'),(31,'shuvo003','2024-06-18 09:57:31','::1'),(32,'shuvo003','2024-06-20 15:36:36','::1'),(33,'shuvo003','2024-06-21 10:09:12','::1'),(34,'shuvo003','2024-06-21 10:33:48','::1'),(35,'shuvo003','2024-06-21 17:30:43','::1'),(36,'shuvo003','2024-06-21 17:57:05','::1'),(37,'shuvo003','2024-06-21 20:39:22','::1'),(38,'shuvo003','2024-06-21 21:51:58','::1'),(39,'shuvo003','2024-06-21 23:15:39','::1'),(40,'shuvo003','2024-06-22 07:05:29','::1'),(41,'shuvo003','2024-06-22 13:46:06','::1'),(42,'shuvo003','2024-06-22 15:57:44','::1'),(43,'shuvo003','2024-06-24 07:49:23','::1'),(44,'shuvo003','2024-06-24 07:51:40','::1'),(45,'shuvo003','2024-06-24 08:02:08','::1'),(46,'shuvo003','2024-06-24 11:08:19','::1'),(47,'shuvo003','2024-06-25 11:05:52','::1'),(48,'shuvo003','2024-06-26 10:17:52','::1'),(49,'shuvo003','2024-06-26 10:22:49','::1'),(50,'shuvo003','2024-06-26 10:26:27','::1'),(51,'shuvo003','2024-06-26 14:47:59','::1'),(52,'shuvo003','2024-06-26 14:56:28','::1'),(53,'shuvo003','2024-06-27 09:22:06','::1'),(54,'shuvo003','2024-06-28 12:31:23','::1'),(55,'shuvo003','2024-06-29 10:41:16','::1'),(56,'shuvo003','2024-06-30 08:32:52','::1'),(57,'shuvo003','2024-06-30 08:35:17','::1'),(58,'shuvo003','2024-07-01 10:33:11','::1'),(59,'shuvo003','2024-07-01 11:04:32','::1'),(60,'shuvo003','2024-07-02 07:56:48','::1'),(61,'shuvo003','2024-07-02 23:51:47','::1'),(62,'shuvo003','2024-07-03 02:10:57','::1'),(63,'shuvo003','2024-07-03 11:27:11','::1'),(64,'shuvo003','2024-07-03 12:01:14','::1'),(65,'shuvo003','2024-07-04 15:16:44','::1'),(66,'shuvo003','2024-07-05 08:00:09','::1'),(67,'shuvo003','2024-07-05 17:14:34','::1'),(68,'shuvo003','2024-07-13 06:59:05','::1'),(69,'shuvo003','2024-07-13 07:36:31','::1'),(70,'shuvo003','2024-07-13 07:38:10','::1'),(71,'shuvo003','2024-07-13 08:13:22','::1');
/*!40000 ALTER TABLE `adminloginlogs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `adminloginlogs` with 71 row(s)
--

--
-- Table structure for table `att_time_table`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_time_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clock_in_start_time` time NOT NULL,
  `clock_in_end_time` time NOT NULL,
  `clock_out_start_time` time NOT NULL,
  `clock_out_end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `att_time_table`
--

LOCK TABLES `att_time_table` WRITE;
/*!40000 ALTER TABLE `att_time_table` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `att_time_table` VALUES (1,'08:07:00','08:12:00','08:13:00','08:17:00','2024-07-13 02:07:59');
/*!40000 ALTER TABLE `att_time_table` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `att_time_table` with 1 row(s)
--

--
-- Table structure for table `a_teacherlogin_logs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_teacherlogin_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_teacherlogin_logs`
--

LOCK TABLES `a_teacherlogin_logs` WRITE;
/*!40000 ALTER TABLE `a_teacherlogin_logs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `a_teacherlogin_logs` VALUES (1,'shuvo003','2024-07-04 15:12:08','::1','Login Success');
/*!40000 ALTER TABLE `a_teacherlogin_logs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `a_teacherlogin_logs` with 1 row(s)
--

--
-- Table structure for table `building`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) NOT NULL,
  `bnumber` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bnumber` (`bnumber`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `building` VALUES (1,'Main Building',1);
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `building` with 1 row(s)
--

--
-- Table structure for table `buildingroom`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildingroom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bnumber` int(11) NOT NULL,
  `roomfloor` varchar(255) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `seatcapacity` int(11) NOT NULL,
  `rowofbench` int(11) NOT NULL,
  `uniid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniid` (`uniid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildingroom`
--

LOCK TABLES `buildingroom` WRITE;
/*!40000 ALTER TABLE `buildingroom` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `buildingroom` VALUES (1,1,'1','101 Robindro ',101,100,3,'1101');
/*!40000 ALTER TABLE `buildingroom` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `buildingroom` with 1 row(s)
--

--
-- Table structure for table `buildingroombench`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildingroombench` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `rownumber` int(11) NOT NULL,
  `numberofbench` int(11) NOT NULL,
  `uninum` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uninum` (`uninum`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildingroombench`
--

LOCK TABLES `buildingroombench` WRITE;
/*!40000 ALTER TABLE `buildingroombench` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `buildingroombench` VALUES (1,1,101,1,5,'11011'),(2,1,101,2,6,'11012'),(3,1,101,3,8,'11013');
/*!40000 ALTER TABLE `buildingroombench` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `buildingroombench` with 3 row(s)
--

--
-- Table structure for table `cardprintstatus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cardprintstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cardprintstatus`
--

LOCK TABLES `cardprintstatus` WRITE;
/*!40000 ALTER TABLE `cardprintstatus` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `cardprintstatus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `cardprintstatus` with 0 row(s)
--

--
-- Table structure for table `chapter`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `chaptername` varchar(1000) NOT NULL,
  `chapteruniid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `chapteruniid_index` (`chapteruniid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chapter`
--

LOCK TABLES `chapter` WRITE;
/*!40000 ALTER TABLE `chapter` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `chapter` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `chapter` with 0 row(s)
--

--
-- Table structure for table `class`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) NOT NULL,
  `classnumber` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `classnumber` (`classnumber`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `class` VALUES (1,'Class Six',6),(2,'Class Seven',7),(3,'Class Eight',8),(4,'Class Nine',9),(5,'Class Ten',10),(8,'Class Eleven',11),(9,'Class Twelve',12);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `class` with 7 row(s)
--

--
-- Table structure for table `devices`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dnumber` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `dip` varchar(255) NOT NULL,
  `dport` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dip` (`dip`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `devices` VALUES (3,1,'BLACK CODE IT','192.168.1.201',4370);
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `devices` with 1 row(s)
--

--
-- Table structure for table `exam`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `exid` int(11) NOT NULL AUTO_INCREMENT,
  `examname` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `exam` VALUES (1,'Test Exam','2024','2024-01-01');
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exam` with 1 row(s)
--

--
-- Table structure for table `exam67`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam67` (
  `exid` int(11) NOT NULL AUTO_INCREMENT,
  `examname` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `startdate` date NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam67`
--

LOCK TABLES `exam67` WRITE;
/*!40000 ALTER TABLE `exam67` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `exam67` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exam67` with 0 row(s)
--

--
-- Table structure for table `exam67lesson`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam67lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `subcode` int(11) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `lno` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam67lesson`
--

LOCK TABLES `exam67lesson` WRITE;
/*!40000 ALTER TABLE `exam67lesson` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `exam67lesson` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exam67lesson` with 0 row(s)
--

--
-- Table structure for table `exammark`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exammark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `suniqid` varchar(255) NOT NULL,
  `examid` int(11) NOT NULL,
  `examdate` date NOT NULL,
  `subcode` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `substatus` int(11) NOT NULL,
  `gradecode` varchar(255) NOT NULL,
  `cq` int(11) NOT NULL,
  `mcq` int(11) NOT NULL,
  `practical` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `letterpoint` float NOT NULL,
  `lettergrade` varchar(255) NOT NULL,
  `examuni` varchar(256) NOT NULL,
  `fullmarks` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `examuni` (`examuni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exammark`
--

LOCK TABLES `exammark` WRITE;
/*!40000 ALTER TABLE `exammark` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `exammark` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exammark` with 0 row(s)
--

--
-- Table structure for table `exammark67`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exammark67` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `lno` int(11) NOT NULL,
  `pi` int(11) NOT NULL,
  `uni` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`uni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exammark67`
--

LOCK TABLES `exammark67` WRITE;
/*!40000 ALTER TABLE `exammark67` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `exammark67` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exammark67` with 0 row(s)
--

--
-- Table structure for table `examroutine`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examroutine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exid` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `cgroup` varchar(255) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `examdate` date NOT NULL,
  `examtime` varchar(255) NOT NULL,
  `align` varchar(255) NOT NULL,
  `uexid` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uexid` (`uexid`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examroutine`
--

LOCK TABLES `examroutine` WRITE;
/*!40000 ALTER TABLE `examroutine` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `examroutine` VALUES (1,'1','7','A','1','বাংলা','2024-06-23','10 AM-1PM','l','171A','1'),(2,'1','7','A','2','English','2024-06-24','10 AM-1PM','l','172A','1'),(3,'1','7','A','3','গণিত','2024-06-25','10 AM-1PM','l','173A','1'),(4,'1','7','A','4','বিজ্ঞান','2024-06-26','10 AM-1PM','l','174A','1'),(5,'1','7','A','5','ইতিহাস ও সামাজিক বিজ্ঞান','2024-06-27','10 AM-1PM','l','175A','1'),(6,'1','7','A','6','ডিজিটাল প্রযুক্তি','2024-06-28','10 AM-1PM','l','176A','1'),(7,'1','7','A','7','স্বাস্থ্য সুরক্ষা','2024-06-29','10 AM-1PM','r','177A','1'),(8,'1','7','A','8','জীবন ও জীবিকা','2024-06-30','10 AM-1PM','r','178A','1'),(9,'1','7','A','9','শিল্প ও সংস্কৃতি','2024-07-01','10 AM-1PM','r','179A','1'),(10,'1','7','A','10','ইসলাম শিক্ষা','2024-07-02','10 AM-1PM','r','1710A','1'),(11,'1','7','A','11','হিন্দুধর্ম শিক্ষা','2024-07-03','10 AM-1PM','r','1711A','1'),(45,'1','6','A','1','বাংলা','2024-06-03','10.AM-1PM','l','161A','1'),(46,'1','6','A','2','English','2024-06-04','10.AM-1PM','l','162A','1'),(47,'1','6','A','3','গণিত','2024-06-05','10.AM-1PM','l','163A','1'),(48,'1','6','A','4','বিজ্ঞান','2024-06-06','10.AM-1PM','l','164A','1'),(49,'1','6','A','5','ইতিহাস ও সামাজিক বিজ্ঞান','2024-06-07','10.AM-1PM','l','165A','1'),(50,'1','6','A','6','ডিজিটাল প্রযুক্তি','2024-06-08','10.AM-1PM','l','166A','1'),(51,'1','6','A','7','স্বাস্থ্য সুরক্ষা','2024-06-09','10.AM-1PM','r','167A','1'),(52,'1','6','A','8','জীবন ও জীবিকা','2024-06-10','10.AM-1PM','r','168A','1'),(53,'1','6','A','9','শিল্প ও সংস্কৃতি','2024-06-11','10.AM-1PM','r','169A','1'),(54,'1','6','A','10','ইসলাম শিক্ষা','2024-06-12','10.AM-1PM','r','1610A','1'),(55,'1','6','A','11','হিন্দুধর্ম শিক্ষা','2024-06-13','10.AM-1PM','r','1611A','1');
/*!40000 ALTER TABLE `examroutine` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examroutine` with 22 row(s)
--

--
-- Table structure for table `examseatinfo`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `studentroll` int(11) NOT NULL,
  `benchcol` int(11) NOT NULL,
  `benchrow` int(11) NOT NULL,
  `align` varchar(255) NOT NULL,
  `uniid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniid` (`uniid`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatinfo`
--

LOCK TABLES `examseatinfo` WRITE;
/*!40000 ALTER TABLE `examseatinfo` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `examseatinfo` VALUES (1,1,1,101,6,1,1,1,'L',1110161),(2,1,1,101,6,2,1,2,'L',1110162),(3,1,1,101,6,3,1,3,'L',1110163),(4,1,1,101,6,4,1,4,'L',1110164),(5,1,1,101,6,5,1,5,'L',1110165),(6,1,1,101,6,6,2,1,'L',1110166),(7,1,1,101,6,7,2,2,'L',1110167),(8,1,1,101,6,8,2,3,'L',1110168),(9,1,1,101,6,9,2,4,'L',1110169),(10,1,1,101,6,10,2,5,'L',11101610),(11,1,1,101,6,11,2,6,'L',11101611),(12,1,1,101,6,12,3,1,'L',11101612),(13,1,1,101,6,13,3,2,'L',11101613),(14,1,1,101,6,14,3,3,'L',11101614),(15,1,1,101,6,15,3,4,'L',11101615),(16,1,1,101,6,16,3,5,'L',11101616),(17,1,1,101,6,17,3,6,'L',11101617),(18,1,1,101,6,18,3,7,'L',11101618),(19,1,1,101,6,19,3,8,'L',11101619),(20,1,1,101,6,26,2,4,'R',11101620),(21,1,1,101,6,27,2,5,'R',11101621),(22,1,1,101,6,28,2,6,'R',11101622),(23,1,1,101,6,23,3,1,'L',11101623),(24,1,1,101,6,24,3,2,'L',11101624),(25,1,1,101,6,25,3,3,'L',11101625),(26,1,1,101,6,26,3,4,'L',11101626),(27,1,1,101,6,27,3,5,'L',11101627),(28,1,1,101,6,28,3,6,'L',11101628),(29,1,1,101,6,29,3,7,'L',11101629),(30,1,1,101,6,30,3,8,'L',11101630),(31,1,1,101,6,39,3,1,'R',11101631),(32,1,1,101,6,40,3,2,'R',11101632),(33,1,1,101,6,41,3,3,'R',11101633),(34,1,1,101,6,42,3,4,'R',11101634),(35,1,1,101,6,43,3,5,'R',11101635),(36,1,1,101,6,44,3,6,'R',11101636),(37,1,1,101,6,45,3,7,'R',11101637),(38,1,1,101,6,46,3,8,'R',11101638),(44,1,1,101,6,41,1,1,'R',11101641),(45,1,1,101,6,42,1,2,'R',11101642),(46,1,1,101,6,43,1,3,'R',11101643),(47,1,1,101,6,44,1,4,'R',11101644),(48,1,1,101,6,45,1,5,'R',11101645),(55,1,1,101,6,46,2,1,'R',11101646),(56,1,1,101,6,47,2,2,'R',11101647),(57,1,1,101,6,48,2,3,'R',11101648),(58,1,1,101,6,49,2,4,'R',11101649),(59,1,1,101,6,50,2,5,'R',11101650),(60,1,1,101,6,51,2,6,'R',11101651),(69,1,1,101,6,52,3,1,'R',11101652),(70,1,1,101,6,53,3,2,'R',11101653),(71,1,1,101,6,54,3,3,'R',11101654),(72,1,1,101,6,56,3,4,'R',11101656),(73,1,1,101,6,57,3,5,'R',11101657),(74,1,1,101,6,58,3,6,'R',11101658),(75,1,1,101,6,59,3,7,'R',11101659),(76,1,1,101,6,60,3,8,'R',11101660);
/*!40000 ALTER TABLE `examseatinfo` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatinfo` with 57 row(s)
--

--
-- Table structure for table `examseatplan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `startroll` int(11) NOT NULL,
  `endroll` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL,
  `totalstudent` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatplan`
--

LOCK TABLES `examseatplan` WRITE;
/*!40000 ALTER TABLE `examseatplan` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `examseatplan` VALUES (1,1,1,101,6,'Mollika',1,38,11101,38);
/*!40000 ALTER TABLE `examseatplan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatplan` with 1 row(s)
--

--
-- Table structure for table `examseatplanc1c2`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplanc1c2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `startroll` int(11) NOT NULL,
  `endroll` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL,
  `totalstudent` int(11) NOT NULL,
  `classnumber2` int(11) NOT NULL,
  `section2` varchar(255) NOT NULL,
  `startroll2` int(11) NOT NULL,
  `endroll2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatplanc1c2`
--

LOCK TABLES `examseatplanc1c2` WRITE;
/*!40000 ALTER TABLE `examseatplanc1c2` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `examseatplanc1c2` VALUES (1,1,1,101,6,'Mollika',1,19,11101,38,6,'Shapla',1,60);
/*!40000 ALTER TABLE `examseatplanc1c2` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatplanc1c2` with 1 row(s)
--

--
-- Table structure for table `examseatplanc1c2c3`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplanc1c2c3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `startroll` int(11) NOT NULL,
  `endroll` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL,
  `totalstudent` int(11) NOT NULL,
  `classnumber2` int(11) NOT NULL,
  `section2` varchar(255) NOT NULL,
  `startroll2` int(11) NOT NULL,
  `endroll2` int(11) NOT NULL,
  `classnumber3` int(11) NOT NULL,
  `section3` varchar(255) NOT NULL,
  `startroll3` int(11) NOT NULL,
  `endroll3` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatplanc1c2c3`
--

LOCK TABLES `examseatplanc1c2c3` WRITE;
/*!40000 ALTER TABLE `examseatplanc1c2c3` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `examseatplanc1c2c3` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatplanc1c2c3` with 0 row(s)
--

--
-- Table structure for table `examseatplanc2`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplanc2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `startroll` int(11) NOT NULL,
  `endroll` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL,
  `totalstudent` int(11) NOT NULL,
  `classnumber2` int(11) NOT NULL,
  `section2` varchar(255) NOT NULL,
  `startroll2` int(11) NOT NULL,
  `endroll2` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatplanc2`
--

LOCK TABLES `examseatplanc2` WRITE;
/*!40000 ALTER TABLE `examseatplanc2` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `examseatplanc2` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatplanc2` with 0 row(s)
--

--
-- Table structure for table `expense`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `des` varchar(2000) NOT NULL,
  `amount` int(11) NOT NULL,
  `expenseid` int(11) DEFAULT NULL,
  `note` varchar(10000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `expense` VALUES (1,'2024-04-18','Tea Bill',5000,0,'Shuvo'),(2,'2024-06-26','Tea Bill',150,0,'Shuvo');
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `expense` with 2 row(s)
--

--
-- Table structure for table `expense_catagory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_catagory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_catagory`
--

LOCK TABLES `expense_catagory` WRITE;
/*!40000 ALTER TABLE `expense_catagory` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `expense_catagory` VALUES (2,'Tea Bill');
/*!40000 ALTER TABLE `expense_catagory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `expense_catagory` with 1 row(s)
--

--
-- Table structure for table `grademark`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grademark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gradecode` varchar(255) NOT NULL,
  `markfrom` int(11) NOT NULL,
  `markupto` int(11) NOT NULL,
  `lettergrade` varchar(255) NOT NULL,
  `letterpoint` float NOT NULL,
  `uni` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`uni`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grademark`
--

LOCK TABLES `grademark` WRITE;
/*!40000 ALTER TABLE `grademark` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `grademark` VALUES (1,'gr001',0,32,'F',0,'gr001F'),(2,'gr001',33,39,'D',1,'gr001D'),(3,'gr001',40,49,'C',2,'gr001C'),(4,'gr001',50,59,'B',3,'gr001B'),(5,'gr001',60,69,'A-',3.5,'gr001A-'),(6,'gr001',70,79,'A',4,'gr001A'),(7,'gr001',80,100,'A+',5,'gr001A+'),(8,'gr002',40,50,'A+',5,'gr002A+'),(9,'gr002',0,16,'F',0,'gr002F'),(11,'gr002',17,19,'D',1,'gr002D'),(12,'gr002',20,24,'C',2,'gr002C'),(13,'gr002',25,29,'B',3,'gr002B'),(14,'gr002',30,34,'A-',3.5,'gr002A-'),(15,'gr002',35,39,'A',4,'gr002A'),(16,'gr003',20,25,'A+',5,'gr003A+'),(17,'gr003',17,19,'A',4,'gr003A'),(18,'gr003',15,16,'A-',3.5,'gr003A-'),(20,'gr003',12,14,'B',3,'gr003B'),(21,'gr003',10,11,'C',2,'gr003C'),(23,'gr003',8,9,'D',1,'gr003D'),(24,'gr003',1,7,'F',0,'gr003F');
/*!40000 ALTER TABLE `grademark` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `grademark` with 21 row(s)
--

--
-- Table structure for table `gradename`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gradename` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gradename` varchar(255) NOT NULL,
  `fullmark` int(255) NOT NULL,
  `gradecode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fullmark` (`fullmark`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gradename`
--

LOCK TABLES `gradename` WRITE;
/*!40000 ALTER TABLE `gradename` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `gradename` VALUES (2,'Grade 1(Out of 100)',100,'gr001'),(3,'Grade2(Out of  50)',50,'gr002'),(4,'Grade3',25,'gr003');
/*!40000 ALTER TABLE `gradename` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `gradename` with 3 row(s)
--

--
-- Table structure for table `groupsecname`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupsecname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `sectionname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupsecname`
--

LOCK TABLES `groupsecname` WRITE;
/*!40000 ALTER TABLE `groupsecname` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `groupsecname` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `groupsecname` with 0 row(s)
--

--
-- Table structure for table `imagesl`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagesl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `stuuniqid` varchar(255) NOT NULL,
  `imgname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stuuniqid` (`stuuniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagesl`
--

LOCK TABLES `imagesl` WRITE;
/*!40000 ALTER TABLE `imagesl` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `imagesl` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `imagesl` with 0 row(s)
--

--
-- Table structure for table `income`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `des` varchar(2000) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `income`
--

LOCK TABLES `income` WRITE;
/*!40000 ALTER TABLE `income` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `income` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `income` with 0 row(s)
--

--
-- Table structure for table `inviceid`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inviceid` (
  `id` int(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `uni_iid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  UNIQUE KEY `uni_iid` (`uni_iid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inviceid`
--

LOCK TABLES `inviceid` WRITE;
/*!40000 ALTER TABLE `inviceid` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `inviceid` VALUES (10,'5','105','Unpaid'),(1,'1','11','Paid'),(11,'144','11144','Paid'),(12,'144','12144','Paid'),(13,'160','13160','Paid'),(14,'144','14144','Paid'),(15,'144','15144','Paid'),(15,'343','15343','Paid'),(15,'356','15356','Paid'),(15,'357','15357','Paid'),(15,'358','15358','Unpaid'),(16,'358','16358','Unpaid'),(16,'385','16385','Unpaid'),(17,'378','17378','Unpaid'),(17,'379','17379','Unpaid'),(17,'380','17380','Unpaid'),(17,'381','17381','Unpaid'),(17,'382','17382','Unpaid'),(2,'92','292','Unpaid'),(3,'92','392','Unpaid'),(4,'92','492','Unpaid'),(5,'94','594','Paid'),(6,'95','695','Unpaid'),(7,'95','795','Unpaid'),(8,'95','895','Unpaid'),(8,'96','896','Unpaid'),(8,'97','897','Unpaid'),(0,'95','95','Unpaid'),(9,'96','996','Unpaid'),(9,'97','997','Unpaid');
/*!40000 ALTER TABLE `inviceid` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `inviceid` with 30 row(s)
--

--
-- Table structure for table `invoicetrx`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoicetrx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iid` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoicetrx`
--

LOCK TABLES `invoicetrx` WRITE;
/*!40000 ALTER TABLE `invoicetrx` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `invoicetrx` VALUES (8,'16Mollika1',100,'2024-06-01',''),(9,'16Mollika1',20,'2024-06-04',''),(10,'17A5',200,'2024-06-21',''),(11,'27A5',300,'2024-06-21',''),(12,'27A5',200,'2024-06-21',''),(13,'37A5',400,'2024-06-21',''),(14,'811Arts305',300,'2024-06-26',''),(15,'811Arts305',100,'2024-06-26',''),(16,'211Science105',700,'2024-06-29',''),(17,'311Science105',2000,'2024-06-29',''),(18,'811Arts307',500,'2024-06-29',''),(19,'811Arts305',100,'2024-06-29','TAP-TAP'),(20,'111Arts307',1200,'2024-06-30','UPay-UPay'),(21,'211Arts307',2000,'2024-06-30','UPay-UPay'),(22,'311Arts307',2700,'2024-06-30','UPay-UPay'),(23,'411Arts307',1000,'2024-06-30','UPay-UPay'),(24,'16A1',500,'2024-06-30','NAGAD-Nagad'),(25,'26A1',1000,'2024-06-30','NAGAD-Nagad'),(26,'36A1',350,'2024-06-30','NAGAD-Nagad'),(27,'8',10,'2024-06-27','Manual'),(28,'8',20,'2024-06-27','Manual'),(29,'8',30,'2024-06-27','Manual'),(30,'8',500,'2024-06-27','Manual'),(31,'8',10,'2024-06-27','Manual'),(32,'8',20,'2024-06-27','Manual'),(33,'8',30,'2024-06-27','Manual'),(34,'8',500,'2024-06-27','Manual'),(35,'8',20,'2024-06-27','Manual'),(36,'8',20,'2024-06-27','Manual'),(37,'8',20,'2024-06-27','Manual'),(38,'8',30,'2024-06-27','Manual'),(39,'8',20,'2024-06-27','Manual'),(40,'8',20,'2024-06-27','Manual'),(41,'8',20,'2024-06-27','Manual'),(42,'8',20,'2024-06-27','Manual'),(43,'8',2,'2024-06-27','Manual'),(44,'8',20,'2024-06-27','Manual'),(45,'8',20,'2024-06-27','Manual'),(46,'8',20,'2024-06-27','Manual'),(47,'8',30,'2024-06-27','Manual'),(48,'111Science102',100,'2024-07-01','Manual'),(49,'46A1',1450,'2024-07-04',NULL),(50,'16A5',1000,'2024-07-06','BKASH-BKash');
/*!40000 ALTER TABLE `invoicetrx` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `invoicetrx` with 43 row(s)
--

--
-- Table structure for table `lesson`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `chaptername` varchar(1000) NOT NULL,
  `lno` int(11) NOT NULL,
  `lname` varchar(1000) NOT NULL,
  `lpis` varchar(1000) NOT NULL,
  `lpic` varchar(1000) NOT NULL,
  `lpit` varchar(1000) NOT NULL,
  `uni` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`uni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lesson`
--

LOCK TABLES `lesson` WRITE;
/*!40000 ALTER TABLE `lesson` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `lesson` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `lesson` with 0 row(s)
--

--
-- Table structure for table `libary_author`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_name` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_author`
--

LOCK TABLES `libary_author` WRITE;
/*!40000 ALTER TABLE `libary_author` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `libary_author` VALUES (1,'Kazi Nazrul Islam');
/*!40000 ALTER TABLE `libary_author` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_author` with 1 row(s)
--

--
-- Table structure for table `libary_book_list`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_book_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(2000) NOT NULL,
  `author_name` varchar(2000) NOT NULL,
  `book_name` varchar(2000) NOT NULL,
  `book_barcode` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_book_list`
--

LOCK TABLES `libary_book_list` WRITE;
/*!40000 ALTER TABLE `libary_book_list` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `libary_book_list` VALUES (1,'Lacture','Robindronath ','Sonar Tori','125600'),(2,'Panjaree','Kazi Nazrul Islam','Ognibina','1256458'),(3,'Panjaree','Kazi Nazrul Islam','Ab2','djklsajfkl');
/*!40000 ALTER TABLE `libary_book_list` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_book_list` with 3 row(s)
--

--
-- Table structure for table `libary_book_stock`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_book_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `publisher_name` varchar(2000) NOT NULL,
  `author_name` varchar(2000) NOT NULL,
  `book_name` varchar(2000) NOT NULL,
  `book_barcode` varchar(2000) NOT NULL,
  `total` int(11) NOT NULL,
  `running_amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookid` (`bookid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_book_stock`
--

LOCK TABLES `libary_book_stock` WRITE;
/*!40000 ALTER TABLE `libary_book_stock` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `libary_book_stock` VALUES (1,1,'Lacture','Robindronath ','Sonar Tori','125600',20,20),(2,2,'Panjaree','Kazi Nazrul Islam','Ognibina','1256458',5,5),(3,3,'Panjaree','Kazi Nazrul Islam','Ab2','djklsajfkl',5,5);
/*!40000 ALTER TABLE `libary_book_stock` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_book_stock` with 3 row(s)
--

--
-- Table structure for table `libary_libariyan_user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_libariyan_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_libariyan_user`
--

LOCK TABLES `libary_libariyan_user` WRITE;
/*!40000 ALTER TABLE `libary_libariyan_user` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `libary_libariyan_user` VALUES (3,'Mita Biswas','mita001','$2y$10$ocVhLZlED19KjnzQsee8nOsECOIuzvxP/4PiAPas1xZ3qovcuUGNi','2024-05-10 08:08:28','Account');
/*!40000 ALTER TABLE `libary_libariyan_user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_libariyan_user` with 1 row(s)
--

--
-- Table structure for table `libary_publisher`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_publisher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_publisher`
--

LOCK TABLES `libary_publisher` WRITE;
/*!40000 ALTER TABLE `libary_publisher` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `libary_publisher` VALUES (5,'Panjaree');
/*!40000 ALTER TABLE `libary_publisher` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_publisher` with 1 row(s)
--

--
-- Table structure for table `library_book_issue`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library_book_issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) DEFAULT NULL,
  `publisher_name` varchar(255) DEFAULT NULL,
  `author_name` varchar(255) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `book_barcode` varchar(50) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_expiry` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `student_id` varchar(11) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `rfid_card` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `library_book_issue`
--

LOCK TABLES `library_book_issue` WRITE;
/*!40000 ALTER TABLE `library_book_issue` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `library_book_issue` VALUES (10,1,'Lacture','Robindronath ','Sonar Tori','125600','2024-05-01','2024-05-10','0000-00-00',9,'7A5','SUMAIYA ISLAM','7','B','01760274166','returned',12383397),(16,1,'Lacture','Robindronath ','Sonar Tori','125600','2024-05-02','2024-05-05','2024-05-15',3,'7A5','SUMAIYA ISLAM','7','B','01760274166','Returned',12383397),(17,1,'Lacture','Robindronath ','Sonar Tori','125600','2024-05-02','2024-05-05','2024-05-15',3,'7B6','SUMAIYA ISLAM','7','B','01760274166','Returned',12383397),(18,1,'Lacture','Robindronath ','Sonar Tori','125600','2024-05-09','2024-05-17','2024-05-15',8,'7A5','SUMAIYA ISLAM','7','B','01760274166','Returned',12383397),(19,1,'Lacture','Robindronath ','Sonar Tori','125600','2024-05-01','2024-05-07','2024-05-10',6,'7B6','SUMAIYA ISLAM','7','B','01760274166','Returned',12383397),(20,2,'Panjaree','Kazi Nazrul Islam','Ognibina','1256458','2024-05-09','2024-05-14','2024-05-17',5,'7B6','SUMAIYA ISLAM','7','B','01760274166','Returned',12383397);
/*!40000 ALTER TABLE `library_book_issue` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `library_book_issue` with 6 row(s)
--

--
-- Table structure for table `machineattlog`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machineattlog` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `atime` varchar(255) NOT NULL,
  `cinout` varchar(255) NOT NULL,
  `cstateid` int(11) NOT NULL,
  `uniid` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uniid` (`uniid`)
) ENGINE=InnoDB AUTO_INCREMENT=844 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machineattlog`
--

LOCK TABLES `machineattlog` WRITE;
/*!40000 ALTER TABLE `machineattlog` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `machineattlog` VALUES (1,221,'6Mollika21','Unknown','2024-04-29','09:03:00','Clock IN',1,'2211714374180'),(2,220,'6Mollika20','Unknown','2024-04-29','09:02:58','Clock IN',1,'2201714374178'),(3,211,'6Mollika11','Unknown','2024-04-29','09:02:57','Clock IN',1,'2111714374177'),(4,226,'6Mollika26','Unknown','2024-04-29','09:02:55','Clock IN',1,'2261714374175'),(5,204,'6Mollika4','Unknown','2024-04-29','09:02:54','Clock IN',1,'2041714374174'),(6,201,'6Mollika1','Unknown','2024-04-29','09:02:51','Clock IN',1,'2011714374171'),(7,201,'6Mollika1','Unknown','2024-04-29','00:00:23','Unknown',3,'2011714341623'),(8,204,'6Mollika4','Unknown','2024-04-29','00:00:21','Unknown',3,'2041714341621'),(9,211,'6Mollika11','Unknown','2024-04-29','00:00:19','Unknown',3,'2111714341619'),(10,220,'6Mollika20','Unknown','2024-04-29','00:00:18','Unknown',3,'2201714341618'),(11,221,'6Mollika21','Unknown','2024-04-29','00:00:16','Unknown',3,'2211714341616'),(12,226,'6Mollika26','Unknown','2024-04-29','00:00:13','Unknown',3,'2261714341613'),(13,2,'6Mollika26','Unknown','2024-01-30','21:30:48','Unknown',3,'21706646648'),(14,12,'6Mollika26','Unknown','2024-01-27','13:17:19','Clock Out',2,'121706357839'),(15,3,'6Mollika26','Unknown','2024-01-14','21:03:55','Unknown',3,'31705262635'),(16,4,'6Mollika26','Unknown','2023-11-19','12:16:54','Clock Out',2,'41700392614'),(17,4,'6Mollika26','Unknown','2023-11-19','12:16:53','Clock Out',2,'41700392613'),(18,4,'6Mollika26','Unknown','2023-11-19','12:16:50','Clock Out',2,'41700392610'),(19,4,'6Mollika26','Unknown','2023-11-19','12:16:43','Clock Out',2,'41700392603'),(20,4,'6Mollika26','Fingerprint','2023-10-28','11:49:01','Clock IN',1,'41698486541'),(21,3,'6Mollika26','Fingerprint','2023-10-28','11:48:57','Clock IN',1,'31698486537'),(22,2,'6Mollika26','Fingerprint','2023-10-28','11:48:51','Clock IN',1,'21698486531'),(23,3,'6Mollika26','Fingerprint','2023-10-28','10:55:04','Clock IN',1,'31698483304'),(24,2,'6Mollika26','Fingerprint','2023-10-28','10:54:59','Clock IN',1,'21698483299'),(25,4,'6Mollika26','Fingerprint','2023-10-28','10:54:44','Clock IN',1,'41698483284'),(26,1,'6Mollika26','Unknown','2023-06-10','18:20:57','Unknown',3,'11686414057'),(27,1,'6Mollika26','Unknown','2023-06-10','18:20:43','Unknown',3,'11686414043'),(28,1,'6Mollika26','Unknown','2023-06-10','18:20:12','Unknown',3,'11686414012'),(29,1,'6Mollika26','Unknown','2023-06-10','18:19:59','Unknown',3,'11686413999'),(30,1,'6Mollika26','Unknown','2023-06-09','15:08:51','Clock Out',2,'11686316131'),(31,1,'6Mollika26','Unknown','2023-06-09','15:08:50','Clock Out',2,'11686316130'),(32,1,'6Mollika26','Unknown','2023-06-09','15:08:35','Clock Out',2,'11686316115'),(33,1012,'6Mollika26','Unknown','2023-05-28','01:11:29','Unknown',3,'10121685229089'),(34,1009,'6Mollika26','Unknown','2023-05-28','01:11:28','Unknown',3,'10091685229088'),(35,1005,'6Mollika26','Unknown','2023-05-28','01:11:26','Unknown',3,'10051685229086'),(36,1004,'6Mollika26','Unknown','2023-05-28','01:11:24','Unknown',3,'10041685229084'),(37,1027,'6Mollika26','Unknown','2023-05-28','01:11:23','Unknown',3,'10271685229083'),(38,1007,'6Mollika26','Unknown','2023-05-28','01:11:21','Unknown',3,'10071685229081'),(39,1031,'6Mollika26','Unknown','2023-05-28','01:11:20','Unknown',3,'10311685229080'),(40,1021,'6Mollika26','Unknown','2023-05-28','01:11:17','Unknown',3,'10211685229077'),(41,1072,'6Mollika26','Unknown','2023-05-28','01:11:16','Unknown',3,'10721685229076'),(42,1020,'6Mollika26','Unknown','2023-05-28','01:11:15','Unknown',3,'10201685229075'),(43,1052,'6Mollika26','Unknown','2023-05-28','01:11:13','Unknown',3,'10521685229073'),(44,1062,'6Mollika26','Unknown','2023-05-28','01:11:12','Unknown',3,'10621685229072'),(45,1042,'6Mollika26','Unknown','2023-05-28','01:11:10','Unknown',3,'10421685229070'),(46,1057,'6Mollika26','Unknown','2023-05-28','01:11:09','Unknown',3,'10571685229069'),(47,817,'6Mollika26','Unknown','2023-05-28','01:10:56','Unknown',3,'8171685229056'),(48,821,'6Mollika26','Unknown','2023-05-28','01:10:54','Unknown',3,'8211685229054'),(49,833,'6Mollika26','Unknown','2023-05-28','01:10:52','Unknown',3,'8331685229052'),(50,840,'6Mollika26','Unknown','2023-05-28','01:10:50','Unknown',3,'8401685229050'),(51,863,'6Mollika26','Unknown','2023-05-28','01:10:48','Unknown',3,'8631685229048'),(52,811,'6Mollika26','Unknown','2023-05-28','01:10:43','Unknown',3,'8111685229043'),(53,420,'6Mollika26','Unknown','2023-05-28','01:10:39','Unknown',3,'4201685229039'),(54,825,'6Mollika26','Unknown','2023-05-28','01:09:44','Unknown',3,'8251685228984'),(55,856,'6Mollika26','Unknown','2023-05-28','01:09:43','Unknown',3,'8561685228983'),(56,260,'6Mollika26','Unknown','2023-05-28','01:09:32','Unknown',3,'2601685228972'),(57,282,'6Mollika26','Unknown','2023-05-28','01:09:31','Unknown',3,'2821685228971'),(58,278,'6Mollika26','Unknown','2023-05-28','01:09:29','Unknown',3,'2781685228969'),(59,279,'6Mollika26','Unknown','2023-05-28','01:09:27','Unknown',3,'2791685228967'),(60,294,'6Mollika26','Unknown','2023-05-28','01:09:26','Unknown',3,'2941685228966'),(61,635,'6Mollika26','Unknown','2023-05-28','01:09:12','Unknown',3,'6351685228952'),(62,616,'6Mollika26','Unknown','2023-05-28','01:09:10','Unknown',3,'6161685228950'),(63,624,'6Mollika26','Unknown','2023-05-28','01:09:08','Unknown',3,'6241685228948'),(64,621,'6Mollika26','Unknown','2023-05-28','01:09:06','Unknown',3,'6211685228946'),(65,644,'6Mollika26','Unknown','2023-05-28','01:09:04','Unknown',3,'6441685228944'),(66,688,'6Mollika26','Unknown','2023-05-28','01:09:02','Unknown',3,'6881685228942'),(67,855,'6Mollika26','Unknown','2023-05-28','01:08:55','Unknown',3,'8551685228935'),(68,845,'6Mollika26','Unknown','2023-05-28','01:08:54','Unknown',3,'8451685228934'),(69,844,'6Mollika26','Unknown','2023-05-28','01:08:50','Unknown',3,'8441685228930'),(70,820,'6Mollika26','Unknown','2023-05-28','01:08:48','Unknown',3,'8201685228928'),(71,849,'6Mollika26','Unknown','2023-05-28','01:08:46','Unknown',3,'8491685228926'),(72,201,'6Mollika1','Unknown','2024-04-29','15:06:12','Clock Out',2,'2011714395972'),(73,204,'6Mollika4','Unknown','2024-04-29','15:06:10','Clock Out',2,'2041714395970'),(74,226,'6Mollika26','Unknown','2024-04-29','15:06:08','Clock Out',2,'2261714395968'),(75,211,'6Mollika11','Unknown','2024-04-29','15:06:07','Clock Out',2,'2111714395967'),(76,220,'6Mollika20','Unknown','2024-04-29','15:06:05','Clock Out',2,'2201714395965'),(77,221,'6Mollika21','Unknown','2024-04-29','15:06:03','Clock Out',2,'2211714395963'),(78,605,'11Science105','Card','2024-06-24','10:43:26','Clock IN',1,'6051719218606'),(79,1,'11Science105','Password','2024-03-26','17:24:58','Unknown',3,'11711470298'),(80,222,'6Mollika22','Card','2024-03-26','12:24:43','Clock Out',2,'2221711452283'),(81,222,'6Mollika22','Card','2024-03-26','12:24:42','Clock Out',2,'2221711452282'),(82,2,'','Card','2024-06-26','14:45:47','Clock Out',2,'21719405947'),(83,2,'','Card','2024-06-26','14:45:10','Clock Out',2,'21719405910'),(84,14,'','Fingerprint','2024-06-26','13:02:11','Clock Out',2,'141719399731'),(85,12,'','Fingerprint','2024-06-26','10:54:55','Clock IN',1,'121719392095'),(86,6,'','Fingerprint','2024-06-26','09:55:08','Clock IN',1,'61719388508'),(87,16,'','Fingerprint','2024-06-26','09:46:15','Clock IN',1,'161719387975'),(88,15,'','Fingerprint','2024-06-26','09:42:13','Clock IN',1,'151719387733'),(89,8,'','Fingerprint','2024-06-26','09:30:34','Clock IN',1,'81719387034'),(90,3,'','Fingerprint','2024-06-26','09:22:30','Clock IN',1,'31719386550'),(91,5,'','Fingerprint','2024-06-26','09:21:35','Clock IN',1,'51719386495'),(92,11,'','Fingerprint','2024-06-26','09:12:48','Clock IN',1,'111719385968'),(93,13,'','Fingerprint','2024-06-26','09:09:44','Clock IN',1,'131719385784'),(94,9,'','Fingerprint','2024-06-26','09:09:32','Clock IN',1,'91719385772'),(95,17,'','Fingerprint','2024-06-26','09:09:23','Clock IN',1,'171719385763'),(96,4,'','Fingerprint','2024-06-26','09:08:44','Clock IN',1,'41719385724'),(97,2,'','Fingerprint','2024-06-26','09:07:50','Clock IN',1,'21719385670'),(98,2,'','Fingerprint','2024-06-25','10:32:38','Clock IN',1,'21719304358'),(99,2,'','Fingerprint','2024-06-20','12:45:51','Clock Out',2,'21718880351'),(100,2,'','Fingerprint','2024-06-19','09:52:55','Clock IN',1,'21718783575'),(101,12,'','Fingerprint','2024-06-16','12:25:21','Clock Out',2,'121718533521'),(102,2,'','Fingerprint','2024-06-16','10:38:57','Clock IN',1,'21718527137'),(103,14,'','Fingerprint','2024-06-13','10:50:26','Clock IN',1,'141718268626'),(104,17,'','Fingerprint','2024-06-13','10:50:12','Clock IN',1,'171718268612'),(105,2,'','Fingerprint','2024-06-13','09:44:56','Clock IN',1,'21718264696'),(106,3,'','Fingerprint','2024-06-12','14:42:35','Clock Out',2,'31718196155'),(107,12,'','Fingerprint','2024-06-12','14:42:21','Clock Out',2,'121718196141'),(108,15,'','Fingerprint','2024-06-12','13:49:02','Clock Out',2,'151718192942'),(109,16,'','Fingerprint','2024-06-12','13:45:45','Clock Out',2,'161718192745'),(110,11,'','Fingerprint','2024-06-12','13:45:27','Clock Out',2,'111718192727'),(111,17,'','Fingerprint','2024-06-12','13:44:55','Clock Out',2,'171718192695'),(112,2,'','Fingerprint','2024-06-12','13:44:41','Clock Out',2,'21718192681'),(113,4,'','Fingerprint','2024-06-12','13:42:17','Clock Out',2,'41718192537'),(114,5,'','Fingerprint','2024-06-12','13:42:11','Clock Out',2,'51718192531'),(115,8,'','Fingerprint','2024-06-12','13:42:00','Clock Out',2,'81718192520'),(116,13,'','Fingerprint','2024-06-12','13:41:56','Clock Out',2,'131718192516'),(117,6,'','Fingerprint','2024-06-12','13:41:50','Clock Out',2,'61718192510'),(118,2,'','Fingerprint','2024-06-12','12:14:07','Clock Out',2,'21718187247'),(119,10,'','Fingerprint','2024-06-12','10:00:09','Clock IN',1,'101718179209'),(120,13,'','Fingerprint','2024-06-12','09:46:16','Clock IN',1,'131718178376'),(121,11,'','Fingerprint','2024-06-12','09:45:38','Clock IN',1,'111718178338'),(122,6,'','Fingerprint','2024-06-12','09:43:18','Clock IN',1,'61718178198'),(123,16,'','Fingerprint','2024-06-12','09:35:46','Clock IN',1,'161718177746'),(124,17,'','Fingerprint','2024-06-12','09:35:43','Clock IN',1,'171718177743'),(125,15,'','Fingerprint','2024-06-12','09:35:34','Clock IN',1,'151718177734'),(126,9,'','Fingerprint','2024-06-12','09:35:20','Clock IN',1,'91718177720'),(127,12,'','Fingerprint','2024-06-12','09:35:14','Clock IN',1,'121718177714'),(128,3,'','Fingerprint','2024-06-12','09:35:11','Clock IN',1,'31718177711'),(129,5,'','Fingerprint','2024-06-12','09:35:02','Clock IN',1,'51718177702'),(130,4,'','Fingerprint','2024-06-12','09:34:50','Clock IN',1,'41718177690'),(131,8,'','Fingerprint','2024-06-12','09:34:44','Clock IN',1,'81718177684'),(132,10,'','Fingerprint','2024-06-11','15:24:34','Clock Out',2,'101718112274'),(133,16,'','Fingerprint','2024-06-11','15:24:25','Clock Out',2,'161718112265'),(134,12,'','Fingerprint','2024-06-11','15:24:17','Clock Out',2,'121718112257'),(135,2,'','Fingerprint','2024-06-11','15:24:06','Clock Out',2,'21718112246'),(136,3,'','Fingerprint','2024-06-11','15:21:55','Clock Out',2,'31718112115'),(137,13,'','Fingerprint','2024-06-11','15:21:07','Clock Out',2,'131718112067'),(138,8,'','Fingerprint','2024-06-11','15:20:33','Clock Out',2,'81718112033'),(139,15,'','Fingerprint','2024-06-11','15:20:24','Clock Out',2,'151718112024'),(140,5,'','Fingerprint','2024-06-11','15:20:19','Clock Out',2,'51718112019'),(141,11,'','Fingerprint','2024-06-11','15:20:09','Clock Out',2,'111718112009'),(142,6,'','Fingerprint','2024-06-11','15:19:57','Clock Out',2,'61718111997'),(143,2,'','Fingerprint','2024-06-11','10:27:42','Clock IN',1,'21718094462'),(144,13,'','Fingerprint','2024-06-11','09:51:23','Clock IN',1,'131718092283'),(145,10,'','Fingerprint','2024-06-11','09:45:08','Clock IN',1,'101718091908'),(146,16,'','Fingerprint','2024-06-11','09:41:27','Clock IN',1,'161718091687'),(147,15,'','Fingerprint','2024-06-11','09:31:00','Clock IN',1,'151718091060'),(148,3,'','Fingerprint','2024-06-11','09:29:01','Clock IN',1,'31718090941'),(149,8,'','Fingerprint','2024-06-11','09:14:28','Clock IN',1,'81718090068'),(150,11,'','Fingerprint','2024-06-11','09:08:57','Clock IN',1,'111718089737'),(151,4,'','Fingerprint','2024-06-11','09:06:53','Clock IN',1,'41718089613'),(152,6,'','Fingerprint','2024-06-11','09:06:46','Clock IN',1,'61718089606'),(153,2,'','Fingerprint','2024-06-11','09:06:42','Clock IN',1,'21718089602'),(154,5,'','Fingerprint','2024-06-11','08:45:27','Clock IN',1,'51718088327'),(155,17,'','Fingerprint','2024-06-11','08:44:45','Clock IN',1,'171718088285'),(156,9,'','Fingerprint','2024-06-11','08:30:02','Clock IN',1,'91718087402'),(157,12,'','Fingerprint','2024-06-11','08:29:53','Clock IN',1,'121718087393'),(158,2,'','Fingerprint','2024-06-10','13:57:02','Clock Out',2,'21718020622'),(159,10,'','Fingerprint','2024-06-10','09:59:31','Clock IN',1,'101718006371'),(160,16,'','Fingerprint','2024-06-10','09:40:57','Clock IN',1,'161718005257'),(161,15,'','Fingerprint','2024-06-10','09:35:48','Clock IN',1,'151718004948'),(162,11,'','Fingerprint','2024-06-10','09:09:05','Clock IN',1,'111718003345'),(163,13,'','Fingerprint','2024-06-10','09:07:01','Clock IN',1,'131718003221'),(164,3,'','Fingerprint','2024-06-10','08:57:49','Clock IN',1,'31718002669'),(165,8,'','Fingerprint','2024-06-10','08:53:10','Clock IN',1,'81718002390'),(166,4,'','Fingerprint','2024-06-10','08:43:08','Clock IN',1,'41718001788'),(167,2,'','Fingerprint','2024-06-10','08:43:01','Clock IN',1,'21718001781'),(168,9,'','Fingerprint','2024-06-10','08:26:55','Clock IN',1,'91718000815'),(169,5,'','Fingerprint','2024-06-10','08:05:29','Clock IN',1,'51717999529'),(170,17,'','Fingerprint','2024-06-10','08:02:00','Clock IN',1,'171717999320'),(171,6,'','Fingerprint','2024-06-10','08:01:45','Clock IN',1,'61717999305'),(172,12,'','Fingerprint','2024-06-10','08:01:42','Clock IN',1,'121717999302'),(173,3,'','Fingerprint','2024-06-09','16:04:26','Clock Out',2,'31717941866'),(174,12,'','Fingerprint','2024-06-09','16:04:18','Clock Out',2,'121717941858'),(175,9,'','Fingerprint','2024-06-09','16:04:07','Clock Out',2,'91717941847'),(176,15,'','Fingerprint','2024-06-09','16:03:59','Clock Out',2,'151717941839'),(177,13,'','Fingerprint','2024-06-09','16:03:46','Clock Out',2,'131717941826'),(178,8,'','Fingerprint','2024-06-09','16:03:23','Clock Out',2,'81717941803'),(179,10,'','Fingerprint','2024-06-09','16:01:35','Clock Out',2,'101717941695'),(180,4,'','Fingerprint','2024-06-09','16:00:35','Clock Out',2,'41717941635'),(181,7,'','Fingerprint','2024-06-09','15:51:51','Clock Out',2,'71717941111'),(182,5,'','Fingerprint','2024-06-09','15:49:05','Clock Out',2,'51717940945'),(183,10,'','Fingerprint','2024-06-09','09:57:29','Clock IN',1,'101717919849'),(184,15,'','Fingerprint','2024-06-09','09:46:46','Clock IN',1,'151717919206'),(185,16,'','Fingerprint','2024-06-09','09:44:33','Clock IN',1,'161717919073'),(186,7,'','Fingerprint','2024-06-09','09:36:32','Clock IN',1,'71717918592'),(187,6,'','Fingerprint','2024-06-09','09:17:13','Clock IN',1,'61717917433'),(188,8,'','Fingerprint','2024-06-09','09:15:01','Clock IN',1,'81717917301'),(189,13,'','Fingerprint','2024-06-09','09:14:21','Clock IN',1,'131717917261'),(190,4,'','Fingerprint','2024-06-09','09:10:04','Clock IN',1,'41717917004'),(191,11,'','Fingerprint','2024-06-09','09:03:53','Clock IN',1,'111717916633'),(192,3,'','Fingerprint','2024-06-09','09:03:26','Clock IN',1,'31717916606'),(193,17,'','Fingerprint','2024-06-09','08:59:11','Clock IN',1,'171717916351'),(194,5,'','Fingerprint','2024-06-09','08:55:33','Clock IN',1,'51717916133'),(195,9,'','Fingerprint','2024-06-09','08:55:08','Clock IN',1,'91717916108'),(196,12,'','Fingerprint','2024-06-09','08:55:01','Clock IN',1,'121717916101'),(197,18,'','Fingerprint','2024-06-08','10:52:00','Clock IN',1,'181717836720'),(198,13,'','Fingerprint','2024-06-08','10:08:50','Clock IN',1,'131717834130'),(199,7,'','Fingerprint','2024-06-08','09:48:20','Clock IN',1,'71717832900'),(200,6,'','Fingerprint','2024-06-08','09:48:15','Clock IN',1,'61717832895'),(201,16,'','Fingerprint','2024-06-08','09:28:30','Clock IN',1,'161717831710'),(202,8,'','Fingerprint','2024-06-08','09:22:48','Clock IN',1,'81717831368'),(203,4,'','Fingerprint','2024-06-08','09:11:08','Clock IN',1,'41717830668'),(204,10,'','Fingerprint','2024-06-08','09:10:44','Clock IN',1,'101717830644'),(205,12,'','Fingerprint','2024-06-08','09:02:39','Clock IN',1,'121717830159'),(206,3,'','Fingerprint','2024-06-08','08:52:19','Clock IN',1,'31717829539'),(207,15,'','Fingerprint','2024-06-08','08:49:41','Clock IN',1,'151717829381'),(208,11,'','Fingerprint','2024-06-08','08:33:04','Clock IN',1,'111717828384'),(209,17,'','Fingerprint','2024-06-08','08:24:54','Clock IN',1,'171717827894'),(210,9,'','Fingerprint','2024-06-08','08:14:52','Clock IN',1,'91717827292'),(211,5,'','Fingerprint','2024-06-08','08:14:44','Clock IN',1,'51717827284'),(212,2,'','Fingerprint','2024-06-08','08:12:05','Clock IN',1,'21717827125'),(213,5,'','Fingerprint','2024-06-06','09:37:05','Clock IN',1,'51717659425'),(214,2,'','Fingerprint','2024-06-06','08:26:35','Clock IN',1,'21717655195'),(215,1,'','Fingerprint','2024-06-06','08:26:29','Clock IN',1,'11717655189'),(216,2,'','Fingerprint','2024-06-05','12:42:15','Clock Out',2,'21717584135'),(217,2,'','Fingerprint','2024-06-05','12:42:08','Clock Out',2,'21717584128'),(218,9,'','Fingerprint','2024-06-05','12:27:28','Clock Out',2,'91717583248'),(219,2,'','Fingerprint','2024-06-05','12:19:21','Clock Out',2,'21717582761'),(220,4,'','Fingerprint','2024-06-05','12:19:04','Clock Out',2,'41717582744'),(221,2,'','Fingerprint','2024-06-05','12:10:44','Clock Out',2,'21717582244'),(222,1,'','Fingerprint','2024-06-05','12:10:10','Clock Out',2,'11717582210'),(223,2,'','Fingerprint','2024-06-05','12:10:04','Clock Out',2,'21717582204'),(224,2,'','Card','2024-06-05','12:09:57','Clock Out',2,'21717582197'),(225,1,'','Card','2024-06-05','12:08:37','Clock Out',2,'11717582117'),(226,1,'','Fingerprint','2024-06-05','12:07:26','Clock Out',2,'11717582046'),(227,1,'','Fingerprint','2024-06-05','12:07:24','Clock Out',2,'11717582044'),(228,1,'','Fingerprint','2024-06-05','12:00:53','Unknown',3,'11717581653'),(229,1,'','Fingerprint','2024-06-05','11:59:27','Clock IN',1,'11717581567'),(230,1,'','Fingerprint','2024-06-05','11:59:24','Clock IN',1,'11717581564'),(231,1,'','Fingerprint','2024-06-05','11:51:33','Clock IN',1,'11717581093'),(232,1,'','Fingerprint','2024-03-07','12:29:12','Clock Out',2,'11709810952'),(233,1,'','Fingerprint','2023-08-28','09:31:18','Clock IN',1,'11693207878'),(234,9,'','Card','2023-03-22','12:43:12','Clock Out',2,'91679485392'),(235,2,'','Fingerprint','2022-01-02','09:40:16','Clock IN',1,'21641112816'),(236,1,'','Fingerprint','2022-01-02','09:40:04','Clock IN',1,'11641112804'),(237,1,'','Fingerprint','2021-11-11','10:03:39','Clock IN',1,'11636621419'),(238,2,'','Fingerprint','2021-11-11','10:03:31','Clock IN',1,'21636621411'),(239,2,'','Fingerprint','2021-11-01','09:45:59','Clock IN',1,'21635756359'),(240,2,'','Fingerprint','2021-10-26','10:17:30','Clock IN',1,'21635236250'),(241,2,'','Fingerprint','2021-10-25','10:11:29','Clock IN',1,'21635149489'),(242,2,'','Fingerprint','2021-10-23','10:10:39','Clock IN',1,'21634976639'),(243,2,'','Fingerprint','2021-10-21','09:52:48','Clock IN',1,'21634802768'),(244,2,'','Fingerprint','2021-10-10','09:42:33','Clock IN',1,'21633851753'),(245,2,'','Fingerprint','2021-10-09','10:03:28','Clock IN',1,'21633766608'),(246,2,'','Fingerprint','2021-10-05','10:52:54','Clock IN',1,'21633423974'),(247,4,'','Fingerprint','2021-10-02','09:31:16','Clock IN',1,'41633159876'),(248,2,'','Fingerprint','2021-09-30','10:14:13','Clock IN',1,'21632989653'),(249,4,'','Fingerprint','2021-09-29','09:44:24','Clock IN',1,'41632901464'),(250,2,'','Fingerprint','2021-09-29','09:44:02','Clock IN',1,'21632901442'),(251,2,'','Fingerprint','2021-09-28','09:38:09','Clock IN',1,'21632814689'),(252,7,'','Fingerprint','2021-09-27','10:08:37','Clock IN',1,'71632730117'),(253,4,'','Fingerprint','2021-09-27','09:46:16','Clock IN',1,'41632728776'),(254,2,'','Fingerprint','2021-09-27','09:43:38','Clock IN',1,'21632728618'),(255,2,'','Fingerprint','2021-09-26','10:17:32','Clock IN',1,'21632644252'),(256,2,'','Fingerprint','2021-09-25','09:59:45','Clock IN',1,'21632556785'),(257,3,'','Fingerprint','2021-09-23','09:31:51','Clock IN',1,'31632382311'),(258,4,'','Fingerprint','2021-09-23','09:31:45','Clock IN',1,'41632382305'),(259,2,'','Fingerprint','2021-09-23','09:31:34','Clock IN',1,'21632382294'),(260,7,'','Fingerprint','2021-09-21','09:53:21','Clock IN',1,'71632210801'),(261,2,'','Fingerprint','2021-09-21','09:50:12','Clock IN',1,'21632210612'),(262,2,'','Fingerprint','2021-09-20','09:41:30','Clock IN',1,'21632123690'),(263,2,'','Fingerprint','2021-09-19','11:13:28','Clock IN',1,'21632042808'),(264,4,'','Fingerprint','2021-09-18','09:54:59','Clock IN',1,'41631951699'),(265,2,'','Fingerprint','2021-09-18','09:54:42','Clock IN',1,'21631951682'),(266,7,'','Fingerprint','2021-09-18','09:42:56','Clock IN',1,'71631950976'),(267,7,'','Fingerprint','2021-09-16','10:02:11','Clock IN',1,'71631779331'),(268,2,'','Fingerprint','2021-09-14','10:15:10','Clock IN',1,'21631607310'),(269,5,'','Fingerprint','2021-09-14','10:00:40','Clock IN',1,'51631606440'),(270,2,'','Fingerprint','2021-09-13','11:19:00','Clock IN',1,'21631524740'),(271,2,'','Fingerprint','2021-09-13','10:00:18','Clock IN',1,'21631520018'),(272,4,'','Fingerprint','2021-09-13','09:53:55','Clock IN',1,'41631519635'),(273,5,'','Fingerprint','2021-09-13','09:42:13','Clock IN',1,'51631518933'),(274,7,'','Fingerprint','2021-09-13','09:38:48','Clock IN',1,'71631518728'),(275,2,'','Fingerprint','2021-09-12','14:28:27','Clock Out',2,'21631449707'),(276,7,'','Fingerprint','2021-09-12','10:28:01','Clock IN',1,'71631435281'),(277,8,'','Fingerprint','2021-09-12','10:27:07','Clock IN',1,'81631435227'),(278,1,'','Fingerprint','2021-09-12','10:11:06','Clock IN',1,'11631434266'),(279,2,'','Fingerprint','2021-09-12','10:11:00','Clock IN',1,'21631434260'),(280,1,'','Fingerprint','2021-09-12','10:10:54','Clock IN',1,'11631434254'),(281,4,'','Fingerprint','2021-09-12','09:20:20','Clock IN',1,'41631431220'),(282,9,'','Fingerprint','2021-09-12','09:18:05','Clock IN',1,'91631431085'),(283,5,'','Fingerprint','2021-09-12','08:36:41','Clock IN',1,'51631428601'),(284,3,'','Fingerprint','2021-09-12','07:40:09','Unknown',3,'31631425209'),(285,2,'','Fingerprint','2021-04-24','11:35:49','Clock IN',1,'21619256949'),(286,2,'','Fingerprint','2021-04-18','13:45:59','Clock Out',2,'21618746359'),(287,3,'','Fingerprint','2021-04-11','10:16:58','Clock IN',1,'31618129018'),(288,3,'','Fingerprint','2021-04-08','10:04:10','Clock IN',1,'31617869050'),(289,3,'','Fingerprint','2021-04-07','09:36:33','Clock IN',1,'31617780993'),(290,9,'','Fingerprint','2021-04-07','09:36:26','Clock IN',1,'91617780986'),(291,9,'','Fingerprint','2021-04-03','10:02:34','Clock IN',1,'91617436954'),(292,8,'','Fingerprint','2021-04-03','10:00:01','Clock IN',1,'81617436801'),(293,3,'','Fingerprint','2021-04-03','09:25:00','Clock IN',1,'31617434700'),(294,3,'','Fingerprint','2021-04-01','16:34:48','Clock Out',2,'31617287688'),(295,9,'','Fingerprint','2021-04-01','10:59:40','Clock IN',1,'91617267580'),(296,2,'','Fingerprint','2021-04-01','10:56:56','Clock IN',1,'21617267416'),(297,2,'','Fingerprint','2021-03-31','10:32:27','Clock IN',1,'21617179547'),(298,3,'','Fingerprint','2021-03-31','09:52:48','Clock IN',1,'31617177168'),(299,9,'','Fingerprint','2021-03-29','10:31:38','Clock IN',1,'91617006698'),(300,2,'','Fingerprint','2021-03-29','10:01:39','Clock IN',1,'21617004899'),(301,3,'','Fingerprint','2021-03-29','09:53:52','Clock IN',1,'31617004432'),(302,9,'','Fingerprint','2021-03-28','12:00:00','Clock IN',1,'91616925600'),(303,8,'','Fingerprint','2021-03-28','10:16:36','Clock IN',1,'81616919396'),(304,3,'','Fingerprint','2021-03-28','09:37:59','Clock IN',1,'31616917079'),(305,9,'','Fingerprint','2021-03-27','10:53:43','Clock IN',1,'91616838823'),(306,3,'','Fingerprint','2021-03-27','08:24:14','Clock IN',1,'31616829854'),(307,7,'','Fingerprint','2021-03-26','11:57:20','Clock IN',1,'71616756240'),(308,2,'','Fingerprint','2021-03-26','10:25:21','Clock IN',1,'21616750721'),(309,3,'','Fingerprint','2021-03-26','08:45:21','Clock IN',1,'31616744721'),(310,9,'','Fingerprint','2021-03-25','10:58:37','Clock IN',1,'91616666317'),(311,3,'','Fingerprint','2021-03-25','09:39:49','Clock IN',1,'31616661589'),(312,2,'','Fingerprint','2021-03-24','10:30:28','Clock IN',1,'21616578228'),(313,9,'','Fingerprint','2021-03-24','10:18:56','Clock IN',1,'91616577536'),(314,3,'','Fingerprint','2021-03-22','10:47:03','Clock IN',1,'31616406423'),(315,9,'','Fingerprint','2021-03-21','10:47:53','Clock IN',1,'91616320073'),(316,3,'','Fingerprint','2021-03-18','10:29:15','Clock IN',1,'31616059755'),(317,8,'','Fingerprint','2021-03-18','10:18:00','Clock IN',1,'81616059080'),(318,4,'','Fingerprint','2021-03-17','10:20:23','Clock IN',1,'41615972823'),(319,4,'','Fingerprint','2021-03-17','10:19:47','Clock IN',1,'41615972787'),(320,2,'','Fingerprint','2021-03-17','10:18:50','Clock IN',1,'21615972730'),(321,9,'','Fingerprint','2021-03-17','10:18:44','Clock IN',1,'91615972724'),(322,8,'','Fingerprint','2021-03-17','09:52:51','Clock IN',1,'81615971171'),(323,3,'','Fingerprint','2021-03-17','06:59:18','Unknown',3,'31615960758'),(324,2,'','Fingerprint','2021-03-16','10:35:16','Clock IN',1,'21615887316'),(325,3,'','Fingerprint','2021-03-16','10:07:50','Clock IN',1,'31615885670'),(326,3,'','Fingerprint','2021-03-15','12:31:01','Clock Out',2,'31615807861'),(327,2,'','Fingerprint','2021-03-14','10:19:37','Clock IN',1,'21615713577'),(328,3,'','Fingerprint','2021-03-14','09:31:52','Clock IN',1,'31615710712'),(329,2,'','Fingerprint','2021-03-13','10:24:08','Clock IN',1,'21615627448'),(330,1,'','Fingerprint','2021-03-11','10:30:54','Clock IN',1,'11615455054'),(331,2,'','Fingerprint','2021-03-11','10:30:47','Clock IN',1,'21615455047'),(332,6,'','Fingerprint','2021-03-11','10:17:02','Clock IN',1,'61615454222'),(333,9,'','Fingerprint','2021-03-11','10:16:57','Clock IN',1,'91615454217'),(334,3,'','Fingerprint','2021-03-11','09:51:06','Clock IN',1,'31615452666'),(335,3,'','Fingerprint','2021-03-08','10:23:33','Clock IN',1,'31615195413'),(336,9,'','Fingerprint','2021-03-07','10:16:06','Clock IN',1,'91615108566'),(337,3,'','Fingerprint','2021-03-07','09:31:05','Clock IN',1,'31615105865'),(338,3,'','Fingerprint','2021-03-06','10:35:15','Clock IN',1,'31615023315'),(339,2,'','Fingerprint','2021-03-06','10:10:32','Clock IN',1,'21615021832'),(340,2,'','Fingerprint','2021-03-04','10:57:31','Clock IN',1,'21614851851'),(341,3,'','Fingerprint','2021-03-04','09:04:29','Clock IN',1,'31614845069'),(342,3,'','Fingerprint','2021-03-03','13:41:10','Clock Out',2,'31614775270'),(343,5,'','Fingerprint','2021-03-02','12:04:28','Clock Out',2,'51614683068'),(344,2,'','Fingerprint','2021-03-02','09:58:16','Clock IN',1,'21614675496'),(345,9,'','Fingerprint','2021-02-28','09:13:54','Clock IN',1,'91614500034'),(346,3,'','Fingerprint','2021-02-28','09:10:34','Clock IN',1,'31614499834'),(347,2,'','Fingerprint','2021-02-27','10:45:30','Clock IN',1,'21614419130'),(348,3,'','Fingerprint','2021-02-27','07:41:26','Unknown',3,'31614408086'),(349,5,'','Fingerprint','2021-02-25','10:47:52','Clock IN',1,'51614246472'),(350,3,'','Fingerprint','2021-02-25','10:08:50','Clock IN',1,'31614244130'),(351,2,'','Fingerprint','2021-02-24','10:32:42','Clock IN',1,'21614159162'),(352,3,'','Fingerprint','2021-02-24','10:27:58','Clock IN',1,'31614158878'),(353,8,'','Fingerprint','2021-02-24','10:27:42','Clock IN',1,'81614158862'),(354,2,'','Fingerprint','2021-02-23','10:30:35','Clock IN',1,'21614072635'),(355,8,'','Fingerprint','2021-02-22','10:13:07','Clock IN',1,'81613985187'),(356,3,'','Fingerprint','2021-02-22','09:00:26','Clock IN',1,'31613980826'),(357,9,'','Fingerprint','2021-02-20','10:32:04','Clock IN',1,'91613813524'),(358,3,'','Fingerprint','2021-02-20','10:31:39','Clock IN',1,'31613813499'),(359,5,'','Fingerprint','2021-02-20','10:31:30','Clock IN',1,'51613813490'),(360,8,'','Fingerprint','2021-02-20','10:07:22','Clock IN',1,'81613812042'),(361,1,'','Fingerprint','2021-02-20','10:02:21','Clock IN',1,'11613811741'),(362,2,'','Fingerprint','2021-02-20','10:02:13','Clock IN',1,'21613811733'),(363,9,'','Fingerprint','2021-02-18','12:46:50','Clock Out',2,'91613648810'),(364,5,'','Fingerprint','2021-02-18','10:26:29','Clock IN',1,'51613640389'),(365,3,'','Fingerprint','2021-02-18','09:58:56','Clock IN',1,'31613638736'),(366,2,'','Fingerprint','2021-02-17','10:27:45','Clock IN',1,'21613554065'),(367,1,'','Fingerprint','2021-02-17','10:27:36','Clock IN',1,'11613554056'),(368,2,'','Fingerprint','2021-02-17','10:26:47','Clock IN',1,'21613554007'),(369,1,'','Fingerprint','2021-02-17','10:26:31','Clock IN',1,'11613553991'),(370,2,'','Fingerprint','2021-02-17','10:24:38','Clock IN',1,'21613553878'),(371,1,'','Fingerprint','2021-02-17','10:24:24','Clock IN',1,'11613553864'),(372,1,'','Fingerprint','2021-02-17','10:24:17','Clock IN',1,'11613553857'),(373,1,'','Fingerprint','2021-02-17','10:21:45','Clock IN',1,'11613553705'),(374,1,'','Card','2021-02-17','10:20:42','Clock IN',1,'11613553642'),(375,2,'','Fingerprint','2021-02-17','10:19:56','Clock IN',1,'21613553596'),(376,1,'','Fingerprint','2021-02-17','10:19:47','Clock IN',1,'11613553587'),(377,1,'','Fingerprint','2021-02-17','10:19:41','Clock IN',1,'11613553581'),(378,2,'','Fingerprint','2021-02-17','10:19:31','Clock IN',1,'21613553571'),(379,8,'','Fingerprint','2021-02-17','10:19:10','Clock IN',1,'81613553550'),(380,9,'','Fingerprint','2021-02-17','10:17:16','Clock IN',1,'91613553436'),(381,3,'','Fingerprint','2021-02-17','10:06:20','Clock IN',1,'31613552780'),(382,6,'','Fingerprint','2021-02-15','14:01:33','Clock Out',2,'61613394093'),(383,3,'','Fingerprint','2021-02-15','10:45:04','Clock IN',1,'31613382304'),(384,8,'','Fingerprint','2021-02-15','10:44:51','Clock IN',1,'81613382291'),(385,6,'','Fingerprint','2021-02-15','10:18:27','Clock IN',1,'61613380707'),(386,4,'','Fingerprint','2021-02-13','10:44:48','Clock IN',1,'41613209488'),(387,5,'','Fingerprint','2021-02-13','10:44:42','Clock IN',1,'51613209482'),(388,1,'','Fingerprint','2021-02-13','10:27:42','Clock IN',1,'11613208462'),(389,6,'','Fingerprint','2021-02-13','10:21:09','Clock IN',1,'61613208069'),(390,7,'','Fingerprint','2021-02-13','10:04:03','Clock IN',1,'71613207043'),(391,8,'','Fingerprint','2021-02-13','09:54:29','Clock IN',1,'81613206469'),(392,3,'','Fingerprint','2021-02-13','09:02:21','Clock IN',1,'31613203341'),(393,4,'','Fingerprint','2021-02-11','11:05:35','Clock IN',1,'41613037935'),(394,9,'','Fingerprint','2021-02-11','10:42:57','Clock IN',1,'91613036577'),(395,1,'','Fingerprint','2021-02-11','10:31:28','Clock IN',1,'11613035888'),(396,2,'','Fingerprint','2021-02-11','10:22:00','Clock IN',1,'21613035320'),(397,8,'','Fingerprint','2021-02-11','10:05:39','Clock IN',1,'81613034339'),(398,5,'','Fingerprint','2021-02-11','09:20:06','Clock IN',1,'51613031606'),(399,3,'','Fingerprint','2021-02-11','09:12:38','Clock IN',1,'31613031158'),(400,8,'','Fingerprint','2021-02-10','09:58:29','Clock IN',1,'81612947509'),(401,9,'','Fingerprint','2021-02-10','09:25:55','Clock IN',1,'91612945555'),(402,3,'','Fingerprint','2021-02-10','09:14:52','Clock IN',1,'31612944892'),(403,2,'','Fingerprint','2021-02-10','08:58:46','Clock IN',1,'21612943926'),(404,9,'','Fingerprint','2021-02-09','12:08:22','Clock Out',2,'91612868902'),(405,5,'','Fingerprint','2021-02-09','10:28:09','Clock IN',1,'51612862889'),(406,6,'','Fingerprint','2021-02-09','10:18:47','Clock IN',1,'61612862327'),(407,2,'','Fingerprint','2021-02-09','10:18:33','Clock IN',1,'21612862313'),(408,7,'','Fingerprint','2021-02-09','10:08:48','Clock IN',1,'71612861728'),(409,8,'','Fingerprint','2021-02-09','10:00:05','Clock IN',1,'81612861205'),(410,3,'','Fingerprint','2021-02-09','09:36:35','Clock IN',1,'31612859795'),(411,5,'','Fingerprint','2021-02-08','10:31:02','Clock IN',1,'51612776662'),(412,7,'','Fingerprint','2021-02-08','10:14:58','Clock IN',1,'71612775698'),(413,3,'','Fingerprint','2021-02-08','09:31:15','Clock IN',1,'31612773075'),(414,8,'','Fingerprint','2021-02-07','13:32:50','Clock Out',2,'81612701170'),(415,4,'','Fingerprint','2021-02-07','13:28:27','Clock Out',2,'41612700907'),(416,4,'','Fingerprint','2021-02-07','13:28:19','Clock Out',2,'41612700899'),(417,6,'','Fingerprint','2021-02-07','13:28:03','Clock Out',2,'61612700883'),(418,5,'','Fingerprint','2021-02-07','13:27:52','Clock Out',2,'51612700872'),(419,2,'','Fingerprint','2021-02-07','13:26:42','Clock Out',2,'21612700802'),(420,1,'','Card','2021-02-07','13:23:11','Clock Out',2,'11612700591'),(421,7,'','Fingerprint','2021-02-07','12:35:27','Clock Out',2,'71612697727'),(422,6,'','Fingerprint','2021-02-07','11:37:58','Clock IN',1,'61612694278'),(423,8,'','Fingerprint','2021-02-07','11:36:30','Clock IN',1,'81612694190'),(424,4,'','Fingerprint','2021-02-07','11:20:05','Clock IN',1,'41612693205'),(425,5,'','Fingerprint','2021-02-07','11:09:01','Clock IN',1,'51612692541'),(426,3,'','Fingerprint','2021-02-07','11:07:02','Clock IN',1,'31612692422'),(427,2,'','Fingerprint','2021-02-07','10:12:08','Clock IN',1,'21612689128'),(428,7,'','Fingerprint','2021-02-07','10:11:55','Clock IN',1,'71612689115'),(429,7,'','Fingerprint','2021-02-06','11:23:37','Clock IN',1,'71612607017'),(430,1,'','Card','2021-02-05','19:31:04','Unknown',3,'11612549864'),(431,7,'','Fingerprint','2021-02-04','11:03:01','Clock IN',1,'71612432981'),(432,2,'','Fingerprint','2021-02-04','10:05:33','Clock IN',1,'21612429533'),(433,7,'','Fingerprint','2021-02-03','12:39:31','Clock Out',2,'71612352371'),(434,2,'','Fingerprint','2021-02-03','09:51:06','Clock IN',1,'21612342266'),(435,1,'','Card','2021-02-01','10:38:21','Clock IN',1,'11612172301'),(436,2,'','Fingerprint','2021-02-01','10:37:10','Clock IN',1,'21612172230'),(437,2,'','Fingerprint','2021-01-31','09:53:02','Clock IN',1,'21612083182'),(438,2,'','Fingerprint','2021-01-30','15:14:39','Clock Out',2,'21612016079'),(439,1,'','Card','2021-01-30','15:14:23','Clock Out',2,'11612016063'),(440,2,'','Fingerprint','2021-01-30','14:53:51','Clock Out',2,'21612014831'),(441,2,'','Fingerprint','2021-01-26','12:26:31','Clock Out',2,'21611660391'),(442,1,'','Card','2021-01-25','16:24:58','Clock Out',2,'11611588298'),(443,1,'','Card','2021-01-25','16:24:56','Clock Out',2,'11611588296'),(444,1,'','Card','2021-01-25','16:24:46','Clock Out',2,'11611588286'),(445,2,'','Fingerprint','2021-01-25','16:24:34','Clock Out',2,'21611588274'),(446,1,'','Password','2021-01-25','16:23:22','Clock Out',2,'11611588202'),(447,1,'','Password','2021-01-25','14:40:02','Clock Out',2,'11611582002'),(448,1,'','Card','2020-07-15','14:30:30','Clock Out',2,'11594816230'),(449,330,'7A30','Card','2024-07-03','11:41:21','Clock IN',1,'3301719999681'),(450,344,'7A44','Card','2024-07-03','11:41:19','Clock IN',1,'3441719999679'),(451,213,'6Mollika13','Card','2024-07-03','11:40:06','Clock IN',1,'2131719999606'),(452,229,'6A29','Card','2024-07-03','11:40:04','Clock IN',1,'2291719999604'),(453,239,'6A39','Card','2024-07-03','11:40:03','Clock IN',1,'2391719999603'),(454,221,'6A21','Card','2024-07-03','11:40:00','Clock IN',1,'2211719999600'),(455,251,'6A51','Card','2024-07-03','11:39:59','Clock IN',1,'2511719999599'),(456,203,'6A3','Card','2024-07-03','11:39:57','Clock IN',1,'2031719999597'),(457,253,'6A53','Card','2024-07-03','11:39:55','Clock IN',1,'2531719999595'),(458,254,'6A54','Card','2024-07-03','11:39:53','Clock IN',1,'2541719999593'),(459,249,'6A49','Card','2024-07-03','11:39:51','Clock IN',1,'2491719999591'),(460,216,'6Mollika16','Card','2024-07-03','11:39:49','Clock IN',1,'2161719999589'),(461,219,'6Mollika19','Card','2024-07-03','11:39:47','Clock IN',1,'2191719999587'),(462,231,'6Mollika31','Card','2024-07-03','11:39:44','Clock IN',1,'2311719999584'),(463,226,'6A26','Card','2024-07-03','11:39:42','Clock IN',1,'2261719999582'),(464,243,'6A43','Card','2024-07-03','11:39:40','Clock IN',1,'2431719999580'),(465,245,'6A45','Card','2024-07-03','11:39:38','Clock IN',1,'2451719999578'),(466,230,'6A30','Card','2024-07-03','11:39:34','Clock IN',1,'2301719999574'),(467,212,'6A12','Card','2024-07-03','11:39:30','Clock IN',1,'2121719999570'),(468,313,'7A13','Card','2024-07-03','11:33:22','Clock IN',1,'3131719999202'),(469,302,'7A2','Card','2024-07-03','11:33:19','Clock IN',1,'3021719999199'),(470,346,'7A46','Card','2024-07-03','11:33:15','Clock IN',1,'3461719999195'),(471,328,'7A28','Card','2024-07-03','11:33:12','Clock IN',1,'3281719999192'),(472,307,'7A7','Card','2024-07-03','11:33:10','Clock IN',1,'3071719999190'),(473,329,'7A29','Card','2024-07-03','11:33:05','Clock IN',1,'3291719999185'),(474,331,'7A31','Card','2024-07-03','11:33:03','Clock IN',1,'3311719999183'),(475,319,'7A19','Card','2024-07-03','11:32:56','Clock IN',1,'3191719999176'),(476,315,'7A15','Card','2024-07-03','11:32:52','Clock IN',1,'3151719999172'),(477,347,'7A47','Card','2024-07-03','11:32:47','Clock IN',1,'3471719999167'),(478,339,'7A39','Card','2024-07-03','11:32:41','Clock IN',1,'3391719999161'),(479,327,'6Mollika127','Card','2024-07-03','11:32:38','Clock IN',1,'3271719999158'),(480,341,'7A41','Card','2024-07-03','11:32:35','Clock IN',1,'3411719999155'),(481,333,'7A33','Card','2024-07-03','11:32:32','Clock IN',1,'3331719999152'),(482,14,'7A33','Fingerprint','2024-07-03','10:36:43','Clock IN',1,'141719995803'),(483,401,'8A1','Card','2024-07-03','09:55:21','Clock IN',1,'4011719993321'),(484,306,'7A6','Card','2024-07-03','09:47:54','Clock IN',1,'3061719992874'),(485,411,'8A11','Card','2024-07-03','09:47:40','Clock IN',1,'4111719992860'),(486,427,'8A27','Card','2024-07-03','09:47:34','Clock IN',1,'4271719992854'),(487,352,'7A52','Card','2024-07-03','09:46:43','Clock IN',1,'3521719992803'),(488,423,'8A23','Card','2024-07-03','09:45:24','Clock IN',1,'4231719992724'),(489,247,'6A47','Card','2024-07-03','09:44:09','Clock IN',1,'2471719992649'),(490,223,'6A23','Card','2024-07-03','09:44:06','Clock IN',1,'2231719992646'),(491,208,'6A8','Card','2024-07-03','09:41:07','Clock IN',1,'2081719992467'),(492,13,'6A8','Fingerprint','2024-07-03','09:40:36','Clock IN',1,'131719992436'),(493,338,'7A38','Card','2024-07-03','09:40:21','Clock IN',1,'3381719992421'),(494,322,'7A22','Card','2024-07-03','09:40:17','Clock IN',1,'3221719992417'),(495,309,'7A9','Card','2024-07-03','09:40:01','Clock IN',1,'3091719992401'),(496,317,'7A17','Card','2024-07-03','09:39:47','Clock IN',1,'3171719992387'),(497,209,'6A9','Card','2024-07-03','09:38:56','Clock IN',1,'2091719992336'),(498,218,'6A18','Card','2024-07-03','09:38:52','Clock IN',1,'2181719992332'),(499,311,'7A11','Card','2024-07-03','09:38:34','Clock IN',1,'3111719992314'),(500,334,'7A34','Card','2024-07-03','09:38:28','Clock IN',1,'3341719992308'),(501,304,'7A4','Card','2024-07-03','09:38:20','Clock IN',1,'3041719992300'),(502,312,'7A12','Card','2024-07-03','09:38:17','Clock IN',1,'3121719992297'),(503,318,'7A18','Card','2024-07-03','09:38:14','Clock IN',1,'3181719992294'),(504,326,'7A26','Card','2024-07-03','09:38:11','Clock IN',1,'3261719992291'),(505,326,'7A26','Card','2024-07-03','09:38:10','Clock IN',1,'3261719992290'),(506,335,'7A35','Card','2024-07-03','09:38:06','Clock IN',1,'3351719992286'),(507,10,'7A35','Fingerprint','2024-07-03','09:37:14','Clock IN',1,'101719992234'),(508,18,'7A35','Fingerprint','2024-07-03','09:36:37','Clock IN',1,'181719992197'),(509,301,'7A1','Card','2024-07-03','09:36:19','Clock IN',1,'3011719992179'),(510,310,'7A10','Card','2024-07-03','09:36:16','Clock IN',1,'3101719992176'),(511,406,'8A6','Card','2024-07-03','09:31:26','Clock IN',1,'4061719991886'),(512,511,'9A11','Card','2024-07-03','09:30:41','Clock IN',1,'5111719991841'),(513,12,'9A11','Fingerprint','2024-07-03','09:30:07','Clock IN',1,'121719991807'),(514,410,'8A10','Card','2024-07-03','09:29:21','Clock IN',1,'4101719991761'),(515,225,'6Mollika25','Card','2024-07-03','09:29:12','Clock IN',1,'2251719991752'),(516,436,'8A36','Card','2024-07-03','09:28:45','Clock IN',1,'4361719991725'),(517,228,'6Mollika28','Card','2024-07-03','09:28:39','Clock IN',1,'2281719991719'),(518,418,'8A18','Card','2024-07-03','09:28:32','Clock IN',1,'4181719991712'),(519,311,'7A11','Card','2024-07-03','09:27:45','Clock IN',1,'3111719991665'),(520,408,'8A8','Card','2024-07-03','09:27:07','Clock IN',1,'4081719991627'),(521,404,'8A4','Card','2024-07-03','09:26:52','Clock IN',1,'4041719991612'),(522,404,'8A4','Card','2024-07-03','09:26:51','Clock IN',1,'4041719991611'),(523,404,'8A4','Card','2024-07-03','09:26:50','Clock IN',1,'4041719991610'),(524,15,'8A4','Fingerprint','2024-07-03','08:55:13','Clock IN',1,'151719989713'),(525,16,'8A4','Fingerprint','2024-07-03','08:54:41','Clock IN',1,'161719989681'),(526,11,'8A4','Fingerprint','2024-07-03','08:54:32','Clock IN',1,'111719989672'),(527,234,'6Mollika34','Card','2024-07-03','08:42:52','Clock IN',1,'2341719988972'),(528,3,'6Mollika34','Fingerprint','2024-07-03','08:35:25','Clock IN',1,'31719988525'),(529,9,'6Mollika34','Fingerprint','2024-07-03','08:32:37','Clock IN',1,'91719988357'),(530,8,'6Mollika34','Fingerprint','2024-07-03','08:32:10','Clock IN',1,'81719988330'),(531,2,'6Mollika34','Fingerprint','2024-07-03','08:31:19','Clock IN',1,'21719988279'),(532,17,'6Mollika34','Fingerprint','2024-07-03','08:15:38','Clock IN',1,'171719987338'),(533,4,'6Mollika34','Fingerprint','2024-07-03','08:10:49','Clock IN',1,'41719987049'),(534,2,'6Mollika34','Fingerprint','2024-07-03','08:10:27','Clock IN',1,'21719987027'),(535,6,'6Mollika34','Fingerprint','2024-07-02','23:22:48','Unknown',3,'61719955368'),(536,6,'6Mollika34','Fingerprint','2024-07-02','23:22:46','Unknown',3,'61719955366'),(537,6,'6Mollika34','Fingerprint','2024-07-02','23:22:43','Unknown',3,'61719955363'),(538,7,'6Mollika34','Fingerprint','2024-07-02','23:22:28','Unknown',3,'71719955348'),(539,7,'6Mollika34','Fingerprint','2024-07-02','21:23:06','Unknown',3,'71719948186'),(540,6,'6Mollika34','Fingerprint','2024-07-02','21:08:47','Unknown',3,'61719947327'),(541,17,'6Mollika34','Fingerprint','2024-07-02','17:31:32','Unknown',3,'171719934292'),(542,14,'6Mollika34','Fingerprint','2024-07-02','16:22:16','Clock Out',2,'141719930136'),(543,3,'6Mollika34','Fingerprint','2024-07-02','16:22:13','Clock Out',2,'31719930133'),(544,9,'6Mollika34','Fingerprint','2024-07-02','16:21:46','Clock Out',2,'91719930106'),(545,15,'6Mollika34','Fingerprint','2024-07-02','16:20:28','Clock Out',2,'151719930028'),(546,13,'6Mollika34','Fingerprint','2024-07-02','16:20:17','Clock Out',2,'131719930017'),(547,5,'6Mollika34','Fingerprint','2024-07-02','16:20:03','Clock Out',2,'51719930003'),(548,12,'6Mollika34','Fingerprint','2024-07-02','16:19:48','Clock Out',2,'121719929988'),(549,8,'6Mollika34','Fingerprint','2024-07-02','16:19:39','Clock Out',2,'81719929979'),(550,2,'6Mollika34','Fingerprint','2024-07-02','10:45:34','Clock IN',1,'21719909934'),(551,505,'9A5','Card','2024-07-02','10:22:04','Clock IN',1,'5051719908524'),(552,223,'6A23','Card','2024-07-02','10:19:46','Clock IN',1,'2231719908386'),(553,204,'6Mollika4','Card','2024-07-02','10:19:22','Clock IN',1,'2041719908362'),(554,207,'6Mollika7','Card','2024-07-02','10:17:48','Clock IN',1,'2071719908268'),(555,206,'6A6','Card','2024-07-02','10:17:46','Clock IN',1,'2061719908266'),(556,208,'6A8','Card','2024-07-02','10:17:44','Clock IN',1,'2081719908264'),(557,14,'6A8','Fingerprint','2024-07-02','10:15:10','Clock IN',1,'141719908110'),(558,218,'6A18','Card','2024-07-02','10:14:18','Clock IN',1,'2181719908058'),(559,234,'6Mollika34','Card','2024-07-02','10:13:32','Clock IN',1,'2341719908012'),(560,210,'6Mollika10','Card','2024-07-02','10:11:42','Clock IN',1,'2101719907902'),(561,252,'6A52','Card','2024-07-02','10:11:38','Clock IN',1,'2521719907898'),(562,238,'6A38','Card','2024-07-02','10:11:36','Clock IN',1,'2381719907896'),(563,237,'6Mollika37','Card','2024-07-02','10:11:33','Clock IN',1,'2371719907893'),(564,247,'6A47','Card','2024-07-02','10:11:28','Clock IN',1,'2471719907888'),(565,247,'6A47','Card','2024-07-02','10:11:26','Clock IN',1,'2471719907886'),(566,18,'6A47','Fingerprint','2024-07-02','10:11:17','Clock IN',1,'181719907877'),(567,209,'6A9','Card','2024-07-02','10:11:07','Clock IN',1,'2091719907867'),(568,211,'6A11','Card','2024-07-02','10:11:00','Clock IN',1,'2111719907860'),(569,202,'6A2','Card','2024-07-02','10:10:53','Clock IN',1,'2021719907853'),(570,210,'6Mollika10','Card','2024-07-02','10:10:51','Clock IN',1,'2101719907851'),(571,215,'6A15','Card','2024-07-02','10:09:38','Clock IN',1,'2151719907778'),(572,214,'6A14','Card','2024-07-02','10:09:32','Clock IN',1,'2141719907772'),(573,210,'6Mollika10','Card','2024-07-02','10:09:30','Clock IN',1,'2101719907770'),(574,210,'6Mollika10','Card','2024-07-02','10:09:24','Clock IN',1,'2101719907764'),(575,210,'6Mollika10','Card','2024-07-02','10:09:13','Clock IN',1,'2101719907753'),(576,215,'6A15','Card','2024-07-02','10:09:06','Clock IN',1,'2151719907746'),(577,211,'6A11','Card','2024-07-02','10:06:36','Clock IN',1,'2111719907596'),(578,242,'6A42','Card','2024-07-02','10:06:28','Clock IN',1,'2421719907588'),(579,242,'6A42','Card','2024-07-02','10:06:18','Clock IN',1,'2421719907578'),(580,241,'6A41','Card','2024-07-02','10:06:13','Clock IN',1,'2411719907573'),(581,225,'6Mollika25','Card','2024-07-02','10:05:54','Clock IN',1,'2251719907554'),(582,214,'6A14','Card','2024-07-02','10:05:37','Clock IN',1,'2141719907537'),(583,215,'6A15','Card','2024-07-02','10:05:10','Clock IN',1,'2151719907510'),(584,211,'6A11','Card','2024-07-02','10:05:05','Clock IN',1,'2111719907505'),(585,201,'6Mollika1','Card','2024-07-02','10:05:00','Clock IN',1,'2011719907500'),(586,201,'6Mollika1','Card','2024-07-02','10:04:59','Clock IN',1,'2011719907499'),(587,401,'8A1','Card','2024-07-02','10:04:46','Clock IN',1,'4011719907486'),(588,241,'6A41','Card','2024-07-02','10:01:38','Clock IN',1,'2411719907298'),(589,228,'6Mollika28','Card','2024-07-02','10:01:15','Clock IN',1,'2281719907275'),(590,322,'7A22','Card','2024-07-02','09:58:46','Clock IN',1,'3221719907126'),(591,338,'7A38','Card','2024-07-02','09:57:49','Clock IN',1,'3381719907069'),(592,308,'7A8','Card','2024-07-02','09:56:17','Clock IN',1,'3081719906977'),(593,10,'7A8','Fingerprint','2024-07-02','09:55:23','Clock IN',1,'101719906923'),(594,404,'8A4','Card','2024-07-02','09:55:07','Clock IN',1,'4041719906907'),(595,403,'8A3','Card','2024-07-02','09:54:33','Clock IN',1,'4031719906873'),(596,340,'7A40','Card','2024-07-02','09:54:25','Clock IN',1,'3401719906865'),(597,215,'6A15','Card','2024-07-02','09:54:20','Clock IN',1,'2151719906860'),(598,332,'7A32','Card','2024-07-02','09:53:29','Clock IN',1,'3321719906809'),(599,318,'7A18','Card','2024-07-02','09:53:26','Clock IN',1,'3181719906806'),(600,312,'7A12','Card','2024-07-02','09:53:21','Clock IN',1,'3121719906801'),(601,301,'7A1','Card','2024-07-02','09:53:19','Clock IN',1,'3011719906799'),(602,317,'7A17','Card','2024-07-02','09:53:09','Clock IN',1,'3171719906789'),(603,309,'7A9','Card','2024-07-02','09:52:46','Clock IN',1,'3091719906766'),(604,326,'7A26','Card','2024-07-02','09:52:44','Clock IN',1,'3261719906764'),(605,306,'7A6','Card','2024-07-02','09:52:35','Clock IN',1,'3061719906755'),(606,310,'7A10','Card','2024-07-02','09:52:32','Clock IN',1,'3101719906752'),(607,321,'7A21','Card','2024-07-02','09:52:30','Clock IN',1,'3211719906750'),(608,427,'8A27','Card','2024-07-02','09:51:46','Clock IN',1,'4271719906706'),(609,418,'8A18','Card','2024-07-02','09:51:25','Clock IN',1,'4181719906685'),(610,425,'8A25','Card','2024-07-02','09:51:23','Clock IN',1,'4251719906683'),(611,425,'8A25','Card','2024-07-02','09:51:21','Clock IN',1,'4251719906681'),(612,436,'8A36','Card','2024-07-02','09:51:17','Clock IN',1,'4361719906677'),(613,427,'8A27','Card','2024-07-02','09:51:12','Clock IN',1,'4271719906672'),(614,434,'8A34','Card','2024-07-02','09:51:01','Clock IN',1,'4341719906661'),(615,423,'8A23','Card','2024-07-02','09:50:53','Clock IN',1,'4231719906653'),(616,408,'8A8','Card','2024-07-02','09:50:50','Clock IN',1,'4081719906650'),(617,411,'8A11','Card','2024-07-02','09:50:49','Clock IN',1,'4111719906649'),(618,406,'8A6','Card','2024-07-02','09:50:47','Clock IN',1,'4061719906647'),(619,511,'9A11','Card','2024-07-02','09:50:38','Clock IN',1,'5111719906638'),(620,8,'9A11','Fingerprint','2024-07-02','09:43:27','Clock IN',1,'81719906207'),(621,15,'9A11','Fingerprint','2024-07-02','09:42:14','Clock IN',1,'151719906134'),(622,12,'9A11','Fingerprint','2024-07-02','09:32:04','Clock IN',1,'121719905524'),(623,16,'9A11','Fingerprint','2024-07-02','09:27:09','Clock IN',1,'161719905229'),(624,3,'9A11','Fingerprint','2024-07-02','09:25:15','Clock IN',1,'31719905115'),(625,13,'9A11','Fingerprint','2024-07-02','09:23:10','Clock IN',1,'131719904990'),(626,9,'9A11','Fingerprint','2024-07-02','09:22:53','Clock IN',1,'91719904973'),(627,6,'9A11','Fingerprint','2024-07-02','09:17:14','Clock IN',1,'61719904634'),(628,17,'9A11','Fingerprint','2024-07-02','08:46:39','Clock IN',1,'171719902799'),(629,11,'9A11','Fingerprint','2024-07-02','08:45:38','Clock IN',1,'111719902738'),(630,4,'9A11','Fingerprint','2024-07-02','08:45:23','Clock IN',1,'41719902723'),(631,2,'9A11','Fingerprint','2024-07-02','08:12:27','Clock IN',1,'21719900747'),(632,3,'9A11','Fingerprint','2024-07-01','16:51:08','Clock Out',2,'31719845468'),(633,12,'9A11','Fingerprint','2024-07-01','16:50:52','Clock Out',2,'121719845452'),(634,13,'9A11','Fingerprint','2024-07-01','16:43:00','Clock Out',2,'131719844980'),(635,6,'9A11','Fingerprint','2024-07-01','16:42:21','Clock Out',2,'61719844941'),(636,10,'9A11','Fingerprint','2024-07-01','16:40:50','Clock Out',2,'101719844850'),(637,4,'9A11','Fingerprint','2024-07-01','16:40:26','Clock Out',2,'41719844826'),(638,8,'9A11','Fingerprint','2024-07-01','16:40:21','Clock Out',2,'81719844821'),(639,5,'9A11','Fingerprint','2024-07-01','16:39:59','Clock Out',2,'51719844799'),(640,2,'9A11','Fingerprint','2024-07-01','16:39:44','Clock Out',2,'21719844784'),(641,18,'9A11','Fingerprint','2024-07-01','16:39:27','Clock Out',2,'181719844767'),(642,9,'9A11','Fingerprint','2024-07-01','16:39:22','Clock Out',2,'91719844762'),(643,16,'9A11','Fingerprint','2024-07-01','16:39:19','Clock Out',2,'161719844759'),(644,15,'9A11','Fingerprint','2024-07-01','16:38:32','Clock Out',2,'151719844712'),(645,17,'9A11','Fingerprint','2024-07-01','16:37:35','Clock Out',2,'171719844655'),(646,11,'9A11','Fingerprint','2024-07-01','16:37:23','Clock Out',2,'111719844643'),(647,252,'6A52','Card','2024-07-01','12:13:35','Clock Out',2,'2521719828815'),(648,228,'6Mollika28','Card','2024-07-01','12:13:07','Clock Out',2,'2281719828787'),(649,225,'6Mollika25','Card','2024-07-01','12:13:04','Clock Out',2,'2251719828784'),(650,217,'6A17','Card','2024-07-01','12:12:55','Clock Out',2,'2171719828775'),(651,240,'6Mollika40','Card','2024-07-01','12:12:52','Clock Out',2,'2401719828772'),(652,220,'6A20','Card','2024-07-01','12:12:49','Clock Out',2,'2201719828769'),(653,241,'6A41','Card','2024-07-01','12:12:44','Clock Out',2,'2411719828764'),(654,233,'6A33','Card','2024-07-01','12:12:41','Clock Out',2,'2331719828761'),(655,223,'6A23','Card','2024-07-01','12:12:14','Clock Out',2,'2231719828734'),(656,252,'6A52','Card','2024-07-01','12:12:02','Clock Out',2,'2521719828722'),(657,202,'6A2','Card','2024-07-01','12:11:33','Clock Out',2,'2021719828693'),(658,201,'6Mollika1','Card','2024-07-01','12:11:29','Clock Out',2,'2011719828689'),(659,210,'6Mollika10','Card','2024-07-01','12:11:24','Clock Out',2,'2101719828684'),(660,214,'6A14','Card','2024-07-01','12:10:07','Clock Out',2,'2141719828607'),(661,211,'6A11','Card','2024-07-01','12:10:03','Clock Out',2,'2111719828603'),(662,204,'6Mollika4','Card','2024-07-01','12:09:56','Clock Out',2,'2041719828596'),(663,238,'6A38','Card','2024-07-01','12:09:54','Clock Out',2,'2381719828594'),(664,237,'6Mollika37','Card','2024-07-01','12:09:44','Clock Out',2,'2371719828584'),(665,206,'6A6','Card','2024-07-01','12:09:41','Clock Out',2,'2061719828581'),(666,247,'6A47','Card','2024-07-01','12:07:48','Clock Out',2,'2471719828468'),(667,208,'6A8','Card','2024-07-01','12:07:37','Clock Out',2,'2081719828457'),(668,223,'6A23','Card','2024-07-01','12:07:34','Clock Out',2,'2231719828454'),(669,218,'6A18','Card','2024-07-01','12:07:32','Clock Out',2,'2181719828452'),(670,209,'6A9','Card','2024-07-01','12:07:30','Clock Out',2,'2091719828450'),(671,207,'6Mollika7','Card','2024-07-01','12:07:25','Clock Out',2,'2071719828445'),(672,252,'6A52','Card','2024-07-01','12:07:23','Clock Out',2,'2521719828443'),(673,252,'6A52','Card','2024-07-01','12:07:12','Clock Out',2,'2521719828432'),(674,411,'8A11','Card','2024-07-01','11:42:54','Clock IN',1,'4111719826974'),(675,434,'8A34','Card','2024-07-01','11:42:53','Clock IN',1,'4341719826973'),(676,425,'8A25','Card','2024-07-01','11:42:48','Clock IN',1,'4251719826968'),(677,410,'8A10','Card','2024-07-01','11:42:46','Clock IN',1,'4101719826966'),(678,403,'8A3','Card','2024-07-01','11:42:42','Clock IN',1,'4031719826962'),(679,408,'8A8','Card','2024-07-01','11:42:35','Clock IN',1,'4081719826955'),(680,401,'8A1','Card','2024-07-01','11:42:31','Clock IN',1,'4011719826951'),(681,418,'8A18','Card','2024-07-01','11:42:19','Clock IN',1,'4181719826939'),(682,423,'8A23','Card','2024-07-01','11:42:10','Clock IN',1,'4231719826930'),(683,427,'8A27','Card','2024-07-01','11:42:07','Clock IN',1,'4271719826927'),(684,406,'8A6','Card','2024-07-01','11:41:55','Clock IN',1,'4061719826915'),(685,502,'9A2','Card','2024-07-01','11:38:52','Clock IN',1,'5021719826732'),(686,509,'9A9','Card','2024-07-01','11:38:50','Clock IN',1,'5091719826730'),(687,511,'9A11','Card','2024-07-01','11:38:06','Clock IN',1,'5111719826686'),(688,511,'9A11','Card','2024-07-01','11:37:35','Clock IN',1,'5111719826655'),(689,505,'9A5','Card','2024-07-01','11:37:28','Clock IN',1,'5051719826648'),(690,548,'9A48','Card','2024-07-01','11:36:39','Clock IN',1,'5481719826599'),(691,538,'9A38','Card','2024-07-01','11:36:28','Clock IN',1,'5381719826588'),(692,513,'9A13','Card','2024-07-01','11:36:06','Clock IN',1,'5131719826566'),(693,517,'9A17','Card','2024-07-01','11:36:04','Clock IN',1,'5171719826564'),(694,516,'9A16','Card','2024-07-01','11:36:02','Clock IN',1,'5161719826562'),(695,334,'7A34','Card','2024-07-01','11:33:19','Clock IN',1,'3341719826399'),(696,311,'7A11','Card','2024-07-01','11:33:11','Clock IN',1,'3111719826391'),(697,335,'7A35','Card','2024-07-01','11:33:06','Clock IN',1,'3351719826386'),(698,304,'7A4','Card','2024-07-01','11:33:03','Clock IN',1,'3041719826383'),(699,312,'7A12','Card','2024-07-01','11:32:50','Clock IN',1,'3121719826370'),(700,318,'7A18','Card','2024-07-01','11:32:47','Clock IN',1,'3181719826367'),(701,326,'7A26','Card','2024-07-01','11:32:45','Clock IN',1,'3261719826365'),(702,332,'7A32','Card','2024-07-01','11:32:43','Clock IN',1,'3321719826363'),(703,352,'7A52','Card','2024-07-01','11:32:21','Clock IN',1,'3521719826341'),(704,345,'7A45','Card','2024-07-01','11:32:15','Clock IN',1,'3451719826335'),(705,317,'7A17','Card','2024-07-01','11:32:10','Clock IN',1,'3171719826330'),(706,321,'7A21','Card','2024-07-01','11:32:03','Clock IN',1,'3211719826323'),(707,309,'7A9','Card','2024-07-01','11:32:01','Clock IN',1,'3091719826321'),(708,306,'7A6','Card','2024-07-01','11:31:56','Clock IN',1,'3061719826316'),(709,301,'7A1','Card','2024-07-01','11:31:49','Clock IN',1,'3011719826309'),(710,322,'7A22','Card','2024-07-01','11:31:43','Clock IN',1,'3221719826303'),(711,338,'7A38','Card','2024-07-01','11:31:40','Clock IN',1,'3381719826300'),(712,308,'7A8','Card','2024-07-01','11:31:37','Clock IN',1,'3081719826297'),(713,310,'7A10','Card','2024-07-01','11:30:12','Clock IN',1,'3101719826212'),(714,2,'7A10','Fingerprint','2024-07-01','11:27:15','Clock IN',1,'21719826035'),(715,310,'7A10','Card','2024-07-01','11:26:11','Clock IN',1,'3101719825971'),(716,336,'7A36','Card','2024-07-01','11:11:53','Clock IN',1,'3361719825113'),(717,1,'7A36','Password','2024-07-01','10:28:56','Clock IN',1,'11719822536'),(718,1,'7A36','Password','2024-07-01','10:28:48','Clock IN',1,'11719822528'),(719,5,'7A36','Fingerprint','2024-07-01','10:11:38','Clock IN',1,'51719821498'),(720,18,'7A36','Fingerprint','2024-07-01','09:56:19','Clock IN',1,'181719820579'),(721,10,'7A36','Fingerprint','2024-07-01','09:52:21','Clock IN',1,'101719820341'),(722,12,'7A36','Fingerprint','2024-07-01','09:46:01','Clock IN',1,'121719819961'),(723,16,'7A36','Fingerprint','2024-07-01','09:39:50','Clock IN',1,'161719819590'),(724,13,'7A36','Fingerprint','2024-07-01','09:30:25','Clock IN',1,'131719819025'),(725,15,'7A36','Fingerprint','2024-07-01','09:26:14','Clock IN',1,'151719818774'),(726,2,'7A36','Fingerprint','2024-07-01','09:23:48','Clock IN',1,'21719818628'),(727,3,'7A36','Fingerprint','2024-07-01','09:21:08','Clock IN',1,'31719818468'),(728,11,'7A36','Fingerprint','2024-07-01','09:14:31','Clock IN',1,'111719818071'),(729,6,'7A36','Fingerprint','2024-07-01','09:14:22','Clock IN',1,'61719818062'),(730,8,'7A36','Fingerprint','2024-07-01','08:49:48','Clock IN',1,'81719816588'),(731,17,'7A36','Fingerprint','2024-07-01','08:49:26','Clock IN',1,'171719816566'),(732,9,'7A36','Fingerprint','2024-07-01','08:49:07','Clock IN',1,'91719816547'),(733,4,'7A36','Fingerprint','2024-07-01','08:48:56','Clock IN',1,'41719816536'),(734,2,'7A36','Card','2024-06-30','13:31:31','Clock Out',2,'21719747091'),(735,3,'7A36','Fingerprint','2024-06-30','12:31:26','Clock Out',2,'31719743486'),(736,2,'7A36','Fingerprint','2024-06-30','10:25:03','Clock IN',1,'21719735903'),(737,15,'7A36','Fingerprint','2024-06-30','10:07:07','Clock IN',1,'151719734827'),(738,2,'7A36','Fingerprint','2024-06-30','10:04:48','Clock IN',1,'21719734688'),(739,18,'7A36','Fingerprint','2024-06-30','10:04:32','Clock IN',1,'181719734672'),(740,10,'7A36','Fingerprint','2024-06-30','09:57:43','Clock IN',1,'101719734263'),(741,3,'7A36','Fingerprint','2024-06-30','09:56:45','Clock IN',1,'31719734205'),(742,3,'7A36','Fingerprint','2024-06-30','09:50:15','Clock IN',1,'31719733815'),(743,16,'7A36','Fingerprint','2024-06-30','09:42:30','Clock IN',1,'161719733350'),(744,2,'7A36','Fingerprint','2024-06-30','09:35:30','Clock IN',1,'21719732930'),(745,13,'7A36','Fingerprint','2024-06-30','09:21:55','Clock IN',1,'131719732115'),(746,3,'7A36','Fingerprint','2024-06-30','09:21:18','Clock IN',1,'31719732078'),(747,8,'7A36','Fingerprint','2024-06-30','09:18:30','Clock IN',1,'81719731910'),(748,12,'7A36','Fingerprint','2024-06-30','09:18:11','Clock IN',1,'121719731891'),(749,6,'7A36','Fingerprint','2024-06-30','09:12:30','Clock IN',1,'61719731550'),(750,9,'7A36','Fingerprint','2024-06-30','09:11:18','Clock IN',1,'91719731478'),(751,4,'7A36','Fingerprint','2024-06-30','09:10:59','Clock IN',1,'41719731459'),(752,11,'7A36','Fingerprint','2024-06-30','09:10:52','Clock IN',1,'111719731452'),(753,17,'7A36','Fingerprint','2024-06-30','09:10:23','Clock IN',1,'171719731423'),(754,5,'7A36','Fingerprint','2024-06-30','09:10:08','Clock IN',1,'51719731408'),(755,2,'7A36','Fingerprint','2024-06-30','09:09:29','Clock IN',1,'21719731369'),(756,2,'7A36','Fingerprint','2024-06-30','09:08:10','Clock IN',1,'21719731290'),(757,2,'7A36','Card','2024-06-30','08:52:06','Clock IN',1,'21719730326'),(758,11,'7A36','Fingerprint','2024-06-27','16:06:15','Clock Out',2,'111719497175'),(759,17,'7A36','Fingerprint','2024-06-27','16:04:34','Clock Out',2,'171719497074'),(760,8,'7A36','Fingerprint','2024-06-27','16:04:08','Clock Out',2,'81719497048'),(761,16,'7A36','Fingerprint','2024-06-27','16:04:02','Clock Out',2,'161719497042'),(762,13,'7A36','Fingerprint','2024-06-27','16:03:42','Clock Out',2,'131719497022'),(763,4,'7A36','Fingerprint','2024-06-27','16:03:36','Clock Out',2,'41719497016'),(764,9,'7A36','Fingerprint','2024-06-27','16:03:30','Clock Out',2,'91719497010'),(765,15,'7A36','Fingerprint','2024-06-27','16:03:22','Clock Out',2,'151719497002'),(766,6,'7A36','Fingerprint','2024-06-27','15:42:24','Clock Out',2,'61719495744'),(767,3,'7A36','Fingerprint','2024-06-27','15:35:42','Clock Out',2,'31719495342'),(768,5,'7A36','Fingerprint','2024-06-27','15:35:22','Clock Out',2,'51719495322'),(769,2,'7A36','Fingerprint','2024-06-27','11:23:06','Clock IN',1,'21719480186'),(770,15,'7A36','Fingerprint','2024-06-27','09:42:29','Clock IN',1,'151719474149'),(771,16,'7A36','Fingerprint','2024-06-27','09:41:58','Clock IN',1,'161719474118'),(772,3,'7A36','Fingerprint','2024-06-27','09:20:38','Clock IN',1,'31719472838'),(773,13,'7A36','Fingerprint','2024-06-27','09:16:12','Clock IN',1,'131719472572'),(774,5,'7A36','Fingerprint','2024-06-27','09:15:51','Clock IN',1,'51719472551'),(775,5,'7A36','Fingerprint','2024-06-27','09:15:50','Clock IN',1,'51719472550'),(776,8,'7A36','Fingerprint','2024-06-27','09:12:01','Clock IN',1,'81719472321'),(777,6,'7A36','Fingerprint','2024-06-27','09:01:44','Clock IN',1,'61719471704'),(778,17,'7A36','Fingerprint','2024-06-27','08:58:28','Clock IN',1,'171719471508'),(779,9,'7A36','Fingerprint','2024-06-27','08:58:16','Clock IN',1,'91719471496'),(780,4,'7A36','Fingerprint','2024-06-27','08:58:11','Clock IN',1,'41719471491'),(781,2,'7A36','Fingerprint','2024-06-27','08:58:05','Clock IN',1,'21719471485'),(782,3,'7A36','Fingerprint','2024-06-26','16:26:11','Clock Out',2,'31719411971'),(783,14,'7A36','Fingerprint','2024-06-26','16:08:38','Clock Out',2,'141719410918'),(784,9,'7A36','Fingerprint','2024-06-26','16:06:54','Clock Out',2,'91719410814'),(785,13,'7A36','Fingerprint','2024-06-26','16:06:46','Clock Out',2,'131719410806'),(786,15,'7A36','Fingerprint','2024-06-26','16:06:37','Clock Out',2,'151719410797'),(787,17,'7A36','Fingerprint','2024-06-26','15:58:36','Clock Out',2,'171719410316'),(788,17,'7A36','Fingerprint','2024-06-26','15:58:34','Clock Out',2,'171719410314'),(789,8,'7A36','Fingerprint','2024-06-26','15:58:27','Clock Out',2,'81719410307'),(790,5,'7A36','Fingerprint','2024-06-26','15:58:22','Clock Out',2,'51719410302'),(791,8,'7A36','Fingerprint','2024-06-26','15:58:15','Clock Out',2,'81719410295'),(792,5,'7A36','Fingerprint','2024-06-26','15:58:09','Clock Out',2,'51719410289'),(793,11,'7A36','Fingerprint','2024-06-26','15:58:07','Clock Out',2,'111719410287'),(794,11,'7A36','Fingerprint','2024-06-26','15:58:05','Clock Out',2,'111719410285'),(795,421,'8A21','Card','2024-07-03','12:07:58','Clock Out',2,'4211720001278'),(796,503,'9A3','Card','2024-07-03','12:07:50','Clock Out',2,'5031720001270'),(797,547,'9A47','Card','2024-07-03','12:07:48','Clock Out',2,'5471720001268'),(798,507,'9A7','Card','2024-07-03','12:07:47','Clock Out',2,'5071720001267'),(799,519,'9A19','Card','2024-07-03','12:07:44','Clock Out',2,'5191720001264'),(800,506,'9A6','Card','2024-07-03','12:07:39','Clock Out',2,'5061720001259'),(801,508,'9A8','Card','2024-07-03','12:07:37','Clock Out',2,'5081720001257'),(802,541,'9A41','Card','2024-07-03','12:07:34','Clock Out',2,'5411720001254'),(803,536,'9A36','Card','2024-07-03','12:07:31','Clock Out',2,'5361720001251'),(804,530,'9A30','Card','2024-07-03','12:07:29','Clock Out',2,'5301720001249'),(805,518,'9A18','Card','2024-07-03','12:07:27','Clock Out',2,'5181720001247'),(806,532,'9A32','Card','2024-07-03','12:07:24','Clock Out',2,'5321720001244'),(807,526,'9A26','Card','2024-07-03','12:07:22','Clock Out',2,'5261720001242'),(808,510,'9A10','Card','2024-07-03','12:07:19','Clock Out',2,'5101720001239'),(809,555,'9A55','Card','2024-07-03','12:07:17','Clock Out',2,'5551720001237'),(810,515,'9A15','Card','2024-07-03','12:07:14','Clock Out',2,'5151720001234'),(811,535,'9A35','Card','2024-07-03','12:07:11','Clock Out',2,'5351720001231'),(812,540,'9A40','Card','2024-07-03','12:07:06','Clock Out',2,'5401720001226'),(813,527,'9A27','Card','2024-07-03','12:07:02','Clock Out',2,'5271720001222'),(814,523,'9A23','Card','2024-07-03','12:06:59','Clock Out',2,'5231720001219'),(815,512,'9A12','Card','2024-07-03','12:06:58','Clock Out',2,'5121720001218'),(816,522,'9A22','Card','2024-07-03','12:06:52','Clock Out',2,'5221720001212'),(817,557,'9A57','Card','2024-07-03','12:06:49','Clock Out',2,'5571720001209'),(818,524,'9A24','Card','2024-07-03','12:06:47','Clock Out',2,'5241720001207'),(819,504,'9A4','Card','2024-07-03','12:06:44','Clock Out',2,'5041720001204'),(820,558,'9A58','Card','2024-07-03','12:06:42','Clock Out',2,'5581720001202'),(821,525,'9A25','Card','2024-07-03','12:06:39','Clock Out',2,'5251720001199'),(822,539,'9A39','Card','2024-07-03','12:06:35','Clock Out',2,'5391720001195'),(823,237,'6Mollika37','Card','2024-07-03','12:04:18','Clock Out',2,'2371720001058'),(824,220,'6A20','Card','2024-07-03','12:03:52','Clock Out',2,'2201720001032'),(825,242,'6A42','Card','2024-07-03','12:03:49','Clock Out',2,'2421720001029'),(826,233,'6A33','Card','2024-07-03','12:03:45','Clock Out',2,'2331720001025'),(827,243,'6A43','Card','2024-07-03','12:03:42','Clock Out',2,'2431720001022'),(828,240,'6Mollika40','Card','2024-07-03','12:03:37','Clock Out',2,'2401720001017'),(829,234,'6Mollika34','Card','2024-07-03','12:03:34','Clock Out',2,'2341720001014'),(830,238,'6A38','Card','2024-07-03','12:03:23','Clock Out',2,'2381720001003'),(831,251,'6A51','Card','2024-07-03','12:03:19','Clock Out',2,'2511720000999'),(832,252,'6A52','Card','2024-07-03','12:03:15','Clock Out',2,'2521720000995'),(833,202,'6A2','Card','2024-07-03','12:02:58','Clock Out',2,'2021720000978'),(834,210,'6Mollika10','Card','2024-07-03','12:02:54','Clock Out',2,'2101720000974'),(835,201,'6Mollika1','Card','2024-07-03','12:02:50','Clock Out',2,'2011720000970'),(836,206,'6A6','Card','2024-07-03','12:02:41','Clock Out',2,'2061720000961'),(837,207,'6Mollika7','Card','2024-07-03','12:02:38','Clock Out',2,'2071720000958'),(838,204,'6Mollika4','Card','2024-07-03','12:02:35','Clock Out',2,'2041720000955'),(839,241,'6A41','Card','2024-07-03','12:02:31','Clock Out',2,'2411720000951'),(840,211,'6A11','Card','2024-07-03','12:02:27','Clock Out',2,'2111720000947'),(841,214,'6A14','Card','2024-07-03','12:02:22','Clock Out',2,'2141720000942'),(842,605,'10A5','Card','2024-06-24','10:45:02','Clock IN',1,'6051719218702'),(843,605,'10A5','Card','2024-06-24','10:44:56','Clock IN',1,'6051719218696');
/*!40000 ALTER TABLE `machineattlog` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `machineattlog` with 843 row(s)
--

--
-- Table structure for table `machinedata`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machinedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB AUTO_INCREMENT=1087 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machinedata`
--

LOCK TABLES `machinedata` WRITE;
/*!40000 ALTER TABLE `machinedata` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `machinedata` VALUES (1,201,'6A1'),(2,204,'6A4'),(3,207,'6A7'),(4,210,'6A10'),(5,213,'6A13'),(6,216,'6A16'),(7,219,'6A19'),(8,222,'6A22'),(9,225,'6A25'),(10,228,'6A28'),(11,231,'6A31'),(12,234,'6A34'),(13,237,'6A37'),(14,240,'6A40'),(15,243,'6A43'),(16,3046,'6A46'),(17,249,'6A49'),(18,252,'6A52'),(19,3055,'6A55'),(20,3058,'6A58'),(21,3061,'6A61'),(22,3064,'6A64'),(23,3067,'6A67'),(24,3070,'6A70'),(25,3073,'6A73'),(26,3076,'6A76'),(27,3079,'6A79'),(28,3082,'6A82'),(29,3085,'6A85'),(30,3088,'6A88'),(31,3091,'6A91'),(32,3094,'6A94'),(33,3097,'6A97'),(34,3100,'6A100'),(35,3103,'6A103'),(36,3106,'6A106'),(37,3109,'6A109'),(38,3115,'6A115'),(39,3118,'6A118'),(40,3121,'6A121'),(41,3124,'6A124'),(42,3130,'6A130'),(43,3133,'6A133'),(44,3136,'6A136'),(45,3139,'6A139'),(46,3142,'6A142'),(47,3145,'6A145'),(48,3148,'6A148'),(49,3151,'6A151'),(50,3154,'6A154'),(51,3160,'6A160'),(52,3163,'6A163'),(53,3166,'6A166'),(54,3169,'6A169'),(55,3002,'6B2'),(56,3005,'6B5'),(57,3008,'6B8'),(58,3014,'6B14'),(59,3020,'6B20'),(60,3023,'6B23'),(61,3026,'6B26'),(62,3029,'6B29'),(63,3032,'6B32'),(64,3035,'6B35'),(65,3038,'6B38'),(66,3041,'6B41'),(67,3044,'6B44'),(68,3047,'6B47'),(69,3050,'6B50'),(70,3053,'6B53'),(71,3056,'6B56'),(72,3059,'6B59'),(73,3062,'6B62'),(74,3065,'6B65'),(75,3068,'6B68'),(76,3071,'6B71'),(77,3074,'6B74'),(78,3077,'6B77'),(79,3080,'6B80'),(80,3083,'6B83'),(81,3086,'6B86'),(82,3089,'6B89'),(83,3092,'6B92'),(84,3095,'6B95'),(85,3098,'6B98'),(86,3101,'6B101'),(87,3104,'6B104'),(88,3107,'6B107'),(89,3110,'6B110'),(90,3113,'6B113'),(91,3116,'6B116'),(92,3119,'6B119'),(93,3122,'6B122'),(94,3125,'6B125'),(95,3128,'6B128'),(96,3131,'6B131'),(97,3134,'6B134'),(98,3137,'6B137'),(99,3140,'6B140'),(100,3143,'6B143'),(101,3146,'6B146'),(102,3149,'6B149'),(103,3152,'6B152'),(104,3158,'6B158'),(105,3161,'6B161'),(106,3164,'6B164'),(107,3167,'6B167'),(108,3170,'6B170'),(109,301,'7A1'),(110,303,'7A3'),(111,305,'7A5'),(112,307,'7A7'),(113,309,'7A9'),(114,311,'7A11'),(115,313,'7A13'),(116,315,'7A15'),(117,317,'7A17'),(118,319,'7A19'),(119,321,'7A21'),(120,323,'7A23'),(121,325,'7A25'),(122,327,'7A27'),(123,329,'7A29'),(124,331,'7A31'),(125,333,'7A33'),(126,335,'7A35'),(127,3537,'7A37'),(128,339,'7A39'),(129,341,'7A41'),(130,343,'7A43'),(131,345,'7A45'),(132,347,'7A47'),(133,3549,'7A49'),(134,351,'7A51'),(135,353,'7A53'),(136,3555,'7A55'),(137,3557,'7A57'),(138,3559,'7A59'),(139,3561,'7A61'),(140,3563,'7A63'),(141,3565,'7A65'),(142,3567,'7A67'),(143,3569,'7A69'),(144,3571,'7A71'),(145,3573,'7A73'),(146,3575,'7A75'),(147,3577,'7A77'),(148,3579,'7A79'),(149,3581,'7A81'),(150,3583,'7A83'),(151,3585,'7A85'),(152,3587,'7A87'),(153,3589,'7A89'),(154,3591,'7A91'),(155,3593,'7A93'),(156,3595,'7A95'),(157,3597,'7A97'),(158,3599,'7A99'),(159,3601,'7A101'),(160,3603,'7A103'),(161,3605,'7A105'),(162,3607,'7A107'),(163,3609,'7A109'),(164,3611,'7A111'),(165,3613,'7A113'),(166,3615,'7A115'),(167,3617,'7A117'),(168,3619,'7A119'),(169,3621,'7A121'),(170,3623,'7A123'),(171,3625,'7A125'),(172,3627,'7A127'),(173,3629,'7A129'),(174,3631,'7A131'),(175,3502,'7B2'),(176,3504,'7B4'),(177,3506,'7B6'),(178,3508,'7B8'),(179,3510,'7B10'),(180,3512,'7B12'),(181,3514,'7B14'),(182,3516,'7B16'),(183,3518,'7B18'),(184,3520,'7B20'),(185,3522,'7B22'),(186,3524,'7B24'),(187,3526,'7B26'),(188,3528,'7B28'),(189,3530,'7B30'),(190,3532,'7B32'),(191,3534,'7B34'),(192,3536,'7B36'),(193,3538,'7B38'),(194,3540,'7B40'),(195,3542,'7B42'),(196,3544,'7B44'),(197,3548,'7B48'),(198,3550,'7B50'),(199,3552,'7B52'),(200,3554,'7B54'),(201,3556,'7B56'),(202,3558,'7B58'),(203,3560,'7B60'),(204,3562,'7B62'),(205,3564,'7B64'),(206,3566,'7B66'),(207,3568,'7B68'),(208,3570,'7B70'),(209,3572,'7B72'),(210,3574,'7B74'),(211,3576,'7B76'),(212,3578,'7B78'),(213,3580,'7B80'),(214,3582,'7B82'),(215,3584,'7B84'),(216,3586,'7B86'),(217,3588,'7B88'),(218,3590,'7B90'),(219,3592,'7B92'),(220,3594,'7B94'),(221,3596,'7B96'),(222,3598,'7B98'),(223,3600,'7B100'),(224,3602,'7B102'),(225,3604,'7B104'),(226,3606,'7B106'),(227,3608,'7B108'),(228,3610,'7B110'),(229,3612,'7B112'),(230,3614,'7B114'),(231,3616,'7B116'),(232,3618,'7B118'),(233,3620,'7B120'),(234,3622,'7B122'),(235,3624,'7B124'),(236,3626,'7B126'),(237,3628,'7B128'),(238,3630,'7B130'),(239,401,'8A1'),(240,403,'8A3'),(241,405,'8A5'),(242,407,'8A7'),(243,409,'8A9'),(244,411,'8A11'),(245,413,'8A13'),(246,415,'8A15'),(247,417,'8A17'),(248,419,'8A19'),(249,421,'8A21'),(250,423,'8A23'),(251,425,'8A25'),(252,427,'8A27'),(253,429,'8A29'),(254,431,'8A31'),(255,433,'8A33'),(256,435,'8A35'),(257,4037,'8A37'),(258,439,'8A39'),(259,441,'8A41'),(260,443,'8A43'),(261,4045,'8A45'),(262,447,'8A47'),(263,449,'8A49'),(264,4051,'8A51'),(265,4053,'8A53'),(266,4055,'8A55'),(267,4057,'8A57'),(268,4059,'8A59'),(269,4061,'8A61'),(270,4063,'8A63'),(271,4065,'8A65'),(272,4067,'8A67'),(273,4069,'8A69'),(274,4071,'8A71'),(275,4073,'8A73'),(276,4075,'8A75'),(277,4077,'8A77'),(278,4079,'8A79'),(279,4081,'8A81'),(280,4083,'8A83'),(281,4085,'8A85'),(282,4087,'8A87'),(283,4089,'8A89'),(284,4091,'8A91'),(285,4093,'8A93'),(286,4002,'8B2'),(287,4004,'8B4'),(288,4006,'8B6'),(289,4008,'8B8'),(290,4010,'8B10'),(291,4012,'8B12'),(292,4014,'8B14'),(293,4016,'8B16'),(294,4018,'8B18'),(295,4020,'8B20'),(296,4022,'8B22'),(297,4024,'8B24'),(298,4026,'8B26'),(299,4028,'8B28'),(300,4030,'8B30'),(301,4032,'8B32'),(302,4034,'8B34'),(303,4036,'8B36'),(304,4038,'8B38'),(305,4040,'8B40'),(306,4042,'8B42'),(307,4044,'8B44'),(308,4046,'8B46'),(309,4048,'8B48'),(310,4050,'8B50'),(311,4052,'8B52'),(312,4054,'8B54'),(313,4056,'8B56'),(314,4058,'8B58'),(315,4060,'8B60'),(316,4062,'8B62'),(317,4064,'8B64'),(318,4066,'8B66'),(319,4068,'8B68'),(320,4070,'8B70'),(321,4072,'8B72'),(322,4074,'8B74'),(323,4076,'8B76'),(324,4078,'8B78'),(325,4080,'8B80'),(326,4082,'8B82'),(327,4084,'8B84'),(328,4086,'8B86'),(329,4088,'8B88'),(330,4090,'8B90'),(331,4092,'8B92'),(332,501,'9A1'),(333,502,'9A2'),(334,503,'9A3'),(335,504,'9A4'),(336,505,'9A5'),(337,506,'9A6'),(338,507,'9A7'),(339,508,'9A8'),(340,509,'9A9'),(341,510,'9A10'),(342,511,'9A11'),(343,512,'9A12'),(344,513,'9A13'),(345,514,'9A14'),(346,515,'9A15'),(347,516,'9A16'),(348,517,'9A17'),(349,518,'9A18'),(350,519,'9A19'),(351,520,'9A20'),(352,521,'9A21'),(353,522,'9A22'),(354,523,'9A23'),(355,524,'9A24'),(356,525,'9A25'),(357,526,'9A26'),(358,4528,'9A28'),(359,4529,'9A29'),(360,530,'9A30'),(361,531,'9A31'),(362,532,'9A32'),(363,533,'9A33'),(364,534,'9A34'),(365,535,'9A35'),(366,536,'9A36'),(367,537,'9A37'),(368,538,'9A38'),(369,539,'9A39'),(370,540,'9A40'),(371,541,'9A41'),(372,542,'9A42'),(373,543,'9A43'),(374,544,'9A44'),(375,545,'9A45'),(376,546,'9A46'),(377,547,'9A47'),(378,548,'9A48'),(379,549,'9A49'),(380,550,'9A50'),(381,551,'9A51'),(382,552,'9A52'),(383,553,'9A53'),(384,554,'9A54'),(385,555,'9A55'),(386,556,'9A56'),(387,557,'9A57'),(388,558,'9A58'),(389,559,'9A59'),(390,560,'9A60'),(391,562,'9A62'),(392,563,'9A63'),(393,564,'9A64'),(394,565,'9A65'),(395,4566,'9A66'),(396,4567,'9A67'),(397,4568,'9A68'),(398,4569,'9A69'),(399,4570,'9A70'),(400,4571,'9A71'),(401,4572,'9A72'),(402,4573,'9A73'),(403,4574,'9A74'),(404,4575,'9A75'),(405,4576,'9A76'),(406,4577,'9A77'),(407,4578,'9A78'),(408,4579,'9A79'),(409,4580,'9A80'),(410,4581,'9A81'),(411,4582,'9A82'),(412,4583,'9A83'),(413,4584,'9A84'),(414,4585,'9A85'),(415,4586,'9A86'),(416,4587,'9A87'),(417,4588,'9A88'),(418,4590,'9A90'),(419,4591,'9A91'),(420,4592,'9A92'),(421,4593,'9A93'),(422,4595,'9A95'),(423,4596,'9A96'),(424,4597,'9A97'),(425,4598,'9A98'),(426,4599,'9A99'),(427,4600,'9A100'),(428,4601,'9A101'),(429,4602,'9A102'),(430,4603,'9A103'),(431,4604,'9A104'),(432,5001,'10Science1'),(433,5002,'10Science2'),(434,5003,'10Science3'),(435,5004,'10Science4'),(436,5005,'10Science5'),(437,5006,'10Science6'),(438,5008,'10Science8'),(439,5009,'10Science9'),(440,5010,'10Science10'),(441,5013,'10Science13'),(442,5014,'10Science14'),(443,5015,'10Science15'),(444,5016,'10Science16'),(445,5017,'10Science17'),(446,5019,'10Science19'),(447,5021,'10Science21'),(448,5023,'10Science23'),(449,5025,'10Science25'),(450,5029,'10Science29'),(451,5041,'10Science41'),(452,5043,'10Science43'),(453,5045,'10Science45'),(454,5050,'10Science50'),(455,5055,'10Science55'),(456,5056,'10Science56'),(457,5062,'10Science62'),(458,5018,'10Commerce18'),(459,5022,'10Commerce22'),(460,5042,'10Commerce42'),(461,5048,'10Commerce48'),(462,5073,'10Commerce73'),(463,5007,'10Arts7'),(464,5012,'10Arts12'),(465,5020,'10Arts20'),(466,5024,'10Arts24'),(467,5026,'10Arts26'),(468,5027,'10Arts27'),(469,5028,'10Arts28'),(470,5030,'10Arts30'),(471,5031,'10Arts31'),(472,5032,'10Arts32'),(473,5033,'10Arts33'),(474,5034,'10Arts34'),(475,5035,'10Arts35'),(476,5036,'10Arts36'),(477,5037,'10Arts37'),(478,5038,'10Arts38'),(479,5039,'10Arts39'),(480,5040,'10Arts40'),(481,5044,'10Arts44'),(482,5046,'10Arts46'),(483,5049,'10Arts49'),(484,5051,'10Arts51'),(485,5052,'10Arts52'),(486,5053,'10Arts53'),(487,5054,'10Arts54'),(488,5057,'10Arts57'),(489,5058,'10Arts58'),(490,5059,'10Arts59'),(491,5060,'10Arts60'),(492,5061,'10Arts61'),(493,5063,'10Arts63'),(494,5064,'10Arts64'),(495,5065,'10Arts65'),(496,5066,'10Arts66'),(497,5068,'10Arts68'),(498,5069,'10Arts69'),(499,5070,'10Arts70'),(500,5071,'10Arts71'),(501,5072,'10Arts72'),(502,5074,'10Arts74'),(503,5075,'10Arts75'),(504,5076,'10Arts76'),(505,5077,'10Arts77'),(506,5078,'10Arts78'),(507,201,'6Mollika1'),(508,202,'6Mollika2'),(509,203,'6Mollika3'),(510,204,'6Mollika4'),(511,205,'6Mollika5'),(512,206,'6Mollika6'),(513,207,'6Mollika7'),(514,208,'6Mollika8'),(515,209,'6Mollika9'),(516,210,'6Mollika10'),(517,211,'6Mollika11'),(518,212,'6Mollika12'),(519,213,'6Mollika13'),(520,214,'6Mollika14'),(521,215,'6Mollika15'),(522,216,'6Mollika16'),(523,217,'6Mollika17'),(524,218,'6Mollika18'),(525,219,'6Mollika19'),(526,220,'6Mollika20'),(527,221,'6Mollika21'),(528,222,'6Mollika22'),(529,223,'6Mollika23'),(530,224,'6Mollika24'),(531,225,'6Mollika25'),(532,226,'6Mollika26'),(533,227,'6Mollika27'),(534,228,'6Mollika28'),(535,229,'6Mollika29'),(536,230,'6Mollika30'),(537,231,'6Mollika31'),(538,232,'6Mollika32'),(539,233,'6Mollika33'),(540,234,'6Mollika34'),(541,235,'6Mollika35'),(542,236,'6Mollika36'),(543,237,'6Mollika37'),(544,238,'6Mollika38'),(545,239,'6Mollika39'),(546,240,'6Mollika40'),(547,325,'6Mollika125'),(548,326,'6Mollika126'),(549,327,'6Mollika127'),(550,602,'11Science102'),(551,603,'11Science103'),(552,605,'11Science105'),(553,606,'11Science106'),(554,607,'11Science107'),(555,608,'11Science108'),(556,609,'11Science109'),(557,610,'11Science110'),(558,611,'11Science111'),(559,612,'11Science112'),(560,613,'11Science113'),(561,614,'11Science114'),(562,615,'11Science115'),(563,616,'11Science116'),(564,801,'11Commerce201'),(565,802,'11Commerce202'),(566,803,'11Commerce203'),(567,1001,'11Arts301'),(568,1002,'11Arts302'),(569,1003,'11Arts303'),(570,1004,'11Arts304'),(571,1005,'11Arts305'),(572,1006,'11Arts306'),(573,1007,'11Arts307'),(574,1008,'11Arts308'),(575,1009,'11Arts309'),(576,1010,'11Arts310'),(577,1011,'11Arts311'),(578,1012,'11Arts312'),(579,1013,'11Arts313'),(580,1014,'11Arts314'),(581,1015,'11Arts315'),(582,1016,'11Arts316'),(583,1017,'11Arts317'),(584,1019,'11Arts319'),(585,1020,'11Arts320'),(586,1021,'11Arts321'),(587,1022,'11Arts322'),(588,1023,'11Arts323'),(589,1024,'11Arts324'),(590,1025,'11Arts325'),(591,1026,'11Arts326'),(592,1027,'11Arts327'),(593,1028,'11Arts328'),(594,1029,'11Arts329'),(595,1030,'11Arts330'),(596,1031,'11Arts331'),(597,1032,'11Arts332'),(598,1033,'11Arts333'),(599,1034,'11Arts334'),(600,1035,'11Arts335'),(601,1036,'11Arts336'),(602,1037,'11Arts337'),(603,1038,'11Arts338'),(604,1039,'11Arts339'),(605,1040,'11Arts340'),(606,1041,'11Arts341'),(607,1042,'11Arts342'),(608,1043,'11Arts343'),(609,1044,'11Arts344'),(610,1045,'11Arts345'),(611,1046,'11Arts346'),(612,1047,'11Arts347'),(613,1048,'11Arts348'),(614,1049,'11Arts349'),(615,1050,'11Arts350'),(616,1051,'11Arts351'),(617,1052,'11Arts352'),(618,1053,'11Arts353'),(619,1054,'11Arts354'),(620,1055,'11Arts355'),(621,1056,'11Arts356'),(622,1057,'11Arts357'),(623,1058,'11Arts358'),(624,1059,'11Arts359'),(625,1060,'11Arts360'),(626,1061,'11Arts361'),(627,1062,'11Arts362'),(628,1063,'11Arts363'),(629,1064,'11Arts364'),(630,1065,'11Arts365'),(631,1066,'11Arts366'),(632,1067,'11Arts367'),(633,1068,'11Arts368'),(634,1069,'11Arts369'),(635,1070,'11Arts370'),(636,1071,'11Arts371'),(637,1072,'11Arts372'),(638,1073,'11Arts373'),(639,1074,'11Arts374'),(640,1075,'11Arts375'),(641,1076,'11Arts376'),(642,1077,'11Arts377'),(643,1078,'11Arts378'),(644,1079,'11Arts379'),(645,1080,'11Arts380'),(646,1081,'11Arts381'),(647,1082,'11Arts382'),(648,1086,'11Arts386'),(649,1087,'11Arts387'),(650,1088,'11Arts388'),(651,1089,'11Arts389'),(652,1090,'11Arts390'),(653,1091,'11Arts391'),(654,1092,'11Arts392'),(655,1093,'11Arts393'),(656,1094,'11Arts394'),(657,1095,'11Arts395'),(658,1096,'11Arts396'),(659,1097,'11Arts397'),(660,1098,'11Arts398'),(661,1099,'11Arts399'),(662,1100,'11Arts400'),(663,1101,'11Arts401'),(664,1102,'11Arts402'),(665,1103,'11Arts403'),(666,1104,'11Arts404'),(667,1105,'11Arts405'),(668,1106,'11Arts406'),(669,1107,'11Arts407'),(670,1108,'11Arts408'),(671,1109,'11Arts409'),(672,1110,'11Arts410'),(673,1111,'11Arts411'),(674,1112,'11Arts412'),(675,1113,'11Arts413'),(676,1114,'11Arts414'),(677,1115,'11Arts415'),(678,1116,'11Arts416'),(679,1117,'11Arts417'),(680,1118,'11Arts418'),(681,1119,'11Arts419'),(682,1120,'11Arts420'),(683,1121,'11Arts421'),(684,1122,'11Arts422'),(685,1123,'11Arts423'),(686,1124,'11Arts424'),(687,1125,'11Arts425'),(688,1126,'11Arts426'),(689,1127,'11Arts427'),(690,1128,'11Arts428'),(691,1129,'11Arts429'),(692,1130,'11Arts430'),(693,1131,'11Arts431'),(694,1132,'11Arts432'),(695,1133,'11Arts433'),(696,1135,'11Arts435'),(697,1136,'11Arts436'),(698,1137,'11Arts437'),(699,1138,'11Arts438'),(700,1139,'11Arts439'),(701,1140,'11Arts440'),(702,1141,'11Arts441'),(703,1142,'11Arts442'),(704,1143,'11Arts443'),(705,1144,'11Arts444'),(706,1145,'11Arts445'),(707,1146,'11Arts446'),(708,1147,'11Arts447'),(709,1148,'11Arts448'),(710,1149,'11Arts449'),(711,1150,'11Arts450'),(712,1151,'11Arts451'),(713,1152,'11Arts452'),(714,1153,'11Arts453'),(715,1154,'11Arts454'),(716,1155,'11Arts455'),(717,1156,'11Arts456'),(718,1157,'11Arts457'),(719,1158,'11Arts458'),(720,1159,'11Arts459'),(721,1161,'11Arts461'),(722,1162,'11Arts462'),(723,1163,'11Arts463'),(724,1164,'11Arts464'),(725,1165,'11Arts465'),(726,1166,'11Arts466'),(727,1167,'11Arts467'),(728,1168,'11Arts468'),(729,1169,'11Arts469'),(730,1170,'11Arts470'),(731,1171,'11Arts471'),(732,1172,'11Arts472'),(733,1173,'11Arts473'),(734,1174,'11Arts474'),(735,1175,'11Arts475'),(736,1176,'11Arts476'),(737,1177,'11Arts477'),(738,1178,'11Arts478'),(739,1179,'11Arts479'),(740,1181,'11Arts481'),(741,1182,'11Arts482'),(742,1183,'11Arts483'),(743,1184,'11Arts484'),(744,1185,'11Arts485'),(745,1186,'11Arts486'),(746,1187,'11Arts487'),(747,1188,'11Arts488'),(748,1189,'11Arts489'),(749,1190,'11Arts490'),(750,1191,'11Arts491'),(751,1198,'11Arts498'),(752,2101,'12Science101'),(753,2102,'12Science102'),(754,2103,'12Science103'),(755,2104,'12Science104'),(756,2501,'12Arts301'),(757,2502,'12Arts302'),(758,2503,'12Arts303'),(759,2504,'12Arts304'),(760,2505,'12Arts305'),(761,2506,'12Arts306'),(762,2507,'12Arts307'),(763,2508,'12Arts308'),(764,2509,'12Arts309'),(765,2510,'12Arts310'),(766,2511,'12Arts311'),(767,2512,'12Arts312'),(768,2513,'12Arts313'),(769,2514,'12Arts314'),(770,2515,'12Arts315'),(771,2516,'12Arts316'),(772,2519,'12Arts319'),(773,2520,'12Arts320'),(774,2522,'12Arts322'),(775,2523,'12Arts323'),(776,2524,'12Arts324'),(777,2525,'12Arts325'),(778,2526,'12Arts326'),(779,2529,'12Arts329'),(780,2530,'12Arts330'),(781,2531,'12Arts331'),(782,2533,'12Arts333'),(783,2534,'12Arts334'),(784,2535,'12Arts335'),(785,2536,'12Arts336'),(786,2537,'12Arts337'),(787,2540,'12Arts340'),(788,2541,'12Arts341'),(789,2542,'12Arts342'),(790,2544,'12Arts344'),(791,2548,'12Arts348'),(792,2549,'12Arts349'),(793,2550,'12Arts350'),(794,2552,'12Arts352'),(795,2554,'12Arts354'),(796,2556,'12Arts356'),(797,2559,'12Arts359'),(798,2561,'12Arts361'),(799,2565,'12Arts365'),(800,2569,'12Arts369'),(801,2579,'12Arts379'),(802,2586,'12Arts386'),(803,2587,'12Arts387'),(804,2588,'12Arts388'),(805,2590,'12Arts390'),(806,2594,'12Arts394'),(807,2597,'12Arts397'),(808,2598,'12Arts398'),(809,2602,'12Arts402'),(810,2605,'12Arts405'),(811,2608,'12Arts408'),(812,2613,'12Arts413'),(813,2614,'12Arts414'),(814,2618,'12Arts418'),(815,2621,'12Arts421'),(816,2622,'12Arts422'),(817,2624,'12Arts424'),(818,2625,'12Arts425'),(819,2628,'12Arts428'),(820,2631,'12Arts431'),(821,2635,'12Arts435'),(822,2643,'12Arts443'),(823,2645,'12Arts445'),(825,202,'6A2'),(826,203,'6A3'),(828,205,'6A5'),(829,206,'6A6'),(831,208,'6A8'),(832,209,'6A9'),(834,211,'6A11'),(835,212,'6A12'),(837,214,'6A14'),(838,215,'6A15'),(840,217,'6A17'),(841,218,'6A18'),(843,220,'6A20'),(844,221,'6A21'),(846,223,'6A23'),(847,224,'6A24'),(849,226,'6A26'),(850,227,'6A27'),(852,229,'6A29'),(853,230,'6A30'),(855,233,'6A33'),(858,238,'6A38'),(859,239,'6A39'),(861,241,'6A41'),(862,242,'6A42'),(864,244,'6A44'),(865,245,'6A45'),(866,247,'6A47'),(867,248,'6A48'),(869,250,'6A50'),(870,251,'6A51'),(872,253,'6A53'),(873,254,'6A54'),(875,302,'7A2'),(877,304,'7A4'),(879,306,'7A6'),(881,308,'7A8'),(883,310,'7A10'),(885,312,'7A12'),(887,314,'7A14'),(889,316,'7A16'),(891,318,'7A18'),(894,322,'7A22'),(896,324,'7A24'),(898,326,'7A26'),(900,328,'7A28'),(902,330,'7A30'),(904,332,'7A32'),(906,334,'7A34'),(908,336,'7A36'),(909,338,'7A38'),(911,340,'7A40'),(913,342,'7A42'),(915,344,'7A44'),(917,346,'7A46'),(919,348,'7A48'),(920,350,'7A50'),(922,352,'7A52'),(924,354,'7A54'),(926,402,'8A2'),(928,404,'8A4'),(930,406,'8A6'),(932,408,'8A8'),(934,410,'8A10'),(937,414,'8A14'),(940,418,'8A18'),(942,420,'8A20'),(944,422,'8A22'),(946,424,'8A24'),(948,426,'8A26'),(950,428,'8A28'),(952,430,'8A30'),(954,432,'8A32'),(956,434,'8A34'),(958,436,'8A36'),(959,438,'8A38'),(962,442,'8A42'),(964,444,'8A44'),(965,446,'8A46'),(967,448,'8A48'),(969,450,'8A50'),(996,527,'9A27'),(1028,561,'9A61'),(1033,601,'10A1'),(1034,602,'10A2'),(1035,603,'10A3'),(1036,604,'10A4'),(1037,605,'10A5'),(1038,606,'10A6'),(1039,607,'10A7'),(1040,608,'10A8'),(1041,609,'10A9'),(1042,610,'10A10'),(1043,611,'10A11'),(1044,612,'10A12'),(1045,613,'10A13'),(1046,614,'10A14'),(1047,615,'10A15'),(1048,616,'10A16'),(1049,617,'10A17'),(1050,618,'10A18'),(1051,619,'10A19'),(1052,620,'10A20'),(1053,621,'10A21'),(1054,622,'10A22'),(1055,623,'10A23'),(1056,624,'10A24'),(1057,625,'10A25'),(1058,626,'10A26'),(1059,628,'10A28'),(1060,629,'10A29'),(1061,630,'10A30'),(1062,631,'10A31'),(1063,632,'10A32'),(1064,633,'10A33'),(1065,634,'10A34'),(1066,635,'10A35'),(1067,636,'10A36'),(1068,637,'10A37'),(1069,638,'10A38'),(1070,639,'10A39'),(1071,640,'10A40'),(1072,641,'10A41'),(1073,642,'10A42'),(1074,643,'10A43'),(1075,644,'10A44'),(1076,645,'10A45'),(1077,646,'10A46'),(1078,647,'10A47'),(1079,648,'10A48'),(1080,649,'10A49'),(1081,650,'10A50'),(1082,651,'10A51'),(1083,652,'10A52'),(1084,653,'10A53'),(1085,654,'10A54'),(1086,2026101,'11Science2024101');
/*!40000 ALTER TABLE `machinedata` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `machinedata` with 960 row(s)
--

--
-- Table structure for table `markentrylog`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markentrylog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teachername` varchar(255) NOT NULL,
  `loginip` varchar(255) NOT NULL,
  `logintime` varchar(255) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `subcode` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `markentrylog`
--

LOCK TABLES `markentrylog` WRITE;
/*!40000 ALTER TABLE `markentrylog` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `markentrylog` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `markentrylog` with 0 row(s)
--

--
-- Table structure for table `meritlist`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meritlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `totalmark` int(11) NOT NULL,
  `obtainmark` int(11) NOT NULL,
  `gpa` float NOT NULL,
  `gpa4th` float NOT NULL,
  `failsub` int(11) NOT NULL,
  `prevpos` int(11) NOT NULL,
  `curpos` int(11) NOT NULL,
  `uniqm` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqm` (`uniqm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meritlist`
--

LOCK TABLES `meritlist` WRITE;
/*!40000 ALTER TABLE `meritlist` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `meritlist` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `meritlist` with 0 row(s)
--

--
-- Table structure for table `noipunno_pr2`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noipunno_pr2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `heading_name` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noipunno_pr2`
--

LOCK TABLES `noipunno_pr2` WRITE;
/*!40000 ALTER TABLE `noipunno_pr2` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `noipunno_pr2` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `noipunno_pr2` with 0 row(s)
--

--
-- Table structure for table `noipunno_pr4`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noipunno_pr4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `heading_name` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noipunno_pr4`
--

LOCK TABLES `noipunno_pr4` WRITE;
/*!40000 ALTER TABLE `noipunno_pr4` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `noipunno_pr4` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `noipunno_pr4` with 0 row(s)
--

--
-- Table structure for table `noipunno_pr5`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noipunno_pr5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `subject_code` int(11) NOT NULL,
  `heading_name` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noipunno_pr5`
--

LOCK TABLES `noipunno_pr5` WRITE;
/*!40000 ALTER TABLE `noipunno_pr5` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `noipunno_pr5` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `noipunno_pr5` with 0 row(s)
--

--
-- Table structure for table `orders`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `orders` VALUES (1,'John Doe','john.doe@email.com','01711111111',0,'Dhaka','Pending','SSLCZ_TEST_667e275bb951b','BDT'),(2,'John Doe','shuvo01biswas@gmail.com','1783808373',1200,'Dhaka','Pending','SSLCZ_TEST_667e275f8307a','BDT'),(3,'John Doe','shuvo01biswas@gmail.com','1783808373',1200,'Dhaka','Pending','SSLCZ_TEST_667e279b63f16','BDT'),(4,'John Doe','shuvo01biswas@gmail.com','1783808373',1200,'Dhaka','Pending','SSLCZ_TEST_667e27e130f4a','BDT'),(5,'John Doe','john.doe@email.com','01711111111',0,'Dhaka','Pending','SSLCZ_TEST_667e28553d007','BDT'),(6,'John Doe','shuvo01biswas@gmail.com','1783808373',1200,'Dhaka','Processing','SSLCZ_TEST_667e2858abcd1','BDT'),(7,'John Doe','you@example.com','01711xxxxxx',1200,'Dhaka','Pending','SSLCZ_TEST_667e5bcca499c','BDT'),(8,'John Doe','you@example.com','01711xxxxxx',1200,'Dhaka','Pending','SSLCZ_TEST_667e5bd365990','BDT');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orders` with 8 row(s)
--

--
-- Table structure for table `paycat`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paycat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pcatname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paycat`
--

LOCK TABLES `paycat` WRITE;
/*!40000 ALTER TABLE `paycat` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paycat` VALUES (1,'Admission Fee'),(2,'Session Fee'),(3,'Regestration Fee'),(4,'Form Fill-up'),(5,'Half Yearly Exam Fee'),(6,'Final Exam Fee'),(7,'Electric bill'),(8,'Sallary- January'),(9,'Sallary- February'),(10,'Sallary- March'),(11,'Sallary- April'),(12,'Sallary- May'),(13,'Sallary- June'),(14,'Sallary- July'),(15,'Sallary- August'),(16,'Sallary- Septembar'),(17,'Sallary- Octobar'),(18,'Sallary- November'),(19,'Sallary- Decembar'),(20,'Test Exam Fee');
/*!40000 ALTER TABLE `paycat` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paycat` with 20 row(s)
--

--
-- Table structure for table `personalholyday`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personalholyday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `holydayname` varchar(255) NOT NULL,
  `numofday` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `actualday` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personalholyday`
--

LOCK TABLES `personalholyday` WRITE;
/*!40000 ALTER TABLE `personalholyday` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `personalholyday` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `personalholyday` with 0 row(s)
--

--
-- Table structure for table `protyon`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `protyon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_card` int(255) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `memorial_no` varchar(2000) NOT NULL,
  `village` varchar(2000) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `ps` varchar(2000) NOT NULL,
  `ds` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protyon`
--

LOCK TABLES `protyon` WRITE;
/*!40000 ALTER TABLE `protyon` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `protyon` VALUES (1,625577,'6Mollika5','2024-05-12','ths/01/2024/56','পুইশুর','বলাকইড়','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(2,625577,'6Mollika5','2024-06-21','sdfasdfa','পুইশুর','বলাকইড়','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(3,5482048,'7A5','2024-06-21','ths/ths/2024/01','পুইসুর','বলাকইর','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(4,13801387,'11Science105','2024-06-24','thsh//gs','পুইসুর','বলাকইর','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(5,6523062,'11Science105','2024-06-25','gregrhr','পুইসুর','বলাকইর','গোপালগঞ্জ সদর','গোপালগঞ্জ');
/*!40000 ALTER TABLE `protyon` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `protyon` with 5 row(s)
--

--
-- Table structure for table `publicholyday`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicholyday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `holydayname` varchar(255) NOT NULL,
  `numofday` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `friday` int(11) NOT NULL,
  `actualday` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicholyday`
--

LOCK TABLES `publicholyday` WRITE;
/*!40000 ALTER TABLE `publicholyday` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `publicholyday` VALUES (1,'General Holy Day',2,'2024-04-14','2024-04-15',0,2);
/*!40000 ALTER TABLE `publicholyday` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `publicholyday` with 1 row(s)
--

--
-- Table structure for table `resultpub`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultpub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `examid` (`examid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultpub`
--

LOCK TABLES `resultpub` WRITE;
/*!40000 ALTER TABLE `resultpub` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `resultpub` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `resultpub` with 0 row(s)
--

--
-- Table structure for table `rfid`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rfid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `rfid` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rfid` (`rfid`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rfid`
--

LOCK TABLES `rfid` WRITE;
/*!40000 ALTER TABLE `rfid` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `rfid` VALUES (2,'7A38',13584209),(3,'7A6',13584485),(4,'7A9',13642398),(5,'7A22',13570724),(6,'7A8',13581424),(7,'7A40',13587745),(8,'7A21',13571949),(9,'7A45',13635576),(10,'7A32',13704421),(11,'7A10',13605444),(12,'7A26',14301726),(13,'7A18',14283311),(14,'7A12',13638731),(15,'7A1',13616813),(16,'7A35',13636230),(17,'7A52',13636090),(18,'7A4',13596312),(19,'7A11',5011953),(20,'7A34',13637764),(21,'7A17',13570827),(22,'7A36',14276135),(23,'9A5',5034618),(24,'9A11',5026902),(25,'9A17',5057418),(26,'9A48',5012223),(27,'9A13',4988800),(28,'9A38',5015272),(29,'9A9',5040455),(30,'9A16',4978152),(31,'9A2',14281626),(32,'8A6',14279842),(33,'8A18',4989002),(34,'8A27',14281825),(35,'8A23',13705131),(36,'8A1',13594871),(37,'8A8',13639006),(38,'8A25',13575092),(39,'8A10',14281976),(40,'8A3',14251800),(41,'8A4',13571097),(42,'8A36',13638399),(43,'8A11',13596366),(44,'8A34',13642341),(45,'6A20',5006012),(46,'6A15',5039389),(47,'6A33',5015137),(48,'6A40',5036119),(49,'6A25',5050183),(50,'6A41',5022525),(51,'6A17',5040591),(52,'6A2',5034189),(53,'6A11',5011133),(54,'6A14',5034774),(55,'6A10',5051397),(56,'6A22',5044422),(57,'6A1',5055131),(58,'6A28',5052447),(59,'6A42',5048340),(60,'6A8',4986295),(61,'6A47',5027669),(62,'6A23',5035988),(63,'6A18',5030570),(64,'6A9',5043185),(65,'6A6',5039497),(66,'6A34',4999911),(67,'6A4',5022609),(68,'6A7',5055487),(69,'6A38',4986255),(70,'6A52',5044293),(71,'6A37',5055471),(72,'7A13',13638376),(73,'7A2',13580391),(74,'7A46',13588586),(75,'7A28',13645676),(76,'7A7',13621211),(77,'7A29',13571671),(78,'7A31',13607565),(79,'7A19',5023979),(80,'7A15',13572298),(81,'7A39',13642935),(82,'7A47',14282711),(83,'7A27',13634079),(84,'7A41',13588390),(85,'7A33',13635425),(86,'6A16',5059543),(87,'6A19',4985176),(88,'6A31',5055771),(89,'6A13',4979844),(90,'6A26',5055778),(91,'6A43',5040063),(92,'6A29',4978825),(93,'6A39',5051041),(94,'6A51',5027339),(95,'6A3',5052367),(96,'6A21',5046542),(97,'6A53',5047792),(98,'6A54',5058234),(99,'6A49',8235640),(100,'6A45',5640152),(101,'6A30',4988621),(102,'6A12',5002163),(103,'7A30',13545947),(104,'7A44',13545728),(105,'8A7',13578098),(106,'8A20',14311347),(107,'8A22',14281250),(108,'8A30',14280918),(109,'8A15',13594930),(110,'8A14',13639015),(111,'8A29',14253047),(112,'8A24',13652581),(113,'8A33',14282575),(114,'8A19',13634904),(115,'8A2',13571899),(116,'8A9',14311602),(117,'8A21',13605531),(118,'9A3',13634751),(119,'9A47',5041876),(120,'9A7',4999471),(121,'9A19',5015552),(122,'9A6',5017497),(123,'9A8',5023137),(124,'9A41',5001666),(125,'9A36',5051628),(126,'9A30',5040821),(127,'9A18',5050852),(128,'9A32',5050103),(129,'9A26',4997188),(130,'9A55',5026189),(131,'9A10',5029001),(132,'9A15',5060477),(133,'9A35',13580450),(134,'9A40',4983201),(135,'9A27',4983381),(136,'9A12',4986227),(137,'9A57',5020149),(138,'9A24',5058622),(139,'9A22',5042666),(141,'9A4',13583434),(142,'9A58',5014734),(143,'9A25',5021764),(144,'6A44',5031287),(145,'9A39',5031649),(146,'9A23',13572353),(147,'9A33',4996291),(148,'9A43',5057237),(149,'9A51',4978839),(150,'9A37',5051979),(151,'8A26',13571620),(153,'8A17',14280405),(154,'11Science2024101',13801387);
/*!40000 ALTER TABLE `rfid` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `rfid` with 151 row(s)
--

--
-- Table structure for table `schoolinfo`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schoolinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schoolname` varchar(255) DEFAULT NULL,
  `schooladdress` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `schoolnameb` varchar(255) DEFAULT NULL,
  `schooladdressb` varchar(255) DEFAULT NULL,
  `mobileb` varchar(255) DEFAULT NULL,
  `schmail` varchar(255) DEFAULT NULL,
  `shortcode` varchar(255) DEFAULT NULL,
  `softlink` varchar(255) DEFAULT NULL,
  `eiin` varchar(255) DEFAULT NULL,
  `estd` varchar(255) DEFAULT NULL,
  `schoolcode` varchar(255) DEFAULT NULL,
  `voccode` varchar(255) DEFAULT NULL,
  `headname` varchar(255) DEFAULT NULL,
  `headnameb` varchar(2000) DEFAULT NULL,
  `head_deg` varchar(1000) DEFAULT NULL,
  `head_deg_bangla` tinyblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolinfo`
--

LOCK TABLES `schoolinfo` WRITE;
/*!40000 ALTER TABLE `schoolinfo` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `schoolinfo` VALUES (1,'Thuthamandra High School','Vill: BALIABHANGA, Post: BALIABHANGA , PS:  Kotalipara ,DS: Gopalganj',' 01710884587','kotaliparaui.edu.bd','টুঠামান্দ্রা উচ্চ বিদ্যালয়','গ্রাম: টুঠামান্দ্রা পোস্ট:টুঠামান্দ্রা উপজেলা: গোপালগঞ্জ সদর জেলা: গোপালগঞ্জ','০১৩০৯১০৯৪৪১','kuikot1899@gmail.com','BHPSHS','https://www.kkc.edu.bd/shahs','109544','1898','6899','0','HIMANGSHU KUMAR PANDAY','প্রদ্যু কুমার ভদ্র','Principle',0xE0A685E0A6A7E0A78DE0A6AFE0A695E0A78DE0A6B7);
/*!40000 ALTER TABLE `schoolinfo` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `schoolinfo` with 1 row(s)
--

--
-- Table structure for table `sectiongroup`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sectiongroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `uninumber` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uninumber` (`uninumber`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectiongroup`
--

LOCK TABLES `sectiongroup` WRITE;
/*!40000 ALTER TABLE `sectiongroup` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sectiongroup` VALUES (5,'Class Seven',7,'A','7A'),(8,'Class Eight',8,'A','8A'),(23,'Class Seven',7,'B','7B'),(25,'Class Nine',9,'A','9A'),(27,'Class Ten',10,'Commerce','10Commerce'),(28,'Class Ten',10,'Science','10Science'),(29,'Class Ten',10,'Arts','10Arts'),(33,'Class Eight',8,'B','8B'),(34,'Class Nine',9,'B','9B'),(35,'Class Eleven',11,'Science','11Science'),(36,'Class Eleven',11,'Commerce','11Commerce'),(37,'Class Eleven',11,'Arts','11Arts'),(38,'Class Twelve',12,'Science','12Science'),(39,'Class Twelve',12,'Commerce','12Commerce'),(40,'Class Twelve',12,'Arts','12Arts'),(41,'Class Six',6,'A','6A'),(42,'Class Six',6,'B','6B');
/*!40000 ALTER TABLE `sectiongroup` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sectiongroup` with 17 row(s)
--

--
-- Table structure for table `set_admit_id`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_admit_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `examid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `payid` varchar(255) NOT NULL,
  `uni` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_admit_id`
--

LOCK TABLES `set_admit_id` WRITE;
/*!40000 ALTER TABLE `set_admit_id` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `set_admit_id` VALUES (1,1,6,'Mollika','1','6Mollika11'),(2,1,6,'Mollika','12','6Mollika112'),(3,1,6,'Mollika','13','6Mollika113');
/*!40000 ALTER TABLE `set_admit_id` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `set_admit_id` with 3 row(s)
--

--
-- Table structure for table `smsbal`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smsbal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `totalsms` int(11) NOT NULL,
  `bal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smsbal`
--

LOCK TABLES `smsbal` WRITE;
/*!40000 ALTER TABLE `smsbal` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `smsbal` VALUES (1,4500,4490);
/*!40000 ALTER TABLE `smsbal` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `smsbal` with 1 row(s)
--

--
-- Table structure for table `smslog`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smslog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  `number` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `charector` int(11) NOT NULL,
  `usedsms` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smslog`
--

LOCK TABLES `smslog` WRITE;
/*!40000 ALTER TABLE `smslog` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `smslog` VALUES (1,'SMS SENT THROUGH FUNCTION',1783808373,'Sent',25,1),(2,'sdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd ',1783808373,'Sent',1260,3),(3,'hjfsdfhobno',1783808373,'Sent',11,1),(4,'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount60Thanks ByBHPSHS Powered By Black Code IT',1783808373,'Sent',114,1),(5,'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount40Thanks ByBHPSHS Powered By Black Code IT',1783808373,'Sent',114,1),(6,'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount80Thanks ByBHPSHS Powered By Black Code IT',1783808373,'Sent',114,1),(7,'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount60Thanks ByBHPSHS Powered By Black Code IT',1783808373,'Sent',114,1),(8,'Hello Md. Sizan Rahman SarderYour Cash Amount 30 is received. Due amount30Thanks ByBHPSHS Powered By Black Code IT',1783808373,'Sent',114,1),(9,'Hello Md. Sizan Rahman SarderYour Cash Amount 100 is received. Due amount0Thanks ByBHPSHS Powered By Black Code IT',1783808373,'Sent',114,1),(10,'Hello DURJOY GHOSHYour Cash Amount 200 is received. Due amount0Thanks ByBHPSHS Powered By Black Code IT',1723554683,'Sent',103,1),(11,'Hello DURJOY GHOSHYour Cash Amount 300 is received. Due amount200Thanks ByBHPSHS Powered By Black Code IT',1723554683,'Sent',105,1),(12,'Hello No Data ON BRIS BDYour Cash Amount 300 is received. Due amount200Thanks ByBHPSHS Powered By Black Code IT',1704738944,'Sent',111,1),(13,'Hello No Data ON BRIS BDYour Cash Amount 100 is received. Due amount100Thanks ByBHPSHS Powered By Black Code IT',1704738944,'Sent',111,1);
/*!40000 ALTER TABLE `smslog` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `smslog` with 13 row(s)
--

--
-- Table structure for table `sslcommerz_transaction`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sslcommerz_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  `tran_date` datetime DEFAULT NULL,
  `tran_id` varchar(100) DEFAULT NULL,
  `val_id` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `store_amount` decimal(10,2) DEFAULT NULL,
  `bank_tran_id` varchar(100) DEFAULT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `data_a` varchar(255) DEFAULT NULL,
  `data_b` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tran_id` (`tran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sslcommerz_transaction`
--

LOCK TABLES `sslcommerz_transaction` WRITE;
/*!40000 ALTER TABLE `sslcommerz_transaction` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sslcommerz_transaction` VALUES (1,'VALIDATED','2024-06-29 08:15:34','SSLCZ_TEST_667f6e4588874','240629815410yAFcmgeHvtWWCH',1300.00,1228.50,'240629815410i7qj80pHfGsKip','DBBLMOBILEB-Dbbl Mobile Banking','144, 343, 356, 357','11Science105'),(10,'VALIDATED','2024-06-29 08:02:54','SSLCZ_TEST_667f6b1b94a59','240629802540RhLvOjnugIs0G3',1300.00,1267.50,'240629802540wp9Nr6VwpTvJ0H','NAGAD-Nagad','',''),(11,'VALIDATED','2024-06-29 08:41:13','SSLCZ_TEST_667f7448be7b3','24062984125yCE545uYXqjWMbO',3200.00,3024.00,'240629841250h4pqqxpG6FOBtX','CITYBANKIB-City Bank','367, 368, 369','11Science105'),(21,'VALID','2024-06-29 10:34:34','SSLCZ_TEST_667f8ed9addb0','24062910344807gHJTDBOoXuyKS',500.00,472.50,'240629103448R4ZMBGM3wsBE1XO','NAGAD-Nagad','162','11Arts307'),(22,'VALID','2024-06-29 16:26:40','SSLCZ_TEST_667fe15f89728','24062916265214UNZhYB4SXw9Ug',100.00,94.50,'240629162652197BylUmqd71r2x','TAP-TAP','160','11Arts305'),(23,'VALID','2024-06-30 07:36:15','SSLCZ_TEST_6680b68ec00ab','24063073631KIZJCwE6twc6a1Z',6900.00,6520.50,'24063073631Agys4QwNGXy0ECS','UPay-UPay','370, 371, 372, 373','11Arts307'),(24,'VALID','2024-06-30 13:08:33','SSLCZ_TEST_6681047088b33','2406301309190dNACT5QPCkv0Gj',1850.00,1748.25,'24063013091914itPulsXSAJGqG','NAGAD-Nagad','378, 379, 380','6A1'),(25,'VALID','2024-07-06 12:43:53','SSLCZ_TEST_6688e7a90bf7a','240706124412BQWtsAzDcIXVaHu',1000.00,945.00,'2407061244121gTtQ2WO2fvL2GE','BKASH-BKash','421','6A5');
/*!40000 ALTER TABLE `sslcommerz_transaction` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sslcommerz_transaction` with 8 row(s)
--

--
-- Table structure for table `stuaddress`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuaddress` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuaddress`
--

LOCK TABLES `stuaddress` WRITE;
/*!40000 ALTER TABLE `stuaddress` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `stuaddress` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stuaddress` with 0 row(s)
--

--
-- Table structure for table `stuaddressbangla`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuaddressbangla` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuaddressbangla`
--

LOCK TABLES `stuaddressbangla` WRITE;
/*!40000 ALTER TABLE `stuaddressbangla` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `stuaddressbangla` VALUES (1,'6Mollika5','পুইশুর','বলাকইড়','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(8,'7A5','পুইসুর','বলাকইর','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(10,'11Science105','পুইসুর','বলাকইর','গোপালগঞ্জ সদর','গোপালগঞ্জ');
/*!40000 ALTER TABLE `stuaddressbangla` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stuaddressbangla` with 3 row(s)
--

--
-- Table structure for table `stuattdancedata`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuattdancedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machineid` varchar(255) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `ctime` varchar(255) NOT NULL,
  `cinout` varchar(255) NOT NULL,
  `cinoutid` int(11) NOT NULL,
  `uniqattid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `serverstatus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqattid` (`uniqattid`)
) ENGINE=InnoDB AUTO_INCREMENT=894 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuattdancedata`
--

LOCK TABLES `stuattdancedata` WRITE;
/*!40000 ALTER TABLE `stuattdancedata` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `stuattdancedata` VALUES (1,'221','6Mollika21','2024-04-29','09:03:00','Clock IN',1,'22117143416001','Present','1'),(2,'220','6Mollika20','2024-04-29','09:02:58','Clock IN',1,'22017143416001','Present','1'),(3,'211','6Mollika11','2024-04-29','09:02:57','Clock IN',1,'21117143416001','Present','1'),(4,'226','6Mollika26','2024-04-29','09:02:55','Clock IN',1,'22617143416001','Present','1'),(5,'204','6Mollika4','2024-04-29','09:02:54','Clock IN',1,'20417143416001','Present','1'),(6,'201','6Mollika1','2024-04-29','09:02:51','Clock IN',1,'20117143416001','Present','1'),(7,'201','6Mollika1','2024-04-29','00:00:23','Unknown',3,'20117143416003','Present','1'),(8,'204','6Mollika4','2024-04-29','00:00:21','Unknown',3,'20417143416003','Present','1'),(9,'211','6Mollika11','2024-04-29','00:00:19','Unknown',3,'21117143416003','Present','1'),(10,'220','6Mollika20','2024-04-29','00:00:18','Unknown',3,'22017143416003','Present','1'),(11,'221','6Mollika21','2024-04-29','00:00:16','Unknown',3,'22117143416003','Present','1'),(12,'226','6Mollika26','2024-04-29','00:00:13','Unknown',3,'22617143416003','Present','1'),(13,'2','6Mollika26','2024-01-30','21:30:48','Unknown',3,'217065692003','Present','1'),(14,'12','6Mollika26','2024-01-27','13:17:19','Clock Out',2,'1217063100002','Present','1'),(15,'3','6Mollika26','2024-01-14','21:03:55','Unknown',3,'317051868003','Present','1'),(16,'4','6Mollika26','2023-11-19','12:16:54','Clock Out',2,'417003484002','Present','1'),(20,'4','6Mollika26','2023-10-28','11:49:01','Clock IN',1,'416984440001','Present','1'),(21,'3','6Mollika26','2023-10-28','11:48:57','Clock IN',1,'316984440001','Present','1'),(22,'2','6Mollika26','2023-10-28','11:48:51','Clock IN',1,'216984440001','Present','1'),(26,'1','6Mollika26','2023-06-10','18:20:57','Unknown',3,'116863480003','Present','1'),(30,'1','6Mollika26','2023-06-09','15:08:51','Clock Out',2,'116862616002','Present','1'),(33,'1012','6Mollika26','2023-05-28','01:11:29','Unknown',3,'101216852248003','Present','1'),(34,'1009','6Mollika26','2023-05-28','01:11:28','Unknown',3,'100916852248003','Present','1'),(35,'1005','6Mollika26','2023-05-28','01:11:26','Unknown',3,'100516852248003','Present','1'),(36,'1004','6Mollika26','2023-05-28','01:11:24','Unknown',3,'100416852248003','Present','1'),(37,'1027','6Mollika26','2023-05-28','01:11:23','Unknown',3,'102716852248003','Present','1'),(38,'1007','6Mollika26','2023-05-28','01:11:21','Unknown',3,'100716852248003','Present','1'),(39,'1031','6Mollika26','2023-05-28','01:11:20','Unknown',3,'103116852248003','Present','1'),(40,'1021','6Mollika26','2023-05-28','01:11:17','Unknown',3,'102116852248003','Present','1'),(41,'1072','6Mollika26','2023-05-28','01:11:16','Unknown',3,'107216852248003','Present','1'),(42,'1020','6Mollika26','2023-05-28','01:11:15','Unknown',3,'102016852248003','Present','1'),(43,'1052','6Mollika26','2023-05-28','01:11:13','Unknown',3,'105216852248003','Present','1'),(44,'1062','6Mollika26','2023-05-28','01:11:12','Unknown',3,'106216852248003','Present','1'),(45,'1042','6Mollika26','2023-05-28','01:11:10','Unknown',3,'104216852248003','Present','1'),(46,'1057','6Mollika26','2023-05-28','01:11:09','Unknown',3,'105716852248003','Present','1'),(47,'817','6Mollika26','2023-05-28','01:10:56','Unknown',3,'81716852248003','Present','1'),(48,'821','6Mollika26','2023-05-28','01:10:54','Unknown',3,'82116852248003','Present','1'),(49,'833','6Mollika26','2023-05-28','01:10:52','Unknown',3,'83316852248003','Present','1'),(50,'840','6Mollika26','2023-05-28','01:10:50','Unknown',3,'84016852248003','Present','1'),(51,'863','6Mollika26','2023-05-28','01:10:48','Unknown',3,'86316852248003','Present','1'),(52,'811','6Mollika26','2023-05-28','01:10:43','Unknown',3,'81116852248003','Present','1'),(53,'420','6Mollika26','2023-05-28','01:10:39','Unknown',3,'42016852248003','Present','1'),(54,'825','6Mollika26','2023-05-28','01:09:44','Unknown',3,'82516852248003','Present','1'),(55,'856','6Mollika26','2023-05-28','01:09:43','Unknown',3,'85616852248003','Present','1'),(56,'260','6Mollika26','2023-05-28','01:09:32','Unknown',3,'26016852248003','Present','1'),(57,'282','6Mollika26','2023-05-28','01:09:31','Unknown',3,'28216852248003','Present','1'),(58,'278','6Mollika26','2023-05-28','01:09:29','Unknown',3,'27816852248003','Present','1'),(59,'279','6Mollika26','2023-05-28','01:09:27','Unknown',3,'27916852248003','Present','1'),(60,'294','6Mollika26','2023-05-28','01:09:26','Unknown',3,'29416852248003','Present','1'),(61,'635','6Mollika26','2023-05-28','01:09:12','Unknown',3,'63516852248003','Present','1'),(62,'616','6Mollika26','2023-05-28','01:09:10','Unknown',3,'61616852248003','Present','1'),(63,'624','6Mollika26','2023-05-28','01:09:08','Unknown',3,'62416852248003','Present','1'),(64,'621','6Mollika26','2023-05-28','01:09:06','Unknown',3,'62116852248003','Present','1'),(65,'644','6Mollika26','2023-05-28','01:09:04','Unknown',3,'64416852248003','Present','1'),(66,'688','6Mollika26','2023-05-28','01:09:02','Unknown',3,'68816852248003','Present','1'),(67,'855','6Mollika26','2023-05-28','01:08:55','Unknown',3,'85516852248003','Present','1'),(68,'845','6Mollika26','2023-05-28','01:08:54','Unknown',3,'84516852248003','Present','1'),(69,'844','6Mollika26','2023-05-28','01:08:50','Unknown',3,'84416852248003','Present','1'),(70,'820','6Mollika26','2023-05-28','01:08:48','Unknown',3,'82016852248003','Present','1'),(71,'849','6Mollika26','2023-05-28','01:08:46','Unknown',3,'84916852248003','Present','1'),(72,'201','6Mollika1','2024-04-29','15:06:12','Clock Out',2,'20117143416002','Present','1'),(73,'204','6Mollika4','2024-04-29','15:06:10','Clock Out',2,'20417143416002','Present','1'),(74,'226','6Mollika26','2024-04-29','15:06:08','Clock Out',2,'22617143416002','Present','1'),(75,'211','6Mollika11','2024-04-29','15:06:07','Clock Out',2,'21117143416002','Present','1'),(76,'220','6Mollika20','2024-04-29','15:06:05','Clock Out',2,'22017143416002','Present','1'),(77,'221','6Mollika21','2024-04-29','15:06:03','Clock Out',2,'22117143416002','Present','1'),(78,'605','11Science105','2024-06-24','10:43:26','Clock IN',1,'60517191800001','Present',NULL),(79,'1','11Science105','2024-03-26','17:24:58','Unknown',3,'117114076003','Present',NULL),(80,'222','6Mollika22','2024-03-26','12:24:43','Clock Out',2,'22217114076002','Present',NULL),(82,'2','','2024-06-26','14:45:47','Clock Out',2,'217193528002','Present',NULL),(84,'14','','2024-06-26','13:02:11','Clock Out',2,'1417193528002','Present',NULL),(85,'12','','2024-06-26','10:54:55','Clock IN',1,'1217193528001','Present',NULL),(86,'6','','2024-06-26','09:55:08','Clock IN',1,'617193528001','Present',NULL),(87,'16','','2024-06-26','09:46:15','Clock IN',1,'1617193528001','Present',NULL),(88,'15','','2024-06-26','09:42:13','Clock IN',1,'1517193528001','Present',NULL),(89,'8','','2024-06-26','09:30:34','Clock IN',1,'817193528001','Present',NULL),(90,'3','','2024-06-26','09:22:30','Clock IN',1,'317193528001','Present',NULL),(91,'5','','2024-06-26','09:21:35','Clock IN',1,'517193528001','Present',NULL),(92,'11','','2024-06-26','09:12:48','Clock IN',1,'1117193528001','Present',NULL),(93,'13','','2024-06-26','09:09:44','Clock IN',1,'1317193528001','Present',NULL),(94,'9','','2024-06-26','09:09:32','Clock IN',1,'917193528001','Present',NULL),(95,'17','','2024-06-26','09:09:23','Clock IN',1,'1717193528001','Present',NULL),(96,'4','','2024-06-26','09:08:44','Clock IN',1,'417193528001','Present',NULL),(97,'2','','2024-06-26','09:07:50','Clock IN',1,'217193528001','Present',NULL),(98,'2','','2024-06-25','10:32:38','Clock IN',1,'217192664001','Present',NULL),(99,'2','','2024-06-20','12:45:51','Clock Out',2,'217188344002','Present',NULL),(100,'2','','2024-06-19','09:52:55','Clock IN',1,'217187480001','Present',NULL),(101,'12','','2024-06-16','12:25:21','Clock Out',2,'1217184888002','Present',NULL),(102,'2','','2024-06-16','10:38:57','Clock IN',1,'217184888001','Present',NULL),(103,'14','','2024-06-13','10:50:26','Clock IN',1,'1417182296001','Present',NULL),(104,'17','','2024-06-13','10:50:12','Clock IN',1,'1717182296001','Present',NULL),(105,'2','','2024-06-13','09:44:56','Clock IN',1,'217182296001','Present',NULL),(106,'3','','2024-06-12','14:42:35','Clock Out',2,'317181432002','Present',NULL),(107,'12','','2024-06-12','14:42:21','Clock Out',2,'1217181432002','Present',NULL),(108,'15','','2024-06-12','13:49:02','Clock Out',2,'1517181432002','Present',NULL),(109,'16','','2024-06-12','13:45:45','Clock Out',2,'1617181432002','Present',NULL),(110,'11','','2024-06-12','13:45:27','Clock Out',2,'1117181432002','Present',NULL),(111,'17','','2024-06-12','13:44:55','Clock Out',2,'1717181432002','Present',NULL),(112,'2','','2024-06-12','13:44:41','Clock Out',2,'217181432002','Present',NULL),(113,'4','','2024-06-12','13:42:17','Clock Out',2,'417181432002','Present',NULL),(114,'5','','2024-06-12','13:42:11','Clock Out',2,'517181432002','Present',NULL),(115,'8','','2024-06-12','13:42:00','Clock Out',2,'817181432002','Present',NULL),(116,'13','','2024-06-12','13:41:56','Clock Out',2,'1317181432002','Present',NULL),(117,'6','','2024-06-12','13:41:50','Clock Out',2,'617181432002','Present',NULL),(119,'10','','2024-06-12','10:00:09','Clock IN',1,'1017181432001','Present',NULL),(120,'13','','2024-06-12','09:46:16','Clock IN',1,'1317181432001','Present',NULL),(121,'11','','2024-06-12','09:45:38','Clock IN',1,'1117181432001','Present',NULL),(122,'6','','2024-06-12','09:43:18','Clock IN',1,'617181432001','Present',NULL),(123,'16','','2024-06-12','09:35:46','Clock IN',1,'1617181432001','Present',NULL),(124,'17','','2024-06-12','09:35:43','Clock IN',1,'1717181432001','Present',NULL),(125,'15','','2024-06-12','09:35:34','Clock IN',1,'1517181432001','Present',NULL),(126,'9','','2024-06-12','09:35:20','Clock IN',1,'917181432001','Present',NULL),(127,'12','','2024-06-12','09:35:14','Clock IN',1,'1217181432001','Present',NULL),(128,'3','','2024-06-12','09:35:11','Clock IN',1,'317181432001','Present',NULL),(129,'5','','2024-06-12','09:35:02','Clock IN',1,'517181432001','Present',NULL),(130,'4','','2024-06-12','09:34:50','Clock IN',1,'417181432001','Present',NULL),(131,'8','','2024-06-12','09:34:44','Clock IN',1,'817181432001','Present',NULL),(132,'10','','2024-06-11','15:24:34','Clock Out',2,'1017180568002','Present',NULL),(133,'16','','2024-06-11','15:24:25','Clock Out',2,'1617180568002','Present',NULL),(134,'12','','2024-06-11','15:24:17','Clock Out',2,'1217180568002','Present',NULL),(135,'2','','2024-06-11','15:24:06','Clock Out',2,'217180568002','Present',NULL),(136,'3','','2024-06-11','15:21:55','Clock Out',2,'317180568002','Present',NULL),(137,'13','','2024-06-11','15:21:07','Clock Out',2,'1317180568002','Present',NULL),(138,'8','','2024-06-11','15:20:33','Clock Out',2,'817180568002','Present',NULL),(139,'15','','2024-06-11','15:20:24','Clock Out',2,'1517180568002','Present',NULL),(140,'5','','2024-06-11','15:20:19','Clock Out',2,'517180568002','Present',NULL),(141,'11','','2024-06-11','15:20:09','Clock Out',2,'1117180568002','Present',NULL),(142,'6','','2024-06-11','15:19:57','Clock Out',2,'617180568002','Present',NULL),(143,'2','','2024-06-11','10:27:42','Clock IN',1,'217180568001','Present',NULL),(144,'13','','2024-06-11','09:51:23','Clock IN',1,'1317180568001','Present',NULL),(145,'10','','2024-06-11','09:45:08','Clock IN',1,'1017180568001','Present',NULL),(146,'16','','2024-06-11','09:41:27','Clock IN',1,'1617180568001','Present',NULL),(147,'15','','2024-06-11','09:31:00','Clock IN',1,'1517180568001','Present',NULL),(148,'3','','2024-06-11','09:29:01','Clock IN',1,'317180568001','Present',NULL),(149,'8','','2024-06-11','09:14:28','Clock IN',1,'817180568001','Present',NULL),(150,'11','','2024-06-11','09:08:57','Clock IN',1,'1117180568001','Present',NULL),(151,'4','','2024-06-11','09:06:53','Clock IN',1,'417180568001','Present',NULL),(152,'6','','2024-06-11','09:06:46','Clock IN',1,'617180568001','Present',NULL),(154,'5','','2024-06-11','08:45:27','Clock IN',1,'517180568001','Present',NULL),(155,'17','','2024-06-11','08:44:45','Clock IN',1,'1717180568001','Present',NULL),(156,'9','','2024-06-11','08:30:02','Clock IN',1,'917180568001','Present',NULL),(157,'12','','2024-06-11','08:29:53','Clock IN',1,'1217180568001','Present',NULL),(158,'2','','2024-06-10','13:57:02','Clock Out',2,'217179704002','Present',NULL),(159,'10','','2024-06-10','09:59:31','Clock IN',1,'1017179704001','Present',NULL),(160,'16','','2024-06-10','09:40:57','Clock IN',1,'1617179704001','Present',NULL),(161,'15','','2024-06-10','09:35:48','Clock IN',1,'1517179704001','Present',NULL),(162,'11','','2024-06-10','09:09:05','Clock IN',1,'1117179704001','Present',NULL),(163,'13','','2024-06-10','09:07:01','Clock IN',1,'1317179704001','Present',NULL),(164,'3','','2024-06-10','08:57:49','Clock IN',1,'317179704001','Present',NULL),(165,'8','','2024-06-10','08:53:10','Clock IN',1,'817179704001','Present',NULL),(166,'4','','2024-06-10','08:43:08','Clock IN',1,'417179704001','Present',NULL),(167,'2','','2024-06-10','08:43:01','Clock IN',1,'217179704001','Present',NULL),(168,'9','','2024-06-10','08:26:55','Clock IN',1,'917179704001','Present',NULL),(169,'5','','2024-06-10','08:05:29','Clock IN',1,'517179704001','Present',NULL),(170,'17','','2024-06-10','08:02:00','Clock IN',1,'1717179704001','Present',NULL),(171,'6','','2024-06-10','08:01:45','Clock IN',1,'617179704001','Present',NULL),(172,'12','','2024-06-10','08:01:42','Clock IN',1,'1217179704001','Present',NULL),(173,'3','','2024-06-09','16:04:26','Clock Out',2,'317178840002','Present',NULL),(174,'12','','2024-06-09','16:04:18','Clock Out',2,'1217178840002','Present',NULL),(175,'9','','2024-06-09','16:04:07','Clock Out',2,'917178840002','Present',NULL),(176,'15','','2024-06-09','16:03:59','Clock Out',2,'1517178840002','Present',NULL),(177,'13','','2024-06-09','16:03:46','Clock Out',2,'1317178840002','Present',NULL),(178,'8','','2024-06-09','16:03:23','Clock Out',2,'817178840002','Present',NULL),(179,'10','','2024-06-09','16:01:35','Clock Out',2,'1017178840002','Present',NULL),(180,'4','','2024-06-09','16:00:35','Clock Out',2,'417178840002','Present',NULL),(181,'7','','2024-06-09','15:51:51','Clock Out',2,'717178840002','Present',NULL),(182,'5','','2024-06-09','15:49:05','Clock Out',2,'517178840002','Present',NULL),(183,'10','','2024-06-09','09:57:29','Clock IN',1,'1017178840001','Present',NULL),(184,'15','','2024-06-09','09:46:46','Clock IN',1,'1517178840001','Present',NULL),(185,'16','','2024-06-09','09:44:33','Clock IN',1,'1617178840001','Present',NULL),(186,'7','','2024-06-09','09:36:32','Clock IN',1,'717178840001','Present',NULL),(187,'6','','2024-06-09','09:17:13','Clock IN',1,'617178840001','Present',NULL),(188,'8','','2024-06-09','09:15:01','Clock IN',1,'817178840001','Present',NULL),(189,'13','','2024-06-09','09:14:21','Clock IN',1,'1317178840001','Present',NULL),(190,'4','','2024-06-09','09:10:04','Clock IN',1,'417178840001','Present',NULL),(191,'11','','2024-06-09','09:03:53','Clock IN',1,'1117178840001','Present',NULL),(192,'3','','2024-06-09','09:03:26','Clock IN',1,'317178840001','Present',NULL),(193,'17','','2024-06-09','08:59:11','Clock IN',1,'1717178840001','Present',NULL),(194,'5','','2024-06-09','08:55:33','Clock IN',1,'517178840001','Present',NULL),(195,'9','','2024-06-09','08:55:08','Clock IN',1,'917178840001','Present',NULL),(196,'12','','2024-06-09','08:55:01','Clock IN',1,'1217178840001','Present',NULL),(197,'18','','2024-06-08','10:52:00','Clock IN',1,'1817177976001','Present',NULL),(198,'13','','2024-06-08','10:08:50','Clock IN',1,'1317177976001','Present',NULL),(199,'7','','2024-06-08','09:48:20','Clock IN',1,'717177976001','Present',NULL),(200,'6','','2024-06-08','09:48:15','Clock IN',1,'617177976001','Present',NULL),(201,'16','','2024-06-08','09:28:30','Clock IN',1,'1617177976001','Present',NULL),(202,'8','','2024-06-08','09:22:48','Clock IN',1,'817177976001','Present',NULL),(203,'4','','2024-06-08','09:11:08','Clock IN',1,'417177976001','Present',NULL),(204,'10','','2024-06-08','09:10:44','Clock IN',1,'1017177976001','Present',NULL),(205,'12','','2024-06-08','09:02:39','Clock IN',1,'1217177976001','Present',NULL),(206,'3','','2024-06-08','08:52:19','Clock IN',1,'317177976001','Present',NULL),(207,'15','','2024-06-08','08:49:41','Clock IN',1,'1517177976001','Present',NULL),(208,'11','','2024-06-08','08:33:04','Clock IN',1,'1117177976001','Present',NULL),(209,'17','','2024-06-08','08:24:54','Clock IN',1,'1717177976001','Present',NULL),(210,'9','','2024-06-08','08:14:52','Clock IN',1,'917177976001','Present',NULL),(211,'5','','2024-06-08','08:14:44','Clock IN',1,'517177976001','Present',NULL),(212,'2','','2024-06-08','08:12:05','Clock IN',1,'217177976001','Present',NULL),(213,'5','','2024-06-06','09:37:05','Clock IN',1,'517176248001','Present',NULL),(214,'2','','2024-06-06','08:26:35','Clock IN',1,'217176248001','Present',NULL),(215,'1','','2024-06-06','08:26:29','Clock IN',1,'117176248001','Present',NULL),(216,'2','','2024-06-05','12:42:15','Clock Out',2,'217175384002','Present',NULL),(218,'9','','2024-06-05','12:27:28','Clock Out',2,'917175384002','Present',NULL),(220,'4','','2024-06-05','12:19:04','Clock Out',2,'417175384002','Present',NULL),(222,'1','','2024-06-05','12:10:10','Clock Out',2,'117175384002','Present',NULL),(228,'1','','2024-06-05','12:00:53','Unknown',3,'117175384003','Present',NULL),(229,'1','','2024-06-05','11:59:27','Clock IN',1,'117175384001','Present',NULL),(232,'1','','2024-03-07','12:29:12','Clock Out',2,'117097660002','Present',NULL),(233,'1','','2023-08-28','09:31:18','Clock IN',1,'116931736001','Present',NULL),(234,'9','','2023-03-22','12:43:12','Clock Out',2,'916794396002','Present',NULL),(235,'2','','2022-01-02','09:40:16','Clock IN',1,'216410780001','Present',NULL),(236,'1','','2022-01-02','09:40:04','Clock IN',1,'116410780001','Present',NULL),(237,'1','','2021-11-11','10:03:39','Clock IN',1,'116365852001','Present',NULL),(238,'2','','2021-11-11','10:03:31','Clock IN',1,'216365852001','Present',NULL),(239,'2','','2021-11-01','09:45:59','Clock IN',1,'216357212001','Present',NULL),(240,'2','','2021-10-26','10:17:30','Clock IN',1,'216351992001','Present',NULL),(241,'2','','2021-10-25','10:11:29','Clock IN',1,'216351128001','Present',NULL),(242,'2','','2021-10-23','10:10:39','Clock IN',1,'216349400001','Present',NULL),(243,'2','','2021-10-21','09:52:48','Clock IN',1,'216347672001','Present',NULL),(244,'2','','2021-10-10','09:42:33','Clock IN',1,'216338168001','Present',NULL),(245,'2','','2021-10-09','10:03:28','Clock IN',1,'216337304001','Present',NULL),(246,'2','','2021-10-05','10:52:54','Clock IN',1,'216333848001','Present',NULL),(247,'4','','2021-10-02','09:31:16','Clock IN',1,'416331256001','Present',NULL),(248,'2','','2021-09-30','10:14:13','Clock IN',1,'216329528001','Present',NULL),(249,'4','','2021-09-29','09:44:24','Clock IN',1,'416328664001','Present',NULL),(250,'2','','2021-09-29','09:44:02','Clock IN',1,'216328664001','Present',NULL),(251,'2','','2021-09-28','09:38:09','Clock IN',1,'216327800001','Present',NULL),(252,'7','','2021-09-27','10:08:37','Clock IN',1,'716326936001','Present',NULL),(253,'4','','2021-09-27','09:46:16','Clock IN',1,'416326936001','Present',NULL),(254,'2','','2021-09-27','09:43:38','Clock IN',1,'216326936001','Present',NULL),(255,'2','','2021-09-26','10:17:32','Clock IN',1,'216326072001','Present',NULL),(256,'2','','2021-09-25','09:59:45','Clock IN',1,'216325208001','Present',NULL),(257,'3','','2021-09-23','09:31:51','Clock IN',1,'316323480001','Present',NULL),(258,'4','','2021-09-23','09:31:45','Clock IN',1,'416323480001','Present',NULL),(259,'2','','2021-09-23','09:31:34','Clock IN',1,'216323480001','Present',NULL),(260,'7','','2021-09-21','09:53:21','Clock IN',1,'716321752001','Present',NULL),(261,'2','','2021-09-21','09:50:12','Clock IN',1,'216321752001','Present',NULL),(262,'2','','2021-09-20','09:41:30','Clock IN',1,'216320888001','Present',NULL),(263,'2','','2021-09-19','11:13:28','Clock IN',1,'216320024001','Present',NULL),(264,'4','','2021-09-18','09:54:59','Clock IN',1,'416319160001','Present',NULL),(265,'2','','2021-09-18','09:54:42','Clock IN',1,'216319160001','Present',NULL),(266,'7','','2021-09-18','09:42:56','Clock IN',1,'716319160001','Present',NULL),(267,'7','','2021-09-16','10:02:11','Clock IN',1,'716317432001','Present',NULL),(268,'2','','2021-09-14','10:15:10','Clock IN',1,'216315704001','Present',NULL),(269,'5','','2021-09-14','10:00:40','Clock IN',1,'516315704001','Present',NULL),(270,'2','','2021-09-13','11:19:00','Clock IN',1,'216314840001','Present',NULL),(272,'4','','2021-09-13','09:53:55','Clock IN',1,'416314840001','Present',NULL),(273,'5','','2021-09-13','09:42:13','Clock IN',1,'516314840001','Present',NULL),(274,'7','','2021-09-13','09:38:48','Clock IN',1,'716314840001','Present',NULL),(275,'2','','2021-09-12','14:28:27','Clock Out',2,'216313976002','Present',NULL),(276,'7','','2021-09-12','10:28:01','Clock IN',1,'716313976001','Present',NULL),(277,'8','','2021-09-12','10:27:07','Clock IN',1,'816313976001','Present',NULL),(278,'1','','2021-09-12','10:11:06','Clock IN',1,'116313976001','Present',NULL),(279,'2','','2021-09-12','10:11:00','Clock IN',1,'216313976001','Present',NULL),(281,'4','','2021-09-12','09:20:20','Clock IN',1,'416313976001','Present',NULL),(282,'9','','2021-09-12','09:18:05','Clock IN',1,'916313976001','Present',NULL),(283,'5','','2021-09-12','08:36:41','Clock IN',1,'516313976001','Present',NULL),(284,'3','','2021-09-12','07:40:09','Unknown',3,'316313976003','Present',NULL),(285,'2','','2021-04-24','11:35:49','Clock IN',1,'216192152001','Present',NULL),(286,'2','','2021-04-18','13:45:59','Clock Out',2,'216186968002','Present',NULL),(287,'3','','2021-04-11','10:16:58','Clock IN',1,'316180920001','Present',NULL),(288,'3','','2021-04-08','10:04:10','Clock IN',1,'316178328001','Present',NULL),(289,'3','','2021-04-07','09:36:33','Clock IN',1,'316177464001','Present',NULL),(290,'9','','2021-04-07','09:36:26','Clock IN',1,'916177464001','Present',NULL),(291,'9','','2021-04-03','10:02:34','Clock IN',1,'916174008001','Present',NULL),(292,'8','','2021-04-03','10:00:01','Clock IN',1,'816174008001','Present',NULL),(293,'3','','2021-04-03','09:25:00','Clock IN',1,'316174008001','Present',NULL),(294,'3','','2021-04-01','16:34:48','Clock Out',2,'316172280002','Present',NULL),(295,'9','','2021-04-01','10:59:40','Clock IN',1,'916172280001','Present',NULL),(296,'2','','2021-04-01','10:56:56','Clock IN',1,'216172280001','Present',NULL),(297,'2','','2021-03-31','10:32:27','Clock IN',1,'216171416001','Present',NULL),(298,'3','','2021-03-31','09:52:48','Clock IN',1,'316171416001','Present',NULL),(299,'9','','2021-03-29','10:31:38','Clock IN',1,'916169688001','Present',NULL),(300,'2','','2021-03-29','10:01:39','Clock IN',1,'216169688001','Present',NULL),(301,'3','','2021-03-29','09:53:52','Clock IN',1,'316169688001','Present',NULL),(302,'9','','2021-03-28','12:00:00','Clock IN',1,'916168860001','Present',NULL),(303,'8','','2021-03-28','10:16:36','Clock IN',1,'816168860001','Present',NULL),(304,'3','','2021-03-28','09:37:59','Clock IN',1,'316168860001','Present',NULL),(305,'9','','2021-03-27','10:53:43','Clock IN',1,'916167996001','Present',NULL),(306,'3','','2021-03-27','08:24:14','Clock IN',1,'316167996001','Present',NULL),(307,'7','','2021-03-26','11:57:20','Clock IN',1,'716167132001','Present',NULL),(308,'2','','2021-03-26','10:25:21','Clock IN',1,'216167132001','Present',NULL),(309,'3','','2021-03-26','08:45:21','Clock IN',1,'316167132001','Present',NULL),(310,'9','','2021-03-25','10:58:37','Clock IN',1,'916166268001','Present',NULL),(311,'3','','2021-03-25','09:39:49','Clock IN',1,'316166268001','Present',NULL),(312,'2','','2021-03-24','10:30:28','Clock IN',1,'216165404001','Present',NULL),(313,'9','','2021-03-24','10:18:56','Clock IN',1,'916165404001','Present',NULL),(314,'3','','2021-03-22','10:47:03','Clock IN',1,'316163676001','Present',NULL),(315,'9','','2021-03-21','10:47:53','Clock IN',1,'916162812001','Present',NULL),(316,'3','','2021-03-18','10:29:15','Clock IN',1,'316160220001','Present',NULL),(317,'8','','2021-03-18','10:18:00','Clock IN',1,'816160220001','Present',NULL),(318,'4','','2021-03-17','10:20:23','Clock IN',1,'416159356001','Present',NULL),(320,'2','','2021-03-17','10:18:50','Clock IN',1,'216159356001','Present',NULL),(321,'9','','2021-03-17','10:18:44','Clock IN',1,'916159356001','Present',NULL),(322,'8','','2021-03-17','09:52:51','Clock IN',1,'816159356001','Present',NULL),(323,'3','','2021-03-17','06:59:18','Unknown',3,'316159356003','Present',NULL),(324,'2','','2021-03-16','10:35:16','Clock IN',1,'216158492001','Present',NULL),(325,'3','','2021-03-16','10:07:50','Clock IN',1,'316158492001','Present',NULL),(326,'3','','2021-03-15','12:31:01','Clock Out',2,'316157628002','Present',NULL),(327,'2','','2021-03-14','10:19:37','Clock IN',1,'216156764001','Present',NULL),(328,'3','','2021-03-14','09:31:52','Clock IN',1,'316156764001','Present',NULL),(329,'2','','2021-03-13','10:24:08','Clock IN',1,'216155900001','Present',NULL),(330,'1','','2021-03-11','10:30:54','Clock IN',1,'116154172001','Present',NULL),(331,'2','','2021-03-11','10:30:47','Clock IN',1,'216154172001','Present',NULL),(332,'6','','2021-03-11','10:17:02','Clock IN',1,'616154172001','Present',NULL),(333,'9','','2021-03-11','10:16:57','Clock IN',1,'916154172001','Present',NULL),(334,'3','','2021-03-11','09:51:06','Clock IN',1,'316154172001','Present',NULL),(335,'3','','2021-03-08','10:23:33','Clock IN',1,'316151580001','Present',NULL),(336,'9','','2021-03-07','10:16:06','Clock IN',1,'916150716001','Present',NULL),(337,'3','','2021-03-07','09:31:05','Clock IN',1,'316150716001','Present',NULL),(338,'3','','2021-03-06','10:35:15','Clock IN',1,'316149852001','Present',NULL),(339,'2','','2021-03-06','10:10:32','Clock IN',1,'216149852001','Present',NULL),(340,'2','','2021-03-04','10:57:31','Clock IN',1,'216148124001','Present',NULL),(341,'3','','2021-03-04','09:04:29','Clock IN',1,'316148124001','Present',NULL),(342,'3','','2021-03-03','13:41:10','Clock Out',2,'316147260002','Present',NULL),(343,'5','','2021-03-02','12:04:28','Clock Out',2,'516146396002','Present',NULL),(344,'2','','2021-03-02','09:58:16','Clock IN',1,'216146396001','Present',NULL),(345,'9','','2021-02-28','09:13:54','Clock IN',1,'916144668001','Present',NULL),(346,'3','','2021-02-28','09:10:34','Clock IN',1,'316144668001','Present',NULL),(347,'2','','2021-02-27','10:45:30','Clock IN',1,'216143804001','Present',NULL),(348,'3','','2021-02-27','07:41:26','Unknown',3,'316143804003','Present',NULL),(349,'5','','2021-02-25','10:47:52','Clock IN',1,'516142076001','Present',NULL),(350,'3','','2021-02-25','10:08:50','Clock IN',1,'316142076001','Present',NULL),(351,'2','','2021-02-24','10:32:42','Clock IN',1,'216141212001','Present',NULL),(352,'3','','2021-02-24','10:27:58','Clock IN',1,'316141212001','Present',NULL),(353,'8','','2021-02-24','10:27:42','Clock IN',1,'816141212001','Present',NULL),(354,'2','','2021-02-23','10:30:35','Clock IN',1,'216140348001','Present',NULL),(355,'8','','2021-02-22','10:13:07','Clock IN',1,'816139484001','Present',NULL),(356,'3','','2021-02-22','09:00:26','Clock IN',1,'316139484001','Present',NULL),(357,'9','','2021-02-20','10:32:04','Clock IN',1,'916137756001','Present',NULL),(358,'3','','2021-02-20','10:31:39','Clock IN',1,'316137756001','Present',NULL),(359,'5','','2021-02-20','10:31:30','Clock IN',1,'516137756001','Present',NULL),(360,'8','','2021-02-20','10:07:22','Clock IN',1,'816137756001','Present',NULL),(361,'1','','2021-02-20','10:02:21','Clock IN',1,'116137756001','Present',NULL),(362,'2','','2021-02-20','10:02:13','Clock IN',1,'216137756001','Present',NULL),(363,'9','','2021-02-18','12:46:50','Clock Out',2,'916136028002','Present',NULL),(364,'5','','2021-02-18','10:26:29','Clock IN',1,'516136028001','Present',NULL),(365,'3','','2021-02-18','09:58:56','Clock IN',1,'316136028001','Present',NULL),(366,'2','','2021-02-17','10:27:45','Clock IN',1,'216135164001','Present',NULL),(367,'1','','2021-02-17','10:27:36','Clock IN',1,'116135164001','Present',NULL),(379,'8','','2021-02-17','10:19:10','Clock IN',1,'816135164001','Present',NULL),(380,'9','','2021-02-17','10:17:16','Clock IN',1,'916135164001','Present',NULL),(381,'3','','2021-02-17','10:06:20','Clock IN',1,'316135164001','Present',NULL),(382,'6','','2021-02-15','14:01:33','Clock Out',2,'616133436002','Present',NULL),(383,'3','','2021-02-15','10:45:04','Clock IN',1,'316133436001','Present',NULL),(384,'8','','2021-02-15','10:44:51','Clock IN',1,'816133436001','Present',NULL),(385,'6','','2021-02-15','10:18:27','Clock IN',1,'616133436001','Present',NULL),(386,'4','','2021-02-13','10:44:48','Clock IN',1,'416131708001','Present',NULL),(387,'5','','2021-02-13','10:44:42','Clock IN',1,'516131708001','Present',NULL),(388,'1','','2021-02-13','10:27:42','Clock IN',1,'116131708001','Present',NULL),(389,'6','','2021-02-13','10:21:09','Clock IN',1,'616131708001','Present',NULL),(390,'7','','2021-02-13','10:04:03','Clock IN',1,'716131708001','Present',NULL),(391,'8','','2021-02-13','09:54:29','Clock IN',1,'816131708001','Present',NULL),(392,'3','','2021-02-13','09:02:21','Clock IN',1,'316131708001','Present',NULL),(393,'4','','2021-02-11','11:05:35','Clock IN',1,'416129980001','Present',NULL),(394,'9','','2021-02-11','10:42:57','Clock IN',1,'916129980001','Present',NULL),(395,'1','','2021-02-11','10:31:28','Clock IN',1,'116129980001','Present',NULL),(396,'2','','2021-02-11','10:22:00','Clock IN',1,'216129980001','Present',NULL),(397,'8','','2021-02-11','10:05:39','Clock IN',1,'816129980001','Present',NULL),(398,'5','','2021-02-11','09:20:06','Clock IN',1,'516129980001','Present',NULL),(399,'3','','2021-02-11','09:12:38','Clock IN',1,'316129980001','Present',NULL),(400,'8','','2021-02-10','09:58:29','Clock IN',1,'816129116001','Present',NULL),(401,'9','','2021-02-10','09:25:55','Clock IN',1,'916129116001','Present',NULL),(402,'3','','2021-02-10','09:14:52','Clock IN',1,'316129116001','Present',NULL),(403,'2','','2021-02-10','08:58:46','Clock IN',1,'216129116001','Present',NULL),(404,'9','','2021-02-09','12:08:22','Clock Out',2,'916128252002','Present',NULL),(405,'5','','2021-02-09','10:28:09','Clock IN',1,'516128252001','Present',NULL),(406,'6','','2021-02-09','10:18:47','Clock IN',1,'616128252001','Present',NULL),(407,'2','','2021-02-09','10:18:33','Clock IN',1,'216128252001','Present',NULL),(408,'7','','2021-02-09','10:08:48','Clock IN',1,'716128252001','Present',NULL),(409,'8','','2021-02-09','10:00:05','Clock IN',1,'816128252001','Present',NULL),(410,'3','','2021-02-09','09:36:35','Clock IN',1,'316128252001','Present',NULL),(411,'5','','2021-02-08','10:31:02','Clock IN',1,'516127388001','Present',NULL),(412,'7','','2021-02-08','10:14:58','Clock IN',1,'716127388001','Present',NULL),(413,'3','','2021-02-08','09:31:15','Clock IN',1,'316127388001','Present',NULL),(414,'8','','2021-02-07','13:32:50','Clock Out',2,'816126524002','Present',NULL),(415,'4','','2021-02-07','13:28:27','Clock Out',2,'416126524002','Present',NULL),(417,'6','','2021-02-07','13:28:03','Clock Out',2,'616126524002','Present',NULL),(418,'5','','2021-02-07','13:27:52','Clock Out',2,'516126524002','Present',NULL),(419,'2','','2021-02-07','13:26:42','Clock Out',2,'216126524002','Present',NULL),(420,'1','','2021-02-07','13:23:11','Clock Out',2,'116126524002','Present',NULL),(421,'7','','2021-02-07','12:35:27','Clock Out',2,'716126524002','Present',NULL),(422,'6','','2021-02-07','11:37:58','Clock IN',1,'616126524001','Present',NULL),(423,'8','','2021-02-07','11:36:30','Clock IN',1,'816126524001','Present',NULL),(424,'4','','2021-02-07','11:20:05','Clock IN',1,'416126524001','Present',NULL),(425,'5','','2021-02-07','11:09:01','Clock IN',1,'516126524001','Present',NULL),(426,'3','','2021-02-07','11:07:02','Clock IN',1,'316126524001','Present',NULL),(427,'2','','2021-02-07','10:12:08','Clock IN',1,'216126524001','Present',NULL),(428,'7','','2021-02-07','10:11:55','Clock IN',1,'716126524001','Present',NULL),(429,'7','','2021-02-06','11:23:37','Clock IN',1,'716125660001','Present',NULL),(430,'1','','2021-02-05','19:31:04','Unknown',3,'116124796003','Present',NULL),(431,'7','','2021-02-04','11:03:01','Clock IN',1,'716123932001','Present',NULL),(432,'2','','2021-02-04','10:05:33','Clock IN',1,'216123932001','Present',NULL),(433,'7','','2021-02-03','12:39:31','Clock Out',2,'716123068002','Present',NULL),(434,'2','','2021-02-03','09:51:06','Clock IN',1,'216123068001','Present',NULL),(435,'1','','2021-02-01','10:38:21','Clock IN',1,'116121340001','Present',NULL),(436,'2','','2021-02-01','10:37:10','Clock IN',1,'216121340001','Present',NULL),(437,'2','','2021-01-31','09:53:02','Clock IN',1,'216120476001','Present',NULL),(438,'2','','2021-01-30','15:14:39','Clock Out',2,'216119612002','Present',NULL),(439,'1','','2021-01-30','15:14:23','Clock Out',2,'116119612002','Present',NULL),(441,'2','','2021-01-26','12:26:31','Clock Out',2,'216116156002','Present',NULL),(442,'1','','2021-01-25','16:24:58','Clock Out',2,'116115292002','Present',NULL),(445,'2','','2021-01-25','16:24:34','Clock Out',2,'216115292002','Present',NULL),(448,'1','','2020-07-15','14:30:30','Clock Out',2,'115947640002','Present',NULL),(449,'330','7A30','2024-07-03','11:41:21','Clock IN',1,'33017199576001','Present',NULL),(450,'344','7A44','2024-07-03','11:41:19','Clock IN',1,'34417199576001','Present',NULL),(451,'213','6Mollika13','2024-07-03','11:40:06','Clock IN',1,'21317199576001','Present',NULL),(452,'229','6A29','2024-07-03','11:40:04','Clock IN',1,'22917199576001','Present',NULL),(453,'239','6A39','2024-07-03','11:40:03','Clock IN',1,'23917199576001','Present',NULL),(454,'221','6A21','2024-07-03','11:40:00','Clock IN',1,'22117199576001','Present',NULL),(455,'251','6A51','2024-07-03','11:39:59','Clock IN',1,'25117199576001','Present',NULL),(456,'203','6A3','2024-07-03','11:39:57','Clock IN',1,'20317199576001','Present',NULL),(457,'253','6A53','2024-07-03','11:39:55','Clock IN',1,'25317199576001','Present',NULL),(458,'254','6A54','2024-07-03','11:39:53','Clock IN',1,'25417199576001','Present',NULL),(459,'249','6A49','2024-07-03','11:39:51','Clock IN',1,'24917199576001','Present',NULL),(460,'216','6Mollika16','2024-07-03','11:39:49','Clock IN',1,'21617199576001','Present',NULL),(461,'219','6Mollika19','2024-07-03','11:39:47','Clock IN',1,'21917199576001','Present',NULL),(462,'231','6Mollika31','2024-07-03','11:39:44','Clock IN',1,'23117199576001','Present',NULL),(463,'226','6A26','2024-07-03','11:39:42','Clock IN',1,'22617199576001','Present',NULL),(464,'243','6A43','2024-07-03','11:39:40','Clock IN',1,'24317199576001','Present',NULL),(465,'245','6A45','2024-07-03','11:39:38','Clock IN',1,'24517199576001','Present',NULL),(466,'230','6A30','2024-07-03','11:39:34','Clock IN',1,'23017199576001','Present',NULL),(467,'212','6A12','2024-07-03','11:39:30','Clock IN',1,'21217199576001','Present',NULL),(468,'313','7A13','2024-07-03','11:33:22','Clock IN',1,'31317199576001','Present',NULL),(469,'302','7A2','2024-07-03','11:33:19','Clock IN',1,'30217199576001','Present',NULL),(470,'346','7A46','2024-07-03','11:33:15','Clock IN',1,'34617199576001','Present',NULL),(471,'328','7A28','2024-07-03','11:33:12','Clock IN',1,'32817199576001','Present',NULL),(472,'307','7A7','2024-07-03','11:33:10','Clock IN',1,'30717199576001','Present',NULL),(473,'329','7A29','2024-07-03','11:33:05','Clock IN',1,'32917199576001','Present',NULL),(474,'331','7A31','2024-07-03','11:33:03','Clock IN',1,'33117199576001','Present',NULL),(475,'319','7A19','2024-07-03','11:32:56','Clock IN',1,'31917199576001','Present',NULL),(476,'315','7A15','2024-07-03','11:32:52','Clock IN',1,'31517199576001','Present',NULL),(477,'347','7A47','2024-07-03','11:32:47','Clock IN',1,'34717199576001','Present',NULL),(478,'339','7A39','2024-07-03','11:32:41','Clock IN',1,'33917199576001','Present',NULL),(479,'327','6Mollika127','2024-07-03','11:32:38','Clock IN',1,'32717199576001','Present',NULL),(480,'341','7A41','2024-07-03','11:32:35','Clock IN',1,'34117199576001','Present',NULL),(481,'333','7A33','2024-07-03','11:32:32','Clock IN',1,'33317199576001','Present',NULL),(482,'14','7A33','2024-07-03','10:36:43','Clock IN',1,'1417199576001','Present',NULL),(483,'401','8A1','2024-07-03','09:55:21','Clock IN',1,'40117199576001','Present',NULL),(484,'306','7A6','2024-07-03','09:47:54','Clock IN',1,'30617199576001','Present',NULL),(485,'411','8A11','2024-07-03','09:47:40','Clock IN',1,'41117199576001','Present',NULL),(486,'427','8A27','2024-07-03','09:47:34','Clock IN',1,'42717199576001','Present',NULL),(487,'352','7A52','2024-07-03','09:46:43','Clock IN',1,'35217199576001','Present',NULL),(488,'423','8A23','2024-07-03','09:45:24','Clock IN',1,'42317199576001','Present',NULL),(489,'247','6A47','2024-07-03','09:44:09','Clock IN',1,'24717199576001','Present',NULL),(490,'223','6A23','2024-07-03','09:44:06','Clock IN',1,'22317199576001','Present',NULL),(491,'208','6A8','2024-07-03','09:41:07','Clock IN',1,'20817199576001','Present',NULL),(492,'13','6A8','2024-07-03','09:40:36','Clock IN',1,'1317199576001','Present',NULL),(493,'338','7A38','2024-07-03','09:40:21','Clock IN',1,'33817199576001','Present',NULL),(494,'322','7A22','2024-07-03','09:40:17','Clock IN',1,'32217199576001','Present',NULL),(495,'309','7A9','2024-07-03','09:40:01','Clock IN',1,'30917199576001','Present',NULL),(496,'317','7A17','2024-07-03','09:39:47','Clock IN',1,'31717199576001','Present',NULL),(497,'209','6A9','2024-07-03','09:38:56','Clock IN',1,'20917199576001','Present',NULL),(498,'218','6A18','2024-07-03','09:38:52','Clock IN',1,'21817199576001','Present',NULL),(499,'311','7A11','2024-07-03','09:38:34','Clock IN',1,'31117199576001','Present',NULL),(500,'334','7A34','2024-07-03','09:38:28','Clock IN',1,'33417199576001','Present',NULL),(501,'304','7A4','2024-07-03','09:38:20','Clock IN',1,'30417199576001','Present',NULL),(502,'312','7A12','2024-07-03','09:38:17','Clock IN',1,'31217199576001','Present',NULL),(503,'318','7A18','2024-07-03','09:38:14','Clock IN',1,'31817199576001','Present',NULL),(504,'326','7A26','2024-07-03','09:38:11','Clock IN',1,'32617199576001','Present',NULL),(506,'335','7A35','2024-07-03','09:38:06','Clock IN',1,'33517199576001','Present',NULL),(507,'10','7A35','2024-07-03','09:37:14','Clock IN',1,'1017199576001','Present',NULL),(508,'18','7A35','2024-07-03','09:36:37','Clock IN',1,'1817199576001','Present',NULL),(509,'301','7A1','2024-07-03','09:36:19','Clock IN',1,'30117199576001','Present',NULL),(510,'310','7A10','2024-07-03','09:36:16','Clock IN',1,'31017199576001','Present',NULL),(511,'406','8A6','2024-07-03','09:31:26','Clock IN',1,'40617199576001','Present',NULL),(512,'511','9A11','2024-07-03','09:30:41','Clock IN',1,'51117199576001','Present',NULL),(513,'12','9A11','2024-07-03','09:30:07','Clock IN',1,'1217199576001','Present',NULL),(514,'410','8A10','2024-07-03','09:29:21','Clock IN',1,'41017199576001','Present',NULL),(515,'225','6Mollika25','2024-07-03','09:29:12','Clock IN',1,'22517199576001','Present',NULL),(516,'436','8A36','2024-07-03','09:28:45','Clock IN',1,'43617199576001','Present',NULL),(517,'228','6Mollika28','2024-07-03','09:28:39','Clock IN',1,'22817199576001','Present',NULL),(518,'418','8A18','2024-07-03','09:28:32','Clock IN',1,'41817199576001','Present',NULL),(520,'408','8A8','2024-07-03','09:27:07','Clock IN',1,'40817199576001','Present',NULL),(521,'404','8A4','2024-07-03','09:26:52','Clock IN',1,'40417199576001','Present',NULL),(524,'15','8A4','2024-07-03','08:55:13','Clock IN',1,'1517199576001','Present',NULL),(525,'16','8A4','2024-07-03','08:54:41','Clock IN',1,'1617199576001','Present',NULL),(526,'11','8A4','2024-07-03','08:54:32','Clock IN',1,'1117199576001','Present',NULL),(527,'234','6Mollika34','2024-07-03','08:42:52','Clock IN',1,'23417199576001','Present',NULL),(528,'3','6Mollika34','2024-07-03','08:35:25','Clock IN',1,'317199576001','Present',NULL),(529,'9','6Mollika34','2024-07-03','08:32:37','Clock IN',1,'917199576001','Present',NULL),(530,'8','6Mollika34','2024-07-03','08:32:10','Clock IN',1,'817199576001','Present',NULL),(531,'2','6Mollika34','2024-07-03','08:31:19','Clock IN',1,'217199576001','Present',NULL),(532,'17','6Mollika34','2024-07-03','08:15:38','Clock IN',1,'1717199576001','Present',NULL),(533,'4','6Mollika34','2024-07-03','08:10:49','Clock IN',1,'417199576001','Present',NULL),(535,'6','6Mollika34','2024-07-02','23:22:48','Unknown',3,'617198712003','Present',NULL),(538,'7','6Mollika34','2024-07-02','23:22:28','Unknown',3,'717198712003','Present',NULL),(541,'17','6Mollika34','2024-07-02','17:31:32','Unknown',3,'1717198712003','Present',NULL),(542,'14','6Mollika34','2024-07-02','16:22:16','Clock Out',2,'1417198712002','Present',NULL),(543,'3','6Mollika34','2024-07-02','16:22:13','Clock Out',2,'317198712002','Present',NULL),(544,'9','6Mollika34','2024-07-02','16:21:46','Clock Out',2,'917198712002','Present',NULL),(545,'15','6Mollika34','2024-07-02','16:20:28','Clock Out',2,'1517198712002','Present',NULL),(546,'13','6Mollika34','2024-07-02','16:20:17','Clock Out',2,'1317198712002','Present',NULL),(547,'5','6Mollika34','2024-07-02','16:20:03','Clock Out',2,'517198712002','Present',NULL),(548,'12','6Mollika34','2024-07-02','16:19:48','Clock Out',2,'1217198712002','Present',NULL),(549,'8','6Mollika34','2024-07-02','16:19:39','Clock Out',2,'817198712002','Present',NULL),(550,'2','6Mollika34','2024-07-02','10:45:34','Clock IN',1,'217198712001','Present',NULL),(551,'505','9A5','2024-07-02','10:22:04','Clock IN',1,'50517198712001','Present',NULL),(552,'223','6A23','2024-07-02','10:19:46','Clock IN',1,'22317198712001','Present',NULL),(553,'204','6Mollika4','2024-07-02','10:19:22','Clock IN',1,'20417198712001','Present',NULL),(554,'207','6Mollika7','2024-07-02','10:17:48','Clock IN',1,'20717198712001','Present',NULL),(555,'206','6A6','2024-07-02','10:17:46','Clock IN',1,'20617198712001','Present',NULL),(556,'208','6A8','2024-07-02','10:17:44','Clock IN',1,'20817198712001','Present',NULL),(557,'14','6A8','2024-07-02','10:15:10','Clock IN',1,'1417198712001','Present',NULL),(558,'218','6A18','2024-07-02','10:14:18','Clock IN',1,'21817198712001','Present',NULL),(559,'234','6Mollika34','2024-07-02','10:13:32','Clock IN',1,'23417198712001','Present',NULL),(560,'210','6Mollika10','2024-07-02','10:11:42','Clock IN',1,'21017198712001','Present',NULL),(561,'252','6A52','2024-07-02','10:11:38','Clock IN',1,'25217198712001','Present',NULL),(562,'238','6A38','2024-07-02','10:11:36','Clock IN',1,'23817198712001','Present',NULL),(563,'237','6Mollika37','2024-07-02','10:11:33','Clock IN',1,'23717198712001','Present',NULL),(564,'247','6A47','2024-07-02','10:11:28','Clock IN',1,'24717198712001','Present',NULL),(566,'18','6A47','2024-07-02','10:11:17','Clock IN',1,'1817198712001','Present',NULL),(567,'209','6A9','2024-07-02','10:11:07','Clock IN',1,'20917198712001','Present',NULL),(568,'211','6A11','2024-07-02','10:11:00','Clock IN',1,'21117198712001','Present',NULL),(569,'202','6A2','2024-07-02','10:10:53','Clock IN',1,'20217198712001','Present',NULL),(571,'215','6A15','2024-07-02','10:09:38','Clock IN',1,'21517198712001','Present',NULL),(572,'214','6A14','2024-07-02','10:09:32','Clock IN',1,'21417198712001','Present',NULL),(578,'242','6A42','2024-07-02','10:06:28','Clock IN',1,'24217198712001','Present',NULL),(580,'241','6A41','2024-07-02','10:06:13','Clock IN',1,'24117198712001','Present',NULL),(581,'225','6Mollika25','2024-07-02','10:05:54','Clock IN',1,'22517198712001','Present',NULL),(585,'201','6Mollika1','2024-07-02','10:05:00','Clock IN',1,'20117198712001','Present',NULL),(587,'401','8A1','2024-07-02','10:04:46','Clock IN',1,'40117198712001','Present',NULL),(589,'228','6Mollika28','2024-07-02','10:01:15','Clock IN',1,'22817198712001','Present',NULL),(590,'322','7A22','2024-07-02','09:58:46','Clock IN',1,'32217198712001','Present',NULL),(591,'338','7A38','2024-07-02','09:57:49','Clock IN',1,'33817198712001','Present',NULL),(592,'308','7A8','2024-07-02','09:56:17','Clock IN',1,'30817198712001','Present',NULL),(593,'10','7A8','2024-07-02','09:55:23','Clock IN',1,'1017198712001','Present',NULL),(594,'404','8A4','2024-07-02','09:55:07','Clock IN',1,'40417198712001','Present',NULL),(595,'403','8A3','2024-07-02','09:54:33','Clock IN',1,'40317198712001','Present',NULL),(596,'340','7A40','2024-07-02','09:54:25','Clock IN',1,'34017198712001','Present',NULL),(598,'332','7A32','2024-07-02','09:53:29','Clock IN',1,'33217198712001','Present',NULL),(599,'318','7A18','2024-07-02','09:53:26','Clock IN',1,'31817198712001','Present',NULL),(600,'312','7A12','2024-07-02','09:53:21','Clock IN',1,'31217198712001','Present',NULL),(601,'301','7A1','2024-07-02','09:53:19','Clock IN',1,'30117198712001','Present',NULL),(602,'317','7A17','2024-07-02','09:53:09','Clock IN',1,'31717198712001','Present',NULL),(603,'309','7A9','2024-07-02','09:52:46','Clock IN',1,'30917198712001','Present',NULL),(604,'326','7A26','2024-07-02','09:52:44','Clock IN',1,'32617198712001','Present',NULL),(605,'306','7A6','2024-07-02','09:52:35','Clock IN',1,'30617198712001','Present',NULL),(606,'310','7A10','2024-07-02','09:52:32','Clock IN',1,'31017198712001','Present',NULL),(607,'321','7A21','2024-07-02','09:52:30','Clock IN',1,'32117198712001','Present',NULL),(608,'427','8A27','2024-07-02','09:51:46','Clock IN',1,'42717198712001','Present',NULL),(609,'418','8A18','2024-07-02','09:51:25','Clock IN',1,'41817198712001','Present',NULL),(610,'425','8A25','2024-07-02','09:51:23','Clock IN',1,'42517198712001','Present',NULL),(612,'436','8A36','2024-07-02','09:51:17','Clock IN',1,'43617198712001','Present',NULL),(614,'434','8A34','2024-07-02','09:51:01','Clock IN',1,'43417198712001','Present',NULL),(615,'423','8A23','2024-07-02','09:50:53','Clock IN',1,'42317198712001','Present',NULL),(616,'408','8A8','2024-07-02','09:50:50','Clock IN',1,'40817198712001','Present',NULL),(617,'411','8A11','2024-07-02','09:50:49','Clock IN',1,'41117198712001','Present',NULL),(618,'406','8A6','2024-07-02','09:50:47','Clock IN',1,'40617198712001','Present',NULL),(619,'511','9A11','2024-07-02','09:50:38','Clock IN',1,'51117198712001','Present',NULL),(620,'8','9A11','2024-07-02','09:43:27','Clock IN',1,'817198712001','Present',NULL),(621,'15','9A11','2024-07-02','09:42:14','Clock IN',1,'1517198712001','Present',NULL),(622,'12','9A11','2024-07-02','09:32:04','Clock IN',1,'1217198712001','Present',NULL),(623,'16','9A11','2024-07-02','09:27:09','Clock IN',1,'1617198712001','Present',NULL),(624,'3','9A11','2024-07-02','09:25:15','Clock IN',1,'317198712001','Present',NULL),(625,'13','9A11','2024-07-02','09:23:10','Clock IN',1,'1317198712001','Present',NULL),(626,'9','9A11','2024-07-02','09:22:53','Clock IN',1,'917198712001','Present',NULL),(627,'6','9A11','2024-07-02','09:17:14','Clock IN',1,'617198712001','Present',NULL),(628,'17','9A11','2024-07-02','08:46:39','Clock IN',1,'1717198712001','Present',NULL),(629,'11','9A11','2024-07-02','08:45:38','Clock IN',1,'1117198712001','Present',NULL),(630,'4','9A11','2024-07-02','08:45:23','Clock IN',1,'417198712001','Present',NULL),(632,'3','9A11','2024-07-01','16:51:08','Clock Out',2,'317197848002','Present',NULL),(633,'12','9A11','2024-07-01','16:50:52','Clock Out',2,'1217197848002','Present',NULL),(634,'13','9A11','2024-07-01','16:43:00','Clock Out',2,'1317197848002','Present',NULL),(635,'6','9A11','2024-07-01','16:42:21','Clock Out',2,'617197848002','Present',NULL),(636,'10','9A11','2024-07-01','16:40:50','Clock Out',2,'1017197848002','Present',NULL),(637,'4','9A11','2024-07-01','16:40:26','Clock Out',2,'417197848002','Present',NULL),(638,'8','9A11','2024-07-01','16:40:21','Clock Out',2,'817197848002','Present',NULL),(639,'5','9A11','2024-07-01','16:39:59','Clock Out',2,'517197848002','Present',NULL),(640,'2','9A11','2024-07-01','16:39:44','Clock Out',2,'217197848002','Present',NULL),(641,'18','9A11','2024-07-01','16:39:27','Clock Out',2,'1817197848002','Present',NULL),(642,'9','9A11','2024-07-01','16:39:22','Clock Out',2,'917197848002','Present',NULL),(643,'16','9A11','2024-07-01','16:39:19','Clock Out',2,'1617197848002','Present',NULL),(644,'15','9A11','2024-07-01','16:38:32','Clock Out',2,'1517197848002','Present',NULL),(645,'17','9A11','2024-07-01','16:37:35','Clock Out',2,'1717197848002','Present',NULL),(646,'11','9A11','2024-07-01','16:37:23','Clock Out',2,'1117197848002','Present',NULL),(647,'252','6A52','2024-07-01','12:13:35','Clock Out',2,'25217197848002','Present',NULL),(648,'228','6Mollika28','2024-07-01','12:13:07','Clock Out',2,'22817197848002','Present',NULL),(649,'225','6Mollika25','2024-07-01','12:13:04','Clock Out',2,'22517197848002','Present',NULL),(650,'217','6A17','2024-07-01','12:12:55','Clock Out',2,'21717197848002','Present',NULL),(651,'240','6Mollika40','2024-07-01','12:12:52','Clock Out',2,'24017197848002','Present',NULL),(652,'220','6A20','2024-07-01','12:12:49','Clock Out',2,'22017197848002','Present',NULL),(653,'241','6A41','2024-07-01','12:12:44','Clock Out',2,'24117197848002','Present',NULL),(654,'233','6A33','2024-07-01','12:12:41','Clock Out',2,'23317197848002','Present',NULL),(655,'223','6A23','2024-07-01','12:12:14','Clock Out',2,'22317197848002','Present',NULL),(657,'202','6A2','2024-07-01','12:11:33','Clock Out',2,'20217197848002','Present',NULL),(658,'201','6Mollika1','2024-07-01','12:11:29','Clock Out',2,'20117197848002','Present',NULL),(659,'210','6Mollika10','2024-07-01','12:11:24','Clock Out',2,'21017197848002','Present',NULL),(660,'214','6A14','2024-07-01','12:10:07','Clock Out',2,'21417197848002','Present',NULL),(661,'211','6A11','2024-07-01','12:10:03','Clock Out',2,'21117197848002','Present',NULL),(662,'204','6Mollika4','2024-07-01','12:09:56','Clock Out',2,'20417197848002','Present',NULL),(663,'238','6A38','2024-07-01','12:09:54','Clock Out',2,'23817197848002','Present',NULL),(664,'237','6Mollika37','2024-07-01','12:09:44','Clock Out',2,'23717197848002','Present',NULL),(665,'206','6A6','2024-07-01','12:09:41','Clock Out',2,'20617197848002','Present',NULL),(666,'247','6A47','2024-07-01','12:07:48','Clock Out',2,'24717197848002','Present',NULL),(667,'208','6A8','2024-07-01','12:07:37','Clock Out',2,'20817197848002','Present',NULL),(669,'218','6A18','2024-07-01','12:07:32','Clock Out',2,'21817197848002','Present',NULL),(670,'209','6A9','2024-07-01','12:07:30','Clock Out',2,'20917197848002','Present',NULL),(671,'207','6Mollika7','2024-07-01','12:07:25','Clock Out',2,'20717197848002','Present',NULL),(674,'411','8A11','2024-07-01','11:42:54','Clock IN',1,'41117197848001','Present',NULL),(675,'434','8A34','2024-07-01','11:42:53','Clock IN',1,'43417197848001','Present',NULL),(676,'425','8A25','2024-07-01','11:42:48','Clock IN',1,'42517197848001','Present',NULL),(677,'410','8A10','2024-07-01','11:42:46','Clock IN',1,'41017197848001','Present',NULL),(678,'403','8A3','2024-07-01','11:42:42','Clock IN',1,'40317197848001','Present',NULL),(679,'408','8A8','2024-07-01','11:42:35','Clock IN',1,'40817197848001','Present',NULL),(680,'401','8A1','2024-07-01','11:42:31','Clock IN',1,'40117197848001','Present',NULL),(681,'418','8A18','2024-07-01','11:42:19','Clock IN',1,'41817197848001','Present',NULL),(682,'423','8A23','2024-07-01','11:42:10','Clock IN',1,'42317197848001','Present',NULL),(683,'427','8A27','2024-07-01','11:42:07','Clock IN',1,'42717197848001','Present',NULL),(684,'406','8A6','2024-07-01','11:41:55','Clock IN',1,'40617197848001','Present',NULL),(685,'502','9A2','2024-07-01','11:38:52','Clock IN',1,'50217197848001','Present',NULL),(686,'509','9A9','2024-07-01','11:38:50','Clock IN',1,'50917197848001','Present',NULL),(687,'511','9A11','2024-07-01','11:38:06','Clock IN',1,'51117197848001','Present',NULL),(689,'505','9A5','2024-07-01','11:37:28','Clock IN',1,'50517197848001','Present',NULL),(690,'548','9A48','2024-07-01','11:36:39','Clock IN',1,'54817197848001','Present',NULL),(691,'538','9A38','2024-07-01','11:36:28','Clock IN',1,'53817197848001','Present',NULL),(692,'513','9A13','2024-07-01','11:36:06','Clock IN',1,'51317197848001','Present',NULL),(693,'517','9A17','2024-07-01','11:36:04','Clock IN',1,'51717197848001','Present',NULL),(694,'516','9A16','2024-07-01','11:36:02','Clock IN',1,'51617197848001','Present',NULL),(695,'334','7A34','2024-07-01','11:33:19','Clock IN',1,'33417197848001','Present',NULL),(696,'311','7A11','2024-07-01','11:33:11','Clock IN',1,'31117197848001','Present',NULL),(697,'335','7A35','2024-07-01','11:33:06','Clock IN',1,'33517197848001','Present',NULL),(698,'304','7A4','2024-07-01','11:33:03','Clock IN',1,'30417197848001','Present',NULL),(699,'312','7A12','2024-07-01','11:32:50','Clock IN',1,'31217197848001','Present',NULL),(700,'318','7A18','2024-07-01','11:32:47','Clock IN',1,'31817197848001','Present',NULL),(701,'326','7A26','2024-07-01','11:32:45','Clock IN',1,'32617197848001','Present',NULL),(702,'332','7A32','2024-07-01','11:32:43','Clock IN',1,'33217197848001','Present',NULL),(703,'352','7A52','2024-07-01','11:32:21','Clock IN',1,'35217197848001','Present',NULL),(704,'345','7A45','2024-07-01','11:32:15','Clock IN',1,'34517197848001','Present',NULL),(705,'317','7A17','2024-07-01','11:32:10','Clock IN',1,'31717197848001','Present',NULL),(706,'321','7A21','2024-07-01','11:32:03','Clock IN',1,'32117197848001','Present',NULL),(707,'309','7A9','2024-07-01','11:32:01','Clock IN',1,'30917197848001','Present',NULL),(708,'306','7A6','2024-07-01','11:31:56','Clock IN',1,'30617197848001','Present',NULL),(709,'301','7A1','2024-07-01','11:31:49','Clock IN',1,'30117197848001','Present',NULL),(710,'322','7A22','2024-07-01','11:31:43','Clock IN',1,'32217197848001','Present',NULL),(711,'338','7A38','2024-07-01','11:31:40','Clock IN',1,'33817197848001','Present',NULL),(712,'308','7A8','2024-07-01','11:31:37','Clock IN',1,'30817197848001','Present',NULL),(713,'310','7A10','2024-07-01','11:30:12','Clock IN',1,'31017197848001','Present',NULL),(714,'2','7A10','2024-07-01','11:27:15','Clock IN',1,'217197848001','Present',NULL),(716,'336','7A36','2024-07-01','11:11:53','Clock IN',1,'33617197848001','Present',NULL),(717,'1','7A36','2024-07-01','10:28:56','Clock IN',1,'117197848001','Present',NULL),(719,'5','7A36','2024-07-01','10:11:38','Clock IN',1,'517197848001','Present',NULL),(720,'18','7A36','2024-07-01','09:56:19','Clock IN',1,'1817197848001','Present',NULL),(721,'10','7A36','2024-07-01','09:52:21','Clock IN',1,'1017197848001','Present',NULL),(722,'12','7A36','2024-07-01','09:46:01','Clock IN',1,'1217197848001','Present',NULL),(723,'16','7A36','2024-07-01','09:39:50','Clock IN',1,'1617197848001','Present',NULL),(724,'13','7A36','2024-07-01','09:30:25','Clock IN',1,'1317197848001','Present',NULL),(725,'15','7A36','2024-07-01','09:26:14','Clock IN',1,'1517197848001','Present',NULL),(727,'3','7A36','2024-07-01','09:21:08','Clock IN',1,'317197848001','Present',NULL),(728,'11','7A36','2024-07-01','09:14:31','Clock IN',1,'1117197848001','Present',NULL),(729,'6','7A36','2024-07-01','09:14:22','Clock IN',1,'617197848001','Present',NULL),(730,'8','7A36','2024-07-01','08:49:48','Clock IN',1,'817197848001','Present',NULL),(731,'17','7A36','2024-07-01','08:49:26','Clock IN',1,'1717197848001','Present',NULL),(732,'9','7A36','2024-07-01','08:49:07','Clock IN',1,'917197848001','Present',NULL),(733,'4','7A36','2024-07-01','08:48:56','Clock IN',1,'417197848001','Present',NULL),(734,'2','7A36','2024-06-30','13:31:31','Clock Out',2,'217196984002','Present',NULL),(735,'3','7A36','2024-06-30','12:31:26','Clock Out',2,'317196984002','Present',NULL),(736,'2','7A36','2024-06-30','10:25:03','Clock IN',1,'217196984001','Present',NULL),(737,'15','7A36','2024-06-30','10:07:07','Clock IN',1,'1517196984001','Present',NULL),(739,'18','7A36','2024-06-30','10:04:32','Clock IN',1,'1817196984001','Present',NULL),(740,'10','7A36','2024-06-30','09:57:43','Clock IN',1,'1017196984001','Present',NULL),(741,'3','7A36','2024-06-30','09:56:45','Clock IN',1,'317196984001','Present',NULL),(743,'16','7A36','2024-06-30','09:42:30','Clock IN',1,'1617196984001','Present',NULL),(745,'13','7A36','2024-06-30','09:21:55','Clock IN',1,'1317196984001','Present',NULL),(747,'8','7A36','2024-06-30','09:18:30','Clock IN',1,'817196984001','Present',NULL),(748,'12','7A36','2024-06-30','09:18:11','Clock IN',1,'1217196984001','Present',NULL),(749,'6','7A36','2024-06-30','09:12:30','Clock IN',1,'617196984001','Present',NULL),(750,'9','7A36','2024-06-30','09:11:18','Clock IN',1,'917196984001','Present',NULL),(751,'4','7A36','2024-06-30','09:10:59','Clock IN',1,'417196984001','Present',NULL),(752,'11','7A36','2024-06-30','09:10:52','Clock IN',1,'1117196984001','Present',NULL),(753,'17','7A36','2024-06-30','09:10:23','Clock IN',1,'1717196984001','Present',NULL),(754,'5','7A36','2024-06-30','09:10:08','Clock IN',1,'517196984001','Present',NULL),(758,'11','7A36','2024-06-27','16:06:15','Clock Out',2,'1117194392002','Present',NULL),(759,'17','7A36','2024-06-27','16:04:34','Clock Out',2,'1717194392002','Present',NULL),(760,'8','7A36','2024-06-27','16:04:08','Clock Out',2,'817194392002','Present',NULL),(761,'16','7A36','2024-06-27','16:04:02','Clock Out',2,'1617194392002','Present',NULL),(762,'13','7A36','2024-06-27','16:03:42','Clock Out',2,'1317194392002','Present',NULL),(763,'4','7A36','2024-06-27','16:03:36','Clock Out',2,'417194392002','Present',NULL),(764,'9','7A36','2024-06-27','16:03:30','Clock Out',2,'917194392002','Present',NULL),(765,'15','7A36','2024-06-27','16:03:22','Clock Out',2,'1517194392002','Present',NULL),(766,'6','7A36','2024-06-27','15:42:24','Clock Out',2,'617194392002','Present',NULL),(767,'3','7A36','2024-06-27','15:35:42','Clock Out',2,'317194392002','Present',NULL),(768,'5','7A36','2024-06-27','15:35:22','Clock Out',2,'517194392002','Present',NULL),(769,'2','7A36','2024-06-27','11:23:06','Clock IN',1,'217194392001','Present',NULL),(770,'15','7A36','2024-06-27','09:42:29','Clock IN',1,'1517194392001','Present',NULL),(771,'16','7A36','2024-06-27','09:41:58','Clock IN',1,'1617194392001','Present',NULL),(772,'3','7A36','2024-06-27','09:20:38','Clock IN',1,'317194392001','Present',NULL),(773,'13','7A36','2024-06-27','09:16:12','Clock IN',1,'1317194392001','Present',NULL),(774,'5','7A36','2024-06-27','09:15:51','Clock IN',1,'517194392001','Present',NULL),(776,'8','7A36','2024-06-27','09:12:01','Clock IN',1,'817194392001','Present',NULL),(777,'6','7A36','2024-06-27','09:01:44','Clock IN',1,'617194392001','Present',NULL),(778,'17','7A36','2024-06-27','08:58:28','Clock IN',1,'1717194392001','Present',NULL),(779,'9','7A36','2024-06-27','08:58:16','Clock IN',1,'917194392001','Present',NULL),(780,'4','7A36','2024-06-27','08:58:11','Clock IN',1,'417194392001','Present',NULL),(782,'3','7A36','2024-06-26','16:26:11','Clock Out',2,'317193528002','Present',NULL),(784,'9','7A36','2024-06-26','16:06:54','Clock Out',2,'917193528002','Present',NULL),(785,'13','7A36','2024-06-26','16:06:46','Clock Out',2,'1317193528002','Present',NULL),(786,'15','7A36','2024-06-26','16:06:37','Clock Out',2,'1517193528002','Present',NULL),(787,'17','7A36','2024-06-26','15:58:36','Clock Out',2,'1717193528002','Present',NULL),(789,'8','7A36','2024-06-26','15:58:27','Clock Out',2,'817193528002','Present',NULL),(790,'5','7A36','2024-06-26','15:58:22','Clock Out',2,'517193528002','Present',NULL),(793,'11','7A36','2024-06-26','15:58:07','Clock Out',2,'1117193528002','Present',NULL),(795,'421','8A21','2024-07-03','12:07:58','Clock Out',2,'42117199576002','Present',NULL),(796,'503','9A3','2024-07-03','12:07:50','Clock Out',2,'50317199576002','Present',NULL),(797,'547','9A47','2024-07-03','12:07:48','Clock Out',2,'54717199576002','Present',NULL),(798,'507','9A7','2024-07-03','12:07:47','Clock Out',2,'50717199576002','Present',NULL),(799,'519','9A19','2024-07-03','12:07:44','Clock Out',2,'51917199576002','Present',NULL),(800,'506','9A6','2024-07-03','12:07:39','Clock Out',2,'50617199576002','Present',NULL),(801,'508','9A8','2024-07-03','12:07:37','Clock Out',2,'50817199576002','Present',NULL),(802,'541','9A41','2024-07-03','12:07:34','Clock Out',2,'54117199576002','Present',NULL),(803,'536','9A36','2024-07-03','12:07:31','Clock Out',2,'53617199576002','Present',NULL),(804,'530','9A30','2024-07-03','12:07:29','Clock Out',2,'53017199576002','Present',NULL),(805,'518','9A18','2024-07-03','12:07:27','Clock Out',2,'51817199576002','Present',NULL),(806,'532','9A32','2024-07-03','12:07:24','Clock Out',2,'53217199576002','Present',NULL),(807,'526','9A26','2024-07-03','12:07:22','Clock Out',2,'52617199576002','Present',NULL),(808,'510','9A10','2024-07-03','12:07:19','Clock Out',2,'51017199576002','Present',NULL),(809,'555','9A55','2024-07-03','12:07:17','Clock Out',2,'55517199576002','Present',NULL),(810,'515','9A15','2024-07-03','12:07:14','Clock Out',2,'51517199576002','Present',NULL),(811,'535','9A35','2024-07-03','12:07:11','Clock Out',2,'53517199576002','Present',NULL),(812,'540','9A40','2024-07-03','12:07:06','Clock Out',2,'54017199576002','Present',NULL),(813,'527','9A27','2024-07-03','12:07:02','Clock Out',2,'52717199576002','Present',NULL),(814,'523','9A23','2024-07-03','12:06:59','Clock Out',2,'52317199576002','Present',NULL),(815,'512','9A12','2024-07-03','12:06:58','Clock Out',2,'51217199576002','Present',NULL),(816,'522','9A22','2024-07-03','12:06:52','Clock Out',2,'52217199576002','Present',NULL),(817,'557','9A57','2024-07-03','12:06:49','Clock Out',2,'55717199576002','Present',NULL),(818,'524','9A24','2024-07-03','12:06:47','Clock Out',2,'52417199576002','Present',NULL),(819,'504','9A4','2024-07-03','12:06:44','Clock Out',2,'50417199576002','Present',NULL),(820,'558','9A58','2024-07-03','12:06:42','Clock Out',2,'55817199576002','Present',NULL),(821,'525','9A25','2024-07-03','12:06:39','Clock Out',2,'52517199576002','Present',NULL),(822,'539','9A39','2024-07-03','12:06:35','Clock Out',2,'53917199576002','Present',NULL),(823,'237','6Mollika37','2024-07-03','12:04:18','Clock Out',2,'23717199576002','Present',NULL),(824,'220','6A20','2024-07-03','12:03:52','Clock Out',2,'22017199576002','Present',NULL),(825,'242','6A42','2024-07-03','12:03:49','Clock Out',2,'24217199576002','Present',NULL),(826,'233','6A33','2024-07-03','12:03:45','Clock Out',2,'23317199576002','Present',NULL),(827,'243','6A43','2024-07-03','12:03:42','Clock Out',2,'24317199576002','Present',NULL),(828,'240','6Mollika40','2024-07-03','12:03:37','Clock Out',2,'24017199576002','Present',NULL),(829,'234','6Mollika34','2024-07-03','12:03:34','Clock Out',2,'23417199576002','Present',NULL),(830,'238','6A38','2024-07-03','12:03:23','Clock Out',2,'23817199576002','Present',NULL),(831,'251','6A51','2024-07-03','12:03:19','Clock Out',2,'25117199576002','Present',NULL),(832,'252','6A52','2024-07-03','12:03:15','Clock Out',2,'25217199576002','Present',NULL),(833,'202','6A2','2024-07-03','12:02:58','Clock Out',2,'20217199576002','Present',NULL),(834,'210','6Mollika10','2024-07-03','12:02:54','Clock Out',2,'21017199576002','Present',NULL),(835,'201','6Mollika1','2024-07-03','12:02:50','Clock Out',2,'20117199576002','Present',NULL),(836,'206','6A6','2024-07-03','12:02:41','Clock Out',2,'20617199576002','Present',NULL),(837,'207','6Mollika7','2024-07-03','12:02:38','Clock Out',2,'20717199576002','Present',NULL),(838,'204','6Mollika4','2024-07-03','12:02:35','Clock Out',2,'20417199576002','Present',NULL),(839,'241','6A41','2024-07-03','12:02:31','Clock Out',2,'24117199576002','Present',NULL),(840,'211','6A11','2024-07-03','12:02:27','Clock Out',2,'21117199576002','Present',NULL),(841,'214','6A14','2024-07-03','12:02:22','Clock Out',2,'21417199576002','Present',NULL),(842,'0','6A1','2024-07-04','2024-07-04 15:16:33','',0,'6A120240704','Present',NULL),(843,'0','6A2','2024-07-04','2024-07-04 15:16:33','',0,'6A220240704','Present',NULL),(844,'0','6A3','2024-07-04','2024-07-04 15:16:33','',0,'6A320240704','Present',NULL),(845,'0','6A4','2024-07-04','2024-07-04 15:16:33','',0,'6A420240704','Present',NULL),(846,'0','6A5','2024-07-04','2024-07-04 15:16:33','',0,'6A520240704','Present',NULL),(847,'0','6A6','2024-07-04','2024-07-04 15:16:33','',0,'6A620240704','Present',NULL),(848,'0','6A7','2024-07-04','2024-07-04 15:16:33','',0,'6A720240704','Present',NULL),(849,'0','6A8','2024-07-04','2024-07-04 15:16:33','',0,'6A820240704','Present',NULL),(850,'0','6A9','2024-07-04','2024-07-04 15:16:33','',0,'6A920240704','Present',NULL),(851,'0','6A10','2024-07-04','2024-07-04 15:16:33','',0,'6A1020240704','Present',NULL),(852,'0','6A11','2024-07-04','2024-07-04 15:16:33','',0,'6A1120240704','Present',NULL),(853,'0','6A12','2024-07-04','2024-07-04 15:16:33','',0,'6A1220240704','Present',NULL),(854,'0','6A13','2024-07-04','2024-07-04 15:16:33','',0,'6A1320240704','Present',NULL),(855,'0','6A14','2024-07-04','2024-07-04 15:16:33','',0,'6A1420240704','Present',NULL),(856,'0','6A15','2024-07-04','2024-07-04 15:16:33','',0,'6A1520240704','Present',NULL),(857,'0','6A16','2024-07-04','2024-07-04 15:16:33','',0,'6A1620240704','Present',NULL),(858,'0','6A17','2024-07-04','2024-07-04 15:16:33','',0,'6A1720240704','Present',NULL),(859,'0','6A18','2024-07-04','2024-07-04 15:16:33','',0,'6A1820240704','Present',NULL),(860,'0','6A19','2024-07-04','2024-07-04 15:16:33','',0,'6A1920240704','Present',NULL),(861,'0','6A20','2024-07-04','2024-07-04 15:16:33','',0,'6A2020240704','Present',NULL),(862,'0','6A21','2024-07-04','2024-07-04 15:16:33','',0,'6A2120240704','Present',NULL),(863,'0','6A22','2024-07-04','2024-07-04 15:16:33','',0,'6A2220240704','Present',NULL),(864,'0','6A23','2024-07-04','2024-07-04 15:16:33','',0,'6A2320240704','Present',NULL),(865,'0','6A24','2024-07-04','2024-07-04 15:16:33','',0,'6A2420240704','Absent',NULL),(866,'0','6A25','2024-07-04','2024-07-04 15:16:33','',0,'6A2520240704','Present',NULL),(867,'0','6A26','2024-07-04','2024-07-04 15:16:33','',0,'6A2620240704','Present',NULL),(868,'0','6A27','2024-07-04','2024-07-04 15:16:33','',0,'6A2720240704','Present',NULL),(869,'0','6A28','2024-07-04','2024-07-04 15:16:33','',0,'6A2820240704','Present',NULL),(870,'0','6A29','2024-07-04','2024-07-04 15:16:33','',0,'6A2920240704','Present',NULL),(871,'0','6A30','2024-07-04','2024-07-04 15:16:33','',0,'6A3020240704','Present',NULL),(872,'0','6A31','2024-07-04','2024-07-04 15:16:33','',0,'6A3120240704','Present',NULL),(873,'0','6A33','2024-07-04','2024-07-04 15:16:33','',0,'6A3320240704','Present',NULL),(874,'0','6A34','2024-07-04','2024-07-04 15:16:33','',0,'6A3420240704','Present',NULL),(875,'0','6A37','2024-07-04','2024-07-04 15:16:33','',0,'6A3720240704','Present',NULL),(876,'0','6A38','2024-07-04','2024-07-04 15:16:33','',0,'6A3820240704','Present',NULL),(877,'0','6A39','2024-07-04','2024-07-04 15:16:33','',0,'6A3920240704','Absent',NULL),(878,'0','6A40','2024-07-04','2024-07-04 15:16:33','',0,'6A4020240704','Present',NULL),(879,'0','6A41','2024-07-04','2024-07-04 15:16:33','',0,'6A4120240704','Present',NULL),(880,'0','6A42','2024-07-04','2024-07-04 15:16:33','',0,'6A4220240704','Present',NULL),(881,'0','6A43','2024-07-04','2024-07-04 15:16:33','',0,'6A4320240704','Present',NULL),(882,'0','6A44','2024-07-04','2024-07-04 15:16:33','',0,'6A4420240704','Present',NULL),(883,'0','6A45','2024-07-04','2024-07-04 15:16:33','',0,'6A4520240704','Present',NULL),(884,'0','6A47','2024-07-04','2024-07-04 15:16:33','',0,'6A4720240704','Present',NULL),(885,'0','6A48','2024-07-04','2024-07-04 15:16:33','',0,'6A4820240704','Present',NULL),(886,'0','6A49','2024-07-04','2024-07-04 15:16:33','',0,'6A4920240704','Present',NULL),(887,'0','6A50','2024-07-04','2024-07-04 15:16:33','',0,'6A5020240704','Absent',NULL),(888,'0','6A51','2024-07-04','2024-07-04 15:16:33','',0,'6A5120240704','Present',NULL),(889,'0','6A52','2024-07-04','2024-07-04 15:16:33','',0,'6A5220240704','Present',NULL),(890,'0','6A53','2024-07-04','2024-07-04 15:16:33','',0,'6A5320240704','Present',NULL),(891,'0','6A54','2024-07-04','2024-07-04 15:16:33','',0,'6A5420240704','Present',NULL);
/*!40000 ALTER TABLE `stuattdancedata` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stuattdancedata` with 798 row(s)
--

--
-- Table structure for table `student`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(255) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `roll` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `nameb` varchar(255) NOT NULL,
  `fnameb` varchar(255) NOT NULL,
  `mnameb` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `birthid` varchar(255) NOT NULL,
  `fnid` varchar(255) NOT NULL,
  `mnid` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `imgname` varchar(255) DEFAULT NULL,
  `brisqr` varchar(3000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=3587 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `student` VALUES (3322,9,'Class Nine','A',4,'RUDRA BALA','MANAZ BALA','KANIKA BALA','N/A','N/A','N/A','Male','2010-12-30','0','0','0','Satpar','8801990623570','9A4','34582.jpg',NULL),(3323,9,'Class Nine','A',50,'SHAYAN BISWAS','SUKEN BISWAS','SARASWATI BISWAS','N/A','N/A','N/A','Male','2009-12-31','0','0','0','Satpar','8801','9A50','34644.jpg',NULL),(3324,9,'Class Nine','A',15,'SHUVRO MANDAL','SUJIT MANDAL','NISKRITI MONDAL','N/A','N/A','N/A','Male','2010-12-30','0','0','0','Satpar','8801728764742','9A15','34646.jpg',NULL),(3325,9,'Class Nine','A',12,'BHARSHA BHAKTA','BIDHAN BHAKTHA','BINA BHAKTHA','N/A','N/A','N/A','Female','2008-08-21','0','0','0','Satpar','8801712956852','9A12','34647.jpg',NULL),(3326,9,'Class Nine','A',51,'SHAMA BALA','BABURAM BALA','JUTHIKA BALA','N/A','N/A','N/A','Female','2009-11-20','0','0','0','Satpar','8801780206300','9A51','34650.jpg',NULL),(3327,9,'Class Nine','A',14,'ARKO BALA','BIDYWT BALA','ETI BALA','N/A','N/A','N/A','Male','2010-10-10','0','0','0','Satpar','8801745732634','9A14','34653.jpg',NULL),(3328,9,'Class Nine','A',27,'KOYEL BALA','SHEKHAR BALA','URMILA BALA','N/A','N/A','N/A','Female','2009-06-08','0','0','0','Satpar','8801706191836','9A27','34654.jpg',NULL),(3329,9,'Class Nine','A',61,'AKASH Biswas','DHANANJOY BISWAS','DIPALI BISWAS','N/A','N/A','N/A','Male','2009-05-25','0','0','0','Satpar','8801733809432','9A61','34655.jpg',NULL),(3330,9,'Class Nine','A',3,'ATHOY BISWAS','BIDHAN CHANDRA BISWAS','SABITA RANI BISWAS','N/A','N/A','N/A','Female','2010-10-31','0','0','0','Satpar','8801714191556','9A3','34659.jpg',NULL),(3331,10,'Class Ten','A',19,'Dip Chakrabarty.','Tapan Chakrabarty','Anima Chakrabarty','N/A','N/A','N/A','Male','2008-12-30','0','0','0','Satpar Dakhinpara','8801744555098','10A19','34679.jpg',NULL),(3332,10,'Class Ten','A',22,'Arnnya Bakchi','Kallol Bakchi','Kalyani Bakchi','N/A','N/A','N/A','Male','2008-11-11','0','0','0','Satpar','8801706902723','10A22','34682.jpg',NULL),(3333,10,'Class Ten','A',10,'Hipahit Biswas','Pritish Biswas','Kamalini Biswas','N/A','N/A','N/A','Male','2009-12-31','0','0','0','Satpar','8801748781103','10A10','34684.jpg',NULL),(3334,10,'Class Ten','A',33,'Ripa Gayen','Rabin Gayen','Sibani Gayen','N/A','N/A','N/A','Female','2008-01-10','0','0','0','Satpar','8801733103783','10A33','34687.jpg',NULL),(3335,9,'Class Nine','A',5,'SITHI RANI SARKAR','NILKOMOL SARKAR','KANCHAN SARKAR','N/A','N/A','N/A','Female','2009-06-29','0','0','0','Satpar','8801643292851','9A5','34695.jpg',NULL),(3336,9,'Class Nine','A',7,'JISUN BISWAS','TAPAN BISWAS','JWEEJI BISWAS','N/A','N/A','N/A','Male','2009-08-23','0','0','0','Satpar','8801793622687','9A7','34697.jpg',NULL),(3337,9,'Class Nine','A',17,'PUJA BISWAS','SWAPAN BISWAS','BANANI BISWAS','N/A','N/A','N/A','Female','2010-12-12','0','0','0','Satpar','8801608198408','9A17','34698.jpg',NULL),(3338,9,'Class Nine','A',59,'PRANTA BAKCHI','RATAN BAKCHI','RADHA BAKCHI','N/A','N/A','N/A','Male','2010-01-05','0','0','0','Satpar','8801766172206','9A59','34699.jpg',NULL),(3339,9,'Class Nine','A',24,'SAJIB KIRTTANIA','SWAPAN KIRTTANIA','SWAPNA KIRTTANIA','N/A','N/A','N/A','Male','2009-11-29','0','0','0','Satpar','8801756729371','9A24','34700.jpg',NULL),(3340,9,'Class Nine','A',23,'MISTY BALA','PROSEN BALA','BEAUTY BALA','N/A','N/A','N/A','Female','2011-10-25','0','0','0','Satpar','8801775961402','9A23','34701.jpg',NULL),(3341,9,'Class Nine','A',39,'TANNE BALA','RATAN BALA','GITA BALA','N/A','N/A','N/A','Female','2010-07-21','0','0','0','Satpar','8801708941211','9A39','34702.jpg',NULL),(3342,9,'Class Nine','A',20,'DIP BISWAS','TARUN BISWAS','MALLIKA PANDAY','N/A','N/A','N/A','Male','2011-12-20','0','0','0','Satpar','8801739304073','9A20','34704.jpg',NULL),(3343,9,'Class Nine','A',6,'SUCHANA BISWAS','NABA KUMAR BISWAS','MAYA BISWAS','N/A','N/A','N/A','Female','2010-12-31','0','0','0','Satpar','8801762072655','9A6','34705.jpg',NULL),(3344,9,'Class Nine','A',31,'AVIRUP BISWAS','AHITOSH BISWAS','BIJOLI BISWAS','N/A','N/A','N/A','Male','2010-11-20','0','0','0','Satpar','8801927351627','9A31','34706.jpg',NULL),(3345,9,'Class Nine','A',13,'TANNE BHAKTA','BIBHUTI BHAKTA','SAMAPTI BHAKTA','N/A','N/A','N/A','Female','2010-09-20','0','0','0','Satpar','8801750309613','9A13','34707.jpg',NULL),(3346,9,'Class Nine','A',62,'JOYE BISWAS','NITAI BSIWAS','SHIPRA BISWAS','N/A','N/A','N/A','Female','2010-11-10','0','0','0','Satpar','8801735107868','9A62','34742.jpg',NULL),(3347,9,'Class Nine','A',10,'JOY BARURI','KISORI BARURI','LAVLI BARURI','N/A','N/A','N/A','Male','2010-12-31','0','0','0','Satpar','8801719866992','9A10','34744.jpg',NULL),(3348,9,'Class Nine','A',21,'BARSHA BALA','MOHITOSH BALA','DURGA BALA','N/A','N/A','N/A','Female','2010-06-25','0','0','0','Satpar','8801986387327','9A21','34746.jpg',NULL),(3349,9,'Class Nine','A',19,'PAYEL BALA','APURBO BALA','SNAHO BALA','N/A','N/A','N/A','Female','2010-10-12','0','0','0','Satpar','8801726264279','9A19','34747.jpg',NULL),(3350,9,'Class Nine','A',2,'ATHOI BHAKTA','LITON BHAKTA','GOURY BHAKTA','N/A','N/A','N/A','Female','2009-02-20','0','0','0','Satpar','8801724799518','9A2','34748.jpg',NULL),(3351,9,'Class Nine','A',45,'CHAYTI CHAKROBORTTY','PROBIR CHAKROBORTTY','SWAPNA CHAKROBORTTY','N/A','N/A','N/A','Female','2010-12-12','0','0','0','Satpar','8801733474255','9A45','34749.jpg',NULL),(3352,9,'Class Nine','A',18,'RAKHI BALA','MILON BALA','MONIKA BALA','N/A','N/A','N/A','Female','2010-12-22','0','0','0','Satpar','880132','9A18','34751.jpg',NULL),(3353,9,'Class Nine','A',46,'NIROB CHAKROBORTY','AMORESH CHAKROBORTY','GAYATRI CHAKROBORTY','N/A','N/A','N/A','Male','2011-12-15','0','0','0','Satpar','8801301552549','9A46','34753.jpg',NULL),(3354,9,'Class Nine','A',48,'ANISHA BALA','PRODIP BALA','SWAPNA BALA','N/A','N/A','N/A','Female','2011-11-21','0','0','0','Satpar','8801755153887','9A48','34757.jpg',NULL),(3355,9,'Class Nine','A',53,'SHUVO MONDAL','SADHAN MONDAL','SUBARNA MONDAL','N/A','N/A','N/A','Male','2010-10-01','0','0','0','Satpar','8801757597848','9A53','34761.jpg',NULL),(3356,9,'Class Nine','A',33,'AKASH CHOWDHURY','PROKASH KUMAR CHOWDHURY','ANGALI RANI CHOWDHURY','N/A','N/A','N/A','Male','2009-12-25','0','0','0','Satpar','8801708941211','9A33','34763.jpg',NULL),(3357,9,'Class Nine','A',36,'PUJA BISWAS','SHANKAR BISWAS','SMRITI KANA BISWAS','N/A','N/A','N/A','Female','2008-07-22','0','0','0','Satpar','8801731266657','9A36','34764.jpg',NULL),(3358,9,'Class Nine','A',9,'AISHE BISWAS','TAPAS BISWAS','ROMA BISWAS','N/A','N/A','N/A','Female','2010-08-15','0','0','0','Satpar','8801797211614','9A9','34770.jpg',NULL),(3359,9,'Class Nine','A',8,'PRIYANTI BISWAS ANTI','RATHINDRONATH BISWAS','RIPA BISWAS','N/A','N/A','N/A','Female','2009-12-27','0','0','0','Satpar','8801743915414','9A8','34776.jpg',NULL),(3360,10,'Class Ten','A',44,'Souvik Mazumder','Dipak Mazumder','Sampa Mazumder','N/A','N/A','N/A','Male','2009-10-07','0','0','0','Satpar','8801736731615','10A44','34794.jpg',NULL),(3361,10,'Class Ten','A',52,'Avijeet Mondal','Haridas Mondal','Bani Mondal','N/A','N/A','N/A','Male','2009-05-09','0','0','0','Satpar','8801716251260','10A52','34797.jpg',NULL),(3362,10,'Class Ten','A',20,'Suvash Bachar','Shankar Basar','Lipi Bachar','N/A','N/A','N/A','Male','2010-11-22','0','0','0','Satpar','8801636339449','10A20','34800.jpg',NULL),(3363,10,'Class Ten','A',46,'Klinton Biswas','Pitu Biswas','Kamana Biswas','N/A','N/A','N/A','Male','2009-01-03','0','0','0','Satpar','8801716251260','10A46','34802.jpg',NULL),(3364,10,'Class Ten','A',43,'Rohit Barai','Thakur Barai','Depa Barai','N/A','N/A','N/A','Male','2008-08-22','0','0','0','Satpar','8801734735724','10A43','34805.jpg',NULL),(3365,9,'Class Nine','A',43,'SHANALE BALA','NARATTAM BALA','MANJU BALA','N/A','N/A','N/A','Female','2010-02-15','0','0','0','Satpar','8801750444520','9A43','34807.jpg',NULL),(3366,9,'Class Nine','A',47,'RIYA TIKADAR','SUJIT TIKADAR','ARCHANA TIKADAR','N/A','N/A','N/A','Female','2010-08-08','0','0','0','Satpar','8801757744738','9A47','34810.jpg',NULL),(3367,9,'Class Nine','A',30,'PURNIMA MONDAL','AJIT MONDAL','LIPIKA MONDAL','N/A','N/A','N/A','Female','2010-11-20','0','0','0','Satpar','8801728040916','9A30','34812.jpg',NULL),(3368,9,'Class Nine','A',42,'RIME BALA','RANJAN BALA','JANATA BALA','N/A','N/A','N/A','Female','2010-11-20','0','0','0','Satpar','8801776522779','9A42','34818.jpg',NULL),(3369,9,'Class Nine','A',65,'PALLABI BISWAS','SUDHANGSHU BISWAS','SHILPI BAUL','N/A','N/A','N/A','Female','2010-12-10','0','0','0','Satpar','8801','9A65','34822.jpg',NULL),(3370,9,'Class Nine','A',25,'GANESH MAJUMDER','RAMEN MAJUMDER','ETI MAJUMDER','N/A','N/A','N/A','Male','2009-06-10','0','0','0','Satpar','8801708941211','9A25','34835.jpg',NULL),(3371,10,'Class Ten','A',28,'TRIPTI GAIN','RAMESH GAIN','KABITA GAIN','N/A','N/A','N/A','Female','1970-01-01','0','0','0','Satpar','8801708891211','10A28','34844.jpg',NULL),(3372,10,'Class Ten','A',37,'Protap Das','Palash Kumar Das','Anju Das','N/A','N/A','N/A','Male','2007-12-07','0','0','0','Satpar','8801746412090','10A37','34856.jpg',NULL),(3373,9,'Class Nine','A',41,'RAMPA BALA','HARBILAS BALA','SUKLA BALA','N/A','N/A','N/A','Female','2010-08-10','0','0','0','Satpar','8801733667707','9A41','35070.jpg',NULL),(3374,9,'Class Nine','A',32,'JEET BALA','MRITUNJAYA BALA','SANKARI BALA','N/A','N/A','N/A','Male','2010-07-15','0','0','0','Satpar','8801741222954','9A32','35071.jpg',NULL),(3375,9,'Class Nine','A',16,'POPY BISWAS','MANOJ BISWAS','SUIATA BISWAS','N/A','N/A','N/A','Female','2011-10-20','0','0','0','Satpar','8801939437930','9A16','35074.jpg',NULL),(3376,9,'Class Nine','A',55,'KAKOLI BISWAS','MANIDRANATH BISWAS','KABITA BISWAS','N/A','N/A','N/A','Female','2010-12-10','0','0','0','Satpar','8801795054403','9A55','35088.jpg',NULL),(3377,9,'Class Nine','A',22,'SETU BISWAS','TANMAY KANTISWAS','BINA BISWAS','N/A','N/A','N/A','Male','2009-12-10','0','0','0','Satpar','8801724727497','9A22','35123.jpg',NULL),(3378,9,'Class Nine','A',40,'RIYA BALA','RAMESH BALA','DEBI RANI PODDAR','N/A','N/A','N/A','Female','2010-09-11','0','0','0','Satpar','8801708941211','9A40','35126.jpg',NULL),(3379,9,'Class Nine','A',57,'ABIR BISWAS','MALOY BISWAS','KANCHAN BISWAS','N/A','N/A','N/A','Male','2012-03-03','0','0','0','Satpar','8801758007621','9A57','35127.jpg',NULL),(3380,9,'Class Nine','A',56,'RINKI BISWAS','SUNIT BISWAS','VAKTI BISWAS','N/A','N/A','N/A','Female','2010-12-07','0','0','0','Satpar','8801743854390','9A56','35128.jpg',NULL),(3381,9,'Class Nine','A',52,'SIBAJIT BALA','SAMIR BALA','PADMA BALA','N/A','N/A','N/A','Male','2010-10-10','0','0','0','Satpar','8801706191882','9A52','35129.jpg',NULL),(3382,9,'Class Nine','A',64,'BADHON BISWAS','BABU BISWAS','MANIKA BISWAS','N/A','N/A','N/A','Male','2008-12-30','0','0','0','Satpar','8801773816008','9A64','35130.jpg',NULL),(3383,9,'Class Nine','A',1,'LAGN0 BALA','MONIKISHOR BALA','SHIKHA MUKHERJEE','N/A','N/A','N/A','Female','2011-10-08','0','0','0','Satpar','8801920587767','9A1','35133.jpg',NULL),(3384,9,'Class Nine','A',38,'BARSHA BALA','BIPUL BALA','ANITA BALA','N/A','N/A','N/A','Female','2010-11-25','0','0','0','Satpar','8801747453507','9A38','35138.jpg',NULL),(3385,10,'Class Ten','A',4,'Payel Biswas','Krishna Biswas','Shilpi Biswas','N/A','N/A','N/A','Female','2009-10-30','0','0','0','Satpar','8801756099267','10A4','35221.jpg',NULL),(3386,10,'Class Ten','A',8,'Joya Sarkar','Anutosh Sarkar','Sema Sarkar','N/A','N/A','N/A','Female','2009-06-30','0','0','0','Satpar','8801703610829','10A8','35238.jpg',NULL),(3387,10,'Class Ten','A',40,'Argho Kirttania','Apurbo Kirttania','Doli Kirttania','N/A','N/A','N/A','Male','2009-12-15','0','0','0','Satpar','8801711285387','10A40','35242.jpg',NULL),(3388,10,'Class Ten','A',51,'Urme Biswas','Alok Biswas','Lotika Biswas','N/A','N/A','N/A','Female','2006-12-30','0','0','0','Satpar','8801708017741','10A51','35245.jpg',NULL),(3389,10,'Class Ten','A',54,'Ahana Biswas','Miltan Biswas','Mamata Biswas','N/A','N/A','N/A','Female','2009-05-10','0','0','0','Satpar','8801','10A54','35248.jpg',NULL),(3390,10,'Class Ten','A',1,'Jeet Biswas','Bikash Biswas','Shiuli Biswas','N/A','N/A','N/A','Male','2008-09-22','0','0','0','Satpar','8801725029086','10A1','35255.jpg',NULL),(3391,10,'Class Ten','A',16,'Swapna Biswas Setu','Paritosh Biswas','Usha Biswad','N/A','N/A','N/A','Female','2008-12-31','0','0','0','Satpar','8801920591055','10A16','35260.jpg',NULL),(3392,10,'Class Ten','A',49,'Priya Biswas','Napal Biswas','Mina Biswas','N/A','N/A','N/A','Female','2009-05-20','0','0','0','Satpar','8801','10A49','35264.jpg',NULL),(3393,10,'Class Ten','A',45,'Anik Bala','Debashis Bala','Jayanti Bala','N/A','N/A','N/A','Male','2009-09-15','0','0','0','Satpar','8801650125006','10A45','35268.jpg',NULL),(3394,10,'Class Ten','A',42,'Joy Bepari','Amar Bepari','Kabita Bepari','N/A','N/A','N/A','Male','2009-12-05','0','0','0','Satpar','8801787042239','10A42','35381.jpg',NULL),(3395,10,'Class Ten','A',35,'Tiya Biswas','Liton Biswas','Eti Biswas','N/A','N/A','N/A','Female','2009-03-23','0','0','0','Satpar','8801793338166','10A35','35395.jpg',NULL),(3396,10,'Class Ten','A',18,'Swadhin Bala','Bipul Bala','Sabitri Bala','N/A','N/A','N/A','Male','2009-11-15','0','0','0','Satpar','8801734468011','10A18','35588.jpg',NULL),(3397,10,'Class Ten','A',38,'Sithi Bala','Tapash Bala','Swapna Bar','N/A','N/A','N/A','Female','2009-01-03','0','0','0','Satpar','8801717977536','10A38','35590.jpg',NULL),(3398,10,'Class Ten','A',26,'Mita Golder','Nrepen Goder','Eti Golder','N/A','N/A','N/A','Female','2008-12-15','0','0','0','Satpar','8801757521350','10A26','35594.jpg',NULL),(3399,10,'Class Ten','A',50,'Tuli Mondol','Bimal Chandra Mondol','Suchitra Rani Mondol','N/A','N/A','N/A','Female','2008-11-10','0','0','0','Satpar','8801782099072','10A50','35597.jpg',NULL),(3400,10,'Class Ten','A',13,'Bibek Mondal','Biduyt Mondal','Ulpi Mondal','N/A','N/A','N/A','Male','2008-12-31','0','0','0','Satpar','8801739218100','10A13','35609.jpg',NULL),(3401,10,'Class Ten','A',3,'Puspita Bala','Sreepati Bala','Dulali Bala','N/A','N/A','N/A','Female','2009-12-31','0','0','0','Satpar','8801768197468','10A3','35614.jpg',NULL),(3402,10,'Class Ten','A',31,'Ritu Biswas','Subir Biswas','Shipra Biswas','N/A','N/A','N/A','Female','2009-07-02','0','0','0','Satpar','8801772248365','10A31','35618.jpg',NULL),(3403,10,'Class Ten','A',2,'Partha Biswas','Kamalesh Biswas','Khukumani Biswas','N/A','N/A','N/A','Male','2008-11-15','0','0','0','Satpar','8801752964938','10A2','35626.jpg',NULL),(3404,10,'Class Ten','A',21,'Shibajit Biswas','Sujit Biswas','Beauty Biswas','N/A','N/A','N/A','Male','2009-05-10','0','0','0','Satpar','8801706586480','10A21','35633.jpg',NULL),(3405,10,'Class Ten','A',17,'Arko Biswas','Vulu Biswas','Aloka Biswas','N/A','N/A','N/A','Male','2010-04-04','0','0','0','Satpar','880174332334','10A17','35647.jpg',NULL),(3406,10,'Class Ten','A',14,'Joy Mondal','Nripati Mondal','Beauty Mondal','N/A','N/A','N/A','Male','2008-12-28','0','0','0','Satpar','8801738006053','10A14','35653.jpg',NULL),(3407,10,'Class Ten','A',47,'Dipto Biswas','Golak Biswas','Puspo Biswas','N/A','N/A','N/A','Male','2008-11-10','0','0','0','Satpar','8801704923557','10A47','35664.jpg',NULL),(3408,10,'Class Ten','A',5,'Rakhi Biswas','Sanjit Biswas','Swarnali Biswas','N/A','N/A','N/A','Female','2009-12-12','0','0','0','Satpar','8801743323340','10A5','35670.jpg',NULL),(3409,10,'Class Ten','A',12,'Emon Biswas','Ajit Kumar Biswas','Malobika Biswas','N/A','N/A','N/A','Male','2009-03-25','0','0','0','Satpar','8801978327077','10A12','35683.jpg',NULL),(3410,10,'Class Ten','A',25,'Oishe Bala','Mrinal Bala','Sharmila Bala','N/A','N/A','N/A','Female','2009-11-20','0','0','0','Satpar','8801943288215','10A25','35698.jpg',NULL),(3411,10,'Class Ten','A',23,'Rimi Thakur','Amit Thakur','Mitu Thakur','N/A','N/A','N/A','Female','2009-12-20','0','0','0','Satpar','8801647283533','10A23','35708.jpg',NULL),(3412,10,'Class Ten','A',9,'Sneha Bayragi','Karttik Bairagi','Rita Bairagi','N/A','N/A','N/A','Female','2009-04-01','0','0','0','Satpar','8801778460767','10A9','35728.jpg',NULL),(3413,10,'Class Ten','A',34,'Preyanka Bakchi','Pintu Bakchi','Nitu Bakchi','N/A','N/A','N/A','Female','2009-12-05','0','0','0','Satpar','8801714563108','10A34','35734.jpg',NULL),(3414,10,'Class Ten','A',7,'Bishwanath Arinda','Apurba Arinda','Kamala Arinda','N/A','N/A','N/A','Male','2008-02-01','0','0','0','Andarkotha','8801725361932','10A7','35746.jpg',NULL),(3415,10,'Class Ten','A',24,'Rishekesh Bala','Bikash Bala','Dipu Bala','N/A','N/A','N/A','Male','2007-10-10','0','0','0','Satpar','8801759948690','10A24','35753.jpg',NULL),(3416,10,'Class Ten','A',32,'Disha Mondal','Mithun Mondal','Ramala Mondal','N/A','N/A','N/A','Female','2009-10-06','0','0','0','Satpar','8801922909550','10A32','36135.jpg',NULL),(3417,10,'Class Ten','A',48,'Rick Biswas','Luxman Biswas','Bithi Biswas','N/A','N/A','N/A','Male','2009-03-01','0','0','0','Satpar','8801310364903','10A48','51501.jpg',NULL),(3418,7,'Class Seven','A',1,'BRISTI DHALI','KRISHNA DHALI','BANNYA DHALI','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801688241784','7A1','66098.jpg',NULL),(3419,7,'Class Seven','A',2,'NITHI BALA','TAPAS BALA','SWPANA BAR','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801717977536','7A2','66100.jpg',NULL),(3420,7,'Class Seven','A',3,'ARPON SARKAR','TAPAS SARKER','LABONY SARKER','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801734403840','7A3','66107.jpg',NULL),(3421,7,'Class Seven','A',4,'MITHIL BHAKTA','LITAN BHAKTA','GOURI BHAKTA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801724799518','7A4','66109.jpg',NULL),(3422,7,'Class Seven','A',5,'Shadhin kirttonia','MIHIR KIRTTONIA','SHIPRA KIRTTANIA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801775625762','7A5','66111.jpg',NULL),(3423,7,'Class Seven','A',6,'Rima Bala','DIPAK BALA','REKHA BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801634667425','7A6','66113.jpg',NULL),(3424,7,'Class Seven','A',7,'Setu Bala','SUMANGAL BALA','KAMONA BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801760808926','7A7','66114.jpg',NULL),(3425,7,'Class Seven','A',8,'Piko Bala','GOUR BALA','CANDRIKA BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801308570818','7A8','66116.jpg',NULL),(3426,7,'Class Seven','A',9,'Dipu Moni Biswas','MILTAN BISWAS','CITRA THAKUR','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801757815443','7A9','66118.jpg',NULL),(3427,7,'Class Seven','A',10,'MEDHA BISWAS','TAPAN KUMAR BISWAS','RIKTA BARAI','N/A','N/A','N/A','Female','2011-10-22','0','0','0','NIZRA','8801716251260','7A10','66119.jpg',NULL),(3428,7,'Class Seven','A',11,'Moni Bala','BIKAS BALA','DIPU BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801759948690','7A11','66121.jpg',NULL),(3429,7,'Class Seven','A',12,'Antora Mondal','PABITRA MONDAL','MONISA MONDAL','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801728915628','7A12','66122.jpg',NULL),(3430,7,'Class Seven','A',13,'Shayon Sarkar','ANUTOSH SARKAR','MILI KIRTTONIA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801706530783','7A13','66171.jpg',NULL),(3431,7,'Class Seven','A',14,'Anik Biswas','GOBINDA BISWAS','LILI BISWAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801302463215','7A14','66172.jpg',NULL),(3432,7,'Class Seven','A',15,'Mom Mondol','GANESH MONDAL','ETI BISWAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801308521799','7A15','66173.jpg',NULL),(3433,7,'Class Seven','A',16,'DISHA BALA','DAYAL BALA','MADHURI BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801729934425','7A16','66174.jpg',NULL),(3434,7,'Class Seven','A',17,'Protima Sarkar','PROSHANTA KUMAR SARKAR','SATHI SARKAR','N/A','N/A','N/A','Female','2012-01-30','0','0','0','SATPAR','8801739571956','7A17','66175.jpg',NULL),(3435,7,'Class Seven','A',18,'Papula Biswas','BIDHAN BISWAS','SMRITI BISWAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801965207672','7A18','66176.jpg',NULL),(3436,7,'Class Seven','A',19,'Bapan Bala','BALORAM BALA','KAKOLI BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801945608860','7A19','66177.jpg',NULL),(3437,7,'Class Seven','A',21,'Ritu Bala','NRIPEN BALA','CANDRIKA BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801614777353','7A21','66179.jpg',NULL),(3438,7,'Class Seven','A',22,'Shibaji Sarkar','MITHUN SARKAR','PALLABI SARKAR','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801643208978','7A22','66180.jpg',NULL),(3439,7,'Class Seven','A',23,'Anono Basar','ANGSHOPATI BASAR','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801767944877','7A23','66181.jpg',NULL),(3440,7,'Class Seven','A',24,'Jhara Biswas','SWAPAN BISWAS','SHIBANI BISWAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801762789449','7A24','66182.jpg',NULL),(3441,7,'Class Seven','A',25,'Prithom Bala','PROMOTHO BALA','SHIPRA BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801934434846','7A25','66183.jpg',NULL),(3442,7,'Class Seven','A',26,'HIYA BISWAS','TANMOY BISWAS','MANISHA BISWAS','N/A','N/A','N/A','Male','2012-01-31','0','0','0','','8801729882192','7A26','66744.jpg',NULL),(3443,7,'Class Seven','A',27,'SWAPNO BISWAS','SANJOY BISWAS','RATNA BISWAS','N/A','N/A','N/A','Female','2011-12-31','0','0','0','','8801627299512','7A27','66745.jpg',NULL),(3444,7,'Class Seven','A',28,'SUMI BALA','UTPAL BALA','DABIKA TALUKDER','N/A','N/A','N/A','Male','2012-10-10','0','0','0','','8801139480862','7A28','66746.jpg',NULL),(3445,7,'Class Seven','A',29,'GUNGUN BISWAS','MILTAN BISWAS','MAMATA BISWAS','N/A','N/A','N/A','Male','2011-12-25','0','0','0','','8801761757795','7A29','66747.jpg',NULL),(3446,7,'Class Seven','A',30,'APURBA KIRTTANIA','AJIT KIRTTANIA','SAGORIKA KRITTANIA','N/A','N/A','N/A','Female','2011-01-10','0','0','0','','8801738134216','7A30','66748.jpg',NULL),(3447,7,'Class Seven','A',31,'BIJOY BISWAS','BIJAN BISWAS','LAKSHIMA BISWAS','N/A','N/A','N/A','Female','2011-10-15','0','0','0','','8801727856671','7A31','66749.jpg',NULL),(3448,7,'Class Seven','A',32,'SHILPA BALA','SHIMUL BALA','SUBARNA MANDAL','N/A','N/A','N/A','Male','2012-10-09','0','0','0','','8801952679798','7A32','66750.jpg',NULL),(3449,7,'Class Seven','A',33,'TORA BALA','SUJIT BALA','MONA MALLIK','N/A','N/A','N/A','Male','2012-12-30','0','0','0','','8801736427813','7A33','66751.jpg',NULL),(3450,7,'Class Seven','A',34,'KEYA BHAKTA','ASIT BHAKTA','SABITA BHAKTA','N/A','N/A','N/A','Male','2011-05-10','0','0','0','','8801633692224','7A34','66752.jpg',NULL),(3451,7,'Class Seven','A',35,'SONGITA BACHAR','SANKAR BASAR','LIPI BACHAR','N/A','N/A','N/A','Male','2012-05-20','0','0','0','','8801673604468','7A35','66753.jpg',NULL),(3452,7,'Class Seven','A',36,'RAJ BALA','MOHITOSH BALA','DURGA BALA','N/A','N/A','N/A','Female','2011-02-20','0','0','0','','8801707904840','7A36','66754.jpg',NULL),(3453,7,'Class Seven','A',38,'UTSHO BAKCHI','NITISHBAKCHI','KANIKA BAKCHI','N/A','N/A','N/A','Male','2012-11-24','0','0','0','','8801727142885','7A38','66756.jpg',NULL),(3454,7,'Class Seven','A',39,'RIKO BHAKTA','SHAMIR BHAKTA','UNNATI BHAKTI','N/A','N/A','N/A','Female','2012-05-01','0','0','0','','8801739188466','7A39','66757.jpg',NULL),(3455,7,'Class Seven','A',40,'NIRAB BALA','NRIPENDRANATH BALA','UNNATI BALA','N/A','N/A','N/A','Female','2012-12-25','0','0','0','','8801701399317','7A40','66758.jpg',NULL),(3456,7,'Class Seven','A',41,'TINA MANDAL','BISWAJIT MONDAL','MALLIKA MONDAL','N/A','N/A','N/A','Male','2011-10-07','0','0','0','','8801706530803','7A41','66759.jpg',NULL),(3457,7,'Class Seven','A',42,'DWIP BISWAS','ASIM BISWAS','ARPANA BISWAS','N/A','N/A','N/A','Female','2012-06-30','0','0','0','SATPAR','8801732492759','7A42','66760.jpg',NULL),(3458,7,'Class Seven','A',43,'JOYEETA ROY','','','N/A','N/A','N/A','Male','2011-11-30','0','0','0','SATPAR','8801706587212','7A43','66761.jpg',NULL),(3459,7,'Class Seven','A',44,'RAJU BISWAS','HORIDASH BISWAS','LIPIKA BISWAS','N/A','N/A','N/A','Female','2010-12-29','0','0','0','','8801774965664','7A44','66762.jpg',NULL),(3460,7,'Class Seven','A',45,'AISHE BISWAS','SUKANTI BISWAS','RUNA BISWAS','N/A','N/A','N/A','Male','2012-12-15','0','0','0','','8801624802799','7A45','66763.jpg',NULL),(3461,7,'Class Seven','A',46,'Basana Biswas','Rabindronath Biswas','Chayna Biswas','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801','7A46','66764.jpg',NULL),(3462,7,'Class Seven','A',47,'Manish Biswas','Manidra Biswas','Kabita Biswas','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801','7A47','66765.jpg',NULL),(3463,7,'Class Seven','A',48,'krishna Biswas','Manik Biswas','Puspa Biswas','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801','7A48','66766.jpg',NULL),(3464,7,'Class Seven','A',50,'Tora Biswas','Subrata Biswas','Simul Biswas','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801','7A50','66768.jpg',NULL),(3465,7,'Class Seven','A',51,'Sapno Mondal','Gonesh Mondal','Saekha Mondal','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801','7A51','66769.jpg',NULL),(3466,7,'Class Seven','A',52,'Sristi Sarkar','Shyakmal Sarkar','Sathe Panda','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801','7A52','66770.jpg',NULL),(3467,10,'Class Ten','A',6,'Antu Samajpati','Amith Samajpati','Shyamali Biswas','N/A','N/A','N/A','Male','1969-12-31','0','0','0','Satper','8801745310257','10A6','66787.jpg',NULL),(3468,10,'Class Ten','A',15,'Biku Bala','Krishna Phada Bala','Bule Bala','N/A','N/A','N/A','Female','1969-12-31','0','0','0','Satper','8801907695446','10A15','66788.jpg',NULL),(3469,10,'Class Ten','A',30,'Misty Golder','Gopal Chandro Golder','Monika Golder','N/A','N/A','N/A','Female','1969-12-31','0','0','0','Satper','8801748675021','10A30','66789.jpg',NULL),(3470,8,'Class Eight','A',2,'Koyel Biswas','SANKAR BISWAS','RIMA BISWAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801734468010','8A2','66790.jpg',NULL),(3471,8,'Class Eight','A',6,'Arpa Bala','ANIRBAN BALA','DIPU BISWAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801781415677','8A6','66791.jpg',NULL),(3472,8,'Class Eight','A',33,'Prince Golder','UJJAL GOLDER','','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801731058732','8A33','66793.jpg',NULL),(3473,8,'Class Eight','A',27,'Tora Golder','BABLU GOLDER','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801779182802','8A27','66794.jpg',NULL),(3474,8,'Class Eight','A',1,'RIYAL BISWAS','DEBABRATA BISWAS','KALPANA BISWAS','N/A','N/A','N/A','Male','2010-12-30','0','0','0','','8801937807769','8A1','66801.jpg',NULL),(3475,8,'Class Eight','A',3,'DEB BISWAS','JAGODISH BISWAS','SUFALA BISWAS','N/A','N/A','N/A','Female','2011-01-02','0','0','0','','8801750922127','8A3','66802.jpg',NULL),(3476,8,'Class Eight','A',4,'BANDHU BISWAS','SHANKAR BISWAS','SMRITI KANA BISWAS','N/A','N/A','N/A','Female','2010-11-02','0','0','0','','8801731266657','8A4','66803.jpg',NULL),(3477,8,'Class Eight','A',5,'DIP THAKUR','PROSENJIT THAKUR','KALPONA THAKUR','N/A','N/A','N/A','Female','2011-05-15','0','0','0','','8801937121151','8A5','66804.jpg',NULL),(3478,8,'Class Eight','A',7,'DIBAKOR BAKCHI','DEBOBROTO BAKCHI','BABITA BAKCHI','N/A','N/A','N/A','Female','2011-09-15','0','0','0','','8801619496724','8A7','66805.jpg',NULL),(3479,8,'Class Eight','A',8,'ANTOR MONDAL','BASUDEB MANDAL','SHIBANI MANDAL','N/A','N/A','N/A','Female','2011-08-01','0','0','0','','8801748998320','8A8','66806.jpg',NULL),(3480,8,'Class Eight','A',9,'SARNA MONDAL','SADHAN MONDAL','SUBARNA MONDAL','N/A','N/A','N/A','Female','2011-05-10','0','0','0','','8801757597848','8A9','66807.jpg',NULL),(3481,8,'Class Eight','A',10,'Ashwini Golder','nepal golder','sathi bor','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801731190768','8A10','66808.jpg',NULL),(3482,8,'Class Eight','A',11,'Rupos tikadar','Prokash Tikader','Shilpi Tikader','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801','8A11','66809.jpg',NULL),(3483,8,'Class Eight','A',13,'Shongy Bakchi','PRADIP BAKCHI','Asha bakchi','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801711734754','8A13','66811.jpg',NULL),(3484,8,'Class Eight','A',14,'Dayal Mondal','Dipankar Mondal','Chayna Mondal','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801791171683','8A14','66812.jpg',NULL),(3485,8,'Class Eight','A',15,'Joti Biswas','Biplob Biswas','Ful mala basu','N/A','N/A','N/A','Female','2011-10-11','0','0','0','','8801743938597','8A15','66813.jpg',NULL),(3486,8,'Class Eight','A',17,'Manish mondal','Rabin mondal','Nitu mondal','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801775821793','8A17','66814.jpg',NULL),(3487,8,'Class Eight','A',18,'Ratri Chakrabortty','Gobinda Chakrabortty','Archana Chakrabortty','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801730252468','8A18','66835.jpg',NULL),(3488,8,'Class Eight','A',19,'Anannya Bala','Sanjit Bala','Sulekha Bala','N/A','N/A','N/A','Female','2011-12-11','0','0','0','','8801915641840','8A19','66838.jpg',NULL),(3489,8,'Class Eight','A',20,'TAMAL MONDAL','Basudeb Kirtonia','Anita Kirtonia','N/A','N/A','N/A','Male','2011-01-02','0','0','0','SATPAR','8801736592573','8A20','66840.jpg',NULL),(3490,8,'Class Eight','A',21,'Shithi Bakchi','Subrato Bakchi','Tuli Bakchi','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801609710654','8A21','66842.jpg',NULL),(3491,8,'Class Eight','A',22,'Anuvob Mondal','Anutotosh mondal','Anita mondal','N/A','N/A','N/A','Male','2011-05-06','0','0','0','SATPAR','8801786239033','8A22','66844.jpg',NULL),(3492,8,'Class Eight','A',23,'Neti mondal','Probin mondal','Ratna mondal','N/A','N/A','N/A','Female','2011-10-05','0','0','0','','8801763983031','8A23','66846.jpg',NULL),(3493,8,'Class Eight','A',24,'Nupur Panday','Nabin panday','Shukla Bala','N/A','N/A','N/A','Female','2010-10-02','0','0','0','','8801733540384','8A24','66848.jpg',NULL),(3494,8,'Class Eight','A',25,'Dipto mondal','Sanjib mondal','Dipty biswas','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801774917082','8A25','66851.jpg',NULL),(3495,8,'Class Eight','A',26,'TUHIN MONDAL','PARIMAL MONDAL','TRISHNA MONDAL','N/A','N/A','N/A','Female','2011-10-11','0','0','0','SATPAR','8801017312614','8A26','66853.jpg',NULL),(3496,8,'Class Eight','A',29,'Bivor Bosu','Moni Bosu','Kalphana Bala','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801905641107','8A29','66856.jpg',NULL),(3497,8,'Class Eight','A',30,'Priya Bala','Gopal Bala','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801732504747','8A30','66859.jpg',NULL),(3498,8,'Class Eight','A',31,'Mithun biswas','Amiya Biswas','Lipika Biswas','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801760497858','8A31','66943.jpg',NULL),(3499,8,'Class Eight','A',32,'Jit biswas','Bidhitosh Biswas','Varati Biswas','N/A','N/A','N/A','Male','2010-10-10','0','0','0','','8801','8A32','66945.jpg',NULL),(3500,8,'Class Eight','A',34,'Rupam Biswas','Mintu Biswas','Shefali Biswas','N/A','N/A','N/A','Male','2011-10-10','0','0','0','','8801608198425','8A34','66947.jpg',NULL),(3501,8,'Class Eight','A',35,'Ashik Kirtonia','Sailen Kirtonia','Bina biswas','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801','8A35','66949.jpg',NULL),(3502,8,'Class Eight','A',36,'Diganto Biswas','Himanshu Biswas','Mira biswas','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801789139097','8A36','66951.jpg',NULL),(3503,8,'Class Eight','A',39,'Aishi Bala','Lalon Bala','Samapti maitra','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801608198413','8A39','66953.jpg',NULL),(3504,8,'Class Eight','A',42,'Supriya Bala','Nakul Bala','Beauty Bala','N/A','N/A','N/A','Female','2011-10-02','0','0','0','','8801737293294','8A42','66955.jpg',NULL),(3505,8,'Class Eight','A',43,'Dipto Bala','Dipon Bala','Tulika roy','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801765673081','8A43','66956.jpg',NULL),(3506,8,'Class Eight','A',44,'Jhilik panday','Nipin Panday','Chandana rani sikder','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801721092390','8A44','66957.jpg',NULL),(3507,8,'Class Eight','A',47,'Sharaboni Mondal','Gopal Mondal','Promila Mondal','N/A','N/A','N/A','Female','2010-01-01','0','0','0','','8801','8A47','66959.jpg',NULL),(3508,8,'Class Eight','A',49,'POPY MRIDHA','Biplob Mridha','Sankori Mridha','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801785765048','8A49','66960.jpg',NULL),(3509,8,'Class Eight','A',50,'SUMIT BALA','ANGSHAPATI BALA','SHAYAMALI BALA','N/A','N/A','N/A','Male','1969-12-31','0','0','0','SATPAR','8801741182904','8A50','66961.jpg',NULL),(3510,9,'Class Nine','A',58,'Bishal Bakgchi','BIDHAN BAGCHI','Mithu Bagchi','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801770006061','9A58','67066.jpg',NULL),(3511,9,'Class Nine','A',11,'Arpita Thakur','HIMANGSHU THAKUR','JUTHIKA THAKUR','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801735791715','9A11','67067.jpg',NULL),(3512,9,'Class Nine','A',37,'MAGLA MOZUMDER','KHITISH MOZUMDER','UNNOTI MOZUMDER','N/A','N/A','N/A','Female','1969-12-31','0','0','0','satpar','8801319443731','9A37','67299.jpg',NULL),(3513,9,'Class Nine','A',35,'MANIK BISWAS','ANUTOSH BISWAS','SABITA BISWAS','N/A','N/A','N/A','Male','1969-12-31','0','0','0','SATPAR','8801737420613','9A35','68502.jpg',NULL),(3514,9,'Class Nine','A',26,'ANTORA DATTA','PIJUS DATTA','PROTIVA DATTA','N/A','N/A','N/A','Female','2010-01-01','0','0','0','SATPAR','8801645693883','9A26','68503.jpg',NULL),(3515,9,'Class Nine','A',60,'PROTAP ADIKARE','PROSANTA AIKARI','SHIULY ADIKARE','N/A','N/A','N/A','Male','2010-01-01','0','0','0','SATPAR','8801734582933','9A60','68504.jpg',NULL),(3516,9,'Class Nine','A',49,'PEHELY SARKAR','HARAN SARKAR','BIKU RANI SARKAR','N/A','N/A','N/A','Female','2011-01-01','0','0','0','SATPAR','8801313228355','9A49','68505.jpg',NULL),(3517,9,'Class Nine','A',44,'SAGORI BALA','SUDEB BALA','AMALA BALA','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801758418209','9A44','68506.jpg',NULL),(3518,9,'Class Nine','A',34,'DIKJOY MONDAL','BIDHAN MONDAL','LATIKA MONDAL','N/A','N/A','N/A','Male','2009-09-12','0','0','0','GANDIASUR','8801726398198','9A34','68507.jpg',NULL),(3519,9,'Class Nine','A',63,'DIBAKAR BALA','Dyal Bala','','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801716251260','9A63','68859.jpg',NULL),(3520,9,'Class Nine','A',54,'PRANTA MONDOL','','','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801716251260','9A54','68860.jpg',NULL),(3521,10,'Class Ten','A',53,'RIYA BISWAS','','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801716251260','10A53','68862.jpg',NULL),(3522,10,'Class Ten','A',36,'PURNIMA BAR','Sujit Bar','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','sqatpar','8801742751007','10A36','68863.jpg',NULL),(3523,10,'Class Ten','A',11,'PRITAM BALA','Babul Bala','','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801716251260','10A11','68864.jpg',NULL),(3524,10,'Class Ten','A',39,'RACHANA BISWAS','','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','','8801716251260','10A39','68865.jpg',NULL),(3525,10,'Class Ten','A',29,'DIP BALA','','','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801716251260','10A29','68867.jpg',NULL),(3526,10,'Class Ten','A',41,'Shiba Malaker','','','N/A','N/A','N/A','Male','1969-12-31','0','0','0','','8801716251260','10A41','68868.jpg',NULL),(3527,8,'Class Eight','A',38,'JOY GAIN','RABIN GAIN','SHIBANI GAIN','N/A','N/A','N/A','Male','1969-12-31','0','0','0','SATPAR','8801','8A38','68892.jpg',NULL),(3528,8,'Class Eight','A',41,'ANANYA DAS','PALASH DAS','ANJU DAS','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801716251260','8A41','68893.jpg',NULL),(3529,8,'Class Eight','A',46,'SUDIP BISWAS','MILAN BISWAS','RINA BISWAS','N/A','N/A','N/A','Male','1969-12-31','0','0','0','SATPAR','8801716117136','8A46','68894.jpg',NULL),(3530,8,'Class Eight','A',48,'DIP BISWAS','BIDHAN BISWAS','RITA BISWAS','N/A','N/A','N/A','Male','1969-12-31','0','0','0','SATPAR','8801756250494','8A48','68895.jpg',NULL),(3531,7,'Class Seven','A',53,'ARNIKA BISWAS','ALOK BISWAS','','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801716251260','7A53','68896.jpg',NULL),(3532,8,'Class Eight','A',28,'Anuradha Bala','Pankoj bala','Sriti Bala','N/A','N/A','N/A','Female','1969-12-31','0','0','0','SATPAR','8801731154188','8A28','68950.jpg',NULL),(3533,6,'Class Six','A',1,'SMITH BISWAS','SHIBES BISWAS','PALI GOLDAR','N/A','N/A','N/A','Male','2013-12-30','0','0','0','SATPAR','8801861304494','6A1','6965273.jpg',NULL),(3534,6,'Class Six','A',2,'SHUVRODEB BISWAS','DEBASISH BISWAS','SHILPI MONDAL','N/A','N/A','N/A','Male','2013-12-04','0','0','0','SATPAR','8801715315937','6A2','6965274.jpg',NULL),(3535,6,'Class Six','A',3,'AVISHRA MONDOL','NITTYA MONDOL','CHANDRIKA MONDOL','N/A','N/A','N/A','Male','2013-08-02','0','0','0','SATPAR','8801781750274','6A3','6965275.jpg',NULL),(3536,6,'Class Six','A',4,'SRABANTI SARKAR','VISWAJIT SARKAR','PRIYA ROY','N/A','N/A','N/A','Female','2013-11-26','0','0','0','SATPAR','8801326972335','6A4','6965276.jpg',NULL),(3537,6,'Class Six','A',5,'PALLAB BALA','PROSEN BALA','BEAUTY BALA','N/A','N/A','N/A','Male','2014-11-25','0','0','0','SATPAR','8801747111673','6A5','6965277.jpg',NULL),(3538,6,'Class Six','A',6,'AISHI MONDAL','BIBHUTI MONDAL','BINA MONDAL','N/A','N/A','N/A','Female','2012-03-10','0','0','0','SATPAR','8801739571951','6A6','6965278.jpg',NULL),(3539,6,'Class Six','A',7,'MOU MONDAL','BIBHUTI MONDAL','BINA MONDAL','N/A','N/A','N/A','Female','2012-12-30','0','0','0','SATPAR','8801739571951','6A7','6965279.jpg',NULL),(3540,6,'Class Six','A',8,'ANKITA MONDAL','ARUN MONDAL','MUKTA RANI','N/A','N/A','N/A','Female','2012-11-14','0','0','0','SATPAR','8801740822904','6A8','6965280.jpg',NULL),(3541,6,'Class Six','A',9,'TAMA BISWAS','TAPAN BISWAS','JWELY BISWAS','N/A','N/A','N/A','Female','2013-01-01','0','0','0','SATPAR','8801793622687','6A9','6965281.jpg',NULL),(3542,6,'Class Six','A',10,'LIKHAN BALA','LITAN BALA','LOVELY ROY','N/A','N/A','N/A','Male','2013-12-16','0','0','0','SATPAR','8801715290905','6A10','6965282.jpg',NULL),(3543,6,'Class Six','A',11,'RATAN BALA','JHANTU BALA','BEAUTY BALA','N/A','N/A','N/A','Male','2013-10-10','0','0','0','SATPAR','8801758823018','6A11','6965283.jpg',NULL),(3544,6,'Class Six','A',12,'PRINCE BISWAS','UJJWAL BISWAS','SWAPNA DHALI','N/A','N/A','N/A','Male','2011-08-20','0','0','0','SATPAR','880193982750','6A12','6965284.jpg',NULL),(3545,6,'Class Six','A',13,'GOURAB BAIN','GOBINDA BAIN','GITA BAIN','N/A','N/A','N/A','Male','2011-09-01','0','0','0','SATPAR','8801744528336','6A13','6965285.jpg',NULL),(3546,6,'Class Six','A',14,'HIRAOK BISWAS','DAWAL BISWAS','LAKI MONDAL','N/A','N/A','N/A','Male','2012-12-25','0','0','0','SATPAR','8801778912678','6A14','6965286.jpg',NULL),(3547,6,'Class Six','A',15,'TIRTHA BALA','TANU BALA','KANAN MONDAL','N/A','N/A','N/A','Male','2012-11-25','0','0','0','SATPAR','8801716251260','6A15','6965287.jpg',NULL),(3548,6,'Class Six','A',16,'DEV BAKCHI','DAYAMOY BAKCHI','PURNIMA BISWAS','N/A','N/A','N/A','Male','2012-12-25','0','0','0','SATPAR','8801745703339','6A16','6965288.jpg',NULL),(3549,6,'Class Six','A',17,'LIKHON BISWAS','LITON BISWAS','ETI BISWAS','N/A','N/A','N/A','Male','1969-12-31','0','0','0','SATPAR','8801793338156','6A17','6965289.jpg',NULL),(3550,6,'Class Six','A',18,'SNEGDHA MONDAL','SAMIR MONDAL','PALLABI MONDAL','N/A','N/A','N/A','Female','2012-12-30','0','0','0','SATPAR','8801724158752','6A18','6965290.jpg',NULL),(3551,6,'Class Six','A',20,'ANTU BALA','APURBA BALA','MITALI BISWAS','N/A','N/A','N/A','Male','2012-12-25','0','0','0','SATPAR','8801646581995','6A20','6965291.jpg',NULL),(3552,6,'Class Six','A',21,'ATHOY BALA','MANGAL BALA','LUCKY BALA','N/A','N/A','N/A','Female','2012-12-27','0','0','0','SATPAR','8801627299303','6A21','6965292.jpg',NULL),(3553,6,'Class Six','A',22,'CHANDAN GAYEN','TAPAN GAYEN','LAKSHMI GAYEN','N/A','N/A','N/A','Male','2010-12-25','0','0','0','SATPAR','8801709927110','6A22','6965293.jpg',NULL),(3554,6,'Class Six','A',23,'RIPA MONDAL','KAPIL MONDAL','SHUKLA MONDAL','N/A','N/A','N/A','Female','2012-12-31','0','0','0','SATPAR','8801787551723','6A23','6965294.jpg',NULL),(3555,6,'Class Six','A',24,'RIDI BALA','SWAPAN BALA','RADHIKA BALA','N/A','N/A','N/A','Female','2011-01-05','0','0','0','SATPAR','8801981399586','6A24','6965295.jpg',NULL),(3556,6,'Class Six','A',25,'ARPON BAKCHI','ARINDAM BAKCHI','TANDRA BAKCHI','N/A','N/A','N/A','Male','2012-12-28','0','0','0','SATPAR','8801760808461','6A25','6965296.jpg',NULL),(3557,6,'Class Six','A',26,'LEON MONDAL','PROSHANTA MONDAL','LABHALI MONDAL','N/A','N/A','N/A','Male','2012-12-28','0','0','0','SATPAR','8801732245249','6A26','6965297.jpg',NULL),(3558,6,'Class Six','A',27,'SHIPAN BAKCHI','HAROSIT BAKCHI','GHUMA RANI BAKCHE','N/A','N/A','N/A','Male','2012-12-28','0','0','0','SATPAR','8801734696047','6A27','6965298.jpg',NULL),(3559,6,'Class Six','A',28,'BAPAN BAKCHI','DEBABRATA BAKCHI','SHILPI BISWAS','N/A','N/A','N/A','Male','2012-12-28','0','0','0','SATPAR','8801777300798','6A28','6965299.jpg',NULL),(3560,6,'Class Six','A',29,'ROSE BISWAS','MILTON BISWAS','SMRITI MONDAL','N/A','N/A','N/A','Female','2010-08-21','0','0','0','SATPAR','8801738712895','6A29','6965300.jpg',NULL),(3561,6,'Class Six','A',30,'RIJU BISWAS','MILTON BISWAS','SMRITI MONDAL','N/A','N/A','N/A','Female','2011-06-12','0','0','0','SATPAR','8801928894777','6A30','6965301.jpg',NULL),(3562,6,'Class Six','A',31,'HIMEL BISWAS','MADHAB BISWAS','RATNA BISWAS','N/A','N/A','N/A','Male','2013-10-12','0','0','0','SATPAR','8801310685911','6A31','6965302.jpg',NULL),(3563,6,'Class Six','A',33,'RAJ BALA','SANKAR BALA','BABITA BALA','N/A','N/A','N/A','Male','2012-12-31','0','0','0','SATPAR','8801978105152','6A33','6965303.jpg',NULL),(3564,6,'Class Six','A',34,'RAKHI BALA','BIJY BALA','UNNATI MAJUMDAR','N/A','N/A','N/A','Female','2012-12-20','0','0','0','SATPAR','8801746242691','6A34','6965304.jpg',NULL),(3565,6,'Class Six','A',37,'JITU MONDAL','HARIDASH MONDAL','BANI MONDAL','N/A','N/A','N/A','Female','2013-01-01','0','0','0','SATPAR','8801768806356','6A37','6965305.jpg',NULL),(3566,6,'Class Six','A',38,'PRITY MONDAL','GOTAM MONDAL','LAXMI MONDAL','N/A','N/A','N/A','Female','2012-09-12','0','0','0','SATPAR','8801798690361','6A38','6965306.jpg',NULL),(3567,6,'Class Six','A',39,'AHONA BISWAS','SARJIT BISWAS','ANJU BISWAS','N/A','N/A','N/A','Female','2012-12-30','0','0','0','SATPAR','8801736777715','6A39','6965307.jpg',NULL),(3568,6,'Class Six','A',40,'sangram dhali','buddheb dhali','bulti dhali','N/A','N/A','N/A','Male','2013-01-20','0','0','0','SATPAR','8801752879315','6A40','6965309.jpg',NULL),(3569,6,'Class Six','A',41,'APURBA BISWAS','TUSHAR BISWAS','SANPA BISWAS','N/A','N/A','N/A','Male','2012-04-05','0','0','0','SATPAR','8801793927001','6A41','6965310.jpg',NULL),(3570,6,'Class Six','A',42,'PRANTO BHAKTA','PROSANTA BHAKTA','RAMA BHAKTA','N/A','N/A','N/A','Male','2013-11-14','0','0','0','SATPAR','8801798081204','6A42','6965311.jpg',NULL),(3571,6,'Class Six','A',43,'ESITA THAKUR','HIMANGSU THAKUR','JUTHIKA THAKUR','N/A','N/A','N/A','Female','2013-01-01','0','0','0','SATPAR','8801735791715','6A43','6965312.jpg',NULL),(3572,6,'Class Six','A',44,'DIP BISWAS','AMIO KANTI BISWAS','SHILPY RANI BISWAS','N/A','N/A','N/A','Male','2013-11-17','0','0','0','SATPAR','8801703469222','6A44','6965313.jpg',NULL),(3573,6,'Class Six','A',45,'UPOMA BALA','REKAS BALA','MAYA BALA','N/A','N/A','N/A','Female','2012-11-21','0','0','0','SATPAR','8801776522050','6A45','6965314.jpg',NULL),(3574,6,'Class Six','A',47,'TANNI BISWAS','TANMAY KANTI BISWAS','BINA BISWAS','N/A','N/A','N/A','Female','2012-12-25','0','0','0','SATPAR','8801724727497','6A47','6965315.jpg',NULL),(3575,6,'Class Six','A',48,'EMLI BISWAS','MANTU BISWAS','SABITA BISWAS','N/A','N/A','N/A','Female','2012-12-30','0','0','0','SATPAR','8801758921376','6A48','6965316.jpg',NULL),(3576,6,'Class Six','A',49,'CHANDON BALA','SHEKHAR BALA','URMILA BALA','N/A','N/A','N/A','Male','2012-12-25','0','0','0','SATPAR','8801706191836','6A49','6965317.jpg',NULL),(3577,6,'Class Six','A',50,'SATHI BALA','SRIPOTI BALA','SHUKLA BALA','N/A','N/A','N/A','Female','2011-12-28','0','0','0','SATPAR','8801758921584','6A50','6965318.jpg',NULL),(3578,6,'Class Six','A',51,'ANI BALA','BALARAM BALA','KAKALI BALA','N/A','N/A','N/A','Female','2013-09-05','0','0','0','SATPAR','8801945608860','6A51','6965319.jpg',NULL),(3579,6,'Class Six','A',52,'MONI BALA','MOHANANDA BALA','SIMA BISWAS','N/A','N/A','N/A','Female','2012-07-10','0','0','0','SATPAR','8801716251260','6A52','6965320.jpg',NULL),(3580,6,'Class Six','A',53,'LIKHAN BALA','TAPAN KUMAR BALA','MITA BISWAS','N/A','N/A','N/A','Male','2012-11-11','0','0','0','SATPAR','8801723999969','6A53','6965321.jpg',NULL),(3581,6,'Class Six','A',54,'JOY BISWAS','SUNIL BISWAS','SIBANI BISWAS','N/A','N/A','N/A','Male','2013-01-01','0','0','0','SATPAR','8801328094053','6A54','6965322.jpg',NULL),(3582,7,'Class Seven','A',54,'SHAPNO CHOWDHURI','SHEKHOR CHANDRA CHOWDHURI','PROTIVA CHOWDHURI','N/A','N/A','N/A','Male','2011-11-08','0','0','0','SATPAR','8801716251260','7A54','6965361.jpg',NULL),(3583,6,'Class Six','A',19,'Ananya Biswas','Makhan Biswas','Bina Biswas','N/A','N/A','N/A','Female','2010-12-25','0','0','0','SATPAR','8801974825982','6A19','6965431.jpg',NULL),(3584,6,'Class Six','B',1,'Md. Shakil Ahmed','MD ABDUR RAZZAK','MST SHABERA BEGUM','মোঃ শাকিল আহমেদ।','মোঃ আব্দুর রাজ্জাক','মোছাঃ ছাবেরা বেগম','MALE','2000-03-07','20008517328104284','0','0','RANGPUR','01813236615','6B1','IMG_20230513_0006.jpg',NULL),(3585,11,'Class Eleven','Science',2024101,'MD. SHAKIL AHMED','MD. ABDUR RAZZAK','MST. SHABERA BEGUM','Not Avliable','Not Avliable','Not Avliable','Male','2000-03-07','0','0','0','','01813236615','11Science2024101','IMG_.png',NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `student` with 264 row(s)
--

--
-- Table structure for table `studentlogin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `plainpass` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentlogin`
--

LOCK TABLES `studentlogin` WRITE;
/*!40000 ALTER TABLE `studentlogin` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `studentlogin` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `studentlogin` with 0 row(s)
--

--
-- Table structure for table `studentpayment`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentpayment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pcatid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `stuname` varchar(255) NOT NULL,
  `des` varchar(1200) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `totalpay` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `puniid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `puniid` (`puniid`)
) ENGINE=InnoDB AUTO_INCREMENT=467 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentpayment`
--

LOCK TABLES `studentpayment` WRITE;
/*!40000 ALTER TABLE `studentpayment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `studentpayment` VALUES (2,1,6,'Mollika','6Mollika2',2,'Ummia Moriym','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika2'),(3,1,6,'Mollika','6Mollika3',3,'MUSFIKA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika3'),(4,1,6,'Mollika','6Mollika4',4,'Jannatul Tazri','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika4'),(5,1,6,'Mollika','6Mollika5',5,'TASMIA KHANAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika5'),(6,1,6,'Mollika','6Mollika6',6,'MD HABIB SHEIKH','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika6'),(7,1,6,'Mollika','6Mollika7',7,'TASMIM AFROJ  KHADIJA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika7'),(8,1,6,'Mollika','6Mollika8',8,'KAREMA KHANAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika8'),(9,1,6,'Mollika','6Mollika9',9,'FARDIN HASAN AYON','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika9'),(10,1,6,'Mollika','6Mollika10',10,'MD JISAN SHEIKH','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika10'),(11,1,6,'Mollika','6Mollika11',11,'MAINUL ISLAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika11'),(12,1,6,'Mollika','6Mollika12',12,'BAISHAKHI','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika12'),(13,1,6,'Mollika','6Mollika13',13,'MD FAISAL HASAN RAJ','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika13'),(14,1,6,'Mollika','6Mollika14',14,'BARIDHY AKTER','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika14'),(15,1,6,'Mollika','6Mollika15',15,'RUBAIYA KHANOM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika15'),(16,1,6,'Mollika','6Mollika16',16,'HUSAIMA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika16'),(17,1,6,'Mollika','6Mollika17',17,'MARIA ISLAM KARIMA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika17'),(18,1,6,'Mollika','6Mollika18',18,'ELMA KHANAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika18'),(19,1,6,'Mollika','6Mollika19',19,'Tasfia Tahsin','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika19'),(20,1,6,'Mollika','6Mollika20',20,'MD IBRAHIM MOLLA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika20'),(21,1,6,'Mollika','6Mollika21',21,'MIM KHANOM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika21'),(22,1,6,'Mollika','6Mollika22',22,'TASFIYA HOSSAIN','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika22'),(23,1,6,'Mollika','6Mollika23',23,'NAZMUL HASAN NASIM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika23'),(24,1,6,'Mollika','6Mollika24',24,'MD ALAMIN SARDER','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika24'),(25,1,6,'Mollika','6Mollika25',25,'MD HABIB MOLLA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika25'),(26,1,6,'Mollika','6Mollika26',26,'MAHEYA KHANAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika26'),(27,1,6,'Mollika','6Mollika27',27,'RUMAN SHEIKH','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika27'),(28,1,6,'Mollika','6Mollika28',28,'ARMIM KHANAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika28'),(29,1,6,'Mollika','6Mollika29',29,'MABIYA AKTER BORSA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika29'),(30,1,6,'Mollika','6Mollika30',30,'TAMANNA AKTER','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika30'),(31,1,6,'Mollika','6Mollika31',31,'MST HACIYA KHATUN  NILA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika31'),(32,1,6,'Mollika','6Mollika32',32,'TAMIM AHMMED ARKO','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika32'),(33,1,6,'Mollika','6Mollika33',33,'Md. Tashin Hasan','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika33'),(34,1,6,'Mollika','6Mollika34',34,'NIPA BISWAS','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika34'),(35,1,6,'Mollika','6Mollika35',35,'SURIYA  SNAHA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika35'),(36,1,6,'Mollika','6Mollika36',36,'Halima Tus Sadia','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika36'),(37,1,6,'Mollika','6Mollika37',37,'MD ZIHAD BISWAS','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika37'),(38,1,6,'Mollika','6Mollika38',38,'SANJIDA','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika38'),(39,1,6,'Mollika','6Mollika39',39,'Anisha Khanom','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika39'),(40,1,6,'Mollika','6Mollika40',40,'SRABON BISWAS','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika40'),(41,1,6,'Mollika','6Mollika125',125,'S M RHYME AHASAN  POLOK','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika125'),(42,1,6,'Mollika','6Mollika126',126,'MISS SUMAIYA KHANAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika126'),(43,1,6,'Mollika','6Mollika127',127,'SUMIA KAZI','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika127'),(44,1,6,'Mollika','6Mollika523',523,'FATEMA ISLAM','Admission Fee',100,0,100,'Unpaid','2024-01-01','16Mollika523'),(94,1,6,'Mollika','6Mollika1',1,'Md. Sizan Rahman Sarder','Admission Fee',100,120,-20,'Unpaid','2024-01-01','16Mollika1'),(95,1,7,'A','7A5',5,'DURJOY GHOSH','Admission Fee',200,200,0,'Paid','2024-06-21','17A5'),(96,2,7,'A','7A5',5,'DURJOY GHOSH','Session Fee',500,500,0,'Paid','2024-06-21','27A5'),(97,3,7,'A','7A5',5,'DURJOY GHOSH','Regestration Fee',400,400,0,'Paid','2024-06-21','37A5'),(142,1,11,'Science','11Science102',102,'No Data ON BRIS BD','Admission Fee',200,100,100,'Unpaid','2024-07-01','111Science102'),(143,1,11,'Science','11Science103',103,'No Data ON BRIS BD','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science103'),(145,1,11,'Science','11Science106',106,'No Data ON BRIS BD','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science106'),(146,1,11,'Science','11Science107',107,'SAIKAT MONDOL','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science107'),(147,1,11,'Science','11Science108',108,'No Data ON BRIS BD','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science108'),(148,1,11,'Science','11Science109',109,'BADON MAZUMDER','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science109'),(149,1,11,'Science','11Science110',110,'Arajit Biswas','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science110'),(150,1,11,'Science','11Science111',111,'Subuj Mondol','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science111'),(151,1,11,'Science','11Science112',112,'No Data ON BRIS BD','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science112'),(152,1,11,'Science','11Science113',113,'JOY BAIDYA','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science113'),(153,1,11,'Science','11Science114',114,'DIBAKOR BISWAS','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science114'),(154,1,11,'Science','11Science115',115,'চয়ন ভক্ত','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science115'),(155,1,11,'Science','11Science116',116,'দিপ্ত সরকার','Admission Fee',200,0,200,'Unpaid','2024-06-24','111Science116'),(156,8,11,'Arts','11Arts301',301,'lija barai','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts301'),(157,8,11,'Arts','11Arts302',302,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts302'),(158,8,11,'Arts','11Arts303',303,'Meghla Biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts303'),(159,8,11,'Arts','11Arts304',304,'puja','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts304'),(160,8,11,'Arts','11Arts305',305,'No Data ON BRIS BD','Sallary- January',500,500,0,'Paid','2024-06-26','811Arts305'),(161,8,11,'Arts','11Arts306',306,'arpita baruri','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts306'),(162,8,11,'Arts','11Arts307',307,'SITU MANDAL','Sallary- January',500,500,0,'Paid','2024-06-26','811Arts307'),(163,8,11,'Arts','11Arts308',308,'MITU MRIDHA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts308'),(164,8,11,'Arts','11Arts309',309,'মৌ মন্ডল','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts309'),(165,8,11,'Arts','11Arts310',310,'DIPIKA MANDAL','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts310'),(166,8,11,'Arts','11Arts311',311,'Palashi','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts311'),(167,8,11,'Arts','11Arts312',312,'sejuli','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts312'),(168,8,11,'Arts','11Arts313',313,'Riya Biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts313'),(169,8,11,'Arts','11Arts314',314,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts314'),(170,8,11,'Arts','11Arts315',315,'TANNI ROY','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts315'),(171,8,11,'Arts','11Arts316',316,'Luxmi','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts316'),(172,8,11,'Arts','11Arts317',317,'BANNA BARURY','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts317'),(173,8,11,'Arts','11Arts319',319,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts319'),(174,8,11,'Arts','11Arts320',320,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts320'),(175,8,11,'Arts','11Arts321',321,'সাথী মন্ডল','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts321'),(176,8,11,'Arts','11Arts322',322,'চৈতী রায়','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts322'),(177,8,11,'Arts','11Arts323',323,'JUI BALA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts323'),(178,8,11,'Arts','11Arts324',324,'ঝর্না সরকার','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts324'),(179,8,11,'Arts','11Arts325',325,'মিতালী বর','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts325'),(180,8,11,'Arts','11Arts326',326,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts326'),(181,8,11,'Arts','11Arts327',327,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts327'),(182,8,11,'Arts','11Arts328',328,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts328'),(183,8,11,'Arts','11Arts329',329,'LATA  BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts329'),(184,8,11,'Arts','11Arts330',330,'AMBIKA BARURI','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts330'),(185,8,11,'Arts','11Arts331',331,'Konika','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts331'),(186,8,11,'Arts','11Arts332',332,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts332'),(187,8,11,'Arts','11Arts333',333,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts333'),(188,8,11,'Arts','11Arts334',334,'Chandana Mridha','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts334'),(189,8,11,'Arts','11Arts335',335,'অনিতা বাইন','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts335'),(190,8,11,'Arts','11Arts336',336,'Antra Mondal','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts336'),(191,8,11,'Arts','11Arts337',337,'Rumki Mondal','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts337'),(192,8,11,'Arts','11Arts338',338,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts338'),(193,8,11,'Arts','11Arts339',339,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts339'),(194,8,11,'Arts','11Arts340',340,'MEGNA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts340'),(195,8,11,'Arts','11Arts341',341,'TAMA DATTA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts341'),(196,8,11,'Arts','11Arts342',342,'MITA BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts342'),(197,8,11,'Arts','11Arts343',343,'RAKHI MOULIK','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts343'),(198,8,11,'Arts','11Arts344',344,'MEGHLA MOULIK','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts344'),(199,8,11,'Arts','11Arts345',345,'DIPA ADHIKARY','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts345'),(200,8,11,'Arts','11Arts346',346,'DIPU MOULIK','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts346'),(201,8,11,'Arts','11Arts347',347,'ESHA MOULIK','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts347'),(202,8,11,'Arts','11Arts348',348,'LABANI MAJUMDAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts348'),(203,8,11,'Arts','11Arts349',349,'RITU BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts349'),(204,8,11,'Arts','11Arts350',350,'AYSHE MOULIK','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts350'),(205,8,11,'Arts','11Arts351',351,'CHUMKI BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts351'),(206,8,11,'Arts','11Arts352',352,'LATA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts352'),(207,8,11,'Arts','11Arts353',353,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts353'),(208,8,11,'Arts','11Arts354',354,'UP','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts354'),(209,8,11,'Arts','11Arts355',355,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts355'),(210,8,11,'Arts','11Arts356',356,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts356'),(211,8,11,'Arts','11Arts357',357,'LIJA BALA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts357'),(212,8,11,'Arts','11Arts358',358,'ESHITA BAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts358'),(213,8,11,'Arts','11Arts359',359,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts359'),(214,8,11,'Arts','11Arts360',360,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts360'),(215,8,11,'Arts','11Arts361',361,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts361'),(216,8,11,'Arts','11Arts362',362,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts362'),(217,8,11,'Arts','11Arts363',363,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts363'),(218,8,11,'Arts','11Arts364',364,'RE','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts364'),(219,8,11,'Arts','11Arts365',365,'PUJA PODDAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts365'),(220,8,11,'Arts','11Arts366',366,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts366'),(221,8,11,'Arts','11Arts367',367,'bana','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts367'),(222,8,11,'Arts','11Arts368',368,'MORIAM JAHAN LUNA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts368'),(223,8,11,'Arts','11Arts369',369,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts369'),(224,8,11,'Arts','11Arts370',370,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts370'),(225,8,11,'Arts','11Arts371',371,'ARPITA RANI BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts371'),(226,8,11,'Arts','11Arts372',372,'MOU BALA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts372'),(227,8,11,'Arts','11Arts373',373,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts373'),(228,8,11,'Arts','11Arts374',374,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts374'),(229,8,11,'Arts','11Arts375',375,'জ্যোতি বালা','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts375'),(230,8,11,'Arts','11Arts376',376,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts376'),(231,8,11,'Arts','11Arts377',377,'OISHI BAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts377'),(232,8,11,'Arts','11Arts378',378,'RUNA BAIN','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts378'),(233,8,11,'Arts','11Arts379',379,'CHANDRA BAIDYA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts379'),(234,8,11,'Arts','11Arts380',380,'MOUMITA HALDER','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts380'),(235,8,11,'Arts','11Arts381',381,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts381'),(236,8,11,'Arts','11Arts382',382,'POPY MONDOL','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts382'),(237,8,11,'Arts','11Arts386',386,'লিমন হালদার','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts386'),(238,8,11,'Arts','11Arts387',387,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts387'),(239,8,11,'Arts','11Arts388',388,'antar biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts388'),(240,8,11,'Arts','11Arts389',389,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts389'),(241,8,11,'Arts','11Arts390',390,'PICKLU BAIDYA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts390'),(242,8,11,'Arts','11Arts391',391,'antor sarker','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts391'),(243,8,11,'Arts','11Arts392',392,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts392'),(244,8,11,'Arts','11Arts393',393,'Akash Barai','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts393'),(245,8,11,'Arts','11Arts394',394,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts394'),(246,8,11,'Arts','11Arts395',395,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts395'),(247,8,11,'Arts','11Arts396',396,'Sabuj Majumder','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts396'),(248,8,11,'Arts','11Arts397',397,'noyon biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts397'),(249,8,11,'Arts','11Arts398',398,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts398'),(250,8,11,'Arts','11Arts399',399,'sorav','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts399'),(251,8,11,'Arts','11Arts400',400,'নয়ন ঢালী','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts400'),(252,8,11,'Arts','11Arts401',401,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts401'),(253,8,11,'Arts','11Arts402',402,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts402'),(254,8,11,'Arts','11Arts403',403,'SUMON BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts403'),(255,8,11,'Arts','11Arts404',404,'SOURAV BALA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts404'),(256,8,11,'Arts','11Arts405',405,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts405'),(257,8,11,'Arts','11Arts406',406,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts406'),(258,8,11,'Arts','11Arts407',407,'ARGHA BAYRAGI','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts407'),(259,8,11,'Arts','11Arts408',408,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts408'),(260,8,11,'Arts','11Arts409',409,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts409'),(261,8,11,'Arts','11Arts410',410,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts410'),(262,8,11,'Arts','11Arts411',411,'amar','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts411'),(263,8,11,'Arts','11Arts412',412,'Antor','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts412'),(264,8,11,'Arts','11Arts413',413,'বিপ্লব মন্ডল','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts413'),(265,8,11,'Arts','11Arts414',414,'NAYAN MAJUMDAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts414'),(266,8,11,'Arts','11Arts415',415,'JON','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts415'),(267,8,11,'Arts','11Arts416',416,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts416'),(268,8,11,'Arts','11Arts417',417,'CHA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts417'),(269,8,11,'Arts','11Arts418',418,'JOY BAKCHI','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts418'),(270,8,11,'Arts','11Arts419',419,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts419'),(271,8,11,'Arts','11Arts420',420,'CHAYAN','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts420'),(272,8,11,'Arts','11Arts421',421,'rudra','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts421'),(273,8,11,'Arts','11Arts422',422,'জিৎ মন্ডল','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts422'),(274,8,11,'Arts','11Arts423',423,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts423'),(275,8,11,'Arts','11Arts424',424,'APON MAJUMDER','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts424'),(276,8,11,'Arts','11Arts425',425,'PRASENJIT THAKUR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts425'),(277,8,11,'Arts','11Arts426',426,'SAJIB  MANDAL','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts426'),(278,8,11,'Arts','11Arts427',427,'kinkon bala','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts427'),(279,8,11,'Arts','11Arts428',428,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts428'),(280,8,11,'Arts','11Arts429',429,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts429'),(281,8,11,'Arts','11Arts430',430,'RONI SARKAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts430'),(282,8,11,'Arts','11Arts431',431,'jit mandal','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts431'),(283,8,11,'Arts','11Arts432',432,'Tarok Biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts432'),(284,8,11,'Arts','11Arts433',433,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts433'),(285,8,11,'Arts','11Arts435',435,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts435'),(286,8,11,'Arts','11Arts436',436,'benisan baidya','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts436'),(287,8,11,'Arts','11Arts437',437,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts437'),(288,8,11,'Arts','11Arts438',438,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts438'),(289,8,11,'Arts','11Arts439',439,'nayan baidya','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts439'),(290,8,11,'Arts','11Arts440',440,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts440'),(291,8,11,'Arts','11Arts441',441,'LIKHAN BARURY','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts441'),(292,8,11,'Arts','11Arts442',442,'HIRAK BAIDYA','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts442'),(293,8,11,'Arts','11Arts443',443,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts443'),(294,8,11,'Arts','11Arts444',444,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts444'),(295,8,11,'Arts','11Arts445',445,'badhan gain','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts445'),(296,8,11,'Arts','11Arts446',446,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts446'),(297,8,11,'Arts','11Arts447',447,'Anik Biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts447'),(298,8,11,'Arts','11Arts448',448,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts448'),(299,8,11,'Arts','11Arts449',449,'rasamay baidya','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts449'),(300,8,11,'Arts','11Arts450',450,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts450'),(301,8,11,'Arts','11Arts451',451,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts451'),(302,8,11,'Arts','11Arts452',452,'rakesh majumder','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts452'),(303,8,11,'Arts','11Arts453',453,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts453'),(304,8,11,'Arts','11Arts454',454,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts454'),(305,8,11,'Arts','11Arts455',455,'DIP MANDAL','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts455'),(306,8,11,'Arts','11Arts456',456,'বিজন মন্ডল','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts456'),(307,8,11,'Arts','11Arts457',457,'HITLAR BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts457'),(308,8,11,'Arts','11Arts458',458,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts458'),(309,8,11,'Arts','11Arts459',459,'অমরেশ তালুকদার','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts459'),(310,8,11,'Arts','11Arts461',461,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts461'),(311,8,11,'Arts','11Arts462',462,'RANO','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts462'),(312,8,11,'Arts','11Arts463',463,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts463'),(313,8,11,'Arts','11Arts464',464,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts464'),(314,8,11,'Arts','11Arts465',465,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts465'),(315,8,11,'Arts','11Arts466',466,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts466'),(316,8,11,'Arts','11Arts467',467,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts467'),(317,8,11,'Arts','11Arts468',468,'SAMPAD BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts468'),(318,8,11,'Arts','11Arts469',469,'Sajib Biswas','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts469'),(319,8,11,'Arts','11Arts470',470,'SHUVO BAIRAGI','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts470'),(320,8,11,'Arts','11Arts471',471,'gfhgfh','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts471'),(321,8,11,'Arts','11Arts472',472,'Dweep Sarkar','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts472'),(322,8,11,'Arts','11Arts473',473,'Swadhin Bar','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts473'),(323,8,11,'Arts','11Arts474',474,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts474'),(324,8,11,'Arts','11Arts475',475,'সৈকত বর','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts475'),(325,8,11,'Arts','11Arts476',476,'AKASH GAIN','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts476'),(326,8,11,'Arts','11Arts477',477,'স্বাধীন হালদার','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts477'),(327,8,11,'Arts','11Arts478',478,'RATUL BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts478'),(328,8,11,'Arts','11Arts479',479,'JOY MONDAL','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts479'),(329,8,11,'Arts','11Arts481',481,'DBIP MANDAL','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts481'),(330,8,11,'Arts','11Arts482',482,'প্রমিত রায়','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts482'),(331,8,11,'Arts','11Arts483',483,'SUDWIP BISWAS','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts483'),(332,8,11,'Arts','11Arts484',484,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts484'),(333,8,11,'Arts','11Arts485',485,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts485'),(334,8,11,'Arts','11Arts486',486,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts486'),(335,8,11,'Arts','11Arts487',487,'RAJU SEN','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts487'),(336,8,11,'Arts','11Arts488',488,'DIP BAR','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts488'),(337,8,11,'Arts','11Arts489',489,'BI','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts489'),(338,8,11,'Arts','11Arts490',490,'nayan gain','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts490'),(339,8,11,'Arts','11Arts491',491,'স্বাধীন বৈদ্য','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts491'),(340,8,11,'Arts','11Arts498',498,'No Data ON BRIS BD','Sallary- January',500,0,500,'Unpaid','2024-06-26','811Arts498'),(341,8,11,'Science','11Science102',102,'No Data ON BRIS BD','Sallary- January',100,50,50,'Unpaid','2024-06-27','811Science102'),(342,8,11,'Science','11Science103',103,'No Data ON BRIS BD','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science103'),(344,8,11,'Science','11Science106',106,'No Data ON BRIS BD','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science106'),(345,8,11,'Science','11Science107',107,'SAIKAT MONDOL','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science107'),(346,8,11,'Science','11Science108',108,'No Data ON BRIS BD','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science108'),(347,8,11,'Science','11Science109',109,'BADON MAZUMDER','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science109'),(348,8,11,'Science','11Science110',110,'Arajit Biswas','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science110'),(349,8,11,'Science','11Science111',111,'Subuj Mondol','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science111'),(350,8,11,'Science','11Science112',112,'No Data ON BRIS BD','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science112'),(351,8,11,'Science','11Science113',113,'JOY BAIDYA','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science113'),(352,8,11,'Science','11Science114',114,'DIBAKOR BISWAS','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science114'),(353,8,11,'Science','11Science115',115,'চয়ন ভক্ত','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science115'),(354,8,11,'Science','11Science116',116,'দিপ্ত সরকার','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science116'),(358,4,11,'Science','11Science105',105,'DRISTY DHALI','Form Fill-up',600,0,600,'Unpaid','2024-08-01','411Science105'),(367,1,11,'Science','11Science105',105,'DRISTY DHALI','Admission Fee',500,500,0,'Paid','2024-06-07','111Science105'),(368,2,11,'Science','11Science105',105,'DRISTY DHALI','Session Fee',700,700,0,'Paid','2024-06-07','211Science105'),(369,3,11,'Science','11Science105',105,'DRISTY DHALI','Regestration Fee',2000,2000,0,'Paid','2024-06-07','311Science105'),(370,1,11,'Arts','11Arts307',307,'SITU MANDAL','Admission Fee',1200,1200,0,'Paid','2024-06-29','111Arts307'),(371,2,11,'Arts','11Arts307',307,'SITU MANDAL','Session Fee',2000,2000,0,'Paid','2024-06-29','211Arts307'),(372,3,11,'Arts','11Arts307',307,'SITU MANDAL','Regestration Fee',2700,2700,0,'Paid','2024-06-29','311Arts307'),(373,4,11,'Arts','11Arts307',307,'SITU MANDAL','Form Fill-up',1000,1000,0,'Paid','2024-06-29','411Arts307'),(378,1,6,'A','6A1',1,'JUYAL HIRA','Admission Fee',1000,500,500,'Unpaid','2024-01-01','16A1'),(379,2,6,'A','6A1',1,'JUYAL HIRA','Session Fee',300,1000,-700,'Unpaid','2024-07-03','26A1'),(380,3,6,'A','6A1',1,'JUYAL HIRA','Regestration Fee',500,350,150,'Unpaid','2024-07-03','36A1'),(381,4,6,'A','6A1',1,'JUYAL HIRA','Form Fill-up',600,1450,-850,'Unpaid','2024-07-03','46A1'),(382,5,6,'A','6A1',1,'JUYAL HIRA','Half Yearly Exam Fee',200,0,200,'Unpaid','2024-07-03','56A1'),(385,8,11,'Science','11Science105',105,'DRISTY DHALI','Sallary- January',100,0,100,'Unpaid','2024-06-27','811Science105'),(402,6,6,'A','6A1',1,'SMITH BISWAS','Final Exam Fee',100,0,100,'Unpaid','2024-07-03','66A1'),(403,7,6,'A','6A1',1,'SMITH BISWAS','Electric bill',100,0,100,'Unpaid','2024-07-03','76A1'),(404,8,6,'A','6A1',1,'SMITH BISWAS','Sallary- January',50,0,50,'Unpaid','2024-07-03','86A1'),(405,9,6,'A','6A1',1,'SMITH BISWAS','Sallary- February',50,0,50,'Unpaid','2024-07-03','96A1'),(406,10,6,'A','6A1',1,'SMITH BISWAS','Sallary- March',50,0,50,'Unpaid','2024-07-03','106A1'),(407,11,6,'A','6A1',1,'SMITH BISWAS','Sallary- April',50,0,50,'Unpaid','2024-07-03','116A1'),(408,12,6,'A','6A1',1,'SMITH BISWAS','Sallary- May',50,0,50,'Unpaid','2024-07-03','126A1'),(409,13,6,'A','6A1',1,'SMITH BISWAS','Sallary- June',50,0,50,'Unpaid','2024-07-03','136A1'),(410,14,6,'A','6A1',1,'SMITH BISWAS','Sallary- July',50,0,50,'Unpaid','2024-07-03','146A1'),(411,15,6,'A','6A1',1,'SMITH BISWAS','Sallary- August',50,0,50,'Unpaid','2024-07-03','156A1'),(412,16,6,'A','6A1',1,'SMITH BISWAS','Sallary- Septembar',50,0,50,'Unpaid','2024-07-03','166A1'),(413,17,6,'A','6A1',1,'SMITH BISWAS','Sallary- Octobar',50,0,50,'Unpaid','2024-07-03','176A1'),(414,18,6,'A','6A1',1,'SMITH BISWAS','Sallary- November',50,0,50,'Unpaid','2024-07-03','186A1'),(415,19,6,'A','6A1',1,'SMITH BISWAS','Sallary- Decembar',50,0,50,'Unpaid','2024-07-03','196A1'),(416,20,6,'A','6A1',1,'SMITH BISWAS','Test Exam Fee',50,0,50,'Unpaid','2024-07-03','206A1'),(418,1,6,'A','6A2',2,'SHUVRODEB BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A2'),(419,1,6,'A','6A3',3,'AVISHRA MONDOL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A3'),(420,1,6,'A','6A4',4,'SRABANTI SARKAR','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A4'),(421,1,6,'A','6A5',5,'PALLAB BALA','Admission Fee',1000,1000,0,'Paid','2024-01-01','16A5'),(422,1,6,'A','6A6',6,'AISHI MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A6'),(423,1,6,'A','6A7',7,'MOU MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A7'),(424,1,6,'A','6A8',8,'ANKITA MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A8'),(425,1,6,'A','6A9',9,'TAMA BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A9'),(426,1,6,'A','6A10',10,'LIKHAN BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A10'),(427,1,6,'A','6A11',11,'RATAN BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A11'),(428,1,6,'A','6A12',12,'PRINCE BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A12'),(429,1,6,'A','6A13',13,'GOURAB BAIN','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A13'),(430,1,6,'A','6A14',14,'HIRAOK BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A14'),(431,1,6,'A','6A15',15,'TIRTHA BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A15'),(432,1,6,'A','6A16',16,'DEV BAKCHI','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A16'),(433,1,6,'A','6A17',17,'LIKHON BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A17'),(434,1,6,'A','6A18',18,'SNEGDHA MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A18'),(435,1,6,'A','6A19',19,'Ananya Biswas','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A19'),(436,1,6,'A','6A20',20,'ANTU BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A20'),(437,1,6,'A','6A21',21,'ATHOY BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A21'),(438,1,6,'A','6A22',22,'CHANDAN GAYEN','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A22'),(439,1,6,'A','6A23',23,'RIPA MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A23'),(440,1,6,'A','6A24',24,'RIDI BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A24'),(441,1,6,'A','6A25',25,'ARPON BAKCHI','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A25'),(442,1,6,'A','6A26',26,'LEON MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A26'),(443,1,6,'A','6A27',27,'SHIPAN BAKCHI','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A27'),(444,1,6,'A','6A28',28,'BAPAN BAKCHI','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A28'),(445,1,6,'A','6A29',29,'ROSE BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A29'),(446,1,6,'A','6A30',30,'RIJU BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A30'),(447,1,6,'A','6A31',31,'HIMEL BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A31'),(448,1,6,'A','6A33',33,'RAJ BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A33'),(449,1,6,'A','6A34',34,'RAKHI BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A34'),(450,1,6,'A','6A37',37,'JITU MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A37'),(451,1,6,'A','6A38',38,'PRITY MONDAL','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A38'),(452,1,6,'A','6A39',39,'AHONA BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A39'),(453,1,6,'A','6A40',40,'sangram dhali','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A40'),(454,1,6,'A','6A41',41,'APURBA BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A41'),(455,1,6,'A','6A42',42,'PRANTO BHAKTA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A42'),(456,1,6,'A','6A43',43,'ESITA THAKUR','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A43'),(457,1,6,'A','6A44',44,'DIP BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A44'),(458,1,6,'A','6A45',45,'UPOMA BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A45'),(459,1,6,'A','6A47',47,'TANNI BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A47'),(460,1,6,'A','6A48',48,'EMLI BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A48'),(461,1,6,'A','6A49',49,'CHANDON BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A49'),(462,1,6,'A','6A50',50,'SATHI BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A50'),(463,1,6,'A','6A51',51,'ANI BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A51'),(464,1,6,'A','6A52',52,'MONI BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A52'),(465,1,6,'A','6A53',53,'LIKHAN BALA','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A53'),(466,1,6,'A','6A54',54,'JOY BISWAS','Admission Fee',1000,0,1000,'Unpaid','2024-01-01','16A54');
/*!40000 ALTER TABLE `studentpayment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `studentpayment` with 336 row(s)
--

--
-- Table structure for table `sturegstatus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sturegstatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `regstatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=1145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sturegstatus`
--

LOCK TABLES `sturegstatus` WRITE;
/*!40000 ALTER TABLE `sturegstatus` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sturegstatus` VALUES (1,7,'A',86,'7A86',1),(12,7,'A',56,'7A56',1),(23,7,'A',65,'7A65',1),(34,7,'A',70,'7A70',1),(45,7,'A',91,'7A91',1),(56,7,'A',79,'7A79',1),(67,7,'A',67,'7A67',1),(78,7,'A',60,'7A60',1),(89,7,'A',59,'7A59',1),(100,7,'A',53,'7A53',1),(111,7,'A',63,'7A63',1),(122,7,'A',75,'7A75',1),(133,7,'A',17,'7A17',1),(144,7,'A',14,'7A14',1),(155,7,'A',33,'7A33',1),(166,7,'A',27,'7A27',1),(177,7,'A',5,'7A5',1),(188,7,'A',32,'7A32',1),(199,7,'A',28,'7A28',1),(210,7,'A',43,'7A43',1),(221,7,'A',45,'7A45',1),(232,7,'A',8,'7A8',1),(243,7,'A',111,'7A111',1),(254,7,'A',119,'7A119',1),(265,7,'A',140,'7A140',1),(276,7,'A',123,'7A123',1),(287,7,'A',128,'7A128',1),(298,7,'A',81,'7A81',1),(309,7,'A',133,'7A133',1),(320,7,'A',142,'7A142',1),(331,7,'A',132,'7A132',1),(342,7,'A',147,'7A147',1),(353,7,'A',118,'7A118',1),(364,7,'A',12,'7A12',1),(375,7,'A',29,'7A29',1),(386,7,'A',97,'7A97',1),(397,7,'A',94,'7A94',1),(408,7,'A',145,'7A145',1),(419,7,'A',107,'7A107',1),(430,7,'A',4,'7A4',1),(441,7,'A',105,'7A105',1),(452,7,'A',156,'7A156',1),(463,7,'A',66,'7A66',1),(474,7,'A',139,'7A139',1),(485,7,'A',18,'7A18',1),(496,7,'A',78,'7A78',1),(507,7,'A',103,'7A103',1),(518,7,'A',125,'7A125',1),(529,7,'A',130,'7A130',1),(540,7,'A',143,'7A143',1),(551,7,'A',148,'7A148',1),(562,7,'A',158,'7A158',1),(573,7,'A',159,'7A159',1),(584,7,'A',160,'7A160',1),(595,6,'A',1,'6A1',1),(606,6,'A',2,'6A2',1),(617,6,'A',3,'6A3',1),(628,6,'A',4,'6A4',1),(639,6,'A',5,'6A5',1),(650,6,'A',6,'6A6',1),(661,6,'A',7,'6A7',1),(672,6,'A',8,'6A8',1),(683,6,'A',9,'6A9',1),(694,6,'A',10,'6A10',1),(705,6,'A',11,'6A11',1),(716,6,'A',12,'6A12',1),(727,6,'A',13,'6A13',1),(738,6,'A',14,'6A14',1),(749,6,'A',15,'6A15',1),(760,6,'A',16,'6A16',1),(771,6,'A',17,'6A17',1),(782,6,'A',18,'6A18',1),(793,6,'A',20,'6A20',1),(804,6,'A',21,'6A21',1),(815,6,'A',22,'6A22',1),(826,6,'A',23,'6A23',1),(837,6,'A',24,'6A24',1),(848,6,'A',25,'6A25',1),(859,6,'A',26,'6A26',1),(870,6,'A',27,'6A27',1),(881,6,'A',28,'6A28',1),(892,6,'A',29,'6A29',1),(903,6,'A',30,'6A30',1),(914,6,'A',31,'6A31',1),(925,6,'A',33,'6A33',1),(936,6,'A',34,'6A34',1),(947,6,'A',37,'6A37',1),(958,6,'A',38,'6A38',1),(969,6,'A',39,'6A39',1),(980,6,'A',40,'6A40',1),(991,6,'A',41,'6A41',1),(1002,6,'A',42,'6A42',1),(1013,6,'A',43,'6A43',1),(1024,6,'A',44,'6A44',1),(1035,6,'A',45,'6A45',1),(1046,6,'A',47,'6A47',1),(1057,6,'A',48,'6A48',1),(1068,6,'A',49,'6A49',1),(1079,6,'A',50,'6A50',1),(1090,6,'A',51,'6A51',1),(1101,6,'A',52,'6A52',1),(1112,6,'A',53,'6A53',1),(1123,6,'A',54,'6A54',1),(1134,6,'A',19,'6A19',1);
/*!40000 ALTER TABLE `sturegstatus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sturegstatus` with 104 row(s)
--

--
-- Table structure for table `sturegsubject`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sturegsubject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `substatus` int(11) NOT NULL,
  `unisubstatus` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unisubstatus` (`unisubstatus`)
) ENGINE=InnoDB AUTO_INCREMENT=1145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sturegsubject`
--

LOCK TABLES `sturegsubject` WRITE;
/*!40000 ALTER TABLE `sturegsubject` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sturegsubject` VALUES (1,7,'A',86,'7A86',1,'বাংলা',1,'7A861'),(2,7,'A',86,'7A86',2,'English',1,'7A862'),(3,7,'A',86,'7A86',3,'গণিত',1,'7A863'),(4,7,'A',86,'7A86',4,'বিজ্ঞান',1,'7A864'),(5,7,'A',86,'7A86',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A865'),(6,7,'A',86,'7A86',6,'ডিজিটাল প্রযুক্তি',1,'7A866'),(7,7,'A',86,'7A86',7,'স্বাস্থ্য সুরক্ষা',1,'7A867'),(8,7,'A',86,'7A86',8,'জীবন ও জীবিকা',1,'7A868'),(9,7,'A',86,'7A86',9,'শিল্প ও সংস্কৃতি',1,'7A869'),(10,7,'A',86,'7A86',10,'ইসলাম শিক্ষা',1,'7A8610'),(11,7,'A',86,'7A86',11,'হিন্দুধর্ম শিক্ষা',1,'7A8611'),(12,7,'A',56,'7A56',1,'বাংলা',1,'7A561'),(13,7,'A',56,'7A56',2,'English',1,'7A562'),(14,7,'A',56,'7A56',3,'গণিত',1,'7A563'),(15,7,'A',56,'7A56',4,'বিজ্ঞান',1,'7A564'),(16,7,'A',56,'7A56',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A565'),(17,7,'A',56,'7A56',6,'ডিজিটাল প্রযুক্তি',1,'7A566'),(18,7,'A',56,'7A56',7,'স্বাস্থ্য সুরক্ষা',1,'7A567'),(19,7,'A',56,'7A56',8,'জীবন ও জীবিকা',1,'7A568'),(20,7,'A',56,'7A56',9,'শিল্প ও সংস্কৃতি',1,'7A569'),(21,7,'A',56,'7A56',10,'ইসলাম শিক্ষা',1,'7A5610'),(22,7,'A',56,'7A56',11,'হিন্দুধর্ম শিক্ষা',1,'7A5611'),(23,7,'A',65,'7A65',1,'বাংলা',1,'7A651'),(24,7,'A',65,'7A65',2,'English',1,'7A652'),(25,7,'A',65,'7A65',3,'গণিত',1,'7A653'),(26,7,'A',65,'7A65',4,'বিজ্ঞান',1,'7A654'),(27,7,'A',65,'7A65',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A655'),(28,7,'A',65,'7A65',6,'ডিজিটাল প্রযুক্তি',1,'7A656'),(29,7,'A',65,'7A65',7,'স্বাস্থ্য সুরক্ষা',1,'7A657'),(30,7,'A',65,'7A65',8,'জীবন ও জীবিকা',1,'7A658'),(31,7,'A',65,'7A65',9,'শিল্প ও সংস্কৃতি',1,'7A659'),(32,7,'A',65,'7A65',10,'ইসলাম শিক্ষা',1,'7A6510'),(33,7,'A',65,'7A65',11,'হিন্দুধর্ম শিক্ষা',1,'7A6511'),(34,7,'A',70,'7A70',1,'বাংলা',1,'7A701'),(35,7,'A',70,'7A70',2,'English',1,'7A702'),(36,7,'A',70,'7A70',3,'গণিত',1,'7A703'),(37,7,'A',70,'7A70',4,'বিজ্ঞান',1,'7A704'),(38,7,'A',70,'7A70',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A705'),(39,7,'A',70,'7A70',6,'ডিজিটাল প্রযুক্তি',1,'7A706'),(40,7,'A',70,'7A70',7,'স্বাস্থ্য সুরক্ষা',1,'7A707'),(41,7,'A',70,'7A70',8,'জীবন ও জীবিকা',1,'7A708'),(42,7,'A',70,'7A70',9,'শিল্প ও সংস্কৃতি',1,'7A709'),(43,7,'A',70,'7A70',10,'ইসলাম শিক্ষা',1,'7A7010'),(44,7,'A',70,'7A70',11,'হিন্দুধর্ম শিক্ষা',1,'7A7011'),(45,7,'A',91,'7A91',1,'বাংলা',1,'7A911'),(46,7,'A',91,'7A91',2,'English',1,'7A912'),(47,7,'A',91,'7A91',3,'গণিত',1,'7A913'),(48,7,'A',91,'7A91',4,'বিজ্ঞান',1,'7A914'),(49,7,'A',91,'7A91',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A915'),(50,7,'A',91,'7A91',6,'ডিজিটাল প্রযুক্তি',1,'7A916'),(51,7,'A',91,'7A91',7,'স্বাস্থ্য সুরক্ষা',1,'7A917'),(52,7,'A',91,'7A91',8,'জীবন ও জীবিকা',1,'7A918'),(53,7,'A',91,'7A91',9,'শিল্প ও সংস্কৃতি',1,'7A919'),(54,7,'A',91,'7A91',10,'ইসলাম শিক্ষা',1,'7A9110'),(55,7,'A',91,'7A91',11,'হিন্দুধর্ম শিক্ষা',1,'7A9111'),(56,7,'A',79,'7A79',1,'বাংলা',1,'7A791'),(57,7,'A',79,'7A79',2,'English',1,'7A792'),(58,7,'A',79,'7A79',3,'গণিত',1,'7A793'),(59,7,'A',79,'7A79',4,'বিজ্ঞান',1,'7A794'),(60,7,'A',79,'7A79',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A795'),(61,7,'A',79,'7A79',6,'ডিজিটাল প্রযুক্তি',1,'7A796'),(62,7,'A',79,'7A79',7,'স্বাস্থ্য সুরক্ষা',1,'7A797'),(63,7,'A',79,'7A79',8,'জীবন ও জীবিকা',1,'7A798'),(64,7,'A',79,'7A79',9,'শিল্প ও সংস্কৃতি',1,'7A799'),(65,7,'A',79,'7A79',10,'ইসলাম শিক্ষা',1,'7A7910'),(66,7,'A',79,'7A79',11,'হিন্দুধর্ম শিক্ষা',1,'7A7911'),(67,7,'A',67,'7A67',1,'বাংলা',1,'7A671'),(68,7,'A',67,'7A67',2,'English',1,'7A672'),(69,7,'A',67,'7A67',3,'গণিত',1,'7A673'),(70,7,'A',67,'7A67',4,'বিজ্ঞান',1,'7A674'),(71,7,'A',67,'7A67',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A675'),(72,7,'A',67,'7A67',6,'ডিজিটাল প্রযুক্তি',1,'7A676'),(73,7,'A',67,'7A67',7,'স্বাস্থ্য সুরক্ষা',1,'7A677'),(74,7,'A',67,'7A67',8,'জীবন ও জীবিকা',1,'7A678'),(75,7,'A',67,'7A67',9,'শিল্প ও সংস্কৃতি',1,'7A679'),(76,7,'A',67,'7A67',10,'ইসলাম শিক্ষা',1,'7A6710'),(77,7,'A',67,'7A67',11,'হিন্দুধর্ম শিক্ষা',1,'7A6711'),(78,7,'A',60,'7A60',1,'বাংলা',1,'7A601'),(79,7,'A',60,'7A60',2,'English',1,'7A602'),(80,7,'A',60,'7A60',3,'গণিত',1,'7A603'),(81,7,'A',60,'7A60',4,'বিজ্ঞান',1,'7A604'),(82,7,'A',60,'7A60',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A605'),(83,7,'A',60,'7A60',6,'ডিজিটাল প্রযুক্তি',1,'7A606'),(84,7,'A',60,'7A60',7,'স্বাস্থ্য সুরক্ষা',1,'7A607'),(85,7,'A',60,'7A60',8,'জীবন ও জীবিকা',1,'7A608'),(86,7,'A',60,'7A60',9,'শিল্প ও সংস্কৃতি',1,'7A609'),(87,7,'A',60,'7A60',10,'ইসলাম শিক্ষা',1,'7A6010'),(88,7,'A',60,'7A60',11,'হিন্দুধর্ম শিক্ষা',1,'7A6011'),(89,7,'A',59,'7A59',1,'বাংলা',1,'7A591'),(90,7,'A',59,'7A59',2,'English',1,'7A592'),(91,7,'A',59,'7A59',3,'গণিত',1,'7A593'),(92,7,'A',59,'7A59',4,'বিজ্ঞান',1,'7A594'),(93,7,'A',59,'7A59',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A595'),(94,7,'A',59,'7A59',6,'ডিজিটাল প্রযুক্তি',1,'7A596'),(95,7,'A',59,'7A59',7,'স্বাস্থ্য সুরক্ষা',1,'7A597'),(96,7,'A',59,'7A59',8,'জীবন ও জীবিকা',1,'7A598'),(97,7,'A',59,'7A59',9,'শিল্প ও সংস্কৃতি',1,'7A599'),(98,7,'A',59,'7A59',10,'ইসলাম শিক্ষা',1,'7A5910'),(99,7,'A',59,'7A59',11,'হিন্দুধর্ম শিক্ষা',1,'7A5911'),(100,7,'A',53,'7A53',1,'বাংলা',1,'7A531'),(101,7,'A',53,'7A53',2,'English',1,'7A532'),(102,7,'A',53,'7A53',3,'গণিত',1,'7A533'),(103,7,'A',53,'7A53',4,'বিজ্ঞান',1,'7A534'),(104,7,'A',53,'7A53',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A535'),(105,7,'A',53,'7A53',6,'ডিজিটাল প্রযুক্তি',1,'7A536'),(106,7,'A',53,'7A53',7,'স্বাস্থ্য সুরক্ষা',1,'7A537'),(107,7,'A',53,'7A53',8,'জীবন ও জীবিকা',1,'7A538'),(108,7,'A',53,'7A53',9,'শিল্প ও সংস্কৃতি',1,'7A539'),(109,7,'A',53,'7A53',10,'ইসলাম শিক্ষা',1,'7A5310'),(110,7,'A',53,'7A53',11,'হিন্দুধর্ম শিক্ষা',1,'7A5311'),(111,7,'A',63,'7A63',1,'বাংলা',1,'7A631'),(112,7,'A',63,'7A63',2,'English',1,'7A632'),(113,7,'A',63,'7A63',3,'গণিত',1,'7A633'),(114,7,'A',63,'7A63',4,'বিজ্ঞান',1,'7A634'),(115,7,'A',63,'7A63',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A635'),(116,7,'A',63,'7A63',6,'ডিজিটাল প্রযুক্তি',1,'7A636'),(117,7,'A',63,'7A63',7,'স্বাস্থ্য সুরক্ষা',1,'7A637'),(118,7,'A',63,'7A63',8,'জীবন ও জীবিকা',1,'7A638'),(119,7,'A',63,'7A63',9,'শিল্প ও সংস্কৃতি',1,'7A639'),(120,7,'A',63,'7A63',10,'ইসলাম শিক্ষা',1,'7A6310'),(121,7,'A',63,'7A63',11,'হিন্দুধর্ম শিক্ষা',1,'7A6311'),(122,7,'A',75,'7A75',1,'বাংলা',1,'7A751'),(123,7,'A',75,'7A75',2,'English',1,'7A752'),(124,7,'A',75,'7A75',3,'গণিত',1,'7A753'),(125,7,'A',75,'7A75',4,'বিজ্ঞান',1,'7A754'),(126,7,'A',75,'7A75',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A755'),(127,7,'A',75,'7A75',6,'ডিজিটাল প্রযুক্তি',1,'7A756'),(128,7,'A',75,'7A75',7,'স্বাস্থ্য সুরক্ষা',1,'7A757'),(129,7,'A',75,'7A75',8,'জীবন ও জীবিকা',1,'7A758'),(130,7,'A',75,'7A75',9,'শিল্প ও সংস্কৃতি',1,'7A759'),(131,7,'A',75,'7A75',10,'ইসলাম শিক্ষা',1,'7A7510'),(132,7,'A',75,'7A75',11,'হিন্দুধর্ম শিক্ষা',1,'7A7511'),(133,7,'A',17,'7A17',1,'বাংলা',1,'7A171'),(134,7,'A',17,'7A17',2,'English',1,'7A172'),(135,7,'A',17,'7A17',3,'গণিত',1,'7A173'),(136,7,'A',17,'7A17',4,'বিজ্ঞান',1,'7A174'),(137,7,'A',17,'7A17',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A175'),(138,7,'A',17,'7A17',6,'ডিজিটাল প্রযুক্তি',1,'7A176'),(139,7,'A',17,'7A17',7,'স্বাস্থ্য সুরক্ষা',1,'7A177'),(140,7,'A',17,'7A17',8,'জীবন ও জীবিকা',1,'7A178'),(141,7,'A',17,'7A17',9,'শিল্প ও সংস্কৃতি',1,'7A179'),(142,7,'A',17,'7A17',10,'ইসলাম শিক্ষা',1,'7A1710'),(143,7,'A',17,'7A17',11,'হিন্দুধর্ম শিক্ষা',1,'7A1711'),(144,7,'A',14,'7A14',1,'বাংলা',1,'7A141'),(145,7,'A',14,'7A14',2,'English',1,'7A142'),(146,7,'A',14,'7A14',3,'গণিত',1,'7A143'),(147,7,'A',14,'7A14',4,'বিজ্ঞান',1,'7A144'),(148,7,'A',14,'7A14',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A145'),(149,7,'A',14,'7A14',6,'ডিজিটাল প্রযুক্তি',1,'7A146'),(150,7,'A',14,'7A14',7,'স্বাস্থ্য সুরক্ষা',1,'7A147'),(151,7,'A',14,'7A14',8,'জীবন ও জীবিকা',1,'7A148'),(152,7,'A',14,'7A14',9,'শিল্প ও সংস্কৃতি',1,'7A149'),(153,7,'A',14,'7A14',10,'ইসলাম শিক্ষা',1,'7A1410'),(154,7,'A',14,'7A14',11,'হিন্দুধর্ম শিক্ষা',1,'7A1411'),(155,7,'A',33,'7A33',1,'বাংলা',1,'7A331'),(156,7,'A',33,'7A33',2,'English',1,'7A332'),(157,7,'A',33,'7A33',3,'গণিত',1,'7A333'),(158,7,'A',33,'7A33',4,'বিজ্ঞান',1,'7A334'),(159,7,'A',33,'7A33',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A335'),(160,7,'A',33,'7A33',6,'ডিজিটাল প্রযুক্তি',1,'7A336'),(161,7,'A',33,'7A33',7,'স্বাস্থ্য সুরক্ষা',1,'7A337'),(162,7,'A',33,'7A33',8,'জীবন ও জীবিকা',1,'7A338'),(163,7,'A',33,'7A33',9,'শিল্প ও সংস্কৃতি',1,'7A339'),(164,7,'A',33,'7A33',10,'ইসলাম শিক্ষা',1,'7A3310'),(165,7,'A',33,'7A33',11,'হিন্দুধর্ম শিক্ষা',1,'7A3311'),(166,7,'A',27,'7A27',1,'বাংলা',1,'7A271'),(167,7,'A',27,'7A27',2,'English',1,'7A272'),(168,7,'A',27,'7A27',3,'গণিত',1,'7A273'),(169,7,'A',27,'7A27',4,'বিজ্ঞান',1,'7A274'),(170,7,'A',27,'7A27',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A275'),(171,7,'A',27,'7A27',6,'ডিজিটাল প্রযুক্তি',1,'7A276'),(172,7,'A',27,'7A27',7,'স্বাস্থ্য সুরক্ষা',1,'7A277'),(173,7,'A',27,'7A27',8,'জীবন ও জীবিকা',1,'7A278'),(174,7,'A',27,'7A27',9,'শিল্প ও সংস্কৃতি',1,'7A279'),(175,7,'A',27,'7A27',10,'ইসলাম শিক্ষা',1,'7A2710'),(176,7,'A',27,'7A27',11,'হিন্দুধর্ম শিক্ষা',1,'7A2711'),(177,7,'A',5,'7A5',1,'বাংলা',1,'7A51'),(178,7,'A',5,'7A5',2,'English',1,'7A52'),(179,7,'A',5,'7A5',3,'গণিত',1,'7A53'),(180,7,'A',5,'7A5',4,'বিজ্ঞান',1,'7A54'),(181,7,'A',5,'7A5',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A55'),(182,7,'A',5,'7A5',6,'ডিজিটাল প্রযুক্তি',1,'7A56'),(183,7,'A',5,'7A5',7,'স্বাস্থ্য সুরক্ষা',1,'7A57'),(184,7,'A',5,'7A5',8,'জীবন ও জীবিকা',1,'7A58'),(185,7,'A',5,'7A5',9,'শিল্প ও সংস্কৃতি',1,'7A59'),(186,7,'A',5,'7A5',10,'ইসলাম শিক্ষা',1,'7A510'),(187,7,'A',5,'7A5',11,'হিন্দুধর্ম শিক্ষা',1,'7A511'),(188,7,'A',32,'7A32',1,'বাংলা',1,'7A321'),(189,7,'A',32,'7A32',2,'English',1,'7A322'),(190,7,'A',32,'7A32',3,'গণিত',1,'7A323'),(191,7,'A',32,'7A32',4,'বিজ্ঞান',1,'7A324'),(192,7,'A',32,'7A32',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A325'),(193,7,'A',32,'7A32',6,'ডিজিটাল প্রযুক্তি',1,'7A326'),(194,7,'A',32,'7A32',7,'স্বাস্থ্য সুরক্ষা',1,'7A327'),(195,7,'A',32,'7A32',8,'জীবন ও জীবিকা',1,'7A328'),(196,7,'A',32,'7A32',9,'শিল্প ও সংস্কৃতি',1,'7A329'),(197,7,'A',32,'7A32',10,'ইসলাম শিক্ষা',1,'7A3210'),(198,7,'A',32,'7A32',11,'হিন্দুধর্ম শিক্ষা',1,'7A3211'),(199,7,'A',28,'7A28',1,'বাংলা',1,'7A281'),(200,7,'A',28,'7A28',2,'English',1,'7A282'),(201,7,'A',28,'7A28',3,'গণিত',1,'7A283'),(202,7,'A',28,'7A28',4,'বিজ্ঞান',1,'7A284'),(203,7,'A',28,'7A28',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A285'),(204,7,'A',28,'7A28',6,'ডিজিটাল প্রযুক্তি',1,'7A286'),(205,7,'A',28,'7A28',7,'স্বাস্থ্য সুরক্ষা',1,'7A287'),(206,7,'A',28,'7A28',8,'জীবন ও জীবিকা',1,'7A288'),(207,7,'A',28,'7A28',9,'শিল্প ও সংস্কৃতি',1,'7A289'),(208,7,'A',28,'7A28',10,'ইসলাম শিক্ষা',1,'7A2810'),(209,7,'A',28,'7A28',11,'হিন্দুধর্ম শিক্ষা',1,'7A2811'),(210,7,'A',43,'7A43',1,'বাংলা',1,'7A431'),(211,7,'A',43,'7A43',2,'English',1,'7A432'),(212,7,'A',43,'7A43',3,'গণিত',1,'7A433'),(213,7,'A',43,'7A43',4,'বিজ্ঞান',1,'7A434'),(214,7,'A',43,'7A43',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A435'),(215,7,'A',43,'7A43',6,'ডিজিটাল প্রযুক্তি',1,'7A436'),(216,7,'A',43,'7A43',7,'স্বাস্থ্য সুরক্ষা',1,'7A437'),(217,7,'A',43,'7A43',8,'জীবন ও জীবিকা',1,'7A438'),(218,7,'A',43,'7A43',9,'শিল্প ও সংস্কৃতি',1,'7A439'),(219,7,'A',43,'7A43',10,'ইসলাম শিক্ষা',1,'7A4310'),(220,7,'A',43,'7A43',11,'হিন্দুধর্ম শিক্ষা',1,'7A4311'),(221,7,'A',45,'7A45',1,'বাংলা',1,'7A451'),(222,7,'A',45,'7A45',2,'English',1,'7A452'),(223,7,'A',45,'7A45',3,'গণিত',1,'7A453'),(224,7,'A',45,'7A45',4,'বিজ্ঞান',1,'7A454'),(225,7,'A',45,'7A45',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A455'),(226,7,'A',45,'7A45',6,'ডিজিটাল প্রযুক্তি',1,'7A456'),(227,7,'A',45,'7A45',7,'স্বাস্থ্য সুরক্ষা',1,'7A457'),(228,7,'A',45,'7A45',8,'জীবন ও জীবিকা',1,'7A458'),(229,7,'A',45,'7A45',9,'শিল্প ও সংস্কৃতি',1,'7A459'),(230,7,'A',45,'7A45',10,'ইসলাম শিক্ষা',1,'7A4510'),(231,7,'A',45,'7A45',11,'হিন্দুধর্ম শিক্ষা',1,'7A4511'),(232,7,'A',8,'7A8',1,'বাংলা',1,'7A81'),(233,7,'A',8,'7A8',2,'English',1,'7A82'),(234,7,'A',8,'7A8',3,'গণিত',1,'7A83'),(235,7,'A',8,'7A8',4,'বিজ্ঞান',1,'7A84'),(236,7,'A',8,'7A8',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A85'),(237,7,'A',8,'7A8',6,'ডিজিটাল প্রযুক্তি',1,'7A86'),(238,7,'A',8,'7A8',7,'স্বাস্থ্য সুরক্ষা',1,'7A87'),(239,7,'A',8,'7A8',8,'জীবন ও জীবিকা',1,'7A88'),(240,7,'A',8,'7A8',9,'শিল্প ও সংস্কৃতি',1,'7A89'),(241,7,'A',8,'7A8',10,'ইসলাম শিক্ষা',1,'7A810'),(242,7,'A',8,'7A8',11,'হিন্দুধর্ম শিক্ষা',1,'7A811'),(243,7,'A',111,'7A111',1,'বাংলা',1,'7A1111'),(244,7,'A',111,'7A111',2,'English',1,'7A1112'),(245,7,'A',111,'7A111',3,'গণিত',1,'7A1113'),(246,7,'A',111,'7A111',4,'বিজ্ঞান',1,'7A1114'),(247,7,'A',111,'7A111',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1115'),(248,7,'A',111,'7A111',6,'ডিজিটাল প্রযুক্তি',1,'7A1116'),(249,7,'A',111,'7A111',7,'স্বাস্থ্য সুরক্ষা',1,'7A1117'),(250,7,'A',111,'7A111',8,'জীবন ও জীবিকা',1,'7A1118'),(251,7,'A',111,'7A111',9,'শিল্প ও সংস্কৃতি',1,'7A1119'),(252,7,'A',111,'7A111',10,'ইসলাম শিক্ষা',1,'7A11110'),(253,7,'A',111,'7A111',11,'হিন্দুধর্ম শিক্ষা',1,'7A11111'),(254,7,'A',119,'7A119',1,'বাংলা',1,'7A1191'),(255,7,'A',119,'7A119',2,'English',1,'7A1192'),(256,7,'A',119,'7A119',3,'গণিত',1,'7A1193'),(257,7,'A',119,'7A119',4,'বিজ্ঞান',1,'7A1194'),(258,7,'A',119,'7A119',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1195'),(259,7,'A',119,'7A119',6,'ডিজিটাল প্রযুক্তি',1,'7A1196'),(260,7,'A',119,'7A119',7,'স্বাস্থ্য সুরক্ষা',1,'7A1197'),(261,7,'A',119,'7A119',8,'জীবন ও জীবিকা',1,'7A1198'),(262,7,'A',119,'7A119',9,'শিল্প ও সংস্কৃতি',1,'7A1199'),(263,7,'A',119,'7A119',10,'ইসলাম শিক্ষা',1,'7A11910'),(264,7,'A',119,'7A119',11,'হিন্দুধর্ম শিক্ষা',1,'7A11911'),(265,7,'A',140,'7A140',1,'বাংলা',1,'7A1401'),(266,7,'A',140,'7A140',2,'English',1,'7A1402'),(267,7,'A',140,'7A140',3,'গণিত',1,'7A1403'),(268,7,'A',140,'7A140',4,'বিজ্ঞান',1,'7A1404'),(269,7,'A',140,'7A140',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1405'),(270,7,'A',140,'7A140',6,'ডিজিটাল প্রযুক্তি',1,'7A1406'),(271,7,'A',140,'7A140',7,'স্বাস্থ্য সুরক্ষা',1,'7A1407'),(272,7,'A',140,'7A140',8,'জীবন ও জীবিকা',1,'7A1408'),(273,7,'A',140,'7A140',9,'শিল্প ও সংস্কৃতি',1,'7A1409'),(274,7,'A',140,'7A140',10,'ইসলাম শিক্ষা',1,'7A14010'),(275,7,'A',140,'7A140',11,'হিন্দুধর্ম শিক্ষা',1,'7A14011'),(276,7,'A',123,'7A123',1,'বাংলা',1,'7A1231'),(277,7,'A',123,'7A123',2,'English',1,'7A1232'),(278,7,'A',123,'7A123',3,'গণিত',1,'7A1233'),(279,7,'A',123,'7A123',4,'বিজ্ঞান',1,'7A1234'),(280,7,'A',123,'7A123',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1235'),(281,7,'A',123,'7A123',6,'ডিজিটাল প্রযুক্তি',1,'7A1236'),(282,7,'A',123,'7A123',7,'স্বাস্থ্য সুরক্ষা',1,'7A1237'),(283,7,'A',123,'7A123',8,'জীবন ও জীবিকা',1,'7A1238'),(284,7,'A',123,'7A123',9,'শিল্প ও সংস্কৃতি',1,'7A1239'),(285,7,'A',123,'7A123',10,'ইসলাম শিক্ষা',1,'7A12310'),(286,7,'A',123,'7A123',11,'হিন্দুধর্ম শিক্ষা',1,'7A12311'),(287,7,'A',128,'7A128',1,'বাংলা',1,'7A1281'),(288,7,'A',128,'7A128',2,'English',1,'7A1282'),(289,7,'A',128,'7A128',3,'গণিত',1,'7A1283'),(290,7,'A',128,'7A128',4,'বিজ্ঞান',1,'7A1284'),(291,7,'A',128,'7A128',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1285'),(292,7,'A',128,'7A128',6,'ডিজিটাল প্রযুক্তি',1,'7A1286'),(293,7,'A',128,'7A128',7,'স্বাস্থ্য সুরক্ষা',1,'7A1287'),(294,7,'A',128,'7A128',8,'জীবন ও জীবিকা',1,'7A1288'),(295,7,'A',128,'7A128',9,'শিল্প ও সংস্কৃতি',1,'7A1289'),(296,7,'A',128,'7A128',10,'ইসলাম শিক্ষা',1,'7A12810'),(297,7,'A',128,'7A128',11,'হিন্দুধর্ম শিক্ষা',1,'7A12811'),(299,7,'A',81,'7A81',2,'English',1,'7A812'),(300,7,'A',81,'7A81',3,'গণিত',1,'7A813'),(301,7,'A',81,'7A81',4,'বিজ্ঞান',1,'7A814'),(302,7,'A',81,'7A81',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A815'),(303,7,'A',81,'7A81',6,'ডিজিটাল প্রযুক্তি',1,'7A816'),(304,7,'A',81,'7A81',7,'স্বাস্থ্য সুরক্ষা',1,'7A817'),(305,7,'A',81,'7A81',8,'জীবন ও জীবিকা',1,'7A818'),(306,7,'A',81,'7A81',9,'শিল্প ও সংস্কৃতি',1,'7A819'),(307,7,'A',81,'7A81',10,'ইসলাম শিক্ষা',1,'7A8110'),(308,7,'A',81,'7A81',11,'হিন্দুধর্ম শিক্ষা',1,'7A8111'),(309,7,'A',133,'7A133',1,'বাংলা',1,'7A1331'),(310,7,'A',133,'7A133',2,'English',1,'7A1332'),(311,7,'A',133,'7A133',3,'গণিত',1,'7A1333'),(312,7,'A',133,'7A133',4,'বিজ্ঞান',1,'7A1334'),(313,7,'A',133,'7A133',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1335'),(314,7,'A',133,'7A133',6,'ডিজিটাল প্রযুক্তি',1,'7A1336'),(315,7,'A',133,'7A133',7,'স্বাস্থ্য সুরক্ষা',1,'7A1337'),(316,7,'A',133,'7A133',8,'জীবন ও জীবিকা',1,'7A1338'),(317,7,'A',133,'7A133',9,'শিল্প ও সংস্কৃতি',1,'7A1339'),(318,7,'A',133,'7A133',10,'ইসলাম শিক্ষা',1,'7A13310'),(319,7,'A',133,'7A133',11,'হিন্দুধর্ম শিক্ষা',1,'7A13311'),(320,7,'A',142,'7A142',1,'বাংলা',1,'7A1421'),(321,7,'A',142,'7A142',2,'English',1,'7A1422'),(322,7,'A',142,'7A142',3,'গণিত',1,'7A1423'),(323,7,'A',142,'7A142',4,'বিজ্ঞান',1,'7A1424'),(324,7,'A',142,'7A142',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1425'),(325,7,'A',142,'7A142',6,'ডিজিটাল প্রযুক্তি',1,'7A1426'),(326,7,'A',142,'7A142',7,'স্বাস্থ্য সুরক্ষা',1,'7A1427'),(327,7,'A',142,'7A142',8,'জীবন ও জীবিকা',1,'7A1428'),(328,7,'A',142,'7A142',9,'শিল্প ও সংস্কৃতি',1,'7A1429'),(329,7,'A',142,'7A142',10,'ইসলাম শিক্ষা',1,'7A14210'),(330,7,'A',142,'7A142',11,'হিন্দুধর্ম শিক্ষা',1,'7A14211'),(331,7,'A',132,'7A132',1,'বাংলা',1,'7A1321'),(332,7,'A',132,'7A132',2,'English',1,'7A1322'),(333,7,'A',132,'7A132',3,'গণিত',1,'7A1323'),(334,7,'A',132,'7A132',4,'বিজ্ঞান',1,'7A1324'),(335,7,'A',132,'7A132',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1325'),(336,7,'A',132,'7A132',6,'ডিজিটাল প্রযুক্তি',1,'7A1326'),(337,7,'A',132,'7A132',7,'স্বাস্থ্য সুরক্ষা',1,'7A1327'),(338,7,'A',132,'7A132',8,'জীবন ও জীবিকা',1,'7A1328'),(339,7,'A',132,'7A132',9,'শিল্প ও সংস্কৃতি',1,'7A1329'),(340,7,'A',132,'7A132',10,'ইসলাম শিক্ষা',1,'7A13210'),(341,7,'A',132,'7A132',11,'হিন্দুধর্ম শিক্ষা',1,'7A13211'),(342,7,'A',147,'7A147',1,'বাংলা',1,'7A1471'),(343,7,'A',147,'7A147',2,'English',1,'7A1472'),(344,7,'A',147,'7A147',3,'গণিত',1,'7A1473'),(345,7,'A',147,'7A147',4,'বিজ্ঞান',1,'7A1474'),(346,7,'A',147,'7A147',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1475'),(347,7,'A',147,'7A147',6,'ডিজিটাল প্রযুক্তি',1,'7A1476'),(348,7,'A',147,'7A147',7,'স্বাস্থ্য সুরক্ষা',1,'7A1477'),(349,7,'A',147,'7A147',8,'জীবন ও জীবিকা',1,'7A1478'),(350,7,'A',147,'7A147',9,'শিল্প ও সংস্কৃতি',1,'7A1479'),(351,7,'A',147,'7A147',10,'ইসলাম শিক্ষা',1,'7A14710'),(352,7,'A',147,'7A147',11,'হিন্দুধর্ম শিক্ষা',1,'7A14711'),(353,7,'A',118,'7A118',1,'বাংলা',1,'7A1181'),(354,7,'A',118,'7A118',2,'English',1,'7A1182'),(355,7,'A',118,'7A118',3,'গণিত',1,'7A1183'),(356,7,'A',118,'7A118',4,'বিজ্ঞান',1,'7A1184'),(357,7,'A',118,'7A118',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1185'),(358,7,'A',118,'7A118',6,'ডিজিটাল প্রযুক্তি',1,'7A1186'),(359,7,'A',118,'7A118',7,'স্বাস্থ্য সুরক্ষা',1,'7A1187'),(360,7,'A',118,'7A118',8,'জীবন ও জীবিকা',1,'7A1188'),(361,7,'A',118,'7A118',9,'শিল্প ও সংস্কৃতি',1,'7A1189'),(362,7,'A',118,'7A118',10,'ইসলাম শিক্ষা',1,'7A11810'),(363,7,'A',118,'7A118',11,'হিন্দুধর্ম শিক্ষা',1,'7A11811'),(364,7,'A',12,'7A12',1,'বাংলা',1,'7A121'),(365,7,'A',12,'7A12',2,'English',1,'7A122'),(366,7,'A',12,'7A12',3,'গণিত',1,'7A123'),(367,7,'A',12,'7A12',4,'বিজ্ঞান',1,'7A124'),(368,7,'A',12,'7A12',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A125'),(369,7,'A',12,'7A12',6,'ডিজিটাল প্রযুক্তি',1,'7A126'),(370,7,'A',12,'7A12',7,'স্বাস্থ্য সুরক্ষা',1,'7A127'),(371,7,'A',12,'7A12',8,'জীবন ও জীবিকা',1,'7A128'),(372,7,'A',12,'7A12',9,'শিল্প ও সংস্কৃতি',1,'7A129'),(373,7,'A',12,'7A12',10,'ইসলাম শিক্ষা',1,'7A1210'),(374,7,'A',12,'7A12',11,'হিন্দুধর্ম শিক্ষা',1,'7A1211'),(375,7,'A',29,'7A29',1,'বাংলা',1,'7A291'),(376,7,'A',29,'7A29',2,'English',1,'7A292'),(377,7,'A',29,'7A29',3,'গণিত',1,'7A293'),(378,7,'A',29,'7A29',4,'বিজ্ঞান',1,'7A294'),(379,7,'A',29,'7A29',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A295'),(380,7,'A',29,'7A29',6,'ডিজিটাল প্রযুক্তি',1,'7A296'),(381,7,'A',29,'7A29',7,'স্বাস্থ্য সুরক্ষা',1,'7A297'),(382,7,'A',29,'7A29',8,'জীবন ও জীবিকা',1,'7A298'),(383,7,'A',29,'7A29',9,'শিল্প ও সংস্কৃতি',1,'7A299'),(384,7,'A',29,'7A29',10,'ইসলাম শিক্ষা',1,'7A2910'),(385,7,'A',29,'7A29',11,'হিন্দুধর্ম শিক্ষা',1,'7A2911'),(386,7,'A',97,'7A97',1,'বাংলা',1,'7A971'),(387,7,'A',97,'7A97',2,'English',1,'7A972'),(388,7,'A',97,'7A97',3,'গণিত',1,'7A973'),(389,7,'A',97,'7A97',4,'বিজ্ঞান',1,'7A974'),(390,7,'A',97,'7A97',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A975'),(391,7,'A',97,'7A97',6,'ডিজিটাল প্রযুক্তি',1,'7A976'),(392,7,'A',97,'7A97',7,'স্বাস্থ্য সুরক্ষা',1,'7A977'),(393,7,'A',97,'7A97',8,'জীবন ও জীবিকা',1,'7A978'),(394,7,'A',97,'7A97',9,'শিল্প ও সংস্কৃতি',1,'7A979'),(395,7,'A',97,'7A97',10,'ইসলাম শিক্ষা',1,'7A9710'),(396,7,'A',97,'7A97',11,'হিন্দুধর্ম শিক্ষা',1,'7A9711'),(397,7,'A',94,'7A94',1,'বাংলা',1,'7A941'),(398,7,'A',94,'7A94',2,'English',1,'7A942'),(399,7,'A',94,'7A94',3,'গণিত',1,'7A943'),(400,7,'A',94,'7A94',4,'বিজ্ঞান',1,'7A944'),(401,7,'A',94,'7A94',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A945'),(402,7,'A',94,'7A94',6,'ডিজিটাল প্রযুক্তি',1,'7A946'),(403,7,'A',94,'7A94',7,'স্বাস্থ্য সুরক্ষা',1,'7A947'),(404,7,'A',94,'7A94',8,'জীবন ও জীবিকা',1,'7A948'),(405,7,'A',94,'7A94',9,'শিল্প ও সংস্কৃতি',1,'7A949'),(406,7,'A',94,'7A94',10,'ইসলাম শিক্ষা',1,'7A9410'),(407,7,'A',94,'7A94',11,'হিন্দুধর্ম শিক্ষা',1,'7A9411'),(408,7,'A',145,'7A145',1,'বাংলা',1,'7A1451'),(409,7,'A',145,'7A145',2,'English',1,'7A1452'),(410,7,'A',145,'7A145',3,'গণিত',1,'7A1453'),(411,7,'A',145,'7A145',4,'বিজ্ঞান',1,'7A1454'),(412,7,'A',145,'7A145',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1455'),(413,7,'A',145,'7A145',6,'ডিজিটাল প্রযুক্তি',1,'7A1456'),(414,7,'A',145,'7A145',7,'স্বাস্থ্য সুরক্ষা',1,'7A1457'),(415,7,'A',145,'7A145',8,'জীবন ও জীবিকা',1,'7A1458'),(416,7,'A',145,'7A145',9,'শিল্প ও সংস্কৃতি',1,'7A1459'),(417,7,'A',145,'7A145',10,'ইসলাম শিক্ষা',1,'7A14510'),(418,7,'A',145,'7A145',11,'হিন্দুধর্ম শিক্ষা',1,'7A14511'),(419,7,'A',107,'7A107',1,'বাংলা',1,'7A1071'),(420,7,'A',107,'7A107',2,'English',1,'7A1072'),(421,7,'A',107,'7A107',3,'গণিত',1,'7A1073'),(422,7,'A',107,'7A107',4,'বিজ্ঞান',1,'7A1074'),(423,7,'A',107,'7A107',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1075'),(424,7,'A',107,'7A107',6,'ডিজিটাল প্রযুক্তি',1,'7A1076'),(425,7,'A',107,'7A107',7,'স্বাস্থ্য সুরক্ষা',1,'7A1077'),(426,7,'A',107,'7A107',8,'জীবন ও জীবিকা',1,'7A1078'),(427,7,'A',107,'7A107',9,'শিল্প ও সংস্কৃতি',1,'7A1079'),(428,7,'A',107,'7A107',10,'ইসলাম শিক্ষা',1,'7A10710'),(429,7,'A',107,'7A107',11,'হিন্দুধর্ম শিক্ষা',1,'7A10711'),(430,7,'A',4,'7A4',1,'বাংলা',1,'7A41'),(431,7,'A',4,'7A4',2,'English',1,'7A42'),(432,7,'A',4,'7A4',3,'গণিত',1,'7A43'),(433,7,'A',4,'7A4',4,'বিজ্ঞান',1,'7A44'),(434,7,'A',4,'7A4',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A45'),(435,7,'A',4,'7A4',6,'ডিজিটাল প্রযুক্তি',1,'7A46'),(436,7,'A',4,'7A4',7,'স্বাস্থ্য সুরক্ষা',1,'7A47'),(437,7,'A',4,'7A4',8,'জীবন ও জীবিকা',1,'7A48'),(438,7,'A',4,'7A4',9,'শিল্প ও সংস্কৃতি',1,'7A49'),(439,7,'A',4,'7A4',10,'ইসলাম শিক্ষা',1,'7A410'),(440,7,'A',4,'7A4',11,'হিন্দুধর্ম শিক্ষা',1,'7A411'),(441,7,'A',105,'7A105',1,'বাংলা',1,'7A1051'),(442,7,'A',105,'7A105',2,'English',1,'7A1052'),(443,7,'A',105,'7A105',3,'গণিত',1,'7A1053'),(444,7,'A',105,'7A105',4,'বিজ্ঞান',1,'7A1054'),(445,7,'A',105,'7A105',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1055'),(446,7,'A',105,'7A105',6,'ডিজিটাল প্রযুক্তি',1,'7A1056'),(447,7,'A',105,'7A105',7,'স্বাস্থ্য সুরক্ষা',1,'7A1057'),(448,7,'A',105,'7A105',8,'জীবন ও জীবিকা',1,'7A1058'),(449,7,'A',105,'7A105',9,'শিল্প ও সংস্কৃতি',1,'7A1059'),(450,7,'A',105,'7A105',10,'ইসলাম শিক্ষা',1,'7A10510'),(451,7,'A',105,'7A105',11,'হিন্দুধর্ম শিক্ষা',1,'7A10511'),(452,7,'A',156,'7A156',1,'বাংলা',1,'7A1561'),(453,7,'A',156,'7A156',2,'English',1,'7A1562'),(454,7,'A',156,'7A156',3,'গণিত',1,'7A1563'),(455,7,'A',156,'7A156',4,'বিজ্ঞান',1,'7A1564'),(456,7,'A',156,'7A156',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1565'),(457,7,'A',156,'7A156',6,'ডিজিটাল প্রযুক্তি',1,'7A1566'),(458,7,'A',156,'7A156',7,'স্বাস্থ্য সুরক্ষা',1,'7A1567'),(459,7,'A',156,'7A156',8,'জীবন ও জীবিকা',1,'7A1568'),(460,7,'A',156,'7A156',9,'শিল্প ও সংস্কৃতি',1,'7A1569'),(461,7,'A',156,'7A156',10,'ইসলাম শিক্ষা',1,'7A15610'),(462,7,'A',156,'7A156',11,'হিন্দুধর্ম শিক্ষা',1,'7A15611'),(463,7,'A',66,'7A66',1,'বাংলা',1,'7A661'),(464,7,'A',66,'7A66',2,'English',1,'7A662'),(465,7,'A',66,'7A66',3,'গণিত',1,'7A663'),(466,7,'A',66,'7A66',4,'বিজ্ঞান',1,'7A664'),(467,7,'A',66,'7A66',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A665'),(468,7,'A',66,'7A66',6,'ডিজিটাল প্রযুক্তি',1,'7A666'),(469,7,'A',66,'7A66',7,'স্বাস্থ্য সুরক্ষা',1,'7A667'),(470,7,'A',66,'7A66',8,'জীবন ও জীবিকা',1,'7A668'),(471,7,'A',66,'7A66',9,'শিল্প ও সংস্কৃতি',1,'7A669'),(472,7,'A',66,'7A66',10,'ইসলাম শিক্ষা',1,'7A6610'),(473,7,'A',66,'7A66',11,'হিন্দুধর্ম শিক্ষা',1,'7A6611'),(474,7,'A',139,'7A139',1,'বাংলা',1,'7A1391'),(475,7,'A',139,'7A139',2,'English',1,'7A1392'),(476,7,'A',139,'7A139',3,'গণিত',1,'7A1393'),(477,7,'A',139,'7A139',4,'বিজ্ঞান',1,'7A1394'),(478,7,'A',139,'7A139',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1395'),(479,7,'A',139,'7A139',6,'ডিজিটাল প্রযুক্তি',1,'7A1396'),(480,7,'A',139,'7A139',7,'স্বাস্থ্য সুরক্ষা',1,'7A1397'),(481,7,'A',139,'7A139',8,'জীবন ও জীবিকা',1,'7A1398'),(482,7,'A',139,'7A139',9,'শিল্প ও সংস্কৃতি',1,'7A1399'),(483,7,'A',139,'7A139',10,'ইসলাম শিক্ষা',1,'7A13910'),(484,7,'A',139,'7A139',11,'হিন্দুধর্ম শিক্ষা',1,'7A13911'),(485,7,'A',18,'7A18',1,'বাংলা',1,'7A181'),(486,7,'A',18,'7A18',2,'English',1,'7A182'),(487,7,'A',18,'7A18',3,'গণিত',1,'7A183'),(488,7,'A',18,'7A18',4,'বিজ্ঞান',1,'7A184'),(489,7,'A',18,'7A18',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A185'),(490,7,'A',18,'7A18',6,'ডিজিটাল প্রযুক্তি',1,'7A186'),(491,7,'A',18,'7A18',7,'স্বাস্থ্য সুরক্ষা',1,'7A187'),(492,7,'A',18,'7A18',8,'জীবন ও জীবিকা',1,'7A188'),(493,7,'A',18,'7A18',9,'শিল্প ও সংস্কৃতি',1,'7A189'),(494,7,'A',18,'7A18',10,'ইসলাম শিক্ষা',1,'7A1810'),(495,7,'A',18,'7A18',11,'হিন্দুধর্ম শিক্ষা',1,'7A1811'),(496,7,'A',78,'7A78',1,'বাংলা',1,'7A781'),(497,7,'A',78,'7A78',2,'English',1,'7A782'),(498,7,'A',78,'7A78',3,'গণিত',1,'7A783'),(499,7,'A',78,'7A78',4,'বিজ্ঞান',1,'7A784'),(500,7,'A',78,'7A78',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A785'),(501,7,'A',78,'7A78',6,'ডিজিটাল প্রযুক্তি',1,'7A786'),(502,7,'A',78,'7A78',7,'স্বাস্থ্য সুরক্ষা',1,'7A787'),(503,7,'A',78,'7A78',8,'জীবন ও জীবিকা',1,'7A788'),(504,7,'A',78,'7A78',9,'শিল্প ও সংস্কৃতি',1,'7A789'),(505,7,'A',78,'7A78',10,'ইসলাম শিক্ষা',1,'7A7810'),(506,7,'A',78,'7A78',11,'হিন্দুধর্ম শিক্ষা',1,'7A7811'),(507,7,'A',103,'7A103',1,'বাংলা',1,'7A1031'),(508,7,'A',103,'7A103',2,'English',1,'7A1032'),(509,7,'A',103,'7A103',3,'গণিত',1,'7A1033'),(510,7,'A',103,'7A103',4,'বিজ্ঞান',1,'7A1034'),(511,7,'A',103,'7A103',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1035'),(512,7,'A',103,'7A103',6,'ডিজিটাল প্রযুক্তি',1,'7A1036'),(513,7,'A',103,'7A103',7,'স্বাস্থ্য সুরক্ষা',1,'7A1037'),(514,7,'A',103,'7A103',8,'জীবন ও জীবিকা',1,'7A1038'),(515,7,'A',103,'7A103',9,'শিল্প ও সংস্কৃতি',1,'7A1039'),(516,7,'A',103,'7A103',10,'ইসলাম শিক্ষা',1,'7A10310'),(517,7,'A',103,'7A103',11,'হিন্দুধর্ম শিক্ষা',1,'7A10311'),(518,7,'A',125,'7A125',1,'বাংলা',1,'7A1251'),(519,7,'A',125,'7A125',2,'English',1,'7A1252'),(520,7,'A',125,'7A125',3,'গণিত',1,'7A1253'),(521,7,'A',125,'7A125',4,'বিজ্ঞান',1,'7A1254'),(522,7,'A',125,'7A125',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1255'),(523,7,'A',125,'7A125',6,'ডিজিটাল প্রযুক্তি',1,'7A1256'),(524,7,'A',125,'7A125',7,'স্বাস্থ্য সুরক্ষা',1,'7A1257'),(525,7,'A',125,'7A125',8,'জীবন ও জীবিকা',1,'7A1258'),(526,7,'A',125,'7A125',9,'শিল্প ও সংস্কৃতি',1,'7A1259'),(527,7,'A',125,'7A125',10,'ইসলাম শিক্ষা',1,'7A12510'),(528,7,'A',125,'7A125',11,'হিন্দুধর্ম শিক্ষা',1,'7A12511'),(529,7,'A',130,'7A130',1,'বাংলা',1,'7A1301'),(530,7,'A',130,'7A130',2,'English',1,'7A1302'),(531,7,'A',130,'7A130',3,'গণিত',1,'7A1303'),(532,7,'A',130,'7A130',4,'বিজ্ঞান',1,'7A1304'),(533,7,'A',130,'7A130',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1305'),(534,7,'A',130,'7A130',6,'ডিজিটাল প্রযুক্তি',1,'7A1306'),(535,7,'A',130,'7A130',7,'স্বাস্থ্য সুরক্ষা',1,'7A1307'),(536,7,'A',130,'7A130',8,'জীবন ও জীবিকা',1,'7A1308'),(537,7,'A',130,'7A130',9,'শিল্প ও সংস্কৃতি',1,'7A1309'),(538,7,'A',130,'7A130',10,'ইসলাম শিক্ষা',1,'7A13010'),(539,7,'A',130,'7A130',11,'হিন্দুধর্ম শিক্ষা',1,'7A13011'),(540,7,'A',143,'7A143',1,'বাংলা',1,'7A1431'),(541,7,'A',143,'7A143',2,'English',1,'7A1432'),(542,7,'A',143,'7A143',3,'গণিত',1,'7A1433'),(543,7,'A',143,'7A143',4,'বিজ্ঞান',1,'7A1434'),(544,7,'A',143,'7A143',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1435'),(545,7,'A',143,'7A143',6,'ডিজিটাল প্রযুক্তি',1,'7A1436'),(546,7,'A',143,'7A143',7,'স্বাস্থ্য সুরক্ষা',1,'7A1437'),(547,7,'A',143,'7A143',8,'জীবন ও জীবিকা',1,'7A1438'),(548,7,'A',143,'7A143',9,'শিল্প ও সংস্কৃতি',1,'7A1439'),(549,7,'A',143,'7A143',10,'ইসলাম শিক্ষা',1,'7A14310'),(550,7,'A',143,'7A143',11,'হিন্দুধর্ম শিক্ষা',1,'7A14311'),(551,7,'A',148,'7A148',1,'বাংলা',1,'7A1481'),(552,7,'A',148,'7A148',2,'English',1,'7A1482'),(553,7,'A',148,'7A148',3,'গণিত',1,'7A1483'),(554,7,'A',148,'7A148',4,'বিজ্ঞান',1,'7A1484'),(555,7,'A',148,'7A148',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1485'),(556,7,'A',148,'7A148',6,'ডিজিটাল প্রযুক্তি',1,'7A1486'),(557,7,'A',148,'7A148',7,'স্বাস্থ্য সুরক্ষা',1,'7A1487'),(558,7,'A',148,'7A148',8,'জীবন ও জীবিকা',1,'7A1488'),(559,7,'A',148,'7A148',9,'শিল্প ও সংস্কৃতি',1,'7A1489'),(560,7,'A',148,'7A148',10,'ইসলাম শিক্ষা',1,'7A14810'),(561,7,'A',148,'7A148',11,'হিন্দুধর্ম শিক্ষা',1,'7A14811'),(562,7,'A',158,'7A158',1,'বাংলা',1,'7A1581'),(563,7,'A',158,'7A158',2,'English',1,'7A1582'),(564,7,'A',158,'7A158',3,'গণিত',1,'7A1583'),(565,7,'A',158,'7A158',4,'বিজ্ঞান',1,'7A1584'),(566,7,'A',158,'7A158',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1585'),(567,7,'A',158,'7A158',6,'ডিজিটাল প্রযুক্তি',1,'7A1586'),(568,7,'A',158,'7A158',7,'স্বাস্থ্য সুরক্ষা',1,'7A1587'),(569,7,'A',158,'7A158',8,'জীবন ও জীবিকা',1,'7A1588'),(570,7,'A',158,'7A158',9,'শিল্প ও সংস্কৃতি',1,'7A1589'),(571,7,'A',158,'7A158',10,'ইসলাম শিক্ষা',1,'7A15810'),(572,7,'A',158,'7A158',11,'হিন্দুধর্ম শিক্ষা',1,'7A15811'),(573,7,'A',159,'7A159',1,'বাংলা',1,'7A1591'),(574,7,'A',159,'7A159',2,'English',1,'7A1592'),(575,7,'A',159,'7A159',3,'গণিত',1,'7A1593'),(576,7,'A',159,'7A159',4,'বিজ্ঞান',1,'7A1594'),(577,7,'A',159,'7A159',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1595'),(578,7,'A',159,'7A159',6,'ডিজিটাল প্রযুক্তি',1,'7A1596'),(579,7,'A',159,'7A159',7,'স্বাস্থ্য সুরক্ষা',1,'7A1597'),(580,7,'A',159,'7A159',8,'জীবন ও জীবিকা',1,'7A1598'),(581,7,'A',159,'7A159',9,'শিল্প ও সংস্কৃতি',1,'7A1599'),(582,7,'A',159,'7A159',10,'ইসলাম শিক্ষা',1,'7A15910'),(583,7,'A',159,'7A159',11,'হিন্দুধর্ম শিক্ষা',1,'7A15911'),(584,7,'A',160,'7A160',1,'বাংলা',1,'7A1601'),(585,7,'A',160,'7A160',2,'English',1,'7A1602'),(586,7,'A',160,'7A160',3,'গণিত',1,'7A1603'),(587,7,'A',160,'7A160',4,'বিজ্ঞান',1,'7A1604'),(588,7,'A',160,'7A160',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'7A1605'),(589,7,'A',160,'7A160',6,'ডিজিটাল প্রযুক্তি',1,'7A1606'),(590,7,'A',160,'7A160',7,'স্বাস্থ্য সুরক্ষা',1,'7A1607'),(591,7,'A',160,'7A160',8,'জীবন ও জীবিকা',1,'7A1608'),(592,7,'A',160,'7A160',9,'শিল্প ও সংস্কৃতি',1,'7A1609'),(593,7,'A',160,'7A160',10,'ইসলাম শিক্ষা',1,'7A16010'),(594,7,'A',160,'7A160',11,'হিন্দুধর্ম শিক্ষা',1,'7A16011'),(595,6,'A',1,'6A1',1,'বাংলা',1,'6A11'),(596,6,'A',1,'6A1',2,'English',1,'6A12'),(597,6,'A',1,'6A1',3,'গণিত',1,'6A13'),(598,6,'A',1,'6A1',4,'বিজ্ঞান',1,'6A14'),(599,6,'A',1,'6A1',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A15'),(600,6,'A',1,'6A1',6,'ডিজিটাল প্রযুক্তি',1,'6A16'),(601,6,'A',1,'6A1',7,'স্বাস্থ্য সুরক্ষা',1,'6A17'),(602,6,'A',1,'6A1',8,'জীবন ও জীবিকা',1,'6A18'),(603,6,'A',1,'6A1',9,'শিল্প ও সংস্কৃতি',1,'6A19'),(604,6,'A',1,'6A1',10,'ইসলাম শিক্ষা',1,'6A110'),(605,6,'A',1,'6A1',11,'হিন্দুধর্ম শিক্ষা',1,'6A111'),(606,6,'A',2,'6A2',1,'বাংলা',1,'6A21'),(607,6,'A',2,'6A2',2,'English',1,'6A22'),(608,6,'A',2,'6A2',3,'গণিত',1,'6A23'),(609,6,'A',2,'6A2',4,'বিজ্ঞান',1,'6A24'),(610,6,'A',2,'6A2',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A25'),(611,6,'A',2,'6A2',6,'ডিজিটাল প্রযুক্তি',1,'6A26'),(612,6,'A',2,'6A2',7,'স্বাস্থ্য সুরক্ষা',1,'6A27'),(613,6,'A',2,'6A2',8,'জীবন ও জীবিকা',1,'6A28'),(614,6,'A',2,'6A2',9,'শিল্প ও সংস্কৃতি',1,'6A29'),(615,6,'A',2,'6A2',10,'ইসলাম শিক্ষা',1,'6A210'),(616,6,'A',2,'6A2',11,'হিন্দুধর্ম শিক্ষা',1,'6A211'),(617,6,'A',3,'6A3',1,'বাংলা',1,'6A31'),(618,6,'A',3,'6A3',2,'English',1,'6A32'),(619,6,'A',3,'6A3',3,'গণিত',1,'6A33'),(620,6,'A',3,'6A3',4,'বিজ্ঞান',1,'6A34'),(621,6,'A',3,'6A3',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A35'),(622,6,'A',3,'6A3',6,'ডিজিটাল প্রযুক্তি',1,'6A36'),(623,6,'A',3,'6A3',7,'স্বাস্থ্য সুরক্ষা',1,'6A37'),(624,6,'A',3,'6A3',8,'জীবন ও জীবিকা',1,'6A38'),(625,6,'A',3,'6A3',9,'শিল্প ও সংস্কৃতি',1,'6A39'),(626,6,'A',3,'6A3',10,'ইসলাম শিক্ষা',1,'6A310'),(627,6,'A',3,'6A3',11,'হিন্দুধর্ম শিক্ষা',1,'6A311'),(628,6,'A',4,'6A4',1,'বাংলা',1,'6A41'),(629,6,'A',4,'6A4',2,'English',1,'6A42'),(630,6,'A',4,'6A4',3,'গণিত',1,'6A43'),(631,6,'A',4,'6A4',4,'বিজ্ঞান',1,'6A44'),(632,6,'A',4,'6A4',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A45'),(633,6,'A',4,'6A4',6,'ডিজিটাল প্রযুক্তি',1,'6A46'),(634,6,'A',4,'6A4',7,'স্বাস্থ্য সুরক্ষা',1,'6A47'),(635,6,'A',4,'6A4',8,'জীবন ও জীবিকা',1,'6A48'),(636,6,'A',4,'6A4',9,'শিল্প ও সংস্কৃতি',1,'6A49'),(637,6,'A',4,'6A4',10,'ইসলাম শিক্ষা',1,'6A410'),(638,6,'A',4,'6A4',11,'হিন্দুধর্ম শিক্ষা',1,'6A411'),(639,6,'A',5,'6A5',1,'বাংলা',1,'6A51'),(640,6,'A',5,'6A5',2,'English',1,'6A52'),(641,6,'A',5,'6A5',3,'গণিত',1,'6A53'),(642,6,'A',5,'6A5',4,'বিজ্ঞান',1,'6A54'),(643,6,'A',5,'6A5',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A55'),(644,6,'A',5,'6A5',6,'ডিজিটাল প্রযুক্তি',1,'6A56'),(645,6,'A',5,'6A5',7,'স্বাস্থ্য সুরক্ষা',1,'6A57'),(646,6,'A',5,'6A5',8,'জীবন ও জীবিকা',1,'6A58'),(647,6,'A',5,'6A5',9,'শিল্প ও সংস্কৃতি',1,'6A59'),(648,6,'A',5,'6A5',10,'ইসলাম শিক্ষা',1,'6A510'),(649,6,'A',5,'6A5',11,'হিন্দুধর্ম শিক্ষা',1,'6A511'),(650,6,'A',6,'6A6',1,'বাংলা',1,'6A61'),(651,6,'A',6,'6A6',2,'English',1,'6A62'),(652,6,'A',6,'6A6',3,'গণিত',1,'6A63'),(653,6,'A',6,'6A6',4,'বিজ্ঞান',1,'6A64'),(654,6,'A',6,'6A6',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A65'),(655,6,'A',6,'6A6',6,'ডিজিটাল প্রযুক্তি',1,'6A66'),(656,6,'A',6,'6A6',7,'স্বাস্থ্য সুরক্ষা',1,'6A67'),(657,6,'A',6,'6A6',8,'জীবন ও জীবিকা',1,'6A68'),(658,6,'A',6,'6A6',9,'শিল্প ও সংস্কৃতি',1,'6A69'),(659,6,'A',6,'6A6',10,'ইসলাম শিক্ষা',1,'6A610'),(660,6,'A',6,'6A6',11,'হিন্দুধর্ম শিক্ষা',1,'6A611'),(661,6,'A',7,'6A7',1,'বাংলা',1,'6A71'),(662,6,'A',7,'6A7',2,'English',1,'6A72'),(663,6,'A',7,'6A7',3,'গণিত',1,'6A73'),(664,6,'A',7,'6A7',4,'বিজ্ঞান',1,'6A74'),(665,6,'A',7,'6A7',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A75'),(666,6,'A',7,'6A7',6,'ডিজিটাল প্রযুক্তি',1,'6A76'),(667,6,'A',7,'6A7',7,'স্বাস্থ্য সুরক্ষা',1,'6A77'),(668,6,'A',7,'6A7',8,'জীবন ও জীবিকা',1,'6A78'),(669,6,'A',7,'6A7',9,'শিল্প ও সংস্কৃতি',1,'6A79'),(670,6,'A',7,'6A7',10,'ইসলাম শিক্ষা',1,'6A710'),(671,6,'A',7,'6A7',11,'হিন্দুধর্ম শিক্ষা',1,'6A711'),(672,6,'A',8,'6A8',1,'বাংলা',1,'6A81'),(673,6,'A',8,'6A8',2,'English',1,'6A82'),(674,6,'A',8,'6A8',3,'গণিত',1,'6A83'),(675,6,'A',8,'6A8',4,'বিজ্ঞান',1,'6A84'),(676,6,'A',8,'6A8',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A85'),(677,6,'A',8,'6A8',6,'ডিজিটাল প্রযুক্তি',1,'6A86'),(678,6,'A',8,'6A8',7,'স্বাস্থ্য সুরক্ষা',1,'6A87'),(679,6,'A',8,'6A8',8,'জীবন ও জীবিকা',1,'6A88'),(680,6,'A',8,'6A8',9,'শিল্প ও সংস্কৃতি',1,'6A89'),(681,6,'A',8,'6A8',10,'ইসলাম শিক্ষা',1,'6A810'),(682,6,'A',8,'6A8',11,'হিন্দুধর্ম শিক্ষা',1,'6A811'),(683,6,'A',9,'6A9',1,'বাংলা',1,'6A91'),(684,6,'A',9,'6A9',2,'English',1,'6A92'),(685,6,'A',9,'6A9',3,'গণিত',1,'6A93'),(686,6,'A',9,'6A9',4,'বিজ্ঞান',1,'6A94'),(687,6,'A',9,'6A9',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A95'),(688,6,'A',9,'6A9',6,'ডিজিটাল প্রযুক্তি',1,'6A96'),(689,6,'A',9,'6A9',7,'স্বাস্থ্য সুরক্ষা',1,'6A97'),(690,6,'A',9,'6A9',8,'জীবন ও জীবিকা',1,'6A98'),(691,6,'A',9,'6A9',9,'শিল্প ও সংস্কৃতি',1,'6A99'),(692,6,'A',9,'6A9',10,'ইসলাম শিক্ষা',1,'6A910'),(693,6,'A',9,'6A9',11,'হিন্দুধর্ম শিক্ষা',1,'6A911'),(694,6,'A',10,'6A10',1,'বাংলা',1,'6A101'),(695,6,'A',10,'6A10',2,'English',1,'6A102'),(696,6,'A',10,'6A10',3,'গণিত',1,'6A103'),(697,6,'A',10,'6A10',4,'বিজ্ঞান',1,'6A104'),(698,6,'A',10,'6A10',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A105'),(699,6,'A',10,'6A10',6,'ডিজিটাল প্রযুক্তি',1,'6A106'),(700,6,'A',10,'6A10',7,'স্বাস্থ্য সুরক্ষা',1,'6A107'),(701,6,'A',10,'6A10',8,'জীবন ও জীবিকা',1,'6A108'),(702,6,'A',10,'6A10',9,'শিল্প ও সংস্কৃতি',1,'6A109'),(703,6,'A',10,'6A10',10,'ইসলাম শিক্ষা',1,'6A1010'),(704,6,'A',10,'6A10',11,'হিন্দুধর্ম শিক্ষা',1,'6A1011'),(706,6,'A',11,'6A11',2,'English',1,'6A112'),(707,6,'A',11,'6A11',3,'গণিত',1,'6A113'),(708,6,'A',11,'6A11',4,'বিজ্ঞান',1,'6A114'),(709,6,'A',11,'6A11',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A115'),(710,6,'A',11,'6A11',6,'ডিজিটাল প্রযুক্তি',1,'6A116'),(711,6,'A',11,'6A11',7,'স্বাস্থ্য সুরক্ষা',1,'6A117'),(712,6,'A',11,'6A11',8,'জীবন ও জীবিকা',1,'6A118'),(713,6,'A',11,'6A11',9,'শিল্প ও সংস্কৃতি',1,'6A119'),(714,6,'A',11,'6A11',10,'ইসলাম শিক্ষা',1,'6A1110'),(715,6,'A',11,'6A11',11,'হিন্দুধর্ম শিক্ষা',1,'6A1111'),(716,6,'A',12,'6A12',1,'বাংলা',1,'6A121'),(717,6,'A',12,'6A12',2,'English',1,'6A122'),(718,6,'A',12,'6A12',3,'গণিত',1,'6A123'),(719,6,'A',12,'6A12',4,'বিজ্ঞান',1,'6A124'),(720,6,'A',12,'6A12',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A125'),(721,6,'A',12,'6A12',6,'ডিজিটাল প্রযুক্তি',1,'6A126'),(722,6,'A',12,'6A12',7,'স্বাস্থ্য সুরক্ষা',1,'6A127'),(723,6,'A',12,'6A12',8,'জীবন ও জীবিকা',1,'6A128'),(724,6,'A',12,'6A12',9,'শিল্প ও সংস্কৃতি',1,'6A129'),(725,6,'A',12,'6A12',10,'ইসলাম শিক্ষা',1,'6A1210'),(726,6,'A',12,'6A12',11,'হিন্দুধর্ম শিক্ষা',1,'6A1211'),(727,6,'A',13,'6A13',1,'বাংলা',1,'6A131'),(728,6,'A',13,'6A13',2,'English',1,'6A132'),(729,6,'A',13,'6A13',3,'গণিত',1,'6A133'),(730,6,'A',13,'6A13',4,'বিজ্ঞান',1,'6A134'),(731,6,'A',13,'6A13',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A135'),(732,6,'A',13,'6A13',6,'ডিজিটাল প্রযুক্তি',1,'6A136'),(733,6,'A',13,'6A13',7,'স্বাস্থ্য সুরক্ষা',1,'6A137'),(734,6,'A',13,'6A13',8,'জীবন ও জীবিকা',1,'6A138'),(735,6,'A',13,'6A13',9,'শিল্প ও সংস্কৃতি',1,'6A139'),(736,6,'A',13,'6A13',10,'ইসলাম শিক্ষা',1,'6A1310'),(737,6,'A',13,'6A13',11,'হিন্দুধর্ম শিক্ষা',1,'6A1311'),(738,6,'A',14,'6A14',1,'বাংলা',1,'6A141'),(739,6,'A',14,'6A14',2,'English',1,'6A142'),(740,6,'A',14,'6A14',3,'গণিত',1,'6A143'),(741,6,'A',14,'6A14',4,'বিজ্ঞান',1,'6A144'),(742,6,'A',14,'6A14',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A145'),(743,6,'A',14,'6A14',6,'ডিজিটাল প্রযুক্তি',1,'6A146'),(744,6,'A',14,'6A14',7,'স্বাস্থ্য সুরক্ষা',1,'6A147'),(745,6,'A',14,'6A14',8,'জীবন ও জীবিকা',1,'6A148'),(746,6,'A',14,'6A14',9,'শিল্প ও সংস্কৃতি',1,'6A149'),(747,6,'A',14,'6A14',10,'ইসলাম শিক্ষা',1,'6A1410'),(748,6,'A',14,'6A14',11,'হিন্দুধর্ম শিক্ষা',1,'6A1411'),(749,6,'A',15,'6A15',1,'বাংলা',1,'6A151'),(750,6,'A',15,'6A15',2,'English',1,'6A152'),(751,6,'A',15,'6A15',3,'গণিত',1,'6A153'),(752,6,'A',15,'6A15',4,'বিজ্ঞান',1,'6A154'),(753,6,'A',15,'6A15',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A155'),(754,6,'A',15,'6A15',6,'ডিজিটাল প্রযুক্তি',1,'6A156'),(755,6,'A',15,'6A15',7,'স্বাস্থ্য সুরক্ষা',1,'6A157'),(756,6,'A',15,'6A15',8,'জীবন ও জীবিকা',1,'6A158'),(757,6,'A',15,'6A15',9,'শিল্প ও সংস্কৃতি',1,'6A159'),(758,6,'A',15,'6A15',10,'ইসলাম শিক্ষা',1,'6A1510'),(759,6,'A',15,'6A15',11,'হিন্দুধর্ম শিক্ষা',1,'6A1511'),(760,6,'A',16,'6A16',1,'বাংলা',1,'6A161'),(761,6,'A',16,'6A16',2,'English',1,'6A162'),(762,6,'A',16,'6A16',3,'গণিত',1,'6A163'),(763,6,'A',16,'6A16',4,'বিজ্ঞান',1,'6A164'),(764,6,'A',16,'6A16',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A165'),(765,6,'A',16,'6A16',6,'ডিজিটাল প্রযুক্তি',1,'6A166'),(766,6,'A',16,'6A16',7,'স্বাস্থ্য সুরক্ষা',1,'6A167'),(767,6,'A',16,'6A16',8,'জীবন ও জীবিকা',1,'6A168'),(768,6,'A',16,'6A16',9,'শিল্প ও সংস্কৃতি',1,'6A169'),(769,6,'A',16,'6A16',10,'ইসলাম শিক্ষা',1,'6A1610'),(770,6,'A',16,'6A16',11,'হিন্দুধর্ম শিক্ষা',1,'6A1611'),(771,6,'A',17,'6A17',1,'বাংলা',1,'6A171'),(772,6,'A',17,'6A17',2,'English',1,'6A172'),(773,6,'A',17,'6A17',3,'গণিত',1,'6A173'),(774,6,'A',17,'6A17',4,'বিজ্ঞান',1,'6A174'),(775,6,'A',17,'6A17',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A175'),(776,6,'A',17,'6A17',6,'ডিজিটাল প্রযুক্তি',1,'6A176'),(777,6,'A',17,'6A17',7,'স্বাস্থ্য সুরক্ষা',1,'6A177'),(778,6,'A',17,'6A17',8,'জীবন ও জীবিকা',1,'6A178'),(779,6,'A',17,'6A17',9,'শিল্প ও সংস্কৃতি',1,'6A179'),(780,6,'A',17,'6A17',10,'ইসলাম শিক্ষা',1,'6A1710'),(781,6,'A',17,'6A17',11,'হিন্দুধর্ম শিক্ষা',1,'6A1711'),(782,6,'A',18,'6A18',1,'বাংলা',1,'6A181'),(783,6,'A',18,'6A18',2,'English',1,'6A182'),(784,6,'A',18,'6A18',3,'গণিত',1,'6A183'),(785,6,'A',18,'6A18',4,'বিজ্ঞান',1,'6A184'),(786,6,'A',18,'6A18',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A185'),(787,6,'A',18,'6A18',6,'ডিজিটাল প্রযুক্তি',1,'6A186'),(788,6,'A',18,'6A18',7,'স্বাস্থ্য সুরক্ষা',1,'6A187'),(789,6,'A',18,'6A18',8,'জীবন ও জীবিকা',1,'6A188'),(790,6,'A',18,'6A18',9,'শিল্প ও সংস্কৃতি',1,'6A189'),(791,6,'A',18,'6A18',10,'ইসলাম শিক্ষা',1,'6A1810'),(792,6,'A',18,'6A18',11,'হিন্দুধর্ম শিক্ষা',1,'6A1811'),(793,6,'A',20,'6A20',1,'বাংলা',1,'6A201'),(794,6,'A',20,'6A20',2,'English',1,'6A202'),(795,6,'A',20,'6A20',3,'গণিত',1,'6A203'),(796,6,'A',20,'6A20',4,'বিজ্ঞান',1,'6A204'),(797,6,'A',20,'6A20',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A205'),(798,6,'A',20,'6A20',6,'ডিজিটাল প্রযুক্তি',1,'6A206'),(799,6,'A',20,'6A20',7,'স্বাস্থ্য সুরক্ষা',1,'6A207'),(800,6,'A',20,'6A20',8,'জীবন ও জীবিকা',1,'6A208'),(801,6,'A',20,'6A20',9,'শিল্প ও সংস্কৃতি',1,'6A209'),(802,6,'A',20,'6A20',10,'ইসলাম শিক্ষা',1,'6A2010'),(803,6,'A',20,'6A20',11,'হিন্দুধর্ম শিক্ষা',1,'6A2011'),(805,6,'A',21,'6A21',2,'English',1,'6A212'),(806,6,'A',21,'6A21',3,'গণিত',1,'6A213'),(807,6,'A',21,'6A21',4,'বিজ্ঞান',1,'6A214'),(808,6,'A',21,'6A21',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A215'),(809,6,'A',21,'6A21',6,'ডিজিটাল প্রযুক্তি',1,'6A216'),(810,6,'A',21,'6A21',7,'স্বাস্থ্য সুরক্ষা',1,'6A217'),(811,6,'A',21,'6A21',8,'জীবন ও জীবিকা',1,'6A218'),(812,6,'A',21,'6A21',9,'শিল্প ও সংস্কৃতি',1,'6A219'),(813,6,'A',21,'6A21',10,'ইসলাম শিক্ষা',1,'6A2110'),(814,6,'A',21,'6A21',11,'হিন্দুধর্ম শিক্ষা',1,'6A2111'),(815,6,'A',22,'6A22',1,'বাংলা',1,'6A221'),(816,6,'A',22,'6A22',2,'English',1,'6A222'),(817,6,'A',22,'6A22',3,'গণিত',1,'6A223'),(818,6,'A',22,'6A22',4,'বিজ্ঞান',1,'6A224'),(819,6,'A',22,'6A22',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A225'),(820,6,'A',22,'6A22',6,'ডিজিটাল প্রযুক্তি',1,'6A226'),(821,6,'A',22,'6A22',7,'স্বাস্থ্য সুরক্ষা',1,'6A227'),(822,6,'A',22,'6A22',8,'জীবন ও জীবিকা',1,'6A228'),(823,6,'A',22,'6A22',9,'শিল্প ও সংস্কৃতি',1,'6A229'),(824,6,'A',22,'6A22',10,'ইসলাম শিক্ষা',1,'6A2210'),(825,6,'A',22,'6A22',11,'হিন্দুধর্ম শিক্ষা',1,'6A2211'),(826,6,'A',23,'6A23',1,'বাংলা',1,'6A231'),(827,6,'A',23,'6A23',2,'English',1,'6A232'),(828,6,'A',23,'6A23',3,'গণিত',1,'6A233'),(829,6,'A',23,'6A23',4,'বিজ্ঞান',1,'6A234'),(830,6,'A',23,'6A23',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A235'),(831,6,'A',23,'6A23',6,'ডিজিটাল প্রযুক্তি',1,'6A236'),(832,6,'A',23,'6A23',7,'স্বাস্থ্য সুরক্ষা',1,'6A237'),(833,6,'A',23,'6A23',8,'জীবন ও জীবিকা',1,'6A238'),(834,6,'A',23,'6A23',9,'শিল্প ও সংস্কৃতি',1,'6A239'),(835,6,'A',23,'6A23',10,'ইসলাম শিক্ষা',1,'6A2310'),(836,6,'A',23,'6A23',11,'হিন্দুধর্ম শিক্ষা',1,'6A2311'),(837,6,'A',24,'6A24',1,'বাংলা',1,'6A241'),(838,6,'A',24,'6A24',2,'English',1,'6A242'),(839,6,'A',24,'6A24',3,'গণিত',1,'6A243'),(840,6,'A',24,'6A24',4,'বিজ্ঞান',1,'6A244'),(841,6,'A',24,'6A24',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A245'),(842,6,'A',24,'6A24',6,'ডিজিটাল প্রযুক্তি',1,'6A246'),(843,6,'A',24,'6A24',7,'স্বাস্থ্য সুরক্ষা',1,'6A247'),(844,6,'A',24,'6A24',8,'জীবন ও জীবিকা',1,'6A248'),(845,6,'A',24,'6A24',9,'শিল্প ও সংস্কৃতি',1,'6A249'),(846,6,'A',24,'6A24',10,'ইসলাম শিক্ষা',1,'6A2410'),(847,6,'A',24,'6A24',11,'হিন্দুধর্ম শিক্ষা',1,'6A2411'),(848,6,'A',25,'6A25',1,'বাংলা',1,'6A251'),(849,6,'A',25,'6A25',2,'English',1,'6A252'),(850,6,'A',25,'6A25',3,'গণিত',1,'6A253'),(851,6,'A',25,'6A25',4,'বিজ্ঞান',1,'6A254'),(852,6,'A',25,'6A25',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A255'),(853,6,'A',25,'6A25',6,'ডিজিটাল প্রযুক্তি',1,'6A256'),(854,6,'A',25,'6A25',7,'স্বাস্থ্য সুরক্ষা',1,'6A257'),(855,6,'A',25,'6A25',8,'জীবন ও জীবিকা',1,'6A258'),(856,6,'A',25,'6A25',9,'শিল্প ও সংস্কৃতি',1,'6A259'),(857,6,'A',25,'6A25',10,'ইসলাম শিক্ষা',1,'6A2510'),(858,6,'A',25,'6A25',11,'হিন্দুধর্ম শিক্ষা',1,'6A2511'),(859,6,'A',26,'6A26',1,'বাংলা',1,'6A261'),(860,6,'A',26,'6A26',2,'English',1,'6A262'),(861,6,'A',26,'6A26',3,'গণিত',1,'6A263'),(862,6,'A',26,'6A26',4,'বিজ্ঞান',1,'6A264'),(863,6,'A',26,'6A26',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A265'),(864,6,'A',26,'6A26',6,'ডিজিটাল প্রযুক্তি',1,'6A266'),(865,6,'A',26,'6A26',7,'স্বাস্থ্য সুরক্ষা',1,'6A267'),(866,6,'A',26,'6A26',8,'জীবন ও জীবিকা',1,'6A268'),(867,6,'A',26,'6A26',9,'শিল্প ও সংস্কৃতি',1,'6A269'),(868,6,'A',26,'6A26',10,'ইসলাম শিক্ষা',1,'6A2610'),(869,6,'A',26,'6A26',11,'হিন্দুধর্ম শিক্ষা',1,'6A2611'),(870,6,'A',27,'6A27',1,'বাংলা',1,'6A271'),(871,6,'A',27,'6A27',2,'English',1,'6A272'),(872,6,'A',27,'6A27',3,'গণিত',1,'6A273'),(873,6,'A',27,'6A27',4,'বিজ্ঞান',1,'6A274'),(874,6,'A',27,'6A27',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A275'),(875,6,'A',27,'6A27',6,'ডিজিটাল প্রযুক্তি',1,'6A276'),(876,6,'A',27,'6A27',7,'স্বাস্থ্য সুরক্ষা',1,'6A277'),(877,6,'A',27,'6A27',8,'জীবন ও জীবিকা',1,'6A278'),(878,6,'A',27,'6A27',9,'শিল্প ও সংস্কৃতি',1,'6A279'),(879,6,'A',27,'6A27',10,'ইসলাম শিক্ষা',1,'6A2710'),(880,6,'A',27,'6A27',11,'হিন্দুধর্ম শিক্ষা',1,'6A2711'),(881,6,'A',28,'6A28',1,'বাংলা',1,'6A281'),(882,6,'A',28,'6A28',2,'English',1,'6A282'),(883,6,'A',28,'6A28',3,'গণিত',1,'6A283'),(884,6,'A',28,'6A28',4,'বিজ্ঞান',1,'6A284'),(885,6,'A',28,'6A28',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A285'),(886,6,'A',28,'6A28',6,'ডিজিটাল প্রযুক্তি',1,'6A286'),(887,6,'A',28,'6A28',7,'স্বাস্থ্য সুরক্ষা',1,'6A287'),(888,6,'A',28,'6A28',8,'জীবন ও জীবিকা',1,'6A288'),(889,6,'A',28,'6A28',9,'শিল্প ও সংস্কৃতি',1,'6A289'),(890,6,'A',28,'6A28',10,'ইসলাম শিক্ষা',1,'6A2810'),(891,6,'A',28,'6A28',11,'হিন্দুধর্ম শিক্ষা',1,'6A2811'),(892,6,'A',29,'6A29',1,'বাংলা',1,'6A291'),(893,6,'A',29,'6A29',2,'English',1,'6A292'),(894,6,'A',29,'6A29',3,'গণিত',1,'6A293'),(895,6,'A',29,'6A29',4,'বিজ্ঞান',1,'6A294'),(896,6,'A',29,'6A29',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A295'),(897,6,'A',29,'6A29',6,'ডিজিটাল প্রযুক্তি',1,'6A296'),(898,6,'A',29,'6A29',7,'স্বাস্থ্য সুরক্ষা',1,'6A297'),(899,6,'A',29,'6A29',8,'জীবন ও জীবিকা',1,'6A298'),(900,6,'A',29,'6A29',9,'শিল্প ও সংস্কৃতি',1,'6A299'),(901,6,'A',29,'6A29',10,'ইসলাম শিক্ষা',1,'6A2910'),(902,6,'A',29,'6A29',11,'হিন্দুধর্ম শিক্ষা',1,'6A2911'),(903,6,'A',30,'6A30',1,'বাংলা',1,'6A301'),(904,6,'A',30,'6A30',2,'English',1,'6A302'),(905,6,'A',30,'6A30',3,'গণিত',1,'6A303'),(906,6,'A',30,'6A30',4,'বিজ্ঞান',1,'6A304'),(907,6,'A',30,'6A30',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A305'),(908,6,'A',30,'6A30',6,'ডিজিটাল প্রযুক্তি',1,'6A306'),(909,6,'A',30,'6A30',7,'স্বাস্থ্য সুরক্ষা',1,'6A307'),(910,6,'A',30,'6A30',8,'জীবন ও জীবিকা',1,'6A308'),(911,6,'A',30,'6A30',9,'শিল্প ও সংস্কৃতি',1,'6A309'),(912,6,'A',30,'6A30',10,'ইসলাম শিক্ষা',1,'6A3010'),(913,6,'A',30,'6A30',11,'হিন্দুধর্ম শিক্ষা',1,'6A3011'),(915,6,'A',31,'6A31',2,'English',1,'6A312'),(916,6,'A',31,'6A31',3,'গণিত',1,'6A313'),(917,6,'A',31,'6A31',4,'বিজ্ঞান',1,'6A314'),(918,6,'A',31,'6A31',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A315'),(919,6,'A',31,'6A31',6,'ডিজিটাল প্রযুক্তি',1,'6A316'),(920,6,'A',31,'6A31',7,'স্বাস্থ্য সুরক্ষা',1,'6A317'),(921,6,'A',31,'6A31',8,'জীবন ও জীবিকা',1,'6A318'),(922,6,'A',31,'6A31',9,'শিল্প ও সংস্কৃতি',1,'6A319'),(923,6,'A',31,'6A31',10,'ইসলাম শিক্ষা',1,'6A3110'),(924,6,'A',31,'6A31',11,'হিন্দুধর্ম শিক্ষা',1,'6A3111'),(925,6,'A',33,'6A33',1,'বাংলা',1,'6A331'),(926,6,'A',33,'6A33',2,'English',1,'6A332'),(927,6,'A',33,'6A33',3,'গণিত',1,'6A333'),(928,6,'A',33,'6A33',4,'বিজ্ঞান',1,'6A334'),(929,6,'A',33,'6A33',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A335'),(930,6,'A',33,'6A33',6,'ডিজিটাল প্রযুক্তি',1,'6A336'),(931,6,'A',33,'6A33',7,'স্বাস্থ্য সুরক্ষা',1,'6A337'),(932,6,'A',33,'6A33',8,'জীবন ও জীবিকা',1,'6A338'),(933,6,'A',33,'6A33',9,'শিল্প ও সংস্কৃতি',1,'6A339'),(934,6,'A',33,'6A33',10,'ইসলাম শিক্ষা',1,'6A3310'),(935,6,'A',33,'6A33',11,'হিন্দুধর্ম শিক্ষা',1,'6A3311'),(936,6,'A',34,'6A34',1,'বাংলা',1,'6A341'),(937,6,'A',34,'6A34',2,'English',1,'6A342'),(938,6,'A',34,'6A34',3,'গণিত',1,'6A343'),(939,6,'A',34,'6A34',4,'বিজ্ঞান',1,'6A344'),(940,6,'A',34,'6A34',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A345'),(941,6,'A',34,'6A34',6,'ডিজিটাল প্রযুক্তি',1,'6A346'),(942,6,'A',34,'6A34',7,'স্বাস্থ্য সুরক্ষা',1,'6A347'),(943,6,'A',34,'6A34',8,'জীবন ও জীবিকা',1,'6A348'),(944,6,'A',34,'6A34',9,'শিল্প ও সংস্কৃতি',1,'6A349'),(945,6,'A',34,'6A34',10,'ইসলাম শিক্ষা',1,'6A3410'),(946,6,'A',34,'6A34',11,'হিন্দুধর্ম শিক্ষা',1,'6A3411'),(947,6,'A',37,'6A37',1,'বাংলা',1,'6A371'),(948,6,'A',37,'6A37',2,'English',1,'6A372'),(949,6,'A',37,'6A37',3,'গণিত',1,'6A373'),(950,6,'A',37,'6A37',4,'বিজ্ঞান',1,'6A374'),(951,6,'A',37,'6A37',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A375'),(952,6,'A',37,'6A37',6,'ডিজিটাল প্রযুক্তি',1,'6A376'),(953,6,'A',37,'6A37',7,'স্বাস্থ্য সুরক্ষা',1,'6A377'),(954,6,'A',37,'6A37',8,'জীবন ও জীবিকা',1,'6A378'),(955,6,'A',37,'6A37',9,'শিল্প ও সংস্কৃতি',1,'6A379'),(956,6,'A',37,'6A37',10,'ইসলাম শিক্ষা',1,'6A3710'),(957,6,'A',37,'6A37',11,'হিন্দুধর্ম শিক্ষা',1,'6A3711'),(958,6,'A',38,'6A38',1,'বাংলা',1,'6A381'),(959,6,'A',38,'6A38',2,'English',1,'6A382'),(960,6,'A',38,'6A38',3,'গণিত',1,'6A383'),(961,6,'A',38,'6A38',4,'বিজ্ঞান',1,'6A384'),(962,6,'A',38,'6A38',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A385'),(963,6,'A',38,'6A38',6,'ডিজিটাল প্রযুক্তি',1,'6A386'),(964,6,'A',38,'6A38',7,'স্বাস্থ্য সুরক্ষা',1,'6A387'),(965,6,'A',38,'6A38',8,'জীবন ও জীবিকা',1,'6A388'),(966,6,'A',38,'6A38',9,'শিল্প ও সংস্কৃতি',1,'6A389'),(967,6,'A',38,'6A38',10,'ইসলাম শিক্ষা',1,'6A3810'),(968,6,'A',38,'6A38',11,'হিন্দুধর্ম শিক্ষা',1,'6A3811'),(969,6,'A',39,'6A39',1,'বাংলা',1,'6A391'),(970,6,'A',39,'6A39',2,'English',1,'6A392'),(971,6,'A',39,'6A39',3,'গণিত',1,'6A393'),(972,6,'A',39,'6A39',4,'বিজ্ঞান',1,'6A394'),(973,6,'A',39,'6A39',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A395'),(974,6,'A',39,'6A39',6,'ডিজিটাল প্রযুক্তি',1,'6A396'),(975,6,'A',39,'6A39',7,'স্বাস্থ্য সুরক্ষা',1,'6A397'),(976,6,'A',39,'6A39',8,'জীবন ও জীবিকা',1,'6A398'),(977,6,'A',39,'6A39',9,'শিল্প ও সংস্কৃতি',1,'6A399'),(978,6,'A',39,'6A39',10,'ইসলাম শিক্ষা',1,'6A3910'),(979,6,'A',39,'6A39',11,'হিন্দুধর্ম শিক্ষা',1,'6A3911'),(980,6,'A',40,'6A40',1,'বাংলা',1,'6A401'),(981,6,'A',40,'6A40',2,'English',1,'6A402'),(982,6,'A',40,'6A40',3,'গণিত',1,'6A403'),(983,6,'A',40,'6A40',4,'বিজ্ঞান',1,'6A404'),(984,6,'A',40,'6A40',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A405'),(985,6,'A',40,'6A40',6,'ডিজিটাল প্রযুক্তি',1,'6A406'),(986,6,'A',40,'6A40',7,'স্বাস্থ্য সুরক্ষা',1,'6A407'),(987,6,'A',40,'6A40',8,'জীবন ও জীবিকা',1,'6A408'),(988,6,'A',40,'6A40',9,'শিল্প ও সংস্কৃতি',1,'6A409'),(989,6,'A',40,'6A40',10,'ইসলাম শিক্ষা',1,'6A4010'),(990,6,'A',40,'6A40',11,'হিন্দুধর্ম শিক্ষা',1,'6A4011'),(992,6,'A',41,'6A41',2,'English',1,'6A412'),(993,6,'A',41,'6A41',3,'গণিত',1,'6A413'),(994,6,'A',41,'6A41',4,'বিজ্ঞান',1,'6A414'),(995,6,'A',41,'6A41',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A415'),(996,6,'A',41,'6A41',6,'ডিজিটাল প্রযুক্তি',1,'6A416'),(997,6,'A',41,'6A41',7,'স্বাস্থ্য সুরক্ষা',1,'6A417'),(998,6,'A',41,'6A41',8,'জীবন ও জীবিকা',1,'6A418'),(999,6,'A',41,'6A41',9,'শিল্প ও সংস্কৃতি',1,'6A419'),(1000,6,'A',41,'6A41',10,'ইসলাম শিক্ষা',1,'6A4110'),(1001,6,'A',41,'6A41',11,'হিন্দুধর্ম শিক্ষা',1,'6A4111'),(1002,6,'A',42,'6A42',1,'বাংলা',1,'6A421'),(1003,6,'A',42,'6A42',2,'English',1,'6A422'),(1004,6,'A',42,'6A42',3,'গণিত',1,'6A423'),(1005,6,'A',42,'6A42',4,'বিজ্ঞান',1,'6A424'),(1006,6,'A',42,'6A42',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A425'),(1007,6,'A',42,'6A42',6,'ডিজিটাল প্রযুক্তি',1,'6A426'),(1008,6,'A',42,'6A42',7,'স্বাস্থ্য সুরক্ষা',1,'6A427'),(1009,6,'A',42,'6A42',8,'জীবন ও জীবিকা',1,'6A428'),(1010,6,'A',42,'6A42',9,'শিল্প ও সংস্কৃতি',1,'6A429'),(1011,6,'A',42,'6A42',10,'ইসলাম শিক্ষা',1,'6A4210'),(1012,6,'A',42,'6A42',11,'হিন্দুধর্ম শিক্ষা',1,'6A4211'),(1013,6,'A',43,'6A43',1,'বাংলা',1,'6A431'),(1014,6,'A',43,'6A43',2,'English',1,'6A432'),(1015,6,'A',43,'6A43',3,'গণিত',1,'6A433'),(1016,6,'A',43,'6A43',4,'বিজ্ঞান',1,'6A434'),(1017,6,'A',43,'6A43',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A435'),(1018,6,'A',43,'6A43',6,'ডিজিটাল প্রযুক্তি',1,'6A436'),(1019,6,'A',43,'6A43',7,'স্বাস্থ্য সুরক্ষা',1,'6A437'),(1020,6,'A',43,'6A43',8,'জীবন ও জীবিকা',1,'6A438'),(1021,6,'A',43,'6A43',9,'শিল্প ও সংস্কৃতি',1,'6A439'),(1022,6,'A',43,'6A43',10,'ইসলাম শিক্ষা',1,'6A4310'),(1023,6,'A',43,'6A43',11,'হিন্দুধর্ম শিক্ষা',1,'6A4311'),(1024,6,'A',44,'6A44',1,'বাংলা',1,'6A441'),(1025,6,'A',44,'6A44',2,'English',1,'6A442'),(1026,6,'A',44,'6A44',3,'গণিত',1,'6A443'),(1027,6,'A',44,'6A44',4,'বিজ্ঞান',1,'6A444'),(1028,6,'A',44,'6A44',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A445'),(1029,6,'A',44,'6A44',6,'ডিজিটাল প্রযুক্তি',1,'6A446'),(1030,6,'A',44,'6A44',7,'স্বাস্থ্য সুরক্ষা',1,'6A447'),(1031,6,'A',44,'6A44',8,'জীবন ও জীবিকা',1,'6A448'),(1032,6,'A',44,'6A44',9,'শিল্প ও সংস্কৃতি',1,'6A449'),(1033,6,'A',44,'6A44',10,'ইসলাম শিক্ষা',1,'6A4410'),(1034,6,'A',44,'6A44',11,'হিন্দুধর্ম শিক্ষা',1,'6A4411'),(1035,6,'A',45,'6A45',1,'বাংলা',1,'6A451'),(1036,6,'A',45,'6A45',2,'English',1,'6A452'),(1037,6,'A',45,'6A45',3,'গণিত',1,'6A453'),(1038,6,'A',45,'6A45',4,'বিজ্ঞান',1,'6A454'),(1039,6,'A',45,'6A45',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A455'),(1040,6,'A',45,'6A45',6,'ডিজিটাল প্রযুক্তি',1,'6A456'),(1041,6,'A',45,'6A45',7,'স্বাস্থ্য সুরক্ষা',1,'6A457'),(1042,6,'A',45,'6A45',8,'জীবন ও জীবিকা',1,'6A458'),(1043,6,'A',45,'6A45',9,'শিল্প ও সংস্কৃতি',1,'6A459'),(1044,6,'A',45,'6A45',10,'ইসলাম শিক্ষা',1,'6A4510'),(1045,6,'A',45,'6A45',11,'হিন্দুধর্ম শিক্ষা',1,'6A4511'),(1046,6,'A',47,'6A47',1,'বাংলা',1,'6A471'),(1047,6,'A',47,'6A47',2,'English',1,'6A472'),(1048,6,'A',47,'6A47',3,'গণিত',1,'6A473'),(1049,6,'A',47,'6A47',4,'বিজ্ঞান',1,'6A474'),(1050,6,'A',47,'6A47',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A475'),(1051,6,'A',47,'6A47',6,'ডিজিটাল প্রযুক্তি',1,'6A476'),(1052,6,'A',47,'6A47',7,'স্বাস্থ্য সুরক্ষা',1,'6A477'),(1053,6,'A',47,'6A47',8,'জীবন ও জীবিকা',1,'6A478'),(1054,6,'A',47,'6A47',9,'শিল্প ও সংস্কৃতি',1,'6A479'),(1055,6,'A',47,'6A47',10,'ইসলাম শিক্ষা',1,'6A4710'),(1056,6,'A',47,'6A47',11,'হিন্দুধর্ম শিক্ষা',1,'6A4711'),(1057,6,'A',48,'6A48',1,'বাংলা',1,'6A481'),(1058,6,'A',48,'6A48',2,'English',1,'6A482'),(1059,6,'A',48,'6A48',3,'গণিত',1,'6A483'),(1060,6,'A',48,'6A48',4,'বিজ্ঞান',1,'6A484'),(1061,6,'A',48,'6A48',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A485'),(1062,6,'A',48,'6A48',6,'ডিজিটাল প্রযুক্তি',1,'6A486'),(1063,6,'A',48,'6A48',7,'স্বাস্থ্য সুরক্ষা',1,'6A487'),(1064,6,'A',48,'6A48',8,'জীবন ও জীবিকা',1,'6A488'),(1065,6,'A',48,'6A48',9,'শিল্প ও সংস্কৃতি',1,'6A489'),(1066,6,'A',48,'6A48',10,'ইসলাম শিক্ষা',1,'6A4810'),(1067,6,'A',48,'6A48',11,'হিন্দুধর্ম শিক্ষা',1,'6A4811'),(1068,6,'A',49,'6A49',1,'বাংলা',1,'6A491'),(1069,6,'A',49,'6A49',2,'English',1,'6A492'),(1070,6,'A',49,'6A49',3,'গণিত',1,'6A493'),(1071,6,'A',49,'6A49',4,'বিজ্ঞান',1,'6A494'),(1072,6,'A',49,'6A49',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A495'),(1073,6,'A',49,'6A49',6,'ডিজিটাল প্রযুক্তি',1,'6A496'),(1074,6,'A',49,'6A49',7,'স্বাস্থ্য সুরক্ষা',1,'6A497'),(1075,6,'A',49,'6A49',8,'জীবন ও জীবিকা',1,'6A498'),(1076,6,'A',49,'6A49',9,'শিল্প ও সংস্কৃতি',1,'6A499'),(1077,6,'A',49,'6A49',10,'ইসলাম শিক্ষা',1,'6A4910'),(1078,6,'A',49,'6A49',11,'হিন্দুধর্ম শিক্ষা',1,'6A4911'),(1079,6,'A',50,'6A50',1,'বাংলা',1,'6A501'),(1080,6,'A',50,'6A50',2,'English',1,'6A502'),(1081,6,'A',50,'6A50',3,'গণিত',1,'6A503'),(1082,6,'A',50,'6A50',4,'বিজ্ঞান',1,'6A504'),(1083,6,'A',50,'6A50',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A505'),(1084,6,'A',50,'6A50',6,'ডিজিটাল প্রযুক্তি',1,'6A506'),(1085,6,'A',50,'6A50',7,'স্বাস্থ্য সুরক্ষা',1,'6A507'),(1086,6,'A',50,'6A50',8,'জীবন ও জীবিকা',1,'6A508'),(1087,6,'A',50,'6A50',9,'শিল্প ও সংস্কৃতি',1,'6A509'),(1088,6,'A',50,'6A50',10,'ইসলাম শিক্ষা',1,'6A5010'),(1089,6,'A',50,'6A50',11,'হিন্দুধর্ম শিক্ষা',1,'6A5011'),(1091,6,'A',51,'6A51',2,'English',1,'6A512'),(1092,6,'A',51,'6A51',3,'গণিত',1,'6A513'),(1093,6,'A',51,'6A51',4,'বিজ্ঞান',1,'6A514'),(1094,6,'A',51,'6A51',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A515'),(1095,6,'A',51,'6A51',6,'ডিজিটাল প্রযুক্তি',1,'6A516'),(1096,6,'A',51,'6A51',7,'স্বাস্থ্য সুরক্ষা',1,'6A517'),(1097,6,'A',51,'6A51',8,'জীবন ও জীবিকা',1,'6A518'),(1098,6,'A',51,'6A51',9,'শিল্প ও সংস্কৃতি',1,'6A519'),(1099,6,'A',51,'6A51',10,'ইসলাম শিক্ষা',1,'6A5110'),(1100,6,'A',51,'6A51',11,'হিন্দুধর্ম শিক্ষা',1,'6A5111'),(1101,6,'A',52,'6A52',1,'বাংলা',1,'6A521'),(1102,6,'A',52,'6A52',2,'English',1,'6A522'),(1103,6,'A',52,'6A52',3,'গণিত',1,'6A523'),(1104,6,'A',52,'6A52',4,'বিজ্ঞান',1,'6A524'),(1105,6,'A',52,'6A52',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A525'),(1106,6,'A',52,'6A52',6,'ডিজিটাল প্রযুক্তি',1,'6A526'),(1107,6,'A',52,'6A52',7,'স্বাস্থ্য সুরক্ষা',1,'6A527'),(1108,6,'A',52,'6A52',8,'জীবন ও জীবিকা',1,'6A528'),(1109,6,'A',52,'6A52',9,'শিল্প ও সংস্কৃতি',1,'6A529'),(1110,6,'A',52,'6A52',10,'ইসলাম শিক্ষা',1,'6A5210'),(1111,6,'A',52,'6A52',11,'হিন্দুধর্ম শিক্ষা',1,'6A5211'),(1112,6,'A',53,'6A53',1,'বাংলা',1,'6A531'),(1113,6,'A',53,'6A53',2,'English',1,'6A532'),(1114,6,'A',53,'6A53',3,'গণিত',1,'6A533'),(1115,6,'A',53,'6A53',4,'বিজ্ঞান',1,'6A534'),(1116,6,'A',53,'6A53',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A535'),(1117,6,'A',53,'6A53',6,'ডিজিটাল প্রযুক্তি',1,'6A536'),(1118,6,'A',53,'6A53',7,'স্বাস্থ্য সুরক্ষা',1,'6A537'),(1119,6,'A',53,'6A53',8,'জীবন ও জীবিকা',1,'6A538'),(1120,6,'A',53,'6A53',9,'শিল্প ও সংস্কৃতি',1,'6A539'),(1121,6,'A',53,'6A53',10,'ইসলাম শিক্ষা',1,'6A5310'),(1122,6,'A',53,'6A53',11,'হিন্দুধর্ম শিক্ষা',1,'6A5311'),(1123,6,'A',54,'6A54',1,'বাংলা',1,'6A541'),(1124,6,'A',54,'6A54',2,'English',1,'6A542'),(1125,6,'A',54,'6A54',3,'গণিত',1,'6A543'),(1126,6,'A',54,'6A54',4,'বিজ্ঞান',1,'6A544'),(1127,6,'A',54,'6A54',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A545'),(1128,6,'A',54,'6A54',6,'ডিজিটাল প্রযুক্তি',1,'6A546'),(1129,6,'A',54,'6A54',7,'স্বাস্থ্য সুরক্ষা',1,'6A547'),(1130,6,'A',54,'6A54',8,'জীবন ও জীবিকা',1,'6A548'),(1131,6,'A',54,'6A54',9,'শিল্প ও সংস্কৃতি',1,'6A549'),(1132,6,'A',54,'6A54',10,'ইসলাম শিক্ষা',1,'6A5410'),(1133,6,'A',54,'6A54',11,'হিন্দুধর্ম শিক্ষা',1,'6A5411'),(1134,6,'A',19,'6A19',1,'বাংলা',1,'6A191'),(1135,6,'A',19,'6A19',2,'English',1,'6A192'),(1136,6,'A',19,'6A19',3,'গণিত',1,'6A193'),(1137,6,'A',19,'6A19',4,'বিজ্ঞান',1,'6A194'),(1138,6,'A',19,'6A19',5,'ইতিহাস ও সামাজিক বিজ্ঞান',1,'6A195'),(1139,6,'A',19,'6A19',6,'ডিজিটাল প্রযুক্তি',1,'6A196'),(1140,6,'A',19,'6A19',7,'স্বাস্থ্য সুরক্ষা',1,'6A197'),(1141,6,'A',19,'6A19',8,'জীবন ও জীবিকা',1,'6A198'),(1142,6,'A',19,'6A19',9,'শিল্প ও সংস্কৃতি',1,'6A199'),(1143,6,'A',19,'6A19',10,'ইসলাম শিক্ষা',1,'6A1910'),(1144,6,'A',19,'6A19',11,'হিন্দুধর্ম শিক্ষা',1,'6A1911');
/*!40000 ALTER TABLE `sturegsubject` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sturegsubject` with 1138 row(s)
--

--
-- Table structure for table `subject`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) NOT NULL,
  `classnumber` varchar(255) NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `subcode` int(255) NOT NULL,
  `subfullmarks` int(255) NOT NULL,
  `gradecode` varchar(255) NOT NULL,
  `subteacher` varchar(255) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `uni` varchar(255) NOT NULL,
  `barcode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`uni`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `subject` VALUES (24,'Class Eight','8','A','Math',109,100,'gr001','Shuvo Biswas',1,'8A109',0),(25,'Class Eight','8','A','Bangladesh & Global Studies',150,100,'gr001','Shuvo Biswas',1,'8A150',0),(26,'Class Eight','8','A','Science',127,100,'gr001','Shuvo Biswas',1,'8A127',0),(27,'Class Eight','8','A','Religion',111,100,'gr001','Shuvo Biswas',1,'8A111',0),(28,'Class Eight','8','A','ICT',154,50,'gr002','Shuvo Biswas',1,'8A154',0),(29,'Class Nine','9','Science','Bangla 1st Paper',101,100,'gr001','Shuvo Biswas',1,'9Science101',0),(30,'Class Nine','9','Science','Bangla 2nd Paper',102,100,'gr001','Shuvo Biswas',1,'9Science102',0),(31,'Class Nine','9','Science','English 1st Paper',107,100,'gr001','Shuvo Biswas',1,'9Science107',0),(32,'Class Nine','9','Science','English 2nd Paper',108,100,'gr001','Shuvo Biswas',1,'9Science108',0),(33,'Class Nine','9','Science','Math',109,100,'gr001','Shuvo Biswas',1,'9Science109',0),(34,'Class Nine','9','Science','Bangladesh & Global Studies',150,100,'gr001','Shuvo Biswas',1,'9Science150',0),(35,'Class Nine','9','Science','Physics',136,100,'gr001','Shuvo Biswas',1,'9Science136',0),(37,'Class Nine','9','Science','Biology',138,100,'gr001','Shuvo Biswas',1,'9Science138',0),(38,'Class Nine','9','Science','Higher Math',126,100,'gr001','Shuvo Biswas',1,'9Science126',0),(39,'Class Nine','9','Science','Agriculture Studies',134,100,'gr001','Shuvo Biswas',1,'9Science134',0),(40,'Class Ten','10','Science','Bangla 1st Paper',101,100,'gr001','Shuvo Biswas',1,'10Science101',0),(41,'Class Ten','10','Science','Bangla 2nd Paper',102,100,'gr001','Shuvo Biswas',1,'10Science102',0),(42,'Class Ten','10','Science','English 1st Paper',107,100,'gr001','Shuvo Biswas',1,'10Science107',0),(43,'Class Ten','10','Science','English 2nd Paper',108,100,'gr001','Shuvo Biswas',1,'10Science108',0),(44,'Class Ten','10','Science','Math',109,100,'gr001','Shuvo Biswas',1,'10Science109',0),(45,'Class Ten','10','Science','Bangladesh & Global Studies',150,100,'gr001','Shuvo Biswas',1,'10Science150',0),(46,'Class Ten','10','Science','Physics',136,100,'gr001','Shuvo Biswas',1,'10Science136',0),(47,'Class Ten','10','Science','Chemstry',137,100,'gr001','Shuvo Biswas',1,'10Science137',0),(48,'Class Ten','10','Science','Biology',138,100,'gr001','Shuvo Biswas',1,'10Science138',0),(49,'Class Ten','10','Science','Higher Math',126,100,'gr001','Shuvo Biswas',1,'10Science126',0),(50,'Class Ten','10','Science','Agriculture Studies',134,100,'gr001','Shuvo Biswas',1,'10Science134',0),(51,'Class Nine','9','Arts','Bangla 1st Paper',101,100,'gr001','Shuvo Biswas',1,'9Arts101',0),(52,'Class Nine','9','Arts','Bangla 2nd Paper',102,100,'gr001','Shuvo Biswas',1,'9Arts102',0),(53,'Class Nine','9','Arts','English 1st Paper',107,100,'gr001','Shuvo Biswas',1,'9Arts107',0),(54,'Class Nine','9','Arts','English 2nd Paper',108,100,'gr001','Shuvo Biswas',1,'9Arts108',0),(55,'Class Nine','9','Arts','Math',109,100,'gr001','Shuvo Biswas',1,'9Arts109',0),(56,'Class Nine','9','Arts','Science',127,100,'gr001','Shuvo Biswas',1,'9Arts127',0),(57,'Class Nine','9','Arts','History',153,100,'gr001','Shuvo Biswas',1,'9Arts153',0),(59,'Class Nine','9','Arts','Geography',110,100,'gr001','Shuvo Biswas',1,'9Arts110',0),(65,'Class Ten','10','Science','ICT',154,50,'gr002','Shuvo Biswas',1,'10Science154',0),(67,'Class Nine','9','Science','Religion',111,100,'gr001','Shuvo Biswas',1,'9Science111',0),(69,'Class Nine','9','Arts','Religion',111,100,'gr001','Shuvo Biswas',1,'9Arts111',0),(70,'Class Nine','9','Arts','Agriculture Studies',134,100,'gr001','Shuvo Biswas',1,'9Arts134',0),(72,'Class Ten','10','Arts','Bangla 1st Paper',101,100,'gr001','Shuvo Biswas',1,'10Arts101',0),(73,'Class Ten','10','Arts','Bangla 2nd Paper',102,100,'gr001','Shuvo Biswas',1,'10Arts102',0),(74,'Class Ten','10','Arts','English 1st Paper',107,100,'gr001','Shuvo Biswas',1,'10Arts107',0),(75,'Class Ten','10','Arts','English 2nd Paper',108,100,'gr001','Shuvo Biswas',1,'10Arts108',0),(76,'Class Ten','10','Arts','Math',109,100,'gr001','Shuvo Biswas',1,'10Arts109',0),(77,'Class Ten','10','Arts','Science',127,100,'gr001','Shuvo Biswas',1,'10Arts127',0),(78,'Class Ten','10','Arts','History',153,100,'gr001','Shuvo Biswas',1,'10Arts153',0),(79,'Class Ten','10','Arts','Geography',110,100,'gr001','Shuvo Biswas',1,'10Arts110',0),(81,'Class Ten','10','Arts','Religion',111,100,'gr001','Shuvo Biswas',1,'10Arts111',0),(82,'Class Ten','10','Arts','Agriculture Studies',134,100,'gr001','Shuvo Biswas',1,'10Arts134',0),(83,'Class Ten','10','Arts','ICT',154,50,'gr002','Shuvo Biswas',1,'10Arts154',0),(84,'Class Nine','9','Commerce','Bangla 1st Paper',101,100,'gr001','Shuvo Biswas',1,'9Commerce101',0),(85,'Class Nine','9','Commerce','Bangla 2nd Paper',102,100,'gr001','Shuvo Biswas',1,'9Commerce102',0),(86,'Class Nine','9','Commerce','English 1st Paper',107,100,'gr001','Shuvo Biswas',1,'9Commerce107',0),(87,'Class Nine','9','Commerce','English 2nd Paper',108,100,'gr001','Shuvo Biswas',1,'9Commerce108',0),(88,'Class Nine','9','Commerce','Math',109,100,'gr001','Shuvo Biswas',1,'9Commerce109',0),(89,'Class Nine','9','Commerce','Religion',111,100,'gr001','Shuvo Biswas',1,'9Commerce111',0),(90,'Class Nine','9','Commerce','ICT',154,50,'gr002','Shuvo Biswas',1,'9Commerce154',0),(92,'Class Nine','9','Commerce','Accounting',146,100,'gr001','Shuvo Biswas',1,'9Commerce146',0),(93,'Class Nine','9','Commerce','Science',127,100,'gr001','Shuvo Biswas',1,'9Commerce127',0),(94,'Class Nine','9','Commerce','Finance & Banking',152,100,'gr001','Shuvo Biswas',1,'9Commerce152',0),(95,'Class Nine','9','Commerce','Business Ent.',143,100,'gr001','Shuvo Biswas',1,'9Commerce143',0),(96,'Class Nine','9','Commerce','Agricultural Studies',134,100,'gr001','Shuvo Biswas',1,'9Commerce134',0),(97,'Class Ten','10','Commerce','Bangla 1st Paper',101,100,'gr001','Shuvo Biswas',1,'10Commerce101',0),(98,'Class Ten','10','Commerce','Bangla 2nd Paper',102,100,'gr001','Shuvo Biswas',1,'10Commerce102',0),(99,'Class Ten','10','Commerce','English 1st Paper',107,100,'gr001','Shuvo Biswas',1,'10Commerce107',0),(100,'Class Ten','10','Commerce','English 2nd Paper',108,100,'gr001','Shuvo Biswas',1,'10Commerce108',0),(101,'Class Ten','10','Commerce','Math',109,100,'gr001','Shuvo Biswas',1,'10Commerce109',0),(102,'Class Ten','10','Commerce','Religion',111,100,'gr001','Shuvo Biswas',1,'10Commerce111',0),(103,'Class Ten','10','Commerce','ICT',154,50,'gr002','Shuvo Biswas',1,'10Commerce154',0),(104,'Class Ten','10','Commerce','Accounting',146,100,'gr001','Shuvo Biswas',1,'10Commerce146',0),(105,'Class Ten','10','Commerce','Science',127,100,'gr001','Shuvo Biswas',1,'10Commerce127',0),(106,'Class Ten','10','Commerce','Finance & Banking',152,100,'gr001','Shuvo Biswas',1,'10Commerce152',0),(107,'Class Ten','10','Commerce','Business Ent.',143,100,'gr001','Shuvo Biswas',1,'10Commerce143',0),(108,'Class Ten','10','Commerce','Agricultural Studies',134,100,'gr001','Shuvo Biswas',1,'10Commerce134',0),(131,'Class Eight','8','B','Math',109,100,'gr001','Shuvo Biswas',1,'8B109',0),(132,'Class Eight','8','B','Bangladesh & Global Studies',150,100,'gr001','Shuvo Biswas',1,'8B150',0),(133,'Class Eight','8','B','Science',127,100,'gr001','Shuvo Biswas',1,'8B127',0),(134,'Class Eight','8','B','Religion',111,100,'gr001','Shuvo Biswas',1,'8B111',0),(135,'Class Eight','8','B','ICT',154,50,'gr002','Shuvo Biswas',1,'8B154',0),(137,'Class Nine','9','Science','Chemistry',137,100,'gr001','BIKASH CHANDRA BISWAS',1,'9Science137',0),(142,'Class Nine','9','Science','ICT',154,50,'gr002','BIKASH CHANDRA BISWAS',1,'9Science154',0),(143,'Class Nine','9','Arts','ICT',154,50,'gr002','BIKASH CHANDRA BISWAS',1,'9Arts154',0),(194,'Class Eight','8','A','Agriculture Studies',134,25,'gr003','PRODYUT KUMAR BHADRA',1005564,'8A134',0),(202,'Class Eight','8','B','Agriculture Studies',134,25,'gr003','PRODYUT KUMAR BHADRA',1005564,'8B134',0),(203,'Class Nine','9','Arts','Economic',140,100,'gr001','PRODYUT KUMAR BHADRA',1005564,'9Arts140',0),(258,'Class Ten','10','Arts','Economy',140,100,'gr001','PRODYUT KUMAR BHADRA',1005564,'10Arts140',0),(263,'Class Ten','10','Science','Religion',111,100,'gr001','PRADYUT KUMAR BHADRA',1005564,'10Science111',0),(264,'Class Eight','8','A','Bangla',101,100,'gr001','Jagadish Chandra Majumder',3,'8A101',0),(266,'Class Eight','8','A','English',107,100,'gr001','Jagadish Chandra Majumder',3,'8A107',0),(268,'Class Eight','8','B','English',107,100,'gr001','PRADYUT KUMAR BHADRA',1005564,'8B107',0),(269,'Class Eight','8','B','Bangla',101,100,'gr001','Jagadish Chandra Majumder',3,'8B101',0),(270,'Class Six','6','A','বাংলা',1,100,'0','Shuvo Biswas',1,'6A1',0),(271,'Class Six','6','A','English',2,100,'0','Shuvo Biswas',1,'6A2',0),(272,'Class Six','6','A','গণিত',3,100,'0','Shuvo Biswas',1,'6A3',0),(273,'Class Six','6','A','বিজ্ঞান',4,100,'0','Shuvo Biswas',1,'6A4',0),(274,'Class Six','6','A','ইতিহাস ও সামাজিক বিজ্ঞান',5,100,'0','Shuvo Biswas',1,'6A5',0),(275,'Class Six','6','A','ডিজিটাল প্রযুক্তি',6,100,'0','Shuvo Biswas',1,'6A6',0),(276,'Class Six','6','A','স্বাস্থ্য সুরক্ষা',7,100,'0','Shuvo Biswas',1,'6A7',0),(277,'Class Six','6','A','জীবন ও জীবিকা',8,100,'0','Shuvo Biswas',1,'6A8',0),(278,'Class Six','6','A','শিল্প ও সংস্কৃতি',9,100,'0','Shuvo Biswas',1,'6A9',0),(279,'Class Six','6','A','ইসলাম শিক্ষা',10,100,'0','Shuvo Biswas',1,'6A10',0),(280,'Class Six','6','A','হিন্দুধর্ম শিক্ষা',11,100,'0','Shuvo Biswas',1,'6A11',0),(281,'Class Six','6','B','বাংলা',1,100,'0','Shuvo Biswas',1,'6B1',0),(282,'Class Six','6','B','English',2,100,'0','Shuvo Biswas',1,'6B2',0),(283,'Class Six','6','B','গণিত',3,100,'0','Shuvo Biswas',1,'6B3',0),(284,'Class Six','6','B','বিজ্ঞান',4,100,'0','Shuvo Biswas',1,'6B4',0),(285,'Class Six','6','B','ইতিহাস ও সামাজিক বিজ্ঞান',5,100,'0','Shuvo Biswas',1,'6B5',0),(286,'Class Six','6','B','ডিজিটাল প্রযুক্তি',6,100,'0','Shuvo Biswas',1,'6B6',0),(287,'Class Six','6','B','স্বাস্থ্য সুরক্ষা',7,100,'0','Shuvo Biswas',1,'6B7',0),(288,'Class Six','6','B','জীবন ও জীবিকা',8,100,'0','Shuvo Biswas',1,'6B8',0),(289,'Class Six','6','B','শিল্প ও সংস্কৃতি',9,100,'0','Shuvo Biswas',1,'6B9',0),(290,'Class Six','6','B','ইসলাম শিক্ষা',10,100,'0','Shuvo Biswas',1,'6B10',0),(291,'Class Six','6','B','হিন্দুধর্ম শিক্ষা',11,100,'0','Shuvo Biswas',1,'6B11',0),(292,'Class Seven','7','B','বাংলা',1,100,'0','Shuvo Biswas',1,'7B1',0),(293,'Class Seven','7','B','English',2,100,'0','Shuvo Biswas',1,'7B2',0),(294,'Class Seven','7','B','গণিত',3,100,'0','Shuvo Biswas',1,'7B3',0),(295,'Class Seven','7','B','বিজ্ঞান',4,100,'0','Shuvo Biswas',1,'7B4',0),(296,'Class Seven','7','B','ইতিহাস ও সামাজিক বিজ্ঞান',5,100,'0','Shuvo Biswas',1,'7B5',0),(297,'Class Seven','7','B','ডিজিটাল প্রযুক্তি',6,100,'0','Shuvo Biswas',1,'7B6',0),(298,'Class Seven','7','B','স্বাস্থ্য সুরক্ষা',7,100,'0','Shuvo Biswas',1,'7B7',0),(299,'Class Seven','7','B','জীবন ও জীবিকা',8,100,'0','Shuvo Biswas',1,'7B8',0),(300,'Class Seven','7','B','শিল্প ও সংস্কৃতি',9,100,'0','Shuvo Biswas',1,'7B9',0),(301,'Class Seven','7','B','ইসলাম শিক্ষা',10,100,'0','Shuvo Biswas',1,'7B10',0),(302,'Class Seven','7','B','হিন্দুধর্ম শিক্ষা',11,100,'0','Shuvo Biswas',1,'7B11',0),(303,'Class Seven','7','A','বাংলা',1,100,'0','Shuvo Biswas',1,'7A1',0),(304,'Class Seven','7','A','English',2,100,'0','Shuvo Biswas',1,'7A2',0),(305,'Class Seven','7','A','গণিত',3,100,'0','Shuvo Biswas',1,'7A3',0),(306,'Class Seven','7','A','বিজ্ঞান',4,100,'0','Shuvo Biswas',1,'7A4',0),(307,'Class Seven','7','A','ইতিহাস ও সামাজিক বিজ্ঞান',5,100,'0','Shuvo Biswas',1,'7A5',0),(308,'Class Seven','7','A','ডিজিটাল প্রযুক্তি',6,100,'0','Shuvo Biswas',1,'7A6',0),(309,'Class Seven','7','A','স্বাস্থ্য সুরক্ষা',7,100,'0','Shuvo Biswas',1,'7A7',0),(310,'Class Seven','7','A','জীবন ও জীবিকা',8,100,'0','Shuvo Biswas',1,'7A8',0),(311,'Class Seven','7','A','শিল্প ও সংস্কৃতি',9,100,'0','Shuvo Biswas',1,'7A9',0),(312,'Class Seven','7','A','ইসলাম শিক্ষা',10,100,'0','Shuvo Biswas',1,'7A10',0),(313,'Class Seven','7','A','হিন্দুধর্ম শিক্ষা',11,100,'0','Shuvo Biswas',1,'7A11',0),(314,'Class Six','6','Mollika','Bangla',101,100,'gr001','Alok Kanti Biswas',1,'6Mollika101',NULL);
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subject` with 135 row(s)
--

--
-- Table structure for table `subjectteacher`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjectteacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classnumber` int(11) NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjectteacher`
--

LOCK TABLES `subjectteacher` WRITE;
/*!40000 ALTER TABLE `subjectteacher` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `subjectteacher` VALUES (1,6,'Mollika',3,4),(2,6,'Shapla',8,4),(3,7,'B',2,4),(4,7,'A',8,4),(5,9,'Commerce',134,4),(6,9,'Arts',134,4),(7,10,'Commerce',134,4),(8,10,'Arts',134,4),(9,7,'B',8,5),(10,8,'A',109,4),(11,8,'A',107,5),(12,8,'A',108,5),(13,8,'B',108,5),(14,9,'Commerce',152,5),(15,9,'Commerce',146,5),(16,6,'Golap',6,6),(17,7,'A',111,6),(18,7,'B',111,6),(19,9,'Arts',110,16),(20,9,'Science',111,12),(21,9,'Commerce',111,12),(22,9,'Arts',111,12),(23,10,'Science',111,6),(24,10,'Commerce',111,6),(25,10,'Arts',111,6),(26,6,'Mollika',2,7),(27,6,'Mollika',9,7),(28,6,'Shapla',10,7),(29,8,'B',101,7),(31,10,'Arts',143,7),(32,6,'Golap',3,8),(33,7,'A',3,8),(34,8,'B',109,8),(35,9,'Arts',109,8),(36,9,'Science',126,8),(37,10,'Arts',127,8),(38,10,'Commerce',127,8),(39,10,'Science',126,8),(40,6,'Mollika',1,9),(41,6,'Golap',9,9),(42,6,'Shapla',5,9),(43,7,'B',9,9),(44,8,'B',111,12),(45,7,'B',3,10),(46,9,'Arts',143,10),(47,9,'Science',153,10),(48,9,'Science',101,10),(49,9,'Commerce',101,10),(50,9,'Arts',101,10),(51,10,'Science',102,10),(52,10,'Commerce',102,10),(53,10,'Arts',102,10),(54,6,'Shapla',4,11),(55,9,'Science',136,11),(56,9,'Science',137,11),(57,10,'Science',109,11),(58,10,'Commerce',109,11),(59,10,'Arts',109,11),(60,10,'Science',136,11),(61,10,'Science',137,11),(62,6,'Golap',10,12),(63,6,'Shapla',1,12),(64,7,'A',11,12),(65,8,'A',111,12),(66,9,'Science',111,12),(67,9,'Commerce',111,12),(68,9,'Arts',111,12),(69,10,'Science',111,12),(70,10,'Commerce',111,12),(71,10,'Arts',111,12),(72,6,'Golap',1,15),(73,6,'Mollika',5,15),(74,6,'Golap',4,16),(75,6,'Golap',7,16),(76,7,'A',7,16),(77,8,'A',101,16),(78,8,'B',102,16),(81,10,'Commerce',143,16),(82,7,'A',2,17),(83,7,'A',5,17),(84,7,'B',7,17),(85,10,'Science',107,17),(86,10,'Commerce',107,17),(87,10,'Arts',107,17),(88,10,'Science',108,17),(89,10,'Commerce',108,17),(90,10,'Arts',108,17),(91,9,'Science',107,17),(92,9,'Commerce',107,17),(93,9,'Arts',107,17),(94,9,'Science',108,17),(95,9,'Commerce',108,17),(96,9,'Arts',108,17),(97,6,'Mollika',6,18),(98,7,'B',4,18),(99,7,'A',11,18),(100,7,'B',6,18),(101,9,'Science',154,18),(102,9,'Commerce',154,18),(103,9,'Arts',154,18),(104,10,'Science',154,18),(105,10,'Commerce',154,18),(106,10,'Arts',154,18),(108,8,'B',101,7),(120,8,'A',102,16),(121,8,'B',101,7),(122,6,'Shapla',2,4),(123,6,'Shapla',3,4),(124,6,'Shapla',6,4),(125,6,'Shapla',7,4),(126,6,'Shapla',9,4),(127,6,'Shapla',11,4),(128,8,'B',150,4),(129,8,'B',127,5),(130,8,'B',154,18),(131,8,'B',107,5),(132,8,'A',150,12),(133,8,'A',127,11),(134,8,'A',154,18),(135,9,'Science',102,4),(136,9,'Science',109,4),(137,9,'Science',150,4),(138,9,'Science',138,4),(139,9,'Science',134,4),(140,9,'Commerce',102,4),(141,9,'Commerce',109,4),(142,9,'Commerce',127,4),(143,9,'Commerce',143,5),(144,9,'Arts',102,4),(145,9,'Arts',127,4),(146,9,'Arts',153,4),(147,6,'Mollika',101,1);
/*!40000 ALTER TABLE `subjectteacher` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subjectteacher` with 132 row(s)
--

--
-- Table structure for table `tc`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_card` int(255) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `memorial_no` varchar(2000) NOT NULL,
  `village` varchar(2000) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `ps` varchar(2000) NOT NULL,
  `ds` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc`
--

LOCK TABLES `tc` WRITE;
/*!40000 ALTER TABLE `tc` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tc` VALUES (1,625577,'6Mollika5','2024-06-21','dsfsadfadsf','পুইশুর','বলাকইড়','গোপালগঞ্জ সদর','গোপালগঞ্জ'),(3,625577,'6Mollika5','2024-06-21','ggsdsfg','পুইশুর','বলাকইড়','গোপালগঞ্জ সদর','গোপালগঞ্জ');
/*!40000 ALTER TABLE `tc` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tc` with 2 row(s)
--

--
-- Table structure for table `teacher`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `tfname` varchar(255) NOT NULL,
  `tmname` varchar(255) NOT NULL,
  `tdob` varchar(255) NOT NULL,
  `leatestdegree` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `degnation` varchar(255) NOT NULL,
  `teachersl` varchar(255) NOT NULL,
  `joindate` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachersl` (`teachersl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `teacher` VALUES (1,'Alok Kanti Biswas','Barun Kanti Biswas','Shandhya Rani Biswas','1998-10-10','B.S.C','01783808373','Head Teacher','1','2024-04-28');
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teacher` with 1 row(s)
--

--
-- Table structure for table `teacherlogin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacherlogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `teachersl` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachersl` (`teachersl`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacherlogin`
--

LOCK TABLES `teacherlogin` WRITE;
/*!40000 ALTER TABLE `teacherlogin` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `teacherlogin` VALUES (2,'Alok Kanti Biswas','shuvo003','$2y$10$zzYu0TT3b1dZFO699BmjRenZggQCgv.KzL6DLXIsWRmc5jlwztcFK','2024-06-22 07:05:52','');
/*!40000 ALTER TABLE `teacherlogin` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teacherlogin` with 1 row(s)
--

--
-- Table structure for table `testimonials`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL,
  `passingYear` int(11) NOT NULL,
  `studentGroup` varchar(50) NOT NULL,
  `gpa` decimal(3,2) NOT NULL,
  `grade` varchar(2) NOT NULL,
  `result` varchar(10) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `registration` varchar(20) NOT NULL,
  `issuedate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration` (`registration`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `testimonials` VALUES (2,'SHUVO BISWAS','BARUN KANTI BISWAS','SHANDHYA RANI BISWAS','10-08-1998','Puisur','Balakair','Gopalganj Sadar','Gopalganj',2014,'SCIENCE',4.63,'A','pass','154485','1110325644','2024-06-01');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `testimonials` with 1 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` VALUES (5,'shuvo003','$2y$10$MmeOsShkP36EcLKTBeaLcuMjnahXNCYiZ.FuuuqQDdNcqgrWFI/Dm','2022-03-16 08:22:25');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `users` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Sat, 13 Jul 2024 04:13:27 +0200
