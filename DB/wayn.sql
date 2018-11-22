-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 22, 2018 at 09:18 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wayn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'Salameh ', 'admin@admin.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `image` varchar(20) CHARACTER SET utf8 NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `adshow` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `image`, `title`, `adshow`) VALUES
(4, 'mac.jpg', 'Mac Offer', 'Internal Page'),
(5, 'caffeehouse.png', 'Try it', 'Home Page'),
(6, 'addds.jpg', 'booking your lunch', 'Internal Page'),
(7, 'katchabadv.jpg', 'exclusive advertisement', 'Internal Page'),
(12, 'food.jpg', 'Food Offer', 'Internal Page'),
(13, 'sport.jpg', 'Sport offer', 'Internal Page');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(20) CHARACTER SET utf32 NOT NULL,
  `image` varchar(100) NOT NULL,
  `cat_order` int(3) NOT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `image`, `cat_order`) VALUES
(5, 'Sport', 'sport.jpg', 1),
(6, 'Food', 'food.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subcate`
--

CREATE TABLE IF NOT EXISTS `subcate` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(50) CHARACTER SET utf32 NOT NULL,
  `sub_image` varchar(50) CHARACTER SET utf32 NOT NULL,
  `cate_id` int(11) NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `subcate`
--

INSERT INTO `subcate` (`sub_id`, `sub_name`, `sub_image`, `cate_id`) VALUES
(19, 'Swimming', 'swim.jpg', 5),
(21, 'Football', 'football.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `subsubcate`
--

CREATE TABLE IF NOT EXISTS `subsubcate` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET ucs2 NOT NULL,
  `address` varchar(20) CHARACTER SET ucs2 NOT NULL,
  `location` text NOT NULL,
  `contact` varchar(14) CHARACTER SET ucs2 NOT NULL,
  `imagesubsub` text NOT NULL,
  `sub_id` int(11) NOT NULL,
  `notes` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `subsubcate`
--

INSERT INTO `subsubcate` (`id`, `name`, `address`, `location`, `contact`, `imagesubsub`, `sub_id`, `notes`) VALUES
(22, 'Sport City', 'Amman - Jordan', 'https://www.google.com/maps/place/Sport+City+Cir.,+Amman/@31.9853125,35.8958121,17z/data=!3m1!4b1!4m5!3m4!1s0x151ca01978195281:0x62409a5b47ca72ba!8m2!3d31.985308!4d35.8980008', '06511133355', 'a:5:{i:0;s:8:"food.jpg";i:1;s:12:"football.jpg";i:2;s:8:"icon.jpg";i:3;s:9:"sport.jpg";i:4;s:8:"swim.jpg";}', 21, 'this i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfk'),
(23, 'Sport City', 'Ø¹Ù…Ø§Ù† - Ø´Ø§Ø±Ø¹ ', 'google', '77788888', 'a:3:{i:0;s:12:"football.jpg";i:1;s:9:"sport.jpg";i:2;s:8:"swim.jpg";}', 21, 'Sub Sub Notes'),
(24, 'Sport City', 'Amman - Jordan', 'https://www.google.com/maps/place/Sport+City+Cir.,+Amman/@31.9853125,35.8958121,17z/data=!3m1!4b1!4m5!3m4!1s0x151ca01978195281:0x62409a5b47ca72ba!8m2!3d31.985308!4d35.8980008', '06511133355', 'a:3:{i:0;s:8:"food.jpg";i:1;s:12:"football.jpg";i:2;s:8:"icon.jpg";}', 21, 'this i s srekdl klfdk ldkfldfk this i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfkthis i s srekdl klfdk ldkfldfk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf32 NOT NULL,
  `email` varchar(30) CHARACTER SET utf16 NOT NULL,
  `password` varchar(30) CHARACTER SET utf32 NOT NULL,
  `phone` varchar(11) NOT NULL,
  `image` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `video` varchar(1000) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `video`) VALUES
(3, 'https://www.youtube.com/embed/vBBoEyD4Nx4'),
(8, 'https://www.youtube.com/embed/bhhS2Ool4_w'),
(12, 'https://www.youtube.com/watch?v=bhhS2Ool4_w');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
