-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2024 at 06:22 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_history`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `DoctorID` int(3) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `Specialization` varchar(30) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Availability` varchar(50) NOT NULL,
  PRIMARY KEY (`DoctorID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `HistoryID` int(5) NOT NULL AUTO_INCREMENT,
  `VisitID` int(5) NOT NULL,
  `Diagnosis` varchar(50) NOT NULL,
  `DiagnosisDate` date NOT NULL,
  `Observation` varchar(100) NOT NULL,
  `Treatment` varchar(100) NOT NULL,
  `LabTest` varchar(50) NOT NULL,
  `Notes` varchar(100) NOT NULL,
  PRIMARY KEY (`HistoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `PatientID` int(4) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(15) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` char(1) NOT NULL,
  `ContactNumber` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Insured` char(1) NOT NULL,
  `InsuranceCompany` varchar(50) NOT NULL,
  `ReferredBy` varchar(50) NOT NULL,
  `FirstVisitDate` date NOT NULL,
  `LastVisitDate` date NOT NULL,
  `AllergicTo` varchar(30) NOT NULL,
  `History` varchar(250) NOT NULL,
  PRIMARY KEY (`PatientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

DROP TABLE IF EXISTS `prescription`;
CREATE TABLE IF NOT EXISTS `prescription` (
  `PrescriptionID` int(5) NOT NULL AUTO_INCREMENT,
  `HistoryID` int(5) NOT NULL,
  `Medicine` varchar(250) NOT NULL,
  `Instruction` varchar(250) NOT NULL,
  PRIMARY KEY (`PrescriptionID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

DROP TABLE IF EXISTS `visit`;
CREATE TABLE IF NOT EXISTS `visit` (
  `VisitID` int(5) NOT NULL AUTO_INCREMENT,
  `PatientID` int(4) NOT NULL,
  `DoctorID` int(3) NOT NULL,
  `VisitDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CaseFee` int(3) NOT NULL,
  `CaseFeeType` char(1) NOT NULL,
  `VisitCategory` char(1) NOT NULL,
  `Notes` varchar(20) NOT NULL,
  PRIMARY KEY (`VisitID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
