-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2025 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `email`, `password`, `photo`) VALUES
('Gaurav Subhash Borse', 'gauravborseofficial8084@gmail.com', '12345678', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2555) NOT NULL,
  `Date` date NOT NULL,
  `Form` varchar(255) NOT NULL,
  `Template` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Title`, `Description`, `Date`, `Form`, `Template`) VALUES
('InnoHack', '   \"Innohack,\" a robotics and AI hackathon, sponsored by Nextech Minds and S2P Robotics Pvt. Ltd. The event is organized by Bot-Buddies in association with the CSMSS Chh. Shahu College of Engineering and the Artificial Intelligence and Data Science Student Association. The poster indicates that the hackathon will take place on June 9th and 10th, 2025, at the CSMSS Chh. Shahu College of Engineering in Chatrapati Sambhadinagar.', '2025-06-09', 'https://hackethon-liard.vercel.app/', '1748669888event2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `facultydata`
--

CREATE TABLE `facultydata` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` bigint(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `totalExperience` varchar(255) NOT NULL,
  `Specialization` varchar(255) NOT NULL,
  `Achievements` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultydata`
--

INSERT INTO `facultydata` (`Name`, `Email`, `Contact`, `Gender`, `DOB`, `Designation`, `Qualification`, `totalExperience`, `Specialization`, `Achievements`, `Address`, `Password`, `Photo`) VALUES
('ABC', 'abc123@gmail.com', 11111111111, 'male', '2000-01-01', 'Head.', 'ABCD', 'MNOP', 'WXYZ', 'EFGH', 'A-440', '$2y$10$rTO9GuMDqQbJBOsCZHUuFOn2Dnxx4wOpVrtMd5rmxK4Dbj.tox.q.', '1749199325images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `Photo` varchar(255) NOT NULL,
  `Desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestbonafide`
--

CREATE TABLE `requestbonafide` (
  `PRN` bigint(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Reason` varchar(255) NOT NULL,
  `Request` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestbonafide`
--

INSERT INTO `requestbonafide` (`PRN`, `Name`, `Class`, `Email`, `DOB`, `Reason`, `Request`, `Photo`) VALUES
(2225331995000, 'Gokul Atmaram Pawar', 'Third Year', 'gokulpawar636@gmail.com', '2005-01-01', 'Scholarship', 'Rejected', '1748690786IMG-20250428-WA0003.jpg'),
(2225331995016, 'Gaurav Subhash Borse', 'Third Year', 'gauravborseofficial8084@gmail.com', '2004-07-03', 'For Scholarship purpose', 'Approved', '1748682936Screenshot 2025-05-31 144523.png'),
(2225331995034, 'Tushar Sanjay Chobhe', 'Third Year', 'tusharchobhe615@gmail.com', '2005-01-06', 'Scholarship', 'Approved', '1749111526IMG-20250428-WA0003.jpg'),
(2225331995052, 'Avinash Vitthal Mothe', 'Third Year', 'avinashvitthalmothe4917@gmail.com', '2004-02-08', 'Bus Pass', 'Rejected', '1748685418avi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `PRN` bigint(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `Class` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Contact` bigint(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `collegeHostel` varchar(255) NOT NULL,
  `busFacility` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`PRN`, `fullName`, `Class`, `Gender`, `DOB`, `Category`, `Contact`, `Email`, `collegeHostel`, `busFacility`, `Address`, `password`, `photo`) VALUES
(2225331995034, 'Tushar Sanjay Chobhe', 'Third Year', 'Male', '2005-01-06', 'OBC', 7387272947, 'tusharchobhe615@gmail.com', 'No', 'No', 'Jamner, Jalgaon, Maharashtra', '$2y$10$s5PlIGJdHGRWrm096pJkMOcZok.y3a5zXz9ENnWUrpFrWcix8G1OK', '1749111040IMG-20250428-WA0003.jpg'),
(2225331995052, 'Avinash Vitthal Mothe', 'Third Year', 'Male', '2004-02-08', 'GENERAL/OPEN', 7620538611, 'avinashvitthalmothe4917@gmail.com', 'No', 'No', 'Harsul, Chhatrapati Sambhajinagar', '$2y$10$3X7e2c8h726xQscvEsf7De7Le31RbMcfOxId53xQFHV3Grt/bOJsK', '1748683708avi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD UNIQUE KEY `Title` (`Title`);

--
-- Indexes for table `facultydata`
--
ALTER TABLE `facultydata`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `requestbonafide`
--
ALTER TABLE `requestbonafide`
  ADD PRIMARY KEY (`PRN`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`PRN`),
  ADD UNIQUE KEY `PRN` (`PRN`),
  ADD UNIQUE KEY `Email` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
