-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 06:30 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `neybours`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 1, 7, 'nyc', 'henly_desagu_789180', '2020-09-17 08:58:08'),
(2, 1, 7, 'gfyghbjuh', 'henly_desagu_789180', '2020-09-17 10:59:53'),
(3, 3, 7, 'jun454iot5', 'henly_desagu_789180', '2020-09-18 09:39:54'),
(4, 6, 4, 'h4rfoji4rj', 'henly_desagu_789180', '2020-09-24 07:52:45'),
(5, 10, 4, 'hi', 'agnes_njeri_239278', '2020-10-10 16:26:15'),
(6, 13, 4, 'lkg grt', 'wako_soma_758554', '2020-11-14 07:03:31'),
(7, 13, 4, 'lkg ', 'wako_soma_758554', '2020-11-14 07:03:58'),
(8, 17, 4, 'hi', 'wako_soma_758554', '2020-11-14 08:38:22'),
(9, 11, 6, 'hi', 'wako_soma_758554', '2020-11-14 08:38:48'),
(10, 10, 4, 'tygquijs;o2e2wk1de3bhkidr3lj2enhdyu3ifkrnjql;,wskwye2wpo1;', 'wako_soma_758554', '2020-11-24 07:44:16'),
(11, 10, 4, 'hi', 'wako_soma_758554', '2020-11-24 07:50:14'),
(12, 13, 4, 'lokk', 'wako_soma_758554', '2020-11-26 11:13:17'),
(13, 10, 4, 'hi', 'wako_soma_758554', '2020-11-26 11:24:09'),
(14, 10, 8, 'home', '', '2020-11-26 11:59:16'),
(15, 10, 8, 'home again', 'wako_soma_758554', '2020-11-26 12:05:08'),
(16, 10, 8, 'hey', 'wako_soma_758554', '2020-11-26 17:52:36'),
(17, 13, 8, 'lkg nyc', 'wako_soma_758554', '2020-11-26 18:10:14'),
(18, 14, 4, 'hi', 'henly_desagu_789180', '2020-11-27 15:38:36'),
(19, 24, 4, 'nyc post', 'henly_desagu_789180', '2020-11-28 07:55:02'),
(20, 11, 4, 'huybu', 'henly_desagu_789180', '2020-11-28 08:56:37'),
(21, 11, 4, 'gybkhuyjik', 'henly_desagu_789180', '2020-11-28 08:56:43'),
(22, 11, 4, 'jbwdkjwmkle', 'henly_desagu_789180', '2020-11-28 13:03:15'),
(23, 11, 4, 'hi', 'henly_desagu_789180', '2020-11-28 13:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(4, 8, 10),
(5, 8, 13),
(6, 8, 17),
(7, 8, 16),
(8, 4, 11),
(9, 4, 20),
(10, 4, 17),
(11, 4, 16),
(12, 4, 23),
(13, 4, 19),
(14, 4, 13),
(15, 4, 26),
(16, 8, 25),
(17, 8, 23),
(18, 8, 23),
(19, 8, 26),
(20, 8, 26),
(21, 8, 26),
(22, 8, 26),
(23, 8, 26),
(24, 8, 20),
(25, 8, 20),
(26, 8, 20),
(27, 8, 20),
(28, 8, 20),
(29, 8, 15),
(30, 8, 14),
(31, 8, 12),
(32, 8, 12),
(33, 8, 9),
(34, 8, 8),
(35, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `dist_diff` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `user_id`, `user_from`, `dist_diff`) VALUES
(5503, 1, 0, 3559.62),
(5504, 2, 0, 4002.82),
(5505, 3, 0, 4114.01),
(5506, 5, 0, 648.123),
(5507, 6, 0, 4410.72),
(5508, 1, 0, 3559.62),
(5509, 2, 0, 4002.82),
(5510, 3, 0, 4114.01),
(5511, 5, 0, 648.123),
(5512, 6, 0, 4410.72),
(5513, 1, 0, 3559.62),
(5514, 2, 0, 4002.82),
(5515, 3, 0, 4114.01),
(5516, 5, 0, 648.123),
(5517, 6, 0, 4410.72),
(5518, 1, 0, 3559.62),
(5519, 2, 0, 4002.82),
(5520, 3, 0, 4114.01),
(5521, 5, 0, 648.123),
(5522, 6, 0, 4410.72),
(5523, 1, 0, 3559.62),
(5524, 2, 0, 4002.82),
(5525, 3, 0, 4114.01),
(5526, 5, 0, 648.123),
(5527, 6, 0, 4410.72),
(5528, 1, 0, 3559.62),
(5529, 2, 0, 4002.82),
(5530, 3, 0, 4114.01),
(5531, 5, 0, 648.123),
(5532, 6, 0, 4410.72),
(5533, 1, 0, 3559.62),
(5534, 2, 0, 4002.82),
(5535, 3, 0, 4114.01),
(5536, 5, 0, 648.123),
(5537, 6, 0, 4410.72),
(5538, 1, 0, 3559.62),
(5539, 2, 0, 4002.82),
(5540, 3, 0, 4114.01),
(5541, 5, 0, 648.123),
(5542, 6, 0, 4410.72),
(5543, 1, 0, 3559.62),
(5544, 2, 0, 4002.82),
(5545, 3, 0, 4114.01),
(5546, 5, 0, 648.123),
(5547, 6, 0, 4410.72),
(5548, 1, 0, 3559.62),
(5549, 2, 0, 4002.82),
(5550, 3, 0, 4114.01),
(5551, 5, 0, 648.123),
(5552, 6, 0, 4410.72),
(5553, 1, 0, 3559.62),
(5554, 2, 0, 4002.82),
(5555, 3, 0, 4114.01),
(5556, 5, 0, 648.123),
(5557, 6, 0, 4410.72),
(5558, 1, 0, 3559.62),
(5559, 2, 0, 4002.82),
(5560, 3, 0, 4114.01),
(5561, 5, 0, 648.123),
(5562, 6, 0, 4410.72),
(5563, 1, 0, 3559.62),
(5564, 2, 0, 4002.82),
(5565, 3, 0, 4114.01),
(5566, 5, 0, 648.123),
(5567, 6, 0, 4410.72),
(5568, 1, 0, 3559.62),
(5569, 2, 0, 4002.82),
(5570, 3, 0, 4114.01),
(5571, 5, 0, 648.123),
(5572, 6, 0, 4410.72),
(5573, 1, 0, 3559.62),
(5574, 2, 0, 4002.82),
(5575, 3, 0, 4114.01),
(5576, 5, 0, 648.123),
(5577, 6, 0, 4410.72),
(5694, 4, 8, 5038.34),
(5695, 5, 8, 648.123);

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL,
  `token` char(64) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `token`, `user_id`) VALUES
