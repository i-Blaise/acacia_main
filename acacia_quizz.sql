-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 16, 2021 at 05:02 PM
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
  `q11` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizz_answers`
--

INSERT INTO `quizz_answers` (`id`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `q7`, `q8`, `q9`, `q10`, `q11`) VALUES
(1, 1, 3, 2, 3, 2, 3, 2, 3, 3, 2, 1),
(2, 3, 3, 3, 2, 3, 4, 3, 4, 3, 2, 1),
(3, 1, 3, 3, 3, 3, 4, 3, 4, 3, 2, 2),
(4, 1, 3, 3, 3, 3, 4, 3, 4, 3, 2, 2),
(5, 1, 3, 3, 3, 3, 4, 3, 4, 3, 2, 2),
(6, 1, 3, 3, 3, 3, 4, 3, 4, 3, 2, 2),
(7, 1, 3, 3, 3, 3, 4, 3, 4, 3, 2, 2),
(8, 1, 3, 3, 3, 3, 4, 3, 4, 3, 2, 2),
(9, 1, 3, 1, 3, 1, 4, 3, 4, 3, 2, 2),
(10, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizz_questions`
--

CREATE TABLE `quizz_questions` (
  `id` int(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizz_questions`
--

INSERT INTO `quizz_questions` (`id`, `code`, `question`, `option1`, `option2`, `option3`, `option4`) VALUES
(1, 'q1', 'When taking snacks, I’ll prefer…', 'Fruit, veg, nuts, popcorn or yogurt ', 'Processed biscuits, sweets, shawarma, chocolate ', 'I don’t snack', NULL),
(2, 'q2', 'When I’m done eating…', 'Fill my glass please (wine, beverage etc)', 'I drink water right after ', 'I wait for a while and drink water', NULL),
(3, 'q3', 'Which will you use? ', 'Staircase', 'Elevator', 'I’ll crush at the ground floor ', NULL),
(4, 'q4', 'During my day, I take time to stretch and relax', 'Yeah that’s me ', 'When I remember ', 'Only to the fridge and back ', NULL),
(5, 'q5', 'To exercise my brain, I ', 'Play lots of games, puzzles, and quizzes ', 'Listen to music and/or dance', 'Sleep', NULL),
(6, 'q6', 'I visit the hospital regularly for checkups', 'Oh yes. My doctor is my friend (often)', 'Sometimes', 'Unless I’m unwell (when there’s a need)', 'Eeerrmm…. Next question please (never visits)'),
(7, 'q7', 'To ease my headaches and pains, I', 'Prefer natural remedies', 'Medications', 'Forget it, I won’t die', NULL),
(8, 'q8', 'When I’m overly stressed, ...', 'I practice breathing exercises', 'I throw my hand', 'I let go', 'I go to the washroom and cry'),
(9, 'q9', 'I have difficulty sleeping', 'Yes, I almost never sleep', 'Just when I hit the bed, I’m gone', 'It will take some time but I will sleep eventually without much worry', NULL),
(10, 'q10', 'Which one are you?', 'Seated properly behind the desk', 'Seated with neck bent over \r\n', NULL, NULL),
(11, 'q11', 'Which one are you?', 'Seated away from screen', 'Seated almost close to the screen', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizz_questions`
--
ALTER TABLE `quizz_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizz_answers`
--
ALTER TABLE `quizz_answers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quizz_questions`
--
ALTER TABLE `quizz_questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
