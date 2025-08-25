-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2022 at 12:10 AM
-- Server version: 10.5.15-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mxplayer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `code` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `type`, `code`) VALUES
(20, 'popad', 'popad', '');

-- --------------------------------------------------------

--
-- Table structure for table `drive_auth`
--

CREATE TABLE `drive_auth` (
  `id` int(11) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `client_secret` varchar(255) NOT NULL,
  `refresh_token` varchar(255) NOT NULL,
  `access_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0 = active, 1 = failed',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `main_link` varchar(255) NOT NULL,
  `alt_link` varchar(255) DEFAULT NULL,
  `preview_img` varchar(255) DEFAULT NULL,
  `data` text DEFAULT NULL,
  `type` varchar(50) DEFAULT 'direct',
  `subtitles` text DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `downloads` int(25) DEFAULT 0,
  `is_alt` tinyint(4) DEFAULT 0,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0 = active,\r\n1 = inactive,\r\n2 = broken',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `playbacks` int(11) DEFAULT 0,
  `is_broken` tinyint(4) DEFAULT 0,
  `status` int(11) DEFAULT 1 COMMENT '0 = active,\r\n1 = inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `config` varchar(50) NOT NULL,
  `var` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`config`, `var`) VALUES
('version', '1.0'),
('proxyUser', ''),
('proxyPass', ''),
('timezone', 'Asia/Bangkok'),
('dark_theme', '0'),
('adminId', '1'),
('sublist', '[\"english\",\"arabic\",\"turkey\",\"southkorea\",\"brazil\",\"indonesia\",\"japan\",\"myanmar\",\"bangladesh\",\"vietnam\",\"cambodia\",\"philippines\",\"thailand\"]'),
('logo', 'logo-mxplayer.png'),
('favicon', 'favicon.png'),
('player', 'jw'),
('playerSlug', 'video'),
('showServers', '1'),
('adminId', '29'),
('default_video', 'http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ElephantsDream.mp4'),
('default_banner', NULL),
('last_backup', '2021-01-17 18:53:08'),
('jw_license', 'https://content.jwplatform.com/libraries/Jq6HIbgz.js'),
('isAdblocker', '1'),
('v_preloader', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `role` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `img`, `role`, `status`) VALUES
(29, 'admin', '$2y$10$zBOk2h.lNrF1W6giS2x0uezUs3jxx/sdm1HS6dE8HhLrguYtoWyhO', 'profile.png', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drive_auth`
--
ALTER TABLE `drive_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
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
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `drive_auth`
--
ALTER TABLE `drive_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
