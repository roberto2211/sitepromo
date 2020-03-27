-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 04:57 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
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
-- Database: `site_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `forminfo`
--

CREATE TABLE `forminfo` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` text NOT NULL,
  `message` longtext NOT NULL,
  `ip` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forminfo`
--

INSERT INTO `forminfo` (`id`, `firstname`, `lastname`, `email`, `message`, `ip`, `created`) VALUES
(4, 'robert', 'test Robert', 'ushiy@ahoo.fr', 'ite personnel de promotion\r\n\r\nHello Bonjour Veillez nous laisser un message via ce Formulai', 0, '2020-03-16 20:03:50'),
(5, '', '', '', '', 0, '0000-00-00 00:00:00'),
(6, 'test', 'jay', 'test@yahoo.fr', 'eyesjhdhjdjhdjkdkldksdkdsjkfhjfhjf', 0, '2020-03-16 20:29:15'),
(10, 'didsuid', 'jjhhj', 'test@yahoo.fr', 'rerere', 0, '2020-03-22 15:10:44'),
(12, 'test', 'test', 'jay@outlook.fr', 'teests', 0, '2020-03-22 15:28:42'),
(13, 'ddsdssd', 'dsdsds', 'hirwa@gmail.com', 'sddsdsdsds', 0, '2020-03-22 15:30:36'),
(14, 'numa', 'dsdsds', 'twahirwa@outlook.fr', 'rrrerere', 0, '2020-03-22 19:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `firstname`, `lastname`, `email`, `password`, `phone`, `gender`, `created`) VALUES
(23, 'numa', 'jhhj', 'twahirwa@outlook.fr', '$2y$10$rKQB7uTFZjJGoiLfE6ZzvuD8SWC4HsT7dygdnzb0vf8SujdbNQSAK', '0781818325', 0, '2020-03-25 15:08:20'),
(24, 'numa', 'jhhj', 'twahirwa@outlook.fr', '$2y$10$PPMoGe13PGYE/7LnpJ75gu2dgYvl5EsswR9HCctHcqZfgI3zarZya', '0781818325', 0, '2020-03-25 15:08:34'),
(29, 'numa', 'ccccc', 'twahirwa@outlook.fr', '$2y$10$1iTX2JsoE7FFHGd2wVptfuhQmnqwXTygG2FvcaX4qNlnQIpyVYDsG', '0781818325', 0, '2020-03-25 15:45:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forminfo`
--
ALTER TABLE `forminfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forminfo`
--
ALTER TABLE `forminfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
