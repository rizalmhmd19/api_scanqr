-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2020 at 03:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flutter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_books`
--

CREATE TABLE `tb_books` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_books`
--

INSERT INTO `tb_books` (`id`, `username`, `bookname`, `date`, `picture`) VALUES
(1, 'rizal', 'si rawing', '2020-01-03 03:51:10', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `imei`, `login_time`) VALUES
(84, '865607035212790', '2020-01-13 06:40:19'),
(85, '865607035212790', '2020-01-14 02:50:54'),
(86, '865607035212790', '2020-01-14 02:51:57'),
(87, '865607035212790', '2020-01-14 02:56:24'),
(88, '865607035212790', '2020-01-14 03:08:06'),
(89, '865607035212790', '2020-01-15 03:18:51'),
(90, '865607035212790', '2020-01-15 03:19:16'),
(91, '865607035212790', '2020-01-15 07:16:44'),
(92, '865607035212790', '2020-01-15 09:11:52'),
(93, '865607035212790', '2020-01-16 03:00:00'),
(94, '865607035212790', '2020-01-16 03:00:30'),
(95, '865607035212790', '2020-01-16 03:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_mn`
--

CREATE TABLE `tb_log_mn` (
  `id` int(11) NOT NULL,
  `imei` varchar(30) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_log_mn`
--

INSERT INTO `tb_log_mn` (`id`, `imei`, `menu`, `time`, `end_time`) VALUES
(1, '865607035212790', 'About', '2020-01-23 09:39:12', NULL),
(2, '865607035212790', 'About', '2020-01-23 09:41:05', '2020-01-23 09:41:14'),
(3, '865607035212790', 'About', '2020-01-23 09:41:31', '2020-01-23 09:41:38'),
(4, '865607035212790', 'About', '2020-01-23 09:44:32', '2020-01-23 09:44:35'),
(5, '865607035212790', 'About', '2020-01-23 09:47:22', '2020-01-23 09:47:47'),
(6, '865607035212790', 'About', '2020-01-23 09:52:25', '2020-01-23 09:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile`
--

CREATE TABLE `tb_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profile`
--

INSERT INTO `tb_profile` (`id`, `name`, `email`, `age`) VALUES
(1, 'Rizal', 'zanxzhui@gmail.com', 23);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','member') NOT NULL,
  `imei` varchar(50) NOT NULL,
  `otp` int(9) NOT NULL,
  `is_login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `email`, `password`, `level`, `imei`, `otp`, `is_login`) VALUES
(1, 'rizal', 'zanxzhui@gmail.com', '$2y$10$rqZeie608P0RYRLnqZlq3OUYogAHjfHwIhH0SuEJp8BazcDglSZtu', 'admin', '865607035212790', 92779, 0),
(2, 'mtqn', 'vatzymlbb@gmail.com', '$2y$10$rqZeie608P0RYRLnqZlq3OUYogAHjfHwIhH0SuEJp8BazcDglSZtu', 'member', '0', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_books`
--
ALTER TABLE `tb_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log_mn`
--
ALTER TABLE `tb_log_mn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profile`
--
ALTER TABLE `tb_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_books`
--
ALTER TABLE `tb_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `tb_log_mn`
--
ALTER TABLE `tb_log_mn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_profile`
--
ALTER TABLE `tb_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
