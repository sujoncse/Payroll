-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2013 at 09:13 PM
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
-- Table structure for table `charges`
--

DROP TABLE IF EXISTS `charges`;
CREATE TABLE IF NOT EXISTS `charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `taken` int(11) NOT NULL,
  `released` int(11) DEFAULT NULL,
  `charged_grade` int(11) NOT NULL,
  `charged_designation` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL COMMENT '0 = Regular, 1 = Aditional Charge, 2 = Current Charge',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `user_id`, `employee_id`, `taken`, `released`, `charged_grade`, `charged_designation`, `status`, `created`, `updated`, `terminal`) VALUES
(4, 1, 1, 1381017600, 1385510400, 2, 2, 0, 1383331863, 1385337600, '::1'),
(5, 1, 1, 1383609600, 1385596800, 2, 2, 0, 1383334547, 1385337600, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

DROP TABLE IF EXISTS `deductions`;
CREATE TABLE IF NOT EXISTS `deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `cpf1` double NOT NULL DEFAULT '0',
  `cpf2` double DEFAULT '0',
  `arrear_cpf` double DEFAULT '0',
  `cpf_loan1` double DEFAULT '0',
  `cpf_loan2` double DEFAULT '0',
  `house_loan` double DEFAULT '0',
  `vehicle_loan` double DEFAULT '0',
  `cpf_interest` double DEFAULT '0',
  `hv_interest` double DEFAULT '0',
  `benevolent_fund` double DEFAULT '0',
  `house_rent_deduct` double DEFAULT '0',
  `transport_bill` double DEFAULT '0',
  `personal_vehicle` double DEFAULT '0',
  `group_insurance` int(11) DEFAULT '0',
  `w_s` double DEFAULT '0',
  `fuel` double DEFAULT '0',
  `overdrawn` double DEFAULT '0',
  `phone_bill` double DEFAULT '0',
  `tax` double DEFAULT '0',
  `miscellaneous_deduct` double DEFAULT '0',
  `total_sub` double NOT NULL,
  `in_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `user_id`, `designation_id`, `employee_id`, `salary_id`, `grade`, `cpf1`, `cpf2`, `arrear_cpf`, `cpf_loan1`, `cpf_loan2`, `house_loan`, `vehicle_loan`, `cpf_interest`, `hv_interest`, `benevolent_fund`, `house_rent_deduct`, `transport_bill`, `personal_vehicle`, `group_insurance`, `w_s`, `fuel`, `overdrawn`, `phone_bill`, `tax`, `miscellaneous_deduct`, `total_sub`, `in_word`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 11, 1, 1, 0, 1208, 363, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, NULL, NULL, 97, NULL, NULL, NULL, 1683, '', 1, 1382524793, 1383337642, '::1');

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
  `pay_scale_id` int(11) NOT NULL,
  `total_increment` decimal(10,0) NOT NULL,
  `increment_number` int(11) NOT NULL DEFAULT '0',
  `employee_code` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `joining_date` int(11) NOT NULL,
  `grade` int(4) NOT NULL,
  `joining_grade` int(5) NOT NULL,
  `designation_id` int(4) NOT NULL,
  `joining_designation` int(5) NOT NULL,
  `service_status` int(4) NOT NULL DEFAULT '1',
  `other_quota_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quota_status` int(4) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created` int(20) DEFAULT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `pay_scale_id`, `total_increment`, `increment_number`, `employee_code`, `first_name`, `middle_name`, `last_name`, `joining_date`, `grade`, `joining_grade`, `designation_id`, `joining_designation`, `service_status`, `other_quota_status`, `quota_status`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 3, '5500', 0, 'GIS001', 'Rajib', '', 'Mahmud', 1356998400, 3, 6, 3, 18, 1, '', NULL, 1, 1382432836, 1383337624, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `employee_personals`
--

DROP TABLE IF EXISTS `employee_personals`;
CREATE TABLE IF NOT EXISTS `employee_personals` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
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
  `other_relegion_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` int(11) DEFAULT NULL,
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
-- Dumping data for table `employee_personals`
--

