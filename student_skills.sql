-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-09-24 22:43:20
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
-- 資料表結構 `student_skills`
--

CREATE TABLE `student_skills` (
  `id` int(11) NOT NULL COMMENT 'id',
  `skill_name` varchar(100) NOT NULL COMMENT 'skill_name',
  `create_time` datetime NOT NULL COMMENT '上傳時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student_skills`
--

INSERT INTO `student_skills` (`id`, `skill_name`, `create_time`) VALUES
(2, 'Fortran', '2019-08-09 03:10:00'),
(3, 'GRADS', '2019-08-09 05:13:13'),
(8, 'shell script', '2019-08-13 21:11:55');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `student_skills`
--
ALTER TABLE `student_skills`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `student_skills`
--
ALTER TABLE `student_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
