-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 09:36 AM
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
  `station` varchar(60) NOT NULL,
  `mobile` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `insert_date_time` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_ticket_history`
--

INSERT INTO `sell_ticket_history` (`s_no`, `ticket_id`, `coach_no`, `coach_id`, `route`, `date`, `time`, `seat`, `station`, `mobile`, `name`, `gender`, `insert_date_time`) VALUES
(1, '644e1685480ac', '210', '79215', 'Dhaka - Gopalganj - Pirojpur', '2023-04-30', '06:00 AM', 'A1A2A3A4', ' Nazirpur - 600', '01747503257', 'MR. Mafuz Alam', 'Male', '2023-04-30 13:19:33.295229'),
(2, '644e16ad6876e', '210', '79215', 'Dhaka - Gopalganj - Pirojpur', '2023-04-30', '06:00 AM', 'B1', ' Pirojpur -700', '01751944774', 'Hemayetpur Counter', 'Male', '2023-04-30 13:20:13.428028'),
(3, '644e16f82722e', '210', '79215', 'Dhaka - Gopalganj - Pirojpur', '2023-04-30', '06:00 AM', 'B4', 'Muksudpur - 450', '01703154043', 'MS. Salma Begum', 'Female', '2023-04-30 13:21:28.160364');

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
-- Dumping data for table `trip_status`
--

INSERT INTO `trip_status` (`s_no`, `id`, `coach_no`, `status`, `date`, `time`, `route`, `station`, `A1`, `A2`, `A3`, `A4`, `B1`, `B2`, `B3`, `B4`, `C1`, `C2`, `C3`, `C4`, `D1`, `D2`, `d3`, `d4`, `e1`, `e2`, `e3`, `e4`, `f1`, `f2`, `f3`, `f4`, `g1`, `g2`, `g3`, `g4`, `h1`, `h2`, `h3`, `h4`, `i1`, `i2`, `i3`, `i4`, `j1`, `j2`, `j3`, `j4`, `j5`) VALUES
(1, '31733', '101', 1, '2023-04-30', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '21370', '110', 0, '2023-04-30', '08:30 AM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '63960', '130', 1, '2023-04-30', '12:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '21329', '150', 1, '2023-04-30', '04:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '57220', '170', 1, '2023-04-30', '08:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '60212', '180', 0, '2023-04-30', '10:30 PM', 'Dhaka - Gopalganj - Khulna', 'Muksudpur - 450, Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '79215', '210', 1, '2023-04-30', '06:00 AM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 1, 1, 1, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '85869', '230', 1, '2023-04-30', '10:00 AM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '23617', '250', 1, '2023-04-30', '02:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '96152', '280', 1, '2023-04-30', '08:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '79462', '310', 1, '2023-04-30', '06:15 AM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '70273', '335', 1, '2023-04-30', '11:15 AM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '9920', '380', 1, '2023-04-30', '08:15 PM', 'Dhaka - Gopalganj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '13465', '415', 1, '2023-04-30', '07:45 AM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, '9906', '445', 0, '2023-04-30', '01:45 PM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, '7394', '465', 0, '2023-04-30', '05:45 PM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, '37340', '470', 1, '2023-04-30', '09:45 PM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, '56081', '295', 1, '2023-04-30', '11:00 PM', 'Dhaka - Gopalganj - Pirojpur', 'Muksudpur - 450, Gopalgonj - 500, Patgati - 550, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `trip_status`
--
ALTER TABLE `trip_status`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
