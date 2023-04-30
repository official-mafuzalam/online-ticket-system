-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 12:01 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendsi_online_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `sell_ticket_history`
--

CREATE TABLE `sell_ticket_history` (
  `s_no` int(255) NOT NULL,
  `ticket_id` varchar(60) NOT NULL,
  `coach_no` varchar(60) NOT NULL,
  `coach_id` varchar(60) NOT NULL,
  `route` varchar(90) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(60) NOT NULL,
  `seat` varchar(30) NOT NULL,
  `fare` int(6) NOT NULL,
  `total_fare` int(6) NOT NULL,
  `station` varchar(60) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `insert_date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trip_status`
--

CREATE TABLE `trip_status` (
  `s_no` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `coach_no` varchar(60) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `date` varchar(60) NOT NULL,
  `time` varchar(60) NOT NULL,
  `route` varchar(255) NOT NULL,
  `station` text NOT NULL,
  `A1` int(1) NOT NULL DEFAULT 0,
  `A2` int(1) NOT NULL DEFAULT 0,
  `A3` int(1) NOT NULL DEFAULT 0,
  `A4` int(1) NOT NULL DEFAULT 0,
  `B1` int(1) NOT NULL DEFAULT 0,
  `B2` int(1) NOT NULL DEFAULT 0,
  `B3` int(1) NOT NULL DEFAULT 0,
  `B4` int(1) NOT NULL DEFAULT 0,
  `C1` int(1) NOT NULL DEFAULT 0,
  `C2` int(1) NOT NULL DEFAULT 0,
  `C3` int(1) NOT NULL DEFAULT 0,
  `C4` int(1) NOT NULL DEFAULT 0,
  `D1` int(1) NOT NULL DEFAULT 0,
  `D2` int(1) NOT NULL DEFAULT 0,
  `d3` int(1) NOT NULL DEFAULT 0,
  `d4` int(1) NOT NULL DEFAULT 0,
  `e1` int(1) NOT NULL DEFAULT 0,
  `e2` int(1) NOT NULL DEFAULT 0,
  `e3` int(1) NOT NULL DEFAULT 0,
  `e4` int(1) NOT NULL DEFAULT 0,
  `f1` int(1) NOT NULL DEFAULT 0,
  `f2` int(1) NOT NULL DEFAULT 0,
  `f3` int(1) NOT NULL DEFAULT 0,
  `f4` int(1) NOT NULL DEFAULT 0,
  `g1` int(1) NOT NULL DEFAULT 0,
  `g2` int(1) NOT NULL DEFAULT 0,
  `g3` int(1) NOT NULL DEFAULT 0,
  `g4` int(1) NOT NULL DEFAULT 0,
  `h1` int(1) NOT NULL DEFAULT 0,
  `h2` int(1) NOT NULL DEFAULT 0,
  `h3` int(1) NOT NULL DEFAULT 0,
  `h4` int(1) NOT NULL DEFAULT 0,
  `i1` int(1) NOT NULL DEFAULT 0,
  `i2` int(1) NOT NULL DEFAULT 0,
  `i3` int(1) NOT NULL DEFAULT 0,
  `i4` int(1) NOT NULL DEFAULT 0,
  `j1` int(1) NOT NULL DEFAULT 0,
  `j2` int(1) NOT NULL DEFAULT 0,
  `j3` int(1) NOT NULL DEFAULT 0,
  `j4` int(1) NOT NULL DEFAULT 0,
  `j5` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sell_ticket_history`
--
ALTER TABLE `sell_ticket_history`
  ADD PRIMARY KEY (`s_no`);

--
-- Indexes for table `trip_status`
--
ALTER TABLE `trip_status`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sell_ticket_history`
--
ALTER TABLE `sell_ticket_history`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_status`
--
ALTER TABLE `trip_status`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
