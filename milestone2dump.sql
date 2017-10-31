-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2017 at 07:10 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slack`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `channel_id` int(11) NOT NULL,
  `channel_name` varchar(50) NOT NULL,
  `channel_type` varchar(50) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`channel_id`, `channel_name`, `channel_type`, `created_by`, `created_time`, `user_id`) VALUES
(1, 'Random', 'Public', 1, '2017-10-12 06:15:12', 1),
(2, 'General', 'public', 1, '2017-10-12 06:15:12', 1),
(3, 'Sport', 'public', 1, '2017-10-28 19:58:00', 1),
(4, 'Sport', 'public', 1, '2017-10-28 20:00:08', 1),
(5, 'Sport', 'public', 1, '2017-10-28 20:03:23', 1),
(6, 'Sport', 'public', 1, '2017-10-28 20:03:37', 1),
(7, 'Gym', 'public', 1, '2017-10-29 00:30:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `direct_message`
--

CREATE TABLE `direct_message` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_time` timestamp NOT NULL,
  `message` varchar(1000) NOT NULL,
  `channel_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `created_by`, `created_time`, `message`, `channel_id`) VALUES
(3, 1, '2017-10-13 22:59:47', 'message', 1),
(4, 1, '2017-10-13 23:05:44', 'message', 1),
(8, 1, '2017-10-13 23:11:36', 'welcome user', 1),
(13, 1, '2017-10-13 23:15:54', 'hii', 1),
(14, 1, '2017-10-13 23:16:31', 'hii', 1),
(20, 1, '2017-10-14 01:11:37', 'hello', 2),
(21, 1, '2017-10-14 01:13:06', 'hello', 2),
(22, 1, '2017-10-14 01:13:22', 'hello', 2),
(23, 1, '2017-10-14 01:13:29', 'hello', 2),
(24, 1, '2017-10-14 01:15:39', 'hello', 2),
(25, 1, '2017-10-14 01:17:03', 'hello', 2),
(26, 1, '2017-10-14 01:19:10', 'hello', 2),
(27, 1, '2017-10-14 01:21:10', 'hello', 2),
(28, 1, '2017-10-14 01:46:06', 'hello', 2),
(29, 1, '2017-10-14 04:13:34', 'hello', 2),
(30, 1, '2017-10-14 04:14:59', 'hello', 2),
(31, 1, '2017-10-14 04:15:00', 'hello', 2),
(34, 1, '2017-10-15 02:27:35', 'type here', 1),
(37, 1, '2017-10-16 00:43:49', 'Hii pragathi', 1),
(38, 1, '2017-10-16 00:43:55', 'Hii pragathi', 1),
(39, 1, '2017-10-16 00:55:02', 'Hello All', 2),
(40, 1, '2017-10-16 00:55:05', 'Hello All', 2),
(41, 1, '2017-10-16 00:55:06', 'Hello All', 2),
(42, 1, '2017-10-16 00:57:35', 'Hello All', 2),
(43, 1, '2017-10-16 00:59:11', 'Hello All', 2),
(44, 1, '2017-10-16 00:59:53', 'Hello All', 2),
(45, 1, '2017-10-16 00:59:54', 'Hello All', 2),
(46, 1, '2017-10-16 01:00:51', 'Hello All', 2),
(47, 1, '2017-10-16 01:00:52', 'Hello All', 2),
(48, 1, '2017-10-16 01:00:52', 'Hello All', 2),
(49, 1, '2017-10-16 01:00:52', 'Hello All', 2),
(50, 1, '2017-10-16 01:02:57', 'Hello All', 2),
(51, 1, '2017-10-16 01:04:32', 'Hello All', 2),
(52, 1, '2017-10-16 01:05:16', 'Hello All', 2),
(53, 1, '2017-10-16 01:06:37', 'Hello All', 2),
(54, 1, '2017-10-16 01:07:43', 'Hello All', 2),
(55, 1, '2017-10-16 01:11:50', 'Hello All', 2),
(56, 2, '2017-10-16 01:14:58', 'Hii Im Mater', 2),
(57, 2, '2017-10-16 01:15:06', 'Hii Im Mater', 2),
(58, 2, '2017-10-16 02:16:40', 'Mater', 1),
(59, 2, '2017-10-16 02:16:45', 'Mater', 1),
(60, 2, '2017-10-16 06:22:54', 'This is crazy', 2),
(61, 2, '2017-10-16 06:23:03', 'This is crazy', 2),
(62, 2, '2017-10-16 06:23:58', 'Problem Solved', 1),
(63, 2, '2017-10-16 08:02:38', 'Hello Here', 1),
(64, 2, '2017-10-16 08:02:51', 'Hello here', 1),
(65, 1, '2017-10-16 21:40:33', 'This is awesome', 1),
(66, 1, '2017-10-16 23:24:26', 'Heloooooooo', 1),
(67, 1, '2017-10-16 23:24:37', 'Heloooooooo', 1),
(68, 1, '2017-10-16 23:26:23', 'Heloooooooo', 1),
(69, 1, '2017-10-16 23:26:28', 'Heloooooooo', 1),
(70, 1, '2017-10-16 23:26:32', 'Heloooooooo', 1),
(71, 1, '2017-10-16 23:27:06', 'Heloooooooo', 1),
(72, 1, '2017-10-16 23:27:13', 'Heloooooooo', 1),
(73, 1, '2017-10-16 23:29:55', 'Heloooooooo', 1),
(74, 1, '2017-10-16 23:31:06', 'Heloooooooo', 1),
(75, 1, '2017-10-16 23:33:45', 'Heloooooooo', 1),
(76, 1, '2017-10-16 23:33:51', 'Heloooooooo', 1),
(77, 1, '2017-10-16 23:35:00', 'Stud collab is awesome:)', 1),
(78, 1, '2017-10-16 23:35:09', 'Stud collab is awesome:)', 1),
(79, 1, '2017-10-16 23:36:19', 'Stud collab is awesome:)', 1),
(80, 1, '2017-10-16 23:36:23', 'Stud collab is awesome:)', 1),
(81, 1, '2017-10-17 00:50:30', 'heloooooooooo', 1),
(82, 1, '2017-10-17 00:50:33', 'heloooooooooo', 1),
(83, 1, '2017-10-17 00:50:40', 'heloooooooooo', 1),
(84, 1, '2017-10-17 00:50:52', 'heloooooooooo', 1),
(85, 1, '2017-10-17 00:53:03', 'heloooooooooo jhkjk', 1),
(86, 1, '2017-10-17 01:33:16', 'Hello All by mahesh', 1),
(87, 1, '2017-10-17 01:33:40', 'Hello  All by mahesh asdaszdsd', 1),
(88, 1, '2017-10-17 01:36:00', 'Hello nandith by mahesh', 1),
(89, 1, '2017-10-17 02:02:02', 'My name is nandith', 1),
(90, 1, '2017-10-17 02:18:11', '', 1),
(91, 1, '2017-10-17 02:18:49', 'anthony', 1),
(92, 1, '2017-10-17 03:30:42', 'abcd', 1),
(93, 1, '2017-10-17 03:33:51', 'hi', 1),
(94, 1, '2017-10-17 03:34:04', 'dfhdjh]', 1),
(95, 1, '2017-10-17 03:34:21', 'dhfsf', 2),
(96, 1, '2017-10-17 04:44:30', 'hello', 1),
(97, 1, '2017-10-17 05:07:42', 'hyu', 1),
(98, 1, '2017-10-17 05:11:49', 'hello there', 2),
(99, 1, '2017-10-17 05:51:59', 'heloooooooooo jhkjk', 1),
(100, 1, '2017-10-17 05:51:59', 'heloooooooooo jhkjk', 1),
(101, 1, '2017-10-17 07:45:00', '#$$%^&&**', 1),
(102, 1, '2017-10-17 07:45:19', '@#%&*((', 1),
(103, 1, '2017-10-24 19:08:24', '<!-- hello-->', 1),
(104, 1, '2017-10-24 19:08:44', '<!--   -->', 1),
(105, 1, '2017-10-24 19:09:47', 'hiii', 1),
(106, 1, '2017-10-24 19:11:02', '<!--        -->', 1),
(107, 1, '2017-10-29 01:37:39', 'This is awesome', 7),
(108, 1, '2017-10-30 05:24:43', '', 1),
(109, 1, '2017-10-30 05:24:47', '', 1),
(110, 1, '2017-10-30 05:24:52', '', 1),
(111, 1, '2017-10-30 05:25:45', '', 1),
(112, 1, '2017-10-30 05:25:46', '', 1),
(113, 1, '2017-10-30 05:25:54', '', 1),
(114, 1, '2017-10-30 05:29:59', '', 1),
(115, 1, '2017-10-30 05:32:23', '', 1),
(116, 1, '2017-10-30 05:32:42', '', 1),
(117, 1, '2017-10-30 05:33:14', 'Hi Mahesh', 7),
(118, 1, '2017-10-30 05:34:16', '', 7),
(119, 1, '2017-10-30 05:39:45', '', 7),
(120, 1, '2017-10-30 05:41:01', '', 7),
(121, 1, '2017-10-30 05:41:01', '', 7),
(122, 1, '2017-10-30 05:41:10', '', 1),
(123, 1, '2017-10-30 05:42:31', '', 7),
(124, 1, '2017-10-30 05:44:42', '', 7),
(125, 1, '2017-10-31 04:33:56', 'Hii  ppl', 1),
(126, 1, '2017-10-31 04:34:27', 'Hii  ppl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `threaded_message`
--

CREATE TABLE `threaded_message` (
  `t_id` int(11) NOT NULL,
  `to_message_id` int(11) NOT NULL,
  `msg_content` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threaded_message`
