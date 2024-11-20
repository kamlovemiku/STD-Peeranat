-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2024 at 12:09 PM
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
-- Database: `db_it`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_evaluations`
--

CREATE TABLE `tb_evaluations` (
  `evaluation_id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL CHECK (`score` between 1 and 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_evaluations`
--

INSERT INTO `tb_evaluations` (`evaluation_id`, `code`, `question_id`, `score`) VALUES
(8, '67642206021-7', 2, 4),
(9, '67642206022-5', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_questions`
--

CREATE TABLE `tb_questions` (
  `question_id` int(11) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_questions`
--

INSERT INTO `tb_questions` (`question_id`, `question_text`) VALUES
(2, 'ความมั่นใจในการเรียนรู้สิ่งใหม่'),
(3, 'ความอบอุ่นในการอยู่ร่วมสังคมต่างๆ'),
(4, 'การมีส่วนร่วมกับกิจกรรมและมิติสังคม'),
(5, 'ทักษะด้านการสื่อสาร'),
(6, 'ทักษะด้านการใช้ภาษาอังกฤษ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `code` char(13) NOT NULL,
  `Fname` varchar(40) NOT NULL,
  `Lname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`code`, `Fname`, `Lname`) VALUES
('67642206019-1', 'khajonsak', 'siripankun'),
('67642206021-7', 'พีรณัฐ', 'สมบัติใหม่'),
('67642206022-5', 'Oakkharawit', 'Kawan'),
('67642206025-7', 'กุลสตรี', 'มนีกุล');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_evaluations`
--
ALTER TABLE `tb_evaluations`
  ADD PRIMARY KEY (`evaluation_id`),
  ADD KEY `user_code` (`code`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `tb_questions`
--
ALTER TABLE `tb_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_evaluations`
--
ALTER TABLE `tb_evaluations`
  MODIFY `evaluation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_questions`
--
ALTER TABLE `tb_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_evaluations`
--
ALTER TABLE `tb_evaluations`
  ADD CONSTRAINT `tb_evaluations_ibfk_1` FOREIGN KEY (`code`) REFERENCES `tb_user` (`code`),
  ADD CONSTRAINT `tb_evaluations_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `tb_questions` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
