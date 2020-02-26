-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2020 at 11:35 AM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `questionnaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` bigint(50) NOT NULL,
  `userID` bigint(50) NOT NULL,
  `systemID` bigint(50) NOT NULL,
  `educationFeild` varchar(50) NOT NULL,
  `educationPlace` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` int(1) NOT NULL,
  `question1` int(1) NOT NULL,
  `question2` int(1) NOT NULL,
  `question3` int(1) NOT NULL,
  `question4` int(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `userID`, `systemID`, `educationFeild`, `educationPlace`, `age`, `gender`, `question1`, `question2`, `question3`, `question4`, `datetime`) VALUES
(1, 1, 2, 'nhu', 'huhu', 456, 1, 1, 1, 1, 1, '2020-02-26 08:41:01'),
(2, 1, 2, 'nhu', 'huhu', 456, -1, 1, 1, 1, 1, '2020-02-26 08:42:13'),
(3, 1, 2, 'nhu', 'huhu', 456, 0, 1, 1, 1, 1, '2020-02-26 08:44:11'),
(4, 1, 2, '44', 'jiji', 44, -1, 1, 1, 1, 1, '2020-02-26 08:44:19'),
(5, 1, 2, '44', 'jiji', 44, -1, 1, 1, 1, 1, '2020-02-26 08:44:28'),
(6, 1, 2, '44', 'jiji', 44, 0, 1, 1, 1, 1, '2020-02-26 08:47:20'),
(7, 1, 2, 'dfg', 'hhh', 2147483647, 0, 1, 1, 1, 1, '2020-02-26 08:49:39'),
(8, 1, 2, 'dfg', 'hhh', 2147483647, 0, 1, 1, 1, 1, '2020-02-26 08:52:13'),
(9, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:07:34'),
(10, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:09:16'),
(11, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:09:25'),
(12, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:10:46'),
(13, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:11:06'),
(14, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:11:12'),
(15, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:11:41'),
(16, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:11:54'),
(17, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:12:00'),
(18, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:12:05'),
(19, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:13:13'),
(20, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:13:41'),
(21, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:13:45'),
(22, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:13:47'),
(23, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:13:50'),
(24, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:13:56'),
(25, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:14:16'),
(26, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:14:19'),
(27, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:14:21'),
(28, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:14:36'),
(29, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:15:01'),
(30, 1, 2, 'dfgdg', 'dgdfg', 50, 1, 3, 1, 1, 1, '2020-02-26 11:15:05'),
(31, 1, 2, 'dfgdfg', 'dfgdfg', 44, 1, 3, 2, 4, 2, '2020-02-26 11:15:37'),
(32, 1, 2, 'dfgdfg', 'dfgdfg', 44, 1, 3, 2, 4, 2, '2020-02-26 11:15:39'),
(33, 1, 2, 'dfgdfg', 'dfgdfg', 44, 1, 3, 2, 4, 2, '2020-02-26 11:15:39'),
(34, 1, 2, 'dfgdfg', 'dfgdfg', 44, 1, 3, 2, 4, 2, '2020-02-26 11:15:40'),
(35, 1, 2, 'dfgdfg', 'dfgdfg', 44, 1, 3, 2, 4, 2, '2020-02-26 11:15:40'),
(36, 1, 2, 'dfgdfg', 'dfgdfg', 44, 1, 3, 2, 4, 2, '2020-02-26 11:15:40'),
(37, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:08'),
(38, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:09'),
(39, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:10'),
(40, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:10'),
(41, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:10'),
(42, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:11'),
(43, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:11'),
(44, 1, 2, 'dfg', 'jidfdfg', 345, 1, 5, 5, 2, 4, '2020-02-26 11:16:11'),
(45, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:21'),
(46, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:22'),
(47, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:22'),
(48, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:23'),
(49, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:23'),
(50, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:23'),
(51, 1, 2, 'dfg', 'dfgd', 11, 1, 5, 5, 5, 5, '2020-02-26 11:16:23'),
(52, 1, 2, 'dfgdfg', 'dfgdf', 25, 1, 2, 2, 3, 2, '2020-02-26 11:29:13'),
(53, 1, 2, 'dfgdfg', 'dfgdf', 25, 1, 2, 2, 3, 2, '2020-02-26 11:29:14'),
(54, 1, 2, 'dfgdfg', 'dfgdf', 25, 1, 2, 2, 3, 2, '2020-02-26 11:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` bigint(50) NOT NULL,
  `userAgent` text NOT NULL,
  `userID` bigint(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `userAgent`, `userID`, `datetime`) VALUES
(1, 'cli', 1, '2020-02-26 08:30:55'),
(2, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/80.0.3987.87 Chrome/80.0.3987.87 Safari/537.36', 1, '2020-02-26 08:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ip`, `datetime`) VALUES
(1, '::1', '2020-02-26 08:29:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `system`
--
ALTER TABLE `system`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
