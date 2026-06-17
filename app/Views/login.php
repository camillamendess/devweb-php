<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Login</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!-- View Login - exibe o formulário de autenticação do usuário, com alerta de erro enviado pelo AuthController caso as credenciais sejam inválidas -->
<div class="container">
    
    <!-- Área de alertas: exibe mensagem de erro caso o e-mail ou senha informados sejam inválidos -->
    <div class="container-alertas">
        <?php if (!empty($erro)): ?>
            <!-- Alerta de erro: exibido quando as credenciais não correspondem a nenhum usuário cadastrado -->
            <div class="alerta alerta-erro" role="alert" aria-live="assertive">
                <div class="alerta-conteudo">
                    <strong>Erro ao entrar:</strong> <?= htmlspecialchars($erro) ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
    <!-- Formulário de login: envia e-mail e senha via POST para o AuthController validar as credenciais -->
    <form method="POST" class="formulario-login" aria-label="Formulário de Login">
        <h1 id="login-title">Login</h1>
        <!-- Campo de e-mail: usado como identificador do usuário na busca pelo AuthController -->
        <div class="campo-formulario">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required aria-required="true">
        </div>
        <!-- Campo de senha: enviada ao AuthController para comparação com o hash armazenado no banco -->
        <div class="campo-formulario">
            <label for="password">Senha:</label>
            <input type="password" id="password" name="senha" required aria-required="true">
        </div>
        <button class="botao-destaque" type="submit">Entrar na Agenda</button>
        <!-- Link de redirecionamento para a view de cadastro caso o usuário não possua conta -->
        <p>Não tem uma conta? <a href="/cadastrar.php">Cadastre-se aqui</a>.</p>
    </form>
</div>

</body>
</html>