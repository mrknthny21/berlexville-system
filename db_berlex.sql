-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 12:28 PM
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
-- Database: `db_berlex`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `account_Id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`account_Id`, `name`, `password`, `role`) VALUES
(202311001, 'Mark C. Perando', 'admin001', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_homeowners`
--

CREATE TABLE `tbl_homeowners` (
  `account_Id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blk` int(10) DEFAULT NULL,
  `lot` int(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_homeowners`
--

INSERT INTO `tbl_homeowners` (`account_Id`, `name`, `blk`, `lot`, `password`, `role`) VALUES
(202311010, 'Homer B. Basmayor', 0, 0, 'Homer010', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`account_Id`);

--
-- Indexes for table `tbl_homeowners`
--
ALTER TABLE `tbl_homeowners`
  ADD PRIMARY KEY (`account_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `account_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202311002;

--
-- AUTO_INCREMENT for table `tbl_homeowners`
--
ALTER TABLE `tbl_homeowners`
  MODIFY `account_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202311012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
