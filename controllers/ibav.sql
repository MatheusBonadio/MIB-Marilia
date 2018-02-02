create database ibav;

use ibav;

Create table login (
	id_login Int NOT NULL AUTO_INCREMENT,
	login Varchar(20) NOT NULL,
	senha Varchar(32) NOT NULL,
	nome Varchar(80) NOT NULL,
	email Varchar(70) NOT NULL,
	nivel Varchar(30) NOT NULL,
	cpf Varchar(14) NOT NULL,
 	Primary Key (id_login)
);

Create table inscricao (
	id_inscricao Int NOT NULL AUTO_INCREMENT,
	nome Varchar(80) NOT NULL,
	discipulador Varchar(40) NOT NULL,
	data_pago Date NOT NULL,
 	Primary Key (id_inscricao)
);

Create table conferencia (
	id_conferencia Int NOT NULL AUTO_INCREMENT,
	descricao Varchar(80) NOT NULL,
	data_inicio Date NOT NULL,
	data_termino Date NOT NULL,
	hora_inicio Varchar(15) NOT NULL,
 	Primary Key (id_conferencia)
);

Create table preletor (
	id_preletor Int NOT NULL AUTO_INCREMENT,
	igreja Varchar(80) NOT NULL,
	pastor Bit(1) NOT NULL DEFAULT 0,
 	Primary Key (id_conferencia)
);

Create table participacao_preletor (
	id_preletor Int NOT NULL,
	id_conferencia Int NOT NULL
);