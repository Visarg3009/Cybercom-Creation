-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 06:05 AM
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
-- Database: `adapter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_Id` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_Id`, `userName`, `password`, `status`, `created_Date`) VALUES
(1, 'Mark', '1234', 1, '2021-02-25 08:04:18'),
(2, 'jane perry1', '1234', 1, '2021-02-25 08:04:31');

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
(12, 'product', 'material', 'material', 'checkbox', 'varchar', 4, ''),
(13, 'product', 'length', 'length', 'radio', 'varchar', 5, ''),
(14, 'category', 'brand', 'brand', 'select', 'varchar', 1, '');

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
(18, 'cotton', 12, 1),
(19, 'silk', 12, 2),
(20, 'red', 13, 1),
(21, 'cotton', 13, 2),
(22, 'gucci', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_Id` int(11) UNSIGNED NOT NULL,
  `parent_Id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `description` varchar(255) NOT NULL,
  `brand` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_Id`, `parent_Id`, `name`, `path`, `status`, `description`, `brand`) VALUES
(36, 0, 'livingroom', '36', 0, 'living room', NULL),
(38, 0, 'bedroom', '38', 0, 'bedroom', NULL),
(39, 38, 'beds', '38=39', 0, 'beds', NULL),
(40, 39, 'panel bed', '38=39=40', 0, 'panel bed', NULL),
(41, 36, 'sofa', '36=41', 1, 'sofa', NULL);

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
(1, 'About Us', 1, '<p><strong>About Us</strong></p>\n', 1, '2021-03-15 06:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_Id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `Group_Id` int(11) DEFAULT NULL COMMENT 'Foreign Key',
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

INSERT INTO `customer` (`customer_Id`, `firstName`, `lastName`, `Group_Id`, `email`, `mobile`, `password`, `status`, `created_Date`, `updated_Date`) VALUES
(13, 'Henry', 'Beast1', 3, 'aagam@aagam.com', 5234, 'dvs', 0, '2021-03-02 18:59:39', ''),
(20, 'Henry', 'cs', 3, 'aagam@aagam.com', 5234, 'scc', 0, '2021-03-03 09:44:01', ''),
(23, 'Aagam', 'Shah', 2, 'aagam@aagam.com', 5234, 'grg', 0, '2021-03-03 15:55:00', ''),
(26, 'mark', 'mark', 3, 'jnan@jan.com', 123334, 'wed', 0, '2021-03-03 18:46:57', '2021-03-03 20:55:19'),
(27, 'mark', 'mark', 2, 'jnan@jan.com', 123334, 'sssss', 0, '2021-03-04 05:56:44', ''),
(52, 'Henry', 'mark', 2, 'jnan@jan.com', 123334, 'scs', 1, '2021-03-09 19:42:19', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `Address` varchar(255) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `Address_Type` varchar(100) NOT NULL,
  `customer_Id` int(11) DEFAULT NULL COMMENT 'Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`Address`, `City`, `State`, `ZipCode`, `Country`, `Address_Type`, `customer_Id`) VALUES
('202-vandematram11', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 13),
('404-vandematram', 'ahmedabad', 'Gujarat', '52552', 'India', 'shipping', 13),
('404-vandematram', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 20),
('404-vandematram', 'ahmedabad', 'Gujarat', '52552', 'India', 'shipping', 20),
('404-vandematram', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 23),
('404-vandematram', 'ahmedabad', 'Gujarat', '52552', 'India', 'shipping', 23),
('404-vandematram', 'ahmedabad', 'Gujarat', '1234', 'India', 'billing', 26),
('202-panchshil', 'ahmedabad', 'Gujarat', '1234', 'India', 'shipping', 26),
('202-panchshil', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 27),
('202-panchshil', 'ahmedabad', 'Maharastra', '52552', 'India', 'shipping', 27),
('202-Dev residency', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', 52),
('202-Dev residency', 'ahmedabad', 'Maharastra', '52552', 'India', 'shipping', 52),
('202-panchshil', 'ahmedabad', 'Gujarat', '52552', 'India', 'billing', NULL),
('fsdsf', 'dsf', 'Gujarat', '5435', 'India', 'shipping', NULL);

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
(6, 'group3', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `method_Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `Created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`method_Id`, `Name`, `Code`, `Description`, `status`, `Created_Date`) VALUES
(5, 'payment1', 'pay2021', 'THIS IS PAYMENT ONE.', 1, '2021-02-24 19:45:46'),
(6, 'payment2', 'pay20201', 'cdsc', 0, '2021-02-24 19:46:08');

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
  `status` tinyint(1) DEFAULT 1,
  `created_Date` varchar(100) NOT NULL,
  `updated_Date` varchar(100) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `brand` varchar(45) DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  `material` varchar(45) DEFAULT NULL,
  `length` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `sku`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `created_Date`, `updated_Date`, `color`, `brand`, `size`, `material`, `length`) VALUES
(44, 'PD02', 'Mobile', 15000, 10, 50, 'MI,VIVO', 1, '2021-02-19 11:31:18', '2021-03-17 19:15:41', 'red', 'Adidas', '52', 'cotton', 'red'),
(45, 'PD03', 'washing machine', 20000, 5, 10, 'v', 1, '2021-02-19 11:31:50', '2021-03-17 19:32:48', NULL, NULL, NULL, NULL, NULL),
(48, 'PD05', 'CPU-Intel', 10000, 10, 12, 'Intel 10th Gen i9', 1, '2021-02-19 11:42:04', '2021-03-17 19:28:18', 'blue', 'Nike', '23', 'silk', 'red'),
(56, 'PD06', 'AC-1', 25000, 20, 20, 'This is AC', 1, '2021-02-23 08:19:39', '2021-02-23 08:19:57', NULL, NULL, NULL, NULL, NULL),
(57, 'PD07', 'Headphones', 1200, 10, 20, 'Boat,Noise', 1, '2021-02-23 10:47:51', '2021-02-23 10:54:52', NULL, NULL, NULL, NULL, NULL),
(80, '11', 'computer', 11, 1, 20, 'computer', 1, '2021-02-28 15:39:03', '2021-03-07 15:10:51', NULL, NULL, NULL, NULL, NULL),
(106, 'PD07', 'visarg', 25000, 50, 11, 'sa', 0, '2021-03-17 19:09:39', '2021-03-17 19:10:36', 'blue', 'Nike', '23', 'cotton', 'red');

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

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(1, 44, 3, '300.00'),
(2, 44, 2, '700.00'),
(3, 48, 6, '600.00'),
(4, 44, 6, '600.00'),
(5, 43, 2, '700.00'),
(6, 43, 3, '300.00'),
(7, 43, 6, '600.00'),
(8, 48, 2, '700.00'),
(9, 48, 3, '300.00'),
(10, 57, 2, '700.00'),
(11, 57, 3, '100.00'),
(12, 57, 6, '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `image_Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `small` tinyint(4) DEFAULT NULL,
  `thumb` tinyint(4) DEFAULT NULL,
  `base` tinyint(4) DEFAULT NULL,
  `gallery` tinyint(4) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'Foreign Key'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`image_Id`, `name`, `small`, `thumb`, `base`, `gallery`, `product_id`) VALUES
(4, 'ss.png', 1, 0, 0, 0, 44),
(11, 'non-profit-tshirt-design-219a4eb359.jpg', 0, 0, 1, 1, 45),
(23, '1.jpeg', 1, 0, 0, 0, NULL),
(25, 'Naxxic-Sneakers-Black-Casual-Shoes-SDL547327730-1-c683c.jpeg', 0, 1, 0, 1, NULL),
(30, 'a00d9cbf7a7058ef8b08c0a243f73a52.jpg', 0, 1, 0, 1, 44),
(40, 'non-profit-tshirt-design-219a4eb359.jpg', 0, 0, 1, 1, NULL),
(43, '1.jpeg', NULL, NULL, NULL, NULL, 48),
(45, 'cradlepoint-tshirt-design.jpg', 0, 0, 1, 1, 44);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `method_Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Code` varchar(100) NOT NULL,
  `Amount` int(100) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Status` tinyint(1) DEFAULT 1,
  `Created_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`method_Id`, `Name`, `Code`, `Amount`, `Description`, `Status`, `Created_Date`) VALUES
(2, 'Mark', 'SH11', 1100, 'This is Shipment one', 1, '2021-02-25 07:42:49'),
(4, 'Mark', 'SH11', 1100, 'dwqd', 0, '2021-03-02 06:23:32');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_Id`),
  ADD KEY `parent_Id` (`parent_Id`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`page_Id`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_Id`),
  ADD KEY `Group_Id` (`Group_Id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD KEY `customer_Id` (`customer_Id`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`Group_ID`);

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
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`method_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_Id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `page_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `Group_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `method_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `image_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `method_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`Group_Id`) REFERENCES `customer_group` (`Group_ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`customer_Id`) REFERENCES `customer` (`customer_Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_media`
--
ALTER TABLE `product_media`
  ADD CONSTRAINT `product_media_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
