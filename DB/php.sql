CREATE DATABASE itsys;

USE itsys;

CREATE TABLE itsys.services (
	id int(100) auto_increment NOT NULL,
	name varchar(100) NULL,
	description LONGTEXT NULL,
	category varchar(100) NULL,
	imagen varchar(100) NULL,
	type varchar(100) NULL,
	CONSTRAINT services_PK PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

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
