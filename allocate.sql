-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 01:47 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allocate`
--

-- --------------------------------------------------------

--
-- Table structure for table `propose_project`
--

CREATE TABLE `propose_project` (
  `id` int(100) NOT NULL,
  `student` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `project_id` int(10) NOT NULL,
  `mat_no` varchar(100) NOT NULL,
  `first_proposal` varchar(200) NOT NULL,
  `second_proposal` varchar(200) NOT NULL,
  `third_proposal` varchar(200) NOT NULL,
  `final_copy` varchar(200) NOT NULL,
  `course_of_studies` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propose_project`
--

INSERT INTO `propose_project` (`id`, `student`, `username`, `project_id`, `mat_no`, `first_proposal`, `second_proposal`, `third_proposal`, `final_copy`, `course_of_studies`, `department`, `faculty`, `date`) VALUES
(1, 'Mnda Shagbaor', 'el', 5, 'bsu/sc/cmp/16/39997', 'Project Management System', 'Not Approved', 'Not Approved', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 10:46:57'),
(2, 'Okoh Christian', 'okoh', 5, 'bsu/sc/cmp/16/40040', 'Not Approved', 'Banking Management System', 'Not Approved', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 10:49:10'),
(3, 'Echikwolye Emmanuel', 'emma', 4, 'bsu/sc/cmp/16/39952', '0', '0', '0', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 10:51:44'),
(4, 'Adakole Josephine', 'ada', 4, 'bsu/sc/cmp/16/39908', 'Development of Project Management System', '0', 'Library Information System', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 10:54:20'),
(5, 'Ahura Iveren', 'iv', 3, 'bsu/sc/cmp/16/39889', '0', '0', '0', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 10:56:21'),
(6, 'Okobia Daniel', 'dan', 3, 'bsu/sc/cmp/16/39894', '0', '0', '0', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science ', '2021-12-06 10:58:27'),
(7, 'Abu Austine', 'abu', 2, 'bsu/sc/cmp/16', '0', '0', '0', '0', 'Computer Scicence', 'Mathematics and Computer Science', 'Science', '2021-12-06 11:00:59'),
(8, 'Agbo Joy', 'joy', 2, 'bsu/sc/cmp/16/39918', '0', '0', '0', '0', 'Computer Science', 'Mathematics and computer Science', 'Science', '2021-12-06 11:02:39'),
(9, 'Agala Victoria', 'viky', 1, 'bsu/sc/cmp/16/39916', '0', '0', '0', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 11:04:37'),
(10, 'Ursula Jogo', 'jogo', 1, 'bsu/sc/cmp/16/39990', '0', '0', '0', '0', 'Computer Science', 'Mathematics and Computer Science', 'Science', '2021-12-06 11:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `department` varchar(50) COLLATE utf8_bin NOT NULL,
  `course` varchar(200) COLLATE utf8_bin NOT NULL,
  `level` varchar(50) COLLATE utf8_bin NOT NULL,
  `matric` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `department`, `course`, `level`, `matric`, `date`, `username`) VALUES
(1, 'Mnda Shagbaor', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39997', '2021-12-06 10:46:57', 'el'),
(2, 'Okoh Christian', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/40040', '2021-12-06 10:49:10', 'okoh'),
(3, 'Echikwolye Emmanuel', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39952', '2021-12-06 10:51:44', 'emma'),
(4, 'Adakole Josephine', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39908', '2021-12-06 10:54:20', 'ada'),
(5, 'Ahura Iveren', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39889', '2021-12-06 10:56:21', 'iv'),
(6, 'Okobia Daniel', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39894', '2021-12-06 10:58:27', 'dan'),
(7, 'Abu Austine', 'Mathematics and Computer Science', 'Computer Scicence', '400', 'bsu/sc/cmp/16', '2021-12-06 11:00:59', 'abu'),
(8, 'Agbo Joy', 'Mathematics and computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39918', '2021-12-06 11:02:39', 'joy'),
(9, 'Agala Victoria', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39916', '2021-12-06 11:04:37', 'viky'),
(10, 'Ursula Jogo', 'Mathematics and Computer Science', 'Computer Science', '400', 'bsu/sc/cmp/16/39990', '2021-12-06 11:06:27', 'jogo');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `stud_assigned` int(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`id`, `title`, `firstname`, `lastname`, `username`, `department`, `faculty`, `email`, `password`, `stud_assigned`, `status`, `date`) VALUES
(1, 'Dr', 'Adekule', 'Adeyelu', 'ade', 'Mathematics and Computer Science', 'Science', 'ade@gmail.com', 'ade', 5, 1, '2021-12-06 10:34:19'),
(2, 'Prof', 'Imande', 'Tyolumun', 'prof', 'Mathematics and Computer Science', 'Science', 'Imande@gmail.com', 'pro', 4, 1, '2021-12-06 10:37:28'),
(3, 'Dr.', 'Musa', 'Egahi', 'musa', 'Mathematics and Computer Science', 'Science', 'musa@gmail.com', 'musa', 3, 1, '2021-12-06 10:39:33'),
(4, 'Dr.', 'Innocent', 'Okwuche', 'hod', 'Mathematics and Computer', 'Science', 'hod@gmail.com', 'hod', 2, 1, '2021-12-06 10:42:32'),
(5, 'Dr.', 'Aamo', 'Iorliam', 'amo', 'Mathematics and Computer Science', 'Science', 'amo@gmail.com', 'amon', 1, 1, '2021-12-06 10:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `matric` varchar(200) COLLATE utf8_bin NOT NULL,
  `role` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `image` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `matric`, `role`, `status`, `image`) VALUES
(1, 'admin', 'admin', 'admin', 1, 1, 'admin.jpg'),
(2, 'ade', 'ade', 'staff', 2, 1, 'images.jpg'),
(3, 'prof', 'pro', 'staff', 2, 1, 'img7.jpg'),
(4, 'musa', 'musa', 'staff', 2, 1, 'img3.jpg'),
(5, 'hod', 'hod', 'staff', 2, 1, 'img12.jpg'),
(6, 'amo', 'amon', 'staff', 2, 1, 'profile1.jpeg'),
(7, 'el', 'el', 'bsu/sc/cmp/16/39997', 3, 1, 'profile2.jpeg'),
(8, 'okoh', 'okoh', 'bsu/sc/cmp/16/40040', 3, 1, 'img17.jpg'),
(9, 'emma', 'emma', 'bsu/sc/cmp/16/39952', 3, 1, 'img16.jpg'),
(10, 'ada', 'ada', 'bsu/sc/cmp/16/39908', 3, 1, 'img6.jpg'),
(11, 'iv', 'iv', 'bsu/sc/cmp/16/39889', 3, 1, 'img9.jpg'),
(12, 'dan', 'dan', 'bsu/sc/cmp/16/39894', 3, 1, 'img13.jpg'),
(13, 'abu', 'abu', 'bsu/sc/cmp/16/39902', 3, 1, 'img16.jpg'),
(14, 'joy', 'joy', 'bsu/sc/cmp/16/39918', 3, 1, 'img14.jpg'),
(15, 'viky', 'viky', 'bsu/sc/cmp/16/39916', 3, 1, 'img6.jpg'),
(16, 'jogo', 'jogo', 'bsu/sc/cmp/16/39990', 3, 1, 'img5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `propose_project`
--
ALTER TABLE `propose_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
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
-- AUTO_INCREMENT for table `propose_project`
--
ALTER TABLE `propose_project`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
