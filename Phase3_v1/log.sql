-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 08, 2017 at 03:31 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team22_phase3`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `client_id` int(16) UNSIGNED NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `site_id` int(16) UNSIGNED NOT NULL,
  `description` varchar(50) NOT NULL,
  `field_modified` varchar(50) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`client_id`, `datetime`, `site_id`, `description`, `field_modified`, `note`) VALUES
(1, '2017-02-01 20:12:08', 1, 'lunch at soupkitchen', NULL, ''),
(2, '2017-02-16 15:19:09', 2, 'sleep at bunkroom#1', NULL, ''),
(2, '2017-03-08 08:00:00', 3, 'sleep at familyroom#1', NULL, ''),
(3, '2017-03-15 20:06:07', 2, 'took out  one meal for lunch', NULL, ''),
(3, '2017-04-06 00:04:05', 1, 'took  a meal for dinner', NULL, ''),
(4, '2017-04-06 18:31:48', 3, 'sleep at bunkroom#2', 'Mary Taft  12345688', ''),
(5, '2017-03-29 19:45:15', 2, 'lunch at soupkitchen', NULL, ''),
(5, '2017-04-05 23:40:19', 3, 'took  a meal for dinner', NULL, ''),
(5, '2017-04-05 23:41:31', 2, 'sleep at bunk #5', NULL, ''),
(6, '2017-03-16 01:16:18', 4, 'sleep at familyroom #1', NULL, ''),
(6, '2017-04-06 18:11:36', 2, 'took  a meal for dinner', NULL, ''),
(7, '2017-03-02 18:13:29', 3, 'took out  one meal for lunch', NULL, ''),
(8, '2017-03-17 02:14:21', 4, 'had dinner at soupkitchen', NULL, ''),
(8, '2017-04-05 23:31:32', 3, 'took  a meal for dinner', NULL, 'disabled'),
(9, '2017-03-21 19:14:20', 2, 'took out  one meal for lunch', NULL, ''),
(9, '2017-04-05 23:30:11', 3, 'took  a meal for dinner', NULL, 'disabled'),
(9, '2017-04-05 23:37:46', 1, 'sleep at bunk #2', NULL, ''),
(9, '2017-04-06 18:10:25', 3, 'sleep at bunk #2', NULL, ''),
(10, '2017-03-15 01:13:19', 2, 'sleep at familyroom #1', NULL, ''),
(10, '2017-04-05 23:54:49', 4, 'took  a meal for lunch', NULL, ''),
(11, '2017-03-08 19:21:15', 2, 'sleep at bunkroom#1', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`client_id`,`datetime`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `CLIENT_LOG` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
