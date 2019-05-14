-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 04 月 24 日 10:42
-- 伺服器版本: 10.1.37-MariaDB
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `camping`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member_level`
--

CREATE TABLE `member_level` (
  `mem_level` int(11) NOT NULL,
  `level_title` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member_level`
--

INSERT INTO `member_level` (`mem_level`, `level_title`) VALUES
(1, '露營新手'),
(2, '業餘露營家'),
(3, '露營達人');

-- --------------------------------------------------------

--
-- 資料表結構 `member_list`
--

CREATE TABLE `member_list` (
  `mem_id` int(11) NOT NULL COMMENT '流水號',
  `mem_account` varchar(255) NOT NULL COMMENT '帳號',
  `mem_password` varchar(255) NOT NULL COMMENT '密碼',
  `mem_avatar` varchar(255) NOT NULL COMMENT '大頭貼',
  `mem_name` varchar(255) NOT NULL COMMENT '姓名',
  `mem_nickname` varchar(255) NOT NULL COMMENT '暱稱',
  `mem_gender` varchar(10) NOT NULL COMMENT '性別',
  `mem_birthday` date NOT NULL COMMENT '生日',
  `mem_mobile` varchar(255) NOT NULL COMMENT '手機',
  `mem_email` varchar(255) NOT NULL COMMENT '信箱',
  `mem_address` varchar(255) NOT NULL COMMENT '地址',
  `memLevel_id` int(11) NOT NULL COMMENT '會員等級',
  `mem_status` varchar(255) NOT NULL DEFAULT 'valid' COMMENT '狀態',
  `mem_signUpDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '註冊日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member_list`
--

INSERT INTO `member_list` (`mem_id`, `mem_account`, `mem_password`, `mem_avatar`, `mem_name`, `mem_nickname`, `mem_gender`, `mem_birthday`, `mem_mobile`, `mem_email`, `mem_address`, `memLevel_id`, `mem_status`, `mem_signUpDate`) VALUES
(1, 'testdog', 'admin', '', 'mr dog', 'doggy', 'male', '2019-03-16', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-17 18:50:09'),
(2, 'testcat', 'admin', '', 'ms cat', 'kitty', 'female', '2019-03-17', '0912345678', 'sammie0804@gms.tku.edu.tw', '224新北市瑞芳區柴寮路225號', 1, 'valid', '2019-03-18 09:50:43'),
(3, 'testrabbit', 'admin', '', 'mr rabbit', 'bunny', 'male', '2019-02-28', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 09:50:43'),
(4, 'testbear', 'admin', '', 'mr bear', 'bear papa', 'male', '2018-01-19', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 10:33:23'),
(5, 'testpig', 'admin', '', 'ms pig', 'piggy', 'female', '2018-06-21', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 10:33:23'),
(6, 'testtiger', 'admin', '', 'mr tiger', 'tiger bro', 'male', '2018-01-01', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 10:35:18'),
(7, 'testelephant', 'admin', '', 'mr elephant', 'elephant grandpa', 'male', '2018-01-02', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 10:35:18'),
(8, 'testcow', 'admin', '', 'ms cow', 'cow mama', 'female', '2018-03-01', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:20:06'),
(9, 'testsnake', 'admin', '', 'ms snake', 'snake sis', 'female', '2018-03-02', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:20:37'),
(10, 'testhorse', 'admin', '', 'mr horse', 'ponny', 'male', '2018-05-01', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:23:38'),
(11, 'testsheep', 'admin', '', 'ms sheep', 'mary', 'female', '2018-05-06', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:24:07'),
(12, 'testmonkey', 'admin', '', 'mr monkey', 'wuwu', 'male', '2001-04-18', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '0000-00-00 00:00:00'),
(13, 'testchicken', 'admin', '', 'mr chiecken', 'gugugu', 'male', '2008-06-17', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '0000-00-00 00:00:00'),
(14, 'testfrog', 'admin', '', 'ms frog', 'queen frog', 'female', '2001-02-28', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '0000-00-00 00:00:00'),
(15, 'testladybug', 'admin', '', 'ms ladybug', 'beauty', 'female', '2001-06-28', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:31:56'),
(16, 'testlion', 'admin', '', 'mr lion', 'knig lion', 'male', '2010-07-06', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:31:56'),
(17, 'testbird', 'admin', '', 'mr bird', 'birdy', 'male', '2003-09-27', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:31:56'),
(97, 'woody', 'admin', '', '胡迪', '', 'male', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 10:26:01'),
(99, 'nemo', 'admin', '', '尼莫', '', 'female', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 10:27:49'),
(100, 'dory', 'admin', '', '多利', '', 'female', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 10:28:11'),
(102, 'marlin', 'admin', '', '馬林', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 10:29:05'),
(103, 'buzz', 'admin', '', '巴斯', '', 'male', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 11:41:53'),
(104, 'tracy', 'admin', '', '翠絲', '', 'male', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 11:42:25'),
(105, 'elsa', 'admin', '', '愛爾莎', '', 'female', '0000-00-00', '0933222111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:37:57'),
(106, 'anna', 'admin', '', '安娜', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:42:32'),
(107, 'olaf', 'admin', '', '雪寶', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:45:10'),
(108, 'dumbo', 'admin', '', '小飛象', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:45:40'),
(109, 'mcqueen', 'admin', '', '麥昆', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:46:38'),
(110, 'lumière', 'admin', '', '路米亞', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:47:11'),
(111, 'chip', 'admin', '', '阿齊', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:48:25'),
(112, 'belle', 'admin', '', '貝爾', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:48:48'),
(113, 'beast', 'admin', '', '野獸', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:49:16'),
(114, 'baymax', 'admin', 'avatar_pictures/ac5f99da05795979c8740851f7b9a22161a6aa4d.jpg', '杯麵', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:49:57'),
(115, 'wall.e', 'admin', 'avatar_pictures/521f873240adb3a87cea0a0302cd1d895693cc41.jpg', '瓦力', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-19 13:50:22'),
(137, 'poke_mouse', 'admin', 'avatar_pictures/749db026cae969bf03c4a9954de3bc762937784a.png', '皮卡丘', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-03-20 11:27:58'),
(138, 'poke_turtle', 'admin', 'avatar_pictures/9d1c797807682cc9959bc5f2c64f0a317cde4313.png', '傑尼龜', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 2, 'valid', '2019-03-20 11:28:34'),
(139, 'poke_dragon', 'admin', 'avatar_pictures/fed34de4f1dd7f968f9d56902dd16397b956b531.png', '小火龍', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', '', 1, 'valid', '2019-03-20 13:46:21'),
(140, 'poke_frog', 'admin', 'avatar_pictures/1eef3c4c8ddda2e391fc64dae23f5e1504f54818.png', '妙娃種子', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 2, 'valid', '2019-03-20 15:13:49'),
(141, 'pluto', 'admin', 'avatar_pictures/054e40d9006f6cd8323d23e9fca4ae9dbbb57af2.jpg', '布魯托', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-03-20 15:33:56'),
(142, 'sadaharu', 'admin', 'avatar_pictures/47de8a071e2ec39b016ac395186ddbd9462febb0.jpg', '定春', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', '', 1, 'valid', '2019-03-20 15:36:55'),
(146, 'snoopy', 'admin', 'avatar_pictures/2b299bfae4b3abd298e32a4a6f39fb018124a10e.png', '史奴比', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-03-20 17:02:13'),
(147, 'totoro', 'admin', 'avatar_pictures/3b7f66c582cd2e0f6ffb3e9b53891c357b8f6870.jpg', '龍貓', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-03-20 17:04:29'),
(149, 'linus', 'admin', 'avatar_pictures/aa65c8c215e76156b3543d5e779f1b3a6e6420c7.png', '奈勒斯', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '106台北市大安區復興南路一段390號', 3, 'valid', '2019-03-20 17:07:41'),
(151, 'peppermint_patty', 'admin', 'avatar_pictures/43bbe548bedcbd4fa302709386931298981d27e9.jpg', '佩蒂', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '', 2, 'valid', '2019-03-20 18:23:22'),
(156, 'mickey', 'admin', 'avatar_pictures/764eff082badca0af52cc0a39150dd4ff69b1429.jpg', '米奇', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', '971花蓮縣新城鄉七星街79巷5號', 1, 'valid', '2019-03-21 11:27:20'),
(157, 'minions_bob', 'admin', 'avatar_pictures/7931fb51d559933afac9a94aab2bb69515f25884.jpg', '巴柏', '小小兵', 'male', '0000-00-00', '0933333333', 'sammie0804@gms.tku.edu.tw', '106台北市大安區信義路二段194號', 1, 'valid', '2019-03-26 15:38:45'),
(158, 'minions_kevin', 'admin', 'avatar_pictures/3842d2204bfedd78775ac53d060556bce49e9dbc.jpg', '凱文', '', 'male', '0000-00-00', '0933333333', 'sammie0804@gms.tku.edu.tw', '104台北市中山區民生東路三段67號', 3, 'valid', '2019-03-26 15:42:14'),
(159, 'minions_stuart', 'admin', 'avatar_pictures/381fad2a5aeb33fc22c6ef10290867d6dddc34fc.jpg', '史都華', '', 'male', '0000-00-00', '0933333333', 'sammie0804@gms.tku.edu.tw', '103台北市大同區民族西路141號', 2, 'valid', '2019-03-26 15:43:31'),
(171, 'winnie', 'admin', 'avatar_pictures/0a32cf9a444f5180de1493d12508d65c265304d7.jpg', '小熊維尼', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '234新北市永和區中山路一段177號', 1, 'valid', '2019-03-28 17:07:33'),
(172, 'piglet', 'admin', 'avatar_pictures/35d3f88671dc07d4c87eefa228f546654b518ac9.jpg', '小豬', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '114台北市內湖區舊宗路一段268號', 2, 'valid', '2019-03-28 17:14:18'),
(173, 'Eeyore', 'admin', 'avatar_pictures/d64cc02e6a8c8e169b25b051b5397d603da037f9.jpg', '屹耳', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '946屏東縣恆春鎮燈塔路90號', 2, 'valid', '2019-03-28 17:26:13'),
(174, 'tigger', 'admin', 'avatar_pictures/58fcb98f7c56a5a5b40775606e5db641a7672414.jpg', '跳跳虎', '', 'male', '0000-00-00', '0913245678', 'sammie0804@gms.tku.edu.tw', '244新北市林口區文化三路一段356號', 1, 'valid', '2019-03-28 18:28:57'),
(175, 'kakao_ryan', 'admin', 'avatar_pictures/15362d8476a5bebc4d3ee24ff6b90802c783462a.jpg', '萊恩', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:05:13'),
(177, 'pumbaa', 'admin', '', '彭彭', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:12:15'),
(180, 'simba', 'admin', '', '辛巴', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:18:20'),
(181, 'rafiki', 'admin', '', '拉菲其', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:18:39'),
(182, 'mufasa', 'admin', '', '木法沙', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:20:28'),
(183, 'carl', 'admin', '', '卡爾爺爺', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:22:12'),
(184, 'ellie', 'admin', '', '愛莉奶奶', '', 'female', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:23:32'),
(185, 'bambi', 'admin', '', '小鹿斑比', '', 'female', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 1, 'valid', '2019-04-04 16:27:23'),
(186, 'sadness', 'admin', 'avatar_pictures/13ef1c2758e034dd005d6ba5d269f700e07b280a.jpg', '憂憂', '', 'female', '0000-00-00', '0977777777', 'sammie0804@gms.tku.edu.tw', '106台北市大安區忠孝東路四段205巷26弄', 2, 'valid', '2019-04-08 09:22:19');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `member_level`
--
ALTER TABLE `member_level`
  ADD PRIMARY KEY (`mem_level`);

--
-- 資料表索引 `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `mem_account` (`mem_account`) USING BTREE;

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `member_level`
--
ALTER TABLE `member_level`
  MODIFY `mem_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `member_list`
--
ALTER TABLE `member_list`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=187;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