INSERT INTO `employee_personals` (`id`, `employee_id`, `nid`, `present_address`, `permanent_address`, `cell`, `other_number`, `email`, `f_name`, `m_name`, `s_name`, `s_profession`, `bank`, `account`, `blood_group`, `religion`, `other_relegion_status`, `dob`, `gender`, `marital_status`, `children`, `house_rent`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, '12345678901234567', 'Dhaka', '', '01755578981', '8857166', 'rajcse048@gmail.com', 'Md. Abdul Alim', 'Mrs. Salina Aktar', 'Dr. Amina Mahmud', 3, 'Agrani Bank Ltd.', '2801218000001', 5, 1, NULL, 467251200, 1, 1, 1, 1, 1, 1382432836, 1382432836, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `increments`
--

DROP TABLE IF EXISTS `increments`;
CREATE TABLE IF NOT EXISTS `increments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `increment_date` int(11) NOT NULL,
  `previous_total` decimal(10,0) NOT NULL,
  `previous_number` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `increments`
--

INSERT INTO `increments` (`id`, `user_id`, `employee_id`, `increment_date`, `previous_total`, `previous_number`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1382400000, '9000', 10, 1, 1383029020, 1383029020, '::1'),
(2, 1, 1, 1382004800, '9900', 11, 1, 1383030046, 1383030046, '::1'),
(3, 1, 1, 1383004800, '9900', 12, 1, 1383037367, 1383037367, '::1');

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
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
CREATE TABLE IF NOT EXISTS `promotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `promotion_date` int(11) NOT NULL,
  `previous_grade` int(11) NOT NULL,
  `previous_designation` int(11) NOT NULL,
  `previous_total_increment` decimal(10,0) NOT NULL,
  `previous_increment_number` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `user_id`, `employee_id`, `promotion_date`, `previous_grade`, `previous_designation`, `previous_total_increment`, `previous_increment_number`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1377993600, 5, 11, '4500', 5, 1, 1383128321, 1383128321, '::1'),
(2, 1, 1, 1378166400, 4, 10, '5000', 0, 1, 1383129875, 1383129875, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
CREATE TABLE IF NOT EXISTS `salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `basic` double NOT NULL,
  `house_rent` double NOT NULL,
  `medical` int(11) NOT NULL,
  `pp` double DEFAULT '0',
  `edu` int(11) DEFAULT '0',
  `charge` double DEFAULT '0',
  `dearness` double DEFAULT '0',
  `conveyance` int(11) DEFAULT '0',
  `tiffin` int(11) DEFAULT '0',
  `washing` int(11) DEFAULT '0',
  `deputation` int(11) DEFAULT '0',
  `aid` int(11) DEFAULT '0',
  `sumptuary` int(11) DEFAULT '0',
  `arrear` double DEFAULT '0',
  `miscellaneous` double DEFAULT '0',
  `fraction_increment` double DEFAULT '0',
  `total_add` double NOT NULL,
  `payable` double NOT NULL,
  `in_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(6) NOT NULL COMMENT '0 = Inactive, 1 = Active, 2 = Increment, 3 = Promotion, 4 = Ad Ch, 5= CC, 6 = Selection Grade, 7 = Time Scale, 8 = Redt. 9 = Deputation, 10 = Lien, 11 = PRL',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `designation_id`, `employee_id`, `grade`, `basic`, `house_rent`, `medical`, `pp`, `edu`, `charge`, `dearness`, `conveyance`, `tiffin`, `washing`, `deputation`, `aid`, `sumptuary`, `arrear`, `miscellaneous`, `fraction_increment`, `total_add`, `payable`, `in_word`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 3, 1, 3, 14500, 7975, 700, NULL, 200, 0, 2900, NULL, NULL, NULL, NULL, NULL, 600, NULL, NULL, NULL, 26875, 25192, 'BDT twenty five thousand one hundred ninety two.', 4, 1383027103, 1383337642, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `salary_settings`
--

DROP TABLE IF EXISTS `salary_settings`;
CREATE TABLE IF NOT EXISTS `salary_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='basic salary settings' AUTO_INCREMENT=1 ;

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
