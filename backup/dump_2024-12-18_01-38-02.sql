-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: zpscedu_mysoft_2025
-- ------------------------------------------------------
-- Server version 	8.0.33
-- Date: Wed, 18 Dec 2024 01:38:02 +0000

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
-- Table structure for table `a_teacherlogin_logs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `a_teacherlogin_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reason` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `a_teacherlogin_logs`
--

LOCK TABLES `a_teacherlogin_logs` WRITE;
/*!40000 ALTER TABLE `a_teacherlogin_logs` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `a_teacherlogin_logs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `a_teacherlogin_logs` with 0 row(s)
--

--
-- Table structure for table `accountuser`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accountuser` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accountuser`
--

LOCK TABLES `accountuser` WRITE;
/*!40000 ALTER TABLE `accountuser` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `accountuser` VALUES (1,'THS Account','HS','$2y$10$INAeyMB1yjPpBuXITus76OpceRdK8M1SYIPeCN7e9r/XvVZmSXsTm','2023-06-14 15:12:49','Account'),(2,'Shuvo','shuvo003','$2y$10$INAeyMB1yjPpBuXITus76OpceRdK8M1SYIPeCN7e9r/XvVZmSXsTm','2023-06-19 08:32:37','Account'),(4,'RANA KIRTTANIA','rana1993','$2y$10$INAeyMB1yjPpBuXITus76OpceRdK8M1SYIPeCN7e9r/XvVZmSXsTm','2024-01-08 11:16:31','Account');
/*!40000 ALTER TABLE `accountuser` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `accountuser` with 3 row(s)
--

--
-- Table structure for table `addmission_ssc_student`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `addmission_ssc_student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `stuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ssc_roll` int NOT NULL,
  `ssc_reg` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `passingYear` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `board` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gpa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `passing_school` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `f_opq` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `f_income` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `l_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `l_opc` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `l_income` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `l_phone` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marital` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `religion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blood` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ssc_reg` (`ssc_reg`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `addmission_ssc_student`
--

LOCK TABLES `addmission_ssc_student` WRITE;
/*!40000 ALTER TABLE `addmission_ssc_student` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `addmission_ssc_student` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `addmission_ssc_student` with 0 row(s)
--

--
-- Table structure for table `adminloginlogs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminloginlogs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminloginlogs`
--

LOCK TABLES `adminloginlogs` WRITE;
/*!40000 ALTER TABLE `adminloginlogs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `adminloginlogs` VALUES (1,'shuvo003','2024-11-01 15:20:59','::1'),(2,'shuvo003','2024-11-01 15:26:08','::1'),(3,'shuvo003','2024-11-17 10:26:10','45.112.73.56'),(4,'shuvo003','2024-12-03 12:37:56','122.152.49.156'),(5,'shuvo003','2024-12-08 09:34:09','103.87.212.87'),(6,'shuvo003','2024-12-09 22:00:00','36.255.81.251'),(7,'shuvo003','2024-12-09 22:00:56','36.255.81.251'),(8,'shuvo003','2024-12-11 08:07:36','103.87.212.87'),(9,'shuvo003','2024-12-18 07:37:40','36.255.81.247');
/*!40000 ALTER TABLE `adminloginlogs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `adminloginlogs` with 9 row(s)
--

--
-- Table structure for table `admissions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admissions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `current_class` blob,
  `desired_class` blob,
  `running_school_name` blob,
  `student_name_eng` blob,
  `student_name_bn` blob,
  `father_name_eng` blob,
  `father_name_bn` blob,
  `mother_name_eng` blob,
  `mother_name_bn` blob,
  `father_nid` blob,
  `mother_nid` blob,
  `father_phone` blob,
  `mother_phone` blob,
  `father_occupation` blob,
  `mother_occupation` blob,
  `dob` blob,
  `birth_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` blob,
  `sex` blob,
  `religion` blob,
  `nationality` blob,
  `present_address_eng` blob,
  `present_address_bn` blob,
  `permanent_address_eng` blob,
  `permanent_address_bn` blob,
  `student_picture` blob,
  `birth_id_attachment` blob,
  `father_picture` blob,
  `father_nid_attachment` blob,
  `mother_picture` blob,
  `mother_nid_attachment` blob,
  `running_student` blob,
  `running_roll` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `birth_id` (`birth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admissions`
--

LOCK TABLES `admissions` WRITE;
/*!40000 ALTER TABLE `admissions` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `admissions` VALUES (1,0x37,0x38,0x5A454C412050524F534841534F4E205343484F4F4C20414E4420434F4C4C454745,0x536875766F,0x536875766F,0x6666,0x6666,0x6D6D,0x6D6D,0x323534343536,0x343536343536,0x30343435343534,0x3432353435,0x4661726D6572,0x476F7665726E6D656E7420456D706C6F796565,0x323032342D31322D3136,'1002',0x412B,0x4D616C65,0x48696E647569736D,0x42616E676C616465736869,0x6A67686A676A,0x666766676A,0x666A66676A,0x66676A,0x2E2E2F696D672F61646D697373696F6E2F315F4A49542053696B6465722E6A7067,0x2E2E2F696D672F61646D697373696F6E2F315F494D4732303233313030343137333835382E6A7067,0x2E2E2F696D672F61646D697373696F6E2F315F,0x2E2E2F696D672F61646D697373696F6E2F315F,0x2E2E2F696D672F61646D697373696F6E2F315F,0x2E2E2F696D672F61646D697373696F6E2F315F,0x4F6C64,23,0);
/*!40000 ALTER TABLE `admissions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `admissions` with 1 row(s)
--

--
-- Table structure for table `att_time_table`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `att_time_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clock_in_start_time` time NOT NULL,
  `clock_in_end_time` time NOT NULL,
  `clock_out_start_time` time NOT NULL,
  `clock_out_end_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `att_time_table`
--

LOCK TABLES `att_time_table` WRITE;
/*!40000 ALTER TABLE `att_time_table` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `att_time_table` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `att_time_table` with 0 row(s)
--

--
-- Table structure for table `building`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `building` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bnumber` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bnumber` (`bnumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `building`
--

LOCK TABLES `building` WRITE;
/*!40000 ALTER TABLE `building` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `building` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `building` with 0 row(s)
--

--
-- Table structure for table `buildingroom`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildingroom` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bnumber` int NOT NULL,
  `roomfloor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roomname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roomnumber` int NOT NULL,
  `seatcapacity` int NOT NULL,
  `rowofbench` int NOT NULL,
  `uniid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniid` (`uniid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildingroom`
--

LOCK TABLES `buildingroom` WRITE;
/*!40000 ALTER TABLE `buildingroom` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `buildingroom` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `buildingroom` with 0 row(s)
--

--
-- Table structure for table `buildingroombench`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildingroombench` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bnumber` int NOT NULL,
  `roomnumber` int NOT NULL,
  `rownumber` int NOT NULL,
  `numberofbench` int NOT NULL,
  `uninum` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uninum` (`uninum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildingroombench`
--

LOCK TABLES `buildingroombench` WRITE;
/*!40000 ALTER TABLE `buildingroombench` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `buildingroombench` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `buildingroombench` with 0 row(s)
--

--
-- Table structure for table `cardprintstatus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cardprintstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcode` int NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chapterno` int NOT NULL,
  `chaptername` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chapteruniid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classnumber` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `classnumber` (`classnumber`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class`
--

LOCK TABLES `class` WRITE;
/*!40000 ALTER TABLE `class` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `class` VALUES (1,'Class Nursery',-1),(3,'Class KG',0),(4,'Class One',1),(5,'Class Two',2),(6,'Class Three',3),(7,'Class Four',4),(8,'Class Five',5),(9,'Class Six',6),(10,'Class Seven',7),(11,'Class Eight',8),(12,'Class Nine',9),(13,'Class Ten',10),(14,'Class Eleven',11),(15,'Class Twelve',12);
/*!40000 ALTER TABLE `class` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `class` with 14 row(s)
--

--
-- Table structure for table `devices`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `dnumber` int NOT NULL,
  `dname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dport` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dip` (`dip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `devices` with 0 row(s)
--

--
-- Table structure for table `exam`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `exid` int NOT NULL AUTO_INCREMENT,
  `examname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startdate` date NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `exam` with 0 row(s)
--

--
-- Table structure for table `exam67`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam67` (
  `exid` int NOT NULL AUTO_INCREMENT,
  `examname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `exid` int NOT NULL,
  `classnumber` int NOT NULL,
  `subcode` int NOT NULL,
  `chapterno` int NOT NULL,
  `lno` int NOT NULL,
  `uniqid` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `suniqid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `examid` int NOT NULL,
  `examdate` date NOT NULL,
  `subcode` int NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `substatus` int NOT NULL,
  `gradecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cq` int NOT NULL,
  `mcq` int NOT NULL,
  `practical` int NOT NULL,
  `total` int NOT NULL,
  `letterpoint` float NOT NULL,
  `lettergrade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `examuni` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fullmarks` int NOT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `subcode` int NOT NULL,
  `chapterno` int NOT NULL,
  `lno` int NOT NULL,
  `pi` int NOT NULL,
  `uni` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`uni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
  `id` int NOT NULL AUTO_INCREMENT,
  `exid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `examdate` date NOT NULL,
  `examtime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `align` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uexid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uexid` (`uexid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examroutine`
--

LOCK TABLES `examroutine` WRITE;
/*!40000 ALTER TABLE `examroutine` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `examroutine` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examroutine` with 0 row(s)
--

--
-- Table structure for table `examseatinfo`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatinfo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `bnumber` int NOT NULL,
  `roomnumber` int NOT NULL,
  `classnumber` int NOT NULL,
  `studentroll` int NOT NULL,
  `benchcol` int NOT NULL,
  `benchrow` int NOT NULL,
  `align` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uniid` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniid` (`uniid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatinfo`
--

LOCK TABLES `examseatinfo` WRITE;
/*!40000 ALTER TABLE `examseatinfo` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `examseatinfo` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatinfo` with 0 row(s)
--

--
-- Table structure for table `examseatplan`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `bnumber` int NOT NULL,
  `roomnumber` int NOT NULL,
  `classnumber` int NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll` int NOT NULL,
  `endroll` int NOT NULL,
  `uniqid` int NOT NULL,
  `totalstudent` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatplan`
--

LOCK TABLES `examseatplan` WRITE;
/*!40000 ALTER TABLE `examseatplan` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `examseatplan` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatplan` with 0 row(s)
--

--
-- Table structure for table `examseatplanc1c2`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplanc1c2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `bnumber` int NOT NULL,
  `roomnumber` int NOT NULL,
  `classnumber` int NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll` int NOT NULL,
  `endroll` int NOT NULL,
  `uniqid` int NOT NULL,
  `totalstudent` int NOT NULL,
  `classnumber2` int NOT NULL,
  `section2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll2` int NOT NULL,
  `endroll2` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examseatplanc1c2`
--

LOCK TABLES `examseatplanc1c2` WRITE;
/*!40000 ALTER TABLE `examseatplanc1c2` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `examseatplanc1c2` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `examseatplanc1c2` with 0 row(s)
--

--
-- Table structure for table `examseatplanc1c2c3`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examseatplanc1c2c3` (
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `bnumber` int NOT NULL,
  `roomnumber` int NOT NULL,
  `classnumber` int NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll` int NOT NULL,
  `endroll` int NOT NULL,
  `uniqid` int NOT NULL,
  `totalstudent` int NOT NULL,
  `classnumber2` int NOT NULL,
  `section2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll2` int NOT NULL,
  `endroll2` int NOT NULL,
  `classnumber3` int NOT NULL,
  `section3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll3` int NOT NULL,
  `endroll3` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `bnumber` int NOT NULL,
  `roomnumber` int NOT NULL,
  `classnumber` int NOT NULL,
  `section` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll` int NOT NULL,
  `endroll` int NOT NULL,
  `uniqid` int NOT NULL,
  `totalstudent` int NOT NULL,
  `classnumber2` int NOT NULL,
  `section2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `startroll2` int NOT NULL,
  `endroll2` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `des` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
  `expenseid` int DEFAULT NULL,
  `note` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `expense` with 0 row(s)
--

--
-- Table structure for table `expense_catagory`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expense_catagory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense_catagory`
--

LOCK TABLES `expense_catagory` WRITE;
/*!40000 ALTER TABLE `expense_catagory` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `expense_catagory` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `expense_catagory` with 0 row(s)
--

--
-- Table structure for table `grademark`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grademark` (
  `id` int NOT NULL AUTO_INCREMENT,
  `gradecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `markfrom` int NOT NULL,
  `markupto` int NOT NULL,
  `lettergrade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `letterpoint` float NOT NULL,
  `uni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `gradename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fullmark` int NOT NULL,
  `gradecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classnumber` int NOT NULL,
  `groupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sectionname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `stuuniqid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `des` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `amount` int NOT NULL,
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
  `id` int NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `uni_iid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  UNIQUE KEY `uni_iid` (`uni_iid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inviceid`
--

LOCK TABLES `inviceid` WRITE;
/*!40000 ALTER TABLE `inviceid` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `inviceid` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `inviceid` with 0 row(s)
--

--
-- Table structure for table `invoicetrx`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoicetrx` (
  `id` int NOT NULL AUTO_INCREMENT,
  `iid` varchar(100) NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoicetrx`
--

LOCK TABLES `invoicetrx` WRITE;
/*!40000 ALTER TABLE `invoicetrx` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `invoicetrx` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `invoicetrx` with 0 row(s)
--

--
-- Table structure for table `lesson`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lesson` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcode` int NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `chapterno` int NOT NULL,
  `chaptername` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lno` int NOT NULL,
  `lname` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lpis` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lpic` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lpit` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `author_name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_author`
--

LOCK TABLES `libary_author` WRITE;
/*!40000 ALTER TABLE `libary_author` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `libary_author` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_author` with 0 row(s)
--

--
-- Table structure for table `libary_book_list`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_book_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_barcode` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_book_list`
--

LOCK TABLES `libary_book_list` WRITE;
/*!40000 ALTER TABLE `libary_book_list` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `libary_book_list` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_book_list` with 0 row(s)
--

--
-- Table structure for table `libary_book_stock`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_book_stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bookid` int NOT NULL,
  `publisher_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `author_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_name` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_barcode` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `total` int NOT NULL,
  `running_amount` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookid` (`bookid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_book_stock`
--

LOCK TABLES `libary_book_stock` WRITE;
/*!40000 ALTER TABLE `libary_book_stock` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `libary_book_stock` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_book_stock` with 0 row(s)
--

--
-- Table structure for table `libary_libariyan_user`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_libariyan_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_libariyan_user`
--

LOCK TABLES `libary_libariyan_user` WRITE;
/*!40000 ALTER TABLE `libary_libariyan_user` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `libary_libariyan_user` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_libariyan_user` with 0 row(s)
--

--
-- Table structure for table `libary_publisher`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libary_publisher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pub_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libary_publisher`
--

LOCK TABLES `libary_publisher` WRITE;
/*!40000 ALTER TABLE `libary_publisher` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `libary_publisher` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `libary_publisher` with 0 row(s)
--

--
-- Table structure for table `library_book_issue`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `library_book_issue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bookid` int DEFAULT NULL,
  `publisher_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `book_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `book_barcode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_expiry` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `total_days` int DEFAULT NULL,
  `student_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `student_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `class` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `section` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobile` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rfid_card` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `library_book_issue`
--

LOCK TABLES `library_book_issue` WRITE;
/*!40000 ALTER TABLE `library_book_issue` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `library_book_issue` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `library_book_issue` with 0 row(s)
--

--
-- Table structure for table `machineattlog`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machineattlog` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `mid` int NOT NULL,
  `stuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adate` date NOT NULL,
  `atime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cinout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cstateid` int NOT NULL,
  `uniid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uniid` (`uniid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machineattlog`
--

LOCK TABLES `machineattlog` WRITE;
/*!40000 ALTER TABLE `machineattlog` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `machineattlog` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `machineattlog` with 0 row(s)
--

--
-- Table structure for table `machinedata`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `machinedata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mid` int NOT NULL,
  `stuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timetable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `machinedata`
--

LOCK TABLES `machinedata` WRITE;
/*!40000 ALTER TABLE `machinedata` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `machinedata` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `machinedata` with 0 row(s)
--

--
-- Table structure for table `markentrylog`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `markentrylog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teachername` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `loginip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logintime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classnumber` int NOT NULL,
  `subcode` int NOT NULL,
  `examid` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `examid` int NOT NULL,
  `uniqid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `totalmark` int NOT NULL,
  `obtainmark` int NOT NULL,
  `gpa` float NOT NULL,
  `gpa4th` float NOT NULL,
  `failsub` int NOT NULL,
  `prevpos` int NOT NULL,
  `curpos` int NOT NULL,
  `uniqm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `subject_code` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `subject_code` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `subject_code` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `currency` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `orders` with 0 row(s)
--

--
-- Table structure for table `paycat`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paycat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pcatname` varchar(255) NOT NULL,
  `amount` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paycat`
--

LOCK TABLES `paycat` WRITE;
/*!40000 ALTER TABLE `paycat` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paycat` VALUES (1,'Admission Form Fee',200),(2,'Admission Fee',3000),(3,'Session Charge',1500),(4,'Extra Fee',400),(5,'Salary January',600),(6,'Salary February',600);
/*!40000 ALTER TABLE `paycat` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paycat` with 6 row(s)
--

--
-- Table structure for table `personalholyday`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personalholyday` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `holydayname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numofday` int NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `friday` int NOT NULL,
  `saturday` int NOT NULL,
  `actualday` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `stu_card` int NOT NULL,
  `stu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pdate` date NOT NULL,
  `memorial_no` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ps` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ds` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `protyon`
--

LOCK TABLES `protyon` WRITE;
/*!40000 ALTER TABLE `protyon` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `protyon` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `protyon` with 0 row(s)
--

--
-- Table structure for table `publicholyday`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicholyday` (
  `id` int NOT NULL AUTO_INCREMENT,
  `holydayname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `numofday` int NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `friday` int NOT NULL,
  `actualday` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicholyday`
--

LOCK TABLES `publicholyday` WRITE;
/*!40000 ALTER TABLE `publicholyday` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `publicholyday` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `publicholyday` with 0 row(s)
--

--
-- Table structure for table `resultpub`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultpub` (
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `status` int NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `rfid` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rfid` (`rfid`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rfid`
--

LOCK TABLES `rfid` WRITE;
/*!40000 ALTER TABLE `rfid` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `rfid` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `rfid` with 0 row(s)
--

--
-- Table structure for table `schoolinfo`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schoolinfo` (
  `id` int NOT NULL AUTO_INCREMENT,
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
  `head_deg_bangla` tinyblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schoolinfo`
--

LOCK TABLES `schoolinfo` WRITE;
/*!40000 ALTER TABLE `schoolinfo` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `schoolinfo` VALUES (1,'ZELA PROSHASON SCHOOL AND COLLEGE','Dc Office Road, Gopalganj','01705405540','https://www.zpsc.edu.bd','à¦Ÿà§à¦ à¦¾à¦®à¦¾à¦¨à§à¦¦à§à¦°à¦¾ à¦‰à¦šà¦š à¦¬à¦¿à¦¦à§à¦¯à¦¾à¦²à§Ÿ','Vill: Tuthamandra, Post: Tuthamanfra, Ps: Gopalganj Sadar,DS: Gopalganj','01705405540','zpsc2018@gmail.com','ZPSC2025','https://www.zpsc.edu.bd/mysoft/2025','139219','2018','6772','45012','TEST','TEST','Principle',0xE0A685E0A6A7E0A78DE0A6AFE0A695E0A78DE0A6B7);
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
  `id` int NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uninumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uninumber` (`uninumber`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectiongroup`
--

LOCK TABLES `sectiongroup` WRITE;
/*!40000 ALTER TABLE `sectiongroup` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sectiongroup` VALUES (1,'Class Nursery',-1,'A','-1A'),(2,'Class KG',0,'A','0A'),(3,'Class One',1,'A','1A'),(4,'Class Two',2,'A','2A'),(5,'Class Three',3,'A','3A'),(6,'Class Four',4,'A','4A'),(7,'Class Five',5,'A','5A'),(8,'Class Six',6,'A.','6A.'),(9,'Class Seven',7,'A','7A'),(10,'Class Eight',8,'A','8A'),(11,'Class Nine',9,'A','9A'),(12,'Class Ten',10,'Science','10Science'),(14,'Class Ten',10,'Business Studies','10Business Studies'),(15,'Class Ten',10,'Humanities','10Humanities'),(16,'Class Nursery',-1,'Admission','-1Admission'),(17,'Class KG',0,'Admission','0Admission'),(18,'Class One',1,'Admission','1Admission'),(19,'Class Two',2,'Admission','2Admission'),(20,'Class Three',3,'Admission','3Admission'),(21,'Class Four',4,'Admission','4Admission'),(23,'Class Five',5,'Admission','5Admission'),(24,'Class Six',6,'Admission','6Admission'),(25,'Class Seven',7,'Admission','7Admission'),(26,'Class Eight',8,'Admission','8Admission'),(27,'Class Nine',9,'Admission','9Admission'),(28,'Class Ten',10,'Admission','10Admission');
/*!40000 ALTER TABLE `sectiongroup` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sectiongroup` with 26 row(s)
--

--
-- Table structure for table `set_admit_id`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `set_admit_id` (
  `id` int NOT NULL AUTO_INCREMENT,
  `examid` int NOT NULL,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uni` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `set_admit_id`
--

LOCK TABLES `set_admit_id` WRITE;
/*!40000 ALTER TABLE `set_admit_id` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `set_admit_id` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `set_admit_id` with 0 row(s)
--

--
-- Table structure for table `smsbal`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `smsbal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `totalsms` int NOT NULL,
  `bal` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smsbal`
--

LOCK TABLES `smsbal` WRITE;
/*!40000 ALTER TABLE `smsbal` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `smsbal` VALUES (1,4500,3474);
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
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `number` int NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `charector` int NOT NULL,
  `usedsms` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `smslog`
--

LOCK TABLES `smslog` WRITE;
/*!40000 ALTER TABLE `smslog` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `smslog` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `smslog` with 0 row(s)
--

--
-- Table structure for table `sslcommerz_transaction`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sslcommerz_transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tran_date` datetime DEFAULT NULL,
  `tran_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `val_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `store_amount` decimal(10,2) DEFAULT NULL,
  `bank_tran_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_a` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_b` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tran_id` (`tran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sslcommerz_transaction`
--

LOCK TABLES `sslcommerz_transaction` WRITE;
/*!40000 ALTER TABLE `sslcommerz_transaction` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `sslcommerz_transaction` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sslcommerz_transaction` with 0 row(s)
--

--
-- Table structure for table `stuaddress`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuaddress` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
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
  `id` int NOT NULL AUTO_INCREMENT,
  `stuid` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `stuid` (`stuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuaddressbangla`
--

LOCK TABLES `stuaddressbangla` WRITE;
/*!40000 ALTER TABLE `stuaddressbangla` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `stuaddressbangla` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stuaddressbangla` with 0 row(s)
--

--
-- Table structure for table `stuattdancedata`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stuattdancedata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `machineid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adate` date NOT NULL,
  `ctime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cinout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cinoutid` int NOT NULL,
  `uniqattid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `serverstatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuattdancedata`
--

LOCK TABLES `stuattdancedata` WRITE;
/*!40000 ALTER TABLE `stuattdancedata` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `stuattdancedata` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stuattdancedata` with 0 row(s)
--

--
-- Table structure for table `student`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nameb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fnameb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mnameb` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `birthid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fnid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mnid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uniqid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'IMG_0.png',
  `brisqr` varchar(3000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addmission_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `student` VALUES (1,8,'Class Eight','Admission',1,'Shuvo','ff','mm','Shuvo','ff','mm','Male','2024-12-16','1002','254456','456456','jghjgj','0445454','8Admission1','../img/admission/1_JIT Sikder.jpg',NULL,1);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `student` with 1 row(s)
--

--
-- Table structure for table `studentlogin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentlogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `plainpass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `pcatid` int NOT NULL,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `roll` int NOT NULL,
  `stuname` varchar(255) NOT NULL,
  `des` varchar(1200) DEFAULT NULL,
  `total` int NOT NULL,
  `totalpay` int NOT NULL,
  `due` int NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `puniid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `puniid` (`puniid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentpayment`
--

LOCK TABLES `studentpayment` WRITE;
/*!40000 ALTER TABLE `studentpayment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `studentpayment` VALUES (1,1,1,'Admission','1Admission1',1,'Wilma Bass','Admission Form Fee',200,0,200,'Unpaid','2024-12-09','1Admission1'),(2,2,1,'Admission','1Admission1',1,'Wilma Bass','Admission Fee',3000,0,3000,'Unpaid','2024-12-09','11Admission1'),(3,3,1,'Admission','1Admission1',1,'Wilma Bass','Session Charge',1500,0,1500,'Unpaid','2024-12-09','21Admission1'),(4,4,1,'Admission','1Admission1',1,'Wilma Bass','Extra Fee',400,0,400,'Unpaid','2024-12-09','31Admission1'),(5,5,1,'Admission','1Admission1',1,'Wilma Bass','Salary January',600,0,600,'Unpaid','2024-12-09','41Admission1'),(6,1,0,'Admission','0Admission1',1,'AFIYA JANNAT','Admission Form Fee',200,0,200,'Unpaid','2024-12-10','0Admission1'),(7,2,0,'Admission','0Admission1',1,'AFIYA JANNAT','Admission Fee',3000,0,3000,'Unpaid','2024-12-10','10Admission1'),(8,3,0,'Admission','0Admission1',1,'AFIYA JANNAT','Session Charge',1500,0,1500,'Unpaid','2024-12-10','20Admission1'),(9,4,0,'Admission','0Admission1',1,'AFIYA JANNAT','Extra Fee',400,0,400,'Unpaid','2024-12-10','30Admission1'),(10,5,0,'Admission','0Admission1',1,'AFIYA JANNAT','Salary January',600,0,600,'Unpaid','2024-12-10','40Admission1'),(11,2,8,'Admission','8Admission1',1,'Shuvo','Admission Fee',3000,0,3000,'Unpaid','2024-12-16','8Admission1'),(12,3,8,'Admission','8Admission1',1,'Shuvo','Session Charge',1500,0,1500,'Unpaid','2024-12-16','28Admission1'),(13,4,8,'Admission','8Admission1',1,'Shuvo','Extra Fee',400,0,400,'Unpaid','2024-12-16','38Admission1'),(14,5,8,'Admission','8Admission1',1,'Shuvo','Salary January',600,0,600,'Unpaid','2024-12-16','48Admission1');
/*!40000 ALTER TABLE `studentpayment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `studentpayment` with 14 row(s)
--

--
-- Table structure for table `sturegstatus`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sturegstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `uniqid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `regstatus` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sturegstatus`
--

LOCK TABLES `sturegstatus` WRITE;
/*!40000 ALTER TABLE `sturegstatus` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `sturegstatus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sturegstatus` with 0 row(s)
--

--
-- Table structure for table `sturegsubject`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sturegsubject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `uniqid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcode` int NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `substatus` int NOT NULL,
  `unisubstatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unisubstatus` (`unisubstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sturegsubject`
--

LOCK TABLES `sturegsubject` WRITE;
/*!40000 ALTER TABLE `sturegsubject` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `sturegsubject` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sturegsubject` with 0 row(s)
--

--
-- Table structure for table `subject`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `classnumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcode` int NOT NULL,
  `subfullmarks` int NOT NULL,
  `gradecode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subteacher` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teacherid` int NOT NULL,
  `uni` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `barcode` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`uni`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subject` with 0 row(s)
--

--
-- Table structure for table `subjectteacher`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjectteacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `subcode` int NOT NULL,
  `tid` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjectteacher`
--

LOCK TABLES `subjectteacher` WRITE;
/*!40000 ALTER TABLE `subjectteacher` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `subjectteacher` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subjectteacher` with 0 row(s)
--

--
-- Table structure for table `tc`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `stu_card` int NOT NULL,
  `stu_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pdate` date NOT NULL,
  `memorial_no` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ps` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ds` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tc`
--

LOCK TABLES `tc` WRITE;
/*!40000 ALTER TABLE `tc` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `tc` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tc` with 0 row(s)
--

--
-- Table structure for table `teacher`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tfname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tmname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tdob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `leatestdegree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `degnation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `teachersl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `joindate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `teachersl` (`teachersl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teacher` with 0 row(s)
--

--
-- Table structure for table `teacherlogin`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacherlogin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `teachersl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
INSERT INTO `teacherlogin` VALUES (1,'PRODYUT KUMAR BHADRA','shuvo003','$2y$10$7qhxVIakqB784MYOfBs9r.VXtiB2V8XRZ.a1L3HUW0KpHiaeVNCUq','2023-06-07 10:42:24','1005564'),(2,'PRADYUT KUMAR BHADRA','Head Teacher','$2y$10$nkd/bsAjeNqAeyULoGf6h.AOE6hVupA6CEtlynCkZwo5vh879nCgu','2023-09-10 22:20:11','');
/*!40000 ALTER TABLE `teacherlogin` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teacherlogin` with 2 row(s)
--

--
-- Table structure for table `testimonials`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `studentName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fatherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `motherName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ps` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ds` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passingYear` int NOT NULL,
  `studentGroup` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gpa` decimal(3,2) NOT NULL,
  `grade` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `result` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `registration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `issuedate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registration` (`registration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `testimonials` with 0 row(s)
--

--
-- Table structure for table `users`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
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

-- Dump completed on: Wed, 18 Dec 2024 01:38:02 +0000
