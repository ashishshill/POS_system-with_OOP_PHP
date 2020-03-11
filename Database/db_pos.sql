-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 02:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `buy_history`
--

CREATE TABLE `buy_history` (
  `bh_id` int(11) NOT NULL,
  `inventory_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `buying_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `buy_history`
--

INSERT INTO `buy_history` (`bh_id`, `inventory_id`, `amount`, `total_price`, `buying_date`) VALUES
(1, 2147483647, 322, '45566', '2019-03-28 21:00:42'),
(2, 2147483647, 322, '45566', '2019-03-28 21:01:57'),
(3, 1292037292, 343, '2222', '2019-03-28 21:02:53'),
(4, 1292037292, 450, '333222', '2019-03-28 21:11:25'),
(5, 2147483647, 33, '2222', '2019-04-11 21:52:31'),
(6, 2147483647, 33, '2222', '2019-04-11 21:53:33'),
(7, 2147483647, 22, '123', '2019-04-11 21:54:12'),
(8, 2147483647, 23, '1233', '2019-04-11 21:58:47'),
(9, 1062603493, 22, '33', '2019-04-11 22:01:24'),
(10, 2147483647, 233, '222', '2019-04-11 22:03:34'),
(11, 2147483647, 3333, '33333', '2019-04-11 22:04:50'),
(12, 2147483647, 222, '33', '2019-04-11 22:13:02'),
(13, 2147483647, 222, '33', '2019-04-11 22:15:52'),
(14, 1367416606, 444, '333', '2019-04-11 22:17:43'),
(15, 2147483647, 333, '333', '2019-04-11 22:18:54'),
(16, 2147483647, 44, '44', '2019-04-11 22:19:21'),
(17, 2147483647, 44, '44', '2019-04-11 22:19:53'),
(18, 2147483647, 333, '33', '2019-04-11 22:20:20'),
(19, 34059524, 33, '33', '2019-04-11 22:23:02'),
(20, 2147483647, 222, '22', '2019-04-11 22:23:37'),
(21, 2147483647, 444, '22', '2019-04-11 22:27:00'),
(22, 0, 3344, '22', '2019-04-11 22:28:29'),
(23, 0, 3344, '45', '2019-04-11 22:29:09'),
(24, 28, 222, '22', '2019-04-11 22:30:56'),
(25, 0, 10, '250', '2019-04-17 14:01:23'),
(26, 28, 55, '1375', '2019-04-17 14:20:32'),
(27, 28, 55, '1375', '2019-04-17 14:21:31'),
(28, 28, 61, '1525', '2019-04-17 14:22:42'),
(29, 0, 5, '25', '2019-04-20 16:32:19'),
(30, 0, 5, '25', '2019-04-20 16:32:19'),
(31, 0, 4, '16', '2019-04-20 16:40:42'),
(32, 0, 4, '16', '2019-04-20 16:40:42'),
(33, 2147483647, 24, '240', '2019-04-20 16:43:18'),
(34, 0, 24, '240', '2019-04-20 16:43:18'),
(35, 2060086463, 10, '200', '2019-04-20 16:48:48'),
(41, 2060086463, 40, '200', '2019-04-20 17:26:51'),
(42, 2060086463, 40, '200', '2019-04-20 17:33:15'),
(43, 2060086463, 40, '200', '2019-04-20 17:35:09'),
(44, 2060086463, 40, '200', '2019-04-20 17:36:19'),
(45, 2060086463, 40, '200', '2019-04-20 17:37:36'),
(46, 2060086463, 40, '200', '2019-04-20 17:38:10'),
(47, 2060086463, 40, '200', '2019-04-20 17:49:54'),
(48, 2060086463, 40, '200', '2019-04-20 18:04:04'),
(50, 2060086463, 10, '200', '2019-04-20 18:06:15'),
(51, 1986953121, 15, '150', '2019-04-20 18:07:28'),
(52, 1986953121, 5, '150', '2019-04-20 18:08:18'),
(53, 1986953121, 0, '150', '2019-04-20 18:09:32'),
(54, 1986953121, 2, '150', '2019-04-20 18:29:48'),
(55, 1986953121, 0, '150', '2019-04-20 18:30:43'),
(56, 1986953121, 0, '150', '2019-04-20 18:32:10'),
(57, 1986953121, 5, '50', '2019-04-20 18:35:31'),
(58, 1216004265, 25, '0', '2019-04-20 18:41:58'),
(59, 2147483647, 24, '0', '2019-04-20 18:45:25'),
(60, 2147483647, 20, '240', '2019-04-20 18:47:24'),
(61, 2147483647, 5, '60', '2019-04-20 18:48:07'),
(62, 2147483647, 80, '800', '2019-04-23 16:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminMail` varchar(255) NOT NULL,
  `adminPass` varchar(25) NOT NULL,
  `empId` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminMail`, `adminPass`, `empId`, `status`) VALUES
(1, 'admin', '123@gmail.com', '1234', 1, 1),
(2, 'sanjid', '1234@gmail.com', '1234', 2, 2),
(3, 'sum', '1232@gmail.com', '1234', 6, 2),
(4, 'nira', '345@gmail.com', '1234', 4, 3),
(5, 'decuk', 'decuk@gmail.com', '1234', 90, 3),
(6, 'noman', 'noman@gmail.com', '1234', 5, 2),
(7, 'fiz32', 'mustafizur@gmail.com', '1234', 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `id` int(11) NOT NULL,
  `branchName` varchar(35) NOT NULL,
  `branchAddress` text NOT NULL,
  `branchId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`id`, `branchName`, `branchAddress`, `branchId`) VALUES
(5, 'Dhanmondi', 'Dhanmondi 9/A, Dhaka-1209', 1),
(6, 'Banani', 'Banani road no. 1, Dhaka-1505', 4),
(7, 'abc', 'abc', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brandName` varchar(35) NOT NULL,
  `brandId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brandName`, `brandId`) VALUES
(1, 'Coca-Cola', 1),
(2, 'Bengal Meat', 2),
(3, 'Pran', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `pdName` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `inventId` int(11) NOT NULL,
  `sId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Meats'),
(2, 'Fish'),
(3, 'Fruits'),
(4, 'Groceries'),
(5, 'Drinks'),
(6, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `id` int(11) NOT NULL,
  `companyName` varchar(35) NOT NULL,
  `companySlogan` text NOT NULL,
  `companyOwner` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cmId` int(11) NOT NULL,
  `customName` varchar(35) NOT NULL,
  `customContact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cmId`, `customName`, `customContact`) VALUES
(1, 'Qais', '01714417750'),
(2, 'Deepro', '01687327184'),
(3, 'Shirin', '01552478132'),
(4, 'Summit', '017274959'),
(5, 'Summit', '0172946582'),
(6, 'Rony', '01776454750'),
(7, 'sgfgh', '9789890'),
(8, 'Dolereon', '01315568842'),
(9, 'ABK', '01831661534'),
(10, '01831661534', 'Summit'),
(11, 'kopa', '01675326595'),
(12, 'kkk', '01683182337');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `id` int(11) NOT NULL,
  `hiker` int(11) NOT NULL,
  `discount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`id`, `hiker`, `discount`) VALUES
(1, 2, 3),
(2, 4, 5),
(3, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `empName` varchar(50) NOT NULL,
  `empContact` varchar(14) NOT NULL,
  `empMail` varchar(125) NOT NULL,
  `empAddress` text NOT NULL,
  `empNID` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `empId` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `empName`, `empContact`, `empMail`, `empAddress`, `empNID`, `branchId`, `empId`, `position`) VALUES
(2, 'Sanjid', '1687327184', '1234@gmail.com', 'Dhanmondi 9/A, Dhaka-1209', 12344340, 1, 2, 1),
(3, 'Summit', '1792162650', 'summit.undead@gmail.com', 'Zigatola, Dhaka', 123456789, 4, 6, 1),
(4, 'Deepro', '1781166547', 'deepro@gmail.com', 'Dhanmondi, Dhaka', 645647, 1, 3, 2),
(5, 'Nira', '1574937394', 'nira@gmail.com', 'Banani, Dhaka', 2335436, 4, 4, 2),
(6, 'Admin', '100239583', '123@gmail.com', 'bhugichugi', 22143532, 0, 1, 0),
(7, 'noman', '01792792792', 'noman@gmail.com', 'bari nai', 2147483647, 4, 5, 2),
(8, 'mustafizur sir', '012121212112', 'mustafizur@gmail.com', 'abc', 2147483647, 32, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `id` int(11) NOT NULL,
  `pdName` varchar(50) NOT NULL,
  `subId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `suppId` int(11) NOT NULL,
  `branchId` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `totalPrice` decimal(10,2) NOT NULL,
  `ppu` decimal(10,2) NOT NULL,
  `bpu` decimal(10,2) NOT NULL,
  `availability` int(11) NOT NULL,
  `inventId` varchar(15) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`id`, `pdName`, `subId`, `catId`, `brandId`, `suppId`, `branchId`, `amount`, `totalPrice`, `ppu`, `bpu`, `availability`, `inventId`, `date`) VALUES
(1, 'Sprite can 250ml', 3, 5, 1, 1, 1, 130, '24.00', '30.00', '25.00', 26, '1', '2019-01-14 17:22:26'),
(3, 'Pran Flour 1kg', 2, 4, 3, 2, 4, 120, '75.00', '80.00', '70.00', 62, '2', '2019-01-14 17:22:26'),
(4, 'Coca Cola 1 litre', 3, 5, 1, 1, 1, 120, '45.00', '50.00', '45.00', 102, '4', '2019-01-14 17:22:26'),
(5, 'Bengal Meat 1kg', 3, 1, 2, 2, 4, 1040, '55000.00', '550.00', '510.00', 991, '7', '2019-01-14 17:22:26'),
(28, 'MILK', 3, 4, 3, 2, 4, 61, '1525.00', '30.00', '25.00', 40, '1462071466', '2019-04-17 14:01:23'),
(29, 'Some radom product', 4, 1, 3, 1, 4, 5, '25.00', '6.00', '5.00', 5, '1635210960', '2019-04-20 16:32:19'),
(30, 'Some other radom product', 4, 1, 3, 2, 4, 4, '16.00', '5.00', '4.00', 4, '5234042815', '2019-04-20 16:40:42'),
(31, 'pd3', 3, 5, 1, 1, 1, 24, '240.00', '12.00', '10.00', 24, '7754557434', '2019-04-20 16:43:18'),
(32, 'pd4', 3, 5, 1, 1, 1, 60, '200.00', '24.00', '20.00', 60, '2060086463', '2019-04-20 16:48:48'),
(33, 'pd5', 3, 5, 1, 1, 4, 27, '150.00', '13.00', '10.00', 2, '1986953121', '2019-04-20 18:07:26'),
(34, 'pd7', 3, 5, 3, 2, 1, 25, '250.00', '13.00', '10.00', 25, '1216004265', '2019-04-20 18:41:58'),
(35, 'pd8', 1, 5, 3, 2, 1, 24, '264.00', '13.00', '11.00', 24, '5728782339', '2019-04-20 18:45:25'),
(36, 'pd8', 3, 3, 2, 2, 4, 25, '240.00', '15.00', '12.00', 25, '3827953014', '2019-04-20 18:47:24'),
(37, 'new 10', 4, 1, 2, 2, 1, 80, '800.00', '15.00', '10.00', 80, '2651494704', '2019-04-23 16:23:29');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmId` int(11) NOT NULL,
  `inventId` int(11) NOT NULL,
  `pdName` varchar(125) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sId` text NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmId`, `inventId`, `pdName`, `quantity`, `price`, `sId`, `sale`, `date`) VALUES
(1, 1, 4, 'Coca Cola 1 litre', 4, 50, '55', 3, '2018-08-23 16:05:11'),
(2, 1, 1, 'Sprite can 250ml', 2, 30, '55', 3, '2018-08-23 16:05:11'),
(4, 3, 2, 'Pran Flour 1kg', 2, 80, '0', 7, '2018-08-24 06:30:40'),
(5, 2, 4, 'Coca Cola 1 litre', 3, 50, '0', 8, '2018-08-24 10:09:43'),
(6, 2, 1, 'Sprite can 250ml', 3, 30, '0', 8, '2018-08-24 10:09:44'),
(7, 2, 2, 'Pran Flour 1kg', 3, 80, '0', 9, '2018-08-24 10:18:54'),
(8, 2, 4, 'Coca Cola 1 litre', 2, 50, '0', 9, '2018-08-24 10:18:55'),
(9, 4, 2, 'Pran Flour 1kg', 1, 80, '0', 10, '2018-08-24 18:30:51'),
(10, 5, 2, 'Pran Flour 1kg', 1, 80, '0', 11, '2018-08-31 18:10:16'),
(11, 2, 4, 'Coca Cola 1 litre', 1, 50, '0', 12, '2018-08-31 18:30:13'),
(12, 5, 4, 'Coca Cola 1 litre', 1, 50, '0', 13, '2018-09-02 16:34:55'),
(13, 6, 1, 'Sprite can 250ml', 1, 30, '80vdv0qv64fu21hkle5jtemgl1', 14, '2019-01-09 22:04:02'),
(14, 6, 2, 'Pran Flour 1kg', 3, 80, '80vdv0qv64fu21hkle5jtemgl1', 14, '2019-01-09 22:04:02'),
(15, 4, 2, 'Pran Flour 1kg', 10, 80, 'dlbb25kf863bqndd2thv857263', 15, '2019-01-14 15:37:47'),
(16, 4, 1, 'Sprite can 250ml', 10, 30, 'dlbb25kf863bqndd2thv857263', 15, '2019-01-14 15:37:47'),
(17, 4, 7, 'Bengal Meat 1kg', 4, 550, 'dlbb25kf863bqndd2thv857263', 16, '2019-01-14 16:37:26'),
(18, 4, 4, 'Coca Cola 1 litre', 4, 50, 'dlbb25kf863bqndd2thv857263', 16, '2019-01-14 16:37:27'),
(19, 7, 4, 'Coca Cola 1 litre', 2, 50, 'dlbb25kf863bqndd2thv857263', 17, '2019-01-14 16:51:46'),
(20, 7, 2, 'Pran Flour 1kg', 3, 80, 'dlbb25kf863bqndd2thv857263', 17, '2019-01-14 16:51:46'),
(21, 8, 1, 'Sprite can 250ml', 1, 30, 's3947jr5dkq93kmb5mvmvqtee7', 18, '2019-01-18 17:39:20'),
(22, 2, 1, 'Sprite can 250ml', 4, 30, 's3947jr5dkq93kmb5mvmvqtee7', 18, '2019-01-18 19:05:57'),
(23, 2, 1, 'Sprite can 250ml', 4, 30, 'gescaef0s0dn23n620ts5m3mk1', 19, '2019-01-20 19:37:36'),
(24, 2, 2, 'Pran Flour 1kg', 4, 80, 'gescaef0s0dn23n620ts5m3mk1', 20, '2019-01-20 19:40:32'),
(25, 2, 1, 'Sprite can 250ml', 5, 30, 'gescaef0s0dn23n620ts5m3mk1', 20, '2019-01-20 19:40:32'),
(26, 1, 4, 'Coca Cola 1 litre', 6, 50, 'gescaef0s0dn23n620ts5m3mk1', 21, '2019-01-20 19:59:39'),
(30, 3, 2, 'Pran Flour 1kg', 4, 80, 'gescaef0s0dn23n620ts5m3mk1', 23, '2019-01-20 20:19:51'),
(31, 3, 1, 'Sprite can 250ml', 5, 30, 'gescaef0s0dn23n620ts5m3mk1', 23, '2019-01-20 20:19:51'),
(32, 9, 2147483647, 'TIger', 5, 30, 'mvlamh2s990fo3vssboc77p5kj', 24, '2019-03-05 11:05:59'),
(33, 10, 2, 'Pran Flour 1kg', 1, 80, 'k1hir4oejsl8h1qniscvh68ubk', 25, '2019-03-28 19:25:54'),
(34, 10, 7, 'Bengal Meat 1kg', 4, 550, 'k1hir4oejsl8h1qniscvh68ubk', 25, '2019-03-28 19:25:54'),
(35, 10, 1, 'Sprite can 250ml', 4, 30, 'k1hir4oejsl8h1qniscvh68ubk', 25, '2019-03-28 19:25:54'),
(36, 10, 2, 'Pran Flour 1kg', 3, 80, 'k1hir4oejsl8h1qniscvh68ubk', 26, '2019-03-28 19:43:44'),
(37, 10, 1, 'Sprite can 250ml', 2, 30, 'k1hir4oejsl8h1qniscvh68ubk', 27, '2019-03-28 19:55:37'),
(38, 10, 7, 'Bengal Meat 1kg', 5, 550, 'k1hir4oejsl8h1qniscvh68ubk', 28, '2019-03-28 20:00:00'),
(39, 10, 7, 'Bengal Meat 1kg', 1, 550, 'k1hir4oejsl8h1qniscvh68ubk', 29, '2019-03-28 20:10:02'),
(40, 10, 7, 'Bengal Meat 1kg', 1, 550, 'k1hir4oejsl8h1qniscvh68ubk', 30, '2019-03-28 20:12:47'),
(41, 11, 7, 'Bengal Meat 1kg', 5, 550, 'tq3conf8270e9upgefkcsogvk2', 31, '2019-04-13 08:02:28'),
(42, 11, 7, 'Bengal Meat 1kg', 1, 550, 'tq3conf8270e9upgefkcsogvk2', 32, '2019-04-13 11:14:01'),
(43, 11, 7, 'Bengal Meat 1kg', 1, 550, 'tq3conf8270e9upgefkcsogvk2', 46, '2019-04-13 11:26:49'),
(44, 11, 1, 'Sprite can 250ml', 0, 30, 'hbb88uudg98s2a6j9qbd5bor60', 47, '2019-04-15 18:15:50'),
(45, 11, 1, 'Sprite can 250ml', 1, 30, 'hbb88uudg98s2a6j9qbd5bor60', 48, '2019-04-15 18:17:57'),
(46, 11, 1, 'Sprite can 250ml', 15, 30, 'psc1in7l7umb0bubm6ll7349i5', 49, '2019-04-17 08:42:38'),
(47, 11, 2, 'Pran Flour 1kg', 25, 80, 'psc1in7l7umb0bubm6ll7349i5', 50, '2019-04-17 09:10:10'),
(48, 11, 1, 'Sprite can 250ml', 2, 30, 'psc1in7l7umb0bubm6ll7349i5', 51, '2019-04-17 09:11:17'),
(49, 11, 1, 'Sprite can 250ml', 15, 30, 'psc1in7l7umb0bubm6ll7349i5', 52, '2019-04-17 09:13:03'),
(50, 11, 7, 'Bengal Meat 1kg', 5, 550, 'p89nu0rhviiopoprpfkk7h8r41', 53, '2019-04-17 12:50:15'),
(51, 11, 1, 'Sprite can 250ml', 2, 30, 'p89nu0rhviiopoprpfkk7h8r41', 53, '2019-04-17 12:50:15'),
(52, 11, 7, 'Bengal Meat 1kg', 5, 550, 'p89nu0rhviiopoprpfkk7h8r41', 54, '2019-04-17 12:55:10'),
(53, 11, 7, 'Bengal Meat 1kg', 5, 550, 'p89nu0rhviiopoprpfkk7h8r41', 55, '2019-04-17 13:06:52'),
(54, 11, 1462071466, 'MILK', 5, 30, 'fn3u5h8cktam1iir8fsm5nc114', 56, '2019-04-17 14:04:04'),
(55, 11, 1462071466, 'MILK', 5, 30, 'his917pgl0gf4i255ae7hlfhd1', 57, '2019-04-17 16:54:06'),
(56, 11, 7, 'Bengal Meat 1kg', 5, 550, 'his917pgl0gf4i255ae7hlfhd1', 58, '2019-04-17 21:33:44'),
(57, 11, 1462071466, 'MILK', 5, 30, 'his917pgl0gf4i255ae7hlfhd1', 59, '2019-04-17 21:35:16'),
(58, 11, 34059524, 'dd', 33, 33, 'his917pgl0gf4i255ae7hlfhd1', 60, '2019-04-17 21:36:58'),
(59, 11, 34059524, 'dd', 33, 33, 'his917pgl0gf4i255ae7hlfhd1', 61, '2019-04-17 21:38:08'),
(60, 11, 2, 'Pran Flour 1kg', 5, 80, 'his917pgl0gf4i255ae7hlfhd1', 62, '2019-04-17 21:41:06'),
(61, 11, 1462071466, 'MILK', 3, 30, 'qce31va336otc8mq034k2e33c3', 63, '2019-04-18 18:42:48'),
(62, 11, 1462071466, 'MILK', 5, 30, 'qce31va336otc8mq034k2e33c3', 64, '2019-04-18 23:55:01'),
(63, 11, 7, 'Bengal Meat 1kg', 5, 550, 'qce31va336otc8mq034k2e33c3', 65, '2019-04-19 00:23:48'),
(64, 11, 1462071466, 'MILK', 5, 30, 'qce31va336otc8mq034k2e33c3', 66, '2019-04-19 00:30:21'),
(65, 11, 7, 'Bengal Meat 1kg', 5, 550, 'qce31va336otc8mq034k2e33c3', 66, '2019-04-19 00:30:21'),
(66, 11, 1462071466, 'MILK', 3, 30, 'nj79squpsa2juhkem41bcqgpt7', 67, '2019-04-19 20:02:30'),
(67, 11, 1986953121, 'pd5', 25, 13, 'aucbcfi1ao859l0l0klk6jddd5', 68, '2019-04-20 18:36:50'),
(68, 11, 7, 'Bengal Meat 1kg', 5, 550, 'ttbokplqaaqdvql58anfo148b4', 69, '2019-04-23 16:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `payment` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `payment`) VALUES
(1, 'Due'),
(2, 'Cash'),
(3, 'Bkash'),
(4, 'Cleared Dues with Bkash'),
(5, 'Cleared Dues With Cash');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `totalPrice` decimal(20,2) NOT NULL,
  `sale` int(11) NOT NULL,
  `cmId` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`id`, `payment`, `amount`, `totalPrice`, `sale`, `cmId`, `date`) VALUES
(1, 2, '160.00', '260.00', 3, 1, '2018-08-23 17:52:17'),
(2, 3, '100.00', '260.00', 3, 1, '2018-08-23 17:58:04'),
(5, 2, '60.00', '160.00', 7, 3, '2018-08-24 06:34:42'),
(6, 3, '100.00', '160.00', 7, 3, '2018-08-24 06:34:57'),
(7, 2, '200.00', '240.00', 8, 2, '2018-08-24 10:10:01'),
(8, 1, '40.00', '240.00', 8, 2, '2018-08-24 10:10:05'),
(9, 1, '40.00', '340.00', 9, 2, '2018-08-24 10:19:06'),
(10, 2, '200.00', '340.00', 9, 2, '2018-08-24 10:19:18'),
(11, 3, '100.00', '340.00', 9, 2, '2018-08-24 10:19:27'),
(12, 2, '50.00', '80.00', 10, 4, '2018-08-24 18:31:05'),
(13, 3, '30.00', '80.00', 10, 4, '2018-08-24 18:31:16'),
(14, 2, '50.00', '80.00', 11, 5, '2018-08-31 18:10:37'),
(15, 3, '30.00', '80.00', 11, 5, '2018-08-31 18:10:52'),
(16, 2, '50.00', '50.00', 12, 2, '2018-08-31 19:24:44'),
(17, 2, '50.00', '50.00', 13, 5, '2018-09-02 16:35:06'),
(18, 3, '200.00', '270.00', 14, 6, '2019-01-09 22:04:18'),
(19, 1, '70.00', '270.00', 14, 6, '2019-01-09 22:04:28'),
(20, 2, '40.00', '270.00', 14, 6, '2019-01-09 22:34:09'),
(21, 2, '750.00', '1100.00', 15, 4, '2019-01-14 15:37:57'),
(22, 3, '200.00', '1100.00', 15, 4, '2019-01-14 15:38:14'),
(23, 1, '150.00', '1100.00', 15, 4, '2019-01-14 15:38:25'),
(24, 2, '50.00', '1100.00', 15, 4, '2019-01-14 15:50:33'),
(25, 2, '25.00', '1100.00', 15, 4, '2019-01-14 16:07:52'),
(26, 3, '25.00', '1100.00', 15, 4, '2019-01-14 16:21:20'),
(27, 3, '30.00', '270.00', 14, 6, '2019-01-14 16:27:21'),
(28, 2, '1000.00', '2400.00', 16, 4, '2019-01-14 16:37:42'),
(29, 3, '800.00', '2400.00', 16, 4, '2019-01-14 16:37:48'),
(30, 1, '600.00', '2400.00', 16, 4, '2019-01-14 16:37:57'),
(31, 2, '300.00', '2400.00', 16, 4, '2019-01-14 16:47:53'),
(32, 2, '200.00', '340.00', 17, 7, '2019-01-14 16:51:55'),
(33, 1, '140.00', '340.00', 17, 7, '2019-01-14 16:52:03'),
(34, 2, '100.00', '340.00', 17, 7, '2019-01-14 16:52:19'),
(35, 3, '40.00', '340.00', 17, 7, '2019-01-14 16:52:29'),
(36, 2, '100.00', '118.00', 18, 2, '2019-01-18 20:49:30'),
(37, 3, '18.00', '118.00', 18, 2, '2019-01-18 20:49:39'),
(38, 2, '100.00', '118.00', 19, 2, '2019-01-20 19:37:43'),
(39, 3, '10.00', '118.00', 19, 2, '2019-01-20 19:38:07'),
(40, 1, '8.00', '118.00', 19, 2, '2019-01-20 19:38:21'),
(41, 2, '4.00', '118.00', 19, 2, '2019-01-20 19:39:00'),
(42, 2, '200.00', '461.00', 20, 2, '2019-01-20 19:40:39'),
(43, 3, '100.00', '461.00', 20, 2, '2019-01-20 19:40:46'),
(44, 1, '161.00', '461.00', 20, 2, '2019-01-20 19:41:00'),
(45, 1, '61.00', '461.00', 20, 2, '2019-01-20 19:41:22'),
(46, 3, '100.00', '461.00', 20, 2, '2019-01-20 19:41:34'),
(47, 2, '200.00', '309.00', 21, 1, '2019-01-20 19:59:51'),
(48, 1, '109.00', '309.00', 21, 1, '2019-01-20 20:00:07'),
(49, 2, '60.00', '309.00', 21, 1, '2019-01-20 20:00:58'),
(50, 3, '20.00', '309.00', 21, 1, '2019-01-20 20:01:23'),
(52, 2, '200.00', '485.00', 23, 3, '2019-01-20 20:20:02'),
(53, 3, '200.00', '485.00', 23, 3, '2019-01-20 20:20:08'),
(54, 1, '85.00', '485.00', 23, 3, '2019-01-20 20:20:16'),
(55, 3, '20.00', '485.00', 23, 3, '2019-01-20 20:23:04'),
(56, 2, '25.00', '485.00', 23, 3, '2019-01-20 20:23:16'),
(57, 3, '15.00', '485.00', 23, 3, '2019-01-20 20:23:27'),
(58, 2, '25.00', '485.00', 23, 3, '2019-01-20 20:23:44'),
(59, 2, '158.00', '158.00', 24, 9, '2019-03-05 11:06:09'),
(60, 2, '500.00', '2520.00', 25, 10, '2019-03-28 19:26:05'),
(61, 3, '600.00', '2520.00', 25, 10, '2019-03-28 19:26:19'),
(62, 1, '1420.00', '2520.00', 25, 10, '2019-03-28 19:26:39'),
(63, 2, '200.00', '244.00', 26, 10, '2019-03-28 19:43:55'),
(64, 1, '44.00', '244.00', 26, 10, '2019-03-28 19:43:59'),
(65, 1, '44.00', '244.00', 26, 10, '2019-03-28 19:45:43'),
(66, 1, '-44.00', '244.00', 26, 10, '2019-03-28 19:45:54'),
(67, 1, '61.00', '61.00', 27, 10, '2019-03-28 19:55:43'),
(68, 2, '2000.00', '2744.00', 28, 10, '2019-03-28 20:00:09'),
(69, 1, '744.00', '2744.00', 28, 10, '2019-03-28 20:00:14'),
(70, 1, '549.00', '549.00', 29, 10, '2019-03-28 20:10:10'),
(71, 1, '400.00', '549.00', 30, 10, '2019-03-28 20:12:54'),
(72, 2, '149.00', '549.00', 30, 10, '2019-03-28 20:13:02'),
(73, 2, '2500.00', '2833.00', 31, 11, '2019-04-13 08:04:34'),
(74, 1, '333.00', '2833.00', 31, 11, '2019-04-13 08:04:41'),
(75, 2, '500.00', '567.00', 36, 11, '2019-04-13 11:22:32'),
(76, 1, '67.00', '567.00', 37, 11, '2019-04-13 11:22:52'),
(77, 3, '500.00', '567.00', 38, 11, '2019-04-13 11:23:10'),
(78, 2, '67.00', '567.00', 39, 11, '2019-04-13 11:23:24'),
(79, 2, '67.00', '567.00', 40, 11, '2019-04-13 11:24:06'),
(80, 2, '500.00', '567.00', 41, 11, '2019-04-13 11:24:16'),
(81, 1, '67.00', '567.00', 42, 11, '2019-04-13 11:24:25'),
(82, 1, '400.00', '567.00', 46, 11, '2019-04-13 11:26:57'),
(83, 2, '167.00', '567.00', 46, 11, '2019-04-13 11:27:04'),
(84, 2, '20.00', '30.00', 48, 11, '2019-04-15 18:18:09'),
(85, 1, '10.00', '30.00', 48, 11, '2019-04-15 18:18:19'),
(86, 2, '10.00', '30.00', 48, 11, '2019-04-15 18:19:06'),
(87, 2, '200.00', '441.00', 49, 11, '2019-04-17 08:42:50'),
(88, 3, '200.00', '441.00', 49, 11, '2019-04-17 08:42:59'),
(89, 1, '41.00', '441.00', 49, 11, '2019-04-17 08:43:07'),
(90, 1, '500.00', '1957.00', 50, 11, '2019-04-17 09:10:20'),
(91, 2, '600.00', '1957.00', 50, 11, '2019-04-17 09:10:31'),
(92, 3, '857.00', '1957.00', 50, 11, '2019-04-17 09:10:38'),
(93, 2, '59.00', '59.00', 51, 11, '2019-04-17 09:11:25'),
(94, 1, '200.00', '427.00', 52, 11, '2019-04-17 09:13:11'),
(95, 2, '227.00', '427.00', 52, 11, '2019-04-17 09:13:18'),
(96, 2, '2500.00', '2663.00', 53, 11, '2019-04-17 12:50:22'),
(97, 1, '163.00', '2663.00', 53, 11, '2019-04-17 12:50:27'),
(98, 2, '2500.00', '2606.00', 54, 11, '2019-04-17 12:55:19'),
(99, 1, '106.00', '2606.00', 54, 11, '2019-04-17 12:55:26'),
(100, 2, '2000.00', '2606.00', 55, 11, '2019-04-17 13:07:08'),
(101, 3, '606.00', '2606.00', 55, 11, '2019-04-17 13:08:03'),
(102, 2, '143.00', '143.00', 56, 11, '2019-04-17 14:04:13'),
(103, 2, '143.00', '143.00', 57, 11, '2019-04-17 16:54:14'),
(104, 2, '2500.00', '2606.00', 58, 11, '2019-04-17 21:33:54'),
(105, 1, '106.00', '2606.00', 58, 11, '2019-04-17 21:33:59'),
(106, 2, '143.00', '143.00', 59, 11, '2019-04-17 21:35:23'),
(107, 2, '1032.00', '1032.00', 60, 11, '2019-04-17 21:37:07'),
(108, 2, '1032.00', '1032.00', 61, 11, '2019-04-17 21:38:15'),
(109, 2, '379.00', '379.00', 62, 11, '2019-04-17 21:41:14'),
(110, 4, '1420.00', '2520.00', 25, 10, '2019-04-18 12:25:23'),
(111, 2, '86.00', '86.00', 63, 11, '2019-04-18 18:42:59'),
(112, 4, '500.00', '1957.00', 50, 11, '2019-04-18 19:44:30'),
(113, 3, '143.00', '143.00', 64, 11, '2019-04-18 23:55:25'),
(114, 2, '2606.00', '2606.00', 65, 11, '2019-04-19 00:23:59'),
(115, 2, '2749.00', '2749.00', 66, 11, '2019-04-19 00:30:35'),
(116, 2, '86.00', '86.00', 67, 11, '2019-04-19 20:02:36'),
(117, 2, '314.00', '314.00', 68, 11, '2019-04-20 18:36:59'),
(118, 2, '2000.00', '2657.00', 69, 11, '2019-04-23 16:08:17'),
(119, 1, '657.00', '2657.00', 69, 11, '2019-04-23 16:08:26'),
(120, 4, '657.00', '2657.00', 69, 11, '2019-04-23 16:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rem` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `customer`, `totalPrice`, `date`, `rem`, `status`) VALUES
(3, 1, 260, '2018-08-23 16:05:11', 0, 1),
(7, 3, 160, '2018-08-24 06:30:40', 0, 1),
(8, 2, 240, '2018-08-24 10:09:44', 0, 1),
(9, 2, 340, '2018-08-24 10:18:55', 0, 1),
(10, 4, 80, '2018-08-24 18:30:51', 0, 1),
(11, 5, 80, '2018-08-31 18:10:15', 0, 1),
(12, 2, 50, '2018-08-31 18:30:13', 0, 1),
(13, 5, 50, '2018-09-02 16:34:55', 0, 1),
(14, 6, 270, '2019-01-09 22:04:02', -30, 1),
(15, 4, 1100, '2019-01-14 15:37:47', -25, 1),
(16, 4, 2400, '2019-01-14 16:37:26', 0, 1),
(17, 7, 340, '2019-01-14 16:51:45', -40, 1),
(18, 2, 118, '2019-01-18 19:05:57', 0, 1),
(19, 2, 118, '2019-01-20 19:37:36', 0, 1),
(20, 2, 461, '2019-01-20 19:40:32', -39, 1),
(21, 1, 309, '2019-01-20 19:59:39', 9, 1),
(23, 3, 485, '2019-01-20 20:19:51', 0, 1),
(24, 9, 158, '2019-03-05 11:05:59', 0, 1),
(25, 10, 2520, '2019-03-28 19:25:54', 0, 1),
(26, 10, 244, '2019-03-28 19:43:44', 44, 1),
(27, 10, 61, '2019-03-28 19:55:37', 61, 1),
(28, 10, 2744, '2019-03-28 20:00:00', 744, 1),
(29, 10, 549, '2019-03-28 20:10:02', 549, 1),
(30, 10, 549, '2019-03-28 20:12:47', 400, 1),
(31, 11, 2833, '2019-04-13 08:02:28', 333, 1),
(32, 11, 567, '2019-04-13 11:14:01', 0, 0),
(33, 11, 567, '2019-04-13 11:21:42', 0, 0),
(34, 11, 567, '2019-04-13 11:21:51', 0, 0),
(35, 11, 567, '2019-04-13 11:22:26', 0, 0),
(36, 11, 567, '2019-04-13 11:22:32', 0, 0),
(37, 11, 567, '2019-04-13 11:22:52', 0, 0),
(38, 11, 567, '2019-04-13 11:23:10', 0, 0),
(39, 11, 567, '2019-04-13 11:23:22', 0, 0),
(40, 11, 567, '2019-04-13 11:24:06', 0, 0),
(41, 11, 567, '2019-04-13 11:24:16', 0, 0),
(42, 11, 567, '2019-04-13 11:24:25', 0, 0),
(43, 11, 567, '2019-04-13 11:24:41', 0, 0),
(44, 11, 567, '2019-04-13 11:25:35', 0, 0),
(45, 11, 567, '2019-04-13 11:25:43', 0, 0),
(46, 11, 567, '2019-04-13 11:26:49', 400, 1),
(47, 11, 0, '2019-04-15 18:15:50', 0, 1),
(48, 11, 30, '2019-04-15 18:17:57', 0, 1),
(49, 11, 441, '2019-04-17 08:42:38', 41, 1),
(50, 11, 1957, '2019-04-17 09:10:10', 0, 1),
(51, 11, 59, '2019-04-17 09:11:17', 0, 1),
(52, 11, 427, '2019-04-17 09:13:03', 200, 1),
(53, 11, 2663, '2019-04-17 12:50:14', 163, 1),
(54, 11, 2606, '2019-04-17 12:55:10', 106, 1),
(55, 11, 2606, '2019-04-17 13:06:52', 0, 1),
(56, 11, 143, '2019-04-17 14:04:04', 0, 1),
(57, 11, 143, '2019-04-17 16:54:06', 0, 1),
(58, 11, 2606, '2019-04-17 21:33:44', 106, 1),
(59, 11, 143, '2019-04-17 21:35:16', 0, 1),
(60, 11, 1032, '2019-04-17 21:36:58', 0, 1),
(61, 11, 1032, '2019-04-17 21:38:08', 0, 1),
(62, 11, 379, '2019-04-17 21:41:05', 0, 1),
(63, 11, 86, '2019-04-18 18:42:48', 0, 1),
(64, 11, 143, '2019-04-18 23:55:01', 0, 1),
(65, 11, 2606, '2019-04-19 00:23:48', 0, 1),
(66, 11, 2749, '2019-04-19 00:30:21', 0, 1),
(67, 11, 86, '2019-04-19 20:02:30', 0, 1),
(68, 11, 314, '2019-04-20 18:36:50', 0, 1),
(69, 11, 2657, '2019-04-23 16:08:05', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stat`
--

CREATE TABLE `tbl_stat` (
  `id` int(11) NOT NULL,
  `status` varchar(124) NOT NULL,
  `statId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_stat`
--

INSERT INTO `tbl_stat` (`id`, `status`, `statId`) VALUES
(1, 'Manager', 2),
(2, 'Employee', 3),
(3, 'CEO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcat`
--

CREATE TABLE `tbl_subcat` (
  `subId` int(11) NOT NULL,
  `subName` varchar(35) NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_subcat`
--

INSERT INTO `tbl_subcat` (`subId`, `subName`, `catId`) VALUES
(1, 'Soft Drinks', 6),
(2, 'Flour', 4),
(3, 'Soft Beverages', 5),
(4, 'Cook', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `suppId` int(11) NOT NULL,
  `suppName` varchar(35) NOT NULL,
  `suppAss` varchar(50) NOT NULL,
  `suppContact` int(11) NOT NULL,
  `suppMail` varchar(125) NOT NULL,
  `suppAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`suppId`, `suppName`, `suppAss`, `suppContact`, `suppMail`, `suppAddress`) VALUES
(1, 'Coca-cola co.', 'James', 1743895837, '1234@gmail.com', 'ache kothao'),
(2, 'Pran', 'Mehreen', 1743895837, '1345@gmail.com', 'ache kothao');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vat`
--

CREATE TABLE `tbl_vat` (
  `id` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `catId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

--
-- Dumping data for table `tbl_vat`
--

INSERT INTO `tbl_vat` (`id`, `vat`, `catId`) VALUES
(1, 5, 5),
(2, 3, 1),
(3, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buy_history`
--
ALTER TABLE `buy_history`
  ADD PRIMARY KEY (`bh_id`) USING BTREE;

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`) USING BTREE;

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`) USING BTREE;

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cmId`) USING BTREE;

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_stat`
--
ALTER TABLE `tbl_stat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  ADD PRIMARY KEY (`subId`) USING BTREE;

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`suppId`) USING BTREE;

--
-- Indexes for table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buy_history`
--
ALTER TABLE `buy_history`
  MODIFY `bh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cmId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `tbl_stat`
--
ALTER TABLE `tbl_stat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_subcat`
--
ALTER TABLE `tbl_subcat`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `suppId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_vat`
--
ALTER TABLE `tbl_vat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
