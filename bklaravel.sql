-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019-10-17 11:50:45
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
-- 資料庫： `bklaravel`
--

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `images`
--

INSERT INTO `images` (`id`, `image_path`, `publish`, `created_at`, `updated_at`) VALUES
(12, 'C:\\xampp\\htdocs\\php\\bkLaravel\\public\\img\\圖片1.jpg', 1, '2019-09-14 21:09:59', '2019-09-14 21:09:59'),
(42, 'C:\\xampp\\htdocs\\php\\bkLaravel\\public\\img\\IMAG1384.jpg', 1, '2019-09-26 06:48:16', '2019-09-26 06:48:16'),
(43, 'C:\\xampp\\htdocs\\php\\bkLaravel\\public\\img\\IMAG1161.jpg', 0, '2019-09-26 06:48:27', '2019-10-03 13:13:39'),
(44, 'C:\\xampp\\htdocs\\php\\bkLaravel\\public\\img\\IMAG1558.jpg', 0, '2019-09-26 06:49:04', '2019-10-03 13:08:27');

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
  `created_at` datetime NOT NULL COMMENT '上傳時間',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `index_photo`
--

INSERT INTO `index_photo` (`id`, `title`, `photo_path`, `username`, `userid`, `content_one`, `content_two`, `created_at`, `updated_at`) VALUES
(1, '去夏威夷玩時的照片', 'C:\\xampp\\htdocs\\php\\bkLaravel\\public\\img\\圖片1.jpg', 'Bokai', 1, '大學以及研究所就讀大氣科學系，除了簡單的天氣分析以及預報外，也同時 學到許多在於研究以及應用上的知識與技巧，如：空氣汙染概論、大氣動力學、天氣學、數值天氣預報、大氣測計學等ssss。', '大學期間擔任過校內氣象台的主播，加強對於天氣預報及天氣分析的訓練，不只要將未來的天氣概況做個簡單的預報，並要練習上台講話的台風。研究所期間與實驗室同仁一同參與過許多大大小小的實驗計畫，如西南氣流實驗及雙北暴雨實驗，這些經驗令我體會團隊合作以及團隊討論是進步最快的捷徑ssss。', '2019-08-09 04:14:25', '2019-10-17 09:43:38');

-- --------------------------------------------------------

--
-- 資料表結構 `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `body`, `created_at`, `updated_at`, `published_at`) VALUES
(8, 30, 'testtest', '2019-10-03 15:18:46', '2019-10-05 05:58:07', NULL),
(23, 30, 'dasd\nasdas\ndad', '2019-10-05 07:30:17', '2019-10-05 07:48:55', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `message_reply`
--

CREATE TABLE `message_reply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message_id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `message_reply`
--

