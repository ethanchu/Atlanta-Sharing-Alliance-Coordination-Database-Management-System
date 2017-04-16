-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Apr 15, 2017 at 11:08 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.2
DROP DATABASE IF EXISTS `cs6400_sp17_team022`;
SET default_storage_engine=InnoDB;

CREATE DATABASE IF NOT EXISTS cs6400_sp17_team022 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE cs6400_sp17_team022;

-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2017 at 01:18 AM
-- Server version: 5.7.17
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs6400_sp17_team022`
--

-- --------------------------------------------------------

--
-- Table structure for table `bunk`
--

CREATE TABLE `bunk` (
  `bunk_id` int(16) UNSIGNED NOT NULL,
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `count` int(16) UNSIGNED NOT NULL,
  `available_count` int(16) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bunk`
--

INSERT INTO `bunk` (`bunk_id`, `site_id`, `service_name`, `type`, `count`, `available_count`) VALUES
(1, 2, 'shelter', 'male', 4, 4),
(2, 2, 'shelter', 'female', 4, 2),
(3, 2, 'shelter', 'mixed', 4, 1),
(4, 3, 'shelter', 'male', 4, 2),
(5, 3, 'shelter', 'female', 4, 1),
(6, 3, 'shelter', 'mixed', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` int(16) UNSIGNED NOT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `head_of_household` tinyint(1) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `phone_number`, `head_of_household`, `name`, `description`) VALUES
(1, NULL, 1, 'Joe1 Client1', '12340'),
(2, NULL, 0, 'Joe Client2', '12342'),
(3, NULL, 1, 'Joe Client3', '12343'),
(4, NULL, 0, 'Joe Client4', '12344'),
(5, NULL, 1, 'Joe Client5', '12345'),
(6, NULL, 0, 'Joe Client6', '123456'),
(7, NULL, 1, 'Jane Client7', '1234567'),
(8, NULL, 0, 'Jane Client8', '12348'),
(9, NULL, 1, 'Jane Client9', '12349'),
(10, NULL, 1, 'Jane Client10', '123410'),
(11, NULL, 0, 'Jane Client11', '123411'),
(12, NULL, 1, '	Janey Client12', '123412');

-- --------------------------------------------------------

--
-- Table structure for table `foodbank`
--

CREATE TABLE `foodbank` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `bankID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodbank`
--

INSERT INTO `foodbank` (`site_id`, `service_name`, `bankID`) VALUES
(1, 'foodbank', 1),
(2, 'foodbank', 2),
(3, 'foodbank', 3);

-- --------------------------------------------------------

--
-- Table structure for table `foodpantry`
--

CREATE TABLE `foodpantry` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hours_of_operation` varchar(100) NOT NULL,
  `condition_for_use` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `foodpantry`
--

INSERT INTO `foodpantry` (`site_id`, `service_name`, `description`, `hours_of_operation`, `condition_for_use`) VALUES
(1, 'pantry', 'pantry1', 'M-F, 9am-9pm', 'Driver license required'),
(3, 'pantry', 'pantry3', 'everyday 7am-7pm', 'Proof of residence');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(16) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `unit` int(16) UNSIGNED NOT NULL,
  `storage_type` varchar(50) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `name`, `unit`, `storage_type`, `expiration_date`, `category`, `sub_category`, `site_id`, `service_name`) VALUES
