-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 05 月 17 日 05:11
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
-- 資料表結構 `salebrand`
--

CREATE TABLE `salebrand` (
  `salebrand_id` int(11) NOT NULL COMMENT '商品品牌流水號',
  `salebrand_name` varchar(255) NOT NULL COMMENT '商品品牌名稱',
  `salebrand_sort` int(11) NOT NULL COMMENT '商品品牌排序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `salebrand`
--

INSERT INTO `salebrand` (`salebrand_id`, `salebrand_name`, `salebrand_sort`) VALUES
(1, '桂冠', 1),
(2, '紅龍', 2),
(3, '七里香', 3),
(4, '西北', 4);

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
  `salepage_salecateid` int(11) NOT NULL COMMENT '商品分類流水號',
  `salepage_salebrand` varchar(100) NOT NULL COMMENT '商品品牌'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品頁';

--
-- 資料表的匯出資料 `salepage`
--

INSERT INTO `salepage` (`salepage_id`, `salepage_image`, `salepage_name`, `salepage_quility`, `salepage_suggestprice`, `salepage_price`, `salepage_cost`, `salepage_state`, `salepage_feature`, `salepage_proddetails`, `salepage_specification`, `salepage_paymenttype`, `salepage_deliverytype`, `salepage_salecateid`, `salepage_salebrand`) VALUES
(135, 'sale_pictures/4e94e45b8dcbf6a1596d9d8027a3df9a43e58de8.jpg', '【冷凍店取-老協珍】牛肉鍋(2970g(固形物970g)/盒)', 999, '999', '999', '999', 1, '【冷凍店取-老協珍】牛肉鍋(2970g(固形物970g)/盒)', '<p>【冷凍店取-老協珍】牛肉鍋(2970g(固形物970g)/盒)</p>\r\n', '', '', '', 1, ''),
(137, 'sale_pictures/c783508cc02b873ec6b98dc89bd4f6f7b9c32b29.png', '【 冷凍店取-陳記好味】東北酸菜鴨(固形物300克、湯500cc)', 777, '777', '8877', '887', 0, '【 冷凍店取-陳記好味】東北酸菜鴨(固形物300克、湯500cc)', '<p>【 冷凍店取-陳記好味】東北酸菜鴨(固形物300克、湯500cc)</p>\r\n', '', '', '', 2, ''),
(138, 'sale_pictures/4aabcf9bf71bb5cc2884f89e5af82b930ea50869.png', '【冷凍店取-哈根達斯】甜蜜鍾情雪糕禮盒', 999, '555', '555', '555', 1, '【冷凍店取-哈根達斯】甜蜜鍾情雪糕禮盒', '<p>【冷凍店取-哈根達斯】甜蜜鍾情雪糕禮盒</p>\r\n', '', '', '', 3, ''),
(139, 'sale_pictures/f5c9e70404321c2804b257120c9b25f0b2fcd6f5.jpg', '【冷凍店取-阿奇儂】拿鐵雪沙(6杯)', 777, '111', '111', '111', 0, '【冷凍店取-阿奇儂】拿鐵雪沙(6杯)', '<p>【冷凍店取-阿奇儂】拿鐵雪沙(6杯)</p>\r\n', '', '', '', 4, ''),
(140, 'sale_pictures/2780733d82b377917316bd3b8da5bff223bf6459.png', '【冷凍店取】美國prime頂級安格斯板腱牛肉', 111, '111', '111', '111', 0, '【冷凍店取】美國prime頂級安格斯板腱牛肉', '<p>【冷凍店取-阿奇儂】拿鐵雪沙(6杯)​​​​​​​</p>\r\n', '', '', '', 1, ''),
(141, 'sale_pictures/a97576f21215c6ac3efa40a4bcbe8a5f00f5f228.jpg', '【冷凍店取-爭鮮】熟凍波士頓龍蝦(450g(隻)/盒)', 422, '422', '422', '422', 1, '【冷凍店取-爭鮮】熟凍波士頓龍蝦(450g(隻)/盒)', '<p>【冷凍店取-爭鮮】熟凍波士頓龍蝦(450g(隻)/盒)</p>\r\n', '', '', '', 1, '4'),
(142, 'sale_pictures/0082cef93d9a7086729684d19d47c4069819a097.png', '【食吧嚴選】日本青森富士蘋果*3箱團購組(8顆/箱，280g±10%/顆)', 433, '433', '433', '433', 0, '【食吧嚴選】日本青森富士蘋果*3箱團購組(8顆/箱，280g±10%/顆)', '<p>【食吧嚴選】日本青森富士蘋果*3箱團購組(8顆/箱，280g&plusmn;10%/顆)</p>\r\n', '', '', '', 2, '4'),
(144, 'sale_pictures/2a713f70e685d1bab466ea6eeb15307b39be3d2d.png', '【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)', 868, '868', '868', '868', 0, '【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)', '<p>【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)</p>\r\n', '', '', '', 1, '1'),
(145, 'sale_pictures/b7a0977e29fc7b1c9b089522d76dd9278b35e9d8.png', '【亞尼克】25度N檸檬派(6吋(15cm*2.5cm)/盒*4盒)', 343, '343', '343', '343', 1, '【亞尼克】25度N檸檬派(6吋(15cm*2.5cm)/盒*4盒)', '<p>【亞尼克】25度N檸檬派(6吋(15cm*2.5cm)/盒*4盒)</p>\r\n\r\n<p>3重滋味加乘，讓人一口接一口!!蛋白霜經過炙燒形成誘人的焦糖色澤，帶來軟綿細緻的觸感， 緊接著是現榨綠檸檬與法國依思尼奶油， 交織出柔軟細膩的口感， 檸檬清新爽朗的香氣瀰漫在嘴裡， 和厚實酥脆的派皮形成絕佳平衡。 這股初戀般的酸甜滋味，在夏日特別迷人 酸V啊 ，酸V啊 !!</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', 3, '2'),
(146, 'sale_pictures/0c26a7d73d86553e9a08b7412fd8399d9efd1b46.png', '桂冠好吃', 34, '333', '2222', '222', 1, '94好吃', '<p>好吃啦</p>\r\n', '', '', '', 2, '1'),
(150, 'sale_pictures/8cef6e89b4e2f7588268966b33fb18ef641e6c47.jpg', '素素的', 45, '4444', '5555', '4444', 1, '素素的', '<p>特選肉質鮮嫩、口感極佳且經CAS品質認證之雞腿肉(去骨去皮)，以陳年花雕酒醃漬四十八小時入味，搭配上等干貝海洋珍品，以及栗子、香菇、蛋黃 、蝦米...等豐富食材，色香味俱全，品嚐一口，淡淡的花雕酒香在空氣中彌漫，令人垂涎三尺，口齒留香；獨特風味</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', 4, '3'),
(151, 'sale_pictures/bba4a2172e8edfe9c56e56e346d8913d4ec76fc6.png', '【冷凍店取-寶來發】花雕雞肉粽(185g*4)', 807, '888', '888', '888', 1, '特選肉質鮮嫩、口感極佳且經CAS品質認證之雞腿肉(去骨去皮)，以陳年花雕酒醃漬四十八小時入味，搭配上等干貝海洋珍品，以及栗子、香菇、', '<p>特選肉質鮮嫩、口感極佳且經CAS品質認證之雞腿肉(去骨去皮)，以陳年花雕酒醃漬四十八小時入味，搭配上等干貝海洋珍品，以及栗子、香菇、</p>\r\n', '', '', '', 2, '2');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `salebrand`
--
ALTER TABLE `salebrand`
  ADD PRIMARY KEY (`salebrand_id`);

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
-- 使用資料表 AUTO_INCREMENT `salebrand`
--
ALTER TABLE `salebrand`
  MODIFY `salebrand_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品品牌流水號', AUTO_INCREMENT=5;

--
-- 使用資料表 AUTO_INCREMENT `salecategory`
--
ALTER TABLE `salecategory`
  MODIFY `salecate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分類流水號', AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `saleimage`
--
ALTER TABLE `saleimage`
  MODIFY `saleimg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '圖片流水號';

--
-- 使用資料表 AUTO_INCREMENT `salepage`
--
ALTER TABLE `salepage`
  MODIFY `salepage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=152;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