INSERT INTO `message_reply` (`id`, `message_id`, `reply_id`, `created_at`, `updated_at`) VALUES
(35, 8, 39, '2019-10-03 15:19:03', '2019-10-03 15:19:03'),
(36, 8, 40, '2019-10-03 15:19:07', '2019-10-03 15:19:07'),
(37, 8, 41, '2019-10-03 15:19:10', '2019-10-03 15:19:10'),
(39, 23, 43, '2019-10-05 08:08:54', '2019-10-05 08:08:54'),
(40, 23, 44, '2019-10-05 08:12:02', '2019-10-05 08:12:02'),
(41, 23, 45, '2019-10-05 08:13:54', '2019-10-05 08:13:54');

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_14_055835_create_images_table', 1),
(5, '2019_09_28_213609_create_messages_table', 2),
(6, '2019_09_30_175133_create_replies_table', 3),
(7, '2019_09_30_175523_create_message_reply_table', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bokai830124@gmail.com', '$2y$10$qt0xlLDBYTOE5L.PWSBg0eof6NH19N5z5tjK.bmurldNdG5PWk6j2', '2019-09-22 07:01:10');

-- --------------------------------------------------------

--
-- 資料表結構 `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(39, 30, 'tesdt\ndasd\nasdas', '2019-10-03 15:19:03', '2019-10-05 07:53:46'),
(40, 30, 'dwqdq', '2019-10-03 15:19:07', '2019-10-03 15:19:07'),
(41, 30, 'wdqd', '2019-10-03 15:19:10', '2019-10-03 15:19:10'),
(43, 30, '你好可以\n跟你出去\n玩科科', '2019-10-05 08:08:54', '2019-10-05 08:38:55'),
(44, 30, '嗨\n你好\n我在這', '2019-10-05 08:12:02', '2019-10-05 08:12:17'),
(45, 30, '又\n我\n在\\\n這', '2019-10-05 08:13:54', '2019-10-05 08:14:05');

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL COMMENT 'id',
  `content` text NOT NULL COMMENT '學生時期自傳',
  `modify_date` datetime DEFAULT NULL COMMENT '修改時間',
  `created_at` datetime NOT NULL COMMENT '上傳時間',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student`
--

INSERT INTO `student` (`id`, `content`, `modify_date`, `created_at`, `updated_at`) VALUES
(1, '研究所期間，除了參加實驗計劃，同時也要資料的處理及分析，因此需要學習程式語言，系上的關系，我們需要在Linux系統下使用shell script、Fortran及GRADS等語言去處理資料及繪圖，在處理資料的過程中，我發現我對於程式語言充滿了興趣，喜歡專研程式技術勝過於學術上的學習ssss。', NULL, '2019-08-09 05:14:15', '2019-10-17 09:43:28');

-- --------------------------------------------------------

--
-- 資料表結構 `student_skills`
--

CREATE TABLE `student_skills` (
  `id` int(11) NOT NULL COMMENT 'id',
  `skill_name` varchar(100) NOT NULL COMMENT 'skill_name',
  `created_at` datetime NOT NULL COMMENT '上傳時間',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `student_skills`
--

INSERT INTO `student_skills` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(2, 'Fortran', '2019-08-09 03:10:00', NULL),
(3, 'GRADS', '2019-08-09 05:13:13', NULL),
(8, 'shell script', '2019-08-13 21:11:55', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `active`, `remember_token`, `reset_token`, `level`, `created_at`, `updated_at`) VALUES
(1, '', 'admin', '', '$2y$10$ANv/TnPhzaqOwey.frx0NOBmucwDWfp9yhrMk05.kWUGCDYzG8X4G', '0', NULL, NULL, 0, NULL, NULL),
(30, 'bokai', 'bokai', 'bokai830124@gmail.com', '$2y$10$E5ehMG.x8XPYQ2Kq5o3KGOYx8UkgpAtn/dZzZ2p.WzbsqoUnQms/q', 'active', NULL, NULL, 3, '2019-10-03 14:45:41', '2019-10-03 14:45:58'),
(35, 'tesrt', 'dsadas', 'wd@sda.sadsa', '$2y$10$mPeWTdfZL4QA3I9oiFKq2e3M3tYnruzRoceMlDnp1r2FtHuPxVTBe', 'active', NULL, NULL, 3, '2019-10-08 03:57:11', '2019-10-08 03:57:11'),
(38, 'root', 'root', 'we@wee.ewqwe', '$2y$10$kHyyBDZit.yD44LZlgRrTudQ.q855TLh56Kjmz8slFiLyYxDcrsEO', 'active', NULL, NULL, 1, '2019-10-08 09:05:21', '2019-10-08 09:05:21');

-- --------------------------------------------------------

--
-- 資料表結構 `worker`
--

CREATE TABLE `worker` (
  `id` int(11) NOT NULL COMMENT 'id',
  `content` text NOT NULL COMMENT '自傳',
  `modify_date` datetime DEFAULT NULL COMMENT '修改時間',
  `created_at` datetime NOT NULL COMMENT '上傳時間',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `worker`
--

INSERT INTO `worker` (`id`, `content`, `modify_date`, `created_at`, `updated_at`) VALUES
(1, '退伍出社會後，也順利的進入到現在公司(景丰科技)， 在公司內主要是在Linux系統下建置Weather Research and Forecasting model(WRF model)， 並利用學校所學，處理氣象及WRF model資料，在工作期間我對於程式語言的熱情不減反增， 因此開始自學HTML、CSS、Javascript、Jquery、PHP，並同時使用這些工具開始練習寫一些網站sssss。', NULL, '2019-08-09 03:08:12', '2019-10-17 09:43:41');

-- --------------------------------------------------------

--
-- 資料表結構 `work_skills`
--

CREATE TABLE `work_skills` (
  `id` int(11) NOT NULL COMMENT 'id',
  `skill_name` varchar(100) NOT NULL COMMENT '技能名稱',
  `created_at` datetime NOT NULL COMMENT '上傳日期',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `work_skills`
--

INSERT INTO `work_skills` (`id`, `skill_name`, `created_at`, `updated_at`) VALUES
(1, 'HTML', '2019-08-09 03:09:12', NULL),
(2, 'CSS', '2019-08-09 04:13:11', NULL),
(3, 'Javascript', '2019-08-09 04:10:12', NULL),
(4, 'Jquery', '2019-08-09 03:06:11', NULL),
(5, 'PHP', '2019-08-09 02:08:09', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `index_photo`
--
ALTER TABLE `index_photo`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- 資料表索引 `message_reply`
--
ALTER TABLE `message_reply`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `student_skills`
--
ALTER TABLE `student_skills`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `work_skills`
--
ALTER TABLE `work_skills`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `index_photo`
--
ALTER TABLE `index_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message_reply`
--
ALTER TABLE `message_reply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `student_skills`
--
ALTER TABLE `student_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=47;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `worker`
--
ALTER TABLE `worker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `work_skills`
--
ALTER TABLE `work_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
