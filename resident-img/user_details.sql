-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql5046.site4now.net
-- Generation Time: Feb 21, 2022 at 07:24 AM
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
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `user_type` enum('admin','user') CHARACTER SET utf8mb4 NOT NULL,
  `user_status` enum('active','inactive') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(1, 'jade.banares@gmail.com', '$2y$10$bEP/n8M11a7shEjc/S8QBeqt5REiZb2sfoUmt2OlNe1KQXD8n2uTm', 'Jade Banares', 'user', 'active'),
(2, 'elionore.cajucom@gmail.com', '$2y$10$RBeJ4UEiMve8yWrs6IeTFeSae5tBHyADeprxdlBUyQiIbvKW03Oq6', 'Elionore Cajucom', 'user', 'active'),
(3, 'jayson.cuyones@gmail.com', '$2y$10$k89FtzjJhz1VErs1mQM2C.tVdFwZbsMNZFz3LSz8M.Z9ily.CHx6q', 'Jayson Cuyones', 'user', 'active'),
(4, 'apolinario.mabini@gmail.com', '$2y$10$y5Btdt/rSEJNvbbENpmqoOG5hggGxAsyPpw3X4GKQO1VPCDpPEiJi', 'Apolinario Mabini', 'admin', 'active'),
(5, 'ivan.arinal@gmail.com', '$2y$10$/GMUzoCknTf16F5QVzP0vetkpSQBAxuRRKU742AKmLd1SL5U4n22G', 'Ivan Jade Banares', 'admin', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
