-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 12-Nov-2020 às 19:14
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `podcast`
--
CREATE DATABASE IF NOT EXISTS `podcast` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `podcast`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `apresentador`
--

CREATE TABLE IF NOT EXISTS `apresentador` (
  `id_apresentador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_apresentador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `convidado`
--

CREATE TABLE IF NOT EXISTS `convidado` (
  `id_convidado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_convidado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `podcast`
--

CREATE TABLE IF NOT EXISTS `podcast` (
  `id_podcast` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_convidado` int(11) NOT NULL,
  `cod_apresentador` int(11) NOT NULL,
  PRIMARY KEY (`id_podcast`),
  KEY `cod_convidado` (`cod_convidado`),
  KEY `cod_apresentador` (`cod_apresentador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `podcast`
--
ALTER TABLE `podcast`
  ADD CONSTRAINT `podcast_ibfk_2` FOREIGN KEY (`cod_apresentador`) REFERENCES `apresentador` (`id_apresentador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `podcast_ibfk_1` FOREIGN KEY (`cod_convidado`) REFERENCES `convidado` (`id_convidado`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
