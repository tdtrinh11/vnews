-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 29, 2020 lúc 02:04 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `recommend_news`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `acc_id` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `stt` int(1) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`acc_id`, `name`, `password`, `birthday`, `gender`, `stt`, `email`) VALUES
('0', 'Minh Anh', '35c77578708ca6fa2ebaa2c482d33dcb7fcc5366', '1998-11-02', 0, 0, 'ntmanh2111@gmail.com'),
('70405', 'Nguyễn Hồng Phương', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', '01-01-1998', 0, 0, 'phuongnh@gmail.com'),
('84577', 'Trinh Dat', '1a3be0b92688e85c5b190b817e76d92ce0be8d68', '01-01-1998', 0, 0, 'tdtrinh11@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `id`) VALUES
('admin', '1a3be0b92688e85c5b190b817e76d92ce0be8d68', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fav_topic`
--

CREATE TABLE `fav_topic` (
  `id` int(10) NOT NULL,
  `acc_id` int(50) NOT NULL,
  `topic_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fav_topic`
--

INSERT INTO `fav_topic` (`id`, `acc_id`, `topic_id`) VALUES
(2731, 52570, 6),
(2843, 70405, 9),
(21399, 52570, 0),
(26277, 39172, 0),
(28758, 77457, 7),
(38967, 95521, 0),
(43549, 77457, 2),
(52561, 84577, 4),
(57244, 95521, 2),
(58166, 70405, 6),
(62792, 15215, 4),
(70426, 38176, 7),
(71177, 77457, 1),
(77156, 84907, 2),
(79046, 15215, 0),
(83304, 84907, 0),
(85135, 9090, 0),
(88388, 52570, 4),
(90658, 84577, 7),
(90909, 95521, 7),
(91568, 38176, 0),
(95086, 15215, 7),
(95833, 77457, 0),
(97675, 38176, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `source_id` int(10) NOT NULL,
  `topic_id` int(3) NOT NULL,
  `sub_cid` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `source` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `source_id`, `topic_id`, `sub_cid`, `title`, `source`, `img`, `summary`, `dtime`) VALUES
('1030003254', 0, 2, '', 'Sữa học đường lần đầu được triển khai tại Trà Vinh', 'https://vnexpress.net/sua-hoc-duong-lan-dau-duoc-trien-khai-tai-tra-vinh-4112831.html', 'https://i1-vnexpress.vnecdn.net/2020/06/09/hinh-1-4997-1591690843-1591715-7625-1418-1591716401.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=9ToLmqcEaufollAGpdjV8g', 'Trà Vinh Từ tháng 5, học sinh mầm non, tiểu học tại 276 trường trên địa bàn tỉnh được uống sữa khi đến trường, với tổng cộng hơn 4 triệu hộp sữa.', '0000-00-00 00:00:00'),
('1037722184', 0, 8, '', 'Katy Perry biến hóa phong cách khi mang bầu', 'https://vnexpress.net/katy-perry-bien-hoa-phong-cach-khi-mang-bau-4114519.html', 'https://i1-giaitri.vnecdn.net/2020/06/12/thoi-trang-bau-katy-perry.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=PDgO0vzE_wUCdXpzbQUprg', ' Ca sĩ Katy Perry diện đủ kiểu quần áo, đa dạng màu sắc, chất liệu khi mang thai con đầu lòng. ', '0000-00-00 00:00:00'),
('1063442222', 0, 1, '', 'Bánh gai miền Bắc có giống bánh ít lá gai?', 'https://vnexpress.net/banh-gai-mien-bac-co-giong-banh-it-la-gai-4114466.html', NULL, 'Tôi đã ăn bánh gai Phú Thọ, Hải Dương, Thái Bình... và mới biết Bình Định có bánh ít lá gai. Liệu hai loại có giống nhau? (Thi)', '0000-00-00 00:00:00'),
('1067323168', 3, 5, '', 'Mở phiên tòa giám đốc thẩm vụ án ông Lương Hữu Phước vào ngày 12/6', 'https://vietnamnet.vn/vn/phap-luat/ky-su-phap-dinh/mo-phien-xet-xu-giam-doc-tham-vu-luong-huu-phuoc-647907.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/10/15/mo-phien-toa-giam-doc-tham-vu-an-ong-luong-huu-phuoc-vao-ngay-12-6-240x160.jpg', 'Sau khi ông Lương Hữu Phước nhảy lầu tự tử vì cho rằng bị xử tù oan, ngày 12/6 tới, TAND Cấp cao tại TP.HCM sẽ mở phiên giám đốc thẩm đối với vụ án của ông.', '0000-00-00 00:00:00'),
('1071124618', 1, 3, '', 'Dồn dập bán cổ phiếu, đại gia Trịnh Văn Quyết chỉ còn 6,11% vốn FLC Faros', 'https://dantri.com.vn/kinh-doanh/don-dap-ban-co-phieu-dai-gia-trinh-van-quyet-chi-con-611-von-flc-faros-20200610060208571.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/02/12/trinh-van-quyet-1581449849257.jpg', '                      (Dân trí) &nbsp;- ROS hôm qua đứng tham chiếu nhưng được khớp lệnh cực mạnh lên tới 58,45 triệu đơn vị. Trong thời gian ngắn, đại gia Trịnh Văn Quyết đã bán ra khối lượng lớn cổ phiếu này.                                                        &gt;&gt;&nbsp;                                                                   Đại gia Trịnh Văn Quyết lại tung “chiêu”, nhà đầu tư đổ xô mua cổ phiếu                                                                                                                &gt;&gt;&nbsp;                                                                   Đại gia Trịnh Văn Quyết đi “nước cờ” mới, cổ phiếu lại “sốt giá”                                                                          ', '0000-00-00 00:00:00'),
('1071608586', 0, 4, '', 'Huawei tham gia phát triển Internet vệ tinh', 'https://vnexpress.net/huawei-tham-gia-phat-trien-internet-ve-tinh-4113469.html', 'https://i1-sohoa.vnecdn.net/2020/06/10/8bfa42a8a3e94c9bb6b13d9f43f727-6710-8624-1591781520.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=WvjEH8F-Ew-Rm_yEupBIdg', 'Huawei đang hợp tác với nhà mạng China Unicom để tăng cường phủ sóng Internet qua vệ tinh, tương tự dự án Starlink của Elon Musk.', '0000-00-00 00:00:00'),
('1090442752', 0, 7, '', 'TP HCM – Sài Gòn FC: Công Phượng trở lại', 'https://vnexpress.net/tp-hcm-sai-gon-fc-cong-phuong-tro-lai-4114311.html', 'https://i1-thethao.vnecdn.net/2020/06/12/DONG2838-1591921759-7425-1591921766.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=21Ei7IjUxv0lGMH9sX78tQ', ' Derby Sài Gòn hôm nay 12/6 là trận đầu tiên tiền đạo Công Phượng trở lại thi đấu cho CLB TP HCM tại V-League 2020 sau đợt nghỉ kéo dài. ', '0000-00-00 00:00:00'),
('1098895336', 0, 8, '', 'Tím - màu biểu tượng của cộng đồng LGBT', 'https://vnexpress.net/tim-mau-bieu-tuong-cua-cong-dong-lgbt-4112764.html', 'https://i1-giaitri.vnecdn.net/2020/06/09/mautimbieutuongdongtinh-159168-3078-7424-1591680227.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=TSb26l0a351Pg6XCZpcM1g', ' Hàng trăm chiếc khăn choàng màu oải hương nhuộm tím đường phố, cất lên tiếng nói về bình đẳng giới. ', '0000-00-00 00:00:00'),
('1099080226', 0, 4, '', 'Trung Quốc trồng rừng bằng máy bay trực thăng', 'https://vnexpress.net/trung-quoc-trong-rung-bang-may-bay-truc-thang-4113829.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/nhmybay-1591842927-2627-1591842942.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=Lz1xaGmfluIX-VK4iW0w5A', 'Nhóm chuyên gia từ Thiểm Tây gieo thử nghiệm hơn 13.500 ha rừng bằng hai máy bay trực thăng để cải thiện độ che phủ rừng tại cao nguyên Thanh Tạng. ', '0000-00-00 00:00:00'),
('11246679', 1, 0, '', 'Xe container hất văng xe 7 chỗ sau cú đối đầu kinh hoàng', 'https://dantri.com.vn/xa-hoi/xe-container-hat-vang-xe-7-cho-sau-cu-doi-dau-kinh-hoang-20200610093042864.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/1-1591756073851.jpg', '                      (Dân trí) &nbsp;- Sau cú va chạm kinh hoàng với xe container, chiếc xe 7 chỗ bị hất văng lên vỉa hè, tài xế bị mắc kẹt trong xe biến dạng.                  ', '0000-00-00 00:00:00'),
('1205548376', 3, 1, '', 'Ba cô gái nổi đình đám trên mạng nhờ tài ăn uống', 'https://vietnamnet.vn/vn/doi-song/am-thuc/ba-co-gai-lam-mua-lam-gio-tren-mang-voi-cac-mon-an-647969.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/15/ba-co-gai-noi-dinh-dam-tren-mang-nho-tai-an-uong-140x93.jpg', 'Sau sinh 14 ngày, Thắm bị tắc tia sữa, rồi nhiễm trùng huyết, phải cắt tứ chi. Trong những ngày tháng gian nan ấy, tình yêu của chồng giúp cô vượt qua bệnh tật và cả sự tự ti. ', '0000-00-00 00:00:00'),
('1206775301', 1, 8, '', '“Tỷ phú hụt” Kylie Jenner: Ngoại lệ hiếm hoi được cộng đồng mạng “đặc cách”', 'https://dantri.com.vn/van-hoa/ty-phu-hut-kylie-jenner-ngoai-le-hiem-hoi-duoc-cong-dong-mang-dac-cach-20200608231737030.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/08/2-1591632997047.jpeg', '                      (Dân trí) &nbsp;- Kylie Jenner có lẽ là trường hợp duy nhất có thể tạo nên sự nghiệp kinh doanh đình đám, với khởi điểm từ vị thế của một nhân vật có tầm ảnh hưởng trên mạng xã hội.                                                        &gt;&gt;&nbsp;                                                                   Nhìn lại chặng đường đã qua của “tỷ phú bị phế truất” Kylie Jenner                                                                                                                &gt;&gt;&nbsp;                                                                   Nói Kylie Jenner là tỷ phú “tự thân”, có đúng không?                                                                          ', '0000-00-00 00:00:00'),
('122269028', 3, 9, '', 'Xe máy lấn làn và cái kết đau lòng', 'https://vietnamnet.vn/vn/oto-xe-may/sau-tay-lai/xe-may-lan-lan-va-cai-ket-dau-long-648197.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/14/ezgif-com-resize-1.gif', 'Chiếc xe máy bất ngờ lao sang làn đường ngược chiều rồi đâm trực diện vào đầu ôtô. Cú tông khiến tài xế xe máy bị hất tung lên không trung và bị thương nặng.', '0000-00-00 00:00:00'),
('1230631912', 0, 4, '', 'Hiểu lầm thường gặp khi sử dụng điều hòa', 'https://vnexpress.net/hieu-lam-thuong-gap-khi-su-dung-dieu-hoa-4113938.html', 'https://i1-sohoa.vnecdn.net/2020/06/11/a2-6108-1591861267-1591865872-5024-1591865911.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=dxb7al8gFt1GqiBproxD2A', 'Một số người thường hạ nhiệt độ thấp để nhanh mát phòng, đến khi phòng mát thì tắt điều hòa đi, lúc sau bật tiếp... - cách này chưa chính xác. ', '0000-00-00 00:00:00'),
('1246595485', 0, 4, '', 'Răng cá mập cổ đại to bằng bàn tay', 'https://vnexpress.net/rang-ca-map-co-dai-to-bang-ban-tay-4113763.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/Rangcamapset-1591845321-2514-1591845663.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=xMqkfnuRm-78Udvblo_1sw', 'Mỹ Chiếc răng dài 14,6 cm và nặng gần 0,5 kg thuộc về megalodon, loài cá mập khổng lồ đã tuyệt chủng. ', '0000-00-00 00:00:00'),
('1277645193', 0, 1, '', 'Phố đèn đỏ sáng trở lại', 'https://vnexpress.net/pho-den-do-sang-tro-lai-4114657.html', 'https://i1-dulich.vnecdn.net/2020/06/12/sydney-vne-1591950464-15919510-7126-2359-1591951032.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=IvmRQUfMHXtrlbm8rA9dRQ', NULL, '0000-00-00 00:00:00'),
('1280915298', 1, 9, '', 'Land Rover Colossus - Sự kết hợp hoàn hảo giữa SUV và bán tải', 'https://dantri.com.vn/o-to-xe-may/land-rover-colossus-su-ket-hop-hoan-hao-giua-suv-va-ban-tai-20200609215838058.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/land-rover-colossus-1-a-1024-x-555-1591713746235.jpg', '                      (Dân trí) &nbsp;- Chiếc xe concept này là một thử nghiệm táo bạo đầy thú vị khi kết hợp thiết kế SUV và xe bán tải vào một.                                                        &gt;&gt;&nbsp;                                                                   Loạn thông tin về mẫu xe bán tải đầu tiên của Hyundai                                                                                                                &gt;&gt;&nbsp;                                                                   Land Rover từ bỏ kế hoạch cạnh tranh Bentley Bentayga                                                                          ', '0000-00-00 00:00:00'),
('1286696086', 0, 4, '', 'Mưa trút 1.000 tấn vi nhựa xuống Mỹ mỗi năm', 'https://vnexpress.net/mua-trut-1-000-tan-vi-nhua-xuong-my-moi-nam-4114325.html', 'https://i1-vnexpress.vnecdn.net/2020/06/12/Vinhua-1591947127-5084-1591947706.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=g5M5TJggpgvgtT5AVv2azA', 'Hàng năm, lượng vi nhựa tương đương 300 triệu chiếc chai theo mưa rơi xuống các công viên quốc gia và vùng hoang dã ở miền tây nước Mỹ.', '0000-00-00 00:00:00'),
('1295283749', 1, 2, '', 'Hàn Quốc: Lĩnh 5 năm tù vì cấp bằng đại học giả cho khoảng 200 sinh viên', 'https://dantri.com.vn/giao-duc-khuyen-hoc/han-quoc-linh-5-nam-tu-vi-cap-bang-dai-hoc-gia-cho-khoang-200-sinh-vien-20200609224858935.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/bangdaihocdocx-1591717605339.jpeg', '                      (Dân trí) &nbsp;- Tòa án Tối cao Hàn Quốc ngày 24/5 giữ nguyên bản án 5 năm tù với Kim Moon-kap, Chủ tịch một đại học từ xa, vì tội cấp bằng giả cho khoảng 200 sinh viên.                  ', '0000-00-00 00:00:00'),
('130791973', 0, 4, '', 'Hòn đảo hình thành từ chất thải của cá', 'https://vnexpress.net/hon-dao-hinh-thanh-tu-chat-thai-cua-ca-4113746.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/Hondaocaset-1591851279-1771-1591851730.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=6ZXFKYPrxw3igaQMiOLHoQ', 'Maldives Bãi biển tuyệt đẹp trên đảo Vakkaru được tạo nên nhờ lượng lớn cát do cá mó thải ra sau khi ăn san hô.', '0000-00-00 00:00:00'),
('1312083304', 3, 0, '', 'Bí thư Cà Mau được bầu giữ chức ủy viên UB Thường vụ Quốc hội', 'https://vietnamnet.vn/vn/thoi-su/quoc-hoi/bi-thu-ca-mau-duoc-bau-giu-chuc-uy-vien-ub-thuong-vu-quoc-hoi-648395.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/08/bi-thu-ca-mau-duoc-bau-vao-uy-vien-ub-thuong-vu-quoc-hoi-240x160.jpg', 'Với số phiếu 451 (93,37%) đại biểu Quốc hội (QH) tán thành, Bí thư tỉnh ủy Cà Mau Dương Thanh Bình được QH bầu giữ chức vụ ủy viên UB Thường vụ Quốc hội.', '0000-00-00 00:00:00'),
('1326382850', 1, 6, '', 'Lấy nhầm chai cồn rửa mũi cho con, bé 8 tháng tuổi phải lọc máu', 'https://dantri.com.vn/suc-khoe/lay-nham-chai-con-rua-mui-cho-con-be-8-thang-tuoi-phai-loc-mau-20200610072630712.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/nhonhamcon-90-do-1591748577396.jpg', '                      (Dân trí) &nbsp;- Bà mẹ ở Hà Nội lấy nhầm 50ml dung dịch cồn 90 độ để rửa mũi cho con. Hậu quả khiến trẻ bị ngộ độc methanol.                                                        &gt;&gt;&nbsp;                                                                   Con viêm phổi vì mẹ rửa mũi nhầm nước cồn                                                                                                                &gt;&gt;&nbsp;                                                                   Cồn, ôxy già: Mua dễ, dùng không dễ                                                                          ', '0000-00-00 00:00:00'),
('1333736223', 3, 5, '', 'Vụ trung úy công an nổ súng trong quán nhậu: Người bị bắn là công an', 'https://vietnamnet.vn/vn/phap-luat/ho-so-vu-an/vu-trung-uy-cong-an-no-sung-trong-quan-nhau-nguoi-bi-ban-la-cong-an-647887.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/08/11/trung-uy-cong-an-phuong-o-binh-duong-no-sung-ban-nguoi-o-quan-nhau-240x160.jpg', 'Xuất phát từ mâu thuẫn trong ăn nhậu giữa nhóm công an với nhau, trung úy công an khu vực ở Bình Dương đã rút súng bắn đồng đội bị thương.', '0000-00-00 00:00:00'),
('1335440882', 0, 7, '', 'Những thay đổi trên đường chạy VM Quy Nhơn 2020', 'https://vnexpress.net/nhung-thay-doi-tren-duong-chay-vm-quy-nhon-2020-4113137.html', 'https://i1-thethao.vnecdn.net/2020/06/12/6-1589478737-1591759067-3330-1-6541-4918-1591969158.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=u0Q818CB8ufYsQtlinYPLA', ' Runner đến với giải marathon năm nay sẽ trải nghiệm cung đường mới cả về chuyên môn và khung cảnh. ', '0000-00-00 00:00:00'),
('1342103805', 1, 9, '', 'Mẹo tránh nổ lốp khi lái xe giữa trời nóng đỉnh điểm', 'https://dantri.com.vn/o-to-xe-may/meo-tranh-no-lop-khi-lai-xe-giua-troi-nong-dinh-diem-20200609141747160.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/meo-tranh-no-lop-khi-lai-xe-giua-troi-nong-dinh-diem-2-1591686847953.jpg', '                      Nhiệt độ mặt đường ở mức rất cao, áp suất lốp tăng đột ngột khi đang di chuyển có thể dẫn đến nổ lốp ô tô, nguy cơ tai nạn cao. Dưới đây là gợi ý giúp tài xế an toàn hơn giữa ngày nóng đỉnh điểm.                                                        &gt;&gt;&nbsp;                                                                   \"Bỏ túi\" 5 mẹo hạ nhiệt cho ô tô sau khi đỗ dưới trời nắng                                                                                                                &gt;&gt;&nbsp;                                                                   Nổ lốp xe ôtô nguy hiểm đến mức nào?                                                                                                                &gt;&gt;&nbsp;                                                                   Xử lí thế nào khi xe bị nổ lốp trên cao tốc?                                                                          ', '0000-00-00 00:00:00'),
('1365297406', 1, 4, '', 'Những mẫu smartphone cao cấp và cận cao cấp đang giảm giá tiền triệu', 'https://dantri.com.vn/suc-manh-so/nhung-mau-smartphone-cao-cap-va-can-cao-cap-dang-giam-gia-tien-trieu-20200610000616873.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/smartphone-giam-gia-1591722240374.jpg', '                      (Dân trí) &nbsp;- Nhiều mẫu smartphone cao cấp đang có mức giảm giá mạnh trên thị trường, đây là cơ hội để người dùng có thể sở hữu những sản phẩm này với mức giá “mềm” hơn.                                                        &gt;&gt;&nbsp;                                                                   Loạt smartphone dưới 6 triệu mới ra mắt tại Việt Nam                                                                                                                &gt;&gt;&nbsp;                                                                   Loạt smartphone giảm giá 50% sau dịch Covid-19                                                                          ', '0000-00-00 00:00:00'),
('1374852914', 3, 5, '', 'Nguyễn Xuân Đường bị đề nghị truy tố vụ đánh người tại trụ sở công an', 'https://vietnamnet.vn/vn/phap-luat/ho-so-vu-an/nguyen-xuan-duong-bi-de-nghi-truy-to-vu-danh-nguoi-tai-tru-so-cong-an-648139.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/11/nguyen-xuan-duong-bi-de-nghi-truy-to-vu-danh-nguoi-tai-tru-so-cong-an-240x160.jpg', 'Công an TP Thái Bình đã chuyển hồ sơ sang VKSND cùng cấp đề nghị truy tố bị can Nguyễn Xuân Đường vì liên quan đến vụ đánh người tại trụ sở Công an phường Trần Lãm.', '0000-00-00 00:00:00'),
('1376064407', 1, 8, '', '&quot;Đời sống hữu hạn, tài năng và tác phẩm nhạc sĩ Trần Quang Lộc còn mãi”', 'https://dantri.com.vn/van-hoa/doi-song-huu-han-tai-nang-va-tac-pham-nhac-si-tran-quang-loc-con-mai-20200608160906196.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/08/hongnhung-1591607137242.jpeg', '                      (Dân trí) &nbsp;- Từ Mỹ, ca sĩ Hồng Nhung đã gửi lời chia buồn sâu sắc đến gia đình nhạc sĩ Trần Quang Lộc. Chị nói: “Đời sống hữu hạn, nhưng tài năng và nhạc phẩm của nhạc sĩ Trần Quang Lộc còn mãi”.                                                        &gt;&gt;&nbsp;                                                                   Nhạc sĩ Trần Quang Lộc - tác giả \"Có phải em mùa thu Hà Nội\" qua đời                                                                                                                &gt;&gt;&nbsp;                                                                   “Bài hát Có phải em mùa thu Hà Nội ảnh hưởng đặc biệt với tôi”                                                                          ', '0000-00-00 00:00:00'),
('1388574713', 0, 1, '', 'Ngôi nhà kiến trúc sư dành tặng bố mẹ', 'https://vnexpress.net/ngoi-nha-kien-truc-su-danh-tang-bo-me-4113712.html', 'https://i1-giadinh.vnecdn.net/2020/06/11/93774861-2135089179969728-4683-5585-5585-1591811628.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=oyM8MyOdH9Aa39OcHfdJgA', 'Hà Tĩnh Ngôi nhà hai tầng trên mảnh đất gần 3.000 m2 ở Nghi Xuân do người con làm kiến trúc sư thiết kế và xây tặng cho bố mẹ. ', '0000-00-00 00:00:00'),
('139277581', 0, 4, '', 'Mặt Trời làm nứt đá trên bề mặt tiểu hành tinh', 'https://vnexpress.net/mat-troi-lam-nut-da-tren-be-mat-tieu-hanh-tinh-4113545.html', 'https://i1-vnexpress.vnecdn.net/2020/06/10/Bennu-1591785132-5521-1591785226.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=woyV0hv1nBueB4_M8ftAkg', 'Tàu vũ trụ của NASA chụp ảnh những đường nứt và vết bong tróc trên bề mặt tiểu hành tinh Bennu do sự chênh lệch nhiệt độ gây ra. ', '0000-00-00 00:00:00'),
('1405417810', 3, 0, '', 'Cháy nhà trọ ở Sài Gòn, 3 người mắc kẹt tử vong', 'https://vietnamnet.vn/vn/thoi-su/chay-nha-tro-o-sai-gon-3-nguoi-mac-ket-tu-vong-648411.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/09/chay-nha-tro-3-nguoi-chet-o-sai-gon-4-240x160.jpg', 'Đám cháy lớn từ nhà trọ nhưng có cửa khóa bên trong khiến người dân không thể tiếp cận. 3 người mắc kẹt do bị ngạt khói và phỏng hô hấp đã tử vong.', '0000-00-00 00:00:00'),
('1412701173', 1, 7, '', 'Hoãn lễ bốc thăm vòng bảng AFF Cup 2020', 'https://dantri.com.vn/the-thao/hoan-le-boc-tham-vong-bang-aff-cup-2020-20200610074042226.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/aff-cup-1591749575649.jpeg', '                      (Dân trí) &nbsp;- Báo giới Đông Nam Á cho biết lễ bốc thăm vòng bảng AFF Cup 2020 tạm thời bị hoãn do nhiều quốc gia chưa kiểm soát được dịch Covid-19.                                                        &gt;&gt;&nbsp;                                                                   Báo Thái Lan nói gì về việc Việt Nam có thể đăng cai AFF Cup 2020?                                                                                                                &gt;&gt;&nbsp;                                                                   Việt Nam có thể đăng cai AFF Cup 2020, VFF nói gì?                                                                          ', '0000-00-00 00:00:00'),
('1412741401', 0, 4, '', 'Báo hoa mai dùng khỉ non làm mồi nhử', 'https://vnexpress.net/bao-hoa-mai-dung-khi-non-lam-moi-nhu-4114485.html', 'https://i1-vnexpress.vnecdn.net/2020/06/12/VNELeopard-1591945513-1130-1591945662.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=qN__bk4LFYfXpGkhNkYm8Q', 'Botswana Con báo kiên nhẫn chờ đợi phía sau khỉ non để rình bắt khỉ trưởng thành tới giải cứu nhưng kế hoạch của nó không thành công.', '0000-00-00 00:00:00'),
('1469748626', 3, 2, '', 'Học sinh 7.5 IELTS, giáo viên không trên mức ấy sao dạy được học trò?', 'https://vietnamnet.vn/vn/giao-duc/nguoi-thay/ho-c-sinh-7-5-ielts-gia-o-vie-n-kho-ng-tre-n-mu-c-a-y-sao-da-y-du-o-c-ho-c-tro-648354.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/22/hoc-sinh-dat-7-5-ielts-giao-vien-khong-tren-muc-ay-sao-day-duoc-hoc-tro-140x93.jpg', 'Bỏ thời gian đi luyện IELTS cấp tập cũng giống như việc “học gạo”, giáo viên không thể nào lên trình trong một khóa học ngắn hạn.', '0000-00-00 00:00:00'),
('1483107841', 0, 2, '', 'Cách học 9 ngôn ngữ của diễn giả TED Talk', 'https://vnexpress.net/cach-hoc-9-ngon-ngu-cua-dien-gia-ted-talk-4112953.html', 'https://i1-vnexpress.vnecdn.net/2020/06/09/1556633098-1591694598-7596-1591694883.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=NejddiNHnHIgxlQaPJgviw', 'Lydia Machova, tiến sĩ dịch thuật, diễn giả TED Talk, chia sẻ cách học ngoại sau khi thành thạo 9 thứ tiếng gồm Anh, Đức, Tây Ban Nha, Pháp, Nga...', '0000-00-00 00:00:00'),
('1485510367', 3, 2, '', 'Khoa Quốc tế - ĐH Quốc gia Hà Nội tuyển sinh 2 ngành mới', 'https://vietnamnet.vn/vn/giao-duc/khoa-quoc-te-dh-quoc-gia-ha-noi-tuyen-sinh-2-nganh-moi-648547.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/16/3-240x160.jpg', 'Từ năm 2020, thí sinh dự tuyển vào Khoa Quốc tế- ĐH Quốc gia Hà Nội có cơ hội nhận cùng lúc 2 bằng đại học và trải nghiệm học kỳ tại nước ngoài với chương trình Cử nhân Song bằng Quản lý và Cử nhân Song bằng ngành Marketing.', '0000-00-00 00:00:00'),
('149518442', 3, 7, '', 'Barca xem bán Fati cho MU, Coutinho trở lại Premier League', 'https://vietnamnet.vn/vn/the-thao/bong-da-quoc-te/tin-bong-da-13-6-barca-ban-fati-cho-mu-coutinho-den-chelsea-648593.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/20/ansu-fati-barca-150x100.jpg', NULL, '0000-00-00 00:00:00'),
('1515793935', 1, 8, '', 'Chiều vợ như Châu Kiệt Luân, thuê trọn sân bóng để có không gian riêng tư', 'https://dantri.com.vn/giai-tri/chieu-vo-nhu-chau-kiet-luan-thue-tron-san-bong-de-co-khong-gian-rieng-tu-20200609102856138.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/screen-shot-20200609-at-094426-1591672824247.png', '                      (Dân trí) &nbsp;- Truyền thông Đài Loan đưa tin, Châu Kiệt Luân đã bao trọn sân bowling rộng 3000m2, để có không gian riêng tư với vợ. Vài năm trở lại đây, anh không thiết tha làm việc mà dành thời gian cho gia đình.                                                        &gt;&gt;&nbsp;                                                                   “Ông chồng quốc dân” Châu Kiệt Luân hoá trang ấn tượng cùng vợ trẻ                                                                                                                &gt;&gt;&nbsp;                                                                   “Bà xã” của Châu Kiệt Luân khoe ảnh chụp cùng hai thiên thần nhỏ                                                                          ', '0000-00-00 00:00:00'),
('1517226600', 3, 4, '', 'Thêm một công cụ gây tranh cãi trên Internet', 'https://vietnamnet.vn/vn/cong-nghe/ung-dung/them-mot-cong-cu-gay-tranh-cai-tren-internet-648210.html', 'https://vnn-imgs-a1.vgcloud.vn/znews-photo-fbcrawler.zadn.vn/w960/Uploaded/yqdlcqrwq/2020_06_10/Z12610062020-240x160.jpeg', 'PimEyes là công cụ cho phép tìm kiếm khuôn mặt của một người trên Internet dựa trên ảnh khuôn mặt do người dùng cung cấp.', '0000-00-00 00:00:00'),
('1523378112', 0, 4, '', 'Hồ nước tạo ảo giác cao hàng trăm mét', 'https://vnexpress.net/ho-nuoc-tao-ao-giac-cao-hang-tram-met-4113575.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/Honuocaogiacset-1591872209-2390-1591872364.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=kK1x1RxkyuAGXQq8iSbxkw', 'Vị trí đặc biệt giữa những vách đá khiến hồ nước lớn nhất quần đảo Faroe trông cao hơn nhiều so với mực nước biển.  ', '0000-00-00 00:00:00'),
('1534853557', 0, 9, '', 'Nissan Việt Nam giảm 30 triệu đồng cho X-Trail', 'https://vnexpress.net/nissan-viet-nam-giam-30-trieu-dong-cho-x-trail-4113371.html', 'https://i1-vnexpress.vnecdn.net/2020/06/12/nisssan-bor-logo-1591924999-15-9218-3259-1591925889.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=5augP1NqeQoEZTbIj3GbxQ', 'Nissan X-Trail V-series 2.0 SL là 913 triệu đồng và Nissan X-Trail V-series 2.5 SV là 993 triệu đồng, giảm 30 triệu đồng so với giá gốc.', '0000-00-00 00:00:00'),
('1539685387', 0, 9, '', 'Đường hai làn, ôtô được phép đi cả hai?', 'https://vnexpress.net/duong-hai-lan-oto-duoc-phep-di-ca-hai-4114617.html', 'https://i1-vnexpress.vnecdn.net/2020/06/12/18a2fa41-76c5-41a6-b309-cb688b-4999-3642-1591946457.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=uSYpdxOAP_xeuBi4YfHHxg', 'Đường Quốc lộ 20, đoạn qua thành phố Di Linh, mỗi bên phân chia 2 làn đường. (Công Thanh)', '0000-00-00 00:00:00'),
('1550165465', 0, 4, '', 'TV 4K đua giảm giá dịp hè', 'https://vnexpress.net/tv-4k-dua-giam-gia-dip-he-4113412.html', 'https://i1-sohoa.vnecdn.net/2020/06/11/20-lg-sm9000-nanocell-vne-6619-8286-3493-1591842153.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=fF7zt_N4TmTJnKl62Fm3mA', 'Không chỉ TV ra mắt từ 2018, 2019 hạ giá mạnh để xả hàng, một số mẫu 4K đời mới vừa xuất hiện trên thị trường cũng giảm giá tiền triệu. ', '0000-00-00 00:00:00'),
('1562532012', 0, 9, '', 'Top xe bán chạy tháng 5 - VinFast lần đầu góp mặt', 'https://vnexpress.net/top-xe-ban-chay-thang-5-vinfast-lan-dau-gop-mat-4113501.html', 'https://i1-vnexpress.vnecdn.net/2020/06/10/top-xe-T5-2020-settop.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=sMz22UZlSCwdR6TIidup3g', 'Fadil, Lux A2.0 là hai cái tên mới trong danh sách top xe bán chạy tháng 5 tại Việt Nam.', '0000-00-00 00:00:00'),
('1585341148', 1, 9, '', 'Discovery Sport 2020 về Việt Nam, cạnh tranh Mercedes GLC', 'https://dantri.com.vn/o-to-xe-may/discovery-sport-2020-ve-viet-nam-canh-tranh-mercedes-glc-20200610093059992.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/img-2199-1591755794840.jpg', '                      (Dân trí) &nbsp;- Mẫu crossover cỡ trung của Land Rover được trau chuốt hơn về ngoại hình, khung gầm để đấu với các đối thủ như Mercedes-Benz GLC, BMW X3 và Audi Q5.                                                        &gt;&gt;&nbsp;                                                                   Land Rover Discovery Sport - SUV hạng sang cho người ưa trải nghiệm                                                                                                                &gt;&gt;&nbsp;                                                                   Land Rover Defender 2020 “hồi sinh” sau 23 năm vắng bóng                                                                                                                &gt;&gt;&nbsp;                                                                   Land Rover Colossus - Sự kết hợp hoàn hảo giữa SUV và bán tải                                                                          ', '0000-00-00 00:00:00'),
('1617575114', 0, 6, '', 'Em bé bị bỏ quên trong ôtô hồi phục nhanh', 'https://vnexpress.net/em-be-bi-bo-quen-trong-oto-hoi-phuc-nhanh-4114369.html', NULL, ' Vĩnh Phúc  Bệnh nhi 19 tháng tuổi điều trị tại Bệnh viện Đa khoa Vĩnh Phúc sáng 12/6 hết sốt, ăn uống tốt, không còn nôn. ', '0000-00-00 00:00:00'),
('1633092838', 0, 3, '', 'Giá nhà không giảm hậu Covid-19 vì vướng pháp lý', 'https://vnexpress.net/gia-nha-khong-giam-hau-covid-19-vi-vuong-phap-ly-4114253.html', 'https://i1-kinhdoanh.vnecdn.net/2020/06/11/a-tb-residences-market-hcm-6576-1591882735.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=Ndc6ITX3WOueRst4oPXo8Q', 'Thủ tục kéo dài, nguồn cung khan hiếm, chi phí leo thang khiến giá nhà tiếp tục neo cao hoặc tăng vọt dù thị trường địa ốc giảm tốc.', '0000-00-00 00:00:00'),
('1657321860', 0, 3, '', 'PNJ mở mới hàng loạt cửa hàng', 'https://vnexpress.net/pnj-mo-moi-hang-loat-cua-hang-4114604.html', 'https://i1-kinhdoanh.vnecdn.net/2020/06/12/877-1591945135-1591949016-9435-1591949102.png?w=300&h=180&q=100&dpr=1&fit=crop&s=7iN0_aq8yMJernLmxsUnwg', 'Hãng trang sức PNJ tăng tốc mở rộng mạng lưới bán lẻ để tranh thủ gia tăng thị phần từ khoảng trống thị trường. ', '0000-00-00 00:00:00'),
('1679733862', 0, 5, '', 'Quyết định nào cho phiên giám đốc thẩm vụ ông Lương Hữu Phước?', 'https://vnexpress.net/quyet-dinh-nao-cho-phien-giam-doc-tham-vu-ong-luong-huu-phuoc-4113547.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/luonghuuphuoc-1591862090-5232-1591862096.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=I_kylDimfcfz4fQhwPx2UA', 'TP HCM Ngày mai, 12/6, Ủy ban thẩm phán TAND Cấp cao có thể hủy án đã tuyên ông Lương Hữu Phước 3 năm tù, hoặc bác kháng nghị của chính tòa này.', '0000-00-00 00:00:00'),
('1688482014', 0, 1, '', 'Làng sạch bóng Covid-19 bán nhà giá 1 euro', 'https://vnexpress.net/lang-sach-bong-covid-19-ban-nha-gia-1-euro-4114636.html', 'https://i1-dulich.vnecdn.net/2020/06/12/toplangItaly-1591950849-5442-1591951173.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=tiGE0aaX0UGzT1inQ9BowA', 'Italy Ngôi làng Cinquefrondi nằm ở miền nam tự giới thiệu là nơi \"không có Covid-19\" để thu hút khách mua nhà giá 1 euro.', '0000-00-00 00:00:00'),
('1715657105', 1, 2, '', 'Thí sinh nào được miễn thi Ngoại ngữ trong xét tốt nghiệp THPT 2020?', 'https://dantri.com.vn/giao-duc-khuyen-hoc/thi-sinh-nao-duoc-mien-thi-ngoai-ngu-trong-xet-tot-nghiep-thpt-2020-20200610102855861.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2019/06/24/hoc-sinh-tphcm-du-thi-thpt-quoc-gia-1561366899946.jpg', '                      (Dân trí) &nbsp;- Bộ GD&ĐT vừa công bố các trường hợp được miễn thi bài thi Ngoại ngữ trong xét công nhận tốt nghiệp THPT 2020 tại hội nghị tập huấn nghiệp vụ về công tác tổ chức thi tốt nghiệp THPT năm nay.                  ', '0000-00-00 00:00:00'),
('1718749323', 0, 1, '', 'Cách dạy con của bố mẹ Michelle Obama', 'https://vnexpress.net/cach-day-con-cua-bo-me-michelle-obama-4113722.html', 'https://i1-giadinh.vnecdn.net/2020/06/11/anh3-1591830016-1591830026-159-5904-7457-1591831206.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=6dZHul4d21flfIaz9csf0g', 'Bố là thợ sửa ống nước và mẹ ở nhà nội trợ, cả hai không học đại học nhưng hai đứa con đều tốt nghiệp những trường danh tiếng bậc nhất của Mỹ.', '0000-00-00 00:00:00'),
('1718899169', 3, 9, '', 'Top 10 xe ô tô ế ẩm nhất tháng 5: Xe Nhật chiếm đa số', 'https://vietnamnet.vn/vn/oto-xe-may/tin-tuc/top-10-xe-o-to-e-am-nhat-thang-5-xe-nhat-chiem-da-so-648265.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/16/top-10-xe-o-to-e-am-nhat-thang-5-xe-nhat-chiem-da-so-240x160.jpg', 'Trong danh sách top 10 ô tô ế ẩm nhất tháng 5/2020, có đến 9 mẫu xe đến từ các thương hiệu xe Nhật. Trong đó, Honda, Suzuki, Toyota, Isuzu chia đều mỗi hãng góp mặt hai mẫu xe.  ', '0000-00-00 00:00:00'),
('1761089505', 0, 8, '', 'Phim Lý Nhã Kỳ - Han Jae Suk tung trailer', 'https://vnexpress.net/phim-ly-nha-ky-han-jae-suk-tung-trailer-4114635.html', 'https://i1-giaitri.vnecdn.net/2020/06/12/settoplynhakyphimmoitungtraile-3192-3424-1591950250.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=N2oJnimeJ5dYN-WlMUMFkA', ' Lý Nhã Kỳ hóa người vợ qua đời do tai nạn ôtô, khiến chồng (Han Jae Suk đóng) buồn bã, trong trailer phim \"Bí mật thiên đường\". ', '0000-00-00 00:00:00'),
('1771222874', 0, 3, '', 'Tường An chia cổ tức cao kỷ lục', 'https://vnexpress.net/tuong-an-chia-co-tuc-cao-ky-luc-4114488.html', 'https://i1-kinhdoanh.vnecdn.net/2020/06/12/tuong-an-1591933632-1591933680-9547-1591935516.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=GuxhRsEJMUCZDmdNeAsV_w', 'Cổ đông Công ty Cổ phần dầu thực vật Tường An (TAC) vừa thông qua kế hoạch chia cổ tức năm nay 20% cộng với cổ tức đặc biệt 75%.', '0000-00-00 00:00:00'),
('185248808', 3, 0, '', 'Bộ trưởng Đào Ngọc Dung không tán thành đề xuất nghỉ 5 ngày dịp 2/9', 'https://vietnamnet.vn/vn/thoi-su/clip-nong/bo-truong-dao-ngoc-dung-khong-tan-thanh-de-xuat-nghi-5-ngay-dip-2-9-647803.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/10/10/bo-truong-dao-ngoc-dung-khong-tan-thanh-de-xuat-nghi-5-ngay-dip-2-9-2-240x160.jpg', 'Quan điểm của Bộ LĐ-TB-XH và cá nhân Bộ trưởng Đào Ngọc Dung là không tán thành đề xuất nghỉ 5 ngày dịp lễ 2/9 như đề xuất của Tổng cục Du lịch. Quan điểm này cũng được Thủ tướng đồng tình.', '0000-00-00 00:00:00'),
('1911707483', 3, 3, '', 'Tỷ giá ngoại tệ ngày 13/6: USD tăng nhẹ', 'https://vietnamnet.vn/vn/kinh-doanh/tai-chinh/ty-gia-ngoai-te-ngay-13-6-usd-tang-nhe-648591.html', 'https://vnn-imgs-f.vgcloud.vn/2019/08/16/19/ty-gia-ngoai-te-ngay-17-8-usd-tang-gia-240x160.jpg', 'USD tăng giá khi các nhà đầu tư lo ngại khả năng phục hồi kinh tế cùng diễn biến phức tạp của tình hình dịch bệnh.', '0000-00-00 00:00:00'),
('1920470478', 0, 9, '', 'Nên mua Xpander hay Kona?', 'https://vnexpress.net/nen-mua-xpander-hay-kona-4114456.html', 'https://i1-vnexpress.vnecdn.net/2020/06/12/hyundaikona215581553301558153-4808-3892-1591931243.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=Uumb4jC_bj0ptJXd6sbSNA', 'Mua xe sử dụng gia đình 4 người, không chạy dịch vụ, xin hỏi về ưu, nhược điểm của hai dòng xe trên. (Thụy Kha)', '0000-00-00 00:00:00'),
('1938819890', 0, 4, '', 'Nơi có thể chứa hài cốt nữ hoàng Cleopatra', 'https://vnexpress.net/noi-co-the-chua-hai-cot-nu-hoang-cleopatra-4113116.html', NULL, 'Nữ hoàng Ai Cập Cleopatra có thể được chôn cất trong một ngôi mộ dưới đền Taposiris Magna sau khi bà tự tử bằng cách để rắn độc cắn cách đây 2.000 năm.', '0000-00-00 00:00:00'),
('1967575084', 0, 9, '', 'Cảnh sát rượt đuổi kẻ cướp như trong phim', 'https://vnexpress.net/canh-sat-ruot-duoi-ke-cuop-nhu-trong-phim-4113978.html', NULL, 'Na Uy Xe cảnh sát hú còi đuổi theo hai nghi phạm trên chiếc xe máy trên con đường nhỏ trong công viên Kuba ở thủ đô Oslo.', '0000-00-00 00:00:00'),
('1975724743', 3, 5, '', 'Kẻ ngáo tấn công công an, tay ôm bát hương, miệng đòi lập biên bản', 'https://vietnamnet.vn/vn/phap-luat/ho-so-vu-an/ke-ngao-tan-cong-cong-an-tay-om-bat-huong-mieng-doi-lap-bien-ban-647740.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/09/22/ke-ngao-tan-cong-cong-an-tay-om-bat-huong-mieng-doi-lap-bien-ban-5-240x160.jpg', 'Kẻ ngáo đá ở Hải Dương dùng dao cố thủ trong nhà, chống trả công an. Đối tượng còn ôm bát hương của nhà dân, liên tục đòi lập biên bản.    ', '0000-00-00 00:00:00'),
('1985931207', 0, 9, '', 'Nguyên nhân và cách khắc phục xe Ford bị rò rỉ dầu', 'https://vnexpress.net/nguyen-nhan-va-cach-khac-phuc-xe-ford-bi-ro-ri-dau-4113341.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/mat-buong-cam-ford-vne-jpg-665-7348-9327-1591889439.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=HZwD-T6zT_-0YHTYsReEDA', 'Chất lượng gia công bề mặt ống làm mát khí nạp và quá trình bôi keo mặt che dây đai cam không đủ độ kín khiến dầu rò rỉ. ', '0000-00-00 00:00:00'),
('1994057887', 3, 7, '', 'Lịch thi đấu bóng đá hôm nay 13/6', 'https://vietnamnet.vn/vn/the-thao/bong-da-quoc-te/lich-thi-dau-bong-da-hom-nay-13-6-648194.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/14/napoli-vs-inter-150x100.jpg', NULL, '0000-00-00 00:00:00'),
('1998874326', 0, 9, '', 'Tỷ phú vỡ mộng tự sản xuất ôtô điện', 'https://vnexpress.net/ty-phu-vo-mong-tu-san-xuat-oto-dien-4112144.html', 'https://i1-vnexpress.vnecdn.net/2020/06/08/Dyson1-1591605053-7554-1591605417.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=r6fkyiO6XMxxPMKTWQsfuQ', 'Anh Chiếc SUV bảy chỗ chạy điện do tỷ phú James Dyson đầu tư sản xuất có giá 190.000 USD - một con số phi thực tế.', '0000-00-00 00:00:00'),
('2002057157', 0, 9, '', 'Những lỗi thường gặp trên Hyundai i10', 'https://vnexpress.net/nhung-loi-thuong-gap-tren-hyundai-i10-4111470.html', 'https://i1-vnexpress.vnecdn.net/2020/06/06/nhung-loi-thuong-gap-tren-xe-i-5312-2656-1591428175.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=86lwPUqpqd0bg6NltmBZuA', 'Thước lái kêu lục cục, màn hình giải trí tối đen hay chết lốc điều hòa là một số lỗi mà các xe i10 nhập khẩu và lắp ráp đều gặp phải.', '0000-00-00 00:00:00'),
('2009359490', 3, 8, '', 'Lương Mạnh Hải hội ngộ Tăng Thanh Hà', 'https://vietnamnet.vn/vn/giai-tri/the-gioi-sao/sao-viet-13-6-luong-manh-hai-va-tang-thanh-ha-hoi-ngo-648602.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/21/luong-manh-hai-hoi-ngo-tang-thanh-ha-5-150x100.jpg', NULL, '0000-00-00 00:00:00'),
('2030846675', 0, 0, '', 'Bí thư Tỉnh ủy Cà Mau làm Uỷ viên Thường vụ Quốc hội', 'https://vnexpress.net/bi-thu-tinh-uy-ca-mau-lam-uy-vien-thuong-vu-quoc-hoi-4114360.html', NULL, 'Ông Dương Thanh Bình, Bí thư Tỉnh ủy Cà Mau được bầu làm Ủy viên Uỷ ban Thường vụ Quốc hội.', '0000-00-00 00:00:00'),
('2032285177', 0, 2, '', 'Mẹo tạo tranh kim loại', 'https://kidlab.vnexpress.net/meo-tao-tranh-kim-loai-4112327.html', 'https://i1-vnexpress.vnecdn.net/2020/06/08/19-1591605383-3500-1591605462.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=FrkAoNNKCRklIXvoMuhk7w', 'Hiện tượng điện hóa học sẽ làm bào mòn kim loại tạo nên mảng màu khác biệt trên chiếc thìa giống một bức tranh.', '0000-00-00 00:00:00'),
('2041474281', 3, 0, '', 'Người đàn ông lén lút rời hiện trường vụ cháy ba người chết ở Sài Gòn', 'https://vietnamnet.vn/vn/thoi-su/nguoi-dan-ong-len-lut-roi-hien-truong-vu-chay-3-nguoi-chet-o-sai-gon-648563.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/17/nguoi-dan-ong-len-lut-roi-hien-truong-vu-chay-3-nguoi-chet-o-sai-gon-4-240x160.jpg', 'Camera an ninh ghi lại hình ảnh một người đàn ông có hành động lén lút, rời khỏi hiện trường vụ cháy phòng trọ khiến 3 người chết ở Sài Gòn.', '0000-00-00 00:00:00'),
('2064210982', 0, 8, '', 'Lý Hương mừng con gái tốt nghiệp cấp ba', 'https://vnexpress.net/ly-huong-mung-con-gai-tot-nghiep-cap-ba-4114629.html', 'https://i1-giaitri.vnecdn.net/2020/06/12/princesslamcongilhuo-159195248-6738-2266-1591952599.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=HAdsfSIAAhG5B6jxsKmv6Q', ' Mỹ  Princess Lam - con gái diễn viên Lý Hương - ra dáng thiếu nữ trong những bức ảnh do mẹ chụp ngày tốt nghiệp. ', '0000-00-00 00:00:00'),
('2084470952', 1, 5, '', 'Đánh bạc và tổ chức đánh bạc, 63 bị cáo lãnh gần 200 năm tù', 'https://dantri.com.vn/phap-luat/danh-bac-va-to-chuc-danh-bac-63-bi-cao-lanh-gan-200-nam-tu-20200609192316984.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/1-1591704996117.jpg', '                      (Dân trí) &nbsp;- Sau 5 ngày xét xử sơ thẩm, chiều ngày 9/6, TAND tỉnh Phú Yên tuyên phạt 195 năm tù đối với 63 bị cáo tham gia đánh bạc và tổ chức đánh bạc xảy ra ở thôn Chính Nghĩa (xã An Phú, TP Tuy Hòa, Phú Yên).                                                        &gt;&gt;&nbsp;                                                                   Vụ đánh bạc khủng: 95 con bạc, 30 ô tô nhưng chỉ thu giữ 168 triệu đồng?                                                                                                                &gt;&gt;&nbsp;                                                                   Bắt giữ vụ đánh bạc quy mô lớn, thu giữ gần 30 ô tô                                                                          ', '0000-00-00 00:00:00'),
('2090845791', 0, 1, '', 'Cảnh sắc bán đảo Sơn Trà', 'https://vnexpress.net/canh-sac-ban-dao-son-tra-4111813.html', 'https://i1-dulich.vnecdn.net/2020/06/07/Ban-dao-Son-Tra-Pham-Phung-1-1591521471.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=Vma4QuiRKh-xwINp8HXqbA', 'Đà Nẵng Thiên nhiên đa dạng, núi rừng biển cả, cùng vẻ đẹp của “nữ hoàng linh trưởng” thu hút du khách tham quan bán đảo.', '0000-00-00 00:00:00'),
('2105427775', 3, 0, '', 'Bà Nguyễn Thị Kim Ngân làm Chủ tịch Hội đồng bầu cử quốc gia', 'https://vietnamnet.vn/vn/thoi-su/quoc-hoi/ba-nguyen-thi-kim-ngan-lam-chu-tich-hoi-dong-bau-cu-quoc-gia-648070.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/09/ba-nguyen-thi-kim-ngan-lam-chu-tich-hoi-dong-bau-cu-quoc-gia-240x160.jpg', 'Chủ tịch Quốc hội Nguyễn Thị Kim Ngân được bầu giữ chức vụ Chủ tịch Hội đồng bầu cử quốc gia.', '0000-00-00 00:00:00'),
('2112763269', 0, 6, '', 'Massage thể thao giúp người chạy bộ duy trì cơ bắp', 'https://vnexpress.net/massage-the-thao-giup-nguoi-chay-bo-duy-tri-co-bap-4113778.html', 'https://i1-suckhoe.vnecdn.net/2020/06/11/athletes-calf-muscle-professio-6626-7620-1591842156.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=wbgybKXK2wl2VM3rw99i3A', ' Massage thể thao giúp runner tăng cường cơ bắp, hệ thống tuần hoàn, phục hồi nhanh sau cuộc đua và giảm nguy cơ chấn thương. ', '0000-00-00 00:00:00'),
('212044090', 0, 5, '', 'Ba tình huống pháp lý khi vợ chồng mua nhà đất', 'https://vnexpress.net/ba-tinh-huong-phap-ly-khi-vo-chong-mua-nha-dat-4113916.html', NULL, 'Có những cách ghi nào ghi tên trên sổ đỏ khi vợ/chồng mua nhà, đất trong thời kỳ hôn nhân? (Thanh Huế)', '0000-00-00 00:00:00'),
('2130951690', 3, 0, '', 'Quốc hội thảo luận nhiều vấn đề quan trọng về kinh tế xã hội', 'https://vietnamnet.vn/vn/thoi-su/chinh-tri/quoc-hoi-thao-luan-nhieu-van-de-quan-trong-ve-kinh-te-xa-hoi-648627.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/13/08/quoc-hoi-thao-luan-nhieu-van-de-nong-ve-kinh-te-xa-hoi-240x160.jpg', 'Quốc hội hôm nay (13/6) giành cả ngày để thảo luận về: Đánh giá bổ sung kết quả thực hiện Nghị quyết của Quốc hội về Kế hoạch phát triển kinh tế - xã hội và Ngân sách nhà nước năm 2019, tình hình thực hiện những tháng đầu năm 2020.', '0000-00-00 00:00:00'),
('2145621210', 0, 3, '', 'Chứng khoán giảm phiên thứ hai liên tiếp', 'https://vnexpress.net/chung-khoan-giam-phien-thu-hai-lien-tiep-4114285.html', 'https://i1-kinhdoanh.vnecdn.net/2020/06/11/chungkhoan25-1591891566-1222-1591891703.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=AfkCVGVBiWzWTTi_5II1-w', 'Lực cầu trở lại mạnh vào cuối phiên nhưng không đủ giúp VN-Index lên tham chiếu. Chỉ số giảm gần 4 điểm, về 863,52 điểm với thanh khoản hơn 7.700 tỷ đồng.', '0000-00-00 00:00:00'),
('2147408291', 0, 4, '', 'Hợp chất quý trong cây thanh trà có thể điều trị bệnh Alzheimer', 'https://vnexpress.net/hop-chat-quy-trong-cay-thanh-tra-co-the-dieu-tri-benh-alzheimer-4114339.html', 'https://i1-vnexpress.vnecdn.net/2020/06/13/cay-thanh-tra-1592009706-7157-1592009759.jpg?w=680&h=408&q=100&dpr=1&fit=crop&s=KNkKd-UGQvaCTwAOhGdlTQ', 'Từ việc thiết kế bản đồ gene chuẩn đoán bệnh Alzheimer, TS Võ Văn Giàu bước đầu xác định các hợp chất tiềm năng để điều trị trong cây thanh trà.', '0000-00-00 00:00:00'),
('247159797', 0, 4, '', 'Những tính năng mới trên Android 11', 'https://vnexpress.net/nhung-tinh-nang-moi-tren-android-11-4113796.html', 'https://i1-sohoa.vnecdn.net/2020/06/11/Android11logostockphoto2840x47-6037-2710-1591845986.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=IzbIomBkVOcWSNRwBYUcNw', 'Android 11 tập trung vào các tính năng về quản lý thông báo, tối ưu kết nối và tăng cường bảo mật.', '0000-00-00 00:00:00'),
('260678576', 0, 6, '', 'Cô gái bạch tạng lần đầu làm mẫu ảnh', 'https://vnexpress.net/co-gai-bach-tang-lan-dau-lam-mau-anh-4113301.html', 'https://i1-suckhoe.vnecdn.net/2020/06/11/80097741-3117848778441386-5613-3278-5194-1591846728.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=gLNtDq_LaNwziN9k7WOpbA', ' Hà Nội  Thoa chút kem nền, tháo cặp kính 4 đi-ốp để lộ đôi mắt nâu, Quỳnh bắt tay thực hiện bộ ảnh mẫu đầu tiên.  ', '0000-00-00 00:00:00'),
('275105949', 1, 9, '', 'Honda triệu hồi 1,4 triệu xe ô tô trên toàn thế giới vì lỗi bơm xăng', 'https://dantri.com.vn/o-to-xe-may/honda-trieu-hoi-14-trieu-xe-o-to-tren-toan-the-gioi-vi-loi-bom-xang-20200610085531969.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/honda-1591751270788.jpg', '                      (Dân trí) &nbsp;- Các xe bị triệu hồi đợt này gồm: Honda Accord, Civic Hatchback, Civic Type R, HR-V, Fit, và Insight, cùng các xe Acura RDX, RLX, RLX Sport Hybrid, và NSX.                                                        &gt;&gt;&nbsp;                                                                   Hàng triệu xe dùng bơm nhiên liệu của Denso cần được triệu hồi                                                                                                                &gt;&gt;&nbsp;                                                                   Bơm xăng chết đột ngột có nguy cơ mất an toàn thế nào?                                                                          ', '0000-00-00 00:00:00'),
('297166323', 0, 6, '', 'Bệnh nhân phi công ngồi xe lăn phơi nắng', 'https://vnexpress.net/benh-nhan-phi-cong-ngoi-xe-lan-phoi-nang-4114129.html', 'https://i1-suckhoe.vnecdn.net/2020/06/11/BN9111061-1591866299-2498-1591866332.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=C2FISnsTbYgYa8JZaR7Lvw', ' TP HCM  Sáng 11/6 các bác sĩ Bệnh viện Chợ Rẫy lần đầu tiên đưa bệnh nhân phi công ra ngoài ban công để phơi nắng. Bệnh nhân khỏe mạnh, ngồi vững vàng trên xe lăn.  ', '0000-00-00 00:00:00'),
('30937387', 0, 6, '', 'Một thuyền viên về từ Malaysia nhiễm nCoV', 'https://vnexpress.net/mot-thuyen-vien-ve-tu-malaysia-nhiem-ncov-4114800.html', NULL, ' 18h ngày 12/6, Bộ Y tế ghi nhận thêm một ca dương tính nCoV, là thuyền viên trên tàu thủy Pacific Vũng Tàu hoạt động tại Malaysia, được cách ly ngay khi nhập cảnh. ', '0000-00-00 00:00:00'),
('324180148', 0, 6, '', 'Vì sao không hút thuốc vẫn bị tắc nghẽn phổi mạn tính?', 'https://vnexpress.net/vi-sao-khong-hut-thuoc-van-bi-tac-nghen-phoi-man-tinh-4114462.html', NULL, ' Bệnh phổi tắc nghẽn mạn tính (CODP) là tình trạng phổi suy nhược gây khó thở. 30% người không hút thuốc lá vẫn mắc căn bệnh này. ', '0000-00-00 00:00:00'),
('348146988', 0, 9, '', 'Môtô bay rơi từ trên không', 'https://vnexpress.net/moto-bay-roi-tu-tren-khong-4113869.html', NULL, 'UAE Người lái đưa chiếc Hoverbike lên độ cao khoảng 30 m rồi đột nhiên mẫu môtô bay mất thăng bằng, rơi thẳng xuống đất khi đang thử nghiệm ở Dubai.', '0000-00-00 00:00:00'),
('352436258', 0, 5, '', 'Tử hình kẻ sát hại mẹ và em trai', 'https://vnexpress.net/tu-hinh-ke-sat-hai-me-va-em-trai-4113965.html', NULL, 'Khánh Hòa Nguyễn Võ Ngọc Bảo, 20 tuổi, bị phạt tử hình sau hơn một năm sát hại mẹ và em trai trong cơn ngáo đá, rồi lấy tài sản lẩn trốn.', '0000-00-00 00:00:00'),
('365585578', 3, 4, '', 'Android 11 Beta chính thức ra mắt, nhiều tính năng hơn', 'https://vietnamnet.vn/vn/cong-nghe/san-pham/android-11-beta-chinh-thuc-ra-mat-nhieu-tinh-nang-hon-648173.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/13/android-11-beta-chinh-thuc-ra-mat-nhieu-tinh-nang-hon-1-240x160.jpg', 'Google vừa chính thức ra mắt phiên bản Android 11 Beta dành cho tất cả người dùng. Điều đáng quan tâm là Android 11 có những cập nhật mới nào?', '0000-00-00 00:00:00'),
('377793007', 0, 3, '', 'Cổng dịch vụ công hiệu quả khi đầu tư đồng bộ', 'https://vnexpress.net/cong-dich-vu-cong-hieu-qua-khi-dau-tu-dong-bo-4114585-tong-thuat.html', 'https://i1-kinhdoanh.vnecdn.net/2020/06/12/abc-1591955057-1591955070-5390-1591955084.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=XUZfPqe90BDWBTrxuTZtUA', 'Xe bị phạt nguội song địa phương chưa vào cổng dịch vụ công nên người dân phải đóng tiền mặt, lãnh đạo TP HCM đưa ví dụ để nhấn mạnh sự cần thiết tính đồng bộ.', '0000-00-00 00:00:00'),
('408231058', 3, 3, '', 'Lan đột biến gene có giá lên tới cả chục tỷ đồng?', 'https://vietnamnet.vn/vn/kinh-doanh/thi-truong/lan-dot-bien-gene-648516.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/15/lan-dot-bien-3-240x160.jpg', 'Trong mấy ngày qua, giới chơi lan được phen sửng sốt trước thông tin về hai cuộc giao dịch lan đột biến gene với giá từ 5 tỉ đồng đến cả chục tỉ đồng.', '0000-00-00 00:00:00'),
('437420952', 3, 0, '', 'Dự báo thời tiết 13/6, miền Bắc đón mưa lớn sau những ngày nắng nóng', 'https://vietnamnet.vn/vn/thoi-su/du-bao-thoi-tiet-ngay-13-6-2020-mien-bac-don-mua-lon-tu-chieu-toi-nay-648544.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/16/du-bao-thoi-tiet-13-6-mien-bac-don-mua-lon-sau-nhung-ngay-nang-nong-240x160.jpg', 'Từ chiều tối và đêm nay (13/6), Bắc Bộ có mưa vừa, mưa to, vùng núi và trung du có mưa to đến rất to. Từ ngày mai nắng nóng kết thúc ở các tỉnh Bắc Bộ và Thanh Hóa.', '0000-00-00 00:00:00'),
('441462916', 0, 4, '', 'Microsoft ngừng bán phần mềm nhận diện khuôn mặt cho cảnh sát', 'https://vnexpress.net/microsoft-ngung-ban-phan-mem-nhan-dien-khuon-mat-cho-canh-sat-4114472.html', 'https://i1-sohoa.vnecdn.net/2020/06/12/5b141f8f1ae66220008b479d-15919-8177-1606-1591934953.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=w43tDBwZcpqrkB63LfPigw', NULL, '0000-00-00 00:00:00'),
('442329023', 0, 2, '', 'Học phí 10 đại học Y, Dược hàng đầu thế giới', 'https://vnexpress.net/hoc-phi-10-dai-hoc-y-duoc-hang-dau-the-gioi-4113911.html', NULL, 'Học phí một năm ngành Y khoa tại Đại học Cambridge lên 55.272 bảng Anh (1,6 tỷ đồng), Đại học Harvard 63.400 USD (1,5 tỷ đồng).', '0000-00-00 00:00:00'),
('445725020', 1, 1, '', 'Viết cho tháng 6: Thanh xuân tựa một cơn mơ…', 'https://dantri.com.vn/nhip-song-tre/viet-cho-thang-6-thanh-xuan-tua-mot-con-mo-20200608224923795.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/08/viet-cho-thang-6-thanh-xuan-tua-mot-con-modocx-1591631328076.jpeg', '                      (Dân trí) &nbsp;- Thanh xuân thật đẹp nhưng cũng lắm dở dang, tiếc nuối. Rời khỏi sân ga tuổi trẻ năm ấy, ngoái đầu nhìn lại thấy thanh xuân tựa một cơn mơ, thức dậy rồi vẫn đắm chìm mãi...                  ', '0000-00-00 00:00:00'),
('463287864', 0, 6, '', 'Hoá trị làm giảm khả năng sinh sản của nam giới', 'https://vnexpress.net/suc-khoe/hoa-tri-lam-giam-kha-nang-sinh-san-cua-nam-gioi-4105483.html', 'https://i1-suckhoe.vnecdn.net/2020/06/09/671185336-h-1-1591695633-5900-1591695692.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=MVBL6agUjwi80obr3zombw', ' Một số thuốc hóa trị có thể làm giảm lượng tinh trùng, suy yếu khả năng thụ tinh nhưng không làm giảm ham muốn tình dục. ', '0000-00-00 00:00:00'),
('527239233', 0, 4, '', 'iPhone 12 có chín phiên bản', 'https://vnexpress.net/iphone-12-co-chin-phien-ban-4114412.html', 'https://i1-sohoa.vnecdn.net/2020/06/12/iphone12proeverythingapplepro-1800-2381-1591930732.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=EJL76TF0Dblk_Krfrcyc2A', NULL, '0000-00-00 00:00:00'),
('537860867', 3, 5, '', 'Tạm giữ nam sinh hàng xóm vì nghi sát hại bé trai 5 tuổi', 'https://vietnamnet.vn/vn/phap-luat/ho-so-vu-an/tam-giu-nam-sinh-hang-xom-vi-nghi-sat-hai-be-trai-5-tuoi-647749.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/09/23/tam-giu-nam-sinh-hang-xom-vi-nghi-sat-hai-be-trai-5-tuoi-240x160.jpg', 'Công an đang tạm giữ một nam sinh lớp 11 để điều tra cái chết của bé trai 5 tuổi trong ngôi nhà hoang ở Nghệ An', '0000-00-00 00:00:00');
INSERT INTO `news` (`news_id`, `source_id`, `topic_id`, `sub_cid`, `title`, `source`, `img`, `summary`, `dtime`) VALUES
('577470474', 0, 4, '', 'Việt Nam tăng 5 bậc về tốc độ mạng', 'https://vnexpress.net/viet-nam-tang-5-bac-ve-toc-do-mang-4114280.html', 'https://i1-sohoa.vnecdn.net/2020/06/11/internet4g81101590490360-15918-1196-6104-1591893425.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=Jq_pVQ3p7RM3VKKdea9QmA', 'Tốc độ mạng tại Việt Nam trong tháng tư tăng 5 bậc so với tháng ba, xếp thứ 59 trên thế giới.', '0000-00-00 00:00:00'),
('595644511', 0, 6, '', 'Cẩn trọng đột quỵ nhiệt mùa nóng', 'https://vnexpress.net/can-trong-dot-quy-nhiet-mua-nong-4113275.html', NULL, ' Đột quỵ nhiệt là một trong những cấp cứu thường gặp mùa nóng, gây tổn thương não, cơ bắp và các cơ quan nội tạng nếu không được sơ cứu kịp thời. ', '0000-00-00 00:00:00'),
('597783058', 0, 1, '', 'Kích cầu du lịch Tây Bắc', 'https://vnexpress.net/kich-cau-du-lich-tay-bac-4114640.html', NULL, 'Các doanh nghiệp giảm giá kích cầu du lịch nhưng phải đảm bảo chất lượng dịch vụ để thu hút du khách đến Tây Bắc.', '0000-00-00 00:00:00'),
('599470022', 3, 4, '', 'Cách tải và cài đặt Android 11 pubic beta cho điện thoại Pixel', 'https://vietnamnet.vn/vn/cong-nghe/ung-dung/cach-tai-va-cai-dat-android-11-pubic-beta-cho-dien-thoai-pixel-648304.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/17/cach-tai-va-cai-dat-android-11-pubic-beta-cho-dien-thoai-pixel-240x160.jpg', 'Google vừa chính thức phát hành phiên bản Android 11 public beta, và bạn có thể cài đặt nó dễ dàng chỉ sau vài cú chạm.', '0000-00-00 00:00:00'),
('600558376', 0, 9, '', 'Ôtô quay đầu giữa cầu', 'https://vnexpress.net/oto-quay-dau-giua-cau-4114094.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/quaydau-1591863119-1591863130-3407-1591863163.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=p9dVPxJ0AcygOjIPDDJfwA', '    ', '0000-00-00 00:00:00'),
('636740200', 1, 5, '', 'Hà Nội: Giải quyết mâu thuẫn bằng dao, 1 người chết, 2 người bị thương', 'https://dantri.com.vn/phap-luat/ha-noi-giai-quyet-mau-thuan-bang-dao-1-nguoi-chet-2-nguoi-bi-thuong-20200610095724717.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/luongtruongson-1591757780794.jpg', '                      (Dân trí) &nbsp;- Bị 3 thanh niên lao vào đấm, đá, Lương Trường Sơn rút dao nhọn đâm lại, khiến một người tử vong, hai người bị thương.                  ', '0000-00-00 00:00:00'),
('647595937', 0, 8, '', 'Lê Khánh, Huỳnh Đông đóng cặp', 'https://vnexpress.net/le-khanh-huynh-dong-dong-cap-4114377.html', 'https://i1-giaitri.vnecdn.net/2020/06/12/lekhanh-1591950763-7067-1591951227.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=UxIV_xfQxaZxB-Fd5uUiPQ', '    ', '0000-00-00 00:00:00'),
('669933401', 0, 6, '', 'Người già đổ vào viện do nắng nóng', 'https://vnexpress.net/nguoi-gia-do-vao-vien-do-nang-nong-4113736.html', 'https://i1-suckhoe.vnecdn.net/2020/06/11/DSC0117ok-1591867038-3949-1591867055.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=7cwx2v1xRNN1ZorpVU4sGw', ' Hà Nội  Số bệnh nhân vào Bệnh viện Lão khoa Trung ương cấp cứu những ngày qua tăng 150% so với tuần trước. ', '0000-00-00 00:00:00'),
('670715129', 3, 0, '', 'Mạng xã hội nhiều thông tin nhưng không thay thế được báo chính thống', 'https://vietnamnet.vn/vn/thoi-su/chinh-tri/mang-xa-hoi-nhieu-thong-tin-nhung-khong-thay-the-duoc-bao-chinh-thong-648584.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/18/a-3-240x160.jpg', 'Chủ tịch Quốc hội Nguyễn Thị Kim Ngân nhấn mạnh như vậy tại cuộc gặp mặt, chúc mừng 187 nhà báo tiêu biểu, đại diện cho những người làm báo cả nước diễn ra vào tối nay (12/6).  ', '0000-00-00 00:00:00'),
('682273695', 0, 2, '', 'Nam sinh lớp 11 gặp nhà phát triển game Flappy Bird', 'https://vnexpress.net/nam-sinh-lop-11-gap-nha-phat-trien-game-flappy-bird-4114608.html', 'https://i1-vnexpress.vnecdn.net/2020/06/12/477-1591945497-1591950253-5863-1591950684.png?w=220&h=132&q=100&dpr=1&fit=crop&s=_nSk0sKeo1fZtrrGOzsfbA', 'Nhận học bổng Language of Future, Nguyễn Hoàng Minh (lớp 11, Hà Nội) có 6 tháng học lập trình tại FUNiX và được gặp nhà tài trợ học bổng Nguyễn Hà Đông.', '0000-00-00 00:00:00'),
('697776426', 3, 0, '', 'Quốc hội chính thức miễn nhiệm bà Nguyễn Thanh Hải', 'https://vietnamnet.vn/vn/thoi-su/chinh-tri/quoc-hoi-chinh-thuc-mien-nhiem-ba-nguyen-thanh-hai-648068.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/08/hai-7-akdn-240x160.jpg', 'Với 443 phiếu tán thành, Quốc hội đã biểu quyết thông qua Nghị quyết đề nghị miễn nhiệm chức vụ ủy viên UB Thường vụ Quốc hội với bà Nguyễn Thanh Hải.', '0000-00-00 00:00:00'),
('714496548', 3, 5, '', 'Chị em ‘nữ quái’ ở Hà Nội lừa đảo 38 người, chiếm đoạt tiền tỷ', 'https://vietnamnet.vn/vn/phap-luat/ky-su-phap-dinh/chi-em-nu-quai-o-ha-noi-lua-dao-38-nguoi-chiem-doat-tien-ty-647707.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/10/08/chi-em-nu-quai-o-ha-noi-lua-dao-38-nguoi-chiem-doat-tien-ty-240x160.jpg', 'Hai chị em nữ quái ở Hà Nội đã lừa đảo 38 người nhẹ dạ để chiếm đoạt hàng tỷ đồng.', '0000-00-00 00:00:00'),
('725747955', 1, 0, '', 'Hà Nội: Học sinh lớp 4 bị bỏ quên trên xe ô tô đưa đón', 'https://dantri.com.vn/xa-hoi/ha-noi-hoc-sinh-lop-4-bi-bo-quen-tren-xe-o-to-dua-don-20200610120932663.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/boquenhocsinh-1-1591765637360.jpg', '                      (Dân trí) &nbsp;- Một nam sinh lớp 4 trường tiểu học Nam Từ Liêm (Hà Nội) bị bỏ quên trên xe ô tô đưa đón học sinh. May mắn, cháu bé tỉnh dậy, đập cửa, nhờ người dân trợ giúp đưa ra ngoài.                                                        &gt;&gt;&nbsp;                                                                   Xét xử phúc thẩm vụ học sinh trường Gateway tử vong trên xe đưa đón                                                                                                                &gt;&gt;&nbsp;                                                                   Vụ bé trường Gateway tử vong: Vì sao cả 3 bị cáo gửi đơn kháng cáo?                                                                          ', '0000-00-00 00:00:00'),
('772185648', 3, 0, '', 'Thủ tướng bổ nhiệm nhiều nhân sự cao cấp Bộ Quốc phòng', 'https://vietnamnet.vn/vn/thoi-su/chinh-tri/thu-tuong-bo-nhiem-nhieu-nhan-su-cao-cap-bo-quoc-phong-648340.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/20/thu-tuong-bo-nhiem-nhieu-nhan-su-cao-cap-bo-quoc-phong-240x160.jpg', 'Thủ tướng Nguyễn Xuân Phúc đã ký các quyết định bổ nhiệm nhân sự cao cấp Bộ Quốc phòng.', '0000-00-00 00:00:00'),
('784585114', 1, 9, '', 'Mẫu xe đã bị Ford &#x27;khai tử&#x27; tại Việt Nam có bản nâng cấp 2020', 'https://dantri.com.vn/o-to-xe-may/mau-xe-da-bi-ford-khai-tu-tai-viet-nam-co-ban-nang-cap-2020-20200609222727423.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/2020-fordfiesta-1591715561857.jpg', '                      (Dân trí) &nbsp;- Ford vừa trình làng Fiesta 2020 với hệ thống truyền động mới được giới thiệu là giúp xe tiêu thụ chỉ 4 lít cho 100km. Tuy nhiên, mẫu xe này hiện không còn được bán ở Việt Nam.                                                        &gt;&gt;&nbsp;                                                                   Ford Ranger và Everest thế hệ mới sẽ có thêm bản Ecoboost 2.3L hybrid                                                                                                                &gt;&gt;&nbsp;                                                                   Mỹ: Ford lại đóng cửa hai nhà máy vì có công nhân nhiễm Covid-19                                                                                                                &gt;&gt;&nbsp;                                                                   Ford trả lời cơ quan bảo vệ người tiêu dùng về động cơ diesel 2.0L chảy dầu                                                                          ', '0000-00-00 00:00:00'),
('786177031', 3, 3, '', 'Trên 100 doanh nghiệp bắt tay kích cầu du lịch Tây Bắc', 'https://vietnamnet.vn/vn/kinh-doanh/dau-tu/tren-100-doanh-nghiep-bat-tay-kich-cau-du-lich-tay-bac-648540.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/16/du-lich-tay-bac-1-240x160.jpg', 'Hơn 100 doanh nghiệp du lịch trên cả nước và đại diện Hiệp hội du lịch các khu vực, lãnh đạo 8 tỉnh Tây Bắc đã bắt tay kích cầu du lịch nhằm phát triển du lịch khu vực này.', '0000-00-00 00:00:00'),
('790004038', 1, 3, '', 'Cuộc săn lùng kho báu 5 triệu USD kéo dài 10 năm cuối cùng đã kết thúc', 'https://dantri.com.vn/kinh-doanh/cuoc-san-lung-kho-bau-5-trieu-usd-keo-dai-10-nam-cuoi-cung-da-ket-thuc-20200610091440625.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/1062-docx-1591754915673.jpeg', '                      (Dân trí) &nbsp;- Một cuộc tìm kiếm kho báu kéo dài một thập kỷ thu hút khoảng 350.000 thợ săn kho báu tại khu vực phía Tây của nước Mỹ đã kết thúc.                                                        &gt;&gt;&nbsp;                                                                   Thợ săn kho báu tìm thấy đồng tiền hiếm từ 1.000 năm trước                                                                                                                &gt;&gt;&nbsp;                                                                   \"Thợ săn” cổ vật nghiệp dư vớ được kho báu 300 tỷ đồng, lập kỷ lục Guinness                                                                                                                &gt;&gt;&nbsp;                                                                   Đang trên đường đi làm, người đàn ông “vấp” phải kho báu 4.500 tuổi                                                                          ', '0000-00-00 00:00:00'),
('806720824', 0, 8, '', 'Khả Ngân hở ngực với nội y ren', 'https://vnexpress.net/kha-ngan-ho-nguc-voi-noi-y-ren-4113856.html', 'https://i1-giaitri.vnecdn.net/2020/06/11/kha-ngan-khoe-noi-y-sexy.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=T4l_zkkbg8mzQhxFekQmXg', ' Diễn viên Khả Ngân theo đuổi mốt diện nội y như áo thường trong bộ ảnh thời trang. ', '0000-00-00 00:00:00'),
('806909387', 0, 4, '', 'TSMC không cần Huawei', 'https://vnexpress.net/tsmc-khong-can-huawei-4113186.html', 'https://i1-sohoa.vnecdn.net/2020/06/10/3118219eaa2911eabf1b7541df8028-8667-3509-1591758309.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=VA2JHigNFrIa_zQv5zynIg', 'TSMC cho rằng kể cả khi không có Huawei, công ty vẫn không bị ảnh hưởng do có sự bù đắp bởi các đối tác khác.', '0000-00-00 00:00:00'),
('809881981', 3, 3, '', 'Khu vườn 10.000 giò làn rừng, gia tài bạc tỷ của thầy giáo trẻ', 'https://vietnamnet.vn/vn/kinh-doanh/thi-truong/thay-giao-gia-lai-trong-vuon-lan-rung-10-000-gio-648626.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/13/08/lan-rung-140x93.jpg', 'Những ngày này giá thịt lợn hơi đang lao dốc, giảm khoảng 10.000 đồng/kg so với thời điểm cuối tháng 5. Song, mặt hàng này tại chợ nhất quyết không chịu giảm giá dù ế ẩm.', '0000-00-00 00:00:00'),
('818561467', 0, 4, '', 'Taxi bay 145 km/h đi vào hoạt động', 'https://vnexpress.net/taxi-bay-145-km-h-di-vao-hoat-dong-4112554.html', 'https://i1-vnexpress.vnecdn.net/2020/06/11/VNETaxi-1591873060-3200-1591873097.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=aU9zuV1Be2LiNC-DoXbLxg', 'Trung Quốc Mẫu taxi bay EHang sẽ chở hàng hóa cồng kềnh tới nhà dân sau khi được cấp phép thử nghiệm dịch vụ.', '0000-00-00 00:00:00'),
('871065811', 3, 0, '', 'Thủ tướng: Phải rút ví hàng chục triệu nộp phạt mới biết bảo vệ môi trường', 'https://vietnamnet.vn/vn/thoi-su/moi-truong/thu-tuong-phai-rut-vi-hang-chuc-trieu-nop-phat-moi-biet-bao-ve-moi-truong-648174.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/15/thu-tuong-phai-rut-vi-hang-chuc-trieu-nop-phat-moi-biet-bao-ve-moi-truong-1-240x160.jpg', 'Thảo luận tại tổ về dự thảo luật Bảo vệ môi trường (sửa đổi) vào sáng nay (11/6), Thủ tướng Nguyễn Xuân Phúc lưu ý, vấn đề môi trường là thách thức không chỉ riêng Việt Nam mà cả toàn cầu.', '0000-00-00 00:00:00'),
('898202324', 0, 8, '', 'Nhóm Lady Antebellum đổi tên để tránh gợi nhớ thời nô lệ', 'https://vnexpress.net/nhom-lady-antebellum-doi-ten-de-tranh-goi-nho-thoi-no-le-4114493.html', 'https://i1-giaitri.vnecdn.net/2020/06/12/ladya-1591934971-4280-1591935042.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=s--02iDzAqKKVlrYljZMCQ', ' Mỹ  Nhóm nhạc Lady Antebellum đổi tên vì từ \"Antebellum\" mang nghĩa \"trước nội chiến\", gợi nhớ thời kỳ nô lệ. ', '0000-00-00 00:00:00'),
('901877917', 0, 3, '', 'Cánh tay phải của người giàu nhất châu Á', 'https://vnexpress.net/canh-tay-phai-cua-nguoi-giau-nhat-chau-a-4114575.html', 'https://i1-kinhdoanh.vnecdn.net/2020/06/12/manojmodi-1591939403-5022-1591939572.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=93d-r5sV83mHF5LFJ_FkDA', 'Manoj Modi không có chức danh hào nhoáng và chẳng nổi tiếng, nhưng là một trong những người quyền lực nhất đế chế Reliance Industries của tỷ phú Mukesh Ambani.', '0000-00-00 00:00:00'),
('90598192', 0, 6, '', 'Hy vọng ngừa Covid-19 từ vaccine bại liệt', 'https://vnexpress.net/hy-vong-ngua-covid-19-tu-vaccine-bai-liet-4114422.html', NULL, ' Mỹ  Vaccine bại liệt đường uống có thể được dùng để ngừa Covid-19, trong khi chờ các nhà khoa học tìm ra phương án đặc hiệu và tối ưu.  ', '0000-00-00 00:00:00'),
('906494606', 1, 1, '', 'Tại sao cha mẹ nên ôm con thường xuyên?', 'https://dantri.com.vn/tinh-yeu-gioi-tinh/tai-sao-cha-me-nen-om-con-thuong-xuyen-20200610103715261.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/tai-sao-cha-me-nen-om-con-thuong-xuyen-1-1591759884955.jpg', '                      Những cái ôm mỗi ngày có thể giúp trẻ ít đau ốm, thông minh hơn và hạnh phúc hơn.                  ', '0000-00-00 00:00:00'),
('929927262', 3, 1, '', 'Hai cha con bật khóc khi ăn món mẹ nấu trước khi qua đời', 'https://vietnamnet.vn/vn/doi-song/gia-dinh/bat-khoc-truoc-mon-an-cuoi-cung-me-de-lai-cach-day-5-nam-647913.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/10/14/bat-khoc-truoc-mon-an-cuoi-cung-cua-nguoi-me-qua-doi-cach-day-5-nam-240x160.jpg', 'Năm năm trước, người mẹ khi vừa nấu xong món thịt kho thì đột quỵ không qua khỏi. Chồng và con gái của bà bảo quản đông lạnh món ăn cuối cùng này, gần đây mới đem ra thưởng thức lại.  ', '0000-00-00 00:00:00'),
('932865489', 0, 1, '', 'Ba người đàn ông ra đảo hoang làm Robinson', 'https://vnexpress.net/ba-nguoi-dan-ong-ra-dao-hoang-lam-robinson-4111752.html', 'https://i1-giadinh.vnecdn.net/2020/06/07/robinson-1-jpeg-1591508592-5805-1591508783.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=lMg2eopQD6r5RJjrkqAusw', 'Ba người đàn ông bắt đầu cuộc sống như những người rừng thứ thiệt, họ vào hang đá ở trú mưa, tự bắt cá rồi nướng ăn, lấy lá cây làm quần áo.', '0000-00-00 00:00:00'),
('935875808', 1, 3, '', 'Vietjet lên tiếng vụ có rắn trên máy bay', 'https://dantri.com.vn/kinh-doanh/vietjet-len-tieng-vu-co-ran-tren-may-bay-20200609142445710.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/vietjet-1591687251334.jpg', '                      (Dân trí) &nbsp;- Hãng hàng không Vietjet xác nhận có rắn trên chuyến bay VJ162 và cho biết đây là tình huống hi hữu nhưng có thể xảy ra trong khai thác hàng không.                                                        &gt;&gt;&nbsp;                                                                   Xuất hiện rắn trên máy bay Vietjet                                                                                                                &gt;&gt;&nbsp;                                                                   Vì sao rắn có thể lên máy bay Vietjet?                                                                          ', '0000-00-00 00:00:00'),
('937325335', 3, 2, '', 'Học sinh 7.5 IELTS, giáo viên không trên mức ấy sao dạy được học trò?', 'https://vietnamnet.vn/vn/giao-duc/nguoi-thay/ho-c-sinh-7-5-ielts-gia-o-vie-n-kho-ng-tre-n-mu-c-a-y-sao-da-y-du-o-c-ho-c-tro-648354.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/22/hoc-sinh-dat-7-5-ielts-giao-vien-khong-tren-muc-ay-sao-day-duoc-hoc-tro-140x93.jpg', NULL, '0000-00-00 00:00:00'),
('946521472', 1, 8, '', 'Dàn người đẹp U50 - U60 đua nhau khoe ảnh &quot;hot&quot;', 'https://dantri.com.vn/giai-tri/dan-nguoi-dep-u-50-u-60-dua-nhau-khoe-anh-hot-20200610064939894.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/10/2-1591746333664.jpg', '                      (Dân trí) &nbsp;- Dù đã ngũ tuần, lục tuần nhưng nhiều người đẹp nổi tiếng vẫn sở hữu dáng vóc đáng ngưỡng mộ.                                                        &gt;&gt;&nbsp;                                                                   Ngỡ ngàng với vẻ trẻ đẹp của \"sao\" U50 Kate Beckinsale                                                                                                                &gt;&gt;&nbsp;                                                                   Choáng váng với vẻ trẻ đẹp của 3 mỹ nhân U50, U60                                                                          ', '0000-00-00 00:00:00'),
('96005569', 1, 1, '', 'Hãy “nâng lên đặt xuống” 5 điều sau trước khi quyết định ly hôn', 'https://dantri.com.vn/tinh-yeu-gioi-tinh/hay-nang-len-dat-xuong-5-dieu-sau-truoc-khi-quyet-dinh-ly-hon-20200609101733680.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/screen-shot-20200609-at-101153-am-1591672364273.png', '                      (Dân trí) &nbsp;- Thời này, chuyện y hôn có vẻ không còn nặng nề như trước. Ly hôn chỉ có nghĩa là kết thúc một cuộc hôn nhân, bọn trẻ sẽ sống với một trong hai người và thỉnh thoảng tới thăm người còn lại.                                                        &gt;&gt;&nbsp;                                                                   Ly hôn rồi vẫn ghen với bồ của chồng cũ                                                                                                                &gt;&gt;&nbsp;                                                                   Sẽ hối tiếc sau ly hôn nếu bạn chưa trả lời được 3 câu hỏi sau                                                                                                                &gt;&gt;&nbsp;                                                                   “Con gái, nếu con muốn ly hôn…”                                                                          ', '0000-00-00 00:00:00'),
('964614731', 3, 0, '', 'Việt Nam tôn trọng và đảm bảo quyền tự do tôn giáo', 'https://vietnamnet.vn/vn/thoi-su/chinh-tri/viet-nam-ton-trong-va-dam-bao-quyen-tu-do-ton-giao-648294.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/11/17/viet-nam-ton-trong-va-dam-bao-quyen-tu-do-ton-giao-240x160.jpg', 'Việt Nam không ngừng nỗ lực để hoàn thiện hệ thống pháp luật về tôn giáo, chính sách tín ngưỡng tôn giáo trong đó có việc thông qua Luật Tín ngưỡng tôn giáo.  ', '0000-00-00 00:00:00'),
('968411278', 3, 3, '', 'Giá xăng tăng gần 1.000 đồng/lít từ 15h chiều 12/6', 'https://vietnamnet.vn/vn/kinh-doanh/thi-truong/xang-tang-manh-hon-1-000-dong-lit-648500.html', 'https://vnn-imgs-f.vgcloud.vn/2020/06/12/14/xang-240x160.jpg', 'Với mức tăng gần 1.000 đồng/lít, từ 15h chiều nay (12/6), giá xăng RON92 điều chỉnh tăng lên 13.390 đồng/lít, xăng RON95-III tăng lên 14.080 đồng/lít.', '0000-00-00 00:00:00'),
('968614418', 0, 7, '', 'Bình Dương thắng dễ Hải Phòng', 'https://vnexpress.net/binh-duong-thang-de-hai-phong-4114152-tong-thuat.html', 'https://i1-thethao.vnecdn.net/2020/06/11/d45cd5aea1a65cf805b7-159188144-9175-3922-1591881525.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=xiL-g_2M1oSMnRouU4TBlg', ' Tiến Linh và Văn Vũ góp công lớn giúp Bình Dương thắng Hải Phòng 5-0 ở vòng 4 V-League chiều 11/6. ', '0000-00-00 00:00:00'),
('976919874', 0, 4, '', 'Bkav sắp ra điện thoại 4G giá dưới một triệu đồng', 'https://vnexpress.net/bkav-sap-ra-dien-thoai-4g-gia-duoi-mot-trieu-dong-4112975.html', 'https://i1-sohoa.vnecdn.net/2020/06/10/bkav-1328-1591766164.jpg?w=300&h=180&q=100&dpr=1&fit=crop&s=ChlxnwD3gi_twO8zLEpnog', 'C85 sẽ là điện thoại 4G với giá bán dưới một triệu đồng đầu tiên của Bkav. Sản phẩm dự kiến bán ra trong tháng 7.', '0000-00-00 00:00:00'),
('979047331', 1, 4, '', 'Thủ thuật biến smartphone thành chuột và bàn phím không dây cho máy tính', 'https://dantri.com.vn/suc-manh-so/thu-thuat-bien-smartphone-thanh-chuot-va-ban-phim-khong-day-cho-may-tinh-20200609020355717.htm', 'https://icdn.dantri.com.vn/zoom/260_200//2020/06/09/wifi-mouse-av-1591642908702.gif', '                      (Dân trí) &nbsp;- Bài viết dưới đây sẽ hướng dẫn cách thức để biến chiếc smartphone của bạn thành chuột và bàn phím không dây, để có thể sử dụng smartphone như một điều khiển từ xa cho máy tính.                                                        &gt;&gt;&nbsp;                                                                   Thủ thuật kiểm tra mạng Wifi bị “câu trộm” nổi bật tuần qua                                                                                                                &gt;&gt;&nbsp;                                                                   Mẹo hay giúp dễ dàng xóa bỏ các chi tiết thừa không mong muốn trên ảnh                                                                          ', '0000-00-00 00:00:00'),
('979085082', 0, 6, '', 'Nuôi sống bé sinh non 24 tuần 5 ngày, nặng 550 gram', 'https://vnexpress.net/nuoi-song-be-sinh-non-24-tuan-5-ngay-nang-550-gram-4113784.html', 'https://i1-suckhoe.vnecdn.net/2020/06/11/h1-tam-anh-final-4828-15918429-4133-2530-1591844528.jpg?w=220&h=132&q=100&dpr=1&fit=crop&s=VY4GaT5-9ks_oSkdtw22tQ', ' Bé sinh non 24 tuần 5 ngày, nặng 550 gram vừa khỏe mạnh xuất viện, sau gần 4 tháng chăm sóc tích cực tại Bệnh viện đa khoa Tâm Anh, Hà Nội. ', '0000-00-00 00:00:00'),
('993481525', 0, 0, '', 'Biển Đông xuất hiện áp thấp nhiệt đới', 'https://vnexpress.net/bien-dong-xuat-hien-ap-thap-nhiet-doi-4114434.html', NULL, 'Sáng 12/6, áp thấp nhiệt đới đã vượt qua Philippines vào biển Đông, sức gió tối đa 60 km/h và có thể mạnh lên thành bão. ', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_source`
--

CREATE TABLE `news_source` (
  `source_id` int(10) NOT NULL,
  `source_name` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_source`
--

INSERT INTO `news_source` (`source_id`, `source_name`, `source`, `description`) VALUES
(0, 'vnexpress', 'https://vnexpress.net/', 'VNExpress'),
(1, 'dantri', 'https://dantri.com.vn/', 'Dân Trí'),
(2, 'thanhnien', 'https://thanhnien.vn/', 'Thanh Niên'),
(3, 'vietnamnet', 'https://vietnamnet.vn/', 'Vietnamnet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `saved_news`
--

CREATE TABLE `saved_news` (
  `id` int(10) NOT NULL,
  `acc_id` int(10) NOT NULL,
  `nid` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `saved_news`
--

INSERT INTO `saved_news` (`id`, `acc_id`, `nid`) VALUES
(3709, 84577, '11246679'),
(13814, 84577, '1071124618'),
(34476, 84577, '1333736223'),
(85248, 84577, '1994057887'),
(89646, 84577, '1633092838');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(2) NOT NULL,
  `topic_name` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `description`) VALUES
(0, 'CTXH', 'Chính trị xã hội'),
(1, 'DS', 'Đời sống'),
(2, 'GD', 'Giáo dục'),
(3, 'KD', 'Kinh doanh'),
(4, 'KHCN', 'Khoa học công nghệ'),
(5, 'PL', 'Pháp luật'),
(6, 'SK', 'Sức khỏe'),
(7, 'TT', 'Thể thao'),
(8, 'VH', 'Văn hóa'),
(9, 'XC', 'Xe Cộ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fav_topic`
--
ALTER TABLE `fav_topic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `news_source`
--
ALTER TABLE `news_source`
  ADD PRIMARY KEY (`source_id`);

--
-- Chỉ mục cho bảng `saved_news`
--
ALTER TABLE `saved_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
