-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20-Set-2021 às 18:51
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curriculo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `experiencia` text NOT NULL,
  `formacao` text NOT NULL,
  `contato` text NOT NULL,
  `ferramentas` text NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `nome`, `cargo`, `experiencia`, `formacao`, `contato`, `ferramentas`, `imagem`) VALUES
(1, 'Homem Aranha', 'Fotógrafo', 'Clarim Diário', 'Ensino Médio Incompleto', 'Telefone:479999956665;e-mail: spider@gmail.com', 'Jornalismo, Fotografia', 'img/spider.jpg'),
(2, 'Batman', 'Super Herói', 'Detetive, Morcego', 'Boxe, Capoeira, Jiu-jitsu, Judô, Kung Fu, Muay Thai, Taekwondo', 'contato.batmanguide@gmail.com.', 'morcegomóvel, capa super protetora', 'img/batman.jpg'),
(3, 'Mulher Gato', 'Super heroína', 'Salvar o planeta', 'Gatolândia', 'mulhergato@gmail.com', 'unhas, garras e dentes', 'img/mulher_gato.jpg'),
(4, 'aadsdasda', 'sdsdasda', 'sasda', 'sdasdasda', 'dsasdasda', 'ssdasdasda', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `permissao` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`usuario`, `senha`, `permissao`) VALUES
('leitura', 'leitura', 2),
('ricardo', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
