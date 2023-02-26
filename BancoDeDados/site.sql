create database site;

use site;

create table domestica(
	cpf bigint not null primary key,
    nome varchar (100) not null,
    dataDeNascimento varchar(10) not null,
    rua varchar(100) not null,
    cidade varchar(100) not null,
    bairro varchar(100) not null,
    numero int(5) not null,
    avaliacao int(1) not null,
    senha varchar (100) not null,
    email varchar(100) not null,
    telefone varchar(13) not null
)Engine = InnoDB;

create table cliente(
	cpf bigint not null primary key,
    nome varchar(100) not null,
    dataDeNascimento varchar(10) not null,
    rua varchar(100) not null,
    cidade varchar(100) not null,
    bairro varchar(100) not null,
    numero int(5) not null,
    avaliacao int(1) not null,
    senha varchar(100) not null,
    email varchar(100) not null,
    telefone varchar(13) not null
)Engine = InnoDB;

create table anuncio(
	cod int not null primary key auto_increment,
	cpf bigint not null,
	titulo varchar(50) not null,
	descricao varchar(1000) not null,
	rua varchar(50) not null,
	numero int not null,
	bairro varchar(25) not null,
	cidade varchar(25) not null,
	valor decimal(10,2) not null,
	imagem varchar(100) not null
)Engine = InnoDB;

create table candidatura(
	codigoCandidatura int not null primary key auto_increment,
    codigoVaga int not null,
    nome varchar(100) not null,
    telefone varchar(11) not null
) Engine = InnoDB;

select * from anuncio;

insert into anuncio (cod, cpf, titulo, descricao, rua, numero, bairro, cidade, valor, imagem) values ('', '$cpf', '$titulo', '$descricao', '$logradouro', '15', '$bairro', '$cidade', '100', '$caminho');