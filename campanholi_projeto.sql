-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Jul-2020 às 20:34
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `campanholi_projeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `data`) VALUES
(1, 'Ração', '0000-00-00 00:00:00'),
(2, 'Pesca', '0000-00-00 00:00:00'),
(9, 'Jardinagem', '2020-06-25 16:07:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `total` float NOT NULL,
  `tipo` tinyint(1) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`id`, `total`, `tipo`, `data`) VALUES
(17, 98.52, 0, '2020-06-27 13:54:13'),
(18, 98.52, 0, '2020-06-27 13:58:27'),
(19, 98.52, 0, '2020-06-27 13:58:57'),
(20, 98.52, 0, '2020-06-27 13:59:41'),
(21, 98.52, 0, '2020-06-27 14:23:15'),
(22, 98.2, 0, '2020-06-27 20:16:49'),
(23, 98.3, 0, '2020-06-27 20:19:19'),
(24, 10, 0, '2020-06-27 20:24:12'),
(25, 35.2, 0, '2020-06-27 20:29:19'),
(26, 85, 0, '2020-06-27 20:30:27'),
(27, 85, 0, '2020-06-27 20:32:36'),
(28, 87, 0, '2020-06-27 20:34:15'),
(29, 87, 0, '2020-06-27 20:34:57'),
(30, 87, 0, '2020-06-27 20:35:32'),
(31, 21, 0, '2020-06-27 20:36:59'),
(32, 21, 0, '2020-06-27 20:37:39'),
(33, 32, 0, '2020-06-27 20:38:48'),
(34, 32, 0, '2020-06-27 20:39:23'),
(35, 32, 0, '2020-06-27 20:39:37'),
(36, 32, 0, '2020-06-27 20:39:53'),
(37, 32, 0, '2020-06-27 20:40:09'),
(38, 32, 0, '2020-06-27 20:40:51'),
(39, 32, 0, '2020-06-27 20:41:07'),
(40, 32, 0, '2020-06-27 20:42:28'),
(41, 32, 0, '2020-06-27 20:43:11'),
(42, 1, 0, '2020-06-27 20:43:56'),
(43, 1, 0, '2020-06-27 20:45:31'),
(44, 1, 0, '2020-06-27 20:46:29'),
(45, 1, 0, '2020-06-27 20:46:53'),
(46, 1, 0, '2020-06-27 20:47:52'),
(47, 1, 0, '2020-06-27 20:48:17'),
(48, 1, 0, '2020-06-27 20:50:13'),
(49, 1, 0, '2020-06-27 20:50:47'),
(50, 1, 0, '2020-06-27 20:51:53'),
(51, 1, 0, '2020-06-27 21:35:01'),
(52, 5, 0, '2020-06-27 22:41:45'),
(53, 1, 0, '2020-06-27 22:44:01'),
(54, 1, 0, '2020-06-27 22:44:27'),
(55, 1, 0, '2020-06-27 23:49:45'),
(56, 1, 0, '2020-06-29 10:11:03'),
(57, 2.52, 0, '2020-06-29 10:12:08'),
(58, 1.2, 0, '2020-06-29 10:14:12'),
(59, 1.2, 0, '2020-06-29 10:15:07'),
(60, 1.2, 0, '2020-06-29 10:15:48'),
(61, 1.2, 0, '2020-06-29 10:17:06'),
(62, 2.5, 0, '2020-06-30 10:55:54'),
(63, 2.5, 0, '2020-06-30 10:57:15'),
(64, 1.2, 0, '2020-06-30 10:58:02'),
(65, 85, 0, '2020-06-30 10:59:06'),
(66, 1, 0, '2020-06-30 12:00:53'),
(67, 5, 0, '2020-06-30 12:01:25'),
(68, 2.2, 0, '2020-06-30 12:03:56'),
(69, 2.2, 0, '2020-06-30 12:04:25'),
(70, 2.5, 0, '2020-06-30 12:05:23'),
(71, 2.31, 0, '2020-06-30 12:07:14'),
(72, 2.31, 0, '2020-06-30 12:08:05'),
(73, 2.31, 0, '2020-06-30 12:11:03'),
(74, 2.31, 0, '2020-06-30 12:12:36'),
(75, 2, 0, '2020-06-30 12:14:41'),
(76, 1, 0, '2020-06-30 12:15:04'),
(77, 50, 0, '2020-06-30 12:23:54'),
(78, 2.1, 0, '2020-06-30 12:25:40'),
(79, 50, 1, '2020-06-30 12:36:30'),
(80, 20, 1, '2020-06-30 12:37:39'),
(81, -1, 1, '2020-06-30 12:59:42'),
(82, -1, 1, '2020-06-30 13:00:20'),
(83, -20, 1, '2020-06-30 13:00:33'),
(84, -2, 1, '2020-06-30 13:01:46'),
(85, -20, 1, '2020-06-30 13:03:35'),
(86, -10, 1, '2020-06-30 13:04:51'),
(87, -50, 1, '2020-06-30 13:08:18'),
(88, -50, 1, '2020-06-30 13:08:35'),
(89, -100, 1, '2020-06-30 13:08:52'),
(90, -100, 1, '2020-06-30 13:10:34'),
(91, 150, 0, '2020-06-30 13:10:53'),
(92, -100, 1, '2020-06-30 13:11:14'),
(93, -100, 1, '2020-06-30 13:11:41'),
(94, -20, 1, '2020-06-30 13:12:24'),
(95, -20, 1, '2020-06-30 14:04:00'),
(96, -20, 1, '2020-06-30 14:04:28'),
(97, -1, 1, '2020-06-30 14:06:12'),
(98, -10, 1, '2020-06-30 14:07:04'),
(99, -10, 1, '2020-06-30 14:08:51'),
(100, -10, 1, '2020-06-30 14:09:24'),
(101, -1, 1, '2020-06-30 14:12:13'),
(102, -1, 1, '2020-06-30 14:12:31'),
(103, -10, 1, '2020-06-30 14:16:31'),
(104, -10, 1, '2020-06-30 14:20:09'),
(105, -10, 1, '2020-06-30 14:21:32'),
(106, -10, 1, '2020-06-30 14:22:12'),
(107, -10, 1, '2020-06-30 14:22:57'),
(108, -10, 1, '2020-06-30 14:23:11'),
(109, -10, 1, '2020-06-30 14:23:38'),
(110, 120, 0, '2020-06-30 14:24:04'),
(111, -2.5, 1, '2020-06-30 14:26:18'),
(112, -2.5, 1, '2020-06-30 14:26:49'),
(113, -2.5, 1, '2020-06-30 14:26:57'),
(114, -2.5, 1, '2020-06-30 14:27:58'),
(115, -2.5, 1, '2020-06-30 14:28:24'),
(116, -2.5, 1, '2020-06-30 14:29:05'),
(117, -2.5, 1, '2020-06-30 14:30:58'),
(118, -2.5, 1, '2020-06-30 14:32:24'),
(119, -2.5, 1, '2020-06-30 14:32:50'),
(120, -1, 1, '2020-06-30 14:33:15'),
(121, -1, 1, '2020-06-30 14:33:37'),
(122, -1, 1, '2020-06-30 14:33:46'),
(123, -1, 1, '2020-06-30 14:34:40'),
(124, -1, 1, '2020-06-30 14:34:56'),
(125, -1, 1, '2020-06-30 14:38:42'),
(126, -12, 1, '2020-06-30 14:40:02'),
(127, -50, 1, '2020-06-30 14:40:30'),
(129, 65.5, 0, '2020-07-01 14:39:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `id_venda` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `unidade_qt` int(11) NOT NULL,
  `kg_qt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_venda`, `id_produto`, `unidade_qt`, `kg_qt`) VALUES
(37, 56, 2, 1, 0),
(38, 57, 2, 2, 0),
(39, 58, 2, 4, 0),
(40, 59, 2, 4, 0),
(41, 60, 2, 5, 0),
(42, 61, 2, 5, 0),
(43, 62, 9, 10, 0),
(44, 63, 5, 0, 30),
(45, 64, 5, 0, 27.5),
(46, 65, 5, 0, 5),
(47, 66, 9, 1, 0),
(48, 67, 9, 1, 0),
(49, 68, 9, 1, 0),
(50, 69, 9, 1, 0),
(51, 70, 9, 1, 0),
(52, 71, 9, 1, 0),
(53, 72, 9, 1, 0),
(54, 73, 9, 1, 0),
(55, 74, 9, 1, 0),
(56, 75, 9, 1, 0),
(57, 76, 9, 1, 0),
(58, 77, 9, 10, 0),
(59, 78, 9, 2, 0),
(60, 79, 16, 10, 0),
(61, 80, 16, 0, 30),
(62, 81, 9, 5, 0),
(63, 82, 9, 5, 0),
(64, 83, 9, 5, 0),
(65, 84, 9, 1, 0),
(66, 85, 9, 10, 0),
(67, 86, 8, 5, 0),
(68, 87, 9, 25, 0),
(69, 88, 9, 25, 0),
(70, 89, 9, 40, 0),
(71, 90, 9, 40, 0),
(72, 91, 9, 100, 0),
(73, 92, 9, 50, 0),
(74, 93, 9, 50, 0),
(75, 94, 9, 30, 0),
(76, 95, 9, 30, 0),
(77, 96, 9, 30, 0),
(78, 97, 9, 1, 0),
(79, 98, 9, 5, 0),
(80, 99, 9, 5, 0),
(81, 100, 9, 5, 0),
(82, 101, 9, 1, 0),
(83, 102, 9, 1, 0),
(84, 103, 9, 5, 0),
(85, 104, 9, 5, 0),
(86, 105, 9, 2, 0),
(87, 106, 9, 2, 0),
(88, 107, 9, 2, 0),
(89, 108, 16, 5, 0),
(90, 109, 16, 2, 0),
(91, 110, 9, 50, 0),
(92, 111, 9, 20, 0),
(93, 112, 9, 20, 0),
(94, 113, 9, 20, 0),
(95, 114, 9, 20, 0),
(96, 115, 9, 20, 0),
(97, 116, 9, 20, 0),
(98, 117, 9, 20, 0),
(99, 118, 9, 20, 0),
(100, 119, 9, 20, 0),
(101, 120, 9, 25, 0),
(102, 121, 9, 1, 0),
(103, 122, 9, 1, 0),
(104, 123, 9, 1, 0),
(105, 124, 9, 2, 0),
(106, 125, 9, 3, 0),
(107, 126, 9, 3, 0),
(108, 127, 9, 10, 0),
(109, 128, 9, 1, 0),
(110, 129, 8, 5, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `img` varchar(150) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `unidades` int(11) NOT NULL,
  `unidade_kg` float DEFAULT NULL,
  `kg` float DEFAULT NULL,
  `preco_compra` float DEFAULT NULL,
  `preco_venda` float DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `min_estoque` int(11) NOT NULL DEFAULT 0,
  `estoque_avisar` tinyint(1) NOT NULL,
  `obs` text DEFAULT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `img`, `id_categoria`, `unidades`, `unidade_kg`, `kg`, `preco_compra`, `preco_venda`, `id_usuario`, `min_estoque`, `estoque_avisar`, `obs`, `data_cadastro`) VALUES
(8, 'Jarro de Barro', 'c080d31e4e6f7230ca3fab1439aa0d63.jpg', 2, 28, 0, 0, 10.5, 15.99, NULL, 10, 0, 'Jarro de barro em ótima qualidade', '2020-06-25 18:10:23'),
(9, 'Vara de pesca', 'fc4c7ab3a89fb804f0e27a99fd2792c3.jpg', 2, 414, 0, 0, 36.99, 52.99, NULL, 10, 0, 'Vara de pesca!', '2020-06-25 18:38:27'),
(10, 'Produto Teste', 'a56ad6c4561b98035a1b792606a21ba5.png', 1, 30, 5, 150, 75.21, 85.99, NULL, 15, 0, 'Produto de Teste', '2020-06-27 21:20:42'),
(11, 'Teste2', 'acf9056c516c58a94f38813d7cd22084', 1, 50, 0, 0, 0, 0, NULL, 20, 0, '', '2020-06-29 12:01:57'),
(12, 'Teste7', '9867d1b3f5731f77cf06e3ece3610d91', 9, 20, 5, 100, 0, 0, NULL, 10, 0, '', '2020-06-29 12:02:42'),
(13, 'Teste8', 'd55d151ee73b2c5126fe38155d59c41e', 2, 50, 0, 0, 0, 0, NULL, 5, 0, '', '2020-06-29 12:03:05'),
(14, 'Teste8', 'e9291401444c21a48d702f4d7056659d', 9, 89, 0, 0, 0, 0, NULL, 50, 0, '', '2020-06-29 12:03:18'),
(15, 'ZE', '947d71b4b8dfacdcdb65fa791f4f1093', 1, 65, 0, 0, 0, 0, NULL, 5, 0, '', '2020-06-29 12:03:45'),
(16, 'Cereal', 'f166dfdaa8b41d63eaeaeef6dc881777.jpg', 1, 35, 10, 350, 21.36, 40.12, NULL, 5, 0, '', '2020-06-30 11:41:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `grupo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tel`, `grupo`) VALUES
(2, 'João Gustavo', 'joao@teste.com', '$2y$10$42E7l8QcgKVMblIE4eDNxOeDqp3SQa5Xd9Rd2HH1MiWuVgyAcpeGm', '(44)7127318237', ''),
(3, 'José Bruno', 'jose@teste.com', '$2y$10$.Zn8YE34pwkpXwfYp48lW.F4HAqhc4EbibBvk9ZduJMiPCHSe1fJC', '(44)98844-7122', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
