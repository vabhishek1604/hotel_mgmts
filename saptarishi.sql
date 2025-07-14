-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 12:13 PM
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
-- Database: `dngcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_master`
--

CREATE TABLE `action_master` (
  `id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `action_type` enum('Main Menu','Sub Menu') NOT NULL,
  `action_id` int(11) DEFAULT NULL,
  `action_name` varchar(100) NOT NULL,
  `action_icon` varchar(100) DEFAULT NULL,
  `type` enum('Private_Url','Public_Url') DEFAULT NULL,
  `action_url` varchar(100) NOT NULL,
  `remark` text DEFAULT NULL,
  `addedby` int(11) DEFAULT 0,
  `entrydt` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `action_master`
--

INSERT INTO `action_master` (`id`, `group_id`, `action_type`, `action_id`, `action_name`, `action_icon`, `type`, `action_url`, `remark`, `addedby`, `entrydt`, `updated_by`, `updated_at`, `is_active`) VALUES
(1, 2, 'Main Menu', NULL, 'Amenities', NULL, NULL, 'amenities/index', 'amenities', 14, '2020-08-19 14:49:05', 14, '2020-08-19 09:19:05', 1),
(3, 2, 'Main Menu', NULL, 'User Management', NULL, NULL, 'users/index', 'employee', 14, '2020-08-19 18:10:46', 14, '2022-05-16 10:48:44', 1),
(4, 2, 'Main Menu', NULL, 'Projects', NULL, NULL, 'project/index', 'project', 14, '2020-09-14 17:53:16', 14, '2022-05-16 10:15:30', 1),
(5, 2, 'Main Menu', NULL, 'Page Content', NULL, NULL, 'pagecontent/index', 'pagecontent', 14, '2020-09-19 12:39:59', 14, '2022-05-16 10:17:00', 1),
(6, 2, 'Main Menu', NULL, 'Menus', NULL, NULL, 'menues/index', 'menues', 14, '2020-09-19 12:47:13', 14, '2020-09-19 07:17:13', 1),
(7, 2, 'Main Menu', NULL, 'Properties', NULL, NULL, 'projectavail/index', 'projectavail', 14, '2020-09-19 13:25:38', 14, '2020-09-19 07:55:38', 1),
(8, 2, 'Main Menu', NULL, 'Project Image', NULL, NULL, 'projectimg/index', 'projectimg', 14, '2020-09-23 13:03:25', 14, '2022-05-16 10:21:38', 1),
(9, 2, 'Main Menu', NULL, 'Banner', NULL, NULL, 'slider/index', 'slider', 14, '2020-09-23 13:04:03', 14, '2022-05-16 10:23:31', 1),
(10, 2, 'Main Menu', NULL, 'Gallery', NULL, NULL, 'gallery/create', 'gallery', 14, '2020-10-06 02:47:05', 14, '2022-05-16 10:25:09', 1),
(12, 2, 'Main Menu', NULL, 'CMS MANAGEMENT', NULL, NULL, '#', 'CMS', 14, '2020-10-19 18:29:08', 14, '2020-10-19 12:59:08', 1),
(13, 2, 'Sub Menu', 12, 'TEST SLIDER', NULL, NULL, 'testslider/index', 'test_slider', 14, '2020-10-19 18:29:51', 14, '2022-05-16 10:07:22', 1),
(14, 2, 'Main Menu', NULL, 'Action Master', NULL, NULL, 'actionmaster/index', 'employees', 14, '2020-10-19 18:31:51', 14, '2022-05-16 09:51:04', 1),
(15, 2, 'Sub Menu', 12, 'SARAH IMAGES', NULL, NULL, 'saraimages/index', 'sara_images', 14, '2020-10-19 18:33:11', 14, '2022-05-16 10:33:02', 1),
(16, 2, 'Sub Menu', 12, 'TESTIMONIALS', NULL, NULL, 'testimonials/index', 'testimonial', 14, '2020-10-19 19:39:33', 14, '2022-05-16 10:27:01', 1),
(17, 2, 'Main Menu', NULL, 'Category', NULL, NULL, 'category/index', 'menu', 14, '2022-05-16 15:12:22', 14, '2022-05-16 10:36:54', 1),
(19, 2, 'Main Menu', NULL, 'All States', NULL, NULL, 'all-states/index', 'allstates', 14, '2022-05-16 15:24:31', 14, '2022-05-16 10:38:31', 1),
(21, 2, 'Main Menu', NULL, 'Ice-Cream', NULL, NULL, 'ice-cream/index', 'ice_cream', 14, '2022-05-16 15:26:44', 14, '2022-05-16 10:39:57', 1),
(23, 2, 'Main Menu', NULL, 'Groups', NULL, NULL, 'groups/index', 'groups', 14, '2022-05-16 16:13:05', 14, '2022-05-16 10:43:05', 1),
(24, 2, 'Main Menu', NULL, 'Members', NULL, NULL, 'members/index', 'members', 14, '2022-05-16 16:23:26', 14, '2022-05-16 10:53:26', 1),
(25, 2, 'Main Menu', NULL, 'Student Login', NULL, NULL, 'student-login/index', 'login', 14, '2022-05-16 16:33:18', 14, '2022-05-16 11:03:18', 1),
(26, 2, 'Main Menu', NULL, 'Waterpark Entry', NULL, NULL, 'waterpark-entry', 'waterpark-entry', 14, '2022-05-16 16:58:01', 14, '2022-05-16 11:28:01', 1),
(27, 2, 'Main Menu', NULL, 'University', NULL, NULL, 'university/index', 'university', 14, '2022-05-16 17:06:08', 14, '2022-05-16 11:36:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `company_title` varchar(255) NOT NULL,
  `company_desc` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `company_gstin` varchar(100) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(100) DEFAULT NULL,
  `bank_ifsc` varchar(50) DEFAULT NULL,
  `term_condition` text DEFAULT NULL,
  `company_logo` varchar(100) DEFAULT NULL,
  `company_favicon` text NOT NULL,
  `company_logo_lg` varchar(100) DEFAULT NULL,
  `company_address` varchar(150) DEFAULT NULL,
  `comp_state_id` int(11) DEFAULT NULL,
  `website_url` varchar(150) DEFAULT NULL,
  `official_email_id` varchar(150) DEFAULT NULL,
  `support_mail` varchar(150) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `company_facebook` varchar(255) NOT NULL,
  `company_twitter` varchar(255) NOT NULL,
  `company_linkedin` varchar(255) NOT NULL,
  `company_skype` varchar(255) NOT NULL,
  `item_alloted_superadmin` int(11) DEFAULT 0,
  `fb_url` varchar(255) DEFAULT NULL,
  `insta_url` varchar(255) DEFAULT NULL,
  `is_running` int(11) DEFAULT 0,
  `is_active` int(11) DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `user_id`, `company_name`, `company_title`, `company_desc`, `company_gstin`, `bank_name`, `bank_account_no`, `bank_ifsc`, `term_condition`, `company_logo`, `company_favicon`, `company_logo_lg`, `company_address`, `comp_state_id`, `website_url`, `official_email_id`, `support_mail`, `contact_number`, `company_facebook`, `company_twitter`, `company_linkedin`, `company_skype`, `item_alloted_superadmin`, `fb_url`, `insta_url`, `is_running`, `is_active`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, NULL, 'DNG Builders', '', '<p>The firm ‘DNG BUILDERS’ has established by Deepak Agrawal and DNG Commenced there construction activities.\r\nSince 29th of Nov 2002 in this little time we have achieved many of war footing jobs targets in different types of constructions activities. We worked as a contractor in many Educational Institutes, Corporate Firms and with Govt. of Madhya Pradesh.', '23ASZPG7575M1ZS', 'Union Bank Of India', '447805010090961', 'UBIN0544787', '1. Payment has to be made within 15 days from the date of billing in full.</br> 2. If any claims arise, has to be informed by the buyer before unloading the goods and / or</br> immediately after unloading the goods; afterwards no claims will be entertained.', '/web/uploads/comp/28091.png', '/web/uploads/comp/60411.png', NULL, '<ul class=\"\"> <li>1292/5, 1st Floor,</li><li>In Front of GRC Mess,</li><li>Narmada Road,</li><li>Jabalpur (M.P.), India</li>', 23, 'http://dngbuilder.com/', 'dnggroup333@gmail.com', 'deepak_agrawal4u@yahoo.com', '+91-761-4075333', 'https://www.facebook.com/DNGBuildersJabalpur/', 'https://www.instagram.com/dngbuilderjbp/', '', '', 1, 'https://www.facebook.com/Sushilaherbal', '', 0, 1, NULL, NULL, NULL, '2020-09-26 13:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) DEFAULT NULL,
  `emp_type` varchar(100) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `father_name` varchar(200) DEFAULT NULL,
  `mother_name` varchar(200) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `alt_contact_no` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `blood_group` varchar(200) DEFAULT NULL,
  `adhaar_card` varchar(100) DEFAULT NULL,
  `adhaar_photo` varchar(100) DEFAULT NULL,
  `state_id` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `entrydt` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `action` varchar(200) DEFAULT NULL,
  `isactive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `action`, `isactive`) VALUES
