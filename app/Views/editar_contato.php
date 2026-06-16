<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Contatos - Editar</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<div class="container">

    <h1>Editar Contato</h1>

    <form method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" aria-required="true" value="<?= htmlspecialchars($contato->nome ?? '') ?>" required>
        
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" id="telefone" aria-required="true" value="<?= htmlspecialchars($contato->telefone ?? '') ?>" placeholder="(XX)9XXXX-XXXX" pattern="\(\d{2}\)\d{5}-\d{4}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" aria-required="true" value="<?= htmlspecialchars($contato->email ?? '') ?>" required>
        
        <button class="botao-destaque link-externo" type="submit">Atualizar</button>
    </form>

    <a href="index.php" class="botao-destaque link-externo">Voltar</a>

</div>
</body>
</html>