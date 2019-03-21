-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 21 日 10:42
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
-- 資料庫： `mark1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `issue_condi` int(11) NOT NULL COMMENT '發放條件',
  `coupon_valid` int(2) NOT NULL,
  `coupon_expire` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `coupon_code`, `created_at`, `dis_num`, `dis_type`, `issue_condi`, `coupon_valid`, `coupon_expire`, `user_id`) VALUES
(44, 'test1', '3q6fom', '2019-03-20 10:33:28', 22, 1, 1, 0, '2019-07-22', 0),
(45, 'test1', 'tc6lre', '2019-03-20 10:33:28', 22, 1, 1, 0, '2019-07-22', 0),
(46, 'test1', 'pfbeqa', '2019-03-20 10:33:28', 22, 1, 1, 0, '2019-07-22', 0),
(47, 'test1', 'yo5z83', '2019-03-20 10:33:28', 22, 1, 1, 0, '2019-07-22', 0),
(48, 'test1', 'wbo2z9', '2019-03-20 10:33:28', 22, 1, 1, 0, '2019-07-22', 0),
(51, 'test', 'pkexdq', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 0),
(52, 'test', 'jzs3g2', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 0),
(53, 'test', 'a96xe8', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 0),
(54, 'test', 'f8puvh', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 0),
(62, 'test2', 'e3r172', '2019-03-20 11:51:49', 10, 1, 1, 0, '2018-07-22', 0),
(63, 'test2', 'seum3y', '2019-03-20 11:51:49', 10, 1, 1, 0, '2018-07-22', 0),
(64, 'test2', 's734ev', '2019-03-20 11:51:49', 10, 1, 1, 0, '2018-07-22', 0),
(65, 'tes', '0n8exh', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(66, 'tes', 'rfpoh5', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(67, 'tes', 'wq0yp5', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(68, 'tes', 'jef1x8', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(69, 'tes', 'svk3gh', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(70, 'test1', 'jm4b71', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(71, 'test1', '2mc93a', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(72, 'test1', 'sa4p07', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(73, 'test1', 'sho7mb', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(74, 'test1', 'v8syxa', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `code` (`coupon_code`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
