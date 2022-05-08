-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 10:36 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `interndb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `username`, `name`, `password`, `date`) VALUES
(8, 'Cynthia', ' Cynthia', '$2y$10$oDNTA00L23kKuGPPk4xxauOMTC/B8h8r/5MQh93uiGlkINcEpefl.', '2021-09-09 23:53:27'),
(21, 'Admin ', 'Admin', '$2y$10$8KR3lFnwXZpoNZe1J418BuuKoRK12SgOOC3iA.M89yEHz.6B1HyvO', '2021-09-13 22:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `applied_students`
--

CREATE TABLE `applied_students` (
  `appliedStudentsId` int(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `appliedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applied_students`
--

INSERT INTO `applied_students` (`appliedStudentsId`, `companyName`, `userName`, `email`, `gender`, `resume`, `appliedDate`) VALUES
(27, 'Dim Connect', 'Admin ', 'cynthia@gmail.com', 'Female', 'deracv.pdf', '2021-10-18 20:31:19'),
(28, 'Dev App IT', 'Kiddo  ', 'kiddo@gmail.com', 'Male', 'kiddo.pdf', '2021-10-18 20:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `internship_jobs`
--

CREATE TABLE `internship_jobs` (
  `jobId` int(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `jobName` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `jobDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internship_jobs`
--

INSERT INTO `internship_jobs` (`jobId`, `companyName`, `jobName`, `state`, `jobDescription`) VALUES
(3, 'Dev App IT ', 'Mobile / Desktop App Development   ', 'Lagos   ', 'Must Have Little Experience with Java and Database Interaction'),
(7, 'Dim Connect ', 'Web and Mobile App Development ', 'Amanbra ', 'Must Have Little Exprience with HTML, CSS and JS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `username`, `firstname`, `lastname`, `email`, `gender`, `password`) VALUES
(5, 'Dera', 'Aniemena', 'Cynthia', 'cynthia@gmail.com', 'Female', '$2y$10$xkU.Q.QdSN/To8gsblWd.euOtOQSJ6DD9/yiRReSR.zKiVfW1KZvi'),
(7, 'Kiddo  ', 'Prosper  ', 'Kiddo  ', 'kiddo@gmail.com  ', 'Male', '$2y$10$oLDTWek50E768U4EADv5G.sY184cJGkKumAlSp9zhKOhclX/O7qra'),
(17, 'Bellee', 'Bella ', 'Bella  ', 'bella@gmail.com  ', 'Female', '$2y$10$F38UG2Xj5/DOBIU77AgIcO73X7ZsxqbWAlu9RafHkM4xx8AcGX7fC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `applied_students`
--
ALTER TABLE `applied_students`
  ADD PRIMARY KEY (`appliedStudentsId`);

--
-- Indexes for table `internship_jobs`
--
ALTER TABLE `internship_jobs`
  ADD PRIMARY KEY (`jobId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `applied_students`
--
ALTER TABLE `applied_students`
  MODIFY `appliedStudentsId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `internship_jobs`
--
ALTER TABLE `internship_jobs`
  MODIFY `jobId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
