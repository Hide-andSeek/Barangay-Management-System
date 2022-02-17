-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql5046.site4now.net
-- Generation Time: Feb 16, 2022 at 12:19 AM
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
-- Table structure for table `accreg_resident`
--

CREATE TABLE `accreg_resident` (
  `resident_id` int(11) NOT NULL,
  `uname` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `policy` enum('Yes') NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accreg_resident`
--

INSERT INTO `accreg_resident` (`resident_id`, `uname`, `email`, `password`, `policy`, `verification_code`, `is_verified`) VALUES
(210075, 'Jade Banares', 'jade.arinal.banares@gmail.com', '$2y$10$yjEvL1QApKVtGGwBtRWMeeXie.vq1Jy58GrdeS4XUEZonR1Oe2DWu', 'Yes', '', 0),
(210076, 'Elionore Cajucom', 'elionore.cajucom@gmail.com', '$2y$10$WkoHku9fsc.5kAsnREUyhefeis8GiwVAUEUpG2CaZA9Dj/7aCLznK', 'Yes', '', 0),
(210077, 'Jayson Cuyones', 'jayson.cuyones@gmail.com', '$2y$10$DqVLA0S5xprZ/4BzfOeGpeHNZX.q7gfwFRXqB5mpLONIrGflUWy3i', 'Yes', '', 0),
(210078, 'Khalid Dimnang', 'khalid.dimnang@gmail.com', '$2y$10$ifR.FiHG7EW/JTKlvoBNW.k7bO9wQXF5nnNZYJpAbMDSqVhknOb0a', 'Yes', '', 0),
(210079, 'John Eric', 'johneric.verbo@gmail.com', '$2y$10$apyMvkt6.kvbqcTAnhfv4OLjOzp4e3lAWo59WHGO2RnYwW6bsr5Q2', 'Yes', '', 0),
(210080, 'John Mark', 'johnmark.salinas@gmail.com', '$2y$10$6ef9Vz11snfHHvlEpoW2qOK8WD4Sr9YlRnNQk4K.uzDzo1dVrkqzm', 'Yes', '', 0),
(210081, 'Jose Rizal', 'jose.rizal@gmail.com', '$2y$10$tO.r0lWC1HkqmKaZAlBG.ucKYdDKK.j.svEv.BcsdS/sqxGIIjO/m', 'Yes', '', 0),
(210082, 'Ivan Jade', 'ivan.banares@gmail.com', '$2y$10$s9bapj5QhAx2ZPpHMh3lYOuCilRfa7ACjHevVDId5j38Bfl44j4iC', 'Yes', '', 0),
(210083, 'Andres', 'andres.bonifacio@gmail.com', '$2y$10$89kz9VI53xjQ8uLAYMYGEewKjEYE8ayEfQnkzjItwduEAi.pscKC2', 'Yes', '', 0),
(210084, 'Regie Minoza', 'regie.minoza@gmail.com', '$2y$10$L99VOTorsbg5MC86nMd6buewLWFbsyQO6lnXj0YAy4bAmFgbgmDx.', 'Yes', '', 0),
(210085, 'Adrian Santiago', 'adrian.santiago@gmail.com', '$2y$10$79W3OoVC07Syjgs2WZjF1OhKeddR.rtGR3B5TXbQrt59dxF2bhFdi', 'Yes', '', 0),
(210086, 'Juan Dela Cruz', 'juan.dela.cruz@gmail.com', '$2y$10$zYMk0b.HSgoho8HxDLKZcuhMUMcdkAs73Hja9nJQzBuWESlG27d4m', 'Yes', '', 0),
(210087, 'Hisui', 'ivan.banares10@gmail.com', '$2y$10$q4psZbHjhPxBqCX/egqRRuq3ijul7YqnKHJHFC4JotvCAIbIR3G9W', 'Yes', '', 0),
(210088, 'Jade B', 'hisub@gmail.com', '$2y$10$EMAuJNnkljMDiQanLfuggexandiyaB1yQr0PZ6dNhAhyD4Kgd3qRe', 'Yes', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_complaints`
--

CREATE TABLE `admin_complaints` (
  `blotterID` int(15) NOT NULL,
  `complainant` varchar(200) NOT NULL,
  `c_age` int(120) NOT NULL,
  `c_gender` enum('Male','Female') NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `incident_add` varchar(255) NOT NULL,
  `violators` varchar(200) NOT NULL,
  `v_age` int(120) NOT NULL,
  `v_gender` enum('Male','Female') NOT NULL,
  `v_rel` enum('Relative/Family','Others') NOT NULL,
  `v_address` varchar(255) NOT NULL,
  `witness` varchar(255) NOT NULL,
  `ex_complaints` varchar(255) NOT NULL,
  `dept` enum('BCPC','VAWC','LUPON','BPSO','NONE') NOT NULL,
  `app_date` date NOT NULL,
  `app_by` varchar(50) NOT NULL,
  `document` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_category`
--

CREATE TABLE `announcement_category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcement_category`
--

INSERT INTO `announcement_category` (`cid`, `category_name`, `category_image`, `status`) VALUES
(26, 'Barangay Charity', '1691-2022-01-22.jpg', 1),
(25, 'Barangay Funds', '2522-2022-01-22.jpg', 1),
(24, 'Barangay Program', '4810-2022-01-22.jpg', 1),
(23, 'Announcement', '1065-2022-01-22.jpg', 1),
(20, 'Vaccine', '4092-2022-01-22.jpg', 1),
(21, 'Scholarship-Stipend', '5573-2022-01-22.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `approved_bpermits`
--

CREATE TABLE `approved_bpermits` (
  `approved_bpermitid` int(15) NOT NULL,
  `document_id` varchar(200) NOT NULL,
  `dateissued` date NOT NULL,
  `selection` enum('Renewal','New') NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `businessname` varchar(200) NOT NULL,
  `businessaddress` varchar(200) NOT NULL,
  `plateno` varchar(15) NOT NULL,
  `email_add` varchar(200) NOT NULL,
  `businessid_image` varchar(200) NOT NULL,
  `permitfilechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `app_date` date NOT NULL,
  `status` enum('Approved','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `approved_brgyids`
--

CREATE TABLE `approved_brgyids` (
  `app_brgyid` int(11) NOT NULL,
  `document_id` varchar(200) NOT NULL,
  `fname` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `mname` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `birthday` date NOT NULL,
  `placeofbirth` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `precintno` varchar(50) NOT NULL,
  `contact_no` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `emailadd` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `guardianname` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `emrgncycontact` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `reladdress` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `dateissue` date NOT NULL,
  `brgyidfilechoice` enum('Harcopy','Softcopy','Both') NOT NULL,
  `document_type` enum('Barangay ID') NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `app_date` date NOT NULL,
  `status` enum('Approved','Done') NOT NULL,
  `id_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_brgyids`
--

INSERT INTO `approved_brgyids` (`app_brgyid`, `document_id`, `fname`, `mname`, `lname`, `address`, `birthday`, `placeofbirth`, `precintno`, `contact_no`, `emailadd`, `guardianname`, `emrgncycontact`, `reladdress`, `dateissue`, `brgyidfilechoice`, `document_type`, `approvedby`, `app_date`, `status`, `id_image`) VALUES
(178124, '178', 'Regie', '', 'Minoza', '#90 Barangay Commonwealth', '2000-02-17', 'Quezon City', '0265', '09451521313', 'regie.minoza@gmail.com', 'Minoza\'s Family', '09458511545', '#65 Barangay Commonwealth', '2022-02-08', 'Softcopy', 'Barangay ID', 'Elionore Cajucom', '2022-02-13', 'Approved', ''),
(178126, '178', 'John Eric', '', 'Verbo', '#57 Barangay Commonwealth', '2022-03-10', 'Legazpi Albay', '', '09474156211', 'john.eric.verbo@gmail.com', 'Verbo\'s Family', '09145471413', '#57 Barangay Commonwealth', '2022-02-05', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '8441-2022-02-13.jpg'),
(178128, '178', 'Jose', '', 'Rizal', '#64 Barangay Commonwealth', '2022-02-10', 'Quezon City', '', '09416146545', 'jose.rizal@gmail.com', 'Rizal\'s Family', '09456646546', '#2 Barangay Commonwealth', '2022-02-06', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '3259-2022-02-14.png'),
(178129, '178', 'Gladys', 'Arinal', 'Banares', '#87 Barangay Commonwealth', '2002-02-07', 'Quezon City', '', '09147521452', 'glady.banares@gmail.com', 'Adelai Banares', '09894946546', '#87 Barangay Commonwealth', '2022-02-06', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '1263-2022-02-14.jpg'),
(178131, '178', 'hey', 'hey', 'hey', 'hey', '2022-02-25', 'hey', '123', '123', 'hey@gmail.com', 'hey', '123', 'hey12', '2022-02-10', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '8733-2022-02-14.jpg'),
(178132, '178', 'We', 'We', 'We', '123We', '2022-02-03', 'We', '12', '12', 'We@gmail.com', 'We', '123', 'We', '2022-02-10', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '1720-2022-02-14.jpeg'),
(178133, '178', 'Dummy', '', 'Dummy', 'Barangay Commonwealth', '2022-02-15', 'Q City', '', '09326649797', 'dummy@gmail.com', 'Dummy', '09361548799', 'Barangay Commonwealth', '2022-02-13', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '6207-2022-02-14.png'),
(178134, '178', 'Test', 'Test', 'Test', 'Test', '2022-03-03', 'Test', '123', '123', 'Test@gmail.com', 'Test', '123', 'Test', '2022-02-13', 'Softcopy', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '0220-2022-02-14.jpg'),
(178135, '178', 'Testting', '', 'Testting', 'Testting', '2022-02-25', 'Testting', '123', '123', 'Testting@gmail.com', 'Testting', '0912', 'Testting', '2022-02-13', 'Softcopy', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '8596-2022-02-14.jpg'),
(178136, '178', 'Again', 'Again', 'Again', 'Again', '2022-02-16', 'Again', '123', '123', 'Again@gmail.com', 'Again', '123', 'Again', '2022-02-13', 'Softcopy', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '8584-2022-02-14.jpg'),
(178137, '178', 'Juan', '', 'Luna', 'Barangay Commonwealth', '2022-02-16', 'Q City', '', '09215467891', 'juanluna@gmail.com', 'Juan', '09316497665', 'Barangay Commonwealth', '2022-02-14', '', 'Barangay ID', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '4556-2022-02-14.png');

-- --------------------------------------------------------

--
-- Table structure for table `approved_clearance`
--

CREATE TABLE `approved_clearance` (
  `approved_clearanceids` int(15) NOT NULL,
  `document_id` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `age` int(120) NOT NULL,
  `status` enum('SINGLE','MARRIED','Widowed') NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailadd` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `date_issued` date NOT NULL,
  `ctc_no` varchar(30) NOT NULL,
  `issued_at` varchar(200) NOT NULL,
  `precint_no` varchar(30) NOT NULL,
  `filechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `clearanceid_image` varchar(200) NOT NULL,
  `document_type` enum('Clearance') NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `app_date` date NOT NULL,
  `clearance_status` enum('Approved','Done') NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approved_clearance`
--

INSERT INTO `approved_clearance` (`approved_clearanceids`, `document_id`, `full_name`, `age`, `status`, `nationality`, `address`, `contactno`, `emailadd`, `purpose`, `date_issued`, `ctc_no`, `issued_at`, `precint_no`, `filechoice`, `clearanceid_image`, `document_type`, `approvedby`, `app_date`, `clearance_status`, `added_on`) VALUES
(159577, '159', 'REGIE MINOZA', 22, 'SINGLE', 'FILIPINO', '#21 Barangay Commonwealth Hillside', '2147483647', 'regie.minoza@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-07', '084562', 'Barangay Commonwealth', '095741', '', '5456-2022-02-14.jpg', 'Clearance', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '2022-02-14 05:07:31'),
(159578, '159', 'KHALID DIMNANG', 21, 'SINGLE', 'FILIPINO', '#65 Barangay Commonwealth Hill', '09451474165', 'khalid.dimnang@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-07', '084254', 'Barangay Commonwealth', '094452', '', '0693-2022-02-14.jpeg', 'Clearance', 'ELIONORE CAJUCOM', '2022-02-14', 'Done', '2022-02-14 09:25:54'),
(159580, '159', 'TEST', 21, 'SINGLE', 'TEST', 'TEST', '123', 'test@gmail.com', 'TEST', '2022-02-10', '123', 'Barangay Commonwealth', '123', '', '0866-2022-02-14.jpg', 'Clearance', 'ELIONORE CAJUCOM', '2022-02-14', 'Approved', '2022-02-14 11:28:08'),
(159581, '159', 'AGAIN', 21, 'SINGLE', 'FILIPINO', 'AGAIN', '123', 'AGAIN@gmail.com', 'AGAIN', '2022-02-10', '213', 'Barangay Commonwealth', '123', '', '5702-2022-02-14.png', 'Clearance', 'ELIONORE CAJUCOM', '2022-02-14', 'Approved', '2022-02-14 11:22:23'),
(159582, '159', 'ELIONORE CAJUCOM', 21, 'SINGLE', 'FILIPINO', 'Barangay Commonwealth', '09369741159', 'elionore.cajucom@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-14', '0849', 'Barangay Commonwealth', '3619', '', '3233-2022-02-14.jpeg', 'Clearance', 'ELIONORE CAJUCOM', '2022-02-14', 'Approved', '2022-02-14 12:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `approved_indigency`
--

CREATE TABLE `approved_indigency` (
  `approvedindigency_id` int(15) NOT NULL,
  `document_id` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `contactnum` varchar(15) NOT NULL,
  `emailaddress` varchar(200) NOT NULL,
  `id_type` varchar(200) NOT NULL,
  `date_issue` date NOT NULL,
  `indigencyfilechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `document_type` enum('Indigency') NOT NULL,
  `approvedby` varchar(200) NOT NULL,
  `app_date` date NOT NULL,
  `indigencyid_image` varchar(200) NOT NULL,
  `status` enum('Approved','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `barangayclearance`
--

CREATE TABLE `barangayclearance` (
  `clearance_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `age` int(120) NOT NULL,
  `status` enum('SINGLE','MARRIED','WIDOWED') NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailadd` varchar(100) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `date_issued` date NOT NULL,
  `ctc_no` varchar(50) NOT NULL,
  `issued_at` varchar(200) NOT NULL,
  `precint_no` varchar(200) NOT NULL,
  `clearanceid_image` varchar(100) NOT NULL,
  `filechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `clearance_status` enum('Pending','Approved','Deny') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barangayclearance`
--

INSERT INTO `barangayclearance` (`clearance_id`, `full_name`, `age`, `status`, `nationality`, `address`, `contactno`, `emailadd`, `purpose`, `date_issued`, `ctc_no`, `issued_at`, `precint_no`, `clearanceid_image`, `filechoice`, `clearance_status`) VALUES
(159575, 'ELIONORE CAJUCOM', 21, 'SINGLE', 'FILIPINO', '#43 Barangay Commonwealth National High School', '09456258753', 'elionore.cajucom@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-07', '088523', 'Barangay Commonwealth', '882712', '8465-2022-02-07.png', 'Softcopy', 'Approved'),
(159576, 'JADE BANARES', 22, 'SINGLE', 'FILIPINO', '#62 Barangay Commonwealth South East', '09745896321', 'jade.banares@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-07', '081515', 'Barangay Commonwealth', '095452', '0604-2022-02-07.png', 'Hardcopy', 'Pending'),
(159577, 'REGIE MINOZA', 22, 'SINGLE', 'FILIPINO', '#21 Barangay Commonwealth Hillside', '09852475655', 'regie.minoza@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-07', '084562', 'Barangay Commonwealth', '095741', '4245-2022-02-07.png', 'Both', 'Approved'),
(159578, 'KHALID DIMNANG', 21, 'SINGLE', 'FILIPINO', '#65 Barangay Commonwealth Hill', '09451474165', 'khalid.dimnang@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-07', '084254', 'Barangay Commonwealth', '094452', '2022-2022-02-07.png', 'Both', 'Pending'),
(159579, 'JADE BANARES', 22, 'SINGLE', 'FILIPINO', '#26 Barangay Commonwealth', '09415423574', 'jade.banares@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-08', '094215', 'Barangay Commonwealth', '078286', '1147-2022-02-08.png', 'Hardcopy', 'Approved'),
(159580, 'TEST', 21, 'SINGLE', 'TEST', 'TEST', '123', 'test@gmail.com', 'TEST', '2022-02-10', '123', 'Barangay Commonwealth', '123', '1655-2022-02-10.jpg', 'Hardcopy', 'Pending'),
(159581, 'AGAIN', 21, 'SINGLE', 'FILIPINO', 'AGAIN', '123', 'AGAIN@gmail.com', 'AGAIN', '2022-02-10', '213', 'Barangay Commonwealth', '123', '1793-2022-02-10.jpg', 'Softcopy', 'Approved'),
(159582, 'ELIONORE CAJUCOM', 21, 'SINGLE', 'FILIPINO', 'Barangay Commonwealth', '09369741159', 'elionore.cajucom@gmail.com', 'PERSONAL IDENTIFICATION', '2022-02-14', '0849', 'Barangay Commonwealth', '3619', '1842-2022-02-13.png', 'Hardcopy', 'Deny');

-- --------------------------------------------------------

--
-- Table structure for table `barangayid`
--

CREATE TABLE `barangayid` (
  `barangay_id` int(11) NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `mname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `birthday` date NOT NULL,
  `placeofbirth` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `precintno` varchar(100) NOT NULL,
  `contact_no` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `emailadd` varchar(200) NOT NULL,
  `guardianname` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `emrgncycontact` varchar(15) CHARACTER SET utf8mb4 NOT NULL,
  `reladdress` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `dateissue` date NOT NULL,
  `id_image` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `brgyidfilechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `status` enum('Pending','Approved','Deny') CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barangayid`
--

INSERT INTO `barangayid` (`barangay_id`, `fname`, `mname`, `lname`, `address`, `birthday`, `placeofbirth`, `precintno`, `contact_no`, `emailadd`, `guardianname`, `emrgncycontact`, `reladdress`, `dateissue`, `id_image`, `brgyidfilechoice`, `status`) VALUES
(178124, 'Regie', '', 'Minoza', '#90 Barangay Commonwealth', '2000-02-17', 'Quezon City', '', '09451521313', 'regie.minoza@gmail.com', 'Minoza\'s Family', '09458511545', '#65 Barangay Commonwealth', '2022-02-08', '2504-2022-02-08.png', 'Hardcopy', 'Approved'),
(178125, 'Elionore', '', 'Cajucom', '#45 Barangay Commonwealth', '2022-02-05', 'Quezon City', '', '09154745625', 'elionore.cajucom@gmail.com', 'Eli\'s Family', '09123654789', '#45 Barangay Commonwealth', '2022-02-05', '5532-2022-02-05.jpg', 'Hardcopy', 'Deny'),
(178126, 'John Eric', '', 'Verbo', '#57 Barangay Commonwealth', '2022-03-10', 'Legazpi Albay', '', '09474156211', 'john.eric.verbo@gmail.com', 'Verbo\'s Family', '09145471413', '#57 Barangay Commonwealth', '2022-02-05', '3091-2022-02-05.png', 'Hardcopy', 'Approved'),
(178127, 'Jayson', '', 'Cuyones', '#23 Barangay Com', '2022-03-04', 'Quezon City', '', '09456123564', 'jayson.cuyones@gmail.com', 'Cuyones Family', '09741576254', '#24 Barangay Com', '2022-02-06', '8779-2022-02-06.jpg', 'Hardcopy', 'Approved'),
(178128, 'Jose', '', 'Rizal', '#64 Barangay Commonwealth', '2022-02-10', 'Quezon City', '', '09416146545', 'jose.rizal@gmail.com', 'Rizal\'s Family', '09456646546', '#2 Barangay Commonwealth', '2022-02-06', '8843-2022-02-06.jpg', 'Hardcopy', 'Approved'),
(178129, 'Gladys', 'Arinal', 'Banares', '#87 Barangay Commonwealth', '2002-02-07', 'Quezon City', '', '09147521452', 'glady.banares@gmail.com', 'Adelai Banares', '09894946546', '#87 Barangay Commonwealth', '2022-02-06', '9857-2022-02-06.jpg', 'Hardcopy', 'Pending'),
(178130, 'Jade', 'Arinal', 'Banares', '#48 Barangay Commonwealth', '2000-01-10', 'Legazpi Albay City', '085462', '09654258753', 'jade.arinal.banares@gmail.com', 'Adelaida Banares', '09987456258', '#48 Barangay Commonwealth', '2022-02-07', '3581-2022-02-07.jpeg', 'Both', 'Pending'),
(178131, 'hey', 'hey', 'hey', 'hey', '2022-02-25', 'hey', '123', '123', 'hey@gmail.com', 'hey', '123', 'hey12', '2022-02-10', '7755-2022-02-10.jpg', 'Hardcopy', 'Approved'),
(178132, 'We', 'We', 'We', '123We', '2022-02-03', 'We', '12', '12', 'We@gmail.com', 'We', '123', 'We', '2022-02-10', '8924-2022-02-10.jpg', 'Hardcopy', 'Approved'),
(178133, 'Dummy', '', 'Dummy', 'Barangay Commonwealth', '2022-02-15', 'Q City', '', '09326649797', 'dummy@gmail.com', 'Dummy', '09361548799', 'Barangay Commonwealth', '2022-02-13', '9115-2022-02-13.png', 'Hardcopy', 'Approved'),
(178134, 'Test', 'Test', 'Test', 'Test', '2022-03-03', 'Test', '123', '123', 'Test@gmail.com', 'Test', '123', 'Test', '2022-02-13', '9199-2022-02-13.pdf', 'Softcopy', 'Approved'),
(178135, 'Testting', '', 'Testting', 'Testting', '2022-02-25', 'Testting', '123', '123', 'Testting@gmail.com', 'Testting', '0912', 'Testting', '2022-02-13', '6031-2022-02-13.docx', 'Softcopy', 'Approved'),
(178136, 'Again', 'Again', 'Again', 'Again', '2022-02-16', 'Again', '123', '123', 'Again@gmail.com', 'Again', '123', 'Again', '2022-02-13', '1575-2022-02-13.pdf', 'Softcopy', 'Approved'),
(178137, 'Juan', '', 'Luna', 'Barangay Commonwealth', '2022-02-16', 'Q City', '', '09215467891', 'juanluna@gmail.com', 'Juan', '09316497665', 'Barangay Commonwealth', '2022-02-14', '3190-2022-02-14.png', 'Hardcopy', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `blotterdb`
--

CREATE TABLE `blotterdb` (
  `blotter_id` int(15) NOT NULL,
  `n_complainant` varchar(200) NOT NULL,
  `comp_age` int(120) NOT NULL,
  `comp_gender` enum('Male','Female') NOT NULL,
  `comp_address` varchar(255) NOT NULL,
  `inci_address` varchar(255) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `bemailadd` varchar(100) NOT NULL,
  `n_violator` varchar(200) NOT NULL,
  `violator_age` int(120) NOT NULL,
  `violator_gender` enum('Male','Female') NOT NULL,
  `relationship` enum('Relative/Family','Others') NOT NULL,
  `violator_address` varchar(255) NOT NULL,
  `witnesses` varchar(255) NOT NULL,
  `complaints` varchar(255) NOT NULL,
  `id_type` enum('Barangay ID','SSS','PhilHealth','Passport ID','Barangay Clearance') NOT NULL,
  `blotterid_image` varchar(100) NOT NULL,
  `status` enum('Pending','Done') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blotterdb`
--

INSERT INTO `blotterdb` (`blotter_id`, `n_complainant`, `comp_age`, `comp_gender`, `comp_address`, `inci_address`, `contactno`, `bemailadd`, `n_violator`, `violator_age`, `violator_gender`, `relationship`, `violator_address`, `witnesses`, `complaints`, `id_type`, `blotterid_image`, `status`) VALUES
(161800, 'Anne Curtis', 32, 'Female', '12 ABS-CBN Q.C', '12 ABS-CBN Q.C', '09374645536', '', 'EWAN HEUSSAF', 33, 'Male', 'Relative/Family', '12 ABS-CBN Q.C', 'SOLENN ', 'AYAW LUTUAN NG PAGKAIN', 'Barangay ID', '1760-2022-02-09.pdf', 'Pending'),
(161801, 'CHLOE MORETS', 26, 'Female', 'CALIFORNIA USA', 'CALIFORNIA USA', '09745232234', '', 'DRAKE HABADU', 36, 'Male', 'Relative/Family', 'CALIFORNIA USA', 'RIHANNA', 'HDGSFHG', 'Barangay ID', '1341-2022-02-09.pdf', 'Pending'),
(161802, 'Salad & Sanwich', 21, 'Male', '#42 Barangay Commonwealth', '#2 Barangay Commonwealth', '09452786541', '', 'RONALDO DA VINCI', 21, 'Male', 'Others', '#522 Barangay Commonwealth', 'Salad Sandwich', 'Walang palaman ang tinapay', 'Barangay ID', '9707-2022-02-09.pdf', 'Pending'),
(161803, 'Hoshi', 21, 'Male', 'Barangay Commonwealth', 'Commonwealth National High School', '09213649499', '', 'Fifi', 21, 'Female', 'Others', 'Barangay Commonwealth', 'Harlond', 'Ipinagkait na manok', 'Barangay ID', '6171-2022-02-09.pdf', 'Pending'),
(161804, 'Eli Cajucom', 22, 'Female', '123 Commonwealth Q.C', '123 Commonwealth Q.C', '09636452354', '', 'KangKong', 45, 'Male', 'Others', '123 Commonwealth Q.C', 'Papaya', 'Di binayaran utang', 'Barangay ID', '1565-2022-02-09.pdf', 'Pending'),
(161805, 'Pikachu', 12, 'Male', '09 Tokyo Japan ', '09 Tokyo Japan ', '9834663568', '', 'Ash chu', 26, 'Male', 'Relative/Family', '09 Tokyo Japan ', 'Bulbazor', 'Di pinakain ng tanghalian', 'Barangay ID', '6518-2022-02-09.pdf', 'Pending'),
(161806, 'Sonata/Violin', 22, 'Female', 'Barangay Commonwealth', 'Commonwealth National High School', '09316494546', '', 'Symphony', 21, 'Female', 'Others', 'Barangay Commonwealth', 'Ezekiel', 'Ezekiel Makulit whahaha', 'Barangay ID', '1993-2022-02-09.pdf', 'Pending'),
(161807, 'Testingg Hehe', 21, 'Male', 'Testingg Hehe', 'Testingg Hehe', '0321', '', 'Testingg Hehe', 21, 'Male', 'Others', 'Testingg Hehe', 'Testingg Hehe', 'Testingg Hehe', 'Barangay ID', '9290-2022-02-13.docx', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `brgyofficials`
--

CREATE TABLE `brgyofficials` (
  `brgyofficials_id` int(11) NOT NULL,
  `official_name` varchar(150) NOT NULL,
  `official_lname` varchar(100) NOT NULL,
  `official_mname` varchar(100) NOT NULL,
  `official_fname` varchar(100) NOT NULL,
  `official_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brgyofficials`
--

INSERT INTO `brgyofficials` (`brgyofficials_id`, `official_name`, `official_lname`, `official_mname`, `official_fname`, `official_password`) VALUES
(2202, 'Manuel A. Co', 'Co', 'A.', 'Manuel', '$2y$10$ZjZ/H3er.iiwe5iLuYrbve5jx1TiwkBv9Y3LoTANY3VGaFa4JHXDK'),
(2203, 'Manuel L. Quezon', 'Quezon', 'L.', 'Quezon', '$2y$10$SXFYSZqxwygvFYdAaMFPhuKdbqoXS5HCHT1VPN0q0fggSuc32Es/S'),
(2204, 'Elmer M. Buena', 'Buena', 'M.', 'Elmer', '$2y$10$XcApp4RSjfvkAuebcDWDyuqElluO5cJCdrTtjKjM5NA/ET3uQbAme');

-- --------------------------------------------------------

--
-- Table structure for table `businesspermit`
--

CREATE TABLE `businesspermit` (
  `businesspermit_id` int(11) NOT NULL,
  `dateissued` date NOT NULL,
  `selection` enum('renewal','new') NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `businessname` varchar(200) NOT NULL,
  `businessaddress` varchar(200) NOT NULL,
  `plateno` varchar(50) NOT NULL,
  `email_add` varchar(100) NOT NULL,
  `businessid_image` varchar(100) NOT NULL,
  `permitfilechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `status` enum('Pending','Approved','Deny') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesspermit`
--

INSERT INTO `businesspermit` (`businesspermit_id`, `dateissued`, `selection`, `fullname`, `contactno`, `businessname`, `businessaddress`, `plateno`, `email_add`, `businessid_image`, `permitfilechoice`, `status`) VALUES
(1, '2021-12-10', 'renewal', 'Jade', '', 'Jade\'s Restaurant', '121 Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(2, '2021-12-11', 'new', 'Elionore Cajucom', '', 'Eli\'s Restaurant', 'Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(3, '2021-12-10', 'renewal', 'Jayson Cuyones', '', 'Cuyones Chicken Restaurant', '#32 Commonwealth Street', '', '', '', 'Hardcopy', 'Pending'),
(4, '2021-12-13', 'renewal', 'Khalid Ace', '', 'Khalid\'s Five Star Restaurant', '#23 Barangay Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(5, '2021-12-13', 'new', 'Ma. Faith Gahisan', '', 'Ma\'s Restaurant', '#324 Barangay Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(6, '2021-12-13', 'new', 'Dave', '', 'Dave\'s Resto', '32 Commonwealth', '#132-232', '', '', 'Hardcopy', 'Pending'),
(125124, '2021-12-14', 'new', 'Jose Rizal', '', 'Rizal\'s Resto', '112 Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(125125, '2021-12-13', 'renewal', 'Andres Bonifacio', '', 'Bonifacio\'s Five Star Hotel', 'Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(125126, '2021-12-27', 'renewal', 'Regie Miñoza', '', 'Regie\'s Ultimate Restaurant', '#141 Barangay Commonwealth', '', '', '', 'Hardcopy', 'Pending'),
(125127, '2022-01-03', 'renewal', 'Danes', '', 'Queso De Bola', '#90 Barangay Commonwealth Livelihood', '125060', '', 'img/fileupload_bpermit/sett.png', 'Hardcopy', 'Approved'),
(125128, '2022-02-06', 'renewal', 'Test', '09123', 'Test', 'Test', '0912', 'Test@gmail.com', '2930-2022-02-06.jpeg', 'Hardcopy', 'Pending'),
(125129, '2022-02-06', 'renewal', 'Agasin', '09123', 'Agasin', 'Agasin', '091235', 'Agasin@gmail.com', '6259-2022-02-06.jpg', 'Hardcopy', 'Deny'),
(125130, '2022-02-06', 'renewal', 'Agasin', '09123', 'Agasin', 'Agasin', '091235', 'Agasin@gmail.com', '8778-2022-02-06.jpg', 'Hardcopy', 'Deny'),
(125131, '2022-02-06', 'renewal', 'part', '123', 'part', 'part', '123', 'part@gmail.com', '1337-2022-02-06.jpg', 'Hardcopy', 'Deny'),
(125132, '2022-02-10', 'renewal', 'Elionore', '09552141253', 'Eli\'s Botique', '#76 Barangay Commonwealth', '6523', 'elionore.cajucom@gmail.com', '6232-2022-02-10.jpg', 'Softcopy', 'Deny');

-- --------------------------------------------------------

--
-- Table structure for table `certificateindigency`
--

CREATE TABLE `certificateindigency` (
  `indigency_id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `purpose` varchar(150) NOT NULL,
  `contactnum` varchar(15) NOT NULL,
  `emailaddress` varchar(100) NOT NULL,
  `id_type` enum('Barangay ID','SSS','PhilHealth','Passport ID','Barangay Clearance') NOT NULL,
  `date_issue` date NOT NULL,
  `indigencyid_image` varchar(200) NOT NULL,
  `indigencyfilechoice` enum('Hardcopy','Softcopy','Both') NOT NULL,
  `status` enum('Pending','Approved','Deny') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificateindigency`
--

INSERT INTO `certificateindigency` (`indigency_id`, `fullname`, `address`, `purpose`, `contactnum`, `emailaddress`, `id_type`, `date_issue`, `indigencyid_image`, `indigencyfilechoice`, `status`) VALUES
(1308454, 'ELIONORE CAJUCOM', '#24 Barangay Commonwealth National High School', 'School Requirement', '09123585754', 'elionore.cajucom@gmail.com', 'PhilHealth', '2022-02-08', '4141-2022-02-08.png', 'Hardcopy', 'Pending'),
(1308455, 'JADE BANARES', '#64 Barangay Commonwealth Hillside', 'School Requirement', '09741528464', 'jade.banares@gmail.com', 'Barangay ID', '2022-02-08', '6508-2022-02-08.png', 'Hardcopy', 'Pending'),
(1308456, 'KHALID DIMNANG', '#109 Barangay Commonwealth', 'Scholarship Renewal', '09852452632', 'khalid.dimnang@gmail.com', 'Passport ID', '2022-02-08', '8175-2022-02-08.png', 'Hardcopy', 'Pending'),
(1308457, 'REGIE MINOZA', '#92 Barangay Commonwealth', 'Scholarship Requirement', '09455367522', 'regie.minoza@gmail.com', 'Passport ID', '2022-02-08', '7295-2022-02-08.png', 'Hardcopy', 'Pending'),
(1308458, 'JAYSON CUYONES', '#46 Barangay Commonwealth', 'Scholarship Requirement', '09445152262', 'jayson.cuyones@gmail.com', 'Barangay ID', '2022-02-08', '3263-2022-02-08.jpg', 'Hardcopy', 'Deny'),
(1308459, 'TEST', 'TEST', 'TEST', '123', 'TEST@gmail.com', 'Barangay ID', '2022-02-10', '8462-2022-02-10.png', 'Both', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `contactustbl`
--

CREATE TABLE `contactustbl` (
  `id` int(11) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(120) CHARACTER SET utf8mb4 NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `message` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactustbl`
--

INSERT INTO `contactustbl` (`id`, `username`, `email`, `subject`, `message`) VALUES
(1, 'Jade Banares', 'jade.banares@gmail.com', 'Concern', 'Good day po! May concern lang po ako regarding po sa request document. I\'m having difficulty po sa pag fill ng data. Yung orientation po ng forms natin is hindi po compatible sa phone. I hope maayos po siya ASAP! Thank you! '),
(2, 'Jose Rizal', 'jose.rizal@gmail.com', 'Question', 'Good Day po! I am Jose Rizal, may concern lang po regarding sa pagiging cute na tao!'),
(3, 'Ivan Jade BaÃ±ares', 'jade.arinal.banares@gmail.com', 'Complaints', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis '),
(4, 'Ivan Jade BaÃ±ares', 'jade.banares10@gmail.com', 'Complaints/Pasaway', 'Hello good day! May concern lang po!'),
(5, 'Mike Kendal\r\n', 'no-replyCheasia@gmail.com', 'Increase sales for comm-bms.com', 'Howdy \r\n \r\nIf you\'ll ever need a permanent increase in your website\'s Domain Authority score, We can help. \r\n \r\nMore info: \r\nhttps://www.strictlydigital.net/product/moz-da50-seo-plan/ \r\n \r\nNEW: Ahrefs DR70 plan: \r\nhttps://www.strictlydigital.net/product/a');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `address`) VALUES
(1, 'neovic', 'devierte', 'silay city'),
(2, 'gemalyn', 'cepe', 'carmen, bohol'),
(3, 'lee', 'apilinga', 'bacolod'),
(4, 'julyn', 'divinagracia', 'eb magalona');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_announcement`
--

CREATE TABLE `tbl_announcement` (
  `aid` int(11) NOT NULL,
  `announcement_heading` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `announcement_status` int(11) NOT NULL DEFAULT '1',
  `announcement_date` varchar(255) NOT NULL,
  `announcement_image` text NOT NULL,
  `announcement_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_announcement`
--

INSERT INTO `tbl_announcement` (`aid`, `announcement_heading`, `cat_id`, `announcement_status`, `announcement_date`, `announcement_image`, `announcement_description`) VALUES
(4, '2nd Dose Vaccination at (Barangay Commonwealth National H.S)', 20, 1, '2022-01-23', '8680-2022-01-23.jpg', '<p>Nearly everyone can get vaccinated. However, because of some medical conditions, some people should not get certain vaccines, or should wait before getting them. These conditions can include:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Chronic illnesses or treatments (like chemotherapy) that affect the immune system;</p>\r\n	</li>\r\n	<li>\r\n	<p>Severe and life-threatening allergies to vaccine ingredients, which are very rare;</p>\r\n	</li>\r\n	<li>\r\n	<p>If you have severe illness and a high fever on the day of vaccination.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p>These factors often vary for each vaccine. If you&rsquo;re not sure if you or your child should get a particular vaccine, talk to your health worker. They can help you make an informed choice about vaccination for you or your child.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Source:&nbsp;https://www.who.int/news-room/questions-and-answers/item/vaccines-and-immunization-what-is-vaccination</p>\r\n'),
(2, 'Releasing of Scholarship (Stipend)', 21, 1, '2022-01-22', '8179-2022-01-23.jpg', '<p>The term stipend refers to a predetermined amount of money prepaid to certain individuals. Stipends are often provided to people who are ineligible to receive a regular salary in exchange for the duties they perform. This includes trainees,&nbsp;<a href=\"https://www.investopedia.com/articles/investing/011316/job-or-internship-guide-college-students.asp\">interns</a>, and students. It helps these individuals offset some of their&nbsp;<a href=\"https://www.investopedia.com/terms/e/expense.asp\">expenses</a>. Stipends are generally lower in pay than salaries. The tradeoff is that the recipient gains experience and knowledge with some&mdash;usually minimal&mdash;<a href=\"https://www.investopedia.com/terms/r/remuneration.asp\">remuneration</a>.</p>\r\n\r\n<blockquote>\r\n<p>A&nbsp;<strong>scholarship</strong>&nbsp;is an award of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Student_financial_aid\">financial aid</a>&nbsp;for a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Student\">student</a>&nbsp;to further their&nbsp;<a href=\"https://en.wikipedia.org/wiki/Education\">education</a>&nbsp;at a private elementary or secondary school, or a private or public post-secondary college, university, or other academic institution. Scholarships are awarded based upon various criteria, such as academic&nbsp;<a href=\"https://en.wiktionary.org/wiki/merit\">merit</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Multiculturalism\">diversity and inclusion</a>, athletic skill, and financial need, among others (or some combination of these factors). Scholarship criteria usually reflect the values and goals of the donor or founder of the award. While scholarship recipients are not required to repay scholarships,<a href=\"https://en.wikipedia.org/wiki/Scholarship#cite_note-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Scholarship#cite_note-2\">[2]</a>&nbsp;the awards may require that the recipient continue to meet certain requirements during their period of support, such maintaining a minimum grade point average or engaging in a certain activity (e.g., playing on a school sports team for athletic scholarship holders, or serving as a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Teaching_assistant\">teaching assistant</a>&nbsp;for some graduate scholarships). Scholarships may provide a monetary award, an&nbsp;<a href=\"https://en.wikipedia.org/wiki/In-kind\">in-kind</a>&nbsp;award (e.g., waiving of tuition fees or fees for housing in a dormitory), or a combination.</p>\r\n</blockquote>\r\n\r\n<p>Some prestigious, highly competitive scholarships are well-known even outside the academic community, such as&nbsp;<a href=\"https://en.wikipedia.org/wiki/Fulbright_Program\">Fulbright Scholarship</a>&nbsp;and the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Rhodes_Scholarship\">Rhodes Scholarship</a>.</p>\r\n\r\n<p>-Reference:</p>\r\n\r\n<p><em><strong>https://www.investopedia.com/terms/s/stipend.asp</strong></em></p>\r\n\r\n<p><strong><em>https://en.wikipedia.org/wiki/Scholarship</em></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(5, 'COVID19 3rd DOSE (Commonwealth)', 20, 1, '2022-01-23', '1197-2022-01-23.jpg', '<p><strong>PABATID:</strong></p>\r\n\r\n<blockquote>\r\n<p>NARITO PO ANG LINK PARA PO SA COVID19 1ST DOSE AT BOOSTER VACCINE REGISTRATION <strong>(ASTRA ZENECA)</strong> SA DARATING NA <strong>IKA-24 NG ENERO 2022</strong> NA GAGANAPIN PO SA MRB COVERED COURT, <strong>BARANGAY COMMONWEALTH, QUEZON CITY.&nbsp;</strong>MANGYARING PINDUTIN LAMANG ANG NAAAYON NA LINK NA INYONG KAILANGAN:</p>\r\n</blockquote>\r\n\r\n<p><strong>REGISTRATION FOR BOOSTER SHOTS</strong><br />\r\nCOVID 19 VACCINE &ndash; ASTRA ZENECA (500 slots only)<br />\r\nJANUARY 24, 2021 &ndash; MRB COVERED COURT,<br />\r\nBARANGAY COMMOWEALTH QUEZON CITY</p>\r\n\r\n<p><br />\r\nLINK :&nbsp;<a href=\"https://free.facebook.com/l.php?u=https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F1cOnhzdrnAraDye60OPfTP_TnE6yr0d6o-i6oG_L0VjE%2Fedit%3Ffbclid%3DIwAR0mtSJZWR2_px7n19lAktfvhnv13mJk294ao1vHrup0RZ7fvqv681DaDTA&amp;h=AT03k0xdcfaXopj2rkZh_kjCexYYOhgkfAo1xwAobYb2fmUDkUgFzW7A6Y-htBlfOpyyPP9vKCHuQ7GDH-vCY8GI-OpGdZ7To88oTpWMUo-8uN6rPwBPqJaiQXZdjKy_tGZJc3jSqjT2PL9K_UjDIrIJVeVgB2IqRHL2vsG9Z-uSQAjeOp24YY9bzpTUpyrZviY-MSwHySpuTnZELBK-ktWfcMmIOX_xHbF80F-Exjc1LLsqGKdmltdlxXtWGlU35gUwLutI--ZP2llLYCWjWkACJWYrWBAcI9PkLKzYSpytQYETtfD0igGUcaq_nn1qKbHNrb7MOag7q8Bn-lK7SRFyiegoAkFVLxo9BEtQwTreE20qthB4bkt2m2KpTjNfmF93j0hXiPu6FYM9dT8zUr4Al6aYZcgQJrUM978af0efQlNyM3m1ATGQzQHjm7-UME0Cbt5XE2zm-sLMht5fKkRsQxqzgG4Cef0QnRH_nbRY5nBEGLyV5oMwPDtvHqyPb0OU5W3bxeAaWCMvKOP4KUulQAJVbI50JkE9ihP1so9g3GytG9fQ_UgD78tfEMeWTcgY_-DBzAdwyZPtgKjnr8HF-iSE5_1t68BxKMEFh4VugpCkm_zBhByYQvq0ADOs2rG9lg0SUnm-EHHh04T0o5IUe438zf4Hqlkeln_EvUAn1Ta38UkYykbYO8NfFfu-84hEGqNHssWQfv-DTx6qHa4YYFqf9YdKSeA2VFifibYVupkSZOKJbR0fySD2FdJg-B7bCiXM7BQ2wVR9fhXc-KFQa1Mese5el-Pu6L6-S4Bej5LkjEQBgVzO44vAhBKKVXt2egpubiBu0LV58S4lQKnsnAklodLvo9gpHNVlPsUCmHdc7VQL5EGRlrxeTcJHz6ZywTbg-GgXR3bGuFyUTUx4msLwcA\" target=\"_blank\">https://docs.google.com/forms/d/1cOnhzdrnAraDye60OPfTP_TnE6yr0d6o-i6oG_L0VjE/edit</a></p>\r\n\r\n<p>1ST DOSE COVID 19 VACCINE FOR ADULT<br />\r\nTYPE OF VACCINE : ASTRAZENECA</p>\r\n\r\n<p>DATE : JANUARY 24, 2022<br />\r\n<strong>VACCINATION SITE : MRB COVERED COURT, BARANGAY COMMONWEALTH, QC.</strong><br />\r\nLINK :&nbsp;<a href=\"https://free.facebook.com/l.php?u=https%3A%2F%2Fdocs.google.com%2Fforms%2Fd%2F17hLMwJhHoLJurDSFfiTnM3KlEkQ5gjvYQLgZ6mtyR2Y%2Fedit%3Ffbclid%3DIwAR3MvJipm_eqemw5uWwOi_rT_Q77iA9tuHfYHg_eYutuvKGo6tIB7u53Xlo&amp;h=AT0291IDcjEnV-Scz3lUpWC9eY4LviUOgycjvM9TVYc5thf5pwMasGyzpzkHOH4YsfKEut_zuZoJ97vfKoCnZldGdqRYzMjPtvMD10Yig9o8qfBkuFxBRNhFzXPP3raDMX8KCEO2vM_zf-hbmmXOojLQAXQJiHopj8xPp3zgzK7Op9CW6xU-nuPiEoEbMOJDSePnWKgaVhG1Fh0HXpaKhgoUB5fEvHJSA2IFY37naO2EnF65ZvLJ6EOSDnYM11dchO6ONzeFNf4TlfniUVmkktc5oDIVuQLU7fV23-FzRcMmop4ucR87OW3YOmNoqAMWciI3zSnDrszoiGndQ5fQyy52t5sUI2kQMLDyYzfuc40quztKKggH42uSXVSdM16NMX7fPLwxhc0m6xxPteJz5kNXUWwq_pPzpCHHqwVezpHlqfsa0x2nlXNbFmFTJB3uGcO52HiQJjkLCtnxRO3I578YHlSNL47z-VohRFoeu2AVazzu9JrMr-JBIRnWwdRNJBH0tnhmY5rElZPLffdx2-g3xdZxMGUgDOQIDZf5wig7XE-dPCWwgwD5WsWR1egR9maVHHcqvu2C_T4LHUriXHy7bQkiVHY0a0vP49Or4FI7rfR2DXSdCQ01dOjmur-JKd9NDgimKNnAfYX-edpv4p_idshp4iC2Rs2-2Hyzx65AZHzkkAI5hmmvV9xWjOk411IyXCraFOs8tkGWknlnmsqynlXeT75Ws0qRnCkjBLBJckhIYvsXIYsUYJGqBekQH_cB9Klk9z5J_hUT66GEcGe6Dv8vzZDXfFwX6AN8HShMhdo-QciqiAZ-D6Jyne8Mosf2Yq7k-gZtpdrAp_6ZeZmTirvNQjCR08R3tawpml6XraJ9LI2hK9N16bKUIM0P-Cv_JXBOEFVWFKzPXpmR7iqzhKx1z_M5gicU\" target=\"_blank\">https://docs.google.com/forms/d/17hLMwJhHoLJurDSFfiTnM3KlEkQ5gjvYQLgZ6mtyR2Y/edit</a></p>\r\n\r\n<p><strong>MARAMING SALAMAT PO.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Visit Our Facebook Page: Barangay Commonwealth <strong>(www.facebook.com//barangay.commonwealth.3551)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(7, 'Program Sample', 24, 1, '2022-01-29', '4343-2022-01-29.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. <strong>Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis</strong>. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n\r\n<blockquote>\r\n<p>Power Rangers -&nbsp;<strong>Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis</strong>. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</p>\r\n</blockquote>\r\n\r\n<p><em>Power Rangers -&nbsp;</em><strong>Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis</strong><em>. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas elementum. Nunc imperdiet gravida mauris.</em></p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(8, 'What is Program?', 24, 1, '2022-01-29', '4393-2022-02-06.jpg', '<p>A&nbsp;<em>program</em>&nbsp;is a set of&nbsp;<a href=\"https://www.webopedia.com/definitions/instruction/\">instructions</a>&nbsp;that a computer uses to perform a specific function. To use an analogy, a program is like a computer&rsquo;s recipe. It contains a list of ingredients (called&nbsp;<a href=\"https://www.webopedia.com/definitions/variable/\">variables</a>, which can represent numeric&nbsp;<a href=\"https://www.webopedia.com/definitions/data/\">data</a>,&nbsp;<a href=\"https://www.webopedia.com/definitions/text/\">text</a>, or images) and a list of directions (called&nbsp;<a href=\"https://www.webopedia.com/definitions/statement/\">statements</a>) that tell the computer how to&nbsp;<a href=\"https://www.webopedia.com/definitions/execute/\">execute</a>&nbsp;a specific task.</p>\r\n\r\n<blockquote>\r\n<p>Programs are created using specific&nbsp;<a href=\"https://www.webopedia.com/definitions/programming-language/\">programming languages</a>&nbsp;such as&nbsp;<a href=\"https://www.webopedia.com/definitions/c-plus-plus/\">C++</a>,&nbsp;<a href=\"https://www.webopedia.com/definitions/python/\">Python</a>, and&nbsp;<a href=\"https://www.webopedia.com/definitions/ruby/\">Ruby</a>. These are&nbsp;<a href=\"https://www.webopedia.com/definitions/high-level-language/\">high level programming languages</a>&nbsp;that are human-readable and writable. These languages are then translated into low level&nbsp;<a href=\"https://www.webopedia.com/definitions/machine-language/\">machine languages</a>&nbsp;by&nbsp;<a href=\"https://www.webopedia.com/definitions/compilier/\">compilers</a>,&nbsp;<a href=\"https://www.webopedia.com/definitions/interpreter/\">interpreters</a>, and&nbsp;<a href=\"https://www.webopedia.com/definitions/assembler/\">assemblers</a>&nbsp;within the computer system.&nbsp;<a href=\"https://www.webopedia.com/definitions/assembly-language/\">Assembly language</a>&nbsp;is a type of&nbsp;<a href=\"https://www.webopedia.com/definitions/low-level-language/\">low level language</a>&nbsp;that is one step above a machine language and technically&nbsp;<em>can</em>&nbsp;be written by a human, although it is usually much more cryptic and difficult to understand.</p>\r\n</blockquote>\r\n\r\n<p>A list of directions (called&nbsp;<a href=\"https://www.webopedia.com/definitions/statement/\">statements</a>) that tell the computer how to&nbsp;<a href=\"https://www.webopedia.com/definitions/execute/\">execute</a>&nbsp;a specific task.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `Password` text NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`ID`, `Username`, `Password`, `Email`) VALUES
(1, 'admin', 'd82494f05d6917ba02f7aaa29689ccb444bb73f20380876cb05d1f37537b7892', 'admin@gmail.com');

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
-- Indexes for table `accreg_resident`
--
ALTER TABLE `accreg_resident`
  ADD PRIMARY KEY (`resident_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin_complaints`
--
ALTER TABLE `admin_complaints`
  ADD PRIMARY KEY (`blotterID`);

--
-- Indexes for table `announcement_category`
--
ALTER TABLE `announcement_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `approved_brgyids`
--
ALTER TABLE `approved_brgyids`
  ADD PRIMARY KEY (`app_brgyid`);

--
-- Indexes for table `approved_clearance`
--
ALTER TABLE `approved_clearance`
  ADD PRIMARY KEY (`approved_clearanceids`);

--
-- Indexes for table `approved_indigency`
--
ALTER TABLE `approved_indigency`
  ADD PRIMARY KEY (`approvedindigency_id`);

--
-- Indexes for table `barangayclearance`
--
ALTER TABLE `barangayclearance`
  ADD PRIMARY KEY (`clearance_id`);

--
-- Indexes for table `barangayid`
--
ALTER TABLE `barangayid`
  ADD PRIMARY KEY (`barangay_id`);

--
-- Indexes for table `blotterdb`
--
ALTER TABLE `blotterdb`
  ADD PRIMARY KEY (`blotter_id`);

--
-- Indexes for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  ADD PRIMARY KEY (`brgyofficials_id`);

--
-- Indexes for table `businesspermit`
--
ALTER TABLE `businesspermit`
  ADD PRIMARY KEY (`businesspermit_id`);

--
-- Indexes for table `certificateindigency`
--
ALTER TABLE `certificateindigency`
  ADD PRIMARY KEY (`indigency_id`);

--
-- Indexes for table `contactustbl`
--
ALTER TABLE `contactustbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usersdb`
--
ALTER TABLE `usersdb`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accreg_resident`
--
ALTER TABLE `accreg_resident`
  MODIFY `resident_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210089;

--
-- AUTO_INCREMENT for table `announcement_category`
--
ALTER TABLE `announcement_category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `barangayclearance`
--
ALTER TABLE `barangayclearance`
  MODIFY `clearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159583;

--
-- AUTO_INCREMENT for table `barangayid`
--
ALTER TABLE `barangayid`
  MODIFY `barangay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178138;

--
-- AUTO_INCREMENT for table `blotterdb`
--
ALTER TABLE `blotterdb`
  MODIFY `blotter_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161808;

--
-- AUTO_INCREMENT for table `brgyofficials`
--
ALTER TABLE `brgyofficials`
  MODIFY `brgyofficials_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2205;

--
-- AUTO_INCREMENT for table `businesspermit`
--
ALTER TABLE `businesspermit`
  MODIFY `businesspermit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125133;

--
-- AUTO_INCREMENT for table `certificateindigency`
--
ALTER TABLE `certificateindigency`
  MODIFY `indigency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1308460;

--
-- AUTO_INCREMENT for table `contactustbl`
--
ALTER TABLE `contactustbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_announcement`
--
ALTER TABLE `tbl_announcement`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usersdb`
--
ALTER TABLE `usersdb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1121022;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
