<?php

require_once '../app/db.php';

$email = 'admin@email.com';
$senha_pura = '123456';

// O próprio PHP gera o hash criptografado perfeito
$senha_criptografada = password_hash($senha_pura, PASSWORD_BCRYPT);

try {
    // Limpa a tabela antes para não dar erro de e-mail duplicado
    $pdo->exec("DELETE FROM usuarios WHERE email = '$email'");

    $stmt = $pdo->prepare("INSERT INTO usuarios (email, senha) VALUES (?, ?)");
    $stmt->execute([$email, $senha_criptografada]);

    echo "<h1>🎉 Usuário criado com sucesso pelo PHP!</h1>";
    echo "<p><b>E-mail:</b> $email</p>";
    echo "<p><b>Senha:</b> $senha_pura</p>";
    echo "<p><a href='login.php'>Ir para a tela de Login</a></p>";
} catch (PDOException $e) {
    echo "Erro ao criar usuário: " . $e->getMessage();
}