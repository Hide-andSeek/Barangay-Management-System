-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql5046.site4now.net
-- Generation Time: Feb 21, 2022 at 09:05 AM
-- Server version: 5.7.33-log
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a7d59c_combrgy`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersdb`
--

CREATE TABLE `usersdb` (
  `user_id` int(11) NOT NULL,
  `user_no` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailadd` varchar(200) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_mname` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `user_type` enum('Official','Employee','Admin') NOT NULL,
  `department` enum('BRGYOFFICIAL','ADMIN','BCPC','VAWC','LUPON','ACCOUNTING','BPSO','REQUESTDOCUMENT','COMPLAINT') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersdb`
--

INSERT INTO `usersdb` (`user_id`, `user_no`, `username`, `emailadd`, `user_lname`, `user_fname`, `user_mname`, `birthday`, `address`, `contact`, `user_type`, `department`, `status`, `added_on`) VALUES
(1121015, '$2y$10$9U2XPwUuNLFSsA3DGigrp.QWG9Qgdo.9iUtt1OUL6anDlE8iGJb7K', 'ELIONORE CAJUCOM', 'elionore.cajucom@gmail.com', 'Elionore', 'Cajucom', '', '2000-03-24', '#31 Barangay Commonwealth', '09159753258', 'Employee', 'VAWC', 'active', '2022-01-14 16:05:00'),
(1121016, '$2y$10$HIo8GPZgF8aY.Sz1W6ex4eUu0sIzOH/legWRNdt9wjLhncAVhurWK', 'JADE BANARES', 'jade,arinal,banares@gmail.com', 'Banares', 'Jade', 'A.', '2000-01-10', '#04 Barangay Commonwealth', '09125365475', 'Employee', 'REQUESTDOCUMENT', 'active', '2022-01-14 16:07:00'),
(1121017, '$2y$10$Imml9qAycTZSn3ojtys2Wu1NNR29e9srUtlo/Kl266sD/u7IMboM2', 'REGIE MINOZA', 'regie.minoza@gmail.com', 'Minoza', 'Regie', '', '1999-07-14', '#50 Barangay Commonwealth SA', '09142365789', 'Employee', 'LUPON', 'active', '2022-01-14 16:09:00'),
(1121018, '$2y$10$qOLPADGfbNHi7b.Q5Tj.S.f0qdkcEq5u46VJHo4TH/ZV.T52FXBZ.', 'JAYSON CUYONES', 'jayson.cuyones@gmail.com', 'Cuyones', 'Jayson', '', '1999-06-28', '#14 Barangay Commonwealth NA', '09852365142', 'Employee', 'ACCOUNTING', 'inactive', '2022-01-14 16:10:00'),
(1121019, '$2y$10$vmIrzj0O5Jq.817AM7VrmuH0MOcokZNkE/FFNvn3HIyOJB1p8IpHS', 'JOHN ERIC VERBO', 'johneric.verbo@gmail.com', 'Verbo', 'John Eric', '', '1999-12-01', '#30 Barangay Commonwealth High School', '09987242512', 'Employee', 'ACCOUNTING', 'active', '2022-01-11 16:12:00'),
(1121020, '$2y$10$G6mFrgBmthQUAc82Vn.88OUf4z2.ejrOa5tCQdikfCe1L1Ho3K3rS', 'FAITH GAHISAN', 'faith.gahisan@gmail.com', 'Gahisan', 'Faith', '', '2000-06-24', 'Barangay Commonwealth', '09357159852', 'Admin', 'ADMIN', 'active', '2022-01-24 18:05:00'),
(1121021, '$2y$10$iLyjLvZ.QbZ2ooOZBnJT1e2aWDPMbu9YyATxwvjnS3617e.MYctSW', 'MANUEL CO', 'manuel.co@gmail.com', 'Co', 'Manuel', 'A.', '1975-04-23', 'Barangay Commonwealth', '09147536852', 'Official', 'BRGYOFFICIAL', 'active', '2022-01-24 23:25:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersdb`
--
ALTER TABLE `usersdb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersdb`
--
ALTER TABLE `usersdb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1121022;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
