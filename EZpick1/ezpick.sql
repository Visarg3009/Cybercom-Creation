-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 08:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezpick`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_Id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `userName`, `email`, `password`, `status`, `created_Date`) VALUES
(16, 'Visarg', 'visarg@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `name` varchar(64) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(64) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(7, 'product', 'color', 'color', 'select', 'varchar', 1, ''),
(8, 'product', 'brand', 'brand', 'select', 'varchar', 2, ''),
(10, 'product', 'size', 'size', 'text', 'varchar', 3, ''),
(15, 'product', 'weight', 'weight', 'text', 'int', 6, ''),
(16, 'product', 'new', 'new', 'select', 'int', 6, '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(14, 'blue', 7, 2),
(15, 'red', 7, 1),
(16, 'Nike', 8, 2),
(17, 'Adidas', 8, 1),
(23, 'blue', 16, 1),
(24, 'cotton', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `customer_Id` int(11) DEFAULT NULL,
  `sessionId` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shipmentMethodId` int(11) NOT NULL,
  `shippingAmount` int(11) NOT NULL,
  `created_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `customer_Id`, `sessionId`, `total`, `discount`, `paymentMethodId`, `shipmentMethodId`, `shippingAmount`, `created_Date`) VALUES
(1, NULL, 'a76qgn73nsgb8s1g7r5e65jvfc', 0, 0, 0, 0, 0, '2021-03-30 20:04:28'),
(2, 56, 'a76qgn73nsgb8s1g7r5e65jvfc', 990, 0, 0, 0, 0, '2021-03-30 21:39:23'),
(4, 58, 'smt8ha00oml77lh2ah2ldmhb6b', 480, 0, 0, 0, 480, '2021-04-02 12:52:31'),
(24, 0, 'i1bh1mao3f6k9sm7alse6hna8q', 0, 0, 0, 0, 0, '2021-04-04 22:09:03'),
(35, 57, '6qignlvcvdf6f0p86eva1ttrl5', 0, 0, 0, 0, 0, '2021-04-05 19:15:49');

-- --------------------------------------------------------

--
-- Table structure for table `cart_address`
--

CREATE TABLE `cart_address` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `addressType` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `sameAsBilling` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_address`
--

