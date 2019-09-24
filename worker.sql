-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-09-24 22:43:28
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
-- 資料表結構 `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL COMMENT 'id',
  `content` text NOT NULL COMMENT '自傳',
  `modify_date` datetime DEFAULT NULL COMMENT '修改時間',
  `create_date` datetime NOT NULL COMMENT '上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `worker`
--

INSERT INTO `worker` (`id`, `content`, `modify_date`, `create_date`) VALUES
(1, '退伍出社會後，也順利的進入到現在公司(景丰科技)， 在公司內主要是在Linux系統下建置Weather Research and Forecasting model(WRF model)， 並利用學校所學，處理氣象及WRF model資料，在工作期間我對於程式語言的熱情不減反增， 因此開始自學HTML、CSS、Javascript、Jquery、PHP，並同時使用這些工具開始練習寫一些網站。', NULL, '2019-08-09 03:08:12');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
