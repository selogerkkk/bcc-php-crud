<?php
require_once 'conexao.php';

try {
    $conn = conectar();

    // SQL para criar a tabela
    $sql = "CREATE TABLE IF NOT EXISTS agenda_alunos (
        id SERIAL PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        telefone VARCHAR(20) NOT NULL,
        data_nascimento DATE NOT NULL
    );";

    // Executa o comando SQL
    $conn->exec($sql);
    echo "Tabela 'agenda_alunos' criada com sucesso!";
} catch (PDOException $e) {
    echo "Erro ao criar a tabela: " . $e->getMessage();
}
