-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 20, 2020 lúc 05:16 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dbfinalphp39`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `brandsProcedure` ()  NO SQL
BEGIN
	DECLARE samsung INT;
    DECLARE apple INT;
    DECLARE xiaomi INT;
    
    SELECT COUNT(*) FROM products WHERE brand_ID = 4 INTO  	 apple;
    SELECT COUNT(*) FROM products WHERE brand_ID = 3 INTO  	 xiaomi;
    SELECT COUNT(*) FROM products WHERE brand_ID = 2 INTO  	 samsung;
    
    CREATE TEMPORARY TABLE tmp_brand(samsung INT, apple INT, xiaomi INT);
    INSERT INTO tmp_brand(samsung,apple,xiaomi) VALUES (samsung,apple,xiaomi);
    SELECT * FROM tmp_brand;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `revenue` ()  NO SQL
BEGIN
DECLARE thang1 INT DEFAULT 0;
DECLARE thang2 INT DEFAULT 0;
DECLARE thang3 INT DEFAULT 0;
DECLARE thang4 INT DEFAULT 0;
DECLARE thang5 INT DEFAULT 0;
DECLARE thang6 INT DEFAULT 0;
DECLARE thang7 INT DEFAULT 0;
DECLARE thang8 INT DEFAULT 0;
DECLARE thang9 INT DEFAULT 0;
DECLARE thang10 INT DEFAULT 0;
DECLARE thang11 INT DEFAULT 0;
DECLARE thang12 INT DEFAULT 0;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 1 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang1;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 2 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang2;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 3 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang3;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 4 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang4;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 5 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang5;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 6 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang6;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 7 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang7;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 8 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang8;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 9 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang9;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 10 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang10;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 11 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang11;
SELECT IFNULL(sum(pay),0) FROM bill inner JOIN bill_detail ON bill.bill_ID = bill_detail.bill_ID where MONTH(created_at) = 12 AND YEAR(created_at) = YEAR(CURDATE()) INTO @thang12;

CREATE TEMPORARY TABLE abc(thang1 INT,thang2 INT,thang3 INT,thang4 INT,thang5 INT,thang6 INT,thang7 INT,thang8 INT,thang9 INT,thang10 INT,thang11 INT,thang12 INT);
INSERT INTO abc(thang1,thang2,thang3,thang4,thang5,thang6,thang7,thang8,thang9,thang10,thang11,thang12) VALUES(@thang1,@thang2,@thang3,@thang4,@thang5,@thang6,@thang7,@thang8,@thang9,@thang10,@thang11,@thang12);

SELECT * FROM abc;
DROP TABLE abc;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `customer_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `customer_phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `customer_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `discount` int(11) NOT NULL,
  `Code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_ID`, `customer_ID`, `customer_name`, `customer_phone`, `customer_address`, `created_at`, `discount`, `Code`, `price`) VALUES
(1, 0, 'Tung Nguyen', '966637498', 'Hà Nội', '2019-08-28 22:31:26', 540, '', '1380'),
(2, 0, 'Tung Nguyen', '966637498', 'Hà Nội', '2019-08-28 22:36:11', 540, '8JP4L', '1380'),
(3, 0, 'Tung Nguyen', '912232541', 'Bắc Giang', '2019-08-28 22:38:55', 360, 'aSNKT', '929'),
(4, 0, 'Tung Nguyen', '912232541', 'Bắc Giang', '2019-08-28 22:39:18', 360, 'aSNKT', '929'),
(5, 0, 'Tung Nguyen', '912232541', 'Bắc Giang', '2019-08-28 22:42:40', 650, 'yyjLW', '2628'),
(6, 0, 'Tung Nguyen', '912232541', 'Bắc Giang', '2019-08-28 22:45:29', 650, 'yyjLW', '2628'),
(7, 0, 'Tung Nguyen', '966637498', 'Hà Nội', '2019-08-28 22:46:36', 720, '3yCWt', '1830'),
(8, 0, 'Tung Nguyen', '966637498', 'Hà Nội', '2019-08-28 22:46:43', 720, '3yCWt', '1830'),
(9, 0, 'Nguyễn Đức Tùng', '966637498', 'Hà Nội', '2019-08-28 22:47:47', 0, '', '299'),
(10, 0, 'Nguyễn Đức Tùng', '966637498', 'Hà Nội', '2019-08-28 22:48:56', 0, '', '299'),
(11, 0, 'Tung Nguyen', '912232541', 'Bắc Giang', '2019-08-28 22:49:12', 0, '', '1299'),
(12, 0, 'Tung Nguyen', '912232541', 'Bắc Giang', '2019-08-28 22:49:13', 0, '', '1299'),
(13, 0, 'Nguyễn Đức Tùng', '966637498', 'Hà Nội', '2019-08-28 22:50:46', 0, '', '899'),
(14, 0, 'Nguyễn Đức Tùng', '966637498', 'Hà Nội', '2019-08-28 22:51:50', 0, '', '899'),
(15, 0, 'Nguyễn Đức Tùng', '966637498', 'Hà Nội', '2019-08-28 22:52:48', 0, '', '180'),
(16, 0, 'Nguyễn Đức Tùng', '966637498', 'Hà Nội', '2019-08-28 22:54:24', 0, '', '90'),
(17, 0, 'Nguyen Khanh Long', '0924235345', 'Ca Mau, Viet nam', '2019-08-30 04:17:10', 5196, 'K2ijJ', '6525'),
(18, 13, 'Cao Vân Anh', '0834599333', 'T8 Times City', '2019-08-30 12:59:14', 0, '', '450'),
(19, 0, 'Nguyen DUc Tung', '0966637498', '11 ngõ 461 Minh Khai', '2019-09-18 04:30:43', 0, '', '899'),
(20, 0, 'Nguyen Duc TUng', '0966637498', 'minh khai, ha noi', '2019-09-28 11:48:47', 0, '', '2097'),
(21, 0, 'Nguyễn Đức Tùng', '0966637498', '11 ngõ 461 Minh Khai', '2019-09-28 11:50:19', 0, '', '699'),
(22, 0, 'Nguyễn Đức Tùng', '0966637498', '11 ngõ 461 Minh Khai', '2019-09-28 11:53:21', 0, '', '699'),
(23, 15, 'Tung Nguyen', '326729333', 'Tam Trinh, Hoang Mai', '2019-09-28 12:08:46', 0, '', '1800'),
(24, 15, 'Nguyễn Đức Tùng', '0966637498', '11 ngõ 461 Minh Khai', '2019-09-28 12:12:47', 0, '', '1111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `ID` int(11) NOT NULL,
  `bill_ID` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`ID`, `bill_ID`, `product_name`, `quantity`, `price`, `pay`) VALUES
