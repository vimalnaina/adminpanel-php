-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2020 at 12:32 PM
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
  `customer_name` varchar(50) NOT NULL,
  `gst_number` varchar(30) NOT NULL,
  `pan_number` varchar(30) NOT NULL,
  `file_number` varchar(30) NOT NULL,
  `adv_name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `mob_num_1` bigint(10) NOT NULL,
  `mob_num_2` bigint(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `gst_mode` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `dsc_date` date NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `agree` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_`
--

INSERT INTO `customer_` (`cust_id`, `customer_name`, `gst_number`, `pan_number`, `file_number`, `adv_name`, `emailid`, `mob_num_1`, `mob_num_2`, `address`, `city`, `gst_mode`, `category`, `dsc_date`, `contact_person`, `agree`, `status`) VALUES
(5, 'NURUDDIN SADIKOT', 'ferfesef', 'ewgrg', '53', 'Self', 'sadikot.nuruddin@yahoo.co.uk', 9558091052, 8530272348, '803-The Imperia\r\nOpp Shashtri Medan', 'RAJKOT', 'Quarterly', 'Regular', '2020-07-08', 'xyzyzy', 'Yes', 'Active'),
(6, 'nuruddin sadikot', 'abcd1234abcd1234', 'xyzyxyz123', '12', 'Self', 'hakimisolutions@gmail.com', 9998861123, 7405050222, '205-b sarvottam complex,\r\nopp. panchnath mandir', 'panchnath main road', 'Monthly', 'Regular', '2020-07-28', 'ejt', 'Yes', 'Active'),
(7, 'TilesLo Testing', 'ferfesef', 'xyzyxyz123', '53', 'Sahnavazbhai', 'peter@gmail.com', 9978136808, 8530272348, 'Address one', 'RAJKOT', 'Quarterly', 'Composition', '2020-07-24', 'ejt', 'Yes', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `entry_gst`
--

CREATE TABLE `entry_gst` (
  `entry_gst_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `year` varchar(15) NOT NULL,
  `month` varchar(15) NOT NULL,
  `entry_gst_3B` date NOT NULL,
  `gstr1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entry_it`
--

CREATE TABLE `entry_it` (
  `entry_it_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `return_file` date NOT NULL,
  `verf_type` varchar(15) NOT NULL,
  `eveif_recipt` date NOT NULL,
  `remarks` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `entry_itr_pending`
--

CREATE TABLE `entry_itr_pending` (
  `entry_itr_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `itr_call` varchar(50) NOT NULL,
  `itr_whatsapp` varchar(50) NOT NULL,
  `itr_sms` varchar(50) NOT NULL,
  `pending_details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gstadvocate_`
--

CREATE TABLE `gstadvocate_` (
  `gst_adv_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob_num` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gstadvocate_`
--

INSERT INTO `gstadvocate_` (`gst_adv_id`, `name`, `company_name`, `email`, `mob_num`) VALUES
(4, 'sandip', 'sarvotam', 'sandip15895@gmail.com', 8530272348),
(5, 'School', 'Panchshil School', 'sadikot.nuruddin@yahoo.co.uk', 9558091052),
(6, 'TilesLo Testing', 'Main Company one', 'peter@gmail.com', 9978136808);

-- --------------------------------------------------------

--
-- Table structure for table `itadvocate_`
--

CREATE TABLE `itadvocate_` (
  `it_adv_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob_num` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itadvocate_`
--

INSERT INTO `itadvocate_` (`it_adv_id`, `name`, `company_name`, `email`, `mob_num`) VALUES
(9, 'Sahnavazbhai', 'Samiya Nail Making Machine', 'markting@rajwater.com', 9824459536),
(10, 'Atul Joshi', 'Monarach Applinces', 'info@monarachappliances.com', 9099092584);

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
  ADD PRIMARY KEY (`entry_gst_id`);

--
-- Indexes for table `entry_it`
--
ALTER TABLE `entry_it`
  ADD PRIMARY KEY (`entry_it_id`);

--
-- Indexes for table `entry_itr_pending`
--
ALTER TABLE `entry_itr_pending`
  ADD PRIMARY KEY (`entry_itr_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_`
--
ALTER TABLE `customer_`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `entry_gst`
--
ALTER TABLE `entry_gst`
  MODIFY `entry_gst_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `entry_it`
--
ALTER TABLE `entry_it`
  MODIFY `entry_it_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `entry_itr_pending`
--
ALTER TABLE `entry_itr_pending`
  MODIFY `entry_itr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gstadvocate_`
--
ALTER TABLE `gstadvocate_`
  MODIFY `gst_adv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `itadvocate_`
--
ALTER TABLE `itadvocate_`
  MODIFY `it_adv_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
