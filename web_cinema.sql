-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 05:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctdatve`
--

CREATE TABLE `ctdatve` (
  `MaDatVe` int(11) NOT NULL,
  `MaGhe` varchar(10) DEFAULT NULL,
  `GiaVe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ctdatve`
--

INSERT INTO `ctdatve` (`MaDatVe`, `MaGhe`, `GiaVe`) VALUES
(685, 'PC01-16', 80000),
(686, 'PC01-16', 80000),
(686, 'PC01-26', 65000),
(687, 'PC01-2', 80000),
(688, 'PC01-13', 80000),
(689, 'PC01-44', 80000),
(689, 'PC01-45', 65000),
(690, 'PC01-5', 80000),
(690, 'PC01-6', 65000),
(691, 'PC01-3', 80000),
(691, 'PC01-4', 65000),
(692, 'PC01-5', 80000),
(692, 'PC01-6', 65000),
(693, 'PC01-7', 80000),
(693, 'PC01-8', 65000),
(694, 'PC01-1', 80000),
(694, 'PC01-2', 65000),
(694, 'PC01-10', 65000),
(695, 'PC01-9', 80000),
(696, 'PC02-5', 80000),
(696, 'PC02-6', 65000),
(697, 'PC02-4', 80000),
(698, 'PC02-4', 80000),
(698, 'PC02-5', 65000),
(699, 'PC02-3', 80000),
(700, 'PC02-6', 80000),
(700, 'PC02-7', 65000),
(701, 'PC02-4', 80000),
(701, 'PC02-5', 65000),
(702, 'PC02-3', 80000),
(702, 'PC02-6', 65000),
(703, 'PC02-7', 80000),
(703, 'PC02-8', 65000),
(704, 'PC02-1', 80000),
(704, 'PC02-2', 65000),
(705, 'PC02-9', 80000),
(705, 'PC02-10', 65000),
(706, 'PC01-5', 80000),
(706, 'PC01-6', 65000),
(707, 'PC01-3', 80000),
(707, 'PC01-4', 65000),
(708, 'PC02-14', 65000),
(709, 'PC02-14', 65000),
(710, 'PC02-14', 65000),
(711, 'PC02-14', 65000),
(712, 'PC02-14', 65000),
(713, 'PC02-14', 65000),
(714, 'PC02-75', 80000),
(715, 'PC02-75', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `ghe`
--

CREATE TABLE `ghe` (
  `maGhe` varchar(10) NOT NULL,
  `TenGhe` varchar(255) NOT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `MaPhong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ghe`
--

INSERT INTO `ghe` (`maGhe`, `TenGhe`, `TrangThai`, `MaPhong`) VALUES
('PC01-1', '1-1', 0, 'PC01'),
('PC01-10', '1-10', 0, 'PC01'),
('PC01-11', '2-1', 0, 'PC01'),
('PC01-12', '2-2', 0, 'PC01'),
('PC01-13', '2-3', 0, 'PC01'),
('PC01-14', '2-4', 0, 'PC01'),
('PC01-15', '2-5', 0, 'PC01'),
('PC01-16', '2-6', 0, 'PC01'),
('PC01-17', '2-7', 0, 'PC01'),
('PC01-18', '2-8', 0, 'PC01'),
('PC01-19', '2-9', 0, 'PC01'),
('PC01-2', '1-2', 0, 'PC01'),
('PC01-20', '2-10', 0, 'PC01'),
('PC01-21', '3-1', 0, 'PC01'),
('PC01-22', '3-2', 0, 'PC01'),
('PC01-23', '3-3', 0, 'PC01'),
('PC01-24', '3-4', 0, 'PC01'),
('PC01-25', '3-5', 0, 'PC01'),
('PC01-26', '3-6', 0, 'PC01'),
('PC01-27', '3-7', 0, 'PC01'),
('PC01-28', '3-8', 0, 'PC01'),
('PC01-29', '3-9', 0, 'PC01'),
('PC01-3', '1-3', 0, 'PC01'),
('PC01-30', '3-10', 0, 'PC01'),
('PC01-31', '4-1', 0, 'PC01'),
('PC01-32', '4-2', 0, 'PC01'),
('PC01-33', '4-3', 0, 'PC01'),
('PC01-34', '4-4', 0, 'PC01'),
('PC01-35', '4-5', 0, 'PC01'),
('PC01-36', '4-6', 0, 'PC01'),
('PC01-37', '4-7', 0, 'PC01'),
('PC01-38', '4-8', 0, 'PC01'),
('PC01-39', '4-9', 0, 'PC01'),
('PC01-4', '1-4', 0, 'PC01'),
('PC01-40', '4-10', 0, 'PC01'),
('PC01-41', '5-1', 0, 'PC01'),
('PC01-42', '5-2', 0, 'PC01'),
('PC01-43', '5-3', 0, 'PC01'),
('PC01-44', '5-4', 0, 'PC01'),
('PC01-45', '5-5', 0, 'PC01'),
('PC01-46', '5-6', 0, 'PC01'),
('PC01-47', '5-7', 0, 'PC01'),
('PC01-48', '5-8', 0, 'PC01'),
('PC01-49', '5-9', 0, 'PC01'),
('PC01-5', '1-5', 0, 'PC01'),
('PC01-50', '5-10', 0, 'PC01'),
('PC01-51', '6-1', 0, 'PC01'),
('PC01-52', '6-2', 0, 'PC01'),
('PC01-53', '6-3', 0, 'PC01'),
('PC01-54', '6-4', 0, 'PC01'),
('PC01-55', '6-5', 0, 'PC01'),
('PC01-56', '6-6', 0, 'PC01'),
('PC01-57', '6-7', 0, 'PC01'),
('PC01-58', '6-8', 0, 'PC01'),
('PC01-59', '6-9', 0, 'PC01'),
('PC01-6', '1-6', 0, 'PC01'),
('PC01-60', '6-10', 0, 'PC01'),
('PC01-61', '7-1', 0, 'PC01'),
('PC01-62', '7-2', 0, 'PC01'),
('PC01-63', '7-3', 0, 'PC01'),
('PC01-64', '7-4', 0, 'PC01'),
('PC01-65', '7-5', 0, 'PC01'),
('PC01-66', '7-6', 0, 'PC01'),
('PC01-67', '7-7', 0, 'PC01'),
('PC01-68', '7-8', 0, 'PC01'),
('PC01-69', '7-9', 0, 'PC01'),
('PC01-7', '1-7', 0, 'PC01'),
('PC01-70', '7-10', 0, 'PC01'),
('PC01-71', '8-1', 0, 'PC01'),
('PC01-72', '8-2', 0, 'PC01'),
('PC01-73', '8-3', 0, 'PC01'),
('PC01-74', '8-4', 0, 'PC01'),
('PC01-75', '8-5', 0, 'PC01'),
('PC01-76', '8-6', 0, 'PC01'),
('PC01-77', '8-7', 0, 'PC01'),
('PC01-78', '8-8', 0, 'PC01'),
('PC01-79', '8-9', 0, 'PC01'),
('PC01-8', '1-8', 0, 'PC01'),
('PC01-80', '8-10', 0, 'PC01'),
('PC01-81', '9-1', 0, 'PC01'),
('PC01-82', '9-2', 0, 'PC01'),
('PC01-83', '9-3', 0, 'PC01'),
('PC01-84', '9-4', 0, 'PC01'),
('PC01-85', '9-5', 0, 'PC01'),
('PC01-86', '9-6', 0, 'PC01'),
('PC01-87', '9-7', 0, 'PC01'),
('PC01-88', '9-8', 0, 'PC01'),
('PC01-89', '9-9', 0, 'PC01'),
('PC01-9', '1-9', 0, 'PC01'),
('PC01-90', '9-10', 0, 'PC01'),
('PC02-1', '1-1', 0, 'PC02'),
('PC02-10', '1-10', 0, 'PC02'),
('PC02-100', '10-10', 0, 'PC02'),
('PC02-11', '2-1', 0, 'PC02'),
('PC02-12', '2-2', 0, 'PC02'),
('PC02-13', '2-3', 0, 'PC02'),
('PC02-14', '2-4', 0, 'PC02'),
('PC02-15', '2-5', 0, 'PC02'),
('PC02-16', '2-6', 0, 'PC02'),
('PC02-17', '2-7', 0, 'PC02'),
('PC02-18', '2-8', 0, 'PC02'),
('PC02-19', '2-9', 0, 'PC02'),
('PC02-2', '1-2', 0, 'PC02'),
('PC02-20', '2-10', 0, 'PC02'),
('PC02-21', '3-1', 0, 'PC02'),
('PC02-22', '3-2', 0, 'PC02'),
('PC02-23', '3-3', 0, 'PC02'),
('PC02-24', '3-4', 0, 'PC02'),
('PC02-25', '3-5', 0, 'PC02'),
('PC02-26', '3-6', 0, 'PC02'),
('PC02-27', '3-7', 0, 'PC02'),
('PC02-28', '3-8', 0, 'PC02'),
('PC02-29', '3-9', 0, 'PC02'),
('PC02-3', '1-3', 0, 'PC02'),
('PC02-30', '3-10', 0, 'PC02'),
('PC02-31', '4-1', 0, 'PC02'),
('PC02-32', '4-2', 0, 'PC02'),
('PC02-33', '4-3', 0, 'PC02'),
('PC02-34', '4-4', 0, 'PC02'),
('PC02-35', '4-5', 0, 'PC02'),
('PC02-36', '4-6', 0, 'PC02'),
('PC02-37', '4-7', 0, 'PC02'),
('PC02-38', '4-8', 0, 'PC02'),
('PC02-39', '4-9', 0, 'PC02'),
('PC02-4', '1-4', 0, 'PC02'),
('PC02-40', '4-10', 0, 'PC02'),
('PC02-41', '5-1', 0, 'PC02'),
('PC02-42', '5-2', 0, 'PC02'),
('PC02-43', '5-3', 0, 'PC02'),
('PC02-44', '5-4', 0, 'PC02'),
('PC02-45', '5-5', 0, 'PC02'),
('PC02-46', '5-6', 0, 'PC02'),
('PC02-47', '5-7', 0, 'PC02'),
('PC02-48', '5-8', 0, 'PC02'),
('PC02-49', '5-9', 0, 'PC02'),
('PC02-5', '1-5', 0, 'PC02'),
('PC02-50', '5-10', 0, 'PC02'),
('PC02-51', '6-1', 0, 'PC02'),
('PC02-52', '6-2', 0, 'PC02'),
('PC02-53', '6-3', 0, 'PC02'),
('PC02-54', '6-4', 0, 'PC02'),
('PC02-55', '6-5', 0, 'PC02'),
('PC02-56', '6-6', 0, 'PC02'),
('PC02-57', '6-7', 0, 'PC02'),
('PC02-58', '6-8', 0, 'PC02'),
('PC02-59', '6-9', 0, 'PC02'),
('PC02-6', '1-6', 0, 'PC02'),
('PC02-60', '6-10', 0, 'PC02'),
('PC02-61', '7-1', 0, 'PC02'),
('PC02-62', '7-2', 0, 'PC02'),
('PC02-63', '7-3', 0, 'PC02'),
('PC02-64', '7-4', 0, 'PC02'),
('PC02-65', '7-5', 0, 'PC02'),
('PC02-66', '7-6', 0, 'PC02'),
('PC02-67', '7-7', 0, 'PC02'),
('PC02-68', '7-8', 0, 'PC02'),
('PC02-69', '7-9', 0, 'PC02'),
('PC02-7', '1-7', 0, 'PC02'),
('PC02-70', '7-10', 0, 'PC02'),
('PC02-71', '8-1', 0, 'PC02'),
('PC02-72', '8-2', 0, 'PC02'),
('PC02-73', '8-3', 0, 'PC02'),
('PC02-74', '8-4', 0, 'PC02'),
('PC02-75', '8-5', 0, 'PC02'),
('PC02-76', '8-6', 0, 'PC02'),
('PC02-77', '8-7', 0, 'PC02'),
('PC02-78', '8-8', 0, 'PC02'),
('PC02-79', '8-9', 0, 'PC02'),
('PC02-8', '1-8', 0, 'PC02'),
('PC02-80', '8-10', 0, 'PC02'),
('PC02-81', '9-1', 0, 'PC02'),
('PC02-82', '9-2', 0, 'PC02'),
('PC02-83', '9-3', 0, 'PC02'),
('PC02-84', '9-4', 0, 'PC02'),
('PC02-85', '9-5', 0, 'PC02'),
('PC02-86', '9-6', 0, 'PC02'),
('PC02-87', '9-7', 0, 'PC02'),
('PC02-88', '9-8', 0, 'PC02'),
('PC02-89', '9-9', 0, 'PC02'),
('PC02-9', '1-9', 0, 'PC02'),
('PC02-90', '9-10', 0, 'PC02'),
('PC02-91', '10-1', 0, 'PC02'),
('PC02-92', '10-2', 0, 'PC02'),
('PC02-93', '10-3', 0, 'PC02'),
('PC02-94', '10-4', 0, 'PC02'),
('PC02-95', '10-5', 0, 'PC02'),
('PC02-96', '10-6', 0, 'PC02'),
('PC02-97', '10-7', 0, 'PC02'),
('PC02-98', '10-8', 0, 'PC02'),
('PC02-99', '10-9', 0, 'PC02');

-- --------------------------------------------------------

--
-- Table structure for table `giave`
--

CREATE TABLE `giave` (
  `MaGiaVe` varchar(10) NOT NULL,
  `MaLoaiVe` varchar(10) DEFAULT NULL,
  `GiaVe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `giave`
