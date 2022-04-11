-- SCRIPT DE CONFIGURACION DE LA BASE DE DATOS PARA LA PRACTICA DE PHP

-- Ceacion de la base de datos
DROP DATABASE practica1php;
CREATE DATABASE practica1php;
USE practica1Php;

-- Creacion tablas

DROP table IF EXISTS users;
CREATE TABLE users (
	iduser INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mail varchar(50) unique,
    username varchar(16) unique,
    passHash varchar(60),
    userFirstName varchar(60),
    userLastName varchar(120),
    creationDate datetime,
    removeDate datetime,
    lastSignIn datetime,
    `active` TinyInt(1),
    activationDate datetime,
    activationCode char(64),
    resetPassExpiry DateTime,
	resetPassCode Char(64)
);

DROP table IF EXISTS categoria;
CREATE TABLE categoria (
    nom VARCHAR(50) PRIMARY KEY,
    descripcio VARCHAR(150) NOT NULL
);

DROP table IF EXISTS reptes;
CREATE TABLE reptes (
    ID int auto_increment PRIMARY KEY,
    creador VARCHAR(50) NOT NULL,
    nomRepte VARCHAR(100) NOT NULL,
    descripcio TEXT NOT NULL,
    puntuacio TINYINT UNSIGNED NOT NULL,
    flag VARCHAR(50) NOT NULL,
    dataPub DATE NOT NULL,
    vegadesComplet int unsigned NOT NULL,
    FOREIGN KEY (creador) REFERENCES users(username)
);

DROP table IF EXISTS categoriaRepte;
CREATE TABLE categoriaRepte (
	idRepte int NOT NULL,
    nomCategoria VARCHAR(50) NOT NULL,
	PRIMARY KEY (idRepte, nomCategoria),
    FOREIGN KEY (idRepte) REFERENCES reptes(ID),
    FOREIGN KEY (nomCategoria) REFERENCES categoria(nom)
);

DROP table IF EXISTS fitxer;
CREATE TABLE fitxer ( 
    nomCodificat VARCHAR(100) PRIMARY KEY,
    url VARCHAR(100) NOT NULL,
    IDrepte int NOT NULL,
    FOREIGN KEY(IDrepte) REFERENCES reptes(ID)
);

-- Creacion del usuario php
CREATE USER IF NOT EXISTS 'php'@'localhost' IDENTIFIED BY 'LaP4ssw0rToWapaNiñu';
GRANT SELECT ON Practica1Php.users TO 'php'@'localhost';
GRANT INSERT ON Practica1Php.users TO 'php'@'localhost';
GRANT UPDATE ON Practica1Php.users TO 'php'@'localhost';
GRANT SELECT ON Practica1Php.categoria TO 'php'@'localhost';
GRANT INSERT ON Practica1Php.categoria TO 'php'@'localhost';
GRANT UPDATE ON Practica1Php.categoria TO 'php'@'localhost';
GRANT ALL PRIVILEGES ON *.* TO 'php'@'localhost';

-- Selects
USE practica1Php;
Select * from users;
Select * from reptes;
Select * from categoriaRepte;
Select * from categoria;
select nomCategoria FROM categoriaRepte WHERE idRepte = 8;

SELECT r.ID, c.nomCategoria
FROM reptes AS r JOIN categoriaRepte AS c ON r.ID = c.idRepte
WHERE UPPER(c.nomCategoria) = "MISC";


-- Inserts
-- Categorias:
INSERT INTO categoria (nom,descripcio) VALUES ("OSINT","Open source inteligence: Busquedas avanzadas en fuentes abiertas.");
INSERT INTO categoria (nom,descripcio) VALUES ("Forensics","Análisis Forense: Lo más común; imágenes de memoria, de discos duros o capturas de red, las cuales almacenan diferentes tipos de información.");
INSERT INTO categoria (nom,descripcio) VALUES ("Crypto","Criptografía: Textos cifrados mediante un criptosistema determinado.");
INSERT INTO categoria (nom,descripcio) VALUES ("Stego","Esteganografía: Imágenes, sonidos o vídeos que ocultan información en su interior.");
INSERT INTO categoria (nom,descripcio) VALUES ("Pwn","Explotación: Descubrimiento de vulnerabilidades en un servidor.");
INSERT INTO categoria (nom,descripcio) VALUES ("Reversing","Ingeniería Inversa: Inferir en el funcionamiento del software. Lo más común, binarios de Windows y Linux.");
INSERT INTO categoria (nom,descripcio) VALUES ("PPC","Programación: También conocidos como PPC (Professional Programming & Coding), desafíos en los que se requiere desarrollar un programa o script que realice una determinada tarea.");
INSERT INTO categoria (nom,descripcio) VALUES ("Web","Descubrimiento de vulnerabilidades en una aplicación Web.");
INSERT INTO categoria (nom,descripcio) VALUES ("Recon","Reconocimiento: Búsqueda de la bandera en distintos sitios de Internet. Para resolverlo se ofrecen pistas, tal como el nombre de una persona.");
INSERT INTO categoria (nom,descripcio) VALUES ("Trivial","Trivial: Diferentes preguntas relacionadas con la seguridad informática.");
INSERT INTO categoria (nom,descripcio) VALUES ("Misc","Misceláneo: Retos aleatorios que pueden pertenecer a distintas categorías sin especificar.");

