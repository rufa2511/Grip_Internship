-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 07:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banksystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `feedback` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `feedback`) VALUES
(1, 'rufa', 'kazirufa@gmail.com', 'Nice project'),
(2, 'abc', 'abc@gmail.com', 'Nice project'),
(3, 'xyz', 'xyz@gmail.com', 'Nice Project:))');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` int(10) NOT NULL,
  `balance` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `balance`) VALUES
(1, 'Rufa ', 'kazirufa@gmail.com', 1234567890, 10000),
(2, 'Rahil', 'rahil@gmail.com', 5782304569, 25000),
(3, 'Muskan', 'muskan@gmail.com', 4445566677, 30000),
(4, 'Omkar', 'omkar@gmail.com', 1125125111, 45000),
(5, 'Shenaz', 'shenaz@gmail.com', 7779979997, 10000),
(6, 'Leo', 'leo@gmail.com', 2224444222, 7080),
(7, 'Tomlu', 'tomlu@gmail.com', 2113311125, 60000),
(8, 'Senorita', 'seno@gmail.com', 1253657880, 64000),
(9, 'Kazi', 'kazi@gmail.com', 2157983647, 70000),
(10, 'Prince', 'prince@gmail.com', 2855555868, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `from_customer` varchar(30) NOT NULL,
  `to_customer` varchar(30) NOT NULL,
  `amount` int(10) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `from_customer`, `to_customer`, `amount`, `date_time`) VALUES
(1, 'Rufa', 'Kazi', 100, '2021-07-14 08:15:10'),
(2, 'Senorita', 'Prince', 90, '2021-07-15 14:30:24'),
(3, 'Omkar', 'Rahil', 500, '2021-07-17 16:22:30');


--
-- Indexes for dumped tables
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;