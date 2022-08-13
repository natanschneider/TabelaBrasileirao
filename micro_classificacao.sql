-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2022 at 11:19 PM
-- Server version: 10.5.16-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19376755_micro_classificacao`
--

-- --------------------------------------------------------

--
-- Table structure for table `classificacao`
--

CREATE TABLE `classificacao` (
  `id` int(15) NOT NULL,
  `clube` varchar(60) NOT NULL,
  `pts` int(10) NOT NULL,
  `pj` int(10) NOT NULL,
  `vit` int(10) NOT NULL,
  `e` int(10) NOT NULL,
  `der` int(10) NOT NULL,
  `gp` int(10) NOT NULL,
  `gc` int(10) NOT NULL,
  `sg` int(10) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `ult1` varchar(9) NOT NULL,
  `ult2` varchar(9) NOT NULL,
  `ult3` varchar(9) NOT NULL,
  `ult4` varchar(9) NOT NULL,
  `ult5` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classificacao`
--

INSERT INTO `classificacao` (`id`, `clube`, `pts`, `pj`, `vit`, `e`, `der`, `gp`, `gc`, `sg`, `data`, `ult1`, `ult2`, `ult3`, `ult4`, `ult5`) VALUES
(42, 'Palmeiras', 45, 21, 13, 6, 2, 36, 14, 22, '2022-08-13', 'Vitoria', 'Vitoria', 'Vitoria', 'Vitoria', 'Vitoria'),
(43, 'Corinthians', 39, 21, 11, 6, 4, 26, 20, 6, '2022-08-13', 'Empate', 'Vitoria', 'Vitoria', 'Vitoria', 'Derrota'),
(44, 'Fluminense', 38, 21, 11, 5, 5, 32, 22, 10, '2022-08-13', 'Vitoria', 'Empate', 'Vitoria', 'Vitoria', 'Empate'),
(45, 'Athletico', 37, 21, 11, 4, 6, 28, 22, 6, '2022-08-13', 'Vitoria', 'Vitoria', 'Derrota', 'Vitoria', 'Empate'),
(46, 'Flamengo', 36, 21, 11, 3, 7, 32, 19, 13, '2022-08-13', 'Vitoria', 'Vitoria', 'Vitoria', 'Vitoria', 'Vitoria'),
(47, 'Internacional', 33, 21, 8, 9, 4, 30, 23, 7, '2022-08-13', 'Derrota', 'Vitoria', 'Derrota', 'Empate', 'Empate'),
(48, 'Atlético-MG', 32, 21, 8, 8, 5, 29, 26, 3, '2022-08-13', 'Derrota', 'Derrota', 'Derrota', 'Empate', 'Vitoria'),
(49, 'Red Bull Bragantino', 30, 21, 8, 6, 7, 32, 25, 7, '2022-08-13', 'Derrota', 'Vitoria', 'Derrota', 'Vitoria', 'Vitoria'),
(50, 'Santos', 30, 21, 7, 9, 5, 26, 19, 7, '2022-08-13', 'Vitoria', 'Empate', 'Empate', 'Vitoria', 'Derrota'),
(51, 'América-MG', 27, 21, 8, 3, 10, 17, 23, -6, '2022-08-13', 'Vitoria', 'Vitoria', 'Vitoria', 'Derrota', 'Derrota'),
(52, 'Goiás', 26, 22, 6, 8, 8, 23, 29, -6, '2022-08-13', 'Empate', 'Derrota', 'Vitoria', 'Empate', 'Derrota'),
(53, 'São Paulo', 26, 21, 5, 11, 5, 28, 27, 1, '2022-08-13', 'Derrota', 'Derrota', 'Empate', 'Empate', 'Empate'),
(54, 'Botafogo', 25, 21, 7, 4, 10, 20, 26, -6, '2022-08-13', 'Empate', 'Derrota', 'Vitoria', 'Derrota', 'Derrota'),
(55, 'Ceará', 25, 21, 5, 10, 6, 22, 22, 0, '2022-08-13', 'Empate', 'Derrota', 'Derrota', 'Vitoria', 'Vitoria'),
(56, 'Avaí', 23, 22, 6, 5, 11, 23, 35, -12, '2022-08-13', 'Empate', 'Empate', 'Derrota', 'Derrota', 'Derrota'),
(57, 'Coritiba', 22, 21, 6, 4, 11, 23, 33, -10, '2022-08-13', 'Derrota', 'Derrota', 'Vitoria', 'Derrota', 'Derrota'),
(58, 'Fortaleza', 21, 21, 5, 6, 10, 19, 23, -4, '2022-08-13', 'Vitoria', 'Vitoria', 'Empate', 'Derrota', 'Vitoria'),
(59, 'Cuiabá', 20, 21, 5, 5, 11, 14, 22, -8, '2022-08-13', 'Derrota', 'Derrota', 'Derrota', 'Empate', 'Derrota'),
(60, 'Atlético-GO', 20, 21, 5, 5, 11, 21, 33, -12, '2022-08-13', 'Vitoria', 'Derrota', 'Derrota', 'Derrota', 'Derrota'),
(61, 'Juventude', 16, 21, 3, 7, 11, 16, 34, -18, '2022-08-13', 'Derrota', 'Derrota', 'Vitoria', 'Derrota', 'Empate');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
