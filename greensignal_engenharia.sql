-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Jan-2021 às 11:50
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `greensignal_engenharia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empreendimento`
--

CREATE TABLE `empreendimento` (
  `id_empempreendimento` int(11) NOT NULL,
  `nome_empreendimento` varchar(150) NOT NULL,
  `cep_empreendimento` char(9) NOT NULL,
  `endereco_empreendimento` varchar(200) NOT NULL,
  `numero_empreendimento` int(6) NOT NULL,
  `estado_empreendimento` char(2) NOT NULL,
  `bairro_empreendimento` varchar(50) NOT NULL,
  `cidade_empreendimento` varchar(50) NOT NULL,
  `valortotalobra_empreendimento` double(9,2) NOT NULL,
  `datainicioobra_empreendimento` date NOT NULL,
  `datafimobra_empreendimento` date NOT NULL,
  `id_responsaveltecnico_empreendimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `responsavel_tecnico`
--

CREATE TABLE `responsavel_tecnico` (
  `id_responsaveltecnico` int(11) NOT NULL,
  `nome_responsaveltecnico` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_venda`
--

CREATE TABLE `status_venda` (
  `id_status` int(11) NOT NULL,
  `status_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `status_venda`
--

INSERT INTO `status_venda` (`id_status`, `status_status`) VALUES
(1, 'Concluída'),
(2, 'Pendente'),
(3, 'Em negociação'),
(4, 'Perdida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id_unidade` int(11) NOT NULL,
  `id_empreendimento_unidade` int(11) NOT NULL,
  `numero_unidade` int(4) NOT NULL,
  `areatotal_unidade` double(9,2) NOT NULL,
  `areaprivativa_unidade` double(9,2) NOT NULL,
  `areacoberta_unidade` double(9,2) NOT NULL,
  `cobertura_unidade` tinyint(1) NOT NULL,
  `valorvenda_unidade` double(9,2) NOT NULL,
  `valoravaliacaobanco_unidade` double(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int(11) NOT NULL,
  `id_cliente_venda` int(11) NOT NULL,
  `id_vendedor_venda` int(11) NOT NULL,
  `id_unidade_venda` int(11) NOT NULL,
  `valorfinal_venda` double(9,2) NOT NULL,
  `valordesconto_venda` double(9,2) NOT NULL,
  `data_venda` date NOT NULL,
  `status_venda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int(11) NOT NULL,
  `nome_vendedor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `empreendimento`
--
ALTER TABLE `empreendimento`
  ADD PRIMARY KEY (`id_empempreendimento`),
  ADD KEY `fk_id_resptec` (`id_responsaveltecnico_empreendimento`);

--
-- Índices para tabela `responsavel_tecnico`
--
ALTER TABLE `responsavel_tecnico`
  ADD PRIMARY KEY (`id_responsaveltecnico`);

--
-- Índices para tabela `status_venda`
--
ALTER TABLE `status_venda`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id_unidade`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id_venda`),
  ADD KEY `fk_id_status` (`status_venda`),
  ADD KEY `fk_id_cliente` (`id_cliente_venda`),
  ADD KEY `fk_id_unidade` (`id_unidade_venda`),
  ADD KEY `fk_id_vendedor` (`id_vendedor_venda`);

--
-- Índices para tabela `vendedor`
--
ALTER TABLE `vendedor`
  ADD PRIMARY KEY (`id_vendedor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `empreendimento`
--
ALTER TABLE `empreendimento`
  MODIFY `id_empempreendimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `responsavel_tecnico`
--
ALTER TABLE `responsavel_tecnico`
  MODIFY `id_responsaveltecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `status_venda`
--
ALTER TABLE `status_venda`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id_venda` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendedor`
--
ALTER TABLE `vendedor`
  MODIFY `id_vendedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `empreendimento`
--
ALTER TABLE `empreendimento`
  ADD CONSTRAINT `fk_id_resptec` FOREIGN KEY (`id_responsaveltecnico_empreendimento`) REFERENCES `responsavel_tecnico` (`id_responsaveltecnico`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente_venda`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_id_status` FOREIGN KEY (`status_venda`) REFERENCES `status_venda` (`id_status`),
  ADD CONSTRAINT `fk_id_unidade` FOREIGN KEY (`id_unidade_venda`) REFERENCES `unidade` (`id_unidade`),
  ADD CONSTRAINT `fk_id_vendedor` FOREIGN KEY (`id_vendedor_venda`) REFERENCES `vendedor` (`id_vendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
