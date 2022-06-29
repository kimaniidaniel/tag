-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 04:26 AM
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
-- Database: `tag`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `IntemID` int(11) NOT NULL,
  `StorageID` int(16) NOT NULL,
  `LocationID` int(11) NOT NULL,
  `Description` int(11) NOT NULL,
  `Color` int(11) NOT NULL,
  `Photo` tinyint(1) NOT NULL,
  `Number_of_items` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storagelocation`
--

CREATE TABLE `storagelocation` (
  `StorageID` int(16) NOT NULL,
  `FirstName` char(16) NOT NULL,
  `LastName` char(16) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Assigned_User_ID` varchar(16) NOT NULL,
  `UserID` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storageunit`
--

CREATE TABLE `storageunit` (
  `StorageID` int(11) NOT NULL,
  `StorageName` int(16) NOT NULL,
  `Storage_Location_ID` int(16) NOT NULL,
  `Assigned_User_ID` varchar(16) NOT NULL,
  `ItemID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(16) NOT NULL,
  `Identifier` int(11) NOT NULL,
  `FirstName` char(16) NOT NULL,
  `LastName` char(16) NOT NULL,
  `Email` varchar(16) NOT NULL,
  `UserName` char(12) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Role` int(11) NOT NULL,
  `Term` varchar(10) NOT NULL,
  `Dep_Date` date NOT NULL,
  `Arrival_Date` date NOT NULL,
  `Address` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`IntemID`),
  ADD UNIQUE KEY `StorageID` (`StorageID`);

--
-- Indexes for table `storagelocation`
--
ALTER TABLE `storagelocation`
  ADD PRIMARY KEY (`StorageID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `storageunit`
--
ALTER TABLE `storageunit`
  ADD PRIMARY KEY (`StorageID`),
  ADD UNIQUE KEY `ItemID` (`ItemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`StorageID`) REFERENCES `storagelocation` (`StorageID`);

--
-- Constraints for table `storagelocation`
--
ALTER TABLE `storagelocation`
  ADD CONSTRAINT `storagelocation_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `storageunit`
--
ALTER TABLE `storageunit`
  ADD CONSTRAINT `storageunit_ibfk_1` FOREIGN KEY (`ItemID`) REFERENCES `inventory` (`IntemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
