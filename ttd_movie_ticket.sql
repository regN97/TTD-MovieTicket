-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2024 at 02:22 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttd_movie_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `roles` varchar(50) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `imageURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `roles`, `bio`, `country`, `imageURL`) VALUES
(5, 'Ryu Seung-ryong', 'Diễn viên', 'Diễn viên nổi tiếng Hàn Quốc, chuyên các vai hành động, hài.', 'Korean', 'artists/1732187748-Ryu_Seung-Ryong.png'),
(6, 'Jin Sun-kyu', 'Diễn viên', 'Nổi tiếng với các vai hài, hành động trong phim Hàn.', 'Korean', 'artists/1732187866-Jin_Sun_kyu.jpg'),
(7, 'Igor Pedroso', 'Diễn viên', 'Diễn viên Brazil, tham gia nhiều phim truyền hình và điện ảnh.', 'Brazil', 'artists/1732187906-igor_edroso.jpg'),
(8, 'Luan Brum', 'Diễn viên', 'Diễn viên trẻ Brazil, chủ yếu đóng phim điện ảnh.', 'Brazil', 'artists/1732187941-Luan_Brum.jpg'),
(9, 'J.B. Oliveira', 'Diễn viên', 'Diễn viên, giám đốc sáng tạo nổi tiếng tại Brazil.', 'Brazil', 'artists/1732187977-jb_oliveira.jpg'),
(10, 'Kim Chang-ju', 'Đạo diễn', 'Đạo diễn Hàn Quốc, chuyên phim hài và hành động.', 'Korean', 'artists/1732188104-sasuke.jpg'),
(11, 'Stephen Daldry', 'Đạo diễn', 'Stephen Daldry là một đạo diễn, nhà sản xuất người Anh, nổi bật qua các tác phẩm như The Hours và Billy Elliot. Ông đã nhận được nhiều đề cử giải thưởng, bao gồm Giải Oscar và BAFTA.', 'Anh', 'artists/1732188140-stephen_daldry.jpg'),
(12, 'Sayu Suzukawa', 'Diễn viên', 'Sayu Suzukawa là một diễn viên nổi tiếng trong các bộ phim Nhật Bản, đặc biệt là các bộ phim tình cảm.', 'Nhật Bản', 'artists/1732188176-sayu_suzukawa.jpg'),
(13, 'Akari Takaishi', 'Diễn viên', 'Akari Takaishi là một diễn viên Nhật Bản, được biết đến với các vai diễn trong các bộ phim truyền hình và điện ảnh.', 'Nhật Bản', 'artists/1732188198-akari_takaishi.jpg'),
(14, 'Alexander Karim', 'Diễn viên', 'Alexander Karim là một diễn viên người Thụy Điển gốc Ai Cập, nổi bật với các vai diễn trong các bộ phim hành động.', 'Thụy Điển', 'artists/1732188220-alexander_karim.jpg'),
(15, 'Matt Lucas', 'Diễn viên', 'Matt Lucas là một diễn viên và nhà biên kịch người Anh, nổi tiếng với các chương trình hài như Little Britain và Come Fly With Me.', 'Anh', 'artists/1732188255-matt_lucas.jpg'),
(16, 'Peter Mensah', 'Diễn viên', 'Peter Mensah là một diễn viên người Anh gốc Ghana, nổi tiếng với các vai diễn trong 300, Tears of the Sun, và series Spartacus.', 'Anh', 'artists/1732188286-peter_mensah.jpg'),
(17, 'Derek Jacobi', 'Diễn viên', 'Derek Jacobi là một diễn viên người Anh, được biết đến qua các vai diễn trong các vở kịch Shakespeare và phim truyền hình.', 'Anh', 'artists/1732188312-derek_jacobi.jpg'),
(18, 'Lior Raz', 'Diễn viên', 'Lior Raz là một diễn viên, nhà biên kịch người Israel, nổi bật qua vai diễn trong Fauda.', 'Israel', 'artists/1732188345-lior_raz.jpg'),
(19, 'Ridley Scott', 'Đạo diễn', 'Ridley Scott là một đạo diễn, nhà sản xuất người Anh, nổi tiếng với các bộ phim Alien, Gladiator, và Blade Runner. Ông là một trong những đạo diễn lớn của ngành công nghiệp điện ảnh.', 'Anh', 'artists/1732188371-ridley_scott.jpg'),
(20, 'Josh Whitehouse', 'Diễn viên', 'Josh Whitehouse là một diễn viên người Anh nổi bật trong các bộ phim như The Last Summer và Poldark.', 'Anh', 'artists/1732188413-josh_whitehouse.jpg'),
(21, 'Kemah Bob', 'Diễn viên', 'Kemah Bob là một nghệ sĩ hài và diễn viên nổi tiếng, cô thường xuất hiện trong các chương trình truyền hình và stand-up comedy.', 'Mỹ', 'artists/1732188436-kemah_bob.jpg'),
(22, 'Andrew Garfield', 'Diễn viên', 'Andrew Garfield là một diễn viên người Mỹ-British, nổi tiếng qua vai Spider-Man trong The Amazing Spider-Man và các bộ phim như The Social Network và Hacksaw Ridge.', 'Mỹ', 'artists/1732188461-andrew_garfield.jpg'),
(23, 'Florence Pugh', 'Diễn viên', 'Florence Pugh là một nữ diễn viên người Anh, được biết đến qua các bộ phim như Little Women và Midsommar.', 'Anh', 'artists/1732188485-florence_pugh.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `content` varchar(500) NOT NULL,
  `comment_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food_and_drinks`
--

CREATE TABLE `food_and_drinks` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int NOT NULL,
  `quantity` smallint UNSIGNED NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food_and_drinks`
