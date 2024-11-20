-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 11:59 AM
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
-- Database: `logins`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `resume_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `full_name`, `email`, `company_name`, `contact_person`, `password`) VALUES
(1, 'Caleb', 'maiyoe26@gmail.com', '', '', '$2y$10$dutFXe3mAfxTgP1IXWgiLuQ0iF51Nr77uL9LZUPRR/.MAmRzOjE2u'),
(2, 'jk 77888', 'maiyoe26@gmail.com', '', '', '$2y$10$Eq8iUaO99X7Hv.2ftKR6O.jtxtZ59j3mbfeXRwp3cZBMtF0ShuT9q'),
(3, 'jej', 'maiyoe26@gmail.com', '', '', '$2y$10$f2mBVFFIDTuXSktWz3ExmeXotQJPmbFHdImsCWOIv6NdWWv81QehG');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'jk 77888', 'maiyoe26@gmail.com', '$2y$10$uZprqnLG1TYz2AgpeqE4qe2mQaWa5rDfoFAAhzWZXWiLnXdDUZKcm'),
(2, 'Caleb', 'korircaleb222@gmail.com', '$2y$10$CStsR6UKdNQJgmnTWvMn2OOCdGMKaqomJ5clAf4i.GNnh4dkTC/TC'),
(3, 'jk 77888', 'maiyoe26@gmail.com', '$2y$10$5sVmjHtItDWNDxLBva4rneG6CO.i0aSpX3NSr7EXXxkhkg1gePByW'),
(4, 'jk 77888', 'maiyoe26@gmail.com', '$2y$10$eHa6QcWWoX8OQmiGwKw60.nyBOzeRguVaEdulhnQDxG6nAcZtKPXq'),
(5, 'Caleb Korir', 'maiyoe26@gmail.com', '$2y$10$f5hdiXxICaynFHYav/4w8.rfbgkE69yFYJi4gKs9Vnldnu2rBx1ZW'),
(6, 'Caleb', 'korircaleb222@gmail.com', '$2y$10$ZRJu8kbcvspW9sIulo0pROuzJuM9RMj8TiYW5A2FjXaKWjjAF8ucy'),
(7, 'korir', 'mauiyoe26@gmail.com', '$2y$10$givpsXAosGA35kFw2ch27ua51qkUUagTRoBbR76DnY.OMA5u9368a'),
(8, 'korir', 'mauiyoe26@gmail.com', '$2y$10$v8/pIH/CiaLXN4y9VMeeiOh.cMp.aB1HTo42opaq66u9/qmypE9.K'),
(9, 'Caleb', 'korircaleb777@gmail.com', '$2y$10$sGSdgusKle4gKibc6A3d4OxsJEUKj1/rsV1xiUgirlyNByZQ5LaHy'),
(10, 'Caleb Korir', 'korircaleb2374@gmail.com', '$2y$10$cb28FYek46WHEPYk79jbE.fTSmjr4o8jsIYxTm2z84RNucbf/mJEO'),
(11, 'Caleb Korir', 'korircaleb34@gmail.com', '$2y$10$eggsqCazO1KE1hWMvkJOnenulv/08wFK7KHbmrA11jM3YtdgncT2e');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `job_type` varchar(50) DEFAULT NULL,
  `average_salary` decimal(10,2) DEFAULT NULL,
  `posted_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `organization` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `latitude`, `longitude`, `job_title`, `country`, `job_type`, `average_salary`, `posted_time`, `organization`) VALUES
(1, NULL, NULL, NULL, 'jsssssss', NULL, NULL, NULL, '2024-03-27 21:03:09', 'jjsssss'),
(2, NULL, NULL, NULL, 'jsssssss', NULL, NULL, NULL, '2024-03-27 21:03:23', 'jjsssss');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
