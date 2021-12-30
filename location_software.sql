-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 03:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `location_software`
--

-- --------------------------------------------------------

--
-- Table structure for table `device_info`
--

CREATE TABLE `device_info` (
  `id` int(11) NOT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `browser` varchar(50) DEFAULT NULL,
  `cores` varchar(50) DEFAULT NULL,
  `ram` varchar(50) DEFAULT NULL,
  `vendor` varchar(50) DEFAULT NULL,
  `render` varchar(50) DEFAULT NULL,
  `ht` varchar(50) DEFAULT NULL,
  `wd` varchar(50) DEFAULT NULL,
  `os` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `device_info`
--

INSERT INTO `device_info` (`id`, `platform`, `browser`, `cores`, `ram`, `vendor`, `render`, `ht`, `wd`, `os`, `created_at`, `created_ip_address`) VALUES
(1, 'Win32', 'Chrome/96.0.4664.110', '16', '8', 'Google Inc. (AMD)', 'ANGLE (AMD, AMD Radeon(TM) Graphics Direct3D11 vs_', '864', '1536', 'Win64', '2021-12-25', '::1'),
(2, 'Win32', 'Chrome/96.0.4664.110', '16', '8', 'Google Inc. (AMD)', 'ANGLE (AMD, AMD Radeon(TM) Graphics Direct3D11 vs_', '864', '1536', 'Win64', '2021-12-25', '::1'),
(3, 'Win32', 'Chrome/96.0.4664.110', '16', '8', 'Google Inc. (AMD)', 'ANGLE (AMD, AMD Radeon(TM) Graphics Direct3D11 vs_', '864', '1536', 'Win64', '2021-12-25', '::1'),
(4, 'Win32', 'Chrome/96.0.4664.110', '16', '8', 'Google Inc. (AMD)', 'ANGLE (AMD, AMD Radeon(TM) Graphics Direct3D11 vs_', '864', '1536', 'Win64', '2021-12-25', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `error_info`
--

CREATE TABLE `error_info` (
  `id` int(11) NOT NULL,
  `denied` varchar(50) DEFAULT NULL,
  `unavailable` varchar(50) DEFAULT NULL,
  `timeout` varchar(50) DEFAULT NULL,
  `unknown` varchar(50) DEFAULT NULL,
  `support` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `error_info`
--

INSERT INTO `error_info` (`id`, `denied`, `unavailable`, `timeout`, `unknown`, `support`, `created_at`, `created_ip_address`) VALUES
(1, 'User denied the request for Geolocation', NULL, NULL, NULL, NULL, '2021-12-25', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `result_info`
--

CREATE TABLE `result_info` (
  `id` int(11) NOT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `lon` varchar(50) DEFAULT NULL,
  `acc` varchar(50) DEFAULT NULL,
  `alt` varchar(50) DEFAULT NULL,
  `dir` varchar(50) DEFAULT NULL,
  `spd` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_info`
--

INSERT INTO `result_info` (`id`, `lat`, `lon`, `acc`, `alt`, `dir`, `spd`, `created_at`, `created_ip_address`) VALUES
(9, '31.4582058', '76.3118266', '17.88', '', '', '', '2021-12-25', '::1'),
(10, '31.4582058', '76.3118266', '17.88', '', '', '', '2021-12-25', '::1'),
(11, '31.4582058', '76.3118266', '17.88', '', '', '', '2021-12-25', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device_info`
--
ALTER TABLE `device_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_info`
--
ALTER TABLE `error_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_info`
--
ALTER TABLE `result_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device_info`
--
ALTER TABLE `device_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `error_info`
--
ALTER TABLE `error_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `result_info`
--
ALTER TABLE `result_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