(5, '1432c9fd192bbde5357125aa6aa433ee3c6f758c0aea8f40240d581aa17cd706', 8),
(6, 'eae3520dd65fddf032cfb9b90d31e3f64df5fd2676459c7528ae6aa6156d1f06', 8),
(7, '2d75a9409c3589b5ae7f050d2ef684633275616f1a14208b185defd03bac41c4', 8),
(8, 'aa198d05cef90b58b71d771e3235143f740358068dcdbed0e18fb40749054b4d', 8),
(9, '1c44f0d571d9f80103d03e54d8f11572e545df96d1a63c1e0b9a3ba03acbed4d', 8),
(10, '31c4daf22b7ff9cb1df5701481ea0148622776c43aabe21fae9dcc0171421d21', 8),
(11, 'cf61b65948b86e7773d498c5808775ef98d921a0', 8),
(12, '276b3c44c40d28630d33d3b9d6e81e869845f4a1', 8),
(13, '662abba701d5ff8038808f3e0131ce427a071072', 8),
(14, '6ba19d241980aa79c4220792f4992466324996fb', 8),
(15, '9ac87a56f99e519625fca22fcdfbf71a4f903ce0', 8),
(16, 'e4616b555672d59e40e8dafacf8cda6779855d1c', 8);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 881554550, 655807680, 'hello pal'),
(2, 655807680, 881554550, 'hello tw'),
(3, 655807680, 881554550, 'haejdnhjd'),
(4, 655807680, 881554550, 'dhewjdneijd'),
(5, 655807680, 881554550, '3r4356y65432w 45tyu78uy6 rt5y67u8i75 46y576u65re'),
(6, 655807680, 881554550, 'am good'),
(7, 881554550, 655807680, 'am good too'),
(8, 655807680, 881554550, 'rioforp'),
(9, 10, 8, 'fgcui'),
(10, 10, 8, 'ppl'),
(11, 9, 8, 'hwswd'),
(12, 5, 8, 'hello sister'),
(13, 4, 8, 'tyuih');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`, `post_likes`) VALUES
(1, 7, 'hey     ', '', '2020-09-17 08:57:44', 0),
(4, 7, 'r4u5et67io', 'WIN_20200720_20_25_04_Pro.jpg.61', '2020-09-18 11:44:41', 0),
(7, 5, 'hi', 'WIN_20200514_15_22_21_Pro.jpg.64', '2020-09-28 18:53:34', 0),
(8, 5, 'wqygildxho;pew', 'WIN_20200720_20_24_59_Pro.jpg.39', '2020-09-28 18:59:55', 2),
(9, 5, 'kip;[', 'WIN_20200720_20_25_29_Pro.jpg.9', '2020-09-28 19:15:03', 1),
(10, 4, 'hi ppl', 'WIN_20200720_20_24_02_Pro.jpg.19', '2020-09-29 09:10:50', 3),
(11, 6, 'iyqiwiudejoi', 'WIN_20200506_09_24_44_Pro.jpg.32', '2020-09-29 09:16:28', 1),
(12, 5, 'jw', 'Bito_20200725_155924[1].jpg.47.61.85', '2020-10-01 09:40:24', 2),
(13, 4, 'iuo4i', 'Bito_20200725_155924[1].jpg.47.61.21', '2020-10-01 09:41:56', 1),
(14, 5, 'hey pep', '', '2020-10-10 16:18:43', 1),
(15, 5, 'hi', '', '2020-10-14 10:44:32', 1),
(16, 4, 'hi', '', '2020-10-14 10:45:16', 2),
(17, 4, 'No', 'Bito_20200725_155924[1].jpg.47.61.85.40', '2020-10-14 10:45:35', 1),
(19, 8, 'hhjkelrfklf', '', '2020-11-16 12:19:40', 1),
(20, 8, 'fghgbjn', '', '2020-11-23 12:39:33', 6),
(23, 8, 'No', 'WIN_20200514_15_22_21_Pro.jpg.51', '2020-11-26 10:46:09', 3),
(24, 4, 'hey me', '', '2020-11-28 07:54:21', 0),
(25, 4, 'hhjisakdkef', 'WIN_20200720_20_25_04_Pro.jpg.51', '2020-12-02 07:13:27', 1),
(26, 4, 'hgjklksdkpo', 'WIN_20200720_20_26_01_Pro.jpg.40', '2020-12-02 07:53:40', 6),
(27, 8, 'No', 'WIN_20200506_09_24_44_Pro.jpg.54', '2020-12-15 08:48:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `describe_user` text NOT NULL,
  `Relationship` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` date NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `user_reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL,
  `user_latitude` double NOT NULL,
  `user_longitude` double NOT NULL,
  `user_search` varchar(60) NOT NULL,
  `user_region` text NOT NULL,
  `user_city` text NOT NULL,
  `user_country` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `describe_user`, `Relationship`, `user_pass`, `user_email`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `user_reg_date`, `status`, `posts`, `recovery_account`, `user_latitude`, `user_longitude`, `user_search`, `user_region`, `user_city`, `user_country`) VALUES
(1, 'robert', 'jaja', 'robert_jaja_397529', 'hey', '...', '$2y$10$FkpNH9yLacO2vSMUSyItP./Kj5klUhN4c7yP2Vf56JBeSFynQzxDW', 'robertkaranja200@gmail.com', 'MALE', '0000-00-00', '...', '...', '0000-00-00 00:00:00', 'verified', 'no', 'hey', -1, 32, '', '', '', ''),
(2, 'james', 'dyon', 'james_dyon_31414', 'hey', '...', '$2y$10$XiY2aE.yiaHtgW2Ws5LV4eTbSRo8GHAOi5bAQ7mU.RE/aIo9Kq/H6', 'jamesdyon200@gmail.com', 'MALE', '0000-00-00', '...', '...', '0000-00-00 00:00:00', 'verified', 'no', 'hey', 0, 36, '', '', '', ''),
(3, 'jaja', 'jajak', 'jaja_jajak_155644', 'hey', '...', '$2y$10$FK.aU/oWtm6MLZASP3iuNeV5Pai6yIRO0AYrPREvLDJAOOBCbtzoG', 'jajak200@gmail.com', 'MALE', '0000-00-00', '...', '...', '0000-00-00 00:00:00', 'verified', 'no', 'hey', 0, 37, '', '', '', ''),
(4, 'henly', 'desagu', 'henly_desagu_789180', 'hey', '...', '12345678', 'henly200@gmail.com', 'MALE', '0000-00-00', 'WIN_20200720_20_24_16_Pro.jpg.61', '...', '0000-00-00 00:00:00', 'verified', 'yes', 'hey', 6, 45, 'thika', 'Nairobi Province', 'Thika', 'Kenya'),
(5, 'agnes', 'njeri', 'agnes_njeri_239278', 'hey', '...', '2345678', 'agnes200@gmail.com', 'FEMALE', '0000-00-00', 'Bito_20200725_155924[1].jpg.47.36.99', '...', '0000-00-00 00:00:00', 'verified', 'yes', 'hey', -3, 5, 'jjioi', '', '', 'kenya'),
(6, 'paul', 'kariuki', 'paul_kariuki_474498', 'hey', '...', '87654321', 'paul@gmail.com', 'MALE', '0000-00-00', '...', '...', '0000-00-00 00:00:00', 'verified', 'yes', 'hey', 20, 35, '', '', '', ''),
(7, 'joyce', 'wangari', 'joyce_wangari_613363', 'proud of my neighbourhood', 'complicated', '234567890', 'joyce@gmail.com', 'FEMALE', '2000-03-12', '...', '...', '2020-10-27 14:47:32', 'verified', 'no', 'hey', 0, 0, '', '', '', ''),
(8, 'wako', 'soma', 'wako_soma_758554', 'proud of my neighbourhood', 'married', 'episode200', 'soma200@gmail.com', 'Female', '2003-11-23', '126486.svg.100', '...', '2020-10-31 17:50:33', 'verified', 'yes', '                          jona       ', 0, 0, 'nairobi', 'Nairobi Province', 'Thika', 'Kenya'),
(9, 'mwanis', 'jabito', 'mwanis_jabito_923403', 'proud of my neighbourhood', 'complicated', '1234567', 'jabito200@gmail.com', 'MALE', '2019-02-11', 'images/126486.svg', '...', '2020-11-28 07:28:43', 'verified', 'no', 'hey', 0, 0, '', '', '', ''),
(10, 'bito', 'bito2', 'bito_bito2_258172', 'proud of my neighbourhood', 'complicated', '12345678', 'bito200@gmail.com', 'FEMALE', '2020-11-29', 'images/126486.svg', '...', '2020-12-07 05:25:51', 'verified', 'no', 'hey', 0, 0, '', '', '', ''),
(11, 'rtyhujio', 'dthfyhgbjun', 'rtyhujio_dthfyhgbjun_669344', 'proud of my neighbourhood', 'complicated', '345678', 'edtrfgyuhi@gmail.com', 'MALE', '2020-12-03', 'images/126486.svg', '...', '2020-12-07 05:28:52', 'verified', 'no', 'hey', 0, 0, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5696;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
