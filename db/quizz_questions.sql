-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 15, 2021 at 01:10 PM
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
-- Table structure for table `quizz_questions`
--

CREATE TABLE `quizz_questions` (
  `id` int(100) NOT NULL,
  `code` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option1_value` int(10) NOT NULL DEFAULT 0,
  `option2` varchar(255) NOT NULL,
  `option2_value` int(10) NOT NULL DEFAULT 0,
  `option3` varchar(255) DEFAULT NULL,
  `option3_value` int(10) NOT NULL DEFAULT 0,
  `option4` varchar(255) DEFAULT NULL,
  `option4_value` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quizz_questions`
--

INSERT INTO `quizz_questions` (`id`, `code`, `question`, `option1`, `option1_value`, `option2`, `option2_value`, `option3`, `option3_value`, `option4`, `option4_value`) VALUES
(1, 'q1', 'Do you think exercise is relevant to one’s general well-being? ', 'Yes, to stay healthy one must keep fit.', 2, 'Yes, but it is not a necessity. ', 1, 'I am indifferent, I think some sick people need exercises to stay healthy.', 0, 'No, physical fitness is for aesthetics.', 0),
(2, 'q2', 'What is your go-to work out routine?', 'Vigorous routines (hiking, aerobics, jogging, running, cycling, soccer etc.)', 2, 'Moderate routines (walking briskly, cleaning heavily, tennis doubles, lap swimming etc.)', 2, 'Light routines (walking, dancing, yoga, etc.)', 2, 'I do not work out.', 0),
(3, 'q3', 'How many hours of sleep do you get daily?', 'I get just the right amount of sleep. [7-9 hours]', 2, 'I do not sleep so much; I am active at night too. [less than 7 hours]', 0, 'I sleep a lot; I am always tired. [more than 9 hours]', 0, 'I am not sure; I do not keep tabs. [between 6 to 10 hours]', 1),
(4, 'q4', 'Do you have scheduled sleep and rest patterns?', 'Yes, I do, sleep and rest times are important ', 2, ' I don’t have a timetable, but I do get enough sleep', 2, 'What’s my own I sleep anytime the sleep comes', 1, 'I think I struggle with sleep disorders', 0),
(5, 'q5', 'How many meals do you have daily?', '1-1-1 I ensure to have three whole meals everyday ', 2, '1-0-1 I get two standard meals, breakfast and dinner or lunch. ', 1, ' I am a foodie I eat as much as I desire because life is short ', 0, 'I hardly eat anything, depends on my mood so I can’t tell', 0),
(6, 'q6', 'Do you subscribe to balanced diets?', 'Yes, I ensure my meals are healthy and a balanced mix of food classes', 2, 'I try but I don’t always find all food classes', 1, 'I don’t have that time I eat what I like and can afford', 0, 'I’d love to normally but that’ll be expensive', 1),
(7, 'q7', 'When are you most productive at work?', 'In the morning, that’s my most productive time of the day', 2, 'Always, I’m obsessed with working and getting results', 1, 'When I work from home and in my own space', 1, 'Indifferent, Whatever time of the day I feel most energetic', 1),
(8, 'q8', 'Do you have good sitting/working posture?', 'Yes, I sit up right', 2, 'I view my work screens from calculated angles', 2, 'Not really, I have back injuries', 0, 'I slouch', 0),
(9, 'q9', 'Do you pay attention to mental health and therapy? ', 'Yes, and I have therapy sessions when necessary', 2, 'Yes, I meditate and do yoga', 2, 'Yes, but therapy is expensive', 1, 'No, is that even a real thing?', 0),
(10, 'q10', 'Do you think mental health influences your relationship with people?', 'Yes, it influences my relationships and productivity a great deal', 2, 'Yes, mental health is just as important as physical health', 2, 'I’m indifferent, I think it does sometimes', 1, 'No, my mental health does not interfere in my relationships with people.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `quizz_questions`
--
ALTER TABLE `quizz_questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quizz_questions`
--
ALTER TABLE `quizz_questions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
