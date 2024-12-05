-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 05, 2024 at 11:15 AM
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
(23, 'Florence Pugh', 'Diễn viên', 'Florence Pugh là một nữ diễn viên người Anh, được biết đến qua các bộ phim như Little Women và Midsommar.', 'Anh', 'artists/1732188485-florence_pugh.jpeg'),
(24, 'Ariana Grande', 'Diễn viên', 'Ca sĩ, nhạc sĩ và diễn viên người Mỹ', 'Mỹ', 'artists/1732298487-ArianaGrande.jpg'),
(25, 'Naoko Yamada', 'Đạo diễn', 'Đạo diễn phim người Nhật', 'Nhật Bản', 'artists/1732346939-NaokoYamada.jpg'),
(26, 'Taisei Kido', 'Diễn viên', 'Diễn viên nam người Nhật Bản', 'Nhật Bản', 'artists/1732346963-TaiseiKido.jpg'),
(27, 'Tim Harper', 'Đạo diễn', 'abc', 'xyz', 'artists/1732347223-TimHarper.jpg'),
(28, 'Rachel Shenton', 'Diễn viên', 'abc', 'xyz', 'artists/1732347242-RachelShenton.jpg');

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
  `description` varchar(1000) NOT NULL,
  `price` int NOT NULL,
  `quantity` smallint UNSIGNED NOT NULL,
  `imageURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `food_and_drinks`
--

INSERT INTO `food_and_drinks` (`id`, `name`, `type`, `description`, `price`, `quantity`, `imageURL`) VALUES
(1, 'Sweet Combo', 'Combo', 'TIẾT KIỆM 46K!!! Gồm: 1 Bắp + 2 Nước có gaz', 88000, 500, NULL),
(2, 'Beta Combo', 'Combo', 'TIẾT KIỆM 28K!!! Gồm: 1 Bắp + 1 Nước có gaz', 68000, 500, NULL),
(3, 'Family Combo', 'Combo', 'TIẾT KIỆM 95K!!! Gồm: 2 Bắp + 4 Nước có gaz + 2 Snack Oishi (80g)', 213000, 500, 'foodanddrinks/1731923587-0002224_hawaii_300.png');

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
(3, 'Tình cảm', 'Lãng mạn, cảm xúc, tình yêu, và quan hệ. Những câu chuyện này thường xoay quanh sự phát triển của tình cảm giữa các nhân vật, với những khoảnh khắc ngọt ngào, xúc động và đôi khi là thử thách.'),
(5, 'Kinh dị', 'Thường có những hình ảnh rùng rợn, âm thanh đáng sợ, và các yếu tố siêu nhiên hoặc quái vật. Các bộ phim kinh dị nổi tiếng thường khai thác những nỗi sợ nguyên thủy nhất của con người.'),
(6, 'Gia đình', 'Thường xoay quanh các mối quan hệ giữa các thành viên trong gia đình, như cha mẹ và con cái, anh chị em. Những bộ phim này thường mang thông điệp về tình yêu, sự hy sinh và sự gắn kết gia đình.'),
(7, 'Hài hước', 'Sử dụng các tình huống hài hước, lời thoại dí dỏm, và đôi khi là những tình huống phi lý để tạo tiếng cười. Phim hài có thể bao gồm nhiều thể loại nhỏ như hài lãng mạn, hài hành động, và hài châm biếm.'),
(8, 'Tâm lý', 'Thường có cốt truyện phức tạp, tập trung vào sự phát triển và biến đổi tâm lý của nhân vật. Những bộ phim này thường mang lại những cảm xúc mạnh mẽ và suy ngẫm về các khía cạnh khác nhau của cuộc sống.'),
(9, 'Huyền bí', 'Thường có các yếu tố như phép thuật, thế giới song song, sinh vật huyền bí, và những sự kiện kỳ lạ. Các bộ phim huyền bí thường tạo ra một bầu không khí đầy bí ẩn và lôi cuốn, khiến khán giả phải suy nghĩ và tưởng tượng.'),
(10, 'Phiêu lưu', 'Phim phiêu lưu thường xoay quanh những cuộc hành trình đầy thử thách và nguy hiểm. Nhân vật chính thường phải vượt qua nhiều trở ngại và đối mặt với những tình huống bất ngờ để đạt được mục tiêu.'),
(11, 'Hoạt hình', 'Phim hoạt hình sử dụng các hình ảnh vẽ tay hoặc đồ họa máy tính để kể chuyện. Thể loại này không chỉ dành cho trẻ em mà còn có nhiều tác phẩm dành cho người lớn với nội dung sâu sắc và phong phú.'),
(12, 'Kịch', 'Phim kịch tập trung vào việc phát triển nhân vật và cốt truyện, thường khai thác các chủ đề về tình cảm, xã hội và tâm lý. Thể loại này thường có nhịp độ chậm hơn và chú trọng vào diễn xuất và đối thoại.');

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
(7, 'cười xuyên biên giới', 'Câu chuyện hài hước về một cựu vận động viên bắn cung phải đối mặt với nhiều tình huống dở khóc dở cười khi đến Amazon.\r\n', 113, '2024-11-15', 'Tiếng Hàn, Tiếng Anh', 'movies/1732185519-cuoi_xuyen_bien_gioi.jpg', 'T13'),
(8, 'wicked', 'Một phiên bản mới của câu chuyện phù thủy xứ Oz, tập trung vào nhân vật Elphaba.\r\n', 161, '2024-11-16', 'Tiếng Anh', 'movies/1732185680-wicked.jpg', 'K'),
(9, 'sắc màu của cảm xúc', 'Câu chuyện cảm động về một cô gái có khả năng nhìn thấy cảm xúc của người khác và những người bạn đặc biệt của cô.\r\n', 102, '2024-11-18', 'Tiếng Nhật', 'movies/1732185759-sac_mau_cua_cam_xuc.jpg', 'P'),
(10, 'võ sĩ giác đấu 2', 'Lucius, một nô lệ giác đấu, phải tìm cách trả thù và giành lại vinh quang cho người dân Rome.\r\n', 148, '2024-11-15', 'Tiếng Anh, Tiếng Latinh', 'movies/1732185832-vo_si_giac_dau.jpg', 'T18'),
(11, 'Ozi: phi vụ rừng xanh', 'Một chú đười ươi mồ côi lên đường tìm lại gia đình và khám phá thế giới tự nhiên.\r\n', 87, '2024-11-15', 'Tiếng Anh', 'movies/1732185890-ozi_phi_vu_rung_xanh.jpg', 'P'),
(12, 'đôi bạn học yêu', 'Câu chuyện tình yêu lãng mạn giữa một cô gái tự do và một chàng trai mang trong mình bí mật.\r\n', 118, '2024-11-11', 'Tiếng Hàn', 'movies/1732200529-doi_ban_hoc_yeu.jpg', 'T18'),
(13, 'red one: mật mã đỏ', 'Một cuộc phiêu lưu hài hước và hành động khi Ông già Noel bị bắt cóc.\r\n', 125, '2024-11-08', 'Tiếng Anh', 'movies/1732186054-red_one.jpg', 'K'),
(14, 'công chúa nổi loạn: nhiệm vụ giải cứu hoàng gia', 'Một công chúa mạnh mẽ tự mình giải cứu bản thân khỏi tên phù thủy xấu xa.\r\n', 95, '2024-11-12', 'Tiếng Anh', 'movies/1732186102-cong_chua_noi_loan.jpg', 'P'),
(15, 'hồn ma theo đuổi', 'Một cặp đôi bị ám ảnh bởi những hồn ma sau một tai nạn giao thông.\r\n', 97, '2024-11-14', 'Tiếng Thái', 'movies/1732186163-hon_ma_theo_duoi.jpg', 'T18'),
(16, 'ngày ta đã yêu', 'Câu chuyện tình yêu kéo dài 10 năm của một cặp đôi, từ lúc yêu nhau đến khi đối mặt với những biến cố cuộc sống.\r\n', 108, '2024-11-18', 'Tiếng Anh', 'movies/1732186220-ngay_ta_yeu_nhau.jpg', 'T18'),
(17, 'cu li không bao giờ khóc', 'Một bà lão về hưu và cô cháu gái đối mặt với những vấn đề gia đình và quá khứ.\r\n', 91, '2024-11-15', 'Tiếng Việt', 'movies/1732186264-cu_li_khong_bao_gio_khoc.jpg', 'T16'),
(18, 'kẻ đóng thế', 'Một diễn viên đóng thế cố gắng vực dậy sự nghiệp và hàn gắn mối quan hệ với con gái.\r\n', 114, '2024-11-14', 'Tiếng Quảng Đông', 'movies/1732186304-ke_dong_the.jpg', 'T13'),
(20, 'đừng buông tay', 'Một gia đình cố gắng sinh tồn trong một thế giới hậu tận thế đầy nguy hiểm.\r\n', 101, '2024-11-08', 'Tiếng Anh', 'movies/1732186551-dung_buong_tay.jpg', 'T18'),
(21, 'thần dược', 'Một nữ diễn viên tìm kiếm sự trẻ trung vĩnh cửu bằng cách sử dụng một loại thuốc bí ẩn.\r\n', 139, '2024-11-16', 'Tiếng Anh', 'movies/1732186615-than_duoc.jpg', 'T18'),
(22, 'ai oán trong vườn xuân', 'Một người phụ nữ đối mặt với những điều kỳ lạ và rùng rợn sau khi đến thăm một ngôi biệt thự cũ.\r\n', 91, '2024-11-15', 'Tiếng Hàn', 'movies/1732186654-ai_oan_trong_vuon_xuan.jpg', 'T18'),
(23, 'học viện anh hùng: you\'re next', 'Deku và các bạn cùng lớp phải đối mặt với một kẻ thù mới và bảo vệ thế giới.\r\n', 110, '2024-11-18', 'Tiếng Nhật', 'movies/1732186694-hvah_you_are_next.jpg', 'K'),
(24, 'venom: kèo cuối', 'Venom phải đối mặt với một cuộc chiến sinh tử với toàn bộ chủng tộc Symbiote.\r\n', 109, '2024-11-15', 'Tiếng Anh', 'movies/1732186734-venom_keo_cuoi.jpg', 'T13'),
(25, 'thiên đường quả báo', 'Một người đàn ông đấu tranh để giành lại tài sản mà mình đã cùng vợ xây dựng.\r\n', 131, '2024-11-16', 'Tiếng Thái', 'movies/1732186778-thien_duong_qua_bao.jpg', 'T18'),
(26, 'robot hoang dã', 'Một robot thông minh sống sót trên một hòn đảo hoang và kết bạn với các loài động vật.\r\n', 102, '2024-11-20', 'Tiếng Anh', 'movies/1732186825-robot_hoang_da.jpg', 'P'),
(27, 'người hóa thú (woodwalkers)', 'Những người có khả năng biến hình thành động vật đấu tranh để bảo vệ môi trường.\r\n', 113, '2024-11-25', 'Tiếng Anh', 'movies/1732187682-nguoi_hoa_thu.jpg', 'T17'),
(28, 'linh miêu: quỷ nhập tràng (spirit whisker: the revenant)', 'Câu chuyện kinh dị lấy cảm hứng từ truyền thuyết dân gian Việt Nam.\r\n', 161, '2024-11-23', 'Tiếng Việt', 'movies/1732187076-linh_mieu.jpg', 'T18'),
(29, 'chiến địa tử thi (operation undead)', 'Một câu chuyện về tình thân và chiến tranh trong bối cảnh zombie.\r\n', 148, '2024-11-28', 'Tiếng Thái', 'movies/1732187108-chien_dia_tu_thi.jpeg', 'T18'),
(30, 'the lord of the rings: the war of the rohirrim', 'Kể về cuộc đời của người sáng lập ra Helm\'s Deep.\r\n', 87, '2024-11-27', 'Tiếng Anh', 'movies/1732187162-the_lord_of_the_ring.jpg', 'T18'),
(31, 'kraven thợ săn thủ lĩnh (kraven the hunter)', 'Một bộ phim thuộc vũ trụ điện ảnh Marvel.\r\n', 118, '2024-12-29', 'Tiếng Hàn', 'movies/1732187219-kraven_tho_san_thu_linh.jpg', 'T18'),
(32, 'gia đình hoàn hảo (a normal family)', 'Câu chuyện gia đình đầy cảm xúc.\r\n', 125, '2025-01-01', 'Tiếng Hàn', 'movies/1732187262-gia_dinh_hoan_hao.jpg', 'T13'),
(33, 'nhím sonic 3 (sonic the hedgehog 3)', 'Phần tiếp theo của loạt phim về chú nhím Sonic.\r\n', 95, '2024-12-27', 'Tiếng Anh', 'movies/1732187305-nhim_sonic_3.jpg', 'K'),
(34, 'đồi thông hai mộ', 'Giai thoại tình yêu lãng mạn.\r\n', 97, '2025-03-19', 'Tiếng Việt', 'movies/1732187354-doi_thong_hai_mo.jpg', 'T18'),
(35, 'wolf man', 'Một câu chuyện kinh dị về người sói.\r\n', 108, '2025-01-17', 'Tiếng Anh', 'movies/1732187405-wolf_man.jpg', 'T18'),
(36, 'bộ tứ báo thủ', 'Phim hài Tết của đạo diễn Trấn Thành.\r\n', 91, '2025-01-02', 'Tiếng Việt', 'movies/1732187471-bo_tu_bao_thu.jpg', 'T18'),
(37, 'thám tử kiên', 'Bộ phim tiếp theo của đạo diễn Victor Vũ.\r\n', 114, '2025-01-31', 'Tiếng Việt', 'movies/1732187509-tham_tu_kien.jpg', 'P'),
(38, 'âm dương lộ', 'Phim kinh dị hành trình đầu tiên của Việt Nam.\r\n', 101, '2025-01-11', 'Tiếng Việt', 'movies/1732187561-am_duong_lo.jpg', 'T18'),
(39, 'avatar 3', 'Phần tiếp theo của loạt phim Avatar.\r\n', 139, '2025-02-19', 'Tiếng Anh', 'movies/1732187611-avatar_3.jpg', 'T18'),
(40, 'nhà gia tiên', 'Phim điện ảnh của Huỳnh Lập.\r\n', 91, '2025-02-12', 'Tiếng Việt', 'movies/1732187661-nha_gia_tien.jpg', 'T18');

-- --------------------------------------------------------

--
-- Table structure for table `movie_artists`
--

CREATE TABLE `movie_artists` (
  `id` int NOT NULL,
  `artist_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie_artists`
--

INSERT INTO `movie_artists` (`id`, `artist_id`, `movie_id`) VALUES
(1, 5, 7),
(2, 6, 7),
(3, 7, 7),
(4, 8, 7),
(5, 9, 7),
(6, 10, 7),
(8, 11, 8),
(9, 24, 8),
(10, 12, 9),
(11, 13, 9),
(12, 26, 9),
(13, 25, 9),
(14, 14, 10),
(15, 15, 10),
(16, 16, 10),
(17, 19, 10),
(18, 17, 10),
(19, 18, 10),
(20, 20, 11),
(21, 21, 11),
(22, 27, 11),
(23, 28, 11),
(24, 5, 12),
(25, 6, 12),
(26, 13, 12),
(27, 10, 12),
(28, 15, 13),
(29, 19, 13),
(31, 16, 13),
(32, 14, 13),
(33, 11, 14),
(34, 21, 14),
(35, 12, 15),
(36, 17, 15),
(37, 11, 16),
(38, 22, 16),
(39, 23, 16),
(40, 13, 17),
(41, 21, 17),
(42, 10, 17),
(43, 8, 18),
(44, 16, 18),
(45, 19, 18),
(49, 17, 20),
(50, 19, 20),
(51, 24, 21),
(52, 26, 21),
(56, 19, 22),
(57, 21, 22),
(58, 6, 23),
(59, 6, 23),
(60, 10, 23),
(61, 15, 24),
(62, 11, 24),
(63, 19, 24),
(64, 10, 25),
(65, 16, 25),
(66, 10, 26),
(67, 20, 26),
(68, 14, 27),
(69, 7, 27),
(70, 9, 28),
(71, 19, 28),
(72, 10, 29),
(73, 24, 29),
(74, 11, 30),
(75, 7, 30),
(76, 10, 31),
(77, 15, 31),
(78, 13, 32),
(79, 12, 32),
(80, 6, 33),
(81, 11, 33),
(82, 10, 34),
(83, 12, 34),
(84, 19, 35),
(85, 14, 35),
(86, 5, 36),
(87, 8, 36),
(88, 10, 36),
(89, 15, 37),
(90, 10, 37),
(91, 13, 38),
(92, 23, 38),
(93, 19, 38),
(94, 26, 39),
(95, 19, 39),
(96, 21, 39),
(97, 17, 40),
(98, 10, 40),
(99, 7, 40),
(100, 10, 15),
(101, 10, 21),
(102, 19, 27),
(103, 19, 32);

-- --------------------------------------------------------

--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` int NOT NULL,
  `genre_id` int NOT NULL,
  `movie_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `genre_id`, `movie_id`) VALUES
(2, 7, 7),
(3, 9, 8),
(7, 11, 9),
(8, 1, 10),
(9, 10, 10),
(10, 11, 11),
(11, 10, 11),
(12, 3, 12),
(13, 7, 13),
(14, 1, 13),
(15, 10, 13),
(16, 11, 14),
(17, 6, 14),
(18, 10, 14),
(19, 5, 15),
(20, 9, 15),
(21, 3, 16),
(22, 7, 16),
(23, 7, 17),
(24, 3, 17),
(25, 1, 18),
(27, 3, 20),
(28, 8, 20),
(29, 1, 21),
(30, 5, 21),
(31, 5, 22),
(32, 8, 22),
(33, 11, 23),
(34, 1, 23),
(35, 1, 24),
(36, 5, 25),
(37, 11, 26),
(38, 1, 27),
(39, 5, 28),
(40, 5, 29),
(41, 1, 29),
(42, 1, 30),
(43, 1, 31),
(44, 3, 32),
(45, 6, 32),
(46, 11, 33),
(47, 8, 34),
(48, 1, 35),
(49, 7, 36),
(50, 8, 37),
(51, 5, 38),
(52, 1, 39),
(53, 5, 40);

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
  `paymentMethod` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `total_price`, `created_at`, `updated_at`, `paymentMethod`) VALUES
(87, 1, 'Đã thanh toán', 174000, '2024-12-03 07:14:47', '2024-12-03 07:14:47', 'cash'),
(88, 1, 'Chưa thanh toán', 295800, '2024-12-03 07:33:32', '2024-12-03 07:33:32', 'cash'),
(89, 7, 'Chưa thanh toán', 161500, '2024-12-03 10:21:41', '2024-12-03 10:21:41', 'cash'),
(93, 7, 'Chưa thanh toán', 190000, '2024-12-05 11:14:34', '2024-12-05 11:14:34', 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `ticket_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `ticket_id`) VALUES
(143, 87, 206),
(144, 87, 207),
(145, 87, 208),
(146, 87, 209),
(147, 88, 210),
(148, 88, 211),
(149, 88, 212),
(150, 88, 213),
(151, 89, 206),
(152, 89, 207),
(153, 89, 208),
(154, 89, 209),
(155, 89, 214),
(156, 89, 215),
(171, 93, 230),
(172, 93, 231),
(173, 93, 232),
(174, 93, 233);

