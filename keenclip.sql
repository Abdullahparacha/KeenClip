-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2017 at 05:39 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keenclip`
--

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int(11) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`favourite_id`, `video_id`, `videos`, `user`) VALUES
(51, '6', NULL, 0),
(52, '6', NULL, 0),
(53, '7', NULL, 0),
(54, '7', NULL, 0),
(55, '7', NULL, 0),
(56, '7', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recently`
--

CREATE TABLE `recently` (
  `recent_id` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `id` int(11) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `video_seconds` double NOT NULL,
  `tag_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`id`, `video_id`, `video_seconds`, `tag_id`) VALUES
(1, '31', 33, '7');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `seconds` double DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_title`, `description`, `seconds`, `videos`) VALUES
(18, 'Test', 'First line', 0, '44'),
(19, 'Test1 ', 'Second line', 0, '44'),
(20, 'aDSA', 'DS', 132.173666, '44'),
(21, 'DAS', 'DFAS', 230.779417, '44'),
(22, 'FD', 'DF', 0, '44'),
(23, 'AD', 'SDA', 0, '44'),
(24, 'sd', 'dfs\n', 0, '44'),
(25, 'dsa', 'sd', 13.217387, '44'),
(26, 'nk', 'bj', 132.173666, '44'),
(27, 'xaS', 'SAD', 0, '45'),
(28, 'DSA', 'DSA', 0, '45'),
(29, 'CASD', 'A', 70.714018, '45'),
(30, '', '', 70.714018, '45'),
(31, 'sa', 'dfad', 150.3415687830688, '45'),
(32, 'ml;', 'n', 0, '45'),
(33, 'dsafa', 'afad', 0, '47'),
(34, 'n', 'csd', 3.603547959945679, '48'),
(35, 'ca', 'ac', 27.439816977111818, '48'),
(36, 'dwed', 'r', 0, '48'),
(37, 'no', 'nio', 6.550952, '46'),
(38, 'dad', 'aewd', 0, '47'),
(39, 'fe', 'efef', 55.61769312779236, '47'),
(40, 'faef', 'ae', 119.947319, '47'),
(41, 'cac', 'cadc', 5.543739, '46'),
(42, 'sd', 'efe', 7.72506, '50'),
(43, 'das', 'dfasf', 0, '53'),
(44, 'start', 'bvuigb', 4.380919, '54'),
(45, 'fsdv', 'dfsvdfs', 80.656809, '54'),
(46, 'efg', 'gdf', 152.823428, '54'),
(47, 'acs', 'dsdsa', 1.53727, '55'),
(48, 'q', 'qwe', 0, '3'),
(49, 'scc', 'd', 0, '2'),
(50, '', '', 0, '2'),
(51, 'da', 'de', 0, '2'),
(52, 'asd', 'ad', 0, '5');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_video` varchar(255) NOT NULL,
  `share` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_video`, `share`, `name`, `email`, `pass`) VALUES
(17, '11', 1, '', '', ''),
(18, '12', 1, '', '', ''),
(28, '12', 1, '', '', ''),
(29, '', 0, 'trudy', 'trudy@mail.com', 'trudy'),
(30, '', 0, 'Alice', 'alice@mail.com', 'alice'),
(31, '', 0, 'Allauddin', 'allauddin@gmail.com', 'khan'),
(32, '', 0, 'ahmad', 'ahmad@gmail.com', 'ahmad');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `videoid` int(30) NOT NULL,
  `userid` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `videoid`, `userid`) VALUES
(1, 1, 1),
(2, 0, 1),
(3, 6, 1),
(4, 1, 30),
(5, 0, 30),
(6, 1, 0),
(7, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`),
  ADD KEY `idx_favourite__user` (`user`),
  ADD KEY `idx_favourite__videos` (`videos`);

--
-- Indexes for table `recently`
--
ALTER TABLE `recently`
  ADD PRIMARY KEY (`recent_id`),
  ADD KEY `idx_recently__user` (`user`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `idx_tags__videos` (`videos`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `idx_user__share` (`share`),
  ADD KEY `idx_user__user_video` (`user_video`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
