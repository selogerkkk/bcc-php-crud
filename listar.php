<?php
require_once 'conexao.php';

try {
    $conn = conectar();
    $sql = "SELECT * FROM agenda_alunos ORDER BY nome";
    $stmt = $conn->query($sql);

    echo "<table>";
    echo "<tr><th>Nome</th><th>Email</th><th>Telefone</th><th>Data de Nascimento</th><th>Ações</th></tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
        echo "<td>" . date('d/m/Y', strtotime($row['data_nascimento'])) . "</td>";
        echo "<td><a href='excluir.php?id=" . $row['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} catch (PDOException $e) {
    echo "Erro ao listar: " . $e->getMessage();
}
