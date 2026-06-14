

CREATE DATABASE agenda CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE agenda;

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(30),
    email VARCHAR(100)
);
