-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 11:15 AM
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
-- Table structure for table `mk_activity`
--

CREATE TABLE `mk_activity` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `assigned_to` varchar(50) DEFAULT NULL,
  `activity_master_id` int(11) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `direction` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `communication_preferred` varchar(200) DEFAULT NULL,
  `lead_possibility` varchar(250) DEFAULT NULL,
  `related_to` varchar(50) DEFAULT NULL,
  `related_to_other` varchar(50) DEFAULT NULL,
  `start_date_time` varchar(50) DEFAULT NULL,
  `end_date_time` varchar(50) DEFAULT NULL,
  `reminder` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `from_add` varchar(250) DEFAULT NULL,
  `to_add` varchar(250) DEFAULT NULL,
  `cc` varchar(250) DEFAULT NULL,
  `bcc` varchar(250) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_activity`
--

INSERT INTO `mk_activity` (`id`, `lead_id`, `assigned_to`, `activity_master_id`, `subject`, `direction`, `status`, `communication_preferred`, `lead_possibility`, `related_to`, `related_to_other`, `start_date_time`, `end_date_time`, `reminder`, `description`, `location`, `from_add`, `to_add`, `cc`, `bcc`, `body`, `is_active`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 1, 'Karthik', 1, 'Schedule Meeting', NULL, 'Planned', NULL, NULL, 'contact', NULL, '13-05-2021', '05/15/2021', '1', 'Schedule Meeting is Updated', 'Chennai', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-13 21:40:13', NULL, NULL),
(2, 1, 'mayank', 2, 'Testing', 'Outbound', 'Held', 'email', 'qualified', 'Abishek', NULL, '15-05-2021', NULL, '1', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-12 21:27:16', NULL, NULL),
(3, 1, NULL, 3, 'Testing', NULL, NULL, NULL, NULL, 'abishek', NULL, NULL, NULL, NULL, NULL, NULL, 'veloukarthik@gmail.com', 'onlineguruweb@gmail.com', '', '', '<p>Testing</p>', 1, 1, '2021-05-12 21:28:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_activity_attachments`
--

