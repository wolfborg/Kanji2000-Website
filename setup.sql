-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2020 at 10:40 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanji2000`
--
CREATE DATABASE IF NOT EXISTS `kanji2000` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `kanji2000`;

-- --------------------------------------------------------

--
-- Table structure for table `kanji`
--

DROP TABLE IF EXISTS `kanji`;
CREATE TABLE IF NOT EXISTS `kanji` (
  `kanji_id` int(11) NOT NULL,
  `kanji_jap` varchar(45) NOT NULL,
  `kanji_eng` varchar(255) NOT NULL,
  `kanji_hiragana` varchar(255) DEFAULT NULL,
  `kanji_romanji` varchar(255) DEFAULT NULL,
  `kanji_level` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kanji`
--

INSERT INTO `kanji` (`kanji_id`, `kanji_jap`, `kanji_eng`, `kanji_hiragana`, `kanji_romanji`, `kanji_level`) VALUES
(1, '一', 'one', 'いち', 'ichi', 0),
(2, '二', 'two', 'に', 'ni', 0),
(3, '三', 'three', 'さん', NULL, 0),
(4, '四', 'four', 'よん', NULL, 0),
(5, '五', 'five', NULL, NULL, 0),
(6, '六', 'six', NULL, NULL, 0),
(7, '七', 'seven', NULL, NULL, 0),
(8, '八', 'eight', NULL, NULL, 0),
(9, '九', 'nine', NULL, NULL, 0),
(10, '十', 'ten', NULL, NULL, 0),
(11, '人', 'person', NULL, NULL, 0),
(12, '日', 'sun', NULL, NULL, 0),
(13, '月', 'moon', NULL, NULL, 0),
(14, '曜', 'day', NULL, NULL, 0),
(15, '火', 'fire', NULL, NULL, 0),
(16, '水', 'water', NULL, NULL, 0),
(17, '木', 'tree', NULL, NULL, 0),
(18, '金', 'money', NULL, NULL, 0),
(19, '土', 'earth', NULL, NULL, 0),
(20, '本', 'book', NULL, NULL, 0),
(21, '山', 'mountain', NULL, NULL, 0),
(22, '目', 'eye', NULL, NULL, NULL),
(23, '見', 'see', NULL, NULL, NULL),
(24, '行', 'go', NULL, NULL, NULL),
(25, '来', 'come', NULL, NULL, NULL),
(26, '方', 'direction', NULL, NULL, NULL),
(27, '東', 'east', NULL, NULL, NULL),
(28, '西', 'west', NULL, NULL, NULL),
(29, '上', 'top', NULL, NULL, NULL),
(30, '下', 'bottom', NULL, NULL, NULL),
(31, '中', 'middle', NULL, NULL, NULL),
(32, '大', 'big', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(90) NOT NULL,
  `user_hash` char(64) NOT NULL,
  `user_first_name` varchar(40) DEFAULT NULL,
  `user_last_name` varchar(40) DEFAULT NULL,
  `user_level` int(4) NOT NULL DEFAULT '0',
  `user_progress` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_kanji_progress`
--

DROP TABLE IF EXISTS `user_kanji_progress`;
CREATE TABLE IF NOT EXISTS `user_kanji_progress` (
  `progress_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kanji_id` int(11) NOT NULL,
  `progress` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanji`
--
ALTER TABLE `kanji`
  ADD PRIMARY KEY (`kanji_id`),
  ADD UNIQUE KEY `kanji_id_UNIQUE` (`kanji_id`),
  ADD UNIQUE KEY `kanji_char_UNIQUE` (`kanji_jap`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name_UNIQUE` (`user_name`),
  ADD UNIQUE KEY `user_id_UNIQUE` (`user_id`),
  ADD UNIQUE KEY `user_email_UNIQUE` (`user_email`);

--
-- Indexes for table `user_kanji_progress`
--
ALTER TABLE `user_kanji_progress`
  ADD PRIMARY KEY (`progress_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`kanji_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanji`
--
ALTER TABLE `kanji`
  MODIFY `kanji_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user_kanji_progress`
--
ALTER TABLE `user_kanji_progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