(1, 1, 'Watch 3', 3, 450, 1350),
(2, 3, 'Iphone 7', 1, 899, 899),
(3, 5, 'Iphone XS max', 2, 1299, 2598),
(4, 7, 'Watch 3', 4, 450, 1800),
(5, 9, 'Redmi 3', 1, 299, 299),
(6, 11, 'Iphone XS max', 1, 1299, 1299),
(7, 13, 'Luxury watch 2.0', 1, 899, 899),
(8, 15, 'Iphone 5', 1, 180, 180),
(9, 16, 'Miband 2', 3, 30, 90),
(10, 17, 'Iphone XS max', 5, 1299, 6495),
(11, 18, 'Watch 3', 1, 450, 450),
(12, 19, 'Iphone 7', 1, 899, 899),
(13, 20, 'Galaxy s9', 3, 699, 2097),
(14, 21, 'Galaxy s9', 1, 699, 699),
(15, 22, 'Galaxy s9', 1, 699, 699),
(16, 23, 'Iphone 2', 4, 450, 1800),
(17, 24, 'Iphone 4', 1, 1111, 1111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`ID`, `name`, `status`, `created_at`, `created_by`) VALUES
(1, 'Oppo', 'active', '2019-08-16 09:36:43', 'Nguyen Duc Anh'),
(2, 'SamSung', 'active', '2019-08-16 09:36:38', 'Nguyen Duc Anh'),
(3, 'Xiao Mi', 'active', '2019-08-04 07:10:45', 'Nguyen Duc Anh'),
(4, 'Apple', 'active', '2019-08-16 09:36:52', 'Dang Minh Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`ID`, `name`, `status`, `created_at`, `created_by`) VALUES
(17, 'Watch', 'active', '2019-08-13 11:25:43', 'Nguyen Duc Tung'),
(19, 'Tablet', 'inactive', '2019-08-04 07:11:58', 'Nguyá»…n Ngá»c Anh'),
(20, 'Phone', 'inactive', '2019-08-12 15:03:56', 'Dang Minh Anh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `last_purchase` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(254) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`ID`, `name`, `email`, `password`, `phone`, `birthday`, `address`, `points`, `last_purchase`, `created_at`, `avatar`) VALUES
(13, 'Cao Vân Anh', 'caovanchuong1998@gmail.com', '202cb962ac59075b964b07152d234b70', '0834599333', '2001-03-12', 'T8 Times City', 254, '2019-08-30', '2019-08-20 12:29:12', '15663041881565622111hinh-nen-kut-de-thuong-cho-may-tinh-121-10.jpg'),
(14, 'Nguyen Nam Anh', 'namanh123@gmail.com', '202cb962ac59075b964b07152d234b70', '0651034968', '1991-08-24', 'Nguyễn Khoái, Hà Nội', 9, '2019-08-20', '2019-08-20 14:57:25', '1566313256mrtelasm-109-dong-vat-bien-wallpapers-001.jpg'),
(15, 'Võ Anh Văn', 'hatunganh2011@gmail.com', '202cb962ac59075b964b07152d234b70', '0911194953', '0000-00-00', '', 42, '2019-09-28', '2019-09-28 12:07:49', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`ID`, `username`, `password`, `fullname`, `birthday`, `email`, `phone`, `avatar`, `status`, `created_at`, `created_by`, `address`, `role`) VALUES
(1, 'tungnd4', 'c4ca4238a0b923820dcc509a6f75849b', 'Dang Minh Anh', '2019-08-24', 'bong@gmail.com', '9122320541', '15665759671565948522tải xuống.jpg', 'active', '2020-07-17 08:38:02', 'Nguyễn Ngọc Anh', '', 'manager'),
(2, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Nguyễn Đức Tùng', '1998-02-23', 'hatunganh@gmail.com', '0966637498', '1565404140hinh-nen-kungfu-panda-3.jpg', 'active', '2020-06-04 04:20:28', 'Ho Minh Anh', '', 'administrator'),
(3, 'tunganh2302', '202cb962ac59075b964b07152d234b70', 'Hà Minh Ngọc', '1998-04-23', 'ductunganh@gmail.com', '0915632523', '1565338020hinh-nen-kut-de-thuong-cho-may-tinh-121-10.jpg', 'active', '2019-08-09 08:07:00', 'Nguyễn Đức Tùng', '', 'manager'),
(4, 'tung2302', '97cedf476792123aa9a18c73b0880a56', 'Nguyễn Đức Tùng', '0000-00-00', '', '', '', 'active', '2019-08-23 10:53:50', 'Nguyễn Đức Tùng', '', 'manager'),
(5, 'tung230298', '97cedf476792123aa9a18c73b0880a56', 'Nguyễn Đức Tùng', '0000-00-00', '', '', '', 'active', '2019-08-23 10:54:11', 'Nguyễn Đức Tùng', '', 'administrator'),
(6, 'daca124', '202cb962ac59075b964b07152d234b70', 'Đào Việt Anh', '0000-00-00', '', '', '', 'active', '2019-08-23 11:01:00', 'Nguyễn Đức Tùng', '', 'manager'),
(7, 'tuongnguyen', '202cb962ac59075b964b07152d234b70', 'Phạm Minh Tường', '0000-00-00', '', '', '', 'active', '2019-08-23 12:06:26', 'Nguyễn Đức Tùng', '', 'staff'),
(8, 'tunghoho', '202cb962ac59075b964b07152d234b70', 'Dương Văn Sơn', '0000-00-00', '', '', '', 'active', '2019-08-23 12:38:29', 'Nguyễn Đức Tùng', '', 'staff'),
(9, 'chaubui', '202cb962ac59075b964b07152d234b70', 'Bùi Minh Châu', '0000-00-00', '', '', '', 'active', '2019-08-23 13:21:53', 'Nguyễn Đức Tùng', '', 'administrator'),
(10, 'caoloc123', '202cb962ac59075b964b07152d234b70', 'Cao Văn Sơn Lâm', '0000-00-00', '', '', '', 'active', '2019-08-23 13:22:39', 'Nguyễn Đức Tùng', '', 'staff'),
(11, 'hatunganh2004', '202cb962ac59075b964b07152d234b70', 'Đỗ Trà An', '0000-00-00', '', '', '', 'active', '2019-08-23 13:27:13', 'Nguyễn Đức Tùng', '', 'staff'),
(12, 'administrator', '202cb962ac59075b964b07152d234b70', 'Ngô Bảo Nhung', '0000-00-00', '', '', '', 'active', '2019-08-23 14:30:45', 'Nguyễn Đức Tùng', '', 'administrator'),
(13, 'sonnt1', '202cb962ac59075b964b07152d234b70', 'Ngô Trọng Sơn', '0000-00-00', '', '', '', 'active', '2019-08-23 14:31:07', 'Nguyễn Đức Tùng', '', 'administrator'),
(14, 'hanhnc', '202cb962ac59075b964b07152d234b70', 'Nguyễn Công Hạnh', '0000-00-00', '', '', '', 'inactive', '2019-08-23 14:33:43', 'Nguyễn Đức Tùng', '', 'administrator'),
(15, 'test', '202cb962ac59075b964b07152d234b70', 'Lưu Hoàng Anh', '0000-00-00', '', '', '', 'active', '2019-08-23 14:37:18', 'Nguyễn Đức Tùng', '', 'administrator'),
(16, 'phanduong123', '202cb962ac59075b964b07152d234b70', 'Phan Xuân Dương', '0000-00-00', '', '', '', 'active', '2019-08-23 15:12:31', 'Nguyễn Đức Tùng', '', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_point`
--

CREATE TABLE `history_point` (
  `ID` int(11) NOT NULL,
  `customer_ID` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_point`
--

INSERT INTO `history_point` (`ID`, `customer_ID`, `total_price`, `create_at`) VALUES
(10, 13, 1398, '2019-08-20 12:34:18'),
(12, 13, 4299, '2019-08-20 14:54:13'),
(13, 14, 598, '2019-08-20 15:01:56'),
(14, 13, 1398, '2019-08-24 13:20:56'),
(16, 13, 900, '2019-08-24 13:21:20'),
(17, 13, 8691, '2019-08-24 13:55:56'),
(18, 13, 450, '2019-08-30 12:59:14'),
(19, 15, 1800, '2019-09-28 12:08:52'),
(20, 15, 1111, '2019-09-28 12:12:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `contents` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`ID`, `contents`, `icon`, `created_at`) VALUES
(37, 'Tung Nguyen costed 2097 from our shop', 'icon-shopping-cart', '2019-08-28 13:34:51'),
(38, 'Tung Nguyen costed 0 from our shop', 'icon-shopping-cart', '2019-08-28 13:36:27'),
(39, 'Tung Nguyen costed 699 from our shop', 'icon-shopping-cart', '2019-08-28 13:39:17'),
(40, 'Nguyễn Đức Tùng costed 139 from our shop', 'icon-shopping-cart', '2019-08-28 14:19:27'),
(41, 'Nguyễn Đức Tùng costed 139 from our shop', 'icon-shopping-cart', '2019-08-28 14:20:10'),
(42, 'Nguyễn Đức Tùng costed 3337 from our shop', 'icon-shopping-cart', '2019-08-28 14:20:32'),
(43, 'Nguyễn Đức Tùng costed 60 from our shop', 'icon-shopping-cart', '2019-08-28 14:21:01'),
(44, 'Nguyễn Đức Tùng costed 1240 from our shop', 'icon-shopping-cart', '2019-08-28 14:26:05'),
(45, 'Nguyễn Đức Tùng costed 1240 from our shop', 'icon-shopping-cart', '2019-08-28 14:26:38'),
(47, 'Nguyễn Đức Tùng costed 929 from our shop', 'icon-shopping-cart', '2019-08-28 14:28:25'),
(48, 'Nguyễn Đức Tùng costed 929 from our shop', 'icon-shopping-cart', '2019-08-28 14:28:59'),
(49, 'Nguyễn Đức Tùng costed 929 from our shop', 'icon-shopping-cart', '2019-08-28 14:29:05'),
(50, 'Nguyễn Đức Tùng costed 840 from our shop', 'icon-shopping-cart', '2019-08-28 14:53:01'),
(51, 'Nguyễn Đức Tùng costed 680 from our shop', 'icon-shopping-cart', '2019-08-28 14:56:53'),
(52, 'Tung Nguyen costed 1173 from our shop', 'icon-shopping-cart', '2019-08-28 22:21:56'),
(53, 'Tung Nguyen costed 809 from our shop', 'icon-shopping-cart', '2019-08-28 22:24:05'),
(54, 'Tung Nguyen costed 809 from our shop', 'icon-shopping-cart', '2019-08-28 22:24:39'),
(55, 'Tung Nguyen costed 192 from our shop', 'icon-shopping-cart', '2019-08-28 22:25:41'),
(56, 'Tung Nguyen costed 1380 from our shop', 'icon-shopping-cart', '2019-08-28 22:31:26'),
(57, 'Tung Nguyen costed 1380 from our shop', 'icon-shopping-cart', '2019-08-28 22:36:11'),
(58, 'Tung Nguyen costed 929 from our shop', 'icon-shopping-cart', '2019-08-28 22:38:55'),
(59, 'Tung Nguyen costed 929 from our shop', 'icon-shopping-cart', '2019-08-28 22:39:18'),
(60, 'Tung Nguyen costed 2628 from our shop', 'icon-shopping-cart', '2019-08-28 22:42:40'),
(61, 'Tung Nguyen costed 2628 from our shop', 'icon-shopping-cart', '2019-08-28 22:45:29'),
(62, 'Tung Nguyen costed 1830 from our shop', 'icon-shopping-cart', '2019-08-28 22:46:36'),
(63, 'Tung Nguyen costed 1830 from our shop', 'icon-shopping-cart', '2019-08-28 22:46:43'),
(64, 'Nguyễn Đức Tùng costed 299 from our shop', 'icon-shopping-cart', '2019-08-28 22:47:47'),
(65, 'Nguyễn Đức Tùng costed 299 from our shop', 'icon-shopping-cart', '2019-08-28 22:48:56'),
(66, 'Tung Nguyen costed 1299 from our shop', 'icon-shopping-cart', '2019-08-28 22:49:12'),
(67, 'Tung Nguyen costed 1299 from our shop', 'icon-shopping-cart', '2019-08-28 22:49:13'),
(68, 'Nguyễn Đức Tùng costed 899 from our shop', 'icon-shopping-cart', '2019-08-28 22:50:46'),
(69, 'Nguyễn Đức Tùng costed 899 from our shop', 'icon-shopping-cart', '2019-08-28 22:51:50'),
(70, 'Nguyễn Đức Tùng costed 180 from our shop', 'icon-shopping-cart', '2019-08-28 22:52:48'),
(71, 'Nguyễn Đức Tùng costed 90 from our shop', 'icon-shopping-cart', '2019-08-28 22:54:24'),
(72, 'Nguyen Khanh Long costed 6525 from our shop', 'icon-shopping-cart', '2019-08-30 04:17:10'),
(73, 'Cao Vân Anh costed 450 from our shop', 'icon-shopping-cart', '2019-08-30 12:59:14'),
(74, 'Nguyen DUc Tung costed 899 from our shop', 'icon-shopping-cart', '2019-09-18 04:31:11'),
(75, 'Nguyen Duc TUng costed 2097 from our shop', 'icon-shopping-cart', '2019-09-28 11:48:52'),
(76, 'Nguyễn Đức Tùng costed 699 from our shop', 'icon-shopping-cart', '2019-09-28 11:50:22'),
(77, 'Tung Nguyen costed 1800 from our shop', 'icon-shopping-cart', '2019-09-28 12:08:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `avatar` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ID`, `name`, `category_id`, `brand_id`, `avatar`, `stock`, `price`, `description`, `created_by`, `created_at`, `status`) VALUES
(2, 'Iphone 4', 20, 4, '1565946454product04.jpg ', 26, 1111, '<h1>iPhone 4 - Technical Specifications</h1>\r\n\r\n<h3>Size and weight1</h3>\r\n\r\n<p>Height:</p>\r\n\r\n<p><strong>4.5</strong>&nbsp;inches (115.2 mm)</p>\r\n\r\n<p>Width:</p>\r\n\r\n<p><strong>2.31</strong>&nbsp;inches (58.6 mm)</p>\r\n\r\n<p>Depth:</p>\r\n\r\n<p><strong>0.37</strong>&nbsp;inch (9.3 mm)</p>\r\n\r\n<p>Weight:</p>\r\n\r\n<p><strong>4.8</strong>&nbsp;ounces (137 grams)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>Cellular and wireless</h3>\r\n\r\n<ul>\r\n	<li>GSM model: UMTS/HSDPA/HSUPA (850, 900, 1900, 2100 MHz); GSM/EDGE (850, 900, 1800, 1900 MHz)</li>\r\n	<li>CDMA model: CDMA EV-DO Rev. A (800, 1900 MHz)</li>\r\n	<li>802.11b/g/n Wi-Fi (802.11n 2.4GHz only)</li>\r\n	<li>Bluetooth 2.1 + EDR wireless technology</li>\r\n</ul>\r\n\r\n<h3>Location</h3>\r\n\r\n<ul>\r\n	<li>Assisted GPS</li>\r\n	<li>Digital compass</li>\r\n	<li>Wi-Fi</li>\r\n	<li>Cellular</li>\r\n</ul>\r\n\r\n<h3>Power and battery2</h3>\r\n\r\n<ul>\r\n	<li>Built-in rechargeable lithium-ion battery</li>\r\n	<li>Charging via USB to computer system or power adapter</li>\r\n	<li>Talk time:\r\n	<p>Up to 7 hours on 3G</p>\r\n\r\n	<p>Up to 14 hours on 2G (GSM model only)</p>\r\n	</li>\r\n	<li>Standby time: Up to 300 hours</li>\r\n	<li>Internet use:\r\n	<p>Up to 6 hours on 3G</p>\r\n\r\n	<p>Up to 10 hours on Wi-Fi</p>\r\n	</li>\r\n	<li>Video playback: Up to 10 hours</li>\r\n	<li>Audio playback: Up to 40 hours</li>\r\n</ul>\r\n\r\n<h3>Mac system requirements</h3>\r\n\r\n<ul>\r\n	<li>Mac computer with USB 2.0 port</li>\r\n	<li>Mac OS X v10.5.8 or later</li>\r\n	<li>iTunes 10.1 or later (free download from www.itunes.com/download)</li>\r\n	<li>iTunes Store account</li>\r\n	<li>Internet access</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 'Ngô Bảo Nhung', '2020-06-04 04:21:32', 'inactive'),
(4, 'Iphone 2', 20, 4, '1565625392topic_iphone_2g.png', 16, 450, '<p>On January 9, 2007 the late Steve Jobs put sneaker to Macworld stage to give one of the most incredible keynote presentations of his life - a life filled with incredible keynotes - and in the history of consumer electronics. There, he said he would be introducing a wide-screen iPod with touch controls, a revolutionary mobile phone, and a breakthrough internet device. But it wasn&#39;t three products. It was one product. We got it. It was the iPhone.</p>\r\n\r\n<p>After setting up and knocking down everything from the physical keyboard and stylus pens that dominated BlackBerry, Motorola, and Palm smartphones of the day, Jobs went over the multitouch interface that let the iPhone smoothly pinch-to-zoom, and the delightful interface that included touches like inertia and rubber banding in the scrolling, and the multitasking that let him move seamlessly from music to call to web to email and back.</p>\r\n\r\n<h2>iPhone: Technology alone wasn&#39;t enough</h2>\r\n\r\n<p>The original iPhone, code named M68 and model number iPhone1,1, had a 3.5-inch screen at 320x480 and 163ppi, a quad-band 2G EDGE data radio, 802.11b.g Wi-Fi, Bluetooth 2.0 EDR, and a 2 megapixel camera. It was powered by an ARM-based Samsung 1176JZ(F)-S processor and PowerVR MBX Lite 3D graphics, with an 1400 mAh battery, and had 128MB of RAM on board, as well as 4GB or 8GB of NAND Flash storage. The iPhone could also be charged - and synced to iTunes - via the same 30-pin Dock connector as Apple&#39;s incredibly popular iPod.</p>\r\n\r\n<p>The iPhone did include several sensors to enhance the user experience, including an accelerometer that could automatically rotate the screen to match device orientation, a proximity sensor that could automatically turn off the screen when close to the face, and an ambient light sensor to automatically adjust brightness. It also had a remarkably good web browser and rendering engine, especially for its time, in Safari and WebKit.</p>\r\n\r\n<p>What the original iPhone didn&#39;t have was CDMA and EVDO rev A network compatibly. That meant it couldn&#39;t work on two of the U.S.&#39; big four carriers, Verizon and Sprint. Not that it mattered; the original iPhone was exclusive to AT&amp;T. It also lacked GPS, or support for faster 3G UTMS/HSPA data speeds. In addition to no hardware keyboard or stylus, the iPhone also didn&#39;t have a removable, user-replaceable battery. None of that pleased existing power users of the time. Nor did the absence of features like MMS (multi-media messaging), an exposed file system, copy and paste or any form of advanced text editing, and, critically to many, support for third party apps.</p>\r\n\r\n<h2>iPhone: Less is more</h2>\r\n\r\n<p>The original iPhone&#39;s price was also high. It debuted at $499 for the 4GB and $599 for the 8GB model - on-contract. Those prices weren&#39;t unheard of at the time; early Motorola RAZR flip phones were pricey in their day as well. However, it meant Apple couldn&#39;t penetrate the mainstream market.</p>\r\n\r\n<p>On September 5, 2007, at Apple&#39;s &quot;The Beat Goes On&quot; music event, Steve Jobs announced they were dropping the 4GB model entirely, and dropping the price of the 8GB model to $399. On February 5, 2008, at the they introduced a 16GB model. There was still no subsidized price, even on contract, but there was movement.</p>\r\n\r\n<p>By June of 2008, when Apple discontinued the original iPhone - later to be nicknamed the iPhone 2G - total sales had reached over 6 million units. That was on four carriers in four countries. But its impact was felt far beyond those numbers or borders. And it was just beginning...</p>\r\n', 'Ngô Bảo Nhung', '2019-09-28 12:08:46', 'inactive'),
(5, 'Watch', 17, 4, '156568756344-alu-gold-sport-pink-nc-s4-grid.jpg', 23, 600, '<h3><img alt=\"\" src=\"https://support.apple.com/library/APPLE/APPLECARE_ALLGEOS/SP778/SP778-apple-watch-series-4.jpg\" /></h3>\r\n\r\n<h3>Finishes</h3>\r\n\r\n<p><strong>GPS + Cellular</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Stainless Steel</strong>\r\n\r\n	<ul>\r\n		<li>Silver</li>\r\n		<li>Space Black (DLC)</li>\r\n		<li>Gold (PVD)</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Aluminum</strong>\r\n	<ul>\r\n		<li>Silver</li>\r\n		<li>Space Gray</li>\r\n		<li>Gold</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>GPS</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Aluminum</strong>\r\n\r\n	<ul>\r\n		<li>Silver</li>\r\n		<li>Space Gray</li>\r\n		<li>Gold</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>Apple Watch Nike+ available in silver and space gray aluminum.<br />\r\nApple Watch Herm&egrave;s available in polished stainless steel.</p>\r\n\r\n<h3>Features</h3>\r\n\r\n<ul>\r\n	<li>GPS, GLONASS, Galileo, and QZSS</li>\r\n	<li>Barometric altimeter</li>\r\n	<li>Water resistant<br />\r\n	<em>50 meters1</em></li>\r\n	<li>Electrical heart sensor (ECG app)</li>\r\n	<li>Optical heart sensor</li>\r\n	<li>Improved accelerometer<br />\r\n	<em>up to 32 g-forces</em></li>\r\n	<li>Improved gyroscope</li>\r\n	<li>Ambient light sensor</li>\r\n	<li>Capacity 16GB</li>\r\n	<li>All ceramic and sapphire crystal back</li>\r\n</ul>\r\n\r\n<h3>Display</h3>\r\n\r\n<ul>\r\n	<li><strong>44mm</strong><br />\r\n	368 by 448 pixels<br />\r\n	977 sq mm display area</li>\r\n	<li><strong>40mm</strong><br />\r\n	324 by 394 pixels<br />\r\n	759 sq mm display area</li>\r\n	<li><strong>LTPO OLED Retina display with Force Touch</strong><br />\r\n	1000 nits brightness</li>\r\n</ul>\r\n\r\n<h3>Chip</h3>\r\n\r\n<ul>\r\n	<li><strong>S4 with 64-bit dual-core processor</strong><br />\r\n	<em>Up to 2x faster processor</em></li>\r\n	<li><strong>W3</strong><br />\r\n	<em>Apple wireless chip</em></li>\r\n</ul>\r\n\r\n<h3>Connectivity</h3>\r\n\r\n<ul>\r\n	<li><strong>LTE and UMTS2</strong><br />\r\n	GPS + Cellular models<br />\r\n	<a href=\"https://www.apple.com/watch/cellular/\" onclick=\"s_objectID=\">Learn more about available carriers</a></li>\r\n	<li><strong>Wi-Fi</strong><br />\r\n	802.11b/g/n 2.4GHz</li>\r\n	<li><strong>Bluetooth 5.0</strong></li>\r\n</ul>\r\n\r\n<h3>Power</h3>\r\n\r\n<ul>\r\n	<li>Built-in rechargeable lithium-ion battery<br />\r\n	<em>Up to 18 hours3</em></li>\r\n	<li>Magnetic charging cable</li>\r\n	<li>USB power adapter</li>\r\n</ul>\r\n\r\n<h3>Case Size</h3>\r\n\r\n<p><strong>Stainless Steel - 40mm</strong></p>\r\n\r\n<ul>\r\n	<li>Height: 40mm</li>\r\n	<li>Width: 34mm</li>\r\n	<li>Depth: 10.7mm</li>\r\n	<li>Case Weight: 39.8g</li>\r\n</ul>\r\n\r\n<p><strong>Stainless Steel - 44mm</strong></p>\r\n\r\n<ul>\r\n	<li>Height: 44mm</li>\r\n	<li>Width: 38mm</li>\r\n	<li>Depth: 10.7mm</li>\r\n	<li>Case Weight: 47.9g</li>\r\n</ul>\r\n\r\n<p><strong>Aluminum - 40mm</strong></p>\r\n\r\n<ul>\r\n	<li>Height: 40mm</li>\r\n	<li>Width: 34mm</li>\r\n	<li>Depth: 10.7mm</li>\r\n	<li>Case Weight: 30.1g</li>\r\n</ul>\r\n\r\n<p><strong>Aluminum - 44mm</strong></p>\r\n\r\n<ul>\r\n	<li>Height: 44mm</li>\r\n	<li>Width: 38mm</li>\r\n	<li>Depth: 10.7mm</li>\r\n	<li>Case Weight: 36.7g</li>\r\n</ul>\r\n\r\n<hr />\r\n<ol>\r\n	<li>Apple Watch Series 3 and Series 4 have a water resistance rating of 50 meters under ISO standard 22810:2010. This means that they may be used for shallow-water activities like swimming in a pool or ocean. However, they should not be used for scuba diving, waterskiing, or other activities involving high-velocity water or submersion below shallow depth.</li>\r\n	<li>Wireless service plan required for cellular service. Apple Watch and iPhone service provider must be the same. Not available with all service providers. Not all service providers support enterprise accounts or prepaid plans; check with your employer and service provider. Some legacy plans may not be compatible. Roaming is not available. Contact your service provider for more details. Check&nbsp;<a href=\"https://www.apple.com/watch/cellular/\" onclick=\"s_objectID=\">www.apple.com/watch/cellular</a>&nbsp;for participating wireless carriers and eligibility.</li>\r\n	<li>Apple Watch All-Day Battery Life testing was conducted by Apple in August 2018 using preproduction Apple Watch Series 4 (GPS) and Apple Watch Series 4 (GPS + Cellular), each paired with an iPhone; all devices were tested with prerelease software. Battery life varies by use, cellular coverage, configuration, and many other factors; actual results will vary. See&nbsp;<a href=\"https://www.apple.com/batteries\" onclick=\"s_objectID=\">www.apple.com/batteries</a>&nbsp;and&nbsp;<a href=\"https://www.apple.com/watch/battery.html\" onclick=\"s_objectID=\">www.apple.com/watch/battery.html</a>&nbsp;for more information.</li>\r\n</ol>\r\n', 'Ngô Bảo Nhung', '2019-09-28 10:16:34', 'active'),
(6, 'Galaxy Prime', 20, 2, '156568764941jD6CFK3VL._SL500_AC_SS350_.jpg', 24, 450, '<p>Samsung Galaxy Grand Prime smartphone was launched in September 2014. The phone comes with a 5.00-inch touchscreen display with a resolution of 540x960 pixels at a pixel density of 220 pixels per inch (ppi) and an aspect ratio of 16:9.</p>\r\n\r\n<p>Samsung Galaxy Grand Prime is powered by a 1.2GHz quad-core processor. It comes with 1GB of RAM.</p>\r\n\r\n<p>The Samsung Galaxy Grand Prime runs Android 4.4 and is powered by a 2,600mAh removable battery.</p>\r\n\r\n<p>As far as the cameras are concerned, the Samsung Galaxy Grand Prime on the rear packs an 8-megapixel camera with an f/2.4 aperture. The rear camera setup has autofocus. It sports a 5-megapixel camera on the front for selfies, with an f/2.2 aperture.</p>\r\n\r\n<p>Samsung Galaxy Grand Prime based on Android 4.4 and packs 8GB of inbuilt storage that can be expanded via microSD card (up to 32GB). The Samsung Galaxy Grand Prime is a dual-SIM (GSM and GSM) smartphone that accepts Micro-SIM and Micro-SIM cards.</p>\r\n\r\n<p>Connectivity options on the Samsung Galaxy Grand Prime include Wi-Fi 802.11 b/g/n, GPS, Bluetooth v4.00, Micro-USB, FM radioWi-Fi Direct, and 3G. Sensors on the phone include accelerometer, ambient light sensor, proximity sensor, and compass/ magnetometer.</p>\r\n\r\n<p>The Samsung Galaxy Grand Prime measures 144.80 x 72.10 x 8.60mm (height x width x thickness) and weighs 156.00 grams. It bears a plastic body.</p>\r\n\r\n<p>As of 13th August 2019, Samsung Galaxy Grand Prime price in India starts at Rs. 7,899.</p>\r\n', 'Ngô Bảo Nhung', '2019-09-28 10:16:51', 'active'),
(7, 'Galaxy s9', 20, 2, '1565687731636907475981220637_samsung-galaxy-a70-den-1.jpg', 18, 699, '<p>The Samsung Galaxy M40 boasts of many segment-firsts such as a hole-punch display and a vibrating screen for a earpiece. It features a bright and vibrant 6.3-inch full-HD+ PLS TFT LCD display, which has good viewing angles but there&#39;s also a mild vignetting around the edges, which can be distracting. The body is slim and light but the plastic back attracts scuff marks pretty easily.&nbsp;</p>\r\n\r\n<p>It&#39;s powered by a Qualcomm Snapdragon 675 SoC, which is good for gaming but just like the Redmi Note 7 Pro, the chip heats up very quickly when playing heavy games such as PUBG:Mobile. There&#39;s only one variant, which comes with 6GB of RAM and 128GB of storage. The latter is expandable but it&#39;s a hybird slot so you cann&#39;t have two SIMs and a microSD card. OneUI runs well and is based on Android 9 Pie.&nbsp;</p>\r\n\r\n<p>The 32-megapixel primary camera at the back shoots decent pictures under good light, but in low-light, the autofocus is slow and images lack good detail. The wide-angle camera is useful but the quality isn&#39;t great. The 5-megapixel depth sensor works well for objects and pets but not so much for people. Video recording maxes out at 4K but the quality is average and there&#39;s no stabilisation. The 3,500mAh battery lasts all day on one charge, which is a good thing.&nbsp;</p>\r\n\r\n<h2>&nbsp;</h2>\r\n', 'Ngô Bảo Nhung', '2019-09-28 11:53:21', 'active'),
(8, 'Iphone XS max', 20, 4, '1565687832hotsale2.jpg', 20, 1299, '<p>Apple iPhone XS Max smartphone was launched in September 2018. The phone comes with a 6.50-inch touchscreen display with a resolution of 1242x2688 pixels at a pixel density of 458 pixels per inch (ppi).</p>\r\n\r\n<p>Apple iPhone XS Max is powered by a hexa-core Apple A12 Bionic processor.</p>\r\n\r\n<p>The Apple iPhone XS Max supports wireless charging.</p>\r\n\r\n<p>As far as the cameras are concerned, the Apple iPhone XS Max on the rear packs a 12-megapixel primary camera with an f/1.8 aperture and a pixel size of 1.4-micron and a second 12-megapixel camera with an f/2.4 aperture. The rear camera setup has autofocus. It sports a 7-megapixel camera on the front for selfies, with an f/2.2 aperture.</p>\r\n\r\n<p>Apple iPhone XS Max based on iOS 12 and packs 64GB of inbuilt storage. The Apple iPhone XS Max is a dual-SIM (GSM and GSM) smartphone that accepts Nano-SIM and eSIM cards.</p>\r\n\r\n<p>Connectivity options on the Apple iPhone XS Max include Wi-Fi 802.11 a/b/g/n/ac, GPS, Bluetooth v5.00, NFC, Lightning, 3G, and 4G (with support for Band 40 used by some LTE networks in India) with active 4G on both SIM cards. Sensors on the phone include accelerometer, ambient light sensor, barometer, gyroscope, proximity sensor, and compass/ magnetometer. The Apple iPhone XS Max supports face unlock with 3D face recognition.</p>\r\n\r\n<p>The Apple iPhone XS Max measures 157.50 x 77.40 x 7.70mm (height x width x thickness) and weighs 208.00 grams. It was launched in Space Grey, Silver, and Gold colours. It features an IP68 rating for dust and water protection.</p>\r\n\r\n<p>As of 13th August 2019, Apple iPhone XS Max price in India starts at Rs. 108,048.</p>\r\n', 'Dang Minh Anh', '2019-08-30 04:17:10', 'active'),
(9, 'Redmi 3', 20, 3, '1565688307hotsale3.jpg', 24, 299, '<p>The Redmi K20&#39;s aesthetics are appealing&nbsp;and it stands out in a sea of other phones with&nbsp;a glass slab design and gaudy gradients. The 6.39-inch AMOLED display is of excellent quality, and the in-display fingerprint sensor is also quick.</p>\r\n\r\n<p>The triple rear cameras deliver impressive results, and except for the underwhelming low-light performance and some other minor issues, the overall output is a cut above what the competition offers. The phone&#39;s battery life is also great, with the 4,000mAh unit&nbsp;easily making it past a&nbsp;day and more.</p>\r\n\r\n<p>The Snapdragon 730 SoC powering this phone ensures a lag-free usage in even the most demanding situations and delivers a smooth gaming experience. A refined MIUI with fewer ads and features like a dark mode, app drawer, and ambient display are an added bonus on the software side.&nbsp;</p>\r\n', 'Dang Minh Anh', '2019-08-28 22:47:47', 'active'),
(10, 'Iphone 7', 20, 4, '1565688378iphone-7-gold-600x600.jpg', 8, 899, '<p>The Iphone 7&nbsp;aesthetics are appealing&nbsp;and it stands out in a sea of other phones with&nbsp;a glass slab design and gaudy gradients. The 6.39-inch AMOLED display is of excellent quality, and the in-display fingerprint sensor is also quick.</p>\r\n\r\n<p>The triple rear cameras deliver impressive results, and except for the underwhelming low-light performance and some other minor issues, the overall output is a cut above what the competition offers. The phone&#39;s battery life is also great, with the 4,000mAh unit&nbsp;easily making it past a&nbsp;day and more.</p>\r\n\r\n<p>The Snapdragon 730 SoC powering this phone ensures a lag-free usage in even the most demanding situations and delivers a smooth gaming experience. A refined MIUI with fewer ads and features like a dark mode, app drawer, and ambient display are an added bonus on the software side.&nbsp;</p>\r\n', 'Dang Minh Anh', '2019-09-18 04:30:43', 'active'),
(11, 'Miband 2', 17, 3, '1565840086watch1.jpg', 316, 30, '<h2>What is the Xiaomi Mi Band 2?</h2>\r\n\r\n<p>The Mi Band 2 is the latest wearable fitness tracker from Chinese hardware giant Xiaomi. It follows the cheap but feature-rich Mi Band and Mi Band 1S and introduces a screen for the first time in the range, as well as improved pedometer tech, which Xiaomi claims is kinder to the battery.</p>\r\n\r\n<p>The Mi Band 2 is powered by a 70mAh cell that offers approximately 20 days of use on a single charge, and can monitor your steps, heart rate and sleep patterns, as well as display rudimentary notifications for calls, text messages and selected applications. Oh, and it only costs around &pound;35.</p>\r\n', 'Nguyễn Đức Tùng', '2019-08-28 22:54:24', 'active'),
(12, 'Iphone 5', 20, 4, '15659461065s-gold.jpg', 33, 180, '<h3>Capacity1</h3>\r\n\r\n<ul>\r\n	<li>16GB</li>\r\n	<li>32GB</li>\r\n	<li>64GB</li>\r\n</ul>\r\n\r\n<h3>Size and Weight2</h3>\r\n\r\n<ul>\r\n	<li><strong>Height:</strong>&nbsp;4.87 inches (123.8 mm)</li>\r\n	<li><strong>Width:</strong>&nbsp;2.31 inches (58.6 mm)</li>\r\n	<li><strong>Depth:</strong>&nbsp;0.30 inch (7.6 mm)</li>\r\n	<li><strong>Weight:</strong>&nbsp;3.95 ounces (112 grams)</li>\r\n</ul>\r\n\r\n<h3>Cellular and Wireless</h3>\r\n\r\n<ul>\r\n	<li>GSM model A1428*: UMTS/HSPA+/DC-HSDPA (850, 900, 1700/2100, 1900, 2100 MHz); GSM/EDGE (850, 900, 1800, 1900 MHz); LTE (Bands 4 and 17)</li>\r\n	<li>CDMA model A1429*: CDMA EV-DO Rev. A and Rev. B (800, 1900, 2100 MHz); UMTS/HSPA+/DC-HSDPA (850, 900, 1900, 2100 MHz); GSM/EDGE (850, 900, 1800, 1900 MHz); LTE (Bands 1, 3, 5, 13, 25)</li>\r\n	<li>GSM model A1429*: UMTS/HSPA+/DC-HSDPA (850, 900, 1900, 2100 MHz); GSM/EDGE (850, 900, 1800, 1900 MHz); LTE (Bands 1, 3, 5)</li>\r\n	<li>802.11a/b/g/n Wi-Fi (802.11n 2.4GHz and 5GHz)</li>\r\n	<li>Bluetooth 4.0 wireless technology</li>\r\n</ul>\r\n\r\n<h3>Location</h3>\r\n\r\n<ul>\r\n	<li>Assisted GPS and GLONASS</li>\r\n	<li>Digital compass</li>\r\n	<li>Wi-Fi</li>\r\n	<li>Cellular</li>\r\n</ul>\r\n\r\n<h3>Display</h3>\r\n\r\n<ul>\r\n	<li>Retina display</li>\r\n	<li>4-inch (diagonal) widescreen Multi-Touch display</li>\r\n	<li>1136-by-640-pixel resolution at 326 ppi</li>\r\n	<li>800:1 contrast ratio (typical)</li>\r\n	<li>500 cd/m2 max brightness (typical)</li>\r\n	<li>Fingerprint-resistant oleophobic coating on front</li>\r\n	<li>Support for display of multiple languages and characters simultaneously</li>\r\n</ul>\r\n\r\n<h3>Camera, Photos, and Video</h3>\r\n\r\n<ul>\r\n	<li>8-megapixel iSight camera</li>\r\n	<li>Panorama</li>\r\n	<li>Video recording, HD (1080p) up to 30 frames per second with audio</li>\r\n	<li>FaceTime HD camera with 1.2MP photos and HD video (720p) up to 30 frames per second</li>\r\n	<li>Autofocus</li>\r\n	<li>Tap to focus video or still images</li>\r\n	<li>Face detection in video or still images</li>\r\n	<li>LED flash</li>\r\n	<li>Improved video stabilization</li>\r\n	<li>Photo and video geotagging</li>\r\n</ul>\r\n\r\n<h3>External Buttons and Connectors</h3>\r\n\r\n<p>External Buttons and Controls &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Connectors and Input/Output</p>\r\n\r\n<p>&nbsp;<img alt=\"buttons and controls\" src=\"https://support.apple.com/library/APPLE/APPLECARE_ALLGEOS/SP655/sp655_iphone5_connectors.jpg\" /></p>\r\n\r\n<h3>Power and Battery3</h3>\r\n\r\n<ul>\r\n	<li>Built-in rechargeable lithium-ion battery</li>\r\n	<li>Charging via USB to computer system or power adapter</li>\r\n	<li>Talk time: Up to 8 hours on 3G</li>\r\n	<li>Standby time: Up to 225 hours</li>\r\n	<li>Internet use: Up to 8 hours on 3G, up to 8 hours on LTE, up to 10 hours on Wi-Fi</li>\r\n	<li>Video playback: Up to 10 hours</li>\r\n	<li>Audio playback: Up to 40 hours</li>\r\n</ul>\r\n\r\n<h3>Audio Playback</h3>\r\n\r\n<ul>\r\n	<li>Audio formats supported: AAC (8 to 320 Kbps), Protected AAC (from iTunes Store), HE-AAC, MP3 (8 to 320 Kbps), MP3 VBR, Audible (formats 2, 3, 4, Audible Enhanced Audio, AAX, and AAX+), Apple Lossless, AIFF, and WAV</li>\r\n	<li>User-configurable maximum volume limit</li>\r\n</ul>\r\n\r\n<h3>TV and Video</h3>\r\n\r\n<ul>\r\n	<li>AirPlay mirroring and video out to Apple TV (2nd and 3rd generation)</li>\r\n	<li>Video mirroring and video out support: Up to 1080p through Lightning Digital AV Adapter and Lightning to VGA Adapter (adapters sold separately)</li>\r\n	<li>Video formats supported: H.264 video up to 1080p, 30 frames per second, High Profile level 4.1 with AAC-LC audio up to 160 Kbps, 48kHz, stereo audio in .m4v, .mp4, and .mov file formats; MPEG-4 video up to 2.5 Mbps, 640 by 480 pixels, 30 frames per second, Simple Profile with AAC-LC audio up to 160 Kbps per channel, 48kHz, stereo audio in .m4v, .mp4, and .mov file formats; Motion JPEG (M-JPEG) up to 35 Mbps, 1280 by 720 pixels, 30 frames per second, audio in ulaw, PCM stereo audio in .avi file format</li>\r\n</ul>\r\n\r\n<h3>Headphones</h3>\r\n\r\n<ul>\r\n	<li>Apple EarPods with Remote and Mic</li>\r\n	<li>Storage and travel case</li>\r\n</ul>\r\n\r\n<h3>Rating for Hearing Aids</h3>\r\n\r\n<ul>\r\n	<li>iPhone 5 (Model A1428): M3, T4</li>\r\n	<li>iPhone 5 (Model A1429): M4, T4</li>\r\n</ul>\r\n\r\n<h3>Mail Attachment Support</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Viewable Document Types</strong><br />\r\n	.jpg, .tiff, .gif (images); .doc and .docx (Microsoft Word); .htm and .html (web pages); .key (Keynote); .numbers (Numbers); .pages (Pages); .pdf (Preview and Adobe Acrobat); .ppt and .pptx (Microsoft PowerPoint); .txt (text); .rtf (rich text format); .vcf (contact information); .xls and .xlsx (Microsoft Excel)</p>\r\n	</li>\r\n</ul>\r\n', 'Dang Minh Anh', '2019-08-28 22:52:48', 'active'),
(13, 'Gear s3 Pro', 17, 2, '1565948341tải xuống.jpg', 0, 699, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula neque, varius ut augue vitae, placerat accumsan mauris. Nulla facilisi. Curabitur eu est ex. Quisque eget rhoncus ipsum. Aenean non felis malesuada, blandit ex sed, ultricies tortor. Nunc suscipit suscipit est, sit amet feugiat mauris. Fusce elementum, velit non aliquam fringilla, nisi neque molestie ligula, quis finibus justo lectus quis lectus. Etiam malesuada quam at tristique viverra. Nam at suscipit nulla, at interdum risus. Nullam erat nisl, egestas ut nisl id, posuere maximus nunc. Etiam luctus libero ac euismod condimentum. Donec cursus risus ac eleifend porta. Morbi ullamcorper sagittis pharetra. Phasellus ut eleifend elit, et molestie massa. Fusce at turpis in nibh sodales congue. Praesent aliquam diam quis nisi viverra, at aliquet augue malesuada.</p>\r\n\r\n<p>Mauris convallis vulputate risus, vel vehicula magna consectetur quis. Curabitur molestie arcu libero, ut blandit orci blandit in. Duis nulla nulla, venenatis vel metus vel, suscipit rhoncus diam. Donec interdum turpis eget metus rutrum scelerisque. Quisque eget augue accumsan, euismod elit efficitur, luctus tellus. Praesent ut lacus et sem lacinia blandit. Nunc et porttitor tellus.</p>\r\n', 'Dang Minh Anh', '2019-08-28 14:19:27', 'active'),
(14, 'Watch 3', 17, 1, '1566703337Holton-101-001-R06-rubber-front-220x220 (1).jpg', 53, 450, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ligula neque, varius ut augue vitae, placerat accumsan mauris. Nulla facilisi. Curabitur eu est ex. Quisque eget rhoncus ipsum. Aenean non felis malesuada, blandit ex sed, ultricies tortor. Nunc suscipit suscipit est, sit amet feugiat mauris. Fusce elementum, velit non aliquam fringilla, nisi neque molestie ligula, quis finibus justo lectus quis lectus. Etiam malesuada quam at tristique viverra. Nam at suscipit nulla, at interdum risus. Nullam erat nisl, egestas ut nisl id, posuere maximus nunc. Etiam luctus libero ac euismod condimentum. Donec cursus risus ac eleifend porta. Morbi ullamcorper sagittis pharetra. Phasellus ut eleifend elit, et molestie massa. Fusce at turpis in nibh sodales congue. Praesent aliquam diam quis nisi viverra, at aliquet augue malesuada.</p>\r\n\r\n<p>Mauris convallis vulputate risus, vel vehicula magna consectetur quis. Curabitur molestie arcu libero, ut blandit orci blandit in. Duis nulla nulla, venenatis vel metus vel, suscipit rhoncus diam. Donec interdum turpis eget metus rutrum scelerisque. Quisque eget augue accumsan, euismod elit efficitur, luctus tellus. Praesent ut lacus et sem lacinia blandit. Nunc et porttitor tellus.</p>\r\n', 'Dang Minh Anh', '2019-08-30 12:59:14', 'active'),
(15, 'Young ', 20, 2, '1566396476images.jpg', 32, 399, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis sit amet erat dapibus placerat. Phasellus vulputate sapien felis, eu pharetra ligula sagittis eu. Nullam tincidunt, sapien sed cursus eleifend, ipsum dolor tempus urna, vel fermentum libero enim a nulla. Sed lorem justo, viverra at euismod eu, interdum id lorem. Aenean vel lectus ut massa sollicitudin euismod quis nec magna. Aenean sit amet dui sapien. Curabitur interdum non nibh id vulputate. Ut sit amet augue egestas augue laoreet mollis quis eget libero. Donec in enim dui. Nunc et lacinia massa.</p>\r\n\r\n<p>Cras cursus, quam sed pellentesque accumsan, ante dolor tempus justo, at accumsan nibh quam eu lacus. In ultrices, dui blandit hendrerit laoreet, nulla lacus dictum ante, scelerisque consectetur purus diam et enim. Fusce in eros sit amet orci porttitor hendrerit. In ex ante, elementum in magna at, fringilla condimentum tellus. Nulla tristique mauris eu nunc rutrum pharetra. In hac habitasse platea dictumst. Nullam aliquam rhoncus tellus, sit amet posuere tortor viverra a. Donec fringilla fringilla eleifend. Nullam facilisis eros egestas, sodales massa sed, egestas enim. Aenean quis sapien arcu. Praesent vitae luctus metus.</p>\r\n', 'Nguyễn Đức Tùng', '2019-08-21 14:07:56', 'active'),
(16, 'Note 10 +', 20, 2, '1566396578note10p-auraglow_859_622.jpg', 34, 999, '<p>Maecenas quis velit condimentum, facilisis nunc quis, tincidunt nisl. Morbi accumsan felis at aliquam sollicitudin. Vivamus mollis lorem nec bibendum rhoncus. Nam id consequat purus, ac semper dolor. Maecenas maximus egestas malesuada. Etiam ullamcorper orci a eros venenatis, ut viverra massa facilisis. Nulla nibh odio, tempus gravida neque eu, tempus interdum nisl. Nulla fringilla ac risus scelerisque finibus.</p>\r\n\r\n<p>Cras tincidunt leo eget ante malesuada, sit amet maximus mi vulputate. Donec maximus fringilla mauris. Curabitur id gravida lacus, eleifend congue dolor. Proin vitae tortor et erat ornare feugiat non eu elit. Nam lorem nisl, ullamcorper eget diam sit amet, eleifend consequat massa. Phasellus egestas neque turpis, egestas auctor est rutrum sed. Morbi eget diam facilisis, tincidunt eros vel, volutpat risus. Vestibulum quis ornare elit, ut efficitur purus.</p>\r\n', 'Nguyễn Đức Tùng', '2019-08-21 14:09:38', 'active'),
(17, 'S10 Plus', 20, 2, '1566396669product_13934_1.png', 10, 998, '<p>Maecenas quis velit condimentum, facilisis nunc quis, tincidunt nisl. Morbi accumsan felis at aliquam sollicitudin. Vivamus mollis lorem nec bibendum rhoncus. Nam id consequat purus, ac semper dolor. Maecenas maximus egestas malesuada. Etiam ullamcorper orci a eros venenatis, ut viverra massa facilisis. Nulla nibh odio, tempus gravida neque eu, tempus interdum nisl. Nulla fringilla ac risus scelerisque finibus.</p>\r\n\r\n<p>Cras tincidunt leo eget ante malesuada, sit amet maximus mi vulputate. Donec maximus fringilla mauris. Curabitur id gravida lacus, eleifend congue dolor. Proin vitae tortor et erat ornare feugiat non eu elit. Nam lorem nisl, ullamcorper eget diam sit amet, eleifend consequat massa. Phasellus egestas neque turpis, egestas auctor est rutrum sed. Morbi e<em>get diam fa</em>cilisis, tincidunt eros vel, volutpat risus. Vestibulum quis ornare elit, ut efficitur purus.</p>\r\n', 'Nguyễn Đức Tùng', '2019-08-21 14:11:09', 'active'),
(18, 'Z10 note', 20, 2, '1566396830415-1.jpg', 31, 299, '<p>Maecenas quis velit condimentum, facilisis nunc quis, tincidunt nisl. Morbi accumsan felis at aliquam sollicitudin. Vivamus mollis lorem nec bibendum rhoncus. Nam id consequat purus, ac semper dolor. Maecenas maximus egestas malesuada. Etiam ullamcorper orci a eros venenatis, ut viverra massa facilisis. Nulla nibh odio, tempus gravida neque eu, tempus interdum nisl. Nulla fringilla ac risus scelerisque finibus.</p>\r\n\r\n<p>Cras tincidunt leo eget ante malesuada, sit amet maximus mi vulputate. Donec maximus fringilla mauris. Curabitur id gravida lacus, eleifend congue dolor. Proin vitae tortor et erat ornare feugiat non eu elit. Nam lorem nisl, ullamcorper eget diam sit amet, eleifend consequat massa. Phasellus egestas neque turpis, egestas auctor est rutrum sed. Morbi eget diam facilisis, tincidunt eros vel, volutpat risus. Vestibulum quis ornare elit, ut efficitur purus.</p>\r\n', 'Ngô Bảo Nhung', '2019-09-28 10:17:29', 'active'),
(19, 'Luxury watch 2.0', 17, 3, '1566703476tải xuống (2).jpg', 10, 899, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi aliquam tincidunt justo vel rutrum. In tristique convallis justo, vel elementum nisi consectetur sed. Curabitur nec mi at magna vulputate egestas. In sed nibh id ex feugiat venenatis. Praesent porttitor enim gravida facilisis ullamcorper. Maecenas ullamcorper a enim eu ultricies. Proin malesuada nunc vitae tempor ultricies. Nam egestas neque ipsum, vel viverra nisi convallis nec. Sed efficitur enim et dui scelerisque imperdiet id a diam. Nulla cursus lorem massa, et tristique velit lobortis nec. Nunc dapibus felis vestibulum dolor molestie, maximus ornare nunc pharetra. In hac habitasse platea dictumst. Mauris ac lacinia quam, a faucibus justo.</p>\r\n', 'Dang Minh Anh', '2019-08-28 22:50:46', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `contents` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`ID`, `product_id`, `fullname`, `likes`, `comments`, `contents`, `created_at`) VALUES
(1, 13, 'Nguyen Dung', 0, 0, 'hay', '2019-08-18 02:02:38'),
(2, 6, 'Nguyễn Đức Tùng', 0, 0, 'aaa', '2019-08-18 02:02:58'),
(3, 6, 'Tung Nguyen', 0, 0, 'dasfsdf', '2019-08-18 02:03:02'),
(4, 6, 'Tung Nguyen', 0, 0, 'aadasd', '2019-08-18 02:03:40'),
(5, 6, 'Nguyễn Đức Tùng', 0, 0, 'dasdfdsf', '2019-08-18 02:15:48'),
(6, 6, 'Tung Nguyen', 0, 0, 'wfwew', '2019-08-18 02:16:21'),
(7, 7, 'Tung Nguyen', 0, 0, 'Chào anh em\r\n', '2019-08-18 02:51:04'),
(8, 7, 'Hồ Minh Anh', 0, 0, 'hello anh em\r\n', '2019-08-18 02:52:16'),
(9, 7, 'Nguyễn Đức Tùng', 0, 0, 'chào anh em', '2019-08-18 02:52:39'),
(10, 6, 'Nguyễn Đức Tùng', 0, 0, 'dasdfsdf', '2019-08-18 02:53:41'),
(11, 6, 'Hồ Minh Anh', 0, 0, 'Dep vai dai', '2019-08-18 03:10:31'),
(12, 6, 'Nguyen Duc Tung', 0, 0, '12234223', '2019-08-18 03:11:19'),
(13, 7, 'Tung Nguyen', 0, 0, 'Lien minh huyen thoai', '2019-08-18 03:18:34'),
(14, 4, 'Nguyen Duc Anh', 0, 0, 'San pham nay gia bao nhieu ad', '2019-08-18 03:21:47'),
(15, 4, 'Nguyen Duc Anh', 0, 0, 'San pham dep, rat phu hop voi chung em', '2019-08-18 03:22:13'),
(16, 7, 'Nguyen Duc Anh', 0, 0, 'San pham nay dep, cho 5*', '2019-08-18 03:23:35'),
(17, 9, 'Nguyễn Đức Tùng', 0, 0, 'Tuyet voi', '2019-08-18 03:36:45'),
(18, 8, 'Nguyen Duc Tung', 0, 0, 'Cho minh xin gia voi', '2019-08-18 03:41:17'),
(19, 13, 'Nguyen Duc Tung', 0, 0, 'tung dep zai', '2019-08-18 03:45:29'),
(20, 14, 'Hồ Minh Anh', 0, 0, 'rất chất', '2019-08-18 04:31:28'),
(21, 16, 'Nguyễn Đức Tùng', 0, 0, 'How much this phone?', '2019-08-21 14:17:10'),
(22, 7, 'Nguyễn Khánh Long', 0, 0, 'Đẹp vãi l', '2019-08-25 10:39:32'),
(23, 13, 'Hồ Minh Anh', 0, 0, 'qá đẹp', '2019-09-28 12:09:52'),
(24, 6, 'Nguyễn A', 0, 0, 'hay vãi đái', '2019-10-28 16:40:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `ID` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Content` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Outdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`ID`, `type`, `Content`, `description`, `status`, `Outdate`) VALUES
(1, 'discount_by_percent', '40', '8JP4L', 'inactive', '2019-08-30'),
(2, 'discount_by_percent', '40', 'aSNKT', 'inactive', '2019-08-30'),
(3, 'discount_by_percent', '25', 'yyjLW', 'inactive', '2019-08-30'),
(4, 'discount_by_percent', '40', '3yCWt', 'inactive', '2019-08-30'),
(5, 'discount_by_percent', '80', 'K2ijJ', 'inactive', '2019-08-31'),
(6, 'discount_by_percent', '25', 'FWxyx', 'active', '2019-09-29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_ID`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `history_point`
--
ALTER TABLE `history_point`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `history_point`
--
ALTER TABLE `history_point`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
