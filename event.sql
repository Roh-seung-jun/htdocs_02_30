-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 22-03-31 13:07
-- 서버 버전: 10.4.22-MariaDB
-- PHP 버전: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `event`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `events`
--

CREATE TABLE `events` (
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `cnt` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `events`
--

INSERT INTO `events` (`phone`, `name`, `date`, `cnt`, `score`) VALUES
('010-3280-1651', '승준', '2022-03-31', 3, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 테이블 구조 `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `files`
--

INSERT INTO `files` (`id`, `review_id`, `file_name`) VALUES
(1, '1', './reviews/1648704639_0.jpg'),
(2, '2', './reviews/1648705547_0.jpg'),
(3, '2', './reviews/1648705547_1.jpg'),
(4, '3', './reviews/1648705578_0.jpg'),
(5, '4', './reviews/1648705579_0.jpg'),
(6, '5', './reviews/1648705579_0.jpg'),
(7, '6', './reviews/1648705579_0.jpg'),
(8, '7', './reviews/1648705579_0.jpg'),
(9, '8', './reviews/1648705579_0.jpg'),
(10, '9', './reviews/1648705579_0.jpg'),
(11, '10', './reviews/1648705580_0.jpg'),
(12, '11', './reviews/1648705580_0.jpg'),
(13, '12', './reviews/1648705580_0.jpg'),
(14, '13', './reviews/1648705580_0.jpg'),
(15, '14', './reviews/1648705580_0.jpg'),
(16, '15', './reviews/1648705580_0.jpg'),
(17, '16', './reviews/1648705581_0.jpg'),
(18, '17', './reviews/1648705581_0.jpg'),
(19, '18', './reviews/1648705581_0.jpg'),
(20, '19', './reviews/1648705581_0.jpg'),
(21, '20', './reviews/1648705582_0.jpg'),
(22, '21', './reviews/1648705582_0.jpg'),
(23, '22', './reviews/1648705582_0.jpg'),
(24, '23', './reviews/1648705582_0.jpg'),
(25, '24', './reviews/1648705582_0.jpg'),
(26, '25', './reviews/1648705582_0.jpg'),
(27, '26', './reviews/1648705583_0.jpg'),
(28, '27', './reviews/1648705583_0.jpg'),
(29, '28', './reviews/1648705583_0.jpg'),
(30, '29', './reviews/1648705583_0.jpg'),
(31, '30', './reviews/1648705583_0.jpg'),
(32, '31', './reviews/1648705583_0.jpg'),
(33, '32', './reviews/1648705583_0.jpg'),
(34, '33', './reviews/1648705584_0.jpg'),
(35, '34', './reviews/1648705584_0.jpg'),
(36, '35', './reviews/1648705584_0.jpg'),
(37, '36', './reviews/1648705584_0.jpg'),
(38, '37', './reviews/1648707241_0.jpg'),
(39, '38', './reviews/1648707246_0.jpg'),
(40, '39', './reviews/1648707278_0.jpg'),
(41, '40', './reviews/1648707316_0.jpg'),
(42, '41', './reviews/1648707337_0.jpg'),
(43, '42', './reviews/1648707552_0.jpg'),
(44, '43', './reviews/1648707580_0.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `map_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `most` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `items`
--

INSERT INTO `items` (`id`, `map_id`, `item`, `most`) VALUES
(1, '창원시', '풋고추', '풋고추'),
(2, '창원시', '단감', '풋고추'),
(3, '창원시', '수박', '풋고추'),
(4, '창원시', '홍합', '풋고추'),
(5, '진주시', '고추', '고추'),
(6, '진주시', '마', '고추'),
(7, '진주시', '실크', '고추'),
(8, '진주시', '배', '고추'),
(9, '통영시', '굴', '굴'),
(10, '통영시', '진주', '굴'),
(11, '통영시', '나전칠기', '굴'),
(12, '사천시', '멸치', '멸치'),
(13, '사천시', '단감', '멸치'),
(14, '사천시', '쥐치포', '멸치'),
(15, '사천시', '옹기', '멸치'),
(16, '김해시', '단감', '단감'),
(17, '김해시', '화훼', '단감'),
(18, '김해시', '참외', '단감'),
(19, '김해시', '도자기', '단감'),
(20, '밀양시', '대추', '대추'),
(21, '밀양시', '깻잎', '대추'),
(22, '밀양시', '사과', '대추'),
(23, '밀양시', '풋고추', '대추'),
(24, '밀양시', '도자기', '대추'),
(25, '거제시', '유자', '유자'),
(26, '거제시', '죽순', '유자'),
(27, '거제시', '알로에', '유자'),
(28, '거제시', '한라봉', '유자'),
(29, '거제시', '천혜향', '유자'),
(30, '양산시', '매실', '매실'),
(31, '양산시', '버섯', '매실'),
(32, '양산시', '딸기', '매실'),
(33, '양산시', '달걀', '매실'),
(34, '양산시', '당근', '매실'),
(35, '의령군', '수박', '수박'),
(36, '의령군', '호박', '수박'),
(37, '의령군', '한지', '수박'),
(38, '의령군', '버섯', '수박'),
(39, '함안군', '곶감', '곶감'),
(40, '함안군', '수박', '곶감'),
(41, '함안군', '파프리카', '곶감'),
(42, '함안군', '연근', '곶감'),
(43, '창녕군', '양파', '양파'),
(44, '창녕군', '마늘', '양파'),
(45, '창녕군', '고추', '양파'),
(46, '창녕군', '단감', '양파'),
(47, '고성군', '방울토마토', '방울토마토'),
(48, '고성군', '멸치젓', '방울토마토'),
(49, '고성군', '대하', '방울토마토'),
(50, '남해군', '마늘', '마늘'),
(51, '남해군', '고사리', '마늘'),
(52, '남해군', '멸치', '마늘'),
(53, '하동군', '녹차', '녹차'),
(54, '하동군', '인삼', '녹차'),
(55, '하동군', '배', '녹차'),
(56, '하동군', '작설차', '녹차'),
(57, '산청군', '약초', '약초'),
(58, '산청군', '곶감', '약초'),
(59, '산청군', '동충하초', '약초'),
(60, '산청군', '누에가루', '약초'),
(61, '산청군', '황화씨', '약초'),
(62, '함양군', '밤', '밤'),
(63, '함양군', '흑돼지', '밤'),
(64, '함양군', '포도', '밤'),
(65, '함양군', '명주', '밤'),
(66, '함양군', '산채', '밤'),
(67, '함양군', '농악기', '밤'),
(68, '거창군', '사과', '사과'),
(69, '거창군', '덩굴차', '사과'),
(70, '거창군', '딸기', '사과'),
(71, '거창군', '포도', '사과'),
(72, '합천군', '돼지', '돼지고기'),
(73, '합천군', '작약', '돼지고기'),
(74, '합천군', '양파', '돼지고기'),
(75, '합천군', '돗자리', '돼지고기'),
(76, '합천군', '왕골', '돼지고기'),
(77, '합천군', '도자기', '돼지고기'),
(78, '합천군', '한과', '돼지고기');

-- --------------------------------------------------------

--
-- 테이블 구조 `maps`
--

CREATE TABLE `maps` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `most` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `maps`
--

INSERT INTO `maps` (`id`, `most`, `file_name`) VALUES
('거제시', '유자', '거제시_유자.jpg'),
('거창군', '사과', '거창군_사과.jpg'),
('고성군', '방울토마토', '고성군_방울토마토.jpg'),
('김해시', '단감', '김해시_단감.jpg'),
('남해군', '마늘', '남해군_마늘.jpg'),
('밀양시', '대추', '밀양시_대추.jpg'),
('사천시', '멸치', '사천시_멸치.jpg'),
('산청군', '약초', '산청군_약초.jpg'),
('양산시', '매실', '양산시_매실.jpg'),
('의령군', '수박', '의령군_수박.jpg'),
('진주시', '고추', '진주시_고추.jpg'),
('창녕군', '양파', '창녕군_양파.jpg'),
('창원시', '풋고추', '창원시_풋고추.jpg'),
('통영시', '굴', '통영시_굴.jpg'),
('하동군', '녹차', '하동군_녹차.jpg'),
('함안군', '곶감', '함안군_곶감.jpg'),
('함양군', '밤', '함양군_밤.jpg'),
('합천군', '돼지고기', '합천군_돼지고기.jpg');

-- --------------------------------------------------------

--
-- 테이블 구조 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_03_31_021343_create_files_table', 1),
(4, '2022_03_31_021347_create_reviews_table', 1),
(5, '2022_03_31_021353_create_maps_table', 1),
(6, '2022_03_31_021358_create_items_table', 1),
(7, '2022_03_31_021406_create_events_table', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `purchase-date` date NOT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `product`, `shop`, `score`, `purchase-date`, `contents`) VALUES
(1, '승준', '1412412', '124124', 8, '2022-03-12', '12412412421'),
(2, '승준', 'qweqwewqe', 'qweqwe', 8, '2022-03-11', 'qweqweqweqweqe'),
(3, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(4, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(5, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(6, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(7, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(8, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(9, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(10, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(11, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(12, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(13, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(14, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(15, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(16, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(17, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(18, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(19, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(20, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(21, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(22, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(23, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(24, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(25, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(26, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(27, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(28, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(29, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(30, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(31, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(32, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(33, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(34, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(35, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(36, '승준asd', 'sadasdad', 'asdasd', 8, '2022-03-10', 'asdasdadad'),
(37, '승준', '41241241241', '124124124', 7, '2022-03-09', '12412412412414'),
(38, '승준', '41241241241', '124124124', 7, '2022-03-09', '12412412412414'),
(39, '승준', '124124', '124124124', 7, '2022-03-18', '124124124214'),
(40, 'sfdbf', 'sbdhjfbjhdb', 'dsjhfbsdhjbf', 6, '2022-03-31', 'abn masvdfghasvdhgjvsaghdvasghjvdsgahvdjhgasvdvsad'),
(41, 'asdasd', 'dasdasd', 'asdas', 7, '2022-03-31', 'saghjgjh                    console.log(res);\n                    console.log(res);\n                    console.log(res);\n                    console.log(res);\n                    console.log(res);\n                    console.log(res);'),
(42, 'aSASDASD', 'ASDASDA', 'ASDASD', 5, '2022-03-12', 'sdasdasd'),
(43, 'asdasd', 'asdasd', 'asdasdasd', 6, '2022-03-01', 'asdasdasd');

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id`, `pass`) VALUES
('admin', '1234');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`phone`);

--
-- 테이블의 인덱스 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- 테이블의 AUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- 테이블의 AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 테이블의 AUTO_INCREMENT `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
