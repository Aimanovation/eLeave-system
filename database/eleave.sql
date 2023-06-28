-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 06:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eleave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(4) NOT NULL,
  `adminPassword` varchar(15) NOT NULL,
  `adminName` varchar(15) NOT NULL,
  `adminPhoneNo` varchar(15) NOT NULL,
  `adminEmail` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminPassword`, `adminName`, `adminPhoneNo`, `adminEmail`) VALUES
(1, 'Password@123', 'Alex John', '011-234-5678', 'alexjohn@gmail.');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `leaveID` int(4) NOT NULL,
  `leaveType` varchar(15) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `noOfDays` int(3) NOT NULL,
  `reasons` varchar(50) NOT NULL,
  `attachment` blob NOT NULL,
  `leaveStatus` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(4) NOT NULL,
  `userPassword` varchar(15) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `userPhoneNo` varchar(15) NOT NULL,
  `userEmail` varchar(15) NOT NULL,
  `userAddress` varchar(100) NOT NULL,
  `userPosition` varchar(25) NOT NULL,
  `userTotalLeave` int(3) NOT NULL,
  `leaveID` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userPassword`, `userName`, `userPhoneNo`, `userEmail`, `userAddress`, `userPosition`, `userTotalLeave`, `leaveID`) VALUES
(1, 'Password@123', 'John Smith', '012-345-6789', 'johnsmith@gmail', 'No. 22, Jalan Raja Chulan,\r\nBukit Bintang,\r\n55100 Ku', 'permanent', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`leaveID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leave`
--
ALTER TABLE `leave`
  MODIFY `leaveID` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
