-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 06:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobsdetails`
--

CREATE TABLE `jobsdetails` (
  `id` int(11) NOT NULL,
  `position_id` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `closing_date` date NOT NULL,
  `position` enum('Full Time','Part Time') NOT NULL,
  `contract` enum('On-going','Fixed term') NOT NULL,
  `accept_post` tinyint(1) DEFAULT NULL,
  `accept_email` tinyint(1) DEFAULT NULL,
  `location` varchar(3) DEFAULT '---'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobsdetails`
--

INSERT INTO `jobsdetails` (`id`, `position_id`, `title`, `description`, `closing_date`, `position`, `contract`, `accept_post`, `accept_email`, `location`) VALUES
(10, 'PID0001', 'QA', 'Quality Assurance Enginerring', '2022-11-23', 'Part Time', 'Fixed term', 0, 0, 'NSW'),
(11, 'PID0003', 'SE', 'Software Engineering', '2022-12-23', 'Part Time', 'Fixed term', 0, 0, 'NT'),
(12, 'PID0004', 'BA', 'Business Analysis', '2022-12-23', 'Part Time', 'Fixed term', 0, 0, 'NSW'),
(14, 'PID0002', 'QA', 'Qulity asurance', '2022-10-23', 'Part Time', 'Fixed term', 0, 0, 'TAS'),
(15, 'PID0010', 'Accountant', 'Management students for Accountant', '2022-10-23', 'Part Time', 'On-going', 0, 0, 'NT'),
(16, 'PID0009', 'Accountant', 'Management students for Accountant', '2022-10-23', 'Full Time', 'Fixed term', 0, 0, 'NT'),
(17, 'PID0007', 'Lawyer', 'Low Student', '2022-12-23', 'Part Time', 'On-going', 0, 0, 'WA'),
(18, 'PID0008', 'Lawyer', 'Low Student', '2022-12-23', 'Part Time', 'On-going', 0, 0, 'WA'),
(19, 'PID0006', 'Grap Desg', 'Grap Designer ', '2022-10-23', 'Full Time', 'On-going', 0, 0, 'VIC'),
(20, 'PID0011', 'SE', 'Software engineering', '2022-12-23', 'Part Time', 'On-going', 0, 0, 'QLD'),
(21, 'PID0012', 'SE', 'Software engineering', '2022-12-23', 'Part Time', 'On-going', 0, 0, 'QLD'),
(22, 'PID0013', 'Software Eng', 'Software Engineering', '2022-12-23', 'Part Time', 'On-going', 0, 0, 'ACT'),
(24, 'PID0015', 'SE', 'Software Enigeering', '2005-09-23', 'Part Time', 'Fixed term', 0, 0, 'NSW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobsdetails`
--
ALTER TABLE `jobsdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position_id` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobsdetails`
--
ALTER TABLE `jobsdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
