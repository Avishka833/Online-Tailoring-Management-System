-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 03:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_tailoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(26, 'Avishka', 'Admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(79, 'Shirts', 'Clothes_Category_455.jpg', 'Yes', 'Yes'),
(80, 'Trousers', 'Clothes_Category_925.jpg', 'Yes', 'Yes'),
(81, 'Blouses', 'Clothes_Category_309.jpg', 'Yes', 'Yes'),
(82, 'Frocks', 'Clothes_Category_896.jpg', 'Yes', 'Yes'),
(83, 'Jeans', 'Clothes_Category_946.jpg', 'Yes', 'Yes'),
(84, 'T Shirt', 'Clothes_Category_161.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clothes`
--

CREATE TABLE `tbl_clothes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_clothes`
--

INSERT INTO `tbl_clothes` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(25, 'Black T Shirt', '100% Cotton', '5.00', 'Clothes-name-9062.jpg', 78, 'Yes', 'Yes'),
(26, 'Long Sleeves Brown', '100% Cotton', '6.00', 'Clothes-name-5273.jpg', 78, 'Yes', 'Yes'),
(27, 'Red And Black', '100 % Cotton', '10.00', 'Clothes-name-4415.jpg', 79, 'Yes', 'Yes'),
(28, 'Short Sleeves ', '100% Cotton', '12.00', 'Clothes-name-9253.jpg', 79, 'Yes', 'Yes'),
(29, 'Lenin Trousers', '100 % Cotton', '8.00', 'Clothes-name-7772.jpg', 80, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mesurements`
--

CREATE TABLE `tbl_mesurements` (
  `id` int(10) UNSIGNED NOT NULL,
  `neck_base` float NOT NULL,
  `chest` float NOT NULL,
  `waist` float NOT NULL,
  `hip` float NOT NULL,
  `center_front` float NOT NULL,
  `center_back` float NOT NULL,
  `shoulder_length` float NOT NULL,
  `accross_shoulder` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_mesurements`
--

INSERT INTO `tbl_mesurements` (`id`, `neck_base`, `chest`, `waist`, `hip`, `center_front`, `center_back`, `shoulder_length`, `accross_shoulder`) VALUES
(15, 12.3, 12, 12, 12, 12, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `clothes` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `clothes`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(155, 'Black T Shirt', '5.00', 1, '5.00', '2023-01-18 11:23:35', 'Ordered', 'Avishka Wijerathen', '0778016758', 'Avishkavipulsara11@gmail.com', 'Sandaganagama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mesurements`
--
ALTER TABLE `tbl_mesurements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_clothes`
--
ALTER TABLE `tbl_clothes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_mesurements`
--
ALTER TABLE `tbl_mesurements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
