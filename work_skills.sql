-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-09-24 22:43:36
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
-- 資料表結構 `work_skills`
--

CREATE TABLE `work_skills` (
  `id` int(11) NOT NULL COMMENT 'id',
  `skill_name` varchar(100) NOT NULL COMMENT '技能名稱',
  `create_time` datetime NOT NULL COMMENT '上傳日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `work_skills`
--

INSERT INTO `work_skills` (`id`, `skill_name`, `create_time`) VALUES
(1, 'HTML', '2019-08-09 03:09:12'),
(2, 'CSS', '2019-08-09 04:13:11'),
(3, 'Javascript', '2019-08-09 04:10:12'),
(4, 'Jquery', '2019-08-09 03:06:11'),
(5, 'PHP', '2019-08-09 02:08:09');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `work_skills`
--
ALTER TABLE `work_skills`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `work_skills`
--
ALTER TABLE `work_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
