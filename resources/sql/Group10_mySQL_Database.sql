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
-- Populate `AvailableInterests` Table
--
INSERT INTO `AvailableInterests` (`InterestID`, `InterestName`) 
VALUES ('1', 'Reading'), ('2', 'Woodworking'), ('3', 'Gardening'), ('4', 'Video Games'), 
       ('5', 'Fishing'), ('6', 'Walking'), ('7', 'Yoga'), ('8', 'Traveling');

-- --------------------------------------------------------
--
-- Table structure for table `Connections`
--
CREATE TABLE `Connections` (
  `UserID` int(11) NOT NULL COMMENT 'Which User initiated the connection?',
  `ConnectionID` int(11) NOT NULL COMMENT 'Which User received the connection',
  `ConnectionDate` date NOT NULL COMMENT 'When was the connection made?',
  `Status` enum('Pending', 'Connected', 'Declined') NOT NULL COMMENT 'What is the Status of the connection?'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `Interests`
--
CREATE TABLE `Interests` (
  `UserID` int(11) NOT NULL COMMENT 'Which User is this?',
  `InterestID` int(3) NOT NULL COMMENT 'Which interest do they have?'
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Interests of ALL Users';

-- --------------------------------------------------------
--
-- Table structure for table `Profile`
--
CREATE TABLE `Profile` (
  `UserID` int(11) NOT NULL,
  `Age` int(2) NOT NULL,
  `Height` int(3) NOT NULL COMMENT 'Height in cm of the User',
  `StarSign` enum(
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
  `Smoking` binary(1) NOT NULL COMMENT 'Binary type because this is yes or no',
  `Drinking` enum(
    'Constantly',
    'Most days',
    'Social Drinker',
    'No'
  ) NOT NULL COMMENT 'Enumerated type because there are several answers, but the available answers won''t change',
  `Gender` enum('Female', 'Male', 'Other') NOT NULL COMMENT 'See Drinking comment',
  `Seeking` enum('Female', 'Male', 'Other') NOT NULL COMMENT 'See Drinking comment',
  `Religion` enum(
    'Athiest',
    'Christian',
    'Judaism',
    'Buddhism',
    'Islam',
    'Sikhism',
    'Hinduism'
  ) NOT NULL,
  `Children` binary(1) NOT NULL COMMENT 'Boolean type representing whether the User has children or not',
  `Description` text NOT NULL COMMENT 'Text type because this will contain a free text description of the person',
  `Banned` binary(1) NOT NULL COMMENT 'Has the User been banned by an admin?',
  `Photo` blob NOT NULL COMMENT 'Mysql preferred way of saving images on DB',
  `LocationID` int(11) NOT NULL COMMENT 'The Location ID of the town the User is in'
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Table structure for table `User`
--
CREATE TABLE `User` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `LastLoginTime` DATETIME DEFAULT CURRENT_TIMESTAMP() NOT NULL COMMENT 'Records when the User last logged in',
  `SignupDate` DATETIME DEFAULT CURRENT_TIMESTAMP() NOT NULL COMMENT 'Records when the User created their account',
  `Email` varchar(26) NOT NULL,
  `Firstname` varchar(26) NOT NULL,
  `Surname` varchar(26) NOT NULL,
  `Password` varchar(256) NOT NULL COMMENT 'See video for information on how to encrypt password BEFORE storing it. Never store the User''s actual password.',
  `UserType` enum('Admin', 'User') COMMENT 'Enum type representing whether the User is an admin or not.',
  PRIMARY KEY (`UserID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Store personal information about the User. ';

CREATE TABLE `Report` (
  `ReporterID` int(11) NOT NULL COMMENT 'INT representing the person making the Reports ID',
  `ReportedID` int(11) NOT NULL COMMENT 'INT representing the person the Report is about',
  `Report` varchar(200) NOT NULL COMMENT 'Content of the Report as a string',
  `Date` DATETIME DEFAULT CURRENT_TIMESTAMP() NOT NULL COMMENT 'Records when the Report was made',
  `ReportType` enum(
    'Inappropriate content',
    'Fake Profile',
    'Hate speech',
    'Other'
  ) NOT NULL COMMENT 'Enum representing the type of Report'
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Stores Reports made by the Users.';

CREATE TABLE `Location` (
  `LocationID` int(11) NOT NULL AUTO_INCREMENT,
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
  ) NOT NULL COMMENT 'String representing the county',
  PRIMARY KEY (`LocationID`)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Stores all available Locations.';

-- --------------------------------------------------------
--
-- Populate `Location` Table
--
INSERT INTO `Location` (`LocationID`, `County`) 
VALUES ('1', 'Antrim'), ('2', 'Armagh'), ('3', 'Carlow'), ('4', 'Cavan'), ('5', 'Clare'),
       ('6', 'Cork'), ('7', 'Derry'), ('8', 'Donegal'), ('9', 'Down'), ('10', 'Dublin'),
       ('11', 'Fermanagh'), ('12', 'Galway'), ('13', 'Kerry'), ('14', 'Kildare'), ('15', 'Kilkenny'),
       ('16', 'Laois'), ('17', 'Leitrim'), ('18', 'Limerick'), ('19', 'Longford'), ('20', 'Louth'),
       ('21', 'Mayo'), ('22', 'Meath'), ('23', 'Monaghan'), ('24', 'Offaly'), ('25', 'Roscommon'),
       ('26', 'Sligo'), ('27', 'Tipperary'), ('28', 'Tyrone'), ('29', 'Waterford'), ('30', 'Westmeath'),
       ('31', 'Wexford'), ('32', 'Wicklow');

CREATE TABLE `Block` (
  `BlockerID` int(11) NOT NULL COMMENT 'INT representing the person who is Blocking another User',
  `BlockedID` int(11) NOT NULL COMMENT 'INT representing the person who is Blocked',
  `Date` DATETIME DEFAULT CURRENT_TIMESTAMP() NOT NULL COMMENT 'Records when the Report was made'
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COMMENT = 'Stores Blocks made by the Users.';

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
  KEY `UserID` (`UserID`),
ADD
  KEY `ConnectionID` (`ConnectionID`);

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
-- Indexes for table `Profile`
--
ALTER TABLE
  `Profile`
ADD
  PRIMARY KEY (`UserID`);

ALTER TABLE
  `Report`
ADD
  CONSTRAINT `Report_ibfk_1` FOREIGN KEY (`ReporterID`) REFERENCES `User` (`UserID`),
ADD
  CONSTRAINT `Report_ibfk_2` FOREIGN KEY (`ReportedID`) REFERENCES `User` (`UserID`);

ALTER TABLE
  `Connections`
ADD
  CONSTRAINT `Connections_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
ADD
  CONSTRAINT `Connections_ibfk_2` FOREIGN KEY (`ConnectionID`) REFERENCES `User` (`UserID`);

--
-- Constraints for table `Interests`
--
ALTER TABLE
  `Interests`
ADD
  CONSTRAINT `Interests_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
ADD
  CONSTRAINT `Interests_ibfk_2` FOREIGN KEY (`InterestID`) REFERENCES `AvailableInterests` (`InterestID`);

--
-- Constraints for table `Profile`
--
ALTER TABLE
  `Profile`
ADD
  CONSTRAINT `Profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `User` (`UserID`),
ADD
  CONSTRAINT `Profile_ibfk_2` FOREIGN KEY (`LocationID`) REFERENCES `Location` (`LocationID`);

ALTER TABLE
  `Block`
ADD
  CONSTRAINT `Block_ibfk_1` FOREIGN KEY (`BlockerID`) REFERENCES `User` (`UserID`),
ADD
  CONSTRAINT `Block_ibfk_2` FOREIGN KEY (`BlockedID`) REFERENCES `User` (`UserID`);