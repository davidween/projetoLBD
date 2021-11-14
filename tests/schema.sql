DROP SCHEMA IF EXISTS livraria;
CREATE SCHEMA livraria;

USE livraria;

CREATE TABLE `pessoas` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `cpf` VARCHAR(11) UNIQUE NOT NULL
);

CREATE TABLE `users` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `pessoa_id` INT,
  `username` VARCHAR(50) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
);

CREATE TABLE `autors` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `pessoa_id` INT,
  `telefone` VARCHAR(14) NOT NULL,
  FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`)
);


CREATE TABLE `generos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `classificacao_indicativa` INT NOT NULL
);

CREATE TABLE `emprestimos` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT,
  `status` BOOLEAN,
  `created` DATETIME NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
);

CREATE TABLE `livros` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `genero_id` INT,
  `name` VARCHAR(255) NOT NULL,
  `total_paginas` INT NOT NULL,
  `isbn` VARCHAR(13) UNIQUE NOT NULL,
  FOREIGN KEY (`genero_id`) REFERENCES `generos`(`id`)
);

CREATE TABLE `emprestimos_livros` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `emprestimo_id` INT,
  `livro_id` INT,
  FOREIGN KEY (`emprestimo_id`) REFERENCES `emprestimos` (`id`),
  FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`)
);

CREATE TABLE `autors_livros` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `autor_id` INT,
  `livro_id` INT,
  FOREIGN KEY (`autor_id`) REFERENCES `autors` (`id`),
  FOREIGN KEY (`livro_id`) REFERENCES `livros` (`id`)
);

CREATE TABLE log_edit_emprestimos(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` INT NOT NULL,
    `emprestimo_id` INT NOT NULL,
    `username` VARCHAR(50) NOT NULL,
    `pessoaname` VARCHAR(255) NOT NULL,
    `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Populando o Banco
INSERT INTO generos(name, classificacao_indicativa) VALUES ('Aventura', 10);
INSERT INTO generos(name, classificacao_indicativa) VALUES ('Terror', 18);
INSERT INTO generos(name, classificacao_indicativa) VALUES ('Ficção', 13);
INSERT INTO generos(name, classificacao_indicativa) VALUES ('Ação', 16);
INSERT INTO generos(name, classificacao_indicativa) VALUES ('Drama', 3);
INSERT INTO generos(name, classificacao_indicativa) VALUES ('Suspense', 17);


INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (1, 'Harry Potther', 500, '1234567894564');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (2, 'Senhor dos Áneis', 500, '1234567894565');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (1, 'Percy Jackson', 450, '1234567894566');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (3, 'O Chamado', 450, '1234567894567');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (6, 'O Código Da Vinci', 578, '1234567894568');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (2, 'Dexter : A mão esquerda de Deus', 500, '1234567894569');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (4, 'As Crônicas de Nárnia', 560, '1234567894561');
INSERT INTO livros(genero_id, name, total_paginas, isbn) VALUES (5, 'Crônicas de Gelo e Fogo', 750, '1234567894562');


INSERT INTO pessoas(name, cpf) VALUES ('David Sousa', '12345678984');


INSERT INTO users(pessoa_id, username, password) VALUES (1, 'davidween', '$2y$10$ZEC2QaPL40x5Jk9OfBhPKeRDw8UhKEwpxqc3RrKied2FatO5kbJqi'); -- senha 12345678


-- TRIGGER

CREATE OR REPLACE TRIGGER audit_edicao_emprestimos 
    BEFORE UPDATE ON emprestimos
    FOR EACH ROW
    INSERT INTO log_edit_emprestimos(
        user_id, 
        emprestimo_id, 
        username,
        pessoaname
    )
    VALUES(
        OLD.user_id,
        OLD.id,
        (SELECT username FROM users, emprestimos WHERE users.id = OLD.user_id AND emprestimos.id = OLD.id),
        (SELECT pessoas.name FROM users, pessoas WHERE pessoas.id = (SELECT pessoa_id FROM users WHERE id = OLD.user_id))
    );
   