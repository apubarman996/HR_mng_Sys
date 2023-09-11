-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 08:31 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `apply_leave`
--

CREATE TABLE `apply_leave` (
  `a_id` int(255) NOT NULL,
  `l_from` varchar(10000) NOT NULL,
  `l_to` varchar(10000) NOT NULL,
  `eleave` int(255) NOT NULL,
  `mleave` int(255) NOT NULL,
  `cleave` int(255) NOT NULL,
  `apply_by` int(255) NOT NULL,
  `status` varchar(1000) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `apply_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_leave`
--

INSERT INTO `apply_leave` (`a_id`, `l_from`, `l_to`, `eleave`, `mleave`, `cleave`, `apply_by`, `status`, `comment`, `apply_date`) VALUES
(15, '2017-08-03', '2017-08-09', 2, 2, 2, 3, 'apporved', 'yes', '2018-05-11 17:45:54'),
(16, '2017-09-03', '2017-09-09', 2, 2, 2, 8, 'rejected', 'NO', '2018-05-11 17:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `assign_leave`
--

CREATE TABLE `assign_leave` (
  `l_id` int(255) NOT NULL,
  `v_from` varchar(1000) NOT NULL,
  `v_to` varchar(1000) NOT NULL,
  `e_leave` varchar(1000) NOT NULL,
  `m_leave` varchar(1000) NOT NULL,
  `c_leave` varchar(1000) NOT NULL,
  `assign_to` int(255) NOT NULL,
  `assign_by` varchar(1000) NOT NULL,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_leave`
--

INSERT INTO `assign_leave` (`l_id`, `v_from`, `v_to`, `e_leave`, `m_leave`, `c_leave`, `assign_to`, `assign_by`, `modified_date`) VALUES
(3, '2017-05-14', '2018-05-14', '6', '6', '6', 8, '5', '2018-04-30 14:41:44'),
(4, '2017-05-14', '2018-05-14', '6', '6', '6', 7, '5', '2018-04-30 14:41:44'),
(5, '2017-05-14', '2018-05-14', '6', '6', '6', 6, '5', '2018-04-30 14:41:44'),
(6, '2017-05-14', '2018-05-14', '6', '6', '6', 3, '5', '2018-04-30 14:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `t_id` int(255) NOT NULL,
  `task` text NOT NULL,
  `id` int(255) NOT NULL,
  `assign_by` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`t_id`, `task`, `id`, `assign_by`, `date_time`) VALUES
(1, 'test messg', 8, '5', '2018-04-29 05:02:22'),
(2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 8, '5', '2018-04-29 05:12:19'),
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 7, '5', '2018-04-29 05:12:19'),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 6, '5', '2018-04-29 05:12:19'),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 3, '5', '2018-04-29 05:12:19'),
(6, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 8, '5', '2018-04-29 05:15:37'),
(7, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 7, '5', '2018-04-29 05:15:37'),
(8, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 6, '5', '2018-04-29 05:15:37'),
(9, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 3, '5', '2018-04-29 05:15:37'),
(10, 'hello all', 8, '5', '2018-04-30 08:56:12'),
(11, 'I Need your help, Plz contract me.', 3, '5', '2018-05-01 12:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `task_reply`
--

CREATE TABLE `task_reply` (
  `r_id` int(255) NOT NULL,
  `reply` text NOT NULL,
  `m_id` int(255) NOT NULL,
  `reply_by` int(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_reply`
--

INSERT INTO `task_reply` (`r_id`, `reply`, `m_id`, `reply_by`, `date_time`) VALUES
(1, 'plz', 5, 3, '2018-04-30 07:52:01'),
(2, 'I was completing your task, and plz check my reply.', 5, 3, '2018-04-30 07:52:57'),
(3, 'Yes i except this..', 4, 6, '2018-04-30 08:31:52'),
(4, 'Yes i except this..', 4, 6, '2018-04-30 08:35:35'),
(5, 'ok.', 5, 5, '2018-04-30 12:27:01'),
(6, 'yes', 5, 3, '2018-05-01 12:10:47'),
(7, 'yes what do you want?', 11, 3, '2018-05-01 12:13:51'),
(8, 'Plz you contract me in my room.', 11, 5, '2018-05-01 12:15:18');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `password`, `department`, `role`, `created_on`) VALUES
(3, 'jack1', 'jack15@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'seo', 'employee', '2018-04-25 17:54:22'),
(5, 'Apu Barman', 'apubarman010@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'web developer', 'admin', '2018-04-24 15:04:39'),
(6, 'Al Asif', 'alasif@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'seo', 'employee', '2018-04-25 15:21:57'),
(7, 'MMP Rony', 'mmprony@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'seo', 'employee', '2018-04-25 18:05:24'),
(8, 'Sonjoy', 'sonjoy123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'web developer', 'employee', '2018-04-27 16:01:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apply_leave`
--
ALTER TABLE `apply_leave`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assign_leave`
--
ALTER TABLE `assign_leave`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `task_reply`
--
ALTER TABLE `task_reply`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apply_leave`
--
ALTER TABLE `apply_leave`
  MODIFY `a_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `assign_leave`
--
ALTER TABLE `assign_leave`
  MODIFY `l_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `t_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_reply`
--
ALTER TABLE `task_reply`
  MODIFY `r_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
