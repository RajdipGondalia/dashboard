-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 02:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 2),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(18, '2022_07_04_105106_create_profile_table', 2),
(19, '2022_07_05_121022_create_time_tracker_table', 2),
(21, '2022_07_06_052322_create_task_table', 3),
(22, '2022_07_06_053335_create_task_table', 4),
(23, '2022_07_06_060156_create_todolist_table', 4),
(24, '2022_07_07_130727_create_task_table', 5),
(25, '2022_07_08_045245_create_task_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `family_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `given_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `edu_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `family_name`, `given_name`, `dob`, `edu_qualification`, `job_role`, `work_location`, `present_address`, `permanent_address`, `skills`, `contact_number`, `contact_number_2`, `working_location`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Gondalia', 'Rajdip', '1999-05-29', 'edu q', 'Developer', NULL, 'ahmedabad', 'rajkot', 'dshj jdfsgh', '9797979797', '9898989898', 'Ahmedabad', 'test@gmail.com', 1, '2022-07-06 03:04:34', '2022-07-06 03:04:34'),
(2, 'family name', 'Test one', '2022-07-06', 'BE in IT', 'Developer', NULL, 'near itc narmada', NULL, NULL, '9999999999', NULL, 'Ahmedabad', 'a@gmail.com', 3, '2022-07-14 06:21:49', '2022-07-14 06:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=Pending, 1=Start, 2=Stop, 3=Completed, 4=Cancel',
  `start_time` datetime DEFAULT NULL,
  `start_by` int(11) DEFAULT NULL,
  `stop_time` datetime DEFAULT NULL,
  `stop_by` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `task_title`, `task_desc`, `assign_to`, `due_date`, `status`, `start_time`, `start_by`, `stop_time`, `stop_by`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'make game', 'new game changes on mail', '1,3', NULL, 3, '2022-07-12 18:20:59', 3, '2022-07-13 00:00:00', NULL, 3, '2022-07-08 00:18:55', '2022-07-12 23:05:49'),