--

INSERT INTO `threaded_message` (`t_id`, `to_message_id`, `msg_content`, `created_by`, `created_at`) VALUES
(2, 3, 'ijhjk', 1, '2017-10-30 06:08:08'),
(3, 3, 'hbjh', 1, '2017-10-30 06:09:52'),
(48, 124, '', 1, '2017-10-30 22:51:08'),
(49, 124, '', 1, '2017-10-30 22:51:22'),
(50, 124, '', 1, '2017-10-30 22:52:13'),
(51, 107, 'ghijklmnop', 1, '2017-10-30 23:00:18'),
(52, 120, 'nandith got it', 1, '2017-10-30 23:01:53'),
(53, 117, 'Hello chandu', 1, '2017-10-30 23:05:04'),
(54, 117, 'asdasds', 1, '2017-10-31 00:13:55'),
(55, 107, 'hello macha', 1, '2017-10-31 02:08:07'),
(56, 107, 'please come', 1, '2017-10-31 02:10:15'),
(57, 107, 'hello', 1, '2017-10-31 04:01:59'),
(58, 107, 'hello how are you ', 1, '2017-10-31 04:05:58'),
(59, 124, 'i like varsha', 1, '2017-10-31 04:11:17'),
(60, 117, 'chandhu is not here ', 1, '2017-10-31 04:12:50'),
(61, 124, 'I like you too Nandith', 1, '2017-10-31 04:19:22'),
(62, 4, 'hii team', 1, '2017-10-31 04:34:54'),
(63, 107, 'what is this', 1, '2017-10-31 04:35:39'),
(64, 121, 'whats up', 1, '2017-10-31 04:37:26'),
(65, 98, 'How are you', 1, '2017-10-31 04:41:01'),
(66, 107, 'whats up', 1, '2017-10-31 05:11:17'),
(67, 3, 'hello team', 1, '2017-10-31 17:33:04'),
(68, 118, 'where are you', 1, '2017-10-31 18:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `profile_pic`, `phone_number`, `status`) VALUES
(1, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'nandith.malapati@gmail.com', 'Nandith', 'Reddy', 'infographic-template-with-useful-statistics_1126-110.jpeg', '', ''),
(2, 'Tow', 'f2713f8c4763a103066d1dffd8193111', 'mater@rsprings.gov', 'Tow', 'Mater', 'User_Avatar.png', '', ''),
(3, 'Sally', '4751b70fa5d1412cf62fcd418c80a76a', 'porsche@rsprings.gov', 'Sally', 'Carrera', '/images/User_Avatar.png', '', ''),
(4, 'Doc', '350e1009f98c92239f7fd111919ee749', 'hornet@rsprings.gov', 'Doc', 'Hudson', '/images/User_Avatar.png', '', ''),
(5, 'Finn', 'a8336e73bfa7ac1852de9f5de304b9e3', 'topsecret@agent.org', 'Finn', 'McMissile', '/images/User_Avatar.png', '', ''),
(6, 'Lightning', 'aee1a720dc709f363b96356fa3ef2628', 'kachow@rusteze.com', 'Lightning', 'McQueen', '/images/User_Avatar.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_reaction`
--

CREATE TABLE `user_reaction` (
  `userreactionid` int(11) NOT NULL,
  `reaction` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workspace`
--

CREATE TABLE `workspace` (
  `wid` int(10) NOT NULL,
  `wname` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`channel_id`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `direct_message`
--
ALTER TABLE `direct_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `channel_id` (`channel_id`);

--
-- Indexes for table `threaded_message`
--
ALTER TABLE `threaded_message`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `to_message_id` (`to_message_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `user_id_3` (`user_id`);

--
-- Indexes for table `user_reaction`
--
ALTER TABLE `user_reaction`
  ADD PRIMARY KEY (`userreactionid`);

--
-- Indexes for table `workspace`
--
ALTER TABLE `workspace`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `direct_message`
--
ALTER TABLE `direct_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `threaded_message`
--
ALTER TABLE `threaded_message`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_reaction`
--
ALTER TABLE `user_reaction`
  MODIFY `userreactionid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `workspace`
--
ALTER TABLE `workspace`
  MODIFY `wid` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `channel_id` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`channel_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `threaded_message`
--
ALTER TABLE `threaded_message`
  ADD CONSTRAINT `to_message_id` FOREIGN KEY (`to_message_id`) REFERENCES `message` (`message_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
