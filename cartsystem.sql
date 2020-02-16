-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2020 at 10:50 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cartsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Id` int(5) NOT NULL,
  `P_Name` varchar(20) NOT NULL,
  `P_Price` varchar(10) NOT NULL,
  `P_Image` varchar(20) NOT NULL,
  `P_Qty` int(5) NOT NULL,
  `T_Price` varchar(10) NOT NULL,
  `P_Code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Id`, `P_Name`, `P_Price`, `P_Image`, `P_Qty`, `T_Price`, `P_Code`) VALUES
(51, 'Ninja Excel', '45', 'img01250949.png', 1, '45', '01250949');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `Id` int(4) NOT NULL,
  `Product` varchar(200) NOT NULL,
  `T_Price` varchar(25) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Address` varchar(25) NOT NULL,
  `Payment_Mode` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`Id`, `Product`, `T_Price`, `Name`, `Email`, `Phone_Number`, `Address`, `Payment_Mode`) VALUES
(3, 'Android(4), C++(8), Ninja Excel(9)', '1037', 'Jhorge Klicks', 'jhorgeklicks@gmail.com', '0247697187', 'Mallam-Gbawe', 'netBanking');

-- --------------------------------------------------------

--
-- Table structure for table `firstshop`
--

CREATE TABLE `firstshop` (
  `Id` int(3) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Image` varchar(25) NOT NULL,
  `Price` varchar(7) NOT NULL,
  `Pcode` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `firstshop`
--

INSERT INTO `firstshop` (`Id`, `Name`, `Image`, `Price`, `Pcode`) VALUES
(2, 'Java', 'img01245155.png', '54', '01222715'),
(3, 'Php', 'img01245213.png', '50', '01221923'),
(4, 'Android', 'img01245230.png', '58', '01235741'),
(5, 'Ninja Excel', 'img01250949.png', '45', '01250949'),
(6, 'System Prog.', 'img01271409.png', '72', '01271409'),
(7, 'cyber', 'img01271726.png', '34', '01271726'),
(8, 'Physics', 'img01271812.png', '28', '01271812'),
(9, 'C++', 'img01271841.png', '50', '01271841');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `firstshop`
--
ALTER TABLE `firstshop`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `firstshop`
--
ALTER TABLE `firstshop`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
