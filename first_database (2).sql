-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Maio-2023 às 22:09
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `first_database`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `data_acesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `id_user`, `data_acesso`) VALUES
(1, 1, '22:55:13 - 23/01/2023'),
(2, 1, '22:55:36 - 23/01/2023'),
(3, 1, '22:59:26 - 23/01/2023'),
(4, 1, '23:01:08 - 23/01/2023'),
(5, 3, '23:01:59 - 23/01/2023'),
(6, 2, '23:05:17 - 23/01/2023'),
(7, 1, '19:20:35 - 24/01/2023'),
(8, 1, '19:32:41 - 24/01/2023'),
(9, 1, '21:23:52 - 24/01/2023'),
(10, 3, '21:41:53 - 24/01/2023'),
(11, 1, '17:59:28 - 25/01/2023'),
(12, 1, '17:59:35 - 25/01/2023'),
(13, 3, '17:59:44 - 25/01/2023'),
(14, 1, '18:02:57 - 25/01/2023'),
(15, 1, '18:07:20 - 25/01/2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `data_ultimo_acesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administradores`
--

INSERT INTO `administradores` (`id`, `nome`, `login`, `senha`, `data_ultimo_acesso`) VALUES
(1, 'Hugo', 'hugo', 'teste', '21:04:15 - 30/05/2023'),
(2, 'Fabio', 'fabio', '123', '13:55:11 - 04/02/2023'),
(3, 'Jessica', 'jessi', 'jessi', '18:31:48 - 25/01/2023');

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `morada` varchar(300) NOT NULL,
  `telemovel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `apelido`, `morada`, `telemovel`) VALUES
(1, 'hugo', 'moreira', 'porto', '111 111 111'),
(2, 'fabio', 'monteiro', 'braga', '222 222 222'),
(3, 'carlos', 'pereira', 'lisboa', '333 333 333');

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `morada` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `nome`, `apelido`, `idade`, `morada`) VALUES
(1, 'Hugo', 'Moreira', 37, 'Porto'),
(2, 'Maria', 'Silva', 23, 'Lisboa'),
(3, 'Fabio', 'Monteiro', 34, 'Famalicao'),
(4, 'Joana', 'Sousa', 12, 'STS'),
(5, 'Joao', 'Santos', 34, 'Braga');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motas`
--

CREATE TABLE `motas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `matricula` int(10) NOT NULL,
  `modelo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `motas`
--

INSERT INTO `motas` (`id`, `id_cliente`, `matricula`, `modelo`) VALUES
(1, 1, 111, 'honda'),
(2, 1, 222, 'suzuki'),
(3, 2, 333, 'kawasaki'),
(4, 3, 666, 'honda 600');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` float NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `quantidade`) VALUES
(1, 'queijo', 3.22, 14),
(2, 'bolo', 4.99, 10),
(3, 'pao', 0.2, 40),
(4, 'morango', 2.67, 20),
(5, 'banana da madeira', 1.99, 15),
(7, 'caneta', 0.9, 10),
(8, 'caneta vermelha', 0.9, 10),
(9, 'caneta verde', 0.9, 10),
(10, 'cafe', 1.34, 9);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `motas`
--
ALTER TABLE `motas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `motas`
--
ALTER TABLE `motas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
