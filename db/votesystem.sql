-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 01:29 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `role` varchar(60) NOT NULL,
  `created_on` date NOT NULL,
  `status` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `username`, `password`, `firstname`, `lastname`, `photo`, `role`, `created_on`, `status`) VALUES
(1, 'franzcarl13@yahoo.com', 'admin_ssc', '3baf638935a7513e59eb7f1a58f9d4e5', 'Ssc', 'Officer', 'scc.jpg', 'Admin', '2022-09-28', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `year` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `platform` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `position_id`, `firstname`, `lastname`, `year`, `course`, `photo`, `platform`) VALUES
(18, 8, 'Juan Carlos', 'Delacruz', '2nd Year', 'BSMB', '', 'sdsd'),
(19, 8, 'Francis', 'Carlo', '2nd Year', 'BTLE HE', '', ''),
(20, 9, 'Adrian Paul', 'Canubas', '3rd Year', 'BSMB', '', 'Basta hing dagan ko'),
(21, 9, 'Lora Mae', 'Ompoco', '4th Year', 'BSIT', '', 'Running for USTP'),
(22, 13, 'Tech name 1', 'Tech Last 1', '1st Year', 'BSIT', '', 'asdasdasdasddsads'),
(23, 13, 'Tech name 2', 'Tech name 2', '2nd Year', 'BSIT', '', 'dasdasd'),
(24, 13, 'Tech name 3', 'Tech name 3', '3rd Year', 'BSMB', '', 'asdsadasds'),
(25, 13, 'Tech name 4', 'Tech name 4', '3rd Year', 'BTLE IA', '', 'sadasdasdasd'),
(26, 13, 'Tech name 5', 'Tech name 5', '3rd Year', 'BTLE HE', '', 'asdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `description`, `max_vote`, `priority`) VALUES
(8, 'President', 1, 1),
(9, 'Vice-President', 1, 2),
(10, 'PIO', 1, 4),
(11, 'Auditor', 1, 5),
(12, 'Tresurer', 1, 3),
(13, 'Tech Commetee', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(11) NOT NULL,
  `voters_id` varchar(15) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `year` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `voters_id`, `username`, `password`, `firstname`, `lastname`, `year`, `course`, `photo`) VALUES
(10, '2019300208', '', '$2y$10$4ZRDOVXeg96O2WmvWHDJBOAKdNtOthr8Tk7clJGMDd4tbH/Dr301m', 'Francis', 'Manlangit', '4th Year', 'BSIT', ''),
(11, '2019300207', '', '$2y$10$gJdB5OcTABVvVBS1/.hFaOwoiNrsatmvpKzmhWceEd1cHu9zYiFvy', 'Mark Joseph', 'Account', '2nd Year', 'BSIT', '');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `voters_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_voted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `voters_id`, `candidate_id`, `position_id`, `date_voted`) VALUES
(13, 10, 18, 8, '2023-04-27 04:36:30'),
(14, 10, 21, 9, '2023-04-27 04:36:30'),
(15, 10, 24, 13, '2023-04-27 04:36:30'),
(16, 10, 25, 13, '2023-04-27 04:36:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
