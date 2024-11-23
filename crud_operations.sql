-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2024 at 06:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_operations`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `first_name`, `username`, `password`) VALUES
(1, 'shiva', 'Ganesh', 'Ganesh123');

-- --------------------------------------------------------

--
-- Table structure for table `emp_attendance`
--

CREATE TABLE `emp_attendance` (
  `id` int(11) NOT NULL,
  `empcode` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `check_in_time` time NOT NULL,
  `check_out_time` time DEFAULT NULL,
  `work_hours` time NOT NULL,
  `status` enum('Present','Absent') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `emp_attendance`
--

INSERT INTO `emp_attendance` (`id`, `empcode`, `name`, `date`, `check_in_time`, `check_out_time`, `work_hours`, `status`) VALUES
(23, 1, '', '2024-11-22', '18:02:14', '18:02:43', '00:00:29', 'Present'),
(27, 1, '', '2024-11-23', '10:47:28', NULL, '00:00:00', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `hr_user`
--

CREATE TABLE `hr_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(10) NOT NULL,
  `menus` varchar(100) NOT NULL,
  `currentdate` datetime NOT NULL,
  `auth_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `hr_user`
--

INSERT INTO `hr_user` (`id`, `emp_id`, `menus`, `currentdate`, `auth_by`) VALUES
(3179, 'A102', '2', '2024-11-22 17:21:06', ''),
(3180, 'A102', '0200', '2024-11-22 17:21:06', ''),
(3181, 'A102', '4', '2024-11-22 17:21:06', ''),
(3182, 'A102', '41', '2024-11-22 17:21:06', ''),
(3183, 'A102', '5', '2024-11-22 17:21:06', ''),
(3184, 'A102', '51', '2024-11-22 17:21:06', ''),
(3185, 'A101', '2', '2024-11-22 17:21:14', ''),
(3186, 'A101', '0200', '2024-11-22 17:21:14', ''),
(3187, 'A101', '4', '2024-11-22 17:21:14', ''),
(3188, 'A101', '41', '2024-11-22 17:21:14', ''),
(3189, 'A101', '5', '2024-11-22 17:21:14', ''),
(3190, 'A101', '51', '2024-11-22 17:21:14', ''),
(3191, 'A100', '3', '2024-11-22 17:21:23', ''),
(3192, 'A100', '31', '2024-11-22 17:21:23', ''),
(3193, 'A100', '4', '2024-11-22 17:21:23', ''),
(3194, 'A100', '41', '2024-11-22 17:21:23', ''),
(3195, 'A100', '5', '2024-11-22 17:21:23', ''),
(3196, 'A100', '51', '2024-11-22 17:21:23', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(150) NOT NULL,
  `name1` varchar(200) NOT NULL,
  `passowrd` varchar(150) NOT NULL,
  `ename` varchar(200) NOT NULL,
  `pass1` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name1`, `passowrd`, `ename`, `pass1`) VALUES
(62, 'admin', 'd00f5d5217896fb7fd601412cb890830', 'A100', 'Password@123'),
(66, 'raju', '1ad9f189359e0797ccc7b3987efb2925', 'A101', 'Raju@123'),
(69, 'ramu', '0a92f156f1c64ec9f8231b90da83e6eb', 'A102', 'Ramu@123');

-- --------------------------------------------------------

--
-- Table structure for table `practice`
--

CREATE TABLE `practice` (
  `id` int(100) NOT NULL,
  `empcode` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_number` bigint(150) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `practice`
--

INSERT INTO `practice` (`id`, `empcode`, `name`, `email`, `mobile_number`, `gender`, `password`, `user`) VALUES
(1, 'A100', 'admin', 'admin123@gmail.com', 7207161882, 'Male', 'Password@1', 'admin'),
(2, 'A101', 'Raju', 'raju@gmail.com', 9887548798, 'Male', 'Raju@12345', 'admin'),
(3, 'A102', 'Ramu', 'ramu12@gmail.com', 9887542154, 'Male', 'Password@123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empcode` (`empcode`);

--
-- Indexes for table `hr_user`
--
ALTER TABLE `hr_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hr_user_1` (`emp_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `hr_user`
--
ALTER TABLE `hr_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3197;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD CONSTRAINT `emp_attendance_ibfk_1` FOREIGN KEY (`empcode`) REFERENCES `practice` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
