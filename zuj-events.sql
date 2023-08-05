-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 11:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuj-events`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `zuj_id` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_id`, `email`, `name`, `faculty`, `zuj_id`, `password`) VALUES
(999990, 'admin@gmail.com', '', 'sdsd', '123123', '0192023a7bbd73250516f069df18b500'),
(999991, 'admin2@gmail.com', '', 'qsqsqs', '121212', '0192023a7bbd73250516f069df18b500'),
(999998, 'admin3@gmail.com', '', 'ddd', '121212', '0192023a7bbd73250516f069df18b500'),
(999999, 'shahin.osama2000.osama@gmail.com', '', 'IT', '12121212', '0cfbbee3b26782d6fda909ea0952f737');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_info`
--

CREATE TABLE `attendance_info` (
  `id` int(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `zuj_id` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `university_name` varchar(100) DEFAULT NULL,
  `college_name` varchar(100) DEFAULT NULL,
  `user_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance_info`
--

INSERT INTO `attendance_info` (`id`, `first_name`, `last_name`, `zuj_id`, `email`, `password`, `phone_number`, `university_name`, `college_name`, `user_status`) VALUES
(2, 'Shahin', 'osama', '201910223', 'shahin.osama2000.osama@gmail.com', '0cfbbee3b26782d6fda909ea0952f737', '+962797186788', 'Al zaytoonah university of jordan', 'Software Eng', ''),
(3, 'Hamzeh', 'hasan', '', 'hamzeh-hasan-00@outlook.com', 'e541ceef16df0403d755788028a25d29', '34145421644', 'Al zaytoonah university of jordan', 'Computer Information Since', ''),
(4, 'Ahmed', 'Ali', '', 'ahmed@gmail.com', '0c5515288543b430b822d94fff3fa90f', '1212121212', 'Al zaytoonah university of jordan', '', ''),
(5, 'Ali', 'ahmad', '2010111111', 'Ali.Ahmad@gmail.com', '0cfbbee3b26782d6fda909ea0952f737', '07979797979', 'Al zaytoonah university of jordan', 'IT', ''),
(6, 'ali', 'ahmad', '02020202', 'Ali@gmail.com', '02a9db72e31756476a6aa3ce287b61c8', '02020202', 'Al zaytoonah university of jordan', 'IT', ''),
(7, 'shahin', 'osama', '2010111111', 'shahin@gmail.com', '0cfbbee3b26782d6fda909ea0952f737', '0799999999', 'Al zaytoonah university of jordan', 'IT', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `id` int(11) NOT NULL,
  `a_user_id` int(11) DEFAULT NULL,
  `a_event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`id`, `a_user_id`, `a_event_id`) VALUES
