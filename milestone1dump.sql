-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 06:58 AM
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
(2, 'General', 'public', 1, '2017-10-12 06:15:12', 1);

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
(100, 1, '2017-10-17 05:51:59', 'heloooooooooo jhkjk', 1);

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
(1, 'Admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'nandith.malapati@gmail.com', '', '', '', '', ''),
(2, 'Tow', 'f2713f8c4763a103066d1dffd8193111', 'mater@rsprings.gov', 'Tow', 'Mater', '', '', ''),
(3, 'Sally', '4751b70fa5d1412cf62fcd418c80a76a', 'porsche@rsprings.gov', 'Sally', 'Carrera', '', '', ''),
(4, 'Doc', '350e1009f98c92239f7fd111919ee749', 'hornet@rsprings.gov', 'Doc', 'Hudson', '', '', ''),
(5, 'Finn', 'a8336e73bfa7ac1852de9f5de304b9e3', 'topsecret@agent.org', 'Finn', 'McMissile', '', '', ''),
(6, 'Lightning', 'aee1a720dc709f363b96356fa3ef2628', 'kachow@rusteze.com', 'Lightning', 'McQueen', '', '', '');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `direct_message`
--
ALTER TABLE `direct_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `channel_id` FOREIGN KEY (`channel_id`) REFERENCES `channel` (`channel_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`created_by`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
