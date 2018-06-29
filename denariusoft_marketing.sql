-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2018 at 01:29 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `denariusoft_marketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `gender` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `gender`) VALUES
(7, 'a', ''),
(8, 'a', ''),
(9, 'a', ''),
(10, 'a', ''),
(11, 'a', ''),
(12, 'aaaa3434343', ''),
(13, 'asa22', ''),
(14, 'aaa', 'aa'),
(15, 'aaa', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `branch_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `ename`, `dob`, `designation`, `street1`, `street2`, `city`, `state`, `country`, `phone_number`, `email`, `password`, `photo`, `branch_no`) VALUES
(8, 'Super Admin', '2017-01-04', 'SUPERADMIN', 'hh', 'hh', 'hh', 'h', 'hh', 'h', 'gow@gmail.com', '123', NULL, 1),
(13, 'admin', '2017-01-04', 'ADMIN', 's1', 's2', 'cc', 'ss', 'ss', 'ss', 'admin', '123', NULL, 0),
(14, 'Mk1', '2017-01-04', 'MARKETINGPERSON', 'sa', 'sa', 'sa', 'sa', 'sa', '1223', 'mk', '123', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mk_product_sale`
--

CREATE TABLE IF NOT EXISTS `tbl_mk_product_sale` (
  `product_sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `buyer_company` varchar(150) NOT NULL,
  `contact_person` varchar(150) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `mode_of_payment` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'OPEN',
  `insert_date` date NOT NULL,
  `emp_no` int(11) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`product_sale_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_mk_product_sale`
--

INSERT INTO `tbl_mk_product_sale` (`product_sale_id`, `product_id`, `buyer_company`, `contact_person`, `phone_number`, `email`, `mode_of_payment`, `status`, `insert_date`, `emp_no`, `serial_number`) VALUES
(1, 1, 'abc', 'anitha', 1234567, 'aaa@gmail.com', 'CASH', 'CLOSED', '2017-01-17', 14, '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) NOT NULL,
  `selling_price` double(18,2) NOT NULL,
  `commission` double(18,2) NOT NULL,
  `log_date` date NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `selling_price`, `commission`, `log_date`) VALUES
(1, 'Temple Mangement', 699.00, 100.00, '2017-01-11'),
(2, 'ChequeWritePro', 1110.00, 120.00, '2017-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `logged_in` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `emp_no` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`, `user_type`, `email`, `logged_in`, `last_login`, `first_name`, `middle_name`, `last_name`, `emp_no`) VALUES
(33, '123', 'SUPERADMIN', 'sadmin', 'FALSE', '2017-02-28 03:08:19', 'Super Admin', '', '', 8),
(40, '123', 'ADMIN', 'admin', 'TRUE', '2017-02-28 02:23:02', 'admin', '', '', 13),
(41, '', 'MARKETINGPERSON', 'mk', 'FALSE', '2017-02-04 07:11:48', 'Mk1', '', '', 14);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