--

INSERT INTO `food_and_drinks` (`id`, `name`, `type`, `price`, `quantity`, `imageURL`) VALUES
(1, 'asd', 'Single', 321321, 500, NULL),
(2, 'test', 'Combo', 222, 11, NULL),
(3, 'zzzzzzz', 'Combo', 123123, 500, 'foodanddrinks/1731923587-0002224_hawaii_300.png');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`, `description`) VALUES
(1, 'Hành động', 'Kịch tính, nhiều pha hành động, đấu tranh, truy đuổi, và những cảnh quay mãn nhãn.'),
(3, 'Tình cảm', 'Lãng mạn, cảm xúc, tình yêu, và quan hệ. Những câu chuyện này thường xoay quanh sự phát triển của tình cảm giữa các nhân vật, với những khoảnh khắc ngọt ngào, xúc động và đôi khi là thử thách.        ');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` tinyint UNSIGNED NOT NULL,
  `release_date` date NOT NULL,
  `language` varchar(50) NOT NULL,
  `imageURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `description`, `duration`, `release_date`, `language`, `imageURL`, `type`) VALUES
(7, 'Cười Xuyên Biên Giới', 'Câu chuyện hài hước về một cựu vận động viên bắn cung phải đối mặt với nhiều tình huống dở khóc dở cười khi đến Amazon.\r\n', 113, '2024-11-15', 'Tiếng Hàn, Tiếng Anh, Tiếng bản địa', 'movies/1732185519-cuoi_xuyen_bien_gioi.jpg', 'T13'),
(8, 'Wicked', 'Một phiên bản mới của câu chuyện phù thủy xứ Oz, tập trung vào nhân vật Elphaba.\r\n', 161, '2024-11-16', 'Tiếng Anh', 'movies/1732185680-wicked.jpg', 'K'),
(9, 'Sắc Màu Của Cảm Xúc', 'Câu chuyện cảm động về một cô gái có khả năng nhìn thấy cảm xúc của người khác và những người bạn đặc biệt của cô.\r\n', 102, '2024-11-18', 'Tiếng Nhật', 'movies/1732185759-sac_mau_cua_cam_xuc.jpg', 'P'),
(10, 'Võ Sĩ Giác Đấu 2', 'Lucius, một nô lệ giác đấu, phải tìm cách trả thù và giành lại vinh quang cho người dân Rome.\r\n', 148, '2024-11-15', 'Tiếng Anh, Tiếng Latinh', 'movies/1732185832-vo_si_giac_dau.jpg', 'T18'),
(11, 'Ozi: Phi Vụ Rừng Xanh', 'Một chú đười ươi mồ côi lên đường tìm lại gia đình và khám phá thế giới tự nhiên.\r\n', 87, '2024-11-15', 'Tiếng Anh', 'movies/1732185890-ozi_phi_vu_rung_xanh.jpg', 'P'),
(12, 'Đôi Bạn Học Yêu', 'Câu chuyện tình yêu lãng mạn giữa một cô gái tự do và một chàng trai mang trong mình bí mật.\r\n', 118, '2024-11-11', 'Tiếng Hàn', NULL, 'T18'),
(13, 'Red One: Mật Mã Đỏ', 'Một cuộc phiêu lưu hài hước và hành động khi Ông già Noel bị bắt cóc.\r\n', 125, '2024-11-08', 'Tiếng Anh', 'movies/1732186054-red_one.jpg', 'K'),
(14, 'Công Chúa Nổi Loạn: Nhiệm Vụ Giải Cứu Hoàng Gia', 'Một công chúa mạnh mẽ tự mình giải cứu bản thân khỏi tên phù thủy xấu xa.\r\n', 95, '2024-11-12', 'Tiếng Anh', 'movies/1732186102-cong_chua_noi_loan.jpg', 'P'),
(15, 'Hồn Ma Theo Đuổi', 'Một cặp đôi bị ám ảnh bởi những hồn ma sau một tai nạn giao thông.\r\n', 97, '2024-11-14', 'Tiếng Thái', 'movies/1732186163-hon_ma_theo_duoi.jpg', 'T18'),
(16, 'Ngày Ta Đã Yêu', 'Câu chuyện tình yêu kéo dài 10 năm của một cặp đôi, từ lúc yêu nhau đến khi đối mặt với những biến cố cuộc sống.\r\n', 108, '2024-11-18', 'Tiếng Anh', 'movies/1732186220-ngay_ta_yeu_nhau.jpg', 'T18'),
(17, 'Cu Li Không Bao Giờ Khóc', 'Một bà lão về hưu và cô cháu gái đối mặt với những vấn đề gia đình và quá khứ.\r\n', 91, '2024-11-15', 'Tiếng Việt', 'movies/1732186264-cu_li_khong_bao_gio_khoc.jpg', 'T16'),
(18, 'Kẻ Đóng Thế', 'Một diễn viên đóng thế cố gắng vực dậy sự nghiệp và hàn gắn mối quan hệ với con gái.\r\n', 114, '2024-11-14', 'Tiếng Quảng Đông', 'movies/1732186304-ke_dong_the.jpg', 'T13'),
(19, 'Ngày Xưa Có Một Chuyện Tình', 'Câu chuyện tình bạn và tình yêu của ba người bạn từ thuở ấu thơ đến khi trưởng thành.\r\n', 135, '2024-11-15', 'Tiếng Việt', 'movies/1732186487-ngay_xua_co_mot_chuyen_tinh.jpg', 'T16'),
(20, 'Đừng Buông Tay', 'Một gia đình cố gắng sinh tồn trong một thế giới hậu tận thế đầy nguy hiểm.\r\n', 101, '2024-11-08', 'Tiếng Anh', 'movies/1732186551-dung_buong_tay.jpg', 'T18'),
(21, 'Thần Dược', 'Một nữ diễn viên tìm kiếm sự trẻ trung vĩnh cửu bằng cách sử dụng một loại thuốc bí ẩn.\r\n', 139, '2024-11-16', 'Tiếng Anh', 'movies/1732186615-than_duoc.jpg', 'T18'),
(22, 'Ai Oán Trong Vườn Xuân', 'Một người phụ nữ đối mặt với những điều kỳ lạ và rùng rợn sau khi đến thăm một ngôi biệt thự cũ.\r\n', 91, '2024-11-15', 'Tiếng Hàn', 'movies/1732186654-ai_oan_trong_vuon_xuan.jpg', 'T18'),
(23, 'Học Viện Anh Hùng: You\'re Next', 'Deku và các bạn cùng lớp phải đối mặt với một kẻ thù mới và bảo vệ thế giới.\r\n', 110, '2024-11-18', 'Tiếng Nhật', 'movies/1732186694-hvah_you_are_next.jpg', 'K'),
(24, 'Venom: Kèo Cuối', 'Venom phải đối mặt với một cuộc chiến sinh tử với toàn bộ chủng tộc Symbiote.\r\n', 109, '2024-11-15', 'Tiếng Anh', 'movies/1732186734-venom_keo_cuoi.jpg', 'T13'),
(25, 'Thiên Đường Quả Báo', 'Một người đàn ông đấu tranh để giành lại tài sản mà mình đã cùng vợ xây dựng.\r\n', 131, '2024-11-16', 'Tiếng Thái', 'movies/1732186778-thien_duong_qua_bao.jpg', 'T18'),
(26, 'Robot Hoang Dã', 'Một robot thông minh sống sót trên một hòn đảo hoang và kết bạn với các loài động vật.\r\n', 102, '2024-11-20', 'Tiếng Anh', 'movies/1732186825-robot_hoang_da.jpg', 'P'),
(27, 'Người Hoá Thú (Woodwalkers)', 'Những người có khả năng biến hình thành động vật đấu tranh để bảo vệ môi trường.\r\n', 113, '2024-11-25', 'Tiếng Anh', 'movies/1732187682-nguoi_hoa_thu.jpg', 'T17'),
(28, 'Linh Miêu: Quỷ Nhập Tràng (Spirit Whisker: The Revenant)', 'Câu chuyện kinh dị lấy cảm hứng từ truyền thuyết dân gian Việt Nam.\r\n', 161, '2024-11-23', 'Tiếng Việt', 'movies/1732187076-linh_mieu.jpg', 'T18'),
(29, 'Chiến Địa Tử Thi (Operation Undead)', 'Một câu chuyện về tình thân và chiến tranh trong bối cảnh zombie.\r\n', 148, '2024-11-28', 'Tiếng Thái', 'movies/1732187108-chien_dia_tu_thi.jpeg', 'T18'),
(30, 'The Lord of the Rings: The War of the Rohirrim', 'Kể về cuộc đời của người sáng lập ra Helm\'s Deep.\r\n', 87, '2024-11-27', 'Tiếng Anh', 'movies/1732187162-the_lord_of_the_ring.jpg', 'T18'),
(31, 'Kraven Thợ Săn Thủ Lĩnh (Kraven the Hunter)', 'Một bộ phim thuộc vũ trụ điện ảnh Marvel.\r\n', 118, '2024-12-29', 'Tiếng Hàn', 'movies/1732187219-kraven_tho_san_thu_linh.jpg', 'T18'),
(32, 'Gia Đình Hoàn Hảo (A Normal Family)', 'Câu chuyện gia đình đầy cảm xúc.\r\n', 125, '2025-01-01', 'Tiếng Hàn', 'movies/1732187262-gia_dinh_hoan_hao.jpg', 'T13'),
(33, 'Nhím Sonic 3 (Sonic the Hedgehog 3)', 'Phần tiếp theo của loạt phim về chú nhím Sonic.\r\n', 95, '2024-12-27', 'Tiếng Anh', 'movies/1732187305-nhim_sonic_3.jpg', 'K'),
(34, 'Đồi Thông Hai Mộ', 'Giai thoại tình yêu lãng mạn.\r\n', 97, '2025-03-19', 'Tiếng Việt', 'movies/1732187354-doi_thong_hai_mo.jpg', 'T18'),
(35, 'Wolf Man', 'Một câu chuyện kinh dị về người sói.\r\n', 108, '2025-01-17', 'Tiếng Anh', 'movies/1732187405-wolf_man.jpg', 'T18'),
(36, 'Bộ Tứ Báo Thủ', 'Phim hài Tết của đạo diễn Trấn Thành.\r\n', 91, '2025-01-02', 'Tiếng Việt', 'movies/1732187471-bo_tu_bao_thu.jpg', 'T18'),
(37, 'Thám Tử Kiên', 'Bộ phim tiếp theo của đạo diễn Victor Vũ.\r\n', 114, '2025-01-31', 'Tiếng Việt', 'movies/1732187509-tham_tu_kien.jpg', 'P'),
(38, 'Âm Dương Lộ', 'Phim kinh dị hành trình đầu tiên của Việt Nam.\r\n', 101, '2025-01-11', 'Tiếng Việt', 'movies/1732187561-am_duong_lo.jpg', 'T18'),
(39, 'Avatar 3', 'Phần tiếp theo của loạt phim Avatar.\r\n', 139, '2025-02-19', 'Tiếng Anh', 'movies/1732187611-avatar_3.jpg', 'T18'),
(40, 'Nhà Gia Tiên', 'Phim điện ảnh của Huỳnh Lập.\r\n', 91, '2025-02-12', 'Tiếng Việt', 'movies/1732187661-nha_gia_tien.jpg', 'T18');

-- --------------------------------------------------------

--
-- Table structure for table `movie_artists`
--

CREATE TABLE `movie_artists` (
  `id` int NOT NULL,
  `artist_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` int NOT NULL,
  `genre_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `imageURL` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `imageURL`, `created_at`, `user_id`) VALUES
