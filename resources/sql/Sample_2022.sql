-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 30, 2018 at 09:00 AM
-- Server version: 5.7.22-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `dating_db`
--
-- --------------------------------------------------------
--
-- Table structure for table `AvailableInterests`
--
CREATE TABLE `AvailableInterests` (
  `InterestID` int(3) NOT NULL,
  `InterestName` varchar(26) NOT NULL COMMENT 'The name of the interest'
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Show a list of available interests for registration/search';

-- --------------------------------------------------------
--
-- Table structure for table `Connections`
--
CREATE TABLE `Connections` (
  `ConnectionID` int(11) NOT NULL,
  `userID1` int(11) NOT NULL COMMENT 'Which user initiated the connection?',
  `userID2` int(11) NOT NULL COMMENT 'Which user received the connection',
  `ConnectionDate` date NOT NULL COMMENT 'When was the connection made?',
  `status` enum('Pending', 'Connected', 'Declined') NOT NULL COMMENT 'What is the status of the connection?'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `Interests`
--
CREATE TABLE `Interests` (
  `UserID` int(11) NOT NULL COMMENT 'Which user is this?',
  `InterestID` int(3) NOT NULL COMMENT 'Which interest do they have?'
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Interests of ALL users';

-- --------------------------------------------------------
--
-- Table structure for table `profile`
--
CREATE TABLE `profile` (
  `UserID` int(11) NOT NULL,
  `Age` int(2) NOT NULL,
  `Height` int(3) NOT NULL COMMENT 'Height in cm of the user',
  `Star Sign` enum(
    'Aries',
    'Taurus',
    'Gemini',
    'Cancer',
    'Leo',
    'Virgo',
    'Libra',
    'Scorpio',
    'Sagittarius',
    'Capricorn',
    'Aquarius',
    'Pisces'
  ) NOT NULL,
  `Smoker` binary(1) NOT NULL COMMENT 'Binary type because this is yes or no',
  `Drinker` enum(
    'Constantly',
    'Most days',
    'Social Drinker',
    'No'
  ) NOT NULL COMMENT 'Enumerated type because there are several answers, but the available answers won''t change',
  `Gender` enum('Female', 'Male', 'Other') NOT NULL COMMENT 'See Drinker comment',
  `Seeking` enum('Female', 'Male', 'Other') NOT NULL COMMENT 'See Drinker comment',
  `Religion` enum(
    'Athiest',
    'Christian',
    'Judaism',
    'Buddhism',
    'Islam',
    'Sihkism',
    'Hinduism'
  ) NOT NULL,
  `Children` binary(1) NOT NULL COMMENT 'Boolean type representing whether the user has children or not',
  `Description` blob NOT NULL COMMENT 'Blob type because this will contain a free text description of the person',
  `Banned` binary(1) NOT NULL COMMENT 'Has the user been banned by an admin?',
  `Photo` varchar(26) NOT NULL COMMENT 'We should allow users to upload photos to the site; this field contains the name of the photo they have uploaded',
  `LocationID` int(11) NOT NULL COMMENT 'The location ID of the town the user is in'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `user`
--
CREATE TABLE `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `LastLoginTime` DATETIME DEFAULT current_timestamp() NOT NULL COMMENT 'Records when the user last logged in',
  `SignupDate` DATETIME DEFAULT current_timestamp() NOT NULL COMMENT 'Records when the user created their account',
  `Email` varchar(26) NOT NULL,
  `Firstname` varchar(26) NOT NULL,
  `Surname` varchar(26) NOT NULL,
  `Password` varchar(256) NOT NULL COMMENT 'See video for information on how to encrypt password BEFORE storing it. Never store the user''s actual password.',
  `UserType` enum('Admin', 'User') COMMENT 'Enum type representing whether the user is an admin or not.',
  primary key (`UserID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Store personal information about the user. ';

CREATE TABLE `report` (
  `ReportID` int(11) NOT NULL AUTO_INCREMENT,
  `ReporterID` int(11) NOT NULL COMMENT 'INT representing the person making the reports ID',
  `ReportedID` int(11) NOT NULL COMMENT 'INT representing the person the report is about',
  `Report` varchar(200) NOT NULL COMMENT 'Content of the report as a string',
  `Date` DATETIME DEFAULT current_timestamp() NOT NULL COMMENT 'Records when the report was made',
  `ReportType` enum(
    'Inappropriate content',
    'Fake profile',
    'Hate speech',
    'Other'
  ) NOT NUll Comment 'Enum representing the type of report',
  primary key (`ReportID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Stores reports made by the users.';

CREATE TABLE `location` (
  `LocationID` int(11) NOT NULL AUTO_INCREMENT,
  `Town` varchar(20) NOT NULL COMMENT 'String for the town/city name',
  `County` enum(
    'Antrim',
    'Armagh',
    'Carlow',
    'Cavan',
    'Clare',
    'Cork',
    'Derry',
    'Donegal',
    'Down',
    'Dublin',
    'Fermanagh',
    'Galway',
    'Kerry',
    'Kildare',
    'Kilkenny',
    'Laois',
    'Leitrim',
    'Limerick',
    'Longford',
    'Louth',
    'Mayo',
    'Meath',
    'Monaghan',
    'Offaly',
    'Roscommon',
    'Sligo',
    'Tipperary',
    'Tyrone',
    'Waterford',
    'Westmeath',
    'Wexford',
    'Wicklow'
  ) NOT NULL COMMENT 'String representing the county the town is in',
  `Province` enum('Munster', 'Leinster', 'Ulster', 'Connaught') NOT NULL COMMENT 'Enum representing the province of the location',
  primary key (`LocationID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Stores all available locations.';

CREATE TABLE `block` (
  `BlockID` int(11) NOT NULL AUTO_INCREMENT,
  `BlockerID` int(11) NOT NULL COMMENT 'INT representing the person who is blocking another user',
  `BlockedID` int(11) NOT NULL COMMENT 'INT representing the person who is blocked',
  `Date` DATETIME DEFAULT current_timestamp() NOT NULL COMMENT 'Records when the report was made',
  primary key (`BlockId`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Stores blocks made by the users.';

ALTER TABLE
  `AvailableInterests`
ADD
  PRIMARY KEY (`InterestID`);

--
-- Indexes for table `Connections`
--
ALTER TABLE
  `Connections`
ADD
  PRIMARY KEY (`ConnectionID`),
ADD
  KEY `userID1` (`userID1`),
ADD
  KEY `userID2` (`userID2`);

--
-- Indexes for table `Interests`
--
ALTER TABLE
  `Interests`
ADD
  PRIMARY KEY (`UserID`, `InterestID`),
ADD
  KEY `UserID` (`UserID`),
ADD
  KEY `InterestID` (`InterestID`);

--
-- Indexes for table `profile`
--
ALTER TABLE
  `profile`
ADD
  PRIMARY KEY (`UserID`);

--
--
-- Constraints for dumped tables
--
--
-- Constraints for table `Connections`
--
ALTER TABLE
  `Connections`
ADD
  CONSTRAINT `Connections_ibfk_1` FOREIGN KEY (`userID1`) REFERENCES `user` (`UserID`),
ADD
  CONSTRAINT `Connections_ibfk_2` FOREIGN KEY (`userID2`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `Interests`
--
ALTER TABLE
  `Interests`
ADD
  CONSTRAINT `Interests_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
ADD
  CONSTRAINT `Interests_ibfk_2` FOREIGN KEY (`InterestID`) REFERENCES `AvailableInterests` (`InterestID`);

--
-- Constraints for table `profile`
--
ALTER TABLE
  `profile`
ADD
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;