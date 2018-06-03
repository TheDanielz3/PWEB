-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 30-Maio-2018 às 22:37
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `currentaccounts`
--

DROP TABLE IF EXISTS `currentaccounts`;
CREATE TABLE IF NOT EXISTS `currentaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_username` int(3) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `credito` int(10) NOT NULL,
  `debito` int(10) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `currentaccounts`
--

INSERT INTO `currentaccounts` (`id`, `id_username`, `tipo`, `descricao`, `credito`, `debito`, `saldo`) VALUES
(31, 65, 'pay', 'Carregamento 100 Euros', 100, 0, 400),
(34, 68, 'pay', 'Carregamento 100 Euros', 400, 0, 400),
(35, 65, 'pay', 'Carregamento 100 Euros', 400, 0, 800),
(36, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 775),
(37, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 750),
(38, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 725),
(39, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 700),
(40, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 675),
(41, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 725),
(42, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 775),
(43, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 750),
(44, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 725),
(45, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 775),
(46, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 825),
(47, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 875),
(48, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 925),
(49, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 900),
(50, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 875),
(51, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 925),
(52, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 900),
(53, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 875),
(54, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 925),
(55, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 915),
(56, 65, 'win', 'Ganhou 20 Creditos', 20, 0, 935),
(57, 65, 'win', 'Ganhou 10 Creditos', 10, 0, 945),
(58, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 940),
(59, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 935),
(60, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 930),
(61, 65, 'los', 'Perdeu 0 Creditos', 0, 0, 930),
(62, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 925),
(63, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 395),
(64, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 385),
(65, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 380),
(66, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 395),
(67, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 445),
(68, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 420),
(69, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 415),
(70, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 410),
(71, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 405),
(72, 65, 'win', 'Ganhou 10 Creditos', 10, 0, 415),
(73, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 410),
(74, 65, 'win', 'Ganhou 10 Creditos', 10, 0, 420),
(75, 65, 'win', 'Ganhou 20 Creditos', 20, 0, 440),
(76, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 430),
(77, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 420),
(78, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 395),
(79, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 385),
(80, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 360),
(81, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 350),
(82, 65, 'win', 'Ganhou 10 Creditos', 10, 0, 360),
(83, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 335),
(84, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 310),
(85, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 285),
(86, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 335),
(87, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 325),
(88, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 320),
(89, 65, 'win', 'Ganhou 10 Creditos', 10, 0, 330),
(90, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 325),
(91, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 375),
(92, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 350),
(93, 65, 'win', 'Ganhou 20 Creditos', 20, 0, 370),
(94, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 345),
(95, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 320),
(96, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 375),
(97, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 350),
(98, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 400),
(99, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 375),
(100, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 350),
(101, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 325),
(102, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 375),
(103, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 350),
(104, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 325),
(105, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 300),
(106, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 350),
(107, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 400),
(108, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 375),
(109, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 425),
(110, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 450),
(111, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 425),
(112, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 400),
(113, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 450),
(114, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 500),
(115, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 475),
(116, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 525),
(117, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 500),
(118, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 475),
(119, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 450),
(120, 65, 'los', 'Perdeu 5 Creditos', 0, 5, 445),
(121, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 420),
(122, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 395),
(123, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 370),
(124, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 420),
(125, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 395),
(126, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 445),
(127, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 420),
(128, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 395),
(129, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 445),
(130, 65, 'win', 'Ganhou 10 Creditos', 10, 0, 455),
(131, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 445),
(132, 65, 'los', 'Perdeu 10 Creditos', 0, 10, 435),
(133, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 450),
(134, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 425),
(135, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 400),
(136, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 375),
(137, 65, 'pay', 'Carregamento 100 Euros', 400, 0, 775),
(138, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 825),
(139, 65, 'win', 'Ganhou 0 Creditos', 0, 0, 825),
(140, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 800),
(141, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 775),
(142, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 750),
(143, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 800),
(144, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 850),
(145, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 825),
(146, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 800),
(147, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 775),
(148, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 750),
(149, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 725),
(150, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 700),
(151, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 675),
(152, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 650),
(153, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 700),
(154, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 675),
(155, 65, 'win', 'Ganhou 50 Creditos', 50, 0, 725),
(156, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 700),
(157, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 675),
(158, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 650),
(159, 65, 'los', 'Perdeu 25 Creditos', 0, 25, 625);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tops`
--

DROP TABLE IF EXISTS `tops`;
CREATE TABLE IF NOT EXISTS `tops` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pontuacao` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(30) NOT NULL,
  `datanascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `block` int(1) NOT NULL,
  `type` varchar(10) NOT NULL,
  `id` int(50) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`username`, `nome`, `apelido`, `datanascimento`, `email`, `password`, `block`, `type`, `id`) VALUES
('admin', 'admin', 'admin', '0001-01-01', 'admin@admin.com', 'admin1', 0, 'admin', 65),
('leonardorosa1', 'leonardo', 'rosa', '2018-01-01', 'leonardorosa1@hotmail.com', 'leonardorosa', 0, 'normal', 68);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
