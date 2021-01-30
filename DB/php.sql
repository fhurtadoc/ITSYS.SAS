CREATE DATABASE itsys;

USE itsys;

CREATE TABLE servicios(
    id INT (100) auto_increment NOT NULL,
    name VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    imagen VARCHAR (200) NOT NULL,
    CONSTRAINT  pk_id PRIMARY KEY (id)
);


CREATE TABLE productos(
    id INT (100) auto_increment NOT NULL,
    name VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    imagen VARCHAR (200) NOT NULL,
    CONSTRAINT  pk_id PRIMARY KEY (id)
);

CREATE TABLE usuariosadmin(
    id INT (100) auto_increment NOT NULL,    
    email VARCHAR (100)  NULL,
    password VARCHAR (100)  NULL,
    permisos VARCHAR (100)  NULL,
    CONSTRAINT uq_email UNIQUE(email), 
    CONSTRAINT pk_id PRIMARY KEY (id)
);

INSERT INTO usuariosadmin (id="1", email="admin@admin.com", password="$10$ouZqIlYzOJVem344.6Zomey76.opv9wr69Lq64uJxydbbhduzO6Ly", permisos="administrador" );