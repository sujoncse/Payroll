-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2013 at 07:43 PM
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
  `basic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `on_charge` int(11) NOT NULL COMMENT 'onCharge',
  `type` tinyint(2) NOT NULL COMMENT '1 = Aditional Charge, 2 = Current Charge',
  `status` tinyint(3) NOT NULL COMMENT '0 = Not payment yet, 1 = Payment received, 2 = Payment continued',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`id`, `user_id`, `employee_id`, `taken`, `released`, `charged_grade`, `charged_designation`, `basic`, `amount`, `on_charge`, `type`, `status`, `created`, `updated`, `terminal`) VALUES
(2, 1, 7, 1384646400, 1386547200, 3, 3, '27750(22)', 2009, 22, 1, 1, 1386656958, 1386657850, '::1'),
(3, 1, 7, 1384041600, 1386460800, 3, 3, '27750(28)', 2216, 28, 1, 1, 1386658623, 1386658943, '::1'),
(4, 1, 7, 1384214400, 1384905600, 3, 3, '27750(9)', 0, 9, 1, 1, 1386659008, 1386660040, '::1'),
(5, 1, 7, 1384041600, 1386547200, 3, 3, '27750(29)', 2306, 29, 1, 1, 1386664002, 1386940227, '::1'),
(6, 1, 7, 1385942400, 1386547200, 3, 3, '27750(8)', 0, 8, 2, 1, 1386669877, 1386670082, '::1'),
(7, 1, 7, 1384041600, 1386460800, 3, 3, '27750(28)', 2216, 28, 2, 1, 1386670121, 1386670312, '::1'),
(8, 1, 7, 1384041600, 1386460800, 3, 3, '27750(28)', 2216, 28, 2, 1, 1386670460, 1386670603, '::1'),
(9, 1, 7, 1384041600, 1386460800, 3, 3, '27750(28)', 2216, 28, 2, 1, 1386670854, 1386670909, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `cpfs`
--

DROP TABLE IF EXISTS `cpfs`;
CREATE TABLE IF NOT EXISTS `cpfs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `cpf1` int(11) NOT NULL,
  `cpf2` int(11) NOT NULL,
  `arrear_cpf` int(11) DEFAULT '0',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `cpfs`
--

