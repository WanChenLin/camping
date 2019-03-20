-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2019 年 03 月 20 日 17:01
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
-- 資料表結構 `SaleCategory`
--

CREATE TABLE `SaleCategory` (
  `salecate_id` int(11) NOT NULL COMMENT '商品分類流水號',
  `salecate_name` varchar(255) NOT NULL COMMENT '商品分類名稱',
  `salecate_parentid` int(11) NOT NULL COMMENT '上一層是',
  `salecate_sort` int(11) NOT NULL COMMENT '排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品分類';

--
-- 資料表的匯出資料 `SaleCategory`
--

INSERT INTO `SaleCategory` (`salecate_id`, `salecate_name`, `salecate_parentid`, `salecate_sort`) VALUES
(1, '冷凍食品', 0, 1),
(2, '冷藏食品', 0, 2),
(3, '生鮮食材', 0, 3),
(4, '素料理專區', 0, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `SaleImage`
--

CREATE TABLE `SaleImage` (
  `saleimg_id` int(11) NOT NULL COMMENT '圖片流水號',
  `salepage_id` int(11) NOT NULL COMMENT '商品流水號',
  `saleimg_name` varchar(255) NOT NULL COMMENT '圖片名稱',
  `saleimg_file` varchar(255) NOT NULL COMMENT '圖片資料夾',
  `saleimg_path` varchar(1000) NOT NULL COMMENT '圖片路徑'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品圖片';

-- --------------------------------------------------------

--
-- 資料表結構 `SalePage`
--

CREATE TABLE `SalePage` (
  `salepage_id` int(11) NOT NULL COMMENT '商品流水號',
  `salepage_image` varchar(4000) NOT NULL COMMENT '商品圖',
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
-- 資料表的匯出資料 `SalePage`
--

INSERT INTO `SalePage` (`salepage_id`, `salepage_image`, `salepage_name`, `salepage_quility`, `salepage_suggestprice`, `salepage_price`, `salepage_cost`, `salepage_state`, `salepage_feature`, `salepage_proddetails`, `salepage_specification`, `salepage_paymenttype`, `salepage_deliverytype`, `salepage_salecateid`) VALUES
(8, '', '烏魚子', 0, '590', '999', '999', 1, '999', '', '', '', '', 3),
(9, '', 'goo', 0, '9000', '0', '0', 1, 'rrr', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/5275514e-8b62-4ae2-822d-c432bc609e12\" width=\"800\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', 0),
(10, '', 'sksk', 0, '5555', '5555', '5553', 1, '33', '', '', '', '', 0),
(11, '', 'sksk', 0, '5555', '5555', '5553', 1, '33', '<p>hhhhh</p>\r\n', '', '', '', 0),
(12, '', 'efsf', 0, '500', '500', '500', 1, '', '', '', '', '', 0),
(13, '', 'efsf', 0, '500', '500', '500', 1, '', '<p>123</p>\r\n', '', '', '', 0),
(14, '', 'goo', 0, '88', '888', '888', 1, '8888uuu', '', '', '', '', 0),
(15, '', 'wwwww', 0, '3333', '333', '333', 1, 'eee', '', '', '', '', 0),
(16, '', 'wwwww', 0, '3333', '333', '333', 1, 'eee', '<p>2ododod</p>\r\n', '', '', '', 0),
(17, '', 'ddd', 0, '0', '0', '0', 1, 'ss', '', '', '', '', 0),
(20, '', '蒟蒻', 0, '40', '38', '25', 0, 'coco', '', '', '', '', 4),
(21, '', 'cool素雞', 0, '566', '55', '19', 0, '素雞', '素雞', '', '', '', 4),
(23, 'sale_pictures/4bc54fb0564eb1bbe0378175f4c764cae986fe4a.jpg', '素素', 0, '99', '98', '10', 0, '素素', '<p>素素</p>\r\n', '', '', '', 4),
(24, 'sale_pictures/7d8b42b903c605887efbf11a81e14add649cc9d3.png', '皮', 0, '99', '98', '10', 0, '生鮮', '<p>生鮮</p>\r\n', '', '', '', 3),
(25, 'sale_pictures/262fd91a69d54775503960f68e373c89da0a7c38.jpg', '薯條', 0, '99', '98', '10', 0, '薯條', '薯條', '', '', '', 4),
(26, 'sale_pictures/d7520832a4d3fb603423e26df92d21a5776451d1.jpg', '薯餅', 0, '999', '99', '9', 0, 'kdvbaejkrlbfef', '<p>我是88</p>\r\n', '', '', '', 1),
(27, 'sale_pictures/2891b839f5d4fc89700a0e444a66d47094325f7d.jpg', '定春fresh', 0, '5555', '5555', '4335', 1, '定春fresh', '<p>定春fresh</p>\r\n', '', '', '', 3);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `SaleCategory`
--
ALTER TABLE `SaleCategory`
  ADD PRIMARY KEY (`salecate_id`);

--
-- 資料表索引 `SaleImage`
--
ALTER TABLE `SaleImage`
  ADD PRIMARY KEY (`saleimg_id`);

--
-- 資料表索引 `SalePage`
--
ALTER TABLE `SalePage`
  ADD PRIMARY KEY (`salepage_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `SaleCategory`
--
ALTER TABLE `SaleCategory`
  MODIFY `salecate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分類流水號', AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `SaleImage`
--
ALTER TABLE `SaleImage`
  MODIFY `saleimg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '圖片流水號';

--
-- 使用資料表 AUTO_INCREMENT `SalePage`
--
ALTER TABLE `SalePage`
  MODIFY `salepage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
