-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2025 at 04:08 AM
-- Server version: 8.0.33
-- PHP Version: 8.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thsedub_my_soft_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `examroutine`
--

CREATE TABLE `examroutine` (
  `id` int NOT NULL,
  `exid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cgroup` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `examdate` date NOT NULL,
  `examtime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `align` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uexid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `examroutine`
--

INSERT INTO `examroutine` (`id`, `exid`, `class`, `cgroup`, `subcode`, `subname`, `examdate`, `examtime`, `align`, `uexid`, `active`) VALUES
(1, '1', '6', 'A', '101', 'Bangla 1st', '2025-06-24', '10 A.M.- 1 P.M.', 'l', '16101A', '1'),
(2, '1', '6', 'A', '102', 'Bangla 2nd', '2025-06-25', '10 A.M.- 1 P.M.', 'l', '16102A', '1'),
(3, '1', '6', 'A', '107', 'English 1st', '2025-06-26', '10 A.M.- 1 P.M.', 'l', '16107A', '1'),
(4, '1', '6', 'A', '108', 'English 2nd', '2025-06-29', '10 A.M.- 1 P.M.', 'l', '16108A', '1'),
(5, '1', '6', 'A', '109', 'Math', '2025-07-07', '10 A.M.- 1 P.M.', 'l', '16109A', '1'),
(6, '1', '6', 'A', '111', 'Religion', '2025-07-01', '10 A.M.- 1 P.M.', 'r', '16111A', '1'),
(7, '1', '6', 'A', '112', 'Hindu & Moral Education', '2025-07-01', '10 A.M.- 1 P.M.', 'r', '16112A', '1'),
(8, '1', '6', 'A', '127', 'Science', '2025-07-03', '10 A.M.- 1 P.M.', 'r', '16127A', '1'),
(9, '1', '6', 'A', '150', 'Bangladesh and global studies', '2025-07-08', '10 A.M.- 1 P.M.', 'r', '16150A', '1'),
(11, '1', '6', 'A', '154', 'Digital Technology', '2025-06-30', '10 A.M.- 1 P.M.', 'r', '16154A', '1'),
(22, '1', '6', 'A', '134', 'Agriculture Stuides', '2025-07-09', '10 A.M.- 1 P.M.', 'r', '16134A', '1'),
(23, '1', '9', 'Science', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM - 4.30 PM', 'l', '19101Science', '1'),
(24, '1', '9', 'Science', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM - 4.30 PM', 'l', '19102Science', '1'),
(25, '1', '9', 'Science', '107', 'English 1st Paper', '2025-06-26', '1.30 PM - 4.30 PM', 'l', '19107Science', '1'),
(26, '1', '9', 'Science', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM - 4.30 PM', 'l', '19108Science', '1'),
(27, '1', '9', 'Science', '109', 'Math', '2025-07-07', '1.30 PM - 4.30 PM', 'r', '19109Science', '1'),
(28, '1', '9', 'Science', '111', 'Religion', '2025-07-01', '1.30 PM - 4.30 PM', 'l', '19111Science', '1'),
(29, '1', '9', 'Science', '126', 'Higher Math', '2025-07-09', '1.30 PM - 4.30 PM', 'r', '19126Science', '1'),
(30, '1', '9', 'Science', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM - 4.30 PM', 'r', '19134Science', '1'),
(31, '1', '9', 'Science', '136', 'Physics', '2025-07-02', '1.30 PM - 4.30 PM', 'l', '19136Science', '1'),
(32, '1', '9', 'Science', '137', 'Chemstry', '2025-07-08', '1.30 PM - 4.30 PM', 'r', '19137Science', '1'),
(33, '1', '9', 'Science', '138', 'Biology', '2025-07-10', '1.30 PM - 4.30 PM', 'r', '19138Science', '1'),
(34, '1', '9', 'Science', '150', 'Bangladesh & Global Studies', '2025-07-03', '1.30 PM - 4.30 PM', 'r', '19150Science', '1'),
(35, '1', '9', 'Science', '154', 'ICT', '2025-06-30', '1.30 PM - 4.30 PM', 'l', '19154Science', '1'),
(36, '1', '9', 'Arts', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM - 4.30 PM', 'l', '19101Arts', '1'),
(37, '1', '9', 'Arts', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM - 4.30 PM', 'l', '19102Arts', '1'),
(38, '1', '9', 'Arts', '107', 'English 1st Paper', '2025-06-26', '1.30 PM - 4.30 PM', 'l', '19107Arts', '1'),
(39, '1', '9', 'Arts', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM - 4.30 PM', 'l', '19108Arts', '1'),
(40, '1', '9', 'Arts', '109', 'Math', '2025-07-07', '1.30 PM - 4.30 PM', 'r', '19109Arts', '1'),
(41, '1', '9', 'Arts', '110', 'Religion', '2025-07-08', '1.30 PM - 4.30 PM', 'r', '19110Arts', '1'),
(42, '1', '9', 'Arts', '111', 'Religion', '2025-07-01', '1.30 PM - 4.30 PM', 'l', '19111Arts', '1'),
(43, '1', '9', 'Arts', '127', 'Science', '2025-07-03', '1.30 PM - 4.30 PM', 'r', '19127Arts', '1'),
(44, '1', '9', 'Arts', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM - 4.30 PM', 'r', '19134Arts', '1'),
(45, '1', '9', 'Arts', '143', 'Civics', '2025-07-10', '1.30 PM - 4.30 PM', 'r', '19143Arts', '1'),
(46, '1', '9', 'Arts', '153', 'History', '2025-07-02', '1.30 PM - 4.30 PM', 'r', '19153Arts', '1'),
(47, '1', '9', 'Arts', '154', 'ICT', '2025-06-30', '1.30 PM - 4.30 PM', 'l', '19154Arts', '1'),
(48, '1', '10', 'Science', '101', 'Bangla 1st Paper', '2025-06-24', '10 AM- 1 PM', 'l', '110101Science', '1'),
(49, '1', '10', 'Science', '102', 'Bangla 2nd Paper', '2025-06-25', '10 AM- 1 PM', 'l', '110102Science', '1'),
(50, '1', '10', 'Science', '107', 'English 1st Paper', '2025-06-26', '10 AM- 1 PM', 'l', '110107Science', '1'),
(51, '1', '10', 'Science', '108', 'English 2nd Paper', '2025-06-29', '10 AM- 1 PM', 'l', '110108Science', '1'),
(52, '1', '10', 'Science', '109', 'Math', '2025-07-07', '10 AM- 1 PM', 'r', '110109Science', '1'),
(53, '1', '10', 'Science', '111', 'Religion', '2025-07-01', '10 AM- 1 PM', 'l', '110111Science', '1'),
(54, '1', '10', 'Science', '126', 'Higher Math', '2025-07-09', '10 AM- 1 PM', 'r', '110126Science', '1'),
(55, '1', '10', 'Science', '134', 'Agriculture Studies', '2025-07-09', '10 AM- 1 PM', 'r', '110134Science', '1'),
(56, '1', '10', 'Science', '136', 'Physics', '2025-07-02', '10 AM- 1 PM', 'r', '110136Science', '1'),
(57, '1', '10', 'Science', '137', 'Chemstry', '2025-07-08', '10 AM- 1 PM', 'r', '110137Science', '1'),
(58, '1', '10', 'Science', '138', 'Biology', '2025-07-10', '10 AM- 1 PM', 'r', '110138Science', '1'),
(59, '1', '10', 'Science', '150', 'Bangladesh & Global Studies', '2025-07-03', '10 AM- 1 PM', 'r', '110150Science', '1'),
(60, '1', '10', 'Science', '154', 'ICT', '2025-06-30', '10 AM- 1 PM', 'l', '110154Science', '1'),
(61, '1', '10', 'Arts', '101', 'Bangla 1st Paper', '2025-06-24', '10 AM- 1 PM', 'l', '110101Arts', '1'),
(62, '1', '10', 'Arts', '102', 'Bangla 2nd Paper', '2025-06-25', '10 AM- 1 PM', 'l', '110102Arts', '1'),
(63, '1', '10', 'Arts', '107', 'English 1st Paper', '2025-06-26', '10 AM- 1 PM', 'l', '110107Arts', '1'),
(64, '1', '10', 'Arts', '108', 'English 2nd Paper', '2025-06-29', '10 AM- 1 PM', 'l', '110108Arts', '1'),
(65, '1', '10', 'Arts', '109', 'Math', '2025-07-07', '10 AM- 1 PM', 'r', '110109Arts', '1'),
(66, '1', '10', 'Arts', '110', 'Religion', '2025-07-08', '10 AM- 1 PM', 'r', '110110Arts', '1'),
(67, '1', '10', 'Arts', '111', 'Religion', '2025-07-01', '10 AM- 1 PM', 'l', '110111Arts', '1'),
(68, '1', '10', 'Arts', '127', 'Science', '2025-07-03', '10 AM- 1 PM', 'r', '110127Arts', '1'),
(69, '1', '10', 'Arts', '134', 'Agriculture Studies', '2025-07-09', '10 AM- 1 PM', 'r', '110134Arts', '1'),
(70, '1', '10', 'Arts', '143', 'Civics', '2025-07-10', '10 AM- 1 PM', 'r', '110143Arts', '1'),
(71, '1', '10', 'Arts', '153', 'History', '2025-07-02', '10 AM- 1 PM', 'r', '110153Arts', '1'),
(72, '1', '10', 'Arts', '154', 'ICT', '2025-06-30', '10 AM- 1 PM', 'l', '110154Arts', '1'),
(86, '1', '9', 'B_Science', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM - 4.30 PM', 'l', '19101B_Science', '1'),
(87, '1', '9', 'B_Science', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM - 4.30 PM', 'l', '19102B_Science', '1'),
(88, '1', '9', 'B_Science', '107', 'English 1st Paper', '2025-06-26', '1.30 PM - 4.30 PM', 'l', '19107B_Science', '1'),
(89, '1', '9', 'B_Science', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM - 4.30 PM', 'l', '19108B_Science', '1'),
(90, '1', '9', 'B_Science', '109', 'Math', '2025-07-07', '1.30 PM - 4.30 PM', 'r', '19109B_Science', '1'),
(91, '1', '9', 'B_Science', '111', 'Religion', '2025-07-01', '1.30 PM - 4.30 PM', 'l', '19111B_Science', '1'),
(92, '1', '9', 'B_Science', '126', 'Higher Math', '2025-07-09', '1.30 PM - 4.30 PM', 'r', '19126B_Science', '1'),
(93, '1', '9', 'B_Science', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM - 4.30 PM', 'r', '19134B_Science', '1'),
(94, '1', '9', 'B_Science', '136', 'Physics', '2025-07-02', '1.30 PM - 4.30 PM', 'r', '19136B_Science', '1'),
(95, '1', '9', 'B_Science', '137', 'Chemstry', '2025-07-08', '1.30 PM - 4.30 PM', 'r', '19137B_Science', '1'),
(96, '1', '9', 'B_Science', '138', 'Biology', '2025-07-10', '1.30 PM - 4.30 PM', 'r', '19138B_Science', '1'),
(97, '1', '9', 'B_Science', '150', 'Bangladesh & Global Studies', '2025-07-03', '1.30 PM - 4.30 PM', 'r', '19150B_Science', '1'),
(98, '1', '9', 'B_Science', '154', 'ICT', '2025-06-30', '1.30 PM - 4.30 PM', 'l', '19154B_Science', '1'),
(99, '1', '9', 'B_Arts', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM - 4.30 PM', 'l', '19101B_Arts', '1'),
(100, '1', '9', 'B_Arts', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM - 4.30 PM', 'l', '19102B_Arts', '1'),
(101, '1', '9', 'B_Arts', '107', 'English 1st Paper', '2025-06-26', '1.30 PM - 4.30 PM', 'l', '19107B_Arts', '1'),
(102, '1', '9', 'B_Arts', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM - 4.30 PM', 'l', '19108B_Arts', '1'),
(103, '1', '9', 'B_Arts', '109', 'Math', '2025-07-07', '1.30 PM - 4.30 PM', 'r', '19109B_Arts', '1'),
(104, '1', '9', 'B_Arts', '110', 'Religion', '2025-07-08', '1.30 PM - 4.30 PM', 'r', '19110B_Arts', '1'),
(105, '1', '9', 'B_Arts', '111', 'Religion', '2025-07-01', '1.30 PM - 4.30 PM', 'l', '19111B_Arts', '1'),
(106, '1', '9', 'B_Arts', '127', 'Science', '2025-07-03', '1.30 PM - 4.30 PM', 'r', '19127B_Arts', '1'),
(107, '1', '9', 'B_Arts', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM - 4.30 PM', 'r', '19134B_Arts', '1'),
(108, '1', '9', 'B_Arts', '143', 'Civics', '2025-07-10', '1.30 PM - 4.30 PM', 'r', '19143B_Arts', '1'),
(109, '1', '9', 'B_Arts', '153', 'History', '2025-07-02', '1.30 PM - 4.30 PM', 'r', '19153B_Arts', '1'),
(110, '1', '9', 'B_Arts', '154', 'ICT', '2025-06-30', '1.30 PM - 4.30 PM', 'l', '19154B_Arts', '1'),
(111, '1', '10', 'B_Science', '101', 'Bangla 1st Paper', '2025-06-24', '10 AM- 1 PM', 'l', '110101B_Science', '1'),
(112, '1', '10', 'B_Science', '102', 'Bangla 2nd Paper', '2025-06-25', '10 AM- 1 PM', 'l', '110102B_Science', '1'),
(113, '1', '10', 'B_Science', '107', 'English 1st Paper', '2025-06-26', '10 AM- 1 PM', 'l', '110107B_Science', '1'),
(114, '1', '10', 'B_Science', '108', 'English 2nd Paper', '2025-06-29', '10 AM- 1 PM', 'l', '110108B_Science', '1'),
(115, '1', '10', 'B_Science', '109', 'Math', '2025-07-07', '10 AM- 1 PM', 'r', '110109B_Science', '1'),
(116, '1', '10', 'B_Science', '111', 'Religion', '2025-07-01', '10 AM- 1 PM', 'l', '110111B_Science', '1'),
(117, '1', '10', 'B_Science', '126', 'Higher Math', '2025-07-09', '10 AM- 1 PM', 'r', '110126B_Science', '1'),
(118, '1', '10', 'B_Science', '134', 'Agriculture Studies', '2025-07-09', '10 AM- 1 PM', 'r', '110134B_Science', '1'),
(119, '1', '10', 'B_Science', '136', 'Physics', '2025-07-02', '10 AM- 1 PM', 'r', '110136B_Science', '1'),
(120, '1', '10', 'B_Science', '137', 'Chemstry', '2025-07-08', '10 AM- 1 PM', 'r', '110137B_Science', '1'),
(121, '1', '10', 'B_Science', '138', 'Biology', '2025-07-10', '10 AM- 1 PM', 'r', '110138B_Science', '1'),
(122, '1', '10', 'B_Science', '150', 'Bangladesh & Global Studies', '2025-07-03', '10 AM- 1 PM', 'r', '110150B_Science', '1'),
(123, '1', '10', 'B_Science', '154', 'ICT', '2025-06-30', '10 AM- 1 PM', 'l', '110154B_Science', '1'),
(124, '1', '10', 'B_Arts', '101', 'Bangla 1st Paper', '2025-06-24', '10 AM- 1 PM', 'l', '110101B_Arts', '1'),
(125, '1', '10', 'B_Arts', '102', 'Bangla 2nd Paper', '2025-06-25', '10 AM- 1 PM', 'l', '110102B_Arts', '1'),
(126, '1', '10', 'B_Arts', '107', 'English 1st Paper', '2025-06-26', '10 AM- 1 PM', 'l', '110107B_Arts', '1'),
(127, '1', '10', 'B_Arts', '108', 'English 2nd Paper', '2025-06-29', '10 AM- 1 PM', 'l', '110108B_Arts', '1'),
(128, '1', '10', 'B_Arts', '109', 'Math', '2025-07-07', '10 AM- 1 PM', 'r', '110109B_Arts', '1'),
(129, '1', '10', 'B_Arts', '110', 'Religion', '2025-07-08', '10 AM- 1 PM', 'r', '110110B_Arts', '1'),
(130, '1', '10', 'B_Arts', '111', 'Religion', '2025-07-01', '10 AM- 1 PM', 'l', '110111B_Arts', '1'),
(131, '1', '10', 'B_Arts', '127', 'Science', '2025-07-03', '10 AM- 1 PM', 'r', '110127B_Arts', '1'),
(132, '1', '10', 'B_Arts', '134', 'Agriculture Studies', '2025-07-09', '10 AM- 1 PM', 'r', '110134B_Arts', '1'),
(133, '1', '10', 'B_Arts', '143', 'Civics', '2025-07-10', '10 AM- 1 PM', 'r', '110143B_Arts', '1'),
(134, '1', '10', 'B_Arts', '153', 'History', '2025-07-02', '10 AM- 1 PM', 'r', '110153B_Arts', '1'),
(135, '1', '10', 'B_Arts', '154', 'ICT', '2025-06-30', '10 AM- 1 PM', 'l', '110154B_Arts', '1'),
(136, '1', '6', 'B', '101', 'Bangla 1st Paper', '2025-06-24', '10 A.M.- 1 P.M.', 'l', '16101B', '1'),
(137, '1', '6', 'B', '102', 'Bangla 2nd Paper', '2025-06-25', '10 A.M.- 1 P.M.', 'l', '16102B', '1'),
(138, '1', '6', 'B', '107', 'English 1st Paper', '2025-06-26', '10 A.M.- 1 P.M.', 'l', '16107B', '1'),
(139, '1', '6', 'B', '108', 'English 2nd Paper', '2025-06-29', '10 A.M.- 1 P.M.', 'l', '16108B', '1'),
(140, '1', '6', 'B', '109', 'Math', '2025-07-07', '10 A.M.- 1 P.M.', 'l', '16109B', '1'),
(141, '1', '6', 'B', '111', 'Religion', '2025-07-01', '10 A.M.- 1 P.M.', 'r', '16111B', '1'),
(142, '1', '6', 'B', '127', 'Science', '2025-07-03', '10 A.M.- 1 P.M.', 'r', '16127B', '1'),
(143, '1', '6', 'B', '150', 'Bangladesh and global studies', '2025-07-08', '10 A.M.- 1 P.M.', 'r', '16150B', '1'),
(144, '1', '6', 'B', '134', 'Agriculture Studies', '2025-07-09', '10 A.M.- 1 P.M.', 'r', '16134B', '1'),
(145, '1', '6', 'B', '154', 'ICT', '2025-06-30', '10 A.M.- 1 P.M.', 'r', '16154B', '1'),
(146, '1', '6', 'C', '101', 'Bangla 1st Paper', '2025-06-24', '10 A.M.- 1 P.M.', 'l', '16101C', '1'),
(147, '1', '6', 'C', '102', 'Bangla 2nd Paper', '2025-06-25', '10 A.M.- 1 P.M.', 'l', '16102C', '1'),
(148, '1', '6', 'C', '107', 'English 1st Paper', '2025-06-26', '10 A.M.- 1 P.M.', 'l', '16107C', '1'),
(149, '1', '6', 'C', '108', 'English 2nd Paper', '2025-06-29', '10 A.M.- 1 P.M.', 'l', '16108C', '1'),
(150, '1', '6', 'C', '109', 'Math', '2025-07-07', '10 A.M.- 1 P.M.', 'l', '16109C', '1'),
(151, '1', '6', 'C', '111', 'Religion', '2025-07-01', '10 A.M.- 1 P.M.', 'r', '16111C', '1'),
(152, '1', '6', 'C', '127', 'Science', '2025-07-03', '10 A.M.- 1 P.M.', 'r', '16127C', '1'),
(153, '1', '6', 'C', '150', 'Bangladesh and global studies', '2025-07-08', '10 A.M.- 1 P.M.', 'r', '16150C', '1'),
(154, '1', '6', 'C', '134', 'Agriculture Studies', '2025-07-09', '10 A.M.- 1 P.M.', 'r', '16134C', '1'),
(155, '1', '6', 'C', '154', 'ICT', '2025-06-30', '10 A.M.- 1 P.M.', 'r', '16154C', '1'),
(156, '1', '7', 'A', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM- 4.30 PM', 'l', '17101A', '1'),
(157, '1', '7', 'A', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM- 4.30 PM', 'l', '17102A', '1'),
(158, '1', '7', 'A', '107', 'English 1st Paper', '2025-06-26', '1.30 PM- 4.30 PM', 'l', '17107A', '1'),
(159, '1', '7', 'A', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM- 4.30 PM', 'l', '17108A', '1'),
(160, '1', '7', 'A', '109', 'Math', '2025-07-07', '1.30 PM- 4.30 PM', 'l', '17109A', '1'),
(161, '1', '7', 'A', '111', 'Religion', '2025-07-01', '1.30 PM- 4.30 PM', 'r', '17111A', '1'),
(162, '1', '7', 'A', '127', 'Science', '2025-07-03', '1.30 PM- 4.30 PM', 'r', '17127A', '1'),
(163, '1', '7', 'A', '150', 'Bangladesh and global studies', '2025-07-08', '1.30 PM- 4.30 PM', 'r', '17150A', '1'),
(164, '1', '7', 'A', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM- 4.30 PM', 'r', '17134A', '1'),
(165, '1', '7', 'A', '154', 'ICT', '2025-06-30', '1.30 PM- 4.30 PM', 'r', '17154A', '1'),
(166, '1', '7', 'B', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM- 4.30 PM', 'l', '17101B', '1'),
(167, '1', '7', 'B', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM- 4.30 PM', 'l', '17102B', '1'),
(168, '1', '7', 'B', '107', 'English 1st Paper', '2025-06-26', '1.30 PM- 4.30 PM', 'l', '17107B', '1'),
(169, '1', '7', 'B', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM- 4.30 PM', 'l', '17108B', '1'),
(170, '1', '7', 'B', '109', 'Math', '2025-07-07', '1.30 PM- 4.30 PM', 'l', '17109B', '1'),
(171, '1', '7', 'B', '111', 'Religion', '2025-07-01', '1.30 PM- 4.30 PM', 'r', '17111B', '1'),
(172, '1', '7', 'B', '127', 'Science', '2025-07-03', '1.30 PM- 4.30 PM', 'r', '17127B', '1'),
(173, '1', '7', 'B', '150', 'Bangladesh and global studies', '2025-07-08', '1.30 PM- 4.30 PM', 'r', '17150B', '1'),
(174, '1', '7', 'B', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM- 4.30 PM', 'r', '17134B', '1'),
(175, '1', '7', 'B', '154', 'ICT', '2025-06-30', '1.30 PM- 4.30 PM', 'r', '17154B', '1'),
(176, '1', '7', 'C', '101', 'Bangla 1st Paper', '2025-06-24', '1.30 PM- 4.30 PM', 'l', '17101C', '1'),
(177, '1', '7', 'C', '102', 'Bangla 2nd Paper', '2025-06-25', '1.30 PM- 4.30 PM', 'l', '17102C', '1'),
(178, '1', '7', 'C', '107', 'English 1st Paper', '2025-06-26', '1.30 PM- 4.30 PM', 'l', '17107C', '1'),
(179, '1', '7', 'C', '108', 'English 2nd Paper', '2025-06-29', '1.30 PM- 4.30 PM', 'l', '17108C', '1'),
(180, '1', '7', 'C', '109', 'Math', '2025-07-07', '1.30 PM- 4.30 PM', 'l', '17109C', '1'),
(181, '1', '7', 'C', '111', 'Religion', '2025-07-01', '1.30 PM- 4.30 PM', 'r', '17111C', '1'),
(182, '1', '7', 'C', '127', 'Science', '2025-07-03', '1.30 PM- 4.30 PM', 'r', '17127C', '1'),
(183, '1', '7', 'C', '150', 'Bangladesh and global studies', '2025-07-08', '1.30 PM- 4.30 PM', 'r', '17150C', '1'),
(184, '1', '7', 'C', '134', 'Agriculture Studies', '2025-07-09', '1.30 PM- 4.30 PM', 'r', '17134C', '1'),
(185, '1', '7', 'C', '154', 'ICT', '2025-06-30', '1.30 PM- 4.30 PM', 'r', '17154C', '1'),
(186, '1', '8', 'A', '101', 'Bangla 1st Paper', '2025-06-24', '10 A.M. - 1.P.M.', 'l', '18101A', '1'),
(187, '1', '8', 'A', '102', 'Bangla 2nd Paper', '2025-06-25', '10 A.M. - 1.P.M.', 'l', '18102A', '1'),
(188, '1', '8', 'A', '107', 'English 1st Paper', '2025-06-26', '10 A.M. - 1.P.M.', 'l', '18107A', '1'),
(189, '1', '8', 'A', '108', 'English 2nd Paper', '2025-06-29', '10 A.M. - 1.P.M.', 'l', '18108A', '1'),
(190, '1', '8', 'A', '109', 'Math', '2025-07-07', '10 A.M. - 1.P.M.', 'l', '18109A', '1'),
(191, '1', '8', 'A', '111', 'Religion', '2025-07-01', '10 A.M. - 1.P.M.', 'r', '18111A', '1'),
(192, '1', '8', 'A', '127', 'Science', '2025-07-03', '10 A.M. - 1.P.M.', 'r', '18127A', '1'),
(193, '1', '8', 'A', '150', 'Bangladesh and global studies', '2025-07-08', '10 A.M. - 1.P.M.', 'r', '18150A', '1'),
(194, '1', '8', 'A', '134', 'Agriculture Studies', '2025-07-09', '10 A.M. - 1.P.M.', 'r', '18134A', '1'),
(195, '1', '8', 'A', '154', 'ICT', '2025-06-30', '10 A.M. - 1.P.M.', 'r', '18154A', '1'),
(196, '1', '8', 'B', '101', 'Bangla 1st Paper', '2025-06-24', '10 A.M. - 1.P.M.', 'l', '18101B', '1'),
(197, '1', '8', 'B', '102', 'Bangla 2nd Paper', '2025-06-25', '10 A.M. - 1.P.M.', 'l', '18102B', '1'),
(198, '1', '8', 'B', '107', 'English 1st Paper', '2025-06-26', '10 A.M. - 1.P.M.', 'l', '18107B', '1'),
(199, '1', '8', 'B', '108', 'English 2nd Paper', '2025-06-29', '10 A.M. - 1.P.M.', 'l', '18108B', '1'),
(200, '1', '8', 'B', '109', 'Math', '2025-07-07', '10 A.M. - 1.P.M.', 'l', '18109B', '1'),
(201, '1', '8', 'B', '111', 'Religion', '2025-07-01', '10 A.M. - 1.P.M.', 'r', '18111B', '1'),
(202, '1', '8', 'B', '127', 'Science', '2025-07-03', '10 A.M. - 1.P.M.', 'r', '18127B', '1'),
(203, '1', '8', 'B', '150', 'Bangladesh and global studies', '2025-07-08', '10 A.M. - 1.P.M.', 'r', '18150B', '1'),
(204, '1', '8', 'B', '134', 'Agriculture Studies', '2025-07-09', '10 A.M. - 1.P.M.', 'r', '18134B', '1'),
(205, '1', '8', 'B', '154', 'ICT', '2025-06-30', '10 A.M. - 1.P.M.', 'r', '18154B', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `examroutine`
--
ALTER TABLE `examroutine`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uexid` (`uexid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `examroutine`
--
ALTER TABLE `examroutine`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
