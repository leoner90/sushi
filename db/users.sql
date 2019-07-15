-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 15, 2019 at 02:46 AM
-- Server version: 5.6.38
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `usersforsushi`
--

CREATE TABLE `usersforsushi` (
  `id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `history` longtext NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `avatar_url` varchar(9999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersforsushi`
--

INSERT INTO `usersforsushi` (`id`, `login`, `password`, `email`, `history`, `user_hash`, `avatar_url`) VALUES
(25, 'leoner', 'a9c534509f1f445fc489cfbe84b359eb', 'leoner@inbox.lv', '<p class=\"history\">Sunday 9th of June 2019 10:20:29 PM<br> TOTAL SUMM:0.57</p><p class=\"history\">Sunday 9th of June 2019 10:22:03 PM<br> TOTAL SUMM:0.76</p><p class=\"history\">Sunday 9th of June 2019 10:27:20 PM<br> TOTAL SUMM:0.38</p><p class=\"history\">09-06-2019 20:57:47<br> TOTAL SUMM:196.02</p><p class=\"history\">11-06-2019 02:15:34<br> TOTAL SUMM:0.95</p><p class=\"history\">11-06-2019 02:23:33<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:35:55<br> TOTAL SUMM:1.14</p><p class=\"history\">11-06-2019 02:39:57<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 02:40:38<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 02:42:23<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 02:43:11<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 02:43:46<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:44:59<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:45:22<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:45:46<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:46:08<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:47:01<br> TOTAL SUMM:0.95</p><p class=\"history\">11-06-2019 02:47:39<br> TOTAL SUMM:0.76</p><p class=\"history\">11-06-2019 02:49:31<br> TOTAL SUMM:0.76</p><p class=\"history\">11-06-2019 02:49:59<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:50:41<br> TOTAL SUMM:0.38</p><p class=\"history\">11-06-2019 02:50:58<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 02:51:46<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 03:00:04<br> TOTAL SUMM:0.57</p><p class=\"history\">11-06-2019 14:37:36<br> TOTAL SUMM:0.38</p><p class=\"history\">12-06-2019 15:01:04<br> TOTAL SUMM:0.57</p><p class=\"history\">12-06-2019 15:01:51<br> TOTAL SUMM:0.76</p><p class=\"history\">12-06-2019 15:07:07<br> TOTAL SUMM:</p><p class=\"history\">12-06-2019 17:13:09<br> TOTAL SUMM:0.38</p><p class=\"history\">12-06-2019 17:13:48<br> TOTAL SUMM:0.57</p><p class=\"history\">12-06-2019 17:14:36<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 03:05:55<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 03:06:25<br> TOTAL SUMM:2.36</p><p class=\"history\">16-06-2019 03:08:51<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 16:11:41<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 16:12:38<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 16:59:48<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 17:01:31<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 17:03:15<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 17:07:33<br> TOTAL SUMM:</p><p class=\"history\">16-06-2019 17:13:13<br> TOTAL SUMM:1.37</p><p class=\"history\">16-06-2019 17:13:30<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 21:44:03<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:25:51<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:26:52<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:28:20<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:28:59<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:29:21<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:29:31<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:30:44<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:31:19<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:37:45<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:38:42<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:38:53<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:40:03<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:42:28<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:42:35<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:43:16<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:43:36<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:44:17<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:45:05<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:45:28<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:47:02<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:47:23<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:47:46<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:48:17<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:48:25<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:48:58<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:49:06<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:50:43<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:50:56<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:51:36<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:51:45<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:52:36<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:54:06<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:56:47<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:57:42<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:58:11<br> TOTAL SUMM:</p><p class=\"history\">06-07-2019 22:59:36<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 00:55:14<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 00:56:44<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 01:05:14<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 01:06:41<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 01:07:18<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 01:09:07<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 01:12:32<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:29:17<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:33:42<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:34:30<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:35:33<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:36:35<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:36:45<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:37:48<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:50:32<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:50:52<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:53:09<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:53:48<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:54:35<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:54:45<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:54:53<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:55:19<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:55:29<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:55:54<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:56:13<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:56:21<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:57:44<br> TOTAL SUMM:</p><p class=\"history\">07-07-2019 13:57:53<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 13:42:01<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 13:42:12<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:37:13<br> TOTAL SUMM:1.18</p><p class=\"history\">08-07-2019 14:39:05<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:40:26<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:40:49<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:41:24<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:41:52<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:42:05<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:42:56<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:43:48<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:53:32<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 14:55:08<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 15:26:30<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 15:44:24<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 15:44:42<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 16:01:32<br> TOTAL SUMM:</p><p class=\"history\">08-07-2019 16:02:20<br> TOTAL SUMM:</p><p class=\"history\">09-07-2019 00:52:30<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 13:58:37<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 13:59:03<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:00:11<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:00:35<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 14:12:04<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:12:15<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:13:26<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:13:36<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:14:32<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:14:43<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:31:54<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:32:13<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:32:29<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:32:46<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:33:17<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:33:44<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:33:56<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:35:09<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:35:23<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 14:59:08<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 15:00:14<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 15:10:59<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 17:08:06<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 18:57:45<br> TOTAL SUMM:</p><p class=\"history\">14-07-2019 19:01:01<br> TOTAL SUMM:0.19</p><p class=\"history\">14-07-2019 19:11:36<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:20:30<br> TOTAL SUMM:1.37</p><p class=\"history\">14-07-2019 19:23:26<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:29:46<br> TOTAL SUMM:1.37</p><p class=\"history\">14-07-2019 19:31:45<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:34:39<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:39:06<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:40:38<br> TOTAL SUMM:0.19</p><p class=\"history\">14-07-2019 19:43:00<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:44:55<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:48:30<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:49:09<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:49:46<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:51:24<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 19:52:13<br> TOTAL SUMM:2.36</p><p class=\"history\">14-07-2019 19:55:08<br> TOTAL SUMM:1.37</p><p class=\"history\">14-07-2019 19:56:27<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 20:00:16<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 21:11:55<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 21:12:05<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 21:13:44<br> TOTAL SUMM:0.19</p><p class=\"history\">14-07-2019 21:13:53<br> TOTAL SUMM:0.19</p><p class=\"history\">14-07-2019 21:15:31<br> TOTAL SUMM:0.19</p><p class=\"history\">14-07-2019 21:15:44<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 21:26:20<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 21:26:31<br> TOTAL SUMM:1.18</p><p class=\"history\">14-07-2019 21:31:56<br> TOTAL SUMM:1.18</p>', '18130e5a7741523a59e126536a2eac06', '982b63fede095d43e2663fb9a2cf5ec824138');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersforsushi`
--
ALTER TABLE `usersforsushi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersforsushi`
--
ALTER TABLE `usersforsushi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
