-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2025 at 05:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `license_no` bigint(50) DEFAULT NULL,
  `adhar_no` bigint(50) DEFAULT NULL,
  `exp_date` datetime DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated-at` datetime DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `license_no`, `adhar_no`, `exp_date`, `phone`, `created_at`, `updated-at`, `created_by`, `updated_by`, `status`) VALUES
(4, 'uigfdyufgdy', 3548451, 32158478784, '2025-01-03 00:00:00', 1445879658, '2024-12-30 14:13:12', NULL, NULL, NULL, 1),
(5, 'hvcuyfccfgy', 2488484, 65418784522, '2025-01-16 00:00:00', 2147483647, '2025-01-01 11:47:31', NULL, NULL, NULL, 1),
(6, 'hjgyfgvy', 654848454, 7956121212, '2025-01-15 00:00:00', 2147483647, '2025-01-02 11:42:11', NULL, NULL, NULL, 1),
(7, 'fctyftgvfy', 96778754, 4, '0000-00-00 00:00:00', 0, '2025-01-02 11:48:41', NULL, NULL, NULL, 1),
(8, 'fctyftgvfy', 96778754, 48, '0000-00-00 00:00:00', 0, '2025-01-02 11:49:11', NULL, NULL, NULL, 1),
(9, 'fctyftgvfy', 96778754, 48, '0000-00-00 00:00:00', 0, '2025-01-02 12:49:43', NULL, NULL, NULL, 1),
(10, 'dgvtrhyrejneyt', 4897845454, 548787455, '2025-01-16 00:00:00', 548, '2025-01-02 12:52:25', NULL, NULL, NULL, 1),
(11, 'mjgvfyuvgfryv', 548845451, 618588, '0000-00-00 00:00:00', 0, '2025-01-02 13:01:32', NULL, NULL, NULL, 1),
(12, 'dhtfgjthrf', 234848421, 31874, '0000-00-00 00:00:00', 0, '2025-01-02 13:04:10', NULL, NULL, NULL, 1),
(13, 'jdgctds', 5787454, 638978454, '2025-01-07 00:00:00', 2147483647, '2025-01-06 13:44:45', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `license_no` int(10) NOT NULL,
  `adhar_no` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(10) NOT NULL,
  `plan_name` varchar(50) DEFAULT NULL,
  `ammount` bigint(50) NOT NULL,
  `services` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `ammount`, `services`, `created_at`, `updated_at`, `status`, `created_by`, `updated_by`) VALUES
(1, 'serewr', 123456, 'werwer', '2024-09-23 15:04:51', '2024-10-17 14:06:27', 1, NULL, NULL),
(3, 'hbjcvdtgcdy', 85522, 'jhcudhc9ic', '2024-10-15 15:18:34', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `date`, `name`, `email`, `phone_no`) VALUES
(1, '2024-12-18 15:01:03', 'vbdbfgvdv ', 'vcfsvsav@gmail.com', 2147456523);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `image`, `name`, `description`, `created_at`, `updated_at`, `status`, `created_by`, `updated_by`) VALUES
(1, 'mobile.jpg', 'xdsgbgfm', 'sfsfgnhmj', '2024-09-23 15:11:42', NULL, 1, NULL, NULL),
(2, 'Shifting.jpg', 'dhtfgjthrf', 'hhhvfcdrcfvgb', '2024-12-18 09:44:02', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `image` varchar(300) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `name`, `description`, `created_at`, `updated_at`, `status`, `created_by`, `updated_by`) VALUES
(1, 'headphone.jpg', 'ndjhvud', 'cmiduhcieudkbcsd', '2024-09-23 15:10:43', NULL, 1, NULL, NULL),
(2, 'Shifting.jpg', 'hjcydcgid', 'bcydg6ffgudsc', '2024-10-15 15:23:37', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `confirm_password` varchar(10) DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `created_at`, `updated_at`, `status`, `created_by`, `password`, `confirm_password`, `updated_by`) VALUES
(1, 'Vaishnavi Rabade', 'vaishnavi12@gmail.com', 8805197365, '2024-09-23 18:29:24', '2024-09-27 13:54:59', 1, NULL, '01102003', NULL, NULL),
(5, 'Ram Patil', 'ram@patil.com', 9876543214, '2024-09-25 11:11:22', '2024-09-25 11:23:46', 1, NULL, '2c7a5a6bfa4b5baee3b981b7803c3747', NULL, NULL),
(7, 'Raj Rabade', 'raj@4584.com', 7896541239, '2024-09-25 11:20:23', '2024-09-27 13:58:20', 1, NULL, '3607eae1b2ff170c1d078b7b2be4b568', NULL, NULL),
(8, 'kavya dongale', 'kavya@123.com', 7896541238, '2024-09-25 12:23:32', '2024-09-27 13:57:35', 1, NULL, 'a53cf34b6f20b5d8a7170774c44f55c3', NULL, NULL),
(9, 'kavya dongale', 'kavya@123.com', 7896541239, '2024-09-25 12:23:58', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(17, 'Radhika patil', 'patil3139@gmail.com', 7896541239, '2024-09-26 13:48:43', '2024-09-26 14:41:41', 1, NULL, 'bcb3813259b11e5776d4b5044a1196ce', NULL, NULL),
(23, 'Swapnil Pathade', 'swapnil@nnulou.in', 8411066851, '2024-09-26 15:39:13', '2024-12-16 09:37:17', 1, NULL, '2ad86a84300dd141dcc878f3d7e8a78b', NULL, NULL),
(24, 'test', 'kavya@1234.com', 1234567890, '2024-09-26 15:41:50', NULL, 1, NULL, 'e807f1fcf82d132f9bb018ca6738a19f', NULL, NULL),
(26, 'prem patil', 'prem@12gmail.com', 7896541239, '2024-09-27 13:54:19', NULL, 1, NULL, 'fa246d0262c3925617b0c72bb20eeb1d', NULL, NULL),
(27, 'nbcdhgfced bdhgvd', 'ncn@123gmail.com', 7896541239, '2024-09-27 14:57:33', NULL, 1, NULL, '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL),
(28, ' b dfbvysd', 'chbvdb@gmail.com', 9988774521, '2024-09-27 14:59:25', NULL, 1, NULL, '68053af2923e00204c3ca7c6a3150cf7', NULL, NULL),
(29, 'dhanu patil', 'dhanu@123gmail.com', 7896541239, '2024-09-27 15:27:45', NULL, 1, NULL, 'e9510081ac30ffa83f10b68cde1cac07', NULL, NULL),
(30, 'dhanu patil', 'dhanu@123gmail.com', 7896541239, '2024-09-27 15:29:27', NULL, 1, NULL, 'e9510081ac30ffa83f10b68cde1cac07', NULL, NULL),
(31, 'diksha patil', 'diksha@gmail.com', 7896541239, '2024-09-28 08:48:44', NULL, 1, NULL, 'fd2c5e4680d9a01dba3aada5ece22270', NULL, NULL),
(32, 'diksha patil', 'diksha@gmail.com', 7896541239, '2024-09-28 08:50:55', NULL, 1, NULL, 'fd2c5e4680d9a01dba3aada5ece22270', NULL, NULL),
(35, 'vaishnav rabade', 'vaishnav0407@gmail.com', 7896541239, '2024-10-01 12:55:51', NULL, 1, NULL, 'd47268e9db2e9aa3827bba3afb7ff94a', NULL, NULL),
(36, 'sakshi patil', 'sakshi@gmail.com', 7744936558, '2024-10-01 14:02:43', NULL, 1, NULL, '86b20716fbd5b253d27cec43127089bc', NULL, NULL),
(37, 'cdc', '', 0, '2024-10-01 14:32:03', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(38, '', '', 0, '2024-10-01 14:32:42', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(39, '', '', 0, '2024-10-01 14:36:37', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(40, '', '', 0, '2024-10-01 14:39:05', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(41, '', '', 0, '2024-10-01 14:39:37', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(42, '', '', 0, '2024-10-01 14:44:57', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(43, '', '', 0, '2024-10-01 14:45:45', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(44, '', '', 0, '2024-10-03 13:03:50', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(45, '', '', 0, '2024-10-03 13:43:13', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(46, '', '', 0, '2024-10-03 13:43:22', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(47, '', '', 0, '2024-10-03 14:00:30', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(48, 'nfg', '', 0, '2024-10-03 14:00:39', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(49, '', '', 0, '2024-10-03 14:01:07', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(50, '', '', 0, '2024-10-03 14:01:15', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(51, '', '', 0, '2024-10-03 14:02:51', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(52, '', '', 0, '2024-10-03 14:02:54', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(53, '', '', 0, '2024-10-03 14:04:27', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(54, '', '', 0, '2024-10-03 14:12:31', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(55, '', '', 0, '2024-10-03 14:13:23', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(56, '', '', 0, '2024-10-03 14:20:44', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(57, 'Tushar Patil', 'tushar8970@gmail.com', 7896541239, '2024-10-08 13:53:26', NULL, 1, NULL, '518a38cc9a0173d0b2dc088166981cf8', NULL, NULL),
(58, '', '', 0, '2024-10-08 14:02:48', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(59, '', '', 0, '2024-10-08 14:20:20', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(60, '', '', 0, '2024-10-08 14:28:11', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(61, '', '', 0, '2024-10-08 14:29:38', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(62, '', '', 0, '2024-10-08 14:32:15', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(63, '', '', 0, '2024-10-08 14:41:10', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(64, '', '', 0, '2024-10-08 14:43:44', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(65, '', '', 0, '2024-10-08 14:45:04', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(66, '', '', 0, '2024-10-08 15:14:49', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(67, '', '', 0, '2024-10-08 15:34:58', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(68, '', '', 0, '2024-10-08 15:35:52', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(69, '', '', 0, '2024-10-08 15:41:12', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(70, '', '', 0, '2024-10-08 15:41:29', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(71, '', '', 0, '2024-10-15 13:56:39', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(72, '', '', 0, '2024-10-15 13:58:17', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(73, '', '', 0, '2024-10-15 13:59:36', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(74, '', '', 0, '2024-10-15 13:59:51', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(75, '', '', 0, '2024-10-15 14:00:23', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(76, '', '', 0, '2024-10-15 14:01:06', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(77, '', '', 0, '2024-10-15 14:06:59', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(78, '', '', 0, '2024-10-15 14:08:14', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(79, '', '', 0, '2024-10-15 14:21:33', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(85, 'vaishnavi', 'kavya@123.com', 7896541239, '2024-10-15 15:14:15', NULL, 1, NULL, '934b535800b1cba8f96a5d72f72f1611', NULL, NULL),
(86, 'Adarsh Bille', 'adarsh11372@gmail.com', 7896541232, '2024-10-15 15:16:41', NULL, 1, NULL, '934b535800b1cba8f96a5d72f72f1611', NULL, NULL),
(87, 'Adarsh Bille', 'adarsh11372@gmail.com', 7896541232, '2024-10-15 15:17:01', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(88, 'om patil', 'ompatil@3113gmail.com', 9106758547, '2024-11-19 11:07:10', NULL, 1, NULL, '00989c20ff1386dc386d8124ebcba1a5', NULL, NULL),
(89, '', '', 0, '2024-11-20 10:35:01', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(90, '', '', 0, '2024-11-20 10:37:47', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(91, '', '', 0, '2024-11-20 10:38:01', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(92, '', '', 0, '2024-11-20 10:40:38', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(93, 'dhtfgjthrf', 'kavya@123.com', 9988774521, '2024-11-20 10:40:57', NULL, 1, NULL, '7bccfde7714a1ebadf06c5f4cea752c1', NULL, NULL),
(94, '', '', 0, '2024-11-20 10:41:07', NULL, 1, NULL, 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL),
(95, 'dhtfgjthrf', 'kavya@123.com', 7896541239, '2024-11-22 14:18:58', NULL, 1, NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL),
(97, 'vdgv', 'swapnil@test.com', 9988774521, '2024-12-10 13:44:31', NULL, 1, NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL),
(98, 'vdv', 'swapnil@test.com', 9988774521, '2024-12-10 13:45:44', NULL, 1, NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL),
(99, 'btnhtr', 'tushar8970@gmail.com', 7896541239, '2024-12-10 13:49:16', NULL, 1, NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL),
(100, 'dgrht', 'kavya@123.com', 9988774521, '2024-12-10 13:50:04', NULL, 1, NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL),
(101, 'dhtfgjthrf', 'kavya@123.com', 9876543214, '2024-12-10 13:51:43', NULL, 1, NULL, '250cf8b51c773f3f8dc8b4be867a9a02', NULL, NULL),
(102, 'asdad', 'kavya@123.com', 7896541239, '2024-12-10 14:02:36', NULL, 1, NULL, 'b06bc53a6469a10f23a11251a1790e36', NULL, NULL),
(103, 'ssdfd', 'kavya@123.com', 7896541239, '2024-12-10 14:07:52', NULL, 1, NULL, '17220da3f42dce4c973cd6b7216668dd', NULL, NULL),
(104, 'dhtfgjthrf', 'swapnil@test.com', 9988774521, '2024-12-10 14:11:43', NULL, 1, NULL, '202cb962ac59075b964b07152d234b70', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
