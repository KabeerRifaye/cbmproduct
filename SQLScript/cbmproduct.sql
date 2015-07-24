-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2015 at 11:15 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbmproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbm`
--

CREATE TABLE IF NOT EXISTS `cbm` (
  `id_cbm` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseno` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `arrivaldate` date NOT NULL,
  `value1` decimal(17,2) NOT NULL,
  `conversion` decimal(17,2) NOT NULL,
  `exp2` decimal(17,2) NOT NULL,
  `exp3` decimal(17,2) NOT NULL,
  `exp4` decimal(17,2) NOT NULL,
  `exp5` decimal(17,2) NOT NULL,
  `exp6` decimal(17,2) NOT NULL,
  `exp7` decimal(17,2) NOT NULL,
  `exp8` decimal(17,2) NOT NULL,
  `exp9` decimal(17,2) NOT NULL,
  `exp10` decimal(17,2) NOT NULL,
  `noofcontainer` decimal(17,2) NOT NULL,
  `percbm` decimal(17,2) NOT NULL,
  `cbm` decimal(17,2) NOT NULL,
  PRIMARY KEY (`id_cbm`),
  UNIQUE KEY `purchaseno` (`purchaseno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cbm`
--

INSERT INTO `cbm` (`id_cbm`, `purchaseno`, `purchasedate`, `arrivaldate`, `value1`, `conversion`, `exp2`, `exp3`, `exp4`, `exp5`, `exp6`, `exp7`, `exp8`, `exp9`, `exp10`, `noofcontainer`, `percbm`, `cbm`) VALUES
(1, 2, '2015-04-07', '2015-04-28', 140.00, 50.00, 100.00, 140.00, 80.00, 1000.00, 120.00, 50.00, 20.00, 0.00, 0.00, 3.00, 68.00, 8600.00),
(2, 3, '2015-07-01', '2015-07-31', 140.00, 50.00, 100.00, 140.00, 80.00, 1000.00, 120.00, 50.00, 20.00, 0.00, 0.00, 3.00, 68.00, 8600.00);

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE IF NOT EXISTS `cost` (
  `id_cost` int(11) NOT NULL AUTO_INCREMENT,
  `purchaseno` int(11) NOT NULL,
  `cbmexp` decimal(17,2) NOT NULL,
  `per1` int(11) NOT NULL,
  `conversion` int(11) NOT NULL,
  `purchasedate` date NOT NULL,
  `com` int(11) NOT NULL,
  `per2` int(11) NOT NULL,
  `arrivaldate` date NOT NULL,
  PRIMARY KEY (`id_cost`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`id_cost`, `purchaseno`, `cbmexp`, `per1`, `conversion`, `purchasedate`, `com`, `per2`, `arrivaldate`) VALUES
(1, 2, 42.16, 4343, 533, '2015-04-07', 45435, 43434, '2015-05-05'),
(2, 2, 42.16, 19, 10, '2015-04-07', 10, 10, '2015-07-04'),
(3, 2, 42.16, 10, 10, '2015-04-07', 10, 10, '2015-07-04'),
(4, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-04'),
(5, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-04'),
(6, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-01'),
(7, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-04'),
(8, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-04'),
(9, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-04'),
(10, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-04'),
(11, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-05'),
(12, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-07'),
(13, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-07'),
(14, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-07'),
(15, 2, 42.16, 10, 2, '2015-04-07', 2, 10, '2015-07-07'),
(16, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-07'),
(17, 3, 42.16, 10, 9, '2015-07-01', 2, 10, '2015-07-31'),
(18, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-08'),
(19, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-08'),
(20, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-08'),
(21, 2, 42.16, 10, 9, '2015-04-07', 2, 10, '2015-07-08');

-- --------------------------------------------------------

--
-- Table structure for table `costdetails`
--

CREATE TABLE IF NOT EXISTS `costdetails` (
  `id_costdetails` int(11) NOT NULL AUTO_INCREMENT,
  `id_cost` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_model` varchar(100) NOT NULL,
  `refnomodeldesc` varchar(50) NOT NULL,
  `lastpurprice` decimal(17,2) NOT NULL,
  `purprice` decimal(17,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `pcom` decimal(17,2) NOT NULL,
  `inr` decimal(17,2) NOT NULL,
  `cbm` decimal(17,2) NOT NULL,
  `cbmex` decimal(17,2) NOT NULL,
  `pcbm` decimal(17,2) NOT NULL,
  `per1` decimal(17,2) NOT NULL,
  `per2` decimal(17,2) NOT NULL,
  `selp` decimal(17,2) NOT NULL,
  `lastselcbm` decimal(17,2) NOT NULL,
  `lastselprice` decimal(17,2) NOT NULL,
  `lastpurno` decimal(17,2) NOT NULL,
  PRIMARY KEY (`id_costdetails`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `costdetails`
--

INSERT INTO `costdetails` (`id_costdetails`, `id_cost`, `id_user`, `id_model`, `refnomodeldesc`, `lastpurprice`, `purprice`, `qty`, `pcom`, `inr`, `cbm`, `cbmex`, `pcbm`, `per1`, `per2`, `selp`, `lastselcbm`, `lastselprice`, `lastpurno`) VALUES
(1, 15, 1, '2', '1-fdsdfsd-dfdsfdsfds', 0.00, 10.00, 10, 10.20, 20.40, 343.33, 14474.79, 14495.19, 15944.71, 17539.18, 175.00, 0.00, 0.00, 0.00),
(2, 16, 1, '1', '1-first model-first model', 10.00, 10.00, 10, 10.20, 91.80, 21.00, 885.36, 977.16, 1074.88, 1182.36, 175.00, 14474.79, 175.00, 2.00),
(3, 17, 1, '2', '1-fdsdfsd-dfdsfdsfds', 10.00, 10.00, 10, 10.20, 91.80, 343.33, 14474.79, 14566.59, 16023.25, 17625.58, 175.00, 885.36, 175.00, 2.00),
(4, 18, 1, '1', '1-first model-first model', 10.00, 10.00, 10, 10.20, 91.80, 21.00, 885.36, 977.16, 1074.88, 1182.36, 175.00, 14474.79, 175.00, 3.00),
(5, 21, 1, '1', '1-first model-first model', 10.00, 10.00, 10, 10.20, 91.80, 21.00, 885.36, 977.16, 1074.88, 1182.36, 175.00, 885.36, 175.00, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `modelcreation`
--

CREATE TABLE IF NOT EXISTS `modelcreation` (
  `id_modelcreation` int(11) NOT NULL AUTO_INCREMENT,
  `id_refcreation` int(11) NOT NULL,
  `modelno` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `purchaseprice` decimal(17,2) NOT NULL,
  `cbm` decimal(17,2) NOT NULL,
  `weight` decimal(17,2) NOT NULL,
  `sellingprice` decimal(17,2) NOT NULL,
  `imagename` varchar(100) NOT NULL,
  PRIMARY KEY (`id_modelcreation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `modelcreation`
--

INSERT INTO `modelcreation` (`id_modelcreation`, `id_refcreation`, `modelno`, `description`, `purchaseprice`, `cbm`, `weight`, `sellingprice`, `imagename`) VALUES
(1, 0, '0', '0', 0.00, 0.00, 0.00, 0.00, 'download3.jpg'),
(2, 1, 'Test', 'dfdsfdsfds', 3333.33, 343.33, 333.33, 4444.44, '0'),
(3, 1, '122', '12', 12.00, 12.00, 12.00, 12.00, 'download1.jpg'),
(4, 1, '1', '1', 1.00, 1.00, 1.00, 1.00, ''),
(5, 1, '777', '7', 7.00, 7.00, 7.00, 7.00, 'download2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `refcreation`
--

CREATE TABLE IF NOT EXISTS `refcreation` (
  `id_refcreation` int(11) NOT NULL AUTO_INCREMENT,
  `refno` varchar(50) NOT NULL,
  `note1` varchar(50) NOT NULL,
  `note2` varchar(50) NOT NULL,
  `note3` varchar(50) NOT NULL,
  PRIMARY KEY (`id_refcreation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `refcreation`
--

INSERT INTO `refcreation` (`id_refcreation`, `refno`, `note1`, `note2`, `note3`) VALUES
(1, '1', 'firstnote', 'firstnote', 'firstnote'),
(2, '2', 'secondnote', 'secondnote', 'secondnote');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'abu', 'abu@gmail.com', 'b4af804009cb036a4ccdc33431ef9ac9'),
(2, 'selvam', 'selvam@gmail.com', '18bd6a3f7f2caf056109c1fcf9e1a81f');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
