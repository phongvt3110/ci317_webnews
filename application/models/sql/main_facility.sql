-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2018 at 06:42 AM
-- Server version: 5.7.9
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci317`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_facility`
--

CREATE TABLE `main_facility` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facility_type` tinyint(3) UNSIGNED DEFAULT NULL,
  `order` bigint(20) UNSIGNED NOT NULL,
  `state` tinyint(2) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `business_hours` text,
  `holiday` text,
  `tel` varchar(255) DEFAULT NULL,
  `child_fee` text,
  `adult_fee` text,
  `hp` varchar(255) DEFAULT NULL,
  `parking_number` text,
  `parking_fee` text,
  `parking_detail` text,
  `main_photo` bigint(20) DEFAULT NULL,
  `feature` bigint(20) DEFAULT NULL,
  `body` text,
  `info` text,
  `additional` text,
  `zone_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_id` varchar(8) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `access` text,
  `updated_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_facility`
--
ALTER TABLE `main_facility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key01` (`facility_type`,`state`,`updated_At`),
  ADD KEY `key02` (`feature`,`state`,`updated_At`),
  ADD KEY `key03` (`zone_id`,`state`,`updated_At`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_facility`
--
ALTER TABLE `main_facility`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
