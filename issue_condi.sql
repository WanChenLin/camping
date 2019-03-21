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
-- 資料表結構 `issue_condi`
--

CREATE TABLE `issue_condi` (
  `issue_condi` int(11) NOT NULL,
  `issue_condi_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `issue_condi`
--

INSERT INTO `issue_condi` (`issue_condi`, `issue_condi_name`) VALUES
(1, '初次登入'),
(2, '會員等級'),
(3, '訂單累積');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `issue_condi`
--
ALTER TABLE `issue_condi`
  ADD PRIMARY KEY (`issue_condi`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `issue_condi`
--
ALTER TABLE `issue_condi`
  MODIFY `issue_condi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
