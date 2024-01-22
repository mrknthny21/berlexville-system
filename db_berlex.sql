-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 02:36 PM
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
  `accountID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`accountID`, `name`, `password`, `role`) VALUES
(202311001, 'Mark C. Perando', 'admin001', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amilyar`
--

CREATE TABLE `tbl_amilyar` (
  `amilyarID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_amilyar`
--

INSERT INTO `tbl_amilyar` (`amilyarID`, `accountID`, `amount`, `status`, `year`) VALUES
(1, 202311001, 100, 'Paid', 2023),
(2, 202311002, 100, 'Paid', 2023),
(3, 202311003, 100, 'Unpaid', 2023),
(4, 202311004, 100, 'Unpaid', 2023),
(5, 202311005, 100, 'Unpaid', 2023),
(6, 202311006, 100, 'Unpaid', 2023),
(7, 202311007, 100, 'Unpaid', 2023),
(8, 202311008, 100, 'Unpaid', 2023),
(9, 202311009, 100, 'Unpaid', 2023),
(10, 202311010, 100, 'Unpaid', 2023),
(11, 202311001, 100, 'Unpaid', 2024),
(12, 202311002, 100, 'Unpaid', 2024),
(13, 202311003, 100, 'Unpaid', 2024),
(14, 202311004, 100, 'Unpaid', 2024),
(15, 202311005, 100, 'Unpaid', 2024),
(16, 202311006, 100, 'Unpaid', 2024),
(17, 202311007, 100, 'Unpaid', 2024),
(18, 202311008, 100, 'Unpaid', 2024),
(19, 202311009, 100, 'Unpaid', 2024),
(20, 202311010, 100, 'Unpaid', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_budget`
--

CREATE TABLE `tbl_budget` (
  `budgetID` int(10) NOT NULL,
  `yearID` int(10) DEFAULT NULL,
  `total_budget` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_budget`
--

INSERT INTO `tbl_budget` (`budgetID`, `yearID`, `total_budget`) VALUES
(1, 2023, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expenses`
--

CREATE TABLE `tbl_expenses` (
  `expenseID` int(10) NOT NULL,
  `yearID` int(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `expenseName` varchar(50) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_expenses`
--

INSERT INTO `tbl_expenses` (`expenseID`, `yearID`, `date`, `expenseName`, `amount`) VALUES
(1, 1, '2023-06-25', 'Salary for staffs and instructord', '300000'),
(4, 1, NULL, 'sddsds', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_homeowners`
--

CREATE TABLE `tbl_homeowners` (
  `accountID` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `blk` int(10) DEFAULT NULL,
  `lot` int(10) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_homeowners`
--

INSERT INTO `tbl_homeowners` (`accountID`, `name`, `blk`, `lot`, `password`, `role`) VALUES
(202311001, 'Mark Perando', 1, 1, 'mark001', 'ADMIN'),
(202311002, 'Marivic Miquiabas', 1, 2, 'marivic002', 'USER'),
(202311003, 'Felipe Carillo ', 1, 3, 'felipe003', 'ADMIN'),
(202311004, 'Albert Retuya', 1, 4, 'albert004', 'ADMIN'),
(202311005, 'Leny Basmayor', 1, 5, 'leny005', 'ADMIN'),
(202311006, 'Gil Basmayor', 1, 6, 'gil006', 'USER'),
(202311007, 'Vivian Boridas', 1, 7, 'vivian007', 'USER'),
(202311008, 'Elvie Barsaga', 1, 8, 'elvie008', 'USER'),
(202311009, 'Mark', 1, 9, 'mark009', 'ADMIN'),
(202311010, 'Homer Basmayor', 1, 10, 'homer010', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_legal`
--

CREATE TABLE `tbl_legal` (
  `legalID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `officialCopy` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_legal`
--

INSERT INTO `tbl_legal` (`legalID`, `title`, `date`, `officialCopy`) VALUES
(101, 'Lot Title and Forms', '2024-01-11', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meeting`
--

CREATE TABLE `tbl_meeting` (
  `meetingID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `minutes` longblob DEFAULT NULL,
  `transcript` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_meeting`
--

INSERT INTO `tbl_meeting` (`meetingID`, `title`, `date`, `minutes`, `transcript`) VALUES
(101, 'Land Ownership Transfer', '0000-00-00', NULL, NULL),
(102, 'wwwwwwwwwwwwwww', '2024-01-10', '', ''),
(103, 'sadas', '2024-01-18', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_monthly`
--

CREATE TABLE `tbl_monthly` (
  `dueID` int(11) NOT NULL,
  `accountID` int(11) NOT NULL,
  `amount` int(11) DEFAULT 100,
  `status` varchar(255) NOT NULL DEFAULT 'Unpaid',
  `year` int(10) NOT NULL,
  `month` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_monthly`
--

INSERT INTO `tbl_monthly` (`dueID`, `accountID`, `amount`, `status`, `year`, `month`) VALUES
(10001, 202311001, 100, 'Exempted', 2023, 1),
(10002, 202311002, 100, 'Unpaid', 2023, 1),
(10004, 202311003, 100, 'Exempted', 2023, 1),
(10005, 202311004, 100, 'Paid', 2023, 1),
(10006, 202311005, 100, 'Paid', 2023, 1),
(10007, 202311006, 100, 'Exempted', 2023, 1),
(10008, 202311007, 100, 'Paid', 2023, 1),
(10009, 202311008, 100, 'Paid', 2023, 1),
(10010, 202311009, 100, 'Paid', 2023, 1),
(10011, 202311010, 100, 'Unpaid', 2023, 1),
(10012, 202311001, 100, 'Exempted', 2023, 2),
(10013, 202311002, 100, 'Paid', 2023, 2),
(10014, 202311003, 100, 'Unpaid', 2023, 2),
(10015, 202311004, 100, 'Unpaid', 2023, 2),
(10016, 202311005, 100, 'Unpaid', 2023, 2),
(10017, 202311006, 100, 'Unpaid', 2023, 2),
(10018, 202311007, 100, 'Unpaid', 2023, 2),
(10019, 202311008, 100, 'Unpaid', 2023, 2),
(10020, 202311009, 100, 'Unpaid', 2023, 2),
(10021, 202311010, 100, 'Unpaid', 2023, 2),
(10022, 202311001, 100, 'Unpaid', 2023, 3),
(10023, 202311002, 100, 'Unpaid', 2023, 3),
(10024, 202311003, 100, 'Unpaid', 2023, 3),
(10025, 202311004, 100, 'Unpaid', 2023, 3),
(10026, 202311005, 100, 'Unpaid', 2023, 3),
(10027, 202311006, 100, 'Unpaid', 2023, 3),
(10028, 202311007, 100, 'Unpaid', 2023, 3),
(10029, 202311008, 100, 'Unpaid', 2023, 3),
(10030, 202311009, 100, 'Unpaid', 2023, 3),
(10031, 202311010, 100, 'Unpaid', 2023, 3),
(10127, 202311001, 100, 'Unpaid', 2023, 4),
(10128, 202311002, 100, 'Unpaid', 2023, 4),
(10129, 202311003, 100, 'Unpaid', 2023, 4),
(10130, 202311004, 100, 'Unpaid', 2023, 4),
(10131, 202311005, 100, 'Unpaid', 2023, 4),
(10132, 202311006, 100, 'Unpaid', 2023, 4),
(10133, 202311007, 100, 'Unpaid', 2023, 4),
(10134, 202311008, 100, 'Unpaid', 2023, 4),
(10135, 202311009, 100, 'Unpaid', 2023, 4),
(10136, 202311010, 100, 'Unpaid', 2023, 4),
(10137, 202311001, 100, 'Unpaid', 2023, 5),
(10138, 202311002, 100, 'Unpaid', 2023, 5),
(10139, 202311003, 100, 'Unpaid', 2023, 5),
(10140, 202311004, 100, 'Unpaid', 2023, 5),
(10141, 202311005, 100, 'Unpaid', 2023, 5),
(10142, 202311006, 100, 'Unpaid', 2023, 5),
(10143, 202311007, 100, 'Unpaid', 2023, 5),
(10144, 202311008, 100, 'Unpaid', 2023, 5),
(10145, 202311009, 100, 'Unpaid', 2023, 5),
(10146, 202311010, 100, 'Unpaid', 2023, 5),
(10147, 202311001, 100, 'Unpaid', 2023, 6),
(10148, 202311002, 100, 'Unpaid', 2023, 6),
(10149, 202311003, 100, 'Unpaid', 2023, 6),
(10150, 202311004, 100, 'Unpaid', 2023, 6),
(10151, 202311005, 100, 'Unpaid', 2023, 6),
(10152, 202311006, 100, 'Unpaid', 2023, 6),
(10153, 202311007, 100, 'Unpaid', 2023, 6),
(10154, 202311008, 100, 'Unpaid', 2023, 6),
(10155, 202311009, 100, 'Unpaid', 2023, 6),
(10156, 202311010, 100, 'Unpaid', 2023, 6),
(10157, 202311001, 100, 'Unpaid', 2023, 7),
(10158, 202311002, 100, 'Unpaid', 2023, 7),
(10159, 202311003, 100, 'Unpaid', 2023, 7),
(10160, 202311004, 100, 'Unpaid', 2023, 7),
(10161, 202311005, 100, 'Unpaid', 2023, 7),
(10162, 202311006, 100, 'Unpaid', 2023, 7),
(10163, 202311007, 100, 'Unpaid', 2023, 7),
(10164, 202311008, 100, 'Unpaid', 2023, 7),
(10165, 202311009, 100, 'Unpaid', 2023, 7),
(10166, 202311010, 100, 'Unpaid', 2023, 7),
(10167, 202311001, 100, 'Unpaid', 2023, 8),
(10168, 202311002, 100, 'Unpaid', 2023, 8),
(10169, 202311003, 100, 'Unpaid', 2023, 8),
(10170, 202311004, 100, 'Unpaid', 2023, 8),
(10171, 202311005, 100, 'Unpaid', 2023, 8),
(10172, 202311006, 100, 'Unpaid', 2023, 8),
(10173, 202311007, 100, 'Unpaid', 2023, 8),
(10174, 202311008, 100, 'Unpaid', 2023, 8),
(10175, 202311009, 100, 'Unpaid', 2023, 8),
(10176, 202311010, 100, 'Unpaid', 2023, 8),
(10177, 202311001, 100, 'Unpaid', 2023, 9),
(10178, 202311002, 100, 'Unpaid', 2023, 9),
(10179, 202311003, 100, 'Unpaid', 2023, 9),
(10180, 202311004, 100, 'Unpaid', 2023, 9),
(10181, 202311005, 100, 'Unpaid', 2023, 9),
(10182, 202311006, 100, 'Unpaid', 2023, 9),
(10183, 202311007, 100, 'Unpaid', 2023, 9),
(10184, 202311008, 100, 'Unpaid', 2023, 9),
(10185, 202311009, 100, 'Unpaid', 2023, 9),
(10186, 202311010, 100, 'Unpaid', 2023, 9),
(10187, 202311001, 100, 'Unpaid', 2023, 10),
(10188, 202311002, 100, 'Unpaid', 2023, 10),
(10189, 202311003, 100, 'Unpaid', 2023, 10),
(10190, 202311004, 100, 'Unpaid', 2023, 10),
(10191, 202311005, 100, 'Unpaid', 2023, 10),
(10192, 202311006, 100, 'Unpaid', 2023, 10),
(10193, 202311007, 100, 'Unpaid', 2023, 10),
(10194, 202311008, 100, 'Unpaid', 2023, 10),
(10195, 202311009, 100, 'Unpaid', 2023, 10),
(10196, 202311010, 100, 'Unpaid', 2023, 10),
(10197, 202311001, 100, 'Unpaid', 2023, 11),
(10198, 202311002, 100, 'Unpaid', 2023, 11),
(10199, 202311003, 100, 'Unpaid', 2023, 11),
(10200, 202311004, 100, 'Unpaid', 2023, 11),
(10201, 202311005, 100, 'Unpaid', 2023, 11),
(10202, 202311006, 100, 'Unpaid', 2023, 11),
(10203, 202311007, 100, 'Unpaid', 2023, 11),
(10204, 202311008, 100, 'Unpaid', 2023, 11),
(10205, 202311009, 100, 'Unpaid', 2023, 11),
(10206, 202311010, 100, 'Unpaid', 2023, 11),
(10207, 202311001, 100, 'Unpaid', 2023, 12),
(10208, 202311002, 100, 'Unpaid', 2023, 12),
(10209, 202311003, 100, 'Unpaid', 2023, 12),
(10210, 202311004, 100, 'Unpaid', 2023, 12),
(10211, 202311005, 100, 'Unpaid', 2023, 12),
(10212, 202311006, 100, 'Unpaid', 2023, 12),
(10213, 202311007, 100, 'Unpaid', 2023, 12),
(10214, 202311008, 100, 'Unpaid', 2023, 12),
(10215, 202311009, 100, 'Unpaid', 2023, 12),
(10216, 202311010, 100, 'Unpaid', 2023, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_months`
--

CREATE TABLE `tbl_months` (
  `monthID` int(10) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_months`
--

INSERT INTO `tbl_months` (`monthID`, `month`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `block` int(10) NOT NULL,
  `lot` int(10) NOT NULL,
  `residentID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`block`, `lot`, `residentID`, `name`, `age`, `gender`) VALUES
(1, 1, 1, 'Mark C. Perando', 34, 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resolution`
--

CREATE TABLE `tbl_resolution` (
  `resolutionID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `dateCreated` date NOT NULL,
  `dateImplemented` date NOT NULL,
  `officialCopy` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rules`
--

CREATE TABLE `tbl_rules` (
  `ruleID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `dateCreated` date NOT NULL,
  `dateImplemented` date NOT NULL,
  `officialCopy` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rules`
--

INSERT INTO `tbl_rules` (`ruleID`, `title`, `dateCreated`, `dateImplemented`, `officialCopy`) VALUES
(109, ' 2024 Waste Management Policy  ', '2023-01-04', '2023-01-19', 0x75706c6f6164732f3431333130353139395f313734353931373733353931373238395f333339383534363934353337323130353632385f6e2e646f6378);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_year`
--

CREATE TABLE `tbl_year` (
  `yearID` int(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_year`
--

INSERT INTO `tbl_year` (`yearID`, `year`) VALUES
(2023, 2023),
(2024, 2024);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `tbl_amilyar`
--
ALTER TABLE `tbl_amilyar`
  ADD PRIMARY KEY (`amilyarID`),
  ADD KEY `year` (`year`),
  ADD KEY `accountID` (`accountID`);

--
-- Indexes for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  ADD PRIMARY KEY (`budgetID`),
  ADD KEY `yearID` (`yearID`);

--
-- Indexes for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  ADD PRIMARY KEY (`expenseID`),
  ADD KEY `yearID` (`yearID`);

--
-- Indexes for table `tbl_homeowners`
--
ALTER TABLE `tbl_homeowners`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `tbl_meeting`
--
ALTER TABLE `tbl_meeting`
  ADD PRIMARY KEY (`meetingID`);

--
-- Indexes for table `tbl_monthly`
--
ALTER TABLE `tbl_monthly`
  ADD PRIMARY KEY (`dueID`),
  ADD KEY `month` (`month`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `tbl_months`
--
ALTER TABLE `tbl_months`
  ADD PRIMARY KEY (`monthID`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`residentID`);

--
-- Indexes for table `tbl_resolution`
--
ALTER TABLE `tbl_resolution`
  ADD PRIMARY KEY (`resolutionID`);

--
-- Indexes for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  ADD PRIMARY KEY (`ruleID`);

--
-- Indexes for table `tbl_year`
--
ALTER TABLE `tbl_year`
  ADD PRIMARY KEY (`yearID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `accountID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202311002;

--
-- AUTO_INCREMENT for table `tbl_amilyar`
--
ALTER TABLE `tbl_amilyar`
  MODIFY `amilyarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  MODIFY `budgetID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_expenses`
--
ALTER TABLE `tbl_expenses`
  MODIFY `expenseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_homeowners`
--
ALTER TABLE `tbl_homeowners`
  MODIFY `accountID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212121218;

--
-- AUTO_INCREMENT for table `tbl_meeting`
--
ALTER TABLE `tbl_meeting`
  MODIFY `meetingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_monthly`
--
ALTER TABLE `tbl_monthly`
  MODIFY `dueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10217;

--
-- AUTO_INCREMENT for table `tbl_months`
--
ALTER TABLE `tbl_months`
  MODIFY `monthID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `residentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2023121009;

--
-- AUTO_INCREMENT for table `tbl_resolution`
--
ALTER TABLE `tbl_resolution`
  MODIFY `resolutionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_rules`
--
ALTER TABLE `tbl_rules`
  MODIFY `ruleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_year`
--
ALTER TABLE `tbl_year`
  MODIFY `yearID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2025;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_amilyar`
--
ALTER TABLE `tbl_amilyar`
  ADD CONSTRAINT `tbl_amilyar_ibfk_1` FOREIGN KEY (`year`) REFERENCES `tbl_year` (`yearID`),
  ADD CONSTRAINT `tbl_amilyar_ibfk_2` FOREIGN KEY (`accountID`) REFERENCES `tbl_homeowners` (`accountID`);

--
-- Constraints for table `tbl_budget`
--
ALTER TABLE `tbl_budget`
  ADD CONSTRAINT `tbl_budget_ibfk_1` FOREIGN KEY (`yearID`) REFERENCES `tbl_year` (`yearID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `tbl_monthly`
--
ALTER TABLE `tbl_monthly`
  ADD CONSTRAINT `tbl_monthly_ibfk_1` FOREIGN KEY (`month`) REFERENCES `tbl_months` (`monthID`),
  ADD CONSTRAINT `tbl_monthly_ibfk_2` FOREIGN KEY (`year`) REFERENCES `tbl_year` (`yearID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
