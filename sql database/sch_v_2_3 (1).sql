-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 09:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sch_v_2.3`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountuser`
--

CREATE TABLE `accountuser` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accountuser`
--

INSERT INTO `accountuser` (`id`, `name`, `username`, `password`, `created_at`, `role`) VALUES
(1, 'shuvo003', 'shuvo003', '$2y$10$9Ap.cm/fhHEqp2C.ior05u8mvIXT8UpsoWmHnoKqurdbsDufaVlSm', '2024-04-18 07:31:56', 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `adminloginlogs`
--

CREATE TABLE `adminloginlogs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminloginlogs`
--

INSERT INTO `adminloginlogs` (`id`, `username`, `time`, `ip`) VALUES
(1, 'shuvo003', '2024-02-17 23:02:05', '::1'),
(2, 'shuvo003', '2024-02-17 23:20:10', '::1'),
(3, 'shuvo003', '2024-02-19 09:34:47', '::1'),
(4, 'shuvo003', '2024-02-19 13:02:34', '113.11.96.158'),
(5, 'shuvo003', '2024-02-21 00:06:06', '::1'),
(6, 'shuvo003', '2024-02-21 10:38:24', '::1'),
(7, 'shuvo003', '2024-02-21 10:39:50', '::1'),
(8, 'shuvo003', '2024-03-07 00:27:48', '::1'),
(9, 'shuvo003', '2024-03-07 00:35:19', '::1'),
(10, 'shuvo003', '2024-03-10 11:11:33', '::1'),
(11, 'shuvo003', '2024-04-18 07:31:44', '::1'),
(12, 'shuvo003', '2024-04-18 09:04:29', '::1'),
(13, 'shuvo003', '2024-04-28 09:33:36', '::1'),
(14, 'shuvo003', '2024-04-28 13:49:24', '::1'),
(15, 'shuvo003', '2024-05-10 07:47:57', '::1'),
(16, 'shuvo003', '2024-05-10 08:20:34', '::1'),
(17, 'shuvo003', '2024-05-11 06:47:59', '::1'),
(18, 'shuvo003', '2024-05-11 08:39:34', '::1'),
(19, 'shuvo003', '2024-05-12 10:29:11', '103.191.162.68'),
(20, 'shuvo003', '2024-05-12 13:24:45', '::1'),
(21, 'shuvo003', '2024-05-13 07:42:40', '::1'),
(22, 'shuvo003', '2024-05-13 10:15:00', '::1'),
(23, 'shuvo003', '2024-06-01 06:56:03', '::1'),
(24, 'shuvo003', '2024-06-04 18:37:25', '::1'),
(25, 'shuvo003', '2024-06-04 19:58:32', '::1'),
(26, 'shuvo003', '2024-06-15 11:01:16', '::1'),
(27, 'shuvo003', '2024-06-15 14:08:44', '::1'),
(28, 'shuvo003', '2024-06-16 06:26:19', '::1'),
(29, 'shuvo003', '2024-06-17 21:44:44', '::1'),
(30, 'shuvo003', '2024-06-17 21:52:20', '::1'),
(31, 'shuvo003', '2024-06-18 09:57:31', '::1'),
(32, 'shuvo003', '2024-06-20 15:36:36', '::1'),
(33, 'shuvo003', '2024-06-21 10:09:12', '::1'),
(34, 'shuvo003', '2024-06-21 10:33:48', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `a_teacherlogin_logs`
--

CREATE TABLE `a_teacherlogin_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  `ip` varchar(255) NOT NULL,
  `reason` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

CREATE TABLE `building` (
  `id` int(11) NOT NULL,
  `bname` varchar(255) NOT NULL,
  `bnumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`id`, `bname`, `bnumber`) VALUES
(1, 'Main Building', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buildingroom`
--

CREATE TABLE `buildingroom` (
  `id` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomfloor` varchar(255) NOT NULL,
  `roomname` varchar(255) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `seatcapacity` int(11) NOT NULL,
  `rowofbench` int(11) NOT NULL,
  `uniid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildingroom`
--

INSERT INTO `buildingroom` (`id`, `bnumber`, `roomfloor`, `roomname`, `roomnumber`, `seatcapacity`, `rowofbench`, `uniid`) VALUES
(1, 1, '1', '101 Robindro ', 101, 100, 3, '1101');

-- --------------------------------------------------------

--
-- Table structure for table `buildingroombench`
--

CREATE TABLE `buildingroombench` (
  `id` int(255) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `rownumber` int(11) NOT NULL,
  `numberofbench` int(11) NOT NULL,
  `uninum` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildingroombench`
--

INSERT INTO `buildingroombench` (`id`, `bnumber`, `roomnumber`, `rownumber`, `numberofbench`, `uninum`) VALUES
(1, 1, 101, 1, 5, '11011'),
(2, 1, 101, 2, 6, '11012'),
(3, 1, 101, 3, 8, '11013');

-- --------------------------------------------------------

--
-- Table structure for table `cardprintstatus`
--

CREATE TABLE `cardprintstatus` (
  `id` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `chaptername` varchar(1000) NOT NULL,
  `chapteruniid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `classnumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `classname`, `classnumber`) VALUES
(1, 'Class Six', 6),
(2, 'Class Seven', 7),
(3, 'Class Eight', 8),
(4, 'Class Nine', 9),
(5, 'Class Ten', 10),
(8, 'Class Eleven', 11),
(9, 'Class Twelve', 12);

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `dnumber` int(11) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `dip` varchar(255) NOT NULL,
  `dport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `dnumber`, `dname`, `dip`, `dport`) VALUES
(1, 1, 'Lab Device', '192.168.0.210', 4370);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exid` int(11) NOT NULL,
  `examname` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exid`, `examname`, `year`, `startdate`) VALUES
(1, 'Test Exam', '2024', '2024-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `exam67`
--

CREATE TABLE `exam67` (
  `exid` int(11) NOT NULL,
  `examname` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam67lesson`
--

CREATE TABLE `exam67lesson` (
  `id` int(11) NOT NULL,
  `exid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `subcode` int(11) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `lno` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exammark`
--

CREATE TABLE `exammark` (
  `id` int(11) NOT NULL,
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
  `barcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exammark67`
--

CREATE TABLE `exammark67` (
  `id` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `chapterno` int(11) NOT NULL,
  `lno` int(11) NOT NULL,
  `pi` int(11) NOT NULL,
  `uni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examroutine`
--

CREATE TABLE `examroutine` (
  `id` int(11) NOT NULL,
  `exid` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `cgroup` varchar(255) NOT NULL,
  `subcode` varchar(255) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `examdate` date NOT NULL,
  `examtime` varchar(255) NOT NULL,
  `align` varchar(255) NOT NULL,
  `uexid` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examroutine`
--

INSERT INTO `examroutine` (`id`, `exid`, `class`, `cgroup`, `subcode`, `subname`, `examdate`, `examtime`, `align`, `uexid`, `active`) VALUES
(1, '1', '7', 'A', '1', 'বাংলা', '2024-06-23', '10 AM-1PM', 'l', '171A', '1'),
(2, '1', '7', 'A', '2', 'English', '2024-06-24', '10 AM-1PM', 'l', '172A', '1'),
(3, '1', '7', 'A', '3', 'গণিত', '2024-06-25', '10 AM-1PM', 'l', '173A', '1'),
(4, '1', '7', 'A', '4', 'বিজ্ঞান', '2024-06-26', '10 AM-1PM', 'l', '174A', '1'),
(5, '1', '7', 'A', '5', 'ইতিহাস ও সামাজিক বিজ্ঞান', '2024-06-27', '10 AM-1PM', 'l', '175A', '1'),
(6, '1', '7', 'A', '6', 'ডিজিটাল প্রযুক্তি', '2024-06-28', '10 AM-1PM', 'l', '176A', '1'),
(7, '1', '7', 'A', '7', 'স্বাস্থ্য সুরক্ষা', '2024-06-29', '10 AM-1PM', 'r', '177A', '1'),
(8, '1', '7', 'A', '8', 'জীবন ও জীবিকা', '2024-06-30', '10 AM-1PM', 'r', '178A', '1'),
(9, '1', '7', 'A', '9', 'শিল্প ও সংস্কৃতি', '2024-07-01', '10 AM-1PM', 'r', '179A', '1'),
(10, '1', '7', 'A', '10', 'ইসলাম শিক্ষা', '2024-07-02', '10 AM-1PM', 'r', '1710A', '1'),
(11, '1', '7', 'A', '11', 'হিন্দুধর্ম শিক্ষা', '2024-07-03', '10 AM-1PM', 'r', '1711A', '1');

-- --------------------------------------------------------

--
-- Table structure for table `examseatinfo`
--

CREATE TABLE `examseatinfo` (
  `id` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `studentroll` int(11) NOT NULL,
  `benchcol` int(11) NOT NULL,
  `benchrow` int(11) NOT NULL,
  `align` varchar(255) NOT NULL,
  `uniid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examseatinfo`
--

INSERT INTO `examseatinfo` (`id`, `examid`, `bnumber`, `roomnumber`, `classnumber`, `studentroll`, `benchcol`, `benchrow`, `align`, `uniid`) VALUES
(1, 1, 1, 101, 6, 1, 1, 1, 'L', 1110161),
(2, 1, 1, 101, 6, 2, 1, 2, 'L', 1110162),
(3, 1, 1, 101, 6, 3, 1, 3, 'L', 1110163),
(4, 1, 1, 101, 6, 4, 1, 4, 'L', 1110164),
(5, 1, 1, 101, 6, 5, 1, 5, 'L', 1110165),
(6, 1, 1, 101, 6, 6, 2, 1, 'L', 1110166),
(7, 1, 1, 101, 6, 7, 2, 2, 'L', 1110167),
(8, 1, 1, 101, 6, 8, 2, 3, 'L', 1110168),
(9, 1, 1, 101, 6, 9, 2, 4, 'L', 1110169),
(10, 1, 1, 101, 6, 10, 2, 5, 'L', 11101610),
(11, 1, 1, 101, 6, 11, 2, 6, 'L', 11101611),
(12, 1, 1, 101, 6, 12, 3, 1, 'L', 11101612),
(13, 1, 1, 101, 6, 13, 3, 2, 'L', 11101613),
(14, 1, 1, 101, 6, 14, 3, 3, 'L', 11101614),
(15, 1, 1, 101, 6, 15, 3, 4, 'L', 11101615),
(16, 1, 1, 101, 6, 16, 3, 5, 'L', 11101616),
(17, 1, 1, 101, 6, 17, 3, 6, 'L', 11101617),
(18, 1, 1, 101, 6, 18, 3, 7, 'L', 11101618),
(19, 1, 1, 101, 6, 19, 3, 8, 'L', 11101619),
(20, 1, 1, 101, 6, 26, 2, 4, 'R', 11101620),
(21, 1, 1, 101, 6, 27, 2, 5, 'R', 11101621),
(22, 1, 1, 101, 6, 28, 2, 6, 'R', 11101622),
(23, 1, 1, 101, 6, 23, 3, 1, 'L', 11101623),
(24, 1, 1, 101, 6, 24, 3, 2, 'L', 11101624),
(25, 1, 1, 101, 6, 25, 3, 3, 'L', 11101625),
(26, 1, 1, 101, 6, 26, 3, 4, 'L', 11101626),
(27, 1, 1, 101, 6, 27, 3, 5, 'L', 11101627),
(28, 1, 1, 101, 6, 28, 3, 6, 'L', 11101628),
(29, 1, 1, 101, 6, 29, 3, 7, 'L', 11101629),
(30, 1, 1, 101, 6, 30, 3, 8, 'L', 11101630),
(31, 1, 1, 101, 6, 39, 3, 1, 'R', 11101631),
(32, 1, 1, 101, 6, 40, 3, 2, 'R', 11101632),
(33, 1, 1, 101, 6, 41, 3, 3, 'R', 11101633),
(34, 1, 1, 101, 6, 42, 3, 4, 'R', 11101634),
(35, 1, 1, 101, 6, 43, 3, 5, 'R', 11101635),
(36, 1, 1, 101, 6, 44, 3, 6, 'R', 11101636),
(37, 1, 1, 101, 6, 45, 3, 7, 'R', 11101637),
(38, 1, 1, 101, 6, 46, 3, 8, 'R', 11101638),
(44, 1, 1, 101, 6, 41, 1, 1, 'R', 11101641),
(45, 1, 1, 101, 6, 42, 1, 2, 'R', 11101642),
(46, 1, 1, 101, 6, 43, 1, 3, 'R', 11101643),
(47, 1, 1, 101, 6, 44, 1, 4, 'R', 11101644),
(48, 1, 1, 101, 6, 45, 1, 5, 'R', 11101645),
(55, 1, 1, 101, 6, 46, 2, 1, 'R', 11101646),
(56, 1, 1, 101, 6, 47, 2, 2, 'R', 11101647),
(57, 1, 1, 101, 6, 48, 2, 3, 'R', 11101648),
(58, 1, 1, 101, 6, 49, 2, 4, 'R', 11101649),
(59, 1, 1, 101, 6, 50, 2, 5, 'R', 11101650),
(60, 1, 1, 101, 6, 51, 2, 6, 'R', 11101651),
(69, 1, 1, 101, 6, 52, 3, 1, 'R', 11101652),
(70, 1, 1, 101, 6, 53, 3, 2, 'R', 11101653),
(71, 1, 1, 101, 6, 54, 3, 3, 'R', 11101654),
(72, 1, 1, 101, 6, 56, 3, 4, 'R', 11101656),
(73, 1, 1, 101, 6, 57, 3, 5, 'R', 11101657),
(74, 1, 1, 101, 6, 58, 3, 6, 'R', 11101658),
(75, 1, 1, 101, 6, 59, 3, 7, 'R', 11101659),
(76, 1, 1, 101, 6, 60, 3, 8, 'R', 11101660);

-- --------------------------------------------------------

--
-- Table structure for table `examseatplan`
--

CREATE TABLE `examseatplan` (
  `id` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `roomnumber` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `startroll` int(11) NOT NULL,
  `endroll` int(11) NOT NULL,
  `uniqid` int(11) NOT NULL,
  `totalstudent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examseatplan`
--

INSERT INTO `examseatplan` (`id`, `examid`, `bnumber`, `roomnumber`, `classnumber`, `section`, `startroll`, `endroll`, `uniqid`, `totalstudent`) VALUES
(1, 1, 1, 101, 6, 'Mollika', 1, 38, 11101, 38);

-- --------------------------------------------------------

--
-- Table structure for table `examseatplanc1c2`
--

CREATE TABLE `examseatplanc1c2` (
  `id` int(11) NOT NULL,
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
  `endroll2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examseatplanc1c2`
--

INSERT INTO `examseatplanc1c2` (`id`, `examid`, `bnumber`, `roomnumber`, `classnumber`, `section`, `startroll`, `endroll`, `uniqid`, `totalstudent`, `classnumber2`, `section2`, `startroll2`, `endroll2`) VALUES
(1, 1, 1, 101, 6, 'Mollika', 1, 19, 11101, 38, 6, 'Shapla', 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `examseatplanc1c2c3`
--

CREATE TABLE `examseatplanc1c2c3` (
  `id` int(11) NOT NULL,
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
  `endroll3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `examseatplanc2`
--

CREATE TABLE `examseatplanc2` (
  `id` int(11) NOT NULL,
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
  `endroll2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `des` varchar(2000) NOT NULL,
  `amount` int(11) NOT NULL,
  `expenseid` int(11) DEFAULT NULL,
  `note` varchar(10000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `date`, `des`, `amount`, `expenseid`, `note`) VALUES
(1, '2024-04-18', 'Tea Bill', 5000, 0, 'Shuvo');

-- --------------------------------------------------------

--
-- Table structure for table `expense_catagory`
--

CREATE TABLE `expense_catagory` (
  `id` int(11) NOT NULL,
  `Description` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expense_catagory`
--

INSERT INTO `expense_catagory` (`id`, `Description`) VALUES
(2, 'Tea Bill');

-- --------------------------------------------------------

--
-- Table structure for table `grademark`
--

CREATE TABLE `grademark` (
  `id` int(11) NOT NULL,
  `gradecode` varchar(255) NOT NULL,
  `markfrom` int(11) NOT NULL,
  `markupto` int(11) NOT NULL,
  `lettergrade` varchar(255) NOT NULL,
  `letterpoint` float NOT NULL,
  `uni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grademark`
--

INSERT INTO `grademark` (`id`, `gradecode`, `markfrom`, `markupto`, `lettergrade`, `letterpoint`, `uni`) VALUES
(1, 'gr001', 0, 32, 'F', 0, 'gr001F'),
(2, 'gr001', 33, 39, 'D', 1, 'gr001D'),
(3, 'gr001', 40, 49, 'C', 2, 'gr001C'),
(4, 'gr001', 50, 59, 'B', 3, 'gr001B'),
(5, 'gr001', 60, 69, 'A-', 3.5, 'gr001A-'),
(6, 'gr001', 70, 79, 'A', 4, 'gr001A'),
(7, 'gr001', 80, 100, 'A+', 5, 'gr001A+'),
(8, 'gr002', 40, 50, 'A+', 5, 'gr002A+'),
(9, 'gr002', 0, 16, 'F', 0, 'gr002F'),
(11, 'gr002', 17, 19, 'D', 1, 'gr002D'),
(12, 'gr002', 20, 24, 'C', 2, 'gr002C'),
(13, 'gr002', 25, 29, 'B', 3, 'gr002B'),
(14, 'gr002', 30, 34, 'A-', 3.5, 'gr002A-'),
(15, 'gr002', 35, 39, 'A', 4, 'gr002A'),
(16, 'gr003', 20, 25, 'A+', 5, 'gr003A+'),
(17, 'gr003', 17, 19, 'A', 4, 'gr003A'),
(18, 'gr003', 15, 16, 'A-', 3.5, 'gr003A-'),
(20, 'gr003', 12, 14, 'B', 3, 'gr003B'),
(21, 'gr003', 10, 11, 'C', 2, 'gr003C'),
(23, 'gr003', 8, 9, 'D', 1, 'gr003D'),
(24, 'gr003', 1, 7, 'F', 0, 'gr003F');

-- --------------------------------------------------------

--
-- Table structure for table `gradename`
--

CREATE TABLE `gradename` (
  `id` int(11) NOT NULL,
  `gradename` varchar(255) NOT NULL,
  `fullmark` int(255) NOT NULL,
  `gradecode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gradename`
--

INSERT INTO `gradename` (`id`, `gradename`, `fullmark`, `gradecode`) VALUES
(2, 'Grade 1(Out of 100)', 100, 'gr001'),
(3, 'Grade2(Out of  50)', 50, 'gr002'),
(4, 'Grade3', 25, 'gr003');

-- --------------------------------------------------------

--
-- Table structure for table `groupsecname`
--

CREATE TABLE `groupsecname` (
  `id` int(11) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `groupname` varchar(255) NOT NULL,
  `sectionname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `imagesl`
--

CREATE TABLE `imagesl` (
  `id` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `stuuniqid` varchar(255) NOT NULL,
  `imgname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `des` varchar(2000) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inviceid`
--

CREATE TABLE `inviceid` (
  `id` int(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `uni_iid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `inviceid`
--

INSERT INTO `inviceid` (`id`, `invoice_id`, `uni_iid`, `status`) VALUES
(1, '1', '11', 'Paid'),
(2, '92', '292', 'Unpaid'),
(3, '92', '392', 'Unpaid'),
(4, '92', '492', 'Unpaid'),
(5, '94', '594', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `invoicetrx`
--

CREATE TABLE `invoicetrx` (
  `id` int(11) NOT NULL,
  `iid` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `invoicetrx`
--

INSERT INTO `invoicetrx` (`id`, `iid`, `amount`, `date`) VALUES
(8, '16Mollika1', 100, '2024-06-01'),
(9, '16Mollika1', 20, '2024-06-04');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
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
  `uni` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `libary_author`
--

CREATE TABLE `libary_author` (
  `id` int(11) NOT NULL,
  `author_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libary_author`
--

INSERT INTO `libary_author` (`id`, `author_name`) VALUES
(1, 'Kazi Nazrul Islam');

-- --------------------------------------------------------

--
-- Table structure for table `libary_book_list`
--

CREATE TABLE `libary_book_list` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(2000) NOT NULL,
  `author_name` varchar(2000) NOT NULL,
  `book_name` varchar(2000) NOT NULL,
  `book_barcode` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libary_book_list`
--

INSERT INTO `libary_book_list` (`id`, `publisher_name`, `author_name`, `book_name`, `book_barcode`) VALUES
(1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600'),
(2, 'Panjaree', 'Kazi Nazrul Islam', 'Ognibina', '1256458'),
(3, 'Panjaree', 'Kazi Nazrul Islam', 'Ab2', 'djklsajfkl');

-- --------------------------------------------------------

--
-- Table structure for table `libary_book_stock`
--

CREATE TABLE `libary_book_stock` (
  `id` int(11) NOT NULL,
  `bookid` int(11) NOT NULL,
  `publisher_name` varchar(2000) NOT NULL,
  `author_name` varchar(2000) NOT NULL,
  `book_name` varchar(2000) NOT NULL,
  `book_barcode` varchar(2000) NOT NULL,
  `total` int(11) NOT NULL,
  `running_amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libary_book_stock`
--

INSERT INTO `libary_book_stock` (`id`, `bookid`, `publisher_name`, `author_name`, `book_name`, `book_barcode`, `total`, `running_amount`) VALUES
(1, 1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600', 20, 20),
(2, 2, 'Panjaree', 'Kazi Nazrul Islam', 'Ognibina', '1256458', 5, 5),
(3, 3, 'Panjaree', 'Kazi Nazrul Islam', 'Ab2', 'djklsajfkl', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `libary_libariyan_user`
--

CREATE TABLE `libary_libariyan_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libary_libariyan_user`
--

INSERT INTO `libary_libariyan_user` (`id`, `name`, `username`, `password`, `created_at`, `role`) VALUES
(3, 'Mita Biswas', 'mita001', '$2y$10$ocVhLZlED19KjnzQsee8nOsECOIuzvxP/4PiAPas1xZ3qovcuUGNi', '2024-05-10 08:08:28', 'Account');

-- --------------------------------------------------------

--
-- Table structure for table `libary_publisher`
--

CREATE TABLE `libary_publisher` (
  `id` int(11) NOT NULL,
  `pub_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libary_publisher`
--

INSERT INTO `libary_publisher` (`id`, `pub_name`) VALUES
(5, 'Panjaree');

-- --------------------------------------------------------

--
-- Table structure for table `library_book_issue`
--

CREATE TABLE `library_book_issue` (
  `id` int(11) NOT NULL,
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
  `rfid_card` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `library_book_issue`
--

INSERT INTO `library_book_issue` (`id`, `bookid`, `publisher_name`, `author_name`, `book_name`, `book_barcode`, `date_of_issue`, `date_of_expiry`, `return_date`, `total_days`, `student_id`, `student_name`, `class`, `section`, `mobile`, `status`, `rfid_card`) VALUES
(10, 1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600', '2024-05-01', '2024-05-10', '0000-00-00', 9, '7B6', 'SUMAIYA ISLAM', '7', 'B', '01760274166', 'returned', 12383397),
(16, 1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600', '2024-05-02', '2024-05-05', '2024-05-15', 3, '7B6', 'SUMAIYA ISLAM', '7', 'B', '01760274166', 'Returned', 12383397),
(17, 1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600', '2024-05-02', '2024-05-05', '2024-05-15', 3, '7B6', 'SUMAIYA ISLAM', '7', 'B', '01760274166', 'Returned', 12383397),
(18, 1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600', '2024-05-09', '2024-05-17', '2024-05-15', 8, '7B6', 'SUMAIYA ISLAM', '7', 'B', '01760274166', 'Returned', 12383397),
(19, 1, 'Lacture', 'Robindronath ', 'Sonar Tori', '125600', '2024-05-01', '2024-05-07', '2024-05-10', 6, '7B6', 'SUMAIYA ISLAM', '7', 'B', '01760274166', 'Returned', 12383397),
(20, 2, 'Panjaree', 'Kazi Nazrul Islam', 'Ognibina', '1256458', '2024-05-09', '2024-05-14', '2024-05-17', 5, '7B6', 'SUMAIYA ISLAM', '7', 'B', '01760274166', 'Returned', 12383397);

-- --------------------------------------------------------

--
-- Table structure for table `machineattlog`
--

CREATE TABLE `machineattlog` (
  `uid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `atime` varchar(255) NOT NULL,
  `cinout` varchar(255) NOT NULL,
  `cstateid` int(11) NOT NULL,
  `uniid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machineattlog`
--

INSERT INTO `machineattlog` (`uid`, `mid`, `stuid`, `state`, `adate`, `atime`, `cinout`, `cstateid`, `uniid`) VALUES
(1, 221, '6Mollika21', 'Unknown', '2024-04-29', '09:03:00', 'Clock IN', 1, '2211714374180'),
(2, 220, '6Mollika20', 'Unknown', '2024-04-29', '09:02:58', 'Clock IN', 1, '2201714374178'),
(3, 211, '6Mollika11', 'Unknown', '2024-04-29', '09:02:57', 'Clock IN', 1, '2111714374177'),
(4, 226, '6Mollika26', 'Unknown', '2024-04-29', '09:02:55', 'Clock IN', 1, '2261714374175'),
(5, 204, '6Mollika4', 'Unknown', '2024-04-29', '09:02:54', 'Clock IN', 1, '2041714374174'),
(6, 201, '6Mollika1', 'Unknown', '2024-04-29', '09:02:51', 'Clock IN', 1, '2011714374171'),
(7, 201, '6Mollika1', 'Unknown', '2024-04-29', '00:00:23', 'Unknown', 3, '2011714341623'),
(8, 204, '6Mollika4', 'Unknown', '2024-04-29', '00:00:21', 'Unknown', 3, '2041714341621'),
(9, 211, '6Mollika11', 'Unknown', '2024-04-29', '00:00:19', 'Unknown', 3, '2111714341619'),
(10, 220, '6Mollika20', 'Unknown', '2024-04-29', '00:00:18', 'Unknown', 3, '2201714341618'),
(11, 221, '6Mollika21', 'Unknown', '2024-04-29', '00:00:16', 'Unknown', 3, '2211714341616'),
(12, 226, '6Mollika26', 'Unknown', '2024-04-29', '00:00:13', 'Unknown', 3, '2261714341613'),
(13, 2, '6Mollika26', 'Unknown', '2024-01-30', '21:30:48', 'Unknown', 3, '21706646648'),
(14, 12, '6Mollika26', 'Unknown', '2024-01-27', '13:17:19', 'Clock Out', 2, '121706357839'),
(15, 3, '6Mollika26', 'Unknown', '2024-01-14', '21:03:55', 'Unknown', 3, '31705262635'),
(16, 4, '6Mollika26', 'Unknown', '2023-11-19', '12:16:54', 'Clock Out', 2, '41700392614'),
(17, 4, '6Mollika26', 'Unknown', '2023-11-19', '12:16:53', 'Clock Out', 2, '41700392613'),
(18, 4, '6Mollika26', 'Unknown', '2023-11-19', '12:16:50', 'Clock Out', 2, '41700392610'),
(19, 4, '6Mollika26', 'Unknown', '2023-11-19', '12:16:43', 'Clock Out', 2, '41700392603'),
(20, 4, '6Mollika26', 'Fingerprint', '2023-10-28', '11:49:01', 'Clock IN', 1, '41698486541'),
(21, 3, '6Mollika26', 'Fingerprint', '2023-10-28', '11:48:57', 'Clock IN', 1, '31698486537'),
(22, 2, '6Mollika26', 'Fingerprint', '2023-10-28', '11:48:51', 'Clock IN', 1, '21698486531'),
(23, 3, '6Mollika26', 'Fingerprint', '2023-10-28', '10:55:04', 'Clock IN', 1, '31698483304'),
(24, 2, '6Mollika26', 'Fingerprint', '2023-10-28', '10:54:59', 'Clock IN', 1, '21698483299'),
(25, 4, '6Mollika26', 'Fingerprint', '2023-10-28', '10:54:44', 'Clock IN', 1, '41698483284'),
(26, 1, '6Mollika26', 'Unknown', '2023-06-10', '18:20:57', 'Unknown', 3, '11686414057'),
(27, 1, '6Mollika26', 'Unknown', '2023-06-10', '18:20:43', 'Unknown', 3, '11686414043'),
(28, 1, '6Mollika26', 'Unknown', '2023-06-10', '18:20:12', 'Unknown', 3, '11686414012'),
(29, 1, '6Mollika26', 'Unknown', '2023-06-10', '18:19:59', 'Unknown', 3, '11686413999'),
(30, 1, '6Mollika26', 'Unknown', '2023-06-09', '15:08:51', 'Clock Out', 2, '11686316131'),
(31, 1, '6Mollika26', 'Unknown', '2023-06-09', '15:08:50', 'Clock Out', 2, '11686316130'),
(32, 1, '6Mollika26', 'Unknown', '2023-06-09', '15:08:35', 'Clock Out', 2, '11686316115'),
(33, 1012, '6Mollika26', 'Unknown', '2023-05-28', '01:11:29', 'Unknown', 3, '10121685229089'),
(34, 1009, '6Mollika26', 'Unknown', '2023-05-28', '01:11:28', 'Unknown', 3, '10091685229088'),
(35, 1005, '6Mollika26', 'Unknown', '2023-05-28', '01:11:26', 'Unknown', 3, '10051685229086'),
(36, 1004, '6Mollika26', 'Unknown', '2023-05-28', '01:11:24', 'Unknown', 3, '10041685229084'),
(37, 1027, '6Mollika26', 'Unknown', '2023-05-28', '01:11:23', 'Unknown', 3, '10271685229083'),
(38, 1007, '6Mollika26', 'Unknown', '2023-05-28', '01:11:21', 'Unknown', 3, '10071685229081'),
(39, 1031, '6Mollika26', 'Unknown', '2023-05-28', '01:11:20', 'Unknown', 3, '10311685229080'),
(40, 1021, '6Mollika26', 'Unknown', '2023-05-28', '01:11:17', 'Unknown', 3, '10211685229077'),
(41, 1072, '6Mollika26', 'Unknown', '2023-05-28', '01:11:16', 'Unknown', 3, '10721685229076'),
(42, 1020, '6Mollika26', 'Unknown', '2023-05-28', '01:11:15', 'Unknown', 3, '10201685229075'),
(43, 1052, '6Mollika26', 'Unknown', '2023-05-28', '01:11:13', 'Unknown', 3, '10521685229073'),
(44, 1062, '6Mollika26', 'Unknown', '2023-05-28', '01:11:12', 'Unknown', 3, '10621685229072'),
(45, 1042, '6Mollika26', 'Unknown', '2023-05-28', '01:11:10', 'Unknown', 3, '10421685229070'),
(46, 1057, '6Mollika26', 'Unknown', '2023-05-28', '01:11:09', 'Unknown', 3, '10571685229069'),
(47, 817, '6Mollika26', 'Unknown', '2023-05-28', '01:10:56', 'Unknown', 3, '8171685229056'),
(48, 821, '6Mollika26', 'Unknown', '2023-05-28', '01:10:54', 'Unknown', 3, '8211685229054'),
(49, 833, '6Mollika26', 'Unknown', '2023-05-28', '01:10:52', 'Unknown', 3, '8331685229052'),
(50, 840, '6Mollika26', 'Unknown', '2023-05-28', '01:10:50', 'Unknown', 3, '8401685229050'),
(51, 863, '6Mollika26', 'Unknown', '2023-05-28', '01:10:48', 'Unknown', 3, '8631685229048'),
(52, 811, '6Mollika26', 'Unknown', '2023-05-28', '01:10:43', 'Unknown', 3, '8111685229043'),
(53, 420, '6Mollika26', 'Unknown', '2023-05-28', '01:10:39', 'Unknown', 3, '4201685229039'),
(54, 825, '6Mollika26', 'Unknown', '2023-05-28', '01:09:44', 'Unknown', 3, '8251685228984'),
(55, 856, '6Mollika26', 'Unknown', '2023-05-28', '01:09:43', 'Unknown', 3, '8561685228983'),
(56, 260, '6Mollika26', 'Unknown', '2023-05-28', '01:09:32', 'Unknown', 3, '2601685228972'),
(57, 282, '6Mollika26', 'Unknown', '2023-05-28', '01:09:31', 'Unknown', 3, '2821685228971'),
(58, 278, '6Mollika26', 'Unknown', '2023-05-28', '01:09:29', 'Unknown', 3, '2781685228969'),
(59, 279, '6Mollika26', 'Unknown', '2023-05-28', '01:09:27', 'Unknown', 3, '2791685228967'),
(60, 294, '6Mollika26', 'Unknown', '2023-05-28', '01:09:26', 'Unknown', 3, '2941685228966'),
(61, 635, '6Mollika26', 'Unknown', '2023-05-28', '01:09:12', 'Unknown', 3, '6351685228952'),
(62, 616, '6Mollika26', 'Unknown', '2023-05-28', '01:09:10', 'Unknown', 3, '6161685228950'),
(63, 624, '6Mollika26', 'Unknown', '2023-05-28', '01:09:08', 'Unknown', 3, '6241685228948'),
(64, 621, '6Mollika26', 'Unknown', '2023-05-28', '01:09:06', 'Unknown', 3, '6211685228946'),
(65, 644, '6Mollika26', 'Unknown', '2023-05-28', '01:09:04', 'Unknown', 3, '6441685228944'),
(66, 688, '6Mollika26', 'Unknown', '2023-05-28', '01:09:02', 'Unknown', 3, '6881685228942'),
(67, 855, '6Mollika26', 'Unknown', '2023-05-28', '01:08:55', 'Unknown', 3, '8551685228935'),
(68, 845, '6Mollika26', 'Unknown', '2023-05-28', '01:08:54', 'Unknown', 3, '8451685228934'),
(69, 844, '6Mollika26', 'Unknown', '2023-05-28', '01:08:50', 'Unknown', 3, '8441685228930'),
(70, 820, '6Mollika26', 'Unknown', '2023-05-28', '01:08:48', 'Unknown', 3, '8201685228928'),
(71, 849, '6Mollika26', 'Unknown', '2023-05-28', '01:08:46', 'Unknown', 3, '8491685228926'),
(72, 201, '6Mollika1', 'Unknown', '2024-04-29', '15:06:12', 'Clock Out', 2, '2011714395972'),
(73, 204, '6Mollika4', 'Unknown', '2024-04-29', '15:06:10', 'Clock Out', 2, '2041714395970'),
(74, 226, '6Mollika26', 'Unknown', '2024-04-29', '15:06:08', 'Clock Out', 2, '2261714395968'),
(75, 211, '6Mollika11', 'Unknown', '2024-04-29', '15:06:07', 'Clock Out', 2, '2111714395967'),
(76, 220, '6Mollika20', 'Unknown', '2024-04-29', '15:06:05', 'Clock Out', 2, '2201714395965'),
(77, 221, '6Mollika21', 'Unknown', '2024-04-29', '15:06:03', 'Clock Out', 2, '2211714395963');

-- --------------------------------------------------------

--
-- Table structure for table `machinedata`
--

CREATE TABLE `machinedata` (
  `id` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machinedata`
--

INSERT INTO `machinedata` (`id`, `mid`, `stuid`) VALUES
(1, 3001, '6A1'),
(2, 3004, '6A4'),
(3, 3007, '6A7'),
(4, 3010, '6A10'),
(5, 3013, '6A13'),
(6, 3016, '6A16'),
(7, 3019, '6A19'),
(8, 3022, '6A22'),
(9, 3025, '6A25'),
(10, 3028, '6A28'),
(11, 3031, '6A31'),
(12, 3034, '6A34'),
(13, 3037, '6A37'),
(14, 3040, '6A40'),
(15, 3043, '6A43'),
(16, 3046, '6A46'),
(17, 3049, '6A49'),
(18, 3052, '6A52'),
(19, 3055, '6A55'),
(20, 3058, '6A58'),
(21, 3061, '6A61'),
(22, 3064, '6A64'),
(23, 3067, '6A67'),
(24, 3070, '6A70'),
(25, 3073, '6A73'),
(26, 3076, '6A76'),
(27, 3079, '6A79'),
(28, 3082, '6A82'),
(29, 3085, '6A85'),
(30, 3088, '6A88'),
(31, 3091, '6A91'),
(32, 3094, '6A94'),
(33, 3097, '6A97'),
(34, 3100, '6A100'),
(35, 3103, '6A103'),
(36, 3106, '6A106'),
(37, 3109, '6A109'),
(38, 3115, '6A115'),
(39, 3118, '6A118'),
(40, 3121, '6A121'),
(41, 3124, '6A124'),
(42, 3130, '6A130'),
(43, 3133, '6A133'),
(44, 3136, '6A136'),
(45, 3139, '6A139'),
(46, 3142, '6A142'),
(47, 3145, '6A145'),
(48, 3148, '6A148'),
(49, 3151, '6A151'),
(50, 3154, '6A154'),
(51, 3160, '6A160'),
(52, 3163, '6A163'),
(53, 3166, '6A166'),
(54, 3169, '6A169'),
(55, 3002, '6B2'),
(56, 3005, '6B5'),
(57, 3008, '6B8'),
(58, 3014, '6B14'),
(59, 3020, '6B20'),
(60, 3023, '6B23'),
(61, 3026, '6B26'),
(62, 3029, '6B29'),
(63, 3032, '6B32'),
(64, 3035, '6B35'),
(65, 3038, '6B38'),
(66, 3041, '6B41'),
(67, 3044, '6B44'),
(68, 3047, '6B47'),
(69, 3050, '6B50'),
(70, 3053, '6B53'),
(71, 3056, '6B56'),
(72, 3059, '6B59'),
(73, 3062, '6B62'),
(74, 3065, '6B65'),
(75, 3068, '6B68'),
(76, 3071, '6B71'),
(77, 3074, '6B74'),
(78, 3077, '6B77'),
(79, 3080, '6B80'),
(80, 3083, '6B83'),
(81, 3086, '6B86'),
(82, 3089, '6B89'),
(83, 3092, '6B92'),
(84, 3095, '6B95'),
(85, 3098, '6B98'),
(86, 3101, '6B101'),
(87, 3104, '6B104'),
(88, 3107, '6B107'),
(89, 3110, '6B110'),
(90, 3113, '6B113'),
(91, 3116, '6B116'),
(92, 3119, '6B119'),
(93, 3122, '6B122'),
(94, 3125, '6B125'),
(95, 3128, '6B128'),
(96, 3131, '6B131'),
(97, 3134, '6B134'),
(98, 3137, '6B137'),
(99, 3140, '6B140'),
(100, 3143, '6B143'),
(101, 3146, '6B146'),
(102, 3149, '6B149'),
(103, 3152, '6B152'),
(104, 3158, '6B158'),
(105, 3161, '6B161'),
(106, 3164, '6B164'),
(107, 3167, '6B167'),
(108, 3170, '6B170'),
(109, 3501, '7A1'),
(110, 3503, '7A3'),
(111, 3505, '7A5'),
(112, 3507, '7A7'),
(113, 3509, '7A9'),
(114, 3511, '7A11'),
(115, 3513, '7A13'),
(116, 3515, '7A15'),
(117, 3517, '7A17'),
(118, 3519, '7A19'),
(119, 3521, '7A21'),
(120, 3523, '7A23'),
(121, 3525, '7A25'),
(122, 3527, '7A27'),
(123, 3529, '7A29'),
(124, 3531, '7A31'),
(125, 3533, '7A33'),
(126, 3535, '7A35'),
(127, 3537, '7A37'),
(128, 3539, '7A39'),
(129, 3541, '7A41'),
(130, 3543, '7A43'),
(131, 3545, '7A45'),
(132, 3547, '7A47'),
(133, 3549, '7A49'),
(134, 3551, '7A51'),
(135, 3553, '7A53'),
(136, 3555, '7A55'),
(137, 3557, '7A57'),
(138, 3559, '7A59'),
(139, 3561, '7A61'),
(140, 3563, '7A63'),
(141, 3565, '7A65'),
(142, 3567, '7A67'),
(143, 3569, '7A69'),
(144, 3571, '7A71'),
(145, 3573, '7A73'),
(146, 3575, '7A75'),
(147, 3577, '7A77'),
(148, 3579, '7A79'),
(149, 3581, '7A81'),
(150, 3583, '7A83'),
(151, 3585, '7A85'),
(152, 3587, '7A87'),
(153, 3589, '7A89'),
(154, 3591, '7A91'),
(155, 3593, '7A93'),
(156, 3595, '7A95'),
(157, 3597, '7A97'),
(158, 3599, '7A99'),
(159, 3601, '7A101'),
(160, 3603, '7A103'),
(161, 3605, '7A105'),
(162, 3607, '7A107'),
(163, 3609, '7A109'),
(164, 3611, '7A111'),
(165, 3613, '7A113'),
(166, 3615, '7A115'),
(167, 3617, '7A117'),
(168, 3619, '7A119'),
(169, 3621, '7A121'),
(170, 3623, '7A123'),
(171, 3625, '7A125'),
(172, 3627, '7A127'),
(173, 3629, '7A129'),
(174, 3631, '7A131'),
(175, 3502, '7B2'),
(176, 3504, '7B4'),
(177, 3506, '7B6'),
(178, 3508, '7B8'),
(179, 3510, '7B10'),
(180, 3512, '7B12'),
(181, 3514, '7B14'),
(182, 3516, '7B16'),
(183, 3518, '7B18'),
(184, 3520, '7B20'),
(185, 3522, '7B22'),
(186, 3524, '7B24'),
(187, 3526, '7B26'),
(188, 3528, '7B28'),
(189, 3530, '7B30'),
(190, 3532, '7B32'),
(191, 3534, '7B34'),
(192, 3536, '7B36'),
(193, 3538, '7B38'),
(194, 3540, '7B40'),
(195, 3542, '7B42'),
(196, 3544, '7B44'),
(197, 3548, '7B48'),
(198, 3550, '7B50'),
(199, 3552, '7B52'),
(200, 3554, '7B54'),
(201, 3556, '7B56'),
(202, 3558, '7B58'),
(203, 3560, '7B60'),
(204, 3562, '7B62'),
(205, 3564, '7B64'),
(206, 3566, '7B66'),
(207, 3568, '7B68'),
(208, 3570, '7B70'),
(209, 3572, '7B72'),
(210, 3574, '7B74'),
(211, 3576, '7B76'),
(212, 3578, '7B78'),
(213, 3580, '7B80'),
(214, 3582, '7B82'),
(215, 3584, '7B84'),
(216, 3586, '7B86'),
(217, 3588, '7B88'),
(218, 3590, '7B90'),
(219, 3592, '7B92'),
(220, 3594, '7B94'),
(221, 3596, '7B96'),
(222, 3598, '7B98'),
(223, 3600, '7B100'),
(224, 3602, '7B102'),
(225, 3604, '7B104'),
(226, 3606, '7B106'),
(227, 3608, '7B108'),
(228, 3610, '7B110'),
(229, 3612, '7B112'),
(230, 3614, '7B114'),
(231, 3616, '7B116'),
(232, 3618, '7B118'),
(233, 3620, '7B120'),
(234, 3622, '7B122'),
(235, 3624, '7B124'),
(236, 3626, '7B126'),
(237, 3628, '7B128'),
(238, 3630, '7B130'),
(239, 4001, '8A1'),
(240, 4003, '8A3'),
(241, 4005, '8A5'),
(242, 4007, '8A7'),
(243, 4009, '8A9'),
(244, 4011, '8A11'),
(245, 4013, '8A13'),
(246, 4015, '8A15'),
(247, 4017, '8A17'),
(248, 4019, '8A19'),
(249, 4021, '8A21'),
(250, 4023, '8A23'),
(251, 4025, '8A25'),
(252, 4027, '8A27'),
(253, 4029, '8A29'),
(254, 4031, '8A31'),
(255, 4033, '8A33'),
(256, 4035, '8A35'),
(257, 4037, '8A37'),
(258, 4039, '8A39'),
(259, 4041, '8A41'),
(260, 4043, '8A43'),
(261, 4045, '8A45'),
(262, 4047, '8A47'),
(263, 4049, '8A49'),
(264, 4051, '8A51'),
(265, 4053, '8A53'),
(266, 4055, '8A55'),
(267, 4057, '8A57'),
(268, 4059, '8A59'),
(269, 4061, '8A61'),
(270, 4063, '8A63'),
(271, 4065, '8A65'),
(272, 4067, '8A67'),
(273, 4069, '8A69'),
(274, 4071, '8A71'),
(275, 4073, '8A73'),
(276, 4075, '8A75'),
(277, 4077, '8A77'),
(278, 4079, '8A79'),
(279, 4081, '8A81'),
(280, 4083, '8A83'),
(281, 4085, '8A85'),
(282, 4087, '8A87'),
(283, 4089, '8A89'),
(284, 4091, '8A91'),
(285, 4093, '8A93'),
(286, 4002, '8B2'),
(287, 4004, '8B4'),
(288, 4006, '8B6'),
(289, 4008, '8B8'),
(290, 4010, '8B10'),
(291, 4012, '8B12'),
(292, 4014, '8B14'),
(293, 4016, '8B16'),
(294, 4018, '8B18'),
(295, 4020, '8B20'),
(296, 4022, '8B22'),
(297, 4024, '8B24'),
(298, 4026, '8B26'),
(299, 4028, '8B28'),
(300, 4030, '8B30'),
(301, 4032, '8B32'),
(302, 4034, '8B34'),
(303, 4036, '8B36'),
(304, 4038, '8B38'),
(305, 4040, '8B40'),
(306, 4042, '8B42'),
(307, 4044, '8B44'),
(308, 4046, '8B46'),
(309, 4048, '8B48'),
(310, 4050, '8B50'),
(311, 4052, '8B52'),
(312, 4054, '8B54'),
(313, 4056, '8B56'),
(314, 4058, '8B58'),
(315, 4060, '8B60'),
(316, 4062, '8B62'),
(317, 4064, '8B64'),
(318, 4066, '8B66'),
(319, 4068, '8B68'),
(320, 4070, '8B70'),
(321, 4072, '8B72'),
(322, 4074, '8B74'),
(323, 4076, '8B76'),
(324, 4078, '8B78'),
(325, 4080, '8B80'),
(326, 4082, '8B82'),
(327, 4084, '8B84'),
(328, 4086, '8B86'),
(329, 4088, '8B88'),
(330, 4090, '8B90'),
(331, 4092, '8B92'),
(332, 4501, '9A1'),
(333, 4502, '9A2'),
(334, 4503, '9A3'),
(335, 4504, '9A4'),
(336, 4505, '9A5'),
(337, 4506, '9A6'),
(338, 4507, '9A7'),
(339, 4508, '9A8'),
(340, 4509, '9A9'),
(341, 4510, '9A10'),
(342, 4511, '9A11'),
(343, 4512, '9A12'),
(344, 4513, '9A13'),
(345, 4514, '9A14'),
(346, 4515, '9A15'),
(347, 4516, '9A16'),
(348, 4517, '9A17'),
(349, 4518, '9A18'),
(350, 4519, '9A19'),
(351, 4520, '9A20'),
(352, 4521, '9A21'),
(353, 4522, '9A22'),
(354, 4523, '9A23'),
(355, 4524, '9A24'),
(356, 4525, '9A25'),
(357, 4526, '9A26'),
(358, 4528, '9A28'),
(359, 4529, '9A29'),
(360, 4530, '9A30'),
(361, 4531, '9A31'),
(362, 4532, '9A32'),
(363, 4533, '9A33'),
(364, 4534, '9A34'),
(365, 4535, '9A35'),
(366, 4536, '9A36'),
(367, 4537, '9A37'),
(368, 4538, '9A38'),
(369, 4539, '9A39'),
(370, 4540, '9A40'),
(371, 4541, '9A41'),
(372, 4542, '9A42'),
(373, 4543, '9A43'),
(374, 4544, '9A44'),
(375, 4545, '9A45'),
(376, 4546, '9A46'),
(377, 4547, '9A47'),
(378, 4548, '9A48'),
(379, 4549, '9A49'),
(380, 4550, '9A50'),
(381, 4551, '9A51'),
(382, 4552, '9A52'),
(383, 4553, '9A53'),
(384, 4554, '9A54'),
(385, 4555, '9A55'),
(386, 4556, '9A56'),
(387, 4557, '9A57'),
(388, 4558, '9A58'),
(389, 4559, '9A59'),
(390, 4560, '9A60'),
(391, 4562, '9A62'),
(392, 4563, '9A63'),
(393, 4564, '9A64'),
(394, 4565, '9A65'),
(395, 4566, '9A66'),
(396, 4567, '9A67'),
(397, 4568, '9A68'),
(398, 4569, '9A69'),
(399, 4570, '9A70'),
(400, 4571, '9A71'),
(401, 4572, '9A72'),
(402, 4573, '9A73'),
(403, 4574, '9A74'),
(404, 4575, '9A75'),
(405, 4576, '9A76'),
(406, 4577, '9A77'),
(407, 4578, '9A78'),
(408, 4579, '9A79'),
(409, 4580, '9A80'),
(410, 4581, '9A81'),
(411, 4582, '9A82'),
(412, 4583, '9A83'),
(413, 4584, '9A84'),
(414, 4585, '9A85'),
(415, 4586, '9A86'),
(416, 4587, '9A87'),
(417, 4588, '9A88'),
(418, 4590, '9A90'),
(419, 4591, '9A91'),
(420, 4592, '9A92'),
(421, 4593, '9A93'),
(422, 4595, '9A95'),
(423, 4596, '9A96'),
(424, 4597, '9A97'),
(425, 4598, '9A98'),
(426, 4599, '9A99'),
(427, 4600, '9A100'),
(428, 4601, '9A101'),
(429, 4602, '9A102'),
(430, 4603, '9A103'),
(431, 4604, '9A104'),
(432, 5001, '10Science1'),
(433, 5002, '10Science2'),
(434, 5003, '10Science3'),
(435, 5004, '10Science4'),
(436, 5005, '10Science5'),
(437, 5006, '10Science6'),
(438, 5008, '10Science8'),
(439, 5009, '10Science9'),
(440, 5010, '10Science10'),
(441, 5013, '10Science13'),
(442, 5014, '10Science14'),
(443, 5015, '10Science15'),
(444, 5016, '10Science16'),
(445, 5017, '10Science17'),
(446, 5019, '10Science19'),
(447, 5021, '10Science21'),
(448, 5023, '10Science23'),
(449, 5025, '10Science25'),
(450, 5029, '10Science29'),
(451, 5041, '10Science41'),
(452, 5043, '10Science43'),
(453, 5045, '10Science45'),
(454, 5050, '10Science50'),
(455, 5055, '10Science55'),
(456, 5056, '10Science56'),
(457, 5062, '10Science62'),
(458, 5018, '10Commerce18'),
(459, 5022, '10Commerce22'),
(460, 5042, '10Commerce42'),
(461, 5048, '10Commerce48'),
(462, 5073, '10Commerce73'),
(463, 5007, '10Arts7'),
(464, 5012, '10Arts12'),
(465, 5020, '10Arts20'),
(466, 5024, '10Arts24'),
(467, 5026, '10Arts26'),
(468, 5027, '10Arts27'),
(469, 5028, '10Arts28'),
(470, 5030, '10Arts30'),
(471, 5031, '10Arts31'),
(472, 5032, '10Arts32'),
(473, 5033, '10Arts33'),
(474, 5034, '10Arts34'),
(475, 5035, '10Arts35'),
(476, 5036, '10Arts36'),
(477, 5037, '10Arts37'),
(478, 5038, '10Arts38'),
(479, 5039, '10Arts39'),
(480, 5040, '10Arts40'),
(481, 5044, '10Arts44'),
(482, 5046, '10Arts46'),
(483, 5049, '10Arts49'),
(484, 5051, '10Arts51'),
(485, 5052, '10Arts52'),
(486, 5053, '10Arts53'),
(487, 5054, '10Arts54'),
(488, 5057, '10Arts57'),
(489, 5058, '10Arts58'),
(490, 5059, '10Arts59'),
(491, 5060, '10Arts60'),
(492, 5061, '10Arts61'),
(493, 5063, '10Arts63'),
(494, 5064, '10Arts64'),
(495, 5065, '10Arts65'),
(496, 5066, '10Arts66'),
(497, 5068, '10Arts68'),
(498, 5069, '10Arts69'),
(499, 5070, '10Arts70'),
(500, 5071, '10Arts71'),
(501, 5072, '10Arts72'),
(502, 5074, '10Arts74'),
(503, 5075, '10Arts75'),
(504, 5076, '10Arts76'),
(505, 5077, '10Arts77'),
(506, 5078, '10Arts78'),
(507, 201, '6Mollika1'),
(508, 202, '6Mollika2'),
(509, 203, '6Mollika3'),
(510, 204, '6Mollika4'),
(511, 205, '6Mollika5'),
(512, 206, '6Mollika6'),
(513, 207, '6Mollika7'),
(514, 208, '6Mollika8'),
(515, 209, '6Mollika9'),
(516, 210, '6Mollika10'),
(517, 211, '6Mollika11'),
(518, 212, '6Mollika12'),
(519, 213, '6Mollika13'),
(520, 214, '6Mollika14'),
(521, 215, '6Mollika15'),
(522, 216, '6Mollika16'),
(523, 217, '6Mollika17'),
(524, 218, '6Mollika18'),
(525, 219, '6Mollika19'),
(526, 220, '6Mollika20'),
(527, 221, '6Mollika21'),
(528, 222, '6Mollika22'),
(529, 223, '6Mollika23'),
(530, 224, '6Mollika24'),
(531, 225, '6Mollika25'),
(532, 226, '6Mollika26'),
(533, 227, '6Mollika27'),
(534, 228, '6Mollika28'),
(535, 229, '6Mollika29'),
(536, 230, '6Mollika30'),
(537, 231, '6Mollika31'),
(538, 232, '6Mollika32'),
(539, 233, '6Mollika33'),
(540, 234, '6Mollika34'),
(541, 235, '6Mollika35'),
(542, 236, '6Mollika36'),
(543, 237, '6Mollika37'),
(544, 238, '6Mollika38'),
(545, 239, '6Mollika39'),
(546, 240, '6Mollika40'),
(547, 325, '6Mollika125'),
(548, 326, '6Mollika126'),
(549, 327, '6Mollika127');

-- --------------------------------------------------------

--
-- Table structure for table `markentrylog`
--

CREATE TABLE `markentrylog` (
  `id` int(11) NOT NULL,
  `teachername` varchar(255) NOT NULL,
  `loginip` varchar(255) NOT NULL,
  `logintime` varchar(255) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `subcode` int(11) NOT NULL,
  `examid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meritlist`
--

CREATE TABLE `meritlist` (
  `id` int(11) NOT NULL,
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
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paycat`
--

CREATE TABLE `paycat` (
  `id` int(11) NOT NULL,
  `pcatname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paycat`
--

INSERT INTO `paycat` (`id`, `pcatname`) VALUES
(1, 'Admission Fee'),
(2, 'Session Fee'),
(3, 'Regestration Fee'),
(4, 'Form Fill-up'),
(5, 'Half Yearly Exam Fee'),
(6, 'Final Exam Fee'),
(7, 'Electric bill'),
(8, 'Sallary- January'),
(9, 'Sallary- February'),
(10, 'Sallary- March'),
(11, 'Sallary- April'),
(12, 'Sallary- May'),
(13, 'Sallary- June'),
(14, 'Sallary- July'),
(15, 'Sallary- August'),
(16, 'Sallary- Septembar'),
(17, 'Sallary- Octobar'),
(18, 'Sallary- November'),
(19, 'Sallary- Decembar'),
(20, 'Test Exam Fee');

-- --------------------------------------------------------

--
-- Table structure for table `personalholyday`
--

CREATE TABLE `personalholyday` (
  `id` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `holydayname` varchar(255) NOT NULL,
  `numofday` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `friday` int(11) NOT NULL,
  `saturday` int(11) NOT NULL,
  `actualday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `protyon`
--

CREATE TABLE `protyon` (
  `id` int(11) NOT NULL,
  `stu_card` int(255) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `memorial_no` varchar(2000) NOT NULL,
  `village` varchar(2000) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `ps` varchar(2000) NOT NULL,
  `ds` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `protyon`
--

INSERT INTO `protyon` (`id`, `stu_card`, `stu_id`, `pdate`, `memorial_no`, `village`, `post`, `ps`, `ds`) VALUES
(1, 625577, '6Mollika5', '2024-05-12', 'ths/01/2024/56', 'পুইশুর', 'বলাকইড়', 'গোপালগঞ্জ সদর', 'গোপালগঞ্জ'),
(2, 625577, '6Mollika5', '2024-06-21', 'sdfasdfa', 'পুইশুর', 'বলাকইড়', 'গোপালগঞ্জ সদর', 'গোপালগঞ্জ');

-- --------------------------------------------------------

--
-- Table structure for table `publicholyday`
--

CREATE TABLE `publicholyday` (
  `id` int(11) NOT NULL,
  `holydayname` varchar(255) NOT NULL,
  `numofday` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `friday` int(11) NOT NULL,
  `actualday` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publicholyday`
--

INSERT INTO `publicholyday` (`id`, `holydayname`, `numofday`, `sdate`, `edate`, `friday`, `actualday`) VALUES
(1, 'General Holy Day', 2, '2024-04-14', '2024-04-15', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `resultpub`
--

CREATE TABLE `resultpub` (
  `id` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rfid`
--

CREATE TABLE `rfid` (
  `id` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `rfid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rfid`
--

INSERT INTO `rfid` (`id`, `stuid`, `rfid`) VALUES
(611, '6Shapla42', 612691),
(612, '6Shapla48', 609819),
(613, '6Shapla51', 600880),
(614, '6Shapla45', 612718),
(615, '6Shapla79', 10015436),
(616, '6Shapla44', 613706),
(617, '6Shapla58', 608175),
(618, '6Shapla57', 610190),
(619, '6Shapla47', 613327),
(620, '6Shapla67', 632003),
(621, '6Shapla71', 611245),
(622, '6Shapla74', 5814608),
(623, '6Shapla46', 629267),
(624, '6Shapla49', 609560),
(625, '6Shapla63', 614493),
(626, '6Shapla56', 608176),
(627, '6Mollika10', 613437),
(628, '6Mollika27', 618874),
(629, '6Mollika36', 623407),
(630, '6Mollika24', 614492),
(631, '6Mollika7', 609195),
(632, '6Mollika5', 625577),
(633, '6Mollika21', 7874085),
(634, '6Mollika125', 622809),
(635, '6Mollika15', 608800),
(636, '6Mollika28', 624509),
(637, '6Mollika19', 609559),
(638, '6Mollika8', 636644),
(639, '6Mollika31', 634580),
(640, '6Mollika13', 606675),
(641, '6Mollika29', 615942),
(642, '6Mollika2', 615975),
(643, '6Mollika30', 611246),
(644, '6Mollika20', 7845367),
(645, '6Mollika38', 633164),
(646, '6Golap120', 615941),
(647, '6Golap97', 612657),
(648, '6Golap106', 626258),
(649, '6Golap89', 623513),
(650, '6Golap99', 616596),
(651, '6Golap83', 629971),
(652, '6Golap107', 622113),
(653, '6Golap90', 627559),
(654, '6Golap87', 606423),
(655, '6Golap81', 10015439),
(656, '6Golap91', 630540),
(657, '6Golap123', 616623),
(658, '6Golap102', 603607),
(659, '6Golap92', 622287),
(660, '6Golap95', 613300),
(661, '6Golap109', 614702),
(662, '10Arts74', 626195),
(663, '7B89', 637736),
(664, '7B152', 637939),
(665, '7B46', 628137),
(666, '7B42', 619050),
(667, '7B36', 609792),
(668, '7B1', 625018),
(669, '8A120', 618702),
(670, '8B112', 596096),
(671, '8B79', 595845),
(672, '8B165', 598854),
(673, '8B10', 636527),
(674, '8B14', 596757),
(675, '8B22', 635976),
(676, '8B1', 601208),
(677, '8B48', 602392),
(678, '8B50', 595502),
(679, '8B24', 633655),
(680, '8B12', 599795),
(681, '8B3', 634436),
(682, '8B28', 633654),
(683, '8B68', 606810),
(684, '8B57', 12364705),
(685, '8B121', 636528),
(686, '8B55', 634435),
(687, '8B30', 605118),
(688, '8B69', 635975),
(689, '8B116', 603965),
(690, '8B119', 631837),
(691, '8B152', 597633),
(692, '8B164', 633652),
(693, '8B64', 636278),
(694, '8B11', 627561),
(695, '8B31', 630997),
(696, '9A145', 633650),
(697, '9B4', 635577),
(698, '9B48', 612285),
(699, '9B70', 625607),
(700, '9B28', 628135),
(701, '9B22', 634124),
(702, '9B26', 630995),
(703, '9B5', 624511),
(704, '9B12', 635971),
(705, '9B63', 631490),
(706, '6Shapla70', 12345310),
(707, '6Shapla53', 12368564),
(708, '6Shapla72', 12376048),
(709, '6Shapla64', 12367593),
(710, '6Shapla61', 12399893),
(711, '6Shapla43', 12368329),
(712, '6Shapla77', 12393112),
(713, '6Shapla80', 12353822),
(714, '6Shapla76', 12341260),
(715, '6Shapla54', 12367834),
(716, '6Shapla73', 12370052),
(717, '6Golap105', 12391209),
(718, '6Golap111', 12360644),
(719, '6Golap118', 12367828),
(720, '6Golap93', 12354275),
(721, '6Golap98', 12359272),
(722, '6Golap124', 12394572),
(723, '6Golap101', 12392883),
(724, '6Golap112', 12362012),
(725, '6Golap84', 12375803),
(726, '6Golap96', 12387833),
(727, '6Golap94', 12392305),
(728, '6Golap115', 12384244),
(729, '6Golap103', 12377405),
(730, '6Golap113', 4428187),
(731, '6Golap114', 4421955),
(732, '6Mollika23', 12386500),
(733, '6Mollika35', 12359745),
(734, '6Mollika17', 12367583),
(735, '6Mollika16', 12361765),
(736, '6Mollika40', 12382630),
(737, '6Mollika12', 12397929),
(738, '6Mollika9', 4408021),
(739, '6Mollika25', 4426628),
(740, '7B21', 12364026),
(741, '7B51', 12397812),
(742, '7B11', 12356807),
(743, '7B99', 12376395),
(744, '7B120', 12401379),
(745, '7B83', 12409738),
(746, '7B109', 12387891),
(747, '7B77', 12396524),
(748, '7B117', 12387832),
(749, '7B2', 12383326),
(750, '7B3', 12370777),
(751, '7B6', 12383397),
(752, '7B31', 4451164),
(753, '7B64', 4447206),
(754, '7B96', 4459990),
(755, '7B88', 4445454),
(756, '7B98', 4433184),
(757, '7B52', 4443876),
(758, '7B82', 4427356),
(759, '7B68', 4439682),
(760, '7B57', 4424932),
(761, '7B92', 12360457),
(762, '7B122', 12392163),
(763, '7B85', 12359970),
(764, '7B54', 12384974),
(765, '7B19', 12345816),
(766, '7B124', 12376800),
(767, '7B150', 12351876),
(768, '7B10', 12375813),
(769, '7B74', 12345679),
(770, '7B87', 12346939),
(771, '7B15', 12342407),
(772, '7B69', 12375462),
(773, '7B151', 12357498),
(774, '7B135', 12350155),
(775, '7B71', 12359133),
(776, '7B93', 12353027),
(777, '7B58', 12341140),
(778, '7B25', 12378059),
(779, '7B55', 12376054),
(780, '7B95', 12346978),
(781, '7B108', 12351882),
(782, '7B102', 12384733),
(783, '7B23', 7016820),
(784, '7B84', 7005747),
(785, '7B40', 7017156),
(786, '7B131', 4394455),
(787, '7A81', 12412394),
(788, '7A118', 12390915),
(789, '7A60', 12390834),
(790, '7A111', 12392980),
(791, '7A79', 4448708),
(792, '7A148', 12359755),
(793, '7A33', 12351691),
(794, '7A133', 12383991),
(795, '7A140', 12352329),
(796, '7A94', 12345193),
(797, '7A63', 12342655),
(798, '7A43', 12343692),
(799, '7A70', 12355993),
(800, '7A27', 12349469),
(801, '7A53', 12342119),
(802, '7A107', 12348250),
(803, '7A8', 12369791),
(804, '7A67', 7014961),
(805, '7A132', 6987810),
(806, '7A17', 4388587),
(807, '8B92', 4387164),
(808, '8B114', 4400379),
(809, '8B16', 12359539),
(810, '8B20', 12371951),
(811, '8B94', 12368112),
(812, '8B128', 12353374),
(813, '8B100', 12374773),
(814, '8B17', 12373611),
(815, '8B93', 12387086),
(816, '8B56', 12372994),
(817, '8B70', 12372859),
(818, '8B44', 12403952),
(819, '8B23', 12365558),
(820, '8B133', 12407919),
(821, '8B2', 12346870),
(822, '8B130', 12410780),
(823, '8B129', 12356450),
(824, '8B45', 12357828),
(825, '8B82', 12347507),
(826, '8B21', 12353773),
(827, '8B107', 12350481),
(828, '8B41', 12355007),
(829, '8B53', 12418551),
(830, '8B18', 12361947),
(831, '8B15', 12392251),
(832, '8B65', 12386390),
(833, '8B136', 12417378),
(834, '8B72', 12395965),
(835, '8B43', 12418546),
(836, '8B99', 12390706),
(837, '8B148', 12367681),
(838, '8B6', 12413476),
(839, '8B144', 12404772),
(840, '8B38', 12408399),
(841, '8B67', 4364016),
(842, '8B78', 4459010),
(843, '8B84', 4400378),
(844, '8B146', 4390899),
(845, '8B122', 4437801),
(846, '8B109', 4428088),
(847, '8B54', 4424208),
(848, '8A125', 4454258),
(849, '8A27', 4412427),
(850, '8A139', 4404450),
(851, '8A59', 4447310),
(852, '8A35', 4453708),
(853, '8A113', 4455947),
(854, '8A149', 4419027),
(855, '8A118', 4431642),
(856, '8A87', 4445297),
(857, '8A151', 4390295),
(858, '8A102', 4393274),
(859, '8A47', 4460084),
(860, '8A74', 12349590),
(861, '8A134', 12342635),
(862, '8A159', 12403447),
(863, '8A88', 12398522),
(864, '8A161', 12415979),
(865, '8A81', 12375960),
(866, '8A42', 12387963),
(867, '8A96', 12416943),
(868, '8A166', 12384079),
(869, '8A75', 12406048),
(870, '8A13', 12409740),
(871, '8A63', 12405898),
(872, '8A98', 12415977),
(873, '8A49', 12417376),
(874, '8A89', 12399218),
(875, '8A29', 4359992),
(876, '8A97', 4300351),
(877, '8A111', 4308239),
(878, '8A90', 4297595),
(879, '8A160', 4387177),
(880, '8A9', 4399049),
(881, '8A19', 4396995),
(882, '8A127', 4419911),
(883, '9B2', 4452446),
(884, '9B1', 12357721),
(885, '9B30', 7008836),
(886, '9B10', 12384149),
(887, '9B52', 12400769),
(888, '9B109', 12343144),
(889, '9B127', 12393699),
(890, '9B3', 12404021),
(891, '9B38', 12365439),
(892, '9B24', 12347452),
(893, '9B27', 12396523),
(894, '9B92', 12346913),
(895, '9B71', 12402721),
(896, '9B75', 12354338),
(897, '9B17', 12405339),
(898, '9B11', 12354423),
(899, '9B79', 12349930),
(900, '9B97', 12401353),
(901, '9B8', 12362548),
(902, '9B13', 12373746),
(903, '9B140', 12349304),
(904, '9B49', 622380),
(905, '9B18', 627206),
(906, '9B68', 637428),
(907, '9B62', 6989986),
(908, '9B59', 6994110),
(909, '9B54', 6996384),
(910, '9B20', 7006333),
(911, '9B7', 6997412),
(912, '9B172', 6997769),
(913, '9B73', 12358287),
(914, '9B96', 4393379),
(915, '9B114', 4391583),
(916, '9B80', 4381811),
(917, '9B111', 4389864),
(918, '9B41', 4414605),
(919, '9B9', 4414025),
(920, '9B43', 4398166),
(921, '9B106', 4335942),
(922, '9B133', 4302714),
(923, '9B67', 4302214),
(924, '9A119', 617915),
(925, '9A77', 6990935),
(926, '9A61', 6993092),
(927, '9A82', 6999544),
(928, '9A126', 7002889),
(929, '9A47', 4384011),
(930, '9A107', 4388615),
(931, '9A56', 4422124),
(932, '9A94', 4412194),
(933, '9A93', 4413833),
(934, '9A90', 12337878),
(935, '9A55', 4418505),
(936, '9A29', 4305173),
(937, '9A6', 4305718),
(938, '9A31', 4332430),
(939, '10Commerce18', 4397196),
(940, '10Commerce2', 4438019),
(941, '10Commerce13', 4392476),
(942, '10Commerce14', 4428206),
(943, '10Commerce1', 4458021),
(944, '10Commerce6', 4428894),
(945, '10Commerce17', 4420486),
(946, '10Commerce10', 4297606),
(947, '10Commerce25', 4327722),
(948, '10Science4', 6708291),
(949, '10Science1', 4299818),
(950, '10Arts20', 12358634),
(951, '10Arts54', 4423710),
(952, '10Arts59', 5482054),
(953, '10Arts30', 4392211),
(954, '10Arts61', 4424071),
(955, '10Arts77', 12366789),
(956, '10Arts68', 4464670),
(957, '10Arts18', 4385614),
(958, '10Arts49', 4386107),
(959, '10Arts13', 4386768),
(960, '10Arts8', 5482052),
(961, '10Arts79', 7002777),
(962, '10Arts11', 13996152),
(963, '10Arts71', 4393553),
(964, '10Arts27', 4385835),
(965, '10Arts38', 13996154),
(966, '10Arts3', 4389900),
(967, '10Arts52', 4392491),
(968, '10Arts10', 4400693),
(969, '10Arts1', 4394650),
(970, '10Arts2', 4404114),
(971, '10Arts31', 4390208),
(972, '10Arts67', 4382079),
(973, '10Arts50', 4431978),
(974, '10Arts6', 4464779),
(975, '10Arts29', 4463306),
(976, '10Arts55', 12374990),
(977, '10Arts90', 12350349),
(978, '10Arts43', 12337076),
(979, '10Arts9', 12356574),
(980, '10Arts41', 12340618),
(981, '10Arts56', 12349444),
(982, '10Arts47', 4330666),
(983, '10Arts39', 4454994),
(984, '10Arts86', 4463958),
(985, '10Arts82', 4460663),
(986, '8B141', 13996203),
(987, '8B71', 13996204),
(988, '8B76', 13996191),
(989, '8B153', 13996202),
(990, '8B157', 13996201),
(991, '8B103', 2571572),
(992, '8B131', 5483020),
(993, '8B86', 2635281),
(994, '8B95', 2635737),
(995, '8B26', 2636017),
(996, '8B58', 2636474),
(997, '8A61', 5482916),
(998, '8A123', 5483023),
(999, '8A162', 2636753),
(1000, '8A91', 2637208),
(1001, '8A52', 2635002),
(1002, '8A33', 2634545),
(1003, '8A37', 2634268),
(1004, '8A39', 13996206),
(1005, '8A142', 13996205),
(1006, '7B47', 13996189),
(1007, '7B115', 5482046),
(1008, '7B73', 2633111),
(1009, '7B104', 2681270),
(1010, '7B126', 2672653),
(1011, '7B22', 2672720),
(1012, '7B41', 2675271),
(1013, '7B9', 2680781),
(1014, '7B137', 13996207),
(1015, '7B80', 2632389),
(1016, '7B110', 5483017),
(1017, '7B90', 2571574),
(1018, '7B141', 2633831),
(1019, '7B44', 2571575),
(1020, '7A32', 5483018),
(1021, '7A145', 2633548),
(1022, '7A28', 13996200),
(1023, '7A45', 2681250),
(1024, '7A4', 2675326),
(1025, '7A147', 2675909),
(1026, '7A5', 5482048),
(1027, '9A21', 2680182),
(1028, '9A14', 2674034),
(1029, '9A58', 2680203),
(1030, '9A16', 2674617),
(1031, '9A115', 6697575),
(1032, '9A142', 5482911),
(1033, '9A35', 2672054),
(1034, '9A23', 2681827),
(1035, '9A32', 2682373),
(1036, '9A121', 5482914),
(1037, '9A51', 2681824),
(1038, '9B104', 2671981),
(1039, '9B116', 2674684),
(1040, '9B44', 2680756),
(1041, '9B101', 2673376),
(1042, '9B37', 2673961),
(1043, '10Science2', 13996157),
(1044, '10Science8', 5482050),
(1045, '10Science3', 5334294),
(1046, '10Commerce23', 5482044),
(1047, '10Commerce22', 13996158),
(1048, '10Commerce24', 5482049),
(1049, '10Commerce5', 5482043),
(1050, '10Commerce20', 13801445),
(1051, '10Commerce21', 13801392),
(1052, '10Commerce3', 13801393),
(1053, '10Commerce12', 10015435),
(1054, '10Commerce29', 5482053),
(1055, '10Commerce4', 13996155),
(1056, '10Arts14', 10039656),
(1057, '10Arts21', 10039663),
(1058, '10Arts58', 10013886),
(1059, '10Arts45', 10013878),
(1060, '10Arts16', 10013885),
(1061, '10Arts42', 5814727),
(1062, '10Arts63', 10015440),
(1063, '10Arts5', 13996153),
(1064, '10Arts37', 1947209),
(1065, '10Arts26', 5482045),
(1066, '10Arts36', 13996159),
(1067, '10Arts32', 13996156),
(1068, '10Arts35', 5482051),
(1069, '10Arts70', 13801444),
(1070, '10Arts33', 13801386),
(1071, '10Arts25', 5815756),
(1072, '10Arts4', 10015434),
(1073, '10Arts19', 5814323),
(1074, '10Arts15', 10015438),
(1075, '10Arts40', 13996151),
(1076, '10Arts53', 13996150),
(1077, '10Arts60', 2679625),
(1078, '10Arts7', 10013887),
(1079, '6Mollika22', 6710920),
(1080, '6Golap104', 6708252),
(1081, '9A53', 2682366),
(1082, '9A91', 2671391),
(1083, '9A103', 2673302),
(1084, '9A34', 2673387),
(1085, '9A64', 2621219),
(1086, '9A74', 2616345),
(1087, '9A102', 2157794),
(1088, '9B45', 2621628),
(1089, '9B76', 2673956),
(1090, '9B113', 2571570),
(1091, '9B99', 2672731),
(1092, '9B117', 2673307),
(1093, '10Commerce7', 6710720),
(1094, '9A136', 6699081),
(1095, '9A108', 6710688),
(1096, '8A132', 6698887),
(1097, '8B85', 6710723),
(1098, '8B110', 6698855),
(1099, '7B129', 6680201),
(1100, '7B157', 6690239),
(1101, '7A78', 6690083),
(1102, '6Shapla50', 6708220),
(1103, '6Shapla60', 6708227),
(1104, '6Shapla128', 6690100),
(1105, '6Mollika3', 6679486),
(1106, '6Mollika4', 7809350),
(1107, '6Mollika6', 6690206),
(1108, '6Mollika11', 7498889),
(1109, '6Mollika14', 6710947),
(1110, '6Mollika18', 6709769),
(1111, '6Mollika33', 6710931),
(1112, '6Mollika34', 6710904),
(1113, '6Mollika127', 6708284),
(1114, '6Golap85', 6710915),
(1115, '6Golap88', 6708275),
(1116, '6Golap108', 6708211),
(1117, '6Golap116', 6690254),
(1118, '6Golap117', 6690271),
(1119, '10Arts64', 6714723),
(1120, '10Arts69', 6712196),
(1121, '9A87', 6519263),
(1122, '8B175', 6541492),
(1123, '10Commerce9', 6517905),
(1124, '10Commerce11', 6541483),
(1125, '10Arts44', 6541664),
(1126, '9A105', 6519231),
(1127, '9A88', 6519279),
(1128, '9A124', 6697623),
(1129, '9B110', 6519242),
(1130, '7A86', 6519295),
(1131, '7A128', 6519247),
(1132, '8A145', 6710691),
(1133, '8A32', 6697584),
(1134, '6Mollika1', 7867658),
(1139, '6Mollika26', 7464957);

-- --------------------------------------------------------

--
-- Table structure for table `schoolinfo`
--

CREATE TABLE `schoolinfo` (
  `id` int(11) NOT NULL,
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
  `head_deg_bangla` tinyblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `schoolinfo`
--

INSERT INTO `schoolinfo` (`id`, `schoolname`, `schooladdress`, `mobile`, `website`, `schoolnameb`, `schooladdressb`, `mobileb`, `schmail`, `shortcode`, `softlink`, `eiin`, `estd`, `schoolcode`, `voccode`, `headname`, `headnameb`, `head_deg`, `head_deg_bangla`) VALUES
(1, 'TALIMPUR TELIHATI HIGH SCHOOL', 'Vill: BALIABHANGA, Post: BALIABHANGA , PS:  Kotalipara ,DS: Gopalganj', ' 01710884587', 'kotaliparaui.edu.bd', 'টুঠামান্দ্রা উচ্চ বিদ্যালয়', 'গ্রাম: টুঠামান্দ্রা পোস্ট:টুঠামান্দ্রা উপজেলা: গোপালগঞ্জ সদর জেলা: গোপালগঞ্জ', '০১৩০৯১০৯৪৪১', 'kuikot1899@gmail.com', 'BHPSHS', 'https://www.blackcodeit.net/school/bhphs', '109544', '1898', '6899', '0', 'HIMANGSHU KUMAR PANDAY', 'প্রদ্যু কুমার ভদ্র', 'Principle', 0xe0a685e0a6a7e0a78de0a6afe0a695e0a78de0a6b7);

-- --------------------------------------------------------

--
-- Table structure for table `sectiongroup`
--

CREATE TABLE `sectiongroup` (
  `id` int(11) NOT NULL,
  `classname` varchar(255) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `uninumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sectiongroup`
--

INSERT INTO `sectiongroup` (`id`, `classname`, `classnumber`, `secgroupname`, `uninumber`) VALUES
(3, 'Class Six', 6, 'Mollika', '6Mollika'),
(5, 'Class Seven', 7, 'A', '7A'),
(8, 'Class Eight', 8, 'A', '8A'),
(22, 'Class Six', 6, 'Shapla', '6Shapla'),
(23, 'Class Seven', 7, 'B', '7B'),
(25, 'Class Nine', 9, 'A', '9A'),
(27, 'Class Ten', 10, 'Commerce', '10Commerce'),
(28, 'Class Ten', 10, 'Science', '10Science'),
(29, 'Class Ten', 10, 'Arts', '10Arts'),
(32, 'Class Six', 6, 'Golap', '6Golap\r\n'),
(33, 'Class Eight', 8, 'B', '8B'),
(34, 'Class Nine', 9, 'B', '9B');

-- --------------------------------------------------------

--
-- Table structure for table `set_admit_id`
--

CREATE TABLE `set_admit_id` (
  `id` int(11) NOT NULL,
  `examid` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `payid` varchar(255) NOT NULL,
  `uni` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `set_admit_id`
--

INSERT INTO `set_admit_id` (`id`, `examid`, `classnumber`, `secgroupname`, `payid`, `uni`) VALUES
(1, 1, 6, 'Mollika', '1', '6Mollika11'),
(2, 1, 6, 'Mollika', '12', '6Mollika112'),
(3, 1, 6, 'Mollika', '13', '6Mollika113');

-- --------------------------------------------------------

--
-- Table structure for table `smsbal`
--

CREATE TABLE `smsbal` (
  `id` int(11) NOT NULL,
  `totalsms` int(11) NOT NULL,
  `bal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smsbal`
--

INSERT INTO `smsbal` (`id`, `totalsms`, `bal`) VALUES
(1, 4500, 4494);

-- --------------------------------------------------------

--
-- Table structure for table `smslog`
--

CREATE TABLE `smslog` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `number` int(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `charector` int(11) NOT NULL,
  `usedsms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smslog`
--

INSERT INTO `smslog` (`id`, `text`, `number`, `status`, `charector`, `usedsms`) VALUES
(1, 'SMS SENT THROUGH FUNCTION', 1783808373, 'Sent', 25, 1),
(2, 'sdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd sadfbsdfuios sahbfd ', 1783808373, 'Sent', 1260, 3),
(3, 'hjfsdfhobno', 1783808373, 'Sent', 11, 1),
(4, 'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount60Thanks ByBHPSHS Powered By Black Code IT', 1783808373, 'Sent', 114, 1),
(5, 'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount40Thanks ByBHPSHS Powered By Black Code IT', 1783808373, 'Sent', 114, 1),
(6, 'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount80Thanks ByBHPSHS Powered By Black Code IT', 1783808373, 'Sent', 114, 1),
(7, 'Hello Md. Sizan Rahman SarderYour Cash Amount 20 is received. Due amount60Thanks ByBHPSHS Powered By Black Code IT', 1783808373, 'Sent', 114, 1),
(8, 'Hello Md. Sizan Rahman SarderYour Cash Amount 30 is received. Due amount30Thanks ByBHPSHS Powered By Black Code IT', 1783808373, 'Sent', 114, 1),
(9, 'Hello Md. Sizan Rahman SarderYour Cash Amount 100 is received. Due amount0Thanks ByBHPSHS Powered By Black Code IT', 1783808373, 'Sent', 114, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stuaddress`
--

CREATE TABLE `stuaddress` (
  `id` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stuaddressbangla`
--

CREATE TABLE `stuaddressbangla` (
  `id` int(11) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `village` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `ps` varchar(255) NOT NULL,
  `ds` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `stuaddressbangla`
--

INSERT INTO `stuaddressbangla` (`id`, `stuid`, `village`, `post`, `ps`, `ds`) VALUES
(1, '6Mollika5', 'পুইশুর', 'বলাকইড়', 'গোপালগঞ্জ সদর', 'গোপালগঞ্জ');

-- --------------------------------------------------------

--
-- Table structure for table `stuattdancedata`
--

CREATE TABLE `stuattdancedata` (
  `id` int(11) NOT NULL,
  `machineid` varchar(255) NOT NULL,
  `stuid` varchar(255) NOT NULL,
  `adate` date NOT NULL,
  `ctime` varchar(255) NOT NULL,
  `cinout` varchar(255) NOT NULL,
  `cinoutid` int(11) NOT NULL,
  `uniqattid` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `serverstatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stuattdancedata`
--

INSERT INTO `stuattdancedata` (`id`, `machineid`, `stuid`, `adate`, `ctime`, `cinout`, `cinoutid`, `uniqattid`, `status`, `serverstatus`) VALUES
(1, '221', '6Mollika21', '2024-04-29', '09:03:00', 'Clock IN', 1, '22117143416001', 'Present', '1'),
(2, '220', '6Mollika20', '2024-04-29', '09:02:58', 'Clock IN', 1, '22017143416001', 'Present', '1'),
(3, '211', '6Mollika11', '2024-04-29', '09:02:57', 'Clock IN', 1, '21117143416001', 'Present', '1'),
(4, '226', '6Mollika26', '2024-04-29', '09:02:55', 'Clock IN', 1, '22617143416001', 'Present', '1'),
(5, '204', '6Mollika4', '2024-04-29', '09:02:54', 'Clock IN', 1, '20417143416001', 'Present', '1'),
(6, '201', '6Mollika1', '2024-04-29', '09:02:51', 'Clock IN', 1, '20117143416001', 'Present', '1'),
(7, '201', '6Mollika1', '2024-04-29', '00:00:23', 'Unknown', 3, '20117143416003', 'Present', '1'),
(8, '204', '6Mollika4', '2024-04-29', '00:00:21', 'Unknown', 3, '20417143416003', 'Present', '1'),
(9, '211', '6Mollika11', '2024-04-29', '00:00:19', 'Unknown', 3, '21117143416003', 'Present', '1'),
(10, '220', '6Mollika20', '2024-04-29', '00:00:18', 'Unknown', 3, '22017143416003', 'Present', '1'),
(11, '221', '6Mollika21', '2024-04-29', '00:00:16', 'Unknown', 3, '22117143416003', 'Present', '1'),
(12, '226', '6Mollika26', '2024-04-29', '00:00:13', 'Unknown', 3, '22617143416003', 'Present', '1'),
(13, '2', '6Mollika26', '2024-01-30', '21:30:48', 'Unknown', 3, '217065692003', 'Present', '1'),
(14, '12', '6Mollika26', '2024-01-27', '13:17:19', 'Clock Out', 2, '1217063100002', 'Present', '1'),
(15, '3', '6Mollika26', '2024-01-14', '21:03:55', 'Unknown', 3, '317051868003', 'Present', '1'),
(16, '4', '6Mollika26', '2023-11-19', '12:16:54', 'Clock Out', 2, '417003484002', 'Present', '1'),
(20, '4', '6Mollika26', '2023-10-28', '11:49:01', 'Clock IN', 1, '416984440001', 'Present', '1'),
(21, '3', '6Mollika26', '2023-10-28', '11:48:57', 'Clock IN', 1, '316984440001', 'Present', '1'),
(22, '2', '6Mollika26', '2023-10-28', '11:48:51', 'Clock IN', 1, '216984440001', 'Present', '1'),
(26, '1', '6Mollika26', '2023-06-10', '18:20:57', 'Unknown', 3, '116863480003', 'Present', '1'),
(30, '1', '6Mollika26', '2023-06-09', '15:08:51', 'Clock Out', 2, '116862616002', 'Present', '1'),
(33, '1012', '6Mollika26', '2023-05-28', '01:11:29', 'Unknown', 3, '101216852248003', 'Present', '1'),
(34, '1009', '6Mollika26', '2023-05-28', '01:11:28', 'Unknown', 3, '100916852248003', 'Present', '1'),
(35, '1005', '6Mollika26', '2023-05-28', '01:11:26', 'Unknown', 3, '100516852248003', 'Present', '1'),
(36, '1004', '6Mollika26', '2023-05-28', '01:11:24', 'Unknown', 3, '100416852248003', 'Present', '1'),
(37, '1027', '6Mollika26', '2023-05-28', '01:11:23', 'Unknown', 3, '102716852248003', 'Present', '1'),
(38, '1007', '6Mollika26', '2023-05-28', '01:11:21', 'Unknown', 3, '100716852248003', 'Present', '1'),
(39, '1031', '6Mollika26', '2023-05-28', '01:11:20', 'Unknown', 3, '103116852248003', 'Present', '1'),
(40, '1021', '6Mollika26', '2023-05-28', '01:11:17', 'Unknown', 3, '102116852248003', 'Present', '1'),
(41, '1072', '6Mollika26', '2023-05-28', '01:11:16', 'Unknown', 3, '107216852248003', 'Present', '1'),
(42, '1020', '6Mollika26', '2023-05-28', '01:11:15', 'Unknown', 3, '102016852248003', 'Present', '1'),
(43, '1052', '6Mollika26', '2023-05-28', '01:11:13', 'Unknown', 3, '105216852248003', 'Present', '1'),
(44, '1062', '6Mollika26', '2023-05-28', '01:11:12', 'Unknown', 3, '106216852248003', 'Present', '1'),
(45, '1042', '6Mollika26', '2023-05-28', '01:11:10', 'Unknown', 3, '104216852248003', 'Present', '1'),
(46, '1057', '6Mollika26', '2023-05-28', '01:11:09', 'Unknown', 3, '105716852248003', 'Present', '1'),
(47, '817', '6Mollika26', '2023-05-28', '01:10:56', 'Unknown', 3, '81716852248003', 'Present', '1'),
(48, '821', '6Mollika26', '2023-05-28', '01:10:54', 'Unknown', 3, '82116852248003', 'Present', '1'),
(49, '833', '6Mollika26', '2023-05-28', '01:10:52', 'Unknown', 3, '83316852248003', 'Present', '1'),
(50, '840', '6Mollika26', '2023-05-28', '01:10:50', 'Unknown', 3, '84016852248003', 'Present', '1'),
(51, '863', '6Mollika26', '2023-05-28', '01:10:48', 'Unknown', 3, '86316852248003', 'Present', '1'),
(52, '811', '6Mollika26', '2023-05-28', '01:10:43', 'Unknown', 3, '81116852248003', 'Present', '1'),
(53, '420', '6Mollika26', '2023-05-28', '01:10:39', 'Unknown', 3, '42016852248003', 'Present', '1'),
(54, '825', '6Mollika26', '2023-05-28', '01:09:44', 'Unknown', 3, '82516852248003', 'Present', '1'),
(55, '856', '6Mollika26', '2023-05-28', '01:09:43', 'Unknown', 3, '85616852248003', 'Present', '1'),
(56, '260', '6Mollika26', '2023-05-28', '01:09:32', 'Unknown', 3, '26016852248003', 'Present', '1'),
(57, '282', '6Mollika26', '2023-05-28', '01:09:31', 'Unknown', 3, '28216852248003', 'Present', '1'),
(58, '278', '6Mollika26', '2023-05-28', '01:09:29', 'Unknown', 3, '27816852248003', 'Present', '1'),
(59, '279', '6Mollika26', '2023-05-28', '01:09:27', 'Unknown', 3, '27916852248003', 'Present', '1'),
(60, '294', '6Mollika26', '2023-05-28', '01:09:26', 'Unknown', 3, '29416852248003', 'Present', '1'),
(61, '635', '6Mollika26', '2023-05-28', '01:09:12', 'Unknown', 3, '63516852248003', 'Present', '1'),
(62, '616', '6Mollika26', '2023-05-28', '01:09:10', 'Unknown', 3, '61616852248003', 'Present', '1'),
(63, '624', '6Mollika26', '2023-05-28', '01:09:08', 'Unknown', 3, '62416852248003', 'Present', '1'),
(64, '621', '6Mollika26', '2023-05-28', '01:09:06', 'Unknown', 3, '62116852248003', 'Present', '1'),
(65, '644', '6Mollika26', '2023-05-28', '01:09:04', 'Unknown', 3, '64416852248003', 'Present', '1'),
(66, '688', '6Mollika26', '2023-05-28', '01:09:02', 'Unknown', 3, '68816852248003', 'Present', '1'),
(67, '855', '6Mollika26', '2023-05-28', '01:08:55', 'Unknown', 3, '85516852248003', 'Present', '1'),
(68, '845', '6Mollika26', '2023-05-28', '01:08:54', 'Unknown', 3, '84516852248003', 'Present', '1'),
(69, '844', '6Mollika26', '2023-05-28', '01:08:50', 'Unknown', 3, '84416852248003', 'Present', '1'),
(70, '820', '6Mollika26', '2023-05-28', '01:08:48', 'Unknown', 3, '82016852248003', 'Present', '1'),
(71, '849', '6Mollika26', '2023-05-28', '01:08:46', 'Unknown', 3, '84916852248003', 'Present', '1'),
(72, '201', '6Mollika1', '2024-04-29', '15:06:12', 'Clock Out', 2, '20117143416002', 'Present', '1'),
(73, '204', '6Mollika4', '2024-04-29', '15:06:10', 'Clock Out', 2, '20417143416002', 'Present', '1'),
(74, '226', '6Mollika26', '2024-04-29', '15:06:08', 'Clock Out', 2, '22617143416002', 'Present', '1'),
(75, '211', '6Mollika11', '2024-04-29', '15:06:07', 'Clock Out', 2, '21117143416002', 'Present', '1'),
(76, '220', '6Mollika20', '2024-04-29', '15:06:05', 'Clock Out', 2, '22017143416002', 'Present', '1'),
(77, '221', '6Mollika21', '2024-04-29', '15:06:03', 'Clock Out', 2, '22117143416002', 'Present', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
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
  `brisqr` varchar(3000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `classnumber`, `classname`, `secgroup`, `roll`, `name`, `fname`, `mname`, `nameb`, `fnameb`, `mnameb`, `sex`, `dob`, `birthid`, `fnid`, `mnid`, `address`, `mobile`, `uniqid`, `imgname`, `brisqr`) VALUES
(1222, 8, 'Class Eight', 'A', 123, 'FAHIM SARDER', 'WAHID SARDER', 'FERDOSI  BEGUM', 'ফাহিম সরদার', 'অহিদ সরদার', 'ফেরদোছি  বেগম', 'MALE', '2010-11-19', '20103514381034465', '0', '0', 'GOPALGANJ', '0', '8A123', 'IMG_2837.png', NULL),
(1223, 8, 'Class Eight', 'A', 104, 'MD RAJ SHEIKH', 'REZAUL  SHEIKH', 'PARVIN BEGUM', 'মোঃ রাজ  শেখ', 'রিজাউল শেখ', 'পারভিন  বেগম', 'MALE', '2009-02-14', '20093514381032845', '0', '0', 'GOPALGANJ', '01736720552', '8A104', 'IMG_2751.png', NULL),
(1224, 8, 'Class Eight', 'A', 49, 'ANINDO BISWAS', 'AKHIL KUMAR  BISWAS', 'RITA BISWAS', 'অনিন্দ বিশ্বাস', 'অখিল কুমার  বিশ্বাস', 'রিতা বিশ্বাস', 'MALE', '2011-06-14', '20112910384104023', '0', '0', 'FARIDPUR', '01924807826', '8A49', 'IMG_2750.png', NULL),
(1225, 8, 'Class Eight', 'A', 63, 'ABIR ISLAM  KHAN', 'MD ARMAN  KHAN', 'SONIA KHANAM', 'আবির ইসলাম  খান', 'আরমান খান', 'ছনিয়া খানম', 'MALE', '2012-08-05', '20123514327031519', '0', '0', 'GOPALGANJ', '01891823187', '8A63', 'IMG_2749.png', NULL),
(1226, 8, 'Class Eight', 'A', 60, 'SIBBER SORDED', 'HOSEL SORDER', 'AS', 'মোঃ ছাব্বির সরদার', 'মোঃ সোহেল সরদার', 'রহিমা বেগম', 'MALE', '2010-07-01', '20103514381034600', '0', '0', '', '01995103423', '8A60', 'IMG_2748.png', NULL),
(1227, 8, 'Class Eight', 'A', 149, 'RONY BISWAS', 'GOPAL BISWAS', 'LAXMI RANI  BISWAS', 'রনি বিশ্বাস', 'গোপাল বিশ্বাস', 'লক্ষী রানী  বিশ্বাস', 'MALE', '2008-09-02', '20083514327031611', '0', '0', 'GOPALGANJ', '01311922505', '8A149', 'IMG_2747.png', NULL),
(1228, 8, 'Class Eight', 'A', 9, 'AYON BISWAS', 'PRODIP  BISWAS', 'DIPA', 'অয়ন বিশ্বাস', 'প্রদীপ বিশ্বাস', 'দিপা বিশ্বাস', 'MALE', '2011-06-25', '20113514327034410', '0', '0', 'BRASUR', '01788482252', '8A9', 'IMG_2746.png', NULL),
(1229, 8, 'Class Eight', 'A', 88, 'IBRAHIM', 'MD AHAD  MOLLA', 'RESHMI BEGUM', 'ইব্রাহিম', 'মোঃ আহাদ  মোল্যা', 'রেশমী বেগম', 'MALE', '2011-04-14', '20113514327035093', '0', '0', 'GOPALGANJ', '01908248620', '8A88', 'IMG_2744.png', NULL),
(1230, 8, 'Class Eight', 'A', 75, 'MD EMON FARAJI', 'MD AMADUL  FARAJI', 'MST MAHIMA  BEGUM', 'মোঃ ইমন  ফরাজী', 'মোঃ এমাদুলদু  ফরাজী', 'মোছাঃ মাহিমা  বেগম', 'MALE', '2010-02-10', '20100117719106213', '0', '0', 'BAGERHAT', '01785664252', '8A75', 'IMG_2743.png', NULL),
(1231, 8, 'Class Eight', 'A', 32, 'ARONNO KUMAR  GHOSH', 'NESHIT GHOSH', 'SAROSWATI GHOSH', 'অরণ্য কুমার  ঘোষ', 'নিশীথ ঘোষ', 'সরস্বতী ঘোষ', 'MALE', '2012-03-15', '20122910384101535', '0', '0', 'FARIDPUR', '01778718252', '8A32', 'IMG_2742.png', NULL),
(1232, 8, 'Class Eight', 'A', 134, 'MD SHAWON  MOLLA', 'MD SIPON MOLLA', 'KHOHINOR  KHANOM', 'মোঃ শাওন  মোল্যা', 'মোঃ সিপন  মোল্যা', 'কহিনুরনু খানম', 'MALE', '2010-07-23', '20103514327030781', '0', '0', 'GOPALGANJ', '01727491120', '8A134', 'IMG_2740.png', NULL),
(1233, 8, 'Class Eight', 'A', 125, 'MD RAHID  MOLLA', 'MD NAZIM UDDIN', 'MRS REPU  BEGUM', 'মোঃ রহিদ  মোল্যা', 'মোঃ নাজিম  উদ্দিন', 'মিসেস রিপু  বেগম', 'MALE', '2011-09-22', '20112910384103532', '0', '0', 'FARIDPUR', '01793563763', '8A125', 'IMG_2739.png', NULL),
(1234, 8, 'Class Eight', 'A', 102, 'ASHIK BISWAS', 'AUSHUTAS KUMAR  BISWAS', 'CHINA RANI BISWAS', 'আশিক বিশ্বাস', 'আসুতোষ কুমার  বিশ্বাস', 'চায়না রানী  বিশ্বাস', 'MALE', '2010-01-27', '20103514327030253', '0', '0', 'GOPALGANJ', '01937266235', '8A102', 'IMG_2738.png', NULL),
(1235, 8, 'Class Eight', 'A', 118, 'MD AZIJUL HASAN  FAHIM', 'MD LAYAK HASAN', 'TOUHIDA ISLAM', 'মোঃ আজিজুলজু  হাসান ফাহিম', 'মোঃ লায়েক হাসান', 'তৌহিদা ইসলাম', 'MALE', '2011-04-27', '20113514327029108', '0', '0', 'GOPALGANJ', '01405566624', '8A118', 'IMG_2737.png', NULL),
(1236, 8, 'Class Eight', 'A', 139, 'MD SOHAN MOLLA', 'MD. SHPRIFUL  ISLAM', 'KOBITA BEGUM', 'মো: সোহান  মোল্যা', 'মো: সরিফুল  ইসলাম', 'কবিতা বেগম', 'MALE', '2011-03-10', '20116515263010251', '0', '0', 'NARAIL', '01937672016', '8A139', 'IMG_2736.png', NULL),
(1237, 8, 'Class Eight', 'A', 89, 'GOURAB BISWAS', 'SUSAN CHANDRA  BISWAS', 'MALOTI RANI  BISWAS', 'গৌরব বিশ্বাস', 'শুসেন চন্দ্র  বিশ্বাস', 'মালতি রানী  বিশ্বাস', 'MALE', '2012-02-10', '20122910384104470', '0', '0', 'FARIDPUR', '01910260248', '8A89', 'IMG_2735.png', NULL),
(1238, 8, 'Class Eight', 'A', 47, 'ASIM BISWAS', 'BISHNUPADO  BISWAS', 'CHINU RANI  BISWAS', 'অসীম বিশ্বাস', 'বিষ্ঞুপদ  বিশ্বাস', 'চিনু রানী  বিশ্বাস', 'MALE', '2011-07-29', '20113514327031039', '0', '0', 'GOPALGANJ', '01725367292', '8A47', 'IMG_2730.png', NULL),
(1239, 7, 'Class Seven', 'B', 57, 'SRITI BISWAS', 'SHARAT BISWASH', 'UNNATI RANI  BISWAS', 'স্মৃতি বিশ্বাস', 'শরৎ বিশ্বাস', 'উন্নতি রানী  বিশ্বাস', 'FEMALE', '2010-04-25', '20102910384103593', '0', '0', 'FARIDPUR', '01946986888', '7B57', 'IMG_2835.png', NULL),
(1240, 7, 'Class Seven', 'A', 86, 'HASAN AL  MAMUN', 'NAJIR BISWAS', 'HARIGA BEGUM', 'হাচান আল  মামুনমু', 'নাজির বিশ্বাস', 'হারিজা বেগম', 'MALE', '2010-02-12', '20103514327033628', '0', '0', 'GOPALGANJ', '01402195573', '7A86', 'IMG_2665.png', NULL),
(1241, 7, 'Class Seven', 'A', 56, 'TAHARIM', 'MD MOSHIAR  MOLLA', 'MST EASMIN', 'তাহারিম', 'মোঃ মশিয়ার  মোল্যা', 'মোছাঃ  ইয়াছমিন', 'MALE', '2012-01-02', '20123534327044502', '0', '0', 'GOPALGANJ', '01849581674', '7A56', 'IMG_2663.png', NULL),
(1242, 7, 'Class Seven', 'A', 65, 'HABIBUR BISWAS', 'MD SHAHABUDDEN  BISWAS', 'MRS JHARNA BEGUM', 'হাবিবুরবু বিশ্বাস', 'মোঃ শাহাবুদ্দী বু ন  বিশ্বাস', 'মিসেস ঝর্না  বেগম', 'MALE', '2009-12-13', '20093514327031133', '0', '0', 'GOPALGANJ', '01946670424', '7A65', 'IMG_2662.png', NULL),
(1243, 7, 'Class Seven', 'A', 70, 'BADHAN  BISWAS', 'KANAI BISWAS', 'KAKOLI RAY', 'বাধন বিশ্বাস', 'কানাই  বিশ্বাস', 'কাকলী রায়', 'MALE', '2011-08-06', '20113514327030206', '0', '0', 'GOPALGANJ', '01737526953', '7A70', 'IMG_2661.png', NULL),
(1244, 7, 'Class Seven', 'A', 91, 'MD TAHASIN MOLLA', 'MD MUNNU MOLLA', 'MST TAHAMINA  KHANAM', 'মোঃ তাহসিন  মোল্যা', 'মোঃ মুন্নুমুন্নুমোল্যা', 'মোছাঃ তহমিনা  খানম', 'MALE', '2011-12-13', '20113534327041740', '0', '0', 'GOPALGANJ', '01931692201', '7A91', 'IMG_2652.png', NULL),
(1245, 7, 'Class Seven', 'A', 79, 'MD. RONI MOLLA', 'MD RUBAL MOLLA', 'MST PINGERA  BEGUM', 'মো: রনি মোল্যা', 'মোঃ রুবেল  মোল্যা', 'মোসাঃ পিঞ্জিরা  বেগম', 'MALE', '2011-11-19', '20116515263010229', '0', '0', 'NARAIL', '01906916382', '7A79', 'IMG_2651.png', NULL),
(1246, 7, 'Class Seven', 'A', 67, 'RAHMAT MOLLA', 'MD LITON  MOLLA', 'AMENA BEGUM', 'রহমাত মোল্যা', 'মোঃ লিটন  মোল্যা', 'আমেনা বেগম', 'MALE', '2011-11-20', '20113514327031270', '0', '0', 'GOPALGANJ', '01991482362', '7A67', 'IMG_2650.png', NULL),
(1247, 7, 'Class Seven', 'A', 60, 'SALMAN SHEIKH', 'MD HASAN  SHEIKH', 'SHILPI BEGUM', 'সালমান শেখ', 'মো হাসান  শেখ', 'শিল্পি বেগম', 'MALE', '2011-08-19', '20113514327031404', '0', '0', 'GOPALGANJ', '01710085030', '7A60', 'IMG_2648.png', NULL),
(1248, 7, 'Class Seven', 'A', 59, 'MD NEWAZUL  HAQUE SHARIF', 'MD SAIFUL ISLAM', 'MST TAHARA ISLAM', 'মোঃনেওয়াজুলজু হক  শরীফ', 'মোঃসাইফুল  ইসলাম', 'মোসাঃ তাহেরা  ইসলাম', 'MALE', '2013-08-04', '20133514327034044', '0', '0', 'GOPALGANJ', '01716757913', '7A59', 'IMG_2647.png', NULL),
(1249, 7, 'Class Seven', 'A', 53, 'MD SOHAN  SHEIKH', 'MD SHOHAG  SHEAK', 'SONEA BAGUM', 'মোঃ সোহান  শেখ', 'মোঃ সোহাগ  শেখ', 'সোনিয়া বেগম', 'MALE', '2012-01-05', '20122910384105028', '0', '0', 'FARIDPUR', '01942459419', '7A53', 'IMG_2646.png', NULL),
(1250, 7, 'Class Seven', 'B', 87, 'MST LAMIYA  KHANAM', 'MD MUSA', 'MST SONIA  KHANAM', 'মোসাঃ লামিয়া  খানম', 'মোঃ মুসা মু', 'মোছাঃ সোনিয়া  খানম', 'FEMALE', '2012-03-14', '20123514327034172', '0', '0', 'GOPALGANJ', '01813572288', '7B87', 'IMG_2643.png', NULL),
(1251, 7, 'Class Seven', 'B', 89, 'MARZIA  JANNAT', 'MONIRUZZMAN', 'AMENA  KHATUN', 'মারজিয়া  জান্নাত', 'মনিরুজ্জামান', 'আমেনা খাতুন', 'FEMALE', '2012-09-16', '20123514327031093', '0', '0', 'GOPALGANJ', '01718445004', '7B89', 'IMG_2641.png', NULL),
(1252, 7, 'Class Seven', 'B', 71, 'JUI MALA', 'MD ZIYAUR  RAHMAN', 'MST ROMACHA  BEGUM', 'জুইজু মালা', 'মোঃ জিয়াউর  রহমান', 'মোছাঃ রোমেচা  বেগম', 'FEMALE', '2011-10-23', '20113514327031685', '0', '0', 'GOPALGANJ', '01315410046', '7B71', 'IMG_2640.png', NULL),
(1253, 7, 'Class Seven', 'B', 93, 'OARNA AHMMED  FATEMA', 'KAZI MASUM AHMED', 'ANJUMANARA  AKTAR TANIA', 'অর্না আহম্মেদ  ফাতেমা', 'কাজী মাসুম  আহমেদ', 'আঞ্জুমা ঞ্জু নারা  আক্তার তানিয়া', 'FEMALE', '2012-06-24', '20123534327035337', '0', '0', 'GOPALGANJ', '01317888494', '7B93', 'IMG_2639.png', NULL),
(1254, 7, 'Class Seven', 'B', 58, 'FARIA RAHMAN', 'MD. MIZANUR  RAHMAN SHEIKH', 'MST HELENA PARVIN', 'ফারিয়া রহমান', 'মো: মিজানুরনু  রহমান শেখ', 'মোছা: হেলেনা  পারভীন', 'FEMALE', '2011-02-02', '20113514327031326', '0', '0', 'GOPALGANJ', '01739265097', '7B58', 'IMG_2638.png', NULL),
(1255, 7, 'Class Seven', 'B', 76, 'TAHSINA MOLLICK  SINHA', 'MD MIZANUR  RAHMAN', 'MST AMENA BEGUM', 'তাহসিনা মল্লিক  সিনহা', 'মোঃ মিজানুরনু  রহমান', 'মোসা আমেনা  বেগম', 'FEMALE', '2010-01-02', '20102910384114491', '0', '0', 'FARIDPUR', '01518667158', '7B76', 'IMG_2637.png', NULL),
(1256, 7, 'Class Seven', 'B', 77, 'SHARIF TADIYAT', 'SHARIF ALI  MORTAZA LITU', 'CHUMKI KHANAM', 'শরীফ তাদিয়াত', 'শরীফ আলী  মর্তজা লিটু', 'চুমকি খানম', 'FEMALE', '2012-09-29', '20123534327036697', '0', '0', 'GOPALGANJ', '01716779352', '7B77', 'IMG_2636.png', NULL),
(1257, 7, 'Class Seven', 'B', 64, 'MITU', 'ABDULLAH  SHEIKH', 'MUKTA BEGUM', 'মিতু', 'আবদুল্লা দু হ  শেখ', 'মুক্তা মু বেগম', 'FEMALE', '2010-11-29', '20103514327034167', '0', '0', 'GOPALGANJ', '01780205596', '7B64', 'IMG_2635.png', NULL),
(1258, 7, 'Class Seven', 'B', 96, 'YASMIN KHANAM', 'MD EAKRUM  SHEIK', 'JAHEDA BEGUM', 'ইয়াছমিন  খানম', 'মোঃ ইকরাম  শেখ', 'জাহেদা বেগম', 'FEMALE', '2010-11-15', '20102910384102512', '0', '0', 'FARIDPUR', '01907387758', '7B96', 'IMG_2633.png', NULL),
(1259, 7, 'Class Seven', 'B', 69, 'PUJA BISWAS', 'LITON BISWAS', 'MALA RANI  BISWAS', 'পূজা বিশ্বাস', 'লিটন বিশ্বাস', 'মালা রানী  বিশ্বাস', 'FEMALE', '2012-03-01', '20122910384104475', '0', '0', 'FARIDPUR', '01920158083', '7B69', 'IMG_2632.png', NULL),
(1260, 7, 'Class Seven', 'B', 92, 'SADIA ISLAM  MEDHA', 'MD SOHEL RANA', 'RESHMA AKTER', 'সাদিয়া ইসলাম  মেধা', 'মোঃ সোহেল  রানা', 'রেশমা আক্তার', 'FEMALE', '2011-11-27', '20113514327033169', '0', '0', 'GOPALGANJ', '01726183375', '7B92', 'IMG_2631.png', NULL),
(1261, 7, 'Class Seven', 'B', 83, 'ASRAFI KHANAM', 'MD ASGAR  HOSSAIN', 'SHILPI KHANAM', 'আসরাফি খানম', 'মোঃআজগর  হোসেন', 'শিল্পী খানম', 'FEMALE', '2012-09-10', '20123514327033155', '0', '0', 'GOPALGANJ', '01795227907', '7B83', 'IMG_2630.png', NULL),
(1262, 7, 'Class Seven', 'B', 52, 'RAISA KHANAM', 'KAMAL  HOSSAIN', 'ASMA', 'রাইসা খানম', 'কামাল  হোসেন', 'আছমা', 'FEMALE', '2011-10-13', '20112910384104300', '0', '0', 'FARIDPUR', '01913136440', '7B52', 'IMG_2628.png', NULL),
(1263, 7, 'Class Seven', 'B', 80, 'MST: MITHILA  ISLAM EMA', 'MD MOFIGUR  RAHMAN', 'MST RUPALI  BEGUM', 'মোছা: মিথিলা  ইসলাম ইমা', 'মো: মফিজুরজু  রহমান', 'মোসাঃ রুপালী  বেগম', 'FEMALE', '2012-01-01', '20126515263010259', '0', '0', 'NARAIL', '01960206236', '7B80', 'IMG_2627.png', NULL),
(1264, 7, 'Class Seven', 'B', 68, 'MST. ASIYA KHANOM', 'MD. HAFIZUR MOLLA', 'MST. SOPNA BEGUM', 'মোসা: আছিয়া খানম', 'মো: হাফিজুরজু মোল্যা', 'মোসা: স্বপ্না বেগম', 'FEMALE', '2010-04-03', '20106515263010960', '0', '0', 'VILLAGE: CHAGOLCHIRA,  POST: KAMTHANA, P.S:  LOHAGARA, DISTRICT:  NARAIL.', '01947731810', '7B68', 'IMG_2626.png', NULL),
(1265, 7, 'Class Seven', 'B', 98, 'JOTI BISWAS', 'BENOY KUMAR  BISWAS', 'SHILPI BISWAS', 'জ্যোতি বিশ্বাস', 'বিনয় কুমার  বিশ্বাস', 'শিল্পী বিশ্বাস', 'FEMALE', '2010-06-12', '20103514327030310', '0', '0', 'GOPALGANJ', '01947993110', '7B98', 'IMG_2625.png', NULL),
(1266, 7, 'Class Seven', 'B', 55, 'SUMIYA RAHMAN', 'MOSHEUR  RAHAMAN', 'SABINA BEGUM', 'সুমাইয়া  রহমান', 'মশিউর  রহমান', 'ছাবিনা বেগম', 'FEMALE', '2013-02-17', '20133514327034948', '0', '0', 'GOPALGANJ', '01912390192', '7B55', 'IMG_2623.png', NULL),
(1267, 7, 'Class Seven', 'B', 54, 'TESHA BISWAS', 'LITON KUMAR  BISWAS', 'DIPALI RANI  SARKAR', 'তিষা বিশ্বাস', 'লিটন কুমার  বিশ্বাস', 'দিপালী রানী  সরকার', 'FEMALE', '2010-04-10', '20103514327030284', '0', '0', 'GOPALGANJ', '01778571060', '7B54', 'IMG_2622.png', NULL),
(1268, 7, 'Class Seven', 'B', 73, 'SENJIYA AKTER  TONNA', 'MD TORIKUL  SHEIKH', 'SHANTA AKTER  MIM', 'সিনজিয়া আক্তার  তন্না', 'মোঃ তরিকুল  শেখ', 'শান্তা আক্তার  মিম', 'FEMALE', '2012-10-10', '20123514327031439', '0', '0', 'GOPALGANJ', '01320632168', '7B73', 'IMG_2621.png', NULL),
(1269, 7, 'Class Seven', 'B', 82, 'SAYMA  TABASSUM', 'GOLAM SARWAR', 'MHAFUZA  AKTHER', 'সায়মা  তাবাসসুম', 'গোলাম  ছরোয়ার', 'মাহফুজা  আক্তার', 'FEMALE', '2012-07-10', '20123514327033093', '0', '0', 'GOPALGANJ', '01792156106', '7B82', 'IMG_2620.png', NULL),
(1270, 7, 'Class Seven', 'B', 85, 'MITHILA  KHANAM', 'MEHEDI HASAN', 'HALIMA BEGUM', 'মিথীলা  খানম', 'মেহেদী  হাচান', 'হালিমা  বেগম', 'FEMALE', '2012-09-21', '20123514381034666', '0', '0', 'GOPALGANJ', '01926080409', '7B85', 'IMG_2619.png', NULL),
(1271, 7, 'Class Seven', 'B', 99, 'JANNATY  KHANAM', 'MD EBADUL  SARDER', 'MST ROZINA  BEGUM', 'জান্নাতি খানম', 'মোঃ ইবাদুলদু  সরদার', 'মোছাঃ রোজিনা  বেগম', 'FEMALE', '2012-06-15', '20123534327042470', '0', '0', 'GOPALGANJ', '01712285616', '7B99', 'IMG_2617.png', NULL),
(1272, 7, 'Class Seven', 'B', 84, 'LABANNO AKTER', 'MD MITUL MOLLA', 'MST MUNNI  HOSSAIN', 'লাবন্য আক্তার', 'মোঃ মিতুল  মোল্যা', 'মোসাঃ মুন্নিমু  হোসেন', 'FEMALE', '2011-10-31', '20113514327031670', '0', '0', 'GOPALGANJ', '01909522821', '7B84', 'IMG_2616.png', NULL),
(1273, 7, 'Class Seven', 'B', 88, 'LIZA KHANAM', 'MD UZZAL SHEAK', 'MST SALMA  BEGUM', 'লিজা খানম', 'মোঃ উজ্জল শেখ', 'মোসাঃ সালমা  বেগম', 'FEMALE', '2012-02-03', '20122910384104267', '0', '0', 'FARIDPUR', '01986201896', '7B88', 'IMG_2615.png', NULL),
(1274, 7, 'Class Seven', 'B', 51, 'ASHA KHANAM', 'MD BIPUL  BISWAS', 'PARVIN AKTAR', 'আশা খানম', 'মোঃ বিপুল  বিশ্বাস', 'পারভীন  আক্তার', 'FEMALE', '2011-10-14', '20113514327031339', '0', '0', 'GOPALGANJ', '01911884900', '7B51', 'IMG_2614.png', NULL),
(1275, 7, 'Class Seven', 'B', 95, 'LAMIA ISLAM', 'ABDUR RHAMAN  MOLLA', 'KHURSIDA BEGUM', 'লামিয়া ইসলাম', 'আব্দুর রহমান  মোল্যা', 'খুরশিদা বেগম', 'FEMALE', '2010-11-27', '20103514327035098', '0', '0', 'GOPALGANJ', '01725367278', '7B95', 'IMG_2613.png', NULL),
(1276, 7, 'Class Seven', 'B', 74, 'JUI AKTER MOU', 'MD UZZAL  BISWAS', 'MST VANU  KHANAM', 'জুইজু আক্তার মৌ', 'মোঃ উজ্জল  বিশ্বাস', 'মোছাঃ ভানু  খানম', 'FEMALE', '2012-02-01', '20123514327033077', '0', '0', 'GOPALGANJ', '01919421254', '7B74', 'IMG_2612.png', NULL),
(1277, 7, 'Class Seven', 'B', 72, 'MARIUM BINTE  ARIF', 'MD ARIF  HOSSAIN', 'SHAPLA ARIF', 'মারিয়াম বিনতে  আরিফ', 'মোঃ আরিফ  হোসেন', 'শাপলা আরিফ', 'FEMALE', '2013-07-26', '20132910384104797', '0', '0', 'FARIDPUR', '01939404579', '7B72', 'IMG_2610.png', NULL),
(1278, 7, 'Class Seven', 'A', 63, 'MD MASUM  BILLAH', 'LUTFAR SHEIKH', 'MONIRA PARVIN', 'মোঃ মাসুম  বিল্লাহ', 'লুৎফর লু শেখ', 'মনিরা পারভীন', 'MALE', '2011-05-07', '20113514327030152', '0', '0', 'GOPALGANJ', '01925879489', '7A63', 'IMG_2609.png', NULL),
(1279, 7, 'Class Seven', 'A', 75, 'SAKIB MOLLICK', 'MD. LOBAN  MOLLICK', 'SILPI BEGUM', 'সাকিব মল্লিক', 'মোঃ লোবান  মল্লিক', 'শিল্পী বেগম', 'MALE', '2011-12-18', '20112910384104381', '0', '0', 'FARIDPUR', '01790012135', '7A75', 'IMG_2608.png', NULL),
(1280, 8, 'Class Eight', 'B', 12, 'RUPA', 'AZGAR SIKDER', 'RASHIDA BEGUM', 'রুপা', 'আজগার শিকদার', 'রাশিদা বেগম', 'FEMALE', '2010-05-04', '20103514381033674', '0', '0', 'VILL: SHANKORPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01735196234', '8B12', 'IMG_2841.png', NULL),
(1281, 7, 'Class Seven', 'B', 90, 'OYSHE KHANAM', 'MD RAMZAN  SHEKH', 'CHAMPA KHANAM', 'ঐশি খানম', 'মোঃ রমজান  শেখ', 'চম্পা খানম', 'FEMALE', '2012-08-24', '20123534327036124', '0', '0', 'GOPALGANJ', '01965260172', '7B90', 'IMG_2611.png', NULL),
(1282, 7, 'Class Seven', 'B', 25, 'SABIHA TASNIM', 'GOLAM SARWAR', 'MHAFUZA  AKTHER', 'সাবিহা  তাসনিম', 'গোলাম  ছরোয়ার', 'মাহফুজা  আক্তার', 'FEMALE', '2012-07-10', '20123514327033092', '0', '0', 'GOPALGANJ', '01792156106', '7B25', 'IMG_2578.png', NULL),
(1283, 8, 'Class Eight', 'B', 17, 'ALISHA KHANAM', 'MD RAHAMAT  MOLLA', 'CHINA KHANAM  SADIA', 'অলিসা খানম', 'মোঃ রহমত  মোল্যা', 'চায়না খানম  সাদিয়া', 'FEMALE', '2011-09-02', '20113514327031736', '0', '0', 'GOPALGANJ', '0171092967', '8B17', 'IMG_20240210_0039.jpg', NULL),
(1284, 7, 'Class Seven', 'B', 47, 'TAHMIDA  KHANAM', 'MD TOHED  MOLLA', 'MST SONIA  BEGUM', 'তাহমিদা খানম', 'মোঃ তহিদ মোল্লা', 'মোছাঃ সোনিয়া  বেগম', 'FEMALE', '2011-12-29', '20112910384104377', '0', '0', 'FARIDPUR', '01995404237', '7B47', 'IMG_2759.png', NULL),
(1285, 8, 'Class Eight', 'B', 50, 'UMME HABIBA  JABIN', 'MD JOHUR MIA', 'LOVELY KHANAM', 'উম্মে হাবিবা  জেবিন', 'মোঃ জহুর মিয়া', 'লাভলী খানম', 'FEMALE', '2011-10-06', '20113534327035382', '0', '0', 'Barashur', '01921406514', '8B50', 'IMG_2677.png', NULL),
(1286, 8, 'Class Eight', 'B', 79, 'FARIYA KHANOM', 'MD BABLU  MOLLA', 'MST SHILPI  BEGUM', 'ফারিয়া খানম', 'মোঃ বাবলু  মোল্যা', 'মোছাঃ শিল্পী  বেগম', 'FEMALE', '2011-08-11', '20113534327042672', '0', '0', 'GOPALGANJ', '017569901034', '8B79', 'IMG_2678.png', NULL),
(1287, 8, 'Class Eight', 'B', 44, 'KOBITA KHANAM', 'MD KABIR  MOLLA', 'SHARIFA  BEGUM', 'কবিতা খানম', 'মোঃ কবির  মোল্যা', 'শরীফা বেগম', 'FEMALE', '2011-02-12', '20113534327036690', '0', '0', 'GOPALGANJ', '01945365724', '8B44', 'IMG_2679.png', NULL),
(1288, 8, 'Class Eight', 'B', 136, 'JANNATI AYSHA', 'YESIN MUNSHI', 'RUMA BEGUM', 'জান্নাতী আয়শা', 'ইয়াসিন মুন্সী মু', 'রুমা বেগম', 'FEMALE', '2010-12-13', '20103514381033119', '0', '0', 'VILL: SHANKORPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01729654627', '8B136', 'IMG_2680.png', NULL),
(1289, 8, 'Class Eight', 'B', 62, 'ISRAT JAHAN  MIM', 'MD ISLAM  MOLLA', 'MST YASMIN', 'ইসরাত জাহান  মিম', 'মোঃ ইসলাম  মোল্লা', 'মোছাঃ  ইয়াছমিন', 'FEMALE', '2010-06-16', '20103514327030825', '0', '0', 'GOPALGANJ', '01935601286', '8B62', 'IMG_2681.png', NULL),
(1290, 8, 'Class Eight', 'B', 94, 'AYSHA SIDDIQUI', 'MD LITU SHEIKH', 'MST SIMA  BEGUM', 'আয়েশা সিদ্দিকী', 'মোঃ লিটু শেখ', 'মোছাঃ সিমা  বেগম', 'FEMALE', '2010-08-03', '20103514327031723', '0', '0', 'GOPALGANJ', '01916519967', '8B94', 'IMG_2682.png', NULL),
(1291, 8, 'Class Eight', 'B', 22, 'AYEESHA SIDDIKA', 'S M MIJANUR  RAHMAN', 'LINA PARVIN', 'আয়শা সিদ্দিকা', 'এস এম মিজানুরনু  রহমান', 'লিনা পারভীন', 'FEMALE', '2010-06-01', '20103534327036974', '0', '0', 'GOPALGANJ', '01720953799', '8B22', 'IMG_2683.png', NULL),
(1292, 7, 'Class Seven', 'A', 17, 'FAHIM MOLLA', 'MD RUHUL  AMIN', 'RUMA', 'ফাইম:মোল্যা', 'মোঃ রুহুল  আমিন', 'রুমা', 'MALE', '2011-01-05', '20116515263010248', '0', '0', 'NARAIL', '01328168057', '7A17', 'IMG_2561.png', NULL),
(1293, 8, 'Class Eight', 'B', 30, 'BARSHA BISWAS', 'SUBARNO  BISWAS', 'KAKOLY BISWAS', 'বর্ষা বিশ্বাস', 'সুবর্ণা বিশ্বাস', 'কাকলী  বিশ্বাস', 'FEMALE', '2010-08-10', '20103514327031032', '0', '0', 'GOPALGANJ', '01710633726', '8B30', 'IMG_2684.png', NULL),
(1294, 7, 'Class Seven', 'A', 14, 'MAHINUL ISLAM  RIAD', 'MAMUNUR  RAHMAN', 'MST SHAMIMA  BEGUM', 'মাহিনুলনু ইসলাম  রিয়াদ', 'মামুনুমুরনু রহমান', 'মোছাঃ শামিমা  বেগম', 'MALE', '2012-08-10', '20123514327033582', '0', '0', 'GOPALGANJ', '01904146311', '7A14', 'IMG_2733.png', NULL),
(1295, 8, 'Class Eight', 'B', 93, 'MST LUBNA  KHANAM', 'MD LUTFOR  RAHMAN KAZI', 'MST NARGISH  BEGUM', 'মোসাঃলুবলুনা খানম', 'মোঃ লুৎফর লু রহমান  কাজী', 'মোসাঃনারগিছ  বেগম', 'FEMALE', '2010-09-08', '20103514327030543', '0', '0', 'GOPALGANJ', '01835102178', '8B93', 'IMG_2685.png', NULL),
(1296, 8, 'Class Eight', 'B', 82, 'SHILA KHANAM', 'MD WALIAR  RAHMAN', 'SHILPI BEGUM', 'শিলা খানম', 'মোঃ অলিয়ার  রহমান', 'শিল্পী বেগম', 'FEMALE', '2009-01-01', '20093514327031669', '0', '0', 'GOPALGANJ', '01926192665', '8B82', 'IMG_2686.png', NULL),
(1297, 7, 'Class Seven', 'B', 2, 'মিসঃ আশা খানম', 'মোঃ ইমান মল্লিক', 'মনিরা বেগম', 'মিসঃ আশা খানম', 'মোঃ ইমান মল্লিক', 'মনিরা বেগম', 'Female', '2012-07-02', '20122910384100715', '0', '0', '', '01951370644', '7B2', 'IMG_2724.png', NULL),
(1298, 8, 'Class Eight', 'B', 152, 'ELMA KHANAM', 'MD. OHIDUZZAMAN  MOLLAH', 'MST. SALMA BEGUM', 'ইলমা খানম', 'মোঃ ওহিদুজ্জা দু মান  মোল্যা', 'মোসাঃ সালমা বেগম', 'FEMALE', '2010-03-20', '20102910384103715', '0', '0', 'VILL: TAGARBANDA,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '01980331203', '8B152', 'IMG_2687.png', NULL),
(1299, 8, 'Class Eight', 'B', 1, 'ISRAT JAHAN ESA', 'MD SAHJAHAN  HOSSAN', 'SHAKILA AKTER', 'ইসরাত জাহান  ঈশা', 'মোঃ শাহজাহান  হোসেন', 'শাকিলা আক্তার', 'FEMALE', '2011-01-15', '20113514327031626', '0', '0', 'GOPALGANJ', '01773656194', '8B1', 'IMG_2688.png', NULL),
(1300, 8, 'Class Eight', 'B', 128, 'MST SUMAYA KHATUN', 'TUHIN BISWAS', 'MORSHEDA BEGUM', 'মোছাঃ সুমাইয়া খাতুন', 'তুহিন বিশ্বাস', 'মোরসেদা বেগম', 'FEMALE', '2010-02-08', '20104119086909923', '0', '0', 'VILLAGE:NARAYONPUR', '01936837140', '8B128', 'IMG_2689.png', NULL),
(1301, 8, 'Class Eight', 'B', 119, 'TITHI KHANAM', 'MIRAJ MOLLA', 'RENUKA BEGUM', 'তিথি খানম', 'মিরাজ  মোল্যা', 'রেনুকা নু  বেগম', 'FEMALE', '2010-03-18', '20106515263009948', '0', '0', 'PURBO  CHARKALNA', '01932402535', '8B119', 'IMG_2691.png', NULL),
(1302, 8, 'Class Eight', 'B', 48, 'TAIMA HOSSEN', 'IMTIAZ HOSSEN  TAMAL', 'SUMAYA KHANOM', 'তাঈমা হোসেন', 'ইমতিয়াজ হোসেন  তমাল', 'সুমাইয়া খানম', 'FEMALE', '2010-07-10', '20103514381030575', '0', '0', 'GOPALGANJ', '01711044515', '8B48', 'IMG_2692.png', NULL),
(1303, 8, 'Class Eight', 'B', 45, 'RAISA IRANI MIM', 'MD FARID  AHMED', 'MST LEPY  BEGUM', 'রাইছা ইরানী  মিম', 'মোঃ ফরিদ  আহমেদ', 'মোসাঃ লিপি  বেগম', 'FEMALE', '2007-09-25', '20073534327039546', '0', '0', 'GOPALGANJ', '01956146695', '8B45', 'IMG_20240210_0045.jpg', NULL),
(1304, 8, 'Class Eight', 'B', 64, 'MOREUM', 'MILON MOLLA', 'CHAMPA  KHANOM', 'মরিয়ম', 'মিলন  মোল্যা', 'চম্পা খানম', 'FEMALE', '2010-03-29', '20103534327040253', '0', '0', 'GOPALGANJ', '01321583158', '8B64', 'IMG_2695.png', NULL),
(1305, 8, 'Class Eight', 'B', 18, 'MAHFUJA  KHANAM', '', 'MINA BEGUM', 'মাহফুজা  খানম', 'মুনিমু র হোসেন', 'মিনা বেগম', 'FEMALE', '2009-06-12', '20093534327035488', '0', '0', 'GOPALGANJ', '01758858469', '8B18', 'IMG_20240210_0025.jpg', NULL),
(1306, 7, 'Class Seven', 'A', 33, 'AL SHAHARIA  SIKDER', 'MD BABUL SIKDER', 'SHERIN SULTANA', 'আল শাহরিয়া  সিকদার', 'মোঃ বাবুলবু  সিকদার', 'শিরিন সুলতানা', 'MALE', '2012-12-31', '20122910384104401', '0', '0', 'FARIDPUR', '01921740217', '7A33', 'IMG_2659.png', NULL),
(1307, 8, 'Class Eight', 'B', 2, 'SABIHA AKTER  OISHE', 'MD AFTAB SIKDER', 'SALMA BEGUM', 'সাবিহা আকতার  ঐশী', 'মোঃ আফতাব  শিকদার', 'ছালমা বেগম', 'FEMALE', '2010-12-15', '20103534327039492', '0', '0', 'GOPALGANJ', '01942285382', '8B2', 'IMG_2699.png', NULL),
(1308, 7, 'Class Seven', 'A', 27, 'AL SADI SHEIKH', 'MD RONY  SHEIKH', 'MAHMUDA  BEGUM', 'আল সাদি  শেখ', 'মোঃ রনি  শেখ', 'মাহমুদা মু  বেগম', 'MALE', '2011-03-28', '20112910384105164', '0', '0', 'FARIDPUR', '01996282556', '7A27', 'IMG_2658.png', NULL),
(1309, 8, 'Class Eight', 'B', 70, 'LAKI KHANAM', 'MD ALAMGIR  MOLLA', 'FARIDA PARVIN', 'লাকি খানম', 'মোঃ আলমগীর  মোল্যা', 'ফরিদা পারভীন', 'FEMALE', '2009-10-25', '20093514327030888', '0', '0', 'GOPALGANJ', '01858481049', '8B70', 'IMG_20240210_0046.jpg', NULL),
(1310, 7, 'Class Seven', 'A', 5, 'DURJOY GHOSH', 'SHAMOL CHANDRA  GHOSH', 'BANO RANI GHOSH', 'দূর্জদূর্জয় ঘোষ', 'শ্যামল চন্দ্র  ঘোষ', 'বন রানী  ঘোষ', 'MALE', '2010-03-15', '20102910384101560', '0', '0', 'FARIDPUR', '01723554683', '7A5', 'IMG_2656.png', NULL),
(1311, 8, 'Class Eight', 'B', 129, 'RIYA MONI', 'MD HELAL  MOLLA', 'MST RATNA', 'রিয়া মনি', 'মোঃ হেলাল  মোল্যা', 'মোসাঃ রত্না', 'FEMALE', '2010-01-19', '20103514327031540', '0', '0', 'GOPALGANJ', '01758018275', '8B129', 'IMG_2701.png', NULL),
(1312, 7, 'Class Seven', 'A', 32, 'SUDIPTO BISWAS  JITH', 'SUKUMAR BISWAS', 'JOSNA MALO', 'সুদিপ্ত বিশ্বাস  জিদ', 'সুকুমার বিশ্বাস', 'জোৎস্না মালো', 'MALE', '2009-12-01', '20093514327032381', '0', '0', 'GOPALGANJ', '01789635082', '7A32', 'IMG_2653.png', NULL),
(1313, 8, 'Class Eight', 'B', 25, 'MOHONA AKTER', 'ABDULLAH AL  MAMUN', 'MST MERI  KHANOM', 'মোহনা আক্তার', 'আব্দুল্লাহ আল  মামুনমু', 'মোসাঃ মেরী  খানম', 'FEMALE', '2010-08-05', '20108214730102300', '0', '0', 'RAJBARI', '01716499125', '8B25', 'IMG_2701.png', NULL),
(1314, 8, 'Class Eight', 'B', 144, 'MISS SULTANA', 'MASUD MOLLA', 'MST RUNA  BEGUM', 'মিস সুলতানা', 'মাছুদ মোল্যা', 'মোসাঃ রুনা  বেগম', 'FEMALE', '2008-09-02', '20083514327027908', '0', '0', 'GOPALGANJ', '01753208971', '8B144', 'IMG_2703.png', NULL),
(1315, 7, 'Class Seven', 'B', 6, 'SUMAIYA ISLAM', 'MD SARAFAT  HOSSEN', 'RAHIMA BEGUM', 'সুমাইয়া ইসলাম', 'মোঃ শারাফত  হোসেন', 'রহিমা বেগম', 'FEMALE', '2012-03-12', '20123514327032852', '0', '0', 'GOPALGANJ', '01760274166', '7B6', 'IMG_2642.png', NULL),
(1316, 8, 'Class Eight', 'B', 66, 'ZENIA KHANAM', 'MD PANNU  SHEIKH', 'ALPONA KHANAM', 'জিনিয়া  খানম', 'মোঃ পান্নু  শেখ', 'আলপনা  খানম', 'FEMALE', '2009-10-07', '20093514327030743', '0', '0', 'GOPALGANJ', '01623870057', '8B66', 'IMG_2704.png', NULL),
(1317, 7, 'Class Seven', 'B', 11, 'FARHANA OISHI', 'MD FARUK  AHAMMAD', 'MST SHILPI  BEGUM', 'ফারহানা ঐশি', 'মোঃ ফারুক  আহম্মদ', 'মোছাঃ শিল্পি  বেগম', 'FEMALE', '2010-08-28', '20103514327035074', '0', '0', 'GOPALGANJ', '01724938488', '7B11', 'IMG_2607.png', NULL),
(1318, 8, 'Class Eight', 'B', 26, 'MST SAILA AKTER  SORMILI', 'MD KAYEM SHAIKH', 'MST YASMIN  BEGUM', 'মোসা সায়লা  আক্তার সোরমিলি', 'মোঃ কায়েম শেখ', 'মোসাঃ ইয়াসমিন  বেগম', 'FEMALE', '2010-10-12', '20102910384107027', '0', '0', 'FARIDPUR', '0132843340', '8B26', '26.jpg', NULL),
(1319, 7, 'Class Seven', 'B', 19, 'AFSHANA MIME', 'MD ALAMGIR  HOSSAIN MOLLA', 'MST NADIRA BEGUM', 'আফসানা মিমি', 'মোঃ আলমগীর  হোসেন মোল্যা', 'মোছাঃ নাদিরা  বেগম', 'FEMALE', '2012-06-11', '20123534327042602', '0', '0', 'GOPALGANJ', '01788482254', '7B19', 'IMG_2586.png', NULL),
(1320, 8, 'Class Eight', 'B', 72, 'BRISTY AKTER', 'NANNU SHEIKH', 'SAHINUR BEGUM', 'বৃষ্টিবৃ আক্তার', 'নান্নু শেখ', 'শাহিনুরনু বেগম', 'FEMALE', '2010-11-23', '20103514381033269', '0', '0', 'VILL: SHANKORPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01756152496', '8B72', 'IMG_2706.png', NULL),
(1321, 8, 'Class Eight', 'B', 58, 'TONNI AKTER SULTANA', 'MD. UZZAL MUNSHI', 'PANNA BEGUM', 'তন্নি আক্তার সুলতানা', 'মোঃ উজ্জল মুন্সী মু', 'পান্না বেগম', 'FEMALE', '2009-11-02', '20093514381032795', '0', '0', 'VILL: SHANKARPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01754604498', '8B58', 'IMG_2707.png', NULL),
(1322, 7, 'Class Seven', 'B', 1, 'MST NUPUR  KHANAM', 'MD AFSAR MOLLA', 'MST RENE BEGUM', 'মোছাঃ নুপুর  খানম', 'মোঃ আফছার  মোল্যা', 'মোছাঃ রিনি  বেগম', 'Female', '2009-05-13', '20093514327030805', '0', '0', 'GOPALGANJ', '01773908660', '7B1', 'IMG_2585.png', NULL),
(1323, 7, 'Class Seven', 'B', 40, 'TANZILA KHANAM', 'TAZMUL SHEIKH', 'HOSNEYARA  BEGUM', 'তানজিলা খানম', 'তাজমুলমু শেখ', 'হোসনেয়ারা  বেগম', 'FEMALE', '2011-09-01', '20112910384103749', '0', '0', 'FARIDPUR', '01916448540', '7B40', 'IMG_2583.png', NULL),
(1324, 8, 'Class Eight', 'B', 14, 'AHONA SARKAR', 'ALOK SORKAR', 'UJJALA RANI  SARKAR', 'অহনা সরকার', 'অলোক সরকার', 'উজ্জলা রানী  সরকার', 'FEMALE', '2011-12-25', '20113514327030931', '0', '0', 'GOPALGANJ', '01728313530', '8B14', 'IMG_2708.png', NULL),
(1325, 7, 'Class Seven', 'B', 41, 'SINTHIA KHANAM', 'MD ABU SIDDIK', 'TANIA KHANAM  RIPA', 'সিনথিয়া খানম', 'মোঃ আবু  সিদ্দিক', 'তানিয়া খানম  রিপা', 'FEMALE', '2011-09-07', '20113514327029298', '0', '0', 'GOPALGANJ', '01728084594', '7B41', 'IMG_2582.png', NULL),
(1326, 7, 'Class Seven', 'B', 15, 'SUSAMA BISWAS', 'SANJOY KUMAR  BISWAS', 'SHEULI BISWAS', 'সুষমা বিশ্বাস', 'সঞ্জয় কুমার  বিশ্বাস', 'শিউলী বিশ্বাস', 'FEMALE', '2012-05-01', '20122910384104473', '0', '0', 'FARIDPUR', '01927792819', '7B15', 'IMG_2581.png', NULL),
(1327, 8, 'Class Eight', 'B', 165, 'BORSHA  KHANAM', 'F M JEWEL  FOKIR', 'HASURA  KHANAM', 'বর্ষা খানম', 'এফ এম জুয়েজু ল  ফকির', 'হাসোরা খানম', 'FEMALE', '2011-07-23', '20113514327031628', '0', '0', 'GOPALGANJ', '01708867727', '8B165', 'IMG_2709.png', NULL),
(1328, 7, 'Class Seven', 'A', 28, 'SAIF SHEIKH', 'MD SHAHIDUL  SHEIKH', 'RIKTA KHANOM', 'সাইফ শেখ', 'মোঃ শাহীদুলদু  শেখ', 'রিক্তা খানম', 'MALE', '2011-05-15', '20112910384021347', '0', '0', 'FARIDPUR', '01923754484', '7A28', 'IMG_2580.png', NULL),
(1329, 8, 'Class Eight', 'B', 55, 'HAFSA MONI', 'MD HASANUR  RAHMAN', 'SONIA AKTER', 'হাফসা মনি', 'মো: হাসানুরনু  রহমান', 'সোনিয়া আক্তার', 'FEMALE', '2011-02-06', '20113515844028727', '0', '0', 'GOPALGANJ', '01843617106', '8B55', 'IMG_2710.png', NULL),
(1330, 8, 'Class Eight', 'B', 15, 'HUMAYRA BINTI', 'MD EMDADUL  HAQUE', 'MAHMUDA  KHANAM', 'হুমায়রা বিন্তি', 'মোঃ ইমদাদুলদু  হক', 'মাহমুদা মু খানম', 'FEMALE', '2011-05-26', '20113514327030839', '0', '0', 'GOPALGANJ', '01876572584', '8B15', 'IMG_2711.png', NULL),
(1331, 7, 'Class Seven', 'B', 3, 'ELMA KHANAM', 'MD IMRAN  BISWAS', 'MST CHINA', 'ইলমা খানম', 'মোঃ ইমরান  বিশ্বাস', 'মোসাঃ চায়না', 'FEMALE', '2010-10-05', '20103514327028318', '0', '0', 'GOPALGANJ', '01997216548', '7B3', 'IMG_2579.png', NULL),
(1332, 8, 'Class Eight', 'B', 65, 'JANNATI', 'ENAMUL HAQUE  TALUKDAR', 'SATHI BEGUM', 'জান্নাতি', 'ই', 'সাথী বেগম', 'FEMALE', '2011-03-28', '20113514327031421', '0', '0', 'GOPALGANJ', '01777514593', '8B65', 'IMG_2713.png', NULL),
(1333, 7, 'Class Seven', 'B', 10, 'FARJANA AKTER  EMA', 'ERAZ SHEIKH', 'HIRA BEGUM', 'ফারজানা  আক্তার ইমা', 'ইরাজ শেখ', 'হিরা বেগম', 'FEMALE', '2011-06-06', '20112910384103460', '0', '0', 'FARIDPUR', '01936319065', '7B10', 'IMG_2577.png', NULL),
(1334, 8, 'Class Eight', 'B', 146, 'Lamia Akter Shova', 'Md, Jahangir Shekh', 'Mst. Champa Begum', 'মোসাঃ লামিয়া  আক্তার শোভা', 'মোঃ জাহাঙ্গীর শেখ', 'মোসাঃ চম্পা বেগম', 'FEMALE', '2011-03-09', '20113514313032542', '0', '0', 'vill: Fukraz, post: Tarail.kashiani, goapalganj', '01739431952', '8B146', 'IMG_2714.png', NULL),
(1335, 8, 'Class Eight', 'B', 116, 'RABIDA', 'SHEIKH  RAFIQUL', 'EITE BEGUM', 'রাবিদা', 'শেখ  রফিকুল', 'ইতি বেগম', 'FEMALE', '2011-01-02', '20113529104102326', '0', '0', 'GOPALGANJ', '01965965402', '8B116', 'IMG_2716.png', NULL),
(1336, 8, 'Class Eight', 'B', 53, 'ERINA JAHAN MIM', 'MD YUSUF ALI  SARDER', 'MST SHIRINA  BEGUM', 'ইরিনা জাহান মিম', 'মোঃ ইউসুফ আলী  সর্দা র', 'মোছাঃ শিরিনা  বেগম', 'FEMALE', '2011-01-25', '20113534327041850', '0', '0', 'GOPALGANJ', '01761882267', '8B53', 'IMG_2717.png', NULL),
(1337, 7, 'Class Seven', 'B', 46, 'TABASSUM  ISLAM', 'TOYABUR  RAHMAN', 'SHAHINA  KHATUN', 'তাবাসসুম  ইসলাম', 'তৈয়াবুরবু  রহমান', 'শাহিনা খাতুন', 'FEMALE', '2012-10-27', '20123514327031194', '0', '0', 'GOPALGANJ', '01721728401', '7B46', 'IMG_2575.png', NULL),
(1338, 8, 'Class Eight', 'B', 107, 'KONIKA', 'ANIS MOLLA', 'RUMI BEGUM', 'কনিকা', 'আনিচ  মোল্লা', 'রুমি বেগম', 'FEMALE', '2008-10-24', '20083534327040646', '0', '0', 'GOPALGANJ', '01910401180', '8B107', 'IMG_20240210_0031.jpg', NULL),
(1339, 7, 'Class Seven', 'B', 42, 'NUSAIBA MOLLA MAGH', 'TITUL MOLLA', 'MST. RABEYA BEGUM', 'নুছা নু ইবা মোল্লা মেঘ', 'মোঃ টিটুল মোল্লা', 'রাবেয়া বেগম', 'FEMALE', '2012-02-01', '20126822509116316', '0', '0', 'BUDHPASHA', '01793415667', '7B42', 'IMG_2574.png', NULL),
(1340, 8, 'Class Eight', 'B', 106, 'CHOYTI RANI BISWAS', 'DEAD KARISNO  CHANDRO BISWAS', 'SUNETA RANI BISWAS', 'চৈতি রাণী  বিশ্বাস', 'মৃতমৃ কৃষ্ণচন্দ্র  বিশ্বাস', 'সুনীতা রানী  বিশ্বাস', 'FEMALE', '2008-10-28', '20083514327030461', '0', '0', 'GOPALGANJ', '01747607383', '8B106', 'IMG_2720.png', NULL),
(1341, 7, 'Class Seven', 'B', 9, 'MST NAHIDA  KHANOM', 'MOFEZUR SHEIKH', 'SHAHANA BEGUM', 'মোছাঃ নাহিদা  খানম', 'মফিজুরজু শেখ', 'শাহানা বেগম', 'Female', '2012-01-01', '20122910384104266', '0', '0', 'FARIDPUR', '01967734225', '7B9', 'IMG_2573.png', NULL),
(1342, 8, 'Class Eight', 'B', 24, 'SAUDA ISLAM  ANHA', 'MD KAMRUL  ISLAM', 'KALPANA BEGUM', 'সাউদা ইসলাম  আনহা', 'মোঃ কামরুল  মোল্লা', 'কল্পনা বেগম', 'FEMALE', '2011-03-07', '20113514327031294', '0', '0', 'GOPALGANJ', '01842964208', '8B24', 'IMG_2721.png', NULL),
(1343, 7, 'Class Seven', 'A', 43, 'MD ARIF MOLLA', 'MD POLASH MOLLA', 'MIS. KHADIZA  KHANAM', 'মো: আরিফ  মোল্যা', 'মো: পলাশ  মোল্যা', 'মিস. খাদিজা  খানম', 'MALE', '2012-03-17', '20126515263010828', '0', '0', 'NARAIL', '0', '7A43', 'IMG_2572.png', NULL),
(1344, 8, 'Class Eight', 'B', 86, 'PUJA MALAKAR', 'PORITOSH KUMAR  MALAKAR', 'BANDANA RANI  MALAKAR', 'পূজা মালাকার', 'পরিতোষ কুমার  মালাকার', 'বন্দনা রানী  মালাকার', 'FEMALE', '2011-01-25', '20113514381038366', '0', '0', 'GOPALGANJ', '01719891598', '8B86', 'IMG_2722.png', NULL),
(1345, 7, 'Class Seven', 'B', 21, 'ALO SHIKDER', 'UTTAM  SHIKDER', 'MITA BISWAS', 'আলো  শিকদার', 'উত্তম  শিকদার', 'মিতা বিশ্বাস', 'FEMALE', '2012-01-29', '20123534327042831', '0', '0', 'GOPALGANJ', '01910812907', '7B21', 'IMG_2571.png', NULL),
(1346, 8, 'Class Eight', 'B', 56, 'ZINIA KHANOM', 'MOHAMMD MURAD  MOLLA', 'ZAHANARA BEGUM', 'জিনিয়া খানম', 'মোহাম্মদ মুরা মু দ মোল্যা', 'জাহানারা বেগম', 'FEMALE', '2011-04-04', '20112910384103417', '0', '0', 'VILL: KRISHNOPUR,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '01947732038', '8B56', 'IMG_2723.png', NULL),
(1347, 7, 'Class Seven', 'B', 36, 'SAYANTIKA BISWAS', 'NEPAL CHANDRA  BISWAS', 'BITHI RANI BISWAS', 'সয়ন্তিকা  বিশ্বাস', 'নেপাল চন্দ্র  বিশ্বাস', 'বিথী রানী  বিশ্বাস', 'FEMALE', '2010-09-03', '20103514327031821', '0', '0', 'GOPALGANJ', '01935601725', '7B36', 'IMG_2570.png', NULL),
(1348, 7, 'Class Seven', 'B', 7, 'RIMA AKTAR', 'MD BEPLOB  MUNSHI', 'MST PARVIN  BEGUM', 'রিমা আক্তার', 'মোঃ বিপ্লব মুন্সী মু', 'মোসাঃ পারভীন  বেগম', 'FEMALE', '2011-07-31', '20113514381034427', '0', '0', 'GOPALGANJ', '01758865492', '7B7', 'IMG_2569.png', NULL),
(1349, 8, 'Class Eight', 'B', 69, 'MST HAJERA  KHANAM', 'ABUL BASHAR  MOLLIK', 'SHRIFA BEGUM', 'মোছাঃ হাজেরা  খানম', 'আবুলবু বাশার  মল্লিক', 'শরিফা বেগম', 'FEMALE', '2010-03-13', '20102910384101383', '0', '0', 'FARIDPUR', '01946418429', '8B69', 'IMG_2718.png', NULL),
(1350, 7, 'Class Seven', 'B', 50, 'HUMAIRA KHANAM', 'BAHU SHEIKH', 'ANNA BEGUM', 'হুমায়রা খানম', 'বাহু শেখ', 'আন্না বেগম', 'FEMALE', '2012-03-12', '20123514381033664', '0', '0', 'VILL: SHANKORPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01954767282', '7B50', 'IMG_2567.png', NULL),
(1351, 8, 'Class Eight', 'B', 122, 'ISRAN JAHAN  SAIMA', 'LATE DAUD  HOSSAIN', 'MST ZIBU BEGUM', 'ইছরান জাহান  সায়মা', 'মৃতঃ মৃ দাউদ  হোসেন', 'মোছাঃ জিবু  বেগম', 'FEMALE', '2011-03-17', '20113514327028959', '0', '0', 'GOPALGANJ', '01757764459', '8B122', 'IMG_2752.png', NULL),
(1352, 7, 'Class Seven', 'B', 31, 'SABIHA RAHMAN', 'MD ABDUL  SALAM', 'HASINA BEGUM', 'ছবিহা রহমান', 'মোঃ আঃ  সালাম', 'হাচিনা বেগম', 'FEMALE', '2012-03-09', '20123514327031354', '0', '0', 'GOPALGANJ', '01781384775', '7B31', 'IMG_2566.png', NULL),
(1353, 8, 'Class Eight', 'B', 57, 'MST: SONALI  KHANOM', 'MD SAHOR ALI', 'JHARNA BEGUM', 'মোসা: সোনালী  খানম', 'মোঃ শহর আলী', 'ঝর্না বেগম', 'FEMALE', '2010-01-01', '20106515263009216', '0', '0', 'NARAIL', '01960414134', '8B57', 'IMG_2754.png', NULL),
(1354, 7, 'Class Seven', 'A', 45, 'MD MOLLA SALMAN', 'MD SHARIFUL ISLAM  MILON', 'SHIRINA KHANAM', 'মোঃ মোল্যা  সালমান', 'মোঃ শরিফুল  ইসলাম মিলন', 'শিরিনা খানম', 'MALE', '2013-02-28', '20133514327032677', '0', '0', 'GOPALGANJ', '01610899237', '7A45', 'IMG_2565.png', NULL),
(1355, 8, 'Class Eight', 'B', 41, 'ANIKA AKTER  JUI', 'ALAM SHEIKH', 'MST SONIA', 'আনিকা আক্তার  জুঁইজুঁ', 'আলম শেখ', 'মোছাঃ সোনিয়া', 'FEMALE', '2011-04-11', '20113514327028863', '0', '0', 'GOPALGANJ', '01911475997', '8B41', 'IMG_2836.png', NULL),
(1356, 7, 'Class Seven', 'A', 8, 'MD. HAMIM MOLLA', 'MD. BIPLOB  MOLLA', 'MST TOHMINA  BEGUM', 'মো: হামিম  মোল্যা', 'মো: বিপ্লব  মোল্যা', 'মোসাঃ তহমিনা  বেগম', 'MALE', '2011-06-15', '20116515263010271', '0', '0', 'NARAIL', '01926144702', '7A8', 'IMG_2562.png', NULL),
(1357, 8, 'Class Eight', 'A', 98, 'DURJAY BISWAS', 'RAJU KUMAR  BISWAS', 'GITA RANI BISWAS', 'দুর্জদুর্জয় বিশ্বাস', 'রাজু কুমার  বিশ্বাস', 'গীতা রানী  বিশ্বাস', 'MALE', '2010-10-02', '20103514327030852', '0', '0', 'GOPALGANJ', '01753315990', '8A98', 'IMG_2731.png', NULL),
(1358, 8, 'Class Eight', 'A', 81, 'SAMIUL', 'MD ALI MIA  SHEIKH', 'MST ARJAN  BEGUM', 'সামিউল', 'মোঃ আলী মিয়া  শেখ', 'মোছাঃ আরজান  বেগম', 'MALE', '2011-01-01', '20113514327031697', '0', '0', 'GOPALGANJ', '01771438841', '8A81', 'IMG_2729.png', NULL),
(1359, 8, 'Class Eight', 'A', 160, 'JIHAD MOLLIQ', 'MD HEMAYET  MOLLIQ', 'MST JONY BEGUM', 'জিহাদ মল্লিক', 'মোঃ হেমায়েত  মল্লিক', 'মোছাঃ জনি  বেগম', 'MALE', '2010-12-24', '20103514327031010', '0', '0', 'GOPALGANJ', '01749617226', '8A160', 'IMG_2728.png', NULL),
(1360, 8, 'Class Eight', 'A', 91, 'SAJJAD SHEIKH', 'AKKAS SHEIKH', 'LOVELY BEGUM', 'সাজ্জাদ শেখ', 'আক্কাছ শেখ', 'লাভলী বেগম', 'MALE', '2011-01-10', '20123514381032950', '0', '0', 'VILL: PARKORFA, POST.  CHARVATPARA P.S.  KASIANI, DIST.  GOPALGANJ', '01735165737', '8A91', 'IMG_2838.png', NULL),
(1361, 8, 'Class Eight', 'A', 13, 'S.M ROHAN', 'S.M SIPON', 'RESMA KHANAM', 'এস,এম রোহান', 'এস,এম সিপন', 'রেশমা খানম', 'MALE', '2010-12-07', '20103514381033135', '0', '0', 'VILL: DHANKORA, POST.  PATHORGHATA P.S.  KASIANI, DIST.  GOPALGANJ', '0718747369', '8A13', 'IMG_2727.png', NULL),
(1362, 7, 'Class Seven', 'A', 111, 'MD SULTAN AHAMED  MUSOLLI', 'MD EQBAL MUSOLLI', 'MST CHAMPA BEGUM', 'মোঃ সুলতান  আহম্মদ মুসমুল্লি', 'মোঃ ইকবাল  মুসমুল্লি', 'মোসাঃ চম্পা  বেগম', 'MALE', '2012-01-01', '20123514327030572', '0', '0', 'GOPALGANJ', '01790028425', '7A111', 'IMG_2587.png', NULL),
(1363, 7, 'Class Seven', 'A', 119, 'ANIK BISWAS', 'ACHINTA KUMAR  BISWAS', 'LAXMI BISWAS', 'অনিক বিশ্বাস', 'অচিন্ত কুমার  বিশ্বাস', 'লক্ষ্নী বিশ্বাস', 'MALE', '2012-01-15', '20123514327030220', '0', '0', 'GOPALGANJ', '01721146875', '7A119', 'IMG_2588.png', NULL),
(1364, 7, 'Class Seven', 'A', 140, 'MD. RATUL ISLAM RAFID', 'MD. KAMRUL ISLAM', 'MST. SARMIN SULTANA', 'মোঃ রাতুল ইসলাম  রাফিদ', 'মোঃ কামরুল ইসলাম', 'মিসেস: শারমিন  সুলতানা', 'MALE', '2013-01-01', '20133514381033073', '0', '0', 'VILL: SHANKORPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01758040615', '7A140', 'IMG_2589.png', NULL),
(1365, 7, 'Class Seven', 'A', 123, 'IMDADUL  MOLLA', 'EKRAM MOLLA', 'JAHEDA BEGUM', 'ইমদাদুলদু  মোল্লা', 'ইকরাম মোল্লা', 'জাহেদা বেগম', 'MALE', '2010-04-02', '20100115638101847', '0', '0', 'BAGERHAT', '01757441273', '7A123', 'IMG_2590.png', NULL),
(1366, 7, 'Class Seven', 'B', 109, 'TABASSUM  ISLAM', 'MD TUHAN  SHEIKH', 'ROXSANA  PARVIN', 'তাবাসসুম  ইসলাম', 'মোঃ তুহিন শেখ', 'রোকসানা  পারভীন', 'FEMALE', '2012-03-21', '20123534327043016', '0', '0', 'GOPALGANJ', '01718611951', '7B109', 'IMG_2591.png', NULL),
(1367, 7, 'Class Seven', 'B', 131, 'HAPPY KHANOM', 'MD PANNU MUNSHI', 'NASIMA KHANAM', 'হ্যাপি খানম', 'মোঃ পান্নু মুন্সী মু', 'নাসিমা খানম', 'FEMALE', '2011-01-07', '20116515218102998', '0', '0', 'VILL: ITNA, P,O, ITNA  P,S. LOHAGARA,  DISTRICT: NARAIL', '01760086631', '7B131', 'IMG_2592.png', NULL),
(1368, 7, 'Class Seven', 'B', 122, 'MARIAM KHATUN', 'MD MIRAZ MOLLA', 'MST SAHANARA  BEGUM', 'মরিয়াম খাতুন', 'মোঃ মিরাজ  মোল্লা', 'মোছাঃ শাহানারা  বেগম', 'FEMALE', '2012-01-03', '20123514327033115', '0', '0', 'GOPALGANJ', '01719448338', '7B122', 'IMG_2593.png', NULL),
(1369, 7, 'Class Seven', 'B', 108, 'PRANTI BISWAS', 'BERAJ BISWAS', 'SAGORI  BISWAS', 'প্রান্তী বিশ্বাস', 'বিরাজ  বিশ্বাস', 'সাগরী  বিশ্বাস', 'FEMALE', '2012-01-10', '20123514327030249', '0', '0', 'GOPALGANJ', '01935602046', '7B108', 'IMG_2594.png', NULL),
(1370, 7, 'Class Seven', 'B', 121, 'ONAMIKA  KHANAM', 'AL MAMUN  BISWAS', 'RUPA BEGUM', 'অনামিকা  খানম', 'আল মামুনমু  বিশ্বাস', 'রুপা বেগম', 'FEMALE', '2010-12-11', '20103514327031993', '0', '0', 'GOPALGANJ', '01853637243', '7B121', 'IMG_2595.png', NULL),
(1371, 7, 'Class Seven', 'B', 120, 'SAIMA KHANAM', 'MD SAHEB ALI', 'MST AKHI  BEGUM', 'সায়মা খানম', 'মোঃসাহেব আলী', 'মোছাঃ আখি  বেগম', 'FEMALE', '2012-09-12', '20123514327033151', '0', '0', 'GOPALGANJ', '01919824907', '7B120', 'IMG_2597.png', NULL),
(1372, 7, 'Class Seven', 'B', 102, 'ONNESHA BISWAS  MEGHA', 'GOBINDO CHANDRO  BISWAS', 'RADHA RANI SARKAR', 'অন্বেষা বিশ্বাস  মেঘা', 'গোবিন্দ চন্দ্র  বিশ্বাস', 'রাধা রানী  সরকার', 'FEMALE', '2012-04-12', '20123514327031335', '0', '0', 'GOPALGANJ', '01931555065', '7B102', 'IMG_2598.png', NULL),
(1373, 7, 'Class Seven', 'B', 115, 'JAMIA', 'MD JASIM  BISWAS', 'KHALEDA  KHATUN', 'জামিয়া', 'মোঃ জসীম  বিশ্বাস', 'খালেদা খাতুন', 'FEMALE', '2010-11-13', '20103534327044517', '0', '0', 'GOPALGANJ', '01953135159', '7B115', 'IMG_2599.png', NULL),
(1374, 7, 'Class Seven', 'B', 135, 'LAMIA ISLAM  TAJ', 'MD SOHEL  RANA', 'LIMA KHANOM', 'লামিয়া ইসলাম  তাজ', 'মোঃ সোহেল  রানা', 'লিমা খানম', 'FEMALE', '2013-04-10', '20133514327032998', '0', '0', 'GOPALGANJ', '01700661812', '7B135', 'IMG_2600.png', NULL),
(1375, 7, 'Class Seven', 'B', 104, 'ESHRAT JAHAN  ESHITA', 'MD MOFIJUR  RAHMAN', 'KHALEDA JAHAN  TINU', 'ইশরাত জাহান  ইশিতা', 'মোঃ মফিজুরজু  রহমান', 'খালেদা জাহান  তিনু', 'FEMALE', '2013-10-27', '20133514327035063', '0', '0', 'GOPALGANJ', '01716220692', '7B104', 'IMG_2602.png', NULL),
(1376, 7, 'Class Seven', 'B', 138, 'LAMIA KHANAM', 'MD: ALAMIN  MOLLAH', 'MST: KHADIZA  BEGUM', 'লামিয়া খানম', 'মো: আলামিন  মোল্লা', 'মোসা: খাদিজা  বেগম', 'FEMALE', '2009-10-20', '20096515263009161', '0', '0', 'NARAIL', '01981099496', '7B138', 'IMG_2603.png', NULL),
(1377, 7, 'Class Seven', 'A', 128, 'FARDIN', 'AJIM', 'FORIDA', 'সিয়াম ফারদিন শরীফ', 'মোঃ আজীম শরীফ', 'ফরিদা', 'MALE', '2012-12-26', '20123514327034978', '0', '0', 'B', '01961572571', '7A128', 'IMG_2606.png', NULL),
(1378, 7, 'Class Seven', 'B', 134, 'SULTANA KHANAM', 'MD MIRAZ ALI  SARDER', 'SOVA BEGUM', 'সুলতানা খানম', 'মোঃ মিরাজ আলী  সরদার', 'সোভা বেগম', 'FEMALE', '2009-11-01', '20093514327032536', '0', '0', 'GOPALGANJ', '01301379412', '7B134', 'IMG_2618.png', NULL),
(1379, 7, 'Class Seven', 'B', 152, 'SHEMONTINI  BHOWMICK', 'SHIDHARTHA  BHOWMICK', 'PAPIA DATTA', 'সিমন্তীনি  ভৌমিক', 'সিদ্ধার্থ  ভৌমিক', 'পাপিয়া দত্ত', 'Male', '2012-08-09', '20123534327043124', '0', '0', 'GOPALGANJ', '01716822321', '7B152', 'IMG_2624.png', NULL),
(1380, 7, 'Class Seven', 'B', 150, 'TANHA', 'MD KAMRUL  SHEK', 'TANIA', 'তানহা', 'মোঃ কামরুল  শেখ', 'তানিয়া', 'FEMALE', '2011-10-26', '20113514327031679', '0', '0', 'GOPALGANJ', '01304563410', '7B150', 'IMG_2645.png', NULL),
(1381, 7, 'Class Seven', 'B', 117, 'SADIA ISLAM  SINTHIA', 'MD SIRAJUL  ISLAM', 'NAZMA KHANAM', 'সাদিয়া ইসলাম  সিনথিয়া', 'মো সিরাজুলজু  ইসলাম', 'নাজমা খানম', 'FEMALE', '2012-07-01', '20126515263009706', '0', '0', 'NARAIL', '01736378530', '7B117', 'IMG_2760.png', NULL),
(1382, 7, 'Class Seven', 'B', 149, 'MST DIPA  KHANAM', 'MD DIPU SHEIKH', 'PARVIN BEGUM', 'মোসাঃ দিপা  খানম', 'মোঃ দিপু শেখ', 'পারভীন বেগম', 'FEMALE', '2011-03-16', '20113514327033843', '0', '0', 'GOPALGANJ', '01743111870', '7B149', 'IMG_2758.png', NULL),
(1383, 7, 'Class Seven', 'B', 141, 'SHAHARA KAZI', 'MD AKKACH  KAZI', 'ASMA BEGUM', 'শাহারা কাজী', 'মোঃ আক্কাচ  কাজী', 'আসমা বেগম', 'FEMALE', '2013-10-23', '20133534327043368', '0', '0', 'GOPALGANJ', '01748444079', '7B141', 'IMG_2756.png', NULL),
(1384, 7, 'Class Seven', 'B', 124, 'MORIOM KHANOM', 'AFJAL MRIDHA', 'ADORI KHANOM', 'মরিয়ম খানম', 'আফজাল মৃধা মৃ', 'আদরী খানম', 'FEMALE', '2011-12-31', '20113514327031624', '0', '0', 'VILL: BORASHUR,POST:  VATIAPARA P.S:  KASHIANI,DIST:  GOPALGANJ', '01949578703', '7B124', 'IMG_2660.png', NULL),
(1385, 10, 'Class Ten', 'Arts', 28, 'JOTY SHIKARI', 'GOLOK SHIKARI', 'SHILPI  MALAKAR', 'জ্যোতি  শিকারী', 'গোলক  শিকারী', 'শিল্পী  মালাকার', 'FEMALE', '2009-12-31', '20093514381038726', '0', '0', 'GOPALGANJ', '01771660071', '10Arts28', 'IMG_2559.png', NULL),
(1386, 10, 'Class Ten', 'Arts', 49, 'MD ROIS  SHEIKH', 'MD MIRAZ  SHEAK', 'MONIRA BEGUM', 'মোঃ রইজ শেখ', 'মোঃ মিরাজ  শেখ', 'মনিরা বেগম', 'MALE', '2009-02-06', '20092910384108072', '0', '0', 'FARIDPUR', '01992891398', '10Arts49', 'IMG_2551.png', NULL),
(1387, 10, 'Class Ten', 'Arts', 55, 'MD.SIPON SHEIKH', 'MD.ROBIUL SHEIKH', 'LIMA BEGUM', 'মো: সিপন শেখ', 'মো: রবিউল শেখ', 'লিমা বেগম', 'MALE', '2008-12-04', '20082910342102461', '0', '0', 'KAMARGRAM,2 NO  GOPALPUR UNION  PARISHAD  ALFADANGA,FARIDPUR', '01995404256', '10Arts55', 'IMG_2550.png', NULL),
(1388, 10, 'Class Ten', 'Arts', 9, 'LAMIYA ZAMAN AMI', 'ARIFUZZAMAN APU', 'POLI BEGUM', 'লামিয়া জামান অমি', 'আরিফুজ্জামান অপু', 'পলি বেগম', 'FEMALE', '2010-06-01', '20103514354021597', '0', '0', 'VILL: TILCHARA, PO:  TILCHARA, PS:  KASHIANI, DIST:  GOPALGANJ,', '01910412881', '10Arts9', 'IMG_2542.png', NULL),
(1389, 10, 'Class Ten', 'Arts', 3, 'MST SAMIYA ISLAM', 'MD SHAMIM KHAN', 'MST SHERENA  BEGUM', 'মোছাঃ ছামিয়া  ইসলাম', 'মোঃ শামীম খান', 'মোছাঃ শিরিনা  বেগম', 'Female', '2008-11-23', '20083534327036672', '0', '0', 'GOPALGANJ', '01742258590', '10Arts3', 'IMG_2541.png', NULL),
(1390, 10, 'Class Ten', 'Arts', 34, 'MST MASURA  KHANAM', 'MD LITU MOLLA', 'MST ASMA BEGUM', 'মোসাঃ মাছুরা  খানম', 'মোঃ লিটু মোল্যা', 'মোছাঃ আছমা  বেগম', 'FEMALE', '2007-05-05', '20073534327008761', '0', '0', 'GOPALGANJ', '01793622769', '10Arts34', 'IMG_2539.png', NULL),
(1391, 10, 'Class Ten', 'Arts', 36, 'MD IMRAN  SHEIKH', 'MD EMAMUL  SHEK', 'MST POLY  BEGUM', 'মোঃ ইমরান  শেখ', 'মোঃ ইমামুলমু  শেখ', 'মোসাঃ পলি  বেগম', 'MALE', '2008-02-19', '20082910384103426', '0', '0', 'FARIDPUR', '01790012554', '10Arts36', 'IMG_2535.png', NULL),
(1392, 10, 'Class Ten', 'Arts', 42, 'MD RAYHAN  SHEIKH', 'RASHEL SHEAIK', 'KHADIJA BEGUM', 'মোঃ রায়হান  শেখ', 'রাসেল শেখ', 'খাদিজা বেগম', 'MALE', '2009-03-09', '20092910384103531', '0', '0', 'FARIDPUR', '01952250175', '10Arts42', 'IMG_2534.png', NULL),
(1393, 10, 'Class Ten', 'Arts', 38, 'MD SHAWON  SHEIKH', 'MD SAYFUL  SHEIKH', 'MST SHAMPA  BEGUM', 'মোঃ শাওন শেখ', 'মোঃ সাইফুল  শেখ', 'মোছাঃ সম্পা  বেগম', 'MALE', '2009-04-26', '20093514327031406', '0', '0', 'GOPALGANJ', '01715269645', '10Arts38', 'IMG_2531.png', NULL),
(1394, 10, 'Class Ten', 'Arts', 67, 'MD. HABIB MIR', 'EQBOL ALI MIR', 'RUNA BEGUM', 'মোঃ হাবিব মীর', 'ইকবল আলী  মীর', 'রুনা বেগম', 'MALE', '2008-09-30', '20086515263010097', '0', '0', 'CHARBOGJURI', '01305869149', '10Arts67', 'IMG_2529.png', NULL),
(1395, 10, 'Class Ten', 'Arts', 77, 'MD MAINUDDIN  SARDAR', 'MD MOSHARAF  HOSSAIN', 'PARVIN BEGUM', 'মোঃমাঈনুদ্দিনু ন  সরদার', 'মোঃ মোশারফ  সরদার', 'পারভীন বেগম', 'MALE', '2009-05-10', '20093534327036068', '0', '0', 'GOPALGANJ', '01953896879', '10Arts77', 'IMG_2524.png', NULL),
(1396, 10, 'Class Ten', 'Commerce', 6, 'OTHOI ISLAM', 'MD. AYUB SHEIKH', 'HASINA BEGUM', 'অথৈ ইসলাম', 'মোঃ আয়ুব শেখ', 'হাছিনা বেগম', 'FEMALE', '2009-07-16', '20092910384106118', '0', '0', 'VILL: TAGARBANDA,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, P.O:  KASHIANI,', '017725719668', '10Commerce6', 'IMG_2549.png', NULL),
(1397, 10, 'Class Ten', 'Commerce', 9, 'JHUMUR KHANAM', 'MD RAHAMAN  SHEIKH', 'RUPALI BEGUM', 'ঝুমুরমু খানম', 'মোঃ রহমান  শেখ', 'রুপালী বেগম', 'FEMALE', '2009-07-13', '20093514327030832', '0', '0', 'GOPALGANJ', '0192338948', '10Commerce9', 'IMG_2546.png', NULL),
(1398, 10, 'Class Ten', 'Commerce', 11, 'SANJIDA KHANOM JUI', 'MD ZIA SHEIKH', 'DILA BEGUM', 'সানজিদা খানম জুঁইজুঁ', 'মোঃ জিয়া শেখ', 'দিলা বেগম', 'Male', '2008-06-10', '20082910384103443', '0', '0', 'VILL: KRISHNOPUR,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '01924597407', '10Commerce11', 'IMG_2544.png', NULL),
(1399, 10, 'Class Ten', 'Commerce', 19, 'JANNATI KHANAM', 'MELON SHEIKH', 'MST NARGIS  BEGUM', 'জান্নাতি খানম', 'মিলন শেখ', 'মোছাঃ নারগিছ  বেগম', 'FEMALE', '2009-01-10', '20092910384103436', '0', '0', 'FARIDPUR', '0183538735', '10Commerce19', 'IMG_2543.png', NULL),
(1400, 10, 'Class Ten', 'Commerce', 5, 'SANGEETA  BISWAS', 'GOPAL BISWAS', 'SUJATA BISWAS', 'সঙ্গীতা  বিশ্বাস', 'গোপাল  বিশ্বাস', 'সুজাতা  বিশ্বাস', 'FEMALE', '2008-10-13', '20083534200715813', '0', '0', 'GOPALGANJ', '0176231162', '10Commerce5', 'IMG_2540.png', NULL),
(1401, 10, 'Class Ten', 'Commerce', 20, 'SUMAYA KHANAM', 'SARDAR ANICHUR  RAHMAN', 'TANIA BEGUM', 'সুমাইয়া খানম', 'সরদার আনিচুর  রহমান', 'তানিয়া বেগম', 'FEMALE', '2009-03-27', '20096515271021830', '0', '0', 'VILLAGE: KARFA, POST:  MOLLIKPUR, UPAZILA:  LOHAGARA, DISTRICT:  NARAIL.', '01759522357', '10Commerce20', 'IMG_2538.png', NULL),
(1402, 10, 'Class Ten', 'Commerce', 3, 'NUR HASAN  RIME', 'MASUD BISWAS', 'BITHE BEGUM', 'নূরনূ হাসান  রিমি', 'মাসুদ বিশ্বাস', 'বিথী বেগম', 'Male', '2009-02-15', '20093534327039722', '0', '0', 'GOPALGANJ', '01300092887', '10Commerce3', 'IMG_2536.png', NULL),
(1403, 10, 'Class Ten', 'Commerce', 2, 'SUJOY BISWAS', 'SHUJAL BISWAS', 'SHANDHA RANI  BISWAS', 'সুজয় বিশ্বাস', 'সুজল বিশ্বাস', 'সন্ধা রাণী  বিশ্বাস', 'Male', '2007-12-15', '20073534327039454', '0', '0', 'GOPALGANJ', '01950583144', '10Commerce2', 'IMG_2532.png', NULL),
(1404, 10, 'Class Ten', 'Commerce', 25, 'MOLLA MD ABIR  HOSSAIN NIROB', 'MD SAGOR AHAMAD  (NOBAB)', 'MST ARJINA BEGUM', 'মোল্যা মোঃ আবির  হোসেন নিরব', 'মোঃ সাগর আহমেদ  (নবাব)', 'মোছাঃ আরজিনা  বেগম', 'MALE', '2009-07-24', '20093514327028562', '0', '0', 'GOPALGANJ', '01747315223', '10Commerce25', 'IMG_2527.png', NULL),
(1405, 10, 'Class Ten', 'Science', 2, 'MD REZOWAN  ISLAM TAJ', 'MD BILLAL HOSSEN', 'ETUIA BEGUM', 'মোঃ রেজোয়ান  ইসলাম তাজ', 'মোঃ বিল্লাল হোসেন', 'ইতিয়া বেগম', 'Male', '2008-11-01', '20082910384110379', '0', '0', 'FARIDPUR', '01721932044', '10Science2', '102.jpg', NULL),
(1406, 10, 'Class Ten', 'Science', 4, 'S.M. RAFIUL ISLAM  ZITU', 'S.MD. RABIUL  ISLAM', 'NASRIN KHANAM', 'এস,এম, রাফিউল  ইসলাম জিতু', 'এস,এমডি, রবিউল  ইসলাম', 'নাছরিন খানম', 'Male', '2008-08-26', '20083534327036708', '0', '0', 'GOPALGANJ', '01715761955', '10Science4', '7.jpg', NULL),
(1407, 10, 'Class Ten', 'Commerce', 14, 'SHEIKH MOJAFFAR  RAHMAN', 'MD ZAHEDUR  RAHMAN', 'MST DOLENA PARVIN', 'শেখ মোজাফ্ফার  রহমান', 'মোঃ জাহিদুরদু  রহমান', 'মোছাঃ দোলেনা  পারভিন', 'Male', '2009-02-23', '20093514327028554', '0', '0', 'GOPALGANJ', '01748942897', '10Commerce14', 'IMG_2526.png', NULL),
(1408, 10, 'Class Ten', 'Science', 8, 'KAZI MD NUREDUL  ISLAM TONNMOY', 'MD KAZI TOHIDUL  ISLAM', 'FARZANA YESMIN  TANNI', 'কাজী মোঃ নুরী নু দুলদু  ইসলাম তম্ময়', 'মোঃ কাজী তহিদুলদু  ইসলাম', 'ফারজানা  ইয়াসমিন তন্নী', 'Male', '2008-11-15', '20083514381026339', '0', '0', 'GOPALGANJ', '01731936764', '10Science8', 'IMG_2525.png', NULL),
(1409, 9, 'Class Nine', 'B', 17, 'MAHINA AKTER  JUBIDA', 'HASAN FAKIR', 'MST RATNA BEGUM', 'মাহিনা আক্তার  জুবা জু ইদা', 'হাসান ফকির', 'মোসাঃ রত্না বেগম', 'FEMALE', '2010-02-19', '20103514327034964', '0', '0', 'GOPALGANJ', '0192073878', '9B17', 'IMG_2655.png', NULL);
INSERT INTO `student` (`id`, `classnumber`, `classname`, `secgroup`, `roll`, `name`, `fname`, `mname`, `nameb`, `fnameb`, `mnameb`, `sex`, `dob`, `birthid`, `fnid`, `mnid`, `address`, `mobile`, `uniqid`, `imgname`, `brisqr`) VALUES
(1410, 9, 'Class Nine', 'B', 28, 'MUBINA BINTE SARMIN', 'MRIDHA MOHAMMAD  ABUL HASAN', 'LUTFUN NESSA', 'মুবিনা বিনতে  শারমীন', 'মৃধা মৃ মোহাম্মাদ আবুল  হাসান', 'লুৎফুন্নেছা', 'FEMALE', '2010-07-13', '20103514381033180', '0', '0', 'GOPALGANJ', '01764496251', '9B28', 'IMG_2833.png', NULL),
(1411, 9, 'Class Nine', 'B', 151, 'RIMA KHANAM', 'MD AKKAS ALI  SHEIKH', 'MST RASHIDA  BEGUM', 'রিমা খানম', 'মোঃ আক্কাচ আলী  শেখ', 'মোছাঃ রাশিদা বেগম', 'FEMALE', '2006-06-02', '20063534327039819', '0', '0', 'GOPALGANJ', '01954835772', '9B151', 'IMG_2832.png', NULL),
(1412, 9, 'Class Nine', 'B', 49, 'LMI SULTANA LIA', 'MD ALFAZ UDDIN', '', 'লামিয়া সুলতানা লিয়া', 'মোঃ আলফাজ উদ্দীন', 'মিসেস শাহানা', 'FEMALE', '2010-12-05', '20102910384103520', '0', '0', 'VILL: TAGARBANDA, UNION:  04 NO TAGARBANDA,  UPAZILA: ALFADANGA, DIST:  FARIDPUR.', '01913739688', '9B49', 'IMG_2830.png', NULL),
(1413, 9, 'Class Nine', 'B', 112, 'বানিয়া আক্তার ভাবনা', '', '', 'বানিয়া আক্তার ভাবনা', 'জিল্লুর রহমান', 'রেক্সনা বেগম', 'FEMALE', '2008-08-02', '20086515263009020', '0', '0', '', '01736778453', '9B112', 'IMG_2829.png', NULL),
(1414, 9, 'Class Nine', 'B', 137, 'JULIA KHANAM', 'MD ZAKIR  HOSSAIN', 'BEAUTY BEGUM', 'জুলিজু য়া খানম', 'মোঃ জাকির  হোসেন', 'বিউটি বেগম', 'FEMALE', '2008-01-01', '20082910384021056', '0', '0', 'FARIDPUR', '01404616487', '9B137', 'IMG_2828.png', NULL),
(1415, 9, 'Class Nine', 'B', 111, 'TAMALIKA  KHANAM', 'MD KAMAL MOLLA', 'FARIDA BEGUM', 'তমালিকা খানম', 'মোঃ কামাল  মোল্যা', 'ফরিদা বেগম', 'FEMALE', '2010-05-05', '20102910384103448', '0', '0', 'FARIDPUR', '01910421727', '9B111', 'IMG_2827.png', NULL),
(1416, 9, 'Class Nine', 'B', 99, 'METU KHANOM', 'AZIZUR MOLLA', 'RUSNA BEGUM', 'মিতু খানম', 'আজিজুরজু মোল্যা', 'রুসনা বেগম', 'FEMALE', '2010-02-16', '20102910384103445', '0', '0', 'FARIDPUR', '01912407333', '9B99', 'IMG_2826.png', NULL),
(1417, 9, 'Class Nine', 'B', 96, 'FARIA KHANOM', 'ALAUDDIN MOLLA', 'RASHIDA BEGUM', 'ফারিয়া খানম', 'আলাউদ্দিন মোল্যা', 'রাশিদা বেগম', 'FEMALE', '2011-02-10', '20112910384103420', '0', '0', 'VILL: KRISHNOPUR, UNION:  04 NO TAGARBANDA,  UPAZILA: ALFADANGA, DIST:  FARIDPUR.', '01962097007', '9B96', 'IMG_2825.png', NULL),
(1418, 9, 'Class Nine', 'B', 167, 'KEYA KHANAM', 'MITUL KHAN', 'SALMA BEGUM', 'কেয়া খানম', 'মিটুল খান', 'ছালমা বেগম', 'FEMALE', '2009-02-12', '20093514327028474', '0', '0', 'GOPALGANJ', '01966494987', '9B167', 'IMG_2823.png', NULL),
(1419, 9, 'Class Nine', 'B', 71, 'SADIA AKTER DRISHTI', 'MD. SAHIDUL MOLLA', 'NASRIN BEGUM', 'সাদিয়া আক্তার দৃষ্টি', 'মোঃ সাহিদুল মোল্লা', 'নাসরিন বেগম', 'FEMALE', '2009-10-29', '20093514327030793', '0', '0', 'VILL-BUDHPASHA,POSTVATIAPARA THANAKASIANI,DIST-GOPALGANJ', '01735452176', '9B71', 'IMG_2822.png', NULL),
(1420, 9, 'Class Nine', 'B', 62, 'NIJMA KHANOM', 'JOSIM', 'LABONI', 'নিজমা খানম', 'মো: জসিম মোল্যা', 'মোসা: লাবনী বেগম', 'FEMALE', '2010-05-12', '20103514327030887', '0', '0', 'BUTPASA', '01762672901', '9B62', 'IMG_2820.png', NULL),
(1421, 9, 'Class Nine', 'B', 13, 'RIME KHANAM', 'ABDUL HANNAN  MOLLA', 'JESMEN BEGUM', 'রিমি খানম', 'আব্দুলব্দু হান্নান  মোল্যা', 'জেসমিন বেগম', 'FEMALE', '2010-02-11', '20103514327029301', '0', '0', 'GOPALGANJ', '01721694890', '9B13', 'IMG_2818.png', NULL),
(1422, 9, 'Class Nine', 'B', 8, 'LOBA KHANAM', 'MD. SYED ALI', 'HAZERA BEGUM', 'লোবা খানম', 'মোঃ সৈয়দ আলী', 'হাজেরা বেগম', 'MALE', '2009-11-01', '20093514381032766', '0', '0', 'VILL: SHANKARPASA, POST.  CHARVATPARA P.S. KASIANI,  DIST. GOPALGANJ', '01728811413', '9B8', 'IMG_2817.png', NULL),
(1423, 9, 'Class Nine', 'B', 85, 'ZENIA SULTANA', 'MD AYUB SHEIKH', 'SUPEYA BEGUM', 'জিনিয়া সুলতানা', 'মোঃ আইয়ুব শেখ', 'সুফিয়া বেগম', 'FEMALE', '2008-06-20', '20083514327031507', '0', '0', 'GOPALGANJ', '01964426646', '9B85', 'IMG_2815.png', NULL),
(1424, 9, 'Class Nine', 'B', 54, 'KAMONA KHANAM', 'MD KAMRUL  SHEIKH', 'RIKTA BEGUM', 'কামনা খানম', 'মোঃ কামরুল  শেখ', 'রিক্তা বেগম', 'FEMALE', '2008-12-15', '20083514327031297', '0', '0', 'GOPALGANJ', '01911114663', '9B54', 'IMG_2814.png', NULL),
(1425, 9, 'Class Nine', 'B', 20, 'BONNA', 'BAHARUL MRIDHA', 'BEAUTY AKTER', 'বন্যা', 'বাহারুল মৃধা মৃ', 'বিউটী আক্তার', 'FEMALE', '2008-05-30', '20082611884121791', '0', '0', 'DHAKA-1330', '01941723473', '9B20', 'IMG_2813.png', NULL),
(1426, 9, 'Class Nine', 'B', 12, 'Alifa Khanam', '', '', 'আলিফা খানম', 'বাচ্চু শেথ', 'রেহানা বেগম', 'FEMALE', '2008-03-21', '20083534327035410', '0', '0', 'GOPALGANJ', '01787466358', '9B12', 'IMG_2812.png', NULL),
(1427, 9, 'Class Nine', 'B', 106, 'PUJA BISWAS', 'SONKUR BISWAS', 'EITE BISWAS', 'পুজা বিশ্বাস', 'শংকর বিশ্বাস', 'ইতি বিশ্বাস', 'FEMALE', '2009-07-12', '20093534327041583', '0', '0', 'GOPALGANJ', '01983282482', '9B106', 'IMG_2811.png', NULL),
(1428, 9, 'Class Nine', 'B', 104, 'RIPA KHANOM', 'MD RAFIQ SHEIKH', 'MST JHARNA  BEGUM', 'রিপা খানম', 'মোঃ রফিক শেখ', 'মোছাঃ ঝর্না  বেগম', 'FEMALE', '2010-03-15', '20103514327030270', '0', '0', 'GOPALGANJ', '01933556470', '9B104', 'IMG_2810.png', NULL),
(1429, 9, 'Class Nine', 'B', 133, 'FATEMA AKTER BITHI', 'MD RASEL SHEIKH', 'MST NURJAHAN  BEGUM', 'ফাতেমা আক্তার বিথী', 'মোঃ রাছেল শেখ', 'মোছাঃ নুর জাহান  বেগম', 'FEMALE', '2009-08-16', '20093514327031677', '0', '0', 'GOPALGANJ', '01721292916', '9B133', 'IMG_2808.png', NULL),
(1430, 9, 'Class Nine', 'B', 97, 'JUTHI', 'MD JANU MIA  SHEIKH', 'MST ASMA BEGUM', 'যুথী', 'মোঃ জনুমিয়া শেখ', 'মোছঃ আসমা  বেগম', 'FEMALE', '2010-09-05', '20103514327031689', '0', '0', 'GOPALGANJ', '01926474180', '9B97', 'IMG_2805.png', NULL),
(1431, 9, 'Class Nine', 'B', 11, 'AVANA AFRIN ABANI', 'MD AMINUR SHEIKH', 'MST SHIRINA  BEGUM', 'আভানা আফরিন  অবনী', 'মোঃ আমিনুর শেখ', 'মোসাঃ শিরিনা বেগম', 'FEMALE', '2010-05-28', '20103514327028085', '0', '0', 'GOPALGANJ', '01733511058', '9B11', 'IMG_2804.png', NULL),
(1432, 9, 'Class Nine', 'B', 52, 'MST JUI KHANUM', 'MD JAHANGIR KAZI', 'MST SARMIN  BEGUM', 'মোসাঃ জুঁইজুঁ খানম', 'মোঃ জাহাঙ্গীর  কাজী', 'মোছাঃ শারমিন  বেগম', 'FEMALE', '2010-08-19', '20103514327030262', '0', '0', 'GOPALGANJ', '01799405122', '9B52', 'IMG_2803.png', NULL),
(1433, 9, 'Class Nine', 'B', 5, 'JAHARATUL', 'SORIF', 'HASNA', 'জাহারাতুল ফেরদৌসী', 'শরীফ মুজিবর রহমান', 'হাসনা হেনা', 'FEMALE', '2008-11-18', '20083514327029289', '0', '0', 'BORASUR', '01400481036', '9B5', 'IMG_2801.png', NULL),
(1434, 9, 'Class Nine', 'B', 2, 'SUMAIYA HASAN  ISME', 'M M IMRUL HASAN', 'RUPA BEGUM', 'সুমাইয়া হাসান  ইসমী', 'এম এম ইমরুল  হাচান', 'রুপা বেগম', 'FEMALE', '2009-12-06', '20093514327029109', '0', '0', 'GOPALGANJ', '01716271797', '9B2', 'IMG_2800.png', NULL),
(1435, 9, 'Class Nine', 'B', 7, 'SAHARA AMIN JOTI', 'AL AMIN SHAK', 'MST KAKOLI  BEGUM', 'সাহারা আমীন  জ্যোতি', 'আল আমিন শেখ', 'মোছাঃ কাকলী  বেগম', 'FEMALE', '2010-05-29', '20103514327035048', '0', '0', 'GOPALGANJ', '01736927111', '9B7', 'IMG_2799.png', NULL),
(1436, 9, 'Class Nine', 'B', 79, 'HABIBA AKTER', 'MD HAFIZUR  RAHMAN', 'MST REKTA BEGUM', 'হাবিবা আক্তার', 'মোঃ হাফিজুরজু  রহমান', 'মোছাঃ রিক্তা বেগম', 'FEMALE', '2010-05-21', '20103514327031129', '0', '0', 'GOPALGANJ', '01982633449', '9B79', 'IMG_2798.png', NULL),
(1437, 9, 'Class Nine', 'B', 138, 'MST MURSALINA  KHANAM', 'KAZI NOOR ALAM', 'MST ZASMIN BEGUM', 'মোসা: মুরসালিনা  খানম', 'কাজী নুর আলম', 'মোসা জেসমিন  বেগম', 'FEMALE', '2007-09-25', '20076515263007303', '0', '0', 'NARAIL', '01956683507', '9B138', 'IMG_2796.png', NULL),
(1438, 9, 'Class Nine', 'B', 80, 'NUPUR', 'KUBAD SHIKDAR', 'RUBI BEGUM', 'নুপুর', 'কুবাদ শিকদার', 'রুবি বেগম', 'FEMALE', '2007-12-05', '20072910384108117', '0', '0', 'FARIDPUR', '01988396297', '9B80', 'IMG_2795.png', NULL),
(1439, 9, 'Class Nine', 'B', 42, 'CHAITI BISWAS', 'RAKHAL CHANDRA  BISWAS', 'NIPA RANI BISWAS', 'চৈতী বিশ্বাস', 'রাখাল চন্দ্র  বিশ্বাস', 'নিপা রানী  বিশ্বাস', 'FEMALE', '2008-04-06', '20083514327032614', '0', '0', 'GOPALGANJ', '01912063629', '9B42', 'IMG_2794.png', NULL),
(1440, 9, 'Class Nine', 'B', 26, 'SAMAPTI BISWAS  SONALI', 'SUSHANTA BISWAS', 'KAKALI BISWAS', 'সমাপ্তি বিশ্বাস  সোনালী', 'সুশান্ত বিশ্বাস', 'কাকলী বিশ্বাস', 'FEMALE', '2010-04-24', '20103514327029012', '0', '0', 'GOPALGANJ', '01724941743', '9B26', 'IMG_2793.png', NULL),
(1441, 9, 'Class Nine', 'B', 63, 'SHADIYA SULTANA  RIME', 'SHARIF AZAD  RARVEG', 'RAHIMA', 'সাদিয়া সুলতানা রিমি', 'শরীফ আজাদ  পারভেজ', 'রহিমা', 'FEMALE', '2010-08-31', '20103514327027496', '0', '0', 'GOPALGANJ', '01920591672', '9B63', 'IMG_2791.png', NULL),
(1442, 9, 'Class Nine', 'B', 27, 'TAJRIN KHANAM', 'MD LITU KHAN', 'BILKISS BEGUM', 'তাজরিন খানম', 'মোঃ লিটু খাঁনখাঁ', 'বিলকিছ বেগম', 'FEMALE', '2011-02-15', '20113514327029002', '0', '0', 'GOPALGANJ', '01302466830', '9B27', 'IMG_2790.png', NULL),
(1443, 9, 'Class Nine', 'B', 24, 'MORIYAM AKTER', 'MD TUTU KHAN', 'NIPA PARVIN', 'মরিয়াম আক্তার', 'মোঃ টুটু খান', 'নিপা পারভীন', 'FEMALE', '2010-11-11', '20103514327027101', '0', '0', 'GOPALGANJ', '01998897488', '9B24', 'IMG_2789.png', NULL),
(1444, 9, 'Class Nine', 'B', 1, 'KASFIA MOLLICK', 'MD KAMRUZZAMAN  MOLLICK', 'JAHADA ISLAM LIPI', 'কাশফিয়া মল্লিক', 'মোঃ কামরুজ্জামান  মল্লিক', 'জাহেদা ইসলাম লিপি', 'FEMALE', '2010-10-22', '20102910384106143', '0', '0', 'FARIDPUR', '01956251212', '9B1', 'IMG_2788.png', NULL),
(1445, 9, 'Class Nine', 'B', 59, 'KABBO KHANOM', 'MD. KOLOM SHEIKH', 'MST. HIRA BEGUM', 'কাব্য খানম', 'মোঃ কলম শেখ', 'মোছাঃ হিরা বেগম', 'FEMALE', '2009-02-10', '20093514327031550', '0', '0', 'VILL: BORASHUR,POST:  VATIAPARA P.S:  KASHIANI,DIST: GOPALGANJ', '01716054688', '9B59', 'IMG_2787.png', NULL),
(1446, 9, 'Class Nine', 'B', 43, 'RUPA BISWAS', 'BIPLOB BISWAS', 'RAKHA RANI  BISWAS', 'রুপা বিশ্বাস', 'বিপ্লব বিশ্বাস', 'রেখা রানী  বিশ্বাস', 'FEMALE', '2009-10-17', '20093514327030246', '0', '0', 'GOPALGANJ', '01311922431', '9B43', 'IMG_2786.png', NULL),
(1447, 9, 'Class Nine', 'B', 15, 'Rifa Moni', '', '', 'রিফা মনী', 'মো:মোশারফ হোসেন', 'মিসেস: রাশিদা আক্তার', 'FEMALE', '2010-01-14', '20103326602408653', '0', '0', '', '01743104816', '9B15', '3333.jpg', NULL),
(1448, 9, 'Class Nine', 'B', 9, 'PREMA BISWAS', 'KRISHNO  BISWAS', 'TAPOSE BISWAS', 'প্রেমা বিশ্বাস', 'কৃষ্ণ বিশ্বাস', 'তাপসী  বিশ্বাস', 'FEMALE', '2009-10-03', '20093534327035380', '0', '0', 'GOPALGANJ', '01758858506', '9B9', 'IMG_2783.png', NULL),
(1449, 9, 'Class Nine', 'B', 41, 'MIS FAHIMA AKTER  RIME', 'MD KAYES ALI', 'MOST MITA BEGUM', 'মিস ফাহিমা  আক্তার রিমি', 'মোঃ কায়েস আলী', 'মোছাঃ মিতা  বেগম', 'FEMALE', '2010-09-14', '20103534327036799', '0', '0', 'GOPALGANJ', '01788539899', '9B41', 'IMG_2782.png', NULL),
(1450, 9, 'Class Nine', 'B', 30, 'MST SAMIMA  AKTER', 'MD SHAMIM  MOLLA', 'MST LAIJU AKTER', 'মোসাঃ শামিমা  আক্তার', 'মোঃ শামিম  মোল্যা', 'মোছাঃ লাইজু  বেগম', 'FEMALE', '2010-08-24', '20103514327029405', '0', '0', 'GOPALGANJ', '01948929494', '9B30', 'IMG_2781.png', NULL),
(1451, 9, 'Class Nine', 'B', 113, 'MST PUTUL  KHANAM', 'MD AHADUL  MOLLA', 'MST RITA BEGUM', 'মোসাঃ পুতুল  খানম', 'মোঃ আহাদুল  মোল্যা', 'মোসাঃ রিতা  বেগম', 'FEMALE', '2011-02-25', '20116515223033535', '0', '0', 'NARAIL', '01569198459', '9B113', 'IMG_2777.png', NULL),
(1452, 9, 'Class Nine', 'B', 116, 'RUPALI KHANOM', 'KHANDAKAR AKTHER ALI', 'MST. SUMI BEGUM', 'রুপালী খানম', 'খন্দকার আক্তার  আলী', 'মোসা: সুমি বেগম', 'FEMALE', '2009-01-01', '20096515263011171', '0', '0', 'VILLAGE: CHAGOLCHIRA,  POST: KAMTHANA, P.S:  LOHAGARA, DISTRICT:  NARAIL.', '01401966898', '9B116', 'IMG_2776.png', NULL),
(1453, 9, 'Class Nine', 'B', 92, 'SABIHA MAHMUDA  MITA', 'MD ALAMGIR  HOSSAN', 'MST ALAYA BEGUM', 'সাবিহা মাহমুদা  মিতা', 'মোঃ আলমগীর  হোসেন', 'মোসাঃ আলেয়া  বেগম', 'FEMALE', '2009-09-16', '20096515263014931', '0', '0', 'NARAIL', '01911710410', '9B92', 'IMG_2775.png', NULL),
(1454, 9, 'Class Nine', 'B', 37, 'Maria Sultana', 'N/A', 'N/A', 'মারিয়া সুলতানা', 'মো:জামাল হোসেন শেখ', 'রুমিয়া বেগম', 'FEMALE', '2009-04-22', '20093514327027987', '0', '0', 'N/A', '01718968747', '9B37', 'IMG_2774.png', NULL),
(1455, 9, 'Class Nine', 'B', 48, 'LABONNO  KHANAM', 'MD LABU  TALUKDER', 'MST PARVIN  BEGUM', 'লাবন্য খানম', 'মোঃ লাবু  তালুকদার', 'মোসাঃ পারভীন  বেগম', 'FEMALE', '2010-04-24', '20093514327027983', '0', '0', 'GOPALGANJ', '01731999828', '9B48', 'IMG_2773.png', NULL),
(1456, 9, 'Class Nine', 'B', 148, 'LAMIA', 'MD. RIZAUL SARDER', 'RATNA BEGUM', 'লামিয়া', 'মোঃ রিজাউল সরদার', 'রত্না বেগম', 'FEMALE', '2010-01-01', '20103514381033302', '0', '0', 'VILL: DHANKORA, POST.  PATHORGHATA P.S.  KASIANI, DIST.  GOPALGANJ', '01767697868', '9B148', 'IMG_2772.png', NULL),
(1457, 9, 'Class Nine', 'B', 3, 'SABIHA ZAMAN SHOYTI', 'MOLLICK MOHAMMAD  SHAHEENUZZAMAN', 'RAHIMA KHANAM', 'সাবিহা জামান  শৈতি', 'মল্লিক মোঃ  শাহীনুজ্জামান', 'রহিমা খানম', 'FEMALE', '2011-03-06', '20112910384110489', '0', '0', 'FARIDPUR', '01724651841', '9B3', 'IMG_2771.png', NULL),
(1458, 9, 'Class Nine', 'B', 22, 'SOSTIKA BISWAS', 'NEPAL CHANDRA  BISWAS', 'BITHI RANI BISWAS', 'স্বস্তিকা বিশ্বাস', 'নেপাল চন্দ্র  বিশ্বাস', 'বিথী রানী  বিশ্বাস', 'FEMALE', '2009-07-10', '20093514327029571', '0', '0', 'GOPALGANJ', '01935601725', '9B22', 'IMG_2770.png', NULL),
(1459, 9, 'Class Nine', 'B', 36, 'MARYAM', 'EMDADUL HAQUE', 'FERDOUSHI  KHANOM', 'মারইয়াম', 'এমদাদুল হক', 'ফেরদৌসি  খানম', 'FEMALE', '2009-12-31', '20093514381034830', '0', '0', 'GOPALGANJ', '01717116217', '9B36', 'IMG_2768.png', NULL),
(1460, 9, 'Class Nine', 'B', 18, 'Amina Tasmin', 'NA', 'NA', 'আমিনা তাছমিন', 'মোঃ কাকুল শরীফ', 'রুবিয়া ইয়াছমিন', 'FEMALE', '2011-10-03', '20113514327028748', '0', '0', '', '01779727778', '9B18', 'IMG_2766.png', NULL),
(1461, 9, 'Class Nine', 'B', 10, 'SAMIYA Khanom', 'SAKAOT', 'TAJMIN', 'সামিয়া খানম', 'শেখ মোঃসাখাওয়াত হোসেন', 'মোছাঃতাজমিন বেগম', 'FEMALE', '2010-03-10', '20103514327034224', '0', '0', 'BRASUR', '01953136024', '9B10', 'IMG_2764.png', NULL),
(1462, 9, 'Class Nine', 'B', 19, 'MISS MAHIMA  KHANAM', 'MD MONIR MOLLA', 'NARGIS BEGUM', 'মিসেস মাহিমা  খানম', 'মোঃ মনির  মোল্যা', 'নারগিছ বেগম', 'FEMALE', '2009-11-23', '20092910384100696', '0', '0', 'FARIDPUR', '01729885513', '9B19', 'IMG_2762.png', NULL),
(1463, 9, 'Class Nine', 'B', 70, 'MAHAMUDA BINTE  SARMIN', 'MRIDHA MOHAMMAD  ABUL HASAN', 'LUTFUN NESSA', 'মাহামুদা বিনতে  শারমীন', 'মৃধা মৃ মোহাম্মাদ  আবুল হাসান', 'লুৎফু ন্নেছা', 'FEMALE', '2010-07-13', '20103514381033179', '0', '0', 'GOPALGANJ', '01764496251', '9B70', 'IMG_2761.png', NULL),
(1464, 9, 'Class Nine', 'B', 110, 'SURIA KHANOM', 'MD CHUNNU  MOLLA', 'MST SHAHIDA  BEGUM', 'সুরাইয়া খানম', 'মোঃ চুন্নু মোল্যা', 'মোছাঃ সাহিদা  বেগম', 'FEMALE', '2009-03-04', '20093534327040855', '0', '0', 'GOPALGANJ', '01323399936', '9B110', 'IMG_2831.png', NULL),
(1465, 9, 'Class Nine', 'B', 68, 'ATHORA KHATUN', 'MD MASUD RANA', 'MST SUMI  KHANAM', 'অথরা খাতুন', 'মোঃ মাসুদ  রানা', 'মোসাঃ সুমি  খানম', 'FEMALE', '2008-08-19', '20084116110106277', '0', '0', 'JASHORE', '01933208153', '9B68', 'IMG_2816.png', NULL),
(1466, 9, 'Class Nine', 'B', 38, 'MIM KHANAM', 'OHIDUL  SHEIKH', 'ARJINA BEGUM', 'মিম খানম', 'ওহিদুলদু শেখ', 'আরজিনা  বেগম', 'FEMALE', '2009-01-10', '20093514327031542', '0', '0', 'GOPALGANJ', '01758027358', '9B38', 'IMG_2792.png', NULL),
(1467, 9, 'Class Nine', 'B', 67, 'NAHIDA AKTER  NUPUR', 'MD MAHABUR  MOLLA', 'BINA BEGUM', 'নাহিদা আক্তার  নুপুনুপুর', 'মোঃ মাহাবুরবু  মোল্যা', 'বিনা বেগম', 'FEMALE', '2010-01-11', '20103514327030301', '0', '0', 'GOPALGANJ', '01761519804', '9B67', 'IMG_2797.png', NULL),
(1468, 9, 'Class Nine', 'B', 75, 'LAILA AKTER LAIJU  KHANAM', 'MD PANNU KHAN', 'JOBEDA KHANAM', 'লায়লা আক্তার  লাইজু খানম', 'মোঃ পান্নু খান', 'জবেদা খানম', 'FEMALE', '2010-07-27', '20103514327033593', '0', '0', 'GOPALGANJ', '01934905644', '9B75', 'IMG_2806.png', NULL),
(1469, 9, 'Class Nine', 'B', 4, 'MUSFEKA JAHAN  TONNE', 'MD MUKUL HOSSAIN  MOLLA', 'ADORI KHANOM', 'মুশমুফিকা জাহান  তন্নী', 'মোঃ মুকুমু ল  হোসেন মোল্যা', 'আদরী খানম', 'FEMALE', '2009-05-26', '20093513256018432', '0', '0', 'GOPALGANJ', '01728245112', '9B4', 'IMG_2802.png', NULL),
(1470, 9, 'Class Nine', 'A', 135, 'MD RAZWON  SHEIKH', 'MD MEHADI HASAN', 'REYA BEGUM', 'মোঃ রেজোয়ান  শেখ', 'মোঃ মেহেদী  হাসান', 'রিয়া বেগম', 'MALE', '2009-10-03', '20093514327030227', '0', '0', 'GOPALGANJ', '01952776640', '9A135', 'IMG_2667.png', NULL),
(1471, 9, 'Class Nine', 'A', 57, 'SHUVOZIT BISWAS', 'RAMPROSAD BISWAS', 'SHILPI RANI BISWAS', 'শুভজীত বিশ্বাস', 'রামপ্রসাদ বিশ্বাস', 'শিল্পী রানী বিশ্বাস', 'MALE', '2009-12-23', '20093514327032624', '0', '0', 'VILL: BORASHUR POST:  VATIAPARA UPAZILA:  KASHIANI DIST: GOPALGANJ', '01753849420', '9A57', 'IMG_2669.png', NULL),
(1472, 9, 'Class Nine', 'A', 46, 'KRISHNO BISWAS', 'SANJIT BISWAS', 'KHUKU RANI  BISWAS', 'কৃষ্ণ বিশ্বাস', 'সঞ্জিত বিশ্বাস', 'খুকু রানী  বিশ্বাস', 'MALE', '2010-08-23', '20103514327035016', '0', '0', 'GOPALGANJ', '01729934160', '9A46', 'IMG_2671.png', NULL),
(1473, 9, 'Class Nine', 'A', 103, 'MD SHAKIBUL HASAN  UTSHO', 'MD OBAYDUR  RAHAMAN', 'MST SATHI BEGUM', 'মোঃ সাকিবুল হাসান  উৎস', 'মোঃ ওবায়দুর  রহমান', 'মোছাঃ সাথী বেগম', 'MALE', '2011-01-16', '20113514327031034', '0', '0', 'GOPALGANJ', '01716162720', '9A103', 'IMG_2672.png', NULL),
(1474, 9, 'Class Nine', 'A', 31, 'SHIMU BOSU', 'SHAMOL BOSU', 'NOMITA BOUS', 'শিমুবসু', 'শ্যামল বসু', 'নমিতা বোস', 'MALE', '2010-03-01', '20103514381035659', '0', '0', 'GOPALGANJ', '01728497465', '9A31', 'IMG_2673.png', NULL),
(1475, 9, 'Class Nine', 'A', 81, 'SHOYKOT', 'MONIRUJJAMAN', 'NURJAHAN KHANAM', 'সৈকত', 'মনিরুজ্জামান', 'নুরজাহান খানম', 'MALE', '2010-02-23', '20103514381033238', '0', '0', 'VILL: DHANKORA, , POST.  PATHORGHATA P.S.  KASIANI, DIST. GOPALGANJ', '01762827247', '9A81', 'IMG_2478.png', NULL),
(1476, 9, 'Class Nine', 'A', 47, 'UZAYER  RAHMAN', 'MOSTOFA JAMAN', 'LABONI AKTER', 'উজায়ের  রহমান', 'মোস্তফা জামান', 'লাবনী আক্তার', 'MALE', '2009-03-07', '20093514381032740', '0', '0', 'GOPALGANJ', '01716161325', '9A47', 'IMG_2479.png', NULL),
(1477, 9, 'Class Nine', 'A', 150, 'MD AL SADI', 'MD SURUJ MOLLA', 'MST AFRIN  NAHAAR', 'মো আল সাদি', 'মো সুরুজ মোল্যা', 'মোসা আফরিন  নাহার', 'MALE', '2010-06-15', '20106515263012081', '0', '0', 'NARAIL', '01728698011', '9A150', 'IMG_2480.png', NULL),
(1478, 9, 'Class Nine', 'A', 61, 'MD. ABIR MOLLA', 'ANOYAR', 'FATAMA', 'মোঃ আবির মোল্লা', 'আনোয়ার মোল্যা', 'ফতেমা বেগম', 'MALE', '2011-03-01', '20113514327035077', '0', '0', 'B', '01957195273', '9A61', 'IMG_2481.png', NULL),
(1479, 9, 'Class Nine', 'A', 120, 'MAYNUL ISLAM', 'IBRAHIM SHEIKH', 'MONOWARA BEGUM', 'ময়নুল ইসলাম', 'ইব্রাহীম শেখ', 'মনোয়ারা বেগম', 'MALE', '2010-01-27', '20103514381032802', '0', '0', 'VILL: DHANKORA, POST.  PATHORGHATA P.S.  KASIANI, DIST. GOPALGANJ', '01933153349', '9A120', 'IMG_2483.png', NULL),
(1480, 9, 'Class Nine', 'A', 16, 'SHAWON SHEIKH', 'BILLAL SHEIKH', 'KAMONA BEGUM', 'শাওন শেখ', 'বিল্লাল শেখ', 'কামনা বেগম', 'MALE', '2010-03-08', '20103514327031756', '0', '0', 'VILL:  JUNGLEMUKUNDPUR,POST:  VATIAPARA P.S:  KASHIANI,DIST: GOPALGANJ', '01917282140', '9A16', 'IMG_2485.png', NULL),
(1481, 9, 'Class Nine', 'A', 156, 'NITYANONDO KUMAR  BISWAS', 'ANANDHO KUMAR  BISWAS', 'SHIPRA RANI BISWAS', 'নিত্যানন্দ কুমার  বিশ্বাস', 'আনন্দ কুমার  বিশ্বাস', 'শিপ্রা রানী বিশ্বাস', 'MALE', '2007-04-05', '20073534327020872', '0', '0', 'GOPALGANJ', '01747067383', '9A156', 'IMG_2487.png', NULL),
(1482, 9, 'Class Nine', 'A', 94, 'MANIK CHAND  FAKIR', 'MINTU FAKIR', 'MST SALMA  BEGUM', 'মানিক চাঁদচাঁ ফকির', 'মিন্টু ফকির', 'মোসাঃ সালমা  বেগম', 'MALE', '2010-12-06', '20103514327030282', '0', '0', 'GOPALGANJ', '01919738712', '9A94', 'IMG_2488.png', NULL),
(1483, 9, 'Class Nine', 'A', 34, 'MD SOJIB SHEIKH', 'MD MOHIN  SHEIKH', 'MST BINA  KHANAM', 'মোঃ সজিব শেখ', 'মোঃ মহিন শেখ', 'মোসাঃ বিনা  খানম', 'MALE', '2010-08-20', '20103534327040197', '0', '0', 'GOPALGANJ', '01731870121', '9A34', 'IMG_2489.png', NULL),
(1484, 9, 'Class Nine', 'A', 102, 'MD: HUSAIN MOLLA', 'MD: ELIYAS MOLLA', 'MST: SALMA BEGUM', 'মো: হুসাইন মোল্লা', 'মো: ইলিয়াচ মোল্লা', 'মোসা: সালমা বেগম', 'MALE', '2011-06-11', '20116515263009611', '0', '0', 'SAGOLCHERA,KAMTHANA,LOHAGORA,NARAIL.', '01948173639', '9A102', 'IMG_2490.png', NULL),
(1485, 9, 'Class Nine', 'A', 82, 'MD. MASUM KHAN', 'AJOM', 'JORNA', 'মোঃ মাছুম খান', 'মোঃ আজম খান', 'ঝরনা বেগম', 'MALE', '2011-05-03', '20113514327035080', '0', '0', 'B', '01790915286', '9A82', 'IMG_2491.png', NULL),
(1486, 9, 'Class Nine', 'A', 89, 'MD MARUF  SHEIKH', 'MD KAMAL  HOSSEN', 'JANNATI BEGUM', 'মোঃ মারুফ শেখ', 'মোঃ কামাল  হোসেন', 'জান্নাতী বেগম', 'MALE', '2011-06-01', '20113514381033075', '0', '0', 'GOPALGANJ', '017412055125', '9A89', 'IMG_2492.png', NULL),
(1487, 9, 'Class Nine', 'A', 55, 'ALL JUBORAJ', 'MD TOKU MIA', 'MST SUARAYA  BEGUM', 'আল যুবরাজ', 'মোঃ টুকু মিয়া', 'মোসাঃ সুরাইয়া  বেগম', 'MALE', '2011-01-01', '20116515263009004', '0', '0', 'NARAIL', '01983058567', '9A55', 'IMG_2493.png', NULL),
(1488, 9, 'Class Nine', 'A', 107, 'MD: RIAD SHEIKH', 'MD SHOHEL SHEIKH', 'RAZIA BEGUM', 'মোঃ রিয়াদ শেখ', 'মোঃ সোহেল শেখ', 'রাজিয়া বেগম', 'MALE', '2010-04-16', '20102910384101305', '0', '0', 'VILL: KRISHNOPUR, UNION:  4 NO TAGARBANDA, PS:  ALFADANGA, DIST:  FARIDPUR.', '01985747059', '9A107', 'IMG_2494.png', NULL),
(1489, 9, 'Class Nine', 'A', 58, 'MD JAUNAID HOSEAIN  KORNO', 'MD RAKIBUL ISLAM', 'MST KANAN BEGUM', 'মোঃ জুনা জু য়েদ  হোসেন কর্ন', 'মোঃ রাকিবুল  ইসলাম', 'মোছাঃ কানন বেগম', 'MALE', '2010-10-13', '20103514327034770', '0', '0', 'GOPALGANJ', '01708867740', '9A58', 'IMG_2496.png', NULL),
(1490, 9, 'Class Nine', 'A', 74, 'MD  ARIFUZZAMAN', 'MD BABLU  MOLLA', 'MST AKLIMA  BEGUM', 'মো: আরিফুজ্জামান', 'মো বাবলু মোল্যা', 'মোসা আকলিমা  বেগম', 'MALE', '2009-10-25', '20096515263009606', '0', '0', 'NARAIL', '01965183465', '9A74', 'IMG_2497.png', NULL),
(1491, 9, 'Class Nine', 'A', 128, 'MD SIAM SHEIKH', 'MD SHAJAHAN  SHEIKH', 'MST HERA BEGUM', 'মোঃ সিয়াম শেখ', 'মোঃ শাজাহান  শেখ', 'মোসাঃ হীরা  বেগম', 'MALE', '2009-12-10', '20093514327031502', '0', '0', 'GOPALGANJ', '01965182624', '9A128', 'IMG_2517.png', NULL),
(1492, 9, 'Class Nine', 'A', 29, 'Md. Umayer Hasan Abon', 'JAHID', 'AKI', 'মোঃ উমায়ের হাসান আবন', 'মোঃ জাহিদ হাসান', 'মোসাঃ আখি বেগম', 'MALE', '2010-10-21', '20103514327035061', '0', '0', 'J', '01953180870', '9A29', 'IMG_2520.png', NULL),
(1493, 9, 'Class Nine', 'A', 88, 'SORJIT Biswas', 'SONKOR', 'JOSNA', 'সরজীত বিশ্বাস', 'শংকর বিশ্বাস', 'জোসনা বিশ্বাস', 'MALE', '2009-01-28', '20093514327029511', '0', '0', 'KASIANI-KASIANI  KASIANI-GOPALGONJ', '01706697115', '9A88', 'IMG_2521.png', NULL),
(1494, 9, 'Class Nine', 'A', 90, 'JEET KUMAR GHOSH', 'UTTAM KUMAR  GHOSH', 'TUMPA GHOSH', 'জিৎ কুমার  ঘোষ', 'উত্তম কুমার  ঘোষ', 'টুম্পা ঘোষ', 'MALE', '2011-04-05', '20112910384110880', '0', '0', 'FARIDPUR', '01816487954', '9A90', 'IMG_2522.png', NULL),
(1495, 9, 'Class Nine', 'A', 56, 'SHEIK MAHIN RANA', 'MD.SUKOR ALI SHEIK', 'JOSNA BEGUM', 'শেখ মাহিন রানা', 'মোঃ শুকুর আলী শেখ', 'জোসনা বেগম', 'MALE', '2010-12-22', '20103514327029003', '0', '0', 'VILL.BROSUR  POST.VATIYARAPA  UPZALLA.KASHIANI  DIST.GOPALGANJ', '01622463730', '9A56', 'IMG_2552.png', NULL),
(1496, 9, 'Class Nine', 'A', 93, 'MD MONIR HOSSAIN  MOLLICK', 'MD EMAN MOLLICK', 'MST MONIRA BEGUM', 'মোঃ মনির হোসেন  মল্লিক', 'মোঃ ইমান মল্লিক', 'মোসাঃ মনিরা  বেগম', 'MALE', '2007-10-25', '20072910384108209', '0', '0', 'FARIDPUR', '01951370644', '9A93', 'IMG_2553.png', NULL),
(1497, 9, 'Class Nine', 'A', 142, 'MEHEDI SHEIKH', 'BASHAR SHEIKH', 'RINA KHANAM', 'মেহেদী শেখ', 'বাশার শেখ', 'রিনা খানম', 'MALE', '2010-01-01', '20102910384108958', '0', '0', 'FARIDPUR', '0153777182', '9A142', 'IMG_2554.png', NULL),
(1498, 9, 'Class Nine', 'A', 91, 'MD. LABIB KHAN', 'MD SOHEL KHAN', 'LAVELY BEGUM', 'মোঃ লাবিব খাঁনখাঁ', 'মোঃ সোহেল খান', 'লাভলী বেগম', 'MALE', '2010-01-22', '20102910384103455', '0', '0', 'VILL: TAGARBANDA, UNION:  04 NO TAGARBANDA,  UPAZILA: ALFADANGA, DIST:  FARIDPUR.', '01991482296', '9A91', 'IMG_2555.png', NULL),
(1499, 9, 'Class Nine', 'A', 115, 'MASRIFUZ', 'MIZAN', 'MUNNI', 'মাসরীফুজ জামান আপন', 'মোঃ মিজানুর রহমান মোল্লা', 'মুন্নী খাতুন', 'Male', '2010-06-12', '20100115617100961', '0', '0', 'VAMDERKHOLA  MOLLAHAT', '01713649187', '9A115', '115.jpg', NULL),
(1500, 9, 'Class Nine', 'A', 123, 'MD SALMAN  MOLLA', '', '', 'মোঃ সালমান  মোল্যা', 'মোঃ আলম মোল্যা', 'মোসা শিখা', 'MALE', '2010-10-30', '20103534327035451', '0', '0', 'GOPALGANJ', '01727941342', '9A123', 'IMG_2558.png', NULL),
(1501, 9, 'Class Nine', 'A', 87, 'FAIM', 'AJIM', 'FORIDA', 'ফাহিম শরীফ', 'মোঃ আজীম শরীফ', 'ফরিদা', 'MALE', '2010-09-04', '20103514327034979', '0', '0', 'B', '01961572571', '9A87', 'IMG_2668.png', NULL),
(1502, 7, 'Class Seven', 'B', 23, 'MAHABUBA ISLAM MAESHA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-11-07', '0', '0', '0', 'N/A', '1', '7B23', 'IMG_2899.png', NULL),
(1503, 7, 'Class Seven', 'A', 81, 'MD OMAR FARUK KHAN', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-12-27', '0', '0', '0', 'N/A', '2', '7A81', 'IMG_2897.png', NULL),
(1504, 7, 'Class Seven', 'A', 133, 'HAMIM SARDER', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-12-27', '0', '0', '0', 'N/A', '3', '7A133', 'IMG_2919.png', NULL),
(1505, 7, 'Class Seven', 'A', 142, 'MD. SABBIR SHEIKH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-12-27', '0', '0', '0', 'N/A', '4', '7A142', 'IMG_2918.png', NULL),
(1506, 7, 'Class Seven', 'A', 132, 'MD TANZIL MRIDHA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-12-27', '0', '0', '0', 'N/A', '5', '7A132', 'IMG_2917.png', NULL),
(1507, 7, 'Class Seven', 'A', 147, 'NIROB SHEIKH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-12-27', '0', '0', '0', 'N/A', '6', '7A147', 'IMG_2916.png', NULL),
(1508, 7, 'Class Seven', 'A', 118, 'ALIF KHAN', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-12-27', '0', '0', '0', 'N/A', '7', '7A118', 'IMG_2915.png', NULL),
(1509, 7, 'Class Seven', 'B', 110, 'TASNIA AFROZ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-12-27', '0', '0', '0', 'N/A', '8', '7B110', 'IMG_2914.png', NULL),
(1510, 7, 'Class Seven', 'B', 151, 'SUMAIYA AKTER', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-12-27', '0', '0', '0', 'N/A', '9', '7B151', 'IMG_2913.png', NULL),
(1511, 7, 'Class Seven', 'B', 126, 'SUSMITA BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-12-27', '0', '0', '0', 'N/A', '10', '7B126', 'IMG_2924.png', NULL),
(1512, 8, 'Class Eight', 'A', 59, 'APON BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '11', '8A59', 'IMG_2979.png', NULL),
(1513, 8, 'Class Eight', 'A', 19, 'SAJJAD HOSSAIN', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '12', '8A19', 'IMG_2978.png', NULL),
(1514, 8, 'Class Eight', 'A', 96, 'MD MAHIDUL ISLAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '13', '8A96', 'IMG_2977.png', NULL),
(1515, 8, 'Class Eight', 'A', 27, 'SIAM ISLAM TAMIM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '14', '8A27', 'IMG_2985.png', NULL),
(1516, 8, 'Class Eight', 'A', 35, 'MD JIHAD MOLLIK', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '15', '8A35', 'IMG_2984.png', NULL),
(1517, 8, 'Class Eight', 'A', 135, 'TANVIR ISLAM SUBHO', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '16', '8A135', 'IMG_2982.png', NULL),
(1518, 8, 'Class Eight', 'A', 145, 'HABIB RAHMAN', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '17', '8A145', 'IMG_2981.png', NULL),
(1519, 8, 'Class Eight', 'A', 111, 'MD ISMAIL', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '18', '8A111', 'IMG_2980.png', NULL),
(1520, 8, 'Class Eight', 'A', 120, 'MD.SAKIB MIR', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '19', '8A120', 'IMG_2986.png', NULL),
(1521, 8, 'Class Eight', 'A', 61, 'RAHAN MOLLA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '20', '8A61', 'IMG_2989.png', NULL),
(1522, 8, 'Class Eight', 'A', 39, 'MD. RABBI SHEIKH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '21', '8A39', 'IMG_2988.png', NULL),
(1523, 8, 'Class Eight', 'A', 42, 'ISMAIL', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '22', '8A42', 'IMG_2987.png', NULL),
(1524, 8, 'Class Eight', 'A', 29, 'APON BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '23', '8A29', 'IMG_2990.png', NULL),
(1525, 8, 'Class Eight', 'A', 161, 'MD. Siam', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '24', '8A161', 'IMG_2991.png', NULL),
(1526, 8, 'Class Eight', 'A', 127, 'TANVIR SHEIKH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '25', '8A127', 'IMG_2992.png', NULL),
(1527, 8, 'Class Eight', 'B', 43, 'RUMA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '26', '8B43', 'IMG_2925.png', NULL),
(1528, 8, 'Class Eight', 'B', 23, 'NABILA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '27', '8B23', 'IMG_2922.png', NULL),
(1529, 8, 'Class Eight', 'B', 20, 'MONISHA BALA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '28', '8B20', 'IMG_2921.png', NULL),
(1530, 8, 'Class Eight', 'B', 11, 'MANTHIA JAHAN', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2024-01-22', '0', '0', '0', 'N/A', '29', '8B11', 'IMG_2920.png', NULL),
(1531, 8, 'Class Eight', 'B', 78, 'JUI KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '30', '8B78', 'IMG_2934.png', NULL),
(1532, 8, 'Class Eight', 'B', 92, 'TANIA KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '32', '8B92', 'IMG_2932.png', NULL),
(1533, 8, 'Class Eight', 'B', 6, 'MUNTAHA AHMED', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '33', '8B6', 'IMG_2931.png', NULL),
(1534, 8, 'Class Eight', 'B', 10, 'FARHIBA ISLAM MARZIA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '34', '8B10', 'IMG_2929.png', NULL),
(1535, 8, 'Class Eight', 'B', 164, 'MARIA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2023-11-02', '0', '0', '0', 'N/A', '35', '8B164', 'IMG_2928.png', NULL),
(1536, 8, 'Class Eight', 'B', 80, 'MOONTHAHA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '36', '8B80', 'IMG_2927.png', NULL),
(1537, 8, 'Class Eight', 'B', 67, 'SHIRABONI AKTAR', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '37', '8B67', 'IMG_2926.png', NULL),
(1538, 8, 'Class Eight', 'B', 138, 'HAZERA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '39', '8B138', 'IMG_2942.png', NULL),
(1539, 8, 'Class Eight', 'B', 121, 'SHILA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '40', '8B121', 'IMG_2941.png', NULL),
(1540, 8, 'Class Eight', 'B', 108, 'MUSLIMA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '41', '8B108', 'IMG_2939.png', NULL),
(1541, 8, 'Class Eight', 'B', 28, 'MST HABIBA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '42', '8B28', 'IMG_2938.png', NULL),
(1542, 8, 'Class Eight', 'B', 71, 'MISS SEJUTI KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '43', '8B71', 'IMG_2937.png', NULL),
(1543, 8, 'Class Eight', 'B', 117, 'AYSHA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '44', '8B117', 'IMG_2936.png', NULL),
(1544, 8, 'Class Eight', 'B', 54, 'SHARIFA KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '45', '8B54', 'IMG_2935.png', NULL),
(1545, 8, 'Class Eight', 'B', 103, 'MST ETI KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '46', '8B103', 'IMG_2930.png', NULL),
(1546, 9, 'Class Nine', 'B', 127, 'MST: NURI KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '47', '9B127', 'IMG_2900.png', NULL),
(1547, 9, 'Class Nine', 'B', 118, 'TAMA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '48', '9B118', 'IMG_2901.png', NULL),
(1548, 9, 'Class Nine', 'B', 109, 'CHANDONA BISWASH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '49', '9B109', 'IMG_2902.png', NULL),
(1549, 9, 'Class Nine', 'B', 84, 'PRIYA KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2024-05-06', '0', '0', '0', 'N/A', '50', '9B84', 'IMG_2905.png', NULL),
(1550, 9, 'Class Nine', 'B', 159, 'SHIMA KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '51', '9B159', 'IMG_2907.png', NULL),
(1551, 9, 'Class Nine', 'B', 140, 'SUMAIYA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2008-01-01', '0', '0', '0', 'N/A', '01971137974', '9B140', 'IMG_2908.png', NULL),
(1552, 9, 'Class Nine', 'B', 45, 'MS-NAJMIN', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '53', '9B45', 'IMG_2909.png', NULL),
(1553, 9, 'Class Nine', 'B', 33, 'E HABIBA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '54', '9B33', 'IMG_2910.png', NULL),
(1554, 9, 'Class Nine', 'B', 76, 'MITHILA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '55', '9B76', 'IMG_2911.png', NULL),
(1555, 9, 'Class Nine', 'A', 126, 'TUSAR', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '56', '9A126', 'IMG_2891.png', NULL),
(1556, 9, 'Class Nine', 'A', 25, 'AL MAHMUD MOLLA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '57', '9A25', 'IMG_2892.png', NULL),
(1557, 9, 'Class Nine', 'A', 21, 'SHEIKH MD ABDULLAH AL KORAISHI NIMOGNO', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '58', '9A21', 'IMG_2893.png', NULL),
(1558, 9, 'Class Nine', 'A', 14, 'MD ESMAIL HOSSAIN MOLLA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '59', '9A14', 'IMG_2894.png', NULL),
(1559, 9, 'Class Nine', 'A', 35, 'MD ASHIK SHEIKH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '60', '9A35', 'IMG_2888.png', NULL),
(1560, 9, 'Class Nine', 'A', 77, 'MD: SOHAN MAHMUD', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '61', '9A77', 'IMG_2889.png', NULL),
(1561, 9, 'Class Nine', 'A', 105, 'MD HANJALA MRIDHA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '62', '9A105', 'IMG_2890.png', NULL),
(1562, 10, 'Class Ten', 'Commerce', 24, 'RITU RANI BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '63', '10Commerce24', 'IMG_2974.png', NULL),
(1563, 10, 'Class Ten', 'Arts', 71, 'MOU', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '64', '10Arts71', 'IMG_2971.png', NULL),
(1564, 10, 'Class Ten', 'Arts', 1, 'JOTI BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '66', '10Arts1', 'IMG_2969.png', NULL),
(1565, 10, 'Class Ten', 'Arts', 39, 'MUKTA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '67', '10Arts39', 'IMG_2968.png', NULL),
(1566, 10, 'Class Ten', 'Arts', 44, 'MST EMA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '68', '10Arts44', 'IMG_2967.png', NULL),
(1567, 10, 'Class Ten', 'Arts', 18, 'BOYSHAKHI BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '69', '10Arts18', 'IMG_2966.png', NULL),
(1568, 10, 'Class Ten', 'Commerce', 1, 'DIPTI BISWAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '70', '10Commerce1', 'IMG_2965.png', NULL),
(1569, 10, 'Class Ten', 'Arts', 27, 'PUJA KAR', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '71', '10Arts27', 'IMG_2964.png', NULL),
(1570, 10, 'Class Ten', 'Arts', 58, 'MUNNI KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '72', '10Arts58', 'IMG_2963.png', NULL),
(1571, 10, 'Class Ten', 'Arts', 35, 'MARIAM KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '73', '10Arts35', 'IMG_2962.png', NULL),
(1572, 10, 'Class Ten', 'Arts', 43, 'MST MOHIMONI KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '74', '10Arts43', 'IMG_2961.png', NULL),
(1573, 10, 'Class Ten', 'Arts', 78, 'RUMANA MOLLICK', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '75', '10Arts78', 'IMG_2960.png', NULL),
(1574, 10, 'Class Ten', 'Arts', 53, 'SUMAYA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '76', '10Arts53', 'IMG_2956.png', NULL),
(1575, 10, 'Class Ten', 'Arts', 45, 'SADIA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '77', '10Arts45', 'IMG_2955.png', NULL),
(1576, 10, 'Class Ten', 'Arts', 10, 'SAMIA AKTER RITU', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '78', '10Arts10', 'IMG_2954.png', NULL),
(1577, 10, 'Class Ten', 'Arts', 16, 'SADIA AKTAR TOMA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '79', '10Arts16', 'IMG_2953.png', NULL),
(1578, 10, 'Class Ten', 'Arts', 13, 'SHAKILA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '80', '10Arts13', 'IMG_2952.png', NULL),
(1579, 10, 'Class Ten', 'Commerce', 17, 'MARIYA RAHMAN KEYA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '81', '10Commerce17', 'IMG_2948.png', NULL),
(1580, 10, 'Class Ten', 'Arts', 40, 'ARIFA KHANAM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '82', '10Arts40', 'IMG_2947.png', NULL),
(1581, 10, 'Class Ten', 'Arts', 69, 'LAJINA KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '83', '10Arts69', 'IMG_2946.png', NULL),
(1582, 10, 'Class Ten', 'Arts', 76, 'ASHA MONY KHANOM', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '84', '10Arts76', 'IMG_2945.png', NULL),
(1583, 10, 'Class Ten', 'Commerce', 7, 'EVA MONI', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2024-03-10', '0', '0', '0', 'N/A', '85', '10Commerce7', 'Ten commerce 7.jpg', NULL),
(1584, 10, 'Class Ten', 'Science', 3, 'FARJANA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '86', '10Science3', 'IMG_2995.png', NULL),
(1585, 10, 'Class Ten', 'Commerce', 15, 'MD. RAHIM SHEIKH', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '87', '10Commerce15', 'IMG_2993.png', NULL),
(1586, 10, 'Class Ten', 'Arts', 54, 'S M AMIR HAMZA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '88', '10Arts54', 'IMG_2994.png', NULL),
(1587, 10, 'Class Ten', 'Arts', 82, 'NASRIN KHANAM BORSHA', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '0000-00-00', '0', '0', '0', 'N/A', '89', '10Arts82', 'IMG_2958.png', NULL),
(1588, 9, 'Class Nine', 'B', 44, 'RITHI GHOSH', 'GOUTOM GHOSH', 'ARINA RANI GHOSH', 'রিথি ঘোষ', 'গৌতম ঘোষ', 'এরিনা রানী ঘোষ', 'FEMALE', '2010-08-08', '20102910384103464', '0', '0', 'VILL: TAGARBANDA,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '0', '9B44', 'IMG_0327.png', NULL),
(1589, 9, 'Class Nine', 'B', 154, 'TANJILA KHANAM', 'LATE. AZIBAR  SHEIKH', 'RIHANA BEGUM', 'তানজিলা খানম', 'মৃতমৃ . আজিবর  শেখ', 'রিহানা বেগম', 'FEMALE', '2009-01-01', '20093514381032709', '0', '0', 'GOPALGANJ', '0', '9B154', 'IMG_3124.png', NULL),
(1590, 9, 'Class Nine', 'B', 130, 'LAMIA KHANAM', 'MD: HAFIJUR FAKIR', 'MST: SARNA BEGUM', 'লামিয়া খানম', 'মোঃ হাফিজুরজু ফকির', 'মোছাঃ স্বর্না বেগম', 'FEMALE', '2010-12-18', '20103514381034848', '0', '0', 'VILL: SONKORPASHA,  POST: CHARVATPARA  P.S. KASIANI, DIST:  GOPALGANJ', '01764526037', '9B130', 'IMG_1856.png', NULL),
(1591, 9, 'Class Nine', 'A', 121, 'MD LEMON  MOLLA', 'MD SONA MIA', 'SOMAIYA BEGUM', 'মোঃ লিমন  মোল্লা', 'মোঃসোনা মিয়া', 'সোমাইয়া  বেগম', 'MALE', '2008-08-05', '20083514327029106', '0', '0', 'GOPALGANJ', '0', '9A121', 'IMG_1649.png', NULL),
(1592, 9, 'Class Nine', 'A', 119, 'Tamim Molla', 'রেজাউল মোল্যা', 'সপ্না রেজা', 'তামিম মো্ল্যা', 'রেজাউল মোল্যা', 'সপ্না রেজা', 'MALE', '2007-11-01', '20073534320722627', '0', '0', '', '01700521425', '9A119', 'IMG_1849.jpg', NULL),
(1593, 9, 'Class Nine', 'A', 147, 'MD TAMIM  GAZI', 'LIAKAT GAZI', 'ROZINA  BEGUM', 'মোঃ তামিম  গাজী', 'লিয়াকত গাজী', 'রোজিনা বেগম', 'MALE', '2009-01-01', '20083514381031793', '0', '0', 'GOPALGANJ', '01759532657', '9A147', 'IMG_1654.png', NULL),
(1594, 9, 'Class Nine', 'A', 131, 'MD AHASAN KABIR  SRABON', 'MD NASIR UDDIN', 'AKHI AKTER', 'মোঃ আহসান  কবীর শ্রাবন', 'মোঃ নাসির  উদ্দিন', 'আখি আক্তার', 'MALE', '2008-01-22', '20082910384100350', '0', '0', 'FARIDPUR', '01914337860', '9A131', 'IMG_0049.png', NULL),
(1595, 9, 'Class Nine', 'A', 6, 'AL SAMI', 'SHOEL RANA', 'LIMA KHANAM', 'আল সামি', 'সোহেল  রানা', 'লিমা খানম', 'MALE', '2010-11-25', '20103514327033879', '0', '0', 'GOPALGANJ', '01717607282', '9A6', 'IMG_5911.png', NULL),
(1596, 9, 'Class Nine', 'A', 51, 'সীমান্ত শরীফ', 'শরীফ কায়জার আলী', 'বিউটি বেগম', 'সীমান্ত শরীফ', 'শরীফ কায়জার আলী', 'বিউটি বেগম', 'Male', '2011-04-01', '20113514327028437', '0', '0', '', '01314694418', '9A51', 'IMG_5937.png', NULL),
(1597, 9, 'Class Nine', 'A', 95, 'MD ASIF SHEIKH', 'S M FAYEK', 'MST BOBITA  BEGUM', 'মোঃ আসিফ  শেখ', 'এস এম ফায়েক', 'মোসাঃ ববিতা  বেগম', 'MALE', '2009-01-30', '20093514327029605', '0', '0', 'GOPALGANJ', '01761323144', '9A95', 'IMG_5956.png', NULL),
(1598, 9, 'Class Nine', 'A', 72, 'S.M. AL SADI', 'MD: KAMAL SARDER', 'RUKSHANA KAMAL', 'স, ম, আল সাদী', 'মোঃ কামাল সরদার', 'রুকসান কামাল', 'MALE', '2010-08-18', '20103514381032666', '0', '0', 'VILL: SHANKORPASHA,  POST: CHARBHATPARA  P.S. KASIANI, DIST:  GOPALGANJ', '01797214144', '9A72', 'IMG_0019.png', NULL),
(1599, 9, 'Class Nine', 'A', 158, 'আছিয়া খানম', 'NA', 'NA', 'NA', 'NA', 'NA', 'MALE', '2012-02-17', '0', '0', '0', 'FARIDPUR', '0', '9A158', 'IMG_2520.png', NULL),
(1600, 9, 'Class Nine', 'A', 64, 'CHOYON BISWAS', 'BISHOJIT BISWAS', 'CHINA RANI BISWAS', 'NA', 'NA', 'NA', 'MALE', '2013-06-25', '0', '0', '0', 'Barashur', '0', '9A64', 'Nine A 64.jpg', NULL),
(1601, 9, 'Class Nine', 'A', 155, 'FDS', 'ASF', 'ASDA', 'মোঃ হাসান শিকদার', 'লিটন শিকদার', 'ফাতেমা বেগম', 'MALE', '2011-12-28', '20113514381034172', '0', '0', '', '01933147228', '9A155', 'IMG_2854.png', NULL),
(1602, 10, 'Class Ten', 'Arts', 2, 'HUMAIRA TAHSIN', 'MOHAMMAD GOLAM  MOULA MOLLA', 'ROKEYA SULTANA', 'হুমাইরা তাহসিন', 'মোহাম্মদ গোলাম  মওলা মোল্লা', 'রোকেয়া সুলতানা', 'FEMALE', '2009-05-29', '20093514327029125', '0', '0', 'GOPALGANJ', '0', '10Arts2', 'IMG_0434.png', NULL),
(1603, 10, 'Class Ten', 'Arts', 79, 'JUTHE', 'MD ABUL KHAYER  SHEIKH', 'REHANA BEGUM', 'জুথী জু', 'মোঃ আবুল  খায়ের শেখ', 'রেহানা বেগম', 'FEMALE', '2006-12-18', '20063514381037526', '0', '0', 'GOPALGANJ', '0', '10Arts79', 'IMG_5400.png', NULL),
(1604, 10, 'Class Ten', 'Arts', 26, 'DOHA SIDDIKEY', 'RAKU SIDDIKEY', 'DILRUBA  BEGUM', 'দোহা সিদ্দিকী', 'রাকু সিদ্দিকী', 'দিলরুবা  বেগম', 'FEMALE', '2009-12-23', '20093514327028481', '0', '0', 'GOPALGANJ', '0', '10Arts26', 'IMG_5437.png', NULL),
(1605, 9, 'Class Nine', 'A', 40, 'মিম তাহাব', 'NA', 'na', 'NA', 'NA', 'NA', 'Male', '2011-07-31', '0', '0', '0', 'GOPALGANJ', '0', '9A40', 'IMG_7607.JPG', NULL),
(1606, 10, 'Class Ten', 'Arts', 60, 'CHADNI KHANAM', 'SAHINUR MOLLA', 'REKHA BEGUM', 'চাঁদচাঁনী খানম', 'সাহিনুর মোল্যা', 'রেখা বেগম', 'FEMALE', '2008-05-27', '20086515263007827', '0', '0', 'VILLAGE: CHARBOKJURI,  POST: KAMTHANA P.S.:  LOHAGARA, DISTRICT:  NARAIL.', '0', '10Arts60', 'IMG_5503.png', NULL),
(1607, 10, 'Class Ten', 'Arts', 8, 'MST FARIA  KHANAM', 'MD FARID  SHEIKH', 'SHILPI BEGUM', 'মোসাঃ ফারিয়া  খানম', 'মোঃফরিদ শেখ', 'শিল্পী বেগম', 'FEMALE', '2009-11-09', '20093534327035690', '0', '0', 'GOPALGANJ', '0', '10Arts8', 'IMG_5521.png', NULL),
(1608, 9, 'Class Nine', 'A', 50, 'SHAHARIYA ISLAM', 'NA', 'NA', 'NA', 'NA', 'NA', 'MALE', '2010-12-14', '0', '0', '0', 'BUDHPASHA', '01400985817', '9A50', 'IMG_7605.JPG', NULL),
(1609, 9, 'Class Nine', 'A', 149, 'MAHIA KHANAM', 'SHEIKH RAYSUL  ISLAM', 'MUNNI KHANAM', 'মাহিয়া খানম', 'শেখ রাইসুল  ইসলাম', 'মুন্নী খানম', 'FEMALE', '2011-12-22', '20113514327030791', '0', '0', 'GOPALGANJ', '01758017948', '9A149', 'IMG_2552.png', NULL),
(1610, 10, 'Class Ten', 'Arts', 15, 'BORSHA  KHANAM', 'AFZAL MRIDHA', 'ADORI KHANAM', 'বর্ষা খানম', 'আফজাল  মৃধা মৃ', 'আদরী খানম', 'FEMALE', '2009-06-15', '20033514327028290', '0', '0', 'GOPALGANJ', '0', '10Arts15', 'IMG_5125.png', NULL),
(1611, 10, 'Class Ten', 'Arts', 21, 'RIFAT ISLAM  HEMAL', 'MD KAIZAR  SHEIKH', 'MST SATHE  BEGUM', 'রিফাত ইসলাম  হিমেল', 'মোঃ কাইজার  শেখ', 'মেছাঃ সাথী  বেগম', 'MALE', '2009-07-16', '20093514327027562', '0', '0', 'GOPALGANJ', '0', '10Arts21', 'IMG_4431.png', NULL),
(1612, 10, 'Class Ten', 'Arts', 20, 'MD. RAFIUL ISLAM  RIMON', 'MD. NAJMUL SHEIKH', 'ITI BEGOM', 'মোঃ রাফিউল ইসলাম  রিমন', 'মোঃ নাজমুল শেখ', 'ইতি বেগম', 'MALE', '2008-07-24', '20083514327030628', '0', '0', 'VILL-BORASHUR,POSTVATIAPARA THANAKASIANI,DISTGOPALGANJ', '0', '10Arts20', 'IMG_4409.png', NULL),
(1613, 9, 'Class Nine', 'A', 86, 'মিস বাউল ইসলাম', 'NA', 'NA', 'NA', 'NA', 'NA', 'MALE', '2007-12-02', '0', '0', '0', 'GOPALGANJ', '01720648899', '9A86', 'IMG_7606.JPG', NULL),
(1614, 10, 'Class Ten', 'Arts', 52, 'MD NAZIM MOLLA', 'MD SHAFIQUL  ISLAM', 'DOLENA BEGUM', 'মোঃ নাজিম  মোল্যা', 'মোঃ শফিকুল  ইছলাম', 'দোলেনা বেগম', 'MALE', '2008-09-25', '20083514327029498', '0', '0', 'GOPALGANJ', '0', '10Arts52', 'IMG_4449.png', NULL),
(1615, 10, 'Class Ten', 'Arts', 70, 'MD TANVIR SHEIKH  RABBI', 'MD EMON SHEK', 'MST SHILA BEGUM', 'মো: তানভির  শেখ রাব্বী', 'মো: ইমন শেখ', 'মোসাঃ শিলা  বেগম', 'MALE', '2008-11-30', '20086515263009038', '0', '0', 'NARAIL', '0', '10Arts70', 'IMG_4530.png', NULL),
(1616, 10, 'Class Ten', 'Arts', 64, 'TAMIM SHEIKH', 'RABIUL  SHEIKH', 'POLI BEGUM', 'তামিম শেখ', 'রবিউল  শেখ', 'পলি বেগম', 'MALE', '2010-02-02', '20103514381038507', '0', '0', 'GOPALGANJ', '0', '10Arts64', 'IMG_4612.png', NULL),
(1617, 10, 'Class Ten', 'Arts', 59, 'MD. TAWHID SHEIKH', 'MD. RIPON SHEIKH', 'SHILPI BEGUM', 'মোঃ তাওহীদ শেখ', 'মোঃ রিপন শেখ', 'শিল্পী বেগম', 'MALE', '2009-01-01', '20093514381032468', '0', '0', 'VILL: CHARVATPARA,  POST: CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '0', '10Arts59', 'IMG_4651.png', NULL),
(1618, 10, 'Class Ten', 'Arts', 47, 'HAMIM SHEIKH', 'MD MIZANUR SHEAK', 'SHURAIYA BEGUM', 'হামিম শেখ', 'মোঃমিজানুর শেখ', 'সুরাইয়া বেগম', 'MALE', '2009-03-02', '20092910384103462', '0', '0', 'VILL: KRISHNOPUR,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '0', '10Arts47', 'IMG_4710.png', NULL),
(1619, 10, 'Class Ten', 'Arts', 68, 'MD TAMIM MOLLA', 'LUTHFAR RAHAMAN  MOLLA', 'NADIRA BEGUM', 'মোঃ তামিম  মোল্যা', 'লুৎফর রহমান  মোল্লা', 'নাদিরা বেগম', 'MALE', '2008-11-10', '20083534327038780', '0', '0', 'GOPALGANJ', '01770050271', '10Arts68', 'IMG_4729.png', NULL),
(1620, 10, 'Class Ten', 'Arts', 63, 'MD SIAM MOLLA', 'MD ARMAN  MOLLA', 'MST SATHE  KHANAM', 'মোঃ সিয়াম  মোল্যা', 'মোঃ আরমান  মোল্যা', 'মোছাঃ সাথী  খানম', 'MALE', '2009-02-10', '20093534327039863', '0', '0', 'ganjlemukudopur', '01934085545', '10Arts63', 'IMG_4755.png', NULL),
(1621, 10, 'Class Ten', 'Arts', 72, 'MD MUSFIK  MOLLA', 'ISAQ MOLLA', 'MST KAJAL  BEGUM', 'মোঃ মুশফিক  মোল্লা', 'ইসাক মোল্যা', 'মোসাঃ কাজল  বেগম', 'MALE', '2009-02-07', '20093514327031411', '0', '0', 'GOPALGANJ', '0', '10Arts72', 'IMG_4812.png', NULL),
(1622, 10, 'Class Ten', 'Arts', 50, 'MST SONIYA  KHANUM', 'MD MOHIDDIN  MOLLA', 'MST AMANA  BEGUM', 'মোসা: সোনিয়া  খানম', 'মোঃ মহিউদ্দীন  মোল্যা', 'মোসাঃ আমেনা  বেগম', 'FEMALE', '2008-06-18', '20086515263008214', '0', '0', 'NARAIL', '0', '10Arts50', 'IMG_0527.png', NULL),
(1623, 10, 'Class Ten', 'Arts', 88, 'SWARNA  AKTER', 'JEWEL MOLLA', 'RAHIMA  BEGUM', 'স্বর্না আক্তার', 'জুয়েজু ল  মোল্যা', 'রহিমা বেগম', 'FEMALE', '2009-06-13', '20093534327039558', '0', '0', 'GOPALGANJ', '0', '10Arts88', 'IMG_0506.png', NULL),
(1624, 10, 'Class Ten', 'Arts', 22, 'SANJIDA AKTER', 'SAYKAT SIKDER', 'SAPIYA BEGUM', 'সানজিদা আক্তার', 'সৌকত শিকদার', 'সাপিয়া বেগম', 'FEMALE', '2009-01-01', '20093514381032641', '0', '0', 'VILL: SHANKARPASA,  POST. CHARVATPARA  P.S KASIANI, DIST.  GOPALGANJ', '0', '10Arts22', 'IMG_0254.png', NULL),
(1625, 10, 'Class Ten', 'Arts', 48, 'KHADIZATUL KOBRA', 'ENAET HOSSAIN', 'NILUFA BEGUM', 'খাদিজাতুল কোবরা', 'এনায়েত হোসেন', 'নিলুফা বেগম', 'FEMALE', '2009-01-10', '20093514381032685', '0', '0', 'VILL: SHANKARPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '0', '10Arts48', 'IMG_0234.png', NULL),
(1626, 10, 'Class Ten', 'Arts', 81, 'RUME KHANAM', 'MD RAJJAK  SHEIKH', 'REKHA BEGUM', 'রুমি খানম', 'মো রাজ্জাক  শেখ', 'রেখা বেগম', 'FEMALE', '2007-09-20', '20076515263012337', '0', '0', 'NARAIL', '0', '10Arts81', 'IMG_5704.png', NULL),
(1627, 10, 'Class Ten', 'Arts', 19, 'MST SUMAIA  KHANAM', 'MD BARKOT  SHEIKH', 'MST HASINA  BEGUM', 'মোসাঃ সুমাইয়া  খানম', 'মোঃ বরকত শেখ', 'মোছাঃ হাচিনা  বেগম', 'FEMALE', '2006-01-02', '20063534327036954', '0', '0', 'GOPALGANJ', '0', '10Arts19', 'IMG_5733.png', NULL),
(1628, 10, 'Class Ten', 'Arts', 90, 'MD SAKIL  CHOWDHURY', 'MD OLIUR  CHOWDHURY', 'RANI BEGUM', 'মোঃ সাকিল  চৌধুরী', 'মোঃ অলিয়ার  চৌধুরী', 'রানী বেগম', 'MALE', '2005-03-13', '20053534327038491', '0', '0', 'GOPALGANJ', '0', '10Arts90', 'IMG_5808.png', NULL),
(1629, 10, 'Class Ten', 'Arts', 11, 'Efad Sharif', 'NA', 'NA', 'NA', 'NA', 'NA', 'Male', '2009-09-23', '0', '0', '0', 'Barashur', '01721091759', '10Arts11', 'IMG_7609.JPG', NULL),
(1630, 10, 'Class Ten', 'Science', 1, 'MONISHA PALIT', 'MUKUL PALIT', 'BOISHAKHI PALIT', 'মনিষা পালিত', 'মুকুল পালিত', 'বৈশাখী পালিত', 'FEMALE', '2008-09-01', '20083514327033391', '0', '0', 'VILL: BORASHUR,POST:  VATIAPARA P/S:  KASHIANI,DIST:  GOPALGANJ', '01912871532', '10Science1', 'IMG_5540.png', NULL),
(1631, 10, 'Class Ten', 'Commerce', 23, 'JIT RAI', 'SHAPON', 'BITHEKA', 'জিৎ রায়', 'স্বপন কুমার রায়', 'বিথিকা রায়', 'MALE', '2010-10-28', '20103514327033889', '0', '0', 'JONGOLMUKONDOPUR', '01952942978', '10Commerce23', 'IMG_4631.png', NULL),
(1632, 10, 'Class Ten', 'Commerce', 4, 'MD MILON  SHARIF', 'MONTU SHARIF', 'SUFIYA BEGUM', 'মোঃ মিলন  শরীফ', 'মন্টু শরীফ', 'সুফিয়া বেগম', 'MALE', '2009-04-27', '20093534327037652', '0', '0', 'GOPALGANJ', '01916411494', '10Commerce4', 'IMG_4906.png', NULL);
INSERT INTO `student` (`id`, `classnumber`, `classname`, `secgroup`, `roll`, `name`, `fname`, `mname`, `nameb`, `fnameb`, `mnameb`, `sex`, `dob`, `birthid`, `fnid`, `mnid`, `address`, `mobile`, `uniqid`, `imgname`, `brisqr`) VALUES
(1633, 10, 'Class Ten', 'Commerce', 26, 'MD HAMIM MOLLA', 'MD HABIBUR  RAHMAN MOLLA', 'MST NARGIS BEGUM', 'মোঃ হামিম মোল্যা', 'মোঃ হাবিবুর  রহমান মোল্যা', 'মোছাঃ নারগীস  বেগম', 'MALE', '2007-02-04', '20073534327035782', '0', '0', 'GOPALGANJ', '01710693014', '10Commerce26', 'IMG_4923.png', NULL),
(1634, 10, 'Class Ten', 'Commerce', 10, 'SAVIHA AKTER  SHITI', 'ABDUS SAMAD  MOLLA', 'MST AKHI BEGUM', 'সাবিহা আক্তার  শিতি', 'আঃ ছামাদ  মোল্লা', 'মোসাঃ আখিঁ  বেগম', 'FEMALE', '2009-11-11', '20093534327040194', '0', '0', 'GOPALGANJ', '01784756313', '10Commerce10', 'IMG_0414.png', NULL),
(1635, 10, 'Class Ten', 'Commerce', 13, 'SHANTA ROY', 'CHITTA RANJON  ROY', 'BITHIKA RANI ROY', 'শান্তা রায়', 'চিত্ত রঞ্জন রায়', 'বিথীকা রানী  রায়', 'FEMALE', '2008-12-01', '20083534327037539', '0', '0', 'GOPALGANJ', '01318585569', '10Commerce13', 'IMG_5646.png', NULL),
(1636, 10, 'Class Ten', 'Commerce', 21, 'SANJIDA AKTER  ANTORA', 'MD KASHAD  SHAIKE', 'MST HOSNAARA  BEGUM', 'সানজিদা আক্তার  অন্তরা', 'মোঃকাছেদ শেখ', 'মোছাঃ  হোসনেয়ারা বেগম', 'FEMALE', '2009-09-23', '20093514327033867', '0', '0', 'GOPALGANJ', '01757936007', '10Commerce21', 'IMG_5242.png', NULL),
(1637, 10, 'Class Ten', 'Commerce', 29, 'MD EMON  SHEIKH', 'MD EMAMUL  SHEK', 'MST POLY  BEGUM', 'মোঃ ইমন শেখ', 'মোঃ ইমামুল  শেখ', 'মোসাঃ পলি  বেগম', 'MALE', '2010-11-23', '20102910384103427', '0', '0', 'FARIDPUR', '0', '10Commerce29', 'IMG_0156.png', NULL),
(1638, 8, 'Class Eight', 'A', 74, 'MD EMON  SHEIKH', 'MD EMAMUL  SHEK', 'MST POLY  BEGUM', 'মোঃ ইমন শেখ', 'মোঃ ইমামুল  শেখ', 'মোসাঃ পলি  বেগম', 'MALE', '2010-11-23', '20102910384103427', '0', '0', 'FARIDPUR', '0', '8A74', 'IMG_0156.png', NULL),
(1639, 8, 'Class Eight', 'A', 159, 'MOIN SHEIKH', 'MONA MIA SHEIKH', 'MST LOTHIFA BEGUM', 'মইন শেখ', 'মনা মিয়া শেখ', 'মোসাঃ লতিফা বেগম', 'MALE', '2010-01-01', '20102910384103489', '0', '0', 'VILL: KRISHNOPUR,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '01915137219', '8A159', 'IMG_0135.png', NULL),
(1640, 8, 'Class Eight', 'A', 162, 'MD SAJID RANA', 'MD ARROZ ALI', 'MST CHADIA  BEGUM', 'মো:সাজিত রানা', 'মো আরজ আলী', 'মোসাঃ ছাদিয়া  বেগম', 'MALE', '2009-01-01', '20096515263009058', '0', '0', 'NARAIL', '01992731610', '8A162', 'IMG_0831.png', NULL),
(1641, 8, 'Class Eight', 'A', 143, 'MD. SIYAM HOSSAIN  SIKDER', 'MOSARAF SIKDER', 'SARMIN AKTER JULIA', 'মোঃ সিয়াম হোসেন  শিকদার', 'মোশারফ শিকদার', 'শারমিন আক্তার জু্লিজু্ য়া', 'MALE', '2011-07-21', '20113514381032514', '0', '0', 'VILL: SHANKARPASA,  POST. CHARVATPARA  P.S. KASIANI, DIST.  GOPALGANJ', '01721100703', '8A143', 'IMG_0908.png', NULL),
(1642, 8, 'Class Eight', 'A', 97, 'SAPOAN SHAHIR', 'MD SHADAT  HOSSAIN', 'NIPA BEGUM', 'সাপোয়ান শাহীর', 'মোঃ শাহাদত  হোসেন', 'নিপা বেগম', 'MALE', '2012-02-12', '20122910384113411', '0', '0', 'FARIDPUR', '01938142264', '8A97', 'IMG_0726.png', NULL),
(1643, 8, 'Class Eight', 'A', 33, 'MAHIM SHIKDER', 'PALTO SHIKDER', 'MOMOTAZ KHANOM', 'মাহিম  সিকদার', 'পালট  সিকদার', 'মমতাজ  খানম', 'MALE', '2010-09-14', '20102692513235093', '0', '0', '3/D, 981/1, MONIPUR,  MIRPUR, DHAKA-1216.', '01717171613', '8A33', 'IMG_0929.png', NULL),
(1644, 8, 'Class Eight', 'A', 52, 'MD MAHEDUL  ISLAM', 'MD MASUD RANA', 'MST RUNA LAILA', 'মোঃ মাহিদুল  ইসলাম', 'মোঃ মাসুদ রানা', 'মোসাঃ রুনা  লায়লা', 'MALE', '2010-03-03', '20102910384104361', '0', '0', 'FARIDPUR', '01753890574', '8A52', 'IMG_1054.png', NULL),
(1645, 8, 'Class Eight', 'A', 166, 'ESHAN SHEIKH', 'ESKENDER  SHEIKH', 'ALAYA BEGUM', 'ঈশান শেখ', 'এসকেন্দার  শেখ', 'আলেয়া বেগম', 'MALE', '2011-01-01', '20113514381032948', '0', '0', 'GOPALGANJ', '01724965512', '8A166', 'IMG_1111.png', NULL),
(1646, 8, 'Class Eight', 'A', 151, 'MD. NAHID HASAN', 'MD SEKENDAR  MOLLA', 'MAJADA BEGUM', 'মোঃ নাহিদ  হাচান', 'মো সেকেন্দার  মোল্যা', 'মাজেদা বেগম', 'MALE', '2011-04-03', '20116515263010279', '0', '0', 'NARAIL', '019525518610', '8A151', 'IMG_1146.png', NULL),
(1647, 8, 'Class Eight', 'A', 37, 'MD. SALMAN SHEIKH', 'PALASH SHEIKH', 'SUMI BEGUM', 'মোঃ সালমান শেখ', 'পলাশ শেখ', 'সুমি বেগম', 'MALE', '2011-04-03', '20112910384104813', '0', '0', 'VILL: KRISHNOPUR,  UNION: 04 NO  TAGARBANDA, UPAZILA:  ALFADANGA, DIST:  FARIDPUR.', '01406677140', '8A37', 'IMG_1353.png', NULL),
(1648, 8, 'Class Eight', 'A', 113, 'MD ARIF MOLLA', 'MD ABZAL MOLLA', 'MST NASIMA  BEGUM', 'মোঃ আরিফ  মোল্যা', 'মোঃ আবজাল  মোল্যা', 'মোছাঃ নাছিমা  বেগম', 'MALE', '2010-01-15', '20103514327029009', '0', '0', 'GOPALGANJ', '01790926366', '8A113', 'IMG_1031.png', NULL),
(1649, 8, 'Class Eight', 'A', 142, 'MD ANTOR  SHEIKH', 'MD SABU SHEIKH', 'AKHI KHATUN', 'মোঃঅন্তর  শেখ', 'মোঃসাবুশেখ', 'আখি খাতুন', 'MALE', '2011-10-11', '20113514327033914', '0', '0', 'GOPALGANJ', '01317055702', '8A142', 'IMG_1130.png', NULL),
(1650, 8, 'Class Eight', 'A', 150, 'SAGOR MOLLA', 'JALAL MOLLA', 'REHANA  BEGUM', 'সাগর মোল্লা', 'জালাল  মোল্লা', 'রেহানা  বেগম', 'MALE', '2009-06-02', '20093514327033358', '0', '0', 'GOPALGANJ', '0', '8A150', 'IMG_1226.png', NULL),
(1651, 8, 'Class Eight', 'A', 87, 'MD HABIBUR  RAHAMAN SHEIKH', 'MD AZGAR ALI  SHEIKH', 'MST ZUBAYDA  BEGUM', 'মোঃ হাবিবুর  রহমান শেখ', 'মোঃ আজগর  আলী শেখ', 'মোছাঃ জোবায়দা  বেগম', 'MALE', '2010-01-01', '20103534327042571', '0', '0', 'GOPALGANJ', '01937278929', '8A87', 'IMG_1209.png', NULL),
(1652, 8, 'Class Eight', 'B', 114, 'SAMIA  KHANAM', 'BABU MOLLA', 'PARVIN  BEGUM', 'ছামিয়া খানম', 'বাবুমোল্যা', 'পারভীন  বেগম', 'FEMALE', '2010-06-04', '20102910384103475', '0', '0', 'FARIDPUR', '01921272193', '8B114', 'IMG_0728.png', NULL),
(1653, 8, 'Class Eight', 'B', 38, 'MUKTA KHANAM', 'MD BARKOT  SHEIKH', 'HASINA BEGUM', 'মুক্তা খানম', 'মোঃবরকত  শেখ', 'হাচিনা বেগম', 'FEMALE', '2010-01-14', '20103514327032870', '0', '0', 'GOPALGANJ', '01927802556', '8B38', 'IMG_0701.png', NULL),
(1654, 8, 'Class Eight', 'B', 130, 'SHRABONI  KHANAM', 'SHOHIDUL MOLLA', 'LEPE BEGUM', 'শ্রাবনী খানম', 'সহিদুল  মোল্যা', 'লিপি বেগম', 'FEMALE', '2010-12-25', '20103514327033596', '0', '0', 'GOPALGANJ', '01781364990', '8B130', 'IMG_0812.png', NULL),
(1655, 8, 'Class Eight', 'B', 21, 'CHADNI KHANOM', 'MD. MONJU  SHEIKH', 'RAHIMA BEGUM', 'চাঁদচাঁনী খানম', 'মোঃ মনজু  শেখ', 'রহিমা বেগম', 'FEMALE', '2009-10-26', '20092910384103435', '0', '0', 'FARIDPUR', '01963261305', '8B21', 'IMG_0755.png', NULL),
(1656, 8, 'Class Eight', 'B', 3, 'AYESHA KHANAM', 'ANISHUR RAHMAN  MUNSHI', 'SABINA KHANAM', 'আয়েশা খানম', 'আনিসুর রহমান  মুন্সী', 'ছাবিনা খানম', 'FEMALE', '2010-05-10', '20103514381033258', '0', '0', 'GOPALGANJ', '01716672314', '8B3', 'IMG_0902.png', NULL),
(1657, 8, 'Class Eight', 'B', 133, 'AKHI KHANAM', 'MD ALAM  BISWAS', 'MST SUMI  BEGUM', 'আখি খানম', 'মোঃ আলম  বিশ্বাস', 'মোসাঃ সুমি  বেগম', 'FEMALE', '2010-02-02', '20103514327031139', '0', '0', 'GOPALGANJ', '01790028818', '8B133', 'IMG_20240210_0034.jpg', NULL),
(1658, 8, 'Class Eight', 'B', 109, 'SADIA AKTER  TISHA', 'MD FIROJ SHEIKH', 'MST JUNAKY', 'সাদিয়া আক্তার  তিশা', 'মোঃ ফিরোজ  শেখ', 'মোছাঃ জোনাকি', 'FEMALE', '2009-08-15', '20093514327030421', '0', '0', 'GOPALGANJ', '01733776751', '8B109', 'IMG_0942.png', NULL),
(1659, 8, 'Class Eight', 'B', 154, 'SHUMAIYA KHANOM', 'SHAH ALAM BISWAS', 'RINA BEGUM', 'সুমাইয়া খানম', 'শাহ আলম বিশ্বাস', 'রিনা বেগম', 'FEMALE', '2009-04-13', '20093514381036583', '0', '0', 'VILL:SHANGKORPASHA,POST:CHARBHATPARA  P/S:KASHIANI,DIST:GOPALGANJ', '01306413608', '8B154', 'IMG_0611.png', NULL),
(1660, 7, 'Class Seven', 'A', 12, 'MD RAKIBUL ISLAM  MOLLA', 'MD TOTOL MOLLA', 'MST FEROJA  BEGUM', 'মোঃরাকিবুল  ইসলাম মোল্লা', 'মোঃ টুটুল মোল্যা', 'মোছাঃ ফিরোজা  বেগম', 'MALE', '2010-05-10', '20103514327032597', '0', '0', 'GOPALGANJ', '01915664720', '7A12', 'IMG_3501.png', NULL),
(1661, 7, 'Class Seven', 'B', 22, 'SAHANARA  KHANAM', 'KANCHON KHA', 'RAHIMA KHANAM', 'শাহানারা  খানম', 'কাঞ্চন খাঁ', 'রহিমা খানম', 'FEMALE', '2011-07-31', '20113514381034367', '0', '0', 'GOPALGANJ', '01733235401', '7B22', '6IMG_2724 copy.jpg', NULL),
(1662, 7, 'Class Seven', 'A', 29, 'MD SALMAN  SHAKE', 'MD KALON  SHAKE', 'MST PARVIN  BEGUM', 'মোঃ সালমান  শেখ', 'মোঃ কালন শেখ', 'মোছাঃ পারভীন  বেগম', 'MALE', '2010-12-14', '20103514327028500', '0', '0', 'GOPALGANJ', '01754258307', '7A29', 'six sapal29 copy.jpg', NULL),
(1663, 7, 'Class Seven', 'B', 44, 'MAHIA KHANAM', 'SHEIKH RAYSUL  ISLAM', 'MUNNI KHANAM', 'মাহিয়া খানম', 'শেখ রাইসুল  ইসলাম', 'মুন্নী খানম', 'FEMALE', '2011-12-22', '20113514327030791', '0', '0', 'GOPALGANJ', '01758017948', '7B44', 'cIMG_2552.png', NULL),
(1664, 7, 'Class Seven', 'A', 97, 'মোঃ হাসান শিকদার', 'ASF', 'ASDA', 'মোঃ হাসান শিকদার', 'লিটন শিকদার', 'ফাতেমা বেগম', 'Male', '2011-12-28', '20113514381034172', '0', '0', '', '01933147228', '7A97', 'IMG_2854.png', NULL),
(1665, 7, 'Class Seven', 'A', 94, 'NAZMUS SAKIB', 'LIAKAT  HOSSAIN', 'NAZMA BEGUM', 'নাজমুস সাকিব', 'লিয়াকত  হোসেন', 'নাজমা বেগম', 'Male', '2013-06-25', '20133514381041596', '0', '0', 'GOPALGANJ', '01723131500', '7A94', 'IMG_5305.png', NULL),
(1666, 7, 'Class Seven', 'A', 145, 'ILMA KHANOM', 'PARVEJ SHEIKH', 'MARIJA KHANOM', 'ইলমা খানম', 'পারভেজ শেখ', 'মারিজা খানম', 'Male', '2010-04-10', '20103514327031699', '0', '0', 'VILL:  JUNGLEMUKUNDPUR,POST:  VATIAPARA P.S:  KASHIANI,DIST:  GOPALGANJ', '01710270548', '7A145', 'IMG_5143.png', NULL),
(1667, 7, 'Class Seven', 'A', 107, 'MD MAHIR  MOLLA', 'MD JAMAL  MOLLA', 'MONIRA BEGUM', 'মোঃ মাহির  মোল্যা', 'মোঃ জামাল  মোল্যা', 'মনিরা বেগম', 'Male', '2012-02-17', '20122910384105107', '0', '0', 'FARIDPUR', '01950040282', '7A107', 'IMG_2520.png', NULL),
(1668, 7, 'Class Seven', 'B', 34, 'AISHA KHANAM', 'IMDADUL HAQUE', 'RESHMA  KHANAM', 'আয়শা  খানম', 'ইমদাদুলদু হক', 'রেশমা  খানম', 'FEMALE', '2010-11-21', '20103514327034321', '0', '0', 'GOPALGANJ', '01705688263', '7B34', 'IMG_3072.png', NULL),
(1669, 7, 'Class Seven', 'B', 112, 'RIYA', 'MD JAMAL  MOLLA', 'PARVIN BEGUM', 'রিয়া', 'মোঃ জামাল  মোল্যা', 'পারভীন বেগম', 'FEMALE', '2011-06-12', '20113514327035083', '0', '0', 'GOPALGANJ', '01719448513', '7B112', 'IMG_20230520_0001.jpg', NULL),
(1670, 7, 'Class Seven', 'B', 137, 'ISRAT JAHAN', 'MD MZANUR  RAHMAN', 'AFROZA BEGUM', 'ইশরাত জাহান', 'মোঃ মিজানুরনু  রহমান', 'আফরোজা খানম', 'FEMALE', '2011-03-12', '20113534327040251', '0', '0', 'GOPALGANJ', '01779653320', '7B137', 'IMG_3069.png', NULL),
(1671, 10, 'Class Ten', 'Commerce', 28, 'MD MAINUDDIN  SARDAR', 'MD MOSHARAF  HOSSAIN', 'PARVIN BEGUM', 'মোঃমাঈনুদ্দিনু ন  সরদার', 'মোঃ মোশারফ  সরদার', 'পারভীন বেগম', 'MALE', '2009-05-10', '20093534327036068', '0', '0', 'GOPALGANJ', '0', '10Commerce28', 'IMG_3073.png', NULL),
(1672, 8, 'Class Eight', 'B', 112, 'MONIKA BISWAS', 'MONIKRISNO  BISWAS', 'PINKI BISWAS', 'মনিকা বিশ্বাস', 'মনিকৃষ্ণ  বিশ্বাস', 'পিংকি বিশ্বাস', 'FEMALE', '2012-09-04', '20122910384101539', '0', '0', 'FARIDPUR', '01710850388', '8B112', 'IMG_2933.png', NULL),
(1673, 7, 'Class Seven', 'B', 37, 'MST TANZILA  KHANAM', 'MD YEASIM  MOLLA', 'RUMA  KHANOM', 'মোসাঃ তানজিলা খানম', 'মোঃ  ইয়াসীন  মোল্লা', 'রুমা খানম', 'FEMALE', '1970-01-01', '2011', '0', '0', 'GOPALGANJ', '01921885714', '7B37', 'IMG_2576.png', NULL),
(1674, 10, 'Class Ten', 'Arts', 61, 'Ashik Molla', 'lablu', 'raksona', 'আশিক মোল্যা', 'লাবলু মোল্যা', 'রেকসোনা বেগম', 'Male', '2008-10-01', '20083514327034148', '0', '0', 'Not Avliable', '01967544730', '10Arts61', 'IMG_3802.png', NULL),
(1675, 8, 'Class Eight', 'B', 95, 'SADIA KHANAM', 'MD WAHIDUL FAKIR', 'SHAZADA BEGUM', 'ছাদিয়া খানম', 'মোঃ ওহিদুল ফকির', 'সাজেদা বেগম', 'Female', '2010-01-01', '20103514381038257', '0', '0', 'Not Avliable', '01728820838', '8B95', 'IMG_3778.png', NULL),
(1676, 8, 'Class Eight', 'A', 90, 'MD ASIKUR SARDAR', 'RAKIBUL SARDAR', 'AFROJA BEGUM', 'মোঃআশিকুর সরদার', 'রাকিবুল সরদার', 'আফরোজা বেগম', 'Male', '2009-09-28', '20093534327037726', '0', '0', 'Not Avliable', '01777963134', '8A90', 'IMG_3788.png', NULL),
(1677, 9, 'Class Nine', 'A', 32, 'SABID HASAN', 'HASSAN BASHIR NILU', 'SHABANA NOOR', 'সাবিদ হাসান', 'হাসান বশীর নীলু', 'শাবানা নুর', 'Male', '2010-12-10', '20103514388025012', '0', '0', 'Not Avliable', '01712336776', '9A32', 'IMG_3791.png', NULL),
(1678, 8, 'Class Eight', 'B', 153, 'MASURA KHANAM', 'MOFIZ KAZI', 'KHADIZA BEGUM', 'মাছুরা খানম', 'মফিজ কাজী', 'খাদিজা বেগম', 'Female', '2007-07-30', '20072910384103469', '0', '0', 'Not Avliable', '01962058005', '8B153', 'IMG_3771.png', NULL),
(1679, 7, 'Class Seven', 'A', 4, 'RAIHAN SHEIKH', 'MD ROFIKUL SHEIKH', 'MST KAKOLI BEGUM', 'রাইহান শেখ', 'মোঃ রফিকুল শেখ', 'মোছাঃ কাকলি বেগম', 'Male', '2010-11-07', '20103514327031164', '0', '0', 'Not Avliable', '01782498190', '7A4', 'RAMDIA__0013.jpg', NULL),
(1680, 8, 'Class Eight', 'B', 100, 'BANNA KHANAM', 'ADIL FOKER', 'JASMIN BAGUM', 'বন্না খানম', 'আদিল ফকির', 'জেসমিন বেগম', 'Female', '2011-04-18', '20113514327031084', '0', '0', 'Not Avliable', '01705154434', '8B100', 'IMG_3776.png', NULL),
(1681, 8, 'Class Eight', 'B', 84, 'OISHE BISWAS', 'RANJIT BISWAS', 'VULU RANI BISWAS', 'ঐশী বিশ্বাস', 'রনজীত বিশ্বাস', 'ভুলু রানী বিশ্বাস', 'Female', '2010-08-20', '20103514327027610', '0', '0', 'Not Avliable', '01930419427', '8B84', 'IMG_3774.png', NULL),
(1682, 8, 'Class Eight', 'B', 141, 'Protiva Biswas', 'Swopon Biswas', 'Aroti Biswas', 'প্রতিভা বিশ্বাস', 'স্বপন বিশ্বাস', 'আরতি বিশ্বাস', 'Female', '2011-01-25', '20113514327031087', '0', '0', 'Not Avliable', '0', '8B141', 'IMG_3773.png', NULL),
(1683, 9, 'Class Nine', 'B', 143, 'SURAIYA AFRIN TISA', 'NAZRUL ISLAM', 'SHIKHA BEGUM', 'সুরাইয়া আফরিন তিষা', 'নজরুল ইসলাম', 'শিখা বেগম', 'Female', '2007-07-02', '20073514381011709', '0', '0', 'Not Avliable', '01728683710', '9B143', 'IMG_3772.png', NULL),
(1684, 7, 'Class Seven', 'A', 105, 'MD FAHIM SHEIKH', 'SAKIB HOSSEN', 'MST FAHIMA BEGUM', 'মোঃ ফাহিম শেখ', 'সাকিব হোসেন', 'মোছাঃ ফাহিমা বেগম', 'Male', '2012-11-02', '20123514327035117', '0', '0', 'Not Avliable', '01967113763', '7A105', 'IMG_3769.png', NULL),
(1685, 9, 'Class Nine', 'A', 78, 'MD MEHEDI HASAN', 'MD FARID KHAN', 'KOMELA BEGUM', 'মো:  মেহেদী হাসান', 'মো: ফরিদখান', 'কোমেলা বেগম', 'Male', '2007-12-08', '20073514327027898', '0', '0', 'Not Avliable', '01952281434', '9A78', 'IMG_3805.png', NULL),
(1686, 10, 'Class Ten', 'Arts', 29, 'Tamim Sheikh', 'No Data ON BRIS BD', 'No Data ON BRIS BD', 'তামিম শেখ', 'রেজাউল করীম', 'শাবানা বেগম', 'Male', '2008-11-10', '20083534327204775', '0', '0', 'Not Avliable', '01938487890', '10Arts29', 'IMG_3804.png', NULL),
(1687, 10, 'Class Ten', 'Commerce', 22, 'Durjoy Sarkar', 'dab', 'shujata', 'দূর্জয় সরকার', 'দেব কুমার সরকার', 'সুজাতা সরকার', 'Male', '2009-10-14', '20093514327034408', '0', '0', 'Not Avliable', '01915900692', '10Commerce22', 'IMG_3803.png', NULL),
(1688, 10, 'Class Ten', 'Arts', 30, 'MD.SHAKIB SHEIKH', 'MD,HEMAYET SHEIKH', 'MST.SEFALI BEGUM', 'মোঃশাকিব শেখ', 'মোঃহিমায়েত শেখ', 'মোছাঃশেফালী বেগম', 'MALE', '2010-01-01', '20103514327030122', '0', '0', 'Not Avliable', '01950363961', '10Arts30', 'IMG_3801.png', NULL),
(1689, 8, 'Class Eight', 'B', 16, 'ARIFA KHANAM', 'MD AHAD SHEIKH', 'MST KHURSIDA BEGUM', 'আরিফা খানম', 'মোঃ আহাদ শেখ', 'মোসাঃ খুরশিদা বেগম', 'FEMALE', '2011-01-01', '20112910384103725', '0', '0', 'Not Avliable', '01718944916', '8B16', 'IMG_3777.png', NULL),
(1690, 10, 'Class Ten', 'Arts', 51, 'Ela Tabjida', 'asdfsad', 'asdfasdf', 'ইলাতাবজীদা', 'এ্স এম ইমদাদুল হক', 'ফারজানা হক', 'FEMALE', '2008-05-08', '20083513256021454', '0', '0', 'Not Avliable', '01922012052', '10Arts51', 'IMG_3799.png', NULL),
(1691, 10, 'Class Ten', 'Arts', 31, 'TAMALIKA GHOSH', 'SWAPAN GHOSH', 'MITU RANI GHOSH', 'তমালিকা ঘোষ', 'স্বপন ঘোষ', 'মিটু রানী ঘোষ', 'FEMALE', '2009-06-03', '20092910384105694', '0', '0', 'Not Avliable', '01965177617', '10Arts31', 'IMG_3798.png', NULL),
(1692, 10, 'Class Ten', 'Arts', 56, 'MAZHARUL SHEIKH', 'MD EUSUP SHEIKH', 'JAMILA BEGUM', 'মাজহারুল শেখ', 'মোঃ ইউসুফ শেখ', 'জামিলা  বেগম', 'MALE', '2005-02-03', '20053534327039889', '0', '0', 'Barashur', '01932389310', '10Arts56', 'IMG_3797.png', NULL),
(1693, 10, 'Class Ten', 'Arts', 37, 'YEASIN SHEIKH', 'MD MANWAR SHAIKH', 'HERA BEGUM', 'ইয়াছিন শেখ', 'মোঃ মানোয়ার শেখ', 'হিরা বেগম', 'MALE', '2007-04-15', '20073534327002571', '0', '0', 'Not Avliable', '01987633211', '10Arts37', 'IMG_3795.png', NULL),
(1694, 10, 'Class Ten', 'Science', 6, 'Fahad al Basir', 'm-niamul', 'um asma', 'মোঃ ফাহাদ আল বাসির', 'মোঃ নিয়ামুল হক মৃধা', 'উম্মে আছমা', 'MALE', '2010-02-01', '20103514327029651', '0', '0', 'Not Avliable', '01741127667', '10Science6', 'IMG_3792.png', NULL),
(1695, 10, 'Class Ten', 'Arts', 74, 'SIFAT MOLLA', 'HASAN MOLLA', 'SUMA BEGUM', 'সিফাত মোল্যা', 'হাচান মোল্যা', 'সুমা বেগম', 'MALE', '2007-06-21', '20073534327037343', '0', '0', 'Not Avliable', '01941747728', '10Arts74', 'IMG_3794.png', NULL),
(1696, 10, 'Class Ten', 'Arts', 14, 'MD ARIFUL ISLAM MEHEROB', 'MD MOHIUDDIN MOLLA', 'MST AKTARUNNESA', 'মোঃ আরিফুল ইসলাম মেহেরব', 'মোঃ মহিউদ্দিন মোল্যা', 'মোছাঃ আক্তারুননেছা', 'MALE', '2007-09-20', '20073534327037260', '0', '0', 'Not Avliable', '01718988326', '10Arts14', 'IMG_3796.png', NULL),
(1697, 8, 'Class Eight', 'B', 77, 'Maisha Akter', 'na', 'na', 'na', 'na', 'na', 'FEMALE', '2010-10-25', '0', '0', '0', 'Not Avliable', '01778115985', '8B77', 'IMG_7603.JPG', NULL),
(1698, 7, 'Class Seven', 'A', 156, 'TAMIM EKBAL', 'MD BADSA BISWAS', 'MST CHAMPA KHANAM', 'তামিম ইকবাল', 'মোঃ বাদশা বিশ্বাস', 'মোছাঃ চম্পা খানম', 'MALE', '2010-12-30', '20103534327045662', '0', '0', 'Not Avliable', '0', '7A156', 'IMG_3847.png', NULL),
(1699, 10, 'Class Ten', 'Arts', 83, 'SUPRIYA BALA', 'NEPAL BALA', 'JOYMALA BALA', 'সুপ্রিয়া বালা', 'নেপাল বালা', 'জয়মালা বালা', 'FEMALE', '2008-03-10', '20083514381033585', '0', '0', 'Not Avliable', '0', '10Arts83', 'IMG_3848.png', NULL),
(1700, 9, 'Class Nine', 'A', 83, 'KAJOL BISWAS', 'KRISHNA BISWAS', 'JYOTSNA BISWAS', 'কাজল বিশ্বাস', 'কৃষ্ণ বিশ্বাস', 'KRISHNA BISWAS', 'MALE', '2008-08-01', '20083514327032612', '0', '0', 'Not Avliable', '01993074242', '9A83', 'IMG_3841.png', NULL),
(1701, 7, 'Class Seven', 'A', 66, 'HAKIM SHEIKH', 'MD HASANUR SHEIKH', 'MUSLIMA BEGUM', 'হাকিম শেখ', 'মোঃ হাসানুর শেখ', 'মুসলিমা বেগম', 'MALE', '2010-01-05', '20103514327032941', '0', '0', 'Not Avliable', '01954236879', '7A66', 'IMG_3834.png', NULL),
(1702, 7, 'Class Seven', 'A', 139, 'SHEIKH HUMAYON KABIR', 'MD HASAN SHEIKH', 'AKLIMA BEGUM', 'শেখ হুমায়ন কবির', 'মোঃ হাসান শেখ', 'আকলিমা বেগম', 'MALE', '2009-09-22', '20092910384104334', '0', '0', 'Not Avliable', '01919390948', '7A139', 'IMG_3833.png', NULL),
(1703, 10, 'Class Ten', 'Science', 7, 'MD. Arafat Uzzaman', 'MD FAYQUZZAMAN MUNSHI', 'MST RUNA BEGUM', 'মোঃ আরাফাদুজ্জামান', 'মোঃ ফায়েকুজ্জামান মুন্সী', 'মোসাঃ রুনা বেগম', 'Male', '2009-11-30', '20093514381027318', '0', '0', 'Not Avliable', '01747453177', '10Science7', 'IMG_3844.png', NULL),
(1704, 10, 'Class Ten', 'Arts', 86, 'SHEIKH BRISTY KHANAM', 'MD GAFFAR SHEIKH', 'RABEYA BEGUM', 'শেখ বৃষ্টি খানম', 'মোহাম্মদ গফফার শেখ', 'রাবেয়া বেগম', 'FEMALE', '2009-12-02', '20093514327032025', '0', '0', 'Not Avliable', '01716837348', '10Arts86', 'IMG_3843.png', NULL),
(1705, 10, 'Class Ten', 'Commerce', 18, 'Tarana Rahman Zerin', 'Md. Ziaur Rahman', 'Sondha Akter', 'তারানা রহমান জেরিন', 'মোঃ জিয়াউর রহমান', 'সন্ধ্যা আক্তার', 'FEMALE', '2008-11-12', '20082692544000685', '0', '0', 'Not Avliable', '01716525910', '10Commerce18', 'IMG_3842.png', NULL),
(1706, 8, 'Class Eight', 'A', 101, 'NUR ALAM', 'MD NEZAM SHAK', 'MST NURNAHAR BEGUM', 'নুর আলম', 'মোঃ নিজাম শেখ', 'মোছাঃ নূর নাহার বেগম', 'MALE', '2010-06-14', '20103514327028480', '0', '0', 'Not Avliable', '0', '8A101', 'IMG_3849.png', NULL),
(1707, 10, 'Class Ten', 'Arts', 33, 'Setu Khanom', 'do', 'do', 'সেতু খানম', 'জাহাঙ্গীর মোল্যা', 'সুইটি বেগম', 'FEMALE', '2008-11-25', '20083514313031121', '0', '0', 'Not Avliable', '01728556342', '10Arts33', 'IMG_2950.png', NULL),
(1708, 10, 'Class Ten', 'Arts', 4, 'Arpita Ghosh', 'orun', 'rutna', 'অর্পিতা ঘোষ', 'অরুন কুমার ঘোষ', 'রত্না রানী ঘোষ', 'FEMALE', '2009-09-03', '20093514327032615', '0', '0', 'Not Avliable', '01311030523', '10Arts4', 'IMG_5322.png', NULL),
(1709, 8, 'Class Eight', 'B', 99, 'FARIYA KHANAM', 'FURAD SARDER', 'ALEYA BEGUM', 'ফারিয়া খানম', 'ফুরাদ সরদার', 'আলেয়া বেগম', 'FEMALE', '2010-12-28', '20103514381033884', '0', '0', 'Not Avliable', '017588040849', '8B99', 'IMG_2940.png', NULL),
(1710, 8, 'Class Eight', 'A', 167, 'Md. Zihad Kazi', 'OBIDUR', 'JAHADA', 'মোঃ জিহাদ কাজী', 'মোঃ ওবায়দুর রহমান', 'জাহেদা বেগম', 'Male', '2011-05-21', '20113514327035157', '0', '0', 'Barashur', '01708101135', '8A167', 'IMG_1538.png', NULL),
(1711, 8, 'Class Eight', 'B', 76, 'মিম খানম', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '8B76', 'IMG_0635.png', NULL),
(1712, 9, 'Class Nine', 'A', 53, 'MD JUNAYET HASAN BONI SHEIKH', 'MD SHOEL RANA BABU', 'MST RUPSANA PARVIN', 'মোঃ জুনায়েত হাচান বনি শেখ', 'মোঃ সোহেল রানা বাবু', 'মোছাঃ রুপসানা পারভীন', 'MALE', '2011-07-31', '20113514327030747', '0', '0', 'Not Avliable', '01862536414', '9A53', 'IMG_2476.png', NULL),
(1713, 8, 'Class Eight', 'A', 46, 'SRIJON BALA', 'SUSHEN BALA', 'SHIPRA BALA', 'সিজন বালা', 'সুশেন বালা', 'শিপ্রা বালা', 'MALE', '2012-04-21', '20123515844029984', '0', '0', 'Not Avliable', '0', '8A46', 'IMG_0829.png', NULL),
(1714, 10, 'Class Ten', 'Arts', 5, 'SHERABONI KHANAM', 'ZAHIDUZAMAN  SHEIKH', 'FIRDOSI BEGUM', 'শ্রাবনী খানম', 'জাহিদুজ্জামান শেখ', 'ফেরদৌছি বেগম', 'FEMALE', '2008-08-09', '20083514327028475', '0', '0', 'Not Avliable', '01795052715', '10Arts5', 'IMG_5340.png', NULL),
(1715, 10, 'Class Ten', 'Arts', 6, 'Prity Dey', 'poritos', 'mukti', 'প্রীতি দে', 'পরিতোষ দে', 'মুক্তি রানী দে', 'FEMALE', '2008-10-30', '20083514327029474', '0', '0', 'Not Avliable', '01929738786', '10Arts6', 'IMG_5200.png', NULL),
(1716, 10, 'Class Ten', 'Arts', 65, 'EVA KHANOM', 'MD FARUK HOSAIN', 'MST LAVLY BEGUM', 'ইভা খানম', 'মোঃ ফারুক হোসেন', 'মোছাঃ লাভলী বেগম', 'FEMALE', '2008-06-08', '20083514327033860', '0', '0', 'Not Avliable', '01302062623', '10Arts65', 'IMG_1302.png', NULL),
(1717, 10, 'Class Ten', 'Science', 5, 'SAIMA ISLAM', 'MD: SAIFUL ISLAM', 'JAHANARA BEGUM', 'সাইমা ইসলাম', 'মোঃ সাইফুল ইসলাম', 'জাহানারা বেগম', 'FEMALE', '2009-10-26', '20103514381031825', '0', '0', 'Not Avliable', '01320401971', '10Science5', 'IMG_2997.png', NULL),
(1718, 10, 'Class Ten', 'Commerce', 12, 'Alif Islam', 'toriqul', 'kukumoni', 'আলিফ ইসলাম', 'তরিকুল ইসলাম', 'খুকু মনি', 'Male', '2009-01-01', '20093514327029508', '0', '0', 'Not Avliable', '01795489444', '10Commerce12', 'IMG_4553.png', NULL),
(1719, 10, 'Class Ten', 'Arts', 41, 'হাসানূর বিশ্বাস', 'No Data ON BRIS BD', 'No Data ON BRIS BD', 'হাসানূর বিশ্বাস', 'মো: হনেফ বিশ্বাস', 'নাজমা বেগম', 'MALE', '2006-01-01', '20063514381000218', '0', '0', 'Not Avliable', '01733775804', '10Arts41', 'IMG_4349.png', NULL),
(1720, 9, 'Class Nine', 'A', 145, 'Md. Sohan Molla', 'Md. joynal Abedin', 'Mst. Sonali Begum', 'মো: সোহান মোল্লা', 'মোঃ জয়নাল আবেদীন', 'মোসাঃ সোনালী বেগম', 'Male', '2006-11-12', '0', '0', '0', 'N/A', '0', '9A145', 'IMG_2895.png', NULL),
(1721, 8, 'Class Eight', 'B', 31, 'MST. TAHERA KHATUN', 'Md. Alamin ', 'Mst. Tanzila Begum', 'মোসাঃ তাহেরা খাতুন', 'মোঃ আলামিন', 'মোসাঃ তানজীলা বেগম', 'Female', '2011-08-09', '20112910384100745', '0', '0', 'Not Avliable', '01992738677', '8B31', 'IMG_2923.png', NULL),
(1722, 9, 'Class Nine', 'B', 117, 'রুকাইয়া খানম', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '9B117', 'IMG_2404.png', NULL),
(1723, 9, 'Class Nine', 'B', 114, 'Sadia Khanam', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '9B114', 'IMG_2903.png', NULL),
(1724, 9, 'Class Nine', 'B', 101, 'সুরাইয়া খানম', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '9B101', 'IMG_2327.png', NULL),
(1725, 9, 'Class Nine', 'B', 166, 'সুমাইয়া শেখ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '9B166', 'IMG_2824.png', NULL),
(1726, 9, 'Class Nine', 'A', 124, 'Robul Islam', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '9A124', 'IMG_2666.png', NULL),
(1727, 9, 'Class Nine', 'A', 23, 'Ismail Hossain', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '9A23', 'IMG_2523.png', NULL),
(1728, 7, 'Class Seven', 'B', 116, 'MORIYAM KHANAM', 'BABAR ALI', 'RINA BEGUM', 'মরিয়ম খানম', 'বাবর আলী', 'রীনা বেগম', 'FEMALE', '2011-06-22', '20113514327033297', '0', '0', 'Not Avliable', '01705906073', '7B116', 'IMG_2605.png', NULL),
(1729, 10, 'Class Ten', 'Arts', 32, 'ফারজানা হাবিবা', 'No Data ON BRIS BD', 'No Data ON BRIS BD', 'ফারজানা হাবিবা', 'মোঃ জাফর মোল্যা', 'মোছাঃ ছকিনা বেগম', 'FEMALE', '2009-06-08', '20093514327028666', '0', '0', 'Not Avliable', '01947734004', '10Arts32', 'IMG_2959.png', NULL),
(1730, 10, 'Class Ten', 'Arts', 25, 'Sipra Sarkar', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '10Arts25', 'IMG_2957.png', NULL),
(1731, 8, 'Class Eight', 'B', 131, 'Lamia Akter', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '8B131', 'IMG_2972.png', NULL),
(1732, 8, 'Class Eight', 'B', 68, 'Mahima Akter', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2000-01-01', '0', '0', '0', 'N/A', '0', '8B68', '.', NULL),
(1733, 8, 'Class Eight', 'A', 4, 'Md. Nur Ali Molla', 'Abul Kalam', 'Jharna Begum', 'N/A', 'N/A', 'N/A', 'Male', '2011-12-10', '0', '0', '0', 'Barashur', '01789261056', '8A4', '.', NULL),
(1734, 8, 'Class Eight', 'A', 34, 'তাসনিম হোসেন', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '8A34', '.', NULL),
(1735, 8, 'Class Eight', 'A', 51, 'আনিক আহমেদ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '8A51', '.', NULL),
(1736, 8, 'Class Eight', 'B', 73, 'বর্ষা খানম', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '8B73', '.', NULL),
(1737, 8, 'Class Eight', 'B', 83, 'এ্যানিকা মৃধা', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '8B83', '.', NULL),
(1738, 8, 'Class Eight', 'B', 85, 'Gonga Rani Biswas', 'Raj Kumar Biswas', 'Archana Rani Biswas', 'N/A', 'N/A', 'N/A', 'Female', '2009-09-02', '0', '0', '0', 'Barashur', '0', '8B85', '85.jpg', NULL),
(1739, 8, 'Class Eight', 'B', 110, 'প্রিয়া খানম', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '8B110', '110.jpg', NULL),
(1740, 8, 'Class Eight', 'A', 126, 'ইসানুর শেখ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '8A126', '.', NULL),
(1741, 8, 'Class Eight', 'A', 132, 'আরমান মোল্লা', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '8A132', '132.jpg', NULL),
(1742, 8, 'Class Eight', 'B', 148, 'HAZERA KHANAM', 'AHMMED BISWAS', 'MUNJURA BEGUM', 'N/A', 'N/A', 'N/A', 'Female', '2009-02-03', '0', '0', '0', 'N/A', '01787283320', '8B148', 'IMG_20240210_0012.jpg', NULL),
(1743, 8, 'Class Eight', 'A', 156, 'তামিম ইকবাল', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '8A156', '.', NULL),
(1744, 8, 'Class Eight', 'B', 158, 'Anika Khanam', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '8B158', '158.jpg', NULL),
(1745, 8, 'Class Eight', 'B', 157, 'লামিয়া ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '8B157', 'IMG_20240210_0048.jpg', NULL),
(1746, 9, 'Class Nine', 'B', 60, 'সালমা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B60', '.', NULL),
(1747, 9, 'Class Nine', 'A', 108, 'হেলাল সরকার ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A108', '9108.jpg', NULL),
(1748, 9, 'Class Nine', 'B', 152, 'পিংকি বিশ্বাস ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B152', '.', NULL),
(1749, 9, 'Class Nine', 'A', 69, 'রিমন শেখ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A69', '.', NULL),
(1750, 9, 'Class Nine', 'A', 39, 'ইমন শেখ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A39', 'IMG_7610.JPG', NULL),
(1751, 9, 'Class Nine', 'B', 153, 'মাহাফুজা খানম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B153', '.', NULL),
(1752, 9, 'Class Nine', 'B', 157, 'সানজিলা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B157', '.', NULL),
(1753, 9, 'Class Nine', 'A', 66, 'বিশাল বিশ্বাস ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A66', '.', NULL),
(1754, 9, 'Class Nine', 'B', 134, 'মিলি খানম', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B134', '.', NULL),
(1755, 9, 'Class Nine', 'A', 160, 'ইয়ামিন আরাফাত ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A160', '.', NULL),
(1756, 9, 'Class Nine', 'A', 122, 'Husain', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A122', '.', NULL),
(1757, 9, 'Class Nine', 'B', 129, 'স্নিগ্ধা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B129', 'IMG_7615.JPG', NULL),
(1758, 9, 'Class Nine', 'A', 161, 'সালমান', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A161', '.', NULL),
(1759, 9, 'Class Nine', 'A', 162, 'শুভ বিশ্বাস ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A162', '.', NULL),
(1760, 9, 'Class Nine', 'A', 132, 'জয় ঘোষ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A132', '.', NULL),
(1761, 9, 'Class Nine', 'B', 98, 'আশা মনি ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B98', 'IMG_7618.JPG', NULL),
(1762, 9, 'Class Nine', 'A', 139, 'আল মাহামুদ মিনহাজ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A139', '.', NULL),
(1763, 9, 'Class Nine', 'A', 164, 'মোহাম্মদ তামিম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A164', '.', NULL),
(1764, 9, 'Class Nine', 'B', 165, 'তায়েবা খানম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '9B165', '.', NULL),
(1765, 9, 'Class Nine', 'A', 144, 'তানভির মৃধা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A144', '.', NULL),
(1766, 9, 'Class Nine', 'A', 146, 'তাওহিদ আল মুকিত ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A146', '.', NULL),
(1767, 9, 'Class Nine', 'A', 136, 'Siam', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '9A136', '136.jpg', NULL),
(1768, 10, 'Class Ten', 'Commerce', 8, 'JOY DIP KUMAR DAS', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2010-04-16', '0', '0', '0', 'Barashur', '01724371239', '10Commerce8', 'IMG_7612.JPG', NULL),
(1769, 10, 'Class Ten', 'Commerce', 16, 'নওশীন তাবাচ্ছুম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Commerce16', 'IMG_7619.JPG', NULL),
(1770, 10, 'Class Ten', 'Commerce', 27, 'আমির হামজা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Commerce27', '.', NULL),
(1771, 10, 'Class Ten', 'Arts', 7, 'রুদ্র কুমার ঘোষ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '01715286920', '10Arts7', '07.jpg', NULL),
(1772, 10, 'Class Ten', 'Arts', 12, 'MD LIPU KAZI', 'MD. AKKACH KAZI', 'ASMA BEGUM', 'N/A', 'N/A', 'N/A', 'Male', '2007-01-02', '0', '0', '0', 'Barashur', '0', '10Arts12', '.', NULL),
(1773, 10, 'Class Ten', 'Arts', 80, 'আরমান মোল্লা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts80', '.', NULL),
(1774, 10, 'Class Ten', 'Arts', 24, 'তারভীন হাসান ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts24', '.', NULL),
(1775, 10, 'Class Ten', 'Arts', 17, 'খুরশীদ জাহান ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts17', 'IMG_7602.JPG', NULL),
(1776, 10, 'Class Ten', 'Arts', 84, 'সাজ্জাদ শেখ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts84', '.', NULL),
(1777, 10, 'Class Ten', 'Arts', 46, 'অংকন ঘোষ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts46', '.', NULL),
(1778, 10, 'Class Ten', 'Arts', 85, 'তামান্না খানম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts85', '.', NULL),
(1779, 10, 'Class Ten', 'Arts', 23, 'Jobayer Sheikh Nafid', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2009-01-05', '0', '0', '0', 'Dhankora', '01768357819', '10Arts23', 'Ten arts 23.jpg', NULL),
(1780, 10, 'Class Ten', 'Arts', 62, 'হনুফা খানম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts62', '.', NULL),
(1781, 10, 'Class Ten', 'Arts', 75, 'রিক্তা খানম ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Female', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts75', '.', NULL),
(1782, 10, 'Class Ten', 'Arts', 89, 'রিফাত খান ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts89', '.', NULL),
(1783, 10, 'Class Ten', 'Arts', 91, 'নাইম হাসান ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts91', '.', NULL),
(1784, 10, 'Class Ten', 'Arts', 66, 'মাহিম মৃধা ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts66', '.', NULL),
(1785, 10, 'Class Ten', 'Arts', 57, 'নয়ন শেখ ', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'Male', '2023-07-11', '0', '0', '0', 'N/A', '0', '10Arts57', '.', NULL),
(1786, 9, 'Class Nine', 'A', 65, 'SHEIKH ARAFAT', 'N', 'N', 'শেখ আরাফাত', 'N', 'N', 'Male', '2023-07-27', '1', '1', '1', '1', '1', '9A65', 'IMG_7604.JPG', NULL),
(1787, 7, 'Class Seven', 'B', 13, 'Fatema Khanam', '', '', 'f', 'f', 'f', 'Female', '0001-01-01', '1', '00', '0', '', '0', '7B13', '.', NULL),
(1788, 7, 'Class Seven', 'A', 18, 'g', 'g', 'g', 'মোঃ কাওসার শেখ', 'g', 'g', 'Male', '0001-01-01', '0', '0', '0', '', '0', '7A18', '.', NULL),
(1789, 7, 'Class Seven', 'B', 30, 'Jannati Khanam', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '0', '0', '7B30', 'IMG_7616.JPG', NULL),
(1790, 7, 'Class Seven', 'B', 38, 'Ornima Ghosh', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B38', 'Seven 38.jpg', NULL),
(1791, 7, 'Class Seven', 'B', 39, 'Mahima Afrin', ' fg', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B39', 'IMG_7617.JPG', NULL),
(1792, 7, 'Class Seven', 'B', 48, 'Suriya', 'g', 'g', 'g', 'g', 'g', 'Female', '0001-01-01', '0', '0', '0', '0', '0', '7B48', 'IMG_7614.JPG', NULL),
(1793, 7, 'Class Seven', 'B', 62, 'Lamia Khan', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '00', '0', '0', '', '0', '7B62', '.', NULL),
(1794, 7, 'Class Seven', 'A', 78, 'jannatul Ferdaus Naeem', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '0', '', '0', '7A78', '78.jpg', NULL),
(1795, 7, 'Class Seven', 'A', 103, 'Parvej', 'b', 'b', 'b', 'b', 'b', 'Male', '0001-01-01', '000', '0', '0', '', '0', '7A103', 'IMG_7613.JPG', NULL),
(1796, 7, 'Class Seven', 'B', 113, 'Mst, Imu Khanam', 'g', 'g', 'g', 'g', 'g', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B113', '.', NULL),
(1797, 7, 'Class Seven', 'B', 114, 'Yeasmin Khanam', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '00', '0', '0', '', '0', '7B114', '.', NULL),
(1798, 7, 'Class Seven', 'A', 125, 'Md. Farhin', 'h', 'h', 'h', 'h', 'h', 'Male', '0001-01-01', '0', '0', '0', '', '0', '7A125', '.', NULL),
(1799, 7, 'Class Seven', 'B', 128, 'Siam Fardin Sherif', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B128', '.', NULL),
(1800, 7, 'Class Seven', 'B', 129, 'Lamia Islam', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B129', 'seven129.jpg', NULL),
(1801, 7, 'Class Seven', 'A', 130, 'jehad Sheikh', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '0', '', '0', '7A130', '.', NULL),
(1802, 7, 'Class Seven', 'B', 136, 'Rabeya Islam Lamia', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B136', '.', NULL),
(1803, 7, 'Class Seven', 'A', 143, 'Arju Sardar', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '0', '', '0', '7A143', '.', NULL),
(1804, 7, 'Class Seven', 'A', 148, 'Md.Junayed Molla', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '0', '', '0', '7A148', 'IMG_20240210_0010.jpg', NULL),
(1805, 7, 'Class Seven', 'B', 153, 'Tamanna', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B153', '.', NULL),
(1806, 7, 'Class Seven', 'B', 154, 'Serabonif', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B154', '.', NULL),
(1807, 7, 'Class Seven', 'B', 155, 'Laboni Khanam', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B155', '.', NULL),
(1808, 7, 'Class Seven', 'B', 156, 'Juwaria Bita Ahmed', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '', '0', '7B156', '.', NULL),
(1809, 8, 'Class Eight', 'B', 168, 'Antora Khanam', 'h', 'h', 'h', 'h', 'h', 'Female', '0001-01-01', '0', '0', '0', '0', '0', '8B168', '.', NULL),
(1810, 8, 'Class Eight', 'A', 169, 'Md.Azizur Sheikh', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '0', '0', '0', '8A169', '.', NULL),
(1811, 8, 'Class Eight', 'A', 170, 'Refat Sheikh', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '0', '0', '0', '8A170', '.', NULL),
(1812, 8, 'Class Eight', 'B', 172, 'Preya Khanam', 'f', 'f', 'f', 'f', 'f', 'Female', '0001-01-01', '0', '0', '0', '0', '-1', '8B172', '.', NULL),
(1813, 8, 'Class Eight', 'A', 163, 'Emon Molla', 'f', 'f', 'fg', 'f', 'f', 'Male', '0001-01-01', '0', '0', '-1', '0', '0', '8A163', '.', NULL),
(1814, 9, 'Class Nine', 'A', 125, 'Md. Aziz Khan', 'f', 'f', 'f', 'f', 'f', 'Male', '0001-01-01', '0', '0', '-1', '0', '0', '9A125', '.', NULL),
(1815, 9, 'Class Nine', 'B', 73, 'Suraiya Akter Rahi', 'k', 'k', 'k', 'k', '0', 'Female', '0001-01-01', '0', '0', '0', '0', '0', '9B73', 'IMG_20240210_0015.jpg', NULL),
(1816, 10, 'Class Ten', 'Arts', 73, 'Asraful Sheikh', 'Hasu Sheikh', 'Ambia Begum', 'j', 'j', 'j', 'Male', '0001-01-01', '0', '0', '0', 'kazi para pankharchar', '01749564076', '10Arts73', 'IMG_7611 copy.jpg', NULL),
(1817, 6, 'Class Six', 'Mollika', 1, 'Md. Sizan Rahman Sarder', 'MD Salauddin Sarder', 'sabina', 'মোঃসিজান রহমান সরদার', 'মোঃসালাউদ্দিন সরদার', 'সাবিনা ইয়াসমিন', 'Male', '2014-01-01', '20143514327034601', '0', '0', 'Not Avliable', '01783808373', '6Mollika1', 'IMG_20240529_101033.jpg', NULL),
(1818, 6, 'Class Six', 'Mollika', 2, 'Ummia Moriym', 'Mir Shorifur Rahman', 'Salma Khanam', 'উম্মে মরিয়ম', 'মীর শরিফুর রহমান', 'সালমা খানম', 'FEMALE', '2013-01-19', '20134112335528091', '0', '0', 'Not Avliable', '01911816567', '6Mollika2', 'IMG_0024.jpg', NULL),
(1819, 6, 'Class Six', 'Mollika', 3, 'MUSFIKA', 'MD SUJON MOLLA', 'MST RANU PARVEN', 'মুশফিকা', 'মোঃসুজন মোল্লা', 'মোছাঃ রেনু পারভীন', 'FEMALE', '2013-01-01', '20133514327032810', '0', '0', 'Not Avliable', '01738973478', '6Mollika3', 'six03.jpg', NULL),
(1820, 6, 'Class Six', 'Mollika', 4, 'Jannatul Tazri', 'MURAD HOSSAIN MOLLA', 'afroja kanom', 'জান্নাতুল তাজরি', 'মোরাদ হোসেন মোল্যা', 'আফরোজা খানম', 'Male', '2014-06-19', '20143514327032493', '0', '0', 'Not Avliable', '01715885358', '6Mollika4', 'IMG_20240210_0018.jpg', NULL),
(1821, 6, 'Class Six', 'Mollika', 5, 'TASMIA KHANAM', 'MD MIJANUR RAHMAN', 'NADIRA BEGUM', 'তাসমিয়া খানম', 'মোঃ মিজানুর রহমান', 'নাদিরা বেগম', 'FEMALE', '2013-05-20', '20132910384104977', '0', '0', 'Not Avliable', '01920995926', '6Mollika5', 'IMG_0013.jpg', NULL),
(1822, 6, 'Class Six', 'Mollika', 6, 'MD HABIB SHEIKH', 'BABUL  SHEIKH', 'RANI BEGUM', 'মোঃ হাবিব শেখ', 'বাবুল শেখ', 'রনি বেগম', 'MALE', '2012-07-15', '20123514381034764', '0', '0', 'Not Avliable', '01790915376', '6Mollika6', 'six6.jpg', NULL),
(1823, 6, 'Class Six', 'Mollika', 7, 'TASMIM AFROJ  KHADIJA', 'MD KALAM HOSSAIN', 'JOSNA AKTER', 'তাসমিম আফরোজ  খাদিজা', 'মোঃ কালাম হোসেন', 'জোস্না আক্তার', 'FEMALE', '2013-02-14', '20133534327046057', '0', '0', 'Not Avliable', '01643246489', '6Mollika7', 'IMG_0034.jpg', NULL),
(1824, 6, 'Class Six', 'Mollika', 8, 'KAREMA KHANAM', 'LIYAKOT FAKIR', 'MST SAFI BEGUM', 'কারিমা খানম', 'লিয়াকত ফকির', 'মোসাঃ সাফি বেগম', 'FEMALE', '2012-06-07', '20123514327031238', '0', '0', 'Not Avliable', '01941302315', '6Mollika8', 'IMG_0018.jpg', NULL),
(1825, 6, 'Class Six', 'Mollika', 9, 'FARDIN HASAN AYON', 'MD AMINUR SHEIKH', 'MST SHIRINA BEGUM', 'ফারদিন হাসান অয়ন', 'মোঃ আমিনুর শেখ', 'মোসাঃ শিরিনা বেগম', 'MALE', '2012-08-07', '20123514327034268', '0', '0', 'Not Avliable', '01733521058', '6Mollika9', 'IMG_20240210_0008.jpg', NULL),
(1826, 6, 'Class Six', 'Mollika', 10, 'MD JISAN SHEIKH', 'MD CHANCHAL SHEIKH', 'PARVIN KHANOM', 'মোঃ জিসান শেখ', 'মোঃ চঞ্চল শেখ', 'পারভিন খানম', 'MALE', '2013-01-03', '20132910384104930', '0', '0', 'Not Avliable', '01986732630', '6Mollika10', 'IMG_0027.jpg', NULL),
(1827, 6, 'Class Six', 'Mollika', 11, 'MAINUL ISLAM', 'MD RAIHANUL  ISLAM', 'TIULIP', 'মাঈনুল ইসলাম', 'মোঃ রায়হানুল  ইসলাম', 'টিউলিপ', 'MALE', '2012-12-16', '20123534327043880', '0', '0', 'Not Avliable', '01724270402', '6Mollika11', 'six11.jpg', NULL),
(1828, 6, 'Class Six', 'Mollika', 12, 'BAISHAKHI', 'IRAN MOLLA', 'REKHA BEGUM', 'বৈশাখী', 'ইরান মোল্যা', 'রেখা বেগম', 'Male', '2010-04-14', '20103514327035112', '0', '0', 'Not Avliable', '01904763161', '6Mollika12', 'IMG_20240210_0013.jpg', NULL),
(1829, 6, 'Class Six', 'Mollika', 13, 'MD FAISAL HASAN RAJ', 'MD JAHANGIR CHAPRASI', 'REXONA BEGUM', 'মোঃফয়সাল হাচান রাজ', 'মোঃজাহাঙ্গির চাপরাশি', 'রেক্সনা বেগম', 'MALE', '2012-09-26', '20123514327030106', '0', '0', 'Not Avliable', '01310347949', '6Mollika13', 'IMG_0020.jpg', NULL),
(1830, 6, 'Class Six', 'Mollika', 14, 'BARIDHY AKTER', 'MD BABUL SHEIKH', 'SHIMA KHANOM', 'বারিধী আক্তার', 'মোঃবাবুল শেখ', 'সীমা খানম', 'FEMALE', '2011-02-01', '20113514327031639', '0', '0', 'Not Avliable', '01724634443', '6Mollika14', 'six14.jpg', NULL),
(1831, 6, 'Class Six', 'Mollika', 15, 'RUBAIYA KHANOM', 'KASEM SHEKDAR', 'NIRUPA BEGUM', 'রুবাইয়া খানম', 'কাসেম সিকদার', 'নিরুপা বেগম', 'FEMALE', '2014-02-25', '20142910384103438', '0', '0', 'Not Avliable', '01933287215', '6Mollika15', 'IMG_0017.jpg', NULL),
(1832, 6, 'Class Six', 'Mollika', 16, 'HUSAIMA', 'MUSTAFIZUR RAHMAN', 'SUMAYA BEGUM', 'হুসাইমা', 'মোঃ মোস্তাফিজুর রহমান', 'সুমাইয়া বেগম', 'FEMALE', '2011-09-05', '20113514381034279', '0', '0', 'Not Avliable', '0', '6Mollika16', 'IMG_20240210_0020.jpg', NULL),
(1833, 6, 'Class Six', 'Mollika', 17, 'MARIA ISLAM KARIMA', 'ENGUL MOLLA', 'MST ROJINA BEGUM', 'মারিয়া ইসলাম কারিমা', 'ইঙ্গুল  মোল্যা', 'মোসাঃ রোজিনা  বেগম', 'FEMALE', '2014-03-06', '20143514327035238', '0', '0', 'Not Avliable', '01912591842', '6Mollika17', 'IMG_20240210_0001.jpg', NULL),
(1834, 6, 'Class Six', 'Mollika', 18, 'ELMA KHANAM', 'MD PIQUE SHAIKH', 'MST ASMA BEGUM', 'ইলমা খানম', 'মোঃ পিকু শেখ', 'মোছাঃ আছমা বেগম', 'FEMALE', '2010-12-24', '20103514327031711', '0', '0', 'Not Avliable', '0', '6Mollika18', 'sis18.jpg', NULL),
(1835, 6, 'Class Six', 'Mollika', 19, 'Tasfia Tahsin', 'Milu Sikder', 'Poli Begum', 'তাসফিয়া তাহসিন', 'মিলু শিকদার', 'পলি বেগম', 'FEMALE', '2011-02-02', '20112910384104427', '0', '0', 'Not Avliable', '01959381942', '6Mollika19', 'IMG_0011.jpg', NULL),
(1836, 6, 'Class Six', 'Mollika', 20, 'MD IBRAHIM MOLLA', 'MD GAHANGIR ALAM', 'MST HAMIDA BEGUM', 'মোঃ ইব্রাহিম মোল্যা', 'মোঃ জাহাঙ্গীর আলম', 'মোছাঃ হামিদা বেগম', 'MALE', '2013-08-05', '20136515263014917', '0', '0', 'Not Avliable', '01928702478', '6Mollika20', 'IMG_0053.jpg', NULL),
(1837, 6, 'Class Six', 'Mollika', 21, 'MIM KHANOM', 'MD TOHIN SHEIKH', 'MST ROJINA BEGUM', 'মিম খানম', 'মোঃ তুহিন শেখ', 'মিসেস রোজিনা বেগম', 'Male', '2012-11-29', '20122910384104932', '0', '0', 'Not Avliable', '01966913543', '6Mollika21', 'IMG_0014.jpg', NULL),
(1838, 6, 'Class Six', 'Mollika', 23, 'NAZMUL HASAN NASIM', 'MD RUHUL AMIN MOLLA', 'MST NARGIS BEGOM', 'নাজমুল হাসান নাসিম', 'মোঃরুহুল আমীন মোল্যা', 'মোসাঃনার্গীস বেগম', 'MALE', '2013-01-01', '20133514327034506', '0', '0', 'Not Avliable', '01871246526', '6Mollika23', 'IMG_20240210_0033.jpg', NULL),
(1839, 6, 'Class Six', 'Mollika', 24, 'MD ALAMIN SARDER', 'MD YUSUF ALI  SARDER', 'MST SHIRINA  BEGUM', 'মোঃ আলামিন সরদার', 'মোঃ ইউসুফ আলী  সর্দার', 'মোছাঃ শিরিনা  বেগম', 'MALE', '2013-01-16', '20133534327041835', '0', '0', 'Not Avliable', '01761882267', '6Mollika24', 'IMG_0010.jpg', NULL),
(1840, 6, 'Class Six', 'Mollika', 25, 'MD HABIB MOLLA', 'MD LITON MOLLA', 'MST ARIFA HASAN', 'মো: হাবিব মোল্যা', 'মো: লিটন মোল্যা', 'মোসাঃ আরিফা হাচান', 'MALE', '2013-01-10', '20136515263010848', '0', '0', 'Not Avliable', '01608493838', '6Mollika25', 'IMG_20240210_0005.jpg', NULL),
(1841, 6, 'Class Six', 'Mollika', 26, 'MAHEYA KHANAM', 'MD RAHIM HOSSAIN MOLLAH', 'REHANA BEGUM', 'মাহিয়া খানম', 'মোঃ রহিম হোসেন মোল্যা', 'রেহানা বেগম', 'FEMALE', '2012-11-03', '20123514327032362', '0', '0', 'Not Avliable', '01770842778', '6Mollika26', 'IMG_26.png', NULL),
(1842, 6, 'Class Six', 'Mollika', 27, 'RUMAN SHEIKH', 'MD SHAINUR JAMAN DETOL', 'RUNA BEGUM', 'রুমান শেখ', 'মোঃ শাহীনুর জামান ডিটল', 'রুনা বেগম', 'MALE', '2013-02-01', '20132910384104931', '0', '0', 'Not Avliable', '01990763355', '6Mollika27', 'IMG_0026.jpg', NULL),
(1843, 6, 'Class Six', 'Mollika', 28, 'ARMIM KHANAM', 'MD ALOMGIR HOSSAIN', 'TANZILA KHANAM', 'আরমিম খানম', 'মোঃ আলমগীর হোসেন', 'তানজিলা খানম', 'FEMALE', '2013-06-17', '20132910384103535', '0', '0', 'Not Avliable', '01963717074', '6Mollika28', 'IMG_0016.jpg', NULL),
(1844, 6, 'Class Six', 'Mollika', 29, 'MABIYA AKTER BORSA', 'MONTU SHEIKH', 'BEAUTY BEGUM', 'মাবিয়া আক্তার বর্ষা', 'মোন্টু শেখ', 'বিউটি বেগম', 'FEMALE', '2012-06-12', '20123514327028640', '0', '0', 'Barashur', '01813571265', '6Mollika29', 'IMG_0049.jpg', NULL),
(1845, 6, 'Class Six', 'Mollika', 30, 'TAMANNA AKTER', 'NAYEB ALI BISWAS', 'MAHARUN BEGUM', 'তামান্না  আকতার', 'নায়েব আলী বিশ্বাস', 'মেহেরুন বেগম', 'FEMALE', '2013-07-22', '20133534327042780', '0', '0', 'Not Avliable', '01943303459', '6Mollika30', 'IMG_0030.jpg', NULL),
(1846, 6, 'Class Six', 'Mollika', 31, 'MST HACIYA KHATUN  NILA', 'MD RINTU KHAN', 'MST CHINA BEGUM', 'মোছাঃ হাচিয়া খাতুন নিলা', 'মোঃ রিন্টু খাঁন', 'মোছাঃ চায়না বেগম', 'FEMALE', '2013-06-01', '20133534327041883', '0', '0', 'Not Avliable', '01953702026', '6Mollika31', 'IMG_0015.jpg', NULL),
(1847, 6, 'Class Six', 'Mollika', 32, 'TAMIM AHMMED ARKO', 'MD ALAM  MOLLA', 'SHARMIN ALAM', 'তামিম আহম্মেদ অর্ক', 'মোঃ আলম মোল্যা', 'শারমীন আলম', 'MALE', '2014-02-28', '20142910384104434', '0', '0', 'Not Avliable', '01935097705', '6Mollika32', 'IMG_7608 copy.jpg', NULL),
(1848, 6, 'Class Six', 'Mollika', 33, 'Md. Tashin Hasan', 'Mohammad Nazmul Hasan', 'Mst. Ferdousi Hasan', 'মোঃ তাসিন হাছান', 'মোহাম্মদ নাজমুল হাছান', 'মোছাঃ ফেরদৌসি হাছান', 'MALE', '2012-07-04', '20123514327031120', '0', '0', 'Not Avliable', '01911729423', '6Mollika33', 'six33.jpg', NULL),
(1849, 6, 'Class Six', 'Mollika', 34, 'NIPA BISWAS', 'DILIP BISWAS', 'LOXMI RANI BISWAS', 'নিপা বিশ্বাস', 'দিলিপ বিশ্বাস', 'লক্ষী রানী বিশ্বাস', 'FEMALE', '2011-08-15', '20113514327034241', '0', '0', 'Not Avliable', '01918697560', '6Mollika34', 'six34.jpg', NULL),
(1850, 6, 'Class Six', 'Mollika', 35, 'SURIYA  SNAHA', 'MD SUJON MOLLA', 'MORZINA BEGUM', 'সুরাইয়া স্নেহা', 'মোঃ সুজন মোল্যা', 'মর্জিনা বেগম', 'FEMALE', '2012-04-28', '20123514327032468', '0', '0', 'Not Avliable', '01916889365', '6Mollika35', 'IMG_20240210_0002.jpg', NULL),
(1851, 6, 'Class Six', 'Mollika', 36, 'Halima Tus Sadia', 'MD BILLAL HOSSAIN', 'HASURA KHANAM', 'হালিমা তুছ ছাদিয়া', 'মোঃ বিল্লাল হোসেন', 'হাসুরা খানম', 'FEMALE', '2013-04-01', '20136515263010930', '0', '0', 'Not Avliable', '01732378238', '6Mollika36', 'IMG_0028.jpg', NULL),
(1852, 6, 'Class Six', 'Mollika', 37, 'MD ZIHAD BISWAS', 'MD ZAHEDUL BISWAS', 'FATIMA BEGUM', 'মোঃ জিহাদ বিশ্বাস', 'মোঃ জাহিদুল বিশ্বাস', 'ফতেমা বেগম', 'MALE', '2011-06-16', '20113514327030774', '0', '0', 'Not Avliable', '01714586791', '6Mollika37', 'IMG_37.png', NULL),
(1853, 6, 'Class Six', 'Mollika', 38, 'SANJIDA', 'MOSAREF HOSEN', 'SONIA BEGUM', 'সানজিদা', 'মোশারেফ হোসেন', 'সনিয়া বেগম', 'FEMALE', '2010-04-13', '20102910384114089', '0', '0', 'Not Avliable', '01758467776', '6Mollika38', 'IMG_0051.jpg', NULL),
(1854, 6, 'Class Six', 'Mollika', 39, 'Anisha Khanom', 'Md. Isharot Sheikh', 'Reshma Begum', 'আনিশা খানম', 'মোঃ ইসারোত শেখ', 'রেশমা বেগম', 'FEMALE', '2012-02-10', '20123514327031574', '0', '0', 'Not Avliable', '01980779245', '6Mollika39', 'IMG_39.png', NULL),
(1855, 6, 'Class Six', 'Mollika', 40, 'SRABON BISWAS', 'SANTO KUMAR BISWAS', 'SIMA BISWAS', 'শ্রাবন বিশ্বাস', 'শান্ত কুমার বিশ্বাস', 'সিমা বিশ্বাস', 'MALE', '2013-06-07', '20133514327032693', '0', '0', 'Not Avliable', '01721320426', '6Mollika40', 'IMG_20240210_0009.jpg', NULL),
(1856, 6, 'Class Six', 'Shapla', 41, 'MARYAM', 'MD ANECHUR RAHMAN', 'MOSAMMAT SALMA KHANOM', 'মরিয়ম', 'মোঃ আনিচুর রহমান', 'মোসাঃ সালমা খানম', 'FEMALE', '2010-10-14', '20102910342100313', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '0198433995', '6Shapla41', 'IMG_41.png', NULL),
(1857, 6, 'Class Six', 'Shapla', 42, 'MIMIA KHANAM', 'MD HASU MOLLA', 'JELEKHA BEGUM', 'মিমিয়া খানম', 'মোঃ হাসু মোল্যা', 'জেলেখা বেগম', 'FEMALE', '2012-01-01', '20123514327035150', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01980371851', '6Shapla42', 'IMG_0002.jpg', NULL),
(1858, 6, 'Class Six', 'Shapla', 43, 'SAYMA AKTER SOHAGI', 'S M SAIFUL ISLAM', 'MST TANGILA KHANAM', 'সায়মা আক্তার সোহাগী', 'এস এম সাইফুল ইসলাম', 'মোসাঃ তানজিলা খানম', 'FEMALE', '2012-12-07', '20123514347013532', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '0', '6Shapla43', 'IMG_20240210_0038.jpg', NULL),
(1859, 6, 'Class Six', 'Shapla', 44, 'Israt Jahan', 'MD ZAKIR HOSSAIN', 'Anjera Begum', 'ইসরাত জাহান', 'মোঃ জাকির হোসেন', 'আনজিরা বেগম', 'FEMALE', '2013-01-13', '20132910384104481', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01931807046', '6Shapla44', 'IMG_0012.jpg', NULL);
INSERT INTO `student` (`id`, `classnumber`, `classname`, `secgroup`, `roll`, `name`, `fname`, `mname`, `nameb`, `fnameb`, `mnameb`, `sex`, `dob`, `birthid`, `fnid`, `mnid`, `address`, `mobile`, `uniqid`, `imgname`, `brisqr`) VALUES
(1860, 6, 'Class Six', 'Shapla', 45, 'DIPA BISWAS', 'SAROJIT BISWAS', 'CHANDANA BISWAS', 'দিপা বিশ্বাস', 'সরজিত বিশ্বাস', 'চন্দনা বিশ্বাস', 'FEMALE', '2012-04-25', '20122910384104173', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01777513908', '6Shapla45', 'SIX45.jpg', NULL),
(1861, 6, 'Class Six', 'Shapla', 46, 'MD. RIDHAY SHEIKH', 'MD. ASHRAFUL ALAM SHEIKH', 'MST. RUKSANA BEGUM', 'মো: হৃদয় শেখ', 'মো: আমরাফুল আলম শেখ', 'মোছা: রুখসানা বেগম', 'MALE', '2010-10-29', '20106515223028773', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01', '6Shapla46', 'IMG_0003.jpg', NULL),
(1862, 6, 'Class Six', 'Shapla', 47, 'NUPUR AKTER SATHI', 'MD SUJAN SARDER', 'SOBITA BEGUM', 'নুপুর আক্তার সাথী', 'মোঃসুজন সরদার', 'ববিতা বেগম', 'FEMALE', '2011-01-02', '20113514327030221', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01962872921', '6Shapla47', 'IMG_0009.jpg', NULL),
(1863, 6, 'Class Six', 'Shapla', 48, 'KHADIJATUL TAHIRA', 'MD ABDULLA  AL MAMUN', 'KHALEDA KHANAM', 'খাদিজাতুল তাহিরা', 'মোঃ আব্দুল্লাহ আল মামুন', 'খালেদা খানম', 'FEMALE', '2012-09-09', '20123534327038100', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01716380063', '6Shapla48', 'IMG_0033.jpg', NULL),
(1864, 6, 'Class Six', 'Shapla', 49, 'MEGLA BISWAS', 'MITHUN BISWAS', 'MUKTA RANI', 'মেঘলা বিশ্বাস', 'মিঠুন বিশ্বাস', 'মুক্তা রাণী', 'FEMALE', '2010-11-10', '20103514327032849', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01407625395', '6Shapla49', 'IMG_0004.jpg', NULL),
(1865, 6, 'Class Six', 'Shapla', 50, 'SINTO GHOSH', 'TAPOSH KUMAR GHOSH', 'APARNA GHOSH', 'সিনতো ঘোষ', 'তাপষ কুমার ঘোষ', 'অপর্না ঘোষ', 'MALE', '2012-09-12', '20122910384102193', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '0', '6Shapla50', 'SIX50.jpg', NULL),
(1866, 6, 'Class Six', 'Shapla', 51, 'Mst. Jamiya Khanom', 'OBAIDUR RAHMAN', 'MST KAKOLI BEGUM', 'মোসা: জামিয়া খানম', 'ওবাইদুর রহমান', 'মোসাঃ কাকলি বেগম', 'FEMALE', '2012-06-04', '20126515263010847', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01921071577', '6Shapla51', 'IMG_0008.jpg', NULL),
(1867, 6, 'Class Six', 'Shapla', 52, 'ABDUR RAHIM MOLLA', 'BULBUL AHMED', 'HERA KHANOM', 'আব্দুর রহিম মোল্লা', 'বুলবুল আহমেদ', 'হিরা খানম', 'MALE', '2013-02-03', '20133534327042392', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01300287851', '6Shapla52', 'IMG_52.png', NULL),
(1868, 6, 'Class Six', 'Shapla', 53, 'MARIYA KHANAM', 'MD KABIR MOLLA', 'SHARIFA BEGUM', 'মারিয়া খানম', 'মোঃ কবির মোল্যা', 'শরীফা বেগম', 'FEMALE', '2013-02-07', '20133534327036691', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01317403055', '6Shapla53', 'IMG_20240210_0041.jpg', NULL),
(1869, 6, 'Class Six', 'Shapla', 54, 'TAMANNA HAQUE RIMI', 'MD FARID AHMED', 'MST LEPY BEGUM', 'তামান্না হক রিমি', 'মোঃ ফরিদ আহমেদ', 'মোসাঃ লিপি বেগম', 'FEMALE', '2010-03-10', '20103514327031099', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01956146695', '6Shapla54', 'IMG_20240210_0019.jpg', NULL),
(1870, 6, 'Class Six', 'Shapla', 56, 'TAHMID SHEIKH', 'MD MOTIAR RAHAMAN MINTU', 'MST SHUILE BEGUM', 'তাহমিদ শেখ', 'মোঃ মতিয়ার রহমান মিন্টু', 'মোছাঃ শিউলি বেগম', 'MALE', '2015-11-30', '20153534327046631', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01302470907', '6Shapla56', 'IMG_0031.jpg', NULL),
(1871, 6, 'Class Six', 'Shapla', 57, 'Sadia Khanam', 'Mofizur Sheik', 'Nila Begum', 'সাদিয়া খানম', 'মফিজুর শেখ', 'নিলা বেগম', 'FEMALE', '2013-02-11', '20132910384104917', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01856743035', '6Shapla57', 'IMG_0001.jpg', NULL),
(1872, 6, 'Class Six', 'Shapla', 58, 'MORIYAM KHANOM', 'MD LAL MIYA', 'MST RUPA BEGUM', 'মরিয়াম খানম', 'মোঃ লাল মিয়া', 'মোসাঃ রুপা বেগম', 'FEMALE', '2011-09-06', '20116515263009972', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01908095654', '6Shapla58', 'IMG_0007.jpg', NULL),
(1873, 6, 'Class Six', 'Shapla', 59, 'MD.MARUF HOSSAIN', 'MD.JAKIR SHAIK', 'CHAMPA BEGUM', 'মোঃমারুফ হোসেন', 'মোঃজাকির শেখ', 'চম্পা বেগম', 'MALE', '2011-02-07', '20113514327031403', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01925636672', '6Shapla59', 'IMG_59.png', NULL),
(1874, 6, 'Class Six', 'Shapla', 60, 'SHYAMOLI KHANOM', 'MD MONI MOLLA', 'PERVIN BEGUM', 'শ্যমলী খানম', 'মোঃ মনি মোল্যা', 'পারভীন বেগম', 'FEMALE', '2011-10-17', '20112910384105038', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01986751710', '6Shapla60', '60.jpg', NULL),
(1875, 6, 'Class Six', 'Shapla', 61, 'MD SAMIUL ISLAM ZIYA', 'MD MONI MIAH  SHEIKH', 'LATIFA BEGUM', 'মোঃ সামিউল ইসলাম জিয়া', 'মোঃ মনি মিয়া শেখ', 'লতিফা বেগম', 'MALE', '2012-06-02', '20123514327031405', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01742502546', '6Shapla61', 'IMG_20240210_0032.jpg', NULL),
(1876, 6, 'Class Six', 'Shapla', 62, 'KHADIZA TUL KUBRA', 'ABDUL HALIM MIA', 'KEYA BEGUM', 'খাদিজা তুল কুবরা', 'আব্দুল হালিম মিয়া', 'কেয়া বেগম', 'FEMALE', '2012-04-21', '20123514327034721', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01735657537', '6Shapla62', 'IMG_62.png', NULL),
(1877, 6, 'Class Six', 'Shapla', 63, 'TANVEER HASSAN', 'ENAMUL SHIKDER', 'RUMA BEGUM', 'তানভীর হাসান', 'ইনামুল শিকদার', 'রুমা বেগম', 'MALE', '2012-09-30', '20123514381040191', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01736770256', '6Shapla63', 'IMG_0005.jpg', NULL),
(1878, 6, 'Class Six', 'Shapla', 64, 'MAHIDA ISLAM', 'MD MOSHIUR RAHMAN', 'HALIMA', 'মাহিদা ইসলাম', 'মোঃ মশিউর রহমান', 'হালিমা', 'FEMALE', '2013-07-17', '20132910384104192', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01721158760', '6Shapla64', 'IMG_20240210_0028.jpg', NULL),
(1879, 6, 'Class Six', 'Shapla', 65, 'SHARIF TANJIMUR RAHMAN', 'SHARIF BOKTIAR ALI', 'NAZMUN NAHAR', 'শরীফ তানজীমুর রহমান', 'শরিফ বক্তিয়ার আলী', 'নাজমুন নাহার', 'MALE', '2014-03-13', '20143534327043990', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01792336544', '6Shapla65', 'IMG_20240210_0047.jpg', NULL),
(1880, 6, 'Class Six', 'Shapla', 66, 'MD. YESIN MOLLA', 'MD. IMRAN HOSSAIN', 'MST. TASLIMA KHANM', 'মো: ইয়াছিন মোল্যা', 'মো: ইমরান হোসেন', 'মোছা: তাসলিমা খানম', 'MALE', '2013-01-20', '20132910384104999', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01963002184', '6Shapla66', 'IMG_66.png', NULL),
(1881, 6, 'Class Six', 'Shapla', 67, 'REYA AKTAR TAMMI', 'MD RAZAUL MOLLAH', 'BITHI BAGUM', 'রিয়া আক্তার তাম্মি', 'মোঃ রেজাউল মোল্লা', 'বিথি বেগম', 'FEMALE', '2012-01-02', '20122910384103510', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01923745199', '6Shapla67', 'IMG_0036.jpg', NULL),
(1882, 6, 'Class Six', 'Shapla', 68, 'MUNNI KHANOM', 'JAHANGIR MOLLA', 'HOSNEARA BEGUM', 'মুন্নি খানম', 'জাহাঙ্গীর মোল্যা', 'হোসনেয়ারা বেগম', 'FEMALE', '2012-10-02', '20122910384104170', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01991848847', '6Shapla68', 'IMG_68.png', NULL),
(1883, 6, 'Class Six', 'Shapla', 69, 'KULSUM KHANAM', 'MD MILON MOLLA', 'NARGIS BEGUM', 'কুলছুম খানম', 'মোঃ মিলন মোল্যা', 'নার্গিস বেগম', 'FEMALE', '2012-09-12', '20126515263009642', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01993013380', '6Shapla69', 'IMG_7620.JPG', NULL),
(1884, 6, 'Class Six', 'Shapla', 70, 'MST SETU KHANAM', 'MD SUJON SHEIKH', 'KHADIJA', 'মোসাঃ সেতু খানম', 'মোঃ সুজন শেখ', 'খাদিজা', 'FEMALE', '2012-06-07', '20123514327031224', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01729774250', '6Shapla70', 'IMG_20240210_0042.jpg', NULL),
(1885, 6, 'Class Six', 'Shapla', 71, 'ILMA KHANAM', 'ANISUR RAHAMAN MUNSHI', 'SABINA KHANAM', 'ইলমা খানম', 'আনিসুর রহমান মুন্সী', 'ছাবিনা খানম', 'Male', '2012-10-16', '20123514381034703', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01924365787', '6Shapla71', 'IMG_0006.jpg', NULL),
(1886, 6, 'Class Six', 'Shapla', 72, 'MD OVI SHEIKH', 'MD ALAMGIR HOSHAIN', 'MST ANJU', 'মোঃ অভি শেখ', 'মোঃ আলমগীর হোসেন', 'মোসাঃ আনজু', 'MALE', '2012-12-31', '20123534327045503', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01720922103', '6Shapla72', 'IMG_20240210_0043.jpg', NULL),
(1887, 6, 'Class Six', 'Shapla', 73, 'TONMOY SARKER', 'TAPON SHARKER', 'SHILPI RANI SHARKAR', 'তন্ময় সরকার', 'তপন সরকার', 'শিল্পী রানী সরকার', 'MALE', '2012-03-21', '20123514327032815', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '0198017496', '6Shapla73', 'IMG_20240210_0023.jpg', NULL),
(1888, 6, 'Class Six', 'Shapla', 74, 'MST MAHIYA KHATUN', 'ZAFOR FOKER', 'FORIDA BEGUM', 'মোছাঃ মাহিয়া খাতুন', 'জাফর ফকির', 'ফরিদা বেগম', 'FEMALE', '2013-05-01', '20133514327031083', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01320632161', '6Shapla74', 'six74.jpg', NULL),
(1889, 6, 'Class Six', 'Shapla', 75, 'moriyam khanom', 'md anisur rahman', 'mrs forida begum', 'মরিয়াম খানম', 'মোঃ আমিনুর শেখ', 'মোসাঃ ফরিদা বেগম', 'MALE', '2012-05-07', '20123514327032242', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01939107091', '6Shapla75', 'six 75 copy.jpg', NULL),
(1890, 6, 'Class Six', 'Shapla', 76, 'ROHAN', 'MD NURUZZAMAN MINTU', 'MST SABANA KHANUM', 'রোহান', 'মোঃ নুরুজ্জামান মিন্টু', 'মোসাঃ সাবানা খানম', 'MALE', '2012-07-22', '20123514327034911', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01740606929', '6Shapla76', 'IMG_20240210_0004.jpg', NULL),
(1891, 6, 'Class Six', 'Shapla', 77, 'MIM KHANAM', 'MD MANNU SHEIKH', 'IRIN BEGUM', 'মিম খানম', 'মোঃ মান্নু শেখ', 'আইরিন বেগম', 'FEMALE', '2012-11-15', '20123514327029488', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01991481566', '6Shapla77', 'IMG_20240210_0044.jpg', NULL),
(1892, 6, 'Class Six', 'Shapla', 78, 'SAMPADA MALAKAR', 'SANGIT KUMAR MALAKAR', 'DULALI BEPARI', 'সম্পদ মালাকার', 'সনজিত কুমার মালাকার', 'দুলালী বেপারী', 'FEMALE', '2012-12-31', '20123514381034952', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01738551257', '6Shapla78', 'IMG_78.png', NULL),
(1893, 6, 'Class Six', 'Shapla', 79, 'SHOUROV BISWAS', 'VOBESH KUMAR BISWAS', 'SANDA RANI BISWAS', 'সৌরভ বিশ্বাস', 'ভবেশ কুমার বিশ্বাস', 'সন্ধ্যা রানী বিশ্বাস', 'MALE', '2011-09-27', '20113534327043185', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01747606932', '6Shapla79', 'six_79 copy.jpg', NULL),
(1894, 6, 'Class Six', 'Shapla', 80, 'Jamila', 'PARVES  SHEIKH', 'MST MARIZA  BEGUM', 'জামিলা', 'পারভেজ শেখ', 'মোছাঃ মারিজা বেগম', 'FEMALE', '2012-08-27', '20123514327031698', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01793414603', '6Shapla80', 'IMG_20240210_0036.jpg', NULL),
(1895, 6, 'Class Six', 'Golap', 81, 'MORIAM KHANAM', 'MD JOYNAL MOLLA', 'MST SALMA SULTANA', 'মরিয়ম খানম', 'মোঃ জয়নাল মোল্যা', 'মোছাঃ সালমা সুলতানা', 'FEMALE', '2011-09-08', '20113514327031179', '0', '0', 'Not Avliable', '01745387075', '6Golap81', 'six 81.jpg', NULL),
(1896, 6, 'Class Six', 'Golap', 82, 'AL NOMAN SHEIKH', 'MD KAMRUJJAMAN', 'NASRIN BEGUM', 'আল নোমান শেখ', 'মোঃ কামরুজ্জামান', 'নাসরিন বেগম', 'MALE', '2014-01-25', '20143514327033694', '0', '0', 'Not Avliable', '01310509312', '6Golap82', 'IMG_82.png', NULL),
(1897, 6, 'Class Six', 'Golap', 83, 'AZMAN HASAN OMI', 'MONIRUL HASAN', 'NURUNNAHAR KHANAM', 'আজমান হাসান অমি', 'মনিরুল হাসান', 'নুরুন্নাহার খানম', 'MALE', '2012-02-10', '20123514327032755', '0', '0', 'Not Avliable', '01711621192', '6Golap83', 'IMG_0043.jpg', NULL),
(1898, 6, 'Class Six', 'Golap', 84, 'AVIJIT BISWAS', 'COMARAS CHANDRA BISWAS', 'SILPY BISWAS', 'অভিজিৎ বিশ্বাস', 'কুমারেশ চন্দ্র বিশ্বাস', 'শিল্পী বিশ্বাস', 'MALE', '2009-09-15', '20093514327030917', '0', '0', 'Not Avliable', '01729796455', '6Golap84', 'IMG_20240210_0024.jpg', NULL),
(1899, 6, 'Class Six', 'Golap', 85, 'SINTHIA AKTER BINTU', 'MD SHID BISWAS', 'REMA BEGUM', 'সিনধিয়া আক্তার বিন্তু', 'মোঃ শহীদ বিশ্বাস', 'রিমা বেগম', 'FEMALE', '2012-10-25', '20123514327031130', '0', '0', 'Not Avliable', '01726209645', '6Golap85', 'SIX85.jpg', NULL),
(1900, 6, 'Class Six', 'Golap', 86, 'SOMAIYA', 'SHEIKH  ATIAR  RAHMAN', 'LUNA BEGUM', 'সোমাইয়া', 'শেখ আতিয়ার রহমান', 'লোনা বেগম', 'FEMALE', '2012-07-07', '20123534327041882', '0', '0', 'Not Avliable', '01839262639', '6Golap86', 'IMG_86.png', NULL),
(1901, 6, 'Class Six', 'Golap', 87, 'RAHUL MOLLA', 'MD RAZU MOLLA', 'MST BOBITA BEGUM', 'রাহুল মোল্লা', 'মোঃ রাজু মোল্লা', 'মোছাঃ ববিতা বেগম', 'MALE', '2011-04-23', '20113534327047405', '0', '0', 'Not Avliable', '01787723422', '6Golap87', 'IMG_0042.jpg', NULL),
(1902, 6, 'Class Six', 'Golap', 88, 'RAHIM MOLLA', 'MD RUHUL AMIN', 'RUMA', 'রাহিম মোল্যা', 'মোঃ রুহুল আমিন', 'রুমা', 'MALE', '2013-12-02', '20136515263010247', '0', '0', 'Not Avliable', '01328168057', '6Golap88', 'SIX88.jpg', NULL),
(1903, 6, 'Class Six', 'Golap', 89, 'SUMAIYA', 'MD OSMAN SHAIKH', 'JESMIN', 'সুমাইয়া', 'মোঃ ওসমান শেখ', 'জেসমিন', 'FEMALE', '2013-01-30', '20133534327040695', '0', '0', 'Not Avliable', '01602869126', '6Golap89', 'IMG_0040.jpg', NULL),
(1904, 6, 'Class Six', 'Golap', 90, 'borsa khanom', 'Md. Rabiul Islam', 'Sheema Akter', 'বর্শা খানম', 'মো: রবিউল ইসলাম', 'সীমা আক্তার', 'FEMALE', '2013-01-19', '20136515263009300', '0', '0', 'Not Avliable', '01404309161', '6Golap90', 'IMG_0041.jpg', NULL),
(1905, 6, 'Class Six', 'Golap', 91, 'JIMIYA KHANAM', 'SHEIKH MD SAKHOYAT HOSSAIN', 'TAJMIN SULTANA', 'জিমীয়া খানম', 'শেখ মোঃ সাখাওয়াত হোসেন', 'তাজমিন সুলতানা', 'FEMALE', '2013-03-12', '20133514327034225', '0', '0', 'Not Avliable', '01953136024', '6Golap91', 'IMG_0038.jpg', NULL),
(1906, 6, 'Class Six', 'Golap', 92, 'Sayma Jannat Saba', 'Md. Badsha Mia', 'ROZINA BEGUM', 'সায়মা জান্নাত সাবা', 'মোঃ বাদশা মিয়া', 'রোজিনা বেগম', 'FEMALE', '2013-08-01', '20133514327032050', '0', '0', 'Not Avliable', '01947734860', '6Golap92', 'IMG_0044.jpg', NULL),
(1907, 6, 'Class Six', 'Golap', 93, 'JONY MOLLA', 'MD ALAMGIR MOLLA', 'FARIDA PARVIN', 'জনি মোল্লা', 'মোঃ আলমগীর মোল্যা', 'ফরিদা  পারভীন', 'MALE', '2011-12-10', '20113514327030854', '0', '0', 'Not Avliable', '01314706877', '6Golap93', 'IMG_20240210_0030.jpg', NULL),
(1908, 6, 'Class Six', 'Golap', 94, 'Nirob Biswas', 'Nimai Biswas', 'Beauty Biswas', 'নিরব বিশ্বাস', 'নিমাই বিশ্বাস', 'বিউটি বিশ্বাস', 'MALE', '2012-07-24', '20123514327032642', '0', '0', 'Not Avliable', '01917344164', '6Golap94', 'IMG_20240210_0011.jpg', NULL),
(1909, 6, 'Class Six', 'Golap', 95, 'KAJOLI ISLAM MITU', 'MDKAMAL FAKIR', 'RUNA BEGUM', 'কাজলি ইসলাম মিতু', 'মোঃ কামাল ফকির', 'রুনা বেগম', 'FEMALE', '2012-04-03', '20123514327031239', '0', '0', 'Not Avliable', '01991377323', '6Golap95', 'IMG_0045.jpg', NULL),
(1910, 6, 'Class Six', 'Golap', 96, 'JERMIN ISLAM', 'MD SHABU SHAIKE', 'MST RIKTA PARVIN', 'জারমিন ইসলাম', 'মোঃ সাবু সেখ', 'মোছাঃ রিক্তা পারভীন', 'FEMALE', '2013-02-08', '20133514327031696', '0', '0', 'Not Avliable', '01758035695', '6Golap96', 'IMG_20240210_0027.jpg', NULL),
(1911, 6, 'Class Six', 'Golap', 97, 'SUMAYA KHANAM', 'MD ARROZ ALI', 'MST CHADIA  BEGUM', 'সুমাইয়া খানম', 'মো আরজ আলী', 'মোসাঃ ছাদিয়া   বেগম', 'Male', '2013-05-01', '20136515263010568', '0', '0', 'Not Avliable', '01992731610', '6Golap97', 'IMG_0046.jpg', NULL),
(1912, 6, 'Class Six', 'Golap', 98, 'AFSANA RIMI', 'MD. TORIQUL ISLAM', 'MST. SHAHENA BEGUM', 'আফসানা রিমি', 'মোঃ তরিকুল ইসলাম', 'মোসাঃ শাহিনা বেগম', 'FEMALE', '2012-09-21', '20126515263010124', '0', '0', 'Not Avliable', '01707299200', '6Golap98', 'IMG_20240210_0026.jpg', NULL),
(1913, 6, 'Class Six', 'Golap', 99, 'SABRINA', 'KAZI SHA ALAM', 'SALINA ALAM', 'সাবরিনা', 'কাজী শাহ আলম', 'সেলিনা আলম', 'FEMALE', '2013-02-22', '20136515263011235', '0', '0', 'Not Avliable', '01918412423', '6Golap99', 'IMG_0021.jpg', NULL),
(1914, 6, 'Class Six', 'Golap', 100, 'TONNI KHANOM', 'JAHANGIR MOLLA', 'HOSNEARA BEGUM', 'তন্নি খানম', 'জাহাঙ্গীর মোল্যা', 'হোসনেয়ারা বেগম', 'FEMALE', '2012-10-02', '20122910384104171', '0', '0', 'Not Avliable', '01991848847', '6Golap100', 'IMG_100.png', NULL),
(1915, 6, 'Class Six', 'Golap', 101, 'JHUMUR KHANAM', 'MD ZAHIR HASAN MOLLA', 'MST ANJURA', 'ঝুমুর খানম', 'মোঃজহির হাসান মোল্যা', 'মোছাঃ আনজুয়ারা', 'FEMALE', '2012-05-23', '20123514327028088', '0', '0', 'Not Avliable', '01870596260', '6Golap101', 'IMG_20240210_0022.jpg', NULL),
(1916, 6, 'Class Six', 'Golap', 102, 'MASURA KHANAM', 'MASUD  RANA', 'MOMTAZ', 'মাসুরা খানম', 'মাসুদ রানা', 'মমতাজ', 'FEMALE', '2011-05-16', '20112910384112708', '0', '0', 'Not Avliable', '01818791299', '6Golap102', 'IMG_0039.jpg', NULL),
(1917, 6, 'Class Six', 'Golap', 103, 'ELMA KHANAM', 'MD ASGAR HOSSAIN', 'SHILPI KHANAM', 'ইলমা খানম', 'মোঃ আজগর হোসেন', 'শিল্পী খানম', 'FEMALE', '2014-03-09', '20143514327033154', '0', '0', 'Not Avliable', '01919824907', '6Golap103', 'IMG_20240210_0006.jpg', NULL),
(1918, 6, 'Class Six', 'Golap', 104, 'MD. CIYAM MUNSHI', 'MD PANNU MUNSHI', 'NASIMA KHANAM', 'মো: ছিয়াম মুন্সী', 'মোঃ পান্নু মুন্সী', 'নাসিমা খানম', 'MALE', '2012-01-10', '20126515218102999', '0', '0', 'Not Avliable', '01760086631', '6Golap104', 'IMG_20240210_0035.jpg', NULL),
(1919, 6, 'Class Six', 'Golap', 105, 'SUMAIYA KHANAM', 'MD MILON BISWAS', 'TANIA KHANOM', 'ছুমাইয়া খানম', 'মোঃ মিলন বিশ্বাস', 'তানিয়া খানম', 'FEMALE', '2012-07-25', '20123514327031338', '0', '0', 'Not Avliable', '0185226294', '6Golap105', 'IMG_20240210_0037.jpg', NULL),
(1920, 6, 'Class Six', 'Golap', 106, 'Mahfuj Hasan', 'Md. Miraj Sheikh', 'Mita Begum', 'মাহাফুজ হাচান', 'মোঃ মিরাজ শেখ', 'মিতা বেগম', 'MALE', '2012-01-01', '20123514327030662', '0', '0', 'Not Avliable', '01994048744', '6Golap106', 'IMG_0019.jpg', NULL),
(1921, 6, 'Class Six', 'Golap', 107, 'TAPUR BISWAS', 'PARITOSH KUMAR BISWAS', 'KAKOLI RANI BISWAS', 'টাপুর বিশ্বাস', 'পরিতোষ কুমার বিশ্বাস', 'কাকলী রানী বিশ্বাস', 'FEMALE', '2013-06-13', '20133514327029447', '0', '0', 'Not Avliable', '01920310224', '6Golap107', 'IMG_0023.jpg', NULL),
(1922, 6, 'Class Six', 'Golap', 108, 'Fatema Khanam', 'Md. Taleb Sheikh', 'RUPA BEGUM', 'ফাতেমা খানম', 'মোঃ তালেব শেখ', 'রুপা বেগম', 'FEMALE', '2011-03-02', '20113514381034454', '0', '0', 'Not Avliable', '01304988877', '6Golap108', 'SIX108.jpg', NULL),
(1923, 6, 'Class Six', 'Golap', 109, 'JANNATI AKTER', 'MD TOYEB ALI SHAIKH', 'POLI KHANAM', 'জান্নাতি আক্তার', 'মোঃ তৈয়ব আলী সেখ', 'পলী খানম', 'FEMALE', '2013-08-01', '20133514327032784', '0', '0', 'Not Avliable', '01923305580', '6Golap109', 'IMG_0052.jpg', NULL),
(1924, 6, 'Class Six', 'Golap', 110, 'RUKEYA KHANOM', 'MD ELAZET MOLLA', 'MST HENA BEGUM', 'রুকাইয়া খানম', 'মোঃ ইলাজেত মোল্যা', 'মোসাঃ হেনা বেগম', 'FEMALE', '2012-03-11', '20126515263010528', '0', '0', 'Not Avliable', '01960462199', '6Golap110', 'IMG_110.png', NULL),
(1925, 6, 'Class Six', 'Golap', 111, 'JAMELA SARDER', 'MD SUKUR SARDER', 'MUNNE AKTER', 'জামেলা সরদার', 'মোঃশুকুর সরদার', 'মুন্নি আক্তার', 'FEMALE', '2013-02-08', '20133514327030648', '0', '0', 'Not Avliable', '01721784300', '6Golap111', 'IMG_20240210_0040.jpg', NULL),
(1926, 6, 'Class Six', 'Golap', 112, 'JAMIA', 'MD JEUEL SHEIKH', 'MASURA KHANAM', 'জামিয়া', 'মোঃ জুয়েল শেখ', 'মাছুরা খানম', 'FEMALE', '2012-10-09', '20123514327032658', '0', '0', 'Not Avliable', '01918804026', '6Golap112', 'IMG_20240210_0021.jpg', NULL),
(1927, 6, 'Class Six', 'Golap', 113, 'BICHITRA BISWAS', 'BIPLOB BISWAS', 'RAKHA RANI BISWAS', 'বিচিত্র বিশ্বাস', 'বিপ্লব বিশ্বাস', 'রেখা রানী বিশ্বাস', 'MALE', '2012-08-14', '20123514327030251', '0', '0', 'Not Avliable', '0', '6Golap113', 'IMG_20240210_0016.jpg', NULL),
(1928, 6, 'Class Six', 'Golap', 115, 'MD. AL SADI TALUKDER', 'MD. NAZMUL HASAN TALUKDER', 'SHARMIN AKTER', 'মো: আল সাদি তালুকদার', 'কদতকতদকতদ', 'দকতকতদকতদ', 'MALE', '2012-10-01', '20122692512157358', '0', '0', 'Not Avliable', '01924092411', '6Golap115', 'IMG_20240210_0017.jpg', NULL),
(1929, 6, 'Class Six', 'Golap', 118, 'CHANDRA BAROY TREESA', 'No Data ON BRIS BD', 'No Data ON BRIS BD', 'চন্দ্রা বাড়ৈ তৃষা', 'কৌশিক বাড়ৈ', 'চঞ্চলা বাড়ৈ', 'FEMALE', '2012-11-25', '20123522507054246', '0', '0', 'Not Avliable', '01761592372', '6Golap118', 'IMG_20240210_0029.jpg', NULL),
(1930, 6, 'Class Six', 'Golap', 114, 'Md. Afizur Rahman', 'Md. Monir Hossain Mridha', '', 'g', 'g', 'g', 'MALE', '2023-12-27', '0', '0', '0', 'Not Avliable', '0', '6Golap114', 'IMG_20240210_0007.jpg', NULL),
(1931, 6, 'Class Six', 'Golap', 117, 'Antor Biswas', 'Sribas Biswas', 'g', 'g', 'g', 'g', 'MALE', '2023-12-27', '0', '0', '0', 'Not Avliable', '0', '6Golap117', '117.jpg', NULL),
(1932, 9, 'Class Nine', 'B', 172, 'SAMIA AKTER ETI', 'HEMAYET UDDIN', 'RABEYA', 'সামিয়া আক্তার ইতি', 'হিমায়েত উদ্দিন', 'রাবেয়া', 'FEMALE', '2009-11-03', '20093514327028518', '0', '0', 'Not Avliable', '01776711075', '9B172', 'IMG_20240210_0014.jpg', NULL),
(1933, 7, 'Class Seven', 'B', 157, 'tasnim jannat', 'md robul islam', 'rasona khanom', 'তাসনীম জান্নাত', 'মোঃ রবিউল ইসলাম', 'রেক্রনা খানম', 'FEMALE', '2012-02-29', '20123514327034572', '0', '0', 'Not Avliable', '01820560860', '7B157', '157.jpg', NULL),
(1934, 6, 'Class Six', 'Golap', 116, 'Rihat Khondokar', 'Md. Rasel Khondokar', 'Sweety Begum', 'রিহাদ খন্দকার', 'মো: রাসেল খন্দকার', 'সুইটি বেগম', 'MALE', '2013-04-03', '20136515263010959', '0', '0', 'Not Avliable', '01961972078', '6Golap116', 'SIX116.jpg', NULL),
(1935, 8, 'Class Eight', 'A', 173, 'ZIHADUL ISLAM NIROB', 'MD MUNZURUL ISLAM', 'ASIA BEGUM', 'জিহাদুল ইসলাম নিরব', 'মোঃ মঞ্জুরুল  ইসলাম', 'আছিয়া বেগম', 'MALE', '2010-11-03', '20106515218117584', '0', '0', 'Not Avliable', '01789763720', '8A173', 'IMG_7622.JPG', NULL),
(1936, 6, 'Class Six', 'Golap', 120, 'MD SUMON SHEIKH', 'MD HASANUR RAHAMAN', 'HELENA BEGUM', 'মোঃসুমন শেখ', 'মোঃ হাসানুর রহমান', 'হেলেনা বেগম', 'MALE', '2012-08-03', '20123514327032113', '0', '0', 'Not Avliable', '01792244098', '6Golap120', 'IMG_0029.jpg', NULL),
(1937, 8, 'Class Eight', 'B', 174, 'LAMIA  KHANAM', 'MD RANA  SHEKH', 'MST  HUSNA', 'লামিয়া খানম', 'মোঃ রানা শেখ', 'মোসাঃ  হোসনা', 'FEMALE', '2009-11-12', '20093534327039450', '0', '0', 'Not Avliable', '01710925988', '8B174', 'IMG_174.png', NULL),
(1938, 6, 'Class Six', 'Golap', 119, 'MD RABBI MOLLA', 'MD MUSA MOLLA', 'RATNA KHANAM', 'মো:রাব্বি মোল্যা', 'মো:মুসা মোল্যা', 'রত্না খানম', 'MALE', '2011-12-18', '20113514354017895', '0', '0', 'Not Avliable', '01938487332', '6Golap119', 'IMG_7621.JPG', NULL),
(1939, 6, 'Class Six', 'Golap', 150, 'MD SUMON SHEIKH', 'MD HASANUR RAHAMAN', 'HELENA BEGUM', 'মোঃসুমন শেখ', 'মোঃ হাসানুর রহমান', 'হেলেনা বেগম', 'MALE', '2012-08-03', '20123514327032113', '0', '0', 'Not Avliable', '0', '6Golap150', 'IMG_150.png', NULL),
(1940, 10, 'Class Ten', 'Science', 9, 'Md: Maruf Hasan', 'Masud Mollick', 'Sathe Akter', 'মোঃ মারুফ হাসান', 'মাসুদ মল্লিক', 'সাথী আক্তার', 'MALE', '2007-10-27', '20072910384102778', '0', '0', 'Not Avliable', '01874627240', '10Science9', 'IMG_9.png', NULL),
(1941, 7, 'Class Seven', 'A', 158, 'Sheam Rahaman', 'Md. Mafizur Rahaman', 'Shahida Akter', 'N/A', 'N/A', 'N/A', 'Male', '2008-08-19', '0', '0', '0', 'N/A', '01778875610', '7A158', '.', NULL),
(1942, 8, 'Class Eight', 'B', 175, 'MISU JAMAN SAYMA', 'MD.MUNGOR BISAS', 'MRS.KAKOLI BEGUM', 'মিশু জামান ছায়মা', 'মোঃ মুন্জুর বিশ্বাস', 'মোছাঃ কাকলী বেগম', 'Female', '2010-01-01', '20103514327029000', '0', '0', 'Barashur', '01904926483', '8B175', '175.jpg', NULL),
(1943, 6, 'Class Six', 'Golap', 122, 'MAHINUL ISLAM RIAD', 'MAMUNUR RAHMAN', 'MST SHAMIMA BEGUM', 'মাহিনুল ইসলাম রিয়াদ', 'মামুনুর রহমান', 'মোছাঃ শামিমা বেগম', 'MALE', '2012-08-10', '20123514327033582', '0', '0', 'Not Avliable', '01836164487', '6Golap122', 'IMG_122.png', NULL),
(1944, 9, 'Class Nine', 'B', 173, 'SHAMMI', 'SHAHIDUR MOLLA', 'RASHIDA  BEGUM', 'শাম্মী', 'সহিদুর মোল্লা', 'রাশিদা বেগম', 'FEMALE', '2007-05-11', '20076515263012340', '0', '0', 'krisnopur', '01999897768', '9B173', 'Nine173.jpg', NULL),
(1945, 6, 'Class Six', 'Golap', 123, 'MD. HABIB SIKDER', 'MD. MOSTOFA SIKDER', 'HAOWA BEGUM', 'মোঃ হাবিব সিকদার', 'মোঃ মোস্তফা শিকদার', 'হাওয়া বেগম', 'MALE', '2010-07-20', '20123514381033400', '0', '0', 'Not Avliable', '01771386420', '6Golap123', 'IMG_0025.jpg', NULL),
(1946, 6, 'Class Six', 'Golap', 124, 'MD  RAIHAN', 'MD RAJU THAKUR', 'KALPONA KHANAM', 'মোঃ   রাইহান', 'মোঃ রাজু ঠাকুর', 'কল্পনা খানম', 'MALE', '2013-01-03', '20133514381039562', '0', '0', 'Not Avliable', '01758411589', '6Golap124', 'IMG_20240210_0003.jpg', NULL),
(1947, 6, 'Class Six', 'Mollika', 125, 'S M RHYME AHASAN  POLOK', 'RAJIB AHASAN', 'DIPA KHANAM RONI', 'এস এম রাইম এহসান পলক', 'রাজীব এহসান', 'দিপা খানম রনি', 'MALE', '2015-11-09', '20153534327044393', '0', '0', 'Not Avliable', '01713571374', '6Mollika125', 'IMG_0022.jpg', NULL),
(1948, 6, 'Class Six', 'Mollika', 126, 'MISS SUMAIYA KHANAM', 'MD LITON BISWAS', 'RASHIDA BEGUM', 'মিস সুমাইয়া খানম', 'মোঃ লিটন বিশ্বাস', 'রাশিদা বেগম', 'FEMALE', '2012-03-18', '20123514327028607', '0', '0', 'Not Avliable', '01722019637', '6Mollika126', 'IMG_126.png', NULL),
(1949, 7, 'Class Seven', 'A', 159, 'MD MAHIM ISLAM KHAN', 'Md Roman Khan', 'Mst Masura Begum', 'মোঃ মাহিম ইসলাম খান', 'মোঃ রোমান খান', 'মোসাঃ মাছুরা বেগম', 'MALE', '2013-03-01', '20136515223035530', '0', '0', 'Not Avliable', '01987446456', '7A159', 'IMG_176.png', NULL),
(1950, 6, 'Class Six', 'Mollika', 22, 'TASFIYA HOSSAIN', 'SHAKHAWAT HOSSAIN', 'DOLON AKTER', 'তাসফিয়া হোসেন', 'সাখাওয়াৎ হোসেন', 'দোলন আক্তার', 'FEMALE', '2013-08-08', '20132910384104347', '0', '0', 'Not Avliable', '0195869322', '6Mollika22', 'IMG_0047.jpg', NULL),
(1951, 6, 'Class Six', 'Mollika', 127, 'SUMIA KAZI', 'MD SHIMUL KAZI', 'AMENA BEGUM', 'সুমাইয়া কাজী', 'মোঃশিমুল কাজী', 'আমেনা বেগম', 'FEMALE', '2014-05-01', '20143514327033989', '0', '0', 'Not Avliable', '01759566394', '6Mollika127', 'SIX127.jpg', NULL),
(1952, 7, 'Class Seven', 'A', 160, 'SHIBAJIT KUMAR GHOSH', 'BISWAJIT GHOSH', 'LOPA RANI GHOSH', 'শিবাজিৎ কুমার ঘোষ', 'বিশ্বজিত ঘোষ', 'লোপা রানী ঘোষ', 'MALE', '2009-01-11', '20092910384103509', '0', '0', 'TAGARBAND', '01717818348', '7A160', 'IMG_160.png', NULL),
(1953, 6, 'Class Six', 'Shapla', 128, 'moriyam khanom', 'md anisur rahman', 'mrs forida begum', 'মরিয়াম খানম', 'মোঃ আমিনুর শেখ', 'মোসাঃ ফরিদা বেগম', 'Female', '2012-05-07', '20123514327032242', '0', '0', 'Vill: Bhatiapara, Post: Bhatiapara, PS: Kashiani, DS: Gopalganj', '01759618908', '6Shapla128', '128.jpg', NULL),
(1954, 9, 'Class Nine', 'A', 141, 'AL SADIK  BISWAS', 'MD NASIR  BISWAS', 'MST SHIDA  BEGUM', 'আল ছাদিক  বিশ্বাস', 'মোঃ নাছির  বিশ্বাস', 'মোছাঃ সাহিদা  বেগম', 'MALE', '2009-04-04', '20093534327035427', '0', '0', 'Not Avliable', '01748421618', '9A141', 'IMG_141.png', NULL),
(1955, 6, 'Class Six', 'Mollika', 523, 'FATEMA ISLAM', 'MD HACHIB MOLLA', 'FARIDA BEGUM', 'ফাতেমা ইসলাম', 'মোঃহাছিব মোল্যা', 'ফরিদা বেগম', 'FEMALE', '2013-04-01', '20133514347013534', '0', '0', 'GOPALGANJ', '01783808373', '6Mollika523', 'IMG_20240529_101019.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `plainpass` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `studentpayment`
--

CREATE TABLE `studentpayment` (
  `id` int(11) NOT NULL,
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
  `puniid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `studentpayment`
--

INSERT INTO `studentpayment` (`id`, `pcatid`, `classnumber`, `secgroupname`, `stuid`, `roll`, `stuname`, `des`, `total`, `totalpay`, `due`, `status`, `date`, `puniid`) VALUES
(2, 1, 6, 'Mollika', '6Mollika2', 2, 'Ummia Moriym', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika2'),
(3, 1, 6, 'Mollika', '6Mollika3', 3, 'MUSFIKA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika3'),
(4, 1, 6, 'Mollika', '6Mollika4', 4, 'Jannatul Tazri', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika4'),
(5, 1, 6, 'Mollika', '6Mollika5', 5, 'TASMIA KHANAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika5'),
(6, 1, 6, 'Mollika', '6Mollika6', 6, 'MD HABIB SHEIKH', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika6'),
(7, 1, 6, 'Mollika', '6Mollika7', 7, 'TASMIM AFROJ  KHADIJA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika7'),
(8, 1, 6, 'Mollika', '6Mollika8', 8, 'KAREMA KHANAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika8'),
(9, 1, 6, 'Mollika', '6Mollika9', 9, 'FARDIN HASAN AYON', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika9'),
(10, 1, 6, 'Mollika', '6Mollika10', 10, 'MD JISAN SHEIKH', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika10'),
(11, 1, 6, 'Mollika', '6Mollika11', 11, 'MAINUL ISLAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika11'),
(12, 1, 6, 'Mollika', '6Mollika12', 12, 'BAISHAKHI', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika12'),
(13, 1, 6, 'Mollika', '6Mollika13', 13, 'MD FAISAL HASAN RAJ', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika13'),
(14, 1, 6, 'Mollika', '6Mollika14', 14, 'BARIDHY AKTER', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika14'),
(15, 1, 6, 'Mollika', '6Mollika15', 15, 'RUBAIYA KHANOM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika15'),
(16, 1, 6, 'Mollika', '6Mollika16', 16, 'HUSAIMA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika16'),
(17, 1, 6, 'Mollika', '6Mollika17', 17, 'MARIA ISLAM KARIMA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika17'),
(18, 1, 6, 'Mollika', '6Mollika18', 18, 'ELMA KHANAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika18'),
(19, 1, 6, 'Mollika', '6Mollika19', 19, 'Tasfia Tahsin', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika19'),
(20, 1, 6, 'Mollika', '6Mollika20', 20, 'MD IBRAHIM MOLLA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika20'),
(21, 1, 6, 'Mollika', '6Mollika21', 21, 'MIM KHANOM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika21'),
(22, 1, 6, 'Mollika', '6Mollika22', 22, 'TASFIYA HOSSAIN', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika22'),
(23, 1, 6, 'Mollika', '6Mollika23', 23, 'NAZMUL HASAN NASIM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika23'),
(24, 1, 6, 'Mollika', '6Mollika24', 24, 'MD ALAMIN SARDER', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika24'),
(25, 1, 6, 'Mollika', '6Mollika25', 25, 'MD HABIB MOLLA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika25'),
(26, 1, 6, 'Mollika', '6Mollika26', 26, 'MAHEYA KHANAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika26'),
(27, 1, 6, 'Mollika', '6Mollika27', 27, 'RUMAN SHEIKH', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika27'),
(28, 1, 6, 'Mollika', '6Mollika28', 28, 'ARMIM KHANAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika28'),
(29, 1, 6, 'Mollika', '6Mollika29', 29, 'MABIYA AKTER BORSA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika29'),
(30, 1, 6, 'Mollika', '6Mollika30', 30, 'TAMANNA AKTER', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika30'),
(31, 1, 6, 'Mollika', '6Mollika31', 31, 'MST HACIYA KHATUN  NILA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika31'),
(32, 1, 6, 'Mollika', '6Mollika32', 32, 'TAMIM AHMMED ARKO', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika32'),
(33, 1, 6, 'Mollika', '6Mollika33', 33, 'Md. Tashin Hasan', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika33'),
(34, 1, 6, 'Mollika', '6Mollika34', 34, 'NIPA BISWAS', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika34'),
(35, 1, 6, 'Mollika', '6Mollika35', 35, 'SURIYA  SNAHA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika35'),
(36, 1, 6, 'Mollika', '6Mollika36', 36, 'Halima Tus Sadia', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika36'),
(37, 1, 6, 'Mollika', '6Mollika37', 37, 'MD ZIHAD BISWAS', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika37'),
(38, 1, 6, 'Mollika', '6Mollika38', 38, 'SANJIDA', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika38'),
(39, 1, 6, 'Mollika', '6Mollika39', 39, 'Anisha Khanom', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika39'),
(40, 1, 6, 'Mollika', '6Mollika40', 40, 'SRABON BISWAS', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika40'),
(41, 1, 6, 'Mollika', '6Mollika125', 125, 'S M RHYME AHASAN  POLOK', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika125'),
(42, 1, 6, 'Mollika', '6Mollika126', 126, 'MISS SUMAIYA KHANAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika126'),
(43, 1, 6, 'Mollika', '6Mollika127', 127, 'SUMIA KAZI', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika127'),
(44, 1, 6, 'Mollika', '6Mollika523', 523, 'FATEMA ISLAM', 'Admission Fee', 50, 0, 50, 'Unpaid', '2024-01-01', '16Mollika523'),
(94, 1, 6, 'Mollika', '6Mollika1', 1, 'Md. Sizan Rahman Sarder', 'Admission Fee', 120, 120, 0, 'Paid', '2024-01-01', '16Mollika1');

-- --------------------------------------------------------

--
-- Table structure for table `sturegstatus`
--

CREATE TABLE `sturegstatus` (
  `id` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `regstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sturegstatus`
--

INSERT INTO `sturegstatus` (`id`, `classnumber`, `secgroupname`, `roll`, `uniqid`, `regstatus`) VALUES
(1, 7, 'A', 86, '7A86', 1),
(12, 7, 'A', 56, '7A56', 1),
(23, 7, 'A', 65, '7A65', 1),
(34, 7, 'A', 70, '7A70', 1),
(45, 7, 'A', 91, '7A91', 1),
(56, 7, 'A', 79, '7A79', 1),
(67, 7, 'A', 67, '7A67', 1),
(78, 7, 'A', 60, '7A60', 1),
(89, 7, 'A', 59, '7A59', 1),
(100, 7, 'A', 53, '7A53', 1),
(111, 7, 'A', 63, '7A63', 1),
(122, 7, 'A', 75, '7A75', 1),
(133, 7, 'A', 17, '7A17', 1),
(144, 7, 'A', 14, '7A14', 1),
(155, 7, 'A', 33, '7A33', 1),
(166, 7, 'A', 27, '7A27', 1),
(177, 7, 'A', 5, '7A5', 1),
(188, 7, 'A', 32, '7A32', 1),
(199, 7, 'A', 28, '7A28', 1),
(210, 7, 'A', 43, '7A43', 1),
(221, 7, 'A', 45, '7A45', 1),
(232, 7, 'A', 8, '7A8', 1),
(243, 7, 'A', 111, '7A111', 1),
(254, 7, 'A', 119, '7A119', 1),
(265, 7, 'A', 140, '7A140', 1),
(276, 7, 'A', 123, '7A123', 1),
(287, 7, 'A', 128, '7A128', 1),
(298, 7, 'A', 81, '7A81', 1),
(309, 7, 'A', 133, '7A133', 1),
(320, 7, 'A', 142, '7A142', 1),
(331, 7, 'A', 132, '7A132', 1),
(342, 7, 'A', 147, '7A147', 1),
(353, 7, 'A', 118, '7A118', 1),
(364, 7, 'A', 12, '7A12', 1),
(375, 7, 'A', 29, '7A29', 1),
(386, 7, 'A', 97, '7A97', 1),
(397, 7, 'A', 94, '7A94', 1),
(408, 7, 'A', 145, '7A145', 1),
(419, 7, 'A', 107, '7A107', 1),
(430, 7, 'A', 4, '7A4', 1),
(441, 7, 'A', 105, '7A105', 1),
(452, 7, 'A', 156, '7A156', 1),
(463, 7, 'A', 66, '7A66', 1),
(474, 7, 'A', 139, '7A139', 1),
(485, 7, 'A', 18, '7A18', 1),
(496, 7, 'A', 78, '7A78', 1),
(507, 7, 'A', 103, '7A103', 1),
(518, 7, 'A', 125, '7A125', 1),
(529, 7, 'A', 130, '7A130', 1),
(540, 7, 'A', 143, '7A143', 1),
(551, 7, 'A', 148, '7A148', 1),
(562, 7, 'A', 158, '7A158', 1),
(573, 7, 'A', 159, '7A159', 1),
(584, 7, 'A', 160, '7A160', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sturegsubject`
--

CREATE TABLE `sturegsubject` (
  `id` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroupname` varchar(255) NOT NULL,
  `roll` int(11) NOT NULL,
  `uniqid` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `subname` varchar(255) NOT NULL,
  `substatus` int(11) NOT NULL,
  `unisubstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sturegsubject`
--

INSERT INTO `sturegsubject` (`id`, `classnumber`, `secgroupname`, `roll`, `uniqid`, `subcode`, `subname`, `substatus`, `unisubstatus`) VALUES
(1, 7, 'A', 86, '7A86', 1, 'বাংলা', 1, '7A861'),
(2, 7, 'A', 86, '7A86', 2, 'English', 1, '7A862'),
(3, 7, 'A', 86, '7A86', 3, 'গণিত', 1, '7A863'),
(4, 7, 'A', 86, '7A86', 4, 'বিজ্ঞান', 1, '7A864'),
(5, 7, 'A', 86, '7A86', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A865'),
(6, 7, 'A', 86, '7A86', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A866'),
(7, 7, 'A', 86, '7A86', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A867'),
(8, 7, 'A', 86, '7A86', 8, 'জীবন ও জীবিকা', 1, '7A868'),
(9, 7, 'A', 86, '7A86', 9, 'শিল্প ও সংস্কৃতি', 1, '7A869'),
(10, 7, 'A', 86, '7A86', 10, 'ইসলাম শিক্ষা', 1, '7A8610'),
(11, 7, 'A', 86, '7A86', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A8611'),
(12, 7, 'A', 56, '7A56', 1, 'বাংলা', 1, '7A561'),
(13, 7, 'A', 56, '7A56', 2, 'English', 1, '7A562'),
(14, 7, 'A', 56, '7A56', 3, 'গণিত', 1, '7A563'),
(15, 7, 'A', 56, '7A56', 4, 'বিজ্ঞান', 1, '7A564'),
(16, 7, 'A', 56, '7A56', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A565'),
(17, 7, 'A', 56, '7A56', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A566'),
(18, 7, 'A', 56, '7A56', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A567'),
(19, 7, 'A', 56, '7A56', 8, 'জীবন ও জীবিকা', 1, '7A568'),
(20, 7, 'A', 56, '7A56', 9, 'শিল্প ও সংস্কৃতি', 1, '7A569'),
(21, 7, 'A', 56, '7A56', 10, 'ইসলাম শিক্ষা', 1, '7A5610'),
(22, 7, 'A', 56, '7A56', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A5611'),
(23, 7, 'A', 65, '7A65', 1, 'বাংলা', 1, '7A651'),
(24, 7, 'A', 65, '7A65', 2, 'English', 1, '7A652'),
(25, 7, 'A', 65, '7A65', 3, 'গণিত', 1, '7A653'),
(26, 7, 'A', 65, '7A65', 4, 'বিজ্ঞান', 1, '7A654'),
(27, 7, 'A', 65, '7A65', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A655'),
(28, 7, 'A', 65, '7A65', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A656'),
(29, 7, 'A', 65, '7A65', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A657'),
(30, 7, 'A', 65, '7A65', 8, 'জীবন ও জীবিকা', 1, '7A658'),
(31, 7, 'A', 65, '7A65', 9, 'শিল্প ও সংস্কৃতি', 1, '7A659'),
(32, 7, 'A', 65, '7A65', 10, 'ইসলাম শিক্ষা', 1, '7A6510'),
(33, 7, 'A', 65, '7A65', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A6511'),
(34, 7, 'A', 70, '7A70', 1, 'বাংলা', 1, '7A701'),
(35, 7, 'A', 70, '7A70', 2, 'English', 1, '7A702'),
(36, 7, 'A', 70, '7A70', 3, 'গণিত', 1, '7A703'),
(37, 7, 'A', 70, '7A70', 4, 'বিজ্ঞান', 1, '7A704'),
(38, 7, 'A', 70, '7A70', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A705'),
(39, 7, 'A', 70, '7A70', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A706'),
(40, 7, 'A', 70, '7A70', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A707'),
(41, 7, 'A', 70, '7A70', 8, 'জীবন ও জীবিকা', 1, '7A708'),
(42, 7, 'A', 70, '7A70', 9, 'শিল্প ও সংস্কৃতি', 1, '7A709'),
(43, 7, 'A', 70, '7A70', 10, 'ইসলাম শিক্ষা', 1, '7A7010'),
(44, 7, 'A', 70, '7A70', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A7011'),
(45, 7, 'A', 91, '7A91', 1, 'বাংলা', 1, '7A911'),
(46, 7, 'A', 91, '7A91', 2, 'English', 1, '7A912'),
(47, 7, 'A', 91, '7A91', 3, 'গণিত', 1, '7A913'),
(48, 7, 'A', 91, '7A91', 4, 'বিজ্ঞান', 1, '7A914'),
(49, 7, 'A', 91, '7A91', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A915'),
(50, 7, 'A', 91, '7A91', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A916'),
(51, 7, 'A', 91, '7A91', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A917'),
(52, 7, 'A', 91, '7A91', 8, 'জীবন ও জীবিকা', 1, '7A918'),
(53, 7, 'A', 91, '7A91', 9, 'শিল্প ও সংস্কৃতি', 1, '7A919'),
(54, 7, 'A', 91, '7A91', 10, 'ইসলাম শিক্ষা', 1, '7A9110'),
(55, 7, 'A', 91, '7A91', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A9111'),
(56, 7, 'A', 79, '7A79', 1, 'বাংলা', 1, '7A791'),
(57, 7, 'A', 79, '7A79', 2, 'English', 1, '7A792'),
(58, 7, 'A', 79, '7A79', 3, 'গণিত', 1, '7A793'),
(59, 7, 'A', 79, '7A79', 4, 'বিজ্ঞান', 1, '7A794'),
(60, 7, 'A', 79, '7A79', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A795'),
(61, 7, 'A', 79, '7A79', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A796'),
(62, 7, 'A', 79, '7A79', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A797'),
(63, 7, 'A', 79, '7A79', 8, 'জীবন ও জীবিকা', 1, '7A798'),
(64, 7, 'A', 79, '7A79', 9, 'শিল্প ও সংস্কৃতি', 1, '7A799'),
(65, 7, 'A', 79, '7A79', 10, 'ইসলাম শিক্ষা', 1, '7A7910'),
(66, 7, 'A', 79, '7A79', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A7911'),
(67, 7, 'A', 67, '7A67', 1, 'বাংলা', 1, '7A671'),
(68, 7, 'A', 67, '7A67', 2, 'English', 1, '7A672'),
(69, 7, 'A', 67, '7A67', 3, 'গণিত', 1, '7A673'),
(70, 7, 'A', 67, '7A67', 4, 'বিজ্ঞান', 1, '7A674'),
(71, 7, 'A', 67, '7A67', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A675'),
(72, 7, 'A', 67, '7A67', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A676'),
(73, 7, 'A', 67, '7A67', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A677'),
(74, 7, 'A', 67, '7A67', 8, 'জীবন ও জীবিকা', 1, '7A678'),
(75, 7, 'A', 67, '7A67', 9, 'শিল্প ও সংস্কৃতি', 1, '7A679'),
(76, 7, 'A', 67, '7A67', 10, 'ইসলাম শিক্ষা', 1, '7A6710'),
(77, 7, 'A', 67, '7A67', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A6711'),
(78, 7, 'A', 60, '7A60', 1, 'বাংলা', 1, '7A601'),
(79, 7, 'A', 60, '7A60', 2, 'English', 1, '7A602'),
(80, 7, 'A', 60, '7A60', 3, 'গণিত', 1, '7A603'),
(81, 7, 'A', 60, '7A60', 4, 'বিজ্ঞান', 1, '7A604'),
(82, 7, 'A', 60, '7A60', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A605'),
(83, 7, 'A', 60, '7A60', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A606'),
(84, 7, 'A', 60, '7A60', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A607'),
(85, 7, 'A', 60, '7A60', 8, 'জীবন ও জীবিকা', 1, '7A608'),
(86, 7, 'A', 60, '7A60', 9, 'শিল্প ও সংস্কৃতি', 1, '7A609'),
(87, 7, 'A', 60, '7A60', 10, 'ইসলাম শিক্ষা', 1, '7A6010'),
(88, 7, 'A', 60, '7A60', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A6011'),
(89, 7, 'A', 59, '7A59', 1, 'বাংলা', 1, '7A591'),
(90, 7, 'A', 59, '7A59', 2, 'English', 1, '7A592'),
(91, 7, 'A', 59, '7A59', 3, 'গণিত', 1, '7A593'),
(92, 7, 'A', 59, '7A59', 4, 'বিজ্ঞান', 1, '7A594'),
(93, 7, 'A', 59, '7A59', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A595'),
(94, 7, 'A', 59, '7A59', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A596'),
(95, 7, 'A', 59, '7A59', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A597'),
(96, 7, 'A', 59, '7A59', 8, 'জীবন ও জীবিকা', 1, '7A598'),
(97, 7, 'A', 59, '7A59', 9, 'শিল্প ও সংস্কৃতি', 1, '7A599'),
(98, 7, 'A', 59, '7A59', 10, 'ইসলাম শিক্ষা', 1, '7A5910'),
(99, 7, 'A', 59, '7A59', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A5911'),
(100, 7, 'A', 53, '7A53', 1, 'বাংলা', 1, '7A531'),
(101, 7, 'A', 53, '7A53', 2, 'English', 1, '7A532'),
(102, 7, 'A', 53, '7A53', 3, 'গণিত', 1, '7A533'),
(103, 7, 'A', 53, '7A53', 4, 'বিজ্ঞান', 1, '7A534'),
(104, 7, 'A', 53, '7A53', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A535'),
(105, 7, 'A', 53, '7A53', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A536'),
(106, 7, 'A', 53, '7A53', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A537'),
(107, 7, 'A', 53, '7A53', 8, 'জীবন ও জীবিকা', 1, '7A538'),
(108, 7, 'A', 53, '7A53', 9, 'শিল্প ও সংস্কৃতি', 1, '7A539'),
(109, 7, 'A', 53, '7A53', 10, 'ইসলাম শিক্ষা', 1, '7A5310'),
(110, 7, 'A', 53, '7A53', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A5311'),
(111, 7, 'A', 63, '7A63', 1, 'বাংলা', 1, '7A631'),
(112, 7, 'A', 63, '7A63', 2, 'English', 1, '7A632'),
(113, 7, 'A', 63, '7A63', 3, 'গণিত', 1, '7A633'),
(114, 7, 'A', 63, '7A63', 4, 'বিজ্ঞান', 1, '7A634'),
(115, 7, 'A', 63, '7A63', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A635'),
(116, 7, 'A', 63, '7A63', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A636'),
(117, 7, 'A', 63, '7A63', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A637'),
(118, 7, 'A', 63, '7A63', 8, 'জীবন ও জীবিকা', 1, '7A638'),
(119, 7, 'A', 63, '7A63', 9, 'শিল্প ও সংস্কৃতি', 1, '7A639'),
(120, 7, 'A', 63, '7A63', 10, 'ইসলাম শিক্ষা', 1, '7A6310'),
(121, 7, 'A', 63, '7A63', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A6311'),
(122, 7, 'A', 75, '7A75', 1, 'বাংলা', 1, '7A751'),
(123, 7, 'A', 75, '7A75', 2, 'English', 1, '7A752'),
(124, 7, 'A', 75, '7A75', 3, 'গণিত', 1, '7A753'),
(125, 7, 'A', 75, '7A75', 4, 'বিজ্ঞান', 1, '7A754'),
(126, 7, 'A', 75, '7A75', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A755'),
(127, 7, 'A', 75, '7A75', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A756'),
(128, 7, 'A', 75, '7A75', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A757'),
(129, 7, 'A', 75, '7A75', 8, 'জীবন ও জীবিকা', 1, '7A758'),
(130, 7, 'A', 75, '7A75', 9, 'শিল্প ও সংস্কৃতি', 1, '7A759'),
(131, 7, 'A', 75, '7A75', 10, 'ইসলাম শিক্ষা', 1, '7A7510'),
(132, 7, 'A', 75, '7A75', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A7511'),
(133, 7, 'A', 17, '7A17', 1, 'বাংলা', 1, '7A171'),
(134, 7, 'A', 17, '7A17', 2, 'English', 1, '7A172'),
(135, 7, 'A', 17, '7A17', 3, 'গণিত', 1, '7A173'),
(136, 7, 'A', 17, '7A17', 4, 'বিজ্ঞান', 1, '7A174'),
(137, 7, 'A', 17, '7A17', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A175'),
(138, 7, 'A', 17, '7A17', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A176'),
(139, 7, 'A', 17, '7A17', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A177'),
(140, 7, 'A', 17, '7A17', 8, 'জীবন ও জীবিকা', 1, '7A178'),
(141, 7, 'A', 17, '7A17', 9, 'শিল্প ও সংস্কৃতি', 1, '7A179'),
(142, 7, 'A', 17, '7A17', 10, 'ইসলাম শিক্ষা', 1, '7A1710'),
(143, 7, 'A', 17, '7A17', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A1711'),
(144, 7, 'A', 14, '7A14', 1, 'বাংলা', 1, '7A141'),
(145, 7, 'A', 14, '7A14', 2, 'English', 1, '7A142'),
(146, 7, 'A', 14, '7A14', 3, 'গণিত', 1, '7A143'),
(147, 7, 'A', 14, '7A14', 4, 'বিজ্ঞান', 1, '7A144'),
(148, 7, 'A', 14, '7A14', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A145'),
(149, 7, 'A', 14, '7A14', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A146'),
(150, 7, 'A', 14, '7A14', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A147'),
(151, 7, 'A', 14, '7A14', 8, 'জীবন ও জীবিকা', 1, '7A148'),
(152, 7, 'A', 14, '7A14', 9, 'শিল্প ও সংস্কৃতি', 1, '7A149'),
(153, 7, 'A', 14, '7A14', 10, 'ইসলাম শিক্ষা', 1, '7A1410'),
(154, 7, 'A', 14, '7A14', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A1411'),
(155, 7, 'A', 33, '7A33', 1, 'বাংলা', 1, '7A331'),
(156, 7, 'A', 33, '7A33', 2, 'English', 1, '7A332'),
(157, 7, 'A', 33, '7A33', 3, 'গণিত', 1, '7A333'),
(158, 7, 'A', 33, '7A33', 4, 'বিজ্ঞান', 1, '7A334'),
(159, 7, 'A', 33, '7A33', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A335'),
(160, 7, 'A', 33, '7A33', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A336'),
(161, 7, 'A', 33, '7A33', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A337'),
(162, 7, 'A', 33, '7A33', 8, 'জীবন ও জীবিকা', 1, '7A338'),
(163, 7, 'A', 33, '7A33', 9, 'শিল্প ও সংস্কৃতি', 1, '7A339'),
(164, 7, 'A', 33, '7A33', 10, 'ইসলাম শিক্ষা', 1, '7A3310'),
(165, 7, 'A', 33, '7A33', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A3311'),
(166, 7, 'A', 27, '7A27', 1, 'বাংলা', 1, '7A271'),
(167, 7, 'A', 27, '7A27', 2, 'English', 1, '7A272'),
(168, 7, 'A', 27, '7A27', 3, 'গণিত', 1, '7A273'),
(169, 7, 'A', 27, '7A27', 4, 'বিজ্ঞান', 1, '7A274'),
(170, 7, 'A', 27, '7A27', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A275'),
(171, 7, 'A', 27, '7A27', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A276'),
(172, 7, 'A', 27, '7A27', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A277'),
(173, 7, 'A', 27, '7A27', 8, 'জীবন ও জীবিকা', 1, '7A278'),
(174, 7, 'A', 27, '7A27', 9, 'শিল্প ও সংস্কৃতি', 1, '7A279'),
(175, 7, 'A', 27, '7A27', 10, 'ইসলাম শিক্ষা', 1, '7A2710'),
(176, 7, 'A', 27, '7A27', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A2711'),
(177, 7, 'A', 5, '7A5', 1, 'বাংলা', 1, '7A51'),
(178, 7, 'A', 5, '7A5', 2, 'English', 1, '7A52'),
(179, 7, 'A', 5, '7A5', 3, 'গণিত', 1, '7A53'),
(180, 7, 'A', 5, '7A5', 4, 'বিজ্ঞান', 1, '7A54'),
(181, 7, 'A', 5, '7A5', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A55'),
(182, 7, 'A', 5, '7A5', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A56'),
(183, 7, 'A', 5, '7A5', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A57'),
(184, 7, 'A', 5, '7A5', 8, 'জীবন ও জীবিকা', 1, '7A58'),
(185, 7, 'A', 5, '7A5', 9, 'শিল্প ও সংস্কৃতি', 1, '7A59'),
(186, 7, 'A', 5, '7A5', 10, 'ইসলাম শিক্ষা', 1, '7A510'),
(187, 7, 'A', 5, '7A5', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A511'),
(188, 7, 'A', 32, '7A32', 1, 'বাংলা', 1, '7A321'),
(189, 7, 'A', 32, '7A32', 2, 'English', 1, '7A322'),
(190, 7, 'A', 32, '7A32', 3, 'গণিত', 1, '7A323'),
(191, 7, 'A', 32, '7A32', 4, 'বিজ্ঞান', 1, '7A324'),
(192, 7, 'A', 32, '7A32', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A325'),
(193, 7, 'A', 32, '7A32', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A326'),
(194, 7, 'A', 32, '7A32', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A327'),
(195, 7, 'A', 32, '7A32', 8, 'জীবন ও জীবিকা', 1, '7A328'),
(196, 7, 'A', 32, '7A32', 9, 'শিল্প ও সংস্কৃতি', 1, '7A329'),
(197, 7, 'A', 32, '7A32', 10, 'ইসলাম শিক্ষা', 1, '7A3210'),
(198, 7, 'A', 32, '7A32', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A3211'),
(199, 7, 'A', 28, '7A28', 1, 'বাংলা', 1, '7A281'),
(200, 7, 'A', 28, '7A28', 2, 'English', 1, '7A282'),
(201, 7, 'A', 28, '7A28', 3, 'গণিত', 1, '7A283'),
(202, 7, 'A', 28, '7A28', 4, 'বিজ্ঞান', 1, '7A284'),
(203, 7, 'A', 28, '7A28', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A285'),
(204, 7, 'A', 28, '7A28', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A286'),
(205, 7, 'A', 28, '7A28', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A287'),
(206, 7, 'A', 28, '7A28', 8, 'জীবন ও জীবিকা', 1, '7A288'),
(207, 7, 'A', 28, '7A28', 9, 'শিল্প ও সংস্কৃতি', 1, '7A289'),
(208, 7, 'A', 28, '7A28', 10, 'ইসলাম শিক্ষা', 1, '7A2810'),
(209, 7, 'A', 28, '7A28', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A2811'),
(210, 7, 'A', 43, '7A43', 1, 'বাংলা', 1, '7A431'),
(211, 7, 'A', 43, '7A43', 2, 'English', 1, '7A432'),
(212, 7, 'A', 43, '7A43', 3, 'গণিত', 1, '7A433'),
(213, 7, 'A', 43, '7A43', 4, 'বিজ্ঞান', 1, '7A434'),
(214, 7, 'A', 43, '7A43', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A435'),
(215, 7, 'A', 43, '7A43', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A436'),
(216, 7, 'A', 43, '7A43', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A437'),
(217, 7, 'A', 43, '7A43', 8, 'জীবন ও জীবিকা', 1, '7A438'),
(218, 7, 'A', 43, '7A43', 9, 'শিল্প ও সংস্কৃতি', 1, '7A439'),
(219, 7, 'A', 43, '7A43', 10, 'ইসলাম শিক্ষা', 1, '7A4310'),
(220, 7, 'A', 43, '7A43', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A4311'),
(221, 7, 'A', 45, '7A45', 1, 'বাংলা', 1, '7A451'),
(222, 7, 'A', 45, '7A45', 2, 'English', 1, '7A452'),
(223, 7, 'A', 45, '7A45', 3, 'গণিত', 1, '7A453'),
(224, 7, 'A', 45, '7A45', 4, 'বিজ্ঞান', 1, '7A454'),
(225, 7, 'A', 45, '7A45', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A455'),
(226, 7, 'A', 45, '7A45', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A456'),
(227, 7, 'A', 45, '7A45', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A457'),
(228, 7, 'A', 45, '7A45', 8, 'জীবন ও জীবিকা', 1, '7A458'),
(229, 7, 'A', 45, '7A45', 9, 'শিল্প ও সংস্কৃতি', 1, '7A459'),
(230, 7, 'A', 45, '7A45', 10, 'ইসলাম শিক্ষা', 1, '7A4510'),
(231, 7, 'A', 45, '7A45', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A4511'),
(232, 7, 'A', 8, '7A8', 1, 'বাংলা', 1, '7A81'),
(233, 7, 'A', 8, '7A8', 2, 'English', 1, '7A82'),
(234, 7, 'A', 8, '7A8', 3, 'গণিত', 1, '7A83'),
(235, 7, 'A', 8, '7A8', 4, 'বিজ্ঞান', 1, '7A84'),
(236, 7, 'A', 8, '7A8', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A85'),
(237, 7, 'A', 8, '7A8', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A86'),
(238, 7, 'A', 8, '7A8', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A87'),
(239, 7, 'A', 8, '7A8', 8, 'জীবন ও জীবিকা', 1, '7A88'),
(240, 7, 'A', 8, '7A8', 9, 'শিল্প ও সংস্কৃতি', 1, '7A89'),
(241, 7, 'A', 8, '7A8', 10, 'ইসলাম শিক্ষা', 1, '7A810'),
(242, 7, 'A', 8, '7A8', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A811'),
(243, 7, 'A', 111, '7A111', 1, 'বাংলা', 1, '7A1111'),
(244, 7, 'A', 111, '7A111', 2, 'English', 1, '7A1112'),
(245, 7, 'A', 111, '7A111', 3, 'গণিত', 1, '7A1113'),
(246, 7, 'A', 111, '7A111', 4, 'বিজ্ঞান', 1, '7A1114'),
(247, 7, 'A', 111, '7A111', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1115'),
(248, 7, 'A', 111, '7A111', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1116'),
(249, 7, 'A', 111, '7A111', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1117'),
(250, 7, 'A', 111, '7A111', 8, 'জীবন ও জীবিকা', 1, '7A1118'),
(251, 7, 'A', 111, '7A111', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1119'),
(252, 7, 'A', 111, '7A111', 10, 'ইসলাম শিক্ষা', 1, '7A11110'),
(253, 7, 'A', 111, '7A111', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A11111'),
(254, 7, 'A', 119, '7A119', 1, 'বাংলা', 1, '7A1191'),
(255, 7, 'A', 119, '7A119', 2, 'English', 1, '7A1192'),
(256, 7, 'A', 119, '7A119', 3, 'গণিত', 1, '7A1193'),
(257, 7, 'A', 119, '7A119', 4, 'বিজ্ঞান', 1, '7A1194'),
(258, 7, 'A', 119, '7A119', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1195'),
(259, 7, 'A', 119, '7A119', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1196'),
(260, 7, 'A', 119, '7A119', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1197'),
(261, 7, 'A', 119, '7A119', 8, 'জীবন ও জীবিকা', 1, '7A1198'),
(262, 7, 'A', 119, '7A119', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1199'),
(263, 7, 'A', 119, '7A119', 10, 'ইসলাম শিক্ষা', 1, '7A11910'),
(264, 7, 'A', 119, '7A119', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A11911'),
(265, 7, 'A', 140, '7A140', 1, 'বাংলা', 1, '7A1401'),
(266, 7, 'A', 140, '7A140', 2, 'English', 1, '7A1402'),
(267, 7, 'A', 140, '7A140', 3, 'গণিত', 1, '7A1403'),
(268, 7, 'A', 140, '7A140', 4, 'বিজ্ঞান', 1, '7A1404'),
(269, 7, 'A', 140, '7A140', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1405'),
(270, 7, 'A', 140, '7A140', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1406'),
(271, 7, 'A', 140, '7A140', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1407'),
(272, 7, 'A', 140, '7A140', 8, 'জীবন ও জীবিকা', 1, '7A1408'),
(273, 7, 'A', 140, '7A140', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1409'),
(274, 7, 'A', 140, '7A140', 10, 'ইসলাম শিক্ষা', 1, '7A14010'),
(275, 7, 'A', 140, '7A140', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A14011'),
(276, 7, 'A', 123, '7A123', 1, 'বাংলা', 1, '7A1231'),
(277, 7, 'A', 123, '7A123', 2, 'English', 1, '7A1232'),
(278, 7, 'A', 123, '7A123', 3, 'গণিত', 1, '7A1233'),
(279, 7, 'A', 123, '7A123', 4, 'বিজ্ঞান', 1, '7A1234'),
(280, 7, 'A', 123, '7A123', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1235'),
(281, 7, 'A', 123, '7A123', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1236'),
(282, 7, 'A', 123, '7A123', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1237'),
(283, 7, 'A', 123, '7A123', 8, 'জীবন ও জীবিকা', 1, '7A1238'),
(284, 7, 'A', 123, '7A123', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1239'),
(285, 7, 'A', 123, '7A123', 10, 'ইসলাম শিক্ষা', 1, '7A12310'),
(286, 7, 'A', 123, '7A123', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A12311'),
(287, 7, 'A', 128, '7A128', 1, 'বাংলা', 1, '7A1281'),
(288, 7, 'A', 128, '7A128', 2, 'English', 1, '7A1282'),
(289, 7, 'A', 128, '7A128', 3, 'গণিত', 1, '7A1283'),
(290, 7, 'A', 128, '7A128', 4, 'বিজ্ঞান', 1, '7A1284'),
(291, 7, 'A', 128, '7A128', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1285'),
(292, 7, 'A', 128, '7A128', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1286'),
(293, 7, 'A', 128, '7A128', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1287'),
(294, 7, 'A', 128, '7A128', 8, 'জীবন ও জীবিকা', 1, '7A1288'),
(295, 7, 'A', 128, '7A128', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1289'),
(296, 7, 'A', 128, '7A128', 10, 'ইসলাম শিক্ষা', 1, '7A12810'),
(297, 7, 'A', 128, '7A128', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A12811'),
(299, 7, 'A', 81, '7A81', 2, 'English', 1, '7A812'),
(300, 7, 'A', 81, '7A81', 3, 'গণিত', 1, '7A813'),
(301, 7, 'A', 81, '7A81', 4, 'বিজ্ঞান', 1, '7A814'),
(302, 7, 'A', 81, '7A81', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A815'),
(303, 7, 'A', 81, '7A81', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A816'),
(304, 7, 'A', 81, '7A81', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A817'),
(305, 7, 'A', 81, '7A81', 8, 'জীবন ও জীবিকা', 1, '7A818'),
(306, 7, 'A', 81, '7A81', 9, 'শিল্প ও সংস্কৃতি', 1, '7A819'),
(307, 7, 'A', 81, '7A81', 10, 'ইসলাম শিক্ষা', 1, '7A8110'),
(308, 7, 'A', 81, '7A81', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A8111'),
(309, 7, 'A', 133, '7A133', 1, 'বাংলা', 1, '7A1331'),
(310, 7, 'A', 133, '7A133', 2, 'English', 1, '7A1332'),
(311, 7, 'A', 133, '7A133', 3, 'গণিত', 1, '7A1333'),
(312, 7, 'A', 133, '7A133', 4, 'বিজ্ঞান', 1, '7A1334'),
(313, 7, 'A', 133, '7A133', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1335'),
(314, 7, 'A', 133, '7A133', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1336'),
(315, 7, 'A', 133, '7A133', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1337'),
(316, 7, 'A', 133, '7A133', 8, 'জীবন ও জীবিকা', 1, '7A1338'),
(317, 7, 'A', 133, '7A133', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1339'),
(318, 7, 'A', 133, '7A133', 10, 'ইসলাম শিক্ষা', 1, '7A13310'),
(319, 7, 'A', 133, '7A133', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A13311'),
(320, 7, 'A', 142, '7A142', 1, 'বাংলা', 1, '7A1421'),
(321, 7, 'A', 142, '7A142', 2, 'English', 1, '7A1422'),
(322, 7, 'A', 142, '7A142', 3, 'গণিত', 1, '7A1423'),
(323, 7, 'A', 142, '7A142', 4, 'বিজ্ঞান', 1, '7A1424'),
(324, 7, 'A', 142, '7A142', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1425'),
(325, 7, 'A', 142, '7A142', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1426'),
(326, 7, 'A', 142, '7A142', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1427'),
(327, 7, 'A', 142, '7A142', 8, 'জীবন ও জীবিকা', 1, '7A1428'),
(328, 7, 'A', 142, '7A142', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1429'),
(329, 7, 'A', 142, '7A142', 10, 'ইসলাম শিক্ষা', 1, '7A14210'),
(330, 7, 'A', 142, '7A142', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A14211'),
(331, 7, 'A', 132, '7A132', 1, 'বাংলা', 1, '7A1321'),
(332, 7, 'A', 132, '7A132', 2, 'English', 1, '7A1322'),
(333, 7, 'A', 132, '7A132', 3, 'গণিত', 1, '7A1323'),
(334, 7, 'A', 132, '7A132', 4, 'বিজ্ঞান', 1, '7A1324'),
(335, 7, 'A', 132, '7A132', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1325'),
(336, 7, 'A', 132, '7A132', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1326'),
(337, 7, 'A', 132, '7A132', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1327'),
(338, 7, 'A', 132, '7A132', 8, 'জীবন ও জীবিকা', 1, '7A1328'),
(339, 7, 'A', 132, '7A132', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1329'),
(340, 7, 'A', 132, '7A132', 10, 'ইসলাম শিক্ষা', 1, '7A13210'),
(341, 7, 'A', 132, '7A132', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A13211'),
(342, 7, 'A', 147, '7A147', 1, 'বাংলা', 1, '7A1471'),
(343, 7, 'A', 147, '7A147', 2, 'English', 1, '7A1472'),
(344, 7, 'A', 147, '7A147', 3, 'গণিত', 1, '7A1473'),
(345, 7, 'A', 147, '7A147', 4, 'বিজ্ঞান', 1, '7A1474'),
(346, 7, 'A', 147, '7A147', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1475'),
(347, 7, 'A', 147, '7A147', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1476'),
(348, 7, 'A', 147, '7A147', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1477'),
(349, 7, 'A', 147, '7A147', 8, 'জীবন ও জীবিকা', 1, '7A1478'),
(350, 7, 'A', 147, '7A147', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1479'),
(351, 7, 'A', 147, '7A147', 10, 'ইসলাম শিক্ষা', 1, '7A14710'),
(352, 7, 'A', 147, '7A147', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A14711'),
(353, 7, 'A', 118, '7A118', 1, 'বাংলা', 1, '7A1181'),
(354, 7, 'A', 118, '7A118', 2, 'English', 1, '7A1182'),
(355, 7, 'A', 118, '7A118', 3, 'গণিত', 1, '7A1183'),
(356, 7, 'A', 118, '7A118', 4, 'বিজ্ঞান', 1, '7A1184'),
(357, 7, 'A', 118, '7A118', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1185'),
(358, 7, 'A', 118, '7A118', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1186'),
(359, 7, 'A', 118, '7A118', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1187'),
(360, 7, 'A', 118, '7A118', 8, 'জীবন ও জীবিকা', 1, '7A1188'),
(361, 7, 'A', 118, '7A118', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1189'),
(362, 7, 'A', 118, '7A118', 10, 'ইসলাম শিক্ষা', 1, '7A11810'),
(363, 7, 'A', 118, '7A118', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A11811'),
(364, 7, 'A', 12, '7A12', 1, 'বাংলা', 1, '7A121'),
(365, 7, 'A', 12, '7A12', 2, 'English', 1, '7A122'),
(366, 7, 'A', 12, '7A12', 3, 'গণিত', 1, '7A123'),
(367, 7, 'A', 12, '7A12', 4, 'বিজ্ঞান', 1, '7A124'),
(368, 7, 'A', 12, '7A12', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A125'),
(369, 7, 'A', 12, '7A12', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A126'),
(370, 7, 'A', 12, '7A12', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A127'),
(371, 7, 'A', 12, '7A12', 8, 'জীবন ও জীবিকা', 1, '7A128'),
(372, 7, 'A', 12, '7A12', 9, 'শিল্প ও সংস্কৃতি', 1, '7A129'),
(373, 7, 'A', 12, '7A12', 10, 'ইসলাম শিক্ষা', 1, '7A1210'),
(374, 7, 'A', 12, '7A12', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A1211'),
(375, 7, 'A', 29, '7A29', 1, 'বাংলা', 1, '7A291'),
(376, 7, 'A', 29, '7A29', 2, 'English', 1, '7A292'),
(377, 7, 'A', 29, '7A29', 3, 'গণিত', 1, '7A293'),
(378, 7, 'A', 29, '7A29', 4, 'বিজ্ঞান', 1, '7A294'),
(379, 7, 'A', 29, '7A29', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A295'),
(380, 7, 'A', 29, '7A29', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A296'),
(381, 7, 'A', 29, '7A29', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A297'),
(382, 7, 'A', 29, '7A29', 8, 'জীবন ও জীবিকা', 1, '7A298'),
(383, 7, 'A', 29, '7A29', 9, 'শিল্প ও সংস্কৃতি', 1, '7A299'),
(384, 7, 'A', 29, '7A29', 10, 'ইসলাম শিক্ষা', 1, '7A2910'),
(385, 7, 'A', 29, '7A29', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A2911'),
(386, 7, 'A', 97, '7A97', 1, 'বাংলা', 1, '7A971'),
(387, 7, 'A', 97, '7A97', 2, 'English', 1, '7A972'),
(388, 7, 'A', 97, '7A97', 3, 'গণিত', 1, '7A973'),
(389, 7, 'A', 97, '7A97', 4, 'বিজ্ঞান', 1, '7A974'),
(390, 7, 'A', 97, '7A97', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A975'),
(391, 7, 'A', 97, '7A97', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A976'),
(392, 7, 'A', 97, '7A97', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A977'),
(393, 7, 'A', 97, '7A97', 8, 'জীবন ও জীবিকা', 1, '7A978'),
(394, 7, 'A', 97, '7A97', 9, 'শিল্প ও সংস্কৃতি', 1, '7A979'),
(395, 7, 'A', 97, '7A97', 10, 'ইসলাম শিক্ষা', 1, '7A9710'),
(396, 7, 'A', 97, '7A97', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A9711'),
(397, 7, 'A', 94, '7A94', 1, 'বাংলা', 1, '7A941'),
(398, 7, 'A', 94, '7A94', 2, 'English', 1, '7A942'),
(399, 7, 'A', 94, '7A94', 3, 'গণিত', 1, '7A943'),
(400, 7, 'A', 94, '7A94', 4, 'বিজ্ঞান', 1, '7A944'),
(401, 7, 'A', 94, '7A94', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A945'),
(402, 7, 'A', 94, '7A94', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A946'),
(403, 7, 'A', 94, '7A94', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A947'),
(404, 7, 'A', 94, '7A94', 8, 'জীবন ও জীবিকা', 1, '7A948'),
(405, 7, 'A', 94, '7A94', 9, 'শিল্প ও সংস্কৃতি', 1, '7A949'),
(406, 7, 'A', 94, '7A94', 10, 'ইসলাম শিক্ষা', 1, '7A9410'),
(407, 7, 'A', 94, '7A94', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A9411'),
(408, 7, 'A', 145, '7A145', 1, 'বাংলা', 1, '7A1451'),
(409, 7, 'A', 145, '7A145', 2, 'English', 1, '7A1452'),
(410, 7, 'A', 145, '7A145', 3, 'গণিত', 1, '7A1453'),
(411, 7, 'A', 145, '7A145', 4, 'বিজ্ঞান', 1, '7A1454'),
(412, 7, 'A', 145, '7A145', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1455'),
(413, 7, 'A', 145, '7A145', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1456'),
(414, 7, 'A', 145, '7A145', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1457'),
(415, 7, 'A', 145, '7A145', 8, 'জীবন ও জীবিকা', 1, '7A1458'),
(416, 7, 'A', 145, '7A145', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1459'),
(417, 7, 'A', 145, '7A145', 10, 'ইসলাম শিক্ষা', 1, '7A14510'),
(418, 7, 'A', 145, '7A145', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A14511'),
(419, 7, 'A', 107, '7A107', 1, 'বাংলা', 1, '7A1071'),
(420, 7, 'A', 107, '7A107', 2, 'English', 1, '7A1072'),
(421, 7, 'A', 107, '7A107', 3, 'গণিত', 1, '7A1073'),
(422, 7, 'A', 107, '7A107', 4, 'বিজ্ঞান', 1, '7A1074'),
(423, 7, 'A', 107, '7A107', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1075'),
(424, 7, 'A', 107, '7A107', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1076'),
(425, 7, 'A', 107, '7A107', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1077'),
(426, 7, 'A', 107, '7A107', 8, 'জীবন ও জীবিকা', 1, '7A1078'),
(427, 7, 'A', 107, '7A107', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1079'),
(428, 7, 'A', 107, '7A107', 10, 'ইসলাম শিক্ষা', 1, '7A10710'),
(429, 7, 'A', 107, '7A107', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A10711'),
(430, 7, 'A', 4, '7A4', 1, 'বাংলা', 1, '7A41'),
(431, 7, 'A', 4, '7A4', 2, 'English', 1, '7A42'),
(432, 7, 'A', 4, '7A4', 3, 'গণিত', 1, '7A43'),
(433, 7, 'A', 4, '7A4', 4, 'বিজ্ঞান', 1, '7A44'),
(434, 7, 'A', 4, '7A4', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A45'),
(435, 7, 'A', 4, '7A4', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A46'),
(436, 7, 'A', 4, '7A4', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A47'),
(437, 7, 'A', 4, '7A4', 8, 'জীবন ও জীবিকা', 1, '7A48'),
(438, 7, 'A', 4, '7A4', 9, 'শিল্প ও সংস্কৃতি', 1, '7A49'),
(439, 7, 'A', 4, '7A4', 10, 'ইসলাম শিক্ষা', 1, '7A410'),
(440, 7, 'A', 4, '7A4', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A411'),
(441, 7, 'A', 105, '7A105', 1, 'বাংলা', 1, '7A1051'),
(442, 7, 'A', 105, '7A105', 2, 'English', 1, '7A1052'),
(443, 7, 'A', 105, '7A105', 3, 'গণিত', 1, '7A1053'),
(444, 7, 'A', 105, '7A105', 4, 'বিজ্ঞান', 1, '7A1054'),
(445, 7, 'A', 105, '7A105', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1055'),
(446, 7, 'A', 105, '7A105', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1056'),
(447, 7, 'A', 105, '7A105', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1057'),
(448, 7, 'A', 105, '7A105', 8, 'জীবন ও জীবিকা', 1, '7A1058'),
(449, 7, 'A', 105, '7A105', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1059'),
(450, 7, 'A', 105, '7A105', 10, 'ইসলাম শিক্ষা', 1, '7A10510'),
(451, 7, 'A', 105, '7A105', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A10511'),
(452, 7, 'A', 156, '7A156', 1, 'বাংলা', 1, '7A1561'),
(453, 7, 'A', 156, '7A156', 2, 'English', 1, '7A1562'),
(454, 7, 'A', 156, '7A156', 3, 'গণিত', 1, '7A1563'),
(455, 7, 'A', 156, '7A156', 4, 'বিজ্ঞান', 1, '7A1564'),
(456, 7, 'A', 156, '7A156', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1565'),
(457, 7, 'A', 156, '7A156', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1566'),
(458, 7, 'A', 156, '7A156', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1567'),
(459, 7, 'A', 156, '7A156', 8, 'জীবন ও জীবিকা', 1, '7A1568'),
(460, 7, 'A', 156, '7A156', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1569'),
(461, 7, 'A', 156, '7A156', 10, 'ইসলাম শিক্ষা', 1, '7A15610'),
(462, 7, 'A', 156, '7A156', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A15611'),
(463, 7, 'A', 66, '7A66', 1, 'বাংলা', 1, '7A661'),
(464, 7, 'A', 66, '7A66', 2, 'English', 1, '7A662'),
(465, 7, 'A', 66, '7A66', 3, 'গণিত', 1, '7A663'),
(466, 7, 'A', 66, '7A66', 4, 'বিজ্ঞান', 1, '7A664'),
(467, 7, 'A', 66, '7A66', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A665'),
(468, 7, 'A', 66, '7A66', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A666'),
(469, 7, 'A', 66, '7A66', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A667'),
(470, 7, 'A', 66, '7A66', 8, 'জীবন ও জীবিকা', 1, '7A668'),
(471, 7, 'A', 66, '7A66', 9, 'শিল্প ও সংস্কৃতি', 1, '7A669'),
(472, 7, 'A', 66, '7A66', 10, 'ইসলাম শিক্ষা', 1, '7A6610'),
(473, 7, 'A', 66, '7A66', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A6611'),
(474, 7, 'A', 139, '7A139', 1, 'বাংলা', 1, '7A1391'),
(475, 7, 'A', 139, '7A139', 2, 'English', 1, '7A1392'),
(476, 7, 'A', 139, '7A139', 3, 'গণিত', 1, '7A1393'),
(477, 7, 'A', 139, '7A139', 4, 'বিজ্ঞান', 1, '7A1394'),
(478, 7, 'A', 139, '7A139', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1395'),
(479, 7, 'A', 139, '7A139', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1396'),
(480, 7, 'A', 139, '7A139', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1397'),
(481, 7, 'A', 139, '7A139', 8, 'জীবন ও জীবিকা', 1, '7A1398'),
(482, 7, 'A', 139, '7A139', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1399'),
(483, 7, 'A', 139, '7A139', 10, 'ইসলাম শিক্ষা', 1, '7A13910'),
(484, 7, 'A', 139, '7A139', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A13911'),
(485, 7, 'A', 18, '7A18', 1, 'বাংলা', 1, '7A181'),
(486, 7, 'A', 18, '7A18', 2, 'English', 1, '7A182'),
(487, 7, 'A', 18, '7A18', 3, 'গণিত', 1, '7A183'),
(488, 7, 'A', 18, '7A18', 4, 'বিজ্ঞান', 1, '7A184'),
(489, 7, 'A', 18, '7A18', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A185'),
(490, 7, 'A', 18, '7A18', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A186'),
(491, 7, 'A', 18, '7A18', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A187'),
(492, 7, 'A', 18, '7A18', 8, 'জীবন ও জীবিকা', 1, '7A188'),
(493, 7, 'A', 18, '7A18', 9, 'শিল্প ও সংস্কৃতি', 1, '7A189'),
(494, 7, 'A', 18, '7A18', 10, 'ইসলাম শিক্ষা', 1, '7A1810'),
(495, 7, 'A', 18, '7A18', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A1811'),
(496, 7, 'A', 78, '7A78', 1, 'বাংলা', 1, '7A781'),
(497, 7, 'A', 78, '7A78', 2, 'English', 1, '7A782'),
(498, 7, 'A', 78, '7A78', 3, 'গণিত', 1, '7A783'),
(499, 7, 'A', 78, '7A78', 4, 'বিজ্ঞান', 1, '7A784'),
(500, 7, 'A', 78, '7A78', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A785'),
(501, 7, 'A', 78, '7A78', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A786'),
(502, 7, 'A', 78, '7A78', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A787'),
(503, 7, 'A', 78, '7A78', 8, 'জীবন ও জীবিকা', 1, '7A788'),
(504, 7, 'A', 78, '7A78', 9, 'শিল্প ও সংস্কৃতি', 1, '7A789'),
(505, 7, 'A', 78, '7A78', 10, 'ইসলাম শিক্ষা', 1, '7A7810'),
(506, 7, 'A', 78, '7A78', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A7811'),
(507, 7, 'A', 103, '7A103', 1, 'বাংলা', 1, '7A1031'),
(508, 7, 'A', 103, '7A103', 2, 'English', 1, '7A1032'),
(509, 7, 'A', 103, '7A103', 3, 'গণিত', 1, '7A1033'),
(510, 7, 'A', 103, '7A103', 4, 'বিজ্ঞান', 1, '7A1034'),
(511, 7, 'A', 103, '7A103', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1035'),
(512, 7, 'A', 103, '7A103', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1036'),
(513, 7, 'A', 103, '7A103', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1037'),
(514, 7, 'A', 103, '7A103', 8, 'জীবন ও জীবিকা', 1, '7A1038'),
(515, 7, 'A', 103, '7A103', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1039'),
(516, 7, 'A', 103, '7A103', 10, 'ইসলাম শিক্ষা', 1, '7A10310'),
(517, 7, 'A', 103, '7A103', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A10311'),
(518, 7, 'A', 125, '7A125', 1, 'বাংলা', 1, '7A1251'),
(519, 7, 'A', 125, '7A125', 2, 'English', 1, '7A1252'),
(520, 7, 'A', 125, '7A125', 3, 'গণিত', 1, '7A1253'),
(521, 7, 'A', 125, '7A125', 4, 'বিজ্ঞান', 1, '7A1254'),
(522, 7, 'A', 125, '7A125', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1255'),
(523, 7, 'A', 125, '7A125', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1256'),
(524, 7, 'A', 125, '7A125', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1257'),
(525, 7, 'A', 125, '7A125', 8, 'জীবন ও জীবিকা', 1, '7A1258'),
(526, 7, 'A', 125, '7A125', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1259'),
(527, 7, 'A', 125, '7A125', 10, 'ইসলাম শিক্ষা', 1, '7A12510'),
(528, 7, 'A', 125, '7A125', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A12511'),
(529, 7, 'A', 130, '7A130', 1, 'বাংলা', 1, '7A1301'),
(530, 7, 'A', 130, '7A130', 2, 'English', 1, '7A1302'),
(531, 7, 'A', 130, '7A130', 3, 'গণিত', 1, '7A1303'),
(532, 7, 'A', 130, '7A130', 4, 'বিজ্ঞান', 1, '7A1304'),
(533, 7, 'A', 130, '7A130', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1305'),
(534, 7, 'A', 130, '7A130', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1306'),
(535, 7, 'A', 130, '7A130', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1307'),
(536, 7, 'A', 130, '7A130', 8, 'জীবন ও জীবিকা', 1, '7A1308'),
(537, 7, 'A', 130, '7A130', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1309'),
(538, 7, 'A', 130, '7A130', 10, 'ইসলাম শিক্ষা', 1, '7A13010'),
(539, 7, 'A', 130, '7A130', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A13011'),
(540, 7, 'A', 143, '7A143', 1, 'বাংলা', 1, '7A1431'),
(541, 7, 'A', 143, '7A143', 2, 'English', 1, '7A1432'),
(542, 7, 'A', 143, '7A143', 3, 'গণিত', 1, '7A1433'),
(543, 7, 'A', 143, '7A143', 4, 'বিজ্ঞান', 1, '7A1434'),
(544, 7, 'A', 143, '7A143', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1435'),
(545, 7, 'A', 143, '7A143', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1436'),
(546, 7, 'A', 143, '7A143', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1437'),
(547, 7, 'A', 143, '7A143', 8, 'জীবন ও জীবিকা', 1, '7A1438'),
(548, 7, 'A', 143, '7A143', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1439'),
(549, 7, 'A', 143, '7A143', 10, 'ইসলাম শিক্ষা', 1, '7A14310'),
(550, 7, 'A', 143, '7A143', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A14311'),
(551, 7, 'A', 148, '7A148', 1, 'বাংলা', 1, '7A1481'),
(552, 7, 'A', 148, '7A148', 2, 'English', 1, '7A1482'),
(553, 7, 'A', 148, '7A148', 3, 'গণিত', 1, '7A1483'),
(554, 7, 'A', 148, '7A148', 4, 'বিজ্ঞান', 1, '7A1484'),
(555, 7, 'A', 148, '7A148', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1485'),
(556, 7, 'A', 148, '7A148', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1486'),
(557, 7, 'A', 148, '7A148', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1487'),
(558, 7, 'A', 148, '7A148', 8, 'জীবন ও জীবিকা', 1, '7A1488'),
(559, 7, 'A', 148, '7A148', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1489'),
(560, 7, 'A', 148, '7A148', 10, 'ইসলাম শিক্ষা', 1, '7A14810'),
(561, 7, 'A', 148, '7A148', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A14811'),
(562, 7, 'A', 158, '7A158', 1, 'বাংলা', 1, '7A1581'),
(563, 7, 'A', 158, '7A158', 2, 'English', 1, '7A1582'),
(564, 7, 'A', 158, '7A158', 3, 'গণিত', 1, '7A1583'),
(565, 7, 'A', 158, '7A158', 4, 'বিজ্ঞান', 1, '7A1584'),
(566, 7, 'A', 158, '7A158', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1585'),
(567, 7, 'A', 158, '7A158', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1586'),
(568, 7, 'A', 158, '7A158', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1587'),
(569, 7, 'A', 158, '7A158', 8, 'জীবন ও জীবিকা', 1, '7A1588'),
(570, 7, 'A', 158, '7A158', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1589'),
(571, 7, 'A', 158, '7A158', 10, 'ইসলাম শিক্ষা', 1, '7A15810'),
(572, 7, 'A', 158, '7A158', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A15811'),
(573, 7, 'A', 159, '7A159', 1, 'বাংলা', 1, '7A1591'),
(574, 7, 'A', 159, '7A159', 2, 'English', 1, '7A1592'),
(575, 7, 'A', 159, '7A159', 3, 'গণিত', 1, '7A1593'),
(576, 7, 'A', 159, '7A159', 4, 'বিজ্ঞান', 1, '7A1594'),
(577, 7, 'A', 159, '7A159', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1595'),
(578, 7, 'A', 159, '7A159', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1596'),
(579, 7, 'A', 159, '7A159', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1597'),
(580, 7, 'A', 159, '7A159', 8, 'জীবন ও জীবিকা', 1, '7A1598'),
(581, 7, 'A', 159, '7A159', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1599'),
(582, 7, 'A', 159, '7A159', 10, 'ইসলাম শিক্ষা', 1, '7A15910'),
(583, 7, 'A', 159, '7A159', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A15911'),
(584, 7, 'A', 160, '7A160', 1, 'বাংলা', 1, '7A1601'),
(585, 7, 'A', 160, '7A160', 2, 'English', 1, '7A1602'),
(586, 7, 'A', 160, '7A160', 3, 'গণিত', 1, '7A1603'),
(587, 7, 'A', 160, '7A160', 4, 'বিজ্ঞান', 1, '7A1604'),
(588, 7, 'A', 160, '7A160', 5, 'ইতিহাস ও সামাজিক বিজ্ঞান', 1, '7A1605'),
(589, 7, 'A', 160, '7A160', 6, 'ডিজিটাল প্রযুক্তি', 1, '7A1606'),
(590, 7, 'A', 160, '7A160', 7, 'স্বাস্থ্য সুরক্ষা', 1, '7A1607'),
(591, 7, 'A', 160, '7A160', 8, 'জীবন ও জীবিকা', 1, '7A1608'),
(592, 7, 'A', 160, '7A160', 9, 'শিল্প ও সংস্কৃতি', 1, '7A1609'),
(593, 7, 'A', 160, '7A160', 10, 'ইসলাম শিক্ষা', 1, '7A16010'),
(594, 7, 'A', 160, '7A160', 11, 'হিন্দুধর্ম শিক্ষা', 1, '7A16011');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
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
  `barcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `classname`, `classnumber`, `secgroup`, `subname`, `subcode`, `subfullmarks`, `gradecode`, `subteacher`, `teacherid`, `uni`, `barcode`) VALUES
(24, 'Class Eight', '8', 'A', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '8A109', 0),
(25, 'Class Eight', '8', 'A', 'Bangladesh & Global Studies', 150, 100, 'gr001', 'Shuvo Biswas', 1, '8A150', 0),
(26, 'Class Eight', '8', 'A', 'Science', 127, 100, 'gr001', 'Shuvo Biswas', 1, '8A127', 0),
(27, 'Class Eight', '8', 'A', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '8A111', 0),
(28, 'Class Eight', '8', 'A', 'ICT', 154, 50, 'gr002', 'Shuvo Biswas', 1, '8A154', 0),
(29, 'Class Nine', '9', 'Science', 'Bangla 1st Paper', 101, 100, 'gr001', 'Shuvo Biswas', 1, '9Science101', 0),
(30, 'Class Nine', '9', 'Science', 'Bangla 2nd Paper', 102, 100, 'gr001', 'Shuvo Biswas', 1, '9Science102', 0),
(31, 'Class Nine', '9', 'Science', 'English 1st Paper', 107, 100, 'gr001', 'Shuvo Biswas', 1, '9Science107', 0),
(32, 'Class Nine', '9', 'Science', 'English 2nd Paper', 108, 100, 'gr001', 'Shuvo Biswas', 1, '9Science108', 0),
(33, 'Class Nine', '9', 'Science', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '9Science109', 0),
(34, 'Class Nine', '9', 'Science', 'Bangladesh & Global Studies', 150, 100, 'gr001', 'Shuvo Biswas', 1, '9Science150', 0),
(35, 'Class Nine', '9', 'Science', 'Physics', 136, 100, 'gr001', 'Shuvo Biswas', 1, '9Science136', 0),
(37, 'Class Nine', '9', 'Science', 'Biology', 138, 100, 'gr001', 'Shuvo Biswas', 1, '9Science138', 0),
(38, 'Class Nine', '9', 'Science', 'Higher Math', 126, 100, 'gr001', 'Shuvo Biswas', 1, '9Science126', 0),
(39, 'Class Nine', '9', 'Science', 'Agriculture Studies', 134, 100, 'gr001', 'Shuvo Biswas', 1, '9Science134', 0),
(40, 'Class Ten', '10', 'Science', 'Bangla 1st Paper', 101, 100, 'gr001', 'Shuvo Biswas', 1, '10Science101', 0),
(41, 'Class Ten', '10', 'Science', 'Bangla 2nd Paper', 102, 100, 'gr001', 'Shuvo Biswas', 1, '10Science102', 0),
(42, 'Class Ten', '10', 'Science', 'English 1st Paper', 107, 100, 'gr001', 'Shuvo Biswas', 1, '10Science107', 0),
(43, 'Class Ten', '10', 'Science', 'English 2nd Paper', 108, 100, 'gr001', 'Shuvo Biswas', 1, '10Science108', 0),
(44, 'Class Ten', '10', 'Science', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '10Science109', 0),
(45, 'Class Ten', '10', 'Science', 'Bangladesh & Global Studies', 150, 100, 'gr001', 'Shuvo Biswas', 1, '10Science150', 0),
(46, 'Class Ten', '10', 'Science', 'Physics', 136, 100, 'gr001', 'Shuvo Biswas', 1, '10Science136', 0),
(47, 'Class Ten', '10', 'Science', 'Chemstry', 137, 100, 'gr001', 'Shuvo Biswas', 1, '10Science137', 0),
(48, 'Class Ten', '10', 'Science', 'Biology', 138, 100, 'gr001', 'Shuvo Biswas', 1, '10Science138', 0),
(49, 'Class Ten', '10', 'Science', 'Higher Math', 126, 100, 'gr001', 'Shuvo Biswas', 1, '10Science126', 0),
(50, 'Class Ten', '10', 'Science', 'Agriculture Studies', 134, 100, 'gr001', 'Shuvo Biswas', 1, '10Science134', 0),
(51, 'Class Nine', '9', 'Arts', 'Bangla 1st Paper', 101, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts101', 0),
(52, 'Class Nine', '9', 'Arts', 'Bangla 2nd Paper', 102, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts102', 0),
(53, 'Class Nine', '9', 'Arts', 'English 1st Paper', 107, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts107', 0),
(54, 'Class Nine', '9', 'Arts', 'English 2nd Paper', 108, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts108', 0),
(55, 'Class Nine', '9', 'Arts', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts109', 0),
(56, 'Class Nine', '9', 'Arts', 'Science', 127, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts127', 0),
(57, 'Class Nine', '9', 'Arts', 'History', 153, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts153', 0),
(59, 'Class Nine', '9', 'Arts', 'Geography', 110, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts110', 0),
(65, 'Class Ten', '10', 'Science', 'ICT', 154, 50, 'gr002', 'Shuvo Biswas', 1, '10Science154', 0),
(67, 'Class Nine', '9', 'Science', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '9Science111', 0),
(69, 'Class Nine', '9', 'Arts', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts111', 0),
(70, 'Class Nine', '9', 'Arts', 'Agriculture Studies', 134, 100, 'gr001', 'Shuvo Biswas', 1, '9Arts134', 0),
(72, 'Class Ten', '10', 'Arts', 'Bangla 1st Paper', 101, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts101', 0),
(73, 'Class Ten', '10', 'Arts', 'Bangla 2nd Paper', 102, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts102', 0),
(74, 'Class Ten', '10', 'Arts', 'English 1st Paper', 107, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts107', 0),
(75, 'Class Ten', '10', 'Arts', 'English 2nd Paper', 108, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts108', 0),
(76, 'Class Ten', '10', 'Arts', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts109', 0),
(77, 'Class Ten', '10', 'Arts', 'Science', 127, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts127', 0),
(78, 'Class Ten', '10', 'Arts', 'History', 153, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts153', 0),
(79, 'Class Ten', '10', 'Arts', 'Geography', 110, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts110', 0),
(81, 'Class Ten', '10', 'Arts', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts111', 0),
(82, 'Class Ten', '10', 'Arts', 'Agriculture Studies', 134, 100, 'gr001', 'Shuvo Biswas', 1, '10Arts134', 0),
(83, 'Class Ten', '10', 'Arts', 'ICT', 154, 50, 'gr002', 'Shuvo Biswas', 1, '10Arts154', 0),
(84, 'Class Nine', '9', 'Commerce', 'Bangla 1st Paper', 101, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce101', 0),
(85, 'Class Nine', '9', 'Commerce', 'Bangla 2nd Paper', 102, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce102', 0),
(86, 'Class Nine', '9', 'Commerce', 'English 1st Paper', 107, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce107', 0),
(87, 'Class Nine', '9', 'Commerce', 'English 2nd Paper', 108, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce108', 0),
(88, 'Class Nine', '9', 'Commerce', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce109', 0),
(89, 'Class Nine', '9', 'Commerce', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce111', 0),
(90, 'Class Nine', '9', 'Commerce', 'ICT', 154, 50, 'gr002', 'Shuvo Biswas', 1, '9Commerce154', 0),
(92, 'Class Nine', '9', 'Commerce', 'Accounting', 146, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce146', 0),
(93, 'Class Nine', '9', 'Commerce', 'Science', 127, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce127', 0),
(94, 'Class Nine', '9', 'Commerce', 'Finance & Banking', 152, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce152', 0),
(95, 'Class Nine', '9', 'Commerce', 'Business Ent.', 143, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce143', 0),
(96, 'Class Nine', '9', 'Commerce', 'Agricultural Studies', 134, 100, 'gr001', 'Shuvo Biswas', 1, '9Commerce134', 0),
(97, 'Class Ten', '10', 'Commerce', 'Bangla 1st Paper', 101, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce101', 0),
(98, 'Class Ten', '10', 'Commerce', 'Bangla 2nd Paper', 102, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce102', 0),
(99, 'Class Ten', '10', 'Commerce', 'English 1st Paper', 107, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce107', 0),
(100, 'Class Ten', '10', 'Commerce', 'English 2nd Paper', 108, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce108', 0),
(101, 'Class Ten', '10', 'Commerce', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce109', 0),
(102, 'Class Ten', '10', 'Commerce', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce111', 0),
(103, 'Class Ten', '10', 'Commerce', 'ICT', 154, 50, 'gr002', 'Shuvo Biswas', 1, '10Commerce154', 0),
(104, 'Class Ten', '10', 'Commerce', 'Accounting', 146, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce146', 0),
(105, 'Class Ten', '10', 'Commerce', 'Science', 127, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce127', 0),
(106, 'Class Ten', '10', 'Commerce', 'Finance & Banking', 152, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce152', 0),
(107, 'Class Ten', '10', 'Commerce', 'Business Ent.', 143, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce143', 0),
(108, 'Class Ten', '10', 'Commerce', 'Agricultural Studies', 134, 100, 'gr001', 'Shuvo Biswas', 1, '10Commerce134', 0),
(131, 'Class Eight', '8', 'B', 'Math', 109, 100, 'gr001', 'Shuvo Biswas', 1, '8B109', 0),
(132, 'Class Eight', '8', 'B', 'Bangladesh & Global Studies', 150, 100, 'gr001', 'Shuvo Biswas', 1, '8B150', 0),
(133, 'Class Eight', '8', 'B', 'Science', 127, 100, 'gr001', 'Shuvo Biswas', 1, '8B127', 0),
(134, 'Class Eight', '8', 'B', 'Religion', 111, 100, 'gr001', 'Shuvo Biswas', 1, '8B111', 0),
(135, 'Class Eight', '8', 'B', 'ICT', 154, 50, 'gr002', 'Shuvo Biswas', 1, '8B154', 0),
(137, 'Class Nine', '9', 'Science', 'Chemistry', 137, 100, 'gr001', 'BIKASH CHANDRA BISWAS', 1, '9Science137', 0),
(142, 'Class Nine', '9', 'Science', 'ICT', 154, 50, 'gr002', 'BIKASH CHANDRA BISWAS', 1, '9Science154', 0),
(143, 'Class Nine', '9', 'Arts', 'ICT', 154, 50, 'gr002', 'BIKASH CHANDRA BISWAS', 1, '9Arts154', 0),
(194, 'Class Eight', '8', 'A', 'Agriculture Studies', 134, 25, 'gr003', 'PRODYUT KUMAR BHADRA', 1005564, '8A134', 0),
(202, 'Class Eight', '8', 'B', 'Agriculture Studies', 134, 25, 'gr003', 'PRODYUT KUMAR BHADRA', 1005564, '8B134', 0),
(203, 'Class Nine', '9', 'Arts', 'Economic', 140, 100, 'gr001', 'PRODYUT KUMAR BHADRA', 1005564, '9Arts140', 0),
(258, 'Class Ten', '10', 'Arts', 'Economy', 140, 100, 'gr001', 'PRODYUT KUMAR BHADRA', 1005564, '10Arts140', 0),
(263, 'Class Ten', '10', 'Science', 'Religion', 111, 100, 'gr001', 'PRADYUT KUMAR BHADRA', 1005564, '10Science111', 0),
(264, 'Class Eight', '8', 'A', 'Bangla', 101, 100, 'gr001', 'Jagadish Chandra Majumder', 3, '8A101', 0),
(266, 'Class Eight', '8', 'A', 'English', 107, 100, 'gr001', 'Jagadish Chandra Majumder', 3, '8A107', 0),
(268, 'Class Eight', '8', 'B', 'English', 107, 100, 'gr001', 'PRADYUT KUMAR BHADRA', 1005564, '8B107', 0),
(269, 'Class Eight', '8', 'B', 'Bangla', 101, 100, 'gr001', 'Jagadish Chandra Majumder', 3, '8B101', 0),
(270, 'Class Six', '6', 'A', 'বাংলা', 1, 100, '0', 'Shuvo Biswas', 1, '6A1', 0),
(271, 'Class Six', '6', 'A', 'English', 2, 100, '0', 'Shuvo Biswas', 1, '6A2', 0),
(272, 'Class Six', '6', 'A', 'গণিত', 3, 100, '0', 'Shuvo Biswas', 1, '6A3', 0),
(273, 'Class Six', '6', 'A', 'বিজ্ঞান', 4, 100, '0', 'Shuvo Biswas', 1, '6A4', 0),
(274, 'Class Six', '6', 'A', 'ইতিহাস ও সামাজিক বিজ্ঞান', 5, 100, '0', 'Shuvo Biswas', 1, '6A5', 0),
(275, 'Class Six', '6', 'A', 'ডিজিটাল প্রযুক্তি', 6, 100, '0', 'Shuvo Biswas', 1, '6A6', 0),
(276, 'Class Six', '6', 'A', 'স্বাস্থ্য সুরক্ষা', 7, 100, '0', 'Shuvo Biswas', 1, '6A7', 0),
(277, 'Class Six', '6', 'A', 'জীবন ও জীবিকা', 8, 100, '0', 'Shuvo Biswas', 1, '6A8', 0),
(278, 'Class Six', '6', 'A', 'শিল্প ও সংস্কৃতি', 9, 100, '0', 'Shuvo Biswas', 1, '6A9', 0),
(279, 'Class Six', '6', 'A', 'ইসলাম শিক্ষা', 10, 100, '0', 'Shuvo Biswas', 1, '6A10', 0),
(280, 'Class Six', '6', 'A', 'হিন্দুধর্ম শিক্ষা', 11, 100, '0', 'Shuvo Biswas', 1, '6A11', 0),
(281, 'Class Six', '6', 'B', 'বাংলা', 1, 100, '0', 'Shuvo Biswas', 1, '6B1', 0),
(282, 'Class Six', '6', 'B', 'English', 2, 100, '0', 'Shuvo Biswas', 1, '6B2', 0),
(283, 'Class Six', '6', 'B', 'গণিত', 3, 100, '0', 'Shuvo Biswas', 1, '6B3', 0),
(284, 'Class Six', '6', 'B', 'বিজ্ঞান', 4, 100, '0', 'Shuvo Biswas', 1, '6B4', 0),
(285, 'Class Six', '6', 'B', 'ইতিহাস ও সামাজিক বিজ্ঞান', 5, 100, '0', 'Shuvo Biswas', 1, '6B5', 0),
(286, 'Class Six', '6', 'B', 'ডিজিটাল প্রযুক্তি', 6, 100, '0', 'Shuvo Biswas', 1, '6B6', 0),
(287, 'Class Six', '6', 'B', 'স্বাস্থ্য সুরক্ষা', 7, 100, '0', 'Shuvo Biswas', 1, '6B7', 0),
(288, 'Class Six', '6', 'B', 'জীবন ও জীবিকা', 8, 100, '0', 'Shuvo Biswas', 1, '6B8', 0),
(289, 'Class Six', '6', 'B', 'শিল্প ও সংস্কৃতি', 9, 100, '0', 'Shuvo Biswas', 1, '6B9', 0),
(290, 'Class Six', '6', 'B', 'ইসলাম শিক্ষা', 10, 100, '0', 'Shuvo Biswas', 1, '6B10', 0),
(291, 'Class Six', '6', 'B', 'হিন্দুধর্ম শিক্ষা', 11, 100, '0', 'Shuvo Biswas', 1, '6B11', 0),
(292, 'Class Seven', '7', 'B', 'বাংলা', 1, 100, '0', 'Shuvo Biswas', 1, '7B1', 0),
(293, 'Class Seven', '7', 'B', 'English', 2, 100, '0', 'Shuvo Biswas', 1, '7B2', 0),
(294, 'Class Seven', '7', 'B', 'গণিত', 3, 100, '0', 'Shuvo Biswas', 1, '7B3', 0),
(295, 'Class Seven', '7', 'B', 'বিজ্ঞান', 4, 100, '0', 'Shuvo Biswas', 1, '7B4', 0),
(296, 'Class Seven', '7', 'B', 'ইতিহাস ও সামাজিক বিজ্ঞান', 5, 100, '0', 'Shuvo Biswas', 1, '7B5', 0),
(297, 'Class Seven', '7', 'B', 'ডিজিটাল প্রযুক্তি', 6, 100, '0', 'Shuvo Biswas', 1, '7B6', 0),
(298, 'Class Seven', '7', 'B', 'স্বাস্থ্য সুরক্ষা', 7, 100, '0', 'Shuvo Biswas', 1, '7B7', 0),
(299, 'Class Seven', '7', 'B', 'জীবন ও জীবিকা', 8, 100, '0', 'Shuvo Biswas', 1, '7B8', 0),
(300, 'Class Seven', '7', 'B', 'শিল্প ও সংস্কৃতি', 9, 100, '0', 'Shuvo Biswas', 1, '7B9', 0),
(301, 'Class Seven', '7', 'B', 'ইসলাম শিক্ষা', 10, 100, '0', 'Shuvo Biswas', 1, '7B10', 0),
(302, 'Class Seven', '7', 'B', 'হিন্দুধর্ম শিক্ষা', 11, 100, '0', 'Shuvo Biswas', 1, '7B11', 0),
(303, 'Class Seven', '7', 'A', 'বাংলা', 1, 100, '0', 'Shuvo Biswas', 1, '7A1', 0),
(304, 'Class Seven', '7', 'A', 'English', 2, 100, '0', 'Shuvo Biswas', 1, '7A2', 0),
(305, 'Class Seven', '7', 'A', 'গণিত', 3, 100, '0', 'Shuvo Biswas', 1, '7A3', 0),
(306, 'Class Seven', '7', 'A', 'বিজ্ঞান', 4, 100, '0', 'Shuvo Biswas', 1, '7A4', 0),
(307, 'Class Seven', '7', 'A', 'ইতিহাস ও সামাজিক বিজ্ঞান', 5, 100, '0', 'Shuvo Biswas', 1, '7A5', 0),
(308, 'Class Seven', '7', 'A', 'ডিজিটাল প্রযুক্তি', 6, 100, '0', 'Shuvo Biswas', 1, '7A6', 0),
(309, 'Class Seven', '7', 'A', 'স্বাস্থ্য সুরক্ষা', 7, 100, '0', 'Shuvo Biswas', 1, '7A7', 0),
(310, 'Class Seven', '7', 'A', 'জীবন ও জীবিকা', 8, 100, '0', 'Shuvo Biswas', 1, '7A8', 0),
(311, 'Class Seven', '7', 'A', 'শিল্প ও সংস্কৃতি', 9, 100, '0', 'Shuvo Biswas', 1, '7A9', 0),
(312, 'Class Seven', '7', 'A', 'ইসলাম শিক্ষা', 10, 100, '0', 'Shuvo Biswas', 1, '7A10', 0),
(313, 'Class Seven', '7', 'A', 'হিন্দুধর্ম শিক্ষা', 11, 100, '0', 'Shuvo Biswas', 1, '7A11', 0),
(314, 'Class Six', '6', 'Mollika', 'Bangla', 101, 100, 'gr001', 'Alok Kanti Biswas', 1, '6Mollika101', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subjectteacher`
--

CREATE TABLE `subjectteacher` (
  `id` int(11) NOT NULL,
  `classnumber` int(11) NOT NULL,
  `secgroup` varchar(255) NOT NULL,
  `subcode` int(11) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subjectteacher`
--

INSERT INTO `subjectteacher` (`id`, `classnumber`, `secgroup`, `subcode`, `tid`) VALUES
(1, 6, 'Mollika', 3, 4),
(2, 6, 'Shapla', 8, 4),
(3, 7, 'B', 2, 4),
(4, 7, 'A', 8, 4),
(5, 9, 'Commerce', 134, 4),
(6, 9, 'Arts', 134, 4),
(7, 10, 'Commerce', 134, 4),
(8, 10, 'Arts', 134, 4),
(9, 7, 'B', 8, 5),
(10, 8, 'A', 109, 4),
(11, 8, 'A', 107, 5),
(12, 8, 'A', 108, 5),
(13, 8, 'B', 108, 5),
(14, 9, 'Commerce', 152, 5),
(15, 9, 'Commerce', 146, 5),
(16, 6, 'Golap', 6, 6),
(17, 7, 'A', 111, 6),
(18, 7, 'B', 111, 6),
(19, 9, 'Arts', 110, 16),
(20, 9, 'Science', 111, 12),
(21, 9, 'Commerce', 111, 12),
(22, 9, 'Arts', 111, 12),
(23, 10, 'Science', 111, 6),
(24, 10, 'Commerce', 111, 6),
(25, 10, 'Arts', 111, 6),
(26, 6, 'Mollika', 2, 7),
(27, 6, 'Mollika', 9, 7),
(28, 6, 'Shapla', 10, 7),
(29, 8, 'B', 101, 7),
(31, 10, 'Arts', 143, 7),
(32, 6, 'Golap', 3, 8),
(33, 7, 'A', 3, 8),
(34, 8, 'B', 109, 8),
(35, 9, 'Arts', 109, 8),
(36, 9, 'Science', 126, 8),
(37, 10, 'Arts', 127, 8),
(38, 10, 'Commerce', 127, 8),
(39, 10, 'Science', 126, 8),
(40, 6, 'Mollika', 1, 9),
(41, 6, 'Golap', 9, 9),
(42, 6, 'Shapla', 5, 9),
(43, 7, 'B', 9, 9),
(44, 8, 'B', 111, 12),
(45, 7, 'B', 3, 10),
(46, 9, 'Arts', 143, 10),
(47, 9, 'Science', 153, 10),
(48, 9, 'Science', 101, 10),
(49, 9, 'Commerce', 101, 10),
(50, 9, 'Arts', 101, 10),
(51, 10, 'Science', 102, 10),
(52, 10, 'Commerce', 102, 10),
(53, 10, 'Arts', 102, 10),
(54, 6, 'Shapla', 4, 11),
(55, 9, 'Science', 136, 11),
(56, 9, 'Science', 137, 11),
(57, 10, 'Science', 109, 11),
(58, 10, 'Commerce', 109, 11),
(59, 10, 'Arts', 109, 11),
(60, 10, 'Science', 136, 11),
(61, 10, 'Science', 137, 11),
(62, 6, 'Golap', 10, 12),
(63, 6, 'Shapla', 1, 12),
(64, 7, 'A', 11, 12),
(65, 8, 'A', 111, 12),
(66, 9, 'Science', 111, 12),
(67, 9, 'Commerce', 111, 12),
(68, 9, 'Arts', 111, 12),
(69, 10, 'Science', 111, 12),
(70, 10, 'Commerce', 111, 12),
(71, 10, 'Arts', 111, 12),
(72, 6, 'Golap', 1, 15),
(73, 6, 'Mollika', 5, 15),
(74, 6, 'Golap', 4, 16),
(75, 6, 'Golap', 7, 16),
(76, 7, 'A', 7, 16),
(77, 8, 'A', 101, 16),
(78, 8, 'B', 102, 16),
(81, 10, 'Commerce', 143, 16),
(82, 7, 'A', 2, 17),
(83, 7, 'A', 5, 17),
(84, 7, 'B', 7, 17),
(85, 10, 'Science', 107, 17),
(86, 10, 'Commerce', 107, 17),
(87, 10, 'Arts', 107, 17),
(88, 10, 'Science', 108, 17),
(89, 10, 'Commerce', 108, 17),
(90, 10, 'Arts', 108, 17),
(91, 9, 'Science', 107, 17),
(92, 9, 'Commerce', 107, 17),
(93, 9, 'Arts', 107, 17),
(94, 9, 'Science', 108, 17),
(95, 9, 'Commerce', 108, 17),
(96, 9, 'Arts', 108, 17),
(97, 6, 'Mollika', 6, 18),
(98, 7, 'B', 4, 18),
(99, 7, 'A', 11, 18),
(100, 7, 'B', 6, 18),
(101, 9, 'Science', 154, 18),
(102, 9, 'Commerce', 154, 18),
(103, 9, 'Arts', 154, 18),
(104, 10, 'Science', 154, 18),
(105, 10, 'Commerce', 154, 18),
(106, 10, 'Arts', 154, 18),
(108, 8, 'B', 101, 7),
(120, 8, 'A', 102, 16),
(121, 8, 'B', 101, 7),
(122, 6, 'Shapla', 2, 4),
(123, 6, 'Shapla', 3, 4),
(124, 6, 'Shapla', 6, 4),
(125, 6, 'Shapla', 7, 4),
(126, 6, 'Shapla', 9, 4),
(127, 6, 'Shapla', 11, 4),
(128, 8, 'B', 150, 4),
(129, 8, 'B', 127, 5),
(130, 8, 'B', 154, 18),
(131, 8, 'B', 107, 5),
(132, 8, 'A', 150, 12),
(133, 8, 'A', 127, 11),
(134, 8, 'A', 154, 18),
(135, 9, 'Science', 102, 4),
(136, 9, 'Science', 109, 4),
(137, 9, 'Science', 150, 4),
(138, 9, 'Science', 138, 4),
(139, 9, 'Science', 134, 4),
(140, 9, 'Commerce', 102, 4),
(141, 9, 'Commerce', 109, 4),
(142, 9, 'Commerce', 127, 4),
(143, 9, 'Commerce', 143, 5),
(144, 9, 'Arts', 102, 4),
(145, 9, 'Arts', 127, 4),
(146, 9, 'Arts', 153, 4),
(147, 6, 'Mollika', 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tc`
--

CREATE TABLE `tc` (
  `id` int(11) NOT NULL,
  `stu_card` int(255) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `memorial_no` varchar(2000) NOT NULL,
  `village` varchar(2000) NOT NULL,
  `post` varchar(2000) NOT NULL,
  `ps` varchar(2000) NOT NULL,
  `ds` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tc`
--

INSERT INTO `tc` (`id`, `stu_card`, `stu_id`, `pdate`, `memorial_no`, `village`, `post`, `ps`, `ds`) VALUES
(1, 625577, '6Mollika5', '2024-06-21', 'dsfsadfadsf', 'পুইশুর', 'বলাকইড়', 'গোপালগঞ্জ সদর', 'গোপালগঞ্জ'),
(3, 625577, '6Mollika5', '2024-06-21', 'ggsdsfg', 'পুইশুর', 'বলাকইড়', 'গোপালগঞ্জ সদর', 'গোপালগঞ্জ');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tfname` varchar(255) NOT NULL,
  `tmname` varchar(255) NOT NULL,
  `tdob` varchar(255) NOT NULL,
  `leatestdegree` varchar(255) NOT NULL,
  `mob` varchar(255) NOT NULL,
  `degnation` varchar(255) NOT NULL,
  `teachersl` varchar(255) NOT NULL,
  `joindate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `tfname`, `tmname`, `tdob`, `leatestdegree`, `mob`, `degnation`, `teachersl`, `joindate`) VALUES
(1, 'Alok Kanti Biswas', 'Barun Kanti Biswas', 'Shandhya Rani Biswas', '1998-10-10', 'B.S.C', '01783808373', 'Head Teacher', '1', '2024-04-28');

-- --------------------------------------------------------

--
-- Table structure for table `teacherlogin`
--

CREATE TABLE `teacherlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `teachersl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacherlogin`
--

INSERT INTO `teacherlogin` (`id`, `name`, `username`, `password`, `created_at`, `teachersl`) VALUES
(1, 'Alok Kanti Biswas', 'alok001', '$2y$10$4SA00SXOx4dgzXQ/5X3Tp.8HwqZDuFzN1vEaWtTQufUVB8VIP9Ety', '2024-04-28 14:06:31', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
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
  `issuedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `studentName`, `fatherName`, `motherName`, `dob`, `village`, `post`, `ps`, `ds`, `passingYear`, `studentGroup`, `gpa`, `grade`, `result`, `roll`, `registration`, `issuedate`) VALUES
(2, 'SHUVO BISWAS', 'BARUN KANTI BISWAS', 'SHANDHYA RANI BISWAS', '10-08-1998', 'Puisur', 'Balakair', 'Gopalganj Sadar', 'Gopalganj', 2014, 'SCIENCE', 4.63, 'A', 'pass', '154485', '1110325644', '2024-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'shuvo003', '$2y$10$MmeOsShkP36EcLKTBeaLcuMjnahXNCYiZ.FuuuqQDdNcqgrWFI/Dm', '2022-03-16 08:22:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountuser`
--
ALTER TABLE `accountuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminloginlogs`
--
ALTER TABLE `adminloginlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a_teacherlogin_logs`
--
ALTER TABLE `a_teacherlogin_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bnumber` (`bnumber`);

--
-- Indexes for table `buildingroom`
--
ALTER TABLE `buildingroom`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniid` (`uniid`);

--
-- Indexes for table `buildingroombench`
--
ALTER TABLE `buildingroombench`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uninum` (`uninum`);

--
-- Indexes for table `cardprintstatus`
--
ALTER TABLE `cardprintstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapteruniid_index` (`chapteruniid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classnumber` (`classnumber`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dip` (`dip`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `exam67`
--
ALTER TABLE `exam67`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `exam67lesson`
--
ALTER TABLE `exam67lesson`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `exammark`
--
ALTER TABLE `exammark`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examuni` (`examuni`);

--
-- Indexes for table `exammark67`
--
ALTER TABLE `exammark67`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni` (`uni`);

--
-- Indexes for table `examroutine`
--
ALTER TABLE `examroutine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uexid` (`uexid`);

--
-- Indexes for table `examseatinfo`
--
ALTER TABLE `examseatinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniid` (`uniid`);

--
-- Indexes for table `examseatplan`
--
ALTER TABLE `examseatplan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `examseatplanc1c2`
--
ALTER TABLE `examseatplanc1c2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `examseatplanc1c2c3`
--
ALTER TABLE `examseatplanc1c2c3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `examseatplanc2`
--
ALTER TABLE `examseatplanc2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_catagory`
--
ALTER TABLE `expense_catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grademark`
--
ALTER TABLE `grademark`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni` (`uni`);

--
-- Indexes for table `gradename`
--
ALTER TABLE `gradename`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fullmark` (`fullmark`);

--
-- Indexes for table `groupsecname`
--
ALTER TABLE `groupsecname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagesl`
--
ALTER TABLE `imagesl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stuuniqid` (`stuuniqid`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inviceid`
--
ALTER TABLE `inviceid`
  ADD UNIQUE KEY `uni_iid` (`uni_iid`);

--
-- Indexes for table `invoicetrx`
--
ALTER TABLE `invoicetrx`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni` (`uni`);

--
-- Indexes for table `libary_author`
--
ALTER TABLE `libary_author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libary_book_list`
--
ALTER TABLE `libary_book_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libary_book_stock`
--
ALTER TABLE `libary_book_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookid` (`bookid`);

--
-- Indexes for table `libary_libariyan_user`
--
ALTER TABLE `libary_libariyan_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libary_publisher`
--
ALTER TABLE `libary_publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_book_issue`
--
ALTER TABLE `library_book_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machineattlog`
--
ALTER TABLE `machineattlog`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uniid` (`uniid`);

--
-- Indexes for table `machinedata`
--
ALTER TABLE `machinedata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stuid` (`stuid`);

--
-- Indexes for table `markentrylog`
--
ALTER TABLE `markentrylog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meritlist`
--
ALTER TABLE `meritlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqm` (`uniqm`);

--
-- Indexes for table `paycat`
--
ALTER TABLE `paycat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personalholyday`
--
ALTER TABLE `personalholyday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protyon`
--
ALTER TABLE `protyon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publicholyday`
--
ALTER TABLE `publicholyday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resultpub`
--
ALTER TABLE `resultpub`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `examid` (`examid`);

--
-- Indexes for table `rfid`
--
ALTER TABLE `rfid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rfid` (`rfid`),
  ADD UNIQUE KEY `stuid` (`stuid`);

--
-- Indexes for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectiongroup`
--
ALTER TABLE `sectiongroup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uninumber` (`uninumber`);

--
-- Indexes for table `set_admit_id`
--
ALTER TABLE `set_admit_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smsbal`
--
ALTER TABLE `smsbal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smslog`
--
ALTER TABLE `smslog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuaddress`
--
ALTER TABLE `stuaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stuaddressbangla`
--
ALTER TABLE `stuaddressbangla`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stuid` (`stuid`);

--
-- Indexes for table `stuattdancedata`
--
ALTER TABLE `stuattdancedata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqattid` (`uniqattid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `studentpayment`
--
ALTER TABLE `studentpayment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `puniid` (`puniid`);

--
-- Indexes for table `sturegstatus`
--
ALTER TABLE `sturegstatus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqid` (`uniqid`);

--
-- Indexes for table `sturegsubject`
--
ALTER TABLE `sturegsubject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unisubstatus` (`unisubstatus`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni` (`uni`);

--
-- Indexes for table `subjectteacher`
--
ALTER TABLE `subjectteacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc`
--
ALTER TABLE `tc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachersl` (`teachersl`);

--
-- Indexes for table `teacherlogin`
--
ALTER TABLE `teacherlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachersl` (`teachersl`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration` (`registration`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountuser`
--
ALTER TABLE `accountuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adminloginlogs`
--
ALTER TABLE `adminloginlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `a_teacherlogin_logs`
--
ALTER TABLE `a_teacherlogin_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `building`
--
ALTER TABLE `building`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buildingroom`
--
ALTER TABLE `buildingroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buildingroombench`
--
ALTER TABLE `buildingroombench`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cardprintstatus`
--
ALTER TABLE `cardprintstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam67`
--
ALTER TABLE `exam67`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam67lesson`
--
ALTER TABLE `exam67lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exammark`
--
ALTER TABLE `exammark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exammark67`
--
ALTER TABLE `exammark67`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examroutine`
--
ALTER TABLE `examroutine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `examseatinfo`
--
ALTER TABLE `examseatinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `examseatplan`
--
ALTER TABLE `examseatplan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examseatplanc1c2`
--
ALTER TABLE `examseatplanc1c2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examseatplanc1c2c3`
--
ALTER TABLE `examseatplanc1c2c3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examseatplanc2`
--
ALTER TABLE `examseatplanc2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expense_catagory`
--
ALTER TABLE `expense_catagory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grademark`
--
ALTER TABLE `grademark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `gradename`
--
ALTER TABLE `gradename`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groupsecname`
--
ALTER TABLE `groupsecname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `imagesl`
--
ALTER TABLE `imagesl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicetrx`
--
ALTER TABLE `invoicetrx`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `libary_author`
--
ALTER TABLE `libary_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `libary_book_list`
--
ALTER TABLE `libary_book_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `libary_book_stock`
--
ALTER TABLE `libary_book_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `libary_libariyan_user`
--
ALTER TABLE `libary_libariyan_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `libary_publisher`
--
ALTER TABLE `libary_publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `library_book_issue`
--
ALTER TABLE `library_book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `machineattlog`
--
ALTER TABLE `machineattlog`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `machinedata`
--
ALTER TABLE `machinedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=550;

--
-- AUTO_INCREMENT for table `markentrylog`
--
ALTER TABLE `markentrylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meritlist`
--
ALTER TABLE `meritlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paycat`
--
ALTER TABLE `paycat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personalholyday`
--
ALTER TABLE `personalholyday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `protyon`
--
ALTER TABLE `protyon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `publicholyday`
--
ALTER TABLE `publicholyday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resultpub`
--
ALTER TABLE `resultpub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rfid`
--
ALTER TABLE `rfid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1141;

--
-- AUTO_INCREMENT for table `schoolinfo`
--
ALTER TABLE `schoolinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sectiongroup`
--
ALTER TABLE `sectiongroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `set_admit_id`
--
ALTER TABLE `set_admit_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `smsbal`
--
ALTER TABLE `smsbal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `smslog`
--
ALTER TABLE `smslog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `stuaddress`
--
ALTER TABLE `stuaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stuaddressbangla`
--
ALTER TABLE `stuaddressbangla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stuattdancedata`
--
ALTER TABLE `stuattdancedata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1957;

--
-- AUTO_INCREMENT for table `studentlogin`
--
ALTER TABLE `studentlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentpayment`
--
ALTER TABLE `studentpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `sturegstatus`
--
ALTER TABLE `sturegstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `sturegsubject`
--
ALTER TABLE `sturegsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT for table `subjectteacher`
--
ALTER TABLE `subjectteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `tc`
--
ALTER TABLE `tc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacherlogin`
--
ALTER TABLE `teacherlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
