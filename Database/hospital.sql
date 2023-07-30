-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2023 at 09:57 PM
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
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `adminname` varchar(255) NOT NULL,
  `adminpassword` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`adminname`, `adminpassword`, `admin_id`) VALUES
('admin', 'admin987', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`username`, `password`, `speciality`, `id`) VALUES
('Manohar', 'Manohar987', 'ortho', 1),
('kae', 'kae', 'eye', 6),
('watson', 'watson', 'ortho', 11),
('raju', 'raju', 'eye', 12),
('Ramu', 'ramu', 'eye', 14),
('Jao', 'jao', 'general', 23),
('ramu', 'ramu', 'eye', 99);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `barcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `address` text NOT NULL,
  `gender` enum('male','female','others') NOT NULL,
  `dob` date NOT NULL,
  `type_of_visit` varchar(50) NOT NULL,
  `doctor_name` varchar(20) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`barcode`, `name`, `mobile`, `age`, `address`, `gender`, `dob`, `type_of_visit`, `doctor_name`, `doctor_id`) VALUES
('64c696ac8737a', 'Raj', '7412365481', 22, '2wedfgrdhjyui', 'male', '2002-12-21', 'Eye', 'kae', 6),
('64c699673e3c4', 'Raji', '7412365481', 22, '2wedfgrdhjyui', 'female', '2002-12-21', 'Eye', 'kae', 6),
('64c69a22dd0d1', 'Rajiv', '7412365481', 23, '2wedfgrdhjyui', 'female', '2002-12-21', 'Eye', 'kae', 6),
('64c6b30238fe9', 'Ranii', '7531256489', 15, 'kosadfetrhyjuki', 'female', '2005-05-06', 'ortho', 'Manohar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `barcode` varchar(255) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`barcode`, `doctor_name`, `medicines`, `remarks`) VALUES
('64c6b30238fe9', 'Manohar', 'weeeeeeeeeeeeeeeeee', 'yessssssssssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `receptionistname` varchar(50) NOT NULL,
  `receptionistpassword` varchar(50) NOT NULL,
  `receptionist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`receptionistname`, `receptionistpassword`, `receptionist_id`) VALUES
('receptionist', 'receptionist987', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`barcode`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`receptionist_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