(2, 'JUJUTSU KAISEN', '1. Thời gian mở bán:\r\n\r\n- Từ ngày 06/11: Mở bán hai nhân vật Nobara và Megumi trên toàn quốc.\r\n- Từ ngày 09/11: Mở bán trọn bộ 4 nhân vật Nobara, Megumi , Gojo và Yuri tại khu vực Hồ Chí Minh, Biên Hòa, Bình Dương.\r\n- Từ ngày 13/11: Mở bán trọn bộ 4 nhân vật trên toàn quốc.\r\n\r\n2. Thông tin sản phẩm:\r\n\r\nJUJUTSU KAISEN SINGLE là bộ sản phẩm bao gồm 4 nhân vật KUGISAKI NOBARA, FUSHIGURO MEGUMI, GOJO SATORU và ITADORI YUJI từ bộ truyện manga nổi tiếng Jujutsu Kaisen.\r\n- Chiều cao ly ~ 32cm\r\n- Chiều cao 2D topper ~12 cm.\r\n- Dung tích ly 32oz ~ 946ml\r\n- Chất liệu ly: Nhựa PP số 5\r\n- Sản phẩm chính hãng và có bản quyền từ Licensor.\r\n\r\n3. Thông tin combo sản phẩm:\r\n\r\n- Jujutsu Kaisen Single Combo: Mua 01 ly nhân vật >> Tặng 01 bắp ngọt lớn và 01 nước ngọt lớn.\r\n* Được lực chọn nhân vật.\r\n- Jujutsu Kaisen Cup Set : 01 Set bao gồm 04 ly nhân vật + 02 nước ngọt lớn +  01 bắp ngọt lớn.\r\n*  04 ly tương ứng 04 nhân vật, không được thay đổi.', 'news/1732197175-jjk_news.png', '2024-11-21 13:52:55', 1),
(3, 'XEM LINH MIÊU, TẶNG LY MÈO!', '1. Nội dung chương trình:\r\n\r\nMỗi khách hàng mua trước từ 03 vé xem phim Linh Miêu suất chiếu các ngày 22, 23, 24/11 thông qua website hoặc App CGV à Nhận 01 Coupon tương ứng 01 ly mèo CGV mẫu ngẫu nhiên.\r\n (*) Coupon sẽ được tặng vào tài khoản thành viên sau khi giao dịch thành công thỏa điều kiện.\r\n(*) Quà tặng có hạn, giới hạn: 100 coupons/ rạp.\r\n\r\n2. Chương trình chỉ áp dụng khi mua vé tại: CGV Sư Vạn Hạnh (Vạn Hạnh Mall) hoặc CGV Vincom Royal City.\r\n\r\n3. Thời gian chương trình:\r\n\r\n- Bắt đầu từ ngày mở bán vé chính thức (dự kiến 8/11) và kết thúc khi đạt giới hạn quà tặng.\r\n- Thời gian đến rạp để đổi coupon quà tặng: Từ 22/11 đến hết 26/11/2024.\r\n\r\n4. Điều kiện và điều khoản Coupon:\r\n\r\n- Mỗi thành viên chỉ nhận 01 coupon trong suốt chương trình\r\n- Coupon không được hoàn trả sau khi sử dụng.\r\n- Chỉ được sử dụng coupon 01 lần và không được quy đổi thành tiền hoặc hàng hóa khác.\r\n- Chỉ đổi coupon tại rạp đã mua vé.\r\n- CGV sẽ không hỗ trợ giải quyết các trường hợp đến đổi coupon sau ngày 26/11/2024.\r\n- HSD Coupon: Từ 22/11 – 26/11/2024 và chỉ áp dụng cho suất chiếu từ 22/11 đến 15/12.', 'news/1732197387-linhmieu_news.png', '2024-11-21 06:56:27', 1),
(4, 'LINH MIÊU: QUỶ NHẬP TRÀNG, TẶNG NGÀN COUPON!', '1. Nội dung chương trình:\r\n\r\nMỗi khách hàng mua từ 02 vé xem phim Linh Miêu suất chiếu các ngày 22, 23, 24/11 thông qua website hoặc app CGV.\r\n-> Tặng 01 Coupon 50.000 VND vào tài khoản thành viên khi mua vé tại rạp khu vực TP. HCM và Hà Nội.\r\n-> Tặng 01 Coupon 30.000 VND vào tài khoản thành viên khi mua vé tại rạp các khu vực tỉnh/ thành còn lại.\r\n(*) Coupon được tặng vào tài khoản thành viên sau khi giao dịch thành công thỏa điều kiện.\r\n(*) Số lượng coupon quà tặng có hạn: 1000 coupons 50.000 VND và 1000 coupons 30.000 VND.\r\n\r\n2. Chương trình áp dụng: Tại tất cả các rạp CGV trên toàn quốc.\r\n\r\n3. Thời gian chương trình: Bắt đầu từ lúc mở bán vé (dự kiến 08/11) và kết thúc ngay khi đạt giới hạn coupon quà tặng.\r\n\r\n4. Điều kiện và điều khoản Coupon quà tặng:\r\n\r\na. COUPON 50.000 VND:\r\n\r\n- Coupon áp dụng cho giao dịch tiếp theo trị giá từ 150.000 VND, trong đó có ít nhất 02 vé xem phim bất kì.\r\n- Mỗi thành viên chỉ nhận 01 coupon trong suốt chương trình.\r\n- Áp dụng thanh toán trực tiếp tại quầy hoặc online qua ứng dụng/website CGV.\r\n- Áp dụng tại tất cả các rạp CGV trên Toàn quốc.\r\n- Coupon được sử dụng 01 lần và không có giá trị cộng gộp hay hoàn trả giá trị thừa khi thanh toán.\r\n- Coupon không được hoàn trả sau khi sử dụng hoặc quy đổi thành tiền hay hàng hóa khác.\r\n- Hạn sử dụng: Từ 22/11 -  15/12/2024 và chỉ áp dụng cho suất chiếu từ 22/11 đến 15/12.\r\n\r\nb. COUPON 30.000 VND:\r\n\r\n- Coupon áp dụng cho giao dịch tiếp theo trị giá từ 100.000 VND, trong đó có ít nhất 02 vé xem phim bất kì.\r\n- Mỗi thành viên chỉ nhận 01 coupon trong suốt chương trình.\r\n- Áp dụng thanh toán trực tiếp tại quầy hoặc online qua ứng dụng/website CGV.\r\n- Áp dụng tại tất cả các rạp CGV trên Toàn quốc.\r\n- Coupon được sử dụng 01 lần và không có giá trị cộng gộp hay hoàn trả giá trị thừa khi thanh toán.\r\n- Coupon không được hoàn trả sau khi sử dụng hoặc quy đổi thành tiền hay hàng hóa khác.\r\n- Hạn sử dụng: Từ 22/11 -  15/12/2024.', 'news/1732197290-linhmieu_news(1).png', '2024-11-21 13:54:50', 1),
(5, 'THANH TOÁN NHANH GỌN - TẬN HƯỞNG ƯU ĐÃI', 'Cuối năm rồi, bao nhiêu phim hot tại rạp đang chờ bạn thưởng thức\r\nGọi ngay cho hội bạn thân, lvaof web/app CGV hoặc tiến thẳng tới hệ thống cụm rạp CGV, chọn cho mình bộ phim yêu thích và thanh toán VNPAY-QR để nhận ưu đãi nha.\r\n\r\nNhập mã: VNPAYCGV\r\n- Giảm 5K cho mọi hóa đơn\r\n- Giảm 10K cho đơn từ 350K\r\n- Tần suất sử dụng mã: 01 khách hàng/lần/tháng\r\n- Ưu đãi áp dụng tới ngày 31/12/2024\r\n- Ưu đãi hời cho bạn càn quét các phòng vé cùng VNPAY-QR, nhanh chóng chớp deal ngay!!\r\n- Ngoài ra, khi là 1 khách hàng thanh toán VNPAY-QR thường xuyên tại CGV, bạn sẽ có cơ hội nhận thêm nhiều ưu đãi ngẫu nhiên phụ thuộc vào tần suất thanh toán, bạn nhớ nhaaa!', 'news/1732197327-vnpay_news.jpg', '2024-11-21 13:55:27', 1),
(6, 'BƯỚC VÀO ĐIỆN ẢNH CHẤT - MANG VỀ KỶ NIỆM “XANH”!!!', 'Tháng 11 này có quá nhiều phim hot với các định dạng đặc biệt quá nè cả nhà ơiiiii! Đến CGV ngay và luôn để vừa trải nghiệm vượt xa điện ảnh với các rạp đặc biệt lại còn vừa được nhận quà “độc” nữa nè!\r\n\r\n1. THỂ LỆ\r\n\r\nMua 02 vé xem phim định dạng IMAX hoặc 4DX hoặc Ultra 4DX của 01 trong 04 phim bên dưới sẽ được tặng 01 Ví đựng thẻ được tái chế từ màn chiếu cũ.\r\n\r\n        1. Red One (Dự kiến khởi chiếu: 08.11)\r\n\r\n        2. Gladiator II (Dự kiến khởi chiếu: 15.11)\r\n\r\n        3. Wicked (Dự kiến khởi chiếu: 22.11)\r\n\r\n        4. Moana 2 (Dự kiến khởi chiếu: 29.11)\r\n\r\n*02 vé hợp lệ phải cùng cho 01 phim và cùng 01 suất chiếu.\r\n*Chương trình được áp dụng lũy tiến: Mua 02 vé tặng 01 phần quà, mua 04 vé tặng 02 phần quà,…\r\n\r\n2. THỜI GIAN\r\n\r\n- Chương trình diễn ra với ngày thực hiện giao dịch và suất chiếu trong giai đoạn từ 08.11.2024 đến hết 12.12.2024.\r\n- Chương trình có thể kết thúc sớm khi các rạp đã hết quà tặng.', 'news/1732197366-kiniemxanh_news.jpg', '2024-11-21 13:56:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `status` varchar(50) NOT NULL,
  `total_price` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) NOT NULL,
  `discount` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `ticket_id` int NOT NULL,
  `fnd_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ranks`