(1, 'lettuce', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(2, 'almonds', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(3, 'salard dressing', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(4, 'coke', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(5, 'chicken', 10, 'frozen', '2017-05-01 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(6, 'cheese', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(7, 'baby wipes', 5, 'drygood', '2019-05-01 00:00:00', 'supplies', 'personal hygiene', 1, 'foodbank'),
(8, 'shirts', 5, 'drygood', '2020-05-01 00:00:00', 'supplies', 'clothing', 1, 'foodbank'),
(9, 'onion', 10, 'refrigerated', '2017-06-10 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(10, 'flour', 10, 'drygoods', '2017-12-10 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(11, 'chili sauce', 10, 'drygoods', '2017-12-10 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(12, 'fruit juice', 10, 'refrigerated', '2017-06-10 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(13, 'seafood', 10, 'frozen', '2017-05-10 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(14, 'eggs', 10, 'refrigerated', '2017-05-10 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(15, 'tent', 5, 'drygoods', '2019-05-10 00:00:00', 'supplies', 'shelter', 2, 'foodbank'),
(16, 'batteries', 5, 'drygoods', '2018-05-10 00:00:00', 'supplies', 'other', 2, 'foodbank'),
(17, 'expired chicken', 6, 'refrigerated', '2017-04-12 00:00:00', 'food', ' meat/seafood', 3, 'foodbank'),
(18, 'expired milk', 6, 'refrigerated', '2017-04-12 00:00:00', 'food', 'dairy/eggs', 3, 'foodbank'),
(19, 'spinarch', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(20, 'lettuce', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(21, 'spinarch', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(22, 'Bokchoy', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(23, 'lettuce', 10, 'refrigerated', '2017-04-25 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(24, 'green onion', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(25, 'chard', 10, 'refrigerated', '2017-05-04 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(26, 'chard', 10, 'refrigerated', '2017-05-20 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(27, 'lettuce', 10, 'refrigerated', '2017-05-25 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(28, 'green onion', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(29, 'spinarch', 10, 'refrigerated', '2017-05-30 00:00:00', 'food', 'vegetables', 1, 'foodbank'),
(30, 'walnuts', 10, 'drygoods', '2017-12-30 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(31, 'walnuts', 10, 'drygoods', '2017-12-25 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(32, 'almonds', 10, 'drygoods', '2017-12-30 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(33, 'peanuts', 10, 'drygoods', '2017-12-25 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(34, 'walnuts', 10, 'drygoods', '2017-08-30 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(35, 'walnuts', 10, 'drygoods', '2017-08-25 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(36, 'almonds', 10, 'drygoods', '2017-08-30 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(37, 'peanuts', 10, 'drygoods', '2017-08-25 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(38, 'peanuts', 10, 'drygoods', '2017-11-25 00:00:00', 'food', 'nuts/grains/beans', 1, 'foodbank'),
(39, 'salard dressing', 10, 'drygoods', '2017-06-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(40, 'olive oil', 10, 'drygoods', '2017-11-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(41, 'chili sauce', 10, 'drygoods', '2017-06-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(42, 'chili sauce', 10, 'drygoods', '2017-11-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(43, 'salard dressing', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(44, 'olive oil', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(45, 'chili sauce', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(46, 'chili sauce', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(47, 'soy sauce', 10, 'drygoods', '2017-12-01 00:00:00', 'food', 'sauce/condiments', 1, 'foodbank'),
(48, 'pepsi', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(49, 'pepsi', 20, 'refrigerated', '2018-06-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(50, 'coke', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(51, 'coke', 20, 'refrigerated', '2018-06-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(52, 'pepsi', 10, 'refrigerated', '2017-12-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(53, 'pepsi', 20, 'refrigerated', '2018-12-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(54, 'coke', 10, 'refrigerated', '2017-11-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(55, 'coke', 20, 'refrigerated', '2018-08-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(56, 'pepsi', 10, 'refrigerated', '2017-10-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(57, 'pepsi', 20, 'refrigerated', '2018-09-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(58, 'coke', 10, 'refrigerated', '2017-10-01 00:00:00', 'food', 'juice/drink', 1, 'foodbank'),
(59, 'pork', 10, 'frozen', '2017-05-01 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(60, 'cheese', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(61, 'beef', 10, 'frozen', '2017-05-01 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(62, 'cheese', 10, 'refrigerated', '2017-10-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(63, 'pork', 10, 'frozen', '2017-06-01 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(64, 'cheese', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(65, 'beef', 10, 'frozen', '2017-06-01 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(66, 'cheese', 10, 'refrigerated', '2017-07-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(67, 'pork', 10, 'frozen', '2017-05-12 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(68, 'cheese', 10, 'refrigerated', '2017-05-04 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(69, 'beef', 10, 'frozen', '2017-05-14 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(70, 'cheese', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(71, 'lamb', 10, 'frozen', '2017-06-01 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(72, 'cheese', 10, 'refrigerated', '2017-07-01 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(73, 'beef', 10, 'frozen', '2017-06-11 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(74, 'cheese', 10, 'refrigerated', '2017-07-11 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(75, 'cheese', 10, 'refrigerated', '2017-06-14 00:00:00', 'food', 'dairy/eggs', 1, 'foodbank'),
(76, 'lamb', 10, 'frozen', '2017-06-14 00:00:00', 'food', 'meat/seafood', 1, 'foodbank'),
(77, 'toothbrush', 5, 'drygood', '2018-12-01 00:00:00', 'supplies', 'personal hygiene', 1, 'foodbank'),
(78, 'pants', 5, 'drygood', '2020-05-01 00:00:00', 'supplies', 'clothing', 1, 'foodbank'),
(79, 'soap', 5, 'drygood', '2018-12-01 00:00:00', 'supplies', 'personal hygiene', 1, 'foodbank'),
(80, 'underwear', 5, 'drygood', '2020-05-01 00:00:00', 'supplies', 'clothing', 1, 'foodbank'),
(81, 'toothbrush', 5, 'drygood', '2018-08-01 00:00:00', 'supplies', 'personal hygiene', 1, 'foodbank'),
(82, 'pants', 5, 'drygood', '2020-01-01 00:00:00', 'supplies', 'clothing', 1, 'foodbank'),
(83, 'soap', 5, 'drygood', '2018-01-01 00:00:00', 'supplies', 'personal hygiene', 1, 'foodbank'),
(84, 'underwear', 5, 'drygood', '2020-01-01 00:00:00', 'supplies', 'clothing', 1, 'foodbank'),
(85, 'salmon', 10, 'frozen', '2017-06-14 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(86, 'winter jackets', 5, 'drygood', '2018-12-01 00:00:00', 'supplies', 'personal hygiene', 2, 'foodbank'),
(87, 'pet food', 5, 'drygood', '2018-05-01 00:00:00', 'supplies', 'clothing', 2, 'foodbank'),
(88, 'rain coats', 5, 'drygood', '2018-12-01 00:00:00', 'supplies', 'personal hygiene', 2, 'foodbank'),
(89, 'toilet paper', 5, 'drygood', '2020-05-01 00:00:00', 'supplies', 'clothing', 2, 'foodbank'),
(90, 'sleeping bags', 5, 'drygood', '2018-08-01 00:00:00', 'supplies', 'personal hygiene', 2, 'foodbank'),
(91, 'batteries', 5, 'drygood', '2020-01-01 00:00:00', 'supplies', 'clothing', 2, 'foodbank'),
(92, 'blankets', 5, 'drygood', '2018-01-01 00:00:00', 'supplies', 'personal hygiene', 2, 'foodbank'),
(93, 'toilet paper', 5, 'drygood', '2020-01-01 00:00:00', 'supplies', 'clothing', 2, 'foodbank'),
(94, 'shrimp', 10, 'frozen', '2017-05-01 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(95, 'egg', 10, 'refrigerated', '2017-10-01 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(96, 'crab', 10, 'frozen', '2017-06-01 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(97, 'egg', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(98, 'salmon', 10, 'frozen', '2017-06-01 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(99, 'egg', 10, 'refrigerated', '2017-07-01 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(100, 'crab', 10, 'frozen', '2017-05-12 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(101, 'egg', 10, 'refrigerated', '2017-05-04 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(102, 'catfish', 10, 'frozen', '2017-05-14 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(103, 'egg', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(104, 'lingcod', 10, 'frozen', '2017-06-01 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(105, 'egg', 10, 'refrigerated', '2017-07-01 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(106, 'shrimp', 10, 'frozen', '2017-06-11 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(107, 'egg', 10, 'refrigerated', '2017-07-11 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(108, 'egg', 10, 'refrigerated', '2017-06-14 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(109, 'apple juice', 20, 'refrigerated', '2018-06-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(110, 'orange juice', 10, 'refrigerated', '2017-12-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(111, 'grape juice', 20, 'refrigerated', '2018-12-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(112, 'apple juice', 10, 'refrigerated', '2017-11-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(113, 'orange juice', 20, 'refrigerated', '2018-08-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(114, 'grape juice', 10, 'refrigerated', '2017-10-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(115, 'orange juice', 20, 'refrigerated', '2018-09-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(116, 'apple juice', 10, 'refrigerated', '2017-10-01 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(117, 'salmon', 10, 'frozen', '2017-05-01 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(118, 'egg', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(119, 'flour', 10, 'drygoods', '2017-08-25 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(120, 'wheat', 10, 'drygoods', '2017-11-25 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(121, 'olive oil', 10, 'drygoods', '2017-06-01 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(122, 'olive oil', 10, 'drygoods', '2017-07-01 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(123, 'chili sauce', 10, 'drygoods', '2017-06-14 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(124, 'chili sauce', 10, 'drygoods', '2017-10-14 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(125, 'salard dressing', 10, 'drygoods', '2017-10-05 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(126, 'olive oil', 10, 'drygoods', '2017-10-07 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(127, 'chili sauce', 10, 'drygoods', '2017-06-21 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(128, 'chili sauce', 10, 'drygoods', '2018-01-01 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(129, 'soy sauce', 10, 'drygoods', '2017-09-01 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(130, 'apple juice', 10, 'refrigerated', '2017-06-07 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(131, 'orange juice', 20, 'refrigerated', '2018-06-08 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(132, 'cherry juice', 10, 'refrigerated', '2017-06-25 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(133, 'onion', 10, 'refrigerated', '2017-05-20 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(134, 'potato', 10, 'refrigerated', '2017-05-25 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(135, 'tomato', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(136, 'potato', 10, 'refrigerated', '2017-05-30 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(137, 'wheat', 10, 'drygoods', '2017-12-30 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(138, 'flour', 10, 'drygoods', '2017-12-25 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(139, 'wheat', 10, 'drygoods', '2017-12-30 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(140, 'flour', 10, 'drygoods', '2017-12-25 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(141, 'flour', 10, 'drygoods', '2017-08-30 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(142, 'wheat', 10, 'drygoods', '2017-08-25 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(143, 'rice', 10, 'drygoods', '2017-08-30 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(144, 'fruit juice', 10, 'refrigerated', '2017-06-10 00:00:00', 'food', 'juice/drink', 2, 'foodbank'),
(145, 'seafood', 10, 'frozen', '2017-05-10 00:00:00', 'food', 'meat/seafood', 2, 'foodbank'),
(146, 'eggs', 10, 'refrigerated', '2017-05-10 00:00:00', 'food', 'dairy/eggs', 2, 'foodbank'),
(147, 'tent', 5, 'drygoods', '2019-05-10 00:00:00', 'supplies', 'shelter', 2, 'foodbank'),
(148, 'batteries', 5, 'drygoods', '2018-05-10 00:00:00', 'supplies', 'other', 2, 'foodbank'),
(149, 'expired chicken', 6, 'refrigerated', '2017-04-11 00:00:00', 'food', ' meat/seafood', 3, 'foodbank'),
(150, 'expired milk', 6, 'refrigerated', '2017-04-10 00:00:00', 'food', 'dairy/eggs', 3, 'foodbank'),
(151, 'potato', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(152, 'onion', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(153, 'potato', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(154, 'tomato', 10, 'refrigerated', '2017-05-01 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(155, 'potato', 10, 'refrigerated', '2017-04-25 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(156, 'onion', 10, 'refrigerated', '2017-06-01 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(157, 'tomato', 10, 'refrigerated', '2017-05-04 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(158, 'onion', 10, 'refrigerated', '2017-06-19 00:00:00', 'food', 'vegetables', 2, 'foodbank'),
(159, 'wheat', 10, 'drygoods', '2017-12-19 00:00:00', 'food', 'nuts/grains/beans', 2, 'foodbank'),
(160, 'soy sauce', 10, 'drygoods', '2017-12-10 00:00:00', 'food', 'sauce/condiments', 2, 'foodbank'),
(161, 'expired chicken', 6, 'refrigerated', '2017-04-11 00:00:00', 'food', ' meat/seafood', 3, 'foodbank'),
(162, 'expired milk', 6, 'refrigerated', '2017-04-11 00:00:00', 'food', 'dairy/eggs', 3, 'foodbank'),
(163, 'expired chicken', 6, 'refrigerated', '2017-04-13 00:00:00', 'food', ' meat/seafood', 3, 'foodbank'),
(164, 'expired milk', 6, 'refrigerated', '2017-04-13 00:00:00', 'food', 'dairy/eggs', 3, 'foodbank'),
(165, 'expired chicken', 6, 'refrigerated', '2017-04-12 00:00:00', 'food', ' meat/seafood', 3, 'foodbank'),
(166, 'expired milk', 6, 'refrigerated', '2017-04-12 00:00:00', 'food', 'dairy/eggs', 3, 'foodbank'),
(167, 'expired chicken', 6, 'refrigerated', '2017-04-10 00:00:00', 'food', ' meat/seafood', 3, 'foodbank'),
(168, 'expired milk', 6, 'refrigerated', '2017-04-10 00:00:00', 'food', 'dairy/eggs', 3, 'foodbank');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `client_id` int(16) UNSIGNED NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `site_id` int(16) UNSIGNED NOT NULL,
  `description` varchar(50) NOT NULL,
  `field_modified` varchar(50) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`client_id`, `datetime`, `site_id`, `description`, `field_modified`, `note`) VALUES
(1, '2017-04-01 18:24:00', 1, 'profile created', '', NULL),
(1, '2017-04-01 18:35:20', 1, 'visit pantry1', '', NULL),
(1, '2017-04-02 19:18:08', 3, 'visit pantry3', '', NULL),
(2, '2017-04-15 18:28:08', 1, 'profile created', NULL, NULL),
(2, '2017-04-15 19:18:08', 3, 'visit pantry3', NULL, NULL),
(2, '2017-08-15 19:18:08', 1, 'visit pantry1', NULL, NULL),
(3, '2017-04-15 18:18:08', 1, 'profile created', NULL, NULL),
(3, '2017-04-15 19:18:08', 3, 'visit pantry3', NULL, NULL),
(3, '2017-08-15 19:18:08', 1, 'visit pantry1', NULL, NULL),
(4, '2017-04-15 17:18:08', 1, 'profile created', NULL, NULL),
(4, '2017-04-15 19:18:08', 3, 'visit pantry3', NULL, NULL),
(4, '2017-08-15 19:18:08', 1, 'visit pantry1', NULL, NULL),
(5, '2017-05-15 17:18:08', 2, 'profile created', NULL, NULL),
(5, '2017-05-15 17:28:08', 2, 'visit soup2', NULL, NULL),
(5, '2017-06-15 17:18:08', 3, 'visit soup3', NULL, NULL),
(6, '2017-05-15 18:18:08', 2, 'profile created', NULL, NULL),
(6, '2017-05-15 18:28:08', 2, 'visit soup2', NULL, NULL),
(6, '2017-06-15 18:18:08', 3, 'visit soup3', NULL, NULL),
(7, '2017-05-15 19:18:08', 2, 'profile created', NULL, NULL),
(7, '2017-05-15 19:28:08', 2, 'visit soup2', NULL, NULL),
(7, '2017-06-15 19:18:08', 3, 'visit soup3', NULL, NULL),
(8, '2017-05-15 20:18:08', 2, 'profile created', NULL, NULL),
(8, '2017-05-15 20:28:08', 2, 'visit soup2', NULL, NULL),
(8, '2017-06-15 20:18:08', 3, 'visit soup3', NULL, NULL),
(9, '2017-07-15 17:18:08', 2, 'profile created', NULL, NULL),
(9, '2017-07-15 17:28:08', 2, 'visit shelter2', NULL, NULL),
(9, '2017-08-16 00:08:08', 3, 'visit shelter3', NULL, NULL),
(10, '2017-07-15 18:18:08', 2, 'profile created', NULL, NULL),
(10, '2017-07-15 18:28:08', 2, 'visit shelter2', NULL, NULL),
(10, '2017-08-15 17:28:08', 3, 'visit shelter3', NULL, NULL),
(11, '2017-07-15 19:18:08', 2, 'profile created', NULL, NULL),
(11, '2017-07-15 19:28:08', 2, 'visit shelter2', NULL, NULL),
(11, '2017-08-15 17:28:08', 3, 'visit shelter3', NULL, NULL),
(12, '2017-07-15 20:18:08', 2, 'profile created', 'Jane Client12', NULL),
(12, '2017-07-15 20:28:08', 2, 'visit shelter2', 'Jane Client12', NULL),
(12, '2017-08-15 17:38:08', 3, 'visit shelter3', 'Jane Client12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `user_id` int(16) UNSIGNED NOT NULL,
  `item_id` int(16) UNSIGNED NOT NULL,
  `num_request` int(16) UNSIGNED NOT NULL,
  `num_provide` int(16) UNSIGNED NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`user_id`, `item_id`, `num_request`, `num_provide`, `status`) VALUES
(1, 17, 1, 1, 'in-full'),
(1, 18, 3, 3, 'in-full'),
(1, 85, 3, 3, 'in-full'),
(1, 86, 1, 1, 'in-full'),
(1, 101, 4, 0, 'pending'),
(1, 102, 4, 0, 'pending'),
(1, 103, 4, 0, 'pending'),
(1, 104, 6, 0, 'pending'),
(1, 105, 2, 0, 'pending'),
(1, 106, 7, 0, 'pending'),
(1, 107, 3, 0, 'pending'),
(1, 108, 1, 0, 'pending'),
(1, 109, 1, 0, 'pending'),
(1, 110, 7, 0, 'pending'),
(1, 161, 4, 0, 'pending'),
(1, 162, 4, 0, 'pending'),
(1, 163, 6, 0, 'pending'),
(1, 164, 3, 0, 'pending'),
(2, 1, 2, 0, 'pending'),
(2, 2, 2, 0, 'pending'),
(2, 3, 3, 0, 'pending'),
(2, 4, 4, 0, 'pending'),
(2, 5, 5, 0, 'pending'),
(2, 6, 6, 0, 'pending'),
(2, 20, 3, 0, 'pending'),
(2, 21, 5, 0, 'pending'),
(2, 22, 7, 0, 'pending'),
(2, 23, 3, 0, 'pending'),
(2, 80, 1, 0, 'pending'),
(2, 81, 2, 0, 'pending'),
(2, 82, 4, 0, 'pending'),
(2, 83, 3, 0, 'pending'),
(2, 84, 2, 0, 'pending'),
(2, 85, 1, 0, 'pending'),
(2, 86, 4, 0, 'pending'),
(2, 87, 1, 0, 'pending'),
(2, 161, 1, 1, 'in-full'),
(2, 162, 1, 1, 'in-full'),
(2, 163, 1, 1, 'in-full'),
(2, 164, 1, 1, 'in-full'),
(2, 165, 5, 0, 'pending'),
(2, 166, 4, 0, 'pending'),
(2, 167, 6, 0, 'pending'),
(2, 168, 2, 0, 'pending'),
(3, 1, 1, 0, 'pending'),
(3, 2, 1, 0, 'pending'),
(3, 3, 1, 0, 'pending'),
(3, 4, 1, 0, 'pending'),
(3, 5, 1, 0, 'pending'),
(3, 9, 1, 0, 'pending'),
(3, 10, 1, 0, 'pending'),
(3, 11, 1, 0, 'pending'),
(3, 12, 1, 0, 'pending'),
(3, 13, 1, 0, 'pending'),
(3, 26, 2, 2, 'in-full'),
(3, 27, 1, 1, 'in-full'),
(3, 28, 1, 1, 'in-full'),
(3, 29, 1, 1, 'in-full'),
(3, 77, 1, 0, 'pending'),
(3, 78, 1, 0, 'pending'),
(3, 79, 1, 0, 'pending'),
(3, 80, 1, 0, 'pending'),
(3, 81, 1, 0, 'pending'),
(3, 82, 1, 0, 'pending'),
(3, 83, 1, 0, 'pending'),
(3, 86, 1, 0, 'pending'),
(3, 87, 1, 0, 'pending'),
(3, 88, 1, 0, 'pending'),
(3, 89, 1, 0, 'pending'),
(3, 90, 1, 0, 'pending'),
(3, 91, 1, 0, 'pending'),
(3, 92, 1, 0, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `shelter`
--

CREATE TABLE `shelter` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `hours_of_operation` varchar(100) NOT NULL,
  `condition_for_use` varchar(250) NOT NULL,
  `familyroom_count` int(16) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shelter`
--

INSERT INTO `shelter` (`site_id`, `service_name`, `description`, `hours_of_operation`, `condition_for_use`, `familyroom_count`) VALUES
(2, 'shelter', 'shelter2', 'M-F, 7am-9pm', 'Proof of residence', 10),
(3, 'shelter', 'shelter3', 'M-F, 7am-9pm', 'Driver\'s license required', 10);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `street_address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(16) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `name`, `phone_number`, `street_address`, `city`, `state`, `zipcode`) VALUES
(1, 'site1', '5100001234', '321 Oak St', ' San Jose', 'CA', 94806),
(2, 'site2', '510 3456721', '345 Dyer St', 'Sunnyvale', 'CA', 94087),
(3, 'site3', '5103498712', '901 Poplar Ave', 'Santa Clara', 'CA', 94501);

-- --------------------------------------------------------

--
-- Table structure for table `soupkitchen`
--

CREATE TABLE `soupkitchen` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hours_of_operation` varchar(100) NOT NULL,
  `condition_for_use` varchar(250) NOT NULL,
  `seat_capacity` int(16) UNSIGNED DEFAULT NULL,
  `seat_available` int(16) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soupkitchen`
--

INSERT INTO `soupkitchen` (`site_id`, `service_name`, `description`, `hours_of_operation`, `condition_for_use`, `seat_capacity`, `seat_available`) VALUES
(2, 'soupkitchen', 'soup2', 'M-F, 7am-9pm', 'Driver\'s license required', 50, 50),
(3, 'soupkitchen', 'soup3', 'every day 7am-9pm', 'Proof of residence', 60, 60);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(16) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `site_id` int(16) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `first_name`, `last_name`, `site_id`) VALUES
(1, 'emp1', 'emp1@gamil.com', 'gatech123', 'Site1', 'Employee1', 1),
(2, 'emp2', 'emp2@gmail.com', 'gatech123', 'Site2', 'Employee2', 2),
(3, 'emp3', 'emp3@gmail.com', 'gatech123', 'Site3', 'Employee3', 3),
(4, 'vol1', 'vol1@gmail.com', 'gatech123', 'Demo', 'Volunteer1', 1),
(5, 'vol2', 'vol2@gmail.com', 'gatech123', 'Demo', 'Volunteer2', 2),
(6, 'vol3', 'vol3@gmail.com', 'gatech123', 'Demo', 'Volunteer3', 3);

-- --------------------------------------------------------

--
-- Table structure for table `waitlist`
--

CREATE TABLE `waitlist` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `client_id` int(16) UNSIGNED NOT NULL,
  `waitinglist_ranking` int(16) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `waitlist`
--

INSERT INTO `waitlist` (`site_id`, `service_name`, `client_id`, `waitinglist_ranking`, `datetime`) VALUES
(2, 'shelter', 1, 1, '2017-04-16 01:04:28'),
(2, 'shelter', 3, 2, '2017-04-16 01:05:26'),
(2, 'shelter', 5, 4, '2017-04-16 01:06:50'),
(2, 'shelter', 7, 3, '2017-04-16 01:05:40'),
(3, 'shelter', 7, 4, '2017-04-16 01:07:54'),
(3, 'shelter', 9, 3, '2017-04-16 01:07:49'),
(3, 'shelter', 10, 2, '2017-04-16 01:07:43'),
(3, 'shelter', 12, 1, '2017-04-16 01:07:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bunk`
--
ALTER TABLE `bunk`
  ADD PRIMARY KEY (`bunk_id`,`site_id`,`service_name`),
  ADD KEY `SHELTER_BUNK_idx` (`site_id`,`service_name`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `foodbank`
--
ALTER TABLE `foodbank`
  ADD PRIMARY KEY (`site_id`,`service_name`);

--
-- Indexes for table `foodpantry`
--
ALTER TABLE `foodpantry`
  ADD PRIMARY KEY (`site_id`,`service_name`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `FoodBank_Item` (`site_id`,`service_name`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`client_id`,`datetime`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`user_id`,`item_id`),
  ADD KEY `item_id_idx` (`item_id`);

--
-- Indexes for table `shelter`
--
ALTER TABLE `shelter`
  ADD PRIMARY KEY (`site_id`,`service_name`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`),
  ADD UNIQUE KEY `Name_UNIQUE` (`name`),
  ADD UNIQUE KEY `Street Address_UNIQUE` (`street_address`);

--
-- Indexes for table `soupkitchen`
--
ALTER TABLE `soupkitchen`
  ADD PRIMARY KEY (`site_id`,`service_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `site_id_idx` (`site_id`);

--
-- Indexes for table `waitlist`
--
ALTER TABLE `waitlist`
  ADD PRIMARY KEY (`site_id`,`service_name`,`client_id`),
  ADD KEY `WAITLIST_client_idx` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bunk`
--
ALTER TABLE `bunk`
  MODIFY `bunk_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `site_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodbank`
--
ALTER TABLE `foodbank`
  ADD CONSTRAINT `Site_FOODBANK` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `foodpantry`
--
ALTER TABLE `foodpantry`
  ADD CONSTRAINT `SITE_FOODPANTRIES` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FoodBank_Item` FOREIGN KEY (`site_id`,`service_name`) REFERENCES `foodbank` (`site_id`, `service_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `CLIENT_LOG` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `REQUEST_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_REQUEST` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `soupkitchen`
--
ALTER TABLE `soupkitchen`
  ADD CONSTRAINT `SITE_SOUPKITCHEN` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `site_id` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
