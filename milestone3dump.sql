-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2017 at 08:37 AM
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
CREATE DATABASE SLACK;
USE SLACK;
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
  `channel_name` varchar(255) NOT NULL,
  `channel_type` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `archive` int(11) NOT NULL,
  PRIMARY KEY (`channel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`channel_id`, `channel_name`, `channel_type`, `created_by`, `created_time`, `archive`) VALUES
(1, 'create', 'public', 20, '2017-10-31 17:10:31', 0),
(2, 'njdc', 'public', 20, '2017-10-31 17:11:09', 0),
(3, 'I am Legend', 'public', 2, '2017-11-19 04:49:11', 0),
(6, 'Images', 'public', 2, '2017-11-19 23:50:09', 0),
(7, 'Private Channel', 'private', 2, '2017-11-19 23:50:47', 0),
(8, 'Public Channel', 'public', 2, '2017-11-20 00:02:30', 0),
(9, 'Private Channel', 'private', 2, '2017-11-20 00:03:13', 0),
(10, 'Tow Mater\'s Tall Tales!?', 'private', 2, '2017-11-20 03:18:56', 1);

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
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply_msg_id` int(11) NOT NULL,
  `message` longtext CHARACTER SET latin1 NOT NULL,
  `ch_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_520_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `created_by`, `created_time`, `reply_msg_id`, `message`, `ch_id`) VALUES
(31, 2, '2017-11-19 06:42:15', 0, '&lt;p&gt;I am Tow&lt;/p&gt;', 1),
(32, 2, '2017-11-19 06:42:46', 31, '&lt;p&gt;Hello Tow&lt;/p&gt;', 1),
(33, 2, '2017-11-19 06:44:37', 31, '&lt;p&gt;welcome to my world&lt;/p&gt;', 1),
(34, 2, '2017-11-19 06:46:26', 0, '&lt;p&gt;Tow Again&lt;/p&gt;', 1),
(35, 2, '2017-11-19 15:48:53', 0, '&lt;p&gt;SImple thread testing&lt;/p&gt;', 1),
(36, 3, '2017-11-19 15:48:53', 0, '&lt;p&gt;Sally thread testing&lt;/p&gt;', 1),
(38, 2, '2017-11-19 16:21:50', 31, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non n', 1),
(39, 2, '2017-11-19 16:22:01', 31, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non n', 1),
(40, 2, '2017-11-19 16:24:16', 0, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&lt;/pre&gt;', 1),
(41, 2, '2017-11-19 16:24:53', 35, '&lt;pre style=&quot;word-wrap: break-word; white-space: pre-wrap;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&lt;/pre&gt;', 1),
(42, 2, '2017-11-19 16:26:26', 0, '', 1),
(43, 2, '2017-11-19 16:31:32', 35, '&lt;p&gt;Heyy&lt;/p&gt;', 1),
(44, 2, '2017-11-19 16:37:43', 42, '&lt;p&gt;Hello&lt;/p&gt;', 1),
(51, 2, '2017-11-19 17:32:02', 0, '&lt;p&gt;This is new channel&lt;/p&gt;', 2),
(52, 2, '2017-11-19 17:38:09', 0, '&lt;p&gt;This is a new private channel&lt;/p&gt;', 4),
(53, 2, '2017-11-19 18:00:03', 0, '&lt;p&gt;Hii re&lt;/p&gt;', 4),
(54, 2, '2017-11-19 18:00:07', 0, '&lt;p&gt;Hii re&lt;/p&gt;', 4),
(56, 2, '2017-11-19 20:56:20', 0, '&lt;p&gt;Hello Tow How is this image ?&lt;/p&gt;\n&lt;p&gt;&lt;img src=&quot;uploads/5a11efdaebed5_post.jpg&quot; /&gt;&lt;/p&gt;\n&lt;p&gt;Light house btw&lt;/p&gt;', 1),
(57, 2, '2017-11-19 22:37:27', 0, '&lt;p&gt;Hello World&lt;/p&gt;', 1),
(58, 2, '2017-11-19 22:38:15', 57, '&lt;p&gt;Hey There&lt;/p&gt;', 1),
(59, 2, '2017-11-19 22:38:40', 0, '&lt;p&gt;Hello everyone&lt;/p&gt;', 4),
(60, 2, '2017-11-19 23:48:44', 0, '&lt;p&gt;Hello All&lt;/p&gt;', 3),
(61, 2, '2017-11-19 23:50:18', 0, '&lt;p&gt;Hii there&lt;/p&gt;', 6),
(62, 2, '2017-11-19 23:51:23', 0, '&lt;p&gt;This is my private channel&lt;/p&gt;', 7),
(63, 2, '2017-11-20 00:02:47', 0, '&lt;p&gt;My public channel&lt;/p&gt;', 8),
(64, 2, '2017-11-20 00:03:34', 0, '&lt;p&gt;Heyy&lt;/p&gt;', 9),
(65, 2, '2017-11-20 01:48:27', 0, '&lt;p&gt;Testing desc order message&lt;/p&gt;', 2),
(66, 2, '2017-11-20 01:49:25', 0, '&lt;p&gt;This is my last msg to ordering&lt;/p&gt;', 2),
(67, 2, '2017-11-20 02:05:44', 0, '&lt;pre&gt;I\'m happier than a tornado in a trailer park! &lt;/pre&gt;', 10),
(68, 2, '2017-11-20 02:06:14', 0, '&lt;p&gt;Hello&lt;/p&gt;', 10),
(69, 2, '2017-11-20 02:21:48', 0, '&lt;p&gt;This is my msg on top&lt;/p&gt;', 8),
(70, 2, '2017-11-20 05:05:11', 0, '<p>&lt;?php echo \"Nehh !!\" ?&gt;</p>', 1),
(76, 2, '2017-11-20 05:08:23', 0, '&lt;p&gt;', 6),
(77, 2, '2017-11-20 05:10:18', 0, '&lt;p&gt;', 6),
(78, 2, '2017-11-20 05:10:42', 0, '&lt;p&gt;', 6),
(80, 2, '2017-11-20 05:14:17', 0, '&lt;p&gt;', 2),
(81, 2, '2017-11-20 05:17:26', 0, '&lt;p&gt;', 2),
(82, 2, '2017-11-20 05:20:48', 0, '&lt;p&gt;&amp;lt;?php echo &quot;&quot;?&amp;gt;&lt;/p&gt;', 3),
(83, 2, '2017-11-20 05:22:28', 0, '&lt;p&gt;&amp;lt;?php ?&amp;gt;&lt;/p&gt;', 3);

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
(2, 6, 'User-icon.png');

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
  UNIQUE KEY `user_id` (`user_id`,`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reactions`
--

INSERT INTO `reactions` (`reaction_id`, `user_id`, `message_id`, `reaction`) VALUES
(1, 3, 6, 0),
(7, 2, 2, 1),
(4, 7, 6, 1),
(6, 1, 2, 1),
(8, 1, 70, 1),
(9, 2, 81, 0),
(10, 2, 80, 0),
(11, 2, 62, 0);

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
  UNIQUE KEY `user_id` (`user_id`,`channel_id`),
  KEY `channel_fk` (`channel_id`),
  KEY `user_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_channel`
--

INSERT INTO `user_channel` (`user_id`, `channel_id`) VALUES
(2, 1),
(1, 2),
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
