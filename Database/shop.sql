-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql201.byetcluster.com
-- Generation Time: Dec 19, 2022 at 07:18 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33140008_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `mname`, `lname`, `email`, `contact`, `street`, `city`, `province`, `position`, `gender`, `photo`, `password`, `created_at`) VALUES
(1, 'MAO', '', 'Admin', 'admin@gmail.com', '', 'Lilimasan', 'SC', 'Pangasinan', 'admin', 'Male', 'anime.jpg', '$2y$10$2Iel97KcchoPHeoAXMVjNecIMt3rVihd8trseaEfQhM6gO8wsKRe6', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_quantity` int(50) NOT NULL,
  `cart_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `farmer_id`, `customer_id`, `product_id`, `cart_quantity`, `cart_date`) VALUES
(45, 5, 6, 28, 1, '2022-12-09'),
(85, 5, 0, 29, 1, '2022-12-14'),
(106, 5, 0, 30, 1, '2022-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`) VALUES
(12, 'Crops', 'high class crops'),
(14, 'Vegtables', 'High Class Vegtables'),
(15, 'Fruits', 'High Class Fruits\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `customer_id` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `customer_number` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `customer_address` varchar(100) NOT NULL,
  `customer_street` longtext DEFAULT NULL,
  `customer_city` varchar(255) DEFAULT NULL,
  `customer_state` varchar(255) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `customer_id`, `photo`, `email`, `customer_number`, `password`, `customer_address`, `customer_street`, `customer_city`, `customer_state`, `billingAddress`, `regDate`) VALUES
(3, 'asdasd', '159263847', 'admin.png', 'dsad', 34234, '$2y$10$aVVHETAD/j/mVqklTvGbaeVuvTjT.IzjuEwFIE3xbLA6mLPZwGd1C', 'Bega', 'dsads', 'asdasd', 'dsada', NULL, '2022-12-03 14:45:45'),
(5, 'Ray mark Cruz', '492673051', 'anime.jpg', 'mark@gmail.com', 934324423, '$2y$10$5U8lxktDOCKLoaRaf7PP/uCNy.d15U2KvtIpfO8/qGif2nDz4cPX2', 'BEGA', 'Bega', 'SC ', 'Pangasinan', 'Bega SC', '2022-12-05 05:18:28'),
(9, 'Rico', '675408239', 'fed.jpg', 'qwerty@gmail.com', 9653476178, '$2y$10$POkiben.hxvpta897s4cxeXIaHRdvnjforQMGbClNOqQO6L/eZtC.', '', 'Tamaro', 'Bayambang', 'Pangasinan', NULL, '2022-12-13 02:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `id` int(11) NOT NULL,
  `farmerid` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `position` varchar(50) NOT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `street` longtext DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `shop_category` int(11) NOT NULL,
  `shop_logo` varchar(50) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`id`, `farmerid`, `photo`, `fname`, `lname`, `email`, `position`, `contactno`, `password`, `street`, `city`, `state`, `shop_category`, `shop_logo`, `shop_name`, `regDate`) VALUES
(5, '143278956', 'anime.jpg', 'RayMark', 'Cruz', 'ray@gmail.com', 'Farmer', 923456823, '$2y$10$lRC5hy3jT8q6eCZL/lC5begpvs0orkqJjMRLq2ATj0kafUkSdXGXa', 'Bega', 'SC', 'Pangasinan', 12, 'Admin-icon.png', 'Cruz Shop', '2022-12-07 01:49:20'),
(16, '1234', '../../images/icon.png', 'dreck', 'cruz', 'dreck1@gmail.com', 'Farmer', 9543213454, '$2y$10$xXYmmcLoxYftAFuBQGHePuTy71L5AbUyGsrJuMo3c3vWhLxS/ReXe', 'nalsian sur', 'bayambang', 'pangasinan', 15, 'icon.png', 'Dreck shop', '2022-12-13 02:06:04'),
(18, '121500', '../../images/189958075_863213744539361_5195614336163047403_n.jpg', 'Fed', 'Salosagcol', 'fed@gmail.com', 'Farmer', 9653476178, '$2y$10$YqV6y6rGn.E6sS6utKVyWuNINgINRKrvaD.TQWd7Td.gp8u3X8LWG', 'Nalsian Sur', 'Bayambang', 'Pangasinan', 12, 'Picsart_22-11-26_22-43-54-647.jpg', 'Agri Shop', '2022-12-13 03:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `total_pay` int(50) NOT NULL,
  `orderDate` date NOT NULL,
  `total_q` int(50) NOT NULL,
  `total_p` int(50) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `orderStatus` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `farmer_id`, `customer_id`, `product_id`, `total_quantity`, `total_pay`, `orderDate`, `total_q`, `total_p`, `paymentMethod`, `orderStatus`) VALUES
(164, 74153286, 5, 5, '29', 1, 1100, '2022-12-14', 1, 1100, 'COP', 'Pick Up'),
(165, 756014289, 5, 10, '29', 5, 5500, '2022-12-14', 5, 27500, 'COP', 'Pending'),
(166, 638017925, 5, 5, '35', 20, 23000, '2022-12-14', 20, 460000, 'COP', 'Pending'),
(167, 623498715, 5, 5, '35', 25, 28750, '2022-12-14', 25, 718750, 'COP', 'Pending'),
(168, 201635794, 5, 5, '35', 4, 4600, '2022-12-14', 4, 18400, 'COP', 'Pending'),
(170, 785126940, 5, 5, '30', 15, 18000, '2022-12-19', 15, 270000, 'COP', 'Delivered'),
(171, 210569783, 5, 5, '29', 1, 2200, '2022-12-19', 1, 2200, 'COP', 'Pending'),
(172, 62783549, 5, 9, '29', 1, 1100, '2022-12-19', 1, 1100, 'COP', 'In Process');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `farmer_id` varchar(11) NOT NULL,
  `customer_id` varchar(11) NOT NULL,
  `farmer_location` varchar(50) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `order_id`, `farmer_id`, `customer_id`, `farmer_location`, `status`, `remark`, `postingDate`) VALUES
