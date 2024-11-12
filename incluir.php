<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $data_nascimento = $_POST['data_nascimento'];

    try {
        $conn = conectar();
        $sql = "INSERT INTO agenda_alunos (nome, email, telefone, data_nascimento) 
                VALUES (:nome, :email, :telefone, :data_nascimento)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':data_nascimento', $data_nascimento);

        $stmt->execute();

        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erro ao inserir: " . $e->getMessage();
    }
}
