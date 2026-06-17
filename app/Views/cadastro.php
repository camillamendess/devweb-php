<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Criar Conta</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<!-- View Cadastro - exibe o formulário de criação de conta, além de alertas de erro ou sucesso enviados pelo AuthController -->
<div class="container">
    
    <!-- Área de alertas: exibe mensagens de erro ou sucesso dependendo do resultado do cadastro -->
    <div class="container-alertas">
    <?php if (!empty($erro)): ?>
        <!-- Alerta de erro: exibido quando há falha na validação dos dados (senhas não coincidem, e-mail já cadastrado, etc.) -->
        <div class="alerta alerta-erro" role="alert" aria-live="assertive">
            <div class="alerta-conteudo">
                <strong>Erro:</strong> <?= htmlspecialchars($erro) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <!-- Alerta de sucesso: exibido quando o usuário é registrado com êxito -->
        <div class="alerta alerta-sucesso" role="status" aria-live="polite">
            <div class="alerta-conteudo">
                <strong>Sucesso!</strong> <?= htmlspecialchars($sucesso) ?>
            </div>
        </div>
    <?php endif; ?>
</div>

    <!-- Formulário de cadastro: coleta e-mail, senha e confirmação de senha do novo usuário -->
    <form method="POST" class="formulario-login" aria-label="Formulário de Login">
        <h1>Criar Nova Conta</h1>
        <!-- Campo de e-mail: será usado como identificador único do usuário -->
        <div class="campo-formulario">
            <label for="email">E-mail para Registro:</label>
            <input type="email" id="email" name="email" required aria-required="true">
        </div>
        <!-- Campo de senha: exige mínimo de 6 caracteres, validado também no AuthController -->
        <div class="campo-formulario">
            <label for="senha">Defina uma Senha:</label>
            <input type="password" id="senha" name="senha" minlength="6" required aria-required="true" placeholder="Mínimo 6 caracteres">
        </div>
        <!-- Campo de confirmação de senha: comparado com o campo anterior no AuthController -->
        <div class="campo-formulario">
            <label for="confirmar_senha">Confirme a Senha:</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" minlength="6" required aria-required="true">
        </div>
        <p>Já tem uma conta? <a href="/login.php">Fazer Login</a>.</p>
        <button class="botao-destaque" type="submit">Criar Conta</button>
    </form>

</div>

</body>
</html>