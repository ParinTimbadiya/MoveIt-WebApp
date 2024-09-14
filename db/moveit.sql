-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 07:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `moveit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `Amount` varchar(300) NOT NULL,
  `IsAccepted` varchar(300) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Id`, `Name`) VALUES
(1, 'Jamnagar'),
(2, 'Rajkot');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FromCityId` int(11) NOT NULL,
  `FromAddress` text NOT NULL,
  `ToCityId` int(11) NOT NULL,
  `ToAddress` text NOT NULL,
  `ImageName` varchar(300) NOT NULL,
  `Description` text NOT NULL,
  `IsCanceled` tinyint(1) NOT NULL DEFAULT 0,
  `IsCompleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Address` text NOT NULL,
  `MobileNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`Id`, `UserId`, `FullName`, `Address`, `MobileNumber`) VALUES
(1, 2, 'Parin ', 'Jamnagar', '9265188387'),
(2, 3, 'Kajal', 'Jamnagar', '9408255388'),
(5, 5, 'u', 'qwerty', '741258963'),
(6, 7, 'kp', 'rajkot', '1234567890'),
(7, 8, 'newuser', 'jamnagar', '9265188387'),
(8, 9, 'new', 'rajkot', '741852963'),
(9, 10, 'transporter steev', 'jamnagar', '7845123649');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Email`, `Password`, `Type`) VALUES
(1, 'admin@gmail.com', 'admin@123', 'Admin'),
(2, 'parin@gmail.com', 'parin@123', 'User'),
(3, 'kajal@gmail.com', 'kajal@123', 'Transporter'),
(5, 'u@gmail.com', 'u@123', 'user'),
(7, 'kp@gmail.com', 'kp@123', 'User'),
(8, 'user2@gmail.com', 'user2@123', 'User'),
(9, 'newuser2@gmail.com', 'newuser@123', 'User'),
(10, 'newtransporter@gmail.com', 'new@123', 'Transporter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FkUserIdInBids` (`UserId`),
  ADD KEY `FkJobIdInBids` (`JobId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FkUserIdInJobs` (`UserId`),
  ADD KEY `FkFromCityIdInJobs` (`FromCityId`),
  ADD KEY `FkToCityIdInJobs` (`ToCityId`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FkUserIdInProfiles` (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `FkJobIdInBids` FOREIGN KEY (`JobId`) REFERENCES `jobs` (`Id`),
  ADD CONSTRAINT `FkUserIdInBids` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `FkFromCityIdInJobs` FOREIGN KEY (`FromCityId`) REFERENCES `cities` (`Id`),
  ADD CONSTRAINT `FkToCityIdInJobs` FOREIGN KEY (`ToCityId`) REFERENCES `cities` (`Id`),
  ADD CONSTRAINT `FkUserIdInJobs` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `FkUserIdInProfiles` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`);
COMMIT;
