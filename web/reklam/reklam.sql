-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 01:04 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reklam`
--

-- --------------------------------------------------------

--
-- Table structure for table `makale`
--

CREATE TABLE `makale` (
  `id` int(11) NOT NULL,
  `baslik` varchar(100) NOT NULL,
  `icerik` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `makale`
--

INSERT INTO `makale` (`id`, `baslik`, `icerik`) VALUES
(40, 'https://nefes21.com/turkiyeye-ozel-kampanya', 'https://nefes21.com/player/live/300/tr3.png'),
(41, 'https://nefes21.com/avrupaya-ozel-kampanya', 'https://nefes21.com/player/live/300/Avrupa_Yeni_Y%C4%B1l_Kampanyas%C4%B1_300x300.png'),
(42, 'https://nefes21.com/Kitaplar-Uygulama', 'https://nefes21.com/player/live/300/kitapsiaris.png'),
(43, 'https://nefes21.com/Kitaplar-Uygulama', 'https://nefes21.com/player/live/300/kitapsiaris1.png'),
(44, 'https://nefes21.com/Kitaplar-Uygulama', 'https://nefes21.com/player/live/300/kitapsiaris2.png'),
(45, 'https://nefes21.com/dusod-butunsel-nefes-akademi', 'https://nefes21.com/player/live/300/Nefes_Ko%C3%A7u_Olmak_%C4%B0stiyormusun_300x300.png'),
(46, 'https://nefes21.com/icf-acsth-onayli-profesyonel-kocluk-egitimi-avrupa', 'https://nefes21.com/player/live/300/Ya%C5%9Fam_Ko%C3%A7u_Olmak_%C4%B0stiyormusun_300x300.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makale`
--
ALTER TABLE `makale`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `makale`
--
ALTER TABLE `makale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
