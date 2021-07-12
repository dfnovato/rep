create database db_trab
default character set utf8
default collate utf8_general_ci;

use	 db_trab;

create table tbl_categoria
( 
cd_categoria int primary key auto_increment,
ds_categoria varchar(25) not null
)
default charset utf8;



create table tbl_produto
(
cd_produto int primary key auto_increment,
cd_categoria int not null,
nm_produto varchar(70) not null,
vl_preco decimal(6,2) not null,
qt_estoque int not null,
ds_capa varchar(255) not null,
constraint fk_cat foreign key (cd_categoria) references tbl_categoria(cd_categoria)
)
default charset utf8;

insert into tbl_categoria
values(default,'salgadinho'),
(default, 'frutas'),
(default, 'jogos de tabuleiro');

insert into tbl_produto
values(default,'1','doritos','4.99','50','Salgadinho Doritos'),
(default,'2','goiba','3.99','200','Fruta Goiba'),
(default,'3','War','19.99','10','Jogo War'),
(default,'1','lays','4.99','0','Salgadinnho Lays');



create view vw_produto
as select
tbl_produto.cd_produto,
tbl_produto.cd_categoria,
tbl_produto.nm_produto,
tbl_produto.vl_preco,
tbl_produto.qt_estoque,
tbl_produto.ds_capa,
tbl_categoria.cd_categoria,
tbl_categoria.ds_categoria
from tbl_produto inner join tbl_categoria
on tbl_produto.cd_categoria = tbl_categoria.cd_categoria;



select * from tbl_produto;
select * from tbl_categoria;
select * from vw_produto;
select * from tbl_usuario;
select * from tbl_venda;
select * from vw_venda;
select * from tbl_status;


create table tbl_usuario(
cd_usuario int primary key auto_increment,
nm_usuario varchar(50) not null,
ds_email varchar(80) not null,
ds_senha varchar(8) not null,
ds_status boolean not null,
ds_endereco varchar(80) not null,
no_cpf char (11) not null unique,
no_cep char(9) not null
) default charset utf8;

create table tbl_status(
cd_status int(1) primary key,
dst_status varchar(20)
) default charset utf8;


insert into tbl_usuario
values(default, 'edvaldo fagundes', 'quinho-9@hotmail.com','rosarosa',1,'narnia','87031509194','12345-89')
;


CREATE TABLE tbl_venda(
cd_venda int(11) primary key AUTO_INCREMENT,
no_ticket varchar (15) NOT NULL,
cd_cliente int(11) NOT NULL,
cd_produto int(11) NOT NULL,
qt_produto int (11) NOT NULL,
vl_item decimal(10,2),
vl_total_item decimal (10,2) generated always AS ((qt_produto * vl_item)) virtual,
dt_venda date NOT NULL,
cd_status int(1)
)
DEFAULT CHARSET=utf8;

insert into tbl_venda(no_ticket, cd_cliente, cd_produto, qt_produto, vl_item, dt_venda)
values(111222333,2,16,3,20.99,'2021-12-06');





create view vw_venda
as select
tbl_venda.no_ticket,
tbl_venda.cd_cliente,
tbl_venda.dt_venda,
tbl_venda.qt_produto,
tbl_venda.vl_total_item,
tbl_produto.ds_capa,
tbl_status.cd_status,
tbl_status.dst_status
from tbl_venda inner join tbl_produto
on tbl_venda.cd_produto = tbl_produto.cd_produto
inner join tbl_status
on tbl_venda.cd_status = tbl_status.cd_status;






select * from vw_produto where ds_capa like '%ux%';

CREATE USER 'programador'@'localhost';
GRANT ALL PRIVILEGES ON db_trab.* To 'programador'@'localhost' with grant option;