-- --------------------------------------------------------

--
-- Table structure for table `order_fnds`
--

CREATE TABLE `order_fnds` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
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
  `discount_percent` tinyint NOT NULL,
  `level` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ranks`
--

INSERT INTO `ranks` (`id`, `name`, `benefits`, `discount_percent`, `level`) VALUES
(1, 'Silver', 'Giảm 5% tổng giá trị đơn hàng', 5, 500),
(2, 'Gold', 'Giảm 7% tổng giá trị đơn hàng', 7, 1200),
(3, 'Platinum', 'Giảm 10% tổng giá trị đơn hàng', 10, 2000),
(4, 'Diamond', 'Giảm 13% tổng giá trị đơn hàng', 13, 3000),
(5, 'Member', 'Giảm 2% tổng giá trị đơn hàng', 2, 1);

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
  `total_seats` tinyint UNSIGNED DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `type`, `description`, `total_seats`, `status`) VALUES
(1, 'P1', '2D', 'Phòng chiếu phim regular là lựa chọn phổ biến cho các buổi chiếu phim thông thường, mang lại trải nghiệm xem phim tốt với chi phí hợp lý.', 59, 'Active'),
(4, 'P2', 'IMAX', 'Phòng chiếu IMAX mang lại trải nghiệm điện ảnh vượt trội, giúp khán giả cảm nhận rõ ràng từng chi tiết và âm thanh của bộ phim.', 59, 'Active'),
(5, 'P3', '3D', 'Phòng chiếu phim 3D là lựa chọn tuyệt vời cho những bộ phim hành động, phiêu lưu và khoa học viễn tưởng, nơi hiệu ứng hình ảnh và âm thanh đóng vai trò quan trọng trong việc tạo ra trải nghiệm điện ảnh tuyệt vời.', 59, 'Active');

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

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `room_id`, `movie_id`, `start_at`, `end_at`) VALUES
(11, 1, 7, '2024-12-06 09:00:00', '2024-12-06 11:00:00'),
(12, 4, 8, '2024-12-06 13:00:00', '2024-12-06 15:00:00'),
(13, 5, 10, '2024-12-06 14:00:00', '2024-12-06 16:00:00'),
(14, 1, 7, '2024-12-06 11:30:00', '2024-12-06 13:20:00'),
(15, 5, 10, '2024-12-06 07:00:00', '2024-12-06 09:00:00');

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
(5, 1, 2, 'A', 1, 'Active'),
(6, 1, 2, 'A', 2, 'Active'),
(7, 1, 2, 'A', 3, 'Active'),
(8, 1, 2, 'A', 4, 'Active'),
(9, 1, 2, 'A', 5, 'Active'),
(10, 1, 2, 'A', 6, 'Active'),
(11, 1, 2, 'A', 7, 'Active'),
(12, 1, 2, 'A', 8, 'Active'),
(13, 1, 2, 'B', 1, 'Active'),
(14, 1, 2, 'B', 2, 'Active'),
(15, 1, 2, 'B', 3, 'Active'),
(16, 1, 2, 'B', 4, 'Active'),
(17, 1, 2, 'B', 5, 'Active'),
(18, 1, 2, 'B', 6, 'Active'),
(19, 1, 2, 'B', 7, 'Active'),
(20, 1, 2, 'B', 8, 'Active'),
(21, 1, 2, 'C', 1, 'Active'),
(22, 1, 2, 'C', 2, 'Active'),
(23, 1, 2, 'C', 3, 'Active'),
(24, 1, 2, 'C', 4, 'Active'),
(25, 1, 2, 'C', 5, 'Active'),
(26, 1, 2, 'C', 6, 'Active'),
(27, 1, 2, 'C', 7, 'Active'),
(28, 1, 2, 'C', 8, 'Active'),
(29, 1, 1, 'D', 1, 'Active'),
(30, 1, 1, 'D', 2, 'Active'),
(31, 1, 1, 'D', 3, 'Active'),
(32, 1, 1, 'D', 4, 'Active'),
(33, 1, 1, 'D', 5, 'Active'),
(34, 1, 1, 'D', 6, 'Active'),
(35, 1, 1, 'D', 7, 'Active'),
(36, 1, 1, 'D', 8, 'Active'),
(37, 1, 1, 'E', 1, 'Active'),
(38, 1, 1, 'E', 2, 'Active'),
(39, 1, 1, 'E', 3, 'Active'),
(40, 1, 1, 'E', 4, 'Active'),
(41, 1, 1, 'E', 5, 'Active'),
(42, 1, 1, 'E', 6, 'Active'),
(43, 1, 1, 'E', 7, 'Active'),
(44, 1, 1, 'E', 8, 'Active'),
(45, 1, 1, 'F', 1, 'Active'),
(46, 1, 1, 'F', 2, 'Active'),
(47, 1, 1, 'F', 3, 'Active'),
(48, 1, 1, 'F', 4, 'Active'),
(49, 1, 1, 'F', 5, 'Active'),
(50, 1, 1, 'F', 6, 'Active'),
(51, 1, 1, 'F', 7, 'Active'),
(52, 1, 1, 'F', 8, 'Active'),
(53, 1, 1, 'G', 1, 'Active'),
(54, 1, 1, 'G', 2, 'Active'),
(55, 1, 1, 'G', 3, 'Active'),
(56, 1, 1, 'G', 4, 'Active'),
(57, 1, 1, 'G', 5, 'Active'),
(58, 1, 1, 'G', 6, 'Active'),
(59, 1, 1, 'G', 7, 'Active'),
(60, 1, 1, 'G', 8, 'Active'),
(61, 1, 3, 'H', 1, 'Active'),
(62, 1, 3, 'H', 2, 'Active'),
(63, 1, 3, 'H', 3, 'Active'),
(69, 4, 2, 'A', 1, 'Active'),
(70, 4, 2, 'A', 2, 'Active'),
(71, 4, 2, 'A', 3, 'Active'),
(72, 4, 2, 'A', 4, 'Active'),
(73, 4, 2, 'A', 5, 'Active'),
(74, 4, 2, 'A', 6, 'Active'),
(75, 4, 2, 'A', 7, 'Active'),
(76, 4, 2, 'A', 8, 'Active'),
(77, 4, 2, 'B', 1, 'Active'),
(78, 4, 2, 'B', 2, 'Active'),
(79, 4, 2, 'B', 3, 'Active'),
(80, 4, 2, 'B', 4, 'Active'),
(81, 4, 2, 'B', 5, 'Active'),
(82, 4, 2, 'B', 6, 'Active'),
(83, 4, 2, 'B', 7, 'Active'),
(84, 4, 2, 'B', 8, 'Active'),
(85, 4, 2, 'C', 1, 'Active'),
(86, 4, 2, 'C', 2, 'Active'),
(87, 4, 2, 'C', 3, 'Active'),
(88, 4, 2, 'C', 4, 'Active'),
(89, 4, 2, 'C', 5, 'Active'),
(90, 4, 2, 'C', 6, 'Active'),
(91, 4, 2, 'C', 7, 'Active'),
(92, 4, 2, 'C', 8, 'Active'),
(93, 4, 1, 'D', 1, 'Active'),
(94, 4, 1, 'D', 2, 'Active'),
(95, 4, 1, 'D', 3, 'Active'),
(96, 4, 1, 'D', 4, 'Active'),
(97, 4, 1, 'D', 5, 'Active'),
(98, 4, 1, 'D', 6, 'Active'),
(99, 4, 1, 'D', 7, 'Active'),
(100, 4, 1, 'D', 8, 'Active'),
(101, 4, 1, 'E', 1, 'Active'),
(102, 4, 1, 'E', 2, 'Active'),
(103, 4, 1, 'E', 3, 'Active'),
(104, 4, 1, 'E', 4, 'Active'),
(105, 4, 1, 'E', 5, 'Active'),
(106, 4, 1, 'E', 6, 'Active'),
(107, 4, 1, 'E', 7, 'Active'),
(108, 4, 1, 'E', 8, 'Active'),
(109, 4, 1, 'F', 1, 'Active'),
(110, 4, 1, 'F', 2, 'Active'),
(111, 4, 1, 'F', 3, 'Active'),
(112, 4, 1, 'F', 4, 'Active'),
(113, 4, 1, 'F', 5, 'Active'),
(114, 4, 1, 'F', 6, 'Active'),
(115, 4, 1, 'F', 7, 'Active'),
(116, 4, 1, 'F', 8, 'Active'),
(117, 4, 1, 'G', 1, 'Active'),
(118, 4, 1, 'G', 2, 'Active'),
(119, 4, 1, 'G', 3, 'Active'),
(120, 4, 1, 'G', 4, 'Active'),
(121, 4, 1, 'G', 5, 'Active'),
(122, 4, 1, 'G', 6, 'Active'),
(123, 4, 1, 'G', 7, 'Active'),
(124, 4, 1, 'G', 8, 'Active'),
(125, 4, 3, 'H', 1, 'Active'),
(126, 4, 3, 'H', 2, 'Active'),
(127, 4, 3, 'H', 3, 'Active'),
(128, 5, 2, 'A', 1, 'Active'),
(129, 5, 1, 'A', 2, 'Active'),
(130, 5, 2, 'A', 3, 'Active'),
(131, 5, 2, 'A', 4, 'Active'),
(132, 5, 2, 'A', 5, 'Active'),
(133, 5, 2, 'A', 6, 'Active'),
(134, 5, 2, 'A', 7, 'Active'),
(135, 5, 2, 'A', 8, 'Active'),
(136, 5, 2, 'B', 1, 'Active'),
(137, 5, 2, 'B', 2, 'Active'),
(138, 5, 2, 'B', 3, 'Active'),
(139, 5, 2, 'B', 4, 'Active'),
(140, 5, 2, 'B', 5, 'Active'),
(141, 5, 2, 'B', 6, 'Active'),
(142, 5, 2, 'B', 7, 'Active'),
(143, 5, 2, 'B', 8, 'Active'),
(144, 5, 2, 'C', 1, 'Active'),
(145, 5, 2, 'C', 2, 'Active'),
(146, 5, 2, 'C', 3, 'Active'),
(147, 5, 2, 'C', 4, 'Active'),
(148, 5, 2, 'C', 5, 'Active'),
(149, 5, 2, 'C', 6, 'Active'),
(150, 5, 2, 'C', 7, 'Active'),
(151, 5, 2, 'C', 8, 'Active'),
(152, 5, 1, 'D', 1, 'Active'),
(153, 5, 1, 'D', 2, 'Active'),
(154, 5, 1, 'D', 3, 'Active'),
(155, 5, 1, 'D', 4, 'Active'),
(156, 5, 1, 'D', 5, 'Active'),
(157, 5, 1, 'D', 6, 'Active'),
(158, 5, 1, 'D', 7, 'Active'),
(159, 5, 1, 'D', 8, 'Active'),
(160, 5, 1, 'E', 1, 'Active'),
(161, 5, 1, 'E', 2, 'Active'),
(162, 5, 1, 'E', 3, 'Active'),
(163, 5, 1, 'E', 4, 'Active'),
(164, 5, 1, 'E', 5, 'Active'),
(165, 5, 1, 'E', 6, 'Active'),
(166, 5, 1, 'E', 7, 'Active'),
(167, 5, 1, 'E', 8, 'Active'),
(168, 5, 1, 'F', 1, 'Active'),
(169, 5, 1, 'F', 2, 'Active'),
(170, 5, 1, 'F', 3, 'Active'),
(171, 5, 1, 'F', 4, 'Active'),
(172, 5, 1, 'F', 5, 'Active'),
(173, 5, 1, 'F', 6, 'Active'),
(174, 5, 1, 'F', 7, 'Active'),
(175, 5, 1, 'F', 8, 'Active'),
(176, 5, 1, 'G', 1, 'Active'),
(177, 5, 1, 'G', 2, 'Active'),
(178, 5, 1, 'G', 3, 'Active'),
(179, 5, 1, 'G', 4, 'Active'),
(180, 5, 1, 'G', 5, 'Active'),
(181, 5, 1, 'G', 6, 'Active'),
(182, 5, 1, 'G', 7, 'Active'),
(183, 5, 1, 'G', 8, 'Active'),
(184, 5, 3, 'H', 1, 'Active'),
(185, 5, 3, 'H', 2, 'Active'),
(186, 5, 3, 'H', 3, 'Active');

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
(1, 85000, 'VIP'),
(2, 50000, 'Thường'),
(3, 120000, 'SweetBox');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int NOT NULL,
  `schedule_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `seat_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `schedule_id`, `movie_id`, `seat_id`, `created_at`, `updated_at`) VALUES
(206, 12, 8, 23, '2024-12-03 07:14:47', '2024-12-03 07:14:47'),
(207, 12, 8, 24, '2024-12-03 07:14:47', '2024-12-03 07:14:47'),
(208, 12, 8, 25, '2024-12-03 07:14:47', '2024-12-03 07:14:47'),
(209, 12, 8, 26, '2024-12-03 07:14:47', '2024-12-03 07:14:47'),
(210, 15, 10, 95, '2024-12-03 07:33:32', '2024-12-03 07:33:32'),
(211, 15, 10, 96, '2024-12-03 07:33:32', '2024-12-03 07:33:32'),
(212, 15, 10, 97, '2024-12-03 07:33:32', '2024-12-03 07:33:32'),
(213, 15, 10, 98, '2024-12-03 07:33:32', '2024-12-03 07:33:32'),
(214, 12, 8, 32, '2024-12-03 10:21:41', '2024-12-03 10:21:41'),
(215, 12, 8, 33, '2024-12-03 10:21:41', '2024-12-03 10:21:41'),
(230, 14, 7, 71, '2024-12-05 11:14:34', '2024-12-05 11:14:34'),
(231, 14, 7, 72, '2024-12-05 11:14:34', '2024-12-05 11:14:34'),
(232, 14, 7, 73, '2024-12-05 11:14:34', '2024-12-05 11:14:34'),
(233, 14, 7, 74, '2024-12-05 11:14:34', '2024-12-05 11:14:34');

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
(1, 'Trần Đức Trung', '123456', '', '0395183309', 'trungtrandev97@gmail.com', 'Tổ 3, phường tô hiệu, tp sơn la, tỉnh sơn la', 1, 4, 10321, 'user/1732830247-RachelShenton.jpg'),
(5, 'demo', 'trungtran97', 'trungtran97', '0395183309', 'demo@gmail.com', 'Tổ 3, phường tô hiệu, tp sơn la, tỉnh sơn la', 3, 5, NULL, NULL),
(6, 'demo2', '123456', '123456', '0981614398', 'demo2@gmail.com', 'demo2', 3, 5, NULL, NULL),
(7, 'test1', '123456', '123456', '0395183309', 'test1@gmail.com', 'Tổ 3, phường tô hiệu, tp sơn la, tỉnh sơn la', 3, 1, 1100, NULL),
(8, 'test2', '123456', '123456', '0395183309', 'test2@gmail.com', '123123', 3, 5, NULL, NULL);

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
  ADD KEY `fk_details_ticket` (`ticket_id`);

--
-- Indexes for table `order_fnds`
--
ALTER TABLE `order_fnds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderfnd` (`order_id`),
  ADD KEY `fk_fndorder` (`fnd_id`);

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
  ADD KEY `fk_ticket_schedule` (`schedule_id`),
  ADD KEY `fk_ticket_movie` (`movie_id`),
  ADD KEY `fk_ticket_seats` (`seat_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `movie_artists`
--
ALTER TABLE `movie_artists`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `order_fnds`
--
ALTER TABLE `order_fnds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `seat_types`
--
ALTER TABLE `seat_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  ADD CONSTRAINT `fk_details_ticket` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_order_details` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `order_fnds`
--
ALTER TABLE `order_fnds`
  ADD CONSTRAINT `fk_fndorder` FOREIGN KEY (`fnd_id`) REFERENCES `food_and_drinks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_orderfnd` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
  ADD CONSTRAINT `fk_ticket_movie` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ticket_schedule` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_ticket_seats` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
