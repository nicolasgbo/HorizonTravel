-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/07/2025 às 19:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `horizon_travel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `passeios`
--

CREATE TABLE `passeios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `imagem1` varchar(255) NOT NULL,
  `imagem2` varchar(255) NOT NULL,
  `imagem3` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `passeios`
--

INSERT INTO `passeios` (`id`, `nome`, `descricao`, `imagem1`, `imagem2`, `imagem3`) VALUES
(1, 'Florianópolis - SC', 'Uma ilha encantadora com praias incríveis, dunas, trilhas e cultura açoriana vibrante.', 'img/imagem1_6865fb2dd44d3.webp', 'img/imagem2_6865fb2dd46f1.webp', 'img/imagem3_6865fb2dd47da.webp'),
(2, 'Lençóis Maranhenses - MA', 'Dunas douradas e lagoas de águas cristalinas formam uma paisagem surreal no nordeste brasileiro.', 'img/imagem1_6865fc3d0f253.jpeg', 'img/imagem2_6865fc3d0f475.webp', 'img/imagem3_6865fc3d0f711.jpg'),
(3, 'Bonito - MS', 'O paraíso do ecoturismo: rios transparentes, grutas e uma biodiversidade impressionante.', 'img/imagem1_6865fc7ee72ab.jpg', 'img/imagem2_6865fc7ee74cb.png', 'img/imagem3_6865fc7ee7799.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `idPlano` int(11) NOT NULL,
  `nomePlano` varchar(100) DEFAULT NULL,
  `descricaoPlano` text DEFAULT NULL,
  `precoPlano` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `planos`
--

INSERT INTO `planos` (`idPlano`, `nomePlano`, `descricaoPlano`, `precoPlano`) VALUES
(1, 'Plano Bronze', '✓ Suporte básico\n✓ Acesso a ofertas nacionais\n✓ 1 viagem por ano\n✓ Check-in antecipado (quando disponível)\n✓ Parcelamento em até 3x sem juros', 499.00),
(2, 'Plano Prata', '✓ Suporte intermediário\n✓ Ofertas nacionais e internacionais\n✓ 3 viagens por ano\n✓ Descontos em hotéis parceiros\n✓ Seguro viagem básico incluso\n✓ Parcelamento em até 6x sem juros', 399.00),
(3, 'Plano Platina', '✓ Suporte VIP 24h\n✓ Acesso a todos os destinos\n✓ Viagens ilimitadas no ano\n✓ Consultoria personalizada de roteiros\n✓ Sala VIP em aeroportos parceiros\n✓ Upgrade gratuito de categoria (quando disponível)\n✓ Seguro viagem premium incluso\n✓ Parcelamento em até 12x sem juros', 699.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPlano` int(11) DEFAULT NULL,
  `dataReserva` date DEFAULT NULL,
  `statusReserva` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `reservas`
--

INSERT INTO `reservas` (`idReserva`, `idUsuario`, `idPlano`, `dataReserva`, `statusReserva`) VALUES
(1, 3, 1, '2025-07-05', 'confirmada'),
(2, 3, 3, '2025-07-05', 'confirmada'),
(3, 3, 2, '2025-07-05', 'confirmada');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(150) DEFAULT NULL,
  `dataNascimentoUsuario` date DEFAULT NULL,
  `telefoneUsuario` varchar(20) DEFAULT NULL,
  `emailUsuario` varchar(100) DEFAULT NULL,
  `senhaUsuario` varchar(100) DEFAULT NULL,
  `tipoUsuario` varchar(20) DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nomeUsuario`, `dataNascimentoUsuario`, `telefoneUsuario`, `emailUsuario`, `senhaUsuario`, `tipoUsuario`) VALUES
(1, 'Admin', '2004-08-16', '(42) 98407-5645', 'admin@email.com', '$2y$10$8b/jkGf2wMZNdhx3XOOWuOkeGk7WSx4EiPG4xy9rNEjEn2k4zK31.', 'admin'),
(2, 'Paulo', '2000-01-01', '(42) 98540-4530', 'paulo@email.com', '$2y$10$cDD45mrlDy9P9IVaAcTUB.VysmDmoljX8/8wQqypn.t8Pi21qa9R2', 'cliente'),
(3, 'Nicolas', '2004-08-16', '(42) 99999-9999', 'nicolas@email.com', '$2y$10$DB0WXPOlx0Gl14fG0CgEM.Ph6vQDph7b2IOoJVG7yUhg8rZ9BBez.', 'cliente');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `passeios`
--
ALTER TABLE `passeios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`idPlano`);

--
-- Índices de tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idPlano` (`idPlano`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `unique_email` (`emailUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `passeios`
--
ALTER TABLE `passeios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `idPlano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idPlano`) REFERENCES `planos` (`idPlano`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
