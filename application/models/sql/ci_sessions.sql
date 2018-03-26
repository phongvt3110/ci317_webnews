-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 25, 2018 at 11:41 PM
-- Server version: 10.0.34-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('u9t9k43saeirdr339cv1asut6dlsphde', '127.0.0.1', 1521987807, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532313938373830373b757365727c613a373a7b733a323a226964223b733a313a2231223b733a343a226e616d65223b733a373a2270686f6e677674223b733a353a22656d61696c223b733a32333a22767470686f6e6736353130343340676d61696c2e636f6d223b733a353a2270686f6e65223b733a31303a2230393833333937353830223b733a383a2270617373776f7264223b733a38303a224a444a354a4445774a476450626d39575a6d6c55627a4e3663474e76636a4679596a426e6279357964314e3561464179566a6445645564775647566a5930314e516b3961626d784f63326842516e4579223b733a31303a22637265617465645f6174223b733a31393a22323031382d30332d32352031393a30373a3233223b733a31303a22757064617465645f6174223b733a31393a22323031382d30332d32352031393a30373a3233223b7d72656d656d6265727c4e3b);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;