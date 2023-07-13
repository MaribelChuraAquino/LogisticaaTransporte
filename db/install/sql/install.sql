-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2020 at 01:31 AM
-- Server version: 10.3.22-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roommatebd_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_holder`
--

CREATE TABLE `tbl_account_holder` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_account_holder`
--

INSERT INTO `tbl_account_holder` (`id`, `name`) VALUES
(1, 'Kalyan Brata Chakraborty1'),
(3, 'Amit '),
(4, 'deposit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `phone`, `username`, `email`, `password`, `status`, `image`) VALUES
(1, 'Admin', '01819081184', 'admin', 'admin@example.com', '$2y$10$Lt59Lux1JRqRTCp5F7ywuOhoia7KuVW.0hWuizPJjYVULNEYURKmu', 1, 'image/13092df53d26d7f984996471c3cc00dd.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consignee`
--

CREATE TABLE `tbl_consignee` (
  `id` int(11) NOT NULL,
  `consignee_id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_zip` varchar(50) NOT NULL,
  `state` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `ext` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longtitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_consignee`
--

INSERT INTO `tbl_consignee` (`id`, `consignee_id`, `name`, `address`, `city`, `postal_zip`, `state`, `contact`, `phone`, `ext`, `email`, `notes`, `latitude`, `longtitude`) VALUES
(1, '3001', 'Mr. X', 'Bangladesh', 'Bahaddarhat, Chittagong, Bangladesh', '4321', 'Chittagong', '01712440471', '01712440471', 'Nothing', 'admin@example.com', '', '22.3702767', '91.84341619999998'),
(2, '3002', 'Touch of class', '709 West 12th Street', 'Huntingburg', '47542', 'IN', '', '', '', '', '', '38.2989422', '-86.95499710000001');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mc` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `state`, `country`, `zip`, `phone`, `email`, `mc`, `customer_id`, `notes`) VALUES
(1, 'Mr. Y', 'Bangladesh', 'Chittagong', 'Chittagong', 'Bangladesh', '4321', '01712440471', 'admin@example.com', 'demo', '5001', ''),
(2, 'Test EASLEY', '212 Rice Road', 'Easley', 'SC', 'USA', '29640', '88888888888', '', '', '5002', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dispatch`
--

CREATE TABLE `tbl_dispatch` (
  `id` int(11) NOT NULL,
  `dispatch_id` varchar(100) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rate` double(18,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dispatch`
--

INSERT INTO `tbl_dispatch` (`id`, `dispatch_id`, `first_name`, `last_name`, `phone`, `email`, `rate`) VALUES
(1, 'DISP-2001', 'Demo', 'Last Demo', '+8801976644447', 'admin@example.com', 5.000),
(2, 'DISP-2002', 'King', 'Test', '2346023401', 'king@gmail.com', 5.000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `id` int(11) NOT NULL,
  `driver_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_zip` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `ssn` varchar(100) NOT NULL,
  `license_number` varchar(100) NOT NULL,
  `license_exp` date NOT NULL,
  `medical_date` date NOT NULL,
  `medical_exp` date NOT NULL,
  `drug_test` date NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `per_mile` varchar(100) NOT NULL,
  `empty_mile` varchar(100) NOT NULL,
  `percentage` double(18,3) NOT NULL,
  `status` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `insurance_cargo` double(18,3) NOT NULL,
  `insurance_truck` double(18,3) NOT NULL,
  `ifta_service` double(18,3) NOT NULL,
  `account_holder` int(11) NOT NULL,
  `prepass` double(18,3) NOT NULL,
  `load_board` double(18,3) NOT NULL,
  `trailer_rent` double(18,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id`, `driver_id`, `first_name`, `last_name`, `address`, `city`, `state`, `postal_zip`, `phone`, `email`, `dob`, `ssn`, `license_number`, `license_exp`, `medical_date`, `medical_exp`, `drug_test`, `pay_type`, `per_mile`, `empty_mile`, `percentage`, `status`, `notes`, `insurance_cargo`, `insurance_truck`, `ifta_service`, `account_holder`, `prepass`, `load_board`, `trailer_rent`) VALUES
(2, '6001', 'Saiful', 'Sahim', 'Chittagong, Bangladesh', 'Chittagong', 'Chittagong', '4321', '01712440471', 'info@synchronisebd.com', '2018-06-27', '3456', '12345', '2018-07-06', '2018-07-12', '2018-07-13', '2018-07-13', 'Other', '23', '32', 2.000, 'Active', '', 0.000, 0.000, 0.000, 1, 0.000, 0.000, 0.000),
(3, '6002', 'Jake', 'Wolde', '12 River dr', 'st johns', 'fl', '32259', '649639462', 'test2gmail.com', '2018-06-27', '0340070707', '0347070', '2018-07-25', '2018-07-18', '2018-07-25', '2018-07-04', 'Percentage', '', '', 90.000, 'Active', '', 350.000, 100.000, 25.000, 1, 15.000, 25.000, 100.000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_equipment`
--

CREATE TABLE `tbl_equipment` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `unit_number` varchar(150) NOT NULL,
  `make` varchar(150) NOT NULL,
  `type` varchar(100) NOT NULL,
  `year` varchar(50) NOT NULL,
  `vin` varchar(150) NOT NULL,
  `plate_number` varchar(150) NOT NULL,
  `plate_expiry` date NOT NULL,
  `mileage` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `axels` varchar(100) NOT NULL,
  `fuel_type` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `deactivation_date` date NOT NULL,
  `dot_date` date NOT NULL,
  `ifta_truck` varchar(100) NOT NULL,
  `annual_date` date NOT NULL,
  `days_inspection_date` date NOT NULL,
  `truck` varchar(100) NOT NULL,
  `trailer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_equipment`
--

INSERT INTO `tbl_equipment` (`id`, `first_name`, `last_name`, `unit_number`, `make`, `type`, `year`, `vin`, `plate_number`, `plate_expiry`, `mileage`, `province`, `axels`, `fuel_type`, `weight`, `start_date`, `deactivation_date`, `dot_date`, `ifta_truck`, `annual_date`, `days_inspection_date`, `truck`, `trailer`) VALUES
(1, 'Saiful', 'Sahim', '1245', 'Samsung', 'Mobile', '2018', '2255', '20145', '2018-07-10', 'mileage', '2255', 'Demo', 'Demo', '25', '2018-07-10', '2018-07-12', '2018-07-12', 'Yes', '2018-07-19', '2018-07-21', 'CC4', 'CC2'),
(2, 'Jake', 'Wolde', '3342', 'FRHT', '', '2010', '304732047304707', '02340', '2018-07-11', '', '', '', '', '', '2018-07-10', '0000-00-00', '2018-07-18', 'Yes', '2018-07-18', '2018-07-26', '3342', '345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE `tbl_expense` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `vendor` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `account_holder` varchar(155) NOT NULL,
  `amount` double(18,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`id`, `date`, `vendor`, `description`, `account_holder`, `amount`) VALUES
(2, '2018-07-18', 'Furniture', 'Buying For', 'Kalyan Brata Chakraborty', 1000.000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_load_entry`
--

CREATE TABLE `tbl_load_entry` (
  `id` int(11) NOT NULL,
  `load_id` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_load` varchar(100) NOT NULL,
  `load_type` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `pick_up_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `dispatch_id` int(11) NOT NULL,
  `line_haul_rate` double(18,3) NOT NULL,
  `unloading` double(18,3) NOT NULL,
  `reimburse` varchar(100) NOT NULL,
  `detention` double(18,3) NOT NULL,
  `layover` double(18,3) NOT NULL,
  `other_charge` double(18,3) NOT NULL,
  `total_rate` double(18,3) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `truck` varchar(100) NOT NULL,
  `shipper_id` int(11) NOT NULL,
  `weight` double(18,3) NOT NULL,
  `qty` int(11) NOT NULL,
  `shipper_contact` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `consignee_id` int(11) NOT NULL,
  `consignee_contact` varchar(100) NOT NULL,
  `con_note` text NOT NULL,
  `empty_m` varchar(100) NOT NULL,
  `loaded_m` varchar(100) NOT NULL,
  `per_mile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_load_entry`
--

INSERT INTO `tbl_load_entry` (`id`, `load_id`, `customer_id`, `customer_load`, `load_type`, `date`, `pick_up_date`, `delivery_date`, `dispatch_id`, `line_haul_rate`, `unloading`, `reimburse`, `detention`, `layover`, `other_charge`, `total_rate`, `driver_id`, `truck`, `shipper_id`, `weight`, `qty`, `shipper_contact`, `note`, `consignee_id`, `consignee_contact`, `con_note`, `empty_m`, `loaded_m`, `per_mile`) VALUES
(1, '7001', 1, 'Nothing', 'TL', '2018-07-12', '2018-07-12', '2018-07-12', 1, 12.000, 13.000, 'Yes', 14.000, 13.000, 11.000, 56.000, 2, 'CC4', 2, 0.000, 0, '', '', 1, '22', '', '', '6.43', '1.86627'),
(3, '7003', 2, '3242', 'TL', '2018-07-14', '2018-07-13', '2018-07-16', 2, 1000.000, 100.000, 'Yes', 0.000, 0.000, 0.000, 1100.000, 3, '3342', 3, 0.000, 0, '', '', 2, '', '', '9,332.42', '547.56', '1.83');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `logo` varchar(155) NOT NULL,
  `currency` varchar(15) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longtitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `name`, `email`, `address`, `phone`, `logo`, `currency`, `latitude`, `longtitude`) VALUES
(1, 'Synchronise IT', 'info@hrelectronicsbd.com', 'GEC Circle Bus Stop, CDA Avenue, Chittagong, Bangladesh', '+8801976644447', 'image/9b92da8982edd90b75659fffacf31ea9.png', 'BDT', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shippers`
--

CREATE TABLE `tbl_shippers` (
  `id` int(11) NOT NULL,
  `shippers_id` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_zip` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `ext` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longtitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shippers`
--

INSERT INTO `tbl_shippers` (`id`, `shippers_id`, `name`, `address`, `city`, `postal_zip`, `state`, `contact`, `phone`, `ext`, `email`, `notes`, `latitude`, `longtitude`) VALUES
(2, '4001', 'Mr. X', 'Bangladesh', 'Chittagong, Bangladesh', '4321', 'Chittagong', '01712440471', '01712440471', 'Nothing', '', '', '22.356851', '91.78318190000005'),
(3, '4002', 'ELLISON FIRST ASIA', '212 Rice Road', 'Easley', '29640', 'SC', '', '', '', '', '', '34.829838', '-82.60152060000001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account_holder`
--
ALTER TABLE `tbl_account_holder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_consignee`
--
ALTER TABLE `tbl_consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_dispatch`
--
ALTER TABLE `tbl_dispatch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_holder` (`account_holder`);

--
-- Indexes for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_holder` (`account_holder`);

--
-- Indexes for table `tbl_load_entry`
--
ALTER TABLE `tbl_load_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `dispatch_id` (`dispatch_id`),
  ADD KEY `consignee_id` (`consignee_id`),
  ADD KEY `shipper_id` (`shipper_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shippers`
--
ALTER TABLE `tbl_shippers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account_holder`
--
ALTER TABLE `tbl_account_holder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_consignee`
--
ALTER TABLE `tbl_consignee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_dispatch`
--
ALTER TABLE `tbl_dispatch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_equipment`
--
ALTER TABLE `tbl_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_expense`
--
ALTER TABLE `tbl_expense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_load_entry`
--
ALTER TABLE `tbl_load_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_shippers`
--
ALTER TABLE `tbl_shippers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD CONSTRAINT `tbl_driver_ibfk_1` FOREIGN KEY (`account_holder`) REFERENCES `tbl_account_holder` (`id`);

--
-- Constraints for table `tbl_load_entry`
--
ALTER TABLE `tbl_load_entry`
  ADD CONSTRAINT `tbl_load_entry_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`id`),
  ADD CONSTRAINT `tbl_load_entry_ibfk_2` FOREIGN KEY (`dispatch_id`) REFERENCES `tbl_dispatch` (`id`),
  ADD CONSTRAINT `tbl_load_entry_ibfk_3` FOREIGN KEY (`consignee_id`) REFERENCES `tbl_consignee` (`id`),
  ADD CONSTRAINT `tbl_load_entry_ibfk_4` FOREIGN KEY (`shipper_id`) REFERENCES `tbl_shippers` (`id`),
  ADD CONSTRAINT `tbl_load_entry_ibfk_5` FOREIGN KEY (`driver_id`) REFERENCES `tbl_driver` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
