-- Criação do banco de dados
CREATE DATABASE escola_db;

-- Uso do banco de dados
USE escola_db;

-- Criação da tabela de escolas

CREATE TABLE escolas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_escola VARCHAR(100) NOT NULL
);

-- Criação da tabela de alunos
CREATE TABLE alunos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome_aluno VARCHAR(100) NOT NULL,
    serie VARCHAR(10) NOT NULL,
    curso VARCHAR(50) NOT NULL,
    escola_id INT(6) UNSIGNED,
    FOREIGN KEY (escola_id) REFERENCES escolas(id)
);

-- Inserção de dados na tabela escolas
INSERT INTO escolas (nome_escola)
VALUES ('Escola A'), ('Escola B'), ('Escola C'), ('Escola D'), ('Escola E');

