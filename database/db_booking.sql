-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 04, 2023 at 10:40 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking_angela`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

DROP TABLE IF EXISTS `admin_account`;
CREATE TABLE IF NOT EXISTS `admin_account` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_uname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_contact` int NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`admin_id`, `admin_uname`, `admin_address`, `admin_contact`, `admin_email`, `admin_password`) VALUES
(5, 'Angela Motel', 'Bilogo, Batangas City', 2147483647, 'motel@gmail.com', 'Motel07!');

-- --------------------------------------------------------

--
-- Table structure for table `admin_form`
--

DROP TABLE IF EXISTS `admin_form`;
CREATE TABLE IF NOT EXISTS `admin_form` (
  `Username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Contact` int NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_calendar`
--

DROP TABLE IF EXISTS `booking_calendar`;
CREATE TABLE IF NOT EXISTS `booking_calendar` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `staycation_booking_dates` date NOT NULL,
  `staycation_booking_datesout` date NOT NULL,
  `ref` varchar(200) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking_calendar`
--

INSERT INTO `booking_calendar` (`book_id`, `staycation_booking_dates`, `staycation_booking_datesout`, `ref`) VALUES
(31, '2023-12-04', '2023-12-07', 'REF121004234032'),
(32, '2023-12-13', '2023-12-13', 'REF121004233535'),
(33, '2023-12-22', '2023-12-22', 'REF121004231637');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

DROP TABLE IF EXISTS `book_details`;
CREATE TABLE IF NOT EXISTS `book_details` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `booking_ref_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `booking_services` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `booking_start` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `booking_end` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `regular_accommodation` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_range` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `additional_package` int NOT NULL,
  `total` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_by` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`booking_id`, `booking_ref_no`, `booking_services`, `booking_start`, `booking_end`, `regular_accommodation`, `date_range`, `additional_package`, `total`, `status`, `book_by`) VALUES
(152, 'REF120202230840', 'Staycation', '2023-12-28', '2023-12-29', 'Weekdays', 'Dec 28 to Dec 29', 1, '24000', '3', '14'),
(153, 'REF120704230055', 'Staycation', '2023-12-07', '2023-12-08', 'Weekdays', 'Dec 7 to Dec 8', 1, '24000', '3', '1'),
(154, 'REF121004230824', 'Staycation', '2023-12-04', '2023-12-07', 'Weekdays', 'Dec 4 to Dec 7', 1, '71000', '3', '14'),
(155, 'REF121004234032', 'Staycation', '2023-12-04', '2023-12-07', 'Weekdays', 'Dec 4 to Dec 7', 1, '71000', '3', '14'),
(156, 'REF121004233537', 'Staycation', '2023-12-11', '2023-12-15', 'Weekdays', 'Dec 11 to Dec 15', 1, '94500', '3', '14');

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

DROP TABLE IF EXISTS `book_info`;
CREATE TABLE IF NOT EXISTS `book_info` (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_contact` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_postal_code` int NOT NULL,
  `book_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`book_id`, `ref_no`, `book_fname`, `book_lname`, `book_contact`, `book_postal_code`, `book_address`, `book_email`) VALUES
(82, 'REF120201231134', 'Angela', 'Motel', '09167096719', 4200, 'Bilogo, Batangas City', 'motelangela13@gmail.com'),
(83, 'REF121001231152', 'Angela', 'Motel', '09167096719', 4200, 'Bilogo, Batangas City', 'motelangela13@gmail.com'),
(84, 'REF120102234641', 'Joshua', 'Enore', '09167096719', 4200, 'Bilogo, Batangas City', 'enore@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

DROP TABLE IF EXISTS `event_details`;
CREATE TABLE IF NOT EXISTS `event_details` (
  `events_id` int NOT NULL AUTO_INCREMENT,
  `events_ref_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `events_selected_services` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `events_date` date NOT NULL,
  `events_time` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_package` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_by` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_details`
--

INSERT INTO `event_details` (`events_id`, `events_ref_no`, `events_selected_services`, `events_date`, `events_time`, `event_package`, `status`, `book_by`) VALUES
(52, 'REF120202232223', 'EventPlace', '2023-12-05', 'Between: 8:00 AM - 3: 00 PM', 'Package C - PHP 70, 000', '3', '14'),
(53, 'REF121004233535', 'EventPlace', '2023-12-13', 'Between: 8:00 AM - 3: 00 PM', 'Package A - PHP 50, 000', '3', '14');

-- --------------------------------------------------------

--
-- Table structure for table `event_info`
--

DROP TABLE IF EXISTS `event_info`;
CREATE TABLE IF NOT EXISTS `event_info` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `event_ref_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_contact` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_postal_code` int NOT NULL,
  `event_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `event_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_info`
--

INSERT INTO `event_info` (`event_id`, `event_ref_no`, `event_fname`, `event_lname`, `event_contact`, `event_postal_code`, `event_address`, `event_email`) VALUES
(46, 'REF111125230702', 'Angela', 'Motel', '09167096719', 4200, 'Bilogo, Batangas City', 'motelangela13@gmail.com'),
(47, 'REF120102232446', 'joshua', 'Enore', '09167096719', 4200, 'Bilogo, Batangas City', 'enore@gmail.com'),
(48, 'REF120102233954', 'Elen', 'Motel', '09167096152', 4200, 'Bilogo, Batangas City', 'motel@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_form`
--

DROP TABLE IF EXISTS `login_form`;
CREATE TABLE IF NOT EXISTS `login_form` (
  `Fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photo_details`
--

DROP TABLE IF EXISTS `photo_details`;
CREATE TABLE IF NOT EXISTS `photo_details` (
  `photo_id` int NOT NULL AUTO_INCREMENT,
  `photo_ref_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_selected_services` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_date` date NOT NULL,
  `photo_time` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo_price` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `book_by` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photo_details`
--

INSERT INTO `photo_details` (`photo_id`, `photo_ref_no`, `photo_selected_services`, `photo_date`, `photo_time`, `photo_price`, `status`, `book_by`) VALUES
(28, 'REF121004231637', 'PhotoShoot', '2023-12-22', 'Between: 8:00 AM - 3: 00 PM', 'PHP 9, 000', '3', '14');

-- --------------------------------------------------------

--
-- Table structure for table `photo_info`
--

DROP TABLE IF EXISTS `photo_info`;
CREATE TABLE IF NOT EXISTS `photo_info` (
  `photos_id` int NOT NULL AUTO_INCREMENT,
  `photos_ref_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photos_fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photos_lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photos_contact` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photos_postal_code` int NOT NULL,
  `photos_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photos_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`photos_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `photo_info`
--

INSERT INTO `photo_info` (`photos_id`, `photos_ref_no`, `photos_fname`, `photos_lname`, `photos_contact`, `photos_postal_code`, `photos_address`, `photos_email`) VALUES
(17, 'REF120102234156', 'Larry', 'Motel', '09167512132', 4200, 'Bilogo, Batangas City', 'larry@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
CREATE TABLE IF NOT EXISTS `user_account` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `user_name`, `user_address`, `user_contact`, `user_email`, `user_password`) VALUES
(14, 'Angela Motel', 'Bilogo, Batangas City', '09167096719', 'motelangela13@gmail.com', 'Motel07!'),
(15, 'Riazel Lipata', 'Lemery Batangas', '09156781614', 'lipata@gmail.com', 'Lipata07!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
