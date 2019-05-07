-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 05 月 03 日 09:30
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
-- 資料庫： `gocamping`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `sid` int(11) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admins`
--

INSERT INTO `admins` (`sid`, `admin_id`, `password`) VALUES
(1, 'admin', '0000');

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

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_device`
--

CREATE TABLE `campsite_device` (
  `campDevice_id` int(11) NOT NULL COMMENT '設備編號',
  `camp_id` int(11) NOT NULL COMMENT '營區編號',
  `campDevice_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '設備名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_facility`
--

CREATE TABLE `campsite_facility` (
  `campFacility_id` int(11) NOT NULL COMMENT '設施編號',
  `camp_id` int(11) NOT NULL COMMENT '營區編號',
  `campFacility_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '設施名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_feature`
--

CREATE TABLE `campsite_feature` (
  `campFeature_id` int(11) NOT NULL COMMENT '特色編號',
  `camp_id` int(11) NOT NULL COMMENT '營區編號',
  `campFeature_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營區特色'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_image`
--

CREATE TABLE `campsite_image` (
  `campImg_id` int(11) NOT NULL COMMENT '圖片編號',
  `camp_image` text COLLATE utf8_unicode_ci NOT NULL COMMENT '營區照片',
  `camp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營地名稱',
  `campImg_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片名稱',
  `campImg_file` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片資料夾',
  `campImg_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '圖片路徑'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `campsite_image`
--

INSERT INTO `campsite_image` (`campImg_id`, `camp_image`, `camp_name`, `campImg_name`, `campImg_file`, `campImg_path`) VALUES
(33, 'upload/a03.jpg', '楓之谷', '123', '翠綠山巒 遠離塵囂清新舒暢', ''),
(34, 'upload/c015.jpg', '露營區', '森林', '森林系最愛 林蔭圍繞', ''),
(35, 'upload/c013.jpg', '楓之谷', '瀑布', '沿途山林優美 空氣清新', ''),
(36, 'upload/a001.jpg', '九甲林露營區', '森林', '沿途山林優美 空氣清新1111', '');

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_list`
--

CREATE TABLE `campsite_list` (
  `camp_id` int(11) NOT NULL COMMENT '營地編號',
  `camp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營區名稱',
  `camp_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '地址',
  `camp_location` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '經緯度',
  `camp_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '聯絡電話',
  `camp_fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '傳真',
  `camp_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '電子郵件',
  `camp_ownerName` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '聯絡人',
  `camp_openTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '開放時間',
  `camp_target` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '適合對象',
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '城市',
  `dist` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '地區'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `campsite_list`
--

INSERT INTO `campsite_list` (`camp_id`, `camp_name`, `camp_address`, `camp_location`, `camp_tel`, `camp_fax`, `camp_email`, `camp_ownerName`, `camp_openTime`, `camp_target`, `city`, `dist`) VALUES
(1, '何方神聖慢活營', '新北市烏來區大羅蘭19號之1', '24.7737944,121.4788949', '02-22527966 ', '02-22527966 ', 'wang@gmail.com', '王先生', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '新北市', '烏來區'),
(2, '何方神聖慢活營', '新北市烏來區大羅蘭19號之1', '24.7737944,121.4788949', '02-22527966 ', '02-22527966 ', 'wang02@gmail.com', '王先生02', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '新北市', '烏來區'),
(3, '綠果子休憩站', '桃園市龍潭區中原路三段150巷66號', '24.881858,121.299778', '02-22527966 ', '02-22527966 ', 'lin@gmail.com', '林先生', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '桃園市', '龍潭區'),
(5, '紅樹林森林園區', '桃園市龍潭區中原路三段150巷66號', '24.881858,121.299778', '02-2252-7966 ', '02-2252-7966 ', 'lin02@gmail.com', '林先生02', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '新北市', '淡水區'),
(6, '楓之谷露營區', '桃園市大溪區福山一路118-1號', '24.881858,\r\n121.299778', '02-2252-7966 ', '02-2252-7966 ', 'chen@gmail.com', '陳小姐', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '桃園市', '大溪區'),
(7, '管園親子露營區', '桃園市龍潭區中原路三段150巷66號', '24.8261342,\r\n121.1875318', '02-2252-7966 ', '02-2252-7966 ', 'huang@gmail.com', '黃小姐', '平日10:00~20:00\r\n假日08:00~22:00', '親子遊樂', '桃園市', '龍潭區'),
(10, '紅樹林露營區', '新竹縣五峰鄉桃山村清泉17鄰296-28號', '122211441', '02-2234-6666', '02-2234-6666', 'jenny@ddd.com', '00', '平日10:00~20:00\r\n假日08:00~22:00', '12', '新竹縣', '五峰鄉'),
(11, '九甲林露營區', '石岡區', '24.2658224,120.7832063', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', '假日08:00~22:00', '大型派對', '新北市', '石岡區'),
(12, '九甲林露營區', '桃山村清泉17鄰296-28號', '24.2658224,120.7832063', '02-2252-7966', '02-2252-7966', 'chen@cccc.com', '陳小姐', '平日10:00~20:00\r\n假日08:00~22:00', '10', '台中市', '太平市'),
(13, '森林', '和平東路一段162號', '24.2658224,120.7832063', '02-2252-7966', '02-2252-7966', 'susuaaa@gmail.com', '蘇先生', '假日8:00', '', '', '大安區'),
(14, '楓之谷', '', '24.0738248,120.9795118', '02-2252-7966', '02-2252-7966', 'ding@ccc.com', '丁先生', '假日8:00~20:00', '', '桃園市', '五峰鄉'),
(15, '森林園區', '和平東路一段162號', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'susu1234@gmail.com', '陳先生', '假日8:00~20:00', '營火晚會', '基隆市', '石岡區'),
(16, '九甲林露營區', '東勢地區', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'ding@ccc.com', '丁先生', '假日8:00~20:00', '小家庭', '基隆市', '東勢區'),
(17, '彩虹奇菁', '和平東路', '24.2658224,120.7832063', '02-2252-7966', '', 'susu@gmail.com', '蘇先生', '假日8:00~22:00', '大型派對', '台北市', '大安區'),
(18, '森林', '仁愛鄉', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', '假日8:00~22:00', '大型派對', '嘉義縣', '石岡區'),
(19, '樹不老露營區', '仁愛鄉', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'chen@aaa.com', '陳先生', '假日8:00~22:00', '大型派對', '0', '仁愛鄉'),
(20, '九甲林露營區', '東河村鹿場部落24鄰11號', '24.0738248,120.9795118', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', 'A.M.10:00~P.M.20:00', '大型派對', '嘉義市', '東勢區'),
(23, '森林園區', '東河村鹿場部落24鄰11號', '24.0738248,120.9795118', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', 'A.M.10:00~P.M.20:00', '營火晚會', '臺中市', '東勢區'),
(24, '露營區', '和平東路一段162號', '24.2658224,120.7832063', '02-2252-', '', 'sus@gmail.com', '蘇先生', 'A.M.10:00~P.M.20:00', '營火晚會', '基隆市', '石岡區'),
(25, '九甲林露營區', '和平東路一段162號', '24.1984396,120.8614356', '02-225', '02-2252-7966', 'chen@gmail.com', '王先生', 'A.M.10:00~P.M.20:00', '大型派對', '苗栗縣', '石岡區'),
(28, '露營區', '信義路一段162號', '24.2658224,120.7832063', '02-225', '02-22527966', 'chen@aaa.com', '1234', 'A.M.10:00~P.M.20:00', '營火晚會', '桃園市', '東勢區'),
(29, '露營區', '東河村鹿場部落24鄰11號', '24.2658224,120.7832063', '02-2252', '02-22527966', 'susu@gmail.com', '蘇先生', 'A.M.10:00~P.M.20:00', '營火晚會', '新北市', '仁愛鄉');

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_price`
--

CREATE TABLE `campsite_price` (
  `campPrice_id` int(11) NOT NULL COMMENT '價格編號',
  `camp_id` int(11) NOT NULL COMMENT '營區編號',
  `campType_id` int(11) NOT NULL COMMENT '類型編號',
  `campPrice_weekday` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '平日價格',
  `campPrice_weekend` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '假日價格',
  `campPrice_holiday` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '連假價格'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_type`
--

CREATE TABLE `campsite_type` (
  `campType_id` int(11) NOT NULL COMMENT '類型編號',
  `camp_id` int(11) NOT NULL COMMENT '營區編號',
  `campType_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '類型名稱',
  `campArea` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '區域',
  `campRoom_num` int(11) NOT NULL COMMENT '帳數'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(48, 'test1', 'wbo2z9', '2019-03-20 10:33:28', 22, 1, 1, 0, '2019-07-22', 139),
(51, '修改', 'pkexdq', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 141),
(52, 'test', 'jzs3g2', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 141),
(53, 'test', 'a96xe8', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 141),
(54, 'test', 'f8puvh', '2019-03-20 11:34:13', 10, 1, 1, 0, '2018-07-22', 141),
(62, 'test2', 'e3r172', '2019-03-20 11:51:49', 10, 1, 1, 0, '2018-07-22', 142),
(63, 'test2', 'seum3y', '2019-03-20 11:51:49', 10, 1, 1, 0, '2018-07-22', 156),
(64, 'test2', 's734ev', '2019-03-20 11:51:49', 10, 1, 1, 0, '2018-07-22', 157),
(65, 'tes', '0n8exh', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(66, 'tes', 'rfpoh5', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(67, 'tes', 'wq0yp5', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(68, 'tes', 'jef1x8', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(69, 'tes', 'svk3gh', '2019-03-21 14:48:51', 10, 1, 1, 0, '2018-07-22', 0),
(70, 'test1', 'jm4b71', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(71, 'test1', '2mc93a', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(72, 'test1', 'sa4p07', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(73, 'test1', 'sho7mb', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(74, 'test1', 'v8syxa', '2019-03-21 15:07:47', 10, 1, 1, 0, '2018-07-22', 0),
(75, 'coupon', '832sli', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(76, 'coupon', 'flng67', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(77, 'coupon', 'ls1u7r', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(78, 'coupon', '37d1fk', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(79, 'coupon', 'l3omvg', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(80, 'coupon', 's89nlr', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(81, 'coupon', 'rajbn7', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(82, 'coupon', 'b12gnz', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(83, 'coupon', '52btk3', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(84, 'coupon', '40g12k', '2019-03-22 10:20:18', 10, 1, 1, 0, '2019-07-22', 0),
(85, 'coupon', 'f86rvs', '2019-03-22 15:02:06', 10, 1, 1, 0, '2018-07-22', 0),
(86, 'coupon', 'yn1cu0', '2019-03-22 15:02:06', 10, 1, 1, 0, '2018-07-22', 0),
(87, 'coupon', '7rz6yc', '2019-03-22 15:02:06', 10, 1, 1, 0, '2018-07-22', 0),
(88, 'coupon', 'c6mnxk', '2019-03-22 15:02:06', 10, 1, 1, 0, '2018-07-22', 0),
(89, 'coupon', 'jvku82', '2019-03-22 15:02:06', 10, 1, 1, 0, '2018-07-22', 0),
(90, 'coupon', '07ae3u', '2019-03-22 15:02:07', 10, 1, 1, 0, '2018-07-22', 0),
(91, 'coupon', 'xaizeb', '2019-03-22 15:02:07', 10, 1, 1, 0, '2018-07-22', 0),
(92, 'coupon', 'jpmu9f', '2019-03-22 15:02:07', 10, 1, 1, 0, '2018-07-22', 0),
(93, 'coupon', '6joz0p', '2019-03-22 15:02:07', 10, 1, 1, 0, '2018-07-22', 0),
(94, 'coupon', '5gvi8d', '2019-03-22 15:02:07', 10, 1, 1, 0, '2018-07-22', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `dis_type`
--

CREATE TABLE `dis_type` (
  `id` int(11) NOT NULL,
  `dis_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `dis_type`
--

INSERT INTO `dis_type` (`id`, `dis_type`) VALUES
(1, '打折'),
(2, '扣除金額');

-- --------------------------------------------------------

--
-- 資料表結構 `event_applylist`
--

CREATE TABLE `event_applylist` (
  `applyList_id` int(11) NOT NULL,
  `apply_id` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `applyList_name` varchar(255) NOT NULL,
  `applyList_idn` varchar(255) NOT NULL,
  `applyList_mobile` varchar(255) NOT NULL,
  `applyList_email` varchar(255) DEFAULT NULL,
  `applyList_emg` varchar(255) NOT NULL,
  `applyList_emgMobile` varchar(255) NOT NULL,
  `apply_order` int(1) NOT NULL COMMENT '1->取消訂單',
  `applyList_remark` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_applylist`
--

INSERT INTO `event_applylist` (`applyList_id`, `apply_id`, `event_id`, `applyList_name`, `applyList_idn`, `applyList_mobile`, `applyList_email`, `applyList_emg`, `applyList_emgMobile`, `apply_order`, `applyList_remark`) VALUES
(1, '1', '1', '張三1', 'P111111111', '0922222222', 'chang1@mail.com', '張三娘', '0966666666', 0, ''),
(2, '1', '1', '張三2', 'P222222222', '0988888888', 'chang2@mail.com', '張三爹', '0966666666', 0, NULL),
(3, '2', '9', '李四1', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', 0, NULL),
(4, '2', '9', '李四2', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', 0, NULL),
(5, '2', '9', '李四3', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', 0, NULL),
(6, '2', '9', '李四4', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', 0, NULL),
(7, '3', '3', '王朝1', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', 0, NULL),
(8, '3', '3', '王朝2', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', 0, NULL),
(9, '3', '3', '王朝3', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', 0, NULL),
(10, '3', '3', '王朝4', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', 0, NULL),
(11, '4', '11', '馬漢1', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', 0, '00'),
(12, '4', '11', '馬漢2', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', 0, '11'),
(13, '4', '11', '馬漢3', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', 0, NULL),
(14, '4', '11', '馬漢4', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', 0, NULL),
(15, '5', '14', '張龍1', 'P322222222', '0988888888', 'li@mail.com', '張龍1爹', '0966666666', 0, '素食'),
(16, '5', '14', '張龍2', 'P322222222', '0988888888', 'li@mail.com', '張龍2爹', '0966666666', 0, NULL),
(17, '5', '14', '張龍3', 'P322222222', '0988888888', 'li@mail.com', '張龍3爹', '0966666666', 0, NULL),
(18, '6', '1', '趙虎1', 'P322222222', '0988888888', 'li@mail.com', '趙虎1爹', '0966666666', 0, NULL),
(19, '6', '1', '趙虎2', 'P322222222', '0988888888', 'li@mail.com', '趙虎2爹', '0966666666', 0, NULL),
(20, '23', '6', '王大媽', 'G222222222', '0922222222', NULL, '老王', '0933333333', 0, NULL),
(21, '23', '6', '王大媽2', 'Q222222222', '0966666666', NULL, '老王2', '0911111111', 0, NULL),
(22, '24', '9', '李大嬸', 'G222222222', '0922222222', NULL, '老李', '0933333333', 0, NULL),
(23, '24', '9', '李大嬸2', 'Q222222222', '0966666666', NULL, '老李2', '0911111111', 0, NULL),
(24, '25', '6', 'testelephant', 'Q222222222', '0966666666', '', 'testelephant', '0911111111', 0, 'aa'),
(25, '25', '6', 'testelephant', 'Q222222222', '0966666666', '', 'testelephant', '0911111111', 0, ''),
(26, '26', '16', 'testdog', 'Q222222222', '0966666666', 'dog@email.com', 'testdog', '0911111111', 0, ''),
(27, '26', '16', 'testdog', 'Q222222222', '0966666666', 'testdog@email.com', 'testdog\'s Mom', '0911111111', 0, ''),
(28, '26', '16', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', 0, NULL),
(29, '26', '16', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', 0, NULL),
(30, '27', '11', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', 0, NULL),
(31, '27', '11', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', 0, NULL),
(35, '30', '16', 'testmonkey', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testmonkey\'s Mom', '0988888888', 0, ''),
(36, '30', '16', 'testmonkey2', 'A1111111111', '0933333333', 'testmonkey2@mail.com', 'testmonkey\'s Mom2', '0988888888', 0, ''),
(48, '36', '19', 'testmonkey', 'A1111111111', '0933333333', 'testmonkey@mail.com', 'testdog\'s Mom', '0988888888', 0, ''),
(49, '36', '19', 'testmonkey', 'A1111111111', '0933333333', 'testmonkey@mail.com', 'testdog\'s Mom', '0988888888', 0, ''),
(54, '37', '19', 'testsheep', 'A1111111111', '0933333333', 'testsheep@mail.com', 'testdog\'s Mom', '0988888888', 0, ''),
(55, '37', '19', 'testsheep', 'A1111111111', '0933333333', 'testsheep@mail.com', 'testdog\'s Mom', '0988888888', 0, ''),
(58, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(59, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(60, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(61, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(62, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(63, '39', '20', 'testdog2', 'A1111111111', '0922222222', 'testdog2@mail.com', 'testdog\'s Mom', '0963654789', 0, ''),
(64, '39', '20', 'testdog2', 'A1111111111', '0922222222', 'testdog2@mail.com', 'testdog\'s Mom', '0963654789', 0, ''),
(65, '40', '21', ' Woody', 'A1111111111', '0933333333', 'woody@mail.com', ' Bo Peep', '0988888888', 0, ''),
(66, '40', '21', 'Buzz Lightyear', 'A1111111111', '0933333333', 'buzz@mail.com', 'Jessie', '0988888888', 0, ''),
(67, '41', '21', 'Mike Wazowski', 'A1111111111', '0933555555', 'Mike Wazowski@mail.com', ' Boo', '0988888888', 0, ''),
(68, '41', '21', 'James P. Sullivan', 'A1111111111', '0933555555', 'James P. Sullivan@mail.com', ' Boo', '0988888888', 0, ''),
(69, '41', '21', 'Randall Boggs', 'A1111111111', '0933555555', 'Randall Boggs@mail.com', 'Celia Mae', '0988888888', 0, ''),
(70, '41', '21', 'Henry J. Waternoose III', 'A1111111111', '0933555555', 'Henry J. Waternoose III@mail.com', 'Celia Mae', '0988888888', 0, ''),
(71, '41', '21', 'Roz', 'A1111111111', '0933555555', 'testsheep@mail.com', 'Dory', '0988888888', 0, ''),
(72, '41', '21', 'testmonkey', 'A1111111111', '0933555555', 'testsheep@mail.com', 'Dory', '0988888888', 0, ''),
(79, '42', '22', 'testmonkey2', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(80, '42', '22', 'testmonkey2', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(81, '42', '22', 'testmonkey2', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', 0, ''),
(85, 'C231AF2EB', '23', 'test', 'test', '09999999999', 'test@gmail.com', 'test', '0988888888', 0, ''),
(86, 'C231AF2EB', '23', 'test22', 'test22', '0977666555', 'test22@mail.com', 'test22', '0955555555', 0, ''),
(87, '9C6E4EC68FDBD16600B02622D3B07790                                ', '24', 'tracy', 'Q222222222', '0922222222', 'tracy@mail.com', 'tracy', '0933333333', 0, ''),
(88, '9C6E4EC68FDBD16600B02622D3B07790                                ', '24', 'tracy', 'A111111111', '0900000000', 'tracy@mail.com', 'tracy', '0955555555', 0, ''),
(89, '30FDA26A986E06F0BC45899F42FA5FBC                                ', '23', 'dumbo2', 'D11111111111', '0999999999', 'dumbo@mail.com', 'dumbo', '0999999999', 0, ''),
(90, '30FDA26A986E06F0BC45899F42FA5FBC                                ', '23', 'dumbo3', 'D11111111111', '0988888888', 'dumbo@mail.com', 'dumbo', '0999999999', 0, ''),
(91, '30FDA26A986E06F0BC45899F42FA5FBC                                ', '23', 'dumbo', 'D11111111111', '0988888888', 'dumbo@mail.com', 'dumbo', '0999999999', 0, ''),
(92, '30FDA26A986E06F0BC45899F42FA5FBC                                ', '23', 'dumbo4', 'D222222222', '0988888888', 'dumbo@mail.com', 'dumbo', '0999999999', 0, ''),
(93, 'AFB8E8BF                                ', '23', 'maqueen', 'D111111111', '0966666666', 'maqueen@mail.com', 'maqueen', '0922222222', 0, ''),
(94, 'AFB8E8BF                                ', '23', 'maqueen2', 'T222222222', '0933333333', 'maqueen@mail.com', 'maqueen', '0988888888', 0, ''),
(99, 'FE29EE136F59                                ', '24', 'test22', 'test22', 'test22', 'test22@mail.com', 'test22', 'test22', 0, ''),
(100, 'FE29EE136F59                                ', '24', 'test33', 'test33', 'test33', 'test33@mail.com', 'test33', 'test33', 0, ''),
(101, '379C9002B79F                                ', '24', 'delete00', 'delete00', 'delete00', 'delete00@mail.com', 'delete00', 'delete00', 0, ''),
(102, '379C9002B79F                                ', '24', 'delete22', 'delete22', 'delete22', 'delete22@mail.com', 'delete22', 'delete22', 0, ''),
(103, '2AADCD45983B                                ', '24', 'test', 'test', 'test', 'test@mail.com', 'test', 'test', 0, ''),
(108, 'FCF3E3C5986B                                ', '24', 'anna', 'anna', 'anna', 'anna@mail.com', 'anna', 'anna', 0, ''),
(109, 'FCF3E3C5986B                                ', '24', 'anna2', 'anna2', 'anna2', 'anna2@mail.com', 'anna2', 'anna2', 0, ''),
(110, 'FCF3E3C5986B                                ', '24', 'anna3', 'anna3', 'anna3', 'anna3@mail.com', 'anna3', 'anna3', 0, ''),
(111, 'FCF3E3C5986B                                ', '24', 'anna4', 'anna4', 'anna4', 'anna4@mail.com', 'anna4', 'anna4', 0, ''),
(112, '0736BED0BE58                                ', '24', 'elsa11', 'elsa11', 'elsa11', 'elsa11@mail.com', 'elsa11', 'elsa11', 0, ''),
(113, '0736BED0BE58                                ', '24', 'elsa22', 'elsa22', 'elsa22', 'elsa22@mail.com', 'elsa22', 'elsa22', 0, ''),
(114, '25FC2DF12C66                                ', '24', 'buzz', 'buzz', 'buzz', 'buzz@mail.com', 'buzz', 'buzz', 0, ''),
(115, '25FC2DF12C66                                ', '24', 'buzz', 'buzz', 'buzz', 'buzz@mail.com', 'buzz', 'buzz', 0, ''),
(116, 'CC1DBE8AC9A5                                ', '24', 'belle', 'belle', 'belle', 'belle@mail.com', 'belle', 'belle', 0, ''),
(117, 'CC1DBE8AC9A5                                ', '24', 'beast', 'beast', 'beast', 'beast@mail.com', 'beast', 'beast', 0, ''),
(121, '0779EA9125A1                                ', '24', 'olaf', 'olaf', 'olaf', 'olaf@mail.com', 'olaf', 'olaf', 0, ''),
(122, '07B47C1EF0E3                                ', '24', 'anna', 'A111111111', '0988999777', 'anna@mail.com', 'olaf', '0966555333', 0, ''),
(123, '91516B2C0ECD                                ', '24', 'mickey', 'mickey11', '0900008777', 'mickey@mail.com', 'mickey', '0911222333', 0, ''),
(124, '91516B2C0ECD                                ', '24', 'totoro', 'totoro55', '0955555555', 'totoro@mail.com', 'totoro', '0933333222', 0, ''),
(125, '91516B2C0ECD                                ', '24', 'pluto', 'pluto33', '0988888888', 'pluto@mail.com', 'pluto', '0900000000', 0, ''),
(126, '91516B2C0ECD                                ', '24', 'catcat', 'catcat11', '0966666666', 'catcat@mail.com', 'catcat', '0933333333', 0, ''),
(128, 'CA63F2705402                                ', '24', 'baymax', 'A111111111', '0999000888', 'baymax@mail.com', 'baymax', '', 0, ''),
(129, 'CA63F2705402                                ', '24', 'baymax22', 'B222222222', '0900777666', 'baymax22@mail.com', 'baymax22', '0933222111', 0, ''),
(133, 'E16278697AF7                                ', '24', 'test22', 'A111111111', '0966444333', 'test22@mail.com', 'tracy', '0986666666', 0, '');

-- --------------------------------------------------------

--
-- 資料表結構 `event_applyorder`
--

CREATE TABLE `event_applyorder` (
  `apply_id` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `mem_account` varchar(255) NOT NULL,
  `apply_num` varchar(2) NOT NULL,
  `apply_date` varchar(255) NOT NULL,
  `apply_pay` int(11) DEFAULT NULL,
  `apply_order` int(11) DEFAULT NULL COMMENT '1->取消訂單',
  `apply_amount` varchar(255) NOT NULL,
  `apply_payment` int(1) NOT NULL COMMENT '0->信用卡；1->ATM；3->ibon'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_applyorder`
--

INSERT INTO `event_applyorder` (`apply_id`, `event_id`, `mem_account`, `apply_num`, `apply_date`, `apply_pay`, `apply_order`, `apply_amount`, `apply_payment`) VALUES
('0736BED0BE58                                ', '24', 'elsa', '2', '2019-04-06', NULL, NULL, '40', 0),
('0779EA9125A1                                ', '24', 'olaf', '1', '2019-04-06', NULL, NULL, '20', 0),
('07B47C1EF0E3                                ', '24', 'anna', '1', '2019-04-06', NULL, NULL, '20', 0),
('1', '1', 'testdog', '2', '2019-05-23', 1, 1, '', 0),
('2', '9', 'testcat', '4', '2019-03-30', 0, 0, '', 0),
('23', '6', 'testtiger', '2', '2019-03-18', NULL, NULL, '6000', 0),
('24', '9', 'testelephant', '2', '2019-03-18', NULL, NULL, '6000', 0),
('25', '6', 'testelephant', '2', '2019-03-18', 0, 1, '6000', 0),
('25FC2DF12C66                                ', '24', 'buzz', '1', '2019-04-06', NULL, NULL, '20', 0),
('26', '16', 'testdog', '4', '2019-03-19', 1, 0, '10000', 0),
('27', '11', 'testdog', '2', '2019-03-19', NULL, NULL, '6000', 0),
('2AADCD45983B                                ', '24', 'testsheep', '1', '2019-04-06', NULL, NULL, '20', 0),
('3', '3', 'testrabbit', '4', '2019-03-23', 0, 1, '', 0),
('30', '16', 'testmonkey', '2', '2019-03-19', NULL, NULL, '6000', 0),
('30FDA26A986E06F0BC45899F42FA5FBC                                ', '23', 'dumbo', '4', '2019-04-04', NULL, NULL, '800', 0),
('36', '19', 'testmonkey', '2', '2019-03-20', NULL, NULL, '6000', 0),
('37', '19', 'testsheep', '2', '2019-03-20', NULL, NULL, '6000', 0),
('379C9002B79F                                ', '24', 'testdog', '2', '2019-04-06', NULL, NULL, '40', 0),
('38', '20', 'mem22', '5', '2019-03-20', NULL, NULL, '11000', 0),
('39', '20', 'mem55', '2', '2019-03-20', NULL, NULL, '4400', 0),
('4', '11', 'testbear', '4', '2019-03-30', 0, 0, '', 0),
('40', '21', 'Bonnie', '2', '2019-03-21', NULL, NULL, '4400', 0),
('41', '21', 'marin', '6', '2019-03-21', NULL, NULL, '13200', 0),
('42', '22', 'pikachu', '3', '2019-03-21', 0, 0, '0', 0),
('5', '14', 'testpig', '3', '2019-04-30', 1, 0, '', 0),
('6', '1', 'testtiger', '2', '2019-04-30', NULL, NULL, '', 0),
('91516B2C0ECD                                ', '24', 'duffy', '4', '2019-04-06 13:42:05', NULL, NULL, '80', 0),
('9C6E4EC68FDBD16600B02622D3B07790                                ', '24', 'tracy', '2', '2019-04-04', NULL, NULL, '40', 0),
('AFB8E8BF                                ', '23', 'maqueen', '2', '2019-04-04', NULL, NULL, '400', 0),
('C231AF2EB', '23', 'anna', '2', '2019-04-04', NULL, NULL, '400', 0),
('CA63F2705402                                ', '24', 'baymax', '2', '2019-04-07 05:50:12', NULL, NULL, '40', 0),
('CC1DBE8AC9A5                                ', '24', 'belle', '2', '2019-04-06', NULL, NULL, '40', 0),
('E16278697AF7                                ', '24', 'testdog', '1', '2019-04-07 06:08:41', 0, 0, '20', 0),
('FCF3E3C5986B                                ', '24', 'anna', '4', '2019-04-06', NULL, NULL, '80', 0),
('FE29EE136F59                                ', '24', 'testdog', '2', '2019-04-06', NULL, NULL, '40', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `event_feedback`
--

CREATE TABLE `event_feedback` (
  `eventFB_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `eventFB_title` varchar(100) NOT NULL,
  `eventFB_comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_feedback`
--

INSERT INTO `event_feedback` (`eventFB_id`, `event_id`, `member_id`, `eventFB_title`, `eventFB_comment`) VALUES
(1, '1', 'pikachu', 'excellent!!', '極光（英語：Aurora）是在高緯度（北極和南極）的天空中，帶電的高能粒子和高層大氣（熱層）中的原子碰撞造成的發光現象。帶電粒子來自磁層和太陽風，在地球上，它們被地球的磁場帶進大氣層。大多數的極光發生在所謂的「極光帶」[1][2]，在觀察上，這是在所有的經度上距離地磁極10°至20°，緯度寬約3°至6°的帶狀區域。太陽風受到地球的磁場導引直接進入大氣層。當磁暴發生時，在較低的緯度也會出現極光。極光不只在地球上出現，太陽系內的其他一些具有磁場的行星上也有極光[3]。\r\n\r\n在英、法等許多西方語言中，人們遵照伽利略的習慣，直接用奧羅拉（Aurora）女神的名字來稱呼極光現象。');

-- --------------------------------------------------------

--
-- 資料表結構 `event_list`
--

CREATE TABLE `event_list` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_intro` varchar(255) NOT NULL,
  `event_intro2` varchar(255) NOT NULL,
  `event_intro3` varchar(255) NOT NULL,
  `event_applyStart` date NOT NULL,
  `event_applyEnd` date NOT NULL,
  `event_dateStart` date NOT NULL,
  `event_dateEnd` date NOT NULL,
  `event_price` int(11) NOT NULL,
  `camp_id` varchar(255) NOT NULL,
  `event_upLimit` int(11) NOT NULL,
  `event_shelf` int(11) NOT NULL COMMENT '	0->上架；1->下架；3->頁面預告',
  `event_remark` varchar(255) NOT NULL,
  `event_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_list`
--

INSERT INTO `event_list` (`event_id`, `event_name`, `event_intro`, `event_intro2`, `event_intro3`, `event_applyStart`, `event_applyEnd`, `event_dateStart`, `event_dateEnd`, `event_price`, `camp_id`, `event_upLimit`, `event_shelf`, `event_remark`, `event_img`) VALUES
(1, '追逐星空的旅程', ' 有璀璨銀河的營區，是感受耶誕氣氛的最好去處！尤其是無光害的營區，星光佈滿大片黑布，燦爛星空想看多久都沒問題。耶誕佳節將至，親友小聚烤肉、交換禮物，在帳篷外披上耶誕燈就很有感覺。露營樂精選出無光害露營區，晚上烤肉看星星，最適合小團露、親子同行！ ', '    ', '    ', '2019-03-24', '2019-04-21', '2019-05-18', '2019-05-19', 3000, '1', 40, 1, '  ', 'aurora.jpg'),
(4, '- 誰是小當家 ●用美味料裡來一決勝負吧！-', '露營活動大部分都需要自己準備餐點，但如果你已經吃膩了單純的烤肉、火鍋，是不是應該來點不一樣的呢？', '讓我們把理所當然的料理變成更有趣的遊戲吧！召集左鄰右舍，每個人或每組負責一道菜色進行 PK 大賽，除了讓餐桌更豐盛外，在比賽的過程中還能讓大家發揮創意、激盪出更多有趣的美味料理，快一起來爭奪特級廚師的寶座吧！', '位於新竹關西鎮的「樸真園」擁有三萬坪的純淨天地，園區堅持三十年的不灑農藥，也讓鳥類、昆蟲等動物自在地穿梭其中 ~\r\n\r\n而這裡也是一處相對奢華便利的露營選擇，除了幫你把烹飪用具都準備好好外，營帳內的環境好像家一般的舒適，最適合給想露營又不希望太奔波狼狽的你，來這片如畫的風景中待上兩天一夜，絕對讓你身心充飽滿滿的能量！', '2019-04-11', '2019-04-26', '2019-06-29', '2019-06-30', 3500, '7', 35, 0, '', 'Junior Chef.jpg'),
(5, '─ 愛玩遊戲咖  ●人多人少都能玩 ─', '互動式的遊戲，似乎是一種能快速拉近人與人之間距離的活動了，不論是熟識的朋友、或者初次見面的同團夥伴，只要一起加入戰局就能快速地跳離尷尬無聊的時光，直接讓人熱血沸騰！', '沒有準備道具的你，可以選擇類似殺手遊戲類型的活動，只要有足夠的人數即可進行；當然，如果你的行囊空間足夠的話，可以帶些簡單的撲克牌、桌遊等等，又或者你可以挑選恐怖戳戳樂和超可愛的復古彈珠台等趣味遊戲道具，都可以讓你們在露營的過程中度過好玩又歡樂的時光。 ', '          ', '2019-04-07', '2019-05-05', '2019-07-20', '2019-07-21', 3000, '23', 20, 0, '     ', 'enjoy.jpg'),
(6, '女孩的露營派對：專屬女生的Outdoor Party', '是時候擺脫裝備至上、又貴又重的汽車露營（Auto Camping）了，跟著一群名為「蘑菇女孩」的女子露營團隊，帶上實用兼具個人特色的裝備，從搭帳棚到料理、遊戲等，自己一手包辦這場令人興奮的露營吧！', '  ', '  ', '2019-06-01', '2019-06-16', '2019-07-22', '2019-07-23', 4000, '3', 30, 3, '● 約 6月下旬開放報名，敬請期待', 'girlspower.jpg'),
(7, '─ Family Day 新森活露營趣 ● 一起擁抱野趣生活 ─', '號召車壇最具凝聚力的車主，一同走出戶外徜徉山林，並透過一連串精彩活動內容，緊密連結車主、親子、家人以及品牌之間的深厚情誼，寫下與Subaru的精采故事。', '活動採用全露營擁抱野趣生活的住宿模式，期盼每一位參與車主能夠遠離塵囂，駕馭著自己所鍾愛的Subaru汽車，駛入宛如世外桃源般的「不遠露營度假山莊」，盡情享受一系列精采活動內容，包含專業露營講座、熱情奔放營火晚會、活力四射樂團表演、令人樂不可支互動遊戲、重視團隊精神家庭大地闖關遊戲，Subaru邀請車主們一同參與、體現Subaru「豐富人車生活」的品牌精神。', '  ', '2019-05-05', '2019-06-09', '2019-08-03', '2019-08-04', 4000, '2', 30, 0, ' ', 'familycamping.jpg'),
(8, 'TOY STORY 4 ● 結訓手刀進威秀', '   Woody has always been confident about his place in the world and that his priority is taking care of his kid, whether that’s Andy or Bonnie. But when Bonnie adds a reluctant new toy called “Forky” to her room, a road trip adventure alongside old and ne', '          ', '          ', '2019-04-01', '2019-04-30', '2019-06-21', '2019-06-21', 300, '17', 100, 0, '     ', 'Toy_Story_4_poster.jpg'),
(9, '─ 寶貝親子咖 ●自己的帳篷自己搭，讓孩子學會動手做 ─', '「小松鼠帶你去露營」除了有親子同歡的趣味遊戲、也安排了夜間音樂演唱會、星空電影院等活動，非常適合新手露客們，只要帶著衣服及少少的用品，輕輕鬆鬆就可以出發露營去！', '  帶著家中小寶貝的把把麻麻，還沒想好要做什麼活動才能讓孩子玩得開心嗎？\r\n\r\n「小松鼠帶你去露營」除了有親子同歡的趣味遊戲、也安排了夜間音樂演唱會、星空電影院等活動，非常適合新手露客們，只要帶著衣服及少少的用品，輕輕鬆鬆就可以出發露營去！\r\n\r\n另外，在這裡孩子們能找到一起開心共樂的玩伴，讓爸媽們放鬆地在一旁聊聊天呢。', '  ', '2019-05-05', '2019-05-19', '2019-06-16', '2019-06-17', 3500, '3', 50, 0, '', 'family.jpg'),
(11, '─ 熱情探險咖 ●跟著教練登頂吧 ─', '擁有滿腔熱血的你，不該只是待在舒適的營區而已，快揹著你的行囊、撐起手中的拐杖、一步步地征服高山百岳吧！在合歡山小溪營地中，不只可體驗野營的樂趣，更能獲得登百岳的殊榮，同時，享受無與倫比的絕美景致！ ', '  登山還要自己準備露營裝備，想到這你是不是已經打退堂鼓了呢？別擔心！貼心的「眺躍鳥」只要你準備個人睡袋，其他都已經幫你打點妥當了呢！', '  位於合歡山北峰下約 1 公里處的小溪營地，有冷杉林圍繞、鄰近潺潺溪流，白天可坐臥草皮，眺望雄偉中央山脈群峰，夜晚可躺下仰望如細沙般的星空，從登山口至小溪營地，小小的健行路程僅需 3 公里，跟著教練的腳步調整節奏，保證你也能輕鬆抵達。', '2019-06-16', '2019-06-30', '2019-08-30', '2019-08-31', 4000, '5', 30, 0, ' ', 'advanture.jpg'),
(14, '─ 感性浪漫咖專屬 ●星空電影院─', '小小的微型投影機，就算沒有屏幕也能打在帳篷上，在星空下沒有戲院的包袱，不需要輕聲細語、不會禁止攜帶外食，你可以開懷地大笑、也能感動地大哭，只要緊靠著身旁的家人朋友，就能感受最浪漫的星空電影...', '    \r\n如果說夜晚的滿天星空是露營最該享受的浪漫體驗，那你更應該早起看日出，體會那冉冉升起的旭日，延續前晚', '   \r\n如果說夜晚的滿天星空是露營最該享受的浪漫體驗，那你更應該早起看日出，體會那冉冉升起的旭日，延續前晚大自然現象所帶來的美好感動！ \r\n清水斷崖位於花蓮清水山東側，其地勢險峻、絕壁臨海面長達 5 公里非常壯觀，這是行經蘇花公路的必看景點，也是台灣十景之一。來到這裡，你可以體驗在無光害的環境下享受星空露營、更能早', '2019-04-11', '2019-04-26', '2019-06-29', '2019-06-30', 2500, '6', 50, 0, '     ', 'opencinema.jpg'),
(20, '─ 歡樂歌舞咖 ●即興舞蹈，開心就好 ─', '在豐盛的晚飯後，鄒族藝術家 ─ 不舞就要帶你展開一場夜晚部落音樂會了，平時會有愛熱鬧的大哥、大姐們，與你一同彈吉他、歌唱度過歡樂的夜晚 ~ 如果你很幸運，遇到村落內的特別活動或慶典，那將會是令人開心難忘的一夜呢！ ', '  ●森林音樂會響起大自然的絕美樂章  ', '  在阿里山上有一處星空帳篷，沒有城市喧囂，只有兩頂透明帷幕的帳篷，要讓你躺在床上也能望向滿天星斗，這山間的夜晚有盛宴、有美酒，那怎麼能少了助興的音樂呢？\r\n\r\n在豐盛的晚飯後，鄒族藝術家 ─ 不舞就要帶你展開一場夜晚部落音樂會了，平時會有愛熱鬧的大哥、大姐們，與你一同彈吉他、歌唱度過歡樂的夜晚 ~ 如果你很幸運，遇到村落內的特別活動或慶典，那將會是令人開心難忘的一夜呢！  ', '2019-04-20', '2019-05-20', '2019-07-10', '2019-07-11', 2200, '20', 30, 0, '   ', 'dance-africa-footprint-s1-mask9.jpg'),
(22, '一起露營追寶趣', '  在指定露營地的道館中打贏任一隻佔領的寶可夢，即可獲得資格  ', '  獲得寶可夢 露營樹懶 一隻  ', '  粉絲團按讚分享，再送999皮卡丘幣  ', '2019-03-22', '2019-03-31', '2019-04-01', '2019-04-01', 20, '19', 3, 1, '  ', 'pokemon.jpg'),
(23, 'test delete', '   test delete   ', '      ', '      ', '2019-04-05', '2019-04-22', '2019-04-27', '2019-04-28', 200, '3', 8, 1, '   ', 'testing.jpg'),
(24, 'delete', '      delete     ', '            ', '            ', '2019-04-05', '2019-04-19', '2019-04-27', '2019-04-27', 20, '12', 30, 1, '      ', 'delete.jpg'),
(27, 'camping is an attitude', ' just do it! ', '  ', '  ', '2019-04-13', '2019-04-27', '2019-04-26', '2019-04-30', 3500, '15', 30, 1, ' ', '78009b0c6c96495c183333b9182075c765c57cef.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `host_infolist`
--

CREATE TABLE `host_infolist` (
  `host_id` int(11) NOT NULL COMMENT 'id',
  `host_account` varchar(255) NOT NULL COMMENT '帳戶',
  `host_password` varchar(255) NOT NULL COMMENT '密碼',
  `host_parkName` varchar(255) NOT NULL COMMENT '園區名',
  `host_tel` varchar(255) NOT NULL COMMENT '連絡電話',
  `host_fax` varchar(255) DEFAULT NULL COMMENT '傳真號碼',
  `host_email` varchar(255) NOT NULL COMMENT '電子郵件',
  `city` varchar(255) NOT NULL COMMENT '所在城市',
  `town` varchar(255) NOT NULL COMMENT '所在地區',
  `zipcode` varchar(255) NOT NULL COMMENT '郵遞區號',
  `host_address` varchar(255) NOT NULL COMMENT '詳細地址',
  `host_intro` text COMMENT '園區介紹',
  `host_paymentType` varchar(255) NOT NULL COMMENT '收款方式',
  `host_bankName` varchar(255) NOT NULL COMMENT '收款姓名',
  `host_bankAddress` varchar(255) NOT NULL COMMENT '收款地址',
  `host_bankIBAN` varchar(255) DEFAULT NULL COMMENT '銀行IBAN碼',
  `host_bankSWIFT` varchar(255) DEFAULT NULL COMMENT '銀行SWIFT碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `host_infolist`
--

INSERT INTO `host_infolist` (`host_id`, `host_account`, `host_password`, `host_parkName`, `host_tel`, `host_fax`, `host_email`, `city`, `town`, `zipcode`, `host_address`, `host_intro`, `host_paymentType`, `host_bankName`, `host_bankAddress`, `host_bankIBAN`, `host_bankSWIFT`) VALUES
(1, '帳號_001', '密碼_001', '小杵莊園_001', 'tel_001', 'fax_001', 'email_001', '臺北市', '大安區', '106', '地址_001', '介紹_001', '轉帳', '林宛臻', '轉帳地址_001', 'IBAN_001', 'SWIFT_001'),
(2, '帳號_002', '密碼_002', '小杵莊園_002', 'tel_002', 'fax_002', 'email_002', '臺北市', '大安區', '106', '地址_002', '介紹_002', '轉帳', '林宛臻', '轉帳地址_002', 'IBAN_002', 'SWIFT_002'),
(3, '帳號_003', '密碼_003', '小杵莊園_003', 'tel_003', 'fax_003', 'email_003', '臺北市', '大安區', '106', '地址_003', '介紹_003', '轉帳', '林宛臻', '轉帳地址_003', 'IBAN_003', 'SWIFT_003'),
(4, '帳號_004', '密碼_004', '小杵莊園_004', 'tel_004', 'fax_004', 'email_004', '臺北市', '大安區', '106', '地址_004', '介紹_004', '轉帳', '林宛臻', '轉帳地址_004', 'IBAN_004', 'SWIFT_004'),
(5, '帳號_005', '密碼_005', '小杵莊園_005', 'tel_005', 'fax_005', 'email_005', '臺北市', '大安區', '106', '地址_005', '介紹_005', '轉帳', '林宛臻', '轉帳地址_005', 'IBAN_005', 'SWIFT_005'),
(6, '帳號_006', '密碼_006', '小杵莊園_006', 'tel_006', 'fax_006', 'email_006', '臺北市', '大安區', '106', '地址_006', '介紹_006', '轉帳', '林宛臻', '轉帳地址_006', 'IBAN_006', 'SWIFT_006'),
(7, '帳號_007', '密碼_007', '小杵莊園_007', 'tel_007', 'fax_007', 'email_007', '臺北市', '大安區', '106', '地址_007', '介紹_007', '轉帳', '林宛臻', '轉帳地址_007', 'IBAN_007', 'SWIFT_007'),
(8, '帳號_008', '密碼_008', '小杵莊園_008', 'tel_008', 'fax_008', 'email_008', '臺北市', '大安區', '106', '地址_008', '介紹_008', '轉帳', '林宛臻', '轉帳地址_008', 'IBAN_008', 'SWIFT_008'),
(9, '帳號_009', '密碼_009', '小杵莊園_009', 'tel_009', 'fax_009', 'email_009', '臺北市', '大安區', '106', '地址_009', '介紹_009', '轉帳', '林宛臻', '轉帳地址_009', 'IBAN_009', 'SWIFT_009'),
(10, '帳號_010', '密碼_010', '小杵莊園_010', 'tel_010', 'fax_010', 'email_010', '臺北市', '大安區', '106', '地址_010', '介紹_010', '轉帳', '林宛臻', '轉帳地址_010', 'IBAN_010', 'SWIFT_010'),
(11, '帳號_011', '密碼_011', '小杵莊園_011', 'tel_011', 'fax_011', 'email_011', '臺北市', '大安區', '106', '地址_011', '介紹_011', '轉帳', '林宛臻', '轉帳地址_011', 'IBAN_011', 'SWIFT_011'),
(12, '帳號_012', '密碼_012', '小杵莊園_012', 'tel_012', 'fax_012', 'email_012', '臺北市', '大安區', '106', '地址_012', '介紹_012', '轉帳', '林宛臻', '轉帳地址_012', 'IBAN_012', 'SWIFT_012'),
(13, '帳號_013', '密碼_013', '小杵莊園_013', 'tel_013', 'fax_013', 'email_013', '臺北市', '大安區', '106', '地址_013', '介紹_013', '轉帳', '林宛臻', '轉帳地址_013', 'IBAN_013', 'SWIFT_013'),
(14, '帳號_014', '密碼_014', '小杵莊園_014', 'tel_014', 'fax_014', 'email_014', '臺北市', '大安區', '106', '地址_014', '介紹_014', '轉帳', '林宛臻', '轉帳地址_014', 'IBAN_014', 'SWIFT_014'),
(15, '帳號_015', '密碼_015', '小杵莊園_015', 'tel_015', 'fax_015', 'email_015', '臺北市', '大安區', '106', '地址_015', '介紹_015', '轉帳', '林宛臻', '轉帳地址_015', 'IBAN_015', 'SWIFT_015'),
(16, '帳號_016', '密碼_016', '小杵莊園_016', 'tel_016', 'fax_016', 'email_016', '臺北市', '大安區', '106', '地址_016', '介紹_016', '轉帳', '林宛臻', '轉帳地址_016', 'IBAN_016', 'SWIFT_016'),
(17, '帳號_017', '密碼_017', '小杵莊園_017', 'tel_017', 'fax_017', 'email_017', '臺北市', '大安區', '106', '地址_017', '介紹_017', '轉帳', '林宛臻', '轉帳地址_017', 'IBAN_017', 'SWIFT_017'),
(18, '帳號_018', '密碼_018', '小杵莊園_018', 'tel_018', 'fax_018', 'email_018', '臺北市', '大安區', '106', '地址_018', '介紹_018', '轉帳', '林宛臻', '轉帳地址_018', 'IBAN_018', 'SWIFT_018'),
(19, '帳號_019', '密碼_019', '小杵莊園_019', 'tel_019', 'fax_019', 'email_019', '臺北市', '大安區', '106', '地址_019', '介紹_019', '轉帳', '林宛臻', '轉帳地址_019', 'IBAN_019', 'SWIFT_019'),
(20, '帳號_020', '密碼_020', '小杵莊園_020', 'tel_020', 'fax_020', 'email_020', '臺北市', '大安區', '106', '地址_020', '介紹_020', '轉帳', '林宛臻', '轉帳地址_020', 'IBAN_020', 'SWIFT_020'),
(21, '帳號_021', '密碼_021', '小杵莊園_021', 'tel_021', 'fax_021', 'email_021', '臺北市', '大安區', '106', '地址_021', '介紹_021', '轉帳', '林宛臻', '轉帳地址_021', 'IBAN_021', 'SWIFT_021'),
(22, '帳號_022', '密碼_022', '小杵莊園_022', 'tel_022', 'fax_022', 'email_022', '臺北市', '大安區', '106', '地址_022', '介紹_022', '轉帳', '林宛臻', '轉帳地址_022', 'IBAN_022', 'SWIFT_022'),
(23, '帳號_023', '密碼_023', '小杵莊園_023', 'tel_023', 'fax_023', 'email_023', '臺北市', '大安區', '106', '地址_023', '介紹_023', '轉帳', '林宛臻', '轉帳地址_023', 'IBAN_023', 'SWIFT_023'),
(24, '帳號_024', '密碼_024', '小杵莊園_024', 'tel_024', 'fax_024', 'email_024', '臺北市', '大安區', '106', '地址_024', '介紹_024', '轉帳', '林宛臻', '轉帳地址_024', 'IBAN_024', 'SWIFT_024'),
(25, '帳號_025', '密碼_025', '小杵莊園_025', 'tel_025', 'fax_025', 'email_025', '臺北市', '大安區', '106', '地址_025', '介紹_025', '轉帳', '林宛臻', '轉帳地址_025', 'IBAN_025', 'SWIFT_025'),
(26, '帳號_026', '密碼_026', '小杵莊園_026', 'tel_026', 'fax_026', 'email_026', '臺北市', '大安區', '106', '地址_026', '介紹_026', '轉帳', '林宛臻', '轉帳地址_026', 'IBAN_026', 'SWIFT_026'),
(27, '帳號_027', '密碼_027', '小杵莊園_027', 'tel_027', 'fax_027', 'email_027', '臺北市', '大安區', '106', '地址_027', '介紹_027', '轉帳', '林宛臻', '轉帳地址_027', 'IBAN_027', 'SWIFT_027'),
(28, '帳號_028', '密碼_028', '小杵莊園_028', 'tel_028', 'fax_028', 'email_028', '臺北市', '大安區', '106', '地址_028', '介紹_028', '轉帳', '林宛臻', '轉帳地址_028', 'IBAN_028', 'SWIFT_028'),
(29, '帳號_029', '密碼_029', '小杵莊園_029', 'tel_029', 'fax_029', 'email_029', '臺北市', '大安區', '106', '地址_029', '介紹_029', '轉帳', '林宛臻', '轉帳地址_029', 'IBAN_029', 'SWIFT_029'),
(30, '帳號_030', '密碼_030', '小杵莊園_030', 'tel_030', 'fax_030', 'email_030', '臺北市', '大安區', '106', '地址_030', '介紹_030', '轉帳', '林宛臻', '轉帳地址_030', 'IBAN_030', 'SWIFT_030'),
(31, '帳號_031', '密碼_031', '小杵莊園_031', 'tel_031', 'fax_031', 'email_031', '臺北市', '大安區', '106', '地址_031', '介紹_031', '轉帳', '林宛臻', '轉帳地址_031', 'IBAN_031', 'SWIFT_031'),
(32, '帳號_032', '密碼_032', '小杵莊園_032', 'tel_032', 'fax_032', 'email_032', '臺北市', '大安區', '106', '地址_032', '介紹_032', '轉帳', '林宛臻', '轉帳地址_032', 'IBAN_032', 'SWIFT_032'),
(33, '帳號_033', '密碼_033', '小杵莊園_033', 'tel_033', 'fax_033', 'email_033', '臺北市', '大安區', '106', '地址_033', '介紹_033', '轉帳', '林宛臻', '轉帳地址_033', 'IBAN_033', 'SWIFT_033'),
(34, '帳號_034', '密碼_034', '小杵莊園_034', 'tel_034', 'fax_034', 'email_034', '臺北市', '大安區', '106', '地址_034', '介紹_034', '轉帳', '林宛臻', '轉帳地址_034', 'IBAN_034', 'SWIFT_034'),
(35, '帳號_035', '密碼_035', '小杵莊園_035', 'tel_035', 'fax_035', 'email_035', '臺北市', '大安區', '106', '地址_035', '介紹_035', '轉帳', '林宛臻', '轉帳地址_035', 'IBAN_035', 'SWIFT_035'),
(36, '帳號_036', '密碼_036', '小杵莊園_036', 'tel_036', 'fax_036', 'email_036', '臺北市', '大安區', '106', '地址_036', '介紹_036', '轉帳', '林宛臻', '轉帳地址_036', 'IBAN_036', 'SWIFT_036'),
(37, '帳號_037', '密碼_037', '小杵莊園_037', 'tel_037', 'fax_037', 'email_037', '臺北市', '大安區', '106', '地址_037', '介紹_037', '轉帳', '林宛臻', '轉帳地址_037', 'IBAN_037', 'SWIFT_037'),
(38, '帳號_038', '密碼_038', '小杵莊園_038', 'tel_038', 'fax_038', 'email_038', '臺北市', '大安區', '106', '地址_038', '介紹_038', '轉帳', '林宛臻', '轉帳地址_038', 'IBAN_038', 'SWIFT_038'),
(39, '帳號_039', '密碼_039', '小杵莊園_039', 'tel_039', 'fax_039', 'email_039', '臺北市', '大安區', '106', '地址_039', '介紹_039', '轉帳', '林宛臻', '轉帳地址_039', 'IBAN_039', 'SWIFT_039'),
(40, '帳號_040', '密碼_040', '小杵莊園_040', 'tel_040', 'fax_040', 'email_040', '臺北市', '大安區', '106', '地址_040', '介紹_040', '轉帳', '林宛臻', '轉帳地址_040', 'IBAN_040', 'SWIFT_040'),
(41, '帳號_041', '密碼_041', '小杵莊園_041', 'tel_041', 'fax_041', 'email_041', '臺北市', '大安區', '106', '地址_041', '介紹_041', '轉帳', '林宛臻', '轉帳地址_041', 'IBAN_041', 'SWIFT_041'),
(42, '帳號_042', '密碼_042', '小杵莊園_042', 'tel_042', 'fax_042', 'email_042', '臺北市', '大安區', '106', '地址_042', '介紹_042', '轉帳', '林宛臻', '轉帳地址_042', 'IBAN_042', 'SWIFT_042'),
(43, '帳號_043', '密碼_043', '小杵莊園_043', 'tel_043', 'fax_043', 'email_043', '臺北市', '大安區', '106', '地址_043', '介紹_043', '轉帳', '林宛臻', '轉帳地址_043', 'IBAN_043', 'SWIFT_043'),
(44, '帳號_044', '密碼_044', '小杵莊園_044', 'tel_044', 'fax_044', 'email_044', '臺北市', '大安區', '106', '地址_044', '介紹_044', '轉帳', '林宛臻', '轉帳地址_044', 'IBAN_044', 'SWIFT_044'),
(45, '帳號_045', '密碼_045', '小杵莊園_045', 'tel_045', 'fax_045', 'email_045', '臺北市', '大安區', '106', '地址_045', '介紹_045', '轉帳', '林宛臻', '轉帳地址_045', 'IBAN_045', 'SWIFT_045'),
(46, '帳號_046', '密碼_046', '小杵莊園_046', 'tel_046', 'fax_046', 'email_046', '臺北市', '大安區', '106', '地址_046', '介紹_046', '轉帳', '林宛臻', '轉帳地址_046', 'IBAN_046', 'SWIFT_046'),
(47, '帳號_047', '密碼_047', '小杵莊園_047', 'tel_047', 'fax_047', 'email_047', '臺北市', '大安區', '106', '地址_047', '介紹_047', '轉帳', '林宛臻', '轉帳地址_047', 'IBAN_047', 'SWIFT_047'),
(48, '帳號_048', '密碼_048', '小杵莊園_048', 'tel_048', 'fax_048', 'email_048', '臺北市', '大安區', '106', '地址_048', '介紹_048', '轉帳', '林宛臻', '轉帳地址_048', 'IBAN_048', 'SWIFT_048'),
(49, '帳號_049', '密碼_049', '小杵莊園_049', 'tel_049', 'fax_049', 'email_049', '臺北市', '大安區', '106', '地址_049', '介紹_049', '轉帳', '林宛臻', '轉帳地址_049', 'IBAN_049', 'SWIFT_049'),
(50, '帳號_050', '密碼_050', '小杵莊園_050', 'tel_050', 'fax_050', 'email_050', '臺北市', '大安區', '106', '地址_050', '介紹_050', '轉帳', '林宛臻', '轉帳地址_050', 'IBAN_050', 'SWIFT_050');

-- --------------------------------------------------------

--
-- 資料表結構 `host_paymenttype`
--

CREATE TABLE `host_paymenttype` (
  `host_paymentTypeId` int(11) NOT NULL COMMENT '流水號',
  `host_paymentType` varchar(255) NOT NULL COMMENT '收款類型'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `host_paymenttype`
--

INSERT INTO `host_paymenttype` (`host_paymentTypeId`, `host_paymentType`) VALUES
(1, 'PayPal'),
(2, '電匯');

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

-- --------------------------------------------------------

--
-- 資料表結構 `location_citylist`
--

CREATE TABLE `location_citylist` (
  `city_id` int(11) NOT NULL COMMENT 'id',
  `city_name` varchar(255) NOT NULL COMMENT '城市名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `location_citylist`
--

INSERT INTO `location_citylist` (`city_id`, `city_name`) VALUES
(1, '基隆市'),
(2, '台北市'),
(3, '新北市'),
(4, '桃園市'),
(5, '新竹市'),
(6, '新竹縣'),
(7, '宜蘭縣'),
(8, '苗栗縣'),
(9, '台中市'),
(10, '彰化縣'),
(11, '南投縣'),
(12, '雲林縣'),
(13, '嘉義市'),
(14, '嘉義縣'),
(15, '台南市'),
(16, '高雄市'),
(17, '屏東縣'),
(18, '澎湖縣'),
(19, '花蓮縣'),
(20, '台東縣'),
(21, '金門縣'),
(22, '連江縣');

-- --------------------------------------------------------

--
-- 資料表結構 `location_distlist`
--

CREATE TABLE `location_distlist` (
  `dist_id` int(11) NOT NULL,
  `dist_name` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL COMMENT '所在城市id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `location_distlist`
--

INSERT INTO `location_distlist` (`dist_id`, `dist_name`, `city_id`) VALUES
(1, '仁愛區', 1),
(2, '中正區', 1),
(3, '信義區', 1),
(4, '中山區', 1),
(5, '安樂區', 1),
(6, '暖暖區', 1),
(7, '七堵區', 1),
(8, '中正區', 2),
(9, '大同區', 2),
(10, '中山區', 2),
(11, '松山區', 2),
(12, '大安區', 2),
(13, '萬華區', 2),
(14, '信義區', 2),
(15, '士林區', 2),
(16, '北投區', 2),
(17, '內湖區', 2),
(18, '南港區', 2),
(19, '文山區', 2),
(20, '板橋區', 3),
(21, '新莊區', 3),
(22, '中和區', 3),
(23, '永和區', 3),
(24, '土城區', 3),
(25, '樹林區', 3),
(26, '三峽區', 3),
(27, '鶯歌區', 3),
(28, '三重區', 3),
(29, '蘆洲區', 3),
(30, '五股區', 3),
(31, '泰山區', 3),
(32, '林口區', 3),
(33, '八里區', 3),
(34, '淡水區', 3),
(35, '三芝區', 3),
(36, '石門區', 3),
(37, '金山區', 3),
(38, '萬里區', 3),
(39, '汐止區', 3),
(40, '瑞芳區', 3),
(41, '貢寮區', 3),
(42, '平溪區', 3),
(43, '雙溪區', 3),
(44, '新店區', 3),
(45, '深坑區', 3),
(46, '石碇區', 3),
(47, '坪林區', 3),
(48, '烏來區', 3),
(49, '桃園區', 4),
(50, '中壢區', 4),
(51, '平鎮區', 4),
(52, '八德區', 4),
(53, '楊梅區', 4),
(54, '蘆竹區', 4),
(55, '大溪區', 4),
(56, '龍潭區', 4),
(57, '龜山區', 4),
(58, '大園區', 4),
(59, '觀音區', 4),
(60, '新屋區', 4),
(61, '復興區', 4),
(62, '東區', 5),
(63, '北區', 5),
(64, '香山區', 5),
(65, '竹北市', 6),
(66, '竹東鎮', 6),
(67, '新埔鎮', 6),
(68, '關西鎮', 6),
(69, '湖口鄉', 6),
(70, '新豐鄉', 6),
(71, '峨眉鄉', 6),
(72, '寶山鄉', 6),
(73, '北埔鄉', 6),
(74, '芎林鄉', 6),
(75, '橫山鄉', 6),
(76, '尖石鄉', 6),
(77, '五峰鄉', 6),
(78, '宜蘭市', 7),
(79, '頭城鎮', 7),
(80, '礁溪鄉', 7),
(81, '壯圍鄉', 7),
(82, '員山鄉', 7),
(83, '羅東鎮', 7),
(84, '蘇澳鎮', 7),
(85, '五結鄉', 7),
(86, '三星鄉', 7),
(87, '冬山鄉', 7),
(88, '大同鄉', 7),
(89, '南澳鄉', 7),
(90, '苗栗市', 8),
(91, '頭份市', 8),
(92, '竹南鎮', 8),
(93, '後龍鎮', 8),
(94, '通霄鎮', 8),
(95, '苑裡鎮', 8),
(96, '卓蘭鎮', 8),
(97, '造橋鄉', 8),
(98, '西湖鄉', 8),
(99, '頭屋鄉', 8),
(100, '公館鄉', 8),
(101, '銅鑼鄉', 8),
(102, '三義鄉', 8),
(103, '大湖鄉', 8),
(104, '獅潭鄉', 8),
(105, '三灣鄉', 8),
(106, '南庄鄉', 8),
(107, '泰安鄉', 8),
(108, '中區', 9),
(109, '東區', 9),
(110, '南區', 9),
(111, '西區', 9),
(112, '北區', 9),
(113, '北屯區', 9),
(114, '西屯區', 9),
(115, '南屯區', 9),
(116, '太平區', 9),
(117, '大里區', 9),
(118, '霧峰區', 9),
(119, '烏日區', 9),
(120, '豐原區', 9),
(121, '后里區', 9),
(122, '石岡區', 9),
(123, '東勢區', 9),
(124, '新社區', 9),
(125, '潭子區', 9),
(126, '大雅區', 9),
(127, '神岡區', 9),
(128, '大肚區', 9),
(129, '沙鹿區', 9),
(130, '龍井區', 9),
(131, '梧棲區', 9),
(132, '清水區', 9),
(133, '大甲區', 9),
(134, '外埔區', 9),
(135, '大安區', 9),
(136, '和平區', 9),
(137, '彰化市', 10),
(138, '員林市', 10),
(139, '和美鎮', 10),
(140, '鹿港鎮', 10),
(141, '溪湖鎮', 10),
(142, '二林鎮', 10),
(143, '田中鎮', 10),
(144, '北斗鎮', 10),
(145, '花壇鄉', 10),
(146, '芬園鄉', 10),
(147, '大村鄉', 10),
(148, '永靖鄉', 10),
(149, '伸港鄉', 10),
(150, '線西鄉', 10),
(151, '福興鄉', 10),
(152, '秀水鄉', 10),
(153, '埔心鄉', 10),
(154, '埔鹽鄉', 10),
(155, '大城鄉', 10),
(156, '芳苑鄉', 10),
(157, '竹塘鄉', 10),
(158, '社頭鄉', 10),
(159, '二水鄉', 10),
(160, '田尾鄉', 10),
(161, '埤頭鄉', 10),
(162, '溪州鄉', 10),
(163, '南投市', 11),
(164, '埔里鎮', 11),
(165, '草屯鎮', 11),
(166, '竹山鎮', 11),
(167, '集集鎮', 11),
(168, '名間鄉', 11),
(169, '鹿谷鄉', 11),
(170, '中寮鄉', 11),
(171, '魚池鄉', 11),
(172, '國姓鄉', 11),
(173, '水里鄉', 11),
(174, '信義鄉', 11),
(175, '仁愛鄉', 11),
(176, '斗六市', 12),
(177, '斗南鎮', 12),
(178, '林內鄉', 12),
(179, '古坑鄉', 12),
(180, '大埤鄉', 12),
(181, '莿桐鄉', 12),
(182, '虎尾鎮', 12),
(183, '西螺鎮', 12),
(184, '土庫鎮', 12),
(185, '褒忠鄉', 12),
(186, '二崙鄉', 12),
(187, '崙背鄉', 12),
(188, '麥寮鄉', 12),
(189, '臺西鄉', 12),
(190, '東勢鄉', 12),
(191, '北港鎮', 12),
(192, '元長鄉', 12),
(193, '四湖鄉', 12),
(194, '口湖鄉', 12),
(195, '水林鄉', 12),
(196, '東區', 13),
(197, '西區', 13),
(198, '太保市', 14),
(199, '朴子市', 14),
(200, '布袋鎮', 14),
(201, '大林鎮', 14),
(202, '民雄鄉', 14),
(203, '溪口鄉', 14),
(204, '新港鄉', 14),
(205, '六腳鄉', 14),
(206, '東石鄉', 14),
(207, '義竹鄉', 14),
(208, '鹿草鄉', 14),
(209, '水上鄉', 14),
(210, '中埔鄉', 14),
(211, '竹崎鄉', 14),
(212, '梅山鄉', 14),
(213, '番路鄉', 14),
(214, '大埔鄉', 14),
(215, '阿里山鄉', 14),
(216, '西區', 15),
(217, '東區', 15),
(218, '南區', 15),
(219, '北區', 15),
(220, '安平區', 15),
(221, '安南區', 15),
(222, '永康區', 15),
(223, '歸仁區', 15),
(224, '新化區', 15),
(225, '左鎮區', 15),
(226, '玉井區', 15),
(227, '楠西區', 15),
(228, '南化區', 15),
(229, '仁德區', 15),
(230, '關廟區', 15),
(231, '龍崎區', 15),
(232, '官田區', 15),
(233, '麻豆區', 15),
(234, '佳里區', 15),
(235, '西港區', 15),
(236, '七股區', 15),
(237, '將軍區', 15),
(238, '學甲區', 15),
(239, '北門區', 15),
(240, '新營區', 15),
(241, '後壁區', 15),
(242, '白河區', 15),
(243, '東山區', 15),
(244, '六甲區', 15),
(245, '下營區', 15),
(246, '柳營區', 15),
(247, '鹽水區', 15),
(248, '善化區', 15),
(249, '大內區', 15),
(250, '山上區', 15),
(251, '新市區', 15),
(252, '安定區', 15),
(253, '楠梓區', 16),
(254, '左營區', 16),
(255, '鼓山區', 16),
(256, '三民區', 16),
(257, '鹽埕區', 16),
(258, '前金區', 16),
(259, '新興區', 16),
(260, '苓雅區', 16),
(261, '前鎮區', 16),
(262, '旗津區', 16),
(263, '小港區', 16),
(264, '鳳山區', 16),
(265, '大寮區', 16),
(266, '烏松區', 16),
(267, '林園區', 16),
(268, '仁武區', 16),
(269, '大樹區', 16),
(270, '大社區', 16),
(271, '岡山區', 16),
(272, '路竹區', 16),
(273, '橋頭區', 16),
(274, '梓官區', 16),
(275, '彌陀區', 16),
(276, '永安區', 16),
(277, '燕巢區', 16),
(278, '田寮區', 16),
(279, '阿蓮區', 16),
(280, '茄萣區', 16),
(281, '湖內區', 16),
(282, '旗山區', 16),
(283, '美濃區', 16),
(284, '內門區', 16),
(285, '杉林區', 16),
(286, '甲仙區', 16),
(287, '六龜區', 16),
(288, '茂林區', 16),
(289, '桃源區', 16),
(290, '那瑪夏區', 16),
(291, '屏東市', 17),
(292, '潮州鎮', 17),
(293, '東港鎮', 17),
(294, '恆春鎮', 17),
(295, '萬丹鄉', 17),
(296, '崁頂鄉', 17),
(297, '新園鄉', 17),
(298, '林邊鄉', 17),
(299, '南州鄉', 17),
(300, '琉球鄉', 17),
(301, '枋寮鄉', 17),
(302, '枋山鄉', 17),
(303, '車城鄉', 17),
(304, '滿洲鄉', 17),
(305, '高樹鄉', 17),
(306, '九如鄉', 17),
(307, '鹽埔鄉', 17),
(308, '里港鄉', 17),
(309, '內埔鄉', 17),
(310, '竹田鄉', 17),
(311, '長治鄉', 17),
(312, '麟洛鄉', 17),
(313, '萬巒鄉', 17),
(314, '新埤鄉', 17),
(315, '佳冬鄉', 17),
(316, '霧台鄉', 17),
(317, '泰武鄉', 17),
(318, '瑪家鄉', 17),
(319, '來義鄉', 17),
(320, '春日鄉', 17),
(321, '獅子鄉', 17),
(322, '牡丹鄉', 17),
(323, '三地門鄉', 17),
(324, '馬公市', 18),
(325, '湖西鄉', 18),
(326, '白沙鄉', 18),
(327, '西嶼鄉', 18),
(328, '望安鄉', 18),
(329, '七美鄉', 18),
(330, '花蓮市', 19),
(331, '鳳林鎮', 19),
(332, '玉里鎮', 19),
(333, '新城鄉', 19),
(334, '吉安鄉', 19),
(335, '壽豐鄉', 19),
(336, '光復鄉', 19),
(337, '豐濱鄉', 19),
(338, '瑞穗鄉', 19),
(339, '富里鄉', 19),
(340, '秀林鄉', 19),
(341, '萬榮鄉', 19),
(342, '卓溪鄉', 19),
(343, '台東市', 20),
(344, '成功鎮', 20),
(345, '關山鎮', 20),
(346, '長濱鄉', 20),
(347, '池上鄉', 20),
(348, '東河鄉', 20),
(349, '鹿野鄉', 20),
(350, '卑南鄉', 20),
(351, '大武鄉', 20),
(352, '綠島鄉', 20),
(353, '太麻里鄉', 20),
(354, '海端鄉', 20),
(355, '延平鄉', 20),
(356, '金峰鄉', 20),
(357, '達仁鄉', 20),
(358, '蘭嶼鄉', 20),
(359, '金城鎮', 21),
(360, '金湖鎮', 21),
(361, '金沙鎮', 21),
(362, '金寧鄉', 21),
(363, '烈嶼鄉', 21),
(364, '烏坵鄉', 21),
(365, '南竿鄉', 22),
(366, '北竿鄉', 22),
(367, '莒光鄉', 22),
(368, '東引鄉', 22);

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
  `memLevel_id` int(11) NOT NULL,
  `mem_status` varchar(255) NOT NULL DEFAULT 'valid' COMMENT '狀態',
  `mem_signUpDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '註冊日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member_list`
--

INSERT INTO `member_list` (`mem_id`, `mem_account`, `mem_password`, `mem_avatar`, `mem_name`, `mem_nickname`, `mem_gender`, `mem_birthday`, `mem_mobile`, `mem_email`, `memLevel_id`, `mem_status`, `mem_signUpDate`) VALUES
(1, 'testdog', 'admin', '', 'mr dog', 'doggy', 'male', '2019-03-16', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-17 18:50:09'),
(2, 'testcat', 'admin', '', 'ms cat', 'kitty', 'female', '2019-03-17', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 09:50:43'),
(3, 'testrabbit', 'admin', '', 'mr rabbit', 'bunny', 'male', '2019-02-28', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 09:50:43'),
(4, 'testbear', 'admin', '', 'mr bear', 'bear papa', 'male', '2018-01-19', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 10:33:23'),
(5, 'testpig', 'admin', '', 'ms pig', 'piggy', 'female', '2018-06-21', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 10:33:23'),
(6, 'testtiger', 'admin', '', 'mr tiger', 'tiger bro', 'male', '2018-01-01', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 10:35:18'),
(7, 'testelephant', 'admin', '', 'mr elephant', 'elephant grandpa', 'male', '2018-01-02', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 10:35:18'),
(8, 'testcow', 'admin', '', 'ms cow', 'cow mama', 'female', '2018-03-01', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:20:06'),
(9, 'testsnake', 'admin', '', 'ms snake', 'snake sis', 'female', '2018-03-02', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:20:37'),
(10, 'testhorse', 'admin', '', 'mr horse', 'ponny', 'male', '2018-05-01', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:23:38'),
(11, 'testsheep', 'admin', '', 'ms sheep', 'mary', 'female', '2018-05-06', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:24:07'),
(12, 'testmonkey', 'admin', '', 'mr monkey', 'wuwu', 'male', '2001-04-18', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '0000-00-00 00:00:00'),
(13, 'testchicken', 'admin', '', 'mr chiecken', 'gugugu', 'male', '2008-06-17', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '0000-00-00 00:00:00'),
(14, 'testfrog', 'admin', '', 'ms frog', 'queen frog', 'female', '2001-02-28', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '0000-00-00 00:00:00'),
(15, 'testladybug', 'admin', '', 'ms ladybug', 'beauty', 'female', '2001-06-28', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:31:56'),
(16, 'testlion', 'admin', '', 'mr lion', 'knig lion', 'male', '2010-07-06', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:31:56'),
(17, 'testbird', 'admin', '', 'mr bird', 'birdy', 'male', '2003-09-27', '0912345678', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-18 11:31:56'),
(97, 'woody', 'admin', '', '胡迪', '', 'male', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 10:26:01'),
(99, 'nemo', 'admin', '', '尼莫', '', 'female', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 10:27:49'),
(100, 'dory', 'admin', '', '多利', '', 'female', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 10:28:11'),
(102, 'marin', 'admin', '', '瑪琳', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 10:29:05'),
(103, 'buzz', 'admin', '', '巴斯', '', 'male', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 11:41:53'),
(104, 'tracy', 'admin', '', '翠絲', '', 'male', '0000-00-00', '0911222333', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 11:42:25'),
(105, 'elsa', 'admin', '', '愛爾莎', '', 'female', '0000-00-00', '0933222111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:37:57'),
(106, 'anna', 'admin', '', '安娜', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:42:32'),
(107, 'olaf', 'admin', '', '雪寶', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:45:10'),
(108, 'dumbo', 'admin', '', '小飛象', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:45:40'),
(109, 'maqueen', 'admin', '', '麥昆', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:46:38'),
(110, 'lumia', 'admin', '', '路米亞', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:47:11'),
(111, 'chips', 'admin', '', '阿齊', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:48:25'),
(112, 'belle', 'admin', '', '貝爾', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:48:48'),
(113, 'beast', 'admin', '', '野獸', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:49:16'),
(114, 'baymax', 'admin', '', '杯麵', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:49:57'),
(115, 'wally', 'admin', '', '瓦力', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', 0, 'valid', '2019-03-19 13:50:22'),
(137, 'poke_mouse', 'admin', 'avatar_pictures/749db026cae969bf03c4a9954de3bc762937784a.png', '皮卡丘', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 3, 'valid', '2019-03-20 11:27:58'),
(138, 'poke_turtle', 'admin', 'avatar_pictures/9d1c797807682cc9959bc5f2c64f0a317cde4313.png', '傑尼龜', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 2, 'valid', '2019-03-20 11:28:34'),
(139, 'poke_dragon', 'admin', 'avatar_pictures/fed34de4f1dd7f968f9d56902dd16397b956b531.png', '小火龍', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', 1, 'valid', '2019-03-20 13:46:21'),
(140, 'poke_frog', 'admin', 'avatar_pictures/1eef3c4c8ddda2e391fc64dae23f5e1504f54818.png', '妙娃種子', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 2, 'valid', '2019-03-20 15:13:49'),
(141, 'pluto', 'admin', 'avatar_pictures/054e40d9006f6cd8323d23e9fca4ae9dbbb57af2.jpg', '布魯托', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 3, 'valid', '2019-03-20 15:33:56'),
(142, 'sadaharu', 'admin', 'avatar_pictures/47de8a071e2ec39b016ac395186ddbd9462febb0.jpg', '定春', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', 1, 'valid', '2019-03-20 15:36:55'),
(146, 'snoopy', 'admin', 'avatar_pictures/2b299bfae4b3abd298e32a4a6f39fb018124a10e.png', '史奴比', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', 3, 'valid', '2019-03-20 17:02:13'),
(147, 'totoro', 'admin', 'avatar_pictures/3b7f66c582cd2e0f6ffb3e9b53891c357b8f6870.jpg', '龍貓', '', 'male', '0000-00-00', '0922222222', 'sammie0804@gms.tku.edu.tw', 3, 'valid', '2019-03-20 17:04:29'),
(149, 'linus', 'admin', 'avatar_pictures/aa65c8c215e76156b3543d5e779f1b3a6e6420c7.png', '奈勒斯', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 3, 'valid', '2019-03-20 17:07:41'),
(151, 'peppermint_patty', 'admin', 'avatar_pictures/43bbe548bedcbd4fa302709386931298981d27e9.jpg', '佩蒂', '', 'female', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 2, 'valid', '2019-03-20 18:23:22'),
(156, 'mickey', 'admin', 'avatar_pictures/764eff082badca0af52cc0a39150dd4ff69b1429.jpg', '米奇', '', 'male', '0000-00-00', '0911111111', 'sammie0804@gms.tku.edu.tw', 1, 'valid', '2019-03-21 11:27:20'),
(158, 'duffy', 'admin', 'avatar_pictures/c5cf4f4d4bdddd6e201c3fefd3127de8012de249.jpg', '達菲', '', 'female', '0000-00-00', '0988888888', 'sammie0804@gms.tku.edu.tw', 3, 'valid', '2019-03-22 11:57:33'),
(159, 'catcat', '123456', 'avatar_pictures/cc551e907d37d8ef2fb6e39fbf40ea28ba6bc208.jpg', 'cat', '', 'female', '0000-00-00', '0912345444', 'cat@gmail.com', 2, 'valid', '2019-03-22 14:49:52');

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

-- --------------------------------------------------------

--
-- 資料表結構 `prod_plan`
--

CREATE TABLE `prod_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `prod_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `prod_plan`
--

INSERT INTO `prod_plan` (`id`, `name`, `prod_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(8, 's', 2, 22, 2, '2018-07-22', '2018-07-22'),
(9, 's', 3, 33, 2, '2018-07-22', '2018-07-22');

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
(115, 'sale_pictures/6ce36f7b50e944395c6a809ccc9d11fe67118c6b.jpg', '【亞尼克】生乳捲覆盆莓7入(351g/條共7條)', 777, '355', '355', '355', 1, '【亞尼克】生乳捲覆盆莓7入(351g/條共7條)', '<p>【亞尼克】生乳捲覆盆莓7入(351g/條共7條)</p>\r\n', '', '', '', 1),
(135, 'sale_pictures/4e94e45b8dcbf6a1596d9d8027a3df9a43e58de8.jpg', '【冷凍店取-老協珍】牛肉鍋(2970g(固形物970g)/盒)', 999, '999', '999', '999', 1, '【冷凍店取-老協珍】牛肉鍋(2970g(固形物970g)/盒)', '<p>【冷凍店取-老協珍】牛肉鍋(2970g(固形物970g)/盒)</p>\r\n', '', '', '', 1),
(136, 'sale_pictures/a54178c5f2ec023e3777fe93173d5fb151534cda.png', '【冷凍店取-得意生活】清燉羊肉爐(1800g(固形物300g)/盒', 999, '88', '88', '88', 0, '【冷凍店取-得意生活】清燉羊肉爐(1800g(固形物300g)/盒', '<p>【冷凍店取-得意生活】清燉羊肉爐(1800g(固形物300g)/盒</p>\r\n', '', '', '', 2),
(137, 'sale_pictures/c783508cc02b873ec6b98dc89bd4f6f7b9c32b29.png', '【 冷凍店取-陳記好味】東北酸菜鴨(固形物300克、湯500cc)', 777, '777', '8877', '887', 0, '【 冷凍店取-陳記好味】東北酸菜鴨(固形物300克、湯500cc)', '<p>【 冷凍店取-陳記好味】東北酸菜鴨(固形物300克、湯500cc)</p>\r\n', '', '', '', 2),
(138, 'sale_pictures/4aabcf9bf71bb5cc2884f89e5af82b930ea50869.png', '【冷凍店取-哈根達斯】甜蜜鍾情雪糕禮盒', 999, '555', '555', '555', 1, '【冷凍店取-哈根達斯】甜蜜鍾情雪糕禮盒', '<p>【冷凍店取-哈根達斯】甜蜜鍾情雪糕禮盒</p>\r\n', '', '', '', 3),
(139, 'sale_pictures/f5c9e70404321c2804b257120c9b25f0b2fcd6f5.jpg', '【冷凍店取-阿奇儂】拿鐵雪沙(6杯)', 777, '111', '111', '111', 0, '【冷凍店取-阿奇儂】拿鐵雪沙(6杯)', '<p>【冷凍店取-阿奇儂】拿鐵雪沙(6杯)</p>\r\n', '', '', '', 4),
(140, 'sale_pictures/2780733d82b377917316bd3b8da5bff223bf6459.png', '【冷凍店取】美國prime頂級安格斯板腱牛肉', 111, '111', '111', '111', 0, '【冷凍店取】美國prime頂級安格斯板腱牛肉', '<p>【冷凍店取-阿奇儂】拿鐵雪沙(6杯)​​​​​​​</p>\r\n', '', '', '', 1),
(141, 'sale_pictures/a97576f21215c6ac3efa40a4bcbe8a5f00f5f228.jpg', '【冷凍店取-爭鮮】熟凍波士頓龍蝦(450g(隻)/盒)', 422, '422', '422', '422', 1, '【冷凍店取-爭鮮】熟凍波士頓龍蝦(450g(隻)/盒)', '<p>【冷凍店取-爭鮮】熟凍波士頓龍蝦(450g(隻)/盒)</p>\r\n', '', '', '', 1),
(142, 'sale_pictures/0082cef93d9a7086729684d19d47c4069819a097.png', '【食吧嚴選】日本青森富士蘋果*3箱團購組(8顆/箱，280g±10%/顆)', 433, '433', '433', '433', 0, '【食吧嚴選】日本青森富士蘋果*3箱團購組(8顆/箱，280g±10%/顆)', '<p>【食吧嚴選】日本青森富士蘋果*3箱團購組(8顆/箱，280g&plusmn;10%/顆)</p>\r\n', '', '', '', 2),
(144, 'sale_pictures/2a713f70e685d1bab466ea6eeb15307b39be3d2d.png', '【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)', 868, '868', '868', '868', 0, '【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)', '<p>【食吧嚴選】台灣精品-高雄黑糖芭比蓮霧*1盒組(9-10顆/盒，2-2.5kg/盒)</p>\r\n', '', '', '', 1),
(145, 'sale_pictures/b7a0977e29fc7b1c9b089522d76dd9278b35e9d8.png', '【亞尼克】25度N檸檬派(6吋(15cm*2.5cm)/盒*4盒)', 343, '343', '343', '343', 1, '【亞尼克】25度N檸檬派(6吋(15cm*2.5cm)/盒*4盒)', '<p>【亞尼克】25度N檸檬派(6吋(15cm*2.5cm)/盒*4盒)</p>\r\n\r\n<p>3重滋味加乘，讓人一口接一口!!蛋白霜經過炙燒形成誘人的焦糖色澤，帶來軟綿細緻的觸感， 緊接著是現榨綠檸檬與法國依思尼奶油， 交織出柔軟細膩的口感， 檸檬清新爽朗的香氣瀰漫在嘴裡， 和厚實酥脆的派皮形成絕佳平衡。 這股初戀般的酸甜滋味，在夏日特別迷人 酸V啊 ，酸V啊 !!</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', '', '', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `share_category`
--

CREATE TABLE `share_category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `share_category`
--

INSERT INTO `share_category` (`cate_id`, `cate_name`, `cate_visible`) VALUES
(1, '露營裝備', 0),
(2, '帳篷選擇', 0),
(3, '天氣對策', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `share_post`
--

CREATE TABLE `share_post` (
  `post_id` int(11) NOT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `mem_nickname` varchar(255) DEFAULT NULL,
  `post_cate` varchar(255) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_time` datetime DEFAULT NULL,
  `post_editTime` datetime DEFAULT NULL,
  `post_content` longtext,
  `browse_num` int(11) DEFAULT NULL,
  `share_num` int(11) DEFAULT NULL,
  `cmt_num` int(11) DEFAULT NULL,
  `post_tag` text,
  `post_visible` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `share_post`
--

INSERT INTO `share_post` (`post_id`, `mem_id`, `mem_nickname`, `post_cate`, `post_title`, `post_time`, `post_editTime`, `post_content`, `browse_num`, `share_num`, `cmt_num`, `post_tag`, `post_visible`) VALUES
(99, NULL, NULL, '2', '發光夜神黑膠塔型帳', '2019-03-21 04:50:16', '2019-03-21 07:15:04', '<p>這是一個晚上會發光的帳篷唷~</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/files/19b4c80609bce6f03da4c12b291a18fe6d5674c1.jpg\" style=\"height:756px; width:1344px\" /></p>\r\n', NULL, NULL, NULL, NULL, '隱藏'),
(100, NULL, NULL, '2', '我不知道', '2019-03-21 04:52:47', NULL, '<p>guo;goi;goi</p>\r\n', NULL, NULL, NULL, NULL, '隱藏'),
(103, NULL, NULL, '2', '顆顆', '2019-03-21 07:00:31', '2019-03-21 12:26:05', '<p><img src=\"/ckfinder/userfiles/files/332a756703375aa2b392436ee4cb4ba041fd0dd0.jpg\" style=\"height:756px; width:1344px\" /></p>\r\n', NULL, NULL, NULL, NULL, '隱藏'),
(104, NULL, NULL, '3', '抗返潮的搭帳篷的六個步驟', '2019-03-21 07:25:14', NULL, '<p><img src=\"/ckfinder/userfiles/files/ca50576fc3b72f2b2a93d58b797432a322167c34.jpg\" style=\"height:565px; width:880px\" /></p>\r\n\r\n<p>返潮是露營的正常過程，會形成返潮出現，與搭設的溫度、濕度、風向、帳內的人數、熱源（暖爐）、通風條件環環相扣，除非是高科技的帳布，否則幾乎没有一頂帳篷可以百分之百杜絕返潮。因此抗返潮搭帳篷的六步驟在此好好跟大家說明…</p>\r\n\r\n<h3>一、掌握氣候條件</h3>\r\n\r\n<p>搭設帳篷前要觀察天候並調查氣象水文資料，了解所在地的天氣預報與當地風向，搭設地的低溫緣與抗風處的確實區域。請留意溪邊、崖邊、湖邊、風口處，了解夜晚時低溫處與風向來源，再決定搭設位置。</p>\r\n\r\n<h3>二、了解搭設地面</h3>\r\n\r\n<p>常見的地面有一般泥地、碎石、草地、水泥、木棧板。返潮最容易出現於泥地與草地，再來是碎石，因地下濕氣最直接的回饋上升到地面。</p>\r\n\r\n<h3>三、做好防水工作</h3>\r\n\r\n<p>要百分之百的防水，可用廣告帆布或露營專用地席，保護帳篷底部隔絕地下濕氣上升，提供防水功能。</p>\r\n\r\n<h3>四、舖設帳底隔絕層</h3>\r\n\r\n<p>帳內鋪設鋁箔睡墊、巧拼地墊、瑜珈墊等第二層隔絕層，儘量讓冷地氣不要上竄到帳底。這樣睡覺時，身體散發溫度不會直接被地上吸走，隔絕溫差。</p>\r\n\r\n<h3>五、增加帳外阻擋層</h3>\r\n\r\n<p>帳篷上面再搭一塊天幕或小外帳當第二外帳（屋頂），帳篷與天幕不可相疊一起。天幕最好採包覆式、落地式，預留空氣流通層，可減少五成反應在帳篷外帳上的返潮現象。</p>\r\n\r\n<h3>六、確實做好透氣與對流</h3>\r\n\r\n<p>夜間睡覺前，留意風向與注意對流現象適度開窗並調整天幕下降抵擋受風處。注意空氣要有流動空間，讓溫暖空氣來不及凝結即被對流給帶走，尤其室內帳不可緊閉。</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(105, NULL, NULL, '1', '第一次露營要準備什麼？', '2019-03-21 07:41:01', NULL, '<p><img src=\"/ckfinder/userfiles/files/ba017fb65b1d30adfde61ab8c0dcc2f3ff916b3b.jpg\" style=\"height:2979px; width:1986px\" /></p>\r\n\r\n<p>在露營界稱第一次露營叫做「初露」，這是很多人想做、卻又不知道該如何跨出的第一步，其實這一點也不困難，從『衣』的層面可分為兩個部分，穿著與睡眠的準備事項，給準備初露的好野朋友們參考，讓你一出手就像高手！</p>\r\n\r\n<h3><strong>穿著準備</strong></h3>\r\n\r\n<p>穿著部分，就算是夏天在山上露營，可能會涼爽到讓人感冒。所以不管夏、冬季，外套都是露營的重點，要保暖、輕薄、防水。盡量穿著長褲避免蚊蟲叮咬。到高山營地有日夜溫差，建議採用洋蔥式穿衣法，一件件穿脫，方便又不怕著涼。若帶孩子露營，務必多準備一套換洗的衣服，避免玩耍後無衣可換。</p>\r\n\r\n<h3><strong>睡眠準備</strong></h3>\r\n\r\n<p>帳篷搭好，睡眠部分要鋪床，最底層可以先鋪一般大賣場有售的鋁箔防水墊，隔絕地氣與人體直接接觸，是避免越睡越冷的關鍵，初露朋友用巧拼地墊或瑜珈墊代替也行。鋪床一般會上個睡墊，可使用充氣床來增進睡眠品質。初露的朋友可用舊棉被或是舊毯子來當作鋪床使用。<br />\r\n<br />\r\n再來是睡覺的好朋友：睡袋。睡袋分很多種款式形式，價格從數百元到數萬元不等，一分錢一分貨，要自己多看多比較。没有睡袋，拿家裡棉被也可以。枕頭一樣可用家裡的、或買充氣枕。<br />\r\n<br />\r\n盥洗部分，合格營地衛浴設備都有一定水準，没有乾濕分離也會有獨立衛浴，熱水與水壓一定要充足，才是營地好壞的關鍵，浴室多半是淋浴間，多人同時使用難免水壓不穩或忽冷忽熱，強烈建議帶個RV水桶緩衝汲水。浴室是公共使用，公德心很重要；還有時間掌握，建議有小朋友的家長在5~6點讓他們先洗澡，大人的時間就很寬鬆了。</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(106, NULL, NULL, '1', '睡袋有哪些類型？', '2019-03-21 07:51:11', NULL, '<p><img src=\"/ckfinder/userfiles/files/0127077711a24e7532275b0fb56416d813333106.jpg\" style=\"height:700px; width:1051px\" /></p>\r\n\r\n<p>想在戶外一夜好眠，除非是帶了自己家裡的寢具棉被，否則就得準備睡袋。由於是在戶外使用，睡袋的選擇，就必須依照交通工具、使用的環境、個人耐寒的狀況來挑選，從輕便度、溫暖指數、布料舒適與收納等方面來考量。</p>\r\n\r\n<h3>樣式與溫度要求</h3>\r\n\r\n<p>睡袋的重要功能是保暖，避免使用者在戶外失溫而影響睡眠或進而危及生命。袋內的溫度是會隨著「絕緣材質」、「填充物的厚密度」、「尺寸或型式」而有所不同的保暖效果。從睡袋的樣式來説，因為使用環境對溫度的要求不同，便發展了以下三種不同形式：</p>\r\n\r\n<h3>一、圓錐型或俗稱木乃伊型睡袋</h3>\r\n\r\n<p>依照人體型態剪裁，讓睡袋與身體的空隙愈小，有效阻隔冷空氣灌入睡袋，避免快速流失體溫。大多是用在登高攀岩者所使用，特別是没有搭設帳篷遮蔽時，在戶外更需要有效地保溫。</p>\r\n\r\n<h3>二、信封型睡袋</h3>\r\n\r\n<p>這種長方形睡袋就像是信封，還可以兩個睡袋拼接，兩人共眠，相互取暖。由於袋內空間較大，睡眠時的舒適度較好，大多用在休閒的露營或野外活動。此款睡袋較易有空氣竄入，溫度容易流失，通常在平地或溫度較高的戶外使用。</p>\r\n\r\n<h3>三、其他特殊造型</h3>\r\n\r\n<p>為了適應不同的時機、環境和使用者的不同需求，將圓錐型和信封型合成的蛋形或橢圓形睡袋；有附厚實帽兜的機能型睡袋；或提供多功能使用的人形睡袋，可穿戴當禦寒衣，也可當睡袋使用等等。</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(107, NULL, NULL, '2', '帳篷如何保養及清潔？', '2019-03-21 08:50:39', NULL, '<p><img src=\"/ckfinder/userfiles/files/95487376810f26f984288e2bcd517c1c8bbe8763.jpg\" style=\"height:700px; width:1050px\" /></p>\r\n\r\n<h3><strong>寶貝你的野外愛巢 淺談帳篷保養法</strong></h3>\r\n\r\n<p>帳篷保養跟清潔，首先是一定要有的正確清潔觀念：很多露友對於帳篷相當的呵護與照顧，但是往往忘記了帳布不是汽車鈑金，千萬不可以使用清潔劑於帳布上做清潔，因為這會破壞帳布上的防水以及抗UV塗層。該怎麼做？柔軟的濕布搭配雙手輕輕的擦拭就是最正確方法了。</p>\r\n\r\n<h3><strong>保養帳篷聖品 晨露小雨珠</strong></h3>\r\n\r\n<p>早上起床看見帳篷上灑下陽光、帳布上佈滿晨露小雨珠，那可是保養帳篷聖品，千萬別浪費。為什麼呢？其實早上起床筋骨不靈活，拿起抹布來回輕輕擦拭帳布，藉機運動運動又可舒展筋骨，擦拭過程可以把粉塵、灰塵、水氣等有效清潔，還可以增加收帳的速度，特別是有要趕下一個行程的露友很適用。</p>\r\n\r\n<p><strong>擦拭同時一邊細部檢視</strong></p>\r\n\r\n<p>一邊擦拭，一邊剛好可以對自己的帳篷有細部的檢視機會，發現問題馬上處理！<br />\r\n運動、清潔、保養、檢查一次到位，所以晨間的小露水正好是帳篷保養聖品，真是不錯呢！</p>\r\n\r\n<h3><strong>擦拭清潔劑您用的正確嗎？</strong></h3>\r\n\r\n<p>但若遇到鳥糞或果實打落、甚至是樹汁等異物襲擊那該怎麼辦呢？這時可以使用中性的洗碗精稀釋後，針對受汙區域均勻噴灑，輕輕拍動搓揉，再用濕抹布擦拭乾淨，一定要多擦拭幾遍，完全將洗碗精擦掉不殘留喔！要注意，如果有銀膠塗層的帳篷，請先測試你用的中性洗碗精是否有造成脫落可能，避免因小失大。經過這樣處理，如果還是有汙漬真的擦不掉也就別太勉強了，最後拿帳篷保養噴劑噴一噴，以加強帳篷的塗層。</p>\r\n\r\n<h3><strong>拉鏈開合不順暢 務必即時處理</strong></h3>\r\n\r\n<p>帳篷內部的保養，其實大多和一般清潔一樣，也没有太多不同，但是幾個小叮嚀：如果有拉鏈開合不順暢，千萬不要讓它惡化下去，避免一失手成千古恨。平日可以用蠟燭將拉鍊做保養，在營地緊急處理時，用露營薰香蠟燭或是少量食用油來替代也行。</p>\r\n\r\n<h3><strong>有什麼工具可以維修鍊頭？</strong></h3>\r\n\r\n<p>當你發現拉鍊頭有時在壓合活動處有明顯開合，記得拿老虎鉗趕緊壓回。如果没有鉗子，拿兩個十元硬幣壓住、並找男生手勁較強壓壓看，力量不夠配合營槌輕敲試試，若還是不行就小心使用拉鍊等回家處理吧！</p>\r\n\r\n<h3><strong>油煙問題 預防勝於治療</strong></h3>\r\n\r\n<p>還有一個帳內常見問題，就是油煙，在營地常常一家烤肉萬家香，烤個香腸，香氣四溢，實在令人口水直流，但是油煙問題，可是會造成帳布沾黏，所以預防勝於治療，烤肉爐還是移到帳外，另外配合風扇讓空氣流動，別讓客廳帳內中央成為你的油煙聚集處喔！</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(108, NULL, NULL, '1', '睡袋保暖選擇重點整理', '2019-03-21 08:54:14', '2019-03-21 09:06:34', '<p><img src=\"/ckfinder/userfiles/files/626e4cc6be200579023b435472ee6f31a1fe751f.jpg\" style=\"height:700px; width:1050px\" /></p>\r\n\r\n<p>同一款睡袋，有人睡了嫌太熱、有人睡了覺得不夠暖，這取決於每個人對溫度感受不同。因此，購買睡袋必須依照每個人的體質與用法來選擇，没有一定標準；再者，睡袋的保暖功效與每個人使用情況息息相關：<br />\r\n1. 帳篷內是否有隔絕地面寒氣的防潮地墊<br />\r\n2. 穿著衣物的厚薄多寡<br />\r\n3. 胖瘦身材<br />\r\n4. 本身的生理代謝狀態<br />\r\n5. 飲食熱量的攝取</p>\r\n\r\n<h3>看懂睡袋溫標籤</h3>\r\n\r\n<p>任何一種睡袋上都有一個使用適宜的溫度範圍，也就是溫標（參見附圖）。一般溫標由三種資料組成：<br />\r\n●最低溫度 該睡袋使用的最低極限溫度，低於此溫度時對使用者來説是危險的。<br />\r\n●中間溫度 使用者感到最舒適的理想溫度。<br />\r\n●最高溫度 使用範圍的上限，高於此溫度，使用者會覺得熱到難以忍受。<br />\r\n看懂溫度標示之後，還要知道睡袋針對亞洲人使用適宜於春夏秋三季，歐美原產的睡袋在溫標上對亞洲人不太適合，亞洲人對歐美睡袋的溫標應加上5~10度，因為亞洲人的耐寒程度相對較低，所以在選購上要特別注意。</p>\r\n\r\n<h3>如何發揮睡袋保暖功效</h3>\r\n\r\n<p>麼在戶外露營時，怎樣才能睡得更暖和些呢？首先必須了解，在使用睡袋上，有許多外在因素影響睡袋的性能，睡袋本身並不會發熱，它只是有效地將體溫流失減低，下面的建議可以讓你睡得更暖些：<br />\r\n一、營地的選擇 不要選在谷底露營，那是冷空氣聚集的地方，也要盡量選擇避開承受強風的山脊或山凹處。<br />\r\n二、鋪上防潮墊 可以有效地隔絕睡袋與冰冷潮濕地面分開。保持睡袋乾爽，睡袋吸收的水分並非來自外界，而是人體，即使在極為寒冷的情況下，人體在睡眠時仍會排出起碼約一小杯水的水分。<br />\r\n三、多穿衣服 穿一些鬆軟的衣物可兼作加厚睡衣用，將人體與睡袋中間的空隙填滿，使睡袋的保暖性加強。<br />\r\n四、睡前熱身 人體就是睡袋的熱量來源，如果臨睡前可以喝杯熱飲，或做些熱身運動，可將體溫略微提高並有助於睡袋變暖的時間。<br />\r\n<br />\r\n睡袋種類很多，但在選擇睡袋時和戶外露營用品一樣，最貴不一定最好，只有真正適合你和家人所從事的戶外活動使用，才是最好的溫暖好窩。</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(109, NULL, NULL, '2', '我應該要買哪種帳篷呢?', '2019-03-21 09:11:54', '2019-03-21 09:55:15', '<p><img src=\"/ckfinder/userfiles/files/cb6387bad246e262e5063c2f7cb692987fcefb01.jpg\" style=\"height:592px; width:802px\" /></p>\r\n\r\n<p><strong>【帳篷】</strong></p>\r\n\r\n<p>市面上的帳篷種類多元，形式、特色、價格也都不同，除了常見的穿骨式蒙古包帳外，現在還有隧道帳、快搭帳、印第安帳等多種類型的帳篷，價格也從大賣場的3000元到十幾萬元都有。</p>\r\n\r\n<p><strong>※入門者建議</strong></p>\r\n\r\n<p>新手建議可以從大賣場或露營用品店先入手有內外帳設計的蒙古包帳，需注意帳篷空間大小，如6人帳建議睡4人最為舒適、4人帳則是睡2人較為剛好。如果不想購買，則可以到有租借裝備的戶外用品店借用，不過費用不見得會比較划算，但對純體驗的朋友來說的確不失為一個保險的做法，或者就是跟一些老手借用。</p>\r\n\r\n<p><strong>※進階需求建議</strong><strong> </strong></p>\r\n\r\n<p>評估自身需求，再來挑選適合場地和季節天氣的帳篷，值得注意的是，每個國家對帳篷的設計基本上都是按照該國的天氣環境來設計，因此是否完全適用台灣的環境也要多加評估並加以補強。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/6faef686066f3663e6e3671b0e25e53e907e9d77.jpg\" style=\"height:661px; width:802px\" /></p>\r\n\r\n<p><strong>【天幕帳】</strong></p>\r\n\r\n<p>天幕帳的主要用途在於提供帳篷之外一處炊事及活動的空間，能夠遮陽和避雨，但因為仍屬開放式的空間，所以碰到方向不定的風雨時仍會有淋濕的可能。但露友前輩如朱雀和老蟑等將天幕加以變化和改良，可以發揮更高效率的遮蔽性。</p>\r\n\r\n<p><strong>※入門者建議</strong><strong> </strong></p>\r\n\r\n<p>目前市面上的天幕帳尺寸很多，有300X300公分、450X600公分，還有450X700甚至是500X800公分的大天幕。如果新手需要，建議從小尺寸的天幕入手即可，至於要選方形或蝶形天幕則依自己喜好來挑選。國產品牌的天幕大多有銀膠塗層，遮光性效果好、國外品牌的天幕則多沒有銀膠，遮光性自然較弱；另外需注意，防水係數（耐水壓）越高，防水效果也越好。如果新手不想花太多錢，300元的帶孔帆布也很好用。</p>\r\n\r\n<p><strong>※進階需求建議</strong> </p>\r\n\r\n<p>天幕帳的好處是輕量和方便攜帶，到了進階需求建議，天幕的角色往往和客廳帳搭配使用，因此把天幕當成客廳的延伸也是一種搭設的考量。至於選購的考慮仍以防水性及尺寸為優先關鍵。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/35a3b6c9ea638fc99530124a404be9edc086ac64.jpg\" style=\"height:592px; width:802px\" /></p>\r\n\r\n<p><strong>【客廰帳（炊事帳）】</strong></p>\r\n\r\n<p>顧名思義，客廰帳就是另外搭設一處空間做為客廳使用，炊事或用餐都可以在其中進行，同樣具有遮風蔽雨和遮陽的效果。聽起來和天幕的效果雷同，但差別是客廳帳只要搭配邊布使用就可以完全封閉，雨大時可以擋雨，邊布的紗網還有防蚊防蟲的效果。</p>\r\n\r\n<p><strong>※入門者建議</strong> </p>\r\n\r\n<p>目前主流的客廳帳尺寸大約都是300X300公分為主，大概分為四腳式（例如環球或速可搭）及全圍式（例如SP、COLEMAN或LOGOS）兩大類。四腳式收納體積大、較佔空間且重量驚人，但整體結構和支撐性更為堅固。全圍式收納體積較小、重量也較輕，結構性也足以應付一般的天氣變化。一般來說，台灣品牌的客廳帳骨架都有終身維修的服務，購買維修據點較近的品牌也是一種考量。至於新手則可考慮先不要購買，與朋友共用客廳帳或是使用小天幕即可。</p>\r\n\r\n<p><strong>※進階需求建議</strong><strong> </strong></p>\r\n\r\n<p>客廳帳要發揮最大的功效就是要搭配邊布，才能達到冬天禦寒、夏天防蚊的效果，真正有露營的興趣時，建議先考量車輛的空間再來考慮選擇適合的客廳帳。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/be7ce055ec7c6e77485a9ce81ac3bd555f9fb9cf.jpg\" style=\"height:811px; width:564px\" /></p>\r\n\r\n<p><strong>【地布】</strong></p>\r\n\r\n<p>一般的帳篷都會附上一塊地布，用來鋪設在底部隔絕帳篷與地面的直接接觸，一來可以減少潮濕，再者也可以保護帳底的磨損。如果帳篷有附送，就用帳篷的地布即可，若是沒有，則可以考慮使用帆布來替代，或者可以到布行去剪一塊符合大小的防水布來使用會較為美觀。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/d4889f1e47a509a597a7aee5d652e4fb53909c9d.jpg\" style=\"height:811px; width:564px\" /></p>\r\n\r\n<p><strong>【充氣睡墊】</strong></p>\r\n\r\n<p>這個裝備直接影響到睡眠的品質，因為營地的地面狀況不一，也許是草地、也許有碎石，就算先鋪上一層防潮墊仍會明顯感受到地面的不平整狀況，因此充氣睡墊就顯得格外重要。</p>\r\n\r\n<p><strong>※入門者建議</strong> </p>\r\n\r\n<p>新手若是不考慮直接入手，可以家中的厚毯先代替，夏天怕熱則可以使用泡棉地墊代替。</p>\r\n\r\n<p><strong>※進階需求建議</strong><strong> </strong></p>\r\n\r\n<p>一般在挑選充氣睡墊時，厚度至少要達到5公分以上會較為舒適，現在則是流行充氣式的獨立桶充氣床，舒適程度更上一層樓，但費用也是往上一個級距。</p>\r\n\r\n<p><strong>TIP</strong></p>\r\n\r\n<p>如果睡不習慣充氣睡墊的表面布料，可以帶一件床罩罩在上面，睡起來會更舒適一些。</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(110, NULL, NULL, '1', '出發前記得！這些東西，一定要帶！！！', '2019-03-21 09:23:30', '2019-03-21 12:16:35', '<p>新手要準備裝備的原則其實很簡單，那就是「家裡能用的就用、能借的就不要買」。一開始就澆熄你想要購買裝備的慾望，其實真的只是希望你先體驗露營並了解露營，在經過一次、兩次之後，<strong>評估自己真的喜歡露營且願意花錢投資裝備時，再來考量進階和升級</strong>。所以，不要一開始就先衝動購買喔！</p>\r\n\r\n<p>出門露營要準備的東西很多，主要目的是可以提高露營的舒適度和方便性。基本的露營裝備，包含帳篷類、工具類、寢具類、煮食類、燈具類，其他還有桌椅、衣物、個人盥洗用品、食材等。不過露得越久、裝備也會越來越簡化和輕量化，畢竟<strong>花在裝備上的時間越多，享受自然風景的時間就越少</strong>。接下來我們會依逐項說明露營裝備前期及後期的準備與選擇。</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/0de67f551222c2b74c2834c40c88bc6258723626.jpg\" style=\"height:661px; width:802px\" /></p>\r\n\r\n<p><strong>【營鎚、營釘、營繩、營柱等工具】</strong></p>\r\n\r\n<p>好用的搭營工具可以事半功倍，特別是營鎚和營釘更是有著直接的影響，除了可以節省力氣之外，也會關係到紮營的安全性。</p>\r\n\r\n<p><strong>※入門者建議</strong> </p>\r\n\r\n<p>剛開始可以使用一般的鎚子搭配帳篷附的營釘、營繩和營柱來使用。 </p>\r\n\r\n<p><strong>※進階需求建議</strong><strong> </strong></p>\r\n\r\n<p>未來可以考慮入手一把專用的營鎚，市面上有賣銅頭營鎚，吸震設計讓敲打營釘更順手省力。至於營釘則建議至少要升級到大黑釘的等級（長約15公分、直徑約1公分），在抓地力上會比原廠送的細營釘更強。當然預算許可的話，30分公長的鍛造營釘效果更佳。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/f861ff064b2a77d72f2427c607b1b1d95e3dff3f.jpg\" style=\"height:661px; width:802px\" /></p>\r\n\r\n<p><strong>【爐具】</strong></p>\r\n\r\n<p>露營的戶外炊煮大多仰賴行動式的火源來處理，包括常見的卡式爐、登山爐（蜘蛛爐）等，都是露營常用的火源。如果要講究火力，更費事一點的還有人是使用燃燒器、雙口爐甚至是快速爐等，不過相對地所佔的體積和重量也很驚人。</p>\r\n\r\n<p><strong>※入門者建議</strong> </p>\r\n\r\n<p>建議新手可以先使用一般的卡式瓦斯爐，搭配瓦斯罐在低海拔地區都可以方便炊煮或燒水。但是到了高海拔地區或是溫度較低的環境，瓦斯罐的液態瓦斯會因為低溫而無法順利汽化燃燒，因而導致火力明顯不足，影響炊事效率。</p>\r\n\r\n<p><strong>※進階需求建議</strong> </p>\r\n\r\n<p>等到決定要常露的時候，就可以考慮購入配有防風片及導熱片的專用卡式爐，可以輕鬆應付高海拔低溫的環境；體積小好收納的登山爐則是比較適合登山健行時使用。</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>【鍋具】</strong></p>\r\n\r\n<p>露營常用的鍋具大多以湯鍋和平底鍋為主，前者用於煮麵、煮火鍋等應用，平底鍋則是可以解決大部份的煎炒類料理。理論上只要有這兩鍋在手，戶外料理大多可以簡單搞定。</p>\r\n\r\n<p><strong>※入門者建議</strong><strong> </strong></p>\r\n\r\n<p>其實家裡的不鏽鋼湯鍋及常用的平底鍋都可以考慮先帶出來用，就已然足以應付戶外的炊煮項目。其中比較麻煩的是平底鍋的鍋柄較長，在收納時多少會是個問題。</p>\r\n\r\n<p><strong>※進階需求建議</strong> </p>\r\n\r\n<p>未來可以評估是不是要入手不鏽鋼的套鍋組，考慮到收納方便，鍋把和鍋身通常是設計為可拆卸式，兼顧煮食與收納的不同狀況。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/4da2e4d711b9a48960dd1035ea5fa5ecf8b81b1e.jpg\" style=\"height:811px; width:564px\" /></p>\r\n\r\n<p><strong>【餐具】</strong></p>\r\n\r\n<p>一般露營常用的餐具都要講求輕量化和方便性，當然耐用度也很重要，市面上常見的材質多以不鏽鋼或是鋁合金硬質氧化材質為主，但隨著露營品味的提升，不少露友也開始使用木質餐具，輕量美觀又有氣氛。不建議使用免洗餐具，以免增加不必要的垃圾。</p>\r\n\r\n<p><strong>※入門者建議</strong> </p>\r\n\r\n<p>新手可以先將家裡的餐具帶出門使用，建議攜帶耐熱型的塑料碗盤，可減少重量並避免破裂。</p>\r\n\r\n<p><strong>※進階需求建議</strong><strong> </strong></p>\r\n\r\n<p>至於之後要不要更換成不鏽鋼或是鋁合金硬質氧化材質的套碗組則是見仁見智，我自己之前也是使用套碗，但覺得金屬碗筷互相摩擦的聲音非常可怕，所以現在都改為使用木質餐具居多。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/98768bc3270f26e3e606d7d8df8571420185b09d.jpg\" style=\"height:811px; width:564px\" /></p>\r\n\r\n<p><strong>【燈具】</strong></p>\r\n\r\n<p>現在的露營區大多有提供電源，讓露友們可以進行燈光的補強及手機充電使用，在有電可用的狀況下，大多數露友會使用插電型的光源，如工作燈搭配防蚊燈泡；若是在無電區則多會使用電池式的LED營燈或是瓦斯燈來解決照明的需求。</p>\r\n\r\n<p><strong>※入門者建議</strong><strong> </strong></p>\r\n\r\n<p>新手可以到五金行購買一般的工作燈來使用，價格不貴，再視狀況更換為防蟲燈泡，雖然亮度較弱，但可有效地減少昆蟲類的趨光性。</p>\r\n\r\n<p><strong>※進階需求建議</strong> </p>\r\n\r\n<p>LED燈和瓦斯燈雖然定位為無電區使用，但因為造型特別且具美感和氣氛，可以做為照明及營造氣氛兩者兼具的好用裝備。需要特別注意的是瓦斯燈或煤油燈等明火燈具絕對不能帶進帳篷內，以免發生危險。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/2c189f33427c1a72a29bb7c985c9541966157759.jpg\" style=\"height:661px; width:802px\" /></p>\r\n\r\n<p><strong>【桌子】</strong></p>\r\n\r\n<p>露營的桌子扮演了露營活動的重要角色，因為舉凡炊事、用餐都少不了桌子，更別說是進行一些DIY的活動，更是無桌不行。桌子的形式和用途很多種，露友們可以用一張桌子搞定所有需求；也有露友則是照用途分為炊事桌、用餐桌及置物桌等，都可以照個人需求來調整。</p>\r\n\r\n<p><strong>※入門者建議 </strong></p>\r\n\r\n<p>如果是第一次出門的新手，建議從家中攜帶小型的折疊桌先暫用即可。</p>\r\n\r\n<p><strong>※進階需求建議</strong> </p>\r\n\r\n<p>若需購買，則要評估常用桌類的特性，如蛋捲桌收納方便、體積小，一般使用都沒問題，但不建議置放過重物品於桌面上；折疊桌的穩定性較高，但是體積較大，若是車輛空間不大就會比較傷腦筋。</p>\r\n\r\n<p> </p>\r\n\r\n<p> </p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/02f0683bcfd6e124d1545929737643a2999cb7ea.jpg\" style=\"height:811px; width:564px\" /></p>\r\n\r\n<p><strong>【椅子】</strong></p>\r\n\r\n<p>從事戶外露營活動，除了睡覺時會待在帳篷裡較長時間外，其他多餘時間都是在客廳活動空間為主，因此一張好坐的椅子會影響露營活動的舒適和品質。市面上的露營椅種類琳瑯滿目、各有特色，沒有哪種椅子是王道，單純看自己坐得舒不舒適和需求來決定即可。</p>\r\n\r\n<p><strong>※入門者建議</strong></p>\r\n\r\n<p>第一次出門的朋友可以將家中的小板凳或折疊椅帶到營區使用，體積小好收納，雖然舒適度不及專業露營椅，但仍可做為剛入門的替代品使用。</p>\r\n\r\n<p><strong>※進階需求建議</strong></p>\r\n\r\n<p>等到心態進入不露不可的時候，再來細細比較各家椅子的特色和舒適度，價格落差也相當大，端看能力來取捨。常見的椅種包括大川椅、折疊椅等，光是挑張椅子就是一門學問，當然也是樂趣。</p>\r\n\r\n<p><img src=\"/ckfinder/userfiles/files/c1e69f1ea2501b3ee8889d8c7551172173705e3f.jpg\" style=\"height:811px; width:564px\" /></p>\r\n\r\n<p><strong>【冰桶】</strong></p>\r\n\r\n<p>露營的餐點幾乎都是自己料理，所以一個可以保存食材新鮮的冰桶通常是每個家庭的部長大人（老婆）所關心的重點中的重點。市面上的冰桶種類很多，通常都要搭配冰磚或冷媒來發揮其保冷的功效，至於插電式的戶外電冰箱則是另一個等級的裝備了。</p>\r\n\r\n<p><strong>※入門者建議</strong></p>\r\n\r\n<p>傳統的戶外用或釣魚用的冰桶都可以先拿來使用，只要放入保冷材就可以維持至少一天的冷藏效果。</p>\r\n\r\n<p><strong>※進階需求建議</strong></p>\r\n\r\n<p>倘若有機會進行三天兩夜以上的露營活動，則可以考慮五日鮮或十日鮮等級的冰桶，保冷效果可以更持久，空間尺寸也較大。至於所費不眥的戶外電冰箱則可視車載空間大小及預算來衡量是否需要。</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>【大黑垃圾袋】</strong></p>\r\n\r\n<p>聽起來很不可思議，大黑垃圾袋也是必備的露營裝備？千萬不要懷疑，特別是天氣不穩定的季節，大黑垃圾袋往往是最熱銷的露營裝備，因為一旦收帳時碰上大雨或裝備未乾的狀況，解決方式就是把帳篷、天幕、客廳帳的頂布和邊布塞進大黑垃圾袋中包好，然後帶回家處理。</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>【衣物與個人盥洗用品】</strong></p>\r\n\r\n<p>玩什麼樣的活動，就穿什麼樣的衣服，露營也是一樣，總不可能穿個小洋裝或是旗袍出門吧！衣物首要考慮的是功能性，再來講究美觀和特色。以夏天為例，吸濕排汗的衣物有其必要性，長袖衣物則是有防曬和防蚊的功能；冬天則要兼顧防風和保暖，洋蔥式的戶外穿著法是不變的基本原則。至於盥洗用品則最好分裝小瓶方便攜帶。</p>\r\n\r\n<p><strong>※入門者建議</strong></p>\r\n\r\n<p>建議可以把家中的衣物依功能分類再帶出，防風型外套則是因應天氣變化的基本保障。</p>\r\n\r\n<p><strong>※進階需求建議</strong></p>\r\n\r\n<p>市面上有很多著重功能又美觀的戶外衣物，可視自己的需求來添購。</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(111, NULL, NULL, '3', '超實用氣象APP 【QPESUMS劇烈天氣監測系統】', '2019-03-21 12:15:51', NULL, '<p><img src=\"/ckfinder/userfiles/files/bbc95f0406b0f3cde3ac533f8219ee99b3a5b235.jpg\" style=\"height:506px; width:800px\" /></p>\r\n\r\n<p>為加強災害性天氣的監測與極短期預報能力，中央氣象局整合氣象雷達、雨量站等多重觀測資料及地理資訊發展劇烈天氣監測系統（Quantitative Precipitation Estimation and Segregation UsingMultiple Sensor；QPESUMS），產製災害性天氣即時監測資訊予政府防救災單位及社會大眾參考。2014年度開發行動裝置版本，以更為便捷之方式提供即時氣象資訊。</p>\r\n\r\n<p>產品內容包括：雷達回波觀測-全臺雷達網連合成之回波觀測資料；1小時與24小時累積雨量分佈-全臺雨量觀測站過去1小時與24小時之實測雨量分析；對流胞即時監測-藉由雷達觀測所偵測到現有對流胞的位置；未來1小時雨區預報-以雷達資料估計之降雨現況利用外延法推估求得之雨區預報；雨量觀測-各雨量站於過去10分鐘、1小時、3小時、6小時、12小時、24小時量測到的雨量值。</p>\r\n\r\n<p>如欲設定個人化警示訊息通知，請點選畫面上方｢警示｣選項，自訂警示區域之中心位置、區域半徑、警示時段，以及雷達回波、1及24小時之雨量門檻值，當實際發生之雷達回波或雨量達到上述自訂標準時，即會產生即時通知訊息與警示聲響。(截自GOOGLE APP說明)</p>\r\n\r\n<p> </p>\r\n\r\n<p>如其說明，打開APP就可以看見多樣化的資訊，像是最即時的雷達回波圖，可以了解目前台灣地區(甚至露營所在地點)上面是否有雲雨區通過，能夠判斷接下來的雨勢及持續時間。</p>\r\n\r\n<p>功能很完善，準確度也比一般的氣象預報來得仔細且精準，對於常跑戶外的露友們來說，真的是一個不錯的參考工具。是說2014就已經研發出來，但是好像還是有很多人不知道啊？下次出門就不妨參考看看吧！</p>\r\n', NULL, NULL, NULL, NULL, '顯示'),
(112, NULL, NULL, '3', '下雨怎麼辦? 請你跟我這樣做', '2019-03-21 12:25:57', '2019-03-22 10:14:37', '<p><img src=\"/ckfinder/userfiles/files/95fe4afe730fc2048d84e7be0e55019036506a7d.jpg\" style=\"height:701px; width:1051px\" /></p>\r\n\r\n<p>遇到天氣陰晴不定，導致大家想露營但又不知營地實際情況，搞得大家心情七上八下，到底要不要去呢……其實露營難免遇上下雨，只要事前準備好、收集資訊，每次露營都將會是美好的回憶。</p>\r\n\r\n<h3><strong>善用資訊</strong></h3>\r\n\r\n<p>台灣南北氣候差異大，居住地與營地間的天氣常有天壤之別，參考中央氣象局的未來一周天氣預測、鄉鎮預報，便於事前規劃行程。如果你選擇高山營地會有落石或是道路封閉，交通上要有充分的行前規劃與了解，公路總局網站可查詢路況及當地即時影像。<br />\r\n要知道營地現況，直接打給營地主會有最正確的情報，或者撥打當地村里長或是最近的警局電話了解狀況，這些都是可用管道還有其他網站可多加利用：<br />\r\n<br />\r\n‧　中央氣象局 <a href=\"https://news.easycamp.com.tw/www.cwb.gov.tw/\" target=\"_blank\">www.cwb.gov.tw/</a><br />\r\n‧　公路總局 <a href=\"http://www.thb.gov.tw/\" target=\"_blank\">http://www.thb.gov.tw/</a><br />\r\n‧　高速公路 <a href=\"https://news.easycamp.com.tw/1968.freeway.gov.tw/cctv\" target=\"_blank\">1968.freeway.gov.tw/cctv</a><br />\r\n‧　臺灣看透透 <a href=\"https://news.easycamp.com.tw/webcam.www.gov.tw/\" target=\"_blank\">webcam.www.gov.tw/</a><br />\r\n‧　河川便利通 <a href=\"https://news.easycamp.com.tw/iriver.wra.gov.tw/monitor_map_2.aspx\" target=\"_blank\">iriver.wra.gov.tw/monitor_map_2.aspx</a></p>\r\n\r\n<h3><strong>山中氣候不穩定</strong></h3>\r\n\r\n<p>山裡面經常是早上好天氣到了下午大變臉，住在都市的露友們，絕對不能只看出門前的體感溫度和天氣狀況，衣服可多不能少、睡袋可帶了不用，但絕對不能不帶。千萬別因為小疏忽造成不必要的的困擾。<br />\r\n入山時間的考量，入夏時建議中午以前進營地，避免午後雷陣雨造成行車危險。因為海拔因素易有濃霧，下午入山起霧機會往往高很多，這是很多登山的朋友選擇一早就入山的原因。若是雨後，山上水質不穩定，建議自行攜帶飲用水上山。</p>\r\n\r\n<h3><strong>外部設備檢查</strong></h3>\r\n\r\n<p>在營地中難免遇到下雨，如果没有做好萬全準備可是會狼狽不堪，甚至危及到安全，所以檢視自己的裝備是相當重要的事情。添購天幕帳與客廳帳可確保下雨時的遮蔽活動空間，烹飪、餐桌、聊天、休息等都需要在遮蔽下進行，營地是否有此類空間可利用則要事先詢問。<br />\r\n<br />\r\n要導引排水，經過營地主同意後可以鏟子挖設排水溝；天幕帳的水線要以高低落差安排，要特別避開敏感地帶，閃開排水溝與擋土牆以防發生意外。下雨土質鬆軟時短營釘難以穩固帳篷，很容易發生倒帳，需要自備長營釘加深固定，再輔助利用石頭、樹木、鐵架、桌椅、汽車等等地形地物拉繩攀附，才能夠穩固和放心。</p>\r\n\r\n<h3><strong>內部檢查</strong></h3>\r\n\r\n<p>下著雨、伴著風露營，最依賴的還是帳篷。記得工具箱內必備的大力膠布、水電用電工膠帶，不然到了營地才發現營柱、營繩，甚至是帳布有問題，可就麻煩大了。一頂好的帳篷在設計上會有水線導水的用心，即使小小的電源線穿孔拉鍊都要精心安排，外帳布料與車縫處防水膠條的材料選用，這都攸關著帳篷內的乾燥度與否。<br />\r\n<br />\r\n帳底的材質和車縫都是關鍵中的關鍵，帳底最基本的要求就是一體成形的便當盒狀，能夠像是浴缸一樣保護著帳內乾燥與舒適。天氣不穩定時，增加預防性的設備與搭設是必要的，搭設天幕並將水線先行拉好，並採用包覆式方式將帳篷妥善保護，或是利用地形、地物，如：雨遮、樹林、岩石、車體，都可幫帳篷增加天然障蔽。<br />\r\n<br />\r\n有了好的帳底，再增加保護帳底布的地席，更能有效隔絕地氣、水份，記得地席不能比帳布大，若較大請適度折進去，避免盛雨效應。當下雨或濕度相當高時，使用羽絨被替代睡袋的朋友要小心，濕氣會讓羽絨棉被越睡越冷，選擇高品質的睡袋才會發揮保暖功效。</p>\r\n\r\n<h3><strong>雨中撤帳</strong></h3>\r\n\r\n<p>事先準備大型垃圾袋，把東西分門別類丟進各塑膠袋內，就能快速完成撤收，回家再整理保養。濕答答的帳布，一定要除濕、通風吹乾或是用陽光曬帳。營釘和帳篷骨架沾土或泡水後要做清潔與上油保養，營繩務必將繩結打開晾乾，連同帳布都確認乾了才能放進收納袋中。有攜帶桌布或是木製用品，還有睡袋都得逐一取出乾燥風乾。雨中撤帳講求的是時間，全家一定得總動員齊心收拾，上了車注意路況，平平安安回到家裡，才是王道。<br />\r\n<br />\r\n台灣露營好方便，很多營地的設備、美景，更讓國外遊客羨慕不已。雖然好的營地不好訂，有時在當天隨性打電話預約營地後補，這種臨時起意的露營心情，可是別有一番風味。享受大自然的美好，遇到下雨也能好好野一下。</p>\r\n', NULL, NULL, NULL, NULL, '顯示');

-- --------------------------------------------------------

--
-- 資料表結構 `user_plan`
--

CREATE TABLE `user_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_condi` int(11) NOT NULL,
  `dis_num` int(11) NOT NULL,
  `dis_type` int(11) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user_plan`
--

INSERT INTO `user_plan` (`id`, `name`, `user_condi`, `dis_num`, `dis_type`, `start`, `end`) VALUES
(8, '修改', 3, 22, 1, '2018-07-22', '2018-07-22'),
(9, 'dsf\'s', 1, 10, 1, '2018-07-22', '2018-07-22'),
(20, '新增', 2, 10, 1, '2019-03-23', '2019-03-23');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- 資料表索引 `amount_plan`
--
ALTER TABLE `amount_plan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `campsite_device`
--
ALTER TABLE `campsite_device`
  ADD PRIMARY KEY (`campDevice_id`);

--
-- 資料表索引 `campsite_facility`
--
ALTER TABLE `campsite_facility`
  ADD PRIMARY KEY (`campFacility_id`);

--
-- 資料表索引 `campsite_feature`
--
ALTER TABLE `campsite_feature`
  ADD PRIMARY KEY (`campFeature_id`);

--
-- 資料表索引 `campsite_image`
--
ALTER TABLE `campsite_image`
  ADD PRIMARY KEY (`campImg_id`);

--
-- 資料表索引 `campsite_list`
--
ALTER TABLE `campsite_list`
  ADD PRIMARY KEY (`camp_id`);

--
-- 資料表索引 `campsite_price`
--
ALTER TABLE `campsite_price`
  ADD PRIMARY KEY (`campPrice_id`);

--
-- 資料表索引 `campsite_type`
--
ALTER TABLE `campsite_type`
  ADD PRIMARY KEY (`campType_id`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `code` (`coupon_code`);

--
-- 資料表索引 `dis_type`
--
ALTER TABLE `dis_type`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `event_applylist`
--
ALTER TABLE `event_applylist`
  ADD PRIMARY KEY (`applyList_id`);

--
-- 資料表索引 `event_applyorder`
--
ALTER TABLE `event_applyorder`
  ADD PRIMARY KEY (`apply_id`);

--
-- 資料表索引 `event_feedback`
--
ALTER TABLE `event_feedback`
  ADD PRIMARY KEY (`eventFB_id`);

--
-- 資料表索引 `event_list`
--
ALTER TABLE `event_list`
  ADD PRIMARY KEY (`event_id`);

--
-- 資料表索引 `host_infolist`
--
ALTER TABLE `host_infolist`
  ADD PRIMARY KEY (`host_id`),
  ADD UNIQUE KEY `host_account` (`host_account`);

--
-- 資料表索引 `host_paymenttype`
--
ALTER TABLE `host_paymenttype`
  ADD PRIMARY KEY (`host_paymentTypeId`);

--
-- 資料表索引 `issue_condi`
--
ALTER TABLE `issue_condi`
  ADD PRIMARY KEY (`issue_condi`);

--
-- 資料表索引 `location_citylist`
--
ALTER TABLE `location_citylist`
  ADD PRIMARY KEY (`city_id`);

--
-- 資料表索引 `location_distlist`
--
ALTER TABLE `location_distlist`
  ADD PRIMARY KEY (`dist_id`);

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
  ADD UNIQUE KEY `mem_account` (`mem_account`);

--
-- 資料表索引 `price_plan`
--
ALTER TABLE `price_plan`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `prod_plan`
--
ALTER TABLE `prod_plan`
  ADD PRIMARY KEY (`id`);

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
-- 資料表索引 `share_category`
--
ALTER TABLE `share_category`
  ADD PRIMARY KEY (`cate_id`);

--
-- 資料表索引 `share_post`
--
ALTER TABLE `share_post`
  ADD PRIMARY KEY (`post_id`);

--
-- 資料表索引 `user_plan`
--
ALTER TABLE `user_plan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_level` (`user_condi`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `amount_plan`
--
ALTER TABLE `amount_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `campsite_device`
--
ALTER TABLE `campsite_device`
  MODIFY `campDevice_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '設備編號';

--
-- 使用資料表 AUTO_INCREMENT `campsite_facility`
--
ALTER TABLE `campsite_facility`
  MODIFY `campFacility_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '設施編號';

--
-- 使用資料表 AUTO_INCREMENT `campsite_feature`
--
ALTER TABLE `campsite_feature`
  MODIFY `campFeature_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '特色編號';

--
-- 使用資料表 AUTO_INCREMENT `campsite_image`
--
ALTER TABLE `campsite_image`
  MODIFY `campImg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '圖片編號', AUTO_INCREMENT=37;

--
-- 使用資料表 AUTO_INCREMENT `campsite_list`
--
ALTER TABLE `campsite_list`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '營地編號', AUTO_INCREMENT=30;

--
-- 使用資料表 AUTO_INCREMENT `campsite_price`
--
ALTER TABLE `campsite_price`
  MODIFY `campPrice_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '價格編號';

--
-- 使用資料表 AUTO_INCREMENT `campsite_type`
--
ALTER TABLE `campsite_type`
  MODIFY `campType_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '類型編號';

--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- 使用資料表 AUTO_INCREMENT `dis_type`
--
ALTER TABLE `dis_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `event_applylist`
--
ALTER TABLE `event_applylist`
  MODIFY `applyList_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- 使用資料表 AUTO_INCREMENT `event_feedback`
--
ALTER TABLE `event_feedback`
  MODIFY `eventFB_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `event_list`
--
ALTER TABLE `event_list`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- 使用資料表 AUTO_INCREMENT `host_infolist`
--
ALTER TABLE `host_infolist`
  MODIFY `host_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=51;

--
-- 使用資料表 AUTO_INCREMENT `host_paymenttype`
--
ALTER TABLE `host_paymenttype`
  MODIFY `host_paymentTypeId` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `issue_condi`
--
ALTER TABLE `issue_condi`
  MODIFY `issue_condi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `location_citylist`
--
ALTER TABLE `location_citylist`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=23;

--
-- 使用資料表 AUTO_INCREMENT `location_distlist`
--
ALTER TABLE `location_distlist`
  MODIFY `dist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- 使用資料表 AUTO_INCREMENT `member_level`
--
ALTER TABLE `member_level`
  MODIFY `mem_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `member_list`
--
ALTER TABLE `member_list`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=160;

--
-- 使用資料表 AUTO_INCREMENT `price_plan`
--
ALTER TABLE `price_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表 AUTO_INCREMENT `prod_plan`
--
ALTER TABLE `prod_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `salepage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=146;

--
-- 使用資料表 AUTO_INCREMENT `share_category`
--
ALTER TABLE `share_category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `share_post`
--
ALTER TABLE `share_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- 使用資料表 AUTO_INCREMENT `user_plan`
--
ALTER TABLE `user_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
