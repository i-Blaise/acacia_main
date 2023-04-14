-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 01:09 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acacia.quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `quizz_answers`
--

CREATE TABLE `quizz_answers` (
  `id` int(100) NOT NULL,
  `unique_code` varchar(100) NOT NULL,
  `q1` int(10) NOT NULL,
  `q2` int(10) NOT NULL,
  `q3` int(10) NOT NULL,
  `q4` int(10) NOT NULL,
  `q5` int(10) NOT NULL,
  `q6` int(10) NOT NULL,
  `q7` int(10) NOT NULL,
  `q8` int(10) NOT NULL,
  `q9` int(10) NOT NULL,
  `q10` int(10) NOT NULL,
  `results` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizz_answers`
--

INSERT INTO `quizz_answers` (`id`, `unique_code`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `results`) VALUES
(1, 'AQA799', 2, 1, 1, 0, 0, 2, 2, 0, 2, 1, 55),
(2, 'AQA1678', 2, 0, 0, 0, 0, 1, 1, 2, 2, 2, 2),
(3, 'AQA8558', 1, 1, 2, 2, 0, 1, 1, 2, 1, 2, 65),
(4, 'AQA3042', 2, 1, 1, 2, 0, 1, 1, 2, 1, 1, 60),
(5, 'AQA2411', 2, 0, 0, 1, 0, 1, 1, 0, 1, 0, 30),
(6, 'AQA9561', 2, 0, 0, 2, 2, 1, 2, 2, 2, 1, 70),
(7, 'AQA9881', 1, 0, 0, 1, 0, 0, 1, 0, 0, 1, 20),
(8, 'AQA8303', 1, 1, 0, 2, 0, 0, 2, 2, 1, 0, 45),
(9, 'AQA8196', 2, 2, 1, 2, 0, 2, 2, 2, 2, 2, 85);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
