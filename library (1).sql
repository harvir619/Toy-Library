-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2020 at 11:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `loaned`
--

CREATE TABLE `loaned` (
  `username` varchar(50) NOT NULL,
  `toyid` int(20) NOT NULL,
  `date` date NOT NULL,
  `loaneduntil` date NOT NULL,
  `term` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaned`
--

INSERT INTO `loaned` (`username`, `toyid`, `date`, `loaneduntil`, `term`, `status`) VALUES
('admin', 1, '2020-06-01', '2020-06-08', 0, 2),
('admin', 6, '2020-06-01', '2020-06-08', 0, 2),
('usman', 18, '2020-06-01', '2020-06-08', 0, 2),
('admin', 19, '2020-06-01', '2020-06-08', 0, 2),
('usman', 20, '2020-06-01', '2020-06-08', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `username` varchar(50) NOT NULL,
  `toyid` int(20) NOT NULL,
  `date` date NOT NULL,
  `reserveduntildate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`username`, `toyid`, `date`, `reserveduntildate`) VALUES
('admin', 3, '2020-06-09', '2020-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `toys`
--

CREATE TABLE `toys` (
  `toyid` int(20) NOT NULL,
  `toyname` varchar(100) NOT NULL,
  `status` int(1) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toys`
--

INSERT INTO `toys` (`toyid`, `toyname`, `status`, `img_dir`) VALUES
(1, 'Thanos', 2, '1.jpg'),
(2, 'Infinity Gaunlet', 1, '2.jpg'),
(3, 'Carnage', 3, '3.jpg'),
(4, 'Spiderman Ock', 1, '4.jpg'),
(5, 'Wolverine', 1, '5.jpg'),
(6, 'Leonardo', 2, '6.jpg'),
(7, 'Wonder-Woman', 1, '7.jpg'),
(8, 'Batman', 1, '8.jpg'),
(9, 'Dark Batman', 1, '9.jpg'),
(10, 'Green Arrow', 1, '10.jpg'),
(11, 'Frozen Castle', 1, '11.jpg'),
(12, 'Flash', 1, '12.jpg'),
(13, 'Reverse Flash', 1, '13.jpg'),
(14, 'Buzz Lightyear', 1, '14.jpg'),
(15, 'Woody', 1, '15.jpg'),
(16, 'Darth Vader', 1, '16.jpg'),
(17, 'Anakin Skywalker', 1, '17.jpg'),
(18, 'Baby Yoda', 2, '18.jpg'),
(19, 'Shadow Luffy', 2, '19.jpg'),
(20, 'Eren Titan', 2, '20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` int(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `number`, `email`, `gender`) VALUES
('admin', 'admin', 1, 'admin@g', '1'),
('harvir', '123', 54019915, 'harvir619@gmail.com', 'M'),
('kuiglr', 'sdf', 54234523, 'harvir619@gmail.com', 'M'),
('usman', 'usman', 23333333, 'usman@usman.com', 'M'),
('usman7', '435', 21352545, 'harvir619@gmail.com', 'M');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaned`
--
ALTER TABLE `loaned`
  ADD PRIMARY KEY (`toyid`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`toyid`);

--
-- Indexes for table `toys`
--
ALTER TABLE `toys`
  ADD PRIMARY KEY (`toyid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loaned`
--
ALTER TABLE `loaned`
  MODIFY `toyid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `toyid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `toys`
--
ALTER TABLE `toys`
  MODIFY `toyid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
