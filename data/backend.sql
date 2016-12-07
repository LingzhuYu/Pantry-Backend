-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2016 at 12:10 AM
-- Server version: 5.7.13
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `rpg pantry backend`
--

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Material`
--

DROP TABLE IF EXISTS `Material`;
CREATE TABLE `Material` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `itemPerCase` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Material`
--

INSERT INTO `Material` (`id`, `name`,`price`, `itemPerCase`, `amount`) VALUES
(1, 'empty bottle', '100.00', 12, 36),
(2, 'red herb', '150.00', 6, 15),
(3, 'blue herb', '150.00', 6, 14),
(4, 'iron ingot', '500.00', 10, 20),
(5, 'steel ingot', '500.00', 10, 18),
(6, 'leather', '250.00', 20, 69),
(7, 'wood', '250.00', 50, 250),
(8, 'scroll', '100.00', 100, 40),
(9, 'ruby dust', '1000.00', 5, 12),
(10, 'sapphire dust', '1000.00', 5, 11),
(11, 'topaz dust', '1000.00', 5, 9),
(12, 'emerald dust', '1000.00', 5, 0);


--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `Material`
--
ALTER TABLE `Material`
  ADD PRIMARY KEY (`id`);
