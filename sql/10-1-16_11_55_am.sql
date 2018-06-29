-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 07:22 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `firstName`, `lastName`, `gender`, `address`, `dob`, `photo`) VALUES
(1, 'Airi', 'Satou', 'female', 'Tokyo', '1964-03-04', NULL),
(2, 'Garrett', 'Winters', 'male', 'Tokyo', '1988-09-02', NULL),
(3, 'John', 'Doe', 'male', 'Kansas', '1972-11-02', NULL),
(4, 'Tatyana', 'Fitzpatrick', 'male', 'London', '1989-01-01', NULL),
(5, 'Quinn', 'Flynn', 'male', 'Edinburgh', '1977-03-24', NULL),
(6, 'Anitha', 'Sugumaran', 'female', 'no 111k\r\ndjfhsd\r\nsdjfk', '1977-03-24', '1482208498081.png'),
(10, 'an', 'nn', 'male', 'hhh', '2016-12-08', '1482812933919.jpg'),
(13, 'jh', 'jj', 'male', 'kk', '1990-10-10', '1482830180954.png'),
(14, 'aa', 'aa', 'male', 'ssds', '0000-00-00', '1482827895440.png'),
(16, 'anitha', 'sugumaran', 'female', 'jdfhdfh', '2016-12-16', '1483002963263.jpg'),
(17, 'hh', 'hh', 'male', 'kk', '2016-12-30', '1483073855347.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_no` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `street1` varchar(200) NOT NULL,
  `street2` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `email_id` varchar(250) NOT NULL,
  `emp_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_no`, `branch_name`, `street1`, `street2`, `city`, `state`, `country`, `phone_no`, `email_id`, `emp_no`) VALUES
(1, 'KEDAH', 'KEDAH_ST1', 'KEDAH_ST2', 'KEDAH_CITY', 'KEDAH_STATE', 'KEDAH_COUNTRY', 456, 'fff', 1),
(8, 'KL', 'KL_1', 'KL-2', 'KL_CITY', 'KL_STATE', 'KL', 0, '', 0),
(9, 'brancj', 's1', 's2', 'cc', 'cc', 'cc', 12345667890, 'b1@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cabinname`
--

CREATE TABLE `tbl_cabinname` (
  `cabinName_no` int(10) NOT NULL,
  `cabinName` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cabinname`
--

INSERT INTO `tbl_cabinname` (`cabinName_no`, `cabinName`) VALUES
(1, 'aaaa'),
(2, 'cc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_no` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_no`, `designation`, `created_by`, `created_on`, `updated_by`, `updated_on`) VALUES
(2, 'VO1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'officer', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `street1` varchar(255) DEFAULT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone_number` varchar(25) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `branch_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `ename`, `dob`, `designation`, `street1`, `street2`, `city`, `state`, `country`, `phone_number`, `email`, `password`, `photo`, `branch_no`) VALUES
(1, 'General Secretory        ', '2017-02-02', 'GS        ', 'street', 'aa', 'aa', 'aa', 'aa', '123', 'gs@nube.org', '', '1483948837036.jpg', 0),
(5, 'Front Desk', '2017-01-02', 'FrontDesk', 'hh', 'hh', 'h', 'hh', 'h', 'h', 'frontdesk@nube.org', '123', '1483346991334.png', 0),
(6, 'Officer', '2017-01-03', 'Officer', '111', '111', '11', '111', '111', '111', 'officer@nube.org', '123', NULL, 1),
(7, 'AGS', '1980-01-24', 'AGS', 's1', 's2', 'cc', 'ss', 'cc', '9787596516', 'ags@gmail.com', '123', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_no` int(11) NOT NULL,
  `mail_no` int(11) NOT NULL,
  `assigned_employee_no` int(11) NOT NULL,
  `give_time_complete` varchar(10) NOT NULL,
  `reason_for_decline` text NOT NULL,
  `transfered_emp_no` int(11) NOT NULL,
  `reason_for_transfered` text NOT NULL,
  `follow_up_date` date NOT NULL,
  `pending_time_required` varchar(10) NOT NULL,
  `filed_cabin` varchar(30) NOT NULL,
  `filed_emp_no` int(11) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`log_no`, `mail_no`, `assigned_employee_no`, `give_time_complete`, `reason_for_decline`, `transfered_emp_no`, `reason_for_transfered`, `follow_up_date`, `pending_time_required`, `filed_cabin`, `filed_emp_no`, `status`) VALUES
(1, 1, 6, '3', '', 0, '', '0000-00-00', '', '', 0, 'ASSIGN'),
(2, 1, 6, '3', '', 0, '', '0000-00-00', '', '', 0, 'ACCEPT'),
(3, 1, 6, '3', '', 0, '', '0000-00-00', '', '', 0, 'COMPLETED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mail`
--

CREATE TABLE `tbl_mail` (
  `mail_no` int(11) NOT NULL,
  `organisation_name` varchar(150) NOT NULL,
  `sender_name` varchar(150) NOT NULL,
  `mail_description` text NOT NULL,
  `reference_no` varchar(20) NOT NULL,
  `mail_through` varchar(7) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'UNASSIGNED'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mail`
--

INSERT INTO `tbl_mail` (`mail_no`, `organisation_name`, `sender_name`, `mail_description`, `reference_no`, `mail_through`, `status`) VALUES
(4, 'name', 'sender', 'description', '', 'FAX', 'UNASSIGNED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mk_product_sale`
--

CREATE TABLE `tbl_mk_product_sale` (
  `product_sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_company` varchar(150) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'OPEN',
  `insert_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logged_in` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `emp_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `user_type`, `email`, `logged_in`, `last_login`, `first_name`, `middle_name`, `last_name`, `emp_no`) VALUES
(1, '123', 'GS', 'gs@nube.org', 'TRUE', '2017-01-10 04:59:42', 'General Secretory        ', '', '', 1),
(2, '123', 'FrontDesk', 'frontdesk@gmail.com', 'TRUE', '2017-01-10 05:00:31', 'Front Desk', '', '', 5),
(3, '123', 'Officer', 'officer@nube.org', 'FALSE', '2017-01-09 12:21:39', 'Officer', '', '', 6),
(4, '123', 'AGS', 'ags@gmail.com', '', '0000-00-00 00:00:00', 'AGS', '', '', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_no`);

--
-- Indexes for table `tbl_cabinname`
--
ALTER TABLE `tbl_cabinname`
  ADD PRIMARY KEY (`cabinName_no`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_no`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_no`);

--
-- Indexes for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  ADD PRIMARY KEY (`mail_no`);

--
-- Indexes for table `tbl_mk_product_sale`
--
ALTER TABLE `tbl_mk_product_sale`
  ADD PRIMARY KEY (`product_sale_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_cabinname`
--
ALTER TABLE `tbl_cabinname`
  MODIFY `cabinName_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_mail`
--
ALTER TABLE `tbl_mail`
  MODIFY `mail_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_mk_product_sale`
--
ALTER TABLE `tbl_mk_product_sale`
  MODIFY `product_sale_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
