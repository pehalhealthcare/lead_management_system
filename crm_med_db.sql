-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2021 at 08:05 AM
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
-- Table structure for table `mk_lead_assign`
--

CREATE TABLE `mk_lead_assign` (
  `id` int(11) NOT NULL,
  `application_number` varchar(100) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `teamleader_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead_assign`
--

INSERT INTO `mk_lead_assign` (`id`, `application_number`, `agent_id`, `teamleader_id`, `created_at`) VALUES
(1, '1617958550', 3, 1, '2021-04-09 10:01:04'),
(2, '1617958550', 2, 1, '2021-04-09 12:37:47'),
(3, '1617958550', 4, 1, '2021-04-09 12:38:52');

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
(1, '1617958550', 'Testing', 'testing@gmail.com', '9791287056', 'qualified', 'Testing the data', 'unnamed.jpg', '2021-04-09 08:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `mk_lead_quotation`
--

CREATE TABLE `mk_lead_quotation` (
  `id` int(11) NOT NULL,
  `application_number` varchar(100) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `teamleader_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `item_price` varchar(100) NOT NULL,
  `item_tax` varchar(100) NOT NULL,
  `item_tax_amount` varchar(100) NOT NULL,
  `item_total_price` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead_quotation`
--

INSERT INTO `mk_lead_quotation` (`id`, `application_number`, `agent_id`, `teamleader_id`, `item_name`, `quantity`, `item_price`, `item_tax`, `item_tax_amount`, `item_total_price`, `created_at`) VALUES
(1, '1617958550', 0, 0, 'test', '1', '1111', '11', '122.21', '1233.21', '2021-04-09 11:40:40'),
(2, '1617958550', 0, 0, 'test', '1', '1111', '11', '122.21', '1233.21', '2021-04-09 11:41:02'),
(3, '1617958550', 3, 1, 'testing', '10', '1000', '18', '180', '1180', '2021-04-09 11:54:05'),
(4, '1617958550', 3, 1, 'testing', '10', '1000', '18', '180', '1180', '2021-04-09 11:54:33'),
(5, '1617958550', 3, 1, 'testing', '10', '1000', '18', '180', '1180', '2021-04-09 11:54:58'),
(6, '1617958550', 3, 1, 'testing', '10', '1000', '18', '180', '1180', '2021-04-09 11:55:05'),
(7, '1617958550', 3, 1, 'testing', '10', '1000', '18', '180', '1180', '2021-04-09 11:58:32'),
(8, '1617958550', 3, 1, 'testing', '10', '100', '10', '10', '110', '2021-04-09 11:59:00');

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
(1, 0, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '2', 'BTL', 0, '2021-04-09 09:45:56'),
(2, 1, 'arumugam', 'velou', 'IT', 'karthikvelou@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-09 10:37:28'),
(3, 1, 'velou', 'karthik', 'IT', 'karthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-09 10:37:23'),
(4, 1, 'rithik', 'karthik', 'IT', 'rithikkarthik@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-09 09:13:20'),
(5, 1, 'arun', 'kumar', 'IT', 'arunkumar@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-09 09:13:20'),
(6, 1, 'kumar', 'arun', 'IT', 'kumar@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-09 09:13:20'),
(7, 1, 'saravanan', 'kuppusamy', 'IT', 'saravanan@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, '2021-04-09 09:13:20');

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
-- Indexes for table `mk_lead_assign`
--
ALTER TABLE `mk_lead_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_data`
--
ALTER TABLE `mk_lead_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_quotation`
--
ALTER TABLE `mk_lead_quotation`
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
-- AUTO_INCREMENT for table `mk_lead_assign`
--
ALTER TABLE `mk_lead_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mk_lead_data`
--
ALTER TABLE `mk_lead_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_lead_quotation`
--
ALTER TABLE `mk_lead_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk_registration_table`
--
ALTER TABLE `mk_registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
