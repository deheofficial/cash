-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2024 at 11:02 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kssbrefl_cash`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_name2` varchar(255) DEFAULT NULL,
  `company_reviewer_name` varchar(255) DEFAULT NULL,
  `company_reviewer_email` varchar(255) DEFAULT NULL,
  `company_approver_name` varchar(255) DEFAULT NULL,
  `company_approver_email` varchar(255) DEFAULT NULL,
  `company_regno` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_name2`, `company_reviewer_name`, `company_reviewer_email`, `company_approver_name`, `company_approver_email`, `company_regno`) VALUES
(1, 'KUMPULAN SEMESTA SDN BHD', 'KSSB', 'MOHAMED FARIZ BIN GHAZALI @ ZAKARIA', 'fariz@semesta.com.my', 'ABDUL RAHMAN BIN ISHAK', 'abdulrahman@semesta.com.my', '200801021675 (822993-H)'),
(2, 'SELGEM SDN BHD', 'SELGEM', 'MOHAMMAD HAFIZUDDIN BIN ZAKARAYA', 'hafizuddin@semesta.com.my', 'MOHAMMAD HAFIZUDDIN BIN ZAKARAYA', 'hafizuddin@semesta.com.my', '201901025466 (1334795-P)'),
(3, 'KSSB CONSULT SDN BHD', 'KSSB CONSULT', 'MUHAMMAD FAIZ BIN ZAINUDDIN', 'faiz@semesta.com.my', 'MUHAMMAD FAIZ BIN ZAINUDDIN', 'faiz@semesta.com.my', '201901036880 (1346210-T)'),
(4, 'INFRASEL SDN BHD', 'INFRASEL', 'JAFRIKHAIRI MHD IDRIS', 'jafrikhairi@semesta.com.my', 'MOHAMED FARIZ BIN GHAZALI @ ZAKARIA', 'fariz@semesta.com.my', '201601010586 (1181516-H)'),
(5, 'SELTRADE SDN BHD', 'SELTRADE', 'MOHD NIZAM BIN MOHD ISHAK', 'mohdnizam@semesta.com.my', 'MOHAMED FARIZ BIN GHAZALI @ ZAKARIA', 'fariz@semesta.com.my', '200801021675 (822993-H)'),
(6, 'DARUL KHUSUS VENTURE SDN BHD', 'DKV', 'SHAHRIN IMRAN ROSLI', 'shahrinrosli@semesta.com.my', 'SHAHRIN IMRAN ROSLI', 'shahrinrosli@semesta.com.my', '200401038490\r\n(677001-P)'),
(7, 'KUALA LANGAT MINING SDN BHD', 'KLM', 'DAZRIN BIN MOHD DARBI', 'dazrin@semesta.com.my', 'MOHAMED FARIZ BIN GHAZALI @ ZAKARIA', 'fariz@semesta.com.my', '198101011019 (77146-T)');

-- --------------------------------------------------------

--
-- Table structure for table `lkp_branch`
--

CREATE TABLE `lkp_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `branch_add1` varchar(255) DEFAULT NULL,
  `branch_add2` varchar(255) DEFAULT NULL,
  `branch_postcode` varchar(10) DEFAULT NULL,
  `branch_city` varchar(50) DEFAULT NULL,
  `branch_state` varchar(50) DEFAULT NULL,
  `branch_phone` varchar(50) DEFAULT NULL,
  `branch_fax` varchar(50) DEFAULT NULL,
  `branch_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_branch`
--

