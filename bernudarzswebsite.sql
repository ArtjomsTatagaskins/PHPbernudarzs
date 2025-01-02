-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2025 at 02:49 PM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bernudarzswebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `children`
--

CREATE TABLE `children` (
  `id` int(5) UNSIGNED NOT NULL,
  `parent_id` int(5) UNSIGNED NOT NULL,
  `child_name` varchar(40) NOT NULL,
  `child_surname` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `useful_info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `children`
--

INSERT INTO `children` (`id`, `parent_id`, `child_name`, `child_surname`, `dob`, `useful_info`) VALUES
(1, 13, 'Marta', 'Eglīte', '2024-11-01', 'Nav'),
(2, 13, 'Jānis', 'Ozoliņš', '2024-11-01', 'Nav'),
(4, 13, 'Toms', 'Ozoliņš', '2024-11-01', 'Nav');

-- --------------------------------------------------------

--
-- Table structure for table `children_applications`
--

CREATE TABLE `children_applications` (
  `id` int(5) UNSIGNED NOT NULL,
  `parent_id` int(5) NOT NULL,
  `child_name` varchar(40) NOT NULL,
  `child_surname` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `useful_info` varchar(1000) NOT NULL,
  `application_status` enum('approved','rejected','pending') NOT NULL DEFAULT 'pending',
  `application_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `children_applications`
--

INSERT INTO `children_applications` (`id`, `parent_id`, `child_name`, `child_surname`, `dob`, `useful_info`, `application_status`, `application_date`) VALUES
(19, 13, 'Jānis', 'Ozoliņš', '2024-11-01', 'Nav', 'approved', '2024-11-01 06:51:45'),
(20, 13, 'Marta', 'Eglīte', '2024-11-01', 'Nav', 'approved', '2024-11-01 06:51:44'),
(21, 13, 'Toms', 'Ozoliņš', '2024-11-01', 'Nav', 'approved', '2024-11-22 06:34:29'),
(25, 13, 'Jānis', 'Ozoliņš', '2024-12-05', 'Patīk gulēt', 'pending', '2024-12-17 18:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(200) CHARACTER SET utf32 NOT NULL,
  `description` varchar(3000) CHARACTER SET utf8 NOT NULL,
  `img` varchar(200) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `img`, `date`) VALUES
(11, 'Ziemassvētku koncerts', 'Bērnu dziesmas, dzejoļi un priekšnesumi svētku noskaņā.', '1.png', '2024-12-24'),
(12, 'Bērnudārza atklāšana', 'Bērnudārza atklāšana notiks pirmdien.', '2.png', '2024-10-28'),
(13, 'Rudens ražas svētki', 'Darbi ar rudens veltēm un svētku tirdziņš.', '3.png', '2024-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `date`) VALUES
(1, 'Bērnudārza darba laika izmaiņas', 'Cienījamie vecāki! Informējam, ka bērnudārza darba laiks tiks saīsināts piektdien, 15. martā, līdz plkst. 16:00 tehnisku iemeslu dēļ.', '2024-11-01'),
(2, 'Obligātās veselības pārbaudes atgādinājums', 'Atgādinām, ka visiem bērniem ir nepieciešama obligātā veselības pārbaude līdz 1. septembrim. Lūdzam iesniegt ārsta zīmi audzinātājai.', '2024-11-01'),
(3, 'Drošības nedēļa bērnudārzā', 'No 8. līdz 12. novembrim bērnudārzā norisināsies drošības nedēļa, kurā bērni mācīsies par drošību mājās, uz ceļa un dabā.', '2024-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `is_admin`) VALUES
(13, 'admin', 'admin', 'admin@gmail.com', '$2y$10$8RjpaIGqtP9KLxEUk8Z9A.WDWxMXJUiPaf9ZqOApFW1QJsfrs8gK.', 1),
(15, 'name', 'surname', 'email@gmail.com', '$2y$10$sfOnkLrK8Qzk5IdpCGRlNOQfHrj827mGSMbBKdmfxOxsIEIhCOHi2', NULL),
(16, 'janis', 'ozoliņš', 'jozolins@gmail.com', '$2y$10$kTzFn.7CicIO4dgHiWUGw.sVJh9/EbPt1w4laiIJzHPdtCQi4BbL2', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `children`
--
ALTER TABLE `children`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `children_applications`
--
ALTER TABLE `children_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `children`
--
ALTER TABLE `children`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `children_applications`
--
ALTER TABLE `children_applications`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `children`
--
ALTER TABLE `children`
  ADD CONSTRAINT `children_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
