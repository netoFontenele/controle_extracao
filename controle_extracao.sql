-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tempo de Geração: Set 12, 2014 as 08:49 AM
-- Versão do Servidor: 5.0.27
-- Versão do PHP: 5.2.0
-- 
-- Banco de Dados: `controle_extracao`
-- 

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `arecadador`
-- 

CREATE TABLE `arecadador` (
  `arecadadorID` int(11) NOT NULL auto_increment,
  `PessoaFisicaID` int(11) NOT NULL,
  `RegionalID` int(11) NOT NULL,
  PRIMARY KEY  (`arecadadorID`),
  KEY `fk_arecadador_PessoaFisica1_idx` (`PessoaFisicaID`),
  KEY `fk_arecadador_Regional1_idx` (`RegionalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `arecadador`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `ci_sessions`
-- 

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(45) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Extraindo dados da tabela `ci_sessions`
-- 

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES 
('783de21a43fb7ca17c1ad8dac2ee908f', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.103 Safari/537.36', 1410375735, 'a:9:{s:9:"user_data";s:0:"";s:7:"usuario";s:4:"Neto";s:9:"usuarioID";s:2:"11";s:6:"avatar";s:17:"netofontenele.jpg";s:10:"last_login";s:30:"05 de jun de 2014, as 10:57:19";s:5:"praca";N;s:8:"PerfilID";s:1:"2";s:8:"regional";s:8:"Cascavel";s:12:"is_logged_in";i:1;}');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `cidade`
-- 

CREATE TABLE `cidade` (
  `CidadeID` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) default NULL,
  PRIMARY KEY  (`CidadeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=185 ;

-- 
-- Extraindo dados da tabela `cidade`
-- 

INSERT INTO `cidade` (`CidadeID`, `descricao`) VALUES 
(1, 'Abaiara'),
(2, 'Acarapé'),
(3, 'Acaraú'),
(4, 'Acopiara'),
(5, 'Aiuaba'),
(6, 'Alcântaras'),
(7, 'Altaneira'),
(8, 'Alto Santo'),
(9, 'Amontada'),
(10, 'Antonina do Norte'),
(11, 'Apuiarés'),
(12, 'Aquiraz'),
(13, 'Aracati'),
(14, 'Aracoiaba'),
(15, 'Ararendá'),
(16, 'Araripe'),
(17, 'Aratuba'),
(18, 'Arneiroz'),
(19, 'Assaré'),
(20, 'Aurora'),
(21, 'Baixio'),
(22, 'Banabuiú'),
(23, 'Barbalha'),
(24, 'Barreira'),
(25, 'Barro'),
(26, 'Barroquinha'),
(27, 'Baturité'),
(28, 'Beberibe'),
(29, 'Bela Cruz'),
(30, 'Boa Viagem'),
(31, 'Brejo Santo'),
(32, 'Camocim'),
(33, 'Campos Sales'),
(34, 'Canindé'),
(35, 'Capistrano'),
(36, 'Caridade'),
(37, 'Cariré'),
(38, 'Caririaçu'),
(39, 'Cariús'),
(40, 'Carnaubal'),
(41, 'Cascavel'),
(42, 'Catarina'),
(43, 'Catunda'),
(44, 'Caucaia'),
(45, 'Cedro'),
(46, 'Chaval'),
(47, 'Choró'),
(48, 'Chorozinho'),
(49, 'Coreaú'),
(50, 'Crateús'),
(51, 'Crato'),
(52, 'Croatá'),
(53, 'Cruz'),
(54, 'Deputado Irapuan Pinheiro'),
(55, 'Ererê'),
(56, 'Eusébio'),
(57, 'Farias Brito'),
(58, 'Forquilha'),
(59, 'Fortaleza'),
(60, 'Fortim'),
(61, 'Frecheirinha'),
(62, 'General Sampaio'),
(63, 'Graça'),
(64, 'Granja'),
(65, 'Granjeiro'),
(66, 'Groaíras'),
(67, 'Guaiúba'),
(68, 'Guaraciaba do Norte'),
(69, 'Guaramiranga'),
(70, 'Hidrolândia'),
(71, 'Horizonte'),
(72, 'Ibaretama'),
(73, 'Ibiapina'),
(74, 'Ibicuitinga'),
(75, 'Icapuí'),
(76, 'Icó'),
(77, 'Iguatu'),
(78, 'Independência'),
(79, 'Ipaporanga'),
(80, 'Ipaumirim'),
(81, 'Ipu'),
(82, 'Ipueiras'),
(83, 'Iracema'),
(84, 'Irauçuba'),
(85, 'Itaiçaba'),
(86, 'Itaitinga'),
(87, 'Itapagé'),
(88, 'Itapipoca'),
(89, 'Itapiúna'),
(90, 'Itarema'),
(91, 'Itatira'),
(92, 'Jaguaretama'),
(93, 'Jaguaribara'),
(94, 'Jaguaribe'),
(95, 'Jaguaruana'),
(96, 'Jardim'),
(97, 'Jati'),
(98, 'Jijoca de Jericoacoara'),
(99, 'Juazeiro do Norte'),
(100, 'Jucás'),
(101, 'Lavras da Mangabeira'),
(102, 'Limoeiro do Norte'),
(103, 'Madalena'),
(104, 'Maracanaú'),
(105, 'Maranguape'),
(106, 'Marco'),
(107, 'Martinópole'),
(108, 'Massapê'),
(109, 'Mauriti'),
(110, 'Meruoca'),
(111, 'Milagres'),
(112, 'Milhã'),
(113, 'Miraíma'),
(114, 'Missão Velha'),
(115, 'Mombaça'),
(116, 'Monsenhor Tabosa'),
(117, 'Morada Nova'),
(118, 'Moraújo'),
(119, 'Morrinhos'),
(120, 'Mucambo'),
(121, 'Mulungu'),
(122, 'Nova Olinda'),
(123, 'Nova Russas'),
(124, 'Novo Oriente'),
(125, 'Ocara'),
(126, 'Orós'),
(127, 'Pacajus'),
(128, 'Pacatuba'),
(129, 'Pacoti'),
(130, 'Pacujá'),
(131, 'Palhano'),
(132, 'Palmácia'),
(133, 'Paracuru'),
(134, 'Paraipaba'),
(135, 'Parambu'),
(136, 'Paramoti'),
(137, 'Pedra Branca'),
(138, 'Penaforte'),
(139, 'Pentecoste'),
(140, 'Pereiro'),
(141, 'Pindoretama'),
(142, 'Piquet Carneiro'),
(143, 'Pires Ferreira'),
(144, 'Poranga'),
(145, 'Porteiras'),
(146, 'Potengi'),
(147, 'Potiretama'),
(148, 'Quiterianópolis'),
(149, 'Quixadá'),
(150, 'Quixelô'),
(151, 'Quixeramobim'),
(152, 'Quixeré'),
(153, 'Redenção'),
(154, 'Reriutaba'),
(155, 'Russas'),
(156, 'Saboeiro'),
(157, 'Salitre'),
(158, 'Santa Quitéria'),
(159, 'Santana do Acaraú'),
(160, 'Santana do Cariri'),
(161, 'São Benedito'),
(162, 'São Gonçalo do Amarante'),
(163, 'São João do Jaguaribe'),
(164, 'São Luís do Curu'),
(165, 'Senador Pompeu'),
(166, 'Senador Sá'),
(167, 'Sobral'),
(168, 'Solonópole'),
(169, 'Tabuleiro do Norte'),
(170, 'Tamboril'),
(171, 'Tarrafas'),
(172, 'Tauá'),
(173, 'Tejuçuoca'),
(174, 'Tianguá'),
(175, 'Trairi'),
(176, 'Tururu'),
(177, 'Ubajara'),
(178, 'Umari'),
(179, 'Umirim'),
(180, 'Uruburetama'),
(181, 'Uruoca'),
(182, 'Varjota'),
(183, 'Várzea Alegre'),
(184, 'Viçosa do Ceará');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `distribuicao`
-- 

CREATE TABLE `distribuicao` (
  `DistribuicaoID` int(11) NOT NULL auto_increment,
  `Quantidade` varchar(45) default NULL,
  `numero_inicio` int(11) default NULL,
  `numero_fim` int(11) default NULL,
  `ExtracaoID` int(11) NOT NULL,
  PRIMARY KEY  (`DistribuicaoID`),
  KEY `fk_Distribuicao_Extracao1_idx` (`ExtracaoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `distribuicao`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `distribuicao_ponto_fixo`
-- 

CREATE TABLE `distribuicao_ponto_fixo` (
  `DistribuicaoPontoFixoID` int(11) NOT NULL auto_increment,
  `DistribuicaoID` int(11) NOT NULL,
  `PontoFixoID` int(11) NOT NULL,
  PRIMARY KEY  (`DistribuicaoPontoFixoID`),
  KEY `fk_DistribuicaoPontoFixo_Distribuicao1_idx` (`DistribuicaoID`),
  KEY `fk_DistribuicaoPontoFixo_PontoFixo1_idx` (`PontoFixoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `distribuicao_ponto_fixo`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `distribuicao_vendedor`
-- 

CREATE TABLE `distribuicao_vendedor` (
  `DistribuicaoVendedorID` int(11) NOT NULL auto_increment,
  `VendedorAmbulanteID` int(11) NOT NULL,
  `DistribuicaoID` int(11) NOT NULL,
  PRIMARY KEY  (`DistribuicaoVendedorID`),
  KEY `fk_DistribuicaoVendedor_VendedorAmbulante1_idx` (`VendedorAmbulanteID`),
  KEY `fk_DistribuicaoVendedor_Distribuicao1_idx` (`DistribuicaoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `distribuicao_vendedor`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `endereco`
-- 

CREATE TABLE `endereco` (
  `EnderecoID` int(11) NOT NULL auto_increment,
  `endereco` varchar(45) default NULL,
  `Numero` varchar(45) default NULL,
  `CidadeID` int(11) NOT NULL,
  `CEP` varchar(64) NOT NULL,
  `bairro` varchar(45) default NULL,
  `endereco_google` varchar(180) NOT NULL,
  `latitude` varchar(120) NOT NULL,
  `longitude` varchar(120) NOT NULL,
  PRIMARY KEY  (`EnderecoID`),
  KEY `fk_Endereco_Cidade1_idx` (`CidadeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `endereco`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `extracao`
-- 

CREATE TABLE `extracao` (
  `ExtracaoID` int(11) NOT NULL auto_increment,
  `extracao` int(11) default NULL,
  `descricao` varchar(55) default NULL,
  `data` date default NULL,
  `quantidade` decimal(5,3) default NULL,
  `ativo` int(1) NOT NULL default '0',
  PRIMARY KEY  (`ExtracaoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `extracao`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `logs`
-- 

CREATE TABLE `logs` (
  `logsID` int(11) NOT NULL auto_increment,
  `tempo` datetime default NULL,
  `ip` varchar(45) default NULL,
  `usuarioID` int(11) NOT NULL,
  PRIMARY KEY  (`logsID`),
  KEY `fk_logs_Usuario1_idx` (`usuarioID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `logs`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `parametros`
-- 

CREATE TABLE `parametros` (
  `parametrosID` int(10) NOT NULL auto_increment,
  `parametro_nome` varchar(64) NOT NULL,
  `parametro_descricao` longtext NOT NULL,
  `parametro_valor` longtext NOT NULL,
  `editavel` int(5) NOT NULL,
  PRIMARY KEY  (`parametrosID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Extraindo dados da tabela `parametros`
-- 

INSERT INTO `parametros` (`parametrosID`, `parametro_nome`, `parametro_descricao`, `parametro_valor`, `editavel`) VALUES 
(1, 'comissao_vendedor', 'Valor dado ao vendedor por cada selo vendido', '0.80', 1),
(2, 'comissao_ponto_fixo_rota', 'Valor pago ao ponto fixo por cada selo vendido', '0.50', 1),
(3, 'mail_user', 'E-mail usado como remetente', 'netofontenelenf@gmail.com', 1),
(5, 'mail_pass', 'Senha do e-mail usado como remetente', 'nadaadeclara', 1),
(6, 'dia_sorteio', '0 = domingo\r\n6 = sábado', '0', 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `perfil`
-- 

CREATE TABLE `perfil` (
  `PerfilID` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) default NULL,
  PRIMARY KEY  (`PerfilID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Extraindo dados da tabela `perfil`
-- 

INSERT INTO `perfil` (`PerfilID`, `descricao`) VALUES 
(1, 'administrador'),
(2, 'regional');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pessoa_fisica`
-- 

CREATE TABLE `pessoa_fisica` (
  `PessoaFisicaID` int(11) NOT NULL auto_increment,
  `nome` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `CPF` char(11) default NULL,
  `RG` varchar(45) default NULL,
  `dataNascimento` date default NULL,
  `apelido` varchar(45) default NULL,
  `Telefone` varchar(45) default NULL,
  `EnderecoID` int(11) NOT NULL,
  PRIMARY KEY  (`PessoaFisicaID`),
  KEY `fk_Pessoa_Fisica_Endereco1_idx` (`EnderecoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `pessoa_fisica`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `pessoa_juridica`
-- 

CREATE TABLE `pessoa_juridica` (
  `PessoaJuridicaID` int(11) NOT NULL auto_increment,
  `NomeFantasia` varchar(45) default NULL,
  `RazaoSocial` varchar(45) default NULL,
  `CNPJ` varchar(45) default NULL,
  `InscricaoEstadual` varchar(45) default NULL,
  `telefone` varchar(45) default NULL,
  `EnderecoID` int(11) NOT NULL,
  PRIMARY KEY  (`PessoaJuridicaID`),
  KEY `fk_Pessoa_Juridica_Endereco1_idx` (`EnderecoID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `pessoa_juridica`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `ponto_fixo`
-- 

CREATE TABLE `ponto_fixo` (
  `PontoFixoID` int(11) NOT NULL auto_increment,
  `CNPJ` char(45) default NULL,
  `responsavel` varchar(45) default NULL,
  `PessoaJuridicaID` int(11) NOT NULL,
  `RegionalID` int(11) NOT NULL,
  PRIMARY KEY  (`PontoFixoID`),
  KEY `fk_PontoFixo_PessoaJuridica1_idx` (`PessoaJuridicaID`),
  KEY `fk_PontoFixo_Regional1_idx` (`RegionalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `ponto_fixo`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `referencias_pessoais`
-- 

CREATE TABLE `referencias_pessoais` (
  `referencias_pessoaisID` int(4) NOT NULL auto_increment,
  `nome` varchar(65) NOT NULL,
  `parentesco` varchar(45) NOT NULL,
  `contato` varchar(12) NOT NULL,
  `VendedorAmbulanteID` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`referencias_pessoaisID`),
  KEY `vendedor_ambulanteID` (`VendedorAmbulanteID`),
  KEY `id_vendedor_ambulante` (`VendedorAmbulanteID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `referencias_pessoais`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `regional`
-- 

CREATE TABLE `regional` (
  `regionalID` int(11) NOT NULL auto_increment,
  `Regional` varchar(45) default NULL,
  PRIMARY KEY  (`regionalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Extraindo dados da tabela `regional`
-- 

INSERT INTO `regional` (`regionalID`, `Regional`) VALUES 
(1, 'Cascavel'),
(2, 'pindoretama'),
(3, 'Pacajus');

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `rota`
-- 

CREATE TABLE `rota` (
  `RotaID` int(11) NOT NULL auto_increment,
  `Rota` varchar(45) default NULL,
  PRIMARY KEY  (`RotaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `rota`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `rota_arrecadador`
-- 

CREATE TABLE `rota_arrecadador` (
  `RotaArrecadadorID` int(11) NOT NULL auto_increment,
  `arecadadorID` int(11) NOT NULL,
  `RotaID` int(11) NOT NULL,
  PRIMARY KEY  (`RotaArrecadadorID`),
  KEY `fk_RotaArrecadador_arecadador1_idx` (`arecadadorID`),
  KEY `fk_RotaArrecadador_Rota1_idx` (`RotaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `rota_arrecadador`
-- 


-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuario`
-- 

CREATE TABLE `usuario` (
  `usuarioID` int(11) NOT NULL auto_increment,
  `usuario` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `senha` varchar(65) NOT NULL,
  `ativo` tinyint(1) NOT NULL default '1',
  `avatar` char(45) default NULL,
  `last_login` varchar(55) NOT NULL,
  `senha_editada` int(1) NOT NULL default '0',
  `PerfilID` int(11) NOT NULL,
  PRIMARY KEY  (`usuarioID`),
  KEY `fk_Usuario_Perfil1_idx` (`PerfilID`),
  KEY `usuarioID` (`usuarioID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='<double-click to overwrite multiple objects>' AUTO_INCREMENT=15 ;

-- 
-- Extraindo dados da tabela `usuario`
-- 

INSERT INTO `usuario` (`usuarioID`, `usuario`, `email`, `senha`, `ativo`, `avatar`, `last_login`, `senha_editada`, `PerfilID`) VALUES 
(11, 'neto', 'netinhofontenele@hotmail.com', 'b83eb4fc998dede3dc5da0df1e5fb079', 1, 'netofontenele.jpg', '05 de jun de 2014, as 10:57:19', 1, 2),
(12, 'ricardo castro', 'ricardocastro_@outlook.com', '200820e3227815ed1756a6b531e7e0d2', 1, 'netofontenele.jpg', '03 de jan de 2014, as 11:33:25', 0, 1),
(13, 'anny', 'annylima@hotmail.com', '200820e3227815ed1756a6b531e7e0d2', 1, NULL, '', 0, 1),
(14, 'patricia', 'patricia@hotmail.com', '200820e3227815ed1756a6b531e7e0d2', 1, NULL, '', 0, 1);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `usuario_regional`
-- 

CREATE TABLE `usuario_regional` (
  `usuario_regionalID` int(5) NOT NULL auto_increment,
  `usuarioID` int(5) NOT NULL,
  `regionallID` int(5) NOT NULL,
  PRIMARY KEY  (`usuario_regionalID`),
  KEY `usuarioID` (`usuarioID`),
  KEY `regionallID` (`regionallID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Extraindo dados da tabela `usuario_regional`
-- 

INSERT INTO `usuario_regional` (`usuario_regionalID`, `usuarioID`, `regionallID`) VALUES 
(4, 11, 1),
(5, 13, 2),
(6, 14, 3);

-- --------------------------------------------------------

-- 
-- Estrutura da tabela `vendedor_ambulante`
-- 

CREATE TABLE `vendedor_ambulante` (
  `VendedorAmbulanteID` int(11) NOT NULL auto_increment,
  `RegionalID` int(11) NOT NULL,
  `PessoaFisicaID` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY  (`VendedorAmbulanteID`),
  KEY `fk_VendedorAmbulante_Regional1_idx` (`RegionalID`),
  KEY `fk_VendedorAmbulante_PessoaFisica1_idx` (`PessoaFisicaID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Extraindo dados da tabela `vendedor_ambulante`
-- 


-- 
-- Restrições para as tabelas dumpadas
-- 

-- 
-- Restrições para a tabela `arecadador`
-- 
ALTER TABLE `arecadador`
  ADD CONSTRAINT `fk_arecadador_PessoaFisica1` FOREIGN KEY (`PessoaFisicaID`) REFERENCES `pessoa_fisica` (`PessoaFisicaID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_arecadador_Regional1` FOREIGN KEY (`RegionalID`) REFERENCES `regional` (`regionalID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `distribuicao_ponto_fixo`
-- 
ALTER TABLE `distribuicao_ponto_fixo`
  ADD CONSTRAINT `fk_DistribuicaoPontoFixo_Distribuicao1` FOREIGN KEY (`DistribuicaoID`) REFERENCES `distribuicao` (`DistribuicaoID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DistribuicaoPontoFixo_PontoFixo1` FOREIGN KEY (`PontoFixoID`) REFERENCES `ponto_fixo` (`PontoFixoID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `distribuicao_vendedor`
-- 
ALTER TABLE `distribuicao_vendedor`
  ADD CONSTRAINT `fk_DistribuicaoVendedor_Distribuicao1` FOREIGN KEY (`DistribuicaoID`) REFERENCES `distribuicao` (`DistribuicaoID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_DistribuicaoVendedor_VendedorAmbulante1` FOREIGN KEY (`VendedorAmbulanteID`) REFERENCES `vendedor_ambulante` (`VendedorAmbulanteID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `endereco`
-- 
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_Endereco_Cidade1` FOREIGN KEY (`CidadeID`) REFERENCES `cidade` (`CidadeID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `logs`
-- 
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs_Usuario1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`usuarioID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `pessoa_fisica`
-- 
ALTER TABLE `pessoa_fisica`
  ADD CONSTRAINT `fk_Pessoa_Fisica_Endereco1` FOREIGN KEY (`EnderecoID`) REFERENCES `endereco` (`EnderecoID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `pessoa_juridica`
-- 
ALTER TABLE `pessoa_juridica`
  ADD CONSTRAINT `fk_Pessoa_Juridica_Endereco1` FOREIGN KEY (`EnderecoID`) REFERENCES `endereco` (`EnderecoID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `ponto_fixo`
-- 
ALTER TABLE `ponto_fixo`
  ADD CONSTRAINT `fk_PontoFixo_PessoaJuridica1` FOREIGN KEY (`PessoaJuridicaID`) REFERENCES `pessoa_juridica` (`PessoaJuridicaID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PontoFixo_Regional1` FOREIGN KEY (`RegionalID`) REFERENCES `regional` (`regionalID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `rota_arrecadador`
-- 
ALTER TABLE `rota_arrecadador`
  ADD CONSTRAINT `fk_RotaArrecadador_arecadador1` FOREIGN KEY (`arecadadorID`) REFERENCES `arecadador` (`arecadadorID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RotaArrecadador_Rota1` FOREIGN KEY (`RotaID`) REFERENCES `rota` (`RotaID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Restrições para a tabela `usuario`
-- 
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Perfil1` FOREIGN KEY (`PerfilID`) REFERENCES `perfil` (`PerfilID`) ON DELETE CASCADE ON UPDATE CASCADE;

-- 
-- Restrições para a tabela `usuario_regional`
-- 
ALTER TABLE `usuario_regional`
  ADD CONSTRAINT `usuario_regional_ibfk_1` FOREIGN KEY (`usuarioID`) REFERENCES `usuario` (`usuarioID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_regional_ibfk_2` FOREIGN KEY (`regionallID`) REFERENCES `regional` (`regionalID`);

-- 
-- Restrições para a tabela `vendedor_ambulante`
-- 
ALTER TABLE `vendedor_ambulante`
  ADD CONSTRAINT `fk_VendedorAmbulante_PessoaFisica1` FOREIGN KEY (`PessoaFisicaID`) REFERENCES `pessoa_fisica` (`PessoaFisicaID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_VendedorAmbulante_Regional1` FOREIGN KEY (`RegionalID`) REFERENCES `regional` (`regionalID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
