-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 12:56 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbangiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `namepro` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `img` varchar(255) NOT NULL,
  `mota` text DEFAULT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0,
  `iddm` int(11) NOT NULL,
  `status` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `namepro`, `price`, `discount`, `img`, `mota`, `luotxem`, `iddm`, `status`) VALUES
(37, 'Giày Adidas Superstar Adifom Đen Siêu Cấp', 850000, 90000, 'adidas-superstar-adifom-den.png', 'Giày Adidas Superstar Adifom Đen Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 41, 21, b'00'),
(38, 'Giày Adidas Superstar Adifom Trắng Siêu Cấp', 900000, 2000000, 'adidas-superstar-adifom-trang.png', 'Giày Adidas Superstar Adifom Trắng Siêu Cấp với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 129, 21, b'01'),
(39, 'Giày Nike Air Jordan 1 Retro High Dior Like Auth 99%', 2500000, 5000000, '126.png', 'Giày Nike Air Jordan 1 Retro High Dior Like Auth 99% với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 37, 18, b'00'),
(40, 'Giày MLB Liner Mid Monogram NY', 890000, 1500000, 'giay-mlb-liner-mid-monogram-ny.png', 'Giày MLB Liner Mid Monogram NY với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 135, 20, b'01'),
(42, 'Giày Louis Vuitton LV Trainer Monogram Denim White Blue', 600000, 0, 'giay-louis-vuitton-lv-trainer-monogram-denim-white-blue.png', 'Giày Louis Vuitton LV Trainer Monogram Denim White Blue với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 46, 24, b'01'),
(43, ' Giày LV Trainer Monogram Denim Đen Trắng Siêu Cấp Like Auth', 900000, 2000000, '1-1.png', 'Giày LV Trainer Monogram Denim Đen Trắng với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 17, 24, b'01'),
(44, 'Giày Louis Vuitton LV Trainer Sneaker 1A9JHD Màu Trắng Vàng', 900000, 2000000, 'louis-vuitton-lv-trainer-sneaker-1a9jhd-mau-trang-vang.png', 'Giày Louis Vuitton LV Trainer Sneaker 1A9JHD Màu Trắng Vàng với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 21, 24, b'01'),
(45, 'Giày MLB Bigball Chunky Boston Red Sox Màu Trắng Rep 1:1', 950000, 0, '91.png', 'Giày MLB Bigball Chunky Boston Red Sox Màu Trắng Rep 1:1 với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 40, 20, b'01'),
(46, 'Giày Converse Chuck Taylor All Star 1970s White', 530000, 0, 'giay-converse-chuck-taylor-all-star-1970s-white-high-trang-co-cao-1.png', 'Giày Converse Chuck Taylor All Star 1970s White – High Trắng Cổ cao với thiết kế đẹp, tinh tế & màu sắc vô cùng dễ phối đồ. Vậy nên đôi giày này trở nên phổ biến, mang tính biểu tượng và được rất nhiều giới trẻ yêu thích.', 63, 19, b'01'),
(47, 'Giày AF1 x Louis Vuitton White Brown', 820000, 1600000, 'giay-af1-x-louis-vuitton-white-brown.png', 'Giày AF1 x Louis Vuitton White Brown là phiên bản độc lạ hiện nay ở Việt Nam ít ai có. Shop nhập về được số lượng ít, giá cực tốt cho mọi người trải nghiệm.', 219, 24, b'01'),
(48, 'bape camo', 10000000, 10000, '341008248_1313890086142631_6976051355699636901_n.jpg', 'gfds', 11, 29, b'00'),
(49, 'bape star', 1234567, 234567, '001FWI701007I_BEI_A_480x480.webp', '', 11, 29, b'01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_sanpham_danhmuc` (`iddm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `lk_sanpham_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
