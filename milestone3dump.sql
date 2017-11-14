-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2017 at 09:52 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
 
 CREATE DATABASE slack;
 USE slack;
--
-- Database: `slack`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

DROP TABLE IF EXISTS `channel`;
CREATE TABLE IF NOT EXISTS `channel` (
  `channel_id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_name` varchar(50) NOT NULL,
  `channel_type` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`channel_id`, `channel_name`, `channel_type`, `created_by`, `created_time`) VALUES
(1, 'create', 'public', 20, '2017-10-31 17:10:31'),
(2, 'njdc', 'public', 20, '2017-10-31 17:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `direct_message`
--

DROP TABLE IF EXISTS `direct_message`;
CREATE TABLE IF NOT EXISTS `direct_message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message_desc` longtext NOT NULL,
  `create_on` datetime NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL,
  `reply_msg_id` int(11) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `ch_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `created_by`, `created_time`, `reply_msg_id`, `message`, `ch_id`) VALUES
(2, 3, '2017-11-10 20:35:00', 0, 'This is my first message of user 3', 1),
(6, 2, '2017-11-07 18:30:00', 2, 'hey there', 1),
(7, 3, '2017-11-07 18:30:00', 2, 'hiiii', 1),
(10, 4, '2017-11-11 18:30:00', 6, 'hello', 1),
(11, 4, '2017-11-11 18:30:00', 6, 'hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile_pic`
--

DROP TABLE IF EXISTS `profile_pic`;
CREATE TABLE IF NOT EXISTS `profile_pic` (
  `user_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `img_path` varchar(255) NOT NULL,
  PRIMARY KEY (`img_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_pic`
--

INSERT INTO `profile_pic` (`user_id`, `img_id`, `img_path`) VALUES
(1, 1, '51967684.jpg'),
(2, 6, 'Business-Timeline-Infographics.png');

-- --------------------------------------------------------

--
-- Table structure for table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE IF NOT EXISTS `reactions` (
  `reaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reaction` int(11) NOT NULL,
  PRIMARY KEY (`reaction_id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `message_id` (`message_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`reaction_id`, `user_id`, `message_id`, `reaction`) VALUES
(1, 3, 6, 0),
(2, 2, 3, 1),
(3, 4, 5, 0),
(4, 7, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL DEFAULT 'userfirstname',
  `last_name` varchar(50) NOT NULL DEFAULT 'userlastname',
  `phone_number` varchar(10) NOT NULL DEFAULT '1234567891',
  `status` varchar(255) NOT NULL DEFAULT 'available',
  `Admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `phone_number`, `status`, `Admin`) VALUES
(1, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'nandith.malapati@gmail.com', '', '', '', '', 1),
(2, 'Tow1', 'f2713f8c4763a103066d1dffd8193111', 'mater@rsprings.gov', 'Tow', 'Mater', '', '', 0),
(3, 'Sally', '4751b70fa5d1412cf62fcd418c80a76a', 'porsche@rsprings.gov', 'Sally', 'Carrera', '', '', 0),
(4, 'Doc', '350e1009f98c92239f7fd111919ee749', 'hornet@rsprings.gov', 'Doc', 'Hudson', '', '', 0),
(5, 'Finn', 'a8336e73bfa7ac1852de9f5de304b9e3', 'topsecret@agent.org', 'Finn', 'McMissile', '', '', 0),
(6, 'Lightning', 'aee1a720dc709f363b96356fa3ef2628', 'kachow@rusteze.com', 'Lightning', 'McQueen', '', '', 0),
(7, 'kavyajhs', '49a731d91ff33e8da6abf8698be6d1cd', 'kavya@kavya.com', 'kavya', 'kavya', '1234567891', 'kil', 0),
(8, 'kavya1', '49a731d91ff33e8da6abf8698be6d1cd', 'kavyashreesp@outlook.com', 'bshbdhq', 'bcssj', '1234567891', 'jik', 0),
(9, 'nfjn', '49a731d91ff33e8da6abf8698be6d1cd', 'kbc@hdh.com', 'shdvsa', 'vxzh', '1234567891', 'jik', 0),
(10, 'kavya23', '49a731d91ff33e8da6abf8698be6d1cd', 'kit@lit.com', 'kavya', 'kavya', '1234512345', 'kil', 0),
(11, 'xbcxzklh', '42f749ade7f9e195bf475f37a44cafcb', 'ksiri@kii.ihu', 'kjihsdh', 'jzczj', '1265416444', 'working', 0),
(12, 'polik123', 'bf0cc5a7e0225a477448f56505e60026', 'pol@pol.com', 'pol', 'pol', '1234568894', 'pol', 0),
(13, 'asdf123', '39bb37cf36d3b29a9280d8a70a0eed42', 'asdf@asdf.com', 'asdf', 'asdf', '1234567891', 'asdf', 0),
(14, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 0),
(15, 'XZBCJLJC', 'bf0cc5a7e0225a477448f56505e60026', 'asd@asd.com', 'gdhjah', 'bzxjclkj', '1234567895', 'zxcjn', 0),
(16, 'sdsjkdhfdf', 'bf0cc5a7e0225a477448f56505e60026', 'uij@uij.com', 'kijji', 'hujds', '1234564562', 'jik', 0),
(17, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '', '', 0),
(18, 'bvjxffowjki', 'd8d308fc2792240c2085bb15c8173ea9', '123@1213.com', 'asjdg', 'hdvjsh', '1234567898', 'jik', 0),
(19, 'byukjzx', 'bf0cc5a7e0225a477448f56505e60026', '123@2123.com', 'Kjikhzxj', 'bzhxcij', '1234565789', 'jik', 0),
(20, 'someone', 'bf0cc5a7e0225a477448f56505e60026', 'some@some.com', 'some', 'some', '1234567891', 'KIL', 0),
(21, 'trytry', '6a44baf2741d3267fff7f61defcde5e5', 'try@try.com', 'try', 'try', '1234567891', 'kol', 0),
(22, 'vxczvjhHC', '49a731d91ff33e8da6abf8698be6d1cd', 'ghu@ghu.com', 'xzhvchj', 'zxvchj', '1234567891', 'LOK', 0),
(23, 'hxsbjcuh', '49a731d91ff33e8da6abf8698be6d1cd', 'jikt@iky.com', 'kiju', 'hdchd', '1234567891', 'ncxbj', 0),
(24, 'mnxvdcbdsjk', '49a731d91ff33e8da6abf8698be6d1cd', 'hui@hui.com', 'sghdbkjh', 'bnxcvlkj', '1234567891', 'zsbdh', 0),
(25, 'hcvbxkjcnvm', '49a731d91ff33e8da6abf8698be6d1cd', 'dnfj@jdf.com', 'hshdkuah', 'hjgdvjksvjk', '1234567891', 'dhfbhsd', 0),
(26, 'bncvmcxv', '49a731d91ff33e8da6abf8698be6d1cd', 'jiko@jsnd.com', 'dbcsbsdbxncvn', 'bxvcnnvkm', '1234567891', 'hbchs', 0),
(27, 'cbxncjnd', '49a731d91ff33e8da6abf8698be6d1cd', 'uyt@uyt.com', 'ghsdgf', 'shbdhf', '1234567893', 'dcbh', 0),
(28, 'qvbxfcvk', '49a731d91ff33e8da6abf8698be6d1cd', 'vxn@hdc.com', 'jhbdfkj', 'bndxckvjn', '1234567891', 'dcbhj', 0),
(29, 'bxcnvnj', '49a731d91ff33e8da6abf8698be6d1cd', 'huj@huj.com', 'cxjvbkj', 'bnxc', '1234567891', 'zskjch', 0),
(30, 'oneone', 'bf0cc5a7e0225a477448f56505e60026', 'one@one.com', 'one', 'one', '1111111111', 'one', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_channel`
--

DROP TABLE IF EXISTS `user_channel`;
CREATE TABLE IF NOT EXISTS `user_channel` (
  `user_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  KEY `channel_fk` (`channel_id`),
  KEY `user_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_channel`
--

INSERT INTO `user_channel` (`user_id`, `channel_id`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

DROP TABLE IF EXISTS `workspace`;
CREATE TABLE IF NOT EXISTS `workspace` (
  `wid` int(10) NOT NULL AUTO_INCREMENT,
  `wname` varchar(60) NOT NULL,
  PRIMARY KEY (`wid`),
  UNIQUE KEY `wname` (`wname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workspace`
--

INSERT INTO `workspace` (`wid`, `wname`) VALUES
(1, 'oducs');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile_pic`
--
ALTER TABLE `profile_pic`
  ADD CONSTRAINT `user fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user_channel`
--
ALTER TABLE `user_channel`
  ADD CONSTRAINT `channel_fk` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`channel_id`),
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
