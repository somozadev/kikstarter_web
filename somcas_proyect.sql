-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2022 at 08:06 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `somcas_proyect`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donationsId` int(11) NOT NULL,
  `donationsAmount` double NOT NULL,
  `proyectsId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donationsId`, `donationsAmount`, `proyectsId`, `usersId`) VALUES
(1, 15000, 1, 2),
(2, 155000, 1, 2),
(3, 750000, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proyects`
--

CREATE TABLE `proyects` (
  `proyectsId` int(11) NOT NULL,
  `proyectsName` varchar(255) DEFAULT NULL,
  `proyectsGoal` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proyects`
--

INSERT INTO `proyects` (`proyectsId`, `proyectsName`, `proyectsGoal`) VALUES
(1, 'Rolls-Royce_Vision_100', 1750000),
(2, 'Vision_Next_100_de_BMW', 7500000),
(3, 'Mini_Vision_Next_100', 16000000),
(4, 'UPS_Flight_Forward', 3500000),
(5, 'EHang_184', 800000),
(6, 'Newron_Motors_EV-1', 140000),
(7, 'BST_Hypertek', 500000),
(8, 'BMW_Motorrad_Vision_Next_100', 8000000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersUsername` varchar(12) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersUsername`, `usersEmail`, `usersPwd`) VALUES
(1, 'xXAnaDestroy', 'anadestroyer@gmail.com', '$2y$10$K5ZsezsDGsd.WOv/sQRlL.7LegWPgTDSTLabM1ns57wmx8HnVKQRy'),
(2, 'admin', 'admin@gmail.com', '$2y$10$F8sfx6vTlHw0xXFo/hQ/V.xsa8XcUS6UG7ROh.rRo5hUgE.ihgPD.'),
(3, 'marcos', 'mesomoza@movistar.es', '$2y$10$/itQzmdyodh32nczfbkHierKgRMUAGhcHVhEKnjbkt2TP8mt6BUju');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donationsId`),
  ADD KEY `usersId` (`usersId`),
  ADD KEY `proyectsId` (`proyectsId`);

--
-- Indexes for table `proyects`
--
ALTER TABLE `proyects`
  ADD PRIMARY KEY (`proyectsId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donationsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `proyects`
--
ALTER TABLE `proyects`
  MODIFY `proyectsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `proyectsId` FOREIGN KEY (`proyectsId`) REFERENCES `proyects` (`proyectsId`),
  ADD CONSTRAINT `usersId` FOREIGN KEY (`usersId`) REFERENCES `users` (`usersId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
