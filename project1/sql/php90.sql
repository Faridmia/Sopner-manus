-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 06:41 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php90`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(20) NOT NULL,
  `profileimg` varchar(100) NOT NULL,
  `forget_salt` varchar(64) NOT NULL,
  `is_forget_requested` int(1) NOT NULL DEFAULT '0',
  `is_actiove` int(1) NOT NULL DEFAULT '1',
  `registered` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `login_time` int(11) NOT NULL,
  `logout_time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `username`, `password`, `email`, `full_name`, `profileimg`, `forget_salt`, `is_forget_requested`, `is_actiove`, `registered`, `ip`, `login_time`, `logout_time`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'aklamon093@gmail.com', 'farid arfin', 'mJZKqtOUfg.jpg', '', 0, 1, 1511190450, '::1', 1511190450, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `ban_id` int(11) NOT NULL,
  `ban_title` varchar(100) NOT NULL,
  `ban_sub_title` varchar(100) NOT NULL,
  `ban_description` text NOT NULL,
  `ban_button_url` varchar(40) NOT NULL,
  `ban_images` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`ban_id`, `ban_title`, `ban_sub_title`, `ban_description`, `ban_button_url`, `ban_images`) VALUES
(1, 'banner title updated', 'banner sub title updated', 'banner description updated', 'http://www.facebook.com/me', 'vtHF1xRIA0.jpg'),
(3, 'ban title 2', 'banner sub title updated', 'banner description 2', 'http://www.facebook.com', 'VrCMGH1XvE.jpg'),
(4, 'ban title 3', 'banner sub title updated', 'banner description 2', 'http://www.facebook.com', 'tGmhPZ9jJ7.jpg'),
(5, 'women indian shari', 'indian shari', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'http://www.facebook.com/me', '5wdxLM1y5S.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
(2, 'cokacola'),
(4, 'fx-87'),
(5, 'RFL'),
(6, 'RFL');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'mens updated'),
(2, 'Womens'),
(4, 'Samsung updated'),
(7, 'nokia'),
(8, 'shoe');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_description` text NOT NULL,
  `p_images` varchar(15) NOT NULL,
  `p_web_id` varchar(20) NOT NULL,
  `p_qnt` int(2) NOT NULL,
  `p_availability` int(1) NOT NULL,
  `p_condition` int(1) NOT NULL,
  `b_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT '0',
  `added` int(11) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `p_price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_description`, `p_images`, `p_web_id`, `p_qnt`, `p_availability`, `p_condition`, `b_id`, `cat_id`, `sub_id`, `u_id`, `added`, `is_active`, `p_price`) VALUES
(24, 'Lahenga', 'this is pangabi product.this is pangabi product.this is pangabi product.this is pangabi product.', 'a3oyoOTHkh.JPG', 'web_id_10', 1, 2, 2, 2, 1, 1, 0, 1513045537, 1, 1200.00),
(25, 'shari', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'kH2xYMJmJW.jpeg', '47865245', 3, 2, 1, 4, 2, 3, 0, 1514027206, 1, 2200.00),
(26, 'blageur', 'This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.', 'mGUB4MTfSu.jpg', '346578', 4, 2, 1, 4, 2, 3, 0, 1514193405, 1, 5000.00),
(27, 'T-shirt', 'This t-shirt is new product.This t-shirt is new product.This t-shirt is new product.This t-shirt is new product.This t-shirt is new product.This t-shirt is new product.This t-shirt is new product.This t-shirt is new product.', '3snfADovDt.jpg', '145654', 5, 2, 1, 4, 2, 3, 0, 1514193451, 1, 700.00),
(28, 'man tie', 'Man tie new brand.this product is very high quelity.Man tie new brand.this product is very high quelity.Man tie new brand.this product is very high quelity.Man tie new brand.this product is very high quelity.Man tie new brand.this product is very high quelity.', 'ZXnn1bibvx.jpeg', '0034980', 6, 1, 1, 5, 2, 8, 0, 1514193496, 1, 5000.00),
(29, 'bangladesh shari', 'this is baangladeshi shari.this is baangladeshi shari.this is baangladeshi shari.this is baangladeshi shari.this is baangladeshi shari.', 'QikSaGV5rN.jpg', '987456', 7, 1, 1, 2, 4, 13, 0, 1514281274, 1, 1100.00),
(30, 'indian shari', 'this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.this product is indian.', 'tGf2Z43ju1.jpg', '345213', 8, 1, 1, 2, 2, 3, 0, 1514441333, 1, 5000.00),
(31, 'Three piece', 'India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.India Three piece.', 'Z7swJAsvkP.jpg', '234567', 1, 1, 1, 5, 2, 3, 0, 1514472283, 1, 2000.00),
(32, 'Blageur', 'This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.This is indian blageur.', '2bnvDgO0H6.jpg', '34567', 2, 1, 1, 5, 2, 3, 0, 1514646812, 1, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `rating`, `p_id`, `r_name`, `email`, `message`, `added`) VALUES
(1, 5, 25, 'farid arfin', 'farid@gmail.com', 'fdhfgh', '2017-12-26 01:12:24'),
(2, 4, 26, 'farid', 'arfin@gmail.com', 'this product is good', '2017-12-26 03:22:48'),
(3, 1, 29, 'asik', 'asik@gmail.com', 'this product is good', '2017-12-26 03:48:39'),
(4, 5, 30, 'amirul', 'amirul@gmail.com', 'hi it is good product', '2017-12-26 03:48:39'),
(5, 5, 27, 'arfin', 'rumy@gmail.com', 'good products', '2017-12-30 07:52:14'),
(6, 3, 27, 'sujan', 'talukdar@gmail.com', 'awosome products', '2017-12-30 07:54:03'),
(7, 5, 27, 'jakir', 'jakir@gmail.com', 'something good products', '2017-12-30 07:54:50'),
(8, 2, 27, 'babul', 'babul@gmail.com', 'good', '2017-12-30 08:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `s_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `google` varchar(100) NOT NULL,
  `logo` varchar(15) NOT NULL,
  `copyright` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`s_id`, `phone`, `email`, `facebook`, `twitter`, `linkedin`, `google`, `logo`, `copyright`) VALUES
(1, '01849709474', 'aklamon093@gmail.com', 'https://www.facebook.com', 'www.twitter.com', 'www.linkedin.com', 'www.google.com', 'XfIipen0SW.png', 'All reserved and copyright php89');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`sub_id`, `sub_name`, `cat_id`) VALUES
(1, 'T-Shirt updated', 1),
(13, 'T-Shirt updated', 4),
(3, 'Shari', 2),
(4, 'Lehenga', 2),
(5, 'Tie', 1),
(6, 'Pant', 1),
(7, 'Borka', 2),
(8, 'Shoee', 2),
(9, 'subname', 2),
(10, 'subname', 1),
(11, 'T-Shirt', 1),
(12, 'T-Shirt', 1),
(14, 'T-Shirt updated', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` int(50) NOT NULL,
  `password` int(64) NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `forget_salt` int(64) NOT NULL,
  `is_forget_requested` int(11) NOT NULL DEFAULT '0',
  `registered` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ban_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ban_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
