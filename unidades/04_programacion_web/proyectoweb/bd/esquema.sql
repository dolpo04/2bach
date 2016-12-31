create table if not exists usuario (
  id int primary key auto_increment,
  avatar varchar(255) default "avatar.jpg",
  nombre varchar(20) not null,
  apellidos varchar(30) not null,
  email varchar(30) not null,
  nombreUsuario varchar(10) not null unique,
  clave varchar(255) not null
) engine=innodb charset=utf8;

create table if not exists mensaje (
  id int primary key auto_increment,
  mensaje varchar(255) not null,
  fecha datetime default current_timestamp,
  privado boolean default false,
  megusta int default 0,
  usuario int references usuario (id) on delete cascade on update cascade
) engine=innodb charset=utf8;
