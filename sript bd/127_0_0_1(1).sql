-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Out-2016 às 06:35
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_carrefour`
--
CREATE DATABASE IF NOT EXISTS `bd_carrefour` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_carrefour`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `un_medida` char(2) NOT NULL,
  `id_marca` mediumint(9) NOT NULL,
  `valor` float NOT NULL,
  `codigo_barras` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_tb_marca_tb_produto` (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `volume`, `un_medida`, `id_marca`, `valor`, `codigo_barras`) VALUES
(1, 'arroz', 5, 'kg', 1, 7.35, NULL),
(2, 'arroz', 5, 'kg', 5, 7.8, NULL),
(3, 'arroz', 5, 'kg', 4, 6.9, NULL),
(4, 'feijao', 5, 'kg', 1, 12.3, NULL),
(5, 'feijao', 5, 'kg', 3, 11, NULL),
(6, 'feijao', 5, 'kg', 4, 12.5, NULL),
(7, 'leite', 1, 'L', 26, 3.2, NULL),
(8, 'leite', 1, 'L', 28, 2.9, NULL),
(9, 'leite', 1, 'L', 27, 2.99, NULL),
(10, 'macarrao', 1, 'kg', 16, 3.26, NULL),
(11, 'acucar', 1, 'kg', 7, 2.5, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `bd_facilitte`.`tb_marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `bd_extra`
--
CREATE DATABASE IF NOT EXISTS `bd_extra` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_extra`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `un_medida` char(2) NOT NULL,
  `id_marca` mediumint(9) NOT NULL,
  `valor` float NOT NULL,
  `codigo_barras` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_tb_marca_tb_produto` (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `volume`, `un_medida`, `id_marca`, `valor`, `codigo_barras`) VALUES
