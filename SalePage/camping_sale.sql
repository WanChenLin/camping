-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 03 月 21 日 09:34
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
(4, '素料理專區', 0, 4),
(5, '未選擇', 0, 0);

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
  `salepage_image` varchar(4000) NOT NULL COMMENT '商品圖',
  `salepage_name` varchar(100) NOT NULL COMMENT '產品名稱',
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

INSERT INTO `salepage` (`salepage_id`, `salepage_image`, `salepage_name`, `salepage_quility`, `salepage_suggestprice`, `salepage_price`, `salepage_cost`, `salepage_state`, `salepage_feature`, `salepage_proddetails`, `salepage_specification`, `salepage_paymenttype`, `salepage_deliverytype`, `salepage_salecateid`) VALUES
(8, 'sale_pictures/d51c20d14d017aae47c256c59ed0f1970c57656d.png', '伊莉莎白', 0, '5900', '999', '999', 1, '999', '<p>伊莉莎白</p>\r\n', '', '', '', 2),
(10, 'sale_pictures/3befa20829d652da41db8b06673c0c0eea83712c.png', 'tyutuy', 0, '5555', '5555', '5553', 1, '33', '', '', '', '', 5),
(11, 'sale_pictures/a167c1fe3311926a958422861f03604e3293d3da.png', 'sksk', 999, '123', '456', '789', 1, '3', '<p>hhhhh22</p>\r\n', '', '', '', 2),
(12, 'sale_pictures/984a45666365a6e1649ab327fedbcca1d00b38cc.png', 'efsf', 0, '500', '500', '500', 1, '', '', '', '', '', 3),
(13, 'sale_pictures/8271fa7f4331a5a24fb88183da9cd576af358a76.png', 'efsf', 0, '500', '500', '500', 1, '', '<p>123</p>\r\n', '', '', '', 4),
(14, 'sale_pictures/e58b07b7bed958de57123af296830b3cff9173e7.png', '馬來貘', 0, '88', '888', '888', 0, '8888uuu', '', '', '', '', 1),
(15, 'sale_pictures/5c421c1c09a3a45ce5087d7ea2802105d6d7e88c.jpg', 'wwwww', 0, '3333', '333', '333', 1, 'eee', '', '', '', '', 2),
(16, 'sale_pictures/6c1c7364c2a0d6177d045faadd5839891bc9d1e0.jpg', '露娜', 0, '3333', '333', '333', 1, 'eee', '<p>2ododod</p>\r\n', '', '', '', 4),
(17, 'sale_pictures/a180ec26203b401d829147263d5f77c82fcd3dfd.png', '阿提密斯', 0, '999', '999', '999', 1, '阿提密斯', '<p>阿提密斯</p>\r\n', '', '', '', 1),
(23, 'sale_pictures/4bc54fb0564eb1bbe0378175f4c764cae986fe4a.jpg', '素素', 0, '99', '98', '10', 0, '素素', '<p>素素</p>\r\n', '', '', '', 4),
(24, 'sale_pictures/7d8b42b903c605887efbf11a81e14add649cc9d3.png', '皮', 0, '99', '98', '10', 0, '生鮮', '<p>生鮮</p>\r\n', '', '', '', 3),
(25, 'sale_pictures/262fd91a69d54775503960f68e373c89da0a7c38.jpg', '薯條', 0, '99', '98', '10', 0, '薯條', '薯條', '', '', '', 4),
(26, 'sale_pictures/d7520832a4d3fb603423e26df92d21a5776451d1.jpg', '薯餅', 0, '999', '99', '9', 0, 'kdvbaejkrlbfef', '<p>我是88</p>\r\n', '', '', '', 1),
(27, 'sale_pictures/2891b839f5d4fc89700a0e444a66d47094325f7d.jpg', '定春fresh', 0, '5555', '5555', '4335', 1, '定春fresh', '<p>定春fresh</p>\r\n', '', '', '', 3),
(28, 'sale_pictures/569da097dc45db33c027ef6087c741c412e4402a.jpg', '【亞尼克】生乳捲覆盆莓1入(g/條)', 0, '5666', '5557', '4448', 1, '生乳捲覆盆莓10入', '<p>【亞尼克】生乳捲覆盆莓10入(g/條)</p>\r\n', '', '', '', 2),
(29, 'sale_pictures/c89f63140002117d76744071e81ada821f050b5f.jpg', '【總舖獅】冰釀香滷蹄膀15入包(800公克／包)', 0, '666', '555', '444', 1, '【總舖獅】冰釀香滷蹄膀15入包(800公克／包)', '<p>【總舖獅】冰釀香滷蹄膀15入包(800公克／包)</p>\r\n', '', '', '', 1),
(30, 'sale_pictures/00d8c42a20820870d60a6536f957f6ff1f54ae78.jpg', '【總舖獅】冰釀香滷蹄膀15入包(800公克／包)', 0, '6666', '666', '666', 0, '【總舖獅】冰釀香滷蹄膀15入包(800公克／包)', '<p>【總舖獅】冰釀香滷蹄膀15入包(800公克／包)</p>\r\n', '', '', '', 1),
(31, 'sale_pictures/00d8c42a20820870d60a6536f957f6ff1f54ae78.jpg', '【總舖獅】冰釀香滷蹄膀15入包(800公克／包)', 0, '6666', '666', '666', 0, '【總舖獅】冰釀香滷蹄膀15入包(800公克／包)', '<p>【總舖獅】冰釀香滷蹄膀15入包(800公克／包)</p>\r\n', '', '', '', 1),
(32, 'sale_pictures/36a904877515e8c447c66676957c9b5bda1ee2d7.png', 'LanLan', 0, '666', '55', '0', 1, '', '', '', '', '', 1),
(33, '', 'sss', 0, '666', '0', '0', 1, '', '', '', '', '', 1),
(35, 'sale_pictures/309ef855d6dd973d2dd11432053edaf609abb1d0.png', 'www', 0, '343', '343', '43', 1, '343', '<p>wewew</p>\r\n', '', '', '', 2),
(36, '', 'Read the grammar explanation and do the exercise.\r\n\r\nThere are lots of rules about the use of articl', 444, '255', '2255', '3333', 1, '', '', '', '', '', 1),
(37, '', 'Read the grammar explanation and do the exercise.\r\nRead the grammar explanation and do the exercise.', 0, '255', '2255', '3333', 1, '', '', '', '', '', 1),
(38, 'sale_pictures/b72321a2d1c3898e9ee1017bb194262e7954acd9.jpg', '【原味時代】低醣無麩質-重乳酪金莎塔', 0, '566', '555', '444', 1, '【原味時代】低醣無麩質-重乳酪金莎塔', '<p>【原味時代】低醣無麩質-重乳酪金莎塔</p>\r\n', '', '', '', 2),
(39, '', '454', 0, '0', '4545', '0', 1, '', '', '', '', '', 0),
(40, '', '454', 0, '0', '4545', '0', 1, '', '', '', '', '', 0),
(42, '', '5456', 54646, '4156646', '456465', '45646', 1, '456', '<p>456465</p>\r\n', '', '', '', 2),
(43, 'sale_pictures/427f6f1c70254c99e8b339857e0db4a433b4dea2.png', 'www', 44, '343', '343', '0', 1, '', '', '', '', '', 1),
(44, '', 'ere', 0, '0', '567', '0', 1, '', '', '', '', '', 3),
(45, '', 'wer', 454, '45', '45', '0', 1, '', '', '', '', '', 5),
(46, 'sale_pictures/', 'wer88', 4548, '45', '45', '0', 1, '', '', '', '', '', 5),
(47, 'sale_pictures/', 'tyt', 45433, '45', '34543', '0', 1, '', '', '', '', '', 3),
(48, '', 'ert', 456456, '456', '456', '0', 1, '', '', '', '', '', 3),
(49, '', 'tyu', 555, '0', '555', '0', 1, '', '', '', '', '', 3),
(50, '', 'tyu', 555, '0', '555', '0', 1, '', '', '', '', '', 3),
(51, '', 'tyu', 555, '0', '555', '0', 1, '', '', '', '', '', 3),
(52, '', 'tyu', 555, '0', '555', '0', 1, '', '', '', '', '', 3),
(53, '', 'tyu', 555, '0', '555', '0', 1, '', '', '', '', '', 3),
(54, '', 'tyu', 555, '0', '555', '0', 1, '', '', '', '', '', 3),
(55, 'sale_pictures/', '888', 111, '0', '11', '0', 1, '', '', '', '', '', 1);

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
  MODIFY `salecate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分類流水號', AUTO_INCREMENT=7;

--
-- 使用資料表 AUTO_INCREMENT `saleimage`
--
ALTER TABLE `saleimage`
  MODIFY `saleimg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '圖片流水號';

--
-- 使用資料表 AUTO_INCREMENT `salepage`
--
ALTER TABLE `salepage`
  MODIFY `salepage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
