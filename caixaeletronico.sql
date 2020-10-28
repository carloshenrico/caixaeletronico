-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Out-2020 às 17:50
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `caixaeletronico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id` int(11) UNSIGNED NOT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `agencia` int(11) DEFAULT NULL,
  `conta` int(11) DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `saldo` float DEFAULT NULL,
  `token` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id`, `titular`, `agencia`, `conta`, `senha`, `saldo`, `token`) VALUES
(1, 'Bonieky Lacerda', 8497, 752900, '$2y$10$K36930jJcq.lhtIPPA63ku/N3RZReZk.3cuiYHsYTCqhj/9meom6C', 73.4, '3b8dcb458760fafabf03b45c9cb0662e'),
(2, 'Carlos Henrico Silva Dias', 8497, 772288, '$2y$10$PmATMbVH.7xPoFInCx2Ft./BtLRYjNKXnpLWBaTTr8bCg./YB4g8W', 16510, 'a3ffc3a1406cb4883ed6e57c5b30233b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicos`
--

CREATE TABLE `historicos` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_conta` int(11) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `data_operacao` datetime DEFAULT NULL,
  `destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historicos`
--

INSERT INTO `historicos` (`id`, `id_conta`, `tipo`, `valor`, `data_operacao`, `destino`) VALUES
(1, 2, 0, 1000, '2017-07-10 12:28:00', 0),
(2, 2, 1, 150.3, '2017-07-10 12:28:31', 0),
(3, 2, 0, 20, '2017-07-10 12:28:54', 0),
(4, 2, 1, 69.7, '2017-07-10 12:29:09', NULL),
(5, 2, 1, 100, '2017-07-10 12:29:20', NULL),
(6, 2, 0, 4983.2, '2017-07-10 12:29:35', NULL),
(7, 2, 1, 600, '2017-07-10 12:29:50', NULL),
(8, 2, 1, 100, '2020-10-28 17:26:00', 752900),
(9, 2, 1, 1400.2, '2020-10-28 17:27:00', 752900),
(10, 1, 1, 10, '2020-10-28 17:30:00', 772288),
(11, 2, 0, 10, '2020-10-28 17:30:00', 752900),
(12, 2, 1, 500, '2020-10-28 17:40:00', 752900),
(13, 1, 0, 500, '2020-10-28 17:40:00', 772288),
(14, 1, 1, 7000, '2020-10-28 17:44:00', 772288),
(15, 2, 0, 7000, '2020-10-28 17:44:00', 752900);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historicos`
--
ALTER TABLE `historicos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contas`
--
ALTER TABLE `contas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `historicos`
--
ALTER TABLE `historicos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
