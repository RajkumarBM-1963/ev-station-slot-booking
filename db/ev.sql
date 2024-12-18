-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 05:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`



CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(100) NOT NULL,
  `evid` varchar(100) NOT NULL,
  `ftime` varchar(100) NOT NULL,
  `ttime` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bid`, `evid`, `ftime`, `ttime`, `username`) VALUES
(1, '1', '16:03', 'submit', 'ram'),
(2, '1', '07:21', '21:25', 'shreyas'),
(3, '8', '20:33', '22:35', 'ramu'),
(4, '2', '07:11', '20:12', 'suresh'),
(5, '1', '10:55', '00:56', 'shreyas'),
(6, '7', '13:32', '01:32', 'shreyas'),
(7, '2', '03:06', '19:06', 'shreyas'),
(8, '2', '14:44', '', 'shreyas');

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `bookingid` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`bookingid`, `status`) VALUES
(0, 'Approve'),
(1, 'Approve'),
(2, 'Approve'),
(3, 'Approve'),
(4, 'Approve'),
(5, 'Approve'),
(6, 'Approve'),
(7, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `evstation`
--

CREATE TABLE `evstation` (
  `evid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `evname` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evstation`
--

INSERT INTO `evstation` (`evid`, `username`, `evname`, `city`, `address`, `image`, `capacity`) VALUES
(2, 'ramesh', 'EV777 GOOO', 'Mysore', 'Mysore, Karnataka, India', 'images.jpg', '10'),
(8, 'ramesh', 'lets charge', 'Banglore', 'T Narsipura Road, Police Layout 2nd Stage, Mysuru, Karnataka, India', 'SemaConnect-Series-4-–-All.jpg', '10'),
(9, 'ramesh', 'green energy', 'Manglore', 'manglore ', 'istockphoto-1330589502-170667a.jpg', '10'),
(10, 'shreyas', 'sdfdsfds', 'Banglore', 'Mysore, Karnataka, India', 'images (1).jpg', '10');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `trn_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `username`, `fullname`, `email`, `phone`, `address`, `password`, `trn_date`) VALUES
(3, 'rudrash', 'rudresh raj', 'dfdsdsfsd328@gmail.com', '897987897987', 'T Narsipura Road, Police Layout 2nd Stage, Mysuru, Karnataka, India', '698d51a19d8a121ce581499d7b701668', '2022-10-21 13:55:05'),
(7, 'ramesh', 'ramesh s', 'ramesh@gmail.com', '8972832348', '#831, Police Layout 2nd Stage Mysore Karnataka\r\n#831', '698d51a19d8a121ce581499d7b701668', '2022-11-05 08:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `userfeedback`
--

CREATE TABLE `userfeedback` (
  `fid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `stationname` varchar(100) NOT NULL,
  `rating` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `trn_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userfeedback`
--

INSERT INTO `userfeedback` (`fid`, `username`, `stationname`, `rating`, `message`, `trn_date`) VALUES
(1, 'shreyas', 'ev go', '100', 'excellent experience', '2022-10-20 11:42:23'),
(2, 'ram', 'ev go', '63', 'excellent experience but must improve', '2022-10-21 10:27:59'),
(3, 'shreyas', 'ev go', '57', 'excellent experience', '2022-10-25 06:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `trn_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `phone`, `address`, `password`, `trn_date`) VALUES
(8, 'rohith', 'rohith kumar', 'rohith@gamil.com', '4578937458973', '378437 Police Layout 2nd Stage Mysore Karnataka\r\n', '698d51a19d8a121ce581499d7b701668', '2022-10-19 12:04:15'),
(9, 'ram', 'ram', 'gksjkldjgk@gmail.com', '872356828', 'Mysore, Karnataka, India', '202cb962ac59075b964b07152d234b70', '2022-10-21 10:27:23'),
(10, 'ramu', 'shreyas bs', 'bsshreyas328@gmail.com', '4578937458973', '#831, Police Layout 2nd Stage Mysore Karnataka\r\n#831', '698d51a19d8a121ce581499d7b701668', '2022-10-21 13:57:50'),
(35, 'shreyas', 'shreyas bs', 'bsshreyas328@gmail.com', '8884644589', '#831, Police Layout 2nd Stage Mysore Karnataka\r\n#831', '698d51a19d8a121ce581499d7b701668', '2022-11-09 08:31:33');

CREATE TABLE  `bills` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(100) NOT NULL,
    `invoice_number` VARCHAR(50) NOT NULL,
    `invoice_date` DATE NOT NULL,
    `order_number` VARCHAR(50) NOT NULL,
    `bill_to_name` VARCHAR(100) NOT NULL,
    `status` VARCHAR(50) NOT NULL,
    `amount` DECIMAL(10, 2) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `evstation`
--
ALTER TABLE `evstation`
  ADD PRIMARY KEY (`evid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userfeedback`
--
ALTER TABLE `userfeedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `evstation`
--
ALTER TABLE `evstation`
  MODIFY `evid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userfeedback`
--
ALTER TABLE `userfeedback`
  MODIFY `fid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