--

CREATE TABLE `ranks` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `benefits` varchar(255) NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `benefits`, `level`) VALUES
(1, 'Silver Member', 'Giảm 5% tại quầy vé và 3% tại quầy bắp nước', 500),
(2, 'Gold Member', 'Giảm 7% tại quầy vé và 4% tại quầy bắp nước', 1200),
(3, 'Platinum Member', 'Giảm 10% tại quầy vé và 5% tại quầy bắp nước', 2000),
(4, 'Diamond Member', 'Giảm 13% tại quầy vé và 7% tại quầy bắp nước', 3000),
(5, 'Member', 'Được bắt đầu tích điểm theo giá trị hóa đơn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'root', 'Admin có quyền hạn lớn nhất.'),
(2, 'Quản trị viên', 'Quản trị viên được cấp một số quyền hạn do root phân quyền'),
(3, 'Người dùng', 'Khách hàng của hệ thống, không được truy cập phía admin');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `total_seats` tinyint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `description`, `total_seats`) VALUES
(1, 'Phòng 01', 'Regular', 'Xịn', 59),
(4, 'Phòng 02', 'IMAX', 'Phòng 02 VIP PRO', 59);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `start_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `type_id` int NOT NULL,
  `seat_row` varchar(20) NOT NULL,
  `seat_column` tinyint UNSIGNED NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `room_id`, `type_id`, `seat_row`, `seat_column`, `status`) VALUES
(3, 4, 3, 'H', 1, 'Active'),
(4, 4, 3, 'A', 3, 'Active'),
(5, 1, 2, 'C', 3, 'Deactive');

-- --------------------------------------------------------

--
-- Table structure for table `seat_types`
--

CREATE TABLE `seat_types` (
  `id` int NOT NULL,
  `price` int NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `seat_types`
--

INSERT INTO `seat_types` (`id`, `price`, `type`) VALUES
(1, 60000, 'VIP'),
(2, 50000, 'Thường'),
(3, 85000, 'SweetBox');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `seat_id` int NOT NULL,
  `schedule_id` int NOT NULL,
  `fnd_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `repassword` varchar(50) NOT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role_id` int NOT NULL,
  `rank_id` int NOT NULL,
  `points` int DEFAULT NULL,
  `imageURL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `repassword`, `tel`, `email`, `address`, `role_id`, `rank_id`, `points`, `imageURL`) VALUES
