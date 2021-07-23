-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2021 at 05:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `pass`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `department` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `department`, `email`, `designation`, `date`, `password`) VALUES
(20, 'adsfasf', '82442', 'Computer Systems Manager', 'adscdsa', 'Programmer Analyst', '2021-07-06', ''),
(1, 'nikhil', '61491249', 'IT Analyst', 'dasdsa', 'Trainee Engineer', '2021-07-05', ''),
(2, 'dsasad', '464624', 'IT Analyst', 'adsasd', 'Software Engineer', '2021-07-06', ''),
(0, 'Tejas Mane', '8788354130', 'IT Analyst', 'manetejas00@gmail.com', 'Trainee Engineer', '2021-07-23', ''),
(0, 'Tejas Mane', '0878835410', 'IT Analyst', 'manetejas0110@gmail.com', 'Trainee Engineer', '2021-07-23', ''),
(0, 'Tejas Mane', '087883541', 'IT Analyst', 'manetejas04110@gmail.com', 'Trainee Engineer', '2021-07-23', ''),
(0, 'nikhil', '1234567890', 'IT Analyst', 'excel@gmail.com', 'Trainee Engineer', '2021-07-23', ''),
(0, 'Tejas Mane', '0878835430', 'IT Coordinator', 'manetejas00000@gmail.com', 'Software Engineer', '2021-07-23', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
