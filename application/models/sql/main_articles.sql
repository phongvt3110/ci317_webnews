-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2018 at 06:40 AM
-- Server version: 5.7.9
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci317`
--

-- --------------------------------------------------------

--
-- Table structure for table `main_articles`
--

CREATE TABLE `main_articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cid` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pid` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `state` tinyint(4) NOT NULL,
  `article_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `publish_at` timestamp NULL DEFAULT NULL,
  `unsubscribe_at` timestamp NULL DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `main_articles`
--
ALTER TABLE `main_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key01` (`cid`,`state`,`publish_at`),
  ADD KEY `key02` (`category_id`,`state`,`publish_at`),
  ADD KEY `key03` (`pid`,`state`,`publish_at`),
  ADD KEY `key04` (`state`,`article_type`,`publish_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `main_articles`
--
ALTER TABLE `main_articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
