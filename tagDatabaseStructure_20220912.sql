-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 04:41 AM
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
  `departure_date` date NOT NULL,
  `arival_date` date NOT NULL,
  `period` varchar(60) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `storageunit_id`, `user_id`, `description`, `number_of_items`, `departure_date`, `arival_date`, `period`, `updated_at`) VALUES
(0, 'Testing', 1, 0, 'Black and White suitecase', 2, '2022-08-01', '2022-08-28', 'Term2', '2022-08-21 19:30:39'),
(1, 'Test Package 2', 2, 788072, 'General packing', 3, '2022-05-12', '2022-09-17', '', '2022-07-17 08:14:40'),
(2, 'Test package', 1, 1, 'General', 1, '2022-07-07', '2022-07-15', '', '2022-07-07 14:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `storagelocations`
--

CREATE TABLE `storagelocations` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storagelocations`
--

INSERT INTO `storagelocations` (`id`, `user_id`, `name`, `description`, `address`, `updated_at`) VALUES
(1, 1, 'Patrick Adams', 'Test location', 'Top Street', '2022-07-17 08:01:22'),
(2, 788072, 'High hills', 'red, blue and white', 'Grand Anse', '2022-07-17 07:58:49'),
(3, 788075, 'Eric Gary', 'white bag', 'Cherryhill', '2022-07-18 23:04:33'),
(4, 788080, 'Bamboo', 'Under the stairs', 'Grenville', '2022-08-21 22:45:08'),
(5, 788077, 'Secret harbor', 'left side', 'True Blue', '2022-08-21 23:02:35'),
(6, 788082, 'Pensick hall', 'added 1 black bag', 'Top hill', '2022-09-04 16:12:55'),
(7, 788088, 'Home', '1 box and 3 suitecases', 'TrueBlue campus', '2022-09-11 00:16:24'),
(8, 788087, 'Belmont', '', 'Grand Anse', '2022-09-11 00:26:11'),
(9, 788078, 'Industrial', '', 'Frequente', '2022-09-11 22:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `storageunits`
--

CREATE TABLE `storageunits` (
  `id` int(20) NOT NULL,
  `storagelocation_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `identifier` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storageunits`
--

INSERT INTO `storageunits` (`id`, `storagelocation_id`, `user_id`, `identifier`, `name`, `updated_at`, `description`) VALUES
(1, 1, 1, 'B001', 'Box1', '2022-08-21 23:11:37', ''),
(2, 2, 788072, '0012', 'Box2', '2022-07-17 08:04:13', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','RA','Staff') NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `identifier`, `address`, `email`) VALUES
(1, 'Osborn', 'Mclawrence', 'omclawre', 'Grenada', 'Admin', '1223456', 'Westerhall', 'omclaw@gmail.com'),
(788072, 'Clifford', 'Bostros', 'CliffBostros', '', 'RA', '8072', 'St.Pauls', 'Cliffbos@sgu.edu'),
(788073, 'Alisha', 'Joseph', 'Alijoseph', 'Grenada0209', 'RA', '0012', 'St.David', 'Jadegc1@gmail.com'),
(788074, 'Susan', 'Joseph', 'Alijoseph1', 'Grenada02093', 'RA', '0012', 'St.David', 'Jadegc12@gmail.com'),
(788075, 'Jason', 'Matthew', 'JasonMat', 'Jasonmat1', 'Staff', '142', 'Cherryhill', 'jasonmat@sgu.edu'),
(788076, 'Marvin', 'Hosten', 'marvinhostem', 'Marvinhosten', 'Admin', '13', 'Gouyave', 'marvinhosten@gmail.com'),
(788077, 'Steven', 'john', 'stevenjohn', 'Grenada0209', 'RA', '15', 'St.Georges', 'stevenjohn@gmail.com'),
(788078, 'Maya', 'Charles', 'mayacharles', 'maycharles123', 'Admin', '7894', 'St.Patrick', 'mayacourt@gmail.com'),
(788080, 'Kimani', 'Daniel', 'KimaniDan', '$2y$10$sQNhxfHrQUue4', 'Staff', '569', 'Grenville', 'KimaniDan@sgu.edu'),
(788082, 'John', 'Joseph', 'johnjo', '$2y$10$arvR5nM6tvlCk', '', 'A00788072', 'Petite Bacaye', 'johnso@sgu.edu'),
(788083, 'Mary', 'John', 'maryjohn', '$2y$10$Y4E8q2G6Igb6O', 'Staff', 'A00988097', 'St.Georges', 'mayjohn@sgu.edu'),
(788084, 'Alisa', 'Lewis', 'alislew', '$2y$10$6UywwcHHzciNm', '', 'A00988097', 'Rose hill', 'alisalewis@sgu.edu'),
(788085, 'osborn', 'Mclawrence', 'osmclaw', '$2y$10$lKrUkQUHCSyiOIhm3JoLiOhCJrKrDCEaG9Lh2YDtZyiEwDnwfBR4S', 'Staff', 'A00788072', 'Westerhall', 'omclawre@sgu.edu'),
(788086, 'Sheldon', 'Drakes', 'sheldondrakes', '$2y$10$r.bzcT3VKdty/odu0OiineR5s9bAIsvMZ7qNg.//VGVRtFMPkfFzy', 'Staff', 'A00988098', 'St.Pauls', 'sheldondrakes@sgu.edu'),
(788087, 'Francis', 'Joseph', 'josephma', '$2y$10$DW/k3/dLa/IObzJO0021/ejqdHEixu6kjPYZ64OYAPm/wuZQMzNMa', 'Staff', 'A00988098', 'Westerhall', 'josh@sgu.edu'),
(788088, 'Mary', 'Celestine', 'maryceles', '$2y$10$JuYzwfpF35QR3wdZIkT.seHswbND/6DpxnALIaGTduW7p5AQBeKxW', 'Staff', 'A00788973', 'St. Patricks', 'marycelestine@sgu.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `storageunits`
--
ALTER TABLE `storageunits`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788089;

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
  ADD CONSTRAINT `Storage_location` FOREIGN KEY (`storagelocation_id`) REFERENCES `storagelocations` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `storageunits_ibfk_1` FOREIGN KEY (`id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
