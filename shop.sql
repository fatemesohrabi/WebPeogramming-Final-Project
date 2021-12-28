-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 07:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddUser` (IN `Fname` VARCHAR(50) CHARSET utf8, IN `Lname` VARCHAR(50) CHARSET utf8, IN `NUserName` VARCHAR(20), IN `NPassWord` VARCHAR(200), IN `Email` VARCHAR(200), IN `Phone` VARCHAR(11), IN `Address` VARCHAR(300) CHARSET utf8)  BEGIN
INSERT INTO `user`(`Fname`, `Lname`, `UserName`, `PassWord`, `Email`, `Phone`, `Address`) VALUES (Fname,Lname,NUserName,NPassWord,Email,Phone,Address);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CheckUserPass` (IN `NewUserName` VARCHAR(20), IN `NewPassword` VARCHAR(200))  BEGIN
SELECT* FROM user WHERE UserName=NewUserName AND PassWord=NewPassword;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllproducts` ()  BEGIN
SELECT* from product;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllUsers` ()  BEGIN
SELECT* FROM user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProduct` (IN `Prname` VARCHAR(250) CHARSET utf8)  BEGIN
SELECT `ProdName`, `Info`, `TechInfo`, `Price`, `Count`, `Pname`, `Pic` FROM `product` WHERE `ProdName`=Prname;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUser` (IN `NewUserName` VARCHAR(20))  BEGIN
SELECT* FROM user WHERE UserName=NewUserName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `IsUsernameExist` (IN `NewUserName` VARCHAR(20))  BEGIN
SELECT* FROM user WHERE UserName=NewUserName;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUser` (IN `NewUserName` VARCHAR(20), IN `NewPassword` VARCHAR(200), IN `Fname` VARCHAR(50) CHARSET utf8, IN `Lname` VARCHAR(50) CHARSET utf8, IN `Email` VARCHAR(200), IN `Phone` VARCHAR(11), IN `Address` VARCHAR(300), IN `OldUsrName` VARCHAR(20))  BEGIN
UPDATE `user` SET `Fname`=Fname,`Lname`=Lname,`UserName`=NewUserName,`PassWord`=NewPassword,
`Email`=Email,`Phone`=Phone,`Address`=Address WHERE `UserName`=OldUsrName;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProdName` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `Info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `TechInfo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `Price` float NOT NULL,
  `Count` int(11) NOT NULL,
  `Pname` varchar(250) NOT NULL,
  `Pic` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProdName`, `Info`, `TechInfo`, `Price`, `Count`, `Pname`, `Pic`) VALUES
('گوشی موبایل اپل', 'رنگ مشکی', 'iPhone 13 Pro Max A2644 دو سیم‌ کارت ظرفیت 256 گیگابایت و رم 6', 47350000, 200, 'prod 1', 'Product Images/prod 1.png'),
('لپ تاپ 15.6 اینچی ایسوس', 'رنگ مشکی', 'ROG Strix G513QR-HF245', 81800000, 431, 'prod 2', 'Product Images/prod 2.png'),
('تبلت سامسونگ', 'رنگ مشکی', 'Galaxy Tab S7 FE LTE SM-T735 ظرفیت 64 گیگابایت', 12800000, 50, 'prod 3', 'Product Images/prod 3.png'),
('هدفون بی سیم سامسونگ', 'رنگ مشکی', 'Galaxy Buds Pro', 3340000, 100, 'prod 4', 'Product Images/prod 4.png'),
('فلش مموری ای دیتا', 'رنگ مشکی', 'DashDrive UV150 ظرفیت 64 گیگابایت', 206000, 14, 'prod 5', 'Product Images/prod 5.png'),
('فلش مموری سیلیکون پاور', 'رنگ مشکی', 'Touch T06 ظرفیت 32 گیگابایت', 143000, 66, 'prod 6', 'Product Images/prod 6.png'),
('گوشی موبایل سامسونگ', 'رنگ مشکی', 'Galaxy S21 Ultra 5G SM-G998B/DS دو سیم کارت ظرفیت 256 گیگابایت و رم 12 گیگابایت', 30400000, 41, 'prod 7', 'Product Images/prod 7.png'),
('تبلت مایکروسافت', 'رنگ مشکی', 'Surface Pro 7 Plus - G ظرفیت 1 ترابایت به همراه کیبورد Black Type Cover', 65900000, 6, 'prod 8', 'Product Images/prod 8.png'),
('لپ تاپ 13 اینچی اپل', 'رنگ مشکی', 'MacBook Pro MYD92 2020 همراه با تاچ بار', 43974000, 76, 'prod 9', 'Product Images/prod 9.png'),
('هندزفری بلوتوثی شیائومی', 'رنگ مشکی', 'FlipBuds Pro', 4872000, 22, 'prod 10', 'Product Images/prod 10.png'),
('فلش مموری سن دیسک', 'رنگ سفید', 'Cruzer Fit CZ33 ظرفیت 32 گیگابایت', 118000, 15, 'prod 11', 'Product Images/prod 11.png'),
('فلش مموری سن دیسک', 'رنگ نقره ای', 'Ultra Dual Drive USB Type-C ظرفیت 128 گیگابایت', 494000, 83, 'prod 12', 'Product Images/prod 12.png'),
('هدفون بی‌ سیم اپل', 'رنگ سفید', 'AirPods Pro همراه با محفظه شارژ', 5880000, 69, 'prod 13', 'Product Images/prod 13.png'),
('تبلت اپل', 'رنگ مشکی', 'iPad Pro 12.9 inch 2021 WiFi ظرفیت 2 ترابایت', 69999000, 3, 'prod 14', 'Product Images/prod 14.png'),
('گوشی موبایل شیائومی', 'رنگ برنز', 'POCO X3 Pro M2102J20SGدو سیم‌ کارت ظرفیت 256 گیگابایت و 8 گیگابایت رم', 6875000, 56, 'prod 15', 'Product Images/prod 15.png'),
('لپ تاپ 15 اینچی لنوو', 'رنگ مشکی', 'legion 5 15IMH05H', 39980000, 87, 'prod 16', 'Product Images/prod 16.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Fname` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `Lname` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `UserName` varchar(20) NOT NULL,
  `PassWord` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Address` varchar(300) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Fname`, `Lname`, `UserName`, `PassWord`, `Email`, `Phone`, `Address`) VALUES
('هادی', 'نصیری', 'hadi_nasiri', 'b9f38d6df5687f51479cfdcc4ed7b1c4', 'hadinasiri1385@yahoo.com', '09397579104', 'زنجان - دانشگاه تحصیلات تکمیلی در علوم پایه');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
