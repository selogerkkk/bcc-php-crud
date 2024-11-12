<?php
function conectar()
{
    $host = "localhost";
    $dbname = "agenda_db";
    $user = "seu_usuario";
    $password = "sua_senha";

    try {
        $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