(9, 4, 13),
(10, 4, 10),
(11, 2, 17),
(12, 4, 11),
(13, 4, 11),
(14, 2, 18),
(15, 2, NULL),
(16, 2, 20),
(17, 2, 21),
(18, 2, 22),
(19, 2, 23),
(20, 2, 24),
(21, 7, 18),
(22, 4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(255) NOT NULL,
  `event_id` int(255) DEFAULT NULL COMMENT 'fk from event ',
  `comment` mediumtext NOT NULL COMMENT 'The comment',
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comm_id`, `event_id`, `comment`, `user_id`) VALUES
(83, 11, 'hahahahaha', 2),
(84, 11, 'ok', 2),
(86, 11, 'ok', 2),
(87, 11, 'hi', 2),
(88, 10, 'hi', 2),
(89, 10, 'nice events guys keep it up', 2),
(90, 11, 'nice event i liked it alot  🥳 ', 2),
(91, 10, 'nice event i liked it alot  🥳 ', 2),
(93, 10, 'dscs', 2),
(94, 10, 'fff', 2),
(100, 14, 'v', 4),
(125, 17, 'nice event i liked it alot  🥳 ', 2),
(130, 17, 'Yes', 2),
(134, 17, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii4', 2),
(135, 17, 'iiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii4fewfwefwefwefwefwefwefwefwefwefwefffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', 2),
(136, 17, 'dscs', 2),
(137, 18, 'Exited to attend the event!', 2),
(138, 21, 'Yes', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(111) NOT NULL COMMENT 'Event name ',
  `event_description` varchar(9999) NOT NULL COMMENT 'describe your event ',
  `event_datetime` datetime NOT NULL COMMENT 'when is your event',
  `event_duration` varchar(222) NOT NULL COMMENT 'how much time did it needs ',
  `event_location` varchar(222) NOT NULL COMMENT 'where is your event / combo box with college names',
  `event_type` varchar(222) NOT NULL COMMENT 'event type / combo box',
  `event_attendance_limit` int(222) NOT NULL COMMENT 'how much attendance the event can handle ',
  `event_image` text NOT NULL COMMENT 'Image url ',
  `status` varchar(99) NOT NULL,
  `user_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_description`, `event_datetime`, `event_duration`, `event_location`, `event_type`, `event_attendance_limit`, `event_image`, `status`, `user_id`) VALUES
(7, 'nice', 'qwe', '2023-05-12 00:00:00', '3', 'IT block', 'Sporting Events', 12, 'IMG-645a5316d12425.79209506.png', 'rejected', 2),
(10, 'test', 'asd asd asd asd asd asd asdasdasdasda dasd asd asdasf sdvsdcqwfw xc sdfeqwfadscwef wecwef ewrgrvwverer esr', '2023-05-19 00:00:00', '1', 'IT block', 'Charity', 22, 'IMG-645fde71734ea3.68141517.jpg', 'end', 2),
(11, 'charity', 'help people', '2023-05-27 16:31:00', '2', 'IT block', 'Charity', 12, 'IMG-6464d73d186ad1.08175580.jpg', 'accepted', 2),
(12, 'charity 2', 'help people', '2023-05-17 23:29:00', '2', 'IT block', 'Charity', 14, 'IMG-6464f23e8c4849.14496999.jpg', 'accepted', 2),
(13, 'football ', 'football/soccer game between cs and se', '2023-07-01 21:19:00', '', 'IT block', 'Sporting Events', 12, 'IMG-6466345255d404.77859850.jpg', 'end', 2),
(14, 'football 2', 'football/soccer game between cs and se', '2023-05-27 17:31:00', '2-3 hours', 'Soccer field', 'Sporting Events', 13, 'IMG-64663613847037.53018358.jpg', 'accepted', 2),
(15, 'football 3', 'football/soccer game between cs and se', '2023-05-18 20:31:00', '3-4 hours', 'IT block', 'Sporting Events', 8, 'IMG-646636d3e408c0.27404727.jpg', 'accepted', 2),
(16, 'football 9', 'football/soccer game between cs and se', '2023-05-10 23:37:00', '2-3 hours', 'IT block', 'Sporting Events', 14, 'IMG-64676caa6b3250.91484152.jpg', 'accepted', 2),
(17, 'charity 2', 'TEST', '2023-05-24 22:35:00', '2-3 hours', 'ZUJ university', 'Charity', 14, 'IMG-646a71ec178579.63314799.png', 'accepted', 2),
(18, 'Education test ', 'Join us for an enlightening lecture event as we dive into the captivating realm of Artificial Intelligence (AI) and its profound impact on the modern world. This event aims to provide participants with a comprehensive understanding of AI\'s capabilities, applications, and potential future developments.', '2023-05-26 02:48:00', '1-2 hours', 'ZUJ ', 'Education Course', 987, 'IMG-646fbae5242364.87209297.jpg', 'accepted', 2),
(20, 'Education test 3', 'Join us for an insightful lecture on the fascinating world of Artificial Intelligence (AI) and its impact on various domains. This event aims to provide a comprehensive overview of AI\'s capabilities, applications, and potential future developments.', '2023-05-20 22:55:00', '1-2 hours', 'ZUJ ', 'Education Course', 40, 'IMG-646fbc532dc258.43257262.jpg', 'accepted', 2),
(21, 'Education test 4', 'Join us for an insightful lecture on the fascinating world of Artificial Intelligence (AI) and its impact on various domains. This event aims to provide a comprehensive overview of AI\'s capabilities, applications, and potential future developments.', '2023-05-25 22:51:00', '1-2 hours', 'ZUJ ', 'Education Course', 88, 'IMG-646fbc8c99b146.85690544.jpg', 'accepted', 2),
(22, 'Education test 2', 'join us now', '2023-05-25 22:53:00', '1-2 hours', '', 'Education Course', 123, 'IMG-646fbce158f951.61503744.jpg', 'accepted', 2),
(23, 'Ai lecture ', 'ai lecture join us now', '2023-05-20 22:58:00', '1-2 hours', 'ZUJ ', 'Education Course', 67, 'IMG-646fbd0dcbad12.10019602.jpg', 'accepted', 2),
(24, 'Football Match', 'The soccer event at Al-Zaytoonah University is an exciting and highly anticipated gathering that brings together students, faculty, and staff who share a passion for the sport. The event takes place on the university\'s state-of-the-art soccer field, which provides an ideal setting for a thrilling and competitive atmosphere', '2023-06-03 22:44:00', '3-4 hours', 'ZUJ ', 'Sporting Events', 19, 'IMG-64710c47b7a081.08413496.jpg', 'accepted', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id3` (`a_user_id`),
  ADD KEY `event_id2` (`a_event_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000;

--
-- AUTO_INCREMENT for table `attendance_info`
--
ALTER TABLE `attendance_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `event_id2` FOREIGN KEY (`a_event_id`) REFERENCES `events` (`event_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `user_id3` FOREIGN KEY (`a_user_id`) REFERENCES `attendance_info` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `attendance_info` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `user_id2` FOREIGN KEY (`user_id`) REFERENCES `attendance_info` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
