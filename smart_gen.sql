-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2018 at 01:29 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.1.20-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_gen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `shipping` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product`, `price`, `shipping`, `quantity`, `img`, `total`) VALUES
(2, 'Sony experia', '32000', '50', '1', 'img/honor-holly-2-plus-na-400x400-imaef6hjfhghfzkn.jpeg', '32050'),
(5, 'China Variant', '50', '20', '1', 'img/sandisk-microsdhc-8gb-400x400-imae6fwpuqsuzdem.jpeg', '70');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `is_active`, `name`) VALUES
(1, 1, 'Mobiles'),
(2, 1, 'Accessory'),
(3, 1, 'Refrigerator'),
(4, 1, 'techs');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `shipping_cost` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `page_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `is_active`, `page_id`) VALUES
(1, 'home', 1, 1),
(2, 'about', 1, 2),
(3, 'Products', 1, 3),
(4, 'Contact', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `page_path`) VALUES
(1, 'index.php'),
(2, 'about.php'),
(3, 'product.php'),
(4, 'contact.php');

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `modal` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `shiping_cost` double NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_avilabel` varchar(255) NOT NULL,
  `spes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `category`, `company`, `modal`, `price`, `shiping_cost`, `img`, `is_avilabel`, `spes`) VALUES
(1, 'Mobiles', 'Lava', '3543', '5000', 50, 'img/honor-holly-2-plus-na-400x400-imaef6hjfhghfzkn.jpeg', '', ''),
(2, 'Accessory', 'China', 'Variant', '50', 20, 'img/sandisk-microsdhc-8gb-400x400-imae6fwpuqsuzdem.jpeg', '', ''),
(3, 'Refrigerator', 'Samsung', 'Express', '20000', 120, 'img/whirlpool-fp-263d-protton-roy-400x400-imae7cbhyntremzg.jpeg', '', ''),
(4, 'Mobiles', 'Geonee', 'P5W', '7000', 50, 'img/honor-holly-2-plus-na-400x400-imaef6hjfhghfzkn.jpeg', '', ''),
(5, 'Refrigerator', 'Sansui', 'Mega', '75000', 200, 'img/whirlpool-fp-263d-protton-roy-400x400-imae7cbhyntremzg.jpeg', '', ''),
(6, 'Mobiles', 'Sony', 'experia', '32000', 50, 'img/honor-holly-2-plus-na-400x400-imaef6hjfhghfzkn.jpeg', '', ''),
(7, 'techs', 'sample smile', 'techs 2', '1000', 20, '../img/Loving_Parrots-wallpaper-10806171.jpg', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `password`, `role`, `phone`) VALUES
(1, 'anuj', '', '2685singh@gmail.com', '123456', 'user', '88726269563'),
(2, 'admin', '', 'admin@site.com', '123456', 'admin', '8872626956');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
