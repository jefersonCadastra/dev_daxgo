-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 29-Jun-2022 às 17:31
-- Versão do servidor: 5.7.38
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `daxgo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` IF NOT EXISTS (
  `id` int(9) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `account_ga` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `email`, `account_ga`) VALUES
(1, 'Lovz', 'contato@lovz.com.br', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dias_comportamento`
--

CREATE TABLE `dias_comportamento` IF NOT EXISTS (
  `id` int(11) NOT NULL,
  `id_cliente` int(9) NOT NULL,
  `data` date NOT NULL,
  `tipo_comportamento` varchar(1) NOT NULL COMMENT 'F - Feriado | S - Sem Faturamento'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medias_performance`
--

CREATE TABLE `medias_performance` IF NOT EXISTS (
  `id` int(11) NOT NULL,
  `dia_semana` int(1) NOT NULL COMMENT 'Dia da semana obedecendo o seguinte padrão da documentação do PHP: N - The ISO-8601 numeric representation of a day (1 for Monday, 7 for Sunday)',
  `media` double(8,2) NOT NULL,
  `id_cliente` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `metas`
--

CREATE TABLE `metas` IF NOT EXISTS (
  `id` int(9) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(4) NOT NULL,
  `valor` double(8,2) NOT NULL,
  `id_cliente` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `metas`
--

INSERT INTO `metas` (`id`, `nome`, `mes`, `ano`, `valor`, `id_cliente`) VALUES
(3, 'Faturamento', 2, 2022, 500.00, 1),
(5, 'Faturamento', 2, 2022, 500.00, 1),
(6, 'Faturamento', 2, 2022, 500.00, 1),
(7, 'visitas', 1, 2022, 1234.00, 1),
(15, 'faturamento', 1, 2022, 150.00, 1),
(17, 'faturamento', 1, 2022, 1322.00, 1),
(18, 'faturamento', 1, 2022, 12.00, 1),
(20, 'faturamento', 1, 2022, 123.00, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` IF NOT EXISTS (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `origens_visitas`
--

CREATE TABLE `origens_visitas` IF NOT EXISTS (
  `id` int(9) NOT NULL,
  `id_cliente` int(9) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` IF NOT EXISTS (
  `id` int(9) NOT NULL,
  `id_cliente` int(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_cliente`, `email`, `password`, `nome`) VALUES
(1, 1, 'jefferson.aurelio@cadastra.com', '$2y$10$ht7tTrWKgN2McqiQ0uKkCO6G6FGPOnawExNnQZhlDXupva.PODClS', 'Jeferson');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas`
--

CREATE TABLE `visitas` IF NOT EXISTS (
  `id` int(9) NOT NULL,
  `id_cliente` int(9) NOT NULL,
  `quantidade` double(14,2) NOT NULL,
  `mes` int(2) NOT NULL,
  `ano` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitas_detalhe`
--

CREATE TABLE `visitas_detalhe` IF NOT EXISTS (
  `id` int(9) NOT NULL,
  `id_visita` int(9) NOT NULL,
  `quantidade` double(14,2) NOT NULL,
  `origem_visita` int(9) NOT NULL,
  `visita_paga` varchar(1) NOT NULL,
  `cpc` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `dias_comportamento`
--
ALTER TABLE `dias_comportamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dias_comportamento_clientes` (`id_cliente`);

--
-- Índices para tabela `medias_performance`
--
ALTER TABLE `medias_performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_media_performance_cliente` (`id_cliente`),
  ADD KEY `dia_semana` (`dia_semana`);

--
-- Índices para tabela `metas`
--
ALTER TABLE `metas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mes` (`mes`,`ano`),
  ADD KEY `fk_metas_clientes` (`id_cliente`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `origens_visitas`
--
ALTER TABLE `origens_visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_origens_visitas_clientes` (`id_cliente`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices para tabela `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mes` (`mes`,`ano`),
  ADD KEY `fk_visistas_clientes` (`id_cliente`);

--
-- Índices para tabela `visitas_detalhe`
--
ALTER TABLE `visitas_detalhe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_visita` (`id_visita`),
  ADD KEY `visita_paga` (`visita_paga`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `dias_comportamento`
--
ALTER TABLE `dias_comportamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `medias_performance`
--
ALTER TABLE `medias_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `metas`
--
ALTER TABLE `metas`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `origens_visitas`
--
ALTER TABLE `origens_visitas`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `visitas_detalhe`
--
ALTER TABLE `visitas_detalhe`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dias_comportamento`
--
ALTER TABLE `dias_comportamento`
  ADD CONSTRAINT `fk_dias_comportamento_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `medias_performance`
--
ALTER TABLE `medias_performance`
  ADD CONSTRAINT `fk_media_performance_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `metas`
--
ALTER TABLE `metas`
  ADD CONSTRAINT `fk_metas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `origens_visitas`
--
ALTER TABLE `origens_visitas`
  ADD CONSTRAINT `fk_origens_visitas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `fk_visistas_clientes` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`);

--
-- Limitadores para a tabela `visitas_detalhe`
--
ALTER TABLE `visitas_detalhe`
  ADD CONSTRAINT `fk_visitas_detalhe_visitas` FOREIGN KEY (`id_visita`) REFERENCES `visitas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
