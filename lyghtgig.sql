-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 08:37 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lyghtgig`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL,
  `admin_profile_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_pwd`, `admin_profile_pic`) VALUES
(1, 'Heena', 'heena.chauhan@gmail.com', '123', 'Heena3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `album_id` int(11) NOT NULL,
  `album_title` varchar(50) NOT NULL,
  `album_cover` varchar(50) DEFAULT 'default_album.jpg',
  `album_description` varchar(100) NOT NULL,
  `album_created_date` timestamp NULL DEFAULT current_timestamp(),
  `album_type` varchar(20) DEFAULT 'public',
  `user_id` int(11) NOT NULL,
  `album_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`album_id`, `album_title`, `album_cover`, `album_description`, `album_created_date`, `album_type`, `user_id`, `album_status`) VALUES
(5, 'default', 'default_album.jpg', '', '2020-05-16 19:07:11', 'public', 29, 'active'),
(6, 'default', 'default_album.jpg', '', '2020-05-16 19:13:10', 'public', 30, 'active'),
(7, 'default', 'default_album.jpg', '', '2020-05-17 10:40:16', 'public', 31, 'active'),
(8, 'test', 'default_album.jpg', 'test album', '2020-05-17 11:56:21', 'public', 30, 'active'),
(9, 'default', 'default_album.jpg', '', '2020-05-17 13:59:30', 'public', 32, 'active'),
(10, 'default', 'default_album.jpg', '', '2020-05-17 17:48:06', 'public', 33, 'active'),
(11, 'test', 'default_album.jpg', 'Portraits and Candids', '2020-05-23 18:54:39', 'public', 29, 'active'),
(12, 'default', 'default_album.jpg', '', '2020-05-30 10:41:44', 'public', 35, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_description` varchar(100) NOT NULL,
  `cat_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`, `cat_description`, `cat_status`) VALUES
(1, 'Potraits', 'Capturing people and their emotions.', 'active'),
(2, 'Landscapes', 'Capturing the horizontal frame of the world with the gear', 'active'),
(7, 'Self-Potraits', 'Capturing self with lots of creativity', 'active'),
(9, 'Texture and Patterns', 'Patterns and Textures in a Photograph', 'active'),
(10, 'Nature', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_date` timestamp NULL DEFAULT current_timestamp(),
  `comment_data` varchar(200) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `comment_date`, `comment_data`, `photo_id`, `user_id`, `comment_status`) VALUES