--

INSERT INTO `giave` (`MaGiaVe`, `MaLoaiVe`, `GiaVe`) VALUES
('GV01', 'LV01', 80000),
('GV02', 'LV02', 65000),
('GV03', 'LV03', 50000),
('GV04', 'LV01', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `lichchieu`
--

CREATE TABLE `lichchieu` (
  `MaLichChieu` varchar(10) NOT NULL,
  `NgayChieu` date NOT NULL,
  `GioChieu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lichchieu`
--

INSERT INTO `lichchieu` (`MaLichChieu`, `NgayChieu`, `GioChieu`) VALUES
('LC01', '2023-10-09', '12:00:00'),
('LC02', '2023-10-10', '20:30:00'),
('LC04', '2023-11-06', '17:00:00'),
('LC05', '2023-11-06', '20:30:00'),
('LC06', '2023-11-06', '22:00:00'),
('LC07', '2023-11-08', '23:00:00'),
('LC08', '2023-11-09', '16:22:00'),
('LC09', '2023-11-12', '12:10:00');

-- --------------------------------------------------------

--
-- Table structure for table `lichchieuphim`
--

CREATE TABLE `lichchieuphim` (
  `MaLichPhim` varchar(10) NOT NULL,
  `MaLichChieu` varchar(255) NOT NULL,
  `MaPhong` varchar(255) NOT NULL,
  `MaPhim` varchar(10) DEFAULT NULL,
  `thoigianketthuc` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lichchieuphim`
--

INSERT INTO `lichchieuphim` (`MaLichPhim`, `MaLichChieu`, `MaPhong`, `MaPhim`, `thoigianketthuc`) VALUES
('LCP001', 'LC01', 'PC01', 'P001', '00:00:00'),
('LCP002', 'LC02', 'PC01', 'P001', '00:00:00'),
('LCP004', 'LC04', 'PC02', 'P004', '13:32:00'),
('LCP005', 'LC05', 'PC02', 'P006', '13:32:00'),
('LCP006', 'LC06', 'PC01', 'P007', '13:32:30'),
('LCP007', 'LC07', 'PC02', 'P006', '13:32:00'),
('LCP009', 'LC01', 'PC01', 'P003', '13:15:50'),
('LCP010', 'LC08', 'PC01', 'P005', '13:32:00'),
('LCP011', 'LC09', 'PC02', 'P008', '13:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `loaive`
--

CREATE TABLE `loaive` (
  `Maloaive` varchar(10) NOT NULL,
  `Tenloaive` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `loaive`
--

INSERT INTO `loaive` (`Maloaive`, `Tenloaive`) VALUES
('LV01', 'Người lớn'),
('LV02', 'U22'),
('LV03', 'Trẻ em');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` bit(1) NOT NULL,
  `MaNhanVien` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`username`, `password`, `email`, `role`, `MaNhanVien`) VALUES
('admin', '123456', 'phitran.13082002@gmail.com', b'1', 'NV004'),
('hung', '123', '', b'0', 'NV006'),
('phuong', '123', 'phuongdang@gmail.com', b'0', 'NV003'),
('tan', '123', '', b'0', 'NV001');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` varchar(10) NOT NULL,
  `TenNhanVien` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `gioitinh` tinyint(1) NOT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNhanVien`, `TenNhanVien`, `SoDienThoai`, `DiaChi`, `gioitinh`, `ngaysinh`) VALUES
('NV001', 'Nguyễn Duy Tân', '0862055374', 'Khánh Hòa', 1, '2002-06-01'),
('NV002', 'Nguyễn Minh Phúc', '022566983', 'Phú Yên', 1, '2002-08-12'),
('NV003', 'Phương Đặng', '0324561269', '67A Lê Văn Huân', 0, '2002-02-02'),
('NV004', 'Trần Lê Văn Phi', '0389254720', '77/49 Nguyễn Chích', 1, '2002-08-13'),
('NV005', 'Diễm Kiều', '0123432541', 'Nha Trang Khánh Hòa', 0, '2001-03-25'),
('NV006', 'Hùng Đặng', '0326585165', 'Diên Khánh', 1, '2003-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `phim`
--

CREATE TABLE `phim` (
  `MaPhim` varchar(10) NOT NULL,
  `TenPhim` varchar(255) NOT NULL,
  `ngaykhoichieu` date NOT NULL,
  `Mota` text NOT NULL,
  `Anh` varchar(255) NOT NULL,
  `Trailer` varchar(255) NOT NULL,
  `MaTL` varchar(10) DEFAULT NULL,
  `MaQuocGia` varchar(10) DEFAULT NULL,
  `banner` varchar(255) NOT NULL,
  `thoiluong` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phim`
--

INSERT INTO `phim` (`MaPhim`, `TenPhim`, `ngaykhoichieu`, `Mota`, `Anh`, `Trailer`, `MaTL`, `MaQuocGia`, `banner`, `thoiluong`) VALUES
('P001', 'Kẻ kiến tạo', '2023-10-09', '\"The Creator\" (Kẻ kiến tạo) dựng lên một bối cảnh ở tương lai xa, nơi trí tuệ nhân tạo (AI) được phát minh và thành nhân để cải thiện chất lượng cuộc sống của con người một cách tân tiến nhất. Không may một sự cố nổ đầu đạn hạt nhân xảy ra ngay tại hệ thống AI ở Los Angeles đã khiến chính phủ Mỹ phải tập hợp lực lượng đặc biệt để tiêu diệt tất cả các robot AI gây trở ngại và đe dọa đến mạng sống của nhân loại.\r\n\r\nNam nhân vật chính là đặc vụ Mỹ Joshua (John David Washington thủ vai) đảm nhận nhiệm vụ tiếp cận Maya (nhân tạo AI do Gemma Chan thể hiện) để thu thập những thông tin quan trọng và cần thiết. Trong quá trình này giữa họ phát sinh tình cảm đặc biệt nam nữ nên mọi chuyện ngày càng trở nên phức tạp hơn. Sau sự tấn công của vệ tinh hạt nhân NOMAD, Joshua tin rằng Maya đã thiệt mạng.', '1.jpg', 'kekientao.mp4', 'TL03', 'QG01', '1slider.jpg', '01:32:00'),
('P002', 'Muôn Kiếp Nhân Duyên', '2023-10-10', 'Xoay quanh hai nhân vật chính - Nora (Greta Lee) và Hae Sung (Teo Yoo). Tình bạn thân thiết của họ bị chia cắt khi Nora theo gia đình di cư khỏi Hàn Quốc vào năm 12 tuổi. 20 năm sau, như một mối duyên tiền định, họ gặp lại nhau tại Mỹ, nhưng lúc này, Nora đã trở thành vợ của Arthur (John Magaro). Nhìn lại quá khứ, nói về hiện tại và hướng đến tương lai - những cuộc trò chuyện nhẹ nhàng giữa Nora và Hae Sung trong 1 tuần ngắn ngủi ở New York được đan xen bởi các khoảng lặng, khiến người xem chìm đắm vào suy ngẫm về cuộc sống, số phận và tình yêu.', '2.jpg', 'muonkiepnhansinh.mp4', 'TL01', 'QG01', 'muonkiepnahnsinh.png', '01:04:00'),
('P003', 'THE NUN II ', '2023-10-11', 'Là phần phim tiếp nối câu chuyện năm 2019 của The Nun, phim lấy bối cảnh nước Pháp năm 1956, cùng cái chết bí ẩn của một linh mục, một giai thoại đáng sợ và ám ảnh sẽ mở ra tiếp tục xoay quanh nhân vật chính - Sơ Irene. Liệu Sơ Irene có nhận ra, đây chính là hồn ma nữ tu Valak từng có cuộc chiến “sống còn” với cô không lâu trước đây.', '4.jpg', 'thenunii.mp4', 'TL01', 'QG01', 'thenun11.png', '01:15:50'),
('P004', 'Đất Rừng Phương Nam', '2023-10-16', 'Đất Rừng Phương Nam phiên bản điện ảnh được kế thừa và phát triển từ tiểu thuyết cùng tên của nhà văn Đoàn Giỏi. Bộ phim kể về hành trình phiêu lưu của An - một cậu bé chẳng may mất mẹ trên đường đi tìm cha. Cùng với An, khán giả sẽ trải nghiệm sự trù phú của thiên nhiên và nét đẹp văn hoá đặc sắc của vùng đất Nam Kì Lục Tỉnh, sự hào hiệp của những người nông dân bám đất bám rừng và tinh thần yêunước kháng Pháp đầu thế kỉ 20. Bên cạnh đó, tình cảm gia đình, tình bạn, tình người, tình thầy trò, tình yêu nước là những cung bậc cảm xúc sâu sắc sẽ đọng lại qua mỗi bước chân của An và đồng bạn.', 'adrpn.jpg', 'ĐấtRừngPhươngNam.mp4', 'TL01', 'QG01', 'drpn.jpg', '02:10:10'),
('P005', 'Người vợ cuối cùng', '2023-11-01', 'Lấy cảm hứng từ tiểu thuyết Hồ Oán Hận, của nhà văn Hồng Thái, Người Vợ Cuối Cùng là một bộ phim tâm lý cổ trang, lấy bối cảnh Việt Nam vào triều Nguyễn. LINH - Người vợ bất đắc dĩ của một viên quan tri huyện, xuất thân là con của một gia đình nông dân nghèo khó, vì không thể hoàn thành nghĩa vụ sinh con nối dõi nên đã chịu sự chèn ép của những người vợ lớn trong gia đình. Sự gặp gỡ tình cờ của cô và người yêu thời thanh mai trúc mã của mình - NHÂN đã dẫn đến nhiều câu chuyện bất ngờ xảy ra khiến cuộc sống cô hoàn toàn thay đổi.', 'nvcc1.jpg', 'NGƯỜIVỢCUỐICÙNG.mp4', 'TL01', 'QG01', 'nvcc2.jpg', '01:39:32'),
('P006', 'TAYLOR SWIFT: THE ERAS TOUR', '2023-11-03', 'Hiện tượng văn hóa tiếp tục trên màn ảnh lớn! Đắm chìm trong trải nghiệm xem phim hòa nhạc độc nhất vô nhị với góc nhìn ngoạn mục, đậm chất điện ảnh về chuyến lưu diễn mang tính lịch sử. Khuyến khích khán giả đeo vòng tay tình bạn và mặc trang phục Taylor Swift Eras Tour!', 'ts1.jpg', 'tsvideo.mp4', 'TL01', 'QG01', 'ts2.jpg', '02:10:00'),
('P007', 'NĂM ĐÊM KINH HOÀNG', '2023-10-27', 'Nhân viên bảo vệ Mike bắt đầu làm việc tại Freddy Fazbears Pizza. Trong đêm làm việc đầu tiên, anh nhận ra mình sẽ không dễ gì vượt qua được ca đêm ở đây. Chẳng mấy chốc, anh sẽ vén màn sự thật đã xảy ra tại Freddys.', 'ndkh1.jpg', 'ndkhvideo.mp4', 'TL01', 'QG01', 'ndkh2.jpg', '01:50:10'),
('P008', 'BIỆT ĐỘI MARVEL', '2023-11-20', 'Mọi thứ chuẩn bị sẽ thay đổi, dù họ có muốn hay không. Bộ ba nữ siêu anh hùng Captain Marvel, Ms. Marvel và Monica Rambeau sẽ kết hợp trong Biệt Đội Marvel từ Marvel Studios. Bộ phim sẽ chiếu tại các cụm rạp vào 10.11.2023.', 'mavel1.jpg', 'mavel.mp4', 'TL03', 'QG01', 'mavel2.jpg', '01:44:00'),
('P009', 'DEAR DAVID: VONG ÁM', '2023-11-18', 'Dựa trên một câu chuyện có thật năm 2017 của một hoạ sỹ truyện tranh BuzzFeed, Adam Ellis. Với dòng tweet “Dear David” được lan truyền, Adam đã triệu hồi một con ma internet và thu được một lượng lớn người xem trên mạng xã hội.', 'va1.jpg', 'va.mp4', 'TL01', 'QG01', 'va2.jpg', '01:34:00'),
('P010', 'YÊU LẠI VỢ NGẦU', '2023-11-11', 'Nội dung phim xoay quanh câu chuyện của cặp vợ chồng trẻ No Jung Yeol (Kang Ha-neul) và Hong Na Ra (Jung So-min). Từ cuộc sống hôn nhân màu hồng, cả hai dần “hiện nguyên hình” trở thành cái gai trong mắt đối phương với vô vàn thói hư, tật xấu. Không thể đi đến tiếng nói chung, Jung Yeol và Na Ra quyết định ra tòa ly dị. Tuy nhiên, họ phải chờ 30 ngày cho đến khi mọi thủ tục chính thức được hoàn tất.', 'ylvn1.jpg', 'ylvn.mp4', 'TL01', 'QG01', 'ylvn2.jpg', '01:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` varchar(10) NOT NULL,
  `TenPhong` varchar(255) NOT NULL,
  `SoChoNgoi` int(11) NOT NULL,
  `SoHang` int(11) NOT NULL,
  `socot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `TenPhong`, `SoChoNgoi`, `SoHang`, `socot`) VALUES
('PC01', 'Phòng chiếu 1', 90, 9, 10),
('PC02', 'Phòng chiếu 2', 100, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pttt`
--

CREATE TABLE `pttt` (
  `MaPTTT` varchar(10) NOT NULL,
  `TenPTTT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pttt`
--

INSERT INTO `pttt` (`MaPTTT`, `TenPTTT`) VALUES
('PTTT01', 'Tiền mặt'),
('PTTT02', 'Momo');

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

CREATE TABLE `quangcao` (
  `MaQC` varchar(10) NOT NULL,
  `Tenquangcao` varchar(255) NOT NULL,
  `Anhminhhoa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quangcao`
--

INSERT INTO `quangcao` (`MaQC`, `Tenquangcao`, `Anhminhhoa`) VALUES
('QC01', 'UuDaiSV', 'sukien1.jpg'),
('SK002', 'Quét mã QR', 'sukien2.jpg'),
('SK003', 'Vé 55k', 'sukien3.jpg'),
('SK004', 'Thứ hai vui vẻ', 'sukien4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quocgia`
--

CREATE TABLE `quocgia` (
  `MaQuocgia` varchar(10) NOT NULL,
  `TenQuocGia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `quocgia`
--

INSERT INTO `quocgia` (`MaQuocgia`, `TenQuocGia`) VALUES
('QG01', 'Mỹ'),
('QG02', 'Việt Nam'),
('QG03', 'Hàn Quốc'),
('QG04', 'Nhật Bản'),
('QG05', 'Trung Quốc');

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `MaThanhToan` varchar(10) NOT NULL,
  `MaDatVe` int(11) NOT NULL,
  `MaNhanVien` varchar(10) DEFAULT NULL,
  `TrangThaiThanhToan` tinyint(1) NOT NULL,
  `NgayThanhToan` date NOT NULL,
  `tongtienthanhtoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `thanhtoan`
--

INSERT INTO `thanhtoan` (`MaThanhToan`, `MaDatVe`, `MaNhanVien`, `TrangThaiThanhToan`, `NgayThanhToan`, `tongtienthanhtoan`) VALUES
('TT00001', 690, 'NV001', 1, '2023-11-05', 145000),
('TT00002', 691, 'NV001', 1, '2023-11-05', 145000),
('TT00003', 692, 'NV001', 1, '2023-11-05', 145000),
('TT00004', 693, 'NV001', 1, '2023-11-05', 145000),
('TT00005', 694, 'NV001', 1, '2023-11-05', 210000),
('TT00006', 695, 'NV001', 1, '2023-11-05', 80000),
('TT00007', 696, 'NV001', 1, '2023-11-05', 145000),
('TT00008', 697, 'NV001', 1, '2023-11-05', 80000),
('TT00009', 698, 'NV001', 1, '2023-11-05', 145000),
('TT00010', 699, 'NV001', 1, '2023-11-05', 80000),
('TT00011', 700, 'NV001', 1, '2023-11-07', 145000),
('TT00012', 701, 'NV001', 1, '2023-11-07', 145000),
('TT00013', 702, 'NV001', 1, '2023-11-07', 145000),
('TT00014', 703, 'NV001', 1, '2023-11-07', 145000),
('TT00015', 704, 'NV001', 1, '2023-11-07', 145000),
('TT00016', 705, 'NV001', 1, '2023-11-07', 145000),
('TT00017', 706, 'NV001', 1, '2023-11-08', 145000),
('TT00018', 707, 'NV001', 1, '2023-11-08', 145000),
('TT00019', 708, 'NV001', 1, '2023-11-11', 65000),
('TT00020', 709, 'NV001', 1, '2023-11-11', 65000),
('TT00021', 710, 'NV001', 1, '2023-11-11', 65000),
('TT00022', 711, 'NV001', 1, '2023-11-11', 65000),
('TT00023', 712, 'NV001', 1, '2023-11-11', 65000),
('TT00024', 713, 'NV001', 1, '2023-11-11', 65000),
('TT00025', 714, 'NV001', 1, '2023-11-11', 80000),
('TT00026', 715, 'NV001', 1, '2023-11-11', 80000);

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `MaTL` varchar(10) NOT NULL,
  `TenTL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`MaTL`, `TenTL`) VALUES
('TL01', 'Kinh dị'),
('TL02', 'Hài Hước'),
('TL03', 'Khoa học - Viễn tưởng'),
('TL04', 'Phim kinh dị/Tội phạm/Kinh dị Hoa Kỳ'),
('TL05', 'kịch lịch sử Việt Nam'),
('TL06', 'Hành động'),
('TL07', 'phim tài liệu Mỹ'),
('TL08', 'Tình cảm');

-- --------------------------------------------------------

--
-- Table structure for table `trangthaighe`
--

CREATE TABLE `trangthaighe` (
  `Maghe` varchar(10) DEFAULT NULL,
  `TrangThai` tinyint(1) NOT NULL,
  `MaPhong` varchar(10) DEFAULT NULL,
  `MaLichChieu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `trangthaighe`
--

INSERT INTO `trangthaighe` (`Maghe`, `TrangThai`, `MaPhong`, `MaLichChieu`) VALUES
('PC01-16', 1, 'PC01', 'LC01'),
('PC01-26', 1, 'PC01', 'LC01'),
('PC01-2', 1, 'PC01', 'LC01'),
('PC01-13', 1, 'PC01', 'LC01'),
('PC01-44', 1, 'PC01', 'LC01'),
('PC01-45', 1, 'PC01', 'LC01'),
('PC01-5', 1, 'PC01', 'LC01'),
('PC01-6', 1, 'PC01', 'LC01'),
('PC01-3', 1, 'PC01', 'LC05'),
('PC01-4', 1, 'PC01', 'LC05'),
('PC01-5', 1, 'PC01', 'LC05'),
('PC01-6', 1, 'PC01', 'LC05'),
('PC01-7', 1, 'PC01', 'LC05'),
('PC01-8', 1, 'PC01', 'LC05'),
('PC01-1', 1, 'PC01', 'LC05'),
('PC01-2', 1, 'PC01', 'LC05'),
('PC01-10', 1, 'PC01', 'LC05'),
('PC01-9', 1, 'PC01', 'LC05'),
('PC02-5', 1, 'PC02', 'LC04'),
('PC02-6', 1, 'PC02', 'LC04'),
('PC02-4', 1, 'PC02', 'LC04'),
('PC02-4', 1, 'PC02', 'LC05'),
('PC02-5', 1, 'PC02', 'LC05'),
('PC02-3', 1, 'PC02', 'LC05'),
('PC02-6', 1, 'PC02', 'LC05'),
('PC02-7', 1, 'PC02', 'LC05'),
('PC02-4', 1, 'PC02', 'LC07'),
('PC02-5', 1, 'PC02', 'LC07'),
('PC02-3', 1, 'PC02', 'LC07'),
('PC02-6', 1, 'PC02', 'LC07'),
('PC02-7', 1, 'PC02', 'LC07'),
('PC02-8', 1, 'PC02', 'LC07'),
('PC02-1', 1, 'PC02', 'LC07'),
('PC02-2', 1, 'PC02', 'LC07'),
('PC02-9', 1, 'PC02', 'LC07'),
('PC02-10', 1, 'PC02', 'LC07'),
('PC01-5', 1, 'PC01', 'LC08'),
('PC01-6', 1, 'PC01', 'LC08'),
('PC01-3', 1, 'PC01', 'LC08'),
('PC01-4', 1, 'PC01', 'LC08'),
('PC02-14', 1, 'PC02', 'LC07'),
('PC02-14', 1, 'PC02', 'LC07'),
('PC02-14', 1, 'PC02', 'LC07'),
('PC02-14', 1, 'PC02', 'LC07'),
('PC02-14', 1, 'PC02', 'LC07'),
('PC02-14', 1, 'PC02', 'LC07'),
('PC02-75', 1, 'PC02', 'LC09'),
('PC02-75', 1, 'PC02', 'LC09');

-- --------------------------------------------------------

--
-- Table structure for table `ttdatve`
--

CREATE TABLE `ttdatve` (
  `MaDatVe` int(11) NOT NULL,
  `MaLichPhim` varchar(10) DEFAULT NULL,
  `NgayDat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ttdatve`
--

INSERT INTO `ttdatve` (`MaDatVe`, `MaLichPhim`, `NgayDat`) VALUES
(685, 'LCP001', '2023-10-15'),
(686, 'LCP001', '2023-10-15'),
(687, 'LCP001', '2023-10-15'),
(688, 'LCP001', '2023-11-03'),
(689, 'LCP001', '2023-11-05'),
(690, 'LCP001', '2023-11-05'),
(691, 'LCP006', '2023-11-05'),
(692, 'LCP006', '2023-11-05'),
(693, 'LCP006', '2023-11-05'),
(694, 'LCP006', '2023-11-05'),
(695, 'LCP006', '2023-11-05'),
(696, 'LCP004', '2023-11-05'),
(697, 'LCP004', '2023-11-05'),
(698, 'LCP005', '2023-11-05'),
(699, 'LCP005', '2023-11-05'),
(700, 'LCP005', '2023-11-07'),
(701, 'LCP007', '2023-11-07'),
(702, 'LCP007', '2023-11-07'),
(703, 'LCP007', '2023-11-07'),
(704, 'LCP007', '2023-11-07'),
(705, 'LCP007', '2023-11-07'),
(706, 'LCP010', '2023-11-08'),
(707, 'LCP010', '2023-11-08'),
(708, 'LCP007', '2023-11-11'),
(709, 'LCP007', '2023-11-11'),
(710, 'LCP007', '2023-11-11'),
(711, 'LCP007', '2023-11-11'),
(712, 'LCP007', '2023-11-11'),
(713, 'LCP007', '2023-11-11'),
(714, 'LCP011', '2023-11-11'),
(715, 'LCP011', '2023-11-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctdatve`
--
ALTER TABLE `ctdatve`
  ADD KEY `MaDatVe` (`MaDatVe`),
  ADD KEY `MaGhe` (`MaGhe`);

--
-- Indexes for table `ghe`
--
ALTER TABLE `ghe`
  ADD PRIMARY KEY (`maGhe`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `giave`
--
ALTER TABLE `giave`
  ADD PRIMARY KEY (`MaGiaVe`),
  ADD KEY `MaLoaiVe` (`MaLoaiVe`);

--
-- Indexes for table `lichchieu`
--
ALTER TABLE `lichchieu`
  ADD PRIMARY KEY (`MaLichChieu`);

--
-- Indexes for table `lichchieuphim`
--
ALTER TABLE `lichchieuphim`
  ADD PRIMARY KEY (`MaLichPhim`),
  ADD KEY `MaLichChieu` (`MaLichChieu`),
  ADD KEY `MaPhim` (`MaPhim`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `loaive`
--
ALTER TABLE `loaive`
  ADD PRIMARY KEY (`Maloaive`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`username`),
  ADD KEY `MaNhanVien` (`MaNhanVien`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`);

--
-- Indexes for table `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`MaPhim`),
  ADD KEY `MaQuocGia` (`MaQuocGia`),
  ADD KEY `MaTL` (`MaTL`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `pttt`
--
ALTER TABLE `pttt`
  ADD PRIMARY KEY (`MaPTTT`);

--
-- Indexes for table `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`MaQC`);

--
-- Indexes for table `quocgia`
--
ALTER TABLE `quocgia`
  ADD PRIMARY KEY (`MaQuocgia`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`MaThanhToan`),
  ADD KEY `MaNhanVien` (`MaNhanVien`),
  ADD KEY `MaDatVe` (`MaDatVe`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaTL`);

--
-- Indexes for table `trangthaighe`
--
ALTER TABLE `trangthaighe`
  ADD KEY `Soghe` (`Maghe`),
  ADD KEY `MaPhong` (`MaPhong`),
  ADD KEY `MaLichChieu` (`MaLichChieu`);

--
-- Indexes for table `ttdatve`
--
ALTER TABLE `ttdatve`
  ADD PRIMARY KEY (`MaDatVe`),
  ADD KEY `MaLichPhim` (`MaLichPhim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ttdatve`
--
ALTER TABLE `ttdatve`
  MODIFY `MaDatVe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=716;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdatve`
--
ALTER TABLE `ctdatve`
  ADD CONSTRAINT `ctdatve_ibfk_1` FOREIGN KEY (`MaDatVe`) REFERENCES `ttdatve` (`MaDatVe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ctdatve_ibfk_2` FOREIGN KEY (`MaGhe`) REFERENCES `ghe` (`maGhe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ghe`
--
ALTER TABLE `ghe`
  ADD CONSTRAINT `ghe_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giave`
--
ALTER TABLE `giave`
  ADD CONSTRAINT `giave_ibfk_1` FOREIGN KEY (`MaLoaiVe`) REFERENCES `loaive` (`Maloaive`);

--
-- Constraints for table `lichchieuphim`
--
ALTER TABLE `lichchieuphim`
  ADD CONSTRAINT `lichchieuphim_ibfk_1` FOREIGN KEY (`MaLichChieu`) REFERENCES `lichchieu` (`MaLichChieu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lichchieuphim_ibfk_2` FOREIGN KEY (`MaPhim`) REFERENCES `phim` (`MaPhim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lichchieuphim_ibfk_3` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `phim_ibfk_1` FOREIGN KEY (`MaQuocGia`) REFERENCES `quocgia` (`MaQuocgia`),
  ADD CONSTRAINT `phim_ibfk_2` FOREIGN KEY (`MaTL`) REFERENCES `theloai` (`MaTL`);

--
-- Constraints for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD CONSTRAINT `thanhtoan_ibfk_2` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNhanVien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `thanhtoan_ibfk_3` FOREIGN KEY (`MaDatVe`) REFERENCES `ttdatve` (`MaDatVe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trangthaighe`
--
ALTER TABLE `trangthaighe`
  ADD CONSTRAINT `trangthaighe_ibfk_3` FOREIGN KEY (`Maghe`) REFERENCES `ghe` (`maGhe`),
  ADD CONSTRAINT `trangthaighe_ibfk_4` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`),
  ADD CONSTRAINT `trangthaighe_ibfk_5` FOREIGN KEY (`MaLichChieu`) REFERENCES `lichchieu` (`MaLichChieu`);

--
-- Constraints for table `ttdatve`
--
ALTER TABLE `ttdatve`
  ADD CONSTRAINT `ttdatve_ibfk_3` FOREIGN KEY (`MaLichPhim`) REFERENCES `lichchieuphim` (`MaLichPhim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
