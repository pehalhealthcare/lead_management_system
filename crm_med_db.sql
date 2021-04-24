-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 04:26 PM
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
(1, 'Mr', 'Karthik', 'veloukarthik@gmail.com', '9791287056', '9344751727', 1, '2021-04-22 18:30:00', 1, NULL, 0),
(2, 'Mr', 'Rithik', 'rithik@gmail.com', '9344751727', '9791287056', 1, '2021-04-22 18:30:00', 1, NULL, 0),
(3, 'Mr', 'Mayank', 'mayank@gmail.com', '1234567890', '9876543210', 1, '2021-04-23 18:30:00', 1, NULL, 0),
(5, 'Mr', 'Velou', 'velou@gmail.com', '9894792083', '9894792083', 1, '2021-04-23 18:30:00', 1, NULL, 0),
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
(1, 1, 'Pondicherry', 'Pondicherry ffff', 'Pondicherry', 'Pondicherry', 'Pondicherry', '605001', NULL, 1, 0, '2021-04-22 20:40:51', 1, NULL, 0),
(2, 2, 'Puduvai', 'Puducherry', 'Puducherry', 'Pondicherry', 'Pondicherry', '605010', NULL, 1, 0, '2021-04-23 01:00:11', 1, NULL, 0),
(3, 3, 'Delhi', 'Delhi', 'India', 'Indira Nagar', 'New Delhi', '50001', NULL, 1, 0, '2021-04-23 20:24:43', 1, NULL, 0),
(4, 4, '', '', '', '', '', '', NULL, 1, 0, '2021-04-23 22:32:02', 1, NULL, 0),
(5, 5, 'Pondy', 'Pondicherry', 'Pondicherry', 'Pondicherry', 'Pondicherry', '605001', NULL, 1, 0, '2021-04-23 23:19:56', 1, NULL, 0),
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

INSERT INTO `mk_customer_item` (`customer_item_id`, `customer_id`, `lead_id`, `product_id`, `purchase_order_id`, `item_id`, `quantity`, `unit_price`, `total_price`, `tax_rate`, `tax_amount`, `total_amount`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 4, 1, NULL, 1, '10', '200', '2240', '12', '240', NULL, 1, '2021-04-22 20:44:54', 1, '2021-04-23 12:14:12', NULL),
(2, 1, 4, 1, NULL, 2, '10', '100', '1120', '12', '120', NULL, 1, '2021-04-22 20:44:53', 1, '2021-04-23 12:14:53', NULL),
(3, 3, 3, 1, NULL, 1, '', '200', '', '12', '', NULL, 1, '2021-04-23 20:28:05', 1, '2021-04-24 11:58:05', NULL),
(4, 3, 3, 2, NULL, 3, '', '100', '', '12', '', NULL, 1, '2021-04-23 20:28:20', 1, '2021-04-24 11:58:20', NULL),
(5, 7, 7, 1, NULL, 1, '10', '200', '2240', '12', '240', NULL, 1, '2021-04-23 21:38:31', 1, '2021-04-24 13:08:32', NULL),
(6, 7, 7, 1, NULL, 2, '10', '100', '1120', '12', '120', NULL, 1, '2021-04-23 21:38:33', 1, '2021-04-24 13:08:33', NULL);

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
(7, 2, 7, NULL, 1, '2021-04-23 21:39:46', 1, NULL, NULL);

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
(1, 1, 5, 0, '2021-04-23 18:30:00', 1, '2021-04-23 18:30:00', 1),
(2, 2, 6, 0, '2021-04-23 18:30:00', 1, NULL, 0),
(3, 3, 3, 0, NULL, 0, '2021-04-23 18:30:00', 1),
(4, 7, 7, 0, '2021-04-23 18:30:00', 1, NULL, 0);

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
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_product`
--

INSERT INTO `mk_master_product` (`product_id`, `product_name`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'computer', 1, '2021-04-15 10:26:06', 1, NULL, NULL),
(2, 'Electronics', 1, '2021-04-22 11:41:34', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_master_product_item`
--

CREATE TABLE `mk_master_product_item` (
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `partnumber` varchar(250) NOT NULL,
  `unit_price` varchar(200) NOT NULL,
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

INSERT INTO `mk_master_product_item` (`item_id`, `product_id`, `item_name`, `partnumber`, `unit_price`, `tax_rate`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 'Keyboard', 'Keyboard', '200', '12', 1, NULL, '2021-04-15 10:26:36', NULL, NULL),
(2, 1, 'Mouse', 'mouse', '100', '12', 1, 1, '2021-04-15 10:27:01', NULL, NULL),
(3, 2, 'Television', 'television', '100', '12', 1, 1, '2021-04-15 10:27:01', NULL, NULL);

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
(1, 'A Terms and Conditions agreement is not legally required', 1, '2021-04-24 04:39:18', 1, NULL, NULL),
(2, 'Right to make changes to the agreement', 1, '2021-04-24 04:40:33', 1, NULL, NULL);

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
  MODIFY `customer_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mk_customer_term`
--
ALTER TABLE `mk_customer_term`
  MODIFY `customer_term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_lead_quotation`
--
ALTER TABLE `mk_lead_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk_master_product`
--
ALTER TABLE `mk_master_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mk_master_product_item`
--
ALTER TABLE `mk_master_product_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mk_master_term`
--
ALTER TABLE `mk_master_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
