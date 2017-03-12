-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2017 at 09:05 PM
-- Server version: 5.5.50
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2017_03_09_181437_create_tasks_table', 1),
('2017_03_09_184950_create_users_table', 1),
('2017_03_09_193401_add_column_to_table_tasks', 1),
('2017_03_10_093901_create_task_user_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `task_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `user`, `task`, `task_value`, `start_date`, `finish_date`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, '', 'Создать веб сайт для компании', 'Создать веб сайт на основе предоставленного PSD макета. Разработать серверную часть на MVC фрэймворке.', '2017-03-15', '2017-03-31', 'Не начата', '2017-03-12 14:45:42', '2017-03-12 14:50:32', NULL),
(2, 0, '', 'Разработать интернет магазин на Magento', 'Создать дизайн и функционал магазина по продаже одежды на последней версии Magento', '2017-03-12', '2017-03-23', 'В процессе', '2017-03-12 14:49:53', '2017-03-12 14:49:53', NULL),
(3, 0, '', 'Пртестировать функционал приложения пред релизом', 'Протестировать основной функционал серверной и клиентской части перед релизом', '2017-03-18', '2017-03-30', 'Отложена', '2017-03-12 14:54:33', '2017-03-12 14:54:33', NULL),
(4, 0, '', 'Провести рефакторинг кода для мобильного приложения', 'Провести рефактринг приложения. Разделить функионал на отдельные элементы.', '2017-03-01', '2017-03-12', 'Завершена', '2017-03-12 14:59:41', '2017-03-12 14:59:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE IF NOT EXISTS `task_user` (
  `id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `task_id`, `first_name`, `middle_name`, `last_name`, `profession`, `created_at`, `updated_at`) VALUES
(1, 0, 'Андрей', 'Степанович', 'Трафимов', 'UI/UX engineer', '2017-03-12 14:32:53', '2017-03-12 14:32:53'),
(2, 4, 'Кирилл', 'Юрьевич', 'Иванов', 'PHP engineer', '2017-03-12 14:33:50', '2017-03-12 15:00:49'),
(3, 0, 'Antony', 'Frans', 'Evans', 'Java Developer', '2017-03-12 14:34:33', '2017-03-12 14:34:33'),
(4, 0, 'Emely', 'Jane', 'Osvalds', 'Graphic Designer', '2017-03-12 14:35:12', '2017-03-12 14:35:12'),
(5, 3, 'Евгений', 'Сергеевич', 'Петров', 'QA Engineer', '2017-03-12 14:40:56', '2017-03-12 15:00:57'),
(6, 1, 'Сергей', 'Дмитриевич', 'Афанасьев', 'PHP Developer', '2017-03-12 14:41:40', '2017-03-12 14:59:59'),
(7, 0, 'James', 'Stiven', 'Andrews', 'Android Developer', '2017-03-12 14:42:42', '2017-03-12 14:42:42'),
(8, 0, 'Николай', 'Андреевич', 'Дмитриев', 'Front-End Developer', '2017-03-12 14:43:46', '2017-03-12 14:43:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
