<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda - Criar Conta</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">
    
    <div class="container-alertas">
    <?php if (!empty($erro)): ?>
        <div class="alerta alerta-erro" role="alert" aria-live="assertive">
            <div class="alerta-conteudo">
                <strong>Erro:</strong> <?= htmlspecialchars($erro) ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <div class="alerta alerta-sucesso" role="status" aria-live="polite">
            <div class="alerta-conteudo">
                <strong>Sucesso!</strong> <?= htmlspecialchars($sucesso) ?>
            </div>
        </div>
    <?php endif; ?>
</div>
            
    <form method="POST" class="formulario-login" aria-label="Formulário de Login">
        <h1>Criar Nova Conta</h1>
        <div class="campo-formulario">
            <label for="email">E-mail para Registro:</label>
            <input type="email" id="email" name="email" required aria-required="true">
        </div>
        <div class="campo-formulario">
            <label for="senha">Defina uma Senha:</label>
            <input type="password" id="senha" name="senha" minlength="6" required aria-required="true" placeholder="Mínimo 6 caracteres">
        </div>
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