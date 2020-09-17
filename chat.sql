-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 03:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_profile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_country` text COLLATE utf8_unicode_ci NOT NULL,
  `user_gender` text COLLATE utf8_unicode_ci NOT NULL,
  `forgotten_answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `log_in` varchar(7) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_profile`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`) VALUES
(2, 'habibamuhammad', '123456789', 'habiba@outlook.com', 'images/FB_IMG_1538885542026.jpg.89', 'Egypt', 'female', '', 'Offline'),
(3, 'dina', '123456789', 'dina@outlook.com', 'images/man.png', 'Egypt', 'female', '', 'offline'),
(6, 'ahmed', '111111', 'ahmed@outlook.com', 'images/IMG-20171024-WA0006.jpg.16', 'Egypt', 'Male', '', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `users_chat`
--

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `receiver_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `msg_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `msg_status` text COLLATE utf8_unicode_ci NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_chat`
--

INSERT INTO `users_chat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(3, 'habibamuhammad', 'dina', 'hi', 'unread', '2020-08-04 13:33:19'),
(4, 'habibamuhammad', 'dina', 'hi', 'unread', '2020-08-04 13:33:23'),
(5, 'habibamuhammad', 'habibamuhammad', 'hello', 'read', '2020-08-04 13:36:53'),
(6, 'habibamuhammad', 'habibamuhammad', 'hello', 'read', '2020-08-04 13:37:40'),
(7, 'habibamuhammad', 'ahmed', 'hi beba', 'read', '2020-08-04 13:39:58'),
(8, 'habibamuhammad', 'ahmed', 'hi ahmed', 'read', '2020-08-04 13:40:33'),
(9, 'habibamuhammad', 'ahmed', 'what about you', 'read', '2020-08-04 13:41:04'),
(10, 'ahmed', 'ahmed', 'hi ', 'read', '2020-08-04 13:41:34'),
(11, 'ahmed', 'ahmed', 'hi ', 'read', '2020-08-04 13:41:48'),
(12, 'ahmed', 'ahmed', 'its me', 'read', '2020-08-04 13:42:07'),
(13, 'ahmed', 'habibamuhammad', 'great', 'unread', '2020-08-04 13:47:02'),
(14, 'ahmed', 'habibamuhammad', 'yahhhh', 'unread', '2020-08-04 13:48:07'),
(15, 'ahmed', 'dina', 'hi dena', 'unread', '2020-08-04 13:48:44'),
(16, 'ahmed', 'dina', 'how about you', 'unread', '2020-08-04 13:49:26'),
(17, 'ahmed', 'dina', 'how about you', 'unread', '2020-08-04 13:49:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_chat`
--
ALTER TABLE `users_chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_chat`
--
ALTER TABLE `users_chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