(1, 'arroz', 5, 'kg', 1, 7, NULL),
(2, 'arroz', 5, 'kg', 5, 7.9, NULL),
(3, 'arroz', 5, 'kg', 4, 7.3, NULL),
(4, 'feijao', 5, 'kg', 1, 10.3, NULL),
(5, 'feijao', 5, 'kg', 3, 11.5, NULL),
(6, 'feijao', 5, 'kg', 4, 11.5, NULL),
(7, 'leite', 1, 'L', 26, 3.25, NULL),
(8, 'leite', 1, 'L', 28, 2.9, NULL),
(9, 'leite', 1, 'L', 27, 2.19, NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `bd_facilitte`.`tb_marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `bd_facilitte`
--
CREATE DATABASE IF NOT EXISTS `bd_facilitte` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_facilitte`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `cadastrarCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarCliente`(IN `var_cpf` BIGINT, IN `var_nome` VARCHAR(50), IN `var_sexo` CHAR, IN `var_apelido` VARCHAR(10), IN `var_telefone` INT, IN `var_dataNasc` DATE, IN `var_estado_civil` CHAR, IN `var_email` VARCHAR(30), IN `var_senha` VARCHAR(20))
BEGIN

INSERT INTO tb_cliente (cpf, nome, sexo, apelido, telefone, dataNasc, estado_civil, email, senha) VALUES(var_cpf, var_nome, var_sexo, var_apelido, var_telefone, var_dataNasc, var_estado_civil, var_email, var_senha);
    
END$$

DROP PROCEDURE IF EXISTS `cadastrarEnderecoCliente`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarEnderecoCliente`(id_cliente mediumInt, logradouro varchar(25), logradouro_numero numeric,
                                  complemento varchar (20), bairro varchar(25), id_uf int, id_cidade int, CEP numeric)
BEGIN

INSERT INTO tb_cliente VALUES (DEFAULT, id_cliente, logradouro, logradouro_numero, complemento, bairro, id_cidade, CEP);    
    
END$$

DROP PROCEDURE IF EXISTS `cadastrarListaDeCompra`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarListaDeCompra`(idCliente mediumInt, idProduto mediumInt, quantidade int)
BEGIN

INSERT INTO tb_lista_compra_cliente VALUES (idCliente, idProduto, quantidade);    
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidade`
--

DROP TABLE IF EXISTS `tb_cidade`;
CREATE TABLE IF NOT EXISTS `tb_cidade` (
  `id_cidade` mediumint(9) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(25) NOT NULL,
  `id_uf` int(11) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `fk_tb_uf_tb_cidade` (`id_uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_cidade`
--

INSERT INTO `tb_cidade` (`id_cidade`, `descricao`, `id_uf`) VALUES
(1, 'taboao da serra', 26);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `id_cliente` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cpf` bigint(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` enum('F','M') NOT NULL,
  `apelido` varchar(10) DEFAULT NULL,
  `telefone` bigint(11) DEFAULT NULL,
  `dataNasc` date NOT NULL,
  `estado_civil` enum('C','S') NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `unique_cpf_tb_cliente` (`cpf`),
  UNIQUE KEY `unique_email_tb_cliente` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `cpf`, `nome`, `sexo`, `apelido`, `telefone`, `dataNasc`, `estado_civil`, `email`, `senha`) VALUES
(0, 33344455500, 'robson silva', 'M', 'robinho', 55554444, '0000-00-00', 'S', 'rob.son@hotmail.com', '112233'),
(1, 39973199871, 'vinicius fernandes', 'M', 'vini', 58442890, '0000-00-00', 'S', 'vf2122@gmail.com', '123456'),
(7, 12345678900, 'vinicius ferreira', 'M', 'ferreira', 12345678, '1992-12-18', 'S', 'vf2122@yahoo.com', '123456'),
(8, 122345678, 'renata', 'M', 're', 58442200, '1991-10-18', 'S', 're_oliver@hotmail.com', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `id_endereco` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nome_endereco` varchar(25) DEFAULT NULL,
  `id_cliente` mediumint(9) NOT NULL,
  `logradouro` varchar(25) NOT NULL,
  `logradouro_numero` int(6) NOT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(25) NOT NULL,
  `id_cidade` mediumint(9) NOT NULL,
  `CEP` bigint(8) NOT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `fk_tb_cliente_tb_endereco` (`id_cliente`),
  KEY `fk_tb_cidade_tb_endereco` (`id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_endereco`, `nome_endereco`, `id_cliente`, `logradouro`, `logradouro_numero`, `complemento`, `bairro`, `id_cidade`, `CEP`) VALUES
(4, 'CASA', 1, 'rod Regis Bittencourt', 1525, '15c', 'centro', 1, 6768000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_lista`
--

DROP TABLE IF EXISTS `tb_item_lista`;
CREATE TABLE IF NOT EXISTS `tb_item_lista` (
  `id_lista` mediumint(9) NOT NULL,
  `id_produto` mediumint(9) NOT NULL,
  `quantidade` int(11) NOT NULL,
  PRIMARY KEY (`id_lista`,`id_produto`),
  KEY `fk_tb_produto_tb_item_lista` (`id_produto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_item_lista`
--

INSERT INTO `tb_item_lista` (`id_lista`, `id_produto`, `quantidade`) VALUES
(4, 1, 3),
(4, 4, 4),
(4, 5, 1),
(6, 1, 3),
(6, 4, 4),
(6, 5, 1),
(7, 1, 3),
(7, 4, 4),
(7, 5, 1),
(8, 1, 3),
(8, 3, 3),
(8, 4, 1),
(8, 5, 1),
(8, 6, 1),
(8, 7, 2),
(8, 8, 3),
(8, 9, 1),
(9, 1, 3),
(9, 2, 1),
(9, 4, 4),
(9, 5, 1),
(11, 4, 1),
(11, 5, 1),
(11, 6, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lista_compra_cliente`
--

DROP TABLE IF EXISTS `tb_lista_compra_cliente`;
CREATE TABLE IF NOT EXISTS `tb_lista_compra_cliente` (
  `id_lista` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cpf_cliente` bigint(11) NOT NULL,
  `nome_lista` varchar(20) NOT NULL,
  PRIMARY KEY (`id_lista`),
  KEY `fk_cpf_lista` (`cpf_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `tb_lista_compra_cliente`
--

INSERT INTO `tb_lista_compra_cliente` (`id_lista`, `cpf_cliente`, `nome_lista`) VALUES
(4, 39973199871, 'lista'),
(6, 39973199871, 'mensal'),
(7, 39973199871, 'nova lista'),
(8, 39973199871, 'lista fim do mes'),
(9, 39973199871, 'treta'),
(11, 122345678, 'lista do mes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_marca`
--

DROP TABLE IF EXISTS `tb_marca`;
CREATE TABLE IF NOT EXISTS `tb_marca` (
  `id_marca` mediumint(9) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(20) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `tb_marca`
--

INSERT INTO `tb_marca` (`id_marca`, `descricao`) VALUES
(1, 'Camil'),
(2, 'Prato Fino'),
(3, 'Tio João'),
(4, 'Namorado'),
(5, 'Pantera'),
(6, 'Broto Legal'),
(7, 'União'),
(8, 'Guarani'),
(9, 'Pilão'),
(10, 'Brasileiro'),
(11, 'Pelé'),
(12, 'Três Corações'),
(13, 'Lisa'),
(14, 'Soya'),
(15, 'Leve'),
(16, 'Renata'),
(17, 'Adria'),
(18, 'Galo'),
(19, 'Colgate'),
(20, 'Clouseup'),
(21, 'Oral-B'),
(22, 'Sorriso'),
(23, 'Ypê'),
(24, 'Minuano'),
(25, 'Candida'),
(26, 'Itambe'),
(27, 'Pirajussara'),
(28, 'Parmalat');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
CREATE TABLE IF NOT EXISTS `tb_produto` (
  `id_produto` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(20) NOT NULL,
  `volume` int(11) NOT NULL,
  `un_medida` char(2) NOT NULL,
  `id_marca` mediumint(9) NOT NULL,
  `codigo_barras` mediumint(9) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `fk_tb_marca_tb_produto` (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_produto`, `nome_produto`, `volume`, `un_medida`, `id_marca`, `codigo_barras`) VALUES
(1, 'arroz', 5, 'kg', 1, NULL),
(2, 'arroz', 5, 'kg', 5, NULL),
(3, 'arroz', 5, 'kg', 4, NULL),
(4, 'feijao', 5, 'kg', 1, NULL),
(5, 'feijao', 5, 'kg', 3, NULL),
(6, 'feijao', 5, 'kg', 4, NULL),
(7, 'leite', 1, 'L', 26, NULL),
(8, 'leite', 1, 'L', 28, NULL),
(9, 'leite', 1, 'L', 27, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_supermercado`
--

DROP TABLE IF EXISTS `tb_supermercado`;
CREATE TABLE IF NOT EXISTS `tb_supermercado` (
  `id_supermercado` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nm_supermercado` varchar(20) NOT NULL,
  `bm_bd` varchar(20) NOT NULL,
  PRIMARY KEY (`id_supermercado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tb_supermercado`
--

INSERT INTO `tb_supermercado` (`id_supermercado`, `nm_supermercado`, `bm_bd`) VALUES
(1, 'carrefour', 'bd_carrefour'),
(2, 'extra', 'bd_extra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_uf`
--

DROP TABLE IF EXISTS `tb_uf`;
CREATE TABLE IF NOT EXISTS `tb_uf` (
  `id_uf` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(25) NOT NULL,
  PRIMARY KEY (`id_uf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Extraindo dados da tabela `tb_uf`
--

INSERT INTO `tb_uf` (`id_uf`, `descricao`) VALUES
(1, 'AC'),
(2, 'AL'),
(3, 'AP'),
(4, 'AM'),
(5, 'BA'),
(6, 'CE'),
(7, 'DF'),
(8, 'ES'),
(9, 'GO'),
(10, 'MA'),
(11, 'MT'),
(12, 'MS'),
(13, 'MG'),
(14, 'PR'),
(15, 'PB'),
(16, 'PA'),
(17, 'PE'),
(18, 'PI'),
(19, 'RJ'),
(20, 'RN'),
(21, 'RS'),
(22, 'RO'),
(23, 'RR'),
(24, 'SC'),
(25, 'SE'),
(26, 'SP'),
(27, 'TO');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_cidade`
--
ALTER TABLE `tb_cidade`
  ADD CONSTRAINT `fk_tb_uf_tb_cidade` FOREIGN KEY (`id_uf`) REFERENCES `tb_uf` (`id_uf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_tb_cidade_tb_endereco` FOREIGN KEY (`id_cidade`) REFERENCES `tb_cidade` (`id_cidade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_cliente_tb_endereco` FOREIGN KEY (`id_cliente`) REFERENCES `tb_cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_item_lista`
--
ALTER TABLE `tb_item_lista`
  ADD CONSTRAINT `fk_tb_lista_compra_cliente_tb_item_lista` FOREIGN KEY (`id_lista`) REFERENCES `tb_lista_compra_cliente` (`id_lista`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_produto_tb_item_lista` FOREIGN KEY (`id_produto`) REFERENCES `tb_produto` (`id_produto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_lista_compra_cliente`
--
ALTER TABLE `tb_lista_compra_cliente`
  ADD CONSTRAINT `fk_cpf_lista` FOREIGN KEY (`cpf_cliente`) REFERENCES `tb_cliente` (`cpf`);

--
-- Limitadores para a tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_tb_marca_tb_produto` FOREIGN KEY (`id_marca`) REFERENCES `tb_marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
