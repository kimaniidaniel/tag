-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2022 at 01:26 AM
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
  `id` int(11) NOT NULL,
  `student_name` varchar(60) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `storageunit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `number_of_items` int(11) NOT NULL,
  `timeslot` time NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `student_name`, `student_number`, `storageunit_id`, `user_id`, `description`, `number_of_items`, `timeslot`, `departure_date`, `arrival_date`, `updated_at`) VALUES
(39, 'Nicholas Maida', 'A01037269', 11, 788087, 'I red bag and 2 blue suite case', 3, '05:30:00', '2022-12-15', '2023-01-04', '2022-10-29 21:43:31'),
(40, 'Tiffany Coke', 'A00466442', 10, 788087, '1 black suite case', -1, '05:00:00', '2022-12-08', '2023-01-04', '2022-10-29 17:52:17'),
(42, 'Ryan Bailey', 'A01067698', 10, 788086, '1 black suite case', 1, '06:00:00', '2022-12-18', '2023-01-02', '2022-10-29 22:11:54'),
(43, 'Ryan Chahal', 'A01027424', 0, 0, '1 black bag and 2 red suite cases', 3, '05:45:00', '2022-12-14', '2023-01-01', '2022-10-29 22:15:49'),
(44, 'Juan Choi', 'A01064156', 0, 0, '2 black suite cases, 3 duffle bag, 1 brown box, 2 IGA bags', 8, '07:00:00', '2022-12-15', '2023-01-04', '2022-10-29 22:27:48'),
(47, 'Aeola Benjamin', 'A01044904', 0, 0, '1 small box', 1, '06:00:00', '2022-12-12', '2023-01-04', '2022-10-29 23:11:01'),
(48, 'Che Bowen', 'A00910134', 12, 0, '1 brown box', 1, '06:00:00', '2022-12-15', '2023-01-16', '2022-10-29 23:49:27');

-- --------------------------------------------------------

--
-- Table structure for table `storagelocations`
--

CREATE TABLE `storagelocations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storagelocations`
--

INSERT INTO `storagelocations` (`id`, `user_id`, `name`, `description`, `address`, `updated_at`) VALUES
(6, 788090, 'Pensick', '', '', '2022-10-22 22:05:36'),
(7, 788086, 'Eric Gary', '', '', '2022-10-22 22:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `storageunits`
--

CREATE TABLE `storageunits` (
  `id` int(11) NOT NULL,
  `storagelocation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `identifier` varchar(60) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storageunits`
--

INSERT INTO `storageunits` (`id`, `storagelocation_id`, `user_id`, `identifier`, `name`, `updated_at`) VALUES
(9, 7, 788090, '', 'Cage 1', '2022-10-22 22:48:29'),
(10, 7, 788086, '', 'Cage 2', '2022-10-24 23:15:39'),
(11, 7, 788086, '', 'Cage 3', '2022-10-29 04:21:14'),
(12, 7, 788087, '', 'Cage 4', '2022-10-29 17:18:35'),
(13, 7, 788087, '', 'Cage 3', '2022-10-29 17:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','RA','Staff') NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `role`, `id_number`, `address`, `email`) VALUES
(788086, 'Khalil', 'John', '', '$2y$10$CN1YIwZI.SHNKPZ79./9Yuk1XKY2d1JnoOvwl1H6KNwlBQPyIIQXa', 'RA', 'A00788562', '', 'khalil@sgu.edu'),
(788087, 'Frank', 'Moses', '', '$2y$10$FjtvAZFXSAXy83MuK8T9g.eEnJVKRuIomES1uFz0qXVNg5mdo8pG.', 'Staff', 'A00788567', '', 'frankmos@sgu.edu'),
(788088, 'Osborn', 'McLawrence', '', '$2y$10$qp83Lt80HboQvARr1yzJOOmevWPCPVx3UjU2PxLUThMdmwJO4qJV2', 'Admin', 'A00788072', '', 'omclawre@sgu.edu'),
(788090, 'Kim', 'Dam', '', '$2y$10$g3z.CmHwfdOzdr.JrSJmEers8VL9.0IgHjp9Fw1dqfwhTjpJKmjg2', 'Staff', 'A00788589', '', 'kimdan@sgu.edu'),
(788091, 'Tonia', 'Strewart', '', '$2y$10$RCik2ZeAbiEKJyS7TIvKbOVnyM4W5pF.b5p4ONoqiWhItjAkpn4T6', '', 'A00605171', '', 'tstewart@sgu.edu');

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
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `storagelocations`
--
ALTER TABLE `storagelocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `storageunits`
--
ALTER TABLE `storageunits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788092;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `storageunits`
--
ALTER TABLE `storageunits`
  ADD CONSTRAINT `Storage_location` FOREIGN KEY (`storagelocation_id`) REFERENCES `storagelocations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
