-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 07:12 AM
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
(1, 0, '3', 1, 'Schedule', 'Inbound', 'Planned', 'whatsapp', 'qualified', 'contact', NULL, '13-05-2021', '05/15/2021', '1', 'Schedule Meeting is Updated', 'Chennai', NULL, NULL, NULL, NULL, NULL, 1, 2, '2021-07-18 02:56:44', NULL, NULL),
(2, 0, '6', 2, 'Meetings', 'Outbound', 'Held', 'email', 'qualified', 'account', NULL, '15-05-2021', '', '1', 'testing', '', NULL, NULL, NULL, NULL, NULL, 1, 2, '2021-07-18 02:57:00', NULL, NULL),
(3, 1, '3', 3, 'Testing', NULL, NULL, NULL, NULL, 'abishek', NULL, NULL, NULL, NULL, NULL, NULL, 'veloukarthik@gmail.com', 'onlineguruweb@gmail.com', '', '', '<p>Testing</p>', 1, 1, '2021-05-12 21:28:32', NULL, NULL),
(4, 5, '6', 1, 'tested', NULL, 'Planned', NULL, NULL, 'account', NULL, '01-06-2021', '06/01/2021', '1', 'tested', 'tested', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-31 20:27:34', NULL, NULL),
(5, 1, '3', 2, 'tested', NULL, 'Planned', NULL, NULL, 'account', NULL, '01-06-2021', '06/02/2021', '1', 'tested', 'tested', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-05-31 20:29:37', NULL, NULL),
(6, 2, '6', 1, 'tested', NULL, 'Planned', NULL, NULL, 'account', NULL, '05-06-2021', '06/05/2021', '1', 'getea', 'tested', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-06-04 21:50:22', NULL, NULL),
(7, 2, '3', 1, 'aewrawea', NULL, 'Planned', NULL, NULL, 'account', NULL, '11-06-2021', '06/16/2021', '1', 'aewr', 'aewr', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-06-11 03:19:44', NULL, NULL),
(8, 2, '6', 1, 'aewrawea', NULL, 'Planned', NULL, NULL, 'account', NULL, '11-06-2021', '06/16/2021', '1', 'aewr', 'aewr', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-06-11 03:19:47', NULL, NULL),
(9, 33, '3', 1, 'tested', NULL, 'Held', NULL, NULL, 'contact', NULL, '2021-07-07T06:37', '2021-07-09T06:37', NULL, 'aateaw', 'awerawe', NULL, NULL, NULL, NULL, NULL, 1, 1, '2021-07-06 21:37:55', NULL, NULL);

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
  `prefix` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `alternate_mobile` varchar(200) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_customer`
--

INSERT INTO `mk_customer` (`customer_id`, `prefix`, `name`, `email`, `mobile`, `alternate_mobile`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'Mr', 'Karthik Velou Rithik', 'veloukarthik@gmail.com', '9791287056', '9344751727', 1, '2021-06-12 18:30:00', 1, NULL, 0),
(2, 'Mr', 'Rithik', 'rithik@gmail.com', '9344751727', '9791287056', 1, '2021-06-09 18:30:00', 1, NULL, 0),
(3, 'Mr', 'Mayank', 'mayank@gmail.com', '1234567890', '9876543210', 1, '2021-07-16 18:30:00', 1, NULL, 0),
(5, 'Mr', 'Velou', 'velou@gmail.com', '9894792083', '9894792083', 1, '2021-06-14 18:30:00', 1, NULL, 0),
(6, 'Mr', 'sheetal', 'sheetal@pehal.com', '989456221232', '9884546623', 1, '2021-07-16 18:30:00', 3, NULL, 0),
(7, 'Mr', 'Abishek', 'abishek@gmail.com', '9876543210', '9876543210', 1, '2021-06-14 18:30:00', 1, NULL, 0),
(9, 'Mr', 'tested', 'tested@gmail.com', 'tested', '126546489954', 1, '2021-07-01 18:30:00', 1, NULL, 0),
(10, NULL, '133', '133@gmail.com', '123456', NULL, 1, NULL, NULL, NULL, NULL),
(11, NULL, 'tested velou', 'testedvelou@gmail.com', '123456789012345699545', NULL, 1, NULL, NULL, NULL, NULL),
(12, NULL, 'awerawe', 'awerawerawe', 'awerawerawe', NULL, 1, NULL, NULL, NULL, NULL),
(13, 'Mr', 'awerawe', 'awerawerawe@gmail.com', 'awerawerawe', '', 1, '2021-07-17 18:30:00', 1, NULL, NULL),
(14, 'Mr', 'rithik karthik', 'rithikkarthik@gmail.com', '1234567890', '', 1, '2021-06-24 18:30:00', 1, NULL, NULL),
(15, NULL, 'aawer', 'aewraw', 'awerawe', NULL, 1, NULL, NULL, NULL, NULL),
(16, NULL, 'aweraw', 'aweraw', 'awerawe', NULL, 1, NULL, NULL, NULL, NULL),
(17, NULL, 'karthik', '12322@gmail.com', '1234567890', NULL, 1, NULL, NULL, NULL, NULL),
(19, NULL, 'karthik', '987456522@gmail.com', '1234567890', NULL, 1, NULL, NULL, NULL, NULL),
(22, NULL, 'Sankari', 'sankari@gmail.com', '8870392950', NULL, 1, NULL, NULL, NULL, NULL);

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
(1, 1, 'Pondicherry', 'Pondicherry ffff', 'Pondicherry', 'Pondicherry', 'Pondicherry', '605001', NULL, 1, 0, '2021-06-12 20:39:29', 1, NULL, 0),
(2, 2, 'Puduvai', 'Puducherry', 'Puducherry', 'Pondicherry', 'Pondicherry', '605010', NULL, 1, 0, '2021-06-10 01:59:56', 1, NULL, 0),
(3, 3, 'Delhi', 'Delhi', 'India', 'Indira Nagar', 'New Delhi', '50001', NULL, 1, 0, '2021-07-17 06:57:06', 1, NULL, 0),
(4, 4, '', '', '', '', '', '', NULL, 1, 0, '2021-04-23 22:32:02', 1, NULL, 0),
(5, 5, 'Pondy', 'Pondicherry', 'Pondicherry', 'Pondicherry', 'Pondicherry', '605001', NULL, 1, 0, '2021-06-15 06:46:20', 1, NULL, 0),
(6, 6, 'England', 'London', 'Hamster', 'London', 'Bukkinghom Palace', '123456978', NULL, 1, 0, '2021-07-16 22:47:39', 3, NULL, 0),
(7, 7, 'Delhi', 'Delhi', 'Delhi', 'Delhi', 'Delhi', '1200255', NULL, 1, 0, '2021-06-15 02:01:58', 1, NULL, 0),
(8, 8, '', '', '', '', '', '', NULL, 1, 0, '2021-06-09 20:07:21', 1, NULL, 0),
(9, 9, '123', '', 'tested', 'tested', 'tested', '123664', NULL, 1, 0, '2021-07-02 06:33:27', 1, NULL, 0),
(10, 13, '123', '', 'tested', 'tested', 'tested', '133664', NULL, 1, 0, '2021-07-18 02:40:36', 1, NULL, 0),
(11, 14, '', '', '', '', '', '', NULL, 1, 0, '2021-06-25 05:18:25', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mk_customer_item`
--

CREATE TABLE `mk_customer_item` (
  `customer_item_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `service_id` int(11) DEFAULT NULL,
  `item_type` varchar(50) DEFAULT NULL,
  `purchase_order_id` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `unit_price` varchar(200) NOT NULL,
  `selling_unit_price` varchar(50) DEFAULT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `total_price_wo_tax` varchar(100) DEFAULT NULL,
  `total_price` varchar(200) NOT NULL,
  `tax_rate` varchar(200) NOT NULL,
  `tax_amount` varchar(200) NOT NULL,
  `total_tax_amount` varchar(200) DEFAULT NULL,
  `refer` varchar(100) DEFAULT NULL,
  `terms` varchar(100) DEFAULT NULL,
  `ref_1` varchar(250) DEFAULT NULL,
  `ref_2` varchar(250) DEFAULT NULL,
  `ref_3` varchar(250) DEFAULT NULL,
  `ref_4` varchar(250) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_customer_item`
--

INSERT INTO `mk_customer_item` (`customer_item_id`, `customer_id`, `lead_id`, `product_id`, `service_id`, `item_type`, `purchase_order_id`, `item_id`, `quantity`, `unit_price`, `selling_unit_price`, `selling_price`, `total_price_wo_tax`, `total_price`, `tax_rate`, `tax_amount`, `total_tax_amount`, `refer`, `terms`, `ref_1`, `ref_2`, `ref_3`, `ref_4`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 14, 31, 1, 0, 'product', NULL, 1, '1', '760340.00', '760340.00', '892.86', '892.86', '1000', '12', '107.14', '107.14', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-15 22:59:35', 1, '2021-06-16 13:49:44', NULL),
(2, 14, 31, 0, 1, 'service', NULL, 1, '15', '200', '150', '133.93', '2008.93', '2250', '12', '16.07', '241.07', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-06-15 23:14:28', 1, '2021-06-16 13:53:29', NULL),
(3, 14, 31, 1, 0, 'product', NULL, 2, '1', '847160.00', NULL, NULL, NULL, '847160', '12', '90767.14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-06-15 22:59:17', 1, '2021-06-16 13:53:47', NULL),
(4, 14, 31, 0, 1, 'service', NULL, 4, '10', '100', NULL, NULL, NULL, '1000', '16', '13.79', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2021-06-15 22:59:19', 1, '2021-06-16 13:53:51', NULL),
(5, 13, 30, NULL, 1, 'service', NULL, 1, '5', '200', '200', '178.57', '892.86', '1000', '12', '21.43', '107.14', '122', '122', '122', '122', '122', '122', 1, '2021-06-23 07:10:08', 1, '2021-06-23 10:39:49', NULL),
(6, 9, 33, NULL, 1, 'service', NULL, 1, '10', '200', '200', '178.57', '1785.71', '2000', '12', '21.43', '214.29', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-11 01:52:49', 1, '2021-07-11 05:22:49', NULL),
(7, 13, 32, NULL, 1, 'service', NULL, 1, '10', '200', '200', '178.57', '1785.71', '2000', '12', '21.43', '214.29', 'TESTED', 'TESTED', 'TESTED', 'TESTED', 'TESTED', 'TESTED', 1, '2021-07-10 20:33:12', 1, '2021-07-11 12:03:12', NULL),
(8, 13, 32, NULL, 1, 'service', NULL, 4, '10', '100', '100', '86.21', '862.07', '1000', '16', '13.79', '137.93', 'TESTED', 'TESTED', 'TESTED', 'TESTED', 'TESTED', 'TESTED', 1, '2021-07-10 20:33:14', 1, '2021-07-11 12:03:14', NULL),
(9, 6, 1, 1, NULL, 'product', NULL, 1, '5', '760340.00', '760340.00', '678875.00', '3394375.00', '3801700', '12', '81465.00', '407325.00', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-16 22:48:29', 3, '2021-07-17 02:17:57', NULL),
(10, 6, 1, NULL, 1, 'service', NULL, 1, '10', '200', '200', '178.57', '1785.71', '2000', '12', '21.43', '214.29', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-07-16 22:48:10', 3, '2021-07-17 02:18:10', NULL),
(11, 3, 33, 1, NULL, 'product', NULL, 1, '1', '760340.00', '760340.00', '678875.00', '678875.00', '760340', '12', '81465.00', '81465.00', '123456', 'Terms', 'Reference 1', 'Reference 2', 'Reference 3', 'Special Comments', 1, '2021-07-18 22:49:09', 1, '2021-07-19 02:19:09', NULL),
(12, 3, 33, NULL, 1, 'service', NULL, 4, '10', '100', '100', '86.21', '862.07', '1000', '16', '13.79', '137.93', '123456', 'Terms', 'Reference 1', 'Reference 2', 'Reference 3', 'Special Comments', 1, '2021-07-18 22:49:24', 1, '2021-07-19 02:19:23', NULL),
(13, 3, 33, 1, NULL, 'product', NULL, 1, '1', '760340.00', '760340.00', '678875.00', '678875.00', '760340', '12', '81465.00', '81465.00', '123456', 'Terms', 'Reference 1', 'Reference 2', 'Reference 3', 'Special Comments', 1, '2021-07-18 22:49:09', 1, '2021-07-19 02:19:09', NULL);

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
(4, 2, 6, NULL, 1, '2021-04-23 19:50:19', 1, '2021-07-16 22:48:44', 3),
(5, 1, 3, NULL, 1, '2021-04-23 20:30:50', 1, NULL, NULL),
(6, 1, 7, NULL, 1, '2021-04-23 21:39:30', 1, NULL, NULL),
(7, 2, 7, NULL, 1, '2021-04-23 21:39:46', 1, NULL, NULL),
(8, 1, 2, NULL, 1, '2021-04-26 20:01:36', 1, NULL, NULL),
(9, 2, 2, NULL, 1, '2021-04-29 02:38:41', 1, NULL, NULL),
(10, 2, 3, NULL, 1, '2021-05-24 20:15:07', 1, NULL, NULL),
(11, 1, 1, NULL, 1, '2021-06-10 02:30:02', 1, NULL, NULL),
(12, 2, 1, NULL, 1, '2021-06-10 02:30:03', 1, NULL, NULL),
(13, 3, 1, NULL, 1, '2021-06-10 02:30:04', 1, NULL, NULL),
(14, 3, 7, NULL, 1, '2021-06-13 05:12:33', 1, NULL, NULL),
(15, 1, 14, NULL, 1, '2021-06-15 22:45:55', 1, NULL, NULL),
(16, 2, 14, NULL, 1, '2021-06-15 22:45:57', 1, NULL, NULL),
(17, 3, 14, NULL, 1, '2021-06-15 22:45:57', 1, NULL, NULL),
(18, 1, 13, NULL, 1, '2021-06-27 21:24:08', 1, NULL, NULL),
(19, 3, 13, NULL, 1, '2021-06-27 21:24:09', 1, NULL, NULL),
(20, 2, 13, NULL, 1, '2021-06-27 21:24:10', 1, NULL, NULL),
(21, 1, 9, NULL, 1, '2021-07-11 01:58:49', 1, NULL, NULL),
(22, 2, 9, NULL, 1, '2021-07-11 01:58:49', 1, NULL, NULL),
(23, 3, 9, NULL, 1, '2021-07-11 01:58:50', 1, NULL, NULL),
(24, 3, 6, NULL, 1, '2021-07-16 22:48:45', 3, NULL, NULL),
(25, 3, 3, NULL, 1, '2021-07-18 22:50:19', 1, NULL, NULL);

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
  `category` varchar(200) NOT NULL,
  `sub_category` varchar(100) DEFAULT NULL,
  `lead_source` varchar(100) DEFAULT NULL,
  `assigned_to` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `lead_image` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `reason` varchar(250) DEFAULT NULL,
  `journey` enum('In Process','New','Complete') NOT NULL DEFAULT 'New',
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` int(11) NOT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_lead`
--

INSERT INTO `mk_lead` (`id`, `category`, `sub_category`, `lead_source`, `assigned_to`, `assigned_by`, `lead_image`, `name`, `email`, `mobile`, `is_active`, `reason`, `journey`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, '1', NULL, 'whatsapp', 3, 0, 'vivek.jpg', 'velou', 'velou@gmail.com', '1234567890', 0, '', 'New', '2021-05-26 18:30:00', 1, 0, NULL),
(2, '2', NULL, NULL, 3, 0, 'download.jpeg', 'velou', 'velou@gmail.com', '1234567890', 0, 'Already Purchased', 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(3, '2', NULL, NULL, 3, 0, '1601637940008.JPEG', 'velou', 'velou@gmail.com', '1234567890', 1, NULL, 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(4, '2', NULL, NULL, 6, 0, 'india-1.jpg', 'kumar', 'kumar@gmail.com', '9629960431', 1, NULL, 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(5, '2', NULL, NULL, 6, 0, 'india-2.jpg', 'kumar', 'kumar@gmail.com', '9629960431', 1, NULL, 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(6, '2', NULL, NULL, 6, 0, 'india-3.png', 'kumar', 'kumar@gmail.com', '9629960431', 1, NULL, 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(7, '2', NULL, NULL, 7, 0, 'unnamed.jpg', 'saravanan', 'saravanan@gmail.com', '9876543210', 1, NULL, 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(8, '2', NULL, NULL, 7, 0, 'New_Project.png', 'saravanan', 'saravanan@gmail.com', '9876543210', 1, NULL, 'New', '2021-04-23 18:30:00', 1, 0, NULL),
(9, '1', NULL, 'whatsapp', 6, 0, 'medical-equipments-medicine-blue-background_1308-43314.jpg', 'Rithik', 'rithik@gmail.com', '123456789', 1, NULL, 'New', '2021-06-02 18:30:00', 1, 0, NULL),
(10, '1', NULL, 'whatsapp', 3, 0, 'Arun.jpg', 'testing', 'testing@gmail.com', '1234567890', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(11, '1', NULL, 'whatsapp', 6, 0, NULL, 'aweartw', 'awerwaer', 'wearawe', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(12, '2', NULL, 'whatsapp', 6, 0, 'india-21.jpg', 'awerawe', 'aweraw', 'awerawe', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(13, '2', NULL, 'whatsapp', 6, 0, 'india-31.png', 'awerawe', 'aweraw', 'awerawe', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(14, '1', NULL, 'whatsapp', 6, 0, 'logo.jpg', 'aeaw', 'awerawe', 'awerwae', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(15, '1', NULL, 'whatsapp', 6, 0, 'india-11.jpg', 'aeaw', 'awerawe', 'awerwae', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(16, '1', NULL, 'whatsapp', 6, 0, 'maxresdefault.jpg', 'aeaw', 'awerawe', 'awerwae', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(17, '1', NULL, 'whatsapp', 6, 0, 'logo1.jpg', 'aeaw', 'awerawe', 'awerwae', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(18, '1', NULL, 'whatsapp', 6, 0, 'india-12.jpg', 'aeaw', 'awerawe', 'awerwae', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(19, '2', NULL, 'india_mart', 7, 0, NULL, 'awerawe', 'awerawer', 'awerawerawerawe', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(20, '2', NULL, 'india_mart', 3, 0, 'india-13.jpg', 'Karthik', 'veloukarthik@gmail.com', '123456789', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(21, '2', NULL, 'india_mart', 3, 0, 'india-22.jpg', 'Karthik', 'veloukarthik@gmail.com', '123456789', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(22, '2', NULL, 'india_mart', 3, 0, 'india-32.png', 'Karthik', 'veloukarthik@gmail.com', '123456789', 1, NULL, 'New', '2021-06-03 18:30:00', 1, 0, NULL),
(23, '1', NULL, 'india_mart', 3, 0, 'india-14.jpg', 'tester', 'tester@gmail.com', '9897456521', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(24, '1', NULL, 'india_mart', 3, 0, 'india-23.jpg', 'tester', 'tester@gmail.com', '9897456521', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(25, '1', NULL, 'india_mart', 3, 0, 'india-33.png', 'tester', 'tester@gmail.com', '9897456521', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(26, '1', NULL, 'whatsapp', 7, 0, NULL, '133', '133@gmail.com', '123456', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(27, '1', NULL, 'whatsapp', 7, 0, NULL, '133', '133@gmail.com', '123456', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(28, '1', NULL, 'whatsapp', 3, 0, NULL, 'tested velou', 'testedvelou@gmail.com', '123456789012345699545', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(29, '1', NULL, 'whatsapp', 3, 0, NULL, 'tested velou', 'testedvelou@gmail.com', '123456789012345699545', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(30, '2', NULL, 'Cold Call', 3, 0, NULL, 'awerawe', 'awerawerawe', 'awerawerawe', 1, NULL, 'New', '2021-06-12 18:30:00', 1, 0, NULL),
(31, '1', NULL, 'whatsapp', 3, 0, 'New_Project1.png', 'rithik karthik', 'rithikkarthik@gmail.com', '1234567890', 1, NULL, 'New', '2021-06-15 18:30:00', 1, 0, NULL),
(32, '1', NULL, 'whatsapp', 3, 1, NULL, 'aawer', 'aewraw', 'awerawe', 1, NULL, 'New', '2021-07-01 18:30:00', 1, 0, NULL),
(33, '2', '', 'whatsapp', 3, 1, 'New_Project2.png', 'aweraw', 'aweraw', 'awerawe', 1, NULL, 'New', '2021-07-06 18:30:00', 1, 0, NULL),
(34, '2', NULL, 'india_mart', 3, 1, NULL, 'tested', 'tested@gmail.com', '9791287056', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(35, '2', NULL, 'india_mart', 3, 1, NULL, 'tested', 'tested@gmail.com', '9791287056', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(36, '2', NULL, 'india_mart', 3, 1, NULL, 'tested', 'tested@gmail.com', '9791287056', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(37, '1', NULL, 'india_mart', 3, 1, '20210511_131441.jpg', 'karthik', '12322@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(38, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '12322@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(39, '1', NULL, 'india_mart', 3, 1, '20210511_1314411.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(40, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(41, '1', NULL, 'india_mart', 3, 1, '20210511_1314412.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(42, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(43, '1', NULL, 'india_mart', 3, 1, '20210511_1314413.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(44, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(45, '1', NULL, 'india_mart', 3, 1, '20210511_1314414.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(46, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(47, '1', NULL, 'india_mart', 3, 1, '20210511_1314415.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(48, '1', NULL, 'india_mart', 3, 1, '20210511_1314416.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(49, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(50, '1', NULL, 'india_mart', 3, 1, '20210511_1314417.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(51, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(52, '1', NULL, 'india_mart', 3, 1, '20210511_1314418.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(53, '1', NULL, 'india_mart', 3, 1, NULL, 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(54, '1', NULL, 'india_mart', 3, 1, '20210511_1314419.jpg', 'karthik', '987456522@gmail.com', '1234567890', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL),
(55, '1', NULL, 'india_mart', 6, 1, 'bg.jpg', 'Sankari', 'sankari@gmail.com', '8870392950', 1, NULL, 'New', '2021-07-22 18:30:00', 1, 0, NULL);

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
(1, 1, 6, 0, NULL, 0, '2021-07-16 18:30:00', 3),
(2, 33, 3, 0, NULL, 0, '2021-07-16 18:30:00', 1),
(3, 32, 13, 0, NULL, 0, '2021-07-17 18:30:00', 1),
(4, 54, 19, 0, '2021-07-23 06:45:46', 1, NULL, 0),
(5, 55, 22, 0, '2021-07-22 21:58:53', 1, NULL, 0);

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
(118, 'Product item updated for lead', 1, 1, '2021-05-20 05:44:27'),
(119, 'Product item added for lead', 1, 1, '2021-05-22 05:52:49'),
(120, 'Product item updated for lead', 1, 1, '2021-05-22 05:52:49'),
(121, 'Product item updated for lead', 1, 1, '2021-05-22 06:00:22'),
(122, 'Product item updated for lead', 1, 1, '2021-05-22 06:00:22'),
(123, 'Product item updated for lead', 1, 1, '2021-05-22 06:00:24'),
(124, 'Product item updated for lead', 1, 1, '2021-05-22 06:00:25'),
(125, 'Product item updated for lead', 1, 1, '2021-05-22 06:00:55'),
(126, 'Product item updated for lead', 1, 1, '2021-05-22 06:05:17'),
(127, 'Product item updated for lead', 1, 1, '2021-05-22 06:05:17'),
(128, 'Product item updated for lead', 1, 1, '2021-05-22 06:05:19'),
(129, 'Product item updated for lead', 1, 1, '2021-05-22 06:05:21'),
(130, 'Product item updated for lead', 1, 1, '2021-05-22 06:05:22'),
(131, 'Product item updated for lead', 1, 1, '2021-05-22 06:05:22'),
(132, 'Product item updated for lead', 1, 1, '2021-05-24 21:42:59'),
(133, 'Product item updated for lead', 1, 1, '2021-05-24 21:43:01'),
(134, 'Product item updated for lead', 1, 1, '2021-05-24 21:43:05'),
(135, 'Product item updated for lead', 1, 1, '2021-05-24 21:43:14'),
(136, 'Product item updated for lead', 1, 1, '2021-05-24 21:43:17'),
(137, 'Product item updated for lead', 1, 1, '2021-05-24 21:43:20'),
(138, 'Product item updated for lead', 1, 1, '2021-05-24 21:43:22'),
(139, 'Product item updated for lead', 1, 1, '2021-05-24 21:45:11'),
(140, 'Product item updated for lead', 1, 1, '2021-05-24 21:46:34'),
(141, 'Product item updated for lead', 1, 1, '2021-05-24 21:46:49'),
(142, 'Product item updated for lead', 1, 1, '2021-05-24 21:46:55'),
(143, 'Product item updated for lead', 1, 1, '2021-05-24 21:47:13'),
(144, 'Product item updated for lead', 1, 1, '2021-05-24 21:47:14'),
(145, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:13'),
(146, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:14'),
(147, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:35'),
(148, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:35'),
(149, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:37'),
(150, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:50'),
(151, 'Product item updated for lead', 1, 1, '2021-05-25 03:58:51'),
(152, 'Product item updated for lead', 1, 1, '2021-05-25 04:18:53'),
(153, 'Product item updated for lead', 1, 1, '2021-05-25 04:18:53'),
(154, 'Product item updated for lead', 1, 1, '2021-05-25 04:19:03'),
(155, 'Product item updated for lead', 1, 1, '2021-05-25 04:19:03'),
(156, 'Product item updated for lead', 1, 1, '2021-05-25 04:19:04'),
(157, 'Product item updated for lead', 1, 1, '2021-05-25 04:21:30'),
(158, 'Product item updated for lead', 1, 1, '2021-05-25 04:21:30'),
(159, 'Product item updated for lead', 1, 1, '2021-05-25 05:19:30'),
(160, 'Product item updated for lead', 1, 1, '2021-05-25 05:20:13'),
(161, 'Product item updated for lead', 1, 1, '2021-05-25 05:21:26'),
(162, 'Product item updated for lead', 1, 1, '2021-05-25 05:24:02'),
(163, 'Product item updated for lead', 1, 1, '2021-05-25 07:10:31'),
(164, 'Product item updated for lead', 1, 1, '2021-05-25 07:10:31'),
(165, 'Product item added for lead', 1, 1, '2021-05-25 07:21:03'),
(166, 'Product item updated for lead', 1, 1, '2021-05-25 07:21:03'),
(167, 'Product item added for lead', 1, 1, '2021-05-25 07:21:05'),
(168, 'Product item updated for lead', 1, 1, '2021-05-25 07:21:06'),
(169, 'Product item updated for lead', 1, 1, '2021-05-25 07:22:53'),
(170, 'Product item updated for lead', 1, 1, '2021-05-25 07:22:53'),
(171, 'Product item updated for lead', 1, 1, '2021-05-25 07:22:53'),
(172, 'Product item updated for lead', 1, 1, '2021-05-25 07:22:53'),
(173, 'Product item updated for lead', 1, 1, '2021-05-25 07:23:36'),
(174, 'Product item updated for lead', 1, 1, '2021-05-25 07:23:37'),
(175, 'Product item updated for lead', 1, 1, '2021-05-25 07:23:56'),
(176, 'Product item updated for lead', 1, 1, '2021-05-25 07:23:57'),
(177, 'Product item updated for lead', 1, 1, '2021-05-25 07:23:57'),
(178, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:00'),
(179, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:00'),
(180, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:02'),
(181, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:02'),
(182, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:03'),
(183, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:03'),
(184, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:10'),
(185, 'Product item updated for lead', 1, 1, '2021-05-25 07:29:11'),
(186, 'Product item added for lead', 1, 1, '2021-05-24 19:35:48'),
(187, 'Product item updated for lead', 1, 1, '2021-05-24 19:35:48'),
(188, 'Product item added for lead', 1, 1, '2021-05-24 19:35:55'),
(189, 'Product item updated for lead', 1, 1, '2021-05-24 19:35:55'),
(190, 'Product item updated for lead', 1, 1, '2021-05-24 19:37:20'),
(191, 'Product item updated for lead', 1, 1, '2021-05-24 19:37:21'),
(192, 'Product item updated for lead', 1, 1, '2021-05-24 19:37:31'),
(193, 'Product item updated for lead', 1, 1, '2021-05-24 19:37:33'),
(194, 'Product item updated for lead', 1, 1, '2021-05-24 19:40:36'),
(195, 'Product item updated for lead', 1, 1, '2021-05-24 19:40:38'),
(196, 'Product item updated for lead', 1, 1, '2021-05-24 19:40:49'),
(197, 'Product item updated for lead', 1, 1, '2021-05-24 19:40:51'),
(198, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:06'),
(199, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:08'),
(200, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:52'),
(201, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:52'),
(202, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:52'),
(203, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:57'),
(204, 'Product item updated for lead', 1, 1, '2021-05-24 19:42:57'),
(205, 'Product item updated for lead', 1, 1, '2021-05-24 19:50:51'),
(206, 'Product item updated for lead', 1, 1, '2021-05-24 19:50:51'),
(207, 'Product item updated for lead', 1, 1, '2021-05-24 19:50:54'),
(208, 'Product item updated for lead', 1, 1, '2021-05-24 19:50:54'),
(209, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:06'),
(210, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:06'),
(211, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:06'),
(212, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:08'),
(213, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:09'),
(214, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:10'),
(215, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:34'),
(216, 'Product item updated for lead', 1, 1, '2021-05-24 19:51:36'),
(217, 'opportunity created for lead', 3, 1, '2021-05-24 20:12:11'),
(218, 'Product item added for lead', 3, 1, '2021-05-24 20:13:02'),
(219, 'Product item updated for lead', 3, 1, '2021-05-24 20:13:02'),
(220, 'Customer terms added for lead', 3, 1, '2021-05-24 20:15:07'),
(221, 'Product item updated for lead', 3, 1, '2021-05-24 20:15:30'),
(222, 'Product item updated for lead', 3, 1, '2021-05-24 20:18:24'),
(223, 'Product item updated for lead', 3, 1, '2021-05-24 20:18:26'),
(224, 'Product item updated for lead', 3, 1, '2021-05-24 20:18:36'),
(225, 'Product item updated for lead', 3, 1, '2021-05-24 20:18:36'),
(226, 'Product item updated for lead', 3, 1, '2021-05-24 20:18:37'),
(227, 'Product item updated for lead', 1, 1, '2021-05-29 02:33:12'),
(228, 'Product item updated for lead', 1, 1, '2021-05-29 02:33:31'),
(229, 'Product item updated for lead', 1, 1, '2021-05-29 02:33:32'),
(230, 'Product item updated for lead', 1, 1, '2021-05-29 02:33:32'),
(231, 'customer details updated for lead', 1, 1, '2021-05-31 19:52:04'),
(232, 'customer details updated for lead', 1, 1, '2021-05-31 19:52:45'),
(233, 'opportunity created for lead', 1, 1, '2021-05-31 20:20:31'),
(234, 'opportunity created for lead', 5, 1, '2021-05-31 20:21:11'),
(235, 'schedule meeting created for lead', 5, 1, '2021-05-31 20:27:34'),
(236, 'schedule meeting created for lead', 1, 1, '2021-05-31 20:29:37'),
(237, 'opportunity created for lead', 1, 1, '2021-06-04 05:46:28'),
(238, 'opportunity created for lead', 7, 1, '2021-06-04 05:47:22'),
(239, 'opportunity created for lead', 1, 1, '2021-06-04 05:49:05'),
(240, 'opportunity created for lead', 9, 1, '2021-06-04 05:50:14'),
(241, 'opportunity created for lead', 1, 1, '2021-06-04 06:00:55'),
(242, 'opportunity created for lead', 2, 1, '2021-06-04 21:36:03'),
(243, 'customer details updated for lead', 1, 1, '2021-06-04 21:40:07'),
(244, 'customer details updated for lead', 2, 1, '2021-06-04 21:40:42'),
(245, 'opportunity created for lead', 12, 1, '2021-06-04 21:41:39'),
(246, 'opportunity created for lead', 2, 1, '2021-06-04 21:44:14'),
(247, 'opportunity created for lead', 2, 1, '2021-06-04 21:49:46'),
(248, 'schedule meeting created for lead', 2, 1, '2021-06-04 21:50:22'),
(249, 'Product item added for lead', 2, 1, '2021-06-04 21:50:38'),
(250, 'Product item updated for lead', 2, 1, '2021-06-04 21:50:39'),
(251, 'Product item added for lead', 2, 1, '2021-06-04 21:50:41'),
(252, 'Product item updated for lead', 2, 1, '2021-06-04 21:50:41'),
(253, 'Product item updated for lead', 2, 1, '2021-06-04 21:50:46'),
(254, 'Product item updated for lead', 2, 1, '2021-06-04 21:50:47'),
(255, 'Product item updated for lead', 2, 1, '2021-06-04 21:50:56'),
(256, 'Product item updated for lead', 2, 1, '2021-06-04 21:50:57'),
(257, 'Product item updated for lead', 2, 1, '2021-06-04 21:51:01'),
(258, 'Product item updated for lead', 2, 1, '2021-06-04 21:52:00'),
(259, 'Product item updated for lead', 1, 1, '2021-06-05 00:48:38'),
(260, 'Product item updated for lead', 1, 1, '2021-06-05 00:49:27'),
(261, 'Product item updated for lead', 1, 1, '2021-06-05 00:49:29'),
(262, 'Product item updated for lead', 1, 1, '2021-06-05 00:49:45'),
(263, 'Product item updated for lead', 1, 1, '2021-06-05 00:49:45'),
(264, 'Product item updated for lead', 1, 1, '2021-06-05 00:50:34'),
(265, 'Product item updated for lead', 1, 1, '2021-06-05 00:51:51'),
(266, 'Product item updated for lead', 1, 1, '2021-06-05 00:51:52'),
(267, 'Product item updated for lead', 1, 1, '2021-06-05 00:51:59'),
(268, 'Product item updated for lead', 1, 1, '2021-06-05 00:52:01'),
(269, 'Product item updated for lead', 1, 1, '2021-06-05 00:52:04'),
(270, 'Product item updated for lead', 1, 1, '2021-06-05 00:52:04'),
(271, 'Product item updated for lead', 1, 1, '2021-06-05 00:53:16'),
(272, 'Product item updated for lead', 1, 1, '2021-06-05 00:53:16'),
(273, 'Product item updated for lead', 1, 1, '2021-06-05 00:53:17'),
(274, 'Product item updated for lead', 1, 1, '2021-06-05 00:53:21'),
(275, 'Product item updated for lead', 1, 1, '2021-06-05 00:53:36'),
(276, 'Product item updated for lead', 1, 1, '2021-06-09 06:42:25'),
(277, 'Product item updated for lead', 1, 1, '2021-06-09 06:42:26'),
(278, 'Product item added for lead', 1, 1, '2021-06-09 06:44:19'),
(279, 'Product item updated for lead', 1, 1, '2021-06-09 06:44:19'),
(280, 'Product item added for lead', 1, 1, '2021-06-09 07:04:44'),
(281, 'Product item updated for lead', 1, 1, '2021-06-09 07:04:45'),
(282, 'Product item added for lead', 1, 1, '2021-06-09 21:33:31'),
(283, 'Product item updated for lead', 1, 1, '2021-06-09 21:33:31'),
(284, 'customer details updated for lead', 1, 1, '2021-06-10 05:44:59'),
(285, 'customer details updated for lead', 1, 1, '2021-06-10 06:19:06'),
(286, 'customer details updated for lead', 1, 1, '2021-06-10 06:35:43'),
(287, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:26'),
(288, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:30'),
(289, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:30'),
(290, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:31'),
(291, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:32'),
(292, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:32'),
(293, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:34'),
(294, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:35'),
(295, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:35'),
(296, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:53'),
(297, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:53'),
(298, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:54'),
(299, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:55'),
(300, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:55'),
(301, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:56'),
(302, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:58'),
(303, 'Product item updated for lead', 1, 1, '2021-06-09 20:01:58'),
(304, 'Product item updated for lead', 1, 1, '2021-06-09 20:04:09'),
(305, 'Customer added for lead', 1, 1, '2021-06-09 20:07:21'),
(306, 'customer details updated for lead', 2, 1, '2021-06-10 01:44:46'),
(307, 'Product item added for lead', 2, 1, '2021-06-10 01:45:12'),
(308, 'Product item updated for lead', 2, 1, '2021-06-10 01:45:13'),
(309, 'Product item added for lead', 2, 1, '2021-06-10 01:45:18'),
(310, 'Product item updated for lead', 2, 1, '2021-06-10 01:45:18'),
(311, 'Product item updated for lead', 2, 1, '2021-06-10 01:45:28'),
(312, 'Product item updated for lead', 2, 1, '2021-06-10 01:45:29'),
(313, 'Product item updated for lead', 2, 1, '2021-06-10 01:45:30'),
(314, 'Product item updated for lead', 2, 1, '2021-06-10 01:45:31'),
(315, 'customer details updated for lead', 2, 1, '2021-06-10 01:59:56'),
(316, 'Customer terms added for lead', 2, 1, '2021-06-10 02:30:02'),
(317, 'Customer terms added for lead', 2, 1, '2021-06-10 02:30:03'),
(318, 'Customer terms added for lead', 2, 1, '2021-06-10 02:30:04'),
(319, 'Product item added for lead', 2, 1, '2021-06-10 02:30:51'),
(320, 'Product item updated for lead', 2, 1, '2021-06-10 02:30:52'),
(321, 'schedule meeting created for lead', 2, 1, '2021-06-11 03:19:44'),
(322, 'schedule meeting created for lead', 2, 1, '2021-06-11 03:19:47'),
(323, 'opportunity created for lead', 2, 1, '2021-06-11 03:20:37'),
(324, 'customer details updated for lead', 22, 1, '2021-06-12 20:39:30'),
(325, 'Product item added for lead', 22, 1, '2021-06-12 21:02:02'),
(326, 'Product item updated for lead', 22, 1, '2021-06-12 21:02:03'),
(327, 'Product item updated for lead', 22, 1, '2021-06-12 21:02:06'),
(328, 'Product item updated for lead', 22, 1, '2021-06-12 21:02:10'),
(329, 'Product item added for lead', 22, 1, '2021-06-12 21:02:19'),
(330, 'Product item updated for lead', 22, 1, '2021-06-12 21:02:19'),
(331, 'Customer added for lead', 22, 1, '2021-06-12 22:17:17'),
(332, 'customer details updated for lead', 20, 1, '2021-06-13 05:11:50'),
(333, 'Product item added for lead', 20, 1, '2021-06-13 05:12:03'),
(334, 'Product item added for lead', 20, 1, '2021-06-13 05:12:09'),
(335, 'Product item updated for lead', 20, 1, '2021-06-13 05:12:09'),
(336, 'Customer terms added for lead', 20, 1, '2021-06-13 05:12:33'),
(337, 'customer details updated for lead', 19, 1, '2021-06-13 07:21:42'),
(338, 'Product item added for lead', 19, 1, '2021-06-13 07:21:49'),
(339, 'Product item updated for lead', 19, 1, '2021-06-13 07:21:50'),
(340, 'Product item updated for lead', 19, 1, '2021-06-13 07:21:50'),
(341, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:14'),
(342, 'Product item added for lead', 19, 1, '2021-06-13 07:23:20'),
(343, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:21'),
(344, 'Product item added for lead', 19, 1, '2021-06-13 07:23:29'),
(345, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:30'),
(346, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:30'),
(347, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:34'),
(348, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:34'),
(349, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:35'),
(350, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:37'),
(351, 'Product item added for lead', 19, 1, '2021-06-13 07:23:43'),
(352, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:48'),
(353, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:49'),
(354, 'Product item updated for lead', 19, 1, '2021-06-13 07:23:49'),
(355, 'customer details updated for lead', 30, 1, '2021-06-15 02:01:58'),
(356, 'Product item added for lead', 30, 1, '2021-06-15 02:02:15'),
(357, 'Product item updated for lead', 30, 1, '2021-06-15 02:02:16'),
(358, 'Product item updated for lead', 30, 1, '2021-06-15 02:02:20'),
(359, 'Product item added for lead', 30, 1, '2021-06-15 02:02:27'),
(360, 'Product item updated for lead', 30, 1, '2021-06-15 02:02:27'),
(361, 'customer details updated for lead', 30, 1, '2021-06-15 06:45:54'),
(362, 'customer details updated for lead', 30, 1, '2021-06-15 06:46:20'),
(363, 'Product item updated for lead', 30, 1, '2021-06-14 19:32:29'),
(364, 'Product item updated for lead', 30, 1, '2021-06-14 19:32:29'),
(365, 'Product item updated for lead', 30, 1, '2021-06-14 19:32:29'),
(366, 'Customer added for lead', 30, 1, '2021-06-15 02:45:36'),
(367, 'Customer added for lead', 31, 1, '2021-06-16 04:03:45'),
(368, 'Product item added for lead', 31, 1, '2021-06-16 04:04:11'),
(369, 'Product item added for lead', 31, 1, '2021-06-16 04:04:23'),
(370, 'Product item updated for lead', 31, 1, '2021-06-16 04:04:23'),
(371, 'Product item added for lead', 31, 1, '2021-06-15 21:13:33'),
(372, 'Product item updated for lead', 31, 1, '2021-06-15 21:13:39'),
(373, 'Product item updated for lead', 31, 1, '2021-06-15 21:13:54'),
(374, 'Product item updated for lead', 31, 1, '2021-06-15 21:13:55'),
(375, 'Product item updated for lead', 31, 1, '2021-06-15 21:19:09'),
(376, 'Product item updated for lead', 31, 1, '2021-06-15 21:19:17'),
(377, 'Product item updated for lead', 31, 1, '2021-06-15 21:19:30'),
(378, 'Product item updated for lead', 31, 1, '2021-06-15 21:19:33'),
(379, 'Product item updated for lead', 31, 1, '2021-06-15 21:19:39'),
(380, 'Product item added for lead', 31, 1, '2021-06-15 21:19:43'),
(381, 'Product item updated for lead', 31, 1, '2021-06-15 21:19:44'),
(382, 'Product item updated for lead', 31, 1, '2021-06-15 21:20:23'),
(383, 'Product item updated for lead', 31, 1, '2021-06-15 21:26:33'),
(384, 'Product item updated for lead', 31, 1, '2021-06-15 21:26:33'),
(385, 'Product item updated for lead', 31, 1, '2021-06-15 21:26:35'),
(386, 'Product item updated for lead', 31, 1, '2021-06-15 21:26:51'),
(387, 'Product item added for lead', 31, 1, '2021-06-15 21:26:57'),
(388, 'Product item updated for lead', 31, 1, '2021-06-15 21:26:57'),
(389, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:03'),
(390, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:13'),
(391, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:13'),
(392, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:18'),
(393, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:21'),
(394, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:32'),
(395, 'Product item updated for lead', 31, 1, '2021-06-15 21:27:40'),
(396, 'Product item added for lead', 31, 1, '2021-06-15 21:29:24'),
(397, 'Product item updated for lead', 31, 1, '2021-06-15 21:43:00'),
(398, 'Product item updated for lead', 31, 1, '2021-06-15 21:43:00'),
(399, 'Product item updated for lead', 31, 1, '2021-06-15 21:43:00'),
(400, 'Product item added for lead', 31, 1, '2021-06-15 21:43:15'),
(401, 'Product item updated for lead', 31, 1, '2021-06-15 21:43:15'),
(402, 'Product item updated for lead', 31, 1, '2021-06-15 21:43:17'),
(403, 'Product item added for lead', 31, 1, '2021-06-15 21:43:38'),
(404, 'Product item added for lead', 31, 1, '2021-06-15 21:43:43'),
(405, 'Product item updated for lead', 31, 1, '2021-06-15 21:43:45'),
(406, 'Product item added for lead', 31, 1, '2021-06-15 21:44:23'),
(407, 'Product item added for lead', 31, 1, '2021-06-15 21:44:31'),
(408, 'Product item updated for lead', 31, 1, '2021-06-15 21:44:38'),
(409, 'Product item updated for lead', 31, 1, '2021-06-15 21:44:38'),
(410, 'Product item updated for lead', 31, 1, '2021-06-15 21:44:41'),
(411, 'Product item updated for lead', 31, 1, '2021-06-15 21:44:43'),
(412, 'Product item updated for lead', 31, 1, '2021-06-15 21:44:47'),
(413, 'Product item updated for lead', 31, 1, '2021-06-15 21:44:48'),
(414, 'Product item updated for lead', 31, 1, '2021-06-15 21:45:03'),
(415, 'Product item updated for lead', 31, 1, '2021-06-15 21:45:03'),
(416, 'Product item updated for lead', 31, 1, '2021-06-15 22:01:35'),
(417, 'Product item updated for lead', 31, 1, '2021-06-15 22:01:36'),
(418, 'Product item updated for lead', 31, 1, '2021-06-15 22:01:37'),
(419, 'Product item updated for lead', 31, 1, '2021-06-15 22:01:46'),
(420, 'Product item added for lead', 31, 1, '2021-06-15 22:02:27'),
(421, 'Product item updated for lead', 31, 1, '2021-06-15 22:02:27'),
(422, 'Product item added for lead', 31, 1, '2021-06-15 22:13:13'),
(423, 'Product item updated for lead', 31, 1, '2021-06-15 22:13:13'),
(424, 'Product item updated for lead', 31, 1, '2021-06-15 22:13:19'),
(425, 'Product item added for lead', 31, 1, '2021-06-15 22:13:45'),
(426, 'Product item added for lead', 31, 1, '2021-06-15 22:14:13'),
(427, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:16'),
(428, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:29'),
(429, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:29'),
(430, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:30'),
(431, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:31'),
(432, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:32'),
(433, 'Product item added for lead', 31, 1, '2021-06-15 22:14:45'),
(434, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:46'),
(435, 'Product item updated for lead', 31, 1, '2021-06-15 22:14:46'),
(436, 'Product item updated for lead', 31, 1, '2021-06-15 22:15:39'),
(437, 'Product item added for lead', 31, 1, '2021-06-15 22:15:41'),
(438, 'Product item updated for lead', 31, 1, '2021-06-15 22:15:42'),
(439, 'Product item added for lead', 31, 1, '2021-06-15 22:18:51'),
(440, 'Product item updated for lead', 31, 1, '2021-06-15 22:18:52'),
(441, 'Product item added for lead', 31, 1, '2021-06-15 22:18:56'),
(442, 'Product item updated for lead', 31, 1, '2021-06-15 22:18:56'),
(443, 'Product item added for lead', 31, 1, '2021-06-15 22:19:44'),
(444, 'Product item updated for lead', 31, 1, '2021-06-15 22:23:19'),
(445, 'Product item added for lead', 31, 1, '2021-06-15 22:23:29'),
(446, 'Product item updated for lead', 31, 1, '2021-06-15 22:23:29'),
(447, 'Product item added for lead', 31, 1, '2021-06-15 22:23:47'),
(448, 'Product item updated for lead', 31, 1, '2021-06-15 22:23:47'),
(449, 'Product item added for lead', 31, 1, '2021-06-15 22:23:51'),
(450, 'Product item updated for lead', 31, 1, '2021-06-15 22:23:52'),
(451, 'Product item updated for lead', 31, 1, '2021-06-15 22:27:12'),
(452, 'Product item updated for lead', 31, 1, '2021-06-15 22:27:19'),
(453, 'Product item updated for lead', 31, 1, '2021-06-15 22:45:28'),
(454, 'Product item updated for lead', 31, 1, '2021-06-15 22:45:28'),
(455, 'Product item updated for lead', 31, 1, '2021-06-15 22:45:32'),
(456, 'Product item updated for lead', 31, 1, '2021-06-15 22:45:35'),
(457, 'Customer terms added for lead', 31, 1, '2021-06-15 22:45:55'),
(458, 'Customer terms added for lead', 31, 1, '2021-06-15 22:45:57'),
(459, 'Customer terms added for lead', 31, 1, '2021-06-15 22:45:57'),
(460, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:03'),
(461, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:06'),
(462, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:07'),
(463, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:07'),
(464, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:08'),
(465, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:08'),
(466, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:17'),
(467, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:29'),
(468, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:34'),
(469, 'Product item updated for lead', 31, 1, '2021-06-15 22:58:35'),
(470, 'Product item updated for lead', 31, 1, '2021-06-15 22:59:13'),
(471, 'Product item updated for lead', 31, 1, '2021-06-15 22:59:17'),
(472, 'Product item updated for lead', 31, 1, '2021-06-15 22:59:19'),
(473, 'Product item updated for lead', 31, 1, '2021-06-15 22:59:28'),
(474, 'Product item updated for lead', 31, 1, '2021-06-15 22:59:35'),
(475, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:28'),
(476, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:28'),
(477, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:29'),
(478, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:30'),
(479, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:30'),
(480, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:31'),
(481, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:38'),
(482, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:39'),
(483, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:39'),
(484, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:40'),
(485, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:41'),
(486, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:41'),
(487, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:42'),
(488, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:42'),
(489, 'Product item updated for lead', 31, 1, '2021-06-15 23:03:42'),
(490, 'Product item updated for lead', 31, 1, '2021-06-15 23:06:59'),
(491, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:08'),
(492, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:09'),
(493, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:09'),
(494, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:15'),
(495, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:15'),
(496, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:21'),
(497, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:22'),
(498, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:22'),
(499, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:25'),
(500, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:26'),
(501, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:27'),
(502, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:27'),
(503, 'Product item updated for lead', 31, 1, '2021-06-15 23:14:28'),
(504, 'Product item added for lead', 30, 1, '2021-06-23 07:09:49'),
(505, 'Product item updated for lead', 30, 1, '2021-06-23 07:09:50'),
(506, 'Product item updated for lead', 30, 1, '2021-06-23 07:10:08'),
(507, 'Customer terms added for lead', 30, 1, '2021-06-27 21:24:08'),
(508, 'Customer terms added for lead', 30, 1, '2021-06-27 21:24:09'),
(509, 'Customer terms added for lead', 30, 1, '2021-06-27 21:24:10'),
(510, 'customer details updated for lead', 33, 1, '2021-07-02 06:33:27'),
(511, 'schedule meeting created for lead', 33, 1, '2021-07-06 21:37:55'),
(512, 'Product item added for lead', 33, 1, '2021-07-11 01:52:49'),
(513, 'Product item updated for lead', 33, 1, '2021-07-11 01:52:49'),
(514, 'Customer terms added for lead', 33, 1, '2021-07-11 01:58:49'),
(515, 'Customer terms added for lead', 33, 1, '2021-07-11 01:58:49'),
(516, 'Customer terms added for lead', 33, 1, '2021-07-11 01:58:50'),
(517, 'customer details updated for lead', 32, 1, '2021-07-10 20:32:57'),
(518, 'Product item added for lead', 32, 1, '2021-07-10 20:33:12'),
(519, 'Product item updated for lead', 32, 1, '2021-07-10 20:33:12'),
(520, 'Product item added for lead', 32, 1, '2021-07-10 20:33:14'),
(521, 'Product item updated for lead', 32, 1, '2021-07-10 20:33:14'),
(522, 'customer details updated for lead', 1, 3, '2021-07-16 22:47:40'),
(523, 'Product item added for lead', 1, 3, '2021-07-16 22:47:57'),
(524, 'Product item updated for lead', 1, 3, '2021-07-16 22:47:58'),
(525, 'Product item updated for lead', 1, 3, '2021-07-16 22:48:08'),
(526, 'Product item added for lead', 1, 3, '2021-07-16 22:48:10'),
(527, 'Product item updated for lead', 1, 3, '2021-07-16 22:48:10'),
(528, 'Product item updated for lead', 1, 3, '2021-07-16 22:48:29'),
(529, 'customer terms updated for lead', 1, 3, '2021-07-16 22:48:44'),
(530, 'Customer terms added for lead', 1, 3, '2021-07-16 22:48:45'),
(531, 'customer details updated for lead', 33, 1, '2021-07-17 06:57:06'),
(532, 'Log call is updated for lead', 0, 2, '2021-07-18 02:56:44'),
(533, 'schedule meeting is updated for lead', 0, 2, '2021-07-18 02:57:00'),
(534, 'opportunity updated for lead', 0, 2, '2021-07-18 02:58:28'),
(535, 'opportunity updated for lead', 0, 2, '2021-07-18 02:58:35'),
(536, 'customer details updated for lead', 32, 1, '2021-07-18 02:40:36'),
(537, 'order details updated', 33, 1, '2021-07-18 20:53:06'),
(538, 'order details updated', 33, 1, '2021-07-18 20:57:08'),
(539, 'order details updated', 33, 1, '2021-07-18 20:58:45'),
(540, 'Product item added for lead', 33, 1, '2021-07-18 22:49:09'),
(541, 'Product item added for lead', 33, 1, '2021-07-18 22:49:23'),
(542, 'Product item updated for lead', 33, 1, '2021-07-18 22:49:24'),
(543, 'Customer terms added for lead', 33, 1, '2021-07-18 22:50:19');

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
(3, 'medical equipments', 'medical-equipments-medicine-blue-background_1308-43314.jpg', 0, '2021-05-05 06:55:05', 0, NULL, NULL),
(4, 'aeawraw', 'WhatsApp_Image_2020-10-19_at_4_58_33_PM.jpeg', 1, '2021-06-26 03:35:36', 1, NULL, NULL),
(5, 'awrwerwae', '615.png', 1, '2021-07-02 05:50:37', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_master_product_item`
--

CREATE TABLE `mk_master_product_item` (
  `item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_image` varchar(250) DEFAULT NULL,
  `partnumber` varchar(250) DEFAULT NULL,
  `local_partnumber` varchar(100) DEFAULT NULL,
  `hsn` varchar(100) DEFAULT NULL,
  `unit_price` varchar(200) DEFAULT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `tax_rate` varchar(200) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) DEFAULT NULL,
  `created_by` timestamp NULL DEFAULT current_timestamp(),
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_product_item`
--

INSERT INTO `mk_master_product_item` (`item_id`, `product_id`, `item_name`, `item_image`, `partnumber`, `local_partnumber`, `hsn`, `unit_price`, `selling_price`, `tax_rate`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 'TRILOGY EVO OBM , INDIA', NULL, 'aweraw', NULL, '90192090', '760340.00', NULL, '12', 1, NULL, '2021-06-16 13:48:24', 2021, '0000-00-00 00:00:00'),
(2, 1, 'ALICE PDX PORTABLE SLEEP DIA SYS INT\'L', NULL, '1043844', '989805661011', '90189019', '847160.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(3, 1, 'TRILOGY EVO, INDIA', NULL, 'IA2110X15B', '989805668441', '90192090', '711620.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(4, 1, 'TRILOGY100 VENTILATOR, INTERNATIONAL', NULL, '1054096', '989805668421', '90192090', '677730.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(5, 1, 'SIMPLYGO MINI,EXTENDED BATTERY,INTL', NULL, '1113605', '989805666211', '90192090', '347330.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(6, 1, 'CA E70 INTERNATIONAL', NULL, '1098159', '989805661161', '90192090', '338860.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(7, 1, 'SIMPLYGO,INTERNATIONAL', NULL, '1069058', '989805665081', '90192090', '296500.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(8, 1, 'BIPAP A40, INTERNATIONAL', NULL, '1111169', '989805668431', '90192090', '288030.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(9, 1, 'BIPAP AUTOSV ADV SYS ONE, 60 SRS, INT', NULL, 'IN961S', '989805667801', '90192090', '203320.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(10, 1, 'DREAMSTATION GO AUTO W/BT, INDIA', NULL, 'IAG502S15', '989805667551', '90192090', '165190.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(11, 1, 'DREAMSTATION BIPAP AVAPS30 AE AAM /NB, IN', NULL, 'INX1131S19', '989805668491', '90192090', '156720.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(12, 1, 'DREAMSTATION AUTO BIPAP W/HUMID, INTL', NULL, 'INX700H15', '989805657801', '90192090', '149940.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(13, 1, 'DREAMSTATION BIPAP AVAPS30 AAM NB, IN', NULL, 'INX1130S19', '989805668471', '90192090', '149940.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(14, 1, 'DREAMSTATION BIPAP ST30 AAM NB, IN', NULL, 'INX1030S19', '989805668461', '90192090', '137240.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(15, 1, 'DREAMSTATION BIPAP AVAPS25 NB, IN', NULL, 'INX1125S19', '989805668481', '90192090', '131310.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(16, 1, 'DREAMSTATION AUTO BIPAP, INTL', NULL, 'INX700S15', '989805667831', '90192090', '127070.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(17, 1, 'BIPAP AUTO BIFLEX W/HUM SYSONE 60SRS,INT', NULL, 'IN761HS', '989805657751', '90192090', '121990.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(18, 1, 'DREAMSTATION BIPAP ST25/NB, IN', NULL, 'INX1025S19', '989805668451', '90192090', '118600.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(19, 1, 'BIPAP AUTO BIFLEX, SYS ONE 60 SRS, INT', NULL, 'IN761S', '989805667791', '90192090', '106740.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(20, 1, 'DREAMSTATION AUTO CPAP W/HUMID, INTL', NULL, 'INX500H15', '989805657781', '90192090', '106740.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(21, 1, 'DREAMSTATION BIPAP PRO, INTL', NULL, 'INX600S15', '989805667581', '90192090', '106740.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(22, 1, 'BIPAP PRO BIFLEX, SYS ONE 60 SRS, INT', NULL, 'IN661S', '989805667781', '90192090', '93180.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(23, 1, 'DREAMSTATION AUTO CPAP, INTL', NULL, 'INX500S15', '989805667821', '90192090', '89790.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(24, 1, 'REMSTAR AUTO A-FLEX, SYS ONE, 60 SRS,INT', NULL, 'IN561S', '989805667771', '90192090', '74550.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(25, 1, 'EVERFLO INTL OPI 230V S.AFRICA', NULL, '1020009', '989805668411', '90192090', '68120.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(26, 1, 'DORMA 500 AUTO, IND', NULL, 'INDV501', '989805667811', '90189019', '59300.00', NULL, '12', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(27, 1, 'SYSTEM ONE HEATED HUMIDIFIER, INT', NULL, 'IN6H', '989805657611', '84798920', '29450.00', NULL, '18', 1, NULL, '2021-06-16 13:48:25', NULL, NULL),
(28, 1, 'A SERIES, SYS ONE, HEATED HUM, INTL', NULL, '1111552', '989805666151', '84798920', '20520.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(29, 1, 'DREAMSTATION HUMIDIFIER EU', NULL, 'EUXH', '989805661681', '84798920', '19630.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(30, 1, 'MOBILE CART,POC', NULL, '1074885', '989805665221', '94029090', '19500.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(31, 1, 'DREAMWEAR UTN NSL MED FRM W/ HGR IN', NULL, '1116720', '989805657621', '90192090', '8470.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(32, 1, 'S, DREAMWEAR FULL, SM & MED FRM, GBL', NULL, '1133375', '989805666601', '90192090', '8470.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(33, 1, 'M, DREAMWEAR FULL, SM & MED FRM, GBL', NULL, '1133376', '989805666611', '90192090', '8470.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(34, 1, 'L, DREAMWEAR FULL,  SM & MED FRM, GBL', NULL, '1133377', '989805666621', '90192090', '8470.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(35, 1, 'MW, DREAMWEAR FULL,  SM & MED FRM, GBL', NULL, '1133378', '989805666631', '90192090', '8470.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(36, 1, 'DREAMSTATION MICRO-FLEXIBLE 12MM TUBE RP', NULL, 'PR12', '989805667131', '39173290', '7800.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(37, 1, 'S AMARA MASK W/ RS FRAME AND RS HGR', NULL, '1090221', '989805665391', '90192090', '7620.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(38, 1, 'M AMARA MASK W/ RS FRAME AND HGR IN', NULL, '1090225', '989805665401', '90192090', '7620.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(39, 1, 'L AMARA MASK W/ RS FRAME AND HGR IN', NULL, '1090228', '989805665411', '90192090', '7620.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(40, 1, 'RP-M AMARA GEL CUSHION', NULL, '1090493', '989805665521', '40169390', '5850.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(41, 1, 'RP-S AMARA GEL CUSHION', NULL, '1090492', '989805665511', '40169390', '5850.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(42, 1, 'RP-L AMARA GEL CUSHION', NULL, '1090494', '989805665531', '40169390', '5850.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(43, 1, 'SIMPLYGO,DC AIRLINE CORD', NULL, '1083693', '989805665351', '85044030', '5850.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(44, 1, '15MM HEATED TUBE', NULL, 'HT15', '989805661691', '39173290', '5350.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(45, 1, 'RP-AMARA HEADGEAR', NULL, '1090297', '989805665481', '63079090', '4388.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(46, 1, 'L CMFRTGEL BLUE NSL MSK W/HGR INT', NULL, '1070064', '989805657651', '90192090', '4230.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(47, 1, 'M CMFRTGEL BLUE NSL MSK W/HGR INT', NULL, '1070065', '989805657661', '90192090', '4230.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(48, 1, 'S CMFRTGEL BLUE NSL MSK W/HGR INT', NULL, '1070066', '989805665091', '90192090', '4230.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(49, 1, 'S/M PICO NASAL MASK W/HGR INT', NULL, '1104921', '989805667721', '90192090', '4230.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(50, 1, 'L PICO NASAL MASK W/HGR INT', NULL, '1104922', '989805667731', '90192090', '4230.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(51, 1, 'XL PICO NASAL MASK W/HGR INT', NULL, '1104923', '989805667741', '90192090', '4230.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(52, 1, 'PREMIUM HEADGEAR RP', NULL, '1033678', '989805667161', '90192090', '3466.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(53, 1, 'RP L CMFRTGEL BLUE FLAP AND GEL CUSHION', NULL, '1070105', '989805648011', '40169390', '3412.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(54, 1, 'RP S CMFRTGEL BLUE FLAP AND GEL CUSHION', NULL, '1070107', '989805648031', '40169390', '3412.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(55, 1, 'S DREAMWEAR UTN NSL CUSHION RP', NULL, '1116740', '989805660511', '90192010', '3412.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(56, 1, 'M DREAMWEAR UTN NSL CUSHION RP', NULL, '1116741', '989805660521', '90192010', '3412.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(57, 1, 'L, DREAMWEAR UTN NSL CUSHION, RP', NULL, '1116742', '989805660531', '90192010', '3412.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(58, 1, 'MW DREAMWEAR UTN NSL CUSHION RP', NULL, '1116743', '989805660541', '90192010', '3412.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(59, 1, 'RP M CMFRTGEL BLUE FLAP AND GEL CUSHION', NULL, '1070106', '989805648021', '90192090', '3412.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(60, 1, 'DREAMWEAR FULL FACE HEADGEAR RP', NULL, '1133450', '989805666691', '90192090', '3412.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(61, 1, 'RP PICO HEADGEAR', NULL, '1104934', '989805665871', '90192090', '2730.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(62, 1, 'HOME NEB 230V50HZ W/DISP SS', NULL, '1130529', '453561539721', '90192090', '2620.00', NULL, '12', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(63, 1, 'RP L PICO NASAL CUSHION', NULL, '1104937', '989805665901', '40169390', '1950.00', NULL, '18', 1, NULL, '2021-06-16 13:48:26', NULL, NULL),
(64, 1, 'RP XL PICO NASAL CUSHION', NULL, '1104938', '989805665911', '40169390', '1950.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(65, 1, 'RP S/M PICO NASAL CUSHION', NULL, '1104936', '989805665891', '40169390', '1950.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(66, 1, 'RP ULTRAFINE FILTERS - 6PK', NULL, '1029331', '989805647501', '39269099', '1780.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(67, 1, 'PERFORMANCE TUBING 6FT (1.83M)', NULL, '1032907', '989805647511', '39173290', '1240.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(68, 1, 'RP - 15MM STD TUBE - DREAMSTATION', NULL, 'PR15', '989805661721', '39173290', '1240.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(69, 1, 'DS REUSABLE POLLEN FILTER - 1-PACK, RP', NULL, '1122446', '989805659861', '39269099', '780.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(70, 1, 'DISPOSABLE ULTRA-FINE FILTER - 2-PA', NULL, '1122518', '989805661611', '39269099', '780.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(71, 1, 'RP POLLEN FILTERS - 2PK', NULL, '1029330', '453561515771', '39269099', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(72, 1, 'RP POLLEN FILTER - 1PK', NULL, '1035443', '453561515781', '39269099', '350.00', NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(73, 1, 'SIMPLYGO MINI,EXTENDED BATTERY KIT', NULL, '1116817', '989805659361', '85076000', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(74, 1, 'PHILIPS RESPIRONICS CPAP/BIPAP FOAM KIT', NULL, '1063091', '989805661351', '39269099', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(75, 1, 'RP ULTRAFINE FILTERS - 2PK', NULL, '1035442', '989805647531', '39269099', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(76, 1, 'ULTRA FINE FILTER', NULL, '1063096', '989805661361', '39269099', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(77, 1, 'DISPOSABLE ULTRA-FINE FILTER - 1-PA', NULL, '1122447', '989805663531', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(78, 1, 'ACCY,BOTTLE,HUMIDIFIER,SINGLE', NULL, '1127795', '989805657351', '39269099', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(79, 1, 'ACCY,NASAL CANNULA,25FT,SINGLE', NULL, '1127794', '989805657361', '90183930', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(80, 1, 'SIMPLYGO,Humidifier Pouch', NULL, '1083699', '989805665371', '42021290', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(81, 1, 'KIT, EVERFLO INLET FILTER, CLEAR', NULL, '1055860', '989805665041', '39269099', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(82, 1, 'DREAMSTATION GO REUSABLE FILTER–2 PK', NULL, '1133743', '989805666711', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(83, 1, 'DREAMSTATION GO – SMALL TRAVEL KIT', NULL, '1133275', '989805666581', '42021290', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(84, 1, 'PRO-FLOW PED.NASAL CANNULA 10PACK', NULL, 'P1302', '989805672821', '90183930', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(85, 1, 'THRESHOLD IMT (730) 10 PK', NULL, 'HS730-010', '989805663251', '90230010', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(86, 1, 'Trilogy Passive Exhalation Circuit Ped.', NULL, '1052127', '989805621261', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(87, 1, ' PHILIPS RI POWER SUPPLY 80W', NULL, '1091399', '989805659261', '85044090', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(88, 1, 'DREAMSTATION 80W POWER SUPPLY ROHS', NULL, '1118499', '989805661551', '85044090', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(89, 1, 'FITPACK, DREAMWEAR FULL, MED FRAME, GBL', NULL, '1133400', '989805667541', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(90, 1, 'SimplyGO Mini Backpack, Brown', NULL, '1116836', '989805666341', '42021290', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(91, 1, 'SIMPLYGO, DC CAR CHARGER', NULL, '1083692', '989805665341', '85044030', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(92, 1, 'DORMA 200, INTL', NULL, 'INV201', '989805667561', '90189019', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(93, 1, 'DREAMSTATION GO BATTERY PACK', NULL, '1133281', '989805661641', '85076000', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(94, 1, 'DREAMSTATION CPAP, INTL', NULL, 'INX200S15', '989805667571', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(95, 1, 'SIMPLYGO,BATTERY (EXTRA/REPLACEMENT)', NULL, '1082662', '989805665311', '85076000', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(96, 1, 'SimplyGo Mini,Standard Battery Kit', NULL, '1116816', '989805659351', '85076000', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(97, 1, 'DREAMSTATION GO HUMIDIFIER, INTL', NULL, 'INGH', '989805667101', '84798920', NULL, NULL, '18', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(98, 1, 'BIPAP PRO BIFLEX W/HUM SYS ONE 60SRS,INT', NULL, 'IN661HS', '989805650611', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(99, 1, 'DREAMSTATION BIPAP PRO W/HUMID, INTL', NULL, 'INX600H15', '989805657791', '90192090', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL),
(100, 1, 'ALICE NIGHTONE INTL WIRELESS', NULL, '1114801', '989805660941', '90189019', NULL, NULL, '12', 1, NULL, '2021-06-16 13:48:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_master_services`
--

CREATE TABLE `mk_master_services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_image` varchar(250) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_services`
--

INSERT INTO `mk_master_services` (`service_id`, `service_name`, `service_image`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 'service 1', 'india-31.png', 1, '2021-04-15 10:26:06', 1, 2021, '0000-00-00 00:00:00'),
(2, 'Services 2', 'baby-photography.png', 1, '2021-04-22 11:41:34', 1, 2021, '0000-00-00 00:00:00'),
(3, 'medical equipments', 'medical-equipments-medicine-blue-background_1308-43314.jpg', 0, '2021-05-05 06:55:05', 0, NULL, NULL),
(4, 'uunnawer', 'unnamed1.jpg', 1, '2021-07-02 05:50:03', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_master_service_item`
--

CREATE TABLE `mk_master_service_item` (
  `item_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `item_image` varchar(250) DEFAULT NULL,
  `unit_price` varchar(200) DEFAULT NULL,
  `selling_price` varchar(100) DEFAULT NULL,
  `tax_rate` varchar(200) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) DEFAULT NULL,
  `created_by` timestamp NULL DEFAULT current_timestamp(),
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_master_service_item`
--

INSERT INTO `mk_master_service_item` (`item_id`, `service_id`, `item_name`, `item_image`, `unit_price`, `selling_price`, `tax_rate`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, 1, 'Service Item 1', NULL, '200', '', '12', 1, NULL, '2021-04-15 10:26:36', 2021, '0000-00-00 00:00:00'),
(2, 2, 'Service Item 4', 'bg2.jpg', '100', '', '12', 1, 1, '2021-04-15 10:27:01', 2021, '0000-00-00 00:00:00'),
(3, 2, 'Service Item 5', NULL, '100', '', '12', 1, 1, '2021-04-15 10:27:01', 2021, '0000-00-00 00:00:00'),
(4, 1, 'Service Item 2', 'unnamed.jpg', '100', '', '16', 1, NULL, '2021-05-07 11:38:12', 2021, '0000-00-00 00:00:00'),
(7, 1, 'Service Item 3', '12345.jpg', '1000', NULL, '12', 1, 2021, '0000-00-00 00:00:00', 2021, '0000-00-00 00:00:00'),
(8, 1, 'printer', '123451.jpg', '2000', NULL, '10', 0, 2021, '0000-00-00 00:00:00', NULL, NULL),
(9, 1, NULL, NULL, '90192090', NULL, 'TRILOGY EVO OBM , INDIA', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(10, 1, '989805661011', NULL, '90189019', NULL, 'ALICE PDX PORTABLE SLEEP DIA SYS INT\'L', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(11, 1, '989805668441', NULL, '90192090', NULL, 'TRILOGY EVO, INDIA', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(12, 1, '989805668421', NULL, '90192090', NULL, 'TRILOGY100 VENTILATOR, INTERNATIONAL', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(13, 1, '989805666211', NULL, '90192090', NULL, 'SIMPLYGO MINI,EXTENDED BATTERY,INTL', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(14, 1, '989805661161', NULL, '90192090', NULL, 'CA E70 INTERNATIONAL', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(15, 1, '989805665081', NULL, '90192090', NULL, 'SIMPLYGO,INTERNATIONAL', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(16, 1, '989805668431', NULL, '90192090', NULL, 'BIPAP A40, INTERNATIONAL', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(17, 1, '989805667801', NULL, '90192090', NULL, 'BIPAP AUTOSV ADV SYS ONE, 60 SRS, INT', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(18, 1, '989805667551', NULL, '90192090', NULL, 'DREAMSTATION GO AUTO W/BT, INDIA', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(19, 1, '989805668491', NULL, '90192090', NULL, 'DREAMSTATION BIPAP AVAPS30 AE AAM /NB, IN', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(20, 1, '989805657801', NULL, '90192090', NULL, 'DREAMSTATION AUTO BIPAP W/HUMID, INTL', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(21, 1, '989805668471', NULL, '90192090', NULL, 'DREAMSTATION BIPAP AVAPS30 AAM NB, IN', 1, NULL, '2021-07-02 13:28:34', NULL, NULL),
(22, 1, '989805668461', NULL, '90192090', NULL, 'DREAMSTATION BIPAP ST30 AAM NB, IN', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(23, 1, '989805668481', NULL, '90192090', NULL, 'DREAMSTATION BIPAP AVAPS25 NB, IN', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(24, 1, '989805667831', NULL, '90192090', NULL, 'DREAMSTATION AUTO BIPAP, INTL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(25, 1, '989805657751', NULL, '90192090', NULL, 'BIPAP AUTO BIFLEX W/HUM SYSONE 60SRS,INT', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(26, 1, '989805668451', NULL, '90192090', NULL, 'DREAMSTATION BIPAP ST25/NB, IN', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(27, 1, '989805667791', NULL, '90192090', NULL, 'BIPAP AUTO BIFLEX, SYS ONE 60 SRS, INT', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(28, 1, '989805657781', NULL, '90192090', NULL, 'DREAMSTATION AUTO CPAP W/HUMID, INTL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(29, 1, '989805667581', NULL, '90192090', NULL, 'DREAMSTATION BIPAP PRO, INTL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(30, 1, '989805667781', NULL, '90192090', NULL, 'BIPAP PRO BIFLEX, SYS ONE 60 SRS, INT', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(31, 1, '989805667821', NULL, '90192090', NULL, 'DREAMSTATION AUTO CPAP, INTL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(32, 1, '989805667771', NULL, '90192090', NULL, 'REMSTAR AUTO A-FLEX, SYS ONE, 60 SRS,INT', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(33, 1, '989805668411', NULL, '90192090', NULL, 'EVERFLO INTL OPI 230V S.AFRICA', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(34, 1, '989805667811', NULL, '90189019', NULL, 'DORMA 500 AUTO, IND', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(35, 1, '989805657611', NULL, '84798920', NULL, 'SYSTEM ONE HEATED HUMIDIFIER, INT', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(36, 1, '989805666151', NULL, '84798920', NULL, 'A SERIES, SYS ONE, HEATED HUM, INTL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(37, 1, '989805661681', NULL, '84798920', NULL, 'DREAMSTATION HUMIDIFIER EU', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(38, 1, '989805665221', NULL, '94029090', NULL, 'MOBILE CART,POC', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(39, 1, '989805657621', NULL, '90192090', NULL, 'DREAMWEAR UTN NSL MED FRM W/ HGR IN', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(40, 1, '989805666601', NULL, '90192090', NULL, 'S, DREAMWEAR FULL, SM & MED FRM, GBL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(41, 1, '989805666611', NULL, '90192090', NULL, 'M, DREAMWEAR FULL, SM & MED FRM, GBL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(42, 1, '989805666621', NULL, '90192090', NULL, 'L, DREAMWEAR FULL,  SM & MED FRM, GBL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(43, 1, '989805666631', NULL, '90192090', NULL, 'MW, DREAMWEAR FULL,  SM & MED FRM, GBL', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(44, 1, '989805667131', NULL, '39173290', NULL, 'DREAMSTATION MICRO-FLEXIBLE 12MM TUBE RP', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(45, 1, '989805665391', NULL, '90192090', NULL, 'S AMARA MASK W/ RS FRAME AND RS HGR', 1, NULL, '2021-07-02 13:28:35', NULL, NULL),
(46, 1, '989805665401', NULL, '90192090', NULL, 'M AMARA MASK W/ RS FRAME AND HGR IN', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(47, 1, '989805665411', NULL, '90192090', NULL, 'L AMARA MASK W/ RS FRAME AND HGR IN', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(48, 1, '989805665521', NULL, '40169390', NULL, 'RP-M AMARA GEL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(49, 1, '989805665511', NULL, '40169390', NULL, 'RP-S AMARA GEL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(50, 1, '989805665531', NULL, '40169390', NULL, 'RP-L AMARA GEL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(51, 1, '989805665351', NULL, '85044030', NULL, 'SIMPLYGO,DC AIRLINE CORD', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(52, 1, '989805661691', NULL, '39173290', NULL, '15MM HEATED TUBE', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(53, 1, '989805665481', NULL, '63079090', NULL, 'RP-AMARA HEADGEAR', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(54, 1, '989805657651', NULL, '90192090', NULL, 'L CMFRTGEL BLUE NSL MSK W/HGR INT', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(55, 1, '989805657661', NULL, '90192090', NULL, 'M CMFRTGEL BLUE NSL MSK W/HGR INT', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(56, 1, '989805665091', NULL, '90192090', NULL, 'S CMFRTGEL BLUE NSL MSK W/HGR INT', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(57, 1, '989805667721', NULL, '90192090', NULL, 'S/M PICO NASAL MASK W/HGR INT', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(58, 1, '989805667731', NULL, '90192090', NULL, 'L PICO NASAL MASK W/HGR INT', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(59, 1, '989805667741', NULL, '90192090', NULL, 'XL PICO NASAL MASK W/HGR INT', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(60, 1, '989805667161', NULL, '90192090', NULL, 'PREMIUM HEADGEAR RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(61, 1, '989805648011', NULL, '40169390', NULL, 'RP L CMFRTGEL BLUE FLAP AND GEL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(62, 1, '989805648031', NULL, '40169390', NULL, 'RP S CMFRTGEL BLUE FLAP AND GEL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(63, 1, '989805660511', NULL, '90192010', NULL, 'S DREAMWEAR UTN NSL CUSHION RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(64, 1, '989805660521', NULL, '90192010', NULL, 'M DREAMWEAR UTN NSL CUSHION RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(65, 1, '989805660531', NULL, '90192010', NULL, 'L, DREAMWEAR UTN NSL CUSHION, RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(66, 1, '989805660541', NULL, '90192010', NULL, 'MW DREAMWEAR UTN NSL CUSHION RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(67, 1, '989805648021', NULL, '90192090', NULL, 'RP M CMFRTGEL BLUE FLAP AND GEL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(68, 1, '989805666691', NULL, '90192090', NULL, 'DREAMWEAR FULL FACE HEADGEAR RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(69, 1, '989805665871', NULL, '90192090', NULL, 'RP PICO HEADGEAR', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(70, 1, '453561539721', NULL, '90192090', NULL, 'HOME NEB 230V50HZ W/DISP SS', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(71, 1, '989805665901', NULL, '40169390', NULL, 'RP L PICO NASAL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(72, 1, '989805665911', NULL, '40169390', NULL, 'RP XL PICO NASAL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(73, 1, '989805665891', NULL, '40169390', NULL, 'RP S/M PICO NASAL CUSHION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(74, 1, '989805647501', NULL, '39269099', NULL, 'RP ULTRAFINE FILTERS - 6PK', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(75, 1, '989805647511', NULL, '39173290', NULL, 'PERFORMANCE TUBING 6FT (1.83M)', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(76, 1, '989805661721', NULL, '39173290', NULL, 'RP - 15MM STD TUBE - DREAMSTATION', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(77, 1, '989805659861', NULL, '39269099', NULL, 'DS REUSABLE POLLEN FILTER - 1-PACK, RP', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(78, 1, '989805661611', NULL, '39269099', NULL, 'DISPOSABLE ULTRA-FINE FILTER - 2-PA', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(79, 1, '453561515771', NULL, '39269099', NULL, 'RP POLLEN FILTERS - 2PK', 1, NULL, '2021-07-02 13:28:36', NULL, NULL),
(80, 1, '453561515781', NULL, '39269099', NULL, 'RP POLLEN FILTER - 1PK', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(81, 1, '989805659361', NULL, '85076000', NULL, 'SIMPLYGO MINI,EXTENDED BATTERY KIT', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(82, 1, '989805661351', NULL, '39269099', NULL, 'PHILIPS RESPIRONICS CPAP/BIPAP FOAM KIT', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(83, 1, '989805647531', NULL, '39269099', NULL, 'RP ULTRAFINE FILTERS - 2PK', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(84, 1, '989805661361', NULL, '39269099', NULL, 'ULTRA FINE FILTER', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(85, 1, '989805663531', NULL, '90192090', NULL, 'DISPOSABLE ULTRA-FINE FILTER - 1-PA', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(86, 1, '989805657351', NULL, '39269099', NULL, 'ACCY,BOTTLE,HUMIDIFIER,SINGLE', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(87, 1, '989805657361', NULL, '90183930', NULL, 'ACCY,NASAL CANNULA,25FT,SINGLE', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(88, 1, '989805665371', NULL, '42021290', NULL, 'SIMPLYGO,Humidifier Pouch', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(89, 1, '989805665041', NULL, '39269099', NULL, 'KIT, EVERFLO INLET FILTER, CLEAR', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(90, 1, '989805666711', NULL, '90192090', NULL, 'DREAMSTATION GO REUSABLE FILTER–2 PK', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(91, 1, '989805666581', NULL, '42021290', NULL, 'DREAMSTATION GO – SMALL TRAVEL KIT', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(92, 1, '989805672821', NULL, '90183930', NULL, 'PRO-FLOW PED.NASAL CANNULA 10PACK', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(93, 1, '989805663251', NULL, '90230010', NULL, 'THRESHOLD IMT (730) 10 PK', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(94, 1, '989805621261', NULL, '90192090', NULL, 'Trilogy Passive Exhalation Circuit Ped.', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(95, 1, '989805659261', NULL, '85044090', NULL, ' PHILIPS RI POWER SUPPLY 80W', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(96, 1, '989805661551', NULL, '85044090', NULL, 'DREAMSTATION 80W POWER SUPPLY ROHS', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(97, 1, '989805667541', NULL, '90192090', NULL, 'FITPACK, DREAMWEAR FULL, MED FRAME, GBL', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(98, 1, '989805666341', NULL, '42021290', NULL, 'SimplyGO Mini Backpack, Brown', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(99, 1, '989805665341', NULL, '85044030', NULL, 'SIMPLYGO, DC CAR CHARGER', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(100, 1, '989805667561', NULL, '90189019', NULL, 'DORMA 200, INTL', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(101, 1, '989805661641', NULL, '85076000', NULL, 'DREAMSTATION GO BATTERY PACK', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(102, 1, '989805667571', NULL, '90192090', NULL, 'DREAMSTATION CPAP, INTL', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(103, 1, '989805665311', NULL, '85076000', NULL, 'SIMPLYGO,BATTERY (EXTRA/REPLACEMENT)', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(104, 1, '989805659351', NULL, '85076000', NULL, 'SimplyGo Mini,Standard Battery Kit', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(105, 1, '989805667101', NULL, '84798920', NULL, 'DREAMSTATION GO HUMIDIFIER, INTL', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(106, 1, '989805650611', NULL, '90192090', NULL, 'BIPAP PRO BIFLEX W/HUM SYS ONE 60SRS,INT', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(107, 1, '989805657791', NULL, '90192090', NULL, 'DREAMSTATION BIPAP PRO W/HUMID, INTL', 1, NULL, '2021-07-02 13:28:37', NULL, NULL),
(108, 1, '989805660941', NULL, '90189019', NULL, 'ALICE NIGHTONE INTL WIRELESS', 1, NULL, '2021-07-02 13:28:37', NULL, NULL);

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
(1, 'Payment 100% Advance /COD on approval by Finance', 1, '2021-05-08 01:39:45', 1, '2021-06-10 01:49:09', 1),
(2, 'Payment to be Remitted to MediKart HealthCare Systems Pvt Ltd Bank Account the  account no mentioned above.', 1, '2021-04-24 04:40:33', 1, '2021-06-10 01:48:53', 1),
(3, 'Supply as per Availability', 1, NULL, NULL, '2021-06-10 01:48:33', 1),
(4, 'testing the items terms', 0, '2021-05-08 01:37:11', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_notifications`
--

CREATE TABLE `mk_notifications` (
  `id` int(11) NOT NULL,
  `action_id` varchar(250) DEFAULT NULL,
  `action` varchar(250) DEFAULT NULL,
  `action_by` int(11) DEFAULT NULL,
  `action_to` int(11) DEFAULT NULL,
  `is_read` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_notifications`
--

INSERT INTO `mk_notifications` (`id`, `action_id`, `action`, `action_by`, `action_to`, `is_read`, `created_at`) VALUES
(1, '12313213', 'Test the notifications', 1, 1, 0, '2021-08-01 14:23:06');

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
(3, 'Testing the opportunity', '3000', '2021-05-15', 1, '1', 'good', 0, 2, '2021-05-14 21:52:48', NULL, NULL),
(4, 'Opportunity', '4000', '2021-05-25', 0, '1', 'bad', 1, 2, '2021-07-18 02:58:35', NULL, NULL),
(5, 'tested', '3000', '2021-06-01', 1, '1', '123', 0, 1, '2021-05-31 20:20:31', NULL, NULL),
(6, 'tested', 'tested', '2021-06-01', 5, '1', 'tested', 1, 1, '2021-05-31 20:21:11', NULL, NULL),
(7, 'tested', '3000', '2021-06-04', 1, '1', 'tested', 0, 1, '2021-06-04 05:46:27', NULL, NULL),
(8, 'tested', '3000', '2021-06-04', 7, '1', 'good', 1, 1, '2021-06-04 05:47:21', NULL, NULL),
(9, 'tested', '3000', '2021-06-04', 1, '1', 'good', 0, 1, '2021-06-04 05:49:05', NULL, NULL),
(10, 'tested', '3000', '2021-06-04', 9, '1', 'good', 1, 1, '2021-06-04 05:50:14', NULL, NULL),
(11, 'tested', '30000', '2021-06-04', 1, '1', 'tested', 0, 1, '2021-06-04 06:00:55', NULL, NULL),
(12, 'tested', '3000', '2021-06-05', 2, '1', 'good', 0, 1, '2021-06-04 21:36:03', NULL, NULL),
(13, 'tested', 'tested', '2021-06-05', 12, '1', 'gggg', 1, 1, '2021-06-04 21:41:39', NULL, NULL),
(14, 'ataer', '3000', '2021-06-05', 2, '1', 'aewrawe', 0, 1, '2021-06-04 21:44:14', NULL, NULL),
(15, 'tested', '2000', '2021-06-05', 2, '1', 'good', 0, 1, '2021-06-04 21:49:46', NULL, NULL),
(16, 'awerawe', 'aweraw', '2021-06-11', 2, '1', 'awerawe', 1, 1, '2021-06-11 03:20:37', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_order`
--

CREATE TABLE `mk_order` (
  `order_id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `order_no` varchar(100) DEFAULT NULL,
  `payment` varchar(100) DEFAULT NULL,
  `assign_to_tl` varchar(100) DEFAULT NULL,
  `assign_to_agent` varchar(100) DEFAULT NULL,
  `decision` varchar(100) DEFAULT NULL,
  `status` int(50) DEFAULT 1,
  `approved` enum('yes','no') DEFAULT 'yes',
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` int(11) DEFAULT NULL,
  `modified_by` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_order`
--

INSERT INTO `mk_order` (`order_id`, `lead_id`, `quotation_id`, `order_no`, `payment`, `assign_to_tl`, `assign_to_agent`, `decision`, `status`, `approved`, `is_active`, `created_by`, `created_at`, `modified_at`, `modified_by`) VALUES
(1, 33, 1, 'ORD_1626659469', 'no', '1', '7', 'okay', 1, 'no', 1, 1, '2021-07-18 20:50:59', 2021, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mk_order_assign`
--

CREATE TABLE `mk_order_assign` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `quotation_id` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_order_assign`
--

INSERT INTO `mk_order_assign` (`id`, `order_id`, `agent_id`, `lead_id`, `quotation_id`, `status`, `is_active`, `created_by`, `created_at`, `modified_by`, `modified_at`) VALUES
(1, 1, 7, 33, 1, 'yes', 1, 1, '2021-07-18 20:58:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mk_order_docs`
--

CREATE TABLE `mk_order_docs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `document1` varchar(250) DEFAULT NULL,
  `document2` varchar(250) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_order_docs`
--

INSERT INTO `mk_order_docs` (`id`, `order_id`, `document1`, `document2`, `is_active`, `created_by`, `created_at`) VALUES
(1, 1, 'kumar.txt', NULL, 1, 7, 2021),
(2, 1, 'Onboarding Checklist.docx', NULL, 1, 7, 2021);

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
-- Table structure for table `mk_quotation`
--

CREATE TABLE `mk_quotation` (
  `quotation_id` int(11) NOT NULL,
  `quotation_no` varchar(100) DEFAULT NULL,
  `lead_id` int(11) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `pdf` text DEFAULT NULL,
  `item_total` varchar(50) DEFAULT NULL,
  `comments` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_quotation`
--

INSERT INTO `mk_quotation` (`quotation_id`, `quotation_no`, `lead_id`, `customer_id`, `pdf`, `item_total`, `comments`, `status`, `is_active`, `created_at`, `created_by`, `modified_at`, `modified_by`) VALUES
(1, '1626661642', 33, 3, 'http://localhost/lead_management/dashboard/lead/generate_quotation/33/3', '761340', NULL, NULL, 1, '2021-07-20 00:46:15', 1, '0000-00-00 00:00:00', 0);

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
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mk_registration_table`
--

INSERT INTO `mk_registration_table` (`id`, `parent_id`, `firstname`, `lastname`, `department`, `email`, `mobile`, `password`, `profile`, `role`, `category`, `status`, `is_active`, `created_at`) VALUES
(1, 0, 'karthik', 'velou', 'Admin', 'veloukarthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '0000', '1', 'CB', 1, 1, '2021-06-10 00:21:04'),
(2, 1, 'arumugam', 'velou', 'IT', 'karthikvelou@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BTL', 0, 1, '2021-06-10 00:17:11'),
(3, 1, 'velou', 'karthik', 'CSC', 'karthik@gmail.com', '9791287056', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, 1, '2021-06-10 00:17:09'),
(4, 1, 'rithik', 'karthik', 'IT', 'rithikkarthik@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'OA', 0, 1, '2021-06-29 07:17:52'),
(5, 1, 'arun', 'kumar', 'IT', 'arunkumar@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'OTL', 0, 1, '2021-06-28 13:32:22'),
(6, 1, 'kumar', 'arun', 'IT', 'kumar@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BA', 0, 1, '2021-06-29 07:17:49'),
(7, 1, 'saravanan', 'kuppusamy', 'IT', 'saravanan@gmail.com', '1234567890', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'OA', 0, 1, '2021-06-28 13:32:17'),
(8, 1, 'manoj', 'kumar', 'IT', 'manoj@medikart.co.in ', '123456789', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '', '2', 'BTL', 1, 1, '2021-06-10 00:22:00');

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_pname` (`email`,`mobile`);

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
-- Indexes for table `mk_master_services`
--
ALTER TABLE `mk_master_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `mk_master_service_item`
--
ALTER TABLE `mk_master_service_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `mk_master_term`
--
ALTER TABLE `mk_master_term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `mk_notifications`
--
ALTER TABLE `mk_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_opportunity`
--
ALTER TABLE `mk_opportunity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_order`
--
ALTER TABLE `mk_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `mk_order_assign`
--
ALTER TABLE `mk_order_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_order_docs`
--
ALTER TABLE `mk_order_docs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk_purchase_order`
--
ALTER TABLE `mk_purchase_order`
  ADD PRIMARY KEY (`purchase_order_id`);

--
-- Indexes for table `mk_quotation`
--
ALTER TABLE `mk_quotation`
  ADD PRIMARY KEY (`quotation_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mk_customer_address`
--
ALTER TABLE `mk_customer_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mk_customer_item`
--
ALTER TABLE `mk_customer_item`
  MODIFY `customer_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mk_customer_term`
--
ALTER TABLE `mk_customer_term`
  MODIFY `customer_term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `mk_lead_assign`
--
ALTER TABLE `mk_lead_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_lead_customer`
--
ALTER TABLE `mk_lead_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mk_lead_history`
--
ALTER TABLE `mk_lead_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=544;

--
-- AUTO_INCREMENT for table `mk_lead_quotation`
--
ALTER TABLE `mk_lead_quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mk_master_product`
--
ALTER TABLE `mk_master_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mk_master_product_item`
--
ALTER TABLE `mk_master_product_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `mk_master_services`
--
ALTER TABLE `mk_master_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_master_service_item`
--
ALTER TABLE `mk_master_service_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `mk_master_term`
--
ALTER TABLE `mk_master_term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mk_notifications`
--
ALTER TABLE `mk_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_opportunity`
--
ALTER TABLE `mk_opportunity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `mk_order`
--
ALTER TABLE `mk_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_order_assign`
--
ALTER TABLE `mk_order_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_order_docs`
--
ALTER TABLE `mk_order_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mk_purchase_order`
--
ALTER TABLE `mk_purchase_order`
  MODIFY `purchase_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mk_quotation`
--
ALTER TABLE `mk_quotation`
  MODIFY `quotation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mk_registration_table`
--
ALTER TABLE `mk_registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
