-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-09-24 22:03:45
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `bk_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `index_photo`
--

CREATE TABLE `index_photo` (
  `id` int(11) NOT NULL COMMENT 'id',
  `title` varchar(100) NOT NULL COMMENT '照片title',
  `photo_path` text NOT NULL COMMENT '照片路徑',
  `username` varchar(100) NOT NULL COMMENT 'po文者名稱',
  `userid` int(11) NOT NULL COMMENT 'po文者id',
  `content_one` text NOT NULL COMMENT '照片第一段內文',
  `content_two` text NOT NULL COMMENT '照片第二段內文',
  `create_time` datetime NOT NULL COMMENT '上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `index_photo`
--

INSERT INTO `index_photo` (`id`, `title`, `photo_path`, `username`, `userid`, `content_one`, `content_two`, `create_time`) VALUES
(1, '去夏威夷玩時的照片', 'img/圖片4.jpg', 'Bokai', 1, '大學以及研究所就讀大氣科學系，除了簡單的天氣分析以及預報外，也同時 學到許多在於研究以及應用上的知識與技巧，如：空氣汙染概論、大氣動力學、天氣學、數值天氣預報、大氣測計學等。', '大學期間擔任過校內氣象台的主播，加強對於天氣預報及天氣分析的訓練，不只要將未來的天氣概況做個簡單的預報，並要練習上台講話的台風。研究所期間與實驗室同仁一同參與過許多大大小小的實驗計畫，如西南氣流實驗及雙北暴雨實驗，這些經驗令我體會團隊合作以及團隊討論是進步最快的捷徑。', '2019-08-09 04:14:25');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `index_photo`
--
ALTER TABLE `index_photo`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `index_photo`
--
ALTER TABLE `index_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
