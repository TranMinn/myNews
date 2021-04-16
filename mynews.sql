-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2021 lúc 05:17 AM
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
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `article`
--

INSERT INTO `article` (`id`, `cate_id`, `tag_id`, `title`, `intro`, `image`, `content`, `author`, `date_created`) VALUES
(1, 2, 1, 'Nikes are getting harder to find at stores. Here\'s why', 'Struggling to find Nike sneakers at your neighborhood shoe store? That\'s by design.', 'nike.jpg', 'Nike wants customers to buy more of its shoes, clothing and gear at Nike stores and on Nike.com and its apps, as well as at a more limited group of retailers like Dick\'s Sporting Goods (DKS) and Foot Locker (FL). So the company in recent years has slashed the number of traditional retailers it sells its goods to while shifting to grow directly through its own channels, especially online. That has affected big and small retailers. In addition to pulling out of some independently owned stores, Nike (NKE) also ended a partnership selling on Amazon (AMZN) in 2019. Nike has not disclosed which retailers specifically it has cut ties with.\r\nThe company\'s move away from a primarily wholesale distribution model is a departure from the early decades of Nike. Small, independent sneaker retailers were key to growing Nike\'s popularity in the company\'s early days, when people found out about upcoming shoe releases from visiting the local shop. But Nike has said it can make more than double the profit selling goods through its own website and physical stores than it can through wholesale partners.\r\nNike gets to control the shopper experience more tightly and the prices at which products are sold when it goes directly to consumers. That\'s a big deal for Nike, a premium brand that wants to ensure merchandise is showcased to customers in enticing ways and prevent products from being discounted too heavily.\r\nNike is eliminating what it calls \"undifferentiated\" retail partners — stores that are \"plopping Nike stuff on their shelf or website and hoping somebody finds it,\" said Sam Poser, an analyst at Williams Trading who covers the company. Nike is \"saying to the retailers that unless you do things that enhance the brand, we\'re not going to sell to you.\"\r\nIn September, Ed Shaen, the owner of Sneakin\' In, an athletic shoe store in Bellmawr, New Jersey, got a letter in the mail from Nike saying that his account would be closed after 37 years.\r\n', 'Nathaniel Meyersohn', '2021-04-15 00:08:39'),
(2, 3, 2, 'Floating hotel concept creates its own electricity', 'Floating hotels have been popping up all over the world in recent years, with destinations like Dubai and Qatar leading the way with increasingly innovative and outlandish structures.', 'floating_hotel.jpg', 'Not only does the luxury hotel design, which has 152 rooms, actually generate its own electricity, it also collects and reuses rainwater and food waste.\r\nAdopting the motto \"minimum energy loss and zero waste,\" the team at HAADS have worked with numerous experts, including ship construction engineers and architects, in order to devise the project, which has been in the works since March 2020.\r\nIf built, the floating structure will work in a similar way to a dynamo, utilizing the water current with wind turbines and tidal power as it rotates, converting the energy into electricity.\r\nIts movement is to be controlled by dynamic positioning, a computer-controlled system used to maintain the position and direction of ships, as well as propellers and thrusters.\r\nHowever, guests are unlikely to experience any dizziness, as it takes 24 hours for the hotel to spin a full 360 degrees.\r\nWhile the hotel will initially be based in Qatar if or when it\'s completed, the project can also be located anywhere with the right current due to its \"movable feature,\" according to the designers.', 'Tamara Hardingham-Gill', '2021-04-15 15:23:06'),
(3, 4, 3, 'Marvel shows off its deep bench of characters in \'Falcon\' and \'WandaVision\'', 'Marvel Comics was built on titles with a 60-year history, like Fantastic Four, Spider-Man and the Hulk. But some of the characters recently getting attention and lighting up social media have names like Sharon Carter, Jimmy Woo and the Dora Milaje.', 'marvel.jpg', 'When \"Captain America: The First Avenger\" and \"Thor\" hit theaters a decade ago, the contours of Marvel\'s plans for a cinematic universe -- building toward the \"Avengers\" -- took shape. Yet even for those weaned on the comics, the latest phase of Marvel\'s expansion has been notably defined by the depth of its bench, and the remarkable mileage extracted from less-familiar characters.\r\nThe marquee heroes used to launch Marvel onto streaming service Disney+ have been Wanda and the Vision, and the Falcon and the Winter Soldier. Those two projects, however, have been enriched by deftly incorporating peripheral players, eliciting enthusiastic responses from fans.\r\nWakandan bodyguards the Dora Milaje? Quicksilver? SHIELD agent Sharon Carter, astrophysicist Darcy Lewis, and FBI agent Jimmy Woo? Those personalities and others have cropped up in the Disney+ shows, reflecting the breadth of the Marvel Cinematic Universe, and underscoring the seamless way Marvel has mixed and matched talent in building its interlocking titles.\r\nIf Marvel has made this look organic, even easy, it wasn\'t always thus. Indeed, while one could envision the big-screen possibilities for properties like Spider-Man and X-Men (produced, incidentally, through other studios after Marvel Comics sold off the rights), the further producers reached into the grab bag, the more tenuous the commercial prospects always appeared to become.\r\nFrom that perspective, the most important movie in building the current Marvel mystique in hindsight might have been \"Guardians of the Galaxy,\" conjuring a major hit out of the spacefaring team of misfits in 2014. If Marvel fans were ready to buy a talking raccoon and tree, the sky -- or rather, universe -- really was the limit.\r\nMarvel followed that the next year with \"Ant-Man,\" which turned the one-time \"Saturday Night Live\" punchline into an unlikely success; and then demonstrated just how many heroes could be crammed into one movie with \"Captain America: Civil War,\" which featured a battle involving a dozen characters and, among other things, introduced Black Panther before his solo movie in 2018.\r\nFor those weaned on the signature comics created by Stan Lee with artists Jack Kirby and Steve Ditko in the 1960s, the depth and breadth of Marvel\'s current appeal is beyond anything they could have reasonably expected, especially after some of the clunky adaptations from its early days. That\'s especially true since the Marvel/Disney tandem has yet to put its imprint on the title that started it all, Fantastic Four, after underwhelming attempts under the cinematic stewardship of Fox.\r\nMarvel has approached its first Disney+ shows with the same sense of interconnectedness that has powered its roster of movies, which brought everyone together in spectacular fashion with \"Avengers: Endgame.\" That film also marked the exit of two signature characters, Iron Man and Captain America, leaving some very sizable shoes to fill, with the latter\'s legacy providing the essence of the latest series.\r\nWhile streaming occupies a different space than theatrical movie-going, \"WandaVision\" and \"The Falcon and the Winter Soldier\" have already demonstrated the advantages of using Disney+ as a lab to develop and explore characters that might not be ready for a $200-million blockbuster.\r\nWith the planned next phase of movies delayed during the pandemic, the immediate road map as those films roll out is pretty clear. The lineup includes \"Black Widow,\" a number of eagerly anticipated sequels and another big bet in \"The Eternals.\"\r\nStill, the way Marvel has deployed its troops in these first shows for Disney+ has flexed the company\'s muscles in unexpected ways, opening the doors, appropriately, to whole new worlds of possibilities.', 'Brian Lowry', '2021-04-16 09:47:52'),
(4, 5, 6, 'The Duke of Edinburgh\'s classic sartorial legacy', 'Throughout his life, the late Prince Philip proved to be a master of quintessentially British dress codes.', 'phillip_prince.jpg', 'While he might not have been the most talked-about royal style icon in recent years, Prince Philip, Duke of Edinburgh\'s fashion choices were those of a confident dresser, dedicated to channeling classic British style.\r\nThe duke had a look thoroughly appropriate for every occasion. He moved seamlessly from formal navy uniform and black-tie attire to laid-back outfits better suited to family shooting weekends at Balmoral castle in Scotland.\r\nHis gentlemanly approach to fashion meant that over 73 years of his marriage to Queen Elizabeth II, his ensembles complemented but never overshadowed her.\r\nTo Dylan Jones, editor-In-chief of GQ and menswear chairman of the British Fashion Council, the duke was a \"true sartorial connoisseur\" who \"always dressed according to the rules.\"\r\n\"He had dignity, style and decorum,\" Jones wrote via email.\r\nThroughout his life Prince Philip would call on the services of many of the established and palace-approved ateliers on London\'s Savile Row. Perfectly cut suits, often fitted by his longtime tailor John Kent, were of course a staple in his wardrobe. His robemaker was London\'s oldest tailor, Ede & Ravenscroft, which was established in 1689, while Davies & Son handled his military attire and Gieves & Hawkes his naval dress. For kilts, the Prince Philip regularly enlisted the services of Kinloch Anderson in Edinburgh.\r\nWhile his impeccable standards are what defined his style, older photos of a young Philip show he wasn\'t afraid to have fun with his sartorial choices.\r\nMost British men in the 1940s preferred a clean-shaven look, but a candid portrait taken during a naval visit to Australia in 1945 reveals a bearded Philip in his mid-20s, smiling mischievously into the camera. Six years later, while on a royal tour in Canada, the duke danced at a traditional hoedown in blue jeans, a plaid shirt and a neckerchief to complete the look.\r\nA fan of cricket, polo and various water sports, he was often spotted in sportswear. A black-and-white photo taken in Turkey in 1951 during a summer cruise with the Royal Navy shows a svelte Prince Philip jumping off a set of water skis onto dry land, one of many action shots snapped of the handsome royal throughout his younger years.\r\nPrince Philip\'s preferred color palette was mostly muted, but his outfit for his 25th wedding anniversary with the Queen offered a rare splash of color. Their silver wedding celebrations took place in 1972 aboard the Royal Yacht Britannia, and in one photograph, the smiling couple are in visible holiday-mode, sunglasses and all. The Queen is pictured smiling brightly at her husband who is dressed in a boldly printed blue short-sleeved shirt and chinos.\r\nAs the longest serving consort in British history, Prince Philip was dutiful in life and style and will be remembered for his astute choices and his ability to use fashion to honor the spirit of almost any moment.\r\nHe was recognized for that ability in 2016, when he made it onto GQ\'s \"50 Best-Dressed Men in Britain\" list at the age of 94. Coming in at number 12, he even outranked his grandson Prince Harry who was placed 38th.\r\nWhen asked what secured the duke\'s spot high on the list, Jones said, \"His attention to detail and for always dressing like a gentleman. He had an innate gift for always looking appropriate.\"', 'Fiona Sinclair Scott', '2021-04-16 09:54:51'),
(5, 6, 7, 'Biden says sanctions against Russia are proportionate response: \'Now is the time to de-escalate\'', 'President Joe Biden said Thursday that the newly announced sanctions against Russia are a proportionate response to cyberattacks against the US and interference in two presidential elections, but also emphasized that \"now is the time to de-escalate\" tensions with the country.', 'biden_pre.jpg', 'Biden said during remarks at the White House that he told Russian President Vladimir Putin in a call earlier in the week that he could have gone further with the measures. While he wanted to avoid escalating tensions, Biden made clear that he will not hesitate to take further action in the future.\r\n\"We cannot allow a foreign power to interfere in our democratic process with impunity,\" Biden said.\r\nHe added, \"I told (Putin) that we would shortly be responding in a measured and proportionate way because we had concluded that they had interfered in the election and SolarWinds was ... totally inappropriate.\"\r\nThe administration announced earlier Thursday that it was hitting Russia with sweeping sanctions and diplomatic expulsions, punishing Moscow for its interference in the 2020 US election, its SolarWinds cyberattack and its ongoing occupation and \"severe human rights abuses\" in Crimea.\r\nThe President said the US \"is not looking to kick off a cycle of escalation and conflict in Russia. We want a stable, predictable relationship,\" before sending a warning: \"If Russia continues to interfere with our democracy, we\'re prepared to take further actions to respond.\"\r\nBiden did offer an olive branch, referencing the summit he has proposed with the Russian leader that he hopes will take place later on this summer in Europe.\r\n\"Now is the time to de-escalate,\" he said. \"The way forward is through thoughtful dialogue and diplomatic process.\"\r\nAs part of Thursday\'s announcement, the US formally named the Russian Foreign Intelligence Service as the force behind the SolarWinds hack that affected the federal government and wide swaths of the private sector. The White House also said that it is expelling 10 Russian diplomats from Washington, including \"representatives of Russian intelligence services,\" for the cyber hack and the election meddling.\r\nThe Biden administration is barring US financial institutions from participating in the primary market for bonds issued by Russia\'s central bank and other leading financial institutions. The US is also sanctioning six Russian tech companies that support the Russian intelligence services\' cyber program, as well as 32 entities and individuals for carrying out \"Russian government-directed attempts to influence the 2020 US presidential election,\" the administration said in a fact sheet. Another eight individuals and entities are being sanctioned for \"Russia\'s ongoing occupation and repression in Crimea.\"\r\nIt\'s not clear how much the Biden administration\'s moves will change Putin\'s behavior. Biden did not directly answer whether the Russian president gave him any indication that he was willing to change, but told CNN\'s Phil Mattingly that he urged Putin \"to respond appropriately.\"\r\n\"We indicated we would talk about it,\" Biden said in response to Mattingly\'s question on Putin\'s attitude.\r\n\"I urged him to respond appropriately, not to exceed it because we can move as well. My hope and expectation is we\'ll be able to work out modus vivendi but it\'s important that we have direct talks and we continue to be in contact with one another,\" Biden added.\r\nThe President emphasized that there are places where the US and Russia can work together. He cited the New START treaty between the two nations and work \"reining in nuclear threats from Iran and North Korea, ending this pandemic globally and meeting the existential crisis of climate change.\"\r\n\"It is in the interest of the United States to work with Russia -- we should, and we will. When Russia seeks to violate the interests of the United States we will respond. We\'ll always stand in defense of our country, our institutions, our people and our allies,\" Biden said.\r\nThe White House has also addressed the omission of sanctions against Russia for other issues.\r\nBiden said during his remarks on Thursday that the issue of Nord Stream 2 -- a natural gas pipeline between Russia and Germany -- is still \"at play.\" And earlier Thursday, White House press secretary Jen Psaki said that the Biden administration feels \"there are questions to be answered by the Russian government\" about Russia allegedly placing bounties on US service members in Afghanistan.\r\nAhead of the potential summer summit, Biden may take part in meetings with Putin next week. The Russian president is among the dozens of world leaders invited to a virtual summit on climate change hosted by the White House.\r\nRussia\'s Foreign Intelligence Service (SVR) dismissed the US intelligence determination that it was responsible for the SolarWinds hack, Russian state news agency TASS reported Thursday.\r\nA statement released ahead of Biden\'s remarks was signed by the SVR\'s head of press and was titled \"Cinema and that\'s it\" -- a nod to the fact the SVR considers the US intelligence assessment a work of fiction. TASS reported the SVR considers the US\'s determination \"far-fetched\" and \"nonsense.\"', 'Donald Judd, Nicole Gaouette and Allie Malloy', '2021-04-16 09:59:36');

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
(3, 'travel', '2021-04-15 15:19:51'),
(4, 'entertainment', '2021-04-16 09:44:54'),
(5, 'style', '2021-04-16 09:48:40'),
(6, 'politics', '2021-04-16 09:48:48');

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
(2, 'stay', '2021-04-15 15:20:46'),
(3, 'celeb', '2021-04-16 09:45:45'),
(4, 'arts', '2021-04-16 09:49:52'),
(5, 'beauty', '2021-04-16 09:49:52'),
(6, 'fashion', '2021-04-16 09:50:47'),
(7, 'politics', '2021-04-16 09:56:32');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
