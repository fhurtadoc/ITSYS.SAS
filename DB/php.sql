CREATE DATABASE itsys;

USE itsys;

CREATE TABLE servicios(
    id INT (100) auto_increment NOT NULL,
    name VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    imagen VARCHAR (200) NOT NULL,
    tipo VARCHAR (200) NOT NULL,
    CONSTRAINT  pk_id PRIMARY KEY (id)
);


CREATE TABLE tipos(
    id INT (100) auto_increment NOT NULL,
    name VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,    
    CONSTRAINT  pk_id PRIMARY KEY (id)    
);

CREATE TABLE usuarios(
    id INT (100) auto_increment NOT NULL, 
    name VARCHAR(100) NOT NULL, 
    email VARCHAR (100)  NULL,
    password VARCHAR (100)  NULL,
    permisos VARCHAR (100)  NULL,
    CONSTRAINT uq_email UNIQUE(email), 
    CONSTRAINT pk_id PRIMARY KEY (id)
);


CREATE TABLE gallery(
    id Int (100) auto_increment NOT NULL,
    name VARCHAR(100) NOT NULL,
    ruta VARCHAR (100) NOT NULL,    
    id_servicio Int (100) NOT NULL  
    CONSTRAINT pk_id PRIMARY KEY (id)    
);

INSERT INTO usuarios (name, email, password, permisos) VALUES ( 'ADMON','admin@admin.com','$2y$10$ns5yO16X9MfebAmuuyWp5uc.Q/9g7eXxiNfahAJ9OfmfPU4uWttX6','administrador');
