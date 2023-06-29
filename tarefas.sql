create database tarefas;
use tarefas;

drop table if exists tarefas;
create table tarefas (
	id int auto_increment primary key,
    descricao varchar(300),
    datainicio date,
    datafim date,
    terminada boolean
);

select * from tarefas;