INSERT INTO `lkp_branch` (`branch_id`, `branch_name`, `branch_add1`, `branch_add2`, `branch_postcode`, `branch_city`, `branch_state`, `branch_phone`, `branch_fax`, `branch_status`) VALUES
(1, 'HQ', 'Aras LPH, Menara Bank Rakyat Shah Alam', 'No. 1, Jalan Indah 14/8, Seksyen 14,', '40000', 'Shah Alam', 'Selangor Darul Ehsan', '+603-55187735', '+603-55187736', 1),
(2, 'South', 'No. 17, Tingkat Bawah Jalan Ambar 1,', 'Taman Ambar,', '43800', 'Dengkil', 'Selangor', '+603-87680334', NULL, 1),
(3, 'North', 'No. 1, Jalan Utama Kampus Unisel,', NULL, '45600', 'Bestari Jaya', 'Selangor', NULL, NULL, 1),
(4, 'DKV', 'Lot 517, Kampung Mungkal', NULL, '71350', 'Kota', 'Negeri Sembilan', '06-4382571', '06-4383571', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_daerah`
--

CREATE TABLE `lkp_daerah` (
  `daerah_id` int(11) NOT NULL,
  `daerah_name` varchar(50) DEFAULT NULL,
  `daerah_kod` varchar(10) DEFAULT NULL,
  `daerah_status` int(11) DEFAULT NULL,
  `daerah_branch` int(11) DEFAULT NULL,
  `daerah_run_next` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_daerah`
--

INSERT INTO `lkp_daerah` (`daerah_id`, `daerah_name`, `daerah_kod`, `daerah_status`, `daerah_branch`, `daerah_run_next`) VALUES
(1, 'HQ', '00', 0, NULL, NULL),
(2, 'Klang', '01', 1, NULL, NULL),
(3, 'Kuala Langat', '02', 1, NULL, NULL),
(4, 'Kuala Selangor', '04', 1, NULL, NULL),
(5, 'Sabak Bernam', '05', 1, NULL, NULL),
(6, 'Hulu Langat', '06', 1, NULL, NULL),
(7, 'Hulu Selangor', '07', 1, NULL, NULL),
(8, 'Petaling', '08', 1, NULL, NULL),
(9, 'Gombak', '09', 1, NULL, NULL),
(10, 'Sepang', '10', 1, NULL, NULL),
(11, 'Putrajaya', '11', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_department`
--

CREATE TABLE `lkp_department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) DEFAULT NULL,
  `dept_name2` varchar(100) DEFAULT NULL,
  `dept_email` varchar(255) DEFAULT NULL,
  `dept_hod_name` varchar(255) DEFAULT NULL,
  `dept_hod_id` int(11) DEFAULT NULL,
  `dept_hod_email` varchar(255) DEFAULT NULL,
  `dept_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_department`
--

INSERT INTO `lkp_department` (`dept_id`, `dept_name`, `dept_name2`, `dept_email`, `dept_hod_name`, `dept_hod_id`, `dept_hod_email`, `dept_status`) VALUES
(1, 'MD/CEO Office', 'CEOO', 'ceo@semesta.com.my', 'ABDUL RAHMAN BIN ISHAK', 125, 'abdulrahman@semesta.com.my', 1),
(2, 'Contract & Procurement', 'CP', 'procurement@semesta.com.my', 'MOHAMAD HISHAM BIN MOHAMAD GHAUS', 129, 'hisham@semesta.com.my', 1),
(3, 'Finance', 'FIN', 'finance@semesta.com.my', 'MOHD BAZLI BIN KAMIN', 202, 'bazli@semesta.com.my', 1),
(4, 'Governance & Integrity', 'GI', 'integriti@semesta.com.my', 'SYAHRUL BADRI BIN ISMAIL', 187, 'syahrul@semesta.com.my', 1),
(5, 'Human Resource & Administration', 'HRA', 'hr@semesta.com.my', 'AHMAD HAKIMI BIN ABD HAMID', 182, 'hakimi@semesta.com.my', 1),
(6, 'Legal & Corporate Secretarial', 'LGCS', 'legal@semesta.com.my', 'DAZRIN BIN MOHD DARBI', 137, 'dazrin@semesta.com.my', 1),
(7, 'SBU Mining', 'MINING', 'mining@semesta.com.my', 'DAZRIN BIN MOHD DARBI', 137, 'dazrin@semesta.com.my', 1),
(8, 'Safety, Health and Environmental', 'HSE', 'qshe@semesta.com.my', 'NADZLI BIN AHAYALIMUDIN', 249, 'nadzli@semesta.com.my', 1),
(9, 'SBU Trading / Research & Marketing', 'RM', 'marketing@semesta.com.my', 'MOHD NIZAM BIN MOHD ISHAK', 165, 'mohdnizam@semesta.com.my', 1),
(10, 'SBU Consultancy Services / Technical Liasion', 'TL', 'tl@semesta.com.my', 'MUHAMMAD FAIZ BIN ZAINUDDIN', 136, 'faiz@semesta.com.my', 1),
(11, 'SBU Digital Innovation / Selgem', 'SELGEM', 'selgem@semesta.com.my', 'MOHAMMAD HAFIZUDDIN BIN ZAKARAYA', 200, 'hafizuddin@semesta.com.my', 1),
(12, 'SBU Infrastructure', 'INF', 'infrasel@semesta.com.my', 'JAFRIKHAIRI BIN MHD IDRIS', 140, 'jafrikhairi@semesta.com.my', 1),
(13, 'Corporate Planning & Business Strategy', 'CPBS', 'bd@semesta.com.my', 'SHAHRIN IMRAN BIN ROSLI', 205, 'shahrinrosli@semesta.com.my', 1),
(14, 'Corporate Communication', 'CC', 'cc@semesta.com.my', 'SUHAIMI BIN KHALIDI', 199, 'suhaimikhalidi@semesta.com.my', 1),
(15, 'Information Technology', 'IT', 'it@semesta.com.my', 'MOHAMED FARIZ BIN GHAZALI @ ZAKARIA', 127, 'fariz@semesta.com.my', 1),
(16, 'COO Office', 'COOO', NULL, 'MOHAMED FARIZ BIN GHAZALI @ ZAKARIA', 127, 'fariz@semesta.com.my', 1),
(17, 'SBU Mineral Water Development / Darul Khusus Venture', 'DKV', NULL, 'SHAHRIN IMRAN BIN ROSLI', 205, 'shahrinrosli@semesta.com.my', 1),
(18, 'CONSULTANT', 'C', NULL, 'AHMAD HAKIMI BIN ABD HAMID', 182, 'hakimi@semesta.com.my', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lkp_state`
--

CREATE TABLE `lkp_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_state`
--

INSERT INTO `lkp_state` (`state_id`, `state_name`) VALUES
(1, 'Johor'),
(2, 'Kedah'),
(3, 'Kelantan'),
(4, 'Melaka'),
(5, 'Negeri Sembilan'),
(6, 'Pahang'),
(7, 'Pulau Pinang'),
(8, 'Perak'),
(9, 'Perlis'),
(10, 'Sabah'),
(11, 'Sarawak'),
(12, 'Selangor'),
(13, 'Terengganu'),
(14, 'W.P. Kuala Lumpur'),
(15, 'W.P. Labuan'),
(16, 'W.P. Putrajaya');

-- --------------------------------------------------------

--
-- Table structure for table `lkp_uom`
--

CREATE TABLE `lkp_uom` (
  `uom_id` int(11) NOT NULL,
  `uom_code` varchar(10) DEFAULT NULL,
  `uom_name` varchar(50) DEFAULT NULL,
  `uom_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lkp_uom`
--

INSERT INTO `lkp_uom` (`uom_id`, `uom_code`, `uom_name`, `uom_status`) VALUES
(1, 'btl', 'Bottle', 1),
(2, 'boxes', 'Box', 0),
(3, 'doz', 'Dozen', 0),
(4, 'lot', 'Lot', 0),
(5, 'mth', 'Months', 0),
(6, 'pax', 'Pax', 0),
(7, 'pcs', 'Pieces', 0),
(8, 'pack', 'Packet', 0),
(9, 'ream', 'Ream', 0),
(10, 'set', 'Set', 0),
(11, 'unit', 'Units', 1),
(12, 'box', 'Boxes', 0),
(13, 'bag', 'Bag', 0),
(14, 'can', 'Cans', 0),
(15, 'drm', 'Drum', 0),
(16, 'ltr', 'Litre', 0),
(17, 'ft', 'Feet', 0),
(18, 'trip', 'Trip', 0),
(19, 'l/s', 'Lump Sum', 0),
(20, 'service(s)', 'Services', 0),
(21, 'roll', 'Roll', 0),
(22, 'carton', 'Carton', 1),
(23, 'pad', 'Pad', 0),
(24, 'MT', 'metric ton', 0),
(25, 'm3', 'meter cube', 0);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_activity` varchar(255) DEFAULT NULL,
  `log_datetime` datetime DEFAULT NULL,
  `log_uid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_activity`, `log_datetime`, `log_uid`) VALUES
(1, 'Logout Successful', '2024-02-22 16:40:53', 1),
(2, 'Login Successful', '2024-02-22 16:41:00', 2),
(3, 'Logout Successful', '2024-02-22 16:43:17', 2),
(4, 'Login Successful', '2024-02-22 16:43:33', 2),
(5, 'Login Successful', '2024-02-22 16:43:50', 2),
(6, 'Login Successful', '2024-02-22 16:46:59', 2),
(7, 'Login Successful', '2024-02-22 16:47:13', 2),
(8, 'Login Successful', '2024-02-22 16:54:03', 2),
(9, 'Login Successful', '2024-02-22 16:54:42', 2),
(10, 'Logout Successful', '2024-02-22 16:55:15', 2),
(11, 'Login Successful', '2024-02-22 16:56:53', 2),
(12, 'Login Successful', '2024-02-22 16:57:12', 2),
(13, 'Logout Successful', '2024-02-22 17:03:03', 2),
(14, 'Login Successful', '2024-02-22 17:03:27', 3),
(15, 'Logout Successful', '2024-02-22 17:03:46', 3),
(16, 'Login Successful', '2024-02-22 17:03:58', 3),
(17, 'Logout Successful', '2024-02-22 17:04:12', 3),
(18, 'Login Successful', '2024-02-22 17:04:18', 3),
(19, 'Login Successful', '2024-02-22 17:04:34', 3),
(20, 'Logout Successful', '2024-02-22 17:05:27', 3),
(21, 'Login Successful', '2024-02-22 17:11:57', 3),
(22, 'Login Successful', '2024-02-22 17:12:17', 3),
(23, 'Logout Successful', '2024-02-22 17:12:20', 3),
(24, 'Login Successful', '2024-02-22 17:13:00', 1),
(25, 'Login Successful', '2024-02-23 10:42:25', 1),
(26, 'Logout Successful', '2024-02-23 10:46:03', 1),
(27, 'Login Successful', '2024-02-23 12:24:28', 1),
(28, 'Logout Successful', '2024-02-23 12:25:07', 1),
(29, 'Login Successful', '2024-02-27 15:46:52', 1),
(30, 'Login Successful', '2024-02-27 16:51:11', 1),
(31, 'Login Successful', '2024-02-28 11:57:26', 1),
(32, 'Logout Successful', '2024-02-28 15:02:39', 1),
(33, 'Login Successful', '2024-02-28 15:02:45', 1),
(34, 'Logout Successful', '2024-02-28 15:02:46', 1),
(35, 'Login Successful', '2024-02-28 15:02:51', 1),
(36, 'Logout Successful', '2024-02-29 08:57:11', 1),
(37, 'Login Successful', '2024-02-29 11:33:18', 1),
(38, 'Logout Successful', '2024-03-05 07:36:59', 1),
(39, 'Login Successful', '2024-03-05 09:48:37', 1),
(40, 'Logout Successful', '2024-03-05 17:30:18', 1),
(41, 'Login Successful', '2024-03-06 09:09:04', 1),
(42, 'Login Successful', '2024-03-11 09:30:45', 1),
(43, 'Logout Successful', '2024-03-11 17:16:08', 1),
(44, 'Login Successful', '2024-03-12 09:42:02', 1),
(45, 'Logout Successful', '2024-03-12 10:07:59', 1),
(46, 'Login Successful', '2024-03-12 10:16:48', 1),
(47, 'Logout Successful', '2024-03-12 15:02:18', 1),
(48, 'Login Successful', '2024-03-12 21:39:35', 1),
(49, 'Logout Successful', '2024-03-12 21:40:21', 1),
(50, 'Login Successful', '2024-03-13 09:50:06', 1),
(51, 'Logout Successful', '2024-03-15 07:43:21', 1),
(52, 'Login Successful', '2024-03-15 14:43:01', 1),
(53, 'Logout Successful', '2024-03-15 14:44:21', 1),
(54, 'Login Successful', '2024-03-19 15:14:53', 1),
(55, 'Logout Successful', '2024-03-19 15:35:50', 1),
(56, 'Login Successful', '2024-03-19 15:39:55', 1),
(57, 'Logout Successful', '2024-03-19 15:41:27', 1),
(58, 'Login Successful', '2024-03-19 15:41:32', 1),
(59, 'Logout Successful', '2024-03-19 15:45:22', 1),
(60, 'Login Successful', '2024-03-19 15:45:57', 1),
(61, 'Logout Successful', '2024-03-19 15:51:42', 1),
(62, 'Login Successful', '2024-03-19 15:51:55', 1),
(63, 'Logout Successful', '2024-03-20 08:26:00', 1),
(64, 'Login Successful', '2024-03-20 10:02:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) DEFAULT NULL,
  `user_sname` varchar(255) DEFAULT NULL,
  `user_staff_id` varchar(100) DEFAULT NULL,
  `user_email` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_group` int(11) DEFAULT NULL,
  `user_status` int(11) DEFAULT NULL,
  `user_position` varchar(255) DEFAULT NULL,
  `user_department` int(11) DEFAULT NULL,
  `user_branch` int(11) DEFAULT NULL,
  `user_regby` int(11) DEFAULT NULL,
  `user_regdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_fname`, `user_sname`, `user_staff_id`, `user_email`, `user_pass`, `user_phone`, `user_group`, `user_status`, `user_position`, `user_department`, `user_branch`, `user_regby`, `user_regdate`) VALUES
(1, 'Shahranie Khalid', 'SK', NULL, 'shahranie@semesta.com.my', 'tMSyo8Tv9BWTLpcUZUF1vXQ9utW8ih7CYK9LblpOzU1tPayG5qOvPHDuRjwev7tTVxp7ILeJn6Gw4/J8MFYwWQ==', '0134143546', 1, 1, NULL, NULL, 1, 1, '2024-02-22 12:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `grp_id` int(11) NOT NULL,
  `grp_name` varchar(100) DEFAULT NULL,
  `grp_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`grp_id`, `grp_name`, `grp_status`) VALUES
(1, 'Superadmin', 0),
(2, 'User', 1),
(3, '', 1),
(4, '', 1),
(5, '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `lkp_branch`
--
ALTER TABLE `lkp_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `lkp_daerah`
--
ALTER TABLE `lkp_daerah`
  ADD PRIMARY KEY (`daerah_id`),
  ADD KEY `daerah_id` (`daerah_id`);

--
-- Indexes for table `lkp_department`
--
ALTER TABLE `lkp_department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `lkp_state`
--
ALTER TABLE `lkp_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `lkp_uom`
--
ALTER TABLE `lkp_uom`
  ADD PRIMARY KEY (`uom_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`grp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lkp_branch`
--
ALTER TABLE `lkp_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lkp_daerah`
--
ALTER TABLE `lkp_daerah`
  MODIFY `daerah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lkp_department`
--
ALTER TABLE `lkp_department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lkp_state`
--
ALTER TABLE `lkp_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `lkp_uom`
--
ALTER TABLE `lkp_uom`
  MODIFY `uom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `grp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
