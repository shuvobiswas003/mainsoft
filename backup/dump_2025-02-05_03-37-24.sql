-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: zpscedu_mysoft_2025
-- ------------------------------------------------------
-- Server version 	8.0.33
-- Date: Wed, 05 Feb 2025 03:37:24 +0000

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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminloginlogs`
--

LOCK TABLES `adminloginlogs` WRITE;
/*!40000 ALTER TABLE `adminloginlogs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `adminloginlogs` VALUES (1,'shuvo003','2024-11-01 15:20:59','::1'),(2,'shuvo003','2024-11-01 15:26:08','::1'),(3,'shuvo003','2024-11-17 10:26:10','45.112.73.56'),(4,'shuvo003','2024-12-03 12:37:56','122.152.49.156'),(5,'shuvo003','2024-12-08 09:34:09','103.87.212.87'),(6,'shuvo003','2024-12-09 22:00:00','36.255.81.251'),(7,'shuvo003','2024-12-09 22:00:56','36.255.81.251'),(8,'shuvo003','2024-12-11 08:07:36','103.87.212.87'),(9,'shuvo003','2024-12-18 07:37:40','36.255.81.247'),(10,'shuvo003','2024-12-20 21:08:10','114.130.71.121'),(11,'shuvo003','2024-12-24 09:22:39','37.111.232.235'),(12,'shuvo003','2025-01-21 07:38:33','103.87.215.172'),(13,'shuvo003','2025-01-21 11:11:37','103.26.246.210'),(14,'shuvo003','2025-01-21 11:14:00','103.26.246.210'),(15,'shuvo003','2025-01-22 19:53:32','103.87.215.172'),(16,'shuvo003','2025-01-22 20:53:58','103.87.215.172'),(17,'shuvo003','2025-01-22 21:39:19','103.87.215.172'),(18,'shuvo003','2025-01-22 22:04:36','103.87.215.172'),(19,'shuvo003','2025-01-23 20:33:13','103.87.215.172'),(20,'shuvo003','2025-01-23 21:03:52','103.253.102.232'),(21,'shuvo003','2025-01-23 21:05:36','103.253.102.232'),(22,'shuvo003','2025-01-23 21:07:38','103.253.102.232'),(23,'shuvo003','2025-01-23 21:22:52','103.253.102.232'),(24,'shuvo003','2025-01-23 21:57:40','103.87.215.172'),(25,'shuvo003','2025-01-23 23:18:26','103.253.102.232'),(26,'shuvo003','2025-01-23 23:55:20','103.253.102.232'),(27,'shuvo003','2025-01-24 00:19:31','103.253.102.232'),(28,'shuvo003','2025-01-24 00:39:30','103.253.102.232'),(29,'shuvo003','2025-01-24 00:48:38','103.253.102.232'),(30,'shuvo003','2025-01-24 00:58:30','103.253.102.232'),(31,'shuvo003','2025-01-24 01:20:36','103.253.102.232'),(32,'shuvo003','2025-01-24 08:53:10','103.87.215.173'),(33,'shuvo003','2025-01-24 10:09:58','103.87.215.173'),(34,'shuvo003','2025-01-25 09:36:38','103.87.215.173'),(35,'shuvo003','2025-01-25 11:14:33','103.87.215.173'),(36,'shuvo003','2025-01-25 12:03:35','103.87.215.173'),(37,'shuvo003','2025-01-25 12:16:26','103.87.215.173'),(38,'shuvo003','2025-01-25 12:16:42','103.87.215.173'),(39,'shuvo003','2025-01-25 12:17:19','103.87.215.173'),(40,'shuvo003','2025-01-25 14:53:58','103.87.215.173'),(41,'shuvo003','2025-01-25 17:14:43','103.87.215.173'),(42,'shuvo003','2025-01-25 19:29:45','103.87.215.173'),(43,'shuvo003','2025-01-25 21:00:59','103.87.215.173'),(44,'shuvo003','2025-01-28 10:55:21','103.26.246.210'),(45,'shuvo003','2025-01-28 11:11:13','103.26.246.210'),(46,'shuvo003','2025-01-28 11:15:38','103.26.246.210'),(47,'shuvo003','2025-01-30 10:15:48','103.191.163.69'),(48,'shuvo003','2025-01-31 11:24:30','103.191.163.70'),(49,'shuvo003','2025-02-01 18:15:44','103.191.163.68'),(50,'shuvo003','2025-02-01 19:18:44','103.191.163.68'),(51,'shuvo003','2025-02-01 20:14:07','103.191.163.68'),(52,'shuvo003','2025-02-01 21:22:03','103.191.163.68'),(53,'shuvo003','2025-02-01 21:31:59','103.191.163.68'),(54,'shuvo003','2025-02-01 21:44:34','103.191.163.68'),(55,'shuvo003','2025-02-02 07:54:47','103.191.163.68'),(56,'shuvo003','2025-02-02 09:23:58','103.191.163.68'),(57,'shuvo003','2025-02-02 10:32:04','103.191.163.68'),(58,'shuvo003','2025-02-02 11:42:02','103.191.163.69'),(59,'shuvo003','2025-02-04 12:13:32','103.26.246.210'),(60,'shuvo003','2025-02-04 17:28:40','103.191.163.68'),(61,'shuvo003','2025-02-05 09:37:15','103.253.247.141');
/*!40000 ALTER TABLE `adminloginlogs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `adminloginlogs` with 61 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admissions`
--

LOCK TABLES `admissions` WRITE;
/*!40000 ALTER TABLE `admissions` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `admissions` VALUES (1,0x37,0x38,0x5A454C412050524F534841534F4E205343484F4F4C20414E4420434F4C4C454745,0x536875766F,0x536875766F,0x6666,0x6666,0x6D6D,0x6D6D,0x323534343536,0x343536343536,0x30343435343534,0x3432353435,0x4661726D6572,0x476F7665726E6D656E7420456D706C6F796565,0x323032342D31322D3136,'1002',0x412B,0x4D616C65,0x48696E647569736D,0x42616E676C616465736869,0x6A67686A676A,0x666766676A,0x666A66676A,0x66676A,0x2E2E2F696D672F61646D697373696F6E2F315F4A49542053696B6465722E6A7067,0x2E2E2F696D672F61646D697373696F6E2F315F494D4732303233313030343137333835382E6A7067,0x2E2E2F696D672F61646D697373696F6E2F315F,0x2E2E2F696D672F61646D697373696F6E2F315F,0x2E2E2F696D672F61646D697373696F6E2F315F,0x2E2E2F696D672F61646D697373696F6E2F315F,0x4F6C64,23,0),(2,'','','','','','','','','','','','','','','','','','','','','','','','','',0x2E2E2F696D672F61646D697373696F6E2F325F,0x2E2E2F696D672F61646D697373696F6E2F325F,0x2E2E2F696D672F61646D697373696F6E2F325F,0x2E2E2F696D672F61646D697373696F6E2F325F,0x2E2E2F696D672F61646D697373696F6E2F325F,0x2E2E2F696D672F61646D697373696F6E2F325F,'',0,0),(3,0x38,0x39,0x476F70616C676F6E6A20746563686E6963616C207363686F6F6C20616E6420636F6C6C65676520,0x4D6420626164686F6E20736865696B68,0xE0A6AEE0A78B3AE0A6ACE0A6BEE0A6A7E0A6A820E0A6B6E0A787E0A696,0x6D64206B686F6B6F6E,0xE0A6AEE0A78B3AE0A696E0A78BE0A695E0A6A820,0x6D6420736F6E696120616B746572,0xE0A6AEE0A7873AE0A6B8E0A78BE0A6A8E0A6BFE0A79FE0A6BE20E0A686E0A695E0A78DE0A6A4E0A6BEE0A6B020,0x343137203830382035383530,0x393135203932352036353033,0x3031393134383732373738,0x3031373538343931323037,0x447269766572,0x486F6D656D616B6572,0x323031312D31302D3233,'20113513234021606',0x4F2D,0x4D616C65,0x49736C616D,0x42616E676C616465736869,0x4172706172612C2056657261726861742C20486172696461737075722C204164647265737320476F70616C67616E6A2053616461722C20476F70616C67616E6A,0xE0A686E0A79CE0A6AAE0A6BEE0A79CE0A6BE2C20E0A6ADE0A787E0A79CE0A6BEE0A6B0E0A6B9E0A6BEE0A69F2C20E0A6B9E0A6B0E0A6BFE0A6A6E0A6BEE0A6B8E0A6AAE0A781E0A6B02C20E0A697E0A78BE0A6AAE0A6BEE0A6B2E0A697E0A69EE0A78DE0A69C20E0A6B8E0A6A6E0A6B02C20E0A697E0A78BE0A6AAE0A6BEE0A6B2E0A697E0A69EE0A78DE0A69C,0x4172706172612C2056657261726861742C20486172696461737075722C204164647265737320476F70616C67616EC4AF2053616461722C20476F70616C67616EC4AF,0xE0A686E0A79CE0A6AAE0A6BEE0A79CE0A6BE2C20E0A6ADE0A787E0A79CE0A6BEE0A6B0E0A6B9E0A6BEE0A69F2C20E0A6B9E0A6B0E0A6BFE0A6A6E0A6BEE0A6B8E0A6AAE0A781E0A6B02C20E0A697E0A78BE0A6AAE0A6BEE0A6B2E0A697E0A69EE0A78DE0A69C20E0A6B8E0A6A6E0A6B02C20E0A697E0A78BE0A6AAE0A6BEE0A6B2E0A697E0A69EE0A78DE0A69C,0x2E2E2F696D672F61646D697373696F6E2F335F313030303030363030382E6A7067,0x2E2E2F696D672F61646D697373696F6E2F335F313030303030363030362E6A7067,0x2E2E2F696D672F61646D697373696F6E2F335F313030303030363031322E6A7067,0x2E2E2F696D672F61646D697373696F6E2F335F313030303030303633372E6A7067,0x2E2E2F696D672F61646D697373696F6E2F335F313030303030363034312E706E67,0x2E2E2F696D672F61646D697373696F6E2F335F313030303030363035332E6A7067,0x4E6577,0,0);
/*!40000 ALTER TABLE `admissions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `admissions` with 3 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paycat`
--

LOCK TABLES `paycat` WRITE;
/*!40000 ALTER TABLE `paycat` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `paycat` VALUES (1,'Admission Fee',3000),(2,'Session Charge',1500),(3,'Extra Fee',400),(4,'Salary January',600),(5,'Salary February',600);
/*!40000 ALTER TABLE `paycat` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `paycat` with 5 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sectiongroup`
--

LOCK TABLES `sectiongroup` WRITE;
/*!40000 ALTER TABLE `sectiongroup` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sectiongroup` VALUES (1,'Class Nursery',-1,'A','-1A'),(2,'Class KG',0,'A','0A'),(3,'Class One',1,'A','1A'),(4,'Class Two',2,'A','2A'),(5,'Class Three',3,'A','3A'),(6,'Class Four',4,'A','4A'),(7,'Class Five',5,'A','5A'),(9,'Class Seven',7,'A','7A'),(10,'Class Eight',8,'A','8A'),(11,'Class Nine',9,'A','9A'),(12,'Class Ten',10,'Science','10Science'),(14,'Class Ten',10,'Business Studies','10Business Studies'),(15,'Class Ten',10,'Humanities','10Humanities'),(16,'Class Nursery',-1,'Admission','-1Admission'),(17,'Class KG',0,'Admission','0Admission'),(18,'Class One',1,'Admission','1Admission'),(19,'Class Two',2,'Admission','2Admission'),(20,'Class Three',3,'Admission','3Admission'),(21,'Class Four',4,'Admission','4Admission'),(23,'Class Five',5,'Admission','5Admission'),(24,'Class Six',6,'Admission','6Admission'),(25,'Class Seven',7,'Admission','7Admission'),(26,'Class Eight',8,'Admission','8Admission'),(27,'Class Nine',9,'Admission','9Admission'),(28,'Class Ten',10,'Admission','10Admission'),(29,'Class Six',6,'A','6A'),(30,'Class Ten',10,'A','10A');
/*!40000 ALTER TABLE `sectiongroup` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sectiongroup` with 27 row(s)
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniqid` (`uniqid`)
) ENGINE=InnoDB AUTO_INCREMENT=757 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `student` VALUES (1,0,'Class KG','A',8,'MIHRAN SAWAAB','FAYSAL AHMED','SHARMIN AKTER SHORNA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-11-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712083703','0A8','/2025/0/A/8.jpg',NULL,NULL,NULL),(2,0,'Class KG','A',5,'MD RAYHAN ISLAM','SHAFIQUL ISLAM','MORIAM AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2019-04-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724573396','0A5','/2025/0/A/5.jpg',NULL,NULL,NULL),(3,0,'Class KG','A',3,'MD TAHMID ISLAM TOHA','RABIUL ISLAM','TAYEBA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801763046672','0A3','/2025/0/A/3.jpg',NULL,NULL,NULL),(4,0,'Class KG','A',7,'NAFIA NOWSHIN','SOHEL RANA','MIM KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716816557','0A7','/2025/0/A/7.jpg',NULL,NULL,NULL),(5,0,'Class KG','A',6,'AFIA TASNIM','SOHEL RANA','MIM KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2019-07-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716816557','0A6','/2025/0/A/6.jpg',NULL,NULL,NULL),(6,0,'Class KG','A',1,'ANKAN MANDAL','NIRMAL MANDAL','ANAMIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-06','0','0','0','Vill: SabujbagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716330786','0A1','/2025/0/A/1.jpg',NULL,NULL,NULL),(7,0,'Class KG','A',11,'TATHOI BISWAS','TAPAN KUMER BISWAS','SREEMOTI HASI RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2019-01-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745532655','0A11','/2025/0/A/11.jpg',NULL,NULL,NULL),(8,0,'Class KG','A',10,'MD ABRAR FAIYAZ','MD MAHIRUL ISLAM','SINTHIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-06-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801683953889','0A10','/2025/0/A/10.jpg',NULL,NULL,NULL),(9,0,'Class KG','A',2,'MD JAYAN','MD TAZAMMUL HAQUE','MST ONU KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914851983','0A2','/2025/0/A/2.jpg',NULL,NULL,NULL),(10,0,'Class KG','A',9,'MD AFIF MOLLA','DIPU MOLLA','SUMONA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729944813','0A9','/2025/0/A/9.jpg',NULL,NULL,NULL),(13,0,'Class KG','A',4,'SHUVENDRA BISWAS','SUSHIL KUMAR BISWAS','MOLINA RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2024-03-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754414527','0A4','/2025/0/A/4.jpg',NULL,NULL,NULL),(16,1,'Class One','A',1,'ANWESHA DAS','PROTUL DAS','PAPSI MAITRA','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801743890043','1A1','/2025/1/A/1.jpg',NULL,NULL,NULL),(17,1,'Class One','A',3,'SATVIK ABESH BAIN','SABITABRATA BAIN','NIPA BEPARI','Not Avliable','Not Avliable','Not Avliable','MALE','2020-12-19','0','0','0','Vill: D/1 Medical officesPOST: 250 Bed gere ral Hospital THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801611262728','1A3','/2025/1/A/3.jpg',NULL,NULL,NULL),(18,1,'Class One','A',25,'GULAM RABBI','MD ROFIKUL ISLAM','MORSHEDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2002-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736524181','1A25','/2025/1/A/25.jpg',NULL,NULL,NULL),(20,1,'Class One','A',2,'MST MORIAM','MD MIJANUR RAHOMAN TALUKDER','FAHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2005-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726574465','1A2','/2025/1/A/2.jpg',NULL,NULL,NULL),(21,1,'Class One','A',8,'MAHMUDUL HASAN CHOWDHURY','SHAHIDUL ISLAM','ALINA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801874437109','1A8','/2025/1/A/8.jpg',NULL,NULL,NULL),(22,1,'Class One','A',13,'SNEHA BISWAS','SUKANTA BISWAS','RATNA MOULICK','Not Avliable','Not Avliable','Not Avliable','MALE','2016-10-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732382688','1A13','/2025/1/A/13.jpg',NULL,NULL,NULL),(23,1,'Class One','A',7,'FAIZA RAHMAN AFRIN','MUNSHI HASIBUR RAHMAN','ISRAT ZAHAN ERIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2013-02-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725001376','1A7','/2025/1/A/7.jpg',NULL,NULL,NULL),(24,1,'Class One','A',10,'BROTOTI SAHA','SREE BIDHAN KUMAR SAHA','TAPASHI SAHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2021-07-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721019240','1A10','/2025/1/A/10.jpg',NULL,NULL,NULL),(25,1,'Class One','A',15,'MD FARHAN MUHTADI','MD ARIFUL ISLAM','MST. FARHANA MOSTARI','Not Avliable','Not Avliable','Not Avliable','MALE','2029-05-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801744348419','1A15','/2025/1/A/15.jpg',NULL,NULL,NULL),(26,1,'Class One','A',14,'JACIKA ISLAM','SHOHIDUL ISLAM','FIROZA AKTER RATREY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2012-04-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801771608542','1A14','/2025/1/A/14.jpg',NULL,NULL,NULL),(27,1,'Class One','A',9,'SWACCHO BHAKTA','RINTU BHAKTA','NITU BAUL','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721869612','1A9','/2025/1/A/9.jpg',NULL,NULL,NULL),(28,1,'Class One','A',17,'BARNITA BISWAS','BIJAY BISWAS','BANASHRI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-06-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736363613','1A17','/2025/1/A/17.jpg',NULL,NULL,NULL),(29,1,'Class One','A',22,'TAWSIN KABIR','MD MASUM BILLAH','MISS. MITA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916429938','1A22','/2025/1/A/22.jpg',NULL,NULL,NULL),(30,1,'Class One','A',26,'ARUSHA SARKER','LET. RAJIB KUMAR SARKER','SIMA DAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2003-05-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789732351','1A26','/2025/1/A/26.jpg',NULL,NULL,NULL),(32,1,'Class One','A',28,'MD ATIF ARHAM','MD UZZAL MOLLA','ISRAT ARA','Not Avliable','Not Avliable','Not Avliable','MALE','2022-03-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801768373602','1A28','/2025/1/A/28.jpg',NULL,NULL,NULL),(35,1,'Class One','A',23,'ABDULLAH SALEH SHAYAN','DR. MD ABU SALEH','DR. SOHANA SARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2030-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713579016','1A23','/2025/1/A/23.jpg',NULL,NULL,NULL),(37,1,'Class One','A',27,'ANISHA TABASSUM','S M RIPON','KHALEDA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2030-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789206001','1A27','/2025/1/A/27.jpg',NULL,NULL,NULL),(41,1,'Class One','A',11,'ASIYA KHANOM','NOOR MOHAMMAD SHIEK','AMINA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2024-02-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912670319','1A11','/2025/1/A/11.jpg',NULL,NULL,NULL),(42,1,'Class One','A',30,'SAHABA AKTAR VUMI','MD NAHID SHEIKH','LABONI BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2008-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801707759977','1A30','/2025/1/A/30.jpg',NULL,NULL,NULL),(43,1,'Class One','A',21,'SADIYA KHAN','MD SEKENDER KHAN','MONIRA KHATUN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2014-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911414146','1A21','/2025/1/A/21.jpg',NULL,NULL,NULL),(44,1,'Class One','A',19,'SAMMOJIT BISWAS','SUKANTA BISWAS','ELA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2026-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801777897696','1A19','/2025/1/A/19.jpg',NULL,NULL,NULL),(45,1,'Class One','A',6,'PRIVTHIRAJ BISWAS','PAIIOB KANTI BISWAS','MALA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2028-07-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912331799','1A6','/2025/1/A/6.jpg',NULL,NULL,NULL),(46,1,'Class One','A',18,'ANERUDDHO BALA','APURBA BALA','TUMPA PODDER','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801967728117','1A18','/2025/1/A/18.jpg',NULL,NULL,NULL),(47,1,'Class One','A',29,'MAHISA IMROZ ALIA','MD TOUHIDUL ISLAM','UMBIA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2005-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801910437575','1A29','/2025/1/A/29.jpg',NULL,NULL,NULL),(48,1,'Class One','A',24,'MUNSHI TASKIN RAIYAN','MUNSHI ABU SUFIAN','FATEMA KAMRUN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2023-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716142021','1A24','/2025/1/A/24.jpg',NULL,NULL,NULL),(49,1,'Class One','A',5,'TOHERA BINTE REZWAN','MD REZWANUR RAHMAN','SAZIA JANNAH NISHAT','Not Avliable','Not Avliable','Not Avliable','FEMALE','2030-03-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713913404','1A5','/2025/1/A/5.jpg',NULL,NULL,NULL),(50,1,'Class One','A',20,'PROGGA MONI MAJUMDAR','SANJIB KUMAR MAJUMDAR','JAYASHREE SARKAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2006-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742222325','1A20','/2025/1/A/20.jpg',NULL,NULL,NULL),(51,1,'Class One','A',16,'FATIMA AFROZ','FARIDUL ISLAM','RUMA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-03-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704772202','1A16','/2025/1/A/16.jpg',NULL,NULL,NULL),(52,1,'Class One','A',4,'MD.TASFIN RAHMAN','MD. KHALEDUR RAHMAN','JAMILA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-11-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913890360','1A4','/2025/1/A/4.jpg',NULL,NULL,NULL),(79,2,'Class Two','A',2,'NIHAN BISWAS','BINOY KRISHYNA BISWAS','NIPA RANI BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-03','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801705456072','2A2','/2025/2/A/2.jpg',NULL,NULL,NULL),(81,2,'Class Two','A',1,'NIBIR KANTI BISWAS','PROKASH KANTI BISWAS','NAMITA RANI MALO','Not Avliable','Not Avliable','Not Avliable','MALE','2017-09-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801715166940','2A1','/2025/2/A/1.jpg',NULL,NULL,NULL),(88,2,'Class Two','A',8,'JAGROTO MONDAL SIDDHI','JAPATOSH MONDAL','SHANCHARI SARKER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714940031','2A8','/2025/2/A/8.jpg',NULL,NULL,NULL),(90,2,'Class Two','A',7,'ALVINA ERA','S.M. RAFIKUL HASAN','JUTHI KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-10-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914503651','2A7','/2025/2/A/7.jpg',NULL,NULL,NULL),(91,2,'Class Two','A',4,'MAHISA AKTER','MD. HAFIZUR','SONYA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801676699312','2A4','/2025/2/A/4.jpg',NULL,NULL,NULL),(93,2,'Class Two','A',6,'SAIFAN ISLAM','TANBIRUL ISLAM','OYENDRILA HOSSAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717366402','2A6','/2025/2/A/6.jpg',NULL,NULL,NULL),(94,2,'Class Two','A',15,'MAISHA KHAN ROZA','SHAFIKUL ISLAM LITON','SABIHA SAFIQ MUNNI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801676885524','2A15','/2025/2/A/15.jpg',NULL,NULL,NULL),(95,2,'Class Two','A',11,'JANNATUL FERDAUS','MD. JAHIDUL ISLAM','MST. KHURSHID JAHAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-07-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718681932','2A11','/2025/2/A/11.jpg',NULL,NULL,NULL),(98,2,'Class Two','A',18,'FARDIN KARI','ALAM KARI','SONEYA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762882664','2A18','/2025/2/A/18.jpg',NULL,NULL,NULL),(100,2,'Class Two','A',12,'LABIB AL RAIYAN','MD. JUEL MOLLA','RUPALI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801830400320','2A12','/2025/2/A/12.jpg',NULL,NULL,NULL),(101,2,'Class Two','A',9,'NIROB RAHMATULLAH','RAHMATULLA SAJAL','FARZANA AKTER BRISTY','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801771608767','2A9','/2025/2/A/9.jpg',NULL,NULL,NULL),(103,2,'Class Two','A',17,'RAKIKA ISLAM','IMRUL BISWAS','AFRINA KABIR MOMOTA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710911019','2A17','/2025/2/A/17.jpg',NULL,NULL,NULL),(104,2,'Class Two','A',14,'ARIAN JAMAN','MUNSI RAKIBUZZAMAN','FAYAJA AHAMAD MILY','Not Avliable','Not Avliable','Not Avliable','MALE','2016-07-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717606655','2A14','/2025/2/A/14.jpg',NULL,NULL,NULL),(105,2,'Class Two','A',16,'NAJIFA AKTER','RIPON MOLLA','NURTAJ BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-06-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724280825','2A16','/2025/2/A/16.jpg',NULL,NULL,NULL),(107,2,'Class Two','A',13,'THIRTHO BISWAS','GOBINDA BISWAS','RUPA MAJUMDER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-07-02','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739840394','2A13','/2025/2/A/13.jpg',NULL,NULL,NULL),(108,2,'Class Two','A',10,'S M ARDOGAN TAJUDDIN','SARDAR MD MAJBA UDDIN','SELINA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-03-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724794166','2A10','/2025/2/A/10.jpg',NULL,NULL,NULL),(109,2,'Class Two','A',3,'MD TAHSIN HAQUE','MD ENAMUL HAQUE','MST. TANZINA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-10-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704486239','2A3','/2025/2/A/3.jpg',NULL,NULL,NULL),(111,2,'Class Two','A',5,'MD. ZARIF BIN MAHMUD','MD. MAHMUD ALAM','ZARINA YASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714596260','2A5','/2025/2/A/5.jpg',NULL,NULL,NULL),(143,3,'Class Three','A',11,'NISHAT NUR','MD IMRAN MALLIK','YASMIN KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2008-03-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801318600628','3A11','/2025/3/A/11.jpg',NULL,NULL,NULL),(144,3,'Class Three','A',2,'JYOTI BISWAS','JIBAN BISWAS','SUPRIYA MAJUMDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-07-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913986475','3A2','/2025/3/A/2.jpg',NULL,NULL,NULL),(145,3,'Class Three','A',4,'MORIOM KABIR TOYA','MD HUMAUN KABIR','SHAMIMA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2001-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737298189','3A4','/2025/3/A/4.jpg',NULL,NULL,NULL),(146,3,'Class Three','A',7,'RAISA RAHMAN RIMU','MD HAFIJUR RAHMAN','SAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-04-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719212113','3A7','/2025/3/A/7.jpg',NULL,NULL,NULL),(147,3,'Class Three','A',8,'DITIPRIYA MAJUMDER','DIPANKAR MAJUMDER','MUKTA SARKER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801862105314','3A8','/2025/3/A/8.jpg',NULL,NULL,NULL),(148,3,'Class Three','A',14,'ANUP SHIKARI','NIRMAL SHIKARI','PINKI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2024-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994046694','3A14','/2025/3/A/14.jpg',NULL,NULL,NULL),(150,3,'Class Three','A',5,'ANISHA MUMTAJ','MAHFUJUL HAQUE','ZANNATUN NAYM','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801730719970','3A5','class 3 asnish mumtaz.jpg',NULL,NULL,NULL),(151,3,'Class Three','A',6,'MAHNOOR AFROZ','MD MAHABUBUR RAHMAN','ITI AFROZ BULBUL','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731500731','3A6','/2025/3/A/6.jpg',NULL,NULL,NULL),(152,3,'Class Three','A',3,'RAIYAN RAFI','FARIDUL ISLAM','RUMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704772202','3A3','/2025/3/A/3.jpg',NULL,NULL,NULL),(153,3,'Class Three','A',16,'SHARIF MAHIR ABSAR','SHAH ALAM SHARIF','TAJMIRA MOSTARI','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732394958','3A16','/2025/3/A/16.jpg',NULL,NULL,NULL),(154,3,'Class Three','A',10,'MD ADIYAT RAHMAN TAZBHI','MD MOFIZUR RAHMAN','MORSHADA AFROZ','Not Avliable','Not Avliable','Not Avliable','MALE','2021-11-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729978880','3A10','/2025/3/A/10.jpg',NULL,NULL,NULL),(155,3,'Class Three','A',17,'MD JAKARIA SHIKDER','HACEBUR RAHAMAN SIKDER','MST FATIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611954783','3A17','/2025/3/A/17.jpg',NULL,NULL,NULL),(156,3,'Class Three','A',19,'NAZMIN NAHAR','MD NIZAM UDDIN MOLLA','SHUMANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672190167','3A19','/2025/3/A/19.jpg',NULL,NULL,NULL),(157,3,'Class Three','A',13,'PROKRITI BISWAS','SUBRATA BISWAS','CHAMPA PODDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801982577122','3A13','/2025/3/A/13.jpg',NULL,NULL,NULL),(160,3,'Class Three','A',15,'SRIJAN SARKAR','SUJIPTA SARKAR','NANDINI SEN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801748959577','3A15','/2025/3/A/15.jpg',NULL,NULL,NULL),(161,3,'Class Three','A',21,'TOKY MOLLA','RAHMAT','TAHAMINA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2004-04-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914920004','3A21','/2025/3/A/21.jpg',NULL,NULL,NULL),(162,3,'Class Three','A',12,'NIBIR AVEEK BAIN','SABITABRATA BAIN','NIPA BEPARI','Not Avliable','Not Avliable','Not Avliable','MALE','2002-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611262728','3A12','/2025/3/A/12.jpg',NULL,NULL,NULL),(163,3,'Class Three','A',18,'ADITI RAI','BISHAJIT RAI','ANANNA DATTO','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725387204','3A18','/2025/3/A/18.jpg',NULL,NULL,NULL),(165,3,'Class Three','A',20,'PROGGA BOSU TILA','TAPOS BOSU','SUCHANDA BASU','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-03-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801844603283','3A20','/2025/3/A/20.jpg',NULL,NULL,NULL),(167,3,'Class Three','A',22,'ANUSHKA HIRA','APURBA HIRA','MONE BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960927022','3A22','/2025/3/A/22.jpg',NULL,NULL,NULL),(168,3,'Class Three','A',9,'JANNATUL MAWA TASNIA','SARDER RAZOUAN','MEHERUNNESA KHATUN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-01-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911566242','3A9','/2025/3/A/9.jpg',NULL,NULL,NULL),(170,3,'Class Three','A',1,'SAYINTIKA GOLDER','SWAPAN GOLDER','BEAUTY BALA','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756255618','3A1','/2025/3/A/1.jpg',NULL,NULL,NULL),(173,4,'Class Four','A',2,'HAFSA AKTER','MASUDUL HAQUE KHAN','HALIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801740876876','4A2','/2025/4/A/2.jpg',NULL,NULL,NULL),(174,4,'Class Four','A',4,'AFIA AFRIN MEEM','KAZI SOHEL RANA','TAMANNA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722427691','4A4','/2025/4/A/4.jpg',NULL,NULL,NULL),(176,4,'Class Four','A',13,'SAMRIN ISLAM','MD ABU SUFIAN','CHADNI SIKDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-09-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801886764456','4A13','/2025/4/A/13.jpg',NULL,NULL,NULL),(177,4,'Class Four','A',9,'TAKWA ISLAM','PALASH MIA','RUNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-10-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801326971819','4A9','/2025/4/A/9.jpg',NULL,NULL,NULL),(178,4,'Class Four','A',5,'KAZI SHAWAL SHAWON','KAZI IQBAL HOSSAN','SAHINA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-07-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801783380066','4A5','/2025/4/A/5.jpg',NULL,NULL,NULL),(179,4,'Class Four','A',3,'ABU TALHA','MD. RAFIUL ISLAM','BITHEE KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801857069100','4A3','/2025/4/A/3.jpg',NULL,NULL,NULL),(183,4,'Class Four','A',10,'FARHANA MEHJABIN','MAHAMUDUL HASAN','SHAHINUR KHANUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728550415','4A10','/2025/4/A/10.jpg',NULL,NULL,NULL),(184,4,'Class Four','A',7,'AHNAF SALEH AAYAN','DR. MD ABU SALEH','DR. SOHANA SARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713579016','4A7','/2025/4/A/7.jpg',NULL,NULL,NULL),(186,4,'Class Four','A',11,'POULOMI BHADRA','PORITOSH BHADRA','RUPA DAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-06-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717438618','4A11','/2025/4/A/11.jpg',NULL,NULL,NULL),(187,4,'Class Four','A',20,'SRISTY SARKAR','RATAN KUMAR SARKAR','KRISHNA RANI SARKAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-11-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776246736','4A20','/2025/4/A/20.jpg',NULL,NULL,NULL),(188,4,'Class Four','A',12,'MAHIM ALI KHAN','MAHAMAD KHA','TANIA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801320597804','4A12','/2025/4/A/12.jpg',NULL,NULL,NULL),(189,4,'Class Four','A',18,'PAKHI BISWAS','PARESH BISWAS','SUJALA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-10-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920738658','4A18','/2025/4/A/18.jpg',NULL,NULL,NULL),(191,4,'Class Four','A',6,'MAHIRA ISLAM ADREETA','MD. MAHIRUL ISLAM','SINTHIA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-04-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801683953889','4A6','/2025/4/A/6.jpg',NULL,NULL,NULL),(192,4,'Class Four','A',21,'ABID HASSEN','JAHID HOSEN','KHALADA PARVIN SUME','Not Avliable','Not Avliable','Not Avliable','MALE','2015-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801706852713','4A21','/2025/4/A/21.jpg',NULL,NULL,NULL),(193,4,'Class Four','A',26,'RESUN MOLLAH','NUR MOHAMMAD MOLLAH','RITA PARVIN','Not Avliable','Not Avliable','Not Avliable','MALE','2016-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801735028689','4A26','/2025/4/A/26.jpg',NULL,NULL,NULL),(194,4,'Class Four','A',22,'MD. ALI','MD. MAHABUB MOLLA','RUNA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2016-03-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759155675','4A22','/2025/4/A/22.jpg',NULL,NULL,NULL),(195,4,'Class Four','A',24,'TURJO BAIDYA','NIRANJAN BAIDYA','ARSTI MADHU','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722274280','4A24','/2025/4/A/24.jpg',NULL,NULL,NULL),(198,4,'Class Four','A',25,'ZOBAIDA AKTER EVA','MD ABUL BASHAR SHAIKH','JESMINE AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2014-05-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712651335','4A25','/2025/4/A/25.jpg',NULL,NULL,NULL),(199,4,'Class Four','A',27,'MD. ZISHAN CHOWDHURY','IMRAN CHOWDHURY','AFROZA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2016-01-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966925138','4A27','/2025/4/A/27.jpg',NULL,NULL,NULL),(201,4,'Class Four','A',14,'CHAYAN ROY','DIPANKAR ROY','RICKTA MONDOL','Not Avliable','Not Avliable','Not Avliable','MALE','2016-09-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716561667','4A14','/2025/4/A/14.jpg',NULL,NULL,NULL),(202,4,'Class Four','A',17,'ARBAD HOSSAIN ANIF','MD. ABDUL ALIM','KHALIDA ADIB','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762612239','4A17','/2025/4/A/17.jpg',NULL,NULL,NULL),(203,4,'Class Four','A',15,'SHEIKH MD MAHIR SHAHARIAR','MANIRUZZAMAN SHEIKH','POPY SIKDER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-09-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712613687','4A15','/2025/4/A/15.jpg',NULL,NULL,NULL),(204,4,'Class Four','A',16,'NANDINI BISWAS','NABAKUMAR BISWAS','KALPANA MANDOL','Not Avliable','Not Avliable','Not Avliable','FEMALE','2004-05-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737735619','4A16','/2025/4/A/16.jpg',NULL,NULL,NULL),(205,4,'Class Four','A',30,'TAIB AL HASAN','RASEL KABIR','MST FARHANA SIDDIKA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756594453','4A30','/2025/4/A/30.jpg',NULL,NULL,NULL),(206,4,'Class Four','A',23,'FATEMA ISLAM','MD TOREKUL ISLAM','SHAHIDA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801727439288','4A23','/2025/4/A/23.jpg',NULL,NULL,NULL),(207,4,'Class Four','A',31,'TANZIMA KHAN DHOOA','K.M RAMZAN ALI','MUKTA CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-11-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719149242','4A31','/2025/4/A/31.jpg',NULL,NULL,NULL),(208,4,'Class Four','A',28,'UMME AIMAN YEARA','ASADUL ISLAM','SHAYLA ISLAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-02-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','4A28','/2025/4/A/28.jpg',NULL,NULL,NULL),(209,4,'Class Four','A',1,'ZAIN ABDULLAH RAFAN','AZHARUL ISLAM','ROKSANA AKHTER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-02-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801727811268','4A1','/2025/4/A/1.jpg',NULL,NULL,NULL),(210,4,'Class Four','A',8,'ALIF SHEIKH','HASAN ALI SHEIKH','KHUKU BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2024-03-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756545544','4A8','/2025/4/A/8.jpg',NULL,NULL,NULL),(211,4,'Class Four','A',29,'SADNAN SAMI','MD. BADAR MIA','UMMA KULSUM SOPNA','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-31','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801705046448','4A29','/2025/4/A/29.jpg',NULL,NULL,NULL),(212,4,'Class Four','A',19,'ADITI GHOSH','SHAROZIT KUMAR GHOSH','MITALI RANI GHOSH','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-06-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801799122796','4A19','/2025/4/A/19.jpg',NULL,NULL,NULL),(237,5,'Class Five','A',17,'PUSPITA MAJUMDER','PIGUSH KANTI MAJUMDER','SWAPNA RANI DATTA','পুষ্পিতা মজুমদার','পিযুষ কান্তি মজুমদার','স্বপ্না রানী দত্ত','FEMALE','2025-02-15','20153522509066624','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801761424455','5A17','/2025/5/A/17.jpg',NULL,NULL,NULL),(238,5,'Class Five','A',13,'HAFSHA RAHMAN KOTHA','MD HEZBUR RAHMAN PRINCE','RAHIMA AKTAR','হাফসা রহমান কথা','মোঃ হেজবুর রহমান প্রিন্স','রহিমা আক্তার','FEMALE','2022-01-15','20153522501069478','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801768197979','5A13','/2025/5/A/13.jpg',NULL,NULL,NULL),(239,5,'Class Five','A',14,'SHEIKH TISAN','SALIM SHEKH','TAMANNA BEGUM','শেখ তিশান','সেলিম শেখ','তামান্না বেগম','MALE','2024-01-15','20143513256019004','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801744662626','5A14','/2025/5/A/14.jpg',NULL,NULL,NULL),(240,5,'Class Five','A',18,'MAHIYA MAMUN','AL MAMUN','SHARIFA BEGUM','মাহিয়া  মামুন','আল মামুন','শরিফা বেগম','FEMALE','2019-05-14','20143513269028945','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801627903875','5A18','/2025/5/A/18.jpg',NULL,NULL,NULL),(241,5,'Class Five','A',19,'ARAF SHARIF','TARIQUL ISLAM','FATEMA TUZ ZOHARA','আরাফ শরীফ','তারিকুল ইসলাম','ফাতেমা তুজ জোহরা','MALE','2019-05-14','20143522509077377','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776809349','5A19','/2025/5/A/19.jpg',NULL,NULL,NULL),(242,5,'Class Five','A',16,'NUSRAT JAHAN','MD JOINUL ABEDIN','SONIA AKTER','নুসরাত জাহান','মোঃ জয়নুল আবেদীন','সোনিয়া আক্তার','FEMALE','2024-08-15','20153522509066517','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994503563','5A16','/2025/5/A/16.jpg',NULL,NULL,NULL),(243,5,'Class Five','A',9,'SAMIHA','MD OBYDULLAH','FARJANA HAQUE','সামিহা','মোঃ ওবায়দুল্লাহ','ফারজানা হক','FEMALE','2030-04-16','20163522508065384','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801785035000','5A9','/2025/5/A/9.jpg',NULL,NULL,NULL),(247,5,'Class Five','A',6,'MAHADI HASAN TUR','MD EMRAN MUNSI','MST. RUPA KHANAM','মাহাদি হাসান তূর','মোঃ ইমরান মুন্সী','মোসাঃ রুপা খানম','MALE','2027-12-14','20143514381035075','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759296441','5A6','/2025/5/A/6.jpg',NULL,NULL,NULL),(248,5,'Class Five','A',23,'HABIBUR RAHMAN SHEIKH','AL AMIN SHEIKH','NASRIN KHANAM','হাবিবুর রহমান শেখ','আল আমিন শেখ','নাসরিন খানম','MALE','2014-09-15','20153513243020243','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801832697622','5A23','/2025/5/A/23.jpg',NULL,NULL,NULL),(249,5,'Class Five','A',10,'NUSRAT TABASSUM','MOLLA MURAD','MAZADA AKTER','নুসরাত তাবাচ্ছুম','মোল্যা মুরাদ','মাজেদা আক্তার','FEMALE','2001-06-14','20143513217024126','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801963884807','5A10','/2025/5/A/10.jpg',NULL,NULL,NULL),(250,5,'Class Five','A',8,'NABONITA BISWAS','PALLOB KANTI BISWAS','MALA BISWAS','নবনীতা বিশ্বাস','পল্লব কান্তি বিশ্বাস','মালা বিশ্বাস','FEMALE','2028-04-15','20153513282022687','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912331799','5A8','/2025/5/A/8.jpg',NULL,NULL,NULL),(251,5,'Class Five','A',20,'MD SANIM CHOWDHURY','UZZAL MAMUN CHOWDHURY','RAHIMA CHOWDHURY','মোঃ সানীম চৌধুরী','উজ্জল মামুন চৌধুরী','রহিমা  চৌধুরী','MALE','2017-10-14','20143522509058057','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718656581','5A20','/2025/5/A/20.jpg',NULL,NULL,NULL),(252,5,'Class Five','A',15,'NAYEEM BIN HASAN','MD ABUL HASAN','NASNIN NAHAN','নাঈম বিন  হাসান','মোঃ আবুল হাসান','নাজনীন নাহার','MALE','2006-04-14','20141813159112337','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801990024242','5A15','/2025/5/A/15.jpg',NULL,NULL,NULL),(253,5,'Class Five','A',2,'GALPO BISWAS','SANJAY BISSAS','SHILA MONDAL','গল্প বিশ্বাস','সঞ্জয় বিশ্বাস','শিলা বিশ্বাস','MALE','2030-11-14','20143522501069832','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801786930040','5A2','/2025/5/A/2.jpg',NULL,NULL,NULL),(254,5,'Class Five','A',22,'ARANYA HIRA','APURBA HIRA','MONI BISWAS','অরন্য হীরা','অপূর্ব হীরা','মনি বিশ্বাস','MALE','2012-01-15','20150115617102178','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960927022','5A22','/2025/5/A/22.jpg',NULL,NULL,NULL),(258,5,'Class Five','A',5,'ISRAT AHMED','SABBIR AHMED','TAPOSI','ইসরাত  আহমেদ','সাব্বির আহম্মেদ','তাপসী','FEMALE','2008-12-15','20153522508077366','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801033223329','5A5','/2025/5/A/5.jpg',NULL,NULL,NULL),(259,5,'Class Five','A',11,'ARISHA KHANAM','KHALID HOSSAIN','AKHI AKTER','আরিশা খানম','খালিদ হোসেন','আখি আক্তার','FEMALE','2015-09-14','20143513221014799','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801408146721','5A11','/2025/5/A/11.jpg',NULL,NULL,NULL),(260,5,'Class Five','A',7,'ISLAM AHMED JARIF','ABDUS SATTAR MIAH','ASMA AKTER','ইসমাম আহমেদ  জারিফ','আবদুস ছাত্তার মিয়া','আসমা আক্তার','MALE','2001-01-15','20152914739113478','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916817524','5A7','/2025/5/A/7.jpg',NULL,NULL,NULL),(261,5,'Class Five','A',3,'MIFTAHUL JANNAT AREBA','MD MIRAZ SHARDER','SHARMIN AKTER','মিফতাহুল জান্নাত আরিবা','মোঃ মিরাজ সরদার','শারমিন আকতার','FEMALE','2005-09-13','20133522509067481','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717810719','5A3','/2025/5/A/3.jpg',NULL,NULL,NULL),(262,5,'Class Five','A',4,'SOUMMODIP HALDER','DINABANDHU HALDER','SUMITA SARKER','সৌম্যদ্বীপ হালদার','দীনবন্ধু হালদার','সুমিতা সরকার','MALE','2027-06-14','20143519138103001','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745130323','5A4','/2025/5/A/4.jpg',NULL,NULL,NULL),(263,5,'Class Five','A',12,'MOHAMMADULLAH ABRAR','MAMUN KHAN','SAMIRA AKTAR','Not Avliable','Not Avliable','Not Avliable','MALE','2006-09-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801537378644','5A12','/2025/5/A/12.jpg',NULL,NULL,NULL),(264,5,'Class Five','A',1,'Antika Mondal','Gopal Chandra Mondal','Asha Mondal','অন্তিকা মন্ডল','গোপাল চন্দ্র মন্ডলা','আশা মন্ডল','FEMALE','2015-12-07','20153519119027502','7303625011','5513365667','','01642998178','5A1','/2025/5/A/1.jpg',NULL,NULL,NULL),(265,5,'Class Five','A',21,'Md Nuruzzaman Sheikh','Md Reazul Islam','Mst. Taslena','মো: নুরুজ্জামান শেখ','মো: রিয়াজুল ইসলাম','মোছা: তাছলিনা','MALE','2013-11-27','20136512815916580','3258367006','6439485159','','01607990520','5A21','/2025/5/A/21.jpg',NULL,NULL,NULL),(268,6,'Class Six','A',3,'ABDUR RAZZAQUE RAZJO','HARUN AR RASHID BABLU','ZANNATUL FERDOUS','আব্দুর রাজ্জাক রাজ্য','হারুন-অর-রশীদ বাবলু','জান্নাতুল ফেরদৌস','MALE','2008-06-12','20123522503050620','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760200092','6A3','/2025/6/A/3.jpg',NULL,NULL,NULL),(270,6,'Class Six','A',9,'TARIKA TASNIM TARIN','S M OBAYDUR RAHMAN','MST BILKIS SIDDIKA','তারিকা তাসনিম তারিন','এস,এম ওবায়দুর রহমান','মোছাঃ বিলকিস সিদ্দিকা','FEMALE','2024-06-14','20143513234021484','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747867731','6A9','/2025/6/A/9.jpg',NULL,NULL,NULL),(271,6,'Class Six','A',8,'NAHOR A JANNAT','S M A REEAZ UDDIN','LAILATUL FERDOUSI','নহর এ  জান্নাত','এস এম এ রিয়াজ উদ্দীন','লায়লাতুল ফেরদৌসী','FEMALE','2009-11-14','20143522507073035','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801937231632','6A8','/2025/6/A/8.jpg',NULL,NULL,NULL),(274,6,'Class Six','A',11,'HUSAIN DARIA','NAZMUL','FOZILA KHANAM','হুসাইন দাড়িয়া','নাজমুল','ফজিলা খানম','MALE','2029-12-12','20123513211019032','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721739144','6A11','/2025/6/A/11.jpg',NULL,NULL,NULL),(279,6,'Class Six','A',10,'ANUSKA BANIK','ASHIM BANIK','SUSHILA BARAI','অনুস্কা বনিক','অসীম বনিক','সুশীলা বাড়ৈ','FEMALE','2001-11-13','20133522509066581','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928643923','6A10','/2025/6/A/10.jpg',NULL,NULL,NULL),(280,6,'Class Six','A',5,'NAZIFA TABASSUM','HABIBUR RAHMAN','FOUZIA KHANAM','মোসাম্মৎ  নাজিফা তাবাসসুম','মোঃ হাবিবুর রহমান','ফৌজিয়া খানম','FEMALE','2013-09-13','20132610413104380','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801979142463','6A5','/2025/6/A/5.jpg',NULL,NULL,NULL),(282,6,'Class Six','A',7,'SHEIKH JAWAD UDDIN','SHEIKH JASIM UDDIN','ROMANA AFAZ','শেখ জাওয়াদ উদ্দীন','শেখ জসীম  উদ্দীন','রোমেনা  আফাজ','MALE','2013-12-26','20130110834106344','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737021310','6A7','/2025/6/A/7.jpg',NULL,NULL,NULL),(283,6,'Class Six','A',1,'MD SAFWAT TAWSIF','MD SAIFUL HUDA','MST.NA ZRUN PARVIN','মোঃ সাফওয়াত  তাওসীফ','মোঃ সাইফুল  হুদা','মোসাঃ নজরুন  পারভীন','MALE','2001-01-14','20148714713106594','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776242096','6A1','/2025/6/A/1.jpg',NULL,NULL,NULL),(284,6,'Class Six','A',4,'TAJWAR TAHA ISLAM','TARIQUL ISLAM','SHOHELY ISLAM','তাজওয়ার তাহা ইসলাম','তরিকুল ইসলাম','সোহেলী ইসলাম','MALE','2024-05-14','20143519119024829','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801930444513','6A4','/2025/6/A/4.jpg',NULL,NULL,NULL),(288,6,'Class Six','A',6,'ANUSKA CHOWDHURY','PANKAJ CHOWDHURY','DIPALY BHAKTA','অনুস্কা চৌধুরী','পংকজ  চৌধুরী','দিপালী ভক্ত','FEMALE','2030-08-13','20133515179901149','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742729987','6A6','/2025/6/A/6.jpg',NULL,NULL,NULL),(291,6,'Class Six','A',12,'MD SALMAN','MD MIJANUUR RAHAMAN','MUSLIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2012-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736556342','6A12','/2025/6/A/12.jpg',NULL,NULL,NULL),(293,6,'Class Six','A',2,'MD. ADIL AHNAF TARIF','MD. MAMUNUR RASHID','MST. NASRIN SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739726374','6A2','/2025/6/A/2.jpg',NULL,NULL,NULL),(298,7,'Class Seven','A',2,'KAZI MINHAZUL ISLAM','KAZI MIZANUR RAHAMAN','UMMAY KULSUM','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722147495','7A2','/2025/7/A/2.jpg',NULL,NULL,NULL),(299,7,'Class Seven','A',7,'THEOPHIL GAIN HEAVEN','TOTON GAIN','RIPA MODHU','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801700000000','7A7','/2025/7/A/7.jpg',NULL,NULL,NULL),(300,7,'Class Seven','A',28,'TANJIR KABIR','RASEL KABIR','MST.FARHANA SIDDIKA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-01-08','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801853000266','7A28','/2025/7/A/28.jpg',NULL,NULL,NULL),(302,7,'Class Seven','A',13,'SHEIKH MAHYAN ALAM','SHEIKH SHUDRUL ALAM','JARIN SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734913635','7A13','/2025/7/A/13.jpg',NULL,NULL,NULL),(305,7,'Class Seven','A',8,'AENAN IBNA MUSA','MD.MUSA KALIMULLA','EYERINE','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801633551098','7A8','/2025/7/A/8.jpg',NULL,NULL,NULL),(306,7,'Class Seven','A',21,'RUDRANIL BAIN','RANJAN CHANDRA BAIN','SUBARNA MAITRA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712578166','7A21','/2025/7/A/21.jpg',NULL,NULL,NULL),(309,7,'Class Seven','A',20,'MD NAIMUL ISLAM OVI','MD LELIN MOLLA','NADIRA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2027-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801965887663','7A20','/2025/7/A/20.jpg',NULL,NULL,NULL),(311,7,'Class Seven','A',25,'SM NAZMUL HOSSAIN','MAHMUD HOSSAIN SARDER','MOUSUMI KHANAM','এস এম নাজমুল হোসেন','মাহমুদ হোসেন সরদার','মৌসুমী খানম','MALE','2012-10-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723613061','7A25','/2025/7/A/25.jpg',NULL,NULL,NULL),(314,7,'Class Seven','A',33,'FAHIM SIKDEE','ISABUL HAQUE SIKDER','LABUNI KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2027-03-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','7A33','/2025/7/A/33.jpg',NULL,NULL,NULL),(315,7,'Class Seven','A',9,'SHEIKH SALMAN JABER','RASHEDUL ISLAM','KAMRUNNAHAR LUCKY','Not Avliable','Not Avliable','Not Avliable','MALE','2014-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801301552483','7A9','/2025/7/A/9.jpg',NULL,NULL,NULL),(316,7,'Class Seven','A',27,'ANDALIB RAHMAN','SHAGOR AHMED','HALIMA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2029-10-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801608490585','7A27','/2025/7/A/27.jpg',NULL,NULL,NULL),(318,7,'Class Seven','A',1,'MD SULTAN MOLLA','MD ZAKIR HOSSAIN','ALEYA PAEVIN','Not Avliable','Not Avliable','Not Avliable','MALE','2023-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801915931289','7A1','/2025/7/A/1.jpg',NULL,NULL,NULL),(319,7,'Class Seven','A',23,'MD TAUSIF JAHAN','KHANJAHAN ALI SHEIKH','NAZMOON NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2018-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724478846','7A23','/2025/7/A/23.jpg',NULL,NULL,NULL),(320,7,'Class Seven','A',18,'PEYEL MONDOL','PALASH KUMAR MONDOL','LIPIKA HAJRA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801951536392','7A18','/2025/7/A/18.jpg',NULL,NULL,NULL),(321,7,'Class Seven','A',3,'ARANYA PODDER TAMAL','MONOJ KUMAR PODDER','JHUNU SARKER','Not Avliable','Not Avliable','Not Avliable','MALE','2013-11-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801310673404','7A3','/2025/7/A/3.jpg',NULL,NULL,NULL),(322,7,'Class Seven','A',22,'APRON RAY','PROTAP ROY','ARCHANA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2007-09-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916682614','7A22','/2025/7/A/22.jpg',NULL,NULL,NULL),(323,7,'Class Seven','A',14,'NAYEEF BIN HASAN','MD ABUL HASAN','NASNIN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2001-06-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801990024242','7A14','/2025/7/A/14.jpg',NULL,NULL,NULL),(324,7,'Class Seven','A',31,'MUSFIKUZZAMAN TASIM','GAJI ASIKUZZAMAN PALASH','NADIRA FERDOUS MUNNI','Not Avliable','Not Avliable','Not Avliable','MALE','2030-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801964074869','7A31','/2025/7/A/31.jpg',NULL,NULL,NULL),(327,7,'Class Seven','A',30,'RAFSHAN','ANICH SHEKH','RABITEA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-10-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747377552','7A30','/2025/7/A/30.jpg',NULL,NULL,NULL),(328,7,'Class Seven','A',19,'SUDARSHAN BHAKTA','SUBRATA KUMAR BHAKTA','LOVELY BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2027-07-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760202295','7A19','/2025/7/A/19.jpg',NULL,NULL,NULL),(329,7,'Class Seven','A',4,'AREEB AYAAN','MD ASADUZZAMAN KHAN','KHALADA NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2018-02-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717337438','7A4','/2025/7/A/4.jpg',NULL,NULL,NULL),(331,7,'Class Seven','A',10,'JARIF NEWAZ ARNOB','EKRAMUL NAWAZ','UPOMA RAHMAN','Not Avliable','Not Avliable','Not Avliable','MALE','2024-01-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801888586307','7A10','/2025/7/A/10.jpg',NULL,NULL,NULL),(332,7,'Class Seven','A',16,'MUNSHI TASNIM HABIB','MUNSHI ABU SUFIAN','FATEMA KAMRUN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2030-09-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711104396','7A16','/2025/7/A/16.jpg',NULL,NULL,NULL),(333,7,'Class Seven','A',17,'NAZAT AL SIAM','MD BAHARUL SHEIKH','ANAMIKA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2021-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801308954439','7A17','/2025/7/A/17.jpg',NULL,NULL,NULL),(335,7,'Class Seven','A',29,'SAHAD SAMIR','HEROK SORDAR','SABERA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','7A29','/2025/7/A/29.jpg',NULL,NULL,NULL),(336,7,'Class Seven','A',12,'ARJO MANDAL','UTTAM KUMAR MANDAL','MANGALI HIRA','Not Avliable','Not Avliable','Not Avliable','MALE','2028-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717322224','7A12','/2025/7/A/12.jpg',NULL,NULL,NULL),(337,7,'Class Seven','A',11,'TAMIM FOKIR','HASAN FOKIR','TANIA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793582091','7A11','/2025/7/A/11.jpg',NULL,NULL,NULL),(338,7,'Class Seven','A',24,'MD SHAKIB MOLLA','MD BABLUE MOLLA','DALIA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2002-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801794247117','7A24','/2025/7/A/24.jpg',NULL,NULL,NULL),(341,7,'Class Seven','A',6,'SHEIKH ABU HURAYRA ARMAN','ISRAIL KALIM','ESMAT ARA','Not Avliable','Not Avliable','Not Avliable','MALE','2023-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732545360','7A6','/2025/7/A/6.jpg',NULL,NULL,NULL),(342,7,'Class Seven','A',32,'ABRAR FAHAD SUVRO','MUHAMMAD ENAMUL HAQE','MST. ZAKIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711906014','7A32','/2025/7/A/32.jpg',NULL,NULL,NULL),(343,7,'Class Seven','A',5,'MOHAMMMAD ILHAM ZAFIR','MD. ANAMUL HOQUE','MAFUZAN','Not Avliable','Not Avliable','Not Avliable','MALE','2012-07-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801730006603','7A5','/2025/7/A/5.jpg',NULL,NULL,NULL),(344,7,'Class Seven','A',26,'MD. NAIMUR RAHMAN DURJOY','MD. ZAHID SIKDER','SHAMIMA AKTER SHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-10-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801407132746','7A26','/2025/7/A/26.jpg',NULL,NULL,NULL),(346,7,'Class Seven','A',15,'MD SHABBIR TALUKDER','MD ABUL HOSSEN','SHARMIN KHANOM','MD SHABBIR TALUKDER','MD ABUL HOSSEN','SHARMIN KHANOM','MALE','2012-11-11','0','0','0','N/A','0','7A15','/2025/7/A/15.jpg',NULL,NULL,NULL),(361,8,'Class Eight','A',5,'ANISA BUSHRA','MD ANISUR RAHMAN','NISHAT SULTANA','আনিসা বুশরা','মোঃ আনিসুর রহমান','নিশাত সুলতানা','FEMALE','2012-04-26','20123514313036255','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801580772922','8A5','/2025/8/A/5.jpg',NULL,NULL,NULL),(362,8,'Class Eight','A',22,'UTSAB SARKAR JOY','UJJAL SARKAR','SANTANA RAY','উৎসব সরকার জয়','উজ্জল সরকার','শান্তনা রায়','MALE','2011-02-01','20113522501049933','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801917572501','8A22','/2025/8/A/22.jpg',NULL,NULL,NULL),(363,8,'Class Eight','A',21,'MD AHAD MUNSHI','MD. RASEL MUNSHI','MAHMUDA BEGUM','মোঃ আহাদ মুন্সী','মোঃ রাসেল মুন্সী','মাহমুদা বেগম','MALE','2012-03-20','20113522501065685','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801840563320','8A21','/2025/8/A/21.jpg',NULL,NULL,NULL),(364,8,'Class Eight','A',35,'MD. ABIR MUNSHI','MD. AHID MUNSHI','SALINA AKTER','','','','MALE','2011-08-01','20113522501044261','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703570947','8A35','/2025/8/A/35.jpg',NULL,NULL,NULL),(365,8,'Class Eight','A',17,'KAZI MOKARAM','KAZI NURUL ALOM','ZAKIA BEGUM','কাজী মোকারম','কাজী নুরুল আলম','মোসাঃ জাকিয়া বেগম','MALE','1969-12-31','20126512879001832','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745886248','8A17','/2025/8/A/17.jpg',NULL,NULL,NULL),(366,8,'Class Eight','A',3,'MD . SIFAT MOLLA','MD. MASUD RANA','PARFI BEGUM','মোঃ সিফাত  মোল্লা','মো: মাসুদ রানা','পারফি বেগম','MALE','2012-01-09','20123514367012502','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801743629425','8A3','/2025/8/A/3.jpg',NULL,NULL,NULL),(367,8,'Class Eight','A',7,'JAMIL HOSSAIN MUNSHI','TULU MUNSHI','SHAHANARA BEGUM','জামিল হোসেন মুন্সী','টুলু মুন্সী','শাহানারা বেগম','MALE','2012-01-01','20123513238022839','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801749324060','8A7','/2025/8/A/7.jpg',NULL,NULL,NULL),(369,8,'Class Eight','A',14,'AL SOHAIL CHOWDHURY','ALI AKBOR CHOWDHURY','MAHMUDA CHOWDHURY','আল সোহাইল চৌধুরী','আলী আকবার চৌধুরী','মাহমুদা চৌধুরী','MALE','2012-04-06','20123513221013801','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801733123869','8A14','/2025/8/A/14.jpg',NULL,NULL,NULL),(370,8,'Class Eight','A',2,'WILSON BANARJEE','MONOTOSH BANARJEE','ELIZABETH BANARJEE','উইলসন ব্যানার্জী','মনোতোষ ব্যানার্জী','এলিজাবেথ ব্যানার্জী','MALE','2011-01-27','20113515844027847','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801715256966','8A2','/2025/8/A/2.jpg',NULL,NULL,NULL),(371,8,'Class Eight','A',4,'MD. FAIM MUNSHI','EMDADUL HOQUE','NABILA KHANAM','মো:ফাইম মুন্সী','ইমদাদুল হক','নাবিলা খানম','MALE','2011-12-17','20113513238021678','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801795639566','8A4','/2025/8/A/4.jpg',NULL,NULL,NULL),(372,8,'Class Eight','A',32,'TASIN MOLLA','MOHAMMAD GIAS UDDIN','LAKI BEGUM','তাছিন মোল্যা','মোহাম্মদ গিয়াস উদ্দিন','লাকী বেগম','MALE','2012-06-09','20123513217020750','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737404132','8A32','/2025/8/A/32.jpg',NULL,NULL,NULL),(373,8,'Class Eight','A',30,'MD. ANDALIB RAHMAN','MD. MOFIZUR RAHMAN','MORSHEDA AFROZE','মো: আন্দালিব রহমান','মোঃ মফিজুর রহমান','মোরশেদা আফরোজ','MALE','2012-08-21','20123513269022668','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801989394968','8A30','/2025/8/A/30.jpg',NULL,NULL,NULL),(376,8,'Class Eight','A',31,'NAFIZ KHAN','RAHAMOT ALI','LIMA BEGUM','নাফিজ খান','রহমত আলী','লিমা বেগম','MALE','2012-01-05','20123513234025421','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801974822842','8A31','/2025/8/A/31.jpg',NULL,NULL,NULL),(377,8,'Class Eight','A',11,'SAGNICK BISWAS','SUNIRMAL BISWAS','BITHIKA MONDAL','সাগ্নিক বিশ্বাস','সুনির্মল বিশ্বাস','বিথীকা মন্ডল','MALE','2011-10-10','20113522505073761','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719177071','8A11','/2025/8/A/11.jpg',NULL,NULL,NULL),(378,8,'Class Eight','A',23,'GOLAM ASHIKUR RAHMAN KHAN','GOLAM ROSUL KHAN','AYESHA AKTER','গোলাম আশিকুর রহমান খাঁন','গোলাম রসুল খান','আয়শা আক্তার আশা','MALE','2011-12-31','20113519119024909','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719120309','8A23','/2025/8/A/23.jpg',NULL,NULL,NULL),(379,8,'Class Eight','A',27,'MD SAFOAN HOSSAIN','FAKRUL ALAM MOLLA','MAHAMUDA KATUN','মোঃ সাফোয়ান হোসেন','ফকরুল আলম মোল্লা','মাহমুদা খাতুন','MALE','2010-12-17','20103522508058173','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710810422','8A27','/2025/8/A/27.jpg',NULL,NULL,NULL),(380,8,'Class Eight','A',6,'SAAD AHMED CHOWDHURY','MD MOHIBUR RAHMAN CHOWDHURY','SHULI KHANOM','সাদ আহমেদ চৌধুরী','মো: মহিবুর রহমান চৌধুরী','শিউলী খানম','MALE','2011-12-30','20113513269027047','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718501626','8A6','/2025/8/A/6.jpg',NULL,NULL,NULL),(381,8,'Class Eight','A',15,'SM TAHMID TAHA','S.M OBAYDUR RAHMAN','MST. BILKIS SIDDIKA','এস,এম তাহমিদ তাহা','এস,এম ওবায়দুর রহমান','মোছাঃ বিলকিস সিদ্দিকা','MALE','2012-03-24','20123513234021485','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747867310','8A15','/2025/8/A/15.jpg',NULL,NULL,NULL),(383,8,'Class Eight','A',16,'ARDHO DAS','PANKAJ KUMER DAS','PIKGKI RANI DAS','আর্ধ দাস','পংকজ কুমার দাস','পিংকি রানী দাস','MALE','2012-12-20','20123515861120032','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704667627','8A16','/2025/8/A/16.jpg',NULL,NULL,NULL),(384,8,'Class Eight','A',26,'MD SHOHAD SHEIKH','MD MAHABUB SHEIKH','PUSHA BEGUM','মো ছোহাদ  শেখ','মো মাহাবুব শেখ','পোশা বেগম','MALE','2009-05-12','20123513247048493','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801779493391','8A26','/2025/8/A/26.jpg',NULL,NULL,NULL),(385,8,'Class Eight','A',25,'ARAFAT HOSEN','HABIBUR RAHMAN KHAN','KAKOLI BEGUM','আরাফাত হোসেন','মৃত:হাবিবুর রহমান খান','মৃত:কাকলি বেগম','MALE','2011-12-01','20113513294014918','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801929530831','8A25','/2025/8/A/25.jpg',NULL,NULL,NULL),(386,8,'Class Eight','A',33,'RAHUL BAIDYA','ROBIN BAIDYA','TULI BISWAS','রাহুল বৈদ্য','রবিন বৈদ্য','তুলি বিশ্বাস','MALE','2003-04-11','20113522503051708','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801827193250','8A33','/2025/8/A/33.jpg',NULL,NULL,NULL),(387,8,'Class Eight','A',1,'AMMAN KHAN','MD. AMINUR RAHAMAN','MASUMA AKTER RUMA','আম্মান খান','মোঃ আমিনুর রহমান','মাসুমা আক্তার  রুমা','MALE','2012-04-19','20123522503055786','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726704976','8A1','/2025/8/A/1.jpg',NULL,NULL,NULL),(388,8,'Class Eight','A',36,'YASIN HAMID TALUKDAR','MD FARUK HOSSAIN TALUKDAR','TANIA TALUKDAR','ইয়াছিন হামিদ তালুকদার','মোঃ ফারুক হোসেন তালুকদার','তানিয়া তালুকদার','MALE','2011-03-21','20116794413308016','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672600934','8A36','/2025/8/A/36.jpg',NULL,NULL,NULL),(391,8,'Class Eight','A',19,'SADIQUR RAHMAN ATIK','HABIBUR RAHAMAN','SABIKUN NAHAR','সাদিকুর রহমান আতিক','হাবিবুর রহমান','ছাবিকুন নাহার','MALE','2024-01-13','20133522505058362','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801740676843','8A19','/2025/8/A/19.jpg',NULL,NULL,NULL),(392,8,'Class Eight','A',29,'REDWANUL ISLAM RAIYAN','MD BABUL MOLLA','RIPA KHANAM','রেদওয়ানুল ইসলাম রাইয়ান','মোহাম্মদ বাবুল মোল্লা','রিপা খানম','MALE','2011-12-05','20113513217019755','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801927754601','8A29','/2025/8/A/29.jpg',NULL,NULL,NULL),(393,8,'Class Eight','A',24,'ARAFAT KHAN ESHAN','HABIBUR RAHMAN','POPY AKTER','আরাফাত খান ইশান','হাবিবুর রহমান','পপি আক্তার','MALE','2012-04-21','20123513260018392','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789787540','8A24','/2025/8/A/24.jpg',NULL,NULL,NULL),(394,8,'Class Eight','A',28,'MD MUAJ ALIF','MD.ARSHAD ALI','SUMA AKTER','মোঃ মুআজ আলিফ','মোঃ এরশাদ আলী','সুমা আক্তার','MALE','2010-04-25','20103522509055758','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801623870070','8A28','/2025/8/A/28.jpg',NULL,NULL,NULL),(395,8,'Class Eight','A',13,'ROBBANI MOLLA AFRIDI','MOJAMMEL HOQUE MOLLA','MST. SARJINA KHANAM SNIKDHA','মো: রব্বানী মোল্যা আফ্রিদী','মোজাম্মেল হক মোল্লা','মোছাঃ সারজিনা খানম স্নিগ্ধা','MALE','2011-01-01','20113513238025044','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737362808','8A13','/2025/8/A/13.jpg',NULL,NULL,NULL),(396,8,'Class Eight','A',8,'MD. TANVIR RAHMAN','MD. KHALEDUR RAHMAN','JAMILA KHATUN','মোঃ তানভীর রহমান।','মোঃ খালেদুর রহমান।','জামিলা খাতুন।','MALE','2011-08-25','20114114711815904','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913890360','8A8','/2025/8/A/8.jpg',NULL,NULL,NULL),(397,8,'Class Eight','A',12,'RAIYAN AHMAD','MD NASIM UDDIN','ASMA PARVIN','রাইয়ান আহমদ','মোঃ নাছিম উদ্দিন','আসমা পারভীন','MALE','2010-10-18','20103522509042239','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801791434862','8A12','/2025/8/A/12.jpg',NULL,NULL,NULL),(399,8,'Class Eight','A',9,'MD. AZIZUL HAQUE','MD AKHTER ALI','SALMA BEGUM','মোঃ আজিজুল হক','মোঃ আক্তার আলী','সালমা বেগম','MALE','2012-01-01','20122692503558422','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724566078','8A9','/2025/8/A/9.jpg',NULL,NULL,NULL),(401,8,'Class Eight','A',34,'MD.MILON MOLLA','MD DHALA MOLLA','KULSUM BEGUM','মিলন মোল্লা','ধলা মোল্লা','কুলছুম বেগম','MALE','2013-02-03','20133513217022291','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913541390','8A34','/2025/8/A/34.jpg',NULL,NULL,NULL),(402,8,'Class Eight','A',10,'SOUMITRA SHILL PRITHIBE','SUJAN KUMAR SHILL','BEAUTY BISWAS','সৌমিত্র শীল পৃথিবী','সুজন কুমার শীল','বিউটি বিশ্বাস','MALE','2012-09-12','20123522508070653','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739117342','8A10','/2025/8/A/10.jpg',NULL,NULL,NULL),(403,8,'Class Eight','A',20,'SABIT AL HASAN','MD KHAYRUL ISLAM','SALMIN AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726055891','8A20','/2025/8/A/20.jpg',NULL,NULL,NULL),(404,8,'Class Eight','A',18,'SANJIR RAHMAN','Al Amin','MST. SHAMIMA AKTER DULI','সানজির রহমান','আল আমিন','মোসাঃ সামীমা আক্তার দুলী','MALE','2011-11-26','20113393310008217','0','0','','01607304218','8A18','/2025/8/A/18.jpg',NULL,NULL,NULL),(424,9,'Class Nine','A',3,'SANCHARY MALAKER','SATYENDRA NATH MALAKER','SHILPI RANI MIRBOR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-10-10','0','0','0','Vill: PanchuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801917263061','9A3','/2025/9/A/3.jpg',NULL,NULL,NULL),(426,9,'Class Nine','A',1,'LAMIYATUL BARI','GOLAM AZAM','ZUGLUNNAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-08-13','0','0','0','Vill: Comisanar RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801921501338','9A1','/2025/9/A/1.jpg',NULL,NULL,NULL),(428,9,'Class Nine','A',6,'SUSMIT SAM BISWAS','NITISH CHANDRA BISWAS','SUMONA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-31','0','0','0','Vill: 312, Power Hoose RoadPOST: Gopalganj- 8100 THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716020231','9A6','/2025/9/A/6.jpg',NULL,NULL,NULL),(431,9,'Class Nine','A',25,'ATIF ALAM','BULBUL ALAM','NAZMUNNAHAR BANNA','Not Avliable','Not Avliable','Not Avliable','MALE','2009-07-17','0','0','0','Vill: 312, Bankpara, GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801629988294','9A25','/2025/9/A/25.jpg',NULL,NULL,NULL),(434,9,'Class Nine','A',19,'HANJALA','SALIM MIA','SABINA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-01-01','0','0','0','Vill: PolicelinePOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801727319356','9A19','/2025/9/A/19.jpg',NULL,NULL,NULL),(435,9,'Class Nine','A',11,'JIBON SARKER','NABO KUMAR SARKER','ITIKA BOSE','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-17','0','0','0','Vill: Gohata KalibariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801729773336','9A11','/2025/9/A/11.jpg',NULL,NULL,NULL),(437,9,'Class Nine','A',8,'ANASHUA ANGEL','PRODYOT ROY','ISHITA ROY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-08-27','0','0','0','Vill: 280/2 Binapani Girls School Road BottolaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716355505','9A8','/2025/9/A/8.jpg',NULL,NULL,NULL),(439,9,'Class Nine','A',17,'NAHIMUL ISLAM','NAZRUL ISLAM','NAFIZA ISLAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-02-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716715851','9A17','/2025/9/A/17.jpg',NULL,NULL,NULL),(440,9,'Class Nine','A',27,'APU MANDAL','DIPANKAR MANDAL','APARNA MANDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2006-11-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801907298939','9A27','/2025/9/A/27.jpg',NULL,NULL,NULL),(441,9,'Class Nine','A',23,'RAJ MAJUMDER','APURBA MAJUMDER','KONIKA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2012-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801969774510','9A23','/2025/9/A/23.jpg',NULL,NULL,NULL),(442,9,'Class Nine','A',9,'AYAN ARAF RAHMAN','AHMED MAHAFUJUR RAHMAN','TANIA','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801967600024','9A9','/2025/9/A/9.jpg',NULL,NULL,NULL),(443,9,'Class Nine','A',24,'ZAFEER RAHMAN','ZABIDUR RAHMAN','MAHBUBA RAHMAN','Not Avliable','Not Avliable','Not Avliable','MALE','2010-07-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801991045694','9A24','/2025/9/A/24.jpg',NULL,NULL,NULL),(444,9,'Class Nine','A',21,'SHEIKH BODRUL ISLAM','MD ABUL BASHAR SHAIKH','JESMINE AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801972651335','9A21','/2025/9/A/21.jpg',NULL,NULL,NULL),(447,9,'Class Nine','A',32,'SAGOR CHOWDHURY','MD. BATCHU HOSSAIN','SHAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801982627569','9A32','/2025/9/A/32.jpg',NULL,NULL,NULL),(448,9,'Class Nine','A',26,'RUDRA PROTAP HALDER','PALTON HALDER','DIPA HALDER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722096306','9A26','/2025/9/A/26.jpg',NULL,NULL,NULL),(449,9,'Class Nine','A',22,'TASIN SARDER','MIZANUR RAHMAN','FATEMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801644529988','9A22','/2025/9/A/22.jpg',NULL,NULL,NULL),(450,9,'Class Nine','A',16,'MUSTASIN SARDAR','MD. ALAMIN SARDER','MST URMI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-02','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756168183','9A16','/2025/9/A/16.jpg',NULL,NULL,NULL),(452,9,'Class Nine','A',14,'SAMIUL ISLAM','WAHIDUL ISLAM','SABINA YASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801922392068','9A14','/2025/9/A/14.jpg',NULL,NULL,NULL),(453,9,'Class Nine','A',20,'ANAN JAMAN','MONIRUZZAMAN','TANIA','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801926539507','9A20','/2025/9/A/20.jpg',NULL,NULL,NULL),(454,9,'Class Nine','A',18,'ASADULLAH AL GALIB','MD. WAHIDUR RAHMAN CHOUDHURY','MST. JEUN NAHER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729814100','9A18','/2025/9/A/18.jpg',NULL,NULL,NULL),(456,9,'Class Nine','A',5,'PROTIK BISWAS SAIKAT','RANAJIT KUMAR BESWAS','SHIPRA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2011-08-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726008510','9A5','/2025/9/A/5.jpg',NULL,NULL,NULL),(457,9,'Class Nine','A',7,'MD. SHARIAR RAHMAN','MD. ABDUR RAHMAN','MST. AYESHA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732188226','9A7','/2025/9/A/7.jpg',NULL,NULL,NULL),(458,9,'Class Nine','A',12,'NAIMUL ISLAM','MOHAMMAD KAMRUL ISLAM','SUMAYA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801763816157','9A12','/2025/9/A/12.jpg',NULL,NULL,NULL),(460,9,'Class Nine','A',10,'MEFTAHUL ISLAM','MD.FORHAD HOSSAN','JAHANARA EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2010-02-05','0','0','0','Vill: Gosher ChorPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801726741150','9A10','/2025/9/A/10.jpg',NULL,NULL,NULL),(461,9,'Class Nine','A',13,'HRIDOY SHEIKH','JAHID SHEIKH','SHILPI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737916092','9A13','/2025/9/A/13.jpg',NULL,NULL,NULL),(462,9,'Class Nine','A',29,'REJOICE ROY','MICHAEL ROY','LIMA ROY','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712711693','9A29','/2025/9/A/29.jpg',NULL,NULL,NULL),(463,9,'Class Nine','A',28,'RIZVI CHOWDHURY','RONY CHOWDHURY','AFROZA CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913742031','9A28','/2025/9/A/28.jpg',NULL,NULL,NULL),(464,9,'Class Nine','A',15,'ABDULLAH ALAM ZARIB','MD MORSHED ALAM','RESMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728608650','9A15','/2025/9/A/15.jpg',NULL,NULL,NULL),(466,9,'Class Nine','A',31,'SM ABIR HOSSAN','MOSHIUR RAHAMAN','MUNNI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731137513','9A31','/2025/9/A/31.jpg',NULL,NULL,NULL),(467,9,'Class Nine','A',30,'MD: ABU. RAYHAN','MD: EDRISH ALAM SHAKH','RUKSHANA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-09-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801774736325','9A30','/2025/9/A/30.jpg',NULL,NULL,NULL),(469,9,'Class Nine','A',2,'IJTIHAD MUSLEHIN','MOHAMMAD ANISUR RAHMAN','NUR JANNATUL FERDOUS','IJTIHAD MUSLEHIN','MOHAMMAD ANISUR RAHMAN','NUR JANNATUL FERDOUS','MALE','2010-12-16','0','0','0','N/A','0','9A2','/2025/9/A/2.jpg',NULL,NULL,NULL),(470,9,'Class Nine','A',4,'MD TAMJID AHMMED TASIN','ANISUR RAHAMAN MOLLA','TAJRIA AKTAR LABONI','মো: তামজীদ আহম্মেদ তাসিন','আনিচুর রহমান মোল্যা','তাজরিয়া আক্তার লাবনী','MALE','2011-07-12','20113513247028502','0','0','GOPALGANJ','0','9A4','/2025/9/A/4.jpg',NULL,NULL,NULL),(487,10,'Class Ten','A',1,'MD. NUR ISLAM FARAZI','MOMREJ FARAZI','RASIDA BEGUM','মোঃ নূর ইসলাম ফরাজী','মোমরেজ ফরাজী','রাশিদা বেগম','MALE','2009-11-25','20093513217019871','0','0','Vill: GOLABARIPOST: BATGRAM THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801311928037','10A1','/2025/10/A/1.jpg',NULL,NULL,NULL),(488,10,'Class Ten','A',10,'AYSHA SIDDIKA','ASHIKUL HUQ','KEYA ISLAM','আয়শা সিদ্দিকা','মোঃ আশিকুল হক','কেয়া ইসলাম','FEMALE','2009-06-07','20093522506003459','0','0','Vill: 7. Janata RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801749209353','10A10','/2025/10/A/10.jpg',NULL,NULL,NULL),(489,10,'Class Ten','A',18,'MD HAMZA KHAN','NIZAMUL ISLAM KHAN','MST. YESMIN AKHTER POLY','মোঃ হামজা খান','নিজামুল ইসলাম খান','মোসাঃ ইয়াছমিন আখতার পলি','MALE','2010-08-09','20103522504058369','0','0','Vill: 134, College RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801714698861','10A18','/2025/10/A/18.jpg',NULL,NULL,NULL),(490,10,'Class Ten','A',20,'NUR-A ROSHNI','MD. NASIR UDDIN MOLLA','MST. LUNA BEGUM','নূর - এ রোশনী','মো: নাসির উদ্দিন মোল্লা','মোসা: লুনা বেগম','FEMALE','2010-01-01','20103513256018495','0','0','Vill: CharmanikdhaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801729743687','10A20','/2025/10/A/20.jpg',NULL,NULL,NULL),(491,10,'Class Ten','A',16,'JAKIYA AKTER MARIYA','MAHASIN SIKDER','DALI BEGUM','জাকিয়া আক্তার মারিয়া','মোঃ মহাসিন শিকদার','মোসাঃ ডলি বেগম','FEMALE','2009-10-20','20093522507055061','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928258419','10A16','/2025/10/A/16.jpg',NULL,NULL,NULL),(492,10,'Class Ten','A',22,'SHATHI MONI','SAIFUL MOLLA','IRIN BEGUM','সাথী মনি','মোঃ সাইফুল মোল্যা','আইরিন বেগম','FEMALE','2010-10-10','20103522505054980','0','0','Vill: 210, Udayin RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801943500003','10A22','/2025/10/A/22.jpg',NULL,NULL,NULL),(493,10,'Class Ten','A',24,'MD. SADIKUR RAHMAN','A. ALIM','MOST. NAZIDA KHATUN','মোঃ সাদিকুর রহমান','আঃ আলীম','মোসাঃ নাজিদা খাতুন','MALE','2010-03-22','20103513211019231','0','0','Vill: POST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801728219238','10A24','/2025/10/A/24.jpg',NULL,NULL,NULL),(494,10,'Class Ten','A',19,'SOUMITA HALDER ADITI','JOYDAB HALDER JOY','SABITA OJHA','সৌমিতা হালদার অদিতি','জয়দেব হালদার জয়','সবিতা ওঝা','FEMALE','2010-06-22','20103522509059711','0','0','Vill: MOHAMMADPARAPOST: GOPALGANJ THANA:  ---  DISTRICT: Gopalganj','8801739799883','10A19','/2025/10/A/19.jpg',NULL,NULL,NULL),(495,10,'Class Ten','A',11,'MD ABRAR ALAM','MD MEHERUL ALAM','SHAHANA ALAM','মোঃ আবরার আলম','মোঃ মেহেরুল আলম','শাহানা আলম','MALE','2010-12-12','20103522508061903','0','0','Vill: 305, Mohammad ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801778993443','10A11','/2025/10/A/11.jpg',NULL,NULL,NULL),(496,10,'Class Ten','A',29,'RAJ ROY','SUVASH ROY','MALA ROY','রাজ রায়','সুবাশ রায়','মালা রায়','MALE','2010-07-24','20103522502052477','0','0','Vill: Shikhdar ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801849860538','10A29','/2025/10/A/29.jpg',NULL,NULL,NULL),(497,10,'Class Ten','A',23,'MINHAJ HOSSIN','MD. MORAD HOSSIN','NAHIDA SULTANA','মিনহাজ হোসেন','মোঃ মোরাদ হোসেন','নাহিদা সুলতানা','MALE','2009-12-31','20093514388028614','0','0','Vill: RautkandiPOST: Shajail THANA:  Kashiani  DISTRICT: Gopalganj','8801716019991','10A23','/2025/10/A/23.jpg',NULL,NULL,NULL),(498,10,'Class Ten','A',36,'SHEIKH MUINUL ISLAM MUIN','SHEIKH MOSTAIN BILLAHN','SULTANA','শেখ মইনুল ইসলাম মুইন','শেখ মুস্তাইন বিল্লাহ','সুলতানা','MALE','2011-02-01','20113522502059679','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712801179','10A36','/2025/10/A/36.jpg',NULL,NULL,NULL),(499,10,'Class Ten','A',27,'SHEKH MD. ASHRAFUZZAMAN (SHAIKAT)','SHEKH MD. ALIUZZAMAN','MRS. KAMRUNNAHAR','শেখ মো: আশরাফুজ্জামান সৈকত','শেখ মো: আলিউজ্জামান','কামরুন্নাহার','MALE','2011-02-01','20113519176029627','0','0','Vill: PatgatiPOST: Patgati THANA:  Tungipara  DISTRICT: Gopalganj','8801735451104','10A27','/2025/10/A/27.jpg',NULL,NULL,NULL),(500,10,'Class Ten','A',37,'AOYN BANIK','ASHIM BANIK','SUSHILA BARAI','অয়ন বনিক','অসীম বনিক','সুশীলা বাড়ৈ','FEMALE','2010-01-01','20103515187100477','0','0','Vill: 129 Khan shaheb Road Bank ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801712922463','10A37','/2025/10/A/37.jpg',NULL,NULL,NULL),(501,10,'Class Ten','A',5,'MOOMTAHINA AZAD','MD. SAIFUL KAMAL AZAD','DR. KHALEDA PANNI','মুমতাহিনা আজাদ','মোঃ সাইফুল কামাল আজাদ','ডাঃ খালেদা পান্নী','FEMALE','2008-12-12','20083522507061972','0','0','Vill: 334,POST: Bankpara THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801791604755','10A5','/2025/10/A/5.jpg',NULL,NULL,NULL),(502,10,'Class Ten','A',40,'LAMIA ISLAM','IMRAN ALI MOLLA','RUNA BEGUM','লামিয়া ইসলাম','ইমরান আলী মোল্লা','রুনা বেগম','FEMALE','2010-01-16','20103513221010806','0','0','Vill: GobraPOST: Gobra-8100 THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801774466407','10A40','/2025/10/A/40.jpg',NULL,NULL,NULL),(503,10,'Class Ten','A',41,'ZIDNI ISLAM MONIRA','MD. MANIR MIA','MOUSUM BEGUM','জিদনী ইসলাম মনিরা','মোঃ মনির মিয়া','মৌসুমী বেগম','FEMALE','2010-01-01','20103522509065308','0','0','Vill: 432-2 Uapzla RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801795774270','10A41','/2025/10/A/41.jpg',NULL,NULL,NULL),(504,10,'Class Ten','A',45,'SHIBNATH MAJUMDAR','SATAJIT MAJUMDER','BEAUTY RANI MAJUMDAR','শিবনাথ মজুমদার','সত্যজিৎ মজুমদার','বিউটি রানী মজুমদার','MALE','2009-02-23','20093522509068807','0','0','Vill: NobinbagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801954813720','10A45','/2025/10/A/45.jpg',NULL,NULL,NULL),(505,10,'Class Ten','A',31,'SAYED OWAZKURUNI ARNOB','SOYED RAZIBAL ALAM','MISS JUI','সৈয়দ ওয়াজকুরুনী অর্নব','সৈয়দ রাজিবুল আলম','মিস জুই','MALE','2010-01-01','20103513256018511','0','0','Vill: ManikdahPOST: Manikdah THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801772096287','10A31','/2025/10/A/31.jpg',NULL,NULL,NULL),(506,10,'Class Ten','A',21,'APURBA MAZUMDER','DURJAYDHAN MAZUMDER','SHIBANI DAS','অপূর্ব মজুমদার','দুর্যোধন মজুমদার','শিবানী দাস','MALE','2009-08-09','20095414031012150','0','0','Vill: Bakchi BariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801714636343','10A21','/2025/10/A/21.jpg',NULL,NULL,NULL),(507,10,'Class Ten','A',30,'SANJIDA AKTAR SARMIN','MD. YUSUF ALI','KAMRUN NAHAR KABITA','সানজিদা আক্তার শারমিন','ইউসুফ আলী','কামরুন নাহার কবিতা','FEMALE','2010-10-20','20103522506070172','0','0','Vill: 108/6 Janata RoadPOST: Gopalganj THANA:  ---  DISTRICT: Gopalganj','8801724194323','10A30','/2025/10/A/30.jpg',NULL,NULL,NULL),(508,10,'Class Ten','A',35,'ANIK SAMADDAR','ANANDHA SAMADDAR','ARPANA SAMADDAR','অনিক সমদ্দার','আনন্দ সমদ্দার','অর্পনা সমদ্দার','MALE','2010-04-20','20103522509059489','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736333421','10A35','/2025/10/A/35.jpg',NULL,NULL,NULL),(509,10,'Class Ten','A',43,'SARMIN SULTANA RITU','ABUL HASAN SHEIKH','MST. SHILPI AKTER','শারমিন সুলতানা রিতু','আবুল হাসান শেখ','শিল্পী আক্তার','FEMALE','2009-05-21','20093522509048980','0','0','Vill: GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801794447605','10A43','/2025/10/A/43.jpg',NULL,NULL,NULL),(510,10,'Class Ten','A',13,'HABIBA BINTA MUSA','MD. MUSA KALIMULLA','EYERINE','হাবিবা বিনতে মুসা','মোঃ মুসা কালিমুল্লা','আইরিন','FEMALE','2010-11-20','20103522504063201','0','0','Vill: MeiaparaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801537531781','10A13','/2025/10/A/13.jpg',NULL,NULL,NULL),(511,10,'Class Ten','A',32,'ROWMIUL ISLAM SOPNO','SHAFIQUL ISLAM','REHANA SULTANA','রমিউল ইসলাম স্বপ্ন','মোঃ সফিকুল ইসলাম','রেহানা সুলতানা','MALE','2009-07-21','20093522504051037','0','0','Vill: MiahParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801731463653','10A32','/2025/10/A/32.jpg',NULL,NULL,NULL),(512,10,'Class Ten','A',25,'SATIRTHA TIKADAR','SANJOY KUMAR TIKADAR','NANDITA BAIRAGI','সতীর্থ টিকাদার','সঞ্জয় কুমার টিকাদার','নন্দিতা বৈরাগী','MALE','2009-12-16','20093519138100910','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801764444377','10A25','/2025/10/A/25.jpg',NULL,NULL,NULL),(513,10,'Class Ten','A',12,'SETU BAKCHI','LITON BAKCHI','SHILPI BAKCHI','সেতু বাকচী','লিটন বাকচী','শিল্পী বাকচী','FEMALE','2010-12-25','20103513256022385','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801799380508','10A12','/2025/10/A/12.jpg',NULL,NULL,NULL),(514,10,'Class Ten','A',38,'MAZIDUL ISLAM','MD Sahidul Munshi','Afroza Begum','মোঃ মাজিদুল ইসলাম','মো:সাহিদুল মুন্সী','আফরোজা বেগম','MALE','1970-01-01','20113519119022957','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723245256','10A38','/2025/10/A/38.jpg',NULL,NULL,NULL),(515,10,'Class Ten','A',3,'MST. MAIMUNA RAHMAN ANIKA','MD. ANISUR RAHMAN','KALI BEGUM','মোছা: মায়মুনা রহমান আনিকা','মো: আনিসুর রহমান','কলি বেগম','FEMALE','2010-02-25','20103513251100039','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801786304508','10A3','/2025/10/A/3.jpg',NULL,NULL,NULL),(516,10,'Class Ten','A',39,'BANDHAN BISWAS','MIHIR BISWAS','BINA BISWAS','বন্ধন বিশ্বাস','মিহির বিশ্বাস','বীনা বিশ্বাস','MALE','2010-10-01','20103515855101366','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745975278','10A39','/2025/10/A/39.jpg',NULL,NULL,NULL),(517,10,'Class Ten','A',14,'SIMANTA HALDER','PROSANTA HALDER','SHIBANI GAIN','সীমান্ত হালদার','প্রশান্ত হালদার','শিবানী গাইন','MALE','2011-04-02','20113515171881983','0','0','Vill: BedgramPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801718756581','10A14','/2025/10/A/14.jpg',NULL,NULL,NULL),(518,10,'Class Ten','A',33,'MD. RIDWANL ISLAM','MD. RAFIQUL ISLAM','MST. MAHBUBA PERVIN','মোঃ রিদওয়ানুল ইসলাম','মোঃ রফিকুল ইসলাম','মোছাঃ মাহবুবা পারভীন','MALE','2008-04-06','20082722808155278','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762155105','10A33','/2025/10/A/33.jpg',NULL,NULL,NULL),(519,10,'Class Ten','A',6,'MD. NAIM SHEIKH','AB. HANNAN','TAMA BEGUM','মোঃ নাইম শেখ','আঃ হান্নান','তমা বেগম','MALE','2010-01-17','20103513221016016','0','0','Vill: Poddarer CharPOST: Gobra THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801790305026','10A6','/2025/10/A/6.jpg',NULL,NULL,NULL),(520,10,'Class Ten','A',4,'FARHAN ISMAIL','MD. SHAWKAT ALI DARIA','SAMSUN NAHAR BEGUM','ফারহান ইসমাইল','মোঃ শওকত আলী দাড়িয়া','সামছুন নাহার বেগম','MALE','2009-10-06','20093529109100958','0','0','Vill: BORASHI Word: 14POST: Digarkul THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801775897591','10A4','/2025/10/A/4.jpg',NULL,NULL,NULL),(521,10,'Class Ten','A',9,'HURAIRA HUMAYUN ZINNIA','MD. HUMAYUN MOLLA','RATNA KHANAM','হুরাইয়া হুমায়ুন জিনিয়া','মো: হুমায়ুন মোল্লা','রত্না খানম','FEMALE','2010-12-15','20103519119017054','0','0','Vill: NobinbagPOST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801744224786','10A9','/2025/10/A/9.jpg',NULL,NULL,NULL),(522,10,'Class Ten','A',8,'ANTU BOSE','Ashish Bose','Lopa Bosu','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801471322141','10A8','/2025/10/A/8.jpg',NULL,NULL,NULL),(523,10,'Class Ten','A',17,'AMIR HAMJA','RABIUL ISLAM','ROZINA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: GhosercharPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801723740458','10A17','/2025/10/A/17.jpg',NULL,NULL,NULL),(524,10,'Class Ten','A',7,'PROTTOY SARKAR','Bishnu Kumar SARKAR','Shapla Rani SARKAR','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','880175231211','10A7','/2025/10/A/7.jpg',NULL,NULL,NULL),(525,10,'Class Ten','A',28,'F.M: FAHIM','ABUL KASHEM FAKIR','FARIDA PARVIN KASHEM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-11','0','0','0','Vill: Bagchi BariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801838441377','10A28','/2025/10/A/28.jpg',NULL,NULL,NULL),(526,10,'Class Ten','A',42,'MD. RAFIN FAKIR','MD. ZIHAD ALI','LIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-12-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801906205328','10A42','/2025/10/A/42.jpg',NULL,NULL,NULL),(527,10,'Class Ten','A',26,'ABRAR FAHIM AVRO','','','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','880174546441','10A26','/2025/10/A/26.jpg',NULL,NULL,NULL),(528,10,'Class Ten','A',15,'MD. ARIYAN RAHMAN','Md. Aminur Rahman','Sheoli Aktar','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801755211122','10A15','/2025/10/A/15.jpg',NULL,NULL,NULL),(529,10,'Class Ten','A',48,'SAKHILA KHNAM MIM','MD. MODHU SHAKE','SALMA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-12-15','0','0','0','Vill: Char manikdahPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801756453993','10A48','/2025/10/A/48.jpg',NULL,NULL,NULL),(530,10,'Class Ten','A',47,'MASHRAFE CHOWDHURY GYM','OSIKUL ISLAM','MUKTA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: Shnty BagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801642669877','10A47','/2025/10/A/47.jpg',NULL,NULL,NULL),(531,10,'Class Ten','A',44,'MD: RABBI','MUTALEB HOSSAIN','MUNNI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-06-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754195792','10A44','/2025/10/A/44.jpg',NULL,NULL,NULL),(532,10,'Class Ten','A',2,'LAMICH AKTER','Hasan Ali Sheikh','Khuku Begum','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','88017231122','10A2','/2025/10/A/2.jpg',NULL,NULL,NULL),(533,10,'Class Ten','A',46,'Abrar Zahin','MD. Alamgir Hossain','Salma Begum','Abrar Zahid','MD. Alamgir Hossain','Salma Begum','MALE','2024-01-01','0','0','0','N/A','0','10A46','/2025/10/A/46.jpg',NULL,NULL,NULL),(534,10,'Class Ten','A',34,'Al Nahyan','Hilal Uddin Molla','Tanjira Begum','Al Nahyan','Hilal Uddin Molla','Tanjira Begum','MALE','2010-01-01','0','0','0','N/A','0','10A34','/2025/10/A/34.jpg',NULL,NULL,NULL),(550,1,'Class One','A',12,'SAYMA HAMID','HAMIDUR RAHMAN MOLLA','ANJU MONOARA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741301443','1A12','/2025/1/A/12.jpg','',0,NULL),(551,1,'Class One','A',31,'MD AMIR HAMZA','LITON MOLLA','MOKHSENA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2029-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703268854','1A31','/2025/1/A/31.jpg','',0,NULL),(552,-1,'Class Nursery','A',9,'Maliha  Hamid','HAMIDUR RAHMAN MOLLA','ANJU MONOARA','মালিহা  হামিদ','হামিদুর রহমান  মোল্লা','আনজু মনোয়ারা','FEMALE','2020-12-14','20203522506071009','0','0','GOPALGANJ','01718029497','-1A9','/2025/-1/A/9.jpg',NULL,NULL,NULL),(553,-1,'Class Nursery','A',6,'ADRITA BAIN','AMIT BAIN','PURABI BAPARI','আদ্রিত বাইন','অমিত বাইন','পুরবী বেপারী','MALE','2020-07-15','20203513256028642','0','0','GOPALGANJ','01611138451','-1A6','/2025/-1/A/6.jpg',NULL,NULL,NULL),(554,-1,'Class Nursery','A',15,'AFRA TASNIM SAFA','RUMAN SIKDAR','SAMMI AKTER','আফরা তাসনিম সাফা','রুমান  শিকদার','শাম্মী আক্তার','FEMALE','2020-03-23','20203515163115539','0','0','GOPALGANJ','01736777924','-1A15','/2025/-1/A/15.jpg',NULL,NULL,NULL),(555,-1,'Class Nursery','A',4,'AMRITA SARKER','RAJIB KUMAR SARKER','SIMA DAS','অমৃতা সরকার','রাজীব কুমার সরকার','সীমা দাস','FEMALE','2020-07-24','20203522507079515','0','0','GOPALGANJ','01789732351','-1A4','/2025/-1/A/4.jpg',NULL,NULL,NULL),(556,-1,'Class Nursery','A',14,'MUSLIMA JANNAT','ARIF KHANDAKAR','MOST: LABONI','মুসলিমা জান্নাত','আরিফ খন্দকার','মোসা: লাবনী','FEMALE','2019-09-26','20192911079104120','0','0','VILL: DUAIR, UP: NASIRABAD P/S: BHNAGA, DIST: FARIDPUR.','01796100477','-1A14','/2025/-1/A/14.jpg',NULL,NULL,NULL),(558,-1,'Class Nursery','A',12,'MEGHRAJ BISWAS','PALLOB KANTI BISWAS','MALA BISWAS','মেঘরাজ বিশ্বাস','পল্লব কান্তি বিশ্বাস','মালা বিশ্বাস','MALE','2021-08-08','20213513282026565','0','0','GOPALGANJ','01916669181','-1A12','/2025/-1/A/12.jpg',NULL,NULL,NULL),(559,-1,'Class Nursery','A',1,'MAHMUD','MD JASIM UDDIN MOLLA','KEYA NASRIN','মাহমুদ','মোঃ জসীম উদ্দীন মোল্লা','কেয়া নাছরিন','MALE','2020-08-22','20203522509078647','0','0','GOPALGANJ','01715156190','-1A1','/2025/-1/A/1.jpg',NULL,NULL,NULL),(560,-1,'Class Nursery','A',11,'FARIA AKTER','md. sultan','MUKTA BEGUM','ফারিয়া আক্তার','মো: সুলতান হোসেন','মুক্তা বেগম','FEMALE','2020-12-01','20203513211022812','0','0','GOPALGANJ','01322087687','-1A11','/2025/-1/A/11.jpg',NULL,NULL,NULL),(561,-1,'Class Nursery','A',3,'SAYMON ISLAM','LEKBER SARDAR','BITHEE KHATUN','সায়মন ইসলাম','লেকবার সরদার','বিথী খাতুন','MALE','2020-12-06','20206512879004742','0','0','NARAIL','01318461133','-1A3','/2025/-1/A/3.jpg',NULL,NULL,NULL),(562,-1,'Class Nursery','A',5,'AQSA ISLAM','MD SAYFUL ISLAM','SADIA AFRIN','আকসা ইসলাম','মোঃ সাইফুল ইসলাম','সাদিয়া আফরীন','FEMALE','2020-09-16','20203522509079822','0','0','GOPALGANJ','01856214290','-1A5','/2025/-1/A/5.jpg',NULL,NULL,NULL),(563,-1,'Class Nursery','A',7,'HARSHIYA ISLAM NOHA','HABIL SHAIKH','KULSUM AKTER','হার্শিয়া ইসলাম নোহা','হাবিল শেখ','কুলসুম আক্তার','FEMALE','2020-08-06','20206523309660126','0','0','NARAIL','01323751672','-1A7','/2025/-1/A/7.jpg',NULL,NULL,NULL),(564,-1,'Class Nursery','A',8,'MD FAIAZ AHMED','MD FAISAL  AHMED','HAFCHA NAHAR MIM','মোঃ ফাইয়াজ আহম্মেদ','মোঃ ফয়সাল আহমেদ','হাফছা  নাহার মিম','MALE','2021-04-14','20213515115029766','0','0','GOPALGANJ','01918646555','-1A8','/2025/-1/A/8.jpg',NULL,NULL,NULL),(565,-1,'Class Nursery','A',2,'ABRAR UZ ZAMAN','MD ASHRAF UZ ZAMAN','FALGUNI KHANAM','আবরার উজ জামান','মোঃ আশরাফ উজ জামান','ফাল্গুনী খানম','MALE','2019-12-31','20193522507081781','0','0','GOPALGANJ','01316600690','-1A2','/2025/-1/A/2.jpg',NULL,NULL,NULL),(566,-1,'Class Nursery','A',10,'Mahzabeen Tasnim Ruku','Md. Mizanur Rahman','Rabeya Afroz','Mahzabeen Tasnim Ruku','Md. Mizanur Rahman','Rabeya Afroz','FEMALE','2020-07-19','0','0','0','N/A','01713406406','-1A10','/2025/-1/A/10.jpg',NULL,NULL,NULL),(567,-1,'Class Nursery','A',13,'Shraddha Sarkar (Shyma)','Debashish Sarkar','Shyamali Ray','Shraddha Sarkar (Shyma)','Debashish Sarkar','Shyamali Ray','FEMALE','2020-08-06','0','0','0','N/A','1711177065','-1A13','/2025/-1/A/13.jpg',NULL,NULL,NULL),(568,0,'Class KG','A',19,'MD NUR YEAMIN  NAHAB','MD NUR MOHAMMAD MONDAL','MST NAZMUN NAHAR','মোঃ নুর ইয়ামিন  নেহাব','মোঃ নুর মোহাম্মাদ মন্ডল','মোছাঃ নাজমুন নাহার','MALE','2021-04-03','20211019494113115','0','0','BOGURA','01719256834','0A19','/2025/0/A/19.jpg',NULL,NULL,NULL),(569,0,'Class KG','A',17,'MARIA ISLAM SABIHA','MARUF HOSEN SAJIB','SADIA AKTER','মারিয়া ইসলাম সাবিহা','মারুফ হোসেন সজিব','সাদিয়া আক্তার','FEMALE','2020-08-16','20203522509077867','0','0','GOPALGANJ','01673980767','0A17','/2025/0/A/17.jpg',NULL,NULL,NULL),(570,0,'Class KG','A',18,'AFIA IBNAT','MD ASHIKUL HUQ','KEYA ISLAM','আফিয়া ইবনাত','মোঃ আশিকুল হক','কেয়া ইসলাম','FEMALE','2020-08-30','20203522509084520','0','0','GOPALGANJ','01811161661','0A18','/2025/0/A/18.jpg',NULL,NULL,NULL),(571,0,'Class KG','A',16,'AFIYA JANNAT','MD KIBRIA FAKIR','SUMAIYA AKTER','আফিয়া জান্নাত','মোঃ কিবরিয়া ফকির','সুমাইয়া আক্তার','FEMALE','2019-12-18','20193513221020760','0','0','GOPALGANJ','01794202575','0A16','/2025/0/A/16.jpg',NULL,NULL,NULL),(572,0,'Class KG','A',13,'ABRAR NAKIB VEER','MD KAMAL BISWAS','TARIN SULTANA','আবরার নাকিব ভীর','মোঃ কামাল বিশ্বাস','তারিন সুলতানা','MALE','2019-08-31','20193522513081685','0','0','GOPALGANJ','01939450414','0A13','/2025/0/A/13.jpg',NULL,NULL,NULL),(573,0,'Class KG','A',12,'Smita Bakchi','Gopash Kanti Bakchi','Ananya Poddar','ইস্মিতা বাকচী','গোপেশ কান্তি বাকচী','অনন্যা পোদ্দার','FEMALE','2019-08-07','20193522509070299','0','0','GOPALGANJ','01689333264','0A12','/2025/0/A/12.jpg',NULL,NULL,NULL),(574,0,'Class KG','A',15,'SHAIKH SAIF ISLAM AZAN','SHAIKH SADDAM','MUKTI KHANOM','শেখ সাইফ ইসলাম আযান','শেখ সাদ্দাম','মুক্তি খানম','MALE','2019-12-04','20193513256028407','0','0','GOPALGANJ','01626263087','0A15','/2025/0/A/15.jpg',NULL,NULL,NULL),(575,0,'Class KG','A',21,'PROKRITY SARKAR','SHESER SARKAR','POLY  BALA','প্রকৃতি  সরকার','শিশির সরকার','পলি  বালা','FEMALE','2020-07-22','20203513256026424','0','0','GOPALGANJ','01818572002','0A21','/2025/0/A/21.jpg',NULL,NULL,NULL),(576,0,'Class KG','A',14,'MD SIYAM AL HASAN','MD MEHEDI HASAN','SHANAZ PARVIN','মোঃ সিয়াম আল হাসান','মোঃ মেহেদী হাসান','শাহানাজ পারভিন','MALE','2019-05-16','20194112329036609','0','0','JASHORE','01728338888','0A14','/2025/0/A/14.jpg',NULL,NULL,NULL),(577,0,'Class KG','A',22,'ABDULLAH AFFAN','MD. SHARIF MAHMUD','MST. ZAKIA SULTANA','আব্দুল্লাহ আফ্ফান','মো: শরীফ মাহমুদ','মোসাঃ জাকিয়া সুলতানা','MALE','2018-10-19','20181913634108306','0','0','CUMILLA','01831074047','0A22','/2025/0/A/22.jpg',NULL,NULL,NULL),(578,0,'Class KG','A',20,'Nafisa Akhtar Moon','Nurmohammad Mollah','Rita Parvin','Nafisa Akhtar Moon','Nurmohammad Mollah','Rita Parvin','FEMALE','2024-01-01','0','0','0','N/A','01735028689','0A20','/2025/0/A/20.jpg',NULL,NULL,NULL),(579,0,'Class KG','A',23,'Afrina Mau','MD. Hossain Molla','MST. Fatama Begum','Afrina Mau','MD. Hossain Molla','MST. Fatama Begum','FEMALE','2024-01-01','0','0','0','N/A','01753436154','0A23','/2025/0/A/23.jpg',NULL,NULL,NULL),(580,1,'Class One','A',41,'FARHA KHANOM','SHAMIM','RUMA KHANAM','ফারহা খানম','শামীম','রুমা খানম','FEMALE','2018-11-26','20180115638105410','0','0','BAGERHAT','01915878369','1A41','/2025/1/A/41.jpg',NULL,NULL,NULL),(581,1,'Class One','A',40,'MD AL MANSUR MISKAT','MD AL MAMUN','MONIKA BEGUM','মোঃ আল মানসুর মিসকাত','মোঃ আল মামুন','মনিকা বেগম','MALE','2018-10-24','20187815772128917','0','0','PATUAKHALI','01677834525','1A40','/2025/1/A/40.jpg',NULL,NULL,NULL),(582,1,'Class One','A',39,'Maidah Manha Ayat','Mohammad Kalimullah','Amina Khanam','মায়িদাহ মানহা আয়াত','মোহাম্মাদ কালিমুল্লাহ','আমিনা খানম','FEMALE','2017-09-30','20173519166016165','0','0','','01921643563','1A39','/2025/1/A/39.jpg',NULL,NULL,NULL),(583,1,'Class One','A',38,'ROZA ISLAM','SHEIKH MOHAMMAD ZAMIM HOSEN','MST SALEHA KHANAM','রোজা ইসলাম','শেখ মোহাম্মদ জামিম হোসেন','মোসাঃ সালেহা খানম','FEMALE','2020-05-07','20206512839114544','0','0','NARAIL','01716308704','1A38','/2025/1/A/38.jpg',NULL,NULL,NULL),(584,1,'Class One','A',37,'AVIYAN BISWAS','SHIHAB ALI BISWAS','SHEIKH HASINA','আভিয়ান বিশ্বাস','সিহাব আলী বিশ্বাস','শেখ হাসিনা','MALE','2018-12-05','20183522513084376','0','0','GOPALGANJ','01708014343','1A37','/2025/1/A/37.jpg',NULL,NULL,NULL),(585,1,'Class One','A',36,'OISHI MANDAL','SURESH CHANDRA MANDAL','SHELA BISWAS','ঐশি মন্ডল','সুরেশ চন্দ্র মন্ডল','শিলা বিশ্বাস','FEMALE','2019-04-26','20197917631107629','0','0','PIROJPUR','01767044444','1A36','/2025/1/A/36.jpg',NULL,NULL,NULL),(586,1,'Class One','A',35,'FAYAZ ISLAM','MOHAMMAD MOYNUL ISLAM','FARIDA AKTAR','ফাইয়াজ ইসলাম','মোহাম্মাদ মঈনুল ইসলাম','ফরিদা আক্তার','MALE','2018-10-23','20183522509075146','0','0','GOPALGANJ','01537365534','1A35','/2025/1/A/35.jpg',NULL,NULL,NULL),(587,1,'Class One','A',34,'MAHIR AMIR','TASIKUR RAHMAN MOLLA','AYESHA KHANAM','মাহির আমির','তছিকুর রহমান মোল্যা','আয়েশা খানম','MALE','2018-07-22','20183522507080419','0','0','GOPALGANJ','01718811913','1A34','/2025/1/A/34.jpg',NULL,NULL,NULL),(588,1,'Class One','A',33,'TAHAN ISLAM SAFOWAN','ARIFUL ISLAM','MISS FATEMATUZ ZOHRA','তাহান ইসলাম সাফোয়ান','আরিফুল ইসলাম','মোছাঃ ফাতেমাতুজ যহুরা','MALE','2018-01-05','20188827508067885','0','0','SIRAJGANJ','01711086476','1A33','/2025/1/A/33.jpg',NULL,NULL,NULL),(589,1,'Class One','A',32,'ZUBAIDA','MD JASIM UDDIN MOLLA','KEYA NASRIN','জুবাইদা','মোঃ জসীম উদ্দীন মোল্লা','কেয়া নাছরিন','FEMALE','2018-12-13','20183522509078648','0','0','GOPALGANJ','01715156190','1A32','/2025/1/A/32.jpg',NULL,NULL,NULL),(590,2,'Class Two','A',32,'MD SAKIN AL HASAN','MD RAKIBUL HASAN','MS. FATIMA ','মো: সাকিন আল হাসান','মো: রাকিবুল হাসান','মোসা: ফাতেমা','Male','2017-09-28','20176512879999532','0','0','','01763561124','2A32','/2025/2/A/32.jpg',NULL,NULL,NULL),(591,2,'Class Two','A',19,'ARITRA MALLICK SHUDDHA','SUBRATA MALLICK','Shormile Biswas','অরিত্র মল্লিক শুদ্ধ','সুব্রত মল্লিক','শর্মিলী বিশ্বাস','MALE','2016-07-22','20163522502069864','0','0','198, PURATAN BAZAR ROAD, WARD NO-02, GOPALGANJ POURASAVA.','01712638219','2A19','/2025/2/A/19.jpg',NULL,NULL,NULL),(592,2,'Class Two','A',22,'TRISHITA MAHMUD','MD. AL-MAHAMUD KHAKI','ABIDA SULTANA','তৃষিতা মাহমুদ','মো: আল-মাহমুদ খাকী','আবিদা সুলতানা','FEMALE','2018-07-29','20183514354024411','0','0','VILL: TILCHARA, PO: TILCHARA, PS: KASHIANI, DIST: GOPALGANJ,','01711482053','2A22','/2025/2/A/22.jpg',NULL,NULL,NULL),(593,2,'Class Two','A',24,'MD. TASKIN.','MITU  MOLLA','RABEYA AKHTAR.','মো: তাছকিন.','মিটু  মোল্লা','রাবেয়া আক্তার.','MALE','2017-09-13','20173513256023831','0','0','GHOSHERCHAR. GOPALGANJ..','01713591280','2A24','/2025/2/A/24.jpg',NULL,NULL,NULL),(594,2,'Class Two','A',26,'MD ADIYAN ANAB','NAZMUL HASAN','LIJBA BEGUM','মোঃ আদিয়ান আনাব','নাজমুল হাসান','লিজবা বেগম','MALE','2017-11-07','20173522509077715','0','0','GOPALGANJ','01827505776','2A26','/2025/2/A/26.jpg',NULL,NULL,NULL),(595,2,'Class Two','A',25,'SUHAEEB ISLAM','MD ASRAFULL ISLAM','ISHRAT JAHAN NUR','সুহাইব ইসলাম','মোঃ আশরাফুল ইসলাম','ইসরাত জাহান নূর','MALE','2018-10-02','20188226605119742','0','0','RAJBARI','01712578740','2A25','/2025/2/A/25.jpg',NULL,NULL,NULL),(596,2,'Class Two','A',23,'SAIDA NAHAR','SULTAN','MUKTA BEGUM','সাইদা নাহার','সুলতান','মুক্তা বেগম','FEMALE','2017-05-23','20173513211019921','0','0','GOPALGANJ','01322087687','2A23','/2025/2/A/23.jpg',NULL,NULL,NULL),(597,2,'Class Two','A',27,'MASIYAT HOSHEN MOUSHI','MUSHARAF HOSHEN','UMME KULSUM','মাশিয়াত হোসেন মৌশি','মোশারফ হোসেন','উম্মে কুলসুম','FEMALE','2018-07-05','20186195525084314','0','0','MYMENSINGH','01712440287','2A27','/2025/2/A/27.jpg',NULL,NULL,NULL),(598,2,'Class Two','A',31,'Bikrom Mondol Angel','biplob Mondol','Lacky Chowdhury','বিক্রম মন্ডল এনজেল','বিপ্লব মন্ডল','লাকী চৌধুরী','MALE','2017-12-05','20173522509070140','0','0','122, Panchuria, Ward No- 09 Gopalganj Pourasava, Gopalganj.','01923126091','2A31','/2025/2/A/31.jpg',NULL,NULL,NULL),(599,2,'Class Two','A',21,'ABDULLAH MUSHFIQ','MOSTAFIJUR  RAHMAN','TAMIMA KHANOM','আব্দুল্লাহ মুশফিক','মোস্তাফিজুর  রহমান','তামিমা খানম','MALE','2017-10-24','20173522513082831','0','0','GOPALGANJ','01716069994','2A21','/2025/2/A/21.jpg',NULL,NULL,NULL),(600,2,'Class Two','A',29,'ARNAB BISWAS','BIVASH BISWAS','SAMAPTI MONDAL','অর্নব  বিশ্বাস','বিভাস  বিশ্বাস','সমাপ্তি মন্ডল','MALE','2017-11-27','20173522509073960','0','0','GOPALGANJ','01862487998','2A29','/2025/2/A/29.jpg',NULL,NULL,NULL),(601,2,'Class Two','A',28,'SADIYA KHANOM','SARDER HASAN UDDIN','SARMIN KHANOM','সাদিয়া খানম','সরদার হাসান উদ্দিন','শারমিন খানম','FEMALE','2017-10-27','20176512895104055','0','0','NARAIL','01744528576','2A28','/2025/2/A/28.jpg',NULL,NULL,NULL),(602,2,'Class Two','A',30,'MUSFIKUR RAHMAN','SHOFICUL MOLLA','NEPA BEGUM','মুশফিকুর রহমান','শফিকুল মোল্যা','নিপা বেগম','MALE','2017-10-01','20173522509077053','0','0','GOPALGANJ','01765894825','2A30','/2025/2/A/30.jpg',NULL,NULL,NULL),(603,2,'Class Two','A',20,'ADIBA ISLAM TANHA','ARMAN SIKDER','SOHANI KHANOM','আদিবা ইসলাম তানহা','আরমান সিকদার','সোহানী খানম','FEMALE','2017-12-17','20176512879003177','0','0','NARAIL','01621766456','2A20','/2025/2/A/20.jpg',NULL,NULL,NULL),(604,3,'Class Three','A',23,'MASHRAFI BIN SAIFULLAH','MD. SAIFUL ISLAM','MST. SUMIAYA ISLAM','মাশরাফি বিন সাইফুল্লাহ','মো: সাইফুল ইসলাম','মোসা: সুমাইয়া ইসলাম','MALE','2016-12-27','20163513256023995','0','0','CHARMANIKDHA GOPALGANJ','01918418369','3A23','/2025/3/A/23.jpg',NULL,NULL,NULL),(605,3,'Class Three','A',25,'LUBABA ISLAM TAKEYA','S M NURUL ISLAM','SANDA ISLAM','লুবাবা ইসলাম তাকিয়া','এস এম নুরুল ইসলাম','ছন্দা ইসলাম','FEMALE','2015-03-05','20153522514084534','0','0','GOPALGANJ','01718206221','3A25','/2025/3/A/25.jpg',NULL,NULL,NULL),(606,3,'Class Three','A',26,'SAWON MIA','MD MIRON MIA','RUPALI BEGUM','সাওন মিয়া','মোঃ মিরন মিয়া','রুপালী বেগম','MALE','2016-05-12','20163513286021303','0','0','GOPALGANJ','01783380776','3A26','/2025/3/A/26.jpg',NULL,NULL,NULL),(607,3,'Class Three','A',27,'md: sofikur rahaman sojib','md: mujebur rahaman','mt: china akter','মোঃ শফিকুর রহমান সজীব','মোঃ মুজিবুর রহমান','মোছাঃ চাইনা আক্তার','MALE','2015-02-06','20154111117100234','0','0','village: uzirpur','01988626787','3A27','/2025/3/A/27.jpg',NULL,NULL,NULL),(608,3,'Class Three','A',28,'Asif Al Masud','Mohammad Kalimullah','Amina Khanom','আসিফ আল মাসুদ','মোহাম্মাদ কালিমুল্লাহ','আমিনা খানম','MALE','2015-12-18','20153519166016166','0','0','','01921643563','3A28','/2025/3/A/28.jpg',NULL,NULL,NULL),(609,3,'Class Three','A',29,'Sihab Molla','Omar Ali Molla','Shipa Khanam','সিহাব মোল্লা','ওমর আলী মোল্লা','শিপা খানম','MALE','2015-10-02','20150111419106471','0','0','Village- Baraguni, Post Office -Baraguni,  Upazila-Chitalmari, District-Bagerhat.','01783981489','3A29','/2025/3/A/29.jpg',NULL,NULL,NULL),(610,3,'Class Three','A',24,'MD NIYAZ FARIYAN','NAZMUL HASAN','LIJBA BEGUM','মোঃ নিয়াজ ফারিয়ান','নাজমুল হাসান','লিজবা বেগম','MALE','2016-11-13','20163522509077714','0','0','GOPALGANJ','01868594211','3A24','/2025/3/A/24.jpg',NULL,NULL,NULL),(611,3,'Class Three','A',30,'RAJ MOLLA','Md Shaha Jahan Molla','Asma Begum','রাজ মোল্লা','মোঃ শাহাজাহান মোল্লা','আসমা বেগম','MALE','2016-06-23','20160115628106643','0','0','BAGERHAT','01329333909','3A30','/2025/3/A/30.jpg',NULL,NULL,NULL),(612,4,'Class Four','A',37,'Alfe Chowdhury','Joy Chowdhory','Romu Chowdhury','Alfe Chowdhury','Joy Chowdhory','Romu Chowdhury','Male','2014-09-14','0','0','0','N/A','01761969624','4A37','/2025/4/A/37.jpg',NULL,NULL,NULL),(613,4,'Class Four','A',36,'Tasin Molla','Shahidul Molla','Bina','Tasin Molla','Shahidul Molla','Bina','MALE','2024-01-01','0','0','0','N/A','01638727228','4A36','/2025/4/A/36.jpg',NULL,NULL,NULL),(619,4,'Class Four','A',32,'MAFIJUR  CHOWDHURY','MANIK  CHOUDHURY','MONIRA  KHANAM','মাফিজুর চৌধুরী','মানিক চৌধুরী','মনিরা খানম','MALE','2017-01-12','20173515155503497','0','0','GOPALGANJ','01706692866','4A32','/2025/4/A/32.jpg',NULL,NULL,NULL),(620,4,'Class Four','A',33,'ABDUR RAHMAN    JIM','Zahangir Alam','Nazma Begum','আব্দুর রহমান জিম','জাহাঙ্গীর আলম','নাজমা বেগম','MALE','2016-05-06','20162692505542896','0','0','DHAKA','01713992472','4A33','/2025/4/A/33.jpg',NULL,NULL,NULL),(621,4,'Class Four','A',34,'Arshe Mone','Md. Shain Azad','Romana Rahman','আরশি মনি','মোঃ সাহিন আজাদ','রুমানা রহমান','FEMALE','2015-06-01','20153522504069343','0','0','81, D C Road, Shornopotti, Ward No:04, Gopalganj Pourasava, Gopalganj.','01921112996','4A34','/2025/4/A/34.jpg',NULL,NULL,NULL),(622,4,'Class Four','A',35,'Md Redoanul Islam Rayhan','MD KALAM SHEIKH','MST MASUMA','মোঃ রেদওয়ানুল ইসলাম রায়হান','মো:কালাম শেখ','মোসাঃ মাছুমা','MALE','2015-01-30','20150116011106088','0','0','BAGERHAT','01637223654','4A35','/2025/4/A/35.jpg',NULL,NULL,NULL),(623,4,'Class Four','A',38,'RHYTHM AHMED','MD RAZU AHMED','FATEMA KHANAM','হৃদম আহমেদ','মোঃ রাজু আহমেদ','ফাতেমা খানম','MALE','2015-04-12','20153513234024023','0','0','GOPALGANJ','01718895038','4A38','/2025/4/A/38.jpg',NULL,NULL,NULL),(624,4,'Class Four','A',39,'SAJIM SHIKDER','SHAHIN SHIKDER','SUROVI AKTER','সাজিম সিকদার','শাহীন সিকদার','সুরভী আক্তার','MALE','2015-01-27','20153513215026624','0','0','GOPALGANJ','01704312389','4A39','/2025/4/A/39.jpg',NULL,NULL,NULL),(625,4,'Class Four','A',40,'ANAS AHMED CHOWDHURY','SHOHAN HOSSAIN CHOWDHURY','MONIRA KHANOM','আনাস আহমেদ চৌধুরী','সোহান হোসেন চৌধুরী','মনিরা খানম','MALE','2014-06-20','20143522501056523','0','0','319/1, KUADANGA, WARD NO-01, GOPALGANJ.','01991930375','4A40','/2025/4/A/40.jpg',NULL,NULL,NULL),(626,4,'Class Four','A',41,'MD IRFAN SARDER','SARDER HASAN UDDIN','SARMIN KHANOM','মোঃ এরফান সরদার','সরদার হাসান উদ্দিন','শারমিন খানম','MALE','2015-01-21','20156512895104054','0','0','NARAIL','01744528576','4A41','/2025/4/A/41.jpg',NULL,NULL,NULL),(627,5,'Class Five','A',33,'Sarbashri Roy','Sukanta Roy','Nipa Halder','সর্বশ্রী রায়','সুকান্ত রায়','নীপা হালদার','FEMALE','2014-12-02','20140695123337368','0','0','Barishal','01718988202','5A33','/2025/5/A/33.jpg',NULL,NULL,NULL),(628,5,'Class Five','A',32,'omid hasan ujjal','WAHIDUZZAMAN TALUKDAR','MONOWARA ETI','অমীদ হাসান উজ্জল','ওয়াহিদুজ্জমান তালুকদার','মনোয়ারা ইতি','MALE','2013-02-09','20133514327029723','0','0','GOPALGANJ','01716885250','5A32','/2025/5/A/32.jpg',NULL,NULL,NULL),(629,5,'Class Five','A',31,'SOHANA NOWRIN','Khan Mohammad Azadun Nabi','Fahomida Sultana','সোহানা নওরিন','খান মোহাম্মদ আজাদুন নবী','ফাহমিদা সুলতানা','FEMALE','2015-01-28','20153522509080014','0','0','GOPALGANJ','01711190971','5A31','/2025/5/A/31.jpg',NULL,NULL,NULL),(630,5,'Class Five','A',30,'MD. ALVY MAHABUB JISHAN','MD. MAHABUBUR RAHMAN SHEIKH','FARZANA KHANAM JUTHI','মোঃ আলভী মাহাবুব জিসান','মোঃ মাহাবুবুর রহমান শেখ','ফারজানা খানম যুথি','MALE','2015-09-02','20153514340043054','0','0','Vill: Dhanjail, Post: Narail, Ward No-01 Upazlla: Kashiani, Dist: Gopalganj.','01715313006','5A30','/2025/5/A/30.jpg',NULL,NULL,NULL),(631,5,'Class Five','A',29,'SAFIYYA ISLAM','MD ASRAFULL ISLAM','ISHRAT JAHAN NUR','সাফিয়া ইসলাম','মোঃ আশরাফুল ইসলাম','ইসরাত জাহান নূর','FEMALE','2015-10-30','20158226605117771','0','0','RAJBARI','01712578740','5A29','/2025/5/A/29.jpg',NULL,NULL,NULL),(632,5,'Class Five','A',28,'MD TAMIM MIA','MOHAMMAD MASUD ALI','MST. TANIA KHANOM','মো: তামিম মিয়া','মোহাম্মদ মাসুদ আলী','মোসা: তানিয়া খানম','MALE','2013-12-29','20133513230020482','0','0','GOPALGANJ','01736969618','5A28','/2025/5/A/28.jpg',NULL,NULL,NULL),(633,5,'Class Five','A',27,'ABDULLAH BIN IQBAL','MD IQBAL HOSSAIN','Jui Sarabe','আব্দুল্লাহ বিন ইকবাল','মোঃ ইকবাল হুসাইন','জুই সারাবী','MALE','2016-01-01','20163514354029873','0','0','GOPALGANJ','01910814164','5A27','/2025/5/A/27.jpg',NULL,NULL,NULL),(634,5,'Class Five','A',26,'Syed Taskin','Syed Shariful Alom Mamun','Farhana Akter','সৈয়দ তাসকিন','সৈয়দ শরিফুল আলম মামুন','ফারহানা আকতার','MALE','2015-06-14','20152911835103383','0','0','Village-Khamarpara.  Po- Khamarpara Upazilla-Boalmari.  Dist-Faridpur','01973455502','5A26','/2025/5/A/26.jpg',NULL,NULL,NULL),(635,5,'Class Five','A',25,'RIYAN','MD ZIHAD ALI','LIMA','রিয়ান','মোঃ জিহাদ আলী','লিমা','MALE','2015-12-05','20153513211019161','0','0','GOPALGANJ','01928798047','5A25','/2025/5/A/25.jpg',NULL,NULL,NULL),(636,5,'Class Five','A',24,'MD. MARSAL AYUB SEFAT','MD ZAHID SIKDER','SHAMIMA AKTER SHIMA','মোঃ মার্শাল আয়ুব সিফাত','মোঃ জাহিদ শিকদার','শামীমা আক্তার সীমা','MALE','2015-10-07','20153513221014190','0','0','GOPALGANJ','01779766796','5A24','/2025/5/A/24.jpg',NULL,NULL,NULL),(637,6,'Class Six','A',48,'KRISHNENDU BISWAS','KALYAN KUMAR BISWAS','DIPAMONI BISWAS','কৃষ্ণেন্দু বিশ্বাস','কল্যান কুমার বিশ্বাস','দীপা মনি বিশ্বাস','MALE','2013-12-04','20133522506051340','0','0','GOPALGANJ','01719125172','6A48','/2025/6/A/48.jpg',NULL,NULL,NULL),(638,6,'Class Six','A',63,'MD. ADNAN ISLAM','MD. SHORIFUL ISLAM','MAKSUDA BEGUM','মো: আদনান ইসলাম','মো: শরিফুল ইসলাম','মাকসুদা বেগম','MALE','2013-01-12','20133513256023666','0','0','VILL: GHOSHERCHAR SOUTH PARA P.O+P.S+DIST:GOPALGANJ','01718901754','6A63','/2025/6/A/63.jpg',NULL,NULL,NULL),(639,6,'Class Six','A',26,'MD. MIFTAHUL ISLAM GALIB','MOHAMMAD RIPON MUNSI','MOSAMMAT KHADIJA PARVIN','মোঃ মিফতাহুল ইসলাম গালিব','মোহাম্মদ রিপন মুন্সী','মোসাম্মৎ খাদিজা পারভিন','MALE','2014-08-11','20143515810105231','0','0','GOPALGANJ','01743916796','6A26','/2025/6/A/26.jpg',NULL,NULL,NULL),(640,6,'Class Six','A',67,'BAYAJID ISLAM','TARIKUL ISLAM','RIKTA BEGUM','বায়েজিদ ইসলাম','তরিকুল ইসলাম','রিক্তা বেগম','MALE','2013-09-25','20133513211019640','0','0','GOPALGANJ','01734404000','6A67','/2025/6/A/67.jpg',NULL,NULL,NULL),(641,6,'Class Six','A',77,'F M FAHIM','SHAMIM','RUMA KHANAM','এফ এম ফাহিম','শামীম','রুমা খানম','MALE','2013-05-06','20130115638104190','0','0','BAGERHAT','01915878369','6A77','/2025/6/A/77.jpg',NULL,NULL,NULL),(642,6,'Class Six','A',76,'ESTIAK KARIM RAFI','MOHAMMAD REZAUL KARIM','TASNIMA','ইশতিয়াক করিম রাফি','মোহাম্মদ রেজাউল করিম','তাসনিমা','MALE','2013-06-04','20135525008130287','0','0','GOPALGANJ','01718918150','6A76','/2025/6/A/76.jpg',NULL,NULL,NULL),(643,6,'Class Six','A',73,'REJON SHIKDER','Asad Sakder','Nargis Begum','রেজন সিকদার','আছাদ সিকদার','নার্গিস বেগম','MALE','2014-01-01','20143514320011421','0','0','GOPALGANJ','01759824960','6A73','/2025/6/A/73.jpg',NULL,NULL,NULL),(644,6,'Class Six','A',72,'FARIA','Md Shaha Jahan Molla','Asma Begum','ফারিয়া','মোঃ শাহাজাহান মোল্লা','আসমা বেগম','FEMALE','2012-12-14','20120115628106644','0','0','BAGERHAT','01329333909','6A72','/2025/6/A/72.jpg',NULL,NULL,NULL),(645,6,'Class Six','A',74,'ABU HURAYRA SHEIKH','MD IQBAL SHEIKH','ESMOTARA BEGUM','আবু হুরায়রা শেখ','মোঃ ইকবাল শেখ','এসমোতারা বেগম','MALE','2014-04-27','20143513243020035','0','0','GOPALGANJ','01770833385','6A74','/2025/6/A/74.jpg',NULL,NULL,NULL),(646,6,'Class Six','A',75,'Md Rayhanuzzaman','S M MONIRULZZAMAN','MONOWARA KHANOM','মোঃ  রায়হানুজ্জামান','এস, এম, মনিরুজ্জামান','মনোয়ারা খানম','MALE','2013-11-04','20133522501070880','0','0','GOPALGANJ','01337313050','6A75','/2025/6/A/75.jpg',NULL,NULL,NULL),(647,6,'Class Six','A',16,'Abid Ullah','Mohammad Kalimullah','amina Khanom','আবিদ উল্লাহ','মোহাম্মাদ কালিমুল্লাহ','আমিনা খানম','MALE','2010-07-14','20103519166016167','0','0','','01921643563','6A16','/2025/6/A/16.jpg',NULL,NULL,NULL),(648,6,'Class Six','A',15,'Golam Abrar Munif','MOHAMMAD GOLAM MOSTOFA','MOST SABINA YEASMIN','গোলাম আবরার মুনিফ','মোহাম্মাদ গোলাম মোস্তফা','মোছাঃ সাবিনা ইয়াসমিন','MALE','2014-01-31','20143519119022948','0','0','Vill-Mrittikabati. post-Gimadanga P.S-Tungipara Dist-Gopalganj','01724682281','6A15','/2025/6/A/15.jpg',NULL,NULL,NULL),(649,6,'Class Six','A',13,'ARUNIMA NATH','AMARESH CHANDRA NATH','RATNA DEBNATH','অরুণিমা নাথ','অমরেশ চন্দ্র নাথ','রত্না দেবনাথ','FEMALE','2013-12-31','20133513217022930','0','0','NATH BARI, DAKSHIN TAJPUR, POST- TAJPUR, UPAZILA- SIRAJDIKHAN, DIST- MUNSHIG0NJ.','01912090935','6A13','/2025/6/A/13.jpg',NULL,NULL,NULL),(650,6,'Class Six','A',21,'MD AKIF  HOSEN','HISHORE ALI SIKDER','MST AYESHA AKHTAR','মোঃ আকিফ হোসেন','হায়শর আলী শিকদার','মোসাঃ আয়শা আক্তার','MALE','2014-06-20','20146512863033024','0','0','NARAIL','01728156976','6A21','/2025/6/A/21.jpg',NULL,NULL,NULL),(651,6,'Class Six','A',20,'KAZI SIFAT','MILON KAZI','RUMA BEGUM','কাজী সিফাত','মিলন কাজী','রুমা বেগম','MALE','2014-01-01','20143513234021754','0','0','GOPALGANJ','01796641776','6A20','/2025/6/A/20.jpg',NULL,NULL,NULL),(652,6,'Class Six','A',19,'MOIN SIKDER','MD BABUL SIKDER','MST SAMPA KHANAM','মোইন শিকদার','মোঃ বাবুল শিকদার','মোসা: সম্পা খানম','MALE','2014-08-17','20146512863023297','0','0','NARAIL','01768994105','6A19','/2025/6/A/19.jpg',NULL,NULL,NULL),(653,6,'Class Six','A',18,'masudur rahman','sagor ahmmad','halima khatun','মাসুদুর রহমান','সাগর আহমেদ','হালিমা খাতুন','MALE','2013-08-20','20133513247037835','0','0','karpara gopalgonj','01580378738','6A18','/2025/6/A/18.jpg',NULL,NULL,NULL),(654,6,'Class Six','A',17,'SHEIKH SALMAN YOUSUF','SHAIK BASHIRUZZMAN','RELIA KHANOM','শেখ সালমান ইউসুফ','শেখ বশিরুজ্জামান','রেলিয়া খানম','MALE','2013-10-29','20133513238020274','0','0','GOPALGANJ','01717007101','6A17','/2025/6/A/17.jpg',NULL,NULL,NULL),(655,6,'Class Six','A',14,'MARZAN ZIM','MD NUR ISLAM','JAKIA SULTANA','মারজান জিম','মোঃ নুর ইসলাম','জাকিয়া সুলতানা','MALE','2011-09-06','20110115617104744','0','0','BAGERHAT','01719076021','6A14','/2025/6/A/14.jpg',NULL,NULL,NULL),(656,6,'Class Six','A',57,'TAJ ISLAM','MAMUN MIA','MOU BEGUM','তাজ ইসলাম','মামুন মিয়া','মৌ বেগম','MALE','2014-01-01','20143522509078526','0','0','GOPALGANJ','01711056325','6A57','/2025/6/A/57.jpg',NULL,NULL,NULL),(657,6,'Class Six','A',25,'Nur Fahim','Mozahidul Islam','Rena Begum','নুর ফাহিম','মোজাহিদুল ইসলাম','রিনা বেগম','MALE','2013-06-07','20133522503069488','0','0','55, Gerja Road, Thanapara, Ward No:03, Gopalganj Pourasava, Gopalganj.','01712500113','6A25','/2025/6/A/25.jpg',NULL,NULL,NULL),(658,6,'Class Six','A',45,'MUJAHID APON','ABUL KALAM AZAD','PARMIS AKTER','মুজাহিদ আপন','আবুল কালাম আজাদ','পারমিস আক্তার','MALE','2013-11-11','20133519119026393','0','0','GOPALGANJ','01838146232','6A45','/2025/6/A/45.jpg',NULL,NULL,NULL),(659,6,'Class Six','A',56,'SURJO BAIDYA','SUKDAV BAIDYA','RINA BAIDYA','সূর্য্য বৈদ্য','শুকদেব বৈদ্য','রীনা বৈদ্য','MALE','2013-12-24','20133522501050233','0','0','GOPALGANJ','01821350683','6A56','/2025/6/A/56.jpg',NULL,NULL,NULL),(660,6,'Class Six','A',58,'SAJIDUL ISLAM','SHEIKH ELIASUR RAHMAN','SARIFA SULTANA','সাজিদুল ইসলাম','সেখ ইলিয়াসুর রহমান','সরিফা সুলতানা','MALE','2013-09-03','20133513290023169','0','0','VILL:NIZRA PARKUL, POST:ULPUR P.S:GOPALGANJ SADAR, DIST:GOPALGANJ','01725755656','6A58','/2025/6/A/58.jpg',NULL,NULL,NULL),(661,6,'Class Six','A',54,'HUMAYARA  KHANAM','HOMUAN KABIR','LUCKY  BEGUM','হুমায়ারা খানম','হুমায়ুন কবির','লাকী  বেগম','FEMALE','2013-10-13','20130012500019405','0','0','GOPALGANJ','01934872600','6A54','/2025/6/A/54.jpg',NULL,NULL,NULL),(662,6,'Class Six','A',43,'RAYHAN MOLLA.','MD. MOHASSEN MOLLA','NASRIN BEGUM','রায়হান মোল্লা.','মো: মোহাচ্ছেন মোল্লা','নাছরিন বেগম','MALE','2013-08-10','20133513256024385','0','0','GHOSHERCHAR SOUTH PARA GOPALGANJ','01721502711','6A43','/2025/6/A/43.jpg',NULL,NULL,NULL),(663,6,'Class Six','A',44,'ABIR CHOWDHURY','AKHINUR CHOWDORY','Ayrin Sultana','আবির চৌধুরী','আখিনুর চৌধুরী','আইরিন সুলতানা','MALE','2014-01-25','20143522509065982','0','0','GOPALGANJ','01407561705','6A44','/2025/6/A/44.jpg',NULL,NULL,NULL),(665,6,'Class Six','A',23,'MD ARABI KHAN','MASUD KHAN','NASIMA BEGUM','মোঃ আরাবি খান','মাসুদ খান','নাসিমা বেগম','MALE','2013-12-30','20133522503065644','0','0','GOPALGANJ','01885281594','6A23','/2025/6/A/23.jpg',NULL,NULL,NULL),(666,6,'Class Six','A',47,'ISTEKHAR TAJ','MAHAMUD HASSAN SUJAN','MARIYA AKTER','ইস্তেখার তাজ','মাহমুদ হাসান সুজন','মারিয়া আক্তার','MALE','2013-09-16','20133513217023055','0','0','GOPALGANJ','01711377071','6A47','/2025/6/A/47.jpg',NULL,NULL,NULL),(667,6,'Class Six','A',49,'ABRAR AHMED','RUHUL AMIN','ISHRAT JAHAN ERA','আবরার আহমেদ','রুহুল আমীন','ইসরাত জাহান ইরা','MALE','2013-06-26','20133522505082339','0','0','GOPALGANJ','01792390807','6A49','/2025/6/A/49.jpg',NULL,NULL,NULL),(669,6,'Class Six','A',50,'NAFIM ISLAM','MD SHOHIDUL ISLAM','IRANI KHANAM','নাফিম ইসলাম','মোঃ শহিদুল ইসলাম','ইরানী খানম','MALE','2013-04-22','20133522502052655','0','0','GOPALGANJ','01822951999','6A50','/2025/6/A/50.jpg',NULL,NULL,NULL),(670,6,'Class Six','A',51,'TUKTUKI  AKTER','MD YASIN KAZI','AFRUJA BEGUM','টুকটুকি  আক্তার','মোঃ ইয়াছিন কাজী','আফরোজা বেগম','FEMALE','2012-08-30','20126512879004715','0','0','NARAIL','01780822435','6A51','/2025/6/A/51.jpg',NULL,NULL,NULL),(671,6,'Class Six','A',52,'TANVIR HASAN TOHA','MD MAHMUDUL  HASAN','TANIA KHANAM','তানভীর হাসান তোহা','মোঃ মাহমুদুল হাসান','তানিয়া খানম','MALE','2014-11-28','20146512879000595','0','0','NARAIL','01993020797','6A52','/2025/6/A/52.jpg',NULL,NULL,NULL),(672,6,'Class Six','A',55,'RIYAN AHMMED LABIB','SHAFIQUL ISLAM','ZAHIDA ALAM LUBNA','রিয়ান আহম্মেদ লাবিব','শফিকুল ইসলাম','জাহিদা আলম লুবনা','MALE','2013-03-23','20133513251101326','0','0','GOPALGANJ','01675455378','6A55','/2025/6/A/55.jpg',NULL,NULL,NULL),(673,6,'Class Six','A',53,'JANE ALOM OVI','JABBAR ALI','MAUSUMI NUR RIMA','জানে আলম  অভি','জব্বার আলী','মৌসুমী নূর রীমা','MALE','2013-02-20','20133514374018340','0','0','GOPALGANJ','01913125353','6A53','/2025/6/A/53.jpg',NULL,NULL,NULL),(674,6,'Class Six','A',30,'NASIR SARDER','S M ASHRAFUL ALAM','MST JHUMA KHANOM','নাসির সরদার','এস এম আশরাফুল আলম','মোসা: ঝুমা খানম','MALE','2013-01-18','20133513215025455','0','0','GOPALGANJ','01734455587','6A30','/2025/6/A/30.jpg',NULL,NULL,NULL),(675,6,'Class Six','A',29,'ALIF HOSSAIN YOUSUF','MD. LEKHON HOSSAIN DARIA','MUSLIMA BEGUM','আলিফ হোসেন ইউসুফ','মো: লিখন হোসেন দাড়িয়া','মুছলিমা বেগম','MALE','2013-12-15','20133513221015003','0','0','GOPALGANJ','01739724875','6A29','/2025/6/A/29.jpg',NULL,NULL,NULL),(676,6,'Class Six','A',31,'KHALID AL SAIFULLAH','KAJOL SHEKH','PIYA KHANAM','খালিদ আল সাইফুল্লাহ','কাজল সেখ','পিয়া খানম','MALE','2014-08-18','20143513251104233','0','0','GOPALGANJ','01785896672','6A31','/2025/6/A/31.jpg',NULL,NULL,NULL),(677,6,'Class Six','A',32,'AVRO MOHANTA','SUNIL KUMAR MOHANTA','Sima Rani Biswas','অভ্র মহন্ত','সুনীল কুমার মহন্ত','সিমা রাণী বিশ্বাস','MALE','2013-09-16','20133522501061956','0','0','GOPALGANJ','01782929444','6A32','/2025/6/A/32.jpg',NULL,NULL,NULL),(678,6,'Class Six','A',34,'Yusuf Khan','Md Abdul all Mamun Khan','Sharmin Sultana','ইউসুফ খান','মোঃ আব্দুল আল মামুন খান','শারমীন সুলতানা','MALE','2014-09-26','20145932442102705','0','0','Village- Bashgaon, P.O+P.S- Gazaria, Dist- Munshiganj.','01311863061','6A34','/2025/6/A/34.jpg',NULL,NULL,NULL),(679,6,'Class Six','A',33,'MST ABIDA  SULTANA','MD ALAMGIR HOSSAIN','MST SABINA  AKTER','মোসাঃ আবিদা সুলতানা','মোঃ আলমগীর হোসেন','মোছাঃ সাবিনা  আকতার','FEMALE','2013-10-10','20133513221016170','0','0','GOPALGANJ','01919453501','6A33','/2025/6/A/33.jpg',NULL,NULL,NULL),(680,6,'Class Six','A',37,'SAAD HUSSAIN','KHALID HOSSAIN','SHARIFA BEGUM','সাদ হুসাইন','খালিদ হোসেন','শরিফা বেগম','MALE','2013-06-26','20133522512080378','0','0','GOPALGANJ','01715935790','6A37','/2025/6/A/37.jpg',NULL,NULL,NULL),(681,6,'Class Six','A',35,'sajid rahman','s. m. golam rabbani','jakia akter shakila','সাজিদ রহমান','এস,এম, গোলাম রব্বানী','জাকিয়া আক্তার শাকিলা','MALE','2013-01-03','20133513247037674','0','0','aruakangsur goalgonj','01712401742','6A35','/2025/6/A/35.jpg',NULL,NULL,NULL),(683,6,'Class Six','A',36,'SHEIKH SHAFIN AHMMED','MD. MIRAJ ALI SHEIKH','LAKIYA PARVIN','সেখ শাফীন আহম্মেদ','মোঃ মিরাজ আলী সেখ','লাকীয়া পারভীন','MALE','2014-02-13','20143529109103310','0','0','WORD- 09, TUNGIPARA POURASHAVA, VILLAGE - PATGATI,  POST OFFICE- PATGATI, UPAZILLA- TUNGIPARA, DISTRICT- GOPALGANJ.','01926866207','6A36','/2025/6/A/36.jpg',NULL,NULL,NULL),(684,6,'Class Six','A',38,'SADIYA','MD JAHIDUL ISLAM','FARJANA AKTER','ছাদিয়া','মোঃ জাহিদুল ইসলাম','ফারজানা আক্তার','FEMALE','2013-04-18','20133519176036972','0','0','GOPALGANJ','01911105824','6A38','/2025/6/A/38.jpg',NULL,NULL,NULL),(685,6,'Class Six','A',39,'MD MEJBA MUNSHI','EBADAT MUNSHI','ROJINA KHATUN','মোঃ মেজবা মুন্সী','ইবাদত মুন্সী','রোজিনা খাতুন','MALE','2013-05-13','20133513211020104','0','0','GOPALGANJ','01763018765','6A39','/2025/6/A/39.jpg',NULL,NULL,NULL),(686,6,'Class Six','A',40,'SHUVROJIT BAIN','BROJENDRA NATH BAIN','SHIPRA RANI DAS','শুভ্রজিত বাইন','ব্রজেন্দ্র নাথ বাইন','শিপ্রা রানী দাস','MALE','2014-07-01','20143514367013094','0','0','GOPALGANJ','01749324098','6A40','/2025/6/A/40.jpg',NULL,NULL,NULL),(687,6,'Class Six','A',42,'MAYSA  MONI','KAMAL HOSSAN','MRS MARIEA','মাইসা মনি','কামাল হোসেন','মিস মারিয়া','FEMALE','2012-01-05','20123513221013924','0','0','GOPALGANJ','01618375138','6A42','/2025/6/A/42.jpg',NULL,NULL,NULL),(689,6,'Class Six','A',22,'ZIHAN MOLLA','MD AKIZ','JUMUR KHANAM','জিহান মোল্লা','মোঃ আকিজ','ঝুমুর খানম','MALE','2013-12-08','20133513221019863','0','0','GOPALGANJ','01732570988','6A22','/2025/6/A/22.jpg',NULL,NULL,NULL),(691,6,'Class Six','A',24,'SAJUTY BAIN','SHAMAL CHANDRA BAIN','TINA SHERALY','সেঁজুতী বাইন','শ্যামল চন্দ্র বাইন','টিনা শিরালী','FEMALE','2014-01-01','20143513256023976','0','0','MANIKDHA GOPALGANJ','01710687579','6A24','/2025/6/A/24.jpg',NULL,NULL,NULL),(692,6,'Class Six','A',27,'Rafsan Islam','S M Mohidul Islam','Sumana Afros Rozy','রাফসান  ইসলাম','এস এম মহিদুল ইসলাম','সুমনা আফরোজ রোজী','MALE','2013-12-30','20133513230022912','0','0','GOPALGANJ','01716450328','6A27','/2025/6/A/27.jpg',NULL,NULL,NULL),(693,6,'Class Six','A',28,'ORGO MOJUMDER JOY','Sushil Kumar Majumder','Aunjoli Rani Mondal','অর্ঘ্য মজুমদার জয়','সুশিল কুমার মজুমদার','অঞ্জলী রানী মন্ডল','Male','2012-12-02','20123522507050956','0','0','','01797190186','6A28','/2025/6/A/28.jpg',NULL,NULL,NULL),(695,6,'Class Six','A',46,'RAIYAN RAHMAN ARTHO','ABDUR RAHMAN MIA','SWAPNA BEGUM','রাইয়ান রহমান অর্থ','আব্দুর রহমান মিয়া','স্বপ্না বেগম','MALE','2013-08-09','20133514313034110','0','0','GOPALGANJ','01732571057','6A46','/2025/6/A/46.jpg',NULL,NULL,NULL),(696,6,'Class Six','A',41,'RAIYAN RAHMAN','MIZANUR RAHMAN MOLLA','RUBINA AKTER','রাইয়ান রহমান','মিজানুর রহমান মোল্লা','রুবিনা আক্তার','MALE','2013-12-30','20133515822026127','0','0','GOPALGANJ','01919591371','6A41','/2025/6/A/41.jpg',NULL,NULL,NULL),(697,6,'Class Six','A',59,'ALIF SHAIKH','SHAIKH MD HOSSEIN ALI','AFROZA BEGUM','আলিফ শেখ','শেখ মো: হোসেন আলী','আফরোজা বেগম','MALE','2013-11-16','20133513256024618','0','0','GOPALGANJ','01746250492','6A59','/2025/6/A/59.jpg',NULL,NULL,NULL),(698,6,'Class Six','A',61,'AISHA SIDDIKA','MOHAMMAD ABBAS MOLLAH','MAHAMUDA BEGUM','আয়শা সিদ্দিকা','মোহাম্মদ আব্বাস মোল্লা','মাহমুদা বেগম','FEMALE','2013-05-05','20133522507051272','0','0','GOPALGANJ','01304361023','6A61','/2025/6/A/61.jpg',NULL,NULL,NULL),(699,6,'Class Six','A',60,'BM FAZLE RABBI','RABIUL BHUIYAN','TUMPA KHANAM','বি,এম,ফজলে রাব্বি','রবিউল ভুইয়া','টুম্পা খানম','MALE','2014-07-02','20143513215026577','0','0','do do','01772395246','6A60','/2025/6/A/60.jpg',NULL,NULL,NULL),(700,6,'Class Six','A',68,'MD SAFAYAT','Md Atikur Rahman','Mst Aleya Akter','মো: সাফায়াত','মো: আতিকুর রহমান','মোছা: আলেয়া আকতার','MALE','2013-12-10','20131019479102268','0','0','BOGURA','01722726775','6A68','/2025/6/A/68.jpg',NULL,NULL,NULL),(701,6,'Class Six','A',71,'MD SHAKIB KHAN','HACHIBUR  RAHAMAN','NADIRA BEGUM','মো: সাকিব খান','হাচিবুর রহমান','নাদিরা  বেগম','MALE','2013-02-05','20133513221014875','0','0','GOPALGANJ','01770381672','6A71','/2025/6/A/71.jpg',NULL,NULL,NULL),(702,6,'Class Six','A',70,'JANNATI ISLAM','SAHID KHAN','CHAINA BEGUM','জান্নাতি ইসলাম','সহিদ খান','চায়না বেগম','FEMALE','2015-01-04','20153513294016653','0','0','GOPALGANJ','01714322617','6A70','/2025/6/A/70.jpg',NULL,NULL,NULL),(703,6,'Class Six','A',62,'TASLIM KHAN','NANNU MIA KHAN','MISES TANIA RAHMAN','তাসলিম খাঁন','নান্নু মিয়া খাঁন','মিসেস তানিয়া রহমান','MALE','2014-01-01','20140111447103699','0','0','BAGERHAT','01713928434','6A62','/2025/6/A/62.jpg',NULL,NULL,NULL),(704,6,'Class Six','A',64,'YOUSUF BISWAS','MD. JAMAL BISWAS','MAMATAZ BEGUM','ইউসুফ বিশ্বাস','মো: জামাল বিশ্বাস','মমতাজ বেগম','MALE','2015-01-01','20153513256023439','0','0','GOPALGANJ','01793162514','6A64','/2025/6/A/64.jpg',NULL,NULL,NULL),(705,6,'Class Six','A',65,'ABIDUR RAHAMAN','MD. MISKATUR RAHAMAN','ASRAFUN NAHAR','আবিদুর রহমান রায়ন','মোঃ মিসকাতুর রহমান নইম','আশরাফুন নাহার লাকি','MALE','2013-12-30','20133522509050235','0','0','NARAIL','01721541372','6A65','/2025/6/A/65.jpg',NULL,NULL,NULL),(706,6,'Class Six','A',66,'MOIN KHAN','MD. ARIF KHAN JOY','MAHFUZA BEGUM','মুইন খান','মোঃ আরিফ খান জয়','মাহফুজা বেগম','MALE','2013-07-26','20133513294015988','0','0','GOPALGANJ','01718292917','6A66','/2025/6/A/66.jpg',NULL,NULL,NULL),(707,6,'Class Six','A',69,'SHEIKH YACHIN GONI','OSHMAN GONI SHAKH','MST EASMIN KHATUN','শেখ ইয়াসিন গনি','ওসমান গনি সেখ','মোছাঃ ইয়াছমিন খাতুন','MALE','2013-01-01','20133513221014740','0','0','GOPALGANJ','0','6A69','/2025/6/A/69.jpg',NULL,NULL,NULL),(708,7,'Class Seven','A',53,'MD RIFAT HOSSIN','MD REZAUL KARIM','PAPIYA BEGUM','মো: রিফাত হোসেন .','মো: রেজাউল করিম','পাপিয়া বেগম','MALE','2010-09-13','20103513256021732','0','0','GOPALGANJ','01715452110','7A53','/2025/7/A/53.jpg',NULL,NULL,NULL),(709,7,'Class Seven','A',38,'TAMIM KHAN','MD JAMIL KHAN','SUMI KHANAM','তামিম খান','মোঃ জামিল খান','সুমি খানম','MALE','2013-03-29','20133513290017912','0','0','GOPALGANJ','01783532471','7A38','/2025/7/A/38.jpg',NULL,NULL,NULL),(711,7,'Class Seven','A',49,'MD RAFID HASAN','MD KAIKAUS KHAN','NAJNIN','মোঃ রাফিদ হাসান','মোঃ কায়কাউস খান','নাজনীন','MALE','2011-09-21','20116524407033144','0','0','NARAIL','01918804878','7A49','/2025/7/A/49.jpg',NULL,NULL,NULL),(712,7,'Class Seven','A',50,'TANJIM AHMAD FUYAD','MD. IMAM AHAD','RUHINA AKTER','মো: তানজিম আহম্মেদ ফুয়াদ','মো: ইমাম আহাদ','মোছা: রাজিয়া সুলতানা','MALE','2012-10-05','20123513238022654','0','0','','01713515290','7A50','/2025/7/A/50.jpg',NULL,NULL,NULL),(713,7,'Class Seven','A',55,'JAYEF MAHMUD','MD SHARIF MAHMUD','MST ZAKIA SULTANA','জাইফ মাহমুদ','মোঃ শরীফ মাহমুদ','মোসাঃ জাকিয়া সুলতানা','MALE','2012-09-30','20122692014098051','0','0','DHAKA','01831074047','7A55','/2025/7/A/55.jpg',NULL,NULL,NULL),(714,7,'Class Seven','A',56,'MD. WASIB-UR-RAHMAN','MD. SAHIDUR RAHMAN','ROZI KHANAM','মোঃ ওয়াসিব উর রহমান','মোঃ সাহিদুর রহমান','রোজী খানম','MALE','2012-08-15','20123522503062705','0','0','391/2, FIRE SERVICE ROAD,  WARD NO-03, GOPALGANJ.','01739615236','7A56','/2025/7/A/56.jpg',NULL,NULL,NULL),(715,7,'Class Seven','A',57,'SOBUJ MOLLA','YOUSUF  MOLLA','SHOVA AKTER','সবুজ মোল্লা','ইউসুফ  মোল্লা','শোভা আক্তার','MALE','2013-02-24','20133513221014605','0','0','UTTAR GOBRA, GOBRA, GOPALGANJ.','01726303060','7A57','/2025/7/A/57.jpg',NULL,NULL,NULL),(716,7,'Class Seven','A',48,'SEJUTI BAIN','BROJENDRA NATH BAIN','SHIPRA RANI DAS','সেজুতী বাইন','ব্রজেন্দ্র নাথ বাইন','শিপ্রা রানী দাস','FEMALE','2012-06-30','20123514367013095','0','0','GOPALGANJ','01749324098','7A48','/2025/7/A/48.jpg',NULL,NULL,NULL),(717,7,'Class Seven','A',34,'DISHAMONI MANDAL','SURESH CHANDRA MANDAL','SHELA BISWAS','দিশামনি  মন্ডল','সুরেশ চন্দ্র মন্ডল','শিলা বিশ্বাস','FEMALE','2013-02-26','20137917631107628','0','0','PIROJPUR','01767044444','7A34','/2025/7/A/34.jpg',NULL,NULL,NULL),(718,7,'Class Seven','A',35,'SAMIYA BENTA ZAMIM','SHEIKH MOHAMMAD ZAMIM HOSEN','MST SALEHA KHANAM','সামিয়া বিনতে জামিম','শেখ মুহাম্মাদ জামিম হোসেন','মোসা: সালেহা খানম','FEMALE','2012-12-06','20126512839105727','0','0','NARAIL','01716308707','7A35','/2025/7/A/35.jpg',NULL,NULL,NULL),(720,7,'Class Seven','A',41,'MD AHAD SHEIKH','Mikaiel Sheikh','Johora','মো: আহাদ শেখ','মিকাইল শেখ','জোহরা','MALE','2013-01-08','20133529103103744','0','0','GOPALGANJ','01980222214','7A41','/2025/7/A/41.jpg',NULL,NULL,NULL),(721,7,'Class Seven','A',44,'MD FAHAD AHMMAD MITHUL','MD FARUK HOSSAIN MUNSHI','MST MUKTA SULTANA','মোঃ ফাহাদ আহম্মদ মিথুল','মোঃ ফারুক হোসেন মুন্সী','মোছাঃ মুক্তা সুলতানা','MALE','2011-08-22','20113513294021326','0','0','GOPALGANJ','01710560116','7A44','/2025/7/A/44.jpg',NULL,NULL,NULL),(722,7,'Class Seven','A',42,'Musfiqur Rahman','DELOAR HOSSAIN','MARJINA BEGUM','মুশফিকুর রহমান','দেলোয়ার হোসেন','মর্জিনা বেগম','MALE','2012-01-01','20123522503063143','0','0','GOPALGANJ','01982632307','7A42','/2025/7/A/42.jpg',NULL,NULL,NULL),(723,7,'Class Seven','A',43,'ANIFA RAHAMAN','ANISUR RAHAMAN MOLLA','TAJRIA AKTAR LABONI','আনিফা রহমান','আনিচুর রহমান মোল্যা','তাজরিয়া আক্তার লাবনী','FEMALE','2013-10-05','20133513247028503','0','0','GOPALGANJ','01712715009','7A43','/2025/7/A/43.jpg',NULL,NULL,NULL),(724,7,'Class Seven','A',45,'NIROB MUNSHI','NANNA MUNSHI','FATEMA TUZ ZOHORA','নিরব মুন্সী','নান্না মুন্সী','ফাতেমা তুজ জোহরা','MALE','2012-03-20','20123513221014756','0','0','GOPALGANJ','01400355161','7A45','/2025/7/A/45.jpg',NULL,NULL,NULL),(725,8,'Class Eight','A',47,'JIHAD TALUKDER ALIJA','MD.ANYET HOSSAIN','RAJIA KHATUN','জিহাদ তালুকদার','মো:এনায়েত হোসেন তালুকদার','মোছা:জেসমিন আক্তার','MALE','2012-11-16','20123513247031832','0','0','karpara gopalgonj','0','8A47','/2025/8/A/47.jpg',NULL,NULL,NULL),(727,8,'Class Eight','A',46,'M. Shahriar Nirjan','Farukuzzaman','Keya Sultana','এম. শাহরিয়ার নির্জণ','ফারুকউজ্জামান','কেয়া সুলতানা','MALE','2012-10-28','20123522508061927','0','0','Gopalganj.','01741607231','8A46','/2025/8/A/46.jpg',NULL,NULL,NULL),(728,8,'Class Eight','A',42,'Tanbir Hossain','MD NURUL  ISLAM','ZESMIN BEGUM','তানবির হোসেন','মোঃ নুরুল  ইসলাম','জেছমিন বেগম','MALE','2010-06-12','20103513238021441','0','0','Vill: Matla, Post: Molla Tentulia Upazila+Zila: Gopalganj','01725428288','8A42','/2025/8/A/42.jpg',NULL,NULL,NULL),(730,8,'Class Eight','A',43,'SAKIB SHAIKH','MD KAMAL SHAIKH','Nasima Begum','সাকিব শেখ','মোঃ কামাল শেখ','নাসিমা বেগম','MALE','2012-01-01','20123522507063218','0','0','GOPALGANJ','01712885208','8A43','/2025/8/A/43.jpg',NULL,NULL,NULL),(731,8,'Class Eight','A',44,'SANTO MIA','MD MIRON MIA','RUPALI BEGUM','সান্ত মিয়া','মোঃ মিরন মিয়া','রুপালী বেগম','MALE','2011-05-30','20113513286021305','0','0','GOPALGANJ','01783380776','8A44','/2025/8/A/44.jpg',NULL,NULL,NULL),(732,8,'Class Eight','A',37,'MD RIDUYAN ISLAM','MD. ZIHAD MOLLA','NAZMA BEGUM','মোঃ রিদুয়ান ইসলাম','মো: জিহাদ মোল্লা','নাজমা বেগম','MALE','2012-06-01','20123513238022068','0','0','GOPALGANJ','01303964900','8A37','/2025/8/A/37.jpg',NULL,NULL,NULL),(733,8,'Class Eight','A',41,'TAMIM HOSEN','CHUNNU FAKIR','BILKICH BEGUM','তামিম হোসেন','চুন্নু ফকির','বিলকিচ বেগম','MALE','2012-01-26','20123513286027943','0','0','GOPALGANJ','01881577006','8A41','/2025/8/A/41.jpg',NULL,NULL,NULL),(734,8,'Class Eight','A',45,'ABDULLAH ANSARI ALIF','Zahangir Alam','Nazma Begum','আবদুল্লাহ আনসারী আলিফ','জাহাঙ্গীর আলম','নাজমা বেগম','Male','2011-04-13','20112692505542894','0','0','DHAKA','01713992472','8A45','/2025/8/A/45.jpg',NULL,NULL,NULL),(736,9,'Class Nine','A',41,'MD RAFSAN SARDER','ABDUR SABUR SARDER','RAFIJA BEGUM','মো: রাফসান সরদার','আ:সবুর সরদার','রাফিজা বেগম','MALE','2010-12-10','20103513247033589','0','0','GOPALGANJ','01787330957','9A41','/2025/9/A/41.jpg',NULL,NULL,NULL),(737,9,'Class Nine','A',40,'MD. ABU MUSHA SHARIF','MD. MUKUL SHARIF','SALINA YEASMIN','মোঃ আবু মুসা শরীফ','মোঃ মুকুল শরীফ','সেলিনা ইয়াসমিন','MALE','2011-02-20','20113522504070100','0','0','GOPALGANJ','01712532683','9A40','/2025/9/A/40.jpg',NULL,NULL,NULL),(738,9,'Class Nine','A',42,'MD  TAHSIN','MOHSIN MOLLA','SURAIYA KHANAM','মো:তাহসিন','মহসীন মোল্যা','সুরাইয়া খানম','MALE','2011-12-09','20113513247033331','0','0','GOPALGANJ','01879502393','9A42','/2025/9/A/42.jpg',NULL,NULL,NULL),(739,9,'Class Nine','A',36,'MD TAREK AMIN SHEIKH','MD JUWEL SHEIKH','MST ROKYA BEGUM','মো: তারেক আমিন শেখ','মো: জুয়েল শেখ','মোসা: রোকেয়া বেগম','MALE','2011-01-02','20116512839106037','0','0','NARAIL','01917226558','9A36','/2025/9/A/36.jpg',NULL,NULL,NULL),(740,9,'Class Nine','A',38,'ABIR MAHMUD PRINCE','MD HELAL UDDIN MOLLA','RATNA BEGUM','আবির মাহমুদ প্রিন্স','মোঃ হেলাল উদ্দিন মোল্লা','রত্না বেগম','MALE','2009-12-07','20093513238027338','0','0','GOPALGANJ','01740707195','9A38','/2025/9/A/38.jpg',NULL,NULL,NULL),(741,9,'Class Nine','A',39,'MOHAMMAD MEHERAB HASAN','MD JAKIR HOSSAIN','TAHAMINA SULTANA','মোহাম্মদ মেহেরাব হাসান','মোঃ জাকির হোসেন','তাহামিনা সুলতানা','MALE','2010-12-08','20106512815922502','0','0','NARAIL','01848374977','9A39','/2025/9/A/39.jpg',NULL,NULL,NULL),(743,9,'Class Nine','A',43,'ARNOB HALDER RAJ','DUKE HALDER','LATA HALDER','অর্নব হালদার রাজ','ডিউক হালদার','লতা হালদার','MALE','2009-06-01','20093522503051203','0','0','GOPALGANJ','01716316057','9A43','/2025/9/A/43.jpg',NULL,NULL,NULL),(744,9,'Class Nine','A',44,'MD BADHON SHEIKH','MD KHOKON','SONIA AKTER','মোঃ বাধন শেখ','মোঃ খোকন','সোনিয়া আক্তার','MALE','2011-10-23','20113513234021606','0','0','GOPALGANJ','01408808752','9A44','/2025/9/A/44.jpg',NULL,NULL,NULL),(746,9,'Class Nine','A',45,'NAHIDA','MD NUR ISLAM','JAKIA SULTANA','নাহিদা','মোঃ নুর ইসলাম','জাকিয়া সুলতানা','FEMALE','2009-10-07','20090115617101475','0','0','BAGERHAT','01719076021','9A45','/2025/9/A/45.jpg',NULL,NULL,NULL),(747,9,'Class Nine','A',37,'SHEKH AZRUN ADNAN','MD.REZAUL KARIM','MUSLIMA AKTER ','শেখ আজরুন আদনান','মোঃ রেজাউল করিম','মুসলিমা আক্তার','MALE','2009-02-27','20093513211017959','0','0','gdf','01690148207','9A37','/2025/9/A/37.jpg',NULL,NULL,NULL),(748,9,'Class Nine','A',34,'RAFIMUZZAMAN','MD KADIMUZZAMAN','MST ROMANA BEGUM','রাফিমুজ্জামান','মো: কাদিমুজ্জামান','মোসা:রোমানা বেগম','MALE','2010-11-09','20103513294015315','0','0','GOPALGANJ','01710726724','9A34','/2025/9/A/34.jpg',NULL,NULL,NULL),(749,9,'Class Nine','A',33,'MD SHOAIB FAKIR','MD HASAN ALI FAKIR','SAHNAJ AKTER','মোঃ সোয়াইব ফকির','মোঃ হাসান আলী ফকির','শাহানাজ আকতার','MALE','2010-08-11','20103513286030497','0','0','GOPALGANJ','01738990261','9A33','/2025/9/A/33.jpg',NULL,NULL,NULL),(750,9,'Class Nine','A',46,'MD REZWAN AHMED','MD ALAMGIR MINA','MONIRA BEGUM','মোঃ রেজওয়ান আহমেদ','মোঃ আলমগীর মিনা','মনিরা বেগম','MALE','2010-03-12','20103513215019969','0','0','GOPALGANJ','01914821009','9A46','/2025/9/A/46.jpg',NULL,NULL,NULL),(751,9,'Class Nine','A',47,'S M YEAMIN ARAFAT','S M MONJUR HOSSAIN','MST SALMA BEGUM','এস,এম, ইয়ামিন আরাফাত','এস এম মুঞ্জুর হোসেন','মোসা: সালমা বেগম','MALE','2010-12-16','20106512839107369','0','0','NARAIL','01725391093','9A47','/2025/9/A/47.jpg',NULL,NULL,NULL),(752,9,'Class Nine','A',50,'TAKBIR AHAMMED','MONIRUZZAMAN MOLLA','SHAMIMA NASRIN','তাকবির আহম্মেদ','মনিরুজ্জামান মোল্লা','শামিমা নাছরিন','MALE','2010-09-29','20103513290023872','0','0','','01721726031','9A50','/2025/9/A/50.jpg',NULL,NULL,NULL),(753,9,'Class Nine','A',48,'NAJIBUR MOLLA','NURMIA MOLLA','RUNA BEGUM','নাজিবুর মোল্যা','নূরমিয়া মোল্লা','রুনা বেগম','MALE','2010-11-28','20106512879998888','0','0','NARAIL','01760665055','9A48','/2025/9/A/48.jpg',NULL,NULL,NULL),(754,9,'Class Nine','A',49,'Alvi  Rahman Mahi','No Data ON BRIS BD','Shahria Parvin','আলভি রহমান মাহি','মো:সহিদুর রহমান','শাহরীয়া পারভীন','MALE','2010-10-10','20103519166015829','0','0','','01715540558','9A49','/2025/9/A/49.jpg',NULL,NULL,NULL),(755,9,'Class Nine','A',52,'SHREEYA BISWAS','SANJIT KUMAR BISWAS','LATA BISWAS','SHREEYA BISWAS','SANJIT KUMAR BISWAS','LATA BISWAS','FEMALE','2010-09-23','0','0','0','N/A','0','9A52','/2025/9/A/52.jpg',NULL,NULL,NULL),(756,9,'Class Nine','A',53,'SURAJ BISWAS','SAROJIT BISWAS','MUKTI SIKDAR','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762789382','9A53','2025/9/53.jpg','',0,NULL);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `student` with 483 row(s)
--

--
-- Table structure for table `student_2024`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_2024` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addmission_id` int DEFAULT NULL,
  `new_roll` int DEFAULT NULL,
  `fail_sub` int DEFAULT NULL,
  `p_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1644 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_2024`
--

LOCK TABLES `student_2024` WRITE;
/*!40000 ALTER TABLE `student_2024` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `student_2024` VALUES (1,4,'Class Four','A',1,'RAKHI BHOWMIC','RANAJIT KUMAR BOWMIC','PROTAP RUDDRO BOSU','রাখি ভৌমিক','রনোজিৎ কুমার ভৌমিক','প্রতাপ রুদ্র বসু','FEMALE','2031-12-14','20143514381034990','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760187575','4A1','4/1.jpg',NULL,NULL,NULL,2,0,'0'),(2,4,'Class Four','A',10,'PUSPITA MAJUMDER','PIGUSH KANTI MAJUMDER','SWAPNA RANI DATTA','পুষ্পিতা মজুমদার','পিযুষ কান্তি মজুমদার','স্বপ্না রানী দত্ত','FEMALE','2025-02-15','20153522509066624','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801761424455','4A10','4/10.jpg',NULL,NULL,NULL,20,0,'0'),(3,4,'Class Four','A',11,'HAFSHA RAHMAN KOTHA','MD HEZBUR RAHMAN PRINCE','RAHIMA AKTAR','হাফসা রহমান কথা','মোঃ হেজবুর রহমান প্রিন্স','রহিমা আক্তার','FEMALE','2022-01-15','20153522501069478','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801768197979','4A11','4/11.jpg',NULL,NULL,NULL,15,0,'0'),(4,4,'Class Four','A',12,'SHEIKH TISAN','SALIM SHEKH','TAMANNA BEGUM','শেখ তিশান','সেলিম শেখ','তামান্না বেগম','MALE','2024-01-15','20143513256019004','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801744662626','4A12','4/12.jpg',NULL,NULL,NULL,16,0,'0'),(5,4,'Class Four','A',13,'MAHIYA MAMUN','AL MAMUN','SHARIFA BEGUM','মাহিয়া  মামুন','আল মামুন','শরিফা বেগম','FEMALE','2019-05-14','20143513269028945','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801627903875','4A13','4/13.jpg',NULL,NULL,NULL,21,0,'0'),(6,4,'Class Four','A',14,'ARAF SHARIF','TARIQUL ISLAM','FATEMA TUZ ZOHARA','আরাফ শরীফ','তারিকুল ইসলাম','ফাতেমা তুজ জোহরা','MALE','2019-05-14','20143522509077377','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776809349','4A14','4/14.jpg',NULL,NULL,NULL,23,0,'0'),(7,4,'Class Four','A',15,'NUSRAT JAHAN','MD JOINUL ABEDIN','SONIA AKTER','নুসরাত জাহান','মোঃ জয়নুল আবেদীন','সোনিয়া আক্তার','FEMALE','2024-08-15','20153522509066517','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994503563','4A15','4/15.jpg',NULL,NULL,NULL,19,0,'0'),(8,4,'Class Four','A',17,'SAMIHA','MD OBYDULLAH','FARJANA HAQUE','সামিহা','মোঃ ওবায়দুল্লাহ','ফারজানা হক','FEMALE','2030-04-16','20163522508065384','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801785035000','4A17','4/17.jpg',NULL,NULL,NULL,11,0,'0'),(9,4,'Class Four','A',18,'ALIA SHORIF','MD MONIRUZZAMAN','JUBEYADA SULTANA','আলিয়া শরীফ','মোঃ মনিরুজ্জামান','জুবাইদা সুলতানা','FEMALE','2013-11-09','20133522508065684','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728310176','4A18','4/18.jpg',NULL,NULL,NULL,24,0,'0'),(10,4,'Class Four','A',19,'ORNIL ROY','OASIM KUMAR ROY','RATNA BISWAS','অর্নিল রায়','অসীম কুমার রায়','রত্না বিশ্বাস','MALE','2015-01-15','20153522509061174','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801864559471','4A19','4/19.jpg',NULL,NULL,NULL,27,0,'0'),(11,4,'Class Four','A',2,'NASUHA BUSHRA','SHAIKH MOHAMMAD ABU HANIF','MUSLIMA KHANOM','নছুহা বুশরা','শেখ মোহাম্মদ আবু হানিফ','মুসলিমা খানম','FEMALE','2015-01-15','20153522507078680','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801757750106','4A2','4/2.jpg',NULL,NULL,NULL,1,0,'0'),(12,4,'Class Four','A',20,'JIM LASKER','MOHABBAT LASKAR','POPIA KHANAM','জীম লস্কার','মোহব্বাত লস্কার','পপিয়া খানম','MALE','2013-07-26','20130115695106160','0','0','BAGERHAT','0','4A20','4/20.jpg',NULL,NULL,NULL,32,6,'0'),(13,4,'Class Four','A',21,'MAHADI HASAN TUR','MD EMRAN MUNSI','MST. RUPA KHANAM','মাহাদি হাসান তূর','মোঃ ইমরান মুন্সী','মোসাঃ রুপা খানম','MALE','2027-12-14','20143514381035075','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759296441','4A21','4/21.jpg',NULL,NULL,NULL,8,0,'0'),(14,4,'Class Four','A',22,'HABIBUR RAHMAN SHEIKH','AL AMIN SHEIKH','NASRIN KHANAM','হাবিবুর রহমান শেখ','আল আমিন শেখ','নাসরিন খানম','MALE','2014-09-15','20153513243020243','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801832697622','4A22','4/22.jpg',NULL,NULL,NULL,29,0,'0'),(15,4,'Class Four','A',23,'NUSRAT TABASSUM','MOLLA MURAD','MAZADA AKTER','নুসরাত তাবাচ্ছুম','মোল্যা মুরাদ','মাজেদা আক্তার','FEMALE','2001-06-14','20143513217024126','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801963884807','4A23','4/23.jpg',NULL,NULL,NULL,12,0,'0'),(16,4,'Class Four','A',24,'NABONITA BISWAS','PALLOB KANTI BISWAS','MALA BISWAS','নবনীতা বিশ্বাস','পল্লব কান্তি বিশ্বাস','মালা বিশ্বাস','FEMALE','2028-04-15','20153513282022687','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912331799','4A24','4/24.jpg',NULL,NULL,NULL,10,0,'0'),(17,4,'Class Four','A',25,'MD SANIM CHOWDHURY','UZZAL MAMUN CHOWDHURY','RAHIMA CHOWDHURY','মোঃ সানীম চৌধুরী','উজ্জল মামুন চৌধুরী','রহিমা  চৌধুরী','MALE','2017-10-14','20143522509058057','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718656581','4A25','4/25.jpg',NULL,NULL,NULL,25,0,'0'),(18,4,'Class Four','A',26,'NAYEEM BIN HASAN','MD ABUL HASAN','NASNIN NAHAN','নাঈম বিন  হাসান','মোঃ আবুল হাসান','নাজনীন নাহার','MALE','2006-04-14','20141813159112337','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801990024242','4A26','4/26.jpg',NULL,NULL,NULL,17,0,'0'),(19,4,'Class Four','A',27,'MD HASNAIN ZABEER AVEEK','MD MONZUR MORSHED','TANJINA AFROZ','মোঃ হাসনাঈন জাবির অভীক','মোঃ মনজুর মোর্শেদ','তানজীনা  আফরোজ','MALE','2011-11-14','20142617272123488','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801980377677','4A27','4/27.jpg',NULL,NULL,NULL,31,6,'0'),(20,4,'Class Four','A',28,'GALPO BISWAS','SANJAY BISSAS','SHILA MONDAL','গল্প বিশ্বাস','সঞ্জয় বিশ্বাস','শিলা বিশ্বাস','MALE','2030-11-14','20143522501069832','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801786930040','4A28','4/28.jpg',NULL,NULL,NULL,4,0,'0'),(21,4,'Class Four','A',29,'ARANYA HIRA','APURBA HIRA','MONI BISWAS','অরন্য হীরা','অপূর্ব হীরা','মনি বিশ্বাস','MALE','2012-01-15','20150115617102178','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960927022','4A29','4/29.jpg',NULL,NULL,NULL,28,0,'0'),(22,4,'Class Four','A',3,'ABDUR RAHIM','MD JAKARIA MOLLA','ALIDA KHANAM','আব্দুর রহিম','মো:জাকারিয়া মোল্লা','এলিদা খানম','MALE','2023-03-14','20140115628103185','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801775899426','4A3','4/3.jpg',NULL,NULL,NULL,34,6,'0'),(23,4,'Class Four','A',30,'NUSNAT RAHMAN','MD BABUL HOSSAIN','SUKHI KHANAM','নুসরাত রহমান','মোঃ বাবুল  হোসেন','সুখী খানম','FEMALE','2025-09-14','20143513221012368','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801788817988','4A30','4/30.jpg',NULL,NULL,NULL,30,1,'0'),(24,4,'Class Four','A',31,'SHADMAN HABIB SAAD','NADIM SHIKDER','MAHMUDA PARVIN MUKTA','শাদমান হাবিব সাদ','নাদিম  সিকদার','মাহমুদা পারভীন মুক্তা','MALE','2015-12-12','20153513247041018','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994018022','4A31','4/31.jpg',NULL,NULL,NULL,22,0,'0'),(25,4,'Class Four','A',32,'SHREYAN MODAK SUMIT','SHAYMAL KUMAR MODAK','SMRITI RANI SARKER','শ্রেয়ান মোদক','শ্যামল কুমার মোদক','স্মৃতি রানী সরকার','MALE','2014-12-08','20144793324042335','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911779705','4A32','4/32.jpg',NULL,NULL,NULL,18,0,'0'),(26,4,'Class Four','A',4,'ISRAT AHMED','SABBIR AHMED','TAPOSI','ইসরাত  আহমেদ','সাব্বির আহম্মেদ','তাপসী','FEMALE','2008-12-15','20153522508077366','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801033223329','4A4','4/4.jpg',NULL,NULL,NULL,7,0,'0'),(27,4,'Class Four','A',5,'ARISHA KHANAM','KHALID HOSSAIN','AKHI AKTER','আরিশা খানম','খালিদ হোসেন','আখি আক্তার','FEMALE','2015-09-14','20143513221014799','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801408146721','4A5','4/5.jpg',NULL,NULL,NULL,13,0,'0'),(28,4,'Class Four','A',6,'ISLAM AHMED JARIF','ABDUS SATTAR MIAH','ASMA AKTER','ইসমাম আহমেদ  জারিফ','আবদুস ছাত্তার মিয়া','আসমা আক্তার','MALE','2001-01-15','20152914739113478','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916817524','4A6','4/6.jpg',NULL,NULL,NULL,9,0,'0'),(29,4,'Class Four','A',7,'FAIJUR RAHMAN','FARUK MATUBBAR','JOSNA','ফাইজুর রহমান','ফারুক মাতুব্বর','জোসনা','MALE','2019-11-14','20142911055105306','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801866102979','4A7','4/7.jpg',NULL,NULL,NULL,33,6,'0'),(30,4,'Class Four','A',8,'MIFTAHUL JANNAT AREBA','MD MIRAZ SHARDER','SHARMIN AKTER','মিফতাহুল জান্নাত আরিবা','মোঃ মিরাজ সরদার','শারমিন আকতার','FEMALE','2005-09-13','20133522509067481','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717810719','4A8','4/8.jpg',NULL,NULL,NULL,5,0,'0'),(31,4,'Class Four','A',9,'SOUMMODIP HALDER','DINABANDHU HALDER','SUMITA SARKER','সৌম্যদ্বীপ হালদার','দীনবন্ধু হালদার','সুমিতা সরকার','MALE','2027-06-14','20143519138103001','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745130323','4A9','4/9.jpg',NULL,NULL,NULL,6,0,'0'),(32,5,'Class Five','A',1,'MD BAYEJID ISLAM','MD JAKIR HOSSIN','HASINA','মোঃ বায়েজিদ ইসলাম','মোঃ জাকির হোসেন','হাচিনা','MALE','2012-12-12','20125422505113561','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716407672','5A1','5/1.jpg',NULL,NULL,NULL,2,0,'0'),(33,5,'Class Five','A',10,'ABDUR RAZZAQUE RAZJO','HARUN AR RASHID BABLU','ZANNATUL FERDOUS','আব্দুর রাজ্জাক রাজ্য','হারুন-অর-রশীদ বাবলু','জান্নাতুল ফেরদৌস','MALE','2008-06-12','20123522503050620','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760200092','5A10','5/10.jpg',NULL,NULL,NULL,7,0,'0'),(34,5,'Class Five','A',11,'FARZAD RAKIB SAMEN','S M RAKIBUL HASAN','FARZANA ISLAM','ফারজাদ রাকিব সামিন','এস এম রকিবুল হাসান','ফারজানা ইসলাম','MALE','2014-06-13','20133522509057413','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716886047','5A11','5/11.jpg',NULL,NULL,NULL,14,0,'0'),(35,5,'Class Five','A',12,'TARIKA TASNIM TARIN','S M OBAYDUR RAHMAN','MST BILKIS SIDDIKA','তারিকা তাসনিম তারিন','এস,এম ওবায়দুর রহমান','মোছাঃ বিলকিস সিদ্দিকা','FEMALE','2024-06-14','20143513234021484','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747867731','5A12','5/12.jpg',NULL,NULL,NULL,20,0,'0'),(36,5,'Class Five','A',13,'NAHOR A JANNAT','S M A REEAZ UDDIN','LAILATUL FERDOUSI','নহর এ  জান্নাত','এস এম এ রিয়াজ উদ্দীন','লায়লাতুল ফেরদৌসী','FEMALE','2009-11-14','20143522507073035','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801937231632','5A13','5/13.jpg',NULL,NULL,NULL,19,0,'0'),(37,5,'Class Five','A',14,'RISHAD SHEIK','A LION SHEIK','ANICHA KHATUN','রিশাদ শেখ','এ লিয়ন শেখ মামুন','আনিছা খাতুন','MALE','2009-09-13','20133513260017541','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801930426292','5A14','5/14.jpg',NULL,NULL,NULL,11,0,'0'),(38,5,'Class Five','A',15,'SHEIKH ESHAD MUNNU','SK ZILLUR RAHMAN','LEMA KHANAM','শেখ ইশাদ মুন্নু','শেখ জিল্লুর রহমান','লিমা খানম','MALE','2006-03-14','20146515218107150','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801777886796','5A15','5/15.jpg',NULL,NULL,NULL,12,0,'0'),(39,5,'Class Five','A',16,'HUSAIN DARIA','NAZMUL','FOZILA KHANAM','হুসাইন দাড়িয়া','নাজমুল','ফজিলা খানম','MALE','2029-12-12','20123513211019032','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721739144','5A16','5/16.jpg',NULL,NULL,NULL,24,0,'0'),(40,5,'Class Five','A',17,'FAIYAZ MOSTAFA WASIF','MD. TANJIDUR RAHMAN','SALEHIN AKTER SHANTA','ফাইয়াজ মোস্তফা ওয়াছিফ','মোঃতানজিদুর রহমান','ছালেহীন আক্তার শান্তা','MALE','2013-08-12','20133522510082178','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713663003','5A17','5/17.jpg',NULL,NULL,NULL,27,0,'0'),(41,5,'Class Five','A',18,'MD SHAHRIAR MOLLA','MD SHAFIKUL ISLAM MANTU','MUSLIMA BEGUM','মোঃ শাহরিয়ার মোল্যা','মোঃ শফিকুল ইসলাম মন্টু','মুসলিমা বেগম','MALE','2024-11-13','20133522507062445','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736147950','5A18','5/18.jpg',NULL,NULL,NULL,26,0,'0'),(42,5,'Class Five','A',19,'RIG SAHA','RIPUN KUMAR','APARNA HALDER','রিগ সাহা','রিপন কুমার সাহা','অপর্না হালদার','MALE','2004-05-13','20133515171886026','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731242011','5A19','5/19.jpg',NULL,NULL,NULL,6,0,'0'),(43,5,'Class Five','A',2,'SWAPNIL BISWAS','SUSHIL BISWAS','SHIULI DAS','স্বপ্নীল বিশ্বাস','সুশীল বিশ্বাস','শিউলী দাস','MALE','2013-10-28','20133522506064729','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801017144523','5A2','5/2.jpg',NULL,NULL,NULL,1,0,'0'),(44,5,'Class Five','A',20,'ANUSKA BANIK','ASHIM BANIK','SUSHILA BARAI','অনুস্কা বনিক','অসীম বনিক','সুশীলা বাড়ৈ','FEMALE','2001-11-13','20133522509066581','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928643923','5A20','5/20.jpg',NULL,NULL,NULL,23,0,'0'),(45,5,'Class Five','A',22,'NAZIFA TABASSUM','HABIBUR RAHMAN','FOUZIA KHANAM','মোসাম্মৎ  নাজিফা তাবাসসুম','মোঃ হাবিবুর রহমান','ফৌজিয়া খানম','FEMALE','2013-09-13','20132610413104380','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801979142463','5A22','5/22.jpg',NULL,NULL,NULL,9,0,'0'),(46,5,'Class Five','A',23,'SURAIYA RAHMAN','MD BABUL HASSAIN','SUKHI KHANAM','সুরাইয়া  রহমান','মোঃ বাবুল  হোসেন','সুখী খানম','FEMALE','2020-11-12','20123513221018480','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801788817988','5A23','5/23.jpg',NULL,NULL,NULL,21,0,'0'),(47,5,'Class Five','A',26,'SHEIKH JAWAD UDDIN','SHEIKH JASIM UDDIN','ROMANA AFAZ','শেখ জাওয়াদ উদ্দীন','শেখ জসীম  উদ্দীন','রোমেনা  আফাজ','MALE','2013-12-26','20130110834106344','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737021310','5A26','5/26.jpg',NULL,NULL,NULL,16,0,'0'),(48,5,'Class Five','A',3,'MD SAFWAT TAWSIF','MD SAIFUL HUDA','MST.NA ZRUN PARVIN','মোঃ সাফওয়াত  তাওসীফ','মোঃ সাইফুল  হুদা','মোসাঃ নজরুন  পারভীন','MALE','2001-01-14','20148714713106594','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776242096','5A3','5/3.jpg',NULL,NULL,NULL,3,0,'0'),(49,5,'Class Five','A',4,'TAJWAR TAHA ISLAM','TARIQUL ISLAM','SHOHELY ISLAM','তাজওয়ার তাহা ইসলাম','তরিকুল ইসলাম','সোহেলী ইসলাম','MALE','2024-05-14','20143519119024829','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801930444513','5A4','5/4.jpg',NULL,NULL,NULL,8,0,'0'),(50,5,'Class Five','A',5,'NAMIRA BINTE KHOBAYEB','KHOBAYEB MOLLA','RUMA BEGUM','নুসরাত জাহান নামিরা','হাফেজ মোঃ খোবায়েব','রুমা সুলতানা','FEMALE','2018-05-14','20143513230021011','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801617504415','5A5','5/5.jpg',NULL,NULL,NULL,5,0,'0'),(51,5,'Class Five','A',6,'IMTIAZ BIN IMRAN','IMRAN HASSAIN TALUKDER','ALEA FARAZI','ইমতিয়াজ বিন ইমরান','ইমরান হোসেন তালুকদার','আলেয়া ফরাজী','MALE','2005-07-15','20133515171889274','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920288819','5A6','5/6.jpg',NULL,NULL,NULL,17,0,'0'),(52,5,'Class Five','A',7,'AFNAN JAHAN ISHA','MD INSHAN KHAN','MAHARUNNSA','আফনান জাহান ইশা','মোঃ ইনছান খান','মেহেরুন্নেছা','FEMALE','2012-11-13','20133522505054471','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801946500420','5A7','5/7.jpg',NULL,NULL,NULL,10,0,'0'),(53,5,'Class Five','A',8,'ANUSKA CHOWDHURY','PANKAJ CHOWDHURY','DIPALY BHAKTA','অনুস্কা চৌধুরী','পংকজ  চৌধুরী','দিপালী ভক্ত','FEMALE','2030-08-13','20133515179901149','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742729987','5A8','5/8.jpg',NULL,NULL,NULL,15,0,'0'),(54,5,'Class Five','A',9,'BARNALI SEN','SHYAMAL CHANDRA SEN','NUPUR RANI DATTA','বর্ণালী সেন','শ্যামল চন্দ্র সেন','নুপুর রানী দত্ত','FEMALE','2031-12-13','20133522504049704','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801921845716','5A9','5/9.jpg',NULL,NULL,NULL,13,0,'0'),(55,7,'Class Seven','A',1,'ANISA BUSHRA','MD ANISUR RAHMAN','NISHAT SULTANA','আনিসা বুশরা','মোঃ আনিসুর রহমান','নিশাত সুলতানা','FEMALE','2012-04-26','20123514313036255','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801580772922','7A1','7/1.jpg',NULL,NULL,NULL,6,0,'0'),(56,7,'Class Seven','A',10,'UTSAB SARKAR JOY','UJJAL SARKAR','SANTANA RAY','উৎসব সরকার জয়','উজ্জল সরকার','শান্তনা রায়','MALE','2011-02-01','20113522501049933','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801917572501','7A10','7/10.jpg',NULL,NULL,NULL,26,0,'0'),(57,7,'Class Seven','A',11,'MD AHAD MUNSHI','MD. RASEL MUNSHI','MAHMUDA BEGUM','মোঃ আহাদ মুন্সী','মোঃ রাসেল মুন্সী','মাহমুদা বেগম','MALE','2012-03-20','20113522501065685','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801840563320','7A11','7/11.jpg',NULL,NULL,NULL,25,0,'0'),(58,7,'Class Seven','A',12,'MD. ABIR MUNSHI','MD. AHID MUNSHI','SALINA AKTER','','','','MALE','2011-08-01','20113522501044261','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703570947','7A12','7/12.jpg',NULL,NULL,NULL,42,2,'0'),(59,7,'Class Seven','A',13,'KAZI MOKARAM','KAZI NURUL ALOM','ZAKIA BEGUM','কাজী মোকারম','কাজী নুরুল আলম','মোসাঃ জাকিয়া বেগম','MALE','1969-12-31','20126512879001832','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745886248','7A13','7/13.jpg',NULL,NULL,NULL,21,0,'0'),(60,7,'Class Seven','A',14,'MD . SIFAT MOLLA','MD. MASUD RANA','PARFI BEGUM','মোঃ সিফাত  মোল্লা','মো: মাসুদ রানা','পারফি বেগম','MALE','2012-01-09','20123514367012502','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801743629425','7A14','7/14.jpg',NULL,NULL,NULL,4,0,'0'),(61,7,'Class Seven','A',15,'TANVEER RAHMAN ZHELAN','ASHIQUR RAHMAN','MST. TANIA RAHMAN TANNI','তানভীর রহমান ঝিলন','আশিকুর রহমান','মিসেস তানিয়া রহমান তন্নী','MALE','2011-07-25','20113522508059220','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801312542009','7A15','7/15.jpg',NULL,NULL,NULL,51,5,'0'),(62,7,'Class Seven','A',16,'JAMIL HOSSAIN MUNSHI','TULU MUNSHI','SHAHANARA BEGUM','জামিল হোসেন মুন্সী','টুলু মুন্সী','শাহানারা বেগম','MALE','2012-01-01','20123513238022839','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801749324060','7A16','7/16.jpg',NULL,NULL,NULL,8,0,'0'),(63,7,'Class Seven','A',17,'MD. ABDULLAH','NAJRUL ISLAM','SULTANA','মোঃ আব্দুল্লাহ','নজরুল  ইসলাম','সুলতানা','MALE','2010-11-08','20103514374020481','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801942723983','7A17','7/17.jpg',NULL,NULL,NULL,49,4,'0'),(64,7,'Class Seven','A',18,'MD. SAKIRUL ISLAM','MD. SHAFIQUL ISLAM','AZZNIN SRYTI','মোঃ সাকিরুল ইসলাম','মোঃ শফিকুল ইসলাম','আজনীন স্মৃতি','MALE','2010-09-29','20102713031041398','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745549296','7A18','7/18.jpg',NULL,NULL,NULL,15,0,'0'),(65,7,'Class Seven','A',19,'AL SOHAIL CHOWDHURY','ALI AKBOR CHOWDHURY','MAHMUDA CHOWDHURY','আল সোহাইল চৌধুরী','আলী আকবার চৌধুরী','মাহমুদা চৌধুরী','MALE','2012-04-06','20123513221013801','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801733123869','7A19','7/19.jpg',NULL,NULL,NULL,17,0,'0'),(66,7,'Class Seven','A',2,'WILSON BANARJEE','MONOTOSH BANARJEE','ELIZABETH BANARJEE','উইলসন ব্যানার্জী','মনোতোষ ব্যানার্জী','এলিজাবেথ ব্যানার্জী','MALE','2011-01-27','20113515844027847','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801715256966','7A2','7/2.jpg',NULL,NULL,NULL,2,0,'0'),(67,7,'Class Seven','A',20,'MD. FAIM MUNSHI','EMDADUL HOQUE','NABILA KHANAM','মো:ফাইম মুন্সী','ইমদাদুল হক','নাবিলা খানম','MALE','2011-12-17','20113513238021678','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801795639566','7A20','7/20.jpg',NULL,NULL,NULL,5,0,'0'),(68,7,'Class Seven','A',21,'TASIN MOLLA','MOHAMMAD GIAS UDDIN','LAKI BEGUM','তাছিন মোল্যা','মোহাম্মদ গিয়াস উদ্দিন','লাকী বেগম','MALE','2012-06-09','20123513217020750','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737404132','7A21','7/21.jpg',NULL,NULL,NULL,38,1,'0'),(69,7,'Class Seven','A',22,'MD. ANDALIB RAHMAN','MD. MOFIZUR RAHMAN','MORSHEDA AFROZE','মো: আন্দালিব রহমান','মোঃ মফিজুর রহমান','মোরশেদা আফরোজ','MALE','2012-08-21','20123513269022668','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801989394968','7A22','7/22.jpg',NULL,NULL,NULL,35,1,'0'),(70,7,'Class Seven','A',23,'PRIONTY BINTEY HADI','FAKIR MD. HADIUZZAMAN','MONALISA RAHMAN','প্রিয়ন্তী  বিনতে হাদি','ফকির মো: হাদিউজ্জামান','মোনালিসা রহমান','FEMALE','2011-06-07','20110113410101005','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801671405272','7A23','7/23.jpg',NULL,NULL,NULL,28,0,'0'),(71,7,'Class Seven','A',24,'MD HANJALA MUNSHI','MUNSHI JAMIR HOSAIN','JEASMENA BEGUM','মোঃ হানজালা মুন্সী','মুন্সী জমির হোসেন','জেসমিনা বেগম','MALE','2011-12-20','20113515131621381','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801303688394','7A24','7/24.jpg',NULL,NULL,NULL,37,1,'0'),(72,7,'Class Seven','A',25,'NAFIZ KHAN','RAHAMOT ALI','LIMA BEGUM','নাফিজ খান','রহমত আলী','লিমা বেগম','MALE','2012-01-05','20123513234025421','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801974822842','7A25','7/25.jpg',NULL,NULL,NULL,36,1,'0'),(73,7,'Class Seven','A',26,'RUDRO BHOUMIK','VANJAN BHOUMIK','SIMA BHOUMIK','রুদ্র ভৌমিক','ভঞ্জন ভৌমিক','সীমা ভৌমিক','MALE','2011-12-10','20113522503047990','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801937144902','7A26','7/26.jpg',NULL,NULL,NULL,50,5,'0'),(74,7,'Class Seven','A',27,'SAGNICK BISWAS','SUNIRMAL BISWAS','BITHIKA MONDAL','সাগ্নিক বিশ্বাস','সুনির্মল বিশ্বাস','বিথীকা মন্ডল','MALE','2011-10-10','20113522505073761','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719177071','7A27','7/27.jpg',NULL,NULL,NULL,12,0,'0'),(75,7,'Class Seven','A',28,'OVIRUP BISWAS ARKO','SANJAY BISWAS','PAPIYA BISWAS','অভীরুপ বিশ্বাস অর্ক','সনজয় বিশ্বাস','পাপিয়া বিশ্বাস','MALE','2011-03-10','20112692510649773','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721976052','7A28','7/28.jpg',NULL,NULL,NULL,58,10,'0'),(76,7,'Class Seven','A',29,'GOLAM ASHIKUR RAHMAN KHAN','GOLAM ROSUL KHAN','AYESHA AKTER','গোলাম আশিকুর রহমান খাঁন','গোলাম রসুল খান','আয়শা আক্তার আশা','MALE','2011-12-31','20113519119024909','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719120309','7A29','7/29.jpg',NULL,NULL,NULL,27,0,'0'),(77,7,'Class Seven','A',3,'TONIMA ZAMAN','KHALADUZZAMAN TONU','KAJOL','তনিমা জামান','খালেদুজ্জামান তনু','কাজল','FEMALE','2011-05-28','20113522509048094','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712171430','7A3','7/3.jpg',NULL,NULL,NULL,53,9,'0'),(78,7,'Class Seven','A',30,'MD SAFOAN HOSSAIN','FAKRUL ALAM MOLLA','MAHAMUDA KATUN','মোঃ সাফোয়ান হোসেন','ফকরুল আলম মোল্লা','মাহমুদা খাতুন','MALE','2010-12-17','20103522508058173','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710810422','7A30','7/30.jpg',NULL,NULL,NULL,32,1,'0'),(79,7,'Class Seven','A',31,'SAAD AHMED CHOWDHURY','MD MOHIBUR RAHMAN CHOWDHURY','SHULI KHANOM','সাদ আহমেদ চৌধুরী','মো: মহিবুর রহমান চৌধুরী','শিউলী খানম','MALE','2011-12-30','20113513269027047','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718501626','7A31','7/31.jpg',NULL,NULL,NULL,7,0,'0'),(80,7,'Class Seven','A',32,'SM TAHMID TAHA','S.M OBAYDUR RAHMAN','MST. BILKIS SIDDIKA','এস,এম তাহমিদ তাহা','এস,এম ওবায়দুর রহমান','মোছাঃ বিলকিস সিদ্দিকা','MALE','2012-03-24','20123513234021485','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747867310','7A32','7/32.jpg',NULL,NULL,NULL,18,0,'0'),(81,7,'Class Seven','A',33,'JARIF CHOWDHURY','ANISUR RAHMAN CHOWDHURY','SULTANA RAZIA','জারিফ  চৌধুরী','আনিচুর রহমান   চৌধুরী','সুলতানা রাজিয়া','MALE','2010-09-10','20103513221018144','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754330417','7A33','7/33.jpg',NULL,NULL,NULL,3,0,'0'),(82,7,'Class Seven','A',34,'MS TASNIM AKTER DINA','MD. TORIKUL ISLAM','LATHIFA KHANOM','মোছাঃ তাছনীম আক্তার দীনা','মোঃ তরিকুল ইসলাম','মোছাঃ লতিফা খানম','FEMALE','2011-11-30','20110115685100061','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801738949444','7A34','7/34.jpg',NULL,NULL,NULL,56,10,'0'),(83,7,'Class Seven','A',35,'ARDHO DAS','PANKAJ KUMER DAS','PIKGKI RANI DAS','আর্ধ দাস','পংকজ কুমার দাস','পিংকি রানী দাস','MALE','2012-12-20','20123515861120032','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704667627','7A35','7/35.jpg',NULL,NULL,NULL,20,0,'0'),(84,7,'Class Seven','A',36,'MD SHOHAD SHEIKH','MD MAHABUB SHEIKH','PUSHA BEGUM','মো ছোহাদ  শেখ','মো মাহাবুব শেখ','পোশা বেগম','MALE','2009-05-12','20123513247048493','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801779493391','7A36','7/36.jpg',NULL,NULL,NULL,31,1,'0'),(85,7,'Class Seven','A',37,'ARAFAT HOSEN','HABIBUR RAHMAN KHAN','KAKOLI BEGUM','আরাফাত হোসেন','মৃত:হাবিবুর রহমান খান','মৃত:কাকলি বেগম','MALE','2011-12-01','20113513294014918','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801929530831','7A37','7/37.jpg',NULL,NULL,NULL,30,0,'0'),(86,7,'Class Seven','A',38,'RAHUL BAIDYA','ROBIN BAIDYA','TULI BISWAS','রাহুল বৈদ্য','রবিন বৈদ্য','তুলি বিশ্বাস','MALE','2003-04-11','20113522503051708','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801827193250','7A38','7/38.jpg',NULL,NULL,NULL,40,2,'0'),(87,7,'Class Seven','A',39,'AMMAN KHAN','MD. AMINUR RAHAMAN','MASUMA AKTER RUMA','আম্মান খান','মোঃ আমিনুর রহমান','মাসুমা আক্তার  রুমা','MALE','2012-04-19','20123522503055786','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726704976','7A39','7/39.jpg',NULL,NULL,NULL,1,0,'0'),(88,7,'Class Seven','A',4,'MD RADIM RAHAMAN','MD.MASTAFIZUR RAHAMAN','MST. MONIRA SULTANA','মো: রাদিম রহমান','মো: মোস্তাফিজুর রহমান','মোসা: মনিরা সুলতানা','MALE','2013-01-01','20136512815916859','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801677988474','7A4','7/4.jpg',NULL,NULL,NULL,59,10,'0'),(89,7,'Class Seven','A',40,'YASIN HAMID TALUKDAR','MD FARUK HOSSAIN TALUKDAR','TANIA TALUKDAR','ইয়াছিন হামিদ তালুকদার','মোঃ ফারুক হোসেন তালুকদার','তানিয়া তালুকদার','MALE','2011-03-21','20116794413308016','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672600934','7A40','7/40.jpg',NULL,NULL,NULL,44,2,'0'),(90,7,'Class Seven','A',41,'JABED SARWAR','MOLLAH MD HUMAYUN KABIR SENTU','LABONY BEGUM','জাবেদ সরোয়ার','মোল্লা মোঃ হুমায়ুন কবীর সেন্টু','লাবনী বেগম','MALE','2002-08-11','20113522501058204','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737022066','7A41','7/41.jpg',NULL,NULL,NULL,46,3,'0'),(91,7,'Class Seven','A',42,'MST NUSRAT JAHAN LABONNO','NUR MOHAMMAD MOLLA','SONIA KHANAM','মোসাঃ নুসরাত জাহান লাবন্য','নুর মোহাম্মাদ মোল্লা','সোনিয়া খানম','FEMALE','2022-11-11','20112692525485103','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801791434848','7A42','7/42.jpg',NULL,NULL,NULL,14,0,'0'),(92,7,'Class Seven','A',43,'TASHFYA RAHMAN','ASHIKUR RAHMAN','METHILA','তাসফিয়া রহমান','আশিকুর রহমান','মিথিলা','FEMALE','2012-06-01','20123513256024473','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732493032','7A43','7/43.jpg',NULL,NULL,NULL,39,2,'0'),(93,7,'Class Seven','A',44,'SADIQUR RAHMAN ATIK','HABIBUR RAHAMAN','SABIKUN NAHAR','সাদিকুর রহমান আতিক','হাবিবুর রহমান','ছাবিকুন নাহার','MALE','2024-01-13','20133522505058362','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801740676843','7A44','7/44.jpg',NULL,NULL,NULL,23,0,'0'),(94,7,'Class Seven','A',45,'JAMILA JANNAT BARSHA','MHAMMAD JAMAL MIA','MST. RABEYA KHANOM','জামিলা জান্নাত বর্ষা','মোহাম্মদ জামাল মিয়া','মোসাঃ রাবেয়া খানম','FEMALE','2013-08-11','20113514327027473','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801769263509','7A45','7/45.jpg',NULL,NULL,NULL,55,10,'0'),(95,7,'Class Seven','A',46,'SIAM HOSSAIN','DELOWAR HOSSAIN','TANGILA BEGUM','মোঃ সিয়াম হোসেন','মোঃ দেলোয়ার হোসেন','তানজিনা বেগম','MALE','2004-09-09','20096512815023988','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801517369894','7A46','7/46.jpg',NULL,NULL,NULL,54,10,'0'),(96,7,'Class Seven','A',47,'REDWANUL ISLAM RAIYAN','MD BABUL MOLLA','RIPA KHANAM','রেদওয়ানুল ইসলাম রাইয়ান','মোহাম্মদ বাবুল মোল্লা','রিপা খানম','MALE','2011-12-05','20113513217019755','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801927754601','7A47','7/47.jpg',NULL,NULL,NULL,34,1,'0'),(97,7,'Class Seven','A',49,'ARAFAT KHAN ESHAN','HABIBUR RAHMAN','POPY AKTER','আরাফাত খান ইশান','হাবিবুর রহমান','পপি আক্তার','MALE','2012-04-21','20123513260018392','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789787540','7A49','7/49.jpg',NULL,NULL,NULL,29,0,'0'),(98,7,'Class Seven','A',5,'MD MUAJ ALIF','MD.ARSHAD ALI','SUMA AKTER','মোঃ মুআজ আলিফ','মোঃ এরশাদ আলী','সুমা আক্তার','MALE','2010-04-25','20103522509055758','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801623870070','7A5','7/5.jpg',NULL,NULL,NULL,33,1,'0'),(99,7,'Class Seven','A',50,'ROBBANI MOLLA AFRIDI','MOJAMMEL HOQUE MOLLA','MST. SARJINA KHANAM SNIKDHA','মো: রব্বানী মোল্যা আফ্রিদী','মোজাম্মেল হক মোল্লা','মোছাঃ সারজিনা খানম স্নিগ্ধা','MALE','2011-01-01','20113513238025044','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737362808','7A50','7/50.jpg',NULL,NULL,NULL,16,0,'0'),(100,7,'Class Seven','A',51,'ABDULLA AL JABER','MD. FAZLUL HAQUE','TANIA KHANAM','আব্দুল্লাহ আল জাবের','মোঃ ফজলুল হক','তানিয়া খানম','MALE','1969-12-31','20103522507055164','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739132643','7A51','7/51.jpg',NULL,NULL,NULL,57,10,'0'),(101,7,'Class Seven','A',53,'MD. TANVIR RAHMAN','MD. KHALEDUR RAHMAN','JAMILA KHATUN','মোঃ তানভীর রহমান।','মোঃ খালেদুর রহমান।','জামিলা খাতুন।','MALE','2011-08-25','20114114711815904','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913890360','7A53','7/53.jpg',NULL,NULL,NULL,9,0,'0'),(102,7,'Class Seven','A',54,'RAIYAN AHMAD','MD NASIM UDDIN','ASMA PARVIN','রাইয়ান আহমদ','মোঃ নাছিম উদ্দিন','আসমা পারভীন','MALE','2010-10-18','20103522509042239','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801791434862','7A54','7/54.jpg',NULL,NULL,NULL,13,0,'0'),(103,7,'Class Seven','A',55,'SHOUROV SARKAR','GOLAK SARKAR','MANIKA SARKAR','সৌরভ সরকার','গোলক সরকার','মনিকা সরকার','MALE','2011-12-31','20113522502053417','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801315979832','7A55','7/55.jpg',NULL,NULL,NULL,47,3,'0'),(104,7,'Class Seven','A',56,'S M RAIHAN SADIK','ABDUR RAHMAN','MARINA RAHMAN','এস. এম. রাইহান সাদিক','আব্দুর রহমান','মেরীনা রহমান','MALE','2011-09-05','20113522507057732','0','0','Vill: 189, chandmari road, mohammad paraPOST: Gopalganj Sadar THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801717006404','7A56','7/56.jpg',NULL,NULL,NULL,45,3,'0'),(105,7,'Class Seven','A',57,'SUVRO DAM','SUMON KUMAR DAM','SATABDE RANI SEN','শুভ্র দাম','সুমন কুমার দাম','শতাব্দী রানী সেন','MALE','2011-06-29','20110110817104355','0','0','Vill: POST:  THANA:  ---  DISTRICT: Bagerhat','8801715538766','7A57','7/57.jpg',NULL,NULL,NULL,19,0,'0'),(106,7,'Class Seven','A',58,'MD. AZIZUL HAQUE','MD AKHTER ALI','SALMA BEGUM','মোঃ আজিজুল হক','মোঃ আক্তার আলী','সালমা বেগম','MALE','2012-01-01','20122692503558422','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724566078','7A58','7/58.jpg',NULL,NULL,NULL,10,0,'0'),(107,7,'Class Seven','A',6,'KHADIJATUL COBRA','MD. ABUL KHAYER SHAIKH','TASLIMA KHAITUN','খাদিজাতুল কোবরা','মোঃ আবুল খায়ের শেখ','তাছলিমা খাতুন','FEMALE','2011-06-29','20113522509066508','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725239883','7A6','7/6.jpg',NULL,NULL,NULL,43,2,'0'),(108,7,'Class Seven','A',7,'LIKHON MOLLA','MOHAMMED ALI MOLLA','ISMAT ARA KHANAM','লিখন মোল্যা','মোহাম্মদ আলী মোল্যা','ইসমত আরা খানম','MALE','2011-11-05','20113513243018942','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801787551711','7A7','7/7.jpg',NULL,NULL,NULL,48,3,'0'),(109,7,'Class Seven','A',8,'MD.MILON MOLLA','MD DHALA MOLLA','KULSUM BEGUM','মিলন মোল্লা','ধলা মোল্লা','কুলছুম বেগম','MALE','2013-02-03','20133513217022291','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913541390','7A8','7/8.jpg',NULL,NULL,NULL,41,2,'0'),(110,7,'Class Seven','A',9,'SOUMITRA SHILL PRITHIBE','SUJAN KUMAR SHILL','BEAUTY BISWAS','সৌমিত্র শীল পৃথিবী','সুজন কুমার শীল','বিউটি বিশ্বাস','MALE','2012-09-12','20123522508070653','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739117342','7A9','7/9.jpg',NULL,NULL,NULL,11,0,'0'),(111,9,'Class Nine','A',1,'MD. NUR ISLAM FARAZI','MOMREJ FARAZI','RASIDA BEGUM','মোঃ নূর ইসলাম ফরাজী','মোমরেজ ফরাজী','রাশিদা বেগম','MALE','2009-11-25','20093513217019871','0','0','Vill: GOLABARIPOST: BATGRAM THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801311928037','9A1','9/1.jpg',NULL,NULL,NULL,1,0,'0'),(112,9,'Class Nine','A',10,'AYSHA SIDDIKA','ASHIKUL HUQ','KEYA ISLAM','আয়শা সিদ্দিকা','মোঃ আশিকুল হক','কেয়া ইসলাম','FEMALE','2009-06-07','20093522506003459','0','0','Vill: 7. Janata RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801749209353','9A10','9/10.jpg',NULL,NULL,NULL,10,0,'0'),(113,9,'Class Nine','A',12,'MD HAMZA KHAN','NIZAMUL ISLAM KHAN','MST. YESMIN AKHTER POLY','মোঃ হামজা খান','নিজামুল ইসলাম খান','মোসাঃ ইয়াছমিন আখতার পলি','MALE','2010-08-09','20103522504058369','0','0','Vill: 134, College RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801714698861','9A12','9/12.jpg',NULL,NULL,NULL,18,0,'0'),(114,9,'Class Nine','A',13,'NUR-A ROSHNI','MD. NASIR UDDIN MOLLA','MST. LUNA BEGUM','নূর - এ রোশনী','মো: নাসির উদ্দিন মোল্লা','মোসা: লুনা বেগম','FEMALE','2010-01-01','20103513256018495','0','0','Vill: CharmanikdhaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801729743687','9A13','9/13.jpg',NULL,NULL,NULL,20,0,'0'),(115,9,'Class Nine','A',14,'JAKIYA AKTER MARIYA','MAHASIN SIKDER','DALI BEGUM','জাকিয়া আক্তার মারিয়া','মোঃ মহাসিন শিকদার','মোসাঃ ডলি বেগম','FEMALE','2009-10-20','20093522507055061','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928258419','9A14','9/14.jpg',NULL,NULL,NULL,16,0,'0'),(116,9,'Class Nine','A',16,'SHATHI MONI','SAIFUL MOLLA','IRIN BEGUM','সাথী মনি','মোঃ সাইফুল মোল্যা','আইরিন বেগম','FEMALE','2010-10-10','20103522505054980','0','0','Vill: 210, Udayin RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801943500003','9A16','9/16.jpg',NULL,NULL,NULL,22,0,'0'),(117,9,'Class Nine','A',17,'MD. SADIKUR RAHMAN','A. ALIM','MOST. NAZIDA KHATUN','মোঃ সাদিকুর রহমান','আঃ আলীম','মোসাঃ নাজিদা খাতুন','MALE','2010-03-22','20103513211019231','0','0','Vill: POST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801728219238','9A17','9/17.jpg',NULL,NULL,NULL,24,0,'0'),(118,9,'Class Nine','A',19,'SOUMITA HALDER ADITI','JOYDAB HALDER JOY','SABITA OJHA','সৌমিতা হালদার অদিতি','জয়দেব হালদার জয়','সবিতা ওঝা','FEMALE','2010-06-22','20103522509059711','0','0','Vill: MOHAMMADPARAPOST: GOPALGANJ THANA:  ---  DISTRICT: Gopalganj','8801739799883','9A19','9/19.jpg',NULL,NULL,NULL,19,0,'0'),(119,9,'Class Nine','A',2,'MD ABRAR ALAM','MD MEHERUL ALAM','SHAHANA ALAM','মোঃ আবরার আলম','মোঃ মেহেরুল আলম','শাহানা আলম','MALE','2010-12-12','20103522508061903','0','0','Vill: 305, Mohammad ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801778993443','9A2','9/2.jpg',NULL,NULL,NULL,11,0,'0'),(120,9,'Class Nine','A',20,'RAJ ROY','SUVASH ROY','MALA ROY','রাজ রায়','সুবাশ রায়','মালা রায়','MALE','2010-07-24','20103522502052477','0','0','Vill: Shikhdar ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801849860538','9A20','9/20.jpg',NULL,NULL,NULL,29,0,'0'),(121,9,'Class Nine','A',23,'MINHAJ HOSSIN','MD. MORAD HOSSIN','NAHIDA SULTANA','মিনহাজ হোসেন','মোঃ মোরাদ হোসেন','নাহিদা সুলতানা','MALE','2009-12-31','20093514388028614','0','0','Vill: RautkandiPOST: Shajail THANA:  Kashiani  DISTRICT: Gopalganj','8801716019991','9A23','9/23.jpg',NULL,NULL,NULL,23,0,'0'),(122,9,'Class Nine','A',25,'TANZIM AHMED TAJ','SM SHAHJAHAN','TAHERA SULTANA','তানজিম আহমেদ তাজ','এস এম শাহজাহান','তাহিরা সুলতানা','MALE','2010-12-13','20103513269022514','0','0','Vill: PaikkandiPOST: Paikkandi THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716983155','9A25','9/25.jpg',NULL,NULL,NULL,50,9,'0'),(123,9,'Class Nine','A',26,'SHEIKH MUINUL ISLAM MUIN','SHEIKH MOSTAIN BILLAHN','SULTANA','শেখ মইনুল ইসলাম মুইন','শেখ মুস্তাইন বিল্লাহ','সুলতানা','MALE','2011-02-01','20113522502059679','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712801179','9A26','9/26.jpg',NULL,NULL,NULL,36,0,'0'),(124,9,'Class Nine','A',28,'SHEKH MD. ASHRAFUZZAMAN (SHAIKAT)','SHEKH MD. ALIUZZAMAN','MRS. KAMRUNNAHAR','শেখ মো: আশরাফুজ্জামান সৈকত','শেখ মো: আলিউজ্জামান','কামরুন্নাহার','MALE','2011-02-01','20113519176029627','0','0','Vill: PatgatiPOST: Patgati THANA:  Tungipara  DISTRICT: Gopalganj','8801735451104','9A28','9/28.jpg',NULL,NULL,NULL,27,0,'0'),(125,9,'Class Nine','A',29,'AOYN BANIK','ASHIM BANIK','SUSHILA BARAI','অয়ন বনিক','অসীম বনিক','সুশীলা বাড়ৈ','FEMALE','2010-01-01','20103515187100477','0','0','Vill: 129 Khan shaheb Road Bank ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801712922463','9A29','9/29.jpg',NULL,NULL,NULL,37,0,'0'),(126,9,'Class Nine','A',3,'MOOMTAHINA AZAD','MD. SAIFUL KAMAL AZAD','DR. KHALEDA PANNI','মুমতাহিনা আজাদ','মোঃ সাইফুল কামাল আজাদ','ডাঃ খালেদা পান্নী','FEMALE','2008-12-12','20083522507061972','0','0','Vill: 334,POST: Bankpara THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801791604755','9A3','9/3.jpg',NULL,NULL,NULL,5,0,'0'),(127,9,'Class Nine','A',30,'LAMIA ISLAM','IMRAN ALI MOLLA','RUNA BEGUM','লামিয়া ইসলাম','ইমরান আলী মোল্লা','রুনা বেগম','FEMALE','2010-01-16','20103513221010806','0','0','Vill: GobraPOST: Gobra-8100 THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801774466407','9A30','9/30.jpg',NULL,NULL,NULL,40,0,'0'),(128,9,'Class Nine','A',31,'ZIDNI ISLAM MONIRA','MD. MANIR MIA','MOUSUM BEGUM','জিদনী ইসলাম মনিরা','মোঃ মনির মিয়া','মৌসুমী বেগম','FEMALE','2010-01-01','20103522509065308','0','0','Vill: 432-2 Uapzla RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801795774270','9A31','9/31.jpg',NULL,NULL,NULL,41,0,'0'),(129,9,'Class Nine','A',32,'SHIBNATH MAJUMDAR','SATAJIT MAJUMDER','BEAUTY RANI MAJUMDAR','শিবনাথ মজুমদার','সত্যজিৎ মজুমদার','বিউটি রানী মজুমদার','MALE','2009-02-23','20093522509068807','0','0','Vill: NobinbagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801954813720','9A32','9/32.jpg',NULL,NULL,NULL,45,1,'0'),(130,9,'Class Nine','A',33,'SAYED OWAZKURUNI ARNOB','SOYED RAZIBAL ALAM','MISS JUI','সৈয়দ ওয়াজকুরুনী অর্নব','সৈয়দ রাজিবুল আলম','মিস জুই','MALE','2010-01-01','20103513256018511','0','0','Vill: ManikdahPOST: Manikdah THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801772096287','9A33','9/33.jpg',NULL,NULL,NULL,31,0,'0'),(131,9,'Class Nine','A',34,'APURBA MAZUMDER','DURJAYDHAN MAZUMDER','SHIBANI DAS','অপূর্ব মজুমদার','দুর্যোধন মজুমদার','শিবানী দাস','MALE','2009-08-09','20095414031012150','0','0','Vill: Bakchi BariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801714636343','9A34','9/34.jpg',NULL,NULL,NULL,21,0,'0'),(132,9,'Class Nine','A',35,'SANJIDA AKTAR SARMIN','MD. YUSUF ALI','KAMRUN NAHAR KABITA','সানজিদা আক্তার শারমিন','ইউসুফ আলী','কামরুন নাহার কবিতা','FEMALE','2010-10-20','20103522506070172','0','0','Vill: 108/6 Janata RoadPOST: Gopalganj THANA:  ---  DISTRICT: Gopalganj','8801724194323','9A35','9/35.jpg',NULL,NULL,NULL,30,0,'0'),(133,9,'Class Nine','A',37,'ANIK SAMADDAR','ANANDHA SAMADDAR','ARPANA SAMADDAR','অনিক সমদ্দার','আনন্দ সমদ্দার','অর্পনা সমদ্দার','MALE','2010-04-20','20103522509059489','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736333421','9A37','9/37.jpg',NULL,NULL,NULL,35,0,'0'),(134,9,'Class Nine','A',38,'SARMIN SULTANA RITU','ABUL HASAN SHEIKH','MST. SHILPI AKTER','শারমিন সুলতানা রিতু','আবুল হাসান শেখ','শিল্পী আক্তার','FEMALE','2009-05-21','20093522509048980','0','0','Vill: GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801794447605','9A38','9/38.jpg',NULL,NULL,NULL,43,1,'0'),(135,9,'Class Nine','A',4,'HABIBA BINTA MUSA','MD. MUSA KALIMULLA','EYERINE','হাবিবা বিনতে মুসা','মোঃ মুসা কালিমুল্লা','আইরিন','FEMALE','2010-11-20','20103522504063201','0','0','Vill: MeiaparaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801537531781','9A4','9/4.jpg',NULL,NULL,NULL,13,0,'0'),(136,9,'Class Nine','A',40,'ROWMIUL ISLAM SOPNO','SHAFIQUL ISLAM','REHANA SULTANA','রমিউল ইসলাম স্বপ্ন','মোঃ সফিকুল ইসলাম','রেহানা সুলতানা','MALE','2009-07-21','20093522504051037','0','0','Vill: MiahParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801731463653','9A40','9/40.jpg',NULL,NULL,NULL,32,0,'0'),(137,9,'Class Nine','A',41,'SATIRTHA TIKADAR','SANJOY KUMAR TIKADAR','NANDITA BAIRAGI','সতীর্থ টিকাদার','সঞ্জয় কুমার টিকাদার','নন্দিতা বৈরাগী','MALE','2009-12-16','20093519138100910','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801764444377','9A41','9/41.jpg',NULL,NULL,NULL,25,0,'0'),(138,9,'Class Nine','A',42,'SETU BAKCHI','LITON BAKCHI','SHILPI BAKCHI','সেতু বাকচী','লিটন বাকচী','শিল্পী বাকচী','FEMALE','2010-12-25','20103513256022385','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801799380508','9A42','9/42.jpg',NULL,NULL,NULL,12,0,'0'),(139,9,'Class Nine','A',43,'SOUMIK SAHA','SUKUMAR SAHA','MITA RANI SAHA','সৌমিক সাহা','সুকুমার সাহা','মিতা রানী সাহা','MALE','2009-12-15','20083522502047442','0','0','Vill: GobraPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801711283584','9A43','9/43.jpg',NULL,NULL,NULL,51,10,'0'),(140,9,'Class Nine','A',45,'MAZIDUL ISLAM','MD Sahidul Munshi','Afroza Begum','মোঃ মাজিদুল ইসলাম','মো:সাহিদুল মুন্সী','আফরোজা বেগম','MALE','1970-01-01','20113519119022957','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723245256','9A45','9/45.jpg',NULL,NULL,NULL,38,0,'0'),(141,9,'Class Nine','A',46,'MST. MAIMUNA RAHMAN ANIKA','MD. ANISUR RAHMAN','KALI BEGUM','মোছা: মায়মুনা রহমান আনিকা','মো: আনিসুর রহমান','কলি বেগম','FEMALE','2010-02-25','20103513251100039','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801786304508','9A46','9/46.jpg',NULL,NULL,NULL,3,0,'0'),(142,9,'Class Nine','A',47,'BANDHAN BISWAS','MIHIR BISWAS','BINA BISWAS','বন্ধন বিশ্বাস','মিহির বিশ্বাস','বীনা বিশ্বাস','MALE','2010-10-01','20103515855101366','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745975278','9A47','9/47.jpg',NULL,NULL,NULL,39,0,'0'),(143,9,'Class Nine','A',5,'SIMANTA HALDER','PROSANTA HALDER','SHIBANI GAIN','সীমান্ত হালদার','প্রশান্ত হালদার','শিবানী গাইন','MALE','2011-04-02','20113515171881983','0','0','Vill: BedgramPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801718756581','9A5','9/5.jpg',NULL,NULL,NULL,14,0,'0'),(144,9,'Class Nine','A',50,'MD. RIDWANL ISLAM','MD. RAFIQUL ISLAM','MST. MAHBUBA PERVIN','মোঃ রিদওয়ানুল ইসলাম','মোঃ রফিকুল ইসলাম','মোছাঃ মাহবুবা পারভীন','MALE','2008-04-06','20082722808155278','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762155105','9A50','9/50.jpg',NULL,NULL,NULL,33,0,'0'),(145,9,'Class Nine','A',6,'MD. NAIM SHEIKH','AB. HANNAN','TAMA BEGUM','মোঃ নাইম শেখ','আঃ হান্নান','তমা বেগম','MALE','2010-01-17','20103513221016016','0','0','Vill: Poddarer CharPOST: Gobra THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801790305026','9A6','9/6.jpg',NULL,NULL,NULL,6,0,'0'),(146,9,'Class Nine','A',8,'FARHAN ISMAIL','MD. SHAWKAT ALI DARIA','SAMSUN NAHAR BEGUM','ফারহান ইসমাইল','মোঃ শওকত আলী দাড়িয়া','সামছুন নাহার বেগম','MALE','2009-10-06','20093529109100958','0','0','Vill: BORASHI Word: 14POST: Digarkul THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801775897591','9A8','9/8.jpg',NULL,NULL,NULL,4,0,'0'),(147,9,'Class Nine','A',9,'HURAIRA HUMAYUN ZINNIA','MD. HUMAYUN MOLLA','RATNA KHANAM','হুরাইয়া হুমায়ুন জিনিয়া','মো: হুমায়ুন মোল্লা','রত্না খানম','FEMALE','2010-12-15','20103519119017054','0','0','Vill: NobinbagPOST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801744224786','9A9','9/9.jpg',NULL,NULL,NULL,9,0,'0'),(179,0,'Class KG','A',1,'ANWESHA DAS','PROTUL DAS','PAPSI MAITRA','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801743890043','0A1','0/1.jpg',NULL,NULL,NULL,1,0,'0'),(180,0,'Class KG','A',2,'SATVIK ABESH BAIN','SABITABRATA BAIN','NIPA BEPARI','Not Avliable','Not Avliable','Not Avliable','MALE','2020-12-19','0','0','0','Vill: D/1 Medical officesPOST: 250 Bed gere ral Hospital THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801611262728','0A2','0/2.jpg',NULL,NULL,NULL,3,0,'0'),(181,0,'Class KG','A',3,'GULAM RABBI','MD ROFIKUL ISLAM','MORSHEDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2002-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736524181','0A3','0/3.jpg',NULL,NULL,NULL,26,0,'0'),(182,0,'Class KG','A',4,'ABANTI BHADRA','BEDESH BHADRA','MUNMUN SEN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801823616080','0A4','0/4.jpg',NULL,NULL,NULL,36,2,'0'),(183,0,'Class KG','A',5,'MST MORIAM','MD MIJANUR RAHOMAN TALUKDER','FAHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2005-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726574465','0A5','0/5.jpg',NULL,NULL,NULL,2,0,'0'),(184,0,'Class KG','A',6,'MAHMUDUL HASAN CHOWDHURY','SHAHIDUL ISLAM','ALINA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801874437109','0A6','0/6.jpg',NULL,NULL,NULL,8,0,'0'),(185,0,'Class KG','A',7,'SNEHA BISWAS','SUKANTA BISWAS','RATNA MOULICK','Not Avliable','Not Avliable','Not Avliable','MALE','2016-10-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732382688','0A7','0/7.jpg',NULL,NULL,NULL,14,0,'0'),(186,0,'Class KG','A',8,'FAIZA RAHMAN AFRIN','MUNSHI HASIBUR RAHMAN','ISRAT ZAHAN ERIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2013-02-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725001376','0A8','0/8.jpg',NULL,NULL,NULL,7,0,'0'),(187,0,'Class KG','A',9,'BROTOTI SAHA','SREE BIDHAN KUMAR SAHA','TAPASHI SAHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2021-07-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721019240','0A9','0/9.jpg',NULL,NULL,NULL,10,0,'0'),(188,0,'Class KG','A',10,'MD FARHAN MUHTADI','MD ARIFUL ISLAM','MST. FARHANA MOSTARI','Not Avliable','Not Avliable','Not Avliable','MALE','2029-05-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801744348419','0A10','0/10.jpg',NULL,NULL,NULL,16,0,'0'),(189,0,'Class KG','A',11,'JACIKA ISLAM','SHOHIDUL ISLAM','FIROZA AKTER RATREY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2012-04-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801771608542','0A11','0/11.jpg',NULL,NULL,NULL,15,0,'0'),(190,0,'Class KG','A',12,'SWACCHO BHAKTA','RINTU BHAKTA','NITU BAUL','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721869612','0A12','0/12.jpg',NULL,NULL,NULL,9,0,'0'),(191,0,'Class KG','A',13,'BARNITA BISWAS','BIJAY BISWAS','BANASHRI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-06-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736363613','0A13','0/13.jpg',NULL,NULL,NULL,18,0,'0'),(192,0,'Class KG','A',14,'TAWSIN KABIR','MD MASUM BILLAH','MISS. MITA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916429938','0A14','0/14.jpg',NULL,NULL,NULL,23,0,'0'),(193,0,'Class KG','A',15,'ARUSHA SARKER','LET. RAJIB KUMAR SARKER','SIMA DAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2003-05-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789732351','0A15','0/15.jpg',NULL,NULL,NULL,28,0,'0'),(194,0,'Class KG','A',16,'MD AMIR HAMZA','LITON MOLLA','MOKHSENA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2029-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703268854','0A16','0/16.jpg',NULL,NULL,NULL,35,0,'0'),(195,0,'Class KG','A',17,'MD ATIF ARHAM','MD UZZAL MOLLA','ISRAT ARA','Not Avliable','Not Avliable','Not Avliable','MALE','2022-03-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801768373602','0A17','0/17.jpg',NULL,NULL,NULL,32,0,'0'),(196,0,'Class KG','A',18,'ZEBA MALIHA','SHAIKH MOHAMMAD ABU HANIF','MUSLIMA KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801757750106','0A18','0/18.jpg',NULL,NULL,NULL,30,0,'0'),(197,0,'Class KG','A',19,'NUSRAT ZAMAN MIM','SHAIKH MOSTAFA ZAMAN','FARHANA ZAMAN REIA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711939420','0A19','0/19.jpg',NULL,NULL,NULL,31,0,'0'),(198,0,'Class KG','A',20,'ABDULLAH SALEH SHAYAN','DR. MD ABU SALEH','DR. SOHANA SARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2030-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713579016','0A20','0/20.jpg',NULL,NULL,NULL,24,0,'0'),(199,0,'Class KG','A',21,'SHAYONTY BINTEY HADI','FAKIR MD HADIUZZAMAN','MONALISA RAHMAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2007-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672905050','0A21','0/21.jpg',NULL,NULL,NULL,37,2,'0'),(200,0,'Class KG','A',22,'ANISHA TABASSUM','S M RIPON','KHALEDA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2030-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789206001','0A22','0/22.jpg',NULL,NULL,NULL,29,0,'0'),(201,0,'Class KG','A',23,'SHAKE SADAT RAHAMAN SANY','SHAEK MAHABUBUR RAHAMAN SAHEN','MASUMA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2027-09-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966308925','0A23','0/23.jpg',NULL,NULL,NULL,39,3,'0'),(202,0,'Class KG','A',24,'SAYMA HAMID','HAMIDUR RAHMAN MOLLA','ANJU MONOARA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741301443','0A24','0/24.jpg',NULL,NULL,NULL,13,0,'0'),(203,0,'Class KG','A',25,'ZARIN IBTHAZ','KAZI BAHAUDDIN','MAISHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2028-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742217772','0A25','0/25.jpg',NULL,NULL,NULL,12,0,'0'),(204,0,'Class KG','A',26,'KAZI MD USMAN','KAZI NAZMUL ISLAM','KAZI RASHIDA ISLAM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801766747688','0A26','0/26.jpg',NULL,NULL,NULL,38,3,'0'),(205,0,'Class KG','A',27,'NANDINI ADHIKARY','NIPON ADHIKARY','BASONTI BALA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2007-07-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801761648926','0A27','0/27.jpg',NULL,NULL,NULL,27,0,'0'),(206,0,'Class KG','A',28,'ASIYA KHANOM','NOOR MOHAMMAD SHIEK','AMINA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2024-02-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912670319','0A28','0/28.jpg',NULL,NULL,NULL,11,0,'0'),(207,0,'Class KG','A',29,'SAHABA AKTAR VUMI','MD NAHID SHEIKH','LABONI BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2008-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801707759977','0A29','0/29.jpg',NULL,NULL,NULL,34,0,'0'),(208,0,'Class KG','A',30,'SADIYA KHAN','MD SEKENDER KHAN','MONIRA KHATUN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2014-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911414146','0A30','0/30.jpg',NULL,NULL,NULL,22,0,'0'),(209,0,'Class KG','A',31,'SAMMOJIT BISWAS','SUKANTA BISWAS','ELA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2026-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801777897696','0A31','0/31.jpg',NULL,NULL,NULL,20,0,'0'),(210,0,'Class KG','A',32,'PRIVTHIRAJ BISWAS','PAIIOB KANTI BISWAS','MALA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2028-07-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912331799','0A32','0/32.jpg',NULL,NULL,NULL,6,0,'0'),(211,0,'Class KG','A',33,'ANERUDDHO BALA','APURBA BALA','TUMPA PODDER','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801967728117','0A33','0/33.jpg',NULL,NULL,NULL,19,0,'0'),(212,0,'Class KG','A',34,'MAHISA IMROZ ALIA','MD TOUHIDUL ISLAM','UMBIA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2005-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801910437575','0A34','0/34.jpg',NULL,NULL,NULL,33,0,'0'),(213,0,'Class KG','A',35,'MUNSHI TASKIN RAIYAN','MUNSHI ABU SUFIAN','FATEMA KAMRUN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2023-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716142021','0A35','0/35.jpg',NULL,NULL,NULL,25,0,'0'),(214,0,'Class KG','A',36,'TOHERA BINTE REZWAN','MD REZWANUR RAHMAN','SAZIA JANNAH NISHAT','Not Avliable','Not Avliable','Not Avliable','FEMALE','2030-03-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713913404','0A36','0/36.jpg',NULL,NULL,NULL,5,0,'0'),(215,0,'Class KG','A',37,'PROGGA MONI MAJUMDAR','SANJIB KUMAR MAJUMDAR','JAYASHREE SARKAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2006-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742222325','0A37','0/37.jpg',NULL,NULL,NULL,21,0,'0'),(216,0,'Class KG','A',38,'FATIMA AFROZ','FARIDUL ISLAM','RUMA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-03-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704772202','0A38','0/38.jpg',NULL,NULL,NULL,17,0,'0'),(217,0,'Class KG','A',39,'MD.TASFIN RAHMAN','MD. KHALEDUR RAHMAN','JAMILA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-11-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913890360','0A39','0/39.jpg',NULL,NULL,NULL,4,0,'0'),(218,1,'Class One','A',1,'NIHAN BISWAS','BINOY KRISHYNA BISWAS','NIPA RANI BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-03','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801705456072','1A1','1/1.jpg',NULL,NULL,NULL,3,0,'0'),(219,1,'Class One','A',2,'FARHANA ISLAM','MD ZAHIRUL ISLAM','BABLI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-01-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914884884','1A2','1/2.jpg',NULL,NULL,NULL,17,0,'0'),(220,1,'Class One','A',3,'NIBIR KANTI BISWAS','PROKASH KANTI BISWAS','NAMITA RANI MALO','Not Avliable','Not Avliable','Not Avliable','MALE','2017-09-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801715166940','1A3','1/3.jpg',NULL,NULL,NULL,1,0,'0'),(221,1,'Class One','A',4,'RAHMAN ASHFAR JAZIB','S.M. MIZANUR RAHMAN','MST. SHILPI KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711976067','1A4','1/4.jpg',NULL,NULL,NULL,13,0,'0'),(222,1,'Class One','A',5,'MUNTAHA ADIBA','SHAIKH MOHAMMAD ABU HANIF','MUSLIMA KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714961877','1A5','1/5.jpg',NULL,NULL,NULL,10,0,'0'),(223,1,'Class One','A',6,'FAYSAL HOSEN TAJIM','SHARFUZZAMAN SHUJAN','TANJILA EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801310288958','1A6','1/6.jpg',NULL,NULL,NULL,11,0,'0'),(224,1,'Class One','A',7,'MD. AYAN','MD. TAZAMMIL HAQUE','MST. ONU KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914851983','1A7','1/7.jpg',NULL,NULL,NULL,4,0,'0'),(225,1,'Class One','A',8,'SAMPURNA BISWAS','RAMANATH BISWAS','SEEMA BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2018-08-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911702075','1A8','1/8.jpg',NULL,NULL,NULL,5,0,'0'),(226,1,'Class One','A',9,'SANJUKTA BISWAS','RAMANATH BISWAS','SEEMA BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2018-08-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911702075','1A9','1/9.jpg',NULL,NULL,NULL,6,0,'0'),(227,1,'Class One','A',10,'JAGROTO MONDAL SIDDHI','JAPATOSH MONDAL','SHANCHARI SARKER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714940031','1A10','1/10.jpg',NULL,NULL,NULL,21,0,'0'),(228,1,'Class One','A',11,'GAZI MOHAMMED NEHAN','GAZI MOHAMMED MAHBUB','NISHAT LUBNA NIPA','Not Avliable','Not Avliable','Not Avliable','MALE','2917-09-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793265600','1A11','1/11.jpg',NULL,NULL,NULL,18,0,'0'),(229,1,'Class One','A',12,'ALVINA ERA','S.M. RAFIKUL HASAN','JUTHI KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-10-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914503651','1A12','1/12.jpg',NULL,NULL,NULL,20,0,'0'),(230,1,'Class One','A',13,'MAHISA AKTER','MD. HAFIZUR','SONYA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801676699312','1A13','1/13.jpg',NULL,NULL,NULL,8,0,'0'),(231,1,'Class One','A',14,'MIR ABDULLAH AL RAFI','MIR KAMAL HOSSAIN','RESHMA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736575348','1A14','1/14.jpg',NULL,NULL,NULL,25,0,'0'),(232,1,'Class One','A',15,'SAIFAN ISLAM','TANBIRUL ISLAM','OYENDRILA HOSSAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717366402','1A15','1/15.jpg',NULL,NULL,NULL,14,0,'0'),(233,1,'Class One','A',16,'MAISHA KHAN ROZA','SHAFIKUL ISLAM LITON','SABIHA SAFIQ MUNNI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801676885524','1A16','1/16.jpg',NULL,NULL,NULL,31,0,'0'),(234,1,'Class One','A',17,'JANNATUL FERDAUS','MD. JAHIDUL ISLAM','MST. KHURSHID JAHAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-07-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718681932','1A17','1/17.jpg',NULL,NULL,NULL,26,0,'0'),(235,1,'Class One','A',18,'MD. TAHMID JAMIL SHAD','SIKDER SHAFIQUL ISLAM','SHARMIN AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734262932','1A18','1/18.jpg',NULL,NULL,NULL,15,0,'0'),(236,1,'Class One','A',19,'MD. TAMIM MIA','MD. SHAMIM ALI','MST. TARJINA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801302469559','1A19','1/19.jpg',NULL,NULL,NULL,19,0,'0'),(237,1,'Class One','A',20,'FARDIN KARI','ALAM KARI','SONEYA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762882664','1A20','1/20.jpg',NULL,NULL,NULL,36,0,'0'),(238,1,'Class One','A',21,'ANKON MONDAL','NARATTAM MONDAL','SIPRA PATRA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920761424','1A21','1/21.jpg',NULL,NULL,NULL,16,0,'0'),(239,1,'Class One','A',22,'LABIB AL RAIYAN','MD. JUEL MOLLA','RUPALI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801830400320','1A22','1/22.jpg',NULL,NULL,NULL,27,0,'0'),(240,1,'Class One','A',23,'NIROB RAHMATULLAH','RAHMATULLA SAJAL','FARZANA AKTER BRISTY','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801771608767','1A23','1/23.jpg',NULL,NULL,NULL,23,0,'0'),(241,1,'Class One','A',24,'NEHAN NEWAZ RAYEN','MD. TASLIM ARIF','MST. RABEYA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719273886','1A24','1/24.jpg',NULL,NULL,NULL,9,0,'0'),(242,1,'Class One','A',25,'RAKIKA ISLAM','IMRUL BISWAS','AFRINA KABIR MOMOTA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710911019','1A25','1/25.jpg',NULL,NULL,NULL,34,0,'0'),(243,1,'Class One','A',26,'ARIAN JAMAN','MUNSI RAKIBUZZAMAN','FAYAJA AHAMAD MILY','Not Avliable','Not Avliable','Not Avliable','MALE','2016-07-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717606655','1A26','1/26.jpg',NULL,NULL,NULL,29,0,'0'),(244,1,'Class One','A',27,'NAJIFA AKTER','RIPON MOLLA','NURTAJ BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-06-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724280825','1A27','1/27.jpg',NULL,NULL,NULL,32,0,'0'),(245,1,'Class One','A',28,'MD. RAMADAN ISLAM','MD FIRUZ MIAH','AKHI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-03-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801301245436','1A28','1/28.jpg',NULL,NULL,NULL,35,0,'0'),(246,1,'Class One','A',29,'THIRTHO BISWAS','GOBINDA BISWAS','RUPA MAJUMDER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-07-02','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739840394','1A29','1/29.jpg',NULL,NULL,NULL,28,0,'0'),(247,1,'Class One','A',30,'NAZIFA NUR AYRA','KHAN BENZIR AHMED','MST. NASRIN NAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741915333','1A30','1/30.jpg',NULL,NULL,NULL,40,3,'0'),(248,1,'Class One','A',31,'SAYEMA TABASSUM','MUHAMMAD SOHAEL OSSAIN','SABINA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-06-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716146720','1A31','1/31.jpg',NULL,NULL,NULL,41,3,'0'),(249,1,'Class One','A',32,'S M ARDOGAN TAJUDDIN','SARDAR MD MAJBA UDDIN','SELINA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-03-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724794166','1A32','1/32.jpg',NULL,NULL,NULL,24,0,'0'),(250,1,'Class One','A',33,'MD TAHSIN HAQUE','MD ENAMUL HAQUE','MST. TANZINA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-10-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704486239','1A33','1/33.jpg',NULL,NULL,NULL,7,0,'0'),(251,1,'Class One','A',34,'SAMIA ISLAM','MD. RUBUL SHAIKH','MST. SULTANA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793338817','1A34','1/34.jpg',NULL,NULL,NULL,42,3,'0'),(252,1,'Class One','A',35,'TASNIM KHANDAKER','K.M. KHALAFATH ULLAH','NOWREEN NAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-04-08','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801318303547','1A35','1/35.jpg',NULL,NULL,NULL,22,0,'0'),(253,1,'Class One','A',36,'MD. ZARIF BIN MAHMUD','MD. MAHMUD ALAM','ZARINA YASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714596260','1A36','1/36.jpg',NULL,NULL,NULL,12,0,'0'),(254,1,'Class One','A',37,'JUBAYER MIA','MD. HAKIM MIA','JESMIN AKTAR RIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2018-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736538558','1A37','1/37.jpg',NULL,NULL,NULL,33,0,'0'),(255,1,'Class One','A',38,'ADNAN HABIB RAAD','NADIM SIKDER','MAHMUDA PARVIN MUKTA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994018022','1A38','1/38.jpg',NULL,NULL,NULL,30,0,'0'),(256,1,'Class One','A',39,'MUSAYKA TAHA RAHMAN','MIZANUR RAHMAN','SAMIA ZAMAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-04-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801841168278','1A39','1/39.jpg',NULL,NULL,NULL,37,0,'0'),(257,1,'Class One','A',40,'FATEMA AKTER','','','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710000','1A40','1/40.jpg',NULL,NULL,NULL,39,3,'0'),(258,1,'Class One','A',41,'PURNATA MANDAL','KRIPA MANDAL','BINA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801319442259','1A41','1/41.jpg',NULL,NULL,NULL,43,3,'0'),(259,1,'Class One','A',42,'AMRIN RAHMAN SNEHA','','','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725654541','1A42','1/42.jpg',NULL,NULL,NULL,2,0,'0'),(260,1,'Class One','A',43,'LUBDHAK MONDAL','NITTANDU MONDAL','BANNYA HIRA','Not Avliable','Not Avliable','Not Avliable','MALE','2007-11-09','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801720922591','1A43','1/43.jpg',NULL,NULL,NULL,38,1,'0'),(261,2,'Class Two','A',1,'HUMAYRA JANNAT ESHA','MAHAMUDUL ALAM BABUL','SONIA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2020-05-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712030492','2A1','2/1.jpg',NULL,NULL,NULL,3,0,'0'),(262,2,'Class Two','A',2,'NISHAT NUR','MD IMRAN MALLIK','YASMIN KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2008-03-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801318600628','2A2','2/2.jpg',NULL,NULL,NULL,15,0,'0'),(263,2,'Class Two','A',3,'JYOTI BISWAS','JIBAN BISWAS','SUPRIYA MAJUMDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-07-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913986475','2A3','2/3.jpg',NULL,NULL,NULL,2,0,'0'),(264,2,'Class Two','A',4,'MORIOM KABIR TOYA','MD HUMAUN KABIR','SHAMIMA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2001-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737298189','2A4','2/4.jpg',NULL,NULL,NULL,7,0,'0'),(265,2,'Class Two','A',5,'RAISA RAHMAN RIMU','MD HAFIJUR RAHMAN','SAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-04-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719212113','2A5','2/5.jpg',NULL,NULL,NULL,10,0,'0'),(266,2,'Class Two','A',6,'DITIPRIYA MAJUMDER','DIPANKAR MAJUMDER','MUKTA SARKER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801862105314','2A6','2/6.jpg',NULL,NULL,NULL,11,0,'0'),(267,2,'Class Two','A',7,'ANUP SHIKARI','NIRMAL SHIKARI','PINKI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2024-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994046694','2A7','2/7.jpg',NULL,NULL,NULL,18,0,'0'),(268,2,'Class Two','A',8,'FATIN SHAHRIAR KHAN','TAGOR KHAN','AKHI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2003-04-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801797009518','2A8','2/8.jpg',NULL,NULL,NULL,4,0,'0'),(269,2,'Class Two','A',9,'ANISHA MUMTAJ','MAHFUJUL HAQUE','ZANNATUN NAYM','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801730719970','2A9','2/9.jpg',NULL,NULL,NULL,8,0,'0'),(270,2,'Class Two','A',10,'MAHNOOR AFROZ','MD MAHABUBUR RAHMAN','ITI AFROZ BULBUL','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731500731','2A10','2/10.jpg',NULL,NULL,NULL,9,0,'0'),(271,2,'Class Two','A',11,'RAIYAN RAFI','FARIDUL ISLAM','RUMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704772202','2A11','2/11.jpg',NULL,NULL,NULL,5,0,'0'),(272,2,'Class Two','A',12,'SHARIF MAHIR ABSAR','SHAH ALAM SHARIF','TAJMIRA MOSTARI','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732394958','2A12','2/12.jpg',NULL,NULL,NULL,20,0,'0'),(273,2,'Class Two','A',13,'MD ADIYAT RAHMAN TAZBHI','MD MOFIZUR RAHMAN','MORSHADA AFROZ','Not Avliable','Not Avliable','Not Avliable','MALE','2021-11-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729978880','2A13','2/13.jpg',NULL,NULL,NULL,14,0,'0'),(274,2,'Class Two','A',14,'MD JAKARIA SHIKDER','HACEBUR RAHAMAN SIKDER','MST FATIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611954783','2A14','2/14.jpg',NULL,NULL,NULL,21,0,'0'),(275,2,'Class Two','A',15,'MANHA MEHJABEEN','SHAIKH MARUF BILLAH','MOUMITA YEASMIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2005-06-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801792031157','2A15','2/15.jpg',NULL,NULL,NULL,31,3,'0'),(276,2,'Class Two','A',16,'NAZMIN NAHAR','MD NIZAM UDDIN MOLLA','SHUMANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672190167','2A16','2/16.jpg',NULL,NULL,NULL,23,0,'0'),(277,2,'Class Two','A',17,'PROKRITI BISWAS','SUBRATA BISWAS','CHAMPA PODDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801982577122','2A17','2/17.jpg',NULL,NULL,NULL,17,0,'0'),(278,2,'Class Two','A',18,'MOHONA ROY','ASIM KUMAR ROY','MALA BARAI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2028-11-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801918366424','2A18','2/18.jpg',NULL,NULL,NULL,6,0,'0'),(279,2,'Class Two','A',19,'SENEGIDA AFRIN','EMDADUL HAQE MILAN','NAHEDA HAQUE DOLLY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-01-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801621220366','2A19','2/19.jpg',NULL,NULL,NULL,13,0,'0'),(280,2,'Class Two','A',20,'SRIJAN SARKAR','SUJIPTA SARKAR','NANDINI SEN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801748959577','2A20','2/20.jpg',NULL,NULL,NULL,19,0,'0'),(281,2,'Class Two','A',21,'TOKY MOLLA','RAHMAT','TAHAMINA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2004-04-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914920004','2A21','2/21.jpg',NULL,NULL,NULL,25,0,'0'),(282,2,'Class Two','A',22,'NIBIR AVEEK BAIN','SABITABRATA BAIN','NIPA BEPARI','Not Avliable','Not Avliable','Not Avliable','MALE','2002-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611262728','2A22','2/22.jpg',NULL,NULL,NULL,16,0,'0'),(283,2,'Class Two','A',23,'ADITI RAI','BISHAJIT RAI','ANANNA DATTO','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725387204','2A23','2/23.jpg',NULL,NULL,NULL,22,0,'0'),(284,2,'Class Two','A',24,'SAHARA MONI','SHAHA ALAM MOLLA','FARJANA AKTER KEYA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801315980094','2A24','2/24.jpg',NULL,NULL,NULL,26,1,'0'),(285,2,'Class Two','A',25,'MD NAIM','ATHAR MOLLA','MANIRA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-06-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801917637105','2A25','2/25.jpg',NULL,NULL,NULL,32,3,'0'),(286,2,'Class Two','A',26,'MD HASAN','MD MOHASHIN','JONAKI KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801961420989','2A26','2/26.jpg',NULL,NULL,NULL,30,3,'0'),(287,2,'Class Two','A',27,'PROGGA BOSU TILA','TAPOS BOSU','SUCHANDA BASU','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-03-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801844603283','2A27','2/27.jpg',NULL,NULL,NULL,24,0,'0'),(288,2,'Class Two','A',28,'SHREYAN BISWAS','SUNIRMAL BISWAS','BITHIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2017-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712221424','2A28','2/28.jpg',NULL,NULL,NULL,29,2,'0'),(289,2,'Class Two','A',29,'ANUSHKA HIRA','APURBA HIRA','MONE BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960927022','2A29','2/29.jpg',NULL,NULL,NULL,27,1,'0'),(290,2,'Class Two','A',30,'JANNATUL MAWA TASNIA','SARDER RAZOUAN','MEHERUNNESA KHATUN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-01-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911566242','2A30','2/30.jpg',NULL,NULL,NULL,12,0,'0'),(291,2,'Class Two','A',31,'HABIBA AKTER EMI','YASIN MIAH','YEASMIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611847322','2A31','2/31.jpg',NULL,NULL,NULL,33,3,'0'),(292,2,'Class Two','A',32,'MD LABIB UDDIN SABID','MD KHABIR UDDIN','LABONE KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912636213','2A32','2/32.jpg',NULL,NULL,NULL,28,2,'0'),(293,2,'Class Two','A',33,'SAYINTIKA GOLDER','SWAPAN GOLDER','BEAUTY BALA','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756255618','2A33','2/33.jpg',NULL,NULL,NULL,1,0,'0'),(294,3,'Class Three','A',1,'HAFSA AKTER','MASUDUL HAQUE KHAN','HALIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801740876876','3A1','3/1.jpg',NULL,NULL,NULL,2,0,'0'),(295,3,'Class Three','A',2,'AFIA AFRIN MEEM','KAZI SOHEL RANA','TAMANNA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722427691','3A2','3/2.jpg',NULL,NULL,NULL,5,0,'0'),(296,3,'Class Three','A',3,'NAFISA ZAARA','MOHAMMAD MAHBUBUR RAHMAN','HABIBA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732444638','3A3','3/3.jpg',NULL,NULL,NULL,3,0,'0'),(297,3,'Class Three','A',4,'SAMRIN ISLAM','MD ABU SUFIAN','CHADNI SIKDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-09-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801886764456','3A4','3/4.jpg',NULL,NULL,NULL,18,0,'0'),(298,3,'Class Three','A',5,'TAKWA ISLAM','PALASH MIA','RUNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-10-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801326971819','3A5','3/5.jpg',NULL,NULL,NULL,12,0,'0'),(299,3,'Class Three','A',6,'KAZI SHAWAL SHAWON','KAZI IQBAL HOSSAN','SAHINA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-07-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801783380066','3A6','3/6.jpg',NULL,NULL,NULL,6,0,'0'),(300,3,'Class Three','A',7,'ABU TALHA','MD. RAFIUL ISLAM','BITHEE KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801857069100','3A7','3/7.jpg',NULL,NULL,NULL,4,0,'0'),(301,3,'Class Three','A',8,'SAAD MAHMUD','MD AKKAS ALI','SALMA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2016-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731336006','3A8','3/8.jpg',NULL,NULL,NULL,7,0,'0'),(302,3,'Class Three','A',9,'AVIJIT HALDAR','SANJIT KUMAR HALDAR','MONISHA MOZUMDER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734120230','3A9','3/9.jpg',NULL,NULL,NULL,9,0,'0'),(303,3,'Class Three','A',10,'KAZI RADIA AKTER','KAZI ABDUR RAHIM','SAKINA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-07-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801839894080','3A10','3/10.jpg',NULL,NULL,NULL,21,0,'0'),(304,3,'Class Three','A',11,'FARHANA MEHJABIN','MAHAMUDUL HASAN','SHAHINUR KHANUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728550415','3A11','3/11.jpg',NULL,NULL,NULL,14,0,'0'),(305,3,'Class Three','A',12,'AHNAF SALEH AAYAN','DR. MD ABU SALEH','DR. SOHANA SARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713579016','3A12','3/12.jpg',NULL,NULL,NULL,10,0,'0'),(306,3,'Class Three','A',13,'SABIHA ZAMAN RAISA','MD RASEL KHAN','SUMI KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801859133960','3A13','3/13.jpg',NULL,NULL,NULL,13,0,'0'),(307,3,'Class Three','A',14,'POULOMI BHADRA','PORITOSH BHADRA','RUPA DAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-06-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717438618','3A14','3/14.jpg',NULL,NULL,NULL,15,0,'0'),(308,3,'Class Three','A',15,'SRISTY SARKAR','RATAN KUMAR SARKAR','KRISHNA RANI SARKAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-11-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776246736','3A15','3/15.jpg',NULL,NULL,NULL,27,0,'0'),(309,3,'Class Three','A',16,'MAHIM ALI KHAN','MAHAMAD KHA','TANIA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801320597804','3A16','3/16.jpg',NULL,NULL,NULL,17,0,'0'),(310,3,'Class Three','A',17,'PAKHI BISWAS','PARESH BISWAS','SUJALA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-10-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920738658','3A17','3/17.jpg',NULL,NULL,NULL,24,0,'0'),(311,3,'Class Three','A',18,'RAHMAN ABRAR JAHIN','S.M. MIZANUR RAHMAN','MST SHILPI KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-12-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711976067','3A18','3/18.jpg',NULL,NULL,NULL,25,0,'0'),(312,3,'Class Three','A',19,'MAHIRA ISLAM ADREETA','MD. MAHIRUL ISLAM','SINTHIA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-04-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801683953889','3A19','3/19.jpg',NULL,NULL,NULL,8,0,'0'),(313,3,'Class Three','A',20,'ABID HASSEN','JAHID HOSEN','KHALADA PARVIN SUME','Not Avliable','Not Avliable','Not Avliable','MALE','2015-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801706852713','3A20','3/20.jpg',NULL,NULL,NULL,28,0,'0'),(314,3,'Class Three','A',21,'RESUN MOLLAH','NUR MOHAMMAD MOLLAH','RITA PARVIN','Not Avliable','Not Avliable','Not Avliable','MALE','2016-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801735028689','3A21','3/21.jpg',NULL,NULL,NULL,33,0,'0'),(315,3,'Class Three','A',22,'MD. ALI','MD. MAHABUB MOLLA','RUNA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2016-03-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759155675','3A22','3/22.jpg',NULL,NULL,NULL,29,0,'0'),(316,3,'Class Three','A',23,'TURJO BAIDYA','NIRANJAN BAIDYA','ARSTI MADHU','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722274280','3A23','3/23.jpg',NULL,NULL,NULL,31,0,'0'),(317,3,'Class Three','A',24,'HUSSAIN AHMED','MIZANUR RAHMAN','FATEMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801644529988','3A24','3/24.jpg',NULL,NULL,NULL,40,2,'0'),(318,3,'Class Three','A',25,'MD. MASUM SHEKH','SHEKH LABU HOSSAIN','MARUFA','Not Avliable','Not Avliable','Not Avliable','MALE','2014-09-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712162727','3A25','3/25.jpg',NULL,NULL,NULL,35,1,'0'),(319,3,'Class Three','A',26,'TASNIM ISLAM MIMO','AL-MAMUN','SHARIFA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-03-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966314936','3A26','3/26.jpg',NULL,NULL,NULL,42,4,'0'),(320,3,'Class Three','A',27,'ZOBAIDA AKTER EVA','MD ABUL BASHAR SHAIKH','JESMINE AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2014-05-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712651335','3A27','3/27.jpg',NULL,NULL,NULL,32,0,'0'),(321,3,'Class Three','A',28,'SHEIKH SADIK DAIAN','DULAL SHEIKH','SHILPI','Not Avliable','Not Avliable','Not Avliable','MALE','2015-09-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712624828','3A28','3/28.jpg',NULL,NULL,NULL,41,3,'0'),(322,3,'Class Three','A',29,'MD. ZISHAN CHOWDHURY','IMRAN CHOWDHURY','AFROZA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2016-01-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966925138','3A29','3/29.jpg',NULL,NULL,NULL,34,0,'0'),(323,3,'Class Three','A',30,'RAFAYET HOSSAIN RAJA','MOHAMMED MILAD HOSSAIN','NAZNIN SULTANA SHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710963272','3A30','3/30.jpg',NULL,NULL,NULL,45,6,'0'),(324,3,'Class Three','A',31,'ARIYAN DAS ARGHYO','ANUP KUMAR DAS','MITALI SAHA','Not Avliable','Not Avliable','Not Avliable','MALE','2016-03-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712172961','3A31','3/31.jpg',NULL,NULL,NULL,16,0,'0'),(325,3,'Class Three','A',32,'CHAYAN ROY','DIPANKAR ROY','RICKTA MONDOL','Not Avliable','Not Avliable','Not Avliable','MALE','2016-09-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716561667','3A32','3/32.jpg',NULL,NULL,NULL,19,0,'0'),(326,3,'Class Three','A',33,'ARBAD HOSSAIN ANIF','MD. ABDUL ALIM','KHALIDA ADIB','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762612239','3A33','3/33.jpg',NULL,NULL,NULL,23,0,'0'),(327,3,'Class Three','A',34,'SHEIKH MD MAHIR SHAHARIAR','MANIRUZZAMAN SHEIKH','POPY SIKDER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-09-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712613687','3A34','3/34.jpg',NULL,NULL,NULL,20,0,'0'),(328,3,'Class Three','A',35,'NANDINI BISWAS','NABAKUMAR BISWAS','KALPANA MANDOL','Not Avliable','Not Avliable','Not Avliable','FEMALE','2004-05-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737735619','3A35','3/35.jpg',NULL,NULL,NULL,22,0,'0'),(329,3,'Class Three','A',36,'TAIB AL HASAN','RASEL KABIR','MST FARHANA SIDDIKA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756594453','3A36','3/36.jpg',NULL,NULL,NULL,38,1,'0'),(330,3,'Class Three','A',37,'RUPONTY BINTEY HADI','FAKIR MD HADIUZZAMAN','MONALISA RAHMAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-06-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672905050','3A37','3/37.jpg',NULL,NULL,NULL,44,6,'0'),(331,3,'Class Three','A',38,'FATEMA ISLAM','MD TOREKUL ISLAM','SHAHIDA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801727439288','3A38','3/38.jpg',NULL,NULL,NULL,30,0,'0'),(332,3,'Class Three','A',39,'ANISHA AKTER JARI','MD ABUL KHAYER','NAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801687474968','3A39','3/39.jpg',NULL,NULL,NULL,43,5,'0'),(333,3,'Class Three','A',40,'TANZIMA KHAN DHOOA','K.M RAMZAN ALI','MUKTA CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-11-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719149242','3A40','3/40.jpg',NULL,NULL,NULL,39,1,'0'),(334,3,'Class Three','A',41,'UMME AIMAN YEARA','ASADUL ISLAM','SHAYLA ISLAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-02-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','3A41','3/41.jpg',NULL,NULL,NULL,36,1,'0'),(335,3,'Class Three','A',42,'ZAIN ABDULLAH RAFAN','AZHARUL ISLAM','ROKSANA AKHTER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-02-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801727811268','3A42','3/42.jpg',NULL,NULL,NULL,1,0,'0'),(336,3,'Class Three','A',43,'ALIF SHEIKH','HASAN ALI SHEIKH','KHUKU BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2024-03-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756545544','3A43','3/43.jpg',NULL,NULL,NULL,11,0,'0'),(337,3,'Class Three','A',44,'SADNAN SAMI','MD. BADAR MIA','UMMA KULSUM SOPNA','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-31','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801705046448','3A44','3/44.jpg',NULL,NULL,NULL,37,1,'0'),(338,3,'Class Three','A',45,'ADITI GHOSH','SHAROZIT KUMAR GHOSH','MITALI RANI GHOSH','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-06-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801799122796','3A45','3/45.jpg',NULL,NULL,NULL,26,0,'0'),(354,4,'Class Four','A',16,'MOHAMMADULLAH ABRAR','MAMUN KHAN','SAMIRA AKTAR','Not Avliable','Not Avliable','Not Avliable','MALE','2006-09-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801537378644','4A16','4/16.jpg',NULL,NULL,NULL,14,0,'0'),(390,5,'Class Five','A',21,'SAMIA ZAMAN RUHI','MD MONIRUZZAMAN MOLLA','SHAHANAJ PARVIN RATNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-11-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801751444477','5A21','5/21.jpg',NULL,NULL,NULL,18,0,'0'),(393,5,'Class Five','A',24,'MD SALMAN','MD MIJANUUR RAHAMAN','MUSLIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2012-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736556342','5A24','5/24.jpg',NULL,NULL,NULL,25,0,'0'),(394,5,'Class Five','A',25,'SRUTI SAHA','SATTA KUMAR SAHA','RIMPA SAHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-10-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','5A25','5/25.jpg',NULL,NULL,NULL,22,0,'0'),(396,5,'Class Five','A',27,'SAKIB HOSSAIN','MD AROZ ALI','LABANI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726438349','5A27','5/27.jpg',NULL,NULL,NULL,28,6,'0'),(397,5,'Class Five','A',28,'JUNAID RAIYAN','MD AMIR HOSSAIN','REHANA HOSSAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-12-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801915645252','5A28','5/28.jpg',NULL,NULL,NULL,29,6,'0'),(398,5,'Class Five','A',29,'MD. ADIL AHNAF TARIF','MD. MAMUNUR RASHID','MST. NASRIN SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739726374','5A29','5/29.jpg',NULL,NULL,NULL,4,0,'0'),(399,6,'Class Six','A',1,'KAZI MINHAZUL ISLAM','KAZI MIZANUR RAHAMAN','UMMAY KULSUM','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722147495','6A1','6/1.jpg',NULL,NULL,NULL,3,0,'0'),(400,6,'Class Six','A',2,'THEOPHIL GAIN HEAVEN','TOTON GAIN','RIPA MODHU','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801700000000','6A2','6/2.jpg',NULL,NULL,NULL,8,0,'0'),(401,6,'Class Six','A',3,'TANJIR KABIR','RASEL KABIR','MST.FARHANA SIDDIKA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-01-08','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801853000266','6A3','6/3.jpg',NULL,NULL,NULL,38,0,'0'),(402,6,'Class Six','A',4,'KAMOLIKA BALA','DIPANGKAR BALA','GAYATRI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2013-11-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741285352','6A4','6/4.jpg',NULL,NULL,NULL,15,0,'0'),(403,6,'Class Six','A',5,'AREFA HOQUE','MD.ANAWARUL HOQUE','SHAIDA SULTNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2012-06-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712051023','6A5','6/5.jpg',NULL,NULL,NULL,64,10,'0'),(404,6,'Class Six','A',6,'SHEIKH MAHYAN ALAM','SHEIKH SHUDRUL ALAM','JARIN SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734913635','6A6','6/6.jpg',NULL,NULL,NULL,14,0,'0'),(405,6,'Class Six','A',7,'SIKDER MOHAMMOD MASRAFY','RABYUL SIKDER','MUSOMI','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716658595','6A7','6/7.jpg',NULL,NULL,NULL,23,0,'0'),(406,6,'Class Six','A',8,'MD.YEASRIB ENAN','ANAYET HOSEN','EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2013-07-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801798766844','6A8','6/8.jpg',NULL,NULL,NULL,36,0,'0'),(407,6,'Class Six','A',9,'AENAN IBNA MUSA','MD.MUSA KALIMULLA','EYERINE','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801633551098','6A9','6/9.jpg',NULL,NULL,NULL,9,0,'0'),(408,6,'Class Six','A',10,'MD.TAUSIFUL ISLAM','MOLLA MD.HEDAYETULLAH','TAYIABA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801834017970','6A10','6/10.jpg',NULL,NULL,NULL,56,10,'0'),(409,6,'Class Six','A',11,'MD.TAJIM SHEIKH','ANICHUR RAHAMAN','SONIA BEGUM JANI','Not Avliable','Not Avliable','Not Avliable','MALE','2013-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801758338342','6A11','6/11.jpg',NULL,NULL,NULL,53,6,'0'),(410,6,'Class Six','A',12,'RUDRANIL BAIN','RANJAN CHANDRA BAIN','SUBARNA MAITRA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712578166','6A12','6/12.jpg',NULL,NULL,NULL,27,0,'0'),(411,6,'Class Six','A',13,'MUNSI SANY HOSSAIN','MUNSI MESKAT HOSSIN','ROKSHANA KHAN RITA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-07-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801961572633','6A13','6/13.jpg',NULL,NULL,NULL,58,10,'0'),(412,6,'Class Six','A',14,'ABDULLAH BISWAS','BADRUL BISWAS','RUME KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801580988832','6A14','6/14.jpg',NULL,NULL,NULL,60,10,'0'),(413,6,'Class Six','A',15,'SHAJIAT SHAH ISHAN','MUHAMMAD SHAJJATUR RAHAMAN','MAHAMUDA SHARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-05-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711131123','6A15','6/15.jpg',NULL,NULL,NULL,52,4,'0'),(414,6,'Class Six','A',16,'AL MAMUN','TOWHIDUL ISLAM','MST. BALI KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960650140','6A16','6/16.jpg',NULL,NULL,NULL,43,1,'0'),(415,6,'Class Six','A',17,'JOYITA MAHAMUD','MD AL MAHAMUD KHAKI','ABIDA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-07-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711482053','6A17','6/17.jpg',NULL,NULL,NULL,2,0,'0'),(416,6,'Class Six','A',18,'MD NAIMUL ISLAM OVI','MD LELIN MOLLA','NADIRA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2027-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801965887663','6A18','6/18.jpg',NULL,NULL,NULL,25,0,'0'),(417,6,'Class Six','A',19,'CAMIM ISLAM RIFAT','RUBEL SHIKDAR','SAYMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','6A19','6/19.jpg',NULL,NULL,NULL,55,9,'0'),(418,6,'Class Six','A',20,'ABDULLA','KAMRUL BISWAS','SIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801304793452','6A20','6/20.jpg',NULL,NULL,NULL,51,3,'0'),(419,6,'Class Six','A',21,'MUGDHA SARKAR','ANGSHUPATI SARKAR','MANISHA SARKAR','Not Avliable','Not Avliable','Not Avliable','MALE','2022-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745015540','6A21','6/21.jpg',NULL,NULL,NULL,44,1,'0'),(420,6,'Class Six','A',22,'SM NAZMUL HOSSAIN','MAHMUD HOSSAIN SARDER','MOUSUMI KHANAM','এস এম নাজমুল হোসেন','মাহমুদ হোসেন সরদার','মৌসুমী খানম','MALE','2012-10-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723613061','6A22','6/22.jpg',NULL,NULL,NULL,32,0,'0'),(421,6,'Class Six','A',23,'TASNIM AKTER','MD RABIUL HAQUE','CAMELI CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723844127','6A23','6/23.jpg',NULL,NULL,NULL,18,0,'0'),(422,6,'Class Six','A',24,'NUSRAT JAHAN','MD KAYUM MOLLA','MONIRA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2006-08-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801944467457','6A24','6/24.jpg',NULL,NULL,NULL,37,0,'0'),(423,6,'Class Six','A',25,'FAHIM SIKDEE','ISABUL HAQUE SIKDER','LABUNI KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2027-03-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','6A25','6/25.jpg',NULL,NULL,NULL,49,2,'0'),(424,6,'Class Six','A',26,'MD AB HAMID SHEIKH','MD LITU SHEIKH','KHADIJA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2003-07-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960210428','6A26','6/26.jpg',NULL,NULL,NULL,63,10,'0'),(425,6,'Class Six','A',27,'SHEIKH SALMAN JABER','RASHEDUL ISLAM','KAMRUNNAHAR LUCKY','Not Avliable','Not Avliable','Not Avliable','MALE','2014-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801301552483','6A27','6/27.jpg',NULL,NULL,NULL,10,0,'0'),(426,6,'Class Six','A',28,'ANDALIB RAHMAN','SHAGOR AHMED','HALIMA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2029-10-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801608490585','6A28','6/28.jpg',NULL,NULL,NULL,35,0,'0'),(427,6,'Class Six','A',29,'MD MEHARAB HOSSAN','MD MANAN MOLLA','ASMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-10-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801749081291','6A29','6/29.jpg',NULL,NULL,NULL,46,1,'0'),(428,6,'Class Six','A',30,'MD SULTAN MOLLA','MD ZAKIR HOSSAIN','ALEYA PAEVIN','Not Avliable','Not Avliable','Not Avliable','MALE','2023-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801915931289','6A30','6/30.jpg',NULL,NULL,NULL,1,0,'0'),(429,6,'Class Six','A',31,'MD TAUSIF JAHAN','KHANJAHAN ALI SHEIKH','NAZMOON NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2018-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724478846','6A31','6/31.jpg',NULL,NULL,NULL,30,0,'0'),(430,6,'Class Six','A',32,'PEYEL MONDOL','PALASH KUMAR MONDOL','LIPIKA HAJRA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801951536392','6A32','6/32.jpg',NULL,NULL,NULL,22,0,'0'),(431,6,'Class Six','A',33,'ARANYA PODDER TAMAL','MONOJ KUMAR PODDER','JHUNU SARKER','Not Avliable','Not Avliable','Not Avliable','MALE','2013-11-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801310673404','6A33','6/33.jpg',NULL,NULL,NULL,4,0,'0'),(432,6,'Class Six','A',34,'APRON RAY','PROTAP ROY','ARCHANA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2007-09-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916682614','6A34','6/34.jpg',NULL,NULL,NULL,29,0,'0'),(433,6,'Class Six','A',35,'NAYEEF BIN HASAN','MD ABUL HASAN','NASNIN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2001-06-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801990024242','6A35','6/35.jpg',NULL,NULL,NULL,16,0,'0'),(434,6,'Class Six','A',36,'MUSFIKUZZAMAN TASIM','GAJI ASIKUZZAMAN PALASH','NADIRA FERDOUS MUNNI','Not Avliable','Not Avliable','Not Avliable','MALE','2030-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801964074869','6A36','6/36.jpg',NULL,NULL,NULL,41,0,'0'),(435,6,'Class Six','A',37,'PROLOY MONDAL','DOLAL MONDOL','ANAMIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2012-06-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801377939104','6A37','6/37.jpg',NULL,NULL,NULL,47,2,'0'),(436,6,'Class Six','A',38,'TAZNEEM RAHMAN RIDONE','MOLLA MASUDUR RAHMAN','MST BEAUTY KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2008-03-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759296432','6A38','6/38.jpg',NULL,NULL,NULL,42,1,'0'),(437,6,'Class Six','A',39,'MD SABID KHAN','K M SAFIQUL ISLAM','REMA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2021-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726581441','6A39','6/39.jpg',NULL,NULL,NULL,54,9,'0'),(438,6,'Class Six','A',40,'RAFSHAN','ANICH SHEKH','RABITEA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-10-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747377552','6A40','6/40.jpg',NULL,NULL,NULL,40,0,'0'),(439,6,'Class Six','A',41,'SUDARSHAN BHAKTA','SUBRATA KUMAR BHAKTA','LOVELY BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2027-07-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760202295','6A41','6/41.jpg',NULL,NULL,NULL,24,0,'0'),(440,6,'Class Six','A',42,'AREEB AYAAN','MD ASADUZZAMAN KHAN','KHALADA NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2018-02-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717337438','6A42','6/42.jpg',NULL,NULL,NULL,5,0,'0'),(441,6,'Class Six','A',43,'ARAFAT KHAN','SHAHIN KHAN','SALMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801300813900','6A43','6/43.jpg',NULL,NULL,NULL,48,2,'0'),(442,6,'Class Six','A',44,'JARIF NEWAZ ARNOB','EKRAMUL NAWAZ','UPOMA RAHMAN','Not Avliable','Not Avliable','Not Avliable','MALE','2024-01-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801888586307','6A44','6/44.jpg',NULL,NULL,NULL,11,0,'0'),(443,6,'Class Six','A',45,'MUNSHI TASNIM HABIB','MUNSHI ABU SUFIAN','FATEMA KAMRUN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2030-09-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711104396','6A45','6/45.jpg',NULL,NULL,NULL,20,0,'0'),(444,6,'Class Six','A',46,'NAZAT AL SIAM','MD BAHARUL SHEIKH','ANAMIKA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2021-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801308954439','6A46','6/46.jpg',NULL,NULL,NULL,21,0,'0'),(445,6,'Class Six','A',47,'PAPRI BISWAS','SUUBHOSH CHANDRA BISWAS','NAMITA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801979484931','6A47','6/47.jpg',NULL,NULL,NULL,50,3,'0'),(446,6,'Class Six','A',48,'SAMIA RAYHAN','JAHIR RAYHAN PALASH','HAMIDA YEASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2026-04-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801706454263','6A48','6/48.jpg',NULL,NULL,NULL,26,0,'0'),(447,6,'Class Six','A',49,'SAHAD SAMIR','HEROK SORDAR','SABERA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','6A49','6/49.jpg',NULL,NULL,NULL,39,0,'0'),(448,6,'Class Six','A',50,'ARJO MANDAL','UTTAM KUMAR MANDAL','MANGALI HIRA','Not Avliable','Not Avliable','Not Avliable','MALE','2028-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717322224','6A50','6/50.jpg',NULL,NULL,NULL,13,0,'0'),(449,6,'Class Six','A',51,'TAMIM FOKIR','HASAN FOKIR','TANIA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793582091','6A51','6/51.jpg',NULL,NULL,NULL,12,0,'0'),(450,6,'Class Six','A',52,'MD SHAKIB MOLLA','MD BABLUE MOLLA','DALIA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2002-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801794247117','6A52','6/52.jpg',NULL,NULL,NULL,31,0,'0'),(451,6,'Class Six','A',53,'ROJA MONI','MD RAJU AHAMED','SHORIFA AKTER SHILPI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2021-07-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928757995','6A53','6/53.jpg',NULL,NULL,NULL,28,0,'0'),(452,6,'Class Six','A',54,'AHASANUR RAHAMAN','MD WASIKUR RAHAMAN','LUTFUNNAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801720472266','6A54','6/54.jpg',NULL,NULL,NULL,62,10,'0'),(453,6,'Class Six','A',55,'RAYHAN AHMED AORKO','MD MAHAFUJUR RAHAMAN','SUMIYA SOMA','Not Avliable','Not Avliable','Not Avliable','MALE','2002-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801931971192','6A55','6/55.jpg',NULL,NULL,NULL,34,0,'0'),(454,6,'Class Six','A',56,'MD LABIB FAIAZ HOSSAIN','MD SAHADAT HOSSAIN BHUYAN','ABIDA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719902297','6A56','6/56.jpg',NULL,NULL,NULL,61,10,'0'),(455,6,'Class Six','A',57,'SHEIKH ABU HURAYRA ARMAN','ISRAIL KALIM','ESMAT ARA','Not Avliable','Not Avliable','Not Avliable','MALE','2023-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732545360','6A57','6/57.jpg',NULL,NULL,NULL,7,0,'0'),(456,6,'Class Six','A',58,'ABRAR FAHAD SUVRO','MUHAMMAD ENAMUL HAQE','MST. ZAKIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711906014','6A58','6/58.jpg',NULL,NULL,NULL,45,1,'0'),(457,6,'Class Six','A',59,'MOHAMMMAD ILHAM ZAFIR','MD. ANAMUL HOQUE','MAFUZAN','Not Avliable','Not Avliable','Not Avliable','MALE','2012-07-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801730006603','6A59','6/59.jpg',NULL,NULL,NULL,6,0,'0'),(458,6,'Class Six','A',60,'JAYEF MAHMUD','MD. SHARIF MAHMUD','','Not Avliable','Not Avliable','Not Avliable','MALE','2012-09-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801831074047','6A60','6/60.jpg',NULL,NULL,NULL,59,10,'0'),(459,6,'Class Six','A',61,'MD. NAIMUR RAHMAN DURJOY','MD. ZAHID SIKDER','SHAMIMA AKTER SHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-10-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801407132746','6A61','6/61.jpg',NULL,NULL,NULL,33,0,'0'),(460,6,'Class Six','A',63,'SRABON SHEIKH','MD. MONIR HOSSEN','SUMI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-08-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801977384698','6A63','6/62.jpg',NULL,NULL,NULL,57,10,'0'),(508,7,'Class Seven','A',48,'SABIT AL HASAN','MD KHAYRUL ISLAM','SALMIN AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726055891','7A48','7/48.jpg',NULL,NULL,NULL,24,0,'0'),(512,7,'Class Seven','A',52,'MD. KAUCHAR','BELLAL HOSSAIN TALUKDER','NARGIS BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-10-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716470794','7A52','7/52.jpg',NULL,NULL,NULL,52,7,'0'),(519,8,'Class Eight','A',1,'SANCHARY MALAKER','SATYENDRA NATH MALAKER','SHILPI RANI MIRBOR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-10-10','0','0','0','Vill: PanchuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801917263061','8A1','8/1.jpg',NULL,NULL,NULL,3,0,'0'),(520,8,'Class Eight','A',2,'SADIA RAYHAN','ZAHIR RAYHAN PALASH','HAMIDA YESMIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-03-23','0','0','0','Vill: IslambagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801706454263','8A2','8/2.jpg',NULL,NULL,NULL,16,0,'0'),(521,8,'Class Eight','A',3,'LAMIYATUL BARI','GOLAM AZAM','ZUGLUNNAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-08-13','0','0','0','Vill: Comisanar RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801921501338','8A3','8/3.jpg',NULL,NULL,NULL,1,0,'0'),(522,8,'Class Eight','A',4,'NOWSIN JANNAT MITHILA','MD. MAHAMUD ALAM','FARJANA AKTER RUMA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2009-08-18','0','0','0','Vill: Chadmari RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801732200863','8A4','8/4.jpg',NULL,NULL,NULL,14,0,'0'),(523,8,'Class Eight','A',5,'SUSMIT SAM BISWAS','NITISH CHANDRA BISWAS','SUMONA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-31','0','0','0','Vill: 312, Power Hoose RoadPOST: Gopalganj- 8100 THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716020231','8A5','8/5.jpg',NULL,NULL,NULL,6,0,'0'),(524,8,'Class Eight','A',6,'ANUSKA BAIN','AMARENDRA NATH BAIN','KANIKA RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-04-10','0','0','0','Vill: 62/1, PanchuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801759290882','8A6','8/6.jpg',NULL,NULL,NULL,10,0,'0'),(525,8,'Class Eight','A',7,'JOBAYER KHAN','SAGATUL ALOM KHAN SAGIR','MST. MAKSUDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-29','0','0','0','Vill: PachuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801713961300','8A7','8/7.jpg',NULL,NULL,NULL,8,0,'0'),(526,8,'Class Eight','A',8,'ATIF ALAM','BULBUL ALAM','NAZMUNNAHAR BANNA','Not Avliable','Not Avliable','Not Avliable','MALE','2009-07-17','0','0','0','Vill: 312, Bankpara, GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801629988294','8A8','8/8.jpg',NULL,NULL,NULL,35,0,'0'),(527,8,'Class Eight','A',9,'JANNATUL FERDOUS','MD. MONIRUL HAQUE NUTON','ASMA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-12-29','0','0','0','Vill: 154. Islambag, GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801681289864','8A9','8/9.jpg',NULL,NULL,NULL,17,0,'0'),(528,8,'Class Eight','A',10,'GAZI SHAHABUDDIN','GAZI SHEHABUDDIN','SONIA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-15','0','0','0','Vill: 226, ArambaghPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801948600392','8A10','8/10.jpg',NULL,NULL,NULL,23,0,'0'),(529,8,'Class Eight','A',11,'HANJALA','SALIM MIA','SABINA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-01-01','0','0','0','Vill: PolicelinePOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801727319356','8A11','8/11.jpg',NULL,NULL,NULL,27,0,'0'),(530,8,'Class Eight','A',12,'JIBON SARKER','NABO KUMAR SARKER','ITIKA BOSE','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-17','0','0','0','Vill: Gohata KalibariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801729773336','8A12','8/12.jpg',NULL,NULL,NULL,13,0,'0'),(531,8,'Class Eight','A',13,'FARHAN MOLLA','OHID MOLLA','MOMOTAJ BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801308954949','8A13','8/13.jpg',NULL,NULL,NULL,28,0,'0'),(532,8,'Class Eight','A',14,'ANASHUA ANGEL','PRODYOT ROY','ISHITA ROY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-08-27','0','0','0','Vill: 280/2 Binapani Girls School Road BottolaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716355505','8A14','8/14.jpg',NULL,NULL,NULL,9,0,'0'),(533,8,'Class Eight','A',15,'TISHA ISLAM','SELIM MINA','TANIA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-09-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672734150','8A15','8/15.jpg',NULL,NULL,NULL,15,0,'0'),(534,8,'Class Eight','A',16,'NAHIMUL ISLAM','NAZRUL ISLAM','NAFIZA ISLAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-02-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716715851','8A16','8/16.jpg',NULL,NULL,NULL,24,0,'0'),(535,8,'Class Eight','A',17,'APU MANDAL','DIPANKAR MANDAL','APARNA MANDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2006-11-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801907298939','8A17','8/17.jpg',NULL,NULL,NULL,40,0,'0'),(536,8,'Class Eight','A',18,'RAJ MAJUMDER','APURBA MAJUMDER','KONIKA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2012-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801969774510','8A18','8/18.jpg',NULL,NULL,NULL,32,0,'0'),(537,8,'Class Eight','A',19,'AYAN ARAF RAHMAN','AHMED MAHAFUJUR RAHMAN','TANIA','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801967600024','8A19','8/19.jpg',NULL,NULL,NULL,11,0,'0'),(538,8,'Class Eight','A',20,'ZAFEER RAHMAN','ZABIDUR RAHMAN','MAHBUBA RAHMAN','Not Avliable','Not Avliable','Not Avliable','MALE','2010-07-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801991045694','8A20','8/20.jpg',NULL,NULL,NULL,34,0,'0'),(539,8,'Class Eight','A',21,'SHEIKH BODRUL ISLAM','MD ABUL BASHAR SHAIKH','JESMINE AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801972651335','8A21','8/21.jpg',NULL,NULL,NULL,30,0,'0'),(540,8,'Class Eight','A',22,'MD. SIAM HOSSAIN','MD. DELOWAR HOSSAIN','TANZILA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-09-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801517369894','8A22','8/22.jpg',NULL,NULL,NULL,37,0,'0'),(541,8,'Class Eight','A',23,'SM TANVIR ANJUM PARTHIB','S.M. ABUJAR','AYESHA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2011-06-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801877746456','8A23','8/23.jpg',NULL,NULL,NULL,36,0,'0'),(542,8,'Class Eight','A',24,'SAGOR CHOWDHURY','MD. BATCHU HOSSAIN','SHAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801982627569','8A24','8/24.jpg',NULL,NULL,NULL,47,2,'0'),(543,8,'Class Eight','A',25,'RUDRA PROTAP HALDER','PALTON HALDER','DIPA HALDER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722096306','8A25','8/25.jpg',NULL,NULL,NULL,39,0,'0'),(544,8,'Class Eight','A',26,'TASIN SARDER','MIZANUR RAHMAN','FATEMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801644529988','8A26','8/26.jpg',NULL,NULL,NULL,31,0,'0'),(545,8,'Class Eight','A',27,'MUSTASIN SARDAR','MD. ALAMIN SARDER','MST URMI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-02','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756168183','8A27','8/27.jpg',NULL,NULL,NULL,22,0,'0'),(546,8,'Class Eight','A',28,'SURAJ BISWAS','SAROJIT BISWAS','MUKTI SIKDAR','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762789382','8A28','8/28.jpg',NULL,NULL,NULL,41,1,'0'),(547,8,'Class Eight','A',29,'SAMIUL ISLAM','WAHIDUL ISLAM','SABINA YASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801922392068','8A29','8/29.jpg',NULL,NULL,NULL,20,0,'0'),(548,8,'Class Eight','A',30,'ANAN JAMAN','MONIRUZZAMAN','TANIA','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801926539507','8A30','8/30.jpg',NULL,NULL,NULL,29,0,'0'),(549,8,'Class Eight','A',31,'ASADULLAH AL GALIB','MD. WAHIDUR RAHMAN CHOUDHURY','MST. JEUN NAHER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729814100','8A31','8/31.jpg',NULL,NULL,NULL,26,0,'0'),(550,8,'Class Eight','A',32,'SHUAIB KHAN','MD. TOHIDULLAH KHAN','FARDAUSI SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703880089','8A32','8/32.jpg',NULL,NULL,NULL,33,0,'0'),(551,8,'Class Eight','A',33,'PROTIK BISWAS SAIKAT','RANAJIT KUMAR BESWAS','SHIPRA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2011-08-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726008510','8A33','8/33.jpg',NULL,NULL,NULL,5,0,'0'),(552,8,'Class Eight','A',34,'MD. SHARIAR RAHMAN','MD. ABDUR RAHMAN','MST. AYESHA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732188226','8A34','8/34.jpg',NULL,NULL,NULL,7,0,'0'),(553,8,'Class Eight','A',35,'NAIMUL ISLAM','MOHAMMAD KAMRUL ISLAM','SUMAYA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801763816157','8A35','8/35.jpg',NULL,NULL,NULL,18,0,'0'),(554,8,'Class Eight','A',36,'SURAIYA ISLAM','MD. SHAFIQUL ISLAM','MST. SHIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760668889','8A36','8/36.jpg',NULL,NULL,NULL,38,0,'0'),(555,8,'Class Eight','A',37,'MEFTAHUL ISLAM','MD.FORHAD HOSSAN','JAHANARA EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2010-02-05','0','0','0','Vill: Gosher ChorPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801726741150','8A37','8/37.jpg',NULL,NULL,NULL,12,0,'0'),(556,8,'Class Eight','A',38,'HRIDOY SHEIKH','JAHID SHEIKH','SHILPI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737916092','8A38','8/38.jpg',NULL,NULL,NULL,19,0,'0'),(557,8,'Class Eight','A',39,'ABDULLAH AL GALIB','RAFIKUL ISLAM','BOBITA','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712659030','8A39','8/39.jpg',NULL,NULL,NULL,48,3,'0'),(558,8,'Class Eight','A',40,'REJOICE ROY','MICHAEL ROY','LIMA ROY','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712711693','8A40','8/40.jpg',NULL,NULL,NULL,43,1,'0'),(559,8,'Class Eight','A',41,'RIZVI CHOWDHURY','RONY CHOWDHURY','AFROZA CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913742031','8A41','8/41.jpg',NULL,NULL,NULL,42,1,'0'),(560,8,'Class Eight','A',42,'ABDULLAH ALAM ZARIB','MD MORSHED ALAM','RESMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728608650','8A42','8/42.jpg',NULL,NULL,NULL,21,0,'0'),(561,8,'Class Eight','A',43,'JOY MONDAL','GAYANTA KUMAR MANDAL','JHARNA RANI MANDAL','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716701004','8A43','8/43.jpg',NULL,NULL,NULL,25,0,'0'),(562,8,'Class Eight','A',44,'SM ABIR HOSSAN','MOSHIUR RAHAMAN','MUNNI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731137513','8A44','8/44.jpg',NULL,NULL,NULL,46,2,'0'),(563,8,'Class Eight','A',45,'MD: ABU. RAYHAN','MD: EDRISH ALAM SHAKH','RUKSHANA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-09-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801774736325','8A45','8/45.jpg',NULL,NULL,NULL,44,2,'0'),(570,9,'Class Nine','A',7,'ANTU BOSE','Ashish Bose','Lopa Bosu','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801471322141','9A7','9/7.jpg',NULL,NULL,NULL,8,0,'0'),(574,9,'Class Nine','A',11,'AL- RAFI','MOHAMMAD FAYJUL MOLLA','AKLIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718664568','9A11','9/11.jpg',NULL,NULL,NULL,52,10,'0'),(578,9,'Class Nine','A',15,'AMIR HAMJA','RABIUL ISLAM','ROZINA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: GhosercharPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801723740458','9A15','9/15.jpg',NULL,NULL,NULL,17,0,'0'),(581,9,'Class Nine','A',18,'PROTTOY SARKAR','Bishnu Kumar SARKAR','Shapla Rani SARKAR','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','880175231211','9A18','9/18.jpg',NULL,NULL,NULL,7,0,'0'),(584,9,'Class Nine','A',21,'F.M: FAHIM','ABUL KASHEM FAKIR','FARIDA PARVIN KASHEM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-11','0','0','0','Vill: Bagchi BariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801838441377','9A21','9/21.jpg',NULL,NULL,NULL,28,0,'0'),(585,9,'Class Nine','A',22,'MD. RAFIN FAKIR','MD. ZIHAD ALI','LIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-12-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801906205328','9A22','9/22.jpg',NULL,NULL,NULL,42,1,'0'),(587,9,'Class Nine','A',24,'ABRAR FAHIM AVRO','','','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','880174546441','9A24','9/24.jpg',NULL,NULL,NULL,26,0,'0'),(590,9,'Class Nine','A',27,'MD. ARIYAN RAHMAN','Md. Aminur Rahman','Sheoli Aktar','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801755211122','9A27','9/27.jpg',NULL,NULL,NULL,15,0,'0'),(599,9,'Class Nine','A',36,'SAKHILA KHNAM MIM','MD. MODHU SHAKE','SALMA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-12-15','0','0','0','Vill: Char manikdahPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801756453993','9A36','9/36.jpg',NULL,NULL,NULL,48,2,'0'),(602,9,'Class Nine','A',39,'LAMIA ISLAM','IMRAN ALI MOLLA','RUNA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-01-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801609047810','9A39','9/39.jpg',NULL,NULL,NULL,49,8,'0'),(607,9,'Class Nine','A',44,'MASHRAFE CHOWDHURY GYM','OSIKUL ISLAM','MUKTA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: Shnty BagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801642669877','9A44','9/44.jpg',NULL,NULL,NULL,47,1,'0'),(611,9,'Class Nine','A',48,'MD: RABBI','MUTALEB HOSSAIN','MUNNI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-06-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754195792','9A48','9/48.jpg',NULL,NULL,NULL,44,1,'0'),(612,9,'Class Nine','A',49,'LAMICH AKTER','Hasan Ali Sheikh','Khuku Begum','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','88017231122','9A49','9/49.jpg',NULL,NULL,NULL,2,0,'0'),(647,-1,'Class Nursery','A',1,'MIHRAN SAWAAB','FAYSAL AHMED','SHARMIN AKTER SHORNA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-11-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712083703','-1A1','-1/1.jpg',NULL,NULL,NULL,10,0,'0'),(648,-1,'Class Nursery','A',2,'MD RAYHAN ISLAM','SHAFIQUL ISLAM','MORIAM AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2019-04-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724573396','-1A2','-1/2.jpg',NULL,NULL,NULL,7,0,'0'),(649,-1,'Class Nursery','A',3,'MD TAHMID ISLAM TOHA','RABIUL ISLAM','TAYEBA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801763046672','-1A3','-1/3.jpg',NULL,NULL,NULL,3,0,'0'),(650,-1,'Class Nursery','A',4,'NAFIA NOWSHIN','SOHEL RANA','MIM KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716816557','-1A4','-1/4.jpg',NULL,NULL,NULL,9,0,'0'),(651,-1,'Class Nursery','A',5,'AFIA TASNIM','SOHEL RANA','MIM KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2019-07-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716816557','-1A5','-1/5.jpg',NULL,NULL,NULL,8,0,'0'),(652,-1,'Class Nursery','A',6,'ANKAN MANDAL','NIRMAL MANDAL','ANAMIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-06','0','0','0','Vill: SabujbagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716330786','-1A6','-1/6.jpg',NULL,NULL,NULL,1,0,'0'),(653,-1,'Class Nursery','A',7,'TATHOI BISWAS','TAPAN KUMER BISWAS','SREEMOTI HASI RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2019-01-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745532655','-1A7','-1/7.jpg',NULL,NULL,NULL,13,0,'0'),(654,-1,'Class Nursery','A',8,'MD ABRAR FAIYAZ','MD MAHIRUL ISLAM','SINTHIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-06-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801683953889','-1A8','-1/8.jpg',NULL,NULL,NULL,12,0,'0'),(655,-1,'Class Nursery','A',9,'MD JAYAN','MD TAZAMMUL HAQUE','MST ONU KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914851983','-1A9','-1/9.jpg',NULL,NULL,NULL,2,0,'0'),(656,-1,'Class Nursery','A',10,'MD AFIF MOLLA','DIPU MOLLA','SUMONA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729944813','-1A10','-1/10.jpg',NULL,NULL,NULL,11,0,'0'),(657,-1,'Class Nursery','A',11,'SAIM BISWAS','MD TAHIDUL ISLAM BISWAS','JHUMI KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2019-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801640506473','-1A11','-1/11.jpg',NULL,NULL,NULL,6,0,'0'),(658,-1,'Class Nursery','A',12,'JANNATUL TOYA','MD SOHEL RANA','BITHIA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-10-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801778777499','-1A12','-1/12.jpg',NULL,NULL,NULL,5,0,'0'),(659,-1,'Class Nursery','A',13,'ABU BAKKAR MATUBBAR','FARUK MATUBBAR','JOSNA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-10-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801866102979','-1A13','-1/13.jpg',NULL,NULL,NULL,14,3,'0'),(660,-1,'Class Nursery','A',14,'ABDULLA AFFAN','MD SHARIF MAHMUD','MST ZAKIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2018-10-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801831074047','-1A14','-1/14.jpg',NULL,NULL,NULL,15,3,'0'),(661,-1,'Class Nursery','A',15,'TAHMIDUL ISLAM RAFE','MOINUL ISLAM','UMMEA KHADIJA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703644695','-1A15','-1/15.jpg',NULL,NULL,NULL,16,3,'0'),(662,-1,'Class Nursery','A',16,'NUSRAT SHAZAN','OBAIDUL SHAZAN','SHILA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-08-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801834967102','-1A16','-1/16.jpg',NULL,NULL,NULL,17,3,'0'),(663,-1,'Class Nursery','A',17,'SHUVENDRA BISWAS','SUSHIL KUMAR BISWAS','MOLINA RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2024-03-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754414527','-1A17','-1/17.jpg',NULL,NULL,NULL,4,0,'0'),(1634,4,'Class Four','A',33,'Antika Mondal','Gopal Chandra Mondal','Asha Mondal','অন্তিকা মন্ডল','গোপাল চন্দ্র মন্ডলা','আশা মন্ডল','Female','2015-12-07','20153519119027502','7303625011','5513365667','','01642998178','4A33','.',NULL,NULL,NULL,3,0,'0'),(1635,4,'Class Four','A',34,'Md Nuruzzaman Sheikh','Md Reazul Islam','Mst. Taslena','মো: নুরুজ্জামান শেখ','মো: রিয়াজুল ইসলাম','মোছা: তাছলিনা','Male','2013-11-27','20136512815916580','3258367006','6439485159','','01607990520','4A34','.',NULL,NULL,NULL,26,0,'0'),(1636,7,'Class Seven','A',59,'SANJIR RAHMAN','Al Amin','MST. SHAMIMA AKTER DULI','সানজির রহমান','আল আমিন','মোসাঃ সামীমা আক্তার দুলী','MALE','2011-11-26','20113393310008217','0','0','','01607304218','7A59','',NULL,NULL,NULL,22,0,'0'),(1637,8,'Class Eight','A',46,'LOKMAN SHEKH','MD ABUL SHEKH','LIGU BEGUM','LOKMAN SHEKH','MD ABUL SHEKH','LIGU BEGUM','MALE','2009-05-02','0','0','0','N/A','0','8A46','IMG_.png',NULL,NULL,NULL,45,2,'0'),(1638,8,'Class Eight','A',47,'IJTIHAD MUSLEHIN','MOHAMMAD ANISUR RAHMAN','NUR JANNATUL FERDOUS','IJTIHAD MUSLEHIN','MOHAMMAD ANISUR RAHMAN','NUR JANNATUL FERDOUS','MALE','2010-12-16','0','0','0','N/A','0','8A47','IMG_.png',NULL,NULL,NULL,2,0,'0'),(1639,8,'Class Eight','A',48,'MD TAMJID AHMMED TASIN','ANISUR RAHAMAN MOLLA','TAJRIA AKTAR LABONI','মো: তামজীদ আহম্মেদ তাসিন','আনিচুর রহমান মোল্যা','তাজরিয়া আক্তার লাবনী','MALE','2011-07-12','20113513247028502','0','0','GOPALGANJ','0','8A48','',NULL,NULL,NULL,4,0,'0'),(1640,6,'Class Six','A',62,'SUMAIYA AKTAR RUPU','MD ZAHIDUL ISLAM','MERA BEGUM','SUMAIYA AKTAR RUPU','MD ZAHIDUL ISLAM','MERA BEGUM','FEMALE','2010-03-06','0','0','0','N/A','0','6A62','IMG_.png',NULL,NULL,NULL,19,0,'0'),(1641,6,'Class Six','A',64,'MD SHABBIR TALUKDER','MD ABUL HOSSEN','SHARMIN KHANOM','MD SHABBIR TALUKDER','MD ABUL HOSSEN','SHARMIN KHANOM','MALE','2012-11-11','0','0','0','N/A','0','6A64','IMG_.png',NULL,NULL,NULL,17,0,'0'),(1642,9,'Class Nine','A',51,'Abrar Zahin','MD. Alamgir Hossain','Salma Begum','Abrar Zahid','MD. Alamgir Hossain','Salma Begum','MALE','2024-01-01','0','0','0','N/A','0','9A51','IMG_.png',NULL,NULL,NULL,46,1,'0'),(1643,9,'Class Nine','A',52,'Al Nahyan','Hilal Uddin Molla','Tanjira Begum','Al Nahyan','Hilal Uddin Molla','Tanjira Begum','MALE','2010-01-01','0','0','0','N/A','0','9A52','IMG_.png',NULL,NULL,NULL,34,0,'0');
/*!40000 ALTER TABLE `student_2024` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `student_2024` with 463 row(s)
--

--
-- Table structure for table `student_promote`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_promote` (
  `id` int NOT NULL AUTO_INCREMENT,
  `classnumber` int NOT NULL,
  `classname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
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
  `religion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `addmission_id` int DEFAULT NULL,
  `new_roll` int DEFAULT NULL,
  `fail_sub` int DEFAULT NULL,
  `p_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1644 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_promote`
--

LOCK TABLES `student_promote` WRITE;
/*!40000 ALTER TABLE `student_promote` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `student_promote` VALUES (1,4,'Class Four','A',1,'RAKHI BHOWMIC','RANAJIT KUMAR BOWMIC','PROTAP RUDDRO BOSU','রাখি ভৌমিক','রনোজিৎ কুমার ভৌমিক','প্রতাপ রুদ্র বসু','FEMALE','2031-12-14','20143514381034990','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760187575','4A1','4/1.jpg',NULL,NULL,NULL,2,0,'0'),(2,4,'Class Four','A',10,'PUSPITA MAJUMDER','PIGUSH KANTI MAJUMDER','SWAPNA RANI DATTA','পুষ্পিতা মজুমদার','পিযুষ কান্তি মজুমদার','স্বপ্না রানী দত্ত','FEMALE','2025-02-15','20153522509066624','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801761424455','4A10','4/10.jpg',NULL,NULL,NULL,20,0,'0'),(3,4,'Class Four','A',11,'HAFSHA RAHMAN KOTHA','MD HEZBUR RAHMAN PRINCE','RAHIMA AKTAR','হাফসা রহমান কথা','মোঃ হেজবুর রহমান প্রিন্স','রহিমা আক্তার','FEMALE','2022-01-15','20153522501069478','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801768197979','4A11','4/11.jpg',NULL,NULL,NULL,15,0,'0'),(4,4,'Class Four','A',12,'SHEIKH TISAN','SALIM SHEKH','TAMANNA BEGUM','শেখ তিশান','সেলিম শেখ','তামান্না বেগম','MALE','2024-01-15','20143513256019004','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801744662626','4A12','4/12.jpg',NULL,NULL,NULL,16,0,'0'),(5,4,'Class Four','A',13,'MAHIYA MAMUN','AL MAMUN','SHARIFA BEGUM','মাহিয়া  মামুন','আল মামুন','শরিফা বেগম','FEMALE','2019-05-14','20143513269028945','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801627903875','4A13','4/13.jpg',NULL,NULL,NULL,21,0,'0'),(6,4,'Class Four','A',14,'ARAF SHARIF','TARIQUL ISLAM','FATEMA TUZ ZOHARA','আরাফ শরীফ','তারিকুল ইসলাম','ফাতেমা তুজ জোহরা','MALE','2019-05-14','20143522509077377','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776809349','4A14','4/14.jpg',NULL,NULL,NULL,23,0,'0'),(7,4,'Class Four','A',15,'NUSRAT JAHAN','MD JOINUL ABEDIN','SONIA AKTER','নুসরাত জাহান','মোঃ জয়নুল আবেদীন','সোনিয়া আক্তার','FEMALE','2024-08-15','20153522509066517','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994503563','4A15','4/15.jpg',NULL,NULL,NULL,19,0,'0'),(8,4,'Class Four','A',17,'SAMIHA','MD OBYDULLAH','FARJANA HAQUE','সামিহা','মোঃ ওবায়দুল্লাহ','ফারজানা হক','FEMALE','2030-04-16','20163522508065384','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801785035000','4A17','4/17.jpg',NULL,NULL,NULL,11,0,'0'),(9,4,'Class Four','A',18,'ALIA SHORIF','MD MONIRUZZAMAN','JUBEYADA SULTANA','আলিয়া শরীফ','মোঃ মনিরুজ্জামান','জুবাইদা সুলতানা','FEMALE','2013-11-09','20133522508065684','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728310176','4A18','4/18.jpg',NULL,NULL,NULL,24,0,'0'),(10,4,'Class Four','A',19,'ORNIL ROY','OASIM KUMAR ROY','RATNA BISWAS','অর্নিল রায়','অসীম কুমার রায়','রত্না বিশ্বাস','MALE','2015-01-15','20153522509061174','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801864559471','4A19','4/19.jpg',NULL,NULL,NULL,27,0,'0'),(11,4,'Class Four','A',2,'NASUHA BUSHRA','SHAIKH MOHAMMAD ABU HANIF','MUSLIMA KHANOM','নছুহা বুশরা','শেখ মোহাম্মদ আবু হানিফ','মুসলিমা খানম','FEMALE','2015-01-15','20153522507078680','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801757750106','4A2','4/2.jpg',NULL,NULL,NULL,1,0,'0'),(12,4,'Class Four','A',20,'JIM LASKER','MOHABBAT LASKAR','POPIA KHANAM','জীম লস্কার','মোহব্বাত লস্কার','পপিয়া খানম','MALE','2013-07-26','20130115695106160','0','0','BAGERHAT','0','4A20','4/20.jpg',NULL,NULL,NULL,32,6,'0'),(13,4,'Class Four','A',21,'MAHADI HASAN TUR','MD EMRAN MUNSI','MST. RUPA KHANAM','মাহাদি হাসান তূর','মোঃ ইমরান মুন্সী','মোসাঃ রুপা খানম','MALE','2027-12-14','20143514381035075','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759296441','4A21','4/21.jpg',NULL,NULL,NULL,8,0,'0'),(14,4,'Class Four','A',22,'HABIBUR RAHMAN SHEIKH','AL AMIN SHEIKH','NASRIN KHANAM','হাবিবুর রহমান শেখ','আল আমিন শেখ','নাসরিন খানম','MALE','2014-09-15','20153513243020243','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801832697622','4A22','4/22.jpg',NULL,NULL,NULL,29,0,'0'),(15,4,'Class Four','A',23,'NUSRAT TABASSUM','MOLLA MURAD','MAZADA AKTER','নুসরাত তাবাচ্ছুম','মোল্যা মুরাদ','মাজেদা আক্তার','FEMALE','2001-06-14','20143513217024126','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801963884807','4A23','4/23.jpg',NULL,NULL,NULL,12,0,'0'),(16,4,'Class Four','A',24,'NABONITA BISWAS','PALLOB KANTI BISWAS','MALA BISWAS','নবনীতা বিশ্বাস','পল্লব কান্তি বিশ্বাস','মালা বিশ্বাস','FEMALE','2028-04-15','20153513282022687','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912331799','4A24','4/24.jpg',NULL,NULL,NULL,10,0,'0'),(17,4,'Class Four','A',25,'MD SANIM CHOWDHURY','UZZAL MAMUN CHOWDHURY','RAHIMA CHOWDHURY','মোঃ সানীম চৌধুরী','উজ্জল মামুন চৌধুরী','রহিমা  চৌধুরী','MALE','2017-10-14','20143522509058057','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718656581','4A25','4/25.jpg',NULL,NULL,NULL,25,0,'0'),(18,4,'Class Four','A',26,'NAYEEM BIN HASAN','MD ABUL HASAN','NASNIN NAHAN','নাঈম বিন  হাসান','মোঃ আবুল হাসান','নাজনীন নাহার','MALE','2006-04-14','20141813159112337','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801990024242','4A26','4/26.jpg',NULL,NULL,NULL,17,0,'0'),(19,4,'Class Four','A',27,'MD HASNAIN ZABEER AVEEK','MD MONZUR MORSHED','TANJINA AFROZ','মোঃ হাসনাঈন জাবির অভীক','মোঃ মনজুর মোর্শেদ','তানজীনা  আফরোজ','MALE','2011-11-14','20142617272123488','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801980377677','4A27','4/27.jpg',NULL,NULL,NULL,31,6,'0'),(20,4,'Class Four','A',28,'GALPO BISWAS','SANJAY BISSAS','SHILA MONDAL','গল্প বিশ্বাস','সঞ্জয় বিশ্বাস','শিলা বিশ্বাস','MALE','2030-11-14','20143522501069832','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801786930040','4A28','4/28.jpg',NULL,NULL,NULL,4,0,'0'),(21,4,'Class Four','A',29,'ARANYA HIRA','APURBA HIRA','MONI BISWAS','অরন্য হীরা','অপূর্ব হীরা','মনি বিশ্বাস','MALE','2012-01-15','20150115617102178','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960927022','4A29','4/29.jpg',NULL,NULL,NULL,28,0,'0'),(22,4,'Class Four','A',3,'ABDUR RAHIM','MD JAKARIA MOLLA','ALIDA KHANAM','আব্দুর রহিম','মো:জাকারিয়া মোল্লা','এলিদা খানম','MALE','2023-03-14','20140115628103185','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801775899426','4A3','4/3.jpg',NULL,NULL,NULL,34,6,'0'),(23,4,'Class Four','A',30,'NUSNAT RAHMAN','MD BABUL HOSSAIN','SUKHI KHANAM','নুসরাত রহমান','মোঃ বাবুল  হোসেন','সুখী খানম','FEMALE','2025-09-14','20143513221012368','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801788817988','4A30','4/30.jpg',NULL,NULL,NULL,30,1,'0'),(24,4,'Class Four','A',31,'SHADMAN HABIB SAAD','NADIM SHIKDER','MAHMUDA PARVIN MUKTA','শাদমান হাবিব সাদ','নাদিম  সিকদার','মাহমুদা পারভীন মুক্তা','MALE','2015-12-12','20153513247041018','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994018022','4A31','4/31.jpg',NULL,NULL,NULL,22,0,'0'),(25,4,'Class Four','A',32,'SHREYAN MODAK SUMIT','SHAYMAL KUMAR MODAK','SMRITI RANI SARKER','শ্রেয়ান মোদক','শ্যামল কুমার মোদক','স্মৃতি রানী সরকার','MALE','2014-12-08','20144793324042335','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911779705','4A32','4/32.jpg',NULL,NULL,NULL,18,0,'0'),(26,4,'Class Four','A',4,'ISRAT AHMED','SABBIR AHMED','TAPOSI','ইসরাত  আহমেদ','সাব্বির আহম্মেদ','তাপসী','FEMALE','2008-12-15','20153522508077366','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801033223329','4A4','4/4.jpg',NULL,NULL,NULL,7,0,'0'),(27,4,'Class Four','A',5,'ARISHA KHANAM','KHALID HOSSAIN','AKHI AKTER','আরিশা খানম','খালিদ হোসেন','আখি আক্তার','FEMALE','2015-09-14','20143513221014799','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801408146721','4A5','4/5.jpg',NULL,NULL,NULL,13,0,'0'),(28,4,'Class Four','A',6,'ISLAM AHMED JARIF','ABDUS SATTAR MIAH','ASMA AKTER','ইসমাম আহমেদ  জারিফ','আবদুস ছাত্তার মিয়া','আসমা আক্তার','MALE','2001-01-15','20152914739113478','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916817524','4A6','4/6.jpg',NULL,NULL,NULL,9,0,'0'),(29,4,'Class Four','A',7,'FAIJUR RAHMAN','FARUK MATUBBAR','JOSNA','ফাইজুর রহমান','ফারুক মাতুব্বর','জোসনা','MALE','2019-11-14','20142911055105306','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801866102979','4A7','4/7.jpg',NULL,NULL,NULL,33,6,'0'),(30,4,'Class Four','A',8,'MIFTAHUL JANNAT AREBA','MD MIRAZ SHARDER','SHARMIN AKTER','মিফতাহুল জান্নাত আরিবা','মোঃ মিরাজ সরদার','শারমিন আকতার','FEMALE','2005-09-13','20133522509067481','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717810719','4A8','4/8.jpg',NULL,NULL,NULL,5,0,'0'),(31,4,'Class Four','A',9,'SOUMMODIP HALDER','DINABANDHU HALDER','SUMITA SARKER','সৌম্যদ্বীপ হালদার','দীনবন্ধু হালদার','সুমিতা সরকার','MALE','2027-06-14','20143519138103001','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745130323','4A9','4/9.jpg',NULL,NULL,NULL,6,0,'0'),(32,5,'Class Five','A',1,'MD BAYEJID ISLAM','MD JAKIR HOSSIN','HASINA','মোঃ বায়েজিদ ইসলাম','মোঃ জাকির হোসেন','হাচিনা','MALE','2012-12-12','20125422505113561','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716407672','5A1','5/1.jpg',NULL,NULL,NULL,2,0,'0'),(33,5,'Class Five','A',10,'ABDUR RAZZAQUE RAZJO','HARUN AR RASHID BABLU','ZANNATUL FERDOUS','আব্দুর রাজ্জাক রাজ্য','হারুন-অর-রশীদ বাবলু','জান্নাতুল ফেরদৌস','MALE','2008-06-12','20123522503050620','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760200092','5A10','5/10.jpg',NULL,NULL,NULL,7,0,'0'),(34,5,'Class Five','A',11,'FARZAD RAKIB SAMEN','S M RAKIBUL HASAN','FARZANA ISLAM','ফারজাদ রাকিব সামিন','এস এম রকিবুল হাসান','ফারজানা ইসলাম','MALE','2014-06-13','20133522509057413','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716886047','5A11','5/11.jpg',NULL,NULL,NULL,14,0,'0'),(35,5,'Class Five','A',12,'TARIKA TASNIM TARIN','S M OBAYDUR RAHMAN','MST BILKIS SIDDIKA','তারিকা তাসনিম তারিন','এস,এম ওবায়দুর রহমান','মোছাঃ বিলকিস সিদ্দিকা','FEMALE','2024-06-14','20143513234021484','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747867731','5A12','5/12.jpg',NULL,NULL,NULL,20,0,'0'),(36,5,'Class Five','A',13,'NAHOR A JANNAT','S M A REEAZ UDDIN','LAILATUL FERDOUSI','নহর এ  জান্নাত','এস এম এ রিয়াজ উদ্দীন','লায়লাতুল ফেরদৌসী','FEMALE','2009-11-14','20143522507073035','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801937231632','5A13','5/13.jpg',NULL,NULL,NULL,19,0,'0'),(37,5,'Class Five','A',14,'RISHAD SHEIK','A LION SHEIK','ANICHA KHATUN','রিশাদ শেখ','এ লিয়ন শেখ মামুন','আনিছা খাতুন','MALE','2009-09-13','20133513260017541','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801930426292','5A14','5/14.jpg',NULL,NULL,NULL,11,0,'0'),(38,5,'Class Five','A',15,'SHEIKH ESHAD MUNNU','SK ZILLUR RAHMAN','LEMA KHANAM','শেখ ইশাদ মুন্নু','শেখ জিল্লুর রহমান','লিমা খানম','MALE','2006-03-14','20146515218107150','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801777886796','5A15','5/15.jpg',NULL,NULL,NULL,12,0,'0'),(39,5,'Class Five','A',16,'HUSAIN DARIA','NAZMUL','FOZILA KHANAM','হুসাইন দাড়িয়া','নাজমুল','ফজিলা খানম','MALE','2029-12-12','20123513211019032','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721739144','5A16','5/16.jpg',NULL,NULL,NULL,24,0,'0'),(40,5,'Class Five','A',17,'FAIYAZ MOSTAFA WASIF','MD. TANJIDUR RAHMAN','SALEHIN AKTER SHANTA','ফাইয়াজ মোস্তফা ওয়াছিফ','মোঃতানজিদুর রহমান','ছালেহীন আক্তার শান্তা','MALE','2013-08-12','20133522510082178','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713663003','5A17','5/17.jpg',NULL,NULL,NULL,27,0,'0'),(41,5,'Class Five','A',18,'MD SHAHRIAR MOLLA','MD SHAFIKUL ISLAM MANTU','MUSLIMA BEGUM','মোঃ শাহরিয়ার মোল্যা','মোঃ শফিকুল ইসলাম মন্টু','মুসলিমা বেগম','MALE','2024-11-13','20133522507062445','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736147950','5A18','5/18.jpg',NULL,NULL,NULL,26,0,'0'),(42,5,'Class Five','A',19,'RIG SAHA','RIPUN KUMAR','APARNA HALDER','রিগ সাহা','রিপন কুমার সাহা','অপর্না হালদার','MALE','2004-05-13','20133515171886026','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731242011','5A19','5/19.jpg',NULL,NULL,NULL,6,0,'0'),(43,5,'Class Five','A',2,'SWAPNIL BISWAS','SUSHIL BISWAS','SHIULI DAS','স্বপ্নীল বিশ্বাস','সুশীল বিশ্বাস','শিউলী দাস','MALE','2013-10-28','20133522506064729','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801017144523','5A2','5/2.jpg',NULL,NULL,NULL,1,0,'0'),(44,5,'Class Five','A',20,'ANUSKA BANIK','ASHIM BANIK','SUSHILA BARAI','অনুস্কা বনিক','অসীম বনিক','সুশীলা বাড়ৈ','FEMALE','2001-11-13','20133522509066581','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928643923','5A20','5/20.jpg',NULL,NULL,NULL,23,0,'0'),(45,5,'Class Five','A',22,'NAZIFA TABASSUM','HABIBUR RAHMAN','FOUZIA KHANAM','মোসাম্মৎ  নাজিফা তাবাসসুম','মোঃ হাবিবুর রহমান','ফৌজিয়া খানম','FEMALE','2013-09-13','20132610413104380','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801979142463','5A22','5/22.jpg',NULL,NULL,NULL,9,0,'0'),(46,5,'Class Five','A',23,'SURAIYA RAHMAN','MD BABUL HASSAIN','SUKHI KHANAM','সুরাইয়া  রহমান','মোঃ বাবুল  হোসেন','সুখী খানম','FEMALE','2020-11-12','20123513221018480','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801788817988','5A23','5/23.jpg',NULL,NULL,NULL,21,0,'0'),(47,5,'Class Five','A',26,'SHEIKH JAWAD UDDIN','SHEIKH JASIM UDDIN','ROMANA AFAZ','শেখ জাওয়াদ উদ্দীন','শেখ জসীম  উদ্দীন','রোমেনা  আফাজ','MALE','2013-12-26','20130110834106344','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737021310','5A26','5/26.jpg',NULL,NULL,NULL,16,0,'0'),(48,5,'Class Five','A',3,'MD SAFWAT TAWSIF','MD SAIFUL HUDA','MST.NA ZRUN PARVIN','মোঃ সাফওয়াত  তাওসীফ','মোঃ সাইফুল  হুদা','মোসাঃ নজরুন  পারভীন','MALE','2001-01-14','20148714713106594','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776242096','5A3','5/3.jpg',NULL,NULL,NULL,3,0,'0'),(49,5,'Class Five','A',4,'TAJWAR TAHA ISLAM','TARIQUL ISLAM','SHOHELY ISLAM','তাজওয়ার তাহা ইসলাম','তরিকুল ইসলাম','সোহেলী ইসলাম','MALE','2024-05-14','20143519119024829','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801930444513','5A4','5/4.jpg',NULL,NULL,NULL,8,0,'0'),(50,5,'Class Five','A',5,'NAMIRA BINTE KHOBAYEB','KHOBAYEB MOLLA','RUMA BEGUM','নুসরাত জাহান নামিরা','হাফেজ মোঃ খোবায়েব','রুমা সুলতানা','FEMALE','2018-05-14','20143513230021011','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801617504415','5A5','5/5.jpg',NULL,NULL,NULL,5,0,'0'),(51,5,'Class Five','A',6,'IMTIAZ BIN IMRAN','IMRAN HASSAIN TALUKDER','ALEA FARAZI','ইমতিয়াজ বিন ইমরান','ইমরান হোসেন তালুকদার','আলেয়া ফরাজী','MALE','2005-07-15','20133515171889274','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920288819','5A6','5/6.jpg',NULL,NULL,NULL,17,0,'0'),(52,5,'Class Five','A',7,'AFNAN JAHAN ISHA','MD INSHAN KHAN','MAHARUNNSA','আফনান জাহান ইশা','মোঃ ইনছান খান','মেহেরুন্নেছা','FEMALE','2012-11-13','20133522505054471','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801946500420','5A7','5/7.jpg',NULL,NULL,NULL,10,0,'0'),(53,5,'Class Five','A',8,'ANUSKA CHOWDHURY','PANKAJ CHOWDHURY','DIPALY BHAKTA','অনুস্কা চৌধুরী','পংকজ  চৌধুরী','দিপালী ভক্ত','FEMALE','2030-08-13','20133515179901149','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742729987','5A8','5/8.jpg',NULL,NULL,NULL,15,0,'0'),(54,5,'Class Five','A',9,'BARNALI SEN','SHYAMAL CHANDRA SEN','NUPUR RANI DATTA','বর্ণালী সেন','শ্যামল চন্দ্র সেন','নুপুর রানী দত্ত','FEMALE','2031-12-13','20133522504049704','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801921845716','5A9','5/9.jpg',NULL,NULL,NULL,13,0,'0'),(55,7,'Class Seven','A',1,'ANISA BUSHRA','MD ANISUR RAHMAN','NISHAT SULTANA','আনিসা বুশরা','মোঃ আনিসুর রহমান','নিশাত সুলতানা','FEMALE','2012-04-26','20123514313036255','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801580772922','7A1','7/1.jpg',NULL,NULL,NULL,6,0,'0'),(56,7,'Class Seven','A',10,'UTSAB SARKAR JOY','UJJAL SARKAR','SANTANA RAY','উৎসব সরকার জয়','উজ্জল সরকার','শান্তনা রায়','MALE','2011-02-01','20113522501049933','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801917572501','7A10','7/10.jpg',NULL,NULL,NULL,26,0,'0'),(57,7,'Class Seven','A',11,'MD AHAD MUNSHI','MD. RASEL MUNSHI','MAHMUDA BEGUM','মোঃ আহাদ মুন্সী','মোঃ রাসেল মুন্সী','মাহমুদা বেগম','MALE','2012-03-20','20113522501065685','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801840563320','7A11','7/11.jpg',NULL,NULL,NULL,25,0,'0'),(58,7,'Class Seven','A',12,'MD. ABIR MUNSHI','MD. AHID MUNSHI','SALINA AKTER','','','','MALE','2011-08-01','20113522501044261','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703570947','7A12','7/12.jpg',NULL,NULL,NULL,42,2,'0'),(59,7,'Class Seven','A',13,'KAZI MOKARAM','KAZI NURUL ALOM','ZAKIA BEGUM','কাজী মোকারম','কাজী নুরুল আলম','মোসাঃ জাকিয়া বেগম','MALE','1969-12-31','20126512879001832','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745886248','7A13','7/13.jpg',NULL,NULL,NULL,21,0,'0'),(60,7,'Class Seven','A',14,'MD . SIFAT MOLLA','MD. MASUD RANA','PARFI BEGUM','মোঃ সিফাত  মোল্লা','মো: মাসুদ রানা','পারফি বেগম','MALE','2012-01-09','20123514367012502','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801743629425','7A14','7/14.jpg',NULL,NULL,NULL,4,0,'0'),(61,7,'Class Seven','A',15,'TANVEER RAHMAN ZHELAN','ASHIQUR RAHMAN','MST. TANIA RAHMAN TANNI','তানভীর রহমান ঝিলন','আশিকুর রহমান','মিসেস তানিয়া রহমান তন্নী','MALE','2011-07-25','20113522508059220','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801312542009','7A15','7/15.jpg',NULL,NULL,NULL,51,5,'0'),(62,7,'Class Seven','A',16,'JAMIL HOSSAIN MUNSHI','TULU MUNSHI','SHAHANARA BEGUM','জামিল হোসেন মুন্সী','টুলু মুন্সী','শাহানারা বেগম','MALE','2012-01-01','20123513238022839','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801749324060','7A16','7/16.jpg',NULL,NULL,NULL,8,0,'0'),(63,7,'Class Seven','A',17,'MD. ABDULLAH','NAJRUL ISLAM','SULTANA','মোঃ আব্দুল্লাহ','নজরুল  ইসলাম','সুলতানা','MALE','2010-11-08','20103514374020481','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801942723983','7A17','7/17.jpg',NULL,NULL,NULL,49,4,'0'),(64,7,'Class Seven','A',18,'MD. SAKIRUL ISLAM','MD. SHAFIQUL ISLAM','AZZNIN SRYTI','মোঃ সাকিরুল ইসলাম','মোঃ শফিকুল ইসলাম','আজনীন স্মৃতি','MALE','2010-09-29','20102713031041398','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745549296','7A18','7/18.jpg',NULL,NULL,NULL,15,0,'0'),(65,7,'Class Seven','A',19,'AL SOHAIL CHOWDHURY','ALI AKBOR CHOWDHURY','MAHMUDA CHOWDHURY','আল সোহাইল চৌধুরী','আলী আকবার চৌধুরী','মাহমুদা চৌধুরী','MALE','2012-04-06','20123513221013801','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801733123869','7A19','7/19.jpg',NULL,NULL,NULL,17,0,'0'),(66,7,'Class Seven','A',2,'WILSON BANARJEE','MONOTOSH BANARJEE','ELIZABETH BANARJEE','উইলসন ব্যানার্জী','মনোতোষ ব্যানার্জী','এলিজাবেথ ব্যানার্জী','MALE','2011-01-27','20113515844027847','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801715256966','7A2','7/2.jpg',NULL,NULL,NULL,2,0,'0'),(67,7,'Class Seven','A',20,'MD. FAIM MUNSHI','EMDADUL HOQUE','NABILA KHANAM','মো:ফাইম মুন্সী','ইমদাদুল হক','নাবিলা খানম','MALE','2011-12-17','20113513238021678','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801795639566','7A20','7/20.jpg',NULL,NULL,NULL,5,0,'0'),(68,7,'Class Seven','A',21,'TASIN MOLLA','MOHAMMAD GIAS UDDIN','LAKI BEGUM','তাছিন মোল্যা','মোহাম্মদ গিয়াস উদ্দিন','লাকী বেগম','MALE','2012-06-09','20123513217020750','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737404132','7A21','7/21.jpg',NULL,NULL,NULL,38,1,'0'),(69,7,'Class Seven','A',22,'MD. ANDALIB RAHMAN','MD. MOFIZUR RAHMAN','MORSHEDA AFROZE','মো: আন্দালিব রহমান','মোঃ মফিজুর রহমান','মোরশেদা আফরোজ','MALE','2012-08-21','20123513269022668','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801989394968','7A22','7/22.jpg',NULL,NULL,NULL,35,1,'0'),(70,7,'Class Seven','A',23,'PRIONTY BINTEY HADI','FAKIR MD. HADIUZZAMAN','MONALISA RAHMAN','প্রিয়ন্তী  বিনতে হাদি','ফকির মো: হাদিউজ্জামান','মোনালিসা রহমান','FEMALE','2011-06-07','20110113410101005','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801671405272','7A23','7/23.jpg',NULL,NULL,NULL,28,0,'0'),(71,7,'Class Seven','A',24,'MD HANJALA MUNSHI','MUNSHI JAMIR HOSAIN','JEASMENA BEGUM','মোঃ হানজালা মুন্সী','মুন্সী জমির হোসেন','জেসমিনা বেগম','MALE','2011-12-20','20113515131621381','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801303688394','7A24','7/24.jpg',NULL,NULL,NULL,37,1,'0'),(72,7,'Class Seven','A',25,'NAFIZ KHAN','RAHAMOT ALI','LIMA BEGUM','নাফিজ খান','রহমত আলী','লিমা বেগম','MALE','2012-01-05','20123513234025421','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801974822842','7A25','7/25.jpg',NULL,NULL,NULL,36,1,'0'),(73,7,'Class Seven','A',26,'RUDRO BHOUMIK','VANJAN BHOUMIK','SIMA BHOUMIK','রুদ্র ভৌমিক','ভঞ্জন ভৌমিক','সীমা ভৌমিক','MALE','2011-12-10','20113522503047990','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801937144902','7A26','7/26.jpg',NULL,NULL,NULL,50,5,'0'),(74,7,'Class Seven','A',27,'SAGNICK BISWAS','SUNIRMAL BISWAS','BITHIKA MONDAL','সাগ্নিক বিশ্বাস','সুনির্মল বিশ্বাস','বিথীকা মন্ডল','MALE','2011-10-10','20113522505073761','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719177071','7A27','7/27.jpg',NULL,NULL,NULL,12,0,'0'),(75,7,'Class Seven','A',28,'OVIRUP BISWAS ARKO','SANJAY BISWAS','PAPIYA BISWAS','অভীরুপ বিশ্বাস অর্ক','সনজয় বিশ্বাস','পাপিয়া বিশ্বাস','MALE','2011-03-10','20112692510649773','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721976052','7A28','7/28.jpg',NULL,NULL,NULL,58,10,'0'),(76,7,'Class Seven','A',29,'GOLAM ASHIKUR RAHMAN KHAN','GOLAM ROSUL KHAN','AYESHA AKTER','গোলাম আশিকুর রহমান খাঁন','গোলাম রসুল খান','আয়শা আক্তার আশা','MALE','2011-12-31','20113519119024909','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719120309','7A29','7/29.jpg',NULL,NULL,NULL,27,0,'0'),(77,7,'Class Seven','A',3,'TONIMA ZAMAN','KHALADUZZAMAN TONU','KAJOL','তনিমা জামান','খালেদুজ্জামান তনু','কাজল','FEMALE','2011-05-28','20113522509048094','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712171430','7A3','7/3.jpg',NULL,NULL,NULL,53,9,'0'),(78,7,'Class Seven','A',30,'MD SAFOAN HOSSAIN','FAKRUL ALAM MOLLA','MAHAMUDA KATUN','মোঃ সাফোয়ান হোসেন','ফকরুল আলম মোল্লা','মাহমুদা খাতুন','MALE','2010-12-17','20103522508058173','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710810422','7A30','7/30.jpg',NULL,NULL,NULL,32,1,'0'),(79,7,'Class Seven','A',31,'SAAD AHMED CHOWDHURY','MD MOHIBUR RAHMAN CHOWDHURY','SHULI KHANOM','সাদ আহমেদ চৌধুরী','মো: মহিবুর রহমান চৌধুরী','শিউলী খানম','MALE','2011-12-30','20113513269027047','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718501626','7A31','7/31.jpg',NULL,NULL,NULL,7,0,'0'),(80,7,'Class Seven','A',32,'SM TAHMID TAHA','S.M OBAYDUR RAHMAN','MST. BILKIS SIDDIKA','এস,এম তাহমিদ তাহা','এস,এম ওবায়দুর রহমান','মোছাঃ বিলকিস সিদ্দিকা','MALE','2012-03-24','20123513234021485','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747867310','7A32','7/32.jpg',NULL,NULL,NULL,18,0,'0'),(81,7,'Class Seven','A',33,'JARIF CHOWDHURY','ANISUR RAHMAN CHOWDHURY','SULTANA RAZIA','জারিফ  চৌধুরী','আনিচুর রহমান   চৌধুরী','সুলতানা রাজিয়া','MALE','2010-09-10','20103513221018144','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754330417','7A33','7/33.jpg',NULL,NULL,NULL,3,0,'0'),(82,7,'Class Seven','A',34,'MS TASNIM AKTER DINA','MD. TORIKUL ISLAM','LATHIFA KHANOM','মোছাঃ তাছনীম আক্তার দীনা','মোঃ তরিকুল ইসলাম','মোছাঃ লতিফা খানম','FEMALE','2011-11-30','20110115685100061','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801738949444','7A34','7/34.jpg',NULL,NULL,NULL,56,10,'0'),(83,7,'Class Seven','A',35,'ARDHO DAS','PANKAJ KUMER DAS','PIKGKI RANI DAS','আর্ধ দাস','পংকজ কুমার দাস','পিংকি রানী দাস','MALE','2012-12-20','20123515861120032','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704667627','7A35','7/35.jpg',NULL,NULL,NULL,20,0,'0'),(84,7,'Class Seven','A',36,'MD SHOHAD SHEIKH','MD MAHABUB SHEIKH','PUSHA BEGUM','মো ছোহাদ  শেখ','মো মাহাবুব শেখ','পোশা বেগম','MALE','2009-05-12','20123513247048493','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801779493391','7A36','7/36.jpg',NULL,NULL,NULL,31,1,'0'),(85,7,'Class Seven','A',37,'ARAFAT HOSEN','HABIBUR RAHMAN KHAN','KAKOLI BEGUM','আরাফাত হোসেন','মৃত:হাবিবুর রহমান খান','মৃত:কাকলি বেগম','MALE','2011-12-01','20113513294014918','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801929530831','7A37','7/37.jpg',NULL,NULL,NULL,30,0,'0'),(86,7,'Class Seven','A',38,'RAHUL BAIDYA','ROBIN BAIDYA','TULI BISWAS','রাহুল বৈদ্য','রবিন বৈদ্য','তুলি বিশ্বাস','MALE','2003-04-11','20113522503051708','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801827193250','7A38','7/38.jpg',NULL,NULL,NULL,40,2,'0'),(87,7,'Class Seven','A',39,'AMMAN KHAN','MD. AMINUR RAHAMAN','MASUMA AKTER RUMA','আম্মান খান','মোঃ আমিনুর রহমান','মাসুমা আক্তার  রুমা','MALE','2012-04-19','20123522503055786','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726704976','7A39','7/39.jpg',NULL,NULL,NULL,1,0,'0'),(88,7,'Class Seven','A',4,'MD RADIM RAHAMAN','MD.MASTAFIZUR RAHAMAN','MST. MONIRA SULTANA','মো: রাদিম রহমান','মো: মোস্তাফিজুর রহমান','মোসা: মনিরা সুলতানা','MALE','2013-01-01','20136512815916859','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801677988474','7A4','7/4.jpg',NULL,NULL,NULL,59,10,'0'),(89,7,'Class Seven','A',40,'YASIN HAMID TALUKDAR','MD FARUK HOSSAIN TALUKDAR','TANIA TALUKDAR','ইয়াছিন হামিদ তালুকদার','মোঃ ফারুক হোসেন তালুকদার','তানিয়া তালুকদার','MALE','2011-03-21','20116794413308016','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672600934','7A40','7/40.jpg',NULL,NULL,NULL,44,2,'0'),(90,7,'Class Seven','A',41,'JABED SARWAR','MOLLAH MD HUMAYUN KABIR SENTU','LABONY BEGUM','জাবেদ সরোয়ার','মোল্লা মোঃ হুমায়ুন কবীর সেন্টু','লাবনী বেগম','MALE','2002-08-11','20113522501058204','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737022066','7A41','7/41.jpg',NULL,NULL,NULL,46,3,'0'),(91,7,'Class Seven','A',42,'MST NUSRAT JAHAN LABONNO','NUR MOHAMMAD MOLLA','SONIA KHANAM','মোসাঃ নুসরাত জাহান লাবন্য','নুর মোহাম্মাদ মোল্লা','সোনিয়া খানম','FEMALE','2022-11-11','20112692525485103','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801791434848','7A42','7/42.jpg',NULL,NULL,NULL,14,0,'0'),(92,7,'Class Seven','A',43,'TASHFYA RAHMAN','ASHIKUR RAHMAN','METHILA','তাসফিয়া রহমান','আশিকুর রহমান','মিথিলা','FEMALE','2012-06-01','20123513256024473','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732493032','7A43','7/43.jpg',NULL,NULL,NULL,39,2,'0'),(93,7,'Class Seven','A',44,'SADIQUR RAHMAN ATIK','HABIBUR RAHAMAN','SABIKUN NAHAR','সাদিকুর রহমান আতিক','হাবিবুর রহমান','ছাবিকুন নাহার','MALE','2024-01-13','20133522505058362','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801740676843','7A44','7/44.jpg',NULL,NULL,NULL,23,0,'0'),(94,7,'Class Seven','A',45,'JAMILA JANNAT BARSHA','MHAMMAD JAMAL MIA','MST. RABEYA KHANOM','জামিলা জান্নাত বর্ষা','মোহাম্মদ জামাল মিয়া','মোসাঃ রাবেয়া খানম','FEMALE','2013-08-11','20113514327027473','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801769263509','7A45','7/45.jpg',NULL,NULL,NULL,55,10,'0'),(95,7,'Class Seven','A',46,'SIAM HOSSAIN','DELOWAR HOSSAIN','TANGILA BEGUM','মোঃ সিয়াম হোসেন','মোঃ দেলোয়ার হোসেন','তানজিনা বেগম','MALE','2004-09-09','20096512815023988','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801517369894','7A46','7/46.jpg',NULL,NULL,NULL,54,10,'0'),(96,7,'Class Seven','A',47,'REDWANUL ISLAM RAIYAN','MD BABUL MOLLA','RIPA KHANAM','রেদওয়ানুল ইসলাম রাইয়ান','মোহাম্মদ বাবুল মোল্লা','রিপা খানম','MALE','2011-12-05','20113513217019755','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801927754601','7A47','7/47.jpg',NULL,NULL,NULL,34,1,'0'),(97,7,'Class Seven','A',49,'ARAFAT KHAN ESHAN','HABIBUR RAHMAN','POPY AKTER','আরাফাত খান ইশান','হাবিবুর রহমান','পপি আক্তার','MALE','2012-04-21','20123513260018392','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789787540','7A49','7/49.jpg',NULL,NULL,NULL,29,0,'0'),(98,7,'Class Seven','A',5,'MD MUAJ ALIF','MD.ARSHAD ALI','SUMA AKTER','মোঃ মুআজ আলিফ','মোঃ এরশাদ আলী','সুমা আক্তার','MALE','2010-04-25','20103522509055758','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801623870070','7A5','7/5.jpg',NULL,NULL,NULL,33,1,'0'),(99,7,'Class Seven','A',50,'ROBBANI MOLLA AFRIDI','MOJAMMEL HOQUE MOLLA','MST. SARJINA KHANAM SNIKDHA','মো: রব্বানী মোল্যা আফ্রিদী','মোজাম্মেল হক মোল্লা','মোছাঃ সারজিনা খানম স্নিগ্ধা','MALE','2011-01-01','20113513238025044','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737362808','7A50','7/50.jpg',NULL,NULL,NULL,16,0,'0'),(100,7,'Class Seven','A',51,'ABDULLA AL JABER','MD. FAZLUL HAQUE','TANIA KHANAM','আব্দুল্লাহ আল জাবের','মোঃ ফজলুল হক','তানিয়া খানম','MALE','1969-12-31','20103522507055164','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739132643','7A51','7/51.jpg',NULL,NULL,NULL,57,10,'0'),(101,7,'Class Seven','A',53,'MD. TANVIR RAHMAN','MD. KHALEDUR RAHMAN','JAMILA KHATUN','মোঃ তানভীর রহমান।','মোঃ খালেদুর রহমান।','জামিলা খাতুন।','MALE','2011-08-25','20114114711815904','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913890360','7A53','7/53.jpg',NULL,NULL,NULL,9,0,'0'),(102,7,'Class Seven','A',54,'RAIYAN AHMAD','MD NASIM UDDIN','ASMA PARVIN','রাইয়ান আহমদ','মোঃ নাছিম উদ্দিন','আসমা পারভীন','MALE','2010-10-18','20103522509042239','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801791434862','7A54','7/54.jpg',NULL,NULL,NULL,13,0,'0'),(103,7,'Class Seven','A',55,'SHOUROV SARKAR','GOLAK SARKAR','MANIKA SARKAR','সৌরভ সরকার','গোলক সরকার','মনিকা সরকার','MALE','2011-12-31','20113522502053417','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801315979832','7A55','7/55.jpg',NULL,NULL,NULL,47,3,'0'),(104,7,'Class Seven','A',56,'S M RAIHAN SADIK','ABDUR RAHMAN','MARINA RAHMAN','এস. এম. রাইহান সাদিক','আব্দুর রহমান','মেরীনা রহমান','MALE','2011-09-05','20113522507057732','0','0','Vill: 189, chandmari road, mohammad paraPOST: Gopalganj Sadar THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801717006404','7A56','7/56.jpg',NULL,NULL,NULL,45,3,'0'),(105,7,'Class Seven','A',57,'SUVRO DAM','SUMON KUMAR DAM','SATABDE RANI SEN','শুভ্র দাম','সুমন কুমার দাম','শতাব্দী রানী সেন','MALE','2011-06-29','20110110817104355','0','0','Vill: POST:  THANA:  ---  DISTRICT: Bagerhat','8801715538766','7A57','7/57.jpg',NULL,NULL,NULL,19,0,'0'),(106,7,'Class Seven','A',58,'MD. AZIZUL HAQUE','MD AKHTER ALI','SALMA BEGUM','মোঃ আজিজুল হক','মোঃ আক্তার আলী','সালমা বেগম','MALE','2012-01-01','20122692503558422','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724566078','7A58','7/58.jpg',NULL,NULL,NULL,10,0,'0'),(107,7,'Class Seven','A',6,'KHADIJATUL COBRA','MD. ABUL KHAYER SHAIKH','TASLIMA KHAITUN','খাদিজাতুল কোবরা','মোঃ আবুল খায়ের শেখ','তাছলিমা খাতুন','FEMALE','2011-06-29','20113522509066508','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725239883','7A6','7/6.jpg',NULL,NULL,NULL,43,2,'0'),(108,7,'Class Seven','A',7,'LIKHON MOLLA','MOHAMMED ALI MOLLA','ISMAT ARA KHANAM','লিখন মোল্যা','মোহাম্মদ আলী মোল্যা','ইসমত আরা খানম','MALE','2011-11-05','20113513243018942','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801787551711','7A7','7/7.jpg',NULL,NULL,NULL,48,3,'0'),(109,7,'Class Seven','A',8,'MD.MILON MOLLA','MD DHALA MOLLA','KULSUM BEGUM','মিলন মোল্লা','ধলা মোল্লা','কুলছুম বেগম','MALE','2013-02-03','20133513217022291','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913541390','7A8','7/8.jpg',NULL,NULL,NULL,41,2,'0'),(110,7,'Class Seven','A',9,'SOUMITRA SHILL PRITHIBE','SUJAN KUMAR SHILL','BEAUTY BISWAS','সৌমিত্র শীল পৃথিবী','সুজন কুমার শীল','বিউটি বিশ্বাস','MALE','2012-09-12','20123522508070653','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739117342','7A9','7/9.jpg',NULL,NULL,NULL,11,0,'0'),(111,9,'Class Nine','A',1,'MD. NUR ISLAM FARAZI','MOMREJ FARAZI','RASIDA BEGUM','মোঃ নূর ইসলাম ফরাজী','মোমরেজ ফরাজী','রাশিদা বেগম','MALE','2009-11-25','20093513217019871','0','0','Vill: GOLABARIPOST: BATGRAM THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801311928037','9A1','9/1.jpg',NULL,NULL,NULL,1,0,'0'),(112,9,'Class Nine','A',10,'AYSHA SIDDIKA','ASHIKUL HUQ','KEYA ISLAM','আয়শা সিদ্দিকা','মোঃ আশিকুল হক','কেয়া ইসলাম','FEMALE','2009-06-07','20093522506003459','0','0','Vill: 7. Janata RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801749209353','9A10','9/10.jpg',NULL,NULL,NULL,10,0,'0'),(113,9,'Class Nine','A',12,'MD HAMZA KHAN','NIZAMUL ISLAM KHAN','MST. YESMIN AKHTER POLY','মোঃ হামজা খান','নিজামুল ইসলাম খান','মোসাঃ ইয়াছমিন আখতার পলি','MALE','2010-08-09','20103522504058369','0','0','Vill: 134, College RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801714698861','9A12','9/12.jpg',NULL,NULL,NULL,18,0,'0'),(114,9,'Class Nine','A',13,'NUR-A ROSHNI','MD. NASIR UDDIN MOLLA','MST. LUNA BEGUM','নূর - এ রোশনী','মো: নাসির উদ্দিন মোল্লা','মোসা: লুনা বেগম','FEMALE','2010-01-01','20103513256018495','0','0','Vill: CharmanikdhaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801729743687','9A13','9/13.jpg',NULL,NULL,NULL,20,0,'0'),(115,9,'Class Nine','A',14,'JAKIYA AKTER MARIYA','MAHASIN SIKDER','DALI BEGUM','জাকিয়া আক্তার মারিয়া','মোঃ মহাসিন শিকদার','মোসাঃ ডলি বেগম','FEMALE','2009-10-20','20093522507055061','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928258419','9A14','9/14.jpg',NULL,NULL,NULL,16,0,'0'),(116,9,'Class Nine','A',16,'SHATHI MONI','SAIFUL MOLLA','IRIN BEGUM','সাথী মনি','মোঃ সাইফুল মোল্যা','আইরিন বেগম','FEMALE','2010-10-10','20103522505054980','0','0','Vill: 210, Udayin RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801943500003','9A16','9/16.jpg',NULL,NULL,NULL,22,0,'0'),(117,9,'Class Nine','A',17,'MD. SADIKUR RAHMAN','A. ALIM','MOST. NAZIDA KHATUN','মোঃ সাদিকুর রহমান','আঃ আলীম','মোসাঃ নাজিদা খাতুন','MALE','2010-03-22','20103513211019231','0','0','Vill: POST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801728219238','9A17','9/17.jpg',NULL,NULL,NULL,24,0,'0'),(118,9,'Class Nine','A',19,'SOUMITA HALDER ADITI','JOYDAB HALDER JOY','SABITA OJHA','সৌমিতা হালদার অদিতি','জয়দেব হালদার জয়','সবিতা ওঝা','FEMALE','2010-06-22','20103522509059711','0','0','Vill: MOHAMMADPARAPOST: GOPALGANJ THANA:  ---  DISTRICT: Gopalganj','8801739799883','9A19','9/19.jpg',NULL,NULL,NULL,19,0,'0'),(119,9,'Class Nine','A',2,'MD ABRAR ALAM','MD MEHERUL ALAM','SHAHANA ALAM','মোঃ আবরার আলম','মোঃ মেহেরুল আলম','শাহানা আলম','MALE','2010-12-12','20103522508061903','0','0','Vill: 305, Mohammad ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801778993443','9A2','9/2.jpg',NULL,NULL,NULL,11,0,'0'),(120,9,'Class Nine','A',20,'RAJ ROY','SUVASH ROY','MALA ROY','রাজ রায়','সুবাশ রায়','মালা রায়','MALE','2010-07-24','20103522502052477','0','0','Vill: Shikhdar ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801849860538','9A20','9/20.jpg',NULL,NULL,NULL,29,0,'0'),(121,9,'Class Nine','A',23,'MINHAJ HOSSIN','MD. MORAD HOSSIN','NAHIDA SULTANA','মিনহাজ হোসেন','মোঃ মোরাদ হোসেন','নাহিদা সুলতানা','MALE','2009-12-31','20093514388028614','0','0','Vill: RautkandiPOST: Shajail THANA:  Kashiani  DISTRICT: Gopalganj','8801716019991','9A23','9/23.jpg',NULL,NULL,NULL,23,0,'0'),(122,9,'Class Nine','A',25,'TANZIM AHMED TAJ','SM SHAHJAHAN','TAHERA SULTANA','তানজিম আহমেদ তাজ','এস এম শাহজাহান','তাহিরা সুলতানা','MALE','2010-12-13','20103513269022514','0','0','Vill: PaikkandiPOST: Paikkandi THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716983155','9A25','9/25.jpg',NULL,NULL,NULL,50,9,'0'),(123,9,'Class Nine','A',26,'SHEIKH MUINUL ISLAM MUIN','SHEIKH MOSTAIN BILLAHN','SULTANA','শেখ মইনুল ইসলাম মুইন','শেখ মুস্তাইন বিল্লাহ','সুলতানা','MALE','2011-02-01','20113522502059679','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712801179','9A26','9/26.jpg',NULL,NULL,NULL,36,0,'0'),(124,9,'Class Nine','A',28,'SHEKH MD. ASHRAFUZZAMAN (SHAIKAT)','SHEKH MD. ALIUZZAMAN','MRS. KAMRUNNAHAR','শেখ মো: আশরাফুজ্জামান সৈকত','শেখ মো: আলিউজ্জামান','কামরুন্নাহার','MALE','2011-02-01','20113519176029627','0','0','Vill: PatgatiPOST: Patgati THANA:  Tungipara  DISTRICT: Gopalganj','8801735451104','9A28','9/28.jpg',NULL,NULL,NULL,27,0,'0'),(125,9,'Class Nine','A',29,'AOYN BANIK','ASHIM BANIK','SUSHILA BARAI','অয়ন বনিক','অসীম বনিক','সুশীলা বাড়ৈ','FEMALE','2010-01-01','20103515187100477','0','0','Vill: 129 Khan shaheb Road Bank ParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801712922463','9A29','9/29.jpg',NULL,NULL,NULL,37,0,'0'),(126,9,'Class Nine','A',3,'MOOMTAHINA AZAD','MD. SAIFUL KAMAL AZAD','DR. KHALEDA PANNI','মুমতাহিনা আজাদ','মোঃ সাইফুল কামাল আজাদ','ডাঃ খালেদা পান্নী','FEMALE','2008-12-12','20083522507061972','0','0','Vill: 334,POST: Bankpara THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801791604755','9A3','9/3.jpg',NULL,NULL,NULL,5,0,'0'),(127,9,'Class Nine','A',30,'LAMIA ISLAM','IMRAN ALI MOLLA','RUNA BEGUM','লামিয়া ইসলাম','ইমরান আলী মোল্লা','রুনা বেগম','FEMALE','2010-01-16','20103513221010806','0','0','Vill: GobraPOST: Gobra-8100 THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801774466407','9A30','9/30.jpg',NULL,NULL,NULL,40,0,'0'),(128,9,'Class Nine','A',31,'ZIDNI ISLAM MONIRA','MD. MANIR MIA','MOUSUM BEGUM','জিদনী ইসলাম মনিরা','মোঃ মনির মিয়া','মৌসুমী বেগম','FEMALE','2010-01-01','20103522509065308','0','0','Vill: 432-2 Uapzla RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801795774270','9A31','9/31.jpg',NULL,NULL,NULL,41,0,'0'),(129,9,'Class Nine','A',32,'SHIBNATH MAJUMDAR','SATAJIT MAJUMDER','BEAUTY RANI MAJUMDAR','শিবনাথ মজুমদার','সত্যজিৎ মজুমদার','বিউটি রানী মজুমদার','MALE','2009-02-23','20093522509068807','0','0','Vill: NobinbagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801954813720','9A32','9/32.jpg',NULL,NULL,NULL,45,1,'0'),(130,9,'Class Nine','A',33,'SAYED OWAZKURUNI ARNOB','SOYED RAZIBAL ALAM','MISS JUI','সৈয়দ ওয়াজকুরুনী অর্নব','সৈয়দ রাজিবুল আলম','মিস জুই','MALE','2010-01-01','20103513256018511','0','0','Vill: ManikdahPOST: Manikdah THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801772096287','9A33','9/33.jpg',NULL,NULL,NULL,31,0,'0'),(131,9,'Class Nine','A',34,'APURBA MAZUMDER','DURJAYDHAN MAZUMDER','SHIBANI DAS','অপূর্ব মজুমদার','দুর্যোধন মজুমদার','শিবানী দাস','MALE','2009-08-09','20095414031012150','0','0','Vill: Bakchi BariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801714636343','9A34','9/34.jpg',NULL,NULL,NULL,21,0,'0'),(132,9,'Class Nine','A',35,'SANJIDA AKTAR SARMIN','MD. YUSUF ALI','KAMRUN NAHAR KABITA','সানজিদা আক্তার শারমিন','ইউসুফ আলী','কামরুন নাহার কবিতা','FEMALE','2010-10-20','20103522506070172','0','0','Vill: 108/6 Janata RoadPOST: Gopalganj THANA:  ---  DISTRICT: Gopalganj','8801724194323','9A35','9/35.jpg',NULL,NULL,NULL,30,0,'0'),(133,9,'Class Nine','A',37,'ANIK SAMADDAR','ANANDHA SAMADDAR','ARPANA SAMADDAR','অনিক সমদ্দার','আনন্দ সমদ্দার','অর্পনা সমদ্দার','MALE','2010-04-20','20103522509059489','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736333421','9A37','9/37.jpg',NULL,NULL,NULL,35,0,'0'),(134,9,'Class Nine','A',38,'SARMIN SULTANA RITU','ABUL HASAN SHEIKH','MST. SHILPI AKTER','শারমিন সুলতানা রিতু','আবুল হাসান শেখ','শিল্পী আক্তার','FEMALE','2009-05-21','20093522509048980','0','0','Vill: GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801794447605','9A38','9/38.jpg',NULL,NULL,NULL,43,1,'0'),(135,9,'Class Nine','A',4,'HABIBA BINTA MUSA','MD. MUSA KALIMULLA','EYERINE','হাবিবা বিনতে মুসা','মোঃ মুসা কালিমুল্লা','আইরিন','FEMALE','2010-11-20','20103522504063201','0','0','Vill: MeiaparaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801537531781','9A4','9/4.jpg',NULL,NULL,NULL,13,0,'0'),(136,9,'Class Nine','A',40,'ROWMIUL ISLAM SOPNO','SHAFIQUL ISLAM','REHANA SULTANA','রমিউল ইসলাম স্বপ্ন','মোঃ সফিকুল ইসলাম','রেহানা সুলতানা','MALE','2009-07-21','20093522504051037','0','0','Vill: MiahParaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801731463653','9A40','9/40.jpg',NULL,NULL,NULL,32,0,'0'),(137,9,'Class Nine','A',41,'SATIRTHA TIKADAR','SANJOY KUMAR TIKADAR','NANDITA BAIRAGI','সতীর্থ টিকাদার','সঞ্জয় কুমার টিকাদার','নন্দিতা বৈরাগী','MALE','2009-12-16','20093519138100910','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801764444377','9A41','9/41.jpg',NULL,NULL,NULL,25,0,'0'),(138,9,'Class Nine','A',42,'SETU BAKCHI','LITON BAKCHI','SHILPI BAKCHI','সেতু বাকচী','লিটন বাকচী','শিল্পী বাকচী','FEMALE','2010-12-25','20103513256022385','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801799380508','9A42','9/42.jpg',NULL,NULL,NULL,12,0,'0'),(139,9,'Class Nine','A',43,'SOUMIK SAHA','SUKUMAR SAHA','MITA RANI SAHA','সৌমিক সাহা','সুকুমার সাহা','মিতা রানী সাহা','MALE','2009-12-15','20083522502047442','0','0','Vill: GobraPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801711283584','9A43','9/43.jpg',NULL,NULL,NULL,51,10,'0'),(140,9,'Class Nine','A',45,'MAZIDUL ISLAM','MD Sahidul Munshi','Afroza Begum','মোঃ মাজিদুল ইসলাম','মো:সাহিদুল মুন্সী','আফরোজা বেগম','MALE','1970-01-01','20113519119022957','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723245256','9A45','9/45.jpg',NULL,NULL,NULL,38,0,'0'),(141,9,'Class Nine','A',46,'MST. MAIMUNA RAHMAN ANIKA','MD. ANISUR RAHMAN','KALI BEGUM','মোছা: মায়মুনা রহমান আনিকা','মো: আনিসুর রহমান','কলি বেগম','FEMALE','2010-02-25','20103513251100039','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801786304508','9A46','9/46.jpg',NULL,NULL,NULL,3,0,'0'),(142,9,'Class Nine','A',47,'BANDHAN BISWAS','MIHIR BISWAS','BINA BISWAS','বন্ধন বিশ্বাস','মিহির বিশ্বাস','বীনা বিশ্বাস','MALE','2010-10-01','20103515855101366','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745975278','9A47','9/47.jpg',NULL,NULL,NULL,39,0,'0'),(143,9,'Class Nine','A',5,'SIMANTA HALDER','PROSANTA HALDER','SHIBANI GAIN','সীমান্ত হালদার','প্রশান্ত হালদার','শিবানী গাইন','MALE','2011-04-02','20113515171881983','0','0','Vill: BedgramPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801718756581','9A5','9/5.jpg',NULL,NULL,NULL,14,0,'0'),(144,9,'Class Nine','A',50,'MD. RIDWANL ISLAM','MD. RAFIQUL ISLAM','MST. MAHBUBA PERVIN','মোঃ রিদওয়ানুল ইসলাম','মোঃ রফিকুল ইসলাম','মোছাঃ মাহবুবা পারভীন','MALE','2008-04-06','20082722808155278','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762155105','9A50','9/50.jpg',NULL,NULL,NULL,33,0,'0'),(145,9,'Class Nine','A',6,'MD. NAIM SHEIKH','AB. HANNAN','TAMA BEGUM','মোঃ নাইম শেখ','আঃ হান্নান','তমা বেগম','MALE','2010-01-17','20103513221016016','0','0','Vill: Poddarer CharPOST: Gobra THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801790305026','9A6','9/6.jpg',NULL,NULL,NULL,6,0,'0'),(146,9,'Class Nine','A',8,'FARHAN ISMAIL','MD. SHAWKAT ALI DARIA','SAMSUN NAHAR BEGUM','ফারহান ইসমাইল','মোঃ শওকত আলী দাড়িয়া','সামছুন নাহার বেগম','MALE','2009-10-06','20093529109100958','0','0','Vill: BORASHI Word: 14POST: Digarkul THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801775897591','9A8','9/8.jpg',NULL,NULL,NULL,4,0,'0'),(147,9,'Class Nine','A',9,'HURAIRA HUMAYUN ZINNIA','MD. HUMAYUN MOLLA','RATNA KHANAM','হুরাইয়া হুমায়ুন জিনিয়া','মো: হুমায়ুন মোল্লা','রত্না খানম','FEMALE','2010-12-15','20103519119017054','0','0','Vill: NobinbagPOST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801744224786','9A9','9/9.jpg',NULL,NULL,NULL,9,0,'0'),(179,0,'Class KG','A',1,'ANWESHA DAS','PROTUL DAS','PAPSI MAITRA','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801743890043','0A1','0/1.jpg',NULL,NULL,NULL,1,0,'0'),(180,0,'Class KG','A',2,'SATVIK ABESH BAIN','SABITABRATA BAIN','NIPA BEPARI','Not Avliable','Not Avliable','Not Avliable','MALE','2020-12-19','0','0','0','Vill: D/1 Medical officesPOST: 250 Bed gere ral Hospital THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801611262728','0A2','0/2.jpg',NULL,NULL,NULL,3,0,'0'),(181,0,'Class KG','A',3,'GULAM RABBI','MD ROFIKUL ISLAM','MORSHEDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2002-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736524181','0A3','0/3.jpg',NULL,NULL,NULL,26,0,'0'),(182,0,'Class KG','A',4,'ABANTI BHADRA','BEDESH BHADRA','MUNMUN SEN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801823616080','0A4','0/4.jpg',NULL,NULL,NULL,36,2,'0'),(183,0,'Class KG','A',5,'MST MORIAM','MD MIJANUR RAHOMAN TALUKDER','FAHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2005-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726574465','0A5','0/5.jpg',NULL,NULL,NULL,2,0,'0'),(184,0,'Class KG','A',6,'MAHMUDUL HASAN CHOWDHURY','SHAHIDUL ISLAM','ALINA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801874437109','0A6','0/6.jpg',NULL,NULL,NULL,8,0,'0'),(185,0,'Class KG','A',7,'SNEHA BISWAS','SUKANTA BISWAS','RATNA MOULICK','Not Avliable','Not Avliable','Not Avliable','MALE','2016-10-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732382688','0A7','0/7.jpg',NULL,NULL,NULL,14,0,'0'),(186,0,'Class KG','A',8,'FAIZA RAHMAN AFRIN','MUNSHI HASIBUR RAHMAN','ISRAT ZAHAN ERIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2013-02-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725001376','0A8','0/8.jpg',NULL,NULL,NULL,7,0,'0'),(187,0,'Class KG','A',9,'BROTOTI SAHA','SREE BIDHAN KUMAR SAHA','TAPASHI SAHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2021-07-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721019240','0A9','0/9.jpg',NULL,NULL,NULL,10,0,'0'),(188,0,'Class KG','A',10,'MD FARHAN MUHTADI','MD ARIFUL ISLAM','MST. FARHANA MOSTARI','Not Avliable','Not Avliable','Not Avliable','MALE','2029-05-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801744348419','0A10','0/10.jpg',NULL,NULL,NULL,16,0,'0'),(189,0,'Class KG','A',11,'JACIKA ISLAM','SHOHIDUL ISLAM','FIROZA AKTER RATREY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2012-04-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801771608542','0A11','0/11.jpg',NULL,NULL,NULL,15,0,'0'),(190,0,'Class KG','A',12,'SWACCHO BHAKTA','RINTU BHAKTA','NITU BAUL','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801721869612','0A12','0/12.jpg',NULL,NULL,NULL,9,0,'0'),(191,0,'Class KG','A',13,'BARNITA BISWAS','BIJAY BISWAS','BANASHRI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-06-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736363613','0A13','0/13.jpg',NULL,NULL,NULL,18,0,'0'),(192,0,'Class KG','A',14,'TAWSIN KABIR','MD MASUM BILLAH','MISS. MITA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916429938','0A14','0/14.jpg',NULL,NULL,NULL,23,0,'0'),(193,0,'Class KG','A',15,'ARUSHA SARKER','LET. RAJIB KUMAR SARKER','SIMA DAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2003-05-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789732351','0A15','0/15.jpg',NULL,NULL,NULL,28,0,'0'),(194,0,'Class KG','A',16,'MD AMIR HAMZA','LITON MOLLA','MOKHSENA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2029-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703268854','0A16','0/16.jpg',NULL,NULL,NULL,35,0,'0'),(195,0,'Class KG','A',17,'MD ATIF ARHAM','MD UZZAL MOLLA','ISRAT ARA','Not Avliable','Not Avliable','Not Avliable','MALE','2022-03-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801768373602','0A17','0/17.jpg',NULL,NULL,NULL,32,0,'0'),(196,0,'Class KG','A',18,'ZEBA MALIHA','SHAIKH MOHAMMAD ABU HANIF','MUSLIMA KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801757750106','0A18','0/18.jpg',NULL,NULL,NULL,30,0,'0'),(197,0,'Class KG','A',19,'NUSRAT ZAMAN MIM','SHAIKH MOSTAFA ZAMAN','FARHANA ZAMAN REIA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711939420','0A19','0/19.jpg',NULL,NULL,NULL,31,0,'0'),(198,0,'Class KG','A',20,'ABDULLAH SALEH SHAYAN','DR. MD ABU SALEH','DR. SOHANA SARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2030-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713579016','0A20','0/20.jpg',NULL,NULL,NULL,24,0,'0'),(199,0,'Class KG','A',21,'SHAYONTY BINTEY HADI','FAKIR MD HADIUZZAMAN','MONALISA RAHMAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2007-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672905050','0A21','0/21.jpg',NULL,NULL,NULL,37,2,'0'),(200,0,'Class KG','A',22,'ANISHA TABASSUM','S M RIPON','KHALEDA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2030-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801789206001','0A22','0/22.jpg',NULL,NULL,NULL,29,0,'0'),(201,0,'Class KG','A',23,'SHAKE SADAT RAHAMAN SANY','SHAEK MAHABUBUR RAHAMAN SAHEN','MASUMA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2027-09-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966308925','0A23','0/23.jpg',NULL,NULL,NULL,39,3,'0'),(202,0,'Class KG','A',24,'SAYMA HAMID','HAMIDUR RAHMAN MOLLA','ANJU MONOARA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741301443','0A24','0/24.jpg',NULL,NULL,NULL,13,0,'0'),(203,0,'Class KG','A',25,'ZARIN IBTHAZ','KAZI BAHAUDDIN','MAISHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2028-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742217772','0A25','0/25.jpg',NULL,NULL,NULL,12,0,'0'),(204,0,'Class KG','A',26,'KAZI MD USMAN','KAZI NAZMUL ISLAM','KAZI RASHIDA ISLAM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801766747688','0A26','0/26.jpg',NULL,NULL,NULL,38,3,'0'),(205,0,'Class KG','A',27,'NANDINI ADHIKARY','NIPON ADHIKARY','BASONTI BALA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2007-07-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801761648926','0A27','0/27.jpg',NULL,NULL,NULL,27,0,'0'),(206,0,'Class KG','A',28,'ASIYA KHANOM','NOOR MOHAMMAD SHIEK','AMINA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2024-02-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912670319','0A28','0/28.jpg',NULL,NULL,NULL,11,0,'0'),(207,0,'Class KG','A',29,'SAHABA AKTAR VUMI','MD NAHID SHEIKH','LABONI BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2008-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801707759977','0A29','0/29.jpg',NULL,NULL,NULL,34,0,'0'),(208,0,'Class KG','A',30,'SADIYA KHAN','MD SEKENDER KHAN','MONIRA KHATUN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2014-09-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911414146','0A30','0/30.jpg',NULL,NULL,NULL,22,0,'0'),(209,0,'Class KG','A',31,'SAMMOJIT BISWAS','SUKANTA BISWAS','ELA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2026-12-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801777897696','0A31','0/31.jpg',NULL,NULL,NULL,20,0,'0'),(210,0,'Class KG','A',32,'PRIVTHIRAJ BISWAS','PAIIOB KANTI BISWAS','MALA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2028-07-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912331799','0A32','0/32.jpg',NULL,NULL,NULL,6,0,'0'),(211,0,'Class KG','A',33,'ANERUDDHO BALA','APURBA BALA','TUMPA PODDER','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801967728117','0A33','0/33.jpg',NULL,NULL,NULL,19,0,'0'),(212,0,'Class KG','A',34,'MAHISA IMROZ ALIA','MD TOUHIDUL ISLAM','UMBIA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2005-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801910437575','0A34','0/34.jpg',NULL,NULL,NULL,33,0,'0'),(213,0,'Class KG','A',35,'MUNSHI TASKIN RAIYAN','MUNSHI ABU SUFIAN','FATEMA KAMRUN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2023-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716142021','0A35','0/35.jpg',NULL,NULL,NULL,25,0,'0'),(214,0,'Class KG','A',36,'TOHERA BINTE REZWAN','MD REZWANUR RAHMAN','SAZIA JANNAH NISHAT','Not Avliable','Not Avliable','Not Avliable','FEMALE','2030-03-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713913404','0A36','0/36.jpg',NULL,NULL,NULL,5,0,'0'),(215,0,'Class KG','A',37,'PROGGA MONI MAJUMDAR','SANJIB KUMAR MAJUMDAR','JAYASHREE SARKAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2006-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801742222325','0A37','0/37.jpg',NULL,NULL,NULL,21,0,'0'),(216,0,'Class KG','A',38,'FATIMA AFROZ','FARIDUL ISLAM','RUMA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-03-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704772202','0A38','0/38.jpg',NULL,NULL,NULL,17,0,'0'),(217,0,'Class KG','A',39,'MD.TASFIN RAHMAN','MD. KHALEDUR RAHMAN','JAMILA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-11-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913890360','0A39','0/39.jpg',NULL,NULL,NULL,4,0,'0'),(218,1,'Class One','A',1,'NIHAN BISWAS','BINOY KRISHYNA BISWAS','NIPA RANI BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-03','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801705456072','1A1','1/1.jpg',NULL,NULL,NULL,3,0,'0'),(219,1,'Class One','A',2,'FARHANA ISLAM','MD ZAHIRUL ISLAM','BABLI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-01-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914884884','1A2','1/2.jpg',NULL,NULL,NULL,17,0,'0'),(220,1,'Class One','A',3,'NIBIR KANTI BISWAS','PROKASH KANTI BISWAS','NAMITA RANI MALO','Not Avliable','Not Avliable','Not Avliable','MALE','2017-09-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801715166940','1A3','1/3.jpg',NULL,NULL,NULL,1,0,'0'),(221,1,'Class One','A',4,'RAHMAN ASHFAR JAZIB','S.M. MIZANUR RAHMAN','MST. SHILPI KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711976067','1A4','1/4.jpg',NULL,NULL,NULL,13,0,'0'),(222,1,'Class One','A',5,'MUNTAHA ADIBA','SHAIKH MOHAMMAD ABU HANIF','MUSLIMA KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714961877','1A5','1/5.jpg',NULL,NULL,NULL,10,0,'0'),(223,1,'Class One','A',6,'FAYSAL HOSEN TAJIM','SHARFUZZAMAN SHUJAN','TANJILA EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801310288958','1A6','1/6.jpg',NULL,NULL,NULL,11,0,'0'),(224,1,'Class One','A',7,'MD. AYAN','MD. TAZAMMIL HAQUE','MST. ONU KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914851983','1A7','1/7.jpg',NULL,NULL,NULL,4,0,'0'),(225,1,'Class One','A',8,'SAMPURNA BISWAS','RAMANATH BISWAS','SEEMA BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2018-08-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911702075','1A8','1/8.jpg',NULL,NULL,NULL,5,0,'0'),(226,1,'Class One','A',9,'SANJUKTA BISWAS','RAMANATH BISWAS','SEEMA BAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2018-08-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911702075','1A9','1/9.jpg',NULL,NULL,NULL,6,0,'0'),(227,1,'Class One','A',10,'JAGROTO MONDAL SIDDHI','JAPATOSH MONDAL','SHANCHARI SARKER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714940031','1A10','1/10.jpg',NULL,NULL,NULL,21,0,'0'),(228,1,'Class One','A',11,'GAZI MOHAMMED NEHAN','GAZI MOHAMMED MAHBUB','NISHAT LUBNA NIPA','Not Avliable','Not Avliable','Not Avliable','MALE','2917-09-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793265600','1A11','1/11.jpg',NULL,NULL,NULL,18,0,'0'),(229,1,'Class One','A',12,'ALVINA ERA','S.M. RAFIKUL HASAN','JUTHI KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-10-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914503651','1A12','1/12.jpg',NULL,NULL,NULL,20,0,'0'),(230,1,'Class One','A',13,'MAHISA AKTER','MD. HAFIZUR','SONYA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801676699312','1A13','1/13.jpg',NULL,NULL,NULL,8,0,'0'),(231,1,'Class One','A',14,'MIR ABDULLAH AL RAFI','MIR KAMAL HOSSAIN','RESHMA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736575348','1A14','1/14.jpg',NULL,NULL,NULL,25,0,'0'),(232,1,'Class One','A',15,'SAIFAN ISLAM','TANBIRUL ISLAM','OYENDRILA HOSSAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717366402','1A15','1/15.jpg',NULL,NULL,NULL,14,0,'0'),(233,1,'Class One','A',16,'MAISHA KHAN ROZA','SHAFIKUL ISLAM LITON','SABIHA SAFIQ MUNNI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801676885524','1A16','1/16.jpg',NULL,NULL,NULL,31,0,'0'),(234,1,'Class One','A',17,'JANNATUL FERDAUS','MD. JAHIDUL ISLAM','MST. KHURSHID JAHAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-07-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718681932','1A17','1/17.jpg',NULL,NULL,NULL,26,0,'0'),(235,1,'Class One','A',18,'MD. TAHMID JAMIL SHAD','SIKDER SHAFIQUL ISLAM','SHARMIN AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734262932','1A18','1/18.jpg',NULL,NULL,NULL,15,0,'0'),(236,1,'Class One','A',19,'MD. TAMIM MIA','MD. SHAMIM ALI','MST. TARJINA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801302469559','1A19','1/19.jpg',NULL,NULL,NULL,19,0,'0'),(237,1,'Class One','A',20,'FARDIN KARI','ALAM KARI','SONEYA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2017-06-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762882664','1A20','1/20.jpg',NULL,NULL,NULL,36,0,'0'),(238,1,'Class One','A',21,'ANKON MONDAL','NARATTAM MONDAL','SIPRA PATRA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920761424','1A21','1/21.jpg',NULL,NULL,NULL,16,0,'0'),(239,1,'Class One','A',22,'LABIB AL RAIYAN','MD. JUEL MOLLA','RUPALI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801830400320','1A22','1/22.jpg',NULL,NULL,NULL,27,0,'0'),(240,1,'Class One','A',23,'NIROB RAHMATULLAH','RAHMATULLA SAJAL','FARZANA AKTER BRISTY','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801771608767','1A23','1/23.jpg',NULL,NULL,NULL,23,0,'0'),(241,1,'Class One','A',24,'NEHAN NEWAZ RAYEN','MD. TASLIM ARIF','MST. RABEYA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719273886','1A24','1/24.jpg',NULL,NULL,NULL,9,0,'0'),(242,1,'Class One','A',25,'RAKIKA ISLAM','IMRUL BISWAS','AFRINA KABIR MOMOTA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710911019','1A25','1/25.jpg',NULL,NULL,NULL,34,0,'0'),(243,1,'Class One','A',26,'ARIAN JAMAN','MUNSI RAKIBUZZAMAN','FAYAJA AHAMAD MILY','Not Avliable','Not Avliable','Not Avliable','MALE','2016-07-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717606655','1A26','1/26.jpg',NULL,NULL,NULL,29,0,'0'),(244,1,'Class One','A',27,'NAJIFA AKTER','RIPON MOLLA','NURTAJ BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-06-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724280825','1A27','1/27.jpg',NULL,NULL,NULL,32,0,'0'),(245,1,'Class One','A',28,'MD. RAMADAN ISLAM','MD FIRUZ MIAH','AKHI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-03-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801301245436','1A28','1/28.jpg',NULL,NULL,NULL,35,0,'0'),(246,1,'Class One','A',29,'THIRTHO BISWAS','GOBINDA BISWAS','RUPA MAJUMDER','Not Avliable','Not Avliable','Not Avliable','MALE','2017-07-02','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739840394','1A29','1/29.jpg',NULL,NULL,NULL,28,0,'0'),(247,1,'Class One','A',30,'NAZIFA NUR AYRA','KHAN BENZIR AHMED','MST. NASRIN NAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-12-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741915333','1A30','1/30.jpg',NULL,NULL,NULL,40,3,'0'),(248,1,'Class One','A',31,'SAYEMA TABASSUM','MUHAMMAD SOHAEL OSSAIN','SABINA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-06-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716146720','1A31','1/31.jpg',NULL,NULL,NULL,41,3,'0'),(249,1,'Class One','A',32,'S M ARDOGAN TAJUDDIN','SARDAR MD MAJBA UDDIN','SELINA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-03-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724794166','1A32','1/32.jpg',NULL,NULL,NULL,24,0,'0'),(250,1,'Class One','A',33,'MD TAHSIN HAQUE','MD ENAMUL HAQUE','MST. TANZINA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-10-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704486239','1A33','1/33.jpg',NULL,NULL,NULL,7,0,'0'),(251,1,'Class One','A',34,'SAMIA ISLAM','MD. RUBUL SHAIKH','MST. SULTANA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793338817','1A34','1/34.jpg',NULL,NULL,NULL,42,3,'0'),(252,1,'Class One','A',35,'TASNIM KHANDAKER','K.M. KHALAFATH ULLAH','NOWREEN NAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-04-08','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801318303547','1A35','1/35.jpg',NULL,NULL,NULL,22,0,'0'),(253,1,'Class One','A',36,'MD. ZARIF BIN MAHMUD','MD. MAHMUD ALAM','ZARINA YASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801714596260','1A36','1/36.jpg',NULL,NULL,NULL,12,0,'0'),(254,1,'Class One','A',37,'JUBAYER MIA','MD. HAKIM MIA','JESMIN AKTAR RIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2018-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736538558','1A37','1/37.jpg',NULL,NULL,NULL,33,0,'0'),(255,1,'Class One','A',38,'ADNAN HABIB RAAD','NADIM SIKDER','MAHMUDA PARVIN MUKTA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994018022','1A38','1/38.jpg',NULL,NULL,NULL,30,0,'0'),(256,1,'Class One','A',39,'MUSAYKA TAHA RAHMAN','MIZANUR RAHMAN','SAMIA ZAMAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-04-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801841168278','1A39','1/39.jpg',NULL,NULL,NULL,37,0,'0'),(257,1,'Class One','A',40,'FATEMA AKTER','','','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710000','1A40','1/40.jpg',NULL,NULL,NULL,39,3,'0'),(258,1,'Class One','A',41,'PURNATA MANDAL','KRIPA MANDAL','BINA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-08-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801319442259','1A41','1/41.jpg',NULL,NULL,NULL,43,3,'0'),(259,1,'Class One','A',42,'AMRIN RAHMAN SNEHA','','','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725654541','1A42','1/42.jpg',NULL,NULL,NULL,2,0,'0'),(260,1,'Class One','A',43,'LUBDHAK MONDAL','NITTANDU MONDAL','BANNYA HIRA','Not Avliable','Not Avliable','Not Avliable','MALE','2007-11-09','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801720922591','1A43','1/43.jpg',NULL,NULL,NULL,38,1,'0'),(261,2,'Class Two','A',1,'HUMAYRA JANNAT ESHA','MAHAMUDUL ALAM BABUL','SONIA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2020-05-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712030492','2A1','2/1.jpg',NULL,NULL,NULL,3,0,'0'),(262,2,'Class Two','A',2,'NISHAT NUR','MD IMRAN MALLIK','YASMIN KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2008-03-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801318600628','2A2','2/2.jpg',NULL,NULL,NULL,15,0,'0'),(263,2,'Class Two','A',3,'JYOTI BISWAS','JIBAN BISWAS','SUPRIYA MAJUMDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-07-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913986475','2A3','2/3.jpg',NULL,NULL,NULL,2,0,'0'),(264,2,'Class Two','A',4,'MORIOM KABIR TOYA','MD HUMAUN KABIR','SHAMIMA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2001-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737298189','2A4','2/4.jpg',NULL,NULL,NULL,7,0,'0'),(265,2,'Class Two','A',5,'RAISA RAHMAN RIMU','MD HAFIJUR RAHMAN','SAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-04-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719212113','2A5','2/5.jpg',NULL,NULL,NULL,10,0,'0'),(266,2,'Class Two','A',6,'DITIPRIYA MAJUMDER','DIPANKAR MAJUMDER','MUKTA SARKER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801862105314','2A6','2/6.jpg',NULL,NULL,NULL,11,0,'0'),(267,2,'Class Two','A',7,'ANUP SHIKARI','NIRMAL SHIKARI','PINKI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2024-12-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801994046694','2A7','2/7.jpg',NULL,NULL,NULL,18,0,'0'),(268,2,'Class Two','A',8,'FATIN SHAHRIAR KHAN','TAGOR KHAN','AKHI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2003-04-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801797009518','2A8','2/8.jpg',NULL,NULL,NULL,4,0,'0'),(269,2,'Class Two','A',9,'ANISHA MUMTAJ','MAHFUJUL HAQUE','ZANNATUN NAYM','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801730719970','2A9','2/9.jpg',NULL,NULL,NULL,8,0,'0'),(270,2,'Class Two','A',10,'MAHNOOR AFROZ','MD MAHABUBUR RAHMAN','ITI AFROZ BULBUL','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731500731','2A10','2/10.jpg',NULL,NULL,NULL,9,0,'0'),(271,2,'Class Two','A',11,'RAIYAN RAFI','FARIDUL ISLAM','RUMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801704772202','2A11','2/11.jpg',NULL,NULL,NULL,5,0,'0'),(272,2,'Class Two','A',12,'SHARIF MAHIR ABSAR','SHAH ALAM SHARIF','TAJMIRA MOSTARI','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732394958','2A12','2/12.jpg',NULL,NULL,NULL,20,0,'0'),(273,2,'Class Two','A',13,'MD ADIYAT RAHMAN TAZBHI','MD MOFIZUR RAHMAN','MORSHADA AFROZ','Not Avliable','Not Avliable','Not Avliable','MALE','2021-11-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729978880','2A13','2/13.jpg',NULL,NULL,NULL,14,0,'0'),(274,2,'Class Two','A',14,'MD JAKARIA SHIKDER','HACEBUR RAHAMAN SIKDER','MST FATIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611954783','2A14','2/14.jpg',NULL,NULL,NULL,21,0,'0'),(275,2,'Class Two','A',15,'MANHA MEHJABEEN','SHAIKH MARUF BILLAH','MOUMITA YEASMIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2005-06-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801792031157','2A15','2/15.jpg',NULL,NULL,NULL,31,3,'0'),(276,2,'Class Two','A',16,'NAZMIN NAHAR','MD NIZAM UDDIN MOLLA','SHUMANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672190167','2A16','2/16.jpg',NULL,NULL,NULL,23,0,'0'),(277,2,'Class Two','A',17,'PROKRITI BISWAS','SUBRATA BISWAS','CHAMPA PODDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801982577122','2A17','2/17.jpg',NULL,NULL,NULL,17,0,'0'),(278,2,'Class Two','A',18,'MOHONA ROY','ASIM KUMAR ROY','MALA BARAI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2028-11-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801918366424','2A18','2/18.jpg',NULL,NULL,NULL,6,0,'0'),(279,2,'Class Two','A',19,'SENEGIDA AFRIN','EMDADUL HAQE MILAN','NAHEDA HAQUE DOLLY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-01-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801621220366','2A19','2/19.jpg',NULL,NULL,NULL,13,0,'0'),(280,2,'Class Two','A',20,'SRIJAN SARKAR','SUJIPTA SARKAR','NANDINI SEN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801748959577','2A20','2/20.jpg',NULL,NULL,NULL,19,0,'0'),(281,2,'Class Two','A',21,'TOKY MOLLA','RAHMAT','TAHAMINA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2004-04-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914920004','2A21','2/21.jpg',NULL,NULL,NULL,25,0,'0'),(282,2,'Class Two','A',22,'NIBIR AVEEK BAIN','SABITABRATA BAIN','NIPA BEPARI','Not Avliable','Not Avliable','Not Avliable','MALE','2002-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611262728','2A22','2/22.jpg',NULL,NULL,NULL,16,0,'0'),(283,2,'Class Two','A',23,'ADITI RAI','BISHAJIT RAI','ANANNA DATTO','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801725387204','2A23','2/23.jpg',NULL,NULL,NULL,22,0,'0'),(284,2,'Class Two','A',24,'SAHARA MONI','SHAHA ALAM MOLLA','FARJANA AKTER KEYA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2026-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801315980094','2A24','2/24.jpg',NULL,NULL,NULL,26,1,'0'),(285,2,'Class Two','A',25,'MD NAIM','ATHAR MOLLA','MANIRA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-06-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801917637105','2A25','2/25.jpg',NULL,NULL,NULL,32,3,'0'),(286,2,'Class Two','A',26,'MD HASAN','MD MOHASHIN','JONAKI KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801961420989','2A26','2/26.jpg',NULL,NULL,NULL,30,3,'0'),(287,2,'Class Two','A',27,'PROGGA BOSU TILA','TAPOS BOSU','SUCHANDA BASU','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-03-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801844603283','2A27','2/27.jpg',NULL,NULL,NULL,24,0,'0'),(288,2,'Class Two','A',28,'SHREYAN BISWAS','SUNIRMAL BISWAS','BITHIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2017-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712221424','2A28','2/28.jpg',NULL,NULL,NULL,29,2,'0'),(289,2,'Class Two','A',29,'ANUSHKA HIRA','APURBA HIRA','MONE BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960927022','2A29','2/29.jpg',NULL,NULL,NULL,27,1,'0'),(290,2,'Class Two','A',30,'JANNATUL MAWA TASNIA','SARDER RAZOUAN','MEHERUNNESA KHATUN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-01-28','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801911566242','2A30','2/30.jpg',NULL,NULL,NULL,12,0,'0'),(291,2,'Class Two','A',31,'HABIBA AKTER EMI','YASIN MIAH','YEASMIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801611847322','2A31','2/31.jpg',NULL,NULL,NULL,33,3,'0'),(292,2,'Class Two','A',32,'MD LABIB UDDIN SABID','MD KHABIR UDDIN','LABONE KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801912636213','2A32','2/32.jpg',NULL,NULL,NULL,28,2,'0'),(293,2,'Class Two','A',33,'SAYINTIKA GOLDER','SWAPAN GOLDER','BEAUTY BALA','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756255618','2A33','2/33.jpg',NULL,NULL,NULL,1,0,'0'),(294,3,'Class Three','A',1,'HAFSA AKTER','MASUDUL HAQUE KHAN','HALIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801740876876','3A1','3/1.jpg',NULL,NULL,NULL,2,0,'0'),(295,3,'Class Three','A',2,'AFIA AFRIN MEEM','KAZI SOHEL RANA','TAMANNA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722427691','3A2','3/2.jpg',NULL,NULL,NULL,5,0,'0'),(296,3,'Class Three','A',3,'NAFISA ZAARA','MOHAMMAD MAHBUBUR RAHMAN','HABIBA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-01-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732444638','3A3','3/3.jpg',NULL,NULL,NULL,3,0,'0'),(297,3,'Class Three','A',4,'SAMRIN ISLAM','MD ABU SUFIAN','CHADNI SIKDER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-09-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801886764456','3A4','3/4.jpg',NULL,NULL,NULL,18,0,'0'),(298,3,'Class Three','A',5,'TAKWA ISLAM','PALASH MIA','RUNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-10-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801326971819','3A5','3/5.jpg',NULL,NULL,NULL,12,0,'0'),(299,3,'Class Three','A',6,'KAZI SHAWAL SHAWON','KAZI IQBAL HOSSAN','SAHINA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-07-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801783380066','3A6','3/6.jpg',NULL,NULL,NULL,6,0,'0'),(300,3,'Class Three','A',7,'ABU TALHA','MD. RAFIUL ISLAM','BITHEE KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801857069100','3A7','3/7.jpg',NULL,NULL,NULL,4,0,'0'),(301,3,'Class Three','A',8,'SAAD MAHMUD','MD AKKAS ALI','SALMA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2016-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731336006','3A8','3/8.jpg',NULL,NULL,NULL,7,0,'0'),(302,3,'Class Three','A',9,'AVIJIT HALDAR','SANJIT KUMAR HALDAR','MONISHA MOZUMDER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734120230','3A9','3/9.jpg',NULL,NULL,NULL,9,0,'0'),(303,3,'Class Three','A',10,'KAZI RADIA AKTER','KAZI ABDUR RAHIM','SAKINA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-07-22','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801839894080','3A10','3/10.jpg',NULL,NULL,NULL,21,0,'0'),(304,3,'Class Three','A',11,'FARHANA MEHJABIN','MAHAMUDUL HASAN','SHAHINUR KHANUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728550415','3A11','3/11.jpg',NULL,NULL,NULL,14,0,'0'),(305,3,'Class Three','A',12,'AHNAF SALEH AAYAN','DR. MD ABU SALEH','DR. SOHANA SARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801713579016','3A12','3/12.jpg',NULL,NULL,NULL,10,0,'0'),(306,3,'Class Three','A',13,'SABIHA ZAMAN RAISA','MD RASEL KHAN','SUMI KHANOM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801859133960','3A13','3/13.jpg',NULL,NULL,NULL,13,0,'0'),(307,3,'Class Three','A',14,'POULOMI BHADRA','PORITOSH BHADRA','RUPA DAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-06-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717438618','3A14','3/14.jpg',NULL,NULL,NULL,15,0,'0'),(308,3,'Class Three','A',15,'SRISTY SARKAR','RATAN KUMAR SARKAR','KRISHNA RANI SARKAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-11-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801776246736','3A15','3/15.jpg',NULL,NULL,NULL,27,0,'0'),(309,3,'Class Three','A',16,'MAHIM ALI KHAN','MAHAMAD KHA','TANIA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801320597804','3A16','3/16.jpg',NULL,NULL,NULL,17,0,'0'),(310,3,'Class Three','A',17,'PAKHI BISWAS','PARESH BISWAS','SUJALA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-10-20','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801920738658','3A17','3/17.jpg',NULL,NULL,NULL,24,0,'0'),(311,3,'Class Three','A',18,'RAHMAN ABRAR JAHIN','S.M. MIZANUR RAHMAN','MST SHILPI KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2014-12-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711976067','3A18','3/18.jpg',NULL,NULL,NULL,25,0,'0'),(312,3,'Class Three','A',19,'MAHIRA ISLAM ADREETA','MD. MAHIRUL ISLAM','SINTHIA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-04-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801683953889','3A19','3/19.jpg',NULL,NULL,NULL,8,0,'0'),(313,3,'Class Three','A',20,'ABID HASSEN','JAHID HOSEN','KHALADA PARVIN SUME','Not Avliable','Not Avliable','Not Avliable','MALE','2015-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801706852713','3A20','3/20.jpg',NULL,NULL,NULL,28,0,'0'),(314,3,'Class Three','A',21,'RESUN MOLLAH','NUR MOHAMMAD MOLLAH','RITA PARVIN','Not Avliable','Not Avliable','Not Avliable','MALE','2016-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801735028689','3A21','3/21.jpg',NULL,NULL,NULL,33,0,'0'),(315,3,'Class Three','A',22,'MD. ALI','MD. MAHABUB MOLLA','RUNA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2016-03-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759155675','3A22','3/22.jpg',NULL,NULL,NULL,29,0,'0'),(316,3,'Class Three','A',23,'TURJO BAIDYA','NIRANJAN BAIDYA','ARSTI MADHU','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722274280','3A23','3/23.jpg',NULL,NULL,NULL,31,0,'0'),(317,3,'Class Three','A',24,'HUSSAIN AHMED','MIZANUR RAHMAN','FATEMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2015-12-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801644529988','3A24','3/24.jpg',NULL,NULL,NULL,40,2,'0'),(318,3,'Class Three','A',25,'MD. MASUM SHEKH','SHEKH LABU HOSSAIN','MARUFA','Not Avliable','Not Avliable','Not Avliable','MALE','2014-09-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712162727','3A25','3/25.jpg',NULL,NULL,NULL,35,1,'0'),(319,3,'Class Three','A',26,'TASNIM ISLAM MIMO','AL-MAMUN','SHARIFA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-03-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966314936','3A26','3/26.jpg',NULL,NULL,NULL,42,4,'0'),(320,3,'Class Three','A',27,'ZOBAIDA AKTER EVA','MD ABUL BASHAR SHAIKH','JESMINE AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2014-05-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712651335','3A27','3/27.jpg',NULL,NULL,NULL,32,0,'0'),(321,3,'Class Three','A',28,'SHEIKH SADIK DAIAN','DULAL SHEIKH','SHILPI','Not Avliable','Not Avliable','Not Avliable','MALE','2015-09-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712624828','3A28','3/28.jpg',NULL,NULL,NULL,41,3,'0'),(322,3,'Class Three','A',29,'MD. ZISHAN CHOWDHURY','IMRAN CHOWDHURY','AFROZA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2016-01-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801966925138','3A29','3/29.jpg',NULL,NULL,NULL,34,0,'0'),(323,3,'Class Three','A',30,'RAFAYET HOSSAIN RAJA','MOHAMMED MILAD HOSSAIN','NAZNIN SULTANA SHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801710963272','3A30','3/30.jpg',NULL,NULL,NULL,45,6,'0'),(324,3,'Class Three','A',31,'ARIYAN DAS ARGHYO','ANUP KUMAR DAS','MITALI SAHA','Not Avliable','Not Avliable','Not Avliable','MALE','2016-03-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712172961','3A31','3/31.jpg',NULL,NULL,NULL,16,0,'0'),(325,3,'Class Three','A',32,'CHAYAN ROY','DIPANKAR ROY','RICKTA MONDOL','Not Avliable','Not Avliable','Not Avliable','MALE','2016-09-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716561667','3A32','3/32.jpg',NULL,NULL,NULL,19,0,'0'),(326,3,'Class Three','A',33,'ARBAD HOSSAIN ANIF','MD. ABDUL ALIM','KHALIDA ADIB','Not Avliable','Not Avliable','Not Avliable','MALE','2015-11-03','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762612239','3A33','3/33.jpg',NULL,NULL,NULL,23,0,'0'),(327,3,'Class Three','A',34,'SHEIKH MD MAHIR SHAHARIAR','MANIRUZZAMAN SHEIKH','POPY SIKDER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-09-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712613687','3A34','3/34.jpg',NULL,NULL,NULL,20,0,'0'),(328,3,'Class Three','A',35,'NANDINI BISWAS','NABAKUMAR BISWAS','KALPANA MANDOL','Not Avliable','Not Avliable','Not Avliable','FEMALE','2004-05-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737735619','3A35','3/35.jpg',NULL,NULL,NULL,22,0,'0'),(329,3,'Class Three','A',36,'TAIB AL HASAN','RASEL KABIR','MST FARHANA SIDDIKA','Not Avliable','Not Avliable','Not Avliable','MALE','2017-04-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756594453','3A36','3/36.jpg',NULL,NULL,NULL,38,1,'0'),(330,3,'Class Three','A',37,'RUPONTY BINTEY HADI','FAKIR MD HADIUZZAMAN','MONALISA RAHMAN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-06-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672905050','3A37','3/37.jpg',NULL,NULL,NULL,44,6,'0'),(331,3,'Class Three','A',38,'FATEMA ISLAM','MD TOREKUL ISLAM','SHAHIDA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2022-12-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801727439288','3A38','3/38.jpg',NULL,NULL,NULL,30,0,'0'),(332,3,'Class Three','A',39,'ANISHA AKTER JARI','MD ABUL KHAYER','NAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-08-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801687474968','3A39','3/39.jpg',NULL,NULL,NULL,43,5,'0'),(333,3,'Class Three','A',40,'TANZIMA KHAN DHOOA','K.M RAMZAN ALI','MUKTA CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-11-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719149242','3A40','3/40.jpg',NULL,NULL,NULL,39,1,'0'),(334,3,'Class Three','A',41,'UMME AIMAN YEARA','ASADUL ISLAM','SHAYLA ISLAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2016-02-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','3A41','3/41.jpg',NULL,NULL,NULL,36,1,'0'),(335,3,'Class Three','A',42,'ZAIN ABDULLAH RAFAN','AZHARUL ISLAM','ROKSANA AKHTER','Not Avliable','Not Avliable','Not Avliable','MALE','2015-02-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801727811268','3A42','3/42.jpg',NULL,NULL,NULL,1,0,'0'),(336,3,'Class Three','A',43,'ALIF SHEIKH','HASAN ALI SHEIKH','KHUKU BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2024-03-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756545544','3A43','3/43.jpg',NULL,NULL,NULL,11,0,'0'),(337,3,'Class Three','A',44,'SADNAN SAMI','MD. BADAR MIA','UMMA KULSUM SOPNA','Not Avliable','Not Avliable','Not Avliable','MALE','2014-10-31','0','0','0','Vill: POST:  THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801705046448','3A44','3/44.jpg',NULL,NULL,NULL,37,1,'0'),(338,3,'Class Three','A',45,'ADITI GHOSH','SHAROZIT KUMAR GHOSH','MITALI RANI GHOSH','Not Avliable','Not Avliable','Not Avliable','FEMALE','2015-06-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801799122796','3A45','3/45.jpg',NULL,NULL,NULL,26,0,'0'),(354,4,'Class Four','A',16,'MOHAMMADULLAH ABRAR','MAMUN KHAN','SAMIRA AKTAR','Not Avliable','Not Avliable','Not Avliable','MALE','2006-09-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801537378644','4A16','4/16.jpg',NULL,NULL,NULL,14,0,'0'),(390,5,'Class Five','A',21,'SAMIA ZAMAN RUHI','MD MONIRUZZAMAN MOLLA','SHAHANAJ PARVIN RATNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-11-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801751444477','5A21','5/21.jpg',NULL,NULL,NULL,18,0,'0'),(393,5,'Class Five','A',24,'MD SALMAN','MD MIJANUUR RAHAMAN','MUSLIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2012-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801736556342','5A24','5/24.jpg',NULL,NULL,NULL,25,0,'0'),(394,5,'Class Five','A',25,'SRUTI SAHA','SATTA KUMAR SAHA','RIMPA SAHA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-10-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','5A25','5/25.jpg',NULL,NULL,NULL,22,0,'0'),(396,5,'Class Five','A',27,'SAKIB HOSSAIN','MD AROZ ALI','LABANI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726438349','5A27','5/27.jpg',NULL,NULL,NULL,28,6,'0'),(397,5,'Class Five','A',28,'JUNAID RAIYAN','MD AMIR HOSSAIN','REHANA HOSSAIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-12-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801915645252','5A28','5/28.jpg',NULL,NULL,NULL,29,6,'0'),(398,5,'Class Five','A',29,'MD. ADIL AHNAF TARIF','MD. MAMUNUR RASHID','MST. NASRIN SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-12-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801739726374','5A29','5/29.jpg',NULL,NULL,NULL,4,0,'0'),(399,6,'Class Six','A',1,'KAZI MINHAZUL ISLAM','KAZI MIZANUR RAHAMAN','UMMAY KULSUM','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722147495','6A1','6/1.jpg',NULL,NULL,NULL,3,0,'0'),(400,6,'Class Six','A',2,'THEOPHIL GAIN HEAVEN','TOTON GAIN','RIPA MODHU','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801700000000','6A2','6/2.jpg',NULL,NULL,NULL,8,0,'0'),(401,6,'Class Six','A',3,'TANJIR KABIR','RASEL KABIR','MST.FARHANA SIDDIKA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-01-08','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801853000266','6A3','6/3.jpg',NULL,NULL,NULL,38,0,'0'),(402,6,'Class Six','A',4,'KAMOLIKA BALA','DIPANGKAR BALA','GAYATRI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2013-11-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801741285352','6A4','6/4.jpg',NULL,NULL,NULL,15,0,'0'),(403,6,'Class Six','A',5,'AREFA HOQUE','MD.ANAWARUL HOQUE','SHAIDA SULTNA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2012-06-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712051023','6A5','6/5.jpg',NULL,NULL,NULL,64,10,'0'),(404,6,'Class Six','A',6,'SHEIKH MAHYAN ALAM','SHEIKH SHUDRUL ALAM','JARIN SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801734913635','6A6','6/6.jpg',NULL,NULL,NULL,14,0,'0'),(405,6,'Class Six','A',7,'SIKDER MOHAMMOD MASRAFY','RABYUL SIKDER','MUSOMI','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716658595','6A7','6/7.jpg',NULL,NULL,NULL,23,0,'0'),(406,6,'Class Six','A',8,'MD.YEASRIB ENAN','ANAYET HOSEN','EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2013-07-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801798766844','6A8','6/8.jpg',NULL,NULL,NULL,36,0,'0'),(407,6,'Class Six','A',9,'AENAN IBNA MUSA','MD.MUSA KALIMULLA','EYERINE','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801633551098','6A9','6/9.jpg',NULL,NULL,NULL,9,0,'0'),(408,6,'Class Six','A',10,'MD.TAUSIFUL ISLAM','MOLLA MD.HEDAYETULLAH','TAYIABA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2012-10-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801834017970','6A10','6/10.jpg',NULL,NULL,NULL,56,10,'0'),(409,6,'Class Six','A',11,'MD.TAJIM SHEIKH','ANICHUR RAHAMAN','SONIA BEGUM JANI','Not Avliable','Not Avliable','Not Avliable','MALE','2013-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801758338342','6A11','6/11.jpg',NULL,NULL,NULL,53,6,'0'),(410,6,'Class Six','A',12,'RUDRANIL BAIN','RANJAN CHANDRA BAIN','SUBARNA MAITRA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-10-17','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712578166','6A12','6/12.jpg',NULL,NULL,NULL,27,0,'0'),(411,6,'Class Six','A',13,'MUNSI SANY HOSSAIN','MUNSI MESKAT HOSSIN','ROKSHANA KHAN RITA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-07-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801961572633','6A13','6/13.jpg',NULL,NULL,NULL,58,10,'0'),(412,6,'Class Six','A',14,'ABDULLAH BISWAS','BADRUL BISWAS','RUME KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2013-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801580988832','6A14','6/14.jpg',NULL,NULL,NULL,60,10,'0'),(413,6,'Class Six','A',15,'SHAJIAT SHAH ISHAN','MUHAMMAD SHAJJATUR RAHAMAN','MAHAMUDA SHARMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-05-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711131123','6A15','6/15.jpg',NULL,NULL,NULL,52,4,'0'),(414,6,'Class Six','A',16,'AL MAMUN','TOWHIDUL ISLAM','MST. BALI KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960650140','6A16','6/16.jpg',NULL,NULL,NULL,43,1,'0'),(415,6,'Class Six','A',17,'JOYITA MAHAMUD','MD AL MAHAMUD KHAKI','ABIDA SULTANA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2017-07-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711482053','6A17','6/17.jpg',NULL,NULL,NULL,2,0,'0'),(416,6,'Class Six','A',18,'MD NAIMUL ISLAM OVI','MD LELIN MOLLA','NADIRA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2027-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801965887663','6A18','6/18.jpg',NULL,NULL,NULL,25,0,'0'),(417,6,'Class Six','A',19,'CAMIM ISLAM RIFAT','RUBEL SHIKDAR','SAYMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','6A19','6/19.jpg',NULL,NULL,NULL,55,9,'0'),(418,6,'Class Six','A',20,'ABDULLA','KAMRUL BISWAS','SIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801304793452','6A20','6/20.jpg',NULL,NULL,NULL,51,3,'0'),(419,6,'Class Six','A',21,'MUGDHA SARKAR','ANGSHUPATI SARKAR','MANISHA SARKAR','Not Avliable','Not Avliable','Not Avliable','MALE','2022-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745015540','6A21','6/21.jpg',NULL,NULL,NULL,44,1,'0'),(420,6,'Class Six','A',22,'SM NAZMUL HOSSAIN','MAHMUD HOSSAIN SARDER','MOUSUMI KHANAM','এস এম নাজমুল হোসেন','মাহমুদ হোসেন সরদার','মৌসুমী খানম','MALE','2012-10-29','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723613061','6A22','6/22.jpg',NULL,NULL,NULL,32,0,'0'),(421,6,'Class Six','A',23,'TASNIM AKTER','MD RABIUL HAQUE','CAMELI CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','FEMALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801723844127','6A23','6/23.jpg',NULL,NULL,NULL,18,0,'0'),(422,6,'Class Six','A',24,'NUSRAT JAHAN','MD KAYUM MOLLA','MONIRA KHANAM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2006-08-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801944467457','6A24','6/24.jpg',NULL,NULL,NULL,37,0,'0'),(423,6,'Class Six','A',25,'FAHIM SIKDEE','ISABUL HAQUE SIKDER','LABUNI KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2027-03-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','6A25','6/25.jpg',NULL,NULL,NULL,49,2,'0'),(424,6,'Class Six','A',26,'MD AB HAMID SHEIKH','MD LITU SHEIKH','KHADIJA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2003-07-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801960210428','6A26','6/26.jpg',NULL,NULL,NULL,63,10,'0'),(425,6,'Class Six','A',27,'SHEIKH SALMAN JABER','RASHEDUL ISLAM','KAMRUNNAHAR LUCKY','Not Avliable','Not Avliable','Not Avliable','MALE','2014-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801301552483','6A27','6/27.jpg',NULL,NULL,NULL,10,0,'0'),(426,6,'Class Six','A',28,'ANDALIB RAHMAN','SHAGOR AHMED','HALIMA KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2029-10-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801608490585','6A28','6/28.jpg',NULL,NULL,NULL,35,0,'0'),(427,6,'Class Six','A',29,'MD MEHARAB HOSSAN','MD MANAN MOLLA','ASMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-10-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801749081291','6A29','6/29.jpg',NULL,NULL,NULL,46,1,'0'),(428,6,'Class Six','A',30,'MD SULTAN MOLLA','MD ZAKIR HOSSAIN','ALEYA PAEVIN','Not Avliable','Not Avliable','Not Avliable','MALE','2023-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801915931289','6A30','6/30.jpg',NULL,NULL,NULL,1,0,'0'),(429,6,'Class Six','A',31,'MD TAUSIF JAHAN','KHANJAHAN ALI SHEIKH','NAZMOON NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2018-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724478846','6A31','6/31.jpg',NULL,NULL,NULL,30,0,'0'),(430,6,'Class Six','A',32,'PEYEL MONDOL','PALASH KUMAR MONDOL','LIPIKA HAJRA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801951536392','6A32','6/32.jpg',NULL,NULL,NULL,22,0,'0'),(431,6,'Class Six','A',33,'ARANYA PODDER TAMAL','MONOJ KUMAR PODDER','JHUNU SARKER','Not Avliable','Not Avliable','Not Avliable','MALE','2013-11-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801310673404','6A33','6/33.jpg',NULL,NULL,NULL,4,0,'0'),(432,6,'Class Six','A',34,'APRON RAY','PROTAP ROY','ARCHANA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2007-09-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801916682614','6A34','6/34.jpg',NULL,NULL,NULL,29,0,'0'),(433,6,'Class Six','A',35,'NAYEEF BIN HASAN','MD ABUL HASAN','NASNIN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2001-06-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801990024242','6A35','6/35.jpg',NULL,NULL,NULL,16,0,'0'),(434,6,'Class Six','A',36,'MUSFIKUZZAMAN TASIM','GAJI ASIKUZZAMAN PALASH','NADIRA FERDOUS MUNNI','Not Avliable','Not Avliable','Not Avliable','MALE','2030-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801964074869','6A36','6/36.jpg',NULL,NULL,NULL,41,0,'0'),(435,6,'Class Six','A',37,'PROLOY MONDAL','DOLAL MONDOL','ANAMIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2012-06-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801377939104','6A37','6/37.jpg',NULL,NULL,NULL,47,2,'0'),(436,6,'Class Six','A',38,'TAZNEEM RAHMAN RIDONE','MOLLA MASUDUR RAHMAN','MST BEAUTY KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2008-03-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801759296432','6A38','6/38.jpg',NULL,NULL,NULL,42,1,'0'),(437,6,'Class Six','A',39,'MD SABID KHAN','K M SAFIQUL ISLAM','REMA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2021-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726581441','6A39','6/39.jpg',NULL,NULL,NULL,54,9,'0'),(438,6,'Class Six','A',40,'RAFSHAN','ANICH SHEKH','RABITEA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-10-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801747377552','6A40','6/40.jpg',NULL,NULL,NULL,40,0,'0'),(439,6,'Class Six','A',41,'SUDARSHAN BHAKTA','SUBRATA KUMAR BHAKTA','LOVELY BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2027-07-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760202295','6A41','6/41.jpg',NULL,NULL,NULL,24,0,'0'),(440,6,'Class Six','A',42,'AREEB AYAAN','MD ASADUZZAMAN KHAN','KHALADA NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2018-02-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717337438','6A42','6/42.jpg',NULL,NULL,NULL,5,0,'0'),(441,6,'Class Six','A',43,'ARAFAT KHAN','SHAHIN KHAN','SALMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2001-01-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801300813900','6A43','6/43.jpg',NULL,NULL,NULL,48,2,'0'),(442,6,'Class Six','A',44,'JARIF NEWAZ ARNOB','EKRAMUL NAWAZ','UPOMA RAHMAN','Not Avliable','Not Avliable','Not Avliable','MALE','2024-01-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801888586307','6A44','6/44.jpg',NULL,NULL,NULL,11,0,'0'),(443,6,'Class Six','A',45,'MUNSHI TASNIM HABIB','MUNSHI ABU SUFIAN','FATEMA KAMRUN NAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2030-09-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711104396','6A45','6/45.jpg',NULL,NULL,NULL,20,0,'0'),(444,6,'Class Six','A',46,'NAZAT AL SIAM','MD BAHARUL SHEIKH','ANAMIKA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2021-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801308954439','6A46','6/46.jpg',NULL,NULL,NULL,21,0,'0'),(445,6,'Class Six','A',47,'PAPRI BISWAS','SUUBHOSH CHANDRA BISWAS','NAMITA BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2025-12-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801979484931','6A47','6/47.jpg',NULL,NULL,NULL,50,3,'0'),(446,6,'Class Six','A',48,'SAMIA RAYHAN','JAHIR RAYHAN PALASH','HAMIDA YEASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2026-04-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801706454263','6A48','6/48.jpg',NULL,NULL,NULL,26,0,'0'),(447,6,'Class Six','A',49,'SAHAD SAMIR','HEROK SORDAR','SABERA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2021-05-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801','6A49','6/49.jpg',NULL,NULL,NULL,39,0,'0'),(448,6,'Class Six','A',50,'ARJO MANDAL','UTTAM KUMAR MANDAL','MANGALI HIRA','Not Avliable','Not Avliable','Not Avliable','MALE','2028-10-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801717322224','6A50','6/50.jpg',NULL,NULL,NULL,13,0,'0'),(449,6,'Class Six','A',51,'TAMIM FOKIR','HASAN FOKIR','TANIA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-14','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801793582091','6A51','6/51.jpg',NULL,NULL,NULL,12,0,'0'),(450,6,'Class Six','A',52,'MD SHAKIB MOLLA','MD BABLUE MOLLA','DALIA KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2002-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801794247117','6A52','6/52.jpg',NULL,NULL,NULL,31,0,'0'),(451,6,'Class Six','A',53,'ROJA MONI','MD RAJU AHAMED','SHORIFA AKTER SHILPI','Not Avliable','Not Avliable','Not Avliable','FEMALE','2021-07-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801928757995','6A53','6/53.jpg',NULL,NULL,NULL,28,0,'0'),(452,6,'Class Six','A',54,'AHASANUR RAHAMAN','MD WASIKUR RAHAMAN','LUTFUNNAHAR','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801720472266','6A54','6/54.jpg',NULL,NULL,NULL,62,10,'0'),(453,6,'Class Six','A',55,'RAYHAN AHMED AORKO','MD MAHAFUJUR RAHAMAN','SUMIYA SOMA','Not Avliable','Not Avliable','Not Avliable','MALE','2002-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801931971192','6A55','6/55.jpg',NULL,NULL,NULL,34,0,'0'),(454,6,'Class Six','A',56,'MD LABIB FAIAZ HOSSAIN','MD SAHADAT HOSSAIN BHUYAN','ABIDA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-09-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801719902297','6A56','6/56.jpg',NULL,NULL,NULL,61,10,'0'),(455,6,'Class Six','A',57,'SHEIKH ABU HURAYRA ARMAN','ISRAIL KALIM','ESMAT ARA','Not Avliable','Not Avliable','Not Avliable','MALE','2023-08-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732545360','6A57','6/57.jpg',NULL,NULL,NULL,7,0,'0'),(456,6,'Class Six','A',58,'ABRAR FAHAD SUVRO','MUHAMMAD ENAMUL HAQE','MST. ZAKIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2012-11-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801711906014','6A58','6/58.jpg',NULL,NULL,NULL,45,1,'0'),(457,6,'Class Six','A',59,'MOHAMMMAD ILHAM ZAFIR','MD. ANAMUL HOQUE','MAFUZAN','Not Avliable','Not Avliable','Not Avliable','MALE','2012-07-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801730006603','6A59','6/59.jpg',NULL,NULL,NULL,6,0,'0'),(458,6,'Class Six','A',60,'JAYEF MAHMUD','MD. SHARIF MAHMUD','','Not Avliable','Not Avliable','Not Avliable','MALE','2012-09-30','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801831074047','6A60','6/60.jpg',NULL,NULL,NULL,59,10,'0'),(459,6,'Class Six','A',61,'MD. NAIMUR RAHMAN DURJOY','MD. ZAHID SIKDER','SHAMIMA AKTER SHIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2013-10-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801407132746','6A61','6/61.jpg',NULL,NULL,NULL,33,0,'0'),(460,6,'Class Six','A',63,'SRABON SHEIKH','MD. MONIR HOSSEN','SUMI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2014-08-15','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801977384698','6A63','6/62.jpg',NULL,NULL,NULL,57,10,'0'),(508,7,'Class Seven','A',48,'SABIT AL HASAN','MD KHAYRUL ISLAM','SALMIN AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726055891','7A48','7/48.jpg',NULL,NULL,NULL,24,0,'0'),(512,7,'Class Seven','A',52,'MD. KAUCHAR','BELLAL HOSSAIN TALUKDER','NARGIS BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-10-25','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716470794','7A52','7/52.jpg',NULL,NULL,NULL,52,7,'0'),(519,8,'Class Eight','A',1,'SANCHARY MALAKER','SATYENDRA NATH MALAKER','SHILPI RANI MIRBOR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-10-10','0','0','0','Vill: PanchuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801917263061','8A1','8/1.jpg',NULL,NULL,NULL,3,0,'0'),(520,8,'Class Eight','A',2,'SADIA RAYHAN','ZAHIR RAYHAN PALASH','HAMIDA YESMIN','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-03-23','0','0','0','Vill: IslambagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801706454263','8A2','8/2.jpg',NULL,NULL,NULL,16,0,'0'),(521,8,'Class Eight','A',3,'LAMIYATUL BARI','GOLAM AZAM','ZUGLUNNAHAR','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-08-13','0','0','0','Vill: Comisanar RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801921501338','8A3','8/3.jpg',NULL,NULL,NULL,1,0,'0'),(522,8,'Class Eight','A',4,'NOWSIN JANNAT MITHILA','MD. MAHAMUD ALAM','FARJANA AKTER RUMA','Not Avliable','Not Avliable','Not Avliable','FEMALE','2009-08-18','0','0','0','Vill: Chadmari RoadPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801732200863','8A4','8/4.jpg',NULL,NULL,NULL,14,0,'0'),(523,8,'Class Eight','A',5,'SUSMIT SAM BISWAS','NITISH CHANDRA BISWAS','SUMONA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-31','0','0','0','Vill: 312, Power Hoose RoadPOST: Gopalganj- 8100 THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716020231','8A5','8/5.jpg',NULL,NULL,NULL,6,0,'0'),(524,8,'Class Eight','A',6,'ANUSKA BAIN','AMARENDRA NATH BAIN','KANIKA RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-04-10','0','0','0','Vill: 62/1, PanchuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801759290882','8A6','8/6.jpg',NULL,NULL,NULL,10,0,'0'),(525,8,'Class Eight','A',7,'JOBAYER KHAN','SAGATUL ALOM KHAN SAGIR','MST. MAKSUDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-29','0','0','0','Vill: PachuriaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801713961300','8A7','8/7.jpg',NULL,NULL,NULL,8,0,'0'),(526,8,'Class Eight','A',8,'ATIF ALAM','BULBUL ALAM','NAZMUNNAHAR BANNA','Not Avliable','Not Avliable','Not Avliable','MALE','2009-07-17','0','0','0','Vill: 312, Bankpara, GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801629988294','8A8','8/8.jpg',NULL,NULL,NULL,35,0,'0'),(527,8,'Class Eight','A',9,'JANNATUL FERDOUS','MD. MONIRUL HAQUE NUTON','ASMA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-12-29','0','0','0','Vill: 154. Islambag, GopalganjPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801681289864','8A9','8/9.jpg',NULL,NULL,NULL,17,0,'0'),(528,8,'Class Eight','A',10,'GAZI SHAHABUDDIN','GAZI SHEHABUDDIN','SONIA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-15','0','0','0','Vill: 226, ArambaghPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801948600392','8A10','8/10.jpg',NULL,NULL,NULL,23,0,'0'),(529,8,'Class Eight','A',11,'HANJALA','SALIM MIA','SABINA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-01-01','0','0','0','Vill: PolicelinePOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801727319356','8A11','8/11.jpg',NULL,NULL,NULL,27,0,'0'),(530,8,'Class Eight','A',12,'JIBON SARKER','NABO KUMAR SARKER','ITIKA BOSE','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-17','0','0','0','Vill: Gohata KalibariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801729773336','8A12','8/12.jpg',NULL,NULL,NULL,13,0,'0'),(531,8,'Class Eight','A',13,'FARHAN MOLLA','OHID MOLLA','MOMOTAJ BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801308954949','8A13','8/13.jpg',NULL,NULL,NULL,28,0,'0'),(532,8,'Class Eight','A',14,'ANASHUA ANGEL','PRODYOT ROY','ISHITA ROY','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-08-27','0','0','0','Vill: 280/2 Binapani Girls School Road BottolaPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716355505','8A14','8/14.jpg',NULL,NULL,NULL,9,0,'0'),(533,8,'Class Eight','A',15,'TISHA ISLAM','SELIM MINA','TANIA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-09-13','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801672734150','8A15','8/15.jpg',NULL,NULL,NULL,15,0,'0'),(534,8,'Class Eight','A',16,'NAHIMUL ISLAM','NAZRUL ISLAM','NAFIZA ISLAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-02-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716715851','8A16','8/16.jpg',NULL,NULL,NULL,24,0,'0'),(535,8,'Class Eight','A',17,'APU MANDAL','DIPANKAR MANDAL','APARNA MANDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2006-11-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801907298939','8A17','8/17.jpg',NULL,NULL,NULL,40,0,'0'),(536,8,'Class Eight','A',18,'RAJ MAJUMDER','APURBA MAJUMDER','KONIKA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2012-11-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801969774510','8A18','8/18.jpg',NULL,NULL,NULL,32,0,'0'),(537,8,'Class Eight','A',19,'AYAN ARAF RAHMAN','AHMED MAHAFUJUR RAHMAN','TANIA','Not Avliable','Not Avliable','Not Avliable','MALE','2011-11-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801967600024','8A19','8/19.jpg',NULL,NULL,NULL,11,0,'0'),(538,8,'Class Eight','A',20,'ZAFEER RAHMAN','ZABIDUR RAHMAN','MAHBUBA RAHMAN','Not Avliable','Not Avliable','Not Avliable','MALE','2010-07-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801991045694','8A20','8/20.jpg',NULL,NULL,NULL,34,0,'0'),(539,8,'Class Eight','A',21,'SHEIKH BODRUL ISLAM','MD ABUL BASHAR SHAIKH','JESMINE AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801972651335','8A21','8/21.jpg',NULL,NULL,NULL,30,0,'0'),(540,8,'Class Eight','A',22,'MD. SIAM HOSSAIN','MD. DELOWAR HOSSAIN','TANZILA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-09-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801517369894','8A22','8/22.jpg',NULL,NULL,NULL,37,0,'0'),(541,8,'Class Eight','A',23,'SM TANVIR ANJUM PARTHIB','S.M. ABUJAR','AYESHA AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2011-06-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801877746456','8A23','8/23.jpg',NULL,NULL,NULL,36,0,'0'),(542,8,'Class Eight','A',24,'SAGOR CHOWDHURY','MD. BATCHU HOSSAIN','SHAHIDA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801982627569','8A24','8/24.jpg',NULL,NULL,NULL,47,2,'0'),(543,8,'Class Eight','A',25,'RUDRA PROTAP HALDER','PALTON HALDER','DIPA HALDER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-12','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801722096306','8A25','8/25.jpg',NULL,NULL,NULL,39,0,'0'),(544,8,'Class Eight','A',26,'TASIN SARDER','MIZANUR RAHMAN','FATEMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801644529988','8A26','8/26.jpg',NULL,NULL,NULL,31,0,'0'),(545,8,'Class Eight','A',27,'MUSTASIN SARDAR','MD. ALAMIN SARDER','MST URMI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-02','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801756168183','8A27','8/27.jpg',NULL,NULL,NULL,22,0,'0'),(546,8,'Class Eight','A',28,'SURAJ BISWAS','SAROJIT BISWAS','MUKTI SIKDAR','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801762789382','8A28','8/28.jpg',NULL,NULL,NULL,41,1,'0'),(547,8,'Class Eight','A',29,'SAMIUL ISLAM','WAHIDUL ISLAM','SABINA YASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2011-02-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801922392068','8A29','8/29.jpg',NULL,NULL,NULL,20,0,'0'),(548,8,'Class Eight','A',30,'ANAN JAMAN','MONIRUZZAMAN','TANIA','Not Avliable','Not Avliable','Not Avliable','MALE','2010-11-21','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801926539507','8A30','8/30.jpg',NULL,NULL,NULL,29,0,'0'),(549,8,'Class Eight','A',31,'ASADULLAH AL GALIB','MD. WAHIDUR RAHMAN CHOUDHURY','MST. JEUN NAHER','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729814100','8A31','8/31.jpg',NULL,NULL,NULL,26,0,'0'),(550,8,'Class Eight','A',32,'SHUAIB KHAN','MD. TOHIDULLAH KHAN','FARDAUSI SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-09','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703880089','8A32','8/32.jpg',NULL,NULL,NULL,33,0,'0'),(551,8,'Class Eight','A',33,'PROTIK BISWAS SAIKAT','RANAJIT KUMAR BESWAS','SHIPRA BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2011-08-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801726008510','8A33','8/33.jpg',NULL,NULL,NULL,5,0,'0'),(552,8,'Class Eight','A',34,'MD. SHARIAR RAHMAN','MD. ABDUR RAHMAN','MST. AYESHA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-12-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801732188226','8A34','8/34.jpg',NULL,NULL,NULL,7,0,'0'),(553,8,'Class Eight','A',35,'NAIMUL ISLAM','MOHAMMAD KAMRUL ISLAM','SUMAYA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801763816157','8A35','8/35.jpg',NULL,NULL,NULL,18,0,'0'),(554,8,'Class Eight','A',36,'SURAIYA ISLAM','MD. SHAFIQUL ISLAM','MST. SHIMA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2011-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801760668889','8A36','8/36.jpg',NULL,NULL,NULL,38,0,'0'),(555,8,'Class Eight','A',37,'MEFTAHUL ISLAM','MD.FORHAD HOSSAN','JAHANARA EASMIN','Not Avliable','Not Avliable','Not Avliable','MALE','2010-02-05','0','0','0','Vill: Gosher ChorPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801726741150','8A37','8/37.jpg',NULL,NULL,NULL,12,0,'0'),(556,8,'Class Eight','A',38,'HRIDOY SHEIKH','JAHID SHEIKH','SHILPI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801737916092','8A38','8/38.jpg',NULL,NULL,NULL,19,0,'0'),(557,8,'Class Eight','A',39,'ABDULLAH AL GALIB','RAFIKUL ISLAM','BOBITA','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712659030','8A39','8/39.jpg',NULL,NULL,NULL,48,3,'0'),(558,8,'Class Eight','A',40,'REJOICE ROY','MICHAEL ROY','LIMA ROY','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712711693','8A40','8/40.jpg',NULL,NULL,NULL,43,1,'0'),(559,8,'Class Eight','A',41,'RIZVI CHOWDHURY','RONY CHOWDHURY','AFROZA CHOWDHURY','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801913742031','8A41','8/41.jpg',NULL,NULL,NULL,42,1,'0'),(560,8,'Class Eight','A',42,'ABDULLAH ALAM ZARIB','MD MORSHED ALAM','RESMA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801728608650','8A42','8/42.jpg',NULL,NULL,NULL,21,0,'0'),(561,8,'Class Eight','A',43,'JOY MONDAL','GAYANTA KUMAR MANDAL','JHARNA RANI MANDAL','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716701004','8A43','8/43.jpg',NULL,NULL,NULL,25,0,'0'),(562,8,'Class Eight','A',44,'SM ABIR HOSSAN','MOSHIUR RAHAMAN','MUNNI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801731137513','8A44','8/44.jpg',NULL,NULL,NULL,46,2,'0'),(563,8,'Class Eight','A',45,'MD: ABU. RAYHAN','MD: EDRISH ALAM SHAKH','RUKSHANA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-09-11','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801774736325','8A45','8/45.jpg',NULL,NULL,NULL,44,2,'0'),(570,9,'Class Nine','A',7,'ANTU BOSE','Ashish Bose','Lopa Bosu','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801471322141','9A7','9/7.jpg',NULL,NULL,NULL,8,0,'0'),(574,9,'Class Nine','A',11,'AL- RAFI','MOHAMMAD FAYJUL MOLLA','AKLIMA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801718664568','9A11','9/11.jpg',NULL,NULL,NULL,52,10,'0'),(578,9,'Class Nine','A',15,'AMIR HAMJA','RABIUL ISLAM','ROZINA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: GhosercharPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801723740458','9A15','9/15.jpg',NULL,NULL,NULL,17,0,'0'),(581,9,'Class Nine','A',18,'PROTTOY SARKAR','Bishnu Kumar SARKAR','Shapla Rani SARKAR','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','880175231211','9A18','9/18.jpg',NULL,NULL,NULL,7,0,'0'),(584,9,'Class Nine','A',21,'F.M: FAHIM','ABUL KASHEM FAKIR','FARIDA PARVIN KASHEM','Not Avliable','Not Avliable','Not Avliable','MALE','2011-01-11','0','0','0','Vill: Bagchi BariPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801838441377','9A21','9/21.jpg',NULL,NULL,NULL,28,0,'0'),(585,9,'Class Nine','A',22,'MD. RAFIN FAKIR','MD. ZIHAD ALI','LIMA','Not Avliable','Not Avliable','Not Avliable','MALE','2004-12-23','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801906205328','9A22','9/22.jpg',NULL,NULL,NULL,42,1,'0'),(587,9,'Class Nine','A',24,'ABRAR FAHIM AVRO','','','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','880174546441','9A24','9/24.jpg',NULL,NULL,NULL,26,0,'0'),(590,9,'Class Nine','A',27,'MD. ARIYAN RAHMAN','Md. Aminur Rahman','Sheoli Aktar','Not Avliable','Not Avliable','Not Avliable','MALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801755211122','9A27','9/27.jpg',NULL,NULL,NULL,15,0,'0'),(599,9,'Class Nine','A',36,'SAKHILA KHNAM MIM','MD. MODHU SHAKE','SALMA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-12-15','0','0','0','Vill: Char manikdahPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801756453993','9A36','9/36.jpg',NULL,NULL,NULL,48,2,'0'),(602,9,'Class Nine','A',39,'LAMIA ISLAM','IMRAN ALI MOLLA','RUNA BEGUM','Not Avliable','Not Avliable','Not Avliable','FEMALE','2010-01-16','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801609047810','9A39','9/39.jpg',NULL,NULL,NULL,49,8,'0'),(607,9,'Class Nine','A',44,'MASHRAFE CHOWDHURY GYM','OSIKUL ISLAM','MUKTA BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2010-01-01','0','0','0','Vill: Shnty BagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801642669877','9A44','9/44.jpg',NULL,NULL,NULL,47,1,'0'),(611,9,'Class Nine','A',48,'MD: RABBI','MUTALEB HOSSAIN','MUNNI BEGUM','Not Avliable','Not Avliable','Not Avliable','MALE','2009-06-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754195792','9A48','9/48.jpg',NULL,NULL,NULL,44,1,'0'),(612,9,'Class Nine','A',49,'LAMICH AKTER','Hasan Ali Sheikh','Khuku Begum','Not Avliable','Not Avliable','Not Avliable','FEMALE','1970-01-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','88017231122','9A49','9/49.jpg',NULL,NULL,NULL,2,0,'0'),(647,-1,'Class Nursery','A',1,'MIHRAN SAWAAB','FAYSAL AHMED','SHARMIN AKTER SHORNA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-11-07','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801712083703','-1A1','-1/1.jpg',NULL,NULL,NULL,10,0,'0'),(648,-1,'Class Nursery','A',2,'MD RAYHAN ISLAM','SHAFIQUL ISLAM','MORIAM AKTER','Not Avliable','Not Avliable','Not Avliable','MALE','2019-04-05','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801724573396','-1A2','-1/2.jpg',NULL,NULL,NULL,7,0,'0'),(649,-1,'Class Nursery','A',3,'MD TAHMID ISLAM TOHA','RABIUL ISLAM','TAYEBA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-04','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801763046672','-1A3','-1/3.jpg',NULL,NULL,NULL,3,0,'0'),(650,-1,'Class Nursery','A',4,'NAFIA NOWSHIN','SOHEL RANA','MIM KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716816557','-1A4','-1/4.jpg',NULL,NULL,NULL,9,0,'0'),(651,-1,'Class Nursery','A',5,'AFIA TASNIM','SOHEL RANA','MIM KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','2019-07-01','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801716816557','-1A5','-1/5.jpg',NULL,NULL,NULL,8,0,'0'),(652,-1,'Class Nursery','A',6,'ANKAN MANDAL','NIRMAL MANDAL','ANAMIKA MONDAL','Not Avliable','Not Avliable','Not Avliable','MALE','2017-08-06','0','0','0','Vill: SabujbagPOST: Gopalganj THANA:  Gopalganj Sadar  DISTRICT: Gopalganj','8801716330786','-1A6','-1/6.jpg',NULL,NULL,NULL,1,0,'0'),(653,-1,'Class Nursery','A',7,'TATHOI BISWAS','TAPAN KUMER BISWAS','SREEMOTI HASI RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2019-01-10','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801745532655','-1A7','-1/7.jpg',NULL,NULL,NULL,13,0,'0'),(654,-1,'Class Nursery','A',8,'MD ABRAR FAIYAZ','MD MAHIRUL ISLAM','SINTHIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-06-27','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801683953889','-1A8','-1/8.jpg',NULL,NULL,NULL,12,0,'0'),(655,-1,'Class Nursery','A',9,'MD JAYAN','MD TAZAMMUL HAQUE','MST ONU KHATUN','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801914851983','-1A9','-1/9.jpg',NULL,NULL,NULL,2,0,'0'),(656,-1,'Class Nursery','A',10,'MD AFIF MOLLA','DIPU MOLLA','SUMONA KHANAM','Not Avliable','Not Avliable','Not Avliable','MALE','1969-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801729944813','-1A10','-1/10.jpg',NULL,NULL,NULL,11,0,'0'),(657,-1,'Class Nursery','A',11,'SAIM BISWAS','MD TAHIDUL ISLAM BISWAS','JHUMI KHANOM','Not Avliable','Not Avliable','Not Avliable','MALE','2019-08-18','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801640506473','-1A11','-1/11.jpg',NULL,NULL,NULL,6,0,'0'),(658,-1,'Class Nursery','A',12,'JANNATUL TOYA','MD SOHEL RANA','BITHIA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2018-10-24','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801778777499','-1A12','-1/12.jpg',NULL,NULL,NULL,5,0,'0'),(659,-1,'Class Nursery','A',13,'ABU BAKKAR MATUBBAR','FARUK MATUBBAR','JOSNA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-10-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801866102979','-1A13','-1/13.jpg',NULL,NULL,NULL,14,3,'0'),(660,-1,'Class Nursery','A',14,'ABDULLA AFFAN','MD SHARIF MAHMUD','MST ZAKIA SULTANA','Not Avliable','Not Avliable','Not Avliable','MALE','2018-10-19','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801831074047','-1A14','-1/14.jpg',NULL,NULL,NULL,15,3,'0'),(661,-1,'Class Nursery','A',15,'TAHMIDUL ISLAM RAFE','MOINUL ISLAM','UMMEA KHADIJA','Not Avliable','Not Avliable','Not Avliable','MALE','2019-12-31','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801703644695','-1A15','-1/15.jpg',NULL,NULL,NULL,16,3,'0'),(662,-1,'Class Nursery','A',16,'NUSRAT SHAZAN','OBAIDUL SHAZAN','SHILA AKTER','Not Avliable','Not Avliable','Not Avliable','FEMALE','2019-08-26','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801834967102','-1A16','-1/16.jpg',NULL,NULL,NULL,17,3,'0'),(663,-1,'Class Nursery','A',17,'SHUVENDRA BISWAS','SUSHIL KUMAR BISWAS','MOLINA RANI BISWAS','Not Avliable','Not Avliable','Not Avliable','MALE','2024-03-06','0','0','0','Vill: POST:  THANA:  ---  DISTRICT: ---','8801754414527','-1A17','-1/17.jpg',NULL,NULL,NULL,4,0,'0'),(1634,4,'Class Four','A',33,'Antika Mondal','Gopal Chandra Mondal','Asha Mondal','অন্তিকা মন্ডল','গোপাল চন্দ্র মন্ডলা','আশা মন্ডল','Female','2015-12-07','20153519119027502','7303625011','5513365667','','01642998178','4A33','.',NULL,NULL,NULL,3,0,'0'),(1635,4,'Class Four','A',34,'Md Nuruzzaman Sheikh','Md Reazul Islam','Mst. Taslena','মো: নুরুজ্জামান শেখ','মো: রিয়াজুল ইসলাম','মোছা: তাছলিনা','Male','2013-11-27','20136512815916580','3258367006','6439485159','','01607990520','4A34','.',NULL,NULL,NULL,26,0,'0'),(1636,7,'Class Seven','A',59,'SANJIR RAHMAN','Al Amin','MST. SHAMIMA AKTER DULI','সানজির রহমান','আল আমিন','মোসাঃ সামীমা আক্তার দুলী','MALE','2011-11-26','20113393310008217','0','0','','01607304218','7A59','',NULL,NULL,NULL,22,0,'0'),(1637,8,'Class Eight','A',46,'LOKMAN SHEKH','MD ABUL SHEKH','LIGU BEGUM','LOKMAN SHEKH','MD ABUL SHEKH','LIGU BEGUM','MALE','2009-05-02','0','0','0','N/A','0','8A46','IMG_.png',NULL,NULL,NULL,45,2,'0'),(1638,8,'Class Eight','A',47,'IJTIHAD MUSLEHIN','MOHAMMAD ANISUR RAHMAN','NUR JANNATUL FERDOUS','IJTIHAD MUSLEHIN','MOHAMMAD ANISUR RAHMAN','NUR JANNATUL FERDOUS','MALE','2010-12-16','0','0','0','N/A','0','8A47','IMG_.png',NULL,NULL,NULL,2,0,'0'),(1639,8,'Class Eight','A',48,'MD TAMJID AHMMED TASIN','ANISUR RAHAMAN MOLLA','TAJRIA AKTAR LABONI','মো: তামজীদ আহম্মেদ তাসিন','আনিচুর রহমান মোল্যা','তাজরিয়া আক্তার লাবনী','MALE','2011-07-12','20113513247028502','0','0','GOPALGANJ','0','8A48','',NULL,NULL,NULL,4,0,'0'),(1640,6,'Class Six','A',62,'SUMAIYA AKTAR RUPU','MD ZAHIDUL ISLAM','MERA BEGUM','SUMAIYA AKTAR RUPU','MD ZAHIDUL ISLAM','MERA BEGUM','FEMALE','2010-03-06','0','0','0','N/A','0','6A62','IMG_.png',NULL,NULL,NULL,19,0,'0'),(1641,6,'Class Six','A',64,'MD SHABBIR TALUKDER','MD ABUL HOSSEN','SHARMIN KHANOM','MD SHABBIR TALUKDER','MD ABUL HOSSEN','SHARMIN KHANOM','MALE','2012-11-11','0','0','0','N/A','0','6A64','IMG_.png',NULL,NULL,NULL,17,0,'0'),(1642,9,'Class Nine','A',51,'Abrar Zahin','MD. Alamgir Hossain','Salma Begum','Abrar Zahid','MD. Alamgir Hossain','Salma Begum','MALE','2024-01-01','0','0','0','N/A','0','9A51','IMG_.png',NULL,NULL,NULL,46,1,'0'),(1643,9,'Class Nine','A',52,'Al Nahyan','Hilal Uddin Molla','Tanjira Begum','Al Nahyan','Hilal Uddin Molla','Tanjira Begum','MALE','2010-01-01','0','0','0','N/A','0','9A52','IMG_.png',NULL,NULL,NULL,34,0,'0');
/*!40000 ALTER TABLE `student_promote` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `student_promote` with 463 row(s)
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentpayment`
--

LOCK TABLES `studentpayment` WRITE;
/*!40000 ALTER TABLE `studentpayment` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `studentpayment` VALUES (1,5,-1,'A','-1A1',1,'MAHMUD','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A1'),(2,5,-1,'A','-1A2',2,'ABRAR UZ ZAMAN','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A2'),(3,5,-1,'A','-1A3',3,'SAYMON ISLAM','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A3'),(4,5,-1,'A','-1A4',4,'AMRITA SARKER','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A4'),(5,5,-1,'A','-1A5',5,'AQSA ISLAM','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A5'),(6,5,-1,'A','-1A6',6,'ADRITA BAIN','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A6'),(7,5,-1,'A','-1A7',7,'HARSHIYA ISLAM NOHA','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A7'),(8,5,-1,'A','-1A8',8,'MD FAIAZ AHMED','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A8'),(9,5,-1,'A','-1A9',9,'Maliha  Hamid','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A9'),(10,5,-1,'A','-1A10',10,'Mahzabeen Tasnim Ruku','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A10'),(11,5,-1,'A','-1A11',11,'FARIA AKTER','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A11'),(12,5,-1,'A','-1A12',12,'MEGHRAJ BISWAS','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A12'),(13,5,-1,'A','-1A13',13,'Shraddha Sarkar (Shyma)','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A13'),(14,5,-1,'A','-1A14',14,'MUSLIMA JANNAT','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A14'),(15,5,-1,'A','-1A15',15,'AFRA TASNIM SAFA','Salary February',600,0,600,'Unpaid','2025-02-01','5-1A15');
/*!40000 ALTER TABLE `studentpayment` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `studentpayment` with 15 row(s)
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sturegstatus`
--

LOCK TABLES `sturegstatus` WRITE;
/*!40000 ALTER TABLE `sturegstatus` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sturegstatus` VALUES (1,4,'A',37,'4A37',1),(2,4,'A',36,'4A36',1);
/*!40000 ALTER TABLE `sturegstatus` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sturegstatus` with 2 row(s)
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

-- Dump completed on: Wed, 05 Feb 2025 03:37:24 +0000
