-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 04:17 AM
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
  `ItemID` int(20) NOT NULL,
  `StorageID` int(20) NOT NULL,
  `LocationID` int(20) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Number_of_Items` int(20) NOT NULL,
  `Arrival_Date` date NOT NULL,
  `Departure_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storagelocation`
--

CREATE TABLE `storagelocation` (
  `Storage_Location_ID` int(20) NOT NULL,
  `UserID` int(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `storageunit`
--

CREATE TABLE `storageunit` (
  `StorageID` int(20) NOT NULL,
  `ItemID` int(20) NOT NULL,
  `StorageLocationID` int(20) NOT NULL,
  `StorageName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(20) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Term` enum('Term1','Term2') NOT NULL,
  `Role` enum('Admin','RA','Staff') NOT NULL,
  `Identifier` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `UserName`, `Password`, `Term`, `Role`, `Identifier`, `Email`, `Address`) VALUES
(78865, 'Osborn', 'Mclawrence', 'omclawre', 'Grenada', 'Term1', 'Admin', '122345', 'omclaw@gmail.com', 'westerhall');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`ItemID`),
  ADD UNIQUE KEY `StorageID` (`StorageID`);

--
-- Indexes for table `storagelocation`
--
ALTER TABLE `storagelocation`
  ADD PRIMARY KEY (`Storage_Location_ID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `storageunit`
--
ALTER TABLE `storageunit`
  ADD PRIMARY KEY (`StorageID`),
  ADD UNIQUE KEY `StorageLocationID` (`StorageLocationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `ItemID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storagelocation`
--
ALTER TABLE `storagelocation`
  MODIFY `Storage_Location_ID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `storageunit`
--
ALTER TABLE `storageunit`
  MODIFY `StorageID` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78866;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
