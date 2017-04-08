-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 08, 2017 at 03:56 PM
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
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(16) UNSIGNED NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `head_of_household` varchar(50) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=big5;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `phone_number`, `head_of_household`, `name`, `description`) VALUES
(1, '4156432611', 'no', 'Lisa Liu', '12345678'),
(2, '5105234859', 'yes', 'Mike Liu', '12345677'),
(3, '415325045', 'no', 'Kate Taft', '12345676'),
(4, NULL, NULL, 'Mario Taft', '12345699'),
(5, '5102004367', NULL, 'Mario Taft', '12345669'),
(6, '5105461297', 'yes', 'Peter Taft', '12345673'),
(7, '4153246948', 'no', 'Jack Liu', '12345672'),
(8, '4156432134', 'no', '', '12345671'),
(9, '5103465278', 'yes', 'Mary Sutton', '12345670'),
(10, '4154763219', 'yes', 'Tom Liu', '12345669'),
(11, '5105432674', 'no', 'Jack Taft', '12345668'),
(12, '5105432712', 'no', 'James Taft', '12345664'),
(13, '5233213425', 'yes', 'Jason Kennedy', '12345665'),
(14, '5104532877', 'yes', 'Tina Pham', '12345669'),
(15, '5103469213', 'no', 'Jessica Liu', '12345666'),
(16, '5103469212', 'no', 'Jessica Wan', '12345667'),
(17, '415385997', 'yes', 'YIchen Zhu', '12345687'),
(18, '4152009079', 'yes', 'Lifeng Wan', '12345691');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
