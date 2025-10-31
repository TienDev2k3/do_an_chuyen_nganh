-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 25, 2024 lúc 02:44 PM
-- Phiên bản máy phục vụ: 8.3.0
-- Phiên bản PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_pk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

DROP TABLE IF EXISTS `nguoidung`;
CREATE TABLE IF NOT EXISTS `nguoidung` (
  `email` varchar(100) NOT NULL,
  `tennguoidung` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `phanquyen` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`email`, `tennguoidung`, `diachi`, `matkhau`, `dienthoai`, `phanquyen`) VALUES
('admin@gmail.com', 'nguyenvana', 'ad', '202cb962ac59075b964b07152d234b70', '0977443058', 'admin'),
('tn586773@gmail.com', 'Nguyễn Đức Tiến', '41 Cao lỗ', '202cb962ac59075b964b07152d234b70', '0918854304', 'user'),
('tn586774@gmail.com', 'tien123', '123sd', '202cb962ac59075b964b07152d234b70', '09773443058', 'user'),
('ttien290823@gmail.com', 'nguyen van an', 'Cao lỗ', '202cb962ac59075b964b07152d234b70', '0977334056', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

DROP TABLE IF EXISTS `tbl_baiviet`;
CREATE TABLE IF NOT EXISTS `tbl_baiviet` (
  `idbv` int NOT NULL AUTO_INCREMENT,
  `tenbaiviet` varchar(255) NOT NULL,
  `tomtat` mediumtext NOT NULL,
  `noidung` longtext NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `iddmbaiviet` int NOT NULL,
  `tinhtrang` int NOT NULL,
  PRIMARY KEY (`idbv`),
  KEY `fk_dmbaiviet` (`iddmbaiviet`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`idbv`, `tenbaiviet`, `tomtat`, `noidung`, `hinhanh`, `iddmbaiviet`, `tinhtrang`) VALUES
(8, 'Nổ mìn xử lý thành công khối đá \"khủng\" sạt lở trên đèo Khánh Lê', '<p>&nbsp;</p>\r\n\r\n<p>Chiều 16/12, c&aacute;c c&ocirc;ng nh&acirc;n vẫn đang khẩn trương xử l&yacute; đất đ&aacute; sạt lở tr&ecirc;n đ&egrave;o Kh&aacute;nh L&ecirc; để sớm th&ocirc;ng đường QL27C nối Nha Trang - Đ&agrave; Lạt.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>&Ocirc;ng Nguyễn Thanh B&igrave;nh - Gi&aacute;m đốc Khu QLĐB III (Cục Đường bộ Việt Nam) cho biết, từ 7h ng&agrave;y 15/12, tr&ecirc;n đ&egrave;o Kh&aacute;nh L&ecirc; tuyến QL27C, thuộc địa b&agrave;n huyện Kh&aacute;nh Vĩnh, tỉnh Kh&aacute;nh H&ograve;a, do ảnh hưởng của mưa lớn k&eacute;o d&agrave;i g&acirc;y sạt lở taluy dương với khối lượng rất lớn, &aacute;ch tắc giao th&ocirc;ng ho&agrave;n to&agrave;n tại 10 vị tr&iacute;.&nbsp;</p>\r\n', '1734361243_bantroinuoc.jpg', 7, 1),
(10, 'Bão số 10 không di chuyển, vùng ảnh hưởng đất liền thu hẹp', '<h2>Theo dự b&aacute;o, sau khi đi v&agrave;o v&ugrave;ng biển từ&nbsp;<a href=\"https://thanhnien.vn/khanh-hoa-tags488953.html\" target=\"_blank\">Kh&aacute;nh H&ograve;a</a>&nbsp;đến&nbsp;<a href=\"https://thanhnien.vn/binh-thuan-tags1174985.html\" target=\"_blank\">B&igrave;nh Thuận</a>, b&atilde;o số 10 sẽ giảm xuống th&agrave;nh &aacute;p thấp nhiệt đới v&agrave; v&ugrave;ng &aacute;p thấp, khu vực đất liền bị ảnh hưởng do ho&agrave;n lưu của b&atilde;o cũng thu hẹp.</h2>\r\n', '<p>Trung t&acirc;m Dự b&aacute;o kh&iacute; tượng thủy văn quốc gia cho biết, trong 6 giờ vừa qua,&nbsp;<a href=\"https://thanhnien.vn/bao-so-10-anh-huong-tphcm-va-mien-trung-tay-nguyen-185241224085914605.htm\" target=\"_blank\">bão s&ocirc;́ 10</a>&nbsp;h&acirc;̀u như ít dịch chuy&ecirc;̉n. L&uacute;c 13 giờ ng&agrave;y 24.12, vị tr&iacute; t&acirc;m bão ở v&agrave;o khoảng 11,4 độ vĩ bắc; 111,7 độ kinh đ&ocirc;ng, tr&ecirc;n vùng bi&ecirc;̉n phía t&acirc;y nam khu vực giữa Bi&ecirc;̉n Đ&ocirc;ng. Bão mạnh cấp 8 (62 - 74 km/h), giật cấp 10; di chuy&ecirc;̉n theo hướng t&acirc;y t&acirc;y nam, tốc độ khoảng 5 km/giờ.</p>\r\n', '1735032445_00efd2111dbe2c5d3c4883a70e2860f9.jpg', 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ctdonhang`
--

DROP TABLE IF EXISTS `tbl_ctdonhang`;
CREATE TABLE IF NOT EXISTS `tbl_ctdonhang` (
  `idctdonhang` int NOT NULL AUTO_INCREMENT,
  `madh` varchar(10) NOT NULL,
  `idsanpham` int NOT NULL,
  `soluongmua` int NOT NULL,
  PRIMARY KEY (`idctdonhang`),
  KEY `idsanpham` (`idsanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ctdonhang`
--

INSERT INTO `tbl_ctdonhang` (`idctdonhang`, `madh`, `idsanpham`, `soluongmua`) VALUES
(62, '9070', 38, 3),
(63, '9070', 37, 1),
(64, '1733', 37, 1),
(65, '4672', 37, 5),
(66, '4672', 35, 6),
(67, '909', 38, 8),
(68, '678', 38, 6),
(69, '678', 35, 2),
(70, '448', 36, 1),
(71, '448', 32, 1),
(72, '448', 34, 3),
(73, '8003', 39, 10),
(74, '8003', 34, 10),
(75, '8003', 37, 10),
(76, '5491', 39, 1),
(77, '5491', 32, 4),
(78, '5491', 34, 5),
(79, '5491', 38, 2),
(80, '5491', 36, 1),
(81, '1891', 38, 3),
(82, '4728', 31, 4),
(83, '4728', 37, 8),
(84, '4728', 35, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

DROP TABLE IF EXISTS `tbl_danhmuc`;
CREATE TABLE IF NOT EXISTS `tbl_danhmuc` (
  `iddanhmuc` int NOT NULL AUTO_INCREMENT,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int NOT NULL,
  PRIMARY KEY (`iddanhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`iddanhmuc`, `tendanhmuc`, `thutu`) VALUES
(18, 'Tai Nghe', 1),
(19, 'Sạc,cáp', 2),
(20, 'Ốp lưng', 3),
(21, 'Pin dự phòng', 4),
(22, 'Phụ kiện điện thoại', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dmbaiviet`
--

DROP TABLE IF EXISTS `tbl_dmbaiviet`;
CREATE TABLE IF NOT EXISTS `tbl_dmbaiviet` (
  `iddmbaiviet` int NOT NULL AUTO_INCREMENT,
  `tendmbaiviet` varchar(255) NOT NULL,
  `thutu` int NOT NULL,
  PRIMARY KEY (`iddmbaiviet`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dmbaiviet`
--

INSERT INTO `tbl_dmbaiviet` (`iddmbaiviet`, `tendmbaiviet`, `thutu`) VALUES
(7, 'Kinh tế', 1),
(8, 'Chính trị', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

DROP TABLE IF EXISTS `tbl_giohang`;
CREATE TABLE IF NOT EXISTS `tbl_giohang` (
  `idgiohang` int NOT NULL AUTO_INCREMENT,
  `magh` varchar(10) NOT NULL,
  `emailkh` varchar(100) NOT NULL,
  `trangthai` int NOT NULL,
  PRIMARY KEY (`idgiohang`),
  KEY `fk_khachhang` (`emailkh`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`idgiohang`, `magh`, `emailkh`, `trangthai`) VALUES
(37, '8003', 'admin@gmail.com', 1),
(38, '5491', 'tn586774@gmail.com', 1),
(39, '1891', 'tn586773@gmail.com', 0),
(40, '4728', 'tn586773@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

DROP TABLE IF EXISTS `tbl_sanpham`;
CREATE TABLE IF NOT EXISTS `tbl_sanpham` (
  `id_sanpham` int NOT NULL AUTO_INCREMENT,
  `tensanpham` varchar(250) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `gia` varchar(50) NOT NULL,
  `soluong` int NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int NOT NULL,
  `iddanhmuc` int NOT NULL,
  PRIMARY KEY (`id_sanpham`),
  KEY `fk_danhmucsp` (`iddanhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `gia`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tinhtrang`, `iddanhmuc`) VALUES
(31, 'Tai nghe iphone', '001', '250000', 50, '1733992852_taingheiphone.jpg', '<p>H&agrave;ng ch&iacute;nh h&atilde;ng Apple Việt Nam, Mới</p>\r\n\r\n<p>Tai nghe, Hộp sạc, N&uacute;t tai, C&aacute;p USB-C, S&aacute;ch hướng dẫn</p>\r\n\r\n<p>Bảo h&agrave;nh 1 đổi 1 trong 30 ng&agrave;y nếu c&oacute; lỗi phần cứng từ nh&agrave; sản xuất. Bảo h&agrave;nh 12 th&aacute;ng tại trung t&acirc;m bảo h&agrave;nh uỷ quyền CareS.vn<a href=\"https://cellphones.com.vn/chinh-sach-bao-hanh\" target=\"_blank\">(xem chi tiết)</a></p>\r\n\r\n<p>Gi&aacute; sản phẩm đ&atilde; bao gồm VAT</p>\r\n', '<p><strong>Airpods Pro 2 Type-C</strong>&nbsp;với c&ocirc;ng nghệ khử tiếng ồn chủ động mang lại khả năng khử ồn l&ecirc;n gấp 2 lần mang lại trải nghiệm nghe - gọi v&agrave; trải nghiệm &acirc;m nhạc ấn tượng. C&ugrave;ng với đ&oacute;, điện thoại c&ograve;n được trang bị c&ocirc;ng nghệ &acirc;m thanh kh&ocirc;ng gian gi&uacute;p trải nghiệm &acirc;m nhạc th&ecirc;m phần sống động. Airpods Pro 2 Type-C với cổng sạc Type C tiện lợi c&ugrave;ng vi&ecirc;n pin mang lại thời gian trải nghiệm l&ecirc;n đến 6 giờ tiện lợi.</p>\r\n', 1, 18),
(32, 'Tai nghe nhét tai JBL C200 SIU', '002', '120000', 27, '1733992950_tainghesamsung.jpg', '<p>Mới, đầy đủ phụ kiện từ nh&agrave; sản xuất</p>\r\n\r\n<p>Bảo h&agrave;nh 12 th&aacute;ng tại trung t&acirc;m bảo h&agrave;nh ủy quyền Ch&iacute;nh h&atilde;ng. 1 đổi 1 trong 15 ng&agrave;y nếu c&oacute; lỗi nh&agrave; sản xuất.&nbsp;<a href=\"https://cellphones.com.vn/chinh-sach-bao-hanh\" target=\"_blank\">(xem chi tiết)</a></p>\r\n\r\n<p>Gi&aacute; sản phẩm đ&atilde; bao gồm VAT</p>\r\n', '<ul>\r\n	<li>Thiết kế nhỏ gọn, tai nghe dạng in-ear gi&uacute;p &ocirc;m trọn khu&ocirc;n tai người đeo</li>\r\n	<li>M&agrave;ng loa 9mm, &acirc;m bass s&acirc;u cho trải nghiệm nghe sống động, ch&acirc;n thực</li>\r\n	<li>Chất liệu được l&agrave;m từ cao su tạo cảm gi&aacute;c chắc chắn, hạn chế bị rối d&acirc;y</li>\r\n	<li>Sở hữu t&iacute;nh năng tinh chỉnh V-Shape gi&uacute;p đ&aacute;p ứng tốt mọi thể loại nhạc</li>\r\n</ul>\r\n', 1, 18),
(33, 'Tai nghe Bluetooth SoundPEATS Air4 Lite', '003', '1500000', 60, '1733993094_taingh4.jpg', '<p><strong>Tai nghe Bluetooth SoundPEATS Air4 Lite</strong>&nbsp;c&oacute; g&igrave; để thuyết phục người d&ugrave;ng trước những phi&ecirc;n bản &ldquo;đ&agrave;n anh&rdquo; đ&igrave;nh đ&aacute;m như l&agrave; SoundPEATS Air3, SoundPEATS Air3 Deluxe hay SoundPEATS Air3 Deluxe HS? Chất lượng &acirc;m thanh c&oacute; g&igrave; cải tiến v&agrave; c&oacute; những c&ocirc;ng nghệ hiện đại n&agrave;o để đủ &ldquo;đ&aacute;nh bật&rdquo; được c&aacute;c đ&agrave;n anh? C&ugrave;ng kh&aacute;m ph&aacute; SoundPEATS Air4 Lite để c&oacute; được c&acirc;u trả lời chuẩn x&aacute;c nhất nh&eacute;.</p>\r\n', '<ul>\r\n	<li>Thiết kế Semi-in-ear vừa vặn với khu&ocirc;n tai, trọng lượng nhẹ chỉ 4g.</li>\r\n	<li>6 Mic &amp; C&ocirc;ng nghệ giảm ồn cuộc gọi Al, cho cuộc gọi chi tiết, r&otilde; r&agrave;ng.</li>\r\n	<li>Bluetooth 5.3 hiện đại, kết nối ổn định, hạn chế ti&ecirc;u thụ pin.</li>\r\n	<li>Chứng chỉ &acirc;m thanh Hi-Res v&agrave; hỗ trợ codec &acirc;m thanh LDAC, trải nghiệm nghe nhạc chất lượng cao.</li>\r\n	<li>Kết nối 2 thiết bị linh hoạt, tiện lợi.</li>\r\n	<li>Driver 13mm t&aacute;i tạo &acirc;m trầm mạnh mẽ.</li>\r\n	<li>Trải nghiệm chơi game trọn vẹn nhờ Game Mode độ trễ 80ms.</li>\r\n</ul>\r\n', 1, 18),
(34, 'Ốp lưng điện thoại iphone 13 phối ngăn đựng thẻ - IPC 0001 - Màu xanh rêu', '004', '35000', 19, '1735034017_oplung1.jpg', '<p><a href=\"https://minhtuanmobile.com/bao-da-op-lung\">Ốp lưng</a>&nbsp;cho &quot; dế y&ecirc;u &quot;&nbsp;l&agrave; một phụ kiện kh&ocirc;ng c&ograve;n xa lạ với c&aacute;c t&iacute;n đồ &quot;nghiện c&aacute;i đẹp&quot;. Sản phẩm n&agrave;y được đ&aacute;nh gi&aacute; cao khi sở hữu những t&iacute;nh năng như h&ocirc;̃ trợ sạc Magsafe, dễ d&agrave;ng th&aacute;o lắp vệ sinh,&nbsp;bảo vệ m&aacute;y chống va đập, trầy xước nhưng gi&aacute; th&agrave;nh lại kh&aacute; ổn so với mặt bằng chung hiện tại như d&ograve;ng&nbsp;Ốp lưng Mipow.</p>\r\n', '<p>Sử dụng chất liệu cao cấp bằng TPU v&agrave; Leather PU (da sinh th&aacute;i), b&ecirc;n trong được l&oacute;t lớp vải được l&agrave;m từ vi sợi mềm mại, chống trầy xước mang lại cho bạn một cảm gi&aacute;c an t&acirc;m v&agrave; hoản hảo nhất. Viền ốp được l&agrave;m bằng chất liệu nhựa dẻo TPU dễ th&aacute;o lắp.</p>\r\n', 1, 20),
(35, 'Ốp lưng MagSafe iPhone 16 Pro Max Nhựa Trong Apple', '005', '140000', 20, '1733994411_oplung2.jpg', '<h3><a href=\"https://www.thegioididong.com/op-lung-flipcover/op-lung-magsafe-iphone-16-pro-max-nhua-trong-apple\" target=\"_blank\">Ốp lưng MagSafe iPhone 16 Pro Max Nhựa Trong Apple</a>&nbsp;l&agrave; một lựa chọn đ&aacute;ng c&acirc;n nhắc cho những người d&ugrave;ng y&ecirc;u th&iacute;ch sự đơn giản, tinh tế v&agrave; mong muốn bảo vệ chiếc điện thoại của m&igrave;nh một c&aacute;ch hiệu quả.</h3>\r\n', '<p>Với thiết kế mỏng nhẹ, chất liệu polycarbonate trong suốt v&agrave; lớp phủ chống trầy hiệu quả,&nbsp;<a href=\"https://www.thegioididong.com/op-lung-flipcover-apple\" target=\"_blank\">ốp lưng điện thoại Apple</a>&nbsp;n&agrave;y sẽ l&agrave; một lựa chọn ho&agrave;n hảo cho những ai muốn bảo vệ chiếc&nbsp;<a href=\"https://www.thegioididong.com/dtdd/iphone-16-pro-max\" target=\"_blank\">iPhone 16 Pro Max</a>&nbsp;khỏi trầy xước v&agrave; va đập nhẹ. Ngo&agrave;i ra, sản phẩm n&agrave;y c&ograve;n mang lại cảm gi&aacute;c cầm nắm chắc chắn v&agrave; &ecirc;m &aacute;i khi sử dụng.</p>\r\n', 1, 20),
(36, 'Ốp lưng MagSafe iPhone 16 Nhựa Trong Apple', '006', '30000', 50, '1733994613_iphon4.jpg', '<h3><a href=\"https://www.thegioididong.com/op-lung-flipcover/op-lung-magsafe-iphone-16-nhua-trong-apple\" target=\"_blank\">Ốp lưng MagSafe iPhone 16 Nhựa Trong Apple</a>&nbsp;l&agrave; sự lựa chọn l&yacute; tưởng cho những ai muốn bảo vệ thiết bị của m&igrave;nh m&agrave; kh&ocirc;ng l&agrave;m mất đi vẻ đẹp nguy&ecirc;n bản. Với thiết kế trong suốt, ốp lưng n&agrave;y kh&ocirc;ng chỉ gi&uacute;p khoe trọn m&agrave;u sắc v&agrave; thiết kế của iPhone, m&agrave; c&ograve;n đem lại sự bảo vệ to&agrave;n diện.</h3>\r\n', '<p>Được chế t&aacute;c từ chất liệu polycarbonate kết hợp với c&aacute;c th&agrave;nh phần dẻo, ốp lưng mang đến sự c&acirc;n bằng ho&agrave;n hảo giữa t&iacute;nh cứng c&aacute;p v&agrave; sự linh hoạt. Người d&ugrave;ng c&oacute; thể ho&agrave;n to&agrave;n an t&acirc;m về độ bền của&nbsp;<a href=\"https://www.thegioididong.com/op-lung-flipcover-cho-iphone-16\" target=\"_blank\">ốp lưng iPhone 16</a>&nbsp;khi đối mặt với c&aacute;c t&aacute;c động h&agrave;ng ng&agrave;y như va đập hoặc rơi rớt.</p>\r\n', 1, 20),
(37, 'sạc dự phòng 20000 mAh', '007', '30000', 40, '1733997898_pin1.jpeg', '<ul>\r\n	<li>Dung lượng&nbsp;<strong>10.000 mAh</strong>, 2 cổng USB đầu ra&nbsp;<strong>5V - 2.4A</strong>.</li>\r\n	<li>Sạc lại qua cổng Micro USB, c&oacute; đ&egrave;n Led b&aacute;o phần trăm pin tiện lợi.</li>\r\n	<li><strong>L&otilde;i pin Polymer</strong>&nbsp;an to&agrave;n, bền bỉ.</li>\r\n	<li>Thiết kế nhỏ gọn, dễ d&agrave;ng mang theo, cất trong balo, t&uacute;i x&aacute;ch.</li>\r\n	<li>Tương th&iacute;ch hầu hết mọi điện thoại, m&aacute;y t&iacute;nh bảng,...</li>\r\n</ul>\r\n', '<h3>Nạp pin đồng thời cho 2 thiết bị di động qua 2 cổng USB 5V &ndash; 2.4A&nbsp;</h3>\r\n\r\n<p>Tiết kiệm thời gian chờ khi c&oacute; thể&nbsp;<strong>sạc đồng thời tới 2 thiết bị</strong>&nbsp;c&ugrave;ng với pin&nbsp;<a href=\"https://www.thegioididong.com/sac-dtdd-ava-plus\" target=\"_blank\">sạc dự ph&ograve;ng AVA+</a>&nbsp;n&agrave;y. Chia sẻ nguồn năng lượng dự trữ cho c&aacute;c thiết bị di động của m&igrave;nh, hoặc chia sẻ n&oacute; với bạn b&egrave;, để duy tr&igrave; năng lượng kết nối cho nhu cầu giải tr&iacute;, l&agrave;m việc, chia sẻ th&ocirc;ng tin&hellip; tr&ecirc;n điện thoại, m&aacute;y t&iacute;nh bảng, tai nghe, loa Bluetooth&hellip;</p>\r\n', 1, 21),
(38, 'Sạc dự phòng kèm 4 dây cắm - Digital D109-D-1 10000mAh', '008', '50000', 50, '1733998031_pin2.jpg', '<p>T&ecirc;n sản phẩm : Digital&nbsp; D109-D-1 10000mAh</p>\r\n\r\n<p>Model: LS-DY53</p>\r\n\r\n<p>Dung lượng Pin: 10000mAh/ 37Wh , 9800mAh /36.26W</p>\r\n\r\n<p>T&iacute;ch hợp 2 cổng sạc v&agrave;o pin: MicroUSB &ndash; TypeC (typeC c&oacute; hỗ trợ sạc ra) v&ocirc; c&ugrave;ng tiền lợi</p>\r\n', '<p><strong>SẠC DỰ PH&Ograve;NG K&Egrave;M 4 D&Acirc;Y CẮM - PISEN DIGITAL D109-D-1 10000MAH</strong></p>\r\n\r\n<p>Sạc t&iacute;ch hợp 3 d&acirc;y sạc ra, v&agrave; 1 d&acirc;y sạc Pin USB-A v&agrave;o,&nbsp; cực kỳ tiện dụng, sạc c&ugrave;ng l&uacute;c được cho 4 thiết bị</p>\r\n\r\n<p><strong>&nbsp;Sạc dự ph&ograve;ng k&egrave;m c&aacute;p</strong></p>\r\n\r\n<p>3 cổng sạc cho nguồn năng lượng cho cuộc sống</p>\r\n\r\n<p>10000mah &ndash; 3 cổng sạc c&ugrave;ng l&uacute;c &ndash; 4 d&acirc;y đi k&egrave;m &ndash; M&agrave;n kỹ thuật số</p>\r\n\r\n<p><strong>4 d&acirc;y đi k&egrave;m, nhiều m&aacute;y sạc c&ugrave;ng l&uacute;c</strong></p>\r\n\r\n<p>Đi k&egrave;m với 4 đường d&acirc;y sạc, 1 v&agrave;o 3 ra, c&ocirc;ng suất lớn hiệu quả cao, kh&ocirc;ng cần mang nhiều d&acirc;y khi ra ngo&agrave;i</p>\r\n\r\n<p><strong>Giao diện micro usb &ndash; lightning &ndash; type c - usb</strong></p>\r\n\r\n<p><strong>Tương th&iacute;ch mạnh mẽ, ph&ugrave; hợp với hầu hết c&aacute;c điện thoại, tablet hiện c&oacute;</strong></p>\r\n\r\n<p>Th&ecirc;m đầu ra usb v&agrave; giao diện đầu v&agrave;o micro usb / type c, một thiết bị giải quyết nhu cầu sạc của tất cả c&aacute;c m&aacute;y tr&ecirc;n thị trường</p>\r\n\r\n<p>Iphone &ndash; huawei &ndash; samsung &ndash; xiaomu - vivo</p>\r\n\r\n<p><strong>Dung lượng lớn 10000mah đủ khả năng cho cả ng&agrave;y d&agrave;i</strong></p>\r\n', 1, 21),
(39, 'Xiaomi14T', '068', '888888', 25, '1734449301_xiaomi.jpg', '<p><a href=\"https://hoanghamobile.com/dien-thoai/xiaomi-14t\">Xiaomi 14T</a> l&agrave; một chiếc điện thoại th&ocirc;ng minh hứa hẹn mang lại hiệu năng mạnh mẽ v&agrave; trải nghiệm chụp ảnh ấn tượng trong ph&acirc;n kh&uacute;c tầm trung. Được trang bị chip xử l&yacute; MediaTek Dimensity 8300-Ultra, RAM tối đa 12GB v&agrave; bộ nhớ trong tối đa 512GB, sản phẩm đảm bảo khả năng xử l&yacute; mượt m&agrave; c&aacute;c t&aacute;c vụ h&agrave;ng ng&agrave;y, chơi game v&agrave; đa nhiệm. M&agrave;n h&igrave;nh AMOLED 2712 x 1220 c&ugrave;ng vi&ecirc;n pin 5000mAh hỗ trợ sạc nhanh 67W mang đến trải nghiệm xem đ&atilde; mắt v&agrave; thời lượng sử dụng thoải m&aacute;i</p>\r\n', '<p>Sản phẩm Xiaomi với phi&ecirc;n bản 14T mang đến một thiết kế vừa quen thuộc vừa mới mẻ, tiếp nối ng&ocirc;n ngữ thiết kế tinh tế từ c&aacute;c thế hệ tiền nhiệm, đồng thời t&iacute;ch hợp những điểm nhấn hiện đại để tạo n&ecirc;n một tổng thể cuốn h&uacute;t.</p>\r\n\r\n<p>Điểm nổi bật đầu ti&ecirc;n khi cầm tr&ecirc;n tay chiếc <a href=\"https://hoanghamobile.com/dien-thoai-di-dong\">điện thoại</a> n&agrave;y, bạn sẽ cảm nhận được sự mỏng nhẹ đ&aacute;ng kinh ngạc. Với trọng lượng được tối ưu v&agrave; c&aacute;c cạnh bo cong mềm mại, chiếc điện thoại n&agrave;y mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; chắc chắn khi cầm nắm, sử dụng trong thời gian d&agrave;i m&agrave; kh&ocirc;ng g&acirc;y mỏi tay.</p>\r\n\r\n<p>Mặt lưng sang trọng kh&ocirc;ng chỉ tạo n&ecirc;n vẻ ngo&agrave;i cao cấp m&agrave; c&ograve;n hạn chế b&aacute;m v&acirc;n tay hiệu quả. Khung viền kim loại chắc chắn &ocirc;m trọn th&acirc;n m&aacute;y, tạo n&ecirc;n sự liền mạch v&agrave; tăng th&ecirc;m độ bền cho sản phẩm.</p>\r\n', 1, 22);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD CONSTRAINT `fk_dmbaiviet` FOREIGN KEY (`iddmbaiviet`) REFERENCES `tbl_dmbaiviet` (`iddmbaiviet`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `tbl_ctdonhang`
--
ALTER TABLE `tbl_ctdonhang`
  ADD CONSTRAINT `tbl_ctdonhang_ibfk_1` FOREIGN KEY (`idsanpham`) REFERENCES `tbl_sanpham` (`id_sanpham`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `fk_khachhang` FOREIGN KEY (`emailkh`) REFERENCES `nguoidung` (`email`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `fk_danhmucsp` FOREIGN KEY (`iddanhmuc`) REFERENCES `tbl_danhmuc` (`iddanhmuc`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
