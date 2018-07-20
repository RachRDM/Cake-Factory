CREATE DATABASE bdtrabalho;

USE bdtrabalho; 

CREATE TABLE lojas (
codigo INT unsigned NOT NULL auto_increment,
cnpj char(20) not null,
rua varchar(50) not null,
numero varchar(5) not null,
nome varchar (45) not null,
primary key (codigo)
) ENGINE = innodb;

CREATE TABLE produto (
id INT unsigned NOT NULL auto_increment,
tipo varchar(45) not null,
quantidade int not null,
preco double(9,2) not null,
nome varchar (45) not null,
primary key (id)
) ENGINE = innodb;


CREATE TABLE vendas (
numero INT unsigned NOT NULL auto_increment ,
lojas_codigo int unsigned null,
produto_id int unsigned not null,
primary key (numero),
foreign key(lojas_codigo) references lojas(codigo),
foreign key(produto_id) references produto(id)
) ENGINE = innodb;

CREATE TABLE cliente (
email varchar(40) NOT NULL ,
nome varchar(45) NOT NULL,
senha char(8) not null,
cpf char(11) not null,
cep char(8) not null,
telefone char(10) not null,
endereco varchar(40) not null,
primary key (email)
) ENGINE = innodb;

CREATE TABLE finalizacao_compra (
id INT unsigned NOT NULL auto_increment,
pagamento varchar(40) not null,
N_cartao char(16) not null,
codigo_cartao char(3) not null,
cliente_email varchar(40) NOT NULL,
primary key (id),
foreign key (cliente_email) references cliente(email)
) ENGINE = innodb;

CREATE TABLE compra (
id INT unsigned NOT NULL auto_increment,
total double(9,2) null,
cliente_email varchar(40) not null,
produto_id int unsigned not null,
primary key (id),
foreign key (cliente_email) references cliente(email),
foreign key (produto_id) references produto(id)
) ENGINE = innodb;

show tables;