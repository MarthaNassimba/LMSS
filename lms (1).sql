-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2023 at 07:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updation_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `email`, `password`, `updation_time`) VALUES
(1, 'Denis Jotham', 'admin@gmail.com', '', '2022-06-29 11:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `bookrequests`
--

CREATE TABLE `bookrequests` (
  `id` int(11) NOT NULL,
  `studentno` varchar(50) NOT NULL,
  `bname` varchar(100) NOT NULL,
  `bisbn` varchar(50) NOT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `return_date` timestamp NULL DEFAULT NULL,
  `collateral` varchar(50) NOT NULL,
  `confirm` varchar(1) NOT NULL,
  `status` int(11) NOT NULL,
  `return_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookrequests`
--

INSERT INTO `bookrequests` (`id`, `studentno`, `bname`, `bisbn`, `request_date`, `return_date`, `collateral`, `confirm`, `status`, `return_status`) VALUES
(33, '1900800118', 'Software Engineering', '9789390225378', '2022-05-21 08:23:22', '2022-05-20 21:00:00', 'school id', 'o', 1, 0),
(34, '1900800118', 'Computer Science Handbook', '978-1584883609', '2022-06-19 10:56:55', '2022-05-20 21:00:00', 'school id', 'o', 1, 1),
(35, '1900800000', 'Computer Science Handbook', '978-1584883609', '2022-05-23 15:59:00', '2022-05-20 21:00:00', 'student id', 'o', 1, 1),
(36, '1900800118', 'Database Management systems', 'BO7XV8V9VS', '2022-05-21 18:50:17', '2022-05-20 21:00:00', 'school id', 'o', 1, 0),
(37, '1900802963', 'Computer Science Handbook', '978-1584883609', '2022-05-23 15:16:12', '2022-05-22 21:00:00', 'id', 'o', 1, 0),
(38, '1900802963', 'Computer Science Handbook', '978-1584883609', '2022-05-23 16:46:24', '2022-05-29 21:00:00', 'id', 'o', 1, 0),
(39, '1900800118', 'Hackers', '978-0440134053', '2022-05-23 16:03:55', NULL, 'id', 'o', 0, 0),
(46, '4321', 'Computer Science Handbook', '978-1584883609', '2022-05-28 15:47:38', '2022-06-03 21:00:00', 'studentid', 'o', 1, 0),
(47, '4321', 'TOUGH TIMES', '12456-45676', '2022-05-28 16:12:32', '2022-06-03 21:00:00', 'library card', '', 1, 0),
(48, '5678', 'Database Management systems', 'BO7XV8V9VS', '2022-06-19 10:54:28', '2022-06-25 21:00:00', 'library card', 'o', 1, 0),
(49, '2022', 'Hackers', '978-0440134053', '2022-06-29 11:49:12', NULL, 'studentid', 'o', 0, 0),
(50, '2022', 'Hackers', '978-0440134053', '2022-06-29 11:49:26', NULL, 'library card', 'o', 0, 0),
(51, '2022', 'Hackers', '978-0440134053', '2022-06-29 11:50:59', '2022-07-05 21:00:00', 'studentid', 'o', 1, 0),
(52, '20123456', 'study php', '987654321', '2023-02-26 17:27:54', NULL, 'studentid', 'o', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(3) NOT NULL,
  `bname` char(100) NOT NULL,
  `bauthor` char(50) NOT NULL,
  `bisbn` varchar(20) NOT NULL,
  `bnumber` int(11) NOT NULL,
  `library` char(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `bimage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bname`, `bauthor`, `bisbn`, `bnumber`, `library`, `category`, `bimage`) VALUES
(5, 'Hackers', 'Steven Levy', '978-0440134053', 11, 'West end Library', 'Security', 'IMG-627e2d088659a1.01504128.jpg'),
(6, 'Database Management systems', 'Dr. Ms. Manisha Bharambe & Dr. A. B. Nimbalkar', 'BO7XV8V9VS', 28, 'West end Library', 'Database', 'IMG-625987d1821f90.88059933.jpg'),
(7, 'Introduction to Computer Science', 'Gilbert Brands', '9781492827849', 7, 'North Hall library', 'Computer Science', 'IMG-6259828b5c83e0.12560566.jpg'),
(8, 'Get Programming Learn to code with Python', 'Ana Bell', '9781638355922', 14, 'Central Library', 'Programming', 'IMG-6259830a2d14a5.82527379.jpg'),
(9, 'Computer Science Handbook', 'Allen B. Tucker', '978-1584883609', 1, '', 'Computer Science', 'IMG-6259836b45d431.34362192.jpg'),
(17, 'study php', 'ROBERT', '987654321', 2, 'Barclays library', 'Programming', 'IMG-62af03a36abf79.42616251.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`) VALUES
(1, 'Database'),
(2, 'Graphics'),
(3, 'Data Science'),
(4, 'Artificial Intelligence'),
(5, 'Computer Science'),
(6, 'Programming'),
(7, 'history south'),
(8, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(3) NOT NULL,
  `studentno` varchar(50) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `studentno`, `profile_image`) VALUES
(3, 'admin@gmail.com', 'IMG-62af03d2443ff9.04505803.jpg'),
(4, '1900800119', 'IMG-62888f0f629556.24965029.jpg'),
(5, '', 'IMG-62868ba299e761.51340871.jpg'),
(6, '45678', 'IMG-6287d238eb8385.89522892.jpg'),
(7, '1900800118', 'IMG-6287d2f8d77cc6.14743158.jpg'),
(8, '1900800000', 'IMG-62889220392768.55158107.jpg'),
(9, '4321', 'IMG-629245c121ab59.51112213.jpg'),
(10, '5678', 'IMG-62af016d3c6e08.10873373.jpg'),
(11, '1900802963', 'IMG-62b8b7e97e2770.09831199.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `studentno` varchar(30) NOT NULL,
  `course` char(20) NOT NULL,
  `year` char(15) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `checkbox` tinyint(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `studentno`, `course`, `year`, `verify_token`, `password`, `checkbox`, `status`) VALUES
(13, 'KALULE DENIS JOTHAM', 'denisjothamzkalule@gmail.com', '1900800118', 'bitc', 'Third year', '1292272624', '5db18ec8c04d6b21997eac408cc4f9d9', 0, 0),
(19, 'Martha Nassimba', 'marthanassimba@gmail.com', '1900802963', 'bis', 'Third year', '', '20520a72149ca4ae227c883e1b78eff0', 0, 1),
(20, 'Nsubuga Ibrahim', 'insubuga5@gmail.com', '1800810899', 'bitc', 'Third year', '2134781457', 'ae5d7245f0a95c42fa706abf50dddeed', 0, 1),
(21, 'Bugembe John Paul', 'bugembejohnpaul@gmail.com', '1900800119', 'bitc', 'Third year', '897353271', '202cb962ac59075b964b07152d234b70', 0, 1),
(22, 'Ssekito Jonathan', 'jonathanssekitto5@gmail.com', '45678', 'bis', 'Second year', '', '202cb962ac59075b964b07152d234b70', 0, 1),
(23, 'Ddembe Ggaliwango', 'galixhumphrey@gmail.com', '1900800000', 'bitc', 'Third year', '', 'bc6ef757c7b3dd10ad64e1f73f57c5ef', 0, 1),
(24, 'Makafu Achilles', 'johnvian58@gmail.com', '180081988', 'bitc', 'Third year', '', '6e0b7076126a29d5dfcbd54835387b7b', 0, 1),
(25, 'bwegombe rose', 'rose@gmail.com', '1234', 'dcs', 'First year', '', '337b38e2f3bfe3bf7c11e4cd60835bfe', 0, 1),
(26, 'JOHN', 'mary@gmail.com', '4321', 'bitc', 'Third year', '', 'a835477edd51ce46fa3fe0de8f7ad325', 0, 1),
(27, 'kaynana', 'kaynana@gmail.com', '5678', 'bis', 'First year', '', '6ebba2abeb5cb63a539ec3d67a72bbba', 0, 1),
(28, 'wadada mary', 'wadada2022@gmail.com', '2022', 'bitc', 'Third year', '', '74c6788231ebba5a7beab7b17c9108b0', 0, 1),
(29, 'Kagezi John', 'kagezi@gmail.com', '20123456', 'dcs', 'Second year', '', '53ede38b2a60b46ad2cfeacae364fd19', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookrequests`
--
ALTER TABLE `bookrequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookrequests`
--
ALTER TABLE `bookrequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
