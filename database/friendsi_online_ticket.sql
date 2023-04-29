-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2023 at 10:41 AM
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
-- Table structure for table `my_table`
--

CREATE TABLE `my_table` (
  `id` int(11) NOT NULL,
  `key_name` varchar(50) NOT NULL,
  `values_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_table`
--

INSERT INTO `my_table` (`id`, `key_name`, `values_list`) VALUES
(1, 'my_key', 'value1,value2,value3');

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
(1, '644cd29143261', '101', '68486', 'Dhaka - Gopalganj - Khulna', '2023-04-29', '06:30 AM', 'A1', 'Gopalgonj - 500', '01747503257', 'MR. Mafuz Alam', 'Male', '2023-04-29 14:17:21.275203'),
(2, '644cd354883cf', '310', '55884', 'Dhaka - Gopalganj - Kotalipara', '2023-04-29', '09:30 AM', 'A3', ' Kotalipara - 600', '01751944774', 'MR. Titumir', 'Male', '2023-04-29 14:20:36.558167'),
(3, '644cd371f1931', '310', '55884', 'Dhaka - Gopalganj - Kotalipara', '2023-04-29', '09:30 AM', 'A4', 'Gopalgonj - 500', '01918851337', 'MR. Titumir', 'Male', '2023-04-29 14:21:05.989632'),
(4, '644cd38a49823', '310', '55884', 'Dhaka - Gopalganj - Kotalipara', '2023-04-29', '09:30 AM', 'B4', 'Gopalgonj - 500', '01718298564', 'MR. Titumir', 'Male', '2023-04-29 14:21:30.301127'),
(5, '644cd4223e7c4', '410', '57083', 'Dhaka - Vatiyapara - Narail', '2023-04-29', '09:00 AM', 'A3', 'Vatiyapara - 450', '01621833839', 'MR. Suvo', 'Male', '2023-04-29 14:24:02.256017'),
(6, '644cd43715d94', '410', '57083', 'Dhaka - Vatiyapara - Narail', '2023-04-29', '09:00 AM', 'B4', ' Narail - 550', '01747503257', 'MR. Mafuz Alam', 'Female', '2023-04-29 14:24:23.089556');

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
(1, '10000', '106', 0, '28-04-2023', '06:00 AM', 'Dhaka - Gopalganj - Khulna', 'Gopalgonj - 500, Fakirhat - 600, Khulna - 700', 0, 0, 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '100001', '110', 0, '28-04-2023', '09:00 AM', 'Dhaka - Gopalganj - Pirojpur', 'Gopalgonj - 500, Bagerhat - 600, Pirojpur - 700', 1, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '100009', '205', 0, '28-04-2023', '09:00 PM', 'Dhaka - Gopalgonj - Kotalipara', 'Muksudpur - 450, Gopalgonj - 500, Kotalipara - 550', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '32339', '101', 0, '2023-04-29', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Gopalgonj - 500, Fakirhat - 600, Khulna -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, '68486', '101', 1, '2023-04-29', '06:30 AM', 'Dhaka - Gopalganj - Khulna', 'Gopalgonj - 500, Fakirhat - 600, Khulna -700', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, '20054', '210', 1, '2023-04-29', '07:30 AM', 'Dhaka - Gopalganj - Pirojpur', 'Gopalgonj - 500, Nazirpur - 600, Pirojpur -700', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '55884', '310', 1, '2023-04-29', '09:30 AM', 'Dhaka - Gopalganj - Kotalipara', 'Gopalgonj - 500, Kotalipara - 600', 0, 0, 1, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '57083', '410', 1, '2023-04-29', '09:00 AM', 'Dhaka - Vatiyapara - Narail', 'Vatiyapara - 450, Narail - 550', 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_table`
--
ALTER TABLE `my_table`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `my_table`
--
ALTER TABLE `my_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sell_ticket_history`
--
ALTER TABLE `sell_ticket_history`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip_status`
--
ALTER TABLE `trip_status`
  MODIFY `s_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
