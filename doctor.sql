-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 03:15 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `admin_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'Mursheda Akter Shiuly', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '01708042642', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_address` varchar(111) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consulting_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `doctor_name`, `speciality`, `patient_name`, `patient_id`, `patient_age`, `patient_email`, `patient_phone`, `patient_address`, `appointment_date`, `appointment_time`, `payment_method`, `consulting_fee`, `created_at`, `updated_at`) VALUES
(7, 'Dr. Anamur Rahman', 'Orthopedics', 'Saifur Rahman', '4', '22', 'saifurrahmanrasel4627@gmail.com', '01782614627', 'Comilla', '24 December 2020', '4:44 PM', '1', '600 ৳', NULL, NULL),
(9, 'Dr. Jillur Rahman', 'Psychiatry', 'Mursheda', '6', '22', 'shiuly@gmail.com', '01782614627', 'Sylhet', '29 December 2020', '6:49 PM', '1', '400 ৳', NULL, NULL),
(12, 'Mursheda Khanom', 'General Medicine', 'Mursheda', '6', '22', 'shiuly@gmail.com', '01782614627', 'Sylhet', '20 December 2020', '5:00 PM', '1', '600 ৳', NULL, NULL),
(16, 'Dr. Anamur Rahman', 'Orthopedics', 'Mursheda', '6', '22', 'shiuly@gmail.com', '01782614627', 'Sylhet', '23 December 2020', '9:00 PM', '1', '600 ৳', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `treatment_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `treatment_name`, `created_at`, `updated_at`) VALUES
(1, 'Cardiology', NULL, NULL),
(2, 'Dermatology', NULL, NULL),
(3, 'ENT', NULL, NULL),
(4, 'Pediatrics', NULL, NULL),
(5, 'General Surgery', NULL, NULL),
(6, 'Orthopedics', NULL, NULL),
(7, 'General Medicine', NULL, NULL),
(8, 'Psychiatry', NULL, NULL),
(9, 'Nephrology', NULL, NULL),
(10, 'Pathologist', NULL, NULL),
(11, 'Craniologist', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', NULL, NULL),
(2, 'Chittagonj', NULL, NULL),
(3, 'Sylhet', NULL, NULL),
(4, 'Comilla', NULL, NULL),
(5, 'Khulna', NULL, NULL),
(6, 'Barishal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consulting_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctor_name`, `image`, `department`, `degree`, `visit_time`, `visit_day`, `consulting_fee`, `contact_number`, `chamber`, `location`, `created_at`, `updated_at`) VALUES
(3, 'Dr. Anamur Rahman', 'public/image/5ZlBTpMcrVUkcpu0N1Z1.jpg', '6', 'MBBS,FCPS', '4:00 PM - 9:00 PM', 'Saturday to Tuesday', '600', '0189198800', 'Al-Haramain Hospital', '3', NULL, NULL),
(8, 'Dr. Jillur Rahman', 'public/image/2NOHF4f2POqzn5Om3kLn.jpg', '8', 'BCS in MBBS , FCPS', '11:00 AM - 7:00 PM', 'Saturday - Monday', '400', '01892816711', 'Osmani Medical College', '3', NULL, NULL),
(10, 'Dr. Masruf Ahmed', 'public/image/eB105uA2vAOTZEcQLJvS.jpg', '1', 'BCS in MBBS , FCPS', '11:00 AM - 7:00 PM', 'Saturday - Monday', '400', '01892816711', 'Osmani Medical College', '2', NULL, NULL),
(11, 'Mursheda Khanom', 'public/image/w8Pp4zsuEQITSpGxd6uM.jpg', '7', 'MBBS,BDS,FCPS', '4:00pm - 7:00pm', 'Friday - Tuesday', '600', '0197237212', 'Ragib Rabeya Medical College', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_30_193539_create_admins_table', 1),
(3, '2020_12_05_135619_create_categories_table', 2),
(4, '2020_12_06_064057_create_doctors_table', 3),
(5, '2020_12_06_064954_create_doctors_table', 4),
(6, '2020_12_07_060750_create_city_table', 5),
(7, '2020_12_07_084711_create_users_table', 6),
(8, '2020_12_10_060714_create_appointment_table', 7),
(9, '2020_12_15_131719_create_setting_table', 8),
(10, '2020_12_15_194802_create_patient_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `email`, `phone`, `address`, `password`, `created_at`, `updated_at`) VALUES
(4, 'Saifur Rahman', '22', 'saifurrahmanrasel4627@gmail.com', '01782614627', 'Comilla', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(5, 'Rasel', '22', 'srr@gmail.com', '012345567788', 'Comilla', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
(6, 'Mursheda', '22', 'shiuly@gmail.com', '01782614627', 'Sylhet', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_fb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `company_name`, `company_website`, `company_email`, `company_phone`, `company_fb`, `company_address`, `company_city`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'DoctorsInfo', 'www.doctorsinfo.com', 'shiulycse@gmail.com', '01708042642', 'facebook.com/mursheda2642', '19/B road, Zindabazar', 'Sylhet 3100', 'public/image/Gkn2lOw0s5ctiDgL7uOO.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consulting_fee` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
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
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
