-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 08:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `staff_id` varchar(5) DEFAULT NULL,
  `staff_name` varchar(20) DEFAULT NULL,
  `email_address` varchar(30) DEFAULT NULL,
  `profession` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`staff_id`, `staff_name`, `email_address`, `profession`) VALUES
('12345', 'nephaskango', 'nephaskango@gmail.com', 'edit'),
('12345', 'nephaskango', 'nephaskango@gmail.com', 'edit');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` varchar(5) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `initials` varchar(3) DEFAULT NULL,
  `sex` enum('m','f') DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `post_code` varchar(6) DEFAULT NULL,
  `admission` date DEFAULT NULL,
  `DOB` date NOT NULL,
  `ward_id` varchar(4) DEFAULT NULL,
  `next_of_kin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `initials`, `sex`, `address`, `post_code`, `admission`, `DOB`, `ward_id`, `next_of_kin`) VALUES
('P3', 'Major', 'EF', 'f', '12', 'SE5', '2001-08-15', '1967-01-13', 'W1', 'bv'),
('P4', 'Sue', 'RE', 'm', '10 Low Rd', 'NW3', '2001-09-19', '1976-02-25', 'W3', NULL),
('P5', 'jack', 'JR', 'm', '10 Mam Rd', 'GH2', '2001-07-12', '1965-04-04', 'W4', NULL),
('P6', 'jona ', 'JO', 'm', '15 maple Rd', 'HY4', '2002-06-12', '1970-04-07', 'W5', NULL),
('P7', 'Sam', 'SH', 'f', '3 High groove', 'JO8', '2002-09-12', '1959-01-01', 'W2', NULL),
('P8', 'Darry', 'RD', 'f', '3', 'HJ7', '2002-07-23', '1955-05-23', 'W6', '');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `ward_id` varchar(5) NOT NULL,
  `ward_name` varchar(25) DEFAULT NULL,
  `number_beds` int(11) DEFAULT 5,
  `nurse_in_charge` varchar(20) NOT NULL,
  `ward_type` varchar(20) DEFAULT NULL,
  `Remaining_Beds` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`ward_id`, `ward_name`, `number_beds`, `nurse_in_charge`, `ward_type`, `Remaining_Beds`) VALUES
('W4', 'Roomy', 1, 'Sister oli', '', 11),
('W5', 'The end', 2, 'Sister mary', 'the', 1),
('W6', 'hopeful', 2, 'Sister esther', NULL, 2),
('W7', 'viewer', 4, 'Sister Grace', NULL, 4),
('W8', 'Idea', 8, 'Sister perry', NULL, 8);

--
-- Triggers `ward`
--
DELIMITER $$
CREATE TRIGGER `prevent_bed_reduction` BEFORE UPDATE ON `ward` FOR EACH ROW BEGIN
    DECLARE patient_count INT;
    SELECT COUNT(*) INTO patient_count FROM patient WHERE ward_id = NEW.ward_id;
    IF NEW.number_beds < patient_count THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cannot decrease the number of beds below the current number of patients.';
    END IF;
END
$$
DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
