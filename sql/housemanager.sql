--
-- Estrutura da tabela `comodos`
--

CREATE TABLE IF NOT EXISTS `comodos` (
  `idComodo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idComodo`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `comodos`
--

INSERT INTO `comodos` (`idComodo`, `nome`, `dataCadastro`) VALUES
(1, 'Sala', '2014-11-21 03:00:59'),
(2, 'Cozinha', '2014-11-21 03:00:59'),
(3, 'Quarto A', '2014-11-21 03:00:59'),
(4, 'Quarto B', '2014-11-21 03:00:59'),
(5, 'Quintal', '2014-11-21 03:00:59'),
(9, 'Garagem', '2014-11-21 18:28:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dispositivos`
--

CREATE TABLE IF NOT EXISTS `dispositivos` (
  `idDispositivo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idComodo` int(10) unsigned NOT NULL,
  `nome` varchar(40) NOT NULL,
  `ligado` tinyint(1) NOT NULL DEFAULT '0',
  `pino` int(2) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idDispositivo`),
  UNIQUE KEY `nome` (`nome`),
  KEY `dispositivos_FKIndex1` (`idComodo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `dispositivos`
--

INSERT INTO `dispositivos` (`idDispositivo`, `idComodo`, `nome`, `ligado`, `pino`, `dataCadastro`) VALUES
(1, 1, 'Home theater', 0, 0, '2014-11-21 19:32:53'),
(3, 3, 'PC', 0, 0, '2014-11-21 19:34:50'),
(4, 1, 'Aparelho de som', 0, 0, '2014-11-21 19:35:06'),
(5, 6, 'Secador de cabelo', 0, 0, '2014-11-21 20:11:33'),
(6, 2, 'Geladeira', 0, 0, '2014-11-21 20:19:20'),
(7, 1, 'Ar condicionado', 0, 0, '2014-11-22 02:05:34'),
(8, 4, 'TV 2', 0, 0, '2014-11-22 03:43:40'),
(9, 9, 'Luz 1', 0, 0, '2014-11-22 03:55:54'),
(10, 5, 'Luz externa', 0, 0, '2014-11-22 05:05:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `administra` tinyint(1) NOT NULL DEFAULT '0',
  `dataCadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `login`, `senha`, `administra`, `dataCadastro`) VALUES
(1, 'Sérgio', 'sergio', '698dc19d489c4e4db73e28a713eab07b', 1, '2014-11-18 16:53:26'),
(2, 'Teste', 'teste', '698dc19d489c4e4db73e28a713eab07b', 0, '2014-11-18 20:08:26');

--
-- Table structure for table `pinos`
--

CREATE TABLE IF NOT EXISTS `pinos` (
  `idPino` int(11) NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY (`idPino`),
  UNIQUE KEY `num` (`num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pinos`
--

INSERT INTO `pinos` (`idPino`, `num`, `descricao`) VALUES(1, 7, '');
INSERT INTO `pinos` (`idPino`, `num`, `descricao`) VALUES(2, 11, '');
INSERT INTO `pinos` (`idPino`, `num`, `descricao`) VALUES(3, 15, '');
INSERT INTO `pinos` (`idPino`, `num`, `descricao`) VALUES(4, 16, '');


ALTER TABLE  `dispositivos` CHANGE  `pino`  `idPino` INT( 2 ) NOT NULL;
TRUNCATE TABLE dispositivos;
ALTER TABLE  `dispositivos` ADD UNIQUE (
`idPino`
);
