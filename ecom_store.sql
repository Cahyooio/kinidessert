-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 05:07 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_country` text NOT NULL,
  `admin_about` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_job` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_country`, `admin_about`, `admin_contact`, `admin_job`) VALUES
(1, 'Rizki Hamjana', 'rizkihamjana@gmail.com', 'kencana123', 'agen-jett-valorant-video-game-kerusuhan-wallpaper-2560x1600_7.jpg', 'Indonesia', 'Rizki Hamjana Mahasiswa Gunadarma yang sedang menjalankan penelitian ilmiah mengembangkan e-commerce berbasis website', '+62 877 8701 1457', 'Admin Keseluruhan'),
(4, 'Cahya Kumara Ganteng Banget', 'cahyo@gmail.com', 'cahyo123', 'timbang-badan-ufc-264-dustin-poirier-vs-conor-mcgregor-5_169.jpeg', 'Heaven', 'gitu deh', '69696969', 'Penting');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `p_price` varchar(255) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`) VALUES
(26, 'Dessert Box', 'do.png'),
(27, 'Frozen Food', 'zz.jpg'),
(30, 'coklat', 'kisspng-chinese-cuisine-dim-sum-halo-halo-pancit-shumai-5b3d237a5af325.4477125415307334343725-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_country2` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_city2` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_address2` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_country2`, `customer_city`, `customer_city2`, `customer_contact`, `customer_address`, `customer_address2`, `customer_image`, `customer_ip`) VALUES
(11, 'Rizki Hamjana', 'rizkihamjana@gmail.com', 'KENCANA123', 'Bekasi', 'Bekasi', '17147', '17823', '6287787011457', 'Komplek jaka kencana blok a no.15 a', 'Burgundy Cluster RAD NO.52', '', '127.0.0.1'),
(12, 'nadia', 'nadia@gmail.com', 'kencana123', 'bekasi', '', 'Burgundy Raya', '0', '628866112451', 'RAD No.52', '', '', '127.0.0.1'),
(19, 'bakew', 'bakew@gmail.com', 'kencana123', 'Bekasi', 'avasd', '17147', '555', '6287787011457', 'pager pink', 'fsfasfs', '', '127.0.0.1'),
(20, 'rezahamjana', 'reza@gmail.com', 'kencana123', 'Bekasi', '', 'Jln.mutiara 2', '', '628866124232', 'pager pink', '', '', '127.0.0.1'),
(22, 'cahya', 'cahyo@gmail.com', 'cahyo123', 'bekasi', '', '14045', '', '082369696969', 'jalan kenangan', '', 'PhotoFunia-1637738630.jpg', '127.0.0.1'),
(23, 'dimas', 'dimasaji@gmail.com', 'dimas123', 'bekasi', '', '14045', '', '08123456969', 'jalan melati', '', 'vclass_bu_sindy_m10.pdf', '127.0.0.1'),
(26, 'Testing', 'tes1@gmail.com', 'cahyo123', 'Jakarta', '', '14045', '', '35246364562', 'kuykeyuetyjstyjty', '', '37e7fd4a-a84b-48d2-9564-5654e5a6a9b1.jpg', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` date NOT NULL,
  `order_status` text NOT NULL,
  `review_status` text NOT NULL,
  `tujuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `product_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`, `review_status`, `tujuan`) VALUES
(159, '123', 22, 75000, 1711846795, 1, 'M', '2022-04-02', 'Complete', 'pending', 'alamat1'),
(160, '125', 22, 70000, 379287478, 2, 'M', '2022-04-11', 'Complete', 'pending', 'alamat1'),
(161, '122', 22, 190000, 1721668501, 4, 'M', '2022-04-11', 'Complete', 'dfdf', 'alamat1'),
(162, '124', 22, 45000, 1456045989, 1, 'L', '2022-04-11', 'Complete', 'complete', 'alamat1'),
(163, '123', 22, 140000, 1255432850, 2, 'M', '2022-04-11', 'pending', 'pending', 'alamat1'),
(164, '124', 22, 45000, 1255432850, 1, 'M', '2022-04-11', 'pending', 'pending', 'alamat1'),
(165, '125', 22, 40000, 100262990, 1, '', '2022-05-25', 'Complete', 'pending', 'alamat1'),
(166, '124', 22, 45000, 1756076098, 1, '', '2022-05-30', 'pending', 'pending', 'alamat1'),
(167, '125', 22, 40000, 1625951904, 1, '', '2022-05-30', 'pending', 'pending', 'alamat1'),
(168, '', 0, 0, 0, 0, '', '0000-00-00', '', 'pending', ''),
(169, '123', 22, 140000, 879900380, 2, 'L', '2022-06-08', 'pending', 'complete', 'alamat1'),
(170, '125', 22, 40000, 988282223, 1, '', '2022-06-08', 'pending', 'pending', 'alamat1');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_mode` text NOT NULL,
  `product_sent` varchar(255) NOT NULL,
  `name_tf` varchar(255) NOT NULL,
  `payment_date` text NOT NULL,
  `payment_tf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `order_id`, `pro_id`, `invoice_no`, `amount`, `payment_mode`, `product_sent`, `name_tf`, `payment_date`, `payment_tf`) VALUES
