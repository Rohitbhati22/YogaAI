-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 04:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yogaai`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(14) NOT NULL,
  `user_id` int(14) NOT NULL,
  `name` varchar(30) NOT NULL,
  `dic` varchar(240) NOT NULL,
  `price` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `user_id`, `name`, `dic`, `price`, `date`) VALUES
(1, 2, 'Yoga Se Hoga', 'Learn Yoga With US and Fir Hoga Se Sab Hoga', 0, '2022-03-11 23:31:56'),
(2, 1, 'Yoga Master', 'In This Class I Will Post Video OF Yoga Poses', 200, '2022-03-12 02:52:55'),
(3, 4, 'Yoga Learner', 'test', 20, '2022-03-12 14:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(14) NOT NULL,
  `post_id` int(14) NOT NULL,
  `user_id` int(14) NOT NULL,
  `data` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `post_id`, `user_id`, `data`, `date`) VALUES
(1, 2, 1, 'Nice Video', '2022-03-20 11:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `join_class`
--

CREATE TABLE `join_class` (
  `class_id` int(14) NOT NULL,
  `user_id` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `join_class`
--

INSERT INTO `join_class` (`class_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_`
--

CREATE TABLE `order_` (
  `order_id` int(14) NOT NULL,
  `user_id` int(14) NOT NULL,
  `pay_id` varchar(250) NOT NULL,
  `class_id` int(14) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(14) NOT NULL,
  `amount` int(14) NOT NULL,
  `user_id` int(14) NOT NULL,
  `paypal` varchar(250) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(14) NOT NULL,
  `cap` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `user_id` int(14) NOT NULL,
  `class_id` int(14) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `cap`, `url`, `type`, `user_id`, `class_id`, `date`) VALUES
(1, 'I Can Help You To Learn Yoga', '#', 'text', 1, 0, '2022-03-11 22:01:11'),
(2, 'New Video Of Yoga', 'DQew7AiwPWw', 'video', 1, 1, '2022-03-11 22:04:45'),
(5, 'ommmmm....', 'images/im4.webp', 'image', 1, 0, '2022-03-11 22:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(14) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(7) NOT NULL,
  `bio` varchar(250) NOT NULL,
  `proflie` varchar(250) NOT NULL,
  `user_status` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `username`, `email`, `password`, `type`, `bio`, `proflie`, `user_status`, `date`) VALUES
(1, 'Rahul', 'rahul', 'rahul@gamil.com', 'rahul', 'teacher', 'Hey I am Rahul', 'images/im4.webp', 'ok', '2022-03-11 17:06:40'),
(2, 'Rohit', 'rohit', 'Rohit@gmail.com', 'rohit', 'user', 'Hii I Am New Here...', 'https://api.earnprotector.com/adminhai/profile/sc_connect.png', 'ok', '2022-03-11 17:17:01'),
(3, 'Ashish', 'ashish', 'Ashish@gmail.com', 'ashish', 'user', 'Hii I Am New Here...', 'https://api.earnprotector.com/adminhai/profile/sc_connect.png', 'ok', '2022-03-12 11:16:17'),
(4, 'test', 'test', 'test@gmail.com', '12345678', 'teacher', 'Hii I Am New Here...', 'https://api.earnprotector.com/adminhai/profile/sc_connect.png', 'ok', '2022-03-12 14:23:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `order_`
--
ALTER TABLE `order_`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_`
--
ALTER TABLE `order_`
  MODIFY `order_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
