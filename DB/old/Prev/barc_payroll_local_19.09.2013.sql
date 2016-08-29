-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 10:16 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `barc_payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grade` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=70 ;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `title`, `grade`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 'Executive Chairman', 1, 1, 1379400704, 1379400704, '::1'),
(2, 'Member Director', 2, 1, 1379400704, 1379400704, '::1'),
(3, 'Director', 3, 1, 1379400704, 1379400704, '::1'),
(4, 'Chief Scientific Officer', 3, 1, 1379400704, 1379400704, '::1'),
(5, 'Principal Scientific Officer', 4, 1, 1379400704, 1379400704, '::1'),
(6, 'Principal Training Officer', 4, 1, 1379400704, 1379400704, '::1'),
(7, 'Principal Technical Officer', 4, 1, 1379400704, 1379400704, '::1'),
(8, 'Principal Documentation Officer', 4, 1, 1379400704, 1379400704, '::1'),
(9, 'Principal Librarian', 4, 1, 1379400704, 1379400704, '::1'),
(10, 'Senior System Analyst', 4, 1, 1379400704, 1379400704, '::1'),
(11, 'System Analyst/ Senior Programmer', 5, 1, 1379400704, 1379400704, '::1'),
(12, 'Deputy Director', 5, 1, 1379400704, 1379400704, '::1'),
(13, 'Senior Scientific Officer', 6, 1, 1379400704, 1379400704, '::1'),
(14, 'Senior Training Officer', 6, 1, 1379400704, 1379400704, '::1'),
(15, 'Senior Assistant Director', 6, 1, 1379400704, 1379400704, '::1'),
(16, 'Protocol Officer', 6, 1, 1379400704, 1379400704, '::1'),
(17, 'Executive Engineer', 6, 1, 1379400704, 1379400704, '::1'),
(18, 'Programmer', 6, 1, 1379400704, 1379400704, '::1'),
(19, 'Senior Scientific Editor', 6, 1, 1379400704, 1379400704, '::1'),
(20, 'Senior Documentation Officer', 6, 1, 1379400704, 1379400704, '::1'),
(21, 'Senior Reprography Officer', 6, 1, 1379400704, 1379400704, '::1'),
(22, 'MEDICAL OFFICER (PART TIME)', 6, 1, 1379400704, 1379400704, '::1'),
(23, 'Senior Reprografic Officer', 7, 1, 1379400704, 1379400704, '::1'),
(24, 'Assistant Director', 8, 1, 1379400704, 1379400704, '::1'),
(25, 'Graphic Designer', 9, 1, 1379400704, 1379400704, '::1'),
(26, 'Assistant director', 9, 1, 1379400704, 1379400704, '::1'),
(27, 'Personal Secretary', 9, 1, 1379400704, 1379400704, '::1'),
(28, 'Bibliography Officer', 9, 1, 1379400704, 1379400704, '::1'),
(29, 'Information Officer', 9, 1, 1379400704, 1379400704, '::1'),
(30, 'Data Entry Officer', 9, 1, 1379400704, 1379400704, '::1'),
(31, 'Junior Bibliography Officer', 10, 1, 1379400704, 1379400704, '::1'),
(32, 'Vehicle Visitor', 10, 1, 1379400704, 1379400704, '::1'),
(33, 'Secuirity Officer', 10, 1, 1379400704, 1379400704, '::1'),
(34, 'Site Engineer', 10, 1, 1379400704, 1379400704, '::1'),
(35, 'Maintenance Inspector', 10, 1, 1379400704, 1379400704, '::1'),
(36, 'Head Assistant', 11, 1, 1379400704, 1379400704, '::1'),
(37, 'Head Cashier', 11, 1, 1379400704, 1379400704, '::1'),
(38, 'Word Processing Assistant', 11, 1, 1379400704, 1379400704, '::1'),
(39, 'Accountant', 11, 1, 1379400704, 1379400704, '::1'),
(40, 'Assistant', 13, 1, 1379400704, 1379400704, '::1'),
(41, 'Accounts Assistant/ Auditor', 13, 1, 1379400704, 1379400704, '::1'),
(42, 'PA/ Stenographer', 13, 1, 1379400704, 1379400704, '::1'),
(43, 'Data Encoder', 13, 1, 1379400704, 1379400704, '::1'),
(44, 'Cataloger', 14, 1, 1379400704, 1379400704, '::1'),
(45, 'Proof Reader', 14, 1, 1379400704, 1379400704, '::1'),
(46, 'Upperdivision Assistant', 14, 1, 1379400704, 1379400704, '::1'),
(47, 'Micrography Assistant', 15, 1, 1379400704, 1379400704, '::1'),
(48, 'Auduo Visual Assistant', 15, 1, 1379400704, 1379400704, '::1'),
(49, 'PA Sustem Operator', 15, 1, 1379400704, 1379400704, '::1'),
(50, 'Driver (Heavy Vehicle)', 15, 1, 1379400704, 1379400704, '::1'),
(51, 'Central AC Operator', 16, 1, 1379400704, 1379400704, '::1'),
(52, 'Mechanic(Automobile)', 16, 1, 1379400704, 1379400704, '::1'),
(53, 'Driver (Small Vehicle)', 16, 1, 1379400704, 1379400704, '::1'),
(54, 'Store Clarck Cum Typist', 16, 1, 1379400704, 1379400704, '::1'),
(55, 'LDA Cum Typist', 16, 1, 1379400704, 1379400704, '::1'),
(56, 'Laboratory Technician', 16, 1, 1379400704, 1379400704, '::1'),
(57, 'Electritian', 16, 1, 1379400704, 1379400704, '::1'),
(58, 'Plamber', 16, 1, 1379400704, 1379400704, '::1'),
(59, 'Pamp Operator', 16, 1, 1379400704, 1379400704, '::1'),
(60, 'Telephone Operator', 16, 1, 1379400704, 1379400704, '::1'),
(61, 'Photocopy Machine Operator', 18, 1, 1379400704, 1379400704, '::1'),
(62, 'Duplicating Machine Operator', 18, 1, 1379400704, 1379400704, '::1'),
(63, 'Dispatch', 18, 1, 1379400704, 1379400704, '::1'),
(64, 'Binder', 18, 1, 1379400704, 1379400704, '::1'),
(65, 'MLSS', 20, 1, 1379400704, 1379400704, '::1'),
(66, 'Faras', 20, 1, 1379400704, 1379400704, '::1'),
(67, 'Malee', 20, 1, 1379400704, 1379400704, '::1'),
(68, 'Guard', 20, 1, 1379400704, 1379400704, '::1'),
(69, 'Sweeper', 20, 1, 1379400704, 1379400704, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `joining_date` int(11) NOT NULL,
  `grade` int(4) NOT NULL,
  `designation_id` int(4) NOT NULL,
  `service_status` int(4) NOT NULL DEFAULT '1',
  `quota_status` int(4) DEFAULT NULL,
  `nid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `present_address` text COLLATE utf8_unicode_ci,
  `permanent_address` text COLLATE utf8_unicode_ci,
  `cell` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_number` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `f_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `m_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_name` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_profession` int(4) DEFAULT NULL,
  `bank` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `account` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` int(4) DEFAULT NULL,
  `religion` int(4) DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
  `pay_scale` int(4) NOT NULL,
  `increment` int(11) NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT '1',
  `marital_status` tinyint(2) NOT NULL,
  `children` int(3) NOT NULL,
  `house_rent` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` int(20) DEFAULT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `employee_id`, `first_name`, `middle_name`, `last_name`, `joining_date`, `grade`, `designation_id`, `service_status`, `quota_status`, `nid`, `present_address`, `permanent_address`, `cell`, `other_number`, `email`, `f_name`, `m_name`, `s_name`, `s_profession`, `bank`, `account`, `blood_group`, `religion`, `dob`, `pay_scale`, `increment`, `gender`, `marital_status`, `children`, `house_rent`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 'GIS0109201301', 'Rajib', '', 'Mahmud', 1377993600, 4, 4, 1, NULL, '12345678901234567', 'Test', 'Test', '01755578981', '8857166', 'rajcse048@gmail.com', 'Md. Abdul Alim', 'Mrs. Salina Aktar', 'Dr. Amina Mahmud', 1, 'The City Bank Ltd.', '280121212000', 5, 1, 498787200, 22250, 900, 1, 1, 1, 1, 1, 1379410686, 1379410686, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `pay_scales`
--

DROP TABLE IF EXISTS `pay_scales`;
CREATE TABLE IF NOT EXISTS `pay_scales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grade` int(11) NOT NULL,
  `scale` decimal(10,0) NOT NULL,
  `increment` decimal(10,0) NOT NULL DEFAULT '0',
  `increment_iteration` int(5) NOT NULL DEFAULT '0',
  `eb` decimal(10,0) NOT NULL DEFAULT '0',
  `eb_iteration` int(5) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pay_scales`
--

INSERT INTO `pay_scales` (`id`, `grade`, `scale`, `increment`, `increment_iteration`, `eb`, `eb_iteration`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, '40000', '0', 0, '0', 0, 1, 1379395240, 1379395240, '::1'),
(2, 2, '33500', '1200', 5, '0', 0, 1, 1379396401, 1379396401, '::1'),
(3, 3, '29000', '1100', 6, '0', 0, 1, 1379396675, 1379396675, '::1'),
(4, 4, '25000', '1000', 8, '0', 0, 1, 1379397190, 1379397190, '::1'),
(5, 5, '22250', '900', 10, '0', 0, 1, 1379397267, 1379397267, '::1'),
(6, 6, '18500', '800', 14, '0', 0, 1, 1379397297, 1379397297, '::1'),
(7, 9, '11000', '490', 7, '540', 11, 1, 1379397363, 1379397363, '::1'),
(8, 10, '8000', '450', 7, '490', 11, 1, 1379397423, 1379397423, '::1'),
(9, 11, '6400', '415', 7, '450', 11, 1, 1379397464, 1379397464, '::1'),
(10, 13, '5500', '345', 7, '380', 11, 1, 1379397511, 1379397511, '::1'),
(11, 14, '5200', '320', 7, '345', 11, 1, 1379397568, 1379397568, '::1'),
(12, 15, '4900', '290', 7, '320', 11, 1, 1379397850, 1379397850, '::1'),
(13, 16, '4700', '265', 7, '290', 11, 1, 1379397892, 1379397892, '::1'),
(14, 18, '4400', '220', 7, '240', 11, 1, 1379397940, 1379397940, '::1'),
(15, 20, '4100', '190', 7, '210', 11, 1, 1379397974, 1379397974, '::1'),
(16, 7, '15000', '700', 16, '0', 0, 1, 1379402276, 1379402276, '::1'),
(17, 8, '12000', '600', 16, '0', 0, 1, 1379402314, 1379402314, '::1'),
(18, 12, '5900', '380', 7, '415', 11, 1, 1379405455, 1379405455, '::1'),
(19, 17, '4500', '240', 7, '265', 11, 1, 1379405606, 1379405606, '::1'),
(20, 19, '4250', '210', 7, '220', 11, 1, 1379405640, 1379405640, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `copyright` text COLLATE utf8_unicode_ci NOT NULL,
  `pay_scale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updted` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Application Basic Settings' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `admin_email`, `copyright`, `pay_scale`, `status`, `created`, `updted`, `terminal`) VALUES
(1, 'BARC - (Payroll)', 'admin@barc.gov.bd', 'Copyright Â© 2013 Bangladesh Agricultural Research Council', 'National Pay Scale 2009', 1, 1379326029, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(2) NOT NULL COMMENT '1 = "Admin"',
  `dob` int(20) NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0 = Inactive, 1 = Active',
  `sq` int(20) NOT NULL COMMENT 'Security Question',
  `ans` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Security Answer',
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'security key',
  `created` int(20) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='User information table' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `user_name`, `type`, `dob`, `email`, `password`, `status`, `sq`, `ans`, `key`, `created`, `terminal`) VALUES
(1, 'Bangladesh', 'Agricultural', 'Research Council', 'admin', 1, 1264204800, 'admin@barc.com', 'b4af804009cb036a4ccdc33431ef9ac9', 1, 0, '', '0', 1264204800, '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
