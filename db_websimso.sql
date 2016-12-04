-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2016 at 10:14 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_websimso`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauhinhloinhuan`
--

CREATE TABLE IF NOT EXISTS `cauhinhloinhuan` (
`ID` int(11) NOT NULL,
  `PhanTram` int(11) NOT NULL,
  `TuGia` int(11) NOT NULL,
  `DenGia` int(11) NOT NULL,
  `ChuGiai` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cauhinhloinhuan`
--

INSERT INTO `cauhinhloinhuan` (`ID`, `PhanTram`, `TuGia`, `DenGia`, `ChuGiai`) VALUES
(1, 20, 50000, 500000, '20% lãi khi bán sim giá từ 50 ngàn đến 500 ngàn'),
(2, 12, 500000, 2000000, '12% lãi khi bán sim giá từ 500 ngàn đến 2tr'),
(3, 8, 2000000, 10000000, '8% lãi khi bán sim giá từ 2tr đến 10tr'),
(4, 5, 10000000, 100000000, '5% lãi khi bán sim giá từ 2tr đến 10tr'),
(5, 3, 100000000, 500000000, '3% lãi khi bán sim giá từ 100tr đến 500 tr');

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE IF NOT EXISTS `chitietdonhang` (
`ID` int(5) NOT NULL,
  `DonHangID` int(5) DEFAULT NULL,
  `SimID` int(5) DEFAULT NULL,
  `So` varchar(120) CHARACTER SET utf8 NOT NULL,
  `DonGia` float DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=115 ;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`ID`, `DonHangID`, `SimID`, `So`, `DonGia`) VALUES
(108, 83, 164, '0945678999', 266000000),
(109, 84, 146, '0912029999', 280000000),
(112, 87, 179, '01275797979', 11400000),
(114, 89, 179, '01275797979', 11400000),
(113, 88, 179, '01275797979', 11400000);

-- --------------------------------------------------------

--
-- Table structure for table `dauso`
--

CREATE TABLE IF NOT EXISTS `dauso` (
  `ID` int(11) NOT NULL,
  `DauSo` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dauso`
--

INSERT INTO `dauso` (`ID`, `DauSo`) VALUES
(0, '0914');

-- --------------------------------------------------------

--
-- Table structure for table `namsinh`
--

CREATE TABLE IF NOT EXISTS `namsinh` (
  `ID` int(11) NOT NULL,
  `NamSinh` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `namsinh`
--

INSERT INTO `namsinh` (`ID`, `NamSinh`) VALUES
(0, '1975');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE IF NOT EXISTS `nguoidung` (
`ID` int(50) NOT NULL,
  `HoTen` varchar(70) NOT NULL,
  `TaiKhoan` varchar(120) NOT NULL,
  `HinhAnh` varchar(120) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `CapDo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`ID`, `HoTen`, `TaiKhoan`, `HinhAnh`, `Email`, `DiaChi`, `MatKhau`, `CapDo`) VALUES
(6, 'ad', 'admin', 'images/nuoc-hoa.jpg', 'beatup.perfect@gmail.com', 'ha noi', 'e10adc3949ba59abbe56e057f20f883e', 1),
(7, 'Hoang', 'hoang', 'images/cuc.png', 'anh.hoang939@gmail.com', 'Thai Nguyen', '3ea7c160d15ba00942b53ace1b8dba25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhomsim`
--

CREATE TABLE IF NOT EXISTS `nhomsim` (
`ID` int(50) NOT NULL,
  `TenNhom` varchar(70) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `nhomsim`
--

INSERT INTO `nhomsim` (`ID`, `TenNhom`) VALUES
(1, 'Sim ngày sinh'),
(2, 'Sim tam hoa'),
(3, 'Sim tứ quý'),
(4, 'Sim Thần Tài');

-- --------------------------------------------------------

--
-- Table structure for table `nhomtin`
--

CREATE TABLE IF NOT EXISTS `nhomtin` (
`ID` int(11) NOT NULL,
  `TenNhom` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nhomtin`
--

INSERT INTO `nhomtin` (`ID`, `TenNhom`) VALUES
(1, 'Tin Khuyến mại');

-- --------------------------------------------------------

--
-- Table structure for table `simso`
--

CREATE TABLE IF NOT EXISTS `simso` (
`ID` int(11) NOT NULL,
  `MaNhom` int(11) NOT NULL,
  `So` varchar(100) NOT NULL,
  `DonGia` float NOT NULL,
  `Tong` int(11) NOT NULL,
  `Nut` int(11) NOT NULL,
  `KieuSim` int(11) NOT NULL,
  `DaBan` int(11) NOT NULL,
  `NgayBan` datetime NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `simso`
--

INSERT INTO `simso` (`ID`, `MaNhom`, `So`, `DonGia`, `Tong`, `Nut`, `KieuSim`, `DaBan`, `NgayBan`, `TrangThai`) VALUES
(136, 3, '0915779999', 855000000, 65, 5, 10, 0, '0000-00-00 00:00:00', 0),
(137, 3, '0917118888', 855000000, 51, 1, 10, 0, '0000-00-00 00:00:00', 0),
(138, 3, '0915689999', 855000000, 65, 5, 10, 0, '0000-00-00 00:00:00', 0),
(139, 3, '0911339999', 360000000, 53, 3, 10, 0, '0000-00-00 00:00:00', 0),
(141, 3, '0911168888', 350000000, 50, 0, 10, 0, '0000-00-00 00:00:00', 0),
(142, 3, '0919828888', 331000000, 61, 1, 10, 0, '0000-00-00 00:00:00', 0),
(143, 3, '0916338888', 290000000, 54, 4, 10, 0, '0000-00-00 00:00:00', 0),
(144, 3, '0914568888', 290000000, 57, 7, 10, 0, '0000-00-00 00:00:00', 0),
(145, 3, '0915679999', 285000000, 64, 4, 10, 0, '0000-00-00 00:00:00', 0),
(146, 3, '0912029999', 280000000, 50, 0, 10, 0, '0000-00-00 00:00:00', 0),
(147, 3, '0912818888', 27700000, 53, 3, 10, 0, '0000-00-00 00:00:00', 0),
(148, 3, '0917559999', 257000000, 63, 3, 10, 0, '0000-00-00 00:00:00', 0),
(149, 1, '0919891989', 119000000, 63, 3, 10, 0, '0000-00-00 00:00:00', 0),
(150, 1, '0918222000', 38000000, 24, 4, 10, 0, '0000-00-00 00:00:00', 0),
(151, 1, '0916222000', 38000000, 22, 2, 10, 0, '0000-00-00 00:00:00', 0),
(152, 1, '0911111991', 37000000, 33, 3, 10, 0, '0000-00-00 00:00:00', 0),
(153, 1, '0919081987', 37000000, 52, 2, 10, 0, '0000-00-00 00:00:00', 0),
(154, 1, '0911111986', 37000000, 37, 7, 10, 0, '0000-00-00 00:00:00', 0),
(155, 1, '0917991991', 37000000, 55, 5, 10, 0, '0000-00-00 00:00:00', 0),
(156, 1, '0946991999', 27000000, 65, 5, 10, 0, '0000-00-00 00:00:00', 0),
(157, 1, '0919291999', 27000000, 58, 8, 10, 0, '0000-00-00 00:00:00', 0),
(158, 1, '0918901969', 27000000, 52, 2, 10, 0, '0000-00-00 00:00:00', 0),
(159, 1, '0919991975', 27000000, 59, 9, 10, 0, '0000-00-00 00:00:00', 0),
(160, 1, '0919991983', 27000000, 58, 8, 10, 0, '0000-00-00 00:00:00', 0),
(161, 1, '0911111979', 26000000, 39, 9, 10, 0, '0000-00-00 00:00:00', 0),
(162, 1, '0913091999', 26000000, 50, 0, 10, 0, '0000-00-00 00:00:00', 0),
(163, 1, '0919861999', 24000000, 61, 1, 10, 0, '0000-00-00 00:00:00', 0),
(164, 2, '0945678999', 266000000, 66, 6, 10, 0, '0000-00-00 00:00:00', 0),
(165, 2, '0913881888', 83000000, 54, 4, 10, 0, '0000-00-00 00:00:00', 0),
(166, 2, '0919393999', 62000000, 61, 1, 10, 0, '0000-00-00 00:00:00', 0),
(167, 2, '0916161666', 63000000, 42, 2, 10, 0, '0000-00-00 00:00:00', 0),
(168, 2, '0912181888', 55000000, 46, 6, 10, 0, '0000-00-00 00:00:00', 0),
(169, 2, '0919168999', 46000000, 61, 1, 10, 0, '0000-00-00 00:00:00', 0),
(170, 2, '01256667888', 46000000, 57, 7, 11, 0, '0000-00-00 00:00:00', 0),
(171, 2, '01239993999', 46000000, 63, 3, 11, 0, '0000-00-00 00:00:00', 0),
(172, 2, '0913977999', 44000000, 63, 3, 10, 0, '0000-00-00 00:00:00', 0),
(173, 2, '0919881888', 43000000, 60, 0, 10, 0, '0000-00-00 00:00:00', 0),
(174, 2, '0918966999', 42000000, 66, 6, 10, 0, '0000-00-00 00:00:00', 0),
(175, 2, '01236688999', 40000000, 61, 1, 11, 0, '0000-00-00 00:00:00', 0),
(176, 2, '01238883888', 37000000, 57, 7, 11, 0, '0000-00-00 00:00:00', 0),
(177, 2, '0919295999', 37000000, 62, 2, 10, 0, '0000-00-00 00:00:00', 0),
(178, 2, '0917995999', 36000000, 67, 7, 10, 1, '2016-03-03 20:36:48', 0),
(179, 4, '01275797979', 11400000, 63, 3, 11, 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thongtindonhang`
--

CREATE TABLE IF NOT EXISTS `thongtindonhang` (
`ID` int(5) NOT NULL,
  `HoTen` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GhiChu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThoiGian` datetime DEFAULT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=90 ;

--
-- Dumping data for table `thongtindonhang`
--

INSERT INTO `thongtindonhang` (`ID`, `HoTen`, `DienThoai`, `DiaChi`, `GhiChu`, `ThoiGian`, `TrangThai`) VALUES
(83, 'Hong', '01626525939', 'Thái Nguyên', 'Test', '2016-03-04 02:06:46', 0),
(84, 'Hung', '0199999999', 'Thái Nguyên', 'Nhanh', '2016-03-04 02:10:41', 0),
(87, 'Anh', '01693546137', 'Thái Nguyên', 'Test', '2016-03-04 08:47:05', 0),
(88, 'Hoàng Thị Hồng', '01693546137', 'Hưng Yên', 'test', '2016-03-04 08:48:01', 0),
(89, 'Chí Văn Phèo', '01666666666', 'Ha Noi', 'Nhanh', '2016-03-04 09:35:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE IF NOT EXISTS `tintuc` (
`ID` int(11) NOT NULL,
  `MaNhom` int(11) NOT NULL,
  `TieuDe` varchar(200) NOT NULL,
  `TomTat` text NOT NULL,
  `NoiDung` text NOT NULL,
  `TacGia` varchar(100) NOT NULL,
  `HinhAnh` varchar(130) NOT NULL,
  `TrangThai` int(10) NOT NULL,
  `LuotXem` int(50) NOT NULL,
  `NgayTao` varchar(70) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`ID`, `MaNhom`, `TieuDe`, `TomTat`, `NoiDung`, `TacGia`, `HinhAnh`, `TrangThai`, `LuotXem`, `NgayTao`) VALUES
(1, 0, 'Bài viết giới thiệu về công ty', '                                                                                             ', '&lt;p&gt;\r\n	VNPT Huyện Ph&amp;uacute; B&amp;igrave;nh - Th&amp;aacute;i Nguy&amp;ecirc;n l&amp;agrave; đơn vị trực thuộc VNPT Th&amp;aacute;i Nguy&amp;ecirc;n cung cấp đầy đủ c&amp;aacute;c sản phẩm v&amp;agrave; dịch vụ Viễn th&amp;ocirc;ng v&amp;agrave; c&amp;ocirc;ng nghệ th&amp;ocirc;ng tin&lt;/p&gt;\r\n&lt;p style="text-align: center;"&gt;\r\n	&lt;img alt="Trụ sở VNPT Thái Nguyên" spfieldtype="null" src="http://localhost/webvnpt/images/vnptthainguyen.jpg" title="Trụ sở VNPT Thái Nguyên, số 10 đường Cách Mạng Tháng 8, thành phố Thái Nguyên" /&gt;&lt;/p&gt;\r\n&lt;p style="text-align: center;font-weight: bold;color:red;"&gt;\r\n	Trụ sở VNPT Th&amp;aacute;i Nguy&amp;ecirc;n, số 10 đường C&amp;aacute;ch Mạng Th&amp;aacute;ng 8, th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/p&gt;\r\n&lt;p&gt;\r\n	C&amp;aacute;c hoạt động ch&amp;iacute;nh:&lt;/p&gt;\r\n&lt;p&gt;\r\n	- Đ&amp;aacute;p ứng c&amp;aacute;c dịch vụ: điện thoại cố định, fax, di động Vinaphone, cố định kh&amp;ocirc;ng d&amp;acirc;y Gphone, Internet băng rộng ADSL - FiberVnn, truyền h&amp;igrave;nh theo y&amp;ecirc;u cầu myTV.&lt;/p&gt;\r\n&lt;p&gt;\r\n	- Cung cấp c&amp;aacute;c dịch vụ gi&amp;aacute; trị gia tăng như: hiển thị số, b&amp;aacute;o thức, chuyển cuộc gọi, hộp thư thoại VoiceMail...&lt;/p&gt;\r\n&lt;p&gt;\r\n	- Cung cấp c&amp;aacute;c thiết bị: tổng đ&amp;agrave;i nội bộ, điện thoại để b&amp;agrave;n, điện thoại k&amp;eacute;o d&amp;agrave;i, m&amp;aacute;y fax, điện thoại di động, m&amp;aacute;y t&amp;iacute;nh, m&amp;aacute;y văn ph&amp;ograve;ng...&lt;/p&gt;\r\n&lt;p&gt;\r\n	Với uy t&amp;iacute;n của VNPT, với sự phục vụ tận t&amp;igrave;nh, chu đ&amp;aacute;o, với phương ch&amp;acirc;m v&amp;igrave; :&amp;quot;Cuộc sống đ&amp;iacute;ch thực&amp;quot;, ch&amp;uacute;ng t&amp;ocirc;i mang đến kh&amp;aacute;ch h&amp;agrave;ng:&lt;/p&gt;\r\n&lt;p&gt;\r\n	- C&amp;aacute;c sản phẩm thương hiệu uy t&amp;iacute;n , nguồn gốc, xuất xứ r&amp;otilde; r&amp;agrave;ng, gi&amp;aacute; cả hợp l&amp;yacute; nhất.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Qu&amp;yacute; kh&amp;aacute;ch cũng c&amp;oacute; thể đặt h&amp;agrave;ng qua web, điện thoại, fax, e-mail. Ch&amp;uacute;ng t&amp;ocirc;i sẵn l&amp;ograve;ng phục vụ tận nơi theo y&amp;ecirc;u cầu của Qu&amp;yacute; kh&amp;aacute;ch v&amp;agrave; giao h&amp;agrave;ng miễn ph&amp;iacute; trong Huyện.&lt;/p&gt;\r\n&lt;p&gt;\r\n	Xin ch&amp;acirc;n th&amp;agrave;nh cảm ơn Qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng, c&amp;aacute;c đối t&amp;aacute;c v&amp;agrave; c&amp;aacute;c cơ quan quản l&amp;yacute; Nh&amp;agrave; nước v&amp;igrave; sự quan t&amp;acirc;m ủng hộ d&amp;agrave;nh cho Viễn th&amp;ocirc;ng trong suốt thời gian qua. Rất mong tiếp tục nhận được sự hợp t&amp;aacute;c v&amp;agrave; ủng hộ nhiều hơn nữa của Qu&amp;yacute; vị trong thời gian tới!&lt;/p&gt;\r\n&lt;p&gt;\r\n	Sự h&amp;agrave;i l&amp;ograve;ng của Qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng l&amp;agrave; sự ph&amp;aacute;t triển của ch&amp;uacute;ng t&amp;ocirc;i!&lt;/p&gt;\r\n', 'Admin', 'images/cuuvuive.jpg', 1, 12, '2016-02-23 22:40:05'),
(2, 1, 'Cách mua sim và thanh toán', '               Bước 1: ĐẶT SIM\r\nQuý khách chọn số sim và đặt hàng trên web hoặc gọi điện đến một trong các số hotline hỗ trợ khách hàng của VNPT.\r\n\r\nBước 2: XÁC NHẬN\r\nKhi nhận được đơn hàng nhân viên bán hàng sẽ kiểm tra số trong kho và gọi điện lại báo cho Quý khách.                                 ', '&lt;p&gt;\r\n	&lt;span style="font-size:small"&gt;&lt;u&gt;&lt;span style="color:rgb(0, 0, 255)"&gt;&lt;strong&gt;Bước 1&lt;/strong&gt;&lt;/span&gt;&lt;/u&gt;&lt;span style="color:rgb(0, 0, 255)"&gt;&lt;strong&gt;:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;&lt;strong&gt;ĐẶT SIM&lt;/strong&gt;&lt;br /&gt;\r\n	Qu&amp;yacute; kh&amp;aacute;ch chọn số sim v&amp;agrave;&amp;nbsp;&lt;/span&gt;đặt h&amp;agrave;ng tr&amp;ecirc;n web&lt;span style="font-size: small;"&gt;&amp;nbsp;&lt;/span&gt;&lt;span style="font-size: small;"&gt;hoặc gọi điện đến một trong c&amp;aacute;c số hotline hỗ trợ kh&amp;aacute;ch h&amp;agrave;ng của VNPT.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style="font-size:small"&gt;&lt;u&gt;&lt;span style="color:rgb(0, 0, 255)"&gt;&lt;strong&gt;Bước 2&lt;/strong&gt;&lt;/span&gt;&lt;/u&gt;&lt;span style="color:rgb(0, 0, 255)"&gt;&lt;strong&gt;:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;&lt;strong&gt;X&amp;Aacute;C NHẬN&lt;/strong&gt;&lt;br /&gt;\r\n	Khi nhận được đơn h&amp;agrave;ng nh&amp;acirc;n vi&amp;ecirc;n b&amp;aacute;n h&amp;agrave;ng sẽ kiểm tra số trong kho v&amp;agrave; gọi điện lại b&amp;aacute;o cho Qu&amp;yacute; kh&amp;aacute;ch.&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;u&gt;&lt;span style="color:rgb(0, 0, 255)"&gt;&lt;strong&gt;Bước 3&lt;/strong&gt;&lt;/span&gt;&lt;/u&gt;&lt;span style="color:rgb(0, 0, 255)"&gt;&lt;strong&gt;:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;&lt;strong&gt;GIAO H&amp;Agrave;NG&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; Kh&amp;aacute;ch h&amp;agrave;ng ở Th&amp;aacute;i Nguy&amp;ecirc;n, H&amp;agrave; Nội, TP.HCM: &lt;/strong&gt;VNPT giao sim v&amp;agrave; thu tiền tại nh&amp;agrave; Qu&amp;yacute; kh&amp;aacute;ch.&lt;br /&gt;\r\n	&lt;strong&gt;&amp;bull; Kh&amp;aacute;ch h&amp;agrave;ng ở tỉnh th&amp;agrave;nh kh&amp;aacute;c:&lt;/strong&gt; Qu&amp;yacute; kh&amp;aacute;ch chuyển tiền mua sim v&amp;agrave;o t&amp;agrave;i khoản ng&amp;acirc;n h&amp;agrave;ng của VNPT, c&amp;ocirc;ng ty sẽ gửi sim về nh&amp;agrave; qu&amp;yacute; kh&amp;aacute;ch qua chuyển ph&amp;aacute;t nhanh, thời gian 24h. Th&amp;ocirc;ng tin về t&amp;agrave;i khoản ng&amp;acirc;n h&amp;agrave;ng xem ph&amp;iacute;a dưới đ&amp;acirc;y.&lt;br /&gt;\r\n	&lt;br /&gt;\r\n	&lt;span style="font-size:small"&gt;&lt;strong&gt;&lt;u&gt;Lưu &amp;yacute;:&lt;/u&gt;&lt;/strong&gt;&lt;/span&gt;&lt;br /&gt;\r\n	&amp;bull; Kh&amp;aacute;ch h&amp;agrave;ng cần chuẩn bị trước th&amp;ocirc;ng tin c&amp;aacute; nh&amp;acirc;n (tr&amp;ecirc;n CMND) để được v&amp;agrave;o t&amp;ecirc;n ch&amp;iacute;nh chủ sở hữu sim.&lt;br /&gt;\r\n	&lt;span style="font-size:small"&gt;&amp;bull; Qu&amp;yacute; kh&amp;aacute;ch c&amp;oacute; thể nhận sim nhanh hơn bằng c&amp;aacute;ch mang theo CMND ra điểm giao dịch của nh&amp;agrave; mạng để y&amp;ecirc;u cầu cấp lại sim (sau khi VNPT đ&amp;atilde; ho&amp;agrave;n tất việc sang t&amp;ecirc;n).&lt;br /&gt;\r\n	&amp;bull; &lt;strong&gt;VNPT sẽ kh&amp;ocirc;ng chịu tr&amp;aacute;ch nhiệm nếu Qu&amp;yacute; kh&amp;aacute;ch gửi tiền mua sim v&amp;agrave;o số t&amp;agrave;i khoản kh&amp;ocirc;ng nằm trong danh s&amp;aacute;ch dưới đ&amp;acirc;y:&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;table border="1" cellpadding="3" cellspacing="1" style="width:575px"&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/vietcombank.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;0301000303430&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng Vietcombank chi nh&amp;aacute;nh Ho&amp;agrave;n Kiếm, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/agribank.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;1508205137740&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng N&amp;ocirc;ng nghiệp &amp;amp; PTNT chi nh&amp;aacute;nh Tam Trinh, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/msb.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;03101015112355&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng Maritime bank chi nh&amp;aacute;nh Đống Đa, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/bidv.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;12310000385988&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng BIDV chi nh&amp;aacute;nh Quang Trung, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/techcombank.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;19025901742018&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng Techcombank chi nh&amp;aacute;nh Nguyễn An Ninh, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/acb.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;139271479&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng ACB chi nh&amp;aacute;nh Tương Mai, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/vietinbank.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n				Số TK: &lt;strong&gt;711A71216714&lt;/strong&gt;&lt;br /&gt;\r\n				Ng&amp;acirc;n h&amp;agrave;ng Vietinbank chi nh&amp;aacute;nh Hai B&amp;agrave; Trưng, H&amp;agrave; Nội&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				&lt;img spfieldtype="null" src="https://simthanglong.vn/images/donga.gif" style="height:65px; width:100px" /&gt;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				&lt;p&gt;\r\n					Chủ TK: Trần Thị Dạ Lan&lt;br /&gt;\r\n					Số TK: &lt;strong&gt;0108176283&lt;/strong&gt;&lt;br /&gt;\r\n					Ng&amp;acirc;n h&amp;agrave;ng Đ&amp;ocirc;ng &amp;Aacute; chi nh&amp;aacute;nh Trần Đại Nghĩa, H&amp;agrave; Nội&lt;/p&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', 'Admin', 'images/thanh-toan.png', 1, 3, '2016-03-04 02:44:23'),
(4, 1, 'VNPT Thái Nguyên tổ chức trao giải Chương trình Quay số trúng thưởng ', 'Ngày 18/09/2015, VNPT Thái Nguyên đã tiến hành buổi lễ trao giải cho khách hàng may mắn trúng thưởng trong chương trình quay số trúng thưởng "Chào mùa hè năm 2015" được tổ chức vào ngày 04/09/2015.                 ', '&lt;p class="quote"&gt;\r\n	Ng&amp;agrave;y 18/09/2015, VNPT Th&amp;aacute;i Nguy&amp;ecirc;n đ&amp;atilde; tiến h&amp;agrave;nh buổi lễ trao giải cho kh&amp;aacute;ch h&amp;agrave;ng may mắn tr&amp;uacute;ng thưởng trong chương tr&amp;igrave;nh quay số tr&amp;uacute;ng thưởng &amp;quot;Ch&amp;agrave;o m&amp;ugrave;a h&amp;egrave; năm 2015&amp;quot; được tổ chức v&amp;agrave;o ng&amp;agrave;y 04/09/2015.&lt;/p&gt;\r\n&lt;p class="news-content"&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;div&gt;\r\n	Tham dự buổi lễ c&amp;oacute; đồng ch&amp;iacute; Nguyễn Anh Tuấn - B&amp;iacute; thư Đảng ủy, Gi&amp;aacute;m đốc Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n, đồng ch&amp;iacute; Nguyễn Minh Hồng - Ph&amp;oacute; Gi&amp;aacute;m đốc Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n c&amp;ugrave;ng c&amp;aacute;c qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng đ&amp;atilde; may mắn tr&amp;uacute;ng giải của chương tr&amp;igrave;nh.&lt;/div&gt;\r\n&lt;div&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;\r\n	Tại buổi lễ, Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n đ&amp;atilde; trao:&lt;/div&gt;\r\n&lt;div&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;\r\n	- 01 Giải Nhất (01 tivi Sony 42 inch) cho &amp;ocirc;ng Đo&amp;agrave;n Văn Sy, x&amp;oacute;m La Hang, x&amp;atilde; Mỹ Y&amp;ecirc;n, Đại Từ;&lt;/div&gt;\r\n&lt;div&gt;\r\n	- 01 Giải Nh&amp;igrave; (01 Ipad) cho hợp t&amp;aacute;c x&amp;atilde; Quần Sơn, x&amp;oacute;m Sơn Cầu, x&amp;atilde; Ho&amp;aacute; Thượng, Đồng Hỷ;&lt;/div&gt;\r\n&lt;div&gt;\r\n	- 02 Giải Ba (mỗi giải 01 STB v&amp;agrave; 01 năm sử dụng miễn ph&amp;iacute; dịch vụ Internet v&amp;agrave; MyTV) cho &amp;ocirc;ng Nguyễn Th&amp;aacute;i Hải, tổ 5, phường Mỏ Ch&amp;egrave;, Tp S&amp;ocirc;ng C&amp;ocirc;ng v&amp;agrave; b&amp;agrave; Triệu B&amp;iacute;ch Ngọc, x&amp;oacute;m Th&amp;aacute;i Sơn 2, x&amp;atilde; Quyết Thắng, Tp Th&amp;aacute;i Nguy&amp;ecirc;n.&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;\r\n	-10 Giải Khuyến kh&amp;iacute;ch (mỗi giải 01 năm sử dụng miễn ph&amp;iacute; dịch vụ Internet) Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n sẽ trao qu&amp;agrave; trực tiếp tại địa chỉ của kh&amp;aacute;ch h&amp;agrave;ng.&lt;/div&gt;\r\n&lt;div&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div&gt;\r\n	&lt;strong&gt;Một số h&amp;igrave;nh ảnh của chương tr&amp;igrave;nh:&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;strong&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/traogiai1%281%29.jpg" style="width:500px;height:326px;" /&gt;&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;Ảnh: Đ/c Nguyễn Anh Tuấn - Gi&amp;aacute;m đốc Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n trao giải Nhất cho kh&amp;aacute;ch h&amp;agrave;ng may mắn tr&amp;uacute;ng giải&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/traogiai2%281%29.jpg" style="width:500px;height:305px;" /&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;Ảnh: Đ/c Nguyễn Minh Hồng - Ph&amp;oacute; Gi&amp;aacute;m đốc Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n trao 01 giải Nh&amp;igrave; v&amp;agrave; 02 giải Ba cho c&amp;aacute;c kh&amp;aacute;ch h&amp;agrave;ng may mắn tr&amp;uacute;ng thưởng&lt;/em&gt;&lt;/div&gt;\r\n', 'Admin', 'images/traogiai1.jpg', 1, 4, '2016-03-03 23:30:30'),
(5, 1, 'VNPT Thái Nguyên tổ chức chương trình quay số trúng thưởng ', 'Nằm trong chuỗi các hoạt động tri ân, chăm sóc khách hàng đã tin tưởng sử dụng dịch vụ VT-CNTT của VNPT Thái Nguyên.                                 ', '&lt;p class="quote"&gt;\r\n	Nằm trong chuỗi c&amp;aacute;c hoạt động tri &amp;acirc;n, chăm s&amp;oacute;c kh&amp;aacute;ch h&amp;agrave;ng đ&amp;atilde; tin tưởng sử dụng dịch vụ VT-CNTT của VNPT Th&amp;aacute;i Nguy&amp;ecirc;n.&lt;/p&gt;\r\n&lt;p class="news-content"&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;\r\n	Ng&amp;agrave;y 04/09/2015, Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n tổ chức chương tr&amp;igrave;nh quay số tr&amp;uacute;ng thưởng &amp;quot;Ch&amp;agrave;o m&amp;ugrave;a h&amp;egrave; năm 2015&amp;quot;.Chương tr&amp;igrave;nh được triển khai từ th&amp;aacute;ng 06/2015 d&amp;agrave;nh cho những kh&amp;aacute;ch h&amp;agrave;ng sử dụng dịch vụ MegaVNN trọn g&amp;oacute;i kh&amp;ocirc;ng ph&amp;aacute;t sinh nợ cước v&amp;agrave; dịch vụ MegaVNN, FiberVNN h&amp;ograve;a mạng th&amp;ecirc;m dịch vụ MyTV Gold hoặc Gold HD, c&amp;aacute;c kh&amp;aacute;ch h&amp;agrave;ng chuyển đổi g&amp;oacute;i cước thấp l&amp;ecirc;n g&amp;oacute;i cước cao, kh&amp;aacute;ch h&amp;agrave;ng chuyển từ Doanh nghiệp kh&amp;aacute;c sang...&lt;/p&gt;\r\n&lt;p&gt;\r\n	Trước sự chứng kiến của đại diện Sở Th&amp;ocirc;ng tin v&amp;agrave; Truyền th&amp;ocirc;ng tỉnh Th&amp;aacute;i Nguy&amp;ecirc;n, Sở C&amp;ocirc;ng thương tỉnh Th&amp;aacute;i Nguy&amp;ecirc;n v&amp;agrave; đ&amp;ocirc;ng đảo người d&amp;acirc;n tham gia chương tr&amp;igrave;nh quay số, Chương tr&amp;igrave;nh &amp;nbsp;đ&amp;atilde; x&amp;aacute;c định c&amp;aacute;c kh&amp;aacute;ch h&amp;agrave;ng tr&amp;uacute;ng 01 Giải Nhất (01 tivi Sony 42 inch), 01 Giải Nh&amp;igrave; (01 Ipad), 02 Giải Ba (mỗi giải 01 STB v&amp;agrave; 01 năm sử dụng miễn ph&amp;iacute; dịch vụ Internet v&amp;agrave; MyTV) v&amp;agrave; 10 Giải Khuyến kh&amp;iacute;ch (mỗi giải 01 năm sử dụng miễn ph&amp;iacute; dịch vụ Internet). Tổng trị gi&amp;aacute; giải thưởng hơn 50 triệu đồng.&lt;/p&gt;\r\n&lt;div&gt;\r\n	&lt;strong&gt;Một số h&amp;igrave;nh ảnh tại chương tr&amp;igrave;nh:&lt;/strong&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/quasohe2015_1.jpg" style="width:500px;height:341px;" /&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;Ảnh: Đ/c Nguyễn Minh Hồng - Ph&amp;oacute; Gi&amp;aacute;m đốc Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n ph&amp;aacute;t biểu khai mạc chương tr&amp;igrave;nh&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/quasohe2015_2.jpg" style="width:500px;height:343px;" /&gt;&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;&amp;nbsp;&lt;/em&gt;&lt;em&gt;Ảnh: Đ/c Đo&amp;agrave;n Khắc Thuận - Ch&amp;aacute;nh văn ph&amp;ograve;ng Sở Th&amp;ocirc;ng tin v&amp;agrave; Truyền th&amp;ocirc;ng ph&amp;aacute;t biểu tại chương tr&amp;igrave;nh&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/quasohe2015_3.jpg" style="width:500px;height:350px;" /&gt;&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;Ảnh: Đ/c Nguyễn Thị Thanh Hảo - Ph&amp;oacute; ph&amp;ograve;ng Quản l&amp;yacute; Thương mại, Sở C&amp;ocirc;ng thương tỉnh Th&amp;aacute;i Nguy&amp;ecirc;n ph&amp;aacute;t biểu tại chương tr&amp;igrave;nh&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/quasohe2015_4.jpg" style="width:500px;height:303px;" /&gt;&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;Ảnh: Tiết mục văn nghệ ch&amp;agrave;o mừng&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&amp;nbsp;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/23/files/images/quasohe2015_5.jpg" style="width:500px;height:319px;" /&gt;&lt;/em&gt;&lt;/div&gt;\r\n&lt;div style="text-align:center;"&gt;\r\n	&lt;em&gt;Ảnh: Tiết mục văn nghệ ch&amp;agrave;o mừng&lt;/em&gt;&lt;/div&gt;\r\n', 'Admin', 'images/quasohe2015_1.jpg', 1, 1, '2016-03-03 23:31:47'),
(6, 1, 'Chương trình chăm sóc khách hàng nhân kỷ niệm 18 năm thành lập mạng Vinaphone', 'Nhân kỷ niệm 18 năm thành lập mạng Vinaphone, VNPT Thái Nguyên phối hợp cùng Vinaphone thực hiện chương trình chăm sóc khách hàng sử dụng dịch vụ Vinaphone như sau:                                 ', '&lt;p class="quote"&gt;\r\n	Nh&amp;acirc;n kỷ niệm 18 năm th&amp;agrave;nh lập mạng Vinaphone, VNPT Th&amp;aacute;i Nguy&amp;ecirc;n phối hợp c&amp;ugrave;ng Vinaphone thực hiện chương tr&amp;igrave;nh chăm s&amp;oacute;c kh&amp;aacute;ch h&amp;agrave;ng sử dụng dịch vụ Vinaphone như sau:&lt;/p&gt;\r\n&lt;p class="news-content"&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;1. Tổ chức chương tr&amp;igrave;nh b&amp;aacute;n h&amp;agrave;ng ưu đ&amp;atilde;i; Tặng qu&amp;agrave; cho kh&amp;aacute;ch h&amp;agrave;ng mua h&amp;agrave;ng; Tặng phiếu bốc thăm tr&amp;uacute;ng thưởng tại c&amp;aacute;c điểm giao dịch của Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n từ ng&amp;agrave;y 20/6/2014 đến 30/6/2014.&lt;/span&gt;&lt;/p&gt;\r\n&lt;p style="text-align: center;"&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;&lt;img alt="" height="219" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/cats_4.jpg" width="560" /&gt;&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;2. Tặng qu&amp;agrave; tri &amp;acirc;n kh&amp;aacute;ch h&amp;agrave;ng kh&amp;aacute;ch h&amp;agrave;ng sử dụng dịch vụ vinaphone trung th&amp;agrave;nh l&amp;acirc;u năm: Từ ng&amp;agrave;y 20/6/2014 đến 31/7/2014&lt;span class="Apple-converted-space"&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;- Tặng Sim Ezcom KM cho L&amp;atilde;nh đạo c&amp;aacute;c CQ/DN&amp;hellip;, với ch&amp;iacute;nh s&amp;aacute;ch ưu đ&amp;atilde;i: khuyến mại 1.2GB/th&amp;aacute;ng trong 24.&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;- Tặng qu&amp;agrave; kh&amp;aacute;ch h&amp;agrave;ng sử dụng dịch vụ vinaphone trung th&amp;agrave;nh l&amp;acirc;u năm.&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;+ Thu&amp;ecirc; bao trả sau, c&amp;oacute; thời gian v&amp;agrave;o mạng từ 10 &amp;divide; 15 năm, C&amp;oacute; mức cước ph&amp;aacute;t sinh b&amp;igrave;nh qu&amp;acirc;n t&amp;iacute;nh từ th&amp;aacute;ng 6/2013 đến th&amp;aacute;ng 3/2014 đạt &amp;ge; 500.000đồng&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;+ Thu&amp;ecirc; bao trả sau, c&amp;oacute; thời gian v&amp;agrave;o mạng &amp;gt; 15 năm, kh&amp;ocirc;ng ph&amp;acirc;n biệt doanh thu&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;+&amp;nbsp; Thu&amp;ecirc; bao trả trước đang hoạt động 2 chiều, c&amp;oacute; thời hạn sử dụng đến năm 2038, c&amp;oacute; mức nạp thẻ b&amp;igrave;nh qu&amp;acirc;n trong 9 th&amp;aacute;ng (từ th&amp;aacute;ng 6/2013 đến th&amp;aacute;ng 2/2014) &amp;ge; 200.000 đồng;&lt;/span&gt;&lt;/p&gt;\r\n&lt;div align="center" style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;\r\n	LỊCH TỔ CHỨC TRUYỀN TH&amp;Ocirc;NG KỶ NIỆM 18 NĂM NG&amp;Agrave;Y TH&amp;Agrave;NH LẬP VNP TẠI C&amp;Aacute;C TRUNG T&amp;Acirc;M TRỰC THUỘC VNPT TH&amp;Aacute;I NGUY&amp;Ecirc;N&lt;br /&gt;\r\n	&lt;div align="center"&gt;\r\n		&lt;br /&gt;\r\n		&lt;table border="1" cellpadding="1" cellspacing="1" summary="" width="500"&gt;\r\n			&lt;tbody&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						&lt;strong&gt;STT&lt;/strong&gt;&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						&lt;strong&gt;Địa điểm tổ chức&lt;/strong&gt;&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						&lt;strong&gt;Thời gian&lt;/strong&gt;&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						1&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Chợ B&amp;igrave;nh Y&amp;ecirc;n &amp;ndash; Huyện Định H&amp;oacute;a&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 26/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						2&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Giao dịch Trung t&amp;acirc;m VT Ph&amp;uacute; Lương&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 23/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						3&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Giao dịch Trung t&amp;acirc;m VT Đại Từ&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 28/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						4&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						S&amp;acirc;n Đ&amp;agrave;i tưởng niệm &amp;ndash; Huyện Đồng Hỷ&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 24/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						5&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Giao dịch Trung t&amp;acirc;m VT V&amp;otilde; Nhai&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 25/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						6&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Giao dịch Trung t&amp;acirc;m VT S&amp;ocirc;ng C&amp;ocirc;ng&lt;span class="Apple-converted-space"&gt;&amp;nbsp;&lt;/span&gt;&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 27/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n				&lt;tr&gt;\r\n					&lt;td align="center"&gt;\r\n						7&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Giao dịch Trung t&amp;acirc;m &amp;ndash; T&amp;ograve;a nh&amp;agrave; VNPT Th&amp;aacute;i Nguy&amp;ecirc;&lt;/td&gt;\r\n					&lt;td align="center"&gt;\r\n						Ng&amp;agrave;y 26/6/2014&lt;/td&gt;\r\n				&lt;/tr&gt;\r\n			&lt;/tbody&gt;\r\n		&lt;/table&gt;\r\n	&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n', 'Admin', 'images/cats_4.jpg', 1, 4, '2016-03-03 23:34:04');
INSERT INTO `tintuc` (`ID`, `MaNhom`, `TieuDe`, `TomTat`, `NoiDung`, `TacGia`, `HinhAnh`, `TrangThai`, `LuotXem`, `NgayTao`) VALUES
(7, 1, 'Chương trình quay số trúng thưởng “Lộc đầu xuân”', 'Nhằm tri ân Quý khách hàng đã tin tưởng sử dụng dịch vụ VT-CNTT của VNPT. Ngày 18/4/2014, Viễn thông Thái Nguyên tổ chức chương trình quay số với chủ đề “Lộc đầu xuân” đối với khách hàng sử dụng dịch vụ MyTV, MegaVNN có mức cước sử dụng bình quân (tính gộp nếu sử dụng đồng thời hai dịch vụ) trên 100.000 đồng (không bao gồm tiền khuyến mại, chiết khấu và thuế VAT) trong 03 tháng 01, 02, 03/2014                                 ', '&lt;p class="quote"&gt;\r\n	Nhằm tri &amp;acirc;n Qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng đ&amp;atilde; tin tưởng sử dụng dịch vụ VT-CNTT của VNPT. Ng&amp;agrave;y 18/4/2014, Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n tổ chức chương tr&amp;igrave;nh quay số với chủ đề &amp;ldquo;Lộc đầu xu&amp;acirc;n&amp;rdquo; đối với kh&amp;aacute;ch h&amp;agrave;ng sử dụng dịch vụ MyTV, MegaVNN c&amp;oacute; mức cước sử dụng b&amp;igrave;nh qu&amp;acirc;n (t&amp;iacute;nh gộp nếu sử dụng đồng thời hai dịch vụ) tr&amp;ecirc;n 100.000 đồng (kh&amp;ocirc;ng bao gồm tiền khuyến mại, chiết khấu v&amp;agrave; thuế VAT) trong 03 th&amp;aacute;ng 01, 02, 03/2014&lt;/p&gt;\r\n&lt;p class="news-content"&gt;\r\n	&amp;nbsp;&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;Nhằm tri &amp;acirc;n Qu&amp;yacute; kh&amp;aacute;ch h&amp;agrave;ng đ&amp;atilde; tin tưởng sử dụng dịch vụ VT-CNTT của VNPT. Ng&amp;agrave;y 18/4/2014, Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n tổ chức chương tr&amp;igrave;nh quay số với chủ đề &amp;ldquo;Lộc đầu xu&amp;acirc;n&amp;rdquo; đối với kh&amp;aacute;ch h&amp;agrave;ng sử dụng dịch vụ MyTV, MegaVNN c&amp;oacute; mức cước sử dụng b&amp;igrave;nh qu&amp;acirc;n (t&amp;iacute;nh gộp nếu sử dụng đồng thời hai dịch vụ) tr&amp;ecirc;n 100.000 đồng (kh&amp;ocirc;ng bao gồm tiền khuyến mại, chiết khấu v&amp;agrave; thuế VAT) trong 03 th&amp;aacute;ng 01, 02, 03/2014. Chứng kiến buổi quay số tr&amp;uacute;ng thưởng c&amp;oacute; đại diện Sở Th&amp;ocirc;ng tin v&amp;agrave; Truyền th&amp;ocirc;ng, Sở C&amp;ocirc;ng thương, B&amp;aacute;o Th&amp;aacute;i Nguy&amp;ecirc;n, Truyền h&amp;igrave;nh Th&amp;aacute;i Nguy&amp;ecirc;n v&amp;agrave; đại diện một số kh&amp;aacute;ch h&amp;agrave;ng tr&amp;ecirc;n địa b&amp;agrave;n.&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;C&amp;ugrave;ng ng&amp;agrave;y diễn ra chương tr&amp;igrave;nh quay số, Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n thực hiện b&amp;aacute;n h&amp;agrave;ng ng&amp;agrave;y v&amp;agrave;ng với gi&amp;aacute; ưu đ&amp;atilde;i v&amp;agrave; tổ chức bốc thăm tr&amp;uacute;ng thưởng cho kh&amp;aacute;ch h&amp;agrave;ng mua c&amp;aacute;c sản phẩm VT-CNTT tại giao dịch Trung t&amp;acirc;m Viễn th&amp;ocirc;ng&amp;nbsp; Th&amp;aacute;i Nguy&amp;ecirc;n.&lt;span class="Apple-converted-space"&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;Kết th&amp;uacute;c chương tr&amp;igrave;nh, Viễn th&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n đ&amp;atilde; x&amp;aacute;c định được c&amp;aacute;c kh&amp;aacute;ch h&amp;agrave;ng may mắn tr&amp;uacute;ng thưởng:&lt;/span&gt;&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;strong style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;- 01 Giải nhất: Tivi LCD LED LG LN5400 47 inch v&amp;agrave; 01 STB HD&lt;/strong&gt;&lt;span style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;float:none;background-color:rgb(255,255,255);"&gt;&lt;span class="Apple-converted-space"&gt;&amp;nbsp;&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;\r\n&lt;table border="1" cellpadding="1" cellspacing="1" style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" summary="" width="500"&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				STT&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Số thu&amp;ecirc; bao/UserName&lt;/td&gt;\r\n			&lt;td&gt;\r\n				T&amp;ecirc;n kh&amp;aacute;ch h&amp;agrave;ng&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Địa chỉ&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				1&lt;/td&gt;\r\n			&lt;td&gt;\r\n				phong228lxa&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Nguyễn Đại Phong&lt;/td&gt;\r\n			&lt;td&gt;\r\n				C&amp;aacute;n 650 Đường Lưu nh&amp;acirc;n tr&amp;uacute;&amp;nbsp; Tổ 27 Phường Trung Th&amp;agrave;nh Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n&lt;p&gt;\r\n	&lt;strong style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;- 02 Giải Nh&amp;igrave;: Tivi LCD LED LG LN5400 42 inch v&amp;agrave; 01 STB HD&lt;/strong&gt;&lt;/p&gt;\r\n&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n&lt;table border="1" cellpadding="1" cellspacing="1" style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" summary="" width="500"&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				STT&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Số thu&amp;ecirc; bao/UserName&lt;/td&gt;\r\n			&lt;td&gt;\r\n				T&amp;ecirc;n kh&amp;aacute;ch h&amp;agrave;ng&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Địa chỉ&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				1&lt;/td&gt;\r\n			&lt;td&gt;\r\n				vuanhdung21&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Vũ Anh Dũng&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Tổ 1 Phường Trưng Vương Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				2&lt;/td&gt;\r\n			&lt;td&gt;\r\n				tnn-dtu-son847&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Nguyễn Thị Sơn&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Đội 4 (X&amp;oacute;m T&amp;aacute;o) X&amp;atilde; H&amp;ugrave;ng Sơn Huyện Đại Từ Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n&lt;p&gt;\r\n	&lt;strong style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;- 02 Giải Ba: M&amp;aacute;y t&amp;iacute;nh bảng Samsung Galaxy Tab 3 Lite- 7inch&lt;/strong&gt;&lt;/p&gt;\r\n&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n&lt;table border="1" cellpadding="1" cellspacing="1" style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" summary="" width="500"&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				STT&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Số thu&amp;ecirc; bao/UserName&lt;/td&gt;\r\n			&lt;td&gt;\r\n				T&amp;ecirc;n kh&amp;aacute;ch h&amp;agrave;ng&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Địa chỉ&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				1&lt;/td&gt;\r\n			&lt;td&gt;\r\n				tloipl&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Trạm Khai Th&amp;aacute;c Thuỷ Lợi Ph&amp;uacute; Lương&lt;/td&gt;\r\n			&lt;td&gt;\r\n				TK Cầu Trắng Thị trấn Đu Huyện Ph&amp;uacute; Lương Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				2&lt;/td&gt;\r\n			&lt;td&gt;\r\n				hvanchitlg&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Ho&amp;agrave;ng Văn Ch&amp;iacute;&lt;/td&gt;\r\n			&lt;td&gt;\r\n				X&amp;oacute;m L&amp;agrave;ng Mới X&amp;atilde; T&amp;acirc;n Long Huyện Đồng Hỷ Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n&lt;p&gt;\r\n	&lt;strong style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;- 10 giải Khuyến kh&amp;iacute;ch: 01 điện thoại di động Nokia 108 (2 sim)&lt;/strong&gt;&lt;/p&gt;\r\n&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n&lt;table border="1" cellpadding="1" cellspacing="1" style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" summary="" width="500"&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				STT&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Số thu&amp;ecirc; bao/UserName&lt;/td&gt;\r\n			&lt;td&gt;\r\n				T&amp;ecirc;n kh&amp;aacute;ch h&amp;agrave;ng&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Địa chỉ&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				1&lt;/td&gt;\r\n			&lt;td&gt;\r\n				scg-82836&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Trường tiểu học B&amp;aacute; Xuy&amp;ecirc;n&lt;/td&gt;\r\n			&lt;td&gt;\r\n				X&amp;atilde; B&amp;aacute; Xuy&amp;ecirc;n Thị x&amp;atilde;&amp;nbsp; S&amp;ocirc;ng C&amp;ocirc;ng Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				2&lt;/td&gt;\r\n			&lt;td&gt;\r\n				hongchammb&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Trần Quang H&amp;ugrave;ng&lt;/td&gt;\r\n			&lt;td&gt;\r\n				19 Tổ 6 Phường Ho&amp;agrave;ng Văn Thụ Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				3&lt;/td&gt;\r\n			&lt;td&gt;\r\n				quangdaiqt&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Phạm Quảng Đại&lt;/td&gt;\r\n			&lt;td&gt;\r\n				X&amp;atilde; Sơn Cẩm Huyện Ph&amp;uacute; Lương Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				4&lt;/td&gt;\r\n			&lt;td&gt;\r\n				huy598pyn&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Nguyễn Văn Huy&lt;/td&gt;\r\n			&lt;td&gt;\r\n				X&amp;oacute;m Y&amp;ecirc;n Ninh 5 Thị Trấn Ba H&amp;agrave;ng Huyện Phổ Y&amp;ecirc;n Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				5&lt;/td&gt;\r\n			&lt;td&gt;\r\n				tnn-qt-oanh&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Đồng Kim Oanh&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Tổ 21 Phường Qu&amp;aacute;n Triều Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				6&lt;/td&gt;\r\n			&lt;td&gt;\r\n				tnn-lx-ctygangthep&lt;/td&gt;\r\n			&lt;td&gt;\r\n				C&amp;ocirc;ng ty cổ phần Gang th&amp;eacute;p Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Phường Cam Gi&amp;aacute; Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				7&lt;/td&gt;\r\n			&lt;td&gt;\r\n				son697pl&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Tạ Minh Sơn&lt;/td&gt;\r\n			&lt;td&gt;\r\n				X&amp;oacute;m cổng đồn X&amp;atilde; Cổ Lung Huyện Ph&amp;uacute; Lương Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				8&lt;/td&gt;\r\n			&lt;td&gt;\r\n				mndoclaplx&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Trường Mầm non Độc Lập&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Phường Trung Th&amp;agrave;nh Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				9&lt;/td&gt;\r\n			&lt;td&gt;\r\n				tnn-tp-hien944px&lt;/td&gt;\r\n			&lt;td&gt;\r\n				L&amp;ecirc; Thị Hiền&lt;/td&gt;\r\n			&lt;td&gt;\r\n				2A Tổ 19 Phường Ph&amp;uacute; X&amp;aacute; Th&amp;agrave;nh phố Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n				10&lt;/td&gt;\r\n			&lt;td&gt;\r\n				ngocquocpl&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Trần Ngọc Quốc&lt;/td&gt;\r\n			&lt;td&gt;\r\n				Giang Kh&amp;aacute;nh Thị Trấn Giang Ti&amp;ecirc;n Huyện Ph&amp;uacute; Lương Th&amp;aacute;i Nguy&amp;ecirc;n&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n&lt;p&gt;\r\n	&lt;br style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-style:normal;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);" /&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;Một số h&amp;igrave;nh ảnh của chương tr&amp;igrave;nh:&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/loc-dau-xuan-VNPT-TN-1.jpg" /&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;Ảnh: H&amp;igrave;nh ảnh chương tr&amp;igrave;nh quay số&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/loc-dau-xuan-VNPT-TN-2.jpg" /&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;Ảnh: H&amp;igrave;nh ảnh chương tr&amp;igrave;nh quay số&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/loc-dau-xuan-VNPT-TN-3.jpg" /&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;Ảnh: H&amp;igrave;nh ảnh chương tr&amp;igrave;nh quay số&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/loc-dau-xuan-VNPT-TN-4.jpg" /&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;Ảnh: H&amp;igrave;nh ảnh chương tr&amp;igrave;nh quay số&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/loc-dau-xuan-VNPT-TN-5.jpg" /&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;Ảnh: H&amp;igrave;nh ảnh chương tr&amp;igrave;nh quay số&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;img alt="" spfieldtype="null" src="http://rwd.mytvnet.vn/upload/files/images/loc-dau-xuan-VNPT-TN-6.jpg" /&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p style="text-align:center;"&gt;\r\n	&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-align:justify;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;strong&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;&lt;em style="color:rgb(60,62,59);font-family:Tahoma;font-size:13px;font-variant:normal;font-weight:normal;letter-spacing:normal;line-height:normal;text-indent:0px;text-transform:none;white-space:normal;word-spacing:0px;background-color:rgb(255,255,255);"&gt;Ảnh: H&amp;igrave;nh ảnh chương tr&amp;igrave;nh quay số&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n', 'Admin', 'images/loc-dau-xuan-VNPT-TN-1.jpg', 1, 2, '2016-03-03 23:36:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cauhinhloinhuan`
--
ALTER TABLE `cauhinhloinhuan`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhomsim`
--
ALTER TABLE `nhomsim`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhomtin`
--
ALTER TABLE `nhomtin`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `simso`
--
ALTER TABLE `simso`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `thongtindonhang`
--
ALTER TABLE `thongtindonhang`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauhinhloinhuan`
--
ALTER TABLE `cauhinhloinhuan`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=115;
--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `nhomsim`
--
ALTER TABLE `nhomsim`
MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `nhomtin`
--
ALTER TABLE `nhomtin`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `simso`
--
ALTER TABLE `simso`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=180;
--
-- AUTO_INCREMENT for table `thongtindonhang`
--
ALTER TABLE `thongtindonhang`
MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
