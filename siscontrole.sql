-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2019 às 23:04
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siscontrole`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `vlr_total` decimal(10,0) DEFAULT NULL,
  `vlr_mensal` int(11) NOT NULL,
  `qtd_parcelas` int(11) DEFAULT NULL,
  `vencimento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `descricao`, `vlr_total`, `vlr_mensal`, `qtd_parcelas`, `vencimento`) VALUES
(1, 'tstA', '200', 20, 8, 0),
(2, 'ENEL', '200', 20, 12, 11),
(3, 'merciaria', '100', 10, 10, 22),
(5, 'tstA', '200', 20, 8, 0),
(6, 'tstA', '200', 20, 8, 0),
(7, 'tstA', '200', 20, 8, 0),
(8, 'tstA', '200', 20, 8, 0),
(9, 'tstA', '200', 20, 8, 0),
(10, 'NU Bank', '3000', 500, 6, 10),
(11, 'tstA', '200', 20, 8, 0),
(12, 'NU Bank', '3000', 500, 6, 10),
(13, 'tstA', '200', 20, 8, 0),
(14, 'NU Bank', '3000', 500, 6, 10),
(15, 'tstA', '200', 20, 8, 0),
(16, 'DIGIO Bank', '3000', 500, 6, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
