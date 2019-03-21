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
-- 資料表結構 `amount_plan`
--

CREATE TABLE `amount_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `amount_plan`
--

INSERT INTO `amount_plan` (`id`, `name`, `amount_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(9, 'svsdasdfds', 0, 2147483647, 2, '2018-07-22', '2018-07-22'),
(10, 's', 53, 22, 2, '2018-07-22', '2018-07-22'),
(11, 's', 53, 33, 1, '2018-07-22', '2018-07-22'),
(12, 's', 53, 33, 1, '2018-07-22', '2018-07-22');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `amount_plan`
--
ALTER TABLE `amount_plan`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `amount_plan`
--
ALTER TABLE `amount_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;