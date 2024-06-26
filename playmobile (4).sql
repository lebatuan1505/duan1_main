-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 07, 2024 lúc 08:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `playmobile`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `pttt` int(11) NOT NULL COMMENT '	1. thanh toán trực tiếp 2. thanh toán qr momo 3. thanh toan atm momo',
  `tongbill` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL COMMENT '0.Chờ xác nhận 1.Đã xác nhận 2.Đang chuẩn bị hàng 3.Đang giao hàng 4.Đã nhận hàng 5.Đơn hàng bị hủy',
  `trangthaitt` int(11) NOT NULL COMMENT '0.Chưa thanh toán; 1.Đã thanh toán',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `ngaydat`, `pttt`, `tongbill`, `trangthai`, `trangthaitt`, `id_user`) VALUES
(24, '2024-04-07', 1, 1590000, 4, 0, 16),
(25, '2024-04-07', 1, 1590000, 4, 0, 16),
(26, '2024-04-07', 1, 1590000, 4, 0, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id_cmt` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content_cmt` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id_cmt`, `id_user`, `content_cmt`, `time`, `id_sp`) VALUES
(19, 16, 'Giày tốt ', '2024-04-07 08:12:13', 32),
(20, 16, 'giày được đấy chứ', '2024-04-07 08:13:58', 32),
(21, 16, 'giày được đấy chứ', '2024-04-07 08:15:04', 32),
(22, 16, 'abc', '2024-04-07 08:16:27', 32),
(23, 16, 'Giày giao nhanh đá tốt', '2024-04-07 08:17:34', 32),
(24, 16, 'Giày real hay fake vậy ạ', '2024-04-07 08:18:00', 36),
(25, 16, 'abc', '2024-04-07 08:20:11', 36),
(26, 16, 'Đinh gì vậy ạ', '2024-04-07 08:21:17', 39);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `size_sp` int(11) NOT NULL,
  `price_sp` int(11) NOT NULL,
  `soluong_sp` int(11) NOT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_bill`, `id_sp`, `name_sp`, `size_sp`, `price_sp`, `soluong_sp`, `tong_tien`) VALUES
(25, 24, 33, 'MIZUNO MORELIA SALA CLUB TF - Q1GB240391 - TRẮNG/ĐỎ', 40, 1590000, 1, 1590000),
(26, 25, 32, 'MIZUNO MORELIA SALA CLUB TF - Q1GB240390 - XANH/TRẮNG', 40, 1590000, 1, 1590000),
(27, 26, 33, 'MIZUNO MORELIA SALA CLUB TF - Q1GB240391 - TRẮNG/ĐỎ', 40, 1590000, 1, 1590000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `name_dm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `name_dm`) VALUES
(30, 'NIKE'),
(31, 'ADIDAS'),
(32, 'PUMA'),
(33, 'MIZUNO'),
(34, 'JOMA'),
(35, 'KAMITO'),
(37, 'ĐỘNG LỰC'),
(38, 'GRANDSPORT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `id_dm` int(11) NOT NULL,
  `name_sp` varchar(255) NOT NULL,
  `price_sp` decimal(10,0) NOT NULL,
  `thongso` text NOT NULL,
  `desc_sp` text NOT NULL,
  `soluong` int(11) NOT NULL,
  `image_sp` varchar(255) NOT NULL,
  `luotban` int(11) NOT NULL,
  `matsan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `name_sp`, `price_sp`, `thongso`, `desc_sp`, `soluong`, `image_sp`, `luotban`, `matsan`) VALUES
