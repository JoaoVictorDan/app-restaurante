-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Maio-2021 às 23:34
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `php_pdo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `email_clientes`
--

CREATE TABLE `email_clientes` (
  `idemail` int(11) NOT NULL,
  `nome` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(110) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedidos`
--

CREATE TABLE `tb_pedidos` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `pedido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_cadastrado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_pedidos`
--

INSERT INTO `tb_pedidos` (`id`, `id_status`, `pedido`, `data_cadastrado`) VALUES
(23, 1, 'santa tereza', '2021-05-24 22:06:22'),
(24, 1, 'santa cruz sem cebola', '2021-05-24 22:06:25'),
(25, 1, '', '2021-05-24 22:06:33'),
(26, 1, 'terminar de gravar os videos até as 22', '2021-05-25 12:44:35'),
(27, 1, '', '2021-05-25 13:58:55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id`, `status`) VALUES
(1, 'pendente'),
(2, 'realizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tarefas`
--

CREATE TABLE `tb_tarefas` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 1,
  `tarefa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_cadastrado` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_tarefas`
--

INSERT INTO `tb_tarefas` (`id`, `id_status`, `tarefa`, `data_cadastrado`) VALUES
(9, 2, 'X-Burguer', '2021-05-26 09:25:10'),
(11, 2, 'Santa Cruz obs: sem pimenta adicionar uma taguayork frioes tank', '2021-05-26 10:12:27'),
(18, 1, 'Santa Cruz obs: sem pimenta', '2021-05-26 18:22:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'admin', 'admin@admin', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `email_clientes`
--
ALTER TABLE `email_clientes`
  ADD PRIMARY KEY (`idemail`);

--
-- Índices para tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status` (`id_status`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `email_clientes`
--
ALTER TABLE `email_clientes`
  MODIFY `idemail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_pedidos`
--
ALTER TABLE `tb_pedidos`
  ADD CONSTRAINT `tb_pedidos_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id`);

--
-- Limitadores para a tabela `tb_tarefas`
--
ALTER TABLE `tb_tarefas`
  ADD CONSTRAINT `tb_tarefas_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_status` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
