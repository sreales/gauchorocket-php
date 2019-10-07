DROP DATABASE IF EXISTS gr;

CREATE DATABASE gr;

USE gr;

CREATE TABLE login(
    ID integer NOT NULL AUTO_INCREMENT,
    Username varchar(30) UNIQUE NOT NULL,
    UPassword varchar(100) NOT NULL
    constraint PK_login primary key (Id),
};

    CREATE TABLE TipoUsuario(
    ID integer NOT NULL AUTO_INCREMENT,
    Tipo varchar(30) UNIQUE NOT NULL,
    /*descripcion varchar(100) NOT NULL*/
    constraint PK_TipoUsuario primary key (Id),
};

CREATE TABLE loginTipoUsuario(
    ID integer NOT NULL AUTO_INCREMENT,
    loginID varchar(30) UNIQUE NOT NULL,
    TipoID varchar(100) NOT NULL
    constraint PK_loginTipoUsuario primary key (Id),
    constraint FK_loginID foreign key (loginID) references login (ID),
    constraint FK_TipoID foreign key (TipoID) references TipoUsuario (ID),
};
    
INSERT INTO TipoUsuario (Tipo) VALUES ("Administrador"),
                                ("Usuario");

INSERT INTO login (Tipo) VALUES ("Administrador", "12345"),
                                ("Usuario", "1234");
INSERT INTO loginTipoUsuario (Tipo) VALUES (1,1),
                                    (2,2);
