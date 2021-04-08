-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 01:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_med_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mk_admin_login_table`
--

CREATE TABLE `mk_admin_login_table` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_admin_login_table`
--

INSERT INTO `mk_admin_login_table` (`id`, `firstname`, `lastname`, `department`, `email`, `mobile`, `password`, `profile`, `role`, `status`, `created_at`) VALUES
(1, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '1', 0, '2021-04-05 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `mk_categories`
--

CREATE TABLE `mk_categories` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mk_group_login_table`
--

CREATE TABLE `mk_group_login_table` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_group_login_table`
--

INSERT INTO `mk_group_login_table` (`id`, `firstname`, `lastname`, `department`, `email`, `mobile`, `password`, `profile`, `role`, `status`, `created_at`) VALUES
(1, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '1', 0, '2021-04-05 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `mk_lead_data`
--

CREATE TABLE `mk_lead_data` (
  `id` int(11) NOT NULL,
  `application_number` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `lead_call` varchar(50) NOT NULL,
  `reasons` text NOT NULL,
  `lead_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead_data`
--

INSERT INTO `mk_lead_data` (`id`, `application_number`, `fullname`, `email`, `mobile`, `lead_call`, `reasons`, `lead_image`, `created_at`) VALUES
(1, '1617864013', 'testing', 'testing@gmail.com', '9791256456', 'qualified', 'testing the reason', 'download3.jpeg', '2021-04-08 06:40:43'),
(2, '1617864061', 'testing', 'testing@gmail.com', '9791256456', 'qualified', 'testing the reason', 'download4.jpeg', '2021-04-08 06:41:03'),
(3, '1617864066', 'testing', 'testing@gmail.com', '9791256456', 'qualified', 'testing the reason', 'download5.jpeg', '2021-04-08 06:41:15'),
(4, '1617864253', 'testing', 'testing@gmail.com', '9791256456', 'qualified', 'testing the reason', 'download6.jpeg', '2021-04-08 06:44:17'),
(5, '1617864278', 'testing', 'testing@gmail.com', '9791256456', 'qualified', 'testing the reason', 'download7.jpeg', '2021-04-08 06:44:39'),
(6, '1617864790', 'testing', 'testing@gmail.com', '9789456', 'qualified', 'awearwaer', 'download.jpeg', '2021-04-08 06:53:32'),
(7, '1617864922', 'testing', 'testing@gmail.com', '9789456', 'qualified', 'awearwaer', 'download1.jpeg', '2021-04-08 06:55:24'),
(8, '1617879448', 'Testing', 'testing@gmail.com', '989875654', 'qualified', 'testing', 'logo_(1).jpg', '2021-04-08 11:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `mk_registration_table`
--

CREATE TABLE `mk_registration_table` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile` varchar(250) NOT NULL,
  `role` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_registration_table`
--

INSERT INTO `mk_registration_table` (`id`, `parent_id`, `firstname`, `lastname`, `department`, `email`, `mobile`, `password`, `profile`, `role`, `category`, `status`, `created_at`) VALUES
(1, 0, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '1', 'CA', 0, '2021-04-08 09:36:09'),
(2, 1, 'karthik', 'velou', 'IT', 'karthikvelou@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-08 09:57:07'),
(3, 1, 'karthik', 'velou', 'IT', 'karthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-08 09:57:11'),
(4, 1, 'rithik', 'karthik', 'IT', 'rithikkarthik@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'OA', 0, '2021-04-08 10:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `mk_reset_password_table`
--

CREATE TABLE `mk_reset_password_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `new_password` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mk_roles`
--

CREATE TABLE `mk_roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(100) NOT NULL,
  `categories` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_roles`
--

INSERT INTO `mk_roles` (`id`, `roles`, `categories`, `created_at`) VALUES
(1, 'Admin', 'Category A', '2021-04-06 09:22:32'),
(2, 'Admin', 'Category B', '2021-04-06 09:22:59'),
(3, 'Admin', 'Category C', '2021-04-06 09:23:08'),
(4, 'Group', 'Business Team Leader', '2021-04-08 10:32:26'),
(5, 'Group', 'Operation Team Leader', '2021-04-08 10:32:34'),
(6, 'Group', 'Business Agent', '2021-04-06 09:23:36'),
(7, 'Group', 'Operation Agent', '2021-04-06 09:23:36'),
(8, 'Admin', 'Category D', '2021-04-06 09:23:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mk_admin_login_table`
--
ALTER TABLE `mk_admin_login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_categories`
--
ALTER TABLE `mk_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_group_login_table`
--
ALTER TABLE `mk_group_login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_data`
--
ALTER TABLE `mk_lead_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_registration_table`
--
ALTER TABLE `mk_registration_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_reset_password_table`
--
ALTER TABLE `mk_reset_password_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_roles`
--
ALTER TABLE `mk_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mk_admin_login_table`
--
ALTER TABLE `mk_admin_login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_categories`
--
ALTER TABLE `mk_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mk_group_login_table`
--
ALTER TABLE `mk_group_login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_lead_data`
--
ALTER TABLE `mk_lead_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk_registration_table`
--
ALTER TABLE `mk_registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_reset_password_table`
--
ALTER TABLE `mk_reset_password_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mk_roles`
--
ALTER TABLE `mk_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
