-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 09:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hit_secure`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `name`, `surname`, `phone`, `avatar`, `email`, `semester`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Tanyaradzwa', 'Kavumbura', '+263 776 504 919', '', 'tanyaradzwakavumbura@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bio_data`
--

CREATE TABLE `bio_data` (
  `id` int(255) NOT NULL,
  `machine_code` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bio_data`
--

INSERT INTO `bio_data` (`id`, `machine_code`, `session`, `status`, `date`) VALUES
(1, '', '8\r\n', '', '0000-00-00 00:00:00'),
(2, '', 'failed\r\n', '', '0000-00-00 00:00:00'),
(3, '', '3\r\n', '', '0000-00-00 00:00:00'),
(4, '', '5\r\n', '', '0000-00-00 00:00:00'),
(5, '', '8\r\n', '', '0000-00-00 00:00:00'),
(6, '', '3\r\n', '', '0000-00-00 00:00:00'),
(7, '', '5\r\n', '', '0000-00-00 00:00:00'),
(8, '', '2\r\n', '', '2021-04-02 16:32:05'),
(9, '', 'failed\r\n', '', '2021-04-02 16:32:22'),
(10, '', '5\r\n', '', '2021-04-02 16:32:31'),
(11, '', '3\r\n', '', '2021-04-02 16:32:42'),
(12, '', 'failed\r\n', '', '2021-04-02 16:33:05'),
(13, 'cyber1', '8\r\n', '', '2021-04-02 16:41:10'),
(14, 'cyber1', '3\r\n', '', '2021-04-02 16:41:19'),
(15, 'cyber1', 'failed\r\n', '', '2021-04-02 16:41:28'),
(16, 'cyber1', '8\r\n', '', '2021-04-02 16:44:35'),
(17, 'cyber1', '2\r\n', '', '2021-04-02 16:46:42'),
(18, 'cyber1', '1\r\n', '', '2021-04-02 17:33:40'),
(20, 'cyber1', 'failed\r\n', '', '2021-04-02 17:44:36'),
(21, 'cyber1', '3\r\n', '', '2021-04-02 17:45:09'),
(22, 'cyber1', 'failed\r\n', '', '2021-04-02 17:45:18'),
(23, 'cyber1', '3\r\n', '', '2021-04-02 17:45:26'),
(24, 'cyber1', '1\r\n', '', '2021-04-02 17:45:48'),
(25, 'cyber1', 'failed\r\n', '', '2021-04-02 17:47:50'),
(26, 'cyber1', 'failed', '', '2021-04-02 17:47:53'),
(27, 'cyber1', '3\r\n', '', '2021-04-02 17:51:35'),
(28, 'cyber1', '1\r\n', '', '2021-04-02 17:51:53'),
(29, 'cyber1', '2\r\n', '', '2021-04-02 17:52:04'),
(30, 'cyber1', '0\r\n', '', '2021-04-02 17:52:13'),
(31, 'cyber1', '5\r\n', '', '2021-04-02 17:52:24'),
(32, 'cyber1', '5\r\n', '', '2021-04-02 17:57:38'),
(33, 'cyber1', '1\r\n', '', '2021-04-02 17:57:44'),
(34, 'cyber1', '0\r\n', '', '2021-04-02 17:57:49'),
(35, 'cyber1', '1\r\n', '', '2021-04-02 17:57:51'),
(36, 'cyber1', '3\r\n', '', '2021-04-02 18:04:01'),
(37, 'cyber1', '6', '', '2021-04-02 18:04:16'),
(38, 'cyber1', '0\r\n', '', '2021-04-03 10:37:44'),
(39, 'cyber1', '0\r\n', '', '2021-04-03 10:38:27'),
(40, 'cyber1', '0\r\n', '', '2021-04-03 10:38:36'),
(41, 'cyber1', '0\r\n', '', '2021-04-03 10:38:41'),
(42, 'cyber1', '0\r\n', '', '2021-04-03 10:38:49'),
(43, 'cyber1', '0\r\n', '', '2021-04-03 10:38:57'),
(44, 'cyber1', '1\r\n', '', '2021-04-03 10:39:00'),
(45, 'cyber1', '2\r\n', '', '2021-04-03 10:39:29'),
(46, 'cyber1', '3\r\n', '', '2021-04-03 10:39:39'),
(47, 'cyber1', '3\r\n', '', '2021-04-03 10:39:52'),
(48, 'cyber1', '5\r\n', '', '2021-04-03 10:40:23'),
(49, 'cyber1', '0\r\n', '', '2021-04-03 10:40:57'),
(50, 'cyber1', '0\r\n', '', '2021-04-03 10:41:21'),
(51, 'cyber1', '0\r\n', '', '2021-04-03 10:41:23'),
(52, 'cyber1', '1\r\n', '', '2021-04-03 10:41:26'),
(53, 'cyber1', '3\r\n', '', '2021-04-03 10:50:28'),
(54, 'cyber1', '0\r\n', '', '2021-04-03 10:50:44'),
(55, 'cyber1', '0\r\n', '', '2021-04-03 10:52:49'),
(56, 'cyber1', '0\r\n', '', '2021-04-03 10:52:51'),
(57, 'cyber1', '0\r\n', '', '2021-04-03 10:52:52'),
(58, 'cyber1', '0\r\n', '', '2021-04-03 10:52:53'),
(59, 'cyber1', '0\r\n', '', '2021-04-03 10:52:54'),
(60, 'cyber1', '0\r\n', '', '2021-04-03 10:52:55'),
(61, 'cyber1', '1\r\n', '', '2021-04-03 10:52:59'),
(62, 'cyber1', '0\r\n', '', '2021-04-03 10:53:05'),
(63, 'cyber1', '0\r\n', '', '2021-04-03 10:53:08'),
(64, 'cyber1', '0\r\n', '', '2021-04-03 10:53:09'),
(65, 'cyber1', '0\r\n', '', '2021-04-03 10:53:10'),
(66, 'cyber1', '0\r\n', '', '2021-04-03 10:53:11'),
(67, 'cyber1', '1\r\n', '', '2021-04-03 10:53:17'),
(68, 'cyber1', '0\r\n', '', '2021-04-03 10:53:20'),
(69, 'cyber1', '0\r\n', '', '2021-04-03 10:53:23'),
(70, 'cyber1', '0\r\n', '', '2021-04-03 10:53:24'),
(71, 'cyber1', '0\r\n', '', '2021-04-03 10:53:25'),
(72, 'cyber1', '0\r\n', '', '2021-04-03 10:53:27'),
(73, 'cyber1', '0\r\n', '', '2021-04-03 10:53:28'),
(74, 'cyber1', '0\r\n', '', '2021-04-03 10:53:29'),
(75, 'cyber1', '0\r\n', '', '2021-04-03 10:53:37'),
(76, 'cyber1', '0\r\n', '', '2021-04-03 10:53:38'),
(77, 'cyber1', '0\r\n', '', '2021-04-03 10:53:39'),
(78, 'cyber1', '0\r\n', '', '2021-04-03 10:55:36'),
(79, 'cyber1', '0\r\n', '', '2021-04-03 10:55:43'),
(80, 'cyber1', '0\r\n', '', '2021-04-03 10:55:44'),
(81, 'cyber1', '0\r\n', '', '2021-04-03 10:55:45'),
(82, 'cyber1', '1\r\n', '', '2021-04-03 10:55:49'),
(83, 'cyber1', '0\r\n', '', '2021-04-03 10:55:55'),
(84, 'cyber1', '0\r\n', '', '2021-04-03 10:55:58'),
(85, 'cyber1', '0\r\n', '', '2021-04-03 10:56:04'),
(86, 'cyber1', '0\r\n', '', '2021-04-03 10:56:10'),
(87, 'cyber1', '0\r\n', '', '2021-04-03 10:56:11'),
(88, 'cyber1', '0\r\n', '', '2021-04-03 10:56:12'),
(89, 'cyber1', '0\r\n', '', '2021-04-03 10:56:16'),
(90, 'cyber1', '0\r\n', '', '2021-04-03 10:56:17'),
(91, 'cyber1', '0\r\n', '', '2021-04-03 10:56:21'),
(92, 'cyber1', '0\r\n', '', '2021-04-03 10:56:22'),
(93, 'cyber1', '0\r\n', '', '2021-04-03 10:56:23'),
(94, 'cyber1', '0\r\n', '', '2021-04-03 10:56:24'),
(95, 'cyber1', '0\r\n', '', '2021-04-03 10:56:25'),
(96, 'cyber1', '0\r\n', '', '2021-04-03 10:56:37'),
(97, 'cyber1', '2\r\n', '', '2021-04-03 10:57:11'),
(98, 'cyber1', '4\r\n', '', '2021-04-03 10:57:32'),
(99, 'cyber1', '2\r\n', '', '2021-04-03 10:57:45'),
(100, 'cyber1', '0\r\n', '', '2021-04-03 10:58:10'),
(101, 'cyber1', '1\r\n', '', '2021-04-03 10:58:14'),
(102, 'cyber1', '0\r\n', '', '2021-04-03 14:06:14'),
(103, 'cyber1', '1\r\n', '', '2021-04-03 14:14:04'),
(104, 'cyber1', '2\r\n', '', '2021-04-03 14:15:25'),
(105, 'cyber1', '5\r\n', '', '2021-04-03 14:16:35'),
(106, 'cyber1', '0\r\n', '', '2021-04-05 18:04:32'),
(107, 'cyber1', '0\r\n', '', '2021-04-05 18:04:33'),
(108, 'cyber1', '0\r\n', '', '2021-04-05 18:04:34'),
(109, 'cyber1', '6\r\n', '', '2021-04-05 18:04:40'),
(110, 'cyber1', '1\r\n', '', '2021-04-05 18:04:53'),
(111, 'cyber1', '0\r\n', '', '2021-04-05 18:05:11'),
(112, 'cyber1', '0\r\n', '', '2021-04-05 18:05:12'),
(113, 'cyber1', '0\r\n', '', '2021-04-05 18:05:56'),
(114, 'cyber1', '0\r\n', '', '2021-04-05 18:06:21'),
(115, 'cyber1', '0\r\n', '', '2021-04-05 18:06:23'),
(116, 'cyber1', '0\r\n', '', '2021-04-05 18:06:24'),
(117, 'cyber1', '0\r\n', '', '2021-04-05 18:06:25'),
(118, 'cyber1', '0\r\n', '', '2021-04-05 18:06:27'),
(119, 'cyber1', '0\r\n', '', '2021-04-05 18:06:28'),
(120, 'cyber1', '0\r\n', '', '2021-04-05 18:06:32'),
(121, 'cyber1', '3\r\n', '', '2021-04-05 18:06:37'),
(122, 'cyber1', '4\r\n', '', '2021-04-05 18:07:09'),
(123, 'cyber1', '8\r\n', '', '2021-04-05 18:08:29'),
(124, 'cyber1', '2\r\n', '', '2021-04-05 18:08:41'),
(125, 'cyber1', '1\r\n', '', '2021-04-05 18:08:50'),
(126, 'cyber1', '3\r\n', '', '2021-04-05 18:10:29'),
(127, 'cyber1', '0\r\n', '', '2021-04-05 18:10:45'),
(128, 'cyber1', '0\r\n', '', '2021-04-05 18:10:53'),
(129, 'cyber1', '1\r\n', '', '2021-04-05 18:10:58'),
(130, 'cyber1', '3\r\n', '', '2021-04-05 18:13:24'),
(131, 'cyber1', '5\r\n', '', '2021-04-05 18:13:32'),
(132, 'cyber1', '1\r\n', '', '2021-04-05 18:13:40'),
(133, 'cyber1', '6\r\n', '', '2021-04-05 18:30:17'),
(134, 'cyber1', '0\r\n', '', '2021-04-05 18:30:23'),
(135, 'cyber1', '0\r\n', '', '2021-04-05 18:30:24'),
(136, 'cyber1', '0\r\n', '', '2021-04-05 18:30:27'),
(137, 'cyber1', '1\r\n', '', '2021-04-05 18:30:33'),
(138, 'cyber1', '2\r\n', '', '2021-04-05 18:30:38'),
(139, 'cyber1', '3\r\n', '', '2021-04-05 18:30:43'),
(140, 'cyber1', '5\r\n', '', '2021-04-05 18:30:48'),
(141, 'cyber1', '1\r\n', '', '2021-04-05 18:30:55'),
(142, 'cyber1', '6\r\n', '', '2021-04-05 18:32:13'),
(143, 'cyber1', '1\r\n', '', '2021-04-05 18:32:29'),
(144, 'cyber1', '0\r\n', '', '2021-04-05 18:33:55'),
(145, 'cyber1', '1\r\n', '', '2021-04-05 18:34:02'),
(146, 'cyber1', '2\r\n', '', '2021-04-05 18:34:11'),
(147, 'cyber1', '3\r\n', '', '2021-04-05 18:34:17'),
(148, 'cyber1', '4\r\n', '', '2021-04-05 18:34:23'),
(149, 'cyber1', '0\r\n', '', '2021-04-05 18:38:48'),
(150, 'cyber1', '0\r\n', '', '2021-04-05 18:38:49'),
(151, 'cyber1', '0\r\n', '', '2021-04-05 18:38:52'),
(152, 'cyber1', '6\r\n', '', '2021-04-05 18:39:00'),
(153, 'cyber1', '1\r\n', '', '2021-04-05 18:39:08'),
(154, 'cyber1', '10', '', '2021-04-13 10:23:51'),
(155, 'cyber1', '1000', '', '2021-04-13 10:24:25'),
(156, 'cyber1', '1000', '', '2021-04-13 10:33:00'),
(157, 'cyber1', '10002', '', '2021-04-13 10:33:12'),
(158, 'cyber1', '1', '', '2021-04-13 10:58:14'),
(159, 'cyber1', '0', '', '2021-04-13 10:59:07'),
(160, 'cyber1', '1', '', '2021-04-13 11:04:51'),
(161, 'cyber1', '0', '', '2021-04-13 11:05:12'),
(162, 'cyber1', '1', '', '2021-04-13 11:05:26'),
(163, 'cyber1', '3', '', '2021-04-13 15:05:42'),
(164, 'cyber1', '3', '', '2021-04-13 15:07:47'),
(165, 'cyber1', '0', '', '2021-04-13 15:11:30'),
(166, 'cyber1', '0', '', '2021-04-13 15:15:40'),
(167, 'cyber1', '8', '', '2021-04-13 15:15:47'),
(168, 'cyber1', '1', '', '2021-04-13 15:16:29'),
(169, 'cyber1', '0', '', '2021-04-13 15:17:17'),
(170, 'cyber1', '2', '', '2021-04-13 15:28:40'),
(171, 'cyber1', '0', '', '2021-04-13 15:34:01'),
(172, 'cyber1', '8', '', '2021-04-13 15:35:26'),
(173, 'cyber1', '1', '', '2021-04-13 15:35:33'),
(174, 'cyber1', '4', '', '2021-04-13 15:42:56'),
(175, 'cyber1', '0', '', '2021-04-13 15:43:11'),
(176, 'cyber1', '4', '', '2021-04-13 15:51:21'),
(177, 'cyber1', '0', '', '2021-04-13 15:51:29'),
(178, 'cyber1', '1', '', '2021-04-13 15:51:59'),
(179, 'cyber1', '1', '', '2021-04-13 15:53:09'),
(180, 'cyber1', '23', '', '2021-04-15 10:05:49'),
(181, 'cyber1', '23', '', '2021-04-15 10:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_time` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `semester`, `module`, `exam_date`, `exam_time`, `venue`, `date`) VALUES
(11, '20211', 'HIT210', '04/03/2021', 'morning', 'Innovation Hub', '2021-03-29 14:08:38'),
(12, '20211', 'ISS216', '03/29/2021', 'afternoon', 'Multipurpose Hall', '2021-03-29 14:09:42'),
(13, '20211', 'ISS214', '04/03/2021', 'afternoon', 'Innovation Hub', '2021-03-29 14:10:14'),
(14, '20211', 'ABC123', '03/30/2021', '0900hrs', 'Automotive Hall', '2021-03-30 21:58:41'),
(15, '20211', 'ISS215', '04/05/2021', 'afternoon', 'Innovation', '2021-04-05 18:05:44'),
(16, '20211', 'ISS213', '04/07/2021', 'afternoon', 'Multipurpose', '2021-04-07 13:37:53'),
(17, '20211', 'ISS212', '04/13/2021', 'afternoon', 'Kimtronix Global', '2021-04-13 15:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `exam_attendance`
--

CREATE TABLE `exam_attendance` (
  `id` int(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_attendance`
--

INSERT INTO `exam_attendance` (`id`, `semester`, `module`, `reg_number`, `date`) VALUES
(4, '20211', 'ISS214', 'h190161m', '2021-04-03 10:57:59'),
(5, '20211', 'HIT210', 'h190204j', '2021-04-03 14:15:04'),
(6, '20211', 'HIT210', 'h190161m', '2021-04-03 14:15:56'),
(7, '20211', 'HIT210', 'h190312x', '2021-04-03 14:18:33'),
(8, '20211', 'ISS212', 'h190204j', '2021-04-13 15:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(255) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_code` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_code`, `date`) VALUES
(8, 'Technopreneurship II', 'HIT120', '2021-03-29 09:17:30'),
(9, 'Technical Communication Skills II', 'IST120', '2021-03-29 09:18:15'),
(10, 'Computer Science', 'ISS122', '2021-03-29 09:18:37'),
(11, 'Software Engineering', 'ISS123', '2021-03-29 09:19:11'),
(12, 'Programming Techniques', 'ISS124', '2021-03-29 09:19:37'),
(13, 'Number Theory', 'ISS126', '2021-03-29 09:19:58'),
(14, 'Visual Programming Concepts', 'ISS127', '2021-03-29 09:20:36'),
(15, 'Database Design Concepts', 'ISS128', '2021-03-29 09:21:02'),
(16, 'Technopreneurship III', 'HIT210', '2021-03-29 09:22:38'),
(17, 'Secure Programming', 'ISS211', '2021-03-29 09:23:03'),
(18, 'Microcomputer Systems', 'ISS212', '2021-03-29 09:23:21'),
(19, 'Cyberspace Ethics and Laws', 'ISS213', '2021-03-29 09:23:52'),
(20, 'Cryptography and Security', 'ISS214', '2021-03-29 09:24:10'),
(21, 'Case Studies', 'ISS215', '2021-03-29 09:24:30'),
(22, 'Coding Theory', 'ISS216', '2021-03-29 09:24:51'),
(24, 'Testing Module', 'ABC123', '2021-03-30 21:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `notifcations`
--

CREATE TABLE `notifcations` (
  `id` int(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `notification` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifcations`
--

INSERT INTO `notifcations` (`id`, `semester`, `notification`, `date`) VALUES
(2, '20211', 'Hi there Harare Institute Of Technology Students, we welcome you to this new Semester, we wish you good luck as we approach the Examination dates', '2021-03-29 09:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(255) NOT NULL,
  `sem_code` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `sem_code`, `reg_number`, `module`, `date`) VALUES
(16, '20211', 'h190204j', 'ISS215', '2021-03-29 09:27:05'),
(17, '20211', 'h190204j', 'ISS214', '2021-03-29 09:27:05'),
(18, '20211', 'h190204j', 'ISS213', '2021-03-29 09:27:05'),
(19, '20211', 'h190204j', 'ISS212', '2021-03-29 09:27:05'),
(20, '20211', 'h190204j', 'HIT210', '2021-03-29 09:27:05'),
(21, '20211', 'h190204j', 'ISS211', '2021-03-29 09:27:05'),
(22, '20211', 'h190650y', 'ISS212', '2021-03-29 14:01:10'),
(23, '20211', 'h190650y', 'ISS213', '2021-03-29 14:01:10'),
(25, '20211', 'h190650y', 'HIT210', '2021-03-29 14:01:10'),
(27, '20211', 'h190161m', 'HIT210', '2021-03-29 14:05:44'),
(28, '20211', 'h190161m', 'ISS213', '2021-03-29 14:05:44'),
(29, '20211', 'h190161m', 'ISS128', '2021-03-29 14:05:44'),
(30, '20211', 'h190161m', 'ISS214', '2021-03-29 14:05:44'),
(31, '20211', 'h190161m', 'ISS212', '2021-03-29 14:05:44'),
(32, '20211', 'h190833e', 'HIT210', '2021-03-29 14:06:13'),
(33, '20211', 'h190833e', 'ISS213', '2021-03-29 14:06:13'),
(34, '20211', 'h190833e', 'ISS214', '2021-03-29 14:06:13'),
(35, '20211', 'h190833e', 'ISS124', '2021-03-29 14:06:13'),
(36, '20211', 'h190833e', 'ISS211', '2021-03-29 14:06:13'),
(37, '20211', 'h190833e', 'ISS212', '2021-03-29 14:06:13'),
(38, '20211', 'h190840e', 'HIT210', '2021-03-29 14:06:33'),
(39, '20211', 'h190840e', 'ISS128', '2021-03-29 14:06:33'),
(40, '20211', 'h190840e', 'ISS212', '2021-03-29 14:06:33'),
(41, '20211', 'h190840e', 'ISS213', '2021-03-29 14:06:33'),
(42, '20211', 'h190840e', 'ISS214', '2021-03-29 14:06:33'),
(43, '20211', 'h190204j', 'ABC11', '2021-03-30 17:06:01'),
(44, '20211', 'h190204j', 'ABC123', '2021-03-30 21:53:35'),
(45, '20211', 'h190312x', 'ISS214', '2021-04-03 03:36:04'),
(46, '20211', 'h190312x', 'HIT210', '2021-04-03 14:18:34'),
(47, '20211', 'h190161m', 'ISS211', '2021-04-03 14:21:45'),
(48, '20211', 'h190650y', 'ISS216', '2021-04-10 18:52:21'),
(49, '20211', 'h190650y', 'ISS124', '2021-04-10 18:52:21'),
(50, '20211', 'h190650y', 'ISS123', '2021-04-10 18:52:21'),
(51, '20211', 'h190650y', 'ISS211', '2021-04-12 10:29:14'),
(52, '20211', 'h190650y', 'ISS128', '2021-04-12 10:29:14'),
(53, '20211', 'h190650y', 'ISS214', '2021-04-12 10:29:14'),
(54, '20211', 'h190312x', 'ISS126', '2021-04-13 15:50:31'),
(55, '20211', 'h190312x', 'ISS212', '2021-04-13 15:50:31'),
(56, '20211', 'h190312x', 'ISS128', '2021-04-13 15:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `biometric` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reg_status` varchar(255) NOT NULL,
  `home_address` longtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `username`, `password`, `name`, `surname`, `gender`, `biometric`, `program`, `avatar`, `phone`, `email`, `reg_status`, `home_address`, `date`) VALUES
(10, 'h190204j', '73c302d0c4eef5fd31f1e2bf66a2d0b2', 'Tanyaradzwa', 'Kavumbura', 'Male', '1', 'ISA', 'cyber.jpg', '+263 776 504 919', 'h190204j@hit.ac.zw', '', '20483A Unit B Seke Chitungwiza Harare', '2021-03-29'),
(11, 'h190161m', '73c302d0c4eef5fd31f1e2bf66a2d0b2', 'Eric Takudzwa', 'Shumba', '', '2', 'ISA', 'eric.jpg', '+263776082078', 'h190161m@hit.ac.zw', '', '', '2021-03-29'),
(13, 'h190833e', '73c302d0c4eef5fd31f1e2bf66a2d0b2', 'Gift', 'Tandare', '', '3', 'ISA', 'gift.jpg', '+263 78 586 2250', 'h190833e@hit.ac.zw', '', '', '2021-03-29'),
(14, 'h190840e', '73c302d0c4eef5fd31f1e2bf66a2d0b2', 'Panashe', 'Chaita', '', '4', 'ISA', 'panashe.jpg', '+263 73 326 9115', 'h190840e@hit.ac.zw', '', '', '2021-03-29'),
(15, 'h190312x', '73c302d0c4eef5fd31f1e2bf66a2d0b2', 'Egenia', 'Machinga', '', '5', 'ISA', 'egenia.jpg', '+263 77 822 7020', 'h190312x@hit.ac.zw', '', '', '2021-03-29'),
(16, 'h190650y', '73c302d0c4eef5fd31f1e2bf66a2d0b2', 'Deon', 'Chawaguta', '', '6', 'ISA', '', '+263 77 577 7790', 'h190650y@hit.ac.zw', '', '', '2021-03-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bio_data`
--
ALTER TABLE `bio_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_attendance`
--
ALTER TABLE `exam_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifcations`
--
ALTER TABLE `notifcations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bio_data`
--
ALTER TABLE `bio_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exam_attendance`
--
ALTER TABLE `exam_attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifcations`
--
ALTER TABLE `notifcations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
