-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 21 日 10:41
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
-- 資料表結構 `price_plan`
--

CREATE TABLE `price_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `price_plan`
--

INSERT INTO `price_plan` (`id`, `name`, `price_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(12, 'insert remake test', 3000, 10, 1, '2019-03-22', '2019-03-23'),
(13, 'dsa', 3000, 10, 2, '2019-03-28', '2019-03-29');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `price_plan`
--
ALTER TABLE `price_plan`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `price_plan`
--
ALTER TABLE `price_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
