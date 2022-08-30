-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 11:39 AM
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
-- Table structure for table `client_category_master`
--

CREATE TABLE `client_category_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_category_master`
--

INSERT INTO `client_category_master` (`id`, `name`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'Default', 0, '2022-07-21 05:30:00', '2022-07-21 05:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_category_id` tinyint(4) DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `company_name`, `first_name`, `last_name`, `email`, `address`, `client_category_id`, `isDelete`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'omega', 'gautam', 'rathod', 'g@gmail.com', 'Lorem ipsum dolor', 1, 0, 1, '2022-07-26 06:59:07', '2022-07-26 06:59:07'),
(2, 'vedant', 'anil', 'b', 'a@gmail.com', 'Lorem ipsum dolor', 1, 0, 1, '2022-07-26 06:59:53', '2022-08-01 04:55:08'),
(3, 'tree', 'saurav', 'shah', 's@gmail.com', 'sdf dfg', 1, 0, 1, '2022-08-24 06:45:10', '2022-08-24 07:05:08');

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
-- Table structure for table `job_role_master`
--

CREATE TABLE `job_role_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_role_master`
--

INSERT INTO `job_role_master` (`id`, `name`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 0, '2022-07-20 06:40:37', '2022-07-20 06:40:37'),
(2, 'Manager', 0, '2022-07-20 06:40:37', '2022-07-20 06:40:37');

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
(25, '2022_07_08_045245_create_task_table', 6),
(26, '2022_07_18_051619_add_type_to_users_table', 7),
(27, '2022_07_20_062715_create_job_role_master_table', 8),
(28, '2022_07_20_070056_create_working_location_master_table', 9),
(29, '2022_07_20_093012_alter_table_profile_change_job_role', 10),
(30, '2022_07_20_104146_create_profile_table', 11),
(32, '2022_07_20_104658_create_profile_table', 12),
(33, '2022_07_21_052834_create_client_category_master_table', 13),
(35, '2022_07_21_064553_create_client_master_table', 14),
(36, '2022_07_21_085857_create_project_table', 15),
(37, '2022_07_22_093022_add_columns_to_task_table', 16),
(38, '2022_07_22_122522_create_comment_table', 17),
(39, '2022_07_22_124247_create_project_vs_comment_table', 18),
(40, '2022_07_25_111914_add_image_path_to_profile_table', 19),
(41, '2022_07_25_112703_add_attachment_path_to_project_vs_comment_table', 20),
(42, '2022_07_25_164748_change_dob_to_profile_table', 21),
(43, '2022_07_26_112920_add_image_path_to_users_table', 22),
(44, '2022_07_26_121244_add_is_delete_to_time_tracker_table', 23),
(45, '2022_07_27_111931_add_start_time_to_project_table', 24),
(46, '2022_07_27_114600_add_start_by_to_project_table', 25),
(47, '2022_07_27_141606_add_start_date_to_project_table', 26),
(48, '2022_08_02_171129_create_project_vs_events_table', 27);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rajdip@gmail.com', '$2y$10$jHOPmmpn3KhQXULvs6cTouNcgC5N6lAWBzw.O8UxzyfD.vc5OB01C', '2022-07-19 03:59:02');

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
  `dob` date DEFAULT NULL,
  `edu_qualification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_role` tinyint(4) DEFAULT NULL,
  `work_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_number_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_location` tinyint(4) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `family_name`, `given_name`, `dob`, `edu_qualification`, `job_role`, `work_location`, `present_address`, `permanent_address`, `skills`, `contact_number`, `contact_number_2`, `working_location`, `email`, `image_path`, `user_id`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'Gondalia', 'Rajdip', '1999-05-29', 'aa', 1, NULL, 'Lorem ipsum dolor sit amet consectetur', 'Lorem ipsum dolor sit amet consectetur', 'Lorem ipsum dolor sit amet consectetur', '5413131321312', '45456546546546', 1, 'r@gmail.com', 'Raj_1659087086.jpg', 1, 0, '2022-07-26 06:56:28', '2022-08-10 11:40:06'),
