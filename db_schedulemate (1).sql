-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 03:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_schedulemate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_plotting`
--

CREATE TABLE `tb_plotting` (
  `plotID` int(255) NOT NULL,
  `plotYear` varchar(255) NOT NULL,
  `plotSem` varchar(255) NOT NULL,
  `plotSubj` varchar(255) NOT NULL,
  `plotSection` varchar(255) NOT NULL,
  `plotRoom` varchar(255) NOT NULL,
  `plotProf` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_plotting`
--

INSERT INTO `tb_plotting` (`plotID`, `plotYear`, `plotSem`, `plotSubj`, `plotSection`, `plotRoom`, `plotProf`) VALUES
(1, ' SY 2025 - 2026', '1st Semester', 'PC4112 ', 'BSIT3A ', 'IT 404', 'TereYandoc '),
(2, ' SY 2024 - 2025', '1st Semester', 'test ', 'CAS1A ', 'IT 402', 'melcons ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_professor`
--

CREATE TABLE `tb_professor` (
  `profID` int(200) NOT NULL,
  `profEmployID` int(255) NOT NULL,
  `profFname` varchar(255) NOT NULL,
  `profMname` varchar(255) NOT NULL,
  `profLname` varchar(255) NOT NULL,
  `profMobile` varchar(11) NOT NULL,
  `profAddress` varchar(255) NOT NULL,
  `profEduc` varchar(255) NOT NULL,
  `profExpert` varchar(255) NOT NULL,
  `profRank` varchar(255) NOT NULL,
  `profHrs` int(255) NOT NULL,
  `profEmployStatus` varchar(100) NOT NULL,
  `profStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_professor`
--

INSERT INTO `tb_professor` (`profID`, `profEmployID`, `profFname`, `profMname`, `profLname`, `profMobile`, `profAddress`, `profEduc`, `profExpert`, `profRank`, `profHrs`, `profEmployStatus`, `profStatus`) VALUES
(1, 0, 'Domenique', 'Lanurias', 'Yandoc', '09205090847', 'Cambaro', 'ajsdajksdnan', 'ajksdnasndaksnd', 'Associate Prof. 5', 12, 'Part-Time', 1),
(2, 0, 'Domenique', 'Lanurias', 'Yandoc', '09912128475', 'sadsdas', 'dasdas', 'dasdas', 'Associate Prof. 5', 12, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_register`
--

CREATE TABLE `tb_register` (
  `userID` int(200) NOT NULL,
  `userEmployID` int(255) NOT NULL,
  `userFname` varchar(255) NOT NULL,
  `userMname` varchar(255) NOT NULL,
  `userLname` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPosition` varchar(255) NOT NULL,
  `userCollege` varchar(255) NOT NULL,
  `userProgram` varchar(255) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userApproval` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_register`
--

INSERT INTO `tb_register` (`userID`, `userEmployID`, `userFname`, `userMname`, `userLname`, `userEmail`, `userPosition`, `userCollege`, `userProgram`, `userPass`, `userApproval`) VALUES
(1, 0, 'Domenique', '', 'Yandoc', 'domenique.yandoc@ctu.edu.ph', 'dean', 'ccict', 'BSIT - Bachelor of Science in Information Technology', '$2y$10$.OqfAwCh4/2vkNqcc8Kfc.hdywV00qCB6Pyntnjv2ArMyROhsmOuS', 'approved'),
(4, 119480, 'tere', 'mon', 'teron', 'theresemonteron3@gmail.com', 'chairperson', 'ccict', 'BSIT - Bachelor of Science in Information Technology', '$2y$10$z380Cd/CD0yMXUnpw3o0iuRS9g8Cga3d8WLrtmx0k97saaQHQVdIu', 'approved'),
(6, 1999, 'test', 'test', 'test', 'test@gmail.com', 'admin', '', '', '$2y$10$YOh1Rz7hUQAOAA3UbwpbY.fMxi1rciZn28gjcW7IyBjuHnSIuNurO', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `roomID` int(255) NOT NULL,
  `roomBuild` varchar(255) NOT NULL,
  `roomFloornum` int(255) NOT NULL,
  `roomNum` varchar(255) NOT NULL,
  `roomStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`roomID`, `roomBuild`, `roomFloornum`, `roomNum`, `roomStatus`) VALUES
(1, 'IT', 4, '402', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_section`
--

CREATE TABLE `tb_section` (
  `secID` int(255) NOT NULL,
  `secProgram` varchar(255) NOT NULL,
  `secYearlvl` int(255) NOT NULL,
  `secName` varchar(255) NOT NULL,
  `secSession` varchar(100) NOT NULL,
  `secStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_section`
--

INSERT INTO `tb_section` (`secID`, `secProgram`, `secYearlvl`, `secName`, `secSession`, `secStatus`) VALUES
(8, 'BSIT', 3, 'A', 'Night', 1),
(13, 'CAS', 1, 'A', 'Day', 1),
(14, 'BIT', 2, 'B', 'Day', 1),
(15, 'test1', 1, 'L', 'Day', 1),
(16, 'test', 1, 'WQ', 'Day', 1),
(17, 'IT', 1, 'K', 'Day', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subjects`
--

CREATE TABLE `tb_subjects` (
  `subID` int(255) NOT NULL,
  `subYear` varchar(255) NOT NULL,
  `subSem` varchar(255) NOT NULL,
  `subYearlvl` int(255) NOT NULL,
  `subCode` varchar(255) NOT NULL,
  `subDesc` varchar(255) NOT NULL,
  `subUnits` int(200) NOT NULL,
  `subLabhours` int(200) NOT NULL,
  `subLechours` int(200) NOT NULL,
  `subStatus` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_subjects`
--

INSERT INTO `tb_subjects` (`subID`, `subYear`, `subSem`, `subYearlvl`, `subCode`, `subDesc`, `subUnits`, `subLabhours`, `subLechours`, `subStatus`) VALUES
(1, ' SY 2024 - 2025', '1st Semester', 0, 'test', 'test', 6, 3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_week`
--

CREATE TABLE `tb_week` (
  `weekID` int(255) NOT NULL,
  `plotDay` varchar(255) NOT NULL,
  `plotTimeStart` varchar(255) NOT NULL,
  `plotTimeEnd` varchar(255) NOT NULL,
  `plotID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_week`
--

INSERT INTO `tb_week` (`weekID`, `plotDay`, `plotTimeStart`, `plotTimeEnd`, `plotID`) VALUES
(1, 'Monday', '01:43', '01:43', 1),
(2, 'Monday', '04:31', '16:32', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_plotting`
--
ALTER TABLE `tb_plotting`
  ADD PRIMARY KEY (`plotID`);

--
-- Indexes for table `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`profID`);

--
-- Indexes for table `tb_register`
--
ALTER TABLE `tb_register`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `tb_section`
--
ALTER TABLE `tb_section`
  ADD PRIMARY KEY (`secID`);

--
-- Indexes for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  ADD PRIMARY KEY (`subID`);

--
-- Indexes for table `tb_week`
--
ALTER TABLE `tb_week`
  ADD PRIMARY KEY (`weekID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_plotting`
--
ALTER TABLE `tb_plotting`
  MODIFY `plotID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `profID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_register`
--
ALTER TABLE `tb_register`
  MODIFY `userID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_room`
--
ALTER TABLE `tb_room`
  MODIFY `roomID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_section`
--
ALTER TABLE `tb_section`
  MODIFY `secID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_subjects`
--
ALTER TABLE `tb_subjects`
  MODIFY `subID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_week`
--
ALTER TABLE `tb_week`
  MODIFY `weekID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
