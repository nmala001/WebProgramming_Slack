-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 06:40 AM
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2017 at 05:38 AM
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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