INSERT INTO `cpfs` (`id`, `user_id`, `employee_id`, `salary_id`, `cpf1`, `cpf2`, `arrear_cpf`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1, 3332, 1000, 0, 1387261938, 1387261938, '::1'),
(2, 1, 2, 2, 2990, 898, 0, 1387261938, 1387261938, '::1'),
(3, 1, 3, 3, 2978, 894, 0, 1387261938, 1387261938, '::1'),
(4, 1, 4, 4, 2874, 863, 0, 1387261938, 1387261938, '::1'),
(5, 1, 5, 5, 2691, 808, 0, 1387261938, 1387261938, '::1'),
(6, 1, 6, 6, 2412, 724, 0, 1387261938, 1387261938, '::1'),
(7, 1, 7, 7, 2312, 694, 0, 1387261938, 1387261938, '::1'),
(8, 1, 1, 1, 3332, 1000, 0, 1387864619, 1387864619, '::1'),
(9, 1, 1, 1, 3332, 1000, 0, 1387864619, 1387864619, '::1'),
(10, 1, 2, 2, 3061, 919, 0, 1387863626, 1387863626, '::1'),
(11, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(12, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(13, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(14, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(15, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(16, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(17, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(18, 1, 2, 2, 3061, 919, 0, 1387864619, 1387864619, '::1'),
(19, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(20, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(21, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(22, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(23, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(24, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(25, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(26, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(27, 1, 3, 3, 2978, 894, 0, 1387864619, 1387864619, '::1'),
(28, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(29, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(30, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(31, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(32, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(33, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(34, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(35, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(36, 1, 4, 4, 2874, 863, 0, 1387864619, 1387864619, '::1'),
(37, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(38, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(39, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(40, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(41, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(42, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(43, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(44, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(45, 1, 5, 5, 2691, 808, 0, 1387864619, 1387864619, '::1'),
(46, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(47, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(48, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(49, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(50, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(51, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(52, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(53, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(54, 1, 6, 6, 2412, 724, 0, 1387864619, 1387864619, '::1'),
(55, 1, 7, 7, 2312, 694, 0, 1387864619, 1387864619, '::1');

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
  `association` int(11) DEFAULT '0',
  `tax` double DEFAULT '0',
  `miscellaneous_deduct` double DEFAULT '0',
  `total_sub` double NOT NULL,
  `in_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `user_id`, `designation_id`, `employee_id`, `salary_id`, `grade`, `cpf1`, `cpf2`, `arrear_cpf`, `cpf_loan1`, `cpf_loan2`, `house_loan`, `vehicle_loan`, `cpf_interest`, `hv_interest`, `benevolent_fund`, `house_rent_deduct`, `transport_bill`, `personal_vehicle`, `group_insurance`, `w_s`, `fuel`, `overdrawn`, `phone_bill`, `association`, `tax`, `miscellaneous_deduct`, `total_sub`, `in_word`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1, 1, 1, 3332, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 3000, 1000, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, 8397, '', 1, 1385616833, 1385616833, '::1'),
(2, 1, 2, 2, 2, 2, 3061, 919, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, 200, NULL, 100, NULL, NULL, 4345, '', 1, 1387089616, 1387863626, '::1'),
(3, 1, 2, 3, 3, 2, 2978, 894, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, 3937, '', 1, 1385458526, 1385458526, '::1'),
(4, 1, 3, 4, 4, 3, 3450, 1725, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, 100, NULL, NULL, 5340, '', 2, 1385460360, 1388055053, '::1'),
(5, 1, 4, 5, 5, 3, 2691, 808, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, 3564, '', 1, 1385527485, 1385527485, '::1'),
(6, 1, 5, 6, 6, 4, 2412, 724, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, 0, NULL, NULL, 3201, '', 1, 1385617714, 1385617714, '::1'),
(7, 1, 10, 7, 7, 4, 2312, 694, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, 200, NULL, 100, NULL, NULL, 3371, '', 1, 1387431519, 1387431519, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `deputations`
--

DROP TABLE IF EXISTS `deputations`;
CREATE TABLE IF NOT EXISTS `deputations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `taken` int(11) NOT NULL,
  `released` int(11) DEFAULT NULL,
  `deputate_grade` int(11) NOT NULL,
  `deputate_designation` int(11) NOT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `basic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ctype` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1 = CPF, 2 = GPF',
  `percentage` double NOT NULL DEFAULT '8.33',
  `percentage2` double DEFAULT NULL,
  `amount` double NOT NULL,
  `on_charge` int(11) NOT NULL COMMENT 'onCharge',
  `type` tinyint(2) NOT NULL COMMENT '''1''=>''From Other Organization'',''2''=>''To Other Organization'',"3"=>"For Higher Study"',
  `status` tinyint(3) NOT NULL COMMENT '0 = No, 1 = Yes',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `deputations`
--

INSERT INTO `deputations` (`id`, `user_id`, `employee_id`, `taken`, `released`, `deputate_grade`, `deputate_designation`, `organization`, `basic`, `ctype`, `percentage`, `percentage2`, `amount`, `on_charge`, `type`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 4, 1386633600, NULL, 3, 3, 'Test', '34500(21)', 2, 10, 5, 4674, 21, 1, 2, 1388053443, 1388054042, '::1');

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
  `other_quota_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quota_status` int(4) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '0 = Retired/Resign, 1 = Regular, 2 = Aditional Charge, 3 = Current Charge, 4 = Deputation, 5 = Lien, 6 = PRL',
  `created` int(20) DEFAULT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `pay_scale_id`, `total_increment`, `increment_number`, `employee_code`, `first_name`, `middle_name`, `last_name`, `joining_date`, `grade`, `joining_grade`, `designation_id`, `joining_designation`, `other_quota_status`, `quota_status`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, '0', 0, '23', 'Dr. Wise', '', 'Kabir', 315014400, 1, 6, 1, 13, '', NULL, 1, 1385616821, 1385616821, '::1'),
(2, 1, 2, '3600', 3, '101', 'Dr. M. Khalekuzzaman', 'Akand', 'Choudhory', 341884800, 2, 6, 2, 13, '', NULL, 1, 1387089468, 1387863611, '::1'),
(3, 1, 2, '2247', 1, '28', 'DR. S.K.', ' GHULAM', 'HUSSAIN', 347155200, 2, 6, 2, 13, '', NULL, 1, 1385458265, 1385458265, '::1'),
(4, 1, 3, '5500', 5, '40', 'Md. Abeed', 'Hossain', 'Chowdhury', 347155200, 3, 5, 3, 12, '', NULL, 4, 1387078822, 1388053444, '::1'),
(5, 1, 3, '3300', 3, '109', 'Dr. Abul', 'Kalam', 'Azad', 473385600, 3, 7, 4, 13, '', NULL, 1, 1385527440, 1385527440, '::1'),
(6, 1, 4, '3950', 2, '139', 'Dr. Md. ', 'Baktear', 'Hossain', 499824000, 4, 7, 5, 13, '', NULL, 1, 1385617689, 1385617689, '::1'),
(7, 1, 4, '2750', 2, '152', 'Hasan Md.', 'Hamidur', 'Rahman', 1104624000, 4, 7, 10, 18, '', NULL, 3, 1387431495, 1387431495, '::1');

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
  `other_religion_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee_personals`
--

INSERT INTO `employee_personals` (`id`, `employee_id`, `nid`, `present_address`, `permanent_address`, `cell`, `other_number`, `email`, `f_name`, `m_name`, `s_name`, `s_profession`, `bank`, `account`, `blood_group`, `religion`, `other_religion_status`, `dob`, `gender`, `marital_status`, `children`, `house_rent`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, '12345678901234567', 'BARC', 'BARC', '01934567891', '', '', 'Test', 'Test', 'Test', 1, 'Agrani Bank Ltd.', '109555', 1, 1, '', -347155200, 1, 1, 1, 0, 1, 1385454585, 1385616821, '::1'),
(2, 2, '12345678901234560', 'Test', 'Test', '01934567892', '', '', 'Test', 'Test', NULL, NULL, 'Agrani Bank Ltd.', '108441', 3, 2, '', -289267200, 1, 1, 2, 1, 1, 1385457671, 1387089468, '::1'),
(3, 3, '12345678901234561', 'Test', 'Test', '01934567893', '', '', 'Test', 'Test', 'Test', 2, 'Agrani Bank Ltd.', '109489', 3, 3, NULL, -283996800, 1, 1, 0, 1, 1, 1385458265, 1385458265, '::1'),
(4, 4, '12345678901234562', 'Test', 'Test', '01934567894', '', '', 'Test', 'Test', NULL, NULL, 'Agrani Bank Ltd.', '109423', 5, 4, '', -283996800, 1, 1, 1, 1, 1, 1385460279, 1387078822, '::1'),
(5, 5, '12345678901234563', 'Test', 'Test', '01934567895', '', '', 'Test', 'Test', 'Test', 1, 'Agrani Bank Ltd.', '110579', 7, 1, NULL, 26265600, 1, 1, 2, 1, 1, 1385527440, 1385527440, '::1'),
(6, 6, '12345678901234564', 'Test', 'Test', '01934567896', '', '', 'Test', 'Test', 'Test', 1, 'Agrani Bank Ltd.', '119273', 5, 2, '', 26265600, 1, 1, 1, 1, 1, 1385527745, 1385617689, '::1'),
(7, 7, '12345678901234566', 'Test', 'Test', '01934567897', '', '', 'Test', 'Test', NULL, NULL, 'Agrani Bank Ltd.', '126807', 8, 0, '', 315532800, 1, 1, 0, 1, 1, 1385531441, 1387431495, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `festival_allowances`
--

DROP TABLE IF EXISTS `festival_allowances`;
CREATE TABLE IF NOT EXISTS `festival_allowances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `basic` double NOT NULL,
  `religion` int(4) NOT NULL COMMENT '1 = Muslim, 2 = Hinduism, 3 = Cristian, 4 = Buddhist',
  `payable` double NOT NULL,
  `in_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `approve_date` int(11) NOT NULL,
  `festival` int(5) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0 = Disapprove, 1 = Approve',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `festival_allowances`
--

INSERT INTO `festival_allowances` (`id`, `user_id`, `designation_id`, `employee_id`, `grade`, `basic`, `religion`, `payable`, `in_word`, `approve_date`, `festival`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1, 1, 40000, 1, 40000, 'Tk. forty thousand  only', 1386633600, 1, 1, 1388384480, 1388384480, '::1'),
(2, 1, 4, 5, 3, 32300, 1, 32300, 'Tk. thirty-two thousand three hundred only', 1386633600, 1, 1, 1388384480, 1388384480, '::1'),
(3, 1, 2, 2, 2, 37100, 2, 74200, 'Tk. seventy-four thousand two hundred only', 1388016000, 3, 1, 1388385099, 1388385099, '::1'),
(4, 1, 5, 6, 4, 28950, 2, 57900, 'Tk. fifty-seven thousand nine hundred only', 1388016000, 3, 1, 1388385099, 1388385099, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `fixations`
--

DROP TABLE IF EXISTS `fixations`;
CREATE TABLE IF NOT EXISTS `fixations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_id` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='basic salary settings' AUTO_INCREMENT=17 ;

--
-- Dumping data for table `fixations`
--

INSERT INTO `fixations` (`id`, `salary_id`, `status`, `created`, `updated`, `terminal`) VALUES
(2, 7, 4, 1385769600, 1385769600, '::1'),
(3, 7, 4, 1385769600, 1385769600, '::1'),
(4, 7, 4, 1385769600, 1385769600, '::1'),
(5, 7, 4, 1385769600, 1385769600, '::1'),
(6, 7, 5, 1385769600, 1385769600, '::1'),
(7, 7, 5, 1385769600, 1385769600, '::1'),
(8, 7, 5, 1385769600, 1385769600, '::1'),
(9, 7, 5, 1385769600, 1385769600, '::1'),
(10, 2, 2, 1385769600, 1385769600, '::1'),
(11, 4, 9, 1388048716, 1388048716, '::1'),
(12, 4, 9, 1388048788, 1388048788, '::1'),
(13, 4, 9, 1388052380, 1388052380, '::1'),
(14, 4, 9, 1388053309, 1388053309, '::1'),
(15, 4, 9, 1388053347, 1388053347, '::1'),
(16, 4, 9, 1388053443, 1388053443, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `generated_deductions`
--

DROP TABLE IF EXISTS `generated_deductions`;
CREATE TABLE IF NOT EXISTS `generated_deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `deduction_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `generated_deductions`
--

INSERT INTO `generated_deductions` (`id`, `user_id`, `designation_id`, `employee_id`, `salary_id`, `deduction_id`, `grade`, `cpf1`, `cpf2`, `arrear_cpf`, `cpf_loan1`, `cpf_loan2`, `house_loan`, `vehicle_loan`, `cpf_interest`, `hv_interest`, `benevolent_fund`, `house_rent_deduct`, `transport_bill`, `personal_vehicle`, `group_insurance`, `w_s`, `fuel`, `overdrawn`, `phone_bill`, `tax`, `miscellaneous_deduct`, `total_sub`, `in_word`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1, 1, 1, 1, 3332, 1000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, 3000, 1000, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 8397, '', 0, 1385616833, 1388429668, '::1'),
(2, 1, 2, 2, 2, 2, 2, 3061, 919, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, 200, NULL, NULL, NULL, 4345, '', 0, 1387089616, 1388429668, '::1'),
(3, 1, 2, 3, 3, 3, 2, 2978, 894, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 3937, '', 0, 1385458526, 1388429668, '::1'),
(4, 1, 3, 4, 4, 4, 3, 3450, 1725, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 5340, '', 0, 1385460360, 1388429668, '::1'),
(5, 1, 4, 5, 5, 5, 3, 2691, 808, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 3564, '', 0, 1385527485, 1388429668, '::1'),
(6, 1, 5, 6, 6, 6, 4, 2412, 724, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, NULL, NULL, NULL, NULL, 3201, '', 0, 1385617714, 1388429668, '::1'),
(7, 1, 10, 7, 7, 7, 4, 2312, 694, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 50, NULL, NULL, NULL, 15, NULL, NULL, 200, NULL, NULL, NULL, 3371, '', 0, 1387431519, 1388429668, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `generated_salaries`
--

DROP TABLE IF EXISTS `generated_salaries`;
CREATE TABLE IF NOT EXISTS `generated_salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `generated_salaries`
--

INSERT INTO `generated_salaries` (`id`, `user_id`, `designation_id`, `employee_id`, `salary_id`, `grade`, `basic`, `house_rent`, `medical`, `pp`, `edu`, `charge`, `dearness`, `conveyance`, `tiffin`, `washing`, `deputation`, `aid`, `sumptuary`, `arrear`, `miscellaneous`, `fraction_increment`, `total_add`, `payable`, `in_word`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1, 1, 1, 40000, 0, 700, NULL, 200, 0, 6000, 0, 0, 0, NULL, 1300, 1000, 0, 0, 0, 49200, 41803, 'Tk. forty-one thousand eight hundred and three only', 0, 1385616833, 1388429668, '::1'),
(2, 1, 2, 2, 2, 2, 37100, 18376, 700, NULL, 300, 0, 6000, 0, 0, 0, NULL, NULL, 900, 0, 0, 0, 63376, 59331, 'Tk. fifty-nine thousand three hundred and thirty-one only', 0, 1387089616, 1388429668, '::1'),
(3, 1, 2, 3, 3, 2, 35747, 17874, 700, 0, 0, 0, 6000, 0, 0, 0, 0, 0, 900, 0, 0, 0, 61221, 57284, 'Tk. fifty-seven thousand two hundred and eighty-four only', 0, 1385458526, 1388429668, '::1'),
(4, 1, 3, 4, 4, 3, 34500, 17250, 700, NULL, 200, 4674, 6000, 0, 0, 0, NULL, NULL, 600, 0, 0, 0, 63924, 58684, 'Tk. fifty-eight thousand six hundred and eighty-four only', 0, 1385460360, 1388429668, '::1'),
(5, 1, 4, 5, 5, 3, 32300, 16150, 700, 0, 300, 0, 6000, 0, 0, 0, 0, 0, 600, 0, 0, 0, 56050, 52486, 'Tk. fifty-two thousand four hundred and eighty-six only', 0, 1385527485, 1388429668, '::1'),
(6, 1, 5, 6, 6, 4, 28950, 14475, 700, 0, 200, 0, 5790, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50115, 46914, 'Tk. forty-six thousand nine hundred and fourteen only', 0, 1385617714, 1388429668, '::1'),
(7, 1, 10, 7, 7, 4, 27750, 13875, 700, NULL, 0, 4522, 5550, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 52397, 49326, 'Tk. forty-nine thousand three hundred and twenty-six only', 0, 1387431519, 1388429668, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `increments`
--

DROP TABLE IF EXISTS `increments`;
CREATE TABLE IF NOT EXISTS `increments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `days` int(11) NOT NULL COMMENT 'Eligible days of the incremented month',
  `increment_date` int(11) NOT NULL,
  `previous_total` decimal(10,0) NOT NULL,
  `previous_number` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `increments`
--

INSERT INTO `increments` (`id`, `user_id`, `employee_id`, `amount`, `days`, `increment_date`, `previous_total`, `previous_number`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 7, 2417, 20, 1384128000, '1750', 1, 1, 1385546424, 1385546424, '::1'),
(2, 1, 2, 3252, 22, 1386633600, '2400', 2, 1, 1387863611, 1387863611, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `liens`
--

DROP TABLE IF EXISTS `liens`;
CREATE TABLE IF NOT EXISTS `liens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `taken` int(11) NOT NULL,
  `released` int(11) DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(3) NOT NULL COMMENT '0 = No, 1 = Yes',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

DROP TABLE IF EXISTS `loans`;
CREATE TABLE IF NOT EXISTS `loans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `execution_date` int(11) NOT NULL,
  `total` double NOT NULL,
  `total_installment` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_interest` int(11) NOT NULL,
  `interest_installment` int(11) NOT NULL,
  `type` tinyint(3) NOT NULL COMMENT '"1"=>"CPF Loan","2"=>"Aditional CPF Loan","3"=>"House Loan","4"=>"Vehicle Loan"',
  `status` tinyint(3) NOT NULL COMMENT '0 = Completed, 1 = Continued',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `user_id`, `employee_id`, `designation_id`, `execution_date`, `total`, `total_installment`, `amount`, `total_interest`, `interest_installment`, `type`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 4, 3, 1151798400, 501200, 112, 4475, 233893, 55, 1, 1, 1387267750, 1387267750, '::1');

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
-- Table structure for table `prls`
--

DROP TABLE IF EXISTS `prls`;
CREATE TABLE IF NOT EXISTS `prls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL COMMENT '0 = Retired, 1 = On PRL',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `amount` double NOT NULL,
  `previous_grade` int(11) NOT NULL,
  `previous_designation` int(11) NOT NULL,
  `previous_total_increment` decimal(10,0) NOT NULL,
  `previous_increment_number` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `refunds`
--

DROP TABLE IF EXISTS `refunds`;
CREATE TABLE IF NOT EXISTS `refunds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `execution_date` int(11) NOT NULL,
  `paid_amount` double NOT NULL,
  `paid_installment` int(11) NOT NULL,
  `balance` double NOT NULL,
  `paid_interest` int(11) NOT NULL,
  `paid_interest_installment` int(11) NOT NULL,
  `interest_balance` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0 = Completed, 1 = Continued',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `refunds`
--

INSERT INTO `refunds` (`id`, `user_id`, `loan_id`, `execution_date`, `paid_amount`, `paid_installment`, `balance`, `paid_interest`, `paid_interest_installment`, `interest_balance`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1151798400, 349050, 78, 152150, 0, 0, 233893, 1, 1387267750, 1387267750, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `retirements`
--

DROP TABLE IF EXISTS `retirements`;
CREATE TABLE IF NOT EXISTS `retirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `status` tinyint(3) NOT NULL COMMENT '1 = Retired',
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  `terminal` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `designation_id`, `employee_id`, `grade`, `basic`, `house_rent`, `medical`, `pp`, `edu`, `charge`, `dearness`, `conveyance`, `tiffin`, `washing`, `deputation`, `aid`, `sumptuary`, `arrear`, `miscellaneous`, `fraction_increment`, `total_add`, `payable`, `in_word`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 1, 1, 1, 40000, 0, 700, NULL, 200, 0, 6000, 0, 0, 0, NULL, 1300, 1000, 0, 0, 0, 49200, 41803, 'Tk. forty-one thousand eight hundred and three only', 1, 1385616833, 1387827204, '::1'),
(2, 1, 2, 2, 2, 37100, 18376, 700, NULL, 300, 0, 6000, 0, 0, 0, NULL, NULL, 900, 0, 0, 0, 63376, 59331, 'Tk. fifty-nine thousand three hundred and thirty-one only', 2, 1387089616, 1387863626, '::1'),
(3, 1, 2, 3, 2, 35747, 17874, 700, 0, 0, 0, 6000, 0, 0, 0, 0, 0, 900, 0, 0, 0, 61221, 57284, 'Tk. fifty-seven thousand two hundred and eighty-four only', 1, 1385458526, 1387827204, '::1'),
(4, 1, 3, 4, 3, 34500, 17250, 700, NULL, 200, 4674, 6000, 0, 0, 0, NULL, NULL, 600, 0, 0, 0, 63924, 58684, 'Tk. fifty-eight thousand six hundred and eighty-four only', 9, 1385460360, 1388055053, '::1'),
(5, 1, 4, 5, 3, 32300, 16150, 700, 0, 300, 0, 6000, 0, 0, 0, 0, 0, 600, 0, 0, 0, 56050, 52486, 'Tk. fifty-two thousand four hundred and eighty-six only', 1, 1385527485, 1387827204, '::1'),
(6, 1, 5, 6, 4, 28950, 14475, 700, 0, 200, 0, 5790, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50115, 46914, 'Tk. forty-six thousand nine hundred and fourteen only', 1, 1385617714, 1387827204, '::1'),
(7, 1, 10, 7, 4, 27750, 13875, 700, NULL, 0, 4522, 5550, 0, 0, 0, NULL, NULL, NULL, 0, 0, 0, 52397, 49326, 'Tk. forty-nine thousand three hundred and twenty-six only', 1, 1387431519, 1387827204, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `selection_times`
--

DROP TABLE IF EXISTS `selection_times`;
CREATE TABLE IF NOT EXISTS `selection_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `execution_date` int(11) NOT NULL,
  `previous_grade` int(11) NOT NULL,
  `previous_total_increment` decimal(10,0) NOT NULL,
  `previous_increment_number` int(11) NOT NULL,
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
