-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 04:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aCreatedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `aCreatedDate`) VALUES
('admin', 'admin', '2021-03-28 15:15:43');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `code` int(11) NOT NULL,
  `dcode` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `professorname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `credits` int(11) NOT NULL,
  `CreatedDate` timestamp NULL DEFAULT current_timestamp(),
  `updatedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`code`, `dcode`, `name`, `professorname`, `description`, `credits`, `CreatedDate`, `updatedDate`) VALUES
(557, 345, 'Database', 'Ayoub', 'Database', 3, '2021-04-07 09:24:30', '2021-04-07 09:24:30'),
(558, 345, 'Programing analysis', 'Ayoub', 'Programming analysis', 3, '2021-04-07 10:28:00', '2021-04-07 10:28:00'),
(560, 345, 'Graphics', 'Layachi', 'Graphics is great', 3, '2021-04-10 09:18:22', '2021-04-10 09:18:22'),
(589, 555, 'Image analysis', 'Layachi', 'Testing the description', 3, '2021-04-07 09:25:47', '2021-04-07 09:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dcode` int(11) NOT NULL,
  `dname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dcreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dcode`, `dname`, `dcreationDate`) VALUES
(345, 'cse', '2021-03-28 21:01:33'),
(555, 'ECE', '2021-03-29 07:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `registered-courses`
--

CREATE TABLE `registered-courses` (
  `studentname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departmentCode` int(11) NOT NULL,
  `semesterCode` int(11) NOT NULL,
  `courseCode` int(11) NOT NULL,
  `grades` float DEFAULT NULL,
  `registeredDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registered-courses`
--

INSERT INTO `registered-courses` (`studentname`, `departmentCode`, `semesterCode`, `courseCode`, `grades`, `registeredDate`) VALUES
('lyalavarthi', 555, 1, 559, 10, '2021-04-07 11:29:44'),
('lyalavarthi', 555, 1, 589, NULL, '2021-04-07 11:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semcode` int(11) NOT NULL,
  `sname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `screatedDate` timestamp NULL DEFAULT current_timestamp(),
  `supdatedDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semcode`, `sname`, `screatedDate`, `supdatedDate`) VALUES
(1, 'First Sem', '2021-03-28 11:21:07', '2021-03-28 11:21:07'),
(2, 'Second Semester', '2021-03-28 21:00:52', '2021-03-28 21:00:52'),
(3, 'Second Semester', '2021-03-29 07:06:26', '2021-03-29 07:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `studentname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currentsemester` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `createddate` timestamp NULL DEFAULT current_timestamp(),
  `updateddate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`username`, `studentname`, `password`, `department`, `currentsemester`, `createddate`, `updateddate`) VALUES
('lyalavarthi', 'Lohitha', 'test1', '555', '1', '2021-04-07 11:28:59', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`),
  ADD KEY `test1` (`dcode`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dcode`);

--
-- Indexes for table `registered-courses`
--
ALTER TABLE `registered-courses`
  ADD KEY `test` (`studentname`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semcode`);

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `test1` FOREIGN KEY (`dcode`) REFERENCES `department` (`dcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `registered-courses`
--
ALTER TABLE `registered-courses`
  ADD CONSTRAINT `test` FOREIGN KEY (`studentname`) REFERENCES `studentdetails` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
