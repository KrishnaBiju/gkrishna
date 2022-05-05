-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 10:53 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinegrosery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL,
  `uid` varchar(44) NOT NULL,
  `pid` varchar(44) NOT NULL,
  `qty` varchar(44) NOT NULL,
  `total` varchar(44) NOT NULL,
  `status` varchar(44) NOT NULL DEFAULT 'Pending',
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `uid`, `pid`, `qty`, `total`, `status`, `date`) VALUES
(1, '1', '1', '4', '1596', 'Delivered', NULL),
(2, '1', '3', '4', '600', 'Delivered', NULL),
(3, '2', '4', '10', '100', 'Pending', NULL),
(4, '2', '3', '3', '450', 'Pending', NULL),
(5, '1', '1', '3', '1197', 'Delivered', NULL),
(6, '1', '4', '10', '100', 'Delivered', NULL),
(7, '1', '6', '4', '140', 'Delivered', NULL),
(8, '1', '3', '4', '600', 'Delivered', NULL),
(9, '1', '6', '10', '350', 'Delivered', NULL),
(10, '1', '3', '10', '1500', 'Delivered', NULL),
(11, '1', '6', '16', '560', 'Delivered', NULL),
(12, '5', '7', '10', '1200', 'Delivered', NULL),
(13, '5', '7', '12', '1440', 'Delivered', NULL),
(14, '6', '8', '2', '1554', 'Delivered', NULL),
(15, '5', '3', '2', '300', 'Paid', NULL),
(16, '5', '6', '3', '105', 'Paid', NULL),
(17, '5', '7', '23', '2760', 'Paid', NULL),
(18, '5', '1', '4', '1596', 'Paid', NULL),
(21, '5', '3', '7', '1050', 'Paid', '2022-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `category` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `category`) VALUES
(1, 'Veg'),
(2, 'Non Veg'),
(3, 'Ice Cream'),
(4, 'Sweets'),
(5, 'Fruits'),
(6, 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lid` int(11) NOT NULL,
  `uid` varchar(44) NOT NULL,
  `uname` varchar(44) NOT NULL,
  `psw` varchar(44) NOT NULL,
  `type` varchar(44) NOT NULL,
  `status` varchar(44) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lid`, `uid`, `uname`, `psw`, `type`, `status`) VALUES
(1, '0', 'admin@gmail.com', 'admin', 'admin', 'Approved'),
(2, '1', 'tom@gmail.com', 'tom123', 'user', 'Approved'),
(3, '2', 'bibi@gmail.com', 'bib123', 'user', 'Approved'),
(4, '3', 'jeena@gmail.com', 'jeena123', 'user', 'Approved'),
(5, '4', 'jintu@gmail.com', 'jintu', 'user', 'Approved'),
(6, '5', 'ak@mail.com', '12345', 'user', 'Approved'),
(7, '6', 'fath@gmail.com', '34556', 'user', 'Approved'),
(8, '1', 'vis@mail.com', '12345', 'staff', 'Approved'),
(9, '2', 'abc@mail.com', 'Abc@12345', 'staff', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `pname` varchar(44) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `cat` varchar(44) NOT NULL,
  `price` varchar(40) NOT NULL,
  `stock` varchar(40) NOT NULL,
  `pimg` varchar(40) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `pname`, `desc`, `cat`, `price`, `stock`, `pimg`, `status`) VALUES
(1, 'Pizza', 'Pizza is an Italian dish consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven.', 'Non Veg', '399', '34', 'images/pizza.jpg', -1),
(3, 'Cheeseburger', 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. ', 'Non Veg', '150', '283', 'images/cheeseburger.jpg', 1),
(4, 'laddu', 'Laddu or laddoo, also called avinsh, is a sphere-shaped sweet originating from the Indian subcontinent. Laddus are primarily made from flour, fat and sugar. Laddus are often made of gram flour but can also be made with semolina.', 'Veg', '10', '195', 'images/laddu.jpg', 1),
(6, 'Pottato Chips', 'A potato chip is a thin slice of potato that has been either deep fried or baked until crunchy. They are commonly served as a snack, side dish, or appetizer.', 'Veg', '35', '17', 'images/chips.jpg', 1),
(7, 'Apple', 'Green Apple ', 'Fruits', '120', '355', 'images/download.png', -1),
(8, 'bg', 'gfftrftghg', 'ddddd', '777', '798', 'images/methi-muthia-recipe-1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sid` int(11) NOT NULL,
  `name` varchar(44) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `place` varchar(44) DEFAULT NULL,
  `age` varchar(44) DEFAULT NULL,
  `gender` varchar(44) DEFAULT NULL,
  `phone` varchar(44) DEFAULT NULL,
  `email` varchar(44) DEFAULT NULL,
  `img` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sid`, `name`, `address`, `place`, `age`, `gender`, `phone`, `email`, `img`) VALUES
(1, 'Vis', 'Vis\r\nAdrs', 'Chen', '21', 'female', '9898989898', 'vis@mail.com', 0x696d616765732f68616e6e612d6d6f727269732d45755f6a6a4b365a3637512d756e73706c617368202831292e6a7067),
(2, 'ABC', 'Abc\r\nAdrs', 'Aluva', '33', 'female', '9090909090', 'abc@mail.com', 0x696d616765732f62756c6c2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(44) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(44) NOT NULL,
  `age` varchar(44) NOT NULL,
  `gender` varchar(44) NOT NULL,
  `phone` varchar(44) NOT NULL,
  `email` varchar(44) NOT NULL,
  `img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `address`, `place`, `age`, `gender`, `phone`, `email`, `img`) VALUES
(1, 'Tom', 'Kuttamassery, Thottumugham, Kerala 683105', 'Aluva', '24', 'male', '9587646738', 'tom@gmail.com', 0x696d616765732f63312e6a7067),
(2, 'Bibi', 'Thottakkattukara, Aluva, Kerala', 'Aluva', '29', 'female', '9946038887', 'bibi@gmail.com', 0x696d616765732f7465737469332e6a7067),
(3, 'Jeena', 'PNRA-101, Padivattom, Edappally, Kochi, Kerala 682024', 'Edappally', '28', 'female', '9888474974', 'jeena@gmail.com', 0x696d616765732f7465737469322e6a7067),
(4, 'Jintu', 'PNRA-101, Padivattom, Edappally, Kochi, Kerala 682024', 'Edappally', '28', 'male', '9487489384', 'jintu@gmail.com', 0x696d616765732f63342e6a7067),
(5, 'Akhil', 'Ak Adrs\r\nVVV', 'Aluva', '23', 'male', '9090909090', 'ak@mail.com', 0x696d616765732f646f776e6c6f61642e706e67),
(6, 'fathima', 'Viyyath(H)\r\nChemmappilly', 'Aluva', '20', 'female', '6573578760', 'fath@gmail.com', 0x696d616765732f62756c6c2e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
