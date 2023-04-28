-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 02:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `my_table`
--

CREATE TABLE `my_table` (
  `id` int(11) NOT NULL,
  `key_name` varchar(50) NOT NULL,
  `values_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `my_table`
--

INSERT INTO `my_table` (`id`, `key_name`, `values_list`) VALUES
(1, 'my_key', 'value1,value2,value3');

-- --------------------------------------------------------

--
-- Table structure for table `trip_status`
--

CREATE TABLE `trip_status` (
  `s_no` int(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `coach_no` varchar(60) NOT NULL,
  `date` varchar(60) NOT NULL,
  `time` varchar(60) NOT NULL,
  `route` varchar(255) NOT NULL,
  `station` text NOT NULL,
  `a1` int(1) NOT NULL DEFAULT 0,
  `a2` int(1) NOT NULL DEFAULT 0,
  `a3` int(1) NOT NULL DEFAULT 0,
  `a4` int(1) NOT NULL DEFAULT 0,
  `b1` int(1) NOT NULL DEFAULT 0,
  `b2` int(1) NOT NULL DEFAULT 0,
  `b3` int(1) NOT NULL DEFAULT 0,
  `b4` int(1) NOT NULL DEFAULT 0,
  `c1` int(1) NOT NULL DEFAULT 0,
  `c2` int(1) NOT NULL DEFAULT 0,
  `c3` int(1) NOT NULL DEFAULT 0,
  `c4` int(1) NOT NULL DEFAULT 0,
  `d1` int(1) NOT NULL DEFAULT 0,
  `d2` int(1) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_status`
--

INSERT INTO `trip_status` (`s_no`, `id`, `coach_no`, `date`, `time`, `route`, `station`, `a1`, `a2`, `a3`, `a4`, `b1`, `b2`, `b3`, `b4`, `c1`, `c2`, `c3`, `c4`, `d1`, `d2`, `d3`, `d4`, `e1`, `e2`, `e3`, `e4`, `f1`, `f2`, `f3`, `f4`, `g1`, `g2`, `g3`, `g4`, `h1`, `h2`, `h3`, `h4`, `i1`, `i2`, `i3`, `i4`, `j1`, `j2`, `j3`, `j4`, `j5`) VALUES
(1, '10000', '106', '28-04-2023', '06:00 AM', 'Dhaka - Gopalganj - Khulna', 'Gopalgonj - 500, Fakirhat - 600, Khulna - 700', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '100001', '110', '28-04-2023', '09:00 AM', 'Dhaka - Gopalganj - Pirojpur', 'Gopalgonj - 500, Bagerhat - 600, Pirojpur - 700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_table`
--
ALTER TABLE `my_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_status`
--
ALTER TABLE `trip_status`
  ADD PRIMARY KEY (`s_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_table`
--
ALTER TABLE `my_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip_status`
--
ALTER TABLE `trip_status`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