(2, 'd', 'sagar', '2020-01-22', NULL, 1, NULL, NULL, NULL, NULL, '9846161324', NULL, 0, 's@gmail.com', 'sagar_1659086300.jpg', 1, 0, '2022-07-29 09:18:20', '2022-07-29 09:18:20'),
(3, 'gautami', 'vinay', '2000-02-22', 'aa', 2, NULL, 'cc', 'dd', 'aa', '6758979878766', '7868687687', 2, 'vi@gmail.com', NULL, 1, 0, '2022-07-29 09:34:53', '2022-07-29 11:10:58'),
(4, 'two', 'One', '2022-08-10', 'three', NULL, NULL, 'five', 'six', 'four', '1234567890', '234567912', NULL, 'seven@gmail.com', NULL, 1, 0, '2022-08-10 05:42:15', '2022-08-10 05:42:15'),
(5, 'aa', 'aa', '2022-08-10', NULL, NULL, NULL, 'near Itc Narmada', NULL, NULL, '01234567890', NULL, NULL, 'r@gmail.com', NULL, 1, 0, '2022-08-10 06:24:27', '2022-08-10 06:24:27'),
(6, 'bb', 'aa', '2022-08-10', 'cc', 1, NULL, 'ee', 'ff', 'dd', 'gg', 'hh', 2, 'i@gmail.com', NULL, 1, 1, '2022-08-10 06:26:52', '2022-08-23 04:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` tinyint(4) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `assign_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_manager` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=Not Started, 1=In Progress, 2=On Hold, 3=Completed, 4=Cancel',
  `start_time` datetime DEFAULT NULL,
  `start_by` int(11) DEFAULT NULL,
  `complete_time` datetime DEFAULT NULL,
  `complete_by` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `title`, `client_id`, `start_date`, `due_date`, `assign_to`, `project_manager`, `status`, `start_time`, `start_by`, `complete_time`, `complete_by`, `user_id`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'finder game', 1, NULL, '2022-08-30', '1,2,3,4,5', 1, 0, '2022-07-27 12:55:44', 1, NULL, NULL, 1, 0, '2022-07-26 07:00:49', '2022-07-27 07:25:46'),
