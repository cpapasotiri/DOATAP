-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 09:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdi1900173sdi1900151`
--

-- --------------------------------------------------------

--
-- Table structure for table `aitiseis`
--

CREATE TABLE `aitiseis` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL,
  `adt` varchar(10) NOT NULL,
  `result` int(11) DEFAULT NULL,
  `notes` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aitiseis_titlos`
--

CREATE TABLE `aitiseis_titlos` (
  `adt` varchar(10) NOT NULL,
  `type_of_studies` varchar(100) NOT NULL,
  `titlos` varchar(100) NOT NULL,
  `country_of_studies` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `time_of_studies` varchar(10) NOT NULL,
  `ects` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `adt` int(10) NOT NULL,
  `adt_name` varchar(128) NOT NULL,
  `adt_type` varchar(64) NOT NULL,
  `adt_data` mediumblob NOT NULL,
  `ptyxio_name` varchar(128) NOT NULL,
  `ptyxio_type` varchar(64) NOT NULL,
  `ptyxio_data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mathimata`
--

CREATE TABLE `mathimata` (
  `id` int(10) NOT NULL,
  `lesson` varchar(100) NOT NULL,
  `uni` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mathimata`
--

INSERT INTO `mathimata` (`id`, `lesson`, `uni`) VALUES
(1, 'ΕΙΣΑΓΩΓΗ ΣΤΟΝ ΠΡΟΓΡΑΜΜΑΤΙΣΜΟ', 1),
(2, 'ΣΧΒΔ', 1),
(3, 'ΥΣΒΔ', 1),
(4, 'ΜΑΘΗΜΑΤΙΚΑ 1', 2),
(5, 'ΜΑΘΗΜΑΤΙΚΑ 2', 2),
(6, 'ΠΡΟΘΕΡΜΑΝΣΗ', 3),
(7, 'ΠΡΩΤΕΣ ΒΟΗΘΕΙΕΣ', 3),
(8, 'ΧΗΜΕΙΑ 1', 4),
(9, 'ΧΗΜΕΙΑ 2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `adt` int(11) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `country`, `university`, `department`) VALUES
(1, 'ΕΛΛΑΔΑ', 'ΕΚΠΑ', 'ΠΛΗΡΟΦΟΡΙΚΗΣ'),
(2, 'ΕΛΛΑΔΑ', 'ΕΚΠΑ', 'ΜΑΘΗΜΑΤΙΚΑ'),
(3, 'ΕΛΛΑΔΑ', 'ΑΠΘ', 'ΓΥΜΝΑΣΤΙΚΗ ΑΚΑΔΗΜΙΑ'),
(4, 'ΕΛΛΑΔΑ', 'ΑΠΘ', 'ΧΗΜΕΙΑΣ');

-- --------------------------------------------------------

--
-- Table structure for table `universities_exoteriko`
--

CREATE TABLE `universities_exoteriko` (
  `id` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `antistoixizetai_me` int(100) NOT NULL,
  `xreiazetai_epipleon_mathimata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universities_exoteriko`
--

INSERT INTO `universities_exoteriko` (`id`, `country`, `university`, `department`, `antistoixizetai_me`, `xreiazetai_epipleon_mathimata`) VALUES
(1, 'United Kingdom', 'University of Edinburgh', 'Informatics', 1, 0),
(2, 'United Kingdom', 'Imperial College of London', 'Economics', 0, 1),
(3, 'Netherlands', 'DELFT', 'Chemical Engineers', 5, 1),
(4, 'USA', 'MIT', 'SPORTS', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `adt` varchar(10) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password1` varchar(100) NOT NULL,
  `typos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first_name`, `last_name`, `adt`, `telephone`, `email`, `password1`, `typos`) VALUES
('Δοκιμαστικός', 'Χρήστης', 'xx111111', 2109999999, 'user@gmail.gr', 'userA1234@', 0),
('Δοκιμαστικός', 'Διαχειριστής', 'yy222222', 2109999999, 'admin@gmail.gr', 'adminB1234@', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aitiseis`
--
ALTER TABLE `aitiseis`
  ADD PRIMARY KEY (`adt`);

--
-- Indexes for table `aitiseis_titlos`
--
ALTER TABLE `aitiseis_titlos`
  ADD PRIMARY KEY (`adt`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`adt`);

--
-- Indexes for table `mathimata`
--
ALTER TABLE `mathimata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`adt`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universities_exoteriko`
--
ALTER TABLE `universities_exoteriko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`adt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
