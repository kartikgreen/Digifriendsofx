-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2016 at 06:25 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digifriends`
--

-- --------------------------------------------------------

--
-- Table structure for table `digifriends`
--

CREATE TABLE `digifriends` (
  `did` int(11) NOT NULL COMMENT 'diginumberid',
  `uid` int(11) NOT NULL COMMENT 'foreign key of user table',
  `xvalue` int(11) NOT NULL,
  `digifriends_num` varchar(1000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `digifriends`
--

INSERT INTO `digifriends` (`did`, `uid`, `xvalue`, `digifriends_num`, `date`) VALUES
(1, 1, 16, '32,16,24,18,14,8,24,18,14,8,32,26,22,16', '2016-07-31'),
(2, 1, 17, '34,17,25,19,15,9,25,19,15,9,33,27,23,17', '2016-07-31'),
(3, 1, 18, '36,18,26,20,16,10,26,20,16,10,34,28,24,18', '2016-07-31'),
(4, 1, 2147483647, '4294967294,2147483647,2147483655,2147483649,2147483645,2147483639,2147483655,2147483649,2147483645,2147483639,2147483663,2147483657,2147483653,2147483647', '2016-07-31'),
(5, 1, 14, '28,14,22,16,12,6,22,16,12,6,30,24,20,14', '2016-07-31'),
(6, 1, 32, '64,32,40,34,30,24,40,34,30,24,48,42,38,32', '2016-08-01'),
(7, 1, 44, '88,44,52,46,42,36,52,46,42,36,60,54,50,44', '2016-08-01'),
(8, 1, 21, '42,21,29,23,19,13,29,23,19,13,37,31,27,21', '2016-08-01'),
(9, 1, 21, '42,21,29,23,19,13,29,23,19,13,37,31,27,21', '2016-08-01'),
(10, 1, 33, '66,33,41,35,31,25,41,35,31,25,49,43,39,33', '2016-08-01'),
(11, 1, 112, '224,112,120,114,110,104,120,114,110,104,128,122,118,112', '2016-08-01'),
(12, 1, 65, '130,65,73,67,63,57,73,67,63,57,81,75,71,65', '2016-08-01'),
(13, 1, 89, '178,89,97,91,87,81,97,91,87,81,105,99,95,89', '2016-08-01'),
(14, 1, 332, '664,332,340,334,330,324,340,334,330,324,348,342,338,332', '2016-08-01'),
(15, 1, 40, '80,40,48,42,38,32,48,42,38,32,56,50,46,40', '2016-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`) VALUES
(1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `digifriends`
--
ALTER TABLE `digifriends`
  ADD PRIMARY KEY (`did`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `digifriends`
--
ALTER TABLE `digifriends`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT COMMENT 'diginumberid', AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `digifriends`
--
ALTER TABLE `digifriends`
  ADD CONSTRAINT `udc` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