(1, 'Superadmin', 'site/index', 1),
(2, 'Admin', 'site/index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activation_code` varchar(100) NOT NULL,
  `forgotten_password_code` varchar(100) NOT NULL,
  `forgotten_password_time` datetime NOT NULL,
  `role` enum('sa','admin','user','member') NOT NULL,
  `authKey` varchar(100) NOT NULL,
  `accessToken` varchar(200) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `created_on` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `is_password_update` int(11) NOT NULL DEFAULT 0,
  `is_security_update` int(11) NOT NULL DEFAULT 0,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `comp_id`, `username`, `password`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `role`, `authKey`, `accessToken`, `ip_address`, `created_on`, `last_login`, `active`, `is_password_update`, `is_security_update`, `mobile`, `email`, `is_active`) VALUES
(7, 0, 0, 'superadmin', '123456', '', '', '0000-00-00 00:00:00', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', '', 0),
(14, 0, 1, 'admin', '123456', '', '', '0000-00-00 00:00:00', 'admin', 'b80ba071869c01d949dc4838c54f99bf', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `action_rights` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`, `action_rights`) VALUES
(11, 7, 11, 'All'),
(37, 7, 12, 'All'),
(38, 14, 11, 'All'),
(39, 14, 14, 'All'),
(40, 14, 15, 'All'),
(41, 14, 16, 'All'),
(42, 14, 19, 'All'),
(43, 14, 20, 'All'),
(44, 14, 17, 'All'),
(45, 14, 21, 'All'),
(46, 14, 22, 'All'),
(47, 14, 12, '25,26,27'),
(48, 14, 2, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `users_logins`
--

CREATE TABLE `users_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `log_type` enum('login','logout') DEFAULT NULL,
  `in_out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_master`
--
ALTER TABLE `action_master`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `users_logins`
--
ALTER TABLE `users_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_master`
--
ALTER TABLE `action_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users_logins`
--
ALTER TABLE `users_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action_master`
--
ALTER TABLE `action_master`
  ADD CONSTRAINT `action_master_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `action_master_ibfk_2` FOREIGN KEY (`action_id`) REFERENCES `action_master` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