(32, 33, 'MIZUNO MORELIA SALA CLUB TF - Q1GB240390 - XANH/TRẮNG', 1590000, '', ' MIZUNO MORELIA SALA CLUB TF là dòng giày sân cỏ nhân tạo mới của Mizuno, phiên bản này có rất nhiều cải tiến phù hợp với bàn chân người Việt và hỗ trợ cầu thủ trong những pha xoay sở khó khăn. \r\n\r\nĐặc tính nổi bật: \r\n\r\nPhần upper làm bằng da tổng hợp thế hệ mới, liền mạch trên toàn thân giày giúp các cầu thủ khống chế bóng êm ái và kiểm soát bóng tốt hơn.\r\n\r\nThiết kế ấn tượng với những họa tiết chạy dọc theo thân giày, mang tới sự trẻ trung, năng động cho tổng thể thiết kế.\r\n\r\nPhần mũi giày được đệm bằng lớp da sần tổng hợp chắc chắn, vừa giúp bảo vệ ngón chân, vừa hạn chế việc bong, tróc da, tăng tuổi thọ cho đôi giày. \r\n\r\nĐế ngoài làm bằng cao su với hệ thống đinh sắp xếp hợp lý, dễ dàng đổi hướng và bám sân theo nhiều hướng di chuyển.  \r\n\r\nThiết kế WIDE phù hợp với form chân bè của đại đa số người Việt Nam, các cầu thủ dù chân bè nhiều hay trung bình đều có thể đi giày vừa vặn, thoải mái.\r\n\r\nTrọng lượng nhẹ hơn các mẫu giày cùng phân khúc, hỗ trợ các bước di chuyển nhanh của cầu thủ.\r\n\r\nLót giày êm ái, chống trượt hiệu quả. \r\n\r\nDàn đinh dăm được bố trí khoa học và bền bỉ, bám sân rất tốt ngay cả khi điều kiện thời tiết không thật sự thuận lợi.    ', 15, 'MZN-xanh.jpg', 11, 1),
(33, 33, 'MIZUNO MORELIA SALA CLUB TF - Q1GB240391 - TRẮNG/ĐỎ', 1590000, '', ' MIZUNO MORELIA SALA CLUB TF là dòng giày sân cỏ nhân tạo mới của Mizuno, phiên bản này có rất nhiều cải tiến phù hợp với bàn chân người Việt và hỗ trợ cầu thủ trong những pha xoay sở khó khăn. \r\n\r\nĐặc tính nổi bật: \r\n\r\nPhần upper làm bằng da tổng hợp thế hệ mới, liền mạch trên toàn thân giày giúp các cầu thủ khống chế bóng êm ái và kiểm soát bóng tốt hơn.\r\n\r\nThiết kế ấn tượng với những họa tiết chạy dọc theo thân giày, mang tới sự trẻ trung, năng động cho tổng thể thiết kế.\r\n\r\nPhần mũi giày được đệm bằng lớp da sần tổng hợp chắc chắn, vừa giúp bảo vệ ngón chân, vừa hạn chế việc bong, tróc da, tăng tuổi thọ cho đôi giày. \r\n\r\nĐế ngoài làm bằng cao su với hệ thống đinh sắp xếp hợp lý, dễ dàng đổi hướng và bám sân theo nhiều hướng di chuyển.  \r\n\r\nThiết kế WIDE phù hợp với form chân bè của đại đa số người Việt Nam, các cầu thủ dù chân bè nhiều hay trung bình đều có thể đi giày vừa vặn, thoải mái.\r\n\r\nTrọng lượng nhẹ hơn các mẫu giày cùng phân khúc, hỗ trợ các bước di chuyển nhanh của cầu thủ.\r\n\r\nLót giày êm ái, chống trượt hiệu quả. \r\n\r\nDàn đinh dăm được bố trí khoa học và bền bỉ, bám sân rất tốt ngay cả khi điều kiện thời tiết không thật sự thuận lợi.  ', 15, 'MZN-xanhtrang.jpg', 10, 1),
(34, 30, 'NIKE ZOOM MERCURIAL VAPOR 15 PRO TF - DJ5605-605 - HỒNG/XANH', 1999000, '', ' NIKE ZOOM MERCURIAL VAPOR 15 PRO TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nTháng 6/2022, Nike chính thức trình làng thế hệ tiếp theo của dòng giày Mercurial mang tên Air Zoom Mercurial. Cải tiến lớn nhất trên thế hệ này nằm ở bộ đệm Zoom Air được thiết kế độc quyền cho bóng đá. Bên cạnh đó, mọi chi tiết trên đôi giày lần này đều được thiết kế nhằm tối ưu hoá lối chơi tốc độ. \r\n\r\nNike khởi đầu năm 2023 với bộ sưu tập “Blast Pack” hoàn toàn mới. Ở lần phát hành này, nhà Swoosh đã giới thiệu những phiên bản Phantom GX cùng với Air Zoom Mercurial Superfly 9 và Vapor 15 trong phối màu trắng xanh vô cùng năng động.\r\n\r\nThông số kỹ thuật:\r\n\r\nMẫu giày đá bóng ZOOM MERCURIAL VAPOR 15 PRO TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người.\r\n\r\nPhân khúc: Pro (Chuyên nghiệp).\r\n\r\nUpper làm từ da tổng hợp cao cấp và sợi dệt. Trên bề mặt upper là các vân Hyperscreen 3D được thiết kế để mang lại cảm giác thật chân khi chạm và rê bóng ở tốc độ cao. \r\n\r\nỞ thế hệ 15 này, hãng đã phủ thêm lớp NikeSkin trên bề mặt upper làm tăng độ bám bóng, từ đó có thể kiểm soát bóng và rê bóng tốt hơn. Cấu trúc Speed Cage bên dưới bề mặt upper được làm từ chất liệu mỏng nhưng cực kỳ chắc chắn sẽ mang đến sự ôm chân vừa khít, đồng thời hạn chế sự xê dịch chân trong giày khi thi đấu ở cường độ cao.\r\n\r\n ', 15, 'vapor-hong.jpg', 0, 1),
(35, 31, 'ADIDAS X CRAZYFAST LEAGUE TF - IF0698 - VÀNG NEON/ĐEN', 1950000, '', ' ADIDAS X CRAZYFAST LEAGUE TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nViết nên câu chuyện tốc độ của riêng bạn với mẫu giày đá banh ADIDAS X CRAZYFAST LEAGUE TF “Solar Energy Pack” hoàn toàn mới! Sở hữu những cải tiến mới nhất cùng một thiết kế tối giản phục vụ cho lối chơi tốc độ, X CRAZYFAST LEAGUE TF xứng đáng là sự lựa chọn hàng đầu dành cho những tiền vệ và tiền đạo ưu tiên sự linh hoạt và thanh thoát trong cách chơi của mình!\r\n\r\nMẫu giày đá bóng X CRAZYFAST thuộc bộ sưu tập “Solar Energy” với phối màu “Team Solar Yellow/Core Black/White” bắt mắt sẽ được những ngôi sao hàng đầu adidas mang trên chân như Lionel Messi, Mohamed Salah, Thomas Muller, Karim Benzema, Julian Alvarez, Son Heung Min, Joao Felix, Takefusa Kubo …. \r\n\r\nThông số kỹ thuật:\r\n\r\nADIDAS X CRAZYFAST LEAGUE TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo từ 5-7 người.\r\n\r\nPhân khúc: League (tầm trung).\r\n\r\nPhần upper làm từ chất liệu da tổng hợp pha sợi dệt mềm mại, mang lại cảm giác bóng tốt nhất cho người mang. Trên bề mặt upper được phủ một lớp nhựa TPU giúp tăng khả năng kiểm soát khi rê dắt bóng ở tốc độ cao. \r\n\r\nLưỡi gà liền được làm từ sợi dệt với độ co giãn cao, giúp ôm khít phần mu và cổ chân.  \r\n\r\nĐệm gót là một lớp vải nhung dày dặn, mang lại cảm giác ôm chân vừa vặn và êm ái. \r\n\r\nKhung bọc gót TPU giúp hạn chế tình trạng xê dịch gót chân khi di chuyển ở cường độ cao. \r\n\r\n   ', 15, 'crazyfast-vang.jpg', 0, 1),
(36, 32, 'PUMA ULTRA MATCH TT - 107757-01 - HỒNG/ĐEN', 2033000, '', ' PUMA ULTRA MATCH TT - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\nNhanh hơn - bùng nổ hơn - hãy nâng cấp lối chơi tốc độ của bạn với phiên bản ULTRA MATCH TT 2023 mới.\r\n\r\nPUMA ULTRA MATCH TT đã trở lại với những cải tiến đáng kể so với phiên bản trước, nhằm mang lại trải nghiệm tự tin và bùng nổ hơn cho người mang trong suốt quá trình chơi bóng. \r\n\r\nThông số kỹ thuật:\r\n\r\nPUMA ULTRA MATCH TT là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo từ 5-7 người. \r\n\r\nPhân khúc: Match (tầm trung).\r\n\r\nPhần upper làm từ da tổng hợp pha sợi dệt siêu nhẹ mang đến cảm giác bóng thật chân nhất cho người mang.\r\n\r\nTrên bề mặt upper được phủ lớp GRIP CONTROL làm tăng độ bám bóng và nâng cao khả năng kiểm soát bóng, giúp người chơi có thể chơi bóng ở mọi điều kiện thời tiết.\r\n\r\nCổ giày và lưỡi gà liền được làm từ chất liệu sợi dệt với độ co giãn cao, tạo nên cảm giác ôm chân chắc chắn cho khu vực cổ chân. \r\n\r\nĐệm gót giày làm từ vải nhung, giúp ôm phần gót chân vừa vặn và thoải mái.  \r\n\r\nBộ đệm EVA tạo cảm giác êm ái trong từng pha di chuyển, đồng thời giúp giảm phản lực từ mặt sân cỏ nhân tạo lên các khớp gối.\r\n\r\nĐế ngoài TPU SPEEDPLATE được làm từ chất liệu cao su cao cấp với các đinh dạng hình mũi tên giúp tăng khả năng bám sân tối đa, tạo lực đẩy trong từng bước chạy và hỗ trợ khả năng xoay trở trong phạm vi không gian hẹp.\r\n\r\nPhù hợp với cầu thủ có thiên hướng sử dụng: tốc độ, kỹ thuật, rê dắt và sút bóng. \r\n\r\nCác cầu thủ nổi tiếng đang mang trên chân dòng giày đá bóng PUMA ULTRA: Antoine Griezmann, Antony, Marco Reus Raphael Varane, Christian Pulisic, Kingsley Coman...\r\n\r\nBộ sưu tập: Phenomenal Pack (01/2024).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n  ', 15, 'puma-hong-den.jpg', 9, 1),
(37, 32, 'PUMA FUTURE ULTIMATE CAGE - 107364-03 - XANH NAVY', 1999000, '', ' PUMA FUTURE ULTIMATE CAGE TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nTự do chơi bóng - tự do di chuyển - tự do sáng tạo - làm chủ cuộc chơi cùng mẫu giày đá banh PUMA FUTURE ULTIMATE CAGE TF hoàn toàn mới. \r\nĐược thiết kế cho những playmaker hàng đầu như Neymar Jr, PUMA Future Ultimate Cage TF sẽ giúp bạn tự tin trình diễn khả năng chơi bóng tốt nhất của bản thân trên sân cỏ!\r\n\r\nThông số kỹ thuật\r\nPUMA FUTURE ULTIMATE CAGE là mẫu giày đá banh đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhần upper làm từ chất liệu sợi tổng hợp siêu mềm mại kết hợp với dải thun FUZION FIT360 cải tiến nằm giữa thân giày. Dải thun này có khả năng thích ứng cực tốt với hình dáng bàn chân người mang, đảm bảo sự vừa vặn thoải mái khi mang giày có dây lẫn không dây.\r\n\r\nDải băng PWRTAPE được đặt ở hai bên thân giày giúp giữ form giày không bị giãn quá mức sau một thời gian sử dụng  \r\n\r\nCông nghệ Engineered Control Zone bao gồm các hạt được in dập nổi ở những khu vực tiếp xúc bóng chủ yếu giúp làm tăng ma sát với bóng. Từ đó nâng cao khả năng kiểm soát bóng của người mang trong các tình huống rê bóng ở tốc độ cao. \r\n\r\nCổ giày làm từ chất liệu sợi dệt với độ co giãn cao. \r\n\r\nLớp lót gót làm từ chất liệu da simili mềm mại, mang đến cảm giác ôm chân vừa vặn và thoải mái.\r\n\r\nBộ đệm EVA cao cấp mang đến sự êm ái trong từng bước chạy và hỗ trợ các tình huống bứt tốc.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh có hình dạng chữ Z đặc trưng giúp làm tăng độ bám sân, hỗ trợ khả năng xoay trở trong phạm vi không gian hẹp. \r\n\r\nPhù hợp với cầu thủ có thiên hướng: sử dụng kỹ thuật, rê dắt, dứt điểm…\r\n\r\nCác cầu thủ nổi tiếng đang mang trên chân dòng giày PUMA Future Ultimate: Neymar Jr, Thiago Silva, Luis Suárez, Jorginho, Ederson…\r\n\r\nBộ sưu tập: Gear Up Pack (09/2023).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n  ', 15, 'pumaxanh.jpg', 0, 1),
(38, 34, 'JOMA TOP FLEX REBOUND IN 2332 - TRẮNG/HỒNG/XANH', 1750000, '', ' JOMA TOP FLEX LEATHER REBOUND IN - GIÀY ĐÁ BÓNG SÂN FUTSAL\r\n\r\nLà phiên bản nâng cấp của JOMA TOP FLEX - một trong những dòng giày đá bóng Futsal được yêu thích nhất hiện nay, JOMA TOP FLEX LEATHER REBOUND IN sở hữu nhiều công nghệ nổi bật được thiết kế nhằm mang lại hiệu suất cao nhất cho người chơi khi thi đấu. Với kiểu dáng hiện đại cùng các phối màu đầy bắt mắt, JOMA TOP FLEX LEATHER REBOUND IN sẽ là sự lựa chọn hoàn hảo cho những tín đồ đam mê Futsal. \r\n\r\nThông số kỹ thuật\r\n\r\nJOMA TOP FLEX LEATHER REBOUND IN là mẫu giày đá bóng đế IC dành cho mặt sân trong nhà hoặc sân cỏ nhân tạo 5 người.\r\n\r\nPhần upper được làm từ da tự nhiên (da heo) mềm mại và đàn hồi, giúp mang đến cảm giác bóng tốt nhất cho người chơi. \r\n\r\nKhu vực đầu mũi được bọc da lộn giúp tăng độ bền cho đôi giày. Ngoài ra, hãng còn trang bị thêm một khung bọc nhựa giúp bảo vệ các đầu ngón chân của người mang, đồng thời hỗ trợ cho những pha chích mũi trở nên chính xác và uy lực hơn.  \r\n\r\nTrên phần thân giày được trang bị các lỗ thoát khí theo công nghệ VTS giúp cho đôi giày trở nên thoáng khí hơn, đảm bảo sự thoải mái trong suốt quá trình thi đấu.\r\n\r\nLưỡi gà rời làm từ chất liệu vải lưới với lớp đệm êm mềm, giúp tăng thêm cảm giác cho những cú đỡ bóng bằng mu bàn chân của người mang. \r\n\r\nLót gót giày với chất liệu tương tự lưỡi gà mang lại cảm giác ôm chân vừa vặn nhưng không kém phần thoải mái.      ', 15, 'JM-XANH.jpg', 0, 1),
(39, 32, 'PUMA FUTURE 7 MATCH TT - 107720-01 - TRẮNG/HỒNG', 2033000, '', ' PUMA FUTURE 7 MATCH TT - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\n“FUTURE Fits Different” - sáng tạo nên những điều phi thường trên sân cỏ cùng PUMA FUTURE 7 MATCH TT. Một thế hệ hoàn toàn mới được thiết kế riêng cho các playmaker với khả năng thay đổi trận đấu, FUTURE 7 MATCH TT sẽ giúp bạn tự tin trình diễn tất cả năng lực chơi bóng của bản thân mỗi khi ra sân!\r\n\r\nThông số kỹ thuật\r\n\r\nPUMA FUTURE 7 MATCH TT là mẫu giày đá banh đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhân khúc: Match (tầm trung).\r\n\r\nPhần upper làm từ da tổng hợp thế hệ mới với độ mềm mại và đàn hồi cao, được mô phỏng theo chất liệu sợi dệt. \r\n\r\nGiữa thân giày là dải thun FUZIONFIT cải tiến có khả năng thích ứng cực tốt với hình dáng bàn chân người mang, đảm bảo sự vừa vặn thoải mái khi mang giày có dây lẫn không dây.\r\n\r\nChính giữa thân giày là dải băng hình chữ Y được mô phỏng theo công nghệ PWRTAPE trên phân khúc Ultimate.  \r\n\r\nCông nghệ Engineered 3D Texture bao gồm các hạt được in dập nổi ở những khu vực tiếp xúc bóng chủ yếu giúp làm tăng ma sát với bóng. Từ đó tối ưu hóa khả năng chạm và kiểm soát bóng của người mang trong các tình huống xử lý ở tốc độ cao. \r\n\r\nCổ giày làm từ chất liệu sợi dệt với độ co giãn cao. \r\n\r\nĐệm gót làm từ chất liệu da simili mềm mại, mang đến cảm giác ôm chân vừa vặn và thoải mái.\r\n\r\nBộ đệm EVA cao cấp mang đến sự êm ái trong từng bước chạy và hỗ trợ các tình huống bứt tốc, đồng thời hạn chế phản lực từ bề mặt sân cứng tác động lên các khớp gối và gót.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh có hình dạng chữ Z đặc trưng giúp làm tăng độ bám sân, hỗ trợ khả năng xoay trở trong phạm vi không gian hẹp. \r\n  ', 15, 'puma-trang-hong.jpg', 0, 2),
(40, 31, 'ADIDAS COPA GLORO TF - IE7541 - TRẮNG KEM', 1950000, '', 'ADIDAS COPA GLORO TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\n1 dòng giày đế Turf mới của adidas dành cho các fan đam mê những thiết kế hoài cổ. ADIDAS COPA GLORO TF nổi bật với upper da tự nhiên và bộ đệm Lightstrike này hứa hẹn sẽ mang đến trải nghiệm chơi bóng “có một không hai” dành cho anh em. \r\n\r\nThông số kỹ thuật:\r\n\r\nADIDAS COPA GLORO TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhần upper làm từ chất liệu da bê cao cấp mang lại cảm giác bóng tốt nhất cho người chơi. Trên bề mặt upper là những đường khâu mắt lưới được đan xen vào nhau nhằm giữ hình dáng cho upper sau thời gian dài sử dụng. Hai bên thân giày làm từ da tổng hợp.\r\n\r\nLưỡi gà rời gập độc lạ, gợi nhớ đến những đôi giày đá bóng da thật truyền thống.  \r\n\r\nLớp lót gót được cấu thành từ chất liệu da tổng hợp tạo cảm giác ôm chân vừa vặn và thoải mái. Khung bọc gót với thiết kế mềm dẻo không gây cảm giác khó chịu cho người mang khi thi đấu ở cường độ cao.\r\n\r\nBộ đệm Lightstrike với cấu trúc siêu êm và đàn hồi giúp làm giảm tối đa phản lực từ bề mặt sân cỏ nhân tạo lên phần gót và các khớp cơ người chơi.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh hình tròn lớn nhỏ khác nhau, hỗ trợ khả năng xử lý bóng bằng gầm và tăng cường độ bám sân.\r\n\r\nPhù hợp với thiên hướng kiểm soát bóng, sử dụng kỹ thuật và đánh chặn.', 15, 'COPA-trang.jpg', 0, 1),
(41, 31, 'ADIDAS COPA PURE 2 LEAGUE TF - IE4986 - TRẮNG/ĐEN', 1950000, '', 'ADIDAS COPA PURE 2 LEAGUE TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nSở hữu những bước chạm bóng tinh tế với thế hệ COPA PURE 2 hoàn toàn mới. Được trình làng nhằm chuẩn bị cho mùa giải 2023/24, ADIDAS COPA PURE 2 LEAGUE TF sở hữu những cải tiến hứa hẹn sẽ mang đến trải nghiệm chơi bóng tốt nhất cho người chơi. \r\n\r\nMẫu giày đá bóng COPA PURE 2 thuộc bộ sưu tập “Solar Energy” với phối màu “Ivory/Core Black/Solar Red” bắt mắt sẽ được những ngôi sao hàng đầu adidas mang trên chân như Declan Rice, Bernardo Silva, Alexis Mac Allister, Josko Gvardiol….\r\n\r\nThông số kỹ thuật\r\n\r\nADIDAS COPA PURE 2 LEAGUE TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhần upper làm từ chất liệu nhân tạo mềm mại mang lại cảm giác bóng tốt nhất cho người chơi; đồng thời giúp giảm thời gian break-in giày.\r\n\r\nTrên thế hệ Copa Pure 2 mới nhất lần này, hãng đã bổ sung thêm các đường vân và hạt nhằm tăng ma sát với bóng, từ đó giúp người chơi có thể kiểm soát bóng tốt hơn. \r\n\r\nLưỡi gà rời mỏng và mềm, có thể dễ dàng xỏ chân vào hơn so với các mẫu adidas lưỡi gà liền trước đây, tạo sự thoải mái cho anh em có mu bàn chân cao và dày. Bên dưới lưỡi gà được bổ sung một lớp đệm vải nhung giúp tăng thêm độ êm ái cho bàn chân người mang. \r\n\r\nLớp đệm gót làm từ vải nhung mềm mại và dày dặn, tạo cảm giác ôm chân thoải mái. Khung bọc gót với thiết kế mềm dẻo không gây cảm giác khó chịu cho người mang khi thi đấu ở cường độ cao. \r\n\r\nBộ đệm Lightstrike với cấu trúc siêu êm và đàn hồi giúp làm giảm tối đa phản lực từ bề mặt sân cỏ nhân tạo lên phần gót và các khớp cơ người chơi.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh hình tròn lớn nhỏ khác nhau, hỗ trợ khả năng xử lý bóng bằng gầm và tăng cường độ bám sân.\r\n\r\nPhù hợp với thiên hướng kiểm soát bóng, sử dụng kỹ thuật và đánh chặn.\r\n\r\nBộ sưu tập: Solar Energy Pack (01/2024).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'copa-trang-den.jpg', 0, 1),
(42, 31, 'ADIDAS X CRAZYFAST.3 TF - ID9338 - XANH NAVY', 1850000, '', 'ADIDAS X CRAZYFAST.3 TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nViết nên câu chuyện tốc độ của riêng bạn với mẫu giày đá banh adidas X Crazyfast.3 TF “Crazyrush Pack” hoàn toàn mới! Sở hữu những cải tiến mới nhất cùng một thiết kế tối giản phục vụ cho lối chơi tốc độ, X Crazyfast.3 TF xứng đáng là sự lựa chọn hàng đầu dành cho những tiền vệ và tiền đạo ưu tiên sự linh hoạt và thanh thoát trong cách chơi của mình!\r\n\r\nLần đầu tiên, logo Three Stripes được xuất hiện ở cả phần má trong và ngoài của đôi giày. Sở hữu phối màu White/Core Black/Lucid Lemon đầy tươi mát, mẫu giày đá banh adidas X Crazyfast.3 TF “Crazyrush Pack” sẽ giúp bạn tự tin chinh phục sức nóng từ mùa hè này bằng tốc độ của riêng bạn! \r\n\r\nThông số kỹ thuật:\r\n\r\nADIDAS X CRAZYFAST.3 TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo từ 5-7 người.\r\n\r\nPhân khúc: .3 (tầm trung).\r\n\r\nPhần upper làm từ chất liệu da tổng hợp pha sợi dệt mềm mại, mang lại cảm giác bóng tốt nhất cho người mang. Trên bề mặt upper được phủ một lớp nhựa TPU giúp tăng khả năng kiểm soát khi rê dắt bóng ở tốc độ cao. \r\n\r\nLưỡi gà liền được làm từ sợi dệt với độ co giãn cao, giúp ôm khít phần mu và cổ chân.  \r\n\r\nĐệm gót là một lớp vải nhung dày dặn, mang lại cảm giác ôm chân vừa vặn và êm ái. \r\n\r\nKhung bọc gót TPU giúp hạn chế tình trạng xê dịch gót chân khi di chuyển ở cường độ cao. \r\n\r\nBộ đệm EVA tạo cảm giác êm ái trong từng pha di chuyển, hạn chế phản lực từ mặt sân cứng lên các khớp gối.\r\n\r\nKhuôn đế làm từ chất liệu cao su cao cấp với các đinh mang hình dáng mũi tên giúp tăng độ bám sân, hỗ trợ khả năng xoay trở trong phạm vi hẹp. Đế ngoài được thiết kế với cấu trúc hai mảnh riêng biệt, tạo sự ổn định cho phần mũi và gót chân, giúp người chơi có thể di chuyển linh hoạt hơn và dễ dàng thực hiện các pha bứt tốc.  \r\n\r\nPhù hợp với thiên hướng tốc độ, thích rê dắt, sử dụng kỹ thuật và dứt điểm.\r\n\r\nCác ngôi sao nổi tiếng mang trên chân dòng giày đá bóng X CRAZYFAST: Lionel Messi, Mohamed Salah, Thomas Muller, Karim Benzema, Julian Alvarez, Son Heung Min...\r\n\r\nBộ sưu tập: Marine Rush Pack (09/2023).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n ', 15, 'crazyfast-xanh.jpg', 0, 1),
(43, 31, 'ADIDAS COPA GLORO TF - IE7542 - ĐỎ/ĐEN', 1950000, '', 'ADIDAS COPA PURE 2 LEAGUE TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nSở hữu những bước chạm bóng tinh tế với thế hệ COPA PURE 2 hoàn toàn mới. Được trình làng nhằm chuẩn bị cho mùa giải 2023/24, ADIDAS COPA PURE 2 LEAGUE TF sở hữu những cải tiến hứa hẹn sẽ mang đến trải nghiệm chơi bóng tốt nhất cho người chơi. \r\n\r\nMẫu giày đá bóng COPA PURE 2 thuộc bộ sưu tập “Solar Energy” với phối màu “Ivory/Core Black/Solar Red” bắt mắt sẽ được những ngôi sao hàng đầu adidas mang trên chân như Declan Rice, Bernardo Silva, Alexis Mac Allister, Josko Gvardiol….\r\n\r\nThông số kỹ thuật\r\n\r\nADIDAS COPA PURE 2 LEAGUE TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhần upper làm từ chất liệu nhân tạo mềm mại mang lại cảm giác bóng tốt nhất cho người chơi; đồng thời giúp giảm thời gian break-in giày.\r\n\r\nTrên thế hệ Copa Pure 2 mới nhất lần này, hãng đã bổ sung thêm các đường vân và hạt nhằm tăng ma sát với bóng, từ đó giúp người chơi có thể kiểm soát bóng tốt hơn. \r\n\r\nLưỡi gà rời mỏng và mềm, có thể dễ dàng xỏ chân vào hơn so với các mẫu adidas lưỡi gà liền trước đây, tạo sự thoải mái cho anh em có mu bàn chân cao và dày. Bên dưới lưỡi gà được bổ sung một lớp đệm vải nhung giúp tăng thêm độ êm ái cho bàn chân người mang. \r\n\r\nLớp đệm gót làm từ vải nhung mềm mại và dày dặn, tạo cảm giác ôm chân thoải mái. Khung bọc gót với thiết kế mềm dẻo không gây cảm giác khó chịu cho người mang khi thi đấu ở cường độ cao. \r\n\r\nBộ đệm Lightstrike với cấu trúc siêu êm và đàn hồi giúp làm giảm tối đa phản lực từ bề mặt sân cỏ nhân tạo lên phần gót và các khớp cơ người chơi.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh hình tròn lớn nhỏ khác nhau, hỗ trợ khả năng xử lý bóng bằng gầm và tăng cường độ bám sân.\r\n\r\nPhù hợp với thiên hướng kiểm soát bóng, sử dụng kỹ thuật và đánh chặn.\r\n\r\nBộ sưu tập: Solar Energy Pack (01/2024).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n ', 15, 'COPA-DO.jpg', 0, 1),
(44, 30, 'NIKE TIEMPO LEGEND 10 PRO TF - DV4336-700 - TRẮNG KEM', 2650000, '', 'NIKE TIEMPO LEGEND 10 PRO TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nĐầu tháng 7/2023, Nike chính thức trình làng thế hệ thứ 10 của dòng giày đá banh huyền thoại Tiempo. Lần đầu tiên trong lịch sử, nhà Swoosh đã loại bỏ chất liệu da tự nhiên trên upper của dòng giày này, thay vào đó hãng sử dụng loại chất liệu FlyTouch hoàn toàn mới. Nhờ cải tiến quan trọng này đã biến Legend 10 trở thành thế hệ Tiempo nhẹ nhất từ trước đến nay mà bạn có thể sở hữu!\r\n\r\nThông số kỹ thuật:\r\n\r\nNIKE TIEMPO LEGEND 10 PRO TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo từ 5-7 người. \r\n\r\nPhân khúc: Pro (chuyên nghiệp).\r\n\r\nTiempo Legend 10 Pro TF sở hữu phần upper được làm từ chất liệu da tổng hợp FlyTouch Pro hoàn toàn mới. Mềm hơn, nhẹ hơn và bền hơn so với da tự nhiên, upper da tổng hợp FlyTouch Pro còn giúp mang lại cảm giác ôm chân cho người mang. Đồng thời giúp giữ form giày không bị giãn quá mức sau một thời gian sử dụng. \r\n\r\nTrên bề mặt upper FlyTouch Pro là các đường vân với chiều dài khác nhau, giúp tăng khả năng kiểm soát bóng bất kể khi bạn thi đấu trong điều kiện khô ráo hay ẩm ướt. \r\n\r\nLưỡi gà liền và cổ giày làm từ chất liệu sợi dệt với độ co giãn cao, phù hợp cho những người có mu bàn chân cao và dày. Đặc biệt, phần cổ giày này đã được làm mềm mại hơn đáng kể, tạo sự linh hoạt cho cổ chân người mang khi thực hiện các động tác sút, chuyền, rê bóng….\r\n\r\nĐệm gót được làm từ vải nhung dày dặn, mang lại sự êm ái và vừa vặn cho bàn chân người mang. \r\n\r\nKhung bọc gót được thiết kế với độ cứng vừa phải, không gây cảm giác tức gót chân cho người mang.\r\n\r\nBộ đệm làm từ chất liệu EVA thế hệ mới với cấu trúc siêu mềm và đàn hồi, mang đến cảm giác êm ái trong từng bước chạy của người mang. Đồng thời chúng còn giúp hạn chế phản lực từ bề mặt sân cỏ nhân tạo tác động lên các khớp gối và cổ chân của người mang. \r\n\r\nBộ đế và đinh giày được làm từ chất liệu cao su cao cấp. Các đinh có hình dáng eclipse với nhiều kích thước khác nhau, phủ đều mặt đế. Đặc biệt phần đinh ở đế giữa được phủ với mật độ dày hơn giúp làm tăng độ bám sân. \r\n\r\nVới thiết kế và độ cao tương đối của các đinh giày, người mang có thể di chuyển linh hoạt hơn và dễ dàng xử lý bóng hơn bằng gầm giày.\r\n\r\nPhù hợp với thiên hướng kiểm soát bóng, sử dụng kỹ thuật và đánh chặn.\r\n\r\nCác cầu thủ nổi tiếng mang trên chân dòng giày đá bóng Tiempo Legend 10: Virgil Van Dijk, Thibaut Courtois, Sandro Tonali, Alisson…\r\n\r\nBộ sưu tập: Mad Ready (01/2024).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'tiempo10-kem.webp', 0, 1),
(45, 30, 'NIKE ZOOM MERCURIAL VAPOR 15 PRO TF - DJ5605-700 - TRẮNG KEM', 2650000, '', 'NIKE ZOOM MERCURIAL VAPOR 15 PRO TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nTháng 6/2022, Nike chính thức trình làng thế hệ tiếp theo của dòng giày Mercurial mang tên Air Zoom Mercurial. Cải tiến lớn nhất trên thế hệ này nằm ở bộ đệm Zoom Air được thiết kế độc quyền cho bóng đá. Bên cạnh đó, mọi chi tiết trên đôi giày lần này đều được thiết kế nhằm tối ưu hoá lối chơi tốc độ. \r\n\r\nThông số kỹ thuật:\r\n\r\nMẫu giày đá bóng ZOOM MERCURIAL VAPOR 15 PRO TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người.\r\n\r\nPhân khúc: Pro (Chuyên nghiệp).\r\n\r\nUpper làm từ da tổng hợp cao cấp và sợi dệt. Trên bề mặt upper là các vân Hyperscreen 3D được thiết kế để mang lại cảm giác thật chân khi chạm và rê bóng ở tốc độ cao. \r\n\r\nỞ thế hệ 15 này, hãng đã phủ thêm lớp NikeSkin trên bề mặt upper làm tăng độ bám bóng, từ đó có thể kiểm soát bóng và rê bóng tốt hơn. Cấu trúc Speed Cage bên dưới bề mặt upper được làm từ chất liệu mỏng nhưng cực kỳ chắc chắn sẽ mang đến sự ôm chân vừa khít, đồng thời hạn chế sự xê dịch chân trong giày khi thi đấu ở cường độ cao.\r\n\r\nPhần lưỡi gà liền và cổ giày với chất liệu vải dệt có độ co giãn cao, hạn chế tình trạng tức vùng mu bàn chân đối với những anh em có mu bàn chân dày. \r\n\r\nLớp lót gót giày được làm từ vải nhung, mang lại cảm giác ôm chân thoải mái.\r\n\r\nBộ đệm vẫn giữ nguyên công nghệ Zoom Air như ở đời 14. Bộ đệm này không chỉ làm giảm phản lực từ bề mặt sân cứng lên các khớp gối, mà còn mang lại cảm giác êm ái và đàn hồi cho đôi chân. Đây là bộ đệm Zoom Air đầu tiên được thiết kế dành riêng cho bóng đá.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh dạng Elip lớn nhỏ khác nhau, hỗ trợ khả năng xử lý bóng bằng gầm và tăng cường độ bám sân.\r\n\r\nPhù hợp với thiên hướng sử dụng kỹ thuật, tốc độ và dứt điểm. \r\n\r\nCác cầu thủ nổi tiếng đang mang trên chân dòng giày đá bóng Mercurial: Cristiano Ronaldo, Kylian Mbappe, Robert Lewandowski, Bruno Fernandes, Joshua Kimmich, Vinicius Jr…\r\n\r\nBộ sưu tập: Mad Ready Pack (01/2024).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'vapor-15pro-kem.webp', 15, 1),
(46, 35, 'KAMITO CỎ NHÂN TẠO TA11 AS - KMA220824 - XANH NGỌC', 790000, '', 'KAMITO CỎ NHÂN TẠO TA11 AS - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nKhông ngừng đổi mới và mong muốn nâng tầm trải nghiệm của người dùng, TA11 được áp dụng những công nghệ tốt nhất của KAMITO: \r\n\r\nLớp da KA-FIBER ULTRA siêu mềm, tạo cảm giác như đi chân trần và với lớp da mới này, độ bền cũng đã được nâng cấp lên một tầm cao mới.\r\n\r\nThiết kế đặc biệt với những vân kim cương nổi trên thân giày, vừa tạo tính thẩm mỹ vừa hỗ trợ kiểm soát bóng tối ưu. \r\n\r\nBộ đế giày áp dụng công nghệ KA-SPIN với dàn đinh dăm được sắp xếp khoa học, giúp bám sân hiệu quả ngay cả khi trời mưa sân trơn bóng ướt.\r\n\r\nĐặc biệt, lớp đệm giảm chấn cực êm ái KA-COMFORT lần đầu tiên xuất hiện ở một đôi giày phân khúc tầm trung sẽ mang lại một trải nghiệm tuyệt vời giúp các cầu thủ luôn cảm thấy thoải mái và êm ái trong suốt quá trình thi đấu. Bên cạnh đó, lớp đệm êm này cũng sẽ giảm áp lực lên đầu gối và cột sống qua đó giảm thiểu những chấn thương không đáng có. \r\n\r\nForm giày áp dụng chuẩn KA-FIT, ôm sát và phù hợp với bàn chân người Việt.', 15, 'ta11-xanh.jpg', 0, 1),
(47, 31, 'ADIDAS DÉP QUAI NGANG ADILETTE AQUA - F35542 - XANH ĐEN', 350000, '', 'ADIDAS DÉP QUAI NGANG ADILETTE AQUA\r\n\r\nHãy đi mẫu dép có thể đi trong lúc tắm này để làm sạch sau khi tập bơi. Với kiểu dáng đơn giản, mẫu dép kiểu slip-on mềm mại này thể hiện chất gen của adidas với 3 Sọc Kẻ đặc trưng. Lớp đệm mềm thư giãn đôi chân mệt mỏi bằng sự thoải mái sang trọng.\r\n\r\nThông số kỹ thuật:\r\n\r\nÔm vừa. Thiết kế kiểu slip-on. Thân dép đúc từ chất liệu EVA nguyên miếng. Đế ngoài chất liệu EVA. Đế trong công nghệ Cloudfoam mềm mại. Cảm giác nhẹ nhàng. Chất liệu nhanh khô.  ', 15, 'dep-adidas-quaixanh.jpg', 0, 3),
(49, 31, 'TÚI ĐỰNG GIÀY ESSENTIALS ADIDAS - HT4753 - ĐEN/TRẮNG', 220000, '', 'TÚI ĐA NĂNG CỠ VỪA\r\n\r\nCHIẾC TÚI TIỆN DỤNG CÓ QUAI ĐEO VAI TÙY CHỈNH.\r\n\r\nChỉ cần ngăn nắp là đủ để bạn dẫn trước rồi. Chiếc túi adidas này giúp bạn luôn gọn gàng nhờ thiết kế đơn giản mà hữu dụng. Bên trong ngăn chính có một vách ngăn để bạn dễ dàng tìm thấy các món đồ must-have. Ngăn khóa kéo phía trước giúp bạn tiện lấy các vật dụng nhỏ. Sản phẩm này có sử dụng chất liệu tái chế, là một phần quyết tâm của chúng tôi hướng tới chấm dứt rác thải nhựa.\r\n\r\nTHÔNG SỐ\r\n\r\nKích thước: 21 cm x 14 cm x 4 cm.\r\nDung tích: 2 L.\r\nVải dệt trơn làm từ 100% polyester.\r\nNgăn khóa kéo phía trước.\r\nVách chia đồ trong ngăn chính.\r\nQuai đeo vai tùy chỉnh.\r\nMàu sản phẩm: Bold Blue / Black.', 15, 'adidas-tui-den.jpg', 0, 3),
(50, 37, 'TRÁI BÓNG ĐỘNG LỰC FIFA QUALITY PRO UHV 2.07 COBRA - TÍM', 2400000, '', 'Để tạo cảm hứng mới cho các chân sút ở mùa giải 2021, Động Lực đã ra mẫu bóng mới UHV 2.07 Cobra đạt tiêu chuẩn thi đấu cao nhất của FIFA - FIFA Quality PRO.\r\nUHV 2.07 Cobra chính là mẫu bóng được sử dụng làm bóng thi đấu chính thức cho V-league và Cúp Quốc Gia 2021 – 2022.\r\n\r\nBóng UHV 2.07 Cobra được lấy cảm hứng từ tên một loại rắn hổ mang dũng mãnh và thông minh. Họa tiết trên trái bóng là sự cách điệu hình ảnh rắn hổ mang, tinh ranh, quyết đoán và khôn khéo với 2 họa tiết to, khỏe nằm đối xứng với nhau và ôm lấy quả bóng. Trái bóng được phối mầu hiện đại, bắt mắt sẽ rất nổi bật trên thảm cỏ và trên không trung, tạo nên một vũ điệu rất mạnh mẽ.\r\n\r\nUHV 2.07 Cobra được bổ sung thêm một lớp đàn hồi bên trong nên bóng mềm hơn, không thấm nước và độ nảy tốt hơn, để tốc độ bóng bay nhanh hơn, gây khó khăn cho thủ môn, tạo ra nhiều bàn thắng hơn, nhằm tăng sự hấp dẫn của các trận đấu. Quả bóng được giữ hơi lâu hơn, bởi được ưu tiên sử dụng chất liệc vecxi đặc biệt.', 15, 'phu-kien-trai-bong-dong-luc-fifa-quality-pro-uhv-2-07-cobra-tim-1_707cf9f9048c463f8f5f59700fa8c8cf_master.jpg', 0, 3),
(51, 37, 'BÓNG ĐÁ ĐỘNG LỰC FIFA QUALITY PRO UHV 2.07 SPECTRO', 1735000, '', 'BÓNG ĐÁ ĐỘNG LỰC FIFA QUALITY PRO UHV 2.07 SPECTRO\r\n\r\n- UHV 2.07 SPECTRO là mẫu bóng mới nhất của Động Lực 5/2018 đạt tiêu chuẩn thi đấu cao nhất của FIFA - FIFA Quality PRO.\r\n\r\n- SPECTRO UHV 2.07 cũng chính là mẫu bóng được sử dụng làm bóng thi đấu chính thức cho V-league và Cúp Quốc Gia 2020\r\n\r\n- Bóng UHV 2.07 SPECTRO có hình thức khá đẹp mắt với những mảng màu nổi bật đan chéo phối nhau 1 cách tinh tế, hiện đại. Bóng được bổ sung thêm một lớp đàn hồi bên trong nên bóng mềm hơn, cấu tạo nhiều lớp tạo độ nảy và đường bay khá chuẩn. Ruột bóng được làm bằng cao su cao cấp khiến bóng giữ hơi tốt. Ngoài ra, lớp da PU cao cấp không thấm nước bao quanh bóng giúp cho SPECTRO 2.07 giữ vững độ bền với điều kiện thi đấu mưa và ẩm thấp.\r\n\r\n ', 15, 'bong-da-dong-luc-fifa-quality-pro-uhv-2-07-spectro-1_3bb7d6c78b51437ab00e57dce22358f8_master.jpg', 0, 3),
(52, 37, 'BÓNG ĐỘNG LỰC FUTSAL VENTURA - VÀNG/ĐEN', 295000, '', 'Bóng đá trong nhà FUTSAL VENTURA được làm từ da PVC cao cấp theo tiêu chuẩn của FIFA Quality, có độ đàn hồi tốt. Bóng được khâu tay, đáp ứng hoàn toàn các tiêu chuẩn tập luyện.\r\n\r\nFutsal là một loại hình bóng đá thi đấu bên trong nhà thi đấu, có thể được xem như là một dạng của bóng đá sân nhỏ. Bóng đá trong nhà được thi đấu giữa hai đội, đội hình chính thức ra sân mỗi bên gồm 5 cầu thủ và một số cầu thủ dự bị. Canh giữ cầu môn mỗi bên vẫn là vị trí thủ môn như thông thường. Bóng thi đấu nặng và nhỏ hơn quả bóng đá thông thường.\r\n\r\nLần này, Động lực giới thiệu sản phẩm Bóng đá trong nhà Futsal Ventura đạt tiêu chuẩn tập luyện.\r\n\r\nBóng có các đặc điểm sau:\r\n\r\n- Chất liệu PVC có độ đàn hồi tốt, độ bền cao.\r\n\r\n- Độ nảy thấp, khá êm.\r\n\r\n- Sản phẩm được khâu tay tỉ mỉ.\r\n\r\n- Dễ chùi rửa, khó bám bẩn.\r\n\r\n- Bóng giữ hơi cực tốt.\r\n\r\n- Sử dụng được cả sân trong nhà và sân cỏ nhân tạo.\r\n\r\n- Bóng được thiết kế và chế tạo phù hợp với môn bóng đá trong nhà.\r\n\r\nBẢO HÀNH:\r\n\r\n- Bảo hành 1 năm (đổi bóng mới) đối với quả bóng chưa lăn ra sân bị lỗi kỹ thuật như: xì vòi, bung chỉ... \r\n\r\n- Bảo hành sửa chữa 6 tháng: đối với bóng đã lăn sân nhưng bị xì vòi, bung chỉ... \r\n\r\n- Đối với các sản phẩm bóng bị méo, xịt được đổi tại các đại lý trên toàn quốc với điều kiện còn nguyên tem chống hàng giả của công ty Động Lực.\r\n\r\nTrường hợp không được bảo hành: bóng để lâu bị vàng da, hay bị các vật bên ngoài tác động vào làm hư hỏng...', 15, 'bong-dong-luc-futsal-ventura-vang-den-3_7cf88755849e41a2993c31220c06917c_master.jpg', 0, 3),
(53, 33, 'LÓT GIÀY MIZUNO - P1GZ180245 - VÀNG', 80000, '', 'LÓT GIÀY MIZUNO\r\n\r\nMiếng Lót Giày Mizuno sử dụng thay thế cho các giày bóng đá Mizuno hoặc các dòng giày khác.\r\n\r\nThích hợp với tất cả các loại giày thể thao và đặc biệt phù hợp với mọi dòng sản phẩm Mizuno.\r\n\r\nChất liệu: Cao su cao cấp giúp miếng lót giày có thể ôm vừa vặn lòng trong đôi giày và rất dễ tạo hình sao cho độ dài và rộng ôm khít. \r\n\r\nMiếng Lót Giày Mizuno được sản xuất dựa trên dây truyền công nghệ thể thao tiên tiến từ Nhật Bản, êm, mềm và độ đàn hồi cao.\r\n\r\nVới chất liệu đặc biệt của miếng lót giày giúp giảm mùi hôi chân, chống phồng rộp chân do ma sát.\r\n\r\nMiếng Lót Giày Mizuno thiết kế các rãnh chìm giúp bàn chân được kích thích đem lại sự thoải mái nhất đồng thời ngăn ngừa lật cổ chân, hỗ trợ sự thăng bằng cho cơ thể.', 150, 'phu-kien-lot-giay-mizuno-p1gz180245-vang-4_e683214905f14a16a5e416f0da85d47e_master.jpg', 0, 3),
(54, 37, 'TRÁI BÓNG FUTSAL GERUSTAR 2030 - VÀNG/XANH LÁ', 290000, '', 'QUẢ BÓNG ĐÁ GERUSTAR FUTSAL DÁN 2030\r\n\r\nCông ty Cổ phần Thể thao Ngôi sao Geru là đơn vị trực thuộc Tập đoàn Công nghiệp Cao su Việt Nam (VGR), chuyên sản xuất các loại bóng thể thao. Công ty được hoạt động theo giấy chứng nhận đăng ký kinh doanh số: 410304761 ngày 17/5/2006 do sở Kế hoạch và Đầu tư TP HCM cấp. Bóng đá Geru Star được Liên đoàn Bóng đá Việt Nam chứng nhận là bóng thi đấu chính thức tại các giải chuyên nghiệp Việt Nam. Gerustar Futsal 2030 còn được sử dụng tại giải FI League\r\n\r\nThông số kỹ thuật:\r\n\r\nBóng được thiết kế dùng để thi đấu cho sân trong nhà và sân cỏ mini nhân tạo 5 người.\r\n\r\nSize bóng: bóng số 4.\r\n\r\nĐược làm từ chất liệu PU Hàn Quốc dán với nhau, tạo nên độ nảy thấp, êm và chắc chắn cho quả bóng.\r\n\r\nTrọng lượng: 400 - 440g.\r\n\r\nChu vi bóng: 610 - 630mm.\r\n\r\nĐộ tròn: <3.8mm.\r\n\r\nĐộ nảy: 50 - 60cm.\r\n\r\nĐộ thấm nước: <15%.\r\n\r\nBẢO HÀNH SỬA CHỮA\r\n\r\nBảo hành 1 năm: đối với bóng lỗi do nhà sản xuất như méo, bong tróc, xì, phù và bóng nhìn ngoại quan còn mới chưa bay màu mực.\r\nTrường hợp không bảo hành: bóng bị các vật bên ngoài tác động vào làm hư hỏng…\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - ThanhHung Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780 - 028 38429720\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'trai-bong-futsal-gerustar-2030-vang-xanh-la-2_64aa8661dc044d8fa0352f35c264ea9e_master.jpg', 0, 3),
(55, 38, ' ÁO BÓNG ĐÁ GRAND SPORT WARRIOR12 - ĐỎ', 490, '', 'Mô tả sản phẩm Áo Tshirt Warrior12 Trắng\r\n\r\n• 100% Cotton \r\n\r\n• Chất liệu logo Sao Vàng: Thêu\r\n\r\n• Siêu nhẹ, thoáng khí\r\n\r\n• Thiết kế đặc biệt\r\n\r\n• Kiểu dáng thời trang\r\n\r\nGiới thiệu sản phẩm Áo Tshirt Warrior12 Trắng\r\n\r\nGRAND SPORT - thương hiệu trang phục và thiết bị thể thao “Made in Thailand” - được thành lập năm 1961. Với hơn 50 năm kinh nghiệm, GRAND SPORT được biết đến trong khu vực Châu Á, đặc biệt là khu vực Đông Nam Á bởi các sản phẩm mẫu mã đẹp, chất lượng cao và giá thành hợp lý.\r\n\r\nTại Việt Nam, GRAND SPORT là đơn vị tài trợ trang phục chính thức của các Đội Tuyển Bóng Đá Quốc gia và là lựa chọn hàng đầu của hàng trăm đội bóng đá chuyên nghiệp, phong trào và bóng chuyền trên khắp Việt Nam.\r\n\r\n \r\n\r\nĐẶC ĐIỂM NỔI BẬT Áo Tshirt Warrior12 Trắng\r\n\r\n• Công nghệ dệt độc quyền 100% Cotton\r\n\r\n• Chất liệu Ngôi Sao Vàng: thêu\r\n\r\n• Tag Size \"THIS SHIRT IS YOURS\"\r\n\r\n• Nhãn dệt WARRIOR 12\r\n\r\nGrand Sport áp dụng công nghệ độc quyền tiên tiến nhất - siêu nhẹ, thoáng khí mang lại sự thoải mái và linh hoạt khi vận động.\r\n\r\nThiết kế đặc biệt và kiểu dáng thời trang\r\n\r\nNổi bật nét cá tính riêng của khách hàng.\r\n\r\n \r\n\r\n \r\n\r\nBẢNG SIZE THAM KHẢO:\r\n\r\n\r\nHƯỚNG DẪN BẢO QUẢN\r\n\r\n- Nhiệt độ giặt cho phép: dưới 40oC\r\n\r\n- Tránh tiếp xúc với các chất khó tẩy rửa.\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'screen_shot_2021-12-16_at_19.jpg', 0, 3),
(56, 38, 'ÁO BÓNG ĐÁ GRAND SPORT WARRIOR12 - TRẮNG', 490000, '', 'Mô tả sản phẩm Áo Tshirt Warrior12 Trắng\r\n\r\n• 100% Cotton \r\n\r\n• Chất liệu logo Sao Vàng: Thêu\r\n\r\n• Siêu nhẹ, thoáng khí\r\n\r\n• Thiết kế đặc biệt\r\n\r\n• Kiểu dáng thời trang\r\n\r\nGiới thiệu sản phẩm Áo Tshirt Warrior12 Trắng\r\n\r\nGRAND SPORT - thương hiệu trang phục và thiết bị thể thao “Made in Thailand” - được thành lập năm 1961. Với hơn 50 năm kinh nghiệm, GRAND SPORT được biết đến trong khu vực Châu Á, đặc biệt là khu vực Đông Nam Á bởi các sản phẩm mẫu mã đẹp, chất lượng cao và giá thành hợp lý.\r\n\r\nTại Việt Nam, GRAND SPORT là đơn vị tài trợ trang phục chính thức của các Đội Tuyển Bóng Đá Quốc gia và là lựa chọn hàng đầu của hàng trăm đội bóng đá chuyên nghiệp, phong trào và bóng chuyền trên khắp Việt Nam.\r\n\r\n \r\n\r\nĐẶC ĐIỂM NỔI BẬT Áo Tshirt Warrior12 Trắng\r\n\r\n• Công nghệ dệt độc quyền 100% Cotton\r\n\r\n• Chất liệu Ngôi Sao Vàng: thêu\r\n\r\n• Tag Size \"THIS SHIRT IS YOURS\"\r\n\r\n• Nhãn dệt WARRIOR 12\r\n\r\nGrand Sport áp dụng công nghệ độc quyền tiên tiến nhất - siêu nhẹ, thoáng khí mang lại sự thoải mái và linh hoạt khi vận động.\r\n\r\nThiết kế đặc biệt và kiểu dáng thời trang\r\n\r\nNổi bật nét cá tính riêng của khách hàng.\r\n\r\n \r\n\r\n \r\n\r\nBẢNG SIZE THAM KHẢO:\r\n\r\n\r\nHƯỚNG DẪN BẢO QUẢN\r\n\r\n- Nhiệt độ giặt cho phép: dưới 40oC\r\n\r\n- Tránh tiếp xúc với các chất khó tẩy rửa.\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'screen_shot_2021-12-16_at_18.jpg', 0, 3),
(57, 30, 'COMBO 3 TẤT CHỐNG TRƯỢT ', 90000, '', 'Vớ đá bóng chống trượt THF Anti-Slip thế hệ mới với các đặc tính như:\r\n\r\n- Công nghệ thoát ẩm từ các sợi iWick giúp cho đôi chân khô thoáng và khử mùi, kháng khuẩn tối đa.\r\n\r\n- Tất được dệt bằng nguyên liệu cotton 100% nên rất bám giày, không trơn.\r\n\r\nVớ sẽ có 2 phiên bản màu:\r\n\r\n- Trắng vân đen.\r\n\r\n- Đen vân trắng. ', 200, 'g-truot-thanh-hung-futsal-1_8372d65644964415a76eafa826dd1d04_large__1__411b7ebc5da1477e824d47fcf27c803c_master.jpg', 0, 3),
(58, 30, ' NIKE ZOOM MERCURIAL VAPOR 15 ACADEMY MDS TF - FJ7191-300 - XANH LÁ', 1890000, '', 'NIKE MERCURIAL VAPOR 15 ACADEMY MDS TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nTháng 6/2022, Nike chính thức trình làng thế hệ tiếp theo của dòng giày Mercurial mang tên Air Zoom Mercurial. Cải tiến lớn nhất trên thế hệ này nằm ở bộ đệm Zoom Air được thiết kế độc quyền cho bóng đá. Bên cạnh đó, mọi chi tiết trên đôi giày lần này đều được thiết kế nhằm tối ưu hoá lối chơi tốc độ. \r\n\r\nThông số kỹ thuật\r\nMẫu giày đá bóng MERCURIAL ZOOM VAPOR 15 ACADEMY MDS TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người.\r\n\r\nPhân khúc: Academy (Tầm trung).\r\n\r\nUpper làm từ da tổng hợp mềm mại giúp tăng cảm giác bóng. Ở thế hệ 15 này, hãng đã phủ thêm lớp NikeSkin trên bề mặt upper làm tăng độ bám bóng, từ đó có thể kiểm soát bóng và rê bóng tốt hơn. \r\n\r\nCấu trúc Speed Cage bên dưới bề mặt upper được làm từ chất liệu mỏng nhưng cực kỳ chắc chắn sẽ mang đến sự ôm chân vừa khít, đồng thời hạn chế sự xê dịch chân trong giày khi thi đấu ở cường độ cao.\r\n\r\nLưỡi gà được thiết kế cố định ở phần nửa trên sẽ không gây ra tình trạng lệch lưỡi gà.  \r\n\r\nGót giày được làm từ vải nhung, mang lại cảm giác ôm chân thoải mái.\r\n\r\nCải tiến lớn nhất trên thế hệ này chính là sự xuất hiện của bộ đệm Zoom Air ở phần gót giày. Bộ đệm này không chỉ làm giảm phản lực từ bề mặt sân cứng lên các khớp gối, mà còn mang lại cảm giác êm ái và đàn hồi cho đôi chân. \r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh dạng Elip lớn nhỏ khác nhau, hỗ trợ khả năng xử lý bóng bằng gầm và tăng cường độ bám sân.\r\n\r\nPhù hợp với thiên hướng sử dụng kỹ thuật, tốc độ và dứt điểm. \r\n\r\nCác cầu thủ nổi tiếng đang mang trên chân dòng giày đá bóng Mercurial: Cristiano Ronaldo, Kylian Mbappe, Robert Lewandowski, Bruno Fernandes, Joshua Kimmich, Vinicius Jr…\r\n\r\nBộ sưu tập: Mercurial Dream Speed 008 (02/2024).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'vapor-xanh-chuoi.jpg', 0, 1),
(60, 31, 'ADIDAS TÚI ĐA NĂNG CỠ VỪA - H15578 - XANH DƯƠNG', 450000, '', 'TÚI ĐA NĂNG CỠ VỪA\r\n\r\nCHIẾC TÚI TIỆN DỤNG CÓ QUAI ĐEO VAI TÙY CHỈNH.\r\n\r\nChỉ cần ngăn nắp là đủ để bạn dẫn trước rồi. Chiếc túi adidas này giúp bạn luôn gọn gàng nhờ thiết kế đơn giản mà hữu dụng. Bên trong ngăn chính có một vách ngăn để bạn dễ dàng tìm thấy các món đồ must-have. Ngăn khóa kéo phía trước giúp bạn tiện lấy các vật dụng nhỏ. Sản phẩm này có sử dụng chất liệu tái chế, là một phần quyết tâm của chúng tôi hướng tới chấm dứt rác thải nhựa.\r\n\r\nTHÔNG SỐ\r\n\r\nKích thước: 21 cm x 14 cm x 4 cm.\r\nDung tích: 2 L.\r\nVải dệt trơn làm từ 100% polyester.\r\nNgăn khóa kéo phía trước.\r\nVách chia đồ trong ngăn chính.\r\nQuai đeo vai tùy chỉnh.\r\nMàu sản phẩm: Bold Blue / Black.\r\n', 15, 'adidas-tuixanh.jpg', 0, 3),
(61, 33, 'MIZUNO ALPHA SELECT AS - P1GD236609 - TRẮNG/ĐỎ/XANH', 1700000, '', 'MIZUNO ALPHA SELECT AS - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nMizuno Alpha Select AS là dòng giày bóng đá sân cỏ nhân tạo mới ra mắt của Mizuno cuối năm 2022 với trọng lượng nhẹ, chỉ 245g cùng thiết kế mới độc đáo dành cho các cầu thủ ưa thích lối chơi tốc độ. Đây là mẫu giày được tối ưu phần bề mặt nên dù không được làm từ da thật, Mizuno Alpha Select AS vẫn có độ mềm mại và cảm giác chân rất tốt. Phần thân giày được thiết kế với logo Mizuno chạy dài cùng những đường gợn sóng ở phần gót giày mang tới sự tinh tế, ấn tượng cho tổng thể thiết kế. Đặc biệt, hơn 50% upper giày được làm từ vật liệu tái chế, góp phần bảo vệ môi trường.\r\n\r\nĐặc điểm nổi bật của Mizuno Alpha Select AS\r\n\r\nChất liệu da tổng hợp thế hệ mới mềm mại, cho cảm giác chân tốt. \r\n\r\nPhom giày đặc biệt phù hợp với bàn chân người Việt, những cầu thủ chân bè hoàn toàn có thể sử dụng mà không gặp chút khó khăn nào. \r\n\r\nTrọng lượng khá nhẹ, chỉ 245g (size 42). \r\n\r\nLót giày áp dụng công nghệ Zeroglide có độ bám cao, giảm thiểu tình trạng trơn trượt và có thể tháo rời. \r\n\r\nHệ thống đinh dăm được sắp xếp khoa học, bền bỉ, bám sân rất tốt ngay cả khi điều kiện thời tiết không thật sự thuận lợi. \r\n\r\nVới thiết kế mới và những thay đổi đáng giá, Mizuno Alpha Select AS là mẫu giày toàn diện với tốc độ cùng độ ổn định cao, mang tới hiệu suất thi đấu ấn tượng. Những cầu thủ có lối chơi thiên về tốc độ và mong muốn một đôi giày ổn định, nhẹ, cảm giác bóng tốt không thể bỏ qua Mizuno Alpha Select AS.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n ', 15, 'aphla-trang.jpg', 0, 1),
(62, 33, 'MIZUNO ALPHA SELECT AS - P1GD236609 - ĐỎ', 1700000, '', 'MIZUNO ALPHA SELECT AS - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nMizuno Alpha Select AS là dòng giày bóng đá sân cỏ nhân tạo mới ra mắt của Mizuno cuối năm 2022 với trọng lượng nhẹ, chỉ 245g cùng thiết kế mới độc đáo dành cho các cầu thủ ưa thích lối chơi tốc độ. Đây là mẫu giày được tối ưu phần bề mặt nên dù không được làm từ da thật, Mizuno Alpha Select AS vẫn có độ mềm mại và cảm giác chân rất tốt. Phần thân giày được thiết kế với logo Mizuno chạy dài cùng những đường gợn sóng ở phần gót giày mang tới sự tinh tế, ấn tượng cho tổng thể thiết kế. Đặc biệt, hơn 50% upper giày được làm từ vật liệu tái chế, góp phần bảo vệ môi trường.\r\n\r\nĐặc điểm nổi bật của Mizuno Alpha Select AS\r\n\r\nChất liệu da tổng hợp thế hệ mới mềm mại, cho cảm giác chân tốt. \r\n\r\nPhom giày đặc biệt phù hợp với bàn chân người Việt, những cầu thủ chân bè hoàn toàn có thể sử dụng mà không gặp chút khó khăn nào. \r\n\r\nTrọng lượng khá nhẹ, chỉ 245g (size 42). \r\n\r\nLót giày áp dụng công nghệ Zeroglide có độ bám cao, giảm thiểu tình trạng trơn trượt và có thể tháo rời. \r\n\r\nHệ thống đinh dăm được sắp xếp khoa học, bền bỉ, bám sân rất tốt ngay cả khi điều kiện thời tiết không thật sự thuận lợi. \r\n\r\nVới thiết kế mới và những thay đổi đáng giá, Mizuno Alpha Select AS là mẫu giày toàn diện với tốc độ cùng độ ổn định cao, mang tới hiệu suất thi đấu ấn tượng. Những cầu thủ có lối chơi thiên về tốc độ và mong muốn một đôi giày ổn định, nhẹ, cảm giác bóng tốt không thể bỏ qua Mizuno Alpha Select AS.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'Aphla-do.jpg', 0, 1),
(63, 33, 'MIZUNO MONARCIDA NEO II SELECT AS TF - P1GD232525 - XANH NGỌC', 1459000, '', 'MIZUNO MONARCIDA NEO II SELECT TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nLà thế hệ thứ 2 của dòng sản phẩm Mizuno Monarcida Neo với cải tiến lớn nhất đến từ chất liệu da của upper. Ở phiên bản này chất liệu da được nâng cấp mềm hơn. Nhờ đó mà trọng lượng giày cũng được gia giảm. Bề mặt giày là các đường chỉ được khâu cẩn thận, chắc chắn, tỉ mỉ và đan chéo nhau giúp kiểm soát bóng chính xác và vượt trội hơn, đem lại độ bền cao.\r\n\r\nLưỡi gà được thiết kế mềm mỏng, êm ái cùng dây giầy mềm mại, cao cấp dễ xỏ, dễ di chuyển và mang lại cảm giác cực kì thật chân cho những pha úp bóng bằng mu bàn chân của bạn.\r\n\r\nGót giày có thiết kế nhỏ nhắn, hơi vuốt cao ôm lấy đôi chân bạn, cho bạn thi đấu thoải mái mà không lo giày bị tuột và đem lại cho bạn những bước đi uyển chuyển nhất.\r\n\r\nPhần lót giày là xốp làm tăng độ êm ái cho bạn khi mang giày. Đế giày làm bằng cao su mềm, dẻo và sử dụng đinh TF chuyên dụng cho sân cỏ nhân tạo.\r\n\r\nGiày phù hợp với nhiều Form chân khác nhau.', 15, 'neo2.jpg', 0, 1);
INSERT INTO `sanpham` (`id_sp`, `id_dm`, `name_sp`, `price_sp`, `thongso`, `desc_sp`, `soluong`, `image_sp`, `luotban`, `matsan`) VALUES
(64, 33, 'MIZUNO MORELIA TF - Q1GB190209 - TRẮNG/ ĐEN', 2650000, '', 'MIZUNO MORELIA TF là dòng giày đã được ra mắt từ năm 1985 với thiết kế truyền thống mang tính chuẩn mực cho một đôi giày bóng đá. Trải qua gần 40 năm, những mẫu Morelia mới nhất vẫn giữ những nét truyền thống đó pha lẫn với những chi tiết hiện đại tạo nên một đôi giày tinh tế phù hợp với nhiều cầu thủ.\r\n\r\nĐặc tính nổi bật: \r\n\r\nĐối với sân chơi phong trào tại Việt Nam thì mặt cỏ nhân tạo là phổ biến nhất và Mizuno cũng rất kịp thời khi cho ra mắt nhiều dòng giày Morelia để phục vụ đông đảo các cầu thủ. Một trong những phiên bản được đông đảo cầu thủ tin dùng nhất đó chính là Morelia TF bởi sự toàn diện, ổn định cùng nhiều ưu điểm nổi bật:\r\n\r\nChất liệu da Kangaroo siêu mềm đã được Mizuno sử dụng hiệu quả ở phần Upper giày, hỗ trợ tối đa cho các cầu thủ khi nhận bóng, đi bóng, những pha sút mu uy lực và tạo cảm giác như đi chân trần.\r\n\r\nPhom giày đặc biệt phù hợp với bàn chân người Việt, những cầu thủ chân bè hoàn toàn có thể sử dụng mà không gặp chút khó khăn nào.\r\n\r\nLà mẫu giày thuộc phân khúc cao cấp, Morelia TF được trang bị lớp đệm giảm chấn, tạo sự êm ái thoải mái cho các cầu thủ trong suốt trận đấu.\r\n\r\nLót giày êm ái, chống trượt hiệu quả và có thể tháo rời.\r\n\r\nHệ thống đinh dăm trên Morelia TF là dạng chữ L quen thuộc với ưu điểm giúp các cầu thủ có thể đổi hướng linh hoạt và rất bám sân ngay cả khi thời tiết không thuận lợi.\r\n\r\nVới những ưu điểm vô cùng nổi bật và chất liệu da Kangaroo cao cấp cùng thiết kế sang trọng, Morelia TF chắc chắn sẽ mang tới những trải nghiệm ấn tượng cho các cầu thủ. Nếu bạn đang tìm kiếm một mẫu giày ổn định nhưng vẫn linh hoạt và đặc biệt hỗ trợ tốc độ di chuyển tốt cho các cầu thủ thì Morelia TF là sự lựa chọn hoàn hảo. Hãy trải nghiệm và cảm nhận.\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - ThanhHung Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780 - 028 38429720\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n ', 15, 'morelia-dentrang.jpg', 0, 1),
(65, 31, 'ADIDAS PREDATOR ACCURACY.1 TF - GW4633 - HỒNG/ĐEN', 2400000, '', 'ADIDAS PREDATOR ACCURACY.1 TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nKiểm soát + chính xác = tự tin. Đó chính là công thức để tạo nên mẫu giày đá banh ADIDAS PREDATOR ACCURACY.1 TF hoàn toàn mới lần này! Sở hữu những công nghệ tiên tiến nhất hiện nay của nhà Ba Sọc, mẫu giày PREDATOR ACCURACY.1 TF sẽ giúp bạn tự tin làm chủ cuộc chơi, kiểm soát trận đấu!\r\n\r\nThông số kỹ thuật\r\n\r\nADIDAS PREDATOR ACCURACY.1 TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhân khúc: .1 (chuyên nghiệp)\r\n\r\nPhần upper làm từ chất liệu da tổng hợp HybridTouch mềm mại. Bằng cách sử dụng loại chất liệu này, adidas đã làm giảm đáng kể trọng lượng của Predator Accuracy.1 TF so với người tiền nhiệm. \r\n\r\nCác vân cao su High Definition Grip được phủ ở khu vực má trong làm tăng độ ma sát với bóng, từ đó giúp người chơi có thể dễ dàng thực hiện các đường chuyền hay cú sút với độ chính xác cao. \r\n\r\nPhần cổ giày với cấu trúc Face Fit - đây là loại cổ giày hai mảnh làm từ chất liệu Primeknit, được thiết kế nhằm tạo ra sự thoải mái, dễ dàng xỏ chân nhưng vẫn giữ được độ ôm chân tối đa khi mang.\r\n\r\nỞ phiên bản đế Turf cao cấp nhất lần này, adidas đã trang bị thêm hệ thống dây xỏ giúp người chơi có thể dễ dàng điều chỉnh được độ ôm của giày. Hệ thống dây giày được làm lệch sang một bên giúp mở rộng vùng diện tích sút bóng.\r\n\r\nLớp đệm gót được làm từ chất liệu vải nhung dày và mịn, tạo cảm giác ôm chân vừa vặn nhưng không kém phần thoải mái. \r\n\r\nBộ đệm Bounce tiếp tục được giữ nguyên trên thế hệ Predator Accuracy này Bounce là chất liệu mang đến sự hỗ trợ cao hơn chất liệu đệm EVA truyền thống về cả độ thoải mái, độ êm và độ đàn hồi. Khả năng đàn hồi của Bounce được đánh giá ở mức khá nhưng lại có độ bám trượt vượt trội, cùng với độ ổn định được xem xét ở mức cao hơn so với bộ đệm Boost.\r\n\r\nĐế ngoài làm từ chất liệu cao su cao cấp với các đinh dạng tam giác giúp tăng độ bám sân và hỗ trợ khả năng xử lý bóng bằng gầm giày. \r\n\r\nPhù hợp với cầu thủ có thiên hướng sử dụng kỹ thuật, xử lý và kiểm soát bóng.\r\n\r\nCác cầu thủ nổi tiếng đang trên chân dòng giày đá banh adidas Predator Accuracy: Pedri, David Alaba, Jude Bellingham, Gianluigi Donnarumma, Eder Militao...\r\n\r\nBộ sưu tập: Own Your Football (02/2023).\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\nSản phẩm đang có mặt tại Shop Giày Đá Banh Chính Hãng - Thanh Hùng Futsal:\r\n\r\nThanh Hùng Futsal Store I: 27 ĐƯỜNG D52, P. 12, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 377 722\r\n\r\nThanh Hùng Futsal Store II: 32A THẠCH THỊ THANH, P. TÂN ĐỊNH, Q. 1, TP. HCM | ĐT: 0901 710 730\r\n\r\nThanh Hùng Futsal Store III: 48 PHẠM VĂN BẠCH, P. 15, Q. TÂN BÌNH, TP. HCM | ĐT: 0901 710 780\r\n\r\n', 15, 'gai-tim.jpg', 0, 1),
(66, 31, 'ADIDAS COPA PURE.1 TF - GY9077 - TRẮNG/XANH', 2400000, '', 'ADIDAS COPA PURE.1 TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nNâng cấp trải nghiệm chơi bóng của bạn với thế hệ COPA PURE hoàn toàn mới. Đặc biệt, ADIDAS COPA PURE.1 TF có trọng lượng nhẹ hơn đáng kể so với người tiền nhiệm Copa Sense. Với những nâng cấp đáng kể trên thế hệ này, ADIDAS COPA PURE.1 TF sẽ là mẫu giày đá banh hoàn hảo dành cho những anh em yêu da thật và đam mê các thiết kế truyền thống. \r\n\r\nThông số kỹ thuật\r\n\r\nADIDAS COPA PURE.1 TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người. \r\n\r\nPhần upper làm từ chất liệu da bê cao cấp mang lại cảm giác bóng tốt nhất cho người chơi. Hai bên thân giày làm từ da tổng hợp.\r\n\r\nLưỡi gà rời mỏng và mềm, có thể dễ dàng xỏ chân vào hơn so với các mẫu adidas lưỡi gà liền trước đây, tạo sự thoải mái cho anh em có mu bàn chân cao và dày.  \r\n\r\nLớp đệm gót làm từ vải nhung mềm mại, tạo cảm giác ôm chân thoải mái. Khung bọc gót với thiết kế mềm dẻo không gây cảm giác khó chịu cho người mang khi thi đấu ở cường độ cao. ', 15, 'copa-xanh.jpg', 0, 1),
(67, 30, 'NIKE ZOOM MERCURIAL SUPERFLY 9 ACADEMY TF - DR5948-810 - NÂU BẠC', 1850000, '', 'NIKE ZOOM MERCURIAL SUPERFLY 9 ACADEMY TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nTháng 6/2022, Nike chính thức trình làng thế hệ tiếp theo của dòng giày Mercurial mang tên Air Zoom Mercurial. Cải tiến lớn nhất trên thế hệ này nằm ở bộ đệm Zoom Air được thiết kế độc quyền cho bóng đá. Bên cạnh đó, mọi chi tiết trên đôi giày lần này đều được thiết kế nhằm tối ưu hoá lối chơi tốc độ. \r\n\r\nLấy cảm hứng từ lớp thế hệ cầu thủ trẻ đang nâng bóng đá lên một tầm cao mới, Nike chính thức cho ra mắt bộ sưu tập giày đá banh “Generation Pack” cho kỳ World Cup 2022. Đây là bộ sưu tập sẽ bao gồm 3 silo chính của hãng là Air Zoom Mercurial, Phantom GT 2 và Tiempo Legend 9 trong những phối màu vô cùng ấn tượng.', 15, 'vapor-wc.jpg', 0, 1),
(68, 30, 'NIKE ZOOM MERCURIAL VAPOR 15 ACADEMY XXV TF - FB8396-060 - BẠC/XANH', 1690000, '', 'NIKE MERCURIAL VAPOR 15 ACADEMY TF - GIÀY ĐÁ BÓNG SÂN CỎ NHÂN TẠO\r\n\r\nTháng 6/2022, Nike chính thức trình làng thế hệ tiếp theo của dòng giày Mercurial mang tên Air Zoom Mercurial. Cải tiến lớn nhất trên thế hệ này nằm ở bộ đệm Zoom Air được thiết kế độc quyền cho bóng đá. Bên cạnh đó, mọi chi tiết trên đôi giày lần này đều được thiết kế nhằm tối ưu hoá lối chơi tốc độ. \r\n\r\nThông số kỹ thuật\r\nMẫu giày đá bóng MERCURIAL ZOOM VAPOR 15 ACADEMY TF là mẫu giày đá bóng đế TF dành cho sân cỏ nhân tạo 5-7 người.\r\n\r\nPhân khúc: Academy (Tầm trung).\r\n\r\nUpper làm từ da tổng hợp mềm mại giúp tăng cảm giác bóng. Ở thế hệ 15 này, hãng đã phủ thêm lớp NikeSkin trên bề mặt upper làm tăng độ bám bóng, từ đó có thể kiểm soát bóng và rê bóng tốt hơn. \r\n\r\nCấu trúc Speed Cage bên dưới bề mặt upper được làm từ chất liệu mỏng nhưng cực kỳ chắc chắn sẽ mang đến sự ôm chân vừa khít, đồng thời hạn chế sự xê dịch chân trong giày khi thi đấu ở cường độ cao.', 15, 'vapor-bac.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'Client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `gender`, `avatar`, `email`, `sdt`, `diachi`, `password`, `role`) VALUES
(16, 'Vũ Minh Chiến', 'Nam', 'Screenshot 2024-03-29 111251.png', 'chienvu2k4@gmail.com', 339381785, 'Hà Nội', 'Vuchien68@', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variant`
--

CREATE TABLE `variant` (
  `var_id` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `rom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `vc_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `flk_user_id` (`id_user`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `fl_id_user` (`id_user`),
  ADD KEY `fl_id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `flk_id_sp` (`id_sp`),
  ADD KEY `flk_id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `fl_id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `variant`
--
ALTER TABLE `variant`
  ADD PRIMARY KEY (`var_id`),
  ADD KEY `fl2_id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`vc_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `variant`
--
ALTER TABLE `variant`
  MODIFY `var_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `vc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `flk_user_id` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fl_id_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE,
  ADD CONSTRAINT `fl_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `flk_id_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`) ON DELETE CASCADE,
  ADD CONSTRAINT `flk_id_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fl_id_dm` FOREIGN KEY (`id_dm`) REFERENCES `danhmuc` (`id_dm`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `variant`
--
ALTER TABLE `variant`
  ADD CONSTRAINT `fl2_id_sp` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