CREATE TABLE `mk_activity_attachments` (
  `id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mk_activity_master`
--

CREATE TABLE `mk_activity_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_activity_master`
--

INSERT INTO `mk_activity_master` (`id`, `name`, `created_by`, `created_at`, `modified_by`, `modified_at`, `is_active`) VALUES
(1, 'Schedule Meeting', 1, '2021-05-08 09:04:44', NULL, NULL, 1),
(2, 'Log Call', 1, '2021-05-08 09:05:26', NULL, NULL, 1),
(3, 'Compose Email', 1, '2021-05-08 09:05:53', NULL, NULL, 1);

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
  `category` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_admin_login_table`
--

INSERT INTO `mk_admin_login_table` (`id`, `firstname`, `lastname`, `department`, `email`, `mobile`, `password`, `profile`, `role`, `category`, `status`, `created_at`) VALUES
(1, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '1', 'Admin', 0, '2021-05-15 10:16:41');

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
-- Table structure for table `mk_customer`
--

CREATE TABLE `mk_customer` (
  `customer_id` int(11) NOT NULL,
  `prefix` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `alternate_mobile` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_customer`
--

INSERT INTO `mk_customer` (`customer_id`, `prefix`, `name`, `email`, `mobile`, `alternate_mobile`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'Mr', 'Karthik', 'veloukarthik@gmail.com', '9791287056', '9344751727', 1, '2021-04-26 18:30:00', 1, NULL, 0),
(2, 'Mr', 'Rithik', 'rithik@gmail.com', '9344751727', '9791287056', 1, '2021-04-26 18:30:00', 1, NULL, 0),
(3, 'Mr', 'Mayank', 'mayank@gmail.com', '1234567890', '9876543210', 1, '2021-04-26 18:30:00', 1, NULL, 0),
(5, 'Mr', 'Velou', 'velou@gmail.com', '9894792083', '9894792083', 1, '2021-04-26 18:30:00', 1, NULL, 0),
(6, 'Mr', 'sheetal', 'sheetal@pehal.com', '989456221232', '9884546623', 1, '2021-04-23 18:30:00', 1, NULL, 0),
(7, 'Mr', 'Abishek', 'abishek@gmail.com', '9876543210', '9876543210', 1, '2021-04-23 18:30:00', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mk_customer_address`
--

CREATE TABLE `mk_customer_address` (
  `address_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address_1` text NOT NULL,
  `address_2` text NOT NULL,
  `address_3` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(150) NOT NULL,
  `zip` varchar(150) NOT NULL,
  `country` varchar(150) DEFAULT NULL,
  `is_primary` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_customer_address`
--

INSERT INTO `mk_customer_address` (`address_id`, `customer_id`, `address_1`, `address_2`, `address_3`, `city`, `state`, `zip`, `country`, `is_primary`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 'Pondicherry', 'Pondicherry ffff', 'Pondicherry', 'Pondicherry', 'Pondicherry', '605001', NULL, 1, 0, '2021-04-27 07:11:50', 1, NULL, 0),
(2, 2, 'Puduvai', 'Puducherry', 'Puducherry', 'Pondicherry', 'Pondicherry', '605010', NULL, 1, 0, '2021-04-27 07:10:38', 1, NULL, 0),
(3, 3, 'Delhi', 'Delhi', 'India', 'Indira Nagar', 'New Delhi', '50001', NULL, 1, 0, '2021-04-27 07:11:58', 1, NULL, 0),
(4, 4, '', '', '', '', '', '', NULL, 1, 0, '2021-04-23 22:32:02', 1, NULL, 0),
(5, 5, 'Pondy', 'Pondicherry', 'Pondicherry', 'Pondicherry', 'Pondicherry', '605001', NULL, 1, 0, '2021-04-27 07:12:06', 1, NULL, 0),
(6, 6, 'England', 'London', 'Hamster', 'London', 'Bukkinghom Palace', '123456978', NULL, 1, 0, '2021-04-23 19:44:57', 1, NULL, 0),
(7, 7, 'Delhi', 'Delhi', 'Delhi', 'Delhi', 'Delhi', '1200255', NULL, 1, 0, '2021-04-23 21:37:37', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mk_customer_item`
--

CREATE TABLE `mk_customer_item` (
  `customer_item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `unit_price` varchar(200) NOT NULL,
  `selling_unit_price` varchar(50) DEFAULT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `total_price` varchar(200) NOT NULL,
  `tax_rate` varchar(200) NOT NULL,
  `tax_amount` varchar(200) NOT NULL,
  `total_amount` varchar(200) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_customer_item`
--

INSERT INTO `mk_customer_item` (`customer_item_id`, `customer_id`, `lead_id`, `product_id`, `purchase_order_id`, `item_id`, `quantity`, `unit_price`, `selling_unit_price`, `selling_price`, `total_price`, `tax_rate`, `tax_amount`, `total_amount`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 2, 1, 1, NULL, 1, '100', '200', '100', '89', '9968', '12', '1068', NULL, 1, '2021-05-20 05:43:58', 1, '2021-05-20 09:11:17', NULL),
(2, 2, 1, 1, NULL, 4, '100', '100', '50', '43', '4988', '16', '688', NULL, 1, '2021-05-20 05:44:27', 1, '2021-05-20 09:14:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_customer_term`
--

CREATE TABLE `mk_customer_term` (
  `customer_term_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_customer_term`
--

INSERT INTO `mk_customer_term` (`customer_term_id`, `term_id`, `customer_id`, `purchase_order_id`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 5, NULL, 1, '2021-04-24 01:49:17', 1, '2021-04-24 01:51:26', 1),
(2, 2, 5, NULL, 0, '2021-04-24 01:44:59', 1, '2021-04-24 01:51:30', 1),
(3, 1, 6, NULL, 1, '2021-04-23 19:49:46', 1, '2021-04-23 20:09:23', 1),
(4, 2, 6, NULL, 0, '2021-04-23 19:50:19', 1, '2021-04-23 20:20:09', 1),
(5, 1, 3, NULL, 1, '2021-04-23 20:30:50', 1, NULL, NULL),
(6, 1, 7, NULL, 1, '2021-04-23 21:39:30', 1, NULL, NULL),
(7, 2, 7, NULL, 1, '2021-04-23 21:39:46', 1, NULL, NULL),
(8, 1, 2, NULL, 1, '2021-04-26 20:01:36', 1, NULL, NULL),
(9, 2, 2, NULL, 1, '2021-04-29 02:38:41', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_employee`
--

CREATE TABLE `mk_employee` (
  `customer_id` int(11) NOT NULL,
  `prefix` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) NOT NULL,
  `alternate_mobie` varchar(200) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) NOT NULL
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
-- Table structure for table `mk_lead`
--

CREATE TABLE `mk_lead` (
  `id` int(11) NOT NULL,
  `lead_source` varchar(200) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `lead_image` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` int(11) NOT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead`
--

INSERT INTO `mk_lead` (`id`, `lead_source`, `assigned_to`, `assigned_by`, `lead_image`, `name`, `email`, `mobile`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, '2', 3, 0, 'vivek.jpg', 'velou', 'velou@gmail.com', '1234567890', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(2, '2', 3, 0, 'download.jpeg', 'velou', 'velou@gmail.com', '1234567890', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(3, '2', 3, 0, '1601637940008.JPEG', 'velou', 'velou@gmail.com', '1234567890', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(4, '2', 6, 0, 'india-1.jpg', 'kumar', 'kumar@gmail.com', '9629960431', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(5, '2', 6, 0, 'india-2.jpg', 'kumar', 'kumar@gmail.com', '9629960431', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(6, '2', 6, 0, 'india-3.png', 'kumar', 'kumar@gmail.com', '9629960431', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(7, '2', 7, 0, 'unnamed.jpg', 'saravanan', 'saravanan@gmail.com', '9876543210', 1, '2021-04-23 18:30:00', 1, 0, NULL),
(8, '2', 7, 0, 'New_Project.png', 'saravanan', 'saravanan@gmail.com', '9876543210', 1, '2021-04-23 18:30:00', 1, 0, NULL);

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
(3, '1617958550', 4, 1, '2021-04-09 12:38:52'),
(4, '1618049055', 4, 1, '2021-04-10 10:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `mk_lead_customer`
--

CREATE TABLE `mk_lead_customer` (
  `id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead_customer`
--

INSERT INTO `mk_lead_customer` (`id`, `lead_id`, `customer_id`, `po_id`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 2, 0, '2021-04-23 18:30:00', 1, '2021-04-26 18:30:00', 1),
(2, 2, 6, 0, '2021-04-23 18:30:00', 1, NULL, 0),
(3, 3, 3, 0, NULL, 0, '2021-04-23 18:30:00', 1),
(4, 7, 7, 0, '2021-04-23 18:30:00', 1, NULL, 0),
(5, 5, 2, 0, NULL, 0, '2021-04-26 18:30:00', 1),
(6, 1, 1, 0, NULL, 0, '2021-04-26 18:30:00', 1),
(7, 1, 5, 0, NULL, 0, '2021-04-26 18:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mk_lead_history`
--

CREATE TABLE `mk_lead_history` (
  `id` int(11) NOT NULL,
  `actions` text NOT NULL,
  `lead_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead_history`
--

INSERT INTO `mk_lead_history` (`id`, `actions`, `lead_id`, `created_by`, `created_at`) VALUES
(1, 'Product Items added for lead', 1, 1, '2021-05-13 11:17:07'),
(2, 'Schedule meeting added for lead', 1, 1, '2021-05-13 11:23:00'),
(3, 'schedule meeting created for lead', 1, 1, '2021-05-12 20:12:27'),
(4, 'schedule meeting created for lead', 1, 1, '2021-05-12 20:14:11'),
(5, 'Log call created for lead', 1, 1, '2021-05-12 21:27:17'),
(6, 'opportunity created for lead', 1, 1, '2021-05-14 02:59:59'),
(7, 'opportunity updated for lead', 1, 1, '2021-05-14 06:27:52'),
(8, 'schedule meeting is updated for lead', 1, 1, '2021-05-13 21:40:13'),
(9, 'opportunity created for lead', 1, 2, '2021-05-14 21:52:48'),
(10, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:47'),
(11, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:48'),
(12, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:48'),
(13, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:48'),
(14, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:51'),
(15, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:51'),
(16, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:51'),
(17, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:51'),
(18, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:53'),
(19, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:53'),
(20, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:53'),
(21, 'Product item updated for lead', 1, 1, '2021-05-17 07:15:53'),
(22, 'Product item updated for lead', 1, 1, '2021-05-17 07:18:31'),
(23, 'Product item updated for lead', 1, 1, '2021-05-17 07:18:31'),
(24, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:29'),
(25, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:42'),
(26, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:42'),
(27, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:42'),
(28, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:42'),
(29, 'Product item added for lead', 1, 1, '2021-05-16 21:30:44'),
(30, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:44'),
(31, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:45'),
(32, 'Product item updated for lead', 1, 1, '2021-05-16 21:30:45'),
(33, 'Product item added for lead', 1, 1, '2021-05-16 21:33:19'),
(34, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:19'),
(35, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:19'),
(36, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:19'),
(37, 'Product item added for lead', 1, 1, '2021-05-16 21:33:21'),
(38, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:21'),
(39, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:21'),
(40, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:21'),
(41, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:23'),
(42, 'Product item updated for lead', 1, 1, '2021-05-16 21:33:24'),
(43, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:50'),
(44, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:50'),
(45, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:50'),
(46, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:50'),
(47, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:52'),
(48, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:52'),
(49, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:52'),
(50, 'Product item updated for lead', 1, 1, '2021-05-16 21:34:52'),
(51, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:19'),
(52, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:19'),
(53, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:19'),
(54, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:19'),
(55, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:23'),
(56, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:23'),
(57, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:24'),
(58, 'Product item updated for lead', 1, 1, '2021-05-16 21:35:24'),
(59, 'Product item updated for lead', 1, 1, '2021-05-16 21:57:27'),
(60, 'Product item updated for lead', 1, 1, '2021-05-16 21:57:27'),
(61, 'Product item updated for lead', 1, 1, '2021-05-16 21:57:27'),
(62, 'Product item updated for lead', 1, 1, '2021-05-16 21:57:27'),
(63, 'Product item updated for lead', 1, 1, '2021-05-16 21:59:09'),
(64, 'Product item updated for lead', 1, 1, '2021-05-16 21:59:09'),
(65, 'Product item updated for lead', 1, 1, '2021-05-16 22:07:13'),
(66, 'Product item updated for lead', 1, 1, '2021-05-16 22:07:13'),
(67, 'Product item updated for lead', 1, 1, '2021-05-16 22:07:16'),
(68, 'Product item updated for lead', 1, 1, '2021-05-16 22:07:16'),
(69, 'Product item updated for lead', 1, 1, '2021-05-16 22:07:48'),
(70, 'Product item updated for lead', 1, 1, '2021-05-16 22:12:29'),
(71, 'Product item updated for lead', 1, 1, '2021-05-16 22:12:30'),
(72, 'Product item updated for lead', 1, 1, '2021-05-16 22:13:13'),
(73, 'Product item updated for lead', 1, 1, '2021-05-16 22:13:17'),
(74, 'Product item updated for lead', 1, 1, '2021-05-16 22:13:32'),
(75, 'Product item updated for lead', 1, 1, '2021-05-16 22:13:37'),
(76, 'Product item updated for lead', 1, 1, '2021-05-20 02:05:46'),
(77, 'Product item updated for lead', 1, 1, '2021-05-20 02:05:48'),
(78, 'Product item updated for lead', 1, 1, '2021-05-20 02:05:58'),
(79, 'Product item updated for lead', 1, 1, '2021-05-20 02:07:11'),
(80, 'Product item updated for lead', 1, 1, '2021-05-20 02:07:11'),
(81, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:33'),
(82, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:33'),
(83, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:41'),
(84, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:41'),
(85, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:47'),
(86, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:49'),
(87, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:52'),
(88, 'Product item updated for lead', 1, 1, '2021-05-20 02:08:54'),
(89, 'Product item updated for lead', 1, 1, '2021-05-20 02:11:42'),
(90, 'Product item updated for lead', 1, 1, '2021-05-20 02:11:45'),
(91, 'Product item updated for lead', 1, 1, '2021-05-20 02:11:45'),
(92, 'Product item updated for lead', 1, 1, '2021-05-20 02:11:46'),
(93, 'Product item updated for lead', 1, 1, '2021-05-20 02:11:48'),
(94, 'Product item updated for lead', 1, 1, '2021-05-20 02:13:56'),
(95, 'Product item updated for lead', 1, 1, '2021-05-20 02:13:57'),
(96, 'Product item updated for lead', 1, 1, '2021-05-20 02:13:57'),
(97, 'Product item updated for lead', 1, 1, '2021-05-20 02:14:01'),
(98, 'Product item updated for lead', 1, 1, '2021-05-20 02:14:01'),
(99, 'Product item updated for lead', 1, 1, '2021-05-20 02:14:01'),
(100, 'Product item updated for lead', 1, 1, '2021-05-20 02:15:31'),
(101, 'Product item updated for lead', 1, 1, '2021-05-20 02:15:31'),
(102, 'Product item updated for lead', 1, 1, '2021-05-20 02:15:31'),
(103, 'Product item updated for lead', 1, 1, '2021-05-20 02:15:44'),
(104, 'Product item updated for lead', 1, 1, '2021-05-20 02:15:45'),
(105, 'Product item updated for lead', 1, 1, '2021-05-20 02:15:45'),
(106, 'Product item updated for lead', 1, 1, '2021-05-20 05:29:33'),
(107, 'Product item updated for lead', 1, 1, '2021-05-20 05:29:33'),
(108, 'Product item updated for lead', 1, 1, '2021-05-20 05:29:33'),
(109, 'Product item updated for lead', 1, 1, '2021-05-20 05:29:34'),
(110, 'Product item updated for lead', 1, 1, '2021-05-20 05:29:36'),
(111, 'Product item added for lead', 1, 1, '2021-05-20 05:41:17'),
(112, 'Product item updated for lead', 1, 1, '2021-05-20 05:41:17'),
(113, 'Product item updated for lead', 1, 1, '2021-05-20 05:41:34'),
(114, 'Product item updated for lead', 1, 1, '2021-05-20 05:41:53'),
(115, 'Product item updated for lead', 1, 1, '2021-05-20 05:43:58'),
(116, 'Product item added for lead', 1, 1, '2021-05-20 05:44:26'),
(117, 'Product item updated for lead', 1, 1, '2021-05-20 05:44:27'),
(118, 'Product item updated for lead', 1, 1, '2021-05-20 05:44:27');

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
-- Table structure for table `mk_master_product`
--

CREATE TABLE `mk_master_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(250) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_product`
--

INSERT INTO `mk_master_product` (`product_id`, `product_name`, `product_image`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'computer', 'india-31.png', 1, '2021-04-15 10:26:06', 1, NULL, NULL),
(2, 'Electronics', 'baby-photography.png', 1, '2021-04-22 11:41:34', 1, NULL, NULL),
(3, 'medical equipments', 'medical-equipments-medicine-blue-background_1308-43314.jpg', 0, '2021-05-05 06:55:05', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_master_product_item`
--

CREATE TABLE `mk_master_product_item` (
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_image` varchar(250) DEFAULT NULL,
  `partnumber` varchar(250) NOT NULL,
  `unit_price` varchar(200) NOT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `tax_rate` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) DEFAULT NULL,
  `created_by` timestamp NULL DEFAULT current_timestamp(),
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_product_item`
--

INSERT INTO `mk_master_product_item` (`item_id`, `product_id`, `item_name`, `item_image`, `partnumber`, `unit_price`, `selling_price`, `tax_rate`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 'Keyboard', NULL, 'Keyboard', '200', '', '12', 1, NULL, '2021-04-15 10:26:36', NULL, NULL),
(2, 2, 'Monitor', 'bg2.jpg', 'Monitor', '100', '', '12', 1, 1, '2021-04-15 10:27:01', 2021, '0000-00-00 00:00:00'),
(3, 2, 'Television', NULL, 'television', '100', '', '12', 1, 1, '2021-04-15 10:27:01', NULL, NULL),
(4, 1, 'Mouse', 'unnamed.jpg', 'mouse', '100', '', '16', 1, NULL, '2021-05-07 11:38:12', 2021, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mk_master_term`
--

CREATE TABLE `mk_master_term` (
  `term_id` int(11) NOT NULL,
  `term_name` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_term`
--

INSERT INTO `mk_master_term` (`term_id`, `term_name`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'A Terms and Conditions agreement is legally required.', 1, '2021-05-08 01:39:45', 1, NULL, NULL),
(2, 'Right to make changes to the agreement', 1, '2021-04-24 04:40:33', 1, NULL, NULL),
(3, 'testing the terms.....', 1, NULL, NULL, '2021-05-08 02:09:21', 1),
(4, 'testing the items terms', 0, '2021-05-08 01:37:11', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_opportunity`
--

CREATE TABLE `mk_opportunity` (
  `id` int(11) NOT NULL,
  `opportunity_name` varchar(100) NOT NULL,
  `expected_amount` varchar(100) NOT NULL,
  `expected_date` varchar(100) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `status` varchar(250) NOT NULL,
  `remarks` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modifed_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_opportunity`
--

INSERT INTO `mk_opportunity` (`id`, `opportunity_name`, `expected_amount`, `expected_date`, `lead_id`, `status`, `remarks`, `is_active`, `created_by`, `created_at`, `modifed_by`, `modified_at`) VALUES
(1, 'Testing Opportunity', '300', '2022-05-02', 1, '1', 'good', 0, 1, '2021-05-14 06:27:52', NULL, NULL),
(2, 'Testing Opportunity', '300', '2022-05-02', 0, '1', 'good', 0, 1, '2021-05-14 06:25:37', NULL, NULL),
(3, 'Testing the opportunity', '3000', '2021-05-15', 1, '1', 'good', 1, 2, '2021-05-14 21:52:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_purchase_order`
--

CREATE TABLE `mk_purchase_order` (
  `purchase_order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `purchase_order_number` varchar(200) NOT NULL,
  `grand_total_tax_amount` varchar(200) NOT NULL,
  `grand_total_amount` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_purchase_order`
--

INSERT INTO `mk_purchase_order` (`purchase_order_id`, `customer_id`, `lead_id`, `purchase_order_number`, `grand_total_tax_amount`, `grand_total_amount`, `status`, `comments`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 2, 1, '1618635810', '', '', 'open', 'status is opened', 1, '2021-04-17 01:33:39', 1, NULL, NULL),
(2, 2, 3, '1618660212', '', '', 'open', 'click me', 1, '2021-04-16 20:20:53', 1, NULL, NULL);

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
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_registration_table`
--

INSERT INTO `mk_registration_table` (`id`, `parent_id`, `firstname`, `lastname`, `department`, `email`, `mobile`, `password`, `profile`, `role`, `category`, `status`, `created_at`) VALUES
(1, 0, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '1', 'CA', 1, '2021-05-15 10:26:47'),
(2, 1, 'arumugam', 'velou', 'IT', 'karthikvelou@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BTL', 1, '2021-05-17 10:29:10'),
(3, 1, 'velou', 'karthik', 'CSC', 'karthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 1, '2021-05-17 10:33:13'),
(4, 1, 'rithik', 'karthik', 'IT', 'rithikkarthik@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 1, '2021-05-15 10:26:52'),
(5, 1, 'arun', 'kumar', 'IT', 'arunkumar@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'OA', 1, '2021-05-17 10:15:34'),
(6, 1, 'kumar', 'arun', 'IT', 'kumar@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 1, '2021-05-15 10:26:55'),
(7, 1, 'saravanan', 'kuppusamy', 'IT', 'saravanan@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 1, '2021-05-15 10:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `mk_related_to_master`
--

CREATE TABLE `mk_related_to_master` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_related_to_master`
--

INSERT INTO `mk_related_to_master` (`id`, `name`, `created_by`, `created_at`, `modified_by`, `modified_at`, `is_active`) VALUES
(1, 'Account', NULL, NULL, NULL, NULL, 1),
(2, 'Contact', NULL, NULL, NULL, NULL, 1),
(3, 'Task', NULL, NULL, NULL, NULL, 1),
(4, 'Opportunity', NULL, NULL, NULL, NULL, 1),
(5, 'Bug', NULL, NULL, NULL, NULL, 1),
(6, 'Case', NULL, NULL, NULL, NULL, 1),
(7, 'Lead', NULL, NULL, NULL, NULL, 1),
(8, 'Project', NULL, NULL, NULL, NULL, 1),
(9, 'Project Task', NULL, NULL, NULL, NULL, 1),
(10, 'Target', NULL, NULL, NULL, NULL, 1),
(11, 'Contract', NULL, NULL, NULL, NULL, 1),
(12, 'Invoice', NULL, NULL, NULL, NULL, 1),
(13, 'Quote', NULL, NULL, NULL, NULL, 1),
(14, 'Product', NULL, NULL, NULL, NULL, 1);

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
-- Indexes for table `mk_activity`
--
ALTER TABLE `mk_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_activity_attachments`
--
ALTER TABLE `mk_activity_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_activity_master`
--
ALTER TABLE `mk_activity_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `mk_customer`
--
ALTER TABLE `mk_customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `mk_customer_address`
--
ALTER TABLE `mk_customer_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `mk_customer_item`
--
ALTER TABLE `mk_customer_item`
  ADD PRIMARY KEY (`customer_item_id`);

--
-- Indexes for table `mk_customer_term`
--
ALTER TABLE `mk_customer_term`
  ADD PRIMARY KEY (`customer_term_id`);

--
-- Indexes for table `mk_employee`
--
ALTER TABLE `mk_employee`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `mk_group_login_table`
--
ALTER TABLE `mk_group_login_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead`
--
ALTER TABLE `mk_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_assign`
--
ALTER TABLE `mk_lead_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_customer`
--
ALTER TABLE `mk_lead_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_history`
--
ALTER TABLE `mk_lead_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_lead_quotation`
--
ALTER TABLE `mk_lead_quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_master_product`
--
ALTER TABLE `mk_master_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `mk_master_product_item`
--
ALTER TABLE `mk_master_product_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `mk_master_term`
--
ALTER TABLE `mk_master_term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `mk_opportunity`
--
ALTER TABLE `mk_opportunity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_purchase_order`
--
ALTER TABLE `mk_purchase_order`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `mk_registration_table`
--
ALTER TABLE `mk_registration_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_related_to_master`
--
ALTER TABLE `mk_related_to_master`
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
-- AUTO_INCREMENT for table `mk_activity`
--
ALTER TABLE `mk_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mk_activity_attachments`
--
ALTER TABLE `mk_activity_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mk_activity_master`
--
ALTER TABLE `mk_activity_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `mk_customer`
--
ALTER TABLE `mk_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mk_customer_address`
--
ALTER TABLE `mk_customer_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mk_customer_item`
--
ALTER TABLE `mk_customer_item`
  MODIFY `customer_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mk_customer_term`
--
ALTER TABLE `mk_customer_term`
  MODIFY `customer_term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mk_employee`
--
ALTER TABLE `mk_employee`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mk_group_login_table`
--
ALTER TABLE `mk_group_login_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_lead`
--
ALTER TABLE `mk_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk_lead_assign`
--
ALTER TABLE `mk_lead_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_lead_customer`
--
ALTER TABLE `mk_lead_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mk_lead_history`
--
ALTER TABLE `mk_lead_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `mk_lead_quotation`
--
ALTER TABLE `mk_lead_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk_master_product`
--
ALTER TABLE `mk_master_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mk_master_product_item`
--
ALTER TABLE `mk_master_product_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mk_master_term`
--
ALTER TABLE `mk_master_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_opportunity`
--
ALTER TABLE `mk_opportunity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mk_purchase_order`
--
ALTER TABLE `mk_purchase_order`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mk_registration_table`
--
ALTER TABLE `mk_registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mk_related_to_master`
--
ALTER TABLE `mk_related_to_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
