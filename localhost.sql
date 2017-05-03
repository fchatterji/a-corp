-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2017 at 12:31 PM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id463720_acorp`
--
CREATE DATABASE IF NOT EXISTS `id463720_acorp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id463720_acorp`;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `expiredate`) VALUES
(1, '::1', '2017-01-16 10:27:26'),
(5, '88.162.163.58', '2017-01-24 20:43:37'),
(6, '88.162.163.58', '2017-01-24 20:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+120 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '0'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `possiblehours`
--

CREATE TABLE `possiblehours` (
  `id` int(11) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possiblehours`
--

INSERT INTO `possiblehours` (`id`, `hour`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00'),
(21, '18:00:00'),
(22, '18:30:00'),
(23, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startHourId` int(11) NOT NULL,
  `endHourId` int(11) NOT NULL,
  `numGuests` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `salleId`, `day`, `startHourId`, `endHourId`, `numGuests`, `userId`, `title`) VALUES
(100, 22, '2017-01-23', 13, 21, 10, 8, 'Résa1'),
(101, 22, '2017-01-21', 5, 6, 10, 8, 'Résa2'),
(102, 25, '2017-01-22', 13, 23, 2, 6, 'Ma réservation à moi'),
(103, 25, '2017-01-22', 12, 13, 3, 5, 'Test'),
(104, 22, '2017-01-24', 5, 7, 10, 9, 'UPDATE'),
(106, 25, '2017-01-26', 3, 4, 3, 5, '(Sans titre)'),
(108, 22, '2017-02-05', 4, 11, 10, 15, '(Sans titre)'),
(109, 25, '2017-02-05', 2, 7, 3, 5, '(Sans titre)'),
(110, 25, '2017-02-06', 9, 11, 3, 5, '(Sans titre)'),
(111, 22, '2017-02-06', 5, 6, 3, 5, '(Sans titre)'),
(112, 22, '2017-02-07', 2, 3, 10, 17, 'test jeremy'),
(113, 25, '2017-02-09', 4, 7, 3, 5, '(Sans titre)');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `name`, `places`) VALUES
(22, 'Salle Blanquefort', 10),
(23, 'Salle Louis Fargue', 25),
(25, 'Salle Clos De Hilde', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(65, 4, 'af3a37e9b85eb4cbfe3959a34412a51913090b40', '2017-01-13 05:01:10', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'b5984e08fc59e8baaf85b2eac92ae8ad729c9cfa'),
(95, 9, '025eb7e2d278b2e66e292c17367c1ddd4a7655ab', '2017-01-24 22:14:36', '88.162.163.58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '96a81ddef343d41f3972d01a7ab6567f7eaa3300'),
(99, 14, '2bed719d49e93c59768c7559b8678743321ad963', '2017-01-29 16:07:21', '109.23.253.246', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'b91a6107ffde9863ea838919c9f28796d56ef2b8'),
(100, 15, 'ab2095b9beb7595cc7d4c3067e208554f6556a16', '2017-03-05 11:05:24', '2a01:cb1c:51:c100:7c88:1b35:2803:e137', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', '7e5b91054dac0bcc873dece3ed953a65fed9869c'),
(102, 16, '738ce5ba034a8c3a5629af14ed2d5ea2f00529e4', '2017-02-05 14:26:48', '90.36.34.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '1f37a81534680d5f6865863f4bf675966116a5a6'),
(108, 17, 'bcc5857e829e1cf782049ca484b979af108c36aa', '2017-03-08 11:52:50', '80.15.92.135', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3004.3 Safari/537.36', '49821fd199c117d8926ba1880a4aff3f08bab0aa'),
(110, 6, 'd53b72d4a91f77b3f22b7e72d6d8a735971bdb57', '2017-02-09 15:27:41', '212.84.58.67', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'f3d765d29d5c1dc9f4ec650e805a7bb3cfded611');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`, `isadmin`) VALUES
(5, 'test.test@gmail.com', '$2y$10$rutv.D/fdCtdef90XrSxUO3IRZLJf/8lBY/DcEge8h8AbjBxEGKn6', 1, '2017-01-13 15:25:49', 'false'),
(6, 'admin.admin@gmail.com', '$2y$10$is02grqdrmLCNV7oXx7.SOjXeQINzq9h11jyXDIGebWFiBZbAKv1O', 1, '2017-01-16 08:58:34', 'true'),
(7, 'test@test.fr', '$2y$10$An20nPKsCgxfnZ/RkvaeBe/vfsw48M3M5U6xf9HjeEMR3zrsRopXq', 1, '2017-01-22 18:33:18', 'false'),
(8, 'test2@gmail.fr', '$2y$10$E3A3HwrHngeAMdaAHfMv0OhhNHC8/d.hSi0OSwMcTIVNnjw5WGntK', 1, '2017-01-22 18:34:20', 'false'),
(9, 'aec2@gmail.fr', '$2y$10$DMF/bUfyxFXGEC43sUydpOyDfApLd8bQL5Y47Pdc4IO7YwNbK0Poy', 1, '2017-01-24 19:14:27', 'false'),
(10, 'test@gmail.com', '$2y$10$kFaW4isSUcNXK7JKz6h8LOULb2zwoADVZrrCLFruDcg/C3.1hNF.q', 1, '2017-01-29 12:57:14', 'false'),
(14, 'test2@gmail.com', '$2y$10$0/aeTygRC2urotN9hcT97uDVLJXwOH2Y8uSI2lEgmEXU1fK9eT4W.', 1, '2017-01-29 13:07:02', 'false'),
(15, 'virgile.delacerda@gmail.com', '$2y$10$zlQWwh4luZZ8YWURWf49oOEc.VNUxX/I1D61Dhj9/ijjN0mJ6hjky', 1, '2017-02-05 10:05:15', 'false'),
(16, 'naspy971@gmail.com', '$2y$10$euA9tgLur69b8lEPxmSUFOdwzhckPkCZSP3VbB3QnVatxvh1.XtjW', 1, '2017-02-05 11:26:22', 'false'),
(17, 'jeremy@p.fr', '$2y$10$yOzu6zGX2eqbx/iYpnACou3VbnZQWUe17/8UJuFzJ1oBr9SogWr2.', 1, '2017-02-07 14:33:07', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `possiblehours`
--
ALTER TABLE `possiblehours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hour` (`hour`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `salleId` (`salleId`),
  ADD KEY `hourId` (`startHourId`),
  ADD KEY `endHourId` (`endHourId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `possiblehours`
--
ALTER TABLE `possiblehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`salleId`) REFERENCES `salle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`startHourId`) REFERENCES `possiblehours` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`endHourId`) REFERENCES `possiblehours` (`id`);
--
-- Database: `id463720_acorp`
--
CREATE DATABASE IF NOT EXISTS `id463720_acorp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id463720_acorp`;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `expiredate`) VALUES
(1, '::1', '2017-01-16 10:27:26'),
(5, '88.162.163.58', '2017-01-24 20:43:37'),
(6, '88.162.163.58', '2017-01-24 20:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+120 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '0'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `possiblehours`
--

CREATE TABLE `possiblehours` (
  `id` int(11) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possiblehours`
--

INSERT INTO `possiblehours` (`id`, `hour`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00'),
(21, '18:00:00'),
(22, '18:30:00'),
(23, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startHourId` int(11) NOT NULL,
  `endHourId` int(11) NOT NULL,
  `numGuests` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `salleId`, `day`, `startHourId`, `endHourId`, `numGuests`, `userId`, `title`) VALUES
(100, 22, '2017-01-23', 13, 21, 10, 8, 'Résa1'),
(101, 22, '2017-01-21', 5, 6, 10, 8, 'Résa2'),
(102, 25, '2017-01-22', 13, 23, 2, 6, 'Ma réservation à moi'),
(103, 25, '2017-01-22', 12, 13, 3, 5, 'Test'),
(104, 22, '2017-01-24', 5, 7, 10, 9, 'UPDATE'),
(106, 25, '2017-01-26', 3, 4, 3, 5, '(Sans titre)'),
(108, 22, '2017-02-05', 4, 11, 10, 15, '(Sans titre)'),
(109, 25, '2017-02-05', 2, 7, 3, 5, '(Sans titre)'),
(110, 25, '2017-02-06', 9, 11, 3, 5, '(Sans titre)'),
(111, 22, '2017-02-06', 5, 6, 3, 5, '(Sans titre)'),
(112, 22, '2017-02-07', 2, 3, 10, 17, 'test jeremy'),
(113, 25, '2017-02-09', 4, 7, 3, 5, '(Sans titre)');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `name`, `places`) VALUES
(22, 'Salle Blanquefort', 10),
(23, 'Salle Louis Fargue', 25),
(25, 'Salle Clos De Hilde', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(65, 4, 'af3a37e9b85eb4cbfe3959a34412a51913090b40', '2017-01-13 05:01:10', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'b5984e08fc59e8baaf85b2eac92ae8ad729c9cfa'),
(95, 9, '025eb7e2d278b2e66e292c17367c1ddd4a7655ab', '2017-01-24 22:14:36', '88.162.163.58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '96a81ddef343d41f3972d01a7ab6567f7eaa3300'),
(99, 14, '2bed719d49e93c59768c7559b8678743321ad963', '2017-01-29 16:07:21', '109.23.253.246', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'b91a6107ffde9863ea838919c9f28796d56ef2b8'),
(100, 15, 'ab2095b9beb7595cc7d4c3067e208554f6556a16', '2017-03-05 11:05:24', '2a01:cb1c:51:c100:7c88:1b35:2803:e137', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', '7e5b91054dac0bcc873dece3ed953a65fed9869c'),
(102, 16, '738ce5ba034a8c3a5629af14ed2d5ea2f00529e4', '2017-02-05 14:26:48', '90.36.34.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '1f37a81534680d5f6865863f4bf675966116a5a6'),
(108, 17, 'bcc5857e829e1cf782049ca484b979af108c36aa', '2017-03-08 11:52:50', '80.15.92.135', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3004.3 Safari/537.36', '49821fd199c117d8926ba1880a4aff3f08bab0aa'),
(110, 6, 'd53b72d4a91f77b3f22b7e72d6d8a735971bdb57', '2017-02-09 15:27:41', '212.84.58.67', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'f3d765d29d5c1dc9f4ec650e805a7bb3cfded611');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`, `isadmin`) VALUES
(5, 'test.test@gmail.com', '$2y$10$rutv.D/fdCtdef90XrSxUO3IRZLJf/8lBY/DcEge8h8AbjBxEGKn6', 1, '2017-01-13 15:25:49', 'false'),
(6, 'admin.admin@gmail.com', '$2y$10$is02grqdrmLCNV7oXx7.SOjXeQINzq9h11jyXDIGebWFiBZbAKv1O', 1, '2017-01-16 08:58:34', 'true'),
(7, 'test@test.fr', '$2y$10$An20nPKsCgxfnZ/RkvaeBe/vfsw48M3M5U6xf9HjeEMR3zrsRopXq', 1, '2017-01-22 18:33:18', 'false'),
(8, 'test2@gmail.fr', '$2y$10$E3A3HwrHngeAMdaAHfMv0OhhNHC8/d.hSi0OSwMcTIVNnjw5WGntK', 1, '2017-01-22 18:34:20', 'false'),
(9, 'aec2@gmail.fr', '$2y$10$DMF/bUfyxFXGEC43sUydpOyDfApLd8bQL5Y47Pdc4IO7YwNbK0Poy', 1, '2017-01-24 19:14:27', 'false'),
(10, 'test@gmail.com', '$2y$10$kFaW4isSUcNXK7JKz6h8LOULb2zwoADVZrrCLFruDcg/C3.1hNF.q', 1, '2017-01-29 12:57:14', 'false'),
(14, 'test2@gmail.com', '$2y$10$0/aeTygRC2urotN9hcT97uDVLJXwOH2Y8uSI2lEgmEXU1fK9eT4W.', 1, '2017-01-29 13:07:02', 'false'),
(15, 'virgile.delacerda@gmail.com', '$2y$10$zlQWwh4luZZ8YWURWf49oOEc.VNUxX/I1D61Dhj9/ijjN0mJ6hjky', 1, '2017-02-05 10:05:15', 'false'),
(16, 'naspy971@gmail.com', '$2y$10$euA9tgLur69b8lEPxmSUFOdwzhckPkCZSP3VbB3QnVatxvh1.XtjW', 1, '2017-02-05 11:26:22', 'false'),
(17, 'jeremy@p.fr', '$2y$10$yOzu6zGX2eqbx/iYpnACou3VbnZQWUe17/8UJuFzJ1oBr9SogWr2.', 1, '2017-02-07 14:33:07', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `possiblehours`
--
ALTER TABLE `possiblehours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hour` (`hour`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `salleId` (`salleId`),
  ADD KEY `hourId` (`startHourId`),
  ADD KEY `endHourId` (`endHourId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `possiblehours`
--
ALTER TABLE `possiblehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`salleId`) REFERENCES `salle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`startHourId`) REFERENCES `possiblehours` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`endHourId`) REFERENCES `possiblehours` (`id`);
--
-- Database: `id463720_acorp`
--
CREATE DATABASE IF NOT EXISTS `id463720_acorp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id463720_acorp`;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `expiredate`) VALUES
(1, '::1', '2017-01-16 10:27:26'),
(5, '88.162.163.58', '2017-01-24 20:43:37'),
(6, '88.162.163.58', '2017-01-24 20:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+120 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '0'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `possiblehours`
--

CREATE TABLE `possiblehours` (
  `id` int(11) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possiblehours`
--

INSERT INTO `possiblehours` (`id`, `hour`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00'),
(21, '18:00:00'),
(22, '18:30:00'),
(23, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startHourId` int(11) NOT NULL,
  `endHourId` int(11) NOT NULL,
  `numGuests` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `salleId`, `day`, `startHourId`, `endHourId`, `numGuests`, `userId`, `title`) VALUES
(100, 22, '2017-01-23', 13, 21, 10, 8, 'Résa1'),
(101, 22, '2017-01-21', 5, 6, 10, 8, 'Résa2'),
(102, 25, '2017-01-22', 13, 23, 2, 6, 'Ma réservation à moi'),
(103, 25, '2017-01-22', 12, 13, 3, 5, 'Test'),
(104, 22, '2017-01-24', 5, 7, 10, 9, 'UPDATE'),
(106, 25, '2017-01-26', 3, 4, 3, 5, '(Sans titre)'),
(108, 22, '2017-02-05', 4, 11, 10, 15, '(Sans titre)'),
(109, 25, '2017-02-05', 2, 7, 3, 5, '(Sans titre)'),
(110, 25, '2017-02-06', 9, 11, 3, 5, '(Sans titre)'),
(111, 22, '2017-02-06', 5, 6, 3, 5, '(Sans titre)'),
(112, 22, '2017-02-07', 2, 3, 10, 17, 'test jeremy'),
(113, 25, '2017-02-09', 4, 7, 3, 5, '(Sans titre)');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `name`, `places`) VALUES
(22, 'Salle Blanquefort', 10),
(23, 'Salle Louis Fargue', 25),
(25, 'Salle Clos De Hilde', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(65, 4, 'af3a37e9b85eb4cbfe3959a34412a51913090b40', '2017-01-13 05:01:10', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'b5984e08fc59e8baaf85b2eac92ae8ad729c9cfa'),
(95, 9, '025eb7e2d278b2e66e292c17367c1ddd4a7655ab', '2017-01-24 22:14:36', '88.162.163.58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '96a81ddef343d41f3972d01a7ab6567f7eaa3300'),
(99, 14, '2bed719d49e93c59768c7559b8678743321ad963', '2017-01-29 16:07:21', '109.23.253.246', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'b91a6107ffde9863ea838919c9f28796d56ef2b8'),
(100, 15, 'ab2095b9beb7595cc7d4c3067e208554f6556a16', '2017-03-05 11:05:24', '2a01:cb1c:51:c100:7c88:1b35:2803:e137', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', '7e5b91054dac0bcc873dece3ed953a65fed9869c'),
(102, 16, '738ce5ba034a8c3a5629af14ed2d5ea2f00529e4', '2017-02-05 14:26:48', '90.36.34.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '1f37a81534680d5f6865863f4bf675966116a5a6'),
(108, 17, 'bcc5857e829e1cf782049ca484b979af108c36aa', '2017-03-08 11:52:50', '80.15.92.135', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3004.3 Safari/537.36', '49821fd199c117d8926ba1880a4aff3f08bab0aa'),
(110, 6, 'd53b72d4a91f77b3f22b7e72d6d8a735971bdb57', '2017-02-09 15:27:41', '212.84.58.67', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'f3d765d29d5c1dc9f4ec650e805a7bb3cfded611');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`, `isadmin`) VALUES
(5, 'test.test@gmail.com', '$2y$10$rutv.D/fdCtdef90XrSxUO3IRZLJf/8lBY/DcEge8h8AbjBxEGKn6', 1, '2017-01-13 15:25:49', 'false'),
(6, 'admin.admin@gmail.com', '$2y$10$is02grqdrmLCNV7oXx7.SOjXeQINzq9h11jyXDIGebWFiBZbAKv1O', 1, '2017-01-16 08:58:34', 'true'),
(7, 'test@test.fr', '$2y$10$An20nPKsCgxfnZ/RkvaeBe/vfsw48M3M5U6xf9HjeEMR3zrsRopXq', 1, '2017-01-22 18:33:18', 'false'),
(8, 'test2@gmail.fr', '$2y$10$E3A3HwrHngeAMdaAHfMv0OhhNHC8/d.hSi0OSwMcTIVNnjw5WGntK', 1, '2017-01-22 18:34:20', 'false'),
(9, 'aec2@gmail.fr', '$2y$10$DMF/bUfyxFXGEC43sUydpOyDfApLd8bQL5Y47Pdc4IO7YwNbK0Poy', 1, '2017-01-24 19:14:27', 'false'),
(10, 'test@gmail.com', '$2y$10$kFaW4isSUcNXK7JKz6h8LOULb2zwoADVZrrCLFruDcg/C3.1hNF.q', 1, '2017-01-29 12:57:14', 'false'),
(14, 'test2@gmail.com', '$2y$10$0/aeTygRC2urotN9hcT97uDVLJXwOH2Y8uSI2lEgmEXU1fK9eT4W.', 1, '2017-01-29 13:07:02', 'false'),
(15, 'virgile.delacerda@gmail.com', '$2y$10$zlQWwh4luZZ8YWURWf49oOEc.VNUxX/I1D61Dhj9/ijjN0mJ6hjky', 1, '2017-02-05 10:05:15', 'false'),
(16, 'naspy971@gmail.com', '$2y$10$euA9tgLur69b8lEPxmSUFOdwzhckPkCZSP3VbB3QnVatxvh1.XtjW', 1, '2017-02-05 11:26:22', 'false'),
(17, 'jeremy@p.fr', '$2y$10$yOzu6zGX2eqbx/iYpnACou3VbnZQWUe17/8UJuFzJ1oBr9SogWr2.', 1, '2017-02-07 14:33:07', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `possiblehours`
--
ALTER TABLE `possiblehours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hour` (`hour`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `salleId` (`salleId`),
  ADD KEY `hourId` (`startHourId`),
  ADD KEY `endHourId` (`endHourId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `possiblehours`
--
ALTER TABLE `possiblehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`salleId`) REFERENCES `salle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`startHourId`) REFERENCES `possiblehours` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`endHourId`) REFERENCES `possiblehours` (`id`);
--
-- Database: `id463720_acorp`
--
CREATE DATABASE IF NOT EXISTS `id463720_acorp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id463720_acorp`;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `expiredate`) VALUES
(1, '::1', '2017-01-16 10:27:26'),
(5, '88.162.163.58', '2017-01-24 20:43:37'),
(6, '88.162.163.58', '2017-01-24 20:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+120 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '0'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `possiblehours`
--

CREATE TABLE `possiblehours` (
  `id` int(11) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possiblehours`
--

INSERT INTO `possiblehours` (`id`, `hour`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00'),
(21, '18:00:00'),
(22, '18:30:00'),
(23, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startHourId` int(11) NOT NULL,
  `endHourId` int(11) NOT NULL,
  `numGuests` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `salleId`, `day`, `startHourId`, `endHourId`, `numGuests`, `userId`, `title`) VALUES
(100, 22, '2017-01-23', 13, 21, 10, 8, 'Résa1'),
(101, 22, '2017-01-21', 5, 6, 10, 8, 'Résa2'),
(102, 25, '2017-01-22', 13, 23, 2, 6, 'Ma réservation à moi'),
(103, 25, '2017-01-22', 12, 13, 3, 5, 'Test'),
(104, 22, '2017-01-24', 5, 7, 10, 9, 'UPDATE'),
(106, 25, '2017-01-26', 3, 4, 3, 5, '(Sans titre)'),
(108, 22, '2017-02-05', 4, 11, 10, 15, '(Sans titre)'),
(109, 25, '2017-02-05', 2, 7, 3, 5, '(Sans titre)'),
(110, 25, '2017-02-06', 9, 11, 3, 5, '(Sans titre)'),
(111, 22, '2017-02-06', 5, 6, 3, 5, '(Sans titre)'),
(112, 22, '2017-02-07', 2, 3, 10, 17, 'test jeremy'),
(113, 25, '2017-02-09', 4, 7, 3, 5, '(Sans titre)');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `name`, `places`) VALUES
(22, 'Salle Blanquefort', 10),
(23, 'Salle Louis Fargue', 25),
(25, 'Salle Clos De Hilde', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(65, 4, 'af3a37e9b85eb4cbfe3959a34412a51913090b40', '2017-01-13 05:01:10', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'b5984e08fc59e8baaf85b2eac92ae8ad729c9cfa'),
(95, 9, '025eb7e2d278b2e66e292c17367c1ddd4a7655ab', '2017-01-24 22:14:36', '88.162.163.58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '96a81ddef343d41f3972d01a7ab6567f7eaa3300'),
(99, 14, '2bed719d49e93c59768c7559b8678743321ad963', '2017-01-29 16:07:21', '109.23.253.246', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'b91a6107ffde9863ea838919c9f28796d56ef2b8'),
(100, 15, 'ab2095b9beb7595cc7d4c3067e208554f6556a16', '2017-03-05 11:05:24', '2a01:cb1c:51:c100:7c88:1b35:2803:e137', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', '7e5b91054dac0bcc873dece3ed953a65fed9869c'),
(102, 16, '738ce5ba034a8c3a5629af14ed2d5ea2f00529e4', '2017-02-05 14:26:48', '90.36.34.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '1f37a81534680d5f6865863f4bf675966116a5a6'),
(108, 17, 'bcc5857e829e1cf782049ca484b979af108c36aa', '2017-03-08 11:52:50', '80.15.92.135', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3004.3 Safari/537.36', '49821fd199c117d8926ba1880a4aff3f08bab0aa'),
(110, 6, 'd53b72d4a91f77b3f22b7e72d6d8a735971bdb57', '2017-02-09 15:27:41', '212.84.58.67', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'f3d765d29d5c1dc9f4ec650e805a7bb3cfded611');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`, `isadmin`) VALUES
(5, 'test.test@gmail.com', '$2y$10$rutv.D/fdCtdef90XrSxUO3IRZLJf/8lBY/DcEge8h8AbjBxEGKn6', 1, '2017-01-13 15:25:49', 'false'),
(6, 'admin.admin@gmail.com', '$2y$10$is02grqdrmLCNV7oXx7.SOjXeQINzq9h11jyXDIGebWFiBZbAKv1O', 1, '2017-01-16 08:58:34', 'true'),
(7, 'test@test.fr', '$2y$10$An20nPKsCgxfnZ/RkvaeBe/vfsw48M3M5U6xf9HjeEMR3zrsRopXq', 1, '2017-01-22 18:33:18', 'false'),
(8, 'test2@gmail.fr', '$2y$10$E3A3HwrHngeAMdaAHfMv0OhhNHC8/d.hSi0OSwMcTIVNnjw5WGntK', 1, '2017-01-22 18:34:20', 'false'),
(9, 'aec2@gmail.fr', '$2y$10$DMF/bUfyxFXGEC43sUydpOyDfApLd8bQL5Y47Pdc4IO7YwNbK0Poy', 1, '2017-01-24 19:14:27', 'false'),
(10, 'test@gmail.com', '$2y$10$kFaW4isSUcNXK7JKz6h8LOULb2zwoADVZrrCLFruDcg/C3.1hNF.q', 1, '2017-01-29 12:57:14', 'false'),
(14, 'test2@gmail.com', '$2y$10$0/aeTygRC2urotN9hcT97uDVLJXwOH2Y8uSI2lEgmEXU1fK9eT4W.', 1, '2017-01-29 13:07:02', 'false'),
(15, 'virgile.delacerda@gmail.com', '$2y$10$zlQWwh4luZZ8YWURWf49oOEc.VNUxX/I1D61Dhj9/ijjN0mJ6hjky', 1, '2017-02-05 10:05:15', 'false'),
(16, 'naspy971@gmail.com', '$2y$10$euA9tgLur69b8lEPxmSUFOdwzhckPkCZSP3VbB3QnVatxvh1.XtjW', 1, '2017-02-05 11:26:22', 'false'),
(17, 'jeremy@p.fr', '$2y$10$yOzu6zGX2eqbx/iYpnACou3VbnZQWUe17/8UJuFzJ1oBr9SogWr2.', 1, '2017-02-07 14:33:07', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `possiblehours`
--
ALTER TABLE `possiblehours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hour` (`hour`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `salleId` (`salleId`),
  ADD KEY `hourId` (`startHourId`),
  ADD KEY `endHourId` (`endHourId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `possiblehours`
--
ALTER TABLE `possiblehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`salleId`) REFERENCES `salle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`startHourId`) REFERENCES `possiblehours` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`endHourId`) REFERENCES `possiblehours` (`id`);
--
-- Database: `id463720_acorp`
--
CREATE DATABASE IF NOT EXISTS `id463720_acorp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id463720_acorp`;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `expiredate`) VALUES
(1, '::1', '2017-01-16 10:27:26'),
(5, '88.162.163.58', '2017-01-24 20:43:37'),
(6, '88.162.163.58', '2017-01-24 20:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+120 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '0'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `possiblehours`
--

CREATE TABLE `possiblehours` (
  `id` int(11) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possiblehours`
--

INSERT INTO `possiblehours` (`id`, `hour`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00'),
(21, '18:00:00'),
(22, '18:30:00'),
(23, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startHourId` int(11) NOT NULL,
  `endHourId` int(11) NOT NULL,
  `numGuests` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `salleId`, `day`, `startHourId`, `endHourId`, `numGuests`, `userId`, `title`) VALUES
(100, 22, '2017-01-23', 13, 21, 10, 8, 'Résa1'),
(101, 22, '2017-01-21', 5, 6, 10, 8, 'Résa2'),
(102, 25, '2017-01-22', 13, 23, 2, 6, 'Ma réservation à moi'),
(103, 25, '2017-01-22', 12, 13, 3, 5, 'Test'),
(104, 22, '2017-01-24', 5, 7, 10, 9, 'UPDATE'),
(106, 25, '2017-01-26', 3, 4, 3, 5, '(Sans titre)'),
(108, 22, '2017-02-05', 4, 11, 10, 15, '(Sans titre)'),
(109, 25, '2017-02-05', 2, 7, 3, 5, '(Sans titre)'),
(110, 25, '2017-02-06', 9, 11, 3, 5, '(Sans titre)'),
(111, 22, '2017-02-06', 5, 6, 3, 5, '(Sans titre)'),
(112, 22, '2017-02-07', 2, 3, 10, 17, 'test jeremy'),
(113, 25, '2017-02-09', 4, 7, 3, 5, '(Sans titre)');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `name`, `places`) VALUES
(22, 'Salle Blanquefort', 10),
(23, 'Salle Louis Fargue', 25),
(25, 'Salle Clos De Hilde', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(65, 4, 'af3a37e9b85eb4cbfe3959a34412a51913090b40', '2017-01-13 05:01:10', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'b5984e08fc59e8baaf85b2eac92ae8ad729c9cfa'),
(95, 9, '025eb7e2d278b2e66e292c17367c1ddd4a7655ab', '2017-01-24 22:14:36', '88.162.163.58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '96a81ddef343d41f3972d01a7ab6567f7eaa3300'),
(99, 14, '2bed719d49e93c59768c7559b8678743321ad963', '2017-01-29 16:07:21', '109.23.253.246', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'b91a6107ffde9863ea838919c9f28796d56ef2b8'),
(100, 15, 'ab2095b9beb7595cc7d4c3067e208554f6556a16', '2017-03-05 11:05:24', '2a01:cb1c:51:c100:7c88:1b35:2803:e137', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', '7e5b91054dac0bcc873dece3ed953a65fed9869c'),
(102, 16, '738ce5ba034a8c3a5629af14ed2d5ea2f00529e4', '2017-02-05 14:26:48', '90.36.34.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '1f37a81534680d5f6865863f4bf675966116a5a6'),
(108, 17, 'bcc5857e829e1cf782049ca484b979af108c36aa', '2017-03-08 11:52:50', '80.15.92.135', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3004.3 Safari/537.36', '49821fd199c117d8926ba1880a4aff3f08bab0aa'),
(110, 6, 'd53b72d4a91f77b3f22b7e72d6d8a735971bdb57', '2017-02-09 15:27:41', '212.84.58.67', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'f3d765d29d5c1dc9f4ec650e805a7bb3cfded611');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`, `isadmin`) VALUES
(5, 'test.test@gmail.com', '$2y$10$rutv.D/fdCtdef90XrSxUO3IRZLJf/8lBY/DcEge8h8AbjBxEGKn6', 1, '2017-01-13 15:25:49', 'false'),
(6, 'admin.admin@gmail.com', '$2y$10$is02grqdrmLCNV7oXx7.SOjXeQINzq9h11jyXDIGebWFiBZbAKv1O', 1, '2017-01-16 08:58:34', 'true'),
(7, 'test@test.fr', '$2y$10$An20nPKsCgxfnZ/RkvaeBe/vfsw48M3M5U6xf9HjeEMR3zrsRopXq', 1, '2017-01-22 18:33:18', 'false'),
(8, 'test2@gmail.fr', '$2y$10$E3A3HwrHngeAMdaAHfMv0OhhNHC8/d.hSi0OSwMcTIVNnjw5WGntK', 1, '2017-01-22 18:34:20', 'false'),
(9, 'aec2@gmail.fr', '$2y$10$DMF/bUfyxFXGEC43sUydpOyDfApLd8bQL5Y47Pdc4IO7YwNbK0Poy', 1, '2017-01-24 19:14:27', 'false'),
(10, 'test@gmail.com', '$2y$10$kFaW4isSUcNXK7JKz6h8LOULb2zwoADVZrrCLFruDcg/C3.1hNF.q', 1, '2017-01-29 12:57:14', 'false'),
(14, 'test2@gmail.com', '$2y$10$0/aeTygRC2urotN9hcT97uDVLJXwOH2Y8uSI2lEgmEXU1fK9eT4W.', 1, '2017-01-29 13:07:02', 'false'),
(15, 'virgile.delacerda@gmail.com', '$2y$10$zlQWwh4luZZ8YWURWf49oOEc.VNUxX/I1D61Dhj9/ijjN0mJ6hjky', 1, '2017-02-05 10:05:15', 'false'),
(16, 'naspy971@gmail.com', '$2y$10$euA9tgLur69b8lEPxmSUFOdwzhckPkCZSP3VbB3QnVatxvh1.XtjW', 1, '2017-02-05 11:26:22', 'false'),
(17, 'jeremy@p.fr', '$2y$10$yOzu6zGX2eqbx/iYpnACou3VbnZQWUe17/8UJuFzJ1oBr9SogWr2.', 1, '2017-02-07 14:33:07', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `possiblehours`
--
ALTER TABLE `possiblehours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hour` (`hour`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `salleId` (`salleId`),
  ADD KEY `hourId` (`startHourId`),
  ADD KEY `endHourId` (`endHourId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `possiblehours`
--
ALTER TABLE `possiblehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`salleId`) REFERENCES `salle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`startHourId`) REFERENCES `possiblehours` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`endHourId`) REFERENCES `possiblehours` (`id`);
--
-- Database: `id463720_acorp`
--
CREATE DATABASE IF NOT EXISTS `id463720_acorp` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id463720_acorp`;

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `id` int(11) NOT NULL,
  `ip` varchar(39) NOT NULL,
  `expiredate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`id`, `ip`, `expiredate`) VALUES
(1, '::1', '2017-01-16 10:27:26'),
(5, '88.162.163.58', '2017-01-24 20:43:37'),
(6, '88.162.163.58', '2017-01-24 20:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `setting` varchar(100) NOT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`setting`, `value`) VALUES
('attack_mitigation_time', '+30 minutes'),
('attempts_before_ban', '30'),
('attempts_before_verify', '5'),
('bcrypt_cost', '10'),
('cookie_domain', NULL),
('cookie_forget', '+120 minutes'),
('cookie_http', '0'),
('cookie_name', 'authID'),
('cookie_path', '/'),
('cookie_remember', '+1 month'),
('cookie_secure', '0'),
('emailmessage_suppress_activation', '0'),
('emailmessage_suppress_reset', '0'),
('mail_charset', 'UTF-8'),
('password_min_score', '0'),
('request_key_expiration', '+10 minutes'),
('site_activation_page', 'activate'),
('site_email', 'no-reply@phpauth.cuonic.com'),
('site_key', 'fghuior.)/!/jdUkd8s2!7HVHG7777ghg'),
('site_name', 'PHPAuth'),
('site_password_reset_page', 'reset'),
('site_timezone', 'Europe/Paris'),
('site_url', 'https://github.com/PHPAuth/PHPAuth'),
('smtp', '0'),
('smtp_auth', '1'),
('smtp_host', 'smtp.example.com'),
('smtp_password', 'password'),
('smtp_port', '25'),
('smtp_security', NULL),
('smtp_username', 'email@example.com'),
('table_attempts', 'attempts'),
('table_requests', 'requests'),
('table_sessions', 'sessions'),
('table_users', 'users'),
('verify_email_max_length', '100'),
('verify_email_min_length', '5'),
('verify_email_use_banlist', '1'),
('verify_password_min_length', '3');

-- --------------------------------------------------------

--
-- Table structure for table `possiblehours`
--

CREATE TABLE `possiblehours` (
  `id` int(11) NOT NULL,
  `hour` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `possiblehours`
--

INSERT INTO `possiblehours` (`id`, `hour`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00'),
(21, '18:00:00'),
(22, '18:30:00'),
(23, '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rkey` varchar(20) NOT NULL,
  `expire` datetime NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `salleId` int(11) NOT NULL,
  `day` date NOT NULL,
  `startHourId` int(11) NOT NULL,
  `endHourId` int(11) NOT NULL,
  `numGuests` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `salleId`, `day`, `startHourId`, `endHourId`, `numGuests`, `userId`, `title`) VALUES
(100, 22, '2017-01-23', 13, 21, 10, 8, 'Résa1'),
(101, 22, '2017-01-21', 5, 6, 10, 8, 'Résa2'),
(102, 25, '2017-01-22', 13, 23, 2, 6, 'Ma réservation à moi'),
(103, 25, '2017-01-22', 12, 13, 3, 5, 'Test'),
(104, 22, '2017-01-24', 5, 7, 10, 9, 'UPDATE'),
(106, 25, '2017-01-26', 3, 4, 3, 5, '(Sans titre)'),
(108, 22, '2017-02-05', 4, 11, 10, 15, '(Sans titre)'),
(109, 25, '2017-02-05', 2, 7, 3, 5, '(Sans titre)'),
(110, 25, '2017-02-06', 9, 11, 3, 5, '(Sans titre)'),
(111, 22, '2017-02-06', 5, 6, 3, 5, '(Sans titre)'),
(112, 22, '2017-02-07', 2, 3, 10, 17, 'test jeremy'),
(113, 25, '2017-02-09', 4, 7, 3, 5, '(Sans titre)');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id`, `name`, `places`) VALUES
(22, 'Salle Blanquefort', 10),
(23, 'Salle Louis Fargue', 25),
(25, 'Salle Clos De Hilde', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `hash` varchar(40) NOT NULL,
  `expiredate` datetime NOT NULL,
  `ip` varchar(39) NOT NULL,
  `agent` varchar(200) NOT NULL,
  `cookie_crc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `uid`, `hash`, `expiredate`, `ip`, `agent`, `cookie_crc`) VALUES
(65, 4, 'af3a37e9b85eb4cbfe3959a34412a51913090b40', '2017-01-13 05:01:10', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'b5984e08fc59e8baaf85b2eac92ae8ad729c9cfa'),
(95, 9, '025eb7e2d278b2e66e292c17367c1ddd4a7655ab', '2017-01-24 22:14:36', '88.162.163.58', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', '96a81ddef343d41f3972d01a7ab6567f7eaa3300'),
(99, 14, '2bed719d49e93c59768c7559b8678743321ad963', '2017-01-29 16:07:21', '109.23.253.246', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'b91a6107ffde9863ea838919c9f28796d56ef2b8'),
(100, 15, 'ab2095b9beb7595cc7d4c3067e208554f6556a16', '2017-03-05 11:05:24', '2a01:cb1c:51:c100:7c88:1b35:2803:e137', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:51.0) Gecko/20100101 Firefox/51.0', '7e5b91054dac0bcc873dece3ed953a65fed9869c'),
(102, 16, '738ce5ba034a8c3a5629af14ed2d5ea2f00529e4', '2017-02-05 14:26:48', '90.36.34.192', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.11; rv:50.0) Gecko/20100101 Firefox/50.0', '1f37a81534680d5f6865863f4bf675966116a5a6'),
(108, 17, 'bcc5857e829e1cf782049ca484b979af108c36aa', '2017-03-08 11:52:50', '80.15.92.135', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3004.3 Safari/537.36', '49821fd199c117d8926ba1880a4aff3f08bab0aa'),
(110, 6, 'd53b72d4a91f77b3f22b7e72d6d8a735971bdb57', '2017-02-09 15:27:41', '212.84.58.67', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'f3d765d29d5c1dc9f4ec650e805a7bb3cfded611');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '0',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isadmin` set('true','false') NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `isactive`, `dt`, `isadmin`) VALUES
(5, 'test.test@gmail.com', '$2y$10$rutv.D/fdCtdef90XrSxUO3IRZLJf/8lBY/DcEge8h8AbjBxEGKn6', 1, '2017-01-13 15:25:49', 'false'),
(6, 'admin.admin@gmail.com', '$2y$10$is02grqdrmLCNV7oXx7.SOjXeQINzq9h11jyXDIGebWFiBZbAKv1O', 1, '2017-01-16 08:58:34', 'true'),
(7, 'test@test.fr', '$2y$10$An20nPKsCgxfnZ/RkvaeBe/vfsw48M3M5U6xf9HjeEMR3zrsRopXq', 1, '2017-01-22 18:33:18', 'false'),
(8, 'test2@gmail.fr', '$2y$10$E3A3HwrHngeAMdaAHfMv0OhhNHC8/d.hSi0OSwMcTIVNnjw5WGntK', 1, '2017-01-22 18:34:20', 'false'),
(9, 'aec2@gmail.fr', '$2y$10$DMF/bUfyxFXGEC43sUydpOyDfApLd8bQL5Y47Pdc4IO7YwNbK0Poy', 1, '2017-01-24 19:14:27', 'false'),
(10, 'test@gmail.com', '$2y$10$kFaW4isSUcNXK7JKz6h8LOULb2zwoADVZrrCLFruDcg/C3.1hNF.q', 1, '2017-01-29 12:57:14', 'false'),
(14, 'test2@gmail.com', '$2y$10$0/aeTygRC2urotN9hcT97uDVLJXwOH2Y8uSI2lEgmEXU1fK9eT4W.', 1, '2017-01-29 13:07:02', 'false'),
(15, 'virgile.delacerda@gmail.com', '$2y$10$zlQWwh4luZZ8YWURWf49oOEc.VNUxX/I1D61Dhj9/ijjN0mJ6hjky', 1, '2017-02-05 10:05:15', 'false'),
(16, 'naspy971@gmail.com', '$2y$10$euA9tgLur69b8lEPxmSUFOdwzhckPkCZSP3VbB3QnVatxvh1.XtjW', 1, '2017-02-05 11:26:22', 'false'),
(17, 'jeremy@p.fr', '$2y$10$yOzu6zGX2eqbx/iYpnACou3VbnZQWUe17/8UJuFzJ1oBr9SogWr2.', 1, '2017-02-07 14:33:07', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `possiblehours`
--
ALTER TABLE `possiblehours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hour` (`hour`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `salleId` (`salleId`),
  ADD KEY `hourId` (`startHourId`),
  ADD KEY `endHourId` (`endHourId`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
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
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `possiblehours`
--
ALTER TABLE `possiblehours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `salle`
--
ALTER TABLE `salle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`salleId`) REFERENCES `salle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`startHourId`) REFERENCES `possiblehours` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`endHourId`) REFERENCES `possiblehours` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
