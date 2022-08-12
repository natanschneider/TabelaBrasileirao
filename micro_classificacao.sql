-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 12/08/2022 às 05:37
-- Versão do servidor: 10.4.24-MariaDB
-- Versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `micro_classificacao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `classificacao`
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
  `ultimasCinco` varchar(60) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `classificacao`
--

INSERT INTO `classificacao` (`id`, `clube`, `pts`, `pj`, `vit`, `e`, `der`, `gp`, `gc`, `sg`, `ultimasCinco`, `data`) VALUES
(1, 'Palmeiras', 45, 21, 13, 6, 2, 36, 14, 22, 'V, V, V, V, V', '2022-08-11 22:18:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `classificacao`
--
ALTER TABLE `classificacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `classificacao`
--
ALTER TABLE `classificacao`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
