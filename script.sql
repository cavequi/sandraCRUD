create database dbprojeto34002;
use dbprojeto34002;

create table tbprojeto(
Codigo int primary key auto_increment,
Nome varchar(40) not null,
Sexo varchar(1) not null,
Email varchar(30),
Senha varchar(8));