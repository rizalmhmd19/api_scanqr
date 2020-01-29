-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2020 at 09:03 AM
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
(107, '865607035212782', '2020-01-29 07:53:21'),
(108, '865607035212782', '2020-01-29 07:54:58'),
(109, '865607035212782', '2020-01-29 07:58:14');

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
(6, '865607035212790', 'About', '2020-01-23 09:52:25', '2020-01-23 09:52:31'),
(7, '865607035212782', 'Profile', '2020-01-29 07:24:52', NULL),
(8, '865607035212782', 'About', '2020-01-29 07:25:24', NULL);

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
(1, 'rizal', 'zanxzhui@gmail.com', '$2y$10$rqZeie608P0RYRLnqZlq3OUYogAHjfHwIhH0SuEJp8BazcDglSZtu', 'admin', '865607035212782', 0, 1);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tb_log_mn`
--
ALTER TABLE `tb_log_mn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;