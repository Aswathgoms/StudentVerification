-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 11:04 AM
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
-- Database: `studentdatabasee`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `password`) VALUES
('admin@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clg`
--

CREATE TABLE `tbl_clg` (
  `clg_id` int(11) NOT NULL,
  `college` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_clg`
--

INSERT INTO `tbl_clg` (`clg_id`, `college`) VALUES
(1, 'abc college'),
(2, 'xyz college');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_education`
--

CREATE TABLE `tbl_education` (
  `edu_id` bigint(20) UNSIGNED NOT NULL,
  `stu_email` varchar(50) NOT NULL,
  `sslc_regno` varchar(50) NOT NULL,
  `sslc_school` varchar(100) NOT NULL,
  `sslc_board` varchar(100) NOT NULL,
  `sslc_markperc` float NOT NULL,
  `sslc_marksheet` varchar(100) NOT NULL,
  `sslc_passout` year(4) NOT NULL,
  `hsc_regno` varchar(50) NOT NULL,
  `hsc_school` varchar(100) NOT NULL,
  `hsc_board` varchar(100) NOT NULL,
  `hsc_markperc` float NOT NULL,
  `hsc_marksheet` varchar(100) NOT NULL,
  `hsc_passout` year(4) NOT NULL,
  `hsc_specialization` varchar(100) NOT NULL,
  `clg_regno` varchar(100) NOT NULL,
  `clg_name` varchar(100) NOT NULL,
  `clg_department` varchar(100) NOT NULL,
  `clg_university` varchar(100) NOT NULL,
  `clg_mark` float NOT NULL,
  `clg_marksheet` varchar(100) NOT NULL,
  `clg_passout` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_education`
--

INSERT INTO `tbl_education` (`edu_id`, `stu_email`, `sslc_regno`, `sslc_school`, `sslc_board`, `sslc_markperc`, `sslc_marksheet`, `sslc_passout`, `hsc_regno`, `hsc_school`, `hsc_board`, `hsc_markperc`, `hsc_marksheet`, `hsc_passout`, `hsc_specialization`, `clg_regno`, `clg_name`, `clg_department`, `clg_university`, `clg_mark`, `clg_marksheet`, `clg_passout`) VALUES
(4, 'abc@gmail.com', 'hkvj', 'kbk', 'b', 0, '', '0000', 'bkhbb', 'kbkhh', 'bkb', 0, '', '0000', 'kbk', 'kb', 'xyz college', 'bkhhb', 'khb', 0, '', '0000'),
(5, 'balasinghrp@gmail.com', '35435353', 'abc school', 'state Board', 99.9, '', '2017', '14554353', 'abc school', 'State Board', 54, '', '2019', 'pcm', '19bca09', 'xyz college', 'Computer Application', 'ms university', 86, '', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_officer`
--

CREATE TABLE `tbl_officer` (
  `officer_id` varchar(50) NOT NULL,
  `officer_name` varchar(50) NOT NULL,
  `officer_qua` varchar(50) NOT NULL,
  `officer_pswd` varchar(100) NOT NULL,
  `officer_clg` varchar(500) NOT NULL,
  `officer_sign` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_officer`
--

INSERT INTO `tbl_officer` (`officer_id`, `officer_name`, `officer_qua`, `officer_pswd`, `officer_clg`, `officer_sign`) VALUES
('test@gmail.com', 'test', 'test', 'test', 'xyz college', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `stu_img` varchar(100) NOT NULL,
  `stu_name` varchar(50) NOT NULL,
  `stu_dob` date NOT NULL,
  `stu_gender` varchar(20) NOT NULL,
  `stu_email` varchar(50) NOT NULL,
  `stu_pswd` varchar(100) NOT NULL,
  `stu_contact` varchar(50) NOT NULL,
  `stu_father` varchar(50) NOT NULL,
  `stu_mother` varchar(50) NOT NULL,
  `stu_aadhar` varchar(20) NOT NULL,
  `stu_pan` varchar(20) NOT NULL,
  `stu_resume` varchar(100) NOT NULL,
  `stu_sign` varchar(100) NOT NULL,
  `stu_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`stu_img`, `stu_name`, `stu_dob`, `stu_gender`, `stu_email`, `stu_pswd`, `stu_contact`, `stu_father`, `stu_mother`, `stu_aadhar`, `stu_pan`, `stu_resume`, `stu_sign`, `stu_status`) VALUES
('', 'ABC', '2022-05-18', 'Male', 'abc@gmail.com', 'test', '999928885', 'X', 'abcmother', '152432566895', '142553268547', '', '', 'Verified'),
('', 'Arun Bala', '2002-05-28', 'Male', 'balasinghrp@gmail.com', 'Bala@123', '7548835114', 'Sam', 'angel', '154215241524', '15241524512', '', '', 'Verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_clg`
--
ALTER TABLE `tbl_clg`
  ADD PRIMARY KEY (`clg_id`);

--
-- Indexes for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD PRIMARY KEY (`edu_id`),
  ADD KEY `fk_edu` (`stu_email`);

--
-- Indexes for table `tbl_officer`
--
ALTER TABLE `tbl_officer`
  ADD PRIMARY KEY (`officer_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`stu_email`),
  ADD UNIQUE KEY `stu_aadhar` (`stu_aadhar`),
  ADD UNIQUE KEY `stu_pan` (`stu_pan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_clg`
--
ALTER TABLE `tbl_clg`
  MODIFY `clg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_education`
--
ALTER TABLE `tbl_education`
  MODIFY `edu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_education`
--
ALTER TABLE `tbl_education`
  ADD CONSTRAINT `fk_edu` FOREIGN KEY (`stu_email`) REFERENCES `tbl_student` (`stu_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
