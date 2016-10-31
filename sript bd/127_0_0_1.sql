-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31-Out-2016 às 06:28
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

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
-- Database: `bd_carros`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_carro`
--

CREATE TABLE IF NOT EXISTS `tb_carro` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `FK_cliente` varchar(11) COLLATE ascii_bin NOT NULL,
  `tipo` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `marca` text COLLATE ascii_bin NOT NULL,
  `modelo` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ano` year(4) NOT NULL,
  `cor` varchar(15) COLLATE ascii_bin NOT NULL,
  `km` float NOT NULL,
  `descricao` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `preco` double NOT NULL,
  `imagem1` text COLLATE ascii_bin NOT NULL,
  `imagem2` text COLLATE ascii_bin NOT NULL,
  `imagem3` text COLLATE ascii_bin NOT NULL,
  `imagem4` text COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `FK_cliente` (`FK_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=ascii COLLATE=ascii_bin AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `tb_carro`
--

INSERT INTO `tb_carro` (`cod`, `FK_cliente`, `tipo`, `marca`, `modelo`, `ano`, `cor`, `km`, `descricao`, `preco`, `imagem1`, `imagem2`, `imagem3`, `imagem4`) VALUES
(19, '42159270130', 'venda', 'chevrolet', 'celta', 2012, 'preto', 40000, 'completo', 21400, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(20, '77568893120', 'venda', 'Volkswagen', 'fox', 2013, 'prata', 35000, 'basico', 48300, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(21, '23734936756', 'venda/troca', 'Honda', 'civic', 2013, 'prata', 27000, 'completo', 15400, 'civic_prata_1.jpg', 'civic_prata_2.jpg', 'civic_prata_3.jpg', 'civic_prata_4.jpg'),
(22, '94789394166', 'venda', 'Fiat', 'punto', 2014, 'vermelho', 47000, 'completo', 12500, 'punto_vermelho_1.jpg', 'punto_vermelho_2.jpg', 'punto_vermelho_3.jpg', 'punto_vermelho_4.jpg'),
(23, '56930584681', 'venda', 'Volkswagen', 'fox', 2013, 'prata', 30000, 'basico', 20500, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(24, '05779562482', 'venda/troca', 'Volkswagen', 'fox', 2014, 'prata', 40000, 'completo', 25500, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(25, '55427238450', 'venda', 'Volkswagen', 'fox', 2014, 'prata', 40000, 'completo', 34400, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(26, '26356126922', 'venda', 'Honda', 'civic', 2010, 'prata', 35000, 'basico', 25500, 'civic_prata_1.jpg', 'civic_prata_2.jpg', 'civic_prata_3.jpg', 'civic_prata_4.jpg'),
(27, '82434531997', 'venda/troca', 'Honda', 'civic', 2013, 'prata', 27000, 'completo', 42400, 'civic_prata_1.jpg', 'civic_prata_2.jpg', 'civic_prata_3.jpg', 'civic_prata_4.jpg'),
(28, '61540817156', 'venda', 'chevrolet', 'celta', 2011, 'preto', 47000, 'completo', 49800, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(29, '79712770834', 'venda', 'chevrolet', 'celta', 2011, 'preto', 30000, 'basico', 32700, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(30, '81256776742', 'venda/troca', 'Fiat', 'punto', 2013, 'vermelho', 40000, 'completo', 22100, 'punto_vermelho_1.jpg', 'punto_vermelho_2.jpg', 'punto_vermelho_3.jpg', 'punto_vermelho_4.jpg'),
(31, '38603264651', 'venda/troca', 'chevrolet', 'celta', 2013, 'preto', 35000, 'completo', 14400, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(32, '14206781753', 'venda', 'chevrolet', 'celta', 2014, 'preto', 27000, 'completo', 18700, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(33, '36803204189', 'venda', 'Volkswagen', 'fox', 2011, 'prata', 47000, 'basico', 38600, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(34, '76157595108', 'venda/troca', 'Honda', 'civic', 2010, 'prata', 30000, 'completo', 23000, 'civic_prata_1.jpg', 'civic_prata_2.jpg', 'civic_prata_3.jpg', 'civic_prata_4.jpg'),
(35, '56278590166', 'venda', 'Fiat', 'punto', 2014, 'vermelho', 40000, 'completo', 22400, 'punto_vermelho_1.jpg', 'punto_vermelho_2.jpg', 'punto_vermelho_3.jpg', 'punto_vermelho_4.jpg'),
(36, '24634994275', 'venda', 'Volkswagen', 'fox', 2013, 'prata', 40000, 'basico', 17300, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(37, '36282984157', 'venda/troca', 'Volkswagen', 'fox', 2014, 'prata', 35000, 'completo', 37900, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(38, '18481027715', 'venda', 'Volkswagen', 'fox', 2010, 'prata', 27000, 'completo', 12200, 'fox_prata_1.jpg', 'fox_prata_2.jpg', 'fox_prata_3.jpg', 'fox_prata_4.jpg'),
(39, '53562783493', 'venda', 'Honda', 'civic', 2014, 'prata', 47000, 'basico', 46400, 'civic_prata_1.jpg', 'civic_prata_2.jpg', 'civic_prata_3.jpg', 'civic_prata_4.jpg'),
(40, '69868085349', 'venda/troca', 'Honda', 'civic', 2011, 'prata', 30000, 'completo', 19800, 'civic_prata_1.jpg', 'civic_prata_2.jpg', 'civic_prata_3.jpg', 'civic_prata_4.jpg'),
(41, '79963496229', 'venda/troca', 'chevrolet', 'celta', 2011, 'preto', 40000, 'completo', 17200, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(42, '43773266510', 'venda', 'chevrolet', 'celta', 2010, 'preto', 35000, 'completo', 20200, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg'),
(43, '53607802661', 'venda', 'Fiat', 'punto', 2012, 'vermelho', 27000, 'basico', 17500, 'punto_vermelho_1.jpg', 'punto_vermelho_2.jpg', 'punto_vermelho_3.jpg', 'punto_vermelho_4.jpg'),
(44, '03662781697', 'venda/troca', 'chevrolet', 'celta', 2013, 'preto', 47000, 'completo', 36200, 'celta_preto_1.jpg', 'celta_preto_2.jpg', 'celta_preto_3.jpg', 'celta_preto_4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `nome` text COLLATE ascii_bin NOT NULL,
  `sexo` text COLLATE ascii_bin NOT NULL,
  `apelido` text COLLATE ascii_bin NOT NULL,
  `cpf` varchar(11) COLLATE ascii_bin NOT NULL,
  `tel` text COLLATE ascii_bin NOT NULL,
  `dt_nasc` text COLLATE ascii_bin NOT NULL,
  `estado_civil` text COLLATE ascii_bin NOT NULL,
  `email` text COLLATE ascii_bin NOT NULL,
  `senha` text COLLATE ascii_bin NOT NULL,
  `end_logradouro` text COLLATE ascii_bin NOT NULL,
  `end_cep` varchar(11) COLLATE ascii_bin NOT NULL,
  `end_num` varchar(11) COLLATE ascii_bin NOT NULL,
  `end_compl` text COLLATE ascii_bin NOT NULL,
  `end_bairro` text COLLATE ascii_bin NOT NULL,
  `end_estado` varchar(2) COLLATE ascii_bin NOT NULL,
  `end_municipio` text COLLATE ascii_bin NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`nome`, `sexo`, `apelido`, `cpf`, `tel`, `dt_nasc`, `estado_civil`, `email`, `senha`, `end_logradouro`, `end_cep`, `end_num`, `end_compl`, `end_bairro`, `end_estado`, `end_municipio`) VALUES
('', '', '', '', '', '', 'solteiro', 'vih.msn@hotmail.com', '123456', '', '', '', '', '', 'AC', ''),
('Matheus Midori', 'masculino', 'Matheus', '03662781697', '11112247', '15/2/1994', 'solteiro', 'Matheus_Midori@gmail.com', '4312', 'xxxxxxxxx', '06768025', '172', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Paulo da Silva', 'masculino', 'Paulo', '05779562482', '11112227', '19/6/1996', 'solteiro', 'Paulo_da_Silva@gmail.com', '4232', 'xxxxxxxxx', '06768005', '2', '', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Joana Justo', 'feminino', 'Joana', '14206781753', '11112235', '15/2/1990', 'casado', 'Joana_Justo@gmail.com', '1133', 'xxxxxxxxx', '06768013', '5', '', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Fabiana Justo', 'feminino', 'Fabiana', '17263276631', '11112251', '19/6/1988', 'solteiro', 'Fabiana_Justo@gmail.com', '1444', 'xxxxxxxxx', '06768029', '105', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Joana Oliveira', 'feminino', 'Joana', '18481027715', '11112241', '8/8/1993', 'viuvo', 'Joana_Oliveira@gmail.com', '3222', 'xxxxxxxxx', '06768019', '78', '', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Matheus Silva', 'masculino', 'Matheus', '23734936756', '11112224', '8/3/1990', 'casado', 'Matheus_Silva@gmail.com', '3242', 'xxxxxxxxx', '06768002', '182', '', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Vinicius Fernandes', 'masculino', 'Vinicius', '24322703208', '11112250', '29/5/1987', 'casado', 'Vinicius_Fernandes@gmail.com', '3431', 'xxxxxxxxx', '06768028', '125', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Vinicius Oliveira', 'masculino', 'Vinicius', '24634994275', '11112239', '3/6/1993', 'casado', 'Vinicius_Oliveira@gmail.com', '1324', 'xxxxxxxxx', '06768017', '85', '', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Paulo Silva', 'masculino', 'Paulo', '26356126922', '11112229', '29/8/1993', 'viuvo', 'Paulo_Silva@gmail.com', '4242', 'xxxxxxxxx', '06768007', '174', 'xx', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Joana Moura', 'feminino', 'Joana', '36282984157', '11112240', '5/7/1992', 'casado', 'Joana_Moura@gmail.com', '3423', 'xxxxxxxxx', '06768018', '16', '', 'yyyyyyy', 'RJ', 'zzzzzzzzz'),
('Alan Midori', 'masculino', 'Alan', '36803204189', '11112236', '19/3/1982', 'casado', 'Alan_Midori@gmail.com', '2444', 'xxxxxxxxx', '06768014', '149', '', 'yyyyyyy', 'RJ', 'zzzzzzzzz'),
('Joana Monteiro', 'feminino', 'Joana', '38603264651', '11112234', '14/1/1990', 'casado', 'Joana_Monteiro@gmail.com', '1444', 'xxxxxxxxx', '06768012', '43', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('alan mattos', 'masculino', 'alan', '39973199871', '946102822', '1991-11-10', 'solteiro', 'vf2122@gmail.com', '123456', 'rua tuiui', '06768880', '24', 'sss', 'centro', 'SP', 'sao paulo'),
('Francisco da Silva', 'masculino', 'Francisco', '42159270130', '11112222', '3/1/1983', 'casado', 'Francisco_da_Silva@gmail.com', '1234', 'xxxxxxxxx', '06768000', '63', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Aline Monteiro', 'feminino', 'Aline', '43575700427', '11112249', '22/4/1992', 'casado', 'Alin_ Monteiro@gmail.com', '2343', 'xxxxxxxxx', '06768027', '165', 'xx', 'yyyyyyy', 'SC', 'zzzzzzzzz'),
('Ricardo da Silva', 'masculino', 'Ricardo', '43773266510', '11112245', '22/12/1996', 'viuvo', 'Ricardo_da_Silva@gmail.com', '4144', 'xxxxxxxxx', '06768023', '29', '', 'yyyyyyy', 'RJ', 'zzzzzzzzz'),
('Alan Oliveira', 'masculino', 'Alan', '53562783493', '11112242', '14/9/1989', 'casado', 'Alan_Oliveira@gmail.com', '2412', 'xxxxxxxxx', '06768020', '161', 'xx', 'yyyyyyy', 'SC', 'zzzzzzzzz'),
('Francisco Santos', 'masculino', 'Francisco', '53607802661', '11112246', '29/1/1982', 'casado', 'Francisco_Santos@gmail.com', '1222', 'xxxxxxxxx', '06768024', '102', '', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Alan Fernandes', 'masculino', 'Alan', '55427238450', '11112228', '22/7/1992', 'viuvo', 'Alan_Fernandes@gmail.com', '2131', 'xxxxxxxxx', '06768006', '115', '', 'yyyyyyy', 'RJ', 'zzzzzzzzz'),
('Ricardo Midori', 'masculino', 'Ricardo', '56278590166', '11112238', '29/5/1983', 'casado', 'Ricardo_Midori@gmail.com', '4144', 'xxxxxxxxx', '06768016', '142', 'xx', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Maria Midori', 'feminino', 'Maria', '56930584681', '11112226', '15/5/1989', 'casado', 'Maria_Midori@gmail.com', '1141', 'xxxxxxxxx', '06768004', '64', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Aline Fernandes', 'feminino', 'Aline', '61540817156', '11112231', '3/10/1983', 'divorciado', 'Aline_Fernandes@gmail.com', '4442', 'xxxxxxxxx', '06768009', '160', '', 'yyyyyyy', 'SC', 'zzzzzzzzz'),
('Francisco Silva', 'masculino', 'Francisco', '69868085349', '11112243', '15/10/1990', 'casado', 'Francisco_Silva@gmail.com', '1424', 'xxxxxxxxx', '06768021', '75', 'xx', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Matheus de Barros', 'masculino', 'Matheus', '76157595108', '11112237', '22/4/1991', 'casado', 'Matheus_de_Barros@gmail.com', '4232', 'xxxxxxxxx', '06768015', '47', 'xx', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Maria Silva', 'feminino', 'Maria', '77568893120', '11112223', '5/2/1986', 'casado', 'Maria_Silva@gmail.com', '4312', 'xxxxxxxxx', '06768001', '171', 'xx', 'yyyyyyy', 'RJ', 'zzzzzzzzz'),
('Matheus da Silva', 'masculino', 'Matheus', '79712770834', '11112232', '5/11/1986', 'solteiro', 'Matheus_da_Silva@gmail.com', '3444', 'xxxxxxxxx', '06768010', '105', 'xx', 'yyyyyyy', 'RJ', 'zzzzzzzzz'),
('Fabiana Justo', 'feminino', 'Fabiana', '79963496229', '11112244', '19/11/1990', 'casado', 'Fabiana_Justo@gmail.com', '4223', 'xxxxxxxxx', '06768022', '95', '', 'yyyyyyy', 'SP', 'zzzzzzzzz'),
('Joana Silva', 'feminino', 'Joana', '81256776742', '11112233', '8/12/1991', 'casado', 'Joana_Silva@gmail.com', '1313', 'xxxxxxxxx', '06768011', '70', '', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Aline Lucena', 'feminino', 'Aline', '82434531997', '11112230', '29/9/1994', 'divorciado', 'Aline_Lucena@gmail.com', '2143', 'xxxxxxxxx', '06768008', '104', '', 'yyyyyyy', 'MG', 'zzzzzzzzz'),
('Francisco da Silva', 'masculino', 'Francisco', '94789394166', '11112225', '14/4/1990', 'solteiro', 'Francisco_da_Silva@gmail.com', '2344', 'xxxxxxxxx', '06768003', '149', 'xx', 'yyyyyyy', 'SC', 'zzzzzzzzz'),
('Vinicius Justo', 'masculino', 'Vinicius', '96248544670', '11112248', '19/3/1986', 'solteiro', 'Vinicius_Justo@gmail.com', '2111', 'xxxxxxxxx', '06768026', '178', 'xx', 'yyyyyyy', 'MG', 'zzzzzzzzz');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_carro`
--
ALTER TABLE `tb_carro`
  ADD CONSTRAINT `relacionamento_dono` FOREIGN KEY (`FK_cliente`) REFERENCES `tb_cliente` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Database: `bd_extra`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarCliente`(IN `var_cpf` BIGINT, IN `var_nome` VARCHAR(50), IN `var_sexo` CHAR, IN `var_apelido` VARCHAR(10), IN `var_telefone` INT, IN `var_dataNasc` DATE, IN `var_estado_civil` CHAR, IN `var_email` VARCHAR(30), IN `var_senha` VARCHAR(20))
BEGIN

INSERT INTO tb_cliente (cpf, nome, sexo, apelido, telefone, dataNasc, estado_civil, email, senha) VALUES(var_cpf, var_nome, var_sexo, var_apelido, var_telefone, var_dataNasc, var_estado_civil, var_email, var_senha);
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarEnderecoCliente`(id_cliente mediumInt, logradouro varchar(25), logradouro_numero numeric,
                                  complemento varchar (20), bairro varchar(25), id_uf int, id_cidade int, CEP numeric)
BEGIN

INSERT INTO tb_cliente VALUES (DEFAULT, id_cliente, logradouro, logradouro_numero, complemento, bairro, id_cidade, CEP);    
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cadastrarListaDeCompra`(idCliente mediumInt, idProduto mediumInt, quantidade int)
BEGIN

INSERT INTO tb_lista_compra_cliente VALUES (idCliente, idProduto, quantidade);    
    
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cidade`
--

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
--
-- Database: `test`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
