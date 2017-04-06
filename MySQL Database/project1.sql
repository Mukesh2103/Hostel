-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2017 at 09:58 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `submition_date` date NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` enum('viewed','not-viewed') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `complaint_id` int(11) NOT NULL,
  `subject` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `date` date NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` enum('viewed','not-viewed') COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `subject`, `description`, `date`, `student_id`, `status`) VALUES
(1, 'RAGGING', 'There is a case of ragging at lastnight.', '2017-04-06', 2, 'not-viewed');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `event_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_desc`, `date`) VALUES
(1, 'Cricket', 'Hostel Cricket Tournament is starting from 01-05-2017.', '2017-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `fee_id` int(11) NOT NULL,
  `room_id` int(3) NOT NULL,
  `student_id` int(5) NOT NULL,
  `total_fees` int(10) NOT NULL,
  `paid_fees` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mess_details`
--

CREATE TABLE `mess_details` (
  `mess_id` int(11) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thrusday','Friday','Saturday','Sunday') COLLATE utf8_unicode_ci NOT NULL,
  `breakfast` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lunch` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `snacks` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dinner` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mess_details`
--

INSERT INTO `mess_details` (`mess_id`, `day`, `breakfast`, `lunch`, `snacks`, `dinner`) VALUES
(1, 'Monday', 'Idli', 'Chole', '50-50 Buscuit', 'Aalu fry'),
(2, 'Tuesday', 'Poha', 'Mix Veg.', 'Samosa', 'Soyabin Badi'),
(3, 'Wednesday', 'Upma', 'Aalu Jeera', 'Toast', 'Palak Aalu'),
(4, 'Thrusday', 'Fried Rice', 'Soya Chilli', 'Bhagia', 'Matar Aalu'),
(5, 'Friday', 'Poha', 'Rajma', 'Bread', 'Mix-veg'),
(6, 'Saturday', 'Sambhar Bada', 'Barbatti Aalu', '20-20 Buscuit', 'Kadi'),
(7, 'Sunday', 'Bada', 'Panir Aalu', 'Poha', 'Tamatar Chatni');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participant_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`participant_id`, `event_id`, `student_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_by` int(11) NOT NULL,
  `post_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `folder_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_by`, `post_name`, `folder_path`, `caption`, `date_time`) VALUES
(1, 1, '1.png', 'image/', 'Independence Day Celebration.', '2017-04-07 12:54:02'),
(2, 2, '2.png', 'image/', 'Happy Independence Day', '2017-04-07 01:10:08'),
(3, 1, '3.MP4', 'video/', 'Virtual Box.', '2017-04-07 01:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_no` int(3) NOT NULL,
  `total_student` int(2) NOT NULL,
  `present_student` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `total_student`, `present_student`) VALUES
(1, 1, 3, 1),
(2, 2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo_path` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mother_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_no` int(10) DEFAULT NULL,
  `parent_no` int(10) DEFAULT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `course` enum('BE','Nursing','MBA') COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` int(1) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `room_no` int(3) DEFAULT NULL,
  `type` enum('Admin','Student') COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Active','Denied') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `name`, `photo_path`, `photo_name`, `father_name`, `mother_name`, `mobile_no`, `parent_no`, `email`, `password`, `address`, `gender`, `blood_group`, `course`, `year`, `admission_date`, `room_no`, `type`, `status`) VALUES
(1, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, 'admin@gmail.com', 'Admin@123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', 'Active'),
(2, 'Abc  Xyz', 'photo/', '2.jpg', 'Def', 'Ghi', 1234567890, 1234456788, 'abc@ssipmt.com', 'Abc@12345', 'Jkl Mno', 'Male', 'O+', 'BE', 1, '2017-04-03', 1, 'Student', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`fee_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `mess_details`
--
ALTER TABLE `mess_details`
  ADD PRIMARY KEY (`mess_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participant_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_by` (`post_by`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_no` (`room_no`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `s_email` (`email`),
  ADD KEY `room_no` (`room_no`),
  ADD KEY `room_no_2` (`room_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `fee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mess_details`
--
ALTER TABLE `mess_details`
  MODIFY `mess_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`id`);

--
-- Constraints for table `complaint`
--
ALTER TABLE `complaint`
  ADD CONSTRAINT `complaint_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_3` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `participants_ibfk_4` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_by`) REFERENCES `student_details` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
