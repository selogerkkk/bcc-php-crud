<?php
require_once 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $conn = conectar();
        $sql = "DELETE FROM agenda_alunos WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: index.php");
    } catch (PDOException $e) {
        echo "Erro ao excluir: " . $e->getMessage();
    }
}
