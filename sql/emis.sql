-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2019 at 07:54 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutli`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `cnic` bigint(20) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `cnic`, `email`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 99999999999, 0, 'super@admin.com', '$2y$04$xjUrUueX1ZrTGffLOvR4RuepA3JbmdmDItQXgx2BbDx5GJF4YkNHO', 1, '3YQJMxv1FACqU1iRMP7iZt93kVHcmeYAguSXfLspNCNlNapmIQoQ70R8qZ5L', '2019-07-20 08:17:58', '2019-07-20 08:17:58'),
(2, 'admin', 11111111111, 1111111111111, 'admin@email.com', '$2y$10$yT1znLZlUzxjj4l/5IOVru/acefFeRqFqwggXCmm8Mfp28q3JiuD.', 1, NULL, '2019-07-20 08:20:01', '2019-07-20 08:20:01'),
(3, 'zeeshan', 22222222222, 2222222222222, 'teacher@email.com', '$2y$10$xz9CWwFIE97OEGE8ZFCwDetxMkKolj902EhBsbYYWuy9dDMX2lSru', 1, NULL, '2019-07-20 08:20:34', '2019-07-20 08:20:34'),
(4, 'nabeel', 33333333333, 3333333333333, 'student@email.com', '$2y$10$hVGUnlN0ajLlzgEsucRIK.FSFh8lgXzGB09IsRiMYe04u9bGt0oui', 1, NULL, '2019-07-20 08:21:11', '2019-07-20 08:21:11'),
(5, 'kamran', 55555555555, 5555555555555, 'parent@email.com', '$2y$10$VJhYgQpc5NRFn2zZ9U5K6uKw0KPO0qeLapPwmx7V0JDfRvHAkm.Au', 1, NULL, '2019-07-20 08:21:55', '2019-07-20 08:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `admin_control`
--

CREATE TABLE `admin_control` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kpass` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doa` date NOT NULL,
  `cnic` bigint(20) NOT NULL,
  `attendance` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eng` int(11) NOT NULL,
  `urdu` int(11) NOT NULL,
  `maths` int(11) NOT NULL,
  `cptr` int(11) NOT NULL,
  `isl` int(11) NOT NULL,
  `pakstd` int(11) NOT NULL,
  `phy` int(11) NOT NULL,
  `chem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_control`
--

INSERT INTO `admin_control` (`id`, `kpass`, `name`, `father_name`, `phone_number`, `dob`, `gender`, `religion`, `blood_group`, `sec`, `doa`, `cnic`, `attendance`, `comments`, `eng`, `urdu`, `maths`, `cptr`, `isl`, `pakstd`, `phy`, `chem`, `created_at`, `updated_at`) VALUES
(1, 'z9k1', 'Zeeshan Agha', 'Kamran', '090078601', '2019-07-13', 'Male', 'Islam', 'A+', '9th', '2019-07-04', 5555555555555, 'Absent', 'Misbehaviour with mathematics teacher.', 51, 40, 60, 69, 56, 42, 65, 52, '2019-07-20 08:27:38', '2019-07-24 10:57:03'),
(2, 'u10n2', 'Umer Farooq', 'Nagra', '12345678901', '2019-07-06', 'Male', 'Islam', 'C=', '10th', '2019-07-06', 1111111111111, 'Present', 'A non-productive day', 67, 56, 47, 70, 43, 39, 59, 33, '2019-07-20 08:52:44', '2019-07-24 10:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `admin_role`
--

CREATE TABLE `admin_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_role`
--

INSERT INTO `admin_role` (`id`, `role_id`, `admin_id`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 4),
(5, 6, 5);

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
(3, '2017_03_06_023521_create_admins_table', 1),
(4, '2017_03_06_053834_create_admin_role_table', 1),
(5, '2018_03_06_023523_create_roles_table', 1),
(6, '2019_07_14_194646_create_admin_table', 1),
(7, '2019_07_20_174627_create_teacher_cmt', 2);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'super', '2019-07-20 08:17:58', '2019-07-20 08:17:58'),
(3, 'admin', '2019-07-20 08:18:38', '2019-07-20 08:18:38'),
(4, 'teacher', '2019-07-20 08:18:54', '2019-07-20 08:18:54'),
(5, 'student', '2019-07-20 08:19:03', '2019-07-20 08:19:03'),
(6, 'parent', '2019-07-20 08:19:13', '2019-07-20 08:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `table9`
--

CREATE TABLE `table9` (
  `id` int(30) NOT NULL,
  `one` varchar(30) NOT NULL,
  `two` varchar(30) NOT NULL,
  `three` varchar(30) NOT NULL,
  `four` varchar(30) NOT NULL,
  `five` varchar(30) NOT NULL,
  `six` varchar(30) NOT NULL,
  `seven` varchar(30) NOT NULL,
  `eight` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table9`
--

INSERT INTO `table9` (`id`, `one`, `two`, `three`, `four`, `five`, `six`, `seven`, `eight`) VALUES
(1, '', '', '', '', '', '', '', ''),
(2, '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', ''),
(4, '', '', '', '', '', '', '', ''),
(5, '', '', '', '', '', '', 'Leave', 'Leave');

-- --------------------------------------------------------

--
-- Table structure for table `table10`
--

CREATE TABLE `table10` (
  `id` varchar(20) NOT NULL,
  `one` varchar(20) NOT NULL,
  `two` varchar(20) NOT NULL,
  `three` varchar(20) NOT NULL,
  `four` varchar(20) NOT NULL,
  `five` varchar(20) NOT NULL,
  `six` varchar(20) NOT NULL,
  `seven` varchar(20) NOT NULL,
  `eight` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table10`
--

INSERT INTO `table10` (`id`, `one`, `two`, `three`, `four`, `five`, `six`, `seven`, `eight`) VALUES
('1', 'English', 'Urdu', 'Maths', 'Computer/Bio', 'Isl', 'Pak Std', 'Physics', 'Chemistry'),
('2', 'Chemistry', 'Physics', 'Pak Std', 'Isl', 'Computer/Bio', 'Maths', 'Urdu', 'English'),
('3', 'Maths', 'Computer/Bio', 'Isl', 'Chemistry', 'Urdu', 'Physics', 'Pak Std', 'English'),
('4', 'Urdu', 'Physics', 'Pak Std', 'Isl', 'Maths', 'Computer/Bio', 'English', 'Chemistry'),
('5', 'Isl', 'Computer/Bio', 'Maths', 'Urdu', 'Physics', 'English', 'LEAVE', 'LEAVE');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_control`
--
ALTER TABLE `admin_control`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `table9`
--
ALTER TABLE `table9`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table10`
--
ALTER TABLE `table10`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_control`
--
ALTER TABLE `admin_control`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_role`
--
ALTER TABLE `admin_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_role`
--
ALTER TABLE `admin_role`
  ADD CONSTRAINT `admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
