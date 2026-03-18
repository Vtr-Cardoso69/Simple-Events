-- Script para criar o banco de dados e as tabelas para o sistema de gerenciamento de eventos.
-- Execute em um servidor MySQL (por exemplo, via phpMyAdmin ou MySQL CLI).

DROP DATABASE IF EXISTS eventosdb;
CREATE DATABASE eventosdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE eventosdb;

-- Tabela de eventos
CREATE TABLE eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao TEXT NULL,
    data_evento DATE NOT NULL,
    horario TIME NOT NULL,
    local VARCHAR(255) NOT NULL,
    capacidade INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de participantes
CREATE TABLE participantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    telefone VARCHAR(50) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Tabela de inscrições (relaciona evento com participante)
CREATE TABLE inscricoes (
    evento_id INT NOT NULL,
    participante_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (evento_id, participante_id),
    CONSTRAINT fk_inscricao_evento FOREIGN KEY (evento_id) REFERENCES eventos(id) ON DELETE CASCADE,
    CONSTRAINT fk_inscricao_participante FOREIGN KEY (participante_id) REFERENCES participantes(id) ON DELETE CASCADE
) ENGINE=InnoDB;
