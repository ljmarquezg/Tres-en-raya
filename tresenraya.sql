-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2018 at 12:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tresenraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `juego`
--

CREATE TABLE `juego` (
  `id` int(11) NOT NULL,
  `jugador` int(11) NOT NULL,
  `turnos` int(11) NOT NULL,
  `estado` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos1` int(11) NOT NULL,
  `pos2` int(11) NOT NULL,
  `pos3` int(11) NOT NULL,
  `pos4` int(11) NOT NULL,
  `pos5` int(11) NOT NULL,
  `pos6` int(11) NOT NULL,
  `pos7` int(11) NOT NULL,
  `pos8` int(11) NOT NULL,
  `pos9` int(11) NOT NULL,
  `ganador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `juego`
--

INSERT INTO `juego` (`id`, `jugador`, `turnos`, `estado`, `pos1`, `pos2`, `pos3`, `pos4`, `pos5`, `pos6`, `pos7`, `pos8`, `pos9`, `ganador`) VALUES
(1, 1, 9, 'En curso', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 2, 0, 'Empate', 1, 1, 2, 2, 2, 1, 1, 2, 1, 3),
(3, 1, 9, 'En curso', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 1, 'El ganador es: 2', 1, 2, 0, 2, 2, 1, 1, 2, 1, 2),
(5, 2, 2, 'El ganador es: 1', 2, 0, 1, 0, 2, 1, 1, 2, 1, 1),
(6, 1, 9, 'En curso', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180707155944');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `juego`
--
ALTER TABLE `juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
