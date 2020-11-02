CREATE DATABASE minhabiblioteca;




CREATE TABLE IF NOT EXISTS `Editoras` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nome` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `Imagens` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`descricao` varchar(255),
`nome_imagem` varchar(50) NOT NULL,
`tamanho_imagem` varchar(25) NOT NULL,
`tipo_imagem` varchar(25) NOT NULL,
`imagem` longblob NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `Generos` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nome` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `Autores` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nome` varchar(50) NOT NULL,
`sobrenome` varchar(50) NOT NULL,
`pseudonimo`varchar(50) ,
`data_nascimento` date NOT NULL default '1970-10-10',
`nacionalidade` varchar(50),
`descricao` varchar(255), 
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `Usuarios` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`nome` varchar(50) NOT NULL,
`sobrenome` varchar(50) NOT NULL,
`login` varchar(50) NOT NULL,
`senha` varchar(50) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `livros` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`titulo` varchar(50) NOT NULL,
`autor_id` int(10) NOT NULL,
`editora_id` int(10) NOT NULL,
`resumo` varchar(255),
`subtitulo` varchar(50),
`numero_de_paginas` int(5),
`imagem_id` int(10),
 PRIMARY KEY (`id`),
 FOREIGN KEY (autor_id) REFERENCES Autores(id),
 FOREIGN KEY (editora_id) REFERENCES Editoras(id),
 FOREIGN KEY (imagem_id) REFERENCES Imagens(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;





CREATE TABLE IF NOT EXISTS `Generos_Livros` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`livro_id` int(10) NOT NULL,
`genero_id` int(10) NOT NULL,
 PRIMARY KEY (`id`),
 FOREIGN KEY (livro_id) REFERENCES Livros(id),
 FOREIGN KEY (genero_id) REFERENCES Generos(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS `Favoritos` (
`id` int(10) NOT NULL AUTO_INCREMENT,
`livro_id` int(10) NOT NULL,
`usuario_id` int(10) NOT NULL,
 PRIMARY KEY (`id`),
 FOREIGN KEY (livro_id) REFERENCES Livros(id),
 FOREIGN KEY (usuario_id) REFERENCES Usuarios(id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;


ALTER TABLE `usuarios` ADD `perfil` VARCHAR(20) NOT NULL DEFAULT 'usuario' AFTER `senha`;