(2, 'a', 'ko', '1', NULL, 1, '2022-07-12 18:21:23', 3, '0000-00-00 00:00:00', 3, 3, '2022-07-08 07:34:05', '2022-07-12 07:21:24'),
(3, 'one', 'ok', '3', NULL, 1, '2022-07-12 18:21:49', 3, NULL, 1, 3, '2022-07-11 22:55:09', '2022-07-12 07:21:49'),
(4, 'demo1', 'demo1', '1,3', '2022-07-12', 3, '2022-07-14 12:57:28', 3, '2022-07-14 12:57:35', 3, 3, '2022-07-12 00:17:59', '2022-07-14 01:57:46'),
(5, 'demo2 title', 'demo2 title desc', '1,3', '2022-07-12', 0, '2022-07-12 18:22:47', 3, NULL, 1, 3, '2022-07-12 00:19:20', '2022-07-12 07:22:47'),
(9, 'Optio iusto molesti', 'Consequatur et nost', '1,3', '2020-02-19', 0, '2022-07-12 18:27:35', 3, NULL, NULL, 3, '2022-07-12 07:01:36', '2022-07-12 07:27:35'),
(10, 'ggh', 'ok', '1,3', '2022-07-12', 1, '2022-07-12 18:34:51', 3, NULL, NULL, 3, '2022-07-12 07:14:46', '2022-07-12 07:34:51'),
(14, 'new pc install', NULL, '1,3', '2022-07-13', 0, NULL, NULL, NULL, NULL, 3, '2022-07-13 01:19:24', '2022-07-13 01:19:24'),
(15, 'aa', 'aa', '1', '2022-07-14', 0, NULL, NULL, NULL, NULL, 3, '2022-07-13 23:30:29', '2022-07-13 23:30:29'),
(16, NULL, NULL, '', '1970-01-01', 0, NULL, NULL, NULL, NULL, 3, '2022-07-13 23:34:22', '2022-07-13 23:34:22'),
(17, 'ss', NULL, '1', '1970-01-01', 0, NULL, NULL, NULL, NULL, 3, '2022-07-13 23:49:24', '2022-07-13 23:49:24'),
(18, 'clean pc', 'all', '1', '2022-07-15', 3, '2022-07-14 16:59:33', 3, '2022-07-14 16:59:45', 3, 3, '2022-07-14 05:59:04', '2022-07-14 06:00:09'),
(19, 'make new game', 'kiki', '1,2,3', '2022-07-20', 3, '2022-07-14 17:23:35', 3, '2022-07-14 17:23:42', 3, 3, '2022-07-14 06:23:21', '2022-07-14 06:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `time_tracker`
--

CREATE TABLE `time_tracker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `current_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tracker`
--

INSERT INTO `time_tracker` (`id`, `flag`, `user_id`, `current_time`, `created_at`, `updated_at`) VALUES
(1, 'start', 3, '2022-07-06 18:05:21', '2022-07-06 07:05:22', '2022-07-06 07:05:22'),
(2, 'start', 3, '2022-07-06 18:07:06', '2022-07-06 07:07:06', '2022-07-06 07:07:06'),
(3, 'start', 3, '2022-07-06 18:10:22', '2022-07-06 07:10:22', '2022-07-06 07:10:22'),
(4, 'start', 3, '2022-07-06 18:10:27', '2022-07-06 07:10:28', '2022-07-06 07:10:28'),
(5, 'start', 3, '2022-07-06 18:11:02', '2022-07-06 07:11:03', '2022-07-06 07:11:03'),
(6, 'start', 3, '2022-07-06 18:12:09', '2022-07-06 07:12:10', '2022-07-06 07:12:10'),
(7, 'stop', 3, '2022-07-06 18:16:22', '2022-07-06 07:16:22', '2022-07-06 07:16:22'),
(8, 'start', 3, '2022-07-07 18:39:11', '2022-07-07 07:39:12', '2022-07-07 07:39:12'),
(9, 'stop', 3, '2022-07-07 18:39:20', '2022-07-07 07:39:20', '2022-07-07 07:39:20'),
(10, 'start', 3, '2022-07-14 10:00:00', '2022-07-13 01:12:03', '2022-07-13 01:12:03'),
(11, 'stop', 3, '2022-07-14 12:12:04', '2022-07-14 00:12:04', '2022-07-14 01:12:04'),
(14, 'start', 3, '2022-07-14 15:16:02', '2022-07-14 04:16:02', '2022-07-14 04:16:02'),
(15, 'stop', 3, '2022-07-14 15:16:12', '2022-07-14 04:16:13', '2022-07-14 04:16:13'),
(16, 'start', 3, '2022-07-14 15:43:42', '2022-07-14 04:43:43', '2022-07-14 04:43:43'),
(17, 'stop', 3, '2022-07-14 15:43:50', '2022-07-14 04:43:50', '2022-07-14 04:43:50'),
(18, 'start', 3, '2022-07-14 16:57:52', '2022-07-14 05:57:52', '2022-07-14 05:57:52'),
(19, 'stop', 3, '2022-07-14 16:58:01', '2022-07-14 05:58:01', '2022-07-14 05:58:01'),
(20, 'start', 3, '2022-07-14 17:22:16', '2022-07-14 06:22:17', '2022-07-14 06:22:17'),
(21, 'stop', 3, '2022-07-14 17:22:30', '2022-07-14 06:22:30', '2022-07-14 06:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `todo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `todo_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `todo_title`, `todo_desc`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'one', 'one desc', 1, '2022-07-06 00:55:32', '2022-07-06 00:55:32'),
(2, 'two', 'two desc', 1, '2022-07-06 01:57:05', '2022-07-06 01:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', NULL, '$2y$10$YmMWBNgF3riWEIf.WvM3E.BsZ/IFkM/hrkEj0yrWUaRxTstMzxQdG', NULL, NULL, NULL),
(2, 'Prudhvi', 'm@gmail.com', NULL, '$2y$10$YmMWBNgF3riWEIf.WvM3E.BsZ/IFkM/hrkEj0yrWUaRxTstMzxQdG', NULL, '2022-07-01 06:24:59', '2022-07-01 06:24:59'),
(3, 'rajdip', 'rajdip@gmail.com', NULL, '$2y$10$Guc7kRDc.6E7jdwNyp/9tuaDWxHrBmDgKQEcf.L.VmpplIu6QhOxe', 'T92TruMPpSaNZT2BXuEwdRyK73lhvVP4Ek2aXDOmrz262RJvhCeC1L0sHnLq', '2022-07-01 06:35:15', '2022-07-01 06:35:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_user_id_foreign` (`user_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_id_foreign` (`user_id`);

--
-- Indexes for table `time_tracker`
--
ALTER TABLE `time_tracker`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_tracker_user_id_foreign` (`user_id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todolist_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `time_tracker`
--
ALTER TABLE `time_tracker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `time_tracker`
--
ALTER TABLE `time_tracker`
  ADD CONSTRAINT `time_tracker_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
