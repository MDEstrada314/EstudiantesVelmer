CREATE DATABASE campusv2;
/* DROP DATABASE campusv2; para borrar la table */

USE campusv2;

CREATE TABLE campers(
    id INT primary key AUTO_INCREMENT,
    nombres VARCHAR(50) NOT NULL,
    direccion VARCHAR(50),
    logros VARCHAR(60),
    ingles FLOAT(10),
    ser FLOAT(10),
    review FLOAT(10),
    skils FLOAT(10),
    especialidad VARCHAR(60)
);


CREATE TABLE productos(
    id INT primary key AUTO_INCREMENT,
    categoria VARCHAR(50) NOT NULL,
    descripcion VARCHAR(50),
    imagen VARCHAR(60)
);




CREATE TABLE user(
    id INT PRIMARY KEY AUTO_INCREMENT,
    idCamper INT NOT NULL,
    email VARCHAR (80) NOT NULL, 
    username VARCHAR (80) NOT NULL,
    password VARCHAR (60) NOT NULL,
    FOREIGN KEY (idCamper) REFERENCES campers (id)
);

DROP DATABASE campusv2;

DROP TABLE campers;