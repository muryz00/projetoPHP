-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Nov-2024 às 17:37
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbcontato`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cadastro_adm`
--

DROP TABLE IF EXISTS `tb_cadastro_adm`;
CREATE TABLE IF NOT EXISTS `tb_cadastro_adm` (
  `ID_ADM` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_ADM` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_ADM` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SENHA_ADM` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_ADM`),
  UNIQUE KEY `EMAIL_ADM` (`EMAIL_ADM`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_cadastro_adm`
--

INSERT INTO `tb_cadastro_adm` (`ID_ADM`, `NOME_ADM`, `EMAIL_ADM`, `SENHA_ADM`) VALUES
(1, 'Cleiton Fabiano Patricio', 'cleiton.patricio@etec.sp.gov.br', '123'),
(2, 'Ana', 'ana@etec.sp.gov.br', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CLIENTE` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `END_CLIENTE` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL_CLIENTE` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SENHA_CLIENTE` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_CLIENTE`),
  UNIQUE KEY `EMAIL_CLIENTE` (`EMAIL_CLIENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_faleconosco`
--

DROP TABLE IF EXISTS `tb_faleconosco`;
CREATE TABLE IF NOT EXISTS `tb_faleconosco` (
  `ID_CONTATO` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_CONTATO` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `FONE_CONTATO` char(17) COLLATE utf8_unicode_ci NOT NULL,
  `EMAIL_CONTATO` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `ASSUNTO_CONTATO` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `MSG_CONTATO` text COLLATE utf8_unicode_ci NOT NULL,
  `RESP_CONTATO` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`ID_CONTATO`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_faleconosco`
--

INSERT INTO `tb_faleconosco` (`ID_CONTATO`, `NOME_CONTATO`, `FONE_CONTATO`, `EMAIL_CONTATO`, `ASSUNTO_CONTATO`, `MSG_CONTATO`, `RESP_CONTATO`) VALUES
(1, 'Victor Correia Giacomi', '(11) 9-8899-7777', 'victor.giacomi@etec.sp.gov.br', 'Elogios', 'Novas maquinas são muito boas!', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

DROP TABLE IF EXISTS `tb_pedido`;
CREATE TABLE IF NOT EXISTS `tb_pedido` (
  `ID_PEDIDO` int(11) NOT NULL AUTO_INCREMENT,
  `DTA_PEDIDO` datetime NOT NULL,
  `VALOR_PEDIDO` decimal(7,2) NOT NULL,
  `STATUS_PEDIDO` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ID_CLIENTE` int(11) DEFAULT NULL,
  `ID_PROD` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PEDIDO`),
  KEY `ID_CLIENTE` (`ID_CLIENTE`),
  KEY `ID_PROD` (`ID_PROD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `ID_PROD` int(11) NOT NULL AUTO_INCREMENT,
  `NOME_PROD` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `VALOR_PROD` decimal(6,2) NOT NULL,
  `DESC_PROD` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_PROD`),
  UNIQUE KEY `NOME_PROD` (`NOME_PROD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
