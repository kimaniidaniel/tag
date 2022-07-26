-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2022 at 09:39 AM
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
  `id` int(20) NOT NULL,
  `name` varchar(60) NOT NULL,
  `storageunit_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `number_of_items` int(20) NOT NULL,
  `arival_date` date NOT NULL,
  `departure_date` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `period` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `storageunit_id`, `user_id`, `description`, `number_of_items`, `arival_date`, `departure_date`, `updated_at`, `period`) VALUES
(1, 'Test package', 1, 1, 'General', 1, '2022-07-15', '2022-07-07', '2022-07-07 14:11:18', ''),
(0, 'Test Package 2', 2, 788072, 'General packing', 3, '2022-09-17', '2022-05-12', '2022-07-17 08:14:40', '');

-- --------------------------------------------------------

--
-- Table structure for table `storagelocations`
--

CREATE TABLE `storagelocations` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storagelocations`
--

INSERT INTO `storagelocations` (`id`, `user_id`, `name`, `address`, `description`, `updated_at`) VALUES
(1, 1, 'Patrick Adams', 'Top Street', 'Test location', '2022-07-17 08:01:22'),
(2, 788072, 'High hills', 'Grand Anse', 'red, blue and white', '2022-07-17 07:58:49'),
(3, 788075, 'Eric Gary', 'Cherryhill', 'white bag', '2022-07-18 23:04:33');

-- --------------------------------------------------------

--
-- Table structure for table `storageunits`
--

CREATE TABLE `storageunits` (
  `id` int(20) NOT NULL,
  `storagelocation_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `identifier` varchar(60) NOT NULL,
  `user_id` int(20) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storageunits`
--

INSERT INTO `storageunits` (`id`, `storagelocation_id`, `name`, `identifier`, `user_id`, `updated_at`) VALUES
(1, 1, 'Box1', 'BO01', 1, '2022-07-07 10:54:47'),
(2, 2, 'Box2', '0012', 788072, '2022-07-17 08:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` enum('Admin','RA','Staff') NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `identifier`, `email`, `address`) VALUES
(1, 'Osborn', 'Mclawrence', 'omclawre', 'Grenada', 'Admin', '1223456', 'omclaw@gmail.com', 'westerhall'),
(788072, 'Clifford', 'Bostros', 'CliffBostros', '', 'RA', '8072', 'Cliffbos@sgu.edu', 'St.Pauls'),
(788073, 'Alisha', 'Joseph', 'Alijoseph', 'Grenada0209', 'RA', '0012', 'Jadegc1@gmail.com', 'St.David'),
(788074, 'Susan', 'Joseph', 'Alijoseph1', 'Grenada02093', 'RA', '0012', 'Jadegc12@gmail.com', 'St.David'),
(788075, 'Jason', 'Matthew', 'JasonMat', 'Jasonmat1', 'Staff', '142', 'jasonmat@sgu.edu', 'Cherryhill'),
(788076, 'Marvin', 'Hosten', 'marvinhostem', 'Marvinhosten', 'Admin', '13', 'marvinhosten@gmail.com', 'Gouyave'),
(788077, 'Steven', 'john', 'stevenjohn', 'Grenada0209', 'RA', '15', 'stevenjohn@gmail.com', 'St.Georges'),
(788078, 'Maya', 'Charles', 'mayacharles', 'maycharles123', 'Admin', '7894', 'mayacourt@gmail.com', 'St.Patrick');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `storagelocations`
--
ALTER TABLE `storagelocations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`user_id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `id` (`id`,`user_id`);

--
-- Indexes for table `storageunits`
--
ALTER TABLE `storageunits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `StorageLocationID` (`storagelocation_id`),
  ADD KEY `id` (`id`,`storagelocation_id`,`user_id`),
  ADD KEY `storage_location_id` (`storagelocation_id`,`user_id`),
  ADD KEY `name` (`name`),
  ADD KEY `storagelocation_id` (`storagelocation_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `storagelocations`
--
ALTER TABLE `storagelocations`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `storageunits`
--
ALTER TABLE `storageunits`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788079;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `storagelocations`
--
ALTER TABLE `storagelocations`
  ADD CONSTRAINT `assigned_userid_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `storageunits`
--
ALTER TABLE `storageunits`
  ADD CONSTRAINT `Storage_location` FOREIGN KEY (`storagelocation_id`) REFERENCES `storagelocations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