(37, 62783549, '', '', 'Bayambang Pangasinan Nalsian', 'In Process', 'Please pick up within 2 days\r\n', '2022-12-19 06:08:53'),
(38, 785126940, '', '', 'Bayambang Pangasinan Nalsian', 'In Process', 'Please pick up within 2 days.', '2022-12-19 06:12:32'),
(39, 785126940, '', '', '  ', 'Pick Up', 'Ready to pick-up.', '2022-12-19 06:20:16'),
(40, 74153286, '', '', 'Mankayan Benguet sdad', 'In Process', 'sdassds', '2022-12-19 06:25:35'),
(41, 74153286, '', '', '  ', 'Pick Up', 'sadasd', '2022-12-19 06:25:52'),
(42, 785126940, '', '', '  ', 'Delivered', 'Thank you!', '2022-12-19 06:31:51');

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19'),
(5, 28, 5, 0, 0, 'sadsad', 'sadsads', 'dsadas', '2022-12-08 06:01:54'),
(6, 28, 5, 0, 0, 'sadsad', 'sadsads', 'dsadas', '2022-12-08 06:02:07'),
(7, 28, 5, 0, 0, 'sadsad', 'sadsads', 'dsadas', '2022-12-08 06:02:41'),
(8, 28, 4, 4, 4, 'sdsa', 'sdasdas', 'sdass', '2022-12-08 06:02:53'),
(9, 28, 4, 4, 4, 'sdsa', 'sdasdas', 'sdass', '2022-12-08 06:03:27'),
(10, 28, 0, 0, 0, 'sada', 'sadsad', 'sad', '2022-12-08 11:24:25'),
(11, 28, 0, 0, 5, 'sd', 'sd', 'dsds', '2022-12-08 11:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory_id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productPriceBeforeDiscount` int(11) NOT NULL,
  `quantity` int(50) NOT NULL,
  `productDescription` longtext NOT NULL,
  `photo1` varchar(255) DEFAULT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) NOT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `farmer_id`, `category`, `subCategory_id`, `productName`, `productPrice`, `productPriceBeforeDiscount`, `quantity`, `productDescription`, `photo1`, `photo2`, `shippingCharge`, `productAvailability`, `postingDate`) VALUES
(29, 5, 12, 18, 'Mais (Nk6410)', 1100, 0, 4, '    1 quantity is equivalent to 1 sack (50kg)', 'image-nk21.jpg', 'image-nk21.jpg', 0, '', '2022-12-11 04:12:20'),
(30, 5, 12, 18, 'Dekalb', 1200, 0, 0, '  3 days dried.', 'corn.jpg', 'corn1.jpg', 0, 'In Stock', '2022-12-11 12:32:30'),
(31, 16, 15, 29, 'melon', 60, 0, 10, 'Cucurbitaceae', 'melon.jpg', 'melon.jpg', 0, 'In Stock', '2022-12-13 02:50:44'),
(32, 16, 15, 27, 'Carabao Ripes Mango', 920, 0, 22, '118 pesos per kilo. 1 Basket is equivalent to 8 kilos.', 'fruits3.jpg.jpg', 'fruits3.jpg.jpg', 0, 'In Stock', '2022-12-13 02:51:01'),
(33, 18, 12, 30, 'NSIC Rc 118 (Matatag 3)/Pinoy Rice', 800, 0, 50, '16 pesos per kilo. 1 socks is equivalent of 50 kilos.', 'rice 4.jpg', 'rice 4.jpg', 0, 'In Stock', '2022-12-13 03:08:47'),
(34, 18, 12, 31, 'NK8840/Syngenta', 950, 0, 30, '19 pesos per kilo. 1 sock is equivalent of 50 kilos.', 'nk8840.jpg', 'nk8840.jpg', 0, 'In Stock', '2022-12-13 03:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `farmer_id`, `categoryid`, `subcategory`) VALUES
(18, 5, 12, 'Mais'),
(19, 5, 12, 'Kamote'),
(21, 13, 12, 'Palay'),
(22, 13, 12, 'Palay'),
(23, 13, 12, 'Palay'),
(25, 13, 12, 'rice'),
(26, 15, 14, 'eggplant'),
(27, 16, 15, 'watermelon'),
(28, 16, 0, 'peanut'),
(29, 16, 15, 'melon'),
(30, 18, 12, 'Palay'),
(31, 18, 12, 'Mais');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
