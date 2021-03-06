-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 22, 2022 at 04:20 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cara`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'Man', 1),
(2, 'Woman', 1),
(6, 'Kids', 1),
(9, 'Baby', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_name`, `email`, `subject`, `message`, `time`) VALUES
(1, 'jubair', 'jubair@gmail.com', 'personal', 'new message', '2022-05-31 09:43:30'),
(6, 'jubair', 'jubair@gmail.com', '', 'dfs', '2022-05-31 09:52:36'),
(8, 'abc', 'abc@gmail.com', '', 'sdfsd', '2022-06-01 12:19:24'),
(10, 'abc', 'jubairk576@gmail.com', '', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam rem porro aspernatur nesciunt cumque placeat ut laboriosam non deleniti dolore soluta fuga facilis earum, tempore atque quaerat animi ipsam illo.', '2022-06-01 12:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `sub_categories_id` int(11) NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `offer` float DEFAULT NULL,
  `offer_expdate` date DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `seasons_id` int(11) DEFAULT NULL,
  `best_seller` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `sub_categories_id`, `product_name`, `mrp`, `price`, `offer`, `offer_expdate`, `qty`, `image`, `description`, `meta_title`, `seasons_id`, `best_seller`, `status`) VALUES
(1, 1, 1, 'wildly cartoon print shirt', 1200, 999, 0, '0000-00-00', 5, 'f1.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight,comfortable and creasersistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color,this Shirt comes in an array of plain colours, some with regular cuffs and some with french cuffs.', 'wildly cartoon print shirt', 3, 1, 1),
(2, 1, 1, 'Leaf print slim fit shirt', 1350, 999, 0, '0000-00-00', 6, 'f2.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Leaf print slim fit shirt', 3, 1, 1),
(3, 1, 1, 'Flower print slim fit shirt', 1500, 1100, 0, '0000-00-00', 10, 'f3.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Flower print slim fit shirt', 3, 1, 1),
(4, 1, 1, 'Floral print slim fit shirt', 1000, 850, 0, '0000-00-00', 8, 'f4.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Floral print slim fit shirt', 3, 1, 1),
(5, 1, 1, 'Graphic  print shirt', 1200, 999, 0, '0000-00-00', 5, 'f5.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Graphic print shirt ', 0, 1, 1),
(6, 1, 1, 'Denim light Blue and Red shirt', 1800, 1600, 0, '0000-00-00', 7, 'f6.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Denim light Blue and Red shirt', 1, 1, 1),
(7, 2, 9, 'Indian flared palazzos', 950, 700, 0, '0000-00-00', 12, 'f7.jpg', 'Designed with the Jet-setting woman in mind, the product is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this product comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Indian flared palazzos', 3, 1, 1),
(8, 2, 8, 'Cotton print short kurta', 1000, 850, 0, '0000-00-00', 5, 'f8.jpg', 'Designed with the Jet-setting woman in mind, the Kurta is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Kurta comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Cotton print short kurta', 3, 1, 1),
(9, 1, 1, 'Solid mandarin collar casual shirt', 1300, 1000, 0, '0000-00-00', 15, 'n1.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Solid mandarin collar casual shirt', 1, 0, 1),
(10, 1, 1, 'Full sleeves slim fit shirt', 950, 700, 0, '0000-00-00', 14, 'n2.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Full sleeves slim fit shirt', 1, 0, 1),
(11, 1, 1, 'Mandarin collar shirt with patch pocket', 1600, 1350, 0, '0000-00-00', 4, 'n3.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Mandarin collar shirt with patch pocket', 3, 0, 1),
(12, 1, 1, 'Printed slim fit shirt', 800, 750, 0, '0000-00-00', 13, 'n4.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Printed slim fit shirt', 0, 0, 1),
(13, 1, 1, 'Denim shirt with patch pocket', 1800, 1600, 0, '0000-00-00', 8, 'n5.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Denim shirt with patch pocket', 1, 0, 1),
(14, 1, 10, 'Cotton shorts with insert pocket', 750, 500, 0, '0000-00-00', 5, 'n6.jpg', 'Designed with the Jet-setting man in mind, the shorts is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shorts comes in an array of plain colors.', 'Cotton shorts with insert pocket', 3, 0, 1),
(15, 1, 1, 'Slim fit shirt with flap pockets', 1000, 850, 0, '0000-00-00', 18, 'n7.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Slim fit shirt with flap pockets', 1, 0, 1),
(16, 1, 1, 'Half sleeves shirt with band collar ', 800, 600, 0, '0000-00-00', 0, 'n8.jpg', 'Designed with the Jet-setting man in mind, the shirt is lightweight, comfortable and crease-resistant. The fabric has a natural memory designed to \'Stretch\' with movement of the body while retaining a sharp, lightweight structure. Featuring slim fit styling and a small color, this Shirt comes in an array of plain colors, some with regular cuffs and some with french cuffs.', 'Half sleeves shirt with band collar', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
CREATE TABLE IF NOT EXISTS `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `season` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `season`, `status`) VALUES
(1, 'Winter', 1),
(3, 'Summer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `mail`, `status`) VALUES
(7, 'jubairk576@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `sub_categories` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `categories_id`, `sub_categories`, `status`) VALUES
(1, 1, 'Shirts', 1),
(2, 6, 'Pants', 1),
(5, 1, 'Pants', 1),
(6, 2, 'Saree', 1),
(7, 9, 'Full pack', 1),
(8, 2, 'Topwear', 1),
(9, 2, 'Bottomwear', 1),
(10, 1, 'Shorts', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
