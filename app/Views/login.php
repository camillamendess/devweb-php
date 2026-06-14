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
    <h1>Login Restrito</h1>

    <?php if (!empty($erro)): ?>
        <p style="color: red;" aria-live="assertive"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <form method="POST">
        <label for="email">E-mail Cadastrado:</label>
        <input type="email" id="email" name="email" required aria-required="true">
        <br><br>
        
        <label for="senha">Sua Senha:</label>
        <input type="password" id="senha" name="senha" required aria-required="true">
        <br><br>

        <button class="botao-destaque" type="submit">Entrar na Agenda</button>
    </form>
</div>

</body>
</html>