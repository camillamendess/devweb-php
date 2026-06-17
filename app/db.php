<?php

// Arquivo de configuração e conexão com o banco de dados MySQL via PDO, utilizado por todos os Controllers da aplicação
$host = "127.0.0.1:3307";
$db   = "agenda";
$user = "root";
$pass = "agenda";
$charset = "utf8mb4";

// Tenta estabelecer a conexão com o banco de dados usando as credenciais definidas acima
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$db;charset=$charset",
        $user,
        $pass,
        [
            // Configura o PDO para lançar exceções em caso de erro e retornar resultados como array associativo
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    // Encerra a execução e exibe a mensagem de erro caso a conexão falhe
    die("Erro de conexão: " . $e->getMessage());
}