-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 10:52 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `niels`
--

-- --------------------------------------------------------

--
-- Table structure for table `weetje`
--

CREATE TABLE `weetje` (
  `id` int(11) NOT NULL,
  `weetje` varchar(500) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weetje`
--

INSERT INTO `weetje` (`id`, `weetje`, `datum`) VALUES
(1, 'beep', '2016-06-06'),
(2, 'test', '2019-06-06'),
(3, 'voorbeeld', '2019-06-06'),
(6, 'het internet is ontstaan', '1969-12-01'),
(7, 'dit is een cool weetje', '2019-06-12'),
(8, 'Dit is een cool weetje', '2019-06-12'),
(9, 'Dit is een cool weetje', '2019-06-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weetje`
--
ALTER TABLE `weetje`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weetje`
--
ALTER TABLE `weetje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
