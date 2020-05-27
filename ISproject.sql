-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2020 at 04:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ISproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_email` varchar(120) NOT NULL,
  `cust_password` varchar(60) NOT NULL,
  `food_preference` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_email`, `cust_password`, `food_preference`) VALUES
(1, 'Srajan', 'srajanahuja08@gmail.com', '123', 'veg'),
(2, 'pp2', 'pp2@g.com', '123', 'veg'),
(3, 'aa', 'aa@g.com', '123', 'non veg'),
(4, 'aaa', 'aa2@g.com', '123', 'non veg'),
(5, 'aaa', 'aa3@g.com', '123', 'non veg'),
(6, 'b2b', 'b2b@g.com', '123', 'non veg'),
(7, 'ahuja', 's@a.com', '111', 'veg'),
(8, 'nm', 'nm@i.com', '111', 'veg'),
(9, 'shanker', 'n@g.com', '111', 'non veg'),
(10, 'yukti', 'y@g.com', '111', 'veg'),
(11, 'hh', 'h@i.com', '111', 'veg'),
(12, 'Srajan', 's@g.com', '123', 'nveg');

-- --------------------------------------------------------

--
-- Table structure for table `fooditems`
--

CREATE TABLE `fooditems` (
  `food_id` int(100) NOT NULL,
  `food_name` varchar(100) NOT NULL,
  `food_type` varchar(15) NOT NULL,
  `r_id` int(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `food_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fooditems`
--

INSERT INTO `fooditems` (`food_id`, `food_name`, `food_type`, `r_id`, `r_name`, `food_price`) VALUES
(1, 'Chicken Tikka', 'non veg', 1, 'aa', 300),
(2, 'Pizza', 'non veg', 1, 'aa', 500),
(3, 'Virgin Mojito', 'veg', 1, 'aa', 100),
(4, 'Oreo Shake', 'veg', 1, 'aa', 100),
(5, 'Chicken Lollipop', 'non veg', 1, 'aa', 300),
(6, 'Cheese Pizza', 'veg', 2, 'bb', 400),
(7, 'Chicken Pakora', 'non veg', 2, 'bb', 100),
(8, 'Pepsi', 'veg', 2, 'bb', 50),
(9, 'paneer', 'veg', 2, 'bb', 100),
(10, 'Lasagna', 'veg', 2, 'bb', 600),
(11, 'Chicken Noodle Soup', 'non veg', 3, 'China Town', 150),
(12, 'Ramen', 'non veg', 4, 'Asian Kitchen', 400);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `r_id` int(100) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `f_id` int(100) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `c_id`, `r_id`, `f_name`, `f_id`, `r_name`, `c_name`, `price`) VALUES
(1, 2, 2, 'Pepsi', 8, 'bb', 'pp2', 100),
(2, 2, 2, 'Cheese Pizza', 6, 'bb', 'pp2', 400),
(3, 1, 4, 'Ramen', 12, 'Asian Kitchen', 'Srajan', 400),
(4, 1, 2, 'Cheese Pizza', 6, 'bb', 'Srajan', 400);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `rest_id` int(100) NOT NULL,
  `rest_name` varchar(100) NOT NULL,
  `rest_email` varchar(120) NOT NULL,
  `rest_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`rest_id`, `rest_name`, `rest_email`, `rest_password`) VALUES
(1, 'aa', 'aa@i.com', '123'),
(2, 'bb', 'bb@i.com', '111'),
(3, 'China Town', 'c@p.com', '111'),
(4, 'Asian Kitchen', 'a@k.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `fooditems`
--
ALTER TABLE `fooditems`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`rest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fooditems`
--
ALTER TABLE `fooditems`
  MODIFY `food_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `rest_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
