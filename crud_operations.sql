-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2025 at 09:13 AM
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
  `empcode` int(11) DEFAULT NULL,
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
(440, 1, 'admin', '2024-12-13', '12:32:03', '11:49:36', '00:00:05', 'Present'),
(461, 1, 'admin', '2024-12-18', '10:08:16', '10:19:52', '00:11:36', 'Present'),
(519, 3, 'Ramu', '2024-12-19', '14:48:50', '00:00:00', '00:00:00', 'Present'),
(520, 17, 'ramana', '2024-12-19', '17:24:45', '00:00:00', '00:00:00', 'Present'),
(552, NULL, 'admin', '2024-12-23', '18:05:33', NULL, '00:00:00', 'Present'),
(553, 1, 'admin', '2024-12-23', '18:05:57', '18:15:03', '00:09:06', 'Present'),
(554, 1, 'admin', '2024-12-26', '10:11:30', '13:07:45', '02:56:15', 'Present'),
(557, 1, 'admin', '2024-12-28', '10:50:46', NULL, '00:00:00', 'Present'),
(559, 1, 'admin', '2024-12-30', '11:56:38', '11:56:44', '00:00:06', 'Present'),
(561, 1, 'admin', '2025-01-02', '11:16:38', NULL, '00:00:00', 'Present'),
(564, 1, 'admin', '2025-01-03', '12:35:11', '15:17:08', '02:41:57', 'Present'),
(567, NULL, 'A102', '2025-01-04', '10:49:35', NULL, '00:00:00', 'Present'),
(568, NULL, 'A102', '2025-01-04', '10:56:01', NULL, '00:00:00', 'Present'),
(569, NULL, 'A102', '2025-01-04', '10:56:05', NULL, '00:00:00', 'Present'),
(570, 1, 'admin', '2025-01-16', '12:00:37', NULL, '00:00:00', 'Present'),
(571, NULL, 'A102', '2025-01-16', '12:49:55', NULL, '00:00:00', 'Present'),
(572, NULL, 'A101', '2025-01-16', '12:55:57', NULL, '00:00:00', 'Present'),
(573, 1, 'admin', '2025-01-18', '10:53:54', '14:21:12', '03:27:18', 'Present'),
(575, 1, 'admin', '2025-07-09', '11:08:23', '11:08:31', '00:00:08', 'Present'),
(576, 2, 'Raju', '2025-07-09', '11:27:51', '11:28:01', '00:00:10', 'Present'),
(577, 15, 'Ram', '2025-07-09', '11:29:22', '00:00:00', '00:00:00', 'Present'),
(578, 17, 'ramana', '2025-07-10', '11:53:33', '11:54:06', '00:00:33', 'Present'),
(579, 2, 'Raju', '2025-07-10', '11:54:17', '11:55:12', '00:00:55', 'Present'),
(580, 14, 'Ramesh', '2025-07-10', '12:00:23', '00:00:00', '00:00:00', 'Present'),
(581, 16, 'ganesh', '2025-07-10', '12:01:55', '00:00:00', '00:00:00', 'Present'),
(582, 15, 'Ram', '2025-07-10', '12:02:11', '00:00:00', '00:00:00', 'Present'),
(583, 1, 'admin', '2025-07-10', '12:08:59', '12:09:12', '00:00:13', 'Present');

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
(3196, 'A100', '51', '2024-11-22 17:21:23', ''),
(3229, 'A103', '2', '2025-06-04 16:03:55', ''),
(3230, 'A103', '0200', '2025-06-04 16:03:55', ''),
(3231, 'A103', '4', '2025-06-04 16:03:55', ''),
(3232, 'A103', '41', '2025-06-04 16:03:55', ''),
(3233, 'A103', '5', '2025-06-04 16:03:55', ''),
(3234, 'A103', '51', '2025-06-04 16:03:55', ''),
(3235, 'A103', '6', '2025-06-04 16:03:55', ''),
(3236, 'A103', '61', '2025-06-04 16:03:55', '');

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
(69, 'ramu', '0a92f156f1c64ec9f8231b90da83e6eb', 'A102', 'Ramu@123'),
(71, '7207161882', 'fdf3ab3292c26a4a3a480c0b41bc7a3f', 'A103', 'Ramesh@123');

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
  `user` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `practice`
--

INSERT INTO `practice` (`id`, `empcode`, `name`, `email`, `mobile_number`, `gender`, `password`, `user`, `salary`) VALUES
(1, 'A100', 'admin', 'admin123@gmail.com', 7207161882, 'Male', 'Password@1', 'admin', 300000),
(2, 'A101', 'Raju', 'raju@gmail.com', 9887548798, 'Male', 'Raju@12345', '', 260000),
(3, 'A102', 'Ramu', 'ramu12@gmail.com', 9887542154, 'Male', 'Password@123', '', 350000),
(14, 'A103', 'Ramesh', 'ramesh12@gmail.com', 9887548787, 'Male', 'Ramesh@123', '', 250000),
(15, 'A104', 'Ram', 'ram12@gmail.com', 6587878787, 'Male', 'Ram@1234', '', 280000),
(16, 'A105', 'ganesh', 'ganesh12@gmail.com', 9885498985, 'Male', 'Ganesh#879', '', 340000),
(17, 'A106', 'ramana', 'ramana@gmail.com', 6554877898, 'Male', 'Ramana@123', '', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `salary_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `allowances` decimal(10,2) DEFAULT 0.00,
  `deductions` decimal(10,2) DEFAULT 0.00,
  `net_salary` decimal(10,2) GENERATED ALWAYS AS (`basic_salary` + `allowances` - `deductions`) STORED,
  `salary_month` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`salary_id`, `id`, `basic_salary`, `allowances`, `deductions`, `salary_month`) VALUES
(1, 1, 300000.00, 0.00, 0.00, 25000.00);

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
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`salary_id`),
  ADD KEY `id` (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;

--
-- AUTO_INCREMENT for table `hr_user`
--
ALTER TABLE `hr_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3237;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `emp_attendance`
--
ALTER TABLE `emp_attendance`
  ADD CONSTRAINT `emp_attendance_ibfk_1` FOREIGN KEY (`empcode`) REFERENCES `practice` (`id`);

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`id`) REFERENCES `practice` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
