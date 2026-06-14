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
    <h1>Criar Nova Conta</h1>

    <?php if (!empty($erro)): ?>
        <p style="color: red;" aria-live="assertive"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <?php if (!empty($sucesso)): ?>
        <p style="color: green;" aria-live="polite"><?= htmlspecialchars($sucesso) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="email">E-mail para Registo:</label>
        <input type="email" id="email" name="email" required aria-required="true">
        <br><br>
        
        <label for="senha">Defina uma Senha:</label>
        <input type="password" id="senha" name="senha" minlength="6" required aria-required="true" placeholder="Mínimo 6 caracteres">
        <br><br>

        <label for="confirmar_senha">Confirme a Senha:</label>
        <input type="password" id="confirmar_senha" name="confirmar_senha" minlength="6" required aria-required="true">
        <br><br>

        <button class="botao-destaque" type="submit">Criar Conta</button>
    </form>

    <br>
    <a href="login.php">Já tenho uma conta (Fazer Login)</a>
</div>

</body>
</html>