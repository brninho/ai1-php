create table usuario(
    id_usuario serial primary key,
    login varchar(50)  not null,
    senha varchar(255)  not null
);

create table produto (
codigo serial primary key,
nome varchar(50) not null,
preco float not null
);


insert into produto(nome, preco) values('Teclado', 10);