(2, 'subway game', 2, NULL, '2022-08-19', '1,2,3', 1, 4, '2022-07-27 12:55:29', 1, '2022-07-27 12:55:32', 1, 1, 0, '2022-07-26 07:02:22', '2022-08-25 04:21:21'),
(3, 'pubg', 2, '2022-07-27', '2022-09-28', '1,2,4,5', 2, 3, '2022-08-25 09:51:09', 1, '2022-08-25 09:51:15', 1, 1, 0, '2022-07-27 08:53:08', '2022-08-25 04:21:15'),
(4, 'project one', 1, '2022-07-27', '2022-08-31', '2,3', 2, 2, '2022-08-25 09:50:57', 1, '2022-07-27 14:53:29', 1, 1, 0, '2022-07-27 09:22:47', '2022-08-25 04:21:03'),
(5, 'gas pump colour', 1, '2022-08-24', '2022-09-07', '1,2,3,6', 1, 1, '2022-08-25 09:50:28', 1, NULL, NULL, 1, 0, '2022-08-24 12:39:11', '2022-08-25 04:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `project_vs_comment`
--

CREATE TABLE `project_vs_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_id` tinyint(4) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_vs_comment`
--

INSERT INTO `project_vs_comment` (`id`, `comment`, `attachment_path`, `project_id`, `user_id`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'hy', NULL, 1, 1, 0, '2022-07-26 07:21:05', '2022-07-26 07:21:05'),
(2, 'start a project?', NULL, 1, 2, 0, '2022-07-26 07:24:10', '2022-07-26 07:24:10'),
(3, 'today or Tomorrow?', NULL, 1, 2, 0, '2022-07-26 07:24:35', '2022-07-26 07:24:35'),
(4, 'ok, tomorrow morning we start this project.. hjdfsgdf dfjshdfsjgh sdfkjghdfs kjhdfs kuhdfs kdfshj ', NULL, 1, 1, 0, '2022-07-26 08:58:28', '2022-07-26 08:58:28'),
(5, NULL, 'Rajdip_1658831761.jpg', 1, 1, 0, '2022-07-26 10:36:01', '2022-07-26 10:36:01'),
(6, NULL, 'Rajdip_1658832307.jpg', 1, 1, 0, '2022-07-26 10:45:07', '2022-07-26 10:45:07'),
(7, 'abcd', NULL, 1, 1, 0, '2022-07-26 10:45:35', '2022-07-26 10:45:35'),
(8, NULL, 'Rajdip_1658835954.xlsx', 1, 1, 0, '2022-07-26 11:45:54', '2022-07-26 11:45:54'),
(9, 'yes, do it', NULL, 1, 2, 0, '2022-07-26 11:59:06', '2022-07-26 11:59:06'),
(10, NULL, 'vivek_1658836766.jpg', 1, 2, 0, '2022-07-26 11:59:26', '2022-07-26 11:59:26'),
(11, NULL, 'vivek_1658836784.xlsx', 1, 2, 0, '2022-07-26 11:59:44', '2022-07-26 11:59:44'),
(12, NULL, 'vivek_1658837865.jpg', 1, 2, 0, '2022-07-26 12:17:45', '2022-07-26 12:17:45'),
(13, NULL, 'vivek_1658837871.jpg', 1, 2, 0, '2022-07-26 12:17:51', '2022-07-26 12:17:51'),
(14, NULL, 'vivek_1658837876.jpg', 1, 2, 0, '2022-07-26 12:17:56', '2022-07-26 12:17:56'),
(15, NULL, 'vivek_1658837887.jpg', 1, 2, 0, '2022-07-26 12:18:07', '2022-07-26 12:18:07'),
(16, NULL, 'Rajdip_1658838495.jpg', 1, 1, 0, '2022-07-26 12:28:15', '2022-07-26 12:28:15'),
(17, 'give me update', NULL, 1, 1, 0, '2022-07-26 12:29:09', '2022-07-26 12:29:09'),
(18, 'ok.. after 1 hour', NULL, 1, 2, 0, '2022-07-26 12:29:40', '2022-07-26 12:29:40'),
(19, NULL, 'Rajdip_1658838610.xlsx', 1, 1, 0, '2022-07-26 12:30:10', '2022-07-26 12:30:10'),
(20, NULL, 'vivek_1658838642.jpg', 1, 2, 0, '2022-07-26 12:30:42', '2022-07-30 09:11:13'),
(21, 'hyy', NULL, 2, 1, 0, '2022-07-26 12:31:29', '2022-07-26 12:31:29'),
(22, 'today is last day to update', NULL, 1, 1, 0, '2022-07-27 09:20:31', '2022-07-30 09:41:55'),
(23, NULL, 'Rajdip_1658913644.xlsx', 1, 1, 0, '2022-07-27 09:20:44', '2022-08-25 05:45:49'),
(24, 'hi', NULL, 4, 1, 0, '2022-07-27 09:23:49', '2022-07-27 09:23:49'),
(25, 'ok. i will try', NULL, 4, 2, 0, '2022-07-27 09:24:32', '2022-07-27 09:24:32'),
(26, NULL, 'Rajdip_1658913889.jpg', 4, 1, 0, '2022-07-27 09:24:49', '2022-07-27 09:24:49'),
(27, 'file not proper', NULL, 1, 1, 0, '2022-08-06 11:04:31', '2022-08-06 11:04:31'),
(28, 'abcd', NULL, 1, 1, 0, '2022-08-25 08:59:34', '2022-08-25 08:59:34'),
(29, NULL, 'Rajdip_1661417988.jpg', 1, 1, 0, '2022-08-25 08:59:48', '2022-08-25 08:59:48'),
(30, NULL, 'Rajdip_1661418007.jpg', 1, 1, 0, '2022-08-25 09:00:07', '2022-08-25 09:00:07'),
(31, NULL, 'Rajdip_1661418017.jpg', 1, 1, 0, '2022-08-25 09:00:17', '2022-08-25 09:00:17'),
(32, NULL, 'Rajdip_1661418026.jpg', 1, 1, 0, '2022-08-25 09:00:26', '2022-08-25 09:00:26'),
(33, 'hi', NULL, 5, 1, 1, '2022-08-25 09:36:26', '2022-08-25 09:37:06'),
(34, 'sdf', NULL, 1, 3, 0, '2022-08-26 09:11:40', '2022-08-26 09:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `project_vs_events`
--

CREATE TABLE `project_vs_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `project_id` tinyint(4) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_vs_events`
--

INSERT INTO `project_vs_events` (`id`, `title`, `start`, `end`, `project_id`, `user_id`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'ww', '2022-08-08 04:00:00', '2022-08-08 09:00:00', 1, 1, 0, '2022-08-08 05:39:32', '2022-08-08 06:55:55'),
(2, 'two', '2022-08-02 00:00:00', '2022-08-03 00:00:00', 4, 1, 0, '2022-08-08 05:57:34', '2022-08-08 05:57:34'),
(3, 'three', '2022-08-09 00:00:00', '2022-08-12 00:00:00', 4, 1, 0, '2022-08-08 05:57:41', '2022-08-08 05:57:41'),
(4, 'hello', '2022-08-10 00:00:00', '2022-08-11 00:00:00', 1, 1, 1, '2022-08-08 06:47:50', '2022-08-08 06:52:31'),
(5, 'ok', '2022-08-10 00:00:00', '2022-08-11 00:00:00', 1, 1, 0, '2022-08-08 06:52:49', '2022-08-08 06:52:49'),
(6, 'add glass', '2022-08-20 16:00:00', '2022-08-20 18:00:00', 1, 1, 1, '2022-08-08 07:06:18', '2022-08-26 05:26:32'),
(7, 'new theme', '2022-08-15 00:00:00', '2022-08-25 00:00:00', 1, 1, 0, '2022-08-08 07:06:39', '2022-08-08 07:06:39'),
(8, 'logo create', '2022-08-16 00:00:00', '2022-08-19 00:00:00', 1, 1, 0, '2022-08-08 07:06:53', '2022-08-08 07:06:53'),
(9, 'event one', '2022-08-17 00:00:00', '2022-08-20 00:00:00', 1, 1, 0, '2022-08-08 07:07:12', '2022-08-08 07:07:12'),
(10, 'make model', '2022-08-17 00:00:00', '2022-08-24 00:00:00', 1, 1, 0, '2022-08-08 07:13:53', '2022-08-08 07:13:53'),
(11, 'payment process start', '2022-08-17 00:00:00', '2022-08-20 00:00:00', 1, 1, 0, '2022-08-08 07:14:14', '2022-08-08 07:14:14'),
(12, 'link insta id', '2022-08-17 00:00:00', '2022-08-20 00:00:00', 1, 1, 0, '2022-08-08 07:14:36', '2022-08-08 07:14:36'),
(13, 'link wp', '2022-08-17 00:00:00', '2022-08-20 00:00:00', 1, 1, 0, '2022-08-08 07:14:48', '2022-08-08 07:14:48'),
(14, 'oo', '2022-08-04 00:00:00', '2022-08-06 00:00:00', 1, 1, 1, '2022-08-25 09:54:10', '2022-08-25 09:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` tinyint(4) DEFAULT NULL,
  `task_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assign_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `priority` tinyint(4) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0=Pending, 1=Start, 2=Stop, 3=Completed, 4=Cancel',
  `start_time` datetime DEFAULT NULL,
  `start_by` int(11) DEFAULT NULL,
  `stop_time` datetime DEFAULT NULL,
  `stop_by` int(11) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `project_id`, `task_title`, `task_desc`, `assign_to`, `due_date`, `priority`, `status`, `start_time`, `start_by`, `stop_time`, `stop_by`, `user_id`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 'make design', 'colour is in project doc', '4', '2022-07-29', 2, 0, NULL, NULL, NULL, NULL, 1, 0, '2022-07-26 07:05:42', '2022-07-29 13:58:35'),
(2, 1, 'make logo', NULL, '5', '2022-07-29', 3, 4, '2022-08-23 16:31:02', 1, '2022-08-23 16:31:21', 1, 1, 0, '2022-07-26 07:08:34', '2022-08-23 11:03:03'),
(3, 1, 'pc on', 'sdjhgfsjh', '1,3', '2022-07-27', 2, 3, '2022-07-27 14:49:12', 1, '2022-07-27 14:49:19', 1, 1, 0, '2022-07-27 09:19:07', '2022-08-23 10:25:32'),
(4, 1, 'find ui', 'abc', '1,2,3', '2022-08-31', 2, 0, NULL, NULL, NULL, NULL, 1, 0, '2022-08-23 12:34:00', '2022-08-25 09:34:34'),
(5, 1, 'make logo', 'in yellow color', '1,2,5', '2022-08-31', 2, 3, '2022-08-24 14:56:13', 1, '2022-08-24 14:56:21', 1, 1, 0, '2022-08-24 09:25:59', '2022-08-24 09:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `time_tracker`
--

CREATE TABLE `time_tracker` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `current_time` datetime NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tracker`
--

INSERT INTO `time_tracker` (`id`, `flag`, `user_id`, `current_time`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'start', 1, '2022-07-26 12:28:04', 0, '2022-07-26 06:58:04', '2022-07-26 06:58:04'),
(2, 'stop', 1, '2022-07-27 14:55:50', 1, '2022-07-27 09:25:50', '2022-07-29 12:28:35'),
(3, 'stop', 1, '2022-07-29 17:58:55', 1, '2022-07-29 12:28:56', '2022-07-29 12:29:23'),
(4, 'start', 1, '2022-07-29 18:11:51', 0, '2022-07-29 12:41:51', '2022-07-29 12:41:51'),
(5, 'stop', 1, '2022-07-29 18:11:56', 0, '2022-07-29 12:41:56', '2022-07-29 12:41:56'),
(6, 'start', 1, '2022-07-29 18:12:01', 0, '2022-07-29 12:42:01', '2022-07-29 12:42:01'),
(7, 'stop', 1, '2022-07-29 18:12:05', 0, '2022-07-29 12:42:06', '2022-07-29 12:42:06'),
(8, 'start', 1, '2022-07-29 18:12:18', 0, '2022-07-29 12:42:18', '2022-07-29 12:42:18'),
(9, 'stop', 1, '2022-07-29 18:12:26', 1, '2022-07-29 12:42:27', '2022-07-29 12:43:27'),
(10, 'stop', 1, '2022-07-29 18:13:30', 0, '2022-07-29 12:43:30', '2022-07-29 12:43:30'),
(11, 'start', 1, '2022-08-06 16:30:21', 0, '2022-08-06 11:00:21', '2022-08-06 11:00:21'),
(12, 'stop', 1, '2022-08-06 16:30:25', 0, '2022-08-06 11:00:25', '2022-08-06 11:00:25'),
(13, 'start', 1, '2022-08-06 16:30:31', 0, '2022-08-06 11:00:31', '2022-08-06 11:00:31'),
(14, 'stop', 1, '2022-08-06 16:30:39', 0, '2022-08-06 11:00:39', '2022-08-06 11:00:39'),
(15, 'start', 1, '2022-08-23 11:34:10', 0, '2022-08-23 06:04:10', '2022-08-23 06:04:10'),
(16, 'stop', 1, '2022-08-23 11:34:42', 1, '2022-08-23 06:04:42', '2022-08-23 06:04:56'),
(17, 'stop', 1, '2022-08-23 11:35:03', 0, '2022-08-23 06:05:03', '2022-08-23 06:05:03'),
(18, 'start', 1, '2022-08-23 11:35:32', 0, '2022-08-23 06:05:32', '2022-08-23 06:05:32'),
(19, 'stop', 1, '2022-08-23 11:35:40', 0, '2022-08-23 06:05:40', '2022-08-23 06:05:40'),
(20, 'start', 1, '2022-08-23 11:35:48', 0, '2022-08-23 06:05:48', '2022-08-23 06:05:48'),
(21, 'stop', 1, '2022-08-23 11:45:39', 0, '2022-08-23 06:15:39', '2022-08-23 06:15:39'),
(22, 'start', 1, '2022-08-24 14:54:48', 0, '2022-08-24 09:24:48', '2022-08-24 09:24:48'),
(23, 'stop', 1, '2022-08-24 14:54:58', 0, '2022-08-24 09:24:58', '2022-08-24 09:24:58'),
(24, 'start', 1, '2022-08-24 14:55:09', 0, '2022-08-24 09:25:09', '2022-08-24 09:25:09'),
(25, 'stop', 1, '2022-08-24 14:55:16', 0, '2022-08-24 09:25:17', '2022-08-24 09:25:17'),
(26, 'start', 3, '2022-08-26 14:25:03', 0, '2022-08-26 08:55:03', '2022-08-26 08:55:03');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `name`, `email`, `image_path`, `email_verified_at`, `password`, `remember_token`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rajdip', 'r@gmail.com', 'Rajdip_1658818086.jpg', NULL, '$2y$10$Sy3PnqMu36jw/4OmK4F4i..rA6xH8yvNJqOJ/jp0ZOU5Ar9xBWJZq', NULL, 0, '2022-07-26 06:48:06', '2022-07-26 06:48:06'),
(2, 2, 'vivek', 'v@gmail.com', 'vivek_1658818166.jpg', NULL, '$2y$10$Sy3PnqMu36jw/4OmK4F4i..rA6xH8yvNJqOJ/jp0ZOU5Ar9xBWJZq', NULL, 0, '2022-07-26 06:49:26', '2022-07-26 06:49:26'),
(3, 3, 'yash', 'y@gmail.com', 'yash_1658818209.jpg', NULL, '$2y$10$Sy3PnqMu36jw/4OmK4F4i..rA6xH8yvNJqOJ/jp0ZOU5Ar9xBWJZq', NULL, 0, '2022-07-26 06:50:09', '2022-07-26 06:50:09'),
(4, 3, 'dhruv', 'd@gmail.com', 'dhruv_1659335505.jpg', NULL, '$2y$10$2VXaTm.EuDSt9XDyuhO.EeVrHFwtUgbSaD1fXNfSGwsOQ/ID5RT5u', NULL, 0, '2022-07-26 06:50:37', '2022-08-01 06:31:45'),
(5, 3, 'meet', 'm@gmail.com', 'meet_1658818267.jpg', NULL, '$2y$10$WUT/KWdOTMdZzhMvzDgBbevnJhfDz4BJXIdBZTtcFLgbmdayrD7Uq', NULL, 0, '2022-07-26 06:51:07', '2022-07-30 10:17:59'),
(6, 3, 'meera m', 'meera@gmail.com', NULL, NULL, '$2y$10$tNDe.7geJhiJG0gkmJZ6QOgjcnbCwJKj/dzSu.8tcTxCFTZ.sjXr6', NULL, 0, '2022-08-01 07:20:55', '2022-08-25 10:55:42'),
(7, 3, 'sumit', 'sumit@gmail.com', 'sumit_1661427245.jpg', NULL, '$2y$10$qoWecUcTN5.csNbghYqSZ.s7T9lmM4B/VYJLVduCUVu8/7886kvM2', NULL, 0, '2022-08-25 11:28:04', '2022-08-25 11:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `working_location_master`
--

CREATE TABLE `working_location_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_location_master`
--

INSERT INTO `working_location_master` (`id`, `name`, `isDelete`, `created_at`, `updated_at`) VALUES
(1, 'Ahmedabad', 0, '2022-07-20 07:04:49', '2022-07-20 07:04:49'),
(2, 'Hyderabad', 0, '2022-07-20 07:04:49', '2022-07-20 07:04:49'),
(3, 'remote', 0, '2022-07-20 07:04:49', '2022-07-20 07:04:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_category_master`
--
ALTER TABLE `client_category_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_master_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_role_master`
--
ALTER TABLE `job_role_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_vs_comment`
--
ALTER TABLE `project_vs_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_vs_comment_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_vs_events`
--
ALTER TABLE `project_vs_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_vs_events_user_id_foreign` (`user_id`);

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
-- Indexes for table `working_location_master`
--
ALTER TABLE `working_location_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client_category_master`
--
ALTER TABLE `client_category_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_role_master`
--
ALTER TABLE `job_role_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_vs_comment`
--
ALTER TABLE `project_vs_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `project_vs_events`
--
ALTER TABLE `project_vs_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `time_tracker`
--
ALTER TABLE `time_tracker`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `working_location_master`
--
ALTER TABLE `working_location_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client_master`
--
ALTER TABLE `client_master`
  ADD CONSTRAINT `client_master_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_vs_comment`
--
ALTER TABLE `project_vs_comment`
  ADD CONSTRAINT `project_vs_comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `project_vs_events`
--
ALTER TABLE `project_vs_events`
  ADD CONSTRAINT `project_vs_events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
