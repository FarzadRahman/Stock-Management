-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 05:57 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `areaId` int(11) NOT NULL,
  `areaName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`areaId`, `areaName`) VALUES
(1, 'Gulshan'),
(2, 'Nikunja');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `rate` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `clientId` int(11) NOT NULL,
  `clientName` varchar(45) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `areaId` int(5) DEFAULT NULL,
  `statusId` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientId`, `clientName`, `address`, `areaId`, `statusId`, `created_at`) VALUES
(1, 'Test Client', 'testing address', 1, 1, '2018-08-16 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_child`
--

CREATE TABLE `invoice_child` (
  `invoice_childId` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `invoiceMainId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_child`
--

INSERT INTO `invoice_child` (`invoice_childId`, `productId`, `quantity`, `rate`, `discount`, `invoiceMainId`) VALUES
(22, 1, 10, 500, 0, 30),
(23, 2, 10, 123, 0, 30),
(24, 1, 10, 500, 50, 31),
(25, 1, 0, 500, 0, 32),
(26, 1, 0, 500, 0, 33);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_main`
--

CREATE TABLE `invoice_main` (
  `invoice_mainId` int(11) NOT NULL,
  `invoiceNumber` varchar(45) NOT NULL,
  `clientId` int(11) NOT NULL,
  `statusId` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `cashReceived` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice_main`
--

INSERT INTO `invoice_main` (`invoice_mainId`, `invoiceNumber`, `clientId`, `statusId`, `total`, `cashReceived`, `created_at`) VALUES
(30, '123456', 1, 5, 6230, 0, '2018-09-16 13:45:51'),
(31, '123456', 1, 5, 2500, 0, '2018-09-16 13:47:29'),
(32, '18-09-16-32', 1, 5, 0, 0, '2018-09-16 13:55:30'),
(33, '18-09-16_33', 1, 5, 0, 0, '2018-09-16 13:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `sku` varchar(40) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `statusId` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `sku`, `code`, `price`, `stock`, `statusId`, `image`, `created_at`) VALUES
(1, 'test product', '456', '123456', 500, 160, 1, NULL, NULL),
(2, 'product 2', '123', '123', 123, 500, 1, '2image.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusId` int(11) NOT NULL,
  `statusName` varchar(25) NOT NULL,
  `statusType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusId`, `statusName`, `statusType`) VALUES
(1, 'Active', 'state'),
(2, 'Inactive', 'state'),
(3, 'increase', 'stock'),
(4, 'decrease', 'stock'),
(5, 'pending', 'invoice'),
(6, 'complete', 'invoice');

-- --------------------------------------------------------

--
-- Table structure for table `stock_log`
--

CREATE TABLE `stock_log` (
  `stock_logId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `statusId` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_log`
--

INSERT INTO `stock_log` (`stock_logId`, `productId`, `statusId`, `quantity`, `userId`) VALUES
(1, 1, 3, 10, 1),
(2, 1, 3, 20, 1),
(3, 2, 3, 100, 1),
(4, 2, 3, 400, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `password`, `name`, `remember_token`, `user_type`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$QvZbuhrxS/Lme/7BVJKctupS1mZ34qmcqLpCEG6ne0BxZ5DLY4bX2', 'admin', 'vEox4vhkzaDmI5wCdM5D5ADCpxzeZC3Kgk2AVoDYFn082wKVYBppDMAOSdeA', 'admin', '2018-08-16 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `user_typeId` varchar(20) NOT NULL,
  `typeName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`areaId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `invoice_child`
--
ALTER TABLE `invoice_child`
  ADD PRIMARY KEY (`invoice_childId`),
  ADD KEY `fk_invoice_child_main` (`invoiceMainId`),
  ADD KEY `fk_invoice_child_product` (`productId`);

--
-- Indexes for table `invoice_main`
--
ALTER TABLE `invoice_main`
  ADD PRIMARY KEY (`invoice_mainId`),
  ADD KEY `fk_invoice_main_client` (`clientId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `fk_product_status` (`statusId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`);

--
-- Indexes for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD PRIMARY KEY (`stock_logId`),
  ADD KEY `fk_stock_log_product` (`productId`),
  ADD KEY `fk_stock_log_status` (`statusId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`user_typeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `areaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_child`
--
ALTER TABLE `invoice_child`
  MODIFY `invoice_childId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `invoice_main`
--
ALTER TABLE `invoice_main`
  MODIFY `invoice_mainId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stock_log`
--
ALTER TABLE `stock_log`
  MODIFY `stock_logId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_child`
--
ALTER TABLE `invoice_child`
  ADD CONSTRAINT `fk_invoice_child_main` FOREIGN KEY (`invoiceMainId`) REFERENCES `invoice_main` (`invoice_mainId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_child_product` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_main`
--
ALTER TABLE `invoice_main`
  ADD CONSTRAINT `fk_invoice_main_client` FOREIGN KEY (`clientId`) REFERENCES `client` (`clientId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_status` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock_log`
--
ALTER TABLE `stock_log`
  ADD CONSTRAINT `fk_stock_log_product` FOREIGN KEY (`productId`) REFERENCES `product` (`productId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_log_status` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