(91, 22, 159, 123, 1711846795, 'Rp75.000', 'BRI', 'Sicepat', '1231231', '2022-04-02', '-FSW-9-Evaluation-Class-Form.png'),
(92, 22, 160, 125, 379287478, 'Rp70.000', 'BRI', 'Sicepat', 'asdasdasd', '2022-04-11', 'lord2.png'),
(93, 22, 161, 122, 1721668501, 'Rp190.000', 'BRI', 'Sicepat', 'sadasda', '2022-04-11', '5.jpg'),
(94, 22, 162, 124, 1456045989, 'Rp45.000', 'BRI', 'COD (max. 10km)', 'ASDASDASDA', '2022-04-11', 'kisspng-chinese-cuisine-dim-sum-halo-halo-pancit-shumai-5b3d237a5af325.4477125415307334343725.jpg'),
(95, 22, 165, 125, 100262990, 'Rp40.000', 'BRI', 'Sicepat', 'dfgdsfgdfgds', '2022-05-25', 'The nightmarish visions of Anton Semenov.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` text NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) VALUES
(156, 26, 768861196, '116', 2, 'L', 'pending'),
(157, 22, 1711846795, '123', 1, 'M', 'pending'),
(158, 22, 379287478, '125', 2, 'M', 'pending'),
(159, 22, 1721668501, '122', 4, 'M', 'pending'),
(160, 22, 1456045989, '124', 1, 'L', 'pending'),
(161, 22, 1255432850, '123', 2, 'M', 'pending'),
(162, 22, 1255432850, '124', 1, 'M', 'pending'),
(163, 22, 100262990, '125', 1, '', 'pending'),
(164, 22, 1756076098, '124', 1, '', 'pending'),
(165, 22, 1625951904, '125', 1, '', 'pending'),
(166, 22, 879900380, '123', 2, 'L', 'pending'),
(167, 22, 988282223, '125', 1, '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `cat2_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` bigint(20) DEFAULT NULL,
  `product_desc` text NOT NULL,
  `product_label` text NOT NULL,
  `product_sale` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `cat2_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_label`, `product_sale`) VALUES
(121, 26, 27, '2022-04-14 18:08:16', 'Turkish', 'dc.png', '', '', 50000, '<p>sdfafasdfasdf</p>', ' ', 0),
(122, 26, 30, '2022-04-14 18:00:37', 'Tiramisu', 'dc.png', 'do.png', 'do.png', 45000, '<p>shdghrtyhr</p>', ' ', 0),
(123, 26, 27, '2022-04-14 18:08:32', 'red velvet', 'rv.jpeg', 'rv.jpeg', 'rv.jpeg', 65000, '<p>sfasfasf</p>', ' ', 0),
(124, 27, 0, '2022-04-01 09:04:24', 'Risol Mayo', 'zz.jpg', 'zz.jpg', '', 35000, '<p>&nbsp;efsdfdf</p>', ' ', 0),
(125, 26, 0, '2022-04-12 13:32:41', 'pastel', '9a8356ac_5d95169119b.jpeg', '', '', 30000, '', ' ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_rating` int(2) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `order_id`, `product_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(30, 165, 125, 'cahyo@gmail.com', 3, 'asuuuu', 1654675267),
(31, 162, 124, 'cahyo@gmail.com', 4, 'AAAAAA', 1654677510),
(34, 162, 124, 'cahyo@gmail.com', 4, 'z', 1654677959),
(35, 162, 124, 'cahyo@gmail.com', 3, '2222', 1654678025),
(36, 162, 124, 'cahyo@gmail.com', 4, '4545454', 1654678209),
(37, 162, 124, 'cahyo@gmail.com', 5, 'ssss', 1654678256),
(38, 162, 124, 'cahyo@gmail.com', 3, 'aaaaa', 1654678274),
(39, 162, 124, 'cahyo@gmail.com', 4, 'z', 1654678303),
(40, 161, 122, 'cahyo@gmail.com', 5, 'wwww', 1654678441),
(41, 169, 123, 'cahyo@gmail.com', 4, '2354', 1654678771),
(42, 161, 122, 'cahyo@gmail.com', 5, '23333', 1654678810),
(43, 169, 123, 'cahyo@gmail.com', 4, '2', 1654678841),
(44, 162, 124, 'cahyo@gmail.com', 5, '67', 1654679595),
(45, 169, 123, 'cahyo@gmail.com', 3, 's', 1654681397),
(46, 169, 123, 'cahyo@gmail.com', 4, '23', 1654681719),
(47, 169, 123, 'cahyo@gmail.com', 5, '222', 1654681816),
(48, 169, 123, 'cahyo@gmail.com', 3, '4', 1654681837),
(49, 169, 123, 'cahyo@gmail.com', 4, '1', 1654683733),
(50, 169, 123, 'cahyo@gmail.com', 5, '23', 1654683773),
(51, 169, 123, 'cahyo@gmail.com', 3, 'assss', 1654683902);

-- --------------------------------------------------------

--
-- Table structure for table `send_orders`
--

CREATE TABLE `send_orders` (
  `no_invoice` int(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `send_eks` varchar(255) NOT NULL,
  `no_resi` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` varchar(255) NOT NULL,
  `order_amount` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `send_orders`
--

INSERT INTO `send_orders` (`no_invoice`, `order_id`, `product_name`, `send_eks`, `no_resi`, `date`, `customer_id`, `qty`, `size`, `order_amount`, `status`) VALUES
(768861196, 158, 'Sprai Marbella Motif Bunga', 'Sicepat', '241342352', '2022-01-18', 26, 2, 'L', 260000, 'Complete'),
(1711846795, 159, 'red velvet', 'Sicepat', 'asdasdasw', '2022-04-02', 22, 1, 'M', 75000, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `size_product`
--

CREATE TABLE `size_product` (
  `product_id` int(11) NOT NULL,
  `size1` int(11) NOT NULL,
  `size2` int(11) NOT NULL,
  `size3` int(11) NOT NULL,
  `size4` int(11) NOT NULL,
  `size5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size_product`
--

INSERT INTO `size_product` (`product_id`, `size1`, `size2`, `size3`, `size4`, `size5`) VALUES
(121, 0, 3, 0, 0, 0),
(122, 6, 2, 0, 0, 0),
(123, 3, 2, 0, 0, 0),
(124, 3, 5, 0, 0, 0),
(125, 5, 3, 0, 0, 0),
(126, 2, 7, 0, 0, 0),
(127, 2, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slide_id` int(10) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_image` text NOT NULL,
  `slide_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_url`) VALUES
(17, 'Best Collection', 'Untitled_design.png', 'aa'),
(18, 'Slide Number 2', 'Untitled_design_1.png', 'aaa'),
(19, 'Slide Number 3', 'Delivery_option_.png', 'fsafsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `send_orders`
--
ALTER TABLE `send_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `size_product`
--
ALTER TABLE `size_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `size_product`
--
ALTER TABLE `size_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slide_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
