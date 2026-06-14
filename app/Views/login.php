<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Login Seguro</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">
    
    <div class="container-alertas">
        <?php if (!empty($erro)): ?>
            <div class="alerta alerta-erro" role="alert" aria-live="assertive">
                <div class="alerta-conteudo">
                    <strong>Erro ao entrar:</strong> <?= htmlspecialchars($erro) ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
        
    <form method="POST" class="formulario-login" aria-label="Formulário de Login">
        <h1 id="login-title">Login</h1>
        <div class="campo-formulario">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required aria-required="true">
        </div>
        <div class="campo-formulario">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha" required aria-required="true">
        </div>
        <button class="botao-destaque" type="submit">Entrar na Agenda</button>
        <p>Não tem uma conta? <a href="/cadastrar.php">Cadastre-se aqui</a>.</p>
    </form>
</div>

</body>
</html>