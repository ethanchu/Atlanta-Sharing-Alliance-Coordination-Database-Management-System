CREATE DATABASE  IF NOT EXISTS `cs6400_sp17_team022` ENGINE=InnoDB DEFAULT CHARSET=utf8;
USE `cs6400_sp17_team022`;

--Tables


CREATE TABLE `Bunk` (
  `bunk_id` int(16) unsigned NOT NULL,
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `type` varchar(100) NOT NULL,
  `count` int(16) unsigned NOT NULL,
  `available_count` int(16) unsigned NOT NULL,
  PRIMARY KEY (`bunk_id`,`site_id`,`service_name`),
  KEY `SHELTER_BUNK_idx` (`site_id`,`service_name`)
) ;


CREATE TABLE `client` (
  `client_id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(50),
  `head_of_household` tinyint(1),
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`client_id`)
) ;


CREATE TABLE `FoodPantry` (
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hours_of_operation` varchar(100) NOT NULL,
  `condition_for_use` varchar(250) NOT NULL,
  PRIMARY KEY (`site_id`,`service_name`)  
) ;


CREATE TABLE `FoodBank` (
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  PRIMARY KEY (`site_id`,`Service_name`)
) ;


CREATE TABLE `Item` (
  `item_id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `unit` int(16) unsigned NOT NULL,
  `storage_type` varchar(50) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL,
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`)
) ;


CREATE TABLE `Log` (
  `client_id` int(16) unsigned NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `site_id` int(16) unsigned NOT NULL,
  `description` varchar(50) NOT NULL,
  `field_modified` varchar(50),
  PRIMARY KEY (`client_id`,`datetime`) 
) ;


CREATE TABLE `Request` (
  `user_id` int(16) unsigned NOT NULL,
  `item_id` int(16) unsigned NOT NULL,
  `num_request` int(16) unsigned NOT NULL,
  `num_provide` int(16) unsigned NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`,`item_id`),
  KEY `item_id_idx` (`item_id`)
) ;


CREATE TABLE `Shelter` (
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL,
  `hours_of_operation` varchar(100) NOT NULL,
  `condition_for_use` varchar(250) NOT NULL,
  `familyroom_count` int(16) unsigned NOT NULL,
  PRIMARY KEY (`site_id`,`service_name`) 
) ;


CREATE TABLE `Site` (
  `site_id` int(16) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `street_address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` int(16) unsigned NOT NULL,
  PRIMARY KEY (`site_id`),
  UNIQUE KEY `Name_UNIQUE` (`name`),
  UNIQUE KEY `Street Address_UNIQUE` (`street_address`)
) ;


CREATE TABLE `SoupKitchen` (
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `hours_of_operation` varchar(100) NOT NULL,
  `condition_for_use` varchar(250) NOT NULL,
  `seat_capacity` int(16) unsigned NOT NULL,
  `seat_available` int(16) unsigned NOT NULL,
  PRIMARY KEY (`site_id`,`service_name`) 
) ;



CREATE TABLE `User` (
  `user_id` int(16) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `site_id` int(16) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `site_id_idx` (`site_id`)
) ;


CREATE TABLE `Waitlist` (
  `site_id` int(16) unsigned NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `client_id` int(16) unsigned NOT NULL,
  `waitinglist_ranking` int(16) unsigned NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`site_id`,`service_name`,`client_id`),
  KEY `WAITLIST_client_idx` (`client_id`)
) ;



-- Table Constraints

ALTER TABLE `Bunk`
	ADD CONSTRAINT `SHELTER_BUNK` FOREIGN KEY (`site_id`, `service_name`) REFERENCES `Shelter` (`site_id`, `service_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `FoodPantry`
	ADD CONSTRAINT `SITE_FOODPANTRIES` FOREIGN KEY (`site_id`) REFERENCES `Site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `FoodBank`
	ADD CONSTRAINT `Site_FOODBANK` FOREIGN KEY (`site_id`) REFERENCES `Site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Item`
	ADD CONSTRAINT `FoodBank_Item` FOREIGN KEY (`site_id`,`service_name`) REFERENCES `Foodbank` (`site_id`,`service_name`) ON DELETE NO ACTION ON UPDATE NO ACTION;
	
ALTER TABLE `Log`
	ADD CONSTRAINT `CLIENT_LOG` FOREIGN KEY (`client_id`) REFERENCES `Client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Request`
	ADD CONSTRAINT `REQUEST_item_id` FOREIGN KEY (`item_id`) REFERENCES `Item` (`item_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	ADD CONSTRAINT `user_id_REQUEST` FOREIGN KEY (`user_id`) REFERENCES `User` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE `Shelter`
	ADD CONSTRAINT `SITE_SHELTER` FOREIGN KEY (`site_id`) REFERENCES `Site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;


ALTER TABLE `SoupKitchen`	
	ADD CONSTRAINT `SITE_SOUPKITCHEN` FOREIGN KEY (`site_id`) REFERENCES `Site` (`site_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
	
	
ALTER TABLE `User`
	ADD CONSTRAINT `site_id` FOREIGN KEY (`site_id`) REFERENCES `Site` (`site_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `Waitlist`
	ADD CONSTRAINT `SHELTER_WAITLIST` FOREIGN KEY (`site_id`, `service_name`) REFERENCES `Shelter` (`site_id`, `service_name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	ADD CONSTRAINT `WAITLIST_CLIENT` FOREIGN KEY (`client_id`) REFERENCES `Client` (`client_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;