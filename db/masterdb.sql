-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 05:38 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityid` int(100) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `profileid` int(100) NOT NULL,
  `content` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL,
  `stucomplete` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `essay`
--

CREATE TABLE `essay` (
  `essayid` int(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `spellcheck` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profilefk` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `password`, `profilefk`) VALUES
('cal@gmail.com', '123456', 35),
('dallas123', '123456', 30),
('dwane@gmail.com', '123456', 32),
('el123', '123456', 28),
('john123', '123456', 23),
('jon123', '123456', 24),
('nam123', '123456', 26),
('rob123', '123456', 22),
('scooby123', '123456', 21),
('shallan@gmail.com', '123456', 34),
('sign123', '123456', 25),
('student1', '123456', 31),
('swati123', '123456', 29),
('syl@gmail.com', 'x0spzA5g', 36),
('vladmir123', '123456', 27),
('wheels@gmail.com', '123456', 33);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profileid` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileid`, `name`, `email`, `image`, `type`, `dob`) VALUES
(21, 'scooby', 'scooby@gmail.com', 'image', 'student', '2019-06-05'),
(22, 'rob', 'rob@gmail.com', 'image', 'student', '2019-06-11'),
(23, 'john', 'john@gmail.com', 'image', 'student', '2019-06-10'),
(24, 'jon', 'jon@gmail.com', 'image', 'student', '2019-06-01'),
(25, 'sign', 'sign@gmail.com', 'image', 'student', '2019-06-10'),
(26, 'nam', 'nam@gmail.com', 'image', 'student', '2019-06-10'),
(27, 'vishak', 'vishak@gmail.com', 'image', 'student', '1993-07-18'),
(28, 'elmasri', 'el@gmail.com', 'image', 'student', '1993-08-22'),
(29, 'thiru', 'swa.swati228@gmail.com', 'image', 'student', '1993-08-22'),
(30, 'dallas', 'dallas@gmail.com', 'image', 'student', '1993-08-22'),
(31, 'student1', 's1@gmail.com', 'image', 'student', '1993-08-22'),
(32, 'dwane', 'dwane@gmail.com', 'image', 'student', '0000-00-00'),
(33, 'wheels', 'wheels@gmail.com', 'image', 'student', '0000-00-00'),
(34, 'shallan', 'shallan@gmail.com', 'image', 'student', '0000-00-00'),
(35, 'caladdin', 'cal@gmail.com', 'image', 'student', '0000-00-00'),
(36, 'syl', 'syl@gmail.com', 'image', 'student', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityid`);

--
-- Indexes for table `essay`
--
ALTER TABLE `essay`
  ADD PRIMARY KEY (`essayid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`uname`),
  ADD KEY `profilefk` (`profilefk`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profileid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityid` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `essay`
--
ALTER TABLE `essay`
  MODIFY `essayid` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`profilefk`) REFERENCES `profile` (`profileid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
