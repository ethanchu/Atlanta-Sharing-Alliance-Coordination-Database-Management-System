-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2017 at 09:55 PM
-- Server version: 5.7.17
-- PHP Version: 7.1.2

DROP DATABASE IF EXISTS `cs6400_sp17_team022`;
SET default_storage_engine=InnoDB;

CREATE DATABASE IF NOT EXISTS cs6400_sp17_team022 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE cs6400_sp17_team022;

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
(1, '1234567890', 0, 'ZhangZhe', 'too young too simple'),
(2, '1101191180', 0, 'Trump', 'President'),
(3, '4332561234', 0, 'Kobe Byrant', 'Basketball');

-- --------------------------------------------------------

--
-- Table structure for table `foodbank`
--

CREATE TABLE `foodbank` (
  `site_id` int(16) UNSIGNED NOT NULL,
  `service_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `client_id` int(16) UNSIGNED NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `site_id` int(16) UNSIGNED NOT NULL,
  `description` varchar(50) NOT NULL,
  `field_modified` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'shelter', '789', '789', '789', 2);

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
(1, 'starbuck', '6467092083', 'City Hall', 'San Francisco', 'CA', 98001);

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
(1, 'soupkitchen', '987', '987', '987', 12, 10);

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
(1, 'shelter', 1, 1, '2017-04-05 21:50:37'),
(1, 'shelter', 2, 2, '2017-04-05 21:50:41'),
(1, 'shelter', 3, 3, '2017-04-05 21:50:45');

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
  MODIFY `bunk_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `client_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `site_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bunk`
--
ALTER TABLE `bunk`
  ADD CONSTRAINT `SHELTER_BUNK` FOREIGN KEY (`site_id`,`service_name`) REFERENCES `shelter` (`site_id`, `service_name`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Constraints for table `waitlist`
--
ALTER TABLE `waitlist`
  ADD CONSTRAINT `SHELTER_WAITLIST` FOREIGN KEY (`site_id`,`service_name`) REFERENCES `shelter` (`site_id`, `service_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `WAITLIST_CLIENT` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
