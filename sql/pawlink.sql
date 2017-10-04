-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2017 at 03:42 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pawlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` bigint(20) UNSIGNED NOT NULL,
  `ownerUserID` int(10) UNSIGNED NOT NULL,
  `walkerUserID` int(10) UNSIGNED NOT NULL,
  `duration` varchar(255) NOT NULL,
  `noDogs` tinyint(4) NOT NULL,
  `dateTime` datetime NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `ownerUserID`, `walkerUserID`, `duration`, `noDogs`, `dateTime`, `status`) VALUES
(64, 42, 17, '30', 1, '2017-09-29 12:00:00', 'unconfirmed'),
(65, 42, 17, '60', 1, '2017-09-30 16:00:00', 'unconfirmed'),
(66, 71, 17, '30', 2, '2017-10-07 12:00:00', 'unconfirmed'),
(67, 71, 17, '60', 2, '2017-10-10 15:00:00', 'unconfirmed'),
(68, 71, 22, '30', 2, '2017-10-10 14:00:00', 'unconfirmed'),
(69, 88, 17, '30', 1, '2017-10-07 12:00:00', 'unconfirmed'),
(70, 82, 17, '30', 1, '2017-10-05 12:00:00', 'unconfirmed');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `conversationID` bigint(20) UNSIGNED NOT NULL,
  `toUserID` int(10) UNSIGNED DEFAULT NULL,
  `fromUserID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dogs`
--

CREATE TABLE `dogs` (
  `dogID` int(10) UNSIGNED NOT NULL,
  `dogName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dogProfileImage` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `breed` varchar(255) CHARACTER SET latin1 NOT NULL,
  `birthYear` year(4) NOT NULL,
  `gender` varchar(255) CHARACTER SET latin1 NOT NULL,
  `dogDescription` text CHARACTER SET latin1 NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dogs`
--

