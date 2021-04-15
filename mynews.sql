-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2021 lúc 04:47 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mynews`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`id`, `cate_id`, `tag_id`, `title`, `intro`, `content`, `author`, `date_created`) VALUES
(1, 2, 1, 'Nikes are getting harder to find at stores. Here\'s why', 'Struggling to find Nike sneakers at your neighborhood shoe store? That\'s by design.', 'Nike wants customers to buy more of its shoes, clothing and gear at Nike stores and on Nike.com and its apps, as well as at a more limited group of retailers like Dick\'s Sporting Goods (DKS) and Foot Locker (FL). So the company in recent years has slashed the number of traditional retailers it sells its goods to while shifting to grow directly through its own channels, especially online. That has affected big and small retailers. In addition to pulling out of some independently owned stores, Nike (NKE) also ended a partnership selling on Amazon (AMZN) in 2019. Nike has not disclosed which retailers specifically it has cut ties with.\r\nThe company\'s move away from a primarily wholesale distribution model is a departure from the early decades of Nike. Small, independent sneaker retailers were key to growing Nike\'s popularity in the company\'s early days, when people found out about upcoming shoe releases from visiting the local shop. But Nike has said it can make more than double the profit selling goods through its own website and physical stores than it can through wholesale partners.\r\nNike gets to control the shopper experience more tightly and the prices at which products are sold when it goes directly to consumers. That\'s a big deal for Nike, a premium brand that wants to ensure merchandise is showcased to customers in enticing ways and prevent products from being discounted too heavily.\r\nNike is eliminating what it calls \"undifferentiated\" retail partners — stores that are \"plopping Nike stuff on their shelf or website and hoping somebody finds it,\" said Sam Poser, an analyst at Williams Trading who covers the company. Nike is \"saying to the retailers that unless you do things that enhance the brand, we\'re not going to sell to you.\"\r\nIn September, Ed Shaen, the owner of Sneakin\' In, an athletic shoe store in Bellmawr, New Jersey, got a letter in the mail from Nike saying that his account would be closed after 37 years.\r\n', 'Nathaniel Meyersohn', '2021-04-15 00:08:39'),
(2, 3, 2, 'Floating hotel concept creates its own electricity', 'Floating hotels have been popping up all over the world in recent years, with destinations like Dubai and Qatar leading the way with increasingly innovative and outlandish structures.', 'Not only does the luxury hotel design, which has 152 rooms, actually generate its own electricity, it also collects and reuses rainwater and food waste.\r\nAdopting the motto \"minimum energy loss and zero waste,\" the team at HAADS have worked with numerous experts, including ship construction engineers and architects, in order to devise the project, which has been in the works since March 2020.\r\nIf built, the floating structure will work in a similar way to a dynamo, utilizing the water current with wind turbines and tidal power as it rotates, converting the energy into electricity.\r\nIts movement is to be controlled by dynamic positioning, a computer-controlled system used to maintain the position and direction of ships, as well as propellers and thrusters.\r\nHowever, guests are unlikely to experience any dizziness, as it takes 24 hours for the hotel to spin a full 360 degrees.\r\nWhile the hotel will initially be based in Qatar if or when it\'s completed, the project can also be located anywhere with the right current due to its \"movable feature,\" according to the designers.', 'Tamara Hardingham-Gill', '2021-04-15 15:23:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `date_created`) VALUES
(1, 'sports', '2021-04-15 00:00:41'),
(2, 'business', '2021-04-15 00:01:24'),
(3, 'travel', '2021-04-15 15:19:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `article_id`, `username`, `content`, `date_created`) VALUES
(1, 2, 'Minn', 'Amazingggggg!!!', '2021-04-15 16:41:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `name`, `date_created`) VALUES
(1, 'new', '2021-04-15 00:05:02'),
(2, 'stay', '2021-04-15 15:20:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
