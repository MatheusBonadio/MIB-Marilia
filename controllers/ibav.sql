create database ibav;

use ibav;

Create table usuario(
	id_usuario Int NOT NULL AUTO_INCREMENT,
	id_encargo Int NOT NULL DEFAULT 1,
	login Varchar(20) NOT NULL,
	senha Varchar(32) NOT NULL,
	nome Varchar(80) NOT NULL,
	email Varchar(70) NOT NULL,
	cpf Varchar(14) NOT NULL,
	telefone Varchar(15) NOT NULL,
	ativo Bit(1) NOT NULL DEFAULT 0,
	cep Varchar(8),
	estado Varchar(2),
	cidade Varchar(50),
	bairro Varchar(80),
	rua Varchar(80),
	numero Int,
 	Primary Key (id_usuario)
);

Create table inscricao(
	id_inscricao Int NOT NULL AUTO_INCREMENT,
	id_usuario Int NOT NULL,
	id_evento Int NOT NULL,
	id_lider Int NOT NULL,
	celula Int NOT NULL,
	data_pago Date NOT NULL,
 	Primary Key (id_inscricao)
);

Create table evento(
	id_evento Int NOT NULL AUTO_INCREMENT,
	nome Varchar(80) NOT NULL,
	data_inicio Date NOT NULL,
	data_termino Date NOT NULL,
	hora_inicio Varchar(15) NOT NULL,
	local Varchar(80) NOT NULL,
	coordernadas Varchar(30),
	img Varchar(20) NOT NULL,
 	Primary Key (id_evento)
);

Create table lider(
	id_preletor Int NOT NULL AUTO_INCREMENT,
	id_encargo Int NOT NULL DEFAULT 1,
	id_usuario Int,
	nome Varchar(80) NOT NULL,
	rede Varchar(20),
 	Primary Key (id_preletor)
);

Create table preletor(
	id_lider Int NOT NULL,
	id_evento Int NOT NULL
);

Create table encargo (
	id_encargo Int NOT NULL AUTO_INCREMENT,
	nome Varchar(30) NOT NULL,
 	Primary Key (id_encargo)
);