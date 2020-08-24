-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 01:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_`
--

CREATE TABLE `customer_` (
  `cust_id` int(10) NOT NULL,
  `file_no` varchar(20) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `pan_no` varchar(30) NOT NULL,
  `cont_person_1` varchar(40) NOT NULL,
  `mob_no_1` bigint(10) NOT NULL,
  `cont_person_2` varchar(40) NOT NULL,
  `mob_no_2` bigint(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `it_adv` varchar(40) NOT NULL,
  `dsc_date` date NOT NULL,
  `agriculture` varchar(10) NOT NULL,
  `gst_no` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `gst_adv` varchar(40) NOT NULL,
  `gst_reg_date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_`
--

INSERT INTO `customer_` (`cust_id`, `file_no`, `cust_name`, `pan_no`, `cont_person_1`, `mob_no_1`, `cont_person_2`, `mob_no_2`, `address`, `city`, `email`, `it_adv`, `dsc_date`, `agriculture`, `gst_no`, `category`, `gst_adv`, `gst_reg_date`, `status`) VALUES
(10, '1', 'NURUDDIN SADIKOT', 'xyzxyzxyz', 'name1', 9558091052, 'name2', 7405050222, '803-The Imperia\r\nOpp Shashtri Medan', 'RAJKOT', 'sadikot.nuruddin@yahoo.co.uk', 'Self', '2020-08-07', 'No', 'abcabcabc', 'Regular', 'Self', '2020-08-07', 'Active'),
(11, '12', 'sandip', 'xyzabc', 'name1', 8530272348, 'name2', 7405050222, 'jamnagar', 'jamnagar', 'sandip15895@gmail.com', 'Self', '2020-08-08', 'No', '', 'Regular', 'Self', '0000-00-00', 'Active'),
(14, '21', 'Chiragbhai', 'abcabc', 'name1', 8530272348, 'name2', 9824459536, 'jamnagar', 'jamnagar', 'sandip15895@gmail.com', 'sandip', '2020-08-04', 'Yes', '123456', 'Composition', 'NURUDDIN SADIKOT', '2020-08-26', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `entry_gst`
--

CREATE TABLE `entry_gst` (
  `entry_gst_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `fy_id` int(5) NOT NULL,
  `month` varchar(15) NOT NULL,
  `gst3b` date NOT NULL,
  `gstr1` date NOT NULL,
  `cmp8` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_gst`
--

INSERT INTO `entry_gst` (`entry_gst_id`, `cust_id`, `fy_id`, `month`, `gst3b`, `gstr1`, `cmp8`) VALUES
(15, 10, 1, 'April', '2020-08-15', '0000-00-00', '0000-00-00'),
(16, 14, 1, 'May', '2020-08-15', '0000-00-00', '0000-00-00'),
(18, 11, 1, 'June', '0000-00-00', '2020-08-20', '0000-00-00'),
(19, 11, 1, 'July', '0000-00-00', '2020-08-20', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `entry_it`
--

CREATE TABLE `entry_it` (
  `entry_it_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `fy_id` int(5) NOT NULL,
  `return_file` date NOT NULL,
  `verif_type` varchar(15) NOT NULL,
  `receipt_date` date NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_it`
--

INSERT INTO `entry_it` (`entry_it_id`, `cust_id`, `fy_id`, `return_file`, `verif_type`, `receipt_date`, `remarks`) VALUES
(9, 10, 1, '2020-08-21', 'E-Verify', '2020-08-21', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `entry_itr_pending`
--

CREATE TABLE `entry_itr_pending` (
  `entry_itr_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `fy_id` int(5) NOT NULL,
  `itr_call` bigint(10) NOT NULL,
  `itr_whatsapp` varchar(50) NOT NULL,
  `itr_sms` varchar(50) NOT NULL,
  `pending_details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry_itr_pending`
--

INSERT INTO `entry_itr_pending` (`entry_itr_id`, `cust_id`, `fy_id`, `itr_call`, `itr_whatsapp`, `itr_sms`, `pending_details`) VALUES
(5, 14, 1, 9876543210, '9876543210', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `fy_id` int(5) NOT NULL,
  `year` varchar(15) NOT NULL,
  `def` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `financial_year`
--

INSERT INTO `financial_year` (`fy_id`, `year`, `def`) VALUES
(1, '2020-21', 1),
(2, '2021-22', 0),
(3, '2022-23', 0),
(4, '2023-24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gstadvocate_`
--

CREATE TABLE `gstadvocate_` (
  `gst_adv_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cont_person_1` varchar(50) NOT NULL,
  `mob_no_1` bigint(10) NOT NULL,
  `cont_person_2` varchar(50) NOT NULL,
  `mob_no_2` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gstadvocate_`
--

INSERT INTO `gstadvocate_` (`gst_adv_id`, `name`, `comp_name`, `email`, `cont_person_1`, `mob_no_1`, `cont_person_2`, `mob_no_2`) VALUES
(7, 'NURUDDIN SADIKOT', 'HAKIMI SOLUTIONS', 'sadikot.nuruddin@yahoo.co.uk', 'name1', 9558091052, 'name2', 9998861123);

-- --------------------------------------------------------

--
-- Table structure for table `itadvocate_`
--

CREATE TABLE `itadvocate_` (
  `it_adv_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comp_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cont_person_1` varchar(50) NOT NULL,
  `mob_no_1` bigint(10) NOT NULL,
  `cont_person_2` varchar(50) NOT NULL,
  `mob_no_2` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itadvocate_`
--

INSERT INTO `itadvocate_` (`it_adv_id`, `name`, `comp_name`, `email`, `cont_person_1`, `mob_no_1`, `cont_person_2`, `mob_no_2`) VALUES
(11, 'sandip', 'Monarach Applinces', 'sandip15895@gmail.com', 'name1', 8530272348, 'name2', 9978136808);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `emailid`, `contact`, `password`) VALUES
(1, 'admin', '', 0, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_`
--
ALTER TABLE `customer_`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `entry_gst`
--
ALTER TABLE `entry_gst`
  ADD PRIMARY KEY (`entry_gst_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `fy_id` (`fy_id`);

--
-- Indexes for table `entry_it`
--
ALTER TABLE `entry_it`
  ADD PRIMARY KEY (`entry_it_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `fy_id` (`fy_id`);

--
-- Indexes for table `entry_itr_pending`
--
ALTER TABLE `entry_itr_pending`
  ADD PRIMARY KEY (`entry_itr_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `fy_id` (`fy_id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`fy_id`);

--
-- Indexes for table `gstadvocate_`
--
ALTER TABLE `gstadvocate_`
  ADD PRIMARY KEY (`gst_adv_id`);

--
-- Indexes for table `itadvocate_`
--
ALTER TABLE `itadvocate_`
  ADD PRIMARY KEY (`it_adv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_`
--
ALTER TABLE `customer_`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `entry_gst`
--
ALTER TABLE `entry_gst`
  MODIFY `entry_gst_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `entry_it`
--
ALTER TABLE `entry_it`
  MODIFY `entry_it_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `entry_itr_pending`
--
ALTER TABLE `entry_itr_pending`
  MODIFY `entry_itr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `fy_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gstadvocate_`
--
ALTER TABLE `gstadvocate_`
  MODIFY `gst_adv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `itadvocate_`
--
ALTER TABLE `itadvocate_`
  MODIFY `it_adv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry_gst`
--
ALTER TABLE `entry_gst`
  ADD CONSTRAINT `entry_gst_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customer_` (`cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
