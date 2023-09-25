-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 22, 2023 lúc 05:35 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `QLShop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `BangSize`
--

CREATE TABLE `BangSize` (
  `MaSize` int NOT NULL,
  `CanNang` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `BangSize`
--

INSERT INTO `BangSize` (`MaSize`, `CanNang`) VALUES
(1, '7-10kg'),
(2, '11-15kg'),
(3, '16-25kg'),
(4, '26-35kg'),
(5, '36-45kg'),
(6, '46-60kg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `username`, `name`, `price`, `quantity`) VALUES
('ATB196877', 'am', 'Áo Thun NorthWest Dễ Thương Cho Bé Trai Mix ', 109000, 3),
('BGB120495', 'am', 'Bộ dài tay mickey dễ thương cho bé gái 10 - 16 Tuổi', 167000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ChiTiet`
--

CREATE TABLE `ChiTiet` (
  `MaDH` int NOT NULL,
  `MaSP` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `SL` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ChiTiet`
--

INSERT INTO `ChiTiet` (`MaDH`, `MaSP`, `SL`) VALUES
(1, 'DGB191316', 1),
(2, 'DGB191319', 1),
(2, 'DGB191329', 1),
(4, 'QTB195591', 5),
(4, 'QTB196407', 1),
(5, 'BGB120495', 1),
(5, 'BGB123146', 1),
(5, 'BGB123176', 1),
(6, 'BTB23681', 2),
(6, 'BTB27030', 1),
(7, 'BGB123146', 1),
(7, 'BGB123176', 1),
(7, 'DGB191319', 1),
(8, 'BGB120495', 1),
(8, 'QTB195591', 1),
(9, 'BGB120495', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ChiTietSize`
--

CREATE TABLE `ChiTietSize` (
  `MaSP` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `MaSize` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ChiTietSize`
--

INSERT INTO `ChiTietSize` (`MaSP`, `MaSize`) VALUES
('ATB196877', 1),
('BGB123221', 1),
('BTB27030', 1),
('BTB27183', 1),
('DGB191339', 1),
('QGB16620', 1),
('QGB17143', 1),
('QTB195689', 1),
('BGB120495', 2),
('BGB123224', 2),
('BTB27053', 2),
('DGB191316', 2),
('DGB292482', 2),
('QGB17028', 2),
('QGB17153', 2),
('QTB196407', 2),
('QTB196891', 2),
('BGB123146', 3),
('BGB123230', 3),
('BTB27071', 3),
('DGB191319', 3),
('DGB292504', 3),
('QGB17080', 3),
('QGB17195', 3),
('QTB196475', 3),
('BGB123176', 4),
('BTB23681', 4),
('BTB27125', 4),
('DGB191321', 4),
('DGB292508', 4),
('QGB17086', 4),
('QGB17246', 4),
('QTB196655', 4),
('BGB123208', 5),
('BTB23721', 5),
('BTB27131', 5),
('DGB191326', 5),
('DGB292516', 5),
('QGB17111', 5),
('QGB17280', 5),
('QTB196770', 5),
('BGB123216', 6),
('BTB24721', 6),
('BTB27171', 6),
('DGB191329', 6),
('DGB292522', 6),
('QGB17126', 6),
('QTB195591', 6),
('QTB196853', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `DatHang`
--

CREATE TABLE `DatHang` (
  `MaDH` int NOT NULL,
  `MaKH` int NOT NULL,
  `NgayTao` date NOT NULL,
  `TinhTrang` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `DatHang`
--

INSERT INTO `DatHang` (`MaDH`, `MaKH`, `NgayTao`, `TinhTrang`) VALUES
(1, 1, '2023-05-02', '1'),
(2, 1, '2023-05-12', '1'),
(4, 5, '2023-05-19', '0'),
(5, 5, '2023-05-19', '1'),
(6, 5, '2023-05-19', '0'),
(7, 6, '2023-05-20', '0'),
(8, 5, '2023-05-21', '1'),
(9, 12, '2023-05-21', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `KhachHang`
--

CREATE TABLE `KhachHang` (
  `MaKH` int NOT NULL,
  `TenKH` text COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_general_ci NOT NULL,
  `SoDT` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `PhanQuyen` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `KhachHang`
--

INSERT INTO `KhachHang` (`MaKH`, `TenKH`, `username`, `password`, `DiaChi`, `SoDT`, `PhanQuyen`) VALUES
(1, 'Nguyễn Văn An', 'Anh', '123456', '140 Lê Trọng Tấn', '0908667554', 0),
(2, 'Ngô Gia', 'B', '123456', '17 Nguyễn Hữu Dật', '0344565766', 0),
(3, 'Ngô Gia Hân', 'admin', '123456', '17A Nguyễn Hữu Dật', '0344565766', 1),
(4, 'Bông', 'bong', '123', 'Vũng Tàu', '0999987000', 0),
(5, 'Phát', 'samg', '123', 'Đồng Tháp', '0987612456', 0),
(6, 'Hoa', 'milo', '123', 'Nhà Bè', '0897812345', 0),
(7, 'Nguyễn A', 'heo', '123', 'Ba Tri', '090990990', 0),
(8, 'NG', 'em', '123', 'Cà Mau', '0789456123', 0),
(9, 'Nguyễn Thị Kim Tuyền', 'hani', '123', 'Bến Tre', '099999999', 0),
(10, 'Nguyen Van A', 'am', '123', 'Tiền Giang', '099999999', 0),
(11, 'Tuyền', 'hahaha', '123', 'Nguyễn Hữu Dật,Tây Thạnh, Tân Phú, TP HCM', '099876788', 0),
(12, 'mới', 'sa', '1234', 'TP HCM', '0987654321', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `LoaiSP`
--

CREATE TABLE `LoaiSP` (
  `maLoai` int NOT NULL,
  `tenLoai` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `LoaiSP`
--

INSERT INTO `LoaiSP` (`maLoai`, `tenLoai`) VALUES
(1, 'Đồ bộ bé gái'),
(2, 'Váy đầm bé gái'),
(3, 'Quần bé gái'),
(4, 'Quần bé trai'),
(5, 'Đồ bộ bé trai'),
(6, 'Áo bé trai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `hinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `masp` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tensp` text COLLATE utf8mb4_general_ci NOT NULL,
  `gia` int NOT NULL,
  `thietKe` text COLLATE utf8mb4_general_ci NOT NULL,
  `loaisp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`hinh`, `masp`, `tensp`, `gia`, `thietKe`, `loaisp`) VALUES
('ao-thun-north-wst-xanh-reu.jpg', 'ATB196877', 'Áo Thun NorthWest Dễ Thương Cho Bé Trai Mix ', 109000, 'Áo thun NorthWest dễ thương cho bé trai mix đồ.\r\nMẫu áo thun họa tiết đơn giản siêu sang. Áo thun được may bằng chất thun cotton 100% thấm hút mồ hôi cực đỉnh \r\n Hình in bao bong tróc', 6),
('h9.jpg', 'BGB120495', 'Bộ dài tay mickey dễ thương cho bé gái 10 - 16 Tuổi', 167000, 'Bộ dài tay Mickey cực đẹp cho bé gái ngày Thu. Nguyên bộ Chất thun cotton 4c mịn, đẹp. Hình in sắc nét, xinh xắn. Quần in hình mickey nguyên cây.\r\nChất liệu: Thun Cotton', 1),
('ao-dai-cach-tan-in-hoa-sen-vang_.jpg', 'BGB123146', 'Set Áo Dài Cách Tân Tay Phồng In HOA SEN 3D Dễ Thương Cho Bé Gái Ngày Lễ Tết ', 290000, 'Set áo dài cách tân tay phồng in HOA SEN 3D dễ thương cho bé gái ngày Lễ Tết. Nguyên bộ chất liệu COTTON LẠNH nhập, chất vải chuyên dùng cho hàng thiết kế. Hoạ tiết sen in 3D cực sắc nét. Áo thiết kế tay phồng điệu đà. . ', 1),
('set-balen-kem.jpg', 'BGB123176', 'Set Áo Sơ Mi BALENCIA Cực Chất Cho Bé Gái Đi Chơi', 187000, 'Hãy hãnh diện vì em là con gái. Một nữa dịu dàng của thế giới bao la. Set áo sơ mi BALENCIA cực chất cho bé gái đi chơi. Áo Sơ mi và Quần sọt lưng thun Chất liệu: vải cotton lạnh hàng may chuẩn đẹp ', 1),
('set-hoa-noi-quan-suong-do.jpg', 'BGB123208', 'Set Áo Hoa Nổi Quần Ống Suông Dễ Thương Cho Bé Gái', 72000, 'Set áo hoa nổi quần ống suông dễ thương cho bé gái . Siêu cute ạ. Mua 1 mà được 2, mẹ có thể tách sét mix đủ thể loaii — nguyên bộ thun coton thái mềm mướt thấm mồ hôi.', 1),
('bo-co-tru-nut-boc-vang.jpg', 'BGB123216', 'Set Cổ Trụ Nút Bọc Quần Sort Dễ Thương Cho Bé Gái Đi Chơi', 162000, 'Set cổ trụ nút bọc quần sort dễ thương cho bé gái đi chơi. Nguyên bộ chất vải xốp, thiết kế áo dáng sơ mi, nút bọc sang chảnh. Phối kèm quần sort được may xếp ly tỉ mỉ, lưng trước được may dáng lưng tây giả dây kéo, phía sau lưng thun giúp bé dễ mặc. ', 1),
('set-so-mi-quan-kaki-hong.jpg', 'BGB123221', 'Set Áo Sơ Mi Quần Kaki Dễ Thương Cho Bé Gái Đi Chơi', 165000, 'Set áo sơ mi quần kaki dễ thương cho bé gái đi chơi. Áo sơ mi vải kate lụa mềm mát, may tay dài gài nút. Quần kaki mềm lưng thun co giãn, may túi hai bên và sau. ', 1),
('set-jeanas-gau-do_.jpg', 'BGB123224', 'Set Jeans In Gấu Dễ Thương Cho Bé Gái Đi Chơi', 220000, 'Set jeans in gấu dễ thương cho bé gái đi chơi . Áo thun cotton 4c , in công nghệ mới, bao bong chóc, quần jean cotton co giãn chất mềm mịn đẹp', 1),
('set-ao-vay-thuy-thu-do.jpg', 'BGB123230', 'Set Áo Váy Thuỷ Thủ Dễ Thương Cho Bé Gái Đi Chơi', 172000, 'Set áo váy thuỷ thủ dễ thương cho bé gái đi chơi . Nguyên set may bằng chất thun cotton 4c mềm mịn, cổ thuỷ thủ chạy dây từ trước ra sau, áo làm bạ vải ép keo đính nút đứng form áo. Chân váy xếp nếp con ly, đính nút. Chân váy chạy sọc. Bên trong có đùi. Form lên dáng rất sang.', 1),
('h11.jpg', 'BTB23681', 'Set áo nón in chữ BABY WHAT dễ thương cho bé trai 10 - 15 Tuổi', 150000, 'Sét bộ BABY WHAT đậm phong cách hip-hop cho Boy lên đồ đi học, đi chơi thật chất và ngầu. Nguyên sét thun cotton chính phẩm co giãn 4c. Áo dạng hoodie năng động, may phối màu tỹ mỹ. Quần đắp túi hộp 2 bên sang trọng và sành điệu. Hình in sắc nét trước sau', 5),
('h12.jpg', 'BTB23721', 'Bộ thun thể thao in số 10 dễ thương cho bé trai 2 - 9 Tuổi', 134000, 'Bộ thun phong cách sporty cho bé trai. Nguyên bộ may bằng chất thun cotton 4c mềm mịn, áo thân trên may dứt liền tay, vai xẻ đôi in trước và sau . Quần lửng ngang gối, chạy lé vòng cung kết hợp in', 5),
('set-croptop-the-thao-cam.jpg', 'BTB24721', 'Set Áo Croptop Sát Nách Quần Thể Thao Siêu Chất Cho Bé Gái', 167000, 'Set áo croptop sát nách quần thể thao siêu chất cho bé gái. Cá tính và năng động cho bé yêu Siêu phẩm 2023 ra mắt Mẫu mới toanh cho gái yêu bung lụa, phom dáng thể thao . Cực chất và siêu ngầu —Nguyên bộ thun coton 4 chiều mềm mại thoáng mát . Hình in sắc nét , chuẩn phom và đường kim mũi chỉ', 1),
('set-somi-trang-.jpg', 'BTB27030', 'Set Sơ Mi Cực Ngầu Cho Bé Trai Đi Chơi ', 247000, 'Set sơ mi cực ngầu cho bé trai đi chơi . Chất liệu - fom dáng - đường may chuẩn đẹp.', 5),
('set-jeans-chu-loang-vang.jpg', 'BTB27053', 'Set Jeans Chữ In Loang Dễ Thương Cho Bé Trai  ', 224000, 'Set jeans chữ in loang dễ thương cho bé trai . Áo thun cotton 4c mềm mịn cực mát, in charm sắc nét, kết hợp quần jeans vải nhập siêu co giãn, hàng chuẩn shop, bao đẹp .', 5),
('set-jeans-caro-quan-jeans-trang.jpg', 'BTB27071', 'Set Jeans Áo Caro Phối Tay Dễ Thương Cho Bé Trai', 220000, 'Set jeans áo caro phối tay dễ thương cho bé trai . Áo thun cotton 4 chiều , phối tay áo, hình in thấm . Chất loại cao cấp Quần jean thun co giãn tốt, hình in công nghệ mới, phối túi y hình .', 5),
('set-jeans-loang-chu-less-do.jpg', 'BTB27125', 'Set Jeans In Chữ Senseless Dễ Thương Cho Bé Trai Đi Chơi', 220000, 'Set jeans in chữ Senseless dễ thương cho bé trai đi chơi. Áo thun cotton 4c , hình in phun sơn, chử thêu  Quần jean thun co giãn mạnh , phối dây Chất loại 1, hàng bao đẹp. ', 5),
('set-jeans-person-den-1.jpg', 'BTB27131', 'Set Jeans In Chữ PERSON Dễ Thương Cho Bé Trai Đi Chơi', 175000, 'Set jeans in chữ PERSON dễ thương cho bé trai đi chơi. Áo thun cotton 4c co giãn, mềm mát, in chữ nổi 2 mặt cực chất. Quần jean chất co giãn mềm mại.', 6),
('bo-thun-bong-bau-duc-trang.jpg', 'BTB27171', 'Bộ Thun Bóng Bầu Dục ABSOR Dễ Thương Cho Bé Trai', 152000, 'Chào buôn bộ bé trai ABSORB. - Nguyên sét thun cotton chính phẩm, co giãn 4C, chất vải mịn sợi dai', 6),
('set-jeans-hinh-1.jpg', 'BTB27183', 'Set Jeans Chữ CANHOOL Dễ Thương Cho Bé Trai Đi Chơi', 235000, 'Set jeans chữ CANHOOL dễ thương cho bé trai đi chơi. Quần jean chất co giãn mềm mại , áo thun cotton hình in', 6),
('h2.jpg', 'DGB191316', 'Đầm cổ trụ cầu vòng dễ thương cho bé gái 10-15 tuổi', 145000, 'Bánh bèo xinh yêu hết nấc. Ra mắt lô đầm cực cute cho bé gái. Đầm tay cánh tiên thân trên thiêu hình cầu vòng sắc sảo phía sau lưng phối kéo giọt nước hàng được may ti mỉ. Nhí 2-9. Đại size 10-15.', 2),
('h4.jpg', 'DGB191319', 'Đầm voan kết hoa rơi dê thương cho bé gái 2-9 tuổi', 160000, 'Đầm voan kết hoa rơi cực xinh ch obes dạo phố. Đầm gồm 1 lớp lụa trong, 2 lớp voan lưới ở ngoài tạo sự mềm mại. Thiết kế cổ vuông lạ mắt, sành điệu. Thân trên đính hoa nổi bật, xinh xắn, đáng yêu', 2),
('h6.jpg', 'DGB191321', 'Đầm voan kết hoa rơi dê thương cho bé gái 10-15 tuổi', 175000, 'Đầm voan kết hoa rơi cực xinh ch obes dạo phố. Đầm gồm 1 lớp lụa trong, 2 lớp voan lưới ở ngoài tạo sự mềm mại. Thiết kế cổ vuông lạ mắt, sành điệu. Thân trên đính hoa nổi bật, xinh xắn, đáng yêu', 2),
('h1.jpg', 'DGB191326', 'Đầm polo thêu thỏ dê thương cho bé gái 1-8 tuổi', 125000, 'Đầm polo cầu vòng dễ thương cho bé yêu đi học đi chơi đều đẹp. Đầm may bằng chất thun cotton 4c, cổ mổ trụ, cổ may bo cotton đặt dệt riêng, hình sắc nét trước và sau, tùng đầm xếp ly lớn.', 2),
('h3.jpg', 'DGB191329', 'Đầm polo thêu thỏ dễ thương cho bé gái 9-14 tuổi', 135000, 'Đầm polo cầu vòng dễ thương cho bé yêu đi học đi chơi đều đẹp. Đầm may bằng chất thun cotton 4c, cổ mổ trụ, cổ may bo cotton đặt dệt riêng, hình sắc nét trước và sau, tùng đầm xếp ly lớn.', 2),
('h6.jpg', 'DGB191339', 'Đầm kate phối màu thắt nơ eo dê thương cho bé gái 9 -12 tuôi', 128000, 'Đầm chữ A phối màu thắt nơ eo cực xinh cho bé gái. Chất kate mềm mát, thấm hút mồ hôi tốt. Đầm nhún bèo tay xinh xắn, đính nút kiểu, tùng phối màu kết hợp chạy nơ nổi bật. Phía sau may dây kéo giọt nước. ', 2),
('dam-co-tru-sao-cam-sua-1_.jpg', 'DGB292482', 'Đầm Cổ Trụ Cầu Vồng Dễ Thương Cho Bé Gái', 172000, 'Đầm cổ trụ cầu vồng dễ thương cho bé gái —thiết kế tuy đơn giản nhưng thu hút mọi ánh nhìn. Chất vải mềm mịn thấm mồ hôi —Hình in sắc nét không bong tróc ', 2),
('dam-elsa-do.jpg', 'DGB292504', 'Đầm Công Chúa Elsa Dễ Thương Cho Bé Gái Dịp Noel Tết', 338000, 'Siêu phẩm váy xinh thực sự đáng đồng tiền ba mẹ bỏ ra chọn lựa sản phẩm hoàn hảo nhất cho bé yêu —- Hình in công chúa elsa mà bé nào cũng thích, bé nào cũng mê. Đầm được thiết kế tỷ mỷ từng chi tiết nhỏ . Đến phom dáng và màu sắc — Thân trên 2 lớp ,1 lớp lưới chính và 1 lớp lót. Đính ngọc trai tạo điểm nhấn — Tùng xoè 5 lớp : 1 lớp lưới chính , 1 lớp kiếng bung, 2 lớp lưới phụ , 1 lớp lót mềm mại thấm hút mồ hôi . Tất cả đều tùng xoè 360 độ . Phía sau cột dây nơ và giây kéo giọt nước . ', 2),
('vay no cho bé gái.jpg', 'DGB292508', 'Đầm Cổ Trụ Thỏ Đính Đá Dễ Thương Cho Bé Gái', 182000, 'Đầm cổ trụ thỏ đính đá dễ thương cho bé gái — Hàng thiết kế chất liệu cotton, phụ kiện nhập , đường may tỉ mỉ sắc nét. ', 2),
('dam-co-tau-tet-hoa-dao-do.jpg', 'DGB292516', 'Đầm Cổ Tàu Hoa Đào Xẻ Tà Dễ Thương Cho Bé Gái Lễ Tết', 220000, 'Một chút phá cách vô cùng đáng yêu cho công chúa nhỏ với chiếc đầm cách điệu xinh xắn Đầm cổ tàu hoa đào xẻ tà dễ thương cho bé gái Lễ Tết ! Chất Tơ nhung in độc quyền nhà Honey, kiểu dáng đáng yêu phù hợp với các cô nàng kẹo ngọt..', 2),
('dam-hoa-duoi-ca-cam-.jpg', 'DGB292522', 'Đầm Hoa Đuôi Cá Dễ Thương Cho Bé Gái', 157000, '𝙼𝚊́ 𝚎𝚖 𝚍𝚊̣̆𝚗 𝚕𝚊̀.. 𝚌𝚘𝚗 𝚐𝚊́𝚒 𝚙𝚑𝚊̉𝚒 đ𝚒𝚎̣̂𝚞 đ𝚊̀ Đủ xinh và sang chưa moom ơi, nhanh tay rinh về cho bé yêu nhà mình thôi ạ —Đầm được may trên chất liệu kate nhập , chuẩn from , tỉ mỉ từng đường kim mũi chỉ.', 2),
('h10.jpg', 'QGB16620', 'Chân váy đính hạt dễ thương cho bé gái 10 - 16 Tuổi QGB16620', 135000, 'Chân váy HOT MIX với MỌI KIỂU ÁO! Chân váy xinh yêu hot hit cho bé đi chơi, đi học. Váy sử dụng chất kate cotton hút mồ hôi tạo độ xoè phối 3 lớp lưới mềm ko ngứa - Đính hạt sang trọng. Kết hợp được nhiều loại áo, bé bận đi học, đi chơi hoặc đi tiệc đều đẹp.', 2),
('quan-lung-loe-mat-cuoi-den.jpg', 'QGB17028', 'Quần Lửng Ống Loe Mặt Cười Dễ Thương Cho Bé Gái', 290000, 'Quần loe đang gây bão thời trang , phom lỡ như mẫu mặc , đắp logo siêu kute , chất thun cotton chính phẩm loại 1. ', 3),
('quan-lung-jeans-2_.jpg', 'QGB17080', 'Quần Lửng Jeans Trơn Dễ Thương Cho Bé Gái', 162000, 'Một gợi ý cho những ngày đơn giản và tiện lợi,1 chiếc quần lửng jean với chiếc áo sát nách hay áo 2 dây —phối thêm 1 đôi boot hoặc sneaker là đã có một outfit xinh xắn để ra đường dạo phố …. - Quần được may trên chất liệu jean giãn mềm mại .', 3),
('quan-legging-lung-trang.jpg', 'QGB17086', 'Quần Thun Legging Lửng Dễ Thương Cho Bé Gái', 99000, 'Chiếc quần hotrend nhất, dễ phối tất cả loại áo có trong tủ đồ.Vẫn sành điệu , năng động thoải mái nha.  Có 3 màu , quá xuất sắc tươi tắn với chất thun thun cotton co giãn 4C cao cấp xịn sò.Fom lửng legging ôm..', 3),
('quan-sort-jeans.jpg', 'QGB17111', 'Quần Sort Jeans Mộc Dễ Thương Cho Bé Gái ', 152000, 'MỘT CHIẾC MÀU CUTE XỈU LUÔNG• siêu hackk dáng nha các chế một chiếc quần jean siêu sang  —chất jean giãn mềm mại, kèm tăng đơ tăng giảm trong', 3),
('quan-jean-ong-rong-xanh-nhat.jpg', 'QGB17126', 'Quần Jeans Ống Rộng Chữ C Dễ Thương Cho Bé Gái', 170000, 'Giới thiệu quần jean ống rộng hot trend siêu xinh cho bé gái. - Quần may bằng jean cotton wash mềm. Hình in sắc nét.', 3),
('jans-loe-xanh-dam_.jpg', 'QGB17143', 'Quần Jeans Dài Ống Loe Dễ Thương Cho Bé Gái ', 183000, 'Thêm mẫu mới quần jean ống loe thời trang cho bé gái mix đồ đi chơi. Chất jean thun co giãn wax mềm. Hàng bao đẹp.. ', 3),
('quan-jeans-lung-in-gau-.jpg', 'QGB17153', 'Quần Jeans Lửng In Gấu Dễ Thương Cho Bé Gái ', 155000, 'Quần jean lửng hot trend siêu xinh cho bé gái. - Quần may bằng jean Cotton wash mềm cao cấp . Lưng thun co giãn . Hình in cao cấp. ..', 3),
('quan-legging-sao-xam.jpg', 'QGB17195', 'Quần Legging Sao Dễ Thương Cho Bé Gái', 109000, 'Quần legging sao dễ thương cho bé gái. Quần chất bozip cotton co giãn 4c, mịn đẹp. Thiết kế phom ôm chân năng động .', 3),
('setvestchanvayhong_.jpg', 'QGB17246', 'Set Váy Xếp Ly Dễ Thương Cho Bé Gái ', 132000, 'Chân váy quốc dân, không bao giờ lỗi mốt. Mix triệu thể loại —Chất liệu coton thái mềm mại đứng phom. Phía trước lưng tây , phía sau lưng thung.', 1),
('chan-vay-phoi-nut-xep-ly-xam.jpg', 'QGB17280', 'Chân Váy Xếp Ly Phối Nút Dễ Thương Cho Bé Gái', 137000, 'Xuất sắc chưa các mom Chân váy quốc dân mix triệu thể loại lunn ạ. Chân váy vải nhập sịn sò, mềm mịn. Bên trong có chip, phía sau lưng thun giúp bé thoải mái khi mặc', 2),
('h8.jpg', 'QTB195591', 'Quần thun da cá mỏ neo dễ thương cho bé trai 1 - 8 Tuổi QTB195591', 79000, 'Quần mỏ neo dây gút gỉa phong cách cho bé đi chơi. Chất thun da cá dầy dặn, mềm, hình in mỏ neo nguyên cây, dây gút giả, mổ túi hai bên. ', 4),
('h7.jpg', 'QTB195689', 'Quần thun da cá thể thao Puma dễ thương cho bé trai 1 - 10 Tuổi QTB195689', 105000, 'Quần thun chạy sọc thể thao Puma cho bé trai ngày lạnh. Chất thun da cá dầy dặn, mềm mại, bao đẹp. Quần lưng thun dây gút giả, mổ túi hai bên, thêu logo Puma, chạy viền sọc hai bên khỏe khoắn, năng động. ', 4),
('quan jeans in số 3.jpg', 'QTB196407', 'Quần Jeans Jogger In Số 3 Dễ Thương Cho Bé Trai', 99000, 'ogger JEAN cực chất - cực ngầu cho Boy mix đồ diện Lễ Tết. Chất Jean nhập co giãn mạnh, mềm mại. Hình in sắc nét. Đắp túi hộp phong cách thể thao- năng động..', 4),
('quandacakem_.jpg', 'QTB196475', 'Quần Da Cá Túi Hộp Chữ X Dễ Thương Cho Bé Trai', 132000, 'Quần túi hộp cho Btrai năng động - dễ dàng kết hợp với các loại áo. Chất thun da cá dày dặn, túi hộp 2 bên. Hình in chữ X hot trend. .', 4),
('quan-joger-jeans-be-trai-den.jpg', 'QTB196655', 'Quần Jeans Jogger Thêu Hình Dễ Thương Cho Bé Trai ', 172000, 'OGGER JEAN sang trọng- lịch lãm cho Boy phối đồ đi học, đi chơi thật ngầu :)) Chất JEAN nhập mềm mịn, co giãn mạnh. Đơn giản- dễ mặc- dễ phối đồ. Phong cách năng động, cá tính. ', 4),
('quan-jean-bo-xanh-dam.jpg', 'QTB196770', 'Quần Jeans TÚI HỘP Bo Ống Dễ Thương Cho Bé Trai', 170000, 'Giới thiệu mẫu quần jean Btrai hot hit - Chất jean có giãn, wash mềm cao cấp, bo ống, túi hộp sành điệu.', 4),
('quan jeans nam den.jpg', 'QTB196853', 'Quần Jeans Dài JOGGER Kèm Phụ Kiện Cho Bé Trai ', 225000, 'Jean BiBi cao cấp !!! Dòng hàng cho bé trai Chất jean thun mềm co giãn , dễ mặc Phom đẹp kiểu dáng thời trang ', 4),
('quan jeans nam xanh.jpg', 'QTB196857', 'Quần Jean Dài DÂY KÉO Kèm NỊCH Cho Bé Trai ', 225000, 'Jean BiBi cao cấp !!! Dòng hàng cho bé trai Chất jean thun mềm co giãn , dễ mặc Form đẹp kiểu dáng thời trang.', 4),
('quan-sort-jeans-be-trai-.jpg', 'QTB196891', 'Quần Sort Jeans In Chữ MSGM (KHÔNG KÈM NỊCH) Dễ Thương Cho Bé Trai Phối Đồ ', 149000, '𝐓𝐫𝐚𝐢 𝐘𝐞̂𝐮 𝐜𝐮̉𝐚 𝐦𝐞̣ 𝐜𝐮̛́ 𝐩𝐡𝐚̉𝐢 Đ𝐞̣𝐩 𝐧𝐡𝐮̛ 𝐇𝐨𝐭𝐁𝐨𝐲𝐬 𝐭𝐡𝐢̀ 𝐦𝐨̛́𝐢 𝐜𝐡𝐢̣𝐮 𝐜𝐨̛ —Cá tính , năng động và siêu đẹp với những chiếc đùi jean . Một sản phẩm không thể thiếu trong tủ đồ của bé —Chất jean giãn mềm mại, hình in cao cấp bao đẹp không bong tróc .màu y hình . Cực dễ mix đồ , đi học đi chơi đẹp xỉu  .', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `BangSize`
--
ALTER TABLE `BangSize`
  ADD PRIMARY KEY (`MaSize`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Chỉ mục cho bảng `ChiTiet`
--
ALTER TABLE `ChiTiet`
  ADD PRIMARY KEY (`MaDH`,`MaSP`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `ChiTietSize`
--
ALTER TABLE `ChiTietSize`
  ADD PRIMARY KEY (`MaSP`,`MaSize`),
  ADD KEY `MaSize` (`MaSize`);

--
-- Chỉ mục cho bảng `DatHang`
--
ALTER TABLE `DatHang`
  ADD PRIMARY KEY (`MaDH`),
  ADD KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `KhachHang`
--
ALTER TABLE `KhachHang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `LoaiSP`
--
ALTER TABLE `LoaiSP`
  ADD PRIMARY KEY (`maLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `loaisp` (`loaisp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `DatHang`
--
ALTER TABLE `DatHang`
  MODIFY `MaDH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `KhachHang`
--
ALTER TABLE `KhachHang`
  MODIFY `MaKH` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id`) REFERENCES `sanpham` (`masp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ChiTiet`
--
ALTER TABLE `ChiTiet`
  ADD CONSTRAINT `chitiet_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`masp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `ChiTietSize`
--
ALTER TABLE `ChiTietSize`
  ADD CONSTRAINT `chitietsize_ibfk_1` FOREIGN KEY (`MaSize`) REFERENCES `BangSize` (`MaSize`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chitietsize_ibfk_2` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`masp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `DatHang`
--
ALTER TABLE `DatHang`
  ADD CONSTRAINT `dathang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `KhachHang` (`MaKH`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loaisp`) REFERENCES `LoaiSP` (`maLoai`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
