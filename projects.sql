-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2023 at 12:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_email`, `password`) VALUES
('admin@ajtravels.in', '56257575');

-- --------------------------------------------------------

--
-- Table structure for table `admin_message`
--

CREATE TABLE `admin_message` (
  `admin_email` varchar(100) NOT NULL,
  `admin_messages` varchar(1000) NOT NULL,
  `admin_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_message`
--

INSERT INTO `admin_message` (`admin_email`, `admin_messages`, `admin_time`) VALUES
('admin@ajtravels.in', 'hi sir this ajay fron your help desk panel ', '2023-10-09 04:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `bus_detail`
--

CREATE TABLE `bus_detail` (
  `owner_name` varchar(100) NOT NULL,
  `bus_name` varchar(100) NOT NULL,
  `bus_number` varchar(100) NOT NULL,
  `rc_number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus_detail`
--

INSERT INTO `bus_detail` (`owner_name`, `bus_name`, `bus_number`, `rc_number`) VALUES
('AJAY', 'ROYAL -Travels', 'TN-39-AB-1215', 'abcgdt327'),
('DHARWES ', 'AK -Travels', 'TN-39-AB-1444', 'abcgdt327uvhd bi1l'),
('AJAY', 'SRS -Travels', 'TN-39-AB-1213', 'abcgdteyajd3271'),
('AJAY ', 'AK -Travels', 'TN-39-AB-1212', 'abcgdteyajd3271anbns'),
('Vimal', 'ROYAL -Travels', 'TN-39-AB-1987', 'oafonoabdf ILvB');

-- --------------------------------------------------------

--
-- Table structure for table `client_message`
--

CREATE TABLE `client_message` (
  `user_email` varchar(100) NOT NULL,
  `user_message` varchar(1000) NOT NULL,
  `user_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_message`
--

INSERT INTO `client_message` (`user_email`, `user_message`, `user_time`) VALUES
('ajayphj5625@gmail.com', 'ok i am accepting ', '2023-10-07 08:30:00'),
('ajayphj5625@gmail.com', 'ok i am accepting ', '2023-10-07 08:30:05'),
('ajayphj5625@gmail.com', 'hi', '2023-10-09 03:59:28'),
('ajayphj5625@gmail.com', 'is there any admin available here ', '2023-10-09 03:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `razorpay_payment_id` int(200) NOT NULL,
  `price` int(100) NOT NULL,
  `status` varchar(200) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `user_email` varchar(100) NOT NULL,
  `passenger_name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger_info`
--

INSERT INTO `passenger_info` (`user_email`, `passenger_name`, `gender`, `age`) VALUES
('ajayphj5625@gmail.com', 'AjayKumar', 'Female', '29');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `user_name`, `user_email`, `gender`, `user_phone`, `user_password`) VALUES
(10, 'AjayKumar', 'ajaykumar@gmail.com', 'Male', '9944640017', 'Ajay@5625');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_info`
--

CREATE TABLE `ticket_info` (
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `ticket_date` varchar(100) NOT NULL,
  `user_issue` varchar(100) NOT NULL,
  `user_problem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_info`
--

INSERT INTO `ticket_info` (`user_name`, `user_email`, `gender`, `user_phone`, `ticket_date`, `user_issue`, `user_problem`) VALUES
('Ajay', 'ajayphj5625@gmail.com', 'Male', '7397546519', '24022023', 'Change Passenger information', 'jiji');

-- --------------------------------------------------------

--
-- Table structure for table `travel_info`
--

CREATE TABLE `travel_info` (
  `user_from` varchar(100) NOT NULL,
  `user_to` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `travel_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_info`
--

INSERT INTO `travel_info` (`user_from`, `user_to`, `user_phone`, `travel_date`) VALUES
('Tiruppur', 'Coimbatore', '7397546519', '24-01-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '26-01-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '10-10-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '26-01-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '26-01-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '26-01-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '26-01-2023'),
('Tiruppur', 'Coimbatore', '7397546519', '26-01-2023'),
('Tiruppur', 'coimbatore', '9289813640', '26-01-2023'),
('Tiruppur', 'Coimbatore', '9289813640', '26-01-2023'),
('Tiruppur', 'Coimbatore', '2989828345', '10-10-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus_detail`
--
ALTER TABLE `bus_detail`
  ADD PRIMARY KEY (`rc_number`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
