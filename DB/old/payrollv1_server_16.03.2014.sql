-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2014 at 08:54 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=87 ;

--
-- Dumping data for table `increments`
--

INSERT INTO `increments` (`id`, `user_id`, `employee_id`, `amount`, `days`, `increment_date`, `previous_total`, `previous_number`, `status`, `created`, `updated`, `terminal`) VALUES
(1, 1, 23, 4200, 30, 1375401600, '4200', 6, 1, 1391594349, 1391594349, '192.168.15.6'),
(2, 1, 32, 5540, 7, 1379980800, '5400', 9, 1, 1392006828, 1392804671, '192.168.15.92'),
(3, 1, 104, 2793, 6, 1380067200, '2740', 11, 1, 1392007153, 1393755402, '192.168.15.6'),
(4, 1, 33, 6860, 13, 1379462400, '6600', 11, 1, 1392007917, 1392868333, '192.168.15.92'),
(5, 1, 148, 4226, 23, 1378598400, '3935', 11, 1, 1392008039, 1393755548, '192.168.15.6'),
(6, 1, 145, 4602, 28, 1375574400, '4315', 12, 1, 1392008357, 1392869207, '192.168.15.92'),
(7, 1, 173, 4602, 28, 1375574400, '4315', 12, 1, 1392008484, 1392869424, '192.168.15.92'),
(8, 1, 90, 5278, 19, 1376352000, '5075', 14, 1, 1392008602, 1392869488, '192.168.15.92'),
(9, 1, 73, 5730, 15, 1376697600, '5565', 14, 1, 1392008728, 1392869561, '192.168.15.92'),
(10, 1, 67, 5730, 15, 1376697600, '5565', 14, 1, 1392008815, 1392870524, '192.168.15.92'),
(11, 1, 146, 3100, 11, 1377043200, '3005', 12, 1, 1392008924, 1392870560, '192.168.15.92'),
(12, 1, 137, 3086, 9, 1377216000, '3005', 12, 1, 1392009140, 1392870926, '192.168.15.92'),
(13, 1, 111, 3086, 9, 1377216000, '3005', 12, 1, 1392009397, 1392870624, '192.168.15.92'),
(14, 1, 149, 5735, 9, 1377216000, '5580', 15, 1, 1392009676, 1392870650, '192.168.15.92'),
(15, 1, 118, 3100, 11, 1377043200, '3005', 12, 1, 1392009742, 1392870679, '192.168.15.92'),
(16, 1, 117, 3086, 9, 1377216000, '3005', 12, 1, 1392009817, 1392870727, '192.168.15.92'),
(17, 1, 171, 2787, 7, 1377388800, '2740', 11, 1, 1392009936, 1392009936, '192.168.15.92'),
(18, 1, 138, 3100, 11, 1377043200, '3005', 12, 1, 1392010375, 1392870806, '192.168.15.92'),
(19, 1, 115, 3086, 9, 1377216000, '3005', 12, 1, 1392010572, 1392870600, '192.168.15.92'),
(20, 1, 102, 3066, 6, 1377475200, '3005', 12, 1, 1392010633, 1392870959, '192.168.15.92'),
(21, 1, 140, 3100, 11, 1377043200, '3005', 12, 1, 1392011191, 1392870995, '192.168.15.92'),
(22, 1, 110, 3066, 6, 1377475200, '3005', 12, 1, 1392011281, 1392871030, '192.168.15.92'),
(23, 1, 135, 3086, 9, 1377216000, '3005', 12, 1, 1392011503, 1392871110, '192.168.15.92'),
(24, 1, 126, 3066, 6, 1377475200, '3005', 12, 1, 1392011576, 1392871153, '192.168.15.92'),
(25, 1, 113, 3079, 8, 1377302400, '3005', 12, 1, 1392011718, 1392871215, '192.168.15.92'),
(26, 1, 144, 3086, 9, 1377216000, '3005', 12, 1, 1392011922, 1392871264, '192.168.15.92'),
(27, 1, 66, 4601, 15, 1376697600, '4365', 14, 1, 1392012149, 1392871298, '192.168.15.92'),
(28, 1, 141, 3059, 5, 1377561600, '3005', 12, 1, 1392012213, 1392871324, '192.168.15.92'),
(29, 1, 143, 3066, 6, 1377475200, '3005', 12, 1, 1392012501, 1392871390, '192.168.15.92'),
(30, 1, 109, 3066, 6, 1377475200, '3005', 12, 1, 1392012584, 1392871466, '192.168.15.92'),
(31, 1, 179, 1391, 1, 1377907200, '1380', 5, 1, 1392012987, 1393755784, '192.168.15.6'),
(32, 1, 98, 3344, 8, 1377302400, '3270', 13, 1, 1392013404, 1392871574, '192.168.15.92'),
(33, 1, 136, 3086, 9, 1377216000, '3005', 12, 1, 1392014018, 1392871609, '192.168.15.92'),
(34, 1, 60, 6200, 10, 1379721600, '6000', 10, 1, 1392014341, 1392868293, '192.168.15.92'),
(35, 1, 61, 6200, 10, 1379721600, '6000', 10, 1, 1392014406, 1392868316, '192.168.15.92'),
(36, 1, 178, 2739, 18, 1379030400, '2490', 6, 1, 1392014479, 1393755596, '192.168.15.6'),
(37, 1, 133, 5345, 30, 1377993600, '5345', 16, 1, 1392014583, 1393755478, '192.168.15.6'),
(38, 1, 150, 5816, 15, 1376697600, '5580', 15, 1, 1392092047, 1392871737, '192.168.15.92'),
(39, 1, 101, 3086, 9, 1377216000, '3005', 12, 1, 1392092176, 1392871788, '192.168.15.92'),
(40, 1, 65, 4601, 15, 1376697600, '4365', 14, 1, 1392092314, 1392869610, '192.168.15.92'),
(41, 1, 71, 5351, 15, 1376697600, '5565', 14, 1, 1392092755, 1393756771, '192.168.15.6'),
(42, 1, 177, 2537, 6, 1353801600, '2475', 10, 0, 1392093515, 1392872347, '192.168.15.92'),
(43, 1, 175, 2537, 6, 1353801600, '2475', 10, 0, 1392093763, 1392872284, '192.168.15.92'),
(44, 1, 176, 2537, 6, 1353801600, '2475', 10, 0, 1392093828, 1392872241, '192.168.15.92'),
(45, 1, 87, 4517, 26, 1375747200, '4105', 13, 1, 1392094288, 1392869822, '192.168.15.92'),
(46, 1, 86, 4274, 23, 1376006400, '3905', 13, 1, 1392094389, 1392869866, '192.168.15.92'),
(47, 1, 84, 4303, 25, 1375833600, '3905', 13, 1, 1392094482, 1392869895, '192.168.15.92'),
(48, 1, 172, 4602, 28, 1375574400, '4315', 12, 1, 1392094574, 1392869931, '192.168.15.92'),
(49, 1, 139, 4602, 28, 1375574400, '4315', 12, 1, 1392094700, 1392870049, '192.168.15.92'),
(50, 1, 105, 4602, 28, 1375574400, '4315', 12, 1, 1392094787, 1392870084, '192.168.15.92'),
(51, 1, 124, 4602, 28, 1375574400, '4315', 12, 1, 1392094844, 1392870106, '192.168.15.92'),
(52, 1, 163, 4602, 28, 1375574400, '4315', 12, 1, 1392094903, 1392870132, '192.168.15.92'),
(53, 1, 106, 3893, 28, 1375574400, '3515', 12, 1, 1392095229, 1392870154, '192.168.15.92'),
(54, 1, 82, 5872, 23, 1376006400, '5605', 13, 1, 1392095409, 1392870195, '192.168.15.92'),
(55, 1, 69, 3893, 28, 1375574400, '3515', 12, 1, 1392095481, 1392870210, '192.168.15.92'),
(56, 1, 38, 2660, 24, 1370563200, '2100', 3, 1, 1393826899, 1393826899, '192.168.15.89'),
(57, 1, 45, 4187, 7, 1379980800, '4000', 5, 1, 1393838593, 1393838593, '192.168.15.92'),
(58, 1, 68, 5351, 15, 1376697600, '5150', 13, 1, 1393997449, 1393997449, '192.168.15.92'),
(59, 1, 100, 3595, 31, 1380585600, '3305', 12, 1, 1394007992, 1394007992, '192.168.15.6'),
(60, 1, 180, 844, 1, 1380499200, '830', 2, 1, 1394444201, 1394444201, '::1'),
(61, 1, 25, 2800, 18, 1379030400, '2800', 4, 1, 1394355179, 1394355179, '192.168.15.92'),
(62, 1, 4, 1394, 5, 1382832000, '1200', 1, 1, 1394358925, 1394358925, '192.168.15.92'),
(63, 1, 103, 2987, 28, 1378166400, '2740', 11, 1, 1394432917, 1394432917, '192.168.15.92'),
(64, 1, 72, 3968, 19, 1381622400, '3600', 6, 1, 1394433228, 1394433228, '192.168.15.92'),
(65, 1, 64, 7405, 30, 1380585600, '6955', 16, 1, 1394433480, 1394433480, '192.168.15.92'),
(66, 1, 92, 3888, 25, 1381104000, '3630', 12, 1, 1394433992, 1394433992, '192.168.15.92'),
(67, 1, 94, 4952, 17, 1381795200, '4705', 11, 1, 1394434168, 1394434168, '192.168.15.92'),
(68, 1, 130, 4511, 16, 1381881600, '4315', 12, 1, 1394434564, 1394434564, '192.168.15.92'),
(69, 1, 131, 4548, 19, 1381622400, '4315', 12, 1, 1394434709, 1394434709, '192.168.15.92'),
(70, 1, 132, 4511, 16, 1381881600, '4315', 12, 1, 1394434852, 1394434852, '192.168.15.92'),
(71, 1, 129, 4511, 16, 1381881600, '4315', 12, 1, 1394435030, 1394435030, '192.168.15.92'),
(72, 1, 153, 2825, 10, 1382400000, '2740', 11, 1, 1394435170, 1394435170, '192.168.15.92'),
(73, 1, 108, 2757, 2, 1383091200, '2740', 11, 1, 1394435287, 1394435287, '192.168.15.92'),
(74, 1, 185, 2819, 10, 1382400000, '2725', 10, 1, 1394435436, 1394435436, '192.168.15.92'),
(75, 1, 123, 3595, 30, 1380585600, '3105', 12, 1, 1394435605, 1394447939, '::1'),
(76, 1, 161, 3005, 30, 1380585600, '2740', 11, 1, 1394435881, 1394435881, '192.168.15.92'),
(77, 1, 190, 3200, 30, 1383264000, '2400', 3, 1, 1394529077, 1394529077, '192.168.15.92'),
(78, 1, 50, 1731, 16, 1384473600, '1470', 3, 1, 1394529235, 1394529235, '192.168.15.92'),
(79, 1, 122, 2628, 27, 1383523200, '2340', 11, 1, 1394603444, 1394603444, '192.168.15.89'),
(80, 1, 95, 4568, 20, 1384128000, '4315', 12, 1, 1394606624, 1394606624, '192.168.15.92'),
(81, 1, 134, 3445, 10, 1384992000, '3330', 12, 1, 1394608033, 1394608033, '192.168.15.92'),
(82, 1, 151, 2979, 27, 1383523200, '2740', 11, 1, 1394608167, 1394608167, '192.168.15.92'),
(83, 1, 162, 2855, 13, 1384732800, '2740', 11, 1, 1394608362, 1394608362, '192.168.15.92'),
(84, 1, 175, 2528, 6, 1385337600, '2475', 10, 1, 1394948380, 1394948380, '::1'),
(85, 1, 176, 2528, 6, 1385337600, '2475', 10, 1, 1394948562, 1394948562, '::1'),
(86, 1, 177, 2528, 6, 1385337600, '2475', 10, 1, 1394948749, 1394948749, '::1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
