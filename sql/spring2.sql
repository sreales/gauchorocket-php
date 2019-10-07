DROP DATABASE IF EXISTS gr;

CREATE DATABASE gr;

USE gr;

CREATE TABLE login(
    ID integer NOT NULL AUTO_INCREMENT,
    Username varchar(30) UNIQUE NOT NULL,
    UPassword varchar(40) NOT NULL,
    constraint PK_login primary key (ID)
);

    CREATE TABLE tipoUsuario(
    ID integer NOT NULL AUTO_INCREMENT,
    Tipo varchar(30) UNIQUE NOT NULL,
    /*descripcion varchar(100) NOT NULL*/
    constraint PK_TipoUsuario primary key (ID)
);

CREATE TABLE loginTipoUsuario(
    ID integer NOT NULL AUTO_INCREMENT,
    loginID integer UNIQUE NOT NULL,
    tipoID integer NOT NULL,
    constraint PK_loginTipoUsuario primary key (ID),
    constraint FK_loginID foreign key (loginID) references login(ID),
    constraint FK_TipoID foreign key (tipoID) references tipoUsuario(ID)
);
    
CREATE TABLE usuario(
    ID integer NOT NULL AUTO_INCREMENT,
    loginID integer UNIQUE NOT NULL,
    nombre varchar(30) NOT NULL,
    constraint PK_usuario primary key (ID),
    constraint FK_usuarioLoginID foreign key (loginID) references login(ID)
);


INSERT INTO TipoUsuario (Tipo) VALUES ('Administrador'),
                                ('Usuario');

INSERT INTO login (Username,UPassword) VALUES ('Administrador', '8cb2237d0679ca88db6464eac60da96345513964'),
                                ('Usuario', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');
INSERT INTO loginTipoUsuario (loginID, tipoID) VALUES (1,1),
                                    (2,2);                  
