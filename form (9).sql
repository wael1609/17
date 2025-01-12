-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:02 PM
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
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `carburant`
--

CREATE TABLE `carburant` (
  `date` date NOT NULL,
  `money` int(255) NOT NULL,
  `idu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carburant`
--

INSERT INTO `carburant` (`date`, `money`, `idu`) VALUES
('2024-04-16', 120, 1),
('2024-04-17', 128, 1),
('2024-04-18', 155, 1),
('2024-04-21', 99, 1),
('2024-04-03', 990, 1),
('2024-01-22', 990, 1),
('2024-03-13', 155, 1),
('2024-04-22', 80, 1),
('2024-04-08', 69, 1),
('2024-01-16', 1000, 1),
('2024-04-10', 200, 1),
('2024-04-11', 250, 1),
('2024-04-30', 141, 1),
('2024-05-03', 100, 5),
('2024-05-07', 127, 2),
('2024-04-13', 120, 2),
('2024-05-16', 155, 5),
('2024-05-23', 155, 2);

-- --------------------------------------------------------

--
-- Table structure for table `car_parts_declarations`
--

CREATE TABLE `car_parts_declarations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_part` varchar(255) NOT NULL,
  `declaration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_parts_declarations`
--

INSERT INTO `car_parts_declarations` (`id`, `user_id`, `car_part`, `declaration_date`) VALUES
(1, 1, 'Car cover', '2024-04-24 15:27:21'),
(2, 1, 'La pompe à eau', '2024-05-04 22:28:41'),
(3, 1, 'La courroie de distribution', '2024-05-07 12:09:19'),
(4, 5, 'La batterie', '2024-05-16 15:06:50'),
(5, 5, 'La courroie de distribution', '2024-05-16 17:09:16'),
(6, 5, 'La pompe à eau', '2024-05-16 17:21:57'),
(7, 2, 'Le vilebrequin', '2024-05-17 10:22:29'),
(8, 5, 'La culasse', '2024-05-17 14:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `feedback`, `created_at`) VALUES
(1, 1, 'aaa', '2024-05-12 01:32:15'),
(2, 1, 'qcc', '2024-05-12 01:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `immatriculations`
--

CREATE TABLE `immatriculations` (
  `id` int(11) NOT NULL,
  `registration_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `immatriculations`
--

INSERT INTO `immatriculations` (`id`, `registration_number`) VALUES
(1, 'ABC123'),
(2, 'DEF456'),
(3, 'GHI789'),
(4, '124tun222'),
(5, '124tun222222'),
(6, '124tun222');

-- --------------------------------------------------------

--
-- Table structure for table `lavage`
--

CREATE TABLE `lavage` (
  `id` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `done` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lavage`
--

INSERT INTO `lavage` (`id`, `idu`, `date`, `status`, `done`) VALUES
(2, 8, '2024-07-15', 'pending', 1),
(3, 5, '2024-05-25', 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_history`
--

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `recipient_id` int(11) DEFAULT NULL,
  `message_content` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `status` enum('read','unread') DEFAULT 'unread',
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `recipient_id`, `message_content`, `timestamp`, `status`, `admin_id`) VALUES
(1, NULL, NULL, 'aaa', '2024-04-24 19:33:51', 'unread', 0),
(2, NULL, NULL, 'testing\r\n', '2024-04-24 19:40:10', 'unread', 0),
(3, NULL, NULL, 'aa', '2024-04-24 19:56:58', 'unread', 0),
(4, NULL, NULL, 'aaa', '2024-04-24 19:59:44', 'unread', 0),
(5, NULL, NULL, 'aaaaa\r\n', '2024-04-24 20:08:53', 'unread', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idu` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'normal',
  `last_activity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idu`, `login`, `mdp`, `email`, `type`, `last_activity`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', NULL),
(3, 'meca', 'meca', 'meca', 'mecanicien', NULL),
(4, '1', '1', '1', 'admin', NULL),
(5, 'a', 'a', 'a', 'normal', NULL),
(6, 'aaaaaa', 'normal', 'aaa@aaa.com', 'abc', NULL),
(7, 'aaaaaaa', 'normal', 'asd@gmail.com', 'aaa', NULL),
(8, 'zz', 'zz', 'zz', 'lavage_agent', NULL),
(9, 'a', 'a', 'a', 'lavage_agent', NULL),
(10, 'm', 'm', 'm', 'mecano', NULL),
(11, 't', 't', 't', 'tech', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uuuu`
--

CREATE TABLE `uuuu` (
  `idu` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'normal',
  `last_activity` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uuuu`
--

INSERT INTO `uuuu` (`idu`, `login`, `mdp`, `email`, `type`, `last_activity`) VALUES
(1, 'a', 'a', 'aa', 'mecanicien', NULL),
(2, 'admin', 'admin', 'admin', 'mecanicien', NULL),
(3, 'meca', 'meca', 'meca', 'mecanicien', NULL),
(4, '1', '1', '1', 'mecanicien', NULL),
(5, 'a', 'a', 'a', 'mecanicien', NULL),
(6, 'aaaaaa', 'normal', 'aaa@aaa.com', 'mecanicien', NULL),
(7, 'aaaaaaa', 'normal', 'asd@gmail.com', 'mecanicien', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carburant`
--
ALTER TABLE `carburant`
  ADD KEY `fk_idu` (`idu`);

--
-- Indexes for table `car_parts_declarations`
--
ALTER TABLE `car_parts_declarations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `immatriculations`
--
ALTER TABLE `immatriculations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lavage`
--
ALTER TABLE `lavage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_utilisateurs_idu` (`idu`);

--
-- Indexes for table `login_history`
--
ALTER TABLE `login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `recipient_id` (`recipient_id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idu`),
  ADD KEY `idx_last_activity` (`last_activity`);

--
-- Indexes for table `uuuu`
--
ALTER TABLE `uuuu`
  ADD PRIMARY KEY (`idu`),
  ADD KEY `idx_last_activity` (`last_activity`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_parts_declarations`
--
ALTER TABLE `car_parts_declarations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `immatriculations`
--
ALTER TABLE `immatriculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lavage`
--
ALTER TABLE `lavage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_history`
--
ALTER TABLE `login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uuuu`
--
ALTER TABLE `uuuu`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carburant`
--
ALTER TABLE `carburant`
  ADD CONSTRAINT `fk_idu` FOREIGN KEY (`idu`) REFERENCES `uuuu` (`idu`);

--
-- Constraints for table `car_parts_declarations`
--
ALTER TABLE `car_parts_declarations`
  ADD CONSTRAINT `car_parts_declarations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uuuu` (`idu`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `uuuu` (`idu`);

--
-- Constraints for table `lavage`
--
ALTER TABLE `lavage`
  ADD CONSTRAINT `fk_utilisateurs_idu` FOREIGN KEY (`idu`) REFERENCES `utilisateurs` (`idu`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `uuuu` (`idu`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient_id`) REFERENCES `uuuu` (`idu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
