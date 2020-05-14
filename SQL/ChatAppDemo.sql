-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 05:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--
DROP DATABASE IF EXISTS `chatapp`;
CREATE DATABASE IF NOT EXISTS `chatapp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `chatapp`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat` (
  `id` int(9) NOT NULL,
  `usrname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chattext` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `chattime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `chat`:
--

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `usrname`, `chattext`, `chattime`) VALUES
(1, 'Brick', 'asdf', '2020-05-11 01:10:23'),
(2, 'Brick', 'asdasdas', '2020-05-11 01:11:38'),
(3, 'Brick', 'asdasdas', '2020-05-11 01:11:40'),
(4, 'Brick', 'gfd43', '2020-05-11 01:11:46'),
(5, 'Fasr', 'SAD!!!!!', '2020-05-11 01:12:56'),
(6, 'Awqua', 'Supper Sad', '2020-05-11 01:13:01'),
(7, 'Fasr', 'Wooperdoodle', '2020-05-11 01:15:30'),
(8, 'Ralf', 'gh', '2020-05-11 14:02:21'),
(9, 'Ralf', 'snicker', '2020-05-11 14:04:59'),
(10, 'Worf', 'Goops', '2020-05-11 14:07:34'),
(11, 'Worf', 'Woops', '2020-05-11 14:07:37'),
(12, 'Testy', 'Wort wort wort', '2020-05-13 14:27:01'),
(13, 'Testy', 'Wally wungo', '2020-05-13 14:28:27'),
(14, 'Testy', 'Worrrrr', '2020-05-13 14:37:54'),
(15, 'Testy', '&amp;lt;/?--&amp;lt;&amp;gt;##', '2020-05-13 14:44:35'),
(16, 'Testy', 'alert(1);', '2020-05-13 14:48:55'),
(17, 'Testy', '-1', '2020-05-13 14:49:40'),
(18, 'WWWW', 'WEoops', '2020-05-13 15:59:30'),
(19, 'WWWW', 'Wort wort wort', '2020-05-13 16:00:53'),
(20, 'WWWW', '&amp;amp;', '2020-05-13 16:12:30'),
(21, 'WWWW', 'WEll I guess O will type varis words. I want to see if this thing will actually work or what... &amp;amp; also what is going on with the length styff anywayts? Who coded that! What a jerk am I right?', '2020-05-13 16:13:50'),
(22, 'WWWW', 'WEll I guess O will type varis words. I want to see if this thing will actually work or what... &amp;amp; also what is going on with the length styff anywayts? Who coded that! What a wont piece of gum', '2020-05-13 16:19:31'),
(23, 'WWWW', 'Work', '2020-05-13 16:24:46'),
(24, 'WWWW', 'Work', '2020-05-13 16:25:01'),
(25, 'WWWW', 'Work', '2020-05-13 16:25:19'),
(26, 'WWWW', 'WEASDASD', '2020-05-13 16:27:04'),
(27, 'WWWW', 'Wrok workasdfasfa', '2020-05-13 16:40:23'),
(28, 'WWWW', 'Wassa', '2020-05-13 16:49:04'),
(29, 'Barphg', 'Testy', '2020-05-14 15:08:02'),
(30, 'Barphg', 'Worp Worp Worp', '2020-05-14 15:08:24'),
(31, 'Barphg', 'Worp Worp Worp', '2020-05-14 15:08:28'),
(32, 'Barphg', 'Worp Worp Worp', '2020-05-14 15:08:52'),
(33, 'Barphg', 'Woopity Swoopp!', '2020-05-14 15:11:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
