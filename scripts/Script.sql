drop database if exists bd_facilitte;

create database bd_facilitte;

use bd_facilitte;

create table tb_cliente
	(id_cliente mediumInt not null AUTO_INCREMENT,
    cpf bigint(11) not null, 
	nome varchar(50) not null, 
    sexo ENUM('F','M') not null, 
    apelido varchar(10) null, 
    telefone bigint(11) null, 
    dataNasc date not null, 
    estado_civil ENUM('C','S') not null, 
    email varchar(30) not null,
    senha varchar(20) not null,
    constraint pk_cliente PRIMARY KEY(id_cliente),
    constraint unique_cpf_tb_cliente UNIQUE(cpf),
    constraint unique_email_tb_cliente UNIQUE(email)
    );
    
create table tb_uf
	(id_uf int not null AUTO_INCREMENT,
    descricao varchar(25) not null,
    constraint pk_tb_uf PRIMARY KEY(id_uf)
    );
    
create table tb_cidade
	(id_cidade mediumInt not null AUTO_INCREMENT,
    descricao varchar(25) not null,
    id_uf int not null,
    constraint pk_tb_cidade PRIMARY KEY(id_cidade),
    constraint fk_tb_uf_tb_cidade FOREIGN KEY (id_uf) references tb_uf(id_uf) ON DELETE CASCADE ON UPDATE CASCADE
    );
    
create table tb_endereco
	(id_endereco mediumInt not null AUTO_INCREMENT,
    nome_endereco varchar(25) null,
    id_cliente mediumInt not null,
	logradouro varchar(25) not null,
	logradouro_numero int(6) not null,
    complemento varchar(20) null,
    bairro varchar(25) not null,
    id_cidade mediumInt not null,
    CEP bigint(8) not null,
    constraint pk_tb_endereco PRIMARY KEY(id_endereco),
    constraint fk_tb_cliente_tb_endereco FOREIGN KEY (id_cliente) references tb_cliente(id_cliente) ON DELETE CASCADE ON UPDATE CASCADE,
    constraint fk_tb_cidade_tb_endereco FOREIGN KEY (id_cidade) references tb_cidade(id_cidade) ON DELETE CASCADE ON UPDATE CASCADE
    );

    
create table tb_marca
	(id_marca mediumInt not null AUTO_INCREMENT,
    descricao varchar(20) not null,
    constraint pk_marca PRIMARY KEY(id_marca)
    );

create table tb_produto
	(id_produto mediumInt not null AUTO_INCREMENT,
    nome_produto varchar(20) not null,
    id_marca mediumInt not null,
    codigo_barras mediumInt null,
    constraint pk_produto PRIMARY KEY(id_produto),
    constraint fk_tb_marca_tb_produto FOREIGN KEY(id_marca) references tb_marca(id_marca) ON DELETE CASCADE ON UPDATE CASCADE
    );
    
create table tb_lista_compra_cliente
	(id_lista mediumInt not null AUTO_INCREMENT,
    id_cliente mediumInt not null,
    nome_lista varchar(20) not null,
    constraint pk_tb_lista_compra_cliente PRIMARY KEY(id_lista),
    constraint fk_tb_cliente_tb_lista_compra_cliente FOREIGN KEY (id_cliente) references tb_cliente(id_cliente) ON DELETE CASCADE ON UPDATE CASCADE
    );

    
create table tb_item_lista
	(id_lista mediumInt not null, 
    id_produto mediumInt not null,
    quantidade int not null,
    constraint pk_tb_item_lista PRIMARY KEY(id_lista, id_produto),
    constraint fk_tb_lista_compra_cliente_tb_item_lista FOREIGN KEY (id_lista) references tb_lista_compra_cliente(id_lista) ON DELETE CASCADE ON UPDATE CASCADE,
    constraint fk_tb_produto_tb_item_lista FOREIGN KEY (id_produto) references tb_produto(id_produto) ON DELETE CASCADE ON UPDATE CASCADE
    );
    
    
create table tb_supermercado
	(id_supermercado mediumInt not null AUTO_INCREMENT,
    nm_supermercado varchar(20) not null,
    bm_bd varchar(20) not null,
    constraint pk_tb_supermercado PRIMARY KEY(id_supermercado)
    );
