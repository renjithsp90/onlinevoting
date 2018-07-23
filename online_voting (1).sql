-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 06:59 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_voting`
--
CREATE DATABASE IF NOT EXISTS `online_voting` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_voting`;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `candidate_id` int(10) NOT NULL AUTO_INCREMENT,
  `poll_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`candidate_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`candidate_id`, `poll_id`, `position_id`, `user_id`) VALUES
(12, 1, 3, 34),
(11, 1, 3, 33),
(13, 1, 5, 35);

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE IF NOT EXISTS `organisation` (
  `admin_id` int(10) NOT NULL,
  `org_name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `org_name` (`org_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`admin_id`, `org_name`, `description`, `logo`) VALUES
(9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poll_data`
--

CREATE TABLE IF NOT EXISTS `poll_data` (
  `poll_data_id` int(10) NOT NULL AUTO_INCREMENT,
  `poll_id` int(10) NOT NULL,
  `position_id` int(10) NOT NULL,
  `candidate_id` int(10) NOT NULL,
  `voter_id` int(4) NOT NULL,
  PRIMARY KEY (`poll_data_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `poll_data`
--

INSERT INTO `poll_data` (`poll_data_id`, `poll_id`, `position_id`, `candidate_id`, `voter_id`) VALUES
(1, 1, 3, 11, 32);

-- --------------------------------------------------------

--
-- Table structure for table `poll_details`
--

CREATE TABLE IF NOT EXISTS `poll_details` (
  `poll_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) NOT NULL,
  `poll_head` varchar(100) NOT NULL,
  `poll_description` varchar(1000) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `poll_details`
--

INSERT INTO `poll_details` (`poll_id`, `admin_id`, `poll_head`, `poll_description`, `start_date`, `end_date`) VALUES
(1, 9, 'College Election', 'qwer fd sa afgg safasf asf', '2018-01-07 10:00:00', '2018-10-07 11:00:00'),
(2, 9, 'Mid Election', 'fqwwqf', '2019-07-21 01:00:00', '2018-07-19 01:00:00'),
(3, 9, 'Final Election', 'wqfwq', '2018-07-07 01:00:00', '2018-07-13 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `position_id` int(10) NOT NULL AUTO_INCREMENT,
  `poll_id` int(10) NOT NULL,
  `position_name` varchar(100) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `poll_id`, `position_name`) VALUES
(4, 2, 'Pos 1'),
(3, 1, 'PPP1 '),
(5, 1, 'fewfwe'),
(6, 1, 'rnrtns'),
(7, 3, 'dscsd'),
(8, 1, 'ddsa'),
(9, 2, 'hrhths'),
(10, 2, 'hertht'),
(12, 2, 'Position 4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `m_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`user_id`,`f_name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `m_name`, `l_name`, `email`, `gender`, `dob`) VALUES
(9, 'Renjith', 'S', 'P', 'renjithsp90@gmail.com', 'Male', '1990-12-06'),
(31, 'dev', 'avw', 'qvwq', 'qvwqv@gmail.com', 'Female', '2018-07-14'),
(35, 'tuy', 'trur', 'yudy', 'dudyu@gmail.com', 'Male', '2018-07-14'),
(33, 'Varun', 'fwefq', 'Sankar', 'ssdd@gmail.com', 'Male', '2018-07-14'),
(34, '46ww6hw', '4wh', 'hw45', 'hw45@gmail.com', 'Male', '2018-07-14');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `login_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role_id` varchar(20) NOT NULL,
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`login_id`, `user_id`, `username`, `password`, `user_role_id`) VALUES
(4, 9, 'renjithsp90@gmail.com', 'qwerty123', 'admin'),
(11, 35, 'dudyu@gmail.com', 'password', 'candidate'),
(7, 31, 'qvwqv@gmail.com', 'password', 'voter'),
(9, 33, 'ssdd@gmail.com', 'password', 'candidate'),
(10, 34, 'hw45@gmail.com', 'password', 'voter');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE IF NOT EXISTS `voters` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `poll_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `poll_id`, `user_id`) VALUES
(1, 1, 31),
(2, 1, 32),
(3, 2, 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
