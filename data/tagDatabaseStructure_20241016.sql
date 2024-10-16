-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 07:34 AM
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
  `timeslot` time NOT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `checkout_time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `student_name`, `student_number`, `storageunit_id`, `user_id`, `description`, `timeslot`, `departure_date`, `arrival_date`, `updated_at`, `checkout_time`) VALUES
(184, 'Jade Courtney', 'A00781071', 0, 0, '1 duffle bag', '05:00:00', '2024-12-12', '2025-01-07', '2024-09-26 23:17:09', ''),
(185, 'Susan Jeremiah', 'A004335645', 0, 0, '1 brown bag', '05:00:00', '2024-12-12', '2025-01-06', '2024-10-01 00:34:08', ''),
(186, 'Susan Jeremiah', 'A004335645', 0, 0, '1 blue hand bag', '05:15:00', '2024-12-12', '2025-01-06', '2024-10-01 00:34:57', ''),
(187, 'oz', '888888888', 47, 0, '1 black bag', '05:00:00', '2024-04-12', '2025-01-01', '2024-10-03 14:31:40', ''),
(188, 'Dan', '789456452', 49, 0, '1 brown bag', '07:00:00', '2024-04-12', '2025-04-01', '2024-10-03 14:45:42', ''),
(189, 'Osborn McLawrence', 'A00781071', 50, 0, '1 IGA bag', '05:00:00', '2024-12-12', '2025-01-02', '2024-10-14 12:31:17', '');

-- --------------------------------------------------------

--
-- Table structure for table `storagelocations`
--

CREATE TABLE `storagelocations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storagelocations`
--

INSERT INTO `storagelocations` (`id`, `user_id`, `name`, `address`, `updated_at`) VALUES
(12, 788099, 'Bromeiad ', '', '2024-09-26 18:17:32'),
(13, 788100, 'Eric Gary', '', '2024-09-26 18:28:21'),
(14, 788101, 'Pensick hall', '', '2024-09-26 20:21:18');

-- --------------------------------------------------------

--
-- Table structure for table `storageunits`
--

CREATE TABLE `storageunits` (
  `id` int(11) NOT NULL,
  `storagelocation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cage_name` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `storageunits`
--

INSERT INTO `storageunits` (`id`, `storagelocation_id`, `user_id`, `cage_name`, `updated_at`) VALUES
(51, 13, 788099, 'Cage 1', '2024-10-15 16:49:54'),
(52, 13, 788099, 'Cage 2', '2024-10-15 16:50:03'),
(53, 13, 788099, 'Cage 3', '2024-10-15 16:50:11'),
(54, 13, 788099, 'Cage 4', '2024-10-15 16:50:21'),
(55, 13, 788099, 'Cage 5', '2024-10-15 16:50:27'),
(56, 13, 788099, 'Cage 6', '2024-10-15 16:50:34'),
(57, 13, 788099, 'Cage 7', '2024-10-15 16:50:41'),
(58, 13, 788099, 'Cage 8', '2024-10-15 16:50:48'),
(59, 13, 788099, 'Cage 9', '2024-10-15 16:50:55'),
(60, 13, 788099, 'Cage 10', '2024-10-15 16:51:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','RA','Staff') NOT NULL,
  `id_number` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `role`, `id_number`, `email`) VALUES
(788099, 'Osborn', 'McLawrence', '$2y$10$VZA7HT3jUfG/s3hWv3mAuuKbZdK5L2KdWJszFw6ZRouJsPdY1VwOS', 'Admin', 'A00788072', 'omclawre@sgu.edu'),
(788100, 'Tonia', 'Julien', '$2y$10$NuraiftBcvRIBPh2ALIWn.Iyifb3/ElojBHGrujBaWU4bpU0N9XRm', 'Staff', 'A00741237', 'tstrewart@sgu.edu'),
(788101, 'Rockel', 'Nyack', '$2y$10$HXNeMN9vLz.1IHWcb4GTa.W7Ka/Wk1yK7iNoRM6eEnmtYC2XhST/a', 'RA', '78945612', 'Rnyack@sgu.edu'),
(788102, 'Kimani', 'Daniel', '$2y$10$PalRR7F1iKNKlybhPn3va.Ij5mI0RRSxDEJpSS2ahSaOncgR6Vrz.', 'Admin', 'A12345678', 'Kdaniel@sgu.edu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storageunit_id` (`storageunit_id`);

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
  ADD KEY `name` (`cage_name`),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `storagelocations`
--
ALTER TABLE `storagelocations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `storageunits`
--
ALTER TABLE `storageunits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=788103;

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
