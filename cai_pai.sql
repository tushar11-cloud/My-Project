-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 08:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cai_pai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `Role` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `ID_AD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `Role`, `phone`, `ID_AD`) VALUES
(1, 'Daief Sikder', '123', 'Owner', 1754761489, 20102053);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `food_id` varchar(25) NOT NULL,
  `food_name` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `food_id`, `food_name`, `user_id`) VALUES
(409, '45', 'Radha Balla', 'daiefsikder425@gmail.com'),
(410, '45', 'Radha Balla', 'daiefsikder425@gmail.com'),
(411, '48', 'Chicken Sal', 'daiefsikder425@gmail.com'),
(412, '49', 'egg rice', 'daiefsikder425@gmail.com'),
(413, '44', 'Luchi and C', 'daiefsikder425@gmail.com'),
(414, '45', 'Radha Balla', 'daiefsikder425@gmail.com'),
(415, '44', 'Luchi and C', 'daiefsikder425@gmail.com'),
(416, '52', 'Curry', 'daiefsikder425@gmail.com'),
(417, '45', 'Radha Balla', 'daiefsikder425@gmail.com'),
(418, '48', 'Chicken Sal', 'daiefsikder425@gmail.com'),
(419, '56', 'octopus', 'daiefsikder425@gmail.com'),
(420, '45', 'Radha Balla', 'priyankachopra123@gmail.com'),
(421, '50', 'lettucewrap', 'priyankachopra123@gmail.com'),
(422, '56', 'octopus', 'priyankachopra123@gmail.com'),
(423, '36', 'fish and ch', 'tomcruse123@gmail.com'),
(424, '48', 'Chicken Sal', 'tomcruse123@gmail.com'),
(425, '48', 'Chicken Sal', 'tomcruse123@gmail.com'),
(426, '38', 'hamburgers', 'tomcruse123@gmail.com'),
(427, '38', 'hamburgers', 'tomcruse123@gmail.com'),
(428, '38', 'hamburgers', 'tomcruse123@gmail.com'),
(429, '38', 'hamburgers', 'tomcruse123@gmail.com'),
(430, '38', 'hamburgers', 'tomcruse123@gmail.com'),
(431, '38', 'hamburgers', 'tomcruse123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food` varchar(11) NOT NULL,
  `avatar` text NOT NULL,
  `cat` varchar(11) NOT NULL,
  `price` float NOT NULL,
  `availability` varchar(30) NOT NULL,
  `offer` float NOT NULL,
  `best` int(11) NOT NULL DEFAULT 0,
  `offer_des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food`, `avatar`, `cat`, `price`, `availability`, `offer`, `best`, `offer_des`) VALUES
(35, 'Chicked nug', '61c223fe41d9cchicken nuggets.jpg', 'fastfood', 300, 'not available now', 0.34, 0, ''),
(36, 'fish and ch', '61c2242ebe6cafish and chips fast food.jpg', 'fastfood', 500, 'available now', 0, 1, ''),
(37, 'french frie', '61c22440414bbfrench fries.jpg', 'fastfood', 300, 'available now', 0, 0, ''),
(38, 'hamburgers', '61c2246c8bba8hamburgers.jpg', 'fastfood', 569, 'available now', 0.2, 0, ''),
(41, 'sandwiches', '61c224b43f8d2sandwiches.jpg', 'fastfood', 500, 'available now', 0.1, 0, ''),
(44, 'Luchi and C', '62d7062412832f88479031b7e42d8777326115c0f3974.jpg', 'breakfast', 455, 'available now', 0, 0, ''),
(45, 'Radha Balla', '61c2282c89c36Radha Ballabhi.jpg', 'breakfast', 400, 'available now', 0.4, 1, ''),
(46, 'ruti with m', '61c2283a2de52ruti with meat.jpeg', 'breakfast', 300, 'available now', 0, 0, ''),
(47, 'biriyani', '61c2286568207biriyani.jpg', 'launch', 400, 'not available now', 0, 0, ''),
(48, 'Chicken Sal', '61c228772cb09Chicken Salad Sandwich.jpg', 'launch', 480, 'available now', 0, 1, ''),
(49, 'egg rice', '61c228852430cegg fried rice.jpg', 'launch', 600, 'available now', 0.4, 0, ''),
(50, 'lettucewrap', '61c2289d703bclettucewraps-7-720x720.jpg', 'launch', 600, 'available now', 0, 0, ''),
(51, 'rice meat', '61c228aa5f1b6rice meat.jpg', 'launch', 500, 'not available now', 0, 0, ''),
(52, 'Curry', '62d7056ac23d1Simple-Thai-Yellow-Chicken-Curry-with-Spicy-Garlic-Butter-1.jpg', 'breakfast', 444, 'available now', 0, 1, ''),
(53, 'Dinner sala', '61c228d0dfcd7Dinner salad.jpg', 'dinner', 555, 'not available now', 0, 0, ''),
(54, 'Grain bowls', '61c228e904a9dGrain bowls.jpg', 'dinner', 777, 'not available now', 0, 0, ''),
(55, 'Loaded brow', '61c228f5ec4b7Loaded brown rice pasta.jpg', 'dinner', 544, 'not available now', 0, 1, ''),
(56, 'octopus', '61c2290822f11octopus.jpg', 'dinner', 3254, 'available now', 0, 0, ''),
(57, 'One-pot sou', '61c2291479fbbOne-pot soups.jpg', 'dinner', 567, 'not available now', 0.5, 1, ''),
(58, 'Veggie load', '61c229208b564Veggie loaded frittatas.jpg', 'dinner', 546, 'available now', 0, 0, ''),
(92, 'Roman', '62dd50bc2c1a8roman-food-rome-saltimbocca.jpg', 'launch', 500, 'available now', 0, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `number` int(200) NOT NULL,
  `food` varchar(233) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`id`, `name`, `address`, `number`, `food`, `price`, `quantity`) VALUES
(64, 'daiefsikder425@gmail.com', 'Uttara', 123124, 'Radha Balla', 640, '4'),
(65, 'priyankachopra123@gmail.c', 'Mumbai', 0, 'fish and ch', 1000, '2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `avatar` text NOT NULL,
  `address` text NOT NULL,
  `phone` int(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `avatar`, `address`, `phone`, `date`) VALUES
(156, 'Tom Cruse', 'tomcruse123@gmail.com', '123', '62de6d3165f6cJack_Reacher-_Never_Go_Back_Japan_Premiere_Red_Carpet-_Tom_Cruise_(35338493152)_(cropped).jpg', 'USA ', 3435, '2022-07-20'),
(157, 'Priyanka Chopra', 'priyankachopra123@gmail.com', '123', '62de6d6fd3f72Priyanka-chopra-gesf-2018-7565.jpg', 'Mombai', 3232, '2022-07-19'),
(158, 'Jakie Chan', 'jakiechan123@gmail.com', '123', '62de6e14bb40bgettyimages-858141924-cd915e6c1a5d86d32dc2d3a13e02bd2344380fb0-s1100-c50.jpg', 'China', 43434, '2022-07-21'),
(159, 'Priyanka Chopra', 'priyankachopra123@gmail.com', '123', '62de73390f530Priyanka-chopra-gesf-2018-7565.jpg', 'Mombai', 3232, '2022-07-19');

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
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
