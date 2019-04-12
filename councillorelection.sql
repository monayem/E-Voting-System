-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 07, 2018 at 08:05 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `councillorelection`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstName`, `lastName`, `email`, `nid`, `gender`, `dateOfBirth`, `password`, `profileImage`, `created_at`, `updated_at`) VALUES
(1, 'kamrul', 'islam', 'kamrulislam.bd95@gmail.com', '12345678', 'Male', '1995-11-02', '12345', '1533569041_saad.jpg', '2018-07-09 13:42:47', '2018-07-09 13:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'invalid',
  `totalVote` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `firstName`, `lastName`, `email`, `nid`, `gender`, `dateOfBirth`, `password`, `profileImage`, `partyName`, `status`, `totalVote`, `created_at`, `updated_at`) VALUES
(2, 'Saad', 'Bin Islam', 'saadbinislam@gmail.com', '12345678', 'Male', '1994-11-01', '12345', '1533569041_saad.jpg', 'BNP', 'valid', 1, '2018-07-09 13:42:03', '2018-08-07 20:02:38'),
(3, 'M', 'Monayem', 'monayem@gmail.com', '12345678', 'Male', '1994-11-01', '12345', '1533569042_monayem.jpg', 'Awami League', 'valid', 1, '2018-07-09 13:42:03', '2018-08-07 20:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_events`
--

CREATE TABLE `candidate_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `candidateId` int(11) NOT NULL,
  `eventName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventBanner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2018_07_09_105345_create_candidates_table', 1),
(14, '2018_07_09_111533_create_voters_table', 1),
(15, '2018_07_09_180214_create_admins_table', 1),
(16, '2018_07_11_181317_create_parties_table', 2),
(17, '2018_07_25_200605_create_events_table', 3),
(18, '2018_07_25_201335_create_events_table', 4),
(19, '2018_07_25_202955_create_candidate_events_table', 5),
(20, '2018_07_25_203358_create_candidate_events_table', 6),
(21, '2018_08_01_193411_create_vote_events_table', 7),
(22, '2018_08_05_194514_create_vote_collections_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(10) UNSIGNED NOT NULL,
  `partyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partyLogo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `partyName`, `email`, `partyLogo`, `created_at`, `updated_at`) VALUES
(2, 'Awami League', 'awamileague@gmail.com', '1531333605_awamileague.png', '2018-07-11 12:26:45', '2018-07-11 12:26:45'),
(3, 'BNP', 'bnp@gmail.com', '1531333669_bnp.jpg', '2018-07-11 12:27:49', '2018-07-11 12:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateOfBirth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profileImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'invalid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`id`, `firstName`, `lastName`, `email`, `nid`, `gender`, `dateOfBirth`, `password`, `profileImage`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Saad', 'Bin Islam', 'saadbinislam@gmail.com', '123456789', 'Male', '1996-07-04', '12345', '1533569041_saad.jpg', 'valid', '2018-08-06 15:24:01', '2018-08-07 19:33:39'),
(3, 'Mamun', 'Islam', 'mamun@gmail.com', '123456789', 'Male', '1996-01-01', '12345', '1533572703_mamun.jpg', 'valid', '2018-08-06 16:25:03', '2018-08-07 19:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `vote_collections`
--

CREATE TABLE `vote_collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `voterId` int(11) NOT NULL,
  `candidateId` int(11) NOT NULL,
  `votedTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votedDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalVoter` int(11) NOT NULL DEFAULT '10',
  `remainingVote` int(11) NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vote_collections`
--

INSERT INTO `vote_collections` (`id`, `voterId`, `candidateId`, `votedTime`, `votedDate`, `totalVoter`, `remainingVote`, `created_at`, `updated_at`) VALUES
(13, 2, 3, '02:02:05 am', '2018-08-08', 10, 10, '2018-08-07 20:02:05', '2018-08-07 20:02:05'),
(14, 3, 2, '02:02:38 am', '2018-08-08', 10, 10, '2018-08-07 20:02:38', '2018-08-07 20:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `vote_events`
--

CREATE TABLE `vote_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `electionName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `electionDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventBanner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vote_events`
--

INSERT INTO `vote_events` (`id`, `electionName`, `electionDate`, `eventBanner`, `created_at`, `updated_at`) VALUES
(1, 'Councilor Election', '2018-08-08', '1533152655_election.jpg', '2018-08-01 13:44:15', '2018-08-01 13:44:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_events`
--
ALTER TABLE `candidate_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parties_partyname_unique` (`partyName`),
  ADD UNIQUE KEY `parties_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_collections`
--
ALTER TABLE `vote_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vote_events`
--
ALTER TABLE `vote_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `candidate_events`
--
ALTER TABLE `candidate_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vote_collections`
--
ALTER TABLE `vote_collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vote_events`
--
ALTER TABLE `vote_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
