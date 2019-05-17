-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 05 月 17 日 17:28
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
-- 資料庫： `go_camping`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admins`
--

CREATE TABLE `admins` (
  `sid` int(11) NOT NULL COMMENT '流水號',
  `admin_id` varchar(20) NOT NULL COMMENT '帳號',
  `password` varchar(20) NOT NULL COMMENT '密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admins`
--

INSERT INTO `admins` (`sid`, `admin_id`, `password`) VALUES
(1, 'jennifer', 'admin'),
(2, 'admin', 'admin');

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
-- 資料表結構 `campsite_image`
--

CREATE TABLE `campsite_image` (
  `campImg_id` int(11) NOT NULL COMMENT '圖片編號',
  `camp_image` text COLLATE utf8_unicode_ci NOT NULL COMMENT '營地照片',
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
(35, 'upload/c013.jpg', '楓之谷', '瀑布', '1234', ''),
(36, 'upload/c011.jpg', '九甲林露營區', '露臺', '111', ''),
(37, 'upload/p01.jpg', '露營區', '露臺', '1111', ''),
(38, '', '彩虹奇菁', '123', '111', ''),
(39, 'upload/p01.jpg', '九甲林露營區', '遊樂場', '123', ''),
(40, '', '彩虹奇菁', '11222', '11122333', ''),
(41, '', '九甲林露營區', '花園', '2222222222', ''),
(42, '', '森林', '水池', '222333', '');

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
  `dist` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '地區',
  `host_id` int(11) NOT NULL COMMENT '營地主編號',
  `camp_intro` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '簡介',
  `camp_detail` text COLLATE utf8_unicode_ci NOT NULL COMMENT '營地須知',
  `camp_device` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營地設施',
  `camp_notice` text COLLATE utf8_unicode_ci NOT NULL COMMENT '注意事項',
  `camp_img` text COLLATE utf8_unicode_ci NOT NULL COMMENT '營區圖片',
  `camp_imgarea` text COLLATE utf8_unicode_ci NOT NULL COMMENT '營區配置圖',
  `camp_service` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '附屬服務'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `campsite_list`
--

INSERT INTO `campsite_list` (`camp_id`, `camp_name`, `camp_address`, `camp_location`, `camp_tel`, `camp_fax`, `camp_email`, `camp_ownerName`, `camp_openTime`, `camp_target`, `city`, `dist`, `host_id`, `camp_intro`, `camp_detail`, `camp_device`, `camp_notice`, `camp_img`, `camp_imgarea`, `camp_service`) VALUES
(1, '何方神聖慢活營', '新北市烏來區大羅蘭19號之1', '24.7737944,121.4788949', '02-22527966 ', '02-22527966 ', 'wang@gmail.com', '王先生', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '新北市', '烏來區', 0, '', '', '', '', '0', '0', ''),
(2, '何方神聖慢活營', '新北市烏來區大羅蘭19號之1', '24.7737944,121.4788949', '02-22527966 ', '02-22527966 ', 'wang02@gmail.com', '王先生02', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '新北市', '烏來區', 0, '', '', '', '', '0', '0', ''),
(3, '綠果子休憩站', '桃園市龍潭區中原路三段150巷66號', '24.881858,121.299778', '02-22527966 ', '02-22527966 ', 'lin@gmail.com', '林先生', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '桃園市', '龍潭區', 0, '', '', '', '', '0', '0', ''),
(5, '紅樹林森林園區', '桃園市龍潭區中原路三段150巷66號', '24.881858,121.299778', '02-2252-7966 ', '02-2252-7966 ', 'lin02@gmail.com', '林先生02', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '新北市', '淡水區', 0, '', '', '', '', '0', '0', ''),
(6, '楓之谷露營區', '桃園市大溪區福山一路118-1號', '24.881858,\r\n121.299778', '02-2252-7966 ', '02-2252-7966 ', 'chen@gmail.com', '陳小姐', '平日10:00~20:00\r\n假日08:00~22:00', '可攜帶寵物', '桃園市', '大溪區', 0, '', '', '', '', '0', '0', ''),
(7, '管園親子露營區', '桃園市龍潭區中原路三段150巷66號', '24.8261342,\r\n121.1875318', '02-2252-7966 ', '02-2252-7966 ', 'huang@gmail.com', '黃小姐', '平日10:00~20:00\r\n假日08:00~22:00', '親子遊樂', '桃園市', '龍潭區', 0, '', '', '', '', '0', '0', ''),
(10, '紅樹林露營區', '新竹縣五峰鄉桃山村清泉17鄰296-28號', '122211441', '02-2234-6666', '02-2234-6666', 'jenny@ddd.com', '00', '51', '12', '新竹縣', '五峰鄉', 0, '', '', '', '', '0', '0', ''),
(11, '九甲林露營區', '石岡區', '24.2658224,120.7832063', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', '', '大型派對', '新北市', '石岡區', 0, '', '', '', '', '0', '0', ''),
(12, '九甲林露營區', '桃山村清泉17鄰296-28號', '24.2658224,120.7832063', '02-2252-7966', '02-2252-7966', 'chen@cccc.com', '陳小姐', '11', '10', '台中市', '太平市', 0, '', '', '', '', '0', '0', ''),
(13, '森林', '和平東路一段162號', '24.2658224,120.7832063', '02-2252-7966', '02-2252-7966', 'susuaaa@gmail.com', '蘇先生', '平日10:00\r\n假日8:00', '', '', '大安區', 0, '', '', '', '', '0', '0', ''),
(14, '楓之谷', '', '24.0738248,120.9795118', '02-2252-7966', '02-2252-7966', 'ding@ccc.com', '丁先生', '', '', '桃園市', '五峰鄉', 0, '', '', '', '', '0', '0', ''),
(15, '森林園區', '石岡區', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'susu1234@gmail.com', '陳先生', '', '營火晚會', '基隆市', '石岡區', 0, '', '', '', '', '0', '0', ''),
(16, '九甲林露營區', '東勢地區', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'ding@ccc.com', '丁先生', '', '小家庭', '基隆市', '東勢區', 0, '', '', '', '', '0', '0', ''),
(17, '彩虹奇菁', '和平東路', '24.2658224,120.7832063', '02-2252-7966', '', 'susu@gmail.com', '蘇先生', '', '大型派對', '台北市', '大安區', 0, '', '', '', '', '0', '0', ''),
(18, '森林', '仁愛鄉', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', '', '2', '嘉義縣', '石岡區', 0, '', '', '', '', '0', '0', ''),
(19, '樹不老露營區11', '仁愛鄉', '24.1984396,120.8614356', '02-2252-7966', '02-2252-7966', 'chen111@aaa.com', '陳先生', '', '大型派對', '臺中市', '仁愛鄉', 0, '', '', '', '', '0', '0', ''),
(20, '九甲林露營區', '123', '123', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', '', '1', '嘉義市', '東勢區', 0, '', '', '', '', '0', '0', ''),
(21, '楓之谷', '456', '', '', '', '', '', '', '3', '桃園市', '石岡區', 0, '', '', '', '', '0', '0', ''),
(22, '九甲林露營區', '123', '', '', '', '', '', '', '營火晚會', '屏東縣', '仁愛鄉', 0, '', '', '', '', '0', '0', ''),
(23, '森林園區', '太平市', '24.0738248,120.9795118', '02-2252-7966', '02-2252-7966', 'susu@gmail.com', '蘇先生', 'A.M.10:00~P.M.20:00', '營火晚會', '臺中市', '東勢區', 0, '', '', '', '', '0', '0', ''),
(24, '露營區', '123456', '24.2658224,120.7832063', '02-2252-', '', 'susgmail', '蘇先生', '', '0', '基隆市', '石岡區', 0, '', '', '', '', '0', '0', ''),
(25, '九甲林露營區', '456', '24.1984396,120.8614356', '02-225', '02-2252-7966', '111', '蘇先生', '', '大型派對', '苗栗縣', '石岡區', 0, '', '', '', '', '0', '0', ''),
(26, '露營區', '111', '111', '02-225', '02-2252-7966', 'chen', '', '', '0', '苗栗縣', '五峰鄉', 0, '', '', '', '', '0', '0', ''),
(28, '露營區', '123', '24.2658224,120.7832063', '02-225', '02-22527966', 'chen@aaa.com', '1234', '123', '營火晚會', '桃園市', '東勢區', 0, '', '', '', '', '0', '0', ''),
(29, '露營區', '1234', '24.2658224,120.7832063', '02-2252', '02-22527966', 'susu@gmail.com', '蘇先生', '', '營火晚會', '新北市', '仁愛鄉', 0, '', '', '', '', '0', '0', ''),
(30, '森林', '', '', '', '', '', '', '', '0', '新北市', '', 0, '', '', '', '', '0', '0', ''),
(31, '露營區', '', '', '', '', '', '', '', '0', '桃園市', '', 0, '', '', '', '', '0', '0', ''),
(32, '九甲林露營區', '', '', '', '', '', '', '', '0', '臺北市', '', 0, '', '', '', '', '0', '0', ''),
(33, '九甲林露營區', '', '', '', '', '', '', '', '0', '臺北市', '', 0, '', '', '', '', '0', '0', ''),
(54, '九甲林露營區', '456', '', '02-2252-7966', '', 'susu@gmail.com', '', '', '營火晚會', '桃園市', '', 0, '', '', '', '', '0', '0', ''),
(55, '露營區', '12341221', '', '02-2252-7966', '', 'su@gmail.com', '', '', '', '', '', 0, '', '', '', '', '0', '0', ''),
(56, '露營區', '123', '', '02-2252-7966', '', 'susu@gmail.com', '', '', '', '', '', 0, '', '', '', '', '0', '0', ''),
(57, '楓之谷', '1234', '', '02-2252-7966', '', 'susu@gmail.com', '', '', '', '', '', 0, '', '', '', '', '0', '0', ''),
(58, '露營區', '11111', '', '02-2252-7966', '', 'ding@ccc.com', '', '', '', '', '', 0, '', '', '', '', '0', '0', ''),
(59, '露營區', '1234', '', '02-2252-7966', '', 'susu@gmail.com', '', '', '', '', '', 0, '1223111', '', '', '', '0', '0', ''),
(60, '楓之谷03', '4125633', '', '02-22527966', '', 'susu555@gmail.com', '', '', '', '', '', 0, '222223333', '1233', '', '季節活動：\r\n※ 6-9月有海上獨木舟活動，歡迎預約洽詢。', '0', '0', ''),
(61, '楓之谷04', '220新北市4555jtggr', '', '02-2252-1234', '', 'susu11255@gmail.com', '', '', '', '', '', 0, '', '', '', '', '0', '0', '');

-- --------------------------------------------------------

--
-- 資料表結構 `campsite_type`
--

CREATE TABLE `campsite_type` (
  `campArea_id` int(11) NOT NULL COMMENT '營區區域編號',
  `camp_areaImg` text COLLATE utf8_unicode_ci NOT NULL COMMENT '營區圖片',
  `camp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營地名稱',
  `camp_area` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營區名稱',
  `camp_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '營地類型',
  `camp_size` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '尺寸',
  `camp_number` int(11) NOT NULL COMMENT '帳數',
  `camp_priceWeekday` int(11) NOT NULL COMMENT '平日價格',
  `camp_priceHoliday` int(11) NOT NULL COMMENT '假日價格',
  `camp_feature` text COLLATE utf8_unicode_ci NOT NULL COMMENT '區域特色'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `campsite_type`
--

INSERT INTO `campsite_type` (`campArea_id`, `camp_areaImg`, `camp_name`, `camp_area`, `camp_type`, `camp_size`, `camp_number`, `camp_priceWeekday`, `camp_priceHoliday`, `camp_feature`) VALUES
(7, '', '東和露營區', 'A區', '草皮', '5M*8M', 2, 1200, 1300, ''),
(8, '', '東和露營區', 'B區', '草皮', '6M*6M', 5, 1000, 1100, ''),
(9, '', '東和露營區', 'C區', '雨棚', '4M*5M', 5, 1000, 1100, ''),
(12, '', '九甲林露營區', 'A區', '棧板', '', 0, 1200, 1300, ''),
(13, '', '彩虹奇菁', 'A區', '碎石', '', 0, 1500, 1600, ''),
(14, 'upload/P01.jpg', '露營區', 'A區', '0', '', 0, 0, 0, '');

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
(105, 'coupon', 'crm2v8', '2019-04-08 14:10:40', 10, 1, 1, 0, '2019-04-24', 141),
(106, 'coupon', '391wp2', '2019-04-08 14:10:40', 10, 1, 1, 0, '2019-04-24', 141),
(107, 'coupon', 'reughl', '2019-04-08 14:10:40', 10, 1, 1, 0, '2019-04-24', 138),
(108, 'coupon', 'uaniso', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 140),
(109, 'coupon', 'g2o875', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 151),
(110, 'coupon', '8hfo43', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 159),
(111, 'coupon', 'huyvne', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 172),
(112, 'coupon', 'lxpcvg', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 173),
(113, 'coupon', '6urgtz', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 186),
(114, 'coupon', 'u1lb04', '2019-04-08 14:10:41', 10, 1, 1, 0, '2019-04-24', 187);

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_gain`
--

CREATE TABLE `coupon_gain` (
  `gain_record_id` int(11) NOT NULL,
  `coupon_genre_id` int(11) NOT NULL,
  `coupon_code` varchar(255) NOT NULL,
  `gain_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `coupon_valid` int(2) NOT NULL DEFAULT '1',
  `mem_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `coupon_gain`
--

INSERT INTO `coupon_gain` (`gain_record_id`, `coupon_genre_id`, `coupon_code`, `gain_date`, `coupon_valid`, `mem_account`) VALUES
(1, 207, 'c0tua8', '2019-05-07 17:27:51', 1, 'testcat'),
(2, 207, 'cwsxjy', '2019-05-07 17:27:51', 1, 'testcat'),
(3, 207, 'ra4msz', '2019-05-07 17:27:51', 1, 'testcat'),
(4, 207, 'duv5is', '2019-05-07 17:27:51', 1, 'testcat'),
(5, 207, 's2ij0z', '2019-05-07 17:27:51', 1, 'testcat');

-- --------------------------------------------------------

--
-- 資料表結構 `coupon_genre`
--

CREATE TABLE `coupon_genre` (
  `coupon_genre_id` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `discount_unit` int(11) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `avaliable_start` date NOT NULL,
  `avaliable_end` date NOT NULL,
  `coupon_expire` date NOT NULL,
  `camp_id` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `order_night` int(11) NOT NULL,
  `order_people` int(11) NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `coupon_genre`
--

INSERT INTO `coupon_genre` (`coupon_genre_id`, `coupon_name`, `discount_unit`, `discount_type`, `avaliable_start`, `avaliable_end`, `coupon_expire`, `camp_id`, `order_price`, `order_night`, `order_people`, `discription`) VALUES
(120, 'test3', 10, 'percentage', '2019-05-14', '2019-05-14', '2019-05-14', 1, 0, 0, 0, 's'),
(204, 'test2', 10, 'percentage', '2019-07-19', '2019-09-20', '2019-12-12', 3, 1, 1, 1, '修改'),
(205, '測試', 300, 'currency', '2019-05-03', '2019-05-04', '2019-12-19', 1, 0, 0, 0, '測試'),
(206, 'testtest', 300, 'currency', '2019-05-03', '2019-05-04', '2019-12-27', 1, 0, 0, 0, 'test1'),
(207, '新增', 300, 'percentage', '2019-05-04', '2019-07-12', '2020-01-30', 11, 0, 0, 0, '新增'),
(208, 'tes5', 300, 'percentage', '2019-05-07', '2019-05-07', '2019-05-07', 1, 0, 0, 0, '2'),
(209, 'test55', 2, 'percentage', '2019-05-14', '2019-05-14', '2019-05-14', 28, 0, 0, 0, '53w');

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
  `applyList_remark` text,
  `apply_order` int(11) NOT NULL COMMENT '1->取消訂單	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_applylist`
--

INSERT INTO `event_applylist` (`applyList_id`, `apply_id`, `event_id`, `applyList_name`, `applyList_idn`, `applyList_mobile`, `applyList_email`, `applyList_emg`, `applyList_emgMobile`, `applyList_remark`, `apply_order`) VALUES
(1, '1', '1', '張三1', 'P111111111', '0922222222', 'chang1@mail.com', '張三娘', '0966666666', '', 0),
(2, '1', '1', '張三2', 'P222222222', '0988888888', 'chang2@mail.com', '張三爹', '0966666666', NULL, 0),
(3, '2', '9', '李四1', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', NULL, 0),
(4, '2', '9', '李四2', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', NULL, 0),
(5, '2', '9', '李四3', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', NULL, 0),
(6, '2', '9', '李四4', 'P322222222', '0988888888', 'li@mail.com', '李四娘', '0966666666', NULL, 0),
(7, '3', '3', '王朝1', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', NULL, 0),
(8, '3', '3', '王朝2', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', NULL, 0),
(9, '3', '3', '王朝3', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', NULL, 0),
(10, '3', '3', '王朝4', 'P322222222', '0988888888', 'li@mail.com', '王朝娘', '0966666666', NULL, 0),
(11, '4', '11', '馬漢1', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', '00', 0),
(12, '4', '11', '馬漢2', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', '11', 0),
(13, '4', '11', '馬漢3', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', NULL, 0),
(14, '4', '11', '馬漢4', 'P322222222', '0988888888', 'li@mail.com', '馬漢爹', '0966666666', NULL, 0),
(15, '5', '14', '張龍1', 'P322222222', '0988888888', 'li@mail.com', '張龍1爹', '0966666666', '素食', 0),
(16, '5', '14', '張龍2', 'P322222222', '0988888888', 'li@mail.com', '張龍2爹', '0966666666', NULL, 0),
(17, '5', '14', '張龍3', 'P322222222', '0988888888', 'li@mail.com', '張龍3爹', '0966666666', NULL, 0),
(18, '6', '1', '趙虎1', 'P322222222', '0988888888', 'li@mail.com', '趙虎1爹', '0966666666', NULL, 0),
(19, '6', '1', '趙虎2', 'P322222222', '0988888888', 'li@mail.com', '趙虎2爹', '0966666666', NULL, 0),
(20, '23', '6', '王大媽', 'G222222222', '0922222222', NULL, '老王', '0933333333', NULL, 0),
(21, '23', '6', '王大媽2', 'Q222222222', '0966666666', NULL, '老王2', '0911111111', NULL, 0),
(22, '24', '9', '李大嬸', 'G222222222', '0922222222', NULL, '老李', '0933333333', NULL, 0),
(23, '24', '9', '李大嬸2', 'Q222222222', '0966666666', NULL, '老李2', '0911111111', NULL, 0),
(24, '25', '6', 'testelephant', 'Q222222222', '0966666666', '', 'testelephant', '0911111111', 'aa', 0),
(25, '25', '6', 'testelephant', 'Q222222222', '0966666666', '', 'testelephant', '0911111111', '', 0),
(26, '26', '16', 'testdog', 'Q222222222', '0966666666', 'dog@email.com', 'testdog', '0911111111', '', 0),
(27, '26', '16', 'testdog', 'Q222222222', '0966666666', 'testdog@email.com', 'testdog\'s Mom', '0911111111', '', 0),
(28, '26', '16', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', NULL, 0),
(29, '26', '16', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', NULL, 0),
(30, '27', '11', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', NULL, 0),
(31, '27', '11', 'testdog', 'Q222222222', '0966666666', NULL, 'testdog', '0911111111', NULL, 0),
(35, '30', '16', 'testmonkey', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testmonkey\'s Mom', '0988888888', '', 0),
(36, '30', '16', 'testmonkey2', 'A1111111111', '0933333333', 'testmonkey2@mail.com', 'testmonkey\'s Mom2', '0988888888', '', 0),
(48, '36', '19', 'testmonkey', 'A1111111111', '0933333333', 'testmonkey@mail.com', 'testdog\'s Mom', '0988888888', '', 0),
(49, '36', '19', 'testmonkey', 'A1111111111', '0933333333', 'testmonkey@mail.com', 'testdog\'s Mom', '0988888888', '', 0),
(54, '37', '19', 'testsheep', 'A1111111111', '0933333333', 'testsheep@mail.com', 'testdog\'s Mom', '0988888888', '', 0),
(55, '37', '19', 'testsheep', 'A1111111111', '0933333333', 'testsheep@mail.com', 'testdog\'s Mom', '0988888888', '', 0),
(58, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(59, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(60, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(61, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(62, '38', '20', 'testmonkey', 'A1111111111', '0922222222', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(63, '39', '20', 'testdog2', 'A1111111111', '0922222222', 'testdog2@mail.com', 'testdog\'s Mom', '0963654789', '', 0),
(64, '39', '20', 'testdog2', 'A1111111111', '0922222222', 'testdog2@mail.com', 'testdog\'s Mom', '0963654789', '', 0),
(65, '40', '21', ' Woody', 'A1111111111', '0933333333', 'woody@mail.com', ' Bo Peep', '0988888888', '', 0),
(66, '40', '21', 'Buzz Lightyear', 'A1111111111', '0933333333', 'buzz@mail.com', 'Jessie', '0988888888', '', 0),
(67, '41', '21', 'Mike Wazowski', 'A1111111111', '0933555555', 'Mike Wazowski@mail.com', ' Boo', '0988888888', '', 0),
(68, '41', '21', 'James P. Sullivan', 'A1111111111', '0933555555', 'James P. Sullivan@mail.com', ' Boo', '0988888888', '', 0),
(69, '41', '21', 'Randall Boggs', 'A1111111111', '0933555555', 'Randall Boggs@mail.com', 'Celia Mae', '0988888888', '', 0),
(70, '41', '21', 'Henry J. Waternoose III', 'A1111111111', '0933555555', 'Henry J. Waternoose III@mail.com', 'Celia Mae', '0988888888', '', 0),
(71, '41', '21', 'Roz', 'A1111111111', '0933555555', 'testsheep@mail.com', 'Dory', '0988888888', '', 0),
(72, '41', '21', 'testmonkey', 'A1111111111', '0933555555', 'testsheep@mail.com', 'Dory', '0988888888', '', 0),
(79, '42', '22', 'testmonkey2', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(80, '42', '22', 'testmonkey2', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(81, '42', '22', 'testmonkey2', 'A1111111111', '0933555555', 'testmonkey@mail.com', 'testsheep2\'s Dad', '0988888888', '', 0),
(87, 'E6865D45188F                                ', '23', 'elsa11', 'elsa11', '0988888888', 'elsa11@mail.com', 'anna55', '0966666666', '', 0),
(88, 'E6865D45188F                                ', '23', 'elsa22', 'elsa33', '0977666555', 'elsa33@mail.com', 'anna55', '0966666666', '', 0),
(89, 'E6865D45188F                                ', '23', 'elsa33', 'elsa33', '0977666555', 'elsa33@mail.com', 'anna55', '0966666666', '', 0),
(90, 'BDEC26A0CFB4                                ', '24', 'anna', 'anna33', '0988888888', 'anna@mail.com', 'Andy', '0966666666', '', 0),
(91, '09B5B0E50FA3                                ', '24', 'buzz', 'buzz22', '0955444333', 'buzz@mail.com', 'Andy', '0900000000', '', 0),
(92, '09B5B0E50FA3                                ', '24', 'Jessie', 'Jessie33', '0977666555', 'Jessie@mail.com', 'Andy', '0900000000', '', 0),
(93, 'F36EB5E33F09                                ', '24', 'buzz', 'buzz22', '0955444333', 'buzz@mail.com', 'Andy', '0900000000', '', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `event_applyorder`
--

CREATE TABLE `event_applyorder` (
  `apply_id` varchar(255) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `mem_account` varchar(255) NOT NULL,
  `apply_num` varchar(2) NOT NULL,
  `apply_date` date NOT NULL,
  `apply_pay` int(11) DEFAULT NULL,
  `apply_order` int(11) DEFAULT NULL COMMENT '1->取消訂單	',
  `apply_amount` varchar(255) NOT NULL,
  `apply_payment` int(2) NOT NULL COMMENT '0->信用卡；1->ATM；3->ibon	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_applyorder`
--

INSERT INTO `event_applyorder` (`apply_id`, `event_id`, `mem_account`, `apply_num`, `apply_date`, `apply_pay`, `apply_order`, `apply_amount`, `apply_payment`) VALUES
('09B5B0E50FA3                                ', '24', 'buzz', '2', '2019-04-08', NULL, NULL, '600', 0),
('1', '1', 'testdog', '2', '2019-05-23', 1, 1, '', 0),
('2', '9', 'testcat', '4', '2019-03-30', 0, 0, '', 0),
('23', '6', 'testtiger', '2', '2019-03-18', NULL, NULL, '6000', 0),
('24', '9', 'testelephant', '2', '2019-03-18', NULL, NULL, '6000', 0),
('25', '6', 'testelephant', '2', '2019-03-18', 0, 1, '6000', 0),
('26', '16', 'testdog', '4', '2019-03-19', 1, 0, '10000', 0),
('27', '11', 'testdog', '2', '2019-03-19', NULL, NULL, '6000', 0),
('3', '3', 'testrabbit', '4', '2019-03-23', 0, 1, '', 0),
('30', '16', 'testmonkey', '2', '2019-03-19', NULL, NULL, '6000', 0),
('36', '19', 'testmonkey', '2', '2019-03-20', NULL, NULL, '6000', 0),
('37', '19', 'testsheep', '2', '2019-03-20', NULL, NULL, '6000', 0),
('38', '20', 'mem22', '5', '2019-03-20', NULL, NULL, '11000', 0),
('39', '20', 'mem55', '2', '2019-03-20', NULL, NULL, '4400', 0),
('4', '11', 'testbear', '4', '2019-03-30', 0, 0, '', 0),
('40', '21', 'Bonnie', '2', '2019-03-21', NULL, NULL, '4400', 0),
('41', '21', 'marin', '6', '2019-03-21', NULL, NULL, '13200', 0),
('42', '22', 'pikachu', '3', '2019-03-21', 0, 0, '0', 0),
('5', '14', 'testpig', '3', '2019-04-30', 1, 0, '', 0),
('6', '1', 'testtiger', '2', '2019-04-30', NULL, NULL, '', 0),
('BDEC26A0CFB4                                ', '24', 'anna', '1', '2019-04-08', NULL, NULL, '300', 0),
('E6865D45188F                                ', '23', 'elsa', '3', '2019-04-08', NULL, NULL, '60', 0),
('F36EB5E33F09                                ', '24', 'anna', '1', '2019-04-08', NULL, NULL, '300', 0);

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
(1, '1', 'pikachu', 'eventFB_comment', '極光（英語：Aurora）是在高緯度（北極和南極）的天空中，帶電的高能粒子和高層大氣（熱層）中的原子碰撞造成的發光現象。帶電粒子來自磁層和太陽風，在地球上，它們被地球的磁場帶進大氣層。大多數的極光發生在所謂的「極光帶」[1][2]，在觀察上，這是在所有的經度上距離地磁極10°至20°，緯度寬約3°至6°的帶狀區域。太陽風受到地球的磁場導引直接進入大氣層。當磁暴發生時，在較低的緯度也會出現極光。極光不只在地球上出現，太陽系內的其他一些具有磁場的行星上也有極光[3]。\r\n\r\n在英、法等許多西方語言中，人們遵照伽利略的習慣，直接用奧羅拉（Aurora）女神的名字來稱呼極光現象。');

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
  `event_shelf` int(11) NOT NULL,
  `event_remark` varchar(255) NOT NULL,
  `event_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `event_list`
--

INSERT INTO `event_list` (`event_id`, `event_name`, `event_intro`, `event_intro2`, `event_intro3`, `event_applyStart`, `event_applyEnd`, `event_dateStart`, `event_dateEnd`, `event_price`, `camp_id`, `event_upLimit`, `event_shelf`, `event_remark`, `event_img`) VALUES
(1, '追逐星空的旅程', '有璀璨銀河的營區，是感受耶誕氣氛的最好去處！尤其是無光害的營區，星光佈滿大片黑布，燦爛星空想看多久都沒問題。耶誕佳節將至，親友小聚烤肉、交換禮物，在帳篷外披上耶誕燈就很有感覺。露營樂精選出無光害露營區，晚上烤肉看星星，最適合小團露、親子同行！', '  ', '  ', '2019-03-24', '2019-04-21', '2019-05-18', '2019-05-19', 3000, '1', 40, 1, ' ', 'aurora.jpg'),
(3, 'Family Day 新森活露營趣', '號召車壇最具凝聚力的車主，一同走出戶外徜徉山林，並透過一連串精彩活動內容，緊密連結車主、親子、家人以及品牌之間的深厚情誼，寫下與Subaru的精采故事。', '活動採用全露營擁抱野趣生活的住宿模式，期盼每一位參與車主能夠遠離塵囂，駕馭著自己所鍾愛的Subaru汽車，駛入宛如世外桃源般的「不遠露營度假山莊」，盡情享受一系列精采活動內容，包含專業露營講座、熱情奔放營火晚會、活力四射樂團表演、令人樂不可支互動遊戲、重視團隊精神家庭大地闖關遊戲，Subaru邀請車主們一同參與、體現Subaru「豐富人車生活」的品牌精神。', '  ', '2019-05-05', '2019-06-09', '2019-08-03', '2019-08-04', 4000, '2', 30, 0, ' ', 'familycamping.jpg'),
(6, '女孩的露營派對：專屬女生的Outdoor Party', '是時候擺脫裝備至上、又貴又重的汽車露營（Auto Camping）了，跟著一群名為「蘑菇女孩」的女子露營團隊，帶上實用兼具個人特色的裝備，從搭帳棚到料理、遊戲等，自己一手包辦這場令人興奮的露營吧！', '  ', '  ', '2019-06-01', '2019-06-16', '2019-07-22', '2019-07-23', 4000, '3', 30, 3, ' ● 約 6月下旬開放報名，敬請期待', 'girlspower.jpg'),
(9, '─ 寶貝親子咖 ─', '●自己的帳篷自己搭，讓孩子學會動手做', '  帶著家中小寶貝的把把麻麻，還沒想好要做什麼活動才能讓孩子玩得開心嗎？\r\n\r\n「小松鼠帶你去露營」除了有親子同歡的趣味遊戲、也安排了夜間音樂演唱會、星空電影院等活動，非常適合新手露客們，只要帶著衣服及少少的用品，輕輕鬆鬆就可以出發露營去！\r\n\r\n另外，在這裡孩子們能找到一起開心共樂的玩伴，讓爸媽們放鬆地在一旁聊聊天呢。', '  ', '2019-05-05', '2019-05-19', '2019-06-16', '2019-06-17', 3500, '3', 50, 0, ' gsdffd', 'family.jpg'),
(11, '─ 熱情探險咖 ─', '擁有滿腔熱血的你，不該只是待在舒適的營區而已，快揹著你的行囊、撐起手中的拐杖、一步步地征服高山百岳吧！在合歡山小溪營地中，不只可體驗野營的樂趣，更能獲得登百岳的殊榮，同時，享受無與倫比的絕美景致！ ', '  登山還要自己準備露營裝備，想到這你是不是已經打退堂鼓了呢？別擔心！貼心的「眺躍鳥」只要你準備個人睡袋，其他都已經幫你打點妥當了呢！', '  位於合歡山北峰下約 1 公里處的小溪營地，有冷杉林圍繞、鄰近潺潺溪流，白天可坐臥草皮，眺望雄偉中央山脈群峰，夜晚可躺下仰望如細沙般的星空，從登山口至小溪營地，小小的健行路程僅需 3 公里，跟著教練的腳步調整節奏，保證你也能輕鬆抵達。', '2019-06-16', '2019-06-30', '2019-08-30', '2019-08-31', 4000, '5', 30, 0, ' ', 'advanture.jpg'),
(14, '─ 感性浪漫咖 ─', ' ●星空電影院\r\n', ' ●海上看日出', '小小的微型投影機，就算沒有屏幕也能打在帳篷上，在星空下沒有戲院的包袱，不需要輕聲細語、不會禁止攜帶外食，你可以開懷地大笑、也能感動地大哭，只要緊靠著身旁的家人朋友，就能感受最浪漫的星空電影了。   \r\n如果說夜晚的滿天星空是露營最該享受的浪漫體驗，那你更應該早起看日出，體會那冉冉升起的旭日，延續前晚大自然現象所帶來的美好感動！ \r\n清水斷崖位於花蓮清水山東側，其地勢險峻、絕壁臨海面長達 5 公里非常壯觀，這是行經蘇花公路的必看景點，也是台灣十景之一。來到這裡，你可以體驗在無光害的環境下享受星空露營、更能早', '2019-04-11', '2019-04-26', '2019-06-29', '2019-06-30', 2500, '6', 50, 0, '     ', 'opencinema.jpg'),
(16, '- 誰是小當家 -', '●用美味料裡來一決勝負吧！', '露營活動大部分都需要自己準備餐點，但如果你已經吃膩了單純的烤肉、火鍋，是不是應該來點不一樣的呢？\r\n\r\n讓我們把理所當然的料理變成更有趣的遊戲吧！召集左鄰右舍，每個人或每組負責一道菜色進行 PK 大賽，除了讓餐桌更豐盛外，在比賽的過程中還能讓大家發揮創意、激盪出更多有趣的美味料理，快一起來爭奪特級廚師的寶座吧！', '位於新竹關西鎮的「樸真園」擁有三萬坪的純淨天地，園區堅持三十年的不灑農藥，也讓鳥類、昆蟲等動物自在地穿梭其中 ~\r\n\r\n而這裡也是一處相對奢華便利的露營選擇，除了幫你把烹飪用具都準備好好外，營帳內的環境好像家一般的舒適，最適合給想露營又不希望太奔波狼狽的你，來這片如畫的風景中待上兩天一夜，絕對讓你身心充飽滿滿的能量！', '2019-04-11', '2019-04-26', '2019-06-29', '2019-06-30', 3500, '7', 35, 0, '', 'Junior Chef.jpg'),
(19, '─ 愛玩遊戲咖 ─', '●趣味桌上遊戲，人多人少都能玩', '互動式的遊戲，似乎是一種能快速拉近人與人之間距離的活動了，不論是熟識的朋友、或者初次見面的同團夥伴，只要一起加入戰局就能快速地跳離尷尬無聊的時光，直接讓人熱血沸騰！\r\n\r\n沒有準備道具的你，可以選擇類似殺手遊戲類型的活動，只要有足夠的人數即可進行；當然，如果你的行囊空間足夠的話，可以帶些簡單的撲克牌、桌遊等等，又或者你可以挑選恐怖戳戳樂和超可愛的復古彈珠台等趣味遊戲道具，都可以讓你們在露營的過程中度過好玩又歡樂的時光。', '        ', '2019-04-07', '2019-05-05', '2019-07-20', '2019-07-21', 3000, '1', 20, 0, '    ', 'enjoy.jpg'),
(20, '─ 歡樂歌舞咖 ─', '●即興舞蹈，開心就好', '●森林音樂會響起大自然的絕美樂章', '在阿里山上有一處星空帳篷，沒有城市喧囂，只有兩頂透明帷幕的帳篷，要讓你躺在床上也能望向滿天星斗，這山間的夜晚有盛宴、有美酒，那怎麼能少了助興的音樂呢？\r\n\r\n在豐盛的晚飯後，鄒族藝術家 ─ 不舞就要帶你展開一場夜晚部落音樂會了，平時會有愛熱鬧的大哥、大姐們，與你一同彈吉他、歌唱度過歡樂的夜晚 ~ 如果你很幸運，遇到村落內的特別活動或慶典，那將會是令人開心難忘的一夜呢！', '2019-04-20', '2019-05-20', '2019-07-10', '2019-07-11', 2200, '2', 30, 0, ' ', 'dance-africa-footprint-s1-mask9.jpg'),
(21, 'TOY STORY 4', '  Woody has always been confident about his place in the world and that his priority is taking care of his kid, whether that’s Andy or Bonnie. But when Bonnie adds a reluctant new toy called “Forky” to her room, a road trip adventure alongside old and new', '        ', '        ', '2019-04-01', '2019-04-30', '2019-06-21', '2019-06-21', 300, '2', 100, 0, '    ', 'Toy_Story_4_poster.jpg'),
(22, '一起露營追寶趣', ' 在指定露營地的道館中打贏任一隻佔領的寶可夢，即可獲得資格 ', ' 獲得寶可夢 露營樹懶 一隻 ', ' 粉絲團按讚分享，再送999皮卡丘幣 ', '2019-03-22', '2019-03-31', '2019-04-01', '2019-04-01', 20, '5', 3, 1, ' ', 'pokemon.jpg'),
(23, 'test', 'test', '', '', '2019-04-14', '2019-04-20', '2019-04-30', '2019-04-30', 20, '19', 3, 1, '', 'testing.jpg'),
(24, 'delete', 'delete', '', '', '2019-04-28', '2019-04-30', '2019-05-04', '2019-05-04', 300, '12', 5, 1, '', 'delete.jpg');

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

INSERT INTO `host_infolist` (`host_id`, `host_account`, `host_password`, `host_parkName`, `host_tel`, `host_fax`, `host_email`, `host_address`, `host_intro`, `host_paymentType`, `host_bankName`, `host_bankAddress`, `host_bankIBAN`, `host_bankSWIFT`) VALUES
(1, 'test001', 'admin', '月兔農莊001', '00-0000-0001', '00-0000-0001', 'test001@example.com', '月兔市月兔路001號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路001號', 'IBAN_001', 'SWIFT_001'),
(2, 'test002', 'admin', '月兔農莊002', '00-0000-0002', '00-0000-0002', 'test002@example.com', '月兔市月兔路002號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路002號', 'IBAN_002', 'SWIFT_002'),
(3, 'test003', 'admin', '月兔農莊003', '00-0000-0003', '00-0000-0003', 'test003@example.com', '月兔市月兔路003號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路003號', 'IBAN_003', 'SWIFT_003'),
(4, 'test004', 'admin', '月兔農莊004', '00-0000-0004', '00-0000-0004', 'test004@example.com', '月兔市月兔路004號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路004號', 'IBAN_004', 'SWIFT_004'),
(5, 'test005', 'admin', '月兔農莊005', '00-0000-0005', '00-0000-0005', 'test005@example.com', '月兔市月兔路005號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路005號', 'IBAN_005', 'SWIFT_005'),
(6, 'test006', 'admin', '月兔農莊006', '00-0000-0006', '00-0000-0006', 'test006@example.com', '月兔市月兔路006號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路006號', 'IBAN_006', 'SWIFT_006'),
(7, 'test007', 'admin', '月兔農莊007', '00-0000-0007', '00-0000-0007', 'test007@example.com', '月兔市月兔路007號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路007號', 'IBAN_007', 'SWIFT_007'),
(8, 'test008', 'admin', '月兔農莊008', '00-0000-0008', '00-0000-0008', 'test008@example.com', '月兔市月兔路008號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路008號', 'IBAN_008', 'SWIFT_008'),
(9, 'test009', 'admin', '月兔農莊009', '00-0000-0009', '00-0000-0009', 'test009@example.com', '月兔市月兔路009號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路009號', 'IBAN_009', 'SWIFT_009'),
(10, 'test010', 'admin', '月兔農莊010', '00-0000-0010', '00-0000-0010', 'test010@example.com', '月兔市月兔路010號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路010號', 'IBAN_010', 'SWIFT_010'),
(11, 'test011', 'admin', '月兔農莊011', '00-0000-0011', '00-0000-0011', 'test011@example.com', '月兔市月兔路011號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路011號', 'IBAN_011', 'SWIFT_011'),
(12, 'test012', 'admin', '月兔農莊012', '00-0000-0012', '00-0000-0012', 'test012@example.com', '月兔市月兔路012號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路012號', 'IBAN_012', 'SWIFT_012'),
(13, 'test013', 'admin', '月兔農莊013', '00-0000-0013', '00-0000-0013', 'test013@example.com', '月兔市月兔路013號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路013號', 'IBAN_013', 'SWIFT_013'),
(14, 'test014', 'admin', '月兔農莊014', '00-0000-0014', '00-0000-0014', 'test014@example.com', '月兔市月兔路014號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路014號', 'IBAN_014', 'SWIFT_014'),
(15, 'test015', 'admin', '月兔農莊015', '00-0000-0015', '00-0000-0015', 'test015@example.com', '月兔市月兔路015號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路015號', 'IBAN_015', 'SWIFT_015'),
(16, 'test016', 'admin', '月兔農莊016', '00-0000-0016', '00-0000-0016', 'test016@example.com', '月兔市月兔路016號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路016號', 'IBAN_016', 'SWIFT_016'),
(17, 'test017', 'admin', '月兔農莊017', '00-0000-0017', '00-0000-0017', 'test017@example.com', '月兔市月兔路017號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路017號', 'IBAN_017', 'SWIFT_017'),
(18, 'test018', 'admin', '月兔農莊018', '00-0000-0018', '00-0000-0018', 'test018@example.com', '月兔市月兔路018號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路018號', 'IBAN_018', 'SWIFT_018'),
(19, 'test019', 'admin', '月兔農莊019', '00-0000-0019', '00-0000-0019', 'test019@example.com', '月兔市月兔路019號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路019號', 'IBAN_019', 'SWIFT_019'),
(20, 'test020', 'admin', '月兔農莊020', '00-0000-0020', '00-0000-0020', 'test020@example.com', '月兔市月兔路020號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路020號', 'IBAN_020', 'SWIFT_020'),
(21, 'test021', 'admin', '月兔農莊021', '00-0000-0021', '00-0000-0021', 'test021@example.com', '月兔市月兔路021號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路021號', 'IBAN_021', 'SWIFT_021'),
(22, 'test022', 'admin', '月兔農莊022', '00-0000-0022', '00-0000-0022', 'test022@example.com', '月兔市月兔路022號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路022號', 'IBAN_022', 'SWIFT_022'),
(23, 'test023', 'admin', '月兔農莊023', '00-0000-0023', '00-0000-0023', 'test023@example.com', '月兔市月兔路023號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路023號', 'IBAN_023', 'SWIFT_023'),
(24, 'test024', 'admin', '月兔農莊024', '00-0000-0024', '00-0000-0024', 'test024@example.com', '月兔市月兔路024號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路024號', 'IBAN_024', 'SWIFT_024'),
(25, 'test025', 'admin', '月兔農莊025', '00-0000-0025', '00-0000-0025', 'test025@example.com', '月兔市月兔路025號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路025號', 'IBAN_025', 'SWIFT_025'),
(26, 'test026', 'admin', '月兔農莊026', '00-0000-0026', '00-0000-0026', 'test026@example.com', '月兔市月兔路026號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路026號', 'IBAN_026', 'SWIFT_026'),
(27, 'test027', 'admin', '月兔農莊027', '00-0000-0027', '00-0000-0027', 'test027@example.com', '月兔市月兔路027號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路027號', 'IBAN_027', 'SWIFT_027'),
(28, 'test028', 'admin', '月兔農莊028', '00-0000-0028', '00-0000-0028', 'test028@example.com', '月兔市月兔路028號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路028號', 'IBAN_028', 'SWIFT_028'),
(29, 'test029', 'admin', '月兔農莊029', '00-0000-0029', '00-0000-0029', 'test029@example.com', '月兔市月兔路029號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路029號', 'IBAN_029', 'SWIFT_029'),
(30, 'test030', 'admin', '月兔農莊030', '00-0000-0030', '00-0000-0030', 'test030@example.com', '月兔市月兔路030號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路030號', 'IBAN_030', 'SWIFT_030'),
(31, 'test031', 'admin', '月兔農莊031', '00-0000-0031', '00-0000-0031', 'test031@example.com', '月兔市月兔路031號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路031號', 'IBAN_031', 'SWIFT_031'),
(32, 'test032', 'admin', '月兔農莊032', '00-0000-0032', '00-0000-0032', 'test032@example.com', '月兔市月兔路032號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路032號', 'IBAN_032', 'SWIFT_032'),
(33, 'test033', 'admin', '月兔農莊033', '00-0000-0033', '00-0000-0033', 'test033@example.com', '月兔市月兔路033號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路033號', 'IBAN_033', 'SWIFT_033'),
(34, 'test034', 'admin', '月兔農莊034', '00-0000-0034', '00-0000-0034', 'test034@example.com', '月兔市月兔路034號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路034號', 'IBAN_034', 'SWIFT_034'),
(35, 'test035', 'admin', '月兔農莊035', '00-0000-0035', '00-0000-0035', 'test035@example.com', '月兔市月兔路035號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路035號', 'IBAN_035', 'SWIFT_035'),
(36, 'test036', 'admin', '月兔農莊036', '00-0000-0036', '00-0000-0036', 'test036@example.com', '月兔市月兔路036號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路036號', 'IBAN_036', 'SWIFT_036'),
(37, 'test037', 'admin', '月兔農莊037', '00-0000-0037', '00-0000-0037', 'test037@example.com', '月兔市月兔路037號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路037號', 'IBAN_037', 'SWIFT_037'),
(38, 'test038', 'admin', '月兔農莊038', '00-0000-0038', '00-0000-0038', 'test038@example.com', '月兔市月兔路038號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路038號', 'IBAN_038', 'SWIFT_038'),
(39, 'test039', 'admin', '月兔農莊039', '00-0000-0039', '00-0000-0039', 'test039@example.com', '月兔市月兔路039號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路039號', 'IBAN_039', 'SWIFT_039'),
(40, 'test040', 'admin', '月兔農莊040', '00-0000-0040', '00-0000-0040', 'test040@example.com', '月兔市月兔路040號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路040號', 'IBAN_040', 'SWIFT_040'),
(41, 'test041', 'admin', '月兔農莊041', '00-0000-0041', '00-0000-0041', 'test041@example.com', '月兔市月兔路041號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路041號', 'IBAN_041', 'SWIFT_041'),
(42, 'test042', 'admin', '月兔農莊042', '00-0000-0042', '00-0000-0042', 'test042@example.com', '月兔市月兔路042號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路042號', 'IBAN_042', 'SWIFT_042'),
(43, 'test043', 'admin', '月兔農莊043', '00-0000-0043', '00-0000-0043', 'test043@example.com', '月兔市月兔路043號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路043號', 'IBAN_043', 'SWIFT_043'),
(44, 'test044', 'admin', '月兔農莊044', '00-0000-0044', '00-0000-0044', 'test044@example.com', '月兔市月兔路044號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路044號', 'IBAN_044', 'SWIFT_044'),
(45, 'test045', 'admin', '月兔農莊045', '00-0000-0045', '00-0000-0045', 'test045@example.com', '月兔市月兔路045號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路045號', 'IBAN_045', 'SWIFT_045'),
(46, 'test046', 'admin', '月兔農莊046', '00-0000-0046', '00-0000-0046', 'test046@example.com', '月兔市月兔路046號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路046號', 'IBAN_046', 'SWIFT_046'),
(47, 'test047', 'admin', '月兔農莊047', '00-0000-0047', '00-0000-0047', 'test047@example.com', '月兔市月兔路047號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路047號', 'IBAN_047', 'SWIFT_047'),
(48, 'test048', 'admin', '月兔農莊048', '00-0000-0048', '00-0000-0048', 'test048@example.com', '月兔市月兔路048號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路048號', 'IBAN_048', 'SWIFT_048'),
(49, 'test049', 'admin', '月兔農莊049', '00-0000-0049', '00-0000-0049', 'test049@example.com', '月兔市月兔路049號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路049號', 'IBAN_049', 'SWIFT_049'),
(50, 'test050', 'admin', '月兔農莊050', '00-0000-0050', '00-0000-0050', 'test050@example.com', '月兔市月兔路050號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路050號', 'IBAN_050', 'SWIFT_050'),
(51, 'test051', 'admin', '月兔農莊051', '00-0000-0051', '00-0000-0051', 'test051@example.com', '月兔市月兔路051號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路051號', 'IBAN_051', 'SWIFT_051'),
(52, 'test052', 'admin', '月兔農莊052', '00-0000-0052', '00-0000-0052', 'test052@example.com', '月兔市月兔路052號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路052號', 'IBAN_052', 'SWIFT_052'),
(53, 'test053', 'admin', '月兔農莊053', '00-0000-0053', '00-0000-0053', 'test053@example.com', '月兔市月兔路053號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路053號', 'IBAN_053', 'SWIFT_053'),
(54, 'test054', 'admin', '月兔農莊054', '00-0000-0054', '00-0000-0054', 'test054@example.com', '月兔市月兔路054號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路054號', 'IBAN_054', 'SWIFT_054'),
(55, 'test055', 'admin', '月兔農莊055', '00-0000-0055', '00-0000-0055', 'test055@example.com', '月兔市月兔路055號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路055號', 'IBAN_055', 'SWIFT_055'),
(56, 'test056', 'admin', '月兔農莊056', '00-0000-0056', '00-0000-0056', 'test056@example.com', '月兔市月兔路056號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路056號', 'IBAN_056', 'SWIFT_056'),
(57, 'test057', 'admin', '月兔農莊057', '00-0000-0057', '00-0000-0057', 'test057@example.com', '月兔市月兔路057號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路057號', 'IBAN_057', 'SWIFT_057'),
(58, 'test058', 'admin', '月兔農莊058', '00-0000-0058', '00-0000-0058', 'test058@example.com', '月兔市月兔路058號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路058號', 'IBAN_058', 'SWIFT_058'),
(59, 'test059', 'admin', '月兔農莊059', '00-0000-0059', '00-0000-0059', 'test059@example.com', '月兔市月兔路059號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路059號', 'IBAN_059', 'SWIFT_059'),
(60, 'test060', 'admin', '月兔農莊060', '00-0000-0060', '00-0000-0060', 'test060@example.com', '月兔市月兔路060號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路060號', 'IBAN_060', 'SWIFT_060'),
(61, 'test061', 'admin', '月兔農莊061', '00-0000-0061', '00-0000-0061', 'test061@example.com', '月兔市月兔路061號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路061號', 'IBAN_061', 'SWIFT_061'),
(62, 'test062', 'admin', '月兔農莊062', '00-0000-0062', '00-0000-0062', 'test062@example.com', '月兔市月兔路062號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路062號', 'IBAN_062', 'SWIFT_062'),
(63, 'test063', 'admin', '月兔農莊063', '00-0000-0063', '00-0000-0063', 'test063@example.com', '月兔市月兔路063號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路063號', 'IBAN_063', 'SWIFT_063'),
(64, 'test064', 'admin', '月兔農莊064', '00-0000-0064', '00-0000-0064', 'test064@example.com', '月兔市月兔路064號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路064號', 'IBAN_064', 'SWIFT_064'),
(65, 'test065', 'admin', '月兔農莊065', '00-0000-0065', '00-0000-0065', 'test065@example.com', '月兔市月兔路065號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路065號', 'IBAN_065', 'SWIFT_065'),
(66, 'test066', 'admin', '月兔農莊066', '00-0000-0066', '00-0000-0066', 'test066@example.com', '月兔市月兔路066號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路066號', 'IBAN_066', 'SWIFT_066'),
(67, 'test067', 'admin', '月兔農莊067', '00-0000-0067', '00-0000-0067', 'test067@example.com', '月兔市月兔路067號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路067號', 'IBAN_067', 'SWIFT_067'),
(68, 'test068', 'admin', '月兔農莊068', '00-0000-0068', '00-0000-0068', 'test068@example.com', '月兔市月兔路068號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路068號', 'IBAN_068', 'SWIFT_068'),
(69, 'test069', 'admin', '月兔農莊069', '00-0000-0069', '00-0000-0069', 'test069@example.com', '月兔市月兔路069號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路069號', 'IBAN_069', 'SWIFT_069'),
(70, 'test070', 'admin', '月兔農莊070', '00-0000-0070', '00-0000-0070', 'test070@example.com', '月兔市月兔路070號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路070號', 'IBAN_070', 'SWIFT_070'),
(71, 'test071', 'admin', '月兔農莊071', '00-0000-0071', '00-0000-0071', 'test071@example.com', '月兔市月兔路071號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路071號', 'IBAN_071', 'SWIFT_071'),
(72, 'test072', 'admin', '月兔農莊072', '00-0000-0072', '00-0000-0072', 'test072@example.com', '月兔市月兔路072號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路072號', 'IBAN_072', 'SWIFT_072'),
(73, 'test073', 'admin', '月兔農莊073', '00-0000-0073', '00-0000-0073', 'test073@example.com', '月兔市月兔路073號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路073號', 'IBAN_073', 'SWIFT_073'),
(74, 'test074', 'admin', '月兔農莊074', '00-0000-0074', '00-0000-0074', 'test074@example.com', '月兔市月兔路074號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路074號', 'IBAN_074', 'SWIFT_074'),
(75, 'test075', 'admin', '月兔農莊075', '00-0000-0075', '00-0000-0075', 'test075@example.com', '月兔市月兔路075號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路075號', 'IBAN_075', 'SWIFT_075'),
(76, 'test076', 'admin', '月兔農莊076', '00-0000-0076', '00-0000-0076', 'test076@example.com', '月兔市月兔路076號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路076號', 'IBAN_076', 'SWIFT_076'),
(77, 'test077', 'admin', '月兔農莊077', '00-0000-0077', '00-0000-0077', 'test077@example.com', '月兔市月兔路077號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路077號', 'IBAN_077', 'SWIFT_077'),
(78, 'test078', 'admin', '月兔農莊078', '00-0000-0078', '00-0000-0078', 'test078@example.com', '月兔市月兔路078號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路078號', 'IBAN_078', 'SWIFT_078'),
(79, 'test079', 'admin', '月兔農莊079', '00-0000-0079', '00-0000-0079', 'test079@example.com', '月兔市月兔路079號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路079號', 'IBAN_079', 'SWIFT_079'),
(80, 'test080', 'admin', '月兔農莊080', '00-0000-0080', '00-0000-0080', 'test080@example.com', '月兔市月兔路080號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路080號', 'IBAN_080', 'SWIFT_080'),
(81, 'test081', 'admin', '月兔農莊081', '00-0000-0081', '00-0000-0081', 'test081@example.com', '月兔市月兔路081號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路081號', 'IBAN_081', 'SWIFT_081'),
(82, 'test082', 'admin', '月兔農莊082', '00-0000-0082', '00-0000-0082', 'test082@example.com', '月兔市月兔路082號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路082號', 'IBAN_082', 'SWIFT_082'),
(83, 'test083', 'admin', '月兔農莊083', '00-0000-0083', '00-0000-0083', 'test083@example.com', '月兔市月兔路083號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路083號', 'IBAN_083', 'SWIFT_083'),
(84, 'test084', 'admin', '月兔農莊084', '00-0000-0084', '00-0000-0084', 'test084@example.com', '月兔市月兔路084號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路084號', 'IBAN_084', 'SWIFT_084'),
(85, 'test085', 'admin', '月兔農莊085', '00-0000-0085', '00-0000-0085', 'test085@example.com', '月兔市月兔路085號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路085號', 'IBAN_085', 'SWIFT_085'),
(86, 'test086', 'admin', '月兔農莊086', '00-0000-0086', '00-0000-0086', 'test086@example.com', '月兔市月兔路086號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路086號', 'IBAN_086', 'SWIFT_086'),
(87, 'test087', 'admin', '月兔農莊087', '00-0000-0087', '00-0000-0087', 'test087@example.com', '月兔市月兔路087號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路087號', 'IBAN_087', 'SWIFT_087'),
(88, 'test088', 'admin', '月兔農莊088', '00-0000-0088', '00-0000-0088', 'test088@example.com', '月兔市月兔路088號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路088號', 'IBAN_088', 'SWIFT_088'),
(89, 'test089', 'admin', '月兔農莊089', '00-0000-0089', '00-0000-0089', 'test089@example.com', '月兔市月兔路089號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路089號', 'IBAN_089', 'SWIFT_089'),
(90, 'test090', 'admin', '月兔農莊090', '00-0000-0090', '00-0000-0090', 'test090@example.com', '月兔市月兔路090號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路090號', 'IBAN_090', 'SWIFT_090'),
(91, 'test091', 'admin', '月兔農莊091', '00-0000-0091', '00-0000-0091', 'test091@example.com', '月兔市月兔路091號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路091號', 'IBAN_091', 'SWIFT_091'),
(92, 'test092', 'admin', '月兔農莊092', '00-0000-0092', '00-0000-0092', 'test092@example.com', '月兔市月兔路092號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路092號', 'IBAN_092', 'SWIFT_092'),
(93, 'test093', 'admin', '月兔農莊093', '00-0000-0093', '00-0000-0093', 'test093@example.com', '月兔市月兔路093號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路093號', 'IBAN_093', 'SWIFT_093'),
(94, 'test094', 'admin', '月兔農莊094', '00-0000-0094', '00-0000-0094', 'test094@example.com', '月兔市月兔路094號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路094號', 'IBAN_094', 'SWIFT_094'),
(95, 'test095', 'admin', '月兔農莊095', '00-0000-0095', '00-0000-0095', 'test095@example.com', '月兔市月兔路095號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路095號', 'IBAN_095', 'SWIFT_095'),
(96, 'test096', 'admin', '月兔農莊096', '00-0000-0096', '00-0000-0096', 'test096@example.com', '月兔市月兔路096號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路096號', 'IBAN_096', 'SWIFT_096'),
(97, 'test097', 'admin', '月兔農莊097', '00-0000-0097', '00-0000-0097', 'test097@example.com', '月兔市月兔路097號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路097號', 'IBAN_097', 'SWIFT_097'),
(98, 'test098', 'admin', '月兔農莊098', '00-0000-0098', '00-0000-0098', 'test098@example.com', '月兔市月兔路098號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路098號', 'IBAN_098', 'SWIFT_098'),
(99, 'test099', 'admin', '月兔農莊099', '00-0000-0099', '00-0000-0099', 'test099@example.com', '月兔市月兔路099號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路099號', 'IBAN_099', 'SWIFT_099'),
(100, 'test100', 'admin', '月兔農莊100', '00-0000-0100', '00-0000-0100', 'test100@example.com', '月兔市月兔路100號', 'Welcome to Tsuki campsite!', '電匯', 'Tsuki', '月兔市月兔路100號', 'IBAN_100', 'SWIFT_100');

-- --------------------------------------------------------

--
-- 資料表結構 `host_list`
--

CREATE TABLE `host_list` (
  `host_id` int(11) NOT NULL COMMENT '流水號',
  `host_acc` varchar(255) NOT NULL COMMENT '帳戶',
  `host_pwd` varchar(255) NOT NULL COMMENT '密碼',
  `host_incName` varchar(255) NOT NULL COMMENT '公司名稱',
  `host_incVat` varchar(255) DEFAULT NULL COMMENT '公司統編',
  `host_incTel` varchar(255) NOT NULL COMMENT '公司電話',
  `host_incFax` varchar(255) DEFAULT NULL COMMENT '公司傳真',
  `host_incEmail` varchar(255) NOT NULL COMMENT '公司信箱',
  `host_incAdd` varchar(255) NOT NULL COMMENT '公司地址',
  `host_bankName` varchar(255) NOT NULL COMMENT '公司戶名',
  `host_bankAcc` varchar(255) NOT NULL COMMENT '公司帳戶'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='營地主公司資料';

--
-- 資料表的匯出資料 `host_list`
--

INSERT INTO `host_list` (`host_id`, `host_acc`, `host_pwd`, `host_incName`, `host_incVat`, `host_incTel`, `host_incFax`, `host_incEmail`, `host_incAdd`, `host_bankName`, `host_bankAcc`) VALUES
(1, 'GoCampHost_001', '43390999', '捷拓股份有限公司', '26397139', '02-4218-4929', '02-6919-7954', 'GoCampHost_001@gmail.com', '台北市中山區八德路二段205號', '方向陽', '048-7386-219-733459'),
(2, 'GoCampHost_002', '68567452', '網擎股份有限公司', '78229474', '03-6358-7552', '03-7808-4753', 'GoCampHost_002@gmail.com', '台北市中山區八德路二段206號', '史暖怡', '014-4757-121-609616'),
(3, 'GoCampHost_003', '28723986', '博西股份有限公司', '86340442', '037-8930-6437', '037-2238-7957', 'GoCampHost_003@gmail.com', '台北市中山區八德路二段207號', '司晉玉', '089-6305-494-735404'),
(4, 'GoCampHost_004', '18606872', '永豐餘股份有限公司', '73845316', '04-6182-2196', '04-2653-3520', 'GoCampHost_004@gmail.com', '台北市中山區八德路二段208號', '石安雁', '062-3634-220-478922'),
(5, 'GoCampHost_005', '57219054', '璉柏有限公司', '48248069', '049-1566-4063', '049-5864-5056', 'GoCampHost_005@gmail.com', '台北市中山區八德路二段209號', '任瑜莉', '064-7250-459-296445'),
(6, 'GoCampHost_006', '96655611', '帕奇巨有限公司', '66267765', '05-3473-9419', '05-7334-3596', 'GoCampHost_006@gmail.com', '台北市中山區八德路二段210號', '向和煦', '078-6956-174-641859'),
(7, 'GoCampHost_007', '17888562', '太子天一有限公司', '62120785', '06-3655-3347', '06-6229-1628', 'GoCampHost_007@gmail.com', '台北市中山區八德路二段211號', '池代柔', '087-3199-201-259501'),
(8, 'GoCampHost_008', '26340256', '金嗓股份有限公司', '96423810', '07-1639-6783', '07-6056-6438', 'GoCampHost_008@gmail.com', '台北市中山區八德路二段212號', '余英奕', '080-1208-721-286824'),
(9, 'GoCampHost_009', '82683584', '佑齡股份有限公司', '41447043', '08-8383-1541', '08-7462-5349', 'GoCampHost_009@gmail.com', '台北市中山區八德路二段213號', '利濮存', '060-1761-853-780706'),
(10, 'GoCampHost_010', '37370467', '信馨股份有限公司', '84744826', '089-2295-7009', '089-9823-6659', 'GoCampHost_010@gmail.com', '台北市中山區八德路二段214號', '扶麗英', '040-4772-803-366015'),
(11, 'GoCampHost_011', '97252241', '晶相股份有限公司', '30932506', '0836-1620-9904', '0836-3261-9086', 'GoCampHost_011@gmail.com', '台北市中山區八德路二段215號', '李子軒', '022-8000-950-938380'),
(12, 'GoCampHost_012', '75386204', '大創股份有限公司', '15397382', '082-8634-6490', '082-4858-8348', 'GoCampHost_012@gmail.com', '台北市中山區八德路二段216號', '林芷茹', '012-8561-844-608297'),
(13, 'GoCampHost_013', '42106776', '智趣王股份有限公司', '48399888', '02-1672-7589', '02-7918-5526', 'GoCampHost_013@gmail.com', '台北市中山區八德路二段217號', '厙海女', '034-3493-911-276466'),
(14, 'GoCampHost_014', '45530316', '興社股份有限公司', '92639659', '03-6412-5265', '03-2110-6839', 'GoCampHost_014@gmail.com', '台北市中山區八德路二段218號', '厙寒雁', '03-1897-254-215348'),
(15, 'GoCampHost_015', '37164290', '紳暉股份有限公司', '50283440', '037-7404-5937', '037-4774-3905', 'GoCampHost_015@gmail.com', '台北市中山區八德路二段219號', '相天悅', '024-3687-300-291527'),
(16, 'GoCampHost_016', '96170381', '永儲股份有限公司', '85719462', '04-5521-3263', '04-7430-7892', 'GoCampHost_016@gmail.com', '台北市中山區八德路二段220號', '范子晉', '041-9515-819-478142'),
(17, 'GoCampHost_017', '30953390', '亞中股份有限公司 ', '76782228', '049-4854-5726', '049-7300-4987', 'GoCampHost_017@gmail.com', '台北市中山區八德路二段221號', '孫奇致', '068-1202-582-620001'),
(18, 'GoCampHost_018', '82852032', '惠而強股份有限公司', '33099678', '05-3102-8969', '05-1774-4791', 'GoCampHost_018@gmail.com', '台北市中山區八德路二段222號', '宰樂生', '039-6807-827-731165'),
(19, 'GoCampHost_019', '97496892', '宏觀股份有限公司', '50400919', '06-2246-9745', '06-4482-2526', 'GoCampHost_019@gmail.com', '台北市中山區八德路二段223號', '師詩槐', '036-3751-835-578069'),
(20, 'GoCampHost_020', '24484345', '得洲股份有限公司', '94871790', '07-3792-5431', '07-1460-4092', 'GoCampHost_020@gmail.com', '台北市中山區八德路二段224號', '桓妙海', '08-8423-870-708150'),
(21, 'GoCampHost_021', '49318169', '長泓股份有限公司', '15009114', '08-7637-3109', '08-5348-3018', 'GoCampHost_021@gmail.com', '台北市中山區八德路二段225號', '班紫菱', '097-3974-704-692717'),
(22, 'GoCampHost_022', '83255481', '塞席股份有限公司', '34312233', '089-7536-6881', '089-4784-8565', 'GoCampHost_022@gmail.com', '台北市中山區八德路二段226號', '耿冬雪', '091-3055-112-949875'),
(23, 'GoCampHost_023', '95798992', '瑞基股份有限公司', '82882901', '0836-8894-6405', '0836-4038-2438', 'GoCampHost_023@gmail.com', '台北市中山區八德路二段227號', '茹清馨', '099-6120-422-603564'),
(24, 'GoCampHost_024', '91664434', '說酒人有限公司', '50844490', '082-5228-4239', '082-7244-1484', 'GoCampHost_024@gmail.com', '台北市中山區八德路二段228號', '宿懷玉', '05-7311-309-701973'),
(25, 'GoCampHost_025', '93066506', '巨研股份有限公司', '52457646', '02-6401-2862', '02-9858-3525', 'GoCampHost_025@gmail.com', '台北市中山區八德路二段229號', '巢俊茂', '091-2600-112-377191'),
(26, 'GoCampHost_026', '37470021', '麗鋼股份有限公司', '54533665', '03-2995-9957', '03-3511-7127', 'GoCampHost_026@gmail.com', '台北市中山區八德路二段230號', '扈鋅希', '027-8448-753-728273'),
(27, 'GoCampHost_027', '43395831', '傳奇股份有限公司', '72948721', '037-9792-6087', '037-4401-3981', 'GoCampHost_027@gmail.com', '台北市中山區八德路二段231號', '梁博藝', '024-8784-738-349746'),
(28, 'GoCampHost_028', '58996130', '康翔股份有限公司', '18311936', '04-5770-5987', '04-9924-1579', 'GoCampHost_028@gmail.com', '台北市中山區八德路二段232號', '梁慕兒', '059-5682-321-678697'),
(29, 'GoCampHost_029', '47897650', '羅得股份有限公司', '32270849', '049-2392-5371', '049-6940-9962', 'GoCampHost_029@gmail.com', '台北市中山區八德路二段233號', '莘子璿', '040-8468-675-890211'),
(30, 'GoCampHost_030', '75253180', '元鐙股份有限公司', '38735493', '05-6343-8233', '05-4130-2983', 'GoCampHost_030@gmail.com', '台北市中山區八德路二段234號', '莘君浩', '051-8032-555-756996'),
(31, 'GoCampHost_031', '68673431', '鑫創股份有限公司', '91447685', '06-1320-7551', '06-9384-8362', 'GoCampHost_031@gmail.com', '台北市中山區八德路二段235號', '惠浩廣', '011-9211-606-232101'),
(32, 'GoCampHost_032', '48195900', '川王股份有限公司', '15729007', '07-7753-3322', '07-8377-2994', 'GoCampHost_032@gmail.com', '台北市中山區八德路二段236號', '惠蘊藉', '09-9790-997-547286'),
(33, 'GoCampHost_033', '56752829', '微杏有限公司', '88307594', '08-7510-3632', '08-6560-9918', 'GoCampHost_033@gmail.com', '台北市中山區八德路二段237號', '焦意智', '051-9698-147-870856'),
(34, 'GoCampHost_034', '73346535', '保來得股份有限公司', '57286797', '089-1508-4646', '089-1877-3904', 'GoCampHost_034@gmail.com', '台北市中山區八德路二段238號', '越鴻才', '099-4388-396-809748'),
(35, 'GoCampHost_035', '35323697', '雲巖股份有限公司', '17795805', '0836-2481-5095', '0836-1702-3834', 'GoCampHost_035@gmail.com', '台北市中山區八德路二段239號', '訾雅珺', '064-7228-589-503269'),
(36, 'GoCampHost_036', '75460494', '西富股份有限公司', '82966382', '082-6598-5277', '082-9694-1721', 'GoCampHost_036@gmail.com', '台北市中山區八德路二段240號', '雍文彥', '099-4487-467-926842'),
(37, 'GoCampHost_037', '49155928', '凱誠有限公司', '42371868', '02-4825-2401', '02-3067-4946', 'GoCampHost_037@gmail.com', '台北市中山區八德路二段241號', '廖建樹', '035-3486-429-987315'),
(38, 'GoCampHost_038', '67807269', '安華股份有限公司', '94406486', '03-4264-1656', '03-8282-8937', 'GoCampHost_038@gmail.com', '台北市中山區八德路二段242號', '漕雅志', '018-5915-916-525021'),
(39, 'GoCampHost_039', '70485793', '灣谷米有限公司', '26979183', '037-6746-7222', '037-3635-8119', 'GoCampHost_039@gmail.com', '台北市中山區八德路二段243號', '甄思敏', '037-7040-809-873213'),
(40, 'GoCampHost_040', '83315666', '創新有限公司', '90542303', '04-6237-4721', '04-1302-5425', 'GoCampHost_040@gmail.com', '台北市中山區八德路二段244號', '暴宜春', '09-7407-225-240974'),
(41, 'GoCampHost_041', '30314601', '大日股份有限公司', '89600245', '049-1614-1855', '049-8346-1722', 'GoCampHost_041@gmail.com', '台北市中山區八德路二段245號', '潘陽榮', '064-8849-770-115637'),
(42, 'GoCampHost_042', '24448710', '秀得美股份有限公司', '29555947', '05-7192-9441', '05-7342-8316', 'GoCampHost_042@gmail.com', '台北市中山區八德路二段246號', '蔡秀敏', '035-5406-867-881329'),
(43, 'GoCampHost_043', '87927041', '世純股份有限公司', '72739774', '06-8070-1457', '06-8659-1345', 'GoCampHost_043@gmail.com', '台北市中山區八德路二段247號', '燕高潔', '08-7049-271-839268'),
(44, 'GoCampHost_044', '25623369', '堤維西股份有限公司', '15825162', '07-1931-9339', '07-7001-1895', 'GoCampHost_044@gmail.com', '台北市中山區八德路二段248號', '薛飛舟', '074-2149-193-404807'),
(45, 'GoCampHost_045', '41772923', '東鉅實業有限公司', '53297975', '08-7077-5614', '08-4233-8777', 'GoCampHost_045@gmail.com', '台北市中山區八德路二段249號', '簡琬玲', '093-4280-952-156953'),
(46, 'GoCampHost_046', '62997932', '台強股份有限公司', '82162381', '089-8087-4959', '089-8084-8306', 'GoCampHost_046@gmail.com', '台北市中山區八德路二段250號', '懷念柏', '014-6143-309-959767'),
(47, 'GoCampHost_047', '83173788', '珍苑股份有限公司', '36796218', '0836-8947-8078', '0836-9506-4875', 'GoCampHost_047@gmail.com', '台北市中山區八德路二段251號', '懷修永', '070-3127-176-536129'),
(48, 'GoCampHost_048', '64363980', '辰昇科技有限公司', '84176918', '082-9995-7457', '082-1776-4949', 'GoCampHost_048@gmail.com', '台北市中山區八德路二段252號', '麴半夢', '09-9426-767-217550'),
(49, 'GoCampHost_049', '64954179', '禮來股份有限公司', '12304297', '02-7161-4486', '02-5960-7176', 'GoCampHost_049@gmail.com', '台北市中山區八德路二段253號', '饒飛翼', '042-7109-155-582818'),
(50, 'GoCampHost_050', '16228929', '台盈有限公司', '93712545', '03-5256-1717', '03-4380-5615', 'GoCampHost_050@gmail.com', '台北市中山區八德路二段254號', '顧凱安', '025-6236-884-206531');

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
(8, 'testcow', 'admin', '', 'ms cow', 'cow mama', 'female', '2018-03-01', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:20:06'),
(10, 'testhorse', 'admin', '', 'mr horse', 'ponny', 'male', '2018-05-01', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:23:38'),
(11, 'testsheep', 'admin', '', 'ms sheep', 'mary', 'female', '2018-05-06', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '2019-03-18 11:24:07'),
(12, 'testmonkey', 'admin', '', 'mr monkey', 'wuwu', 'male', '2001-04-18', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '0000-00-00 00:00:00'),
(13, 'testchicken', 'admin', '', 'mr chiecken', 'gugugu', 'male', '2008-06-17', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '0000-00-00 00:00:00'),
(14, 'testfrog', 'admin', '', 'ms frog', 'queen frog', 'female', '2001-02-28', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 0, 'valid', '0000-00-00 00:00:00'),
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
(181, 'Rafiki', 'admin', '', '拉菲其', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:18:39'),
(182, 'mufasa', 'admin', '', '木法沙', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:20:28'),
(183, 'carl', 'admin', '', '卡爾爺爺', '', 'male', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:22:12'),
(184, 'ellie', 'admin', '', '愛莉奶奶', '', 'female', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 3, 'valid', '2019-04-04 16:23:32'),
(185, 'bambi', 'admin', '', '小鹿斑比', '', 'female', '0000-00-00', '0912345678', 'sammie0804@gms.tku.edu.tw', '', 1, 'valid', '2019-04-04 16:27:23'),
(186, 'sadness', 'admin', 'avatar_pictures/13ef1c2758e034dd005d6ba5d269f700e07b280a.jpg', '憂憂', '', 'female', '0000-00-00', '0977777777', 'sammie0804@gms.tku.edu.tw', '106台北市大安區忠孝東路四段205巷26弄', 2, 'valid', '2019-04-08 09:24:36'),
(187, 'pompompurin', 'admin', 'avatar_pictures/ef65266143830284ede15888beb086bf613592dc.jpg', '布丁狗', '', 'male', '0000-00-00', '0912345678', 'ppp0416@gmail.com', '104台北市中山區民生東路二段90巷4號', 1, 'valid', '2019-05-16 10:36:42');

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
(13, 'dsa', 3000, 10, 2, '2019-03-28', '2019-03-29'),
(14, 'bds', 300, 10, 1, '2019-04-17', '2019-04-16');

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
(9, 's', 3, 33, 2, '2018-07-22', '2018-07-22');

-- --------------------------------------------------------

--
-- 資料表結構 `promo_apply`
--

CREATE TABLE `promo_apply` (
  `promo_apply_id` int(11) NOT NULL,
  `promo_type` varchar(255) NOT NULL,
  `apply_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `apply_valid` int(11) NOT NULL DEFAULT '1',
  `camp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `promo_apply`
--

INSERT INTO `promo_apply` (`promo_apply_id`, `promo_type`, `apply_date`, `apply_valid`, `camp_id`) VALUES
(2, 'promo_campType', '2019-05-14 16:01:06', 2, 3),
(3, 'promo_price', '2019-05-14 16:01:13', 2, 12),
(4, 'promo_campType', '2019-05-14 16:01:19', 1, 15),
(6, 'promo_user', '2019-05-14 18:36:47', 1, 11);

-- --------------------------------------------------------

--
-- 資料表結構 `promo_camptype`
--

CREATE TABLE `promo_camptype` (
  `promo_id` int(11) NOT NULL,
  `promo_name` varchar(255) NOT NULL,
  `requirement` int(11) NOT NULL,
  `discount_unit` int(11) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `promo_camptype`
--

INSERT INTO `promo_camptype` (`promo_id`, `promo_name`, `requirement`, `discount_unit`, `discount_type`, `start`, `end`, `discription`) VALUES
(1, '營地類型3優惠', 3, 200, 'currency', '2019-06-07', '2019-07-12', '營地類型3優惠'),
(2, '營地類型2優惠', 2, 500, 'currency', '2019-06-17', '2019-07-12', '營地類型2優惠'),
(3, '營地類型1優惠', 1, 300, 'currency', '2019-05-14', '2019-05-14', '營地類型1優惠');

-- --------------------------------------------------------

--
-- 資料表結構 `promo_price`
--

CREATE TABLE `promo_price` (
  `promo_id` int(11) NOT NULL,
  `promo_name` varchar(255) NOT NULL,
  `requirement` int(11) NOT NULL,
  `discount_unit` int(11) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `promo_price`
--

INSERT INTO `promo_price` (`promo_id`, `promo_name`, `requirement`, `discount_unit`, `discount_type`, `start`, `end`, `discription`) VALUES
(1, '滿3000折200', 3000, 200, 'currency', '2019-06-07', '2019-07-12', '活動期間訂單滿3000現折200'),
(2, '滿6000折500', 6000, 500, 'currency', '2019-06-17', '2019-07-12', '活動期間訂單滿6000現折500'),
(3, '吃烤肉', 0, 9, 'percentage', '2019-05-23', '2019-06-06', '親子同樂 感情增溫');

-- --------------------------------------------------------

--
-- 資料表結構 `promo_user`
--

CREATE TABLE `promo_user` (
  `promo_id` int(11) NOT NULL,
  `promo_name` varchar(255) NOT NULL,
  `requirement` int(11) NOT NULL,
  `discount_unit` int(11) NOT NULL,
  `discount_type` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `promo_user`
--

INSERT INTO `promo_user` (`promo_id`, `promo_name`, `requirement`, `discount_unit`, `discount_type`, `start`, `end`, `discription`) VALUES
(8, '等級3優惠', 3, 22, 'percentage', '2018-07-22', '2018-07-22', 'anan'),
(9, '等級1優惠', 1, 10, 'percentage', '2018-07-22', '2018-07-22', 'test'),
(22, '等級2優惠', 2, 79, 'percentage', '2019-05-14', '2019-05-14', 'test');

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
(151, 'sale_pictures/bba4a2172e8edfe9c56e56e346d8913d4ec76fc6.png', '【冷凍店取-寶來發】花雕雞肉粽(185g*4)', 807, '888', '888', '888', 1, '特選肉質鮮嫩、口感極佳且經CAS品質認證之雞腿肉(去骨去皮)，以陳年花雕酒醃漬四十八小時入味，搭配上等干貝海洋珍品，以及栗子、香菇、', '<p>特選肉質鮮嫩、口感極佳且經CAS品質認證之雞腿肉(去骨去皮)，以陳年花雕酒醃漬四十八小時入味，搭配上等干貝海洋珍品，以及栗子、香菇、</p>\r\n', '', '', '', 2, '2'),
(152, 'sale_pictures/48fbac0493c0a9c5ba7b096028ebadb558d20180.jpg', '中午吃漢堡王', 5, '500', '300', '150', 0, '雙人套餐熱賣中', '<p>漢堡王特價喔!!!!</p>\r\n', '', '', '', 3, '3');

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
-- 資料表索引 `campsite_type`
--
ALTER TABLE `campsite_type`
  ADD PRIMARY KEY (`campArea_id`);

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`),
  ADD UNIQUE KEY `code` (`coupon_code`);

--
-- 資料表索引 `coupon_gain`
--
ALTER TABLE `coupon_gain`
  ADD PRIMARY KEY (`gain_record_id`),
  ADD UNIQUE KEY `code` (`coupon_code`);

--
-- 資料表索引 `coupon_genre`
--
ALTER TABLE `coupon_genre`
  ADD PRIMARY KEY (`coupon_genre_id`);

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
-- 資料表索引 `host_list`
--
ALTER TABLE `host_list`
  ADD PRIMARY KEY (`host_id`),
  ADD UNIQUE KEY `host_acc` (`host_acc`),
  ADD UNIQUE KEY `host_incName` (`host_incName`);

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
  ADD UNIQUE KEY `mem_account` (`mem_account`) USING BTREE;

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
-- 資料表索引 `promo_apply`
--
ALTER TABLE `promo_apply`
  ADD PRIMARY KEY (`promo_apply_id`);

--
-- 資料表索引 `promo_camptype`
--
ALTER TABLE `promo_camptype`
  ADD PRIMARY KEY (`promo_id`),
  ADD UNIQUE KEY `user_level` (`requirement`);

--
-- 資料表索引 `promo_price`
--
ALTER TABLE `promo_price`
  ADD PRIMARY KEY (`promo_id`),
  ADD UNIQUE KEY `user_level` (`requirement`);

--
-- 資料表索引 `promo_user`
--
ALTER TABLE `promo_user`
  ADD PRIMARY KEY (`promo_id`),
  ADD UNIQUE KEY `user_level` (`requirement`);

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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `amount_plan`
--
ALTER TABLE `amount_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表 AUTO_INCREMENT `campsite_image`
--
ALTER TABLE `campsite_image`
  MODIFY `campImg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '圖片編號', AUTO_INCREMENT=43;

--
-- 使用資料表 AUTO_INCREMENT `campsite_list`
--
ALTER TABLE `campsite_list`
  MODIFY `camp_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '營地編號', AUTO_INCREMENT=62;

--
-- 使用資料表 AUTO_INCREMENT `campsite_type`
--
ALTER TABLE `campsite_type`
  MODIFY `campArea_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '營區區域編號', AUTO_INCREMENT=15;

--
-- 使用資料表 AUTO_INCREMENT `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- 使用資料表 AUTO_INCREMENT `coupon_gain`
--
ALTER TABLE `coupon_gain`
  MODIFY `gain_record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `coupon_genre`
--
ALTER TABLE `coupon_genre`
  MODIFY `coupon_genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- 使用資料表 AUTO_INCREMENT `dis_type`
--
ALTER TABLE `dis_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表 AUTO_INCREMENT `event_applylist`
--
ALTER TABLE `event_applylist`
  MODIFY `applyList_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- 使用資料表 AUTO_INCREMENT `event_feedback`
--
ALTER TABLE `event_feedback`
  MODIFY `eventFB_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `event_list`
--
ALTER TABLE `event_list`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表 AUTO_INCREMENT `host_infolist`
--
ALTER TABLE `host_infolist`
  MODIFY `host_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=101;

--
-- 使用資料表 AUTO_INCREMENT `host_list`
--
ALTER TABLE `host_list`
  MODIFY `host_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=52;

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
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=188;

--
-- 使用資料表 AUTO_INCREMENT `price_plan`
--
ALTER TABLE `price_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表 AUTO_INCREMENT `prod_plan`
--
ALTER TABLE `prod_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表 AUTO_INCREMENT `promo_apply`
--
ALTER TABLE `promo_apply`
  MODIFY `promo_apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表 AUTO_INCREMENT `promo_camptype`
--
ALTER TABLE `promo_camptype`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `promo_price`
--
ALTER TABLE `promo_price`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `promo_user`
--
ALTER TABLE `promo_user`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `salepage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品流水號', AUTO_INCREMENT=153;

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
