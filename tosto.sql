-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2015 at 04:44 PM
-- Server version: 5.5.45
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tosto`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `lft` int(1) NOT NULL,
  `rgt` int(1) NOT NULL,
  `depth` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `seodescription` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `tree` int(3) NOT NULL,
  `root` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `lft`, `rgt`, `depth`, `name`, `title`, `description`, `seodescription`, `keyword`, `tree`, `root`, `weight`) VALUES
(6, 0, 0, 0, 'shoes_clothes', 'Одежда и обувь', '', '', '', 0, 0, 1),
(7, 0, 0, 0, 'men_shoes', 'Мужская обувь', '', '', '', 0, 6, 1),
(8, 0, 0, 0, 'sneakers', 'Кроссовки', '', '', '', 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE IF NOT EXISTS `confirm` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `executive` int(3) NOT NULL,
  `orderid` int(3) NOT NULL,
  `pubdate` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `worktypeid` int(3) NOT NULL,
  `description` text,
  `theme` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `deadline` int(3) NOT NULL,
  `language` int(1) NOT NULL,
  `zadanie` text,
  `file` varchar(255) NOT NULL,
  `promocode` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agreement` int(1) NOT NULL DEFAULT '0',
  `pubdate` int(3) NOT NULL,
  `synchronized` int(1) NOT NULL DEFAULT '0',
  `confirmed` int(1) NOT NULL,
  `success` int(1) NOT NULL,
  `closed` int(1) NOT NULL DEFAULT '0',
  `customerprice` int(3) NOT NULL,
  `executiveprice` int(3) NOT NULL,
  `inwork` int(1) NOT NULL,
  `publish` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `title`, `worktypeid`, `description`, `theme`, `subject`, `deadline`, `language`, `zadanie`, `file`, `promocode`, `phone`, `name`, `secondname`, `surname`, `email`, `agreement`, `pubdate`, `synchronized`, `confirmed`, `success`, `closed`, `customerprice`, `executiveprice`, `inwork`, `publish`) VALUES
(5, '', 1, NULL, '', '', 1444251600, 0, 'test', '', '', '4444', 'Ilya', '', '', '5704709@gmail.com', 0, 1444215867, 1, 0, 0, 0, 0, 0, 0, 0),
(6, '', 1, NULL, '', '', 1444770000, 0, 'test', '', '', '334', '3443', '', '', '5704709@gmail.com', 0, 1444306292, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '', 1, NULL, '', '', 1444770000, 0, 'test', '', '', '334', '3443', '', '', '5704709@gmail.com', 0, 1444306463, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '', 1, NULL, '', '', 1436475600, 0, 'fvdg', '', '', 'fdg', 'fgdfgddgf', 'dfg', 'gdf', 'gdf', 0, 1445088206, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `source` int(3) NOT NULL DEFAULT '0',
  `realid` int(3) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pubdate` int(3) NOT NULL,
  `userid` int(3) NOT NULL,
  `isshow` int(1) NOT NULL DEFAULT '0',
  `synchronized` int(1) NOT NULL DEFAULT '0',
  `publish` int(1) NOT NULL DEFAULT '0',
  `export` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

CREATE TABLE IF NOT EXISTS `portfolio_images` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `realid` int(3) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `portfolioid` int(3) NOT NULL,
  `userid` int(3) NOT NULL,
  `pubdate` int(3) NOT NULL,
  `source` int(3) NOT NULL,
  `synchronized` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `secondname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` int(3) NOT NULL,
  `auth_key` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `secondname`, `surname`, `phone`, `email`, `password`, `date_added`, `auth_key`) VALUES
(1, 'Лиза', '', '', '+79161671233', 'liza_super@gmail.com', 'test', 0, '0000-00-00 00:00:00'),
(2, 'weew', '', '', '', '111', '', 0, '0000-00-00 00:00:00'),
(3, 'Илья', '', '', '', '111', '', 0, '0000-00-00 00:00:00'),
(4, 'Илья', '', '', '', '111', '', 0, '0000-00-00 00:00:00'),
(5, 'Илья', '', '', '', '111', '', 0, '0000-00-00 00:00:00'),
(6, 'Илья', '', '', '89162733044', '5704709@gmail.com', '111', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE IF NOT EXISTS `work_type` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `declension` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `position` int(1) NOT NULL,
  `parent` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`id`, `title`, `declension`, `term`, `price`, `position`, `parent`) VALUES
(3, 'Дизайн интерфейсов', '', '', '', 0, NULL),
(4, 'Презентации и видео', '', '', '', 0, NULL),
(7, 'Дизайн процессов', '', '', '', 0, NULL),
(2, 'Дизайн веб-сайтов (веб-дизайн)', '', '', '', 0, NULL),
(6, 'Дизайн среды, системы навигации и ориентирования', '', '', '', 0, NULL),
(1, 'Графический дизайн', '', '', '', 0, NULL),
(5, 'Промышленный дизайн', '', '', '', 0, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
