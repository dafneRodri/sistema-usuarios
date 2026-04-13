CREATE DATABASE app_db;
USE app_db;
CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(50),
correo VARCHAR(50),
password VARCHAR(255),
rol VARCHAR(20)
);
INSERT INTO usuarios VALUES (NULL,"admin","admin@gmail.com","1234","admin")