INSERT INTO `dogs` (`dogID`, `dogName`, `dogProfileImage`, `breed`, `birthYear`, `gender`, `dogDescription`, `userID`) VALUES
(8, 'Casey Dog', '1505822057.jpg', 'Golden Retriever', 2011, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 15),
(9, 'Mimi', '1505884961.jpg', 'Bichon Frise', 2016, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 16),
(10, 'Kya', '1505978047.jpg', 'German Shepherd', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 17),
(11, 'Soldier', '1505982079.jpg', 'German Shepherd', 2016, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 18),
(12, 'Coco', '1505982176.jpg', 'German Shepherd', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 18),
(13, 'Boss', '1505982516.jpg', 'Bulldog', 2012, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 19),
(14, 'Riley', '1505982985.jpg', 'Labrador', 2017, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 20),
(15, 'Millie', '1505983293.jpg', 'West Highland Terrier', 2011, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', 21),
(16, 'Sugar', '1505984155.jpg', 'Golden Retriever', 2013, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 22),
(17, 'Sandy', '1505984465.jpg', 'Beagle X', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 23),
(18, 'Sal', '1505984769.jpg', 'Golden Retriever', 2010, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 24),
(19, 'Harry', '1505985170.jpg', 'Golden Retriever', 2014, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.', 25),
(20, 'Ollie', '1505986368.jpg', 'Labrador', 2009, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 26),
(21, 'Nori', '1505986062.jpg', 'Chow Chow cross', 2008, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 27),
(22, 'Rider', '281505987347.jpg', 'German Shepherd', 2010, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 28),
(23, 'Riku', '291505988183.jpg', 'Shiba Inu', 2013, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 29),
(24, 'Carlos', '301505988850.jpg', 'Doberman Pinscher', 2012, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 30),
(25, 'Bella', '311505989204.jpg', 'Beagle', 2014, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in..', 31),
(26, 'Toby', '311505989239.jpg', 'Beagle X', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', 31),
(27, 'Mia', '321505989663.jpg', 'Yorkshire Terrier', 2014, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 32),
(28, 'Alfie', '331505990860.jpg', 'Mixed', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 33),
(29, 'Molly', '341505991281.jpg', 'Pug', 2007, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', 34),
(30, 'Gypsy', '351505991544.jpg', 'Border Collie', 2011, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo.', 35),
(31, 'Benny', '361505991826.jpg', 'Corgi', 2016, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 36),
(32, 'Leo', '371505992200.jpg', 'Jack Russell', 2012, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 37),
(33, 'Diego', '381505992698.jpg', 'Labrador', 2012, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.', 38),
(34, 'Baxter', '391505992932.jpg', 'Jack Russell', 2008, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 39),
(35, 'Ringo', '401505993237.jpg', 'Border Collie', 2010, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 40),
(36, 'Archie', '411505993593.jpg', 'Jack Russell', 2009, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 41),
(37, 'Lucy', '421505993842.jpg', 'Beagle', 2010, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 42),
(38, 'Lou', '431505994274.jpg', 'Cavalier King Charles Spaniel', 2008, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 43),
(39, 'Nitro', '441505994778.jpg', 'Australian Cattle Dog', 2012, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 44),
(40, 'Max', '451506298219.jpg', 'Golden Retriever', 2013, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 45),
(41, 'Charlie', '461506300469.jpg', 'Dachshund', 2008, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehender.', 46),
(42, 'Lola', '471506301174.jpg', 'Husky', 2009, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 47),
(43, 'Duke', '481506305695.jpg', 'Bernese Mountain Dog', 2016, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.', 48),
(44, 'Sammy', '491506306290.jpg', 'Jack Russell', 2007, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 49),
(45, 'Jerry', '501506307436.jpg', 'Great Dane', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.', 50),
(46, 'Rosie', '511506316662.jpg', 'Dalmatian', 2017, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.', 51),
(47, 'Nana', '531506337434.jpg', 'Chihuahua  cross', 2009, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 53),
(48, 'BaoBei', '541506402683.jpg', 'Samoyed', 2017, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 54),
(49, 'Rex', '561506421176.jpg', 'Mastiff', 2014, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 56),
(50, 'Kiki', '571506423197.jpg', 'Yorkshire Terrier', 2009, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 57),
(51, 'Kobi', '581506423521.jpg', 'Shiba Inu', 2010, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 58),
(52, 'Jack', '591506423751.jpg', 'Toy Poodle', 2017, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 59),
(53, 'Leila', '601506424083.jpg', 'Chihuahua', 2008, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 60),
(54, 'Li', '611506424312.jpg', 'Yorkshire Terrier', 2012, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 61),
(55, 'Ernie', '621506425624.jpg', 'Airedale Terrier', 2013, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 62),
(56, 'Bert', '621506425661.jpg', 'Airedale Terrier', 2013, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 62),
(57, 'Mali', '631506426051.jpg', 'Staffordshire Bull Terrier', 2016, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 63),
(58, 'Bailey', '641506426424.jpg', 'Rough Collie', 2011, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 64),
(59, 'Sophie', '651506426739.jpg', 'Toy Poodle', 2013, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 65),
(60, 'Daisy', '661506427135.jpg', 'Jack Russell', 2006, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 66),
(61, 'Goldie', '671506427450.jpg', 'Golden Retriever', 2009, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 67),
(62, 'Lou', '681506430229.jpg', 'St Bernard', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 68),
(63, 'Koko', '691506430682.jpg', 'French Bulldog', 2010, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 69),
(64, 'Penny', '701506431044.jpg', 'Golden Retriever', 2012, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 70),
(65, 'Maru', '711506431458.jpg', 'Bull Terrier', 2012, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 71),
(66, 'Nala', '721506431956.jpg', 'Kelpie cross Border Collie', 2008, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 72),
(67, 'Ruby', '731506469714.jpg', 'Staffordshire Bull Terrier', 2017, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 73),
(68, 'Henry', '741506471375.jpg', 'French Bulldog', 2014, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 74),
(69, 'Jetta', '751506502759.jpg', 'German Shepherd cross Kelpie', 2016, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 75),
(70, 'Luxy', '761506503202.jpg', 'Golden Retriever', 2009, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 76),
(71, 'Abby', '771506511732.jpg', 'Cavalier King Charles Spaniel', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 77),
(72, 'Frank', '781506563640.jpg', 'Jack Russell', 2007, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 78),
(73, 'Karma', '791506563997.jpg', 'Goldendoodle', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 79),
(74, 'Brax', '801506564844.jpg', 'Mixed', 2009, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 80),
(75, 'Parker', '811506565085.jpg', 'Pug', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 81),
(76, 'Simon', '821506565470.jpg', 'French Bulldog', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 82),
(77, 'Bear', '831506664394.jpg', 'Pit Bull', 2010, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 83),
(78, 'Oscar', '841506664685.jpg', 'Welsh Terrier', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 84),
(79, 'Snowy', '851506664976.jpg', 'Goldendoodle', 2014, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 85),
(80, 'Kora', '861506665524.jpg', 'Pit Bull', 2014, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 86),
(81, 'Lila', '871506666503.jpg', 'Chihuahua', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 87),
(82, 'Trixie', '871506666531.jpg', 'Chihuahua', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 87),
(83, 'Kiya', '881506696281.jpg', 'German Shepherd', 2016, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 88),
(84, 'Buddy', '891506696609.jpg', 'Golden Retriever', 2017, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 89),
(85, 'Sasha', '901506697300.jpg', 'Golden Retriever', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 90),
(86, 'Luna', '911506697608.jpg', 'Golden Retriever', 2013, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 91),
(87, 'Tucker', '921506759897.jpg', 'Labrador', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 92),
(88, 'Maxie', '931506760109.jpg', 'Dachshund', 2016, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 93),
(89, 'Fitz', '941506760442.jpg', 'Kelpie', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 94),
(90, 'Tom', '951506760746.jpg', 'Goldendoodle', 2014, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 95),
(91, 'Jimmy', '961506761421.jpg', 'Great Dane', 2016, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 96),
(92, 'Reggie', '971506763412.jpg', 'Labradoodle', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 97),
(93, 'Clive', '981506763684.jpg', 'Jack Russell', 2010, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 98),
(94, 'Pepper', '991506765007.jpg', 'Pomeranian', 2011, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99),
(95, 'Indy', '1001506765288.jpg', 'Pomeranian', 2012, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100),
(96, 'Evie', '1011506776739.jpg', 'Husky', 2015, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 101),
(97, 'Murphy', '1021506776968.jpg', 'Labrador x Kelpie', 2011, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 102),
(98, 'Mika', '1031506777166.jpg', 'Beagle', 2016, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 103),
(99, 'Remmy', '1041506777506.jpg', 'Shiba Inu', 2015, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 104),
(100, 'Luca', '1051506777820.jpg', 'Weimaraner', 2014, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 105),
(101, 'Ella', '1051506777862.jpg', 'Weimaraner', 2016, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 105),
(102, 'Hugo', '1061506778154.jpg', 'Basset Hound', 2013, 'Male', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 106),
(103, 'Pebbles', '1081506778742.jpg', 'Yorkshire Terrier', 2013, 'Female', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 108);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 NOT NULL,
  `toUserID` int(10) UNSIGNED NOT NULL,
  `fromUserID` int(10) UNSIGNED NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `dateTime` date NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL,
  `conversationID` bigint(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `pamentID` bigint(20) UNSIGNED NOT NULL,
  `toUserID` int(10) UNSIGNED NOT NULL,
  `fromUserID` int(10) UNSIGNED NOT NULL,
  `amount` decimal(3,2) NOT NULL,
  `appointmentID` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profileID` int(10) UNSIGNED NOT NULL,
  `profileTitle` varchar(255) CHARACTER SET latin1 NOT NULL,
  `profileDescription` text CHARACTER SET latin1 NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL,
  `profileImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profileID`, `profileTitle`, `profileDescription`, `userID`, `profileImage`) VALUES
(17, 'Local dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15, NULL),
(18, 'Local dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15, NULL),
(19, 'Local dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 15, '191505812925.jpg'),
(20, 'Coorparoo dog lover', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 16, '201505889350.jpg'),
(21, 'Coorparoo dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 17, '1505975357.jpg'),
(22, 'Camp Hill dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 18, '1505982024.jpg'),
(23, 'Jogs for dogs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 19, '1505982412.jpg'),
(24, 'Good guy dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 20, '1505982828.jpg'),
(25, 'Northside dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 21, '1505983128.jpg'),
(26, 'Friendly dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non.', 22, '1505983925.jpg'),
(27, 'Inner city dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 23, '1505984298.jpg'),
(28, 'West End walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 24, '1505984634.jpg'),
(29, 'Local dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in.', 25, '1505985091.jpg'),
(30, 'Trusted dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 26, '1505985306.jpg'),
(31, 'Annerley walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 27, '1505985744.jpg'),
(32, 'Experienced dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 28, '281505987241.jpg'),
(33, 'East Brisbane dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 29, '291505988007.jpg'),
(34, 'Best dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 30, '301505988377.jpg'),
(35, 'Happy dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 31, '311505989082.jpg'),
(36, 'Reliable walking services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint.', 32, '321505989453.jpg'),
(37, 'Sticks and bones dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 33, '331505989853.jpg'),
(38, 'Furry friends dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit.', 34, '341505991177.jpg'),
(39, 'Reliable dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 35, '351505991426.jpg'),
(40, 'Happy dogs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.', 36, '361505991704.jpg'),
(41, 'Little dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 37, '371505992018.jpg'),
(42, 'Professional dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 38, '381505992608.jpg'),
(43, 'Responsible dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 39, '391505992870.jpg'),
(44, 'Inner city walks', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 40, '401505993121.jpg'),
(45, 'Affordable dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 41, '411505993487.jpg'),
(46, 'Number one dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 42, '421505993774.jpg'),
(47, 'Best bet dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 43, '431505994098.jpg'),
(48, 'Local lady does dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 44, '441505994616.jpg'),
(49, 'Wag walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 45, '451506298046.jpg'),
(50, 'Red Hill dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 46, '461506299753.jpg'),
(51, 'Walk n\\\' Wag', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 47, '471506300827.jpg'),
(52, 'Big dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in.', 48, '481506305568.jpg'),
(53, 'Toowong dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 49, '491506306168.jpg'),
(54, 'Your dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris..', 50, '501506307341.jpg'),
(55, 'River City dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 51, '511506316535.jpg'),
(56, 'Southside dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 52, NULL),
(57, 'Small dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in.', 53, '531506337309.jpg'),
(58, 'Waggy tails walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor.', 54, '541506402420.jpg'),
(59, 'Experienced dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 55, '551506403805.jpg'),
(60, 'Great walks for your best friend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 56, '561506405686.jpg'),
(61, 'Good boy dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 57, '571506423164.jpg'),
(62, 'Ashgrove and surrounds dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 58, '581506423466.jpg'),
(63, 'Wagz dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 59, '591506423702.jpg'),
(64, 'The dog lady', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 60, '601506424020.jpg'),
(65, 'South dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 61, '611506424271.jpg'),
(66, 'Around Robertson dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 62, '621506425370.jpg'),
(67, 'Fur pals dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 63, '631506425916.jpg'),
(68, 'Stafford dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 64, '641506426360.jpg'),
(69, 'Local guy dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 65, '651506426593.jpg'),
(70, 'Gordon Park dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 66, '661506426938.jpg'),
(71, 'Reliable retiree dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 67, '671506427315.jpg'),
(72, 'Afternoon dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 68, '681506430096.jpg'),
(73, 'Dedicated dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 69, '691506430592.jpg'),
(74, 'Auchenflower and surrounds dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 70, '701506430875.jpg'),
(75, 'Trusted dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 71, '711506431225.jpg'),
(76, 'Good dog - dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 72, '721506431635.jpg'),
(77, 'Moorooka and surrounds dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 73, '731506469570.jpg'),
(78, 'Experienced dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 74, '741506471331.jpg'),
(79, 'South Brisbane dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 75, '751506502235.jpg'),
(80, 'Dog lover', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 76, '761506503082.jpg'),
(81, 'Devoted dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 77, '771506511678.jpg'),
(82, 'Holland Park and surrounds dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 78, '781506563557.jpg'),
(83, 'Experienced and reliable dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 79, '791506563945.jpg'),
(84, 'Local area dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 80, '801506564801.jpg'),
(85, 'Northside local dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 81, '811506565045.jpg'),
(86, 'On time dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 82, '821506565420.jpg'),
(87, 'Responsible, caring dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 83, '831506664356.jpg'),
(88, 'Wishart and surrounds dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 84, '841506664577.jpg'),
(89, 'Ready, set, go dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 85, '851506664890.jpg'),
(90, 'Devoted to dogs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 86, '861506665490.jpg'),
(91, 'Your local dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 87, '871506666326.jpg'),
(92, 'Sunnybank area dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 88, '881506696219.jpg'),
(93, 'Local Sunnybank dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 89, '891506696515.jpg'),
(94, 'Paws dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 90, '901506696984.jpg'),
(95, 'Southern suburbs dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 91, '911506697516.jpg'),
(96, 'Number 1 dog walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 92, '921506759810.jpg'),
(97, 'Professional walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 93, '931506760057.jpg'),
(98, 'Riverside dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 94, '941506760404.jpg'),
(99, 'Local dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 95, '951506760714.jpg'),
(100, 'Weekday dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 96, '961506761376.jpg'),
(101, 'Western suburbs dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 97, '971506763350.jpg'),
(102, 'Local loving dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 98, '981506763609.jpg'),
(103, 'Friendly dog lover', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 99, '991506764931.jpg'),
(104, 'Weekend dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 100, '1001506765212.jpg'),
(105, 'Afternoon dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 101, '1011506776601.jpg'),
(106, 'Runcorn area dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 102, '1021506776905.jpg'),
(107, 'Pet pals dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 103, '1031506777114.jpg'),
(108, 'Your dogs second best friend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 104, '1041506777434.jpg'),
(109, 'Adore dogs walking service', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 105, '1051506777682.jpg'),
(110, 'Belmont area dog walking', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 106, '1061506778023.jpg'),
(111, 'East Brisbane dog walker', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 107, '1071506778404.jpg'),
(112, 'Dogs best friend', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 108, '1081506778708.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `priceID` int(10) UNSIGNED NOT NULL,
  `walk30` tinyint(3) NOT NULL,
  `walk60` tinyint(3) NOT NULL,
  `extraDog` tinyint(3) NOT NULL,
  `status` varchar(255) NOT NULL,
  `profileID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`priceID`, `walk30`, `walk60`, `extraDog`, `status`, `profileID`) VALUES
(4, 15, 20, 5, 'active', 21),
(6, 10, 15, 8, 'active', 20),
(7, 15, 20, 6, 'active', 22),
(8, 18, 25, 5, 'active', 23),
(9, 15, 25, 5, 'active', 24),
(10, 10, 15, 7, 'active', 25),
(11, 14, 20, 5, 'active', 26),
(12, 15, 18, 5, 'active', 27),
(13, 10, 15, 5, 'active', 28),
(14, 15, 25, 8, 'active', 29),
(15, 15, 20, 5, 'active', 30),
(16, 15, 25, 8, 'active', 31),
(17, 14, 18, 4, 'active', 32),
(18, 15, 20, 10, 'active', 33),
(19, 18, 24, 6, 'active', 34),
(20, 16, 18, 3, 'active', 35),
(21, 15, 18, 5, 'active', 36),
(22, 16, 22, 5, 'active', 37),
(23, 15, 25, 6, 'active', 38),
(24, 15, 20, 7, 'active', 39),
(25, 14, 18, 4, 'active', 40),
(26, 17, 22, 5, 'active', 41),
(27, 15, 20, 5, 'active', 42),
(28, 15, 18, 3, 'active', 43),
(29, 15, 20, 5, 'active', 44),
(30, 15, 20, 5, 'active', 46),
(31, 16, 20, 4, 'active', 47),
(32, 15, 20, 5, 'active', 48),
(33, 15, 20, 5, 'active', 49),
(34, 18, 23, 5, 'active', 50),
(35, 15, 18, 3, 'active', 52),
(36, 18, 22, 4, 'active', 53),
(37, 16, 20, 4, 'active', 54),
(38, 17, 23, 6, 'active', 55),
(39, 16, 20, 4, 'active', 60),
(40, 15, 22, 6, 'active', 61),
(41, 15, 21, 6, 'active', 62),
(42, 17, 22, 5, 'active', 63),
(43, 15, 20, 5, 'active', 64),
(44, 17, 22, 5, 'active', 65),
(45, 18, 23, 6, 'active', 66),
(46, 18, 24, 6, 'active', 67),
(47, 16, 20, 4, 'active', 68),
(48, 16, 22, 6, 'active', 69),
(49, 15, 20, 6, 'active', 70),
(50, 15, 20, 5, 'active', 71),
(51, 18, 25, 5, 'active', 72),
(52, 15, 20, 5, 'active', 73),
(53, 19, 26, 5, 'active', 74),
(54, 15, 5, 20, 'active', 75),
(55, 15, 20, 5, 'active', 76),
(56, 15, 20, 5, 'active', 77),
(57, 18, 24, 6, 'active', 78),
(58, 17, 22, 5, 'active', 79),
(59, 15, 20, 5, 'active', 80),
(60, 15, 20, 5, 'active', 81),
(61, 18, 24, 6, 'active', 82),
(62, 15, 20, 5, 'active', 83),
(63, 15, 20, 5, 'active', 84),
(64, 16, 22, 6, 'active', 85),
(65, 15, 20, 5, 'active', 86),
(66, 15, 20, 5, 'active', 87),
(67, 18, 24, 6, 'active', 88),
(68, 17, 22, 5, 'active', 89),
(69, 15, 20, 5, 'active', 91),
(70, 18, 24, 6, 'active', 92),
(71, 17, 22, 5, 'active', 93),
(72, 18, 24, 6, 'active', 94),
(73, 17, 22, 5, 'active', 95),
(74, 18, 24, 5, 'active', 96),
(75, 16, 22, 6, 'active', 97),
(76, 16, 22, 6, 'active', 98),
(77, 18, 24, 6, 'active', 99),
(78, 17, 23, 5, 'active', 100),
(79, 16, 22, 6, 'active', 101),
(80, 15, 20, 5, 'active', 102),
(81, 18, 24, 6, 'active', 103),
(82, 18, 24, 6, 'active', 104),
(83, 18, 24, 6, 'active', 105),
(84, 16, 22, 6, 'active', 106),
(85, 15, 20, 5, 'active', 107),
(86, 16, 22, 6, 'active', 108),
(87, 18, 24, 6, 'active', 109),
(88, 18, 24, 6, 'active', 110),
(89, 16, 22, 6, 'active', 111),
(90, 18, 24, 6, 'active', 112);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lastName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `suburb` varchar(255) CHARACTER SET latin1 NOT NULL,
  `postcode` int(11) NOT NULL,
  `state` varchar(255) CHARACTER SET latin1 NOT NULL,
  `userRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `phone`, `password`, `address`, `suburb`, `postcode`, `state`, `userRole`) VALUES
(15, 'Michael', 'Vincent', 'm.vincent@gmail.com', '0409023978', '$2y$10$/GW4H9tX2W9kRAEL7/r1/uc6xs3.3NKIKL7FaK9Yb9aOJK/lcGFGK', '12 Derby Street', 'Coorparoo', 4151, 'QLD', ''),
(16, 'Carol', 'Saunders', 'c.saunders@gmail.com', '0439376125', '$2y$10$cFU790uR2CpWUJupM6030eENc5vUmEoMFBfsdtNifG8ICMJMhyYR6', '51 Beresford Tce', 'Coorparoo', 4151, 'QLD', ''),
(17, 'Greg', 'Thompson', 'g.thompson@gmail.com', '0417915321', '$2y$10$3i91kL1/dziH52cf042VjOEIbcq6qOgUZ3t4fdFbdRmdZGjtNQ3QO', '13 Procyon Street', 'Coorparoo', 4151, 'QLD', ''),
(18, 'Jeff', 'Ashburn', 'j.ashburn@gmail.com', '0417621654', '$2y$10$K./b52mo96PTNRIy9kCxOOs1cOdRvC0VoCZnK3wqsi7wc56d2yfDK', '18 Lockyer Street', 'Camp Hill', 4152, 'QLD', ''),
(19, 'Joe', 'Clark', 'j.clark@gmail.com', '0418931687', '$2y$10$SU6ckULp4CiAMB80OtbUoO5trQOW9JkZsC98eWa9HoEhhfrYHVhc2', '54 Fleetway Street', 'Morningside', 4170, 'QLD', ''),
(20, 'Chris', 'Reynolds', 'c.reynolds@gmail.com', '0425325365', '$2y$10$zLBA6yrHDVANiPuoredVM.c6niZOSLhLgKipTJmhuoX7ao9kV7Pxu', '136 Victoria Street', 'Morningside', 4170, 'QLD', ''),
(21, 'James', 'Walker', 'j.walker@gmail.com', '0413753951', '$2y$10$a4oIZyUbVf.Pwhg0wDSKru44fL4QOyejvFjf6UuxKJ/kSUSqKeeq2', '86 Dorrigo Street', 'Kedron', 4031, 'QLD', ''),
(22, 'Erin', 'Jones', 'e.jones@gmail.com', '0416741852', '$2y$10$Z8Msa4u3yYCH/96PhL7iSubvfv2OMlXM59lSiTcWLPMSEA2uI0U6e', '2 Egan Street', 'Everton Park', 4053, 'QLD', ''),
(23, 'Audrey', 'Morris', 'a.morris@gmail.com', '0455216854', '$2y$10$lr5YECLCQ/Ep.Es0/cB8fOW70Ub4wlp9UlEeIZh2Dp.FKnbwi9SBm', '80 Beatrice Terrace', 'Ascot', 4007, 'QLD', ''),
(24, 'Emily', 'Davis', 'e.davis@gmail.com', '0419806904', '$2y$10$sB3JDjc1IJdxyGvDhOs.NOvaUP1WL5OWOy833oDtqEZhTsOwSLK/.', '47 Whynot Street', 'West End', 4101, 'QLD', ''),
(25, 'Andy', 'Davies', 'a.davies@gmail.com', '0411638679', '$2y$10$qy/pUT/hffksqG40mYhVjOBuXzbRwzEw6n2aYMQElHuSEJFddhhJe', '36 Violet Street', 'Yeronga', 4104, 'QLD', ''),
(26, 'Sarah', 'George', 's.george@gmail.com', '0423589263', '$2y$10$lg7BcKJ13RcNI.QJ9TeU9.LhWtW3WWyeLnPhycNE6IND25/Zx3Ekm', '70 Denman Street', 'Greenslopes', 4120, 'QLD', ''),
(27, 'James', 'Banks', 'j.banks@gmail.com', '0416665627', '$2y$10$/jGPHT8l1TDShfEPOGyMju1iLn8aEiL5W5W82GqQkitFUD3EzVRp.', '45 Rigby Street', 'Annerley', 4103, 'QLD', ''),
(28, 'Amanda', 'Farmer', 'a.farmer@gmail.com', '0444371379', '$2y$10$/Y0CwbwkMXcNtLDLwfc96e4/KSWinthlozGZtgNyT2ih9u8dxL/7C', '46 Rita Street', 'Holland Park', 4121, 'QLD', ''),
(29, 'Haruka', 'Kondo', 'h.kondo@gmail.com', '0418159645', '$2y$10$xyycrLAz8nneYM8omjS0LeC1jALlTS5dQWwn9kWmHhYc5fb3phY26', '14 Moreton Street', 'Norman Park', 4170, 'QLD', ''),
(30, 'Kathryn', 'Anderson', 'k.anderson@gmail.com', '0412680641', '$2y$10$klvfxV3al723mUEHOszz3en4ZvnXWsu2cOSgWqM01JQa8OBXMMg3a', '29 Copeland Street', 'Milton', 4064, 'QLD', ''),
(31, 'Anna', 'Smith', 'a.smith@gmail.com', '0421745856', '$2y$10$heM08op/dl.iXt5oSHCoa.ybmNbLQOhG7ycwXlsvn0BWkeZRBC56a', '20 Blackmore Street', 'Windsor', 4030, 'QLD', ''),
(32, 'Jenny', 'Richards', 'j.richards@gmail.com', '0426259874', '$2y$10$O9M26vvCg1KrUUnTGAzIP.zgbiw/Uz1uR99ruTT0/46BWeez9VmXK', '15 Oxford Street', 'Nundah', 4012, 'QLD', ''),
(33, 'Mel', 'Barnes', 'm.barnes@gmail.com', '0436346974', '$2y$10$sRIhIzffDrUiYKhO1flrvubyTr8G7pjh286WN2ISl8OZI32Ez8JG.', '74 Donnington Street', 'Carindale', 4152, 'QLD', ''),
(34, 'Christian', 'Jennings', 'c.jennings@gmail.com', '0433454621', '$2y$10$btir1da3XIXJI5C10tZ8Le7HpWvPzawklBNdfbtIA6qgbizBdUIRK', '78 Bracken Street', 'Moorooka', 4105, 'QLD', ''),
(35, 'Stacey', 'Morgan', 's.morgan@gmail.com', '0445292171', '$2y$10$ImERRTPT3eVkyfcZOjXd8.OBf6.RBw2rBcER8ZtaxmPafOCJLS2OC', '91 Brodie Street', 'Holland Park West', 4121, 'QLD', ''),
(36, 'Steph', 'Simmons', 's.simmons@gmail.com', '0426487598', '$2y$10$4MculgdFemxvkZ62iRs9H.sjzTqMuEB.xIrSVmVkvRthaYRe1Pauu', '98 Invermore Street', 'Mount Gravatt East', 4122, 'QLD', ''),
(37, 'Claire', 'Phillips', 'c.phillips@gmail.com', '0433378951', '$2y$10$7/4H4xu2aABA/L7/RCf/juzeEscNWzjRaohaPMqmG4rQ4jz5cIVWu', '43 Roy Street', 'Ashgrove', 4060, 'QLD', ''),
(38, 'Zach', 'Lucas', 'z.lucas@gmail.com', '0437163152', '$2y$10$xf6AkPW3OBWjCMwl/Mfde.AoflP9CqKo6YqI/ez/.4g4GJ1DQ2c6e', '43 Shaw Street', 'Auchenflower', 4066, 'QLD', ''),
(39, 'Jill', 'Foreman', 'j.foreman@gmail.com', '0441915735', '$2y$10$lWmWO8tZSNT5XHvEYzmO9OlnM71pvL4T9NAahwpNp76wyxERNUaUu', '109 Gray Road', 'West End', 4101, 'QLD', ''),
(40, 'David', 'Jones', 'd.jones@gmail.com', '0415974874', '$2y$10$oIrkFO5Afmv3LecdY4sQCuLg.rkkDZLb9XLoehruelq6NPzGYDKya', '16 Taylor Street', 'Woolloongabba', 4102, 'QLD', ''),
(41, 'Michelle', 'Cooper', 'm.cooper@gmail.com', '0415741852', '$2y$10$LCxRXGCQcgiqoZI150uLPuvkvJ5YVb5rsuPpL3hd2nCC4wmOu4eXG', '11 Dante Drive', 'Seven Hills', 4170, 'QLD', ''),
(42, 'Simone', 'Lockyer', 's.lockyer@gmail.com', '0417963654', '$2y$10$9lCfRuV3V1QeGW4fuaYJxOEmUnPrNdP6hsHwNyyxLHOrwcCq4Y5kS', '41 Abbott Street', 'New Farm', 4005, 'QLD', ''),
(43, 'Georgia', 'Pearson', 'g.pearson@gmail.com.au', '0428910635', '$2y$10$zBe7QeoP4mygPYXA8wxY2OKNb/29EBK0da2uS5RkhnpkVlr4GKP9y', '23 Thonrycroft Street', 'Tarragindi', 4121, 'QLD', ''),
(44, 'Paula', 'Herald', 'p.herald@gmail.com', '0411487569', '$2y$10$ECrcV5eQh1RpUyBwwU9JKuPsZQ6rByM/2i0LoB3RyMPa9zzkDy90y', '32 Dorothea Street', 'Cannon Hill', 4170, 'QLD', ''),
(45, 'Michelle', 'Young', 'm.young@gmail.com', '0412159375', '$2y$10$F6RqyTMzAAdv4VP9Us5e6eIbPuHpGPlRCoX49k3z/9KQMkhbNWnIe', '36 Beatrice Street', 'Hawthorne', 4171, 'QLD', ''),
(46, 'Josh', 'Williams', 'j.williams@gmail.com', '0418632854', '$2y$10$151PJqGdnPxXMNWE1O7YB.mMHuFZFZd8NFy4CZeorjZhTfDFffcve', '4 Gebbie Street', 'Red Hill', 4059, 'QLD', ''),
(47, 'Jo', 'Robinson', 'j.robinson@gmail.com', '0416458236', '$2y$10$WqPKhYzTns7JwKIuKy5kZeowhe0jrf2Z0D6Wq/7F03cUNZLpd2dDa', '59 Attewell Street', 'Nundah', 4012, 'QLD', ''),
(48, 'Anne', 'Roberts', 'a.roberts@gmail.com', '0419452563', '$2y$10$Ca.Pb3AGtfZe9Dzs4tkqJujUVcSHghB1kn8JrXvUPwdfQDnBXe9pi', '13 Morris Street', 'Albion', 4010, 'QLD', ''),
(49, 'Andrew', 'Cook', 'a.cook@gmail.com', '0414751953', '$2y$10$SsS9iX5p5G2Rxtg0g/IQye2vZP2Uhb431HV4b..3j5T/vvmUD34E6', '33 Bayliss Street', 'Toowong', 4066, 'QLD', ''),
(50, 'Gail', 'Gray', 'g.gray@gmail.com', '0408191456', '$2y$10$Z8.L41KYW4qiwzMFnx1c2u5SaTRsx1V5E6BFDG1JMfoSIH8/kKwS2', '4 Storkey Street', 'Windsor', 4030, 'QLD', ''),
(51, 'Alison', 'Cameron', 'a.cameron@gmail.com', '0405214658', '$2y$10$HGUOMxTErjQJSgdR3Dm55eDWb.H0xh8RahFSlk2Z3HWNhK6ZaVJNS', '64 Byron Street', 'Bulimba', 4171, 'QLD', ''),
(52, 'Casey', 'Turner', 'c.turner@gmail.com', '0425771221', '$2y$10$pK0eUglrKMzUQWKgzPdUIe6JKhBx1iPYPJM4bcksSMpTSx5Sz/aty', '41 Withington Street', 'East Brisbane', 4169, 'QLD', ''),
(53, 'Konomi', 'Fujikawa', 'k.fujikawa@gmail.com', '0404365698', '$2y$10$69EknxKhNy/tgx80w9rd9er6BZA6nfH1n/0p9dQTk.WqmglMGSQ.O', '295 Harcourt Street', 'Teneriffe', 4005, 'QLD', ''),
(54, 'Yang', 'Mi', 'y.mi@gmail.com', '0406179139', '$2y$10$tR0i01dwzgC4516ZN79.eejdDR3RNGRe2OnkEK17PlCQZrvoV91GW', '35 Jackson Street', 'Indooroopilly', 4068, 'QLD', ''),
(55, 'Melinda', 'Gardner', 'm.gardner@gmail.com', '0416946613', '$2y$10$Um5snJN290AzK48fZqmCI.zQVfTiIsbs/xlQUp8.H4sEGtMiF76pW', '113 Goburra Street', 'Rocklea', 4106, 'QLD', ''),
(56, 'Abi', 'Arnold', 'a.arnold@gmail.com', '0419984651', '$2y$10$zwnAYXJHrnBg5784Ampm7.npSCtlcssa0eDAzWoVlxr67rp/yFQyG', '32 Georgina Street', 'Salisbury', 4107, 'QLD', ''),
(57, 'Jess', 'Tucker', 'j.tucker@gmail.com', '0423728829', '$2y$10$8Bxgaiq0VPKQG6fPj44Ic.JoDyKvsaQNx8lfzlQRPTnI/1YPpoKTm', '30 Little Street', 'Red Hill', 4059, 'QLD', ''),
(58, 'Emma', 'Lewis', 'e.lewis@gmail.com', '0417325658', '$2y$10$2dLc9.jJKedvjHO455yX1.T21SA9.2K0IVOyOKTujIS63B5Cls8q6', '17 Devoy Street', 'Ashgrove', 4060, 'QLD', ''),
(59, 'Erica', 'Scott', 'e.scott@gmail.com', '0419364697', '$2y$10$Yjj.0m19wvW3V9FcCbmgteyTiWr8Dv5nL7zZhr60.74LZjZ/ktEge', '271 Richmond Road', 'Morningside', 4170, 'QLD', ''),
(60, 'Yukie', 'Nakama', 'y.nakama@gmail.com', '0411187956', '$2y$10$djZ1QTTbHeeSgHtcGbBlwuVkl/VjVUtlj4uM5eU3Kgk3KSOC81K7W', '15 Pavo Street', 'Camp Hill', 4152, 'QLD', ''),
(61, 'Lin', 'Chen', 'l.chen@gmail.com', '0418852654', '$2y$10$emz.Q4O2lFAcj5zphjvHn.G82zlvPa3qqP7cZrSyqfOiqykWLvmVC', '17 Bakewell Street', 'Mount Gravatt East', 4122, 'QLD', ''),
(62, 'Michael', 'Janz', 'm.janz@gmail.com', '0415185135', '$2y$10$ZsuGiRJibOmRhAGSDdiY4uifyDkbhVu42mUmba8j1ACiVVduzL7Ea', '65 Davrod Street', 'Robertson', 4109, 'QLD', ''),
(63, 'Eric', 'Geary', 'e.geary@gmail.com', '0413135874', '$2y$10$t0LQ8/TTRsNURnxBe80tcukxSwaje7WZs4xMQayXMP84zsTyR.PPi', '3 Jarrah Street', 'Keperra', 4054, 'QLD', ''),
(64, 'Jay', 'Nelson', 'j.nelson@gmail.com', '0406365987', '$2y$10$A/KT1V2K8VQFBwHifjmxc.B7UdlssZwltuczYacmZMIkf51XQB1pi', '49 Fogarty Street', 'Stafford', 4053, 'QLD', ''),
(65, 'George', 'Carter', 'g.carter@gmail.com', '0406482674', '$2y$10$ivJjO5rGtx6P0PsVqtyn.exK57KBYM/A9rr5tMiLaz3F4Q3/Od8Ea', '8 Gavan Street', 'Ashgrove', 4060, 'QLD', ''),
(66, 'James', 'Reed', 'j.reed@gmail.com', '0404188672', '$2y$10$jhoDhxUifZ9I4hNBoFbIne.FHxdy6soAzUnAB6W4uBjEteKA5GJ/6', '201 Thistle Street', 'Gordon Park', 4031, 'QLD', ''),
(67, 'Brian', 'Damman', 'b.damman@gmail.com', '0403723921', '$2y$10$5J29d77RJmKWGcY02s32o.zpH6n2LmKu772uYgjNN3CN1NIE7O1RC', '36 McConaghy Street', 'Mitchelton', 4053, 'QLD', ''),
(68, 'Tino', 'Di Battista', 't.debattista@gmail.com', '0404681641', '$2y$10$K/Kv9zAApeCf.gTm22lpHevrStWOmukaPwxOsABELOkyWBKEz0SwG', '8 Walter Street', 'Murarrie', 4172, 'QLD', ''),
(69, 'Robin', 'Padilla', 'r.padilla@gmail.com', '0401525848', '$2y$10$lxeViE8j0LxB4BhaMJ5NuuDUApG3CCzOQURHp7TNsKyWyR4aedliW', '103 Windermere Road', 'Hamilton', 4007, 'QLD', ''),
(70, 'Katrina', 'Murphy', 'k.murphy@gmail.com', '0412158470', '$2y$10$cDWqUgqCFD4/D8crfoE.6e35Wm5fyX/m/VTxxI3lnzMEmWYDHut4m', '21 Knowles Street', 'Auchenflower', 4066, 'QLD', ''),
(71, 'Lissa', 'Richardson', 'l.richardson@gmail.com', '0419284295', '$2y$10$vkJ39.aHyjfGpMvQL9TSkOOOyok.NvKhGkJyYXY7m2bNLJ5SZBQD.', '54 Anzac Road', 'Carina Heights', 4152, 'QLD', ''),
(72, 'Julia', 'Chapman', 'j.chapman@gmail.com', '0419745856', '$2y$10$mQqukDv6t1HRRjf9jzcoDeDt6bgSg4Zy9aI/ch//FlNDJbeL9HBq2', '21 Janzoon Street', 'Archerfield', 4108, 'QLD', ''),
(73, 'Kiara', 'Keats', 'k.keats@gmail.com', '0401915735', '$2y$10$iSUv/1RLFGxTaqxppp42fuGfJD00Vq6OUsgfJZWQmXhniXHVc8Gl2', '8 Derrick Street', 'Moorooka', 4105, 'QLD', ''),
(74, 'Jules', 'Hamilton', 'j.hamilton@gmail.com', '0401864531', '$2y$10$CNmzK1SZMlf.CWl64KoAjuOnlzbujVL1cY2gaWSsCZpA1YugSvw6m', '38 Bridle Street', 'Mansfield', 4122, 'QLD', ''),
(75, 'Elle', 'Taylor', 'e.taylor@gmail.com', '0405748526', '$2y$10$/RORkf.oPTBJeCxOkjmFReKspHJlWGKVGgTYr4IS90QxBIlr.H/Qu', '4 Norfolk Road', 'South Brisbane', 4101, 'QLD', ''),
(76, 'Gretta', 'Howard', 'g.howard@gmail.com', '0406076028', '$2y$10$PZU6uICy5lSQBrmcFM/lteGa9is2Z0rzhyJSkFd3lY6vtawhX1BCK', '66 Fifth Avenue', 'Wilston', 4051, 'QLD', ''),
(77, 'Jacqui', 'Harvey', 'j.harvey@gmail.com', '0407810664', '$2y$10$jKnd6Tik5v4UvORCCpnFI.qzJckuRx9UlJYr7GsFvIL6QG58S8euO', '45 Manson Road', 'Hendra', 4011, 'QLD', ''),
(78, 'Aaron', 'Peters', 'a.peters@gmail.com', '04080614758', '$2y$10$qy4ahkWR8mUgMClg5chDCupPnwVZtnskRSp84xOM/mC7knjSGEcwC', '6 Love Street', 'Holland Park', 4121, 'QLD', ''),
(79, 'Jack', 'Camden', 'j.camden@gmail.com', '0407610916', '$2y$10$u7AlAB0/K2kUAb9x5728ReMUuRvmLTP5PkwDZk8crLvIVhX9.hIYW', '47 Gresham Street', 'East Brisbane', 4169, 'QLD', ''),
(80, 'Jim', 'Davidson', 'j.davidson@gmail.com', '0407930546', '$2y$10$GRV8Bhtg5UVpoPVg8YLmtO5Z6qh3xiPyag5JOitNd5xWT558ROZka', '29 Imbros Street', 'Nundah', 4012, 'QLD', ''),
(81, 'Will', 'Evans', 'w.evans@gmail.com', '0401176945', '$2y$10$CE/RmO.xftRC4TAnmZP9T.xuP8W3oEiTD0IrKbQDXKVPn49B5vxrm', '180 Turner Road', 'Kedron', 4031, 'QLD', ''),
(82, 'Daniel', 'Kurtis', 'd.kurtis@gmail.com', '0403965854', '$2y$10$Yuvinf3a06fXwaLU.OKZe.PYR4JLVqepC4SqeMxv47R1Kqa4/u/mG', '27 Harold Street', 'Stafford', 4053, 'QLD', ''),
(83, 'Heather', 'Bell', 'h.bell@gmail.com', '0405810643', '$2y$10$Jegllifr1D9bkmGMf8Ozp.yM26rz9O32CRUyNA9RUyYeQ0Qpsl3/i', '30 Arid Street', 'Salisbury', 4107, 'QLD', ''),
(84, 'Mona', 'Woods', 'm.woods@gmail.com', '0403844652', '$2y$10$F0bOJPITCO5WKGlRZBSYw.I99yDPyyuCo30J1mOAozcZlMtrI2hYi', '57 Berkshire Crescent', 'Wishart', 4122, 'QLD', ''),
(85, 'Jasmine', 'Bennett', 'j.bennett@gmail.com', '0402964074', '$2y$10$wzoclARXljo7qJ8FIi01VuC.9dGIpz4Kg9/p3CJEnrNvx2NlV6iBe', '2 Kinkuna Street', 'Wishart', 4122, 'QLD', ''),
(86, 'Jenna', 'De Gracia', 'j.degracia@gmail.com', '0408911458', '$2y$10$UF6sXrYg0r1oZ1/SIZIF1enS5DOnLG4DMkM4AaRYnkQSEGq.ZU41C', '20 Amoria Street', 'Mansfield', 4122, 'QLD', ''),
(87, 'Kerry', 'Lister', 'k.lister@gmail.com', '0402261594', '$2y$10$rwZgKJow4On2hgqHPm9qbeOTjpme1LDTvGXyL9D2wnDpRGQHlJOnC', '16 Wilclarke Street', 'Upper Mount Gravatt', 4122, 'QLD', ''),
(88, 'Nathan', 'Shaw', 'n.shaw@gmail.com', '0402840096', '$2y$10$RW06fRPrgAwEMt43Gpdf4ujk3rEfdzX.H.TWYEEPQKCEAWRwIG86W', '44 Altandi Street', 'Sunnybank', 4109, 'QLD', ''),
(89, 'Vanessa', 'Parsons', 'v.parsons@gmail.com', '0409710554', '$2y$10$U.WTStdm529cYIUJ/tsKQuBDxU3AYfqNbOYKPUVvBaPPqPi2bklHq', '103 Dixon Street', 'Sunnybank', 4109, 'QLD', ''),
(90, 'Jessica', 'Palmer', 'j.palmer@gmail.com', '0409638245', '$2y$10$qswjZLNcBnJF/JZA2horPOohbOWG217ZpaRPnjtKVDDtyVaVZM306', '48 Chilton Street', 'Sunnybank Hills', 4109, 'QLD', ''),
(91, 'Nina', 'Mills', 'n.mills@gmail.com', '0405678363', '$2y$10$vUZgCaUNBJ12QV68J.bRIuCl9j3svnK2OseKaW7DaZCBaW05gyDSa', '19 Bonemill Road', 'Runcorn', 4113, 'QLD', ''),
(92, 'Victoria', 'Johnston', 'v.johnston@gmail.com', '0416810605', '$2y$10$4Y1sDzRrHFW/mf0wsrQ3SuaiyIkTjR12SGoJFFx1HGeizyfV7Uvqm', '41 Greenlaw Street', 'Indooroopilly', 4068, 'QLD', ''),
(93, 'Sara', 'Wilkinson', 's.wilkinson@gmail.com', '0408419764', '$2y$10$9ffcGKRLDuwtJW2AZI6nou37nFVjr72.Pfki5LzzoyHFyOQuEFfOa', '20 Drury Street', 'West End', 4101, 'QLD', ''),
(94, 'Ally', 'Carpenter', 'a.carpenter@gmail.com', '0404868945', '$2y$10$Ug1rHKHXqdIWc4ZmBgE6SedtUt49KNuxO.6yeL92XcRKEfiay9A4S', '35 Nadine Street', 'Graceville', 4075, 'QLD', ''),
(95, 'Caitlin', 'Elliott', 'c.elliott@gmail.com', '0409832648', '$2y$10$TNqfCw9WUBwdrE7NSJq5pe8faccpbBGTHGzLmg8BB/oEnlKyceb7C', '33 Dan Street', 'Graceville', 4075, 'QLD', ''),
(96, 'Andrea', 'Warner', 'a.warner@gmail.com', '0442364156', '$2y$10$03Gz6lYZfHlnECAWefqzI.bPxBdJN6SQwVxBZwNagExfcwM1Yi3K2', '42 Lynne Grove Avenue', 'Corinda', 4075, 'QLD', ''),
(97, 'Martin', 'Burton', 'm.burton@gmail.com', '04438100674', '$2y$10$29a/NXnpKpRLU/hrynkC0uJT8Rhvmxhc7DzjrFIAHbU8AgnyNdpti', '36 Venerable Street', 'Seventeen Mile Rocks', 4073, 'QLD', ''),
(98, 'Jade', 'Dawson', 'j.dawson@gmail.com', '0406810794', '$2y$10$KsCNUdw/rJtETtjmfqh7wuWo3YFqotRnwM/nJK2pf4nbcmkcIjdXK', '31 Calston Street', 'Oxley', 4075, 'QLD', ''),
(99, 'Madison', 'Fields', 'm.fields@gmail.com', '0403167941', '$2y$10$6zifNGPGI0XxEnd7OWcwnuUBctWGwc6/IkyN7mc8Fl7Ae2ukKLdYO', '9 Tyrone Place', 'Acacia Ridge', 4110, 'QLD', ''),
(100, 'Em', 'Edwards', 'e.edwards@gmail.com', '0402643146', '$2y$10$ol5alns9Hxp4ASxfV9SYPuYgGi7Q4w9v4XYu4O02eSPlAf9lqLrB6', '7 Commodore Street', 'Sunnybank Hills', 4109, 'QLD', ''),
(101, 'Steven', 'Owens', 's.owens@gmail.com', '0402538647', '$2y$10$Dv0vK7Ho5DtmTo4huHSRBOJBq3xNj/4JE2YDRgvmlpc0Oq/lQIAgC', '105 Bordeaux Street', 'Eight Mile Plains', 4113, 'QLD', ''),
(102, 'Chelsea', 'Howell', 'c.howell@gmail.com', '0401646265', '$2y$10$t12/CXPsAFscCXzXV.ED3edsZHQV.ncaaUlj5i3y/csuczIbFpBxy', '8 Pear Street', 'Runcorn', 4113, 'QLD', ''),
(103, 'Katie', 'Maxwell', 'k.maxwell@gmail.com', '0408573591', '$2y$10$VrvKpUPF0s6eI1Gh2y9.iuYodYNpRdKQ2SmzniKCKziKEQUlKDCOW', '64 Nardie Street', 'Eight Mile Plains', 4113, 'QLD', ''),
(104, 'Grace', 'Wheeler', 'g.wheeler@gmail.com', '0403637381', '$2y$10$FNs1U0gufvuqUJW1RxYkXeiXHyzBxwZlYls9xiWOLpsq4dDdqPNXS', '43 Stackpole Street', 'Wishart', 4122, 'QLD', ''),
(105, 'Ashlee', 'Grant', 'a.grant@gmail.com', '0403594628', '$2y$10$F..cgqsTXhs6WPSxklIVTek0Rq6h3Zq1t4lg7XiyhlQonmYliP4fO', '23 Braemar Place', 'Carindale', 4152, 'QLD', ''),
(106, 'Bridget', 'Burns', 'b.burns@gmail.com', '0441913921', '$2y$10$1RuCF4lcoXwt2w8DDRTOwOv80BIbGHalPdWL3HIUTUXL.VMwjCbuC', '5 Lycette Street', 'Belmont', 4153, 'QLD', ''),
(107, 'Taylor', 'Watts', 't.watts@gmail.com', '0442619108', '$2y$10$A7OT8dU5C6QTZqyzB0Wqi.Ydv84LL6RgirgbodzkiNnhrQ7AEXGwm', '18 Foley Road', 'Hemmant', 4174, 'QLD', ''),
(108, 'Richard', 'Hart', 'r.hart@gmail.com', '0443149901', '$2y$10$s.4JD.jWJyqh3Jw0EAs1EOw778KS/FllOru6rFHet3DC1BDYaK08S', '1 Evelyn Road', 'Wynnum West', 4178, 'QLD', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `bookings_ownerUserID` (`ownerUserID`),
  ADD KEY `bookings_walkerUserID` (`walkerUserID`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`conversationID`),
  ADD KEY `conversation_fromUserID` (`fromUserID`),
  ADD KEY `conversation_toUserID` (`toUserID`);

--
-- Indexes for table `dogs`
--
ALTER TABLE `dogs`
  ADD PRIMARY KEY (`dogID`),
  ADD KEY `dog_userID` (`userID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `message_toUserID` (`toUserID`),
  ADD KEY `message_fromUserID` (`fromUserID`),
  ADD KEY `message_conversationID` (`conversationID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`pamentID`),
  ADD KEY `payment_toUserID` (`toUserID`),
  ADD KEY `payment_fromUserID` (`fromUserID`),
  ADD KEY `payment_appointmentID` (`appointmentID`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profileID`),
  ADD KEY `profile_userID` (`userID`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`priceID`),
  ADD KEY `price_profileID` (`profileID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `conversationID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dogs`
--
ALTER TABLE `dogs`
  MODIFY `dogID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messageID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `pamentID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profileID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `priceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ownerUserID` FOREIGN KEY (`ownerUserID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `bookings_walkerUserID` FOREIGN KEY (`walkerUserID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `conversations`
--
ALTER TABLE `conversations`
  ADD CONSTRAINT `conversation_fromUserID` FOREIGN KEY (`fromUserID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `conversation_toUserID` FOREIGN KEY (`toUserID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `dogs`
--
ALTER TABLE `dogs`
  ADD CONSTRAINT `dog_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `message_conversationID` FOREIGN KEY (`conversationID`) REFERENCES `conversations` (`conversationID`),
  ADD CONSTRAINT `message_fromUserID` FOREIGN KEY (`fromUserID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `message_toUserID` FOREIGN KEY (`toUserID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payment_appointmentID` FOREIGN KEY (`appointmentID`) REFERENCES `bookings` (`bookingID`),
  ADD CONSTRAINT `payment_fromUserID` FOREIGN KEY (`fromUserID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `payment_toUserID` FOREIGN KEY (`toUserID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profile_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `price_profileID` FOREIGN KEY (`profileID`) REFERENCES `profiles` (`profileID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
