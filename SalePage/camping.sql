-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 20 日 10:05
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
-- 資料表結構 `salecategory`
--

CREATE TABLE `salecategory` (
  `salecate_id` int(11) NOT NULL COMMENT '商品分類流水號',
  `salecate_name` varchar(255) NOT NULL COMMENT '商品分類名稱',
  `salecate_parentid` int(11) NOT NULL COMMENT '上一層是',
  `salecate_sort` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分類';

--
-- 資料表的匯出資料 `salecategory`
--

INSERT INTO `salecategory` (`salecate_id`, `salecate_name`, `salecate_parentid`, `salecate_sort`) VALUES
(1, '冷凍食品', 0, 1),
(2, '冷藏食品', 0, 2),
(3, '生鮮食材', 0, 3),
(4, '素料理專區', 0, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `saleimage`
--

CREATE TABLE `saleimage` (
  `saleimg_id` int(11) NOT NULL COMMENT '圖片流水號',
  `salepage_id` int(11) NOT NULL COMMENT '商品流水號',
  `saleimg_name` varchar(255) NOT NULL COMMENT '圖片名稱',
  `saleimg_file` varchar(255) NOT NULL COMMENT '圖片資料夾',
  `saleimg_path` varchar(1000) NOT NULL COMMENT '圖片路徑'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品圖片';

-- --------------------------------------------------------

--
-- 資料表結構 `salepage`
--

CREATE TABLE `salepage` (
  `salepage_id` int(11) NOT NULL COMMENT '商品流水號',
  `salepage_name` varchar(255) NOT NULL COMMENT '產品名稱',
  `salepage_quility` int(11) NOT NULL COMMENT '商品數量',
  `salepage_suggestprice` decimal(10,0) NOT NULL COMMENT '商品建議售價',
  `salepage_price` decimal(10,0) NOT NULL COMMENT '商品售價',
  `salepage_cost` decimal(10,0) NOT NULL COMMENT '商品成本',
  `salepage_state` tinyint(1) NOT NULL COMMENT '顯示設定',
  `salepage_feature` longtext NOT NULL COMMENT '商品特色',
  `salepage_proddetails` longtext NOT NULL COMMENT '詳細說明',
  `salepage_specification` longtext NOT NULL COMMENT '商品規格',
  `salepage_paymenttype` varchar(255) NOT NULL COMMENT '付款方式',
  `salepage_deliverytype` varchar(255) NOT NULL COMMENT '配送方式',
  `salepage_salecateid` int(11) NOT NULL COMMENT '商品分類流水號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品頁';

--
-- 資料表的匯出資料 `salepage`
--

INSERT INTO `salepage` (`salepage_id`, `salepage_name`, `salepage_quility`, `salepage_suggestprice`, `salepage_price`, `salepage_cost`, `salepage_state`, `salepage_feature`, `salepage_proddetails`, `salepage_specification`, `salepage_paymenttype`, `salepage_deliverytype`, `salepage_salecateid`) VALUES
(9, 'goo', 0, '9000', '0', '0', 1, 'rrr', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/5275514e-8b62-4ae2-822d-c432bc609e12\" width=\"800\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', 0),
(10, 'sksk', 0, '5555', '5555', '5553', 1, '33', '', '', '', '', 0),
(11, 'sksk', 0, '5555', '5555', '5553', 1, '33', '<p>hhhhh</p>\r\n', '', '', '', 0),
(12, 'efsf', 0, '500', '500', '500', 1, '', '', '', '', '', 0),
(13, 'efsf', 0, '500', '500', '500', 1, '', '<p>123</p>\r\n', '', '', '', 0),
(14, 'goo', 0, '88', '888', '888', 1, '8888uuu', '', '', '', '', 0),
(16, 'wwwwwyyy', 0, '3333', '333', '333', 1, 'eeeyy', '<p>2ododod</p>\r\n', '', '', '', 0),
(17, 'ddd', 0, '0', '0', '0', 1, 'ss', '', '', '', '', 0),
(19, '冷藏貢丸', 0, '55', '54', '30', 0, '冷藏貢丸', '<p>冷藏貢丸</p>\r\n', '', '', '', 2),
(20, '蒟蒻', 0, '40', '38', '25', 0, 'coco', '', '', '', '', 4),
(24, '花雕藥膳煲雞湯', 0, '6666', '6666', '7777', 1, '花雕藥膳煲雞湯', '花雕藥膳煲雞湯', '', '', '', 4),
(25, 'jjjj', 0, '888', '888', '888', 1, '888', '888', '', '', '', 3),
(26, 'jjjj', 0, '888', '888', '888', 1, '888', '888', '', '', '', 3),
(28, 'ddd', 333, '333', '333', '333', 1, '3werw', 'wrew', 'wrerw', '', '', 0),
(29, '豆腐', 0, '50', '50', '50', 1, '333', '<p>good</p>\r\n', '', '', '', 3),
(31, '豆腐', 0, '50', '50', '50', 1, '333', '<p>good</p>\r\n', '', '', '', 3),
(32, '豆腐', 0, '50', '50', '50', 1, '333', '<p>good</p>\r\n', '', '', '', 3),
(33, '豆腐', 0, '50', '50', '50', 1, '333', '<p>good</p>\r\n', '', '', '', 3),
(36, '豆腐', 0, '50', '50', '50', 1, '333', '<p>good</p>\r\n', '', '', '', 3),
(37, '豆腐', 0, '50', '50', '50', 1, '333', '<p>good</p>\r\n', '', '', '', 3),
(41, '【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)~~~', 0, '900', '999', '999', 1, '【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)~~~', '<p>【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)</p>\r\n', '', '', '', 2),
(42, '亞尼克', 0, '900', '900', '900', 1, '亞尼克', '', '', '', '', 4);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `salecategory`
--
ALTER TABLE `salecategory`
  ADD PRIMARY KEY (`salecate_id`);

--
-- 資料表索引 `saleimage`
--
ALTER TABLE `saleimage`
  ADD PRIMARY KEY (`saleimg_id`);

--
-- 資料表索引 `salepage`
--
ALTER TABLE `salepage`
  ADD PRIMARY KEY (`salepage_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `salecategory`
--
ALTER TABLE `salecategory`
  MODIFY `salecate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分類流水號', AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `saleimage`
--
ALTER TABLE `saleimage`
  MODIFY `saleimg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '圖片流水號';

--
-- 使用資料表 AUTO_INCREMENT `salepage`
--
ALTER TABLE `salepage`
  MODIFY `salepage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
