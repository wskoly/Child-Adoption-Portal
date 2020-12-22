-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 10:46 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `password`) VALUES
(1, 'wskoly', 'koly');

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL,
  `child_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`id`, `user_id`, `center_id`, `child_id`) VALUES
(1, 1, 1, 20),
(2, 2, 6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `username`, `password`) VALUES
(1, 'authority', 'a29seQ==');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `username`, `password`, `name`, `address`, `contact`, `email`, `area`, `lat`, `longitude`) VALUES
(1, 'kkoly', 'a29seTE=', 'Krishna Koly Adoption Center', 'Mohiran, Bagherpara , Jashore-7470', '01775204225', 'krishnakoly@gmail.com', 'Jashore', '23.974', '89.645'),
(4, 'abc', 'a29seQ==', 'ABC Adoption Center', '262/2, Chandina, Comilla-4500', '018777266', 'abc.ac@gmail.com', 'Cumilla', '23.485595', '91.001894'),
(5, 'hogwarts', 'a29seQ==', 'Hogwarts Orphanage and Adoption Center', '4 privet drive, Bagherpara, Jashore-7470', '01873207425', 'hog.adop@gmail.com', 'Jashore', '23.225972', '89.348374'),
(6, 'fictional', 'a29seQ==', 'Fictional World Adoption Center', '007, Mordor, South Gondor, Bagherpara, Jashore-7470', '01475207425', 'ffc.adop@gmail.com', 'Jashore', '23.255572', '89.294319');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `birth` date NOT NULL,
  `religion` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `image` longtext NOT NULL,
  `center_id` int(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `name`, `birth`, `religion`, `gender`, `image`, `center_id`, `status`, `time_stamp`) VALUES
(10, 'Harry Potter', '2010-07-31', 'Christian', 'male', '5e0ba89e5ebfbimages(3).jpg', 5, '', '2020-01-01 17:35:15'),
(11, 'Neville Longbottom', '2010-07-31', 'Christian', 'male', '5e0ba8e3d1b87images(5).jpg', 5, '', '2020-01-02 17:35:15'),
(12, 'Tom Marvolo Riddle', '2010-12-31', 'Christian', 'male', '5e0ba94982e51images(9).jpg', 5, '', '2020-01-03 17:35:15'),
(13, 'Edward Lupin', '2011-04-02', 'Christian', 'male', '5e0ba998d7af2images(10).jpg', 5, '', '2020-01-03 17:35:15'),
(14, 'Esther', '2012-12-02', 'Christian', 'female', '5e0baabad11efeshter.png', 6, '', '2020-01-01 17:35:15'),
(15, 'Kal-El', '2011-12-10', 'other', 'male', '5e0baaf4e46b9images(8).jpg', 6, '', '2020-01-02 17:35:15'),
(16, 'Bruce Wayne', '2012-12-09', 'Christian', 'male', '5e0bab12833d9images(6).jpg', 6, 'Adopted', '2020-01-25 20:14:35'),
(17, 'Anakin Skywalker', '2013-02-02', 'Christian', 'male', '5e0bab2e511bbimages(7).jpg', 6, '', '2020-01-04 17:35:15'),
(18, 'Parker Peter', '2016-12-02', 'Christian', 'male', '5e0bab4b0845fimages(11).jpg', 6, '', '2020-01-06 21:31:00'),
(20, 'Mehedi Shakeel', '2004-01-06', 'Islam', 'male', '5e13b576c7dbf1003785_460146187425851_1957517253_n.jpg', 1, 'Adopted', '2020-01-25 12:37:02'),
(22, 'Rafi Mizan', '2005-10-12', 'Islam', 'male', '5e14de4729f041530311_1627535250799773_1835209198253078882_n.jpg', 1, '', '2020-01-07 19:38:47'),
(23, 'Joy Dhar', '2008-05-10', 'Hindu', 'male', '5e14de6bc4e8010489619_339589079524772_3713942873893465350_n.jpg', 1, '', '2020-01-07 19:39:23'),
(24, 'Hany Raj', '2017-02-22', 'Islam', 'male', '5e14de90764ea1654924_1453949554835017_1231634422_o.jpg', 1, '', '2020-01-07 19:40:00'),
(25, 'Nishat', '2006-12-05', 'Islam', 'female', '5e14deabdc12e47576490_919679918231322_8802126729704374272_n.jpg', 1, '', '2020-01-07 19:40:27'),
(26, 'Shariar Hasan Utpol', '2009-12-22', 'Islam', 'male', '5e14dec2ee6541908474_763679500348335_5930574641986173226_n.jpg', 1, '', '2020-01-07 19:40:50'),
(27, 'Sarwar Ahmed Shuvo', '2009-11-11', 'Islam', 'male', '5e14dee2d020d277602_281389075303380_741125680_o.jpg', 1, '', '2020-01-07 19:41:51'),
(28, 'Sirajul Islam', '2006-05-12', 'Islam', 'male', '5e14df16c52f01622619_221477968044122_1761741476_n.jpg', 1, '', '2020-01-07 19:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `center_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`id`, `date`, `status`, `user_id`, `center_id`) VALUES
(15, '2020-01-16', 'approved', 1, 1),
(16, '2020-01-14', 'rejected', 1, 1),
(18, '2020-01-17', 'approved', 1, 5),
(19, '2020-01-17', 'rejected', 1, 1),
(20, '2020-01-21', 'rejected', 1, 1),
(21, '0000-00-00', 'pending', 1, 4),
(22, '2020-02-19', 'approved', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `msg` text NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `name`, `msg`, `admin_id`) VALUES
(1, 'pias1600@gmail.com', 'Tanmoy Sarker', 'Database create and connect according to the table diagram.\r\nAs we will be working with database and back-end from the next week, it is recommended that one of the group member brings a laptop to demonstrate the update.\r\nThank you.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `city` varchar(15) NOT NULL,
  `contact` varchar(14) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birth` date NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `city`, `contact`, `password`, `birth`, `address`) VALUES
(1, 'wskoly.bp@gmail.com', 'Wahid Sadique Koly', 'Jashore', '01775207425', 'a29seQ==', '2018-12-18', '152/8, Green road, Dhaka-1205'),
(2, 'shawonhasan320@yahoo.com', 'Abidul Hasan', 'comilla', '01775207425', 'a29seTE=', '2019-12-25', '152/8, Green road, Dhaka-1205'),
(3, 'wahidkoly@gmail.com', 'Wahid Koly', 'Dhaka', '01873207425', 'a29seQ==', '1996-12-10', '152/8, Green road, Dhaka-1205');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `center_id` (`center_id`),
  ADD KEY `child_id` (`child_id`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `center_id` (`center_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `consult`
--
ALTER TABLE `consult`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`),
  ADD CONSTRAINT `adoption_ibfk_3` FOREIGN KEY (`child_id`) REFERENCES `child` (`id`);

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`);

--
-- Constraints for table `consult`
--
ALTER TABLE `consult`
  ADD CONSTRAINT `consult_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `consult_ibfk_2` FOREIGN KEY (`center_id`) REFERENCES `centers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