INSERT INTO `cart_address` (`cartAddressId`, `cartId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipcode`, `sameAsBilling`) VALUES
(1, 2, 1, 'billing', '202-vandematram11', 'ahmedabad', 'Gujarat', 'India', '52552', 1),
(79, 2, 1, 'billing', '202-vandematram11', 'ahmedabad', 'Gujarat', 'India', '52552', 1),
(80, 2, 2, 'shipping', '202-vandematram11', 'dsf', 'Gujarat', 'India', '5435', 1),
(146, 35, 3, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', '52552', 1),
(147, 35, 4, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', '52552', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `basePrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `created_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartItemId`, `cartId`, `productId`, `basePrice`, `quantity`, `price`, `discount`, `created_Date`) VALUES
(7, 2, 118, 250, 2, 0, 10, '2021-03-31 06:37:10'),
(8, 2, 119, 180, 3, 0, 10, '2021-03-31 07:32:00'),
(12, 4, 118, 250, 2, 0, 10, '2021-04-02 12:52:31'),
(40, 24, 121, 250, 3, 250, 10, '2021-04-04 22:09:03'),
(41, 24, 118, 250, 1, 250, 10, '2021-04-04 23:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_Id` int(11) NOT NULL,
  `parent_Id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_Id`, `parent_Id`, `name`, `path`, `status`, `description`) VALUES
(54, 0, 'Food', '54', 1, 'Food'),
(55, 0, 'Cuilinary Art', '55', 1, 'Cuilinary Arts'),
(56, 54, 'Street Foods', '54=56', 1, 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `category_media`
--

CREATE TABLE `category_media` (
  `image_Id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `small` tinyint(4) DEFAULT NULL,
  `thumb` tinyint(4) DEFAULT NULL,
  `base` tinyint(4) DEFAULT NULL,
  `gallery` tinyint(4) DEFAULT NULL,
  `category_Id` int(11) DEFAULT NULL COMMENT 'Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_media`
--

INSERT INTO `category_media` (`image_Id`, `image_name`, `small`, `thumb`, `base`, `gallery`, `category_Id`) VALUES
(2, 'kari.png', NULL, NULL, NULL, NULL, 54),
(3, 'cuilinary.png', NULL, NULL, NULL, NULL, 55);

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `page_Id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `identifier` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`page_Id`, `title`, `identifier`, `content`, `status`, `created_Date`) VALUES
(1, 'About Us', 1, '<p><strong>About Us</strong></p>\n', 1, '2021-03-15 06:16:38'),
(30, 'vvvv', 0, '<p>sss</p>\n', 0, '2021-04-01 15:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `configId` int(11) NOT NULL,
  `groupId` int(11) DEFAULT NULL COMMENT 'Foreign Key',
  `title` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`configId`, `groupId`, `title`, `code`, `value`, `created_Date`) VALUES
(4, 2, 'dd', 'dd', 'ssssff', '2021-04-05 09:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `config_group`
--

CREATE TABLE `config_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `config_group`
--

INSERT INTO `config_group` (`groupId`, `name`, `created_Date`) VALUES
(2, 'new1', '2021-04-05 09:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_Id` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_Date` varchar(100) NOT NULL,
  `updated_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_Id`, `customerName`, `email`, `mobile`, `password`, `status`, `created_Date`, `updated_Date`) VALUES
(56, 'mark Joy', 'mark@mark.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', 1, '', ''),
(57, 'jane jane', 'jane@jane.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', 1, '', ''),
(58, 'person', 'person@gmail.com', 0, '81dc9bdb52d04dc20036dbd8313ed055', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `addressId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `country` varchar(100) NOT NULL,
  `addressType` varchar(100) NOT NULL,
  `customer_Id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`addressId`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`, `customer_Id`) VALUES
(1, '202-vandematram11', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 56),
(2, '202-vandematram11', 'dsf', 'Gujarat', '5435', 'India', 'shipping', 56),
(3, '404-vandematram11', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 57),
(4, '404-vandematram11', 'ahmedabad', 'Gujarat', '52552', 'India', 'shipping', 57);

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `Group_ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1,
  `Created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`Group_ID`, `Name`, `Status`, `Created_Date`) VALUES
(2, 'WholeSale', 1, '2021-03-03 06:29:44'),
(3, 'Retail', 1, '2021-03-03 06:30:42'),
(8, 'group3', 1, '2021-03-25 19:53:23'),
(9, 'group4', 1, '2021-03-25 19:53:30');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `customerName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `paymentMethodName` varchar(255) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingMethodName` varchar(255) NOT NULL,
  `shippingMethodCode` varchar(11) NOT NULL,
  `shippingCharges` decimal(10,2) NOT NULL,
  `shippingAmount` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `cartId`, `customer_Id`, `customerName`, `email`, `mobile`, `paymentMethodId`, `paymentMethodName`, `shippingMethodId`, `shippingMethodName`, `shippingMethodCode`, `shippingCharges`, `shippingAmount`, `status`) VALUES
(6, 7, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 5, 'Express Service', 'EXPDEL', '50.00', '940.00', 1),
(7, 8, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 6, 'Regular Delivery(Within a week)', 'NOR21', '0.00', '240.00', 1),
(8, 9, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(9, 10, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 6, 'Regular Delivery(Within a week)', 'NOR21', '0.00', '240.00', 1),
(10, 11, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(11, 12, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(12, 13, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 5, 'Express Service', 'EXPDEL', '50.00', '290.00', 1),
(13, 14, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 6, 'Regular Delivery(Within a week)', 'NOR21', '0.00', '240.00', 1),
(14, 15, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(15, 16, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 0, '', '', '0.00', '240.00', 1),
(16, 17, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(17, 18, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(18, 19, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(19, 20, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 5, 'Express Service', 'EXPDEL', '50.00', '290.00', 1),
(20, 21, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(21, 22, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(22, 23, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '440.00', 1),
(23, 25, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '820.00', 1),
(24, 26, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '750.00', 1),
(25, 27, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '270.00', 1),
(26, 28, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '270.00', 1),
(27, 29, 57, 'jane jane', 'jane@jane.com', 0, 0, '', 7, 'In One day', 'ONE21', '100.00', '270.00', 1),
(28, 30, 57, 'jane jane', 'jane@jane.com', 0, 0, '', 0, '', '', '0.00', '170.00', 1),
(29, 31, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(30, 32, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '340.00', 1),
(31, 33, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 7, 'In One day', 'ONE21', '100.00', '580.00', 1),
(32, 34, 57, 'jane jane', 'jane@jane.com', 0, 11, 'COD', 5, 'Express Service', 'EXPDEL', '50.00', '290.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `orderAddressId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `addressId` int(11) NOT NULL,
  `addressType` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`orderAddressId`, `orderId`, `addressId`, `addressType`, `address`, `city`, `state`, `country`, `zipcode`) VALUES
(9, 6, 92, 'billing', '404-vandematram113', 'ahmedabad', 'Gujarat', 'India', 52552),
(10, 6, 93, 'shipping', '404-vandematram113', 'ahmedabad', 'Gujarat', 'India', 52552),
(11, 7, 94, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(12, 7, 95, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(13, 8, 96, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(14, 8, 97, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(15, 9, 98, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(16, 9, 99, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(17, 10, 100, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(18, 10, 101, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(19, 11, 102, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(20, 11, 103, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(21, 12, 104, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(22, 12, 105, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(23, 13, 106, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(24, 13, 107, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(25, 14, 108, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(26, 14, 109, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(27, 15, 110, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(28, 15, 111, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(29, 16, 112, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(30, 16, 113, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(31, 17, 114, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(32, 17, 115, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(33, 18, 116, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(34, 18, 117, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(35, 19, 118, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(36, 19, 119, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(37, 20, 120, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(38, 20, 121, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(39, 21, 122, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(40, 21, 123, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(41, 22, 124, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(42, 22, 125, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(43, 23, 126, 'billing', '404-vandematram113', 'ahmedabad', 'Gujarat', 'India', 52552),
(44, 23, 127, 'shipping', '404-vandematram113', 'ahmedabad', 'Gujarat', 'India', 52552),
(45, 24, 128, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(46, 24, 129, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(47, 25, 130, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(48, 25, 131, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(49, 26, 132, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(50, 26, 133, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(51, 27, 134, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(52, 27, 135, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(53, 28, 136, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(54, 28, 137, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(55, 29, 138, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(56, 29, 139, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(57, 30, 140, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(58, 30, 141, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(59, 31, 142, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(60, 31, 143, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(61, 32, 144, 'billing', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552),
(62, 32, 145, 'shipping', '404-vandematram11', 'ahmedabad', 'Gujarat', 'India', 52552);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `orderItemId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `basePrice` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `Total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`orderItemId`, `orderId`, `productId`, `sku`, `name`, `basePrice`, `quantity`, `price`, `discount`, `Total`) VALUES
(13, 6, 118, 'P01', 'Chole-Kulche', '250.00', 3, '750.00', 30, 720),
(14, 6, 119, 'P02', 'Pav-bhaji', '180.00', 1, '180.00', 10, 170),
(15, 7, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(16, 8, 121, 'P04', 'product-1', '250.00', 1, '250.00', 10, 240),
(17, 9, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(18, 10, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(19, 11, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(20, 12, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(21, 13, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(22, 14, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(23, 15, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(24, 16, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(25, 17, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(26, 18, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(27, 19, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(28, 20, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(29, 21, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(30, 22, 119, 'P02', 'Pav-bhaji', '180.00', 2, '360.00', 20, 340),
(31, 23, 118, 'P01', 'Chole-Kulche', '250.00', 3, '750.00', 30, 720),
(32, 24, 119, 'P02', 'Pav-bhaji', '180.00', 1, '180.00', 10, 170),
(33, 24, 118, 'P01', 'Chole-Kulche', '250.00', 2, '500.00', 20, 480),
(34, 25, 119, 'P02', 'Pav-bhaji', '180.00', 1, '180.00', 10, 170),
(35, 26, 119, 'P02', 'Pav-bhaji', '180.00', 1, '180.00', 10, 170),
(36, 27, 119, 'P02', 'Pav-bhaji', '180.00', 1, '180.00', 10, 170),
(37, 28, 119, 'P02', 'Pav-bhaji', '180.00', 1, '180.00', 10, 170),
(38, 29, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(39, 30, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240),
(40, 31, 118, 'P01', 'Chole-Kulche', '250.00', 2, '500.00', 20, 480),
(41, 32, 118, 'P01', 'Chole-Kulche', '250.00', 1, '250.00', 10, 240);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `method_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `Created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`method_Id`, `name`, `code`, `description`, `status`, `Created_Date`) VALUES
(11, 'COD', 'COD01', 'Cash On Delivery', 1, '2021-04-01 08:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_Id` int(11) NOT NULL,
  `sellerId` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_Date` varchar(100) NOT NULL,
  `updated_Date` varchar(100) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `weight` int(45) DEFAULT NULL,
  `new` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `category_Id`, `sellerId`, `status`, `created_Date`, `updated_Date`, `color`, `brand`, `size`, `weight`, `new`) VALUES
(118, 'P01', 'Chole-Kulche', 250, 10, 11, 'foods', 56, 1, 1, '2021-03-30 08:11:19', '', NULL, NULL, NULL, NULL, NULL),
(119, 'P02', 'Pav-bhaji', 180, 10, 20, 'foods', 56, 1, 1, '2021-03-30 08:12:57', '', NULL, NULL, NULL, NULL, NULL),
(120, 'P03', 'Chole-bhat', 200, 10, 1, 'food', 56, 3, 1, '2021-03-30 08:14:08', '', NULL, NULL, NULL, NULL, NULL),
(121, 'P04', 'product-1', 250, 10, 20, 'food', 54, 3, 1, '2021-03-30 08:15:40', '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL COMMENT 'Foreign Key',
  `categoryIds` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `image_Id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `small` tinyint(4) DEFAULT NULL,
  `thumb` tinyint(4) DEFAULT NULL,
  `base` tinyint(4) DEFAULT NULL,
  `gallery` tinyint(4) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`image_Id`, `image_name`, `small`, `thumb`, `base`, `gallery`, `product_id`) VALUES
(77, 'chole-kulche.png', NULL, NULL, NULL, NULL, 118),
(78, 'pav- bhaji.png', NULL, NULL, NULL, NULL, 119),
(79, 'chole-bhat.png', NULL, NULL, NULL, NULL, 120),
(80, '5.png', NULL, NULL, NULL, NULL, 121);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sellerId` int(11) NOT NULL,
  `sellerName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_Date` varchar(255) NOT NULL,
  `updated_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sellerId`, `sellerName`, `email`, `password`, `status`, `created_Date`, `updated_Date`) VALUES
(1, 'Mark', 'mark@gmail.com', '81b073de9370ea873f548e31b8adc081', 1, '', ''),
(2, 'bravo', 'bravo@gmail.com', 'e34a8899ef6468b74f8a1048419ccc8b', 1, '', ''),
(3, 'Jane', 'jane@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `method_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `Created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`method_Id`, `name`, `code`, `amount`, `description`, `status`, `Created_Date`) VALUES
(5, 'Express Service', 'EXPDEL', 50, '', 1, '2021-04-01 08:55:25'),
(6, 'Regular Delivery(Within a week)', 'NOR21', 0, 'Within A week', 1, '2021-04-01 08:57:10'),
(7, 'In One day', 'ONE21', 100, 'In one day Delivery Service', 1, '2021-04-01 08:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_Date` varchar(255) NOT NULL,
  `updated_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `status`, `created_Date`, `updated_Date`) VALUES
(2, 'Jane', 'vs@vs.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, '', ''),
(3, 'makr', 'makr@gmail.com', '81b073de9370ea873f548e31b8adc081', 1, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cart_address`
--
ALTER TABLE `cart_address`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartItemId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_Id`),
  ADD KEY `parent_Id` (`parent_Id`);

--
-- Indexes for table `category_media`
--
ALTER TABLE `category_media`
  ADD PRIMARY KEY (`image_Id`),
  ADD KEY `category_Id` (`category_Id`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`page_Id`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`configId`),
  ADD KEY `groupId` (`groupId`);

--
-- Indexes for table `config_group`
--
ALTER TABLE `config_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_Id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`Group_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`orderAddressId`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`orderItemId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`method_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productId` (`productId`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`image_Id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sellerId`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`method_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart_address`
--
ALTER TABLE `cart_address`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `category_media`
--
ALTER TABLE `category_media`
  MODIFY `image_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `page_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `configId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `config_group`
--
ALTER TABLE `config_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `orderAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `orderItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `method_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `image_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sellerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `method_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_media`
--
ALTER TABLE `category_media`
  ADD CONSTRAINT `category_media_ibfk_1` FOREIGN KEY (`category_Id`) REFERENCES `category` (`category_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `config`
--
ALTER TABLE `config`
  ADD CONSTRAINT `config_ibfk_1` FOREIGN KEY (`groupId`) REFERENCES `config_group` (`groupId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `product_media_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
