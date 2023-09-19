-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 04:27 PM
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
-- Database: `profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `art_service`
--

CREATE TABLE `art_service` (
  `id` int(11) NOT NULL,
  `name_art` varchar(255) DEFAULT NULL,
  `performance_art` varchar(255) DEFAULT NULL,
  `daystart` date DEFAULT NULL,
  `dayend` date DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `Id_identity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logadmin`
--

CREATE TABLE `logadmin` (
  `Id` int(10) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `surname` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `rank` text CHARACTER SET utf8 NOT NULL,
  `branch` text CHARACTER SET utf8 NOT NULL,
  `Pass` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logadmin`
--

INSERT INTO `logadmin` (`Id`, `username`, `surname`, `email`, `rank`, `branch`, `Pass`) VALUES
(1, 'Jeeradech ', 'wongkham', 'arm_915@hotmail.co.th', 'saab', 'saab', '1');

-- --------------------------------------------------------

--
-- Table structure for table `regis`
--

CREATE TABLE `regis` (
  `Id` int(10) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `surname` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `rank` text CHARACTER SET utf8 NOT NULL,
  `branch` text CHARACTER SET utf32 NOT NULL,
  `Pass` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regis`
--

INSERT INTO `regis` (`Id`, `username`, `surname`, `email`, `rank`, `branch`, `Pass`) VALUES
(1, '1', '1', 'arm_915@hotmail.co.th', 'saab', 'saab', '1');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` int(11) NOT NULL,
  `nameresearch` varchar(255) NOT NULL,
  `day` date NOT NULL,
  `researchfile` varchar(255) NOT NULL,
  `Journalname` varchar(255) NOT NULL,
  `picturediagram` varchar(255) NOT NULL,
  `capitaldocuments` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `Id_identity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teach`
--

CREATE TABLE `teach` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `study_group` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `Id_identity` int(11) NOT NULL,
  `day` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `watcher_user`
--

CREATE TABLE `watcher_user` (
  `Id` int(10) NOT NULL,
  `username` text CHARACTER SET utf8 NOT NULL,
  `surname` text CHARACTER SET utf8 NOT NULL,
  `email` text CHARACTER SET utf8 NOT NULL,
  `rank` text CHARACTER SET utf8 NOT NULL,
  `branch` text CHARACTER SET utf32 NOT NULL,
  `Pass` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watcher_user`
--

INSERT INTO `watcher_user` (`Id`, `username`, `surname`, `email`, `rank`, `branch`, `Pass`) VALUES
(1, '1', '1', 'arm_915@hotmail.co.th', 'volvo', 'volvo', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `art_service`
--
ALTER TABLE `art_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logadmin`
--
ALTER TABLE `logadmin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `regis`
--
ALTER TABLE `regis`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watcher_user`
--
ALTER TABLE `watcher_user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `art_service`
--
ALTER TABLE `art_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logadmin`
--
ALTER TABLE `logadmin`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regis`
--
ALTER TABLE `regis`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teach`
--
ALTER TABLE `teach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `watcher_user`
--
ALTER TABLE `watcher_user`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