(24, '2020-05-21 16:48:12', 'Hey Heena', 12, 30, 'active'),
(25, '2020-05-22 08:50:12', 'hey beautiful', 12, 30, 'active'),
(26, '2020-05-22 09:14:18', 'Hey Heeba', 12, 29, 'active'),
(28, '2020-05-30 10:58:20', 'hey', 17, 29, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_competition`
--

CREATE TABLE `tbl_competition` (
  `competition_id` int(11) NOT NULL,
  `competition_name` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `start_date` timestamp NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT current_timestamp(),
  `winner_id` int(11) DEFAULT NULL,
  `runner_id` int(11) DEFAULT NULL,
  `prize` int(11) NOT NULL,
  `no_of_pics` int(11) NOT NULL DEFAULT 1,
  `admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `competition_cover_pic` varchar(300) DEFAULT NULL,
  `result_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_competition`
--

INSERT INTO `tbl_competition` (`competition_id`, `competition_name`, `description`, `start_date`, `end_date`, `winner_id`, `runner_id`, `prize`, `no_of_pics`, `admin_id`, `user_id`, `competition_cover_pic`, `result_date`) VALUES
(1, 'Sunset and Sunrise in color', 'Show off your colour photos of an amazing sunset or sunrise. The sunrise or sunset can be over land or water. Please only enter colour pictures for this contest.', '2020-06-05 06:12:34', '2020-06-10 18:30:00', NULL, NULL, 1000, 1, 1, NULL, 'sunset_cov.jpg', '2020-06-15 10:04:20'),
(9, 'Nature Photo Contest', 'Capture your best moments with nature and share us in our contest.				                        				                        ', '2020-06-06 18:30:00', '2020-06-08 18:30:00', NULL, NULL, 0, 1, NULL, 29, 'photography-of-leaves-under-the-sky-1131458.jpg', '2020-06-09 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_followers`
--

CREATE TABLE `tbl_followers` (
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_followers`
--

INSERT INTO `tbl_followers` (`user_id`, `follower_id`) VALUES
(29, 30),
(29, 35),
(30, 29),
(31, 30),
(31, 32),
(33, 31),
(33, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_likes`
--

CREATE TABLE `tbl_likes` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_likes`
--

INSERT INTO `tbl_likes` (`photo_id`, `user_id`) VALUES
(17, 29),
(22, 30),
(23, 30),
(23, 35),
(24, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_participant`
--

CREATE TABLE `tbl_participant` (
  `participant_id` int(11) NOT NULL,
  `competition_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_participant`
--

INSERT INTO `tbl_participant` (`participant_id`, `competition_id`, `user_id`) VALUES
(1, 9, 29);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `photo_id` int(11) NOT NULL,
  `photo_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo_caption` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo_path` varchar(100) NOT NULL,
  `album_id` int(11) NOT NULL,
  `photo_type` varchar(20) DEFAULT 'public',
  `photo_status` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`photo_id`, `photo_date`, `photo_caption`, `user_id`, `photo_path`, `album_id`, `photo_type`, `photo_status`) VALUES
(12, '2020-05-17 11:52:56', 'her smile is best', 30, 'heena.jpg', 6, 'public', 'active'),
(14, '2020-05-17 11:56:56', '', 30, 'heena.jpg', 8, 'public', 'active'),
(17, '2020-05-23 19:10:24', 'Smile', 29, 'heena.jpg', 11, 'public', 'active'),
(21, '2020-05-26 17:49:44', 'Teeth', 30, 'teeth.jpg', 6, 'private', 'active'),
(22, '2020-05-26 17:50:56', 'F.R.I.E.N.D.S', 30, 'friends.jpg', 6, 'public', 'active'),
(23, '2020-05-26 17:51:59', 'Smoke', 30, 'light.jpg', 6, 'public', 'active'),
(24, '2020-06-05 16:14:26', 'Monkey', 29, 'monkey.jpg', 5, 'public', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo_category`
--

CREATE TABLE `tbl_photo_category` (
  `photo_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_photo_category`
--

INSERT INTO `tbl_photo_category` (`photo_id`, `cat_id`) VALUES
(12, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report`
--

CREATE TABLE `tbl_report` (
  `report_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `reason_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `reportee_id` int(11) NOT NULL,
  `report_status` varchar(30) NOT NULL DEFAULT 'Idle'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report`
--

INSERT INTO `tbl_report` (`report_id`, `photo_id`, `reason_id`, `reporter_id`, `reportee_id`, `report_status`) VALUES
(20, 24, 8, 29, 29, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_reason`
--

CREATE TABLE `tbl_report_reason` (
  `reason_id` int(11) NOT NULL,
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report_reason`
--

INSERT INTO `tbl_report_reason` (`reason_id`, `reason`) VALUES
(1, 'Inappropriate photo'),
(2, 'Contains nudity'),
(3, 'Spam'),
(4, 'Abusive picture content'),
(5, 'Sucidal content/self injury'),
(6, 'Violence'),
(7, 'Terrorism'),
(8, 'Unauthorized sales'),
(9, 'harassement'),
(10, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_submission`
--

CREATE TABLE `tbl_submission` (
  `submission_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `photo_path` varchar(200) NOT NULL,
  `photo_caption` varchar(300) DEFAULT NULL,
  `submission_date_time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_submission`
--

INSERT INTO `tbl_submission` (`submission_id`, `participant_id`, `photo_path`, `photo_caption`, `submission_date_time`) VALUES
(3, 1, 'trees-in-forest-during-sunset-247421.jpg', 'Lights of Forest', '2020-06-07 18:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE `tbl_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'Photographer'),
(2, 'Freelancer'),
(3, 'Cinematographer'),
(15, 'Photo Journalism'),
(16, 'Wildlife Photographer'),
(17, 'Sports Photographer'),
(18, 'Architectural Photographer'),
(19, 'Wedding Photographer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login`
--

CREATE TABLE `tbl_user_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT 'disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_login`
--

INSERT INTO `tbl_user_login` (`user_id`, `username`, `user_email`, `user_pwd`, `user_status`) VALUES
(29, 'Heena', 'heena.chauhan1999@gmail.com', 'hinu', 'Enabled'),
(30, 'Vishal', 'ranav8279@gmail.com', 'ranav', 'Enabled'),
(31, 'Bhavi', 'bhavigotawala@gmail.com', 'bhavi', 'Enabled'),
(32, 'Shreya', 'shreyadalal34@gmail.com', 'shreya', 'Disabled'),
(33, 'Neeti', 'neetichauhan7@gmail.com', 'L27L639', 'Disabled'),
(35, 'Shivanii', 'shivanirotliwala79@gmail.com', 'Q54k936', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_description` varchar(300) NOT NULL,
  `user_gender` char(1) NOT NULL,
  `user_bdate` date NOT NULL,
  `user_profile_pic` varchar(100) NOT NULL DEFAULT 'default_profile.jpg',
  `user_cover_pic` varchar(100) DEFAULT 'default_cover.jpg',
  `user_address` varchar(150) NOT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`user_id`, `user_fname`, `user_lname`, `user_description`, `user_gender`, `user_bdate`, `user_profile_pic`, `user_cover_pic`, `user_address`, `is_verified`) VALUES
(29, 'Heena', 'Chauhan', 'What would you be if you were attached to another object by an inclined plane, wrapped helically around an axis?', 'F', '1999-12-24', 'heena.jpg', 'trees-in-forest-during-sunset-2474212.jpg', '230,MOCHIWAD,KATHOR\r\nKAMREJ,SURAT,394150', 1),
(30, 'Vishal', 'Rana', 'I am mystery and power,whose power are exccedded only by mystery.			                        				                        				                        				                        ', 'M', '1998-09-12', 'Snapchat-98320638510.jpg', 'lights6.jpg', 'Surat			   									                        				                        				                        				                        ', 1),
(31, 'Bhavi', 'Gotawala', 'A photographic eye to capture the world.', 'F', '1999-10-17', 'bg-10.jpg', 'photography-of-leaves-under-the-sky-11314581.jpg', 'Surat', 0),
(32, 'Shreya', 'Dalal', '', 'F', '1998-12-24', 'bg.jpg', 'landscape.jpg', 'Adajan,Surat			   					', 0),
(33, 'Neeti', 'Chauhan', '', 'F', '2004-05-06', 'Niti.jpg', 'default_cover.jpg', '230,MOCHIWAD,KATHOR\r\nKAMREJ,SURAT,394150', 0),
(35, 'Shivani', 'Rotliwala', '', 'F', '1999-10-21', 'thailand-20.jpg', 'photography-of-leaves-under-the-sky-11314582.jpg', 'Surat			   					', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `user_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_id`, `type_id`) VALUES
(29, 1),
(29, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `photo_id` (`photo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_competition`
--
ALTER TABLE `tbl_competition`
  ADD PRIMARY KEY (`competition_id`),
  ADD KEY `winner_id` (`winner_id`),
  ADD KEY `runner_id` (`runner_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_followers`
--
ALTER TABLE `tbl_followers`
  ADD PRIMARY KEY (`user_id`,`follower_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- Indexes for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD PRIMARY KEY (`photo_id`,`user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `tbl_photo_category`
--
ALTER TABLE `tbl_photo_category`
  ADD PRIMARY KEY (`photo_id`,`cat_id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `photo_id` (`photo_id`);

--
-- Indexes for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `photo_id` (`photo_id`),
  ADD KEY `reason_id` (`reason_id`),
  ADD KEY `reporter_id` (`reporter_id`),
  ADD KEY `reportee_id` (`reportee_id`);

--
-- Indexes for table `tbl_report_reason`
--
ALTER TABLE `tbl_report_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `participant_id` (`participant_id`);

--
-- Indexes for table `tbl_type`
--
ALTER TABLE `tbl_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_id`,`type_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_competition`
--
ALTER TABLE `tbl_competition`
  MODIFY `competition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_report`
--
ALTER TABLE `tbl_report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_report_reason`
--
ALTER TABLE `tbl_report_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_submission`
--
ALTER TABLE `tbl_submission`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_type`
--
ALTER TABLE `tbl_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_login`
--
ALTER TABLE `tbl_user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD CONSTRAINT `tbl_album_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `tbl_comment_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `tbl_photo` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_competition`
--
ALTER TABLE `tbl_competition`
  ADD CONSTRAINT `runner` FOREIGN KEY (`runner_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_competition_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `tbl_admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_competition_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `winner` FOREIGN KEY (`winner_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_followers`
--
ALTER TABLE `tbl_followers`
  ADD CONSTRAINT `tbl_followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_followers_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_likes`
--
ALTER TABLE `tbl_likes`
  ADD CONSTRAINT `tbl_likes_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `tbl_photo` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_participant`
--
ALTER TABLE `tbl_participant`
  ADD CONSTRAINT `tbl_participant_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD CONSTRAINT `tbl_photo_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `tbl_album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_photo_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_photo_category`
--
ALTER TABLE `tbl_photo_category`
  ADD CONSTRAINT `tbl_photo_category_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `tbl_category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_photo_category_ibfk_2` FOREIGN KEY (`photo_id`) REFERENCES `tbl_photo` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_report`
--
ALTER TABLE `tbl_report`
  ADD CONSTRAINT `tbl_report_ibfk_1` FOREIGN KEY (`photo_id`) REFERENCES `tbl_photo` (`photo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_report_ibfk_2` FOREIGN KEY (`reason_id`) REFERENCES `tbl_report_reason` (`reason_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_report_ibfk_3` FOREIGN KEY (`reportee_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_report_ibfk_4` FOREIGN KEY (`reporter_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD CONSTRAINT `tbl_user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD CONSTRAINT `type` FOREIGN KEY (`type_id`) REFERENCES `tbl_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