(1, 'Trần Đức Trung', '123456', '', '0395183309', 'trungtrandev97@gmail.com', 'Tổ 3, phường tô hiệu, tp sơn la, tỉnh sơn la', 1, 4, 99999, 'user/1731911690-ẢnhCV.png'),
(5, 'demo', 'trungtran97', 'trungtran97', '0395183309', 'demo@gmail.com', 'Tổ 3, phường tô hiệu, tp sơn la, tỉnh sơn la', 3, 5, 1, NULL),
(6, 'demo2', '123456', '123456', '0981614398', 'demo2@gmail.com', 'demo2', 3, 5, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cmt_movie` (`movie_id`),
  ADD KEY `fk_cmt_user` (`user_id`);

--
-- Indexes for table `food_and_drinks`
--
ALTER TABLE `food_and_drinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_artists`
--
ALTER TABLE `movie_artists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conn_artistMovie` (`artist_id`),
  ADD KEY `fk_conn_movieArtist` (`movie_id`);

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_conn_genreMovie` (`genre_id`),
  ADD KEY `fk_conn_movieGenre` (`movie_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_user` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_user` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_details` (`order_id`),
  ADD KEY `fk_details_ticket` (`ticket_id`),
  ADD KEY `fk_details_fnd` (`fnd_id`);

--
-- Indexes for table `ranks`
--
ALTER TABLE `ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_schedule_room` (`room_id`),
  ADD KEY `fk_schedule_movie` (`movie_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_seat_room` (`room_id`),
  ADD KEY `fk_seat_type` (`type_id`);

--
-- Indexes for table `seat_types`
--
ALTER TABLE `seat_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ticket_seat` (`seat_id`),
  ADD KEY `fk_ticket_schedule` (`schedule_id`),
  ADD KEY `fk_ticket_fnd` (`fnd_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_user_rank` (`rank_id`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_and_drinks`
--
ALTER TABLE `food_and_drinks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `movie_artists`
--
ALTER TABLE `movie_artists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ranks`
--
ALTER TABLE `ranks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seat_types`
--
ALTER TABLE `seat_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_cmt_movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cmt_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `movie_artists`
--
ALTER TABLE `movie_artists`
  ADD CONSTRAINT `fk_conn_artistMovie` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_conn_movieArtist` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD CONSTRAINT `fk_conn_genreMovie` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_conn_movieGenre` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_details_fnd` FOREIGN KEY (`fnd_id`) REFERENCES `food_and_drinks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_details_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_order_details` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `fk_schedule_movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_schedule_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `fk_seat_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_seat_type` FOREIGN KEY (`type_id`) REFERENCES `seat_types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_ticket_fnd` FOREIGN KEY (`fnd_id`) REFERENCES `food_and_drinks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ticket_schedule` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ticket_seat` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_rank` FOREIGN KEY (`rank_id`) REFERENCES `ranks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
